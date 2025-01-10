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

function confirmarEliminacao() {
    return confirm("Tem a certeza que deseja apagar este registo?");
}

function exibirPopup(mensagem) {
    // Cria o contêiner do popup
    const popup = document.createElement('div');
    popup.classList.add('popup');
    popup.innerHTML = `
        <span>${mensagem}</span>
        <button onclick="fecharPopup(this)">×</button>
    `;

    // Adiciona o popup ao body
    document.body.appendChild(popup);

    // Remove automaticamente após 5 segundos
    setTimeout(() => {
        if (popup) popup.remove();
    }, 5000);
}

function fecharPopup(button) {
    // Remove o popup ao clicar no botão de fechar
    const popup = button.parentElement;
    if (popup) popup.remove();
}
