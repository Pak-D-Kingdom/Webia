<?php

/*
|--------------------------------------------------------------------------
| Energi Cargo — Logistics Company (Bold · Orange Energy)
|--------------------------------------------------------------------------
| Semua konten template ada di file ini. Frontend statis: tidak ada query
| database. Key config otomatis menjadi:
| template.transportation&logistics.bold.logistics-company-orange-energy.logistics-company
|
| Nilai 'route' => null berarti halaman belum tersedia (link tampil sama
| seperti desain, tetapi mengarah ke "#" dan menampilkan notifikasi).
| Key 'icon' pada 'nav' memakai nama symbol di partials/icons.blade.php.
*/

return [

    'assets' => [
        'version' => '1.0.0',
        'css'     => 'css/website-bisnis/template/transportation&logistics/bold/logistics-company-orange-energy/logistics-company.css',
        'js'      => 'js/website-bisnis/template/transportation&logistics/bold/logistics-company-orange-energy/logistics-company.js',
    ],

    'brand' => [
        'name'        => 'Energi Cargo',
        'tagline'     => 'Fast. Safe. Everywhere.',
        'description' => 'Energi Cargo — solusi logistik terintegrasi untuk pengiriman barang domestik dan internasional lewat udara, laut, dan darat.',
        'credit'      => '© 2026 WEBIA by D-KREASI. Seluruh hak cipta dilindungi.',
    ],

    'contact' => [
        'location' => 'Jakarta, Indonesia',
        'hours'    => 'Sen - Sab 08:00 - 17:00',
        'phone'    => '+62 21 5555 8888',
        'phone_raw' => '+622155558888',
        'email'    => 'hello@energicargo.co.id',
        'info_email' => 'info@energicargo.co.id',
        'address'  => 'Jl. Industri No.88, Jakarta, Indonesia',
    ],

    'whatsapp' => [
        'number'  => '62895630300345',
        'label'   => 'WhatsApp',
        'message' => 'Halo Energi Cargo, saya ingin bertanya tentang layanan pengiriman.',
    ],

    'topbar' => [
        'links' => [
            ['label' => 'Karir', 'route' => null],
            ['label' => 'News & Update', 'route' => null],
        ],
    ],

    'nav' => [
        ['label' => 'Beranda', 'route' => 'home', 'icon' => 'home'],
        ['label' => 'Layanan', 'route' => 'layanan', 'icon' => 'box'],
        ['label' => 'Opsi Pengiriman', 'route' => 'opsi-pengiriman', 'icon' => 'plane'],
        ['label' => 'Jangkauan', 'route' => 'jangkauan', 'icon' => 'globe'],
        ['label' => 'Armada & Gudang', 'route' => 'armada-gudang', 'icon' => 'truck'],
        ['label' => 'Proses Pengiriman', 'route' => 'proses-pengiriman', 'icon' => 'route'],
        ['label' => 'Tracking', 'route' => 'tracking', 'icon' => 'pin'],
        ['label' => 'Klien Korporat', 'route' => 'klien-korporat', 'icon' => 'users'],
    ],

    'nav_cta' => ['label' => 'Hubungi Kami', 'route' => 'penawaran'],

    'hero' => [
        'eyebrow'  => 'Solusi Logistik Terpercaya',
        'title'    => 'Menghubungkan Bisnis Anda ke',
        'accent'   => 'Seluruh Dunia',
        'text'     => 'Layanan logistik terintegrasi untuk pengiriman barang yang aman, cepat dan efisien, dengan jangkauan global dan dukungan profesional.',
        'cta'      => ['label' => 'Mulai Pengiriman', 'route' => 'penawaran'],
        'cta_alt'  => ['label' => 'Lihat Layanan', 'route' => 'layanan'],
        'image'    => 'hero-scene.jpg',
        'features' => [
            ['icon' => 'globe',  'title' => 'Pengiriman', 'text' => 'Lokal & Internasional', 'route' => 'layanan'],
            ['icon' => 'shield', 'title' => 'Jaminan', 'text' => 'Keamanan Barang', 'route' => 'armada-gudang'],
            ['icon' => 'pin',    'title' => 'Pelacakan Real-time', 'text' => '24/7', 'route' => 'tracking'],
            ['icon' => 'users',  'title' => 'Tim Profesional', 'text' => 'Berpengalaman', 'route' => 'jangkauan'],
        ],
    ],

    /* ------------------------------ Layanan ------------------------------ */
    'services' => [
        'title' => 'Layanan Logistik Kami',
        'text'  => 'Solusi lengkap untuk kebutuhan pengiriman Anda.',
        'link'  => 'Lihat Semua Layanan',
        'items' => [
            [
                'icon' => 'box', 'title' => 'Pengiriman Domestik & Internasional', 'image' => 'hero-scene.jpg',
                'text' => 'Kirim paket, dokumen, dan kargo ke seluruh Indonesia maupun lintas negara dengan satu mitra, satu sistem, dan satu nomor resi.',
                'features' => ['Door-to-door seluruh Indonesia', 'Pengurusan dokumen ekspor-impor', 'Konsolidasi pengiriman antarnegara', 'Nomor resi tunggal untuk semua moda'],
            ],
            [
                'icon' => 'plane', 'title' => 'Pengiriman Udara', 'image' => 'hero-plane.jpg',
                'text' => 'Pilihan tercepat untuk barang bernilai tinggi atau mendesak, tersedia dari reguler hingga same day.',
                'features' => ['Reguler, Express, dan Super Express', 'Kargo khusus & barang bernilai tinggi', 'Charter pesawat kargo', 'Prioritas penanganan di bandara'],
            ],
            [
                'icon' => 'ship', 'title' => 'Pengiriman Laut', 'image' => 'hero-ship.jpg',
                'text' => 'Solusi hemat untuk volume besar, tersedia LCL maupun FCL dengan kapal kontainer berstandar internasional.',
                'features' => ['LCL & FCL kontainer 20ft / 40ft', 'Jadwal keberangkatan rutin', 'Penanganan pelabuhan & bea cukai', 'Cocok untuk volume besar'],
            ],
            [
                'icon' => 'truck', 'title' => 'Pengiriman Darat', 'image' => 'hero-truck.jpg',
                'text' => 'Armada truk modern untuk distribusi antarkota dan antarpulau lewat jalur darat dan penyeberangan.',
                'features' => ['Truk box, wingbox, dan trailer', 'Pickup & delivery terjadwal', 'Sewa truk (charter) harian', 'Pemantauan rute berbasis GPS'],
            ],
            [
                'icon' => 'warehouse', 'title' => 'Pergudangan & Distribusi', 'image' => 'fleet-dock.jpg',
                'text' => 'Gudang modern dengan sistem inventori terintegrasi untuk penyimpanan, pengemasan ulang, dan distribusi.',
                'features' => ['Penyimpanan jangka pendek & panjang', 'Pick, pack, dan pelabelan', 'Cross-docking & distribusi', 'Laporan stok berkala'],
            ],
            [
                'icon' => 'crane', 'title' => 'Project Cargo', 'image' => 'quote-ship.jpg',
                'text' => 'Penanganan barang berat, oversize, dan proyek industri dengan perencanaan rute dan peralatan khusus.',
                'features' => ['Survei rute & studi kelayakan', 'Alat angkat & trailer khusus', 'Pengawalan & pengaturan izin', 'Koordinator proyek khusus'],
            ],
            [
                'icon' => 'cart', 'title' => 'E-Commerce Logistics', 'image' => 'fleet-warehouse.jpg',
                'text' => 'Fulfillment end-to-end untuk toko online: penyimpanan, pengemasan, pengiriman, dan penanganan retur.',
                'features' => ['Fulfillment & pengemasan pesanan', 'Pengiriman same day / next day', 'Penanganan retur (reverse logistics)', 'Integrasi marketplace & toko online'],
            ],
        ],
    ],

    /* --------------------------- Opsi Pengiriman -------------------------- */
    'freight' => [
        'title'   => 'Opsi Pengiriman',
        'text'    => 'Pilih layanan terbaik sesuai kebutuhan bisnis Anda.',
        'link'    => 'Lihat Detail Tarif',
        'image'   => 'freight-plane.jpg',
        'default' => 'udara',
        'note'    => 'Estimasi waktu dan tarif bersifat indikatif dan dapat berbeda sesuai rute, berat, volume, serta jenis barang. Hubungi kami untuk penawaran resmi.',
        'tabs'    => [
            'udara' => [
                'label' => 'Udara',
                'text'  => 'Kecepatan maksimal untuk pengiriman prioritas ke ratusan kota di dunia.',
                'options' => [
                    ['name' => 'Reguler', 'eta' => '3 - 5 hari', 'desc' => 'Pengiriman udara standar dengan harga bersahabat untuk kebutuhan rutin.', 'price' => 'Mulai Rp 28.000 / kg', 'best' => 'Barang dagangan & sampel'],
                    ['name' => 'Express', 'eta' => '1 - 2 hari', 'desc' => 'Prioritas penerbangan berikutnya dengan penanganan dipercepat.', 'price' => 'Mulai Rp 45.000 / kg', 'best' => 'Pesanan mendesak'],
                    ['name' => 'Super Express', 'eta' => 'Same day', 'desc' => 'Pengiriman di hari yang sama untuk rute tertentu dengan kurir khusus.', 'price' => 'Hubungi kami', 'best' => 'Suku cadang & dokumen kritis'],
                    ['name' => 'Kargo Khusus', 'eta' => '1 - 3 hari', 'desc' => 'Penanganan barang berbahaya, bernilai tinggi, atau bersuhu terkendali.', 'price' => 'Sesuai permintaan', 'best' => 'Farmasi, elektronik, DG'],
                ],
            ],
            'laut' => [
                'label' => 'Laut',
                'text'  => 'Efisien untuk volume besar dengan jadwal keberangkatan yang terencana.',
                'options' => [
                    ['name' => 'LCL Reguler', 'eta' => '7 - 14 hari', 'desc' => 'Kargo konsolidasi untuk volume kecil hingga menengah.', 'price' => 'Mulai Rp 1.200.000 / cbm', 'best' => 'UMKM & distributor'],
                    ['name' => 'FCL 20ft / 40ft', 'eta' => '10 - 21 hari', 'desc' => 'Sewa satu kontainer penuh untuk keamanan dan biaya per unit lebih rendah.', 'price' => 'Sesuai rute', 'best' => 'Volume besar & ekspor'],
                    ['name' => 'Express Laut', 'eta' => '5 - 8 hari', 'desc' => 'Rute prioritas dengan slot kapal terjamin pada rute tertentu.', 'price' => 'Hubungi kami', 'best' => 'Jadwal produksi ketat'],
                    ['name' => 'Kargo Curah & Proyek', 'eta' => '14 - 30 hari', 'desc' => 'Pengangkutan barang oversize, berat, dan kebutuhan proyek.', 'price' => 'Sesuai permintaan', 'best' => 'Industri & konstruksi'],
                ],
            ],
            'darat' => [
                'label' => 'Darat',
                'text'  => 'Jaringan truk dan gudang yang menjangkau kota hingga kabupaten.',
                'options' => [
                    ['name' => 'Reguler', 'eta' => '2 - 4 hari', 'desc' => 'Pengiriman antarkota dengan jadwal rutin dan tarif ekonomis.', 'price' => 'Mulai Rp 2.500 / kg', 'best' => 'Distribusi toko & agen'],
                    ['name' => 'Express', 'eta' => '1 - 2 hari', 'desc' => 'Armada prioritas tanpa transit berlebih antarkota besar.', 'price' => 'Mulai Rp 4.500 / kg', 'best' => 'Restock cepat'],
                    ['name' => 'Charter Truk', 'eta' => '1 - 3 hari', 'desc' => 'Sewa satu armada penuh (CDE, CDD, Fuso, Trailer) sesuai kebutuhan.', 'price' => 'Sesuai rute', 'best' => 'Muatan penuh'],
                    ['name' => 'Gudang ke Gudang', 'eta' => '2 - 5 hari', 'desc' => 'Transfer stok antar gudang dengan dokumentasi serah terima lengkap.', 'price' => 'Hubungi kami', 'best' => 'Pemindahan stok'],
                ],
            ],
            'express' => [
                'label' => 'Express',
                'text'  => 'Layanan kilat untuk paket dan dokumen yang tidak bisa menunggu.',
                'options' => [
                    ['name' => 'Same Day', 'eta' => 'Hari yang sama', 'desc' => 'Dijemput dan diantar di hari yang sama untuk area layanan tertentu.', 'price' => 'Mulai Rp 35.000', 'best' => 'Dokumen & paket kecil'],
                    ['name' => 'Next Day', 'eta' => '1 hari', 'desc' => 'Tiba esok hari ke kota-kota utama di Indonesia.', 'price' => 'Mulai Rp 22.000', 'best' => 'E-commerce & retail'],
                    ['name' => 'Dokumen Express', 'eta' => '1 - 2 hari', 'desc' => 'Pengiriman dokumen penting dengan tanda terima digital.', 'price' => 'Mulai Rp 18.000', 'best' => 'Kontrak & legal'],
                    ['name' => 'Priority Internasional', 'eta' => '2 - 4 hari', 'desc' => 'Paket prioritas lintas negara dengan penanganan bea cukai.', 'price' => 'Hubungi kami', 'best' => 'Ekspor paket kecil'],
                ],
            ],
        ],
    ],

    /* ----------------------------- Jangkauan ------------------------------ */
    'coverage' => [
        'title' => 'Jangkauan Layanan',
        'text'  => 'Kami hadir di berbagai wilayah, untuk konektivitas tanpa batas.',
        'image' => 'map-world.png',
        'stats' => [
            ['value' => 50,  'suffix' => '+', 'label' => 'Negara Tujuan'],
            ['value' => 200, 'suffix' => '+', 'label' => 'Kota & Kabupaten'],
            ['value' => 15,  'suffix' => '',  'label' => 'Kantor Cabang'],
            ['value' => null, 'display' => '24/7', 'suffix' => '', 'label' => 'Dukungan Operasional'],
        ],
        'regions' => [
            ['title' => 'Asia Pasifik', 'text' => 'Singapura, Malaysia, Thailand, Vietnam, Tiongkok, Jepang, Korea Selatan, Australia, dan negara Asia Pasifik lainnya.'],
            ['title' => 'Eropa', 'text' => 'Jerman, Belanda, Inggris, Prancis, Italia, Spanyol, serta jaringan agen di seluruh Uni Eropa.'],
            ['title' => 'Amerika', 'text' => 'Amerika Serikat, Kanada, Meksiko, Brasil, dan kota-kota utama di Amerika Latin.'],
            ['title' => 'Timur Tengah & Afrika', 'text' => 'Uni Emirat Arab, Arab Saudi, Qatar, Mesir, Afrika Selatan, dan hub utama Afrika Timur.'],
        ],
        'hubs' => ['Jakarta', 'Surabaya', 'Bandung', 'Semarang', 'Yogyakarta', 'Medan', 'Palembang', 'Batam', 'Pontianak', 'Banjarmasin', 'Balikpapan', 'Makassar', 'Manado', 'Denpasar', 'Jayapura'],
    ],

    /* --------------------------- Armada & Gudang -------------------------- */
    'fleet' => [
        'title' => 'Armada & Gudang',
        'text'  => 'Armada modern dan fasilitas gudang berstandar internasional.',
        'image' => 'fleet-strip.jpg',
        'gallery' => [
            ['image' => 'fleet-trucks.jpg', 'caption' => 'Armada truk box dan wingbox siap berangkat'],
            ['image' => 'fleet-dock.jpg', 'caption' => 'Dock loading multi-pintu di gudang distribusi'],
            ['image' => 'fleet-warehouse.jpg', 'caption' => 'Area penyimpanan dan material handling modern'],
        ],
        'items' => [
            ['icon' => 'truck', 'line1' => 'Armada Truk', 'line2' => 'Modern', 'image' => 'fleet-trucks.jpg',
                'text' => 'Truk box, wingbox, dan trailer yang dirawat berkala dan dilengkapi pelacakan GPS.',
                'specs' => ['CDE, CDD, Fuso, dan Trailer 20/40 ft', 'Pelacakan GPS real-time', 'Perawatan terjadwal berkala', 'Pengemudi tersertifikasi']],
            ['icon' => 'plane', 'line1' => 'Pesawat Kargo', 'line2' => '& Charter', 'image' => 'hero-plane.jpg',
                'text' => 'Kapasitas ruang kargo udara reguler dan charter untuk kebutuhan mendesak atau barang besar.',
                'specs' => ['Kapasitas ruang kargo terjamin', 'Opsi charter satu pesawat', 'Penanganan kargo berbahaya (DG)', 'Koordinasi langsung dengan bandara']],
            ['icon' => 'ship', 'line1' => 'Kapal Kontainer', 'line2' => 'Berstandar Internasional', 'image' => 'hero-ship.jpg',
                'text' => 'Kemitraan dengan pelayaran besar untuk pengangkutan kontainer di jalur domestik dan internasional.',
                'specs' => ['Kontainer 20ft, 40ft, dan High Cube', 'Jadwal pelayaran rutin', 'Standar keselamatan SOLAS', 'Tracking posisi kapal']],
            ['icon' => 'warehouse', 'line1' => 'Gudang Modern', 'line2' => '& Aman', 'image' => 'fleet-dock.jpg',
                'text' => 'Gudang dengan sistem manajemen inventori, keamanan 24 jam, dan area bongkar muat yang efisien.',
                'specs' => ['Sistem WMS & stok real-time', 'CCTV 24 jam & akses terkontrol', 'Dock loading multi-pintu', 'Proteksi kebakaran & asuransi']],
        ],
    ],

    /* ----------------------------- Proses -------------------------------- */
    'process' => [
        'title' => 'Proses Pengiriman',
        'text'  => 'Dari pengambilan hingga sampai di tujuan, kami pastikan setiap langkah berjalan lancar.',
        'steps' => [
            ['icon' => null, 'title' => 'Pengambilan Barang', 'note' => '(di lokasi Anda)',
                'text' => 'Kurir kami menjemput barang di lokasi Anda sesuai jadwal yang disepakati dan mencatat serah terima awal.'],
            ['icon' => 'box', 'title' => 'Pemeriksaan & Verifikasi', 'note' => '',
                'text' => 'Barang ditimbang, diukur, dan diverifikasi kesesuaiannya dengan dokumen serta ketentuan pengiriman.'],
            ['icon' => 'clipboard', 'title' => 'Pengemasan Aman', 'note' => '',
                'text' => 'Barang dikemas dengan material pelindung sesuai karakter muatan, lengkap dengan label dan penanda penanganan.'],
            ['icon' => 'route', 'title' => 'Pengiriman', 'note' => '(udara/laut/darat)',
                'text' => 'Barang diberangkatkan melalui moda terbaik. Posisi dapat dipantau kapan saja lewat nomor resi Anda.'],
            ['icon' => 'plane', 'title' => 'Tiba di Tujuan', 'note' => '& Serah Terima',
                'text' => 'Barang diantar ke penerima, diperiksa bersama, dan ditutup dengan bukti serah terima digital.'],
        ],
    ],

    /* ----------------------------- Tracking ------------------------------ */
    'tracking' => [
        'title'       => 'Lacak Pengiriman Anda',
        'text'        => 'Pantau posisi barang secara real-time dengan sistem tracking kami.',
        'placeholder' => 'Masukkan nomor resi / tracking',
        /*
         * Integrasi tracking: isi dengan URL endpoint backend (GET ?resi=XXXX)
         * yang mengembalikan JSON:
         * { "resi": "...", "status": "...", "stage": 0-3, "origin": "...", "destination": "...",
         *   "service": "...", "events": [ {"time": "...", "title": "...", "location": "..."} ] }
         * Selama masih null, template berjalan dalam mode demo.
         */
        'endpoint'    => null,
        'stages'      => ['Diterima', 'Dalam Proses', 'Dalam Pengiriman', 'Tiba'],
        'demo' => [
            'EC2026001234' => [
                'status' => 'Dalam Pengiriman', 'stage' => 2, 'service' => 'Pengiriman Udara - Express',
                'origin' => 'Jakarta', 'destination' => 'Singapura',
                'events' => [
                    ['time' => '28 Okt 2026, 16:40', 'title' => 'Barang dalam penerbangan menuju tujuan', 'location' => 'Bandara Soekarno-Hatta'],
                    ['time' => '28 Okt 2026, 11:15', 'title' => 'Pemeriksaan dan pengemasan selesai', 'location' => 'Gudang Cengkareng'],
                    ['time' => '27 Okt 2026, 15:05', 'title' => 'Barang diterima dari pengirim', 'location' => 'Jakarta'],
                ],
            ],
            'EC2026005678' => [
                'status' => 'Tiba', 'stage' => 3, 'service' => 'Pengiriman Darat - Reguler',
                'origin' => 'Surabaya', 'destination' => 'Denpasar',
                'events' => [
                    ['time' => '26 Okt 2026, 10:20', 'title' => 'Barang diterima oleh penerima', 'location' => 'Denpasar'],
                    ['time' => '25 Okt 2026, 17:45', 'title' => 'Kurir menuju alamat penerima', 'location' => 'Denpasar'],
                    ['time' => '24 Okt 2026, 08:30', 'title' => 'Barang diberangkatkan dari gudang', 'location' => 'Surabaya'],
                    ['time' => '23 Okt 2026, 14:00', 'title' => 'Barang diterima dari pengirim', 'location' => 'Surabaya'],
                ],
            ],
            'EC2026009999' => [
                'status' => 'Dalam Proses', 'stage' => 1, 'service' => 'Pengiriman Laut - LCL',
                'origin' => 'Semarang', 'destination' => 'Rotterdam',
                'events' => [
                    ['time' => '28 Okt 2026, 09:10', 'title' => 'Pemeriksaan dokumen dan bea cukai', 'location' => 'Pelabuhan Tanjung Emas'],
                    ['time' => '27 Okt 2026, 13:30', 'title' => 'Barang diterima di gudang konsolidasi', 'location' => 'Semarang'],
                ],
            ],
        ],
    ],

    /* ------------------------------ Klien -------------------------------- */
    'clients' => [
        'title' => 'Klien Korporat Kami',
        'text'  => 'Dipercaya oleh berbagai perusahaan terkemuka.',
        'items' => [
            ['name' => 'Pertamina', 'logo' => 'logo-pertamina.png', 'sector' => 'Energi'],
            ['name' => 'Indomobil', 'logo' => 'logo-indomobil.png', 'sector' => 'Otomotif'],
            ['name' => 'Samsung', 'logo' => 'logo-samsung.png', 'sector' => 'Elektronik'],
            ['name' => 'Unilever', 'logo' => 'logo-unilever.png', 'sector' => 'Consumer Goods'],
            ['name' => 'Mayora', 'logo' => 'logo-mayora.png', 'sector' => 'Makanan & Minuman'],
            ['name' => 'BCA', 'logo' => 'logo-bca.png', 'sector' => 'Perbankan'],
            ['name' => 'Telkom Indonesia', 'logo' => 'logo-telkom.png', 'sector' => 'Telekomunikasi'],
            ['name' => 'Indofood', 'logo' => 'logo-indofood.png', 'sector' => 'Makanan & Minuman'],
        ],
        'benefits' => [
            ['title' => 'Account manager khusus', 'text' => 'Satu penanggung jawab yang memahami kebutuhan dan alur pengiriman perusahaan Anda.'],
            ['title' => 'Kontrak & SLA jelas', 'text' => 'Tarif kontrak, target waktu, dan prosedur penanganan klaim disepakati sejak awal.'],
            ['title' => 'Laporan berkala', 'text' => 'Ringkasan volume, ketepatan waktu, dan biaya pengiriman untuk membantu perencanaan.'],
            ['title' => 'Integrasi sistem', 'text' => 'Tracking dan data pengiriman dapat dihubungkan ke sistem ERP atau toko online Anda.'],
        ],
    ],

    /* ----------------------------- Penawaran ----------------------------- */
    'quotation' => [
        'title'   => 'Minta Penawaran Harga',
        'text'    => 'Dapatkan penawaran terbaik untuk kebutuhan logistik Anda.',
        'cta'     => 'Ajukan Permintaan',
        'image'   => 'quote-ship.jpg',
        'benefits' => ['Respons penawaran dalam 1 hari kerja', 'Tarif kompetitif dan transparan', 'Konsultasi rute & moda gratis', 'Tim berpengalaman mendampingi Anda'],
        'cargo_types' => ['Barang umum', 'Elektronik', 'Makanan & minuman', 'Pakaian & tekstil', 'Mesin & suku cadang', 'Dokumen', 'Barang berbahaya (DG)', 'Lainnya'],
    ],

    /* -------------------------------- AI --------------------------------- */
    'ai' => [
        'title'    => 'Tanya AI Assistant',
        'text'     => 'Dapatkan jawaban cepat seputar harga, proses pengiriman, jenis layanan, dan informasi lainnya.',
        'bot_name' => 'Asisten Energi Cargo',
        'greeting' => 'Halo! Saya asisten AI Energi Cargo. Ada yang bisa saya bantu seputar tarif, pelacakan, atau layanan pengiriman?',
        'fallback' => 'Maaf, saya belum menemukan jawaban yang tepat. Coba pilih salah satu pertanyaan di bawah, atau hubungi tim kami lewat WhatsApp.',
        'helper'   => [
            'text'  => 'Ada pertanyaan tentang pengiriman, tarif, atau proses logistik? Saya siap membantu!',
            'cta'   => 'Chat Sekarang',
        ],
        'questions' => [
            'Berapa tarif pengiriman?',
            'Bagaimana cara melacak barang?',
            'Berapa lama waktu pengiriman?',
            'Layanan apa saja yang tersedia?',
        ],
        'faqs' => [
            ['q' => 'Berapa tarif pengiriman?', 'keywords' => ['tarif', 'harga', 'biaya', 'ongkos', 'ongkir', 'berapa'],
                'a' => 'Tarif bergantung pada moda (udara, laut, darat), rute, berat, dan volume barang. Sebagai gambaran, pengiriman darat reguler mulai dari Rp 2.500/kg dan udara reguler mulai dari Rp 28.000/kg. Untuk angka pasti, ajukan permintaan penawaran dan tim kami akan membalas dalam 1 hari kerja.',
                'route' => 'penawaran', 'cta' => 'Minta Penawaran'],
            ['q' => 'Bagaimana cara melacak barang?', 'keywords' => ['lacak', 'tracking', 'resi', 'posisi', 'pantau', 'cek barang'],
                'a' => 'Masukkan nomor resi Anda di halaman Tracking. Status akan ditampilkan mulai dari Diterima, Dalam Proses, Dalam Pengiriman, hingga Tiba, lengkap dengan riwayat perjalanan barang.',
                'route' => 'tracking', 'cta' => 'Buka Tracking'],
            ['q' => 'Berapa lama waktu pengiriman?', 'keywords' => ['lama', 'estimasi', 'waktu', 'sampai', 'tiba', 'hari', 'durasi'],
                'a' => 'Udara reguler 3-5 hari, express 1-2 hari, dan super express bisa same day. Darat reguler 2-4 hari, sedangkan laut LCL berkisar 7-14 hari tergantung rute. Estimasi dapat berubah mengikuti cuaca dan proses bea cukai.',
                'route' => 'opsi-pengiriman', 'cta' => 'Lihat Opsi Pengiriman'],
            ['q' => 'Layanan apa saja yang tersedia?', 'keywords' => ['layanan', 'jenis', 'tersedia', 'service', 'apa saja'],
                'a' => 'Kami melayani pengiriman domestik & internasional, udara, laut, darat, pergudangan & distribusi, project cargo, dan e-commerce logistics.',
                'route' => 'layanan', 'cta' => 'Lihat Semua Layanan'],
            ['q' => 'Apakah barang diasuransikan?', 'keywords' => ['asuransi', 'rusak', 'hilang', 'klaim', 'jaminan', 'aman'],
                'a' => 'Ya. Kami menyediakan opsi asuransi pengiriman untuk melindungi barang dari kerusakan atau kehilangan. Klaim diproses sesuai ketentuan polis dengan bukti serah terima dan foto kondisi barang.'],
            ['q' => 'Negara dan kota mana saja yang dijangkau?', 'keywords' => ['jangkauan', 'negara', 'kota', 'wilayah', 'cabang', 'cakupan', 'tujuan'],
                'a' => 'Kami menjangkau 50+ negara tujuan, 200+ kota dan kabupaten di Indonesia, dengan 15 kantor cabang serta dukungan operasional 24/7.',
                'route' => 'jangkauan', 'cta' => 'Lihat Jangkauan'],
            ['q' => 'Bisa jemput barang ke lokasi saya?', 'keywords' => ['jemput', 'pickup', 'pick up', 'ambil', 'kurir'],
                'a' => 'Bisa. Kurir kami menjemput barang di lokasi Anda sesuai jadwal. Cukup sebutkan alamat dan jam penjemputan saat mengajukan permintaan.'],
            ['q' => 'Barang apa yang tidak boleh dikirim?', 'keywords' => ['dilarang', 'terlarang', 'tidak boleh', 'larangan', 'berbahaya', 'prohibited'],
                'a' => 'Barang ilegal, narkotika, senjata, dan bahan peledak tidak dapat dikirim. Barang berbahaya tertentu (DG) hanya diterima dengan dokumen dan kemasan sesuai regulasi. Hubungi kami sebelum mengirim.'],
            ['q' => 'Apakah ada layanan gudang?', 'keywords' => ['gudang', 'warehouse', 'simpan', 'penyimpanan', 'fulfillment', 'stok'],
                'a' => 'Ada. Gudang kami dilengkapi sistem inventori, keamanan 24 jam, dan layanan pick-pack serta distribusi untuk bisnis dan toko online.',
                'route' => 'armada-gudang', 'cta' => 'Lihat Armada & Gudang'],
            ['q' => 'Bagaimana jam operasional?', 'keywords' => ['jam', 'buka', 'operasional', 'tutup', 'hari kerja', 'sabtu'],
                'a' => 'Kantor kami buka Senin sampai Sabtu pukul 08:00 - 17:00. Dukungan operasional dan pelacakan tersedia 24/7.'],
            ['q' => 'Di mana alamat kantor?', 'keywords' => ['alamat', 'lokasi', 'kantor', 'dimana', 'di mana', 'kontak', 'telepon', 'email'],
                'a' => 'Kantor pusat kami berada di Jl. Industri No.88, Jakarta, Indonesia. Telepon +62 21 5555 8888, email hello@energicargo.co.id.'],
            ['q' => 'Apakah melayani pengiriman toko online?', 'keywords' => ['online', 'marketplace', 'ecommerce', 'e-commerce', 'toko', 'shopee', 'tokopedia', 'retur'],
                'a' => 'Ya, layanan E-Commerce Logistics kami mencakup penyimpanan, pengemasan, pengiriman same day / next day, hingga penanganan retur.',
                'route' => 'layanan', 'cta' => 'Lihat Layanan'],
        ],
    ],

    /* ------------------------------ Footer ------------------------------- */
    'footer' => [
        'about' => 'Solusi logistik terintegrasi untuk mendukung pertumbuhan bisnis Anda, dari Indonesia dan seluruh dunia.',
        'navigasi' => [
            ['label' => 'Beranda', 'route' => 'home'],
            ['label' => 'Layanan', 'route' => 'layanan'],
            ['label' => 'Opsi Pengiriman', 'route' => 'opsi-pengiriman'],
            ['label' => 'Jangkauan', 'route' => 'jangkauan'],
            ['label' => 'Armada & Gudang', 'route' => 'armada-gudang'],
        ],
        'informasi' => [
            ['label' => 'Tentang Kami', 'route' => null],
            ['label' => 'Karir', 'route' => null],
            ['label' => 'Berita', 'route' => null],
            ['label' => 'FAQ', 'route' => 'ai-assistant'],
            ['label' => 'Kontak', 'route' => 'penawaran'],
        ],
        'layanan' => [
            'Pengiriman Domestik & Internasional',
            'Pengiriman Udara',
            'Pengiriman Laut',
            'Pengiriman Darat',
            'Pergudangan & Distribusi',
            'Project Cargo',
        ],
        'social' => [
            ['icon' => 'facebook', 'label' => 'Facebook', 'url' => '#'],
            ['icon' => 'instagram', 'label' => 'Instagram', 'url' => '#'],
            ['icon' => 'linkedin', 'label' => 'LinkedIn', 'url' => '#'],
            ['icon' => 'youtube', 'label' => 'YouTube', 'url' => '#'],
        ],
        'legal' => [
            ['label' => 'Syarat & Ketentuan', 'route' => null],
            ['label' => 'Kebijakan Privasi', 'route' => null],
        ],
    ],
];
