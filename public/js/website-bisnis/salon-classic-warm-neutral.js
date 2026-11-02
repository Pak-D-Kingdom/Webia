(() => {
    'use strict';
    const root = document.querySelector('.classic-salon');
    if (!root) return;

    const menuToggle = root.querySelector('.classic-menu-toggle');
    const nav = root.querySelector('#classic-nav');
    if (menuToggle && nav) {
        menuToggle.addEventListener('click', () => {
            const open = nav.classList.toggle('is-open');
            menuToggle.setAttribute('aria-expanded', String(open));
            menuToggle.setAttribute('aria-label', open ? 'Tutup menu' : 'Buka menu');
        });
        nav.querySelectorAll('a').forEach(link => link.addEventListener('click', () => {
            nav.classList.remove('is-open');
            menuToggle.setAttribute('aria-expanded', 'false');
        }));
    }

    const dateInput = root.querySelector('#classic-booking-date');
    if (dateInput) {
        const today = new Date();
        const localToday = new Date(today.getTime() - today.getTimezoneOffset() * 60000).toISOString().slice(0, 10);
        dateInput.min = localToday;
    }

    root.querySelectorAll('.classic-select-service').forEach(button => {
        button.addEventListener('click', () => {
            const select = root.querySelector('#classic-booking-service');
            if (select) select.value = button.dataset.service || '';
            root.querySelector('#classic-booking')?.scrollIntoView({ behavior: 'smooth', block: 'start' });
        });
    });

    root.querySelector('#classic-booking-form')?.addEventListener('submit', event => {
        event.preventDefault();
        const form = event.currentTarget;
        if (!form.reportValidity()) return;
        const data = new FormData(form);
        // Ganti nomor ini dengan nomor WhatsApp resmi salon, menggunakan kode negara tanpa tanda +.
        const whatsappNumber = '6281234567890';
        const message = [
            'Halo Maison Élise Salon, saya ingin mengajukan booking.',
            '',
            `Nama: ${data.get('name')}`,
            `Nomor WhatsApp: ${data.get('phone')}`,
            `Layanan: ${data.get('service')}`,
            `Tanggal pilihan: ${data.get('date')}`,
            `Waktu pilihan: ${data.get('time')}`,
            `Catatan: ${data.get('note') || '-'}`,
            '',
            'Mohon konfirmasi ketersediaan jadwal. Terima kasih.'
        ].join('\n');
        window.open(`https://wa.me/${whatsappNumber}?text=${encodeURIComponent(message)}`, '_blank', 'noopener,noreferrer');
    });

    const chatToggle = root.querySelector('#classic-chat-toggle');
    const chatPanel = root.querySelector('#classic-chat-panel');
    const chatClose = root.querySelector('#classic-chat-close');
    const chatBody = root.querySelector('#classic-chat-body');
    const chatForm = root.querySelector('#classic-chat-form');
    const chatInput = root.querySelector('#classic-chat-question');
    const responses = {
        services: 'Kami menyediakan Cut & Styling, Hair Coloring, dan Hair Treatment. Pilih layanan yang paling sesuai, atau konsultasikan kebutuhanmu dengan tim salon.',
        price: 'Harga demo: Cut & Styling Rp85.000, Hair Coloring mulai Rp250.000, dan Hair Treatment mulai Rp150.000. Harga akhir dan durasi dapat berubah sesuai kebutuhan rambut; silakan konfirmasi ke salon.',
        booking: 'Pilih layanan lalu isi nama, nomor WhatsApp, tanggal, dan waktu pada formulir booking. Tombol booking akan menyiapkan pesan WhatsApp untuk dikirim ke tim salon.',
        location: 'Alamat dan jam operasional pada halaman ini masih berupa data demo. Hubungi tim salon untuk memperoleh alamat dan jadwal yang sudah terverifikasi.'
    };
    const appendReply = text => {
        if (!chatBody) return;
        const reply = document.createElement('p');
        reply.className = 'classic-chat-reply';
        reply.textContent = text;
        chatBody.appendChild(reply);
        chatBody.scrollTop = chatBody.scrollHeight;
    };
    const showChat = show => {
        if (!chatPanel || !chatToggle) return;
        chatPanel.hidden = !show;
        chatToggle.setAttribute('aria-expanded', String(show));
        if (show) chatInput?.focus();
    };
    chatToggle?.addEventListener('click', () => showChat(chatPanel?.hidden ?? true));
    chatClose?.addEventListener('click', () => showChat(false));
    root.querySelectorAll('[data-question]').forEach(button => {
        button.addEventListener('click', () => appendReply(responses[button.dataset.question] || 'Silakan hubungi tim salon untuk informasi lebih lanjut.'));
    });
    chatForm?.addEventListener('submit', event => {
        event.preventDefault();
        const question = (chatInput?.value || '').trim();
        if (!question) return;
        appendReply(`Pertanyaan kamu: “${question}”\n\nAsisten ini masih berupa simulasi frontend dan belum terhubung ke AI Business Chatbot. Untuk jawaban akurat, silakan hubungi salon melalui WhatsApp.`);
        chatInput.value = '';
    });

    const year = root.querySelector('#classic-year');
    if (year) year.textContent = String(new Date().getFullYear());
})();
