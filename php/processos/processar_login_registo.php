<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $form_type = $_POST['form_type'] ?? ''; // Identifica se é login ou registo normal

    // Conexão com a base de dados
    $ligacao = new mysqli('localhost', 'root', '', 'gestao_utilizadores');
    if ($ligacao->connect_error) {
        die('Não foi possível ligar à base de dados: ' . $ligacao->connect_error);
    }

    // Lógica para o login
    if ($form_type === 'login') {
        $username = $_POST['nome'] ?? '';
        $password = $_POST['password'] ?? '';

        // Validar campos
        if (empty($username) || empty($password)) {
            $_SESSION['error_login'] = "É necessário preencher todos os campos.";
            header("Location: ../php/login-registo.php");
            exit;
        }

        $sql = $ligacao->prepare("SELECT nome_utilizador, is_admin FROM utilizadores WHERE nome_utilizador=? AND palavra_passe=?");
        $sql->bind_param("ss", $username, $password);
        $sql->execute();
        $sql->store_result();

        if ($sql->num_rows === 1) {
            $sql->bind_result($nome_utilizador, $is_admin);
            $sql->fetch();

            $_SESSION['autenticado'] = true;
            $_SESSION['username'] = $nome_utilizador;

            if ($is_admin == 1) {
                header("Location: ../php/menu_admin.php");
            } elseif ($is_admin == 2) {
                header("Location: ../php/menu_Sadmin.php");
            } else {
                header("Location: ../index.php");
            }
        } else {
            $_SESSION['error_login'] = "Nome de utilizador ou senha incorretos.";
            header("Location: ../php/login-registo.php");
        }
        $sql->close();
        $ligacao->close();
        exit;
    }

    // Lógica para o registo normal
    elseif ($form_type === 'registo') {
        $username = $_POST['nome'] ?? '';
        $password = $_POST['password'] ?? '';
        $confirm_password = $_POST['confirm_password'] ?? '';
        $email = $_POST['email'] ?? '';

        // Validar campos
        if (empty($username) || empty($password) || empty($confirm_password) || empty($email)) {
            $_SESSION['error_registo_normal'] = "É necessário preencher todos os campos.";
            header("Location: ../php/login-registo.php");
            exit;
        }

        if ($password !== $confirm_password) {
            $_SESSION['error_registo_normal'] = "As senhas não correspondem.";
            header("Location: ../php/login-registo.php");
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
                $_SESSION['error_registo_normal'] = "O nome de utilizador já está em uso.";
            } elseif ($user['email'] === $email) {
                $_SESSION['error_registo_normal'] = "Já existe uma conta com este email.";
            }
            $stmt->close();
            $ligacao->close();
            header("Location: ../php/login-registo.php");
            exit;
        }
        $stmt->close();

        // Inserir os dados
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $stmt = $ligacao->prepare("INSERT INTO utilizadores (nome_utilizador, palavra_passe, email, is_admin) VALUES (?, ?, ?, 0)");
            $stmt->bind_param("sss", $username, $password, $email);

            if ($stmt->execute()) {
                $_SESSION['success'] = "Registo efetuado com sucesso!";
                header("Location: ../php/login-registo.php");
            } else {
                $_SESSION['error_registo_normal'] = "Erro ao efetuar o registo. Tente novamente.";
                header("Location: ../php/login-registo.php");
            }
            $stmt->close();
        } else {
            $_SESSION['error_registo_normal'] = "Endereço de email inválido.";
            header("Location: ../php/login-registo.php");
        }
        $ligacao->close();
        exit;
    }
}
header("Location: ../php/login-registo.php");
exit;
?>
