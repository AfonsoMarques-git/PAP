<?php
$ligacao = new mysqli('localhost', 'root', '', 'companhia_da_mariposa');

// Verificar a ligação
if ($ligacao->connect_error) {
    die('Não foi possível conectar à base de dados: ' . $ligacao->connect_error);
}

// Obter os dados do formulário
$nome = $_POST['nome'];
$email = $_POST['email'];
$telemovel = $_POST['telemovel'];
$origem = $_POST['origem'];

// Verificar a origem dos dados
if ($origem == 'eventos') {
    $tipo_evento = $_POST['event-option'];
    $data_evento = $_POST['selected_date'];
    $n_pessoas = $_POST['n_pessoas'];
    $mensagem = $_POST['mensagem'];

    // Inserir dados na tabela para eventos
    $sql = "INSERT INTO emails (nome, email, telemovel, tipo_evento, data_evento, n_pessoas, mensagem, origem) 
            VALUES ('$nome', '$email', '$telemovel', '$tipo_evento', '$data_evento', '$n_pessoas', '$mensagem', '$origem')";
} else if ($origem == 'contactos') {
    $mensagem = $_POST['mensagem'];

    // Inserir dados na tabela para contactos
    $sql = "INSERT INTO emails (nome, email, telemovel, mensagem, origem) 
            VALUES ('$nome', '$email', '$telemovel', '$mensagem', '$origem')";
} else {
    // Origem desconhecida - tratar erro
    echo json_encode(['success' => false, 'message' => 'Erro: Origem desconhecida.']);
    exit;
}

// Executar a consulta SQL
if ($ligacao->query($sql) === TRUE) {
    echo json_encode(["success" => true, "message" => "Novo registo criado com sucesso"]);
} else {
    echo json_encode(["success" => false, "message" => "Erro: " . $ligacao->error]);
}

$ligacao->close();
?>