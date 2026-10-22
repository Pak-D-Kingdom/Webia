<?php

/*
|--------------------------------------------------------------------------
| E-Learning · Playful & Colorful · Pastel Mix  (EduPlus)
|--------------------------------------------------------------------------
| Sumber data tunggal untuk template. Semua view hanya membaca file ini,
| jadi tim backend nanti cukup mengganti sumbernya (DB/API) tanpa menyentuh
| markup. Akses: config('template.e-learning.playful-colorful.e-learning-pastel-mix.e-learning')
*/

$base = 'website-bisnis/template/e-learning/playful-colorful/e-learning-pastel-mix';

return [

    'meta' => [
        'title'       => 'EduPlus — Belajar Jadi Lebih Mudah, Masa Depan Lebih Cerah',
        'description' => 'EduPlus: program kursus online berkualitas bersama mentor profesional dan materi interaktif.',
    ],

    // Dipakai oleh route() & @include di seluruh view.
    'route_prefix' => 'website-bisnis.template.e-learning.playful-colorful.e-learning-pastel-mix.',
    'view'         => 'website-bisnis.template.e-learning.playful-colorful.e-learning-pastel-mix',

    'assets' => [
        'css'    => "css/{$base}/e-learning.css",
        'js'     => "js/{$base}/e-learning.js",
        'images' => "images/{$base}",
    ],

    'cdn' => [
        'fonts' => 'https://fonts.googleapis.com/css2?family=Baloo+2:wght@600;700&family=Nunito:wght@400;600;700;800&family=Poppins:wght@500;600;700;800&display=swap',
        'icons' => 'https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css',
    ],

    'brand' => [
        'name'    => 'EduPlus',
        'tagline' => 'Learn Today, Build Tomorrow',
        'credit'  => '© 2026 WEBIA by D-KREASI. Seluruh hak cipta dilindungi.',
    ],

    'contact' => [
        'address'  => 'Jl. Pendidikan No. 88, Bandung, Jawa Barat',
        'email'    => 'hello@eduplus.id',
        'hours'    => 'Sen - Jum 08:00 - 17:00',
        'phone'    => '+62 812 3456 7890',
        'phone_e164' => '+6281234567890',
        'whatsapp' => '6281234567890',
        'whatsapp_text' => 'Halo EduPlus, saya ingin bertanya tentang program kursus.',
        // Tujuan semua form kirim/submit (kecuali login). Format internasional tanpa +/0 di depan.
        'form_whatsapp'         => '62895630300345',
        'form_whatsapp_display' => '0895630300345',
    ],

    'socials' => [
        ['label' => 'Instagram', 'icon' => 'bi-instagram', 'url' => '#'],
        ['label' => 'Facebook',  'icon' => 'bi-facebook',  'url' => '#'],
        ['label' => 'YouTube',   'icon' => 'bi-youtube',   'url' => '#'],
        ['label' => 'LinkedIn',  'icon' => 'bi-linkedin',  'url' => '#'],
    ],

    // route = nama route (tanpa prefix). anchor = id section di beranda.
    'nav' => [
        ['label' => 'Home',           'route' => 'home'],
        ['label' => 'Programs',       'route' => 'programs'],
        ['label' => 'Schedules',      'route' => 'schedules'],
        ['label' => 'Teachers',       'route' => 'teachers'],
        ['label' => 'Pricing',        'route' => 'pricing'],
        ['label' => 'Course Content', 'route' => 'course-content'],
        ['label' => 'AI FAQ',         'route' => 'home', 'anchor' => 'ai-faq', 'chat' => true], // chat = buka popup AI
    ],

    'hero' => [
        'badge' => 'Online Course & E-Learning',
        'title_1' => 'Belajar Jadi Lebih Mudah,',
        'title_cyan' => 'Masa Depan',
        'title_pink' => 'Lebih Cerah!',
        'desc' => 'EduPlus hadir dengan berbagai program kursus online berkualitas, bersama mentor profesional dan materi interaktif yang seru dan mudah dipahami.',
        'search_placeholder' => 'Cari kursus yang kamu inginkan...',
        'stats' => [
            ['icon' => 'bi-award-fill',   'tone' => 'pink',   'title' => '100+',     'text' => 'Kursus Pilihan'],
            ['icon' => 'bi-person-fill',  'tone' => 'blue',   'title' => 'Mentor',   'text' => 'Profesional'],
            ['icon' => 'bi-clock-fill',   'tone' => 'rose',   'title' => 'Fleksibel','text' => 'Belajar Kapan Saja'],
            ['icon' => 'bi-display-fill', 'tone' => 'violet', 'title' => 'Online',   'text' => 'Akses di Semua Perangkat'],
        ],
    ],

    // Kursus Populer (kartu di hero). category = kunci filter di halaman Programs.
    'popular' => [
        ['title' => 'Web Development', 'category' => 'web',       'tone' => 'blue',   'image' => 'pop-web.jpg'],
        ['title' => 'UI/UX Design',    'category' => 'uiux',      'tone' => 'yellow', 'image' => 'pop-uiux.jpg'],
        ['title' => 'Digital Marketing','category' => 'marketing','tone' => 'violet', 'image' => 'pop-marketing.jpg'],
        ['title' => 'Data Science',    'category' => 'data',      'tone' => 'green',  'image' => 'pop-data.jpg'],
        ['title' => 'Bahasa Inggris',  'category' => 'english',   'tone' => 'indigo', 'image' => 'pop-english.jpg'],
        ['title' => 'Business & Finance','category' => 'business','tone' => 'peach',  'image' => 'pop-business.jpg'],
    ],

    // image = null → kartu memakai ilustrasi ikon (fallback) sehingga tidak ada gambar rusak.
    'programs' => [
        ['slug' => 'web-development-fundamentals', 'title' => 'Web Development Fundamentals', 'category' => 'web',
         'level' => 'Beginner', 'modules' => 12, 'hours' => 8, 'price' => 299000, 'image' => 'program-1.jpg', 'tone' => 'blue', 'icon' => 'bi-code-slash'],
        ['slug' => 'ui-ux-design-professional', 'title' => 'UI/UX Design Professional', 'category' => 'uiux',
         'level' => 'Intermediate', 'modules' => 14, 'hours' => 12, 'price' => 399000, 'image' => 'program-2.jpg', 'tone' => 'pink', 'icon' => 'bi-palette-fill'],
        ['slug' => 'digital-marketing-strategy', 'title' => 'Digital Marketing Strategy', 'category' => 'marketing',
         'level' => 'Beginner', 'modules' => 10, 'hours' => 8, 'price' => 349000, 'image' => 'program-3.jpg', 'tone' => 'mint', 'icon' => 'bi-megaphone-fill'],
        ['slug' => 'data-science-for-beginners', 'title' => 'Data Science for Beginners', 'category' => 'data',
         'level' => 'Advanced', 'modules' => 16, 'hours' => 10, 'price' => 349000, 'image' => 'program-4.jpg', 'tone' => 'sky', 'icon' => 'bi-bar-chart-fill'],
        ['slug' => 'english-for-career', 'title' => 'English for Career & Communication', 'category' => 'english',
         'level' => 'Beginner', 'modules' => 8, 'hours' => 6, 'price' => 249000, 'image' => null, 'tone' => 'violet', 'icon' => 'bi-chat-dots-fill'],
        ['slug' => 'business-finance-essentials', 'title' => 'Business & Finance Essentials', 'category' => 'business',
         'level' => 'Intermediate', 'modules' => 10, 'hours' => 9, 'price' => 329000, 'image' => null, 'tone' => 'peach', 'icon' => 'bi-graph-up-arrow'],
    ],

    // Slug guru dipakai oleh jadwal. rating/ulasan mengikuti desain.
    'teachers' => [
        ['slug' => 'rizky', 'name' => 'Rizky Pratama', 'role' => 'Web Developer',    'rating' => '4.9', 'reviews' => '1.2k', 'image' => 'teacher-1.jpg',
         'bio' => 'Membimbing ratusan pemula membangun website pertama mereka dengan pendekatan praktik langsung.', 'skills' => ['HTML & CSS', 'JavaScript', 'Laravel']],
        ['slug' => 'sinta', 'name' => 'Sinta Dewi',    'role' => 'UI/UX Designer',   'rating' => '4.8', 'reviews' => '980',  'image' => 'teacher-2.jpg',
         'bio' => 'Merancang antarmuka yang ramah pengguna dan mengajarkan proses desain dari riset sampai prototipe.', 'skills' => ['Figma', 'User Research', 'Prototyping']],
        ['slug' => 'andi',  'name' => 'Andi Saputra',  'role' => 'Digital Marketer', 'rating' => '4.8', 'reviews' => '756',  'image' => 'teacher-3.jpg',
         'bio' => 'Berpengalaman menyusun strategi pemasaran digital untuk brand lokal hingga nasional.', 'skills' => ['SEO', 'Social Media', 'Ads']],
        ['slug' => 'dewi',  'name' => 'Dewi Lestari',  'role' => 'Data Scientist',   'rating' => '4.9', 'reviews' => '1.1k', 'image' => 'teacher-4.jpg',
         'bio' => 'Mengubah data menjadi insight dengan penjelasan yang sederhana dan mudah dipraktikkan.', 'skills' => ['Python', 'Statistik', 'Visualisasi']],
    ],

    // Tiga grup: today, week, upcoming. 'label' opsional (hari / tanggal).
    'schedules' => [
        'tabs' => ['today' => 'Hari Ini', 'week' => 'Minggu Ini', 'upcoming' => 'Mendatang'],
        'items' => [
            'today' => [
                ['time' => '09:00 - 10:30', 'title' => 'Web Development Fundamentals', 'teacher' => 'rizky', 'status' => 'Online'],
                ['time' => '13:00 - 14:30', 'title' => 'UI/UX Design Professional',     'teacher' => 'sinta', 'status' => 'Online'],
                ['time' => '16:00 - 17:30', 'title' => 'Digital Marketing Strategy',    'teacher' => 'andi',  'status' => 'Online'],
                ['time' => '19:00 - 20:30', 'title' => 'Data Science for Beginners',    'teacher' => 'dewi',  'status' => 'Online'],
            ],
            'week' => [
                ['label' => 'Rabu',   'time' => '09:00 - 10:30', 'title' => 'Web Development Fundamentals', 'teacher' => 'rizky', 'status' => 'Online'],
                ['label' => 'Rabu',   'time' => '19:00 - 20:30', 'title' => 'Data Science for Beginners',    'teacher' => 'dewi',  'status' => 'Online'],
                ['label' => 'Kamis',  'time' => '13:00 - 14:30', 'title' => 'UI/UX Design Professional',     'teacher' => 'sinta', 'status' => 'Online'],
                ['label' => 'Kamis',  'time' => '16:00 - 17:30', 'title' => 'Digital Marketing Strategy',    'teacher' => 'andi',  'status' => 'Online'],
                ['label' => 'Jumat',  'time' => '09:00 - 10:30', 'title' => 'Web Development Fundamentals', 'teacher' => 'rizky', 'status' => 'Online'],
                ['label' => 'Jumat',  'time' => '13:00 - 14:30', 'title' => 'UI/UX Design Professional',     'teacher' => 'sinta', 'status' => 'Online'],
            ],
            'upcoming' => [
                ['label' => '26 Okt', 'time' => '09:00 - 10:30', 'title' => 'Web Development Fundamentals', 'teacher' => 'rizky', 'status' => 'Online'],
                ['label' => '26 Okt', 'time' => '16:00 - 17:30', 'title' => 'Digital Marketing Strategy',    'teacher' => 'andi',  'status' => 'Online'],
                ['label' => '27 Okt', 'time' => '13:00 - 14:30', 'title' => 'UI/UX Design Professional',     'teacher' => 'sinta', 'status' => 'Online'],
                ['label' => '27 Okt', 'time' => '19:00 - 20:30', 'title' => 'Data Science for Beginners',    'teacher' => 'dewi',  'status' => 'Online'],
            ],
        ],
    ],

    'plans' => [
        ['key' => 'basic',   'name' => 'Basic',   'tagline' => 'Akses 1 kursus',                 'price' => 199000, 'period' => '/bulan', 'popular' => false, 'tone' => 'blue',
         'features' => ['Akses 1 kursus pilihan', 'Materi video & modul', 'Forum diskusi kelas', 'Akses di semua perangkat']],
        ['key' => 'pro',     'name' => 'Pro',     'tagline' => 'Akses semua kursus dasar',       'price' => 349000, 'period' => '/bulan', 'popular' => true,  'tone' => 'green',
         'features' => ['Semua kursus level dasar', 'Materi video & modul', 'Forum diskusi kelas', 'Kelas live bersama mentor', 'Akses di semua perangkat']],
        ['key' => 'premium', 'name' => 'Premium', 'tagline' => 'Akses semua kursus + sertifikat','price' => 599000, 'period' => '/bulan', 'popular' => false, 'tone' => 'violet',
         'features' => ['Semua kursus tanpa batas', 'Sertifikat kelulusan', 'Kelas live bersama mentor', 'Review proyek dari mentor', 'Akses di semua perangkat']],
    ],

    // done = modul sudah diselesaikan. Progres dihitung otomatis di view.
    'course' => [
        'title' => 'Web Development Fundamentals', 'image' => 'program-1.jpg', 'hours' => 8,
        'modules' => [
            ['title' => 'Pengenalan HTML & CSS',        'summary' => 'Struktur halaman, tag dasar, dan gaya visual pertama.',        'lessons' => 4, 'minutes' => 45, 'done' => true],
            ['title' => 'Dasar JavaScript',             'summary' => 'Variabel, fungsi, kondisi, dan perulangan.',                    'lessons' => 5, 'minutes' => 60, 'done' => true],
            ['title' => 'Membuat Website Sederhana',    'summary' => 'Menggabungkan HTML, CSS, dan JS menjadi satu halaman utuh.',    'lessons' => 4, 'minutes' => 50, 'done' => false],
            ['title' => 'Layout dengan Flexbox & Grid', 'summary' => 'Menyusun tata letak modern yang rapi.',                         'lessons' => 3, 'minutes' => 40, 'done' => true],
            ['title' => 'Responsive Design',            'summary' => 'Media query dan pendekatan mobile-first.',                      'lessons' => 3, 'minutes' => 35, 'done' => true],
            ['title' => 'DOM & Event',                  'summary' => 'Membuat halaman interaktif dengan JavaScript.',                  'lessons' => 4, 'minutes' => 45, 'done' => true],
            ['title' => 'Form & Validasi',              'summary' => 'Membangun formulir yang nyaman dan aman digunakan.',            'lessons' => 3, 'minutes' => 35, 'done' => false],
            ['title' => 'Konsumsi API',                 'summary' => 'Mengambil dan menampilkan data dari layanan eksternal.',        'lessons' => 4, 'minutes' => 45, 'done' => false],
            ['title' => 'Git & GitHub',                 'summary' => 'Versioning dan kolaborasi kode bersama tim.',                   'lessons' => 3, 'minutes' => 30, 'done' => false],
            ['title' => 'Dasar Backend',                'summary' => 'Mengenal server, routing, dan basis data.',                     'lessons' => 4, 'minutes' => 50, 'done' => false],
            ['title' => 'Deploy Website',               'summary' => 'Mempublikasikan website agar bisa diakses semua orang.',        'lessons' => 2, 'minutes' => 25, 'done' => false],
            ['title' => 'Proyek Akhir',                 'summary' => 'Membangun portofolio website dengan bimbingan mentor.',         'lessons' => 3, 'minutes' => 60, 'done' => false],
        ],
    ],

    'registration' => [
        'title'  => 'Mulai Perjalanan Belajarmu Sekarang!',
        'desc'   => 'Daftar sekarang dan dapatkan akses ke semua kursus premium kami.',
        'cta'    => 'Daftar Sekarang',
        // Isi dengan URL POST dari backend. null = mode demo (validasi di sisi klien saja).
        'action' => null,
        'slots'  => ['Pagi (09:00 - 10:30)', 'Siang (13:00 - 14:30)', 'Sore (16:00 - 17:30)', 'Malam (19:00 - 20:30)'],
        'perks'  => ['Akses ke kelas live & rekaman', 'Mentor profesional di setiap kelas', 'Sertifikat untuk paket Premium'],
    ],

    'member' => [
        'title' => 'Member Area',
        'desc'  => 'Akses materi kursus, sertifikat, dan fitur eksklusif lainnya.',
        'cta'   => 'Masuk ke Member Area',
        'action' => null,
        'benefits' => [
            ['icon' => 'bi-play-circle-fill', 'tone' => 'blue',   'title' => 'Materi Kursus',  'text' => 'Lanjutkan video dan modul kapan saja, di perangkat apa saja.'],
            ['icon' => 'bi-patch-check-fill', 'tone' => 'green',  'title' => 'Sertifikat',     'text' => 'Unduh sertifikat kelulusan setelah menyelesaikan kursus.'],
            ['icon' => 'bi-stars',            'tone' => 'violet', 'title' => 'Fitur Eksklusif','text' => 'Kelas live, review proyek, dan komunitas belajar khusus member.'],
        ],
    ],

    'ai' => [
        'name'  => 'AI Learning Assistant',
        'intro' => 'Tanya apa saja tentang kursus, materi, atau jadwal kelas, aku siap membantu!',
        'placeholder' => 'Tulis pertanyaan Anda...',
        'fallback' => 'Maaf, aku belum punya jawaban untuk itu. Kamu bisa menghubungi tim kami lewat WhatsApp ya!',
        'faq' => [
            ['q' => 'Kursus apa yang cocok untuk pemula?', 'keywords' => ['pemula', 'cocok', 'mulai', 'beginner'],
             'a' => 'Untuk pemula, mulai dari Web Development Fundamentals, Digital Marketing Strategy, atau English for Career. Semuanya berlevel Beginner dan tidak butuh pengalaman.'],
            ['q' => 'Bagaimana cara mendapatkan sertifikat?', 'keywords' => ['sertifikat', 'certificate'],
             'a' => 'Selesaikan seluruh modul dan proyek akhir pada kursusmu. Sertifikat tersedia untuk paket Premium dan bisa diunduh di Member Area.'],
            ['q' => 'Kapan jadwal kelas berikutnya?', 'keywords' => ['jadwal', 'kelas', 'kapan', 'jam'],
             'a' => 'Jadwal kelas hari ini dimulai pukul 09:00. Kamu bisa melihat jadwal hari ini, minggu ini, dan mendatang di halaman Schedules.'],
            ['q' => 'Apa saja metode pembelajarannya?', 'keywords' => ['metode', 'belajar', 'cara', 'video', 'live'],
             'a' => 'Kamu belajar lewat video interaktif, modul latihan, kelas live bersama mentor, dan proyek akhir. Semua bisa diakses online kapan saja.'],
            ['q' => 'Berapa harga paketnya?', 'keywords' => ['harga', 'biaya', 'paket', 'bayar', 'price'],
             'a' => 'Ada tiga paket: Basic Rp 199.000, Pro Rp 349.000, dan Premium Rp 599.000 per bulan. Detailnya ada di halaman Pricing.'],
        ],
        'quick' => [0, 1, 2, 3], // indeks faq yang tampil sebagai chip
    ],

    'newsletter' => [
        'title' => 'Dapatkan Update Terbaru',
        'placeholder' => 'Masukkan email kamu...',
        'success' => 'Terima kasih! Kamu sudah masuk daftar update EduPlus.',
    ],

    'footer' => [
        'nav' => [
            ['label' => 'Home', 'route' => 'home'], ['label' => 'Programs', 'route' => 'programs'],
            ['label' => 'Schedules', 'route' => 'schedules'], ['label' => 'Teachers', 'route' => 'teachers'],
            ['label' => 'Pricing', 'route' => 'pricing'],
        ],
        'services' => [
            ['label' => 'Registration', 'route' => 'registration'], ['label' => 'Course Content', 'route' => 'course-content'],
            ['label' => 'Member Area', 'route' => 'member-area'], ['label' => 'AI FAQ', 'route' => 'home', 'anchor' => 'ai-faq', 'chat' => true],
        ],
    ],
];
