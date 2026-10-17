<?php

/**
 * Data statis template company-profile-terracotta (elegan).
 * Dibaca langsung oleh index.blade.php. Backend nanti cukup mengganti isi array ini.
 * Key: template.company.elegan.company-profile-terracotta.company-profile
 */
return [
    'meta' => [
        'title' => 'KreasiNusa — Creative Solution for a Better Tomorrow',
        'desc'  => 'KreasiNusa mitra kreatif dan teknologi untuk membantu pertumbuhan bisnis Anda.',
    ],
    // relatif terhadap /public
    'img' => 'images/website-bisnis/template/company/elegan/company-profile-terracotta/',

    'brand'  => ['name' => 'KreasiNusa', 'tagline' => 'Creative Solution for a Better Tomorrow'],
    'topbar' => [
        'address' => 'Jl. Wijaya No. 45, Jakarta Selatan',
        'email'   => 'hello@kreasinusa.id',
        'hours'   => 'Sen - Jum 09:00 - 18:00',
        'phone'   => '+62 812 3456 7890',
    ],
    'social' => [
        ['k' => 'in', 'n' => 'LinkedIn',  'u' => '#'],
        ['k' => 'ig', 'n' => 'Instagram', 'u' => '#'],
        ['k' => 'yt', 'n' => 'YouTube',   'u' => '#'],
    ],
    'nav' => [
        ['t' => 'Beranda', 'u' => '#beranda'], ['t' => 'Tentang Kami', 'u' => '#tentang'],
        ['t' => 'Layanan', 'u' => '#layanan'], ['t' => 'Portofolio', 'u' => '#portofolio'],
        ['t' => 'Proyek', 'u' => '#proyek'], ['t' => 'Sertifikasi', 'u' => '#sertifikasi'],
        ['t' => 'Klien', 'u' => '#klien'], ['t' => 'Kontak', 'u' => '#kontak'],
    ],

    'hero' => [
        'eyebrow' => ['Kreativitas', 'Teknologi', 'Dampak Nyata'],
        'title'   => 'Bersama Mewujudkan',
        'accent'  => 'Ide Menjadi Solusi',
        'text'    => 'KreasiNusa hadir sebagai mitra terpercaya dalam menghadirkan solusi kreatif dan inovatif untuk mendukung pertumbuhan bisnis Anda.',
        'image'   => 'hero.jpg',
        'quote'   => ['Your Vision', 'Our Strategy'],
        'cta'     => ['Jelajahi Layanan', '#layanan'],
        'cta2'    => ['Tentang Kami', '#tentang'],
    ],
    'highlights' => [
        ['i' => 'bulb',   't' => 'Solusi Kreatif',        'd' => 'Ide segar untuk masa depan'],
        ['i' => 'user',   't' => 'Tim Profesional',       'd' => 'Berpengalaman & berdedikasi'],
        ['i' => 'rocket', 't' => 'Inovasi Berkelanjutan', 'd' => 'Teknologi untuk dampak nyata'],
        ['i' => 'shield', 't' => 'Komitmen Kualitas',     'd' => 'Hasil terbaik, selalu'],
        ['i' => 'users',  't' => 'Kemitraan Jangka Panjang', 'd' => 'Tumbuh bersama klien'],
    ],

    'about' => [
        'eyebrow' => 'Tentang Kami',
        'title'   => 'Lebih dari Sekadar Penyedia Layanan',
        'text'    => 'KreasiNusa adalah perusahaan yang bergerak di bidang kreatif dan teknologi, berkomitmen untuk membantu bisnis dan organisasi mencapai tujuan mereka melalui solusi yang inovatif, efektif, dan berkelanjutan.',
        'cta'     => ['Pelajari Lebih Lanjut', '#layanan'],
        'video'   => ['image' => 'about-video.jpg', 'caption' => 'Kenalan dengan KreasiNusa', 'duration' => '2:45'],
    ],

    'services' => [
        'eyebrow' => 'Layanan Kami',
        'title'   => 'Solusi Terbaik untuk Setiap Kebutuhan Anda',
        'more'    => 'Lihat Semua Layanan',
        'items'   => [
            ['i' => 'palette', 't' => 'Branding & Identity',   'd' => 'Membangun citra yang kuat'],
            ['i' => 'monitor', 't' => 'Website & Digital',     'd' => 'Solusi digital untuk bisnis Anda'],
            ['i' => 'layout',  't' => 'UI/UX Design',          'd' => 'Pengalaman pengguna yang optimal'],
            ['i' => 'camera',  't' => 'Content Creation',      'd' => 'Konten kreatif yang berdampak'],
            ['i' => 'chart',   't' => 'Marketing Strategy',    'd' => 'Strategi untuk pertumbuhan'],
            ['i' => 'gear',    't' => 'IT Consulting',         'd' => 'Konsultasi teknologi & sistem'],
        ],
    ],

    'portfolio' => [
        'title' => 'Portofolio', 'desc' => 'Karya terbaik yang telah kami selesaikan', 'more' => 'Lihat Semua',
        'items' => [
            ['img' => 'portfolio-1.jpg', 't' => 'Branding Campaign',    'c' => 'Identitas Visual'],
            ['img' => 'portfolio-2.jpg', 't' => 'Website Development',  'c' => 'Platform Digital'],
            ['img' => 'portfolio-3.jpg', 't' => 'Social Media Strategy', 'c' => 'Konten & Engagement'],
        ],
    ],
    'projects' => [
        'title' => 'Proyek Terbaru', 'desc' => 'Inovasi yang sedang kami kerjakan', 'more' => 'Lihat Semua',
        'items' => [
            ['img' => 'project-1.jpg', 't' => 'Project Aurora',    'c' => 'Digital Platform'],
            ['img' => 'project-2.jpg', 't' => 'Project Nusantara', 'c' => 'Web & App'],
            ['img' => 'project-3.jpg', 't' => 'Project Horizon',   'c' => 'Branding Campaign'],
        ],
    ],
    'certifications' => [
        'title' => 'Sertifikasi', 'desc' => 'Standar kualitas dan kepercayaan', 'more' => 'Lihat Semua',
        'items' => [
            ['badge' => 'ISO', 't' => 'ISO 9001',  'c' => 'Quality Management'],
            ['badge' => 'ISO', 't' => 'ISO 27001', 'c' => 'Information Security'],
            ['badge' => 'BNSP', 't' => 'BNSP',     'c' => 'Sertifikasi Profesi'],
        ],
    ],
    'clients' => [
        'title' => 'Klien Kami', 'desc' => 'Dipercaya oleh berbagai perusahaan', 'more' => 'Lihat Semua',
        // ganti dengan logo asli klien (dengan izin) bila sudah tersedia
        'items' => ['Telkom Indonesia', 'Bank BRI', 'Indofood', 'Pertamina', 'Mandiri', 'Gojek'],
    ],

    'quotation' => [
        'title' => 'Dapatkan Penawaran Terbaik untuk Proyek Anda',
        'text'  => 'Konsultasikan kebutuhan Anda, dan tim kami siap memberikan solusi serta penawaran yang sesuai.',
        'cta'   => 'Minta Penawaran Sekarang',
        'image' => 'quotation-bg.jpg',
    ],
    'contact' => [
        'title' => 'Hubungi Kami', 'form' => 'Kirim Pesan', 'send' => 'Kirim Pesan',
    ],

    'ai' => [
        'title'    => 'AI Assistant',
        'subtitle' => 'Tanya apa saja tentang KreasiNusa',
        'hello'    => 'Halo! Saya AI Assistant dari KreasiNusa. Ada yang bisa saya bantu?',
        'image'    => 'ai-robot.png',
        'fallback' => 'Maaf, saya belum menemukan jawabannya. Silakan pilih topik di atas atau hubungi tim kami lewat formulir kontak.',
        'faq' => [
            ['q' => 'Informasi layanan',   'keys' => ['layanan', 'jasa', 'service'], 'a' => 'Kami menyediakan Branding & Identity, Website & Digital, UI/UX Design, Content Creation, Marketing Strategy, dan IT Consulting.'],
            ['q' => 'Harga & paket',       'keys' => ['harga', 'paket', 'biaya', 'tarif'], 'a' => 'Harga menyesuaikan kebutuhan dan skala proyek. Klik "Minta Penawaran Sekarang" dan tim kami akan menyiapkan penawaran.'],
            ['q' => 'Proses kerja',        'keys' => ['proses', 'alur', 'tahap'], 'a' => 'Alurnya: konsultasi kebutuhan, perencanaan, pengerjaan, revisi, lalu peluncuran dan pendampingan.'],
            ['q' => 'Konsultasi proyek',   'keys' => ['konsultasi', 'proyek', 'hubungi', 'kontak'], 'a' => 'Silakan isi formulir di bagian Kontak atau hubungi kami di jam kerja, Senin sampai Jumat pukul 09:00 - 18:00.'],
        ],
    ],

    'credit' => '© 2026 WEBIA by D-KREASI. Seluruh hak cipta dilindungi.',
];
