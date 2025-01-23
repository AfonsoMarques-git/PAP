<!DOCTYPE html>
<html lang="pt-PT">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Utilizador</title>
    <link rel="stylesheet" href="../css/processos_admin.css">
</head>
<body>
    <?php
        // Ligar à base de dados
        $ligacao = new mysqli('localhost', 'root', '', 'gestao_utilizadores');

        // Verificar a ligação
        if ($ligacao->connect_error) {
            die('Não foi possível conectar à base de dados: ' . $ligacao->connect_error);
        }

        // Obter o ID do utilizador
        $id = $_GET['id'] ?? null;

        // Obter os dados do utilizador
        $sql = "SELECT * FROM utilizadores WHERE id = ?";
        $stmt = $ligacao->prepare($sql);
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $resultado = $stmt->get_result();

        if ($resultado->num_rows === 1) {
            $utilizador = $resultado->fetch_assoc();
        } else {
            die('Utilizador não encontrado.');
        }

        // Atualizar os dados do utilizador
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $novo_nome = $_POST['nome_utilizador'];
            $novo_email = $_POST['email'];

            // Atualizar na base de dados
            $sql_update = "UPDATE utilizadores SET nome_utilizador = ?, email = ? WHERE id = ?";
            $stmt_update = $ligacao->prepare($sql_update);
            $stmt_update->bind_param('ssi', $novo_nome, $novo_email, $id);

            if ($stmt_update->execute()) {
                echo '<p>Utilizador atualizado com sucesso!</p>';
            } else {
                echo '<p>Erro ao atualizar os dados do utilizador.</p>';
            }

            $stmt_update->close();
        }

        $stmt->close();
        $ligacao->close();
    ?>

    <div class="formulario">
        <h1>Editar Utilizador</h1>
        <form action="" method="post">
            <label for="nome_utilizador">Nome de Utilizador:</label>
            <input type="text" id="nome_utilizador" name="nome_utilizador" value="<?= htmlspecialchars($utilizador['nome_utilizador']) ?>" required>

            <label for="email">Endereço Eletrónico:</label>
            <input type="email" id="email" name="email" value="<?= htmlspecialchars($utilizador['email']) ?>" required>

            <button type="submit">Guardar Alterações</button>
        </form>
        <a href="processos_admin/alter_user.php">Voltar</a>
    </div>
</body>
</html>
