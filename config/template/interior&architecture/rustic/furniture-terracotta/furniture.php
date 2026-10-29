<?php

/*
|--------------------------------------------------------------------------
| RusticFurni — Furniture Terracotta (Rustic)
|--------------------------------------------------------------------------
| Semua konten statis template ini dipusatkan di file ini supaya Blade tetap
| bersih dan mudah diganti tanpa menyentuh backend.
|
| Dibaca di Blade lewat:
|   config('template.interior&architecture.rustic.furniture-terracotta.furniture')
*/

$base = 'website-bisnis/template/interior&architecture/rustic/furniture-terracotta';

return [

    'meta' => [
        'name'        => 'RusticFurni',
        'tagline'     => 'Natural Wood • Timeless Living',
        'description' => 'RusticFurni — furniture dan custom furniture berbahan kayu pilihan dengan desain timeless untuk rumah, kantor, dan ruang komersial.',
    ],

    // Prefix nama route (lihat routes/web.php)
    'route_prefix' => 'webia.template.furniture-terracotta.',

    'assets' => [
        'css' => 'css/' . $base . '/furniture.css',
        'js'  => 'js/' . $base . '/furniture.js',
        'img' => 'images/' . $base,
    ],

    'contact' => [
        'address'  => 'Jl. Suka Maju No. 88, Bandung',
        'phone'    => '+62 811 2222 3333',
        'phone_raw' => '+6281122223333',
        'email'    => 'hello@rusticfurni.id',
        // Semua form & tombol WhatsApp diarahkan ke nomor ini (format internasional tanpa +)
        'whatsapp' => '62895630300345',
        'whatsapp_greeting' => 'Halo RusticFurni, saya ingin bertanya tentang furniture.',
    ],

    'nav' => [
        ['label' => 'Beranda',            'route' => 'index'],
        ['label' => 'Katalog',            'route' => 'catalog'],
        ['label' => 'Custom Design',      'route' => 'custom-design'],
        ['label' => 'Material & Finishing', 'route' => 'materials'],
        ['label' => 'Dimensi',            'route' => 'dimensions'],
        ['label' => 'Galeri',             'route' => 'gallery'],
        ['label' => 'Custom Order',       'route' => 'order-form'],
        ['label' => 'Penawaran',          'route' => 'quotation'],
    ],

    'hero' => [
        'eyebrow'   => 'Furniture & Custom Furniture',
        'title'     => ['Rumah Lebih Hidup', 'dengan'],
        'accent'    => 'Sentuhan Alam',
        'text'      => 'Furniture berkualitas tinggi dengan desain timeless, dibuat dari material pilihan untuk kenyamanan dan keindahan rumah Anda.',
        'image'     => 'hero-living.jpg',
        'script'    => ['Better Home', 'Better Life'],
        // Isi dengan URL embed (contoh: https://www.youtube.com/embed/XXXX) bila video profil sudah ada
        'video_url' => '',
        'highlights' => [
            ['icon' => 'leaf',   'title' => 'Kayu Pilihan',      'text' => 'Jati, mahoni, dan sungkai dari pemasok bersertifikat, dikeringkan sempurna sebelum diproses.'],
            ['icon' => 'ruler',  'title' => 'Ukuran Menyesuaikan', 'text' => 'Setiap model bisa disesuaikan dengan denah dan kebutuhan ruang Anda.'],
            ['icon' => 'tools',  'title' => 'Dikerjakan Pengrajin', 'text' => 'Sambungan kayu rapi, finishing berlapis, dan diperiksa satu per satu sebelum dikirim.'],
            ['icon' => 'truck',  'title' => 'Kirim & Pasang',     'text' => 'Dikemas aman, dikirim ke alamat Anda, dan dipasang oleh tim kami.'],
        ],
    ],

    'categories' => [
        ['key' => 'living',    'label' => 'Ruang Tamu',  'image' => 'collection-living.jpg'],
        ['key' => 'dining',    'label' => 'Ruang Makan', 'image' => 'collection-dining.jpg'],
        ['key' => 'bedroom',   'label' => 'Kamar Tidur', 'image' => 'collection-bedroom.jpg'],
        ['key' => 'workspace', 'label' => 'Ruang Kerja', 'image' => 'collection-workspace.jpg'],
        ['key' => 'outdoor',   'label' => 'Outdoor',     'image' => 'collection-outdoor.jpg'],
    ],

    // dims = [panjang, lebar, tinggi] dalam cm. Konten contoh — ganti dengan data produk asli.
    'products' => [
        ['id' => 'sofa-nara',      'name' => 'Sofa Nara 3 Dudukan',   'category' => 'living',    'image' => 'product-sofa.jpg',          'type' => 'sofa',    'material' => 'Rangka jati, kain linen',  'finishing' => 'Natural Matte',  'dims' => [210, 90, 80],  'summary' => 'Rangka kayu solid dengan dudukan empuk berlapis kain linen bertekstur.'],
        ['id' => 'meja-kopi-arka', 'name' => 'Meja Kopi Arka',        'category' => 'living',    'image' => 'product-coffee-table.jpg',  'type' => 'meja',    'material' => 'Mahoni solid',             'finishing' => 'Walnut',         'dims' => [100, 60, 42],  'summary' => 'Meja kopi dengan laci tersembunyi dan serat kayu yang dibiarkan terlihat jelas.'],
        ['id' => 'meja-makan-sabana', 'name' => 'Meja Makan Sabana',  'category' => 'dining',    'image' => 'product-dining-set.jpg',    'type' => 'set',     'material' => 'Jati solid',               'finishing' => 'Teak Oil',       'dims' => [180, 90, 75],  'summary' => 'Satu set meja makan enam kursi dengan dudukan berbantalan yang nyaman.'],
        ['id' => 'kursi-makan-lawu', 'name' => 'Kursi Makan Lawu',    'category' => 'dining',    'image' => 'product-chair.jpg',         'type' => 'kursi',   'material' => 'Jati solid',               'finishing' => 'Natural Clear',  'dims' => [48, 52, 85],   'summary' => 'Kursi bersandar lengkung dengan ukuran ergonomis untuk makan yang lama.'],
        ['id' => 'kursi-sandar-rimba', 'name' => 'Kursi Sandar Rimba', 'category' => 'dining',   'image' => 'product-dining-chair.jpg',  'type' => 'kursi',   'material' => 'Mahoni, dudukan busa',     'finishing' => 'Walnut',         'dims' => [50, 55, 88],   'summary' => 'Sandaran tinggi dan dudukan empuk, cocok untuk ruang makan keluarga.'],
        ['id' => 'ranjang-dahana', 'name' => 'Ranjang Dahana',        'category' => 'bedroom',   'image' => 'product-bed.jpg',           'type' => 'ranjang', 'material' => 'Jati solid',               'finishing' => 'Natural Matte',  'dims' => [210, 170, 95], 'summary' => 'Ranjang panel rendah dengan sandaran kepala lebar untuk kamar yang tenang.'],
        ['id' => 'nakas-sari',     'name' => 'Nakas Sari',            'category' => 'bedroom',   'image' => 'product-nightstand.jpg',    'type' => 'kabinet', 'material' => 'Mahoni solid',             'finishing' => 'Terracotta Wash','dims' => [45, 40, 55],   'summary' => 'Nakas satu laci dengan tinggi sejajar kasur, pas untuk lampu dan buku.'],
        ['id' => 'meja-kerja-karya', 'name' => 'Meja Kerja Karya',    'category' => 'workspace', 'image' => 'product-desk.jpg',          'type' => 'meja',    'material' => 'Jati solid',               'finishing' => 'Teak Oil',       'dims' => [150, 65, 75],  'summary' => 'Meja kerja dengan tiga laci dan permukaan luas untuk bekerja seharian.'],
        ['id' => 'rak-pustaka',    'name' => 'Rak Display Pustaka',   'category' => 'workspace', 'image' => 'product-shelf.jpg',         'type' => 'kabinet', 'material' => 'Sungkai, jati',            'finishing' => 'Natural Clear',  'dims' => [100, 35, 180], 'summary' => 'Rak terbuka berlapis untuk buku, koleksi, dan tanaman kecil.'],
        ['id' => 'bangku-teduh',   'name' => 'Bangku Kerja Teduh',    'category' => 'workspace', 'image' => 'product-stool.jpg',         'type' => 'kursi',   'material' => 'Jati, dudukan berbantal',  'finishing' => 'Natural Matte',  'dims' => [45, 35, 48],   'summary' => 'Bangku ringkas berbantalan yang mudah diselipkan di bawah meja.'],
        ['id' => 'sofa-teras-bayu', 'name' => 'Sofa Teras Bayu',      'category' => 'outdoor',   'image' => 'product-outdoor-sofa.jpg',  'type' => 'sofa',    'material' => 'Jati, bantal tahan cuaca', 'finishing' => 'Teak Oil',       'dims' => [190, 75, 78],  'summary' => 'Sofa teras berlengan kayu dengan bantal tahan cuaca untuk area semi-terbuka.'],
        ['id' => 'set-taman-sarang', 'name' => 'Set Meja Taman Sarang', 'category' => 'outdoor', 'image' => 'product-cafe-table.jpg',    'type' => 'set',     'material' => 'Jati solid',               'finishing' => 'Teak Oil',       'dims' => [120, 80, 76],  'summary' => 'Meja dan kursi taman yang kokoh untuk teras, kafe, dan area makan luar ruang.'],
    ],

    'custom' => [
        'sketch'  => 'custom-sketch.png',
        'script'  => ['Custom', 'Your Style'],
        'models'  => [
            ['key' => 'kursi',   'label' => 'Kursi & Bangku',  'icon' => 'chair'],
            ['key' => 'sofa',    'label' => 'Sofa',            'icon' => 'sofa'],
            ['key' => 'meja',    'label' => 'Meja',            'icon' => 'table'],
            ['key' => 'kabinet', 'label' => 'Lemari & Rak',    'icon' => 'cabinet'],
            ['key' => 'ranjang', 'label' => 'Tempat Tidur',    'icon' => 'bed'],
            ['key' => 'set',     'label' => 'Set Ruangan',     'icon' => 'cube'],
        ],
        'sizes'   => [
            ['key' => 'standar', 'label' => 'Standar',  'note' => 'Mengikuti ukuran katalog'],
            ['key' => 'ringkas', 'label' => 'Ringkas',  'note' => '10–20% lebih kecil'],
            ['key' => 'lebar',   'label' => 'Lebar',    'note' => '10–20% lebih besar'],
            ['key' => 'kustom',  'label' => 'Ukuran Sendiri', 'note' => 'Isi p × l × t sendiri'],
        ],
        'extras'  => ['Laci tambahan', 'Bantalan / upholstery', 'Anyaman rotan', 'Ukiran sederhana', 'Kaki besi hitam', 'Roda penggerak'],
    ],

    'materials' => [
        ['key' => 'jati',    'name' => 'Kayu Jati',    'tone' => '#b4763f', 'tone2' => '#8a5126', 'durability' => 5, 'care' => 2, 'best' => 'Meja makan, outdoor, furniture jangka panjang', 'text' => 'Padat, berminyak alami, dan tahan rayap serta cuaca. Pilihan utama untuk furniture yang diwariskan.'],
        ['key' => 'mahoni',  'name' => 'Kayu Mahoni',  'tone' => '#9c4a2c', 'tone2' => '#6e2f1a', 'durability' => 4, 'care' => 3, 'best' => 'Kursi, nakas, ranjang, lemari',        'text' => 'Serat halus dengan warna merah kecokelatan yang makin dalam seiring waktu.'],
        ['key' => 'sungkai', 'name' => 'Kayu Sungkai', 'tone' => '#d6a971', 'tone2' => '#b98547', 'durability' => 3, 'care' => 3, 'best' => 'Rak, kabinet, furniture interior',      'text' => 'Warna terang dengan serat lurus. Ringan, mudah dibentuk, dan bersahabat dengan anggaran.'],
        ['key' => 'trembesi', 'name' => 'Kayu Trembesi', 'tone' => '#8a5a3a', 'tone2' => '#5d3a22', 'durability' => 4, 'care' => 3, 'best' => 'Meja lebar, papan live-edge',            'text' => 'Papan lebar dengan corak serat yang unik, membuat setiap meja punya karakter sendiri.'],
        ['key' => 'rotan',   'name' => 'Rotan Anyam',  'tone' => '#d9b27a', 'tone2' => '#b88a4c', 'durability' => 3, 'care' => 2, 'best' => 'Sandaran, pintu lemari, aksen',     'text' => 'Anyaman ringan yang memberi tekstur hangat dan sirkulasi udara pada furniture.'],
        ['key' => 'besi',    'name' => 'Besi Powder-Coat', 'tone' => '#3a2f2a', 'tone2' => '#1f1815', 'durability' => 5, 'care' => 1, 'best' => 'Kaki meja, rangka industrial',      'text' => 'Rangka besi berlapis cat bakar untuk kaki meja yang kokoh dan minim perawatan.'],
    ],

    'finishings' => [
        ['key' => 'natural',    'name' => 'Natural Clear',   'hex' => '#d2a26a', 'sheen' => 'Matte',     'text' => 'Memperlihatkan warna asli kayu dengan lapisan pelindung tipis.'],
        ['key' => 'teak-oil',   'name' => 'Teak Oil',        'hex' => '#b8742f', 'sheen' => 'Satin',     'text' => 'Meresap ke serat, menonjolkan corak, dan mudah diperbarui.'],
        ['key' => 'walnut',     'name' => 'Walnut',          'hex' => '#6e4426', 'sheen' => 'Satin',     'text' => 'Cokelat tua yang hangat untuk kesan elegan dan padat.'],
        ['key' => 'terracotta', 'name' => 'Terracotta Wash', 'hex' => '#b8613a', 'sheen' => 'Matte',     'text' => 'Semburat terakota tipis yang tetap membiarkan serat kayu terlihat.'],
        ['key' => 'espresso',   'name' => 'Espresso Dark',   'hex' => '#2f1d14', 'sheen' => 'Semi-gloss', 'text' => 'Hitam kecokelatan untuk aksen dramatis dan kontras.'],
        ['key' => 'whitewash',  'name' => 'White Wash',      'hex' => '#e9dccb', 'sheen' => 'Matte',     'text' => 'Putih transparan bernuansa lembut untuk ruang yang lapang.'],
    ],

    'dimension' => [
        'image' => 'dimension-chair.png',
        'tips'  => [
            ['label' => 'Tinggi dudukan kursi makan', 'value' => '42–46 cm'],
            ['label' => 'Tinggi meja makan',          'value' => '73–76 cm'],
            ['label' => 'Jarak kursi ke tepi meja',   'value' => '25–30 cm'],
            ['label' => 'Lebar jalur sirkulasi',      'value' => '≥ 90 cm'],
            ['label' => 'Tinggi meja kerja',          'value' => '72–75 cm'],
        ],
    ],

    'projects' => [
        ['id' => 1, 'title' => 'Teras Makan Tropis',        'group' => 'rumah',     'image' => 'gallery-main.jpg',        'place' => 'Bandung',    'year' => '2025', 'scope' => 'Meja makan, kursi, rak tanaman'],
        ['id' => 2, 'title' => 'Ruang Santai Hangat',       'group' => 'rumah',     'image' => 'gallery-1.jpg',           'place' => 'Jakarta',    'year' => '2025', 'scope' => 'Sofa, kursi lengan, meja kopi'],
        ['id' => 3, 'title' => 'Kafe Kayu Lantai Dua',      'group' => 'komersial', 'image' => 'gallery-2.jpg',           'place' => 'Yogyakarta', 'year' => '2024', 'scope' => '24 set meja dan kursi custom'],
        ['id' => 4, 'title' => 'Teras Villa Berpayung',     'group' => 'outdoor',   'image' => 'gallery-3.jpg',           'place' => 'Ubud',       'year' => '2024', 'scope' => 'Set meja taman dan kursi'],
        ['id' => 5, 'title' => 'Ruang Kerja Kreatif',       'group' => 'kantor',    'image' => 'collection-workspace.jpg', 'place' => 'Bandung',   'year' => '2025', 'scope' => 'Meja kerja, rak display'],
        ['id' => 6, 'title' => 'Living Room Keluarga',      'group' => 'rumah',     'image' => 'collection-living.jpg',   'place' => 'Malang',     'year' => '2024', 'scope' => 'Sofa sudut, meja kopi, nakas'],
        ['id' => 7, 'title' => 'Kamar Utama Bernuansa Hangat', 'group' => 'rumah',  'image' => 'collection-bedroom.jpg',  'place' => 'Semarang',   'year' => '2025', 'scope' => 'Ranjang, dua nakas'],
        ['id' => 8, 'title' => 'Taman Teras Hijau',         'group' => 'outdoor',   'image' => 'collection-outdoor.jpg',  'place' => 'Bogor',      'year' => '2024', 'scope' => 'Sofa teras dan meja samping'],
    ],
    'project_groups' => [
        ['key' => 'rumah', 'label' => 'Rumah'], ['key' => 'kantor', 'label' => 'Kantor'],
        ['key' => 'komersial', 'label' => 'Komersial'], ['key' => 'outdoor', 'label' => 'Outdoor'],
    ],

    // Estimasi hari kerja (contoh). Sesuaikan dengan kapasitas workshop sebenarnya.
    'lead_times' => [
        'steps' => [
            ['title' => 'Konsultasi & Survey', 'days' => '1–3 hari',   'text' => 'Diskusi kebutuhan, ukuran ruang, dan anggaran. Survey lokasi bila diperlukan.'],
            ['title' => 'Desain & Persetujuan', 'days' => '3–5 hari',  'text' => 'Gambar kerja dan pilihan material dikirim untuk disetujui sebelum produksi.'],
            ['title' => 'Produksi',            'days' => '14–30 hari', 'text' => 'Pemotongan, perakitan, dan pengamplasan oleh pengrajin di workshop kami.'],
            ['title' => 'Finishing',           'days' => '5–7 hari',   'text' => 'Pewarnaan, pelapisan, dan pengeringan berlapis agar tahan lama.'],
            ['title' => 'QC & Pengemasan',     'days' => '2–3 hari',   'text' => 'Pemeriksaan akhir dan pengemasan aman untuk perjalanan.'],
            ['title' => 'Pengiriman & Instalasi', 'days' => '2–7 hari', 'text' => 'Dikirim ke alamat Anda dan dipasang oleh tim kami.'],
        ],
        'types' => [
            'kursi'   => ['label' => 'Kursi & Bangku', 'min' => 14, 'max' => 21],
            'meja'    => ['label' => 'Meja',           'min' => 18, 'max' => 25],
            'sofa'    => ['label' => 'Sofa',           'min' => 25, 'max' => 35],
            'kabinet' => ['label' => 'Lemari & Rak',   'min' => 21, 'max' => 30],
            'ranjang' => ['label' => 'Tempat Tidur',   'min' => 25, 'max' => 35],
            'set'     => ['label' => 'Set Ruangan',    'min' => 28, 'max' => 40],
        ],
        // Tambahan hari produksi per tingkat jumlah & finishing khusus
        'qty_extra'   => ['1-4' => 0, '5-10' => 7, '11-30' => 14, '30+' => 28],
        'custom_extra' => 5,
    ],

    'quotation' => [
        'terms' => [
            'Penawaran berlaku 14 hari sejak diterbitkan.',
            'Pembayaran bertahap: uang muka 50%, pelunasan sebelum pengiriman.',
            'Harga belum termasuk ongkos kirim dan instalasi di luar kota.',
            'Perubahan desain setelah persetujuan gambar kerja dapat memengaruhi harga dan jadwal.',
        ],
        'budget' => ['< Rp 10 juta', 'Rp 10–25 juta', 'Rp 25–50 juta', 'Rp 50–100 juta', '> Rp 100 juta'],
    ],

    'faq' => [
        'bot' => [
            'name'        => 'Rudi',
            'avatar'      => 'rudi.png',
            'role'        => 'Asisten AI RusticFurni',
            'greeting'    => 'Halo! Saya Rudi, asisten AI RusticFurni. Saya siap membantu Anda seputar produk, material, desain custom, dan pertanyaan lainnya. Ada yang bisa saya bantu?',
            'placeholder' => 'Tulis pertanyaan Anda...',
            'tip'         => 'Tanya yuk!',
            'chips'       => ['Rekomendasi produk untuk ruang tamu', 'Bisa custom ukuran?', 'Pilihan material terbaik?', 'Berapa lama proses produksi?'],
            'fallback'    => 'Pertanyaan yang bagus! Untuk jawaban yang paling tepat, tim kami siap membantu langsung lewat WhatsApp.',
        ],
        'groups' => [
            ['title' => 'Produk', 'items' => [
                ['q' => 'Rekomendasi produk untuk ruang tamu',
                 'a' => 'Untuk ruang tamu, Sofa Nara 3 Dudukan dan Meja Kopi Arka adalah kombinasi yang paling sering dipilih. Untuk ruang yang lebih kecil, kami bisa meringkas ukuran sofa agar sirkulasi tetap lega.',
                 'keys' => ['ruang tamu', 'sofa', 'meja kopi', 'living', 'rekomendasi']],
                ['q' => 'Apakah produk di katalog bisa dilihat langsung?',
                 'a' => 'Bisa. Hubungi kami lewat WhatsApp untuk menjadwalkan kunjungan ke workshop, atau minta foto dan video detail produk yang Anda minati.',
                 'keys' => ['lihat langsung', 'workshop', 'showroom', 'kunjungi', 'foto']],
                ['q' => 'Apakah furniture outdoor tahan hujan dan panas?',
                 'a' => 'Furniture outdoor kami memakai kayu jati dengan finishing khusus luar ruang. Letakkan di area semi-terbuka (teras) agar umurnya lebih panjang, dan lakukan pelapisan ulang setahun sekali.',
                 'keys' => ['outdoor', 'hujan', 'panas', 'teras', 'taman', 'cuaca']],
            ]],
            ['title' => 'Custom Design', 'items' => [
                ['q' => 'Bisa custom ukuran?',
                 'a' => 'Bisa. Semua model dapat disesuaikan panjang, lebar, dan tingginya. Isi ukuran di halaman Custom Design atau kirim sketsa/foto referensi lewat Form Custom Order.',
                 'keys' => ['custom', 'ukuran', 'sesuai', 'ubah', 'desain sendiri']],
                ['q' => 'Apakah saya bisa membawa gambar referensi?',
                 'a' => 'Tentu. Kirim foto atau sketsa referensi, lalu tim desain kami akan membuat gambar kerja untuk Anda setujui sebelum produksi dimulai.',
                 'keys' => ['referensi', 'gambar', 'sketsa', 'foto', 'contoh']],
                ['q' => 'Bagaimana cara meminta penawaran?',
                 'a' => 'Tambahkan produk ke Daftar Penawaran dari katalog, lalu isi Quotation Request. Anda juga bisa langsung mengirim kebutuhan lewat Form Custom Order.',
                 'keys' => ['penawaran', 'quotation', 'harga', 'biaya', 'berapa']],
            ]],
            ['title' => 'Material & Finishing', 'items' => [
                ['q' => 'Pilihan material terbaik?',
                 'a' => 'Kayu jati adalah pilihan terbaik untuk ketahanan dan umur pakai, terutama meja makan dan outdoor. Mahoni cocok untuk kursi dan ranjang, sedangkan sungkai untuk rak dan kabinet dengan anggaran lebih ringan.',
                 'keys' => ['material', 'kayu', 'jati', 'mahoni', 'sungkai', 'bahan', 'terbaik']],
                ['q' => 'Finishing apa yang paling mudah dirawat?',
                 'a' => 'Natural Clear dan Teak Oil paling mudah diperbarui sendiri: cukup diamplas ringan lalu dilapis ulang. Finishing gelap tampak mewah tetapi lebih sering terlihat goresan.',
                 'keys' => ['finishing', 'warna', 'rawat', 'perawatan', 'cat']],
            ]],
            ['title' => 'Produksi & Pengiriman', 'items' => [
                ['q' => 'Berapa lama proses produksi?',
                 'a' => 'Rata-rata 14–40 hari kerja tergantung jenis produk, jumlah, dan tingkat kustomisasi. Gunakan halaman Lead Time untuk menghitung estimasi tanggal selesai.',
                 'keys' => ['produksi', 'lama', 'berapa lama', 'waktu', 'lead time', 'estimasi', 'selesai']],
                ['q' => 'Apakah ada layanan pengiriman dan pemasangan?',
                 'a' => 'Ada. Produk dikemas aman, dikirim ke alamat Anda, dan dipasang oleh tim kami. Biaya kirim dan instalasi dihitung sesuai lokasi.',
                 'keys' => ['kirim', 'pengiriman', 'pasang', 'instalasi', 'ongkir']],
            ]],
        ],
    ],

    'footer' => [
        'about'   => 'Furniture berkualitas tinggi untuk rumah, kantor, dan ruang komersial Anda.',
        'columns' => [
            ['title' => 'Navigasi', 'links' => [
                ['label' => 'Beranda', 'route' => 'index'], ['label' => 'Katalog', 'route' => 'catalog'],
                ['label' => 'Custom Design', 'route' => 'custom-design'], ['label' => 'Material & Finishing', 'route' => 'materials'],
                ['label' => 'Project Gallery', 'route' => 'gallery'],
            ]],
            ['title' => 'Informasi', 'links' => [
                ['label' => 'Hero Banner', 'route' => 'hero'], ['label' => 'Dimensi Produk', 'route' => 'dimensions'],
                ['label' => 'Lead Time Produksi', 'route' => 'lead-time'], ['label' => 'AI FAQ', 'route' => 'ai-faq'],
            ]],
            ['title' => 'Layanan', 'links' => [
                ['label' => 'Custom Order Form', 'route' => 'order-form'], ['label' => 'Quotation Request', 'route' => 'quotation'],
            ]],
        ],
        'social' => [
            ['icon' => 'instagram', 'label' => 'Instagram', 'url' => '#'],
            ['icon' => 'facebook',  'label' => 'Facebook',  'url' => '#'],
            ['icon' => 'youtube',   'label' => 'YouTube',   'url' => '#'],
            ['icon' => 'pinterest', 'label' => 'Pinterest', 'url' => '#'],
            ['icon' => 'tiktok',    'label' => 'TikTok',    'url' => '#'],
        ],
        'credit' => '© 2026 WEBIA by D-KREASI. Seluruh hak cipta dilindungi.',
    ],
];
