<?php

/*
|--------------------------------------------------------------------------
| FreshWash - Laundry Classic Trust (home-services / professional)
|--------------------------------------------------------------------------
| Semua konten (teks, harga, area, jam, FAQ chatbot) ada di sini agar
| mudah diganti / disambungkan ke backend nanti. View hanya membaca config ini:
|   config('template.home-services.professional.laundry-classic-trust.laundry')
| Harga & area di bawah adalah DATA CONTOH.
*/

return [

    'brand' => [
        'name'    => 'FreshWash',
        'tagline' => 'Clean Clothes, Happy Life',
        'logo'    => 'logo.svg',
    ],

    'contact' => [
        'address'   => 'Jl. Melati No. 12, Surabaya',
        'phone'     => '+62 812 3456 7890',
        'phone_tel' => '+6281234567890',
        'email'     => 'hello@freshwash.id',
        'hours'     => 'Sen - Min 08.00 - 20.00',
    ],

    // Nomor tujuan semua form & chatbot (format internasional tanpa + / spasi)
    'whatsapp' => [
        'number'  => '62895630300345',
        'default' => 'Halo FreshWash, saya ingin bertanya tentang layanan laundry.',
    ],

    'social' => [
        ['icon' => 'instagram', 'label' => 'Instagram', 'url' => '#'],
        ['icon' => 'facebook',  'label' => 'Facebook',  'url' => '#'],
        ['icon' => 'youtube',   'label' => 'YouTube',   'url' => '#'],
        ['icon' => 'tiktok',    'label' => 'TikTok',    'url' => '#'],
    ],

    // key = nama route (prefix "laundry-classic-trust."), sama dengan $page di tiap halaman
    'nav' => [
        ['key' => 'home',         'label' => 'Home'],
        ['key' => 'services',     'label' => 'Laundry Services'],
        ['key' => 'prices',       'label' => 'Price List'],
        ['key' => 'options',      'label' => 'Service Options', 'children' => [
            ['key' => 'options',    'label' => 'Service Options',            'icon' => 'spark', 'desc' => 'Layanan tambahan untuk hasil lebih maksimal'],
            ['key' => 'turnaround', 'label' => 'Estimasi Waktu Pengerjaan', 'icon' => 'timer', 'desc' => 'Perkiraan lama proses tiap layanan'],
        ]],
        ['key' => 'coverage',     'label' => 'Coverage'],
        ['key' => 'instructions', 'label' => 'Instructions'],
        ['key' => 'hours',        'label' => 'Operating Hours'],
        ['key' => 'contact',      'label' => 'Contact'],
    ],

    'hero' => [
        'eyebrow' => 'Professional Laundry Service',
        'title'   => 'Pakaian Bersih, Hidup Lebih Mudah',
        'text'    => 'Layanan laundry profesional dengan hasil bersih, rapi, dan wangi. Kami menjaga kualitas pakaian Anda dengan sepenuh hati.',
        'script'  => 'Fresh Clothes Happy Days',
        'quote'   => 'Laundry Bukan Sekadar Bersih, Tapi Juga Tentang Perawatan',
        'badges'  => [
            ['icon' => 'shield', 'text' => 'Bersih Maksimal'],
            ['icon' => 'shirt',  'text' => 'Aman untuk Semua Jenis Kain'],
            ['icon' => 'spark',  'text' => 'Wangi Tahan Lama'],
            ['icon' => 'bolt',   'text' => 'Pelayanan Cepat & Terpercaya'],
        ],
    ],

    'services' => [
        ['slug' => 'dry-clean', 'icon' => 'dryclean', 'name' => 'Cuci Kering', 'variant' => 'Dry Clean', 'from' => 'Rp 25.000 / item', 'time' => '2 - 3 hari',
         'desc' => 'Perawatan tanpa air untuk jas, gaun, blazer, dan kain halus yang mudah rusak.',
         'features' => ['Pelarut khusus aman untuk kain sensitif', 'Pengecekan noda sebelum proses', 'Dikemas dengan hanger & plastik']],
        ['slug' => 'regular', 'icon' => 'iron', 'name' => 'Cuci Setrika', 'variant' => 'Regular', 'from' => 'Rp 8.000 / kg', 'time' => '1 - 2 hari',
         'desc' => 'Layanan harian lengkap: cuci, kering, setrika, dan lipat rapi untuk pakaian sehari-hari.',
         'features' => ['Cuci terpisah putih & berwarna', 'Setrika uap rapi', 'Dilipat dan dikemas bersih']],
        ['slug' => 'express', 'icon' => 'timer', 'name' => 'Cuci Express', 'variant' => '3 Jam', 'from' => 'Rp 12.000 / kg', 'time' => '3 - 6 jam',
         'desc' => 'Butuh cepat? Pakaian Anda selesai dalam hitungan jam tanpa mengurangi kualitas.',
         'features' => ['Antrean prioritas', 'Cocok untuk kebutuhan mendadak', 'Tersedia antar-jemput cepat']],
        ['slug' => 'premium', 'icon' => 'premium', 'name' => 'Cuci Premium', 'variant' => 'Deluxe', 'from' => 'Rp 15.000 / kg', 'time' => '1 - 2 hari',
         'desc' => 'Perawatan terbaik dengan deterjen khusus, pelembut premium, dan pengecekan satu per satu.',
         'features' => ['Deterjen & pelembut premium', 'Pengecekan manual tiap pakaian', 'Parfum tahan lama']],
        ['slug' => 'bedding', 'icon' => 'bed', 'name' => 'Laundry Bed', 'variant' => '& Blanket', 'from' => 'Rp 25.000 / pcs', 'time' => '2 - 3 hari',
         'desc' => 'Cuci seprai, bed cover, selimut, dan bantal hingga bersih, lembut, dan higienis.',
         'features' => ['Mesin kapasitas besar', 'Pengeringan menyeluruh', 'Bebas tungau & bau apek']],
    ],

    'prices' => [
        'item' => [
            ['icon' => 'shirt',   'name' => 'Kemeja',         'price' => 15000],
            ['icon' => 'tshirt',  'name' => 'Kaos',           'price' => 12000],
            ['icon' => 'pants',   'name' => 'Celana Panjang', 'price' => 18000],
            ['icon' => 'jacket',  'name' => 'Jaket',          'price' => 25000],
            ['icon' => 'dress',   'name' => 'Dress',          'price' => 30000],
            ['icon' => 'jacket',  'name' => 'Blazer',         'price' => 35000],
            ['icon' => 'dress',   'name' => 'Rok',            'price' => 15000],
            ['icon' => 'suit',    'name' => 'Jas (2 pcs)',    'price' => 45000],
            ['icon' => 'bed',     'name' => 'Selimut',        'price' => 40000],
            ['icon' => 'bed',     'name' => 'Sprei',          'price' => 25000],
        ],
        'kg' => [
            ['icon' => 'basket', 'name' => 'Cuci Lipat',            'price' => 6000],
            ['icon' => 'iron',   'name' => 'Cuci Setrika (Regular)', 'price' => 8000],
            ['icon' => 'timer',  'name' => 'Cuci Express (3 Jam)',  'price' => 12000],
            ['icon' => 'premium','name' => 'Cuci Premium (Deluxe)', 'price' => 15000],
            ['icon' => 'iron',   'name' => 'Setrika Saja',          'price' => 5000],
        ],
        'note' => 'Harga dapat berbeda untuk bahan khusus (sutra, beludru, kulit). Tim kami akan mengonfirmasi sebelum pengerjaan.',
    ],

    'options' => [
        ['icon' => 'perfume', 'name' => 'Pengharum Premium', 'price' => 3000,  'desc' => 'Parfum laundry lembut dengan aroma tahan hingga berhari-hari.'],
        ['icon' => 'leaf',    'name' => 'Pewangi Organik',   'price' => 5000,  'desc' => 'Bahan alami, aman untuk kulit sensitif dan pakaian bayi.'],
        ['icon' => 'vacuum',  'name' => 'Packing Vakum',     'price' => 5000,  'desc' => 'Pakaian dikemas vakum agar hemat tempat dan tetap higienis.'],
        ['icon' => 'care',    'name' => 'Perawatan Khusus',  'price' => 10000, 'desc' => 'Penanganan noda membandel dan kain istimewa oleh tenaga ahli.'],
    ],

    'turnaround' => [
        ['icon' => 'calendar', 'name' => 'Reguler',       'time' => '1 - 2 hari', 'bar' => 50, 'desc' => 'Untuk cucian harian. Pakaian diterima pagi, selesai maksimal 2 hari.'],
        ['icon' => 'timer',    'name' => 'Express',       'time' => '3 - 6 jam',  'bar' => 22, 'desc' => 'Pesanan masuk sebelum pukul 14.00 selesai di hari yang sama.'],
        ['icon' => 'shield',   'name' => 'Premium',       'time' => '1 - 2 hari', 'bar' => 50, 'desc' => 'Pengerjaan lebih teliti dengan pengecekan manual tiap pakaian.'],
        ['icon' => 'bed',      'name' => 'Bed & Blanket', 'time' => '2 - 3 hari', 'bar' => 75, 'desc' => 'Butuh waktu pengeringan ekstra agar bersih, lembut, dan tidak lembap.'],
    ],

    // x / y = posisi pin pada peta (persen)
    'areas' => [
        ['name' => 'Surabaya',  'x' => 46, 'y' => 40, 'fee' => 'Gratis min. Rp 50.000', 'eta' => '1 - 3 jam',  'note' => 'Seluruh kecamatan'],
        ['name' => 'Sidoarjo',  'x' => 52, 'y' => 70, 'fee' => 'Rp 8.000',               'eta' => '2 - 4 jam',  'note' => 'Sekitar Waru, Gedangan, Taman'],
        ['name' => 'Gresik',    'x' => 22, 'y' => 24, 'fee' => 'Rp 10.000',              'eta' => '3 - 5 jam',  'note' => 'Kota Gresik & Kebomas'],
        ['name' => 'Mojokerto', 'x' => 74, 'y' => 78, 'fee' => 'Rp 15.000',              'eta' => 'Setengah hari', 'note' => 'Kota Mojokerto'],
    ],

    'steps' => [
        ['icon' => 'list',   'title' => 'Pilih Layanan',  'text' => 'Tentukan jenis layanan yang Anda butuhkan.',        'detail' => 'Pilih layanan sesuai kebutuhan: dry clean, regular, express, premium, atau bed & blanket. Tambahkan service option bila perlu.'],
        ['icon' => 'form',   'title' => 'Isi Form',       'text' => 'Lengkapi data dan alamat penjemputan.',             'detail' => 'Isi nama, nomor WhatsApp, area, alamat jemput, dan catatan khusus pada form pemesanan. Pesan Anda terkirim ke WhatsApp kami.'],
        ['icon' => 'search', 'title' => 'Konfirmasi',     'text' => 'Tim kami akan segera menghubungi.',                 'detail' => 'Admin mengonfirmasi jadwal jemput, estimasi biaya, dan waktu selesai. Kurir datang sesuai jadwal yang disepakati.'],
        ['icon' => 'washer', 'title' => 'Laundry Proses',  'text' => 'Pakaian Anda kami proses dengan hati-hati.',        'detail' => 'Pakaian ditimbang, dipilah, dicuci, dikeringkan, disetrika, dan diperiksa kualitasnya satu per satu.'],
        ['icon' => 'bag',    'title' => 'Selesai',        'text' => 'Pakaian bersih & rapi siap diantar.',               'detail' => 'Pakaian dikemas rapi lalu diantar ke alamat Anda. Pembayaran dapat dilakukan saat pakaian diterima.'],
    ],

    'hours' => [
        'open'  => '08.00',
        'close' => '20.00',
        'days'  => [
            ['day' => 'Senin',  'dow' => 1], ['day' => 'Selasa', 'dow' => 2], ['day' => 'Rabu', 'dow' => 3],
            ['day' => 'Kamis',  'dow' => 4], ['day' => 'Jumat',  'dow' => 5], ['day' => 'Sabtu', 'dow' => 6],
            ['day' => 'Minggu', 'dow' => 0],
        ],
        'note' => 'Termasuk hari libur nasional (dengan penyesuaian)',
    ],

    'chatbot' => [
        'name'     => 'FreshBot',
        'greeting' => 'Halo! Aku FreshBot, si asisten laundry kamu! Mau tanya harga atau proses laundry?',
        'topics'   => ['Harga layanan', 'Proses laundry', 'Estimasi waktu', 'Dan lainnya...'],
        'chips'    => ['Berapa harga cuci per kg?', 'Berapa lama proses laundry?', 'Apakah bisa jemput antar?', 'Apa saja layanan yang tersedia?'],
        'fallback' => 'Maaf, aku belum punya jawaban untuk itu. Tanyakan langsung ke tim kami lewat WhatsApp ya!',
        'faq' => [
            ['k' => ['harga', 'kg', 'kilo', 'tarif', 'biaya'], 'a' => 'Cuci setrika regular Rp 8.000/kg, express (3 jam) Rp 12.000/kg, premium Rp 15.000/kg, dan cuci lipat Rp 6.000/kg. Lihat daftar lengkap di halaman Price List.'],
            ['k' => ['satuan', 'item', 'kemeja', 'jaket', 'dress', 'jas'], 'a' => 'Harga per item: kemeja Rp 15.000, kaos Rp 12.000, celana panjang Rp 18.000, jaket Rp 25.000, dress Rp 30.000.'],
            ['k' => ['lama', 'estimasi', 'waktu', 'selesai', 'berapa hari', 'jam'], 'a' => 'Reguler 1-2 hari, express 3-6 jam, premium 1-2 hari, dan bed & blanket 2-3 hari.'],
            ['k' => ['jemput', 'antar', 'pickup', 'delivery', 'area', 'wilayah'], 'a' => 'Bisa! Kami melayani jemput & antar di Surabaya, Sidoarjo, Gresik, dan Mojokerto. Gratis ongkir di Surabaya untuk minimal order Rp 50.000.'],
            ['k' => ['layanan', 'tersedia', 'jenis'], 'a' => 'Layanan kami: Cuci Kering (Dry Clean), Cuci Setrika, Cuci Express, Cuci Premium, dan Laundry Bed & Blanket.'],
            ['k' => ['proses', 'tahap', 'cara', 'pesan', 'order'], 'a' => 'Caranya mudah: pilih layanan, isi form, tunggu konfirmasi tim kami, pakaian diproses, lalu diantar kembali dalam keadaan bersih & rapi.'],
            ['k' => ['buka', 'jam', 'operasional', 'tutup'], 'a' => 'Kami buka setiap hari pukul 08.00 - 20.00, termasuk hari libur nasional (dengan penyesuaian).'],
            ['k' => ['wangi', 'parfum', 'pewangi', 'vakum', 'tambahan', 'option'], 'a' => 'Service option: pengharum premium +Rp 3.000, pewangi organik +Rp 5.000, packing vakum +Rp 5.000, perawatan khusus +Rp 10.000.'],
        ],
    ],

    'credit' => '© 2026 WEBIA by D-KREASI. Seluruh hak cipta dilindungi.',
];
