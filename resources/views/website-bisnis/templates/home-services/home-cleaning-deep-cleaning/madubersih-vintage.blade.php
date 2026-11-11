<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>MaduBersih - Layanan Bersih & Sanitasi Rumah Tradisi Tepercaya</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@500;600;700;800&family=Fraunces:ital,opsz,wght@0,9..144,400;0,9..144,600;0,9..144,700;1,9..144,400&family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-warmbee-50 text-warmbee-900 font-madubersih-sans antialiased selection:bg-warmbee-500 selection:text-white relative">

  <!-- Classic Retro Paper Texture overlay -->
  <div class="fixed inset-0 pointer-events-none z-0 opacity-20 bg-[radial-gradient(#9d6814_1px,transparent_1px)] [background-size:24px_24px]"></div>

  <!-- Vintage Header / Navbar -->
  <header class="sticky top-0 z-40 bg-warmbee-50/95 backdrop-blur-md border-b-2 border-warmbee-300">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-20 flex items-center justify-between">
      <a href="#beranda" class="flex items-center gap-3 group">
        <div class="w-10 h-10 rounded-full madubersih-vintage-seal border border-warmbee-700 flex items-center justify-center text-warmbee-900 shadow-md group-hover:rotate-12 transition-transform duration-300">
          <span class="text-xl">🐝</span>
        </div>
        <div>
          <span class="font-madubersih-display font-bold text-xl tracking-wider text-warmbee-900 flex items-center gap-1">
            MADU<span class="text-warmbee-600 font-madubersih-serif italic">BERSIH</span>
          </span>
          <span class="text-[9px] uppercase tracking-widest text-warmbee-700 block font-semibold">Tradisi Keasrian Rumah Sejak 2012</span>
        </div>
      </a>

      <!-- Desktop Nav Menu -->
      <nav class="hidden md:flex items-center gap-8 text-sm font-semibold tracking-wide text-warmbee-800">
        <a href="#beranda" class="hover:text-warmbee-600 transition-colors">Beranda</a>
        <a href="#layanan" class="hover:text-warmbee-600 transition-colors">Layanan & Paket</a>
        <a href="#keunggulan" class="hover:text-warmbee-600 transition-colors">Nilai Tradisi</a>
        <a href="#faq" class="hover:text-warmbee-600 transition-colors">FAQ</a>
        <a href="#kontak" class="hover:text-warmbee-600 transition-colors">Kontak</a>
      </nav>

      <!-- Action Button -->
      <div class="flex items-center gap-3">
        <a href="#layanan" class="hidden sm:inline-flex items-center gap-2 bg-warmbee-600 hover:bg-warmbee-700 text-white text-sm font-madubersih-serif font-semibold px-5 py-2.5 rounded-lg border border-warmbee-800 shadow-sm transition-all duration-300">
          <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
          Reservasi Jadwal
        </a>
      </div>
    </div>
  </header>

  <!-- Hero Section -->
  <section id="beranda" class="relative z-10 pt-16 pb-20 lg:pt-24 lg:pb-28 border-b-2 border-warmbee-200 bg-gradient-to-b from-warmbee-100/60 to-warmbee-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
        
        <!-- Left Content -->
        <div class="lg:col-span-7 space-y-6 text-center lg:text-left">
          <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-warmbee-200/80 border border-warmbee-400 text-warmbee-800 text-xs font-madubersih-serif font-bold tracking-wide">
            <span>✨</span>
            Sentuhan Kehangatan Alami & Kebersihan Rumah Idaman
          </div>

          <h1 class="text-4xl sm:text-5xl lg:text-6xl font-madubersih-serif font-bold text-warmbee-wood tracking-tight leading-tight">
            Kenyamanan Hakiki, <br>
            <span class="italic text-warmbee-600 underline decoration-warmbee-400 decoration-wavy decoration-1">
              Rumah Bersih Hangat Madu.
            </span>
          </h1>

          <p class="text-base sm:text-lg text-warmbee-800 max-w-2xl mx-auto lg:mx-0 leading-relaxed">
            Perpaduan ketelitian kerja tradisional, teknologi ramah serat furnitur, dan ramuan pembersih lembut non-kimia tajam yang mengembalikan kesegaran rumah layaknya peristirahatan yang damai.
          </p>

          <div class="flex flex-col sm:flex-row items-center justify-center lg:justify-start gap-4 pt-2">
            <a href="#layanan" class="w-full sm:w-auto inline-flex items-center justify-center gap-2 bg-warmbee-600 hover:bg-warmbee-700 text-white font-madubersih-serif font-semibold px-8 py-3.5 rounded-xl border border-warmbee-800 shadow-md transition-all">
              <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
              Pesan Jasa MaduBersih
            </a>
            <button onclick="document.getElementById('ai-modal').classList.remove('hidden')" class="w-full sm:w-auto inline-flex items-center justify-center gap-2 bg-warmbee-100 hover:bg-warmbee-200 text-warmbee-800 border-2 border-warmbee-400 font-madubersih-serif font-bold px-6 py-3.5 rounded-xl transition-all">
              <span>🐝</span>
              Kalkulator Estimasi Biaya
            </button>
          </div>

          <!-- Vintage Seal Badges -->
          <div class="grid grid-cols-3 gap-6 pt-6 border-t border-warmbee-300 text-center lg:text-left">
            <div>
              <div class="text-2xl sm:text-3xl font-madubersih-serif font-bold text-warmbee-wood">10.000+</div>
              <div class="text-xs text-warmbee-700 font-medium mt-1">Keluarga Bahagia</div>
            </div>
            <div>
              <div class="text-2xl sm:text-3xl font-madubersih-serif font-bold text-warmbee-600">100%</div>
              <div class="text-xs text-warmbee-700 font-medium mt-1">Bahan Non-Korosif</div>
            </div>
            <div>
              <div class="text-2xl sm:text-3xl font-madubersih-serif font-bold text-warmbee-wood">13 Tahun</div>
              <div class="text-xs text-warmbee-700 font-medium mt-1">Dedikasi Kebersihan</div>
            </div>
          </div>
        </div>

        <!-- Right Vintage Certificate Card -->
        <div class="lg:col-span-5 relative">
          <div class="madubersih-vintage-card p-6 sm:p-8 rounded-2xl relative z-10 space-y-6">
            <div class="text-center pb-4 border-b-2 border-dashed border-warmbee-300">
              <div class="w-16 h-16 mx-auto mb-3 rounded-full madubersih-vintage-seal border-2 border-warmbee-700 flex items-center justify-center text-3xl shadow-inner">
                🐝
              </div>
              <span class="text-xs font-madubersih-serif uppercase tracking-widest text-warmbee-700 font-bold block">Piagam Garansi Mutu</span>
              <h3 class="font-madubersih-serif font-bold text-xl text-warmbee-wood mt-1">Pembersihan Sempurna Penuh Jiwa</h3>
            </div>

            <p class="text-xs text-warmbee-800 text-center leading-relaxed italic">
              "Kami menjamin setiap inci lantai marmer, perabot kayu pusaka, serta sofa Anda dirawat dengan kelembutan tangan terampil dan etos kerja luhur."
            </p>

            <div class="grid grid-cols-2 gap-3 text-xs">
              <div class="p-3.5 rounded-xl bg-warmbee-100 border border-warmbee-300 text-center">
                <span class="text-warmbee-700 block text-[10px] uppercase font-bold">Waktu Layanan</span>
                <span class="font-madubersih-serif font-bold text-warmbee-wood text-sm">Hingga Tuntas Kilau</span>
              </div>
              <div class="p-3.5 rounded-xl bg-warmbee-100 border border-warmbee-300 text-center">
                <span class="text-warmbee-700 block text-[10px] uppercase font-bold">Jaminan Janji</span>
                <span class="font-madubersih-serif font-bold text-warmbee-600 text-sm">Ulang Tanpa Biaya</span>
              </div>
            </div>

            <div class="p-3 bg-warmbee-200/60 rounded-xl border border-warmbee-400 flex items-center gap-3">
              <div class="w-10 h-10 rounded-full bg-warmbee-500 text-white flex items-center justify-center font-madubersih-serif font-bold flex-shrink-0">
                ✓
              </div>
              <div class="text-xs">
                <div class="font-madubersih-serif font-bold text-warmbee-wood">Pekerja Asuhan Mandiri</div>
                <div class="text-[11px] text-warmbee-700">Disaring ketat dengan integritas moral & sopan santun.</div>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </section>

  <!-- Layanan & Paket Section -->
  <section id="layanan" class="py-24 relative z-10 border-b-2 border-warmbee-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="text-center max-w-3xl mx-auto mb-16 space-y-3">
        <span class="text-xs uppercase font-madubersih-serif tracking-widest text-warmbee-700 font-bold">Paket Pilihan Keluarga</span>
        <h2 class="text-3xl sm:text-4xl font-madubersih-serif font-bold text-warmbee-wood">Daftar Biaya Perawatan Bersih Rumah</h2>
        <p class="text-warmbee-800 text-sm sm:text-base">Harga jujur tanpa biaya tersembunyi, pengerjaan tuntas dengan kebersihan maksimal.</p>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        
        <!-- Paket 1 -->
        <div class="madubersih-vintage-card rounded-2xl p-7 flex flex-col justify-between hover:-translate-y-1 transition-all duration-300">
          <div>
            <div class="w-12 h-12 rounded-xl bg-warmbee-200 border border-warmbee-400 flex items-center justify-center text-warmbee-800 text-2xl mb-6">
              🧹
            </div>
            <h3 class="text-xl font-madubersih-serif font-bold text-warmbee-wood mb-2">Perawatan Asri Berkala</h3>
            <p class="text-xs text-warmbee-800 leading-relaxed mb-6">Pembersihan umum menyapu, mengepel dengan pewangi herbal alami, pengelapan debu meja, serta penataan kasur rapi.</p>
            
            <div class="mb-6">
              <span class="text-3xl font-madubersih-serif font-bold text-warmbee-wood">Rp 145.000</span>
              <span class="text-xs text-warmbee-700 font-semibold">/ 2 Jam</span>
            </div>

            <ul class="space-y-3 text-xs text-warmbee-800 border-t border-warmbee-300 pt-6">
              <li class="flex items-center gap-2">
                <span class="text-warmbee-600 font-bold">✔</span> Sapu & Pel Wangi Aromatik Alami
              </li>
              <li class="flex items-center gap-2">
                <span class="text-warmbee-600 font-bold">✔</span> Pembersihan Debu Perabot Kayu & Kaca
              </li>
              <li class="flex items-center gap-2">
                <span class="text-warmbee-600 font-bold">✔</span> Kerapian Dapur Bersih Sehari-hari
              </li>
              <li class="flex items-center gap-2">
                <span class="text-warmbee-600 font-bold">✔</span> Pembuangan Kantong Sampah Domestik
              </li>
            </ul>
          </div>
          <a href="https://wa.me/6281234567890?text=Halo%20MaduBersih,%20saya%20tertarik%20paket%20Perawatan%20Asri" target="_blank" class="mt-8 w-full block text-center bg-warmbee-100 hover:bg-warmbee-200 border-2 border-warmbee-400 text-warmbee-wood font-madubersih-serif font-bold py-2.5 rounded-xl text-xs transition-colors" rel="noopener noreferrer">
            Pilih Paket Asri
          </a>
        </div>

        <!-- Paket 2 (Featured) -->
        <div class="madubersih-vintage-card rounded-2xl p-7 flex flex-col justify-between relative border-2 border-warmbee-600 shadow-xl bg-gradient-to-b from-warmbee-50 to-warmbee-100/50">
          <div class="absolute -top-3.5 left-1/2 -translate-x-1/2 bg-warmbee-600 text-white text-[10px] font-madubersih-serif font-bold uppercase tracking-wider px-4 py-1 rounded-full border border-warmbee-700">
            ★ Paling Diminati Keluarga ★
          </div>
          <div>
            <div class="w-12 h-12 rounded-xl madubersih-vintage-seal border border-warmbee-700 flex items-center justify-center text-warmbee-900 text-2xl mb-6 shadow-sm">
              ✨
            </div>
            <h3 class="text-xl font-madubersih-serif font-bold text-warmbee-wood mb-2">Deep Sanitizing Tradisi</h3>
            <p class="text-xs text-warmbee-800 leading-relaxed mb-6">Pembersihan kerak menahun kamar mandi, nat lantai, ventilasi udara, dan uap sanitasi panas bebas zat kimia pedih.</p>
            
            <div class="mb-6">
              <span class="text-3xl font-madubersih-serif font-bold text-warmbee-600">Rp 385.000</span>
              <span class="text-xs text-warmbee-700 font-semibold">/ Paket Ruang</span>
            </div>

            <ul class="space-y-3 text-xs text-warmbee-900 border-t border-warmbee-300 pt-6">
              <li class="flex items-center gap-2">
                <span class="text-warmbee-600 font-bold">✔</span> <strong class="text-warmbee-wood">Kerak Kamar Mandi Bersih Total</strong>
              </li>
              <li class="flex items-center gap-2">
                <span class="text-warmbee-600 font-bold">✔</span> Uap Panas Alami Sterilisasi Bakteri
              </li>
              <li class="flex items-center gap-2">
                <span class="text-warmbee-600 font-bold">✔</span> Pembersihan Minyak Dapur Tradisional
              </li>
              <li class="flex items-center gap-2">
                <span class="text-warmbee-600 font-bold">✔</span> Pengasapan Aromaterapi Serai / Lavender
              </li>
            </ul>
          </div>
          <a href="https://wa.me/6281234567890?text=Halo%20MaduBersih,%20saya%20ingin%20memesan%20Deep%20Sanitizing%20Tradisi" target="_blank" class="mt-8 w-full block text-center bg-warmbee-600 hover:bg-warmbee-700 text-white font-madubersih-serif font-bold py-3 rounded-xl text-xs border border-warmbee-800 shadow-md transition-all" rel="noopener noreferrer">
            Pesan Deep Sanitizing
          </a>
        </div>

        <!-- Paket 3 -->
        <div class="madubersih-vintage-card rounded-2xl p-7 flex flex-col justify-between hover:-translate-y-1 transition-all duration-300">
          <div>
            <div class="w-12 h-12 rounded-xl bg-warmbee-200 border border-warmbee-400 flex items-center justify-center text-warmbee-800 text-2xl mb-6">
              🛏️
            </div>
            <h3 class="text-xl font-madubersih-serif font-bold text-warmbee-wood mb-2">Sedot Tungau Debu Kasur</h3>
            <p class="text-xs text-warmbee-800 leading-relaxed mb-6">Penyedotan mikroorganisme dan kutu kasur secara mekanis dengan filtrasi air tanpa racun pestisida berbahaya.</p>
            
            <div class="mb-6">
              <span class="text-3xl font-madubersih-serif font-bold text-warmbee-wood">Rp 239.000</span>
              <span class="text-xs text-warmbee-700 font-semibold">/ Matras King</span>
            </div>

            <ul class="space-y-3 text-xs text-warmbee-800 border-t border-warmbee-300 pt-6">
              <li class="flex items-center gap-2">
                <span class="text-warmbee-600 font-bold">✔</span> Ekstraksi Tungau Kasur Depan & Belakang
              </li>
              <li class="flex items-center gap-2">
                <span class="text-warmbee-600 font-bold">✔</span> Pembersihan Bantal, Guling & Headboard
              </li>
              <li class="flex items-center gap-2">
                <span class="text-warmbee-600 font-bold">✔</span> Minyak Esensial Eucalyptus Pelega Nafas
              </li>
              <li class="flex items-center gap-2">
                <span class="text-warmbee-600 font-bold">✔</span> Bebas Gatal & Alergi Saluran Nafas
              </li>
            </ul>
          </div>
          <a href="https://wa.me/6281234567890?text=Halo%20MaduBersih,%20saya%20mau%20pesan%20Sedot%20Tungau" target="_blank" class="mt-8 w-full block text-center bg-warmbee-100 hover:bg-warmbee-200 border-2 border-warmbee-400 text-warmbee-wood font-madubersih-serif font-bold py-2.5 rounded-xl text-xs transition-colors" rel="noopener noreferrer">
            Pilih Sedot Kasur
          </a>
        </div>

      </div>
    </div>
  </section>

  <!-- Keunggulan Section -->
  <section id="keunggulan" class="py-24 relative z-10 border-b-2 border-warmbee-200 bg-warmbee-100/40">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
        
        <div class="lg:col-span-6 space-y-6">
          <span class="text-xs uppercase font-madubersih-serif tracking-widest text-warmbee-700 font-bold">Keutamaan Pelayanan Kami</span>
          <h2 class="text-3xl sm:text-4xl font-madubersih-serif font-bold text-warmbee-wood">Merawat Rumah Selayaknya Rumah Kebanggaan Sendiri</h2>
          <p class="text-warmbee-800 text-sm leading-relaxed">Etika luhur keramahan dan kesopanan adalah prinsip utama kami. Kru MaduBersih tidak hanya datang membersihkan, namun menjaga kehormatan serta keasrian hunian Anda.</p>

          <div class="space-y-4 pt-4">
            <div class="p-4 rounded-xl bg-warmbee-50 border border-warmbee-300 flex gap-4">
              <span class="text-2xl">🍯</span>
              <div>
                <h4 class="font-madubersih-serif font-bold text-warmbee-wood text-sm">Cairan Pembersih Nabati Organik</h4>
                <p class="text-xs text-warmbee-700 mt-1">Menggunakan konsentrat jeruk lemon, cuka apel terfilter, dan minyak pinus alami yang harum menenangkan.</p>
              </div>
            </div>

            <div class="p-4 rounded-xl bg-warmbee-50 border border-warmbee-300 flex gap-4">
              <span class="text-2xl">🛡️</span>
              <div>
                <h4 class="font-madubersih-serif font-bold text-warmbee-wood text-sm">Aman Bagi Marmer Antik & Kayu Berharga</h4>
                <p class="text-xs text-warmbee-700 mt-1">Kami menggunakan pH netral sehingga kilau lantai marmer tidak pudar dan cat perabot kayu tidak terkelupas.</p>
              </div>
            </div>

            <div class="p-4 rounded-xl bg-warmbee-50 border border-warmbee-300 flex gap-4">
              <span class="text-2xl">🤝</span>
              <div>
                <h4 class="font-madubersih-serif font-bold text-warmbee-wood text-sm">Pekerja Beradab & Telah Disumpah Jujur</h4>
                <p class="text-xs text-warmbee-700 mt-1">Pemeriksaan latar belakang ketat dengan jaminan rasa aman bagi keluarga di dalam rumah.</p>
              </div>
            </div>
          </div>
        </div>

        <div class="lg:col-span-6">
          <div class="madubersih-vintage-card p-8 rounded-2xl space-y-6">
            <div class="text-center pb-4 border-b border-warmbee-300">
              <span class="text-xs font-madubersih-serif uppercase tracking-wider text-warmbee-700 font-bold">Catatan Bukti Nyata</span>
              <h3 class="font-madubersih-serif font-bold text-warmbee-wood text-lg mt-1">Perubahan Nyata Sebelum & Sesudah</h3>
            </div>

            <div class="grid grid-cols-2 gap-4">
              <div class="p-4 rounded-xl bg-warmbee-100 border border-warmbee-300 text-center space-y-2">
                <span class="text-[10px] font-bold uppercase tracking-wider text-warmbee-800 bg-warmbee-200 px-2 py-0.5 rounded">Kondisi Awal</span>
                <div class="h-28 rounded-lg bg-warmbee-200/60 flex items-center justify-center border border-warmbee-300 text-3xl">
                  🕸️
                </div>
                <p class="text-[11px] text-warmbee-700">Kerak kuning menahun pada wastafel & sela lantai kusam</p>
              </div>

              <div class="p-4 rounded-xl bg-warmbee-100 border-2 border-warmbee-500 text-center space-y-2">
                <span class="text-[10px] font-bold uppercase tracking-wider text-warmbee-900 bg-warmbee-300 px-2 py-0.5 rounded">Hasil MaduBersih</span>
                <div class="h-28 rounded-lg bg-warmbee-50 flex items-center justify-center border border-warmbee-400 text-3xl">
                  ✨
                </div>
                <p class="text-[11px] text-warmbee-900 font-semibold">Mengkilat jernih, harum minyak atsiri, tanpa bau obat kimia</p>
              </div>
            </div>

            <div class="p-3 bg-warmbee-200/50 rounded-xl border border-warmbee-300 text-xs text-center text-warmbee-800 font-madubersih-serif italic">
              "Rumah yang bersih menghadirkan berkah dan ketenangan batin bagi seluruh penghuninya."
            </div>
          </div>
        </div>

      </div>
    </div>
  </section>

  <!-- FAQ Section (Accordion) -->
  <section id="faq" class="py-24 relative z-10 border-b-2 border-warmbee-200">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="text-center mb-16 space-y-3">
        <span class="text-xs uppercase font-madubersih-serif tracking-widest text-warmbee-700 font-bold">Bantuan Informasi</span>
        <h2 class="text-3xl sm:text-4xl font-madubersih-serif font-bold text-warmbee-wood">Tanya Jawab Seputar MaduBersih</h2>
        <p class="text-warmbee-800 text-sm">Penjelasan lengkap mengenai tata cara pemesanan, bahan pembersih, dan garansi layanan.</p>
      </div>

      <!-- Accordion Container -->
      <div class="space-y-4" id="faq-container-vintage">
        
        <!-- Item 1 -->
        <div class="madubersih-vintage-card rounded-xl overflow-hidden">
          <button type="button" onclick="toggleVintageFaq(this)" class="w-full text-left px-6 py-5 flex items-center justify-between text-sm sm:text-base font-madubersih-serif font-bold text-warmbee-wood hover:text-warmbee-600 transition-colors">
            <span>Bagaimana cara memesan jadwal kunjungan tim MaduBersih?</span>
            <span class="text-warmbee-600 font-bold text-lg transform transition-transform duration-200">▼</span>
          </button>
          <div class="faq-content hidden px-6 pb-5 text-xs sm:text-sm text-warmbee-800 leading-relaxed border-t border-warmbee-200 pt-4">
            Anda dapat langsung menekan tombol WhatsApp atau menggunakan kalkulator estimasi di web ini. Tim admin kami akan menanyakan alamat, luas rumah, dan menyesuaikan waktu kunjungan sesuai kenyamanan waktu istirahat Anda.
          </div>
        </div>

        <!-- Item 2 -->
        <div class="madubersih-vintage-card rounded-xl overflow-hidden">
          <button type="button" onclick="toggleVintageFaq(this)" class="w-full text-left px-6 py-5 flex items-center justify-between text-sm sm:text-base font-madubersih-serif font-bold text-warmbee-wood hover:text-warmbee-600 transition-colors">
            <span>Apakah saya perlu menyiapkan sabun atau kain pel sendiri?</span>
            <span class="text-warmbee-600 font-bold text-lg transform transition-transform duration-200">▼</span>
          </button>
          <div class="faq-content hidden px-6 pb-5 text-xs sm:text-sm text-warmbee-800 leading-relaxed border-t border-warmbee-200 pt-4">
            Sama sekali tidak perlu. Tim kami membawa seluruh perlengkapan lengkap: vacuum separator air, mesin poles lantai kayu/marmer, uap panas sterilisasi, sabun ramah lingkungan aroma serai dan madu, serta kain lap katun murni higienis.
          </div>
        </div>

        <!-- Item 3 -->
        <div class="madubersih-vintage-card rounded-xl overflow-hidden">
          <button type="button" onclick="toggleVintageFaq(this)" class="w-full text-left px-6 py-5 flex items-center justify-between text-sm sm:text-base font-madubersih-serif font-bold text-warmbee-wood hover:text-warmbee-600 transition-colors">
            <span>Apakah cairan yang dipakai berbau menyengat seperti asam kaporit?</span>
            <span class="text-warmbee-600 font-bold text-lg transform transition-transform duration-200">▼</span>
          </button>
          <div class="faq-content hidden px-6 pb-5 text-xs sm:text-sm text-warmbee-800 leading-relaxed border-t border-warmbee-200 pt-4">
            Pasti tidak! Kami berpantang menggunakan bahan asam sulfat/klorida pekat yang merusak pernapasan dan mengikis glasur keramik. Seluruh formula kami mengutamakan keharuman aromaterapi menyejukkan yang aman bagi bayi dan kucing peliharaan.
          </div>
        </div>

        <!-- Item 4 -->
        <div class="madubersih-vintage-card rounded-xl overflow-hidden">
          <button type="button" onclick="toggleVintageFaq(this)" class="w-full text-left px-6 py-5 flex items-center justify-between text-sm sm:text-base font-madubersih-serif font-bold text-warmbee-wood hover:text-warmbee-600 transition-colors">
            <span>Bagaimana bila hasil pembersihan belum memuaskan hati saya?</span>
            <span class="text-warmbee-600 font-bold text-lg transform transition-transform duration-200">▼</span>
          </button>
          <div class="faq-content hidden px-6 pb-5 text-xs sm:text-sm text-warmbee-800 leading-relaxed border-t border-warmbee-200 pt-4">
            Kami memegang teguh amanah kepuasan pelanggan. Anda berhak mendapatkan pemeriksaan bersama setelah pengerjaan. Jika terdapat bagian yang belum bersih, kami akan bersihkan kembali saat itu juga atau mengirimkan kru ulangan tanpa tambahan biaya sepeser pun.
          </div>
        </div>

      </div>
    </div>
  </section>

  <!-- Footer -->
  <footer id="kontak" class="bg-warmbee-100 border-t-2 border-warmbee-300 pt-16 pb-12 relative z-10 text-warmbee-800 text-xs">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="grid grid-cols-1 md:grid-cols-4 gap-10 pb-12 border-b border-warmbee-300">
        
        <div class="space-y-4">
          <div class="flex items-center gap-2">
            <div class="w-8 h-8 rounded-full madubersih-vintage-seal border border-warmbee-700 flex items-center justify-center text-warmbee-900 text-sm">
              🐝
            </div>
            <span class="font-madubersih-display font-bold text-lg text-warmbee-wood">MADU<span class="text-warmbee-600 font-madubersih-serif italic">BERSIH</span></span>
          </div>
          <p class="text-warmbee-800 leading-relaxed">Spesialis pembersihan rumah tinggal, villa, dan kantor dengan kehangatan budi pekerti serta standar kebersihan menyeluruh sejak 2012.</p>
          <div class="flex items-center gap-3 pt-2">
            <span class="font-madubersih-serif italic font-semibold text-warmbee-700">Ikuti Jejak Kami: @madubersih.id</span>
          </div>
        </div>

        <div>
          <h4 class="font-madubersih-serif font-bold text-warmbee-wood mb-4 uppercase tracking-wider text-[11px]">Jangkauan Wilayah</h4>
          <ul class="space-y-2">
            <li class="flex items-center gap-1.5">🏡 Jakarta Selatan & Kebayoran</li>
            <li class="flex items-center gap-1.5">🏡 Pondok Indah & Puri Indah</li>
            <li class="flex items-center gap-1.5">🏡 Bintaro Jaya & BSD City</li>
            <li class="flex items-center gap-1.5">🏡 Depok, Cibubur & Sekitarnya</li>
          </ul>
        </div>

        <div>
          <h4 class="font-madubersih-serif font-bold text-warmbee-wood mb-4 uppercase tracking-wider text-[11px]">Tautan Pintas</h4>
          <ul class="space-y-2">
            <li><a href="#beranda" class="hover:text-warmbee-600 transition-colors">Beranda MaduBersih</a></li>
            <li><a href="#layanan" class="hover:text-warmbee-600 transition-colors">Rincian Paket & Biaya</a></li>
            <li><a href="#keunggulan" class="hover:text-warmbee-600 transition-colors">Komitmen Kualitas & Amanah</a></li>
            <li><a href="#faq" class="hover:text-warmbee-600 transition-colors">Tanya Jawab Pelanggan</a></li>
          </ul>
        </div>

        <div>
          <h4 class="font-madubersih-serif font-bold text-warmbee-wood mb-4 uppercase tracking-wider text-[11px]">Saluran Komunikasi</h4>
          <ul class="space-y-2">
            <li>📞 Telepon Kantor: (021) 7591-8822</li>
            <li>💬 Layanan WhatsApp: +62 812-9876-5432</li>
            <li>⏰ Jam Pelayanan: 08.00 - 19.30 WIB</li>
          </ul>
        </div>

      </div>

      <div class="pt-8 flex flex-col sm:flex-row items-center justify-between gap-4 text-warmbee-700">
        <p>© 2025 MaduBersih - Yayasan Tradisi Keasrian Hunian. Hak Cipta Terpelihara.</p>
        <p class="font-madubersih-serif italic text-warmbee-800">Desain 2: Nuansa Vintage Klasik nan Hangat "Warm Bee"</p>
      </div>
    </div>
  </footer>

  <!-- Floating WhatsApp Button (Kanan Bawah) -->
  <a href="https://wa.me/6281298765432?text=Halo%20Admin%20MaduBersih,%20saya%20ingin%20reservasi%20jasa%20cleaning" target="_blank" class="fixed bottom-6 right-6 z-50 flex items-center gap-3 bg-emerald-600 hover:bg-emerald-700 text-white px-4 py-3 rounded-full shadow-2xl hover:scale-105 transition-all duration-300 group border-2 border-white/50" rel="noopener noreferrer">
    <div class="w-8 h-8 rounded-full bg-white/20 flex items-center justify-center">
      <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/></svg>
    </div>
    <span class="font-bold text-xs pr-1">WhatsApp Reservasi</span>
  </a>

  <!-- Floating AI Assistant Button (Kiri Bawah) -->
  <button onclick="document.getElementById('ai-modal').classList.remove('hidden')" class="fixed bottom-6 left-6 z-50 flex items-center gap-3 bg-warmbee-50/95 hover:bg-warmbee-100 text-warmbee-wood border-2 border-warmbee-500 px-4 py-3 rounded-full shadow-2xl backdrop-blur-md hover:scale-105 transition-all duration-300">
    <div class="w-8 h-8 rounded-full madubersih-vintage-seal border border-warmbee-700 flex items-center justify-center text-sm shadow-inner">
      🐝
    </div>
    <span class="font-madubersih-serif font-bold text-xs pr-1 text-warmbee-900">Hitung Estimasi Biaya</span>
  </button>

  <!-- Interactive AI Estimator Modal -->
  <div id="ai-modal" class="fixed inset-0 z-50 bg-warmbee-wood/60 backdrop-blur-sm flex items-center justify-center p-4 hidden">
    <div class="madubersih-vintage-card rounded-2xl max-w-md w-full p-6 space-y-5 border-2 border-warmbee-600 shadow-2xl">
      <div class="flex items-center justify-between border-b-2 border-dashed border-warmbee-300 pb-3">
        <div class="flex items-center gap-2">
          <div class="w-8 h-8 rounded-full madubersih-vintage-seal border border-warmbee-700 flex items-center justify-center text-base">
            🐝
          </div>
          <h3 class="font-madubersih-serif font-bold text-warmbee-wood text-base">Kalkulator MaduBersih</h3>
        </div>
        <button onclick="document.getElementById('ai-modal').classList.add('hidden')" class="text-warmbee-700 hover:text-warmbee-900 p-1 rounded-lg">
          <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
        </button>
      </div>

      <div class="space-y-4 text-xs">
        <div>
          <label class="block text-warmbee-800 font-madubersih-serif font-bold mb-1.5">Pilihan Tipe Ruang / Rumah</label>
          <select id="tipe-hunian-vintage" onchange="calculateVintageEstimate()" class="w-full bg-warmbee-50 border border-warmbee-400 rounded-lg px-3 py-2 text-warmbee-wood focus:outline-none focus:border-warmbee-600 font-medium">
            <option value="145000">Perawatan Ringan Paviliun / Studio (Rp 145.000)</option>
            <option value="245000">Rumah Tingkat Sedang (Rp 245.000)</option>
            <option value="390000">Kediaman Luas / Villa (Rp 390.000)</option>
            <option value="385000">Kamar Mandi Deep Clean Kerak Alami (Rp 385.000)</option>
            <option value="239000">Sedot Tungau Kasur Matras King (Rp 239.000)</option>
          </select>
        </div>

        <div>
          <label class="block text-warmbee-800 font-madubersih-serif font-bold mb-1.5">Layanan Ekstra Tradisi</label>
          <div class="grid grid-cols-2 gap-2">
            <label class="flex items-center gap-2 p-2 bg-warmbee-100 border border-warmbee-300 rounded-lg cursor-pointer">
              <input type="checkbox" id="add-aromatherapy" onchange="calculateVintageEstimate()" class="rounded border-warmbee-600 text-warmbee-600">
              <span class="text-warmbee-800 text-[11px]">Aromaterapi Serai (+45k)</span>
            </label>
            <label class="flex items-center gap-2 p-2 bg-warmbee-100 border border-warmbee-300 rounded-lg cursor-pointer">
              <input type="checkbox" id="add-wax" onchange="calculateVintageEstimate()" class="rounded border-warmbee-600 text-warmbee-600">
              <span class="text-warmbee-800 text-[11px]">Poles Wax Kayu Alami (+70k)</span>
            </label>
          </div>
        </div>

        <!-- Result Box -->
        <div class="p-4 rounded-xl bg-warmbee-200/60 border border-warmbee-400 text-center">
          <span class="text-warmbee-700 text-[11px] block font-madubersih-serif">Prakiraan Investasi Bersih:</span>
          <span id="total-price-vintage" class="text-2xl font-madubersih-serif font-bold text-warmbee-wood block mt-1">Rp 145.000</span>
          <span class="text-[10px] text-warmbee-700 block mt-1 font-semibold">✓ Jaminan Garansi Ulang Tanpa Biaya</span>
        </div>

        <a id="btn-booking-wa-vintage" href="https://wa.me/6281298765432?text=Halo%20MaduBersih,%20saya%20ingin%20booking%20jadwal%20dengan%20estimasi%20Rp%20145.000" target="_blank" class="w-full flex items-center justify-center gap-2 bg-emerald-600 hover:bg-emerald-700 text-white font-madubersih-serif font-bold py-2.5 rounded-xl transition-all border border-emerald-800" rel="noopener noreferrer">
          <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981z"/></svg>
          Reservasi ke WhatsApp Admin
        </a>
      </div>
    </div>
  </div>

  <script>
    function toggleVintageFaq(button) {
      const content = button.nextElementSibling;
      const arrow = button.querySelector('span:last-child');
      const isHidden = content.classList.contains('hidden');
      
      const allContents = document.querySelectorAll('#faq-container-vintage .faq-content');
      const allArrows = document.querySelectorAll('#faq-container-vintage button span:last-child');
      allContents.forEach(c => c.classList.add('hidden'));
      allArrows.forEach(a => { a.textContent = '▼'; a.classList.remove('rotate-180'); });

      if (isHidden) {
        content.classList.remove('hidden');
        arrow.textContent = '▲';
      }
    }

    function calculateVintageEstimate() {
      const base = parseInt(document.getElementById('tipe-hunian-vintage').value) || 0;
      const aroma = document.getElementById('add-aromatherapy').checked ? 45000 : 0;
      const wax = document.getElementById('add-wax').checked ? 70000 : 0;
      const total = base + aroma + wax;

      const formatted = 'Rp ' + total.toLocaleString('id-ID');
      document.getElementById('total-price-vintage').textContent = formatted;
      document.getElementById('btn-booking-wa-vintage').href = "https://wa.me/6281298765432?text=" + encodeURIComponent("Halo MaduBersih, saya ingin reservasi dengan estimasi total: " + formatted);
    }
  </script>
</body>
</html>