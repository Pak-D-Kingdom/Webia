<?php

/*
|--------------------------------------------------------------------------
| RenovatePro — Home Services · Vintage · Chocolate Luxe
|--------------------------------------------------------------------------
| Semua konten statis template ada di sini. Frontend hanya MEMBACA array ini,
| sehingga tim backend dapat menggantinya dengan data database tanpa mengubah
| view, CSS, maupun JS.
|
| Key config : template.home-services.vintage.home-renovation-repair-chocolate-luxe.home-renovation-repair
*/

return [

    'slug'      => 'home-renovation-repair-chocolate-luxe',
    'base_path' => '/webia/template/home-services/vintage/home-renovation-repair-chocolate-luxe',
    'title'     => 'RenovatePro — Renovasi & Perbaikan Rumah',
    'meta'      => 'Renovasi total hingga perbaikan kecil, ditangani tim profesional dengan proses transparan dan hasil rapi.',

    'brand' => [
        'name'    => 'Renovate',
        'accent'  => 'Pro',
        'tagline' => 'Build Better · Live Better',
    ],

    // Nomor tujuan semua WhatsApp (format internasional tanpa + atau 0 di depan)
    'whatsapp' => [
        'number'   => '62895630300345',
        'greeting' => 'Halo RenovatePro, saya ingin berkonsultasi tentang renovasi rumah saya.',
    ],

    'contact' => [
        'address'    => 'Jl. Kemang Raya No. 88, Jakarta',
        'phone'      => '+62 21 1234 5678',
        'phone_href' => 'tel:+622112345678',
        'email'      => 'hello@renovate.id',
    ],

    'socials' => [
        ['icon' => 'facebook',  'label' => 'Facebook',  'url' => '#'],
        ['icon' => 'instagram', 'label' => 'Instagram', 'url' => '#'],
        ['icon' => 'youtube',   'label' => 'YouTube',   'url' => '#'],
        ['icon' => 'tiktok',    'label' => 'TikTok',    'url' => '#'],
        ['icon' => 'linkedin',  'label' => 'LinkedIn',  'url' => '#'],
    ],

    // Menampilkan kartu "Testimoni Pelanggan" di beranda (ada di desain UI). Ubah ke false untuk menyembunyikan.
    'show_testimonial' => true,

    /*
    | Navigasi. "pages" = halaman yang membuat item ini aktif.
    | "slug" relatif terhadap base_path; boleh memakai #anchor.
    */
    'nav' => [
        ['key' => 'home', 'label' => 'Beranda', 'slug' => '', 'icon' => 'home', 'pages' => ['home']],
        ['key' => 'layanan', 'label' => 'Layanan', 'slug' => 'layanan', 'pages' => ['layanan'], 'children' => [
            ['label' => 'Renovasi Rumah',        'slug' => 'layanan#renovasi-rumah'],
            ['label' => 'Perbaikan Bangunan',    'slug' => 'layanan#perbaikan-bangunan'],
            ['label' => 'Desain Interior',       'slug' => 'layanan#desain-interior'],
            ['label' => 'Eksterior & Taman',     'slug' => 'layanan#eksterior-taman'],
            ['label' => 'Instalasi & Finishing', 'slug' => 'layanan#instalasi-finishing'],
        ]],
        ['key' => 'paket', 'label' => 'Paket Layanan', 'slug' => 'paket-layanan', 'pages' => ['paket'], 'children' => [
            ['label' => 'Paket Basic',     'slug' => 'paket-layanan#basic'],
            ['label' => 'Paket Premium',   'slug' => 'paket-layanan#premium'],
            ['label' => 'Paket Exclusive', 'slug' => 'paket-layanan#exclusive'],
        ]],
        ['key' => 'galeri', 'label' => 'Galeri', 'slug' => 'galeri', 'pages' => ['galeri'], 'children' => [
            ['label' => 'Rumah Dua Lantai', 'slug' => 'galeri#rumah-dua-lantai'],
            ['label' => 'Ruang Tamu',       'slug' => 'galeri#ruang-tamu'],
            ['label' => 'Dapur',            'slug' => 'galeri#dapur'],
        ]],
        ['key' => 'proyek', 'label' => 'Proyek Kami', 'slug' => 'proyek-kami', 'pages' => ['proyek'], 'children' => [
            ['label' => 'Semua Proyek',     'slug' => 'proyek-kami'],
            ['label' => 'Interior',         'slug' => 'proyek-kami#interior'],
            ['label' => 'Eksterior',        'slug' => 'proyek-kami#eksterior'],
        ]],
        ['key' => 'area', 'label' => 'Area Layanan', 'slug' => 'area-layanan', 'pages' => ['area'], 'children' => [
            ['label' => 'Peta Cakupan',      'slug' => 'area-layanan'],
            ['label' => 'Cek Area Layanan',  'slug' => 'area-layanan#cek-area'],
        ]],
        ['key' => 'tentang', 'label' => 'Tentang Kami', 'slug' => 'proses-kerja', 'pages' => ['proses', 'survei'], 'children' => [
            ['label' => 'Proses Kerja Kami',       'slug' => 'proses-kerja'],
            ['label' => 'Booking Survei Lokasi',   'slug' => 'booking-survei'],
        ]],
        ['key' => 'kontak', 'label' => 'Kontak', 'slug' => 'permintaan-penawaran', 'pages' => ['penawaran']],
    ],

    'cta' => ['label' => 'Konsultasi Sekarang', 'slug' => 'permintaan-penawaran'],

    'hero' => [
        'script'  => 'Renovasi & Perbaikan Rumah',
        'title_1' => 'Wujudkan Rumah Impian Anda',
        'title_2' => 'dengan Sentuhan Profesional!',
        'text'    => ['Dari renovasi total hingga perbaikan kecil,', 'kami hadir untuk menciptakan rumah yang lebih nyaman,', 'indah dan bernilai lebih tinggi.'],
        'primary'   => ['label' => 'Dapatkan Penawaran', 'slug' => 'permintaan-penawaran'],
        'secondary' => ['label' => 'Lihat Portofolio',   'slug' => 'proyek-kami'],
    ],

    // Halaman → judul & deskripsi header halaman
    'pages' => [
        'layanan'  => ['slug' => 'layanan',              'title' => 'Layanan Renovasi & Perbaikan', 'script' => 'Solusi lengkap untuk rumah Anda', 'text' => 'Lima layanan utama yang kami kerjakan dari awal sampai serah terima, dengan tenaga ahli di setiap bidang.'],
        'paket'    => ['slug' => 'paket-layanan',        'title' => 'Paket Layanan',                'script' => 'Pilihan paket terbaik sesuai kebutuhan Anda', 'text' => 'Bandingkan tiga paket kami, lalu minta penawaran tertulis setelah survei lokasi.'],
        'galeri'   => ['slug' => 'galeri',               'title' => 'Galeri Before - After',        'script' => 'Lihat hasil nyata dari proyek kami', 'text' => 'Geser pegangan di tengah gambar untuk membandingkan kondisi sebelum dan sesudah renovasi.'],
        'proyek'   => ['slug' => 'proyek-kami',          'title' => 'Proyek Kami',                  'script' => 'Portofolio proyek renovasi dan perbaikan kami', 'text' => 'Sebagian proyek yang sudah kami selesaikan untuk hunian keluarga di berbagai kota.'],
        'area'     => ['slug' => 'area-layanan',         'title' => 'Area Layanan',                 'script' => 'Kami melayani berbagai wilayah di seluruh Indonesia', 'text' => 'Cek apakah lokasi rumah Anda sudah terjangkau tim kami.'],
        'proses'   => ['slug' => 'proses-kerja',         'title' => 'Proses Kerja Kami',            'script' => 'Proses mudah, transparan, dan profesional', 'text' => 'Lima tahap kerja yang sama untuk setiap proyek, dari konsultasi sampai serah terima.'],
        'penawaran'=> ['slug' => 'permintaan-penawaran', 'title' => 'Permintaan Penawaran',         'script' => 'Dapatkan penawaran harga terbaik sekarang juga', 'text' => 'Isi formulir singkat berikut. Pesan Anda langsung terkirim ke WhatsApp tim kami.'],
        'survei'   => ['slug' => 'booking-survei',       'title' => 'Booking Survei Lokasi',        'script' => 'Jadwalkan survei langsung ke lokasi rumah Anda', 'text' => 'Pilih tanggal dan jam yang paling nyaman. Tim kami akan mengonfirmasi lewat WhatsApp.'],
    ],

    'services' => [
        ['id' => 'renovasi-rumah', 'icon' => 'home', 'title' => 'Renovasi Rumah', 'image' => 'gallery-after.jpg',
         'short' => 'Renovasi total maupun sebagian untuk rumah tinggal.',
         'desc'  => 'Perubahan tata ruang, penambahan lantai, hingga pembaruan fasad dikerjakan satu tim dengan jadwal kerja yang jelas.',
         'points' => ['Renovasi total & parsial', 'Penambahan ruang / lantai', 'Pembaruan fasad rumah']],
        ['id' => 'perbaikan-bangunan', 'icon' => 'tools', 'title' => 'Perbaikan Bangunan', 'image' => 'gallery-before.jpg',
         'short' => 'Perbaikan atap, dinding, lantai, dan kebocoran.',
         'desc'  => 'Masalah kecil yang dibiarkan bisa menjadi besar. Kami periksa penyebabnya lebih dulu, baru memperbaiki bagian yang perlu.',
         'points' => ['Atap & plafon', 'Dinding, retak & kebocoran', 'Lantai & struktur ringan']],
        ['id' => 'desain-interior', 'icon' => 'sofa', 'title' => 'Desain Interior', 'image' => 'project-living.jpg',
         'short' => 'Penataan ruang yang hangat, fungsional, dan rapi.',
         'desc'  => 'Dari konsep, pemilihan material, sampai pengerjaan furnitur custom agar ruang terasa nyaman dipakai setiap hari.',
         'points' => ['Konsep & moodboard', 'Furnitur custom', 'Pencahayaan & dekorasi']],
        ['id' => 'eksterior-taman', 'icon' => 'tree', 'title' => 'Eksterior & Taman', 'image' => 'project-exterior.jpg',
         'short' => 'Tampak depan, carport, teras, dan taman.',
         'desc'  => 'Wajah rumah membentuk kesan pertama. Kami rapikan tampak depan, area teras, dan taman agar selaras dengan bangunan.',
         'points' => ['Fasad & carport', 'Teras & pagar', 'Taman & lansekap']],
        ['id' => 'instalasi-finishing', 'icon' => 'roller', 'title' => 'Instalasi & Finishing', 'image' => 'project-kitchen.jpg',
         'short' => 'Instalasi listrik, plumbing, cat, dan finishing akhir.',
         'desc'  => 'Tahap akhir yang menentukan hasil. Instalasi dikerjakan sesuai standar dan finishing dicek bersama Anda sebelum serah terima.',
         'points' => ['Listrik & plumbing', 'Pengecatan & plafon', 'Pemasangan kitchen set']],
    ],

    // price = angka (untuk estimasi chatbot); price_label = tampilan
    'price_unit' => 'per m²',
    'packages' => [
        ['id' => 'basic', 'name' => 'Paket Basic', 'from' => 'Mulai dari', 'price' => 3500000, 'price_label' => 'Rp 3.500.000', 'popular' => false,
         'tagline' => 'Untuk perbaikan ringan dan penyegaran ruangan.',
         'features' => ['Survei & konsultasi awal', 'Perbaikan ringan & pengecatan', 'Material standar pilihan', 'Garis waktu kerja tertulis', 'Garansi pengerjaan']],
        ['id' => 'premium', 'name' => 'Paket Premium', 'from' => 'Mulai dari', 'price' => 7500000, 'price_label' => 'Rp 7.500.000', 'popular' => true,
         'tagline' => 'Pilihan paling seimbang untuk renovasi menyeluruh.',
         'features' => ['Semua isi Paket Basic', 'Gambar kerja & rencana anggaran', 'Material kualitas menengah-atas', 'Pengawas proyek di lokasi', 'Laporan progres berkala']],
        ['id' => 'exclusive', 'name' => 'Paket Exclusive', 'from' => 'Mulai dari', 'price' => 12500000, 'price_label' => 'Rp 12.500.000', 'popular' => false,
         'tagline' => 'Renovasi total dengan desain dan material pilihan.',
         'features' => ['Semua isi Paket Premium', 'Desain interior & eksterior lengkap', 'Material premium & furnitur custom', 'Manajer proyek khusus', 'Perawatan setelah serah terima']],
    ],

    'gallery' => [
        ['id' => 'rumah-dua-lantai', 'title' => 'Rumah Dua Lantai', 'caption' => 'Fasad dirombak total dengan kayu, batu, dan pencahayaan hangat.', 'before' => 'gallery-before.jpg', 'after' => 'gallery-after.jpg'],
        ['id' => 'ruang-tamu', 'title' => 'Ruang Tamu', 'caption' => 'Ruang tamu lebih terang dengan plafon baru dan penataan furnitur.', 'before' => 'gallery-living-before.jpg', 'after' => 'gallery-living-after.jpg'],
        ['id' => 'dapur', 'title' => 'Dapur', 'caption' => 'Kitchen set custom dengan alur kerja yang lebih efisien.', 'before' => 'gallery-kitchen-before.jpg', 'after' => 'gallery-kitchen-after.jpg'],
    ],

    'projects' => [
        ['id' => 'ruang-tamu-hangat',  'cat' => 'interior',  'title' => 'Ruang Tamu Hangat',       'place' => 'Jakarta Selatan', 'image' => 'project-living.jpg',   'desc' => 'Penataan ulang ruang keluarga dengan palet cokelat dan krem.'],
        ['id' => 'dapur-modern',       'cat' => 'interior',  'title' => 'Dapur Modern Minimalis',  'place' => 'Tangerang',       'image' => 'project-kitchen.jpg',  'desc' => 'Kitchen set custom dengan top table putih dan lampu LED.'],
        ['id' => 'rumah-dua-lantai',   'cat' => 'eksterior', 'title' => 'Rumah Dua Lantai',        'place' => 'Bandung',         'image' => 'project-exterior.jpg', 'desc' => 'Peremajaan fasad, balkon, dan taman depan.'],
        ['id' => 'renovasi-total',     'cat' => 'eksterior', 'title' => 'Renovasi Total Tropis',   'place' => 'Surabaya',        'image' => 'gallery-after.jpg',    'desc' => 'Renovasi total hunian dua lantai gaya tropis modern.'],
        ['id' => 'rumah-kayu-klasik',  'cat' => 'eksterior', 'title' => 'Rumah Kayu Klasik',       'place' => 'Lembang',         'image' => 'project-house.jpg',    'desc' => 'Aksen kayu dan kaca lebar untuk hunian di dataran tinggi.'],
        ['id' => 'hunian-taman',       'cat' => 'eksterior', 'title' => 'Hunian dengan Taman',     'place' => 'Yogyakarta',      'image' => 'booking-house.jpg',    'desc' => 'Fasad klasik dengan taman dan jalan masuk baru.'],
    ],

    'areas' => [
        ['name' => 'Jabodetabek',        'cities' => 'Jakarta, Bogor, Depok, Tangerang, Bekasi'],
        ['name' => 'Jawa',               'cities' => 'Bandung, Semarang, Yogyakarta, Surabaya, Malang'],
        ['name' => 'Sumatera',           'cities' => 'Medan, Padang, Palembang, Pekanbaru, Lampung'],
        ['name' => 'Kalimantan',         'cities' => 'Pontianak, Banjarmasin, Balikpapan, Samarinda'],
        ['name' => 'Sulawesi',           'cities' => 'Makassar, Manado, Palu, Kendari'],
        ['name' => 'Bali & Nusa Tenggara', 'cities' => 'Denpasar, Mataram, Kupang'],
        ['name' => 'Maluku & Papua',     'cities' => 'Ambon, Ternate, Jayapura, Sorong'],
    ],
    // posisi pin pada gambar peta (persen)
    'pins' => [
        ['x' => 11, 'y' => 26, 'l' => 'Medan'], ['x' => 18, 'y' => 48, 'l' => 'Padang'], ['x' => 31, 'y' => 70, 'l' => 'Jakarta'],
        ['x' => 36, 'y' => 28, 'l' => 'Pontianak'], ['x' => 42, 'y' => 40, 'l' => 'Balikpapan'], ['x' => 52, 'y' => 30, 'l' => 'Manado'],
        ['x' => 69, 'y' => 43, 'l' => 'Ambon'], ['x' => 90, 'y' => 45, 'l' => 'Jayapura'],
    ],

    'process' => [
        ['n' => 1, 'icon' => 'chat',   'title' => 'Konsultasi Awal',   'short' => 'Konsultasi Awal',   'desc' => 'Ceritakan kebutuhan, gaya yang Anda suka, dan anggaran. Kami bantu merumuskan lingkup pekerjaan.'],
        ['n' => 2, 'icon' => 'pin',    'title' => 'Survei Lokasi',     'short' => 'Survei Lokasi',     'desc' => 'Tim datang ke rumah Anda untuk mengukur, memeriksa kondisi bangunan, dan mencatat hal teknis.'],
        ['n' => 3, 'icon' => 'doc',    'title' => 'Penawaran Harga',   'short' => 'Penawaran Harga',   'desc' => 'Anda menerima rincian biaya, material, dan jadwal secara tertulis sebelum pekerjaan dimulai.'],
        ['n' => 4, 'icon' => 'helmet', 'title' => 'Pelaksanaan Proyek','short' => 'Pelaksanaan Proyek','desc' => 'Pekerjaan dimulai sesuai jadwal dengan pengawas di lokasi dan laporan progres berkala.'],
        ['n' => 5, 'icon' => 'check',  'title' => 'Serah Terima',      'short' => 'Serah Terima',      'desc' => 'Kami cek hasil bersama Anda, merapikan sisa catatan, lalu menyerahkan rumah dalam kondisi siap huni.'],
    ],

    'testimonial' => [
        'quote' => 'Hasil renovasi sangat memuaskan! Timnya profesional dan tepat waktu.',
        'name'  => 'Budi Santoso',
        'stars' => 5,
        'image' => 'testimoni-budi.jpg',
    ],

    'survey_slots' => ['08.00 – 10.00', '10.00 – 12.00', '13.00 – 15.00', '15.00 – 17.00'],

    'legal' => [
        'terms' => [
            'title' => 'Syarat & Ketentuan',
            'body'  => ['Harga pada situs ini bersifat estimasi awal. Penawaran final diterbitkan tertulis setelah survei lokasi.', 'Jadwal dan lingkup pekerjaan mengikuti dokumen penawaran yang disetujui kedua pihak.', 'Perubahan pekerjaan di tengah proyek dibuat dalam addendum tertulis.'],
        ],
        'privacy' => [
            'title' => 'Kebijakan Privasi',
            'body'  => ['Data yang Anda isi di formulir hanya dipakai untuk menghubungi Anda terkait permintaan tersebut.', 'Pesan dikirim melalui WhatsApp ke tim kami. Kami tidak menjual data Anda kepada pihak ketiga.'],
        ],
    ],

    'chat' => [
        'name'     => 'Asisten RenovatePro',
        'subtitle' => 'FAQ layanan & estimasi biaya',
        'hello'    => 'Halo! Saya asisten RenovatePro. Tanyakan layanan, paket, atau hitung estimasi biaya renovasi Anda.',
        'bubble'   => 'Ada pertanyaan tentang layanan kami?',
        'fallback' => 'Maaf, saya belum menemukan jawaban yang pas. Coba pilih salah satu topik di bawah, atau lanjutkan lewat WhatsApp agar tim kami membantu langsung.',
        'quick'    => ['Layanan apa saja?', 'Harga paket', 'Hitung estimasi', 'Lama pengerjaan', 'Area layanan', 'Survei lokasi'],
    ],

    'faq' => [
        ['k' => ['layanan', 'jasa', 'service', 'kerjakan', 'apa saja'], 'a' => 'Kami mengerjakan lima layanan: Renovasi Rumah, Perbaikan Bangunan, Desain Interior, Eksterior & Taman, serta Instalasi & Finishing. Detailnya ada di halaman Layanan.', 'go' => 'layanan', 'go_label' => 'Lihat Layanan'],
        ['k' => ['lama', 'durasi', 'waktu', 'berapa hari', 'berapa lama', 'selesai'], 'a' => 'Perbaikan ringan biasanya selesai dalam hitungan hari hingga 2 minggu. Renovasi menyeluruh umumnya 1 sampai 4 bulan, tergantung luas dan kondisi bangunan. Jadwal pasti tertulis di dokumen penawaran setelah survei.'],
        ['k' => ['area', 'wilayah', 'kota', 'jangkau', 'daerah'], 'a' => 'Kami melayani berbagai wilayah di Indonesia, mulai dari Jabodetabek, Jawa, Sumatera, Kalimantan, Sulawesi, Bali & Nusa Tenggara, sampai Maluku & Papua. Untuk memastikan kota Anda, gunakan Cek Area Layanan.', 'go' => 'area-layanan#cek-area', 'go_label' => 'Cek Area Layanan'],
        ['k' => ['survei', 'survey', 'datang', 'kunjungan', 'booking'], 'a' => 'Survei lokasi dilakukan oleh tim kami untuk mengukur dan memeriksa kondisi rumah sebelum membuat penawaran. Anda bisa memilih tanggal dan jam lewat halaman Booking Survei.', 'go' => 'booking-survei', 'go_label' => 'Booking Survei'],
        ['k' => ['penawaran', 'quotation', 'quote', 'rab', 'rincian'], 'a' => 'Anda bisa meminta penawaran lewat formulir Permintaan Penawaran. Isi kebutuhan singkat, lalu pesan dikirim ke WhatsApp tim kami. Penawaran final tertulis dibuat setelah survei lokasi.', 'go' => 'permintaan-penawaran', 'go_label' => 'Minta Penawaran'],
        ['k' => ['proses', 'tahap', 'alur', 'cara kerja', 'langkah'], 'a' => 'Prosesnya lima tahap: Konsultasi Awal, Survei Lokasi, Penawaran Harga, Pelaksanaan Proyek, lalu Serah Terima.', 'go' => 'proses-kerja', 'go_label' => 'Lihat Proses Kerja'],
        ['k' => ['garansi', 'jaminan', 'warranty'], 'a' => 'Setiap paket menyertakan garansi pengerjaan. Masa dan ruang lingkup garansi dituliskan di dokumen penawaran.'],
        ['k' => ['bayar', 'pembayaran', 'dp', 'cicil', 'termin'], 'a' => 'Pembayaran dibagi per termin sesuai progres pekerjaan, dan skemanya dicantumkan di dokumen penawaran sebelum Anda menyetujui.'],
        ['k' => ['portofolio', 'proyek', 'hasil', 'galeri', 'contoh'], 'a' => 'Anda bisa melihat hasil kami di halaman Proyek Kami dan Galeri Before - After.', 'go' => 'proyek-kami', 'go_label' => 'Lihat Proyek'],
        ['k' => ['halo', 'hai', 'hi', 'selamat', 'pagi', 'siang', 'malam'], 'a' => 'Halo! Senang bisa membantu. Anda bisa bertanya tentang layanan, harga paket, lama pengerjaan, area layanan, atau hitung estimasi biaya.'],
        ['k' => ['terima kasih', 'makasih', 'thanks', 'thx'], 'a' => 'Sama-sama! Jika ada yang ingin ditanyakan lagi, saya siap membantu.'],
    ],

];
