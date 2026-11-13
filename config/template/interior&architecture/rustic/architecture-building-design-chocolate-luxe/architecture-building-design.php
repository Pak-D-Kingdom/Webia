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

    // Navbar sesuai desain. "Kontak" mengarah ke blok kontak di footer.
    'nav' => [
        ['key' => 'beranda',    'label' => 'Beranda',        'path' => ''],
        ['key' => 'portofolio', 'label' => 'Portofolio',     'path' => '/portofolio'],
        ['key' => 'proyek',     'label' => 'Proyek',         'path' => '/proyek'],
        ['key' => 'layanan',    'label' => 'Layanan',        'path' => '/layanan'],
        ['key' => 'denah-3d',   'label' => 'Desain & Render','path' => '/denah-3d'],
        ['key' => 'proses',     'label' => 'Proses Proyek',  'path' => '/proses'],
        ['key' => 'sertifikasi','label' => 'Sertifikasi',    'path' => '/sertifikasi'],
        ['key' => 'konsultasi', 'label' => 'Konsultasi',     'path' => '/konsultasi'],
        ['key' => 'kontak',     'label' => 'Kontak',         'path' => '#kontak'],
    ],

    'footer' => [
        'nav' => [
            ['Beranda', ''], ['Portofolio', '/portofolio'], ['Proyek', '/proyek'], ['Layanan', '/layanan'], ['Kontak', '#kontak'],
        ],
        'services' => ['Desain Arsitektur', 'Desain Interior', '3D Rendering', 'Konsultasi', 'Perencanaan Bangunan'],
        'credit'   => '© 2026 WEBIA by D-KREASI. Seluruh hak cipta dilindungi.',
    ],

    'portfolio' => [
        ['title' => 'Rumah Modern Minimalis', 'loc' => 'Jakarta Selatan', 'year' => '2025', 'cat' => 'residensial', 'img' => 'res-01.svg', 'area' => '220 m²', 'desc' => 'Hunian dua lantai dengan fasad kayu hangat, void tinggi, dan bukaan kaca besar yang menghadirkan cahaya alami.'],
        ['title' => 'Gedung Perkantoran', 'loc' => 'Jakarta Pusat', 'year' => '2024', 'cat' => 'komersial', 'img' => 'com-01.svg', 'area' => '4.800 m²', 'desc' => 'Menara perkantoran fasad kaca efisien energi dengan lobi dua lantai dan ruang terbuka hijau.'],
        ['title' => 'Villa Tropis Modern', 'loc' => 'Bali', 'year' => '2025', 'cat' => 'villa', 'img' => 'vil-01.svg', 'area' => '380 m²', 'desc' => 'Villa beratap kayu dengan teras lebar, kolam renang, dan taman tropis yang menyatu dengan bangunan.'],
        ['title' => 'Residence Wood House', 'loc' => 'Bandung', 'year' => '2024', 'cat' => 'residensial', 'img' => 'res-02.svg', 'area' => '310 m²', 'desc' => 'Rumah keluarga bernuansa rustic dengan panel kayu, dinding batu alam, dan balkon berkaca.'],
        ['title' => 'Kantor Sentra Niaga', 'loc' => 'Surabaya', 'year' => '2024', 'cat' => 'komersial', 'img' => 'com-02.svg', 'area' => '2.600 m²', 'desc' => 'Gedung niaga bertingkat dengan kanopi kayu, area ritel di lantai dasar, dan ruang kerja fleksibel.'],
        ['title' => 'Rumah Tropis Terra', 'loc' => 'Yogyakarta', 'year' => '2023', 'cat' => 'residensial', 'img' => 'res-04.svg', 'area' => '240 m²', 'desc' => 'Rumah tropis dengan sirkulasi udara silang, overhang lebar, dan taman tengah.'],
        ['title' => 'Villa Senja Ubud', 'loc' => 'Bali', 'year' => '2023', 'cat' => 'villa', 'img' => 'vil-02.svg', 'area' => '420 m²', 'desc' => 'Villa peristirahatan dengan pencahayaan hangat dan pemandangan lembah yang terbuka.'],
        ['title' => 'Rumah Nordik Hangat', 'loc' => 'Tangerang Selatan', 'year' => '2025', 'cat' => 'residensial', 'img' => 'res-05.svg', 'area' => '195 m²', 'desc' => 'Hunian kompak dengan palet kayu dan krem, dirancang untuk keluarga muda.'],
        ['title' => 'Plaza Bisnis Hijau', 'loc' => 'Jakarta Barat', 'year' => '2022', 'cat' => 'komersial', 'img' => 'com-03.svg', 'area' => '3.900 m²', 'desc' => 'Kompleks bisnis campuran dengan koridor hijau dan fasad kaca berlapis.'],
    ],

    'projects' => [
        'residensial' => [
            ['title' => 'Rumah Modern Minimalis', 'loc' => 'Jakarta Selatan', 'area' => '220 m²', 'floors' => '2 lantai', 'status' => 'Selesai 2025', 'img' => 'res-01.svg', 'desc' => 'Fasad kayu hangat dengan bukaan kaca besar dan void ruang keluarga.'],
            ['title' => 'Cluster Kayu Hangat', 'loc' => 'BSD City, Tangerang', 'area' => '180 m²', 'floors' => '2 lantai', 'status' => 'Selesai 2024', 'img' => 'res-03.svg', 'desc' => 'Hunian cluster dengan carport lebar, taman depan, dan pencahayaan malam.'],
            ['title' => 'Rumah Terra Courtyard', 'loc' => 'Malang', 'area' => '260 m²', 'floors' => '2 lantai', 'status' => 'Dalam pembangunan', 'img' => 'res-06.svg', 'desc' => 'Rumah bernuansa cokelat tua dengan courtyard dan ruang makan terbuka.'],
            ['title' => 'Residence Wood House', 'loc' => 'Bandung', 'area' => '310 m²', 'floors' => '2 lantai', 'status' => 'Selesai 2024', 'img' => 'res-02.svg', 'desc' => 'Rumah keluarga dengan panel kayu, dinding batu alam, dan balkon berkaca.'],
        ],
        'komersial' => [
            ['title' => 'Gedung Perkantoran Pusat', 'loc' => 'Jakarta Pusat', 'area' => '4.800 m²', 'floors' => '16 lantai', 'status' => 'Selesai 2024', 'img' => 'com-01.svg', 'desc' => 'Menara perkantoran fasad kaca efisien energi dengan lobi dua lantai.'],
            ['title' => 'Kantor Sentra Niaga', 'loc' => 'Surabaya', 'area' => '2.600 m²', 'floors' => '3 lantai', 'status' => 'Selesai 2024', 'img' => 'com-02.svg', 'desc' => 'Gedung niaga dengan kanopi kayu dan area ritel di lantai dasar.'],
            ['title' => 'Plaza Bisnis Hijau', 'loc' => 'Jakarta Barat', 'area' => '3.900 m²', 'floors' => '12 lantai', 'status' => 'Dalam pembangunan', 'img' => 'com-03.svg', 'desc' => 'Kompleks bisnis campuran dengan koridor hijau dan fasad berlapis.'],
            ['title' => 'Ruko Fasad Kaca', 'loc' => 'Medan', 'area' => '1.200 m²', 'floors' => '4 lantai', 'status' => 'Selesai 2023', 'img' => 'com-04.svg', 'desc' => 'Deretan ruko modern dengan fasad kaca dan aksen kayu.'],
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
        ['icon' => 'consult', 'title' => 'Konsultasi Awal',       'time' => '1 – 3 hari',   'desc' => 'Kami mendengarkan kebutuhan, gaya, lokasi, dan anggaran Anda, lalu merangkumnya dalam brief proyek.', 'out' => ['Brief proyek', 'Survei lokasi', 'Estimasi awal']],
        ['icon' => 'concept', 'title' => 'Desain Konsep',         'time' => '2 – 3 minggu', 'desc' => 'Tim kami menyusun sketsa massa, denah, dan konsep visual untuk Anda tinjau bersama.', 'out' => ['Sketsa & denah', 'Moodboard material', 'Render konsep']],
        ['icon' => 'develop', 'title' => 'Pengembangan Desain',   'time' => '3 – 5 minggu', 'desc' => 'Konsep terpilih dikembangkan menjadi gambar kerja, detail, spesifikasi, dan RAB.', 'out' => ['Gambar kerja', 'Detail & spesifikasi', 'RAB']],
        ['icon' => 'build',   'title' => 'Pelaksanaan',           'time' => 'Sesuai skala', 'desc' => 'Pembangunan berjalan dengan pengawasan berkala agar mutu, jadwal, dan biaya tetap terkendali.', 'out' => ['Jadwal kerja', 'Laporan progres', 'Kontrol mutu']],
        ['icon' => 'handover','title' => 'Serah Terima',          'time' => '1 – 2 minggu', 'desc' => 'Pemeriksaan akhir, perbaikan, dan penyerahan bangunan beserta dokumen lengkap.', 'out' => ['Pemeriksaan akhir', 'Dokumen as-built', 'Masa garansi']],
    ],

    'certs' => [
        ['img' => 'badge-iso.svg',  'title' => 'ISO 9001:2015',               'org' => 'Sistem Manajemen Mutu', 'desc' => 'Proses perancangan dan pengawasan kami berjalan dalam sistem manajemen mutu yang terdokumentasi dan diaudit berkala.'],
        ['img' => 'badge-iai.svg',  'title' => 'Ikatan Arsitek Indonesia',    'org' => 'Keanggotaan Profesional', 'desc' => 'Tim arsitek kami terdaftar sebagai anggota profesional dan mengikuti kode etik profesi arsitek.'],
        ['img' => 'badge-lpjk.svg', 'title' => 'LPJK Indonesia',              'org' => 'Lisensi Jasa Konstruksi', 'desc' => 'Badan usaha kami memiliki sertifikat jasa konstruksi untuk layanan perencanaan dan pengawasan bangunan.'],
    ],

    'consult' => [
        'services' => ['Desain Arsitektur', 'Desain Interior', 'Jasa 3D Rendering', 'Konsultasi Desain', 'Perencanaan Bangunan'],
        'times'    => ['09.00', '10.30', '13.00', '14.30', '16.00'],
        'modes'    => ['Online (Zoom / Google Meet)', 'Tatap muka di kantor', 'Kunjungan ke lokasi'],
    ],

    'quote' => [
        'types'   => ['Rumah Tinggal', 'Villa / Resort', 'Gedung Komersial', 'Desain Interior', 'Renovasi Bangunan', 'Lainnya'],
        'budgets' => ['< Rp 500 juta', 'Rp 500 juta – 1 miliar', 'Rp 1 – 3 miliar', 'Rp 3 – 10 miliar', '> Rp 10 miliar', 'Belum ditentukan'],
        'starts'  => ['Segera (≤ 1 bulan)', '1 – 3 bulan', '3 – 6 bulan', 'Masih perencanaan'],
    ],

    // Pertanyaan cepat (tampil di preview beranda & panel chatbot)
    'quick' => ['Apa saja layanan desainnya?', 'Bagaimana proses proyeknya?', 'Berapa estimasi biayanya?', 'Saya ingin konsultasi desain!'],

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
