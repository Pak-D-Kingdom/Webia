<?php

/*
|--------------------------------------------------------------------------
| PureGlow — Skincare Sage Green (Organic)  ·  WEBIA by D-KREASI
|--------------------------------------------------------------------------
| Data statis untuk template frontend. Semua teks, produk, harga, stok,
| kontak, FAQ AI & nomor WhatsApp dipusatkan di sini agar view tidak perlu
| diubah saat konten diganti. Hanya array biasa (tanpa closure) supaya
| aman untuk `php artisan config:cache`.
|
| Key pemakaian : config('template.retail.organic.skincare-sage-green.skincare')
*/

$products = [
    [
        'slug' => 'radiant-face-serum', 'name' => 'Radiant Face Serum', 'category' => 'skincare',
        'tagline' => 'Mencerahkan & melembapkan', 'size' => '30 ml',
        'desc' => 'Serum ringan dengan ekstrak centella dan vitamin C alami untuk membantu kulit tampak cerah, lembap, dan lebih merata.',
        'price' => 159000, 'old_price' => 199000, 'rating' => 4.8, 'reviews' => '1.2k',
        'stock' => 48, 'badge' => 'Best Seller', 'image' => 'product-serum.jpg',
    ],
    [
        'slug' => 'hydrating-gel-cream', 'name' => 'Hydrating Gel Cream', 'category' => 'skincare',
        'tagline' => 'Menjaga kelembapan kulit', 'size' => '50 gr',
        'desc' => 'Gel cream bertekstur ringan yang mengunci kelembapan seharian tanpa rasa lengket, cocok untuk kulit kombinasi hingga sensitif.',
        'price' => 129000, 'old_price' => 159000, 'rating' => 4.7, 'reviews' => '980',
        'stock' => 36, 'badge' => 'New', 'image' => 'product-gel-cream.jpg',
    ],
    [
        'slug' => 'acne-care-cleanser', 'name' => 'Acne Care Cleanser', 'category' => 'skincare',
        'tagline' => 'Membersihkan & merawat jerawat', 'size' => '100 ml',
        'desc' => 'Pembersih wajah lembut dengan ekstrak tea tree dan daun sage untuk membantu mengangkat minyak berlebih dan merawat kulit berjerawat.',
        'price' => 89000, 'old_price' => 119000, 'rating' => 4.6, 'reviews' => '750',
        'stock' => 52, 'badge' => 'Sale', 'image' => 'product-cleanser.jpg',
    ],
    [
        'slug' => 'toner-essence', 'name' => 'Toner Essence', 'category' => 'skincare',
        'tagline' => 'Menyegarkan & menyeimbangkan kulit', 'size' => '150 ml',
        'desc' => 'Toner essence bebas alkohol yang menyegarkan, membantu menyeimbangkan pH kulit, dan menyiapkan kulit menyerap serum.',
        'price' => 119000, 'old_price' => 149000, 'rating' => 4.7, 'reviews' => '860',
        'stock' => 41, 'badge' => 'Best Seller', 'image' => 'product-toner.jpg',
    ],
    [
        'slug' => 'night-repair-cream', 'name' => 'Night Repair Cream', 'category' => 'skincare',
        'tagline' => 'Regenerasi kulit saat malam', 'size' => '50 gr',
        'desc' => 'Krim malam kaya nutrisi botani untuk membantu proses regenerasi kulit sehingga bangun tidur dengan kulit tampak lebih segar.',
        'price' => 149000, 'old_price' => 189000, 'rating' => 4.8, 'reviews' => '920',
        'stock' => 27, 'badge' => 'New', 'image' => 'product-night-cream.jpg',
    ],
    [
        'slug' => 'nature-glow-serum', 'name' => 'Nature Glow Serum', 'category' => 'skincare',
        'tagline' => 'Serum wajah dengan ekstrak centella dan niacinamide', 'size' => '30 ml',
        'desc' => 'Serum wajah dengan ekstrak centella dan niacinamide untuk membantu menenangkan, mencerahkan, dan menyamarkan tampilan pori.',
        'price' => 159000, 'old_price' => 199000, 'rating' => 4.8, 'reviews' => '1.2k',
        'stock' => 64, 'badge' => 'Best Seller', 'image' => 'hero-card-serum.jpg',
    ],
    [
        'slug' => 'sage-body-lotion', 'name' => 'Sage Body Lotion', 'category' => 'body-care',
        'tagline' => 'Melembapkan seluruh tubuh 24 jam', 'size' => '200 ml',
        'desc' => 'Lotion tubuh dengan shea butter dan ekstrak sage yang cepat meresap, membuat kulit tubuh terasa lembut dan wangi alami.',
        'price' => 99000, 'old_price' => null, 'rating' => 4.6, 'reviews' => '540',
        'stock' => 9, 'badge' => null, 'image' => 'product-body-lotion.jpg',
    ],
    [
        'slug' => 'botanical-hair-mask', 'name' => 'Botanical Hair Mask', 'category' => 'hair-care',
        'tagline' => 'Nutrisi intensif untuk rambut kering', 'size' => '150 gr',
        'desc' => 'Masker rambut dengan minyak argan dan ekstrak teh hijau untuk membantu melembutkan rambut kering dan mudah kusut.',
        'price' => 109000, 'old_price' => 139000, 'rating' => 4.7, 'reviews' => '430',
        'stock' => 30, 'badge' => 'Sale', 'image' => 'product-hair-mask.jpg',
    ],
    [
        'slug' => 'soft-glow-skin-tint', 'name' => 'Soft Glow Skin Tint', 'category' => 'makeup',
        'tagline' => 'Warna natural dengan efek glowing', 'size' => '30 ml',
        'desc' => 'Skin tint ringan berbahan botani yang meratakan warna kulit dengan hasil akhir natural dan glowing.',
        'price' => 119000, 'old_price' => null, 'rating' => 4.5, 'reviews' => '310',
        'stock' => 0, 'badge' => 'New', 'image' => 'product-skin-tint.jpg',
    ],
    [
        'slug' => 'green-tea-body-mist', 'name' => 'Green Tea Body Mist', 'category' => 'fragrance',
        'tagline' => 'Aroma segar teh hijau seharian', 'size' => '100 ml',
        'desc' => 'Body mist beraroma teh hijau dan melati yang segar, ringan, dan nyaman dipakai sepanjang hari.',
        'price' => 129000, 'old_price' => 159000, 'rating' => 4.8, 'reviews' => '620',
        'stock' => 22, 'badge' => null, 'image' => 'product-body-mist.jpg',
    ],
    [
        'slug' => 'sage-travel-jar-set', 'name' => 'Sage Travel Jar Set', 'category' => 'tools',
        'tagline' => 'Wadah refill praktis untuk bepergian', 'size' => 'Set 4 pcs',
        'desc' => 'Set wadah refill bebas BPA dalam warna sage untuk memindahkan skincare favoritmu saat bepergian.',
        'price' => 79000, 'old_price' => null, 'rating' => 4.7, 'reviews' => '270',
        'stock' => 60, 'badge' => null, 'image' => 'product-travel-set.jpg',
    ],
    [
        'slug' => 'calming-sheet-mask', 'name' => 'Calming Sheet Mask (5 pcs)', 'category' => 'skincare',
        'tagline' => 'Menenangkan kulit kemerahan', 'size' => '5 pcs',
        'desc' => 'Sheet mask dengan ekstrak aloe vera dan centella untuk membantu menenangkan kulit yang tampak lelah dan kemerahan.',
        'price' => 59000, 'old_price' => 79000, 'rating' => 4.6, 'reviews' => '880',
        'stock' => 90, 'badge' => 'Sale', 'image' => 'product-sheet-mask.jpg',
    ],
];

