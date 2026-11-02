<?php

/*
|--------------------------------------------------------------------------
| Template: Klinik Kecantikan — Elegan / Rose Gold ("RoseGlow Clinic")
|--------------------------------------------------------------------------
| Sumber data statis untuk seluruh view template ini. Dibaca di blade lewat:
|   config('template.healthcare.elegan.klinik-kecantikan-rose-gold.klinik-kecantikan')
| Tidak ada query / backend. Tim backend cukup mengganti isi array ini
| (atau menggantinya dengan data dari database) tanpa menyentuh blade.
|
| Catatan: field 'route' berisi SUFFIX nama route, bukan URL penuh.
| Nama route lengkap = $rp . suffix (lihat routes/web.php).
*/

return [

    'meta' => [
        'title' => 'RoseGlow Clinic — Beauty & Aesthetic Care',
        'description' => 'Klinik kecantikan & aesthetic dengan dokter berpengalaman, teknologi modern, dan produk premium.',
    ],

    'brand' => [
        'name' => 'RoseGlow Clinic',
        'tagline' => 'Beauty & Aesthetic Care',
        'slogan' => 'Kecantikan adalah investasi untuk diri sendiri',
    ],

    'contact' => [
        'phone' => '+62 812 3456 7890',
        'whatsapp' => '6281234567890', // tombol WhatsApp melayang & asisten AI (format internasional tanpa + / spasi)
        'booking_whatsapp' => '62895630300345', // tujuan form Booking Appointment (0895630300345)
        'email' => 'info@roseglowclinic.id',
        'address' => 'Jl. Melati No. 28, Jakarta Selatan',
        'maps_url' => 'https://www.google.com/maps/search/?api=1&query=Jl.+Melati+No.+28+Jakarta+Selatan',
        'hours_short' => 'Sen – Jum 08.00 – 20.00',
    ],

    'socials' => [
        ['label' => 'Instagram', 'icon' => 'bi-instagram', 'url' => '#'],
        ['label' => 'Facebook',  'icon' => 'bi-facebook',  'url' => '#'],
        ['label' => 'YouTube',   'icon' => 'bi-youtube',   'url' => '#'],
        ['label' => 'TikTok',    'icon' => 'bi-tiktok',    'url' => '#'],
    ],

    // Navbar. 'page' dipakai untuk menandai menu aktif.
    'nav' => [
        ['label' => 'Beranda',        'route' => 'index',       'page' => 'home'],
        ['label' => 'Layanan',        'route' => 'services',    'page' => 'services'],
        ['label' => 'Dokter & Staff', 'route' => 'doctors',     'page' => 'doctors'],
        ['label' => 'Jadwal',         'route' => 'schedule',    'page' => 'schedule'],
        ['label' => 'FAQ',            'route' => 'faq',         'page' => 'faq'],
        ['label' => 'Kebijakan',      'route' => 'policy',      'page' => 'policy'],
    ],

    'cta' => ['label' => 'Booking Appointment', 'route' => 'appointment'],

    // Lonceng notifikasi di navbar
    'notifications' => [
        ['icon' => 'bi-calendar2-check', 'title' => 'Booking terbuka',    'text' => 'Reservasi perawatan bisa dilakukan setiap hari.'],
        ['icon' => 'bi-clock',           'title' => 'Jadwal praktik',     'text' => 'Sabtu buka 08.00 – 16.00, Minggu tutup.'],
        ['icon' => 'bi-chat-heart',      'title' => 'Tanya Beauty Assistant', 'text' => 'Info layanan & harga tersedia 24 jam.'],
    ],

    'hero' => [
        'eyebrow' => 'Klinik Kecantikan & Aesthetic',
        'title' => 'Tampil Lebih Percaya Diri dengan Perawatan Terbaik',
        'text' => 'Perawatan kulit dan kecantikan profesional dengan teknologi modern dan ditangani oleh dokter ahli berpengalaman.',
        'image_alt' => 'Pasien tersenyum dengan kulit sehat di ruang perawatan RoseGlow Clinic',
        'trust' => [
            ['icon' => 'bi-person-heart',    'label' => 'Dokter Berpengalaman'],
            ['icon' => 'bi-gear-wide',       'label' => 'Teknologi Modern'],
            ['icon' => 'bi-bag-heart',       'label' => 'Produk Premium'],
            ['icon' => 'bi-shield-check',    'label' => 'Hasil Natural & Aman'],
        ],
        'panel' => [
            ['icon' => 'bi-droplet',             'title' => 'Skincare', 'sub' => 'Treatment'],
            ['icon' => 'bi-lightning-charge',    'title' => 'Laser & Light', 'sub' => 'Therapy'],
            ['icon' => 'bi-hourglass-split',     'title' => 'Anti Aging', 'sub' => 'Solution'],
            ['icon' => 'bi-person-standing-dress', 'title' => 'Body Contouring', 'sub' => '& Slimming'],
        ],
    ],

    'services_intro' => [
        'eyebrow' => 'Layanan Unggulan',
        'title' => 'Perawatan Terbaik untuk Kecantikan Anda',
        'text' => 'Kami menyediakan berbagai layanan perawatan kulit dan kecantikan dengan teknologi terkini dan ditangani oleh dokter ahli.',
    ],

    'services' => [
        [
            'slug' => 'facial-treatment', 'name' => 'Facial Treatment', 'category' => 'Skincare',
            'short' => 'Membersihkan & menyegarkan kulit', 'price' => 350000, 'duration' => '60 menit',
            'image' => 'service-1.jpg',
            'desc' => 'Pembersihan mendalam, eksfoliasi lembut, dan masker nutrisi untuk kulit yang bersih, lembap, dan tampak segar.',
            'benefits' => ['Mengangkat kotoran & sel kulit mati', 'Melembapkan dan menenangkan kulit', 'Cocok untuk perawatan rutin bulanan'],
        ],
        [
            'slug' => 'anti-aging', 'name' => 'Anti Aging', 'category' => 'Anti Aging',
            'short' => 'Mengurangi tanda penuaan dini', 'price' => 750000, 'duration' => '75 menit',
            'image' => 'service-2.jpg',
            'desc' => 'Kombinasi serum aktif dan teknologi peremajaan untuk menyamarkan garis halus dan mengembalikan kekenyalan kulit.',
            'benefits' => ['Menyamarkan garis halus & kerutan', 'Meningkatkan kekenyalan kulit', 'Membantu tekstur kulit tampak lebih rata'],
        ],
        [
            'slug' => 'acne-treatment', 'name' => 'Acne Treatment', 'category' => 'Skincare',
            'short' => 'Merawat kulit berjerawat', 'price' => 500000, 'duration' => '60 menit',
            'image' => 'service-3.jpg',
            'desc' => 'Penanganan jerawat aktif dan bekasnya sesuai kondisi kulit, mulai dari pembersihan hingga terapi penenang.',
            'benefits' => ['Membantu mengurangi jerawat aktif', 'Menenangkan kemerahan & peradangan', 'Disesuaikan dengan jenis kulit'],
        ],
        [
            'slug' => 'skin-booster', 'name' => 'Skin Booster', 'category' => 'Anti Aging',
            'short' => 'Meningkatkan elastisitas & kelembapan kulit', 'price' => 850000, 'duration' => '45 menit',
            'image' => 'service-4.jpg',
            'desc' => 'Hidrasi intensif dari dalam untuk kulit yang lebih kenyal, kencang, dan bercahaya alami.',
            'benefits' => ['Hidrasi mendalam', 'Kulit tampak lebih kenyal & glowing', 'Dilakukan oleh dokter'],
        ],
        [
            'slug' => 'laser-treatment', 'name' => 'Laser Treatment', 'category' => 'Laser',
            'short' => 'Mencerahkan & meratakan warna kulit', 'price' => 1200000, 'duration' => '45 menit',
            'image' => 'service-5.jpg',
            'desc' => 'Terapi laser untuk membantu mencerahkan kulit, menyamarkan noda, dan meratakan warna kulit.',
            'benefits' => ['Membantu menyamarkan noda & flek', 'Mencerahkan warna kulit', 'Konsultasi sebelum tindakan'],
        ],
        [
            'slug' => 'body-contouring', 'name' => 'Body Contouring', 'category' => 'Body',
            'short' => 'Membentuk tubuh lebih ideal', 'price' => 1000000, 'duration' => '90 menit',
            'image' => 'service-6.jpg',
            'desc' => 'Perawatan pembentukan kontur tubuh dengan teknologi modern untuk siluet yang lebih proporsional.',
            'benefits' => ['Membantu membentuk kontur tubuh', 'Nyaman, tanpa operasi', 'Program disesuaikan kebutuhan'],
        ],
    ],

    'doctors_intro' => [
        'eyebrow' => 'Dokter & Staff',
        'title' => 'Tim Profesional Kami',
        'text' => 'Didukung oleh dokter spesialis dan tim terlatih yang siap memberikan pelayanan terbaik untuk Anda.',
    ],

    'doctors' => [
        ['slug' => 'amanda-putri', 'name' => 'dr. Amanda Putri, Sp.KK', 'role' => 'Dokter Spesialis Kulit & Kelamin', 'tag' => 'Dokter',
            'image' => 'doctor-1.jpg', 'exp' => '10 tahun', 'focus' => 'Acne, anti aging, laser',
            'bio' => 'Menangani masalah kulit mulai dari jerawat hingga peremajaan dengan pendekatan yang natural.',
            'days' => ['Senin', 'Rabu', 'Jumat'], 'time' => '09.00 – 17.00'],
        ['slug' => 'rizky-maulana', 'name' => 'dr. Rizky Maulana, Sp.AK', 'role' => 'Spesialis Aesthetic', 'tag' => 'Dokter',
            'image' => 'doctor-2.jpg', 'exp' => '8 tahun', 'focus' => 'Skin booster, body contouring',
            'bio' => 'Berfokus pada prosedur estetika yang aman dengan hasil yang tampak natural.',
            'days' => ['Selasa', 'Kamis', 'Sabtu'], 'time' => '10.00 – 18.00'],
        ['slug' => 'sari-wulandari', 'name' => 'dr. Sari Wulandari', 'role' => 'Dokter Umum', 'tag' => 'Dokter',
            'image' => 'doctor-3.jpg', 'exp' => '6 tahun', 'focus' => 'Konsultasi awal & skincare',
            'bio' => 'Melakukan konsultasi awal dan menyusun rencana perawatan sesuai kondisi kulit pasien.',
            'days' => ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat'], 'time' => '08.00 – 16.00'],
        ['slug' => 'nadia-lestari', 'name' => 'Nadia Lestari', 'role' => 'Therapist', 'tag' => 'Therapist',
            'image' => 'doctor-4.jpg', 'exp' => '5 tahun', 'focus' => 'Facial & perawatan tubuh',
            'bio' => 'Terapis berpengalaman untuk facial treatment dan perawatan tubuh yang nyaman.',
            'days' => ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'], 'time' => '09.00 – 18.00'],
    ],

    'schedule' => [
        'title' => 'Jadwal Praktik',
        'text' => 'Lihat jadwal dokter dan pilih waktu yang sesuai dengan Anda.',
        'hours' => [
            ['day' => 'Senin - Jumat', 'time' => '08.00 - 20.00', 'open' => true],
            ['day' => 'Sabtu',         'time' => '08.00 - 16.00', 'open' => true],
            ['day' => 'Minggu',        'time' => 'Tutup',         'open' => false],
        ],
        'week' => ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'],
        'note' => 'Jadwal dokter dapat berubah. Konfirmasi ketersediaan melalui WhatsApp sebelum datang.',
    ],

    'location' => [
        'title' => 'Lokasi Klinik',
        'text' => 'Klinik kami berada di lokasi strategis dan mudah diakses dengan berbagai moda transportasi.',
        'badge' => 'Mudah Dijangkau',
        'image_alt' => 'Gedung RoseGlow Clinic',
    ],

    'booking' => [
        'title' => 'Booking Appointment',
        'text' => 'Konsultasikan kebutuhan perawatan Anda bersama tim dokter kami.',
        'button' => 'Booking Sekarang',
        'times' => ['09.00', '10.00', '11.00', '13.00', '14.00', '15.00', '16.00', '17.00', '18.00'],
    ],

    'faq' => [
        ['cat' => 'Perawatan', 'q' => 'Apakah perawatan ini aman untuk kulit sensitif?',
            'a' => 'Aman. Dokter akan menilai kondisi kulit Anda terlebih dahulu, lalu memilih produk dan tindakan yang sesuai untuk kulit sensitif.'],
        ['cat' => 'Perawatan', 'q' => 'Berapa lama hasil perawatan bisa terlihat?',
            'a' => 'Beberapa perawatan seperti facial memberi efek segar segera. Perawatan lain seperti laser atau anti aging memerlukan beberapa sesi; dokter akan menjelaskan estimasinya saat konsultasi.'],
        ['cat' => 'Perawatan', 'q' => 'Apakah ada efek samping setelah treatment?',
            'a' => 'Kemerahan ringan atau rasa hangat bisa muncul sesaat setelah tindakan tertentu dan biasanya mereda dalam waktu singkat. Dokter akan memberi panduan perawatan lanjutan.'],
        ['cat' => 'Booking', 'q' => 'Bagaimana cara membuat janji?',
            'a' => 'Isi formulir Booking Appointment di website ini atau hubungi kami melalui WhatsApp. Tim kami akan mengonfirmasi jadwal Anda.'],
        ['cat' => 'Booking', 'q' => 'Apakah saya bisa mengubah atau membatalkan jadwal?',
            'a' => 'Bisa. Mohon informasikan minimal 24 jam sebelum jadwal agar slot dapat digunakan pasien lain.'],
        ['cat' => 'Booking', 'q' => 'Apakah perlu konsultasi sebelum treatment?',
            'a' => 'Ya. Konsultasi dengan dokter dilakukan lebih dulu agar perawatan sesuai kondisi dan tujuan Anda.'],
        ['cat' => 'Pembayaran', 'q' => 'Metode pembayaran apa saja yang diterima?',
            'a' => 'Kami menerima tunai, transfer bank, kartu debit/kredit, dan dompet digital.'],
        ['cat' => 'Pembayaran', 'q' => 'Apakah harga yang tertera sudah final?',
            'a' => 'Harga "Mulai dari" adalah harga dasar. Biaya akhir bergantung pada kebutuhan dan rencana perawatan dari dokter.'],
        ['cat' => 'Keamanan', 'q' => 'Apakah data pribadi saya aman?',
            'a' => 'Data Anda hanya digunakan untuk keperluan pelayanan dan tidak dibagikan ke pihak lain tanpa persetujuan. Lihat Kebijakan Privasi kami.'],
        ['cat' => 'Keamanan', 'q' => 'Apakah produk yang digunakan sudah terdaftar?',
            'a' => 'Kami menggunakan produk premium yang sesuai standar dan digunakan sesuai prosedur klinik.'],
    ],

    'policy' => [
        ['id' => 'privasi', 'icon' => 'bi-shield-lock', 'title' => 'Kebijakan Privasi',
            'summary' => 'Cara kami mengumpulkan, menggunakan, dan melindungi data pribadi Anda.',
            'items' => [
                'Kami mengumpulkan data seperti nama, nomor telepon, email, dan keluhan kulit untuk keperluan reservasi dan pelayanan.',
                'Data tidak dijual atau dibagikan kepada pihak ketiga tanpa persetujuan Anda, kecuali diwajibkan oleh hukum.',
                'Informasi kesehatan diperlakukan sebagai data sensitif dan hanya diakses oleh tenaga yang menangani Anda.',
                'Anda dapat meminta akses, perubahan, atau penghapusan data melalui kontak resmi klinik.',
            ]],
        ['id' => 'syarat', 'icon' => 'bi-file-earmark-text', 'title' => 'Syarat & Ketentuan',
            'summary' => 'Ketentuan penggunaan layanan dan website RoseGlow Clinic.',
            'items' => [
                'Seluruh tindakan dilakukan setelah konsultasi dan persetujuan pasien.',
                'Harga dapat berubah sewaktu-waktu; harga final dikonfirmasi saat konsultasi.',
                'Hasil perawatan dapat berbeda pada setiap individu sesuai kondisi kulit dan kepatuhan perawatan lanjutan.',
                'Konten pada website ini bersifat informatif dan bukan pengganti konsultasi medis.',
            ]],
        ['id' => 'pembatalan', 'icon' => 'bi-calendar-x', 'title' => 'Pembatalan & Reschedule',
            'summary' => 'Aturan perubahan jadwal agar semua pasien terlayani dengan baik.',
            'items' => [
                'Perubahan atau pembatalan jadwal diinformasikan paling lambat 24 jam sebelumnya.',
                'Keterlambatan lebih dari 15 menit dapat membuat jadwal dipindahkan sesuai ketersediaan.',
                'Jadwal dokter dapat berubah karena keadaan tertentu; kami akan menginformasikan lebih dulu.',
            ]],
    ],

    'footer' => [
        'nav' => [
            ['label' => 'Beranda', 'route' => 'index'],
            ['label' => 'Layanan', 'route' => 'services'],
            ['label' => 'Dokter & Staff', 'route' => 'doctors'],
            ['label' => 'Jadwal', 'route' => 'schedule'],
        ],
        'info' => [
            ['label' => 'Lokasi', 'route' => 'index', 'hash' => 'lokasi'],
            ['label' => 'FAQ', 'route' => 'faq'],
            ['label' => 'Kebijakan Privasi', 'route' => 'policy', 'hash' => 'privasi'],
            ['label' => 'Syarat & Ketentuan', 'route' => 'policy', 'hash' => 'syarat'],
        ],
        'credit' => '© 2026 WEBIA by D-KREASI. Seluruh hak cipta dilindungi.',
    ],

    'whatsapp' => [
        'label' => 'Chat WhatsApp',
        'message' => 'Halo RoseGlow Clinic, saya ingin bertanya tentang perawatan.',
    ],

    // AI Beauty Assistant — rule based (statis). Backend dapat mengganti
    // dengan endpoint lewat atribut data-endpoint pada #rgAssistant.
    'assistant' => [
        'name' => 'AI Beauty Assistant',
        'subtitle' => 'Siap membantu pertanyaan seputar perawatan, layanan, jadwal, dan informasi klinik.',
        'hello' => 'Halo!',
        'greeting' => 'Ada yang bisa saya bantu hari ini?',
        'teaser' => 'Tanya Beauty Assistant',
        'placeholder' => 'Tulis pertanyaanmu...',
        'fallback' => 'Maaf, saya belum menemukan jawabannya. Anda bisa bertanya lewat WhatsApp agar dibantu tim kami.',
        'quick' => [
            ['key' => 'layanan', 'icon' => 'bi-tags',          'label' => 'Info layanan & harga'],
            ['key' => 'tips',    'icon' => 'bi-bandaid',       'label' => 'Tips perawatan kulit'],
            ['key' => 'jadwal',  'icon' => 'bi-calendar2-week', 'label' => 'Jadwal dokter'],
            ['key' => 'lokasi',  'icon' => 'bi-geo-alt',       'label' => 'Lokasi klinik'],
        ],
        // 5 tombol ikon di bagian bawah panel
        'shortcuts' => [
            ['key' => 'klinik',  'icon' => 'bi-cup-hot',   'label' => 'Info klinik'],
            ['key' => 'produk',  'icon' => 'bi-capsule-pill', 'label' => 'Produk skincare'],
            ['key' => 'edukasi', 'icon' => 'bi-book',      'label' => 'Edukasi perawatan'],
            ['key' => 'layanan', 'icon' => 'bi-flower1',   'label' => 'Treatment unggulan'],
            ['key' => 'tips',    'icon' => 'bi-droplet',   'label' => 'Tips kulit'],
        ],
        // kata kunci => key jawaban
        'keywords' => [
            'layanan' => ['layanan', 'harga', 'biaya', 'treatment', 'tarif', 'facial', 'laser', 'booster', 'jerawat', 'acne', 'body'],
            'tips' => ['tips', 'cara', 'rawat', 'perawatan kulit', 'kulit kering', 'kulit berminyak', 'sunscreen', 'skincare'],
            'jadwal' => ['jadwal', 'jam', 'buka', 'praktik', 'dokter', 'hari'],
            'lokasi' => ['lokasi', 'alamat', 'dimana', 'di mana', 'maps', 'peta'],
            'booking' => ['booking', 'janji', 'reservasi', 'daftar', 'appointment'],
            'klinik' => ['klinik', 'kontak', 'telepon', 'email', 'whatsapp', 'wa'],
            'produk' => ['produk', 'serum', 'krim', 'sunscreen'],
            'edukasi' => ['edukasi', 'artikel', 'belajar'],
        ],
        'tips' => 'Tiga dasar perawatan kulit harian: bersihkan wajah pagi & malam, pakai pelembap sesuai jenis kulit, dan gunakan sunscreen setiap pagi. Untuk keluhan khusus, konsultasikan dengan dokter kami.',
        'produk' => 'Kami menggunakan produk premium yang dipilih dokter sesuai kondisi kulit Anda. Rekomendasi produk diberikan setelah konsultasi.',
        'edukasi' => 'Edukasi perawatan diberikan langsung oleh dokter dan therapist setelah tindakan, termasuk cara merawat kulit di rumah.',
    ],

    'images_dir' => 'images/website-bisnis/template/healthcare/elegan/klinik-kecantikan-rose-gold',
    'css' => 'css/website-bisnis/template/healthcare/elegan/klinik-kecantikan-rose-gold/klinik-kecantikan.css',
    'js' => 'js/website-bisnis/template/healthcare/elegan/klinik-kecantikan-rose-gold/klinik-kecantikan.js',
];
