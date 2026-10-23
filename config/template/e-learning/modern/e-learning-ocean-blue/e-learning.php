<?php

/*
|--------------------------------------------------------------------------
| E-Learning · Modern · Ocean Blue  (brand: E-learna)
|--------------------------------------------------------------------------
| Seluruh konten statis template ini dipusatkan di sini. Tidak ada closure,
| sehingga aman untuk `php artisan config:cache`.
| Dibaca di Blade lewat:
|   config('template.e-learning.modern.e-learning-ocean-blue.e-learning')
*/

return [

    'brand' => [
        'name'    => 'E-learna',
        'tagline' => 'Learn · Practice · Grow',
        'credit'  => '© 2026 WEBIA by D-KREASI. Seluruh hak cipta dilindungi.',
    ],

    'assets' => [
        'css' => 'css/website-bisnis/template/e-learning/modern/e-learning-ocean-blue/e-learning.css',
        'js'  => 'js/website-bisnis/template/e-learning/modern/e-learning-ocean-blue/e-learning.js',
        'img' => 'images/website-bisnis/template/e-learning/modern/e-learning-ocean-blue/',
    ],

    'contact' => [
        'address'  => 'Jl. Pendidikan No. 123, Surabaya',
        'email'    => 'hello@elearna.id',
        'hours'    => 'Sen - Jum: 08.00 - 18.00',
        'phone'    => '+62 812 3456 7890',
        'whatsapp' => '6281234567890', // format internasional tanpa + / spasi
        'wa_text'  => 'Halo E-learna, saya ingin bertanya tentang program belajar.',
    ],

    'social' => [
        ['key' => 'youtube',   'label' => 'YouTube',   'url' => '#'],
        ['key' => 'instagram', 'label' => 'Instagram', 'url' => '#'],
        ['key' => 'linkedin',  'label' => 'LinkedIn',  'url' => '#'],
        ['key' => 'tiktok',    'label' => 'TikTok',    'url' => '#'],
    ],

    // Navbar sesuai desain. "action" = perilaku khusus (FAQ membuka AI chatbot).
    'nav' => [
        ['label' => 'Home',           'route' => 'elearning.home'],
        ['label' => 'Programs',       'route' => 'elearning.programs'],
        ['label' => 'Schedules',      'route' => 'elearning.schedules'],
        ['label' => 'Teachers',       'route' => 'elearning.teachers'],
        ['label' => 'Pricing',        'route' => 'elearning.pricing'],
        ['label' => 'Course Content', 'route' => 'elearning.course-content'],
        ['label' => 'FAQ',            'route' => null, 'action' => 'chat'],
    ],

    // Tombol di kanan navbar (mengikuti referensi): Login -> halaman Member Area, Get Started -> halaman Registration
    'nav_actions' => [
        ['label' => 'Login',       'route' => 'elearning.member-area',  'style' => 'outline'],
        ['label' => 'Get Started', 'route' => 'elearning.registration', 'style' => 'primary', 'arrow' => true],
    ],

    'footer' => [
        'Navigasi'  => [
            ['label' => 'Home',      'route' => 'elearning.home'],
            ['label' => 'Programs',  'route' => 'elearning.programs'],
            ['label' => 'Schedules', 'route' => 'elearning.schedules'],
        ],
        'Informasi' => [
            ['label' => 'Teachers',     'route' => 'elearning.teachers'],
            ['label' => 'Pricing',      'route' => 'elearning.pricing'],
            ['label' => 'Registration', 'route' => 'elearning.registration'],
        ],
        'Bantuan'   => [
            ['label' => 'FAQ',         'route' => null, 'action' => 'chat'],
            ['label' => 'Member Area', 'route' => 'elearning.member-area'],
            ['label' => 'Contact',     'route' => null, 'action' => 'mailto'],
        ],
    ],

    'hero' => [
        'pill'      => 'Online Course & E-Learning',
        'title'     => ['Learn Anytime,', 'Anywhere'],
        'text'      => 'Tingkatkan skill dan wujudkan karier impianmu dengan kursus online berkualitas dari E-learna.',
        'cta'       => 'Jelajahi Program',
        'trailer'   => 'Tonton Trailer',
        'trailer_url' => null, // isi URL embed (mis. https://www.youtube.com/embed/xxxx) bila video sudah tersedia
    ],

    'pages' => [
        'programs'       => ['title' => 'Our Programs',   'sub' => 'Pilih program yang sesuai dengan minat dan tujuanmu.'],
        'schedules'      => ['title' => 'Upcoming Schedules', 'sub' => 'Jadwal kelas terbaru untuk kamu.'],
        'teachers'       => ['title' => 'Our Teachers',   'sub' => 'Belajar dari para ahli di bidangnya.'],
        'pricing'        => ['title' => 'Pricing Plan',   'sub' => 'Pilih paket terbaik sesuai kebutuhanmu.'],
        'registration'   => ['title' => 'Registration',   'sub' => 'Daftar sekarang dan dapatkan akses ke semua kursus premium kami.'],
        'course-content' => ['title' => 'Course Content', 'sub' => 'Lihat materi dan kurikulum yang akan kamu pelajari.'],
        'member-area'    => ['title' => 'Member Area',    'sub' => 'Akses materi kursus, sertifikat, dan fitur eksklusif lainnya.'],
    ],

    'programs' => [
        ['slug' => 'programming', 'title' => 'Programming & Tech',     'icon' => 'icon-programming.png', 'courses' => 24, 'level' => 'Pemula - Lanjutan',
         'desc' => 'Belajar web, backend, dan dasar cloud lewat proyek nyata yang bisa masuk portofolio.',
         'topics' => ['HTML & CSS', 'JavaScript', 'Laravel', 'Git & GitHub'], 'levels' => ['pemula', 'menengah', 'lanjutan']],
        ['slug' => 'design', 'title' => 'Design & Creative',           'icon' => 'icon-design.png', 'courses' => 18, 'level' => 'Pemula - Menengah',
         'desc' => 'Kuasai UI/UX, branding, dan visual storytelling dengan tools desain standar industri.',
         'topics' => ['UI/UX Design', 'Figma', 'Branding', 'Motion Basics'], 'levels' => ['pemula', 'menengah']],
        ['slug' => 'business', 'title' => 'Business & Marketing',      'icon' => 'icon-business.png', 'courses' => 20, 'level' => 'Pemula - Lanjutan',
         'desc' => 'Strategi pemasaran digital, bisnis online, dan analisis pasar untuk tumbuh lebih cepat.',
         'topics' => ['Digital Marketing', 'SEO', 'Copywriting', 'Social Ads'], 'levels' => ['pemula', 'menengah', 'lanjutan']],
        ['slug' => 'data', 'title' => 'Data Science & Analytics',     'icon' => 'icon-data.png', 'courses' => 16, 'level' => 'Menengah - Lanjutan',
         'desc' => 'Olah data menjadi keputusan: dari Python dan SQL sampai visualisasi dan dasar machine learning.',
         'topics' => ['Python', 'SQL', 'Data Visualization', 'Machine Learning'], 'levels' => ['menengah', 'lanjutan']],
        ['slug' => 'language', 'title' => 'Language Learning',        'icon' => 'icon-language.png', 'courses' => 12, 'level' => 'Semua level',
         'desc' => 'Tingkatkan kemampuan bahasa untuk kuliah, karier, dan komunikasi global.',
         'topics' => ['English', 'Business English', 'Mandarin', 'Japanese'], 'levels' => ['pemula', 'menengah', 'lanjutan']],
        ['slug' => 'personal', 'title' => 'Personal Development',     'icon' => 'icon-personal.png', 'courses' => 14, 'level' => 'Semua level',
         'desc' => 'Bangun soft skill, produktivitas, dan kepercayaan diri untuk siap menghadapi dunia kerja.',
         'topics' => ['Public Speaking', 'Productivity', 'Career Planning', 'Leadership'], 'levels' => ['pemula', 'menengah']],
    ],

    'schedules' => [
        ['day' => 25, 'month' => 'Okt', 'title' => 'Web Development Fundamentals', 'time' => '10.00 - 12.00 WIB', 'mode' => 'Online', 'program' => 'programming', 'teacher' => 'Dr. Andi Pratama', 'quota' => 30, 'left' => 8],
        ['day' => 26, 'month' => 'Okt', 'title' => 'Digital Marketing Strategy',    'time' => '14.00 - 16.00 WIB', 'mode' => 'Online', 'program' => 'business',    'teacher' => 'Budi Santoso',    'quota' => 40, 'left' => 15],
        ['day' => 28, 'month' => 'Okt', 'title' => 'Data Analysis with Python',    'time' => '19.00 - 21.00 WIB', 'mode' => 'Online', 'program' => 'data',        'teacher' => 'Siti Nurhaliza',  'quota' => 25, 'left' => 6],
        ['day' => 30, 'month' => 'Okt', 'title' => 'UI/UX Design Basics with Figma','time' => '13.00 - 15.00 WIB', 'mode' => 'Online', 'program' => 'design',      'teacher' => 'Dewi Lestari',    'quota' => 30, 'left' => 12],
        ['day' => 2,  'month' => 'Nov', 'title' => 'Laravel for Beginners',         'time' => '10.00 - 12.00 WIB', 'mode' => 'Online', 'program' => 'programming', 'teacher' => 'Dr. Andi Pratama', 'quota' => 30, 'left' => 21],
        ['day' => 4,  'month' => 'Nov', 'title' => 'SEO & Content Marketing',       'time' => '15.00 - 17.00 WIB', 'mode' => 'Online', 'program' => 'business',    'teacher' => 'Budi Santoso',    'quota' => 40, 'left' => 27],
        ['day' => 6,  'month' => 'Nov', 'title' => 'SQL for Data Analyst',          'time' => '19.00 - 21.00 WIB', 'mode' => 'Online', 'program' => 'data',        'teacher' => 'Siti Nurhaliza',  'quota' => 25, 'left' => 17],
        ['day' => 9,  'month' => 'Nov', 'title' => 'Design System Workshop',        'time' => '14.00 - 16.00 WIB', 'mode' => 'Hybrid', 'program' => 'design',      'teacher' => 'Dewi Lestari',    'quota' => 20, 'left' => 9],
    ],

    'teachers' => [
        ['name' => 'Dr. Andi Pratama', 'role' => 'Software Engineer', 'photo' => 'teacher-andi.png', 'program' => 'programming', 'exp' => '12 tahun', 'rating' => '4.9', 'classes' => 38,
         'bio' => 'Membangun sistem skala besar dan membimbing ratusan developer pemula hingga siap kerja.', 'skills' => ['Laravel', 'JavaScript', 'System Design']],
        ['name' => 'Siti Nurhaliza',   'role' => 'Data Scientist',    'photo' => 'teacher-siti.png', 'program' => 'data', 'exp' => '9 tahun', 'rating' => '4.9', 'classes' => 31,
         'bio' => 'Berpengalaman menerapkan analitik data dan machine learning untuk industri retail dan keuangan.', 'skills' => ['Python', 'SQL', 'Machine Learning']],
        ['name' => 'Budi Santoso',     'role' => 'Digital Marketer',  'photo' => 'teacher-budi.png', 'program' => 'business', 'exp' => '10 tahun', 'rating' => '4.8', 'classes' => 29,
         'bio' => 'Memimpin kampanye digital untuk brand nasional dengan fokus pada pertumbuhan yang terukur.', 'skills' => ['SEO', 'Social Ads', 'Analytics']],
        ['name' => 'Dewi Lestari',     'role' => 'UI/UX Designer',    'photo' => 'teacher-dewi.png', 'program' => 'design', 'exp' => '8 tahun', 'rating' => '4.9', 'classes' => 26,
         'bio' => 'Merancang produk digital yang mudah dipakai dan membantu murid membangun portofolio desain.', 'skills' => ['Figma', 'Design System', 'User Research']],
    ],

    'billing' => ['discount' => 20, 'monthly_label' => 'Bulanan', 'yearly_label' => 'Tahunan'],

    'plans' => [
        ['slug' => 'basic', 'name' => 'Basic', 'price' => 99000, 'access' => 'Akses 10+ kursus', 'featured' => false,
         'features' => ['Akses 10+ kursus pilihan', 'Video materi on-demand', 'Forum diskusi komunitas', 'Sertifikat digital']],
        ['slug' => 'professional', 'name' => 'Professional', 'price' => 149000, 'access' => 'Akses 50+ kursus', 'featured' => true, 'badge' => 'Populer',
         'features' => ['Akses 50+ kursus', 'Semua fitur Basic', 'Kelas live bersama mentor', 'Latihan proyek & feedback', 'Sertifikat terverifikasi']],
        ['slug' => 'premium', 'name' => 'Premium', 'price' => 249000, 'access' => 'Akses semua kursus', 'featured' => false,
         'features' => ['Akses semua kursus', 'Semua fitur Professional', 'Mentoring 1:1 bulanan', 'Review portofolio & CV', 'Prioritas dukungan']],
    ],

    'registration' => [
        // Semua pengiriman formulir pendaftaran diarahkan ke WhatsApp ini (format internasional, tanpa + / spasi).
        'whatsapp' => '62895630300345',
        'whatsapp_display' => '0895630300345', // hanya untuk teks di halaman
        'cta'      => ['title' => 'Siap memulai perjalanan belajarmu?', 'text' => 'Daftar sekarang dan dapatkan akses ke ribuan materi pembelajaran berkualitas.', 'button' => 'Daftar Sekarang'],
        'form'     => ['title' => 'Formulir Pendaftaran'],
        'aside'    => ['title' => 'Mulai Perjalanan Belajarmu Sekarang!', 'text' => 'Daftar sekarang dan dapatkan akses ke ribuan materi pembelajaran berkualitas.'],
        'perks'    => ['Akses ke kelas live & rekaman', 'Mentor profesional di setiap kelas', 'Sertifikat digital setelah lulus'],
    ],

    'courses' => [
        ['slug' => 'web-dev', 'title' => 'Web Development Fundamentals', 'program' => 'programming', 'teacher' => 'Dr. Andi Pratama', 'level' => 'Pemula', 'hours' => '18 jam',
         'summary' => 'Dari nol hingga membuat landing page responsif dan interaktif.',
         'modules' => [
            ['title' => 'Pengenalan Web & Tools', 'lessons' => 4,  'duration' => '45 menit', 'free' => true,  'items' => ['Cara kerja website', 'Menyiapkan code editor', 'Struktur folder proyek']],
            ['title' => 'HTML & CSS Dasar',        'lessons' => 8,  'duration' => '2 jam',     'free' => false, 'items' => ['Semantic HTML', 'Box model & layout', 'Flexbox dan Grid']],
            ['title' => 'JavaScript Esensial',     'lessons' => 10, 'duration' => '3 jam',     'free' => false, 'items' => ['Variabel & fungsi', 'Manipulasi DOM', 'Event & form']],
            ['title' => 'Proyek Akhir: Landing Page', 'lessons' => 5, 'duration' => '2 jam 30 menit', 'free' => false, 'items' => ['Perencanaan desain', 'Implementasi responsif', 'Publikasi proyek']],
         ]],
        ['slug' => 'data-python', 'title' => 'Data Analysis with Python', 'program' => 'data', 'teacher' => 'Siti Nurhaliza', 'level' => 'Menengah', 'hours' => '22 jam',
         'summary' => 'Bersihkan, analisis, dan visualisasikan data menggunakan Python.',
         'modules' => [
            ['title' => 'Dasar Python untuk Data', 'lessons' => 6, 'duration' => '1 jam 30 menit', 'free' => true,  'items' => ['Tipe data & struktur', 'Fungsi & modul', 'Notebook Jupyter']],
            ['title' => 'Pandas & Data Cleaning',  'lessons' => 9, 'duration' => '3 jam',          'free' => false, 'items' => ['DataFrame', 'Menangani data kosong', 'Menggabungkan dataset']],
            ['title' => 'Visualisasi Data',        'lessons' => 7, 'duration' => '2 jam',          'free' => false, 'items' => ['Matplotlib', 'Seaborn', 'Menyusun insight']],
            ['title' => 'Studi Kasus & Presentasi','lessons' => 4, 'duration' => '2 jam',          'free' => false, 'items' => ['Analisis dataset nyata', 'Menulis laporan', 'Presentasi hasil']],
         ]],
        ['slug' => 'digital-marketing', 'title' => 'Digital Marketing Strategy', 'program' => 'business', 'teacher' => 'Budi Santoso', 'level' => 'Pemula', 'hours' => '16 jam',
         'summary' => 'Rancang strategi pemasaran digital end-to-end yang terukur.',
         'modules' => [
            ['title' => 'Fondasi Pemasaran Digital', 'lessons' => 5, 'duration' => '1 jam',   'free' => true,  'items' => ['Customer journey', 'Menentukan target pasar', 'Channel utama']],
            ['title' => 'SEO & Konten',              'lessons' => 8, 'duration' => '2 jam 30 menit', 'free' => false, 'items' => ['Riset kata kunci', 'On-page SEO', 'Kalender konten']],
            ['title' => 'Iklan Berbayar',            'lessons' => 7, 'duration' => '2 jam',   'free' => false, 'items' => ['Meta Ads', 'Google Ads', 'Optimasi anggaran']],
            ['title' => 'Analytics & Laporan',       'lessons' => 4, 'duration' => '1 jam 30 menit', 'free' => false, 'items' => ['Menentukan KPI', 'Dashboard performa', 'Evaluasi kampanye']],
         ]],
        ['slug' => 'ui-ux', 'title' => 'UI/UX Design Basics with Figma', 'program' => 'design', 'teacher' => 'Dewi Lestari', 'level' => 'Pemula', 'hours' => '15 jam',
         'summary' => 'Pahami proses desain produk dan buat prototipe interaktif di Figma.',
         'modules' => [
            ['title' => 'Pengantar UI/UX',        'lessons' => 4, 'duration' => '50 menit', 'free' => true,  'items' => ['Peran UI dan UX', 'Proses design thinking', 'Mengenal Figma']],
            ['title' => 'Riset & Wireframe',      'lessons' => 6, 'duration' => '2 jam',    'free' => false, 'items' => ['User persona', 'User flow', 'Low-fidelity wireframe']],
            ['title' => 'Visual Design & Komponen','lessons' => 8, 'duration' => '2 jam 30 menit', 'free' => false, 'items' => ['Warna & tipografi', 'Auto layout', 'Komponen & variant']],
            ['title' => 'Prototype & Handoff',    'lessons' => 5, 'duration' => '1 jam 40 menit', 'free' => false, 'items' => ['Prototype interaktif', 'Usability test', 'Handoff ke developer']],
         ]],
    ],

    'member' => [
        // Kartu "Yang kamu dapatkan sebagai member" (halaman Member Area)
        'perks' => [
            ['icon' => 'i-play',    'tone' => 'blue',  'title' => 'Materi Kursus',   'text' => 'Lanjutkan video dan modul kapan saja, di perangkat apa saja.'],
            ['icon' => 'i-award',   'tone' => 'green', 'title' => 'Sertifikat',      'text' => 'Unduh sertifikat kelulusan setelah menyelesaikan kursus.'],
            ['icon' => 'i-sparkle', 'tone' => 'gold',  'title' => 'Fitur Eksklusif', 'text' => 'Kelas live, review proyek, dan komunitas belajar khusus member.'],
        ],
        // Dipakai preview di beranda
        'benefits' => ['Dashboard progres belajar real-time', 'Riwayat kelas & jadwal live', 'Sertifikat digital yang bisa diunduh', 'Akses forum komunitas & mentor'],
        'demo' => [
            'name' => 'Rina Putri', 'plan' => 'Professional',
            'stats' => [['label' => 'Kursus aktif', 'value' => '3'], ['label' => 'Jam belajar', 'value' => '42'], ['label' => 'Sertifikat', 'value' => '2']],
            'progress' => [['title' => 'Web Development Fundamentals', 'value' => 68], ['title' => 'Data Analysis with Python', 'value' => 35], ['title' => 'Digital Marketing Strategy', 'value' => 90]],
            'next' => ['title' => 'Data Analysis with Python', 'time' => '28 Okt · 19.00 WIB'],
        ],
    ],

    // AI FAQ (dipakai chatbot). "keywords" untuk pencocokan sederhana di sisi klien.
    'faq' => [
        'greeting' => 'Halo! Saya asisten AI E-learna. Ada yang bisa saya bantu?',
        'fallback' => 'Maaf, saya belum menemukan jawaban yang pas. Coba pilih salah satu pertanyaan di bawah, atau hubungi kami lewat WhatsApp.',
        'chips'    => [
            ['label' => 'Informasi tentang program?', 'id' => 'program'],
            ['label' => 'Jadwal kelas terbaru?',      'id' => 'jadwal'],
            ['label' => 'Cara mendaftar?',            'id' => 'daftar'],
            ['label' => 'Pertanyaan lainnya...',      'id' => '__more'],
        ],
        'items' => [
            ['id' => 'program',  'q' => 'Program apa saja yang tersedia?', 'keywords' => ['program', 'kursus', 'kelas apa', 'materi', 'belajar apa'],
             'a' => 'Ada 6 program: Programming & Tech, Design & Creative, Business & Marketing, Data Science & Analytics, Language Learning, dan Personal Development.', 'route' => 'elearning.programs', 'link' => 'Lihat semua program'],
            ['id' => 'jadwal',   'q' => 'Kapan jadwal kelas terdekat?', 'keywords' => ['jadwal', 'kapan', 'mulai', 'tanggal', 'live'],
             'a' => 'Kelas terdekat: Web Development Fundamentals pada 25 Okt pukul 10.00 - 12.00 WIB. Semua kelas live berlangsung online, beberapa workshop hybrid.', 'route' => 'elearning.schedules', 'link' => 'Lihat jadwal lengkap'],
            ['id' => 'daftar',   'q' => 'Bagaimana cara mendaftar?', 'keywords' => ['daftar', 'registrasi', 'cara', 'gabung', 'ikut'],
             'a' => 'Klik Get Started, isi formulir pendaftaran, lalu pilih program, paket, dan jadwal. Pesan pendaftaranmu otomatis disiapkan di WhatsApp untuk dikirim ke tim kami.', 'route' => 'elearning.registration', 'link' => 'Buka formulir pendaftaran'],
            ['id' => 'harga',    'q' => 'Berapa biaya paket belajar?', 'keywords' => ['harga', 'biaya', 'paket', 'bayar', 'tarif', 'diskon', 'tahunan'],
             'a' => 'Basic Rp 99.000/bulan, Professional Rp 149.000/bulan, dan Premium Rp 249.000/bulan. Pilih paket tahunan dan hemat 20%.', 'route' => 'elearning.pricing', 'link' => 'Bandingkan paket'],
            ['id' => 'pengajar', 'q' => 'Siapa saja pengajarnya?', 'keywords' => ['guru', 'pengajar', 'mentor', 'teacher', 'instruktur'],
             'a' => 'Kamu belajar dari praktisi: Dr. Andi Pratama (Software Engineer), Siti Nurhaliza (Data Scientist), Budi Santoso (Digital Marketer), dan Dewi Lestari (UI/UX Designer).', 'route' => 'elearning.teachers', 'link' => 'Kenali pengajar'],
            ['id' => 'materi',   'q' => 'Apa saja isi materi kursus?', 'keywords' => ['kurikulum', 'modul', 'isi', 'silabus', 'course content'],
             'a' => 'Setiap kursus terdiri dari modul video, latihan, dan proyek akhir. Modul pertama bisa dipelajari gratis sebagai preview.', 'route' => 'elearning.course-content', 'link' => 'Lihat course content'],
            ['id' => 'sertifikat', 'q' => 'Apakah ada sertifikat?', 'keywords' => ['sertifikat', 'certificate', 'lulus'],
             'a' => 'Ya. Setelah menyelesaikan kursus, kamu mendapat sertifikat digital yang bisa diunduh dari Member Area.', 'route' => 'elearning.member-area', 'link' => 'Buka Member Area'],
            ['id' => 'member',   'q' => 'Bagaimana cara masuk Member Area?', 'keywords' => ['login', 'masuk', 'akun', 'member', 'password', 'lupa'],
             'a' => 'Klik tombol Login di navbar, lalu masuk dengan email dan kata sandi. Belum punya akun? Klik Get Started untuk mendaftar.', 'route' => 'elearning.member-area', 'link' => 'Ke Member Area'],
        ],
    ],
];
