<!DOCTYPE html>

<html class="scroll-smooth" lang="id"><head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>Arya Sanjaya | Penulis &amp; Pemikiran Literasi</title>
<!-- Tailwind CSS CDN with plugins -->
<!-- Google Fonts: Playfair Display, Cinzel, Plus Jakarta Sans, Inter, Cormorant Garamond -->
<link href="https://fonts.googleapis.com" rel="preconnect"/>
<link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect"/>
<link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@500;700&amp;family=Cormorant+Garamond:ital,wght@0,400;0,600;0,700;1,400&amp;family=Inter:wght@300;400;500;600;700&amp;family=Playfair+Display:ital,wght@0,500;0,700;0,900;1,400;1,600&amp;family=Plus+Jakarta+Sans:wght@300;400;500;600;700&amp;display=swap" rel="stylesheet"/>
<!-- Lucide Icons -->
<script src="https://unpkg.com/lucide@latest"></script>

@vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-arya-plum-950 text-stone-200 antialiased selection:bg-arya-champagne-400 selection:text-arya-plum-950 font-arya-plum-sans min-h-screen arya-plum-page">
<!-- ========================================================================= -->
<!-- ==================== DESAIN: PROFESSIONAL STYLE ("Plum Velvet") ========= -->
<!-- ========================================================================= -->
<!-- Navbar Desain (Professional) -->
<nav class="sticky top-0 z-40 arya-plum-glass-dark border-b border-arya-plum-800/60 shadow-lg">
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
<div class="flex items-center justify-between h-20">
<!-- Brand Logo / Author Signature -->
<a class="group flex items-center gap-3" href="#beranda">
<div class="w-11 h-11 rounded-full bg-gradient-to-br from-arya-champagne-400 via-arya-plum-700 to-arya-plum-950 p-[1.5px] shadow-md">
<div class="w-full h-full bg-arya-plum-950 rounded-full flex items-center justify-center">
<span class="font-arya-plum-cinzel text-arya-champagne-400 text-lg font-bold">AS</span>
</div>
</div>
<div>
<span class="font-arya-plum-serif text-xl sm:text-2xl font-bold tracking-tight text-white group-hover:text-arya-champagne-300 transition-colors">Arya Sanjaya</span>
<p class="text-[11px] uppercase tracking-widest text-arya-champagne-400/90 font-medium">Buku &amp; Pemikiran Literasi</p>
</div>
</a>
<!-- Desktop Navigation with Smooth Anchor Links -->
<div class="hidden md:flex items-center space-x-8">
<a class="text-sm font-medium tracking-wide text-arya-champagne-300 hover:text-white transition-colors relative py-1 after:absolute after:bottom-0 after:left-0 after:w-full after:h-[2px] after:bg-arya-champagne-400" href="#beranda">Beranda</a>
<a class="text-sm font-medium tracking-wide text-stone-300 hover:text-arya-champagne-300 transition-colors" href="#tentang">Tentang Penulis</a>
<a class="text-sm font-medium tracking-wide text-stone-300 hover:text-arya-champagne-300 transition-colors" href="#buku">Buku &amp; Karya</a>
<a class="text-sm font-medium tracking-wide text-stone-300 hover:text-arya-champagne-300 transition-colors" href="#prestasi">Penghargaan</a>
<a class="text-sm font-medium tracking-wide text-stone-300 hover:text-arya-champagne-300 transition-colors" href="#faq">FAQ</a>
<a class="text-sm font-medium tracking-wide text-stone-300 hover:text-arya-champagne-300 transition-colors" href="#kontak">Kontak</a>
</div>
<!-- Right Action CTA -->
<div class="hidden md:flex items-center gap-4">
<a class="px-5 py-2.5 rounded-full text-xs font-semibold tracking-wider uppercase bg-gradient-to-r from-arya-champagne-500 via-arya-champagne-400 to-arya-champagne-600 text-arya-plum-950 hover:shadow-[0_0_20px_rgba(220,176,96,0.4)] transition-all transform hover:-translate-y-0.5" href="#buku">
          Pesan Edisi TTD
        </a>
</div>
<!-- Mobile Menu Button -->
<button class="md:hidden p-2 rounded-lg text-arya-champagne-300 hover:bg-arya-plum-900 focus:outline-none" onclick="toggleMobileMenu('mobile-menu')">
<i class="w-6 h-6" data-lucide="menu"></i>
</button>
</div>
</div>
<!-- Mobile Dropdown Menu -->
<div class="hidden md:hidden bg-arya-plum-900/95 border-b border-arya-plum-800 px-4 pt-3 pb-5 space-y-3" id="mobile-menu">
<a class="block text-sm font-medium text-arya-champagne-300 hover:text-white py-1" href="#beranda" onclick="toggleMobileMenu('mobile-menu')">Beranda</a>
<a class="block text-sm font-medium text-stone-200 hover:text-arya-champagne-300 py-1" href="#tentang" onclick="toggleMobileMenu('mobile-menu')">Tentang Penulis</a>
<a class="block text-sm font-medium text-stone-200 hover:text-arya-champagne-300 py-1" href="#buku" onclick="toggleMobileMenu('mobile-menu')">Buku &amp; Karya</a>
<a class="block text-sm font-medium text-stone-200 hover:text-arya-champagne-300 py-1" href="#faq" onclick="toggleMobileMenu('mobile-menu')">FAQ</a>
<a class="block text-sm font-medium text-stone-200 hover:text-arya-champagne-300 py-1" href="#kontak" onclick="toggleMobileMenu('mobile-menu')">Kontak</a>
<a class="block text-center mt-3 py-2.5 rounded-full text-xs font-semibold uppercase bg-arya-champagne-400 text-arya-plum-950" href="#buku" onclick="toggleMobileMenu('mobile-menu')">Pesan Edisi TTD</a>
</div>
</nav>
<!-- SECTION 1: HERO (Professional / Plum Velvet) -->
<section class="relative pt-12 pb-24 md:pt-20 md:pb-32 overflow-hidden" id="beranda">
<!-- Background subtle glow & ornaments -->
<div class="absolute -top-32 -left-32 w-96 h-96 bg-arya-plum-700/25 rounded-full blur-3xl pointer-events-none"></div>
<div class="absolute top-1/2 -right-24 w-96 h-96 bg-arya-champagne-500/10 rounded-full blur-3xl pointer-events-none"></div>
<div class="absolute inset-0 bg-[radial-gradient(#58205b_1px,transparent_1px)] [background-size:28px_28px] opacity-20 pointer-events-none"></div>
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
<div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-8 items-center">
<!-- Left Column: Copywriting, Quotation & CTA -->
<div class="lg:col-span-7 space-y-6">
<div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-arya-plum-900/80 border border-arya-champagne-500/30 text-arya-champagne-300 text-xs font-medium tracking-wide">
<span class="w-1.5 h-1.5 rounded-full bg-arya-champagne-400"></span>
<span>Karya Terbaru Resmi Dirilis — International Best Seller #1</span>
</div>
<div class="space-y-4">
<blockquote class="font-arya-plum-serif italic text-2xl sm:text-3xl lg:text-4xl text-stone-100 leading-tight font-medium">
            “Kata-kata adalah kompas bagi jiwa yang tersesat di tengah riuhnya dunia modern.”
          </blockquote>
