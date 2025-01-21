<?php
// Ligar à base de dados
$ligacao = new mysqli('localhost', 'root', '', 'gestao_utilizadores');

// Verificar a ligação
if ($ligacao->connect_error) {
    die('Erro ao conectar à base de dados: ' . $ligacao->connect_error);
}

// Verificar se o ID do utilizador foi passado
if (isset($_GET['id'])) {
    $id = intval($_GET['id']); // Sanitizar o ID

    // Preparar a consulta para eliminar o utilizador
    $sql = "DELETE FROM utilizadores WHERE id = ?";
    $stmt = $ligacao->prepare($sql);

    if (!$stmt) {
        die('Erro na preparação da consulta: ' . $ligacao->error);
    }

    $stmt->bind_param("i", $id);

    // Executar a consulta
    if ($stmt->execute()) {
        echo "<script>alert('Utilizador eliminado com sucesso.');</script>";
    } else {
        echo "<script>alert('Erro ao eliminar utilizador: " . $stmt->error . "');</script>";
    }

    // Fechar a declaração
    $stmt->close();
} else {
    echo "<script>alert('ID do utilizador não fornecido.');</script>";
}

// Fechar a ligação
$ligacao->close();

// Redirecionar de volta para a página anterior
header("Location: ../php/menu_Sadmin.php");
exit();