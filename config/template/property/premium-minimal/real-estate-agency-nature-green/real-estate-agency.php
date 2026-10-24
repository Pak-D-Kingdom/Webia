<?php

/*
|--------------------------------------------------------------------------
| GreenEstate — Premium Minimal · Nature Green
|--------------------------------------------------------------------------
| Seluruh konten & path aset template ada di sini. View hanya membaca data,
| sehingga tim backend cukup mengganti sumber datanya (DB/API) nanti.
*/
$address = 'Jl. Melati No. 12, Bandung, Jawa Barat';
$base    = 'website-bisnis/template/property/premium-minimal/real-estate-agency-nature-green';

// Peta tertanam (tanpa API key) & tautan Google Maps dari sebuah alamat
$embed = fn (string $a) => 'https://maps.google.com/maps?q=' . rawurlencode($a) . '&hl=id&z=15&output=embed';
$photo = fn (string $file, string $alt) => ['image' => $file, 'alt' => $alt];

// Data contoh — ganti dengan data asli. Beranda menampilkan 3 properti pertama.
$properties = array_map(fn (array $p) => $p + ['maps_embed' => $embed($p['address'])], [
    [
        'slug' => 'emerald-residence', 'name' => 'The Emerald Residence', 'city' => 'Bandung, Jawa Barat',
        'address' => 'Jl. Zamrud No. 5, Bandung, Jawa Barat', 'image' => 'property-1.jpg',
        'beds' => 3, 'baths' => 2, 'carport' => 2, 'land' => 180, 'building' => 150,
        'certificate' => 'SHM', 'year' => 2022, 'power' => '2200 VA',
        'price' => 'Rp 2.850.000.000', 'price_old' => null, 'discount' => null,
        'gallery' => [$photo('property-1.jpg', 'Tampak depan The Emerald Residence'), $photo('gallery-1.jpg', 'Ruang keluarga'), $photo('gallery-2.jpg', 'Kolam renang'), $photo('gallery-3.jpg', 'Kamar tidur'), $photo('gallery-4.jpg', 'Taman dan fasad rumah')],
    ],
    [
        'slug' => 'green-valley-house', 'name' => 'Green Valley House', 'city' => 'Lembang, Jawa Barat',
        'address' => 'Jl. Raya Lembang No. 21, Lembang, Jawa Barat', 'image' => 'property-2.jpg',
        'beds' => 4, 'baths' => 3, 'carport' => 2, 'land' => 220, 'building' => 190,
        'certificate' => 'SHM', 'year' => 2023, 'power' => '3500 VA',
        'price' => 'Rp 3.250.000.000', 'price_old' => null, 'discount' => null,
        'gallery' => [$photo('property-2.jpg', 'Tampak depan Green Valley House'), $photo('gallery-5.jpg', 'Area dapur dan makan'), $photo('gallery-1.jpg', 'Ruang keluarga'), $photo('gallery-4.jpg', 'Taman dan fasad rumah'), $photo('gallery-3.jpg', 'Kamar tidur')],
    ],
    [
        'slug' => 'sunrise-villa', 'name' => 'Sunrise Villa', 'city' => 'Cimahi, Jawa Barat',
        'address' => 'Jl. Cihanjuang No. 18, Cimahi, Jawa Barat', 'image' => 'property-3.jpg',
        'beds' => 3, 'baths' => 2, 'carport' => 2, 'land' => 160, 'building' => 130,
        'certificate' => 'SHM', 'year' => 2022, 'power' => '2200 VA',
        'price' => 'Rp 2.450.000.000', 'price_old' => 'Rp 2.850.000.000', 'discount' => '14% OFF',
        'gallery' => [$photo('property-3.jpg', 'Tampak depan Sunrise Villa'), $photo('gallery-2.jpg', 'Kolam renang'), $photo('gallery-6.jpg', 'Sudut ruang keluarga'), $photo('gallery-3.jpg', 'Kamar tidur'), $photo('gallery-1.jpg', 'Ruang keluarga')],
    ],
    [
        'slug' => 'maple-terrace', 'name' => 'Maple Terrace', 'city' => 'Dago, Jawa Barat',
        'address' => 'Jl. Dago Asri No. 7, Bandung, Jawa Barat', 'image' => 'property-4.jpg',
        'beds' => 3, 'baths' => 2, 'carport' => 1, 'land' => 150, 'building' => 120,
        'certificate' => 'HGB', 'year' => 2021, 'power' => '2200 VA',
        'price' => 'Rp 2.150.000.000', 'price_old' => null, 'discount' => null,
        'gallery' => [$photo('property-4.jpg', 'Tampak depan Maple Terrace'), $photo('gallery-6.jpg', 'Sudut ruang keluarga'), $photo('gallery-5.jpg', 'Area dapur dan makan'), $photo('gallery-4.jpg', 'Taman dan fasad rumah'), $photo('gallery-3.jpg', 'Kamar tidur')],
    ],
    [
        'slug' => 'cedar-lodge', 'name' => 'Cedar Lodge', 'city' => 'Pangalengan, Jawa Barat',
        'address' => 'Jl. Raya Pangalengan No. 40, Bandung, Jawa Barat', 'image' => 'property-5.jpg',
        'beds' => 4, 'baths' => 3, 'carport' => 2, 'land' => 260, 'building' => 200,
        'certificate' => 'SHM', 'year' => 2023, 'power' => '4400 VA',
        'price' => 'Rp 3.600.000.000', 'price_old' => null, 'discount' => null,
        'gallery' => [$photo('property-5.jpg', 'Tampak depan Cedar Lodge'), $photo('gallery-1.jpg', 'Ruang keluarga'), $photo('gallery-2.jpg', 'Kolam renang'), $photo('gallery-5.jpg', 'Area dapur dan makan'), $photo('gallery-4.jpg', 'Taman dan fasad rumah')],
    ],
]);