<h2 class="font-arya-plum-sans text-lg sm:text-xl font-light text-arya-champagne-300/90 tracking-wide">
            — Selamat datang di ruang karya &amp; pemikiran <span class="font-semibold text-white">Arya Sanjaya</span>.
          </h2>
</div>
<p class="text-stone-300/90 text-base sm:text-lg leading-relaxed max-w-2xl font-light">
          Menghadirkan narasi mendalam tentang psikologi kepemimpinan, eksistensi manusia, dan ketahanan batin. Lebih dari 500.000 pembaca di 14 negara telah terinspirasi melalui trilogi karyanya.
        </p>
<!-- CTA Buttons -->
<div class="flex flex-wrap items-center gap-4 pt-2">
<a class="inline-flex items-center gap-2.5 px-7 py-3.5 rounded-full font-semibold text-sm tracking-wide bg-gradient-to-r from-arya-champagne-400 via-arya-champagne-500 to-arya-champagne-600 text-arya-plum-950 hover:bg-arya-champagne-300 transition-all shadow-[0_10px_25px_rgba(220,176,96,0.3)] hover:-translate-y-0.5" href="#buku">
<i class="w-4 h-4" data-lucide="shopping-bag"></i>
<span>Beli Buku Terbaru ($24.90)</span>
</a>
<button class="inline-flex items-center gap-2 px-6 py-3.5 rounded-full font-semibold text-sm tracking-wide bg-arya-plum-900/90 text-arya-champagne-300 border border-arya-plum-700 hover:border-arya-champagne-400/60 hover:bg-arya-plum-800 transition-all" onclick="openSampleModal('Lembah Keheningan')">
<i class="w-4 h-4" data-lucide="book-open"></i>
<span>Baca Sample Gratis (Bab 1)</span>
</button>
</div>
<!-- Social Proof Bar -->
<div class="pt-6 border-t border-arya-plum-900/80 flex flex-wrap items-center gap-8 text-stone-400 text-xs" id="prestasi">
<div class="flex items-center gap-2">
<div class="flex text-arya-champagne-400">
<i class="w-4 h-4 fill-current" data-lucide="star"></i>
<i class="w-4 h-4 fill-current" data-lucide="star"></i>
<i class="w-4 h-4 fill-current" data-lucide="star"></i>
<i class="w-4 h-4 fill-current" data-lucide="star"></i>
<i class="w-4 h-4 fill-current" data-lucide="star"></i>
</div>
<span class="font-semibold text-stone-200">4.9 / 5.0</span>
<span>(3.8k Goodreads)</span>
</div>
<div class="flex items-center gap-2">
<i class="w-4 h-4 text-arya-champagne-400" data-lucide="award"></i>
<span>Peraih Kusala Sastra Khatulistiwa 2023</span>
</div>
</div>
</div>
<!-- Right Column: Visual Mockup Author Profile & Featured Book -->
<div class="lg:col-span-5 relative flex justify-center lg:justify-end">
<!-- Decorative Backing -->
<div class="relative w-full max-w-md">
<div class="absolute inset-0 bg-gradient-to-tr from-arya-champagne-500/20 via-arya-plum-800/40 to-transparent rounded-3xl transform rotate-2 scale-105 border border-arya-plum-700/50"></div>
<!-- Author Card Component -->
<div class="relative bg-gradient-to-b from-arya-plum-900 to-arya-plum-950 border border-arya-plum-800/80 rounded-2xl p-6 sm:p-7 shadow-2xl backdrop-blur-md">
<!-- Dual Visuals: Author Photo & Book Mockup 3D overlap -->
<div class="relative h-72 sm:h-80 w-full mb-6">
<!-- Author Image -->
<div class="absolute left-0 top-0 w-44 sm:w-52 h-64 sm:h-72 rounded-xl overflow-hidden border-2 border-arya-plum-700/70 shadow-lg">
<img alt="Arya Sanjaya - Penulis" class="w-full h-full object-cover object-center filter saturate-90 brightness-95" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBgdr3A1GqZW0yjnG8ztRskpPze3LWuwENqrraZifOgjWDZwRvgo08kZFSavlilBZVnKm8_m-AJOPQNeDCmP2wcwmjlFRjxN3U14wmT0JwYsHIIrT_doGggWT_Fjzw5iB0fUDwwYLjiIR-kByaaHvSzCEHNRyPIDt1TmLQB_tsP2WFr2fzrRhaWNul4v7V35Jvaak6CpatgNJGuoEU909CXtyYRGoTWnsuj2duH_l0"/>
<div class="absolute inset-0 bg-gradient-to-t from-arya-plum-950 via-transparent to-transparent opacity-60"></div>
<div class="absolute bottom-2 left-2 text-[10px] uppercase font-bold tracking-wider px-2 py-0.5 bg-arya-plum-950/90 text-arya-champagne-300 rounded border border-arya-champagne-500/30">
                  Penulis &amp; Pembicara
                </div>
