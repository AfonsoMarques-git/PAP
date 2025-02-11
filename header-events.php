<?php
// Inicia a sessão
session_start();

// Verifica se o usuário está logado
$isLoggedIn = isset($_SESSION['username']);

// Verifica se a página atual é galeria.php
$currentPage = basename($_SERVER['PHP_SELF']);
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
            <a href="index-products.php" class="highlight">Compra e Aluguer</a>
            <a href="https://casamentos.companhiadamariposa.pt/" target="_blank">Casamentos</a>
            <a href="galeria.php" class="<?php echo $currentPage == 'galeria.php' ? 'current-page' : ''; ?>">Galeria</a>
            <a href="contactos.php" class="<?php echo $currentPage == 'contactos.php' ? 'current-page' : ''; ?>">Contactos</a>
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
