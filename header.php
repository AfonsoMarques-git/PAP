<?php
// Inicia a sessão
session_start();

// Verifica se o usuário está logado
$isLoggedIn = isset($_SESSION['username']);
?>
<link rel="stylesheet" href="../css/header.css">
<header>
    <div class="navegacao">
        <div class="logo">
            <a href="index.php"><img src="images/Log0_Preto.png" alt="Logo"></a>
        </div>
        <div class="hamburger-menu" id="menu-toggle">
            <span></span>
            <span></span>
            <span></span>
        </div>
        <nav class="menu" id="menu">
            <a href="" class="highlight">Compra e Aluguer</a>
            <a href="https://casamentos.companhiadamariposa.pt/" target="_self">Casamentos</a>
            <a href="galeria.php">Galeria</a>
            <a href="">Contactos</a>
            <div class="login-registo">
                <?php if ($isLoggedIn): ?>
                    <a href="html/perfil.html"><span class="user">Olá,
                            <?php echo $_SESSION['username']; ?>!</span></a>
                    <a href="php/logout.php" class="logout">Log Out</a>
                <?php else: ?>
                    <a href="php/login-registo.php" title="Login / Registo">Login / Registo</a>
                <?php endif; ?>
            </div>
        </nav>
    </div>
</header>
