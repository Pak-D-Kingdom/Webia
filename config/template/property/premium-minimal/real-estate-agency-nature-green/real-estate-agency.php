<?php

/*
|--------------------------------------------------------------------------
| GreenEstate — Premium Minimal · Nature Green
|--------------------------------------------------------------------------
| Seluruh konten & path aset template ada di sini. View hanya membaca data,
| sehingga tim backend cukup mengganti sumber datanya (DB/API) nanti.
*/
$base = 'website-bisnis/template/property/premium-minimal/real-estate-agency-nature-green';

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
        'address'       => 'Jl. Melati No. 12, Bandung, Jawa Barat',
        'email'         => 'hello@greenestate.id',
        'hours'         => 'Mon - Sun 08.00 - 18.00',
        'phone'         => '+62 812 3456 7890',
        'phone_tel'     => '+6281234567890',
        'whatsapp'      => '6281234567890',
        'whatsapp_text' => 'Halo GreenEstate, saya tertarik dengan properti Anda.',
        'maps_url'      => 'https://www.google.com/maps/search/?api=1&query=Jl.+Melati+No.+12+Bandung',
    ],

    'socials' => [
        ['label' => 'Instagram', 'icon' => 'instagram', 'url' => '#'],
        ['label' => 'Facebook',  'icon' => 'facebook',  'url' => '#'],
        ['label' => 'YouTube',   'icon' => 'youtube',   'url' => '#'],
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

    // Data contoh — ganti dengan data asli. Kartu beranda menampilkan 3 pertama.
    'properties' => [
        ['slug' => 'emerald-residence',  'name' => 'The Emerald Residence', 'city' => 'Bandung, Jawa Barat',   'image' => 'property-1.jpg', 'beds' => 3, 'baths' => 2, 'carport' => 2, 'land' => 180, 'building' => 150, 'price' => 'Rp 2.850.000.000'],
        ['slug' => 'green-valley-house', 'name' => 'Green Valley House',    'city' => 'Lembang, Jawa Barat',   'image' => 'property-2.jpg', 'beds' => 4, 'baths' => 3, 'carport' => 2, 'land' => 220, 'building' => 190, 'price' => 'Rp 3.250.000.000'],
        ['slug' => 'sunrise-villa',      'name' => 'Sunrise Villa',         'city' => 'Cimahi, Jawa Barat',    'image' => 'property-3.jpg', 'beds' => 3, 'baths' => 2, 'carport' => 2, 'land' => 160, 'building' => 130, 'price' => 'Rp 2.450.000.000'],
        ['slug' => 'maple-terrace',      'name' => 'Maple Terrace',         'city' => 'Dago, Jawa Barat',      'image' => 'property-4.jpg', 'beds' => 3, 'baths' => 2, 'carport' => 1, 'land' => 150, 'building' => 120, 'price' => 'Rp 2.150.000.000'],
        ['slug' => 'cedar-lodge',        'name' => 'Cedar Lodge',           'city' => 'Pangalengan, Jawa Barat', 'image' => 'property-5.jpg', 'beds' => 4, 'baths' => 3, 'carport' => 2, 'land' => 260, 'building' => 200, 'price' => 'Rp 3.600.000.000'],
    ],

    'gallery' => [
        'more'  => 12,
        'items' => [
            ['image' => 'gallery-1.jpg', 'alt' => 'Ruang keluarga dengan jendela besar'],
            ['image' => 'gallery-2.jpg', 'alt' => 'Tampak depan rumah dengan kolam renang'],
            ['image' => 'gallery-3.jpg', 'alt' => 'Kamar tidur utama'],
            ['image' => 'gallery-4.jpg', 'alt' => 'Taman dan fasad rumah'],
            ['image' => 'gallery-5.jpg', 'alt' => 'Area makan dan dapur'],
            ['image' => 'gallery-6.jpg', 'alt' => 'Teras dan taman belakang'],
        ],
    ],

    'spec' => [
        ['icon' => 'area',     'label' => 'Luas Tanah',      'value' => '180 m²'],
        ['icon' => 'home',     'label' => 'Luas Bangunan',   'value' => '150 m²'],
        ['icon' => 'bed',      'label' => 'Kamar Tidur',     'value' => '3'],
        ['icon' => 'bath',     'label' => 'Kamar Mandi',     'value' => '2'],
        ['icon' => 'car',      'label' => 'Carport',         'value' => '2 Mobil'],
        ['icon' => 'file',     'label' => 'Sertifikat',      'value' => 'SHM'],
        ['icon' => 'calendar', 'label' => 'Tahun Dibangun',  'value' => '2022'],
        ['icon' => 'bolt',     'label' => 'Listrik',         'value' => '2200 VA'],
    ],

    'price' => [
        'start'    => 'Rp 2.450.000.000',
        'sub'      => 'Investasi terbaik untuk masa depan',
        'now'      => 'Rp 2.450.000.000',
        'old'      => 'Rp 2.850.000.000',
        'discount' => '14% OFF',
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
         'a' => 'Pilih tanggal dan waktu di kartu Booking / Viewing, lalu tekan Booking Sekarang. Tim kami akan mengonfirmasi jadwal Anda.'],
        ['q' => 'Apa saja fasilitas yang tersedia?',    'keywords' => ['fasilitas', 'carport', 'garasi', 'kamar', 'listrik', 'taman'],
         'a' => 'Properti unggulan memiliki 3 kamar tidur, 2 kamar mandi, carport untuk 2 mobil, luas tanah 180 m², luas bangunan 150 m², dan listrik 2200 VA.'],
        ['q' => 'Berapa harga dan cara pembayarannya?', 'keywords' => ['harga', 'bayar', 'pembayaran', 'cicil', 'kpr', 'diskon', 'biaya'],
         'a' => 'Harga mulai Rp 2.450.000.000 (diskon 14% dari Rp 2.850.000.000), dengan sistem pembayaran fleksibel dan bebas biaya administrasi.'],
        ['q' => 'Di mana lokasinya?',                   'keywords' => ['lokasi', 'alamat', 'dimana', 'maps', 'peta'],
         'a' => 'Kantor kami berada di Jl. Melati No. 12, Bandung, Jawa Barat. Buka bagian Lokasi untuk melihat peta dan tautan Google Maps.'],
        ['q' => 'Apa jenis sertifikatnya?',             'keywords' => ['sertifikat', 'shm', 'legal', 'surat'],
         'a' => 'Properti unggulan memiliki sertifikat SHM (Sertifikat Hak Milik).'],
    ],
    'faq_fallback' => 'Maaf, saya belum punya jawaban untuk itu. Tim kami siap membantu langsung lewat WhatsApp.',
];
