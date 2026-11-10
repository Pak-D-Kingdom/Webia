(() => {
    const menu = document.querySelector('#nbMenu');
    const nav = document.querySelector('#nbNav');
    menu?.addEventListener('click', () => {
        const open = nav.classList.toggle('nb-open');
        menu.setAttribute('aria-expanded', String(open));
    });
    nav?.querySelectorAll('a').forEach((link) => link.addEventListener('click', () => {
        nav.classList.remove('nb-open');
        menu?.setAttribute('aria-expanded', 'false');
    }));
    const form = document.querySelector('#nbBookingForm');
    const status = document.querySelector('#nbFormStatus');
    form?.addEventListener('submit', (event) => {
        event.preventDefault();
        const data = new FormData(form);
        const name = String(data.get('name') || '').trim();
        const phone = String(data.get('phone') || '').trim();
        const email = String(data.get('email') || '').trim();
        if (!name || !phone || !email) {
            status.textContent = 'Please complete your name, email, and WhatsApp number.';
            return;
        }
        const message = ['Hello Northline, I would like to book a free consultation.', '', `Name: ${name}`, `Email: ${email}`, `WhatsApp: ${phone}`, `Goal: ${data.get('goal')}`, `Notes: ${data.get('message') || 'No additional notes.'}`].join('\n');
        status.textContent = 'Opening WhatsApp with your consultation request…';
        window.open(`https://wa.me/${window.NORTHLINE_CONFIG?.whatsappNumber || '628112040880'}?text=${encodeURIComponent(message)}`, '_blank', 'noopener,noreferrer');
    });
    const year = document.querySelector('#nbYear');
    if (year) year.textContent = new Date().getFullYear();
})();