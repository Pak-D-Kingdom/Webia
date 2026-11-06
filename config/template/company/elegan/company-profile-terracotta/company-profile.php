<?php

/**
 * Data statis template company-profile-terracotta (elegan).
 * Dibaca langsung oleh view. Backend nanti cukup mengganti isi array ini.
 * Key: template.company.elegan.company-profile-terracotta.company-profile
 *
 * Link: 'h' = anchor di beranda, 'r' = nama route halaman sendiri.
 */
return [
    'meta' => [
        'title' => 'KreasiNusa — Creative Solution for a Better Tomorrow',
        'desc' => 'KreasiNusa mitra kreatif dan teknologi untuk membantu pertumbuhan bisnis Anda.',
    ],
    'img' => 'images/website-bisnis/template/company/elegan/company-profile-terracotta/', // relatif ke /public

    'brand' => ['name' => 'KreasiNusa', 'tagline' => 'Creative Solution for a Better Tomorrow'],
    'topbar' => [
        'address' => 'Jl. Wijaya No. 45, Jakarta Selatan',
        'email' => 'hello@kreasinusa.id',
        'hours' => 'Sen - Jum 09:00 - 18:00',
        'phone' => '+62 812 3456 7890',
    ],
    'whatsapp' => [
        'number' => '62895630300345', // 0895630300345 → format internasional tanpa + atau 0; dipakai tombol floating, panel kontak, dan form
        'text' => 'Halo KreasiNusa, saya ingin berkonsultasi tentang proyek saya.',
        'label' => 'Chat WhatsApp',
        'form_intro' => 'Halo KreasiNusa, saya mengirim pesan melalui website.',
    ],
    'social' => [
        ['k' => 'in', 'n' => 'LinkedIn',  'u' => '#'],
        ['k' => 'ig', 'n' => 'Instagram', 'u' => '#'],
        ['k' => 'yt', 'n' => 'YouTube',   'u' => '#'],
    ],

    // Navbar: Tentang Kami & Portofolio sudah punya halaman sendiri, jadi tidak ada di sini.
    'nav' => [
        ['t' => 'Beranda',     'h' => '#beranda'],
        ['t' => 'Layanan',     'h' => '#layanan'],
        ['t' => 'Proyek',      'h' => '#proyek'],
        ['t' => 'Sertifikasi', 'h' => '#sertifikasi'],
        ['t' => 'Klien',       'h' => '#klien'],
        ['t' => 'Kontak',      'h' => '#kontak'],
    ],
    'footer_links' => [
        ['t' => 'Beranda',      'h' => '#beranda'],
        ['t' => 'Tentang Kami', 'r' => 'company-terracotta.about'],
        ['t' => 'Layanan',      'h' => '#layanan'],
        ['t' => 'Portofolio',   'r' => 'company-terracotta.portfolio'],
        ['t' => 'Proyek',       'h' => '#proyek'],
        ['t' => 'Sertifikasi',  'h' => '#sertifikasi'],
        ['t' => 'Klien',        'h' => '#klien'],
        ['t' => 'Kontak',       'h' => '#kontak'],
    ],

    'hero' => [
        'eyebrow' => ['Kreativitas', 'Teknologi', 'Dampak Nyata'],
        'title' => 'Bersama Mewujudkan',
        'accent' => 'Ide Menjadi Solusi',
        'text' => 'KreasiNusa hadir sebagai mitra terpercaya dalam menghadirkan solusi kreatif dan inovatif untuk mendukung pertumbuhan bisnis Anda.',
        'image' => 'hero.svg',
        'quote' => ['Your Vision', 'Our Strategy'],
        'cta' => ['t' => 'Jelajahi Layanan', 'h' => '#layanan'],
        'cta2' => ['t' => 'Tentang Kami', 'r' => 'company-terracotta.about'],
    ],
    'highlights' => [
        ['i' => 'bulb',   't' => 'Solusi Kreatif',           'd' => 'Ide segar untuk masa depan'],
        ['i' => 'user',   't' => 'Tim Profesional',          'd' => 'Berpengalaman & berdedikasi'],
        ['i' => 'rocket', 't' => 'Inovasi Berkelanjutan',    'd' => 'Teknologi untuk dampak nyata'],
        ['i' => 'shield', 't' => 'Komitmen Kualitas',        'd' => 'Hasil terbaik, selalu'],
        ['i' => 'users',  't' => 'Kemitraan Jangka Panjang', 'd' => 'Tumbuh bersama klien'],
    ],

    // Halaman Tentang Kami
    'about' => [
        'eyebrow' => 'Tentang Kami',
        'title' => 'Lebih dari Sekadar Penyedia Layanan',
        'text' => 'KreasiNusa adalah perusahaan yang bergerak di bidang kreatif dan teknologi, berkomitmen untuk membantu bisnis dan organisasi mencapai tujuan mereka melalui solusi yang inovatif, efektif, dan berkelanjutan.',
        'video' => ['image' => 'about-video.svg', 'caption' => 'Kenalan dengan KreasiNusa', 'duration' => '2:45'],
        'vision' => 'Menjadi mitra kreatif dan teknologi terpercaya yang membantu bisnis tumbuh lewat solusi berdampak nyata.',
        'mission' => [
            'Menghadirkan solusi kreatif yang relevan dengan kebutuhan klien.',
            'Menjaga kualitas lewat proses kerja yang terukur dan transparan.',
            'Membangun kemitraan jangka panjang dan tumbuh bersama klien.',
        ],
        'values_title' => 'Mengapa KreasiNusa',
    ],

    'services' => [
        'eyebrow' => 'Layanan Kami',
        'title' => 'Solusi Terbaik untuk Setiap Kebutuhan Anda',
        'items' => [
            ['i' => 'palette', 't' => 'Branding & Identity', 'd' => 'Membangun citra yang kuat'],
            ['i' => 'monitor', 't' => 'Website & Digital',   'd' => 'Solusi digital untuk bisnis Anda'],
            ['i' => 'layout',  't' => 'UI/UX Design',        'd' => 'Pengalaman pengguna yang optimal'],
            ['i' => 'camera',  't' => 'Content Creation',    'd' => 'Konten kreatif yang berdampak'],
            ['i' => 'chart',   't' => 'Marketing Strategy',  'd' => 'Strategi untuk pertumbuhan'],
            ['i' => 'gear',    't' => 'IT Consulting',       'd' => 'Konsultasi teknologi & sistem'],
        ],
    ],

    // Halaman Portofolio
    'portfolio' => [
        'title' => 'Portofolio', 'desc' => 'Karya terbaik yang telah kami selesaikan',
        'preview' => 3, // jumlah item yang tampil di beranda
        'more' => ['t' => 'Lihat Semua', 'r' => 'company-terracotta.portfolio'],
        'items' => [
            ['img' => 'portfolio-1.svg', 't' => 'Branding Campaign',     'c' => 'Identitas Visual'],
            ['img' => 'portfolio-2.svg', 't' => 'Website Development',   'c' => 'Platform Digital'],
            ['img' => 'portfolio-3.svg', 't' => 'Social Media Strategy', 'c' => 'Konten & Engagement'],
            ['img' => 'portfolio-4.svg', 't' => 'Brand Stationery',      'c' => 'Identitas Visual'],
            ['img' => 'portfolio-5.svg', 't' => 'Mobile App Design',     'c' => 'UI/UX Design'],
            ['img' => 'portfolio-6.svg', 't' => 'Company Dashboard',     'c' => 'Platform Digital'],
        ],
    ],

    'projects' => [
        'title' => 'Proyek Terbaru', 'desc' => 'Inovasi yang sedang kami kerjakan',
        'items' => [
            ['img' => 'project-1.svg', 't' => 'Project Aurora',    'c' => 'Digital Platform'],
            ['img' => 'project-2.svg', 't' => 'Project Nusantara', 'c' => 'Web & App'],
            ['img' => 'project-3.svg', 't' => 'Project Horizon',   'c' => 'Branding Campaign'],
        ],
    ],
    'certifications' => [
        'title' => 'Sertifikasi', 'desc' => 'Standar kualitas dan kepercayaan',
        'items' => [
            ['badge' => 'ISO',  't' => 'ISO 9001',  'c' => 'Quality Management'],
            ['badge' => 'ISO',  't' => 'ISO 27001', 'c' => 'Information Security'],
            ['badge' => 'BNSP', 't' => 'BNSP',      'c' => 'Sertifikasi Profesi'],
        ],
    ],
    'clients' => [
        'title' => 'Klien Kami', 'desc' => 'Dipercaya oleh berbagai perusahaan',
        // ganti dengan logo asli klien (dengan izin) bila sudah tersedia
        'items' => ['Telkom Indonesia', 'Bank BRI', 'Indofood', 'Pertamina', 'Mandiri', 'Gojek'],
    ],

    'quotation' => [
        'title' => 'Dapatkan Penawaran Terbaik untuk Proyek Anda',
        'text' => 'Konsultasikan kebutuhan Anda, dan tim kami siap memberikan solusi serta penawaran yang sesuai.',
        'cta' => 'Minta Penawaran Sekarang',
        'image' => 'quotation-bg.svg',
    ],
    'contact' => [
        'title' => 'Hubungi Kami',
        'text' => 'Ceritakan kebutuhan Anda. Tim kami akan membalas pada jam kerja.',
        'form' => 'Kirim Pesan',
        'form_text' => 'Isi formulir berikut dan kami segera menghubungi Anda.',
        'send' => 'Kirim Pesan',
    ],

    'ai' => [
        'title' => 'AI Assistant',
        'subtitle' => 'Tanya apa saja tentang KreasiNusa',
        'hello' => 'Halo! Saya AI Assistant dari KreasiNusa. Ada yang bisa saya bantu?',
        'image' => 'ai-robot.svg',
        'fab_label' => 'Tanya AI',
        'fallback' => 'Maaf, saya belum menemukan jawabannya. Silakan pilih topik di atas atau hubungi tim kami lewat formulir kontak.',
        'faq' => [
            ['q' => 'Informasi layanan', 'keys' => ['layanan', 'jasa', 'service'], 'a' => 'Kami menyediakan Branding & Identity, Website & Digital, UI/UX Design, Content Creation, Marketing Strategy, dan IT Consulting.'],
            ['q' => 'Harga & paket',     'keys' => ['harga', 'paket', 'biaya', 'tarif'], 'a' => 'Harga menyesuaikan kebutuhan dan skala proyek. Klik "Minta Penawaran Sekarang" dan tim kami akan menyiapkan penawaran.'],
            ['q' => 'Proses kerja',      'keys' => ['proses', 'alur', 'tahap'], 'a' => 'Alurnya: konsultasi kebutuhan, perencanaan, pengerjaan, revisi, lalu peluncuran dan pendampingan.'],
            ['q' => 'Konsultasi proyek', 'keys' => ['konsultasi', 'proyek', 'hubungi', 'kontak'], 'a' => 'Silakan isi formulir di bagian Kontak atau hubungi kami di jam kerja, Senin sampai Jumat pukul 09:00 - 18:00.'],
        ],
    ],

    'credit' => '© 2026 WEBIA by D-KREASI. Seluruh hak cipta dilindungi.',
];
