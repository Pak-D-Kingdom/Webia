<?php

/*
|--------------------------------------------------------------------------
| Template · Property · Luxury · Real Estate Agency (Emerald Green)
|--------------------------------------------------------------------------
| Akses : config('template.property.luxury.real-estate-agency-emerald-green.real-estate-agency')
|
| Semua konten halaman (teks, menu, spesifikasi, FAQ AI, dsb.) ada di file ini.
| Tim backend cukup mengganti isinya dengan data dari database/controller
| tanpa menyentuh Blade. Nama file gambar relatif terhadap folder 'images'.
*/

$site = [
    'name'    => 'GreenHaven',
    'tagline' => 'Premium Real Estate',
    'address' => 'Jl. Melati No. 12, Jakarta Selatan',
    'email'   => 'hello@greenhaven.co.id',
    'phone'   => '+62 812 3456 7890',
    'hours'   => 'Mon - Sun 09:00 - 18:00',
    'social'  => [
        ['icon' => 'instagram', 'label' => 'Instagram', 'url' => '#'],
        ['icon' => 'facebook',  'label' => 'Facebook',  'url' => '#'],
        ['icon' => 'youtube',   'label' => 'YouTube',   'url' => '#'],
        ['icon' => 'linkedin',  'label' => 'LinkedIn',  'url' => '#'],
    ],
];

$property = [
    'badge'      => 'Premium Property',
    'title'      => 'Modern Luxury Villa with Breathtaking View',
    'place'      => 'Bukit Indah Residence, Bali',
    'place_name' => 'Bukit Indah Residence',
    'place_city' => 'Bali',
    'address'    => 'Jl. Bukit Indah No. 28, Jimbaran, Kuta Selatan, Bali',
    'price_cur'  => 'IDR',
    'price'      => '12.500.000.000',
    'price_note' => '(Negotiable)',
    'highlights' => [
        ['icon' => 'bed',  'label' => '4 Bedrooms'],
        ['icon' => 'bath', 'label' => '4 Bathrooms'],
        ['icon' => 'car',  'label' => '2 Carport'],
        ['icon' => 'land', 'label' => '450 m² Land'],
    ],
    // Slider hero (counter "01 / 04" dihitung otomatis dari jumlah slide)
    'slides' => [
        ['file' => 'hero-villa.jpg',     'alt' => 'Modern luxury villa with swimming pool at sunset'],
        ['file' => 'gallery-1.jpg',      'alt' => 'Villa exterior with infinity pool and tropical garden'],
        ['file' => 'booking-living.jpg', 'alt' => 'Open-plan living room facing the garden'],
        ['file' => 'gallery-4.jpg',      'alt' => 'Pool area with sea view'],
    ],
    // Foto pertama = foto utama, sisanya thumbnail
    'gallery' => [
        ['file' => 'gallery-1.jpg', 'alt' => 'Villa exterior with swimming pool at dusk'],
        ['file' => 'gallery-2.jpg', 'alt' => 'Living room with natural light'],
        ['file' => 'gallery-3.jpg', 'alt' => 'Master bedroom'],
        ['file' => 'gallery-4.jpg', 'alt' => 'Pool and garden with sea view'],
        ['file' => 'gallery-5.jpg', 'alt' => 'Sunset view over the coast'],
    ],
    'more_photos' => 12,
    'specs' => [
        ['icon' => 'home',     'label' => 'Property Type', 'value' => 'Villa'],
        ['icon' => 'land',     'label' => 'Land Area',     'value' => '450 m²'],
        ['icon' => 'building', 'label' => 'Building Area', 'value' => '320 m²'],
        ['icon' => 'bed',      'label' => 'Bedrooms',      'value' => '4'],
        ['icon' => 'bath',     'label' => 'Bathrooms',     'value' => '4'],
        ['icon' => 'car',      'label' => 'Carport',       'value' => '2 Cars'],
        ['icon' => 'file',     'label' => 'Certificate',   'value' => 'SHM (Sertifikat Hak Milik)'],
        ['icon' => 'calendar', 'label' => 'Year Built',    'value' => '2022'],
    ],
    'map_image' => 'map-bali.jpg',
    'maps_url'  => 'https://www.google.com/maps/search/?api=1&query='
        . urlencode('Bukit Indah Residence Jl. Bukit Indah No. 28, Jimbaran, Kuta Selatan, Bali'),
];

