<?php

/*
|--------------------------------------------------------------------------
| Company Profile — Classic / Warm Neutral  (WEBIA by D-KREASI)
|--------------------------------------------------------------------------
| Semua konten template ada di file ini (data murni, tanpa closure, aman untuk
| `php artisan config:cache`). Dibaca oleh layouts/app.blade.php lewat:
|
|   config('template.company.classic.company-profile-warm-neutral.company-profile')
|
| Aturan tautan (nav & faq):
|   type = home     → ke Beranda
|   type = page     → ke halaman  (page: beranda | tentang | portofolio)
|   type = section  → ke bagian   (id: layanan, proyek, sertifikasi, klien, kontak, penawaran)
|--------------------------------------------------------------------------
*/

return [

    'assets' => [
        'css'     => 'css/website-bisnis/template/company/classic/company-profile-warm-neutral/company-profile.css',
        'js'      => 'js/website-bisnis/template/company/classic/company-profile-warm-neutral/company-profile.js',
        'img_dir' => 'images/website-bisnis/template/company/classic/company-profile-warm-neutral/',
    ],

    // Nama route (lihat routes/web.php)
    'routes' => [
        'beranda'    => 'company-profile-warm-neutral.home',
        'tentang'    => 'company-profile-warm-neutral.about',
        'portofolio' => 'company-profile-warm-neutral.portfolio',
    ],

    'company' => [
        'name'       => 'Nusantara Kreasi',
        'tagline'    => 'Ideas • Design • Build',
        'address'    => 'Jl. Melati No. 27, Bandung, Jawa Barat',
        'email'      => 'info@nusantara-kreasi.co.id',
        'phone'      => '+62 812 3456 7890',
        'phone_href' => '+6281234567890',
        'hours'      => 'Sen - Jum 09:00 - 17:00',
        'video_url'  => '', // isi URL .mp4 atau YouTube untuk dialog "Tonton Profil Kami"
    ],

    'social' => [
        ['icon' => 'linkedin',  'label' => 'LinkedIn',  'url' => '#'],
        ['icon' => 'instagram', 'label' => 'Instagram', 'url' => '#'],
        ['icon' => 'youtube',   'label' => 'YouTube',   'url' => '#'],
    ],

    // 'navbar' => false: tidak tampil di navbar (tetap tampil di footer & pencarian)
    'nav' => [
        ['label' => 'Beranda',      'type' => 'home'],
        ['label' => 'Tentang Kami', 'type' => 'page',    'page' => 'tentang',    'navbar' => false],
        ['label' => 'Layanan',      'type' => 'section', 'id' => 'layanan'],
        ['label' => 'Portofolio',   'type' => 'page',    'page' => 'portofolio', 'navbar' => false],
        ['label' => 'Proyek',       'type' => 'section', 'id' => 'proyek'],
        ['label' => 'Sertifikasi',  'type' => 'section', 'id' => 'sertifikasi'],
        ['label' => 'Klien',        'type' => 'section', 'id' => 'klien'],
        ['label' => 'Kontak',       'type' => 'section', 'id' => 'kontak'],
    ],

    'hero' => [
        'eyebrow'   => 'Solusi Kreatif untuk Masa Depan',
        'title'     => ['Bersama Membangun', 'Karya Terbaik'],
        'lead'      => 'Nusantara Kreasi hadir sebagai mitra terpercaya dalam menghadirkan solusi kreatif dan inovatif untuk mendukung pertumbuhan bisnis Anda.',
        'cta_primary'   => 'Jelajahi Layanan',
        'cta_secondary' => 'Tentang Kami',
    ],

    // Tombol melayang (kanan bawah)
    'whatsapp' => [
<<<<<<< HEAD
        'number'  => '62895630300345', // 0895630300345 (format internasional, tanpa 0 di depan)
=======
        'number'  => '6281234567890',
>>>>>>> webia/nabiila-fe
        'message' => 'Halo Nusantara Kreasi, saya ingin berkonsultasi mengenai proyek saya.',
        'label'   => 'Chat WhatsApp',
    ],

    'ai' => [
        'teaser' => 'Halo! Ada yang bisa kami bantu?',
    ],

    // Teks formulir penawaran
    'quote' => [
        'title'   => 'Formulir Penawaran',
        'intro'   => 'Ceritakan kebutuhan proyek Anda, kami siap membantu.',
        'note'    => 'Tim kami merespons dalam 1×24 jam kerja.',
<<<<<<< HEAD
        'privacy' => 'Anda akan diarahkan ke WhatsApp untuk mengirim pesan ini.',
        'submit'  => 'Kirim via WhatsApp',
        'wa_greeting'   => 'Halo Nusantara Kreasi, saya ingin meminta penawaran.',
        'success_title' => 'Pesan siap dikirim',
        'success_text'  => 'WhatsApp akan terbuka dengan pesan yang sudah terisi. Tekan Kirim di WhatsApp agar pesan sampai ke tim kami.',
=======
        'privacy' => 'Data Anda aman dan hanya dipakai untuk menanggapi permintaan ini.',
        'success_title' => 'Permintaan terkirim',
        'success_text'  => 'Terima kasih! Tim kami akan segera menghubungi Anda untuk membahas kebutuhan proyek.',
>>>>>>> webia/nabiila-fe
    ],

    'about' => [
        'title'      => 'Tentang Kami',
        'lead'       => 'Partner Strategis untuk Solusi Terbaik',
        'paragraphs' => [
            'Nusantara Kreasi adalah perusahaan yang bergerak di bidang kreatif dan teknologi, berkomitmen untuk memberikan solusi berkualitas tinggi yang disesuaikan dengan kebutuhan setiap klien.',
            'Kami bekerja berdampingan dengan klien, mulai dari merumuskan ide, merancang identitas dan pengalaman pengguna, hingga membangun dan merawat produk digitalnya.',
        ],
    ],

    'services' => [
        ['icon' => 'svc-branding',  'title' => 'Design & Branding',     'desc' => 'Membangun identitas merek yang kuat dan berkesan.'],
        ['icon' => 'svc-web',       'title' => 'Web Development',       'desc' => 'Website modern, cepat, dan responsif.'],
        ['icon' => 'svc-marketing', 'title' => 'Digital Marketing',     'desc' => 'Strategi digital untuk meningkatkan visibilitas bisnis.'],
        ['icon' => 'svc-consult',   'title' => 'IT Consulting',         'desc' => 'Konsultasi teknologi untuk solusi yang tepat.'],
        ['icon' => 'svc-uiux',      'title' => 'UI/UX Design',          'desc' => 'Desain pengalaman pengguna yang intuitif dan menarik.'],
        ['icon' => 'svc-support',   'title' => 'Maintenance & Support', 'desc' => 'Dukungan berkelanjutan untuk kelancaran bisnis Anda.'],
    ],

    'portfolio' => [
        ['image' => 'portfolio-1.jpg', 'title' => 'Branding Cafe',      'meta' => 'Identitas Visual',       'alt' => 'Branding cafe dengan kemasan dan laptop di meja kayu',
         'desc' => 'Identitas visual lengkap untuk sebuah cafe: logo, kemasan, dan materi cetak yang konsisten.'],
        ['image' => 'portfolio-2.jpg', 'title' => 'Website E-Commerce', 'meta' => 'Pengembangan Web',       'alt' => 'Tampilan website e-commerce di laptop',
         'desc' => 'Toko online yang cepat dan responsif dengan alur belanja yang mudah dipahami pelanggan.'],
        ['image' => 'portfolio-3.jpg', 'title' => 'Aplikasi Mobile',    'meta' => 'Aplikasi Android & iOS', 'alt' => 'Aplikasi mobile di layar ponsel',
         'desc' => 'Aplikasi seluler untuk Android dan iOS dengan antarmuka yang ringan dan nyaman digunakan.'],
        ['image' => 'portfolio-4.jpg', 'title' => 'Desain Interior',    'meta' => 'Desain Ruang Modern',    'alt' => 'Desain interior ruang makan modern',
         'desc' => 'Penataan ruang modern yang hangat, fungsional, dan selaras dengan identitas merek.'],
    ],

    'projects' => [
        ['image' => 'project-1.jpg', 'title' => 'Platform Edukasi', 'meta' => 'Pengembangan Web',    'alt' => 'Tim sedang berdiskusi untuk platform edukasi',
         'desc' => 'Platform belajar daring yang sedang kami kembangkan bersama tim klien.'],
        ['image' => 'project-2.jpg', 'title' => 'Sistem Manajemen', 'meta' => 'Aplikasi Enterprise', 'alt' => 'Rapat tim untuk sistem manajemen perusahaan',
         'desc' => 'Sistem manajemen internal untuk merapikan proses kerja perusahaan.'],
        ['image' => 'project-3.jpg', 'title' => 'Campaign Digital', 'meta' => 'Digital Marketing',   'alt' => 'Materi campaign digital di tablet dan ponsel',
         'desc' => 'Kampanye digital lintas kanal untuk memperluas jangkauan merek.'],
        ['image' => 'project-4.jpg', 'title' => 'UI/UX Aplikasi',   'meta' => 'Desain Antarmuka',    'alt' => 'Desain antarmuka aplikasi di layar ponsel',
         'desc' => 'Perancangan antarmuka aplikasi yang intuitif, dari riset hingga prototipe.'],
    ],

    'certifications' => [
        ['image' => 'cert-iso-9001.png',  'title' => 'ISO 9001',          'meta' => 'Quality Management',   'alt' => 'Lencana sertifikasi ISO 9001'],
        ['image' => 'cert-iso-27001.png', 'title' => 'ISO 27001',         'meta' => 'Information Security', 'alt' => 'Lencana sertifikasi ISO 27001'],
        ['image' => 'cert-microsoft.png', 'title' => 'Microsoft Partner', 'meta' => 'Microsoft Partner',    'alt' => 'Logo Microsoft Partner'],
    ],

    'clients' => [
        ['image' => 'client-telkom.png',    'name' => 'Telkom Indonesia'],
        ['image' => 'client-bri.png',       'name' => 'Bank BRI'],
        ['image' => 'client-indosat.png',   'name' => 'Indosat Ooredoo Hutchison'],
        ['image' => 'client-pertamina.png', 'name' => 'Pertamina'],
        ['image' => 'client-mandiri.png',   'name' => 'Bank Mandiri'],
        ['image' => 'client-gojek.png',     'name' => 'Gojek'],
    ],

    // AI Company FAQ — jawaban statis; chip kosong = tidak tampil sebagai tombol cepat
    'faq' => [
        ['id' => 'layanan', 'chip' => 'Informasi layanan', 'keywords' => ['layanan', 'jasa', 'service', 'branding', 'web', 'marketing', 'ui', 'ux', 'maintenance', 'support'],
         'answer' => 'Kami menyediakan Design & Branding, Web Development, Digital Marketing, IT Consulting, UI/UX Design, serta Maintenance & Support.',
         'link' => ['type' => 'section', 'id' => 'layanan', 'label' => 'Lihat semua layanan']],
        ['id' => 'portofolio', 'chip' => 'Tanyakan portfolio', 'keywords' => ['portfolio', 'portofolio', 'karya', 'hasil', 'contoh', 'proyek', 'project'],
         'answer' => 'Portofolio kami mencakup branding cafe, website e-commerce, aplikasi mobile, dan desain interior. Proyek terbaru meliputi platform edukasi, sistem manajemen, campaign digital, dan UI/UX aplikasi.',
         'link' => ['type' => 'page', 'page' => 'portofolio', 'label' => 'Lihat portofolio']],
        ['id' => 'harga', 'chip' => 'Estimasi harga', 'keywords' => ['harga', 'biaya', 'tarif', 'estimasi', 'budget', 'anggaran', 'penawaran', 'quotation'],
         'answer' => 'Estimasi biaya disesuaikan dengan ruang lingkup dan kebutuhan proyek. Isi formulir penawaran, lalu tim kami akan menghubungi Anda untuk membahasnya.',
         'link' => ['type' => 'section', 'id' => 'penawaran', 'label' => 'Isi formulir penawaran']],
        ['id' => 'konsultasi', 'chip' => 'Konsultasi proyek', 'keywords' => ['konsultasi', 'diskusi', 'hubungi', 'kontak', 'telepon', 'email', 'alamat', 'lokasi', 'jam', 'buka'],
         'answer' => 'Anda dapat menghubungi kami di +62 812 3456 7890 atau info@nusantara-kreasi.co.id, Senin sampai Jumat pukul 09.00 - 17.00, di Jl. Melati No. 27, Bandung, Jawa Barat.',
         'link' => ['type' => 'section', 'id' => 'kontak', 'label' => 'Lihat kontak kami']],
        ['id' => 'sertifikasi', 'chip' => '', 'keywords' => ['sertifikasi', 'sertifikat', 'iso', 'microsoft', 'standar'],
         'answer' => 'Kami memegang sertifikasi ISO 9001 (Quality Management) dan ISO 27001 (Information Security), serta berstatus Microsoft Partner.',
         'link' => ['type' => 'section', 'id' => 'sertifikasi', 'label' => 'Lihat sertifikasi']],
        ['id' => 'klien', 'chip' => '', 'keywords' => ['klien', 'client', 'pelanggan', 'dipercaya'],
         'answer' => 'Kami dipercaya berbagai perusahaan, di antaranya Telkom Indonesia, Bank BRI, Indosat Ooredoo Hutchison, Pertamina, Bank Mandiri, dan Gojek.',
         'link' => ['type' => 'section', 'id' => 'klien', 'label' => 'Lihat klien kami']],
        ['id' => 'tentang', 'chip' => '', 'keywords' => ['tentang', 'siapa', 'profil', 'perusahaan', 'nusantara'],
         'answer' => 'Nusantara Kreasi adalah perusahaan di bidang kreatif dan teknologi yang berkomitmen memberikan solusi berkualitas tinggi sesuai kebutuhan setiap klien.',
         'link' => ['type' => 'page', 'page' => 'tentang', 'label' => 'Baca tentang kami']],
    ],

];
