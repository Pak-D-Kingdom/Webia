<?php

/*
|--------------------------------------------------------------------------
| WoodenLane — Furniture · Premium Minimal · Mocha Cream
|--------------------------------------------------------------------------
| Seluruh konten statis template (teks, menu, data katalog, FAQ chatbot, dll)
| ada di file ini sehingga Blade / JS tidak perlu diubah ketika konten berganti.
|
| Dibaca di Blade lewat:
|   config('template.interior&architecture.premium-minimal.furniture-mocha-cream.furniture')
| (Laravel otomatis memberi key dari struktur folder config/).
*/

return [

    // ------------------------------------------------------------------
    // Identitas & aset
    // ------------------------------------------------------------------
    'brand' => [
        'name'    => 'WoodenLane',
        'tagline' => 'Custom Furniture for Better Living',
    ],

    'credit' => '© 2026 WEBIA by D-KREASI. Seluruh hak cipta dilindungi.',

    'route_prefix' => 'furniture-mocha-cream.',

    'assets' => [
        'css' => 'css/website-bisnis/template/interior&architecture/premium-minimal/furniture-mocha-cream/furniture.css',
        'js'  => 'js/website-bisnis/template/interior&architecture/premium-minimal/furniture-mocha-cream/furniture.js',
        'img' => 'images/website-bisnis/template/interior&architecture/premium-minimal/furniture-mocha-cream',
    ],

    // ------------------------------------------------------------------
    // Kontak (topbar, footer, tombol WhatsApp, tujuan semua form)
    // ------------------------------------------------------------------
    'contact' => [
        'address'          => 'Jl. Melati No. 12, Jakarta Selatan',
        'hours'            => 'Senin - Sabtu 08.00 - 17.00',
        'email'            => 'info@woodenlane.id',
        'whatsapp'         => '62895630300345',          // format internasional tanpa + / 0 di depan
        'whatsapp_display' => '0895 6303 00345',
        'whatsapp_greeting'=> 'Halo WoodenLane, saya ingin berkonsultasi tentang furniture.',
    ],

    'social' => [
        ['label' => 'Instagram', 'icon' => 'instagram', 'url' => '#'],
        ['label' => 'Facebook',  'icon' => 'facebook',  'url' => '#'],
        ['label' => 'YouTube',   'icon' => 'youtube',   'url' => '#'],
        ['label' => 'Pinterest', 'icon' => 'pinterest', 'url' => '#'],
        ['label' => 'TikTok',    'icon' => 'tiktok',    'url' => '#'],
    ],

    // ------------------------------------------------------------------
    // Navigasi (route = nama route tanpa prefix)
    // ------------------------------------------------------------------
    'nav' => [
        ['label' => 'Beranda',              'route' => 'home'],
        ['label' => 'Katalog',              'route' => 'catalog'],
        ['label' => 'Custom Design',        'route' => 'custom-design'],
        ['label' => 'Material & Finishing', 'route' => 'materials'],
        ['label' => 'Project Gallery',      'route' => 'gallery'],
        ['label' => 'Pemesanan', 'children' => [
            ['label' => 'Ukuran Produk',        'route' => 'dimensions',   'icon' => 'ruler',     'desc' => 'Ukuran standar tiap jenis furniture'],
            ['label' => 'Custom Order Form',    'route' => 'custom-order', 'icon' => 'clipboard', 'desc' => 'Mulai pesanan custom Anda'],
            ['label' => 'Production Lead Time', 'route' => 'lead-time',    'icon' => 'timer',     'desc' => 'Hitung estimasi waktu produksi'],
            ['label' => 'Quotation Request',    'route' => 'quotation',    'icon' => 'file',      'desc' => 'Minta penawaran harga'],
        ]],
    ],

    'footer_cols' => [
        'Navigasi' => [
            ['Beranda', 'home'], ['Hero Banner', 'hero'], ['Katalog', 'catalog'],
            ['Custom Design', 'custom-design'], ['Project Gallery', 'gallery'],
        ],
        'Informasi' => [
            ['Material & Finishing', 'materials'], ['Ukuran Produk', 'dimensions'],
            ['Production Lead Time', 'lead-time'], ['AI Chatbot (FAQ)', 'ai-chatbot'],
        ],
        'Layanan' => [
            ['Custom Order Form', 'custom-order'], ['Quotation Request', 'quotation'],
        ],
    ],

    // ------------------------------------------------------------------
    // HERO BANNER
    // ------------------------------------------------------------------
    'hero' => [
        'video_url' => null,   // isi embed YouTube / mp4 untuk tombol "Tonton Video"
        'slides' => [
            [
                'eyebrow' => 'PREMIUM CUSTOM FURNITURE',
                'title'   => 'Furniture yang<br>Mewujudkan Ruang Impian Anda',
                'text'    => 'Desain elegan, kualitas premium, dan bisa custom sesuai kebutuhan. Dari rumah hingga ruang kerja, kami hadir untuk menciptakan furniture yang sempurna untuk gaya hidup Anda.',
                'cta'     => ['Jelajahi Katalog', 'catalog'],
                'video'   => true,
                'image'   => 'hero-living.jpg', 'pos' => '42% 55%', 'zoom' => '1',
            ],
            [
                'eyebrow' => 'CUSTOM DESIGN OPTIONS',
                'title'   => 'Desain Sesuai<br>Keinginan Anda',
                'text'    => 'Pilih gaya, ukuran, warna, dan detail lainnya untuk menciptakan furniture impian Anda.',
                'cta'     => ['Mulai Custom Design', 'custom-design'],
                'video'   => false,
                'image'   => 'hero-living.jpg', 'pos' => '100% 45%', 'zoom' => '1.22',
            ],
            [
                'eyebrow' => 'PILIHAN MATERIAL TERBAIK',
                'title'   => 'Material & Finishing<br>Berkualitas Tinggi',
                'text'    => 'Kami menggunakan material berkualitas tinggi dengan finishing premium yang tahan lama.',
                'cta'     => ['Lihat Material', 'materials'],
                'video'   => false,
                'image'   => 'hero-living.jpg', 'pos' => '38% 62%', 'zoom' => '1.16',
            ],
        ],
        'tagline' => 'Custom<br>Your Space,<br>Your Style',
        'features' => [
            ['icon' => 'box',      'title' => 'Premium Quality',    'text' => 'Material pilihan terbaik',          'detail' => 'Kayu solid dan bahan pilihan dengan kontrol kualitas di setiap tahap produksi.'],
            ['icon' => 'ruler',    'title' => 'Custom Design',      'text' => 'Sesuai kebutuhan & gaya Anda',      'detail' => 'Ukuran, warna, material, dan detail dapat disesuaikan dengan ruang dan selera Anda.'],
            ['icon' => 'users',    'title' => 'Professional Team',  'text' => 'Tim berpengalaman',                 'detail' => 'Desainer dan pengrajin berpengalaman yang mendampingi dari konsep hingga pemasangan.'],
            ['icon' => 'chat',     'title' => 'Free Consultation',  'text' => 'Konsultasi desain gratis',          'detail' => 'Diskusikan kebutuhan Anda bersama tim kami tanpa biaya konsultasi.'],
            ['icon' => 'shield',   'title' => 'After Sales Service','text' => 'Garansi & layanan purna jual',      'detail' => 'Garansi produk serta layanan purna jual untuk ketenangan Anda.'],
        ],
    ],

    // ------------------------------------------------------------------
    // FURNITURE CATALOG
    // ------------------------------------------------------------------
    'catalog' => [
        'eyebrow' => 'KOLEKSI TERLENGKAP',
        'title'   => 'Katalog Furniture',
        'text'    => 'Temukan berbagai pilihan furniture untuk setiap ruangan di rumah Anda.',
        'cta'     => 'Lihat Semua Produk',
        'styles'  => ['Modern', 'Minimalis', 'Classic', 'Rustic'],
        'style_image' => 'style-dining.jpg',
        'items' => [
            [
                'slug' => 'sofa', 'name' => 'Sofa', 'image' => 'catalog-sofa.jpg',
                'text' => 'Sofa nyaman untuk ruang tamu dan ruang keluarga dengan berbagai konfigurasi dudukan.',
                'styles' => ['Modern', 'Minimalis', 'Classic'],
                'types' => ['Sofa 2 dudukan', 'Sofa 3 dudukan', 'Sofa sudut (L)', 'Sofa bed'],
                'materials' => ['Rangka kayu jati', 'Kain linen / bouclé', 'Busa high-density'],
            ],
            [
                'slug' => 'meja', 'name' => 'Meja', 'image' => 'catalog-meja.jpg',
                'text' => 'Meja makan, meja kopi, hingga meja kerja dengan permukaan kayu solid yang hangat.',
                'styles' => ['Modern', 'Minimalis', 'Rustic', 'Classic'],
                'types' => ['Meja makan', 'Meja kopi', 'Meja kerja', 'Meja konsol'],
                'materials' => ['Kayu jati', 'Oak', 'Walnut'],
            ],
            [
                'slug' => 'kursi', 'name' => 'Kursi', 'image' => 'catalog-kursi.jpg',
                'text' => 'Kursi dengan siluet ramping dan dudukan ergonomis untuk makan, santai, maupun bekerja.',
                'styles' => ['Modern', 'Minimalis', 'Classic'],
                'types' => ['Kursi makan', 'Kursi santai (lounge)', 'Kursi kerja', 'Bangku'],
                'materials' => ['Kayu solid', 'Rotan anyam', 'Kulit sintetis premium'],
            ],
            [
                'slug' => 'lemari', 'name' => 'Lemari', 'image' => 'catalog-lemari.jpg',
                'text' => 'Lemari pakaian dan display dengan pintu kaca atau kayu, rapi dan tahan lama.',
                'styles' => ['Classic', 'Minimalis', 'Rustic'],
                'types' => ['Lemari pakaian', 'Lemari display', 'Kabinet TV', 'Walk-in wardrobe'],
                'materials' => ['Kayu jati', 'Multiplek veneer', 'Kaca tempered'],
            ],
            [
                'slug' => 'ranjang', 'name' => 'Ranjang', 'image' => 'catalog-ranjang.jpg',
                'text' => 'Ranjang dengan headboard hangat dan struktur kokoh untuk tidur yang lebih nyenyak.',
                'styles' => ['Modern', 'Classic', 'Minimalis'],
                'types' => ['Ranjang single', 'Ranjang queen', 'Ranjang king', 'Ranjang dengan laci'],
                'materials' => ['Kayu jati', 'Oak', 'Kain headboard'],
            ],
            [
                'slug' => 'rak', 'name' => 'Rak & Penyimpanan', 'image' => 'catalog-rak.jpg',
                'text' => 'Rak buku, rak display, dan solusi penyimpanan yang mengikuti kebutuhan ruang Anda.',
                'styles' => ['Modern', 'Minimalis', 'Rustic'],
                'types' => ['Rak buku', 'Rak dinding', 'Rak display', 'Rak sepatu'],
                'materials' => ['Kayu solid', 'Multiplek veneer', 'Besi hollow'],
            ],
        ],
    ],

    // ------------------------------------------------------------------
    // CUSTOM DESIGN OPTIONS
    // ------------------------------------------------------------------
    'custom_design' => [
        'eyebrow' => 'CUSTOM DESIGN OPTIONS',
        'title'   => 'Desain Sesuai Keinginan Anda',
        'text'    => 'Pilih gaya, ukuran, warna, dan detail lainnya untuk menciptakan furniture impian Anda.',
        'cta'     => 'Mulai Custom Design',
        'image'   => 'art-custom.png',
        'sizes'   => [
            ['key' => 'kecil',    'label' => 'Kompak',   'hint' => 'Untuk ruang terbatas'],
            ['key' => 'standar',  'label' => 'Standar',  'hint' => 'Ukuran paling umum'],
            ['key' => 'besar',    'label' => 'Lega',     'hint' => 'Untuk ruang luas'],
            ['key' => 'kustom',   'label' => 'Kustom',   'hint' => 'Tentukan sendiri'],
        ],
        'colors' => [
            ['name' => 'Ivory',            'hex' => '#efe6d8'],
            ['name' => 'Oat Cream',        'hex' => '#d9c3a5'],
            ['name' => 'Mocha',            'hex' => '#8a6a52'],
            ['name' => 'Terracotta Brown', 'hex' => '#b0693f'],
            ['name' => 'Sage Linen',       'hex' => '#a9ad92'],
            ['name' => 'Charcoal',         'hex' => '#2b2b2b'],
        ],
        'steps' => [
            ['Pilih jenis & gaya', 'Tentukan jenis furniture dan gaya yang paling cocok dengan ruang Anda.'],
            ['Tentukan ukuran', 'Pilih ukuran standar atau tulis ukuran khusus sesuai ruangan.'],
            ['Pilih warna & material', 'Padukan warna upholstery dengan material rangka favorit Anda.'],
            ['Kirim ke tim kami', 'Lanjutkan ke Custom Order Form, konfigurasi Anda terisi otomatis.'],
        ],
    ],

    // ------------------------------------------------------------------
    // MATERIALS & FINISHES
    // ------------------------------------------------------------------
    'materials' => [
        'eyebrow' => 'PILIHAN MATERIAL TERBAIK',
        'title'   => 'Material & Finishing',
        'text'    => 'Kami menggunakan material berkualitas tinggi dengan finishing premium yang tahan lama.',
        'cta'     => 'Lihat Material',
        'image'   => 'art-material.png',
        'items' => [
            ['key' => 'jati',    'name' => 'Kayu Jati',        'tone' => ['#b07a45', '#8c5c2f'], 'durability' => 5, 'grain' => 'Serat lurus, pori halus', 'best' => 'Meja, lemari, ranjang', 'text' => 'Kayu klasik yang kuat, stabil, dan tahan cuaca. Warna hangat yang makin cantik seiring waktu.'],
            ['key' => 'oak',     'name' => 'Oak',              'tone' => ['#d3ae78', '#b98f58'], 'durability' => 4, 'grain' => 'Serat tegas, tone terang', 'best' => 'Kursi, meja makan, rak', 'text' => 'Tone cerah dengan serat tegas, cocok untuk gaya minimalis dan modern.'],
            ['key' => 'walnut',  'name' => 'Walnut',           'tone' => ['#7a5640', '#523625'], 'durability' => 4, 'grain' => 'Serat halus, tone gelap', 'best' => 'Kabinet, meja kerja, sideboard', 'text' => 'Warna cokelat gelap yang elegan dan mewah dengan permukaan halus.'],
            ['key' => 'mahoni',  'name' => 'Kayu Mahoni',      'tone' => ['#98543a', '#733c28'], 'durability' => 4, 'grain' => 'Serat rapat, kemerahan', 'best' => 'Kursi, lemari, ranjang', 'text' => 'Kayu kemerahan yang mudah dibentuk dan stabil, ideal untuk gaya classic.'],
            ['key' => 'veneer',  'name' => 'Multiplek Veneer', 'tone' => ['#dcbf94', '#c4a273'], 'durability' => 3, 'grain' => 'Lapisan veneer seragam', 'best' => 'Kabinet, rak, interior built-in', 'text' => 'Permukaan seragam dan stabil, pilihan efisien untuk kabinet berukuran besar.'],
            ['key' => 'rotan',   'name' => 'Rotan Anyam',      'tone' => ['#d8b77f', '#bd9a62'], 'durability' => 3, 'grain' => 'Anyaman natural', 'best' => 'Sandaran kursi, pintu kabinet', 'text' => 'Anyaman natural yang ringan dan memberi tekstur hangat pada furniture.'],
        ],
        'finishes' => [
            ['name' => 'Natural Matte',  'tone' => '#c8a47a', 'text' => 'Tampilan alami dengan sentuhan halus dan tidak mengkilap.'],
            ['name' => 'Semi Gloss',     'tone' => '#b98a58', 'text' => 'Kilau lembut yang menonjolkan serat kayu dan mudah dibersihkan.'],
            ['name' => 'Walnut Stain',   'tone' => '#6b4a35', 'text' => 'Pewarnaan cokelat gelap untuk kesan mewah dan hangat.'],
            ['name' => 'White Wash',     'tone' => '#e4d6c0', 'text' => 'Warna terang transparan yang memperlihatkan serat kayu.'],
            ['name' => 'Duco Satin',     'tone' => '#efe6d8', 'text' => 'Cat duco warna solid dengan permukaan satin yang rata.'],
        ],
    ],

    // ------------------------------------------------------------------
    // PRODUCT DIMENSIONS  (w = panjang/lebar, d = kedalaman, h = tinggi, dalam cm)
    // ------------------------------------------------------------------
    'dimensions' => [
        'eyebrow' => 'UKURAN & DETAIL',
        'title'   => 'Product Dimensions',
        'text'    => 'Informasi ukuran lengkap untuk membantu Anda memilih yang paling sesuai.',
        'cta'     => 'Lihat Detail Ukuran',
        'note'    => 'Ukuran standar dapat disesuaikan. Semua furniture WoodenLane bisa dibuat sesuai ukuran ruang Anda.',
        'sample'  => ['w' => 120, 'd' => 45, 'h' => 85, 'name' => 'Kabinet laci'],
        'groups' => [
            'sofa' => ['name' => 'Sofa', 'rows' => [
                ['Sofa 2 dudukan', 160, 85, 80], ['Sofa 3 dudukan', 210, 90, 80], ['Sofa sudut (L)', 270, 160, 80], ['Sofa bed', 200, 90, 85],
            ]],
            'meja' => ['name' => 'Meja', 'rows' => [
                ['Meja makan 4 kursi', 120, 80, 75], ['Meja makan 6 kursi', 180, 90, 75], ['Meja kopi', 100, 60, 42], ['Meja kerja', 140, 70, 75],
            ]],
            'kursi' => ['name' => 'Kursi', 'rows' => [
                ['Kursi makan', 45, 52, 88], ['Kursi santai', 70, 80, 80], ['Kursi kerja', 60, 60, 95], ['Bangku', 100, 35, 45],
            ]],
            'lemari' => ['name' => 'Lemari', 'rows' => [
                ['Lemari 2 pintu', 100, 55, 200], ['Lemari 3 pintu', 150, 55, 200], ['Kabinet TV', 180, 40, 50], ['Kabinet laci', 120, 45, 85],
            ]],
            'ranjang' => ['name' => 'Ranjang', 'rows' => [
                ['Single (90×200)', 100, 210, 100], ['Queen (160×200)', 170, 210, 110], ['King (180×200)', 190, 210, 110], ['Ranjang dengan laci', 170, 215, 110],
            ]],
            'rak' => ['name' => 'Rak & Penyimpanan', 'rows' => [
                ['Rak buku 5 tingkat', 90, 30, 180], ['Rak dinding', 100, 20, 25], ['Rak display', 120, 35, 160], ['Rak sepatu', 80, 30, 90],
            ]],
        ],
        'tips' => [
            ['Ukur ruangan terlebih dulu', 'Catat panjang, lebar, dan tinggi ruang termasuk letak pintu, jendela, dan stop kontak.'],
            ['Sisakan ruang gerak', 'Beri jarak sekitar 80–90 cm untuk jalur sirkulasi antar furniture.'],
            ['Pertimbangkan akses masuk', 'Pastikan pintu, tangga, atau lift cukup lebar untuk membawa furniture ke dalam.'],
        ],
    ],

    // ------------------------------------------------------------------
    // PROJECT GALLERY
    // ------------------------------------------------------------------
    'gallery' => [
        'eyebrow' => 'INSPIRASI PROYEK KAMI',
        'title'   => 'Project Gallery',
        'text'    => 'Lihat hasil karya kami di berbagai ruangan dan gaya desain.',
        'cta'     => 'Lihat Gallery',
        'items' => [
            ['image' => 'gallery-1.jpg',       'title' => 'Ruang Tamu Hangat',        'room' => 'Ruang Tamu',     'style' => 'Modern',    'shape' => 'wide'],
            ['image' => 'gallery-2.jpg',       'title' => 'Lemari Ruang Keluarga',    'room' => 'Ruang Keluarga', 'style' => 'Classic',   'shape' => 'tall'],
            ['image' => 'gallery-3.jpg',       'title' => 'Ruang Keluarga Terbuka',   'room' => 'Ruang Keluarga', 'style' => 'Minimalis', 'shape' => 'wide'],
            ['image' => 'gallery-4.jpg',       'title' => 'Kitchen Set Kayu',         'room' => 'Dapur',          'style' => 'Modern',    'shape' => 'wide'],
            ['image' => 'hero-living.jpg',     'title' => 'Living Room Kayu & Linen', 'room' => 'Ruang Tamu',     'style' => 'Modern',    'shape' => 'panorama'],
            ['image' => 'style-dining.jpg',    'title' => 'Ruang Makan Natural',      'room' => 'Ruang Makan',    'style' => 'Minimalis', 'shape' => 'wide'],
            ['image' => 'catalog-ranjang.jpg', 'title' => 'Kamar Tidur Hangat',       'room' => 'Kamar Tidur',    'style' => 'Classic',   'shape' => 'wide'],
            ['image' => 'catalog-rak.jpg',     'title' => 'Rak Buku & Display',       'room' => 'Ruang Keluarga', 'style' => 'Rustic',    'shape' => 'wide'],
        ],
    ],

    // ------------------------------------------------------------------
    // CUSTOM ORDER FORM · PRODUCTION LEAD TIME · QUOTATION REQUEST
    // ------------------------------------------------------------------
    'custom_order' => [
        'title' => 'Custom Order Form',
        'text'  => 'Isi form untuk memulai pesanan custom furniture Anda.',
        'cta'   => 'Isi Form',
        'image' => 'art-order.png',
        'budgets' => ['< Rp 5 juta', 'Rp 5 – 15 juta', 'Rp 15 – 50 juta', '> Rp 50 juta'],
    ],

    'lead_time' => [
        'title' => 'Production Lead Time',
        'text'  => 'Estimasi waktu produksi untuk setiap jenis furniture Anda.',
        'cta'   => 'Lihat Estimasi',
        'image' => 'art-clock.png',
        'note'  => 'Estimasi dalam hari kerja, dihitung sejak desain dan DP disetujui. Waktu pasti dikonfirmasi tim kami.',
        'days'  => [   // [min, max] hari kerja untuk ukuran standar
            'sofa' => [14, 21], 'meja' => [10, 14], 'kursi' => [10, 14],
            'lemari' => [21, 30], 'ranjang' => [14, 21], 'rak' => [10, 14],
        ],
        'complexity' => [
            ['key' => 'standar', 'label' => 'Ukuran standar',          'mult' => 1.0],
            ['key' => 'custom',  'label' => 'Custom ukuran / warna',   'mult' => 1.25],
            ['key' => 'khusus',  'label' => 'Desain khusus (detail)',  'mult' => 1.5],
        ],
        'stages' => [
            ['Konsultasi & Desain', '1–3 hari', 'Diskusi kebutuhan, ukuran, dan gambar desain.'],
            ['Persetujuan & DP',    '1–2 hari', 'Desain disetujui dan uang muka dibayarkan.'],
            ['Produksi',            '7–21 hari', 'Pemotongan, perakitan, dan pembentukan.'],
            ['Finishing & QC',      '3–7 hari', 'Pewarnaan, pelapisan, dan pemeriksaan kualitas.'],
            ['Pengiriman & Pasang', '1–3 hari', 'Pengiriman aman dan pemasangan di lokasi.'],
        ],
    ],

    'quotation' => [
        'title' => 'Quotation Request',
        'text'  => 'Dapatkan penawaran harga sesuai kebutuhan.',
        'cta'   => 'Minta Penawaran',
        'image' => 'art-quote.png',
        'timelines' => ['Secepatnya', '1 bulan', '2–3 bulan', 'Fleksibel'],
    ],

    // ------------------------------------------------------------------
    // AI CHATBOT (FAQ produk & custom) — jawaban berbasis kata kunci
    // ------------------------------------------------------------------
    'ai' => [
        'name'        => 'AI Furniture Assistant',
        'text'        => 'Tanya tentang produk, desain, material, atau custom furniture. Saya siap membantu!',
        'bubble'      => 'Tanya Apa Saja Ya!',
        'placeholder' => 'Tulis pertanyaan Anda...',
        'image'       => 'ai-scene.jpg',
        'greeting'    => 'Halo! Saya asisten WoodenLane. Saya bisa membantu seputar produk, material, ukuran, custom design, dan cara order. Mau tanya apa?',
        'fallback'    => 'Maaf, saya belum menemukan jawaban yang pas. Coba pilih salah satu pertanyaan di bawah, atau hubungi tim kami lewat WhatsApp untuk jawaban lebih lengkap.',
        'quick' => [
            'Rekomendasi produk untuk ruang tamu',
            'Bisa custom ukuran tidak?',
            'Material apa yang paling awet?',
            'Bagaimana cara order?',
        ],
        'faq' => [
            ['keys' => ['ruang tamu', 'rekomendasi', 'sofa', 'living'], 'a' => 'Untuk ruang tamu kami merekomendasikan sofa 2–3 dudukan, meja kopi, dan kabinet TV atau sideboard dengan tone kayu yang senada. Gaya Modern atau Minimalis cocok untuk ruang yang ingin tampak lega.', 'link' => ['Lihat Katalog', 'catalog']],
            ['keys' => ['custom ukuran', 'ukuran', 'dimensi', 'custom', 'sesuai ruang'], 'a' => 'Bisa! Semua furniture kami dapat dibuat sesuai ukuran ruangan Anda. Ukuran standar tersedia sebagai acuan dan dapat disesuaikan dalam hitungan sentimeter.', 'link' => ['Lihat Ukuran Produk', 'dimensions']],
            ['keys' => ['material', 'awet', 'tahan', 'kayu', 'jati', 'oak', 'walnut'], 'a' => 'Kayu jati dikenal paling awet: kuat, stabil, dan tahan cuaca. Oak dan walnut juga sangat baik untuk pemakaian dalam ruangan. Multiplek veneer cocok untuk kabinet besar yang efisien.', 'link' => ['Lihat Material', 'materials']],
            ['keys' => ['cara order', 'order', 'pesan', 'pemesanan', 'beli'], 'a' => 'Caranya mudah: 1) konsultasi gratis, 2) pilih desain, ukuran, dan material, 3) isi Custom Order Form atau Quotation Request, 4) setujui desain dan bayar DP, 5) produksi dan pengiriman.', 'link' => ['Isi Custom Order Form', 'custom-order']],
            ['keys' => ['finishing', 'warna', 'cat', 'duco', 'matte', 'glossy'], 'a' => 'Kami punya beberapa pilihan finishing: Natural Matte, Semi Gloss, Walnut Stain, White Wash, dan Duco Satin. Warna upholstery juga bisa dipilih sesuai palet Anda.', 'link' => ['Lihat Finishing', 'materials']],
            ['keys' => ['lama', 'produksi', 'estimasi', 'waktu', 'berapa hari', 'selesai'], 'a' => 'Estimasi produksi sekitar 10–30 hari kerja tergantung jenis furniture dan tingkat kustomisasi. Anda bisa menghitung perkiraannya di halaman Production Lead Time.', 'link' => ['Lihat Estimasi', 'lead-time']],
            ['keys' => ['harga', 'penawaran', 'quotation', 'biaya', 'budget', 'anggaran'], 'a' => 'Harga menyesuaikan jenis, ukuran, material, dan finishing. Kirim kebutuhan Anda lewat Quotation Request dan tim kami akan menyiapkan penawaran.', 'link' => ['Minta Penawaran', 'quotation']],
            ['keys' => ['gaya', 'style', 'modern', 'minimalis', 'classic', 'rustic'], 'a' => 'Kami melayani empat gaya utama: Modern, Minimalis, Classic, dan Rustic. Semuanya bisa dipadukan dengan warna dan material pilihan Anda.', 'link' => ['Mulai Custom Design', 'custom-design']],
            ['keys' => ['garansi', 'purna jual', 'servis', 'perbaikan'], 'a' => 'Setiap produk mendapat garansi dan layanan purna jual. Detail cakupan garansi akan dikonfirmasi tim kami saat pemesanan.'],
            ['keys' => ['kamar', 'ranjang', 'tempat tidur', 'lemari'], 'a' => 'Untuk kamar tidur, tersedia ranjang (single, queen, king, dengan laci) dan lemari pakaian atau walk-in wardrobe yang bisa dibuat sesuai ukuran kamar.', 'link' => ['Lihat Katalog', 'catalog']],
            ['keys' => ['galeri', 'gallery', 'proyek', 'portofolio', 'hasil karya'], 'a' => 'Anda bisa melihat hasil karya kami di berbagai ruangan dan gaya desain pada halaman Project Gallery.', 'link' => ['Lihat Gallery', 'gallery']],
            ['keys' => ['konsultasi', 'gratis', 'desainer', 'hubungi', 'whatsapp', 'kontak'], 'a' => 'Konsultasi desain gratis! Hubungi tim kami lewat WhatsApp untuk berdiskusi tentang kebutuhan Anda.'],
        ],
    ],
];
