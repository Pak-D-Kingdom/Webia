<?php

/*
|--------------------------------------------------------------------------
| FreshWash — Template Laundry (Minimalist · Mint Fresh)
|--------------------------------------------------------------------------
| Akses di Blade:
|   config('template.home-services.minimalis.laundry-mint-fresh.laundry')
|
| Semua teks, harga, jam, area, dan FAQ chatbot dibaca dari file ini
| sehingga tim backend cukup mengganti array ini dengan data database.
*/

return [

    // ---------- Basis path & nama route ----------
    'view'       => 'website-bisnis.template.home-services.minimalis.laundry-mint-fresh',
    'asset_path' => 'website-bisnis/template/home-services/minimalis/laundry-mint-fresh',
    'route'      => 'laundry-mint-fresh.',

    // ---------- Brand & kontak ----------
    'brand' => [
        'name'    => 'FreshWash',
        'tagline' => 'Clean Clothes, Happy Life',
        'credit'  => '© 2026 WEBIA by D-KREASI. Seluruh hak cipta dilindungi.',
    ],

    'contact' => [
        'address'  => 'Jl. Melati No. 12, Surabaya',
        'phone'    => '+62 812 3456 7890',
        'email'    => 'hello@freshwash.id',
        'hours'    => 'Sen - Min 08.00 - 20.00',
        // Nomor tujuan semua tombol/form WhatsApp (format internasional tanpa +)
        'whatsapp' => '62895630300345',
    ],

    'social' => [
        ['icon' => 'instagram', 'label' => 'Instagram', 'url' => '#'],
        ['icon' => 'facebook',  'label' => 'Facebook',  'url' => '#'],
        ['icon' => 'tiktok',    'label' => 'TikTok',    'url' => '#'],
        ['icon' => 'youtube',   'label' => 'YouTube',   'url' => '#'],
    ],

    // ---------- Navigasi (nama route tanpa prefix) ----------
    'nav' => [
        ['label' => 'Home',       'route' => 'home'],
        ['label' => 'Services',   'route' => 'layanan'],
        ['label' => 'Price List', 'route' => 'harga'],
        ['label' => 'Coverage',   'route' => 'area'],
        ['label' => 'Contact',    'route' => 'inquiry'],
    ],

    // Menu tambahan pada dropdown "More" (halaman section lain)
    'nav_more' => [
        ['label' => 'Service Options',  'route' => 'opsi'],
        ['label' => 'Turnaround Time',  'route' => 'estimasi'],
        ['label' => 'How to Order',     'route' => 'cara'],
        ['label' => 'Operating Hours',  'route' => 'jam'],
    ],

    // ---------- Gambar (nama file di folder images template) ----------
    'img' => [
        'logo'      => 'logo.svg',
        'hero'      => 'hero-scene.svg',
        'leaf_l'    => 'leaf-left.svg',
        'leaf_r'    => 'leaf-right.svg',
        'truck'     => 'delivery-truck.svg',
        'clock'     => 'clock-calendar.svg',
        'robot'     => 'chatbot-robot.svg',
        'robot_big' => 'chatbot-banner.svg',
        'faq_art'   => 'faq-basket.svg',
    ],

    // ---------- Hero ----------
    'hero' => [
        'badge'    => 'Laundry & Cleaning Service',
        'title_1'  => 'Pakaian Bersih,',
        'title_2'  => 'Hidup Lebih Segar',
        'text'     => 'Layanan laundry profesional dengan hasil bersih, wangi, dan rapi. Kami siap menjaga pakaian kesayangan Anda.',
        'cta'      => 'Pesan Sekarang',
        'script'   => ['Fresh', 'Clean', 'Happy'],
        'features' => [
            ['icon' => 'drop',   'l1' => 'Bersih',            'l2' => '& Higienis'],
            ['icon' => 'shield', 'l1' => 'Aman untuk',        'l2' => 'Semua Jenis Kain'],
            ['icon' => 'leaf',   'l1' => 'Wangi',             'l2' => 'Tahan Lama'],
            ['icon' => 'bolt',   'l1' => 'Pelayanan Cepat',   'l2' => '& Terpercaya'],
        ],
    ],

    // ---------- Laundry Services ----------
    'services' => [
        'title' => 'Layanan Laundry',
        'sub'   => 'Solusi terbaik untuk semua kebutuhan laundry Anda.',
        'items' => [
            [
                'key' => 'kiloan', 'icon' => 'basket', 'name' => 'Laundry Kiloan', 'tag' => 'Bersih & Ekonomis',
                'desc'     => 'Cuci, kering, dan lipat rapi dengan harga per kilogram. Cocok untuk pakaian harian satu keluarga.',
                'from'     => 'Rp 6.000 / kg', 'time' => '1 - 2 hari',
                'features' => ['Dicuci terpisah warna putih & berwarna', 'Pelembut & pewangi premium', 'Dilipat & dikemas rapi'],
            ],
            [
                'key' => 'satuan', 'icon' => 'bag', 'name' => 'Laundry Satuan', 'tag' => 'Perawatan Khusus',
                'desc'     => 'Perawatan per potong untuk kemeja, jaket, dress, dan pakaian bernilai tinggi dengan penanganan ekstra hati-hati.',
                'from'     => 'Rp 12.000 / item', 'time' => '1 - 2 hari',
                'features' => ['Penanganan sesuai label kain', 'Pengecekan noda sebelum cuci', 'Digantung atau dilipat sesuai permintaan'],
            ],
            [
                'key' => 'cuci-kering', 'icon' => 'wind', 'name' => 'Cuci Kering', 'tag' => 'Tanpa Air',
                'desc'     => 'Dry cleaning untuk bahan yang tidak boleh terkena air seperti jas, blazer, gaun pesta, dan kain halus.',
                'from'     => 'Rp 25.000 / item', 'time' => '2 - 3 hari',
                'features' => ['Tanpa rendam air', 'Menjaga bentuk & warna kain', 'Dikemas dengan penutup pelindung'],
            ],
            [
                'key' => 'setrika', 'icon' => 'iron', 'name' => 'Setrika', 'tag' => 'Rapi & Siap Pakai',
                'desc'     => 'Layanan setrika uap untuk pakaian bersih milik Anda, licin, rapi, dan siap langsung dipakai.',
                'from'     => 'Rp 5.000 / kg', 'time' => '1 hari',
                'features' => ['Setrika uap anti kusut', 'Digantung atau dilipat', 'Cocok untuk pakaian kerja & seragam'],
            ],
        ],
    ],

    // ---------- Price list ----------
    'prices' => [
        'title' => 'Daftar Harga',
        'sub'   => 'Transparan, jelas, dan sesuai kualitas layanan kami.',
        'note'  => 'Harga dapat berubah sewaktu-waktu. Estimasi final dikonfirmasi tim kami saat penjemputan.',
        'item'  => [
            ['icon' => 'shirt',  'name' => 'Kemeja',         'price' => 15000],
            ['icon' => 'tshirt', 'name' => 'Kaos',           'price' => 12000],
            ['icon' => 'pants',  'name' => 'Celana Panjang', 'price' => 18000],
            ['icon' => 'jacket', 'name' => 'Jaket',          'price' => 25000],
            ['icon' => 'dress',  'name' => 'Dress',          'price' => 30000],
            ['icon' => 'jacket', 'name' => 'Jas / Blazer',   'price' => 35000],
            ['icon' => 'bag',    'name' => 'Selimut',        'price' => 40000],
            ['icon' => 'bag',    'name' => 'Bedcover',       'price' => 55000],
        ],
        'kg'    => [
            ['icon' => 'basket', 'name' => 'Cuci Kering Lipat',    'price' => 6000],
            ['icon' => 'iron',   'name' => 'Setrika Saja',         'price' => 5000],
            ['icon' => 'basket', 'name' => 'Cuci + Setrika',       'price' => 8000],
            ['icon' => 'bolt',   'name' => 'Express Cuci + Setrika', 'price' => 12000],
            ['icon' => 'leaf',   'name' => 'Eco Wash + Setrika',   'price' => 10000],
        ],
        'preview_count' => 5,
    ],

    // ---------- Service options ----------
    'options' => [
        'title' => 'Opsi Layanan',
        'sub'   => 'Pilih layanan sesuai kebutuhan Anda.',
        'items' => [
            ['icon' => 'clock',  'name' => 'Express Service', 'desc' => 'Selesai dalam 24 jam',     'long' => 'Prioritas pengerjaan untuk Anda yang butuh pakaian cepat kembali. Cocok untuk seragam, pakaian kerja, atau perjalanan mendadak.', 'extra' => 'Tambahan biaya mulai Rp 4.000 / kg'],
            ['icon' => 'calendar', 'name' => 'Regular Service', 'desc' => 'Selesai dalam 2-3 hari', 'long' => 'Layanan standar dengan kualitas penuh dan harga paling bersahabat. Pilihan terbaik untuk kebutuhan laundry rutin.', 'extra' => 'Tanpa biaya tambahan'],
            ['icon' => 'star',   'name' => 'Premium Care',    'desc' => 'Untuk pakaian spesial',    'long' => 'Penanganan manual, deterjen khusus, dan pengemasan eksklusif untuk pakaian bernilai tinggi atau bahan sensitif.', 'extra' => 'Tambahan biaya mulai Rp 8.000 / item'],
            ['icon' => 'leaf',   'name' => 'Eco Friendly',    'desc' => 'Ramah lingkungan',         'long' => 'Memakai deterjen biodegradable dan air hemat. Lembut di kulit sensitif dan aman bagi lingkungan sekitar.', 'extra' => 'Tambahan biaya mulai Rp 2.000 / kg'],
        ],
    ],

    // ---------- Turnaround ----------
    'turnaround' => [
        'title' => 'Estimasi Waktu Pengerjaan',
        'sub'   => 'Waktu pengerjaan dapat berubah tergantung jumlah dan jenis layanan.',
        'items' => [
            ['icon' => 'basket', 'name' => 'Laundry Kiloan', 'time' => '1 - 2 hari'],
            ['icon' => 'bag',    'name' => 'Laundry Satuan', 'time' => '1 - 2 hari'],
            ['icon' => 'wind',   'name' => 'Cuci Kering',    'time' => '2 - 3 hari'],
            ['icon' => 'iron',   'name' => 'Setrika',        'time' => '1 hari'],
        ],
        'process_title' => 'Tahapan Pengerjaan',
        'process' => [
            ['icon' => 'truck',   'name' => 'Dijemput',   'desc' => 'Kurir mengambil pakaian di alamat Anda'],
            ['icon' => 'form',    'name' => 'Dipilah',    'desc' => 'Dipisah berdasarkan warna dan jenis kain'],
            ['icon' => 'drop',    'name' => 'Dicuci',     'desc' => 'Dicuci dengan deterjen & pelembut pilihan'],
            ['icon' => 'wind',    'name' => 'Dikeringkan', 'desc' => 'Dikeringkan higienis dengan suhu aman'],
            ['icon' => 'iron',    'name' => 'Disetrika',  'desc' => 'Disetrika uap, dicek, dan dikemas rapi'],
            ['icon' => 'shield',  'name' => 'Diantar',    'desc' => 'Pakaian bersih tiba di depan pintu Anda'],
        ],
        'note' => 'Estimasi dihitung sejak pakaian kami terima. Layanan Express selesai dalam 24 jam (maksimal 15 kg per pesanan).',
    ],

    // ---------- Pickup & delivery coverage ----------
    'coverage' => [
        'title' => 'Area Jemput & Antar',
        'sub'   => 'Kami siap menjemput dan mengantar laundry Anda di area berikut.',
        'badge' => 'Gratis Jemput & Antar',
        'min'   => 'Minimal order 3 kg atau Rp 30.000 untuk gratis jemput & antar.',
        'areas' => [
            ['name' => 'Surabaya', 'scope' => 'Seluruh Kecamatan', 'free' => true,
             'list' => ['Gubeng', 'Tegalsari', 'Wonokromo', 'Rungkut', 'Sukolilo', 'Tandes', 'Mulyorejo', 'Genteng']],
            ['name' => 'Sidoarjo', 'scope' => 'Beberapa Area', 'free' => true,
             'list' => ['Waru', 'Gedangan', 'Taman', 'Sidoarjo Kota', 'Buduran']],
            ['name' => 'Gresik', 'scope' => 'Beberapa Area', 'free' => true,
             'list' => ['Gresik Kota', 'Kebomas', 'Driyorejo', 'Menganti']],
        ],
    ],

    // ---------- Order instructions ----------
    'steps' => [
        'title' => 'Cara Pemesanan',
        'sub'   => 'Mudah dan cepat, ikuti langkah berikut:',
        'items' => [
            ['icon' => 'basket', 'name' => 'Pilih Layanan',  'desc' => 'Tentukan jenis layanan yang dibutuhkan', 'long' => 'Pilih layanan (kiloan, satuan, cuci kering, atau setrika) dan opsi kecepatan yang Anda inginkan.'],
            ['icon' => 'form',   'name' => 'Isi Form',       'desc' => 'Lengkapi data dan alamat penjemputan',   'long' => 'Isi nama, nomor WhatsApp, alamat, dan catatan khusus pada form Order Inquiry.'],
            ['icon' => 'chat',   'name' => 'Konfirmasi',     'desc' => 'Tim kami akan segera menghubungi',       'long' => 'Admin kami mengonfirmasi jadwal jemput, estimasi harga, dan waktu pengerjaan lewat WhatsApp.'],
            ['icon' => 'drop',   'name' => 'Laundry Proses', 'desc' => 'Pakaian Anda kami proses dengan hati-hati', 'long' => 'Pakaian dipilah, dicuci sesuai jenis kain, dikeringkan, disetrika, dan dicek kualitasnya.'],
            ['icon' => 'truck',  'name' => 'Selesai',        'desc' => 'Pakaian bersih & rapi siap diantar',     'long' => 'Kurir mengantar pakaian bersih ke alamat Anda. Pembayaran bisa tunai, transfer, atau e-wallet.'],
        ],
    ],

    // ---------- Operating hours ----------
    'hours' => [
        'title' => 'Jam Operasional',
        'time'  => '08.00 - 20.00',
        'open'  => 8,
        'close' => 20,
        'label' => 'Setiap hari',
        'note'  => 'Termasuk hari libur nasional (dengan penyesuaian)',
        'days'  => [
            ['d' => 'Senin',  'n' => 1], ['d' => 'Selasa', 'n' => 2], ['d' => 'Rabu',   'n' => 3],
            ['d' => 'Kamis',  'n' => 4], ['d' => 'Jumat',  'n' => 5], ['d' => 'Sabtu',  'n' => 6],
            ['d' => 'Minggu', 'n' => 0],
        ],
    ],

    // ---------- Order inquiry ----------
    'inquiry' => [
        'title'   => 'Order Inquiry',
        'sub'     => 'Hubungi kami untuk pertanyaan, info harga, atau pemesanan.',
        'cta'     => 'Hubungi Kami',
        'form_cta' => 'Kirim via WhatsApp',
    ],

    // ---------- AI Chatbot ----------
    'chatbot' => [
        'name'    => 'FreshBot',
        'title'   => 'AI Chatbot',
        'sub'     => 'Tanya apa saja tentang harga, layanan, atau proses laundry. Kami siap membantu!',
        'cta'     => 'Mulai Chat',
        'teaser'  => 'Ada Pertanyaan? Chat Yuk!',
        'welcome' => 'Halo! Saya FreshBot, asisten FreshWash. Mau tanya soal harga atau proses laundry?',
        'fallback' => 'Maaf, saya belum menemukan jawaban untuk itu. Coba pilih salah satu topik di bawah, atau tanya tim kami langsung lewat WhatsApp.',
        // Kartu FAQ pada beranda → juga menjadi topik cepat di chatbot
        'faq' => [
            ['key' => 'harga',   'icon' => 'tag',     'label' => ['Daftar Harga', '& Layanan'],
             'keywords' => ['harga', 'biaya', 'tarif', 'berapa', 'murah', 'layanan', 'kiloan', 'satuan', 'kemeja', 'kaos', 'celana', 'jaket', 'dress', 'selimut', 'bedcover', 'blazer'],
             'answer'   => 'Harga kiloan mulai Rp 6.000/kg (cuci kering lipat) dan Rp 8.000/kg (cuci + setrika). Untuk satuan: kemeja Rp 15.000, kaos Rp 12.000, celana panjang Rp 18.000, jaket Rp 25.000, dress Rp 30.000. Lihat daftar lengkap di halaman Price List.',
             'link'     => 'harga', 'link_label' => 'Lihat Daftar Harga'],
            ['key' => 'proses',  'icon' => 'sparkle', 'label' => ['Proses Laundry', '& Estimasi Waktu'],
             'keywords' => ['proses', 'estimasi', 'lama', 'berapa lama', 'waktu', 'selesai', 'hari', 'express', 'cepat', 'durasi', 'tahap', 'cuci'],
             'answer'   => 'Alurnya: pakaian dipilah → dicuci sesuai jenis kain → dikeringkan → disetrika → dicek kualitas → dikemas. Estimasi: kiloan 1-2 hari, satuan 1-2 hari, cuci kering 2-3 hari, setrika 1 hari. Pilih Express untuk selesai dalam 24 jam.',
             'link'     => 'estimasi', 'link_label' => 'Lihat Estimasi Waktu'],
            ['key' => 'area',    'icon' => 'pin',     'label' => ['Area Jemput', '& Antar'],
             'keywords' => ['area', 'jemput', 'antar', 'lokasi', 'wilayah', 'surabaya', 'sidoarjo', 'gresik', 'ongkir', 'gratis', 'jangkauan'],
             'answer'   => 'Kami melayani jemput & antar GRATIS di seluruh kecamatan Surabaya, serta beberapa area Sidoarjo dan Gresik (minimal order 3 kg atau Rp 30.000).',
             'link'     => 'area', 'link_label' => 'Cek Area Layanan'],
            ['key' => 'pesan',   'icon' => 'form',    'label' => ['Cara Pemesanan', '& Pembayaran'],
             'keywords' => ['pesan', 'order', 'pemesanan', 'bayar', 'pembayaran', 'transfer', 'cod', 'tunai', 'ewallet', 'form', 'daftar'],
             'answer'   => 'Pesan lewat form Order Inquiry atau WhatsApp: pilih layanan → isi data & alamat → tunggu konfirmasi admin → pakaian dijemput. Pembayaran bisa tunai, transfer bank, atau e-wallet setelah pakaian diantar.',
             'link'     => 'cara', 'link_label' => 'Lihat Cara Pemesanan'],
            ['key' => 'tips',    'icon' => 'drop',    'label' => ['Tips Merawat', 'Pakaian'],
             'keywords' => ['tips', 'rawat', 'merawat', 'noda', 'luntur', 'menyusut', 'kusut', 'wangi', 'label', 'perawatan'],
             'answer'   => 'Tips singkat: pisahkan pakaian putih dan berwarna, baca label perawatan kain, keluarkan isi saku, dan beri tahu kami jika ada noda spesifik atau kain sensitif agar bisa ditangani khusus.',
             'link'     => 'layanan', 'link_label' => 'Lihat Layanan'],
        ],
        'hours_answer' => 'Kami buka setiap hari pukul 08.00 - 20.00 WIB, termasuk hari libur nasional (dengan penyesuaian).',
        'hours_keywords' => ['jam', 'buka', 'tutup', 'operasional'],
    ],
];
