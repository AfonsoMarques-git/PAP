<?php
// Verifica se o usuário está logado
$isLoggedIn = isset($_SESSION['username']);
?>

<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" type="text/css" href="css/galeria.css">
    <link rel="stylesheet" type="text/css" href="css/header.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galeria de Fotos</title>
</head>

<body>
    <div class="container">
        <?php include 'header.php'; ?>
        <div class="section-head">
            <p>Página Principal > Galeria</p>
            <h1>Galeria de fotos</h1>
        </div>
    </div>
    <section class="galeria">

        <main class="mainContainer">
            <div class="button-group">
                <button class="button active" data-filter="*">Todas as fotos</button>
                <button class="button" data-filter=".casamento">Casamentos</button>
                <button class="button" data-filter=".batizado">Batizados</button>
                <button class="button" data-filter=".festa_empresarial">Festas empresariais</button>
            </div>

            <div class="gallery">

                <div class="item casamento">
                    <img src="images/casamento_card.jpg">
                </div>

                <div class="item batizado">
                    <img src="images/batizado_card.jpg">
                </div>

                <div class="item festa_empresarial">
                    <img src="images/festa_empresarial.jpg">
                </div>

                <div class="item casamento">
                    <img src="images/casamento_img2.jpg">
                </div>

                <div class="item batizado">
                    <img src="images/batizado_img2.jpg">
                </div>

                <div class="item festa_empresarial">
                    <img src="images/festa_empresarial2.jpg">
                </div>

                <div class="item casamento">
                    <img src="images/casamento_img3.jpg">
                </div>

                <div class="item batizado">
                    <img src="images/batizado_img3.jpg">
                </div>

                <div class="item festa_empresarial">
                    <img src="images/festa_empresarial3.jpg">
                </div>

            </div>

        </main>

    </section>

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
                <li>
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
                <li>
                    <a href="#" class="footer-link">Carrinho</a>
                </li>
            </ul>
        </div>

        <div id="footer_copyright">
            &#169
            2025 todos os direitos reservados
        </div>
    </footer>



    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.isotope/3.0.6/isotope.pkgd.min.js"></script>

    <script type="text/javascript">
        var $galleryContainer = $('.gallery').isotope({
            itemSelector: '.item',
            layoutMode: 'fitRows'
        })

        $('.button-group .button').on('click', function () {
            $('.button-group .button').removeClass('active');
            $(this).addClass('active');

            var value = $(this).attr('data-filter');
            $galleryContainer.isotope({
                filter: value
            })
        })
    </script>

</body>

</html>