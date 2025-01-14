<?php
// Inicia a sessão
session_start();

// Verifica se o usuário está logado
$isLoggedIn = isset($_SESSION['username']);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/style.css" />
    <title>Página Principal</title>
</head>
<body>
    <div class="container">
        <header>
            <div class="navegacao">
                <div class="logo">
                    <a href="index.php">
                        <img src="images/LogoCMW.png" alt="logotipo">
                    </a>
                </div>

                <div class="navegar">
                    <div class="menu-container">
                        <nav class="events">
                            <a href="html/manutencao.html">Eventos</a>
                        </nav>
                        <nav class="menu">
                            <a href="html/manutencao.html">Personalizáveis</a>
                            <a href="html/manutencao.html">Balões</a>
                            <a href="html/manutencao.html">Casamentos</a>
                            <a href="html/manutencao.html">Aluguer</a>
                        </nav>
                    </div>

                    <div class="actions">
                        <div class="login-registo">
                            <?php if ($isLoggedIn): ?>
                                <a href="html/perfil.html"><span class="user">Olá, <?php echo $_SESSION['username']; ?>!</span></a>
                                <a href="php/logout.php" class="logout">Log Out</a>
                            <?php else: ?>
                                <a href="php/login-registo.php"><img src="images/user..png" alt="Login e Registo" /></a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

            </div>
        </header>
        <div class="titulo">
            <h1> Organize o seu evento</h1>
        </div>
    </div>
    <div class="contentor">
        <div class="card">
            <img src="images/baloes.png" alt="Produto 1">
            <div class="content">
                <h3>Balões Latéx</h3>
                <p>Balões de látex são decorativos, ecológicos e perfeitos para dar vida às suas festas e eventos.</p>
            </div>
        </div>
        <div class="card">
            <img src="images/fachas.png" alt="Produto 2">
            <div class="content">
                <h3>Faixa de Cetim personalizada </h3>
                <p>Faixas de cetim elegantes e versáteis, ideais para personalizar eventos e presentes com charme.</p>
            </div>
        </div>
        <div class="card">
            <img src="images/decoracaoSala.jpg" alt="Produto 3">
            <div class="content">
                <h3>Decoração de Sala</h3>
                <p>Decoração de sala: transforme seu ambiente com estilo, conforto e toques personalizados.</p>
            </div>
        </div>
        <div class="card">
            <img src="images/insuflavel.jpg" alt="Produto 4">
            <div class="content">
                <h3>Insufláveis</h3>
                <p>Infláveis: diversão garantida com itens temáticos, práticos e personalizados para qualquer ocasião.</p>
            </div>
        </div>
    </div>
</body>
</html>
