<?php

if (!empty($_POST) AND (empty($_POST['nome']) OR empty($_POST['password']) OR empty($_POST['email']))) {
    header("Location: registo.html");
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
    echo "As senhas não correspondem. Por favor, tente novamente.";
    header('Location: ../html/erro_password.html');
    exit;
}

if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $stmt = $ligacao->prepare("INSERT INTO utilizadores (nome_utilizador, palavra_passe, email) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $username, $password, $email);

    if ($stmt->execute()) {
        echo "O registo foi efetuado com sucesso!";
        header("Location: ../html/registo_feito.html");
    } else {
        echo "Erro ao efetuar o registo. Tente novamente.";
        header("Location: ../html/erro_registo.html");
        exit;
    }
    $stmt->close();
} else {
    echo "O endereço de correio eletrónico está mal preenchido. Tente de novo! A redirecionar em 3 segundos";

    header('Location: ../html/erro_email.html');
    exit;
}

$ligacao->close();

?>
