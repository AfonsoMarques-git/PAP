<!DOCTYPE html>
<html lang="en">

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
            <h1>Contacte-nos</h1>
        </div>
    </div>
    <div class="contact-container">
        <form id="contactForm" action="https://api.web3forms.com/submit" method="POST" class="contact-right">
            <div class="contact-left">
                <h3 class="title">Let's get in touch</h3>
                <p class="text">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Saepe
                    dolorum adipisci recusandae praesentium dicta!
                </p>

                <div class="info">
                    <div class="information">
                        <i class='bx bxs-map'></i>
                        <p>Centro Commercial Passerelle</p>
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
                    <p>Connect with us :</p>
                    <div class="social-icons">
                        <a href="#">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="#">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                    </div>
                </div>
            </div>
            <input type="hidden" name="access_key" value="2cd62894-bead-4900-885d-5039f6430c57">
            <input type="text" name="name" placeholder="Nome" class="contact-inputs" required />
            <input type="email" name="email" placeholder="Email" class="contact-inputs" required />
            <textarea name="mensagem" placeholder="Mensagem" class="contact-inputs" required></textarea>
            <button type="submit">Submit <img src="images/arrow_icon.png" alt=""></button>
        </form>

        <!-- Success Message (Hidden by Default) -->
        <div id="successMessage"
            style="display: none; text-align: center; padding: 20px; font-size: 18px; color: green;">
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