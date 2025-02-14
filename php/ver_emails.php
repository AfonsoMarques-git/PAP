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
    <div class="container" style="padding: 30px;">
        <div class="title">
            <h1 class="center-title">Emails Recebidos</h1>
        </div>
        <div class="filter-buttons" style="margin-top: 20px;">
            <button onclick="filterEmails('todos')">Todos</button>
            <button onclick="filterEmails('contactos')">Contactos</button>
            <button onclick="filterEmails('eventos')">Eventos</button>
        </div>

        <?php
        // Ligar à base de dados
        $ligacao = new mysqli('localhost', 'root', '', 'companhia_da_mariposa');

        // Verificar a ligação
        if ($ligacao->connect_error) {
            die('Não foi possível conectar à base de dados: ' . $ligacao->connect_error);
        }

        // Consultar utilizadores com is_admin diferente de 2
        $sql = 'SELECT * FROM emails';
        $consulta = $ligacao->query($sql);

        // Verificar se existem utilizadores
        $tem_emails = $consulta->num_rows > 0;
        ?>

        <?php if ($tem_emails): ?>
            <div class="card-grid">
                <?php
                while ($email = $consulta->fetch_assoc()) {
                    $nome = $email['nome'];
                    $email_address = $email['email'];
                    $telemovel = $email['telemovel'];
                    $mensagem = $email['mensagem'];
                    $origem = $email['origem'];
                    ?>

                    <div class="card" data-origem="<?php echo $origem; ?>">
                        <div class="text">
                            <p><strong>Nome:</strong> <?php echo $nome; ?></p>
                            <p><strong>Email:</strong> <?php echo $email_address; ?></p>
                            <p><strong>Telemóvel:</strong> <?php echo $telemovel; ?></p>
                            <p><strong>Mensagem:</strong> <?php echo $mensagem; ?></p>
                            <?php if ($origem == 'eventos'): ?>
                                <p><strong>Data do Evento:</strong> <?php echo $email['data_evento']; ?></p>
                                <p><strong>Número de pessoas:</strong> <?php echo $email['n_pessoas']; ?></p>
                                <p><strong>Tipo de Evento:</strong> <?php echo $email['tipo_evento']; ?></p>
                            <?php endif; ?>
                        </div>
                        <div class="card-footer">
                            <a href="processos/processar_eliminar_email.php?id=<?php echo $email['id']; ?>"
                                onclick="return confirm('Deseja realmente excluir este email?')">
                                <button class="deleteBtn">Eliminar<i class='bx bxs-trash-alt'></i></button>
                            </a>
                        </div>
                    </div>

                <?php } ?>
            </div>
        <?php else: ?>
            <p>Não há emails recebidos.</p>
        <?php endif; ?>

        <?php
        // Liberar memória e fechar ligação
        $consulta->free_result();
        $ligacao->close();
        ?>
    </div>
    <script src="../js/filter_emails.js"></script>
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