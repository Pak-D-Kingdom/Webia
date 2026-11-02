<?php

// Satu sumber data konten. Nanti tinggal ganti dengan query database.
return [
    'name' => 'Origins Cafe',
    'tagline' => 'Coffee • Food • Space',
    'phone' => '+62 895-6303-00345',
    'whatsapp' => '62895630300345',   // tujuan semua pesan form + tombol WhatsApp (format internasional, tanpa 0 / +)
    'email' => 'hello@originscafe.id',
    'address' => 'Jl. Raya Dharmahusada No. 88',
    'city' => 'Surabaya, Jawa Timur',
    'city_short' => 'Surabaya',

    // [label, nama icon di partials/icons.blade.php, url]
    'social' => [['Facebook', 'fb', '#'], ['Instagram', 'ig', '#'], ['TikTok', 'tt', '#']],

    // [label, nama route (home|menu|reservasi), anchor]
    'nav' => [['Beranda', 'home', '#beranda'], ['Menu', 'menu', ''], ['Produk & Layanan', 'home', '#layanan'],
        ['Promo', 'home', '#promo'], ['Reservasi', 'reservasi', ''], ['Lokasi', 'home', '#lokasi'], ['FAQ AI', 'home', '#faq']],

    // Menu navbar (bagian atas). Menu & Reservasi sengaja tidak ada: dibuka lewat tombol di beranda.
    'nav_top' => [['Beranda', 'home', '#beranda'], ['Produk & Layanan', 'home', '#layanan'], ['Promo', 'home', '#promo'],
        ['Lokasi', 'home', '#lokasi'], ['FAQ AI', 'home', '#faq']],

    // ===== PROMO =====
    // promo_mode     : 'slider' = tampil bergantian | 'grid' = semua promo tampil bersamaan
    // promo_per_view : (slider) jumlah promo yang terlihat sekaligus di desktop. Tablet maks 2, HP selalu 1.
    // promo_autoplay : (slider) pindah otomatis tiap N milidetik. 0 = mati.
    // Tambah / hapus promo cukup dengan menambah / menghapus satu baris di 'promos'.
    // tone: dark | brown | sand.  img = foto di folder gambar (opsional).  icon = emoji (opsional).
    'promo_mode' => 'slider',
    'promo_per_view' => 2,
    'promo_autoplay' => 5000,
    'promos' => [
        ['badge' => 'PROMO SPESIAL', 'title' => 'Buy 2 Get 1 Coffee!',  'desc' => 'Berlaku setiap Senin – Kamis',                'img' => 'promo.jpg', 'tone' => 'dark'],
        // --- 3 promo di bawah hanya CONTOH. Ganti dengan promo asli klien. ---
        ['badge' => 'AKHIR PEKAN',   'title' => 'Dessert Lebih Hemat',  'desc' => 'Berlaku Sabtu & Minggu untuk semua kue.',     'icon' => '🍰', 'tone' => 'brown'],
        ['badge' => 'MAHASISWA',     'title' => 'Belajar Sambil Ngopi', 'desc' => 'Tunjukkan kartu mahasiswa saat memesan.',     'icon' => '🎓', 'tone' => 'sand'],
        ['badge' => 'PAKET BERDUA',  'title' => 'Kopi + Camilan',        'desc' => 'Paket hemat untuk ngobrol berdua.',           'icon' => '☕', 'tone' => 'dark'],
    ],

    // [icon, judul, deskripsi]
    'features' => [['bean', 'Kopi Premium', 'Biji kopi pilihan'], ['chef', 'Makanan Lezat', 'Menu fresh setiap hari'],
        ['leaf', 'Tempat Nyaman', 'Modern & cozy'], ['wifi', 'Wi-Fi Gratis', 'Untuk bekerja & belajar'],
        ['users', 'Ruang Acara', 'Meeting & private event']],

    'categories' => ['all' => 'Semua', 'kopi' => 'Kopi', 'nonkopi' => 'Minuman Non-Kopi', 'makanan' => 'Makanan', 'snack' => 'Snack'],

    // img = file di public/images/website-bisnis/template/f&b/minimalis/cafe-earthtone/ (null = pakai emoji 'icon' sampai foto tersedia)
    // fav = tampil di "Menu Favorit" beranda
    'menu' => [
        ['name' => 'Café Latte',           'price' => 28000, 'cat' => 'kopi',    'img' => 'latte.jpg',        'icon' => '☕', 'fav' => true,  'desc' => 'Espresso dengan susu steamed dan latte art.'],
        ['name' => 'Es Kopi Susu Origins', 'price' => 26000, 'cat' => 'kopi',    'img' => 'es-kopi-susu.jpg', 'icon' => '🧋', 'fav' => true,  'desc' => 'Kopi susu dingin dengan manis gula aren.'],
        ['name' => 'Chicken Aglio Olio',   'price' => 48000, 'cat' => 'makanan', 'img' => 'aglio-olio.jpg',   'icon' => '🍝', 'fav' => true,  'desc' => 'Spaghetti bawang putih, cabai, dan ayam.'],
        ['name' => 'Tiramisu Cake',        'price' => 38000, 'cat' => 'snack',   'img' => 'tiramisu.jpg',     'icon' => '🍰', 'fav' => true,  'desc' => 'Kue lembut berlapis kopi dan mascarpone.'],
        ['name' => 'Cappuccino',           'price' => 27000, 'cat' => 'kopi',    'img' => null,               'icon' => '☕', 'fav' => false, 'desc' => 'Espresso, susu, dan busa susu tebal.'],
        ['name' => 'Matcha Latte',         'price' => 30000, 'cat' => 'nonkopi', 'img' => null,               'icon' => '🍵', 'fav' => false, 'desc' => 'Matcha dengan susu segar, panas atau dingin.'],
        ['name' => 'Lemon Tea',            'price' => 20000, 'cat' => 'nonkopi', 'img' => null,               'icon' => '🍋', 'fav' => false, 'desc' => 'Teh segar dengan perasan lemon.'],
        ['name' => 'French Fries',         'price' => 22000, 'cat' => 'snack',   'img' => null,               'icon' => '🍟', 'fav' => false, 'desc' => 'Kentang goreng renyah dengan saus pilihan.'],
    ],

    // [icon, judul, deskripsi, foto]
    'services' => [['utensils', 'Dine In', 'Makan di tempat suasana nyaman', 'dine-in.jpg'],
        ['bag', 'Take Away', 'Pesan praktis bawa pulang', 'take-away.jpg'],
        ['cake', 'Catering', 'Pesanan kue & menu untuk acara', 'catering.jpg'],
        ['sparkles', 'Private Event', 'Ruangan untuk meeting & gathering', 'private-event.jpg']],

    'hours' => ['Senin – Kamis' => '08.00 – 22.00', 'Jumat – Sabtu' => '08.00 – 23.00', 'Minggu' => '09.00 – 22.00'],
    'times' => ['08.00', '10.00', '12.00', '14.00', '16.00', '18.00', '20.00'],
    'guests' => ['1', '2', '3', '4', '5', '6', '8', '10+'],
    'faq_chips' => ['menu' => 'Lihat Menu', 'promo' => 'Cek Promo', 'reservasi' => 'Cara Reservasi', 'jam' => 'Jam Buka', 'lokasi' => 'Lokasi'],
];
