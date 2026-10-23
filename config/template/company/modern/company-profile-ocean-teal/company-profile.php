<?php

/*
|--------------------------------------------------------------------------
| Company Profile - Modern / Ocean Teal
|--------------------------------------------------------------------------
| Seluruh konten statis template dibaca dari file ini.
| Key config  : template.company.modern.company-profile-ocean-teal.company-profile
| Backend dapat mengganti nilai di sini (mis. dari database) tanpa mengubah view.
*/

return [

    'meta' => [
        'title'       => 'Inovatek - Solusi Teknologi untuk Masa Depan yang Lebih Baik',
        'description' => 'Inovatek menghadirkan solusi digital inovatif yang membantu bisnis Anda berkembang lebih cepat, efisien, dan berkelanjutan.',
    ],

    // Path relatif terhadap folder /public
    'paths' => [
        'css'    => 'css/website-bisnis/template/company/modern/company-profile-ocean-teal',
        'js'     => 'js/website-bisnis/template/company/modern/company-profile-ocean-teal',
        'images' => 'images/website-bisnis/template/company/modern/company-profile-ocean-teal',
    ],

    // Nama route (didaftarkan di routes/web.php)
    'routes' => [
        'home'      => 'company-profile-ocean-teal.home',
        'about'     => 'company-profile-ocean-teal.about',
        'portfolio' => 'company-profile-ocean-teal.portfolio',
    ],

    'brand' => [
        'name'      => 'Inovatek',
        'tagline'   => 'Build Better Tomorrow',
        'logo'      => 'logo-mark.png',
        'logo_dark' => 'logo-mark-dark.png',
    ],

    'topbar' => [
        'address'    => 'Jl. Teknologi No. 88, Jakarta Selatan',
        'email'      => 'info@inovatek.com',
        'hours'      => 'Sen - Jum 08:00 - 17:00',
        'phone'      => '+62 812 3456 7890',
        'phone_href' => '+6281234567890',
    ],

    'socials' => [
        ['icon' => 'linkedin',  'label' => 'LinkedIn',  'url' => '#'],
        ['icon' => 'instagram', 'label' => 'Instagram', 'url' => '#'],
        ['icon' => 'youtube',   'label' => 'YouTube',   'url' => '#'],
    ],

    // Menu navbar. route => key di 'routes'; anchor => id section di beranda
    'nav' => [
        ['key' => 'home',        'label' => 'Beranda',     'route' => 'home', 'anchor' => null],
        ['key' => 'layanan',     'label' => 'Layanan',     'route' => 'home', 'anchor' => 'layanan'],
        ['key' => 'proyek',      'label' => 'Proyek',      'route' => 'home', 'anchor' => 'proyek'],
        ['key' => 'sertifikasi', 'label' => 'Sertifikasi', 'route' => 'home', 'anchor' => 'sertifikasi'],
        ['key' => 'klien',       'label' => 'Klien',       'route' => 'home', 'anchor' => 'klien'],
        ['key' => 'kontak',      'label' => 'Kontak',      'route' => 'home', 'anchor' => 'kontak'],
    ],

    // Menu footer (sesuai desain UI: lengkap, termasuk halaman Tentang Kami & Portofolio)
    'footer_nav' => [
        ['key' => 'home',        'label' => 'Beranda',      'route' => 'home',      'anchor' => null],
        ['key' => 'about',       'label' => 'Tentang Kami', 'route' => 'about',     'anchor' => null],
        ['key' => 'layanan',     'label' => 'Layanan',      'route' => 'home',      'anchor' => 'layanan'],
        ['key' => 'portfolio',   'label' => 'Portofolio',   'route' => 'portfolio', 'anchor' => null],
        ['key' => 'proyek',      'label' => 'Proyek',       'route' => 'home',      'anchor' => 'proyek'],
        ['key' => 'sertifikasi', 'label' => 'Sertifikasi',  'route' => 'home',      'anchor' => 'sertifikasi'],
        ['key' => 'klien',       'label' => 'Klien',        'route' => 'home',      'anchor' => 'klien'],
        ['key' => 'kontak',      'label' => 'Kontak',       'route' => 'home',      'anchor' => 'kontak'],
    ],

    // Floating WhatsApp (nomor format internasional tanpa + / spasi)
    'whatsapp' => [
        'number'  => '62895630300345', // 0895630300345 (format internasional, tanpa + / spasi)
        'message' => 'Halo Inovatek, saya ingin berkonsultasi mengenai kebutuhan teknologi bisnis saya.',
        'label'   => 'Chat WhatsApp',
    ],
    'nav_cta' => ['label' => 'Hubungi Kami', 'route' => 'home', 'anchor' => 'kontak'],

    'hero' => [
        'eyebrow' => 'Transforming Ideas into Digital Solutions',
        'title'   => ['Solusi Teknologi untuk', 'Masa Depan yang Lebih Baik'],
        'text'    => 'Kami menghadirkan solusi digital inovatif yang membantu bisnis Anda berkembang lebih cepat, efisien, dan berkelanjutan.',
        'primary' => ['label' => 'Jelajahi Layanan', 'anchor' => 'layanan'],
        'secondary' => ['label' => 'Tentang Kami', 'route' => 'about'],
        'image'   => 'hero-building.jpg',
        'image_alt' => 'Gedung kantor Inovatek',
        'tagline' => 'Your Technology Partner',
        'stats'   => [
            ['icon' => 'clock',     'value' => '5+',   'label' => 'Tahun Pengalaman'],
            ['icon' => 'briefcase', 'value' => '100+', 'label' => 'Proyek Selesai'],
            ['icon' => 'heart',     'value' => '50+',  'label' => 'Klien Puas'],
            ['icon' => 'smile',     'value' => '99%',  'label' => 'Tingkat Kepuasan'],
        ],
    ],

    'about' => [
        'label' => 'Tentang Kami',
        'name'  => 'Inovatek',
        'paragraphs' => [
            'Inovatek adalah perusahaan teknologi yang berfokus pada pengembangan solusi digital untuk membantu bisnis di berbagai industri mencapai tujuan mereka melalui inovasi, kualitas, dan komitmen yang tinggi.',
            'Dengan tim yang berpengalaman di bidang pengembangan perangkat lunak, desain, dan infrastruktur, kami mendampingi klien dari tahap perencanaan hingga layanan purna jual yang responsif.',
        ],
        'image'      => 'about-video.jpg',
        'image_alt'  => 'Tim Inovatek bekerja di kantor',
        'video_url'  => 'https://www.youtube.com/embed/ScMzIvxBSi4', // ganti dengan video profil perusahaan
        'video_caption' => ['Tonton Video Profil Perusahaan', '2:45'],
        'vision'  => 'Menjadi mitra teknologi tepercaya yang mendorong pertumbuhan bisnis di Indonesia.',
        'mission' => [
            'Menghadirkan solusi digital yang inovatif dan terukur.',
            'Menjaga kualitas dan keamanan di setiap tahap pengerjaan.',
            'Membangun hubungan jangka panjang melalui layanan yang responsif.',
        ],
        'values' => [
            ['icon' => 'bolt',   'title' => 'Inovasi',   'text' => 'Selalu mencari cara baru yang lebih efisien untuk menjawab kebutuhan bisnis.'],
            ['icon' => 'shield', 'title' => 'Kualitas',  'text' => 'Standar kerja yang teruji dan sesuai sertifikasi internasional.'],
            ['icon' => 'users',  'title' => 'Kolaborasi', 'text' => 'Bekerja bersama klien sebagai satu tim, transparan di setiap langkah.'],
        ],
        'button' => 'Pelajari Lebih Lanjut',
    ],

    'services' => [
        'title' => 'Layanan Kami',
        'subtitle' => 'Solusi Terbaik untuk Kebutuhan Anda',
        'items' => [
            ['icon' => 'monitor',   'title' => 'Pengembangan Web & Aplikasi', 'text' => 'Website, mobile apps, dan sistem terintegrasi.'],
            ['icon' => 'layout',    'title' => 'UI/UX Design',                'text' => 'Desain antarmuka yang fungsional dan menarik.'],
            ['icon' => 'consult',   'title' => 'IT Consulting',               'text' => 'Konsultasi teknologi untuk strategi bisnis Anda.'],
            ['icon' => 'cloud',     'title' => 'Cloud & Infrastructure',      'text' => 'Solusi cloud yang aman dan skalabel.'],
            ['icon' => 'megaphone', 'title' => 'Digital Marketing',           'text' => 'Tingkatkan visibilitas dan jangkauan bisnis Anda.'],
            ['icon' => 'support',   'title' => 'Maintenance & Support',       'text' => 'Dukungan teknis yang responsif dan profesional.'],
        ],
    ],

    'portfolio' => [
        'title' => 'Portofolio',
        'subtitle' => 'Karya terbaik kami untuk klien',
        'preview_count' => 3,
        'page_title' => 'Portofolio Kami',
        'page_text' => 'Kumpulan karya terbaik yang kami kerjakan bersama klien dari berbagai industri.',
        'categories' => ['web' => 'Website', 'mobile' => 'Aplikasi Mobile', 'sistem' => 'Sistem'],
        'items' => [
            ['title' => 'Website E-Commerce',  'category' => 'Toko Online',        'type' => 'web',    'image' => 'portfolio-1.jpg'],
            ['title' => 'Mobile App',          'category' => 'Aplikasi Pendidikan', 'type' => 'mobile', 'image' => 'portfolio-2.jpg'],
            ['title' => 'Dashboard System',    'category' => 'Sistem Manajemen',   'type' => 'sistem', 'image' => 'portfolio-3.jpg'],
            ['title' => 'Sistem ERP',          'category' => 'Manufaktur',         'type' => 'sistem', 'image' => 'project-1.jpg'],
            ['title' => 'Aplikasi Mobile',     'category' => 'Kesehatan',          'type' => 'mobile', 'image' => 'project-2.jpg'],
            ['title' => 'Website Perusahaan',  'category' => 'Fintech',            'type' => 'web',    'image' => 'project-3.jpg'],
        ],
    ],

    'projects' => [
        'title' => 'Proyek Terbaru',
        'subtitle' => 'Solusi teknologi untuk berbagai industri',
        'items' => [
            ['title' => 'Sistem ERP',          'category' => 'Manufaktur', 'status' => 'In Progress', 'state' => 'progress',  'image' => 'project-1.jpg'],
            ['title' => 'Aplikasi Mobile',     'category' => 'Kesehatan',  'status' => 'Completed',   'state' => 'completed', 'image' => 'project-2.jpg'],
            ['title' => 'Website Perusahaan',  'category' => 'Fintech',    'status' => 'Completed',   'state' => 'completed', 'image' => 'project-3.jpg'],
        ],
    ],

    'certifications' => [
        'title' => 'Sertifikasi',
        'subtitle' => 'Standar kualitas dan keamanan',
        'items' => [
            ['badge' => 'iso',     'title' => 'ISO 9001',          'text' => 'Quality Management'],
            ['badge' => 'iso',     'title' => 'ISO 27001',         'text' => 'Information Security'],
            ['badge' => 'partner', 'title' => 'Microsoft Partner', 'text' => 'Microsoft Partner'],
        ],
    ],

    'clients' => [
        'title' => 'Klien Kami',
        'subtitle' => 'Dipercaya oleh berbagai perusahaan',
        'items' => [
            ['name' => 'BCA',               'logo' => 'client-bca.png'],
            ['name' => 'Telkom Indonesia',  'logo' => 'client-telkom.png'],
            ['name' => 'Indofood',          'logo' => 'client-indofood.png'],
            ['name' => 'Pertamina',         'logo' => 'client-pertamina.png'],
            ['name' => 'Bank Mandiri',      'logo' => 'client-mandiri.png'],
            ['name' => 'Gojek',             'logo' => 'client-gojek.png'],
        ],
    ],

    'cta' => [
        'title'  => 'Ingin Memulai Proyek Bersama Kami?',
        'text'   => 'Konsultasikan kebutuhan Anda dengan tim ahli kami.',
        'button' => 'Dapatkan Penawaran',
    ],

    'contact' => [
        'title' => 'Kontak Kami',
    ],

    // Quotation lead. Pesan dikirim ke WhatsApp (nomor di 'whatsapp.number').
    // Opsional: isi 'action' dengan URL endpoint backend agar data juga dikirim via POST.
    'quotation' => [
        'action'   => null,
        'title'    => 'Dapatkan Penawaran',
        'text'     => 'Isi formulir singkat ini. Pesan Anda akan dikirim ke tim kami melalui WhatsApp.',
        'submit'   => 'Kirim via WhatsApp',
        'success'  => 'WhatsApp terbuka dengan pesan Anda. Tekan kirim di WhatsApp untuk menyelesaikan.',
        'error'    => 'Pesan belum terkirim. Periksa koneksi Anda lalu coba lagi.',
        'wa_intro' => 'Halo Inovatek, saya ingin meminta penawaran.',
    ],

    'ai_faq' => [
        'title'     => 'AI Company FAQ',
        'tip'       => 'Ada pertanyaan? Tanya AI kami!',
        'bubble'    => ['Ada pertanyaan tentang layanan kami?', 'Tanyakan apa saja, kami siap membantu!'],
        'button'    => 'Mulai Chat',
        'greeting'  => 'Halo! Saya asisten AI Inovatek. Pilih pertanyaan di bawah atau ketik pertanyaan Anda.',
        'fallback'  => 'Maaf, saya belum menemukan jawabannya. Silakan lanjutkan pertanyaan Anda langsung ke tim kami melalui WhatsApp.',
        'wa_button' => 'Lanjutkan via WhatsApp',
        'placeholder' => 'Ketik pertanyaan Anda...',
        'items' => [
            ['q' => 'Layanan apa saja yang tersedia?',
             'a' => 'Kami menyediakan pengembangan web & aplikasi, UI/UX design, IT consulting, cloud & infrastructure, digital marketing, serta maintenance & support.',
             'k' => ['layanan', 'jasa', 'service', 'apa saja']],
            ['q' => 'Bagaimana cara meminta penawaran?',
             'a' => 'Klik tombol "Dapatkan Penawaran", isi formulir singkat, dan tim kami akan menghubungi Anda dalam 1x24 jam kerja.',
             'k' => ['penawaran', 'quotation', 'harga', 'biaya', 'tarif']],
            ['q' => 'Berapa lama pengerjaan proyek?',
             'a' => 'Durasi bergantung pada skala dan kompleksitas proyek. Setelah konsultasi awal, kami akan memberikan estimasi jadwal yang jelas.',
             'k' => ['lama', 'durasi', 'waktu', 'jadwal', 'estimasi']],
            ['q' => 'Apakah ada dukungan setelah proyek selesai?',
             'a' => 'Ya. Layanan maintenance & support kami siap membantu pemeliharaan, perbaikan, dan pengembangan lanjutan.',
             'k' => ['support', 'dukungan', 'maintenance', 'garansi', 'purna']],
            ['q' => 'Sertifikasi apa yang dimiliki Inovatek?',
             'a' => 'Kami memiliki sertifikasi ISO 9001 (Quality Management), ISO 27001 (Information Security), dan berstatus Microsoft Partner.',
             'k' => ['sertifikasi', 'iso', 'microsoft', 'partner', 'keamanan']],
        ],
    ],

    'footer' => [
        'copyright' => '© 2026 Inovatek. All rights reserved.',
        'credit'    => '© 2026 WEBIA by D-KREASI. Seluruh hak cipta dilindungi.',
    ],
];
