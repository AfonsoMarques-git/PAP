function mostrarPassword() {
    const inputPass = document.getElementById('password-input');
    const btnShowPass = document.getElementById('btn-password');

    if (inputPass.type === 'password') {
        inputPass.setAttribute('type', 'text');
        btnShowPass.src = '../images/esconder.png';
    } else {
        inputPass.setAttribute('type', 'password');
        btnShowPass.src = '../images/ver.png';
    }
}

function mostrarPasswordC() {
    const inputPass = document.getElementById('password-inputC');
    const btnShowPass = document.getElementById('btn-passwordC');

    if (inputPass.type === 'password') {
        inputPass.setAttribute('type', 'text');
        btnShowPass.src = '../images/esconder.png';
    } else {
        inputPass.setAttribute('type', 'password');
        btnShowPass.src = '../images/ver.png';
    }
}

function mostrarPasswordAdmin() {
    const inputPassAdmin = document.getElementById('password-input-Admin');
    const btnShowPassAdmin = document.getElementById('btn-password-Admin');

    if (inputPassAdmin.type === 'password') {
        inputPassAdmin.setAttribute('type', 'text');
        btnShowPassAdmin.src = '../images/close_eye.png';
    } else {
        inputPassAdmin.setAttribute('type', 'password');
        btnShowPassAdmin.src = '../images/open_eye.png';
    }
}

function mostrarPasswordCAdmin() {
    const inputPassAdmin = document.getElementById('password-inputC-Admin');
    const btnShowPassAdmin = document.getElementById('btn-passwordC-Admin');

    if (inputPassAdmin.type === 'password') {
        inputPassAdmin.setAttribute('type', 'text');
        btnShowPassAdmin.src = '../images/close_eye.png';
    } else {
        inputPassAdmin.setAttribute('type', 'password');
        btnShowPassAdmin.src = '../images/open_eye.png';
    }
}