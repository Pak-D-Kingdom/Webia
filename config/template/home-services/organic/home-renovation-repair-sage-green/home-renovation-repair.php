<?php

/*
|--------------------------------------------------------------------------
| Renovaku — Home Renovation & Repair (Organic · Sage Green)
|--------------------------------------------------------------------------
| Semua konten statis template ada di sini. File ini HARUS berisi array
| murni (tanpa closure) agar aman dipakai bersama `php artisan config:cache`.
|
| Key config otomatis dari Laravel:
| template.home-services.organic.home-renovation-repair-sage-green.home-renovation-repair
*/

return [

    'route_prefix' => 'webia.template.home-services.organic.home-renovation-repair-sage-green.',

    'paths' => [
        'css'    => 'css/website-bisnis/template/home-services/organic/home-renovation-repair-sage-green',
        'js'     => 'js/website-bisnis/template/home-services/organic/home-renovation-repair-sage-green',
        'images' => 'images/website-bisnis/template/home-services/organic/home-renovation-repair-sage-green',
    ],

    'site' => [
        'name'       => 'Renovaku',
        'tagline'    => 'Renovate • Repair • Better Living',
        'address'    => 'Jl. Melati Indah No. 45, Jakarta',
        'phone'      => '+62 21 7890 1234',
        'phone_href' => 'tel:+622178901234',
        'email'      => 'info@renovaku.id',
        // Nomor WhatsApp format internasional tanpa "+" / spasi / strip.
        'whatsapp'   => '62895630300345',
        'hours'      => 'Senin – Sabtu, 08.00 – 17.00 WIB',
        'credit'     => '© 2026 WEBIA by D-KREASI. Seluruh hak cipta dilindungi.',
        'copyright'  => '© 2025 Renovaku. Semua hak dilindungi.',
    ],

    'social' => [
        ['icon' => 'facebook',  'label' => 'Facebook',  'url' => 'https://facebook.com/'],
        ['icon' => 'instagram', 'label' => 'Instagram', 'url' => 'https://instagram.com/'],
        ['icon' => 'youtube',   'label' => 'YouTube',   'url' => 'https://youtube.com/'],
        ['icon' => 'tiktok',    'label' => 'TikTok',    'url' => 'https://tiktok.com/'],
        ['icon' => 'linkedin',  'label' => 'LinkedIn',  'url' => 'https://linkedin.com/'],
    ],

    // Halaman (key = suffix nama route). Dipakai navbar, preview beranda, pencarian & chatbot.
    'pages' => [
        'home'                 => ['title' => 'Beranda',                    'icon' => 'home',     'desc' => 'Renovasi & perbaikan rumah dengan kualitas terbaik.'],
        'layanan'              => ['title' => 'Layanan Renovasi & Perbaikan', 'icon' => 'wrench',   'desc' => 'Renovasi rumah, perbaikan bangunan, desain interior, eksterior & taman, instalasi & finishing.'],
        'paket-layanan'        => ['title' => 'Paket Layanan',              'icon' => 'crown',    'desc' => 'Paket Basic, Premium, dan Exclusive sesuai kebutuhan Anda.'],
        'galeri'               => ['title' => 'Before - After Gallery',     'icon' => 'camera',   'desc' => 'Hasil nyata dari proyek renovasi kami.'],
        'proyek'               => ['title' => 'Proyek Kami',                'icon' => 'folder',   'desc' => 'Proyek renovasi dan perbaikan yang telah kami selesaikan.'],
        'area-layanan'         => ['title' => 'Area Layanan',               'icon' => 'pin',      'desc' => 'Wilayah di Indonesia yang kami layani.'],
        'proses-kerja'         => ['title' => 'Proses Kerja Kami',          'icon' => 'gear',     'desc' => 'Proses mudah, transparan, dan profesional.'],
        'permintaan-penawaran' => ['title' => 'Permintaan Penawaran',       'icon' => 'file',     'desc' => 'Dapatkan penawaran harga terbaik sekarang juga.'],
        'booking-survei'       => ['title' => 'Booking Survei Lokasi',      'icon' => 'calendar', 'desc' => 'Jadwalkan survei langsung ke lokasi rumah Anda.'],
    ],

    'nav' => [
        ['label' => 'Beranda', 'route' => 'home'],
        ['label' => 'Layanan', 'route' => 'layanan', 'children' => [
            ['label' => 'Renovasi Rumah',       'hash' => 'renovasi-rumah',       'icon' => 'home'],
            ['label' => 'Perbaikan Bangunan',   'hash' => 'perbaikan-bangunan',   'icon' => 'wrench'],
            ['label' => 'Desain Interior',      'hash' => 'desain-interior',      'icon' => 'sofa'],
            ['label' => 'Eksterior & Taman',    'hash' => 'eksterior-taman',      'icon' => 'tree'],
            ['label' => 'Instalasi & Finishing', 'hash' => 'instalasi-finishing', 'icon' => 'plug'],
        ]],
        ['label' => 'Paket Layanan', 'route' => 'paket-layanan', 'children' => [
            ['label' => 'Paket Basic',     'hash' => 'basic',   'icon' => 'check'],
            ['label' => 'Paket Premium',   'hash' => 'premium', 'icon' => 'crown'],
            ['label' => 'Paket Exclusive', 'hash' => 'exclusive', 'icon' => 'sparkle'],
        ]],
        ['label' => 'Galeri', 'route' => 'galeri', 'children' => [
            ['label' => 'Before - After',      'hash' => 'before-after', 'icon' => 'camera'],
            ['label' => 'Detail Perbandingan', 'hash' => 'perbandingan', 'icon' => 'layers'],
        ]],
        ['label' => 'Proyek Kami', 'route' => 'proyek', 'children' => [
            ['label' => 'Rumah Tropis Modern',   'hash' => 'proyek-1', 'icon' => 'home'],
            ['label' => 'Rumah Dua Lantai',      'hash' => 'proyek-2', 'icon' => 'home'],
            ['label' => 'Fasad & Taman Cluster', 'hash' => 'proyek-3', 'icon' => 'home'],
        ]],
        ['label' => 'Area Layanan', 'route' => 'area-layanan', 'children' => [
            ['label' => 'Jabodetabek',        'hash' => 'wilayah-0', 'icon' => 'pin'],
            ['label' => 'Pulau Jawa',         'hash' => 'wilayah-1', 'icon' => 'pin'],
            ['label' => 'Sumatra',            'hash' => 'wilayah-4', 'icon' => 'pin'],
            ['label' => 'Kalimantan & Sulawesi', 'hash' => 'wilayah-5', 'icon' => 'pin'],
        ]],
        ['label' => 'Tentang Kami', 'route' => 'proses-kerja', 'children' => [
            ['label' => 'Proses Kerja Kami',    'hash' => 'tahapan',   'icon' => 'gear'],
            ['label' => 'Testimoni Pelanggan',  'route' => 'home', 'hash' => 'testimoni', 'icon' => 'star'],
        ]],
        ['label' => 'Kontak', 'route' => 'permintaan-penawaran'],
    ],

    'services' => [
        [
            'id' => 'renovasi-rumah', 'icon' => 'home', 'title' => 'Renovasi Rumah',
            'short' => 'Renovasi total atau sebagian: dapur, kamar mandi, ruang keluarga, hingga tambah lantai.',
            'points' => ['Pembongkaran & penataan ulang ruang', 'Tambah ruangan atau lantai', 'Renovasi dapur & kamar mandi', 'Pengawasan mandor setiap hari'],
            'duration' => '2 – 12 minggu',
        ],
        [
            'id' => 'perbaikan-bangunan', 'icon' => 'wrench', 'title' => 'Perbaikan Bangunan',
            'short' => 'Perbaikan atap bocor, dinding retak, plafon rusak, lantai, hingga waterproofing.',
            'points' => ['Atap bocor & talang air', 'Dinding retak & rembes', 'Plafon, lantai & keramik', 'Waterproofing area basah'],
            'duration' => '1 – 3 minggu',
        ],
        [
            'id' => 'desain-interior', 'icon' => 'sofa', 'title' => 'Desain Interior',
            'short' => 'Desain ruang yang nyaman dan fungsional, lengkap dengan furnitur custom dan pencahayaan.',
            'points' => ['Konsep & moodboard ruang', 'Furnitur & kitchen set custom', 'Pencahayaan & plafon dekoratif', 'Gambar kerja & visual 3D'],
            'duration' => '3 – 8 minggu',
        ],
        [
            'id' => 'eksterior-taman', 'icon' => 'tree', 'title' => 'Eksterior & Taman',
            'short' => 'Fasad, carport, pagar, kanopi, dan penataan taman yang asri untuk tampilan depan rumah.',
            'points' => ['Fasad & pengecatan eksterior', 'Carport, kanopi & pagar', 'Taman, kolam & lanskap', 'Paving & saluran drainase'],
            'duration' => '2 – 6 minggu',
        ],
        [
            'id' => 'instalasi-finishing', 'icon' => 'plug', 'title' => 'Instalasi & Finishing',
            'short' => 'Instalasi listrik dan pipa, pengecatan, pasang keramik, hingga finishing akhir yang rapi.',
            'points' => ['Instalasi listrik & plumbing', 'Pengecatan & plamir', 'Pemasangan keramik & granit', 'Pembersihan akhir proyek'],
            'duration' => '1 – 4 minggu',
        ],
    ],

    'packages' => [
        [
            'id' => 'basic', 'name' => 'Paket Basic', 'tagline' => 'Perbaikan ringan', 'price' => 'Rp 3.500.000', 'popular' => false,
            'features' => ['Konsultasi', 'Survey Lokasi', 'Estimasi Biaya'],
            'detail' => ['Konsultasi kebutuhan renovasi', 'Survey lokasi & pengukuran', 'Estimasi biaya tertulis', 'Cocok untuk perbaikan ringan dan area kecil'],
        ],
        [
            'id' => 'premium', 'name' => 'Paket Premium', 'tagline' => 'Renovasi standar', 'price' => 'Rp 7.500.000', 'popular' => true,
            'features' => ['Desain Minimalis', 'Material Berkualitas', 'Garansi 1 Tahun'],
            'detail' => ['Semua fasilitas Paket Basic', 'Desain minimalis & gambar kerja', 'Material berkualitas pilihan', 'Garansi pekerjaan 1 tahun'],
        ],
        [
            'id' => 'exclusive', 'name' => 'Paket Exclusive', 'tagline' => 'Renovasi lengkap', 'price' => 'Rp 12.500.000', 'popular' => false,
            'features' => ['Desain Premium', 'Material Terbaik', 'Garansi 2 Tahun'],
            'detail' => ['Semua fasilitas Paket Premium', 'Desain premium & visual 3D', 'Material terbaik pilihan', 'Garansi pekerjaan 2 tahun'],
        ],
    ],

    'compare' => [
        ['Konsultasi kebutuhan',   true,  true,  true],
        ['Survey lokasi',          true,  true,  true],
        ['Estimasi biaya',         true,  true,  true],
        ['Desain minimalis',       false, true,  true],
        ['Desain premium & 3D',    false, false, true],
        ['Material berkualitas',   false, true,  true],
        ['Material terbaik',       false, false, true],
        ['Garansi pekerjaan',      '—',   '1 Tahun', '2 Tahun'],
    ],

    'gallery' => [
        'before' => 'gallery-before.jpg',
        'after'  => 'gallery-after.jpg',
        'notes'  => [
            ['Sebelum', 'Dinding lembap & mengelupas, plafon kusam, pencahayaan minim, dan tata ruang tidak efisien.'],
            ['Sesudah', 'Dinding dicat ulang, plafon dan pencahayaan hangat, jendela besar, serta furnitur yang menyatu dengan ruang.'],
        ],
    ],

    'projects' => [
        ['id' => 'proyek-1', 'image' => 'project-1.jpg', 'title' => 'Rumah Tropis Modern', 'location' => 'Bekasi, Jawa Barat', 'type' => 'Renovasi total', 'area' => '180 m²', 'duration' => '10 minggu', 'package' => 'Paket Exclusive'],
        ['id' => 'proyek-2', 'image' => 'project-2.jpg', 'title' => 'Rumah Dua Lantai', 'location' => 'Tangerang Selatan, Banten', 'type' => 'Renovasi & tambah lantai', 'area' => '150 m²', 'duration' => '8 minggu', 'package' => 'Paket Premium'],
        ['id' => 'proyek-3', 'image' => 'project-3.jpg', 'title' => 'Fasad & Taman Cluster', 'location' => 'Depok, Jawa Barat', 'type' => 'Eksterior & taman', 'area' => '120 m²', 'duration' => '5 minggu', 'package' => 'Paket Premium'],
    ],

    'regions' => [
        ['name' => 'Jabodetabek',            'cities' => 'Jakarta, Bogor, Depok, Tangerang, Bekasi', 'lead' => '3 – 7 hari survei'],
        ['name' => 'Jawa Barat & Banten',    'cities' => 'Bandung, Cirebon, Serang, Sukabumi',        'lead' => '5 – 10 hari survei'],
        ['name' => 'Jawa Tengah & DIY',      'cities' => 'Semarang, Solo, Yogyakarta',                'lead' => '5 – 10 hari survei'],
        ['name' => 'Jawa Timur & Bali',      'cities' => 'Surabaya, Malang, Denpasar',                'lead' => '7 – 12 hari survei'],
        ['name' => 'Sumatra',                'cities' => 'Medan, Padang, Palembang, Lampung',         'lead' => '7 – 14 hari survei'],
        ['name' => 'Kalimantan & Sulawesi',  'cities' => 'Balikpapan, Banjarmasin, Makassar, Manado', 'lead' => '10 – 14 hari survei'],
    ],

    'steps' => [
        ['icon' => 'consult', 'title' => 'Konsultasi Awal',   'text' => 'Ceritakan kebutuhan, anggaran, dan target waktu renovasi Anda kepada tim kami.'],
        ['icon' => 'survey',  'title' => 'Survey Lokasi',     'text' => 'Tim kami datang ke lokasi untuk mengukur, mengecek kondisi bangunan, dan mencatat detail pekerjaan.'],
        ['icon' => 'invoice', 'title' => 'Penawaran Harga',   'text' => 'Anda menerima rincian biaya dan jadwal yang transparan sebelum pekerjaan dimulai.'],
        ['icon' => 'team',    'title' => 'Pelaksanaan Proyek', 'text' => 'Tim tukang dan mandor bekerja sesuai jadwal dengan laporan progres berkala.'],
        ['icon' => 'key',     'title' => 'Serah Terima',      'text' => 'Pemeriksaan akhir bersama Anda, pembersihan area, lalu serah terima beserta garansi.'],
    ],

    'testimonial' => [
        'name' => 'Budi Santoso', 'text' => 'Hasil renovasi sangat memuaskan! Timnya profesional dan tepat waktu.', 'stars' => 5, 'photo' => 'testimonial-budi.jpg',
    ],

    'select' => [
        'services' => ['Renovasi Rumah', 'Perbaikan Bangunan', 'Desain Interior', 'Eksterior & Taman', 'Instalasi & Finishing'],
        'packages' => ['Paket Basic', 'Paket Premium', 'Paket Exclusive', 'Belum tahu — mohon rekomendasi'],
        'budgets'  => ['Di bawah Rp 10 juta', 'Rp 10 – 50 juta', 'Rp 50 – 150 juta', 'Rp 150 – 500 juta', 'Di atas Rp 500 juta'],
        'times'    => ['08.00 – 10.00', '10.00 – 12.00', '13.00 – 15.00', '15.00 – 17.00'],
        'cities'   => ['Jabodetabek', 'Jawa Barat & Banten', 'Jawa Tengah & DIY', 'Jawa Timur & Bali', 'Sumatra', 'Kalimantan & Sulawesi', 'Lainnya'],
    ],

    // Data untuk JavaScript (chatbot, estimasi, pencarian)
    'js' => [
        'estimate' => [
            'renovasi-rumah'     => ['label' => 'Renovasi Rumah',       'min' => 2500000, 'max' => 4500000],
            'perbaikan-bangunan' => ['label' => 'Perbaikan Bangunan',   'min' => 800000,  'max' => 2000000],
            'desain-interior'    => ['label' => 'Desain Interior',      'min' => 1800000, 'max' => 3500000],
            'eksterior-taman'    => ['label' => 'Eksterior & Taman',    'min' => 600000,  'max' => 1800000],
            'instalasi-finishing' => ['label' => 'Instalasi & Finishing', 'min' => 400000, 'max' => 1200000],
        ],
        'faq' => [
            ['id' => 'layanan', 'q' => 'Layanan Renovasi', 'keys' => ['layanan', 'jasa', 'renovasi', 'perbaikan', 'servis', 'interior', 'taman'],
                'a' => 'Kami melayani Renovasi Rumah, Perbaikan Bangunan, Desain Interior, Eksterior & Taman, serta Instalasi & Finishing. Dari perbaikan kecil sampai renovasi total.',
                'link' => 'layanan', 'link_label' => 'Lihat semua layanan'],
            ['id' => 'paket', 'q' => 'Paket Layanan', 'keys' => ['paket', 'basic', 'premium', 'exclusive', 'harga', 'tarif'],
                'a' => 'Ada 3 paket: Basic (Rp 3.500.000, perbaikan ringan), Premium (Rp 7.500.000, renovasi standar, garansi 1 tahun), dan Exclusive (Rp 12.500.000, renovasi lengkap, garansi 2 tahun).',
                'link' => 'paket-layanan', 'link_label' => 'Bandingkan paket'],
            ['id' => 'proyek', 'q' => 'Proyek Sebelumnya', 'keys' => ['proyek', 'portofolio', 'portfolio', 'contoh', 'hasil', 'galeri', 'before', 'after'],
                'a' => 'Anda bisa melihat proyek yang sudah kami selesaikan beserta foto sebelum dan sesudah renovasi.',
                'link' => 'proyek', 'link_label' => 'Lihat proyek kami'],
            ['id' => 'survei', 'q' => 'Survey lokasi', 'keys' => ['survei', 'survey', 'kunjungan', 'datang', 'jadwal'],
                'a' => 'Tim kami datang ke lokasi untuk mengukur dan memeriksa kondisi bangunan. Pilih tanggal dan jam yang sesuai lewat formulir booking survei.',
                'link' => 'booking-survei', 'link_label' => 'Booking survei'],
            ['id' => 'garansi', 'q' => 'Garansi pekerjaan', 'keys' => ['garansi', 'jaminan', 'klaim'],
                'a' => 'Paket Premium bergaransi 1 tahun dan Paket Exclusive 2 tahun untuk hasil pekerjaan. Detail cakupan garansi dijelaskan di penawaran.'],
            ['id' => 'durasi', 'q' => 'Lama pengerjaan', 'keys' => ['durasi', 'lama', 'waktu', 'minggu', 'selesai'],
                'a' => 'Perbaikan ringan biasanya 1–3 minggu. Renovasi standar 4–8 minggu, dan renovasi lengkap 8–12 minggu. Jadwal pasti ditentukan setelah survei.'],
            ['id' => 'bayar', 'q' => 'Cara pembayaran', 'keys' => ['bayar', 'pembayaran', 'dp', 'termin', 'cicil', 'transfer'],
                'a' => 'Pembayaran dilakukan bertahap (termin) sesuai progres pekerjaan, dengan uang muka di awal. Skema lengkap tercantum di penawaran harga.'],
            ['id' => 'area', 'q' => 'Area layanan', 'keys' => ['area', 'wilayah', 'kota', 'jangkauan', 'daerah', 'lokasi'],
                'a' => 'Kami melayani Jabodetabek, Jawa, Sumatra, Bali, Kalimantan, dan Sulawesi. Wilayah lain bisa ditanyakan lewat WhatsApp.',
                'link' => 'area-layanan', 'link_label' => 'Cek area layanan'],
            ['id' => 'penawaran', 'q' => 'Minta penawaran', 'keys' => ['penawaran', 'quotation', 'quote', 'rab', 'minta'],
                'a' => 'Isi formulir permintaan penawaran, lalu tim kami menghubungi Anda untuk membahas kebutuhan dan rincian biaya.',
                'link' => 'permintaan-penawaran', 'link_label' => 'Minta penawaran'],
            ['id' => 'proses', 'q' => 'Proses kerja', 'keys' => ['proses', 'tahap', 'alur', 'cara kerja', 'langkah'],
                'a' => 'Alurnya: Konsultasi Awal → Survey Lokasi → Penawaran Harga → Pelaksanaan Proyek → Serah Terima.',
                'link' => 'proses-kerja', 'link_label' => 'Lihat proses kerja'],
            ['id' => 'syarat', 'q' => 'Syarat & ketentuan', 'keys' => ['syarat', 'ketentuan'],
                'a' => 'Ketentuan layanan (jadwal, termin pembayaran, cakupan garansi) dicantumkan di dokumen penawaran dan disepakati sebelum pekerjaan dimulai.'],
            ['id' => 'privasi', 'q' => 'Kebijakan privasi', 'keys' => ['privasi', 'data pribadi', 'kerahasiaan'],
                'a' => 'Data yang Anda isi di formulir hanya digunakan untuk menanggapi permintaan layanan dan tidak dibagikan ke pihak lain.'],
            ['id' => 'karir', 'q' => 'Lowongan karir', 'keys' => ['karir', 'karier', 'lowongan', 'kerja di'],
                'a' => 'Untuk informasi lowongan, kirim CV ke info@renovaku.id atau hubungi kami lewat WhatsApp.'],
            ['id' => 'kontak', 'q' => 'Kontak & jam operasional', 'keys' => ['kontak', 'hubungi', 'telepon', 'whatsapp', 'wa', 'email', 'jam', 'alamat'],
                'a' => 'Telepon +62 21 7890 1234, email info@renovaku.id, atau WhatsApp. Jam layanan Senin–Sabtu, 08.00–17.00 WIB.'],
        ],
        'quick' => ['layanan', 'paket', 'estimasi', 'proyek', 'lainnya'],
        'more'  => ['garansi', 'durasi', 'bayar', 'area', 'survei'],
    ],
];
