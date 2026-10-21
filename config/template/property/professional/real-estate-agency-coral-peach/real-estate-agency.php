<?php

/*
|--------------------------------------------------------------------------
| Coral Homes — Real Estate Agency (Professional · Coral & Peach)
|--------------------------------------------------------------------------
| Seluruh konten statis template. Backend cukup mengganti isi array ini
| (atau mengambil dari database) tanpa mengubah file Blade.
|
| Key config : template.property.professional.real-estate-agency-coral-peach.real-estate-agency
*/

$img = 'images/website-bisnis/template/property/professional/real-estate-agency-coral-peach';

return [

    'meta' => [
        'title'       => 'Coral Homes — Rumah Modern untuk Kehidupan Lebih Baik',
        'description' => 'Coral Homes: properti residensial premium di Surabaya, Sidoarjo, Malang dan Batu dengan desain modern, fasilitas lengkap, dan lingkungan nyaman.',
    ],

    'brand' => [
        'name'    => 'Coral Homes',
        'upper'   => 'CORAL HOMES',
        'tagline' => 'Your Dream Home, Our Priority',
    ],

    'assets' => [
        'css' => 'css/website-bisnis/template/property/professional/real-estate-agency-coral-peach/real-estate-agency.css',
        'js'  => 'js/website-bisnis/template/property/professional/real-estate-agency-coral-peach/real-estate-agency.js',
        'img' => $img,
    ],

    'contact' => [
        'address'       => 'Jl. Melati No. 15, Surabaya, Jawa Timur',
        'address_line1' => 'Jl. Melati No. 15',
        'address_line2' => 'Surabaya, Jawa Timur',
        'email'         => 'info@coralhomes.id',
        'email_extra'   => 'info@coralhomes.id',
        'hours'         => 'Mon - Sat 09:00 - 18:00',
        'phone'         => '+62 812 3456 7890',
        'phone_link'    => '+6281234567890',
        'whatsapp'      => '6281234567890',
        // Nomor tujuan form Inquiry & Booking (format internasional tanpa +): 0895630300345
        'whatsapp_leads' => '62895630300345',
        'whatsapp_text' => 'Halo Coral Homes, saya tertarik dengan properti Anda dan ingin bertanya lebih lanjut.',
        'maps_url'      => 'https://www.google.com/maps/search/?api=1&query=Jl.+Melati+No.+15+Surabaya+Jawa+Timur',
    ],

    'socials' => [
        ['name' => 'Instagram', 'icon' => 'instagram', 'url' => '#'],
        ['name' => 'Facebook',  'icon' => 'facebook',  'url' => '#'],
        ['name' => 'YouTube',   'icon' => 'youtube',   'url' => '#'],
        ['name' => 'LinkedIn',  'icon' => 'linkedin',  'url' => '#'],
    ],

    // Navbar & footer. "Location" tidak lagi menjadi menu sendiri: lokasi ada di halaman Contact.
    'nav' => [
        ['label' => 'Home',     'route' => 'coral-peach.home',     'hash' => null, 'match' => 'coral-peach.home'],
        ['label' => 'Property', 'route' => 'coral-peach.property', 'hash' => null, 'match' => 'coral-peach.property'],
        ['label' => 'About Us', 'route' => 'coral-peach.about',    'hash' => null, 'match' => 'coral-peach.about'],
        ['label' => 'Gallery',  'route' => 'coral-peach.gallery',  'hash' => null, 'match' => 'coral-peach.gallery'],
        ['label' => 'Contact',  'route' => 'coral-peach.contact',  'hash' => null, 'match' => 'coral-peach.contact'],
    ],

    // Gambar banner pada header setiap halaman dalam (file ada di folder images template).
    'page_images' => [
        'property'      => 'banner-house.jpg',
        'specification' => 'property-5.jpg',
        'price'         => 'property-2.jpg',
        'about'         => 'about-house.jpg',
        'gallery'       => 'gallery-main.jpg',
        'booking'       => 'property-6.jpg',
        'blog'          => 'property-1.jpg',
        'contact'       => 'property-4.jpg',
    ],

    'hero' => [
        'eyebrow' => 'PREMIUM RESIDENTIAL PROPERTY',
        'title_1' => 'Rumah Modern',
        'title_2' => 'untuk Kehidupan Lebih Baik',
        'text'    => 'Dapatkan hunian impian Anda di lokasi strategis dengan desain modern, fasilitas lengkap, dan lingkungan yang nyaman.',
        'image'   => 'hero-house.jpg',
        'features' => [
            ['icon' => 'home',     'title' => '3 Bedrooms',  'sub' => '(3 Kamar Tidur)'],
            ['icon' => 'bath',     'title' => '2 Bathrooms', 'sub' => '(2 Kamar Mandi)'],
            ['icon' => 'car',      'title' => '2 Carport',   'sub' => '(2 Mobil)'],
            ['icon' => 'area',     'title' => '120 m²',      'sub' => 'Luas Tanah'],
        ],
    ],

    // Form pencarian di bawah hero
    'search' => [
        'locations' => [
            ['value' => 'surabaya', 'label' => 'Surabaya'],
            ['value' => 'sidoarjo', 'label' => 'Sidoarjo'],
            ['value' => 'malang',   'label' => 'Malang'],
            ['value' => 'batu',     'label' => 'Batu'],
        ],
        'types' => [
            ['value' => 'residence', 'label' => 'Residence'],
            ['value' => 'villa',     'label' => 'Villa'],
            ['value' => 'house',     'label' => 'House'],
        ],
        'prices' => [
            ['value' => '0-1800000000',           'label' => '< Rp 1,8 Miliar'],
            ['value' => '1800000001-2500000000',  'label' => 'Rp 1,8 – 2,5 Miliar'],
            ['value' => '2500000001-99999999999', 'label' => '> Rp 2,5 Miliar'],
        ],
        'areas' => [
            ['value' => '0-100',   'label' => '≤ 100 m²'],
            ['value' => '101-120', 'label' => '101 – 120 m²'],
            ['value' => '121-999', 'label' => '> 120 m²'],
        ],
    ],

    /*
    | Daftar properti. `land` = luas tanah, `building` = luas bangunan (m²).
    | Empat properti pertama sesuai desain UI.
    */
    'properties' => [
        ['slug' => 'the-grand-residence', 'name' => 'The Grand Residence', 'city' => 'surabaya', 'location' => 'Surabaya, Jawa Timur', 'type' => 'residence', 'status' => 'For Sale', 'beds' => 3, 'baths' => 2, 'land' => 120, 'building' => 100, 'price' => 1850000000, 'image' => 'property-1.jpg'],
        ['slug' => 'central-park-villa',  'name' => 'Central Park Villa',  'city' => 'sidoarjo', 'location' => 'Sidoarjo, Jawa Timur', 'type' => 'villa',     'status' => 'For Sale', 'beds' => 4, 'baths' => 3, 'land' => 150, 'building' => 120, 'price' => 2450000000, 'image' => 'property-2.jpg'],
        ['slug' => 'green-valley-house',  'name' => 'Green Valley House',  'city' => 'malang',   'location' => 'Malang, Jawa Timur',   'type' => 'house',     'status' => 'For Sale', 'beds' => 4, 'baths' => 3, 'land' => 150, 'building' => 120, 'price' => 1650000000, 'image' => 'property-3.jpg'],
        ['slug' => 'sunset-residence',    'name' => 'Sunset Residence',    'city' => 'batu',     'location' => 'Batu, Jawa Timur',     'type' => 'residence', 'status' => 'For Sale', 'beds' => 4, 'baths' => 2, 'land' => 150, 'building' => 130, 'price' => 2990000000, 'image' => 'property-4.jpg'],
        ['slug' => 'skyline-hill-house',  'name' => 'Skyline Hill House',  'city' => 'malang',   'location' => 'Malang, Jawa Timur',   'type' => 'house',     'status' => 'For Sale', 'beds' => 3, 'baths' => 2, 'land' => 130, 'building' => 110, 'price' => 2150000000, 'image' => 'property-5.jpg'],
        ['slug' => 'terrace-view-villa',  'name' => 'Terrace View Villa',  'city' => 'batu',     'location' => 'Batu, Jawa Timur',     'type' => 'villa',     'status' => 'For Sale', 'beds' => 5, 'baths' => 4, 'land' => 200, 'building' => 170, 'price' => 3250000000, 'image' => 'property-6.jpg'],
    ],

    'gallery' => [
        'total_extra' => 13,
        'video'       => null, // isi URL mp4 bila tersedia; null = tampilkan foto pada lightbox
        'items' => [
            ['file' => 'gallery-main.jpg', 'cat' => 'interior',  'alt' => 'Ruang keluarga modern dengan jendela besar'],
            ['file' => 'gallery-2.jpg',    'cat' => 'interior',  'alt' => 'Ruang tamu dengan sofa dan pencahayaan hangat'],
            ['file' => 'gallery-3.jpg',    'cat' => 'interior',  'alt' => 'Sudut ruang tamu dengan dekorasi tanaman'],
            ['file' => 'gallery-4.jpg',    'cat' => 'fasilitas', 'alt' => 'Kolam renang dan area santai'],
            ['file' => 'hero-house.jpg',   'cat' => 'eksterior', 'alt' => 'Tampak depan rumah modern saat senja'],
            ['file' => 'property-1.jpg',   'cat' => 'eksterior', 'alt' => 'The Grand Residence tampak depan'],
            ['file' => 'property-2.jpg',   'cat' => 'eksterior', 'alt' => 'Central Park Villa tampak depan'],
            ['file' => 'property-3.jpg',   'cat' => 'eksterior', 'alt' => 'Green Valley House tampak depan'],
            ['file' => 'property-4.jpg',   'cat' => 'eksterior', 'alt' => 'Sunset Residence tampak depan'],
            ['file' => 'property-5.jpg',   'cat' => 'eksterior', 'alt' => 'Skyline Hill House dengan balkon kaca'],
            ['file' => 'property-6.jpg',   'cat' => 'fasilitas', 'alt' => 'Terrace View Villa dengan teras luas'],
            ['file' => 'about-house.jpg',  'cat' => 'eksterior', 'alt' => 'Fasad rumah dengan taman hijau'],
        ],
        'categories' => [
            ['value' => 'all',       'label' => 'Semua'],
            ['value' => 'eksterior', 'label' => 'Eksterior'],
            ['value' => 'interior',  'label' => 'Interior'],
            ['value' => 'fasilitas', 'label' => 'Fasilitas'],
        ],
    ],

    'price' => [
        'label' => 'Harga Mulai',
        'badge' => 'Terjangkau & Kompetitif',
        'schemes' => [
            ['icon' => 'tag',    'title' => 'Cash Keras',    'text' => 'Harga terbaik dengan potongan khusus untuk pembayaran tunai penuh.'],
            ['icon' => 'layers', 'title' => 'Cash Bertahap', 'text' => 'Cicil langsung ke developer tanpa bank dengan tenor fleksibel.'],
            ['icon' => 'shield', 'title' => 'KPR Bank',      'text' => 'Bekerja sama dengan bank mitra untuk proses KPR yang cepat dan transparan.'],
        ],
    ],

    'specs' => [
        ['icon' => 'land',     'label' => 'Luas Tanah',      'value' => '120 m²'],
        ['icon' => 'car',      'label' => 'Carport',         'value' => '2 Mobil'],
        ['icon' => 'area',     'label' => 'Luas Bangunan',   'value' => '100 m²'],
        ['icon' => 'file',     'label' => 'Sertifikat',      'value' => 'SHM'],
        ['icon' => 'bed',      'label' => 'Kamar Tidur',     'value' => '3'],
        ['icon' => 'calendar', 'label' => 'Tahun Dibangun',  'value' => '2022'],
        ['icon' => 'bath',     'label' => 'Kamar Mandi',     'value' => '2'],
        ['icon' => 'zap',      'label' => 'Listrik',         'value' => '2200 VA'],
    ],

    'spec_groups' => [
        ['title' => 'Fasilitas Perumahan', 'icon' => 'shield', 'items' => ['Keamanan 24 jam & CCTV', 'One gate system', 'Taman & area hijau', 'Jalan lingkungan lebar', 'Area bermain anak', 'Masjid & fasilitas ibadah']],
        ['title' => 'Kelengkapan Rumah',   'icon' => 'home',   'items' => ['Dapur & pantry', 'Carport 2 mobil', 'Balkon / teras', 'Instalasi air bersih PDAM', 'Daya listrik 2200 VA', 'Plafon & lantai granit']],
        ['title' => 'Akses & Sekitar',     'icon' => 'pin',    'items' => ['5 menit ke akses tol', '10 menit ke pusat kota', 'Dekat sekolah & rumah sakit', 'Dekat pusat perbelanjaan', 'Transportasi umum mudah', 'Lingkungan aman & nyaman']],
    ],

    'location' => [
        'title'    => 'Lokasi & Akses',
        'subtitle' => 'Lokasi strategis dengan akses mudah',
        'map'      => 'map.jpg', // gambar cadangan saat peta interaktif belum termuat
        'embed_url' => 'https://www.google.com/maps?q=Jl.+Melati+No.+15,+Surabaya,+Jawa+Timur&output=embed',
        'points'   => ['5 menit ke tol', '10 menit ke pusat kota', 'Dekat dengan sekolah & rumah sakit'],
    ],

    'booking' => [
        'title'    => 'Jadwal Booking / Viewing',
        'subtitle' => 'Pilih tanggal dan waktu kunjungan Anda',
        'home_text' => 'Lihat langsung hunian impian Anda bersama konsultan kami. Cukup satu ketukan, jadwal viewing kami konfirmasi lewat WhatsApp.',
        'wa_text'  => 'Halo Coral Homes, saya ingin booking viewing properti. Mohon info jadwal yang tersedia.',
        'closed_weekdays' => [0], // 0 = Minggu (tutup)
        'slots'    => ['09:00', '10:00', '11:00', '13:00', '14:00', '15:00', '16:00', '17:00'],
        'steps' => [
            ['title' => 'Ajukan Jadwal',      'text' => 'Kirim permintaan viewing Anda lewat WhatsApp.'],
            ['title' => 'Konfirmasi Tim',     'text' => 'Tim kami membalas untuk mengonfirmasi tanggal & waktu.'],
            ['title' => 'Kunjungi Properti',  'text' => 'Lihat langsung unit & lingkungan bersama konsultan.'],
        ],
    ],

    'about' => [
        'title'    => 'Tentang Coral Homes',
        'subtitle' => 'Mitra tepercaya untuk menemukan hunian impian Anda',
        'text'     => [
            'Coral Homes adalah agensi properti residensial yang berfokus pada hunian modern berkualitas di Jawa Timur. Kami memadukan desain kontemporer, lokasi strategis, dan lingkungan yang nyaman agar setiap keluarga dapat tumbuh dengan lebih baik.',
            'Dengan tim konsultan yang berpengalaman, kami mendampingi Anda mulai dari memilih unit, simulasi pembayaran, hingga serah terima kunci — transparan, cepat, dan tanpa ribet.',
        ],
        'image' => 'about-house.jpg',
        'stats' => [
            ['value' => '10+',  'label' => 'Tahun Pengalaman'],
            ['value' => '500+', 'label' => 'Unit Terjual'],
            ['value' => '4',    'label' => 'Kota Lokasi Proyek'],
            ['value' => '98%',  'label' => 'Klien Puas'],
        ],
        'values' => [
            ['icon' => 'shield', 'title' => 'Legalitas Jelas', 'text' => 'Seluruh unit berstatus SHM dengan dokumen lengkap dan transparan.'],
            ['icon' => 'award',  'title' => 'Kualitas Terbaik', 'text' => 'Material pilihan dan pengerjaan rapi oleh kontraktor berpengalaman.'],
            ['icon' => 'users',  'title' => 'Layanan Personal', 'text' => 'Konsultan kami siap mendampingi Anda di setiap tahap pembelian.'],
        ],
    ],

    'blog' => [
        'title'    => 'Blog & Tips Properti',
        'subtitle' => 'Panduan, tips, dan insight seputar membeli hunian impian',
        'categories' => [
            ['value' => 'all',    'label' => 'Semua'],
            ['value' => 'tips',   'label' => 'Tips Membeli'],
            ['value' => 'desain', 'label' => 'Desain & Interior'],
            ['value' => 'invest', 'label' => 'Investasi'],
        ],
        'posts' => [
            ['slug' => 'tips-memilih-rumah-pertama', 'cat' => 'tips', 'cat_label' => 'Tips Membeli', 'date' => '12 Okt 2026', 'read' => '5 menit', 'image' => 'property-1.jpg',
             'title' => '7 Tips Memilih Rumah Pertama agar Tidak Menyesal',
             'excerpt' => 'Mulai dari lokasi, legalitas, hingga akses transportasi — inilah hal penting yang perlu dicek sebelum menandatangani akad.',
             'body' => 'Pastikan Anda memeriksa legalitas (SHM/IMB), jarak ke tempat kerja dan sekolah, kualitas bangunan, serta rencana pengembangan kawasan. Hitung juga cicilan agar tidak melebihi sepertiga penghasilan bulanan.'],
            ['slug' => 'desain-rumah-modern-tropis', 'cat' => 'desain', 'cat_label' => 'Desain & Interior', 'date' => '05 Okt 2026', 'read' => '4 menit', 'image' => 'gallery-main.jpg',
             'title' => 'Desain Rumah Modern Tropis: Terang, Sejuk, dan Hangat',
             'excerpt' => 'Jendela besar, material kayu, dan tanaman hijau membuat hunian terasa lapang tanpa bergantung pada pendingin ruangan.',
             'body' => 'Gunakan ventilasi silang, overhang yang cukup untuk meredam panas, serta perpaduan material alami seperti kayu dan batu. Tambahkan tanaman indoor untuk suasana yang lebih segar.'],
            ['slug' => 'properti-sebagai-investasi', 'cat' => 'invest', 'cat_label' => 'Investasi', 'date' => '28 Sep 2026', 'read' => '6 menit', 'image' => 'property-2.jpg',
             'title' => 'Kenapa Properti Residensial Masih Jadi Investasi Favorit',
             'excerpt' => 'Nilai aset yang cenderung naik dan potensi sewa menjadikan rumah pilihan investasi jangka panjang yang stabil.',
             'body' => 'Pilih kawasan yang berkembang dengan akses infrastruktur baik. Perhatikan potensi kenaikan harga tanah, tingkat hunian sewa, dan biaya perawatan untuk menghitung imbal hasil yang realistis.'],
        ],
    ],

    'faq' => [
        'greeting' => 'Halo! Saya AI Assistant dari Coral Homes. Ada yang bisa saya bantu?',
        'fallback' => 'Maaf, saya belum menemukan jawaban yang pas. Anda bisa menghubungi tim kami langsung melalui WhatsApp untuk bantuan lebih lanjut.',
        'quick'    => [
            ['label' => 'Info properti',     'key' => 'properti'],
            ['label' => 'Harga & promo',     'key' => 'harga'],
            ['label' => 'Jadwal viewing',    'key' => 'viewing'],
            ['label' => 'Proses pembelian',  'key' => 'proses'],
            ['label' => 'Lokasi & akses',    'key' => 'lokasi'],
        ],
        'items' => [
            ['key' => 'properti', 'keywords' => ['properti', 'rumah', 'unit', 'tipe', 'kamar', 'spesifikasi', 'luas', 'sertifikat'],
             'answer' => 'Kami menawarkan hunian modern bertipe 3–5 kamar tidur dengan luas tanah mulai 120 m², sertifikat SHM, listrik 2200 VA, dan carport untuk 2 mobil di Surabaya, Sidoarjo, Malang, dan Batu.'],
            ['key' => 'harga', 'keywords' => ['harga', 'biaya', 'promo', 'diskon', 'dp', 'kpr', 'cicilan', 'bayar', 'cash'],
             'answer' => 'Harga mulai Rp 1.650.000.000. Tersedia skema Cash Keras, Cash Bertahap, dan KPR bank mitra. Hubungi tim kami untuk promo terbaru bulan ini.'],
            ['key' => 'viewing', 'keywords' => ['viewing', 'kunjungan', 'jadwal', 'survey', 'booking', 'lihat', 'datang'],
             'answer' => 'Viewing tersedia Senin–Sabtu pukul 09:00–18:00. Silakan pilih tanggal dan waktu pada form Booking / Viewing, tim kami akan mengonfirmasi jadwal Anda.'],
            ['key' => 'proses', 'keywords' => ['proses', 'beli', 'pembelian', 'akad', 'langkah', 'cara', 'dokumen'],
             'answer' => 'Prosesnya: 1) pilih unit & viewing, 2) booking fee, 3) pilih skema pembayaran, 4) akad & penandatanganan, 5) serah terima kunci. Konsultan kami mendampingi di setiap tahap.'],
            ['key' => 'lokasi', 'keywords' => ['lokasi', 'alamat', 'akses', 'tol', 'dekat', 'maps', 'peta', 'jarak'],
             'answer' => 'Kantor kami di Jl. Melati No. 15, Surabaya, Jawa Timur. Akses tol hanya 5 menit, pusat kota 10 menit, dan dekat sekolah serta rumah sakit.'],
            ['key' => 'jam', 'keywords' => ['jam', 'buka', 'operasional', 'kontak', 'telepon', 'whatsapp', 'wa', 'hubungi'],
             'answer' => 'Jam operasional Senin–Sabtu 09:00–18:00. Hubungi kami di +62 812 3456 7890 atau info@coralhomes.id.'],
        ],
    ],

    'footer' => [
        'about_text' => 'Hunian modern di lokasi strategis untuk kehidupan yang lebih baik.',
        'credit'     => '© 2026 WEBIA by D-KREASI. Seluruh hak cipta dilindungi.',
    ],
];
