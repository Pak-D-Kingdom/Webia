(() => {
    const menuButton = document.querySelector('.sage-menu-toggle');
    const nav = document.querySelector('.sage-nav');
    if (menuButton && nav) {
        menuButton.addEventListener('click', () => {
            const isOpen = nav.classList.toggle('is-open');
            menuButton.setAttribute('aria-expanded', String(isOpen));
            menuButton.setAttribute('aria-label', isOpen ? 'Tutup navigasi' : 'Buka navigasi');
        });
        nav.querySelectorAll('a').forEach(link => link.addEventListener('click', () => {
            nav.classList.remove('is-open');
            menuButton.setAttribute('aria-expanded', 'false');
        }));
    }

    const dateInput = document.querySelector('.sage-booking-form input[name="date"]');
    if (dateInput) {
        const today = new Date();
        const localDate = new Date(today.getTime() - today.getTimezoneOffset() * 60000).toISOString().slice(0, 10);
        dateInput.min = localDate;
    }

    const year = document.getElementById('sage-current-year');
    if (year) year.textContent = String(new Date().getFullYear());

    const bookingForm = document.getElementById('sage-booking-form');
    if (bookingForm) {
        bookingForm.addEventListener('submit', event => {
            event.preventDefault();
            const formData = new FormData(bookingForm);
            const name = String(formData.get('name') || '').trim();
            const phone = String(formData.get('phone') || '').trim();
            const service = String(formData.get('service') || '').trim();
            const date = String(formData.get('date') || '').trim();
            if (!name || !phone || !service || !date) return;
            alert(`Terima kasih, ${name}!\n\nPermintaan booking demo:\nLayanan: ${service}\nTanggal: ${date}\nWhatsApp: ${phone}\n\nIni masih preview template. Hubungkan form ke WhatsApp atau backend untuk menerima booking sungguhan.`);
            bookingForm.reset();
        });
    }


    // Front-end demo assistant: useful quick answers without pretending to use a live AI backend.
    const chatPanel = document.getElementById('sage-chat-panel');
    const chatToggle = document.getElementById('sage-ai-fab');
    const chatClose = document.getElementById('sage-chat-close');
    const chatMessages = document.getElementById('sage-chat-messages');
    const chatForm = document.getElementById('sage-chat-form');
    const chatInput = document.getElementById('sage-chat-input');
    const chatQuick = document.getElementById('sage-chat-quick');
    const waLink = 'https://wa.me/6285850180285?text=Halo%20Sage%20Nail%20Atelier%2C%20saya%20ingin%20bertanya%20tentang%20ritual%20nail%20care.';

    const toggleChat = (open) => {
        if (!chatPanel || !chatToggle) return;
        chatPanel.hidden = !open;
        chatToggle.setAttribute('aria-expanded', String(open));
        if (open && chatInput) chatInput.focus();
    };
    if (chatToggle) chatToggle.addEventListener('click', () => toggleChat(chatPanel ? chatPanel.hidden : false));
    if (chatClose) chatClose.addEventListener('click', () => toggleChat(false));

    const answerFor = (question) => {
        const q = question.toLowerCase();
        if (/harga|price|biaya|tarif/.test(q)) return 'Harga contoh di template ini: Natural Care Rp85.000, Sheer Manicure Rp135.000, dan Minimal Art Rp185.000 per sesi. Harga final dapat berubah sesuai detail desain. Mau konsultasi? Hubungi atelier lewat WhatsApp.';
        if (/layanan|service|nail care|extension/.test(q)) return 'Kami punya The Reset untuk natural care, The Barely There untuk sheer manicure, dan The Personal Edit untuk minimal art. Lihat bagian Rituals dan Membership untuk detailnya.';
        if (/booking|pesan|jadwal|appointment|reservasi|tanggal/.test(q)) return 'Isi formulir reservasi di bagian bawah halaman. Untuk konfirmasi jadwal secara langsung, hubungi atelier melalui WhatsApp.';
        if (/alamat|lokasi|jam|buka|kontak/.test(q)) return 'Informasi alamat dan jam operasional masih berupa contoh template. Silakan konfirmasi detail studio melalui WhatsApp sebelum berkunjung.';
        if (/halo|hai|hi|hello/.test(q)) return 'Halo! Ada yang bisa aku bantu? Kamu bisa tanya pilihan ritual, harga, atau cara reservasi.';
        return 'Terima kasih sudah bertanya! Aku masih asisten demo dan belum terhubung ke AI/backend. Untuk pertanyaan khusus atau konfirmasi booking, silakan chat admin melalui WhatsApp.';
    };
    const addMessage = (text, type) => {
        if (!chatMessages) return;
        const bubble = document.createElement('div');
        bubble.className = `sage-chat-message ${type === 'user' ? 'sage-chat-user' : 'sage-chat-bot'}`;
        bubble.textContent = text;
        chatMessages.appendChild(bubble);
        chatMessages.scrollTop = chatMessages.scrollHeight;
    };
    const sendQuestion = (question) => {
        const text = String(question || '').trim();
        if (!text) return;
        addMessage(text, 'user');
        addMessage(answerFor(text), 'bot');
        if (chatInput) chatInput.value = '';
    };
    if (chatForm) chatForm.addEventListener('submit', (event) => {
        event.preventDefault();
        sendQuestion(chatInput ? chatInput.value : '');
    });
    if (chatQuick) chatQuick.querySelectorAll('[data-chat-question]').forEach(button => {
        button.addEventListener('click', () => {
            const key = button.dataset.chatQuestion;
            const questions = { price: 'Berapa harga layanan?', service: 'Layanan apa saja yang tersedia?', booking: 'Bagaimana cara booking appointment?' };
            sendQuestion(questions[key] || 'Saya ingin bertanya.');
        });
    });

})();