</div>
<!-- Book Mockup Overlap -->
<div class="absolute right-2 sm:right-4 bottom-2 w-40 sm:w-48 h-56 sm:h-64 rounded-r-lg rounded-l-sm bg-gradient-to-br from-arya-plum-800 via-arya-plum-900 to-black arya-plum-book-shadow border-t border-r border-b border-arya-champagne-400/40 transform rotate-[-4deg] hover:rotate-0 transition-transform duration-300 flex flex-col justify-between p-4 text-left">
<div class="border-b border-arya-champagne-400/30 pb-2">
<span class="text-[9px] uppercase tracking-widest text-arya-champagne-400 font-arya-plum-cinzel">Edisi Eksklusif</span>
<h4 class="font-arya-plum-serif text-base sm:text-lg font-bold text-white leading-tight">Lembah Keheningan</h4>
</div>
<div class="my-auto py-2">
<p class="text-[10px] text-stone-300 font-arya-plum-serif italic line-clamp-3">Menemukan kedamaian dan makna di era kegaduhan informasi tanpa henti.</p>
</div>
<div class="pt-2 border-t border-arya-plum-700/60 flex items-center justify-between">
<span class="text-[10px] text-arya-champagne-300 font-medium">Arya Sanjaya</span>
<span class="text-[9px] px-1.5 py-0.5 rounded bg-arya-champagne-500 text-arya-plum-950 font-bold">Best Seller</span>
</div>
</div>
</div>
<!-- Author Micro Bio Snippet -->
<div class="bg-arya-plum-950/80 rounded-xl p-4 border border-arya-plum-800/60 flex items-center justify-between">
<div>
<h5 class="text-sm font-semibold text-white">Arya Sanjaya, M.A.</h5>
<p class="text-xs text-arya-champagne-400">Esais &amp; Novelis Kontemporer</p>
</div>
<div class="text-right">
<span class="block text-xs font-bold text-white">8 Judul Buku</span>
<span class="text-[11px] text-stone-400">Diterbitkan Grafika Utama</span>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</section>
<!-- SECTION 2: TENTANG PENULIS (Professional) -->
<section class="py-20 bg-arya-plum-900/40 border-t border-b border-arya-plum-800/40 relative" id="tentang">
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
<div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
<div class="lg:col-span-5 order-2 lg:order-1">
<div class="relative">
<div class="aspect-[4/5] rounded-2xl overflow-hidden border border-arya-plum-700/60 shadow-2xl">
<img alt="Arya Sanjaya saat sesi menulis" class="w-full h-full object-cover" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDsqmqLSelgdr3PsCj0CDRRQ0oNSBUR43Lb324qj5zkJ8Tb2ms_nNJrxmbWGsUbbA6TDEFGuMXRRoiAvEh4wNHub2-kYFwgHN6B5aehPHcOvxI-0-0LzA6gVHRlOrXRk2KIhMOxRZg1UwC1OQCWEm6l9hD3lJ4tJrDoLpqlTKLjklNzgGLYelt7kQLCFSevqfi_l2yl7KC_q1rYSMILM8Lrgp12oKzqzb5yRkmFdgo"/>
</div>
<div class="absolute -bottom-6 -right-6 bg-arya-plum-950 border border-arya-champagne-500/40 p-5 rounded-2xl shadow-xl hidden sm:block max-w-xs">
<i class="w-7 h-7 text-arya-champagne-400 mb-2" data-lucide="feather"></i>
<p class="text-xs text-stone-300 italic font-arya-plum-serif leading-relaxed">
              “Menulis bukan sekadar pekerjaan, melainkan ritus penyelaman ke dasar kalbu manusia.”
            </p>
</div>
</div>
</div>
<div class="lg:col-span-7 order-1 lg:order-2 space-y-6">
<span class="text-xs font-bold uppercase tracking-widest text-arya-champagne-400">Mengenal Sosok Penulis</span>
<h3 class="font-arya-plum-serif text-3xl sm:text-4xl text-white font-bold leading-tight">
          Dedikasi 15 Tahun Merangkai Narasi yang Menggugah Nurani
        </h3>
<div class="space-y-4 text-stone-300 text-base leading-relaxed font-light">
<p>
            Arya Sanjaya memulai perjalanan kepenulisannya sejak menjabat sebagai jurnalis investigasi sastra di Kyoto dan Jakarta. Memadukan kedalaman filsafat Timur dengan ketajaman analisis modern, karya-karyanya sering dipuji kritikus karena berhasil menjembatani seni berbahasa tinggi dengan keterbacaan yang mengalir.
          </p>
<p>
            Karya debutnya <em class="text-arya-champagne-300">"Arus di Balik Kabut"</em> diterjemahkan ke dalam 6 bahasa internasional. Saat ini ia aktif memimpin sanggar inkubasi penulisan kreatif serta menjadi pembicara kunci di Frankfurt Book Fair dan Ubud Writers Festival.
          </p>
</div>
<!-- Stats Grid -->
<div class="grid grid-cols-3 gap-4 pt-4 border-t border-arya-plum-800">
<div class="p-3 bg-arya-plum-950/60 rounded-xl border border-arya-plum-800/80">
<div class="font-arya-plum-serif text-2xl sm:text-3xl font-bold text-arya-champagne-400">14+</div>
<div class="text-[11px] text-stone-400 uppercase tracking-wider mt-1">Negara Terdistribusi</div>
</div>
<div class="p-3 bg-arya-plum-950/60 rounded-xl border border-arya-plum-800/80">
<div class="font-arya-plum-serif text-2xl sm:text-3xl font-bold text-arya-champagne-400">500K+</div>
<div class="text-[11px] text-stone-400 uppercase tracking-wider mt-1">Eksemplar Terjual</div>
</div>
<div class="p-3 bg-arya-plum-950/60 rounded-xl border border-arya-plum-800/80">
<div class="font-arya-plum-serif text-2xl sm:text-3xl font-bold text-arya-champagne-400">8</div>
<div class="text-[11px] text-stone-400 uppercase tracking-wider mt-1">Buku Terbit</div>
</div>
</div>
<div class="pt-2">
<a class="inline-flex items-center gap-2 text-sm text-arya-champagne-300 hover:text-white font-semibold underline underline-offset-8 transition-colors" href="#kontak">
<span>Undang Arya untuk Keynote / Sesi Bedah Buku</span>
<i class="w-4 h-4" data-lucide="arrow-right"></i>
</a>
</div>
</div>
</div>
</div>
</section>
<!-- SECTION 3: BUKU / KARYA UNGGULAN (Professional) -->
<section class="py-20 relative" id="buku">
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
<div class="flex flex-col md:flex-row md:items-end justify-between mb-14 gap-4">
<div>
<span class="text-xs font-bold uppercase tracking-widest text-arya-champagne-400">Bibliografi &amp; Katalog Buku</span>
<h3 class="font-arya-plum-serif text-3xl sm:text-4xl text-white font-bold mt-1">Koleksi Karya Terpilih</h3>
</div>
<p class="text-stone-300 text-sm max-w-md">
        Tersedia dalam format Hardcover Edisi Kolektor (Bertanda tangan asli), Softcover nasional, dan E-Book digital.
      </p>
