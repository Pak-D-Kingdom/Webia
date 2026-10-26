document.addEventListener('DOMContentLoaded', () => {
    const $ = (selector, root = document) =>
        root.querySelector(selector);

    const $$ = (selector, root = document) =>
        [...root.querySelectorAll(selector)];

    // NAVIGASI MOBILE
    const menuToggle = $('.menu-toggle');
    const nav = $('.main-nav');

    menuToggle?.addEventListener('click', () => {
        const expanded =
            menuToggle.getAttribute('aria-expanded') === 'true';

        menuToggle.setAttribute(
            'aria-expanded',
            String(!expanded)
        );

        nav.classList.toggle('open', !expanded);
    });

    $$('.main-nav a').forEach(link => {
        link.addEventListener('click', () => {
            nav.classList.remove('open');
            menuToggle?.setAttribute('aria-expanded', 'false');
        });
    });

    // ANIMASI SAAT SCROLL
    const revealItems = $$('.reveal');

    if ('IntersectionObserver' in window) {
        const revealObserver = new IntersectionObserver(entries => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('visible');
                    revealObserver.unobserve(entry.target);
                }
            });
        }, { threshold: 0.12 });

        revealItems.forEach(item => revealObserver.observe(item));
    } else {
        revealItems.forEach(item =>
            item.classList.add('visible')
        );
    }

    // ANIMASI ANGKA STATISTIK
    const counters = $$('[data-count]');

    function countUp(element) {
        const target = Number(element.dataset.count);
        const duration = 1100;
        const start = performance.now();

        function tick(now) {
            const progress = Math.min(
                (now - start) / duration,
                1
            );

            element.textContent = Math.floor(
                target * (1 - Math.pow(1 - progress, 3))
            );

            if (progress < 1) {
                requestAnimationFrame(tick);
            }
        }

        requestAnimationFrame(tick);
    }

    if ('IntersectionObserver' in window) {
        const counterObserver = new IntersectionObserver(entries => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    countUp(entry.target);
                    counterObserver.unobserve(entry.target);
                }
            });
        }, { threshold: 0.6 });

        counters.forEach(counter =>
            counterObserver.observe(counter)
        );
    } else {
        counters.forEach(countUp);
    }

    // FILTER TIPE RUMAH
    $$('.filter-btn').forEach(button => {
        button.addEventListener('click', () => {
            $$('.filter-btn').forEach(btn => {
                btn.classList.toggle('active', btn === button);
            });

            const filter = button.dataset.filter;

            $$('.home-card').forEach(card => {
                const show =
                    filter === 'all' ||
                    card.dataset.category === filter;

                card.classList.toggle(
                    'filtered-out',
                    !show
                );
            });
        });
    });

    // TOMBOL FAVORIT
    $$('.heart-btn').forEach(button => {
        button.addEventListener('click', () => {
            const saved =
                button.getAttribute('aria-pressed') === 'true';

            button.setAttribute(
                'aria-pressed',
                String(!saved)
            );

            button.classList.toggle('saved', !saved);
            button.textContent = saved ? '♡' : '♥';

            showToast(
                saved
                    ? 'Tipe rumah dihapus dari favorit.'
                    : 'Tipe rumah disimpan ke favorit.'
            );
        });
    });

    // FORMULIR WHATSAPP
    // Ganti dengan nomor WhatsApp resmi proyek.
    const WHATSAPP_NUMBER = '6281234567890';

    const interestForm = $('#interestForm');

    interestForm?.addEventListener('submit', event => {
        event.preventDefault();

        const data = new FormData(interestForm);

        const name = String(data.get('name') || '').trim();
        const phone = String(data.get('phone') || '').trim();

        const houseType = String(
            data.get('houseType') || 'Belum menentukan tipe'
        );

        const budget = String(
            data.get('budget') || 'Belum menentukan anggaran'
        );

        if (!name || !phone) {
            showToast(
                'Mohon isi nama dan nomor WhatsApp terlebih dahulu.'
            );
            return;
        }

        const message = [
            'Halo Coral Haven, saya ingin mendapatkan informasi hunian.',
            '',
            `Nama: ${name}`,
            `Nomor WhatsApp: ${phone}`,
            `Tipe rumah: ${houseType}`,
            `Rencana anggaran: ${budget}`
        ].join('\n');

        const whatsappURL =
            `https://wa.me/${WHATSAPP_NUMBER}?text=` +
            encodeURIComponent(message);

        window.open(
            whatsappURL,
            '_blank',
            'noopener,noreferrer'
        );
    });

    // CHATBOT CORAL AI
    // Versi ini menggunakan respons otomatis berbasis kata kunci.
    // Untuk AI generatif, hubungkan ke backend Laravel.

    const chatLauncher = $('#chatLauncher');
    const chatPanel = $('#chatPanel');
    const chatClose = $('#chatClose');
    const chatMessages = $('#chatMessages');
    const chatForm = $('#chatForm');
    const chatInput = $('#chatInput');

    let chatStarted = false;

    function openChat() {
        chatPanel.classList.add('open');
        chatPanel.setAttribute('aria-hidden', 'false');

        chatLauncher.setAttribute('aria-expanded', 'true');

        setTimeout(() => chatInput?.focus(), 180);

        if (!chatStarted) {
            chatStarted = true;

            setTimeout(() => {
                chatMessages.scrollTop =
                    chatMessages.scrollHeight;
            }, 50);
        }
    }

    function closeChat() {
        chatPanel.classList.remove('open');
        chatPanel.setAttribute('aria-hidden', 'true');

        chatLauncher.setAttribute('aria-expanded', 'false');
    }

    chatLauncher?.addEventListener('click', () => {
        if (chatPanel.classList.contains('open')) {
            closeChat();
        } else {
            openChat();
        }
    });

    chatClose?.addEventListener('click', closeChat);

    function appendMessage(text, role = 'bot') {
        const bubble = document.createElement('div');

        bubble.className =
            `message ${
                role === 'user'
                    ? 'user-message'
                    : 'bot-message'
            }`;

        // textContent mencegah pesan pengguna diperlakukan sebagai HTML.
        bubble.textContent = text;

        chatMessages.appendChild(bubble);

        chatMessages.scrollTop =
            chatMessages.scrollHeight;

        return bubble;
    }

    function showTyping() {
        const typing = document.createElement('div');

        typing.className =
            'message bot-message typing-dots';

        typing.innerHTML =
            '<i></i><i></i><i></i>';

        chatMessages.appendChild(typing);

        chatMessages.scrollTop =
            chatMessages.scrollHeight;

        return typing;
    }

    // LOGIKA RESPONS CHATBOT DEMO
    function getPropertyReply(raw) {
        const text = raw.toLowerCase();

        if (/halo|hai|hi|hello|selamat/.test(text)) {
            return 'Hai juga! 😊 Aku bisa membantu mengenali tipe Haven, Cove, atau Sol, membandingkan anggaran, dan menjelaskan fasilitas. Kamu sedang mencari rumah untuk diri sendiri atau keluarga?';
        }

        if (/pilih|tipe|rumah|kamar|haven|cove|sol|keluarga|sendiri/.test(text)) {
            return `Kita cocokkan dengan kebutuhanmu ya! 🏡

• Haven (ilustrasi tipe 36): pilihan awal yang ringkas, 2 kamar tidur.
• Cove (ilustrasi tipe 45): ruang keluarga lebih lega, 2 kamar tidur dan 2 kamar mandi.
• Sol (ilustrasi tipe 60): ruang ekstra dan 3 kamar tidur.

Ini contoh data demo. Berapa orang yang akan tinggal dan apakah kamu membutuhkan ruang kerja?`;
        }

        if (/anggaran|budget|harga|bayar|cicil|biaya|murah/.test(text)) {
            return 'Untuk mencocokkan pilihan, gunakan kisaran anggaran sebagai panduan awal: di bawah Rp500 juta, Rp500–700 juta, atau di atas Rp700 juta. Harga yang tampil di halaman masih berupa placeholder, jadi mintalah pricelist resmi dari tim Coral Haven sebelum mengambil keputusan. Kisaran anggaranmu berapa?';
        }

        if (/fasilitas|aman|keamanan|taman|parkir|cluster/.test(text)) {
            return 'Fasilitas konsep Coral Haven mencakup green pocket park, one-gate system, pencahayaan alami, dan lingkungan ramah keluarga. Detail fasilitas aktual perlu dikonfirmasi pada spesifikasi resmi proyek. Fasilitas mana yang paling penting buatmu?';
        }

        if (/lokasi|alamat|jarak|sekolah|transportasi|strategis/.test(text)) {
            return 'Bagian lokasi saat ini masih berupa template. Kalau kamu sebutkan area aktivitas harianmu—misalnya tempat kerja atau sekolah—tim marketing bisa membantu membandingkannya dengan lokasi proyek yang sudah terverifikasi.';
        }

        if (/kunjungan|survey|survei|jadwal|marketing|whatsapp|wa|hubungi/.test(text)) {
            return 'Tentu! Kamu bisa mengisi formulir minat di bagian “Yuk, kenalan dulu” untuk menyiapkan pesan WhatsApp. Pastikan nomor WhatsApp proyek di js/coral-haven.js sudah diganti dengan nomor resmi agar pesan terkirim ke tim yang tepat.';
        }

        if (/promo|diskon|booking|tersedia|unit|stok/.test(text)) {
            return 'Promo dan ketersediaan unit bisa berubah. Aku tidak ingin memberi informasi yang belum terverifikasi, jadi sebaiknya cek langsung ke tim marketing. Kamu bisa gunakan tombol Konsultasi Gratis atau formulir minat di halaman ini.';
        }

        return 'Aku bisa bantu soal pilihan tipe rumah, kisaran anggaran, fasilitas, lokasi, atau jadwal kunjungan. Ceritakan sedikit kebutuhanmu—misalnya jumlah anggota keluarga dan anggaran—supaya aku bisa memberi rekomendasi awal. 😊';
    }

    function sendChat(text) {
        const clean = text.trim();

        if (!clean) return;

        appendMessage(clean, 'user');

        const prompts = $('.quick-prompts', chatMessages);

        if (prompts) {
            prompts.remove();
        }

        chatInput.value = '';
        chatInput.focus();

        const typing = showTyping();

        setTimeout(() => {
            typing.remove();
            appendMessage(getPropertyReply(clean));
        }, 500 + Math.min(clean.length * 9, 700));
    }

    chatForm?.addEventListener('submit', event => {
        event.preventDefault();
        sendChat(chatInput.value);
    });

    $$('.quick-prompts button').forEach(button => {
        button.addEventListener('click', () => {
            sendChat(button.dataset.prompt);
        });
    });

    // TOMBOL TANYA PADA KARTU RUMAH
    $$('.interest-btn').forEach(button => {
        button.addEventListener('click', () => {
            openChat();

            sendChat(
                `Saya tertarik dengan tipe ${button.dataset.house}. Bisa jelaskan lebih lanjut?`
            );
        });
    });

    // NOTIFIKASI KECIL
    let toastTimer;

    function showToast(message) {
        const toast = $('#toast');

        toast.textContent = message;
        toast.classList.add('show');

        clearTimeout(toastTimer);

        toastTimer = setTimeout(() => {
            toast.classList.remove('show');
        }, 2800);
    }

    // TAHUN FOOTER
    $('#year').textContent = new Date().getFullYear();

    // PERGANTIAN WARNA AKSEN OTOMATIS
    const accents = [
        '#ff766b',
        '#f28b72',
        '#eaa28b',
        '#f4a6a0'
    ];

    let accentIndex = 0;

    window.setInterval(() => {
        accentIndex = (accentIndex + 1) % accents.length;

        document.documentElement.style.setProperty(
            '--coral',
            accents[accentIndex]
        );
    }, 5200);
});