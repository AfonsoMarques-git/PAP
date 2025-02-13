<!DOCTYPE html>
<html lang="pt-PT">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contactos</title>
    <link rel="stylesheet" href="../css/contactos.css">
</head>

<body>
    <div class="container">
        <form action="processos/processar_formularios.php" method="POST">
            <input type="hidden" name="origem" value="contactos">
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="telemovel">Telemóvel:</label>
            <input type="text" id="telemovel" name="telemovel" required>

            <label for="mensagem">Mensagem:</label>
            <textarea id="mensagem" name="mensagem" required></textarea>

            <button type="submit">Enviar</button>
        </form>
    </div>
</body>

</html>
