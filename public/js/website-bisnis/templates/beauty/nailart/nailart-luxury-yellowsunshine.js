document.addEventListener('DOMContentLoaded', function () {
    const menuToggle = document.querySelector('.soleil-menu-toggle');
    const nav = document.getElementById('soleil-nav');
    if (menuToggle && nav) {
        menuToggle.addEventListener('click', function () {
            const open = nav.classList.toggle('is-open');
            menuToggle.setAttribute('aria-expanded', String(open));
            const label = menuToggle.querySelector('span');
            if (label) label.textContent = open ? '−' : '＋';
        });
        nav.querySelectorAll('a').forEach(function (link) {
            link.addEventListener('click', function () {
                nav.classList.remove('is-open');
                menuToggle.setAttribute('aria-expanded', 'false');
                const label = menuToggle.querySelector('span');
                if (label) label.textContent = '＋';
            });
        });
    }

    const year = document.getElementById('soleil-year');
    if (year) year.textContent = String(new Date().getFullYear());

    const bookingForm = document.getElementById('soleil-booking-form');
    if (bookingForm) {
        bookingForm.addEventListener('submit', function (event) {
            event.preventDefault();
            if (!bookingForm.reportValidity()) return;
            const data = new FormData(bookingForm);
            const name = String(data.get('name') || '').trim();
            const phone = String(data.get('phone') || '').trim();
            const service = String(data.get('service') || '').trim();
            const date = String(data.get('date') || '').trim();
            const notes = String(data.get('notes') || '').trim();
            const message = [
                'Halo Maison Soleil, saya ingin mengajukan appointment.',
                'Nama: ' + name,
                'WhatsApp: ' + phone,
                'Layanan: ' + service,
                'Tanggal pilihan: ' + date,
                notes ? 'Inspirasi/catatan: ' + notes : ''
            ].filter(Boolean).join('\n');
            window.open('https://wa.me/6285850180285?text=' + encodeURIComponent(message), '_blank', 'noopener');
        });
    }

    const panel = document.getElementById('soleil-ai-panel');
    const fab = document.getElementById('soleil-ai-fab');
    const close = document.getElementById('soleil-ai-close');
    const messages = document.getElementById('soleil-ai-messages');
    const form = document.getElementById('soleil-ai-form');
    const input = document.getElementById('soleil-ai-input');

    function setPanel(open) {
        if (!panel || !fab) return;
        panel.hidden = !open;
        fab.setAttribute('aria-expanded', String(open));
        if (open && input) input.focus();
    }
    function addMessage(text, isUser) {
        if (!messages) return;
        const p = document.createElement('p');
        p.className = 'soleil-ai-message' + (isUser ? ' is-user' : '');
        p.textContent = text;
        messages.appendChild(p);
        messages.scrollTop = messages.scrollHeight;
    }
    function respond(message) {
        const m = message.toLowerCase();
        if (m.includes('harga') || m.includes('price') || m.includes('menu') || m.includes('layanan')) {
            return 'Our atelier menu starts from Rp120k for The Reset Ritual, Rp180k for The Signature Manicure, Rp280k for The Golden Set, and Rp420k for The Private Creation. These are demo prices; please confirm availability with our team.';
        }
        if (m.includes('book') || m.includes('booking') || m.includes('appointment') || m.includes('reservasi') || m.includes('jadwal')) {
            return 'You can request an appointment using the booking form on this page. We will open WhatsApp so you can send your preferred service and date to our team.';
        }
        if (m.includes('private') || m.includes('group') || m.includes('bridal') || m.includes('pribadi')) {
            return 'Our private-client concept is designed for celebrations, bridal parties, and curated group sessions. Tap “Enquire privately” or contact us through WhatsApp for details.';
        }
        if (m.includes('lokasi') || m.includes('alamat') || m.includes('location') || m.includes('jam') || m.includes('operasional')) {
            return 'This demo template uses Jakarta, Indonesia and Tuesday–Sunday, 10.00–19.00 WIB as sample details. Please confirm the real address and hours with the studio.';
        }
        return 'Thank you for reaching out to Maison Soleil. I can help with our menu, appointment requests, and private-client concept. For confirmed information, please contact our team on WhatsApp.';
    }
    if (fab) fab.addEventListener('click', function () { setPanel(panel.hidden); });
    if (close) close.addEventListener('click', function () { setPanel(false); });

    document.querySelectorAll('[data-soleil-quick]').forEach(function (button) {
        button.addEventListener('click', function () {
            const text = button.getAttribute('data-soleil-quick') || '';
            addMessage(text, true);
            window.setTimeout(function () { addMessage(respond(text), false); }, 220);
        });
    });
    if (form && input) {
        form.addEventListener('submit', function (event) {
            event.preventDefault();
            const text = input.value.trim();
            if (!text) return;
            addMessage(text, true);
            input.value = '';
            window.setTimeout(function () { addMessage(respond(text), false); }, 220);
        });
    }
});