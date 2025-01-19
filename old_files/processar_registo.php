<?php
session_start();

if (!empty($_POST) && (empty($_POST['nome']) || empty($_POST['password']) || empty($_POST['email']))) {
    $_SESSION['error'] = "Todos os campos são obrigatórios.";
    header("Location: ../php/login-registo.php");
    exit;
}

$ligacao = new mysqli('localhost', 'root', '', 'gestao_utilizadores');

if ($ligacao->connect_error) {
    die('Não foi possível ligar à base de dados: ' . $ligacao->connect_error);
}

$username = $_POST['nome'];
$password = $_POST['password'];
$email = $_POST['email'];

if ($_POST['password'] !== $_POST['confirm_password']) {
    $_SESSION['error'] = "As senhas não correspondem. Por favor, tente novamente.";
    header("Location: ../php/login-registo.php");
    exit;
}

// Verifica se o username ou email já existem
$stmt = $ligacao->prepare("SELECT * FROM utilizadores WHERE nome_utilizador = ? OR email = ?");
$stmt->bind_param("ss", $username, $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
    if ($user['nome_utilizador'] == $username) {
        $_SESSION['error'] = "O nome de utilizador já está em uso. Escolha outro.";
    } elseif ($user['email'] == $email) {
        $_SESSION['error'] = "Já existe uma conta registada com este email.";
    }
    $stmt->close();
    $ligacao->close();
    header("Location: ../php/login-registo.php");
    exit;
}
$stmt->close();

// Verifica o formato do email e insere os dados na base de dados
if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $stmt = $ligacao->prepare("INSERT INTO utilizadores (nome_utilizador, palavra_passe, email) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $username, $password, $email);

    if ($stmt->execute()) {
        $_SESSION['success'] = "O registo foi efetuado com sucesso! Faça login para entrar com o seu registro.";
        header("Location: ../php/login-registo.php");
    } else {
        $_SESSION['error'] = "Erro ao efetuar o registo. Tente novamente.";
        header("Location: ../php/login-registo.php");
        exit;
    }
    $stmt->close();
} else {
    $_SESSION['error'] = "O endereço de correio eletrónico está mal preenchido. Tente de novo!";
    header("Location: ../php/login-registo.php");
    exit;
}

$ligacao->close();
?>
