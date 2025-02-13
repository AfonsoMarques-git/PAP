<?php
session_start();
$error = isset($_SESSION['error_menu']) ? $_SESSION['error_menu'] : '';
unset($_SESSION['error_menu']);

$success = isset($_SESSION['success_menu']) ? $_SESSION['success_menu'] : '';
unset($_SESSION['success_menu']);
?>

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
            <form id="form_registo" name="form_registo" method="POST"
                action="../php/processos/processar_registo_admin.php">
                <h1 class="titulo">Registar Utilizador</h1>

                <!-- Mostrar mensagem de sucesso -->
                <?php if ($success): ?>
                    <div class="sucesso"><?php echo htmlspecialchars($success); ?></div>
                <?php endif; ?>

                <!-- Mostrar mensagem de erro -->
                <?php if ($error): ?>
                    <div class="erro"><?php echo htmlspecialchars($error); ?></div>
                <?php endif; ?>

                <!-- Campo hidden para definir o tipo de formulário -->
                <input type="hidden" name="form_type" value="registo">

                <!-- Input Nome -->
                <div class="input-box">
                    <i class="fa fa-user icon"></i>
                    <input type="text" name="nome" id="nome" placeholder="Nome">
                </div>

                <!-- Input Email -->
                <div class="input-box">
                    <i class="fa fa-envelope icon"></i>
                    <input type="email" name="email" id="email" placeholder="Email">
                </div>

                <!-- Input Password -->
                <div class="input-box">
                    <input type="password" name="password" id="password-input-P" placeholder="Password">
                    <i class="fa fa-eye icon" id="btn-password-P" onclick="mostrarPasswordP()"></i>
                </div>

                <!-- Confirmar Password -->
                <div class="input-box">
                    <input type="password" name="confirm_password" id="password-inputC-P"
                        placeholder="Confirmar Password">
                    <i class="fa fa-eye icon" id="btn-passwordC-P" onclick="mostrarPasswordCP()"></i>
                </div>

                <div class="user-type">
                    <label class="radio-button">
                        <input type="radio" name="user-type" value="1">
                        <span class="radio"></span>
                        Administrador
                    </label>

                    <label class="radio-button">
                        <input type="radio" name="user-type" value="0">
                        <span class="radio"></span>
                        Cliente
                    </label>
                </div>

                <!-- Botão para Submissão -->
                <button type="submit" name="enviar" id="enviar" class="btn-criaconta">Registar</button>
                <button type="button" onclick="window.location.href='../php/menu_Sadmin.php'; loadVer();">Voltar</button>
            </form>
        </div>
    </div>

    <script src="../js/main.js"></script>
    <script src="../js/menu_admin.js"></script>
</body>

</html>