
document.addEventListener('DOMContentLoaded', () => {
    // GANTI dengan nomor WhatsApp resmi klinik.
    // Format internasional tanpa tanda +, contoh Indonesia: 628xxxxxxxxxx.
    const CLINIC_WHATSAPP = '6281234567890';

    // MOBILE NAVIGATION
    const menuToggle = document.getElementById('ascMenuToggle');
    const nav = document.getElementById('ascNav');

    menuToggle?.addEventListener('click', () => {
        const open = nav.classList.toggle('asc-nav-open');
        menuToggle.setAttribute('aria-expanded', String(open));
    });

    nav?.querySelectorAll('a').forEach(link => {
        link.addEventListener('click', () => {
            nav.classList.remove('asc-nav-open');
            menuToggle?.setAttribute('aria-expanded', 'false');
        });
    });

    // CURRENT YEAR
    const year = document.getElementById('ascYear');
    if (year) year.textContent = new Date().getFullYear();

    // MINIMUM BOOKING DATE: TODAY IN LOCAL TIME
    const dateInput = document.querySelector('#ascBookingForm input[name="date"]');

    if (dateInput) {
        const now = new Date();
        const localOffset = now.getTimezoneOffset();
        const today = new Date(now.getTime() - localOffset * 60000)
            .toISOString()
            .slice(0, 10);

        dateInput.min = today;
    }

    // WHATSAPP
    function openWhatsApp(message) {
        const url = `https://wa.me/${CLINIC_WHATSAPP}?text=${encodeURIComponent(message)}`;
        window.open(url, '_blank', 'noopener,noreferrer');
    }

    const generalMessage =
        'Halo Azure Smile Clinic, saya ingin bertanya mengenai treatment dan jadwal konsultasi.';

    document.getElementById('ascWhatsApp')?.addEventListener('click', event => {
        event.preventDefault();
        openWhatsApp(generalMessage);
    });

    document.getElementById('ascFooterWhatsApp')?.addEventListener('click', event => {
        event.preventDefault();
        openWhatsApp(generalMessage);
    });

    // APPOINTMENT REQUEST
    // Form ini membuka WhatsApp. Belum menyimpan booking ke database.
    document.getElementById('ascBookingForm')?.addEventListener('submit', event => {
        event.preventDefault();

        const form = event.currentTarget;
        if (!form.reportValidity()) return;

        const data = new FormData(form);

        const message = [
            'Halo Azure Smile Clinic, saya ingin mengajukan appointment.',
            '',
            `Nama: ${data.get('name')}`,
            `Nomor WhatsApp: ${data.get('phone')}`,
            `Treatment/Paket: ${data.get('treatment')}`,
            `Tanggal pilihan: ${data.get('date')}`,
            `Waktu pilihan: ${data.get('time')}`,
            `Catatan: ${data.get('notes') || '-'}`,
            '',
            'Mohon informasi ketersediaan jadwal dan konfirmasi lebih lanjut. Terima kasih.'
        ].join('\n');

        openWhatsApp(message);
    });

    // LOCAL FAQ CHATBOT
    // FAQ berbasis JavaScript, belum menggunakan AI API.
    const chatToggle = document.getElementById('ascChatToggle');
    const chatPanel = document.getElementById('ascChatPanel');
    const chatClose = document.getElementById('ascChatClose');
    const chatMessages = document.getElementById('ascChatMessages');
    const chatForm = document.getElementById('ascChatForm');
    const chatInput = document.getElementById('ascChatInput');

    const faq = {
        treatment:
            'Azure Smile Clinic memiliki contoh layanan Dental Check-up, Scaling & Cleaning, Dental Fillings, Teeth Whitening, Orthodontic Care, dan Smile Design Consultation. Pilihan tindakan yang tepat ditentukan setelah pemeriksaan dokter.',

        packages:
            'Paket demo yang tersedia adalah Essential Care, Signature Smile, dan Complete Smile Plan. Harga dan isi paket pada halaman ini masih contoh desain. Hubungi tim klinik untuk mendapatkan informasi resmi.',

        booking:
            'Untuk meminta appointment, isi formulir dengan nama, nomor WhatsApp, treatment, tanggal, dan waktu pilihan. Form akan membuka WhatsApp. Jadwal belum terkonfirmasi sampai tim klinik memberikan konfirmasi.',

        hours:
            'Jam operasional pada template ini adalah contoh: Senin–Sabtu pukul 09.00–20.00 WIB. Mohon konfirmasi jam buka yang sebenarnya kepada klinik.',

        location:
            'Alamat Azure Smile Clinic pada template ini masih berupa placeholder. Hubungi tim klinik untuk memperoleh alamat resmi dan petunjuk lokasi.',

        dentist:
            'Profil dokter dan kualifikasi pada halaman ini masih berupa placeholder. Silakan konfirmasi nama, gelar, kualifikasi, dan jadwal praktik kepada klinik.',

        payment:
            'Harga pada halaman paket merupakan data demo. Biaya perawatan sebenarnya perlu dikonfirmasi kepada klinik setelah konsultasi dan pemeriksaan.',

        default:
            'Aku bisa membantu menjelaskan pilihan treatment, paket demo, cara meminta appointment, jam operasional, dan lokasi. Coba pilih salah satu topik di atas atau tanyakan kembali dengan kata yang berbeda.'
    };

    function addMessage(message, isUser = false) {
        const bubble = document.createElement('p');
        bubble.className = 'asc-chat-bubble' +
            (isUser ? ' asc-user-message' : '');
        bubble.textContent = message;

        chatMessages.appendChild(bubble);
        chatMessages.scrollTop = chatMessages.scrollHeight;
    }

    function getAnswer(question) {
        const q = question.toLowerCase();

        if (/harga|tarif|biaya|price|payment|bayar|berapa/.test(q)) {
            return faq.payment;
        }

        if (/paket|package|signature|essential|complete/.test(q)) {
            return faq.packages;
        }

        if (/booking|appointment|janji|reservasi|jadwal|tanggal/.test(q)) {
            return faq.booking;
        }

        if (/jam|buka|tutup|operasional|hours/.test(q)) {
            return faq.hours;
        }

        if (/alamat|lokasi|maps|location|dimana|di mana/.test(q)) {
            return faq.location;
        }

        if (/dokter|dentist|kualifikasi|gelar|spesialis/.test(q)) {
            return faq.dentist;
        }

        if (/treatment|layanan|scaling|tambal|behel|whitening|perawatan|konsultasi/.test(q)) {
            return faq.treatment;
        }

        return faq.default;
    }

    function askQuestion(question) {
        const text = question.trim();
        if (!text) return;

        addMessage(text, true);
        addMessage(getAnswer(text));
    }

    chatToggle?.addEventListener('click', () => {
        const open = chatPanel.hidden;

        chatPanel.hidden = !open;
        chatToggle.setAttribute('aria-expanded', String(open));

        if (open) chatInput?.focus();
    });

    chatClose?.addEventListener('click', () => {
        chatPanel.hidden = true;
        chatToggle?.setAttribute('aria-expanded', 'false');
        chatToggle?.focus();
    });

    document.querySelectorAll('.asc-chat-quick button').forEach(button => {
        button.addEventListener('click', () => {
            askQuestion(button.dataset.topic || '');
        });
    });

    chatForm?.addEventListener('submit', event => {
        event.preventDefault();

        askQuestion(chatInput.value);
        chatInput.value = '';
        chatInput.focus();
    });
});
