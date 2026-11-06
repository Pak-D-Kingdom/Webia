
document.addEventListener('DOMContentLoaded', () => {
    // GANTI dengan nomor WhatsApp resmi klinik, format internasional tanpa tanda +.
    const CLINIC_WHATSAPP = '085850180285';

    const menuToggle = document.getElementById('mdhMenuToggle');
    const nav = document.getElementById('mdhNav');

    menuToggle?.addEventListener('click', () => {
        const isOpen = nav.classList.toggle('mdh-nav-open');
        menuToggle.setAttribute('aria-expanded', String(isOpen));
    });

    nav?.querySelectorAll('a').forEach(link => {
        link.addEventListener('click', () => {
            nav.classList.remove('mdh-nav-open');
            menuToggle?.setAttribute('aria-expanded', 'false');
        });
    });

    // Batasi tanggal appointment agar tidak memilih tanggal yang sudah lewat.
    const dateInput = document.querySelector('#mdhBookingForm input[name="date"]');
    if (dateInput) {
        const localDate = new Date();
        const offset = localDate.getTimezoneOffset();
        const today = new Date(localDate.getTime() - offset * 60000)
            .toISOString().slice(0, 10);
        dateInput.min = today;
    }

    function openWhatsApp(message) {
        const url = `https://wa.me/${CLINIC_WHATSAPP}?text=${encodeURIComponent(message)}`;
        window.open(url, '_blank', 'noopener,noreferrer');
    }

    document.getElementById('mdhWhatsApp')?.addEventListener('click', event => {
        event.preventDefault();
        openWhatsApp('Halo Mint Dental House, saya ingin bertanya mengenai layanan klinik gigi.');
    });

    // Appointment dikirim ke WhatsApp untuk dikonfirmasi.
    // Ini belum menyimpan booking ke database.
    document.getElementById('mdhBookingForm')?.addEventListener('submit', event => {
        event.preventDefault();
        const form = event.currentTarget;
        if (!form.reportValidity()) return;

        const data = new FormData(form);
        const message = [
            'Halo Mint Dental House, saya ingin mengajukan appointment.',
            '',
            `Nama: ${data.get('name')}`,
            `Nomor WhatsApp: ${data.get('phone')}`,
            `Layanan: ${data.get('service')}`,
            `Tanggal: ${data.get('date')}`,
            `Waktu pilihan: ${data.get('time')}`,
            `Catatan: ${data.get('notes') || '-'}`,
            '',
            'Mohon konfirmasi ketersediaan jadwal. Terima kasih.'
        ].join('\n');

        openWhatsApp(message);
    });

    document.getElementById('mdhYear').textContent = new Date().getFullYear();

    // Chatbot FAQ lokal untuk demo; belum memakai AI/API sungguhan.
    const chatToggle = document.getElementById('mdhChatToggle');
    const chatPanel = document.getElementById('mdhChatPanel');
    const chatClose = document.getElementById('mdhChatClose');
    const chatMessages = document.getElementById('mdhChatMessages');
    const chatForm = document.getElementById('mdhChatForm');
    const chatInput = document.getElementById('mdhChatInput');

    const answers = {
        layanan: 'Layanan demo kami meliputi konsultasi dokter gigi, scaling, tambal gigi, konsultasi behel, dan teeth whitening. Pilihan tindakan ditentukan setelah pemeriksaan dokter.',
        harga: 'Harga demo: konsultasi Rp50.000, scaling Rp250.000, tambal gigi Rp200.000, konsultasi behel Rp75.000, dan whitening Rp800.000. Tarif ini contoh desain, bukan harga klinik terverifikasi. Silakan konfirmasi ke tim klinik.',
        appointment: 'Untuk mengajukan appointment, buka bagian Buat Janji, isi nama, nomor WhatsApp, layanan, tanggal, dan waktu. Formulir akan membuka WhatsApp agar tim klinik dapat mengonfirmasi jadwal.',
        jam: 'Jam demo: Senin–Sabtu pukul 09.00–20.00 WIB. Jam operasional sebenarnya perlu disesuaikan dengan informasi resmi klinik.',
        lokasi: 'Alamat klinik belum diatur. Silakan hubungi tim klinik melalui WhatsApp untuk memperoleh alamat dan petunjuk lokasi yang benar.',
        dokter: 'Profil dokter pada halaman ini masih berupa placeholder. Nama, gelar, dan jadwal dokter perlu diisi menggunakan informasi resmi klinik.',
        default: 'Aku bisa membantu menjelaskan layanan, harga demo, cara membuat appointment, jam buka, dan lokasi. Pilih salah satu topik di atas atau tanyakan dengan kata-kata lain.'
    };

    function addMessage(text, isUser = false) {
        const bubble = document.createElement('p');
        bubble.className = 'mdh-chat-bubble' + (isUser ? ' mdh-user-message' : '');
        bubble.textContent = text;
        chatMessages.appendChild(bubble);
        chatMessages.scrollTop = chatMessages.scrollHeight;
    }

    function getAnswer(question) {
        const q = question.toLowerCase();
        if (/harga|tarif|biaya|berapa|price/.test(q)) return answers.harga;
        if (/appointment|booking|janji|jadwal|reservasi|tanggal/.test(q)) return answers.appointment;
        if (/jam|buka|tutup|operasional/.test(q)) return answers.jam;
        if (/alamat|lokasi|maps|dimana|di mana/.test(q)) return answers.lokasi;
        if (/dokter|dokter gigi|profil/.test(q)) return answers.dokter;
        if (/layanan|service|scaling|tambal|behel|whitening|perawatan/.test(q)) return answers.layanan;
        return answers.default;
    }

    function ask(question) {
        const cleanQuestion = question.trim();
        if (!cleanQuestion) return;
        addMessage(cleanQuestion, true);
        addMessage(getAnswer(cleanQuestion));
    }

    chatToggle?.addEventListener('click', () => {
        const shouldOpen = chatPanel.hidden;
        chatPanel.hidden = !shouldOpen;
        chatToggle.setAttribute('aria-expanded', String(shouldOpen));
        if (shouldOpen) chatInput?.focus();
    });

    chatClose?.addEventListener('click', () => {
        chatPanel.hidden = true;
        chatToggle?.setAttribute('aria-expanded', 'false');
    });

    document.querySelectorAll('.mdh-chat-quick button').forEach(button => {
        button.addEventListener('click', () => ask(button.dataset.question));
    });

    chatForm?.addEventListener('submit', event => {
        event.preventDefault();
        ask(chatInput.value);
        chatInput.value = '';
        chatInput.focus();
    });
});
