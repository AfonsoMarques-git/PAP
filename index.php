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
                            <a href="">Compra e Aluguer</a>
                        </nav>
                        <nav class="menu">
                            <a href="html/manutencao.html">Personalizáveis</a>
                            <a href="html/manutencao.html">Balões</a>
                            <a href="html/manutencao.html">Casamentos</a>
                            <a href="html/manutencao.html">Aluguer</a>
                            <a href="html/manutencao.html">Contactos</a>
                        </nav>
                    </div>

                    <div class="actions">
                        <div class="login-registo">
                            <?php if ($isLoggedIn): ?>
                                <a href="html/perfil.html"><span class="user">Olá,
                                        <?php echo $_SESSION['username']; ?>!</span></a>
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
        <div class="event-cards">
            <div class="card-events">
                <div class="left">
                    <img src="images/casamento_card.jpg" alt="Casamento">
                </div>
                <div class="right">
                    <h1>Casamentos</h1>
                    <p>O casamento deve ser um compromisso feliz e espontâneo. Não um encargo pesado, uma obrigação. No
                        casamento deve haver união, porque quando duas pessoas se juntam é para remar na mesma direção.
                        O
                        casamento é apenas o começo! Um laço de amor que pode guardar um presente maravilhoso para o
                        futuro.
                    </p>
                    <button>Planeie um casamento</button>
                </div>
            </div>

            <div class="card-events">
                <div class="left">
                    <img src="images/batizado_card.jpg" alt="Outros eventos">
                </div>
                <div class="right">
                    <h1>Batizados</h1>
                    <p>O batizado deve ser um compromisso de fé e alegria. Não apenas uma formalidade, mas um momento
                        especial de dedicação e esperança. No batismo, há união, porque é o início de uma jornada
                        espiritual compartilhada com Deus. O batizado é apenas o começo! Um laço de fé que guarda um
                        presente maravilhoso para o futuro.</p>
                    <button>Planeie outro evento</button>
                </div>
            </div>

            <div class="card-events">
                <div class="left">
                    <img src="images/outros_eventos_card.jpg" alt="Outros eventos">
                </div>
                <div class="right">
                    <h1>Outros eventos</h1>
                    <p>Outros eventos como festas de aniversário, chás revelação e eventos corporativos são momentos de
                        alegria e união. Cada celebração é uma oportunidade de criar memórias e fortalecer laços. Mais
                        que
                        datas no calendário, são instantes que dão sentido à vida. Comemore, compartilhe e torne cada
                        momento inesquecível.</p>
                    <button>Planeie outro evento</button>
                </div>
            </div>
        </div>
    </div>
</body>

</html>