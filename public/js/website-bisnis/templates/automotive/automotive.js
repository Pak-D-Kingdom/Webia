document.addEventListener('DOMContentLoaded', () => {
    const menu = document.querySelector('.auto-menu');
    const nav = document.querySelector('.auto-nav');
    const form = document.querySelector('#auto-quote-form');
    const status = document.querySelector('.form-status');

    menu?.addEventListener('click', () => {
        const isOpen = nav?.classList.toggle('is-open') ?? false;
        menu.setAttribute('aria-expanded', String(isOpen));
        menu.setAttribute('aria-label', isOpen ? 'Tutup menu' : 'Buka menu');
    });

    nav?.querySelectorAll('a').forEach((link) => {
        link.addEventListener('click', () => {
            nav.classList.remove('is-open');
            menu?.setAttribute('aria-expanded', 'false');
            menu?.setAttribute('aria-label', 'Buka menu');
        });
    });

    form?.addEventListener('submit', (event) => {
        event.preventDefault();
        status.textContent = '';

        const requiredFields = [...form.querySelectorAll('[required]')];
        const invalidField = requiredFields.find((field) => !field.value.trim());
        const email = form.elements.email;
        const emailValid = email?.validity.valid ?? true;

        if (invalidField || !emailValid) {
            status.textContent = invalidField ? 'Lengkapi field yang wajib diisi.' : 'Masukkan alamat email yang valid.';
            (invalidField || email)?.focus();
            return;
        }

        status.textContent = 'Data tervalidasi. Hubungi kami via WhatsApp untuk melanjutkan booking.';
        form.reset();
    });
});