// Turunan data: status stok & persentase diskon dihitung sekali di sini.
$lowStock = 10;
$stockSummary = ['tersedia' => 0, 'terbatas' => 0, 'habis' => 0];
foreach ($products as $i => $p) {
    $products[$i]['status'] = $p['stock'] <= 0 ? 'habis' : ($p['stock'] <= $lowStock ? 'terbatas' : 'tersedia');
    $products[$i]['discount'] = $p['old_price'] ? (int) round(($p['old_price'] - $p['price']) / $p['old_price'] * 100) : 0;
    $stockSummary[$products[$i]['status']]++;
}

return [

    'brand' => [
        'name'    => 'PureGlow',
        'tagline' => 'Natural Beauty, Real You',
        'title'   => 'PureGlow — Natural Skincare & Beauty',
        'description' => 'PureGlow: skincare & beauty berbahan alami. Cek katalog, harga, stok, dan pesan langsung lewat WhatsApp.',
    ],

    // Satu nomor untuk semua tombol / form WhatsApp (format internasional tanpa +)
    'whatsapp' => [
        'number'  => '62895630300345',
        'display' => '0895 6303 00345',
        'hours'   => '08.00 - 22.00 WIB',
        'greeting' => 'Halo PureGlow, saya ingin bertanya tentang produk.',
    ],

    'assets' => [
        'css' => 'css/website-bisnis/template/retail/organic/skincare-sage-green/skincare.css',
        'js'  => 'js/website-bisnis/template/retail/organic/skincare-sage-green/skincare.js',
        'img' => 'images/website-bisnis/template/retail/organic/skincare-sage-green',
    ],

    // Nama view & prefix route (dipakai @include & route())
    'view'  => 'website-bisnis.template.retail.organic.skincare-sage-green.',
    'route' => 'skincare-sage-green.',

    'topbar' => [
        ['icon' => 'truck',        'text' => 'Gratis Ongkir untuk pembelian min. Rp 250.000'],
        ['icon' => 'shield-check', 'text' => '100% Original Product'],
        ['icon' => 'phone',        'text' => 'Customer Care: 0895 6303 00345'],
    ],

    'socials' => [
        ['icon' => 'instagram', 'label' => 'Instagram', 'url' => 'https://instagram.com/'],
        ['icon' => 'tiktok',    'label' => 'TikTok',    'url' => 'https://tiktok.com/'],
        ['icon' => 'youtube',   'label' => 'YouTube',   'url' => 'https://youtube.com/'],
        ['icon' => 'facebook',  'label' => 'Facebook',  'url' => 'https://facebook.com/'],
    ],

    'nav' => [
        ['key' => 'home',    'label' => 'Beranda', 'route' => 'home'],
        ['key' => 'catalog', 'label' => 'Katalog', 'route' => 'catalog'],
        ['key' => 'price',   'label' => 'Harga',   'route' => 'price'],
        ['key' => 'stock',   'label' => 'Stok',    'route' => 'stock'],
        ['key' => 'inquiry', 'label' => 'Inquiry', 'route' => 'inquiry'],
        ['key' => 'shop',    'label' => 'Belanja', 'route' => 'shop'],
    ],

    'hero' => [
        'eyebrow' => 'Natural Skincare & Beauty',
        'title'   => 'Cantik Alami, Dimulai dari Perawatan Terbaik',
        'text'    => 'Rasakan kelembutan bahan alami pilihan untuk kulit yang lebih sehat, cerah dan bercahaya setiap hari.',
        'cta'     => 'Jelajahi Produk',
        'featured' => 'nature-glow-serum',
        'trust' => [
            ['icon' => 'leaf',         'title' => '100%',                   'text' => 'Bahan Alami'],
            ['icon' => 'badge',        'title' => 'Dermatologically',       'text' => 'Tested'],
            ['icon' => 'smile',        'title' => 'Aman untuk',             'text' => 'Semua Jenis Kulit'],
            ['icon' => 'globe',        'title' => 'Ramah Lingkungan',       'text' => '& Cruelty Free'],
        ],
    ],

    'categories' => [
        ['key' => 'skincare',  'label' => 'Skincare',            'icon' => 'cat-face'],
        ['key' => 'makeup',    'label' => 'Makeup',              'icon' => 'cat-lipstick'],
        ['key' => 'hair-care', 'label' => 'Hair Care',           'icon' => 'cat-hair'],
        ['key' => 'body-care', 'label' => 'Body Care',           'icon' => 'cat-lotion'],
        ['key' => 'fragrance', 'label' => 'Fragrance',           'icon' => 'cat-perfume'],
        ['key' => 'tools',     'label' => 'Tools & Accessories', 'icon' => 'cat-brush'],
    ],

    'banners' => [
        'collection' => [
            'title' => 'Kulit Sehat Berawal dari Bahan Alami',
            'text'  => 'Pilihan terbaik untuk kecantikan alami Anda.',
            'cta'   => 'Lihat Koleksi',
            'image' => 'banner-collection.jpg',
        ],
        'care' => [
            'title' => 'Rawat Kulitmu Dengan Cinta',
            'text'  => 'Karena kulit sehat adalah investasi jangka panjang.',
            'cta'   => 'Shop Sekarang',
            'image' => 'woman-care.jpg',
        ],
    ],

    'features' => [
        ['icon' => 'truck',        'title' => 'Pengiriman Cepat',   'text' => 'Seluruh Indonesia'],
        ['icon' => 'wallet',       'title' => 'Pembayaran Aman',    'text' => 'Berbagai Metode'],
        ['icon' => 'shield-check', 'title' => 'Produk Original',    'text' => '100% Terjamin'],
        ['icon' => 'headset',      'title' => 'Layanan Pelanggan',  'text' => '08.00 - 22.00 WIB'],
    ],

    'shipping' => ['free_from' => 250000],

    'stock' => [
        'low_threshold' => $lowStock,
        'summary'       => $stockSummary,
        'restock_note'  => 'Estimasi restock 7–10 hari. Pre-order dibuka lewat WhatsApp.',
    ],

    'price_notes' => [
        'Harga sudah termasuk PPN dan dapat berubah sewaktu-waktu.',
        'Gratis ongkir untuk pembelian minimal Rp 250.000 ke seluruh Indonesia.',
        'Pembelian grosir / reseller? Hubungi kami lewat WhatsApp untuk harga khusus.',
    ],

    // Topik inquiry: label dipakai di <select> form & kartu topik beranda
    'inquiry_types' => [
        ['label' => 'Tanya produk',          'icon' => 'leaf',    'text' => 'Komposisi, cara pakai & rekomendasi'],
        ['label' => 'Tanya harga',           'icon' => 'tag',     'text' => 'Harga promo & paket hemat'],
        ['label' => 'Cek ketersediaan stok', 'icon' => 'package', 'text' => 'Pastikan produk masih ready'],
        ['label' => 'Pesan / pre-order',     'icon' => 'bag',     'text' => 'Pesan sekarang atau pre-order'],
        ['label' => 'Reseller & kerja sama', 'icon' => 'headset', 'text' => 'Harga khusus & kemitraan'],
        ['label' => 'Lainnya',               'icon' => 'message', 'text' => 'Pertanyaan atau saran lain'],
    ],

    'contact' => [
        'address' => 'Jl. Melati No. 12, Jakarta Selatan, DKI Jakarta 12345',
        'email'   => 'info@pureglow.id',
    ],

    'footer' => [
        'text' => 'Skincare & beauty berbahan alami untuk kulit sehat, cerah dan bercahaya setiap hari.',
        'credit' => '© 2026 WEBIA by D-KREASI. Seluruh hak cipta dilindungi.',
    ],

    'ai' => [
        'name'    => 'AI Beauty Assistant',
        'greeting' => 'Halo! Aku siap membantu kamu seputar produk, skincare, dan perawatan kulit. Ada yang bisa aku bantu?',
        'placeholder' => 'Tulis pertanyaan kamu...',
        'chips' => [
            'Rekomendasikan produk untuk kulit sensitif?',
            'Cara pakai serum yang benar?',
            'Kapan hasil skincare mulai terlihat?',
            'Apakah produk ini aman untuk ibu hamil?',
        ],
        'fallback' => 'Pertanyaan kamu belum ada di FAQ kami. Tim PureGlow siap bantu langsung lewat WhatsApp, ya!',
        'faq' => [
            ['keys' => ['sensitif', 'iritasi', 'kemerahan'],
             'a' => 'Untuk kulit sensitif, kami sarankan Hydrating Gel Cream, Toner Essence, dan Calming Sheet Mask. Semuanya berformula lembut. Tetap lakukan patch test di area belakang telinga 24 jam sebelum pemakaian pertama.'],
            ['keys' => ['cara pakai', 'pakai serum', 'aplikasi', 'urutan'],
             'a' => 'Urutan dasar: cleanser → toner → serum → moisturizer → sunscreen (pagi). Ambil 2–3 tetes serum, tepuk lembut ke wajah yang masih sedikit lembap, lalu tunggu 1 menit sebelum moisturizer.'],
            ['keys' => ['hasil', 'kapan', 'berapa lama', 'terlihat'],
             'a' => 'Kulit butuh sekitar 28 hari untuk regenerasi. Kebanyakan pelanggan mulai merasakan kulit lebih lembap dalam 1–2 minggu, dan hasil lebih terlihat setelah 4–8 minggu pemakaian rutin.'],
            ['keys' => ['hamil', 'menyusui', 'busui'],
             'a' => 'Untuk ibu hamil atau menyusui, kami sarankan berkonsultasi dulu dengan dokter dan memeriksa daftar komposisi di kemasan sebelum memakai produk apa pun. Tim kami juga bisa membantu cek komposisi lewat WhatsApp.'],
            ['keys' => ['jerawat', 'acne', 'berminyak', 'komedo'],
             'a' => 'Untuk kulit berjerawat atau berminyak, coba Acne Care Cleanser dipadukan dengan Toner Essence. Hindari memencet jerawat dan gunakan pelembap ringan seperti Hydrating Gel Cream.'],
            ['keys' => ['kering', 'lembap', 'dehidrasi'],
             'a' => 'Untuk kulit kering, kombinasikan Radiant Face Serum, Hydrating Gel Cream, dan Night Repair Cream di malam hari agar kelembapan terkunci.'],
            ['keys' => ['ongkir', 'kirim', 'pengiriman', 'ekspedisi'],
             'a' => 'Pengiriman ke seluruh Indonesia. Gratis ongkir untuk pembelian minimal Rp 250.000. Pesanan yang masuk sebelum pukul 15.00 WIB umumnya dikirim di hari yang sama.'],
            ['keys' => ['bayar', 'pembayaran', 'transfer', 'cod'],
             'a' => 'Pembayaran dikonfirmasi lewat WhatsApp: transfer bank, e-wallet, atau virtual account. Pesanan diproses setelah pembayaran terkonfirmasi.'],
            ['keys' => ['original', 'asli', 'palsu', 'aman'],
             'a' => 'Semua produk PureGlow 100% original, berbahan alami, dan sudah melalui uji dermatologis. Cek detail komposisi di kemasan atau tanyakan tim kami.'],
            ['keys' => ['retur', 'refund', 'tukar'],
             'a' => 'Jika produk rusak atau salah kirim, hubungi kami lewat WhatsApp maksimal 2 hari setelah barang diterima dengan menyertakan video unboxing.'],
        ],
    ],

    'products' => $products,

];
