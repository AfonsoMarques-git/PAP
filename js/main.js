// Login e Registo olho de ver password
function mostrarPasswordP() {
    const inputPassP = document.getElementById('password-input-P');
    const btnShowPassP = document.getElementById('btn-password-P');

    if (inputPassP.type === 'password') {
        inputPassP.setAttribute('type', 'text');
        btnShowPassP.src = '../images/close_eye.png';
    } else {
        inputPassP.setAttribute('type', 'password');
        btnShowPassP.src = '../images/open_eye.png';
    }
}

// Registo olho de ver confirmação de password
function mostrarPasswordCP() {
    const inputPassP = document.getElementById('password-inputC-P');
    const btnShowPassP = document.getElementById('btn-passwordC-P');

    if (inputPassP.type === 'password') {
        inputPassP.setAttribute('type', 'text');
        btnShowPassP.src = '../images/close_eye.png';
    } else {
        inputPassP.setAttribute('type', 'password');
        btnShowPassP.src = '../images/open_eye.png';
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