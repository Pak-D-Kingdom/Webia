<?php

/*
|--------------------------------------------------------------------------
| Nusa Logistik — Logistics Company (Corporate · Classic Trust)
|--------------------------------------------------------------------------
| Seluruh teks, tautan, dan data tampilan template berada di file ini agar
| view (Blade) tetap bersih. Laravel memuat file ini otomatis, kuncinya:
|
|   config('template.transportation&logistics.corporate.logistics-company-classic-trust.logistics-company')
|
| Catatan integrasi backend (opsional):
|   - tracking.endpoint  : isi URL endpoint GET (?resi=NOMOR) untuk tracking nyata.
|   - contact.whatsapp   : nomor WhatsApp format internasional tanpa tanda "+".
|   - route_prefix       : awalan nama route pada routes/web.php.
*/

return [
    'route_prefix' => 'webia.template.logistics-company.',
    'assets' => [
        'css' => 'css/website-bisnis/template/transportation&logistics/corporate/logistics-company-classic-trust/logistics-company.css',
        'js' => 'js/website-bisnis/template/transportation&logistics/corporate/logistics-company-classic-trust/logistics-company.js',
        'images' => 'images/website-bisnis/template/transportation&logistics/corporate/logistics-company-classic-trust/',
    ],
    'meta' => [
        'title' => 'Nusa Logistik — Connecting Indonesia Worldwide',
        'description' => 'Nusa Logistik, mitra logistik terpercaya: pengiriman darat, laut, udara, kargo khusus, pergudangan, dan distribusi internasional dengan tracking real-time.',
        'theme_color' => '#11304a',
    ],
    'routes' => [
        'home',
        'layanan',
        'opsi-pengiriman',
        'jangkauan',
        'armada-gudang',
        'proses-pengiriman',
        'tracking',
        'klien',
        'penawaran',
        'ai-chatbot',
    ],
    'brand' => [
        'name' => 'Nusa Logistik',
        'upper' => 'NUSA LOGISTIK',
        'tagline' => 'Your Trusted Logistics Partner',
    ],
    'contact' => [
        'city' => 'Jakarta, Indonesia',
        'hours' => 'Senin - Sabtu 08.00 - 17.00',
        'phone' => '+62 21 5012 8888',
        'phone_href' => 'tel:+622150128888',
        'email' => 'info@nusalogistik.co.id',
        'address' => 'Jl. Industri No.88, Jakarta, Indonesia',
        'whatsapp' => '6289563030345',
        'whatsapp_text' => 'Halo Nusa Logistik, saya ingin bertanya tentang layanan pengiriman.',
    ],
    'topbar' => [
        'info' => [
            [
                'icon' => 'i-pin',
                'text' => 'Jakarta, Indonesia',
            ],
            [
                'icon' => 'i-clock',
                'text' => 'Senin - Sabtu 08.00 - 17.00',
            ],
            [
                'icon' => 'i-phone',
                'text' => '+62 21 5012 8888',
                'href' => 'tel:+622150128888',
            ],
            [
                'icon' => 'i-mail',
                'text' => 'info@nusalogistik.co.id',
                'href' => 'mailto:info@nusalogistik.co.id',
            ],
        ],
        'links' => [
            [
                'label' => 'Lacak Pengiriman',
                'route' => 'tracking',
            ],
            [
                'label' => 'Bantuan',
                'route' => 'ai-chatbot',
            ],
        ],
    ],
    'nav' => [
        [
            'label' => 'Beranda',
            'route' => 'home',
        ],
        [
            'label' => 'Layanan',
            'route' => 'layanan',
        ],
        [
            'label' => 'Opsi Pengiriman',
            'route' => 'opsi-pengiriman',
        ],
        [
            'label' => 'Jangkauan',
            'route' => 'jangkauan',
        ],
        [
            'label' => 'Armada & Gudang',
            'route' => 'armada-gudang',
        ],
        [
            'label' => 'Tracking',
            'route' => 'tracking',
        ],
        [
            'label' => 'Klien Kami',
            'route' => 'klien',
        ],
        [
            'label' => 'Tentang Kami',
            'href' => '#tentang-kami',
        ],
        [
            'label' => 'Kontak',
            'href' => '#kontak',
        ],
    ],
    'search_index' => [
        [
            'label' => 'Layanan Logistik',
            'route' => 'layanan',
            'keys' => 'layanan daratan laut udara kargo khusus pergudangan distribusi internasional',
        ],
        [
            'label' => 'Opsi Pengiriman',
            'route' => 'opsi-pengiriman',
            'keys' => 'opsi pengiriman reguler express kargo besar internasional dokumen paket estimasi',
        ],
        [
            'label' => 'Jangkauan Layanan',
            'route' => 'jangkauan',
            'keys' => 'jangkauan area provinsi kota kabupaten peta wilayah',
        ],
        [
            'label' => 'Armada & Gudang',
            'route' => 'armada-gudang',
            'keys' => 'armada gudang truk box wingbox kontainer fasilitas',
        ],
        [
            'label' => 'Proses Pengiriman',
            'route' => 'proses-pengiriman',
            'keys' => 'proses pengiriman pemesanan penjemputan tahap',
        ],
        [
            'label' => 'Tracking Pengiriman',
            'route' => 'tracking',
            'keys' => 'tracking lacak resi status pengiriman',
        ],
        [
            'label' => 'Klien Korporat',
            'route' => 'klien',
            'keys' => 'klien korporat mitra perusahaan',
        ],
        [
            'label' => 'Minta Penawaran',
            'route' => 'penawaran',
            'keys' => 'penawaran tarif harga quotation form',
        ],
        [
            'label' => 'Nusa AI (FAQ Logistik)',
            'route' => 'ai-chatbot',
            'keys' => 'ai chatbot faq bantuan tanya jawab',
        ],
    ],
    'hero' => [
        'eyebrow' => 'SOLUSI LOGISTIK TERPERCAYA',
        'lines' => ['Menghubungkan', 'Bisnis ke Seluruh'],
        'accent' => 'Indonesia dan Dunia',
        'text' => 'Layanan logistik terintegrasi dengan jaringan luas, armada modern, dan teknologi tracking real-time untuk mendukung pertumbuhan bisnis Anda.',
        'primary' => [
            'label' => 'Minta Penawaran',
            'route' => 'penawaran',
        ],
        'secondary' => [
            'label' => 'Lacak Pengiriman',
            'route' => 'tracking',
        ],
        'badges' => [
            [
                'icon' => 'i-truck',
                'title' => 'Pengiriman',
                'text' => 'Cepat & Aman',
            ],
            [
                'icon' => 'i-globe',
                'title' => 'Jangkauan',
                'text' => 'Luas',
            ],
            [
                'icon' => 'i-users',
                'title' => 'Dukungan',
                'text' => 'Profesional',
            ],
        ],
    ],
    'services' => [
        [
            'slug' => 'darat',
            'icon' => 's-truck',
            'title' => 'Daratan',
            'short' => 'Pengiriman dalam kota, antar kota, dan antar pulau.',
            'desc' => 'Pengiriman darat untuk dokumen, paket, hingga muatan penuh dengan armada yang terawat dan jadwal yang terukur.',
            'features' => [
                'Pengiriman dalam kota, antar kota, dan antar pulau',
                'Truk box dan wingbox berbagai kapasitas',
                'Penjemputan dan pengantaran sesuai jadwal',
                'Pemantauan status melalui nomor resi',
            ],
        ],
        [
            'slug' => 'laut',
            'icon' => 's-ship',
            'title' => 'Laut',
            'short' => 'Solusi kargo untuk pengiriman besar.',
            'desc' => 'Pilihan hemat untuk volume besar dan kargo kontainer, dengan jalur dan jadwal pelayaran yang dikelola tim kami.',
            'features' => [
                'Kargo kontainer untuk pengiriman skala besar',
                'Pengiriman antar pulau dengan jadwal terencana',
                'Koordinasi pelabuhan dan penanganan muatan',
                'Cocok untuk distribusi volume besar',
            ],
        ],
        [
            'slug' => 'udara',
            'icon' => 's-plane',
            'title' => 'Udara',
            'short' => 'Pengiriman cepat dengan prioritas.',
            'desc' => 'Untuk barang yang harus tiba lebih cepat, kami mengatur pengiriman udara dengan prioritas penanganan.',
            'features' => [
                'Prioritas penanganan untuk barang mendesak',
                'Cocok untuk dokumen dan paket bernilai waktu',
                'Koordinasi bandara asal dan tujuan',
                'Status pengiriman dapat dipantau',
            ],
        ],
        [
            'slug' => 'kargo-khusus',
            'icon' => 's-cargo',
            'title' => 'Kargo Khusus',
            'short' => 'Barang proyek, alat berat, dan barang berharga.',
            'desc' => 'Penanganan khusus untuk muatan yang tidak biasa: barang proyek, alat berat, dan barang berharga.',
            'features' => [
                'Barang proyek dan alat berat',
                'Penanganan barang berharga',
                'Perencanaan rute dan armada sesuai kebutuhan',
                'Konsultasi teknis sebelum pengiriman',
            ],
        ],
        [
            'slug' => 'pergudangan',
            'icon' => 's-warehouse',
            'title' => 'Pergudangan',
            'short' => 'Penyimpanan aman dan terintegrasi.',
            'desc' => 'Gudang modern untuk penyimpanan dan distribusi, terhubung langsung dengan layanan pengiriman kami.',
            'features' => [
                'Penyimpanan aman dan terintegrasi',
                'Penerimaan, penataan, dan pengeluaran barang',
                'Terhubung dengan jaringan pengiriman',
                'Cocok untuk kebutuhan distribusi rutin',
            ],
        ],
        [
            'slug' => 'internasional',
            'icon' => 's-globe',
            'title' => 'Distribusi Internasional',
            'short' => 'Jangkauan global dengan mitra terpercaya.',
            'desc' => 'Kirim ke Asia, Eropa, Amerika, dan negara lainnya melalui jaringan mitra yang kami percaya.',
            'features' => [
                'Tujuan Asia, Eropa, Amerika, dan lainnya',
                'Dukungan dokumen pengiriman lintas negara',
                'Pilihan jalur udara dan laut',
                'Pendampingan oleh tim profesional',
            ],
        ],
    ],
    'freight' => [
        'title' => 'Opsi Pengiriman',
        'subtitle' => 'Pilih layanan sesuai kebutuhan bisnis Anda.',
        'note' => 'Estimasi waktu bersifat perkiraan dan dapat berbeda sesuai rute, jadwal, dan kondisi lapangan.',
        'tabs' => [
            [
                'key' => 'reguler',
                'label' => 'Reguler',
                'summary' => 'Pengiriman terjadwal untuk kebutuhan harian dengan biaya yang efisien.',
                'items' => [
                    [
                        'icon' => 'i-doc',
                        'name' => 'Dokumen',
                        'eta' => '1 - 2 hari',
                        'note' => 'Surat, kontrak, dan berkas penting.',
                    ],
                    [
                        'icon' => 'i-box',
                        'name' => 'Paket Kecil (≤ 5 kg)',
                        'eta' => '1 - 3 hari',
                        'note' => 'Barang ringan untuk pelanggan atau cabang.',
                    ],
                    [
                        'icon' => 'i-box',
                        'name' => 'Paket Menengah (5 - 50 kg)',
                        'eta' => '2 - 4 hari',
                        'note' => 'Stok toko, suku cadang, dan perlengkapan.',
                    ],
                    [
                        'icon' => 'i-box',
                        'name' => 'Paket Besar (50 - 500 kg)',
                        'eta' => '3 - 7 hari',
                        'note' => 'Barang berukuran besar atau dalam jumlah banyak.',
                    ],
                    [
                        'icon' => 'i-cargo',
                        'name' => 'Kargo Proyek / Alat Berat',
                        'eta' => 'Sesuai kebutuhan',
                        'note' => 'Direncanakan bersama tim kami.',
                    ],
                ],
            ],
            [
                'key' => 'express',
                'label' => 'Express',
                'summary' => 'Prioritas penanganan untuk barang yang harus tiba lebih cepat.',
                'items' => [
                    [
                        'icon' => 'i-doc',
                        'name' => 'Dokumen Express',
                        'eta' => 'Hari yang sama',
                        'note' => 'Tergantung rute dan jam pengambilan.',
                    ],
                    [
                        'icon' => 'i-box',
                        'name' => 'Paket Kecil (≤ 5 kg)',
                        'eta' => '1 hari',
                        'note' => 'Prioritas untuk barang mendesak.',
                    ],
                    [
                        'icon' => 'i-box',
                        'name' => 'Paket Menengah (5 - 50 kg)',
                        'eta' => '1 - 2 hari',
                        'note' => 'Penanganan prioritas dari asal ke tujuan.',
                    ],
                    [
                        'icon' => 'i-box',
                        'name' => 'Paket Besar (50 - 500 kg)',
                        'eta' => '2 - 3 hari',
                        'note' => 'Armada dan jadwal prioritas.',
                    ],
                    [
                        'icon' => 'i-cargo',
                        'name' => 'Kargo Proyek / Alat Berat',
                        'eta' => 'Sesuai kebutuhan',
                        'note' => 'Direncanakan bersama tim kami.',
                    ],
                ],
            ],
            [
                'key' => 'kargo-besar',
                'label' => 'Kargo Besar',
                'summary' => 'Untuk volume besar dan muatan berukuran besar melalui darat maupun laut.',
                'items' => [
                    [
                        'icon' => 'i-box',
                        'name' => 'Muatan Penuh Truk (FTL)',
                        'eta' => '2 - 5 hari',
                        'note' => 'Satu armada khusus untuk muatan Anda.',
                    ],
                    [
                        'icon' => 'i-box',
                        'name' => 'Konsolidasi Muatan (LCL)',
                        'eta' => '5 - 10 hari',
                        'note' => 'Berbagi ruang kontainer untuk volume menengah.',
                    ],
                    [
                        'icon' => 'i-box',
                        'name' => 'Kontainer 20 ft / 40 ft',
                        'eta' => 'Sesuai jadwal kapal',
                        'note' => 'Kargo kontainer skala besar.',
                    ],
                    [
                        'icon' => 'i-cargo',
                        'name' => 'Alat Berat / Barang Proyek',
                        'eta' => 'Sesuai kebutuhan',
                        'note' => 'Perencanaan rute dan armada khusus.',
                    ],
                    [
                        'icon' => 'i-doc',
                        'name' => 'Distribusi Rutin Antar Gudang',
                        'eta' => 'Sesuai jadwal',
                        'note' => 'Terhubung dengan layanan pergudangan.',
                    ],
                ],
            ],
            [
                'key' => 'internasional',
                'label' => 'Internasional',
                'summary' => 'Pengiriman lintas negara ke Asia, Eropa, Amerika, dan tujuan lainnya.',
                'items' => [
                    [
                        'icon' => 'i-doc',
                        'name' => 'Dokumen Internasional',
                        'eta' => '3 - 5 hari',
                        'note' => 'Jalur udara dengan mitra terpercaya.',
                    ],
                    [
                        'icon' => 'i-box',
                        'name' => 'Paket Udara',
                        'eta' => '4 - 7 hari',
                        'note' => 'Untuk paket dan sampel produk.',
                    ],
                    [
                        'icon' => 'i-box',
                        'name' => 'Kargo Laut (LCL)',
                        'eta' => '14 - 30 hari',
                        'note' => 'Pilihan hemat untuk volume menengah.',
                    ],
                    [
                        'icon' => 'i-box',
                        'name' => 'Kontainer Penuh (FCL)',
                        'eta' => 'Sesuai jadwal kapal',
                        'note' => 'Untuk volume besar ke negara tujuan.',
                    ],
                    [
                        'icon' => 'i-cargo',
                        'name' => 'Kargo Proyek Internasional',
                        'eta' => 'Sesuai kebutuhan',
                        'note' => 'Direncanakan bersama tim kami.',
                    ],
                ],
            ],
        ],
    ],
    'coverage' => [
        'title' => 'Jangkauan Layanan',
        'subtitle' => 'Kami melayani pengiriman ke seluruh Indonesia dan berbagai negara tujuan.',
        'stats' => [
            [
                'icon' => 'i-pin-shield',
                'value' => '34',
                'label' => 'Provinsi di Indonesia',
            ],
            [
                'icon' => 'i-pins',
                'value' => '200+',
                'label' => 'Kota & Kabupaten',
            ],
            [
                'icon' => 'i-globe-pin',
                'value' => 'Internasional',
                'label' => 'Asia, Eropa, Amerika dan lainnya',
            ],
        ],
        'pins' => [
            [
                'x' => 11.9,
                'y' => 41.4,
                'label' => 'Sumatra Utara',
            ],
            [
                'x' => 16.5,
                'y' => 68.2,
                'label' => 'Sumatra Barat',
            ],
            [
                'x' => 44.7,
                'y' => 74.4,
                'label' => 'Sulawesi Selatan',
            ],
            [
                'x' => 47.8,
                'y' => 58.3,
                'label' => 'Sulawesi Tenggara',
            ],
            [
                'x' => 63.9,
                'y' => 27.1,
                'label' => 'Maluku Utara',
            ],
            [
                'x' => 73.9,
                'y' => 33.6,
                'label' => 'Papua Barat',
            ],
        ],
        'regions' => [
            [
                'name' => 'Sumatra',
                'text' => 'Dari Aceh hingga Lampung, melayani kota besar dan jalur lintas pulau.',
            ],
            [
                'name' => 'Jawa',
                'text' => 'Pusat distribusi dengan frekuensi pengiriman tertinggi dan jaringan armada terpadat.',
            ],
            [
                'name' => 'Bali & Nusa Tenggara',
                'text' => 'Pengiriman terjadwal melalui jalur darat dan laut antar pulau.',
            ],
            [
                'name' => 'Kalimantan',
                'text' => 'Menghubungkan kota-kota utama dan kawasan industri di seluruh Kalimantan.',
            ],
            [
                'name' => 'Sulawesi',
                'text' => 'Jaringan pengiriman dari Makassar hingga wilayah utara dan tenggara.',
            ],
            [
                'name' => 'Maluku & Papua',
                'text' => 'Jangkauan kawasan timur Indonesia dengan jadwal dan rute yang direncanakan.',
            ],
        ],
        'international' => [
            'name' => 'Internasional',
            'text' => 'Tujuan Asia, Eropa, Amerika, dan negara lainnya melalui mitra terpercaya.',
        ],
    ],
    'fleet' => [
        'title' => 'Armada & Gudang',
        'subtitle' => 'Didukung armada modern dan fasilitas gudang yang aman.',
        'items' => [
            [
                'slug' => 'truk',
                'img' => 'fleet-truk.jpg',
                'title' => 'Truk Box & Wingbox',
                'text' => 'Berbagai ukuran kapasitas',
                'detail' => 'Armada truk box dan wingbox dengan berbagai ukuran kapasitas untuk pengiriman dalam kota, antar kota, dan antar pulau.',
                'points' => [
                    'Berbagai ukuran kapasitas',
                    'Cocok untuk muatan palet dan barang curah',
                    'Dirawat dan diperiksa secara berkala',
                    'Dikemudikan pengemudi berpengalaman',
                ],
            ],
            [
                'slug' => 'gudang',
                'img' => 'fleet-gudang.jpg',
                'title' => 'Gudang Modern',
                'text' => 'Aman dan terintegrasi',
                'detail' => 'Fasilitas penyimpanan yang rapi, aman, dan terhubung dengan jaringan pengiriman kami.',
                'points' => [
                    'Penyimpanan aman dan terintegrasi',
                    'Rak palet dan area bongkar muat luas',
                    'Pencatatan keluar-masuk barang',
                    'Mendukung distribusi rutin',
                ],
            ],
            [
                'slug' => 'kontainer',
                'img' => 'fleet-kontainer.jpg',
                'title' => 'Kargo Kontainer',
                'text' => 'Untuk pengiriman skala besar',
                'detail' => 'Penanganan kontainer untuk pengiriman skala besar, dari pelabuhan asal hingga tujuan akhir.',
                'points' => [
                    'Untuk pengiriman skala besar',
                    'Penanganan di area kontainer',
                    'Terhubung dengan jalur darat dan laut',
                    'Koordinasi jadwal oleh tim kami',
                ],
            ],
        ],
    ],
    'process' => [
        'title' => 'Proses Pengiriman',
        'subtitle' => 'Mudah, transparan, dan terpantau di setiap tahap.',
        'steps' => [
            [
                'icon' => 'i-clipboard',
                'title' => 'Pemesanan',
                'text' => 'Isi form atau hubungi tim kami',
                'detail' => 'Sampaikan kebutuhan Anda: jenis barang, perkiraan berat atau volume, serta asal dan tujuan. Tim kami akan merespons dengan penawaran dan jadwal.',
            ],
            [
                'icon' => 'i-truck-box',
                'title' => 'Penjemputan',
                'text' => 'Barang dijemput sesuai jadwal',
                'detail' => 'Armada kami menjemput barang di lokasi Anda sesuai jadwal yang disepakati. Pastikan barang sudah dikemas dengan aman.',
            ],
            [
                'icon' => 'i-van',
                'title' => 'Proses Pengiriman',
                'text' => 'Dikirim melalui jalur terbaik',
                'detail' => 'Barang dikirim melalui jalur darat, laut, atau udara yang paling sesuai dengan kebutuhan dan tujuan Anda.',
            ],
            [
                'icon' => 'i-search',
                'title' => 'Tracking',
                'text' => 'Pantau status secara real-time',
                'detail' => 'Gunakan nomor resi untuk memantau posisi dan status pengiriman kapan saja melalui halaman Tracking.',
            ],
            [
                'icon' => 'i-check-box',
                'title' => 'Sampai Tujuan',
                'text' => 'Barang diterima dengan aman',
                'detail' => 'Barang tiba di alamat tujuan dan diterima oleh penerima. Hubungi kami bila ada kendala pada saat penerimaan.',
            ],
        ],
    ],
    'tracking' => [
        'title' => 'Tracking Pengiriman',
        'subtitle' => 'Pantau status pengiriman Anda secara real-time.',
        'placeholder' => 'Masukkan nomor resi / tracking',
        'button' => 'Lacak',
        'endpoint' => null,
        'steps' => [
            [
                'icon' => 'i-box-in',
                'label' => 'Diterima',
            ],
            [
                'icon' => 'i-gear-box',
                'label' => 'Dalam Proses',
            ],
            [
                'icon' => 'i-truck-pin',
                'label' => 'Dalam Perjalanan',
            ],
            [
                'icon' => 'i-flag',
                'label' => 'Sampai Tujuan',
            ],
        ],
        'demo' => [
            'NL2026001234' => [
                'step' => 3,
                'service' => 'Reguler - Paket Menengah',
                'origin' => 'Jakarta',
                'destination' => 'Surabaya',
                'eta' => '2 - 4 hari',
                'history' => [
                    [
                        'time' => '27 Okt 2026, 09.10',
                        'title' => 'Barang diterima di gudang asal',
                        'location' => 'Jakarta',
                    ],
                    [
                        'time' => '27 Okt 2026, 15.40',
                        'title' => 'Barang diproses dan dimuat ke armada',
                        'location' => 'Jakarta',
                    ],
                    [
                        'time' => '28 Okt 2026, 06.25',
                        'title' => 'Dalam perjalanan menuju kota tujuan',
                        'location' => 'Semarang',
                    ],
                ],
            ],
            'NL2026005678' => [
                'step' => 4,
                'service' => 'Express - Dokumen',
                'origin' => 'Bandung',
                'destination' => 'Jakarta',
                'eta' => 'Hari yang sama',
                'history' => [
                    [
                        'time' => '26 Okt 2026, 10.00',
                        'title' => 'Dokumen diterima',
                        'location' => 'Bandung',
                    ],
                    [
                        'time' => '26 Okt 2026, 13.30',
                        'title' => 'Dalam perjalanan',
                        'location' => 'Cikampek',
                    ],
                    [
                        'time' => '26 Okt 2026, 16.45',
                        'title' => 'Dokumen diterima oleh penerima',
                        'location' => 'Jakarta',
                    ],
                ],
            ],
        ],
    ],
    'clients' => [
        'title' => 'Klien Korporat Kami',
        'subtitle' => 'Dipercaya oleh berbagai perusahaan dari berbagai industri.',
        'items' => [
            [
                'name' => 'Unilever',
                'img' => 'klien-unilever.png',
            ],
            [
                'name' => 'Indofood',
                'img' => 'klien-indofood.png',
            ],
            [
                'name' => 'Pertamina',
                'img' => 'klien-pertamina.png',
            ],
            [
                'name' => 'Mayora',
                'img' => 'klien-mayora.png',
            ],
            [
                'name' => 'Astra',
                'img' => 'klien-astra.png',
            ],
            [
                'name' => 'Tokopedia',
                'img' => 'klien-tokopedia.png',
            ],
            [
                'name' => 'Bukalapak',
                'img' => 'klien-bukalapak.png',
            ],
            [
                'name' => 'Djarum',
                'img' => 'klien-djarum.png',
            ],
        ],
    ],
    'ai' => [
        'title' => 'Halo! Saya Nusa AI',
        'text' => 'Asisten virtual untuk menjawab pertanyaan seputar pengiriman, tarif, estimasi waktu, dan layanan logistik kami.',
        'button' => 'Tanya Sekarang',
        'suggestions' => [
            [
                'text' => 'Berapa tarif pengiriman?',
                'icon' => 'i-doc',
            ],
            [
                'text' => 'Berapa lama estimasi sampai?',
                'icon' => 'i-clock',
            ],
            [
                'text' => 'Area pengiriman kemana saja?',
                'icon' => 'i-pin',
            ],
            [
                'text' => 'Jenis barang apa yang bisa dikirim?',
                'icon' => 'i-box',
            ],
        ],
    ],
    'quote_card' => [
        'title' => 'Minta Penawaran',
        'text' => 'Dapatkan penawaran terbaik sesuai kebutuhan pengiriman Anda.',
        'button' => 'Isi Form Penawaran',
    ],
    'quotation' => [
        'title' => 'Minta Penawaran',
        'subtitle' => 'Ceritakan kebutuhan pengiriman Anda. Kami akan menyiapkan penawaran yang sesuai.',
        'services' => ['Daratan', 'Laut', 'Udara', 'Kargo Khusus', 'Pergudangan', 'Distribusi Internasional'],
        'cargo_types' => [
            'Dokumen',
            'Paket Kecil (≤ 5 kg)',
            'Paket Menengah (5 - 50 kg)',
            'Paket Besar (50 - 500 kg)',
            'Kargo Kontainer',
            'Kargo Proyek / Alat Berat',
            'Barang Berharga',
        ],
        'steps' => [
            [
                'title' => 'Form dikirim',
                'text' => 'Detail Anda diteruskan ke tim kami melalui WhatsApp.',
            ],
            [
                'title' => 'Tim kami menghubungi',
                'text' => 'Kami mengonfirmasi kebutuhan dan menyiapkan penawaran.',
            ],
            [
                'title' => 'Pengiriman dijadwalkan',
                'text' => 'Setelah setuju, penjemputan diatur sesuai jadwal.',
            ],
        ],
    ],
    'footer' => [
        'about' => 'Solusi logistik terpercaya untuk mendukung pengiriman bisnis Anda di Indonesia dan seluruh dunia.',
        'nav' => [
            [
                'label' => 'Beranda',
                'route' => 'home',
            ],
            [
                'label' => 'Layanan',
                'route' => 'layanan',
            ],
            [
                'label' => 'Opsi Pengiriman',
                'route' => 'opsi-pengiriman',
            ],
            [
                'label' => 'Jangkauan',
                'route' => 'jangkauan',
            ],
            [
                'label' => 'Armada & Gudang',
                'route' => 'armada-gudang',
            ],
        ],
        'info' => [
            [
                'label' => 'Tentang Kami',
                'href' => '#tentang-kami',
            ],
            [
                'label' => 'Karir',
                'wa' => 'Halo Nusa Logistik, saya ingin menanyakan informasi karir.',
            ],
            [
                'label' => 'Berita',
                'wa' => 'Halo Nusa Logistik, saya ingin menanyakan informasi terbaru dari perusahaan.',
            ],
            [
                'label' => 'FAQ',
                'route' => 'ai-chatbot',
            ],
            [
                'label' => 'Kontak',
                'href' => '#kontak',
            ],
        ],
        'popular' => [
            [
                'label' => 'Pengiriman Darat',
                'route' => 'layanan',
                'hash' => 'darat',
            ],
            [
                'label' => 'Pengiriman Laut',
                'route' => 'layanan',
                'hash' => 'laut',
            ],
            [
                'label' => 'Pengiriman Udara',
                'route' => 'layanan',
                'hash' => 'udara',
            ],
            [
                'label' => 'Kargo Khusus',
                'route' => 'layanan',
                'hash' => 'kargo-khusus',
            ],
            [
                'label' => 'Pergudangan',
                'route' => 'layanan',
                'hash' => 'pergudangan',
            ],
        ],
        'social' => [
            [
                'name' => 'Facebook',
                'icon' => 'i-facebook',
                'href' => '#',
            ],
            [
                'name' => 'Instagram',
                'icon' => 'i-instagram',
                'href' => '#',
            ],
            [
                'name' => 'LinkedIn',
                'icon' => 'i-linkedin',
                'href' => '#',
            ],
            [
                'name' => 'YouTube',
                'icon' => 'i-youtube',
                'href' => '#',
            ],
        ],
        'copyright' => '© 2026 Nusa Logistik. Semua hak cipta dilindungi.',
        'legal' => ['Syarat & Ketentuan', 'Kebijakan Privasi', 'Peta Situs'],
        'credit' => '© 2026 WEBIA by D-KREASI. Seluruh hak cipta dilindungi.',
    ],
    'pages' => [
        'layanan' => [
            'title' => 'Layanan Logistik',
            'text' => 'Solusi pengiriman terintegrasi untuk setiap kebutuhan bisnis Anda: darat, laut, udara, kargo khusus, pergudangan, dan distribusi internasional.',
            'pos' => '28% 50%',
        ],
        'opsi-pengiriman' => [
            'title' => 'Opsi Pengiriman',
            'text' => 'Pilih jenis pengiriman, ukuran, dan estimasi waktu yang paling sesuai dengan kebutuhan bisnis Anda.',
            'pos' => '82% 40%',
        ],
        'jangkauan' => [
            'title' => 'Jangkauan Layanan',
            'text' => 'Jaringan kami melayani seluruh Indonesia dan berbagai negara tujuan.',
            'pos' => '66% 60%',
        ],
        'armada-gudang' => [
            'title' => 'Armada & Gudang',
            'text' => 'Didukung armada modern dan fasilitas gudang yang aman dan terintegrasi.',
            'pos' => '34% 70%',
        ],
        'proses-pengiriman' => [
            'title' => 'Proses Pengiriman',
            'text' => 'Lima tahap yang mudah, transparan, dan terpantau dari pemesanan sampai barang tiba.',
            'pos' => '50% 55%',
        ],
        'tracking' => [
            'title' => 'Tracking Pengiriman',
            'text' => 'Masukkan nomor resi untuk memantau status pengiriman Anda secara real-time.',
            'pos' => '90% 35%',
        ],
        'klien' => [
            'title' => 'Klien Korporat Kami',
            'text' => 'Dipercaya oleh berbagai perusahaan dari berbagai industri.',
            'pos' => '100% 60%',
        ],
        'penawaran' => [
            'title' => 'Minta Penawaran',
            'text' => 'Dapatkan penawaran terbaik sesuai kebutuhan pengiriman Anda.',
            'pos' => '40% 80%',
        ],
        'ai-chatbot' => [
            'title' => 'Nusa AI',
            'text' => 'Asisten virtual seputar pengiriman dan logistik. Tanyakan tarif, estimasi, area layanan, dan lainnya.',
            'pos' => '58% 30%',
        ],
    ],
    'chatbot' => [
        'name' => 'Nusa AI',
        'status' => 'Asisten logistik · Online',
        'greeting' => 'Halo! Saya Nusa AI. Saya bisa membantu menjawab pertanyaan seputar pengiriman, tarif, estimasi waktu, dan layanan logistik kami.',
        'placeholder' => 'Tulis pertanyaan Anda…',
        'disclaimer' => 'Jawaban bersifat informasi umum. Untuk tarif pasti, hubungi tim kami.',
        'fallback' => 'Maaf, saya belum menemukan jawaban yang pas. Coba tanyakan seputar tarif, estimasi, area pengiriman, jenis barang, atau tracking — atau hubungi tim kami langsung.',
        'faqs' => [
            [
                'id' => 'tarif',
                'q' => 'Berapa tarif pengiriman?',
                'keywords' => ['tarif', 'harga', 'biaya', 'ongkir', 'ongkos', 'berapa bayar', 'quotation', 'penawaran'],
                'a' => 'Tarif ditentukan oleh jenis layanan, berat atau volume barang, serta asal dan tujuan pengiriman. Untuk tarif yang akurat, isi form penawaran dan tim kami akan menyiapkan penawaran sesuai kebutuhan Anda.',
                'actions' => [
                    [
                        'label' => 'Minta Penawaran',
                        'route' => 'penawaran',
                    ],
                ],
            ],
            [
                'id' => 'estimasi',
                'q' => 'Berapa lama estimasi sampai?',
                'keywords' => ['estimasi', 'lama', 'berapa hari', 'sampai', 'waktu', 'durasi', 'cepat', 'kapan'],
                'a' => 'Untuk layanan reguler: dokumen 1 - 2 hari, paket kecil (≤ 5 kg) 1 - 3 hari, paket menengah (5 - 50 kg) 2 - 4 hari, dan paket besar (50 - 500 kg) 3 - 7 hari. Kargo proyek atau alat berat menyesuaikan kebutuhan. Estimasi dapat berbeda sesuai rute dan kondisi lapangan.',
                'actions' => [
                    [
                        'label' => 'Lihat Opsi Pengiriman',
                        'route' => 'opsi-pengiriman',
                    ],
                ],
            ],
            [
                'id' => 'area',
                'q' => 'Area pengiriman kemana saja?',
                'keywords' => ['area', 'wilayah', 'jangkauan', 'kemana', 'kota', 'provinsi', 'kabupaten', 'pulau', 'cakupan'],
                'a' => 'Kami melayani pengiriman ke 34 provinsi dan 200+ kota & kabupaten di Indonesia, serta tujuan internasional ke Asia, Eropa, Amerika, dan negara lainnya.',
                'actions' => [
                    [
                        'label' => 'Lihat Jangkauan',
                        'route' => 'jangkauan',
                    ],
                ],
            ],
            [
                'id' => 'barang',
                'q' => 'Jenis barang apa yang bisa dikirim?',
                'keywords' => ['barang', 'jenis', 'apa saja', 'bisa dikirim', 'dilarang', 'terlarang', 'boleh', 'muatan'],
                'a' => 'Kami mengirim dokumen, paket kecil hingga besar, kargo kontainer, barang proyek, alat berat, dan barang berharga. Barang berbahaya atau terlarang tidak dapat dikirim. Bila ragu, tanyakan kepada tim kami sebelum pengiriman.',
                'actions' => [
                    [
                        'label' => 'Lihat Layanan',
                        'route' => 'layanan',
                    ],
                ],
            ],
            [
                'id' => 'tracking',
                'q' => 'Bagaimana cara melacak pengiriman?',
                'keywords' => ['lacak', 'tracking', 'resi', 'status', 'posisi', 'cek pengiriman', 'awb'],
                'a' => 'Masukkan nomor resi Anda di halaman Tracking untuk melihat status pengiriman: Diterima, Dalam Proses, Dalam Perjalanan, hingga Sampai Tujuan.',
                'actions' => [
                    [
                        'label' => 'Lacak Pengiriman',
                        'route' => 'tracking',
                    ],
                ],
            ],
            [
                'id' => 'jemput',
                'q' => 'Bagaimana barang dijemput?',
                'keywords' => ['jemput', 'penjemputan', 'pickup', 'pick up', 'ambil barang', 'pesan', 'pemesanan', 'order', 'cara kirim'],
                'a' => 'Isi form penawaran atau hubungi tim kami. Setelah kebutuhan dikonfirmasi, barang dijemput sesuai jadwal yang disepakati lalu dikirim melalui jalur terbaik.',
                'actions' => [
                    [
                        'label' => 'Lihat Proses Pengiriman',
                        'route' => 'proses-pengiriman',
                    ],
                ],
            ],
            [
                'id' => 'gudang',
                'q' => 'Apakah ada layanan pergudangan?',
                'keywords' => ['gudang', 'pergudangan', 'simpan', 'penyimpanan', 'warehouse', 'stok'],
                'a' => 'Ya. Fasilitas gudang modern kami menyediakan penyimpanan yang aman dan terintegrasi dengan jaringan pengiriman untuk kebutuhan distribusi Anda.',
                'actions' => [
                    [
                        'label' => 'Lihat Armada & Gudang',
                        'route' => 'armada-gudang',
                    ],
                ],
            ],
            [
                'id' => 'internasional',
                'q' => 'Apakah bisa kirim ke luar negeri?',
                'keywords' => ['internasional', 'luar negeri', 'ekspor', 'impor', 'global', 'asia', 'eropa', 'amerika', 'negara'],
                'a' => 'Bisa. Layanan distribusi internasional kami menjangkau Asia, Eropa, Amerika, dan negara lainnya melalui mitra terpercaya. Hubungi tim kami untuk dokumen dan jadwal pengiriman.',
                'actions' => [
                    [
                        'label' => 'Minta Penawaran',
                        'route' => 'penawaran',
                    ],
                ],
            ],
            [
                'id' => 'khusus',
                'q' => 'Apakah bisa kirim alat berat atau barang proyek?',
                'keywords' => ['alat berat', 'proyek', 'kargo khusus', 'berharga', 'mesin', 'excavator', 'oversize'],
                'a' => 'Bisa. Layanan kargo khusus kami menangani barang proyek, alat berat, dan barang berharga. Rute dan armada direncanakan bersama tim kami sesuai kebutuhan.',
                'actions' => [
                    [
                        'label' => 'Minta Penawaran',
                        'route' => 'penawaran',
                    ],
                ],
            ],
            [
                'id' => 'kontak',
                'q' => 'Bagaimana cara menghubungi Nusa Logistik?',
                'keywords' => ['kontak', 'hubungi', 'telepon', 'telp', 'email', 'whatsapp', 'wa', 'alamat', 'jam operasional', 'jam buka', 'buka', 'tutup', 'lokasi'],
                'a' => 'Kami melayani Senin - Sabtu pukul 08.00 - 17.00. Hubungi +62 21 5012 8888 atau info@nusalogistik.co.id, atau chat langsung melalui WhatsApp. Kantor kami di Jl. Industri No.88, Jakarta.',
                'actions' => [],
            ],
            [
                'id' => 'kemasan',
                'q' => 'Bagaimana cara mengemas barang?',
                'keywords' => ['kemas', 'packing', 'bungkus', 'asuransi', 'rusak', 'aman', 'perlindungan', 'pecah'],
                'a' => 'Kemas barang dengan material yang kuat dan sesuai jenisnya, serta beri label alamat yang jelas. Untuk barang berharga atau mudah pecah, tanyakan opsi perlindungan tambahan kepada tim kami saat meminta penawaran.',
                'actions' => [
                    [
                        'label' => 'Minta Penawaran',
                        'route' => 'penawaran',
                    ],
                ],
            ],
        ],
        'greetings' => ['halo', 'hai', 'hi', 'hello', 'selamat pagi', 'selamat siang', 'selamat sore', 'selamat malam', 'pagi', 'siang', 'sore', 'malam', 'permisi'],
        'thanks' => ['terima kasih', 'makasih', 'thanks', 'thank you', 'trims'],
    ],
];
