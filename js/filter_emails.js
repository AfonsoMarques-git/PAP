function filterEmails(origem) {
    console.log(`Filtering emails by origem: ${origem}`);
    const cards = document.querySelectorAll('.card');
    cards.forEach(card => {
        if (origem === 'todos' || card.getAttribute('data-origem') === origem) {
            card.style.display = 'block';
        } else {
            card.style.display = 'none';
        }
    });
}