return [

    // Lokasi aset publik (relatif terhadap public/, dipakai dengan asset())
    'paths' => [
        'css'    => 'css/website-bisnis/template/property/luxury/real-estate-agency-emerald-green/real-estate-agency.css',
        'js'     => 'js/website-bisnis/template/property/luxury/real-estate-agency-emerald-green/real-estate-agency.js',
        'images' => 'images/website-bisnis/template/property/luxury/real-estate-agency-emerald-green',
    ],

    'site' => $site,

    'nav' => [
        ['label' => 'Home',     'href' => '#top'],
        ['label' => 'Property', 'href' => '#property', 'active' => true],
        ['label' => 'About Us', 'href' => '#features'],
        ['label' => 'Gallery',  'href' => '#gallery'],
        ['label' => 'Location', 'href' => '#location'],
        ['label' => 'Blog',     'href' => '#'],          // halaman blog: diisi backend
        ['label' => 'Contact',  'href' => '#inquiry'],
    ],

    'property' => $property,

    'features' => [
        ['icon' => 'pin',      'title' => 'Prime Location',      'text' => 'Strategic and exclusive area'],
        ['icon' => 'building', 'title' => 'Modern Design',       'text' => 'Elegant and functional architecture'],
        ['icon' => 'box',      'title' => 'Complete Facilities', 'text' => 'For your comfort and lifestyle'],
        ['icon' => 'shield',   'title' => 'Secure Investment',   'text' => 'High value and great potential'],
    ],

    // Jam kunjungan: 09:00 - 17:30, tiap 30 menit
    'time_slots' => array_map(
        fn (int $m): string => sprintf('%02d:%02d', intdiv($m, 60), $m % 60),
        range(9 * 60, 17 * 60 + 30, 30)
    ),

    // AI Property Assistant (FAQ statis; ganti dengan endpoint AI bila backend siap)
    'assistant' => [
        'greeting' => 'Siap membantu Anda menemukan properti impian!',
        'fallback' => 'Maaf, saya belum menemukan jawaban yang tepat. Silakan kirim pertanyaan lewat form "Inquire Now" atau hubungi tim kami di ' . $site['phone'] . '.',
        'faq' => [
            ['q' => 'Properti ini masih tersedia?', 'chip' => true,
             'keys' => ['tersedia', 'available', 'ready', 'dijual', 'masih', 'terjual'],
             'a' => 'Ya, villa ini masih tersedia. Kirim pesan lewat form "Inquire Now" atau jadwalkan kunjungan agar tim kami memastikan ketersediaan terbaru.'],
            ['q' => 'Apa saja fasilitas yang tersedia?', 'chip' => true,
             'keys' => ['fasilitas', 'facilities', 'kolam', 'pool', 'taman', 'garden', 'furnish'],
             'a' => 'Villa ini memiliki 4 kamar tidur, 4 kamar mandi, carport untuk 2 mobil, kolam renang, taman tropis, serta area living terbuka dengan pemandangan.'],
            ['q' => 'Bagaimana cara booking/viewing?', 'chip' => true,
             'keys' => ['booking', 'viewing', 'kunjungan', 'survei', 'survey', 'jadwal', 'lihat', 'datang', 'cara'],
             'a' => 'Pilih tanggal dan jam pada bagian "Schedule a Private Viewing", lalu klik "Book a Viewing". Jam kunjungan: Senin - Minggu, 09:00 - 18:00.'],
            ['q' => 'Berapa harga terendah di area ini?', 'chip' => true,
             'keys' => ['harga', 'price', 'nego', 'negotiable', 'berapa', 'murah', 'terendah', 'cicilan', 'kpr'],
             'a' => 'Harga villa ini ' . $property['price_cur'] . ' ' . $property['price'] . ' ' . $property['price_note'] . '. Untuk perbandingan properti lain di area Jimbaran, silakan hubungi tim kami di ' . $site['phone'] . '.'],
            ['q' => 'Di mana lokasinya?',
             'keys' => ['lokasi', 'location', 'alamat', 'address', 'dimana', 'map', 'peta', 'jimbaran', 'bali'],
             'a' => 'Villa berada di ' . $property['address'] . '. Gunakan tombol "Open in Google Maps" pada bagian lokasi untuk petunjuk arah.'],
            ['q' => 'Berapa luas tanah dan bangunan?',
             'keys' => ['luas', 'tanah', 'bangunan', 'kamar', 'land', 'building', 'bedroom', 'bathroom', 'spesifikasi'],
             'a' => 'Luas tanah 450 m² dan luas bangunan 320 m², dengan 4 kamar tidur, 4 kamar mandi, dan carport 2 mobil. Dibangun tahun 2022.'],
            ['q' => 'Apa jenis sertifikatnya?',
             'keys' => ['sertifikat', 'shm', 'certificate', 'legal', 'surat', 'hak milik'],
             'a' => 'Properti ini memiliki sertifikat SHM (Sertifikat Hak Milik).'],
            ['q' => 'Bagaimana cara menghubungi tim?',
             'keys' => ['hubungi', 'kontak', 'contact', 'telepon', 'telp', 'whatsapp', 'wa', 'email', 'jam', 'buka'],
             'a' => 'Anda bisa menghubungi kami di ' . $site['phone'] . ' atau ' . $site['email'] . ', setiap hari pukul 09:00 - 18:00.'],
        ],
    ],
];
