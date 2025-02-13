<!DOCTYPE html>
<html lang="pt-PT">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Utilizadores</title>
    <link rel="stylesheet" href="../css/ver_user.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>
    <div class="top-bar">
        <div class="group">
            <input id="query" class="input" type="text" placeholder="Procurar..." name="searchbar" />
            <button onclick="loadRegisto()">
                <i class='bx bx-plus'></i>
                <span> Registar </span>
            </button>
        </div>
    </div>

    <?php
    // Ligar à base de dados
    $ligacao = new mysqli('localhost', 'root', '', 'gestao_utilizadores');

    // Verificar a ligação
    if ($ligacao->connect_error) {
        die('Não foi possível conectar à base de dados: ' . $ligacao->connect_error);
    }

    // Consultar utilizadores com is_admin diferente de 2
    $sql_admins = 'SELECT * FROM utilizadores WHERE is_admin != 2 ORDER BY is_admin DESC';
    $consulta_admins = $ligacao->query($sql_admins);

    // Verificar se existem utilizadores
    $tem_administradores = $consulta_admins->num_rows > 0;
    ?>

    <div class="container">
        <?php if ($tem_administradores): ?>
            <div class="card-grid">
                <?php
                while ($mostrar = $consulta_admins->fetch_assoc()) {
                    $id = $mostrar['id'];
                    $nome_utilizador = $mostrar['nome_utilizador'];
                    $email = $mostrar['email'];
                    $is_admin = $mostrar['is_admin'];

                    $tipo_utilizador = $is_admin == 1 ? 'Administrador' : 'Cliente';
                    ?>

                    <div class="card">
                        <h2><?php echo $nome_utilizador; ?></h2>
                        <p><strong>ID:</strong> <?php echo $id; ?></p>
                        <p><strong>Email:</strong> <?php echo $email; ?></p>
                        <p><strong>Tipo de Utilizador:</strong> <?php echo $tipo_utilizador; ?></p>
                        <div class="buttons">
                            <a href="processos/processar_alterar.php?id=<?php echo $id; ?>">
                                <button class="editBtn">Editar<i class='bx bxs-edit'></i></button>
                            </a>
                            <a href="processos/processar_eliminar.php?id=<?php echo $id; ?>"
                                onclick="return confirm('Deseja realmente excluir este utilizador?')">
                                <button class="deleteBtn">Eliminar<i class='bx bxs-trash-alt'></i></button>
                            </a>
                        </div>
                    </div>

                <?php } ?>
            </div>
        <?php else: ?>
            <p>Não há registos de utilizadores na base de dados.</p>
        <?php endif; ?>

        <?php
        // Liberar memória e fechar ligação
        $consulta_admins->free_result();
        $ligacao->close();
        ?>
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