<?php

/*
|--------------------------------------------------------------------------
| Al Hijrah Travel — Umrah & Haji (Elegant · Navy Champagne Gold)
|--------------------------------------------------------------------------
| Seluruh konten statis template ada di file ini. Ubah teks, harga, jadwal,
| dll. di sini tanpa menyentuh file Blade. Tidak ada koneksi database.
*/

return [

    'brand' => [
        'name'    => 'Al Hijrah Travel',
        'tagline' => 'Your Journey to The Holy Land',
    ],

    'contact' => [
        'city'    => 'Jakarta, Indonesia',
        'hours'   => 'Sen - Min : 08.00 - 21.00',
        'email'   => 'info@alhijrahtravel.co.id',
        'phone'   => '+62 895-6303-00345',
        'wa'      => '62895630300345',
        'address' => 'Jl. Melati No. 25, Jakarta Selatan',
        'wa_text' => "Assalamu'alaikum Al Hijrah Travel, saya ingin bertanya tentang paket Umrah & Haji.",
        'wa_daftar' => "Assalamu'alaikum Al Hijrah Travel, saya ingin mendaftar paket Umrah/Haji.",
    ],

    'social' => [
        ['key' => 'facebook',  'label' => 'Facebook',  'url' => 'https://facebook.com/'],
        ['key' => 'youtube',   'label' => 'YouTube',   'url' => 'https://youtube.com/'],
        ['key' => 'instagram', 'label' => 'Instagram', 'url' => 'https://instagram.com/'],
    ],

    'social_footer' => [
        ['key' => 'whatsapp',  'label' => 'WhatsApp',  'url' => 'https://wa.me/62895630300345'],
        ['key' => 'instagram', 'label' => 'Instagram', 'url' => 'https://instagram.com/'],
        ['key' => 'facebook',  'label' => 'Facebook',  'url' => 'https://facebook.com/'],
        ['key' => 'youtube',   'label' => 'YouTube',   'url' => 'https://youtube.com/'],
        ['key' => 'tiktok',    'label' => 'TikTok',    'url' => 'https://tiktok.com/'],
    ],

    // [route-name, label]
    'menu' => [
        ['home', 'Beranda'],
        ['paket', 'Paket Umrah & Haji'],
        ['jadwal', 'Jadwal Keberangkatan'],
        ['harga', 'Harga Paket'],
        ['hotel', 'Hotel & Pesawat'],
        ['itinerary', 'Itinerary'],
        ['tim', 'Tim Kami'],
        ['persyaratan', 'Persyaratan'],
        ['testimoni', 'Testimoni'],
    ],

    // Indeks pencarian halaman — [route, judul, ikon, deskripsi, kata kunci]
    'search_pages' => [
        ['home', 'Beranda', 'sparkle', 'Halaman utama Al Hijrah Travel', 'beranda utama home al hijrah'],
        ['paket', 'Paket Umrah & Haji', 'book', 'Umrah Reguler, Plus Turki, VIP, Haji Khusus, Furoda, Plus', 'paket umrah haji reguler plus turki vip khusus furoda program'],
        ['jadwal', 'Jadwal Keberangkatan', 'calendar', 'Tanggal berangkat, maskapai, dan sisa seat', 'jadwal keberangkatan tanggal berangkat seat kuota'],
        ['harga', 'Harga Paket', 'tag', 'Harga per orang, skema DP dan cicilan', 'harga biaya tarif dp cicilan promo pembayaran'],
        ['hotel', 'Hotel & Pesawat', 'hotel', 'Hotel bintang 3-5 dan maskapai pilihan', 'hotel pesawat maskapai saudia emirates turkish bintang makkah madinah'],
        ['itinerary', 'Itinerary Perjalanan', 'map', 'Rencana perjalanan hari demi hari', 'itinerary rencana perjalanan hari ziarah manasik'],
        ['tim', 'Tim Pembimbing', 'users', 'Muthawwif dan tim pendamping jamaah', 'tim pembimbing muthawwif ustadz ustadzah guide'],
        ['persyaratan', 'Persyaratan & Pendaftaran', 'clipboard', 'Dokumen yang dibutuhkan dan formulir pendaftaran', 'persyaratan syarat paspor ktp foto vaksin meningitis buku nikah mahram pendaftaran daftar form'],
        ['testimoni', 'Testimoni Jamaah', 'star', 'Kisah nyata dari jamaah kami', 'testimoni ulasan jamaah review'],
        ['chat', 'AI Chat — FAQ Paket & Pendaftaran', 'bot', 'Tanya jawab otomatis seputar paket dan pendaftaran', 'ai chat asisten bantuan faq tanya'],
    ],


    'hero' => [
        'eyebrow' => 'IBADAH SUCI, PERJALANAN MULIA',
        'title_1' => 'Umrah',
        'title_2' => 'Haji',
        'title_3' => 'Bersama Al Hijrah Travel',
        'desc'    => 'Wujudkan impian suci Anda bersama kami. Dengan pelayanan profesional, pembimbing berpengalaman, dan fasilitas terbaik, kami siap menemani perjalanan ibadah Anda ke Tanah Suci.',
        'quote'   => 'Dan bersiaplah untuk perjalanan yang paling mulia dalam hidup Anda.',
        'features' => [
            ['shield', 'Aman &', 'Terpercaya'],
            ['hand', 'Pembimbing', 'Berpengalaman'],
            ['award', 'Fasilitas', 'Premium'],
            ['heart', 'Pelayanan', 'Sepenuh Hati'],
        ],
    ],

    // Topik pada panel AI Assistant (beranda) — [icon, label, pertanyaan yang dikirim ke chatbot]
    'ai_topics' => [
        ['book', 'Informasi Paket Umrah & Haji', 'Apa saja paket umrah dan haji yang tersedia?'],
        ['calendar', 'Jadwal Keberangkatan', 'Kapan jadwal keberangkatan terdekat?'],
        ['tag', 'Harga & Promo', 'Berapa harga paket dan apakah ada promo?'],
        ['clipboard', 'Persyaratan Pendaftaran', 'Apa saja persyaratan pendaftaran?'],
        ['hotel', 'Hotel & Pesawat', 'Hotel dan pesawat apa yang digunakan?'],
        ['dots', 'Lainnya', 'Saya ingin bertanya hal lain'],
    ],

    /*
    | types: umrah / haji (boleh dua, dipisah spasi) · sub: teks kecil pada kartu preview beranda
    */
    'packages' => [
        [
            'id' => 'umrah-reguler', 'name' => 'Umrah Reguler', 'types' => 'umrah', 'sub' => '9 Hari', 'days' => '9 Hari 7 Malam',
            'price' => 29900000, 'image' => 'pkg-umrah-reguler.svg', 'badge' => 'Paling Diminati',
            'tagline' => 'Paket ibadah yang nyaman dan terjangkau dengan fasilitas lengkap untuk Makkah dan Madinah.',
            'airline' => 'Saudia', 'route' => 'Jakarta – Jeddah (PP)', 'hotel' => 'Hotel bintang 3–4, jalan kaki ke Masjidil Haram',
            'includes' => ['Tiket pesawat PP', 'Visa umrah & asuransi perjalanan', 'Hotel Makkah & Madinah', 'Makan 3x sehari', 'Muthawwif berpengalaman', 'Ziarah kota Makkah & Madinah', 'Perlengkapan umrah & manasik'],
        ],
        [
            'id' => 'umrah-plus-turki', 'name' => 'Umrah Plus Turki', 'types' => 'umrah', 'sub' => '12 Hari', 'days' => '12 Hari 10 Malam',
            'price' => 36500000, 'image' => 'pkg-umrah-turki.svg', 'badge' => 'Plus Wisata',
            'tagline' => 'Ibadah umrah dilengkapi wisata sejarah Islam di Istanbul dengan transit nyaman.',
            'airline' => 'Turkish Airlines', 'route' => 'Jakarta – Istanbul – Jeddah (PP)', 'hotel' => 'Hotel bintang 4, Istanbul 3 malam',
            'includes' => ['Tiket pesawat PP via Istanbul', 'Visa umrah & asuransi perjalanan', 'Hotel Makkah, Madinah & Istanbul', 'Wisata Masjid Biru & Hagia Sophia', 'Makan 3x sehari', 'Muthawwif & tour leader', 'Perlengkapan umrah & manasik'],
        ],
        [
            'id' => 'umrah-vip', 'name' => 'Umrah VIP', 'types' => 'umrah', 'sub' => '12 Hari', 'days' => '12 Hari 10 Malam',
            'price' => 49900000, 'image' => 'pkg-umrah-vip.svg', 'badge' => 'Premium',
            'tagline' => 'Pengalaman ibadah eksklusif dengan hotel bintang 5 dan layanan prioritas.',
            'airline' => 'Emirates', 'route' => 'Jakarta – Dubai – Jeddah (PP)', 'hotel' => 'Hotel bintang 5, depan Masjidil Haram',
            'includes' => ['Tiket pesawat PP kelas premium', 'Visa umrah & asuransi perjalanan', 'Hotel bintang 5 Makkah & Madinah', 'Makan prasmanan 3x sehari', 'Muthawwif & pendamping khusus', 'Transportasi bus eksklusif', 'Perlengkapan umrah premium'],
        ],
        [
            'id' => 'haji-khusus', 'name' => 'Haji Khusus', 'types' => 'umrah haji', 'sub' => 'Furoda', 'days' => '30 Hari',
            'price' => 198000000, 'image' => 'pkg-haji-khusus.svg', 'badge' => 'Haji',
            'tagline' => 'Program haji khusus dengan masa tunggu singkat, pembimbing intensif, dan fasilitas terbaik.',
            'airline' => 'Saudia', 'route' => 'Jakarta – Jeddah (PP)', 'hotel' => 'Hotel bintang 5, Makkah & Madinah',
            'includes' => ['Tiket pesawat PP', 'Visa haji resmi', 'Hotel bintang 5 Makkah & Madinah', 'Tenda Mina ber-AC & Arafah', 'Makan 3x sehari', 'Bimbingan manasik intensif', 'Muthawwif & dokter pendamping'],
        ],
        [
            'id' => 'haji-furoda', 'name' => 'Haji Furoda', 'types' => 'haji', 'sub' => '30 Hari', 'days' => '30 Hari',
            'price' => 289000000, 'image' => 'pkg-haji-furoda.svg', 'badge' => 'Tanpa Antre',
            'tagline' => 'Haji dengan visa mujamalah, berangkat tanpa antrean panjang dengan layanan eksklusif.',
            'airline' => 'Saudia', 'route' => 'Jakarta – Jeddah (PP)', 'hotel' => 'Hotel bintang 5, dekat Masjidil Haram',
            'includes' => ['Tiket pesawat PP', 'Visa haji mujamalah', 'Hotel bintang 5 Makkah & Madinah', 'Tenda eksklusif Mina & Arafah', 'Makan 3x sehari', 'Bimbingan manasik intensif', 'Muthawwif & dokter pendamping'],
        ],
        [
            'id' => 'haji-plus', 'name' => 'Haji Plus', 'types' => 'haji', 'sub' => '26 Hari', 'days' => '26 Hari',
            'price' => 165000000, 'image' => 'pkg-haji-plus.svg', 'badge' => 'Nyaman',
            'tagline' => 'Haji plus dengan masa tunggu lebih pendek dan akomodasi nyaman selama rangkaian ibadah.',
            'airline' => 'Saudia', 'route' => 'Jakarta – Madinah (PP)', 'hotel' => 'Hotel bintang 4–5, Makkah & Madinah',
            'includes' => ['Tiket pesawat PP', 'Visa haji resmi', 'Hotel bintang 4–5', 'Tenda Mina ber-AC', 'Makan 3x sehari', 'Bimbingan manasik', 'Muthawwif berpengalaman'],
        ],
    ],

    'schedules' => [
        ['date' => '12 Jan 2027', 'pkg' => 'Umrah Reguler', 'type' => 'umrah', 'days' => '9 Hari',  'airline' => 'Saudia', 'status' => 'Tersedia', 'seats' => 12, 'quota' => 45],
        ['date' => '20 Feb 2027', 'pkg' => 'Umrah Plus Turki', 'type' => 'umrah', 'days' => '12 Hari', 'airline' => 'Turkish Airlines', 'status' => 'Tersedia', 'seats' => 9, 'quota' => 40],
        ['date' => '15 Mar 2027', 'pkg' => 'Umrah VIP', 'type' => 'umrah', 'days' => '12 Hari', 'airline' => 'Emirates', 'status' => 'Tersedia', 'seats' => 8, 'quota' => 30],
        ['date' => '10 Apr 2027', 'pkg' => 'Haji Khusus', 'type' => 'haji', 'days' => '30 Hari', 'airline' => 'Saudia', 'status' => 'Tersedia', 'seats' => 6, 'quota' => 25],
        ['date' => '28 Apr 2027', 'pkg' => 'Umrah Reguler', 'type' => 'umrah', 'days' => '9 Hari', 'airline' => 'Saudia', 'status' => 'Hampir Penuh', 'seats' => 3, 'quota' => 45],
        ['date' => '16 Mei 2027', 'pkg' => 'Haji Plus', 'type' => 'haji', 'days' => '26 Hari', 'airline' => 'Saudia', 'status' => 'Tersedia', 'seats' => 10, 'quota' => 25],
        ['date' => '05 Jun 2027', 'pkg' => 'Umrah Plus Turki', 'type' => 'umrah', 'days' => '12 Hari', 'airline' => 'Turkish Airlines', 'status' => 'Penuh', 'seats' => 0, 'quota' => 40],
        ['date' => '19 Jul 2027', 'pkg' => 'Umrah VIP', 'type' => 'umrah', 'days' => '12 Hari', 'airline' => 'Emirates', 'status' => 'Tersedia', 'seats' => 14, 'quota' => 30],
    ],

    // Harga per orang — quad (4 orang/kamar), triple (3), double (2)
    'price_tiers' => [
        ['pkg' => 'Umrah Reguler', 'quad' => 29900000, 'triple' => 31900000, 'double' => 34900000],
        ['pkg' => 'Umrah Plus Turki', 'quad' => 36500000, 'triple' => 38500000, 'double' => 41500000],
        ['pkg' => 'Umrah VIP', 'quad' => 49900000, 'triple' => 52900000, 'double' => 56900000],
        ['pkg' => 'Haji Khusus', 'quad' => 198000000, 'triple' => 205000000, 'double' => 215000000],
    ],

    'price_includes' => ['Tiket pesawat pulang-pergi', 'Visa & asuransi perjalanan', 'Akomodasi hotel sesuai paket', 'Makan 3x sehari', 'Transportasi bus ber-AC', 'Muthawwif & tour leader', 'Perlengkapan ibadah & manasik', 'Air zam-zam 5 liter'],
    'price_excludes' => ['Paspor & biaya pembuatannya', 'Vaksin meningitis', 'Pengeluaran pribadi & oleh-oleh', 'Kelebihan bagasi', 'Biaya tambahan di luar program'],

    'payment_steps' => [
        ['Uang Muka (DP)', 'Mulai Rp 5.000.000 untuk mengamankan seat Anda.'],
        ['Cicilan Fleksibel', 'Lunasi bertahap sesuai kemampuan hingga H-45 keberangkatan.'],
        ['Pelunasan', 'Pembayaran lunas paling lambat 45 hari sebelum berangkat.'],
    ],

    'hotels' => [
        ['name' => 'Hotel Bintang 3', 'stars' => 3, 'image' => 'hotel-bintang-3.svg', 'makkah' => '± 900 m dari Masjidil Haram', 'madinah' => '± 400 m dari Masjid Nabawi', 'note' => 'Kamar nyaman, sarapan, dan shuttle bus.'],
        ['name' => 'Hotel Bintang 4', 'stars' => 4, 'image' => 'hotel-bintang-4.svg', 'makkah' => '± 400 m dari Masjidil Haram', 'madinah' => '± 200 m dari Masjid Nabawi', 'note' => 'Kamar luas, makan prasmanan, lift & wifi.'],
        ['name' => 'Hotel Bintang 5', 'stars' => 5, 'image' => 'hotel-bintang-5.svg', 'makkah' => 'Menghadap Masjidil Haram', 'madinah' => 'Area Markaziyah, jalan kaki singkat', 'note' => 'Kamar premium, lounge, dan layanan prioritas.'],
    ],

    'flights' => [
        ['airline' => 'Saudia', 'route' => 'Jakarta – Jeddah / Madinah', 'info' => 'Penerbangan langsung, bagasi 30 kg + kabin 7 kg.'],
        ['airline' => 'Turkish Airlines', 'route' => 'Jakarta – Istanbul – Jeddah', 'info' => 'Transit Istanbul, cocok untuk paket Umrah Plus Turki.'],
        ['airline' => 'Emirates', 'route' => 'Jakarta – Dubai – Jeddah', 'info' => 'Kelas premium dengan hiburan dan layanan terbaik.'],
    ],

    'facilities' => [
        ['bed', 'Hotel Bintang 3-5', 'di Makkah & Madinah'],
        ['plane', 'Maskapai Terbaik', '(Saudia, Emirates, Turkish, dll)'],
    ],

    // Preview beranda memakai 4 hari pertama
    'itinerary' => [
        ['Keberangkatan', 'Berkumpul di bandara, check-in, dan penerbangan menuju Tanah Suci.'],
        ['Tiba di Jeddah & Transfer', 'Tiba di Jeddah, proses imigrasi, lalu transfer ke hotel.'],
        ['Madinah (Ziarah)', 'Ibadah di Masjid Nabawi, Raudhah, dan ziarah tempat bersejarah.'],
        ['Makkah (Umrah)', 'Perjalanan ke Makkah, miqat, lalu thawaf, sa\'i, dan tahallul.'],
        ['Ibadah di Masjidil Haram', 'Memperbanyak ibadah dan shalat berjamaah di Masjidil Haram.'],
        ['Ziarah Kota Makkah', 'Mengunjungi Jabal Tsur, Jabal Rahmah, Arafah, Muzdalifah, dan Mina.'],
        ['Thawaf Wada\' & Belanja', 'Thawaf perpisahan dan waktu bebas untuk oleh-oleh.'],
        ['Transfer ke Jeddah', 'Check-out, city tour Jeddah singkat, lalu menuju bandara.'],
        ['Kepulangan', 'Penerbangan pulang dan tiba kembali di Tanah Air, Alhamdulillah.'],
    ],

    'team' => [
        ['name' => 'Ust. Ahmad Fauzi', 'role' => 'Muthawwif', 'image' => 'team-ahmad.svg', 'bio' => 'Berpengalaman lebih dari 12 tahun membimbing jamaah umrah dan haji.'],
        ['name' => 'Ustzh. Siti Aisyah', 'role' => 'Muthawwifah', 'image' => 'team-aisyah.svg', 'bio' => 'Pendamping jamaah wanita dengan pendekatan yang lembut dan sabar.'],
        ['name' => 'Ust. Rizky Pratama', 'role' => 'Muthawwif', 'image' => 'team-rizky.svg', 'bio' => 'Lulusan Madinah, fokus pada bimbingan manasik yang mudah dipahami.'],
        ['name' => 'Hj. Nurul Huda', 'role' => 'Tour Leader', 'image' => 'team-nurul.svg', 'bio' => 'Memastikan seluruh rangkaian perjalanan berjalan tertib dan nyaman.'],
        ['name' => 'Dedi Santoso', 'role' => 'Manajer Operasional', 'image' => 'team-dedi.svg', 'bio' => 'Mengatur visa, hotel, dan penerbangan agar jamaah tenang beribadah.'],
        ['name' => 'Rina Marlina', 'role' => 'Customer Care', 'image' => 'team-rina.svg', 'bio' => 'Siap membantu pendaftaran dan pertanyaan Anda setiap hari.'],
    ],

    'requirements' => [
        ['book', 'Paspor', 'Masa berlaku minimal 6 bulan dari tanggal keberangkatan dan nama minimal 2 suku kata.', 'Paspor (min. 6 bulan)'],
        ['image', 'Pas Foto', 'Foto 4x6 berlatar belakang putih, wajah terlihat jelas dan tanpa aksesoris.', 'Foto 4x6 (latar belakang putih)'],
        ['card', 'KTP & Kartu Keluarga', 'Fotokopi KTP dan KK yang masih berlaku sesuai data paspor.', 'KTP & KK'],
        ['heart', 'Buku Nikah', 'Wajib bagi pasangan suami istri yang berangkat bersama.', 'Buku nikah (jika sudah menikah)'],
        ['shield', 'Vaksin Meningitis', 'Sertifikat vaksin meningitis dari Kantor Kesehatan Pelabuhan (KKP).', 'Vaksin meningitis'],
        ['users', 'Mahram (Jamaah Wanita)', 'Jamaah wanita di bawah 45 tahun wajib bersama mahram atau rombongan.', null],
    ],

    'register_steps' => [
        ['Pilih Paket', 'Tentukan paket dan jadwal keberangkatan yang sesuai.'],
        ['Konsultasi', 'Hubungi tim kami melalui WhatsApp atau AI Chat.'],
        ['Kirim Dokumen & DP', 'Serahkan dokumen persyaratan dan bayar uang muka.'],
        ['Manasik & Berangkat', 'Ikuti manasik, lunasi pembayaran, dan berangkat ke Tanah Suci.'],
    ],

    'testimonials' => [
        ['name' => 'Rina Sari', 'role' => 'Jamaah Umrah Reguler', 'image' => 'tes-rina.svg', 'rating' => 5, 'text' => 'Pelayanan sangat memuaskan, pembimbingnya ramah dan profesional. InsyaAllah akan berangkat lagi bersama Al Hijrah Travel.'],
        ['name' => 'Budi Hartono', 'role' => 'Jamaah Umrah VIP', 'image' => 'tes-budi.svg', 'rating' => 5, 'text' => 'Hotelnya sangat dekat dengan Masjidil Haram, makanan enak, dan jadwal ibadah tertata rapi. Alhamdulillah lancar.'],
        ['name' => 'Hana Putri', 'role' => 'Jamaah Umrah Plus Turki', 'image' => 'tes-hana.svg', 'rating' => 5, 'text' => 'Bisa umrah sekaligus melihat Istanbul. Tour leader sabar dan selalu mendampingi jamaah lansia.'],
        ['name' => 'Andi Prasetyo', 'role' => 'Jamaah Umrah Reguler', 'image' => 'tes-andi.svg', 'rating' => 5, 'text' => 'Proses pendaftaran mudah dan transparan. Tim responsif menjawab semua pertanyaan kami.'],
        ['name' => 'Siti Nurhaliza', 'role' => 'Jamaah Haji Khusus', 'image' => 'tes-siti.svg', 'rating' => 5, 'text' => 'Bimbingan manasik sangat jelas sehingga ibadah haji terasa tenang dan khusyuk.'],
        ['name' => 'Fajar Ramadhan', 'role' => 'Jamaah Umrah Reguler', 'image' => 'tes-fajar.svg', 'rating' => 4, 'text' => 'Pelayanan baik dari keberangkatan sampai pulang. Muthawwif selalu siap membantu.'],
    ],

    /*
    | FAQ chatbot — k: kata kunci, a: jawaban, l: route tujuan (opsional) + label tombol
    */
    'faq' => [
        ['k' => ['paket', 'umrah', 'haji', 'program', 'pilihan'], 'q' => 'Apa saja paket yang tersedia?', 'a' => 'Kami menyediakan Umrah Reguler (9 hari), Umrah Plus Turki (12 hari), Umrah VIP (12 hari), serta Haji Khusus, Haji Furoda, dan Haji Plus.', 'l' => ['paket', 'Lihat Paket']],
        ['k' => ['jadwal', 'berangkat', 'keberangkatan', 'tanggal', 'kapan', 'seat', 'kuota'], 'q' => 'Kapan jadwal keberangkatan terdekat?', 'a' => 'Keberangkatan terdekat adalah Umrah Reguler pada 12 Jan 2027, disusul Umrah Plus Turki 20 Feb 2027 dan Umrah VIP 15 Mar 2027. Seat terbatas.', 'l' => ['jadwal', 'Lihat Jadwal']],
        ['k' => ['harga', 'biaya', 'tarif', 'berapa', 'promo', 'diskon', 'murah'], 'q' => 'Berapa harga paket?', 'a' => 'Umrah Reguler mulai Rp 29.900.000, Umrah Plus Turki Rp 36.500.000, Umrah VIP Rp 49.900.000, dan Haji Khusus Rp 198.000.000 per orang.', 'l' => ['harga', 'Cek Harga']],
        ['k' => ['dp', 'cicil', 'bayar', 'pembayaran', 'angsur', 'lunas', 'uang muka'], 'q' => 'Bagaimana skema pembayaran?', 'a' => 'DP mulai Rp 5.000.000, dapat dicicil bertahap, dan pelunasan paling lambat 45 hari sebelum keberangkatan.', 'l' => ['harga', 'Lihat Skema']],
        ['k' => ['syarat', 'persyaratan', 'dokumen', 'paspor', 'ktp', 'foto', 'vaksin', 'meningitis', 'berkas'], 'q' => 'Apa saja persyaratan pendaftaran?', 'a' => 'Siapkan paspor (min. 6 bulan), pas foto 4x6 latar putih, KTP & KK, buku nikah (jika menikah), dan vaksin meningitis.', 'l' => ['persyaratan', 'Lihat Persyaratan']],
        ['k' => ['daftar', 'pendaftaran', 'registrasi', 'cara', 'ikut', 'gabung'], 'q' => 'Bagaimana cara mendaftar?', 'a' => 'Pilih paket, konsultasi dengan tim kami, kirim dokumen dan bayar DP. Anda juga bisa langsung mendaftar melalui WhatsApp.', 'l' => ['persyaratan', 'Langkah Pendaftaran']],
        ['k' => ['mahram', 'wanita', 'perempuan', 'sendiri'], 'q' => 'Apakah wanita boleh berangkat tanpa mahram?', 'a' => 'Jamaah wanita di bawah 45 tahun wajib bersama mahram atau rombongan resmi sesuai ketentuan yang berlaku.', 'l' => ['persyaratan', 'Lihat Persyaratan']],
        ['k' => ['hotel', 'penginapan', 'menginap', 'kamar', 'bintang'], 'q' => 'Hotel apa yang digunakan?', 'a' => 'Kami menggunakan hotel bintang 3 hingga 5 di Makkah dan Madinah dengan jarak dekat ke masjid, sesuai paket yang dipilih.', 'l' => ['hotel', 'Lihat Hotel']],
        ['k' => ['pesawat', 'maskapai', 'tiket', 'terbang', 'saudia', 'emirates', 'turkish', 'bagasi'], 'q' => 'Maskapai apa yang digunakan?', 'a' => 'Maskapai terbaik seperti Saudia, Turkish Airlines, dan Emirates. Bagasi standar 30 kg ditambah kabin 7 kg.', 'l' => ['hotel', 'Lihat Penerbangan']],
        ['k' => ['itinerary', 'rencana', 'hari', 'durasi', 'lama', 'ziarah'], 'q' => 'Seperti apa itinerary perjalanannya?', 'a' => 'Itinerary Umrah Reguler 9 hari mencakup Madinah, Makkah, ziarah kota, hingga kepulangan. Detail lengkap tersedia di halaman Itinerary.', 'l' => ['itinerary', 'Lihat Itinerary']],
        ['k' => ['pembimbing', 'muthawwif', 'ustadz', 'ustadzah', 'tim', 'guide'], 'q' => 'Siapa pembimbing perjalanan?', 'a' => 'Jamaah didampingi muthawwif dan muthawwifah berpengalaman serta tour leader selama di Tanah Suci.', 'l' => ['tim', 'Kenali Tim']],
        ['k' => ['batal', 'refund', 'pengembalian', 'ganti'], 'q' => 'Bagaimana jika batal berangkat?', 'a' => 'Ketentuan pembatalan mengikuti kebijakan maskapai dan penyelenggara. Hubungi customer care kami untuk penjelasan sesuai kondisi Anda.', 'l' => null],
        ['k' => ['kontak', 'hubungi', 'telepon', 'alamat', 'lokasi', 'whatsapp', 'wa'], 'q' => 'Bagaimana menghubungi kami?', 'a' => 'WhatsApp +62 895-6303-00345, email info@alhijrahtravel.co.id, atau kunjungi kantor kami di Jl. Melati No. 25, Jakarta Selatan (Sen–Min 08.00–21.00).', 'l' => null],
    ],

    'chat' => [
        'greeting' => "Assalamu'alaikum! Ada yang bisa kami bantu? Pilih topik di bawah ini ya!",
        'fallback' => 'Maaf, saya belum menemukan jawaban yang tepat. Silakan pilih topik di bawah atau hubungi tim kami melalui WhatsApp.',
        'quick'    => ['Paket Umrah & Haji', 'Jadwal Keberangkatan', 'Harga & Promo', 'Persyaratan Pendaftaran', 'Cara Mendaftar'],
    ],

    'footer' => [
        'about' => 'Melayani dengan Hati, Menuntun hingga ke Tanah Suci.',
        'script_1' => 'Melayani dengan Hati,',
        'script_2' => 'Menuntun hingga ke Tanah Suci',
        'terms' => 'Pendaftaran dianggap sah setelah dokumen lengkap dan DP diterima. Jadwal, harga, dan fasilitas dapat berubah sesuai kebijakan maskapai, hotel, dan otoritas Arab Saudi. Pembatalan mengikuti ketentuan yang berlaku pada paket terkait.',
        'privacy' => 'Data pribadi (nama, kontak, dan dokumen perjalanan) hanya digunakan untuk proses pendaftaran, visa, dan layanan perjalanan Anda, dan tidak dibagikan kepada pihak lain di luar kebutuhan tersebut.',
    ],
];
