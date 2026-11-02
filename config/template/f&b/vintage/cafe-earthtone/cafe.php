<?php

/*
|--------------------------------------------------------------------------
| Template F&B — Vintage / Cafe Earthtone (Kopi Lembang)
|--------------------------------------------------------------------------
| Seluruh teks, link, dan data menu ada di file ini supaya file Blade
| tetap bersih. Saat backend siap, cukup ganti sumber data di sini
| (mis. dari database) tanpa mengubah markup.
|
| Dibaca lewat:
|   config('template.f&b.vintage.cafe-earthtone.cafe')
*/

return [

    /* Path aset & view (dipakai Blade agar tidak hardcode di banyak tempat) */
    'paths' => [
        'views' => 'website-bisnis.template.f&b.vintage.cafe-earthtone',
        'img' => 'images/website-bisnis/template/f&b/vintage/cafe-earthtone',
        'css' => 'css/website-bisnis/template/f&b/vintage/cafe-earthtone',
        'js' => 'js/website-bisnis/template/f&b/vintage/cafe-earthtone',
    ],

    /* Nama route (lihat routes/web.php) */
    'routes' => [
        'home' => 'webia.fnb.vintage.home',
        'menu' => 'webia.fnb.vintage.menu',
        'reservasi' => 'webia.fnb.vintage.reservasi',
    ],

    'brand' => [
        'name' => 'Kopi Lembang',
        'tagline' => 'Café & Eatery',
        'slogan' => 'Good Coffee, Good Mood',
        'description' => 'Kopi Lembang Café & Eatery — kopi berkualitas, makanan lezat, dan suasana vintage yang hangat di Lembang, Bandung.',
    ],

    'contact' => [
        'phone' => '+62 812 3456 7890',
        'wa_number' => '62895630300345', // WhatsApp tujuan semua pesan form (0895630300345). Format internasional tanpa + atau spasi
        'email' => 'hello@kopilembang.id',
        'address' => 'Jl. Kenangan No. 8, Lembang, Bandung, Jawa Barat 40391',
        'address_short' => 'Jl. Kenangan No. 8, Bandung',
        'maps_url' => 'https://www.google.com/maps/search/?api=1&query=Jl.+Kenangan+No.+8+Lembang+Bandung',
    ],

    'socials' => [
        ['key' => 'instagram', 'label' => 'Instagram', 'url' => 'https://instagram.com/'],
        ['key' => 'tiktok',    'label' => 'TikTok',    'url' => 'https://tiktok.com/'],
        ['key' => 'facebook',  'label' => 'Facebook',  'url' => 'https://facebook.com/'],
        ['key' => 'youtube',   'label' => 'YouTube',   'url' => 'https://youtube.com/'],
    ],
    // Sosial media yang tampil di topbar (sisanya hanya di footer)
    'topbar_socials' => ['instagram', 'tiktok', 'facebook'],

    'topbar' => [
        'hours' => 'Buka setiap hari 07.00 - 22.00',
    ],

    /*
     | Navigasi utama (navbar). Menu & Reservasi sengaja tidak ada di sini
     | karena sudah punya halaman sendiri. 'anchor' = id section di beranda.
     */
    'nav' => [
        ['label' => 'Beranda',     'anchor' => 'beranda'],
        ['label' => 'Produk & Layanan', 'anchor' => 'layanan'],
        ['label' => 'Promo',       'anchor' => 'promo'],
        ['label' => 'Lokasi',      'anchor' => 'lokasi'],
        ['label' => 'FAQ',         'anchor' => 'faq'],
    ],
    'nav_cta' => ['label' => 'Pesan Sekarang', 'route' => 'reservasi'],

    'hero' => [
        'greeting' => 'Selamat Datang di',
        'title' => 'Kopi Lembang',
        'subtitle' => 'Café & Eatery',
        'text' => 'Tempat sempurna untuk menikmati kopi berkualitas, makanan lezat, dan suasana vintage yang hangat.',
        'script' => 'More Than Just Coffee',
        'cta_primary' => ['label' => 'Lihat Menu', 'route' => 'menu', 'icon' => 'arrow-right'],
        'cta_secondary' => ['label' => 'Reservasi Meja', 'route' => 'reservasi', 'icon' => 'calendar'],
        'image_alt' => 'Suasana interior Kopi Lembang dengan meja kayu, lampu hangat, dan secangkir latte',
    ],

    /* Product / service — kelebihan yang ditawarkan (ikon = file di folder images) */
    'features' => [
        ['icon' => 'feature-1.png', 'title' => 'Kopi Pilihan',   'text' => 'Rasa autentik & berkualitas'],
        ['icon' => 'feature-2.png', 'title' => 'Menu Variatif',  'text' => 'Hidangan lokal & internasional'],
        ['icon' => 'feature-3.png', 'title' => 'Suasana Vintage', 'text' => 'Nyaman & Instagramable'],
        ['icon' => 'feature-4.png', 'title' => 'WiFi Gratis',    'text' => 'Tetap terhubung'],
        ['icon' => 'feature-5.png', 'title' => 'Area Parkir Luas', 'text' => 'Aman & nyaman'],
    ],

    /*
     | Produk & Layanan. 'type' hanya label kecil di kartu (mis. Produk / Layanan).
     | Tambah atau kurangi item sesuka Anda — grid menyesuaikan otomatis.
     */
    'services' => [
        'title' => 'Produk & Layanan',
        'subtitle' => 'Kopi, hidangan, dan layanan terbaik kami untuk setiap momen Anda.',
        'items' => [
            ['type' => 'Produk',  'title' => 'Kopi Pilihan',      'text' => 'Biji kopi pilihan yang diseduh dengan teliti, dari espresso klasik sampai kopi susu khas kami.', 'image' => 'latte.jpg',         'alt' => 'Caffe latte dengan latte art di atas meja kayu'],
            ['type' => 'Produk',  'title' => 'Dessert & Pastry',  'text' => 'Tiramisu, kue, dan hidangan manis buatan sendiri untuk menemani kopi sore Anda.',                 'image' => 'tiramisu.jpg',      'alt' => 'Sepotong tiramisu dengan topping stroberi'],
            ['type' => 'Layanan', 'title' => 'Dine In',           'text' => 'Duduk santai di ruangan bernuansa vintage dengan WiFi gratis dan area parkir luas.',               'image' => 'dine-in.jpg',       'alt' => 'Tampak depan Kopi Lembang dengan kanopi hijau'],
            ['type' => 'Layanan', 'title' => 'Take Away',         'text' => 'Pesan dan bawa pulang kopi serta makanan favorit Anda dengan kemasan rapi.',                        'image' => 'take-away.jpg',     'alt' => 'Secangkir kopi dan kue di atas meja kafe'],
            ['type' => 'Layanan', 'title' => 'Catering',          'text' => 'Sajian kopi dan makanan untuk kantor, arisan, dan acara keluarga Anda.',                           'image' => 'catering.jpg',      'alt' => 'Nasi goreng spesial dalam piring hitam'],
            ['type' => 'Layanan', 'title' => 'Private Event',      'text' => 'Ruang hangat untuk ulang tahun, reuni, dan pertemuan kecil bersama orang terdekat.',                'image' => 'private-event.jpg', 'alt' => 'Interior kafe dengan meja kayu dan lampu hangat'],
        ],
    ],

    /*
     | Menu. 'preview' => true = tampil di beranda (maks. 5 disarankan).
     | 'image' => null akan menampilkan placeholder; ganti dengan foto asli
     | dan harga sebenarnya. Harga dalam rupiah (integer).
     */
    'menu' => [
        'title' => 'Menu Andalan Kami',
        'subtitle' => 'Rasakan cita rasa terbaik dari setiap hidangan dan minuman kami.',
        'cta' => 'Lihat Semua Menu',
        'preview_limit' => 5, // jumlah menu (preview => true) yang tampil di beranda
        'page_title' => 'Menu Kami',
        'page_text' => 'Kopi, minuman segar, makanan, dan dessert — dibuat dengan bahan pilihan dan disajikan hangat.',
        'categories' => [
            'semua' => 'Semua',
            'kopi' => 'Kopi',
            'non-kopi' => 'Non Kopi',
            'makanan' => 'Makanan',
            'dessert' => 'Dessert',
        ],
        'items' => [
            ['name' => 'Caffe Latte',        'category' => 'kopi',     'price' => 28000, 'image' => 'latte.jpg',       'preview' => true,  'desc' => 'Espresso dengan susu steamed dan latte art yang lembut.'],
            ['name' => 'Americano',          'category' => 'kopi',     'price' => 22000, 'image' => 'americano.jpg',   'preview' => true,  'desc' => 'Espresso ganda dengan air panas, bersih dan pekat.'],
            ['name' => 'Nasi Goreng Spesial', 'category' => 'makanan',  'price' => 45000, 'image' => 'nasi-goreng.jpg', 'preview' => true,  'desc' => 'Nasi goreng bumbu rumahan dengan telur mata sapi dan acar.'],
            ['name' => 'Pasta Carbonara',    'category' => 'makanan',  'price' => 48000, 'image' => 'carbonara.jpg',   'preview' => true,  'desc' => 'Spaghetti dengan saus krim, beef bacon, dan keju parmesan.'],
            ['name' => 'Tiramisu',           'category' => 'dessert',  'price' => 32000, 'image' => 'tiramisu.jpg',    'preview' => true,  'desc' => 'Lapisan kopi, krim mascarpone, dan cokelat bubuk.'],
            // --- contoh item tambahan (ganti foto & harga sesuai data asli) ---
            ['name' => 'Cappuccino',         'category' => 'kopi',     'price' => 27000, 'image' => null, 'preview' => false, 'desc' => 'Espresso dengan busa susu tebal yang lembut.'],
            ['name' => 'Es Kopi Susu',       'category' => 'kopi',     'price' => 25000, 'image' => null, 'preview' => false, 'desc' => 'Kopi susu gula aren khas Kopi Lembang, disajikan dingin.'],
            ['name' => 'Matcha Latte',       'category' => 'non-kopi', 'price' => 29000, 'image' => null, 'preview' => false, 'desc' => 'Matcha dengan susu segar, manis seimbang.'],
            ['name' => 'Lemon Tea',          'category' => 'non-kopi', 'price' => 20000, 'image' => null, 'preview' => false, 'desc' => 'Teh seduh dengan perasan lemon segar.'],
            ['name' => 'Chicken Katsu Rice', 'category' => 'makanan',  'price' => 46000, 'image' => null, 'preview' => false, 'desc' => 'Ayam katsu renyah dengan nasi hangat dan saus rumah.'],
            ['name' => 'Roti Bakar Cokelat', 'category' => 'dessert',  'price' => 24000, 'image' => null, 'preview' => false, 'desc' => 'Roti bakar tebal dengan selai cokelat dan keju.'],
        ],
    ],

    /*
     | PROMO — bisa 1, 2, 5, 9, atau lebih banyak sekaligus.
     |  'layout'   : 'slider' = bergantian (geser / otomatis), 'grid' = tampil bersamaan semua
     |  'per_view' : (slider) berapa promo tampil sekaligus di desktop; otomatis 2 di tablet & 1 di mobile
     |  'autoplay' : (slider) geser otomatis; 'interval' dalam milidetik
     |  'tone'     : warna kartu — 'red' | 'green' | 'brown'
     | Isi item di bawah hanya contoh (kecuali promo pertama dari desain) — ganti sesuai promo asli.
     */
    'promo' => [
        'layout' => 'slider',
        'per_view' => 2,
        'autoplay' => true,
        'interval' => 5500,
        'items' => [
            [
                'badge' => 'Promo Spesial', 'title' => 'Diskon 20%', 'subtitle' => 'untuk Semua Menu Makanan',
                'period' => '1 – 31 Oktober 2025', 'tone' => 'red',
                'image' => 'promo.jpg', 'image_alt' => 'Nasi goreng spesial dengan telur mata sapi di atas piring hitam',
            ],
            [
                'badge' => 'Promo Akhir Pekan', 'title' => 'Beli 2 Gratis 1', 'subtitle' => 'untuk Minuman Kopi Pilihan',
                'period' => 'Setiap Sabtu & Minggu', 'tone' => 'green',
                'image' => 'latte.jpg', 'image_alt' => 'Caffe latte dengan latte art',
            ],
            [
                'badge' => 'Paket Hemat', 'title' => 'Hemat Rp 15.000', 'subtitle' => 'Pasta Carbonara + Minuman Pilihan',
                'period' => 'Setiap hari, 11.00 – 15.00', 'tone' => 'brown',
                'image' => 'carbonara.jpg', 'image_alt' => 'Pasta carbonara di atas piring putih',
            ],
        ],
    ],

    'hours' => [
        'title' => 'Jam Operasional',
        'rows' => [
            ['day' => 'Senin - Jumat', 'time' => '07.00 - 22.00'],
            ['day' => 'Sabtu',         'time' => '07.00 - 23.00'],
            ['day' => 'Minggu',        'time' => '07.00 - 23.00'],
        ],
    ],

    'location' => [
        'title' => 'Lokasi Kami',
        'map_image' => 'map.jpg',
        'map_alt' => 'Peta lokasi Kopi Lembang di Lembang, Bandung',
        // URL "embed" Google Maps (Share → Embed a map → salin isi src). null = pakai gambar map_image.
        'embed' => 'https://maps.google.com/maps?q=Lembang,+Bandung&z=15&output=embed',
        'cta' => 'Buka di Google Maps',
        'cta_directions' => 'Petunjuk Arah',
    ],

    'whatsapp' => [
        'title' => 'Hubungi Kami',
        'text' => 'Chat dengan kami untuk informasi lebih lanjut.',
        'cta' => 'Chat via WhatsApp',
        'message' => 'Halo Kopi Lembang, saya ingin bertanya.',
    ],

    /*
     | AI FAQ (frontend statis): jawaban dicocokkan lewat kata kunci di JS.
     | 'link' => ['label' => ..., 'route' => 'menu'|'reservasi'|'home'] opsional.
     | Saat backend AI siap, ganti 'endpoint' dan JS akan memakainya.
     */
    'faq' => [
        'label' => 'AI FAQ',
        'title' => 'Tanya Apa Saja',
        'text' => 'Dapatkan jawaban cepat seputar menu, reservasi, lokasi, promo, dan lainnya.',
        'placeholder' => 'Tulis pertanyaan Anda di sini...',
        'endpoint' => null,
        'chips' => ['Menu favorit apa?', 'Berapa harga menu?', 'Bagaimana cara reservasi?', 'Apakah ada promo hari ini?'],
        'fallback' => 'Maaf, saya belum menemukan jawabannya. Tanyakan langsung ke tim kami lewat WhatsApp ya.',
        'items' => [
            [
                'keywords' => ['favorit', 'andalan', 'rekomendasi', 'terlaris', 'best seller'],
                'answer' => 'Favorit pengunjung: Caffe Latte, Nasi Goreng Spesial, dan Tiramisu. Daftar lengkapnya ada di halaman Menu.',
                'link' => ['label' => 'Lihat Menu', 'route' => 'menu'],
            ],
            [
                'keywords' => ['harga', 'berapa', 'biaya', 'murah'],
                'answer' => 'Minuman kopi mulai dari Rp 22.000, makanan mulai dari Rp 45.000, dan dessert mulai dari Rp 32.000. Harga lengkap ada di halaman Menu.',
                'link' => ['label' => 'Lihat Menu', 'route' => 'menu'],
            ],
            [
                'keywords' => ['reservasi', 'booking', 'pesan meja', 'book', 'meja'],
                'answer' => 'Isi formulir di halaman Reservasi (nama, tanggal, jam, dan jumlah tamu). Tim kami akan mengonfirmasi lewat WhatsApp.',
                'link' => ['label' => 'Reservasi Meja', 'route' => 'reservasi'],
            ],
            [
                'keywords' => ['promo', 'diskon', 'potongan', 'hari ini'],
                'answer' => 'Saat ini ada Diskon 20% untuk semua menu makanan (1 – 31 Oktober 2025), Beli 2 Gratis 1 untuk kopi pilihan setiap akhir pekan, dan Paket Hemat Pasta + Minuman.',
            ],
            [
                'keywords' => ['jam', 'buka', 'tutup', 'operasional'],
                'answer' => 'Kami buka Senin – Jumat pukul 07.00 – 22.00, serta Sabtu dan Minggu pukul 07.00 – 23.00.',
            ],
            [
                'keywords' => ['lokasi', 'alamat', 'dimana', 'di mana', 'maps', 'arah'],
                'answer' => 'Kopi Lembang ada di Jl. Kenangan No. 8, Lembang, Bandung, Jawa Barat 40391.',
            ],
            [
                'keywords' => ['wifi', 'parkir', 'fasilitas'],
                'answer' => 'Kami menyediakan WiFi gratis yang tetap terhubung dan area parkir luas yang aman.',
            ],
            [
                'keywords' => ['whatsapp', 'wa', 'kontak', 'telepon', 'hubungi', 'nomor'],
                'answer' => 'Hubungi kami di +62 812 3456 7890 atau chat langsung lewat tombol WhatsApp bulat di pojok kanan bawah layar.',
            ],
        ],
    ],

    'reservation' => [
        'title' => 'Reservasi Meja',
        'text' => 'Pesan meja untuk pengalaman bersantap yang lebih nyaman.',
        'page_title' => 'Reservasi Meja',
        'page_text' => 'Isi data di bawah ini. Tim kami akan mengonfirmasi reservasi Anda lewat WhatsApp.',
        // 'whatsapp' = data form dikirim sebagai pesan ke contact.wa_number (WhatsApp terbuka otomatis).
        // 'server'   = form dikirim ke 'action' di bawah (isi dengan route backend). '#' = mode demo.
        'send_to' => 'whatsapp',
        'wa_title' => 'Halo Kopi Lembang, saya ingin reservasi meja:',
        'action' => '#',
        'method' => 'POST',
        'max_guests' => 20,
        'time_min' => '07:00',
        'time_max' => '21:00',
        'submit' => 'Kirim Reservasi',
        'success' => 'Terima kasih! WhatsApp akan terbuka dengan pesan reservasi Anda. Tekan tombol Kirim di WhatsApp untuk menyelesaikan reservasi.',
        'success_link' => 'Buka WhatsApp lagi',
    ],

    'footer' => [
        'links' => [
            ['label' => 'Beranda',      'route' => 'home'],
            ['label' => 'Menu',         'route' => 'menu'],
            ['label' => 'Produk & Layanan', 'route' => 'home', 'anchor' => 'layanan'],
            ['label' => 'Promo',        'route' => 'home', 'anchor' => 'promo'],
            ['label' => 'Lokasi',       'route' => 'home', 'anchor' => 'lokasi'],
            ['label' => 'Reservasi',    'route' => 'reservasi'],
            ['label' => 'FAQ',          'route' => 'home', 'anchor' => 'faq'],
        ],
        'copyright' => 'Kopi Lembang. All rights reserved.',
        'credit' => '© 2026 WEBIA by D-KREASI. Seluruh hak cipta dilindungi.',
    ],
];
