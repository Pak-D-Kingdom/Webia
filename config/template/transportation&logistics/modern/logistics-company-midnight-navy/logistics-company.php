<?php

/*
|--------------------------------------------------------------------------
| GlobalCargo — Logistics Company · Modern · Midnight Navy
|--------------------------------------------------------------------------
| Semua konten statis template ini dikelola dari satu file konfigurasi.
| File ini dimuat oleh routes/web.php (lihat snippet route) dan dikirim ke
| seluruh view sebagai variabel $site. Tidak ada koneksi database / backend.
*/

return [

    'view'         => 'website-bisnis.template.transportation&logistics.modern.logistics-company-midnight-navy',
    'route_prefix' => 'logistics-company.',

    'paths' => [
        'css'    => 'css/website-bisnis/template/transportation&logistics/modern/logistics-company-midnight-navy/logistics-company.css',
        'js'     => 'js/website-bisnis/template/transportation&logistics/modern/logistics-company-midnight-navy/logistics-company.js',
        'images' => 'images/website-bisnis/template/transportation&logistics/modern/logistics-company-midnight-navy/',
    ],

    'brand' => [
        'name'    => 'GlobalCargo',
        'tagline' => 'Your Trusted Logistics Partner',
    ],

    'meta' => [
        'description' => 'GlobalCargo — solusi logistik terintegrasi untuk pengiriman barang domestik dan internasional lewat udara, laut, dan darat.',
    ],

    'contact' => [
        'location'      => 'Jakarta, Indonesia',
        'hours'         => 'Senin - Jumat 08:00 - 17:00',
        'phone'         => '+62 21 2987 6543',
        'phone_href'    => '+622129876543',
        'email'         => 'hello@globalcargo.co.id',
        'address'       => 'Jl. Industri No.88, Jakarta, Indonesia',
        // Nomor tujuan WhatsApp (format internasional, tanpa +, spasi, atau 0 di depan).
        'whatsapp'      => '62895630300345',
        'whatsapp_text' => 'Halo GlobalCargo, saya ingin bertanya tentang layanan logistik.',
    ],

    // Menu utama. 'route' = nama route tanpa prefix.
    'nav' => [
        ['label' => 'Beranda',            'route' => 'home'],
        ['label' => 'Layanan',            'route' => 'services'],
        ['label' => 'Solusi Freight',     'route' => 'freight'],
        ['label' => 'Jangkauan',          'route' => 'coverage'],
        ['label' => 'Armada & Gudang',    'route' => 'fleet'],
        ['label' => 'Proses Pengiriman',  'route' => 'process'],
        ['label' => 'Tracking',           'route' => 'tracking'],
        ['label' => 'Klien Korporat',     'route' => 'clients'],
    ],

    'hero' => [
        'badge'    => 'Global Logistics Solution',
        'title'    => 'Membawa Bisnis Anda',
        'title_hl' => 'Melintasi Batas',
        'text'     => 'Solusi logistik terintegrasi untuk pengiriman barang yang lebih cepat, aman dan efisien, mendukung pertumbuhan bisnis Anda di seluruh dunia.',
        'cta'      => 'Konsultasi Sekarang',
        'video'    => 'Tonton Video',
        // Isi dengan URL embed (mis. https://www.youtube-nocookie.com/embed/xxxx) untuk mengaktifkan video.
        'video_url' => '',
        'script'   => ['More Than', 'Just Delivery', 'We Deliver Trust'],
        'highlights' => [
            ['icon' => 'delivery', 'title' => 'Pengiriman',        'text' => 'Darat, Laut, Udara'],
            ['icon' => 'track',    'title' => 'Lacak Barang',      'text' => 'Real-time Tracking'],
            ['icon' => 'team',     'title' => 'Tim Profesional',   'text' => 'Berpengalaman'],
        ],
    ],

    'services' => [
        'title'    => 'Layanan Logistik Kami',
        'subtitle' => 'Solusi logistik lengkap untuk kebutuhan bisnis Anda.',
        'more'     => 'Lihat Semua Layanan',
        'items'    => [
            ['icon' => 'globe',     'title' => 'Pengiriman Domestik & Internasional', 'desc' => 'Pengiriman barang antar kota, antar pulau, hingga lintas negara dengan jadwal yang terpantau.', 'points' => ['Jadwal keberangkatan terjadwal', 'Pilihan layanan reguler dan ekspres', 'Konfirmasi penerimaan di tujuan']],
            ['icon' => 'ship',      'title' => 'Freight Forwarding',                  'desc' => 'Pengaturan pengiriman udara, laut, dan darat dari satu pintu, mulai dari booking hingga konsolidasi kargo.', 'points' => ['Booking ruang kargo', 'Konsolidasi muatan', 'Koordinasi antar moda']],
            ['icon' => 'customs',   'title' => 'Customs Clearance',                   'desc' => 'Pengurusan dokumen dan kepabeanan ekspor-impor agar barang melewati perbatasan dengan lancar.', 'points' => ['Penyiapan dokumen kepabeanan', 'Pendampingan pemeriksaan', 'Informasi regulasi terbaru']],
            ['icon' => 'warehouse', 'title' => 'Warehousing & Distribution',          'desc' => 'Penyimpanan, pengelolaan stok, dan distribusi ke berbagai tujuan dari gudang strategis kami.', 'points' => ['Penyimpanan aman dan tertata', 'Pengelolaan stok', 'Distribusi ke berbagai tujuan']],
            ['icon' => 'box',       'title' => 'E-Commerce Logistics',                'desc' => 'Penanganan pesanan online dan pengiriman last-mile untuk toko dengan volume pengiriman tinggi.', 'points' => ['Pengemasan pesanan', 'Pengiriman last-mile', 'Pelacakan tiap paket']],
            ['icon' => 'cargo',     'title' => 'Project Cargo',                       'desc' => 'Penanganan muatan besar dan khusus untuk proyek industri dengan perencanaan rute dan alat angkut yang sesuai.', 'points' => ['Survei dan perencanaan rute', 'Alat angkut khusus', 'Pengawalan sampai lokasi']],
        ],
    ],

    'freight' => [
        'title'    => 'Pilihan Freight',
        'subtitle' => 'Fleksibel sesuai kebutuhan pengiriman Anda.',
        'items'    => [
            ['key' => 'udara', 'title' => 'Udara', 'tagline' => 'Cepat & Aman',                 'image' => 'freight-udara.jpg', 'desc' => 'Pilihan tercepat untuk barang bernilai tinggi, mendesak, atau mudah rusak dengan jadwal penerbangan yang luas.', 'points' => ['Waktu tempuh paling singkat', 'Cocok untuk barang bernilai tinggi', 'Penanganan khusus barang sensitif']],
            ['key' => 'laut',  'title' => 'Laut',  'tagline' => 'Ekonomis & Kapasitas Besar',   'image' => 'freight-laut.jpg',  'desc' => 'Solusi hemat untuk muatan besar dalam jumlah banyak, dalam kontainer penuh maupun konsolidasi.', 'points' => ['Biaya per unit paling efisien', 'Kapasitas muatan besar', 'Pilihan FCL dan LCL']],
            ['key' => 'darat', 'title' => 'Darat',  'tagline' => 'Tepat Waktu & Fleksibel',     'image' => 'freight-darat.jpg', 'desc' => 'Jaringan armada darat untuk pengiriman door-to-door yang fleksibel dan terjadwal ke berbagai kota.', 'points' => ['Pengiriman door-to-door', 'Jadwal fleksibel', 'Armada beragam sesuai muatan']],
        ],
        'compare' => [
            'head' => ['Moda', 'Kecepatan', 'Biaya', 'Kapasitas'],
            'rows' => [
                ['Udara', 'Sangat cepat', 'Lebih tinggi', 'Terbatas'],
                ['Laut',  'Lebih lama',   'Paling hemat', 'Sangat besar'],
                ['Darat', 'Cepat',        'Menengah',     'Fleksibel'],
            ],
        ],
    ],

    'coverage' => [
        'title'    => 'Jangkauan Layanan',
        'subtitle' => 'Hadir di berbagai wilayah, untuk konektivitas yang lebih baik.',
        'image'    => 'service-map.png',
        'stats'    => [
            ['count' => 50,  'suffix' => '+', 'label' => 'Negara',               'desc' => 'Jaringan mitra dan agen di berbagai negara.'],
            ['count' => 200, 'suffix' => '+', 'label' => 'Kota & Pelabuhan',     'desc' => 'Titik layanan kota dan pelabuhan untuk jangkauan luas.'],
            ['count' => 15,  'suffix' => '',  'label' => 'Kantor Cabang',        'desc' => 'Kantor cabang yang siap mendampingi operasional Anda.'],
            ['text'  => '24/7',               'label' => 'Dukungan Operasional', 'desc' => 'Tim operasional siaga setiap hari untuk kebutuhan mendesak.'],
        ],
    ],

    'fleet' => [
        'title'    => 'Armada & Gudang',
        'subtitle' => 'Didukung armada modern dan fasilitas gudang berstandar internasional.',
        'image'    => 'fleet-warehouse.jpg',
        'slides'   => [
            ['focus' => 'center', 'caption' => 'Armada dan gudang GlobalCargo'],
            ['focus' => 'left',   'caption' => 'Fasilitas gudang berstandar internasional'],
            ['focus' => 'right',  'caption' => 'Armada modern siap beroperasi'],
        ],
        'stats' => [
            ['icon' => 'truck',     'count' => 250,   'suffix' => '+',    'label' => 'Unit Armada',      'desc' => 'Truk dan kendaraan pengangkut untuk berbagai jenis muatan.'],
            ['icon' => 'warehouse', 'count' => 5,     'suffix' => '',     'label' => 'Gudang Strategis', 'desc' => 'Gudang di lokasi strategis untuk distribusi yang lebih cepat.'],
            ['icon' => 'hub',       'count' => 50000, 'suffix' => ' m²',  'label' => 'Total Area Gudang', 'desc' => 'Area penyimpanan luas dengan penataan yang rapi dan aman.'],
        ],
    ],

    'process' => [
        'title'    => 'Proses Pengiriman',
        'subtitle' => 'Dari pengambilan hingga sampai di tujuan, kami pastikan setiap tahap berjalan lancar.',
        'steps'    => [
            ['icon' => 'pickup',  'title' => 'Penjemputan Barang',      'desc' => 'Tim kami menjemput barang dari lokasi Anda sesuai jadwal yang disepakati.'],
            ['icon' => 'inspect', 'title' => 'Pemeriksaan & Handling',  'desc' => 'Barang diperiksa, ditimbang, dan dikemas agar aman selama perjalanan.'],
            ['icon' => 'cross',   'title' => 'Pengiriman Lintas Negara', 'desc' => 'Barang dikirim melalui moda yang dipilih, udara, laut, atau darat.'],
            ['icon' => 'customs', 'title' => 'Customs Clearance',        'desc' => 'Dokumen dan kepabeanan diurus agar barang lancar melewati perbatasan.'],
            ['icon' => 'dropoff', 'title' => 'Drop Off ke Penerima',     'desc' => 'Barang diantar sampai ke penerima dan status pengiriman diperbarui.'],
        ],
    ],

    'tracking' => [
        'title'       => 'Tracking Pengiriman',
        'subtitle'    => 'Pantau status pengiriman barang Anda secara real-time.',
        'placeholder' => 'Masukkan nomor resi / tracking',
        'button'      => 'Lacak',
        // Isi dengan URL endpoint JSON dari backend (GET ?awb=NOMOR) untuk integrasi sungguhan.
        // Respons yang diharapkan: {"step": 0-3, "message": "teks status"}.
        'endpoint'    => '',
        'statuses'    => [
            ['icon' => 'inbox',  'label' => 'Diterima'],
            ['icon' => 'gear',   'label' => 'Dalam Proses'],
            ['icon' => 'truck',  'label' => 'Dalam Perjalanan'],
            ['icon' => 'pin',    'label' => 'Tiba'],
        ],
    ],

    'clients' => [
        'title'    => 'Klien Korporat Kami',
        'subtitle' => 'Dipercaya oleh berbagai perusahaan ternama.',
        'items'    => [
            ['name' => 'Google',     'image' => 'client-google.png'],
            ['name' => 'Samsung',    'image' => 'client-samsung.png'],
            ['name' => 'Unilever',   'image' => 'client-unilever.png'],
            ['name' => 'Pertamina',  'image' => 'client-pertamina.png'],
        ],
    ],

    'quotation' => [
        'title'    => 'Minta Penawaran',
        'subtitle' => 'Dapatkan penawaran terbaik sesuai kebutuhan bisnis Anda.',
        'button'   => 'Ajukan Permintaan',
        'image'    => 'quote-building.jpg',
        'modes'    => ['Udara', 'Laut', 'Darat'],
    ],

    'ai' => [
        'title'      => 'Tanya AI Assistant',
        'subtitle'   => 'Dapatkan jawaban cepat seputar harga, proses pengiriman, jenis layanan, dan informasi lainnya.',
        'bubble'     => 'Ada pertanyaan tentang pengiriman, tarif, atau proses logistik? Saya siap membantu!',
        'button'     => 'Chat Sekarang',
        'greeting'   => 'Halo! Saya AI Assistant GlobalCargo. Tanyakan seputar tarif, proses pengiriman, tracking, atau layanan logistik kami.',
        'fallback'   => 'Maaf, saya belum menemukan jawaban yang pas untuk pertanyaan itu. Coba pilih salah satu pertanyaan di bawah, atau hubungi tim kami lewat WhatsApp.',
        'quick'      => [0, 1, 2, 3],
        'faq' => [
            ['q' => 'Berapa tarif pengiriman?', 'keys' => ['tarif', 'harga', 'biaya', 'ongkos', 'ongkir'],
             'a' => 'Tarif bergantung pada moda pengiriman, asal dan tujuan, serta berat atau volume barang. Isi formulir Minta Penawaran agar tim kami menyiapkan penawaran sesuai kebutuhan Anda.'],
            ['q' => 'Bagaimana cara melacak barang?', 'keys' => ['lacak', 'tracking', 'resi', 'status', 'pantau', 'posisi'],
             'a' => 'Buka halaman Tracking, masukkan nomor resi, lalu tekan Lacak. Status pengiriman ditampilkan dari Diterima, Dalam Proses, Dalam Perjalanan, sampai Tiba.'],
            ['q' => 'Berapa lama waktu pengiriman?', 'keys' => ['lama', 'waktu', 'estimasi', 'sampai', 'durasi', 'hari'],
             'a' => 'Estimasi waktu bergantung pada moda dan tujuan. Udara paling cepat, darat fleksibel dan terjadwal, sedangkan laut paling ekonomis untuk muatan besar. Estimasi pasti diberikan saat penawaran.'],
            ['q' => 'Layanan apa saja yang tersedia?', 'keys' => ['layanan', 'tersedia', 'jasa', 'service', 'apa saja'],
             'a' => 'Kami menyediakan Pengiriman Domestik & Internasional, Freight Forwarding, Customs Clearance, Warehousing & Distribution, E-Commerce Logistics, dan Project Cargo.'],
            ['q' => 'Moda pengiriman apa yang tersedia?', 'keys' => ['moda', 'udara', 'laut', 'darat', 'freight', 'kapal', 'pesawat', 'truk'],
             'a' => 'Tersedia pengiriman Udara (cepat & aman), Laut (ekonomis & kapasitas besar), dan Darat (tepat waktu & fleksibel). Lihat detailnya di halaman Solusi Freight.'],
            ['q' => 'Ke mana saja jangkauan layanan?', 'keys' => ['jangkauan', 'negara', 'wilayah', 'cabang', 'kota', 'pelabuhan', 'cakupan'],
             'a' => 'Jaringan kami mencakup 50+ negara, 200+ kota dan pelabuhan, serta 15 kantor cabang dengan dukungan operasional 24/7.'],
            ['q' => 'Apakah tersedia gudang?', 'keys' => ['gudang', 'warehouse', 'simpan', 'penyimpanan', 'armada'],
             'a' => 'Ya. Kami memiliki 5 gudang strategis dengan total area 50.000 m² dan didukung 250+ unit armada.'],
            ['q' => 'Bagaimana dengan dokumen ekspor impor?', 'keys' => ['dokumen', 'customs', 'bea', 'cukai', 'ekspor', 'impor', 'kepabeanan'],
             'a' => 'Layanan Customs Clearance kami membantu penyiapan dokumen dan proses kepabeanan agar barang lancar melewati perbatasan.'],
            ['q' => 'Jam operasional dan kontak?', 'keys' => ['jam', 'operasional', 'kontak', 'telepon', 'telpon', 'email', 'alamat', 'hubungi'],
             'a' => 'Kantor kami buka Senin - Jumat 08:00 - 17:00. Hubungi +62 21 2987 6543 atau hello@globalcargo.co.id, atau chat lewat WhatsApp.'],
        ],
    ],

    'footer' => [
        'about'  => 'Solusi logistik terintegrasi untuk bisnis Anda, dari Indonesia untuk dunia.',
        'credit' => '© 2026 WEBIA by D-KREASI. Seluruh hak cipta dilindungi.',
        'social' => [
            ['icon' => 'facebook',  'label' => 'Facebook',  'url' => '#'],
            ['icon' => 'instagram', 'label' => 'Instagram', 'url' => '#'],
            ['icon' => 'linkedin',  'label' => 'LinkedIn',  'url' => '#'],
            ['icon' => 'youtube',   'label' => 'YouTube',   'url' => '#'],
        ],
        // Kolom "Navigasi" dan "Informasi" berisi route (tanpa prefix) → label.
        'nav'  => [['home', 'Beranda'], ['services', 'Layanan'], ['freight', 'Solusi Freight'], ['coverage', 'Jangkauan']],
        'info' => [['fleet', 'Armada & Gudang'], ['process', 'Proses Pengiriman'], ['tracking', 'Tracking'], ['clients', 'Klien Korporat'], ['chatbot', 'AI Assistant']],
    ],
];
