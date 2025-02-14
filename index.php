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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" />
    <title>Página Principal - Eventos</title>
</head>

<body>
    <div class="container">
        <?php include 'header-events.php'; ?>
        <section class="section-banner"
            style="background: url('images/temp/fundo_home3.jpg?time=<?php echo time(); ?>') no-repeat; background-size: cover;">
            <div class="contact-info">
                <h1>Organize o seu evento!</h1>
            </div>
            <div class="form">
                <div class="contact-form">
                    <form id="eventForm" action="php/processos/processar_formularios.php" method="POST"
                        autocomplete="off">
                        <input type="hidden" name="access_key" value="f0638e0d-8f15-4185-800c-2b72e655a53b">
                        <input type="hidden" name="subject" value="Formuário de Evento">
                        <input type="hidden" name="from_name" value="Companhia da Mariposa">
                        <input type="hidden" name="selected_date" value="">
                        <input type="hidden" name="origem" value="eventos">
                        <div class="input-boxes">
                            <div class="input-container">
                                <input type="text" name="nome" class="input" placeholder="Nome" required />
                            </div>
                            <div class="input-container">
                                <input type="email" name="email" class="input" placeholder="Email" required />
                            </div>
                            <div class="input-container">
                                <input type="tel" name="telemovel" class="input" placeholder="Contacto Telefónico"
                                    required />
                            </div>
                            <select name="event-option" id="event-option">
                                <option value="" disabled selected>Tipo de Evento</option>
                                <option value="Casamentos">Casamento</option>
                                <option value="Batizados">Batizado</option>
                                <option value="Aniversários">Festa de Aniversário</option>
                                <option value="Empresarial">Empresarial</option>
                            </select>
                            <div class="datepicker-container">
                                <input type="text" class="date-input" placeholder="Escolher data" required />

                                <div class="datepicker" hidden>
                                    <!-- .datepicker-header -->
                                    <div class="datepicker-header">
                                        <button class="prev">
                                            < </button>

                                                <div class="month-year">
                                                    <select class="month-input">
                                                        <option>Janeiro</option>
                                                        <option>Fevereiro</option>
                                                        <option>Março</option>
                                                        <option>Abril</option>
                                                        <option>Maio</option>
                                                        <option>Junho</option>
                                                        <option>Julho</option>
                                                        <option>Agosto</option>
                                                        <option>Setembro</option>
                                                        <option>Outubro</option>
                                                        <option>Novembro</option>
                                                        <option>Dezembro</option>
                                                    </select>
                                                    <input type="number" class="year-input" min="2025" />
                                                </div>

                                                <button class="next">></button>
                                    </div>
                                    <!-- /.datepicker-header -->

                                    <!-- .days -->
                                    <div class="days">
                                        <span>Seg</span>
                                        <span>Ter</span>
                                        <span>Qua</span>
                                        <span>Qui</span>
                                        <span>Sex</span>
                                        <span>Sab</span>
                                        <span>Dom</span>
                                    </div>
                                    <!-- /.days -->

                                    <!-- .dates -->
                                    <div class="dates"></div>
                                    <!-- /.dates -->

                                    <div class="datepicker-footer">
                                        <button class="clear">Limpar</button>
                                        <button class="today">Hoje</button>
                                    </div>
                                </div>
                            </div>
                            <div class="input-container">
                                <input type="number" name="n_pessoas" class="input" placeholder="Número de Pessoas"
                                    min="1" required />
                            </div>
                            <div class="input-container textarea">
                                <textarea name="mensagem" class="input" placeholder="Mensagem"></textarea>
                            </div>
                        </div>
                        <input type="checkbox" name="botcheck" class="hidden" style="display: none;">
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
            <a href="galeria.php" class="img1"><img src="images/casamento_img2.jpg" alt="Casamento"></a>
            <a href="galeria.php" class="img2"><img src="images/batizado_img3.jpg" alt="Batizado"></a>
            <a href="galeria.php" class="img3"><img src="images/festa_empresarial2.jpg" alt="Festa"></a>
            <a href="galeria.php" class="img4"><img src="images/coracao_faisca.jpg" alt="Aniversário"></a>
        </div>

        <div class="testimonials-head">
            <h1>O que os nossos clientes dizem!</h1>
            <p>Veja por si mesmo a experiência que produzimos</p>
        </div>
        <section class="testimonials">
            <div class="testimonial-card">
                <div class="testimonial-author">
                    <img src="images/avatar1.jpg" alt="Avatar">
                    <h1>Maria Silva</h1>
                </div>
                <p>"O nosso casamento foi um sonho tornado realidade! A equipa cuidou de todos os detalhes com
                    profissionalismo e dedicação, tornando o nosso dia ainda mais especial."</p>
                <h6>Casamento 2023</h6>
            </div>
            <div class="testimonial-card">
                <div class="testimonial-author">
                    <img src="images/avatar2.jpg" alt="Avatar">
                    <h1>João Pereira</h1>
                </div>
                <p>"O batizado do nosso filho foi um momento inesquecível. A organização impecável e a atenção aos
                    detalhes fizeram toda a diferença. Recomendamos vivamente!"</p>
                <h6>Batizado 2024</h6>
            </div>
            <div class="testimonial-card">
                <div class="testimonial-author">
                    <img src="images/avatar3.jpg" alt="Avatar">
                    <h1>Rodrigo Pinto</h1>
                </div>
                <p>"A minha festa de aniversário foi um sucesso absoluto! A equipa criou um ambiente animado e
                    divertido, superando todas as minhas expectativas. Obrigada por tornarem este dia tão especial!"</p>
                <h6>Festa de Aniversário 2025</h6>
            </div>
        </section>
    </div>

    <?php include('footer.php') ?>
    <script>
        /* MENU HAMBURGUER */
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


        /* CALENDARIO PARA EVENTOS */
        const datepicker = document.querySelector(".datepicker");
        const dateInput = document.querySelector(".date-input");
        const yearInput = datepicker.querySelector(".year-input");
        const monthInput = datepicker.querySelector(".month-input");
        const nextBtn = datepicker.querySelector(".next");
        const prevBtn = datepicker.querySelector(".prev");
        const dates = datepicker.querySelector(".dates");

        const todayBtn = datepicker.querySelector(".today");
        const clearBtn = datepicker.querySelector(".clear");

        let selectedDate = new Date();
        let year = selectedDate.getFullYear();
        let month = selectedDate.getMonth();

        const currentDate = new Date();
        const currentYear = currentDate.getFullYear();
        const currentMonth = currentDate.getMonth();

        // show datepicker
        dateInput.addEventListener("click", () => {
            datepicker.hidden = false;
        });

        // handle next month nav
        nextBtn.addEventListener("click", () => {
            if (month === 11) year++;
            month = (month + 1) % 12;
            displayDates();
        });

        // handle prev month nav
        prevBtn.addEventListener("click", () => {
            if (month === 0) year--;
            month = (month - 1 + 12) % 12;
            displayDates();
        });

        // handle month input change event
        monthInput.addEventListener("change", () => {
            month = monthInput.selectedIndex;
            displayDates();
        });

        // handle year input change event
        yearInput.addEventListener("change", () => {
            year = yearInput.value;
            displayDates();
        });

        const updateYearMonth = () => {
            monthInput.selectedIndex = month;
            yearInput.value = year;
        };

        const handleDateClick = (e) => {
            const button = e.target;

            // remove the 'selected' class from other buttons
            const selected = dates.querySelector(".selected");
            selected && selected.classList.remove("selected");

            // add the 'selected' class to current button
            button.classList.add("selected");

            // set the selected date
            selectedDate = new Date(year, month, parseInt(button.textContent));

            // set the selected date to date input
            dateInput.value = selectedDate.toLocaleDateString("pt-PT", {
                year: "numeric",
                month: "2-digit",
                day: "2-digit",
            });

            // set the selected date to hidden input field
            document.querySelector('input[name="selected_date"]').value = selectedDate.toISOString().split('T')[0];

            // hide datepicker
            datepicker.hidden = true;
        };

        // render the dates in the calendar interface
        const displayDates = () => {
            // update year & month whenever the dates are updated
            updateYearMonth();

            // disable prev button if current month and year are reached
            prevBtn.disabled = year === currentYear && month === currentMonth;

            // clear the dates
            dates.innerHTML = "";

            //* display the last week of previous month

            // get the last date of previous month
            const lastOfPrevMonth = new Date(year, month, 0);

            for (let i = 0; i <= lastOfPrevMonth.getDay(); i++) {
                const text = lastOfPrevMonth.getDate() - lastOfPrevMonth.getDay() + i;
                const button = createButton(text, true, -1);
                dates.appendChild(button);
            }

            //* display the current month

            // get the last date of the month
            const lastOfMOnth = new Date(year, month + 1, 0);

            for (let i = 1; i <= lastOfMOnth.getDate(); i++) {
                const button = createButton(i, false);
                button.addEventListener("click", handleDateClick);
                dates.appendChild(button);
            }

            //* display the first week of next month

            const firstOfNextMonth = new Date(year, month + 1, 1);

            for (let i = firstOfNextMonth.getDay(); i < 7; i++) {
                const text = firstOfNextMonth.getDate() - firstOfNextMonth.getDay() + i;

                const button = createButton(text, true, 1);
                dates.appendChild(button);
            }
        };

        const createButton = (text, isDisabled = false, type = 0) => {
            const currentDate = new Date();

            // determine the date to compare based on the button type
            let comparisonDate = new Date(year, month + type, text);

            // check if the current button is the date today
            const isToday =
                currentDate.getDate() === text &&
                currentDate.getFullYear() === year &&
                currentDate.getMonth() === month;

            // check if the current button is selected
            const selected = selectedDate && selectedDate.getTime() === comparisonDate.getTime();

            const button = document.createElement("button");
            button.textContent = text;
            button.disabled = isDisabled;
            button.classList.toggle("today", isToday && !isDisabled);
            button.classList.toggle("selected", selected);
            return button;
        };

        displayDates();

        document.addEventListener('click', (event) => {
            if (!datepicker.contains(event.target) && event.target !== dateInput) {
                datepicker.hidden = true;
            }
        });

        todayBtn.addEventListener("click", () => {
            selectedDate = new Date();
            year = selectedDate.getFullYear();
            month = selectedDate.getMonth();
            displayDates();
            dateInput.value = selectedDate.toLocaleDateString("pt-PT", {
                year: "numeric",
                month: "2-digit",
                day: "2-digit",
            });
            document.querySelector('input[name="selected_date"]').value = selectedDate.toISOString().split('T')[0];
            datepicker.hidden = true;
        });

        clearBtn.addEventListener("click", () => {
            selectedDate = null;
            dateInput.value = "";
            document.querySelector('input[name="selected_date"]').value = "";
            displayDates();
            datepicker.hidden = true;
        });
    </script>
</body>

</html>