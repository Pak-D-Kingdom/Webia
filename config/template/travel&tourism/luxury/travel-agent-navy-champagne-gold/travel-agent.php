<?php

/**
 * GrandJourney — Luxury Travel & Tour (Navy Champagne Gold)
 * Data statis frontend. Tidak ada query / model: backend dapat mengganti isi
 * array ini dengan data dinamis tanpa mengubah struktur view.
 */
return [

    'brand' => [
        'name'             => 'GrandJourney',
        'tagline'          => 'Luxury Travel & Tour',
        'phone'            => '+62 21 1234 5678',
        'email'            => 'info@grandjourney.id',
        'location'         => 'Jakarta, Indonesia',
        'whatsapp'         => '62895630300345',
        'whatsapp_display' => '0895630300345',
        'credit'           => '© 2026 WEBIA by D-KREASI. Seluruh hak cipta dilindungi.',
    ],

    // key = nama halaman (juga dipakai untuk status "active" di navbar)
    'nav' => [
        ['key' => 'beranda',   'label' => 'Beranda',               'path' => ''],
        ['key' => 'destinasi', 'label' => 'Destinasi',             'path' => 'destinasi'],
        ['key' => 'paket',     'label' => 'Paket Tour',            'path' => 'paket'],
        ['key' => 'itinerary', 'label' => 'Itinerary',             'path' => 'itinerary'],
        ['key' => 'harga',     'label' => 'Harga',                 'path' => 'harga'],
        ['key' => 'jadwal',    'label' => 'Jadwal Keberangkatan',  'path' => 'jadwal'],
        ['key' => 'galeri',    'label' => 'Galeri',                'path' => 'galeri'],
        ['key' => 'testimoni', 'label' => 'Testimoni',             'path' => 'testimoni'],
    ],

    'hero' => [
        'eyebrow'   => 'Jelajahi dunia dengan kenangan tak terlupakan',
        'title'     => 'Perjalanan Mewah untuk',
        'title_gold'=> 'Pengalaman Luar Biasa',
        'text'      => 'Temukan destinasi impian Anda bersama GrandJourney. Layanan premium, perjalanan eksklusif, dan pengalaman tak terlupakan di setiap langkah.',
        'script'    => 'More Than Just a Trip',
        'video_url' => '', // isi URL video promosi; jika kosong tombol mengarah ke Galeri
        'image'     => 'hero.jpg',
        'badges'    => [
            ['icon' => 'compass', 'text' => 'Travel Tailored For You'],
            ['icon' => 'crown',   'text' => 'Premium Service'],
            ['icon' => 'shield',  'text' => 'Trusted Experience'],
        ],
    ],

    'destinations' => [
        ['slug' => 'bali', 'name' => 'Bali', 'country' => 'Indonesia', 'region' => 'Indonesia', 'image' => 'dest-bali.jpg',
         'tag' => 'Pantai & Budaya', 'best_time' => 'Apr – Okt',
         'desc' => 'Pura di tepi danau, sawah berundak Ubud, dan sunset Uluwatu dengan layanan villa privat.',
         'highlights' => ['Ubud & Kintamani', 'Uluwatu Sunset', 'Nusa Penida'], 'from' => 8750000],
        ['slug' => 'tokyo', 'name' => 'Tokyo', 'country' => 'Jepang', 'region' => 'Asia', 'image' => 'dest-tokyo.jpg',
         'tag' => 'Kota & Sakura', 'best_time' => 'Mar – Apr, Nov',
         'desc' => 'Pagoda merah, musim sakura, dan kuliner kelas dunia dari Asakusa hingga Hakone.',
         'highlights' => ['Asakusa & Shibuya', 'Gunung Fuji', 'Kyoto & Nara'], 'from' => 18900000],
        ['slug' => 'santorini', 'name' => 'Santorini', 'country' => 'Yunani', 'region' => 'Eropa', 'image' => 'dest-santorini.jpg',
         'tag' => 'Romantis', 'best_time' => 'Mei – Okt',
         'desc' => 'Kubah biru, rumah putih di tebing kaldera, dan makan malam saat matahari tenggelam.',
         'highlights' => ['Oia Sunset', 'Fira', 'Wine Tasting'], 'from' => 24500000],
        ['slug' => 'swiss', 'name' => 'Swiss', 'country' => 'Eropa', 'region' => 'Eropa', 'image' => 'dest-swiss.jpg',
         'tag' => 'Pegunungan Alpen', 'best_time' => 'Jun – Sep, Des – Mar',
         'desc' => 'Danau sebening kristal, kereta panorama, dan puncak salju Alpen.',
         'highlights' => ['Jungfraujoch', 'Lucerne', 'Zermatt'], 'from' => 32500000],
        ['slug' => 'maldives', 'name' => 'Maldives', 'country' => 'Maladewa', 'region' => 'Asia', 'image' => 'dest-maldives.jpg',
         'tag' => 'Pulau Privat', 'best_time' => 'Nov – Apr',
         'desc' => 'Water villa di atas laguna toska, snorkeling bersama pari manta, dan spa tepi laut.',
         'highlights' => ['Water Villa', 'Snorkeling', 'Sunset Cruise'], 'from' => 21900000],
        ['slug' => 'labuan-bajo', 'name' => 'Labuan Bajo', 'country' => 'Indonesia', 'region' => 'Indonesia', 'image' => 'dest-labuan-bajo.jpg',
         'tag' => 'Pulau & Komodo', 'best_time' => 'Apr – Des',
         'desc' => 'Berlayar dengan phinisi, trekking Pulau Padar, dan bertemu komodo di habitat aslinya.',
         'highlights' => ['Pulau Padar', 'Pink Beach', 'Taman Komodo'], 'from' => 9800000],
    ],

    'packages' => [
        ['slug' => 'bali', 'name' => 'Bali Discovery', 'destination' => 'Bali', 'region' => 'Indonesia', 'days' => 5, 'nights' => 4,
         'duration' => '5 Hari 4 Malam', 'stars' => 4, 'price' => 8750000, 'image' => 'pkg-bali.jpg',
         'highlights' => ['Hotel bintang 4 & villa', 'Tour Ubud – Kintamani', 'Sunset dinner Jimbaran']],
        ['slug' => 'japan', 'name' => 'Japan Sakura Tour', 'destination' => 'Tokyo', 'region' => 'Asia', 'days' => 7, 'nights' => 6,
         'duration' => '7 Hari 6 Malam', 'stars' => 4, 'price' => 18900000, 'image' => 'pkg-japan.jpg',
         'highlights' => ['Tokyo – Fuji – Kyoto – Osaka', 'Shinkansen kelas reguler', 'Pemandu berbahasa Indonesia']],
        ['slug' => 'europe', 'name' => 'Europe Golden Route', 'destination' => 'Eropa', 'region' => 'Eropa', 'days' => 10, 'nights' => 9,
         'duration' => '10 Hari 9 Malam', 'stars' => 4, 'price' => 32500000, 'image' => 'pkg-europe.jpg',
         'highlights' => ['5 negara Eropa Barat', 'Visa Schengen dibantu', 'Cruise sungai Rhine']],
        ['slug' => 'swiss', 'name' => 'Swiss Alps Adventure', 'destination' => 'Swiss', 'region' => 'Eropa', 'days' => 8, 'nights' => 7,
         'duration' => '8 Hari 7 Malam', 'stars' => 4, 'price' => 32500000, 'image' => 'pkg-swiss.jpg',
         'highlights' => ['Jungfraujoch Top of Europe', 'Glacier Express panorama', 'Fondue dinner']],
        ['slug' => 'santorini', 'name' => 'Santorini Romance', 'destination' => 'Santorini', 'region' => 'Eropa', 'days' => 6, 'nights' => 5,
         'duration' => '6 Hari 5 Malam', 'stars' => 5, 'price' => 24500000, 'image' => 'dest-santorini.jpg',
         'highlights' => ['Hotel kaldera view', 'Sunset dinner di Oia', 'Wine tasting']],
        ['slug' => 'maldives', 'name' => 'Maldives Escape', 'destination' => 'Maldives', 'region' => 'Asia', 'days' => 5, 'nights' => 4,
         'duration' => '5 Hari 4 Malam', 'stars' => 5, 'price' => 21900000, 'image' => 'dest-maldives.jpg',
         'highlights' => ['Water villa privat', 'Speedboat transfer', 'Spa & sunset cruise']],
    ],

    'package_facilities' => ['Hotel', 'Transportasi', 'Makan'],

    'itineraries' => [
        'bali' => ['label' => 'Bali Discovery · 5D4N', 'days' => [
            ['title' => 'Jakarta – Bali',       'desc' => 'Check-in hotel, free time'],
            ['title' => 'Ubud – Kintamani',     'desc' => 'Tour desa, makan siang'],
            ['title' => 'Uluwatu – Jimbaran',   'desc' => 'Sunset, dinner, free time'],
            ['title' => 'Nusa Penida',          'desc' => 'Kelingking Beach, snorkeling, makan siang'],
            ['title' => 'Seminyak – Jakarta',   'desc' => 'Belanja oleh-oleh, transfer bandara'],
        ]],
        'japan' => ['label' => 'Japan Sakura Tour · 7D6N', 'days' => [
            ['title' => 'Jakarta – Tokyo',      'desc' => 'Penerbangan, check-in hotel'],
            ['title' => 'Tokyo',                'desc' => 'Asakusa, Shibuya, Harajuku'],
            ['title' => 'Hakone – Gunung Fuji', 'desc' => 'Kapal Danau Ashi, ropeway'],
            ['title' => 'Kyoto',                'desc' => 'Fushimi Inari, Kinkaku-ji, Gion'],
            ['title' => 'Nara – Osaka',         'desc' => 'Taman rusa Nara, Dotonbori'],
            ['title' => 'Osaka',                'desc' => 'Osaka Castle, free time belanja'],
            ['title' => 'Osaka – Jakarta',      'desc' => 'Transfer bandara, penerbangan pulang'],
        ]],
        'swiss' => ['label' => 'Swiss Alps Adventure · 8D7N', 'days' => [
            ['title' => 'Jakarta – Zurich',     'desc' => 'Penerbangan, check-in hotel'],
            ['title' => 'Lucerne',              'desc' => 'Chapel Bridge, Lion Monument'],
            ['title' => 'Interlaken',           'desc' => 'Kota di antara dua danau, free time'],
            ['title' => 'Jungfraujoch',         'desc' => 'Top of Europe, Ice Palace'],
            ['title' => 'Grindelwald – Bern',   'desc' => 'Desa Alpen, kota tua Bern'],
            ['title' => 'Zermatt',              'desc' => 'Kereta Gornergrat, view Matterhorn'],
            ['title' => 'Lugano – Zurich',      'desc' => 'Danau Lugano, belanja'],
            ['title' => 'Zurich – Jakarta',     'desc' => 'Transfer bandara, penerbangan pulang'],
        ]],
    ],

    'price_plans' => [
        ['code' => '5D4N',  'label' => 'Paket 5D4N',  'price' => 8750000,  'desc' => 'Pilihan ringkas untuk akhir pekan panjang.', 'popular' => false],
        ['code' => '7D6N',  'label' => 'Paket 7D6N',  'price' => 12900000, 'desc' => 'Keseimbangan jelajah dan waktu santai.',     'popular' => true],
        ['code' => '10D9N', 'label' => 'Paket 10D9N', 'price' => 18500000, 'desc' => 'Rute lengkap lintas kota atau negara.',      'popular' => false],
    ],
    'price_includes' => ['Hotel bintang 4 – 5', 'Tiket pesawat / transportasi lokal', 'Makan sesuai itinerary', 'Tiket masuk objek wisata', 'Pemandu wisata berpengalaman', 'Asuransi perjalanan'],
    'price_excludes' => ['Visa & biaya paspor', 'Pengeluaran pribadi', 'Tip pemandu & driver', 'Upgrade kamar'],
    'price_notes'    => [
        'Harga per orang berdasarkan kamar twin sharing.',
        'Harga dapat berubah mengikuti kurs dan ketersediaan tiket.',
        'Uang muka 30% untuk mengamankan kursi; pelunasan H-30 keberangkatan.',
    ],

    'schedules' => [
        ['iso' => '2026-11-12', 'label' => '12 Nov 2026', 'destination' => 'Bali',        'package' => 'Bali Discovery',        'status' => 'tersedia', 'seats' => 12],
        ['iso' => '2026-11-19', 'label' => '19 Nov 2026', 'destination' => 'Tokyo',       'package' => 'Japan Sakura Tour',     'status' => 'tersedia', 'seats' => 9],
        ['iso' => '2026-11-26', 'label' => '26 Nov 2026', 'destination' => 'Swiss',       'package' => 'Swiss Alps Adventure',  'status' => 'tersedia', 'seats' => 8],
        ['iso' => '2026-12-03', 'label' => '03 Des 2026', 'destination' => 'Eropa',       'package' => 'Europe Golden Route',   'status' => 'tersedia', 'seats' => 10],
        ['iso' => '2026-12-10', 'label' => '10 Des 2026', 'destination' => 'Maldives',    'package' => 'Maldives Escape',       'status' => 'terbatas', 'seats' => 3],
        ['iso' => '2026-12-17', 'label' => '17 Des 2026', 'destination' => 'Santorini',   'package' => 'Santorini Romance',     'status' => 'tersedia', 'seats' => 7],
        ['iso' => '2027-01-07', 'label' => '07 Jan 2027', 'destination' => 'Bali',        'package' => 'Bali Discovery',        'status' => 'tersedia', 'seats' => 14],
        ['iso' => '2027-01-21', 'label' => '21 Jan 2027', 'destination' => 'Labuan Bajo', 'package' => 'Open trip phinisi',     'status' => 'penuh',    'seats' => 0],
    ],

    'gallery' => [
        ['image' => 'gal-maldives.jpg',   'caption' => 'Laguna toska Maldives',      'region' => 'Asia'],
        ['image' => 'gal-bali.jpg',       'caption' => 'Pura tepi danau, Bali',      'region' => 'Indonesia'],
        ['image' => 'gal-swiss.jpg',      'caption' => 'Puncak salju Alpen',         'region' => 'Eropa'],
        ['image' => 'gal-europe.jpg',     'caption' => 'Kota tua Eropa saat senja',  'region' => 'Eropa'],
        ['image' => 'dest-santorini.jpg', 'caption' => 'Kubah biru Santorini',       'region' => 'Eropa'],
        ['image' => 'dest-tokyo.jpg',     'caption' => 'Pagoda merah Tokyo',         'region' => 'Asia'],
        ['image' => 'pkg-japan.jpg',      'caption' => 'Sakura di tepi danau',       'region' => 'Asia'],
        ['image' => 'dest-labuan-bajo.jpg','caption' => 'Teluk Labuan Bajo',         'region' => 'Indonesia'],
    ],

    'testimonials' => [
        ['name' => 'Rina Maharani', 'trip' => 'Japan Sakura Tour', 'rating' => 5, 'avatar' => 'avatar-rina.jpg',
         'quote' => 'Perjalanan ke Jepang bersama GrandJourney sangat luar biasa! Pelayanan profesional, terjadwal dengan baik, dan semua destinasi sesuai ekspektasi. Pasti akan repeat lagi!'],
        ['name' => 'Dimas Pratama', 'trip' => 'Swiss Alps Adventure', 'rating' => 5, 'avatar' => null,
         'quote' => 'Itinerary rapi, hotel nyaman, dan pemandu sangat membantu. Pemandangan Jungfraujoch jadi momen terbaik keluarga kami.'],
        ['name' => 'Sari Wulandari', 'trip' => 'Bali Discovery', 'rating' => 5, 'avatar' => null,
         'quote' => 'Villa privat dan sunset dinner di Jimbaran benar-benar berkesan. Tim responsif dari awal inquiry sampai pulang.'],
        ['name' => 'Andre Wijaya', 'trip' => 'Europe Golden Route', 'rating' => 4, 'avatar' => null,
         'quote' => 'Rute lima negara terasa santai, tidak terburu-buru. Bantuan pengurusan visa Schengen sangat menghemat waktu.'],
    ],

    'chatbot' => [
        'title'    => 'AI Travel Assistant',
        'subtitle' => 'FAQ destinasi & paket tour',
        'greeting' => 'Halo! Saya AI Travel Assistant GrandJourney. Tanyakan seputar destinasi, paket tour, itinerary, harga, atau jadwal keberangkatan.',
        'fallback' => 'Maaf, saya belum menemukan jawaban yang pas. Coba pilih salah satu topik di bawah, atau lanjutkan lewat WhatsApp agar tim kami bisa membantu langsung.',
        'chips'    => [
            ['label' => 'Rekomendasi Destinasi', 'q' => 'rekomendasi destinasi'],
            ['label' => 'Info Paket Tour',       'q' => 'info paket tour'],
            ['label' => 'Itinerary',             'q' => 'itinerary'],
            ['label' => 'Harga & Promo',         'q' => 'harga promo'],
            ['label' => 'FAQ',                   'q' => 'faq'],
        ],
        'faq' => [
            ['group' => 'Destinasi', 'q' => 'Destinasi apa yang direkomendasikan?', 'keys' => ['rekomendasi', 'destinasi', 'rekomendasikan', 'liburan', 'enaknya'],
             'a' => 'Untuk pantai & budaya kami sarankan Bali; kota & sakura: Tokyo; romantis: Santorini; pegunungan: Swiss; pulau privat: Maldives; petualangan laut: Labuan Bajo.'],
            ['group' => 'Destinasi', 'q' => 'Kapan waktu terbaik berkunjung?', 'keys' => ['waktu', 'musim', 'kapan', 'terbaik', 'cuaca'],
             'a' => 'Bali: Apr–Okt. Tokyo: Mar–Apr (sakura) & Nov (momiji). Santorini: Mei–Okt. Swiss: Jun–Sep atau Des–Mar. Maldives: Nov–Apr. Labuan Bajo: Apr–Des.'],
            ['group' => 'Destinasi', 'q' => 'Apakah perlu visa?', 'keys' => ['visa', 'paspor', 'schengen', 'dokumen'],
             'a' => 'Bali, Labuan Bajo, dan Maldives tidak memerlukan visa bagi WNI (Maldives visa on arrival). Jepang dan Eropa/Schengen memerlukan visa; tim kami membantu pengurusannya.'],
            ['group' => 'Paket', 'q' => 'Apa saja paket tour yang tersedia?', 'keys' => ['paket', 'tour', 'info paket', 'tersedia'],
             'a' => 'Tersedia Bali Discovery (5H4M), Japan Sakura Tour (7H6M), Europe Golden Route (10H9M), Swiss Alps Adventure (8H7M), Santorini Romance (6H5M), dan Maldives Escape (5H4M).'],
            ['group' => 'Paket', 'q' => 'Berapa harga paket tour?', 'keys' => ['harga', 'biaya', 'promo', 'diskon', 'berapa'],
             'a' => 'Paket 5D4N mulai Rp 8.750.000, 7D6N mulai Rp 12.900.000, dan 10D9N mulai Rp 18.500.000 per orang. Hubungi kami untuk promo musiman.'],
            ['group' => 'Paket', 'q' => 'Apa saja yang sudah termasuk?', 'keys' => ['termasuk', 'fasilitas', 'include', 'sudah'],
             'a' => 'Hotel bintang 4–5, transportasi, makan sesuai itinerary, tiket masuk objek wisata, pemandu, dan asuransi perjalanan. Visa dan pengeluaran pribadi tidak termasuk.'],
            ['group' => 'Paket', 'q' => 'Bagaimana rincian itinerary?', 'keys' => ['itinerary', 'rute', 'jadwal harian', 'hari pertama'],
             'a' => 'Rincian itinerary per hari tersedia di halaman Itinerary untuk Bali, Jepang, dan Swiss. Rute lain kami kirim lewat WhatsApp.'],
            ['group' => 'Paket', 'q' => 'Kapan jadwal keberangkatan terdekat?', 'keys' => ['keberangkatan', 'berangkat', 'tanggal', 'jadwal'],
             'a' => 'Keberangkatan terdekat: Bali 12 Nov, Tokyo 19 Nov, Swiss 26 Nov, dan Eropa 03 Des 2026. Lihat status kursi di halaman Jadwal Keberangkatan.'],
            ['group' => 'Paket', 'q' => 'Bagaimana cara booking?', 'keys' => ['booking', 'pesan', 'daftar', 'dp', 'bayar', 'inquiry'],
             'a' => 'Isi form Booking Inquiry, lalu tim kami menghubungi Anda via WhatsApp. Uang muka 30% mengamankan kursi, pelunasan H-30.'],
            ['group' => 'Paket', 'q' => 'Bisakah paket disesuaikan?', 'keys' => ['custom', 'sesuaikan', 'private', 'privat', 'request'],
             'a' => 'Bisa. Pilih "Rancang paket sendiri" di form inquiry dan ceritakan kebutuhan Anda: tanggal, jumlah peserta, dan anggaran.'],
        ],
    ],

    'footer' => [
        'about'  => 'Biro perjalanan premium untuk destinasi eksklusif dengan layanan personal dan itinerary yang dirancang untuk Anda.',
        'social' => [
            ['key' => 'facebook',  'label' => 'Facebook',  'url' => '#'],
            ['key' => 'instagram', 'label' => 'Instagram', 'url' => '#'],
            ['key' => 'youtube',   'label' => 'YouTube',   'url' => '#'],
            ['key' => 'tiktok',    'label' => 'TikTok',    'url' => '#'],
        ],
    ],
];