</div>
<!-- Books Grid -->
<div class="grid grid-cols-1 md:grid-cols-3 gap-8">
<!-- Book Card 1 -->
<div class="group bg-gradient-to-b from-arya-plum-900/60 to-arya-plum-950 rounded-2xl p-6 border border-arya-plum-800 hover:border-arya-champagne-500/50 transition-all duration-300 hover:-translate-y-1.5 shadow-xl flex flex-col justify-between">
<div>
<div class="relative h-64 w-full mb-6 bg-arya-plum-950/80 rounded-xl flex items-center justify-center p-4 overflow-hidden border border-arya-plum-800">
<span class="absolute top-3 left-3 text-[10px] font-bold px-2 py-0.5 rounded bg-arya-champagne-400 text-arya-plum-950">Rilis 2024</span>
<!-- Book Mockup -->
<div class="w-36 h-52 bg-gradient-to-br from-arya-plum-700 via-arya-plum-900 to-black arya-plum-book-shadow rounded-r-md border border-arya-champagne-400/40 p-3 flex flex-col justify-between group-hover:scale-105 transition-transform duration-300">
<span class="text-[8px] uppercase tracking-widest text-arya-champagne-400 font-arya-plum-cinzel">Buku Unggulan</span>
<div>
<h5 class="font-arya-plum-serif text-sm font-bold text-white">Lembah Keheningan</h5>
<p class="text-[9px] text-stone-300">Arya Sanjaya</p>
</div>
<div class="text-[8px] text-arya-champagne-300 text-right">Edisi TTD</div>
</div>
</div>
<div class="flex items-center justify-between mb-2">
<span class="text-xs text-arya-champagne-400 font-medium">Non-Fiksi / Refleksi Hidup</span>
<span class="text-sm font-bold text-white">Rp 175.000</span>
</div>
<h4 class="font-arya-plum-serif text-xl font-bold text-white group-hover:text-arya-champagne-300 transition-colors">Lembah Keheningan</h4>
<p class="text-stone-300/80 text-xs mt-2 line-clamp-3 leading-relaxed">
            Panduan kontemplatif dalam menyusun kembali batasan batin dan fokus pikiran saat gelombang kebisingan informasi modern menerpa keseharian kita.
          </p>
</div>
<div class="mt-6 pt-4 border-t border-arya-plum-800/80 flex items-center gap-3">
<button class="flex-1 py-2.5 rounded-lg bg-arya-champagne-400 hover:bg-arya-champagne-300 text-arya-plum-950 font-bold text-xs tracking-wider uppercase transition-colors text-center" onclick="orderBookDirect('Lembah Keheningan - Edisi Bertanda Tangan')">
            Pesan TTD
          </button>
<button class="p-2.5 rounded-lg bg-arya-plum-800 hover:bg-arya-plum-700 text-arya-champagne-300 transition-colors" onclick="openSampleModal('Lembah Keheningan')" title="Baca Sampel">
<i class="w-4 h-4" data-lucide="eye"></i>
</button>
</div>
</div>
<!-- Book Card 2 -->
<div class="group bg-gradient-to-b from-arya-plum-900/60 to-arya-plum-950 rounded-2xl p-6 border border-arya-plum-800 hover:border-arya-champagne-500/50 transition-all duration-300 hover:-translate-y-1.5 shadow-xl flex flex-col justify-between">
<div>
<div class="relative h-64 w-full mb-6 bg-arya-plum-950/80 rounded-xl flex items-center justify-center p-4 overflow-hidden border border-arya-plum-800">
<span class="absolute top-3 left-3 text-[10px] font-bold px-2 py-0.5 rounded bg-arya-plum-800 text-stone-200">Cetakan Ke-9</span>
<!-- Book Mockup -->
<div class="w-36 h-52 bg-gradient-to-br from-stone-900 via-stone-800 to-black arya-plum-book-shadow rounded-r-md border border-stone-600/40 p-3 flex flex-col justify-between group-hover:scale-105 transition-transform duration-300">
<span class="text-[8px] uppercase tracking-widest text-stone-300 font-arya-plum-cinzel">Novel Masterpiece</span>
<div>
<h5 class="font-arya-plum-serif text-sm font-bold text-white">Arus di Balik Kabut</h5>
<p class="text-[9px] text-stone-400">Arya Sanjaya</p>
</div>
<div class="text-[8px] text-arya-champagne-400 text-right">Award Winner</div>
</div>
</div>
<div class="flex items-center justify-between mb-2">
<span class="text-xs text-arya-champagne-400 font-medium">Fiksi Filosofis</span>
<span class="text-sm font-bold text-white">Rp 149.000</span>
</div>
<h4 class="font-arya-plum-serif text-xl font-bold text-white group-hover:text-arya-champagne-300 transition-colors">Arus di Balik Kabut</h4>
<p class="text-stone-300/80 text-xs mt-2 line-clamp-3 leading-relaxed">
            Kisah misteri perjumpaan dua pengembara di persimpangan Kyoto abad ke-20 yang menguji kesetiaan, rahasia keluarga, dan takdir keabadian.
          </p>
</div>
<div class="mt-6 pt-4 border-t border-arya-plum-800/80 flex items-center gap-3">
<button class="flex-1 py-2.5 rounded-lg bg-arya-champagne-400 hover:bg-arya-champagne-300 text-arya-plum-950 font-bold text-xs tracking-wider uppercase transition-colors text-center" onclick="orderBookDirect('Arus di Balik Kabut')">
            Pesan Buku
          </button>
<button class="p-2.5 rounded-lg bg-arya-plum-800 hover:bg-arya-plum-700 text-arya-champagne-300 transition-colors" onclick="openSampleModal('Arus di Balik Kabut')" title="Baca Sampel">
<i class="w-4 h-4" data-lucide="eye"></i>
</button>
</div>
</div>
<!-- Book Card 3 -->
<div class="group bg-gradient-to-b from-arya-plum-900/60 to-arya-plum-950 rounded-2xl p-6 border border-arya-plum-800 hover:border-arya-champagne-500/50 transition-all duration-300 hover:-translate-y-1.5 shadow-xl flex flex-col justify-between">
<div>
<div class="relative h-64 w-full mb-6 bg-arya-plum-950/80 rounded-xl flex items-center justify-center p-4 overflow-hidden border border-arya-plum-800">
<span class="absolute top-3 left-3 text-[10px] font-bold px-2 py-0.5 rounded bg-arya-plum-800 text-stone-200">Esai Pilihan</span>
<!-- Book Mockup -->
<div class="w-36 h-52 bg-gradient-to-br from-arya-plum-950 via-stone-900 to-black arya-plum-book-shadow rounded-r-md border border-arya-champagne-500/30 p-3 flex flex-col justify-between group-hover:scale-105 transition-transform duration-300">
<span class="text-[8px] uppercase tracking-widest text-arya-champagne-400 font-arya-plum-cinzel">Kumpulan Esai</span>
<div>
<h5 class="font-arya-plum-serif text-sm font-bold text-white">Fragmen Jiwa Merdeka</h5>
<p class="text-[9px] text-stone-400">Arya Sanjaya</p>
</div>
<div class="text-[8px] text-stone-300 text-right">Edisi Refleksi</div>
</div>
</div>
<div class="flex items-center justify-between mb-2">
<span class="text-xs text-arya-champagne-400 font-medium">Esai &amp; Humaniora</span>
<span class="text-sm font-bold text-white">Rp 135.000</span>
</div>
<h4 class="font-arya-plum-serif text-xl font-bold text-white group-hover:text-arya-champagne-300 transition-colors">Fragmen Jiwa Merdeka</h4>
<p class="text-stone-300/80 text-xs mt-2 line-clamp-3 leading-relaxed">
            Antologi catatan pinggir tentang perlawanan halus terhadap kejenuhan rutinitas birokrasi dan seni membangun ruang hening pribadi.
          </p>
