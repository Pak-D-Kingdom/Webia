<?php

/*
| Eventora — Event Organizer & Planner (Bold · Sunset Gradient)
| Data statis untuk tampilan. Tidak ada koneksi backend.
*/
return [
    'brand' => ['name' => 'Eventora', 'tag' => 'Event Organizer & Planner'],

    'contact' => [
        'city'  => 'Jakarta, Indonesia',
        'phone' => '+62 812 3456 7890',
        'email' => 'hello@eventora.id',
        'wa'    => '62895630300345', // nomor tujuan WhatsApp (format internasional, tanpa + / 0 di depan)
        'wa_display' => '+62 895-6303-00345',
    ],

    // slug => [label menu, judul halaman, subjudul]
    'pages' => [
        'layanan'    => ['Layanan', 'Layanan Event', 'Solusi lengkap untuk setiap acara spesial Anda.', 'port-gala.svg', 'frame'],
        'portofolio' => ['Portofolio', 'Portofolio Kami', 'Berbagai acara sukses yang telah kami selenggarakan.', 'port-wedding.svg', 'frame'],
        'paket'      => ['Paket Event', 'Paket Corporate & Private Event', 'Pilihan paket eksklusif untuk acara perusahaan maupun acara pribadi Anda.', 'packages-corporate.svg', 'frame'],
        'proyek'     => ['Proyek Kami', 'Proyek Kami', 'Acara-acara yang sudah kami wujudkan bersama klien.', 'port-launch.svg', 'frame'],
        'klien'      => ['Klien Kami', 'Klien Kami', 'Dipercaya oleh berbagai perusahaan dan institusi ternama.', 'port-gathering.svg', 'frame'],
        'proses'     => ['Proses Event', 'Proses Perencanaan Event', 'Langkah mudah untuk mewujudkan acara impian Anda.', 'port-expo.svg', 'frame'],
        'penawaran'  => ['Penawaran', 'Minta Penawaran Sekarang', 'Dapatkan penawaran terbaik untuk acara Anda.', 'gift.svg', 'free'],
        'ai-chatbot' => ['AI Assistant', 'AI Assistant Eventora', 'Ada yang bisa kami bantu tentang event Anda?', 'robot.svg', 'free'],
    ],

    'nav' => ['layanan', 'portofolio', 'paket', 'proyek', 'klien', 'proses'],

    'chips' => [
        ['cal', 'Wedding', '& Celebration'],
        ['brief', 'Corporate', 'Event'],
        ['users', 'Social', 'Event'],
        ['star', 'Exclusive', 'Event'],
    ],

    'services' => [
        ['title' => 'Wedding & Celebration', 'img' => 'svc-wedding.svg',
         'desc' => 'Pernikahan, lamaran, dan perayaan keluarga dengan konsep personal dari dekorasi sampai rundown.',
         'features' => ['Konsep & dekorasi', 'Koordinasi hari-H', 'Kurasi vendor', 'Rundown & tamu']],
        ['title' => 'Corporate Event', 'img' => 'svc-corporate.svg',
         'desc' => 'Gala dinner, gathering, seminar, dan product launch yang rapi dan berkesan untuk perusahaan.',
         'features' => ['Gala dinner', 'Gathering & seminar', 'Product launch', 'Produksi panggung']],
        ['title' => 'Concert & Festival', 'img' => 'svc-concert.svg',
         'desc' => 'Konser dan festival dengan panggung, tata cahaya, suara, dan pengaturan penonton yang matang.',
         'features' => ['Panggung & lighting', 'Sound system', 'Manajemen crowd', 'Koordinasi talent']],
        ['title' => 'Exhibition & Launching', 'img' => 'svc-exhibition.svg',
         'desc' => 'Pameran dan peluncuran brand dengan desain booth, alur pengunjung, dan pengisi acara.',
         'features' => ['Desain booth', 'Alur pengunjung', 'Pengisi acara', 'Dokumentasi']],
    ],

    'portfolio' => [
        ['Annual Gala Dinner', 'PT. Maju Bersama', 'Corporate', 'port-gala.svg'],
        ['Garden Wedding Reception', 'Keluarga Pratama', 'Wedding', 'port-wedding.svg'],
        ['Product Launching', 'PT. Nusa Teknologi', 'Exhibition', 'port-launch.svg'],
        ['Music Festival Night', 'Sunset Fest', 'Concert', 'port-concert.svg'],
        ['Company Gathering', 'PT. Sinar Bumi', 'Corporate', 'port-gathering.svg'],
        ['Indonesia Expo', 'Asosiasi UMKM', 'Exhibition', 'port-expo.svg'],
    ],

    'packages' => [
        ['name' => 'Corporate Essential', 'icon' => 'users', 'for' => 'Gathering, seminar, dan rapat besar',
         'features' => ['Konsep & rundown acara', 'Koordinasi venue & vendor', 'Tim lapangan hari-H', 'Dokumentasi dasar']],
        ['name' => 'Corporate Signature', 'icon' => 'star', 'for' => 'Gala dinner, product launch, dan anniversary', 'featured' => true,
         'features' => ['Konsep kreatif eksklusif', 'Dekorasi & produksi panggung', 'MC, talent, dan hiburan', 'Dokumentasi foto & video']],
        ['name' => 'Private Celebration', 'icon' => 'cal', 'for' => 'Pernikahan, ulang tahun, dan acara keluarga',
         'features' => ['Konsultasi konsep personal', 'Dekorasi & tata ruang', 'Kurasi katering & vendor', 'Koordinator pribadi']],
    ],

    // pemilih paket: [label, indeks paket, ikon, keterangan]
    'finder' => [
        ['Gathering, seminar, rapat besar', 0, 'users', 'Rekomendasi: Corporate Essential'],
        ['Gala dinner, product launch, anniversary', 1, 'star', 'Rekomendasi: Corporate Signature'],
        ['Pernikahan, ulang tahun, acara keluarga', 2, 'cal', 'Rekomendasi: Private Celebration'],
    ],

    // perbandingan: [fitur, [Essential, Signature, Private]]
    'compare' => [
        ['Konsep & rundown acara', [true, true, true]],
        ['Koordinasi venue & vendor', [true, true, true]],
        ['Tim lapangan hari-H', [true, true, true]],
        ['Dekorasi & produksi panggung', [false, true, true]],
        ['MC, talent, dan hiburan', [false, true, false]],
        ['Dokumentasi foto & video', [false, true, false]],
        ['Konsultasi konsep personal', [false, false, true]],
        ['Kurasi katering & vendor', [false, false, true]],
        ['Koordinator pribadi', [false, false, true]],
    ],

    'projects' => [
        ['Annual Gala Dinner', 'PT. Maju Bersama', '2025', 'Jakarta', 'Malam apresiasi karyawan dengan panggung LED dan dekorasi floral.', 'port-gala.svg'],
        ['Garden Wedding Reception', 'Keluarga Pratama', '2025', 'Bogor', 'Resepsi taman dengan gerbang bunga dan pencahayaan hangat.', 'port-wedding.svg'],
        ['Product Launching', 'PT. Nusa Teknologi', '2026', 'Jakarta', 'Peluncuran produk dengan tata cahaya dan layar panggung.', 'port-launch.svg'],
        ['Music Festival Night', 'Sunset Fest', '2026', 'Tangerang', 'Festival musik dengan panggung utama dan area penonton.', 'port-concert.svg'],
        ['Company Gathering', 'PT. Sinar Bumi', '2025', 'Bandung', 'Gathering tahunan dengan permainan tim dan makan malam.', 'port-gathering.svg'],
        ['Indonesia Expo', 'Asosiasi UMKM', '2026', 'Jakarta', 'Pameran dengan booth tertata dan alur pengunjung yang jelas.', 'port-expo.svg'],
    ],

    'clients' => [
        ['BCA', 'logo-bca.svg'], ['Mandiri', 'logo-mandiri.svg'], ['Telkom Indonesia', 'logo-telkom.svg'],
        ['Pertamina', 'logo-pertamina.svg'], ['Unilever', 'logo-unilever.svg'], ['Grab', 'logo-grab.svg'],
        ['Indofood', 'logo-indofood.svg'], ['Danone', 'logo-danone.svg'], ['Samsung', 'logo-samsung.svg'],
        ['Toyota', 'logo-toyota.svg'],
    ],

    'process' => [
        ['chat', 'Konsultasi Awal', 'Diskusikan kebutuhan acara Anda', 'Kami mendengarkan tujuan, jumlah tamu, tanggal, dan anggaran Anda sebelum menyusun rencana.'],
        ['pen', 'Perencanaan Konsep', 'Kami siapkan konsep terbaik', 'Tim kreatif menyusun tema, dekorasi, rundown, dan rincian biaya untuk Anda setujui.'],
        ['box', 'Persiapan & Produksi', 'Kami urus semua detail', 'Vendor, dekorasi, perlengkapan, dan gladi bersih kami siapkan sampai selesai.'],
        ['spark', 'Pelaksanaan Acara', 'Nikmati acara dengan sempurna', 'Tim lapangan mengatur jalannya acara dari awal sampai akhir agar Anda tenang.'],
    ],

    'event_types' => ['Wedding & Celebration', 'Corporate Event', 'Concert & Festival', 'Exhibition & Launching', 'Private Event'],

    // k = kata kunci untuk pencocokan sederhana di chatbot
    'faq' => [
        ['Layanan Event', ['layanan', 'jasa', 'service', 'event apa'],
         'Kami menangani Wedding & Celebration, Corporate Event, Concert & Festival, serta Exhibition & Launching. Lihat rinciannya di halaman Layanan.', 'layanan', 'Wedding, corporate, konser, pameran', 'star'],
        ['Paket & Harga', ['paket', 'harga', 'biaya', 'tarif', 'budget'],
         'Paket kami terbagi menjadi Corporate Essential, Corporate Signature, dan Private Celebration. Harga menyesuaikan kebutuhan, jadi silakan minta penawaran.', 'paket', 'Pilihan paket dan cara minta penawaran', 'box'],
        ['Portofolio', ['portofolio', 'portfolio', 'contoh', 'hasil'],
         'Anda bisa melihat acara yang sudah kami selenggarakan di halaman Portofolio dan Proyek Kami.', 'portofolio', 'Lihat acara yang sudah kami garap', 'users'],
        ['Proses Pemesanan', ['proses', 'pesan', 'booking', 'cara', 'order'],
         'Prosesnya empat langkah: konsultasi awal, perencanaan konsep, persiapan & produksi, lalu pelaksanaan acara.', 'proses', 'Empat langkah dari konsultasi sampai hari-H', 'pen'],
        ['FAQ Event', ['faq', 'dp', 'pembayaran', 'lokasi', 'tanggal', 'jadwal'],
         'Untuk jadwal, pembayaran, dan lokasi, tim kami akan membahasnya saat konsultasi. Kirim detail acara Anda lewat form penawaran atau WhatsApp.', 'penawaran', 'Jadwal, pembayaran, dan lokasi', 'chat'],
    ],
];
