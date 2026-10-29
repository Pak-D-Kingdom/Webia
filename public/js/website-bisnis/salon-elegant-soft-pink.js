(() => {
    'use strict';
    // Ganti dengan nomor WhatsApp resmi salon, gunakan format internasional tanpa tanda +.
    const WHATSAPP_NUMBER = '6281234567890';
    const root = document.querySelector('.rose-site');
if (!root) return;

const menuButton = root.querySelector('.rose-menu-toggle');
const nav = root.querySelector('.rose-nav');

if (menuButton && nav) {
    menuButton.addEventListener('click', () => {
        const opened = nav.classList.toggle('is-open');
        menuButton.setAttribute('aria-expanded', String(opened));
    });

    nav.querySelectorAll('a').forEach(link => {
        link.addEventListener('click', () => {
            nav.classList.remove('is-open');
            menuButton.setAttribute('aria-expanded', 'false');
        });
    });
}
    menuButton?.addEventListener('click', () => {
        const opened = nav.classList.toggle('is-open');
        menuButton.setAttribute('aria-expanded', String(opened));
    });
    nav?.querySelectorAll('a').forEach(link => link.addEventListener('click', () => {
        nav.classList.remove('is-open');
        menuButton?.setAttribute('aria-expanded', 'false');
    }));

    const revealItems = root.querySelectorAll('[data-reveal]');
    if ('IntersectionObserver' in window) {
        const observer = new IntersectionObserver(entries => entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('is-visible');
                observer.unobserve(entry.target);
            }
        }), { threshold: 0.12, rootMargin: '0px 0px -30px 0px' });
        revealItems.forEach(item => observer.observe(item));
    } else revealItems.forEach(item => item.classList.add('is-visible'));

    const filterButtons = root.querySelectorAll('[data-service-filter]');
    const serviceCards = root.querySelectorAll('.rose-service-card[data-category]');
    filterButtons.forEach(button => button.addEventListener('click', () => {
        filterButtons.forEach(item => {
            const active = item === button;
            item.classList.toggle('is-active', active);
            item.setAttribute('aria-selected', String(active));
        });
        const category = button.dataset.serviceFilter;
        serviceCards.forEach(card => {
            const visible = category === 'all' || card.dataset.category === category;
            card.classList.toggle('is-filtered-out', !visible);
        });
    }));

    const bookingForm = root.querySelector('#rose-booking-form');
    const serviceSelect = root.querySelector('#rose-service');
    const dateInput = root.querySelector('#rose-date');
    if (dateInput) {
        const localToday = new Date();
        dateInput.min = `${localToday.getFullYear()}-${String(localToday.getMonth() + 1).padStart(2, '0')}-${String(localToday.getDate()).padStart(2, '0')}`;
    }
    root.querySelectorAll('[data-service]').forEach(button => button.addEventListener('click', () => {
        const selectedService = button.dataset.service;
        if (serviceSelect && [...serviceSelect.options].some(option => option.value === selectedService || option.text === selectedService)) {
            serviceSelect.value = selectedService;
        }
        document.querySelector('#rose-booking')?.scrollIntoView({ behavior: 'smooth', block: 'start' });
        window.setTimeout(() => serviceSelect?.focus({ preventScroll: true }), 450);
    }));

    const makeWhatsAppUrl = message => `https://wa.me/${WHATSAPP_NUMBER}?text=${encodeURIComponent(message)}`;
    bookingForm?.addEventListener('submit', event => {
        event.preventDefault();
        if (!bookingForm.reportValidity()) return;
        const data = new FormData(bookingForm);
        const message = [
            'Halo Rosé Atelier, saya ingin mengajukan booking appointment.',
            '',
            `Nama: ${data.get('name')}`,
            `Nomor WhatsApp: ${data.get('phone')}`,
            `Layanan: ${data.get('service')}`,
            `Tanggal pilihan: ${data.get('date')}`,
            `Waktu pilihan: ${data.get('time') || 'Fleksibel'}`,
            `Catatan: ${data.get('note') || '-'}`,
            '',
            'Mohon informasi ketersediaan jadwalnya. Terima kasih.'
        ].join('\n');
        window.open(makeWhatsAppUrl(message), '_blank', 'noopener,noreferrer');
    });

    root.querySelectorAll('.rose-direct-wa').forEach(link => {
        link.href = makeWhatsAppUrl('Halo Rosé Atelier, saya ingin bertanya tentang layanan salon.');
        link.target = '_blank';
        link.rel = 'noopener noreferrer';
    });
    const mapLink = root.querySelector('.rose-map-link');
    if (mapLink) {
        // Ganti alamat contoh di URL ini dengan alamat salon yang sebenarnya.
        mapLink.href = 'https://www.google.com/maps/search/?api=1&query=salon+beauty';
    }

    const reviewTrack = root.querySelector('.rose-review-track');
    const reviewCards = [...root.querySelectorAll('.rose-review-card')];
    let reviewIndex = 0;
    const updateReviews = () => {
        if (!reviewTrack || !reviewCards.length) return;
        const cardWidth = reviewCards[0].getBoundingClientRect().width;
        const gap = parseFloat(getComputedStyle(reviewTrack).gap) || 0;
        const visibleCards = window.matchMedia('(max-width: 760px)').matches ? 1 : 2;
        const maxIndex = Math.max(0, reviewCards.length - visibleCards);
        reviewIndex = Math.min(reviewIndex, maxIndex);
        reviewTrack.style.transform = `translateX(-${reviewIndex * (cardWidth + gap)}px)`;
    };
    root.querySelector('[data-review-next]')?.addEventListener('click', () => {
        const visibleCards = window.matchMedia('(max-width: 760px)').matches ? 1 : 2;
        reviewIndex = reviewIndex >= reviewCards.length - visibleCards ? 0 : reviewIndex + 1;
        updateReviews();
    });
    root.querySelector('[data-review-prev]')?.addEventListener('click', () => {
        const visibleCards = window.matchMedia('(max-width: 760px)').matches ? 1 : 2;
        reviewIndex = reviewIndex <= 0 ? Math.max(0, reviewCards.length - visibleCards) : reviewIndex - 1;
        updateReviews();
    });
    window.addEventListener('resize', updateReviews);
    updateReviews();

    root.querySelectorAll('.rose-faq-item > button').forEach(button => button.addEventListener('click', () => {
        const item = button.closest('.rose-faq-item');
        const opening = !item.classList.contains('is-open');
        item.classList.toggle('is-open', opening);
        button.setAttribute('aria-expanded', String(opening));
        const symbol = button.querySelector('b');
        if (symbol) symbol.textContent = opening ? '−' : '+';
    }));

    const chatLauncher = document.querySelector('.rose-chat-launcher');
    const chatPanel = document.querySelector('.rose-chat-panel');
    const chatClose = document.querySelector('.rose-chat-close');
    const chatMessages = document.querySelector('.rose-chat-messages');
    const chatForm = document.querySelector('.rose-chat-form');
    const chatInput = chatForm?.querySelector('input');
    const toggleChat = opened => {
        chatPanel?.classList.toggle('is-open', opened);
        chatPanel?.setAttribute('aria-hidden', String(!opened));
        chatLauncher?.setAttribute('aria-expanded', String(opened));
        if (opened) window.setTimeout(() => chatInput?.focus(), 150);
    };
    chatLauncher?.addEventListener('click', () => toggleChat(!chatPanel?.classList.contains('is-open')));
    chatClose?.addEventListener('click', () => toggleChat(false));

    const replyFor = raw => {
        const message = raw.toLowerCase();
        if (/layanan|treatment|rambut|hair|facial|kuku|beauty|harga|biaya|price/.test(message)) return 'Kami punya Signature Haircut (mulai Rp120K), Soft Hair Colour (mulai Rp250K), Glow Facial (mulai Rp180K), dan Mani & Pedi (mulai Rp150K). Harga ini masih contoh template, ya lovely. Klik “Choose ritual” atau isi formulir untuk tanya harga aktual.';
        if (/booking|pesan|reservasi|janji|jadwal|appointment/.test(message)) return 'Kamu bisa isi formulir appointment di bagian “Make a little room for you”. Pilih layanan dan tanggal, lalu permintaan akan diteruskan ke WhatsApp salon untuk konfirmasi. Booking belum tersimpan otomatis di website demo ini.';
        if (/lokasi|alamat|jam|buka|maps|arah/.test(message)) return 'Alamat dan jam operasional pada halaman ini masih contoh. Hubungi tim melalui tombol WhatsApp untuk memastikan alamat dan jadwal salon yang sebenarnya.';
        if (/promo|diskon|paket/.test(message)) return 'Ada bagian “Your first visit, something special” untuk menanyakan promo. Kirim pesan ke WhatsApp salon agar tim dapat menginformasikan promo yang sedang berlaku.';
        if (/stylist|pegawai|team|tim|amara|nadia|keisha/.test(message)) return 'Kamu bisa melihat profil contoh Amara, Nadia, dan Keisha di bagian “Meet your artists”. Nama dan spesialisasi tersebut adalah konten demo yang perlu disesuaikan dengan tim salon sebenarnya.';
        if (/halo|hai|hello|hi|assalam/.test(message)) return 'Halo lovely! ✿ Senang kamu mampir. Mau tanya layanan, booking, promo, atau lokasi salon?';
        return 'Aku bisa bantu menjelaskan layanan, harga contoh, promo, stylist, dan cara booking. Untuk informasi aktual yang belum ada di halaman ini, silakan hubungi tim salon melalui WhatsApp.';
    };
    const addMessage = (text, isUser = false) => {
        if (!chatMessages) return;
        const bubble = document.createElement('div');
        bubble.className = `rose-chat-message ${isUser ? 'rose-user-message' : 'rose-bot-message'}`;
        bubble.textContent = text;
        chatMessages.appendChild(bubble);
        chatMessages.scrollTop = chatMessages.scrollHeight;
    };
    const sendChat = text => {
        const trimmed = text.trim();
        if (!trimmed) return;
        addMessage(trimmed, true);
        window.setTimeout(() => addMessage(replyFor(trimmed)), 180);
    };
    chatForm?.addEventListener('submit', event => {
        event.preventDefault();
        if (!chatInput) return;
        sendChat(chatInput.value);
        chatInput.value = '';
    });
    document.querySelectorAll('[data-chat-question]').forEach(button => button.addEventListener('click', () => {
        const prompts = { layanan: 'Layanan dan harga', booking: 'Bagaimana cara booking?', lokasi: 'Lokasi dan jam operasional' };
        sendChat(prompts[button.dataset.chatQuestion] || button.textContent);
    }));

    const year = root.querySelector('#rose-year');
    if (year) year.textContent = new Date().getFullYear();
})();
