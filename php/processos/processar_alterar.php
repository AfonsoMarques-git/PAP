<!DOCTYPE html>
<html lang="pt-PT">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Utilizador</title>
    <link rel="stylesheet" href="../../css/alter_user_process.css">
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

    // Atualizar os dados do utilizador
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $novo_nome = $_POST['nome_utilizador'];
        $novo_email = $_POST['email'];
        $novo_user_type = $_POST['is_admin'];

        // Atualizar na base de dados
        $sql_update = "UPDATE utilizadores SET nome_utilizador = ?, email = ?, is_admin = ? WHERE id = ?";
        $stmt_update = $ligacao->prepare($sql_update);
        $stmt_update->bind_param('ssii', $novo_nome, $novo_email, $novo_user_type, $id);

        if ($stmt_update->execute()) {
            echo '<div class="mensagem">Utilizador atualizado com sucesso!</div>';
        } else {
            echo '<div class="mensagem" style="background-color: #f8d7da; color: #721c24; border-color: #f5c6cb;">Erro ao atualizar os dados do utilizador.</div>';
        }

        $stmt_update->close();
    }

    // Obter os dados atualizados do utilizador
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

    $stmt->close();
    $ligacao->close();
    ?>

    <div class="formulario">
        <h1>Editar Utilizador</h1>
        <form action="" method="post">
            <label for="nome_utilizador">Nome de Utilizador:</label>
            <input type="text" id="nome_utilizador" name="nome_utilizador"
                value="<?= htmlspecialchars($utilizador['nome_utilizador']) ?>" required>

            <label for="email">Endereço Eletrónico:</label>
            <input type="email" id="email" name="email" value="<?= htmlspecialchars($utilizador['email']) ?>" required>

            <label for="is_admin">Tipo de Utilizador</label>
            <select id="is_admin" name="is_admin" required>
                <option value="1" <?= $utilizador['is_admin'] == 1 ? 'selected' : '' ?>>Administrador</option>
                <option value="0" <?= $utilizador['is_admin'] == 0 ? 'selected' : '' ?>>Cliente</option>
            </select>

            <button type="submit">Guardar Alterações</button>
        </form>
        <a href="../menu_Sadmin.php">Voltar</a>
    </div>
    <script>
        // Remove a mensagem após 3 segundos
        setTimeout(() => {
            const mensagem = document.querySelector('.mensagem');
            if (mensagem) {
                mensagem.style.opacity = '0';
                setTimeout(() => mensagem.remove(), 500);
            }
        }, 3000);
    </script>
</body>

</html>