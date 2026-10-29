<?php

/*
|--------------------------------------------------------------------------
| BlueLaundry — Template "laundry-baby-blue" (home-services / modern)
|--------------------------------------------------------------------------
| Semua konten statis template ada di file ini, jadi view (blade) tidak perlu
| diubah ketika tim backend mengganti data. Akses lewat:
|   config('template.home-services.modern.laundry-baby-blue.laundry')
|
| CATATAN: angka harga/estimasi di bawah adalah data contoh (placeholder)
| karena desain UI hanya menampilkan sebagian. Silakan sesuaikan.
*/

return [

    'brand' => [
        'name'    => 'BlueLaundry',
        'tagline' => 'Laundry & Care Service',
        'slogan'  => 'Laundry Modern',
        'slogan2' => 'Bersih, Cepat, & Terpercaya.',
    ],

    'contact' => [
        'address'    => 'Jl. Melati No.12, Surabaya',
        'hours_text' => 'Buka Setiap Hari 08:00 - 20:00',
        'phone'      => '+62 822-3456-7890',
        'email'      => 'info@bluelaundry.id',
        // format internasional tanpa "+" / spasi, dipakai untuk link wa.me
        'whatsapp'   => '6282234567890',
        'wa_greeting'=> 'Halo BlueLaundry, saya ingin bertanya tentang layanan laundry.',
    ],

    'social' => [
        ['key' => 'instagram', 'label' => 'Instagram', 'url' => '#'],
        ['key' => 'tiktok',    'label' => 'TikTok',    'url' => '#'],
        ['key' => 'youtube',   'label' => 'YouTube',   'url' => '#'],
    ],

    // folder aset relatif terhadap /public
    'assets' => [
        'css' => 'css/website-bisnis/template/home-services/modern/laundry-baby-blue',
        'js'  => 'js/website-bisnis/template/home-services/modern/laundry-baby-blue',
        'img' => 'images/website-bisnis/template/home-services/modern/laundry-baby-blue',
    ],

    // route name (di dalam group "webia.laundry-baby-blue.") => label navbar
    'nav' => [
        ['route' => 'home',       'label' => 'Beranda'],
        ['route' => 'layanan',    'label' => 'Layanan'],
        ['route' => 'harga',      'label' => 'Harga'],
        ['route' => 'pilihan',    'label' => 'Pilihan Layanan'],
        ['route' => 'estimasi',   'label' => 'Estimasi Waktu'],
        ['route' => 'area',       'label' => 'Area Layanan'],
        ['route' => 'cara-order', 'label' => 'Cara Order'],
        ['route' => 'jam',        'label' => 'Jam Operasional'],
    ],

    'hero' => [
        'eyebrow' => 'LAUNDRY SERVICE PROFESSIONAL',
        'title'   => ['Pakaian Bersih, Wangi,', 'Rapi &'],   // baris 1 & 2
        'title_em'=> 'Terawat',                              // kata bergaris bawah
        'text'    => 'Layanan laundry modern dengan perawatan maksimal, hasil bersih, wangi tahan lama, dan siap pakai.',
        'script'  => ['Laundry', 'Mudah', '& Praktis!'],
    ],

    /* ---------------- Laundry services ---------------- */
    'services' => [
        ['slug' => 'cuci-kering',  'name' => 'Cuci Kering',        'sub' => '(Regular)',  'img' => 'icon-cuci-kering.png',  'from' => 'Rp 6.000 / kg',
         'desc' => 'Dicuci bersih, dikeringkan, lalu dilipat rapi. Pilihan hemat untuk pakaian harian.', 'option' => 'Regular'],
        ['slug' => 'cuci-setrika', 'name' => 'Cuci Setrika',       'sub' => '(Express)',  'img' => 'icon-cuci-setrika.png', 'from' => 'Rp 12.000 / kg',
         'desc' => 'Cuci, setrika, dan kemas rapi dengan prioritas pengerjaan. Cocok saat butuh cepat.', 'option' => 'Express'],
        ['slug' => 'setrika-saja', 'name' => 'Setrika Saja',       'sub' => '',           'img' => 'icon-setrika-saja.png', 'from' => 'Rp 5.000 / kg',
         'desc' => 'Pakaian sudah bersih? Kami bantu setrika sampai licin, rapi, dan wangi.', 'option' => 'Regular'],
        ['slug' => 'bed-cover',    'name' => 'Bed Cover & Selimut','sub' => '',           'img' => 'icon-bed-cover.png',    'from' => 'Rp 35.000 / pcs',
         'desc' => 'Pencucian khusus ukuran besar, bersih sampai ke serat dan cepat kering.', 'option' => 'Regular'],
        ['slug' => 'bantal-guling','name' => 'Bantal & Guling',    'sub' => '',           'img' => 'icon-bantal-guling.png','from' => 'Rp 20.000 / pcs',
         'desc' => 'Higienis dan wangi, bantal kembali empuk tanpa bau apek.', 'option' => 'Regular'],
        ['slug' => 'boneka',       'name' => 'Boneka',             'sub' => '',           'img' => 'icon-boneka.png',       'from' => 'Rp 15.000 / pcs',
         'desc' => 'Dicuci lembut agar bulu tetap halus dan aman untuk si kecil.', 'option' => 'Premium Care'],
        ['slug' => 'sepatu',       'name' => 'Sepatu',             'sub' => '',           'img' => 'icon-sepatu.png',       'from' => 'Rp 30.000 / pasang',
         'desc' => 'Cuci dan perawatan sneakers, sepatu sekolah, dan sepatu harian.', 'option' => 'Premium Care'],
        ['slug' => 'gorden',       'name' => 'Gorden',             'sub' => '',           'img' => 'icon-gorden.png',       'from' => 'Rp 25.000 / lembar',
         'desc' => 'Gorden bersih, wangi, dan siap dipasang kembali tanpa kusut.', 'option' => 'Regular'],
    ],

    /* ---------------- Price list ---------------- */
    // icon = nama symbol di partials/icons.blade.php, preview = tampil di beranda
    'price_items' => [
        ['group' => 'Pakaian', 'rows' => [
            ['name' => 'Kemeja',          'price' => 'Rp 7.000',  'unit' => 'pcs', 'icon' => 'shirt',    'preview' => true],
            ['name' => 'Celana Panjang',  'price' => 'Rp 8.000',  'unit' => 'pcs', 'icon' => 'pants',    'preview' => true],
            ['name' => 'Kaos',            'price' => 'Rp 5.000',  'unit' => 'pcs', 'icon' => 'tee',      'preview' => true],
            ['name' => 'Jaket',           'price' => 'Rp 15.000', 'unit' => 'pcs', 'icon' => 'jacket',   'preview' => true],
            ['name' => 'Gamis / Dress',   'price' => 'Rp 15.000', 'unit' => 'pcs', 'icon' => 'shirt'],
            ['name' => 'Jas / Blazer',    'price' => 'Rp 25.000', 'unit' => 'pcs', 'icon' => 'jacket'],
        ]],
        ['group' => 'Perlengkapan Rumah', 'rows' => [
            ['name' => 'Bed Cover',       'price' => 'Rp 35.000', 'unit' => 'pcs', 'icon' => 'bedcover', 'preview' => true],
            ['name' => 'Selimut',         'price' => 'Rp 25.000', 'unit' => 'pcs', 'icon' => 'bedcover'],
            ['name' => 'Sprei',           'price' => 'Rp 15.000', 'unit' => 'pcs', 'icon' => 'bedcover'],
            ['name' => 'Handuk',          'price' => 'Rp 8.000',  'unit' => 'pcs', 'icon' => 'tee'],
            ['name' => 'Gorden',          'price' => 'Rp 25.000', 'unit' => 'lembar', 'icon' => 'bedcover'],
        ]],
        ['group' => 'Lainnya', 'rows' => [
            ['name' => 'Bantal / Guling', 'price' => 'Rp 20.000', 'unit' => 'pcs', 'icon' => 'bedcover'],
            ['name' => 'Boneka',          'price' => 'Rp 15.000', 'unit' => 'pcs', 'icon' => 'tag'],
            ['name' => 'Sepatu',          'price' => 'Rp 30.000', 'unit' => 'pasang', 'icon' => 'tag'],
        ]],
    ],

    'price_kg' => [
        ['name' => 'Cuci Kering (Regular)',     'price' => 'Rp 6.000',  'note' => 'Estimasi 2–3 hari'],
        ['name' => 'Cuci Setrika (Regular)',    'price' => 'Rp 8.000',  'note' => 'Estimasi 2–3 hari'],
        ['name' => 'Cuci Setrika (Express)',    'price' => 'Rp 12.000', 'note' => 'Estimasi 6–12 jam'],
        ['name' => 'Setrika Saja',              'price' => 'Rp 5.000',  'note' => 'Estimasi 1–2 hari'],
        ['name' => 'Premium Care',              'price' => 'Rp 18.000', 'note' => 'Estimasi 1–2 hari'],
    ],

    'price_notes' => [
        'Minimal order laundry kiloan 3 kg.',
        'Layanan Express +50% dari harga Regular, Premium Care mengikuti jenis bahan.',
        'Harga sudah termasuk deterjen, pewangi, dan kemasan plastik.',
        'Harga dapat berubah sewaktu-waktu untuk bahan khusus. Konfirmasi lewat WhatsApp.',
    ],

    /* ---------------- Service options ---------------- */
    'options' => [
        ['key' => 'Regular',      'icon' => 'shirt',   'sub' => 'Hemat & berkualitas',
         'long' => 'Pilihan paling pas untuk kebutuhan laundry sehari-hari dengan hasil bersih dan wangi.',
         'features' => ['Deterjen & pewangi standar', 'Dilipat rapi dalam plastik', 'Estimasi 2–3 hari'],
         'price_note' => 'Harga dasar'],
        ['key' => 'Express',      'icon' => 'bolt',    'sub' => 'Lebih cepat & prioritas',
         'long' => 'Diproses lebih dulu agar pakaian siap digunakan dalam hitungan jam.',
         'features' => ['Antrian prioritas', 'Selesai dalam 6–12 jam', 'Cocok untuk kebutuhan mendadak'],
         'price_note' => '+50% dari harga Regular'],
        ['key' => 'Premium Care', 'icon' => 'crown',   'sub' => 'Perawatan khusus bahan premium',
         'long' => 'Penanganan ekstra hati-hati untuk bahan halus, jas, gaun, dan pakaian bernilai tinggi.',
         'features' => ['Deterjen lembut & pewangi premium', 'Penanganan manual bahan halus', 'Dikemas dengan hanger'],
         'price_note' => 'Mengikuti jenis bahan'],
    ],

    /* ---------------- Turnaround ---------------- */
    'turnaround' => [
        ['key' => 'Regular',      'icon' => 'hourglass', 'time' => '± 2–3 Hari',  'min_h' => 48, 'max_h' => 72],
        ['key' => 'Express',      'icon' => 'bolt',      'time' => '± 6–12 Jam',  'min_h' => 6,  'max_h' => 12],
        ['key' => 'Premium Care', 'icon' => 'crown',     'time' => '± 1–2 Hari',  'min_h' => 24, 'max_h' => 48],
    ],
    'turnaround_notes' => [
        'Estimasi dihitung sejak laundry diterima di outlet kami.',
        'Order masuk setelah pukul 17.00 dihitung mulai hari berikutnya untuk layanan Express.',
        'Bed cover, gorden, dan sepatu memerlukan waktu pengeringan tambahan.',
    ],

    /* ---------------- Coverage ---------------- */
    'areas' => [
        ['key' => 'pusat',   'name' => 'Surabaya Pusat',   'places' => 'Genteng, Tegalsari, Bubutan, Simokerto', 'fee' => 'Gratis antar-jemput', 'eta' => 'Dijemput ± 1 jam'],
        ['key' => 'timur',   'name' => 'Surabaya Timur',   'places' => 'Gubeng, Rungkut, Sukolilo, Tenggilis Mejoyo', 'fee' => 'Gratis min. order Rp 50.000', 'eta' => 'Dijemput ± 2 jam'],
        ['key' => 'barat',   'name' => 'Surabaya Barat',   'places' => 'Sambikerep, Lakarsantri, Benowo, Pakal', 'fee' => 'Gratis min. order Rp 75.000', 'eta' => 'Dijemput ± 3 jam'],
        ['key' => 'utara',   'name' => 'Surabaya Utara',   'places' => 'Kenjeran, Bulak, Pabean Cantian, Krembangan', 'fee' => 'Gratis min. order Rp 50.000', 'eta' => 'Dijemput ± 2 jam'],
        ['key' => 'selatan', 'name' => 'Surabaya Selatan', 'places' => 'Wonokromo, Wonocolo, Gayungan, Jambangan', 'fee' => 'Gratis min. order Rp 50.000', 'eta' => 'Dijemput ± 2 jam'],
    ],

    /* ---------------- Order steps ---------------- */
    'steps' => [
        ['icon' => 'cart',     'title' => 'Pilih Layanan',  'title2' => '& Isi Order',      'text' => 'Pilih jenis layanan dan isi data order lewat formulir atau WhatsApp.'],
        ['icon' => 'calendar', 'title' => 'Tentukan',       'title2' => 'Jadwal Jemput',    'text' => 'Atur tanggal, jam, dan alamat penjemputan yang paling nyaman untuk Anda.'],
        ['icon' => 'truck',    'title' => 'Tim Kami',       'title2' => 'Jemput Laundry',   'text' => 'Kurir kami datang menjemput, menimbang, dan mencatat laundry Anda.'],
        ['icon' => 'washer',   'title' => 'Proses Laundry', 'title2' => 'Sesuai Pilihan',   'text' => 'Laundry diproses sesuai pilihan layanan, lalu diantar kembali dalam keadaan rapi.'],
    ],

    /* ---------------- Operating hours ---------------- */
    'hours' => [
        'days'  => [
            ['day' => 'Senin',  'open' => '08:00', 'close' => '20:00'],
            ['day' => 'Selasa', 'open' => '08:00', 'close' => '20:00'],
            ['day' => 'Rabu',   'open' => '08:00', 'close' => '20:00'],
            ['day' => 'Kamis',  'open' => '08:00', 'close' => '20:00'],
            ['day' => 'Jumat',  'open' => '08:00', 'close' => '20:00'],
            ['day' => 'Sabtu',  'open' => '08:00', 'close' => '20:00'],
            ['day' => 'Minggu', 'open' => '08:00', 'close' => '20:00'],
        ],
        'range' => 'Senin – Minggu',
        'time'  => '08:00 – 20:00 WIB',
        'note'  => 'Kami siap melayani Anda setiap hari.',
        'notes' => [
            'Penjemputan dan pengantaran dilakukan selama jam operasional.',
            'Order lewat WhatsApp di luar jam operasional dibalas pada jam buka berikutnya.',
        ],
    ],

    /* ---------------- Order inquiry ---------------- */
    'inquiry_services' => ['Cuci Kering (Regular)', 'Cuci Setrika (Express)', 'Setrika Saja', 'Bed Cover & Selimut', 'Bantal & Guling', 'Boneka', 'Sepatu', 'Gorden', 'Premium Care'],

    /* ---------------- AI chatbot (FAQ harga & proses laundry) ---------------- */
    'chatbot' => [
        'name'     => 'AI Laundry Assistant',
        'sub'      => 'Tanya seputar harga, layanan, atau proses laundry yuk!',
        'greeting' => 'Halo! Saya AI Laundry Assistant BlueLaundry. Tanya seputar harga, layanan, atau proses laundry ya!',
        'fallback' => 'Maaf, saya belum menemukan jawaban untuk itu. Coba pilih salah satu pertanyaan di bawah, atau hubungi tim kami lewat WhatsApp.',
        'quick'    => ['harga-kg', 'waktu', 'antar-jemput', 'bed-cover'],
    ],

    'faq' => [
        ['id' => 'harga-kg', 'q' => 'Berapa harga laundry per kg?',
         'a' => 'Cuci kering Regular mulai Rp 6.000/kg, cuci setrika Regular Rp 8.000/kg, cuci setrika Express Rp 12.000/kg, setrika saja Rp 5.000/kg, dan Premium Care Rp 18.000/kg. Minimal order 3 kg.',
         'keywords' => ['harga', 'per kg', 'kilo', 'kiloan', 'tarif', 'biaya', 'berapa kg', 'murah'], 'cta' => ['label' => 'Lihat Harga Lengkap', 'route' => 'harga']],
        ['id' => 'harga-item', 'q' => 'Berapa harga kemeja, jaket, atau bed cover?',
         'a' => 'Kemeja Rp 7.000, celana panjang Rp 8.000, kaos Rp 5.000, jaket Rp 15.000, dan bed cover Rp 35.000 per pcs. Daftar item lainnya ada di halaman Harga.',
         'keywords' => ['kemeja', 'celana', 'kaos', 'jaket', 'satuan', 'per item', 'per pcs', 'pcs', 'item'], 'cta' => ['label' => 'Lihat Harga per Item', 'route' => 'harga']],
        ['id' => 'waktu', 'q' => 'Berapa lama proses laundry?',
         'a' => 'Regular sekitar 2–3 hari, Express sekitar 6–12 jam, dan Premium Care sekitar 1–2 hari. Estimasi dihitung sejak laundry diterima di outlet.',
         'keywords' => ['lama', 'estimasi', 'selesai', 'jadi', 'berapa hari', 'berapa jam', 'proses', 'cepat', 'kilat'], 'cta' => ['label' => 'Hitung Estimasi', 'route' => 'estimasi']],
        ['id' => 'antar-jemput', 'q' => 'Apakah ada layanan antar-jemput?',
         'a' => 'Ada. Kami melayani antar-jemput gratis di 5 area Surabaya: Pusat, Timur, Barat, Utara, dan Selatan (syarat minimal order berlaku untuk beberapa area).',
         'keywords' => ['antar', 'jemput', 'antar-jemput', 'pickup', 'delivery', 'kurir', 'ongkir', 'area', 'wilayah', 'jangkauan'], 'cta' => ['label' => 'Cek Jangkauan Area', 'route' => 'area']],
        ['id' => 'bed-cover', 'q' => 'Bisa laundry bed cover & gorden?',
         'a' => 'Bisa. Bed cover dan selimut mulai Rp 35.000/pcs, gorden Rp 25.000/lembar. Waktu pengerjaan sedikit lebih lama karena butuh pengeringan tambahan.',
         'keywords' => ['bed cover', 'bedcover', 'gorden', 'selimut', 'sprei', 'bantal', 'guling', 'boneka', 'sepatu'], 'cta' => ['label' => 'Lihat Layanan', 'route' => 'layanan']],
        ['id' => 'cara-order', 'q' => 'Bagaimana cara order laundry?',
         'a' => '1) Pilih layanan dan isi order, 2) tentukan jadwal jemput, 3) tim kami menjemput laundry Anda, 4) laundry diproses sesuai pilihan lalu diantar kembali.',
         'keywords' => ['cara order', 'cara pesan', 'pesan', 'order', 'pesen', 'langkah', 'booking', 'daftar'], 'cta' => ['label' => 'Lihat Cara Order', 'route' => 'cara-order']],
        ['id' => 'jam', 'q' => 'Jam buka BlueLaundry kapan?',
         'a' => 'Kami buka setiap hari, Senin sampai Minggu, pukul 08:00 – 20:00 WIB.',
         'keywords' => ['jam', 'buka', 'tutup', 'operasional', 'libur', 'hari minggu'], 'cta' => ['label' => 'Jam Operasional', 'route' => 'jam']],
        ['id' => 'beda-layanan', 'q' => 'Apa beda Regular, Express, dan Premium Care?',
         'a' => 'Regular hemat dan selesai 2–3 hari. Express diprioritaskan dan selesai 6–12 jam (+50%). Premium Care untuk bahan halus/premium dengan penanganan khusus, selesai 1–2 hari.',
         'keywords' => ['beda', 'perbedaan', 'regular', 'express', 'premium', 'pilihan', 'jenis layanan'], 'cta' => ['label' => 'Pilihan Layanan', 'route' => 'pilihan']],
    ],

    /* ---------------- Footer ---------------- */
    'footer' => [
        'columns' => [
            ['title' => 'Navigasi', 'links' => [['Beranda', 'home'], ['Layanan', 'layanan'], ['Harga', 'harga'], ['Cara Order', 'cara-order']]],
            ['title' => 'Layanan',  'links' => [['Cuci Kering', 'layanan'], ['Cuci Setrika', 'layanan'], ['Express', 'pilihan'], ['Premium Care', 'pilihan']]],
            ['title' => 'Informasi','links' => [['Estimasi Waktu', 'estimasi'], ['Area Layanan', 'area'], ['Jam Operasional', 'jam'], ['FAQ', 'ai-chatbot']]],
            ['title' => 'Hubungi Kami', 'links' => [['Order Inquiry', 'order-inquiry'], ['AI Chatbot', 'ai-chatbot']]],
        ],
        'credit' => '© 2026 WEBIA by D-KREASI. Seluruh hak cipta dilindungi.',
    ],
];
