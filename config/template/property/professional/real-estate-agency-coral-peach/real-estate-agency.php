<?php

/*
|--------------------------------------------------------------------------
| Coral Homes — Real Estate Agency (Professional · Coral & Peach)
|--------------------------------------------------------------------------
| Seluruh konten statis template. Backend cukup mengganti isi array ini
| (atau mengambil dari database) tanpa mengubah file Blade.
|
| Key config : template.property.professional.real-estate-agency-coral-peach.real-estate-agency
*/

$img = 'images/website-bisnis/template/property/professional/real-estate-agency-coral-peach';

return [

    'meta' => [
        'title'       => 'Coral Homes — Rumah Modern untuk Kehidupan Lebih Baik',
        'description' => 'Coral Homes: properti residensial premium di Surabaya, Sidoarjo, Malang dan Batu dengan desain modern, fasilitas lengkap, dan lingkungan nyaman.',
    ],

    'brand' => [
        'name'    => 'Coral Homes',
        'upper'   => 'CORAL HOMES',
        'tagline' => 'Your Dream Home, Our Priority',
    ],

    'assets' => [
        'css' => 'css/website-bisnis/template/property/professional/real-estate-agency-coral-peach/real-estate-agency.css',
        'js'  => 'js/website-bisnis/template/property/professional/real-estate-agency-coral-peach/real-estate-agency.js',
        'img' => $img,
    ],

    'contact' => [
        'address'       => 'Jl. Melati No. 15, Surabaya, Jawa Timur',
        'address_line1' => 'Jl. Melati No. 15',
        'address_line2' => 'Surabaya, Jawa Timur',
        'email'         => 'info@coralhomes.id',
        'email_extra'   => 'info@coralhomes.id',
        'hours'         => 'Mon - Sat 09:00 - 18:00',
        'phone'         => '+62 812 3456 7890',
        'phone_link'    => '+6281234567890',
        'whatsapp'      => '6281234567890',
        // Nomor tujuan form Inquiry & Booking (format internasional tanpa +): 0895630300345
        'whatsapp_leads' => '62895630300345',
        'whatsapp_text' => 'Halo Coral Homes, saya tertarik dengan properti Anda dan ingin bertanya lebih lanjut.',
        'maps_url'      => 'https://www.google.com/maps/search/?api=1&query=Jl.+Melati+No.+15+Surabaya+Jawa+Timur',
    ],

    'socials' => [
        ['name' => 'Instagram', 'icon' => 'instagram', 'url' => '#'],
        ['name' => 'Facebook',  'icon' => 'facebook',  'url' => '#'],
        ['name' => 'YouTube',   'icon' => 'youtube',   'url' => '#'],
        ['name' => 'LinkedIn',  'icon' => 'linkedin',  'url' => '#'],
    ],

    // Navbar & footer. "Location" tidak lagi menjadi menu sendiri: lokasi ada di halaman Contact.
    'nav' => [
        ['label' => 'Home',     'route' => 'coral-peach.home',     'hash' => null, 'match' => 'coral-peach.home'],
        ['label' => 'Property', 'route' => 'coral-peach.property', 'hash' => null, 'match' => 'coral-peach.property'],
        ['label' => 'About Us', 'route' => 'coral-peach.about',    'hash' => null, 'match' => 'coral-peach.about'],
        ['label' => 'Gallery',  'route' => 'coral-peach.gallery',  'hash' => null, 'match' => 'coral-peach.gallery'],
<<<<<<< HEAD
        ['label' => 'Blog',     'route' => 'coral-peach.blog',     'hash' => null, 'match' => 'coral-peach.blog*'],
=======
>>>>>>> webia/nabiila-fe
        ['label' => 'Contact',  'route' => 'coral-peach.contact',  'hash' => null, 'match' => 'coral-peach.contact'],
    ],

    // Gambar banner pada header setiap halaman dalam (file ada di folder images template).
    'page_images' => [
        'property'      => 'banner-house.jpg',
        'specification' => 'property-5.jpg',
        'price'         => 'property-2.jpg',
        'about'         => 'about-house.jpg',
        'gallery'       => 'gallery-main.jpg',
        'booking'       => 'property-6.jpg',
        'blog'          => 'property-1.jpg',
        'contact'       => 'property-4.jpg',
    ],

    'hero' => [
        'eyebrow' => 'PREMIUM RESIDENTIAL PROPERTY',
        'title_1' => 'Rumah Modern',
        'title_2' => 'untuk Kehidupan Lebih Baik',
        'text'    => 'Dapatkan hunian impian Anda di lokasi strategis dengan desain modern, fasilitas lengkap, dan lingkungan yang nyaman.',
        'image'   => 'hero-house.jpg',
        'features' => [
            ['icon' => 'home',     'title' => '3 Bedrooms',  'sub' => '(3 Kamar Tidur)'],
            ['icon' => 'bath',     'title' => '2 Bathrooms', 'sub' => '(2 Kamar Mandi)'],
            ['icon' => 'car',      'title' => '2 Carport',   'sub' => '(2 Mobil)'],
            ['icon' => 'area',     'title' => '120 m²',      'sub' => 'Luas Tanah'],
        ],
    ],

    // Form pencarian di bawah hero
    'search' => [
        'locations' => [
            ['value' => 'surabaya', 'label' => 'Surabaya'],
            ['value' => 'sidoarjo', 'label' => 'Sidoarjo'],
            ['value' => 'malang',   'label' => 'Malang'],
            ['value' => 'batu',     'label' => 'Batu'],
        ],
        'types' => [
            ['value' => 'residence', 'label' => 'Residence'],
            ['value' => 'villa',     'label' => 'Villa'],
            ['value' => 'house',     'label' => 'House'],
        ],
        'prices' => [
            ['value' => '0-1800000000',           'label' => '< Rp 1,8 Miliar'],
            ['value' => '1800000001-2500000000',  'label' => 'Rp 1,8 – 2,5 Miliar'],
            ['value' => '2500000001-99999999999', 'label' => '> Rp 2,5 Miliar'],
        ],
        'areas' => [
            ['value' => '0-100',   'label' => '≤ 100 m²'],
            ['value' => '101-120', 'label' => '101 – 120 m²'],
            ['value' => '121-999', 'label' => '> 120 m²'],
        ],
    ],

    /*
    | Daftar properti. `land` = luas tanah, `building` = luas bangunan (m²).
    | Empat properti pertama sesuai desain UI.
    */
    'properties' => [
        ['slug' => 'the-grand-residence', 'name' => 'The Grand Residence', 'city' => 'surabaya', 'location' => 'Surabaya, Jawa Timur', 'type' => 'residence', 'status' => 'For Sale', 'beds' => 3, 'baths' => 2, 'land' => 120, 'building' => 100, 'price' => 1850000000, 'image' => 'property-1.jpg'],
        ['slug' => 'central-park-villa',  'name' => 'Central Park Villa',  'city' => 'sidoarjo', 'location' => 'Sidoarjo, Jawa Timur', 'type' => 'villa',     'status' => 'For Sale', 'beds' => 4, 'baths' => 3, 'land' => 150, 'building' => 120, 'price' => 2450000000, 'image' => 'property-2.jpg'],
        ['slug' => 'green-valley-house',  'name' => 'Green Valley House',  'city' => 'malang',   'location' => 'Malang, Jawa Timur',   'type' => 'house',     'status' => 'For Sale', 'beds' => 4, 'baths' => 3, 'land' => 150, 'building' => 120, 'price' => 1650000000, 'image' => 'property-3.jpg'],
        ['slug' => 'sunset-residence',    'name' => 'Sunset Residence',    'city' => 'batu',     'location' => 'Batu, Jawa Timur',     'type' => 'residence', 'status' => 'For Sale', 'beds' => 4, 'baths' => 2, 'land' => 150, 'building' => 130, 'price' => 2990000000, 'image' => 'property-4.jpg'],
        ['slug' => 'skyline-hill-house',  'name' => 'Skyline Hill House',  'city' => 'malang',   'location' => 'Malang, Jawa Timur',   'type' => 'house',     'status' => 'For Sale', 'beds' => 3, 'baths' => 2, 'land' => 130, 'building' => 110, 'price' => 2150000000, 'image' => 'property-5.jpg'],
        ['slug' => 'terrace-view-villa',  'name' => 'Terrace View Villa',  'city' => 'batu',     'location' => 'Batu, Jawa Timur',     'type' => 'villa',     'status' => 'For Sale', 'beds' => 5, 'baths' => 4, 'land' => 200, 'building' => 170, 'price' => 3250000000, 'image' => 'property-6.jpg'],
    ],

    'gallery' => [
        'total_extra' => 13,
        'video'       => null, // isi URL mp4 bila tersedia; null = tampilkan foto pada lightbox
        'items' => [
            ['file' => 'gallery-main.jpg', 'cat' => 'interior',  'alt' => 'Ruang keluarga modern dengan jendela besar'],
            ['file' => 'gallery-2.jpg',    'cat' => 'interior',  'alt' => 'Ruang tamu dengan sofa dan pencahayaan hangat'],
            ['file' => 'gallery-3.jpg',    'cat' => 'interior',  'alt' => 'Sudut ruang tamu dengan dekorasi tanaman'],
            ['file' => 'gallery-4.jpg',    'cat' => 'fasilitas', 'alt' => 'Kolam renang dan area santai'],
            ['file' => 'hero-house.jpg',   'cat' => 'eksterior', 'alt' => 'Tampak depan rumah modern saat senja'],
            ['file' => 'property-1.jpg',   'cat' => 'eksterior', 'alt' => 'The Grand Residence tampak depan'],
            ['file' => 'property-2.jpg',   'cat' => 'eksterior', 'alt' => 'Central Park Villa tampak depan'],
            ['file' => 'property-3.jpg',   'cat' => 'eksterior', 'alt' => 'Green Valley House tampak depan'],
            ['file' => 'property-4.jpg',   'cat' => 'eksterior', 'alt' => 'Sunset Residence tampak depan'],
            ['file' => 'property-5.jpg',   'cat' => 'eksterior', 'alt' => 'Skyline Hill House dengan balkon kaca'],
            ['file' => 'property-6.jpg',   'cat' => 'fasilitas', 'alt' => 'Terrace View Villa dengan teras luas'],
            ['file' => 'about-house.jpg',  'cat' => 'eksterior', 'alt' => 'Fasad rumah dengan taman hijau'],
        ],
        'categories' => [
            ['value' => 'all',       'label' => 'Semua'],
            ['value' => 'eksterior', 'label' => 'Eksterior'],
            ['value' => 'interior',  'label' => 'Interior'],
            ['value' => 'fasilitas', 'label' => 'Fasilitas'],
        ],
    ],

    'price' => [
        'label' => 'Harga Mulai',
        'badge' => 'Terjangkau & Kompetitif',
        'schemes' => [
            ['icon' => 'tag',    'title' => 'Cash Keras',    'text' => 'Harga terbaik dengan potongan khusus untuk pembayaran tunai penuh.'],
            ['icon' => 'layers', 'title' => 'Cash Bertahap', 'text' => 'Cicil langsung ke developer tanpa bank dengan tenor fleksibel.'],
            ['icon' => 'shield', 'title' => 'KPR Bank',      'text' => 'Bekerja sama dengan bank mitra untuk proses KPR yang cepat dan transparan.'],
        ],
    ],

    'specs' => [
        ['icon' => 'land',     'label' => 'Luas Tanah',      'value' => '120 m²'],
        ['icon' => 'car',      'label' => 'Carport',         'value' => '2 Mobil'],
        ['icon' => 'area',     'label' => 'Luas Bangunan',   'value' => '100 m²'],
        ['icon' => 'file',     'label' => 'Sertifikat',      'value' => 'SHM'],
        ['icon' => 'bed',      'label' => 'Kamar Tidur',     'value' => '3'],
        ['icon' => 'calendar', 'label' => 'Tahun Dibangun',  'value' => '2022'],
        ['icon' => 'bath',     'label' => 'Kamar Mandi',     'value' => '2'],
        ['icon' => 'zap',      'label' => 'Listrik',         'value' => '2200 VA'],
    ],

    'spec_groups' => [
        ['title' => 'Fasilitas Perumahan', 'icon' => 'shield', 'items' => ['Keamanan 24 jam & CCTV', 'One gate system', 'Taman & area hijau', 'Jalan lingkungan lebar', 'Area bermain anak', 'Masjid & fasilitas ibadah']],
        ['title' => 'Kelengkapan Rumah',   'icon' => 'home',   'items' => ['Dapur & pantry', 'Carport 2 mobil', 'Balkon / teras', 'Instalasi air bersih PDAM', 'Daya listrik 2200 VA', 'Plafon & lantai granit']],
        ['title' => 'Akses & Sekitar',     'icon' => 'pin',    'items' => ['5 menit ke akses tol', '10 menit ke pusat kota', 'Dekat sekolah & rumah sakit', 'Dekat pusat perbelanjaan', 'Transportasi umum mudah', 'Lingkungan aman & nyaman']],
    ],

    'location' => [
        'title'    => 'Lokasi & Akses',
        'subtitle' => 'Lokasi strategis dengan akses mudah',
        'map'      => 'map.jpg', // gambar cadangan saat peta interaktif belum termuat
        'embed_url' => 'https://www.google.com/maps?q=Jl.+Melati+No.+15,+Surabaya,+Jawa+Timur&output=embed',
        'points'   => ['5 menit ke tol', '10 menit ke pusat kota', 'Dekat dengan sekolah & rumah sakit'],
    ],

    'booking' => [
        'title'    => 'Jadwal Booking / Viewing',
        'subtitle' => 'Pilih tanggal dan waktu kunjungan Anda',
        'home_text' => 'Lihat langsung hunian impian Anda bersama konsultan kami. Cukup satu ketukan, jadwal viewing kami konfirmasi lewat WhatsApp.',
        'wa_text'  => 'Halo Coral Homes, saya ingin booking viewing properti. Mohon info jadwal yang tersedia.',
        'closed_weekdays' => [0], // 0 = Minggu (tutup)
        'slots'    => ['09:00', '10:00', '11:00', '13:00', '14:00', '15:00', '16:00', '17:00'],
        'steps' => [
            ['title' => 'Ajukan Jadwal',      'text' => 'Kirim permintaan viewing Anda lewat WhatsApp.'],
            ['title' => 'Konfirmasi Tim',     'text' => 'Tim kami membalas untuk mengonfirmasi tanggal & waktu.'],
            ['title' => 'Kunjungi Properti',  'text' => 'Lihat langsung unit & lingkungan bersama konsultan.'],
        ],
    ],

    'about' => [
        'title'    => 'Tentang Coral Homes',
        'subtitle' => 'Mitra tepercaya untuk menemukan hunian impian Anda',
        'text'     => [
            'Coral Homes adalah agensi properti residensial yang berfokus pada hunian modern berkualitas di Jawa Timur. Kami memadukan desain kontemporer, lokasi strategis, dan lingkungan yang nyaman agar setiap keluarga dapat tumbuh dengan lebih baik.',
            'Dengan tim konsultan yang berpengalaman, kami mendampingi Anda mulai dari memilih unit, simulasi pembayaran, hingga serah terima kunci — transparan, cepat, dan tanpa ribet.',
        ],
        'image' => 'about-house.jpg',
        'stats' => [
            ['value' => '10+',  'label' => 'Tahun Pengalaman'],
            ['value' => '500+', 'label' => 'Unit Terjual'],
            ['value' => '4',    'label' => 'Kota Lokasi Proyek'],
            ['value' => '98%',  'label' => 'Klien Puas'],
        ],
        'values' => [
            ['icon' => 'shield', 'title' => 'Legalitas Jelas', 'text' => 'Seluruh unit berstatus SHM dengan dokumen lengkap dan transparan.'],
            ['icon' => 'award',  'title' => 'Kualitas Terbaik', 'text' => 'Material pilihan dan pengerjaan rapi oleh kontraktor berpengalaman.'],
            ['icon' => 'users',  'title' => 'Layanan Personal', 'text' => 'Konsultan kami siap mendampingi Anda di setiap tahap pembelian.'],
        ],
    ],

    'blog' => [
        'title'    => 'Blog & Tips Properti',
        'subtitle' => 'Panduan, tips, dan insight seputar membeli hunian impian',
        'categories' => [
            ['value' => 'all',    'label' => 'Semua'],
            ['value' => 'tips',   'label' => 'Tips Membeli'],
            ['value' => 'desain', 'label' => 'Desain & Interior'],
            ['value' => 'invest', 'label' => 'Investasi'],
        ],
        'posts' => [
<<<<<<< HEAD
            [
                'slug' => 'tips-memilih-rumah-pertama', 'cat' => 'tips', 'cat_label' => 'Tips Membeli', 'date' => '12 Okt 2026', 'read' => '5 menit', 'author' => 'Tim Coral Homes',
                'image' => 'property-1.jpg', 'cover' => 'banner-house.jpg',
                'title'   => '7 Tips Memilih Rumah Pertama agar Tidak Menyesal',
                'excerpt' => 'Mulai dari lokasi, legalitas, hingga akses transportasi: inilah hal penting yang perlu dicek sebelum menandatangani akad.',
                'content' => [
                    ['type' => 'p', 'text' => 'Membeli rumah pertama adalah keputusan besar. Nilainya tinggi, tenornya panjang, dan rumah itu akan menjadi tempat keluarga Anda tumbuh selama bertahun-tahun. Agar tidak menyesal di kemudian hari, pastikan tujuh hal berikut sudah Anda cek sebelum menandatangani akad.'],
                    ['type' => 'h2', 'text' => '1. Tentukan anggaran yang realistis'],
                    ['type' => 'p', 'text' => 'Mulailah dari kemampuan finansial, bukan dari harga rumah impian. Sebagai patokan umum, cicilan bulanan sebaiknya tidak melebihi sepertiga penghasilan rutin. Sisakan juga dana darurat agar kebutuhan lain tetap aman setelah rumah dibeli.'],
                    ['type' => 'h2', 'text' => '2. Cek legalitas sebelum jatuh cinta pada desain'],
                    ['type' => 'p', 'text' => 'Desain yang indah tidak berarti apa-apa jika dokumennya bermasalah. Mintalah penjelasan lengkap tentang status tanah dan bangunan, dan pastikan hal berikut tersedia:'],
                    ['type' => 'list', 'items' => ['Sertifikat tanah yang jelas, idealnya SHM atas nama pemilik atau pengembang', 'Izin mendirikan bangunan (IMB atau PBG) yang sesuai dengan fisik rumah', 'Bukti pembayaran PBB yang lunas', 'Pernyataan bahwa objek tidak dalam sengketa atau jaminan pihak lain']],
                    ['type' => 'h2', 'text' => '3. Pertimbangkan lokasi dan akses harian'],
                    ['type' => 'p', 'text' => 'Coba lewati rute dari rumah ke kantor, sekolah, dan pusat kota pada jam sibuk, bukan hanya saat akhir pekan. Akses tol, transportasi umum, serta kedekatan dengan rumah sakit dan pusat belanja akan sangat memengaruhi kenyamanan sekaligus nilai jual kembali.'],
                    ['type' => 'h2', 'text' => '4. Periksa kualitas bangunan'],
                    ['type' => 'p', 'text' => 'Datanglah saat siang hari dan perhatikan detail kecil yang sering terlewat:'],
                    ['type' => 'list', 'items' => ['Retak rambut pada dinding dan plafon', 'Bekas rembesan air di sudut ruangan atau kamar mandi', 'Tekanan air, instalasi listrik, dan fungsi semua keran serta saklar', 'Kerapian pintu, jendela, dan lantai']],
                    ['type' => 'h2', 'text' => '5. Kenali lingkungan dan fasilitasnya'],
                    ['type' => 'p', 'text' => 'Bicaralah dengan calon tetangga, lihat sistem keamanan, kebersihan lingkungan, dan fasilitas bersama seperti taman atau area bermain. Lingkungan yang nyaman sering kali sama pentingnya dengan rumah itu sendiri.'],
                    ['type' => 'h2', 'text' => '6. Hitung biaya tambahan'],
                    ['type' => 'p', 'text' => 'Harga rumah bukan satu-satunya pengeluaran. Siapkan dana untuk:'],
                    ['type' => 'list', 'items' => ['Uang muka dan biaya administrasi KPR', 'Pajak pembelian (BPHTB) dan biaya notaris', 'Asuransi jiwa dan kebakaran', 'Renovasi ringan, perabot, dan biaya pindahan']],
                    ['type' => 'h2', 'text' => '7. Lakukan viewing lebih dari sekali'],
                    ['type' => 'p', 'text' => 'Kunjungi rumah pada waktu berbeda, misalnya pagi dan sore, untuk melihat pencahayaan, suhu ruangan, kebisingan, dan kondisi lingkungan. Ajak anggota keluarga agar keputusan diambil bersama.'],
                    ['type' => 'quote', 'text' => 'Rumah yang tepat bukan yang paling mewah, tetapi yang paling sesuai dengan kemampuan dan kebutuhan keluarga Anda.'],
                    ['type' => 'p', 'text' => 'Jika Anda ingin didampingi mulai dari memilih unit hingga proses akad, tim Coral Homes siap membantu dengan penjelasan yang transparan dan tanpa tekanan.'],
                ],
            ],
            [
                'slug' => 'desain-rumah-modern-tropis', 'cat' => 'desain', 'cat_label' => 'Desain & Interior', 'date' => '05 Okt 2026', 'read' => '4 menit', 'author' => 'Tim Coral Homes',
                'image' => 'gallery-main.jpg', 'cover' => 'gallery-main.jpg',
                'title'   => 'Desain Rumah Modern Tropis: Terang, Sejuk, dan Hangat',
                'excerpt' => 'Jendela besar, material kayu, dan tanaman hijau membuat hunian terasa lapang tanpa bergantung pada pendingin ruangan.',
                'content' => [
                    ['type' => 'p', 'text' => 'Iklim tropis menuntut rumah yang pandai mengelola cahaya, panas, dan hujan. Desain modern tropis menjawabnya dengan garis bangunan yang bersih, bukaan yang lebar, dan material alami sehingga hunian terasa lapang, sejuk, dan tetap hangat secara visual.'],
                    ['type' => 'h2', 'text' => 'Ventilasi silang dan bukaan besar'],
                    ['type' => 'p', 'text' => 'Kunci rumah yang sejuk adalah aliran udara. Tempatkan jendela atau pintu pada sisi yang berseberangan agar angin dapat mengalir melewati ruangan. Jendela kaca besar juga memasukkan cahaya alami sehingga lampu tidak perlu menyala di siang hari.'],
                    ['type' => 'h2', 'text' => 'Overhang dan peneduh yang cukup'],
                    ['type' => 'p', 'text' => 'Atap yang menjorok keluar, kanopi, atau kisi-kisi kayu melindungi dinding dan kaca dari sinar matahari langsung serta tampias hujan. Hasilnya, ruangan lebih sejuk dan perawatan fasad jauh lebih ringan.'],
                    ['type' => 'h2', 'text' => 'Material alami yang tahan iklim'],
                    ['type' => 'p', 'text' => 'Perpaduan material alami memberi karakter hangat pada rumah modern:'],
                    ['type' => 'list', 'items' => ['Kayu atau panel berserat kayu pada plafon dan aksen dinding', 'Batu alam pada area taman atau dinding aksen', 'Plester dengan warna netral yang memantulkan panas', 'Lantai granit atau motif kayu yang mudah dirawat']],
                    ['type' => 'h2', 'text' => 'Hadirkan tanaman di dalam dan luar rumah'],
                    ['type' => 'p', 'text' => 'Tanaman membantu menurunkan suhu sekitar, menyaring debu, dan memberi suasana segar. Taman kecil di sisi ruang keluarga atau tanaman pot di dekat jendela sudah cukup untuk membawa nuansa hijau ke dalam rumah.'],
                    ['type' => 'h2', 'text' => 'Pencahayaan hangat di malam hari'],
                    ['type' => 'p', 'text' => 'Gunakan lampu dengan warna hangat pada plafon, dinding, dan sudut ruang. Pencahayaan berlapis menciptakan suasana nyaman tanpa membuat ruangan terasa silau.'],
                    ['type' => 'quote', 'text' => 'Rumah tropis yang baik terasa terang di siang hari dan hangat di malam hari, tanpa harus boros energi.'],
                    ['type' => 'p', 'text' => 'Banyak unit Coral Homes dirancang dengan prinsip ini: jendela besar, balkon kaca, dan taman hijau yang menyatu dengan ruang keluarga.'],
                ],
            ],
            [
                'slug' => 'properti-sebagai-investasi', 'cat' => 'invest', 'cat_label' => 'Investasi', 'date' => '28 Sep 2026', 'read' => '6 menit', 'author' => 'Tim Coral Homes',
                'image' => 'property-2.jpg', 'cover' => 'about-house.jpg',
                'title'   => 'Kenapa Properti Residensial Masih Jadi Investasi Favorit',
                'excerpt' => 'Nilai aset yang cenderung naik dan potensi sewa menjadikan rumah pilihan investasi jangka panjang yang stabil.',
                'content' => [
                    ['type' => 'p', 'text' => 'Di tengah banyaknya pilihan instrumen investasi, properti residensial tetap diminati karena wujudnya nyata, dapat dimanfaatkan, dan umumnya bernilai stabil dalam jangka panjang. Berikut alasan serta hal yang perlu Anda perhatikan sebelum memulai.'],
                    ['type' => 'h2', 'text' => 'Nilai aset cenderung naik dalam jangka panjang'],
                    ['type' => 'p', 'text' => 'Lahan di kawasan berkembang terbatas, sementara kebutuhan hunian terus bertambah. Dalam jangka panjang, kondisi ini cenderung mendorong kenaikan nilai properti, terutama di lokasi dengan akses infrastruktur yang baik. Meski begitu, kenaikan tidak selalu seragam dan tidak dijamin.'],
                    ['type' => 'h2', 'text' => 'Potensi pendapatan dari sewa'],
                    ['type' => 'p', 'text' => 'Selain nilai asetnya, rumah dapat disewakan untuk mendapatkan pemasukan rutin. Lokasi dekat kampus, kawasan bisnis, atau akses tol biasanya lebih mudah mendapatkan penyewa.'],
                    ['type' => 'h2', 'text' => 'Faktor yang perlu dicek sebelum membeli'],
                    ['type' => 'list', 'items' => ['Akses infrastruktur: jalan tol, transportasi umum, dan rencana pengembangan kawasan', 'Pertumbuhan kawasan dan kelengkapan fasilitas sekitar', 'Legalitas yang jelas agar mudah dijual kembali', 'Likuiditas: seberapa cepat unit sejenis laku di area tersebut']],
                    ['type' => 'h2', 'text' => 'Hitung imbal hasil dengan realistis'],
                    ['type' => 'p', 'text' => 'Sebagai ilustrasi, rumah seharga Rp 1,65 miliar yang disewakan Rp 6 juta per bulan menghasilkan Rp 72 juta per tahun, atau sekitar 4,4 persen dari harga beli sebelum dikurangi pajak dan biaya perawatan. Angka ini hanya contoh; hitung ulang dengan harga sewa pasar di lokasi yang Anda incar.'],
                    ['type' => 'h2', 'text' => 'Kenali risikonya'],
                    ['type' => 'p', 'text' => 'Properti bukan investasi tanpa risiko. Unit bisa kosong tanpa penyewa, biaya perawatan terus berjalan, dan menjual aset memerlukan waktu. Pastikan Anda berinvestasi dengan dana yang tidak mengganggu kebutuhan harian.'],
                    ['type' => 'quote', 'text' => 'Investasi properti paling aman dimulai dari lokasi yang tepat, legalitas yang jelas, dan perhitungan yang jujur.'],
                    ['type' => 'p', 'text' => 'Artikel ini bersifat informasi umum dan bukan nasihat keuangan. Konsultasikan rencana investasi Anda dengan penasihat keuangan, dan hubungi tim kami bila ingin berdiskusi tentang unit yang tersedia.'],
                ],
            ],
=======
            ['slug' => 'tips-memilih-rumah-pertama', 'cat' => 'tips', 'cat_label' => 'Tips Membeli', 'date' => '12 Okt 2026', 'read' => '5 menit', 'image' => 'property-1.jpg',
             'title' => '7 Tips Memilih Rumah Pertama agar Tidak Menyesal',
             'excerpt' => 'Mulai dari lokasi, legalitas, hingga akses transportasi — inilah hal penting yang perlu dicek sebelum menandatangani akad.',
             'body' => 'Pastikan Anda memeriksa legalitas (SHM/IMB), jarak ke tempat kerja dan sekolah, kualitas bangunan, serta rencana pengembangan kawasan. Hitung juga cicilan agar tidak melebihi sepertiga penghasilan bulanan.'],
            ['slug' => 'desain-rumah-modern-tropis', 'cat' => 'desain', 'cat_label' => 'Desain & Interior', 'date' => '05 Okt 2026', 'read' => '4 menit', 'image' => 'gallery-main.jpg',
             'title' => 'Desain Rumah Modern Tropis: Terang, Sejuk, dan Hangat',
             'excerpt' => 'Jendela besar, material kayu, dan tanaman hijau membuat hunian terasa lapang tanpa bergantung pada pendingin ruangan.',
             'body' => 'Gunakan ventilasi silang, overhang yang cukup untuk meredam panas, serta perpaduan material alami seperti kayu dan batu. Tambahkan tanaman indoor untuk suasana yang lebih segar.'],
            ['slug' => 'properti-sebagai-investasi', 'cat' => 'invest', 'cat_label' => 'Investasi', 'date' => '28 Sep 2026', 'read' => '6 menit', 'image' => 'property-2.jpg',
             'title' => 'Kenapa Properti Residensial Masih Jadi Investasi Favorit',
             'excerpt' => 'Nilai aset yang cenderung naik dan potensi sewa menjadikan rumah pilihan investasi jangka panjang yang stabil.',
             'body' => 'Pilih kawasan yang berkembang dengan akses infrastruktur baik. Perhatikan potensi kenaikan harga tanah, tingkat hunian sewa, dan biaya perawatan untuk menghitung imbal hasil yang realistis.'],
>>>>>>> webia/nabiila-fe
        ],
    ],

    'faq' => [
        'greeting' => 'Halo! Saya AI Assistant dari Coral Homes. Ada yang bisa saya bantu?',
        'fallback' => 'Maaf, saya belum menemukan jawaban yang pas. Anda bisa menghubungi tim kami langsung melalui WhatsApp untuk bantuan lebih lanjut.',
        'quick'    => [
            ['label' => 'Info properti',     'key' => 'properti'],
            ['label' => 'Harga & promo',     'key' => 'harga'],
            ['label' => 'Jadwal viewing',    'key' => 'viewing'],
            ['label' => 'Proses pembelian',  'key' => 'proses'],
            ['label' => 'Lokasi & akses',    'key' => 'lokasi'],
        ],
        'items' => [
            ['key' => 'properti', 'keywords' => ['properti', 'rumah', 'unit', 'tipe', 'kamar', 'spesifikasi', 'luas', 'sertifikat'],
             'answer' => 'Kami menawarkan hunian modern bertipe 3–5 kamar tidur dengan luas tanah mulai 120 m², sertifikat SHM, listrik 2200 VA, dan carport untuk 2 mobil di Surabaya, Sidoarjo, Malang, dan Batu.'],
            ['key' => 'harga', 'keywords' => ['harga', 'biaya', 'promo', 'diskon', 'dp', 'kpr', 'cicilan', 'bayar', 'cash'],
             'answer' => 'Harga mulai Rp 1.650.000.000. Tersedia skema Cash Keras, Cash Bertahap, dan KPR bank mitra. Hubungi tim kami untuk promo terbaru bulan ini.'],
            ['key' => 'viewing', 'keywords' => ['viewing', 'kunjungan', 'jadwal', 'survey', 'booking', 'lihat', 'datang'],
             'answer' => 'Viewing tersedia Senin–Sabtu pukul 09:00–18:00. Silakan pilih tanggal dan waktu pada form Booking / Viewing, tim kami akan mengonfirmasi jadwal Anda.'],
            ['key' => 'proses', 'keywords' => ['proses', 'beli', 'pembelian', 'akad', 'langkah', 'cara', 'dokumen'],
             'answer' => 'Prosesnya: 1) pilih unit & viewing, 2) booking fee, 3) pilih skema pembayaran, 4) akad & penandatanganan, 5) serah terima kunci. Konsultan kami mendampingi di setiap tahap.'],
            ['key' => 'lokasi', 'keywords' => ['lokasi', 'alamat', 'akses', 'tol', 'dekat', 'maps', 'peta', 'jarak'],
             'answer' => 'Kantor kami di Jl. Melati No. 15, Surabaya, Jawa Timur. Akses tol hanya 5 menit, pusat kota 10 menit, dan dekat sekolah serta rumah sakit.'],
            ['key' => 'jam', 'keywords' => ['jam', 'buka', 'operasional', 'kontak', 'telepon', 'whatsapp', 'wa', 'hubungi'],
             'answer' => 'Jam operasional Senin–Sabtu 09:00–18:00. Hubungi kami di +62 812 3456 7890 atau info@coralhomes.id.'],
        ],
    ],

    'footer' => [
        'about_text' => 'Hunian modern di lokasi strategis untuk kehidupan yang lebih baik.',
        'credit'     => '© 2026 WEBIA by D-KREASI. Seluruh hak cipta dilindungi.',
    ],
];
