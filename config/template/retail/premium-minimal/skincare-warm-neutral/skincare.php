<?php

/**
 * GlowEra — Skincare E-Commerce (Premium Minimal · Warm Neutral)
 * WEBIA by D-KREASI
 *
 * File konfigurasi template (data statis). Semua teks, produk, kontak, dan FAQ AI
 * dibaca dari sini, sehingga tim backend cukup mengganti sumber datanya
 * (mis. database) tanpa menyentuh view.
 *
 * Key Laravel : config('template.retail.premium-minimal.skincare-warm-neutral.skincare')
 */

return [

    'name'    => 'GlowEra',
    'tagline' => 'Your Natural Beauty Partner',

    // Nomor WhatsApp tujuan semua form (format internasional tanpa + / 0 di depan)
    'whatsapp'         => '62895630300345',
    'whatsapp_display' => '0895 6303 0034 5',

    'free_shipping_min' => 300000,

    // Folder aset (relatif terhadap /public)
    'assets' => [
        'css' => 'css/website-bisnis/template/retail/premium-minimal/skincare-warm-neutral/skincare.css',
        'js'  => 'js/website-bisnis/template/retail/premium-minimal/skincare-warm-neutral/skincare.js',
    ],
    'img' => 'images/website-bisnis/template/retail/premium-minimal/skincare-warm-neutral',

    'topbar' => [
        'info' => [
            ['icon' => 'bi-truck',        'text' => 'Gratis Ongkir untuk pembelian di atas Rp 300.000'],
            ['icon' => 'bi-patch-check',  'text' => '100% Original Product'],
            ['icon' => 'bi-headset',      'text' => 'Customer Care: 0812 3456 7890'],
        ],
    ],

    'social' => [
        ['icon' => 'bi-instagram', 'label' => 'Instagram', 'url' => 'https://instagram.com/'],
        ['icon' => 'bi-youtube',   'label' => 'YouTube',   'url' => 'https://youtube.com/'],
        ['icon' => 'bi-tiktok',    'label' => 'TikTok',    'url' => 'https://tiktok.com/'],
        ['icon' => 'bi-facebook',  'label' => 'Facebook',  'url' => 'https://facebook.com/'],
    ],

    'hero' => [
        'kicker' => 'SKINCARE & BEAUTY PRODUCTS',
        'title'  => "Rawat Kulitmu,\nRaih Versi Terbaik Dirimu",
        'text'   => 'Temukan rangkaian skincare dan beauty products berkualitas untuk kulit sehat, glowing, dan percaya diri setiap hari.',
        'trust'  => [
            ['icon' => 'bi-shield-check', 'line1' => '100%',          'line2' => 'Original'],
            ['icon' => 'bi-patch-check',  'line1' => 'BPOM',          'line2' => 'Certified'],
            ['icon' => 'bi-flower1',      'line1' => 'Dermatologically', 'line2' => 'Tested'],
            ['icon' => 'bi-shield-fill-check', 'line1' => 'Safe for All', 'line2' => 'Skin Types'],
        ],
    ],

    'categories' => [
        ['slug' => 'all',       'label' => 'Semua Produk',          'icon' => 'bi-layers',        'count' => 124, 'img' => null],
        ['slug' => 'skincare',  'label' => 'Skincare',              'icon' => 'bi-droplet-half',  'count' => 48,  'img' => 'cat-skincare.jpg'],
        ['slug' => 'makeup',    'label' => 'Makeup',                'icon' => 'bi-palette',       'count' => 32,  'img' => 'cat-makeup.jpg'],
        ['slug' => 'haircare',  'label' => 'Hair Care',             'icon' => 'bi-scissors',      'count' => 15,  'img' => 'cat-haircare.jpg'],
        ['slug' => 'bodycare',  'label' => 'Body Care',              'icon' => 'bi-box2-heart',    'count' => 12,  'img' => 'cat-bodycare.jpg'],
        ['slug' => 'fragrance', 'label' => 'Fragrance',             'icon' => 'bi-flower2',       'count' => 8,   'img' => 'cat-fragrance.jpg'],
        ['slug' => 'tools',     'label' => 'Tools & Accessories',   'icon' => 'bi-brush',         'count' => 9,   'img' => 'cat-tools.jpg'],
    ],

    /*
     | Produk. stock <= 0 = Habis, stock <= 10 = Terbatas, selebihnya Tersedia.
     | badge: New | Best Seller | Sale | null
     */
    'products' => [
        ['id' => 1, 'name' => 'Brightening Serum',        'desc' => 'Mencerahkan & menyamarkan noda', 'category' => 'skincare', 'size' => '30 ml', 'price' => 189000, 'old_price' => 250000, 'rating' => 4.8, 'reviews' => '1.2k', 'stock' => 48, 'badge' => 'New',         'image' => 'product-1.jpg'],
        ['id' => 2, 'name' => 'Hydrating Moisturizer',    'desc' => 'Menjaga kelembapan kulit',        'category' => 'skincare', 'size' => '50 ml', 'price' => 159000, 'old_price' => 210000, 'rating' => 4.7, 'reviews' => '980', 'stock' => 32, 'badge' => 'Best Seller', 'image' => 'product-2.jpg'],
        ['id' => 3, 'name' => 'Sunscreen SPF 50 PA++++',  'desc' => 'Melindungi dari sinar UV',        'category' => 'skincare', 'size' => '50 ml', 'price' => 129000, 'old_price' => 180000, 'rating' => 4.9, 'reviews' => '1.5k', 'stock' => 9,  'badge' => 'Sale',        'image' => 'product-3.jpg'],
        ['id' => 4, 'name' => 'Hair Serum',               'desc' => 'Menutrisi & menguatkan rambut',   'category' => 'haircare', 'size' => '60 ml', 'price' => 149000, 'old_price' => 200000, 'rating' => 4.6, 'reviews' => '750', 'stock' => 21, 'badge' => 'New',         'image' => 'product-4.jpg'],
        ['id' => 5, 'name' => 'Radiant Glow Serum',       'desc' => 'Mencerahkan & melembapkan kulit', 'category' => 'skincare', 'size' => '30 ml', 'price' => 189000, 'old_price' => 350000, 'rating' => 4.8, 'reviews' => '1.2k', 'stock' => 40, 'badge' => 'Best Seller', 'image' => 'product-5.jpg', 'favorite' => true],
        ['id' => 6, 'name' => 'Vitamin C Essence',        'desc' => 'Menyegarkan & meratakan warna kulit', 'category' => 'skincare', 'size' => '30 ml', 'price' => 175000, 'old_price' => 220000, 'rating' => 4.7, 'reviews' => '640', 'stock' => 0,  'badge' => null,          'image' => 'product-6.jpg'],
        ['id' => 7, 'name' => 'Gentle Facial Cleanser',   'desc' => 'Membersihkan lembut setiap hari', 'category' => 'skincare', 'size' => '100 ml', 'price' => 99000,  'old_price' => 130000, 'rating' => 4.6, 'reviews' => '820', 'stock' => 6,  'badge' => null,          'image' => 'product-7.jpg'],
    ],

    'services' => [
        ['icon' => 'bi-truck',            'title' => 'Pengiriman Cepat',   'text' => 'Seluruh Indonesia'],
        ['icon' => 'bi-wallet2',          'title' => 'Pembayaran Aman',    'text' => 'Multiple Payment'],
        ['icon' => 'bi-shield-check',     'title' => 'Produk Original',    'text' => '100% Terjamin'],
        ['icon' => 'bi-headset',          'title' => 'Layanan Pelanggan',  'text' => '08.00 - 22.00 WIB'],
    ],

    'payments' => ['Transfer Bank', 'E-Wallet', 'QRIS', 'COD (sesuai area)'],
    'skin_types' => ['Normal', 'Kering', 'Berminyak', 'Kombinasi', 'Sensitif', 'Belum tahu'],

    'contact' => [
        'address' => 'Jl. Melati No. 12, Jakarta Selatan DKI Jakarta 12345',
        'phone'   => '+62 812 3456 7890',
        'email'   => 'info@glowera.id',
        'hours'   => '08.00 - 22.00 WIB',
    ],

    // AI Product FAQ (dipakai chat di beranda & tombol AI melayang)
    'ai' => [
        'name'     => 'AI Beauty Assistant',
        'greeting' => 'Hai! Aku siap membantu kamu seputar produk, skincare, dan kecantikan. Ada yang bisa aku bantu?',
        'fallback' => 'Maaf, aku belum punya jawaban pasti untuk itu. Kamu bisa tanya langsung ke admin kami lewat WhatsApp ya.',
        'suggestions' => [
            'Rekomendasi produk untuk kulit berjerawat?',
            'Cara pakai serum yang benar?',
            'Kapan hasil skincare mulai terlihat?',
            'Apakah produk ini aman untuk ibu hamil?',
        ],
        'faq' => [
            ['keys' => ['jerawat', 'berjerawat', 'acne', 'rekomendasi'],
             'a'    => 'Untuk kulit berjerawat, pilih produk yang ringan dan hindari pelembap yang terlalu berat. Gentle Facial Cleanser dan Brightening Serum bisa jadi langkah dasar. Lakukan patch test dulu, dan untuk jerawat meradang sebaiknya konsultasi ke dokter kulit.',
             'link' => 'catalog'],
            ['keys' => ['cara pakai', 'pakai serum', 'aplikasi', 'memakai'],
             'a'    => 'Bersihkan wajah, tepuk toner bila ada, lalu teteskan 2-3 tetes serum dan tepuk lembut hingga meresap. Lanjutkan dengan pelembap, dan di pagi hari akhiri dengan sunscreen. Ikuti anjuran pada kemasan produk.'],
            ['keys' => ['kapan hasil', 'hasil', 'terlihat', 'berapa lama'],
             'a'    => 'Hasil tiap orang berbeda. Umumnya skincare perlu dipakai rutin sekitar 4-8 minggu sebelum perubahan terlihat. Konsisten dan jangan terlalu sering berganti produk.'],
            ['keys' => ['hamil', 'menyusui', 'busui', 'ibu hamil'],
             'a'    => 'Untuk ibu hamil atau menyusui, sebaiknya konsultasikan komposisi produk dengan dokter kandungan atau dokter kulit sebelum memakai. Kamu juga bisa kirim nama produk ke admin kami lewat WhatsApp untuk melihat komposisinya.',
             'wa'   => true],
            ['keys' => ['ongkir', 'pengiriman', 'kirim', 'ekspedisi'],
             'a'    => 'Kami mengirim ke seluruh Indonesia. Gratis ongkir untuk pembelian di atas Rp 300.000; di bawah itu, ongkir dikonfirmasi admin saat checkout lewat WhatsApp.',
             'link' => 'cart'],
            ['keys' => ['bayar', 'pembayaran', 'transfer', 'qris', 'cod'],
             'a'    => 'Tersedia beberapa metode pembayaran seperti transfer bank, e-wallet, QRIS, dan COD (sesuai area). Metode dipilih saat checkout dan dikonfirmasi admin.',
             'link' => 'cart'],
            ['keys' => ['original', 'asli', 'bpom', 'aman', 'palsu'],
             'a'    => 'Semua produk GlowEra 100% original, BPOM certified, dermatologically tested, dan aman untuk semua jenis kulit.'],
            ['keys' => ['stok', 'tersedia', 'habis', 'ready'],
             'a'    => 'Cek halaman Ketersediaan untuk melihat sisa stok tiap produk. Jika stok habis, kamu bisa minta diberi tahu lewat WhatsApp.',
             'link' => 'stock'],
            ['keys' => ['harga', 'diskon', 'promo', 'murah'],
             'a'    => 'Daftar harga terbaru dan diskon hingga 50% ada di halaman Harga. Harga dan promo dapat berubah sewaktu-waktu.',
             'link' => 'price'],
            ['keys' => ['cara pesan', 'cara order', 'beli', 'checkout', 'pesan'],
             'a'    => 'Pilih produk, tambahkan ke Keranjang, isi data di halaman Keranjang, lalu tekan Checkout via WhatsApp. Admin akan mengonfirmasi pesanan dan pembayaran.',
             'link' => 'cart'],
            ['keys' => ['jam', 'buka', 'operasional', 'admin', 'customer'],
             'a'    => 'Layanan pelanggan kami aktif setiap hari pukul 08.00 - 22.00 WIB lewat WhatsApp.',
             'wa'   => true],
            ['keys' => ['sunscreen', 'spf', 'tabir surya'],
             'a'    => 'Sunscreen dipakai sebagai langkah terakhir skincare pagi, kira-kira dua ruas jari untuk wajah dan leher, dan diulang tiap 2-3 jam bila terpapar matahari.'],
            ['keys' => ['rambut', 'hair'],
             'a'    => 'Hair Serum dioleskan secukupnya dari bagian tengah hingga ujung rambut, hindari kulit kepala. Ikuti anjuran pada kemasan.'],
        ],
    ],

    'footer' => [
        'credit' => '© 2026 WEBIA by D-KREASI. Seluruh hak cipta dilindungi.',
    ],
];
