<?php

use Illuminate\Support\Str;

/**
 * Belleza - Luxury Skincare (Soft Pink)
 * Sumber data statis untuk template. Backend bisa mengganti isi array ini
 * dengan data dari database tanpa mengubah view (kunci array tetap sama).
 */
$config = [
    'brand' => [
        'name' => 'Belleza',
        'tagline' => 'Glow Your Best Self',
    ],

    'contact' => [
        'whatsapp' => '62895630300345',          // format internasional tanpa +
        'phone_display' => '0812 3456 7890',
        'email' => 'info@belleza.id',
        'address' => 'Jl. Melati No. 12, Jakarta Selatan, DKI Jakarta 12345',
        'hours' => '08.00 - 22.00 WIB',
    ],

    'currency' => 'Rp',
    'free_shipping_min' => 500000,

    'social' => [
        ['icon' => 'bi-instagram',    'label' => 'Instagram', 'url' => '#'],
        ['icon' => 'bi-tiktok',       'label' => 'TikTok',    'url' => '#'],
        ['icon' => 'bi-youtube',      'label' => 'YouTube',   'url' => '#'],
        ['icon' => 'bi-bar-chart',    'label' => 'Marketplace', 'url' => '#'],
    ],

    'categories' => [
        ['slug' => 'skincare',  'name' => 'Skincare',            'icon' => 'bi-droplet-half'],
        ['slug' => 'makeup',    'name' => 'Makeup',              'icon' => 'bi-palette'],
        ['slug' => 'fragrance', 'name' => 'Fragrance',           'icon' => 'bi-flower1'],
        ['slug' => 'haircare',  'name' => 'Hair Care',           'icon' => 'bi-scissors'],
        ['slug' => 'bodycare',  'name' => 'Body Care',           'icon' => 'bi-heart-pulse'],
        ['slug' => 'tools',     'name' => 'Tools & Accessories', 'icon' => 'bi-brush'],
    ],

    // stock: jumlah unit. <= 0 habis, <= low_stock menipis, selain itu tersedia.
    'low_stock' => 10,

    'products' => [
        ['id' => 1, 'name' => 'Brightening Toner',   'category' => 'skincare', 'size' => '150 ml', 'price' => 149000, 'old_price' => 199000, 'badge' => 'Best Seller', 'rating' => 4.8, 'reviews' => '980',  'stock' => 48, 'image' => 'product-toner.jpg',       'desc' => 'Toner pencerah dengan niacinamide untuk kulit tampak lebih cerah.'],
        ['id' => 2, 'name' => 'Hydrating Moisturizer', 'category' => 'skincare', 'size' => '50 gr',  'price' => 179000, 'old_price' => 229000, 'badge' => null,          'rating' => 4.7, 'reviews' => '1.2k', 'stock' => 32, 'image' => 'product-moisturizer.jpg', 'desc' => 'Pelembap kaya hidrasi yang menjaga kulit tetap kenyal seharian.'],
        ['id' => 3, 'name' => 'Matte Lip Cream',     'category' => 'makeup',   'size' => '4.5 ml', 'price' => 99000,  'old_price' => 129000, 'badge' => 'Sale',        'rating' => 4.6, 'reviews' => '750',  'stock' => 8,  'image' => 'product-lip.jpg',          'desc' => 'Lip cream matte lembut dengan warna rose yang tahan lama.'],
        ['id' => 4, 'name' => 'Face Serum',          'category' => 'skincare', 'size' => '30 ml',  'price' => 219000, 'old_price' => 279000, 'badge' => 'New',         'rating' => 4.9, 'reviews' => '1.5k', 'stock' => 21, 'image' => 'product-serum.jpg',        'desc' => 'Serum wajah ringan untuk meratakan tone dan menyamarkan noda.'],
        ['id' => 5, 'name' => 'Sunscreen SPF 50',    'category' => 'skincare', 'size' => '50 ml',  'price' => 159000, 'old_price' => 199000, 'badge' => 'Popular',     'rating' => 4.7, 'reviews' => '860',  'stock' => 64, 'image' => 'product-spf.jpg',          'desc' => 'Tabir surya SPF 50 PA++++ tanpa white cast, nyaman dipakai harian.'],
        ['id' => 6, 'name' => 'Glow Radiance Serum', 'category' => 'skincare', 'size' => '30 ml',  'price' => 199000, 'old_price' => 299000, 'badge' => 'Best Seller', 'rating' => 4.8, 'reviews' => '1.2k', 'stock' => 15, 'image' => 'product-glow-serum.jpg',   'desc' => 'Serum pencerah dengan niacinamide & brightening extract.'],
        ['id' => 7, 'name' => 'Skincare Routine Set', 'category' => 'skincare', 'size' => '5 item', 'price' => 499000, 'old_price' => 699000, 'badge' => 'New',         'rating' => 4.9, 'reviews' => '420',  'stock' => 6,  'image' => 'promo-side.jpg',           'desc' => 'Paket lengkap rutinitas skincare dari pembersih sampai tabir surya.'],
        ['id' => 8, 'name' => 'Belleza Gift Box',    'category' => 'bodycare', 'size' => '3 item', 'price' => 349000, 'old_price' => 429000, 'badge' => 'Sale',        'rating' => 4.8, 'reviews' => '310',  'stock' => 0,  'image' => 'banner-member.jpg',        'desc' => 'Kotak hadiah eksklusif berisi perawatan favorit Belleza.'],
    ],

    'hero' => [
        'badge' => 'Premium Beauty & Skincare',
        'title' => 'Timeless Beauty for a Brighter You',
        'text' => 'Rangkaian produk skincare & beauty premium dengan bahan pilihan untuk kulit sehat, bercahaya, dan tampak lebih muda setiap hari.',
        'features' => [
            ['icon' => 'bi-patch-check',  'title' => '100%',         'sub' => 'Original'],
            ['icon' => 'bi-shield-check', 'title' => 'Dermatologically', 'sub' => 'Tested'],
            ['icon' => 'bi-gem',          'title' => 'Luxury',       'sub' => 'Packaging'],
            ['icon' => 'bi-gift',         'title' => 'Exclusive',    'sub' => 'Collection'],
        ],
        'featured_product_id' => 6,
    ],

    'services' => [
        ['icon' => 'bi-truck',         'title' => 'Pengiriman Cepat',    'sub' => 'Seluruh Indonesia'],
        ['icon' => 'bi-wallet2',       'title' => 'Pembayaran Aman',     'sub' => 'Berbagai Metode'],
        ['icon' => 'bi-shield-check',  'title' => 'Produk Original',     'sub' => '100% Terjamin'],
        ['icon' => 'bi-headset',       'title' => 'Layanan Pelanggan',   'sub' => '08.00 - 22.00 WIB'],
    ],

    'promos' => [
        ['title' => 'Special Offer',   'line' => 'Diskon hingga 50%',         'sub' => 'Untuk produk pilihan',        'cta' => 'Belanja Sekarang', 'route' => 'shop',    'image' => 'banner-offer.jpg'],
        ['title' => 'New Collection',  'line' => 'Skincare Routine',          'sub' => 'Raih kulit sehat & bercahaya', 'cta' => 'Lihat Koleksi',    'route' => 'catalog', 'image' => 'banner-collection.jpg'],
        ['title' => 'Member Benefit',  'line' => 'Dapatkan poin & promo eksklusif', 'sub' => 'untuk setiap pembelian', 'cta' => 'Gabung Sekarang',  'route' => 'inquiry', 'image' => 'banner-member.jpg', 'query' => ['topic' => 'member']],
    ],

    'inquiry_topics' => [
        'produk' => 'Pertanyaan produk',
        'stok' => 'Cek stok & ketersediaan',
        'harga' => 'Harga & promo',
        'reseller' => 'Reseller / dropship',
        'member' => 'Keanggotaan member',
        'pengiriman' => 'Pengiriman',
        'retur' => 'Retur & refund',
    ],

    // Jawaban cepat AI Product FAQ (frontend). keywords dicocokkan ke pertanyaan.
    'faq' => [
        ['q' => 'Rekomendasi produk untuk kulit sensitif?', 'keywords' => ['sensitif', 'sensitive', 'iritasi'],
            'a' => 'Untuk kulit sensitif, mulai dari Hydrating Moisturizer dan Sunscreen SPF 50 kami. Keduanya ringan dan bebas pewangi tambahan. Lakukan patch test 24 jam sebelum pemakaian rutin.'],
        ['q' => 'Cara pakai serum yang benar?', 'keywords' => ['serum', 'cara pakai', 'pakai'],
            'a' => 'Setelah toner, teteskan 2-3 tetes serum ke wajah bersih, tepuk lembut hingga meresap, lalu lanjutkan pelembap. Pagi hari wajib ditutup dengan sunscreen.'],
        ['q' => 'Kapan hasil skincare mulai terlihat?', 'keywords' => ['hasil', 'kapan', 'terlihat', 'minggu'],
            'a' => 'Hidrasi biasanya terasa dalam 1-2 minggu. Perubahan tone dan kecerahan terlihat sekitar 4-8 minggu pemakaian rutin pagi dan malam.'],
        ['q' => 'Apakah produk ini aman untuk ibu hamil?', 'keywords' => ['hamil', 'busui', 'menyusui'],
            'a' => 'Sebagian besar produk kami tidak mengandung retinol, tetapi kami tetap menyarankan berkonsultasi dengan dokter sebelum memakai produk baru selama kehamilan atau menyusui.'],
    ],
];

