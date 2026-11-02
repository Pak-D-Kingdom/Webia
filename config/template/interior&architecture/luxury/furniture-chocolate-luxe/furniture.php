<?php

/*
|--------------------------------------------------------------------------
| LuxeFurni - Luxury / Chocolate Luxe (frontend statis)
|--------------------------------------------------------------------------
| Seluruh konten template ada di file ini. Blade hanya membaca array ini,
| sehingga teks / menu / gambar bisa diganti tanpa menyentuh view.
| Key config : template.interior&architecture.luxury.furniture-chocolate-luxe.furniture
*/

$images = 'images/website-bisnis/template/interior&architecture/luxury/furniture-chocolate-luxe';

return [

    'brand' => [
        'name'    => 'LuxeFurni',
        'tagline' => 'Premium Furniture & Custom Design',
        'credit'  => '© 2026 WEBIA by D-KREASI. Seluruh hak cipta dilindungi.',
    ],

    'contact' => [
        'address'  => 'Jakarta, Indonesia',
        'hours'    => 'Senin - Sabtu 09:00 - 18:00',
        'phone'    => '+62 812 3456 7890',
        'email'    => 'hello@luxefurni.id',
        // Nomor tujuan WhatsApp (format internasional tanpa + / 0 di depan).
        'whatsapp' => '62895630300345',
    ],

    'paths' => [
        'css'    => 'css/website-bisnis/template/interior&architecture/luxury/furniture-chocolate-luxe/furniture.css',
        'js'     => 'js/website-bisnis/template/interior&architecture/luxury/furniture-chocolate-luxe/furniture.js',
        'images' => $images,
    ],

    // Nama route (dibuat di routes/web.php).
    'routes' => [
        'home'          => 'webia.template.furniture-chocolate-luxe.home',
        'hero'          => 'webia.template.furniture-chocolate-luxe.hero',
        'catalog'       => 'webia.template.furniture-chocolate-luxe.catalog',
        'custom-design' => 'webia.template.furniture-chocolate-luxe.custom-design',
        'materials'     => 'webia.template.furniture-chocolate-luxe.materials',
        'dimensions'    => 'webia.template.furniture-chocolate-luxe.dimensions',
        'gallery'       => 'webia.template.furniture-chocolate-luxe.gallery',
        'order'         => 'webia.template.furniture-chocolate-luxe.order',
        'lead-time'     => 'webia.template.furniture-chocolate-luxe.lead-time',
        'quotation'     => 'webia.template.furniture-chocolate-luxe.quotation',
        'ai-chat'       => 'webia.template.furniture-chocolate-luxe.ai-chat',
    ],

    // Menu navbar (key = key halaman aktif).
    'nav' => [
        ['key' => 'home',          'label' => 'Beranda'],
        ['key' => 'catalog',       'label' => 'Katalog'],
        ['key' => 'custom-design', 'label' => 'Custom Design'],
        ['key' => 'materials',     'label' => 'Material & Finishing'],
        ['key' => 'dimensions',    'label' => 'Dimensi'],
        ['key' => 'gallery',       'label' => 'Galeri'],
        ['key' => 'lead-time',     'label' => 'Lead Time'],
        ['key' => 'order',         'label' => 'Order Form'],
        ['key' => 'quotation',     'label' => 'Penawaran'],
    ],

    /* ------------------------------------------------------------ HERO */
    'hero' => [
        'eyebrow'    => 'PREMIUM FURNITURE & CUSTOM FURNITURE',
        'title'      => 'Elegance in Every',
        'script'     => 'Detail',
        'text'       => 'Furniture berkualitas tinggi dengan desain eksklusif dan layanan custom sesuai kebutuhan Anda.',
        'image'      => $images . '/hero-living.jpg',
        'video'      => '', // isi dengan URL embed (mis. https://www.youtube.com/embed/xxxx) untuk mengaktifkan video
        'highlights' => [
            [
                'id'    => 'custom',
                'icon'  => 'tools',
                'title' => 'Custom Design',
                'sub'   => 'Sesuai Keinginan',
                'text'  => 'Dari sketsa hingga produk jadi, setiap potongan dirancang mengikuti gaya hidup, ukuran ruang, dan selera Anda.',
            ],
            [
                'id'    => 'material',
                'icon'  => 'cube',
                'title' => 'Premium Material',
                'sub'   => 'Pilihan Terbaik',
                'text'  => 'Kayu solid pilihan, kulit, kain, dan logam berkualitas dengan finishing yang tahan lama dan nyaman disentuh.',
            ],
            [
                'id'    => 'team',
                'icon'  => 'team',
                'title' => 'Profesional Team',
                'sub'   => 'Berpengalaman',
                'text'  => 'Desainer, tukang kayu, dan tim instalasi berpengalaman mendampingi proyek Anda dari konsultasi sampai serah terima.',
            ],
        ],
    ],

    /* --------------------------------------------------------- KATALOG */
    'catalog' => [
        'title'     => 'Furniture Catalog',
        'text'      => 'Temukan berbagai koleksi furniture premium untuk rumah dan ruang kerja Anda.',
        'side_image' => $images . '/catalog-side.jpg',
        'categories' => [
            [
                'key' => 'sofa', 'name' => 'Sofa', 'room' => 'Living Room', 'image' => $images . '/cat-sofa.jpg',
                'text' => 'Sofa empuk dengan rangka kayu solid dan pilihan upholstery kulit maupun kain premium.',
                'items' => ['Sofa 2 & 3 Seater', 'Sofa L-Shape', 'Loveseat', 'Ottoman'],
            ],
            [
                'key' => 'dining', 'name' => 'Meja Makan', 'room' => 'Dining Room', 'image' => $images . '/cat-dining.jpg',
                'text' => 'Meja makan kayu solid berbagai ukuran lengkap dengan kursi yang nyaman untuk keluarga.',
                'items' => ['Meja 4-8 Orang', 'Kursi Makan', 'Buffet & Sideboard', 'Bench'],
            ],
            [
                'key' => 'bedroom', 'name' => 'Tempat Tidur', 'room' => 'Bedroom', 'image' => $images . '/cat-bedroom.jpg',
                'text' => 'Tempat tidur dengan headboard empuk dan detail rapi untuk kamar yang tenang dan hangat.',
                'items' => ['Bed Queen & King', 'Headboard Custom', 'Nakas', 'Meja Rias'],
            ],
            [
                'key' => 'wardrobe', 'name' => 'Lemari', 'room' => 'Storage', 'image' => $images . '/cat-wardrobe.jpg',
                'text' => 'Lemari pakaian dan storage dengan lapisan veneer kayu, laci halus, dan handle brass.',
                'items' => ['Lemari 2-3 Pintu', 'Lemari Sliding', 'Walk-in Closet', 'Rak Display'],
            ],
            [
                'key' => 'chair', 'name' => 'Kursi', 'room' => 'Seating', 'image' => $images . '/cat-chair.jpg',
                'text' => 'Kursi lounge dan accent chair dengan siluet elegan, nyaman untuk duduk berjam-jam.',
                'items' => ['Lounge Chair', 'Accent Chair', 'Bar Stool', 'Kursi Kerja'],
            ],
            [
                'key' => 'outdoor', 'name' => 'Outdoor', 'room' => 'Outdoor Furniture', 'image' => $images . '/cat-outdoor.jpg',
                'text' => 'Furniture outdoor tahan cuaca untuk teras, taman, dan area santai dengan tampilan mewah.',
                'items' => ['Sofa Outdoor', 'Meja Kopi', 'Sun Lounger', 'Dining Set'],
            ],
        ],
    ],

    /* --------------------------------------------------- CUSTOM DESIGN */
    'custom_design' => [
        'title'  => 'Custom Design Options',
        'text'   => 'Wujudkan furniture impian Anda dengan desain custom yang sesuai dengan gaya dan kebutuhan ruang.',
        'image'  => $images . '/custom-sketch.jpg',
        'note'   => 'Your Style, Our Craft',
        'options' => [
            ['icon' => 'ruler',   'title' => 'Ukuran Sesuai Ruang',   'text' => 'Tentukan panjang, lebar, dan tinggi agar furniture pas dengan ruangan dan alur gerak Anda.'],
            ['icon' => 'cube',    'title' => 'Pilihan Material',      'text' => 'Pilih kayu solid, veneer, kulit, kain, atau logam sesuai karakter dan anggaran proyek.'],
            ['icon' => 'palette', 'title' => 'Warna & Finishing',     'text' => 'Atur warna, tekstur, dan tingkat kilap finishing agar selaras dengan interior Anda.'],
            ['icon' => 'sofa',    'title' => 'Model & Detail',        'text' => 'Sesuaikan bentuk, jahitan, kaki, handle, dan detail kecil yang membuat furniture terasa personal.'],
            ['icon' => 'sketch',  'title' => 'Sketsa & Revisi',       'text' => 'Anda menerima sketsa dan gambar kerja, lalu dapat meminta revisi sebelum produksi dimulai.'],
            ['icon' => 'team',    'title' => 'Konsultasi Desainer',   'text' => 'Diskusikan ide dengan desainer kami melalui tatap muka, video call, atau WhatsApp.'],
        ],
        'steps' => ['Konsultasi Ide', 'Sketsa & Gambar Kerja', 'Persetujuan Desain', 'Produksi Custom'],
    ],

    /* ---------------------------------------------- MATERIAL & FINISHING */
    'materials' => [
        'title' => 'Materials & Finishes',
        'text'  => 'Pilih material dan finishing terbaik dengan kualitas premium.',
        'image' => $images . '/materials.jpg',
        'groups' => [
            [
                'name' => 'Material',
                'items' => [
                    ['name' => 'Kayu Jati Solid',  'text' => 'Kuat, serat tegas, tahan rayap.',            'c1' => '#b97a3e', 'c2' => '#8a5326', 'type' => 'wood'],
                    ['name' => 'Walnut',           'text' => 'Warna cokelat tua, tampilan mewah.',          'c1' => '#5a3a28', 'c2' => '#3b2418', 'type' => 'wood'],
                    ['name' => 'Oak',              'text' => 'Warna terang hangat dengan serat halus.',     'c1' => '#d2a870', 'c2' => '#b88a50', 'type' => 'wood'],
                    ['name' => 'Kulit Asli',       'text' => 'Lembut, awet, makin cantik seiring waktu.',   'c1' => '#a8693a', 'c2' => '#7a4524', 'type' => 'leather'],
                    ['name' => 'Fabric Premium',   'text' => 'Linen, bouclé, dan velvet tahan gosok.',      'c1' => '#d9c8ad', 'c2' => '#bfa987', 'type' => 'fabric'],
                    ['name' => 'Brass & Metal',    'text' => 'Aksen kaki, handle, dan frame berlapis emas.', 'c1' => '#e0b97a', 'c2' => '#a8782f', 'type' => 'metal'],
                ],
            ],
            [
                'name' => 'Finishing',
                'items' => [
                    ['name' => 'Natural Oil',      'text' => 'Tampilan alami, pori kayu tetap terasa.',     'c1' => '#c28a4e', 'c2' => '#9c6a35', 'type' => 'wood'],
                    ['name' => 'Matte Lacquer',    'text' => 'Halus tanpa kilap, mudah dirawat.',           'c1' => '#7a5339', 'c2' => '#5b3a26', 'type' => 'flat'],
                    ['name' => 'Satin PU',         'text' => 'Kilap lembut dengan lapisan pelindung.',      'c1' => '#9a6a43', 'c2' => '#6f4829', 'type' => 'wood'],
                    ['name' => 'Espresso Stain',   'text' => 'Warna cokelat pekat yang elegan.',            'c1' => '#3d2619', 'c2' => '#24150d', 'type' => 'wood'],
                ],
            ],
        ],
    ],

    /* --------------------------------------------------------- DIMENSI */
    'dimensions' => [
        'title' => 'Product Dimensions',
        'text'  => 'Sesuaikan ukuran dengan ruang Anda.',
        'image' => $images . '/dimensions.jpg',
        'note'  => 'Ukuran di bawah adalah ukuran standar (cm). Semua produk dapat dibuat sesuai ukuran ruang Anda.',
        'tabs'  => [
            'sofa' => ['label' => 'Sofa', 'rows' => [
                ['Sofa 2 Seater', 180, 90, 85], ['Sofa 3 Seater', 220, 95, 85], ['Sofa L-Shape', 280, 170, 85], ['Loveseat', 150, 85, 82],
            ]],
            'dining' => ['label' => 'Meja Makan', 'rows' => [
                ['Meja Makan 4 Orang', 120, 80, 75], ['Meja Makan 6 Orang', 160, 90, 75], ['Meja Makan 8 Orang', 200, 100, 75], ['Kursi Makan', 45, 52, 90],
            ]],
            'bedroom' => ['label' => 'Tempat Tidur', 'rows' => [
                ['Bed Single', 110, 210, 105], ['Bed Queen', 170, 210, 110], ['Bed King', 190, 210, 115], ['Nakas', 45, 40, 50],
            ]],
            'wardrobe' => ['label' => 'Lemari', 'rows' => [
                ['Lemari 2 Pintu', 100, 55, 200], ['Lemari 3 Pintu', 150, 55, 210], ['Lemari Sliding', 200, 60, 220], ['Rak Display', 90, 35, 180],
            ]],
            'chair' => ['label' => 'Kursi', 'rows' => [
                ['Lounge Chair', 75, 80, 85], ['Accent Chair', 65, 70, 80], ['Bar Stool', 45, 45, 105], ['Kursi Kerja', 60, 60, 95],
            ]],
            'outdoor' => ['label' => 'Outdoor', 'rows' => [
                ['Sofa Outdoor 3 Seater', 210, 85, 75], ['Meja Kopi Outdoor', 100, 60, 40], ['Sun Lounger', 190, 65, 35], ['Dining Set Outdoor', 160, 90, 75],
            ]],
        ],
    ],

    /* ---------------------------------------------------------- GALERI */
    'gallery' => [
        'title' => 'Project Gallery',
        'text'  => 'Inspirasi desain untuk hunian dan ruang kerja Anda.',
        'preview' => [
            $images . '/gal-1.jpg',
            $images . '/gal-2.jpg',
            $images . '/gal-3.jpg',
        ],
        'filters' => ['all' => 'Semua', 'living' => 'Living', 'dining' => 'Dining', 'bedroom' => 'Bedroom', 'office' => 'Office', 'outdoor' => 'Outdoor'],
        'items' => [
            ['type' => 'living',  'title' => 'Living Room Penthouse', 'place' => 'Jakarta Selatan', 'image' => $images . '/hero-living.jpg'],
            ['type' => 'dining',  'title' => 'Dining Hall Residence', 'place' => 'Surabaya',        'image' => $images . '/gal-2.jpg'],
            ['type' => 'bedroom', 'title' => 'Master Bedroom Suite',  'place' => 'Bandung',         'image' => $images . '/gal-3.jpg'],
            ['type' => 'living',  'title' => 'Family Lounge',         'place' => 'Tangerang',       'image' => $images . '/gal-1.jpg'],
            ['type' => 'office',  'title' => 'Executive Study Room',  'place' => 'Jakarta Pusat',   'image' => $images . '/order-bg.jpg'],
            ['type' => 'living',  'title' => 'Classic Seating Corner', 'place' => 'Semarang',       'image' => $images . '/catalog-side.jpg'],
            ['type' => 'outdoor', 'title' => 'Tropical Terrace',      'place' => 'Bali',            'image' => $images . '/cat-outdoor.jpg'],
            ['type' => 'dining',  'title' => 'Warm Dining Corner',    'place' => 'Yogyakarta',      'image' => $images . '/cat-dining.jpg'],
            ['type' => 'bedroom', 'title' => 'Guest Bedroom',         'place' => 'Malang',          'image' => $images . '/cat-bedroom.jpg'],
        ],
        'collage' => $images . '/gallery-collage.jpg',
    ],

    /* ------------------------------------------------- CUSTOM ORDER FORM */
    'order' => [
        'title' => 'Custom Order Form',
        'text'  => 'Isi form pemesanan custom furniture sesuai kebutuhan Anda.',
        'image' => $images . '/order-bg.jpg',
        'furniture_types' => ['Sofa', 'Meja Makan', 'Tempat Tidur', 'Lemari', 'Kursi', 'Outdoor', 'Lainnya'],
        'materials'       => ['Kayu Jati Solid', 'Walnut', 'Oak', 'Kulit Asli', 'Fabric Premium', 'Belum menentukan'],
        'finishings'      => ['Natural Oil', 'Matte Lacquer', 'Satin PU', 'Espresso Stain', 'Belum menentukan'],
        'perks' => ['Sketsa desain gratis untuk pesanan custom', 'Konsultasi dengan desainer berpengalaman', 'Estimasi harga dan waktu produksi yang jelas'],
    ],

    /* -------------------------------------------------------- LEAD TIME */
    'lead_time' => [
        'title' => 'Production Lead Time',
        'text'  => 'Proses produksi sesuai estimasi waktu yang jelas.',
        'types' => [
            'standard' => ['label' => 'Produk Katalog',         'min' => 2, 'max' => 3,  'text' => 'Model katalog dengan ukuran standar.'],
            'semi'     => ['label' => 'Semi Custom',            'min' => 3, 'max' => 5,  'text' => 'Model katalog dengan ukuran atau material disesuaikan.'],
            'custom'   => ['label' => 'Full Custom',            'min' => 5, 'max' => 8,  'text' => 'Desain baru dari sketsa sampai produksi.'],
            'project'  => ['label' => 'Proyek Besar / Interior', 'min' => 8, 'max' => 12, 'text' => 'Paket banyak item untuk rumah, kantor, atau hotel.'],
        ],
        'steps' => [
            ['icon' => 'chat',   'title' => 'Konsultasi & Brief',    'time' => '1 - 3 hari',    'text' => 'Diskusi kebutuhan, ukuran ruang, dan anggaran.'],
            ['icon' => 'sketch', 'title' => 'Desain & Persetujuan',  'time' => '3 - 7 hari',    'text' => 'Sketsa, gambar kerja, dan pilihan material disetujui.'],
            ['icon' => 'tools',  'title' => 'Produksi',              'time' => '2 - 6 minggu',  'text' => 'Pengerjaan rangka, upholstery, dan perakitan.'],
            ['icon' => 'brush',  'title' => 'Finishing & QC',        'time' => '3 - 7 hari',    'text' => 'Finishing akhir dan pemeriksaan kualitas.'],
            ['icon' => 'truck',  'title' => 'Pengiriman & Instalasi', 'time' => '2 - 5 hari',   'text' => 'Dikirim aman dan dipasang oleh tim kami.'],
        ],
        'note' => 'Estimasi dapat berubah sesuai tingkat kerumitan desain, jumlah item, dan ketersediaan material.',
    ],

    /* -------------------------------------------------------- QUOTATION */
    'quotation' => [
        'title' => 'Quotation Request',
        'text'  => 'Dapatkan penawaran harga terbaik untuk proyek Anda.',
        'project_types' => ['Rumah Tinggal', 'Apartemen', 'Kantor', 'Hotel / Villa', 'Restoran / Cafe', 'Lainnya'],
        'budgets'       => ['< Rp 25 juta', 'Rp 25 - 50 juta', 'Rp 50 - 100 juta', 'Rp 100 - 250 juta', '> Rp 250 juta'],
        'timelines'     => ['Secepatnya', '1 - 2 bulan', '3 - 6 bulan', 'Masih merencanakan'],
        'steps' => [
            ['title' => 'Kirim Kebutuhan',   'text' => 'Isi form singkat tentang proyek dan item yang Anda perlukan.'],
            ['title' => 'Kami Hitung',       'text' => 'Tim kami menyusun rincian harga, material, dan waktu pengerjaan.'],
            ['title' => 'Terima Penawaran',  'text' => 'Penawaran resmi dikirim melalui WhatsApp atau email.'],
        ],
    ],

    /* ---------------------------------------------------------- AI FAQ */
    'ai' => [
        'name'     => 'Luxe',
        'title'    => 'Tanya AI Assistant',
        'text'     => 'Ada pertanyaan tentang produk, custom design, atau material? Chat dengan AI kami sekarang!',
        'bubble'   => 'Halo! Saya Luxe, AI Assistant.',
        'image'    => $images . '/mascot.jpg',
        'greeting' => 'Halo! Saya Luxe, asisten AI LuxeFurni. Saya bisa membantu menjawab pertanyaan seputar produk dan kustomisasi furniture. Silakan pilih pertanyaan di bawah atau ketik sendiri.',
        'fallback' => 'Maaf, saya belum menemukan jawaban yang pas untuk pertanyaan itu. Anda bisa memilih salah satu pertanyaan di bawah, atau lanjutkan ke WhatsApp agar tim kami membantu langsung.',
        'suggestions' => [
            'Rekomendasi produk untuk ruang tamu?',
            'Bisa custom sesuai ruangan?',
            'Material apa yang paling awet?',
            'Berapa lama proses produksi?',
        ],
        'faqs' => [
            [
                'group' => 'Produk',
                'q' => 'Rekomendasi produk untuk ruang tamu?',
                'link' => 'catalog',
                'a' => 'Untuk ruang tamu kami merekomendasikan sofa L-shape atau sofa 3 seater dengan rangka kayu solid, dilengkapi meja kopi dan satu atau dua lounge chair. Jika ruangan kecil, pilih sofa 2 seater dengan kaki ramping agar terasa lebih lega.',
                'keywords' => ['ruang tamu', 'living', 'sofa', 'rekomendasi', 'produk'],
            ],
            [
                'group' => 'Produk',
                'q' => 'Apa saja kategori furniture yang tersedia?',
                'link' => 'catalog',
                'a' => 'Katalog kami mencakup sofa, meja makan, tempat tidur, lemari, kursi, dan furniture outdoor. Setiap kategori bisa dipesan sesuai model katalog maupun custom.',
                'keywords' => ['kategori', 'katalog', 'koleksi', 'tersedia', 'jenis'],
            ],
            [
                'group' => 'Produk',
                'q' => 'Material apa yang paling awet?',
                'link' => 'materials',
                'a' => 'Kayu jati solid dan walnut sangat awet untuk rangka dan meja. Untuk upholstery, kulit asli dan kain tahan gosok adalah pilihan terbaik. Untuk outdoor kami menyarankan material tahan cuaca dengan finishing pelindung.',
                'keywords' => ['material', 'awet', 'tahan', 'kayu', 'jati', 'bahan', 'kulit'],
            ],
            [
                'group' => 'Produk',
                'q' => 'Bagaimana cara merawat furniture kayu?',
                'a' => 'Bersihkan dengan kain lembut yang sedikit lembap, hindari paparan matahari langsung dan cairan di permukaan terlalu lama. Untuk finishing natural oil, lakukan perawatan dengan minyak kayu setiap 6 sampai 12 bulan.',
                'keywords' => ['rawat', 'perawatan', 'bersihkan', 'cuci', 'kayu'],
            ],
            [
                'group' => 'Produk',
                'q' => 'Apakah ada garansi produk?',
                'a' => 'Ya, setiap produk memiliki garansi terhadap cacat produksi. Detail masa garansi akan tercantum pada penawaran resmi sesuai jenis produk yang Anda pesan.',
                'keywords' => ['garansi', 'jaminan', 'rusak', 'cacat'],
            ],
            [
                'group' => 'Kustomisasi',
                'q' => 'Bisa custom sesuai ruangan?',
                'link' => 'custom-design',
                'a' => 'Bisa. Semua furniture dapat dibuat sesuai ukuran ruangan Anda, mulai dari dimensi, material, warna, hingga detail seperti handle dan jahitan. Isi Custom Order Form atau kirim ukuran ruang lewat WhatsApp.',
                'keywords' => ['custom', 'ruangan', 'ukuran', 'sesuai', 'desain'],
            ],
            [
                'group' => 'Kustomisasi',
                'q' => 'Berapa lama proses produksi?',
                'link' => 'lead-time',
                'a' => 'Produk katalog sekitar 2 sampai 3 minggu, semi custom 3 sampai 5 minggu, dan full custom 5 sampai 8 minggu. Proyek besar bisa 8 sampai 12 minggu. Estimasi pasti diberikan setelah desain disetujui.',
                'keywords' => ['lama', 'produksi', 'waktu', 'lead time', 'selesai', 'berapa minggu', 'estimasi'],
            ],
            [
                'group' => 'Kustomisasi',
                'q' => 'Apakah saya bisa memilih warna dan finishing?',
                'link' => 'materials',
                'a' => 'Tentu. Tersedia pilihan finishing seperti natural oil, matte lacquer, satin PU, dan espresso stain, serta banyak pilihan warna kain dan kulit. Lihat halaman Material & Finishing untuk referensinya.',
                'keywords' => ['warna', 'finishing', 'pilihan', 'stain', 'matte'],
            ],
            [
                'group' => 'Kustomisasi',
                'q' => 'Bagaimana cara meminta penawaran harga?',
                'link' => 'quotation',
                'a' => 'Buka halaman Penawaran, isi data proyek, item, dan perkiraan anggaran. Tim kami akan mengirim rincian penawaran melalui WhatsApp atau email.',
                'keywords' => ['harga', 'penawaran', 'quotation', 'biaya', 'budget', 'berapa'],
            ],
            [
                'group' => 'Kustomisasi',
                'q' => 'Apakah ada layanan pengiriman dan instalasi?',
                'link' => 'order',
                'a' => 'Ya, kami melayani pengiriman dan instalasi oleh tim kami sendiri. Biaya dan jadwal menyesuaikan lokasi dan jumlah item.',
                'keywords' => ['kirim', 'pengiriman', 'instalasi', 'pasang', 'ongkir', 'antar'],
            ],
        ],
    ],

    /* ----------------------------------------------------------- FOOTER */
    'footer' => [
        'headline' => 'Bring Your Dream Space to Life',
        'text'     => 'Furniture bukan hanya sekadar perabot, tapi investasi untuk kenyamanan dan kebahagiaan Anda.',
        'image'    => $images . '/footer-room.jpg',
        'social'   => [
            ['icon' => 'instagram', 'label' => 'Instagram', 'url' => 'https://instagram.com/'],
            ['icon' => 'facebook',  'label' => 'Facebook',  'url' => 'https://facebook.com/'],
            ['icon' => 'youtube',   'label' => 'YouTube',   'url' => 'https://youtube.com/'],
            ['icon' => 'tiktok',    'label' => 'TikTok',    'url' => 'https://tiktok.com/'],
            ['icon' => 'pinterest', 'label' => 'Pinterest', 'url' => 'https://pinterest.com/'],
        ],
    ],
];
