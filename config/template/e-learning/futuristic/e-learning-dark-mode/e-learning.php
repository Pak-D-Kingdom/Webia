<?php

/*
|--------------------------------------------------------------------------
| NovaLearn · E-Learning · Futuristic · Dark Mode
|--------------------------------------------------------------------------
| Data statis template (frontend). Backend cukup mengganti isi array ini
| dengan data dari database/API tanpa mengubah file blade.
| Key config otomatis: template.e-learning.futuristic.e-learning-dark-mode.e-learning
| (hanya array biasa, tanpa closure, supaya aman untuk `config:cache`).
*/

return [

    // ---- Path view / route / aset ------------------------------------
    'view'  => 'website-bisnis.template.e-learning.futuristic.e-learning-dark-mode',
    'route' => 'e-learning-dark-mode.',
    'css'   => 'css/website-bisnis/template/e-learning/futuristic/e-learning-dark-mode',
    'js'    => 'js/website-bisnis/template/e-learning/futuristic/e-learning-dark-mode',
    'img'   => 'images/website-bisnis/template/e-learning/futuristic/e-learning-dark-mode',

    // Form registrasi/login: '#' = mode statis (ditangani JS). Isi URL backend bila sudah siap.
    'registration_action' => '#',
    'login_action'        => '#',

    'brand' => [
        'name'    => 'NovaLearn',
        'tagline' => 'Learn Today, Build Tomorrow',
        'credit'  => '© 2026 WEBIA by D-KREASI. Seluruh hak cipta dilindungi.',
    ],

    // ---- Topbar ------------------------------------------------------
    'topbar' => [
        'address' => 'Jl. Teknologi No. 101, Bandung, Jawa Barat',
        'email'   => 'support@novalearn.id',
        'hours'   => 'Sen - Jum 08:00 - 17:00',
        'phone'   => '+62 812 3456 7890',
        'phone_href' => '+6281234567890',
    ],

    'socials' => [
        ['icon' => 'instagram', 'label' => 'Instagram', 'url' => '#'],
        ['icon' => 'youtube',   'label' => 'YouTube',   'url' => '#'],
        ['icon' => 'linkedin',  'label' => 'LinkedIn',  'url' => '#'],
        ['icon' => 'x',         'label' => 'X (Twitter)', 'url' => '#'],
    ],

    'whatsapp' => [
        'number'  => '6281234567890',
        'message' => 'Halo NovaLearn, saya ingin bertanya tentang kursus.',
    ],

    // ---- Navigasi (nama route tanpa prefix) ---------------------------
    'nav' => [
        ['label' => 'Home',           'route' => 'home'],
        ['label' => 'Programs',       'route' => 'programs'],
        ['label' => 'Schedules',      'route' => 'schedules'],
        ['label' => 'Teachers',       'route' => 'teachers'],
        ['label' => 'Pricing',        'route' => 'pricing'],
        ['label' => 'Course Content', 'route' => 'course-content'],
    ],

    'footer' => [
        'navigasi' => [
            ['label' => 'Home',      'route' => 'home'],
            ['label' => 'Programs',  'route' => 'programs'],
            ['label' => 'Schedules', 'route' => 'schedules'],
            ['label' => 'Teachers',  'route' => 'teachers'],
        ],
        'akses' => [
            ['label' => 'Pricing',        'route' => 'pricing'],
            ['label' => 'Registration',   'route' => 'registration'],
            ['label' => 'Course Content', 'route' => 'course-content'],
            ['label' => 'Member Area',    'route' => 'member-area'],
        ],
    ],

    // ---- Hero --------------------------------------------------------
    'hero' => [
        'badge'    => 'Online Course & E-Learning',
        'title'    => 'Your Future Skills',
        'title_2'  => 'Start Here',
        'text'     => 'Tingkatkan skill, raih karier impian! NovaLearn hadir dengan kursus online berkualitas, mentor profesional, dan materi interaktif yang siap membantumu berkembang.',
        'search'   => 'Cari kursus yang kamu inginkan...',
        'features' => [
            ['icon' => 'building', 'value' => '100+',        'label' => 'Kursus Pilihan'],
            ['icon' => 'user',     'value' => 'Expert',      'label' => 'Pengajar Profesional'],
            ['icon' => 'clock',    'value' => 'Fleksibel',   'label' => 'Belajar Kapan Saja'],
            ['icon' => 'award',    'value' => 'Sertifikat',  'label' => 'Setelah Lulus'],
        ],
        'journey_title' => 'Mulai Perjalanan Belajarmu',
        'journey_text'  => 'Pilih program yang sesuai dengan tujuanmu.',
    ],

    'categories' => [
        'programming' => ['label' => 'Programming & Development', 'icon' => 'code'],
        'uiux'        => ['label' => 'UI/UX Design',               'icon' => 'pen'],
        'marketing'   => ['label' => 'Digital Marketing',          'icon' => 'megaphone'],
        'data'        => ['label' => 'Data Science & Analytics',   'icon' => 'chart'],
        'business'    => ['label' => 'Business & Finance',         'icon' => 'briefcase'],
        'language'    => ['label' => 'Language',                   'icon' => 'globe'],
    ],

    // ---- Programs ----------------------------------------------------
    'programs' => [
        ['slug' => 'web-development-fundamentals', 'title' => 'Web Development Fundamentals', 'level' => 'Beginner',     'cat' => 'programming', 'modules' => 12, 'hours' => 8,  'price' => 299000, 'img' => 'program-web.png'],
        ['slug' => 'ui-ux-design-professional',    'title' => 'UI/UX Design Professional',    'level' => 'Intermediate', 'cat' => 'uiux',        'modules' => 14, 'hours' => 12, 'price' => 399000, 'img' => 'program-uiux.png'],
        ['slug' => 'data-analysis-with-python',    'title' => 'Data Analysis with Python',    'level' => 'Beginner',     'cat' => 'data',        'modules' => 10, 'hours' => 10, 'price' => 349000, 'img' => 'program-data.png'],
        ['slug' => 'digital-marketing-strategy',   'title' => 'Digital Marketing Strategy',   'level' => 'Advanced',     'cat' => 'marketing',   'modules' => 16, 'hours' => 12, 'price' => 279000, 'img' => 'program-marketing.png'],
    ],

    // ---- Teachers ----------------------------------------------------
    'teachers' => [
        'rizky' => ['name' => 'Rizky Pratama', 'role' => 'Web Developer',    'rating' => '4.9', 'reviews' => '1.2k', 'img' => 'teacher-rizky.png'],
        'sinta' => ['name' => 'Sinta Dewi',    'role' => 'UI/UX Designer',   'rating' => '4.8', 'reviews' => '980',  'img' => 'teacher-sinta.png'],
        'andi'  => ['name' => 'Andi Saputra',  'role' => 'Digital Marketer', 'rating' => '4.8', 'reviews' => '756',  'img' => 'teacher-andi.png'],
        'dewi'  => ['name' => 'Dewi Lestari',  'role' => 'Data Scientist',   'rating' => '4.9', 'reviews' => '1.1k', 'img' => 'teacher-dewi.png'],
    ],

    // ---- Schedules ---------------------------------------------------
    'schedule_tabs' => ['today' => 'Hari Ini', 'week' => 'Minggu Ini', 'upcoming' => 'Mendatang'],
    'schedules' => [
        'today' => [
            ['day' => 'Hari ini', 'time' => '08:00 - 10:00', 'title' => 'Web Development Fundamentals', 'teacher' => 'rizky', 'status' => 'Online'],
            ['day' => 'Hari ini', 'time' => '10:30 - 12:30', 'title' => 'UI/UX Design Professional',    'teacher' => 'sinta', 'status' => 'Online'],
            ['day' => 'Hari ini', 'time' => '14:00 - 16:00', 'title' => 'Digital Marketing Strategy',   'teacher' => 'andi',  'status' => 'Online'],
            ['day' => 'Hari ini', 'time' => '19:00 - 20:30', 'title' => 'Data Science for Beginners',   'teacher' => 'dewi',  'status' => 'Online'],
        ],
        'week' => [
            ['day' => 'Kamis',  'time' => '08:00 - 10:00', 'title' => 'Web Development Fundamentals', 'teacher' => 'rizky', 'status' => 'Online'],
            ['day' => 'Kamis',  'time' => '13:00 - 15:00', 'title' => 'UI/UX Design Professional',    'teacher' => 'sinta', 'status' => 'Online'],
            ['day' => 'Jumat',  'time' => '09:00 - 11:00', 'title' => 'Digital Marketing Strategy',   'teacher' => 'andi',  'status' => 'Online'],
            ['day' => 'Jumat',  'time' => '14:00 - 16:00', 'title' => 'Data Science for Beginners',   'teacher' => 'dewi',  'status' => 'Online'],
        ],
        'upcoming' => [
            ['day' => 'Senin',  'time' => '08:00 - 10:00', 'title' => 'Web Development Fundamentals', 'teacher' => 'rizky', 'status' => 'Online'],
            ['day' => 'Selasa', 'time' => '10:30 - 12:30', 'title' => 'UI/UX Design Professional',    'teacher' => 'sinta', 'status' => 'Online'],
            ['day' => 'Rabu',   'time' => '14:00 - 16:00', 'title' => 'Digital Marketing Strategy',   'teacher' => 'andi',  'status' => 'Online'],
            ['day' => 'Kamis',  'time' => '19:00 - 20:30', 'title' => 'Data Science for Beginners',   'teacher' => 'dewi',  'status' => 'Online'],
        ],
    ],

    // ---- Pricing -----------------------------------------------------
    'pricing' => [
        'title'   => 'Harga Paket',
        'text'    => 'Pilih paket yang sesuai dengan kebutuhanmu.',
        'saving'  => 'Hemat 20%',
        'plans' => [
            ['slug' => 'basic',   'name' => 'Basic',   'desc' => 'Akses 1 kursus',              'monthly' => 199000, 'yearly' => 159000, 'popular' => false,
             'features' => ['Akses 1 kursus', 'Materi interaktif', 'Belajar kapan saja']],
            ['slug' => 'pro',     'name' => 'Pro',     'desc' => 'Akses semua kursus dasar',    'monthly' => 349000, 'yearly' => 279000, 'popular' => true,
             'features' => ['Akses semua kursus dasar', 'Materi interaktif', 'Jadwal kelas online']],
            ['slug' => 'premium', 'name' => 'Premium', 'desc' => 'Akses penuh + sertifikat',    'monthly' => 599000, 'yearly' => 479000, 'popular' => false,
             'features' => ['Akses penuh semua kursus', 'Sertifikat setelah lulus', 'Jadwal kelas online']],
        ],
    ],

    // ---- Registration ------------------------------------------------
    'registration' => [
        'badge'  => 'Kursus Online Bersertifikat',
        'title'  => 'Upgrade Karier',
        'text'   => 'Dapatkan sertifikat resmi setelah menyelesaikan kursus dan tingkatkan peluang kariermu!',
    ],

    // ---- Course content ----------------------------------------------
    'course' => [
        'title'    => 'Web Development Fundamentals',
        'duration' => '31:45',
        'done'     => [1, 2, 3],
        'groups' => [
            'Bagian 1 · Dasar Website' => [
                1 => 'Pengenalan HTML & CSS',
                2 => 'Struktur Website Sederhana',
                3 => 'Styling dengan CSS',
                4 => 'Responsive Design',
            ],
            'Bagian 2 · Interaksi' => [
                5 => 'Layout Flexbox & Grid',
                6 => 'Dasar JavaScript',
                7 => 'Manipulasi DOM',
                8 => 'Form & Validasi',
            ],
            'Bagian 3 · Proyek' => [
                9  => 'Git & GitHub',
                10 => 'Optimasi Website',
                11 => 'Deploy Website',
                12 => 'Proyek Akhir',
            ],
        ],
    ],

    // ---- Member area -------------------------------------------------
    'member' => [
        'title' => 'Member Area',
        'text'  => 'Akses materi kursus, progres, sertifikat, dan fitur eksklusif lainnya.',
        'cta'   => 'Masuk ke Member Area',
        'items' => [
            ['icon' => 'book',    'title' => 'Materi Kursus',   'text' => 'Akses semua materi dari kursus yang kamu ikuti.'],
            ['icon' => 'chart',   'title' => 'Progres Belajar', 'text' => 'Pantau kemajuan belajarmu di setiap modul.'],
            ['icon' => 'award',   'title' => 'Sertifikat',      'text' => 'Unduh sertifikat setelah menyelesaikan kursus.'],
            ['icon' => 'sparkle', 'title' => 'Fitur Eksklusif', 'text' => 'Nikmati fitur khusus untuk member NovaLearn.'],
        ],
    ],

    // ---- AI Learning Assistant (FAQ) ---------------------------------
    'ai' => [
        'name'     => 'AI Learning Assistant',
        'greeting' => 'Halo! Saya Nova, asisten AI NovaLearn. Ada yang bisa saya bantu?',
        'input'    => 'Tulis pertanyaan Anda...',
        'fallback' => 'Maaf, saya belum menemukan jawabannya. Coba salah satu pertanyaan di atas, atau hubungi kami lewat WhatsApp.',
        'faq' => [
            ['q' => 'Kursus apa yang cocok untuk pemula?',
             'keywords' => ['pemula', 'beginner', 'mulai', 'dasar', 'cocok'],
             'a' => 'Untuk pemula, mulai dari Web Development Fundamentals atau Data Analysis with Python. Keduanya berlevel Beginner dan dirancang dari dasar.',
             'route' => 'programs'],
            ['q' => 'Bagaimana cara mendapatkan sertifikat?',
             'keywords' => ['sertifikat', 'certificate', 'lulus'],
             'a' => 'Sertifikat resmi diberikan setelah kamu menyelesaikan kursus. Paket Premium sudah termasuk sertifikat.',
             'route' => 'pricing'],
            ['q' => 'Kapan jadwal kelas berikutnya?',
             'keywords' => ['jadwal', 'kelas', 'kapan', 'jam'],
             'a' => 'Kelas hari ini dimulai pukul 08:00 dengan Web Development Fundamentals. Lihat jadwal lengkap di halaman Schedules.',
             'route' => 'schedules'],
            ['q' => 'Rekomendasi kursus untuk karier saya?',
             'keywords' => ['karier', 'karir', 'rekomendasi', 'kerja', 'profesi'],
             'a' => 'Tertarik jadi developer? Ambil Web Development. Suka desain? UI/UX Design. Suka data? Data Analysis with Python. Suka pemasaran? Digital Marketing Strategy.',
             'route' => 'programs'],
            ['q' => 'Berapa harga paket belajar?',
             'keywords' => ['harga', 'paket', 'biaya', 'bayar', 'berapa'],
             'a' => 'Paket Basic Rp 199.000, Pro Rp 349.000, dan Premium Rp 599.000 per bulan. Paket tahunan hemat 20%.',
             'route' => 'pricing'],
            ['q' => 'Bagaimana cara mendaftar?',
             'keywords' => ['daftar', 'registrasi', 'registration', 'gabung', 'akun'],
             'a' => 'Klik Get Started, isi formulir registrasi, lalu pilih program dan paket yang kamu inginkan.',
             'route' => 'registration'],
        ],
        // 4 pertanyaan pertama ditampilkan sebagai tombol cepat
        'quick' => 4,
    ],
];
