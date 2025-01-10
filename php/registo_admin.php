<!DOCTYPE html>
<html lang="pt-PT">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css"  href="../css/registo_admin.css" />
    <title>Criar Conta</title>
</head>
    <body>
    <div class="cabecalho">
        <?php
            include ("menu2.php");
        ?>
    </div>
    <div class="container">
        <form id="form_registo" name="form_registo" method="POST" action="processar_registo.php">
            <h1> Cria a tua conta </h1>
            <div class="input-box">
                <input type="text" name="nome" id="nome" placeholder="Nome" required>
                <img src="../images/user..png" class="icon">
            </div>

            <div class="input-box">
                <input type="password" name="password" placeholder="Password" required id="password-input-P">
                <img src="../images/open_eye.png" class="icon" id="btn-password-P" onclick="mostrarPasswordP()">
            </div>
            
            <div class="input-box">
                <input type="password" name="confirm_password" placeholder="Confirmar Password" required id="password-inputC-P">
                <img src="../images/open_eye.png" class="icon" id="btn-passwordC-P" onclick="mostrarPasswordCP()">
            </div>            

            <div class="input-box">
                <input type="email" name="email" id="email" placeholder="Email">
                <img src="../images/email.png" class="icon">
            </div>

            <br />
            <br />
            <button type="submit" name="enviar" id="enviar" class="btn-criaconta"> Criar Conta </button>
        </form>
    </div>
    <script src="../js/main.js"></script>
</body>
</html>