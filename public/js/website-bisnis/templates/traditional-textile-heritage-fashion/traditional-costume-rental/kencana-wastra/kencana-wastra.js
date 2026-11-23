// 1. COMPREHENSIVE SABANG-TO-MERAUKE & VIRAL INTERNATIONAL HERITAGE COSTUMES DATA
    const costumesData = [
      // === SUMATRA (ACEH TO LAMPUNG) ===
      {
        id: 'aceh-uleebalang',
        realm: 'Nusantara',
        name: 'Ulee Balang & Daro Baro Aceh',
        region: 'Sumatra',
        origin: 'Banda Aceh & Pidie, Aceh (Ujung Barat Sabang)',
        events: ['Pernikahan Adat', 'Festival Budaya', 'Photoshoot'],
        price: 590000,
        status: 'Tersedia',
        material: 'Kain Sutra Tenun Kasab Benang Emas & Beludru Hitam Sulam Emas',
        motif: 'Motif Pinto Aceh & Awan Meucanek — melambangkan keterbukaan hati, kemuliaan raja, dan kearifan Serambi Mekkah.',
        history: 'Busana kebesaran keluarga bangsawan dan raja-raja Kesultanan Aceh Darussalam yang dikenakan pada upacara perkawinan adat dan penyambutan tamu agung.',
        accessories: 'Meukeutop (Mahkota Pria Aceh), Patam Dhoe (Mahkota Daro Baro), Rencong Hias, Simplah & Pending Emas.',
        images: {
          front: 'https://images.unsplash.com/photo-1610030469983-98e550d6193c?auto=format&fit=crop&w=800&q=85',
          back: 'https://images.unsplash.com/photo-1583939003579-730e3918a45a?auto=format&fit=crop&w=800&q=85',
          detail: 'https://images.unsplash.com/photo-1594633312681-425c7b97ccd1?auto=format&fit=crop&w=800&q=85'
        }
      },
      {
        id: 'sumut-ulos-melayu',
        realm: 'Nusantara',
        name: 'Busana Adat Ulos Batak & Melayu Deli',
        region: 'Sumatra',
        origin: 'Danau Toba, Karo & Medan, Sumatra Utara',
        events: ['Pernikahan Adat', 'Wisuda', 'Festival Budaya'],
        price: 540000,
        status: 'Tersedia',
        material: 'Tenun Ulos Ragidup / Sadum Asli & Songket Melayu Deli',
        motif: 'Motif Gorga & Pucuk Rebung — simbol restu leluhur, kehangatan kasih sayang, dan kehormatan marga.',
        history: 'Perpaduan keagungan tenun Ulos masyarakat Batak yang sakral serta kemewahan busana Kesultanan Deli di pesisir Sumatra Utara.',
        accessories: 'Sortali (Ikat Kepala Emas Batak), Bulang-Bulang, Tanjak Melayu Deli & Kalung Hias.',
        images: {
          front: 'https://images.unsplash.com/photo-1594633312681-425c7b97ccd1?auto=format&fit=crop&w=800&q=85',
          back: 'https://images.unsplash.com/photo-1610030469983-98e550d6193c?auto=format&fit=crop&w=800&q=85',
          detail: 'https://images.unsplash.com/photo-1583939003579-730e3918a45a?auto=format&fit=crop&w=800&q=85'
        }
      },
      {
        id: 'minang-koto',
        realm: 'Nusantara',
        name: 'Bundo Kanduang & Suntiang Gadang',
        region: 'Sumatra',
        origin: 'Bukittinggi & Tanah Datar, Sumatra Barat',
        events: ['Pernikahan Adat', 'Wisuda', 'Festival Budaya'],
        price: 600000,
        status: 'Terbatas',
        material: 'Beludru Merah Marun, Songket Pandai Sikek Tenun Benang Emas',
        motif: 'Pucuak Rabuang & Itiak Pulang Patang — mengajarkan keteguhan prinsip serta kekompakan keluarga.',
        history: 'Mencerminkan falsafah Adat Basandi Syarak yang menjunjung tinggi martabat Bundo Kanduang di ranah Minangkabau.',
        accessories: 'Mahkota Suntiang Gadang 7 Tingkat, Kalung Dukuh, Gelang Gadang & Destar Penghulu.',
        images: {
          front: 'https://images.unsplash.com/photo-1583939003579-730e3918a45a?auto=format&fit=crop&w=800&q=85',
          back: 'https://images.unsplash.com/photo-1610030469983-98e550d6193c?auto=format&fit=crop&w=800&q=85',
          detail: 'https://images.unsplash.com/photo-1594633312681-425c7b97ccd1?auto=format&fit=crop&w=800&q=85'
        }
      },
      {
        id: 'riau-teluk-belanga',
        realm: 'Nusantara',
        name: 'Kebaya Labuh & Teluk Belanga Melayu',
        region: 'Sumatra',
        origin: 'Siak Sri Indrapura & Tanjungpinang, Riau',
        events: ['Pernikahan Adat', 'Wisuda', 'Photoshoot'],
        price: 510000,
        status: 'Tersedia',
        material: 'Sutra Tenun Siak & Kain Songket Lejo Benang Perak-Emas',
        motif: 'Tampuk Manggis & Semut Beriring — lambang kejujuran, kerukunan, dan budi bahasa Melayu.',
        history: 'Warisan Kesultanan Siak dan Riau-Lingga yang anggun dan santun untuk acara akad nikah maupun perhelatan resmi.',
        accessories: 'Tanjak Laksamana, Pending Emas, Dokoh Bertingkat & Selendang Tenun Siak.',
        images: {
          front: 'https://images.unsplash.com/photo-1605649487212-47bdab064df7?auto=format&fit=crop&w=800&q=85',
          back: 'https://images.unsplash.com/photo-1594633312681-425c7b97ccd1?auto=format&fit=crop&w=800&q=85',
          detail: 'https://images.unsplash.com/photo-1610030469983-98e550d6193c?auto=format&fit=crop&w=800&q=85'
        }
      },
      {
        id: 'palembang-aesan',
        realm: 'Nusantara',
        name: 'Aesan Gede & Paksangko Sriwijaya',
        region: 'Sumatra',
        origin: 'Palembang, Sumatra Selatan & Bangka Belitung',
        events: ['Pernikahan Adat', 'Photoshoot', 'Festival Budaya'],
        price: 680000,
        status: 'Tersedia',
        material: 'Songket Lepus Benang Emas murni, Dodot & Selendang Pelangi',
        motif: 'Bunga Melati & Lepus Berakam — perlambang kejayaan maritim Sriwijaya dan keagungan raja.',
        history: 'Warisan Kesultanan Palembang Darussalam yang terkenal dengan kemewahan tenun songket bertabur benang emas.',
        accessories: 'Karsuhun Mahkota Emas, Teratai Dada, Kalung Kebo Munggah & Gelang Sempuru.',
        images: {
          front: 'https://images.unsplash.com/photo-1610030469983-98e550d6193c?auto=format&fit=crop&w=800&q=85',
          back: 'https://images.unsplash.com/photo-1594633312681-425c7b97ccd1?auto=format&fit=crop&w=800&q=85',
          detail: 'https://images.unsplash.com/photo-1583939003579-730e3918a45a?auto=format&fit=crop&w=800&q=85'
        }
      },
      {
        id: 'lampung-pepadun',
        realm: 'Nusantara',
        name: 'Tulang Bawang & Siger Pepadun Lampung',
        region: 'Sumatra',
        origin: 'Bandar Lampung & Menggala, Lampung',
        events: ['Pernikahan Adat', 'Festival Budaya', 'Wisuda'],
        price: 580000,
        status: 'Tersedia',
        material: 'Kain Tapis Lampung Sulam Benang Emas & Sutra Putih',
        motif: 'Kapal Jung & Pucuk Rebung Tapis — simbol kemakmuran maritim dan kehormatan Saibatin-Pepadun.',
        history: 'Kain Tapis Lampung ditenun dengan teknik sulam benang emas kuno dan dipadukan dengan mahkota Siger berlekuk sembilan.',
        accessories: 'Mahkota Siger Lampung, Seraja Bulan, Kalung Papan Jajar & Gelang Kano.',
        images: {
          front: 'https://images.unsplash.com/photo-1583939003579-730e3918a45a?auto=format&fit=crop&w=800&q=85',
          back: 'https://images.unsplash.com/photo-1605649487212-47bdab064df7?auto=format&fit=crop&w=800&q=85',
          detail: 'https://images.unsplash.com/photo-1610030469983-98e550d6193c?auto=format&fit=crop&w=800&q=85'
        }
      },

      // === JAWA, SUNDA & BETAWI ===
      {
        id: 'jawa-basahan',
        realm: 'Nusantara',
        name: 'Kebaya Beludru & Basahan Keraton',
        region: 'Jawa & Sunda',
        origin: 'Surakarta & DI Yogyakarta',
        events: ['Pernikahan Adat', 'Wisuda', 'Photoshoot'],
        price: 550000,
        status: 'Tersedia',
        material: 'Beludru Sutra Hitam, Benang Emas Prada, Jarik Batik Tulis Sidomukti',
        motif: 'Motif Sidomukti & Parang Kusumo — melambangkan kemakmuran lahir batin dan keluhuran budi.',
        history: 'Busana kebesaran bangsawan Keraton Mataram yang dikenakan pada upacara pernikahan agung dan kirab budaya sejak abad ke-18.',
        accessories: 'Paes Ageng / Sanggul Tekuk, Cunduk Mentul 7 Buah, Kalung Susun, Pending Emas & Keris Ladrang.',
        images: {
          front: 'https://images.unsplash.com/photo-1610030469983-98e550d6193c?auto=format&fit=crop&w=800&q=85',
          back: 'https://images.unsplash.com/photo-1583939003579-730e3918a45a?auto=format&fit=crop&w=800&q=85',
          detail: 'https://images.unsplash.com/photo-1594633312681-425c7b97ccd1?auto=format&fit=crop&w=800&q=85'
        }
      },
      {
        id: 'sunda-siger',
        realm: 'Nusantara',
        name: 'Kebaya Agung & Siger Sunda Priangan',
        region: 'Jawa & Sunda',
        origin: 'Bandung, Sumedang & Banten',
        events: ['Pernikahan Adat', 'Wisuda', 'Photoshoot'],
        price: 520000,
        status: 'Tersedia',
        material: 'Brokat Prancis Sulam Kristal, Kain Batik Lereng Eneng',
        motif: 'Mega Mendung & Rereng — perlambang keteduhan hati, kebijaksanaan, dan kesabaran pemimpin.',
        history: 'Terinspirasi dari keanggunan putri kerajaan Pajajaran dengan mahkota Siger simetris sebagai simbol kehormatan.',
        accessories: 'Mahkota Siger Sunda, Kembang Tanjung, Ronce Melati Tiba Dada & Bendo Pria.',
        images: {
          front: 'https://images.unsplash.com/photo-1594633312681-425c7b97ccd1?auto=format&fit=crop&w=800&q=85',
          back: 'https://images.unsplash.com/photo-1583939003579-730e3918a45a?auto=format&fit=crop&w=800&q=85',
          detail: 'https://images.unsplash.com/photo-1610030469983-98e550d6193c?auto=format&fit=crop&w=800&q=85'
        }
      },
      {
        id: 'betawi-carehaji',
        realm: 'Nusantara',
        name: 'Kebaya Encim & Dandanan Care Haji Betawi',
        region: 'Jawa & Sunda',
        origin: 'DKI Jakarta (Betawi)',
        events: ['Pernikahan Adat', 'Festival Budaya', 'Wisuda'],
        price: 490000,
        status: 'Tersedia',
        material: 'Sutra Bordir Kerancang Halus & Kain Batik Pesisir Betawi',
        motif: 'Burung Hong & Ondel-Ondel — akulturasi budaya Nusantara, Tionghoa, dan Arab yang penuh sukacita.',
        history: 'Busana ikonik masyarakat Betawi dari Kebaya Encim anggun hingga busana pengantin Dandanan Care Haji yang megah.',
        accessories: 'Siangko Cadar Emas, Kembang Kelape, Sorban Alpie & Sabuk Jawara.',
        images: {
          front: 'https://images.unsplash.com/photo-1583939003579-730e3918a45a?auto=format&fit=crop&w=800&q=85',
          back: 'https://images.unsplash.com/photo-1594633312681-425c7b97ccd1?auto=format&fit=crop&w=800&q=85',
          detail: 'https://images.unsplash.com/photo-1610030469983-98e550d6193c?auto=format&fit=crop&w=800&q=85'
        }
      },
      {
        id: 'jatim-majapahit-madura',
        realm: 'Nusantara',
        name: 'Busana Agung Majapahit & Pesa’an Madura',
        region: 'Jawa & Sunda',
        origin: 'Trowulan, Banyuwangi & Sumenep, Jawa Timur',
        events: ['Festival Budaya', 'Pernikahan Adat', 'Pertunjukan'],
        price: 530000,
        status: 'Tersedia',
        material: 'Beludru Sulam Emas Majapahit & Batik Gentongan Madura',
        motif: 'Surya Majapahit & Gajah Oling Banyuwangi — lambang keberanian, ketegasan, dan kejayaan Nusantara.',
        history: 'Menampilkan kemegahan busana kerajaan Majapahit serta karakter gagah busana khas Sumenep Madura dan Gandrung Osing.',
        accessories: 'Jamang Mahkota Majapahit, Odheng Santapan Madura, Kelat Bahu & Keris.',
        images: {
          front: 'https://images.unsplash.com/photo-1610030469983-98e550d6193c?auto=format&fit=crop&w=800&q=85',
          back: 'https://images.unsplash.com/photo-1605649487212-47bdab064df7?auto=format&fit=crop&w=800&q=85',
          detail: 'https://images.unsplash.com/photo-1594633312681-425c7b97ccd1?auto=format&fit=crop&w=800&q=85'
        }
      },

      // === BALI & NUSA TENGGARA (NTB & NTT) ===
      {
        id: 'bali-payas',
        realm: 'Nusantara',
        name: 'Payas Agung Puri Klungkung',
        region: 'Bali & Nusa Tenggara',
        origin: 'Klungkung & Gianyar, Bali',
        events: ['Pernikahan Adat', 'Festival Budaya', 'Photoshoot'],
        price: 650000,
        status: 'Tersedia',
        material: 'Tenun Songket Sidemen, Kain Prada Emas, Tapih Sutra',
        motif: 'Motif Patra Punggel & Karang Boma — simbol keselarasan semesta (Tri Hita Karana) dan perlindungan agung.',
        history: 'Busana kerajaan Bali yang dahulu hanya dikenakan oleh keluarga puri saat upacara Pawiwahan (pernikahan) dan karya agung.',
        accessories: 'Gelung Agung Mahkota Emas, Bunga Sandat Emas, Subeng, Badong Leher & Keris Bali berhias permata.',
        images: {
          front: 'https://images.unsplash.com/photo-1537996194471-e657df975ab4?auto=format&fit=crop&w=800&q=85',
          back: 'https://images.unsplash.com/photo-1518548419970-58e3b4079ab2?auto=format&fit=crop&w=800&q=85',
          detail: 'https://images.unsplash.com/photo-1605649487212-47bdab064df7?auto=format&fit=crop&w=800&q=85'
        }
      },
      {
        id: 'ntb-sasak-bima',
        realm: 'Nusantara',
        name: 'Lambung Sasak Lombok & Songket Mbojo',
        region: 'Bali & Nusa Tenggara',
        origin: 'Lombok & Bima, Nusa Tenggara Barat',
        events: ['Wisuda', 'Festival Budaya', 'Pernikahan Adat'],
        price: 495000,
        status: 'Tersedia',
        material: 'Tenun Songket Sukarara & Tembe Nggoli Bima',
        motif: 'Subahnale & Keker (Burung Merak) — melambangkan kesabaran penenun dan keindahan alam Pulau Seribu Masjid.',
        history: 'Busana adat suku Sasak di Lombok dan Bima yang memadukan atasan beludru hitam dengan kain tenun songket berwarna cerah.',
        accessories: 'Sapuk Ikat Kepala, Pangkak Mahkota Emas, Sabuk Anteng & Keris Sasak.',
        images: {
          front: 'https://images.unsplash.com/photo-1605649487212-47bdab064df7?auto=format&fit=crop&w=800&q=85',
          back: 'https://images.unsplash.com/photo-1537996194471-e657df975ab4?auto=format&fit=crop&w=800&q=85',
          detail: 'https://images.unsplash.com/photo-1518548419970-58e3b4079ab2?auto=format&fit=crop&w=800&q=85'
        }
      },
      {
        id: 'ntt-sumba-rote',
        realm: 'Nusantara',
        name: 'Tenun Ikat Hinggih Sumba & Ti’i Langga Rote',
        region: 'Bali & Nusa Tenggara',
        origin: 'Waingapu Sumba, Timor & Rote, NTT',
        events: ['Festival Budaya', 'Photoshoot', 'Wisuda'],
        price: 540000,
        status: 'Tersedia',
        material: 'Tenun Ikat Pewarna Alam Indigo & Morinda (Mengkudu)',
        motif: 'Mamuli, Kuda Sandelwood & Ayam Jantan — simbol keberanian, kesuburan, dan martabat leluhur Flobamora.',
        history: 'Kain tenun ikat buatan tangan yang membutuhkan proses hingga berbulan-bulan, dilengkapi topi ikonik Ti’i Langga dari Pulau Rote.',
        accessories: 'Topi Ti’i Langga, Mahkota Bulan Sabit (Marangga), Kalung Mutisalak & Pendok.',
        images: {
          front: 'https://images.unsplash.com/photo-1518548419970-58e3b4079ab2?auto=format&fit=crop&w=800&q=85',
          back: 'https://images.unsplash.com/photo-1605649487212-47bdab064df7?auto=format&fit=crop&w=800&q=85',
          detail: 'https://images.unsplash.com/photo-1537996194471-e657df975ab4?auto=format&fit=crop&w=800&q=85'
        }
      },

      // === KALIMANTAN ===
      {
        id: 'dayak-king',
        realm: 'Nusantara',
        name: 'Ta’a & Sapei Sapaq Manik Borneo',
        region: 'Kalimantan',
        origin: 'Kalimantan Barat, Tengah & Timur',
        events: ['Festival Budaya', 'Pertunjukan', 'Photoshoot'],
        price: 530000,
        status: 'Tersedia',
        material: 'Beludru Sulam Manik-Manik Tradisional & Kulit Kayu Kapuo',
        motif: 'Enggang Gading & Pakis — melambangkan keluhuran budi, kesetiaan, dan penjaga alam Borneo.',
        history: 'Karya seni sulam manik tangan yang diwariskan turun-temurun sebagai busana upacara penyambutan tamu agung.',
        accessories: 'Lavung Manik, Bulu Burung Enggang Sintetis Konservasi, Kalung Taring & Mandau Hias.',
        images: {
          front: 'https://images.unsplash.com/photo-1518548419970-58e3b4079ab2?auto=format&fit=crop&w=800&q=85',
          back: 'https://images.unsplash.com/photo-1605649487212-47bdab064df7?auto=format&fit=crop&w=800&q=85',
          detail: 'https://images.unsplash.com/photo-1537996194471-e657df975ab4?auto=format&fit=crop&w=800&q=85'
        }
      },
      {
        id: 'kutai-banjar',
        realm: 'Nusantara',
        name: 'Busana Kustin Kutai & Pengantin Banjar',
        region: 'Kalimantan',
        origin: 'Tenggarong & Banjarmasin, Kalimantan',
        events: ['Pernikahan Adat', 'Wisuda', 'Photoshoot'],
        price: 590000,
        status: 'Tersedia',
        material: 'Beludru Hitam Sulam Benang Emas & Kain Sasirangan',
        motif: 'Waja Sampai Kaputing & Naga Berjuang — keagungan kerajaan tertua Nusantara Kutai Kartanegara.',
        history: 'Busana kebesaran Kesultanan Kutai Kartanegara Ing Martadipura dan Kesultanan Banjar yang sarat sulaman emas.',
        accessories: 'Setorong Mahkota Kutai, Amar Pengantin Banjar, Kalung Samban & Keris.',
        images: {
          front: 'https://images.unsplash.com/photo-1610030469983-98e550d6193c?auto=format&fit=crop&w=800&q=85',
          back: 'https://images.unsplash.com/photo-1583939003579-730e3918a45a?auto=format&fit=crop&w=800&q=85',
          detail: 'https://images.unsplash.com/photo-1594633312681-425c7b97ccd1?auto=format&fit=crop&w=800&q=85'
        }
      },

      // === SULAWESI ===
      {
        id: 'bugis-bodo',
        realm: 'Nusantara',
        name: 'Baju Bodo Tokko & Jas Tutup Bugis',
        region: 'Sulawesi',
        origin: 'Makassar & Bugis, Sulawesi Selatan',
        events: ['Pernikahan Adat', 'Festival Budaya', 'Pertunjukan'],
        price: 490000,
        status: 'Tersedia',
        material: 'Kain Muslin Sutra Tipis Berkilau & Tenun Lipa Sabbe Sengkang',
        motif: 'Balo Renni & Lagosi — simbol kesucian jiwa, ketulusan, dan keberanian pelaut Bugis.',
        history: 'Salah satu busana tertua di Nusantara yang telah tercatat sejak abad ke-9 dengan aturan warna sesuai usia.',
        accessories: 'Saloko Pinang Goyang (Mahkota), Simatayya (Gelang Lengan), Bangkara & Passapu.',
        images: {
          front: 'https://images.unsplash.com/photo-1605649487212-47bdab064df7?auto=format&fit=crop&w=800&q=85',
          back: 'https://images.unsplash.com/photo-1537996194471-e657df975ab4?auto=format&fit=crop&w=800&q=85',
          detail: 'https://images.unsplash.com/photo-1594633312681-425c7b97ccd1?auto=format&fit=crop&w=800&q=85'
        }
      },
      {
        id: 'toraja-minahasa',
        realm: 'Nusantara',
        name: 'Pokko Toraja & Laku Tepu Minahasa-Sangihe',
        region: 'Sulawesi',
        origin: 'Tana Toraja, Gorontalo & Manado, Sulawesi',
        events: ['Festival Budaya', 'Pertunjukan', 'Wisuda'],
        price: 510000,
        status: 'Tersedia',
        material: 'Tenun Pa’ssura Toraja & Serat Koffo Sangihe',
        motif: 'Pa’barre Allo (Matahari) & Kerbau — melambangkan sumber kehidupan, persaudaraan, dan keluhuran adat.',
        history: 'Mewakili kekayaan budaya Sulawesi bagian tengah hingga utara dengan hiasan manik-manik Kandore yang megah.',
        accessories: 'Kandore Manik Dada, Sa’pi’ Ulu’ (Ikat Kepala), Biliu Gorontalo & Gelang Toraja.',
        images: {
          front: 'https://images.unsplash.com/photo-1518548419970-58e3b4079ab2?auto=format&fit=crop&w=800&q=85',
          back: 'https://images.unsplash.com/photo-1537996194471-e657df975ab4?auto=format&fit=crop&w=800&q=85',
          detail: 'https://images.unsplash.com/photo-1605649487212-47bdab064df7?auto=format&fit=crop&w=800&q=85'
        }
      },

      // === MALUKU & PAPUA (HINGGA MERAUKE) ===
      {
        id: 'maluku-cele-ternate',
        realm: 'Nusantara',
        name: 'Baju Cele Ambon & Kimun Gia Ternate',
        region: 'Maluku & Papua',
        origin: 'Ambon, Maluku & Ternate, Maluku Utara',
        events: ['Wisuda', 'Festival Budaya', 'Pernikahan Adat'],
        price: 495000,
        status: 'Tersedia',
        material: 'Kain Tenun Kotak-Kotak Merah Emas & Sutra Kesultanan Ternate',
        motif: 'Garis Geometris Emas & Cengkeh Pala — melambangkan keberanian, keceriaan, dan kejayaan Kepulauan Rempah.',
        history: 'Baju Cele ikonik dari tanah Maluku dipadukan dengan busana bangsawan Kesultanan Ternate & Tidore.',
        accessories: 'Konde Bulan Emas, Hasper (Tusuk Konde), Lenso Saputangan & Mahkota Ternate.',
        images: {
          front: 'https://images.unsplash.com/photo-1594633312681-425c7b97ccd1?auto=format&fit=crop&w=800&q=85',
          back: 'https://images.unsplash.com/photo-1583939003579-730e3918a45a?auto=format&fit=crop&w=800&q=85',
          detail: 'https://images.unsplash.com/photo-1605649487212-47bdab064df7?auto=format&fit=crop&w=800&q=85'
        }
      },
      {
        id: 'papua-ceremonial',
        realm: 'Nusantara',
        name: 'Busana Adat Cenderawasih & Rok Rumbai Merauke',
        region: 'Maluku & Papua',
        origin: 'Jayapura, Biak, Raja Ampat hingga Merauke, Papua',
        events: ['Festival Budaya', 'Pertunjukan', 'Wisuda'],
        price: 480000,
        status: 'Tersedia',
        material: 'Serat Rumbai Sagu Alami, Kulit Kayu Lukis & Tenun Timor',
        motif: 'Cenderawasih, Tifa & Ukiran Asmat — simbol sukacita persaudaraan, kekayaan alam timur, dan semangat kebersamaan.',
        history: 'Menyempurnakan perjalanan wastra dari Sabang hingga Merauke untuk karnaval nusantara, pentas seni, dan acara nasional.',
        accessories: 'Mahkota Rumbai Hias Cenderawasih Replika, Kalung Kerang Mutiara, Tas Noken Rajut & Tifa Mini.',
        images: {
          front: 'https://images.unsplash.com/photo-1537996194471-e657df975ab4?auto=format&fit=crop&w=800&q=85',
          back: 'https://images.unsplash.com/photo-1518548419970-58e3b4079ab2?auto=format&fit=crop&w=800&q=85',
          detail: 'https://images.unsplash.com/photo-1605649487212-47bdab064df7?auto=format&fit=crop&w=800&q=85'
        }
      },

      // === BUSANA BUDAYA MANCANEGARA VIRAL ===
      {
        id: 'japan-kimono',
        realm: 'Mancanegara',
        name: 'Furisode Kimono Kyoto & Montsuki Hakama',
        region: 'Asia Timur',
        origin: 'Kyoto, Jepang 🇯🇵',
        events: ['Photoshoot', 'Festival Budaya', 'Wisuda'],
        price: 580000,
        status: 'Tersedia',
        material: 'Kain Chirimen Sutra Jepang Motif Sakura & Bangau Emas',
        motif: 'Tsuru (Bangau) & Sakura — perlambang umur panjang, keberuntungan, dan keindahan musim semi Jepang.',
        history: 'Furisode berlengan panjang adalah busana formal tertinggi bagi wanita di Jepang untuk upacara kedewasaan dan perayaan.',
        accessories: 'Nishijin Brocade Obi, Obijime, Kanzashi Tusuk Konde Bunga, Kipas Sensu & Sandal Zori.',
        images: {
          front: 'https://images.unsplash.com/photo-1528360983277-13d401cdc186?auto=format&fit=crop&w=800&q=85',
          back: 'https://images.unsplash.com/photo-1545569341-9eb8b30979d9?auto=format&fit=crop&w=800&q=85',
          detail: 'https://images.unsplash.com/photo-1524413840807-0c3cb6fa808d?auto=format&fit=crop&w=800&q=85'
        }
      },
      {
        id: 'korea-hanbok',
        realm: 'Mancanegara',
        name: 'Royal Joseon Hanbok (Dangui & Gonryongpo)',
        region: 'Asia Timur',
        origin: 'Seoul & Gyeongju, Korea Selatan 🇰🇷',
        events: ['Photoshoot', 'Pernikahan Adat', 'Festival Budaya'],
        price: 560000,
        status: 'Tersedia',
        material: 'Sutra Organza Korea Berlapis Sulaman Naga & Bunga Teratai Emas',
        motif: 'Geumbak (Cap Daun Emas Kerajaan) — simbol kemakmuran istana Gyeongbokgung dan keanggunan bangsawan Joseon.',
        history: 'Busana kerajaan Dinasti Joseon yang sangat populer untuk sesi foto prewedding bergaya istana Korea.',
        accessories: 'Jokduri Mahkota Mutiara, Binyeo Tusuk Konde Giok, Norigae Gantungan & Gat Topi Bangsawan.',
        images: {
          front: 'https://images.unsplash.com/photo-1583391733956-3750e0ff4e8b?auto=format&fit=crop&w=800&q=85',
          back: 'https://images.unsplash.com/photo-1517154421773-0529f29ea451?auto=format&fit=crop&w=800&q=85',
          detail: 'https://images.unsplash.com/photo-1538485399081-7191377e8241?auto=format&fit=crop&w=800&q=85'
        }
      },
      {
        id: 'netherlands-volendam',
        realm: 'Mancanegara',
        name: 'Volendam Klederdracht Royal Dutch',
        region: 'Eropa & Timur Tengah',
        origin: 'Volendam & Zaanse Schans, Belanda 🇳🇱',
        events: ['Photoshoot', 'Festival Budaya', 'Pertunjukan'],
        price: 520000,
        status: 'Tersedia',
        material: 'Wol Bergaris Merah-Hitam Belanda, Renda Hul Bordir & Apron Katun',
        motif: 'Renda Bunga Volendam & Kancing Perak — warisan busana tradisional pesisir Belanda yang mendunia.',
        history: 'Kostum ikonik desa nelayan Volendam Belanda yang terkenal di seluruh dunia untuk wisata foto budaya Eropa klasik.',
        accessories: 'Topi Renda Volendam (Hul), Kalung Batu Karang Merah (Bloedkoraal) & Sepatu Kayu Klompen.',
        images: {
          front: 'https://images.unsplash.com/photo-1512470876302-972faa2aa9a4?auto=format&fit=crop&w=800&q=85',
          back: 'https://images.unsplash.com/photo-1534351590666-13e3e96b5017?auto=format&fit=crop&w=800&q=85',
          detail: 'https://images.unsplash.com/photo-1467269204594-9661b134dd2b?auto=format&fit=crop&w=800&q=85'
        }
      },
      {
        id: 'china-hanfu-qipao',
        realm: 'Mancanegara',
        name: 'Imperial Ming Hanfu & Royal Qipao',
        region: 'Asia Timur',
        origin: 'Beijing & Suzhou, Tiongkok 🇨🇳',
        events: ['Photoshoot', 'Pernikahan Adat', 'Festival Budaya'],
        price: 570000,
        status: 'Tersedia',
        material: 'Sutra Suzhou Sulam Burung Phoenix & Naga Emas',
        motif: 'Feng Huang (Phoenix) & Peony — lambang keagungan permaisuri, kemakmuran, dan keharmonisan.',
        history: 'Busana klasik Dinasti Ming dan Qipao kerajaan yang memancarkan aura aristokrat Asia Timur.',
        accessories: 'Mahkota Phoenix Buyao, Kipas Sutra Bulat Tuanshan & Liontin Giok.',
        images: {
          front: 'https://images.unsplash.com/photo-1519741497674-611481863552?auto=format&fit=crop&w=800&q=85',
          back: 'https://images.unsplash.com/photo-1528360983277-13d401cdc186?auto=format&fit=crop&w=800&q=85',
          detail: 'https://images.unsplash.com/photo-1524413840807-0c3cb6fa808d?auto=format&fit=crop&w=800&q=85'
        }
      },
      {
        id: 'india-lehenga',
        realm: 'Mancanegara',
        name: 'Royal Rajasthani Lehenga & Sherwani',
        region: 'Eropa & Timur Tengah',
        origin: 'Jaipur & Udaipur, India 🇮🇳',
        events: ['Pernikahan Adat', 'Photoshoot', 'Festival Budaya'],
        price: 640000,
        status: 'Tersedia',
        material: 'Beludru Merah Ruby & Sutra Banarasi Sulam Zardozi Emas',
        motif: 'Mandala & Merak Kerajaan Mughal — kemewahan busana istana Rajasthan yang berkilau.',
        history: 'Busana pengantin dan perayaan kerajaan India yang kaya akan sulaman tangan Zardozi dan payet.',
        accessories: 'Selendang Dupatta Sulam, Maang Tikka Hiasan Dahi, Kalung Kundan & Turban Safa Pria.',
        images: {
          front: 'https://images.unsplash.com/photo-1583391733956-3750e0ff4e8b?auto=format&fit=crop&w=800&q=85',
          back: 'https://images.unsplash.com/photo-1610030469983-98e550d6193c?auto=format&fit=crop&w=800&q=85',
          detail: 'https://images.unsplash.com/photo-1594633312681-425c7b97ccd1?auto=format&fit=crop&w=800&q=85'
        }
      },
      {
        id: 'turkey-ottoman',
        realm: 'Mancanegara',
        name: 'Ottoman Sultan Kaftan & Bindalli Gown',
        region: 'Eropa & Timur Tengah',
        origin: 'Istanbul, Turki 🇹🇷',
        events: ['Photoshoot', 'Pernikahan Adat', 'Festival Budaya'],
        price: 610000,
        status: 'Tersedia',
        material: 'Beludru Marun & Brokat Turki Sulam Benang Emas',
        motif: 'Tulip & Arabesque Istana Topkapi — simbol kejayaan seni tekstil Kesultanan Utsmaniyah.',
        history: 'Gaun Bindalli dan Kaftan Sultan yang megah untuk pemotretan bertema istana Timur Tengah & Mediterania.',
        accessories: 'Mahkota Hürrem Sultan, Sabuk Emas & Kopiah Kavuk Sultan.',
        images: {
          front: 'https://images.unsplash.com/photo-1594633312681-425c7b97ccd1?auto=format&fit=crop&w=800&q=85',
          back: 'https://images.unsplash.com/photo-1583939003579-730e3918a45a?auto=format&fit=crop&w=800&q=85',
          detail: 'https://images.unsplash.com/photo-1610030469983-98e550d6193c?auto=format&fit=crop&w=800&q=85'
        }
      }
    ];

    let activeRealm = 'All';
    let activeRegion = 'All';

    function setRealmFilter(realm) {
      activeRealm = realm;
      activeRegion = 'All';
      document.querySelectorAll('.realm-btn').forEach(btn => {
        btn.className = btn.dataset.realm === realm
          ? 'realm-btn px-6 py-3 rounded-full text-xs font-extrabold uppercase tracking-wider transition-all bg-ruby text-champagne border-2 border-gold shadow-lg'
          : 'realm-btn px-6 py-3 rounded-full text-xs font-extrabold uppercase tracking-wider transition-all bg-white text-charcoal hover:bg-ruby/10 border-2 border-gold/50';
      });
      setRegionFilter('All');
    }

    function setRegionFilter(region) {
      activeRegion = region;
      document.querySelectorAll('.region-btn').forEach(btn => {
        if (btn.dataset.region === region) {
          btn.className = 'region-btn px-4 py-2 rounded-full text-xs font-bold transition-all bg-charcoal text-champagne border border-gold shadow';
        } else {
          btn.className = 'region-btn px-4 py-2 rounded-full text-xs font-bold transition-all bg-white text-charcoal hover:bg-ruby/10 border border-gold/40';
        }
      });
      renderCostumeGrid();
    }

    function filterCollectionFromHero(region, realm = 'All') {
      switchPage('all');
      setRealmFilter(realm);
      setRegionFilter(region);
      document.getElementById('koleksi-section').scrollIntoView({ behavior: 'smooth' });
    }

    function renderCostumeGrid() {
      const eventVal = document.getElementById('event-filter').value;
      const searchVal = (document.getElementById('costume-search')?.value || '').toLowerCase().trim();

      const filtered = costumesData.filter(c => {
        const matchRealm = activeRealm === 'All' || c.realm === activeRealm;
        const matchRegion = activeRegion === 'All' || c.region === activeRegion;
        const matchEvent = eventVal === 'All' || c.events.includes(eventVal);
        const matchSearch = !searchVal ||
          c.name.toLowerCase().includes(searchVal) ||
          c.origin.toLowerCase().includes(searchVal) ||
          c.region.toLowerCase().includes(searchVal) ||
          c.motif.toLowerCase().includes(searchVal);
        return matchRealm && matchRegion && matchEvent && matchSearch;
      });

      const grid = document.getElementById('costume-grid');
      if (filtered.length === 0) {
        grid.innerHTML = `<div class="col-span-full text-center py-12 bg-white rounded-3xl border border-gold/40">
          <p class="font-royal text-lg font-bold text-charcoal">Tidak ada busana pada kombinasi filter ini</p>
          <p class="text-xs text-charcoal/70 mt-1">Klik "Semua Koleksi" atau hubungi Stylist kami untuk koleksi daerah/negara tertentu.</p>
        </div>`;
        return;
      }

      grid.innerHTML = filtered.map(c => `
        <div class="luxury-card group bg-white rounded-[2rem] overflow-hidden border-2 border-gold/50 flex flex-col justify-between">
          <div>
            <div class="relative aspect-[3/4] overflow-hidden bg-charcoal">
              <img
                src="${c.images.front}"
                onerror="this.src='https://placehold.co/500x650/741C2C/E5C77B?text=${encodeURIComponent(c.name)}'"
                alt="${c.name}"
                class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700"
              />
              <div class="absolute top-3 left-3 right-3 flex flex-wrap justify-between gap-1.5">
                <span class="px-3 py-1 rounded-full ${c.realm === 'Mancanegara' ? 'bg-crimson text-ivory' : 'bg-charcoal/90 text-champagne'} text-[10px] font-extrabold border border-gold/50">
                  ${c.realm === 'Mancanegara' ? '🌏 Mancanegara' : '🇮🇩 ' + c.region}
                </span>
                <span class="px-2.5 py-1 rounded-full ${c.status === 'Tersedia' ? 'bg-emerald-700 text-white' : 'bg-amber-600 text-white'} text-[10px] font-bold">${c.status}</span>
              </div>
              <div class="absolute inset-x-0 bottom-0 bg-gradient-to-t from-charcoal/95 via-charcoal/50 to-transparent p-4 text-ivory">
                <p class="text-[11px] text-champagne font-semibold">${c.origin}</p>
                <h3 class="font-serif text-lg font-bold leading-snug">${c.name}</h3>
              </div>
            </div>

            <div class="p-5 space-y-3">
              <div class="flex flex-wrap gap-1">
                ${c.events.map(ev => `<span class="px-2 py-0.5 rounded-md bg-ivory text-[10px] font-bold text-charcoal/80 border border-gold/30">${ev}</span>`).join('')}
              </div>
              <p class="text-xs text-charcoal/75 line-clamp-2 leading-relaxed">${c.motif}</p>
              <div class="pt-2 border-t border-gold/25 flex items-baseline justify-between">
                <div>
                  <span class="text-[10px] uppercase font-bold text-charcoal/60 block">Mulai Sewa / Hari</span>
                  <span class="font-royal text-lg font-bold text-ruby">Rp ${c.price.toLocaleString('id-ID')}</span>
                </div>
                <span class="text-[11px] font-bold text-gold">+ Aksesoris</span>
              </div>
            </div>
          </div>

          <div class="px-5 pb-5 flex gap-2">
            <button onclick="openCostumeModal('${c.id}')" class="flex-1 py-2.5 rounded-xl bg-ivory hover:bg-gold/30 text-charcoal font-bold text-xs border border-gold/60 transition-all">
              Detail & Galeri
            </button>
            <button onclick="selectCostumeForBooking('${c.id}')" class="flex-1 py-2.5 rounded-xl bg-ruby hover:bg-crimson text-champagne font-bold text-xs shadow transition-all">
              Sewa Sekarang
            </button>
          </div>
        </div>
      `).join('');
    }

    // 2. COSTUME DETAIL & GALLERY MODAL
    function openCostumeModal(id) {
      const c = costumesData.find(item => item.id === id);
      if (!c) return;

      const modal = document.getElementById('costume-detail-modal');
      const content = document.getElementById('costume-modal-content');

      content.innerHTML = `
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-7 items-start">
          <div class="lg:col-span-5 space-y-3">
            <div class="rounded-2xl overflow-hidden border-2 border-gold aspect-[3/4] bg-charcoal">
              <img id="modal-main-img" src="${c.images.front}" alt="${c.name}" class="w-full h-full object-cover" />
            </div>
            <div class="grid grid-cols-3 gap-2">
              <button onclick="switchModalAngle('${c.images.front}')" class="rounded-xl overflow-hidden border-2 border-ruby aspect-square">
                <img src="${c.images.front}" alt="Tampak Depan" class="w-full h-full object-cover" />
              </button>
              <button onclick="switchModalAngle('${c.images.back}')" class="rounded-xl overflow-hidden border border-gold/50 hover:border-ruby aspect-square">
                <img src="${c.images.back}" alt="Tampak Belakang" class="w-full h-full object-cover" />
              </button>
              <button onclick="switchModalAngle('${c.images.detail}')" class="rounded-xl overflow-hidden border border-gold/50 hover:border-ruby aspect-square">
                <img src="${c.images.detail}" alt="Detail Tenun & Bordir" class="w-full h-full object-cover" />
              </button>
            </div>
            <p class="text-[11px] text-center text-charcoal/65 font-semibold">Klik thumbnail: Tampak Depan • Tampak Belakang • Detail Tenun</p>
          </div>

          <div class="lg:col-span-7 space-y-4">
            <div>
              <span class="px-3 py-1 rounded-full bg-ruby text-champagne text-xs font-bold">${c.region} • ${c.origin}</span>
              <h3 class="font-royal text-2xl sm:text-3xl font-bold text-charcoal mt-2">${c.name}</h3>
              <p class="font-royal text-xl font-bold text-crimson mt-1">Rp ${c.price.toLocaleString('id-ID')} <span class="text-xs font-sans font-normal text-charcoal/70">/ hari (Basic)</span></p>
            </div>

            <div class="bg-white p-4 rounded-2xl border border-gold/40 space-y-2.5 text-xs">
              <div><strong class="text-ruby">Sejarah Singkat:</strong> <span class="text-charcoal/85">${c.history}</span></div>
              <div><strong class="text-ruby">Bahan Wastra:</strong> <span class="text-charcoal/85">${c.material}</span></div>
              <div><strong class="text-ruby">Filosofi Motif:</strong> <span class="text-charcoal/85">${c.motif}</span></div>
              <div><strong class="text-ruby">Kelengkapan Aksesoris:</strong> <span class="text-charcoal/85">${c.accessories}</span></div>
            </div>

            <div class="flex flex-wrap gap-3 pt-2">
              <button onclick="closeCostumeModal(); selectCostumeForBooking('${c.id}')" class="flex-1 py-3.5 px-6 rounded-xl bg-ruby hover:bg-crimson text-champagne font-extrabold text-xs uppercase tracking-wider shadow-lg">
                Lanjut Reservasi Busana Ini →
              </button>
              <button onclick="closeCostumeModal(); openSizeModal()" class="py-3.5 px-4 rounded-xl bg-white border border-gold text-charcoal font-bold text-xs">
                📏 Cek Ukuran
              </button>
            </div>
          </div>
        </div>
      `;

      modal.classList.remove('hidden');
      modal.classList.add('flex');
    }

    function switchModalAngle(url) {
      const img = document.getElementById('modal-main-img');
      if (img) img.src = url;
    }

    function closeCostumeModal() {
      const modal = document.getElementById('costume-detail-modal');
      modal.classList.add('hidden');
      modal.classList.remove('flex');
    }

    // 3. CULTURAL HERITAGE STORY TABS
    const heritageStories = {
      jawa: {
        title: 'Filosofi Batik Sidomukti & Arsitektur Joglo Keraton',
        archName: 'Rumah Joglo & Pendopo Agung',
        meaning: 'Atap Joglo yang menjulang ditopang empat saka guru melambangkan keselarasan hubungan manusia dengan Tuhan, sesama, dan alam semesta.',
        fabricStory: 'Motif Sidomukti pada kain jarik pengantin Jawa bermakna "Sido" (terwujud) dan "Mukti" (mulia/sejahtera), menjadi doa agar pemakainya senantiasa mendapatkan kemuliaan dan ketenteraman hidup.',
        svg: `<svg class="w-40 h-28 text-ruby mx-auto" viewBox="0 0 280 140" fill="currentColor">
          <path d="M140 16L180 56L265 86H15L100 56L140 16Z"/>
          <rect x="60" y="86" width="160" height="44" fill="#342329"/>
          <rect x="122" y="96" width="36" height="34" fill="#C99A3C"/>
        </svg>`
      },
      minang: {
        title: 'Songket Pandai Sikek & Gonjong Rumah Gadang',
        archName: 'Rumah Gadang Bagonjong',
        meaning: 'Atap melengkung runcing menyerupai tanduk kerbau melambangkan kemenangan diplomasi kearifan lokal Minangkabau yang menjunjung tinggi musyawarah.',
        fabricStory: 'Tenun Songket Pandai Sikek ditenun dengan benang emas membentuk motif Pucuak Rabuang (rebung bambu) yang bermakna berguna sejak muda hingga dewasa.',
        svg: `<svg class="w-40 h-28 text-ruby mx-auto" viewBox="0 0 260 140" fill="currentColor">
          <path d="M15 30C45 68 85 76 130 52C175 76 215 68 245 30C226 78 188 94 130 82C72 94 34 78 15 30Z"/>
          <path d="M52 78H208L218 126H42L52 78Z" fill="#342329"/>
          <rect x="115" y="92" width="30" height="34" fill="#C99A3C"/>
        </svg>`
      },
      bali: {
        title: 'Kain Prada Payas Agung & Keseimbangan Candi Bentar',
        archName: 'Candi Bentar & Bale Agung',
        meaning: 'Dua sisi gapura yang terbelah simetris melambangkan konsep Rwa Bhineda—keseimbangan antara unsur positif dan negatif dalam kehidupan.',
        fabricStory: 'Kain Prada Bali dihiasi lembaran perada emas bermotif flora Patra Punggel yang memancarkan keagungan spiritual dalam setiap upacara adat.',
        svg: `<svg class="w-40 h-28 text-ruby mx-auto" viewBox="0 0 220 140" fill="currentColor">
          <path d="M38 130V55L65 26L86 55V130H38Z"/>
          <path d="M134 130V55L155 26L182 55V130H134Z"/>
          <rect x="44" y="68" width="36" height="6" fill="#C99A3C"/>
          <rect x="140" y="68" width="36" height="6" fill="#C99A3C"/>
        </svg>`
      },
      toraja: {
        title: 'Tenun Pa’ssura & Tongkonan Leluhur Sulawesi',
        archName: 'Rumah Adat Tongkonan',
        meaning: 'Atap melengkung menyerupai perahu mengisahkan semangat pelaut leluhur Nusantara yang tangguh mengarungi samudra dan menjunjung persaudaraan.',
        fabricStory: 'Tenun Toraja dan Lipa Sabbe Bugis memadukan warna merah darah, kuning emas, dan hitam yang melambangkan keberanian, kemuliaan, dan keteguhan.',
        svg: `<svg class="w-40 h-28 text-ruby mx-auto" viewBox="0 0 260 140" fill="currentColor">
          <path d="M20 26C60 72 200 72 240 26L215 80H45L20 26Z"/>
          <rect x="75" y="80" width="110" height="48" fill="#342329"/>
          <circle cx="130" cy="60" r="10" fill="#C99A3C"/>
        </svg>`
      }
    };

    function selectHeritageStory(key) {
      const s = heritageStories[key];
      if (!s) return;

      document.querySelectorAll('.story-tab').forEach(btn => {
        btn.className = btn.dataset.story === key
          ? 'story-tab px-5 py-2.5 rounded-full text-xs font-bold bg-ruby text-champagne border border-gold shadow'
          : 'story-tab px-5 py-2.5 rounded-full text-xs font-bold bg-white text-charcoal border border-gold/40 hover:bg-ruby/10';
      });

      document.getElementById('heritage-story-box').innerHTML = `
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-center">
          <div class="lg:col-span-4 bg-ivory rounded-3xl p-6 border border-gold/50 text-center">
            ${s.svg}
            <p class="font-royal font-bold text-sm text-ruby mt-3">${s.archName}</p>
            <p class="text-[11px] text-charcoal/70 mt-1">Simbol Arsitektur Nusantara</p>
          </div>
          <div class="lg:col-span-8 space-y-4">
            <h3 class="font-royal text-2xl font-bold text-charcoal">${s.title}</h3>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 text-xs sm:text-sm">
              <div class="bg-ivory/70 p-4 rounded-2xl border border-gold/40">
                <p class="font-extrabold text-ruby uppercase text-xs mb-1">Makna Arsitektur</p>
                <p class="text-charcoal/85 leading-relaxed">${s.meaning}</p>
              </div>
              <div class="bg-ivory/70 p-4 rounded-2xl border border-gold/40">
                <p class="font-extrabold text-ruby uppercase text-xs mb-1">Filosofi Motif Wastra</p>
                <p class="text-charcoal/85 leading-relaxed">${s.fabricStory}</p>
              </div>
            </div>
          </div>
        </div>
      `;
    }

    // 4. RENTAL PACKAGES & DURATION PRICING
    let selectedPricingDays = 1;

    function setPricingDuration(days) {
      selectedPricingDays = days;
      document.querySelectorAll('.dur-btn').forEach(b => {
        b.className = parseInt(b.dataset.dur) === days
          ? 'dur-btn px-4 py-2 rounded-full text-xs font-bold bg-ruby text-champagne transition-all'
          : 'dur-btn px-4 py-2 rounded-full text-xs font-bold text-charcoal hover:text-ruby transition-all';
      });
      renderPackages();
    }

    function renderPackages() {
      const mult = selectedPricingDays === 1 ? 1 : selectedPricingDays === 2 ? 1.7 : 2.25;
      const durText = selectedPricingDays === 1 ? '/ 1 Hari' : selectedPricingDays === 2 ? '/ 2 Hari' : '/ 3 Hari';

      const pkgs = [
        {
          badge: 'Basic Heritage',
          title: 'Paket Busana Utama',
          base: 450000,
          desc: 'Cocok untuk acara wisuda atau photoshoot studio dengan aksesoris minimalis.',
          features: ['1 Set Busana Adat (Atasan + Kain Bawahan)', 'Selendang / Sabuk Standar', 'Sudah termasuk Steam Dry-Clean', 'Gratis konsultasi ukuran via WA']
        },
        {
          badge: 'Complete Royal ⭐',
          title: 'Paket Lengkap Aksesoris',
          base: 650000,
          featured: true,
          desc: 'Pilihan terfavorit untuk pesta adat, lamaran, dan pertunjukan budaya.',
          features: ['1 Set Busana Adat Koleksi Pilihan', 'Mahkota / Suntiang / Blangkon / Keris', 'Perhiasan Sepuh Emas Lengkap', 'Garment Bag Eksklusif Atelier']
        },
        {
          badge: 'Premium Maestro',
          title: 'Wastra Tulis & Fitting',
          base: 950000,
          desc: 'Koleksi tenun songket tangan & batik tulis langka dengan sesi fitting privat.',
          features: ['Busana Koleksi Masterpiece / Tenun Tangan', '1x Sesi Private Fitting & Custom Alteration', 'Aksesoris Full Set Kelas Kerajaan', 'Prioritas Jadwal & Styling Consultation']
        },
        {
          badge: 'Couple / Family',
          title: 'Paket Pasangan & Keluarga',
          base: 1150000,
          desc: 'Sepasang busana pengantin/pasangan (2 set lengkap) atau paket grup keluarga.',
          features: ['2 Set Busana Pasangan (Pria & Wanita)', 'Aksesoris Pengantin / Pasangan Lengkap', 'Hemat 20% untuk tambahan anggota keluarga', 'Opsi pengiriman kurir khusus box']
        }
      ];

      document.getElementById('packages-grid').innerHTML = pkgs.map(p => {
        const finalPrice = Math.round((p.base * mult) / 5000) * 5000;
        return `
          <div class="${p.featured ? 'bg-ruby text-ivory border-4 border-gold shadow-2xl lg:-translate-y-2' : 'bg-ivory/75 text-charcoal border-2 border-gold/50'} rounded-[2rem] p-6 flex flex-col justify-between transition-all">
            <div>
              <span class="inline-block px-3 py-1 rounded-full ${p.featured ? 'bg-gold text-charcoal' : 'bg-ruby text-champagne'} text-[11px] font-extrabold">${p.badge}</span>
              <h3 class="font-royal text-xl font-bold mt-3">${p.title}</h3>
              <p class="text-xs ${p.featured ? 'text-ivory/80' : 'text-charcoal/70'} mt-1">${p.desc}</p>
              <div class="my-5">
                <span class="font-royal text-2xl sm:text-3xl font-bold ${p.featured ? 'text-champagne' : 'text-ruby'}">Rp ${finalPrice.toLocaleString('id-ID')}</span>
                <span class="text-xs opacity-75"> ${durText}</span>
              </div>
              <ul class="space-y-2 text-xs font-medium">
                ${p.features.map(f => `<li class="flex items-start gap-2"><span class="${p.featured ? 'text-champagne' : 'text-ruby'} font-bold">✦</span><span>${f}</span></li>`).join('')}
              </ul>
            </div>
            <button onclick="selectPackageAndScroll('${p.badge} - Rp ${finalPrice.toLocaleString('id-ID')} (${selectedPricingDays} Hari)')" class="mt-6 w-full py-3 rounded-xl font-bold text-xs uppercase tracking-wider transition-all ${p.featured ? 'bg-gold hover:bg-champagne text-charcoal' : 'bg-ruby hover:bg-crimson text-champagne'}">
              Pilih Paket Ini
            </button>
          </div>
        `;
      }).join('');
    }

    // 5. AVAILABILITY CALENDAR
    const calendarToday = new Date();
    calendarToday.setHours(0, 0, 0, 0);
    let calYear = calendarToday.getFullYear();
    let calMonth = calendarToday.getMonth();
    const monthNamesID = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];

    function changeCalendarMonth(delta) {
      calMonth += delta;
      if (calMonth > 11) { calMonth = 0; calYear++; }
      if (calMonth < 0) { calMonth = 11; calYear--; }
      renderCalendar();
    }

    function renderCalendar() {
      document.getElementById('cal-month-title').textContent = `${monthNamesID[calMonth]} ${calYear}`;
      const firstDay = new Date(calYear, calMonth, 1).getDay();
      const daysInMonth = new Date(calYear, calMonth + 1, 0).getDate();
      const grid = document.getElementById('calendar-days-grid');

      let html = '';
      for (let i = 0; i < firstDay; i++) {
        html += `<div></div>`;
      }

      for (let d = 1; d <= daysInMonth; d++) {
        const dayDate = new Date(calYear, calMonth, d);
        const dayOfWeek = dayDate.getDay();
        const isWeekend = dayOfWeek === 0 || dayOfWeek === 6;
        const isPast = dayDate < calendarToday;
        let status = 'available';
        let btnClass = 'bg-emerald-50 text-emerald-800 border border-emerald-300 hover:bg-emerald-600 hover:text-white';

        if (isPast) {
          status = 'past';
          btnClass = 'bg-stone-100 text-stone-400 border border-stone-200 cursor-not-allowed';
        } else if (d % 11 === 0) {
          status = 'full';
          btnClass = 'bg-rose-100 text-rose-400 border border-rose-200 cursor-not-allowed';
        } else if (isWeekend || d % 5 === 0) {
          status = 'limited';
          btnClass = 'bg-amber-50 text-amber-800 border border-amber-300 hover:bg-amber-500 hover:text-white';
        }

        const dateStr = `${calYear}-${String(calMonth + 1).padStart(2, '0')}-${String(d).padStart(2, '0')}`;
        const disabled = status === 'full' || status === 'past';
        html += `
          <button
            ${disabled ? 'disabled' : `onclick="pickCalendarDate('${dateStr}', '${status}')"`}
            class="py-2 rounded-xl transition-all ${btnClass}"
            title="${status === 'past' ? 'Tanggal sudah lewat' : status === 'full' ? 'Full Booked' : status === 'limited' ? 'Slot Terbatas' : 'Tersedia Banyak'}"
          >
            ${d}
          </button>
        `;
      }
      grid.innerHTML = html;
    }

    function pickCalendarDate(dateStr, status) {
      document.getElementById('rb_event_date').value = dateStr;
      // Set pickup H-1 and return H+1
      const [year, month, day] = dateStr.split('-').map(Number);
      const dt = new Date(year, month - 1, day);
      const prev = new Date(year, month - 1, day - 1);
      const next = new Date(year, month - 1, day + 1);
      const toLocalISO = (date) => `${date.getFullYear()}-${String(date.getMonth() + 1).padStart(2, '0')}-${String(date.getDate()).padStart(2, '0')}`;
      document.getElementById('rb_pickup_date').value = toLocalISO(prev);
      document.getElementById('rb_return_date').value = toLocalISO(next);

      document.getElementById('calendar-selected-info').innerHTML = `
        ✅ Tanggal Acara <strong>${dateStr}</strong> (${status === 'limited' ? 'Slot Terbatas' : 'Tersedia'}) telah diisi ke formulir reservasi!
      `;
      updateRentalSummary();
      goToRentalStep(4);
    }

    // 6. 7-STEP RENTAL BOOKING WIZARD
    let currentRentalStep = 1;
    const rentalStepLabels = [
      'Langkah 1 dari 7: Pilih Kategori Busana',
      'Langkah 2 dari 7: Pilih Kostum Adat',
      'Langkah 3 dari 7: Ukuran, Jumlah & Paket',
      'Langkah 4 dari 7: Tanggal Sewa & Pengiriman',
      'Langkah 5 dari 7: Data Lengkap Penyewa',
      'Langkah 6 dari 7: Ringkasan Pesanan & Biaya',
      'Langkah 7 dari 7: Kirim Pesanan via WhatsApp'
    ];

    function goToRentalStep(step) {
      if (step < 1 || step > 7) return;
      currentRentalStep = step;

      document.querySelectorAll('.r-step').forEach((el, idx) => {
        el.classList.toggle('hidden', idx + 1 !== currentRentalStep);
      });

      document.getElementById('wiz-step-title').textContent = rentalStepLabels[currentRentalStep - 1];
      const pct = Math.round((currentRentalStep / 7) * 100);
      document.getElementById('wiz-step-pct').textContent = `${pct}%`;
      document.getElementById('wiz-progress-bar').style.width = `${(currentRentalStep / 7) * 100}%`;

      document.querySelectorAll('.wiz-dot').forEach((dot, idx) => {
        dot.className = idx + 1 <= currentRentalStep
          ? 'wiz-dot h-1.5 rounded-full bg-champagne'
          : 'wiz-dot h-1.5 rounded-full bg-white/25';
      });

      document.getElementById('wiz-prev').disabled = currentRentalStep === 1;
      const nextBtn = document.getElementById('wiz-next');
      if (currentRentalStep === 7) {
        nextBtn.classList.add('hidden');
      } else {
        nextBtn.classList.remove('hidden');
        nextBtn.textContent = currentRentalStep === 6 ? 'Lanjut ke Kirim WhatsApp →' : 'Lanjut Langkah Berikutnya →';
      }

      updateRentalSummary();
    }

    function validateRentalStep(step) {
      if (step === 4) {
        const pickup = document.getElementById('rb_pickup_date').value;
        const eventDate = document.getElementById('rb_event_date').value;
        const returnDate = document.getElementById('rb_return_date').value;
        if (!pickup || !eventDate || !returnDate) {
          alert('Lengkapi tanggal pengambilan, pemakaian acara, dan pengembalian terlebih dahulu.');
          return false;
        }
        const today = new Date(); today.setHours(0, 0, 0, 0);
        const pickupDate = new Date(`${pickup}T00:00:00`);
        const eventValue = new Date(`${eventDate}T00:00:00`);
        const returnValue = new Date(`${returnDate}T00:00:00`);
        if (pickupDate < today || eventValue < today || returnValue < eventValue || pickupDate > eventValue) {
          alert('Periksa kembali tanggal: pengambilan tidak boleh setelah acara, acara tidak boleh di masa lalu, dan pengembalian harus pada/setelah tanggal acara.');
          return false;
        }
      }
      if (step === 5) {
        const name = document.getElementById('rb_name').value.trim();
        const phone = document.getElementById('rb_wa').value.replace(/[^0-9]/g, '');
        const delivery = document.getElementById('rb_delivery');
        const deliveryFee = Number(delivery.options[delivery.selectedIndex]?.dataset.fee || 0);
        const address = document.getElementById('rb_address').value.trim();
        if (!name) { alert('Nama lengkap penyewa wajib diisi.'); document.getElementById('rb_name').focus(); return false; }
        if (phone.length < 9 || phone.length > 15) { alert('Masukkan nomor WhatsApp aktif dengan 9–15 digit.'); document.getElementById('rb_wa').focus(); return false; }
        if (deliveryFee > 0 && !address) { alert('Alamat lengkap wajib diisi untuk metode pengiriman.'); document.getElementById('rb_address').focus(); return false; }
      }
      return true;
    }

    function changeRentalStep(delta) {
      if (delta > 0 && !validateRentalStep(currentRentalStep)) return;
      goToRentalStep(currentRentalStep + delta);
    }

    function syncCostumeDropdown() {
      const reg = document.getElementById('rb_region').value;
      const list = reg === 'All' ? costumesData : costumesData.filter(c => c.region === reg);
      const sel = document.getElementById('rb_costume');
      const previousValue = sel.value;
      sel.innerHTML = list.map(c => `<option value="${c.id}">${c.name} (${c.origin}) — Rp ${c.price.toLocaleString('id-ID')}/hari</option>`).join('');
      if (list.some(c => c.id === previousValue)) sel.value = previousValue;
      updateRentalSummary();
    }

    function selectCostumeForBooking(costumeId) {
      switchPage('all');
      document.getElementById('rb_region').value = 'All';
      syncCostumeDropdown();
      document.getElementById('rb_costume').value = costumeId;
      goToRentalStep(3);
      document.getElementById('reservasi-section').scrollIntoView({ behavior: 'smooth' });
    }

    function selectPackageAndScroll(pkgName) {
      switchPage('all');
      const sel = document.getElementById('rb_package');
      const cleanName = pkgName.toLowerCase().replace(/[^a-z0-9]+/g, ' ').trim();
      const opt = Array.from(sel.options).find(o => {
        const value = o.value.toLowerCase();
        if (cleanName.includes('couple') || cleanName.includes('family')) return value.includes('couple');
        if (cleanName.includes('premium')) return value.includes('premium maestro');
        if (cleanName.includes('complete')) return value.includes('complete royal');
        if (cleanName.includes('basic')) return value.includes('basic heritage');
        return value.includes(cleanName.split(' ')[0]);
      });
      if (opt) sel.value = opt.value;
      document.getElementById('rb_duration').value = String(selectedPricingDays);
      updateRentalSummary();
      goToRentalStep(3);
      document.getElementById('reservasi-section').scrollIntoView({ behavior: 'smooth' });
    }

    function getRentalOrderData() {
      const region = document.getElementById('rb_region').value;
      const eventType = document.getElementById('rb_event').value;
      const costumeId = document.getElementById('rb_costume').value;
      const costume = costumesData.find(c => c.id === costumeId) || costumesData[0];

      // Update Costume Preview in Step 2
      const prevEl = document.getElementById('rb_costume_preview');
      if (prevEl && costume) {
        prevEl.innerHTML = `
          <img src="${costume.images.front}" alt="${costume.name}" class="w-20 h-24 rounded-xl object-cover border border-gold flex-shrink-0" />
          <div class="text-xs space-y-1">
            <span class="px-2 py-0.5 rounded bg-ruby text-champagne font-bold">${costume.region}</span>
            <h4 class="font-serif font-bold text-base text-charcoal">${costume.name}</h4>
            <p class="text-charcoal/75"><strong>Termasuk:</strong> ${costume.accessories}</p>
            <p class="font-bold text-ruby">Tarif Dasar: Rp ${costume.price.toLocaleString('id-ID')} / hari</p>
          </div>
        `;
      }

      const size = document.getElementById('rb_size').value;
      const qty = Math.max(1, parseInt(document.getElementById('rb_qty').value) || 1);
      const pkg = document.getElementById('rb_package').value;

      let pkgUpgrade = 0;
      if (pkg.includes('Complete Royal')) pkgUpgrade = 150000;
      if (pkg.includes('Premium Maestro')) pkgUpgrade = 350000;
      if (pkg.includes('Couple')) pkgUpgrade = 450000;

      const addons = Array.from(document.querySelectorAll('.rb-addon:checked'));
      const addonNames = addons.map(a => a.value);
      const addonTotal = addons.reduce((sum, a) => sum + parseInt(a.dataset.price || 0), 0);

      const pickupDate = document.getElementById('rb_pickup_date').value || '(Belum dipilih)';
      const eventDate = document.getElementById('rb_event_date').value || '(Belum dipilih)';
      const returnDate = document.getElementById('rb_return_date').value || '(Belum dipilih)';
      const durDays = parseInt(document.getElementById('rb_duration').value) || 1;
      const durMult = durDays === 1 ? 1 : durDays === 2 ? 1.7 : 2.25;

      const delSelect = document.getElementById('rb_delivery');
      const deliveryText = delSelect.value;
      const deliveryFee = parseInt(delSelect.options[delSelect.selectedIndex]?.dataset.fee || 0);

      const name = document.getElementById('rb_name').value.trim() || '(Belum diisi)';
      const wa = document.getElementById('rb_wa').value.trim() || '(Belum diisi)';
      const address = document.getElementById('rb_address').value.trim() || '(Pickup Butik)';
      const notes = document.getElementById('rb_notes').value.trim() || '-';

      const rentalSubtotal = Math.round(((costume.price + pkgUpgrade) * durMult * qty) / 5000) * 5000 + addonTotal;
      const deposit = 250000 * qty;
      const grandTotal = rentalSubtotal + deliveryFee + deposit;

      return {
        region, eventType, costume, size, qty, pkg, addonNames,
        pickupDate, eventDate, returnDate, durDays, deliveryText, deliveryFee,
        name, wa, address, notes, rentalSubtotal, deposit, grandTotal
      };
    }

    function updateRentalSummary() {
      const d = getRentalOrderData();
      const box = document.getElementById('rental-summary-box');
      if (box) {
        box.innerHTML = `
          <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
            <div><span class="text-charcoal/60 block">Busana Pilihan</span><strong>${d.costume.name} (${d.costume.region})</strong></div>
            <div><span class="text-charcoal/60 block">Acara & Ukuran</span><strong>${d.eventType} • ${d.size} (${d.qty} Set)</strong></div>
            <div><span class="text-charcoal/60 block">Paket & Add-on</span><strong>${d.pkg}</strong><span class="block text-xs text-charcoal/70">${d.addonNames.length ? d.addonNames.join(', ') : 'Tanpa add-on tambahan'}</span></div>
            <div><span class="text-charcoal/60 block">Jadwal Sewa (${d.durDays} Hari)</span><strong>Ambil: ${d.pickupDate} • Acara: ${d.eventDate} • Kembali: ${d.returnDate}</strong></div>
            <div><span class="text-charcoal/60 block">Data Penyewa</span><strong>${d.name} (${d.wa})</strong><span class="block text-xs text-charcoal/70">${d.address}</span></div>
            <div><span class="text-charcoal/60 block">Pengiriman</span><strong>${d.deliveryText}</strong></div>
          </div>
          <div class="pt-3 border-t border-gold/40 space-y-1 text-xs">
            <div class="flex justify-between"><span>Biaya Sewa Busana & Paket (${d.durDays} Hari):</span><strong>Rp ${d.rentalSubtotal.toLocaleString('id-ID')}</strong></div>
            <div class="flex justify-between"><span>Biaya Pengiriman / Kurir:</span><strong>Rp ${d.deliveryFee.toLocaleString('id-ID')}</strong></div>
            <div class="flex justify-between text-emerald-800"><span>Deposit Jaminan (Dikembalikan 100%):</span><strong>Rp ${d.deposit.toLocaleString('id-ID')}</strong></div>
            <div class="flex justify-between text-base font-royal font-bold text-ruby pt-2 border-t border-gold/30">
              <span>Total Estimasi Pembayaran:</span>
              <span>Rp ${d.grandTotal.toLocaleString('id-ID')}</span>
            </div>
          </div>
        `;
      }

      const waMsg = buildRentalWAMessage(d);
      const preview = document.getElementById('rental-wa-preview');
      if (preview) preview.textContent = waMsg;
    }

    function buildRentalWAMessage(d) {
      return `Salam Budaya Admin *Kencana Wastra Atelier*! 👑✨
Saya ingin mengajukan reservasi penyewaan busana adat dengan detail berikut:

*1. Pilihan Busana & Paket:*
• Daerah & Acara: ${d.region} — ${d.eventType}
• Busana: ${d.costume.name}
• Ukuran & Jumlah: ${d.size} (${d.qty} Set)
• Paket: ${d.pkg}
• Aksesoris Ekstra: ${d.addonNames.length ? d.addonNames.join(', ') : 'Tidak ada'}

*2. Jadwal & Pengiriman:*
• Durasi Sewa: ${d.durDays} Hari
• Tgl Ambil: ${d.pickupDate}
• Tgl Pemakaian: ${d.eventDate}
• Tgl Pengembalian: ${d.returnDate}
• Metode Ambil/Kirim: ${d.deliveryText}

*3. Data Penyewa:*
• Nama: ${d.name}
• No. WhatsApp: ${d.wa}
• Alamat: ${d.address}
• Catatan Ukuran/Tema: ${d.notes}

*4. Rincian Biaya:*
• Biaya Sewa: Rp ${d.rentalSubtotal.toLocaleString('id-ID')}
• Ongkir: Rp ${d.deliveryFee.toLocaleString('id-ID')}
• Deposit Jaminan (Refundable): Rp ${d.deposit.toLocaleString('id-ID')}
• *Total Estimasi: Rp ${d.grandTotal.toLocaleString('id-ID')}*

Mohon konfirmasi ketersediaan busana pada tanggal tersebut ya Admin. Terima kasih! 🙏`;
    }

    function sendRentalToWhatsApp() {
      if (!validateRentalStep(4) || !validateRentalStep(5)) return;
      const d = getRentalOrderData();
      const text = encodeURIComponent(buildRentalWAMessage(d));
      window.open(`https://wa.me/${KENCANA_WHATSAPP_NUMBER}?text=${text}`, '_blank', 'noopener,noreferrer');
    }

    async function copyRentalWA() {
      const preview = document.getElementById('rental-wa-preview');
      const txt = preview?.textContent || '';
      if (!txt) return;
      let copied = false;
      try {
        if (navigator.clipboard?.writeText) {
          await navigator.clipboard.writeText(txt);
          copied = true;
        }
      } catch (_) { /* Use the legacy fallback below. */ }
      if (!copied) {
        const tmp = document.createElement('textarea');
        tmp.value = txt;
        tmp.style.position = 'fixed';
        tmp.style.opacity = '0';
        document.body.appendChild(tmp);
        tmp.select();
        copied = document.execCommand('copy');
        document.body.removeChild(tmp);
      }
      const toast = document.getElementById('rental-copy-toast');
      if (toast) {
        toast.textContent = copied ? '✓ Ringkasan pesanan berhasil disalin!' : 'Tidak dapat menyalin otomatis. Silakan salin teks secara manual.';
        toast.classList.remove('hidden');
        setTimeout(() => toast.classList.add('hidden'), 3000);
      }
    }

    // 7. FAQ ACCORDION
    const faqItems = [
      {
        q: 'Apakah ukuran busana adat bisa disesuaikan jika terlalu panjang atau longgar?',
        a: 'Bisa. Tim penjahit atelier kami menyediakan layanan penyesuaian sementara (custom fitting alteration) seperti mengatur panjang kain lilit, keliman lengan kebaya, dan ukuran pinggang tanpa memotong atau merusak kain wastra asli.'
      },
      {
        q: 'Bagaimana kebersihan kostum sebelum diterima penyewa?',
        a: 'Seluruh koleksi busana dan aksesoris Kencana Wastra melewati proses sanitasi uap (steam-clean) dan perawatan dry-clean khusus benang emas/sutra setiap selesai digunakan, lalu dikemas rapi dalam garment bag.'
      },
      {
        q: 'Kapan uang deposit jaminan dikembalikan?',
        a: 'Uang deposit jaminan (Rp 250.000/set) akan ditransfer kembali 100% penuh maksimal 1x24 jam setelah busana dan aksesoris dikembalikan dan diperiksa kelengkapannya oleh tim kami.'
      },
      {
        q: 'Apakah melayani pengiriman ke luar kota untuk acara pernikahan atau festival?',
        a: 'Ya, kami melayani pengiriman ke seluruh Indonesia menggunakan hard garment box berlapis pelindung serta ekspedisi berasuransi. Anda juga dapat mengambil langsung di butik kami.'
      }
    ];

    function renderFAQ() {
      document.getElementById('faq-list').innerHTML = faqItems.map((item, idx) => `
        <div class="bg-ivory/70 rounded-2xl border border-gold/50 overflow-hidden">
          <button onclick="toggleFAQ(${idx})" class="w-full px-5 py-4 text-left flex items-center justify-between gap-4 font-bold text-xs sm:text-sm text-charcoal hover:text-ruby">
            <span>${item.q}</span>
            <span id="faq-plus-${idx}" class="text-ruby font-extrabold text-lg">+</span>
          </button>
          <div id="faq-body-${idx}" class="hidden px-5 pb-4 text-xs text-charcoal/80 leading-relaxed border-t border-gold/25 pt-3">
            ${item.a}
          </div>
        </div>
      `).join('');
    }

    function toggleFAQ(idx) {
      const b = document.getElementById(`faq-body-${idx}`);
      const p = document.getElementById(`faq-plus-${idx}`);
      const hidden = b.classList.contains('hidden');
      b.classList.toggle('hidden');
      p.textContent = hidden ? '−' : '+';
    }

    // 8. MODALS (SIZE GUIDE & STYLING CONSULTATION)
    function openSizeModal() {
      const m = document.getElementById('size-modal');
      m.classList.remove('hidden'); m.classList.add('flex');
    }
    function closeSizeModal() {
      const m = document.getElementById('size-modal');
      m.classList.add('hidden'); m.classList.remove('flex');
    }
    function recommendSize() {
      const chest = parseInt(document.getElementById('calc-chest').value) || 0;
      const out = document.getElementById('size-rec-output');
      if (!chest) {
        out.textContent = 'Masukkan angka lingkar dada (cm) terlebih dahulu.';
        out.classList.remove('hidden');
        return;
      }
      let rec = 'S (LD 86–88 cm)';
      if (chest > 112) rec = 'XXL – XXXL (LD 114–124 cm) atau Custom Fitting';
      else if (chest > 102) rec = 'XL (LD 106–108 cm)';
      else if (chest > 95) rec = 'L (LD 98–100 cm)';
      else if (chest > 89) rec = 'M (LD 92–94 cm)';

      out.textContent = `✨ Rekomendasi Atelier: Ukuran ${rec}`;
      out.classList.remove('hidden');
    }

    function openConsultationModal() {
      const m = document.getElementById('consult-modal');
      m.classList.remove('hidden'); m.classList.add('flex');
    }
    function closeConsultationModal() {
      const m = document.getElementById('consult-modal');
      m.classList.add('hidden'); m.classList.remove('flex');
    }
    function sendConsultationWA() {
      const n = document.getElementById('cons-name').value || 'Calon Penyewa';
      const t = document.getElementById('cons-theme').value || 'Acara Adat';
      const d = document.getElementById('cons-date').value || '-';
      const msg = encodeURIComponent(`Halo Stylist Kencana Wastra! Saya ${n}, ingin menjadwalkan Styling Consultation & Fitting untuk acara "${t}" pada tanggal ${d}.`);
      window.open(`https://wa.me/${KENCANA_WHATSAPP_NUMBER}?text=${msg}`, '_blank', 'noopener,noreferrer');
    }

    // 9. MULTIPAGE VIEW SWITCHER & BILINGUAL (ID / EN)
    function switchPage(pageKey) {
      document.querySelectorAll('.nav-pill').forEach(btn => {
        btn.className = btn.dataset.nav === pageKey
          ? 'nav-pill px-4 py-2 rounded-full text-xs font-bold tracking-wide transition-all bg-gold text-charcoal shadow'
          : 'nav-pill px-4 py-2 rounded-full text-xs font-semibold tracking-wide text-ivory/85 hover:text-champagne transition-all';
      });

      document.querySelectorAll('[data-section]').forEach(sec => {
        if (pageKey === 'all') {
          sec.classList.remove('hidden');
        } else {
          sec.classList.toggle('hidden', sec.getAttribute('data-section') !== pageKey);
        }
      });

      // Make every reveal element in the newly selected page visible immediately.
      // This avoids empty-looking pages when sections were hidden before the observer ran.
      document.querySelectorAll('.reveal').forEach(el => {
        const owner = el.closest('[data-section]');
        const shouldShow = pageKey === 'all' || (owner && owner.getAttribute('data-section') === pageKey);
        if (shouldShow) el.classList.add('visible');
      });
      window.scrollTo({ top: 0, behavior: 'smooth' });
    }

    function toggleMobileMenu() {
      document.getElementById('mobile-menu').classList.toggle('hidden');
    }

    const i18nDict = {
      id: {
        nav_all: 'Beranda Lengkap',
        nav_col: 'Koleksi Busana',
        nav_pkg: 'Aksesoris & Paket',
        nav_res: 'Ketersediaan & Reservasi',
        nav_phi: 'Filosofi & Panduan',
        btn_size: 'Panduan Ukuran',
        btn_rent: 'Rent Now',
        hero_badge: 'Kurasi Wastra & Busana Adat Keraton Nusantara',
        hero_title_1: 'Keagungan',
        hero_title_2: 'Warisan Nusantara',
        hero_title_3: 'Dalam Setiap Helai Tenun & Sulam Emas',
        hero_desc: 'Penyewaan busana adat autentik dari 34 provinsi Indonesia—mulai dari Kebaya Beludru Jawa, Payas Agung Bali, Baju Kurung Songket Minang, hingga busana pasangan & keluarga untuk pernikahan, wisuda, dan perhelatan budaya.',
        cta_explore: 'Explore Collection',
        cta_rent: 'Rent Now'
      },
      en: {
        nav_all: 'All Pages',
        nav_col: 'Costume Collection',
        nav_pkg: 'Accessories & Packages',
        nav_res: 'Availability & Booking',
        nav_phi: 'Heritage & Policy',
        btn_size: 'Size Guide',
        btn_rent: 'Rent Now',
        hero_badge: 'Curated Royal Indonesian Heritage Attire',
        hero_title_1: 'Majesty of',
        hero_title_2: 'Nusantara Heritage',
        hero_title_3: 'In Every Handwoven Songket & Gold Embroidery',
        hero_desc: 'Authentic traditional costume rentals across Indonesia—from Javanese Royal Velvet Kebaya, Balinese Payas Agung, Minangkabau Songket, to couple & family ensembles for weddings, graduations, and cultural galas.',
        cta_explore: 'Explore Collection',
        cta_rent: 'Rent Now'
      }
    };

    function setLanguage(lang) {
      document.getElementById('lang-id').className = lang === 'id' ? 'px-2.5 py-1 rounded-full bg-gold text-charcoal transition-all' : 'px-2.5 py-1 rounded-full text-ivory/80 hover:text-white transition-all';
      document.getElementById('lang-en').className = lang === 'en' ? 'px-2.5 py-1 rounded-full bg-gold text-charcoal transition-all' : 'px-2.5 py-1 rounded-full text-ivory/80 hover:text-white transition-all';

      const dict = i18nDict[lang];
      document.querySelectorAll('[data-i18n]').forEach(el => {
        const key = el.getAttribute('data-i18n');
        if (dict[key]) el.textContent = dict[key];
      });
    }

    // 10. UNIQUE FLOATING AI CHATBOT: "KANJENG WASTRA AI"
    function toggleWastraAI() {
      document.getElementById('ai-wastra-window').classList.toggle('hidden');
    }

    function handleWastraAISubmit(e) {
      e.preventDefault();
      const inp = document.getElementById('wastra-ai-input');
      const txt = inp.value.trim();
      if (!txt) return;
      inp.value = '';
      askWastraAI(txt);
    }

    function askWastraAI(question) {
      const feed = document.getElementById('wastra-ai-feed');
      const uBubble = document.createElement('div');
      uBubble.className = 'bg-ruby text-ivory p-3 rounded-2xl rounded-tr-none ml-auto max-w-[82%] font-medium shadow-sm';
      uBubble.textContent = question;
      feed.appendChild(uBubble);

      const q = question.toLowerCase();
      let ans = 'Silakan gunakan <strong>Formulir Reservasi 7 Langkah</strong> atau klik menu <em>Koleksi Busana</em> untuk melihat detail lengkap kostum daerah pilihan Anda! 👑';

      if (q.includes('nikah') || q.includes('pengantin') || q.includes('jawa') || q.includes('sunda')) {
        ans = '💍 <strong>Rekomendasi Pernikahan Adat:</strong><br>• <em>Jawa & Sunda:</em> Kebaya Beludru Keraton (Rp 550rb/hari) & Siger Priangan (Rp 520rb/hari).<br>• <em>Sumatra & Bali:</em> Ulee Balang Aceh, Suntiang Minang, Aesan Gede Palembang & Payas Agung Bali.<br>• Tersedia <strong>Paket Sarimbit Pasangan</strong> lengkap!';
      } else if (q.includes('jepang') || q.includes('korea') || q.includes('belanda') || q.includes('kimono') || q.includes('hanbok') || q.includes('volendam') || q.includes('mancanegara')) {
        ans = '🌏 <strong>Koleksi Busana Mancanegara Viral:</strong><br>• 🇯🇵 <em>Jepang:</em> Furisode Kimono Kyoto & Obi Sutra (Rp 580rb/hari)<br>• 🇰🇷 <em>Korea Selatan:</em> Royal Joseon Hanbok & Mahkota Jokduri (Rp 560rb/hari)<br>• 🇳🇱 <em>Belanda:</em> Volendam Klederdracht Renda & Klompen (Rp 520rb/hari)<br>• Juga tersedia Imperial Hanfu Tiongkok, Lehenga India & Ottoman Kaftan Turki!';
      } else if (q.includes('sabang') || q.includes('merauke') || q.includes('aceh') || q.includes('papua') || q.includes('maluku') || q.includes('nusantara')) {
        ans = '🇮🇩 <strong>Koleksi Lengkap Sabang – Merauke:</strong><br>Kami memiliki busana adat seluruh wilayah Indonesia: <em>Ulee Balang Aceh, Ulos Batak, Minang, Melayu Riau, Palembang, Lampung, Betawi, Jawa, Sunda, Bali, Sasak NTB, Tenun Sumba NTT, Dayak & Kutai Kalimantan, Bugis & Toraja Sulawesi, Baju Cele Maluku, hingga Cenderawasih Papua</em>!';
      } else if (q.includes('wisuda') || q.includes('anggun')) {
        ans = '🎓 <strong>Rekomendasi Wisuda & Kartinian:</strong><br>• <em>Baju Kurung Songket Minang</em>, <em>Kebaya Encim Betawi</em>, <em>Baju Cele Ambon</em>, atau <em>Baju Bodo Bugis</em>.<br>Tersedia paket sewa <strong>2–3 Hari</strong> dengan diskon hingga 25%!';
      } else if (q.includes('harga') || q.includes('deposit') || q.includes('biaya')) {
        ans = '💰 <strong>Tarif Sewa & Deposit:</strong><br>• Mulai dari <strong>Rp 450.000/hari</strong> (Basic) hingga <strong>Rp 680.000/hari</strong> (Complete Royal dengan aksesoris penuh).<br>• <strong>Deposit Jaminan:</strong> Rp 250.000/set (dikembalikan 100% setelah kostum kembali).';
      } else if (q.includes('keluarga') || q.includes('xxl') || q.includes('ukuran') || q.includes('family')) {
        ans = '👨‍👩‍👧‍👦 <strong>Paket Keluarga & Ukuran Lengkap:</strong><br>Tersedia ukuran mulai anak-anak hingga <strong>XXXL (LD 124 cm)</strong>. Penyewaan minimal 4 set keluarga mendapatkan <strong>diskon 20%</strong> + layanan <em>Custom Fitting</em> gratis!';
      }

      setTimeout(() => {
        const bBubble = document.createElement('div');
        bBubble.className = 'bg-white p-3.5 rounded-2xl rounded-tl-none border border-gold/50 shadow-sm text-charcoal max-w-[88%] leading-relaxed';
        bBubble.innerHTML = ans;
        feed.appendChild(bBubble);
        feed.scrollTop = feed.scrollHeight;
      }, 350);

      feed.scrollTop = feed.scrollHeight;
    }

    // 11. INITIALIZE JASMINE PETALS, GOLD DUST & SCROLL REVEAL
    function initRoyalAnimations() {
      const container = document.getElementById('royal-particles');
      if (container) {
        for (let i = 0; i < 18; i++) {
          const p = document.createElement('span');
          const isJasmine = i % 2 === 0;
          const left = Math.floor(Math.random() * 98);
          const delay = (Math.random() * 7).toFixed(1);
          const dur = (Math.random() * 6 + 7).toFixed(1);
          p.style.cssText = `
            position: absolute;
            top: -20px;
            left: ${left}%;
            width: ${isJasmine ? '11px' : '6px'};
            height: ${isJasmine ? '16px' : '6px'};
            border-radius: ${isJasmine ? '60% 40% 60% 40%' : '9999px'};
            background: ${isJasmine ? 'rgba(248, 240, 223, 0.78)' : 'rgba(229, 199, 123, 0.9)'};
            box-shadow: ${isJasmine ? 'none' : '0 0 8px rgba(229, 199, 123, 0.8)'};
            animation: petalDrift ${dur}s linear ${delay}s infinite;
          `;
          container.appendChild(p);
        }
      }

      const revealItems = Array.from(document.querySelectorAll('.reveal'));
      if (!('IntersectionObserver' in window)) {
        revealItems.forEach(el => el.classList.add('visible'));
        return;
      }

      const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
          if (entry.isIntersecting) {
            entry.target.classList.add('visible');
            observer.unobserve(entry.target);
          }
        });
      }, { threshold: 0.05, rootMargin: '0px 0px 80px 0px' });

      revealItems.forEach(el => observer.observe(el));
      document.body.classList.add('kencana-reveal-ready');
    }

    // ON LOAD — works whether this external script loads before or after DOMContentLoaded.
    const KENCANA_WHATSAPP_NUMBER = '6281234567890'; // Ganti dengan nomor WhatsApp admin resmi.

    function initKencanaWastra() {
      if (document.documentElement.dataset.kencanaInitialized === 'true') return;
      document.documentElement.dataset.kencanaInitialized = 'true';

      // Keep independent modules initializing even if one optional component has an issue.
      const runModule = (label, callback) => {
        try { callback(); }
        catch (error) { console.error(`[Kencana Wastra] ${label} gagal diinisialisasi:`, error); }
      };

      runModule('katalog kostum', renderCostumeGrid);
      runModule('cerita heritage', () => selectHeritageStory('jawa'));
      runModule('paket sewa', renderPackages);
      runModule('kalender', renderCalendar);
      runModule('dropdown kostum', syncCostumeDropdown);
      runModule('FAQ', renderFAQ);
      runModule('animasi halaman', initRoyalAnimations);
      runModule('ringkasan reservasi', updateRentalSummary);

      const todayISO = `${calendarToday.getFullYear()}-${String(calendarToday.getMonth() + 1).padStart(2, '0')}-${String(calendarToday.getDate()).padStart(2, '0')}`;
      ['rb_pickup_date', 'rb_event_date', 'rb_return_date', 'cons-date'].forEach(id => {
        const input = document.getElementById(id);
        if (input) input.min = todayISO;
      });
    }

    // Inline handlers in the original reference call these functions directly.
    Object.assign(window, {
      setRealmFilter, setRegionFilter, filterCollectionFromHero, renderCostumeGrid,
      openCostumeModal, switchModalAngle, closeCostumeModal, selectHeritageStory,
      setPricingDuration, renderPackages, changeCalendarMonth, renderCalendar, pickCalendarDate,
      goToRentalStep, changeRentalStep, syncCostumeDropdown, selectCostumeForBooking,
      selectPackageAndScroll, updateRentalSummary, sendRentalToWhatsApp, copyRentalWA,
      toggleFAQ, openSizeModal, closeSizeModal, recommendSize, openConsultationModal,
      closeConsultationModal, sendConsultationWA, switchPage, toggleMobileMenu, setLanguage,
      toggleWastraAI, handleWastraAISubmit, askWastraAI
    });

    if (document.readyState === 'loading') {
      document.addEventListener('DOMContentLoaded', initKencanaWastra, { once: true });
    } else {
      initKencanaWastra();
    }
