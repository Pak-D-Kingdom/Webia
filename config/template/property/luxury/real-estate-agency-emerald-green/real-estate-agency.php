<?php

/*
|--------------------------------------------------------------------------
| Template · Property · Luxury · Real Estate Agency (Emerald Green)
|--------------------------------------------------------------------------
| Akses : config('template.property.luxury.real-estate-agency-emerald-green.real-estate-agency')
|
| Semua konten halaman (teks, menu, spesifikasi, listing, blog, FAQ AI, dsb.)
| ada di file ini. Tim backend cukup mengganti isinya dengan data dari
| database/controller tanpa menyentuh Blade.
|
| CATATAN: listing tambahan, artikel blog, teks About Us dan opsi pembayaran
| adalah DATA CONTOH (dummy). Ganti sesuai data klien.
| Nama file gambar relatif terhadap folder 'images'.
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

$highlights = [
    ['icon' => 'bed',  'label' => '4 Bedrooms'],
    ['icon' => 'bath', 'label' => '4 Bathrooms'],
    ['icon' => 'car',  'label' => '2 Carport'],
    ['icon' => 'land', 'label' => '450 m² Land'],
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
    'highlights' => $highlights,
    // Slider hero (counter "01 / 04" dihitung otomatis dari jumlah slide)
    'slides' => [
        ['file' => 'hero-villa.jpg',     'alt' => 'Modern luxury villa with swimming pool at sunset'],
        ['file' => 'gallery-1.jpg',      'alt' => 'Villa exterior with infinity pool and tropical garden'],
        ['file' => 'booking-living.jpg', 'alt' => 'Open-plan living room facing the garden'],
        ['file' => 'gallery-4.jpg',      'alt' => 'Pool area with sea view'],
    ],
    // Foto pertama = foto utama (besar), sisanya thumbnail
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
    'facilities' => [
        ['icon' => 'bed',   'label' => '4 Bedrooms'],
        ['icon' => 'bath',  'label' => '4 Bathrooms'],
        ['icon' => 'car',   'label' => '2-Car Carport'],
        ['icon' => 'waves', 'label' => 'Swimming Pool'],
        ['icon' => 'leaf',  'label' => 'Tropical Garden'],
        ['icon' => 'sofa',  'label' => 'Open-Plan Living Area'],
        ['icon' => 'sun',   'label' => 'Panoramic Sunset View'],
        ['icon' => 'shield', 'label' => 'SHM Certificate'],
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

    // Navigasi navbar (atas). Item dengan 'children' tampil sebagai dropdown.
    // 'page' = nama route (tanpa prefix), 'hash' = anchor di halaman tsb, 'key' = penanda menu aktif.
    'nav' => [
        ['label' => 'Home', 'page' => 'index', 'hash' => '#top', 'key' => 'index'],
        ['label' => 'Property', 'key' => 'menu-property', 'children' => [
            ['label' => 'Property Listing', 'page' => 'property',      'hash' => '', 'key' => 'property'],
            ['label' => 'Specification',    'page' => 'specification', 'hash' => '', 'key' => 'specification'],
            ['label' => 'Price',            'page' => 'price',         'hash' => '', 'key' => 'price'],
        ]],
        ['label' => 'Explore', 'key' => 'menu-explore', 'children' => [
            ['label' => 'About Us',          'page' => 'about',   'hash' => '', 'key' => 'about'],
            ['label' => 'Gallery',           'page' => 'gallery', 'hash' => '', 'key' => 'gallery'],
            ['label' => 'Booking / Viewing', 'page' => 'booking', 'hash' => '', 'key' => 'booking'],
            ['label' => 'Blog',              'page' => 'blog',    'hash' => '', 'key' => 'blog'],
        ]],
        ['label' => 'Location', 'page' => 'index', 'hash' => '#location', 'key' => 'location'],
        ['label' => 'Contact',  'page' => 'index', 'hash' => '#inquiry',  'key' => 'contact'],
    ],

    // Navigasi footer (lengkap, agar semua halaman tetap mudah dijangkau)
    'footer_nav' => [
        ['label' => 'Home',     'page' => 'index',    'hash' => '#top'],
        ['label' => 'Property', 'page' => 'property', 'hash' => ''],
        ['label' => 'About Us', 'page' => 'about',    'hash' => ''],
        ['label' => 'Gallery',  'page' => 'gallery',  'hash' => ''],
        ['label' => 'Location', 'page' => 'index',    'hash' => '#location'],
        ['label' => 'Blog',     'page' => 'blog',     'hash' => ''],
        ['label' => 'Contact',  'page' => 'index',    'hash' => '#inquiry'],
    ],

    // Pencarian cepat di navbar: kata kunci => halaman tujuan
    'search' => [
        ['words' => ['property', 'villa', 'listing', 'home', 'properti'],                                         'page' => 'property',      'hash' => ''],
        ['words' => ['spec', 'specification', 'detail', 'bedroom', 'bathroom', 'land', 'building', 'certificate', 'shm', 'year', 'spesifikasi'], 'page' => 'specification', 'hash' => ''],
        ['words' => ['price', 'harga', 'cost', 'negotiable', 'payment'],                                          'page' => 'price',         'hash' => ''],
        ['words' => ['about', 'company', 'tentang'],                                                              'page' => 'about',         'hash' => ''],
        ['words' => ['gallery', 'photo', 'photos', 'image', 'foto', 'galeri'],                                    'page' => 'gallery',       'hash' => ''],
        ['words' => ['booking', 'viewing', 'schedule', 'visit', 'jadwal', 'kunjungan'],                           'page' => 'booking',       'hash' => ''],
        ['words' => ['blog', 'article', 'news', 'artikel'],                                                       'page' => 'blog',          'hash' => ''],
        ['words' => ['location', 'map', 'address', 'lokasi', 'alamat', 'peta'],                                   'page' => 'index',         'hash' => '#location'],
        ['words' => ['inquiry', 'inquire', 'contact', 'message', 'kontak', 'pesan'],                              'page' => 'index',         'hash' => '#inquiry'],
    ],

    // Judul & subjudul tiap halaman (dipakai juga untuk heading preview di beranda)
    'pages' => [
        'property'      => ['label' => 'Property',      'title' => 'Property Listing',       'subtitle' => 'Discover our curated collection of luxury villas and residences.'],
        'specification' => ['label' => 'Specification', 'title' => 'Property Specification', 'subtitle' => 'Modern design, premium location, and complete facilities.'],
        'price'         => ['label' => 'Price',         'title' => 'Price',                  'subtitle' => 'Transparent pricing with flexible ways to own.'],
        'about'         => ['label' => 'About Us',      'title' => 'About Us',               'subtitle' => 'The people and principles behind every GreenHaven property.'],
        'gallery'       => ['label' => 'Gallery',       'title' => 'Property Gallery',       'subtitle' => 'Explore the beauty and elegance of this property'],
        'booking'       => ['label' => 'Booking',       'title' => 'Schedule a Private Viewing', 'subtitle' => 'See the property in person and experience its true beauty.'],
        'blog'          => ['label' => 'Blog',          'title' => 'Blog & Insights',        'subtitle' => 'Guides, market notes and inspiration for modern property owners.'],
    ],

    'property' => $property,

    // Listing properti. Item pertama = properti utama. Sisanya DATA CONTOH.
    'listings' => [
        ['file' => 'gallery-1.jpg', 'alt' => 'Modern luxury villa with swimming pool', 'badge' => 'Featured',
         'place' => 'Bukit Indah Residence, Bali', 'title' => 'Modern Luxury Villa with Breathtaking View',
         'price' => '12.500.000.000', 'highlights' => $highlights],
        ['file' => 'gallery-4.jpg', 'alt' => 'Tropical pool villa with sea view', 'badge' => 'New',
         'place' => 'Jimbaran, Bali', 'title' => 'Tropical Pool Villa with Garden View',
         'price' => '8.900.000.000', 'highlights' => [
            ['icon' => 'bed', 'label' => '3 Bedrooms'], ['icon' => 'bath', 'label' => '3 Bathrooms'],
            ['icon' => 'car', 'label' => '1 Carport'],  ['icon' => 'land', 'label' => '320 m² Land']]],
        ['file' => 'gallery-5.jpg', 'alt' => 'Hillside residence at sunset', 'badge' => 'Exclusive',
         'place' => 'Uluwatu, Bali', 'title' => 'Sunset Hillside Residence',
         'price' => '15.750.000.000', 'highlights' => [
            ['icon' => 'bed', 'label' => '5 Bedrooms'], ['icon' => 'bath', 'label' => '5 Bathrooms'],
            ['icon' => 'car', 'label' => '3 Carport'],  ['icon' => 'land', 'label' => '600 m² Land']]],
    ],

    'features' => [
        ['icon' => 'pin',      'title' => 'Prime Location',      'text' => 'Strategic and exclusive area'],
        ['icon' => 'building', 'title' => 'Modern Design',       'text' => 'Elegant and functional architecture'],
        ['icon' => 'box',      'title' => 'Complete Facilities', 'text' => 'For your comfort and lifestyle'],
        ['icon' => 'shield',   'title' => 'Secure Investment',   'text' => 'High value and great potential'],
    ],

    'about' => [
        'eyebrow' => 'About GreenHaven',
        'title'   => 'Where luxury meets lasting value',
        'file'    => 'booking-living.jpg',
        'alt'     => 'Elegant living space designed for comfort',
        'text'    => [
            'GreenHaven is a premium real estate agency dedicated to architecture-led villas and residences in exclusive locations. Every property we represent is selected for its design, its setting and its long-term value.',
            'From the first enquiry to a private viewing and beyond, our team guides you with clarity, discretion and care.',
        ],
    ],

    // Rincian harga (halaman Price). Harga per m² dihitung dari harga ÷ luas.
    'price_info' => [
        'rows' => [
            ['label' => 'Asking Price',            'value' => 'IDR 12.500.000.000'],
            ['label' => 'Price Status',            'value' => 'Negotiable'],
            ['label' => 'Price per m² (Land)',     'value' => '≈ IDR 27.777.778'],
            ['label' => 'Price per m² (Building)', 'value' => '≈ IDR 39.062.500'],
        ],
        'payments' => [
            ['icon' => 'check',    'title' => 'Cash Payment',     'text' => 'Full payment with a smooth and transparent closing process.'],
            ['icon' => 'building', 'title' => 'Bank Mortgage',    'text' => 'Financing through a bank of your choice, subject to bank approval.'],
            ['icon' => 'calendar', 'title' => 'Installment Plan', 'text' => 'Payment schedules can be discussed directly with our team.'],
        ],
    ],

    // Artikel blog: DATA CONTOH
    'blog' => [
        ['file' => 'gallery-3.jpg',      'alt' => 'Bedroom interior', 'tag' => 'Buying Guide', 'date' => '12 Oct 2026', 'read' => '5 min read',
         'title' => '5 Things to Check Before Buying a Villa in Bali',
         'excerpt' => 'From land status to access roads, a simple checklist to review before you commit.'],
        ['file' => 'gallery-5.jpg',      'alt' => 'Sunset coastline', 'tag' => 'Location', 'date' => '03 Oct 2026', 'read' => '4 min read',
         'title' => 'Why Jimbaran Remains a Sought-After Address',
         'excerpt' => 'Sunsets, beaches and easy access: what makes the area appealing for luxury living.'],
        ['file' => 'hero-villa.jpg',     'alt' => 'Villa at sunset', 'tag' => 'Legal', 'date' => '25 Sep 2026', 'read' => '6 min read',
         'title' => 'SHM and HGB: Understanding Property Certificates',
         'excerpt' => 'A short guide to common land certificates and what they mean for buyers.'],
        ['file' => 'gallery-2.jpg',      'alt' => 'Living room', 'tag' => 'Design', 'date' => '14 Sep 2026', 'read' => '4 min read',
         'title' => 'Designing for Tropical Indoor-Outdoor Living',
         'excerpt' => 'Open plans, natural materials and light: ideas that make a villa feel effortless.'],
        ['file' => 'booking-living.jpg', 'alt' => 'Open living room', 'tag' => 'Tips', 'date' => '02 Sep 2026', 'read' => '3 min read',
         'title' => 'How to Prepare for a Private Property Viewing',
         'excerpt' => 'Questions to ask and details to notice when you visit a property in person.'],
        ['file' => 'gallery-4.jpg',      'alt' => 'Pool and garden', 'tag' => 'Investment', 'date' => '20 Aug 2026', 'read' => '5 min read',
         'title' => 'Villa Ownership: What to Know Before You Invest',
         'excerpt' => 'Costs, upkeep and long-term considerations for first-time villa owners.'],
    ],

    'inquiry' => [
        'eyebrow' => 'Get in touch',
        'title'   => 'Inquire Now',
        'text'    => 'Get more information about this property. Our team is ready to assist you.',
    ],

    // Floating WhatsApp (nomor format internasional tanpa + / spasi)
    'whatsapp' => [
        'number'  => '6281234567890',
        'label'   => 'Chat via WhatsApp',
        'message' => 'Halo GreenHaven, saya tertarik dengan ' . $property['title'] . ' di ' . $property['place'] . '.',
    ],

    // Jam kunjungan: 09:00 - 17:30, tiap 30 menit
    'time_slots' => array_map(
        fn (int $m): string => sprintf('%02d:%02d', intdiv($m, 60), $m % 60),
        range(9 * 60, 17 * 60 + 30, 30)
    ),

    // AI Property Assistant (FAQ statis; ganti dengan endpoint AI bila backend siap)
    'assistant' => [
        'greeting' => 'Siap membantu Anda menemukan properti impian!',
        'teaser'   => 'Tanya saya tentang properti ini',
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
             'a' => 'Buka halaman Booking, pilih tanggal dan jam kunjungan, lalu kirim permintaan. Jam kunjungan: Senin - Minggu, 09:00 - 18:00.'],
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
