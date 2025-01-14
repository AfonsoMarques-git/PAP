<?php
    session_start();

    $ligacao = new mysqli('localhost', 'root', '', 'gestao_utilizadores');

    if ($ligacao->connect_error) {
        die('Não foi possível ligar à base de dados: ' . $ligacao->connect_error);
    }

    $username = $_POST['nome'];
    $password = $_POST['password'];

    $sql = $ligacao->prepare("SELECT nome_utilizador FROM utilizadores WHERE nome_utilizador=? AND palavra_passe=?");
    $sql->bind_param("ss", $username, $password);
    $sql->execute();
    $sql->store_result();

    if ($sql->num_rows == 1) {
        $_SESSION['autenticado'] = true;
        $_SESSION['username'] = $username;

        if($username == "Admin" && $password == "administrador") {
            header("Location: ../php/menu_admin.php");
        } else {
            header("Location: ../index.php");
        }
    } else {
        $_SESSION['autenticado'] = false;
        header("Location: ../php/login-registo.php");
        exit;
    }

    $sql->close();
    $ligacao->close();
?>