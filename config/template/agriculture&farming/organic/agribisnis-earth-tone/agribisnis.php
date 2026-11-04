<?php

/*
|--------------------------------------------------------------------------
| AgroHarvest - Agribisnis & Perdagangan Komoditas (Organic / Earth Tone)
|--------------------------------------------------------------------------
| Seluruh konten statis template disimpan di sini agar view tetap bersih.
| Frontend hanya membaca array ini (tidak ada query database).
*/

return [

    // Daftar halaman (dipakai dropdown navbar, pencarian, dan kartu "Jelajahi")
    'pages' => [
        'komoditas'   => ['title' => 'Katalog Komoditas',            'desc' => '8 komoditas unggulan siap kirim',           'icon' => 'sprout',    'keywords' => 'katalog komoditas produk sawit kopi kakao karet lada sayuran buah padi beras'],
        'panen'       => ['title' => 'Informasi Tanaman & Panen',    'desc' => 'Kalender tanam, panen, dan tips budidaya',  'icon' => 'calendar',  'keywords' => 'panen tanam musim budidaya kalender tips'],
        'spesifikasi' => ['title' => 'Spesifikasi Produk',           'desc' => 'Kadar air, ukuran, kemurnian, kemasan',     'icon' => 'purity',    'keywords' => 'spesifikasi kualitas kadar air ukuran grade kemurnian kemasan mutu'],
        'moq'         => ['title' => 'Jumlah Pesanan Minimum',       'desc' => 'Mulai dari 1 ton, skema fleksibel',         'icon' => 'package',   'keywords' => 'pesanan minimum moq minimal ton order'],
        'kapasitas'   => ['title' => 'Kapasitas Pasokan',            'desc' => 'Lebih dari 10.000 ton per tahun',           'icon' => 'supply',    'keywords' => 'kapasitas pasokan stok supply volume tahunan'],
        'distribusi'  => ['title' => 'Jangkauan Distribusi',         'desc' => 'Seluruh Indonesia & Asia',                  'icon' => 'globe',     'keywords' => 'distribusi pengiriman wilayah ekspor jangkauan peta logistik'],
        'sertifikasi' => ['title' => 'Sertifikasi',                  'desc' => 'USDA Organic, Halal, ISO 22000, HACCP',     'icon' => 'quality',   'keywords' => 'sertifikasi sertifikat usda organic halal iso haccp'],
        'b2b'         => ['title' => 'Inquiry B2B',                  'desc' => 'Jalin kemitraan bisnis dengan kami',        'icon' => 'handshake', 'keywords' => 'inquiry b2b kemitraan mitra partner kerja sama bisnis'],
        'penawaran'   => ['title' => 'Permintaan Penawaran',         'desc' => 'Harga terbaik sesuai kebutuhan Anda',       'icon' => 'doc',       'keywords' => 'penawaran harga quotation quote tawar'],
        'chatbot'     => ['title' => 'AI FAQ Komoditas & Kemitraan', 'desc' => 'Tanya jawab otomatis seputar komoditas',    'icon' => 'chat',      'keywords' => 'ai faq chatbot tanya jawab bantuan asisten'],
    ],

    // Struktur menu navbar (children = key pada daftar halaman di atas)
    'menu' => [
        ['label' => 'Beranda',      'key' => 'home'],
        ['label' => 'Komoditas',    'key' => 'komoditas', 'children' => ['komoditas', 'panen', 'spesifikasi', 'moq', 'kapasitas', 'distribusi']],
        ['label' => 'Kemitraan',    'key' => 'b2b',       'children' => ['b2b', 'penawaran', 'chatbot']],
        ['label' => 'Sertifikasi',  'key' => 'sertifikasi'],
    ],

    'brand' => [
        'name'     => 'AgroHarvest',
        'tagline'  => "Nature's Goodness, Global Reach",
        'title'    => 'AgroHarvest — Agribisnis & Perdagangan Komoditas Pertanian',
        'summary'  => 'Agribisnis & perdagangan komoditas pertanian untuk masa depan yang lebih baik.',
    ],

    'contact' => [
        'location'      => 'Jawa Timur, Indonesia',
        'hours'         => 'Sen - Sab 08:00 - 17:00',
        'phone'         => '+62 31 9876 5432',
        'phone_link'    => '+62319876543',
        'email'         => 'sales@agroharvest.co.id',
        'address'       => 'Jl. Pertanian No. 88, Surabaya, Indonesia',
        // Semua form & tombol WhatsApp diarahkan ke nomor ini (format internasional tanpa +)
        'whatsapp'      => '62895630300345',
        'whatsapp_text' => 'Halo AgroHarvest, saya ingin bertanya tentang komoditas dan kemitraan.',
    ],

    'social' => [
        ['key' => 'facebook',  'label' => 'Facebook',  'url' => '#'],
        ['key' => 'instagram', 'label' => 'Instagram', 'url' => '#'],
        ['key' => 'linkedin',  'label' => 'LinkedIn',  'url' => '#'],
        ['key' => 'youtube',   'label' => 'YouTube',   'url' => '#'],
    ],

    'hero' => [
        'eyebrow'   => 'Agribisnis & Perdagangan Komoditas Pertanian',
        'title_1'   => 'Komoditas Berkualitas',
        'title_2'   => 'untuk Masa Depan Berkelanjutan',
        'text'      => 'Kami menghadirkan hasil bumi terbaik dari petani lokal hingga pasar global, dengan komitmen terhadap kualitas, keberlanjutan, dan kesejahteraan bersama.',
        'script'    => 'Dari Alam untuk Dunia',
        'ai_title'  => 'Tanya AI Assistant',
        'ai_text'   => 'Informasi komoditas, kemitraan & lainnya',
    ],

    'commodities' => [
        [
            'slug' => 'kelapa-sawit', 'name' => 'Kelapa Sawit', 'en' => 'Palm Oil', 'category' => 'perkebunan',
            'image' => 'commodity-kelapa-sawit.jpg',
            'desc'  => 'Tandan buah segar, CPO, dan palm kernel dari kebun mitra dengan pengelolaan berkelanjutan.',
            'form'  => 'TBS / CPO / Palm Kernel', 'origin' => 'Sumatera & Kalimantan', 'grade' => 'Grade A / B',
            'moq'   => '5 Ton', 'capacity' => 3500,
        ],
        [
            'slug' => 'kopi', 'name' => 'Kopi', 'en' => 'Coffee', 'category' => 'perkebunan',
            'image' => 'commodity-kopi.jpg',
            'desc'  => 'Green bean Arabika dan Robusta hasil panen petik merah dengan proses pasca panen terkontrol.',
            'form'  => 'Green Bean Arabika / Robusta', 'origin' => 'Jawa Timur, Sumatera, Sulawesi', 'grade' => 'Grade A / B',
            'moq'   => '1 Ton', 'capacity' => 1200,
        ],
        [
            'slug' => 'kakao', 'name' => 'Kakao', 'en' => 'Cocoa', 'category' => 'perkebunan',
            'image' => 'commodity-kakao.jpg',
            'desc'  => 'Biji kakao fermentasi dengan aroma khas, dikeringkan alami dan disortir ketat.',
            'form'  => 'Biji Kakao Fermentasi', 'origin' => 'Sulawesi & Jawa', 'grade' => 'Grade A / B',
            'moq'   => '1 Ton', 'capacity' => 900,
        ],
        [
            'slug' => 'karet', 'name' => 'Karet', 'en' => 'Rubber', 'category' => 'perkebunan',
            'image' => 'commodity-karet.jpg',
            'desc'  => 'Karet remah dan lembaran dari petani karet rakyat dengan kontrol mutu berkala.',
            'form'  => 'SIR 20 / RSS', 'origin' => 'Sumatera & Kalimantan', 'grade' => 'Grade A / B',
            'moq'   => '5 Ton', 'capacity' => 1800,
        ],
        [
            'slug' => 'lada', 'name' => 'Lada', 'en' => 'Pepper', 'category' => 'perkebunan',
            'image' => 'commodity-lada.jpg',
            'desc'  => 'Lada hitam dan putih dengan aroma tajam, dibersihkan dan disortir sesuai standar ekspor.',
            'form'  => 'Lada Hitam / Putih', 'origin' => 'Bangka Belitung & Lampung', 'grade' => 'Grade A / B',
            'moq'   => '1 Ton', 'capacity' => 400,
        ],
        [
            'slug' => 'sayuran', 'name' => 'Sayuran', 'en' => 'Vegetables', 'category' => 'hortikultura',
            'image' => 'commodity-sayuran.jpg',
            'desc'  => 'Sayuran segar pilihan dari sentra hortikultura, dipanen sesuai pesanan dan dikemas higienis.',
            'form'  => 'Segar, sortir & grading', 'origin' => 'Jawa Timur & Jawa Barat', 'grade' => 'Grade A / B',
            'moq'   => '1 Ton', 'capacity' => 800,
        ],
        [
            'slug' => 'buah-buahan', 'name' => 'Buah-buahan', 'en' => 'Fruits', 'category' => 'hortikultura',
            'image' => 'commodity-buah.jpg',
            'desc'  => 'Buah tropis segar dengan tingkat kematangan terjaga untuk pasar domestik dan ekspor.',
            'form'  => 'Segar, sortir & grading', 'origin' => 'Jawa & Bali', 'grade' => 'Grade A / B',
            'moq'   => '1 Ton', 'capacity' => 700,
        ],
        [
            'slug' => 'padi', 'name' => 'Padi', 'en' => 'Rice', 'category' => 'pangan',
            'image' => 'commodity-padi.jpg',
            'desc'  => 'Beras dan gabah kering giling dari lumbung padi mitra dengan kadar air terkontrol.',
            'form'  => 'Beras / GKG', 'origin' => 'Jawa & Sumatera', 'grade' => 'Grade A / B',
            'moq'   => '2 Ton', 'capacity' => 2500,
        ],
    ],

    'categories' => [
        ['key' => 'semua',        'label' => 'Semua'],
        ['key' => 'perkebunan',   'label' => 'Perkebunan'],
        ['key' => 'hortikultura', 'label' => 'Hortikultura'],
        ['key' => 'pangan',       'label' => 'Pangan'],
    ],

    'harvest' => [
        'title' => 'Informasi Tanaman & Panen',
        'text'  => 'Dapatkan informasi terkini seputar musim tanam, waktu panen, dan tips budidaya.',
        // bulan 1-12 | tanam & panen bersifat indikatif per sentra
        'calendar' => [
            ['slug' => 'kelapa-sawit', 'plant' => [10, 11, 12], 'harvest' => [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12], 'tip' => 'Panen tandan matang dengan interval 10-14 hari untuk menjaga kadar asam lemak bebas tetap rendah.'],
            ['slug' => 'kopi',         'plant' => [11, 12, 1],  'harvest' => [5, 6, 7, 8, 9],  'tip' => 'Petik merah selektif lalu keringkan segera agar cita rasa dan kadar air terjaga.'],
            ['slug' => 'kakao',        'plant' => [10, 11, 12], 'harvest' => [4, 5, 6, 9, 10, 11], 'tip' => 'Fermentasi 5-6 hari dan jemur merata sebelum penyimpanan.'],
            ['slug' => 'karet',        'plant' => [10, 11, 12], 'harvest' => [1, 2, 3, 4, 5, 6, 9, 10, 11, 12], 'tip' => 'Sadap pagi hari dan hindari penyadapan saat musim gugur daun.'],
            ['slug' => 'lada',         'plant' => [11, 12, 1],  'harvest' => [5, 6, 7, 8],     'tip' => 'Panen saat 1-2 butir pada tandan mulai memerah untuk lada hitam berkualitas.'],
            ['slug' => 'sayuran',      'plant' => [3, 4, 9, 10], 'harvest' => [5, 6, 11, 12],  'tip' => 'Atur pola tanam bergilir agar pasokan segar tersedia sepanjang tahun.'],
            ['slug' => 'buah-buahan',  'plant' => [10, 11, 12], 'harvest' => [1, 2, 3, 11, 12], 'tip' => 'Panen pada tingkat kematangan yang sesuai tujuan kirim: domestik atau ekspor.'],
            ['slug' => 'padi',         'plant' => [11, 12, 4, 5], 'harvest' => [3, 4, 8, 9],   'tip' => 'Keringkan gabah hingga kadar air aman sebelum digiling dan disimpan.'],
        ],
        'tips' => [
            ['title' => 'Pola Tanam Terencana', 'text' => 'Kami memetakan jadwal tanam bersama kelompok tani agar pasokan stabil sepanjang tahun.'],
            ['title' => 'Panen pada Waktu Terbaik', 'text' => 'Waktu petik dan panen ditentukan dari tingkat kematangan, bukan hanya kalender.'],
            ['title' => 'Pasca Panen yang Higienis', 'text' => 'Pengeringan, sortasi, dan penyimpanan dilakukan terstandar untuk menjaga kualitas.'],
            ['title' => 'Budidaya Berkelanjutan', 'text' => 'Pemupukan berimbang dan pengendalian hama terpadu untuk tanah yang tetap subur.'],
        ],
    ],

    'months' => ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'],

    'specs' => [
        'title' => 'Spesifikasi Produk',
        'text'  => 'Detail kualitas dan standar produk kami.',
        'headline' => [
            ['icon' => 'water',   'label' => 'Kadar Air',  'value' => 'Maks. 14%'],
            ['icon' => 'size',    'label' => 'Ukuran',     'value' => 'Grade A / B'],
            ['icon' => 'purity',  'label' => 'Kemurnian',  'value' => 'Min. 98%'],
            ['icon' => 'package', 'label' => 'Kemasan',    'value' => 'Karung / Jumbo Bag'],
        ],
        'note' => 'Nilai bersifat indikatif. Spesifikasi final mengikuti kontrak dan hasil uji laboratorium.',
        'table' => [
            'kelapa-sawit' => ['Bentuk produk' => 'TBS / CPO / Palm Kernel', 'Kadar air' => 'CPO maks. 0,5%', 'Ukuran / Grade' => 'Grade A / B', 'Kemurnian' => 'Sesuai standar mutu CPO', 'Kemasan' => 'Curah / Flexitank / Karung'],
            'kopi'         => ['Bentuk produk' => 'Green bean Arabika / Robusta', 'Kadar air' => 'Maks. 12,5%', 'Ukuran / Grade' => 'Grade A / B (screen size)', 'Kemurnian' => 'Min. 98% bebas benda asing', 'Kemasan' => 'Karung 60 kg / Jumbo Bag'],
            'kakao'        => ['Bentuk produk' => 'Biji kakao fermentasi', 'Kadar air' => 'Maks. 7,5%', 'Ukuran / Grade' => 'Grade A / B', 'Kemurnian' => 'Min. 98%', 'Kemasan' => 'Karung 50-60 kg / Jumbo Bag'],
            'karet'        => ['Bentuk produk' => 'SIR 20 / RSS', 'Kadar air' => 'Maks. 0,8%', 'Ukuran / Grade' => 'Grade A / B', 'Kemurnian' => 'Sesuai standar SIR', 'Kemasan' => 'Bale 35 kg / Pallet'],
            'lada'         => ['Bentuk produk' => 'Lada hitam / putih', 'Kadar air' => 'Maks. 13%', 'Ukuran / Grade' => 'Grade A / B', 'Kemurnian' => 'Min. 98%', 'Kemasan' => 'Karung 25-50 kg / Jumbo Bag'],
            'sayuran'      => ['Bentuk produk' => 'Segar, sortir & grading', 'Kadar air' => 'Mengikuti jenis sayuran', 'Ukuran / Grade' => 'Grade A / B', 'Kemurnian' => 'Bebas kontaminan fisik', 'Kemasan' => 'Krat / Karton / Karung jaring'],
            'buah-buahan'  => ['Bentuk produk' => 'Segar, sortir & grading', 'Kadar air' => 'Mengikuti jenis buah', 'Ukuran / Grade' => 'Grade A / B', 'Kemurnian' => 'Bebas kontaminan fisik', 'Kemasan' => 'Karton / Krat'],
            'padi'         => ['Bentuk produk' => 'Beras / GKG', 'Kadar air' => 'Maks. 14%', 'Ukuran / Grade' => 'Grade A / B (butir patah)', 'Kemurnian' => 'Min. 98%', 'Kemasan' => 'Karung 25-50 kg / Jumbo Bag'],
        ],
    ],

    'moq' => [
        'title'  => 'Jumlah Pesanan Minimum',
        'text'   => 'Tersedia dalam berbagai skala kebutuhan.',
        'from'   => 'Mulai dari',
        'value'  => '1 Ton',
        'tiers'  => [
            ['name' => 'Uji Pasar',  'range' => '1 - 5 Ton',    'text' => 'Cocok untuk sampel komersial dan percobaan pasar baru.'],
            ['name' => 'Reguler',    'range' => '5 - 50 Ton',   'text' => 'Pengiriman berkala dengan harga yang lebih kompetitif.'],
            ['name' => 'Kontrak',    'range' => '> 50 Ton',     'text' => 'Kontrak pasokan jangka panjang dengan jadwal dan harga disepakati.'],
        ],
        'terms'  => [
            ['label' => 'Satuan pemesanan', 'value' => 'Ton (metrik)'],
            ['label' => 'Skema pengiriman', 'value' => 'FOB / CIF / Franco (negosiasi)'],
            ['label' => 'Pembayaran',       'value' => 'Disepakati saat penawaran'],
            ['label' => 'Sampel',           'value' => 'Tersedia atas permintaan'],
        ],
    ],

    'capacity' => [
        'title'  => 'Kapasitas Pasokan',
        'text'   => 'Pasokan stabil sepanjang tahun.',
        'value'  => '> 10.000 Ton',
        'unit'   => 'per tahun',
        'facts'  => [
            ['label' => 'Komoditas utama',   'value' => '8 jenis'],
            ['label' => 'Kemitraan petani',  'value' => 'Kelompok tani lokal'],
            ['label' => 'Pasokan',           'value' => 'Sepanjang tahun'],
            ['label' => 'Gudang & logistik', 'value' => 'Jawa Timur'],
        ],
    ],

    'distribution' => [
        'title' => 'Jangkauan Distribusi',
        'text'  => 'Pengiriman ke seluruh wilayah Indonesia dan mancanegara.',
        'label' => 'Seluruh Indonesia & Asia',
        'regions' => [
            ['name' => 'Jawa',                 'type' => 'domestik', 'text' => 'Basis gudang dan pengiriman harian ke seluruh kota di Pulau Jawa.', 'lead' => '1 - 3 hari kerja'],
            ['name' => 'Sumatera',             'type' => 'domestik', 'text' => 'Pengiriman darat dan laut ke sentra industri dan pelabuhan utama.', 'lead' => '3 - 7 hari kerja'],
            ['name' => 'Kalimantan',           'type' => 'domestik', 'text' => 'Jalur laut terjadwal menuju pelabuhan utama Kalimantan.',           'lead' => '4 - 8 hari kerja'],
            ['name' => 'Sulawesi',             'type' => 'domestik', 'text' => 'Pengiriman kontainer dan curah melalui pelabuhan utama Sulawesi.', 'lead' => '4 - 8 hari kerja'],
            ['name' => 'Bali & Nusa Tenggara', 'type' => 'domestik', 'text' => 'Pengiriman berkala untuk industri makanan dan pariwisata.',         'lead' => '2 - 6 hari kerja'],
            ['name' => 'Maluku & Papua',       'type' => 'domestik', 'text' => 'Pengiriman terjadwal dengan konsolidasi muatan.',                    'lead' => '7 - 14 hari kerja'],
            ['name' => 'Asia Tenggara',        'type' => 'ekspor',   'text' => 'Ekspor ke negara ASEAN dengan dokumen lengkap.',                     'lead' => 'Sesuai jadwal kapal'],
            ['name' => 'Asia Timur & Selatan', 'type' => 'ekspor',   'text' => 'Ekspor ke pasar Asia lainnya melalui forwarder mitra.',              'lead' => 'Sesuai jadwal kapal'],
        ],
        'note' => 'Estimasi waktu bersifat indikatif dan dapat berubah mengikuti rute, cuaca, dan jadwal kapal.',
    ],

    'certifications' => [
        'title' => 'Sertifikasi',
        'text'  => 'Kualitas dan keamanan produk terjamin.',
        'items' => [
            ['key' => 'usda',  'name' => 'USDA Organic', 'image' => 'cert-usda.png',  'text' => 'Standar produk organik Amerika Serikat untuk komoditas yang dibudidayakan tanpa input sintetis.', 'scope' => 'Berlaku untuk lini produk organik tertentu'],
            ['key' => 'halal', 'name' => 'Halal',        'image' => 'cert-halal.png', 'text' => 'Jaminan kehalalan produk sesuai regulasi Indonesia untuk pasar domestik dan ekspor.',             'scope' => 'Berlaku untuk produk olahan tertentu'],
            ['key' => 'iso',   'name' => 'ISO 22000',    'image' => 'cert-iso.png',   'text' => 'Sistem manajemen keamanan pangan di sepanjang rantai pasok.',                                    'scope' => 'Berlaku untuk fasilitas penanganan & penyimpanan'],
            ['key' => 'haccp', 'name' => 'HACCP',        'image' => 'cert-haccp.png', 'text' => 'Pengendalian titik kritis untuk mencegah bahaya keamanan pangan sejak penerimaan hingga pengiriman.', 'scope' => 'Berlaku untuk proses pasca panen & pengemasan'],
        ],
        'note' => 'Sertifikasi berlaku sesuai ruang lingkup masing-masing komoditas dan fasilitas. Minta salinan dokumen melalui tim kami.',
    ],

    'b2b' => [
        'title' => 'Inquiry B2B',
        'text'  => 'Jalin kemitraan bisnis dengan kami.',
        'cta'   => 'Ajukan Inquiry',
        'benefits' => [
            ['title' => 'Pasokan Terjadwal',     'text' => 'Rencana kirim bulanan atau musiman sesuai kebutuhan produksi Anda.'],
            ['title' => 'Mutu Terdokumentasi',   'text' => 'Setiap lot dilengkapi data mutu dan dokumen pendukung.'],
            ['title' => 'Kemitraan Petani Lokal', 'text' => 'Rantai pasok berbasis kelompok tani yang transparan dan berkelanjutan.'],
        ],
        'business_types' => ['Importir / Trader', 'Industri Pengolahan', 'Distributor', 'Retail / Supermarket', 'Eksportir', 'Lainnya'],
    ],

    'quotation' => [
        'title' => 'Permintaan Penawaran',
        'text'  => 'Dapatkan harga terbaik sesuai kebutuhan Anda.',
        'cta'   => 'Ajukan Penawaran',
        'incoterms' => ['Franco (Loco)', 'FOB', 'CFR', 'CIF', 'Belum menentukan'],
        'units'     => ['Ton', 'Kilogram', 'Kontainer 20ft', 'Kontainer 40ft'],
        'packaging' => ['Karung', 'Jumbo Bag', 'Karton / Krat', 'Curah', 'Sesuai rekomendasi'],
    ],

    'values' => [
        'quote' => ['"Bersama petani, kita tumbuh lebih kuat.', 'Bersama pasar global, kita melangkah lebih jauh."'],
        'items' => [
            ['icon' => 'quality',  'lines' => ['Produk Berkualitas', '& Terpercaya']],
            ['icon' => 'supply',   'lines' => ['Rantai Pasok', 'yang Efisien']],
            ['icon' => 'farmer',   'lines' => ['Mendukung Petani', 'Lokal']],
            ['icon' => 'sprout',   'lines' => ['Komitmen pada', 'Keberlanjutan']],
        ],
    ],

    'chatbot' => [
        'name'     => 'Asisten AgroHarvest',
        'subtitle' => 'FAQ komoditas & kemitraan',
        'welcome'  => 'Halo! Saya asisten AgroHarvest. Tanyakan seputar komoditas, spesifikasi, pesanan minimum, pengiriman, sertifikasi, atau kemitraan bisnis.',
        'fallback' => 'Maaf, saya belum menemukan jawaban yang pas. Coba pilih salah satu topik di bawah, atau hubungi tim kami langsung melalui WhatsApp.',
        'quick'    => ['Komoditas apa saja?', 'Pesanan minimum', 'Kapasitas pasokan', 'Sertifikasi', 'Wilayah pengiriman', 'Cara kemitraan'],
        'faq' => [
            ['q' => 'Komoditas apa saja yang tersedia?', 'keywords' => ['komoditas', 'tersedia', 'katalog', 'jenis komoditas', 'macam'],
             'a' => 'Kami menyediakan 8 komoditas unggulan: kelapa sawit, kopi, kakao, karet, lada, sayuran, buah-buahan, dan padi. Lihat detail lengkap di halaman Komoditas.', 'link' => 'komoditas', 'link_label' => 'Lihat Katalog Komoditas'],
            ['q' => 'Berapa pesanan minimum?', 'keywords' => ['minimum', 'moq', 'minimal', 'pesanan', 'min order', 'berapa ton'],
             'a' => 'Pesanan minimum mulai dari 1 ton, tergantung komoditas. Untuk kelapa sawit dan karet biasanya dimulai dari 5 ton. Tersedia juga skema reguler dan kontrak jangka panjang.', 'link' => 'moq', 'link_label' => 'Lihat Pesanan Minimum'],
            ['q' => 'Berapa kapasitas pasokan per tahun?', 'keywords' => ['kapasitas', 'pasokan', 'stok', 'suplai', 'supply', 'per tahun', 'volume'],
             'a' => 'Kapasitas pasokan gabungan kami lebih dari 10.000 ton per tahun dari berbagai komoditas, dengan pasokan stabil sepanjang tahun.', 'link' => 'kapasitas', 'link_label' => 'Lihat Kapasitas Pasokan'],
            ['q' => 'Bagaimana spesifikasi produk?', 'keywords' => ['spesifikasi', 'kualitas', 'kadar air', 'ukuran', 'grade', 'kemurnian', 'standar', 'mutu'],
             'a' => 'Standar umum kami: kadar air maksimal 14%, ukuran grade A/B, kemurnian minimal 98%, dengan kemasan karung atau jumbo bag. Nilai final mengikuti kontrak dan hasil uji laboratorium.', 'link' => 'spesifikasi', 'link_label' => 'Lihat Spesifikasi Produk'],
            ['q' => 'Apakah produk bersertifikat?', 'keywords' => ['sertifikat', 'sertifikasi', 'halal', 'iso', 'haccp', 'usda', 'organik', 'organic'],
             'a' => 'Ya. Kami memiliki sertifikasi USDA Organic, Halal, ISO 22000, dan HACCP yang berlaku sesuai ruang lingkup komoditas dan fasilitas. Salinan dokumen dapat diminta melalui tim kami.', 'link' => 'sertifikasi', 'link_label' => 'Lihat Sertifikasi'],
            ['q' => 'Wilayah pengiriman apa saja?', 'keywords' => ['kirim', 'pengiriman', 'distribusi', 'wilayah', 'ekspor', 'luar negeri', 'asia', 'ongkir', 'jangkauan'],
             'a' => 'Kami melayani pengiriman ke seluruh wilayah Indonesia dan negara-negara Asia. Estimasi waktu bergantung rute dan jadwal kapal.', 'link' => 'distribusi', 'link_label' => 'Lihat Jangkauan Distribusi'],
            ['q' => 'Bagaimana cara meminta penawaran harga?', 'keywords' => ['harga', 'penawaran', 'quotation', 'quote', 'tawar', 'biaya', 'price'],
             'a' => 'Isi formulir Permintaan Penawaran berisi komoditas, jumlah, dan tujuan pengiriman. Tim kami akan membalas dengan penawaran harga yang sesuai kebutuhan Anda.', 'link' => 'penawaran', 'link_label' => 'Ajukan Penawaran'],
            ['q' => 'Bagaimana cara menjalin kemitraan bisnis?', 'keywords' => ['kemitraan', 'mitra', 'partner', 'partnership', 'b2b', 'kerja sama', 'kerjasama', 'bergabung', 'inquiry'],
             'a' => 'Anda dapat mengirim Inquiry B2B melalui formulir kami. Cantumkan profil usaha, komoditas yang diminati, dan perkiraan volume agar tim kami dapat menindaklanjuti.', 'link' => 'b2b', 'link_label' => 'Ajukan Inquiry B2B'],
            ['q' => 'Apakah tersedia sampel produk?', 'keywords' => ['sampel', 'sample', 'contoh', 'coba'],
             'a' => 'Sampel tersedia atas permintaan untuk calon pembeli. Sebutkan komoditas dan tujuan Anda saat mengisi formulir inquiry atau penawaran.', 'link' => 'b2b', 'link_label' => 'Minta Sampel via Inquiry'],
            ['q' => 'Kapan musim panen?', 'keywords' => ['panen', 'musim', 'tanam', 'harvest', 'kalender'],
             'a' => 'Jadwal tanam dan panen berbeda tiap komoditas. Kami merangkum kalender indikatif dan tips budidaya di halaman Informasi Tanaman & Panen.', 'link' => 'panen', 'link_label' => 'Lihat Informasi Panen'],
            ['q' => 'Bagaimana kemasan produk?', 'keywords' => ['kemasan', 'packing', 'karung', 'jumbo', 'bag', 'kontainer'],
             'a' => 'Kemasan standar berupa karung atau jumbo bag. Untuk komoditas tertentu tersedia karton, krat, bale, atau curah sesuai kebutuhan pengiriman.', 'link' => 'spesifikasi', 'link_label' => 'Lihat Spesifikasi Produk'],
            ['q' => 'Bagaimana cara pembayaran?', 'keywords' => ['bayar', 'pembayaran', 'payment', 'termin', 'transfer', 'lc'],
             'a' => 'Skema pembayaran disepakati saat penawaran sesuai volume dan jenis transaksi. Tim kami akan menjelaskan opsi yang tersedia.', 'link' => 'penawaran', 'link_label' => 'Ajukan Penawaran'],
            ['q' => 'Bagaimana hubungan dengan petani lokal?', 'keywords' => ['petani', 'lokal', 'keberlanjutan', 'berkelanjutan', 'sustainable', 'kesejahteraan'],
             'a' => 'Kami bekerja sama dengan kelompok tani lokal melalui pola kemitraan yang adil, pendampingan budidaya, dan komitmen pada praktik berkelanjutan.', 'link' => 'panen', 'link_label' => 'Lihat Informasi Panen'],
            ['q' => 'Bagaimana cara menghubungi tim?', 'keywords' => ['kontak', 'hubungi', 'telepon', 'email', 'whatsapp', 'alamat', 'lokasi', 'jam'],
             'a' => 'Anda bisa menghubungi kami melalui WhatsApp, telepon +62 31 9876 5432, atau email sales@agroharvest.co.id pada Senin-Sabtu pukul 08:00-17:00.', 'link' => 'whatsapp', 'link_label' => 'Chat via WhatsApp'],
        ],
    ],

];
