document.addEventListener('DOMContentLoaded', function () {
    const whatsappNumber = '6281234567890';
    const menu = {
        'Seafood': [
            ['Kakap merah bakar', 'Ikan utuh, sambal matah, lalapan', '98.000', 'Terlaris'],
            ['Udang windu saus padang', 'Udang jumbo, saus pedas manis', '115.000', ''],
            ['Kepiting soka goreng', 'Kepiting lunak renyah, saus lada hitam', '89.000', ''],
            ['Cumi bakar kecap', 'Cumi segar, bumbu kecap bawang', '72.000', ''],
            ['Kerang hijau saus tiram', 'Rebus lalu tumis jahe', '55.000', ''],
            ['Platter laut Biru', 'Ikan, udang, cumi, kerang untuk 3–4 orang', '329.000', 'Berbagi']
        ],
        'Nasi & Mie': [
            ['Nasi goreng seafood', 'Telur, udang, cumi, acar', '48.000', ''],
            ['Mie kuah laut', 'Kuah kaldu ikan, bakso ikan, sawi', '46.000', ''],
            ['Nasi bakar kemangi', 'Dibungkus daun pisang, isi tuna suwir', '42.000', ''],
            ['Kwetiau siram udang', 'Saus telur gurih', '52.000', '']
        ],
        'Minuman': [
            ['Es kelapa muda', 'Daging kelapa utuh, gula aren', '22.000', ''],
            ['Es jeruk laut', 'Jeruk nipis, soda, mint', '24.000', ''],
            ['Teh tarik biru', 'Butterfly pea, susu, es', '26.000', 'Baru'],
            ['Kopi susu dermaga', 'Espresso, susu segar, gula aren', '28.000', '']
        ],
        'Pencuci mulut': [
            ['Pisang goreng keju', 'Pisang kepok, keju, susu cokelat', '28.000', ''],
            ['Es teler samudra', 'Alpukat, kelapa, nangka, susu', '32.000', ''],
            ['Pudding kelapa', 'Santan, gula aren cair', '25.000', '']
        ]
    };
    const hours = [
        ['Minggu', '10.00–23.00', 10, 23], ['Senin', '10.00–22.00', 10, 22],
        ['Selasa', '10.00–22.00', 10, 22], ['Rabu', '10.00–22.00', 10, 22],
        ['Kamis', '10.00–22.00', 10, 22], ['Jumat', '10.00–23.00', 10, 23],
        ['Sabtu', '10.00–23.00', 10, 23]
    ];
    const faq = [
        ['Apakah perlu reservasi?', 'Disarankan untuk akhir pekan dan rombongan lebih dari 6 orang. Pada hari biasa, kami melayani tamu tanpa reservasi selama meja tersedia.', ['reservasi', 'booking', 'pesan meja', 'meja']],
        ['Jam berapa restoran buka?', 'Senin sampai Kamis pukul 10.00–22.00, Jumat sampai Minggu pukul 10.00–23.00. Pesanan terakhir 30 menit sebelum tutup.', ['jam', 'buka', 'tutup', 'operasional']],
        ['Di mana lokasinya dan apakah ada parkir?', 'Kami di Jl. Bahari No. 21, Kawasan Dermaga Utara. Tersedia parkir luas untuk mobil dan motor tanpa biaya.', ['lokasi', 'alamat', 'dimana', 'di mana', 'parkir', 'maps']],
        ['Apakah makanan halal?', 'Ya, seluruh bahan dan proses memasak di dapur kami halal. Kami tidak menyajikan alkohol.', ['halal', 'alkohol']],
        ['Bisa pesan antar atau bawa pulang?', 'Bisa. Kirim pesanan lewat WhatsApp. Antar gratis dalam radius 5 km, lebih dari itu dikenakan ongkos kirim.', ['antar', 'delivery', 'bawa pulang', 'takeaway', 'ongkir']],
        ['Apakah ada menu untuk alergi atau anak-anak?', 'Ada. Beri tahu pelayan tentang alergi seperti kerang atau kacang. Kami juga punya porsi anak dan kursi bayi.', ['alergi', 'anak', 'bayi', 'vegetarian']],
        ['Bagaimana cara membayar?', 'Kami menerima tunai, QRIS, kartu debit/kredit, dan transfer bank.', ['bayar', 'qris', 'kartu', 'pembayaran', 'debit']],
        ['Apakah ada promo?', 'Ada. Lihat bagian Promo di halaman ini, misalnya kode SIANG20 untuk diskon 20% makan siang Senin sampai Kamis.', ['promo', 'diskon', 'kode', 'murah']],
        ['Berapa harga menu?', 'Hidangan utama mulai Rp 42.000 dan seafood mulai Rp 55.000. Platter untuk 3–4 orang Rp 329.000. Lihat daftar lengkap di bagian Menu.', ['harga', 'menu', 'berapa', 'makanan']],
        ['Bisakah menyewa tempat untuk acara?', 'Bisa. Ruang privat menampung hingga 40 orang dan paket katering mulai 20 porsi. Hubungi kami lewat WhatsApp untuk penawaran.', ['acara', 'katering', 'ulang tahun', 'privat', 'rombongan']]
    ];
    const select = function (selector) { return document.querySelector(selector); };
    const tabs = document.getElementById('lb-tabs');
    const menuList = document.getElementById('lb-menu-list');
    let currentCategory = Object.keys(menu)[0];

    function iconFor(category, name) {
        if (/udang/i.test(name)) return 'shrimp';
        if (/kerang|platter/i.test(name)) return 'shell';
        if (/kakap|cumi|kepiting/i.test(name)) return 'fish';
        return { 'Seafood': 'fish', 'Nasi & Mie': 'bowl', 'Minuman': 'glass', 'Pencuci mulut': 'dessert' }[category];
    }

    function drawMenu() {
        tabs.replaceChildren();
        Object.keys(menu).forEach(function (category) {
            const button = document.createElement('button');
            button.type = 'button';
            button.className = 'lb-tab';
            button.setAttribute('role', 'tab');
            button.setAttribute('aria-selected', String(category === currentCategory));
            button.textContent = category;
            button.addEventListener('click', function () {
                currentCategory = category;
                drawMenu();
            });
            tabs.appendChild(button);
        });

        menuList.replaceChildren();
        menu[currentCategory].forEach(function (item) {
            const row = document.createElement('article');
            row.className = 'lb-menu-item';
            const main = document.createElement('div');
            main.className = 'lb-menu-item-main';
            const thumb = document.createElement('span');
            thumb.className = 'lb-menu-thumb';
            thumb.innerHTML = '<svg class="lb-icon"><use href="#lb-' + iconFor(currentCategory, item[0]) + '"></use></svg>';
            const text = document.createElement('div');
            const title = document.createElement('h3');
            title.textContent = item[0];
            if (item[3]) {
                const tag = document.createElement('span');
                tag.className = 'lb-tag';
                tag.textContent = item[3];
                title.appendChild(tag);
            }
            const description = document.createElement('p');
            description.textContent = item[1];
            text.append(title, description);
            main.append(thumb, text);
            const price = document.createElement('strong');
            price.className = 'lb-menu-price';
            price.textContent = 'Rp ' + item[2];
            row.append(main, price);
            menuList.appendChild(row);
        });
    }

    const burger = document.getElementById('lb-burger');
    const links = document.getElementById('lb-links');
    burger.addEventListener('click', function () {
        const open = links.classList.toggle('is-open');
        burger.setAttribute('aria-expanded', String(open));
        burger.textContent = open ? '×' : '☰';
    });
    links.addEventListener('click', function (event) {
        if (event.target.closest('a')) {
            links.classList.remove('is-open');
            burger.setAttribute('aria-expanded', 'false');
            burger.textContent = '☰';
        }
    });
    drawMenu();

    document.querySelectorAll('.lb-code').forEach(function (button) {
        button.addEventListener('click', function () {
            const code = button.dataset.code;
            if (navigator.clipboard && window.isSecureContext) navigator.clipboard.writeText(code).catch(function () {});
            button.textContent = 'Tersalin: ' + code;
            window.setTimeout(function () { button.textContent = code; }, 1800);
        });
    });

    const today = new Date();
    const todayIndex = today.getDay();
    const currentHour = today.getHours() + today.getMinutes() / 60;
    const todayHours = hours[todayIndex];
    const isOpen = currentHour >= todayHours[2] && currentHour < todayHours[3];
    document.getElementById('lb-hours').innerHTML = [1, 2, 3, 4, 5, 6, 0].map(function (index) {
        const day = hours[index];
        return '<tr' + (index === todayIndex ? ' class="is-today"' : '') + '><td>' + day[0] + (index === todayIndex ? ' (hari ini)' : '') + '</td><td>' + day[1] + '</td></tr>';
    }).join('');
    document.getElementById('lb-dot').classList.toggle('is-closed', !isOpen);
    document.getElementById('lb-status-text').textContent = isOpen ? 'Buka sekarang sampai ' + todayHours[3] + '.00' : 'Tutup. Buka lagi pukul 10.00';

    const timeSelect = document.getElementById('lb-time');
    for (let hour = 10; hour <= 21; hour += 1) {
        ['00', '30'].forEach(function (minutes) {
            const option = document.createElement('option');
            option.textContent = String(hour).padStart(2, '0') + '.' + minutes;
            timeSelect.appendChild(option);
        });
    }
    const guestSelect = document.getElementById('lb-guests');
    for (let count = 1; count <= 12; count += 1) {
        const option = document.createElement('option');
        option.textContent = count + ' orang';
        guestSelect.appendChild(option);
    }
    const largeGroup = document.createElement('option');
    largeGroup.textContent = 'Lebih dari 12 orang';
    guestSelect.appendChild(largeGroup);
    guestSelect.selectedIndex = 3;

    const dateInput = document.getElementById('lb-date');
    const localDate = new Date(today.getTime() - today.getTimezoneOffset() * 60000);
    dateInput.min = localDate.toISOString().slice(0, 10);
    document.getElementById('lb-reservation-form').addEventListener('submit', function (event) {
        event.preventDefault();
        const form = event.currentTarget;
        if (!form.reportValidity()) return;
        const data = new FormData(form);
        const message = [
            'Halo Laut Biru, saya ingin reservasi.',
            'Nama: ' + data.get('name'),
            'Telepon: ' + data.get('phone'),
            'Tanggal: ' + data.get('date'),
            'Jam: ' + data.get('time'),
            'Tamu: ' + data.get('guests'),
            'Area: ' + data.get('area'),
            data.get('notes') ? 'Catatan: ' + data.get('notes') : ''
        ].filter(Boolean).join('\n');
        const url = 'https://wa.me/' + whatsappNumber + '?text=' + encodeURIComponent(message);
        const confirmation = document.getElementById('lb-confirmation');
        confirmation.replaceChildren();
        confirmation.append('Reservasi atas nama ' + data.get('name') + ' siap dikirim. Jika WhatsApp tidak terbuka, ');
        const link = document.createElement('a');
        link.href = url;
        link.target = '_blank';
        link.rel = 'noopener noreferrer';
        link.textContent = 'ketuk di sini';
        confirmation.append(link, '.');
        confirmation.hidden = false;
        window.open(url, '_blank', 'noopener,noreferrer');
    });

    const faqList = document.getElementById('lb-faq-list');
    faq.forEach(function (entry) {
        const details = document.createElement('details');
        details.className = 'lb-faq-item';
        const summary = document.createElement('summary');
        summary.textContent = entry[0];
        const answer = document.createElement('p');
        answer.textContent = entry[1];
        details.append(summary, answer);
        faqList.appendChild(details);
    });

    const chat = document.getElementById('lb-chat');
    const chatMessages = document.getElementById('lb-messages');
    const aiButton = document.getElementById('lb-ai-button');
    const chatInput = document.getElementById('lb-chat-input');
    function addMessage(text, isUser) {
        const message = document.createElement('p');
        message.className = 'lb-message' + (isUser ? ' is-user' : '');
        message.textContent = text;
        chatMessages.appendChild(message);
        chatMessages.scrollTop = chatMessages.scrollHeight;
    }
    function answerQuestion(question) {
        const normalized = question.toLowerCase();
        let bestMatch = null;
        let score = 0;
        faq.forEach(function (entry) {
            const matches = entry[2].filter(function (keyword) { return normalized.includes(keyword); }).length;
            if (matches > score) {
                score = matches;
                bestMatch = entry;
            }
        });
        return bestMatch ? bestMatch[1] : 'Saya belum punya jawaban untuk itu. Silakan tanya langsung tim kami lewat tombol WhatsApp.';
    }
    function ask(question) {
        if (!question.trim()) return;
        addMessage(question, true);
        window.setTimeout(function () { addMessage(answerQuestion(question), false); }, 250);
    }
    function toggleChat(open) {
        chat.hidden = !open;
        aiButton.setAttribute('aria-expanded', String(open));
        if (open) chatInput.focus();
    }
    document.getElementById('lb-chips').innerHTML = ['Jam buka', 'Ada promo?', 'Cara reservasi', 'Apakah halal?'].map(function (label) {
        return '<button type="button">' + label + '</button>';
    }).join('');
    document.getElementById('lb-chips').addEventListener('click', function (event) {
        if (event.target.tagName === 'BUTTON') ask(event.target.textContent === 'Cara reservasi' ? 'reservasi' : event.target.textContent.toLowerCase());
    });
    document.getElementById('lb-chat-form').addEventListener('submit', function (event) {
        event.preventDefault();
        ask(chatInput.value);
        chatInput.value = '';
    });
    aiButton.addEventListener('click', function () { toggleChat(chat.hidden); });
    document.getElementById('lb-chat-close').addEventListener('click', function () { toggleChat(false); });
    addMessage('Halo, saya asisten Laut Biru. Tanyakan jam buka, lokasi, promo, atau reservasi.', false);
});