return [
    'assets' => [
        'css'    => "css/{$base}/real-estate-agency.css",
        'js'     => "js/{$base}/real-estate-agency.js",
        'images' => "images/{$base}",
    ],

    'meta' => [
        'title'       => 'GreenEstate — Modern Home in Harmony with Nature',
        'description' => 'Hunian modern dengan desain elegan, lingkungan asri, dan lokasi strategis.',
    ],

    'brand' => ['name' => 'GreenEstate', 'tagline' => 'Better Home, Brighter Future'],

    'contact' => [
        'address'       => $address,
        'email'         => 'hello@greenestate.id',
        'hours'         => 'Mon - Sun 08.00 - 18.00',
        'phone'         => '+62 812 3456 7890',
        'phone_tel'     => '+6281234567890',
        'whatsapp'      => '62895630300345', // 0895630300345 — tujuan semua form, tombol WhatsApp, & asisten AI
        'whatsapp_text' => 'Halo GreenEstate, saya tertarik dengan properti Anda.',
        'maps_embed'    => $embed($address),
        'maps_url'      => 'https://www.google.com/maps/search/?api=1&query=' . rawurlencode($address),
    ],

    'socials' => [
        ['label' => 'Instagram', 'icon' => 'instagram', 'url' => '#'],
        ['label' => 'Facebook',  'icon' => 'facebook',  'url' => '#'],
        ['label' => 'YouTube',   'icon' => 'youtube',   'url' => '#'],
    ],

    // Gambar header tiap halaman (kunci = nama halaman aktif), banner CTA, & kartu booking beranda
    'banner'        => 'banner.jpg',
    'booking_image' => 'booking.jpg',
    'page_images'   => [
        'properties' => 'page-properties.jpg',
        'about'      => 'page-about.jpg',
        'gallery'    => 'page-gallery.jpg',
        'booking'    => 'page-booking.jpg',
        'blog'       => 'page-blog.jpg',
        'contact'    => 'page-contact.jpg',
    ],

    'hero' => [
        'desc'   => 'Hunian modern dengan desain elegan, lingkungan asri, dan lokasi strategis. Pilihan sempurna untuk keluarga yang menginginkan kenyamanan dan kualitas hidup yang lebih baik.',
        'script' => "Your Dream Home\nAwaits",
        'slides' => [
            ['image' => 'hero-1.jpg', 'property' => 'emerald-residence',  'title' => "Modern Home\nin Harmony with Nature"],
            ['image' => 'hero-2.jpg', 'property' => 'green-valley-house', 'title' => "Green Living\nfor Every Family"],
            ['image' => 'hero-3.jpg', 'property' => 'sunrise-villa',      'title' => "Sunrise Views,\nCalm Every Morning"],
            ['image' => 'hero-4.jpg', 'property' => 'maple-terrace',      'title' => "Warm Spaces\nSurrounded by Green"],
            ['image' => 'hero-5.jpg', 'property' => 'cedar-lodge',        'title' => "A Quiet Retreat\nClose to the City"],
        ],
    ],

    'properties' => $properties,

    'gallery' => [
        'more'  => 12,
        'items' => [
            ['image' => 'gallery-1.jpg', 'alt' => 'Ruang keluarga dengan jendela besar'],
            ['image' => 'gallery-2.jpg', 'alt' => 'Tampak depan rumah dengan kolam renang'],
            ['image' => 'gallery-3.jpg', 'alt' => 'Kamar tidur utama'],
            ['image' => 'gallery-4.jpg', 'alt' => 'Taman dan fasad rumah'],
            ['image' => 'gallery-5.jpg', 'alt' => 'Area dapur dan makan'],
            ['image' => 'gallery-6.jpg', 'alt' => 'Sudut ruang keluarga'],
        ],
    ],

    'price' => [
        'start'    => 'Rp 2.450.000.000',
        'sub'      => 'Investasi terbaik untuk masa depan',
        'benefits' => ['Harga kompetitif', 'Sistem pembayaran fleksibel', 'Bebas biaya administrasi'],
    ],

    'about' => [
        'title'  => 'Tentang GreenEstate',
        'text'   => 'GreenEstate menghadirkan hunian modern yang menyatu dengan alam. Setiap properti kami pilih dengan teliti, mulai dari desain, lingkungan, hingga akses lokasi, agar keluarga Anda tinggal lebih nyaman.',
        'image'  => 'about.jpg',
        'points' => ['Desain elegan dan lingkungan asri', 'Lokasi strategis dengan akses mudah', 'Pendampingan dari viewing hingga serah terima'],
    ],

    // Artikel blog: tiap item punya halaman sendiri (/blog/{slug}). `body` berisi blok h (judul), p (paragraf), ul (daftar).
    'blog' => [
        [
            'slug' => 'tips-memilih-rumah-asri-dan-nyaman', 'image' => 'blog-1.jpg', 'category' => 'Tips Properti',
            'date' => '12 Okt 2026', 'read' => '4 menit baca', 'author' => 'Tim GreenEstate',
            'title' => '5 Tips Memilih Rumah yang Asri dan Nyaman',
            'excerpt' => 'Mulai dari sirkulasi udara hingga akses jalan, ini hal yang perlu dicek sebelum memutuskan.',
            'lead' => 'Rumah yang asri bukan hanya soal taman yang hijau. Sirkulasi udara, cahaya, lingkungan, dan akses harian ikut menentukan apakah rumah itu benar-benar nyaman ditinggali.',
            'body' => [
                ['h' => '1. Perhatikan sirkulasi udara dan cahaya alami'],
                ['p' => 'Rumah dengan bukaan yang baik terasa lebih sejuk dan hemat listrik. Saat viewing, cek apakah jendela dan ventilasi saling berhadapan sehingga udara bisa mengalir, dan apakah sinar matahari pagi masuk ke ruang keluarga atau kamar tidur.'],
                ['h' => '2. Nilai lingkungan sekitar'],
                ['p' => 'Lihat ruang hijau, kebersihan saluran air, dan kondisi jalan lingkungan. Kawasan yang tertata biasanya lebih nyaman dan nilainya lebih terjaga dalam jangka panjang.'],
                ['h' => '3. Pastikan akses dan lokasi sesuai rutinitas'],
                ['p' => 'Hitung waktu tempuh ke kantor, sekolah, dan fasilitas kesehatan pada jam sibuk, bukan hanya jarak di peta. Rumah yang indah akan terasa melelahkan jika perjalanan harian terlalu menyita waktu.'],
                ['h' => '4. Periksa kualitas bangunan'],
                ['p' => 'Perhatikan retakan dinding, tanda rembesan di plafon, kondisi atap, dan tekanan air. Hal-hal kecil ini sering luput saat kita terpukau oleh tampilan luar.'],
                ['h' => '5. Cek legalitas dan sesuaikan dengan anggaran'],
                ['p' => 'Pastikan jenis sertifikat dan dokumen bangunan jelas, lalu bandingkan total biaya, termasuk pajak dan biaya pengurusan, dengan anggaran Anda. Pilih rumah yang nyaman tanpa membuat keuangan keluarga tertekan.'],
                ['p' => 'Dengan daftar sederhana ini, proses memilih rumah menjadi lebih terarah. Jadwalkan viewing agar Anda bisa merasakan langsung suasana rumahnya.'],
            ],
        ],
        [
            'slug' => 'mengenal-sertifikat-shm', 'image' => 'blog-2.jpg', 'category' => 'Panduan',
            'date' => '28 Sep 2026', 'read' => '5 menit baca', 'author' => 'Tim GreenEstate',
            'title' => 'Mengenal Sertifikat SHM dan Keunggulannya',
            'excerpt' => 'Pahami perbedaan jenis sertifikat agar transaksi properti Anda aman dan tenang.',
            'lead' => 'Sebelum membeli properti, pahami dulu jenis sertifikatnya. Sertifikat Hak Milik (SHM) termasuk yang paling banyak dicari karena kedudukannya yang kuat.',
            'body' => [
                ['h' => 'Apa itu SHM?'],
                ['p' => 'SHM adalah bukti kepemilikan tanah dengan hak yang paling kuat dan penuh. Pemegangnya dapat memakai, mewariskan, menjual, dan menjadikannya jaminan, serta tidak dibatasi jangka waktu tertentu.'],
                ['h' => 'Apa bedanya dengan HGB?'],
                ['p' => 'Hak Guna Bangunan (HGB) memberi hak mendirikan dan memiliki bangunan di atas tanah dengan jangka waktu tertentu yang dapat diperpanjang. Karena itu, status tanah perlu diperhatikan bila Anda berencana tinggal atau berinvestasi dalam waktu lama.'],
                ['h' => 'Yang perlu dicek sebelum membeli'],
                ['ul' => ['Nama pemilik di sertifikat sesuai dengan penjual', 'Luas dan batas tanah sesuai kondisi di lapangan', 'Tanah tidak sedang bersengketa atau dijaminkan', 'Keaslian sertifikat sudah dicek melalui kantor pertanahan setempat']],
                ['h' => 'Libatkan notaris atau PPAT'],
                ['p' => 'Proses jual beli sebaiknya dilakukan di hadapan PPAT agar balik nama berjalan sah dan tercatat. Informasi di artikel ini bersifat umum, jadi konsultasikan kondisi spesifik Anda dengan notaris atau PPAT.'],
            ],
        ],
        [
            'slug' => 'persiapan-sebelum-viewing-properti', 'image' => 'blog-3.jpg', 'category' => 'Panduan',
            'date' => '14 Sep 2026', 'read' => '4 menit baca', 'author' => 'Tim GreenEstate',
            'title' => 'Persiapan Sebelum Viewing Properti',
            'excerpt' => 'Daftar singkat pertanyaan dan hal yang perlu diperhatikan saat berkunjung ke lokasi.',
            'lead' => 'Viewing adalah kesempatan terbaik untuk menilai rumah secara langsung. Dengan persiapan singkat, kunjungan Anda akan jauh lebih efektif.',
            'body' => [
                ['h' => 'Tentukan prioritas lebih dulu'],
                ['p' => 'Tulis tiga hal yang paling penting bagi keluarga, misalnya jumlah kamar, ukuran carport, atau jarak ke sekolah. Daftar ini membantu Anda menilai tanpa terbawa suasana.'],
                ['h' => 'Yang perlu dicek di lokasi'],
                ['ul' => ['Kondisi atap, plafon, dan dinding (cari tanda rembesan atau retak)', 'Tekanan air serta fungsi keran dan saluran pembuangan', 'Jumlah titik listrik dan daya yang terpasang', 'Sirkulasi udara dan cahaya di tiap ruangan', 'Suasana lingkungan, termasuk keamanan dan kebisingan']],
                ['h' => 'Pertanyaan untuk tim penjualan'],
                ['ul' => ['Berapa total biaya di luar harga rumah (pajak, notaris, dan lainnya)?', 'Apa jenis sertifikat dan bagaimana status dokumen bangunannya?', 'Skema pembayaran apa saja yang tersedia?', 'Kapan unit bisa diserahterimakan?']],
                ['p' => 'Jangan ragu mengambil foto dan catatan agar mudah membandingkan beberapa properti. Dokumen bangunan kini dikenal sebagai PBG (Persetujuan Bangunan Gedung), yang sebelumnya bernama IMB.'],
            ],
        ],
    ],

    // Halaman Booking / Viewing
    'booking' => [
        'slots'    => ['08.00', '09.00', '10.00', '11.00', '13.00', '14.00', '15.00', '16.00', '17.00'],
        'visitors' => ['1 orang', '2 orang', '3 orang', '4 orang', '5 orang atau lebih'],
        'steps'    => [
            ['title' => 'Pilih properti dan jadwal', 'text' => 'Tentukan unit yang ingin dikunjungi serta tanggal dan jam yang nyaman bagi Anda.'],
            ['title' => 'Tunggu konfirmasi', 'text' => 'Tim kami menghubungi Anda untuk memastikan jadwal kunjungan.'],
            ['title' => 'Kunjungi dan rasakan langsung', 'text' => 'Lihat kondisi rumah, lingkungan, dan tanyakan apa pun kepada tim kami di lokasi.'],
        ],
    ],


    // Dipakai AI Property Assistant. `keywords` dicocokkan dengan pertanyaan pengunjung.
    'faq' => [
        ['q' => 'Apakah properti ini masih tersedia?',  'keywords' => ['tersedia', 'ready', 'stok', 'masih'],
         'a' => 'Unit yang tampil di website ini berstatus For Sale. Untuk kepastian ketersediaan terbaru, silakan jadwalkan viewing atau hubungi tim kami.'],
        ['q' => 'Bagaimana cara booking/viewing?',      'keywords' => ['booking', 'viewing', 'jadwal', 'kunjungan', 'survey', 'lihat'],
         'a' => 'Buka halaman detail properti, isi formulir Booking / Viewing, lalu tekan Booking Sekarang. Tim kami akan mengonfirmasi jadwal Anda.'],
        ['q' => 'Apa saja fasilitas yang tersedia?',    'keywords' => ['fasilitas', 'carport', 'garasi', 'kamar', 'listrik', 'taman'],
         'a' => 'Setiap halaman detail properti memuat spesifikasi lengkap: kamar tidur, kamar mandi, carport, luas tanah dan bangunan, sertifikat, tahun dibangun, serta daya listrik.'],
        ['q' => 'Berapa harga dan cara pembayarannya?', 'keywords' => ['harga', 'bayar', 'pembayaran', 'cicil', 'kpr', 'diskon', 'biaya'],
         'a' => 'Harga mulai Rp 2.450.000.000 dengan sistem pembayaran fleksibel dan bebas biaya administrasi. Harga tiap unit ada di halaman detail properti.'],
        ['q' => 'Di mana lokasinya?',                   'keywords' => ['lokasi', 'alamat', 'dimana', 'maps', 'peta'],
         'a' => 'Kantor kami berada di Jl. Melati No. 12, Bandung, Jawa Barat. Peta lengkap ada di halaman Contact dan di setiap halaman detail properti.'],
        ['q' => 'Apa jenis sertifikatnya?',             'keywords' => ['sertifikat', 'shm', 'hgb', 'legal', 'surat'],
         'a' => 'Jenis sertifikat tiap unit tertera pada bagian Spesifikasi di halaman detail properti.'],
    ],
    'faq_fallback' => 'Maaf, saya belum punya jawaban untuk itu. Tim kami siap membantu langsung lewat WhatsApp.',
];
