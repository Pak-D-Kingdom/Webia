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
        'whatsapp'      => '6281234567890', // format internasional tanpa + atau spasi
        'email'         => 'hello@thelumierecafe.id',
        'open_text'     => 'Buka setiap hari 07.00 - 22.00',
        'maps_url'      => 'https://www.google.com/maps/search/?api=1&query=Jl.+Melati+No.+12+Surabaya',
        'order_message' => 'Halo The Lumière, saya ingin memesan.',
        'chat_message'  => 'Halo The Lumière, saya ingin bertanya tentang menu dan promo.',
    ],

    'social' => [
        ['name' => 'Instagram', 'icon' => 'instagram', 'url' => '#'],
        ['name' => 'Facebook',  'icon' => 'facebook',  'url' => '#'],
        ['name' => 'TikTok',    'icon' => 'tiktok',    'url' => '#'],
        ['name' => 'YouTube',   'icon' => 'youtube',   'url' => '#'],
    ],

    'nav' => [
        ['label' => 'Beranda',      'href' => '#beranda'],
        ['label' => 'Menu',         'href' => '#menu'],
        ['label' => 'Tentang Kami', 'href' => '#tentang'],
        ['label' => 'Promo',        'href' => '#promo'],
        ['label' => 'Lokasi',       'href' => '#lokasi'],
        ['label' => 'Reservasi',    'href' => '#reservasi'],
        ['label' => 'FAQ',          'href' => '#faq'],
    ],

    'slides' => [
        [
            'image'   => 'hero.jpg',
            'eyebrow' => 'Welcome to The Lumière',
            'title'   => ['Good Food', 'Better Moments'],
            'text'    => 'Nikmati pengalaman bersantap yang tak terlupakan dengan cita rasa istimewa, suasana elegan, dan pelayanan terbaik di The Lumière Café & Kitchen.',
            'script'  => ['Good Coffee', 'Great Vibes'],
        ],
        [
            'image'   => 'hero-2.jpg',
            'eyebrow' => 'Freshly brewed',
            'title'   => ['Crafted With', 'Passion & Care'],
            'text'    => 'Biji kopi pilihan, disangrai segar dan diseduh barista berpengalaman untuk setiap cangkir Anda.',
            'script'  => ['Brewed', 'With Love'],
        ],
        [
            'image'   => 'hero-3.jpg',
            'eyebrow' => 'Made to share',
            'title'   => ['Gather Around', 'Our Table'],
            'text'    => 'Rayakan momen spesial bersama keluarga dan sahabat dengan hidangan hangat di suasana yang nyaman.',
            'script'  => ['Good Food,', 'Good Mood'],
        ],
    ],

    'features' => [
        ['icon' => 'badge',   'title' => 'Menu Berkualitas', 'text' => 'Bahan segar & premium'],
        ['icon' => 'sofa',    'title' => 'Suasana Nyaman',   'text' => 'Desain elegan & cozy'],
        ['icon' => 'heart',   'title' => 'Pelayanan Ramah',  'text' => 'Tim profesional & cepat'],
        ['icon' => 'wifi',    'title' => 'WiFi Gratis',      'text' => 'Tetap terhubung'],
        ['icon' => 'parking', 'title' => 'Area Parkir Luas', 'text' => 'Nyaman & aman'],
    ],

    'menu' => [
        'eyebrow'    => 'Our Menu',
        'title'      => 'Menu Pilihan Kami',
        'text'       => 'Rasakan kelezatan setiap hidangan yang dibuat dengan bahan terbaik dan resep istimewa.',
        'all_url'    => '#menu', // ganti ke halaman menu lengkap bila sudah ada
        'home_limit' => 5,       // jumlah menu pada tab "Semua"
        'categories' => [
            'all'        => 'Semua',
            'coffee'     => 'Coffee',
            'non-coffee' => 'Non Coffee',
            'food'       => 'Makanan',
            'dessert'    => 'Dessert',
        ],
        // price: angka rupiah tanpa titik
        'items' => [
            ['name' => 'Espresso',            'price' => 25000, 'category' => 'coffee',     'image' => 'espresso.jpg'],
            ['name' => 'Latte',               'price' => 32000, 'category' => 'coffee',     'image' => 'latte.jpg'],
            ['name' => 'Beef Steak',          'price' => 85000, 'category' => 'food',       'image' => 'beef-steak.jpg'],
            ['name' => 'Spaghetti Carbonara', 'price' => 58000, 'category' => 'food',       'image' => 'spaghetti-carbonara.jpg'],
            ['name' => 'Chocolate Lava Cake', 'price' => 45000, 'category' => 'dessert',    'image' => 'chocolate-lava-cake.jpg'],
            ['name' => 'Matcha Latte',        'price' => 35000, 'category' => 'non-coffee', 'image' => 'matcha-latte.jpg'],
        ],
    ],

    'promo' => [
        'eyebrow'  => 'Special Promo',
        'title'    => 'Buy 1 Get 1 Free',
        'subtitle' => 'for Selected Beverages',
        'period'   => '1 - 31 Oktober 2025',
        'badge'    => ['Beli 1', 'Gratis 1'],
        'cta'      => 'Lihat Promo',
        'url'      => '#promo',
        'image'    => 'promo-drinks.jpg',
    ],

    'about' => [
        'eyebrow' => 'About Us',
        'title'   => 'Tentang Kami',
        'text'    => 'The Lumière Café & Kitchen adalah tempat di mana rasa, suasana, dan kebersamaan bertemu. Kami percaya bahwa makanan yang baik dapat menciptakan momen indah dalam hidup.',
        'cta'     => 'Pelajari Lebih Lanjut',
        'url'     => '#tentang',
        'image'   => 'about.jpg',
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
        'map_image' => 'map.jpg',
        'map_label' => 'The Lumière Café & Kitchen',
        'cta'       => 'Lihat di Google Maps',
    ],

    'booking' => [
        'eyebrow'    => 'Booking',
        'title'      => 'Reservasi Meja',
        'text'       => 'Reservasi meja sekarang untuk pengalaman bersantap yang lebih nyaman.',
        'cta'        => 'Reservasi Sekarang',
        'modal_text' => 'Isi data berikut. Reservasi Anda akan dikirim ke WhatsApp kami untuk dikonfirmasi.',
        'max_guests' => 12,
    ],

    'whatsapp' => [
        'eyebrow' => 'Chat via WhatsApp',
        'title'   => 'Hubungi Kami',
        'text'    => 'Tanya menu, promo, atau reservasi melalui WhatsApp.',
        'cta'     => 'Chat Sekarang',
    ],

    'banner' => [
        'eyebrow' => 'Promo Spesial',
        'title'   => 'Diskon 20% untuk Menu Makanan',
        'text'    => 'Hanya di akhir pekan, 18 - 19 Oktober 2025',
        'cta'     => 'Lihat Detail',
        'url'     => '#promo',
        'script'  => ['Good Food,', 'Good Mood'],
        'image'   => 'promo-cake.jpg',
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
    ],
];
