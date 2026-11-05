<?php

/**
 * Data konten statis template Foundation — Professional · Classic Trust.
 * File ini TIDAK dimuat otomatis oleh Laravel (sub-folder config), tetapi di-require
 * oleh routes/web.php (lihat CHANGES.md). Tidak ada query / backend.
 */
return [
    'brand' => [
        'name'     => 'Harapan Untuk Negeri',
        'suffix'   => 'Foundation',
        'tagline'  => 'Bersama, Kita Bisa',
        'credit'   => '© 2026 WEBIA by D-KREASI. Seluruh hak cipta dilindungi.',
        'copyright'=> '© 2026 Harapan Untuk Negeri Foundation. All rights reserved.',
    ],

    'contact' => [
        'address' => 'Jl. Kebahagiaan No. 100, Jakarta Pusat',
        'phone'   => '+62 21 1234 5678',
        'phone_href' => 'tel:+622112345678',
        'email'   => 'halo@harapanuntuknegeri.org',
        'whatsapp'=> '62895630300345', // nomor WhatsApp tujuan semua form & tombol WA
    ],

    'social' => [
        ['key' => 'facebook',  'label' => 'Facebook',  'url' => '#'],
        ['key' => 'instagram', 'label' => 'Instagram', 'url' => '#'],
        ['key' => 'youtube',   'label' => 'YouTube',   'url' => '#'],
        ['key' => 'tiktok',    'label' => 'TikTok',    'url' => '#'],
    ],

    // route = nama route (prefix foundation-classic-trust.) ; '#kontak' = anchor footer
    'nav' => [
        ['label' => 'Beranda',        'route' => 'index'],
        ['label' => 'Tentang Kami',   'route' => 'mission'],
        ['label' => 'Program Kami',   'route' => 'programs'],
        ['label' => 'Dampak',         'route' => 'impact'],
        ['label' => 'Transparansi',   'route' => 'financial'],
        ['label' => 'Mitra',          'route' => 'partners'],
        ['label' => 'Relawan',        'route' => 'volunteer'],
        ['label' => 'Berita & Acara', 'route' => 'news'],
        ['label' => 'Kontak',         'route' => '#kontak'],
    ],

    'footer_nav' => [
        'Navigasi' => [
            ['Beranda', 'index'], ['Tentang Kami', 'mission'], ['Program Kami', 'programs'], ['Dampak', 'impact'],
        ],
        'Layanan' => [
            ['Donasi', 'donation'], ['Relawan', 'volunteer'], ['Berita & Acara', 'news'], ['Kontak', '#kontak'],
        ],
    ],

    'mission' => [
        'summary' => 'Menjadi lembaga filantropi terpercaya yang menghadirkan perubahan positif bagi masyarakat Indonesia.',
        'vision'  => 'Menjadi lembaga filantropi terpercaya yang menghadirkan perubahan positif dan kehidupan yang lebih sejahtera bagi masyarakat Indonesia.',
        'missions' => [
            'Menyediakan akses pendidikan yang layak dan berkualitas bagi anak-anak di seluruh pelosok negeri.',
            'Meningkatkan kualitas kesehatan masyarakat melalui layanan kesehatan yang mudah dijangkau.',
            'Memberdayakan ekonomi keluarga dan komunitas agar mandiri dan berkelanjutan.',
            'Menjaga kelestarian lingkungan melalui aksi nyata bersama masyarakat.',
            'Mengelola setiap donasi secara transparan, akuntabel, dan tepat sasaran.',
        ],
        'values' => [
            ['Integritas', 'Jujur dan bertanggung jawab dalam setiap keputusan serta pengelolaan dana.'],
            ['Kepedulian', 'Mengutamakan kebutuhan penerima manfaat dengan empati dan ketulusan.'],
            ['Kolaborasi', 'Bekerja bersama relawan, mitra, dan pemerintah untuk dampak yang lebih besar.'],
            ['Akuntabilitas', 'Melaporkan hasil dan penggunaan dana secara terbuka kepada publik.'],
        ],
    ],

    'programs' => [
        [
            'slug' => 'pendidikan', 'title' => 'Pendidikan untuk Semua', 'short' => "Pendidikan\nuntuk Semua",
            'image' => 'program-pendidikan.jpg',
            'desc' => 'Beasiswa, perpustakaan desa, dan pelatihan guru agar setiap anak Indonesia dapat belajar dengan layak.',
            'points' => ['Beasiswa anak berprestasi dan kurang mampu', 'Pembangunan sudut baca dan perpustakaan desa', 'Pelatihan guru dan pendamping belajar'],
            'stat' => ['85.000+', 'anak terbantu'],
        ],
        [
            'slug' => 'kesehatan', 'title' => 'Kesehatan Masyarakat', 'short' => "Kesehatan\nMasyarakat",
            'image' => 'program-kesehatan.jpg',
            'desc' => 'Layanan kesehatan gratis, penyuluhan gizi, dan klinik keliling untuk wilayah yang sulit dijangkau.',
            'points' => ['Pemeriksaan dan pengobatan gratis', 'Penyuluhan gizi ibu dan anak', 'Klinik keliling untuk wilayah terpencil'],
            'stat' => ['62.000+', 'warga terlayani'],
        ],
        [
            'slug' => 'pemberdayaan', 'title' => 'Pemberdayaan Ekonomi', 'short' => "Pemberdayaan\nEkonomi",
            'image' => 'program-pemberdayaan.jpg',
            'desc' => 'Pelatihan usaha, pendampingan petani, dan akses modal agar keluarga dapat mandiri secara ekonomi.',
            'points' => ['Pelatihan kewirausahaan dan keuangan', 'Pendampingan petani dan UMKM desa', 'Akses modal usaha dan pemasaran'],
            'stat' => ['38.000+', 'keluarga mandiri'],
        ],
        [
            'slug' => 'lingkungan', 'title' => 'Pelestarian Lingkungan', 'short' => "Pelestarian\nLingkungan",
            'image' => 'program-lingkungan.jpg',
            'desc' => 'Penanaman pohon, pengelolaan sampah, dan edukasi lingkungan bersama komunitas lokal.',
            'points' => ['Aksi tanam pohon bersama warga', 'Bank sampah dan daur ulang komunitas', 'Edukasi lingkungan di sekolah'],
            'stat' => ['120.000+', 'pohon ditanam'],
        ],
    ],

    'impact' => [
        'stats' => [
            ['value' => 250000, 'suffix' => '+', 'label' => 'Penerima Manfaat', 'icon' => 'impact-people.png'],
            ['value' => 1200,   'suffix' => '+', 'label' => 'Program Kegiatan', 'icon' => 'impact-heart.png'],
            ['value' => 34,     'suffix' => '',  'label' => 'Provinsi',          'icon' => 'impact-pin.png'],
        ],
        'by_year' => [
            ['2022', 38], ['2023', 56], ['2024', 78], ['2025', 92], ['2026', 100],
        ],
        'milestones' => [
            ['2018', 'Yayasan berdiri dengan program beasiswa pertama di 3 provinsi.'],
            ['2020', 'Meluncurkan klinik keliling dan program pemberdayaan ekonomi desa.'],
            ['2023', 'Menjangkau 25 provinsi dan menerbitkan laporan keuangan teraudit pertama.'],
            ['2026', 'Hadir di 34 provinsi dengan lebih dari 250.000 penerima manfaat.'],
        ],
    ],

    'donation' => [
        'options' => [
            ['key' => 'sekarang', 'title' => 'Donasi Sekarang', 'sub' => 'Donasi Online',      'icon' => 'donate-now.png',     'desc' => 'Donasi sekali waktu dengan nominal bebas, langsung tersalurkan ke program prioritas.'],
            ['key' => 'rutin',    'title' => 'Donasi Rutin',    'sub' => 'Bulanan',            'icon' => 'donate-routine.png', 'desc' => 'Berbagi setiap bulan agar program berjalan berkelanjutan dan dampaknya semakin besar.'],
            ['key' => 'barang',   'title' => 'Donasi Barang',   'sub' => 'Bantuan Langsung',   'icon' => 'donate-goods.png',   'desc' => 'Salurkan buku, pakaian layak, alat kesehatan, dan kebutuhan pokok langsung ke penerima.'],
            ['key' => 'program',  'title' => 'Donasi Program',  'sub' => 'Tematik',            'icon' => 'donate-program.png', 'desc' => 'Pilih program tertentu — pendidikan, kesehatan, ekonomi, atau lingkungan.'],
        ],
        'amounts' => [50000, 100000, 250000, 500000, 1000000],
        'programs' => ['Pendidikan untuk Semua', 'Kesehatan Masyarakat', 'Pemberdayaan Ekonomi', 'Pelestarian Lingkungan', 'Dana Umum (Prioritas Terbesar)'],
    ],

    'financial' => [
        'summary' => 'Kami berkomitmen untuk transparansi dalam setiap pengelolaan dana.',
        'allocation' => [
            ['Program & penyaluran manfaat', 84],
            ['Operasional & administrasi', 10],
            ['Penggalangan dana', 6],
        ],
        // Contoh data — ganti dengan angka resmi dari yayasan.
        'years' => [
            ['2025', 'Rp 48,2 M', 'Rp 45,9 M', 'Teraudit — Wajar Tanpa Pengecualian'],
            ['2024', 'Rp 39,6 M', 'Rp 37,4 M', 'Teraudit — Wajar Tanpa Pengecualian'],
            ['2023', 'Rp 31,1 M', 'Rp 29,8 M', 'Teraudit — Wajar Tanpa Pengecualian'],
        ],
        'reports' => [
            ['Laporan Keuangan Tahunan 2025', 'PDF · 2,4 MB'],
            ['Laporan Audit Independen 2025', 'PDF · 1,8 MB'],
            ['Laporan Dampak & Kegiatan 2025', 'PDF · 5,1 MB'],
            ['Laporan Keuangan Tahunan 2024', 'PDF · 2,2 MB'],
        ],
    ],

    'partners' => [
        ['name' => 'BCA',          'image' => 'partner-bca.png',      'type' => 'Mitra Perbankan'],
        ['name' => 'Bank Mandiri', 'image' => 'partner-mandiri.png',  'type' => 'Mitra Perbankan'],
        ['name' => 'BNI',          'image' => 'partner-bni.png',      'type' => 'Mitra Perbankan'],
        ['name' => 'Telkom Indonesia', 'image' => 'partner-telkom.png', 'type' => 'Mitra Teknologi'],
        ['name' => 'Unilever',     'image' => 'partner-unilever.png', 'type' => 'Mitra CSR'],
    ],

    'volunteer' => [
        'roles' => ['Pengajar & Pendamping Belajar', 'Tenaga Kesehatan', 'Pendamping Usaha Desa', 'Aksi Lingkungan', 'Dokumentasi & Media', 'Administrasi & Logistik'],
        'benefits' => [
            ['Sertifikat Relawan', 'Diberikan setelah menyelesaikan penugasan.'],
            ['Pelatihan & Pendampingan', 'Bekal sebelum turun ke lapangan.'],
            ['Komunitas Peduli', 'Terhubung dengan relawan dari seluruh Indonesia.'],
        ],
    ],

    'news' => [
        ['slug' => 'pendidikan-desa-bangkit', 'category' => 'Berita', 'title' => 'Program Pendidikan di Desa Bangkit', 'date' => '24 Okt 2026', 'image' => 'program-pendidikan.jpg',
         'excerpt' => 'Lebih dari 300 anak di Desa Bangkit kini belajar di sudut baca baru dan mendapat pendampingan belajar setiap pekan.'],
        ['slug' => 'layanan-kesehatan-gratis', 'category' => 'Berita', 'title' => 'Layanan Kesehatan Gratis untuk Warga', 'date' => '20 Okt 2026', 'image' => 'program-kesehatan.jpg',
         'excerpt' => 'Klinik keliling melayani pemeriksaan, pengobatan, dan penyuluhan gizi untuk ratusan warga di wilayah terpencil.'],
        ['slug' => 'aksi-tanam-pohon-bersama', 'category' => 'Acara', 'title' => 'Aksi Tanam Pohon Bersama', 'date' => '15 Okt 2026', 'image' => 'program-lingkungan.jpg',
         'excerpt' => 'Relawan dan warga menanam ribuan bibit pohon untuk menjaga daerah resapan air dan memperkuat lahan produktif.'],
        ['slug' => 'pelatihan-usaha-desa', 'category' => 'Acara', 'title' => 'Pelatihan Usaha untuk Petani dan UMKM Desa', 'date' => '8 Okt 2026', 'image' => 'program-pemberdayaan.jpg',
         'excerpt' => 'Peserta belajar pencatatan keuangan, pengemasan produk, dan pemasaran digital bersama mentor berpengalaman.'],
        ['slug' => 'beasiswa-2026', 'category' => 'Berita', 'title' => 'Penerima Beasiswa Harapan 2026 Diumumkan', 'date' => '1 Okt 2026', 'image' => 'program-pendidikan.jpg',
         'excerpt' => 'Sebanyak 1.200 pelajar dari 34 provinsi menerima beasiswa untuk melanjutkan pendidikan tahun ajaran baru.'],
        ['slug' => 'klinik-keliling-baru', 'category' => 'Berita', 'title' => 'Klinik Keliling Baru Mulai Beroperasi', 'date' => '24 Sep 2026', 'image' => 'program-kesehatan.jpg',
         'excerpt' => 'Dua unit klinik keliling tambahan siap menjangkau desa-desa yang sulit diakses layanan kesehatan.'],
    ],

    'faq' => [
        'greeting' => 'Halo! Saya HarapanBot! Saya siap membantu Anda seputar program kami dan donasi.',
        'quick' => [
            'Bagaimana cara berdonasi?',
            'Program apa saja yang tersedia?',
            'Bagaimana menjadi relawan?',
            'Laporan penggunaan dana?',
            'Informasi kegiatan terbaru?',
        ],
        'items' => [
            ['group' => 'Donasi',  'q' => 'Bagaimana cara berdonasi?',
             'a' => 'Anda bisa berdonasi lewat halaman Donasi: pilih jenis donasi (sekarang, rutin, barang, atau program), tentukan nominal, lalu kirim konfirmasi melalui WhatsApp. Tim kami akan memandu langkah pembayaran berikutnya.',
             'keywords' => ['donasi', 'berdonasi', 'cara', 'sumbang', 'bayar', 'transfer'], 'link' => 'donation'],
            ['group' => 'Donasi',  'q' => 'Apakah donasi bisa dilakukan rutin setiap bulan?',
             'a' => 'Bisa. Pilih Donasi Rutin untuk berbagi setiap bulan dengan nominal yang Anda tentukan. Anda dapat mengubah atau menghentikannya kapan saja dengan menghubungi tim kami.',
             'keywords' => ['rutin', 'bulanan', 'berkala', 'langganan'], 'link' => 'donation'],
            ['group' => 'Donasi',  'q' => 'Bagaimana jika ingin menyumbang barang?',
             'a' => 'Pilih Donasi Barang, lalu sebutkan jenis dan jumlah barang (buku, pakaian layak, alat kesehatan, kebutuhan pokok). Tim kami akan mengatur penjemputan atau pengiriman ke penerima manfaat.',
             'keywords' => ['barang', 'buku', 'pakaian', 'langsung'], 'link' => 'donation'],
            ['group' => 'Donasi',  'q' => 'Bagaimana laporan penggunaan dana?',
             'a' => 'Laporan keuangan tahunan dan laporan audit independen dapat dilihat dan diunduh di halaman Transparansi. Sekitar 84% dana disalurkan langsung ke program.',
             'keywords' => ['laporan', 'dana', 'keuangan', 'audit', 'transparan', 'penggunaan'], 'link' => 'financial'],
            ['group' => 'Program', 'q' => 'Program apa saja yang tersedia?',
             'a' => 'Ada empat program utama: Pendidikan untuk Semua, Kesehatan Masyarakat, Pemberdayaan Ekonomi, dan Pelestarian Lingkungan. Detailnya ada di halaman Program Kami.',
             'keywords' => ['program', 'tersedia', 'pendidikan', 'kesehatan', 'ekonomi', 'lingkungan'], 'link' => 'programs'],
            ['group' => 'Program', 'q' => 'Bagaimana menjadi relawan?',
             'a' => 'Isi formulir pendaftaran di halaman Relawan: data diri, bidang yang diminati, dan ketersediaan waktu. Tim relawan akan menghubungi Anda melalui WhatsApp.',
             'keywords' => ['relawan', 'volunteer', 'daftar', 'bergabung', 'gabung'], 'link' => 'volunteer'],
            ['group' => 'Program', 'q' => 'Bagaimana cara menjadi mitra atau sponsor?',
             'a' => 'Perusahaan dan lembaga dapat berkolaborasi melalui program CSR, donasi barang, atau kemitraan program. Lihat halaman Mitra lalu hubungi kami melalui WhatsApp.',
             'keywords' => ['mitra', 'sponsor', 'csr', 'kerja sama', 'kolaborasi'], 'link' => 'partners'],
            ['group' => 'Program', 'q' => 'Informasi kegiatan terbaru?',
             'a' => 'Berita dan agenda kegiatan terbaru kami ada di halaman Berita & Acara, mulai dari aksi tanam pohon hingga layanan kesehatan gratis.',
             'keywords' => ['kegiatan', 'terbaru', 'berita', 'acara', 'agenda', 'informasi'], 'link' => 'news'],
        ],
        'fallback' => 'Maaf, saya belum menemukan jawaban untuk pertanyaan itu. Silakan pilih salah satu pertanyaan di bawah, atau hubungi tim kami melalui WhatsApp.',
    ],
];
