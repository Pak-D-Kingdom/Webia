document.addEventListener('DOMContentLoaded', () => {
    const root = document.querySelector('.sage-salon');
    if (!root) return;

    const menuToggle = root.querySelector('.sage-menu-toggle');
    const nav = root.querySelector('#sage-navigation');
    if (menuToggle && nav) {
        menuToggle.addEventListener('click', () => {
            const open = nav.classList.toggle('is-open');
            menuToggle.setAttribute('aria-expanded', String(open));
            menuToggle.setAttribute('aria-label', open ? 'Tutup navigasi' : 'Buka navigasi');
            menuToggle.textContent = open ? '×' : '☰';
        });
        nav.querySelectorAll('a').forEach(link => link.addEventListener('click', () => {
            nav.classList.remove('is-open');
            menuToggle.setAttribute('aria-expanded', 'false');
            menuToggle.setAttribute('aria-label', 'Buka navigasi');
            menuToggle.textContent = '☰';
        }));
    }

    const dateInput = root.querySelector('#sage-booking-date');
    if (dateInput) {
        const today = new Date();
        const localDate = new Date(today.getTime() - today.getTimezoneOffset() * 60000).toISOString().slice(0, 10);
        dateInput.min = localDate;
    }

    const serviceSelect = root.querySelector('#sage-service-select');
    root.querySelectorAll('[data-service]').forEach(link => link.addEventListener('click', () => {
        if (serviceSelect) serviceSelect.value = link.dataset.service;
    }));

    const bookingForm = root.querySelector('#sage-booking-form');
    if (bookingForm) bookingForm.addEventListener('submit', event => {
        event.preventDefault();
        if (!bookingForm.reportValidity()) return;
        const data = new FormData(bookingForm);
        const name = String(data.get('name') || '').trim();
        const service = String(data.get('service') || '').trim();
        const date = String(data.get('date') || '').trim();
        const notes = String(data.get('notes') || '').trim();
        const dateLabel = date ? new Date(`${date}T00:00:00`).toLocaleDateString('id-ID', { day: 'numeric', month: 'long', year: 'numeric' }) : '-';
        const message = [
            'Halo Sage Bloom Salon, saya ingin mengajukan booking.',
            `Nama: ${name}`,
            `Layanan: ${service}`,
            `Tanggal pilihan: ${dateLabel}`,
            notes ? `Catatan: ${notes}` : ''
        ].filter(Boolean).join('\n');
        const phone = String(bookingForm.dataset.whatsapp || '').replace(/\D/g, '');
        const status = root.querySelector('#sage-booking-status');
        if (!phone || phone === '6281234567890') {
            if (status) status.textContent = 'Form berfungsi sebagai demo. Ganti nomor WhatsApp contoh (6281234567890) dengan nomor salon sebelum digunakan.';
            return;
        }
        window.open(`https://wa.me/${phone}?text=${encodeURIComponent(message)}`, '_blank', 'noopener,noreferrer');
        if (status) status.textContent = 'Permintaan booking disiapkan di WhatsApp. Jadwal tetap menunggu konfirmasi tim salon.';
    });

    const chatLauncher = root.querySelector('#sage-chat-launcher');
    const chatPanel = root.querySelector('#sage-chat-panel');
    const chatClose = root.querySelector('#sage-chat-close');
    const chatMessages = root.querySelector('#sage-chat-messages');
    const chatForm = root.querySelector('#sage-chat-form');
    const chatInput = root.querySelector('#sage-chat-question');

    const toggleChat = open => {
        if (!chatPanel || !chatLauncher) return;
        chatPanel.hidden = !open;
        chatLauncher.setAttribute('aria-expanded', String(open));
        if (open && chatInput) chatInput.focus();
    };
    if (chatLauncher) chatLauncher.addEventListener('click', () => toggleChat(chatPanel.hidden));
    if (chatClose) chatClose.addEventListener('click', () => toggleChat(false));

    const addChatMessage = (text, isUser = false) => {
        const bubble = document.createElement('p');
        bubble.className = `sage-chat-bubble${isUser ? ' is-user' : ''}`;
        bubble.textContent = text;
        chatMessages.appendChild(bubble);
        chatMessages.scrollTop = chatMessages.scrollHeight;
    };
    const demoReply = question => {
        const q = question.toLowerCase();
        if (q.includes('booking') || q.includes('reservasi') || q.includes('jadwal')) return 'Pilih layanan, nama, dan tanggal pada formulir booking. Setelah itu, tim salon akan mengonfirmasi ketersediaan jadwal melalui WhatsApp.';
        if (q.includes('rekomendasi') || q.includes('treatment') || q.includes('perawatan')) return 'Kami punya Haircut & Styling, Hair Color, dan Hair Treatment. Untuk rekomendasi yang lebih tepat, ceritakan kondisi rambut serta hasil yang kamu inginkan kepada stylist.';
        if (q.includes('harga') || q.includes('biaya') || q.includes('durasi')) return 'Harga contoh: Haircut & Styling mulai Rp85.000 (45–60 menit), Hair Color mulai Rp250.000 (90–150 menit), dan Hair Treatment mulai Rp150.000 (45–75 menit). Silakan konfirmasi harga terbaru ke salon.';
        if (q.includes('layanan') || q.includes('service') || q.includes('menu')) return 'Layanan contoh kami: Haircut & Styling, Hair Color, dan Hair Treatment. Buka bagian Layanan untuk melihat gambaran harga dan durasi.';
        if (q.includes('lokasi') || q.includes('alamat') || q.includes('buka')) return 'Alamat dan jam operasional pada halaman ini masih berupa contoh. Silakan cek bagian Lokasi atau hubungi tim salon untuk informasi yang sudah terverifikasi.';
        return 'Terima kasih sudah bertanya! Asisten ini masih berupa demo frontend dan belum terhubung ke AI bisnis. Untuk jawaban yang akurat, silakan hubungi tim salon melalui WhatsApp.';
    };
    const submitQuestion = question => {
        const clean = String(question || '').trim();
        if (!clean || !chatMessages) return;
        addChatMessage(clean, true);
        addChatMessage(demoReply(clean));
    };
    if (chatForm) chatForm.addEventListener('submit', event => {
        event.preventDefault();
        submitQuestion(chatInput.value);
        chatInput.value = '';
    });
    root.querySelectorAll('[data-chat-question]').forEach(button => button.addEventListener('click', () => submitQuestion(button.dataset.chatQuestion)));
});
