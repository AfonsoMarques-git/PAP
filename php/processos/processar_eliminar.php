<?php
session_start(); // Iniciar sessão

// Ligar à base de dados
$ligacao = new mysqli('localhost', 'root', '', 'gestao_utilizadores');

// Verificar a ligação
if ($ligacao->connect_error) {
    $_SESSION['error_menu'] = 'Erro ao conectar à base de dados.';
    header('Location: ../menu_Sadmin.php');
    exit;
}

// Verificar se o ID foi passado via GET
if (isset($_GET['id'])) {
    $id = intval($_GET['id']); // Sanitizar o ID

    // Verificar se o utilizador existe
    $verificar_admin = "SELECT nome_utilizador FROM utilizadores WHERE id = ?";
    $stmt_verificar = $ligacao->prepare($verificar_admin);

    if ($stmt_verificar) {
        $stmt_verificar->bind_param("i", $id);
        $stmt_verificar->execute();
        $resultado = $stmt_verificar->get_result();

        if ($resultado->num_rows > 0) {
            // Eliminar o utilizador
            $sql = "DELETE FROM utilizadores WHERE id = ?";
            $stmt = $ligacao->prepare($sql);

            if ($stmt) {
                $stmt->bind_param("i", $id);

                if ($stmt->execute()) {
                    $_SESSION['success_menu'] = 'Utilizador eliminado com sucesso!';
                } else {
                    $_SESSION['error_menu'] = 'Erro ao eliminar utilizador.';
                }

                $stmt->close();
            } else {
                $_SESSION['error_menu'] = 'Erro na preparação da consulta.';
            }
        } else {
            $_SESSION['error_menu'] = 'Utilizador não encontrado.';
        }

        $stmt_verificar->close();
    } else {
        $_SESSION['error_menu'] = 'Erro na verificação do utilizador.';
    }
} else {
    $_SESSION['error_menu'] = 'ID do utilizador não fornecido.';
}

// Fechar a ligação
$ligacao->close();

// Redirecionar para menu_Sadmin.php
header('Location: ../menu_Sadmin.php');
exit;
?>