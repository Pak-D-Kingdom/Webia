<?php

/*
|--------------------------------------------------------------------------
| Green Harvest — Agribisnis (Corporate · Forest Moss)
|--------------------------------------------------------------------------
| Data statis template. Akses: config('template.agriculture&farming.corporate.agribisnis-forest-moss.agribisnis')
*/

return [
    'site' => [
        'name' => 'Green Harvest',
        'tagline' => 'Agri Business & Commodity Trade',
        'title' => 'Green Harvest — Agri Business & Commodity Trade',
        'description' => 'Green Harvest menghadirkan komoditas pertanian berkualitas tinggi dari petani pilihan, dengan proses yang transparan dan berkelanjutan.',
        'whatsapp' => '62895630300345',
        'phone_raw' => '628112345678',
        'whatsapp_text' => 'Halo Green Harvest, saya ingin bertanya tentang komoditas pertanian.',
        'phone' => '+62 811 2345 6789',
        'email' => 'info@greenharvest.co.id',
        'address' => 'Banyuwangi, Jawa Timur, Indonesia',
        'hours' => 'Senin - Jumat 08.00 - 17:00',
    ],
    'assets' => [
        'css' => 'css/website-bisnis/template/agriculture&farming/corporate/agribisnis-forest-moss/logistics-agribisnis.css',
        'js' => 'js/website-bisnis/template/agriculture&farming/corporate/agribisnis-forest-moss/agribisnis.js',
        'img' => 'images/website-bisnis/template/agriculture&farming/corporate/agribisnis-forest-moss',
    ],
    'img' => [
        'hero' => 'images/website-bisnis/template/agriculture&farming/corporate/agribisnis-forest-moss/hero-bg.jpg',
        'logo' => 'images/website-bisnis/template/agriculture&farming/corporate/agribisnis-forest-moss/logo-mark.svg',
        'logo_white' => 'images/website-bisnis/template/agriculture&farming/corporate/agribisnis-forest-moss/logo-mark-white.svg',
        'favicon' => 'images/website-bisnis/template/agriculture&farming/corporate/agribisnis-forest-moss/favicon.svg',
        'leaf' => 'images/website-bisnis/template/agriculture&farming/corporate/agribisnis-forest-moss/leaf.svg',
        'kopi' => 'images/website-bisnis/template/agriculture&farming/corporate/agribisnis-forest-moss/komoditas-kopi.jpg',
        'sawit' => 'images/website-bisnis/template/agriculture&farming/corporate/agribisnis-forest-moss/komoditas-sawit.jpg',
        'padi' => 'images/website-bisnis/template/agriculture&farming/corporate/agribisnis-forest-moss/komoditas-padi.jpg',
        'jagung' => 'images/website-bisnis/template/agriculture&farming/corporate/agribisnis-forest-moss/komoditas-jagung.jpg',
        'ladang' => 'images/website-bisnis/template/agriculture&farming/corporate/agribisnis-forest-moss/ladang-panen.jpg',
        'petani' => 'images/website-bisnis/template/agriculture&farming/corporate/agribisnis-forest-moss/mitra-petani.jpg',
        'gandum' => 'images/website-bisnis/template/agriculture&farming/corporate/agribisnis-forest-moss/penawaran-gandum.jpg',
        'robot' => 'images/website-bisnis/template/agriculture&farming/corporate/agribisnis-forest-moss/ai-robot.jpg',
        'bot' => 'images/website-bisnis/template/agriculture&farming/corporate/agribisnis-forest-moss/ai-bot-avatar.jpg',
        'peta' => 'images/website-bisnis/template/agriculture&farming/corporate/agribisnis-forest-moss/peta-distribusi.svg',
        'iso' => 'images/website-bisnis/template/agriculture&farming/corporate/agribisnis-forest-moss/sertifikasi-iso.svg',
        'haccp' => 'images/website-bisnis/template/agriculture&farming/corporate/agribisnis-forest-moss/sertifikasi-haccp.svg',
        'globalgap' => 'images/website-bisnis/template/agriculture&farming/corporate/agribisnis-forest-moss/sertifikasi-globalgap.svg',
        'usda' => 'images/website-bisnis/template/agriculture&farming/corporate/agribisnis-forest-moss/sertifikasi-usda.svg',
    ],
    'topbar' => [
        'links' => [
            [
                'label' => 'Karir',
                'href' => '#',
            ],
        ],
        'langs' => [
            [
                'code' => 'ID',
                'label' => 'Indonesia',
                'flag' => 'id',
            ],
            [
                'code' => 'EN',
                'label' => 'English',
                'flag' => 'en',
            ],
        ],
    ],
    'nav' => [
        [
            'label' => 'Beranda',
            'title' => 'Beranda',
            'route' => 'agribisnis.home',
            'match' => ['agribisnis.home'],
        ],
        [
            'label' => 'Komoditas',
            'title' => 'Katalog Komoditas',
            'route' => 'agribisnis.katalog',
            'match' => ['agribisnis.katalog'],
        ],
        [
            'label' => 'Panen',
            'title' => 'Informasi Tanaman & Panen',
            'route' => 'agribisnis.panen',
            'match' => ['agribisnis.panen'],
        ],
        [
            'label' => 'Spesifikasi',
            'title' => 'Spesifikasi Produk',
            'route' => 'agribisnis.spesifikasi',
            'match' => ['agribisnis.spesifikasi'],
        ],
        [
            'label' => 'MOQ',
            'title' => 'Jumlah Pemesanan Minimal (MOQ)',
            'route' => 'agribisnis.moq',
            'match' => ['agribisnis.moq'],
        ],
        [
            'label' => 'Kapasitas',
            'title' => 'Kapasitas Pasokan',
            'route' => 'agribisnis.kapasitas',
            'match' => ['agribisnis.kapasitas'],
        ],
        [
            'label' => 'Distribusi',
            'title' => 'Jangkauan Distribusi',
            'route' => 'agribisnis.distribusi',
            'match' => ['agribisnis.distribusi'],
        ],
        [
            'label' => 'Sertifikasi',
            'title' => 'Sertifikasi',
            'route' => 'agribisnis.sertifikasi',
            'match' => ['agribisnis.sertifikasi'],
        ],
    ],
    'hero' => [
        'eyebrow' => 'Solusi Komoditas Pertanian Terpercaya',
        'title' => 'Dari Lahan Terbaik',
        'title_accent' => 'Untuk Masa Depan yang Lebih Baik',
        'text' => 'Green Harvest menghadirkan komoditas pertanian berkualitas tinggi dari petani pilihan, dengan proses yang transparan dan berkelanjutan untuk mendukung ketahanan pangan global.',
        'btn1' => 'Lihat Katalog Komoditas',
        'btn2' => 'Jadi Mitra Kami',
        'script' => 'Bersama Membangun Pertanian Berkelanjutan',
        'cards' => [
            [
                'icon' => 'award',
                'title' => 'Produk Berkualitas',
                'sub' => 'Standar Internasional',
            ],
            [
                'icon' => 'handshake',
                'title' => 'Kemitraan Terpercaya',
                'sub' => 'Jangka Panjang',
            ],
            [
                'icon' => 'chain',
                'title' => 'Rantai Pasok Efisien',
                'sub' => 'Dari Petani ke Dunia',
            ],
        ],
    ],
    'quick' => [
        [
            'icon' => 'leaf',
            'title' => 'Katalog Komoditas',
            'text' => 'Beragam pilihan hasil pertanian unggulan.',
            'route' => 'agribisnis.katalog',
        ],
        [
            'icon' => 'calendar',
            'title' => 'Informasi Panen',
            'text' => 'Update musim dan ketersediaan hasil panen.',
            'route' => 'agribisnis.panen',
        ],
        [
            'icon' => 'file',
            'title' => 'Spesifikasi Produk',
            'text' => 'Detail kualitas dan standar produk.',
            'route' => 'agribisnis.spesifikasi',
        ],
        [
            'icon' => 'box',
            'title' => 'MOQ',
            'text' => 'Jumlah minimal pemesanan.',
            'route' => 'agribisnis.moq',
        ],
        [
            'icon' => 'truck',
            'title' => 'Kapasitas Pasokan',
            'text' => 'Siap memenuhi kebutuhan skala besar.',
            'route' => 'agribisnis.kapasitas',
        ],
        [
            'icon' => 'globe',
            'title' => 'Jangkauan Distribusi',
            'text' => 'Lokal hingga internasional.',
            'route' => 'agribisnis.distribusi',
        ],
        [
            'icon' => 'shield',
            'title' => 'Sertifikasi',
            'text' => 'Terjamin kualitas dan keamanannya.',
            'route' => 'agribisnis.sertifikasi',
        ],
    ],
    'commodities' => [
        [
            'key' => 'kopi',
            'name' => 'Kopi',
            'variant' => 'Arabika & Robusta',
            'img' => 'kopi',
            'desc' => 'Biji kopi pilihan dari dataran tinggi, disortir ketat dan diproses dengan standar mutu ekspor.',
            'facts' => [
                ['Varietas', 'Arabika & Robusta'],
                ['Proses', 'Natural, Honey, Washed'],
                ['Asal', 'Jawa Timur & sekitarnya'],
                ['Kemasan', 'Karung goni / Jumbo bag'],
            ],
        ],
        [
            'key' => 'sawit',
            'name' => 'Kelapa Sawit',
            'variant' => 'CPO & Kernel',
            'img' => 'sawit',
            'desc' => 'Crude Palm Oil dan Palm Kernel dengan kadar mutu terjaga dan pasokan berkelanjutan untuk industri.',
            'facts' => [
                ['Produk', 'CPO & Kernel'],
                ['Penggunaan', 'Industri pangan & oleokimia'],
                ['Pengiriman', 'Curah / Flexitank'],
                ['Pasokan', 'Kontrak berkala'],
            ],
        ],
        [
            'key' => 'padi',
            'name' => 'Padi',
            'variant' => 'Beras & Gabah',
            'img' => 'padi',
            'desc' => 'Beras dan gabah dari sentra padi pilihan, tersedia berbagai grade untuk kebutuhan ritel maupun industri.',
            'facts' => [
                ['Produk', 'Beras & Gabah'],
                ['Grade', 'Premium / Medium'],
                ['Kadar air', 'Max 14%'],
                ['Kemasan', 'Karung 25 / 50 kg'],
            ],
        ],
        [
            'key' => 'jagung',
            'name' => 'Jagung',
            'variant' => 'Pakan & Industri',
            'img' => 'jagung',
            'desc' => 'Jagung pipil kering untuk pakan ternak dan industri, dengan kadar air dan kemurnian yang konsisten.',
            'facts' => [
                ['Produk', 'Jagung pipil kering'],
                ['Penggunaan', 'Pakan & industri'],
                ['Kemurnian', 'Min 98%'],
                ['Kemasan', 'Karung / Bulk'],
            ],
        ],
    ],
    'harvest' => [
        'title' => 'Informasi Tanaman & Panen',
        'sub' => 'Data terkini tentang siklus tanam, kondisi panen, dan potensi hasil.',
        'items' => [
            [
                'icon' => 'padi',
                'name' => 'Padi',
                'season' => 'Panen Feb - Apr',
                'status' => 'Tersedia',
                'note' => 'Musim panen raya dengan stok gabah dan beras melimpah.',
            ],
            [
                'icon' => 'jagung',
                'name' => 'Jagung',
                'season' => 'Panen Mar - Mei',
                'status' => 'Tersedia',
                'note' => 'Jagung pipil kering siap kirim dengan kadar air terjaga.',
            ],
            [
                'icon' => 'sawit',
                'name' => 'Kelapa Sawit',
                'season' => 'Panen Sep - Des',
                'status' => 'Tersedia',
                'note' => 'Produksi TBS stabil sepanjang tahun dengan puncak di akhir tahun.',
            ],
            [
                'icon' => 'kopi',
                'name' => 'Kopi',
                'season' => 'Panen Mei - Jul',
                'status' => 'Tersedia',
                'note' => 'Panen petik merah dengan proses pascapanen terkontrol.',
            ],
        ],
        'months' => ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Ags', 'Sep', 'Okt', 'Nov', 'Des'],
        'calendar' => [
            [
                'name' => 'Padi',
                'on' => [1, 2, 3],
            ],
            [
                'name' => 'Jagung',
                'on' => [2, 3, 4],
            ],
            [
                'name' => 'Kelapa Sawit',
                'on' => [8, 9, 10, 11],
            ],
            [
                'name' => 'Kopi',
                'on' => [4, 5, 6],
            ],
        ],
    ],
    'cta' => [
        'title' => 'Butuh Mitra',
        'title2' => 'untuk Bisnis Pertanian Anda?',
        'text' => 'Kami siap menjadi partner terpercaya untuk kebutuhan komoditas dan pengembangan bisnis Anda.',
        'btn' => 'Ajukan Penawaran',
    ],
    'specs' => [
        'title' => 'Spesifikasi Produk',
        'sub' => 'Kualitas, ukuran, dan standar sesuai kebutuhan produk.',
        'items' => [
            [
                'icon' => 'drop',
                'label' => 'Kadar Air',
                'value' => 'Max 14%',
                'desc' => 'Kadar air dijaga agar komoditas awet selama penyimpanan dan pengiriman.',
            ],
            [
                'icon' => 'ruler',
                'label' => 'Ukuran',
                'value' => 'Grade A / B',
                'desc' => 'Sortasi ukuran dan grade sesuai permintaan pembeli dan standar pasar.',
            ],
            [
                'icon' => 'sparkle',
                'label' => 'Kemurnian',
                'value' => 'Min 98%',
                'desc' => 'Tingkat kemurnian tinggi, bebas dari kotoran dan benda asing.',
            ],
            [
                'icon' => 'pack',
                'label' => 'Kemasan',
                'value' => 'Karung / Jumbo Bag / Bulk',
                'short' => 'Karung / Jumbo Bag / Bulk',
                'desc' => 'Pilihan kemasan fleksibel mengikuti volume dan tujuan pengiriman.',
            ],
        ],
    ],
    'moq' => [
        'title' => 'Jumlah Pemesanan Minimal (MOQ)',
        'sub' => 'Mulai dari skala kecil hingga besar.',
        'items' => [
            [
                'icon' => 'kopi',
                'name' => 'Kopi',
                'value' => '1 Ton',
            ],
            [
                'icon' => 'sawit',
                'name' => 'Kelapa Sawit',
                'value' => '5 Ton',
            ],
            [
                'icon' => 'padi',
                'name' => 'Padi',
                'value' => '10 Ton',
            ],
            [
                'icon' => 'jagung',
                'name' => 'Jagung',
                'value' => '10 Ton',
            ],
        ],
    ],
    'supply' => [
        'title' => 'Kapasitas Pasokan',
        'sub' => 'Dukungan pasokan stabil sepanjang tahun.',
        'value' => '> 5.000 Ton',
        'prefix' => '>',
        'count' => 5000,
        'display' => '5.000',
        'suffix' => 'Ton',
        'unit' => 'per tahun',
        'btn' => 'Lihat Detail',
        'items' => [
            ['Kopi', '1.200 Ton', 24],
            ['Kelapa Sawit', '1.600 Ton', 31],
            ['Padi', '1.400 Ton', 27],
            ['Jagung', '900 Ton', 18],
        ],
    ],
    'coverage' => [
        'title' => 'Jangkauan Distribusi',
        'sub' => 'Dari lokal hingga pasar internasional.',
        'regions' => ['Indonesia', 'Asia', 'Eropa', 'Amerika', 'Timur Tengah'],
        'items' => [
            ['Indonesia', 'Distribusi domestik ke pabrik, grosir, dan industri pangan di seluruh nusantara.'],
            ['Asia', 'Pengiriman rutin ke pasar Asia Tenggara, Asia Timur, dan Asia Selatan.'],
            ['Eropa', 'Pasokan komoditas bersertifikat untuk importir dan roaster di Eropa.'],
            ['Amerika', 'Ekspor komoditas pilihan untuk pembeli di Amerika Utara dan Selatan.'],
            ['Timur Tengah', 'Kerja sama jangka panjang dengan trader dan distributor Timur Tengah.'],
        ],
    ],
    'certs' => [
        'title' => 'Sertifikasi',
        'sub' => 'Terjamin kualitas dan keamanannya.',
        'items' => [
            [
                'img' => 'iso',
                'name' => 'ISO 22000',
                'desc' => 'Sistem manajemen keamanan pangan di sepanjang rantai pasok.',
            ],
            [
                'img' => 'haccp',
                'name' => 'HACCP',
                'desc' => 'Analisis bahaya dan pengendalian titik kritis pada proses produksi.',
            ],
            [
                'img' => 'globalgap',
                'name' => 'GLOBALG.A.P.',
                'desc' => 'Standar praktik pertanian yang baik dan berkelanjutan.',
            ],
            [
                'img' => 'usda',
                'name' => 'USDA Organic',
                'desc' => 'Pengakuan produk organik untuk pasar Amerika Serikat.',
            ],
        ],
    ],
    'ai' => [
        'label' => 'Pertanyaan populer',
        'chips' => ['Berapa MOQ tiap komoditas?', 'Kapan musim panen?', 'Bagaimana cara menjadi mitra?'],
        'title' => 'Ada Pertanyaan?',
        'title2' => 'Chat dengan AI Assistant kami!',
        'text' => 'Dapatkan informasi tentang komoditas, harga, MOQ, dan kemitraan dengan mudah.',
        'btn' => 'Chat Sekarang',
    ],
    'inquiry' => [
        'title' => 'Inquiry Bisnis (B2B)',
        'sub' => 'Hubungi kami untuk informasi harga, ketersediaan, dan kerja sama.',
        'btn' => 'Kirim Inquiry',
    ],
    'quote' => [
        'steps' => ['Pilih komoditas', 'Tentukan volume', 'Terima penawaran'],
        'title' => 'Minta Penawaran Harga',
        'sub' => 'Dapatkan penawaran terbaik sesuai kebutuhan Anda.',
        'btn' => 'Ajukan Penawaran',
    ],
    'chatbot' => [
        'name' => 'Green Harvest AI',
        'status' => 'Asisten komoditas & kemitraan',
        'welcome' => 'Halo! Saya asisten AI Green Harvest. Tanyakan seputar komoditas, MOQ, kapasitas pasokan, distribusi, sertifikasi, atau kemitraan.',
        'fallback' => 'Maaf, saya belum menemukan jawaban yang tepat. Silakan pilih salah satu topik di bawah atau hubungi tim kami melalui WhatsApp.',
        'faqs' => [
            [
                'q' => 'Komoditas apa saja yang tersedia?',
                'a' => 'Saat ini tersedia Kopi (Arabika & Robusta), Kelapa Sawit (CPO & Kernel), Padi (Beras & Gabah), dan Jagung (Pakan & Industri).',
                'k' => ['komoditas', 'produk', 'tersedia', 'katalog'],
            ],
            [
                'q' => 'Berapa MOQ tiap komoditas?',
                'a' => 'MOQ Kopi 1 Ton, Kelapa Sawit 5 Ton, Padi 10 Ton, dan Jagung 10 Ton.',
                'k' => ['moq', 'minimal', 'minimum', 'pemesanan'],
            ],
            [
                'q' => 'Bagaimana kapasitas pasokan?',
                'a' => 'Kami mendukung pasokan stabil sepanjang tahun dengan kapasitas lebih dari 5.000 ton per tahun.',
                'k' => ['kapasitas', 'pasokan', 'stok', 'volume'],
            ],
            [
                'q' => 'Kapan musim panen?',
                'a' => 'Padi panen Feb–Apr, Jagung Mar–Mei, Kelapa Sawit Sep–Des, dan Kopi Mei–Jul.',
                'k' => ['panen', 'musim', 'kapan'],
            ],
            [
                'q' => 'Apa saja spesifikasi produk?',
                'a' => 'Kadar air maks. 14%, ukuran Grade A/B, kemurnian min. 98%, dengan kemasan karung, jumbo bag, atau bulk.',
                'k' => ['spesifikasi', 'kualitas', 'mutu', 'kemasan', 'kadar'],
            ],
            [
                'q' => 'Ke mana saja distribusinya?',
                'a' => 'Distribusi mencakup Indonesia, Asia, Eropa, Amerika, dan Timur Tengah.',
                'k' => ['distribusi', 'ekspor', 'kirim', 'pengiriman', 'negara'],
            ],
            [
                'q' => 'Sertifikasi apa yang dimiliki?',
                'a' => 'Kami memiliki sertifikasi ISO 22000, HACCP, GLOBALG.A.P., dan USDA Organic.',
                'k' => ['sertifikasi', 'sertifikat', 'iso', 'haccp', 'organik', 'organic'],
            ],
            [
                'q' => 'Bagaimana cara menjadi mitra?',
                'a' => 'Isi formulir Inquiry Bisnis (B2B) atau ajukan penawaran harga. Tim kami akan menghubungi Anda.',
                'k' => ['mitra', 'kemitraan', 'kerja sama', 'kerjasama', 'partner'],
            ],
            [
                'q' => 'Bagaimana minta penawaran harga?',
                'a' => 'Gunakan halaman Minta Penawaran Harga, sebutkan komoditas, volume, dan tujuan pengiriman.',
                'k' => ['harga', 'penawaran', 'quotation', 'quote'],
            ],
        ],
    ],
    'footer' => [
        'about' => 'Bersama petani, kami menghadirkan komoditas pertanian berkualitas untuk masa depan yang lebih baik.',
        'follow' => 'Ikuti Kami',
        'cols' => [
            [
                'title' => 'Navigasi',
                'links' => [
                    ['Beranda', 'agribisnis.home'],
                    ['Katalog Komoditas', 'agribisnis.katalog'],
                    ['Kapasitas Pasokan', 'agribisnis.kapasitas'],
                    ['Jangkauan Distribusi', 'agribisnis.distribusi'],
                ],
            ],
            [
                'title' => 'Informasi',
                'links' => [
                    ['Informasi Tanaman & Panen', 'agribisnis.panen'],
                    ['Spesifikasi Produk', 'agribisnis.spesifikasi'],
                    ['MOQ', 'agribisnis.moq'],
                    ['Kualitas & Sertifikasi', 'agribisnis.sertifikasi'],
                    ['FAQ', 'agribisnis.chatbot'],
                ],
            ],
            [
                'title' => 'Layanan Kami',
                'accent' => true,
                'links' => [
                    ['Pengadaan Komoditas', 'agribisnis.katalog'],
                    ['Trading & Export', 'agribisnis.distribusi'],
                    ['Kemitraan Bisnis', 'agribisnis.inquiry'],
                    ['Konsultasi Agribisnis', 'agribisnis.penawaran'],
                ],
            ],
        ],
        'contact' => [
            ['phone', 'Telepon'],
            ['mail', 'Email'],
            ['pin', 'Alamat'],
        ],
        'social' => [
            ['facebook', 'Facebook'],
            ['instagram', 'Instagram'],
            ['linkedin', 'LinkedIn'],
            ['youtube', 'YouTube'],
        ],
        'legal' => ['Syarat & Ketentuan', 'Kebijakan Privasi', 'Peta Situs'],
        'credit' => '© 2026 WEBIA by D-KREASI. Seluruh hak cipta dilindungi.',
    ],
    'pages' => [
        'katalog' => [
            'title' => 'Katalog Komoditas',
            'sub' => 'Beragam pilihan hasil pertanian unggulan dari petani pilihan Green Harvest.',
        ],
        'panen' => [
            'title' => 'Informasi Tanaman & Panen',
            'sub' => 'Data terkini tentang siklus tanam, kondisi panen, dan potensi hasil.',
        ],
        'spesifikasi' => [
            'title' => 'Spesifikasi Produk',
            'sub' => 'Kualitas, ukuran, dan standar sesuai kebutuhan produk.',
        ],
        'moq' => [
            'title' => 'Jumlah Pemesanan Minimal (MOQ)',
            'sub' => 'Mulai dari skala kecil hingga besar.',
        ],
        'kapasitas' => [
            'title' => 'Kapasitas Pasokan',
            'sub' => 'Dukungan pasokan stabil sepanjang tahun.',
        ],
        'distribusi' => [
            'title' => 'Jangkauan Distribusi',
            'sub' => 'Dari lokal hingga pasar internasional.',
        ],
        'sertifikasi' => [
            'title' => 'Sertifikasi',
            'sub' => 'Terjamin kualitas dan keamanannya.',
        ],
        'inquiry' => [
            'title' => 'Inquiry Bisnis (B2B)',
            'sub' => 'Hubungi kami untuk informasi harga, ketersediaan, dan kerja sama.',
        ],
        'penawaran' => [
            'title' => 'Minta Penawaran Harga',
            'sub' => 'Dapatkan penawaran terbaik sesuai kebutuhan Anda.',
        ],
        'chatbot' => [
            'title' => 'AI Assistant',
            'sub' => 'FAQ komoditas & kemitraan — Chat dengan AI Assistant kami!',
        ],
    ],
    'form' => [
        'volumes' => ['1 – 5 Ton', '5 – 10 Ton', '10 – 50 Ton', '50 – 100 Ton', '> 100 Ton'],
        'incoterms' => ['FOB', 'CIF', 'CFR', 'EXW', 'Franco / Lokal'],
    ],
];
