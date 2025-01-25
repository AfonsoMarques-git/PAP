<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Conexão com a base de dados
    $ligacao = new mysqli('localhost', 'root', '', 'gestao_utilizadores');
    if ($ligacao->connect_error) {
        $_SESSION['error_menu'] = 'Não foi possível ligar à base de dados.';
        header('Location: ../menu_Sadmin.php');
        exit;
    }

    $username = $_POST['nome'] ?? '';
    $password = $_POST['password'] ?? '';
    $confirm_password = $_POST['confirm_password'] ?? '';
    $email = $_POST['email'] ?? '';
    $tipo_utilizador = $_POST['user-type'];

    if ($tipo_utilizador == null || !in_array($tipo_utilizador, ['0', '1'])) {
        $_SESSION['erro_menu'] = 'Selecione um tipo de utilizador válido';
        header('../menu_Sadmin.php');
        exit;
    }

    $tipo_utilizador = (int)$tipo_utilizador;

    // Validar campos
    if (empty($username) || empty($password) || empty($confirm_password) || empty($email) || $tipo_utilizador === null) {
        $_SESSION['error_menu'] = "É necessário preencher todos os campos.";
        header('Location: ../menu_Sadmin.php');
        exit;
    }    

    if ($password !== $confirm_password) {
        $_SESSION['error_menu'] = "As senhas não correspondem.";
        header('Location: ../menu_Sadmin.php');
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
            $_SESSION['error_menu'] = "O nome de utilizador já está em uso.";
            header('Location: ../menu_Sadmin.php');
            exit;
        } elseif ($user['email'] === $email) {
            $_SESSION['error_menu'] = "Já existe uma conta com este email.";
            header('Location: ../menu_Sadmin.php');
            exit;
        }
    }

    // Inserir os dados
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $stmt = $ligacao->prepare("INSERT INTO utilizadores (nome_utilizador, palavra_passe, email, is_admin) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("sssi", $username, $password, $email, $tipo_utilizador);

        if ($stmt->execute()) {
            $_SESSION['success_menu'] = 'Registro realizado com sucesso!';
            header('Location: ../menu_Sadmin.php');
            exit;
        } else {
            $_SESSION['error_menu'] = 'Erro ao realizar o registro. Tente novamente.';
            header('Location: ../menu_Sadmin.php');
            exit;
        }
    } else {
        $_SESSION['error_menu'] = "Endereço de email inválido.";
        header('Location: ../menu_Sadmin.php');
        exit;
    }
}

$_SESSION['error_menu'] = "Erro na execução do formulário.";
header('Location: ../menu_Sadmin.php');
exit;