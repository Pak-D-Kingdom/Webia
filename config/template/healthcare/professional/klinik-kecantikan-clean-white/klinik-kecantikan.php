<?php

/**
 * Template : Klinik Kecantikan — GlowAesthetics (Professional / Clean White)
 * Lokasi   : config/template/healthcare/professional/klinik-kecantikan-clean-white/klinik-kecantikan.php
 * Key      : config('template.healthcare.professional.klinik-kecantikan-clean-white.klinik-kecantikan')
 *
 * Seluruh teks, kontak, layanan, dokter, jadwal, FAQ, dan kebijakan dibaca dari sini.
 * Data bersifat contoh (dummy) — cukup ganti isi file ini, Blade tidak perlu diubah.
 * Murni statis: tidak ada query database / controller.
 */
$base = 'website-bisnis/template/healthcare/professional/klinik-kecantikan-clean-white';

return [

    /* ------------------------------------------------------------------ */
    /* Path asset (relatif terhadap /public) */
    /* ------------------------------------------------------------------ */
    'paths' => [
        'css' => "css/{$base}/klinik-kecantikan.css",
        'js' => "js/{$base}/klinik-kecantikan.js",
        'images' => "images/{$base}",
    ],

    'meta' => [
        'description' => 'GlowAesthetics — klinik kecantikan dan aesthetic profesional dengan teknologi modern dan dokter ahli berpengalaman.',
    ],

    'brand' => [
        'name' => 'GlowAesthetics',
        'tagline' => 'Beauty & Aesthetic Clinic',
        'slogan' => 'Kulit Sehat, Hidup Lebih Percaya Diri',
    ],

    'contact' => [
        'phone' => '+62 895 6303 00345',
        'whatsapp' => '62895630300345', // 0895630300345 → format internasional tanpa + / spasi
        'email' => 'info@glowaesthetics.id',
        'address' => 'Jl. Melati No. 28, Jakarta Selatan',
        'hours' => 'Buka Setiap Hari 08:00 - 20:00',
        'hours_short' => 'Setiap hari, 08:00 - 20:00',
        'maps_link' => 'https://www.google.com/maps/search/?api=1&query=Jl.+Melati+No.+28+Jakarta+Selatan',
        'maps_embed' => 'https://www.google.com/maps?q=Jl.+Melati+No.+28+Jakarta+Selatan&output=embed',
    ],

    'social' => [
        ['label' => 'Instagram', 'icon' => 'instagram', 'url' => 'https://instagram.com/'],
        ['label' => 'Facebook',  'icon' => 'facebook',  'url' => 'https://facebook.com/'],
        ['label' => 'YouTube',   'icon' => 'youtube',   'url' => 'https://youtube.com/'],
        ['label' => 'TikTok',    'icon' => 'tiktok',    'url' => 'https://tiktok.com/'],
    ],

    /* ------------------------------------------------------------------ */
    /* Navigasi (Lokasi = anchor di beranda, tidak punya halaman sendiri) */
    /* ------------------------------------------------------------------ */
    'nav' => [
        ['label' => 'Beranda',        'route' => 'klinik-kecantikan.home',     'hash' => null],
        ['label' => 'Layanan',        'route' => 'klinik-kecantikan.services', 'hash' => null],
        ['label' => 'Dokter & Staff', 'route' => 'klinik-kecantikan.doctors',  'hash' => null],
        ['label' => 'Jadwal',         'route' => 'klinik-kecantikan.schedule', 'hash' => null],
        ['label' => 'FAQ',            'route' => 'klinik-kecantikan.faq',      'hash' => null],
        ['label' => 'Kebijakan',      'route' => 'klinik-kecantikan.policy',   'hash' => null],
    ],

    'footer_nav' => [
        'Navigasi' => [
            ['label' => 'Beranda',        'route' => 'klinik-kecantikan.home',     'hash' => null],
            ['label' => 'Layanan',        'route' => 'klinik-kecantikan.services', 'hash' => null],
            ['label' => 'Dokter & Staff', 'route' => 'klinik-kecantikan.doctors',  'hash' => null],
            ['label' => 'Jadwal',         'route' => 'klinik-kecantikan.schedule', 'hash' => null],
        ],
        'Informasi' => [
            ['label' => 'Lokasi',               'route' => 'klinik-kecantikan.home',   'hash' => 'lokasi'],
            ['label' => 'FAQ',                  'route' => 'klinik-kecantikan.faq',    'hash' => null],
            ['label' => 'Kebijakan Privasi',    'route' => 'klinik-kecantikan.policy', 'hash' => 'privasi'],
            ['label' => 'Syarat & Ketentuan',   'route' => 'klinik-kecantikan.policy', 'hash' => 'syarat-ketentuan'],
        ],
    ],

    'notifications' => [
        ['title' => 'Jam operasional', 'text' => 'Klinik buka setiap hari pukul 08:00 - 20:00.'],
        ['title' => 'Booking online',  'text' => 'Pilih dokter dan jam favorit Anda lewat halaman Appointment.'],
        ['title' => 'Konsultasi awal', 'text' => 'Tim kami siap membantu menentukan perawatan yang sesuai.'],
    ],

    /* ------------------------------------------------------------------ */
    /* Hero */
    /* ------------------------------------------------------------------ */
    'hero' => [
        'eyebrow' => 'Klinik Kecantikan & Aesthetic',
        'title' => ['Cantik Alami,', 'Percaya Diri Setiap Hari'],
        'text' => 'Perawatan kulit dan aesthetic profesional dengan teknologi modern dan ditangani oleh dokter ahli berpengalaman.',
        'image' => 'hero-skin.jpg',
        'alt' => 'Wanita dengan kulit sehat bercahaya di antara bunga teratai',
        'trust' => [
            ['icon' => 'user-round',   'label' => 'Dokter Berpengalaman'],
            ['icon' => 'settings',     'label' => 'Teknologi Modern'],
            ['icon' => 'shield-check', 'label' => 'Produk Original'],
            ['icon' => 'shield-check', 'label' => 'Keamanan Terjamin'],
        ],
    ],

    /* ------------------------------------------------------------------ */
    /* Layanan */
    /* ------------------------------------------------------------------ */
    'services' => [
        [
            'slug' => 'facial-treatment',
            'name' => 'Facial Treatment',
            'short' => 'Membersihkan & menyegarkan kulit',
            'image' => 'service-1.jpg',
            'desc' => 'Perawatan wajah untuk mengangkat kotoran, sel kulit mati, dan minyak berlebih agar kulit tampak bersih, lembap, dan segar.',
            'treatments' => ['Deep Cleansing Facial', 'Hydrating Facial', 'Brightening Facial', 'Chemical Peeling'],
            'price' => 'Mulai Rp 250.000',
            'duration' => '60 menit',
        ],
        [
            'slug' => 'anti-aging',
            'name' => 'Anti Aging',
            'short' => 'Mengurangi tanda penuaan dini',
            'image' => 'service-2.jpg',
            'desc' => 'Rangkaian perawatan untuk membantu menyamarkan garis halus dan kerutan serta menjaga kekenyalan kulit.',
            'treatments' => ['Konsultasi Anti Aging', 'Microneedling', 'Radiofrequency Lifting', 'Skin Tightening'],
            'price' => 'Mulai Rp 650.000',
            'duration' => '60 - 90 menit',
        ],
        [
            'slug' => 'acne-treatment',
            'name' => 'Acne Treatment',
            'short' => 'Merawat kulit berjerawat',
            'image' => 'service-3.jpg',
            'desc' => 'Penanganan jerawat dan bekasnya berdasarkan pemeriksaan kondisi kulit oleh dokter.',
            'treatments' => ['Acne Facial', 'Ekstraksi Komedo', 'Peeling Jerawat', 'Perawatan Bekas Jerawat'],
            'price' => 'Mulai Rp 300.000',
            'duration' => '45 - 60 menit',
        ],
        [
            'slug' => 'skin-booster',
            'name' => 'Skin Booster',
            'short' => 'Meningkatkan elastisitas & kelembapan kulit',
            'image' => 'service-4.jpg',
            'desc' => 'Nutrisi dan hidrasi intensif ke lapisan kulit untuk tampilan lebih kenyal, halus, dan bercahaya.',
            'treatments' => ['Hyaluronic Skin Booster', 'Polynucleotide Booster', 'Hydra Booster'],
            'price' => 'Mulai Rp 1.200.000',
            'duration' => '45 menit',
        ],
        [
            'slug' => 'laser-treatment',
            'name' => 'Laser Treatment',
            'short' => 'Mencerahkan & meratakan warna kulit',
            'image' => 'service-5.jpg',
            'desc' => 'Teknologi laser untuk membantu meratakan warna kulit, menyamarkan noda, dan memperbaiki tekstur.',
            'treatments' => ['Laser Toning', 'Laser Rejuvenation', 'Laser Bekas Jerawat', 'Laser Pigmentasi'],
            'price' => 'Mulai Rp 800.000',
            'duration' => '45 - 60 menit',
        ],
        [
            'slug' => 'body-contouring',
            'name' => 'Body Contouring',
            'short' => 'Membentuk tubuh lebih ideal',
            'image' => 'service-6.jpg',
            'desc' => 'Perawatan pembentukan tubuh non-bedah untuk membantu mengencangkan dan merapikan kontur tubuh.',
            'treatments' => ['Body Slimming', 'Cellulite Treatment', 'Body Shaping RF', 'Konsultasi Program Tubuh'],
            'price' => 'Mulai Rp 900.000',
            'duration' => '60 - 90 menit',
        ],
    ],

    /* ------------------------------------------------------------------ */
    /* Dokter & Staff */
    /* ------------------------------------------------------------------ */
    'doctors' => [
        [
            'id' => 'aulia',
            'name' => 'dr. Aulia Rahma, Sp.KK',
            'role' => 'Spesialis Kulit & Kelamin',
            'badge' => 'Dokter Spesialis',
            'photo' => 'doctor-1.jpg',
            'experience' => '10+ tahun pengalaman',
            'days' => 'Senin - Sabtu',
            'focus' => ['Acne & bekas jerawat', 'Anti aging', 'Laser'],
            'bio' => 'Berpengalaman menangani masalah kulit wajah dan perawatan laser dengan pendekatan yang aman dan personal.',
        ],
        [
            'id' => 'bima',
            'name' => 'dr. Bima Santosa, Sp.AK',
            'role' => 'Spesialis Aesthetic',
            'badge' => 'Dokter Spesialis',
            'photo' => 'doctor-2.jpg',
            'experience' => '8+ tahun pengalaman',
            'days' => 'Senin - Jumat',
            'focus' => ['Skin booster', 'Body contouring', 'Peremajaan kulit'],
            'bio' => 'Fokus pada tindakan aesthetic non-bedah untuk hasil yang natural dan proporsional.',
        ],
        [
            'id' => 'nadya',
            'name' => 'Nadya Putri',
            'role' => 'Aesthetic Nurse',
            'badge' => 'Perawat',
            'photo' => 'doctor-3.jpg',
            'experience' => '6+ tahun pengalaman',
            'days' => 'Senin - Sabtu',
            'focus' => ['Pendampingan tindakan', 'Perawatan pasca tindakan'],
            'bio' => 'Mendampingi dokter selama tindakan dan memberi arahan perawatan lanjutan di rumah.',
        ],
        [
            'id' => 'salsa',
            'name' => 'Salsa Febriani',
            'role' => 'Beauty Therapist',
            'badge' => 'Therapist',
            'photo' => 'doctor-4.jpg',
            'experience' => '5+ tahun pengalaman',
            'days' => 'Selasa - Minggu',
            'focus' => ['Facial treatment', 'Body treatment'],
            'bio' => 'Terampil dalam facial dan body treatment yang nyaman serta higienis.',
        ],
    ],

    /* ------------------------------------------------------------------ */
    /* Jadwal praktik — kunci 0 = Minggu … 6 = Sabtu */
    /* status: available | full */
    /* ------------------------------------------------------------------ */
    'weekdays' => ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'],
    'months' => ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'],

    'schedule' => [
        0 => [
            ['time' => '10:00 - 12:00', 'doctor' => 'salsa', 'status' => 'available'],
            ['time' => '13:00 - 15:00', 'doctor' => 'salsa', 'status' => 'available'],
        ],
        1 => [
            ['time' => '08:00 - 10:00', 'doctor' => 'aulia', 'status' => 'available'],
            ['time' => '10:00 - 12:00', 'doctor' => 'bima',  'status' => 'available'],
            ['time' => '13:00 - 15:00', 'doctor' => 'nadya', 'status' => 'available'],
            ['time' => '15:00 - 17:00', 'doctor' => 'aulia', 'status' => 'full'],
            ['time' => '17:00 - 19:00', 'doctor' => 'bima',  'status' => 'available'],
        ],
        2 => [
            ['time' => '08:00 - 10:00', 'doctor' => 'bima',  'status' => 'available'],
            ['time' => '10:00 - 12:00', 'doctor' => 'aulia', 'status' => 'available'],
            ['time' => '13:00 - 15:00', 'doctor' => 'salsa', 'status' => 'available'],
            ['time' => '15:00 - 17:00', 'doctor' => 'nadya', 'status' => 'available'],
            ['time' => '17:00 - 19:00', 'doctor' => 'aulia', 'status' => 'full'],
        ],
        3 => [
            ['time' => '08:00 - 10:00', 'doctor' => 'aulia', 'status' => 'available'],
            ['time' => '10:00 - 12:00', 'doctor' => 'nadya', 'status' => 'available'],
            ['time' => '13:00 - 15:00', 'doctor' => 'bima',  'status' => 'available'],
            ['time' => '15:00 - 17:00', 'doctor' => 'salsa', 'status' => 'available'],
        ],
        4 => [
            ['time' => '08:00 - 10:00', 'doctor' => 'bima',  'status' => 'available'],
            ['time' => '10:00 - 12:00', 'doctor' => 'aulia', 'status' => 'available'],
            ['time' => '13:00 - 15:00', 'doctor' => 'nadya', 'status' => 'full'],
            ['time' => '15:00 - 17:00', 'doctor' => 'aulia', 'status' => 'available'],
            ['time' => '17:00 - 19:00', 'doctor' => 'bima',  'status' => 'available'],
        ],
        5 => [
            ['time' => '08:00 - 10:00', 'doctor' => 'aulia', 'status' => 'available'],
            ['time' => '10:00 - 12:00', 'doctor' => 'bima',  'status' => 'full'],
            ['time' => '13:00 - 15:00', 'doctor' => 'nadya', 'status' => 'available'],
            ['time' => '15:00 - 17:00', 'doctor' => 'salsa', 'status' => 'available'],
        ],
        6 => [
            ['time' => '09:00 - 11:00', 'doctor' => 'aulia', 'status' => 'available'],
            ['time' => '11:00 - 13:00', 'doctor' => 'nadya', 'status' => 'available'],
            ['time' => '13:00 - 15:00', 'doctor' => 'salsa', 'status' => 'available'],
            ['time' => '15:00 - 17:00', 'doctor' => 'aulia', 'status' => 'available'],
        ],
    ],

    /* ------------------------------------------------------------------ */
    /* Appointment */
    /* ------------------------------------------------------------------ */
    'appointment' => [
        'times' => ['08:00', '09:00', '10:00', '11:00', '13:00', '14:00', '15:00', '16:00', '17:00', '18:00'],
        'benefits' => [
            'Konsultasi awal untuk menentukan perawatan yang tepat',
            'Pilih dokter dan jam sesuai jadwal Anda',
            'Konfirmasi cepat melalui WhatsApp',
        ],
        'steps' => [
            ['title' => 'Isi formulir',         'text' => 'Lengkapi data diri, layanan, dokter, serta tanggal dan jam yang diinginkan.'],
            ['title' => 'Kirim via WhatsApp',   'text' => 'Data Anda diteruskan ke admin klinik melalui WhatsApp.'],
            ['title' => 'Terima konfirmasi',    'text' => 'Admin mengonfirmasi jadwal dan menjelaskan persiapan sebelum datang.'],
        ],
    ],

    /* ------------------------------------------------------------------ */
    /* FAQ */
    /* ------------------------------------------------------------------ */
    'faqs' => [
        ['q' => 'Bagaimana cara membuat janji temu?',
            'a' => 'Buka halaman Appointment, isi formulir, lalu kirim. Data Anda akan diteruskan ke admin klinik melalui WhatsApp untuk dikonfirmasi.'],
        ['q' => 'Apakah perlu konsultasi sebelum melakukan perawatan?',
            'a' => 'Ya. Konsultasi awal membantu dokter menilai kondisi kulit dan menentukan perawatan yang paling sesuai dan aman untuk Anda.'],
        ['q' => 'Berapa lama durasi satu kali perawatan?',
            'a' => 'Durasi bervariasi, umumnya 45 - 90 menit tergantung jenis perawatan. Detail durasi tersedia di halaman Layanan.'],
        ['q' => 'Apakah perawatan di GlowAesthetics aman?',
            'a' => 'Seluruh tindakan dilakukan oleh dokter dan tenaga terlatih dengan produk original serta prosedur kebersihan yang ketat.'],
        ['q' => 'Apakah saya bisa mengubah atau membatalkan jadwal?',
            'a' => 'Bisa. Hubungi admin melalui WhatsApp minimal 24 jam sebelum jadwal agar slot dapat diberikan kepada pasien lain.'],
        ['q' => 'Metode pembayaran apa yang tersedia?',
            'a' => 'Pembayaran dapat dilakukan di klinik melalui tunai, transfer bank, atau kartu debit/kredit.'],
        ['q' => 'Apakah ada efek samping setelah perawatan?',
            'a' => 'Sebagian perawatan dapat menimbulkan kemerahan ringan yang biasanya mereda dalam waktu singkat. Dokter akan menjelaskan risiko dan perawatan lanjutan sebelum tindakan.'],
        ['q' => 'Bagaimana jika saya datang terlambat?',
            'a' => 'Mohon datang 10 - 15 menit lebih awal. Keterlambatan dapat memengaruhi durasi perawatan atau memerlukan penjadwalan ulang.'],
    ],

    /* ------------------------------------------------------------------ */
    /* Kebijakan */
    /* ------------------------------------------------------------------ */
    'policies' => [
        [
            'slug' => 'privasi',
            'icon' => 'lock',
            'title' => 'Kebijakan Privasi',
            'short' => 'Cara kami mengumpulkan, menggunakan, dan melindungi data pribadi Anda.',
            'items' => [
                'Data yang kami kumpulkan hanya mencakup informasi yang Anda berikan saat membuat janji, seperti nama, nomor kontak, dan keluhan.',
                'Data digunakan untuk keperluan penjadwalan, konsultasi, dan pelayanan klinik.',
                'Kami tidak menjual atau membagikan data pribadi Anda kepada pihak ketiga tanpa persetujuan.',
                'Anda dapat meminta perubahan atau penghapusan data melalui kontak resmi klinik.',
            ],
        ],
        [
            'slug' => 'syarat-ketentuan',
            'icon' => 'file-text',
            'title' => 'Syarat & Ketentuan',
            'short' => 'Ketentuan penggunaan layanan dan website GlowAesthetics.',
            'items' => [
                'Informasi di website bersifat umum dan bukan pengganti pemeriksaan atau diagnosis dokter.',
                'Hasil perawatan dapat berbeda pada setiap orang tergantung kondisi kulit dan kepatuhan perawatan.',
                'Tindakan medis hanya dilakukan setelah konsultasi dan persetujuan pasien.',
                'Harga dan ketersediaan layanan dapat berubah sewaktu-waktu.',
            ],
        ],
        [
            'slug' => 'pembatalan',
            'icon' => 'refresh',
            'title' => 'Pembatalan & Jadwal Ulang',
            'short' => 'Aturan perubahan dan pembatalan janji temu.',
            'items' => [
                'Perubahan atau pembatalan jadwal diinformasikan minimal 24 jam sebelum waktu janji.',
                'Pembatalan mendadak dapat memengaruhi ketersediaan slot berikutnya.',
                'Keterlambatan lebih dari 15 menit dapat membuat jadwal perlu diatur ulang.',
                'Jadwal ulang dapat dilakukan melalui WhatsApp resmi klinik.',
            ],
        ],
        [
            'slug' => 'keamanan',
            'icon' => 'shield-check',
            'title' => 'Keamanan & Keselamatan',
            'short' => 'Standar kebersihan, produk, dan keselamatan pasien.',
            'items' => [
                'Alat dan ruang tindakan disterilkan sesuai prosedur klinik.',
                'Produk yang digunakan adalah produk original dan terdaftar.',
                'Setiap tindakan didahului penilaian kondisi kulit dan riwayat kesehatan.',
                'Pasien mendapat arahan perawatan lanjutan setelah tindakan.',
            ],
        ],
    ],

    /* ------------------------------------------------------------------ */
    /* AI Information Assistant (rule-based, statis, tanpa backend) */
    /* ------------------------------------------------------------------ */
    'assistant' => [
        'name' => 'AI - Beauty Assistant',
        'subtitle' => 'Siap membantu pertanyaan seputar perawatan, layanan, jadwal, dan informasi klinik.',
        'greeting' => 'Halo! 👋 Ada yang bisa saya bantu hari ini?',
        'placeholder' => 'Tulis pertanyaanmu...',
        'disclaimer' => 'Informasi umum, bukan pengganti konsultasi dokter.',
        'avatar' => 'chat-avatar.jpg',
        'mascot' => 'assistant-mascot.jpg',
        'chips' => [
            ['icon' => 'tag',      'label' => 'Info layanan & harga', 'intent' => 'services'],
            ['icon' => 'sparkles', 'label' => 'Tips perawatan kulit', 'intent' => 'tips'],
            ['icon' => 'calendar', 'label' => 'Jadwal dokter',        'intent' => 'schedule'],
            ['icon' => 'map-pin',  'label' => 'Lokasi klinik',        'intent' => 'location'],
        ],
        // Baris tombol bulat di bagian bawah panel (sesuai desain UI)
        'shortcuts' => [
            ['icon' => 'clock',    'label' => 'Jam operasional', 'intent' => 'hours'],
            ['icon' => 'droplet',  'label' => 'Produk original', 'intent' => 'products'],
            ['icon' => 'book',     'label' => 'FAQ',             'intent' => 'faq'],
            ['icon' => 'calendar', 'label' => 'Booking',         'intent' => 'booking'],
            ['icon' => 'heart',    'label' => 'Kebijakan',       'intent' => 'policy'],
            ['icon' => 'lotus',    'label' => 'Layanan',         'intent' => 'services'],
            ['icon' => 'user-round', 'label' => 'Dokter',         'intent' => 'doctors'],
        ],
        'tips' => [
            'Bersihkan wajah 2x sehari dengan pembersih yang lembut.',
            'Gunakan pelembap sesuai jenis kulit, pagi dan malam.',
            'Pakai tabir surya SPF 30+ setiap pagi dan ulangi bila beraktivitas di luar ruangan.',
            'Hindari memencet jerawat dan tidur cukup agar kulit pulih optimal.',
        ],
    ],
];
