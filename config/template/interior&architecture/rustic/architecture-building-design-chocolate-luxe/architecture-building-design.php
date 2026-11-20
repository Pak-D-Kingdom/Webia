<?php

/*
|--------------------------------------------------------------------------
| ArchiDesign — Architecture & Building Design (Rustic · Chocolate Luxe)
|--------------------------------------------------------------------------
| Data statis template (menu, portofolio, proyek, layanan, FAQ chatbot, kontak).
| Dibaca oleh halaman Blade saat dibuka (bukan saat aplikasi booting).
| Key Laravel : template.interior&architecture.rustic.architecture-building-design-chocolate-luxe.architecture-building-design
*/

return [

    'view' => 'website-bisnis.template.interior&architecture.rustic.architecture-building-design-chocolate-luxe',
    'base' => '/webia/template/interior-architecture/rustic/architecture-building-design-chocolate-luxe',
    'img'  => 'images/website-bisnis/template/interior&architecture/rustic/architecture-building-design-chocolate-luxe',
    'css'  => 'css/website-bisnis/template/interior&architecture/rustic/architecture-building-design-chocolate-luxe/architecture-building-design.css',
    'js'   => 'js/website-bisnis/template/interior&architecture/rustic/architecture-building-design-chocolate-luxe/architecture-building-design.js',

    'brand' => [
        'name'    => 'ArchiDesign',
        'tagline' => 'Architecture & Building Design',
        'slogan'  => 'Building Better, Living Greater',
    ],

    'meta' => [
        'title'       => 'ArchiDesign — Solusi Desain Arsitektur untuk Masa Depan Anda',
        'description' => 'ArchiDesign menghadirkan desain arsitektur yang estetis, fungsional, dan berkelanjutan untuk hunian dan bisnis Anda.',
    ],

    'contact' => [
        'address'      => 'Jl. Melati No. 45, Jakarta Selatan',
        'phone'        => '+62 21 7654 3210',
        'phone_href'   => '+622176543210',
        'email'        => 'hello@archidesign.co.id',
        // Nomor tujuan WhatsApp (format internasional tanpa + / 0 di depan).
        'whatsapp'     => '62895630300345',
        'hours'        => 'Senin – Sabtu, 09.00 – 17.00 WIB',
    ],

    'socials' => [
        ['key' => 'instagram', 'label' => 'Instagram', 'url' => 'https://instagram.com'],
        ['key' => 'youtube',   'label' => 'YouTube',   'url' => 'https://youtube.com'],
        ['key' => 'linkedin',  'label' => 'LinkedIn',  'url' => 'https://linkedin.com'],
        ['key' => 'pinterest', 'label' => 'Pinterest', 'url' => 'https://pinterest.com'],
    ],

    // Navbar. Blok kontak ada di footer (id #kontak).
    'nav' => [
        ['key' => 'beranda',    'label' => 'Beranda',        'path' => ''],
        ['key' => 'portofolio', 'label' => 'Portofolio',     'path' => '/portofolio'],
        ['key' => 'proyek',     'label' => 'Proyek',         'path' => '/proyek'],
        ['key' => 'layanan',    'label' => 'Layanan',        'path' => '/layanan'],
        ['key' => 'denah-3d',   'label' => 'Desain & Render','path' => '/denah-3d'],
        ['key' => 'proses',     'label' => 'Proses Proyek',  'path' => '/proses'],
        ['key' => 'sertifikasi','label' => 'Sertifikasi',    'path' => '/sertifikasi'],
        ['key' => 'konsultasi', 'label' => 'Konsultasi',     'path' => '/konsultasi'],
    ],

    'footer' => [
        'nav' => [
            ['Beranda', ''], ['Portofolio', '/portofolio'], ['Proyek', '/proyek'], ['Layanan', '/layanan'], ['Kontak', '#kontak'],
        ],
        'services' => ['Desain Arsitektur', 'Desain Interior', '3D Rendering', 'Konsultasi', 'Perencanaan Bangunan'],
        'credit'   => '© 2026 WEBIA by D-KREASI. Seluruh hak cipta dilindungi.',
    ],

    // Header halaman dalam (page hero): dipakai partials/page-hero lewat key
    'pages' => [
        'portofolio'  => ['icon' => 'grid',     'crumb' => 'Portofolio',      'title' => 'Arsitektur Portfolio',          'sub' => 'Karya terbaik kami dalam menciptakan ruang yang inspiratif.', 'bg' => 'res-02.jpg',          'stats' => ['9 karya pilihan', '3 kategori', 'Tahun 2022 – 2025'], 'cta' => ['Booking Konsultasi', '/konsultasi'], 'cta2' => ['Minta Penawaran', '/penawaran']],
        'proyek'      => ['icon' => 'home',     'crumb' => 'Proyek',          'title' => 'Proyek Residensial & Komersial', 'sub' => 'Dari hunian impian hingga bangunan bisnis modern.',          'bg' => 'com-02.jpg',          'stats' => ['8 proyek', 'Residensial & komersial', 'Seluruh Indonesia'], 'cta' => ['Booking Konsultasi', '/konsultasi'], 'cta2' => ['Minta Penawaran', '/penawaran']],
        'layanan'     => ['icon' => 'compass',  'crumb' => 'Layanan',         'title' => 'Layanan Desain Kami',            'sub' => 'Layanan profesional untuk berbagai kebutuhan Anda.',         'bg' => 'interior-service.jpg', 'stats' => ['5 layanan desain', 'Konsep hingga serah terima', 'Tim arsitek bersertifikat'], 'cta' => ['Booking Konsultasi', '/konsultasi'], 'cta2' => ['Minta Penawaran', '/penawaran']],
        'denah-3d'    => ['icon' => 'cube',     'crumb' => 'Desain & Render', 'title' => 'Denah Lantai & 3D Render',       'sub' => 'Visualisasi desain dengan detail dan realistis.',            'bg' => 'res-05.jpg',          'stats' => ['3 tipe denah', 'Tampilan 2D & 3D', 'Render eksterior'], 'cta' => ['Booking Konsultasi', '/konsultasi'], 'cta2' => ['Minta Penawaran', '/penawaran']],
        'proses'      => ['icon' => 'badge',    'crumb' => 'Proses Proyek',   'title' => 'Proses Proyek Kami',             'sub' => 'Langkah demi langkah, dari ide hingga nyata.',               'bg' => 'blueprint-desk.jpg',  'stats' => ['5 tahap kerja', 'Transparan di tiap tahap', 'Revisi terjadwal'], 'cta' => ['Booking Konsultasi', '/konsultasi'], 'cta2' => ['Minta Penawaran', '/penawaran']],
        'sertifikasi' => ['icon' => 'badge',    'crumb' => 'Sertifikasi',     'title' => 'Sertifikasi & Lisensi',          'sub' => 'Profesional dan terpercaya.',                                'bg' => 'com-01.jpg',          'stats' => ['ISO 9001:2015', 'Anggota IAI', 'Lisensi LPJK'], 'cta' => ['Booking Konsultasi', '/konsultasi'], 'cta2' => ['Minta Penawaran', '/penawaran']],
        'konsultasi'  => ['icon' => 'calendar', 'crumb' => 'Konsultasi',      'title' => 'Booking Konsultasi',             'sub' => 'Atur jadwal konsultasi dengan tim ahli kami.',               'bg' => 'konsultasi-living.jpg', 'stats' => ['Online atau tatap muka', 'Senin – Sabtu, 09.00 – 17.00', 'Konfirmasi via WhatsApp'], 'cta' => ['Lihat Layanan', '/layanan'], 'cta2' => ['Minta Penawaran', '/penawaran']],
        'penawaran'   => ['icon' => 'doc',      'crumb' => 'Penawaran',       'title' => 'Permintaan Penawaran',           'sub' => 'Dapatkan penawaran terbaik untuk proyek Anda.',              'bg' => 'blueprint-desk.jpg',  'stats' => ['Penawaran tertulis', 'Kirim lewat WhatsApp', 'Data tidak disimpan'], 'cta' => ['Lihat Portofolio', '/portofolio'], 'cta2' => ['Booking Konsultasi', '/konsultasi']],
    ],

    'portfolio' => [
        ['title' => 'Rumah Modern Minimalis', 'loc' => 'Jakarta Selatan', 'year' => '2025', 'cat' => 'residensial', 'img' => 'res-01.jpg', 'area' => '220 m²', 'desc' => 'Hunian dua lantai dengan fasad kayu hangat, void tinggi, dan bukaan kaca besar yang menghadirkan cahaya alami.'],
        ['title' => 'Gedung Perkantoran', 'loc' => 'Jakarta Pusat', 'year' => '2024', 'cat' => 'komersial', 'img' => 'com-01.jpg', 'area' => '4.800 m²', 'desc' => 'Menara perkantoran fasad kaca efisien energi dengan lobi dua lantai dan ruang terbuka hijau.'],
        ['title' => 'Villa Tropis Modern', 'loc' => 'Bali', 'year' => '2025', 'cat' => 'villa', 'img' => 'vil-01.jpg', 'area' => '380 m²', 'desc' => 'Villa beratap kayu dengan teras lebar, kolam renang, dan taman tropis yang menyatu dengan bangunan.'],
        ['title' => 'Residence Wood House', 'loc' => 'Bandung', 'year' => '2024', 'cat' => 'residensial', 'img' => 'res-02.jpg', 'area' => '310 m²', 'desc' => 'Rumah keluarga bernuansa rustic dengan panel kayu, dinding batu alam, dan balkon berkaca.'],
        ['title' => 'Kantor Sentra Niaga', 'loc' => 'Surabaya', 'year' => '2024', 'cat' => 'komersial', 'img' => 'com-02.jpg', 'area' => '2.600 m²', 'desc' => 'Gedung niaga bertingkat dengan kanopi kayu, area ritel di lantai dasar, dan ruang kerja fleksibel.'],
        ['title' => 'Rumah Tropis Terra', 'loc' => 'Yogyakarta', 'year' => '2023', 'cat' => 'residensial', 'img' => 'res-04.jpg', 'area' => '240 m²', 'desc' => 'Rumah tropis dengan sirkulasi udara silang, overhang lebar, dan taman tengah.'],
        ['title' => 'Villa Senja Ubud', 'loc' => 'Bali', 'year' => '2023', 'cat' => 'villa', 'img' => 'vil-02.jpg', 'area' => '420 m²', 'desc' => 'Villa peristirahatan dengan pencahayaan hangat dan pemandangan lembah yang terbuka.'],
        ['title' => 'Rumah Nordik Hangat', 'loc' => 'Tangerang Selatan', 'year' => '2025', 'cat' => 'residensial', 'img' => 'res-05.jpg', 'area' => '195 m²', 'desc' => 'Hunian kompak dengan palet kayu dan krem, dirancang untuk keluarga muda.'],
        ['title' => 'Plaza Bisnis Hijau', 'loc' => 'Jakarta Barat', 'year' => '2022', 'cat' => 'komersial', 'img' => 'com-03.jpg', 'area' => '3.900 m²', 'desc' => 'Kompleks bisnis campuran dengan koridor hijau dan fasad kaca berlapis.'],
    ],

    'projects' => [
        'residensial' => [
            ['title' => 'Rumah Modern Minimalis', 'loc' => 'Jakarta Selatan', 'area' => '220 m²', 'floors' => '2 lantai', 'status' => 'Selesai 2025', 'img' => 'res-01.jpg', 'desc' => 'Fasad kayu hangat dengan bukaan kaca besar dan void ruang keluarga.'],
            ['title' => 'Cluster Kayu Hangat', 'loc' => 'BSD City, Tangerang', 'area' => '180 m²', 'floors' => '2 lantai', 'status' => 'Selesai 2024', 'img' => 'res-03.jpg', 'desc' => 'Hunian cluster dengan carport lebar, taman depan, dan pencahayaan malam.'],
            ['title' => 'Rumah Terra Courtyard', 'loc' => 'Malang', 'area' => '260 m²', 'floors' => '2 lantai', 'status' => 'Dalam pembangunan', 'img' => 'res-06.jpg', 'desc' => 'Rumah bernuansa cokelat tua dengan courtyard dan ruang makan terbuka.'],
            ['title' => 'Residence Wood House', 'loc' => 'Bandung', 'area' => '310 m²', 'floors' => '2 lantai', 'status' => 'Selesai 2024', 'img' => 'res-02.jpg', 'desc' => 'Rumah keluarga dengan panel kayu, dinding batu alam, dan balkon berkaca.'],
        ],
        'komersial' => [
            ['title' => 'Gedung Perkantoran Pusat', 'loc' => 'Jakarta Pusat', 'area' => '4.800 m²', 'floors' => '16 lantai', 'status' => 'Selesai 2024', 'img' => 'com-01.jpg', 'desc' => 'Menara perkantoran fasad kaca efisien energi dengan lobi dua lantai.'],
            ['title' => 'Kantor Sentra Niaga', 'loc' => 'Surabaya', 'area' => '2.600 m²', 'floors' => '3 lantai', 'status' => 'Selesai 2024', 'img' => 'com-02.jpg', 'desc' => 'Gedung niaga dengan kanopi kayu dan area ritel di lantai dasar.'],
            ['title' => 'Plaza Bisnis Hijau', 'loc' => 'Jakarta Barat', 'area' => '3.900 m²', 'floors' => '12 lantai', 'status' => 'Dalam pembangunan', 'img' => 'com-03.jpg', 'desc' => 'Kompleks bisnis campuran dengan koridor hijau dan fasad berlapis.'],
            ['title' => 'Ruko Fasad Kaca', 'loc' => 'Medan', 'area' => '1.200 m²', 'floors' => '4 lantai', 'status' => 'Selesai 2023', 'img' => 'com-04.jpg', 'desc' => 'Deretan ruko modern dengan fasad kaca dan aksen kayu.'],
        ],
    ],

    'services' => [
        ['icon' => 'compass', 'title' => 'Desain Arsitektur',   'desc' => 'Perancangan bangunan dari konsep massa, denah, tampak, hingga gambar kerja yang siap dibangun.', 'items' => ['Konsep & zoning', 'Denah, tampak & potongan', 'Gambar kerja lengkap']],
        ['icon' => 'sofa',    'title' => 'Desain Interior',     'desc' => 'Penataan ruang dalam yang hangat dan fungsional, lengkap dengan pemilihan material dan furnitur.', 'items' => ['Layout & tata ruang', 'Material & palet warna', 'Furnitur custom']],
        ['icon' => 'cube',    'title' => 'Jasa 3D Rendering',   'desc' => 'Visualisasi eksterior dan interior yang realistis agar Anda melihat hasil akhir sebelum membangun.', 'items' => ['Render eksterior', 'Render interior', 'Walkthrough & animasi']],
        ['icon' => 'chat',    'title' => 'Konsultasi Desain',   'desc' => 'Diskusi bersama arsitek untuk menentukan kebutuhan, gaya, anggaran, dan arah desain yang tepat.', 'items' => ['Analisis kebutuhan', 'Arahan gaya & anggaran', 'Survei lokasi']],
        ['icon' => 'building','title' => 'Perencanaan Bangunan','desc' => 'Penyusunan RAB, jadwal, dokumen perizinan, dan pendampingan pelaksanaan pembangunan.', 'items' => ['RAB & jadwal kerja', 'Dokumen perizinan', 'Pengawasan berkala']],
    ],

    'plans' => [
        ['n' => 1, 'title' => 'Tipe 72 Modern',      'area' => '72 m²',  'rooms' => '3 kamar · 1 KM · teras', 'desc' => 'Denah keluarga dengan ruang tamu luas, dapur terbuka, dan teras belakang.'],
        ['n' => 2, 'title' => 'Tipe 45 Minimalis',   'area' => '45 m²',  'rooms' => '2 kamar · 1 KM',         'desc' => 'Denah kompak yang efisien untuk lahan terbatas tanpa mengorbankan kenyamanan.'],
        ['n' => 3, 'title' => 'Villa Tropis 120',    'area' => '120 m²', 'rooms' => '3 kamar · 1 KM · ruang santai', 'desc' => 'Denah villa dengan ruang santai besar dan tiga kamar tidur terpisah.'],
    ],

    'process' => [
        ['icon' => 'consult', 'we' => 'Mendengarkan kebutuhan, survei lokasi, dan menyusun brief proyek.', 'you' => 'Menyampaikan kebutuhan, gaya, dan anggaran.', 'weight' => 1, 'title' => 'Konsultasi Awal',       'time' => '1 – 3 hari',   'desc' => 'Kami mendengarkan kebutuhan, gaya, lokasi, dan anggaran Anda, lalu merangkumnya dalam brief proyek.', 'out' => ['Brief proyek', 'Survei lokasi', 'Estimasi awal']],
        ['icon' => 'concept', 'we' => 'Menyusun sketsa, denah, dan render konsep.', 'you' => 'Meninjau dan memilih konsep favorit.', 'weight' => 3, 'title' => 'Desain Konsep',         'time' => '2 – 3 minggu', 'desc' => 'Tim kami menyusun sketsa massa, denah, dan konsep visual untuk Anda tinjau bersama.', 'out' => ['Sketsa & denah', 'Moodboard material', 'Render konsep']],
        ['icon' => 'develop', 'we' => 'Menyusun gambar kerja, spesifikasi material, dan RAB.', 'you' => 'Menyetujui detail material dan RAB.', 'weight' => 4, 'title' => 'Pengembangan Desain',   'time' => '3 – 5 minggu', 'desc' => 'Konsep terpilih dikembangkan menjadi gambar kerja, detail, spesifikasi, dan RAB.', 'out' => ['Gambar kerja', 'Detail & spesifikasi', 'RAB']],
        ['icon' => 'build',   'we' => 'Mengawasi mutu, jadwal, dan biaya di lapangan.', 'you' => 'Memantau laporan progres dan memberi keputusan.', 'weight' => 6, 'title' => 'Pelaksanaan',           'time' => 'Sesuai skala', 'desc' => 'Pembangunan berjalan dengan pengawasan berkala agar mutu, jadwal, dan biaya tetap terkendali.', 'out' => ['Jadwal kerja', 'Laporan progres', 'Kontrol mutu']],
        ['icon' => 'handover','we' => 'Memeriksa hasil akhir dan menyerahkan dokumen lengkap.', 'you' => 'Memeriksa bangunan dan menerima kunci.', 'weight' => 2, 'title' => 'Serah Terima',          'time' => '1 – 2 minggu', 'desc' => 'Pemeriksaan akhir, perbaikan, dan penyerahan bangunan beserta dokumen lengkap.', 'out' => ['Pemeriksaan akhir', 'Dokumen as-built', 'Masa garansi']],
    ],

    'certs' => [
        ['img' => 'badge-iso.svg',  'short' => 'ISO 9001:2015', 'sub' => 'Quality Management', 'title' => 'ISO 9001:2015', 'org' => 'Sistem Manajemen Mutu', 'desc' => 'Proses perancangan dan pengawasan kami berjalan dalam sistem manajemen mutu yang terdokumentasi dan diaudit berkala.'],
        ['img' => 'badge-iai.svg',  'short' => 'Anggota Profesional', 'sub' => 'Asosiasi Arsitek', 'title' => 'Ikatan Arsitek Indonesia', 'org' => 'Keanggotaan Profesional', 'desc' => 'Tim arsitek kami terdaftar sebagai anggota profesional dan mengikuti kode etik profesi arsitek.'],
        ['img' => 'badge-lpjk.svg', 'short' => 'Lisensi Jasa Konstruksi', 'sub' => 'Sertifikat Badan Usaha', 'title' => 'LPJK Indonesia', 'org' => 'Lisensi Jasa Konstruksi', 'desc' => 'Badan usaha kami memiliki sertifikat jasa konstruksi untuk layanan perencanaan dan pengawasan bangunan.'],
    ],

    // Definisi form (dirender oleh partials/form + partials/field). Dikirim ke WhatsApp (contact.whatsapp).
    'forms' => [
        'konsultasi' => [
            'title' => 'Jadwalkan Konsultasi', 'icon' => 'calendar',
            'hint' => 'Isi formulir singkat ini, lalu kirim ke WhatsApp kami untuk konfirmasi jadwal.',
            'submit' => 'Kirim ke WhatsApp', 'intro' => 'booking konsultasi',
            'sections' => [
                ['title' => 'Data Anda', 'fields' => [
                    ['type' => 'text',  'name' => 'nama',  'label' => 'Nama lengkap', 'req' => true, 'icon' => 'user',  'ph' => 'Nama Anda', 'ac' => 'name'],
                    ['type' => 'email', 'name' => 'email', 'label' => 'Email',        'req' => true, 'icon' => 'mail',  'ph' => 'nama@email.com', 'ac' => 'email'],
                    ['type' => 'tel',   'name' => 'wa',    'label' => 'No. WhatsApp', 'req' => true, 'icon' => 'phone', 'ph' => '0812 3456 7890', 'ac' => 'tel', 'full' => true, 'hint' => 'Jadwal dikonfirmasi lewat nomor ini.'],
                ]],
                ['title' => 'Layanan & Jadwal', 'fields' => [
                    ['type' => 'choice', 'mode' => 'cards', 'name' => 'layanan', 'label' => 'Jenis layanan', 'req' => true, 'full' => true,
                     'options' => [['Desain Arsitektur', 'compass'], ['Desain Interior', 'sofa'], ['Jasa 3D Rendering', 'cube'], ['Konsultasi Desain', 'chat'], ['Perencanaan Bangunan', 'building']]],
                    ['type' => 'date', 'name' => 'tanggal', 'label' => 'Tanggal', 'req' => true, 'icon' => 'calendar', 'today' => true, 'full' => true, 'hint' => 'Pilih tanggal mulai hari ini.'],
                    ['type' => 'choice', 'mode' => 'chips', 'name' => 'jam', 'label' => 'Jam (WIB)', 'req' => true, 'full' => true,
                     'options' => [['09.00'], ['10.30'], ['13.00'], ['14.30'], ['16.00']]],
                    ['type' => 'choice', 'mode' => 'cards', 'name' => 'metode', 'label' => 'Metode konsultasi', 'req' => true, 'full' => true,
                     'options' => [['Online (Zoom / Google Meet)', 'chat'], ['Tatap muka di kantor', 'building'], ['Kunjungan ke lokasi', 'pin']]],
                ]],
                ['title' => 'Catatan', 'fields' => [
                    ['type' => 'textarea', 'name' => 'catatan', 'label' => 'Catatan (opsional)', 'full' => true, 'max' => 400, 'ph' => 'Ceritakan singkat rencana bangunan Anda'],
                ]],
            ],
        ],
        'penawaran' => [
            'title' => 'Detail Proyek Anda', 'icon' => 'doc',
            'hint' => 'Semakin lengkap informasinya, semakin tepat penawaran yang kami susun.',
            'submit' => 'Kirim Permintaan ke WhatsApp', 'intro' => 'meminta penawaran',
            'sections' => [
                ['title' => 'Data Anda', 'fields' => [
                    ['type' => 'text',  'name' => 'nama',       'label' => 'Nama lengkap', 'req' => true, 'icon' => 'user',  'ph' => 'Nama Anda', 'ac' => 'name'],
                    ['type' => 'text',  'name' => 'perusahaan', 'label' => 'Perusahaan (opsional)', 'icon' => 'building', 'ph' => 'Nama perusahaan', 'ac' => 'organization'],
                    ['type' => 'email', 'name' => 'email',      'label' => 'Email',        'req' => true, 'icon' => 'mail',  'ph' => 'nama@email.com', 'ac' => 'email'],
                    ['type' => 'tel',   'name' => 'wa',         'label' => 'No. WhatsApp', 'req' => true, 'icon' => 'phone', 'ph' => '0812 3456 7890', 'ac' => 'tel'],
                ]],
                ['title' => 'Tentang Proyek', 'fields' => [
                    ['type' => 'select', 'name' => 'jenis', 'label' => 'Jenis proyek', 'req' => true, 'icon' => 'home', 'ph' => 'Pilih jenis proyek',
                     'options' => [['Rumah Tinggal', 'home', 'Hunian keluarga & cluster'], ['Villa / Resort', 'sofa', 'Peristirahatan & wisata'], ['Gedung Komersial', 'building', 'Kantor, ruko, dan retail'], ['Desain Interior', 'sofa', 'Penataan ruang dalam'], ['Renovasi Bangunan', 'build', 'Rehab & tambah ruang'], ['Lainnya', 'grid', 'Ceritakan di deskripsi']]],
                    ['type' => 'text',   'name' => 'lokasi', 'label' => 'Lokasi proyek', 'req' => true, 'icon' => 'pin', 'ph' => 'Kota / kabupaten'],
                    ['type' => 'number', 'name' => 'luas', 'label' => 'Perkiraan luas (m²)', 'icon' => 'ruler', 'ph' => 'contoh: 150', 'min' => 1],
                    ['type' => 'select', 'name' => 'budget', 'label' => 'Perkiraan anggaran', 'icon' => 'doc', 'ph' => 'Pilih rentang anggaran',
                     'options' => [['< Rp 500 juta', 'doc', 'Renovasi atau interior skala kecil'], ['Rp 500 juta – 1 miliar', 'doc', 'Rumah tipe menengah'], ['Rp 1 – 3 miliar', 'doc', 'Rumah besar atau villa kecil'], ['Rp 3 – 10 miliar', 'doc', 'Villa dan bangunan komersial'], ['> Rp 10 miliar', 'doc', 'Proyek skala besar'], ['Belum ditentukan', 'chat', 'Kami bantu menyusun estimasi']]],
                    ['type' => 'choice', 'mode' => 'chips', 'name' => 'mulai', 'label' => 'Target mulai', 'full' => true,
                     'options' => [['Segera (≤ 1 bulan)'], ['1 – 3 bulan'], ['3 – 6 bulan'], ['Masih perencanaan']]],
                ]],
                ['title' => 'Kebutuhan Anda', 'fields' => [
                    ['type' => 'textarea', 'name' => 'deskripsi', 'label' => 'Deskripsi kebutuhan', 'req' => true, 'full' => true, 'max' => 600, 'ph' => 'Gaya yang diinginkan, jumlah kamar, fasilitas, dan kebutuhan khusus lainnya'],
                ]],
            ],
        ],
    ],

    // Pertanyaan cepat (tampil di preview beranda & panel chatbot)
    'quick' => ['Apa saja layanan desainnya?', 'Bagaimana proses proyeknya?', 'Berapa estimasi biayanya?', 'Saya ingin konsultasi desain!'],

    // Topik cepat di panel chatbot: [label, ikon, pertanyaan]
    'topics' => [
        ['Layanan', 'compass', 'Apa saja layanan desainnya?'],
        ['Proses Proyek', 'badge', 'Bagaimana proses proyeknya?'],
        ['Estimasi Biaya', 'doc', 'Berapa estimasi biayanya?'],
        ['Konsultasi', 'calendar', 'Saya ingin konsultasi desain!'],
        ['Denah & 3D', 'cube', 'Apakah ada denah dan render 3D?'],
        ['Sertifikasi', 'badge', 'Apakah ArchiDesign bersertifikat?'],
    ],

    // FAQ chatbot (jawaban dicocokkan lewat kata kunci)
    'faq' => [
        ['q' => 'Apa saja layanan desainnya?', 'k' => ['layanan', 'jasa', 'desain apa', 'service', 'interior', 'arsitektur', 'rendering'],
         'a' => 'Kami melayani Desain Arsitektur, Desain Interior, Jasa 3D Rendering, Konsultasi Desain, dan Perencanaan Bangunan untuk hunian maupun bangunan komersial.', 'link' => ['/layanan', 'Lihat layanan']],
        ['q' => 'Bagaimana proses proyeknya?', 'k' => ['proses', 'tahap', 'langkah', 'alur', 'cara kerja', 'prosedur'],
         'a' => 'Ada 5 tahap: Konsultasi Awal, Desain Konsep, Pengembangan Desain, Pelaksanaan, dan Serah Terima. Setiap tahap punya hasil kerja yang jelas dan Anda terlibat di setiap keputusan penting.', 'link' => ['/proses', 'Lihat proses proyek']],
        ['q' => 'Berapa estimasi biayanya?', 'k' => ['biaya', 'harga', 'tarif', 'estimasi', 'anggaran', 'budget', 'rab', 'berapa'],
         'a' => 'Biaya bergantung pada luas, kompleksitas, dan lingkup layanan. Kirim detail proyek Anda lewat formulir penawaran, dan tim kami akan menyiapkan estimasi yang sesuai.', 'link' => ['/penawaran', 'Minta penawaran']],
        ['q' => 'Saya ingin konsultasi desain!', 'k' => ['konsultasi', 'booking', 'jadwal', 'bertemu', 'temu', 'meeting', 'diskusi'],
         'a' => 'Dengan senang hati! Pilih tanggal dan jam yang nyaman di halaman Booking Konsultasi. Konsultasi dapat dilakukan online, tatap muka, atau lewat kunjungan lokasi.', 'link' => ['/konsultasi', 'Booking konsultasi']],
        ['q' => 'Berapa lama pengerjaan desain?', 'k' => ['lama', 'durasi', 'waktu', 'berapa lama', 'selesai', 'minggu', 'bulan'],
         'a' => 'Untuk rumah tinggal, desain konsep umumnya 2–3 minggu dan pengembangan desain 3–5 minggu. Durasi proyek yang lebih besar akan kami sesuaikan setelah konsultasi awal.'],
        ['q' => 'Apakah ada denah dan render 3D?', 'k' => ['denah', 'render', '3d', 'visual', 'gambar kerja', 'lantai'],
         'a' => 'Ya. Setiap proyek mencakup denah, tampak, dan render 3D eksterior maupun interior supaya Anda bisa melihat hasil akhir sebelum pembangunan dimulai.', 'link' => ['/denah-3d', 'Lihat denah & render']],
        ['q' => 'Apakah ArchiDesign bersertifikat?', 'k' => ['sertifikat', 'sertifikasi', 'lisensi', 'iso', 'izin', 'legal', 'resmi', 'lpjk', 'iai'],
         'a' => 'Ya. Kami memiliki sertifikasi ISO 9001:2015, keanggotaan Ikatan Arsitek Indonesia, dan sertifikat jasa konstruksi LPJK.', 'link' => ['/sertifikasi', 'Lihat sertifikasi']],
        ['q' => 'Di mana lokasi layanan?', 'k' => ['lokasi', 'alamat', 'kantor', 'dimana', 'di mana', 'wilayah', 'jangkauan', 'kota'],
         'a' => 'Kantor kami di Jl. Melati No. 45, Jakarta Selatan. Kami melayani proyek di seluruh Indonesia, dengan konsultasi online untuk luar kota.'],
        ['q' => 'Bisakah melihat portofolio?', 'k' => ['portofolio', 'portfolio', 'karya', 'contoh', 'proyek sebelumnya', 'hasil'],
         'a' => 'Tentu. Portofolio kami mencakup rumah modern, villa tropis, hingga gedung perkantoran. Anda bisa menyaringnya berdasarkan kategori.', 'link' => ['/portofolio', 'Lihat portofolio']],
        ['q' => 'Apakah desain bisa direvisi?', 'k' => ['revisi', 'ubah', 'perubahan', 'ganti', 'sesuai keinginan'],
         'a' => 'Bisa. Setiap tahap desain menyediakan putaran revisi agar hasil akhir benar-benar sesuai kebutuhan dan anggaran Anda.'],
        ['q' => 'Jam operasional dan kontak?', 'k' => ['jam', 'buka', 'operasional', 'kontak', 'telepon', 'telpon', 'email', 'hubungi', 'whatsapp', 'wa'],
         'a' => 'Kami buka Senin–Sabtu pukul 09.00–17.00 WIB. Hubungi +62 21 7654 3210 atau hello@archidesign.co.id, atau chat langsung lewat WhatsApp.'],
        ['q' => 'Apakah melayani renovasi?', 'k' => ['renovasi', 'rehab', 'perbaikan', 'bangunan lama', 'tambah lantai'],
         'a' => 'Ya, kami menangani renovasi dan penambahan ruang, mulai dari survei kondisi bangunan, desain ulang, hingga pendampingan pelaksanaan.'],
    ],
];
