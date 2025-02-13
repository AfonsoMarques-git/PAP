<?php
// Verifica se o usuário está logado
$isLoggedIn = isset($_SESSION['username']);
?>

<!DOCTYPE html>
<html lang="pt-PT">

<head>
    <link rel="stylesheet" type="text/css" href="css/galeria.css">
    <link rel="stylesheet" type="text/css" href="css/header.css">
    <link rel="stylesheet" type="text/css" href="css/footer.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galeria de Fotos</title>
</head>

<body>
    <div class="container">
        <?php include 'header-events.php'; ?>
        <div class="section-head">
            <div class="section-head-path">
                <a href="index.php">Página principal</a>
                <p>> Galeria</p>
            </div>
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

    <?php include('footer.php') ?>


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