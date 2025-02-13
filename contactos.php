<!DOCTYPE html>
<html lang="pt-PT">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Contact Form</title>
    <link rel="stylesheet" href="css/contactos.css" />
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/footer.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>
    <div class="container">
        <?php include 'header-events.php'; ?>
        <div class="section-head">
            <div class="section-head-path">
                <a href="index.php">Página Principal</a>
                <p>> Contactos</p>
            </div>
            <h1>Os nossos contactos</h1>
        </div>
    </div>
    <div class="contact-container">
        <form id="contactForm" action="" method="POST" class="contact-form">
            <input type="hidden" name="access_key" value="2cd62894-bead-4900-885d-5039f6430c57">
            <input type="hidden" name="subject" value="Formulário de Contacto">
            <input type="hidden" name="from_name" value="Companhia da Mariposa">
            <div class="form">
                <div class="contact-info">
                    <h3 class="title">Contacte-nos</h3>
                    <p class="text">
                        Se tem alguma dúvida na parte dos eventos ou nos produtos preencha este formulário e entraremos
                        em contacto assim que possível
                    </p>

                    <div class="info">
                        <div class="information">
                            <i class='bx bxs-map'></i>
                            <p>Centro Comercial Passerelle</p>
                        </div>
                        <div class="information">
                            <i class='bx bxl-gmail'></i>
                            <p>geral@companhiadamariposa.pt</p>
                        </div>
                        <div class="information">
                            <i class='bx bxs-phone'></i>
                            <p>+351 910604498</p>
                        </div>
                    </div>

                    <div class="social-media">
                        <p>Conecte-se connosco :</p>
                        <div class="social-icons">
                            <a href="https://www.facebook.com/CompanhiaDaMariposa">
                                <i class='bx bxl-facebook'></i>
                            </a>
                            <a href="https://www.instagram.com/companhia_da_mariposa.pt/">
                                <i class='bx bxl-instagram'></i>
                            </a>
                            <a href="">
                                <i class='bx bxl-linkedin'></i>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="contact-form">
                    <div class="input-container">
                        <input type="text" name="nome" class="input" placeholder="Nome" />
                    </div>
                    <div class="input-container">
                        <input type="email" name="email" class="input" placeholder="Email" />
                    </div>
                    <div class="input-container">
                        <input type="tel" name="telemovel" class="input" placeholder="Contacto Telefónico" />
                    </div>
                    <div class="input-container textarea">
                        <textarea name="mensagem" class="input" placeholder="Mensagem"></textarea>
                    </div>
                    <input type="submit" value="Send" class="btn" />
                </div>
            </div>
        </form>
    </div>

    <div class="map">
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2988.8237373471225!2d-8.349519323453272!3d41.486420889845796!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd24faf0be2d28c9%3A0x2c0a01717d5d2b8!2sCompanhia%20da%20Mariposa!5e0!3m2!1spt-PT!2spt!4v1738838338997!5m2!1spt-PT!2spt"
            width="100%" height="700px" style="border:0; padding: 100px; background-color: #fafafa;" allowfullscreen=""
            loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>

    <!-- Success Message Pop-up -->
    <div id="success-popup" class="popup">
        <span class="popup-message">Formulário enviado com sucesso!</span>
        <button id="close-popup">Fechar</button>
    </div>

    <?php include 'footer.php'; ?>
    <script>
        document.getElementById('contactForm').addEventListener('submit', function (e) {
            e.preventDefault();

            const formData = new FormData(this);

            fetch('php/processos/form_contacto_process_data.php', {
                method: 'POST',
                body: formData
            }).then(response => response.json())
                .then(result => {
                    if (result.success) {
                        document.getElementById("success-popup").style.display = "block"; // Show success pop-up
                        setTimeout(() => {
                            location.reload(); // Refresh the page after 3 seconds
                        }, 3000);
                    } else {
                        alert(result.message);
                    }
                }).catch(error => {
                    console.error('Error:', error);
                });
        });

        document.getElementById('close-popup').addEventListener('click', function () {
            document.getElementById('success-popup').style.display = 'none'; // Hide success pop-up
            location.reload(); // Refresh the page when the pop-up is closed
        });
    </script>

</body>

</html>