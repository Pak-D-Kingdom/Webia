<?php

/*
|--------------------------------------------------------------------------
| The Lumière Café & Kitchen — template F&B · elegan · cafe-earthtone
|--------------------------------------------------------------------------
| Semua teks, link, dan data tampilan ada di sini supaya file Blade bersih.
| Dibaca di Blade lewat: config('template.f&b.elegan.cafe-earthtone.cafe')
| Setelah mengubah file ini jalankan: php artisan config:clear
*/

return [

    'assets' => [
        'css'    => 'css/website-bisnis/template/f&b/elegan/cafe-earthtone/cafe.css',
        'js'     => 'js/website-bisnis/template/f&b/elegan/cafe-earthtone/cafe.js',
        'images' => 'images/website-bisnis/template/f&b/elegan/cafe-earthtone/',
    ],

    // Awalan nama route (lihat routes/web.php). Halaman: home, menu, reservasi.
    'route_prefix' => 'webia.fnb.elegan.',

    'brand' => [
        'name'        => 'The Lumière',
        'title'       => 'The Lumière Café & Kitchen',
        'description' => 'Nikmati kopi, hidangan, dan suasana elegan di The Lumière Café & Kitchen, Surabaya. Reservasi meja atau pesan lewat WhatsApp.',
        'footer_text' => 'Lebih dari sekadar kopi, kami hadir untuk menemani setiap momen berharga Anda.',
    ],

    'contact' => [
        'address'       => 'Jl. Melati No. 12, Surabaya',
        'address_full'  => 'Jl. Melati No. 12, Surabaya, Jawa Timur 60271',
        'phone'         => '+62 812 3456 7890',
        'whatsapp'      => '62895630300345', // 0895630300345 → format internasional tanpa + atau spasi (tujuan semua pesan WhatsApp)
        'email'         => 'hello@thelumierecafe.id',
        'open_text'     => 'Buka setiap hari 07.00 - 22.00',
        'maps_url'      => 'https://www.google.com/maps/search/?api=1&query=Jl.+Melati+No.+12+Surabaya',
        'chat_message'  => 'Halo The Lumière, saya ingin bertanya tentang menu dan promo.',
    ],

    'social' => [
        ['name' => 'Instagram', 'icon' => 'instagram', 'url' => '#'],
        ['name' => 'Facebook',  'icon' => 'facebook',  'url' => '#'],
        ['name' => 'TikTok',    'icon' => 'tiktok',    'url' => '#'],
        ['name' => 'YouTube',   'icon' => 'youtube',   'url' => '#'],
    ],

    // Navigasi atas (navbar). page = nama halaman, anchor = bagian di halaman itu.
    'nav' => [
        ['label' => 'Beranda', 'page' => 'home', 'anchor' => '#beranda'],
        ['label' => 'Layanan', 'page' => 'home', 'anchor' => '#layanan'],
        ['label' => 'Promo',   'page' => 'home', 'anchor' => '#promo'],
        ['label' => 'Lokasi',  'page' => 'home', 'anchor' => '#lokasi'],
        ['label' => 'FAQ',     'page' => 'home', 'anchor' => '#faq'],
    ],

    // Quick Links di footer
    'footer_nav' => [
        ['label' => 'Beranda',   'page' => 'home',      'anchor' => '#beranda'],
        ['label' => 'Menu',      'page' => 'menu',      'anchor' => ''],
        ['label' => 'Layanan',   'page' => 'home',      'anchor' => '#layanan'],
        ['label' => 'Promo',     'page' => 'home',      'anchor' => '#promo'],
        ['label' => 'Lokasi',    'page' => 'home',      'anchor' => '#lokasi'],
        ['label' => 'Reservasi', 'page' => 'reservasi', 'anchor' => ''],
        ['label' => 'FAQ',       'page' => 'home',      'anchor' => '#faq'],
    ],

    // Hero. Panah kiri/kanan muncul otomatis bila slide lebih dari 1
    // (salin satu blok; image = file di folder images).
    'slides' => [
        [
            'image'   => 'hero.jpg',
            'eyebrow' => 'Welcome to The Lumière',
            'title'   => ['Good Food', 'Better Moments'],
            'text'    => 'Nikmati pengalaman bersantap yang tak terlupakan dengan cita rasa istimewa, suasana elegan, dan pelayanan terbaik di The Lumière Café & Kitchen.',
            'script'  => ['Good Coffee', 'Great Vibes'],
        ],
    ],

    'features' => [
        ['icon' => 'badge',   'title' => 'Menu Berkualitas', 'text' => 'Bahan segar & premium'],
        ['icon' => 'sofa',    'title' => 'Suasana Nyaman',   'text' => 'Desain elegan & cozy'],
        ['icon' => 'heart',   'title' => 'Pelayanan Ramah',  'text' => 'Tim profesional & cepat'],
        ['icon' => 'wifi',    'title' => 'WiFi Gratis',      'text' => 'Tetap terhubung'],
        ['icon' => 'parking', 'title' => 'Area Parkir Luas', 'text' => 'Nyaman & aman'],
    ],

    /*
    | Menu
    |   featured => true  : tampil di beranda (5 menu sesuai desain)
    |   category          : dipakai filter di halaman Menu (kunci harus ada di 'categories')
    |   price             : angka rupiah tanpa titik
    |   desc              : keterangan singkat (tampil di halaman Menu)
    | Tambah menu = salin satu baris, lalu taruh fotonya di folder images.
    | (Foto menu selain 5 yang featured masih foto contoh: ganti dengan foto asli.)
    */
    'menu' => [
        'eyebrow' => 'Our Menu',
        'title'   => 'Menu Pilihan Kami',
        'text'    => 'Rasakan kelezatan setiap hidangan yang dibuat dengan bahan terbaik dan resep istimewa.',
        'categories' => [           // hanya tampil di halaman Menu (label = tab, title/text = judul grup)
            'kopi'    => ['label' => 'Kopi',    'title' => 'Kopi Pilihan',   'text' => 'Diseduh dari biji pilihan, dari espresso klasik hingga kopi susu.'],
            'makanan' => ['label' => 'Makanan', 'title' => 'Hidangan Utama', 'text' => 'Hidangan hangat yang dimasak segar, dari steak hingga pasta.'],
            'snack'   => ['label' => 'Snack',   'title' => 'Snack & Dessert', 'text' => 'Camilan manis untuk menutup momen Anda.'],
        ],
        'items' => [
            // Kopi
            ['name' => 'Espresso',            'price' => 25000, 'category' => 'kopi',    'image' => 'espresso.jpg', 'desc' => 'Shot kopi pekat dengan crema tebal dan aroma kuat.',            'featured' => true],
            ['name' => 'Americano',           'price' => 28000, 'category' => 'kopi',    'image' => 'americano.jpg', 'desc' => 'Espresso dengan air panas, ringan dan bersih.'],
            ['name' => 'Cappuccino',          'price' => 32000, 'category' => 'kopi',    'image' => 'cappuccino.jpg', 'desc' => 'Espresso, susu panas, dan busa lembut berlapis.'],
            ['name' => 'Latte',               'price' => 32000, 'category' => 'kopi',    'image' => 'latte.jpg', 'desc' => 'Kopi susu lembut dengan latte art khas kami.',               'featured' => true],
            ['name' => 'Flat White',          'price' => 34000, 'category' => 'kopi',    'image' => 'flat-white.jpg', 'desc' => 'Espresso ganda dengan susu mikro-foam yang halus.'],
            ['name' => 'Es Kopi Susu',        'price' => 30000, 'category' => 'kopi',    'image' => 'es-kopi-susu.jpg', 'desc' => 'Kopi susu dingin dengan es, segar dan manis pas.'],
            // Makanan
            ['name' => 'Beef Steak',          'price' => 85000, 'category' => 'makanan', 'image' => 'beef-steak.jpg', 'desc' => 'Daging sapi panggang juicy dengan saus dan sayuran.',          'featured' => true],
            ['name' => 'Chicken Steak',       'price' => 65000, 'category' => 'makanan', 'image' => 'chicken-steak.jpg', 'desc' => 'Ayam panggang empuk dengan saus dan sayuran segar.'],
            ['name' => 'Spaghetti Carbonara', 'price' => 58000, 'category' => 'makanan', 'image' => 'spaghetti-carbonara.jpg', 'desc' => 'Pasta creamy dengan telur, keju, dan taburan lada.', 'featured' => true],
            ['name' => 'Aglio Olio',          'price' => 52000, 'category' => 'makanan', 'image' => 'aglio-olio.jpg', 'desc' => 'Pasta bawang putih, cabai, dan minyak zaitun.'],
            // Snack
            ['name' => 'Chocolate Lava Cake', 'price' => 45000, 'category' => 'snack',   'image' => 'chocolate-lava-cake.jpg', 'desc' => 'Kue cokelat hangat dengan lelehan cokelat di tengahnya.', 'featured' => true],
            ['name' => 'Chocolate Cake',      'price' => 38000, 'category' => 'snack',   'image' => 'chocolate-cake.jpg', 'desc' => 'Kue cokelat lembut berlapis krim cokelat.'],
            ['name' => 'Tiramisu',            'price' => 42000, 'category' => 'snack',   'image' => 'tiramisu.jpg', 'desc' => 'Dessert klasik berlapis kopi, krim mascarpone, dan kakao.'],
        ],
    ],

    /*
    | PROMO — dua tempat tampil: kartu (di samping menu) dan banner (di bawah).
    | Masing-masing bisa berisi 1, 2, 5, 9, atau lebih promo. Tambah promo = salin satu blok di 'items'.
    |
    |   mode      'slider' → bergantian (otomatis, titik navigasi muncul bila ada yang tersembunyi)
    |             'grid'   → semua promo tampil bersamaan
    |   per_view  (slider) jumlah promo yang tampil sekaligus: 1, 2, 3, 5, ...
    |             otomatis berkurang di layar sempit supaya kartu tetap terbaca
    |   min_width lebar minimal satu kartu promo (px); dipakai untuk menghitung muat berapa kartu
    |   interval  jeda pergantian (ms), hanya untuk slider
    | badge boleh dihapus bila tidak dipakai.
    */
    // (promo ke-2 dan seterusnya adalah CONTOH: ubah atau hapus sesuai promo asli)
    'promo_card' => [
        'mode'      => 'slider',   // bergantian, 1 per tampil (di samping menu)
        'per_view'  => 1,
        'min_width' => 320,
        'interval'  => 5000,
        'items'     => [
            [
                'eyebrow'  => 'Special Promo',
                'title'    => 'Buy 1 Get 1 Free',
                'subtitle' => 'for Selected Beverages',
                'period'   => '1 - 31 Oktober 2025',
                'badge'    => ['Beli 1', 'Gratis 1'],
                'image'    => 'promo-drinks.jpg',
            ],
            [
                'eyebrow'  => 'Special Promo',
                'title'    => 'Free Dessert',
                'subtitle' => 'untuk setiap menu utama',
                'period'   => 'Setiap akhir pekan',
                'badge'    => ['Gratis', 'Dessert'],
                'image'    => 'promo-dessert.jpg',
            ],
            [
                'eyebrow'  => 'Special Promo',
                'title'    => 'Paket Berdua',
                'subtitle' => 'Menu utama + 2 minuman',
                'period'   => 'Senin - Jumat',
                'badge'    => ['Hemat', 'Berdua'],
                'image'    => 'promo-steak.jpg',
            ],
            [
                'eyebrow'  => 'Special Promo',
                'title'    => 'Happy Hour',
                'subtitle' => 'untuk semua minuman kopi',
                'period'   => 'Setiap hari, 14.00 - 17.00',
                'badge'    => ['Happy', 'Hour'],
                'image'    => 'promo-coffee.jpg',
            ],
        ],
    ],

    'promo_banner' => [
        'mode'      => 'slider',   // bergantian, 2 tampil sekaligus (di kolom kiri, FAQ tetap di kanan)
        'per_view'  => 2,
        'min_width' => 330,
        'interval'  => 6000,
        'items'     => [
            [
                'eyebrow' => 'Promo Spesial',
                'title'   => 'Diskon 20% untuk Menu Makanan',
                'text'    => 'Hanya di akhir pekan, 18 - 19 Oktober 2025',
                'script'  => ['Good Food,', 'Good Mood'],
                'image'   => 'promo-cake.jpg',
            ],
            [
                'eyebrow' => 'Promo Spesial',
                'title'   => 'Diskon 15% untuk Semua Menu Pasta',
                'text'    => 'Berlaku Senin - Kamis',
                'script'  => ['Fresh', 'Pasta'],
                'image'   => 'promo-pasta.jpg',
            ],
            [
                'eyebrow' => 'Promo Spesial',
                'title'   => 'Kopi Spesial Hanya 25 Ribu',
                'text'    => 'Setiap hari, 14.00 - 17.00',
                'script'  => ['Coffee', 'Time'],
                'image'   => 'promo-coffee.jpg',
            ],
            [
                'eyebrow' => 'Promo Spesial',
                'title'   => 'Gratis Tiramisu untuk Paket Berdua',
                'text'    => 'Berlaku Jumat - Minggu',
                'script'  => ['Sweet', 'Moments'],
                'image'   => 'promo-dessert.jpg',
            ],
        ],
    ],

    // Produk & Layanan (tambah/ubah kartu di 'items'; image = file di folder images)
    'services' => [
        'eyebrow' => 'Products & Services',
        'title'   => 'Produk & Layanan Kami',
        'text'    => 'Pilihan layanan untuk setiap kebutuhan, dari bersantap santai hingga acara spesial.',
        'items'   => [
            ['title' => 'Dine In',       'image' => 'dine-in.jpg',
             'text'  => 'Nikmati hidangan dalam suasana hangat dan elegan bersama keluarga dan sahabat.'],
            ['title' => 'Take Away',     'image' => 'take-away.jpg',
             'text'  => 'Bawa pulang menu favorit Anda, dikemas rapi dan siap dinikmati di mana saja.'],
            ['title' => 'Catering',      'image' => 'catering.jpg',
             'text'  => 'Hidangan untuk acara kantor, arisan, dan perayaan dengan porsi sesuai kebutuhan.'],
            ['title' => 'Private Event', 'image' => 'private-event.jpg',
             'text'  => 'Ruang dan menu khusus untuk ulang tahun, pertemuan, atau acara privat Anda.'],
        ],
    ],

    // days: 0 = Minggu ... 6 = Sabtu (dipakai JS untuk menandai hari ini)
    'hours' => [
        'eyebrow' => 'Opening Hours',
        'title'   => 'Jam Operasional',
        'rows'    => [
            ['day' => 'Senin - Jumat', 'time' => '07.00 - 22.00', 'days' => [1, 2, 3, 4, 5]],
            ['day' => 'Sabtu',         'time' => '07.00 - 23.00', 'days' => [6]],
            ['day' => 'Minggu',        'time' => '07.00 - 22.00', 'days' => [0]],
        ],
    ],

    'location' => [
        'eyebrow'   => 'Our Location',
        'title'     => 'Lokasi Kami',
        'embed_url' => 'https://www.google.com/maps?q=Jl.+Melati+No.+12+Surabaya&output=embed',
        'cta'       => 'Lihat di Google Maps',
    ],

    // Dipakai di halaman Reservasi
    'booking' => [
        'eyebrow'       => 'Booking',
        'title'         => 'Reservasi Meja',
        'text'          => 'Reservasi meja sekarang untuk pengalaman bersantap yang lebih nyaman.',
        'form_text'     => 'Isi data berikut. Reservasi Anda akan dikirim ke WhatsApp kami untuk dikonfirmasi.',
        'max_guests'    => 12,
        'nav_cta'       => 'Reservasi Sekarang', // teks tombol di navbar
        'image'         => 'reservasi.jpg',
        'steps_title'   => 'Cara Reservasi',
        'steps'         => [
            ['title' => 'Isi data reservasi',  'text' => 'Nama, nomor WhatsApp, tanggal, jam, dan jumlah tamu.'],
            ['title' => 'Kirim via WhatsApp',  'text' => 'Data Anda otomatis tersusun dalam pesan WhatsApp.'],
            ['title' => 'Tunggu konfirmasi',   'text' => 'Tim kami akan mengonfirmasi ketersediaan meja Anda.'],
        ],
        'contact_title' => 'Butuh Bantuan?',
    ],

    // Tombol WhatsApp bulat (melayang di pojok kanan bawah)
    'whatsapp' => [
        'label' => 'Chat via WhatsApp',
    ],

    'faq' => [
        'eyebrow'     => 'AI FAQ',
        'title'       => 'Pertanyaan yang Sering Diajukan',
        'text'        => 'Temukan jawaban cepat untuk pertanyaan umum Anda.',
        'placeholder' => 'Tulis pertanyaan Anda di sini...',
        'fallback'    => 'Maaf, kami belum menemukan jawabannya. Silakan tanyakan langsung lewat WhatsApp, tim kami siap membantu.',
        // 4 pertanyaan pertama tampil sebagai tombol cepat. keywords dipakai untuk pencocokan.
        'items' => [
            ['q' => 'Apakah ada area outdoor?',
             'a' => 'Ya, tersedia area outdoor semi-terbuka dan area indoor ber-AC. Sebutkan pilihan area Anda saat reservasi.',
             'keywords' => ['outdoor', 'luar ruangan', 'teras', 'indoor']],
            ['q' => 'Bagaimana cara reservasi?',
             'a' => 'Klik "Reservasi Sekarang", isi nama, tanggal, jam, dan jumlah tamu. Data akan dikirim ke WhatsApp kami untuk dikonfirmasi.',
             'keywords' => ['reservasi', 'booking', 'pesan meja', 'book']],
            ['q' => 'Apakah ada promo hari ini?',
             'a' => 'Ya. Buy 1 Get 1 Free untuk minuman pilihan dan diskon 20% menu makanan di akhir pekan. Lihat bagian Promo untuk periodenya.',
             'keywords' => ['promo', 'diskon', 'potongan']],
            ['q' => 'Menu apa yang paling populer?',
             'a' => 'Favorit pelanggan: Latte, Beef Steak, Spaghetti Carbonara, dan Chocolate Lava Cake.',
             'keywords' => ['populer', 'favorit', 'rekomendasi', 'terlaris', 'best seller']],
            ['q' => 'Apakah ada WiFi gratis?',
             'a' => 'Ya, WiFi gratis tersedia untuk semua pengunjung.',
             'keywords' => ['wifi', 'wi fi', 'internet']],
            ['q' => 'Apakah tersedia area parkir?',
             'a' => 'Ya, tersedia area parkir luas untuk mobil dan motor.',
             'keywords' => ['parkir', 'parking']],
            ['q' => 'Jam berapa kafe buka?',
             'a' => 'Senin - Jumat 07.00 - 22.00, Sabtu 07.00 - 23.00, Minggu 07.00 - 22.00.',
             'keywords' => ['jam', 'buka', 'tutup', 'operasional']],
            ['q' => 'Di mana lokasi kafe?',
             'a' => 'Kami berada di Jl. Melati No. 12, Surabaya, Jawa Timur 60271. Klik "Lihat di Google Maps" untuk petunjuk arah.',
             'keywords' => ['lokasi', 'alamat', 'dimana', 'di mana', 'maps']],
        ],
    ],

    'footer' => [
        'legal' => [
            ['label' => 'Syarat & Ketentuan', 'url' => '#'],
            ['label' => 'Kebijakan Privasi',  'url' => '#'],
        ],
        'newsletter_placeholder' => 'Email Anda',
        'credit' => '© 2026 WEBIA by D-KREASI. Seluruh hak cipta dilindungi.',
    ],
];
