<?php
session_start();
$error = isset($_SESSION['error']) ? $_SESSION['error'] : '';
unset($_SESSION['error']);

$success = isset($_SESSION['success']) ? $_SESSION['success'] : '';
unset($_SESSION['success']);
?>
<!DOCTYPE html>
<html lang="pt-PT">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="../css/login-registo.css">
    <title>Login | Registo</title>
</head>

<body>

    <div class="container" id="container">
        <div class="form-container registo">
            <form id="form_registo" name="form_registo" method="POST" action="../php/processos/processar_login_registo.php">
                <h1 class="titulo">Realizar Registo</h1>
                
                <?php if (isset($_SESSION['error_registo_normal'])): ?>
                    <div class="erro"><?php echo htmlspecialchars($_SESSION['error_registo_normal']); ?></div>
                <?php unset($_SESSION['error_registo_normal']); endif; ?>


                <input type="hidden" name="is_admin" value="0"> <!-- Para registo normal -->
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
                    <input type="password" name="confirm_password" id="password-inputC-P" placeholder="Confirmar Password">
                    <i class="fa fa-eye icon" id="btn-passwordC-P" onclick="mostrarPasswordCP()"></i>
                </div>
                <button type="submit" name="enviar" id="enviar" class="btn-criaconta">Registar</button>
            </form>
        </div>
        <div class="form-container login">
            <form id="form_registo" name="form_registo" method="POST" action="../php/processos/processar_login_registo.php">
                <h1 class="titulo">Login</h1>

                <?php if (isset($_SESSION['error_login'])): ?>
                    <div class="erro"><?php echo htmlspecialchars($_SESSION['error_login']); ?></div>
                <?php unset($_SESSION['error_login']); endif; ?>


                <input type="hidden" name="form_type" value="login">
                <div class="input-box">
                    <i class="fa fa-user icon"></i>
                    <input type="text" name="nome" id="nome" placeholder="Nome">
                </div>
                <div class="input-box">
                    <input type="password" name="password" id="password-input-login" placeholder="Password">
                    <i class="fa fa-eye icon" id="btn-password-login" onclick="mostrarPasswordLogin()"></i>
                </div>
                <a href="../request_otp.php">Esqueceu-se da sua password?</a>
                <button type="submit" name="entrar" id="entrar" class="btn-login">Login</button>
            </form>
        </div>
        <div class="toggle-container">
            <div class="toggle">
                <div class="toggle-panel toggle-left">
                    <h1>Bem-vindo de volta!</h1>
                    <p>Insira os seus dados para usufruir do site por completo</p>
                    <button class="btnLR" id="login">Login</button>
                </div>
                <div class="toggle-panel toggle-right">
                    <h1>Seja bem-vindo!</h1>
                    <p>Registe-se com os seus dados para usufruir do site por completo</p>
                    <button class="btnLR" id="registo">Registar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Exibir mensagem de sucesso se existirem -->
    <?php if ($success): ?>
    <script>
        window.onload = function() {
            alert("<?php echo htmlspecialchars($success); ?>");
        };
    </script>
    <?php endif; ?>

    <script src="../js/main.js"></script>
</body>

</html>