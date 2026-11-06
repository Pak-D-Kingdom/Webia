<?php

/*
|--------------------------------------------------------------------------
| HopeTogether Foundation - Nonprofit & Community (Minimalist / Warm Neutral)
|--------------------------------------------------------------------------
| Semua konten statis template ada di file ini agar mudah diganti.
| Dibaca lewat: config('template.nonprofit&community.minimalis.foundation-warm-neutral.foundation')
| (routes sudah menyiapkan fallback jika config belum ter-load).
*/

return [

    'meta' => [
        'title'       => 'HopeTogether Foundation - Membangun Harapan untuk Masa Depan',
        'description' => 'Yayasan filantropi yang menghadirkan perubahan positif bagi masyarakat Indonesia melalui program pendidikan, kesehatan, pemberdayaan ekonomi, dan lingkungan.',
    ],

    'brand' => [
        'name'    => 'HopeTogether',
        'suffix'  => 'Foundation',
        'since'   => 2009,
        'credit'  => '© 2026 WEBIA by D-KREASI. Seluruh hak cipta dilindungi.',
        'rights'  => '© 2026 HopeTogether Foundation. All rights reserved.',
    ],

    'contact' => [
        'address'    => 'Jl. Harapan Baru No. 77, Jakarta Selatan',
        'phone'      => '+62 21 7788 8899',
        'phone_href' => 'tel:+622177888899',
        'email'      => 'info@hopetogether.or.id',
        'whatsapp'   => '62895630300345',
        'wa_text'    => 'Halo HopeTogether Foundation, saya ingin bertanya tentang program dan donasi.',
        'hours'      => 'Senin - Jumat, 08.00 - 17.00 WIB',
    ],

    'socials' => [
        ['key' => 'facebook',  'label' => 'Facebook',  'url' => '#'],
        ['key' => 'instagram', 'label' => 'Instagram', 'url' => '#'],
        ['key' => 'youtube',   'label' => 'YouTube',   'url' => '#'],
        ['key' => 'tiktok',    'label' => 'TikTok',    'url' => '#'],
    ],

    'nav' => [
        ['label' => 'Beranda',        'route' => 'home'],
        ['label' => 'Tentang Kami',   'route' => 'mission-vision'],
        ['label' => 'Program Kami',   'route' => 'programs'],
        ['label' => 'Dampak',         'route' => 'impact'],
        ['label' => 'Transparansi',   'route' => 'transparency'],
        ['label' => 'Mitra',          'route' => 'partners'],
        ['label' => 'Relawan',        'route' => 'volunteer'],
        ['label' => 'Berita & Acara', 'route' => 'news'],
        ['label' => 'Kontak',         'route' => 'kontak'],
    ],

    'hero' => [
        'script'    => 'Bersama, Kita Bisa',
        'title_a'   => 'Membangun',
        'highlight' => 'Harapan',
        'title_b'   => 'untuk Masa Depan',
        'text'      => 'Dengan kepedulian dan aksi nyata, kita wujudkan masyarakat yang lebih sejahtera dan penuh harapan.',
        'primary'   => 'Dukung Sekarang',
        'secondary' => 'Pelajari Lebih Lanjut',
        'quote'     => 'Karena Setiap Anak Berhak untuk Bermimpi',
    ],

    'mission' => [
        'title'   => 'Misi & Visi Kami',
        'summary' => 'Menjadi lembaga filantropi yang menghadirkan perubahan positif bagi masyarakat Indonesia.',
        'button'  => 'Tentang Kami',
        'vision'  => 'Terwujudnya masyarakat Indonesia yang sejahtera, mandiri, dan penuh harapan, tempat setiap anak berhak bermimpi dan meraih masa depan yang lebih baik.',
        'missions' => [
            ['title' => 'Akses pendidikan yang merata', 'text' => 'Membuka kesempatan belajar yang layak bagi anak-anak di seluruh pelosok negeri.'],
            ['title' => 'Layanan kesehatan terjangkau', 'text' => 'Menghadirkan layanan dan edukasi kesehatan untuk keluarga prasejahtera.'],
            ['title' => 'Ekonomi yang berdaya', 'text' => 'Mendampingi masyarakat membangun usaha dan penghasilan yang berkelanjutan.'],
            ['title' => 'Lingkungan yang lestari', 'text' => 'Menggerakkan aksi nyata menjaga bumi untuk generasi berikutnya.'],
            ['title' => 'Kolaborasi yang transparan', 'text' => 'Mengelola dana dan kemitraan secara terbuka, jujur, dan dapat dipertanggungjawabkan.'],
        ],
        'values' => [
            ['title' => 'Empati',          'text' => 'Mendengar dan memahami kebutuhan sebelum bertindak.'],
            ['title' => 'Integritas',      'text' => 'Jujur dalam setiap amanah yang dipercayakan kepada kami.'],
            ['title' => 'Kolaborasi',      'text' => 'Bergerak bersama donatur, relawan, dan mitra.'],
            ['title' => 'Keberlanjutan',   'text' => 'Memilih dampak jangka panjang dibanding hasil sesaat.'],
        ],
    ],

    'programs' => [
        'title'    => 'Program Kami',
        'subtitle' => 'Berbagai program untuk menciptakan dampak nyata.',
        'link'     => 'Lihat Semua Program',
        'items' => [
            [
                'key'   => 'pendidikan',
                'icon'  => 'ic-prog-heart',
                'title' => 'Pendidikan untuk Semua',
                'short' => 'Pendidikan untuk Semua',
                'text'  => 'Beasiswa, perpustakaan keliling, dan kelas inspirasi agar setiap anak dapat belajar dengan layak, di mana pun mereka tinggal.',
                'points' => ['Beasiswa anak berprestasi dari keluarga prasejahtera', 'Perpustakaan keliling dan taman bacaan', 'Pelatihan guru dan kelas inspirasi'],
                'stat_value' => '48.000+', 'stat_label' => 'anak terbantu',
            ],
            [
                'key'   => 'kesehatan',
                'icon'  => 'ic-prog-people',
                'title' => 'Kesehatan Masyarakat',
                'short' => 'Kesehatan Masyarakat',
                'text'  => 'Pemeriksaan kesehatan gratis, edukasi gizi, dan dukungan ibu-anak untuk komunitas yang sulit menjangkau layanan kesehatan.',
                'points' => ['Bakti sosial dan pemeriksaan kesehatan gratis', 'Edukasi gizi dan pencegahan stunting', 'Bantuan alat kesehatan dasar untuk posyandu'],
                'stat_value' => '120+', 'stat_label' => 'bakti sosial per tahun',
            ],
            [
                'key'   => 'ekonomi',
                'icon'  => 'ic-prog-sprout',
                'title' => 'Pemberdayaan Ekonomi',
                'short' => 'Pemberdayaan Ekonomi',
                'text'  => 'Pelatihan usaha, akses modal kecil, dan pendampingan untuk keluarga yang ingin mandiri secara ekonomi.',
                'points' => ['Pelatihan kewirausahaan dan literasi keuangan', 'Pendampingan UMKM perempuan', 'Akses pasar dan jejaring mitra'],
                'stat_value' => '6.400+', 'stat_label' => 'pelaku usaha didampingi',
            ],
            [
                'key'   => 'lingkungan',
                'icon'  => 'ic-prog-house',
                'title' => 'Lingkungan Berkelanjutan',
                'short' => 'Lingkungan Berkelanjutan',
                'text'  => 'Penanaman pohon, pengelolaan sampah, dan hunian layak yang ramah lingkungan untuk komunitas rentan.',
                'points' => ['Aksi tanam pohon bersama komunitas', 'Bank sampah dan edukasi daur ulang', 'Perbaikan rumah layak huni'],
                'stat_value' => '90.000+', 'stat_label' => 'pohon ditanam',
            ],
        ],
    ],

    'impact' => [
        'title'    => 'Dampak Kami',
        'subtitle' => 'Langkah kecil, dampak besar untuk masa depan.',
        'stats' => [
            ['value' => 250,  'display' => '250', 'suffix' => 'K+', 'label' => 'Penerima Manfaat'],
            ['value' => 1500, 'display' => '1.500', 'suffix' => '+', 'label' => 'Program Terlaksana'],
            ['value' => 45,   'display' => '45', 'suffix' => '+', 'label' => 'Provinsi'],
        ],
        'extra' => [
            ['value' => '3.200+', 'label' => 'Relawan aktif'],
            ['value' => '120+',   'label' => 'Mitra dan sponsor'],
            ['value' => '17',     'label' => 'Tahun berkarya'],
        ],
        // posisi pin di peta (persen)
        'pins' => [
            ['x' => 14, 'y' => 22, 'label' => 'Sumatra Utara'],
            ['x' => 36, 'y' => 66, 'label' => 'Jawa Barat'],
            ['x' => 52, 'y' => 34, 'label' => 'Kalimantan Timur'],
            ['x' => 65, 'y' => 54, 'label' => 'Sulawesi Selatan'],
            ['x' => 90, 'y' => 46, 'label' => 'Papua'],
        ],
        'years' => [
            ['year' => '2022', 'value' => '62K',  'height' => 25],
            ['year' => '2023', 'value' => '108K', 'height' => 43],
            ['year' => '2024', 'value' => '164K', 'height' => 66],
            ['year' => '2025', 'value' => '210K', 'height' => 84],
            ['year' => '2026', 'value' => '250K', 'height' => 100],
        ],
        'breakdown' => [
            ['label' => 'Pendidikan untuk Semua', 'percent' => 38],
            ['label' => 'Kesehatan Masyarakat', 'percent' => 27],
            ['label' => 'Pemberdayaan Ekonomi', 'percent' => 21],
            ['label' => 'Lingkungan Berkelanjutan', 'percent' => 14],
        ],
        'stories' => [
            ['title' => 'Dari ruang kelas darurat menjadi sekolah yang hidup', 'text' => 'Kelas inspirasi dan perpustakaan keliling membantu ratusan anak kembali percaya diri untuk belajar.'],
            ['title' => 'Ibu-ibu pelaku usaha kecil kini punya penghasilan tetap', 'text' => 'Pendampingan UMKM perempuan membuka akses modal dan pasar yang sebelumnya sulit dijangkau.'],
        ],
    ],

    'donation' => [
        'title'    => 'Pilihan Donasi',
        'subtitle' => 'Pilih cara berdonasi yang paling mudah untuk Anda.',
        'button'   => 'Donasi Sekarang',
        'options'  => [
            ['key' => 'sekali',  'icon' => 'ic-don-now',     'title' => 'Donasi Sekarang', 'sub' => '(Satu Kali)', 'text' => 'Donasi sekali bayar dengan nominal bebas. Cocok untuk Anda yang ingin langsung berbagi.'],
            ['key' => 'rutin',   'icon' => 'ic-don-routine', 'title' => 'Donasi Rutin',    'sub' => '(Bulanan)',   'text' => 'Donasi otomatis setiap bulan agar program berjalan konsisten sepanjang tahun.'],
            ['key' => 'barang',  'icon' => 'ic-don-goods',   'title' => 'Donasi Barang',   'sub' => '',            'text' => 'Salurkan buku, pakaian layak pakai, alat sekolah, dan perlengkapan kesehatan.'],
            ['key' => 'program', 'icon' => 'ic-don-program', 'title' => 'Donasi Program',  'sub' => '',            'text' => 'Pilih program yang paling dekat dengan hati Anda dan dukung langsung.'],
        ],
        'amounts' => [25000, 50000, 100000, 250000, 500000, 1000000],
        'methods' => ['Transfer bank', 'QRIS', 'E-wallet', 'Kartu kredit'],
        'steps' => [
            ['title' => 'Pilih jenis donasi', 'text' => 'Tentukan donasi satu kali, rutin, barang, atau untuk program tertentu.'],
            ['title' => 'Isi data singkat',   'text' => 'Masukkan nominal, nama, dan nomor WhatsApp Anda.'],
            ['title' => 'Konfirmasi via WhatsApp', 'text' => 'Tim kami mengirimkan detail pembayaran dan bukti donasi resmi.'],
        ],
    ],

    'transparency' => [
        'title'    => 'Laporan Transparansi Keuangan',
        'summary'  => 'Kami berkomitmen untuk pengelolaan dana yang aman dan transparan.',
        'button'   => 'Lihat Laporan',
        'totals'   => [
            ['value' => 'Rp 18,4 M', 'label' => 'Total donasi diterima 2025'],
            ['value' => 'Rp 15,1 M', 'label' => 'Disalurkan ke program'],
            ['value' => '82%',       'label' => 'Dana untuk penerima manfaat'],
        ],
        'allocation' => [
            ['label' => 'Program dan penyaluran', 'percent' => 82, 'color' => '#8B5E14'],
            ['label' => 'Operasional',            'percent' => 10, 'color' => '#C8860D'],
            ['label' => 'Penggalangan dana',      'percent' => 5,  'color' => '#7E9B4A'],
            ['label' => 'Dana cadangan',          'percent' => 3,  'color' => '#D9C49A'],
        ],
        'reports' => [
            ['period' => '2025',       'title' => 'Laporan Tahunan 2025',               'type' => 'Laporan tahunan', 'size' => 'PDF - 4,2 MB'],
            ['period' => '2025',       'title' => 'Laporan Audit Keuangan 2025',        'type' => 'Audit independen', 'size' => 'PDF - 2,8 MB'],
            ['period' => 'Triwulan 3 2026', 'title' => 'Laporan Triwulan III 2026',     'type' => 'Laporan triwulan', 'size' => 'PDF - 1,6 MB'],
            ['period' => 'Triwulan 2 2026', 'title' => 'Laporan Triwulan II 2026',      'type' => 'Laporan triwulan', 'size' => 'PDF - 1,5 MB'],
        ],
        'principles' => [
            ['title' => 'Diaudit setiap tahun', 'text' => 'Laporan keuangan diperiksa auditor independen dan dipublikasikan terbuka.'],
            ['title' => 'Bukti donasi resmi',   'text' => 'Setiap donasi mendapat bukti dan laporan penyaluran yang dapat dilacak.'],
            ['title' => 'Biaya operasional terbatas', 'text' => 'Sebagian besar dana langsung digunakan untuk program penerima manfaat.'],
        ],
    ],

    'partners' => [
        'title'    => 'Mitra & Sponsor',
        'subtitle' => 'Bersama mitra terpercaya, kami melangkah lebih jauh.',
        'button'   => 'Lihat Semua Mitra',
        'items' => [
            ['key' => 'bca',       'name' => 'BCA',       'field' => 'Perbankan', 'text' => 'Dukungan program pendidikan dan literasi keuangan.'],
            ['key' => 'mandiri',   'name' => 'Mandiri',   'field' => 'Perbankan', 'text' => 'Kemitraan pemberdayaan UMKM dan akses permodalan.'],
            ['key' => 'bni',       'name' => 'BNI',       'field' => 'Perbankan', 'text' => 'Dukungan beasiswa dan kegiatan sosial komunitas.'],
            ['key' => 'unilever',  'name' => 'Unilever',  'field' => 'Barang konsumen', 'text' => 'Kampanye kebersihan, kesehatan, dan gaya hidup berkelanjutan.'],
            ['key' => 'pertamina', 'name' => 'Pertamina', 'field' => 'Energi', 'text' => 'Program lingkungan dan hunian layak di daerah terpencil.'],
        ],
        'ways' => [
            ['title' => 'Sponsor program', 'text' => 'Mendanai satu program tertentu selama periode yang disepakati.'],
            ['title' => 'Kemitraan CSR',   'text' => 'Menyelaraskan agenda tanggung jawab sosial perusahaan dengan program kami.'],
            ['title' => 'Kolaborasi relawan perusahaan', 'text' => 'Melibatkan karyawan dalam kegiatan lapangan bersama kami.'],
        ],
    ],

    'volunteer' => [
        'title'    => 'Daftar Relawan',
        'summary'  => 'Bergabunglah bersama kami untuk melakukan aksi nyata dan menyebarkan kebaikan.',
        'button'   => 'Daftar Sekarang',
        'areas' => ['Pendidikan', 'Kesehatan', 'Pemberdayaan Ekonomi', 'Lingkungan', 'Dokumentasi dan Media', 'Administrasi dan Logistik'],
        'availability' => ['Akhir pekan', 'Hari kerja', 'Fleksibel', 'Hanya saat acara besar'],
        'benefits' => [
            ['title' => 'Sertifikat relawan', 'text' => 'Pengakuan resmi atas kontribusi Anda.'],
            ['title' => 'Pelatihan dan pendampingan', 'text' => 'Bekal keterampilan sebelum turun ke lapangan.'],
            ['title' => 'Komunitas yang hangat', 'text' => 'Bertemu orang-orang yang peduli dengan hal yang sama.'],
        ],
        'steps' => [
            ['title' => 'Isi formulir', 'text' => 'Ceritakan minat dan ketersediaan waktu Anda.'],
            ['title' => 'Percakapan singkat', 'text' => 'Tim relawan menghubungi Anda melalui WhatsApp.'],
            ['title' => 'Mulai bergerak', 'text' => 'Anda ditempatkan pada kegiatan yang sesuai.'],
        ],
    ],

    'news' => [
        'title'    => 'Berita & Acara',
        'subtitle' => 'Ikuti kabar terbaru dan kegiatan kami.',
        'link'     => 'Lihat Semua',
        'items' => [
            ['category' => 'Berita', 'date' => '15 Okt 2026', 'title' => 'Program Pendidikan untuk Anak Negeri', 'image' => 'news-1.jpg', 'text' => 'Ratusan anak di tiga provinsi mulai mengikuti kelas inspirasi dan memperoleh perlengkapan belajar baru dari program pendidikan kami.'],
            ['category' => 'Berita', 'date' => '10 Okt 2026', 'title' => 'Aksi Tanam Pohon untuk Bumi', 'image' => 'news-2.jpg', 'text' => 'Relawan dan warga menanam ribuan bibit pohon sebagai bagian dari program lingkungan berkelanjutan.'],
            ['category' => 'Berita', 'date' => '5 Okt 2026', 'title' => 'Festival Peduli Sesama', 'image' => 'news-3.jpg', 'text' => 'Festival tahunan mempertemukan donatur, relawan, dan mitra untuk merayakan semangat berbagi.'],
            ['category' => 'Berita', 'date' => '28 Sep 2026', 'title' => 'Laporan Keuangan Semester I Resmi Dirilis', 'image' => 'report-illustration.jpg', 'text' => 'Laporan semester pertama kini dapat diunduh publik sebagai wujud komitmen transparansi.'],
            ['category' => 'Berita', 'date' => '19 Sep 2026', 'title' => 'Relawan Baru Bergabung di Kelas Inspirasi', 'image' => 'volunteer-hands.jpg', 'text' => 'Puluhan relawan baru dilantik dan siap mendampingi kegiatan belajar di daerah mitra.'],
            ['category' => 'Berita', 'date' => '2 Sep 2026', 'title' => 'Panen Pertama Kebun Harapan', 'image' => 'mission-plant.jpg', 'text' => 'Kebun komunitas yang dikelola bersama warga menghasilkan panen pertama untuk dapur sehat keluarga.'],
        ],
        'events' => [
            ['category' => 'Acara', 'day' => '14', 'month' => 'Nov', 'year' => '2026', 'title' => 'Bakti Sosial Kesehatan Gratis', 'place' => 'Bekasi, Jawa Barat', 'time' => '08.00 - 13.00 WIB', 'text' => 'Pemeriksaan kesehatan, konsultasi gizi, dan pembagian vitamin untuk keluarga.'],
            ['category' => 'Acara', 'day' => '28', 'month' => 'Nov', 'year' => '2026', 'title' => 'Pelatihan UMKM Perempuan', 'place' => 'Surabaya, Jawa Timur', 'time' => '09.00 - 15.00 WIB', 'text' => 'Pelatihan pengelolaan usaha dan pemasaran digital bagi pelaku usaha perempuan.'],
            ['category' => 'Acara', 'day' => '12', 'month' => 'Des', 'year' => '2026', 'title' => 'Malam Amal HopeTogether', 'place' => 'Jakarta Selatan', 'time' => '18.30 - 21.30 WIB', 'text' => 'Malam penggalangan dana untuk program pendidikan tahun depan.'],
        ],
    ],

    'quote' => [
        'text' => 'Kebaikan kecil, berarti besar untuk mereka',
    ],

    'footer' => [
        'about'   => 'Yayasan filantropi yang bergerak bersama donatur, relawan, dan mitra untuk menghadirkan harapan bagi masyarakat Indonesia.',
        'nav_title'     => 'Navigasi',
        'services_title'=> 'Layanan',
        'contact_title' => 'Kontak Kami',
        'profile_title' => 'Download Profile',
        'profile_button'=> 'Download PDF',
        'legal' => [
            ['label' => 'Kebijakan Privasi'],
            ['label' => 'Syarat & Ketentuan'],
        ],
    ],

    'chatbot' => [
        'name'     => 'HopeBot',
        'greeting' => 'Halo! Saya HopeBot!',
        'intro'    => 'Tanya apa saja tentang program, donasi, atau kegiatan kami, ya!',
        'placeholder' => 'Tulis pertanyaan Anda...',
        'fallback' => 'Maaf, saya belum menemukan jawaban yang pas. Coba tanyakan seputar program, donasi, relawan, dampak, atau kegiatan terbaru. Anda juga bisa langsung menghubungi tim kami lewat WhatsApp.',
        'quick' => [
            'Bagaimana cara berdonasi?',
            'Program apa saja yang tersedia?',
            'Bagaimana menjadi relawan?',
            'Apa dampak dari program ini?',
            'Informasi kegiatan terbaru?',
        ],
        'faq' => [
            ['q' => 'Bagaimana cara berdonasi?', 'keywords' => ['donasi', 'berdonasi', 'donate', 'cara bayar', 'transfer', 'menyumbang', 'sumbang'],
             'a' => 'Buka halaman Donasi, pilih jenis donasi (satu kali, rutin bulanan, barang, atau program), isi nominal dan data Anda, lalu lanjutkan konfirmasi lewat WhatsApp. Tim kami akan mengirimkan detail pembayaran dan bukti donasi.', 'link' => 'donation', 'link_label' => 'Buka halaman Donasi'],
            ['q' => 'Berapa minimal donasi?', 'keywords' => ['minimal', 'nominal', 'berapa', 'jumlah', 'paling kecil'],
             'a' => 'Tidak ada batas minimal. Pilihan cepat dimulai dari Rp 25.000, dan Anda bebas mengisi nominal lain sesuai kemampuan.', 'link' => 'donation', 'link_label' => 'Pilih nominal'],
            ['q' => 'Apa itu donasi rutin?', 'keywords' => ['rutin', 'bulanan', 'langganan', 'tiap bulan', 'setiap bulan'],
             'a' => 'Donasi rutin adalah donasi bulanan dengan nominal tetap pilihan Anda. Dengan begitu program kami dapat berjalan konsisten sepanjang tahun.', 'link' => 'donation', 'link_label' => 'Mulai donasi rutin'],
            ['q' => 'Bagaimana donasi barang?', 'keywords' => ['barang', 'buku', 'pakaian', 'baju', 'alat sekolah', 'kirim barang'],
             'a' => 'Kami menerima buku, pakaian layak pakai, alat sekolah, dan perlengkapan kesehatan. Hubungi tim kami lewat WhatsApp untuk mengatur pengiriman atau penjemputan.', 'link' => 'donation', 'link_label' => 'Lihat donasi barang'],
            ['q' => 'Program apa saja yang tersedia?', 'keywords' => ['program', 'kegiatan program', 'tersedia', 'pendidikan', 'kesehatan', 'ekonomi', 'lingkungan'],
             'a' => 'Ada empat program utama: Pendidikan untuk Semua, Kesehatan Masyarakat, Pemberdayaan Ekonomi, dan Lingkungan Berkelanjutan. Anda dapat mendukung salah satunya secara langsung.', 'link' => 'programs', 'link_label' => 'Lihat semua program'],
            ['q' => 'Bagaimana menjadi relawan?', 'keywords' => ['relawan', 'volunteer', 'bergabung', 'daftar relawan', 'ikut serta'],
             'a' => 'Isi formulir pendaftaran relawan berisi minat dan ketersediaan waktu Anda. Tim kami akan menghubungi lewat WhatsApp untuk percakapan singkat sebelum Anda mulai bertugas.', 'link' => 'volunteer', 'link_label' => 'Daftar relawan'],
            ['q' => 'Apa dampak dari program ini?', 'keywords' => ['dampak', 'hasil', 'penerima manfaat', 'provinsi', 'pencapaian', 'capaian'],
             'a' => 'Sampai saat ini kami telah menjangkau lebih dari 250 ribu penerima manfaat melalui 1.500+ program di 45+ provinsi.', 'link' => 'impact', 'link_label' => 'Lihat laporan dampak'],
            ['q' => 'Informasi kegiatan terbaru?', 'keywords' => ['kegiatan', 'terbaru', 'acara', 'berita', 'agenda', 'event', 'jadwal'],
             'a' => 'Agenda terdekat: Bakti Sosial Kesehatan Gratis (14 Nov), Pelatihan UMKM Perempuan (28 Nov), dan Malam Amal HopeTogether (12 Des). Kabar lengkapnya ada di halaman Berita & Acara.', 'link' => 'news', 'link_label' => 'Buka Berita & Acara'],
            ['q' => 'Di mana laporan keuangan?', 'keywords' => ['laporan', 'keuangan', 'transparan', 'transparansi', 'audit', 'dana', 'penyaluran'],
             'a' => 'Laporan keuangan dan audit independen dipublikasikan di halaman Transparansi. Sekitar 82% dana disalurkan langsung ke program penerima manfaat.', 'link' => 'transparency', 'link_label' => 'Lihat laporan'],
            ['q' => 'Bagaimana menjadi mitra atau sponsor?', 'keywords' => ['mitra', 'sponsor', 'kemitraan', 'csr', 'kerja sama', 'kerjasama', 'perusahaan'],
             'a' => 'Perusahaan dan komunitas dapat menjadi sponsor program, mitra CSR, atau menggerakkan relawan perusahaan. Hubungi kami untuk membahas bentuk kerja sama yang cocok.', 'link' => 'partners', 'link_label' => 'Lihat mitra kami'],
            ['q' => 'Apakah ada bukti donasi?', 'keywords' => ['bukti', 'kuitansi', 'kwitansi', 'pajak', 'resi', 'tanda terima'],
             'a' => 'Ya. Setiap donasi mendapat bukti donasi resmi yang dikirim melalui WhatsApp atau email setelah pembayaran terkonfirmasi.', 'link' => '', 'link_label' => ''],
            ['q' => 'Bagaimana cara menghubungi kami?', 'keywords' => ['kontak', 'hubungi', 'alamat', 'telepon', 'telpon', 'email', 'lokasi', 'whatsapp', 'jam'],
             'a' => 'Kantor kami di Jl. Harapan Baru No. 77, Jakarta Selatan. Telepon +62 21 7788 8899, email info@hopetogether.or.id, jam layanan Senin - Jumat 08.00 - 17.00 WIB.', 'link' => '', 'link_label' => ''],
        ],
    ],
];
