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
        <?php include 'header.php'; ?>
        <div class="section-head">
            <p>Página Principal > Contactos</p>
            <h1>Os nossos contactos</h1>
        </div>
    </div>
    <div class="contact-container">
        <form id="contactForm" action="https://api.web3forms.com/submit" method="POST" class="contact-form">
            <div class="form">
                <div class="contact-info">
                    <h3 class="title">Contacte-nos</h3>
                    <p class="text">
                        Se tem alguma dúvida ou quer planear o seu evento com bastantes promenores, preencha o
                        formulário e nós entraremos em contacto consigo.
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
                            <a href="#">
                                <i class='bx bxl-facebook'></i>
                            </a>
                            <a href="#">
                                <i class='bx bxl-twitter'></i>
                            </a>
                            <a href="#">
                                <i class='bx bxl-instagram'></i>
                            </a>
                            <a href="#">
                                <i class='bx bxl-linkedin'></i>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="contact-form">
                    <div class="input-container">
                        <input type="text" name="nome" class="input" />
                        <span>Nome Completo</span>
                    </div>
                    <div class="input-container">
                        <input type="email" name="email" class="input" />
                        <span>Email</span>
                    </div>
                    <div class="input-container">
                        <input type="tel" name="telemovel" class="input" />
                        <span>Contacto Telefónico</span>
                    </div>
                    <div class="input-container textarea">
                        <textarea name="mensagem" class="input"></textarea>
                        <span>Mensagem</span>
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

    <!-- Success Message (Hidden by Default) -->
    <div id="successMessage"
        style="display: none; text-align: center; padding: 20px; font-size: 18px; color: green; margin-bottom: 20px">
        <h2>Thank you!</h2>
        <p>Your message has been sent successfully.</p>
        <p>Returning to form in <span id="countdown">3</span> seconds...</p>
    </div>
    </div>
    <?php include 'footer.php'; ?>
    <script>
        document.getElementById("contactForm").onsubmit = function (event) {
            event.preventDefault(); // Prevent default form submission

            let formData = new FormData(this);

            fetch("https://api.web3forms.com/submit", {
                method: "POST",
                body: formData
            })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        document.getElementById("contactForm").style.display = "none"; // Hide form
                        document.getElementById("successMessage").style.display = "block"; // Show success message

                        let countdown = 3;
                        let countdownElement = document.getElementById("countdown");

                        let interval = setInterval(function () {
                            countdown--;
                            countdownElement.textContent = countdown;
                            if (countdown <= 0) {
                                clearInterval(interval);
                                document.getElementById("successMessage").style.display = "none"; // Hide success message
                                document.getElementById("contactForm").reset(); // Reset form
                                document.getElementById("contactForm").style.display = "flex"; // Show form again
                            }
                        }, 1000);
                    } else {
                        alert("Error submitting the form. Please try again.");
                    }
                })
                .catch(error => console.error("Error:", error));
        };
    </script>

</body>

</html>