// Nilai turunan (status stok, diskon, harga terformat) dihitung sekali di sini
// supaya view tetap sederhana dan hasilnya konsisten di semua halaman.
$low = $config['low_stock'];
$cats = array_column($config['categories'], 'name', 'slug');
$config['products'] = array_map(function (array $p) use ($low, $cats) {
    $p['slug'] = Str::slug($p['name']);
    $p['category_name'] = $cats[$p['category']] ?? ucfirst($p['category']);
    $p['badge_class'] = $p['badge'] ? Str::slug($p['badge']) : '';
    $p['stock_pct'] = (int) min(100, round(max(0, $p['stock']) / 60 * 100));
    $p['discount'] = $p['old_price'] > $p['price'] ? (int) round((1 - $p['price'] / $p['old_price']) * 100) : 0;
    $p['price_fmt'] = 'Rp '.number_format($p['price'], 0, ',', '.');
    $p['old_fmt'] = 'Rp '.number_format($p['old_price'], 0, ',', '.');
    if ($p['stock'] <= 0) {
        $p['status'] = 'out';
        $p['status_label'] = 'Stok Habis';
    } elseif ($p['stock'] <= $low) {
        $p['status'] = 'low';
        $p['status_label'] = 'Stok Menipis';
    } else {
        $p['status'] = 'in';
        $p['status_label'] = 'Stok Tersedia';
    }

    return $p;
}, $config['products']);

return $config;
