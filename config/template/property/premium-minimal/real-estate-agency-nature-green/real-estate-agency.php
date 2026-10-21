<?php

/*
|--------------------------------------------------------------------------
| GreenEstate — Premium Minimal · Nature Green
|--------------------------------------------------------------------------
| Seluruh konten & path aset template ada di sini. View hanya membaca data,
| sehingga tim backend cukup mengganti sumber datanya (DB/API) nanti.
*/
$address = 'Jl. Melati No. 12, Bandung, Jawa Barat';
$base    = 'website-bisnis/template/property/premium-minimal/real-estate-agency-nature-green';

// Peta tertanam (tanpa API key) & tautan Google Maps dari sebuah alamat
$embed = fn (string $a) => 'https://maps.google.com/maps?q=' . rawurlencode($a) . '&hl=id&z=15&output=embed';
$photo = fn (string $file, string $alt) => ['image' => $file, 'alt' => $alt];

// Data contoh — ganti dengan data asli. Beranda menampilkan 3 properti pertama.
$properties = array_map(fn (array $p) => $p + ['maps_embed' => $embed($p['address'])], [
    [
        'slug' => 'emerald-residence', 'name' => 'The Emerald Residence', 'city' => 'Bandung, Jawa Barat',
        'address' => 'Jl. Zamrud No. 5, Bandung, Jawa Barat', 'image' => 'property-1.jpg',
        'beds' => 3, 'baths' => 2, 'carport' => 2, 'land' => 180, 'building' => 150,
        'certificate' => 'SHM', 'year' => 2022, 'power' => '2200 VA',
        'price' => 'Rp 2.850.000.000', 'price_old' => null, 'discount' => null,
        'gallery' => [$photo('property-1.jpg', 'Tampak depan The Emerald Residence'), $photo('gallery-1.jpg', 'Ruang keluarga'), $photo('gallery-2.jpg', 'Kolam renang'), $photo('gallery-3.jpg', 'Kamar tidur'), $photo('gallery-4.jpg', 'Taman dan fasad rumah')],
    ],
    [
        'slug' => 'green-valley-house', 'name' => 'Green Valley House', 'city' => 'Lembang, Jawa Barat',
        'address' => 'Jl. Raya Lembang No. 21, Lembang, Jawa Barat', 'image' => 'property-2.jpg',
        'beds' => 4, 'baths' => 3, 'carport' => 2, 'land' => 220, 'building' => 190,
        'certificate' => 'SHM', 'year' => 2023, 'power' => '3500 VA',
        'price' => 'Rp 3.250.000.000', 'price_old' => null, 'discount' => null,
        'gallery' => [$photo('property-2.jpg', 'Tampak depan Green Valley House'), $photo('gallery-5.jpg', 'Area dapur dan makan'), $photo('gallery-1.jpg', 'Ruang keluarga'), $photo('gallery-4.jpg', 'Taman dan fasad rumah'), $photo('gallery-3.jpg', 'Kamar tidur')],
    ],
    [
        'slug' => 'sunrise-villa', 'name' => 'Sunrise Villa', 'city' => 'Cimahi, Jawa Barat',
        'address' => 'Jl. Cihanjuang No. 18, Cimahi, Jawa Barat', 'image' => 'property-3.jpg',
        'beds' => 3, 'baths' => 2, 'carport' => 2, 'land' => 160, 'building' => 130,
        'certificate' => 'SHM', 'year' => 2022, 'power' => '2200 VA',
        'price' => 'Rp 2.450.000.000', 'price_old' => 'Rp 2.850.000.000', 'discount' => '14% OFF',
        'gallery' => [$photo('property-3.jpg', 'Tampak depan Sunrise Villa'), $photo('gallery-2.jpg', 'Kolam renang'), $photo('gallery-6.jpg', 'Sudut ruang keluarga'), $photo('gallery-3.jpg', 'Kamar tidur'), $photo('gallery-1.jpg', 'Ruang keluarga')],
    ],
    [
        'slug' => 'maple-terrace', 'name' => 'Maple Terrace', 'city' => 'Dago, Jawa Barat',
        'address' => 'Jl. Dago Asri No. 7, Bandung, Jawa Barat', 'image' => 'property-4.jpg',
        'beds' => 3, 'baths' => 2, 'carport' => 1, 'land' => 150, 'building' => 120,
        'certificate' => 'HGB', 'year' => 2021, 'power' => '2200 VA',
        'price' => 'Rp 2.150.000.000', 'price_old' => null, 'discount' => null,
        'gallery' => [$photo('property-4.jpg', 'Tampak depan Maple Terrace'), $photo('gallery-6.jpg', 'Sudut ruang keluarga'), $photo('gallery-5.jpg', 'Area dapur dan makan'), $photo('gallery-4.jpg', 'Taman dan fasad rumah'), $photo('gallery-3.jpg', 'Kamar tidur')],
    ],
    [
        'slug' => 'cedar-lodge', 'name' => 'Cedar Lodge', 'city' => 'Pangalengan, Jawa Barat',
        'address' => 'Jl. Raya Pangalengan No. 40, Bandung, Jawa Barat', 'image' => 'property-5.jpg',
        'beds' => 4, 'baths' => 3, 'carport' => 2, 'land' => 260, 'building' => 200,
        'certificate' => 'SHM', 'year' => 2023, 'power' => '4400 VA',
        'price' => 'Rp 3.600.000.000', 'price_old' => null, 'discount' => null,
        'gallery' => [$photo('property-5.jpg', 'Tampak depan Cedar Lodge'), $photo('gallery-1.jpg', 'Ruang keluarga'), $photo('gallery-2.jpg', 'Kolam renang'), $photo('gallery-5.jpg', 'Area dapur dan makan'), $photo('gallery-4.jpg', 'Taman dan fasad rumah')],
    ],
]);

