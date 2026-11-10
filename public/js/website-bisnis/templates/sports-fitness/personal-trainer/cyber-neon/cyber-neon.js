(() => {
    const menu = document.querySelector('#cgMenu');
    const nav = document.querySelector('#cgNav');
    menu?.addEventListener('click', () => {
        const open = nav.classList.toggle('cg-open');
        menu.setAttribute('aria-expanded', String(open));
    });
    nav?.querySelectorAll('a').forEach((link) => link.addEventListener('click', () => {
        nav.classList.remove('cg-open');
        menu?.setAttribute('aria-expanded', 'false');
    }));

    const filterButtons = document.querySelectorAll('.cg-program-filter button');
    const cards = document.querySelectorAll('.cg-program-grid article');
    filterButtons.forEach((button) => button.addEventListener('click', () => {
        filterButtons.forEach((item) => item.classList.remove('is-active'));
        button.classList.add('is-active');
        const filter = button.dataset.filter;
        cards.forEach((card) => card.classList.toggle('is-hidden', filter !== 'all' && card.dataset.type !== filter));
    }));

    const form = document.querySelector('#cgBookingForm');
    const status = document.querySelector('#cgFormStatus');
    form?.addEventListener('submit', (event) => {
        event.preventDefault();
        const data = new FormData(form);
        const name = String(data.get('name') || '').trim();
        const phone = String(data.get('phone') || '').trim();
        const email = String(data.get('email') || '').trim();
        if (!name || !phone || !email) {
            status.textContent = 'ERROR: name, email, and WhatsApp are required.';
            return;
        }
        const message = ['Hello VANTA//FORM, I want to initiate my transformation.', '', `Name: ${name}`, `Email: ${email}`, `WhatsApp: ${phone}`, `Protocol: ${data.get('program')}`, `Signal: ${data.get('message') || 'I would like to learn more.'}`].join('\n');
        status.textContent = 'TRANSMISSION SENT. Opening WhatsApp channel…';
        window.open(`https://wa.me/${window.VANTA_CONFIG?.whatsappNumber || '6281399007744'}?text=${encodeURIComponent(message)}`, '_blank', 'noopener,noreferrer');
    });
    const year = document.querySelector('#cgYear');
    if (year) year.textContent = new Date().getFullYear();
})();