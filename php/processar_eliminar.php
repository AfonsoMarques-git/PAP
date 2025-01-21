<?php
// Ligar à base de dados
$ligacao = new mysqli('localhost', 'root', '', 'gestao_utilizadores');

// Verificar a ligação
if ($ligacao->connect_error) {
    die('Erro ao conectar à base de dados: ' . $ligacao->connect_error);
}

// Verificar se o ID foi passado via GET
if (isset($_GET['id'])) {
    $id = intval($_GET['id']); // Sanitizar o ID para garantir que é um número

    // Verificar se o utilizador é "Admin"
    $verificar_admin = "SELECT nome_utilizador FROM utilizadores WHERE id = $id";
    $resultado = $ligacao->query($verificar_admin);

    // Eliminar o utilizador
    $sql = "DELETE FROM utilizadores WHERE id = ?";
    $stmt = $ligacao->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("i", $id);

        if ($stmt->execute()) {
            echo "<script>
                    alert('Utilizador eliminado com sucesso!');
                    window.location.href = 'menu_Sadmin.php';
                  </script>";
        } else {
            echo "<script>
                    alert('Erro ao eliminar utilizador: {$stmt->error}');
                    window.location.href = 'menu_Sadmin.php';
                  </script>";
        }

        $stmt->close();
    } else {
        echo "<script>
                alert('Erro na preparação da consulta!');
                window.location.href = 'menu_Sadmin.php';
              </script>";
    }
} else {
    echo "<script>
            alert('ID do utilizador não fornecido.');
            window.location.href = 'menu_Sadmin.php';
          </script>";
}

// Fechar a ligação
$ligacao->close();
?>
