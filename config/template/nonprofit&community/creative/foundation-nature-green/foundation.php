<?php

/*
|--------------------------------------------------------------------------
| GreenHope Foundation — Nonprofit & Community · Creative · Nature Green
|--------------------------------------------------------------------------
| Sumber data tunggal untuk template statis ini (teks, menu, tautan, FAQ).
| Semua view membaca array ini, jadi konten cukup diubah di satu tempat.
| Tidak ada query database / backend di template ini.
|
| Catatan: nomor rekening di bawah hanya contoh/placeholder. Ganti dengan
| data asli yayasan sebelum dipublikasikan.
*/

return [

    // Nama view (dot notation) — dipakai oleh layout untuk @include antar partial.
    'view' => 'website-bisnis.template.nonprofit&community.creative.foundation-nature-green',

    // URL dasar halaman template (tanpa domain).
    'base_url' => '/webia/template/nonprofit-community/creative/foundation-nature-green',

    'assets' => [
        'css' => 'css/website-bisnis/template/nonprofit&community/creative/foundation-nature-green/foundation.css',
        'js'  => 'js/website-bisnis/template/nonprofit&community/creative/foundation-nature-green/foundation.js',
        'img' => 'images/website-bisnis/template/nonprofit&community/creative/foundation-nature-green/',
    ],

    'brand' => [
        'name'    => 'GreenHope',
        'suffix'  => 'Foundation',
        'tagline' => 'Bersama untuk masa depan yang lebih hijau',
        'bot'     => 'GreenBot',
    ],

    'contact' => [
        'address'       => 'Jl. Merdeka No. 123, Bandung, Jawa Barat',
        'address_short' => 'Jl. Merdeka No. 123, Bandung',
        'phone_top'     => '+62 1234 5678',
        'phone'         => '+62 22 1234 5678',
        'phone_link'    => '+62221234567',
        'email'         => 'info@greenhope.or.id',
        // Nomor WhatsApp (format internasional tanpa +) untuk tombol WA, form, dan FAQ.
        'whatsapp'      => '62895630300345',
        'map_url'       => 'https://www.google.com/maps/search/?api=1&query=Jl.+Merdeka+No.+123+Bandung',
    ],

    'social' => [
        ['key' => 'facebook',  'label' => 'Facebook',  'url' => '#'],
        ['key' => 'instagram', 'label' => 'Instagram', 'url' => '#'],
        ['key' => 'youtube',   'label' => 'YouTube',   'url' => '#'],
        ['key' => 'tiktok',    'label' => 'TikTok',    'url' => '#'],
    ],

    // Menu navbar. slug diawali "#" = anchor di halaman yang sama (footer).
    'nav' => [
        ['key' => 'beranda',      'label' => 'Beranda',        'slug' => ''],
        ['key' => 'tentang-kami', 'label' => 'Tentang Kami',   'slug' => 'tentang-kami'],
        ['key' => 'program',      'label' => 'Program Kami',   'slug' => 'program'],
        ['key' => 'dampak',       'label' => 'Dampak',         'slug' => 'dampak'],
        ['key' => 'transparansi', 'label' => 'Transparansi',   'slug' => 'transparansi'],
        ['key' => 'mitra',        'label' => 'Mitra',          'slug' => 'mitra'],
        ['key' => 'relawan',      'label' => 'Relawan',        'slug' => 'relawan'],
        ['key' => 'berita',       'label' => 'Berita & Acara', 'slug' => 'berita'],
        ['key' => 'kontak',       'label' => 'Kontak',         'slug' => '#kontak'],
    ],

    // Judul tab browser + isi header halaman dalam.
    // actions: tombol di header ([label, slug, style]); focus: object-position gambar header.
    'pages' => [
        'beranda'      => ['title' => 'GreenHope Foundation — Masa Depan yang Lebih Hijau'],
        'tentang-kami' => ['title' => 'Misi & Visi', 'heading' => 'Misi & Visi Kami', 'lead' => 'Menebar kebaikan, menjaga kehidupan. Kenali arah, nilai, dan perjalanan GreenHope.', 'crumb' => 'Tentang Kami', 'image' => 'hero-kids.jpg', 'focus' => '50% 40%',
            'actions' => [['Lihat Program', 'program', 'primary'], ['Donasi Sekarang', 'donasi', 'ghost']]],
        'program'      => ['title' => 'Program Kami', 'heading' => 'Program Kami', 'lead' => 'Empat program utama untuk lingkungan, pendidikan, kesehatan, dan komunitas.', 'crumb' => 'Program Kami', 'image' => 'news-soil.jpg', 'focus' => '60% 50%',
            'actions' => [['Dukung Program', 'donasi', 'primary'], ['Jadi Relawan', 'relawan', 'ghost']]],
        'dampak'       => ['title' => 'Laporan Dampak', 'heading' => 'Dampak Kami', 'lead' => 'Bersama, kita telah memberikan manfaat nyata untuk banyak orang.', 'crumb' => 'Dampak', 'image' => 'news-kids.jpg', 'focus' => '50% 40%',
            'actions' => [['Unduh Laporan', 'dampak#laporan', 'primary'], ['Lihat Transparansi', 'transparansi', 'ghost']]],
        'donasi'       => ['title' => 'Opsi Donasi', 'heading' => 'Opsi Donasi', 'lead' => 'Pilih cara terbaik untuk berbagi kebaikan. Setiap donasi dilaporkan secara terbuka.', 'crumb' => 'Donasi', 'image' => 'quote-globe.png', 'focus' => '50% 50%',
            'actions' => [['Pilih Cara Donasi', 'donasi#online', 'primary'], ['Lihat Transparansi', 'transparansi', 'ghost']]],
        'transparansi' => ['title' => 'Transparansi Keuangan', 'heading' => 'Transparansi Keuangan', 'lead' => 'Kami percaya pada keterbukaan dan akuntabilitas dalam setiap rupiah donasi.', 'crumb' => 'Transparansi', 'image' => 'finance.png', 'focus' => '50% 50%',
            'actions' => [['Unduh Laporan', 'transparansi#laporan', 'primary'], ['Donasi Sekarang', 'donasi', 'ghost']]],
        'mitra'        => ['title' => 'Mitra & Sponsor', 'heading' => 'Mitra & Sponsor', 'lead' => 'Bersama mitra terpercaya, kami melangkah lebih jauh.', 'crumb' => 'Mitra', 'image' => 'mission-globe.png', 'focus' => '50% 50%',
            'actions' => [['Ajukan Kemitraan', 'mitra#ajukan', 'primary'], ['Lihat Dampak', 'dampak', 'ghost']]],
        'relawan'      => ['title' => 'Daftar Relawan', 'heading' => 'Daftar Relawan', 'lead' => 'Bergabunglah menjadi bagian dari perubahan positif bersama ribuan relawan lainnya.', 'crumb' => 'Relawan', 'image' => 'volunteer-hands.jpg', 'focus' => '50% 50%',
            'actions' => [['Isi Formulir', 'relawan#formulir', 'primary'], ['Lihat Program', 'program', 'ghost']]],
        'berita'       => ['title' => 'Berita & Acara', 'heading' => 'Berita & Acara', 'lead' => 'Ikuti kabar terbaru dan kegiatan kami.', 'crumb' => 'Berita & Acara', 'image' => 'news-volunteer.jpg', 'focus' => '50% 45%',
            'actions' => [['Jadi Relawan', 'relawan', 'primary'], ['Donasi Sekarang', 'donasi', 'ghost']]],
        'ai-chatbot'   => ['title' => 'GreenBot — FAQ Program & Donasi', 'heading' => 'Tanya GreenBot', 'lead' => 'Asisten FAQ untuk program dan donasi GreenHope. Jawaban cepat, kapan saja.', 'crumb' => 'GreenBot', 'image' => 'mascot.png', 'focus' => '50% 18%',
            'actions' => [['Lihat Program', 'program', 'primary'], ['Opsi Donasi', 'donasi', 'ghost']]],
    ],

    // Pencarian cepat: halaman yang bisa dicari. hint = kata kunci tambahan, desc = keterangan singkat.
    'search_index' => [
        ['label' => 'Beranda', 'slug' => '', 'icon' => 'leaf', 'desc' => 'Halaman utama GreenHope Foundation', 'hint' => 'halaman utama home'],
        ['label' => 'Misi & Visi', 'slug' => 'tentang-kami', 'icon' => 'sparkle', 'desc' => 'Tentang kami, nilai, dan perjalanan', 'hint' => 'tentang kami nilai sejarah visi misi'],
        ['label' => 'Program Kami', 'slug' => 'program', 'icon' => 'users', 'desc' => 'Lingkungan, pendidikan, kesehatan, komunitas', 'hint' => 'lingkungan pendidikan kesehatan komunitas pohon'],
        ['label' => 'Laporan Dampak', 'slug' => 'dampak', 'icon' => 'file', 'desc' => 'Statistik dan laporan tahunan', 'hint' => 'penerima manfaat statistik laporan'],
        ['label' => 'Opsi Donasi', 'slug' => 'donasi', 'icon' => 'heart', 'desc' => 'Donasi online, transfer, barang, rutin', 'hint' => 'donasi transfer bank barang rutin berdonasi'],
        ['label' => 'Transparansi Keuangan', 'slug' => 'transparansi', 'icon' => 'shield', 'desc' => 'Alokasi dana dan laporan keuangan', 'hint' => 'laporan keuangan audit dana'],
        ['label' => 'Mitra & Sponsor', 'slug' => 'mitra', 'icon' => 'gift', 'desc' => 'Mitra kami dan cara bermitra', 'hint' => 'kerja sama sponsor kemitraan'],
        ['label' => 'Daftar Relawan', 'slug' => 'relawan', 'icon' => 'check', 'desc' => 'Formulir pendaftaran relawan', 'hint' => 'volunteer pendaftaran gabung'],
        ['label' => 'Berita & Acara', 'slug' => 'berita', 'icon' => 'calendar', 'desc' => 'Kabar terbaru dan kegiatan', 'hint' => 'kegiatan artikel acara festival'],
        ['label' => 'GreenBot FAQ', 'slug' => 'ai-chatbot', 'icon' => 'chat', 'desc' => 'Tanya jawab program dan donasi', 'hint' => 'tanya jawab chatbot faq bantuan'],
    ],
    'search_popular' => [['Donasi', 'donasi'], ['Program', 'program'], ['Relawan', 'relawan'], ['Laporan', 'transparansi']],

    'hero' => [
        'script'   => 'Bersama, Kita Wujudkan',
        'title'    => 'Masa Depan',
        'title_2'  => 'yang Lebih Hijau',
        'text'     => 'Untuk bumi yang lebih sehat, masyarakat yang lebih sejahtera, dan generasi yang lebih baik.',
        'cta'      => 'Dukung Sekarang',
        'cta_2'    => 'Pelajari Lebih Lanjut',
        'overlay'  => 'Untuk Dunia yang Lebih Baik',
        'chips'    => [
            ['icon' => 'users', 'value' => '150K+', 'label' => 'Penerima manfaat'],
            ['icon' => 'heart', 'value' => '500+', 'label' => 'Program sosial'],
        ],
    ],

    'mission' => [
        'heading' => 'Menebar Kebaikan, Menjaga Kehidupan',
        'text'    => 'Kami berkomitmen untuk menciptakan perubahan positif bagi lingkungan dan masyarakat melalui aksi nyata yang berkelanjutan.',
        'vision'  => 'Mewujudkan dunia yang lebih hijau, sehat, dan sejahtera bagi generasi sekarang dan generasi mendatang.',
        'missions' => [
            ['title' => 'Menjaga lingkungan', 'text' => 'Menanam, merawat, dan memulihkan ekosistem bersama masyarakat setempat.'],
            ['title' => 'Membuka akses pendidikan', 'text' => 'Memastikan anak-anak mendapat kesempatan belajar yang layak dan menyenangkan.'],
            ['title' => 'Memperkuat kesehatan', 'text' => 'Menghadirkan layanan kesehatan dasar, gizi, dan air bersih bagi keluarga.'],
            ['title' => 'Menumbuhkan kemandirian', 'text' => 'Mendampingi komunitas agar mampu mengelola potensi dan usahanya sendiri.'],
        ],
        'values' => [
            ['title' => 'Kepedulian', 'text' => 'Setiap langkah berawal dari kepekaan terhadap kebutuhan sesama.'],
            ['title' => 'Transparansi', 'text' => 'Dana dan program dilaporkan secara terbuka kepada publik.'],
            ['title' => 'Kolaborasi', 'text' => 'Dampak besar lahir dari kerja sama relawan, donatur, dan mitra.'],
            ['title' => 'Keberlanjutan', 'text' => 'Kami merancang program yang manfaatnya terus tumbuh dari tahun ke tahun.'],
        ],
        'timeline' => [
            ['year' => '2016', 'title' => 'GreenHope berdiri', 'text' => 'Dimulai dari gerakan tanam pohon bersama warga di Bandung.'],
            ['year' => '2019', 'title' => 'Program pendidikan', 'text' => 'Rumah belajar pertama dibuka untuk anak-anak desa binaan.'],
            ['year' => '2022', 'title' => 'Kesehatan & komunitas', 'text' => 'Layanan kesehatan keliling dan pelatihan usaha mikro diluncurkan.'],
            ['year' => '2025', 'title' => '150.000 penerima manfaat', 'text' => 'Jangkauan program meluas ke ratusan desa dan sekolah.'],
        ],
    ],

    'programs' => [
        [
            'key' => 'lingkungan', 'title' => 'Pelestarian Lingkungan', 'short' => ['Pelestarian', 'Lingkungan'], 'icon' => 'icons/program-lingkungan.png',
            'text' => 'Menanam dan merawat pohon, memulihkan lahan kritis, serta mengajak warga menjaga lingkungan sekitarnya.',
            'points' => ['Penanaman pohon dan rehabilitasi lahan', 'Bank sampah dan daur ulang komunitas', 'Edukasi cinta lingkungan di sekolah'],
            'stat' => '85.000+', 'stat_label' => 'pohon ditanam', 'image' => 'news-park.jpg',
        ],
        [
            'key' => 'pendidikan', 'title' => 'Pendidikan Berkualitas', 'short' => ['Pendidikan', 'Berkualitas'], 'icon' => 'icons/program-pendidikan.png',
            'text' => 'Membuka akses belajar bagi anak-anak lewat beasiswa, rumah belajar, dan pendampingan relawan pengajar.',
            'points' => ['Beasiswa dan perlengkapan sekolah', 'Rumah belajar dan perpustakaan desa', 'Pelatihan guru dan relawan pengajar'],
            'stat' => '32.400+', 'stat_label' => 'anak terbantu', 'image' => 'news-school.jpg',
        ],
        [
            'key' => 'kesehatan', 'title' => 'Kesehatan Masyarakat', 'short' => ['Kesehatan', 'Masyarakat'], 'icon' => 'icons/program-kesehatan.png',
            'text' => 'Menghadirkan layanan kesehatan dasar, penyuluhan gizi, dan akses air bersih untuk keluarga yang membutuhkan.',
            'points' => ['Pemeriksaan kesehatan gratis keliling', 'Penyuluhan gizi ibu dan anak', 'Akses air bersih dan sanitasi'],
            'stat' => '41.800+', 'stat_label' => 'penerima layanan', 'image' => 'news-volunteer.jpg',
        ],
        [
            'key' => 'komunitas', 'title' => 'Pemberdayaan Komunitas', 'short' => ['Pemberdayaan', 'Komunitas'], 'icon' => 'icons/program-komunitas.png',
            'text' => 'Mendampingi kelompok warga agar mandiri melalui pelatihan usaha, kebun komunitas, dan penguatan desa binaan.',
            'points' => ['Pelatihan usaha mikro', 'Kelompok tani dan kebun komunitas', 'Pendampingan desa binaan'],
            'stat' => '120+', 'stat_label' => 'desa binaan', 'image' => 'news-event.jpg',
        ],
    ],

    'impact' => [
        'text'  => 'Bersama, kita telah memberikan manfaat nyata untuk banyak orang.',
        'stats' => [
            ['value' => 150000, 'suffix' => 'K+', 'display' => '150K+', 'label' => 'Penerima Manfaat', 'icon' => 'icons/impact-people.png'],
            ['value' => 500, 'suffix' => '+', 'display' => '500+', 'label' => 'Program Sosial', 'icon' => 'icons/impact-heart.png'],
        ],
        'more' => [
            ['display' => '120+', 'label' => 'Desa binaan'],
            ['display' => '85K+', 'label' => 'Pohon ditanam'],
            ['display' => '32K+', 'label' => 'Anak terbantu'],
            ['display' => '1.200+', 'label' => 'Relawan aktif'],
        ],
        // Penerima manfaat kumulatif per tahun (dalam ribuan) untuk grafik batang.
        'chart' => [
            ['year' => '2021', 'value' => 18],
            ['year' => '2022', 'value' => 42],
            ['year' => '2023', 'value' => 79],
            ['year' => '2024', 'value' => 118],
            ['year' => '2025', 'value' => 150],
        ],
        'reports' => [
            ['year' => '2025', 'title' => 'Laporan Dampak Tahunan 2025', 'text' => '150 ribu penerima manfaat di empat bidang program, termasuk 85 ribu pohon yang tertanam.', 'size' => 'PDF · 4,2 MB'],
            ['year' => '2024', 'title' => 'Laporan Dampak Tahunan 2024', 'text' => 'Perluasan rumah belajar dan layanan kesehatan keliling ke desa-desa baru.', 'size' => 'PDF · 3,8 MB'],
            ['year' => '2023', 'title' => 'Laporan Dampak Tahunan 2023', 'text' => 'Tahun peluncuran program pemberdayaan komunitas dan kebun bersama.', 'size' => 'PDF · 3,1 MB'],
        ],
    ],

    'donation' => [
        'text'    => 'Pilih cara terbaik untuk berbagi kebaikan.',
        'options' => [
            ['key' => 'online', 'label' => 'Donasi Sekarang', 'note' => '(Online)', 'icon' => 'icons/don-online.png', 'text' => 'Donasi cepat lewat WhatsApp dengan nominal pilihan Anda.'],
            ['key' => 'bank',   'label' => 'Transfer Bank',   'note' => '', 'icon' => 'icons/don-bank.png',   'text' => 'Transfer langsung ke rekening resmi yayasan.'],
            ['key' => 'barang', 'label' => 'Donasi Barang',   'note' => '', 'icon' => 'icons/don-barang.png', 'text' => 'Sumbangkan buku, pakaian layak pakai, atau perlengkapan lain.'],
            ['key' => 'rutin',  'label' => 'Donasi Rutin',    'note' => '', 'icon' => 'icons/don-rutin.png',  'text' => 'Berbagi setiap bulan agar manfaatnya terus berjalan.'],
        ],
        'amounts' => [25000, 50000, 100000, 250000, 500000],
        'banks' => [
            ['bank' => 'BCA',     'number' => '123 456 7890',     'logo' => 'partners/bca.png'],
            ['bank' => 'Mandiri', 'number' => '123 000 456 7890', 'logo' => 'partners/mandiri.png'],
            ['bank' => 'BNI',     'number' => '0123 456 789',     'logo' => 'partners/bni.png'],
        ],
        'account_name' => 'Yayasan GreenHope Foundation',
        'goods' => [
            'Buku bacaan dan alat tulis untuk rumah belajar',
            'Pakaian dan perlengkapan sekolah layak pakai',
            'Bibit tanaman, pupuk organik, dan alat berkebun',
            'Perlengkapan kesehatan dasar dan alat kebersihan',
        ],
        'steps' => [
            ['title' => 'Pilih cara berdonasi', 'text' => 'Tentukan donasi online, transfer bank, barang, atau donasi rutin.'],
            ['title' => 'Kirim konfirmasi', 'text' => 'Konfirmasi donasi Anda melalui WhatsApp agar kami dapat mencatatnya.'],
            ['title' => 'Terima bukti & laporan', 'text' => 'Kami mengirim bukti donasi dan memperbarui laporan penyaluran secara berkala.'],
        ],
        'recurring' => [
            ['amount' => 50000,  'label' => 'Penumbuh', 'text' => 'Menanam dan merawat bibit setiap bulan.'],
            ['amount' => 100000, 'label' => 'Penyokong', 'text' => 'Mendukung perlengkapan belajar anak desa binaan.'],
            ['amount' => 250000, 'label' => 'Penggerak', 'text' => 'Membantu layanan kesehatan keliling dan kebun komunitas.'],
        ],
    ],

    'finance' => [
        'text'  => 'Kami percaya pada keterbukaan dan akuntabilitas.',
        'cards' => [
            ['label' => 'Total donasi diterima 2025', 'value' => 'Rp 4,82 M'],
            ['label' => 'Disalurkan ke program', 'value' => 'Rp 3,95 M'],
            ['label' => 'Biaya operasional', 'value' => 'Rp 0,53 M'],
            ['label' => 'Pengembangan & penggalangan dana', 'value' => 'Rp 0,34 M'],
        ],
        // Alokasi dana (persen). Total harus 100.
        'allocation' => [
            ['label' => 'Program sosial', 'value' => 82, 'color' => '#2f7d32'],
            ['label' => 'Operasional', 'value' => 11, 'color' => '#8cc63f'],
            ['label' => 'Pengembangan & penggalangan dana', 'value' => 7, 'color' => '#f2b705'],
        ],
        'reports' => [
            ['year' => '2025', 'title' => 'Laporan Keuangan Teraudit 2025', 'income' => 'Rp 4,82 M', 'spent' => 'Rp 4,82 M', 'size' => 'PDF · 2,6 MB'],
            ['year' => '2024', 'title' => 'Laporan Keuangan Teraudit 2024', 'income' => 'Rp 3,95 M', 'spent' => 'Rp 3,90 M', 'size' => 'PDF · 2,3 MB'],
            ['year' => '2023', 'title' => 'Laporan Keuangan Teraudit 2023', 'income' => 'Rp 3,10 M', 'spent' => 'Rp 3,06 M', 'size' => 'PDF · 2,1 MB'],
        ],
        'principles' => [
            ['title' => 'Diaudit independen', 'text' => 'Laporan keuangan tahunan diperiksa oleh akuntan publik independen.'],
            ['title' => 'Dilaporkan terbuka', 'text' => 'Ringkasan pemasukan dan penyaluran dana dapat diunduh siapa saja.'],
            ['title' => 'Dana tepat sasaran', 'text' => 'Donasi bertujuan khusus disalurkan sesuai peruntukan yang dipilih donatur.'],
        ],
    ],

    'partners' => [
        'text' => 'Bersama mitra terpercaya, kami melangkah lebih jauh.',
        'list' => [
            ['name' => 'BCA',       'logo' => 'partners/bca.png',       'field' => 'Perbankan', 'text' => 'Dukungan program pendidikan dan kanal donasi digital.'],
            ['name' => 'Mandiri',   'logo' => 'partners/mandiri.png',   'field' => 'Perbankan', 'text' => 'Kemitraan pelatihan usaha mikro bagi desa binaan.'],
            ['name' => 'BNI',       'logo' => 'partners/bni.png',       'field' => 'Perbankan', 'text' => 'Pendukung beasiswa dan perlengkapan sekolah.'],
            ['name' => 'Unilever',  'logo' => 'partners/unilever.png',  'field' => 'Konsumen',  'text' => 'Kolaborasi edukasi kebersihan dan kesehatan keluarga.'],
            ['name' => 'Pertamina', 'logo' => 'partners/pertamina.png', 'field' => 'Energi',    'text' => 'Mitra program penghijauan dan energi bersih.'],
        ],
        'benefits' => [
            ['title' => 'Dampak yang terukur', 'text' => 'Setiap kerja sama dilengkapi laporan hasil yang jelas dan dapat dipertanggungjawabkan.'],
            ['title' => 'Program yang fleksibel', 'text' => 'Pilih bidang yang sejalan dengan nilai dan tujuan perusahaan Anda.'],
            ['title' => 'Keterlibatan karyawan', 'text' => 'Ajak tim Anda terjun langsung sebagai relawan di kegiatan lapangan.'],
        ],
        'steps' => [
            ['title' => 'Hubungi kami', 'text' => 'Sampaikan minat kerja sama melalui WhatsApp atau email.'],
            ['title' => 'Diskusi program', 'text' => 'Kami menyusun bentuk kemitraan yang paling sesuai.'],
            ['title' => 'Mulai berkolaborasi', 'text' => 'Program berjalan dan Anda menerima laporan dampaknya.'],
        ],
    ],

    'volunteer' => [
        'text'  => 'Bergabunglah menjadi bagian dari perubahan positif.',
        'interests' => ['Pelestarian Lingkungan', 'Pendidikan Berkualitas', 'Kesehatan Masyarakat', 'Pemberdayaan Komunitas', 'Dokumentasi & Media', 'Belum tahu, ingin berdiskusi'],
        'availability' => ['Akhir pekan', 'Hari kerja (sore)', 'Fleksibel', 'Hanya saat acara besar'],
        'benefits' => [
            ['title' => 'Pengalaman lapangan', 'text' => 'Terlibat langsung dalam kegiatan tanam pohon, mengajar, dan layanan kesehatan.'],
            ['title' => 'Komunitas yang hangat', 'text' => 'Bertemu orang-orang yang peduli dan ingin bergerak bersama.'],
            ['title' => 'Sertifikat relawan', 'text' => 'Dapatkan sertifikat atas kontribusi Anda di setiap kegiatan.'],
        ],
        'steps' => [
            ['title' => 'Isi formulir', 'text' => 'Lengkapi data diri dan bidang yang Anda minati.'],
            ['title' => 'Kirim via WhatsApp', 'text' => 'Formulir dikirim ke tim relawan kami melalui WhatsApp.'],
            ['title' => 'Ikuti orientasi', 'text' => 'Kami menghubungi Anda untuk jadwal orientasi dan penempatan.'],
        ],
    ],

    'news' => [
        'text' => 'Ikuti kabar terbaru dan kegiatan kami.',
        'items' => [
            ['id' => 'tanam-pohon', 'type' => 'Acara', 'date' => '12 Okt 2026', 'title' => 'Aksi Tanam Pohon Bersama GreenHope', 'image' => 'news-park.jpg', 'excerpt' => 'Ratusan relawan dan warga menanam bibit di lahan kritis dalam satu pagi.'],
            ['id' => 'edukasi', 'type' => 'Berita', 'date' => '5 Okt 2026', 'title' => 'Edukasi Lingkungan untuk Anak Negeri', 'image' => 'news-school.jpg', 'excerpt' => 'Kelas lingkungan keliling menyapa siswa sekolah dasar di desa binaan.'],
            ['id' => 'festival', 'type' => 'Acara', 'date' => '28 Sep 2026', 'title' => 'Festival Peduli Bumi 2026', 'image' => 'news-event.jpg', 'excerpt' => 'Bazar komunitas, lokakarya daur ulang, dan panggung musik untuk bumi.'],
            ['id' => 'bibit', 'type' => 'Berita', 'date' => '20 Sep 2026', 'title' => '1.000 Bibit Baru Tertanam di Lereng Utara', 'image' => 'news-kids.jpg', 'excerpt' => 'Anak-anak dan relawan merawat bibit pertama di area pemulihan hutan.'],
            ['id' => 'relawan', 'type' => 'Acara', 'date' => '14 Sep 2026', 'title' => 'Pelatihan Relawan Angkatan Ketiga', 'image' => 'news-volunteer.jpg', 'excerpt' => 'Relawan baru dibekali dasar pendampingan komunitas dan keselamatan lapangan.'],
            ['id' => 'laporan', 'type' => 'Berita', 'date' => '2 Sep 2026', 'title' => 'Laporan Dampak Semester I Dirilis', 'image' => 'news-soil.jpg', 'excerpt' => 'Ringkasan capaian program dan penyaluran dana setengah tahun pertama.'],
        ],
    ],

    'quote' => [
        'text' => 'Kebaikan kecil, bisa membawa perubahan besar.',
    ],

    'chatbot' => [
        'greeting' => 'Halo! Saya GreenBot!',
        'intro'    => 'Tanya apa saja tentang program dan donasi kami, ya!',
        'placeholder' => 'Tulis pertanyaan Anda..',
        'fallback' => 'Maaf, saya belum menemukan jawaban yang pas. Anda bisa mengirim pertanyaan ini langsung ke tim kami lewat WhatsApp.',
        // Pertanyaan cepat (sesuai desain).
        'suggestions' => [
            'Bagaimana cara berdonasi?',
            'Program apa saja yang tersedia?',
            'Bagaimana menjadi relawan?',
            'Apa dampak dari program ini?',
            'Informasi kegiatan terbaru?',
        ],
        // Basis FAQ: keywords dicocokkan dengan teks pertanyaan (huruf kecil).
        'faq' => [
            ['q' => 'Bagaimana cara berdonasi?', 'keywords' => ['donasi', 'berdonasi', 'sumbang'], 'a' => 'Ada empat cara: donasi online lewat WhatsApp, transfer bank, donasi barang, dan donasi rutin bulanan. Detailnya ada di halaman Opsi Donasi.', 'link' => 'donasi', 'link_label' => 'Buka Opsi Donasi'],
            ['q' => 'Program apa saja yang tersedia?', 'keywords' => ['program', 'bidang'], 'a' => 'Kami menjalankan empat program: Pelestarian Lingkungan, Pendidikan Berkualitas, Kesehatan Masyarakat, dan Pemberdayaan Komunitas.', 'link' => 'program', 'link_label' => 'Lihat Program Kami'],
            ['q' => 'Bagaimana menjadi relawan?', 'keywords' => ['relawan', 'volunteer', 'gabung', 'daftar'], 'a' => 'Isi formulir pendaftaran relawan, lalu kirim lewat WhatsApp. Tim kami akan menghubungi Anda untuk orientasi dan penempatan.', 'link' => 'relawan', 'link_label' => 'Daftar Relawan'],
            ['q' => 'Apa dampak dari program ini?', 'keywords' => ['dampak', 'manfaat', 'hasil', 'capaian'], 'a' => 'Sejauh ini lebih dari 150.000 orang menerima manfaat melalui lebih dari 500 program sosial. Laporan lengkapnya bisa diunduh di halaman Dampak.', 'link' => 'dampak', 'link_label' => 'Lihat Laporan Dampak'],
            ['q' => 'Informasi kegiatan terbaru?', 'keywords' => ['kegiatan', 'terbaru', 'berita', 'acara', 'event', 'festival'], 'a' => 'Kegiatan terbaru: Aksi Tanam Pohon (12 Okt 2026), Edukasi Lingkungan untuk Anak Negeri (5 Okt 2026), dan Festival Peduli Bumi (28 Sep 2026).', 'link' => 'berita', 'link_label' => 'Buka Berita & Acara'],
            ['q' => 'Berapa minimal donasi?', 'keywords' => ['minimal', 'minimum', 'nominal', 'berapa'], 'a' => 'Tidak ada batas minimal. Pilihan nominal cepat mulai dari Rp 25.000, dan Anda juga dapat mengisi nominal sendiri.', 'link' => 'donasi', 'link_label' => 'Pilih Nominal'],
            ['q' => 'Bagaimana donasi rutin bulanan?', 'keywords' => ['rutin', 'bulanan', 'berlangganan', 'langganan'], 'a' => 'Pilih paket donasi rutin (Penumbuh, Penyokong, atau Penggerak), lalu konfirmasi lewat WhatsApp. Kami akan mengirim pengingat setiap bulan.', 'link' => 'donasi', 'link_label' => 'Lihat Donasi Rutin'],
            ['q' => 'Bagaimana cara donasi barang?', 'keywords' => ['barang', 'buku', 'pakaian', 'kirim barang'], 'a' => 'Anda dapat menyumbangkan buku, pakaian layak pakai, bibit, dan perlengkapan lain. Hubungi kami lewat WhatsApp untuk mengatur pengiriman atau penjemputan.', 'link' => 'donasi', 'link_label' => 'Lihat Donasi Barang'],
            ['q' => 'Apakah laporan keuangan terbuka?', 'keywords' => ['laporan', 'keuangan', 'transparan', 'transparansi', 'audit', 'dana'], 'a' => 'Ya. Laporan keuangan tahunan diaudit independen dan dapat diunduh di halaman Transparansi Keuangan.', 'link' => 'transparansi', 'link_label' => 'Lihat Laporan Keuangan'],
            ['q' => 'Apakah saya mendapat bukti donasi?', 'keywords' => ['bukti', 'kwitansi', 'konfirmasi', 'tanda terima'], 'a' => 'Ya. Setelah Anda mengirim konfirmasi lewat WhatsApp, kami mengirim bukti donasi dan kabar penyaluran secara berkala.', 'link' => 'donasi', 'link_label' => 'Cara Konfirmasi'],
            ['q' => 'Bagaimana bermitra dengan GreenHope?', 'keywords' => ['mitra', 'sponsor', 'kerja sama', 'kemitraan', 'perusahaan'], 'a' => 'Hubungi kami lewat WhatsApp atau email untuk berdiskusi tentang bentuk kemitraan yang sesuai dengan tujuan perusahaan Anda.', 'link' => 'mitra', 'link_label' => 'Lihat Mitra & Sponsor'],
        ],
    ],

    'footer' => [
        'nav'     => [['Beranda', ''], ['Tentang Kami', 'tentang-kami'], ['Program Kami', 'program'], ['Dampak', 'dampak']],
        'service' => [['Donasi', 'donasi'], ['Relawan', 'relawan'], ['Berita & Acara', 'berita'], ['Kontak', '#kontak']],
        'copy'    => '© 2026 GreenHope Foundation. All rights reserved.',
        'credit'  => '© 2026 WEBIA by D-KREASI. Seluruh hak cipta dilindungi.',
    ],

    // Ikon SVG inline (viewBox 24x24). Key yang ada di 'filled' diberi fill, bukan stroke.
    'icons' => [
        'pin'        => '<path d="M20 10c0 6-8 12-8 12S4 16 4 10a8 8 0 0 1 16 0Z"/><circle cx="12" cy="10" r="3"/>',
        'phone'      => '<path d="M22 16.9v3a2 2 0 0 1-2.2 2 19.8 19.8 0 0 1-8.6-3.1 19.5 19.5 0 0 1-6-6A19.8 19.8 0 0 1 2.1 4.2 2 2 0 0 1 4.1 2h3a2 2 0 0 1 2 1.7c.1 1 .4 1.9.7 2.8a2 2 0 0 1-.5 2.1L8.1 9.9a16 16 0 0 0 6 6l1.3-1.3a2 2 0 0 1 2.1-.4c.9.3 1.8.6 2.8.7a2 2 0 0 1 1.7 2Z"/>',
        'mail'       => '<rect x="2" y="4" width="20" height="16" rx="2"/><path d="m22 7-10 6L2 7"/>',
        'search'     => '<circle cx="11" cy="11" r="7"/><path d="m21 21-4.3-4.3"/>',
        'arrow'      => '<path d="M5 12h14M13 6l6 6-6 6"/>',
        'heart'      => '<path d="M12 21s-7.5-4.6-9.5-9.2C1.2 8.6 3 5 6.5 5c2 0 3.5 1 5.5 3 2-2 3.5-3 5.5-3C21 5 22.8 8.6 21.5 11.8 19.5 16.4 12 21 12 21Z"/>',
        'menu'       => '<path d="M4 6h16M4 12h16M4 18h16"/>',
        'close'      => '<path d="M6 6l12 12M18 6 6 18"/>',
        'facebook'   => '<path d="M14 8h3V4h-3a4 4 0 0 0-4 4v2H7v4h3v8h4v-8h3l1-4h-4V8.5c0-.3.2-.5.5-.5Z"/>',
        'instagram'  => '<rect x="3" y="3" width="18" height="18" rx="5"/><circle cx="12" cy="12" r="4"/><circle cx="17.5" cy="6.5" r="1" fill="currentColor"/>',
        'youtube'    => '<rect x="2" y="5" width="20" height="14" rx="4"/><path d="m10 9 5 3-5 3Z" fill="currentColor"/>',
        'tiktok'     => '<path d="M14 3v11.5a3.5 3.5 0 1 1-3.5-3.5"/><path d="M14 3c.4 2.6 2 4 5 4.2"/>',
        'whatsapp'   => '<path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>',
        'send'       => '<path d="m22 2-7 20-4-9-9-4Z"/><path d="M22 2 11 13"/>',
        'download'   => '<path d="M12 3v12m0 0-4-4m4 4 4-4M4 21h16"/>',
        'play'       => '<circle cx="12" cy="12" r="9"/><path d="m10 8 6 4-6 4Z" fill="currentColor"/>',
        'check'      => '<path d="m5 12 5 5L20 7"/>',
        'chevron'    => '<path d="m6 9 6 6 6-6"/>',
        'calendar'   => '<rect x="3" y="4" width="18" height="18" rx="2"/><path d="M16 2v4M8 2v4M3 10h18"/>',
        'chat'       => '<path d="M21 12a8 8 0 0 1-11.6 7.1L3 21l1.9-5.4A8 8 0 1 1 21 12Z"/>',
        'leaf'       => '<path d="M5 21c0-9 5-15 15-16 0 10-5 15-14 15"/><path d="M5 21c2-5 5-8 9-10"/>',
        'file'       => '<path d="M14 3H7a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V8Z"/><path d="M14 3v5h5M9 13h6M9 17h6"/>',
        'shield'     => '<path d="M12 3 4 6v6c0 5 3.4 8.3 8 9 4.6-.7 8-4 8-9V6Z"/><path d="m9 12 2 2 4-4"/>',
        'users'      => '<circle cx="9" cy="8" r="3.5"/><path d="M2.5 20a6.5 6.5 0 0 1 13 0"/><path d="M16 4.6a3.5 3.5 0 0 1 0 6.8M18 14a6.5 6.5 0 0 1 3.5 6"/>',
        'sparkle'    => '<path d="M12 3v4M12 17v4M3 12h4M17 12h4M6 6l2.5 2.5M15.5 15.5 18 18M18 6l-2.5 2.5M8.5 15.5 6 18"/>',
        'gift'       => '<rect x="3" y="8" width="18" height="4" rx="1"/><path d="M12 8v13M5 12v9h14v-9M7.5 8a2.5 2.5 0 1 1 0-5C10 3 12 8 12 8s2-5 4.5-5a2.5 2.5 0 1 1 0 5"/>',
        'external'   => '<path d="M14 4h6v6M20 4 10 14M18 14v5a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h5"/>',
    ],

    'filled_icons' => ['whatsapp', 'facebook'],
];