return [
    'assets' => [
        'css'    => "css/{$base}/real-estate-agency.css",
        'js'     => "js/{$base}/real-estate-agency.js",
        'images' => "images/{$base}",
    ],

    'meta' => [
        'title'       => 'GreenEstate — Modern Home in Harmony with Nature',
        'description' => 'Hunian modern dengan desain elegan, lingkungan asri, dan lokasi strategis.',
    ],

    'brand' => ['name' => 'GreenEstate', 'tagline' => 'Better Home, Brighter Future'],

    'contact' => [
        'address'       => $address,
        'email'         => 'hello@greenestate.id',
        'hours'         => 'Mon - Sun 08.00 - 18.00',
        'phone'         => '+62 812 3456 7890',
        'phone_tel'     => '+6281234567890',
        'whatsapp'      => '6281234567890',
        'whatsapp_text' => 'Halo GreenEstate, saya tertarik dengan properti Anda.',
        'maps_embed'    => $embed($address),
        'maps_url'      => 'https://www.google.com/maps/search/?api=1&query=' . rawurlencode($address),
    ],

    'socials' => [
        ['label' => 'Instagram', 'icon' => 'instagram', 'url' => '#'],
        ['label' => 'Facebook',  'icon' => 'facebook',  'url' => '#'],
        ['label' => 'YouTube',   'icon' => 'youtube',   'url' => '#'],
    ],

    // Gambar header tiap halaman (kunci = nama halaman aktif), banner CTA, & kartu booking beranda
    'banner'        => 'banner.jpg',
    'booking_image' => 'booking.jpg',
    'page_images'   => [
        'properties' => 'page-properties.jpg',
        'about'      => 'page-about.jpg',
        'gallery'    => 'page-gallery.jpg',
        'booking'    => 'page-booking.jpg',
        'blog'       => 'page-blog.jpg',
        'contact'    => 'page-contact.jpg',
    ],

    'hero' => [
        'desc'   => 'Hunian modern dengan desain elegan, lingkungan asri, dan lokasi strategis. Pilihan sempurna untuk keluarga yang menginginkan kenyamanan dan kualitas hidup yang lebih baik.',
        'script' => "Your Dream Home\nAwaits",
        'slides' => [
            ['image' => 'hero-1.jpg', 'property' => 'emerald-residence',  'title' => "Modern Home\nin Harmony with Nature"],
            ['image' => 'hero-2.jpg', 'property' => 'green-valley-house', 'title' => "Green Living\nfor Every Family"],
            ['image' => 'hero-3.jpg', 'property' => 'sunrise-villa',      'title' => "Sunrise Views,\nCalm Every Morning"],
            ['image' => 'hero-4.jpg', 'property' => 'maple-terrace',      'title' => "Warm Spaces\nSurrounded by Green"],
            ['image' => 'hero-5.jpg', 'property' => 'cedar-lodge',        'title' => "A Quiet Retreat\nClose to the City"],
        ],
    ],

    'properties' => $properties,

    'gallery' => [
        'more'  => 12,
        'items' => [
            ['image' => 'gallery-1.jpg', 'alt' => 'Ruang keluarga dengan jendela besar'],
            ['image' => 'gallery-2.jpg', 'alt' => 'Tampak depan rumah dengan kolam renang'],
            ['image' => 'gallery-3.jpg', 'alt' => 'Kamar tidur utama'],
            ['image' => 'gallery-4.jpg', 'alt' => 'Taman dan fasad rumah'],
            ['image' => 'gallery-5.jpg', 'alt' => 'Area dapur dan makan'],
            ['image' => 'gallery-6.jpg', 'alt' => 'Sudut ruang keluarga'],
        ],
    ],

    'price' => [
        'start'    => 'Rp 2.450.000.000',
        'sub'      => 'Investasi terbaik untuk masa depan',
        'benefits' => ['Harga kompetitif', 'Sistem pembayaran fleksibel', 'Bebas biaya administrasi'],
    ],

    'about' => [
        'title'  => 'Tentang GreenEstate',
        'text'   => 'GreenEstate menghadirkan hunian modern yang menyatu dengan alam. Setiap properti kami pilih dengan teliti, mulai dari desain, lingkungan, hingga akses lokasi, agar keluarga Anda tinggal lebih nyaman.',
        'image'  => 'about.jpg',
        'points' => ['Desain elegan dan lingkungan asri', 'Lokasi strategis dengan akses mudah', 'Pendampingan dari viewing hingga serah terima'],
    ],

    'blog' => [
        ['image' => 'blog-1.jpg', 'category' => 'Tips Properti', 'date' => '12 Okt 2026', 'title' => '5 Tips Memilih Rumah yang Asri dan Nyaman',  'excerpt' => 'Mulai dari sirkulasi udara hingga akses jalan, ini hal yang perlu dicek sebelum memutuskan.'],
        ['image' => 'blog-2.jpg', 'category' => 'Panduan',       'date' => '28 Sep 2026', 'title' => 'Mengenal Sertifikat SHM dan Keunggulannya', 'excerpt' => 'Pahami perbedaan jenis sertifikat agar transaksi properti Anda aman dan tenang.'],
        ['image' => 'blog-3.jpg', 'category' => 'Panduan',       'date' => '14 Sep 2026', 'title' => 'Persiapan Sebelum Viewing Properti',        'excerpt' => 'Daftar singkat pertanyaan dan hal yang perlu diperhatikan saat berkunjung ke lokasi.'],
    ],

    // Dipakai AI Property Assistant. `keywords` dicocokkan dengan pertanyaan pengunjung.
    'faq' => [
        ['q' => 'Apakah properti ini masih tersedia?',  'keywords' => ['tersedia', 'ready', 'stok', 'masih'],
         'a' => 'Unit yang tampil di website ini berstatus For Sale. Untuk kepastian ketersediaan terbaru, silakan jadwalkan viewing atau hubungi tim kami.'],
        ['q' => 'Bagaimana cara booking/viewing?',      'keywords' => ['booking', 'viewing', 'jadwal', 'kunjungan', 'survey', 'lihat'],
         'a' => 'Buka halaman detail properti, isi formulir Booking / Viewing, lalu tekan Booking Sekarang. Tim kami akan mengonfirmasi jadwal Anda.'],
        ['q' => 'Apa saja fasilitas yang tersedia?',    'keywords' => ['fasilitas', 'carport', 'garasi', 'kamar', 'listrik', 'taman'],
         'a' => 'Setiap halaman detail properti memuat spesifikasi lengkap: kamar tidur, kamar mandi, carport, luas tanah dan bangunan, sertifikat, tahun dibangun, serta daya listrik.'],
        ['q' => 'Berapa harga dan cara pembayarannya?', 'keywords' => ['harga', 'bayar', 'pembayaran', 'cicil', 'kpr', 'diskon', 'biaya'],
         'a' => 'Harga mulai Rp 2.450.000.000 dengan sistem pembayaran fleksibel dan bebas biaya administrasi. Harga tiap unit ada di halaman detail properti.'],
        ['q' => 'Di mana lokasinya?',                   'keywords' => ['lokasi', 'alamat', 'dimana', 'maps', 'peta'],
         'a' => 'Kantor kami berada di Jl. Melati No. 12, Bandung, Jawa Barat. Peta lengkap ada di halaman Contact dan di setiap halaman detail properti.'],
        ['q' => 'Apa jenis sertifikatnya?',             'keywords' => ['sertifikat', 'shm', 'hgb', 'legal', 'surat'],
         'a' => 'Jenis sertifikat tiap unit tertera pada bagian Spesifikasi di halaman detail properti.'],
    ],
    'faq_fallback' => 'Maaf, saya belum punya jawaban untuk itu. Tim kami siap membantu langsung lewat WhatsApp.',
];
