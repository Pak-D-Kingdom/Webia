
/* WEBIA - Mobile Navigation */
document.addEventListener('DOMContentLoaded', () => {
    const toggle = document.querySelector('.webia-menu-toggle');
    const navigation = document.querySelector('#webia-navigation');

    if (!toggle || !navigation) return;

    toggle.addEventListener('click', () => {
        const isOpen = navigation.classList.toggle('is-open');

        toggle.setAttribute('aria-expanded', String(isOpen));
        toggle.setAttribute(
            'aria-label',
            isOpen ? 'Tutup menu navigasi' : 'Buka menu navigasi'
        );
    });

    navigation.querySelectorAll('a').forEach((link) => {
        link.addEventListener('click', () => {
            navigation.classList.remove('is-open');
            toggle.setAttribute('aria-expanded', 'false');
            toggle.setAttribute('aria-label', 'Buka menu navigasi');
        });
    });
});