</div>
<div class="mt-6 pt-4 border-t border-arya-plum-800/80 flex items-center gap-3">
<button class="flex-1 py-2.5 rounded-lg bg-arya-champagne-400 hover:bg-arya-champagne-300 text-arya-plum-950 font-bold text-xs tracking-wider uppercase transition-colors text-center" onclick="orderBookDirect('Fragmen Jiwa Merdeka')">
            Pesan Buku
          </button>
<button class="p-2.5 rounded-lg bg-arya-plum-800 hover:bg-arya-plum-700 text-arya-champagne-300 transition-colors" onclick="openSampleModal('Fragmen Jiwa Merdeka')" title="Baca Sampel">
<i class="w-4 h-4" data-lucide="eye"></i>
</button>
</div>
</div>
</div>
</div>
</section>
<!-- SECTION 4: FAQ (Accordion Interaktif - Plum Velvet) -->
<section class="py-20 bg-arya-plum-900/30 border-t border-arya-plum-800/50" id="faq">
<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
<div class="text-center mb-12">
<span class="text-xs font-bold uppercase tracking-widest text-arya-champagne-400">Pusat Bantuan &amp; Klarifikasi</span>
<h3 class="font-arya-plum-serif text-3xl sm:text-4xl text-white font-bold mt-1">Frequently Asked Questions</h3>
<p class="text-stone-300 text-sm mt-3">Jawaban lengkap mengenai proses pemesanan buku edisi bertanda tangan, royalti, hingga jadwal pembacaan publik.</p>
</div>
<!-- Accordion Container -->
<div class="space-y-4" id="accordion-container">
<!-- Item 1 -->
<div class="border border-arya-plum-800 rounded-xl bg-arya-plum-950/70 overflow-hidden transition-all hover:border-arya-champagne-500/40">
<button class="w-full py-5 px-6 text-left flex items-center justify-between gap-4 focus:outline-none" onclick="toggleAccordion(this)">
<span class="font-arya-plum-serif text-base sm:text-lg font-semibold text-stone-100">Bagaimana cara memesan buku edisi khusus bertanda tangan (Signature Edition)?</span>
<span class="text-arya-champagne-400 transition-transform duration-300 transform"><i class="w-5 h-5" data-lucide="chevron-down"></i></span>
</button>
<div class="arya-plum-accordion-content px-6 pb-5 text-sm text-stone-300 leading-relaxed border-t border-arya-plum-800/40 pt-4">
          Pemesanan edisi bertanda tangan dapat dilakukan langsung melalui tombol “Pesan Edisi TTD” atau menghubungi langsung manajemen penulis melalui WhatsApp. Setiap cetakan edisi khusus hanya tersedia maksimal 300 eksemplar per kuartal dan dilengkapi sertifikat keaslian bertempel segel lilin eksklusif.
        </div>
</div>
<!-- Item 2 -->
<div class="border border-arya-plum-800 rounded-xl bg-arya-plum-950/70 overflow-hidden transition-all hover:border-arya-champagne-500/40">
<button class="w-full py-5 px-6 text-left flex items-center justify-between gap-4 focus:outline-none" onclick="toggleAccordion(this)">
<span class="font-arya-plum-serif text-base sm:text-lg font-semibold text-stone-100">Kapan jadwal terbit buku berikutnya dan apakah ada sesi temu pembaca (Book Tour)?</span>
<span class="text-arya-champagne-400 transition-transform duration-300 transform"><i class="w-5 h-5" data-lucide="chevron-down"></i></span>
</button>
<div class="arya-plum-accordion-content px-6 pb-5 text-sm text-stone-300 leading-relaxed border-t border-arya-plum-800/40 pt-4">
          Karya berikutnya berjudul “Matahari di Ujung Aksara” dijadwalkan terbit pada kuartal akhir tahun ini. Tur pembacaan buku (Book Tour &amp; Reading Session) akan diselenggarakan di Jakarta, Yogyakarta, Bandung, dan Denpasar. Tanggal resmi serta tiket presale akan diumumkan melalui newsletter bulanan di situs ini.
        </div>
</div>
<!-- Item 3 -->
<div class="border border-arya-plum-800 rounded-xl bg-arya-plum-950/70 overflow-hidden transition-all hover:border-arya-champagne-500/40">
<button class="w-full py-5 px-6 text-left flex items-center justify-between gap-4 focus:outline-none" onclick="toggleAccordion(this)">
<span class="font-arya-plum-serif text-base sm:text-lg font-semibold text-stone-100">Apakah tersedia format E-Book atau Audio Book untuk pembaca luar negeri?</span>
<span class="text-arya-champagne-400 transition-transform duration-300 transform"><i class="w-5 h-5" data-lucide="chevron-down"></i></span>
</button>
<div class="arya-plum-accordion-content px-6 pb-5 text-sm text-stone-300 leading-relaxed border-t border-arya-plum-800/40 pt-4">
          Ya, seluruh karya Arya Sanjaya telah didistribusikan secara global di platform Amazon Kindle, Google Play Books, dan Apple Books. Versi audio book saat ini dinarasikan langsung oleh penulis di platform Storytel dan Spotify Audiobooks.
        </div>
</div>
<!-- Item 4 -->
<div class="border border-arya-plum-800 rounded-xl bg-arya-plum-950/70 overflow-hidden transition-all hover:border-arya-champagne-500/40">
<button class="w-full py-5 px-6 text-left flex items-center justify-between gap-4 focus:outline-none" onclick="toggleAccordion(this)">
<span class="font-arya-plum-serif text-base sm:text-lg font-semibold text-stone-100">Bagaimana prosedur mengundang Arya Sanjaya sebagai pembicara atau pemateri workshop?</span>
<span class="text-arya-champagne-400 transition-transform duration-300 transform"><i class="w-5 h-5" data-lucide="chevron-down"></i></span>
</button>
<div class="arya-plum-accordion-content px-6 pb-5 text-sm text-stone-300 leading-relaxed border-t border-arya-plum-800/40 pt-4">
          Untuk kebutuhan kuliah umum, festival sastra, atau pelatihan penulisan korporat, silakan mengisi formulir kontak di bawah ini atau berkomunikasi via WhatsApp manajemen penerbit. Pastikan mengirimkan proposal minimal 4 pekan sebelum tanggal kegiatan.
        </div>
</div>
</div>
</div>
</section>
<!-- SECTION 5: FOOTER (Professional / Plum Velvet) -->
<footer class="bg-arya-plum-950 border-t border-arya-plum-800 pt-16 pb-12 text-stone-300" id="kontak">
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
<div class="grid grid-cols-1 md:grid-cols-4 gap-10 pb-12 border-b border-arya-plum-900">
<!-- Col 1: Bio / Brand -->
<div class="md:col-span-1 space-y-4">
<div class="flex items-center gap-2">
<span class="font-arya-plum-cinzel text-arya-champagne-400 text-xl font-bold">Arya Sanjaya</span>
</div>
<p class="text-xs text-stone-400 leading-relaxed">
          Penulis, esais, dan pembicara publik. Didedikasikan untuk melestarikan tradisi sastra bernas dan literasi kritis bagi generasi masa kini.
        </p>
