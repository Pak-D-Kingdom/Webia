<?php

/**
 * GlowClinic — Luxury / Champagne Glow
 * Template : healthcare\luxury\klinik-kecantikan-champagne-glow
 *
 * Semua teks, kontak, jadwal, layanan, dokter, FAQ, dan kebijakan dikumpulkan di sini
 * supaya Blade tetap bersih dan tim backend cukup mengganti sumber data
 * (config -> database/API) tanpa menyentuh markup.
 *
 * Akses: config('template.healthcare.luxury.klinik-kecantikan-champagne-glow.klinik-kecantikan')
 */

return [

    'brand' => [
        'name' => 'GlowClinic',
        'tagline' => 'Aesthetic & Beauty Clinic',
        'description' => 'Klinik kecantikan premium dengan teknologi modern dan dokter berpengalaman untuk hasil yang aman, natural, dan tahan lama.',
    ],

    'meta' => [
        'title' => 'GlowClinic — Aesthetic & Beauty Clinic',
        'description' => 'Perawatan kulit, wajah, dan tubuh dengan teknologi modern oleh dokter berpengalaman. Booking appointment di GlowClinic.',
    ],

    'contact' => [
        'address' => 'Jl. Melati No. 12, Jakarta Selatan',
        'phone' => '+62 812 3456 7890',
        'phone_raw' => '+6281234567890',
        'email' => 'info@glowclinic.id',
        // Nomor tujuan WhatsApp (format internasional, tanpa "+" dan tanpa "0" di depan).
        'whatsapp' => '62895630300345',
        'whatsapp_greeting' => 'Halo GlowClinic, saya ingin bertanya tentang perawatan.',
    ],

    'topbar' => [
        'tagline' => 'Kecantikan Sehat, Percaya Diri Setiap Hari',
    ],

    'social' => [
        ['label' => 'Instagram', 'icon' => 'bi-instagram', 'url' => '#'],
        ['label' => 'TikTok',    'icon' => 'bi-tiktok',    'url' => '#'],
        ['label' => 'YouTube',   'icon' => 'bi-youtube',   'url' => '#'],
    ],

    /*
     |--------------------------------------------------------------------------
     | Navigasi
     |--------------------------------------------------------------------------
     | route  : nama route (lihat routes/web.php)
     | anchor : opsional, dipakai "Location" karena hanya ada di beranda
     | in_navbar : false = tidak tampil di navbar (tetap ada di footer & pencarian)
     */
    'nav' => [
        ['key' => 'home',        'label' => 'Home',        'route' => 'glow.home'],
        ['key' => 'services',    'label' => 'Services',    'route' => 'glow.services'],
        ['key' => 'doctors',     'label' => 'Doctors',     'route' => 'glow.doctors'],
        ['key' => 'schedule',    'label' => 'Schedule',    'route' => 'glow.schedule'],
        ['key' => 'location',    'label' => 'Location',    'route' => 'glow.home', 'anchor' => 'location', 'in_navbar' => false],
        ['key' => 'appointment', 'label' => 'Appointment', 'route' => 'glow.appointment'],
        ['key' => 'faq',         'label' => 'FAQ',         'route' => 'glow.faq'],
    ],

    'hero' => [
        'eyebrow' => 'Premium Aesthetic Clinic',
        'title' => 'Your Beauty Journey Starts Here',
        'title_lines' => ['Your Beauty Journey', 'Starts Here'],
        'text' => 'Perawatan kulit, wajah, dan tubuh dengan teknologi modern dan ditangani oleh dokter berpengalaman untuk hasil yang aman, natural, dan tahan lama.',
        'script' => 'Healthy Skin Happy You',
        'badges' => [
            ['icon' => 'bi-patch-check',  'label' => 'Certified Doctors'],
            ['icon' => 'bi-cpu',          'label' => 'Modern Technology'],
            ['icon' => 'bi-shield-check', 'label' => 'Safe & Trusted Treatment'],
            ['icon' => 'bi-person-heart', 'label' => 'Personalized Care'],
        ],
        'facility' => [
            'title' => 'Modern Clinic Premium Experience',
            'text' => 'Rasakan kenyamanan dan pelayanan terbaik di klinik kami dengan fasilitas modern.',
            'cta' => 'Lihat Fasilitas',
        ],
    ],

    /*
     |--------------------------------------------------------------------------
     | Services  (icon = id <symbol> di partials/icons.blade.php)
     |--------------------------------------------------------------------------
     */
    'services' => [
        [
            'slug' => 'facial',
            'icon' => 'ic-facial',
            'title' => 'Facial Treatment',
            'short' => 'Membersihkan dan meremajakan kulit wajah.',
            'long' => 'Rangkaian facial yang disesuaikan dengan jenis dan kondisi kulit Anda, dari pembersihan mendalam hingga hidrasi dan pencerahan.',
            'items' => ['Deep Cleansing Facial', 'Hydrating Facial', 'Brightening Facial', 'Acne Care Facial'],
            'duration' => '60–90 menit',
        ],
        [
            'slug' => 'laser',
            'icon' => 'ic-laser',
            'title' => 'Laser Treatment',
            'short' => 'Mengatasi noda, bekas jerawat dan kulit tidak merata.',
            'long' => 'Perawatan laser dengan teknologi modern untuk membantu menyamarkan noda, bekas jerawat, dan tekstur kulit yang tidak merata.',
            'items' => ['Laser Toning', 'Acne Scar Laser', 'Pigmentation Laser', 'Hair Removal Laser'],
            'duration' => '30–60 menit',
        ],
        [
            'slug' => 'injectable',
            'icon' => 'ic-injectable',
            'title' => 'Injectable Treatment',
            'short' => 'Botox, filler, dan perawatan anti-aging.',
            'long' => 'Tindakan injectable oleh dokter untuk membantu menjaga kontur wajah dan tampilan kulit yang lebih segar, dilakukan setelah konsultasi.',
            'items' => ['Botox', 'Dermal Filler', 'Skin Booster', 'Polynucleotide'],
            'duration' => '30–45 menit',
        ],
        [
            'slug' => 'rejuvenation',
            'icon' => 'ic-rejuvenation',
            'title' => 'Skin Rejuvenation',
            'short' => 'Meningkatkan kekenyalan dan elastisitas kulit.',
            'long' => 'Perawatan peremajaan untuk membantu kulit tampak lebih kenyal, halus, dan bercahaya secara bertahap.',
            'items' => ['Microneedling', 'Chemical Peeling', 'PRP Therapy', 'Glow Infusion'],
            'duration' => '45–75 menit',
        ],
        [
            'slug' => 'body',
            'icon' => 'ic-body',
            'title' => 'Body Contouring',
            'short' => 'Membentuk tubuh ideal dengan teknologi modern.',
            'long' => 'Program pembentukan tubuh non-bedah yang dirancang sesuai target dan kondisi tubuh setelah evaluasi dokter.',
            'items' => ['Body Sculpting', 'Cellulite Care', 'Body Slimming', 'Skin Tightening'],
            'duration' => '45–90 menit',
        ],
        [
            'slug' => 'wellness',
            'icon' => 'ic-wellness',
            'title' => 'Wellness & Skincare',
            'short' => 'Perawatan lengkap untuk kesehatan kulit jangka panjang.',
            'long' => 'Konsultasi dan rekomendasi produk skincare yang tepat, ditambah perawatan pendukung untuk menjaga kesehatan kulit jangka panjang.',
            'items' => ['Konsultasi Kulit', 'Resep Skincare', 'Vitamin Infusion', 'Perawatan Pasca-Treatment'],
            'duration' => '30–60 menit',
        ],
    ],

    'doctors' => [
        [
            'slug' => 'amelia-putri', 'name' => 'Dr. Amelia Putri, Sp.KK', 'role' => 'Dokter Spesialis Kulit',
            'photo' => 'doctor-amelia.jpg',
            'focus' => ['Kesehatan kulit', 'Acne & scar', 'Laser'],
            'days' => [1, 3, 5, 6],
        ],
        [
            'slug' => 'raka-pratama', 'name' => 'dr. Raka Pratama, Sp.A', 'role' => 'Dokter Estetika',
            'photo' => 'doctor-raka.jpg',
            'focus' => ['Injectable', 'Kontur wajah', 'Body contouring'],
            'days' => [2, 4, 6],
        ],
        [
            'slug' => 'sari-wulandari', 'name' => 'Dr. Sari Wulandari', 'role' => 'Dokter Anti-Aging',
            'photo' => 'doctor-sari.jpg',
            'focus' => ['Anti-aging', 'Skin booster', 'Rejuvenation'],
            'days' => [1, 2, 4, 5],
        ],
        [
            'slug' => 'nina-larasati', 'name' => 'Nina Larasati, A.Md.Keb', 'role' => 'Esthetician & Therapist',
            'photo' => 'doctor-nina.jpg',
            'focus' => ['Facial', 'Body treatment', 'Relaksasi'],
            'days' => [1, 2, 3, 5, 6, 0],
        ],
        [
            'slug' => 'citra-dewi', 'name' => 'Citra Dewi', 'role' => 'Skincare Specialist',
            'photo' => 'doctor-citra.jpg',
            'focus' => ['Konsultasi skincare', 'Pasca-treatment', 'Edukasi'],
            'days' => [3, 4, 5, 6, 0],
        ],
    ],

    /*
     |--------------------------------------------------------------------------
     | Schedule
     |--------------------------------------------------------------------------
     | days       : indeks hari JS (0 = Minggu ... 6 = Sabtu), dipakai menandai "hari ini"
     | open/close : format 24 jam, zona waktu Asia/Jakarta
     | doctors.days (di atas) memakai indeks yang sama.
     */
    'schedule' => [
        'timezone' => 'Asia/Jakarta',
        'hours' => [
            ['label' => 'Senin - Jumat', 'days' => [1, 2, 3, 4, 5], 'open' => '09:00', 'close' => '20:00', 'icon' => 'bi-calendar-check'],
            ['label' => 'Sabtu',         'days' => [6],             'open' => '09:00', 'close' => '17:00', 'icon' => 'bi-calendar-event'],
            ['label' => 'Minggu',        'days' => [0],             'open' => '10:00', 'close' => '16:00', 'icon' => 'bi-calendar-heart'],
        ],
        // urutan tampilan Senin ... Minggu => [label, indeks hari JS]
        'weekdays' => [['Sen', 1], ['Sel', 2], ['Rab', 3], ['Kam', 4], ['Jum', 5], ['Sab', 6], ['Min', 0]],
        'note' => 'Jadwal dokter dapat berubah sewaktu-waktu. Konfirmasi ketersediaan lewat WhatsApp sebelum datang.',
    ],

    'location' => [
        'name' => 'GlowClinic',
        'address' => 'Jl. Melati No. 12, Jakarta Selatan',
        'maps_url' => 'https://www.google.com/maps/search/?api=1&query=Jl.+Melati+No.+12,+Jakarta+Selatan',
        // Isi dengan URL embed (https://www.google.com/maps?q=...&output=embed) bila ingin peta live.
        'embed_url' => '',
    ],

    'appointment' => [
        'time_slots' => ['09:00', '10:00', '11:00', '12:00', '13:00', '14:00', '15:00', '16:00', '17:00', '18:00', '19:00'],
        'note' => 'Permintaan booking dikonfirmasi tim kami melalui WhatsApp.',
    ],

    'faq' => [
        ['q' => 'Apakah aman untuk ibu hamil?', 'a' => 'Sebagian treatment tidak dianjurkan saat hamil atau menyusui. Beri tahu dokter tentang kondisi Anda sebelum treatment agar perawatan dapat disesuaikan atau ditunda.'],
        ['q' => 'Berapa lama hasil facial terlihat?', 'a' => 'Facial umumnya membuat kulit terasa lebih segar dan lembap segera setelah treatment. Hasil yang lebih nyata biasanya terlihat setelah beberapa sesi, tergantung kondisi kulit.'],
        ['q' => 'Apakah ada efek samping setelah treatment?', 'a' => 'Kemerahan ringan, sensasi hangat, atau kulit terasa sensitif bisa muncul sementara. Dokter akan menjelaskan risiko dan cara perawatan sebelum dan sesudah tindakan.'],
        ['q' => 'Bagaimana cara merawat kulit setelah treatment?', 'a' => 'Gunakan tabir surya, pelembap, dan produk yang dianjurkan dokter. Hindari paparan matahari langsung, scrub, dan produk keras selama beberapa hari.'],
        ['q' => 'Apakah perlu konsultasi sebelum treatment?', 'a' => 'Ya. Konsultasi membantu dokter menilai kondisi kulit, riwayat alergi, dan tujuan Anda sebelum menentukan treatment yang paling sesuai.'],
        ['q' => 'Bagaimana cara booking appointment?', 'a' => 'Isi formulir pada halaman Appointment atau hubungi kami lewat WhatsApp. Tim kami akan mengonfirmasi jadwal Anda.'],
        ['q' => 'Apakah bisa reschedule atau membatalkan janji?', 'a' => 'Bisa. Hubungi kami minimal 24 jam sebelum jadwal agar slot dapat dialihkan. Detailnya ada di Kebijakan Pembatalan.'],
        ['q' => 'Metode pembayaran apa yang tersedia?', 'a' => 'Kami menerima pembayaran tunai, transfer bank, dan kartu debit/kredit di klinik. Informasi biaya dijelaskan saat konsultasi.'],
    ],

    'policy' => [
        [
            'slug' => 'privasi', 'icon' => 'bi-shield-lock', 'title' => 'Kebijakan Privasi',
            'intro' => 'Kami menjaga data pribadi dan data kesehatan Anda dengan serius.',
            'points' => [
                'Data yang kami kumpulkan: nama, nomor telepon, email, dan informasi yang Anda berikan saat booking atau konsultasi.',
                'Data digunakan untuk mengatur jadwal, memberikan layanan, dan menghubungi Anda terkait perawatan.',
                'Kami tidak menjual data Anda kepada pihak ketiga.',
                'Data kesehatan hanya diakses oleh tenaga medis dan staf yang berwenang.',
                'Anda dapat meminta perubahan atau penghapusan data dengan menghubungi kami.',
            ],
        ],
        [
            'slug' => 'syarat', 'icon' => 'bi-file-earmark-text', 'title' => 'Syarat & Ketentuan',
            'intro' => 'Dengan menggunakan layanan kami, Anda menyetujui ketentuan berikut.',
            'points' => [
                'Treatment dilakukan setelah konsultasi dan persetujuan tindakan dari pasien.',
                'Pasien wajib memberikan informasi kesehatan, alergi, dan obat yang sedang dikonsumsi secara jujur.',
                'Hasil perawatan dapat berbeda pada setiap orang dan tidak bersifat garansi.',
                'Harga dan paket dapat berubah sewaktu-waktu sesuai informasi resmi klinik.',
                'Klinik berhak menunda atau menolak tindakan bila kondisi pasien tidak memenuhi syarat keamanan.',
            ],
        ],
        [
            'slug' => 'pembatalan', 'icon' => 'bi-calendar-x', 'title' => 'Kebijakan Pembatalan',
            'intro' => 'Agar jadwal tetap tertata untuk semua pasien.',
            'points' => [
                'Pembatalan atau perubahan jadwal dilakukan minimal 24 jam sebelum appointment.',
                'Keterlambatan lebih dari 15 menit dapat membuat jadwal disesuaikan ulang.',
                'Pembatalan mendadak berulang dapat memengaruhi prioritas booking berikutnya.',
                'Untuk reschedule, hubungi kami melalui WhatsApp atau telepon.',
            ],
        ],
    ],

    'assistant' => [
        'title' => 'AI Information Assistant',
        'subtitle' => 'Tanya apa saja tentang perawatan, produk, atau kondisi kulit kamu.',
        'greeting' => 'Halo! Aku GlowCat, asisten informasi GlowClinic. Mau tanya apa hari ini?',
        'teaser' => 'Tanya GlowCat seputar perawatan kulit',
        'placeholder' => 'Tulis pertanyaan Anda...',
        'disclaimer' => 'Informasi umum, bukan pengganti konsultasi dokter.',
        'quick' => [
            'Rekomendasi treatment untuk kulit berjerawat?',
            'Berapa lama hasil facial terlihat?',
            'Apakah aman untuk ibu hamil?',
            'Bagaimana cara merawat kulit setelah treatment?',
        ],
        // keywords dicocokkan huruf kecil; jawaban pertama yang cocok dipakai.
        'answers' => [
            ['keys' => ['jerawat', 'acne'],
                'a' => 'Untuk kulit berjerawat, dokter biasanya mulai dari Acne Care Facial dan skincare yang sesuai; pada kondisi tertentu dilanjutkan dengan laser atau peeling. Pilihan terbaik ditentukan setelah konsultasi.'],
            ['keys' => ['hamil', 'menyusui', 'busui'],
                'a' => 'Sebagian treatment tidak dianjurkan untuk ibu hamil atau menyusui. Mohon sampaikan kondisi Anda kepada dokter agar perawatan disesuaikan atau ditunda.'],
            ['keys' => ['setelah', 'pasca', 'merawat'],
                'a' => 'Setelah treatment: gunakan tabir surya, pelembap, dan produk yang dianjurkan dokter; hindari sinar matahari langsung, scrub, dan produk keras selama beberapa hari.'],
            ['keys' => ['facial', 'hasil', 'terlihat', 'berapa lama'],
                'a' => 'Facial umumnya membuat kulit terasa lebih bersih dan lembap segera setelah treatment. Hasil yang lebih nyata biasanya terlihat setelah beberapa sesi, tergantung kondisi kulit.'],
            ['keys' => ['jadwal', 'buka', 'jam'],
                'a' => 'Kami buka Senin–Jumat 09.00–20.00, Sabtu 09.00–17.00, dan Minggu 10.00–16.00 (WIB).'],
            ['keys' => ['lokasi', 'alamat', 'dimana', 'di mana'],
                'a' => 'GlowClinic berada di Jl. Melati No. 12, Jakarta Selatan. Petunjuk arah tersedia di bagian Lokasi pada beranda.'],
            ['keys' => ['booking', 'janji', 'appointment', 'daftar'],
                'a' => 'Anda bisa booking lewat halaman Appointment atau langsung lewat WhatsApp. Tim kami akan mengonfirmasi jadwalnya.'],
        ],
        'fallback' => 'Terima kasih atas pertanyaannya. Untuk jawaban yang tepat sesuai kondisi kulit Anda, silakan konsultasi langsung dengan dokter kami.',
    ],

    'footer' => [
        'app' => [
            ['icon' => 'bi-google-play', 'small' => 'GET IT ON',         'label' => 'Google Play', 'url' => '#'],
            ['icon' => 'bi-apple',       'small' => 'Download on the',   'label' => 'App Store',   'url' => '#'],
        ],
        'credit' => '© 2026 WEBIA by D-KREASI. Seluruh hak cipta dilindungi.',
    ],
];
