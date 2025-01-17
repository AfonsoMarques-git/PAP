<?php
session_start();

$ligacao = new mysqli('localhost', 'root', '', 'gestao_utilizadores');

if ($ligacao->connect_error) {
    die('Não foi possível ligar à base de dados: ' . $ligacao->connect_error);
}

$username = $_POST['nome'];
$password = $_POST['password'];

$sql = $ligacao->prepare("SELECT nome_utilizador, is_admin FROM utilizadores WHERE nome_utilizador=? AND palavra_passe=?");
$sql->bind_param("ss", $username, $password);
$sql->execute();
$sql->store_result();

if ($sql->num_rows == 1) {
    $sql->bind_result($nome_utilizador, $is_admin);
    $sql->fetch();

    $_SESSION['autenticado'] = true;
    $_SESSION['username'] = $nome_utilizador;

    if ($is_admin == 1) {
        header("Location: ../php/Administrador/menu_admin.php");
    } else if ($is_admin == 2) {
        header("Location: ../php/Administrador/menu_Sadmin.php");
    } else {
        header("Location: ../index.php");
    }
} else {
    // Falha na autenticação
    $_SESSION['autenticado'] = false;
    header("Location: ../php/login-registo.php");
    exit;
}

$sql->close();
$ligacao->close();
?>