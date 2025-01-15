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

// Confirmar eliminação de registo no menu Administrador
function confirmarEliminacao() {
    return confirm("Tem a certeza que deseja apagar este registo?");
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