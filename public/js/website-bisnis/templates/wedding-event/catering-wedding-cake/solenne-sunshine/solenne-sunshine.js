(() => {
    const menu = document.querySelector('#ssMenu');
    const nav = document.querySelector('#ssNav');
    menu?.addEventListener('click', () => {
        const open = nav.classList.toggle('ss-open');
        menu.setAttribute('aria-expanded', String(open));
    });
    nav?.querySelectorAll('a').forEach((link) => link.addEventListener('click', () => {
        nav.classList.remove('ss-open');
        menu?.setAttribute('aria-expanded', 'false');
    }));
    const form = document.querySelector('#ssInquiryForm');
    const status = document.querySelector('#ssFormStatus');
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
        const message = [
            'Hello Solenne & Sugar, I would love to plan a celebration.', '',
            `Name: ${name}`, `Email: ${email}`, `WhatsApp: ${phone}`,
            `Date: ${data.get('date') || 'Not decided yet'}`,
            `Guests: ${data.get('guests') || 'Not sure yet'}`,
            `Notes: ${data.get('message') || 'I would like to learn more.'}`
        ].join('\n');
        status.textContent = 'Opening WhatsApp with your consultation request…';
        window.open(`https://wa.me/${window.SOLENNE_CONFIG?.whatsappNumber || '6281234567890'}?text=${encodeURIComponent(message)}`, '_blank', 'noopener,noreferrer');
    });
    const year = document.querySelector('#ssYear');
    if (year) year.textContent = new Date().getFullYear();
})();