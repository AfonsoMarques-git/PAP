<!DOCTYPE html>
<html lang="pt-PT">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="../css/registo_admin.css">
    <title>Registar Administradores</title>
</head>

<body>
    <div class="container" id="container">
        <div class="form-container registo">
            <form id="form_registo" name="form_registo" method="POST" action="../php/processar_login_registo.php">
                <h1 class="titulo">Realizar Registo</h1>

                <?php if (isset($_SESSION['error_registo_admin'])): ?>
                    <div class="erro"><?php echo htmlspecialchars($_SESSION['error_registo_admin']); ?></div>
                    <?php unset($_SESSION['error_registo_admin']); endif; ?>


                <input type="hidden" name="is_admin" value="1"> <!-- Para registo de administrador -->
                <input type="hidden" name="is_admin" value="2"> <!-- Para registo de super administrador -->

                <input type="hidden" name="form_type" value="registo">
                <div class="input-box">
                    <i class="fa fa-user icon"></i>
                    <input type="text" name="nome" id="nome" placeholder="Nome">
                </div>
                <div class="input-box">
                    <i class="fa fa-envelope icon"></i>
                    <input type="email" name="email" id="email" placeholder="Email">
                </div>
                <div class="input-box">
                    <input type="password" name="password" id="password-input-P" placeholder="Password">
                    <i class="fa fa-eye icon" id="btn-password-P" onclick="mostrarPasswordP()"></i>
                </div>
                <div class="input-box">
                    <input type="password" name="confirm_password" id="password-inputC-P"
                        placeholder="Confirmar Password">
                    <i class="fa fa-eye icon" id="btn-passwordC-P" onclick="mostrarPasswordCP()"></i>
                </div>
                <div class="input-box-radio">
                    <div class="input-box-radio">
                        <label class="radio-button">
                            <input type="radio" name="is_admin" value="1" required>
                            <span class="radio"></span>
                            Administrador
                        </label>

                        <label class="radio-button">
                            <input type="radio" name="is_admin" value="2" required>
                            <span class="radio"></span>
                            Super Administrador
                        </label>
                    </div>
                </div>
                <button type="submit" name="enviar" id="enviar" class="btn-criaconta">Registar</button>
            </form>
        </div>
    </div>
    <script src="../js/main.js"></script>
</body>

</html>