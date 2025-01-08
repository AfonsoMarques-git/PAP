<?php
    session_start(); // Inicia a sessão

    // Ligar à base de dados usando MySQLi
    $ligacao = new mysqli('localhost', 'root', '', 'gestao_utilizadores');

    // Verificar a ligação
    if ($ligacao->connect_error) {
        die('Não foi possível ligar à base de dados: ' . $ligacao->connect_error);
    }

    // Definir $username e $password
    $username = $_POST['nome'];
    $password = $_POST['password'];

    // Preparar e executar a consulta segura
    $sql = $ligacao->prepare("SELECT nome_utilizador FROM utilizadores WHERE nome_utilizador=? AND palavra_passe=?");
    $sql->bind_param("ss", $username, $password);
    $sql->execute();
    $sql->store_result();

    // Verificar se o login foi bem-sucedido
    if ($sql->num_rows == 1) {
        // Definir variáveis de sessão para autenticação
        $_SESSION['autenticado'] = true;
        $_SESSION['username'] = $username; // Opcional: para exibir o nome do usuário no menu

        if($username == "Admin" && $password == "administrador") {
            header("Location: ../html/admin_menu.html");
        } else {
            header("Location: ../index.php");
        }
    } else {
        // Se o login falhar, redireciona para login.html
        $_SESSION['autenticado'] = false;
        header("Location: ../html/login.html");
        exit;
    }

    // Fechar a conexão com o banco de dados
    $sql->close();
    $ligacao->close();
?>
