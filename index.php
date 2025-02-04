<?php
// Verifica se o usuário está logado
$isLoggedIn = isset($_SESSION['username']);
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/style.css" />
    <link rel="stylesheet" type="text/css" href="css/header.css" />
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Página Principal</title>
</head>

<body>
    <div class="container">
        <?php include 'header.php'; ?>
        <section>
            <div class="contact-info">
                <h1>Organize já o seu evento!</h1>
            </div>
            <div class="form">
                <div class="contact-form">
                    <form action="index.html" autocomplete="off">
                        <h3 class="title">Contact us</h3>
                        <div class="input-container">
                            <input type="text" name="name" class="input" placeholder="Nome" />
                            <span>Nome</span>
                        </div>
                        <div class="input-container">
                            <input type="email" name="email" class="input" placeholder="Email" />
                            <span>Email</span>
                        </div>
                        <div class="input-container">
                            <input type="tel" name="telemovel" class="input" placeholder="Telemóvel" />
                            <span>Telemóvel</span>
                        </div>
                        <div class="input-container textarea">
                            <textarea name="mensagem" class="input" placeholder="Mensagem"></textarea>
                            <span>Mensagem</span>
                        </div>
                        <input type="submit" value="Enviar" class="btn" />
                    </form>
                </div>
            </div>
        </section>

    </div>

    <!-- Full-screen overlay for the menu -->
    <div id="menu-overlay"></div>

    <div class="contentor">
        <div class="event-cards">
            <div class="card-events">
                <div class="left">
                    <img src="images/temp/casamento_card.jpg?time=<?php echo time(); ?>" alt="Casamento"
                        onerror="this.src='images/casamento_card.jpg?time=<?php echo time(); ?>'">
                </div>
                <div class="right">
                    <h1>Casamentos</h1>
                    <p>O casamento deve ser um compromisso feliz e espontâneo. Não um encargo pesado, uma obrigação. No
                        casamento deve haver união, porque quando duas pessoas se juntam é para remar na mesma direção.
                        O casamento é apenas o começo! Um laço de amor que pode guardar um presente maravilhoso para o
                        futuro.</p>
                    <button>Planeie um casamento</button>
                </div>
            </div>

            <div class="card-events">
                <div class="left">
                    <img src="images/temp/batizado_card.jpg?time=<?php echo time(); ?>" alt="Batizado"
                        onerror="this.src='images/batizado_card.jpg?time=<?php echo time(); ?>'">
                </div>
                <div class="right">
                    <h1>Batizados</h1>
                    <p>O batizado deve ser um compromisso de fé e alegria. Não apenas uma formalidade, mas um momento
                        especial de dedicação e esperança. No batismo, há união, porque é o início de uma jornada
                        espiritual compartilhada com Deus. O batizado é apenas o começo! Um laço de fé que guarda um
                        presente maravilhoso para o futuro.</p>
                    <button>Planeie um batizado</button>
                </div>
            </div>

            <div class="card-events">
                <div class="left">
                    <img src="images/temp/outros_eventos_card.jpg?time=<?php echo time(); ?>" alt="Outros eventos"
                        onerror="this.src='images/outros_eventos_card.jpg?time=<?php echo time(); ?>'">
                </div>
                <div class="right">
                    <h1>Outros eventos</h1>
                    <p>Outros eventos como festas de aniversário, chás revelação e eventos corporativos são momentos de
                        alegria e união. Cada celebração é uma oportunidade de criar memórias e fortalecer laços. Mais
                        que datas no calendário, são instantes que dão sentido à vida. Comemore, compartilhe e torne
                        cada momento inesquecível.</p>
                    <button>Planeie outro evento</button>
                </div>
            </div>
        </div>

        <div class="gallery-title">
            <h1>Eventos Mais Recentes</h1>
            <p>Veja a nossa galeria de fotografias</p>
        </div>

        <div class="gallery">
            <a href="php/galeria.php" class="img1"><img src="images/casamento_img2.jpg" alt="Casamento"></a>
            <a href="php/galeria.php" class="img2"><img src="images/batizado_img3.jpg" alt="Batizado"></a>
            <a href="php/galeria.php" class="img3"><img src="images/festa_empresarial2.jpg" alt="Festa"></a>
            <a href="php/galeria.php" class="img4"><img src="images/coracao_faisca.jpg" alt="Aniversário"></a>
        </div>
    </div>
    <footer>
        <div id="footer_content">
            <div id="footer_contacts">
                <a href="index.php"><img src="images/Log0_Branco.png" alt="Logótipo"></a>
                <p>A transformar sonhos em realidade!</p>

                <div id="footer_social_media">
                    <a href="https://www.instagram.com/companhia_da_mariposa.pt/" target="_blank" class="footer-link"
                        id="instagram">
                        <i class='bx bxl-instagram'></i>
                    </a>

                    <a href="https://www.facebook.com/CompanhiaDaMariposa" target="_blank" class="footer-link"
                        id="facebook">
                        <i class='bx bxl-facebook'></i>
                    </a>

                    <a href="https://wa.me/+351933514971" target="_blank" class="footer-link" id="whatsapp">
                        <i class='bx bxl-whatsapp'></i>
                    </a>
                </div>
            </div>

            <ul>

            </ul>

            <ul class="footer-list">
                <li>
                    <h3>Contactos</h3>
                </li>
                <li>
                    <a href="#" class="footer-link"><i class='bx bxl-gmail'></i>info@companhiadamariposa.pt</a>
                </li>
                <li>
                    <a href="tel:+351934558971" class="footer-link"><i class='bx bxs-phone'></i>+351 933514971</a>
                </li>
                <a href="#" class="footer-link"><i class='bx bxs-map'></i>Centro Comercial Passerelle</a>
                </li>
            </ul>

            <ul class="footer-list">
                <li>
                    <h3>A minha conta</h3>
                </li>
                <li>
                    <a href="#" class="footer-link">Dados da conta</a>
                </li>
                <li>
                    <a href="#" class="footer-link">Encomendas</a>
                </li>
                <a href="#" class="footer-link">Carrinho</a>
                </li>
            </ul>
        </div>

        <div id="footer_copyright">
            &#169
            2025 todos os direitos reservados
        </div>
    </footer>
    <script>
        const menuToggle = document.getElementById('menu-toggle');
        const menu = document.getElementById('menu');
        const menuOverlay = document.getElementById('menu-overlay');

        menuToggle.addEventListener('click', () => {
            menu.classList.toggle('active');
            menuOverlay.classList.toggle('active');
            menuToggle.classList.toggle('active');
        });

        menuOverlay.addEventListener('click', () => {
            menu.classList.remove('active');
            menuOverlay.classList.remove('active');
            menuToggle.classList.remove('active');
        });
    </script>
</body>

</html>