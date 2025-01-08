<?php
session_start();

$isLoggedIn = isset($_SESSION['username']);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/style.css" />
    <title>Página Principal</title>
</head>
<body>
    <div class="container">
        <header>
            <div class="navegacao">
                <div class="logo">
                    <a href="index_admin.php">
                        <img src="images/LogoCDMW.png" alt="logotipo">
                    </a>
                </div>

                <div class="navegar">
                    <div>
                        <nav class="events">
                            <a href="../html/manutencao.html">Eventos</a>
                        </nav>
                    </div>

                    <div class="menu-container">
                        <nav class="menu">
                            <a href="../html/manutencao.html">Personalizáveis</a>
                            <a href="../html/manutencao.html">Balões</a>
                            <a href="../html/manutencao.html">Madeiras</a>
                            <a href="../html/manutencao.html">Casamentos</a>
                            <a href="../html/manutencao.html">Aluguer</a>
                        </nav>
                    </div>

                    <div class="actions">
                        <div class="login-registo">
                            <?php if ($isLoggedIn): ?>
                                <span class="user">Olá, <?php echo $_SESSION['username']; ?>!</span>
                                <a href="logout.php" class="logout">Log Out</a>
                                <a href="../html/admin_menu.html"> Voltar</a>
                            <?php else: ?>
                                <a href="../html/login.html" class="login">Login</a>
                                <a href="../html/registo.html" class="registo">Registo</a>
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
            <img src="../images/baloes.png" alt="Produto 1">
            <div class="content">
                <h3>Produto 1</h3>
                <p>Descrição breve do produto 1.</p>
            </div>
        </div>
        <div class="card">
            <img src="https://via.placeholder.com/300x200" alt="Produto 2">
            <div class="content">
                <h3>Produto 2</h3>
                <p>Descrição breve do produto 2.</p>
            </div>
        </div>
        <div class="card">
            <img src="https://via.placeholder.com/300x200" alt="Produto 3">
            <div class="content">
                <h3>Produto 3</h3>
                <p>Descrição breve do produto 3.</p>
            </div>
        </div>
        <div class="card">
            <img src="https://via.placeholder.com/300x200" alt="Produto 4">
            <div class="content">
                <h3>Produto 4</h3>
                <p>Descrição breve do produto 4.</p>
            </div>
        </div>
    </div>
</body>
</html>
