<?php

/*
|--------------------------------------------------------------------------
| WEBIA — Travel & Tourism / Organic / Travel Agent Forest Moss ("GreenTrip")
|--------------------------------------------------------------------------
| Sumber data statis untuk seluruh halaman template ini.
|
| - Tidak memakai closure, sehingga aman untuk `php artisan config:cache`.
| - Key config: template.travel&tourism.organic.travel-agent-forest-moss.travel-agent
| - Tim backend bisa mengganti isi array ini dengan data dari database
|   tanpa mengubah file Blade (struktur array dipertahankan).
| - Konten testimoni, FAQ, dan promo adalah contoh (dummy) — silakan ganti.
*/

return [

    // Prefix nama route (harus sama dengan ->name() di routes/web.php)
    'route_prefix' => 'webia.travel-agent-forest-moss.',

    'brand' => [
        'name'        => 'GreenTrip',
        'tagline'     => 'Explore More, Live Better',
        'eyebrow'     => 'Travel Agent & Tour Operator',
        'description' => 'GreenTrip — travel agent & tour operator dengan pilihan destinasi terbaik, layanan profesional, dan harga bersahabat.',
    ],

    'contact' => [
        'whatsapp'      => '62895630300345', // format internasional tanpa "+" dan tanpa 0 di depan
        'phone_display' => '0895-6303-00345',
        'email'         => 'halo@greentrip.id',
        'hours'         => 'Senin – Sabtu, 08.00 – 17.00 WIB',
        'wa_greeting'   => 'Halo GreenTrip, saya ingin bertanya tentang paket tour.',
    ],

    'social' => [
        ['icon' => 'instagram', 'label' => 'Instagram', 'url' => '#'],
        ['icon' => 'facebook',  'label' => 'Facebook',  'url' => '#'],
        ['icon' => 'youtube',   'label' => 'YouTube',   'url' => '#'],
        ['icon' => 'tiktok',    'label' => 'TikTok',    'url' => '#'],
    ],

    // Navigasi utama: hanya halaman yang diizinkan
    'nav' => [
        ['label' => 'Beranda',              'route' => 'index'],
        ['label' => 'Destinasi',            'route' => 'destinasi'],
        ['label' => 'Paket Tour',           'route' => 'paket-tour'],
        ['label' => 'Itinerary',            'route' => 'itinerary'],
        ['label' => 'Harga',                'route' => 'harga'],
        ['label' => 'Jadwal Keberangkatan', 'route' => 'jadwal-keberangkatan'],
        ['label' => 'Galeri',               'route' => 'galeri'],
        ['label' => 'Testimoni',            'route' => 'testimoni'],
    ],

    'hero' => [
        'line_1' => 'Jelajahi Dunia',
        'line_2' => 'Bersama GreenTrip',
        'text'   => 'Rasakan pengalaman perjalanan yang lebih bermakna dengan pilihan destinasi terbaik, layanan profesional, dan harga yang bersahabat.',
        'script' => 'Good Vibes Only',
        'badge'  => 'Mulai Petualangan Baru Anda',
    ],

    // Opsi dropdown pencarian (hero) & form inquiry
    'search_options' => [
        'bali'        => 'Bali',
        'yogyakarta'  => 'Yogyakarta',
        'raja-ampat'  => 'Raja Ampat',
        'labuan-bajo' => 'Labuan Bajo',
        'tokyo'       => 'Tokyo',
        'swiss'       => 'Swiss',
        'maldives'    => 'Maldives',
    ],

    /* ------------------------------------------------------------------ */
    'destinations' => [
        [
            'slug' => 'bali', 'name' => 'Bali', 'country' => 'Indonesia', 'group' => 'Domestik',
            'image' => 'dest-bali.jpg', 'best_time' => 'April – Oktober', 'from_price' => 4850000,
            'package' => 'bali-romantic-getaway',
            'description' => 'Pura di tepi danau, sawah terasering, dan pantai sunset — budaya dan santai dalam satu pulau.',
            'highlights'  => ['Pura Ulun Danu Beratan', 'Ubud & Tegallalang', 'Sunset Uluwatu'],
        ],
        [
            'slug' => 'yogyakarta', 'name' => 'Yogyakarta', 'country' => 'Indonesia', 'group' => 'Domestik',
            'image' => 'dest-yogyakarta.jpg', 'best_time' => 'Mei – September', 'from_price' => null,
            'package' => null,
            'description' => 'Kota budaya dengan candi megah, keraton, kuliner khas, dan keramahan yang sulit dilupakan.',
            'highlights'  => ['Candi Borobudur', 'Candi Prambanan', 'Keraton & Malioboro'],
        ],
        [
            'slug' => 'raja-ampat', 'name' => 'Raja Ampat', 'country' => 'Indonesia', 'group' => 'Domestik',
            'image' => 'dest-raja-ampat.jpg', 'best_time' => 'Oktober – April', 'from_price' => null,
            'package' => null,
            'description' => 'Gugusan pulau karang dengan laut jernih dan keanekaragaman bawah laut kelas dunia.',
            'highlights'  => ['Wayag & Piaynemo', 'Snorkeling terumbu karang', 'Island hopping'],
        ],
        [
            'slug' => 'tokyo', 'name' => 'Tokyo', 'country' => 'Jepang', 'group' => 'Internasional',
            'image' => 'dest-tokyo.jpg', 'best_time' => 'Maret – Mei & Oktober – November', 'from_price' => 12900000,
            'package' => 'japan-highlights',
            'description' => 'Perpaduan kota modern, kuil tradisional, bunga sakura, dan pemandangan Gunung Fuji.',
            'highlights'  => ['Asakusa & Shibuya', 'Gunung Fuji – Hakone', 'Kyoto & Osaka'],
        ],
        [
            'slug' => 'swiss', 'name' => 'Swiss', 'country' => 'Swiss', 'group' => 'Internasional',
            'image' => 'dest-swiss.jpg', 'best_time' => 'Juni – September', 'from_price' => 18500000,
            'package' => 'explore-eropa',
            'description' => 'Pegunungan Alpen bersalju, danau sebening kaca, dan desa cantik di lembah hijau.',
            'highlights'  => ['Lucerne & Danau Lucerne', 'Interlaken', 'Panorama Alpen'],
        ],
        [
            'slug' => 'maldives', 'name' => 'Maldives', 'country' => 'Maladewa', 'group' => 'Internasional',
            'image' => 'dest-maldives.jpg', 'best_time' => 'November – April', 'from_price' => null,
            'package' => null,
            'description' => 'Vila di atas air, laguna turquoise, dan pasir putih untuk liburan yang benar-benar tenang.',
            'highlights'  => ['Water villa', 'Snorkeling laguna', 'Sunset cruise'],
        ],
    ],

    /* ------------------------------------------------------------------ */
    'packages' => [
        [
            'slug' => 'bali-romantic-getaway', 'name' => 'Bali Romantic Getaway', 'destination' => 'bali',
            'destination_name' => 'Bali', 'duration' => '4 Hari 3 Malam', 'price' => 4850000,
            'badge' => 'Best Seller', 'image' => 'paket-bali.jpg', 'hotel' => 'Hotel ★★★★',
            'transport' => 'Transportasi',
            'summary' => 'Liburan santai ala pasangan: Ubud, Kintamani, dan sunset di Uluwatu.',
            'includes' => ['Hotel bintang 4', 'Transportasi selama tour', 'Tiket masuk wisata', 'Makan sesuai itinerary', 'Tour guide'],
            'days' => [
                ['title' => 'Jakarta – Bali', 'note' => 'Check-in hotel, free time',
                 'items' => ['Tiba di Bandara Ngurah Rai dan penjemputan', 'Check-in hotel', 'Free time menikmati pantai'], 'meals' => 'Makan malam'],
                ['title' => 'Ubud – Kintamani', 'note' => 'Tour desa, makan siang',
                 'items' => ['Tegallalang & sawah terasering', 'Tour desa wisata', 'Makan siang dengan pemandangan Gunung Batur'], 'meals' => 'Sarapan, makan siang'],
                ['title' => 'Uluwatu – Jimbaran', 'note' => 'Sunset, dinner, free time',
                 'items' => ['Pura Uluwatu', 'Sunset di tebing Uluwatu', 'Makan malam seafood di Jimbaran'], 'meals' => 'Sarapan, makan malam'],
                ['title' => 'Bali – Jakarta', 'note' => 'Belanja oleh-oleh, transfer bandara',
                 'items' => ['Belanja oleh-oleh khas Bali', 'Check-out hotel', 'Transfer ke bandara'], 'meals' => 'Sarapan'],
            ],
        ],
        [
            'slug' => 'labuan-bajo-adventure', 'name' => 'Labuan Bajo Adventure', 'destination' => 'labuan-bajo',
            'destination_name' => 'Labuan Bajo', 'duration' => '4 Hari 3 Malam', 'price' => 7500000,
            'badge' => null, 'image' => 'paket-labuan-bajo.jpg', 'hotel' => 'Hotel ★★★★',
            'transport' => 'Transportasi',
            'summary' => 'Island hopping, Pulau Padar, Pink Beach, dan bertemu komodo di habitat aslinya.',
            'includes' => ['Hotel bintang 4', 'Kapal island hopping', 'Tiket Taman Nasional Komodo', 'Makan sesuai itinerary', 'Tour guide'],
            'days' => [
                ['title' => 'Jakarta – Labuan Bajo', 'note' => 'Check-in hotel, sunset di bukit',
                 'items' => ['Penjemputan di Bandara Komodo', 'Check-in hotel', 'Sunset di Bukit Cinta'], 'meals' => 'Makan malam'],
                ['title' => 'Padar – Pink Beach', 'note' => 'Island hopping seharian',
                 'items' => ['Trekking Pulau Padar', 'Berenang di Pink Beach', 'Snorkeling di perairan jernih'], 'meals' => 'Sarapan, makan siang, makan malam'],
                ['title' => 'Komodo – Manta Point', 'note' => 'Bertemu komodo & snorkeling',
                 'items' => ['Pulau Komodo bersama ranger', 'Snorkeling di Manta Point', 'Kembali ke Labuan Bajo'], 'meals' => 'Sarapan, makan siang'],
                ['title' => 'Labuan Bajo – Jakarta', 'note' => 'Free time, transfer bandara',
                 'items' => ['Free time dan belanja suvenir', 'Check-out hotel', 'Transfer ke bandara'], 'meals' => 'Sarapan'],
            ],
        ],
        [
            'slug' => 'japan-highlights', 'name' => 'Japan Highlights', 'destination' => 'tokyo',
            'destination_name' => 'Tokyo', 'duration' => '6 Hari 5 Malam', 'price' => 12900000,
            'badge' => null, 'image' => 'paket-jepang.jpg', 'hotel' => 'Hotel ★★★★',
            'transport' => 'Transportasi',
            'summary' => 'Tokyo, Gunung Fuji, Kyoto, dan Osaka dalam satu rute yang nyaman.',
            'includes' => ['Hotel bintang 4', 'Transportasi lokal', 'Tiket masuk wisata', 'Makan sesuai itinerary', 'Tour leader'],
            'days' => [
                ['title' => 'Jakarta – Tokyo', 'note' => 'Tiba di Tokyo, check-in hotel',
                 'items' => ['Penerbangan menuju Tokyo', 'Transfer ke hotel', 'Jalan santai di sekitar hotel'], 'meals' => 'Makan malam'],
                ['title' => 'Asakusa – Shibuya', 'note' => 'Kuil Sensoji & Shibuya Crossing',
                 'items' => ['Kuil Sensoji', 'Tokyo Skytree (area luar)', 'Shibuya Crossing'], 'meals' => 'Sarapan, makan siang'],
                ['title' => 'Fuji – Hakone', 'note' => 'Pemandangan Gunung Fuji',
                 'items' => ['Gunung Fuji area 5th Station', 'Danau Ashi', 'Onsen area Hakone'], 'meals' => 'Sarapan, makan malam'],
                ['title' => 'Kyoto', 'note' => 'Kuil, taman, dan distrik Gion',
                 'items' => ['Fushimi Inari', 'Arashiyama', 'Distrik Gion'], 'meals' => 'Sarapan, makan siang'],
                ['title' => 'Osaka', 'note' => 'Kastil Osaka & kuliner Dotonbori',
                 'items' => ['Kastil Osaka', 'Dotonbori', 'Belanja bebas'], 'meals' => 'Sarapan, makan malam'],
                ['title' => 'Osaka – Jakarta', 'note' => 'Transfer bandara, penerbangan pulang',
                 'items' => ['Check-out hotel', 'Transfer ke Bandara Kansai', 'Penerbangan pulang'], 'meals' => 'Sarapan'],
            ],
        ],
        [
            'slug' => 'explore-eropa', 'name' => 'Explore Eropa', 'destination' => 'swiss',
            'destination_name' => 'Swiss & Eropa', 'duration' => '8 Hari 7 Malam', 'price' => 18500000,
            'badge' => null, 'image' => 'paket-eropa.jpg', 'hotel' => 'Hotel ★★★★',
            'transport' => 'Transportasi',
            'summary' => 'Kota klasik, katedral megah, dan panorama Alpen Swiss dalam satu perjalanan.',
            'includes' => ['Hotel bintang 4', 'Transportasi antarnegara', 'Tiket masuk wisata', 'Makan sesuai itinerary', 'Tour leader'],
            'days' => [
                ['title' => 'Jakarta – Eropa', 'note' => 'Penerbangan menuju Eropa',
                 'items' => ['Keberangkatan dari Jakarta', 'Transit dan penerbangan lanjutan', 'Bermalam di pesawat'], 'meals' => 'Makan di pesawat'],
                ['title' => 'Kota Klasik', 'note' => 'City tour & katedral',
                 'items' => ['Tiba dan city tour', 'Kunjungan katedral', 'Makan malam khas lokal'], 'meals' => 'Sarapan, makan malam'],
                ['title' => 'Lintas Negara', 'note' => 'Menikmati lanskap perbatasan',
                 'items' => ['Perjalanan darat nyaman', 'Singgah di desa wisata', 'Check-in hotel'], 'meals' => 'Sarapan, makan siang'],
                ['title' => 'Lucerne', 'note' => 'Danau & kota tua',
                 'items' => ['Chapel Bridge', 'Kota tua Lucerne', 'Cruise di danau (opsional)'], 'meals' => 'Sarapan, makan malam'],
                ['title' => 'Interlaken', 'note' => 'Panorama Alpen',
                 'items' => ['Kereta panorama', 'Jungfraujoch (sesuai cuaca)', 'Free time di Interlaken'], 'meals' => 'Sarapan, makan siang'],
                ['title' => 'Zurich', 'note' => 'City tour & belanja',
                 'items' => ['City tour Zurich', 'Bahnhofstrasse', 'Free time'], 'meals' => 'Sarapan'],
                ['title' => 'Free Program', 'note' => 'Hari bebas atau tur opsional',
                 'items' => ['Hari bebas', 'Tur opsional (biaya terpisah)', 'Belanja oleh-oleh'], 'meals' => 'Sarapan'],
                ['title' => 'Eropa – Jakarta', 'note' => 'Transfer bandara, penerbangan pulang',
                 'items' => ['Check-out hotel', 'Transfer ke bandara', 'Penerbangan pulang'], 'meals' => 'Sarapan'],
            ],
        ],
    ],

    /* ------------------------------------------------------------------ */
    'prices' => [
        'note'  => 'Harga sudah termasuk semua fasilitas terbaik.',
        'tiers' => [
            ['code' => '4D3N', 'label' => 'Paket 4D3N', 'duration' => '4 Hari 3 Malam', 'price' => 4850000,  'highlight' => false,
             'for' => 'Cocok untuk liburan singkat akhir pekan.'],
            ['code' => '5D4N', 'label' => 'Paket 5D4N', 'duration' => '5 Hari 4 Malam', 'price' => 7500000,  'highlight' => true,
             'for' => 'Pilihan seimbang untuk jelajah lebih leluasa.'],
            ['code' => '7D6N', 'label' => 'Paket 7D6N', 'duration' => '7 Hari 6 Malam', 'price' => 12900000, 'highlight' => false,
             'for' => 'Perjalanan panjang dengan rute lebih lengkap.'],
        ],
        'included' => [
            'Hotel bintang 4', 'Transportasi selama tour', 'Tiket masuk objek wisata',
            'Makan sesuai itinerary', 'Tour guide / tour leader berpengalaman', 'Dokumentasi perjalanan',
        ],
        'excluded' => ['Pengeluaran pribadi', 'Tips guide & driver', 'Tur opsional di luar itinerary'],
        'promo'    => 'Pemesanan jauh hari mendapat penawaran khusus — tanyakan promo terbaru melalui WhatsApp.',
    ],

    /* ------------------------------------------------------------------ */
    'schedules' => [
        ['date' => '2026-11-12', 'label' => '12 Nov 2026', 'destination' => 'Bali',        'package' => 'bali-romantic-getaway',  'status' => 'Tersedia', 'seats' => 8],
        ['date' => '2026-11-19', 'label' => '19 Nov 2026', 'destination' => 'Labuan Bajo', 'package' => 'labuan-bajo-adventure', 'status' => 'Tersedia', 'seats' => 6],
        ['date' => '2026-11-26', 'label' => '26 Nov 2026', 'destination' => 'Tokyo',       'package' => 'japan-highlights',       'status' => 'Tersedia', 'seats' => 10],
        ['date' => '2026-12-03', 'label' => '03 Des 2026', 'destination' => 'Swiss',       'package' => 'explore-eropa',          'status' => 'Tersedia', 'seats' => 12],
        ['date' => '2026-12-10', 'label' => '10 Des 2026', 'destination' => 'Bali',        'package' => 'bali-romantic-getaway',  'status' => 'Terbatas', 'seats' => 3],
        ['date' => '2026-12-17', 'label' => '17 Des 2026', 'destination' => 'Tokyo',       'package' => 'japan-highlights',       'status' => 'Terbatas', 'seats' => 4],
    ],

    /* ------------------------------------------------------------------ */
    'gallery' => [
        ['file' => 'galeri-1.jpg',          'caption' => 'Pura di tepi danau, Bali',        'category' => 'Destinasi'],
        ['file' => 'galeri-2.jpg',          'caption' => 'Perahu di laut jernih',           'category' => 'Alam'],
        ['file' => 'galeri-3.jpg',          'caption' => 'Pantai tropis berpohon kelapa',          'category' => 'Alam'],
        ['file' => 'galeri-4.jpg',          'caption' => 'Menyusuri pantai bersama ransel', 'category' => 'Petualangan'],
        ['file' => 'paket-bali.jpg',        'caption' => 'Sunset di Bali',                  'category' => 'Destinasi'],
        ['file' => 'paket-labuan-bajo.jpg', 'caption' => 'Gugusan pulau Labuan Bajo',       'category' => 'Alam'],
        ['file' => 'paket-jepang.jpg',      'caption' => 'Sakura & pagoda Jepang',          'category' => 'Budaya'],
        ['file' => 'paket-eropa.jpg',       'caption' => 'Katedral klasik Eropa',           'category' => 'Budaya'],
        ['file' => 'dest-maldives.jpg',     'caption' => 'Water villa Maldives',            'category' => 'Destinasi'],
        ['file' => 'dest-swiss.jpg',        'caption' => 'Alpen Swiss',                     'category' => 'Alam'],
        ['file' => 'dest-raja-ampat.jpg',   'caption' => 'Laguna Raja Ampat',               'category' => 'Petualangan'],
        ['file' => 'hero.jpg',              'caption' => 'Memandang lembah dari puncak',    'category' => 'Petualangan', 'wide' => true],
    ],

    /* ------------------------------------------------------------------ */
    'testimonials' => [
        ['name' => 'Sari Dewi', 'trip' => 'Bali Romantic Getaway', 'rating' => 5, 'avatar' => 'avatar-sari.jpg',
         'quote' => 'Pengalaman yang luar biasa! Semua terorganisir dengan baik, dari transportasi, hotel, hingga tour guide-nya. Pasti akan liburan lagi dengan GreenTrip.'],
        ['name' => 'Budi Santoso', 'trip' => 'Japan Highlights', 'rating' => 5, 'avatar' => null,
         'quote' => 'Itinerary Jepangnya padat tapi tidak melelahkan. Tour leader sabar dan hotelnya nyaman. Sakura-nya jadi kenangan terbaik keluarga kami.'],
        ['name' => 'Ayu Lestari', 'trip' => 'Labuan Bajo Adventure', 'rating' => 5, 'avatar' => null,
         'quote' => 'Island hopping-nya seru dan aman. Tim sigap membantu dari awal inquiry sampai pulang. Harga sesuai dengan fasilitas yang didapat.'],
        ['name' => 'Rizky Pratama', 'trip' => 'Explore Eropa', 'rating' => 5, 'avatar' => null,
         'quote' => 'Pertama kali ke Eropa dan merasa tenang karena semuanya sudah diatur. Panorama Swiss benar-benar tak terlupakan.'],
        ['name' => 'Maya Putri', 'trip' => 'Bali Romantic Getaway', 'rating' => 4, 'avatar' => null,
         'quote' => 'Sunset dinner di Jimbaran jadi momen favorit kami. Respons admin cepat dan ramah saat kami mengubah jadwal.'],
        ['name' => 'Dimas Aditya', 'trip' => 'Labuan Bajo Adventure', 'rating' => 5, 'avatar' => null,
         'quote' => 'Bertemu komodo dan snorkeling di Manta Point — semua sesuai janji. Rekomendasi untuk yang suka petualangan.'],
    ],

    /* ------------------------------------------------------------------ */
    'ai' => [
        'title'    => 'AI Travel Assistant',
        'subtitle' => 'Tanya destinasi, paket tour, itinerary, harga, atau info perjalanan lainnya. Kami siap membantu!',
        'greeting' => 'Halo! Saya asisten GreenTrip. Tanyakan seputar destinasi dan paket tour, ya.',
        'chips'    => ['Rekomendasi Destinasi', 'Info Paket Tour', 'Itinerary', 'Harga & Promo', 'FAQ'],
        'faqs' => [
            ['q' => 'Apakah harga paket sudah termasuk semua fasilitas?',
             'a' => 'Ya, harga paket sudah termasuk hotel, transportasi selama tour, tiket masuk wisata, makan sesuai itinerary, dan tour guide. Pengeluaran pribadi dan tur opsional belum termasuk.',
             'keys' => ['termasuk', 'fasilitas', 'include']],
            ['q' => 'Bagaimana cara booking?',
             'a' => 'Isi form Booking Inquiry (nama, email, destinasi, dan tanggal keberangkatan). Pesan Anda akan dikirim ke WhatsApp tim kami untuk dikonfirmasi.',
             'keys' => ['booking', 'pesan', 'daftar', 'reservasi', 'inquiry']],
            ['q' => 'Dokumen apa yang perlu disiapkan?',
             'a' => 'Untuk perjalanan domestik siapkan KTP. Untuk luar negeri siapkan paspor dengan masa berlaku minimal 6 bulan dan, bila diperlukan, dokumen visa.',
             'keys' => ['dokumen', 'paspor', 'visa', 'ktp', 'syarat']],
            ['q' => 'Bagaimana sistem pembayarannya?',
             'a' => 'Pembayaran dilakukan bertahap: uang muka saat konfirmasi dan pelunasan sebelum keberangkatan. Rincian lengkap dikirim tim kami lewat WhatsApp.',
             'keys' => ['bayar', 'pembayaran', 'dp', 'cicil', 'lunas', 'transfer']],
            ['q' => 'Bisakah membawa anak-anak?',
             'a' => 'Bisa. Sebutkan jumlah dan usia anak pada form inquiry agar kami menyesuaikan kamar dan harga.',
             'keys' => ['anak', 'bayi', 'balita', 'keluarga']],
            ['q' => 'Bagaimana jika ingin mengubah atau membatalkan jadwal?',
             'a' => 'Hubungi tim kami melalui WhatsApp sesegera mungkin. Ketentuan perubahan dan pembatalan mengikuti paket yang dipilih.',
             'keys' => ['batal', 'refund', 'ubah', 'reschedule', 'ganti']],
        ],
    ],
];