<div class="flex items-center space-x-3 text-arya-champagne-400 pt-2">
<a class="p-2 rounded-full bg-arya-plum-900 hover:bg-arya-champagne-400 hover:text-arya-plum-950 transition-colors" href="#"><i class="w-4 h-4" data-lucide="twitter"></i></a>
<a class="p-2 rounded-full bg-arya-plum-900 hover:bg-arya-champagne-400 hover:text-arya-plum-950 transition-colors" href="#"><i class="w-4 h-4" data-lucide="instagram"></i></a>
<a class="p-2 rounded-full bg-arya-plum-900 hover:bg-arya-champagne-400 hover:text-arya-plum-950 transition-colors" href="#"><i class="w-4 h-4" data-lucide="linkedin"></i></a>
<a class="p-2 rounded-full bg-arya-plum-900 hover:bg-arya-champagne-400 hover:text-arya-plum-950 transition-colors" href="#"><i class="w-4 h-4" data-lucide="youtube"></i></a>
</div>
</div>
<!-- Col 2: Navigasi Cepat -->
<div class="space-y-3">
<h4 class="font-arya-plum-serif text-sm font-semibold text-white uppercase tracking-wider">Navigasi Cepat</h4>
<ul class="space-y-2 text-xs">
<li><a class="hover:text-arya-champagne-300 transition-colors" href="#beranda">Beranda Utama</a></li>
<li><a class="hover:text-arya-champagne-300 transition-colors" href="#tentang">Profil Penulis</a></li>
<li><a class="hover:text-arya-champagne-300 transition-colors" href="#buku">Katalog Buku Best-Seller</a></li>
<li><a class="hover:text-arya-champagne-300 transition-colors" href="#faq">Tanya Jawab &amp; Pengiriman</a></li>
</ul>
</div>
<!-- Col 3: Penerbit Mitra -->
<div class="space-y-3">
<h4 class="font-arya-plum-serif text-sm font-semibold text-white uppercase tracking-wider">Penerbit &amp; Mitra</h4>
<ul class="space-y-2 text-xs text-stone-400">
<li>Penerbit Grafika Utama Nusantara</li>
<li>Aethelgard Literary Agency, London</li>
<li>Distributor Gramedia &amp; Periplus</li>
<li>Klub Buku Lingkar Aksara</li>
</ul>
</div>
<!-- Col 4: Newsletter -->
<div class="space-y-3">
<h4 class="font-arya-plum-serif text-sm font-semibold text-white uppercase tracking-wider">Warta Sastra (Newsletter)</h4>
<p class="text-xs text-stone-400">Dapatkan esai refleksi mingguan dan notifikasi awal buku baru langsung ke email Anda.</p>
<form class="space-y-2" onsubmit="handleNewsletter(event)">
<div class="flex">
<input class="w-full px-3 py-2 text-xs rounded-l-lg bg-arya-plum-900/90 border border-arya-plum-800 text-white focus:outline-none focus:border-arya-champagne-400" placeholder="Alamat email Anda..." required="" type="email"/>
<button class="px-3.5 py-2 text-xs font-bold rounded-r-lg bg-arya-champagne-400 text-arya-plum-950 hover:bg-arya-champagne-300 transition-colors" type="submit">Langganan</button>
</div>
</form>
</div>
</div>
<div class="pt-8 flex flex-col sm:flex-row items-center justify-between text-xs text-stone-500 gap-4">
<p>© 2024 Arya Sanjaya. Seluruh Hak Cipta Dilindungi Undang-Undang.</p>
<div class="flex space-x-6">
<a class="hover:text-stone-400" href="#">Kebijakan Privasi</a>
<a class="hover:text-stone-400" href="#">Ketentuan Layanan</a>
<a class="hover:text-stone-400" href="#">Media Kit &amp; Press</a>
</div>
</div>
</div>
</footer>
<!-- ========================================================================= -->
<!-- ================= FLOATING FIXED ACTION BUTTONS ========================= -->
<!-- ========================================================================= -->
<!-- 1. Floating AI Assistant Button (Kiri Bawah) -->
<div class="fixed bottom-6 left-6 z-50">
<div class="relative group">
<!-- Tooltip -->
<div class="absolute bottom-full left-0 mb-2 hidden sm:group-hover:flex items-center gap-1.5 px-3 py-1.5 rounded-lg bg-stone-900 text-white text-xs whitespace-nowrap shadow-lg border border-stone-700 pointer-events-none">
<i class="w-3.5 h-3.5 text-arya-champagne-400" data-lucide="sparkles"></i>
<span>Tanya Rekomendasi Buku ke AI Penulis</span>
</div>
<!-- Trigger Button -->
<button class="w-14 h-14 rounded-full bg-gradient-to-tr from-arya-plum-900 via-arya-plum-800 to-arya-champagne-500 text-white flex items-center justify-center shadow-2xl hover:scale-105 active:scale-95 transition-transform duration-200 border-2 border-arya-champagne-400/50" onclick="toggleAiModal()">
<i class="w-6 h-6 text-arya-champagne-200" data-lucide="bot"></i>
</button>
<!-- Badge Indicator -->
<span class="absolute -top-1 -right-1 flex h-4 w-4">
<span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-arya-champagne-400 opacity-75"></span>
<span class="relative inline-flex rounded-full h-4 w-4 bg-arya-champagne-500 border border-white text-[9px] font-bold text-arya-plum-950 items-center justify-center">AI</span>
</span>
</div>
</div>
<!-- 2. Floating WhatsApp Button (Kanan Bawah) -->
<div class="fixed bottom-6 right-6 z-50">
<div class="relative group">
<!-- Tooltip -->
<div class="absolute bottom-full right-0 mb-2 hidden sm:group-hover:flex items-center gap-1.5 px-3 py-1.5 rounded-lg bg-stone-900 text-white text-xs whitespace-nowrap shadow-lg border border-stone-700 pointer-events-none">
<i class="w-3.5 h-3.5 text-emerald-400" data-lucide="message-circle"></i>
<span>Chat Tim Penerbit &amp; Manajemen</span>
</div>
<!-- WA Button Link -->
<a class="w-14 h-14 rounded-full bg-[#25D366] hover:bg-[#20ba5a] text-white flex items-center justify-center shadow-2xl hover:scale-105 active:scale-95 transition-transform duration-200 border-2 border-white/60" href="https://wa.me/6281234567890?text=Halo%20Tim%20Manajemen%20Penulis,%20saya%20tertarik%20dengan%20karya%20buku%20terbaru%20dan%20edisi%20bertanda%20tangan." rel="noopener noreferrer" target="_blank">
<!-- SVG Icon WhatsApp -->
<svg class="w-7 h-7 fill-current" viewbox="0 0 24 24">
<path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"></path>
</svg>
</a>
</div>
</div>
<!-- ========================================================================= -->
<!-- ================= MODAL 1: AI ASSISTANT POPUP =========================== -->
<!-- ========================================================================= -->
<div class="fixed inset-0 z-50 hidden bg-black/60 backdrop-blur-sm flex items-center justify-center p-4" id="ai-modal">
<div class="bg-stone-900 border border-stone-700 w-full max-w-lg rounded-2xl shadow-2xl overflow-hidden flex flex-col max-h-[85vh] arya-plum-fade-enter" id="ai-modal-box">
<!-- Header -->
<div class="p-4 bg-gradient-to-r from-arya-plum-950 via-stone-900 to-stone-900 border-b border-stone-800 flex items-center justify-between">
<div class="flex items-center gap-3">
<div class="w-9 h-9 rounded-full bg-arya-champagne-400 text-arya-plum-950 flex items-center justify-center font-bold">
<i class="w-5 h-5" data-lucide="bot"></i>
</div>
<div>
<h4 class="text-sm font-bold text-white flex items-center gap-1.5">
<span>Author AI Literary Companion</span>
<span class="text-[10px] px-1.5 py-0.5 rounded bg-emerald-900/80 text-emerald-300 border border-emerald-500/30">Online</span>
</h4>
<p class="text-[11px] text-stone-400">Rekomendasi buku &amp; tanya-jawab karya sastra</p>
</div>
</div>
<button class="text-stone-400 hover:text-white p-1 rounded-lg hover:bg-stone-800" onclick="toggleAiModal()">
<i class="w-5 h-5" data-lucide="x"></i>
</button>
</div>
<!-- Messages Body -->
<div class="p-4 overflow-y-auto space-y-3 flex-1 text-xs" id="ai-chat-body">
<div class="flex gap-2.5 items-start">
<div class="w-6 h-6 rounded-full bg-arya-plum-800 text-arya-champagne-300 flex items-center justify-center shrink-0 text-[10px] font-bold">AI</div>
<div class="bg-stone-800 text-stone-200 p-3 rounded-2xl rounded-tl-none border border-stone-700 max-w-[85%] leading-relaxed">
          Salam pembaca budiman! Saya asisten virtual kepenulisan Arya Sanjaya. Buku apa yang sedang Anda cari, atau tema bacaan seperti apa yang menyentuh hati Anda saat ini?
        </div>
