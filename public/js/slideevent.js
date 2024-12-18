document.querySelectorAll('.next').forEach((nextButton) => {
    nextButton.addEventListener('click', function (e) {
        e.preventDefault();
        const container = nextButton.closest('.category').querySelector('.cards');
        const scrollAmount = container.querySelector('.card').offsetWidth + 50;
        container.scrollBy({ left: scrollAmount, behavior: 'smooth' });
    });
});

document.querySelectorAll('.prev').forEach((prevButton) => {
    prevButton.addEventListener('click', function (e) {
        e.preventDefault();
        const container = prevButton.closest('.category').querySelector('.cards');
        const scrollAmount = container.querySelector('.card').offsetWidth + 50;
        container.scrollBy({ left: -scrollAmount, behavior: 'smooth' });
    });
});


document.addEventListener('DOMContentLoaded', function () {
    const cards = document.querySelectorAll('.cardcomment');
    const dots = document.querySelectorAll('.pagination-dots .dot');

    // Créer un observateur pour détecter quand un élément entre dans le viewport
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                // Trouver l'index de la carte visible
                const index = Array.from(cards).indexOf(entry.target);

                // Mettre à jour les dots
                dots.forEach((dot, dotIndex) => {
                    dot.classList.toggle('active', dotIndex === index);
                });
            }
        });
    }, { threshold: 0.5 });

    // Observer chaque carte
    cards.forEach(card => {
        observer.observe(card);
    });
});