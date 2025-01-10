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