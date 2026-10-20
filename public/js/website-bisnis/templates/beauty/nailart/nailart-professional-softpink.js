(() => {
    const menuButton = document.querySelector('.blush-menu-toggle');
    const nav = document.querySelector('.blush-nav');
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

    const dateInput = document.querySelector('.blush-booking-form input[name="date"]');
    if (dateInput) {
        const today = new Date();
        const localDate = new Date(today.getTime() - today.getTimezoneOffset() * 60000).toISOString().slice(0, 10);
        dateInput.min = localDate;
    }

    const year = document.getElementById('blush-current-year');
    if (year) year.textContent = String(new Date().getFullYear());

    const bookingForm = document.getElementById('blush-booking-form');
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
    const chatPanel = document.getElementById('blush-chat-panel');
    const chatToggle = document.getElementById('blush-ai-fab');
    const chatClose = document.getElementById('blush-chat-close');
    const chatMessages = document.getElementById('blush-chat-messages');
    const chatForm = document.getElementById('blush-chat-form');
    const chatInput = document.getElementById('blush-chat-input');
    const chatQuick = document.getElementById('blush-chat-quick');
    const waLink = 'https://wa.me/6285850180285?text=Halo%20Blush%20Nail%20Studio%2C%20saya%20ingin%20bertanya%20tentang%20layanan%20nail%20art.';

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
        if (/harga|price|biaya|tarif/.test(q)) return 'Harga contoh di template ini: Nail Care Rp75.000, Nail Art Rp150.000, dan Nail Extension Rp250.000 per sesi. Harga final dapat berubah sesuai detail desain. Mau konsultasi desain? Hubungi studio lewat WhatsApp.';
        if (/layanan|service|nail care|extension/.test(q)) return 'Kami menyediakan Nail Care, Nail Art custom, dan Nail Extension. Kamu bisa melihat detailnya di bagian Services dan Services & Pricing pada halaman ini.';
        if (/booking|pesan|jadwal|appointment|reservasi|tanggal/.test(q)) return 'Kamu bisa mengisi formulir Request an Appointment di bagian bawah halaman. Untuk konfirmasi jadwal secara langsung, lanjutkan chat dengan studio melalui WhatsApp.';
        if (/alamat|lokasi|jam|buka|kontak/.test(q)) return 'Informasi alamat dan jam operasional masih berupa contoh template. Silakan konfirmasi detail studio melalui WhatsApp sebelum berkunjung.';
        if (/halo|hai|hi|hello/.test(q)) return 'Halo, beauty! ♡ Ada yang bisa aku bantu? Kamu bisa tanya harga, layanan, atau cara booking.';
        return 'Terima kasih sudah bertanya! Aku masih asisten demo dan belum terhubung ke AI/backend. Untuk pertanyaan khusus atau konfirmasi booking, silakan chat admin melalui WhatsApp.';
    };
    const addMessage = (text, type) => {
        if (!chatMessages) return;
        const bubble = document.createElement('div');
        bubble.className = `blush-chat-message ${type === 'user' ? 'blush-chat-user' : 'blush-chat-bot'}`;
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
