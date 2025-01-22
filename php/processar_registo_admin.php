<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Conexão com a base de dados
    $ligacao = new mysqli('localhost', 'root', '', 'gestao_utilizadores');
    if ($ligacao->connect_error) {
        echo json_encode(['status' => 'error', 'message' => 'Não foi possível ligar à base de dados: ' . $ligacao->connect_error]);
        exit;
    }

    $username = $_POST['nome'] ?? '';
    $password = $_POST['password'] ?? '';
    $confirm_password = $_POST['confirm_password'] ?? '';
    $email = $_POST['email'] ?? '';
    $is_admin = $_POST['is_admin'] ?? '';

    // Validar campos
    if (empty($username) || empty($password) || empty($confirm_password) || empty($email) || empty($is_admin)) {
        echo json_encode(['status' => 'error', 'message' => "É necessário preencher todos os campos."]);
        exit;
    }

    if ($password !== $confirm_password) {
        echo json_encode(['status' => 'error', 'message' => "As senhas não correspondem."]);
        exit;
    }

    // Verificar se o username ou email já existem
    $stmt = $ligacao->prepare("SELECT * FROM utilizadores WHERE nome_utilizador = ? OR email = ?");
    $stmt->bind_param("ss", $username, $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if ($user['nome_utilizador'] === $username) {
            echo json_encode(['status' => 'error', 'message' => "O nome de utilizador já está em uso."]);
            exit;
        } elseif ($user['email'] === $email) {
            echo json_encode(['status' => 'error', 'message' => "Já existe uma conta com este email."]);
            exit;
        }
    }

    // Inserir os dados
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $stmt = $ligacao->prepare("INSERT INTO utilizadores (nome_utilizador, palavra_passe, email, is_admin) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("sssi", $username, $password, $email, $is_admin);

        if ($stmt->execute()) {
            echo json_encode(['status' => 'success', 'message' => "Registo de administrador efetuado com sucesso!"]);
        } else {
            echo json_encode(['status' => 'error', 'message' => "Erro ao efetuar o registo. Tente novamente."]);
        }
        $stmt->close();
    } else {
        echo json_encode(['status' => 'error', 'message' => "Endereço de email inválido."]);
    }
    $ligacao->close();
    exit;
}

echo json_encode(['status' => 'error', 'message' => "Erro na execução do formulário."]);
exit;
