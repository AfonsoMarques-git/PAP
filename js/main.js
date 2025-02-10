function mostrarPasswordP() {
    const inputPassP = document.getElementById('password-input-P');
    const btnShowPassP = document.getElementById('btn-password-P');

    if (inputPassP.type === 'password') {
        inputPassP.setAttribute('type', 'text');
        btnShowPassP.classList.replace('fa-eye', 'fa-eye-slash');
    } else {
        inputPassP.setAttribute('type', 'password');
        btnShowPassP.classList.replace('fa-eye-slash', 'fa-eye');
    }
}

function mostrarPasswordCP() {
    const inputPassC = document.getElementById('password-inputC-P');
    const btnShowPassC = document.getElementById('btn-passwordC-P');

    if (inputPassC.type === 'password') {
        inputPassC.setAttribute('type', 'text');
        btnShowPassC.classList.replace('fa-eye', 'fa-eye-slash');
    } else {
        inputPassC.setAttribute('type', 'password');
        btnShowPassC.classList.replace('fa-eye-slash', 'fa-eye');
    }
}

function mostrarPasswordLogin() {
    const inputPassLogin = document.getElementById('password-input-login');
    const btnShowPassLogin = document.getElementById('btn-password-login');

    if (inputPassLogin.type === 'password') {
        inputPassLogin.setAttribute('type', 'text');
        btnShowPassLogin.classList.replace('fa-eye', 'fa-eye-slash');
    } else {
        inputPassLogin.setAttribute('type', 'password');
        btnShowPassLogin.classList.replace('fa-eye-slash', 'fa-eye');
    }
}

// Login e Registo animação
const container = document.getElementById('container');
const registerBtn = document.getElementById('registo');
const loginBtn = document.getElementById('login');

registerBtn.addEventListener('click', () => {
    container.classList.add("active");
});

loginBtn.addEventListener('click', () => {
    container.classList.remove("active");
});

window.onload = function() {
    const container = document.getElementById('container');
    const registoErro = document.querySelector('.registo .erro');
    const loginErro = document.querySelector('.login .erro');

    if (registoErro) {
        container.classList.add('active'); // Mostra o lado do registo
    }

    if (loginErro) {
        container.classList.remove('active'); // Mostra o lado do login
    }
};


document.getElementById('enviar').addEventListener('click', function() {
    var form = document.forms['form_registo'];
    var formData = new FormData(form);

    // Usar Ajax para enviar o formulário
    var xhr = new XMLHttpRequest();
    xhr.open('POST', '../php/processar_registo_admin.php', true);
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            var response = JSON.parse(xhr.responseText);

            if (response.status === 'error') {
                // Exibir a mensagem de erro abaixo do título
                document.getElementById('error-message').textContent = response.message;
            } else if (response.status === 'success') {
                // Exibir mensagem de sucesso em um alert
                alert(response.message);
                // Redirecionar para a página menu_Sadmin.php após sucesso
                window.location.href = 'menu_Sadmin.php';
            }
        }
    };
    xhr.send(formData);
});

const createButton = (text, isDisabled = false, type = 0) => {
    const currentDate = new Date();
    const today = new Date(currentDate.getFullYear(), currentDate.getMonth(), currentDate.getDate());

    // determine the date to compare based on the button type
    let comparisonDate = new Date(year, month + type, text);

    // check if the current button is the date today
    const isToday =
        currentDate.getDate() === text &&
        currentDate.getFullYear() === year &&
        currentDate.getMonth() === month;

    // check if the current button is selected
    const selected = selectedDate.getTime() === comparisonDate.getTime();

    // disable dates before today
    if (comparisonDate < today) {
        isDisabled = true;
    }

    const button = document.createElement("button");
    button.textContent = text;
    button.disabled = isDisabled;
    button.classList.toggle("today", isToday && !isDisabled);
    button.classList.toggle("selected", selected);
    return button;
};