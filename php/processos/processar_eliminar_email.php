<?php
// Ligar à base de dados
$ligacao = new mysqli('localhost', 'root', '', 'companhia_da_mariposa');

// Verificar a ligação
if ($ligacao->connect_error) {
    die('Não foi possível conectar à base de dados: ' . $ligacao->connect_error);
}

// Obter o ID do email a ser eliminado
$id = $_GET['id'];

// Preparar a instrução SQL para eliminar o email
$sql = "DELETE FROM emails WHERE id = ?";

// Preparar a declaração
$stmt = $ligacao->prepare($sql);

// Verificar se a declaração foi preparada com sucesso
if ($stmt) {
    // Vincular o parâmetro
    $stmt->bind_param('i', $id);

    // Executar a declaração
    if ($stmt->execute()) {
        echo "Email eliminado com sucesso.";
    } else {
        echo "Erro ao eliminar o email: " . $stmt->error;
    }

    // Fechar a declaração
    $stmt->close();
} else {
    echo "Erro ao preparar a declaração: " . $ligacao->error;
}

// Fechar a ligação
$ligacao->close();

// Redirecionar de volta para a página de emails
header("Location: ../menu_Sadmin.php");
exit();
?>