</div>
<div class="flex flex-wrap gap-1.5 pt-1 pl-8">
<button class="px-2.5 py-1 rounded-full bg-stone-800 hover:bg-stone-700 text-arya-champagne-300 border border-stone-700 text-[11px]" onclick="sendQuickPrompt('Rekomendasikan buku untuk mencari ketenangan batin')">
          “Rekomendasi untuk ketenangan batin”
        </button>
<button class="px-2.5 py-1 rounded-full bg-stone-800 hover:bg-stone-700 text-arya-champagne-300 border border-stone-700 text-[11px]" onclick="sendQuickPrompt('Bagaimana cara memesan buku bertanda tangan?')">
          “Pesan edisi bertanda tangan”
        </button>
</div>
</div>
<!-- Input Footer -->
<div class="p-3 bg-stone-950 border-t border-stone-800">
<form class="flex gap-2" onsubmit="handleAiChat(event)">
<input class="flex-1 px-3.5 py-2 text-xs rounded-xl bg-stone-900 border border-stone-700 text-white focus:outline-none focus:border-arya-champagne-400" id="ai-input" placeholder="Tanyakan seputar sinopsis, tema, atau bab buku..." type="text"/>
<button class="px-4 py-2 bg-arya-champagne-400 hover:bg-arya-champagne-300 text-arya-plum-950 font-bold rounded-xl text-xs transition-colors flex items-center justify-center" type="submit">
<i class="w-3.5 h-3.5" data-lucide="send"></i>
</button>
</form>
</div>
</div>
</div>
<!-- ========================================================================= -->
<!-- ================= MODAL 2: BACA SAMPLE BUKU GRATIS ====================== -->
<!-- ========================================================================= -->
<div class="fixed inset-0 z-50 hidden bg-black/70 backdrop-blur-sm flex items-center justify-center p-4" id="sample-modal">
<div class="bg-stone-900 border border-stone-700 w-full max-w-2xl rounded-2xl shadow-2xl overflow-hidden flex flex-col max-h-[85vh]">
<div class="p-4 bg-stone-950 border-b border-stone-800 flex items-center justify-between">
<div>
<span class="text-[10px] uppercase font-bold tracking-widest text-arya-champagne-400">Bab 1 — Bacaan Cuplikan Gratis</span>
<h4 class="text-base font-arya-plum-serif font-bold text-white" id="sample-book-title">Lembah Keheningan</h4>
</div>
<button class="text-stone-400 hover:text-white p-1 rounded-lg hover:bg-stone-800" onclick="closeSampleModal()">
<i class="w-5 h-5" data-lucide="x"></i>
</button>
</div>
<div class="p-6 overflow-y-auto space-y-4 font-arya-plum-serif text-sm sm:text-base text-stone-200 leading-relaxed bg-[#1b171c]">
<p class="first-letter:text-4xl first-letter:font-bold first-letter:text-arya-champagne-400 first-letter:mr-2 first-letter:float-left">
        Pagi itu kabut turun lebih lambat dari biasanya di lembah selatan. Jarum jam antik di dinding tua berdetak dengan ritme yang seolah mengejek kesibukan kita di layar kaca. Kita telah terbiasa berlari mengejar bayang-bayang berita yang terlupakan sebelum senja tiba.
      </p>
<p>
        “Di mana kau simpan keheninganmu saat seluruh kota ini menuntutmu untuk berteriak?” tanya pria tua berjaket usang itu sambil menuang teh melati ke cangkir keramik yang retak seribu.
      </p>
<p>
        Aku terdiam. Suara mesin kereta di kejauhan meredup, menyisakan derak dahan pinus yang bergesekan ditiup angin lembah. Kadang, kedamaian bukanlah tempat yang kau tuju di ujung peta, melainkan ruang yang kau beri izin untuk beristirahat di dalam dadamu sendiri...
      </p>
<div class="p-4 bg-arya-plum-950 border border-arya-champagne-500/30 rounded-xl my-4 text-xs font-arya-plum-sans text-stone-300">
<span class="font-bold text-arya-champagne-300 block mb-1">Nikmati kelanjutan kisah dan renungan lengkapnya:</span>
        Dapatkan edisi lengkap 280 halaman dengan bonus bookmark eksklusif dan tanda tangan penulis.
      </div>
