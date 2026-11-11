<?php

/*
| Konten statis template Branding & Creative Agency (Artistic, Terracotta).
| Dibaca lewat config('template.professional-service.artistic.branding-creative-agency-terracotta.branding-creative-agency').
*/
return [
    'brand' => [
        'name' => 'Senja Atelier',
        'short' => 'Senja',
        'sub' => 'Atelier',
        'tagline' => 'Branding dan creative agency',
        'whatsapp' => '62895630300345',
        'phone' => '+62 895-6303-00345',
        'email' => 'halo@senjaatelier.id',
        'address' => 'Jl. Prawirotaman No. 21, Yogyakarta',
        'hours' => 'Senin sampai Jumat, 09.00 sampai 17.00 WIB',
        'wa_text' => 'Halo Senja Atelier, saya ingin berkonsultasi soal branding.',
    ],
    'topbar' => [
        'notice' => 'Konsultasi awal 30 menit gratis. Slot minggu ini tersisa 4.',
    ],
    'mascot' => '<svg class="bca-prism" viewBox="0 0 72 72" aria-hidden="true" focusable="false"><g class="bca-prism__body"><path d="M36 9 63 57H9Z" fill="#fbf6ef" fill-opacity=".16"/><path d="M36 9v48H9Z" fill="#fbf6ef" fill-opacity=".2"/><path d="M36 9 63 57H9Z" fill="none" stroke="#fbf6ef" stroke-width="2.6" stroke-linejoin="round"/></g><path d="M0 43 26 39" stroke="#fbf6ef" stroke-width="3" stroke-linecap="round"/><g stroke-width="2.8" stroke-linecap="round" fill="none"><path class="b1" d="M45 37 72 22" stroke="#F6D58E"/><path class="b2" d="M46 40 72 32" stroke="#EDB85A"/><path class="b3" d="M47 43 72 42" stroke="#E58A5B"/><path class="b4" d="M47 46 72 52" stroke="#E8826A"/><path class="b5" d="M46 49 72 62" stroke="#C9573B"/></g></svg>',
    'nav' => ['layanan', 'keahlian', 'harga', 'portofolio', 'janji'],
    'footnav' => ['layanan', 'keahlian', 'harga', 'portofolio', 'janji', 'brief'],
    'pages' => [
        'home' => [
            'label' => 'Beranda',
            'title' => 'Branding dan Creative Agency',
            'desc' => 'Senja Atelier merancang identitas, kemasan, dan kampanye untuk merek yang ingin tampil hangat dan diingat.',
        ],
        'layanan' => [
            'label' => 'Layanan',
            'title' => 'Layanan studio',
            'desc' => 'Enam layanan yang bisa dipesan terpisah atau digabung dalam satu alur kerja.',
            'next' => '#FBF6EF',
        ],
        'keahlian' => [
            'label' => 'Keahlian',
            'title' => 'Keahlian kami',
            'desc' => 'Perpaduan strategi, cerita, dan rupa yang sudah teruji di berbagai industri.',
            'next' => '#F3E6D8',
        ],
        'harga' => [
            'label' => 'Harga & Konsultasi',
            'title' => 'Harga dan konsultasi',
            'desc' => 'Paket yang jelas, tanpa biaya tersembunyi. Mulai dengan konsultasi gratis.',
            'next' => '#FBF6EF',
        ],
        'portofolio' => [
            'label' => 'Portofolio',
            'title' => 'Portofolio',
            'desc' => 'Proyek pilihan dari klien kami: kemasan, identitas, dan kampanye.',
            'next' => '#FBF6EF',
        ],
        'janji' => [
            'label' => 'Janji Temu',
            'title' => 'Buat janji temu',
            'desc' => 'Pilih jenis konsultasi, tanggal, dan jam. Kami konfirmasi lewat WhatsApp.',
            'next' => '#F3E6D8',
        ],
        'brief' => [
            'label' => 'Kirim Brief',
            'title' => 'Kirim brief proyek',
            'desc' => 'Ceritakan kebutuhan Anda. Tim kami membalas dalam satu hari kerja.',
            'next' => '#F3E6D8',
        ],
    ],
    'hero' => [
        'lines' => ['Merek dengan', 'warna yang tinggal', 'di ingatan.'],
        'lead' => 'Senja Atelier adalah studio branding di Yogyakarta. Kami merancang identitas, kemasan, dan kampanye yang hangat, jelas, dan terasa seperti milik Anda sendiri.',
        'cta1' => 'Jadwalkan konsultasi gratis',
        'cta2' => 'Lihat portofolio',
        'alt' => 'Dinding terakota dengan poster senja berbingkai, kotak kemasan, dan tanaman dalam pot',
        'facts' => [
            [
                't' => '4 sampai 8 minggu',
                'd' => 'waktu pengerjaan rata-rata',
            ],
            [
                't' => '3 putaran revisi',
                'd' => 'termasuk di setiap paket',
            ],
            [
                't' => 'Hak cipta milik Anda',
                'd' => 'diserahkan setelah pelunasan',
            ],
        ],
    ],
    'home' => [
        'services' => [
            'title' => 'Satu studio, enam cara membangun merek',
            'text' => 'Pilih satu layanan atau gabungkan semuanya. Arahkan kursor ke tiap lajur untuk melihat isinya.',
            'cta' => 'Lihat detail layanan',
        ],
        'expertise' => [
            'title' => 'Strategi, cerita, dan rupa berjalan bersama',
            'text' => 'Merek yang kuat tidak lahir dari logo yang bagus saja. Kami memadukan tiga keahlian dalam satu tim kecil.',
            'cta' => 'Pelajari keahlian kami',
        ],
        'pricing' => [
            'title' => 'Harga yang bisa dihitung sejak awal',
            'text' => 'Tiga paket dengan cakupan tertulis. Belum yakin mana yang pas? Mulai dari konsultasi gratis.',
            'cta' => 'Bandingkan paket',
        ],
        'portfolio' => [
            'title' => 'Karya terbaru dari studio',
            'text' => 'Geser untuk melihat proyek kemasan, identitas, dan kampanye.',
            'cta' => 'Semua proyek',
        ],
        'appointment' => [
            'title' => 'Bicara langsung dengan konsultan kami',
            'text' => 'Tiga jenis sesi, bisa lewat Zoom, telepon, atau datang ke studio. Pilih waktu yang paling nyaman.',
            'cta' => 'Pilih jadwal',
        ],
        'lead' => [
            'title' => 'Sudah punya gambaran proyek?',
            'text' => 'Isi tiga kolom ini dan lanjutkan ke brief lengkap. Kami balas dalam satu hari kerja.',
            'cta' => 'Lanjutkan brief',
        ],
        'ai' => [
            'title' => 'Konsultasi cepat dengan asisten AI',
            'text' => 'Tanyakan layanan, harga, durasi, atau cara bekerja sama. Asisten kami menjawab kapan saja dan mengarahkan Anda ke tim bila perlu.',
            'cta' => 'Mulai bertanya',
        ],
    ],
    'services' => [
        'items' => [
            [
                't' => 'Strategi merek',
                'd' => 'Riset, posisi, dan suara merek yang bisa dipegang seluruh tim.',
                'list' => ['Riset pasar dan pesaing', 'Platform dan nilai merek', 'Pedoman gaya bahasa'],
                'price' => 'Rp 18 juta',
                'time' => '2 sampai 3 minggu',
                'c' => '#17302F',
            ],
            [
                't' => 'Identitas visual',
                'd' => 'Logo, warna, tipografi, dan sistem yang tetap utuh di semua media.',
                'list' => ['Logo dan monogram', 'Palet dan tipografi', 'Panduan merek'],
                'price' => 'Rp 25 juta',
                'time' => '4 sampai 5 minggu',
                'c' => '#B9573B',
            ],
            [
                't' => 'Kemasan dan produk',
                'd' => 'Kemasan yang siap produksi, lengkap dengan uji bahan dan dummy.',
                'list' => ['Desain kemasan', 'Label dan stiker', 'Dummy cetak'],
                'price' => 'Rp 15 juta',
                'time' => '3 sampai 5 minggu',
                'c' => '#E58A5B',
                'dk' => true,
            ],
            [
                't' => 'Ilustrasi dan motion',
                'd' => 'Ilustrasi khas dan animasi singkat yang memperkaya cerita merek.',
                'list' => ['Ilustrasi dan pola', 'Animasi logo', 'Set stiker digital'],
                'price' => 'Rp 12 juta',
                'time' => '2 sampai 4 minggu',
                'c' => '#7C8B6A',
                'dk' => true,
            ],
            [
                't' => 'Kampanye dan konten',
                'd' => 'Konsep, naskah, dan aset untuk media sosial, cetak, dan luar ruang.',
                'list' => ['Konsep kampanye', 'Naskah dan caption', 'Kalender konten'],
                'price' => 'Rp 20 juta',
                'time' => '3 sampai 6 minggu',
                'c' => '#8E3B25',
            ],
            [
                't' => 'Web dan digital',
                'd' => 'Situs dan materi digital yang terasa satu keluarga dengan identitas Anda.',
                'list' => ['Desain antarmuka', 'Sistem komponen', 'Serah terima ke pengembang'],
                'price' => 'Rp 30 juta',
                'time' => '5 sampai 8 minggu',
                'c' => '#C98A2B',
                'dk' => true,
            ],
        ],
    ],
    'expertise' => [
        'img_alt' => 'Tiga lingkaran bertumpuk bertuliskan strategi, cerita, dan rupa yang bertemu di kata merek',
        'skills' => [
            [
                't' => 'Strategi dan positioning',
                'v' => 95,
            ],
            [
                't' => 'Identitas visual',
                'v' => 92,
            ],
            [
                't' => 'Arahan seni dan kampanye',
                'v' => 90,
            ],
            [
                't' => 'Desain kemasan',
                'v' => 88,
            ],
            [
                't' => 'Ilustrasi',
                'v' => 85,
            ],
            [
                't' => 'Desain digital',
                'v' => 80,
            ],
        ],
        'cards' => [
            [
                't' => 'Strategi merek',
                'd' => 'Kami mulai dari wawancara pendiri, pelanggan, dan data pasar sebelum menyentuh visual. Hasilnya posisi merek satu halaman yang bisa dipakai semua tim.',
                'tools' => ['Riset kualitatif', 'Pemetaan pesaing', 'Brand workshop'],
            ],
            [
                't' => 'Identitas visual',
                'd' => 'Sistem logo, warna, dan huruf dirancang untuk bertahan di label kecil sampai papan reklame, bukan hanya di layar presentasi.',
                'tools' => ['Illustrator', 'Figma', 'Uji cetak'],
            ],
            [
                't' => 'Kemasan',
                'd' => 'Dari struktur kemasan sampai pemilihan kertas dan finishing. Kami bekerja dengan percetakan lokal agar hasilnya sesuai rancangan.',
                'tools' => ['Dieline', 'Mockup fisik', 'Pantone'],
            ],
            [
                't' => 'Ilustrasi dan motion',
                'd' => 'Gaya ilustrasi digambar tangan lalu didigitalkan, supaya khas dan sulit ditiru.',
                'tools' => ['Procreate', 'After Effects', 'Cat air'],
            ],
            [
                't' => 'Kampanye',
                'd' => 'Konsep besar yang diturunkan menjadi aset harian: poster, video pendek, dan kalender konten.',
                'tools' => ['Copywriting', 'Fotografi', 'Media plan'],
            ],
            [
                't' => 'Digital',
                'd' => 'Antarmuka yang rapi dan sistem komponen yang mudah diteruskan ke pengembang Anda.',
                'tools' => ['Figma', 'Design system', 'Prototipe'],
            ],
        ],
        'industries' => ['Makanan dan minuman', 'Fesyen', 'Kriya', 'Kesehatan', 'Properti', 'Pendidikan', 'Wisata'],
        'awards' => [
            [
                'y' => '2025',
                'n' => 'Silver, Indonesia Packaging Awards',
                'p' => 'Kopi Senja',
            ],
            [
                'y' => '2024',
                'n' => 'Finalis, Brand Identity Asia',
                'p' => 'Rumah Pinus',
            ],
            [
                'y' => '2023',
                'n' => 'Pilihan Editor, Desain Grafis Indonesia',
                'p' => 'Festival Lembayung',
            ],
        ],
    ],
    'pricing' => [
        'plans' => [
            [
                'n' => 'Identitas',
                'price' => 'Rp 25 juta',
                'unit' => 'sekali bayar',
                'd' => 'Untuk usaha baru yang butuh wajah merek yang rapi.',
                'list' => ['Logo dan monogram', 'Palet dan tipografi', 'Panduan merek ringkas', '3 putaran revisi'],
                'hot' => false,
            ],
            [
                'n' => 'Merek Penuh',
                'price' => 'Rp 55 juta',
                'unit' => 'sekali bayar',
                'd' => 'Strategi sampai kemasan, untuk peluncuran yang serius.',
                'list' => ['Semua isi paket Identitas', 'Strategi dan positioning', 'Desain kemasan satu produk', 'Kit kampanye peluncuran'],
                'hot' => true,
            ],
            [
                'n' => 'Mitra Kreatif',
                'price' => 'Rp 12 juta',
                'unit' => 'per bulan',
                'd' => 'Tim desain berlangganan untuk merek yang terus tumbuh.',
                'list' => ['Jam kerja desain terjadwal', 'Aset kampanye bulanan', 'Rapat strategi bulanan', 'Prioritas penjadwalan'],
                'hot' => false,
            ],
        ],
        'cols' => ['Identitas', 'Merek Penuh', 'Mitra Kreatif'],
        'rows' => [
            [
                't' => 'Sesi konsultasi',
                'v' => ['1', '2', 'Bulanan'],
            ],
            [
                't' => 'Riset dan strategi',
                'v' => ['Ringkas', 'Lengkap', 'Berkala'],
            ],
            [
                't' => 'Logo dan monogram',
                'v' => ['Ya', 'Ya', 'Revisi'],
            ],
            [
                't' => 'Panduan merek',
                'v' => ['Ringkas', 'Lengkap', 'Pembaruan'],
            ],
            [
                't' => 'Desain kemasan',
                'v' => ['Tidak', '1 produk', 'Sesuai jam'],
            ],
            [
                't' => 'Kit kampanye',
                'v' => ['Tidak', 'Ya', 'Bulanan'],
            ],
            [
                't' => 'Putaran revisi',
                'v' => ['3', '3', 'Tak terbatas'],
            ],
        ],
        'addons' => [
            [
                't' => 'Produk kemasan tambahan',
                'p' => 'Rp 8 juta',
            ],
            [
                't' => 'Animasi logo',
                'p' => 'Rp 6 juta',
            ],
            [
                't' => 'Sesi foto produk',
                'p' => 'Rp 10 juta',
            ],
            [
                't' => 'Naskah dan caption 30 hari',
                'p' => 'Rp 7 juta',
            ],
        ],
        'terms' => ['Uang muka 50 persen sebelum proyek dimulai', 'Pelunasan 50 persen saat berkas final diserahkan', 'Harga belum termasuk biaya cetak dan pajak', 'Perjanjian kerja dan hak cipta dibuat tertulis'],
        'consult' => [
            'title' => 'Belum yakin paket mana yang pas?',
            'text' => 'Konsultasi awal 30 menit tanpa biaya. Kami dengarkan kebutuhan Anda dan sarankan langkah paling masuk akal, termasuk bila Anda belum perlu kami.',
            'cta' => 'Jadwalkan konsultasi',
            'points' => ['30 menit, gratis', 'Zoom, telepon, atau di studio', 'Tanpa kewajiban melanjutkan'],
        ],
    ],
    'portfolio' => [
        'cats' => ['Kemasan', 'Identitas', 'Kampanye'],
        'items' => [
            [
                'title' => 'Kopi Senja',
                'client' => 'Roastery Senja',
                'cat' => 'Kemasan',
                'year' => '2025',
                'img' => 'portfolio-kopi-senja.svg',
                'role' => 'Identitas dan kemasan',
                'desc' => 'Kemasan biji kopi dengan label bermotif bukit senja, dicetak di kertas kraft dengan hot stamping tembaga.',
            ],
            [
                'title' => 'Rumah Pinus',
                'client' => 'Penginapan Rumah Pinus',
                'cat' => 'Identitas',
                'year' => '2025',
                'img' => 'portfolio-rumah-pinus.svg',
                'role' => 'Identitas visual',
                'desc' => 'Monogram bulat dalam palet hijau pinus dan kuning, diterapkan pada kartu nama, papan, dan seragam.',
            ],
            [
                'title' => 'Gula Lontar',
                'client' => 'Gula Lontar Nusantara',
                'cat' => 'Kemasan',
                'year' => '2024',
                'img' => 'portfolio-gula-lontar.svg',
                'role' => 'Kemasan produk',
                'desc' => 'Toples kaca dengan label sederhana yang menonjolkan warna alami gula aren.',
            ],
            [
                'title' => 'Seri Atap Merah',
                'client' => 'Galeri Atap Merah',
                'cat' => 'Kampanye',
                'year' => '2024',
                'img' => 'portfolio-atap-merah.svg',
                'role' => 'Kampanye cetak',
                'desc' => 'Tiga poster berseri untuk pameran seni, masing-masing dengan langit senja yang berbeda.',
            ],
            [
                'title' => 'Warung Tenggara',
                'client' => 'Warung Tenggara',
                'cat' => 'Identitas',
                'year' => '2023',
                'img' => 'portfolio-warung-tenggara.svg',
                'role' => 'Identitas dan papan nama',
                'desc' => 'Papan nama, kanopi bergaris, dan menu untuk warung makan keluarga di pusat kota.',
            ],
            [
                'title' => 'Festival Lembayung',
                'client' => 'Festival Lembayung',
                'cat' => 'Kampanye',
                'year' => '2023',
                'img' => 'portfolio-festival-lembayung.svg',
                'role' => 'Kampanye festival',
                'desc' => 'Poster, tiket, dan panggung festival musik dan seni dengan lingkaran matahari terbenam.',
            ],
        ],
    ],
    'appointment' => [
        'types' => [
            [
                'k' => 'awal',
                't' => 'Konsultasi awal',
                'dur' => '30 menit',
                'd' => 'Kenalan, dengar kebutuhan, dan arahkan langkah pertama. Gratis.',
            ],
            [
                'k' => 'tinjauan',
                't' => 'Tinjauan merek',
                'dur' => '45 menit',
                'd' => 'Kami menilai merek yang sudah ada dan memberi rekomendasi tertulis.',
            ],
            [
                'k' => 'presentasi',
                't' => 'Presentasi proyek',
                'dur' => '60 menit',
                'd' => 'Untuk klien berjalan: presentasi arah desain dan diskusi revisi.',
            ],
        ],
        'modes' => ['Zoom', 'Telepon WhatsApp', 'Datang ke studio'],
        'slots' => ['09:00', '10:30', '13:00', '14:30', '16:00'],
        'note' => 'Studio buka Senin sampai Jumat. Jadwal dikonfirmasi lewat WhatsApp dalam beberapa jam.',
        'action' => '#',
    ],
    'lead' => [
        'services' => ['Strategi merek', 'Identitas visual', 'Kemasan dan produk', 'Ilustrasi dan motion', 'Kampanye dan konten', 'Web dan digital'],
        'industries' => ['Makanan dan minuman', 'Fesyen', 'Kriya', 'Kesehatan', 'Properti', 'Pendidikan', 'Wisata', 'Lainnya'],
        'budgets' => ['Di bawah Rp 15 juta', 'Rp 15 sampai 40 juta', 'Rp 40 sampai 100 juta', 'Di atas Rp 100 juta'],
        'starts' => ['Secepatnya', 'Dalam 1 bulan', '2 sampai 3 bulan', 'Masih merencanakan'],
        'checklist' => ['Nama dan ringkasan usaha Anda', 'Target pelanggan yang ingin dijangkau', 'Contoh merek yang Anda sukai', 'Perkiraan anggaran dan waktu'],
        'action' => '#',
    ],
    'faq' => [
        'bot' => [
            'name' => 'Prisma',
            'greet' => 'Halo, saya Prisma, asisten konsultasi Senja Atelier. Pilih pertanyaan di bawah atau ketik sendiri.',
            'fallback' => 'Saya belum punya jawaban untuk itu. Tim kami siap membantu langsung lewat WhatsApp atau konsultasi gratis.',
            'placeholder' => 'Tulis pertanyaan Anda',
        ],
        'items' => [
            [
                'q' => 'Layanan apa saja yang tersedia?',
                'a' => 'Strategi merek, identitas visual, kemasan dan produk, ilustrasi dan motion, kampanye dan konten, serta web dan digital. Bisa dipesan terpisah atau digabung.',
                'k' => 'layanan jasa service kerjakan tersedia bisa',
                'go' => 'layanan',
                'gt' => 'Lihat layanan',
            ],
            [
                'q' => 'Berapa biaya branding di sini?',
                'a' => 'Paket Identitas Rp 25 juta, Merek Penuh Rp 55 juta, dan Mitra Kreatif Rp 12 juta per bulan. Layanan satuan mulai Rp 12 juta. Harga akhir kami pastikan setelah konsultasi.',
                'k' => 'harga biaya budget tarif paket mahal murah bayar',
                'go' => 'harga',
                'gt' => 'Lihat harga',
            ],
            [
                'q' => 'Apakah konsultasi awal gratis?',
                'a' => 'Ya. Konsultasi awal 30 menit tanpa biaya dan tanpa kewajiban melanjutkan, lewat Zoom, telepon, atau di studio.',
                'k' => 'konsultasi gratis awal sesi konsul',
                'go' => 'janji',
                'gt' => 'Buat janji temu',
            ],
            [
                'q' => 'Paket mana yang cocok untuk saya?',
                'a' => 'Usaha baru yang butuh wajah merek cocok dengan Identitas. Untuk peluncuran produk lengkap pilih Merek Penuh. Merek yang sudah berjalan dan butuh desain rutin cocok dengan Mitra Kreatif.',
                'k' => 'paket cocok pilih rekomendasi sarankan mana',
                'go' => 'harga',
                'gt' => 'Bandingkan paket',
            ],
            [
                'q' => 'Berapa lama pengerjaannya?',
                'a' => 'Identitas visual 4 sampai 5 minggu, kemasan 3 sampai 5 minggu, dan paket Merek Penuh sekitar 8 minggu. Jadwal pasti disepakati di awal.',
                'k' => 'lama durasi waktu berapa minggu bulan selesai deadline',
            ],
            [
                'q' => 'Bagaimana alur kerjanya?',
                'a' => 'Konsultasi, brief dan riset, eksplorasi desain, presentasi dan revisi, lalu serah terima berkas final beserta panduan merek.',
                'k' => 'alur proses tahap cara kerja langkah',
                'go' => 'brief',
                'gt' => 'Kirim brief',
            ],
            [
                'q' => 'Berapa kali boleh revisi?',
                'a' => 'Setiap paket mencakup tiga putaran revisi. Paket Mitra Kreatif tidak dibatasi selama dalam jam kerja yang disepakati.',
                'k' => 'revisi ubah perbaikan putaran ganti',
            ],
            [
                'q' => 'Bagaimana pembayarannya?',
                'a' => 'Uang muka 50 persen sebelum mulai dan pelunasan 50 persen saat berkas final diserahkan. Semua tertulis dalam perjanjian kerja.',
                'k' => 'bayar pembayaran dp uang muka lunas cicilan transfer',
            ],
            [
                'q' => 'Siapa pemilik hak cipta hasil karya?',
                'a' => 'Setelah pelunasan, hak atas desain final diserahkan kepada Anda dan dicantumkan dalam perjanjian kerja.',
                'k' => 'hak cipta lisensi milik kepemilikan kontrak perjanjian',
            ],
            [
                'q' => 'Apa yang perlu saya siapkan?',
                'a' => 'Ringkasan usaha, target pelanggan, contoh merek yang Anda sukai, serta perkiraan anggaran dan waktu. Semua bisa diisi di formulir brief.',
                'k' => 'siapkan persiapan bawa butuh dokumen materi brief',
                'go' => 'brief',
                'gt' => 'Isi brief',
            ],
        ],
    ],
];