</div>
<div class="p-4 bg-stone-950 border-t border-stone-800 flex items-center justify-between">
<span class="text-xs text-stone-400 font-arya-plum-sans">Suka dengan bab ini?</span>
<button class="px-5 py-2 rounded-full bg-arya-champagne-400 hover:bg-arya-champagne-300 text-arya-plum-950 font-bold text-xs font-arya-plum-sans tracking-wide" onclick="orderBookDirect('Buku dari Sample Reader')">
        Beli Buku Lengkap Sekarang
      </button>
</div>
</div>
</div>
<!-- ========================================================================= -->
<!-- ================= JAVASCRIPT LOGIC & INTERACTIONS ======================= -->
<!-- ========================================================================= -->
<script>
    // Initialize Lucide Icons
    lucide.createIcons();

    // 1. ACCORDION FAQ LOGIC
    function toggleAccordion(button) {
      const parent = button.parentElement;
      const content = parent.querySelector('.arya-plum-accordion-content');
      const icon = button.querySelector('svg') || button.querySelector('i');
      
      const isOpen = content.classList.contains('open');

      // Close all in this container for clean UX
      const container = document.getElementById('accordion-container');
      const allContents = container.querySelectorAll('.arya-plum-accordion-content');
      const allIcons = container.querySelectorAll('svg, i');
      
      allContents.forEach(c => c.classList.remove('open'));
      allIcons.forEach(i => i.style.transform = 'rotate(0deg)');

      if (!isOpen) {
        content.classList.add('open');
        if (icon) icon.style.transform = 'rotate(180deg)';
      }
    }

    // 2. MOBILE MENU TOGGLE
    function toggleMobileMenu(menuId) {
      const menu = document.getElementById(menuId);
      if (menu) {
        menu.classList.toggle('hidden');
      }
    }

    // 3. SAMPLE READER MODAL
    function openSampleModal(bookTitle) {
      document.getElementById('sample-book-title').innerText = bookTitle;
      const modal = document.getElementById('sample-modal');
      modal.classList.remove('hidden');
    }
    function closeSampleModal() {
      document.getElementById('sample-modal').classList.add('hidden');
    }

    // 4. AI ASSISTANT MODAL & CHAT INTERACTION
    function toggleAiModal() {
      const modal = document.getElementById('ai-modal');
      const box = document.getElementById('ai-modal-box');
      if (modal.classList.contains('hidden')) {
        modal.classList.remove('hidden');
        setTimeout(() => box.classList.add('arya-plum-fade-enter-active'), 10);
      } else {
        box.classList.remove('arya-plum-fade-enter-active');
        setTimeout(() => modal.classList.add('hidden'), 200);
      }
    }

    function sendQuickPrompt(promptText) {
      document.getElementById('ai-input').value = promptText;
      handleAiChat(new Event('submit'));
    }

    function handleAiChat(e) {
      if (e) e.preventDefault();
      const input = document.getElementById('ai-input');
      const query = input.value.trim();
      if (!query) return;

      const chatBody = document.getElementById('ai-chat-body');

      // User Bubble
      const userBubble = document.createElement('div');
      userBubble.className = 'flex justify-end';
      userBubble.innerHTML = `
        <div class="bg-arya-champagne-400 text-arya-plum-950 font-medium p-3 rounded-2xl rounded-tr-none max-w-[80%] leading-relaxed shadow-sm">
          ${escapeHtml(query)}
        </div>
      `;
      chatBody.appendChild(userBubble);
      input.value = '';
      chatBody.scrollTop = chatBody.scrollHeight;

      // Simulated Intelligent Author AI Response
      setTimeout(() => {
        let reply = "";
        const lower = query.toLowerCase();
        if (lower.includes('ketenangan') || lower.includes('batin') || lower.includes('hening')) {
          reply = "Untuk tema ketenangan batin, karya <strong>&ldquo;Lembah Keheningan&rdquo;</strong> adalah pilihan terbaik Arya Sanjaya. Buku ini berisi renungan dan panduan menyaring distraksi agar Anda dapat berdamai dengan diri sendiri.";
        } else if (lower.includes('ttd') || lower.includes('tanda tangan') || lower.includes('pesan')) {
          reply = "Pemesanan edisi tanda tangan resmi dilayani melalui WhatsApp manajemen penerbit Arya Sanjaya. Anda juga dapat meminta dedikasi nama khusus pada halaman pembuka!";
        } else if (lower.includes('novel') || lower.includes('fiksi') || lower.includes('cerita')) {
          reply = "Jika menyukai narasi mendalam yang memikat, baca novel pemenang penghargaan <strong>&ldquo;Arus di Balik Kabut&rdquo;</strong> yang berlatar Kyoto abad ke-20.";
        } else {
          reply = `Terima kasih atas pertanyaannya. Mengenai &ldquo;${escapeHtml(query)}&rdquo;, karya-karya Arya Sanjaya menekankan kedalaman makna dan ketahanan jiwa. Anda dapat membaca Bab 1 secara cuma-cuma melalui tombol 'Baca Sample Gratis' di halaman!`;
        }

        const aiBubble = document.createElement('div');
        aiBubble.className = 'flex gap-2.5 items-start';
        aiBubble.innerHTML = `
          <div class="w-6 h-6 rounded-full bg-arya-plum-800 text-arya-champagne-300 flex items-center justify-center shrink-0 text-[10px] font-bold">AI</div>
          <div class="bg-stone-800 text-stone-200 p-3 rounded-2xl rounded-tl-none border border-stone-700 max-w-[85%] leading-relaxed">
            ${reply}
          </div>
        `;
        chatBody.appendChild(aiBubble);
        chatBody.scrollTop = chatBody.scrollHeight;
      }, 500);
    }

    // 5. DIRECT ORDER HANDLER (WhatsApp Routing)
    function orderBookDirect(bookTitle) {
      const message = encodeURIComponent(`Halo Tim Penerbit Arya Sanjaya, saya ingin memesan buku: "${bookTitle}". Mohon informasi nomor rekening dan konfirmasi ketersediaan.`);
      window.open(`https://wa.me/6281234567890?text=${message}`, '_blank');
    }

    // 6. NEWSLETTER NOTIFICATION
    function handleNewsletter(e) {
      e.preventDefault();
      alert("Terima kasih! Anda telah terdaftar dalam warta surat bulanan sastra Arya Sanjaya.");
      e.target.reset();
    }

    function escapeHtml(text) {
      return text
        .replace(/&/g, "&amp;")
        .replace(/</g, "&lt;")
        .replace(/>/g, "&gt;")
        .replace(/"/g, "&quot;")
        .replace(/'/g, "&#039;");
    }
  </script>
</body></html>
