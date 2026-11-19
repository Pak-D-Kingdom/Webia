<!DOCTYPE html>

<html class="scroll-smooth" lang="id"><head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>Arya Sanjaya — Sastra &amp; Pemikiran | Penulis &amp; Novelis</title>
<!-- Tailwind CSS CDN -->
<!-- Google Fonts: Cormorant Garamond, Playfair Display, Inter -->
<link href="https://fonts.googleapis.com" rel="preconnect"/>
<link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect"/>
<link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,500;0,600;0,700;1,400;1,500;1,600&amp;family=Inter:wght@300;400;500;600;700&amp;family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;1,400&amp;display=swap" rel="stylesheet"/>
<!-- Lucide Icons -->
<script src="https://unpkg.com/lucide@latest"></script>

@vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="antialiased selection:bg-arya-ruby-100 selection:text-arya-ruby-800 arya-ruby-page">
<!-- ==================== HEADER / NAVBAR MINIMALIS ==================== -->
<header class="sticky top-0 z-40 arya-ruby-glass-light border-b border-arya-canvas-border transition-all">
<div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
<div class="flex items-center justify-between h-20">
<!-- Logo Wordmark / Monogram -->
<a class="group flex items-baseline gap-2.5" href="#beranda">
<span class="font-arya-ruby-editorial text-2xl sm:text-3xl font-bold tracking-tight text-arya-charcoal-950 group-hover:text-arya-ruby-800 transition-colors">Arya Sanjaya</span>
<span class="w-1.5 h-1.5 rounded-full bg-arya-ruby-750"></span>
<span class="hidden sm:inline text-[11px] uppercase tracking-[0.2em] text-stone-500 font-medium pl-1">Sastra &amp; Pemikiran</span>
</a>
<!-- Desktop Navigation Links -->
<nav class="hidden md:flex items-center space-x-8 text-xs uppercase tracking-[0.18em] font-medium text-stone-600">
<a class="text-arya-charcoal-950 font-semibold hover:text-arya-ruby-800 transition-colors relative py-1 after:absolute after:bottom-0 after:left-0 after:w-full after:h-px after:bg-arya-ruby-750" href="#beranda">Beranda</a>
<a class="hover:text-arya-ruby-800 transition-colors" href="#tentang">Tentang Penulis</a>
<a class="hover:text-arya-ruby-800 transition-colors" href="#katalog">Katalog Buku</a>
<a class="hover:text-arya-ruby-800 transition-colors" href="#faq">FAQ</a>
<a class="hover:text-arya-ruby-800 transition-colors" href="#kontak">Kontak</a>
</nav>
<!-- Right Action Button -->
<div class="hidden md:flex items-center">
<a class="px-5 py-2.5 bg-arya-ruby-800 hover:bg-arya-ruby-900 text-white transition-all text-xs uppercase tracking-[0.2em] font-medium shadow-sm hover:shadow" href="#katalog">
            Pesan Buku TTD
          </a>
</div>
<!-- Mobile Menu Toggle Button -->
<button class="md:hidden p-2 text-arya-charcoal-950 hover:text-arya-ruby-800 focus:outline-none" onclick="toggleMobileMenu('mobile-menu')">
<i class="w-5 h-5" data-lucide="menu"></i>
</button>
</div>
</div>
<!-- Mobile Dropdown Navigation -->
<div class="hidden md:hidden bg-arya-canvas border-b border-arya-canvas-border px-6 py-5 space-y-3 text-xs uppercase tracking-[0.18em]" id="mobile-menu">
<a class="block py-1.5 text-arya-ruby-800 font-bold" href="#beranda" onclick="toggleMobileMenu('mobile-menu')">Beranda</a>
<a class="block py-1.5 text-stone-700 hover:text-arya-ruby-800" href="#tentang" onclick="toggleMobileMenu('mobile-menu')">Tentang Penulis</a>
<a class="block py-1.5 text-stone-700 hover:text-arya-ruby-800" href="#katalog" onclick="toggleMobileMenu('mobile-menu')">Katalog Buku</a>
<a class="block py-1.5 text-stone-700 hover:text-arya-ruby-800" href="#faq" onclick="toggleMobileMenu('mobile-menu')">FAQ</a>
<a class="block py-1.5 text-stone-700 hover:text-arya-ruby-800" href="#kontak" onclick="toggleMobileMenu('mobile-menu')">Kontak</a>
<div class="pt-2">
<a class="block text-center py-2.5 bg-arya-ruby-800 text-white font-medium tracking-[0.2em]" href="#katalog" onclick="toggleMobileMenu('mobile-menu')">
          Pesan Buku TTD
        </a>
</div>
</div>
</header>
<!-- ==================== HERO SECTION (MINIMALIST RUBY LUXE) ==================== -->
<section class="pt-16 pb-24 md:pt-24 md:pb-36 relative" id="beranda">
<div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
<div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-16 items-center">
<!-- Left Column: Copywriting & Actions -->
<div class="lg:col-span-7 space-y-8">
<div class="flex items-center gap-3">
<span class="h-px w-8 bg-arya-ruby-750"></span>
<span class="text-xs uppercase tracking-[0.25em] font-semibold text-arya-ruby-800">Karya Terbaru &amp; Refleksi Humaniora</span>
</div>
<div class="space-y-4">
<h1 class="font-arya-ruby-editorial text-4xl sm:text-5xl lg:text-6xl text-arya-charcoal-950 font-normal leading-[1.12] tracking-tight">
              Keheningan yang Menuliskan Rahasia Jiwa.
            </h1>
<blockquote class="text-stone-500 font-arya-ruby-editorial italic text-xl sm:text-2xl border-l-2 border-arya-ruby-750 pl-4 py-1">
              “Kata-kata adalah kompas bagi jiwa yang tersesat di tengah riuhnya dunia modern.”
            </blockquote>
</div>
<p class="text-stone-600 text-base sm:text-lg leading-relaxed font-light max-w-xl">
            Selamat datang di arsip karya dan pemikiran <strong class="text-arya-charcoal-950 font-medium">Arya Sanjaya</strong>. Penulis esai dan novelis kontemporer yang mengeksplorasi batas tipis antara psikologi kepemimpinan, eksistensi manusia, dan ketahanan batin.
          </p>
<!-- Buttons CTA -->
<div class="flex flex-wrap items-center gap-4 pt-2">
<a class="px-8 py-3.5 bg-arya-ruby-800 hover:bg-arya-ruby-900 text-white font-medium text-xs uppercase tracking-[0.2em] transition-colors shadow-sm" href="#katalog">
              Pesan Edisi Khusus
            </a>
<button class="px-7 py-3.5 border border-stone-300 hover:border-arya-ruby-800 hover:text-arya-ruby-800 text-arya-charcoal-950 font-medium text-xs uppercase tracking-[0.2em] transition-colors bg-white/60" onclick="openSampleModal('Lembah Keheningan')">
              Baca Bab 1 (Sample)
            </button>
</div>
<!-- Social Proof Minimalis -->
<div class="pt-6 border-t border-arya-canvas-border flex flex-wrap items-center gap-8 text-xs text-stone-500">
<div class="flex items-center gap-2">
<span class="font-semibold text-arya-charcoal-950">4.9 / 5.0</span>
<span>(3.8k Goodreads)</span>
</div>
<span class="w-1 h-1 rounded-full bg-stone-300 hidden sm:inline"></span>
<div class="flex items-center gap-2">
<i class="w-4 h-4 text-arya-ruby-750" data-lucide="award"></i>
<span>Peraih Kusala Sastra Khatulistiwa 2023</span>
</div>
</div>
</div>
<!-- Right Column: Visual Author & Featured Book Overlay -->
<div class="lg:col-span-5 relative">
<div class="relative max-w-sm mx-auto">
<!-- Author Monochrome Portrait Frame -->
<div class="w-full aspect-[3/4] bg-stone-100 overflow-hidden border border-arya-canvas-border shadow-sm">
<img alt="Arya Sanjaya - Penulis" class="w-full h-full object-cover filter grayscale contrast-110" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDcXgR3MQ5Pxl7Bun2-Xp0zluI1glRRduB-GVrkTC7bOviSCiAzQF0tlZXxOGWEmkz5MVHZaIq8enRJM4zy8tPKZ7TPakOnBe1nx8EtfRHrFcQJ4NLZuXQBMLz1zqZ-hI8vbjcK1PX1tro93eK5NFqZDFSsxrRfZ5cfoC30-qhgbPtmG4GGG48rqqCizrs4zJWSieUSm3j3EbI48TCvvQKnnLPg-oNRF3HAYhvMpS0"/>
</div>
<!-- Floating Book Mockup with Ruby Luxe Accent -->
<div class="absolute -bottom-8 -left-6 sm:-left-10 bg-white border border-arya-canvas-border p-5 shadow-xl max-w-[250px]">
<div class="flex items-center justify-between text-[10px] uppercase tracking-widest text-arya-ruby-800 font-bold mb-1.5">
<span>Rilis Terbaru 2024</span>
<span class="w-2 h-2 rounded-full bg-arya-ruby-750"></span>
</div>
<h4 class="font-arya-ruby-editorial text-lg font-bold text-arya-charcoal-950 leading-tight">Lembah Keheningan</h4>
<p class="text-[11px] text-stone-500 mt-1 line-clamp-2">Menemukan kedamaian dan makna di era kegaduhan informasi.</p>
<div class="mt-3 pt-2.5 border-t border-stone-100 flex items-center justify-between">
<span class="text-xs font-bold text-arya-charcoal-950">Rp 175.000</span>
<button class="text-[10px] uppercase font-bold text-arya-ruby-800 hover:text-arya-ruby-900 hover:underline tracking-wider" onclick="orderBookDirect('Lembah Keheningan - Edisi Bertanda Tangan')">
                  Pesan TTD →
                </button>
</div>
</div>
</div>
</div>
</div>
</div>
</section>
<!-- ==================== PROFIL & DEDIKASI PENULIS ==================== -->
<section class="py-24 bg-arya-canvas-subtle border-t border-b border-arya-canvas-border" id="tentang">
<div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
<div class="space-y-6 text-center max-w-2xl mx-auto">
<span class="text-xs uppercase tracking-[0.25em] text-arya-ruby-800 font-semibold">Mengenal Sosok Penulis</span>
<h2 class="font-arya-ruby-editorial text-3xl sm:text-4xl lg:text-5xl text-arya-charcoal-950 font-normal">
          Dedikasi 15 Tahun Merangkai Narasi yang Menggugah Nurani
        </h2>
<blockquote class="text-stone-500 font-arya-ruby-editorial italic text-lg leading-relaxed">
          “Menulis bukan sekadar pekerjaan, melainkan ritus penyelaman ke dasar kalbu manusia.”
        </blockquote>
</div>
<div class="grid grid-cols-1 md:grid-cols-2 gap-10 lg:gap-14 mt-12 items-center">
<div class="space-y-4 text-stone-600 text-sm sm:text-base leading-relaxed font-light">
<p>
            Arya Sanjaya memulai perjalanan kepenulisannya sejak menjabat sebagai jurnalis investigasi sastra di Kyoto dan Jakarta. Memadukan kedalaman filsafat Timur dengan ketajaman analisis modern, karya-karyanya sering dipuji kritikus karena berhasil menjembatani seni berbahasa tinggi dengan keterbacaan yang mengalir.
          </p>
<p>
            Karya debutnya <em class="text-arya-charcoal-950 font-arya-ruby-serif italic">"Arus di Balik Kabut"</em> telah diterjemahkan ke dalam 6 bahasa internasional. Saat ini ia aktif memimpin sanggar inkubasi penulisan kreatif serta menjadi pembicara kunci di Frankfurt Book Fair dan Ubud Writers Festival.
          </p>
<div class="pt-2">
<a class="inline-flex items-center gap-2 text-xs uppercase tracking-widest font-semibold text-arya-ruby-800 hover:text-arya-ruby-950 transition-colors border-b border-arya-ruby-800 pb-0.5" href="#kontak">
<span>Undang Arya untuk Keynote / Sesi Bedah Buku</span>
<i class="w-3.5 h-3.5" data-lucide="arrow-right"></i>
</a>
</div>
</div>
<!-- 3 Minimalist Metric Cards -->
<div class="grid grid-cols-1 sm:grid-cols-3 gap-4 text-center">
<div class="p-6 border border-arya-canvas-border bg-white shadow-sm flex flex-col justify-center">
<span class="block font-arya-ruby-editorial text-3xl sm:text-4xl font-normal text-arya-ruby-850">14+</span>
<h3 class="text-[11px] uppercase tracking-widest font-semibold text-arya-charcoal-950 mt-2">Negara</h3>
<p class="text-[11px] text-stone-500 mt-0.5">Terdistribusi</p>
</div>
<div class="p-6 border border-arya-canvas-border bg-white shadow-sm flex flex-col justify-center">
<span class="block font-arya-ruby-editorial text-3xl sm:text-4xl font-normal text-arya-ruby-850">500K+</span>
<h3 class="text-[11px] uppercase tracking-widest font-semibold text-arya-charcoal-950 mt-2">Eksemplar</h3>
<p class="text-[11px] text-stone-500 mt-0.5">Buku Terjual</p>
</div>
<div class="p-6 border border-arya-canvas-border bg-white shadow-sm flex flex-col justify-center">
<span class="block font-arya-ruby-editorial text-3xl sm:text-4xl font-normal text-arya-ruby-850">8 Judul</span>
<h3 class="text-[11px] uppercase tracking-widest font-semibold text-arya-charcoal-950 mt-2">Karya Terbit</h3>
<p class="text-[11px] text-stone-500 mt-0.5">Grafika Utama</p>
</div>
</div>
</div>
</div>
</section>
<!-- ==================== KATALOG BUKU UNGGULAN ==================== -->
<section class="py-24" id="katalog">
<div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
<div class="flex flex-col md:flex-row md:items-end justify-between mb-16 pb-4 border-b border-arya-canvas-border gap-4">
<div>
<span class="text-xs uppercase tracking-[0.25em] text-arya-ruby-800 font-semibold">Bibliografi &amp; Katalog Buku</span>
<h2 class="font-arya-ruby-editorial text-3xl sm:text-4xl lg:text-5xl text-arya-charcoal-950 mt-1 font-normal">Koleksi Karya Terpilih</h2>
</div>
<p class="text-xs text-stone-500 uppercase tracking-widest max-w-sm">
          Tersedia Hardcover Edisi Kolektor (TTD asli), Softcover nasional, dan E-Book digital.
        </p>
</div>
<!-- Grid 3 Buku Unggulan -->
<div class="grid grid-cols-1 md:grid-cols-3 gap-10">
<!-- Buku 1 -->
<div class="space-y-4 flex flex-col justify-between">
<div>
<div class="w-full aspect-[3/4] bg-stone-100 p-6 flex items-center justify-center border border-arya-canvas-border hover:border-arya-ruby-800 transition-colors">
<div class="w-36 h-52 bg-arya-ruby-900 text-stone-100 p-4 flex flex-col justify-between arya-ruby-book-shadow border border-arya-ruby-750">
<span class="text-[8px] uppercase tracking-widest text-arya-ruby-300 font-semibold">Buku Unggulan</span>
<div>
<h4 class="font-arya-ruby-editorial text-base font-bold leading-tight">Lembah Keheningan</h4>
<p class="text-[9px] text-arya-ruby-200 mt-1">Arya Sanjaya</p>
</div>
<div class="text-[8px] text-arya-ruby-300 text-right uppercase tracking-wider">Edisi TTD</div>
</div>
</div>
<div class="flex justify-between items-baseline mt-4">
<span class="text-xs uppercase tracking-wider text-arya-ruby-800 font-medium">Non-Fiksi / Refleksi</span>
<span class="text-xs font-bold text-arya-charcoal-950">Rp 175.000</span>
</div>
<h3 class="font-arya-ruby-editorial text-2xl font-bold text-arya-charcoal-950 mt-1">Lembah Keheningan</h3>
<p class="text-xs text-stone-600 font-light leading-relaxed mt-2">
              Panduan kontemplatif dalam menyusun kembali batasan batin dan fokus pikiran saat gelombang kebisingan informasi modern menerpa keseharian kita.
            </p>
</div>
<div class="flex items-center gap-3 pt-3">
<button class="flex-1 py-2.5 text-xs uppercase tracking-widest bg-arya-ruby-800 hover:bg-arya-ruby-900 text-white transition-colors font-medium text-center" onclick="orderBookDirect('Lembah Keheningan - Edisi Bertanda Tangan')">
              Pesan Sekarang
            </button>
<button class="p-2.5 border border-arya-canvas-border hover:border-arya-ruby-800 text-stone-700 hover:text-arya-ruby-800 transition-colors" onclick="openSampleModal('Lembah Keheningan')" title="Baca Sample Bab 1">
<i class="w-4 h-4" data-lucide="eye"></i>
</button>
</div>
</div>
<!-- Buku 2 -->
<div class="space-y-4 flex flex-col justify-between">
<div>
<div class="w-full aspect-[3/4] bg-stone-100 p-6 flex items-center justify-center border border-arya-canvas-border hover:border-arya-ruby-800 transition-colors">
<div class="w-36 h-52 bg-arya-charcoal-950 text-stone-100 p-4 flex flex-col justify-between arya-ruby-book-shadow-dark border border-stone-700">
<span class="text-[8px] uppercase tracking-widest text-stone-400 font-semibold">Masterpiece</span>
<div>
<h4 class="font-arya-ruby-editorial text-base font-bold leading-tight">Arus di Balik Kabut</h4>
<p class="text-[9px] text-stone-400 mt-1">Arya Sanjaya</p>
</div>
<div class="text-[8px] text-stone-400 text-right uppercase tracking-wider">Award Winner</div>
</div>
</div>
<div class="flex justify-between items-baseline mt-4">
<span class="text-xs uppercase tracking-wider text-arya-ruby-800 font-medium">Fiksi Filosofis</span>
<span class="text-xs font-bold text-arya-charcoal-950">Rp 149.000</span>
</div>
<h3 class="font-arya-ruby-editorial text-2xl font-bold text-arya-charcoal-950 mt-1">Arus di Balik Kabut</h3>
<p class="text-xs text-stone-600 font-light leading-relaxed mt-2">
              Kisah misteri perjumpaan dua pengembara di persimpangan Kyoto abad ke-20 yang menguji kesetiaan, rahasia keluarga, dan takdir keabadian.
            </p>
</div>
<div class="flex items-center gap-3 pt-3">
<button class="flex-1 py-2.5 text-xs uppercase tracking-widest bg-arya-ruby-800 hover:bg-arya-ruby-900 text-white transition-colors font-medium text-center" onclick="orderBookDirect('Arus di Balik Kabut')">
              Pesan Sekarang
            </button>
<button class="p-2.5 border border-arya-canvas-border hover:border-arya-ruby-800 text-stone-700 hover:text-arya-ruby-800 transition-colors" onclick="openSampleModal('Arus di Balik Kabut')" title="Baca Sample Bab 1">
<i class="w-4 h-4" data-lucide="eye"></i>
</button>
</div>
</div>
<!-- Buku 3 -->
<div class="space-y-4 flex flex-col justify-between">
<div>
<div class="w-full aspect-[3/4] bg-stone-100 p-6 flex items-center justify-center border border-arya-canvas-border hover:border-arya-ruby-800 transition-colors">
<div class="w-36 h-52 bg-[#f4f1ea] text-arya-charcoal-950 p-4 flex flex-col justify-between arya-ruby-book-shadow-dark border border-stone-300">
<span class="text-[8px] uppercase tracking-widest text-arya-ruby-800 font-semibold">Kumpulan Esai</span>
<div>
<h4 class="font-arya-ruby-editorial text-base font-bold leading-tight">Fragmen Jiwa Merdeka</h4>
<p class="text-[9px] text-stone-500 mt-1">Arya Sanjaya</p>
</div>
<div class="text-[8px] text-stone-600 text-right uppercase tracking-wider">Edisi Refleksi</div>
</div>
</div>
<div class="flex justify-between items-baseline mt-4">
<span class="text-xs uppercase tracking-wider text-arya-ruby-800 font-medium">Esai &amp; Humaniora</span>
<span class="text-xs font-bold text-arya-charcoal-950">Rp 135.000</span>
</div>
<h3 class="font-arya-ruby-editorial text-2xl font-bold text-arya-charcoal-950 mt-1">Fragmen Jiwa Merdeka</h3>
<p class="text-xs text-stone-600 font-light leading-relaxed mt-2">
              Antologi catatan pinggir tentang perlawanan halus terhadap kejenuhan rutinitas birokrasi dan seni membangun ruang hening pribadi.
            </p>
</div>
<div class="flex items-center gap-3 pt-3">
<button class="flex-1 py-2.5 text-xs uppercase tracking-widest bg-arya-ruby-800 hover:bg-arya-ruby-900 text-white transition-colors font-medium text-center" onclick="orderBookDirect('Fragmen Jiwa Merdeka')">
              Pesan Sekarang
            </button>
<button class="p-2.5 border border-arya-canvas-border hover:border-arya-ruby-800 text-stone-700 hover:text-arya-ruby-800 transition-colors" onclick="openSampleModal('Fragmen Jiwa Merdeka')" title="Baca Sample Bab 1">
<i class="w-4 h-4" data-lucide="eye"></i>
</button>
</div>
</div>
</div>
</div>
</section>
<!-- ==================== FAQ ACCORDION (MINIMALIST) ==================== -->
<section class="py-24 bg-arya-canvas-subtle border-t border-arya-canvas-border" id="faq">
<div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
<div class="text-center mb-14">
<span class="text-xs uppercase tracking-[0.25em] text-arya-ruby-800 font-semibold">Pusat Informasi &amp; Jawaban</span>
<h2 class="font-arya-ruby-editorial text-3xl sm:text-4xl text-arya-charcoal-950 mt-1 font-normal">Pertanyaan yang Kerap Diajukan</h2>
<p class="text-stone-500 text-xs sm:text-sm mt-2 max-w-lg mx-auto">
          Informasi mengenai pemesanan buku bertanda tangan, tur sastra, pengiriman internasional, dan sesi seminar.
        </p>
</div>
<!-- Minimal Accordion Container -->
<div class="divide-y divide-arya-canvas-border border-t border-b border-arya-canvas-border">
<!-- Item 1 -->
<div class="py-5">
<button class="w-full py-2 flex items-center justify-between text-left focus:outline-none group" onclick="toggleAccordion(this)">
<span class="font-arya-ruby-editorial text-lg sm:text-xl text-arya-charcoal-950 font-medium group-hover:text-arya-ruby-800 transition-colors">
              Bagaimana cara memesan buku edisi khusus bertanda tangan (Signature Edition)?
            </span>
<span class="text-arya-ruby-800 transition-transform duration-300 ml-4 shrink-0">
<i class="w-5 h-5" data-lucide="plus"></i>
</span>
</button>
<div class="arya-ruby-accordion-content pt-3 pb-2 text-xs sm:text-sm text-stone-600 leading-relaxed font-light">
            Pemesanan buku bertanda tangan dapat dilakukan langsung melalui tautan WhatsApp tim manajemen penerbit. Setiap cetakan edisi tanda tangan hanya tersedia dalam kuota terbatas (maksimal 300 eksemplar per kuartal) dan disertai sertifikat keaslian bertempel segel lilin khusus.
          </div>
</div>
<!-- Item 2 -->
<div class="py-5">
<button class="w-full py-2 flex items-center justify-between text-left focus:outline-none group" onclick="toggleAccordion(this)">
<span class="font-arya-ruby-editorial text-lg sm:text-xl text-arya-charcoal-950 font-medium group-hover:text-arya-ruby-800 transition-colors">
              Kapan jadwal tur temu pembaca (Book Tour) dan perilisan karya berikutnya?
            </span>
<span class="text-arya-ruby-800 transition-transform duration-300 ml-4 shrink-0">
<i class="w-5 h-5" data-lucide="plus"></i>
</span>
</button>
<div class="arya-ruby-accordion-content pt-3 pb-2 text-xs sm:text-sm text-stone-600 leading-relaxed font-light">
            Karya berikutnya berjudul “Matahari di Ujung Aksara” dijadwalkan terbit pada kuartal akhir tahun ini. Tur pembacaan buku (Reading Session) akan diselenggarakan di Jakarta, Yogyakarta, Bandung, dan Denpasar. Informasi tiket dan jadwal resmi diumumkan melalui newsletter editorial.
          </div>
</div>
<!-- Item 3 -->
<div class="py-5">
<button class="w-full py-2 flex items-center justify-between text-left focus:outline-none group" onclick="toggleAccordion(this)">
<span class="font-arya-ruby-editorial text-lg sm:text-xl text-arya-charcoal-950 font-medium group-hover:text-arya-ruby-800 transition-colors">
              Apakah tersedia pengiriman buku ke luar negeri serta format digital (E-Book)?
            </span>
<span class="text-arya-ruby-800 transition-transform duration-300 ml-4 shrink-0">
<i class="w-5 h-5" data-lucide="plus"></i>
</span>
</button>
<div class="arya-ruby-accordion-content pt-3 pb-2 text-xs sm:text-sm text-stone-600 leading-relaxed font-light">
            Ya, pengiriman fisik ke Malaysia, Singapura, dan Australia dilayani melalui pos kilat tercatat (5–8 hari kerja). Format digital resmi dapat diakses melalui Google Play Books, Amazon Kindle, dan Apple Books secara global.
          </div>
</div>
<!-- Item 4 -->
<div class="py-5">
<button class="w-full py-2 flex items-center justify-between text-left focus:outline-none group" onclick="toggleAccordion(this)">
<span class="font-arya-ruby-editorial text-lg sm:text-xl text-arya-charcoal-950 font-medium group-hover:text-arya-ruby-800 transition-colors">
              Bagaimana prosedur mengundang Arya Sanjaya sebagai pembicara atau pemateri seminar?
            </span>
<span class="text-arya-ruby-800 transition-transform duration-300 ml-4 shrink-0">
<i class="w-5 h-5" data-lucide="plus"></i>
</span>
</button>
<div class="arya-ruby-accordion-content pt-3 pb-2 text-xs sm:text-sm text-stone-600 leading-relaxed font-light">
            Untuk permohonan kuliah umum, festival sastra, atau pelatihan penulisan korporat, silakan kirimkan proposal atau pesan tertulis minimal 4 pekan sebelum acara berlangsung melalui surel manajemen atau formulir kontak resmi di bawah.
          </div>
</div>
</div>
</div>
</section>
<!-- ==================== FOOTER MINIMALIS ==================== -->
<footer class="py-16 bg-white border-t border-arya-canvas-border text-stone-600 text-xs" id="kontak">
<div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
<div class="grid grid-cols-1 md:grid-cols-4 gap-10 pb-12 border-b border-arya-canvas-border">
<!-- Col 1: Profil Brand -->
<div class="space-y-4">
<div class="flex items-baseline gap-2">
<span class="font-arya-ruby-editorial text-2xl text-arya-charcoal-950 font-bold">Arya Sanjaya</span>
<span class="w-1.5 h-1.5 rounded-full bg-arya-ruby-750"></span>
</div>
<p class="text-xs text-stone-500 leading-relaxed font-light">
            Penulis, esais, dan pembicara publik. Didedikasikan untuk melestarikan tradisi sastra bernas dan literasi kritis bagi generasi masa kini.
          </p>
<div class="flex items-center space-x-3 text-stone-600 pt-1">
<a class="p-2 border border-arya-canvas-border hover:border-arya-ruby-800 hover:text-arya-ruby-800 transition-colors" href="#" title="Twitter"><i class="w-3.5 h-3.5" data-lucide="twitter"></i></a>
<a class="p-2 border border-arya-canvas-border hover:border-arya-ruby-800 hover:text-arya-ruby-800 transition-colors" href="#" title="Instagram"><i class="w-3.5 h-3.5" data-lucide="instagram"></i></a>
<a class="p-2 border border-arya-canvas-border hover:border-arya-ruby-800 hover:text-arya-ruby-800 transition-colors" href="#" title="Linkedin"><i class="w-3.5 h-3.5" data-lucide="linkedin"></i></a>
<a class="p-2 border border-arya-canvas-border hover:border-arya-ruby-800 hover:text-arya-ruby-800 transition-colors" href="#" title="Youtube"><i class="w-3.5 h-3.5" data-lucide="youtube"></i></a>
</div>
</div>
<!-- Col 2: Navigasi Cepat -->
<div class="space-y-3">
<h4 class="text-xs uppercase tracking-[0.2em] font-semibold text-arya-charcoal-950">Navigasi Cepat</h4>
<ul class="space-y-2 text-xs">
<li><a class="hover:text-arya-ruby-800 transition-colors" href="#beranda">Beranda Utama</a></li>
<li><a class="hover:text-arya-ruby-800 transition-colors" href="#tentang">Tentang Penulis</a></li>
<li><a class="hover:text-arya-ruby-800 transition-colors" href="#katalog">Katalog Buku Pilihan</a></li>
<li><a class="hover:text-arya-ruby-800 transition-colors" href="#faq">Pertanyaan &amp; Bantuan</a></li>
</ul>
</div>
<!-- Col 3: Penerbit & Mitra -->
<div class="space-y-3">
<h4 class="text-xs uppercase tracking-[0.2em] font-semibold text-arya-charcoal-950">Penerbit &amp; Mitra</h4>
<ul class="space-y-2 text-xs text-stone-500 font-light">
<li>Penerbit Grafika Utama Nusantara</li>
<li>Aethelgard Literary Agency, London</li>
<li>Distributor Gramedia &amp; Periplus</li>
<li>Klub Buku Lingkar Aksara</li>
</ul>
</div>
<!-- Col 4: Newsletter Editorial "Warta Sastra" -->
<div class="space-y-3">
<h4 class="text-xs uppercase tracking-[0.2em] font-semibold text-arya-charcoal-950">Warta Sastra (Newsletter)</h4>
<p class="text-xs text-stone-500 font-light leading-relaxed">
            Dapatkan esai refleksi mingguan dan rilis awal buku baru langsung ke surel Anda.
          </p>
<form class="space-y-2" onsubmit="handleNewsletter(event)">
<div class="flex">
<input class="w-full px-3 py-2 text-xs bg-arya-canvas border border-stone-300 text-arya-charcoal-950 focus:outline-none focus:border-arya-ruby-800" placeholder="Alamat email Anda..." required="" type="email"/>
<button class="px-4 py-2 text-xs uppercase tracking-widest font-semibold bg-arya-ruby-800 hover:bg-arya-ruby-900 text-white transition-colors" type="submit">
                Kirim
              </button>
</div>
</form>
</div>
</div>
<!-- Copyright & Legal -->
<div class="pt-8 flex flex-col sm:flex-row items-center justify-between text-xs text-stone-500 gap-4">
<p>© 2024 Arya Sanjaya. Seluruh Hak Cipta Dilindungi.</p>
<div class="flex space-x-6 text-stone-600">
<a class="hover:text-arya-ruby-800 transition-colors" href="#">Kebijakan Privasi</a>
<a class="hover:text-arya-ruby-800 transition-colors" href="#">Ketentuan Layanan</a>
<a class="hover:text-arya-ruby-800 transition-colors" href="#">Media Kit &amp; Press</a>
</div>
</div>
</div>
</footer>
<!-- ==================== FLOATING ACTION BUTTONS ==================== -->
<!-- 1. Floating AI Assistant Button (Kiri Bawah) -->
<div class="fixed bottom-6 left-6 z-50">
<div class="relative group">
<div class="absolute bottom-full left-0 mb-2 hidden sm:group-hover:flex items-center gap-1.5 px-3 py-1.5 rounded bg-arya-charcoal-950 text-white text-xs whitespace-nowrap shadow-lg pointer-events-none">
<i class="w-3.5 h-3.5 text-arya-ruby-100" data-lucide="sparkles"></i>
<span>Tanya Rekomendasi Buku ke AI Penulis</span>
</div>
<button class="w-14 h-14 rounded-full bg-arya-ruby-800 hover:bg-arya-ruby-900 text-white flex items-center justify-center shadow-xl hover:scale-105 active:scale-95 transition-transform duration-200 border-2 border-white" onclick="toggleAiModal()">
<i class="w-6 h-6 text-arya-ruby-100" data-lucide="bot"></i>
</button>
<span class="absolute -top-1 -right-1 flex h-4 w-4">
<span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-arya-ruby-600 opacity-75"></span>
<span class="relative inline-flex rounded-full h-4 w-4 bg-arya-ruby-750 border border-white text-[9px] font-bold text-white items-center justify-center">AI</span>
</span>
</div>
</div>
<!-- 2. Floating WhatsApp Button Resmi (Kanan Bawah) -->
<div class="fixed bottom-6 right-6 z-50">
<div class="relative group">
<div class="absolute bottom-full right-0 mb-2 hidden sm:group-hover:flex items-center gap-1.5 px-3 py-1.5 rounded bg-arya-charcoal-950 text-white text-xs whitespace-nowrap shadow-lg pointer-events-none">
<i class="w-3.5 h-3.5 text-emerald-400" data-lucide="message-circle"></i>
<span>Chat Tim Manajemen &amp; Pemesanan</span>
</div>
<a class="w-14 h-14 rounded-full bg-[#25D366] hover:bg-[#20ba5a] text-white flex items-center justify-center shadow-xl hover:scale-105 active:scale-95 transition-transform duration-200 border-2 border-white" href="https://wa.me/6281234567890?text=Halo%20Tim%20Manajemen%20Arya%20Sanjaya,%20saya%20ingin%20memesan%20buku%20edisi%20khusus%20bertanda%20tangan." rel="noopener noreferrer" target="_blank">
<svg class="w-7 h-7 fill-current" viewbox="0 0 24 24">
<path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"></path>
</svg>
</a>
</div>
</div>
<!-- ==================== MODAL 1: AI ASSISTANT ==================== -->
<div class="fixed inset-0 z-50 hidden bg-black/60 backdrop-blur-sm flex items-center justify-center p-4" id="ai-modal">
<div class="bg-white border border-arya-canvas-border w-full max-w-lg shadow-2xl overflow-hidden flex flex-col max-h-[85vh] arya-ruby-fade-enter" id="ai-modal-box">
<!-- Header -->
<div class="p-4 bg-arya-canvas-subtle border-b border-arya-canvas-border flex items-center justify-between">
<div class="flex items-center gap-3">
<div class="w-9 h-9 rounded bg-arya-ruby-800 text-white flex items-center justify-center font-bold">
<i class="w-5 h-5" data-lucide="bot"></i>
</div>
<div>
<h4 class="text-sm font-bold text-arya-charcoal-950 flex items-center gap-2">
<span>Author AI Literary Companion</span>
<span class="text-[10px] px-1.5 py-0.5 rounded bg-emerald-100 text-emerald-800 font-semibold">Online</span>
</h4>
<p class="text-[11px] text-stone-500">Rekomendasi buku &amp; sinopsis Arya Sanjaya</p>
</div>
</div>
<button class="text-stone-400 hover:text-arya-charcoal-950 p-1" onclick="toggleAiModal()">
<i class="w-5 h-5" data-lucide="x"></i>
</button>
</div>
<!-- Chat Body -->
<div class="p-4 overflow-y-auto space-y-3 flex-1 text-xs" id="ai-chat-body">
<div class="flex gap-2.5 items-start">
<div class="w-6 h-6 rounded bg-arya-ruby-850 text-white flex items-center justify-center shrink-0 text-[10px] font-bold">AI</div>
<div class="bg-arya-canvas-subtle text-stone-800 p-3 rounded-xl rounded-tl-none border border-arya-canvas-border max-w-[85%] leading-relaxed">
            Salam pembaca budiman! Saya asisten virtual kepenulisan Arya Sanjaya. Buku apa yang sedang Anda cari, atau tema refleksi seperti apa yang menyentuh hati Anda saat ini?
          </div>
</div>
<div class="flex flex-wrap gap-1.5 pt-1 pl-8">
<button class="px-2.5 py-1 rounded-full bg-white hover:bg-arya-ruby-50 hover:text-arya-ruby-800 text-stone-600 border border-arya-canvas-border text-[11px] transition-colors" onclick="sendQuickPrompt('Rekomendasikan buku untuk mencari ketenangan batin')">
            “Rekomendasi ketenangan batin”
          </button>
<button class="px-2.5 py-1 rounded-full bg-white hover:bg-arya-ruby-50 hover:text-arya-ruby-800 text-stone-600 border border-arya-canvas-border text-[11px] transition-colors" onclick="sendQuickPrompt('Bagaimana cara memesan buku bertanda tangan?')">
            “Pesan edisi bertanda tangan”
          </button>
</div>
</div>
<!-- Input Footer -->
<div class="p-3 bg-white border-t border-arya-canvas-border">
<form class="flex gap-2" onsubmit="handleAiChat(event)">
<input class="flex-1 px-3.5 py-2 text-xs bg-arya-canvas border border-stone-300 text-arya-charcoal-950 focus:outline-none focus:border-arya-ruby-800" id="ai-input" placeholder="Tanyakan seputar sinopsis, tema, atau bab buku..." type="text"/>
<button class="px-4 py-2 bg-arya-ruby-800 hover:bg-arya-ruby-900 text-white font-medium text-xs transition-colors flex items-center justify-center" type="submit">
<i class="w-3.5 h-3.5" data-lucide="send"></i>
</button>
</form>
</div>
</div>
</div>
<!-- ==================== MODAL 2: BACA SAMPLE BAB 1 ==================== -->
<div class="fixed inset-0 z-50 hidden bg-black/70 backdrop-blur-sm flex items-center justify-center p-4" id="sample-modal">
<div class="bg-white border border-arya-canvas-border w-full max-w-2xl shadow-2xl overflow-hidden flex flex-col max-h-[85vh]">
<div class="p-4 bg-arya-canvas-subtle border-b border-arya-canvas-border flex items-center justify-between">
<div>
<span class="text-[10px] uppercase font-bold tracking-widest text-arya-ruby-800">Bab 1 — Bacaan Cuplikan Gratis</span>
<h4 class="text-base font-arya-ruby-editorial font-bold text-arya-charcoal-950" id="sample-book-title">Lembah Keheningan</h4>
</div>
<button class="text-stone-400 hover:text-arya-charcoal-950 p-1" onclick="closeSampleModal()">
<i class="w-5 h-5" data-lucide="x"></i>
</button>
</div>
<div class="p-6 sm:p-8 overflow-y-auto space-y-4 font-arya-ruby-editorial text-base sm:text-lg text-arya-charcoal-950 leading-relaxed bg-[#fdfdfc]">
<p class="first-letter:text-5xl first-letter:font-bold first-letter:text-arya-ruby-800 first-letter:mr-2.5 first-letter:float-left first-letter:leading-none">
          Pagi itu kabut turun lebih lambat dari biasanya di lembah selatan. Jarum jam antik di dinding tua berdetak dengan ritme yang seolah mengejek kesibukan kita di layar kaca. Kita telah terbiasa berlari mengejar bayang-bayang berita yang terlupakan sebelum senja tiba.
        </p>
<p>
          “Di mana kau simpan keheninganmu saat seluruh kota ini menuntutmu untuk berteriak?” tanya pria tua berjaket usang itu sambil menuang teh melati ke cangkir keramik yang retak seribu.
        </p>
<p>
          Aku terdiam. Suara mesin kereta di kejauhan meredup, menyisakan derak dahan pinus yang bergesekan ditiup angin lembah. Kadang, kedamaian bukanlah tempat yang kau tuju di ujung peta, melainkan ruang yang kau beri izin untuk beristirahat di dalam dadamu sendiri...
        </p>
<div class="p-4 bg-arya-ruby-50 border border-arya-ruby-100 my-4 text-xs font-arya-ruby-sans text-stone-700">
<span class="font-bold text-arya-ruby-800 block mb-1">Tertarik membaca kelanjutan kisah dan catatan kontemplatifnya?</span>
          Dapatkan edisi lengkap 280 halaman bersampul hardcover dengan tanda tangan basah eksklusif dari Arya Sanjaya.
        </div>
</div>
<div class="p-4 bg-arya-canvas-subtle border-t border-arya-canvas-border flex items-center justify-between">
<span class="text-xs text-stone-500">Selesai membaca pratinjau</span>
<button class="px-5 py-2.5 bg-arya-ruby-800 hover:bg-arya-ruby-900 text-white font-medium text-xs uppercase tracking-widest transition-colors" onclick="orderBookDirect('Buku dari Sample Reader')">
          Pesan Buku Lengkap
        </button>
</div>
</div>
</div>
<!-- ==================== JAVASCRIPT ==================== -->
<script>
    // Inisialisasi ikon Lucide
    lucide.createIcons();

    // 1. Mobile Menu Toggle
    function toggleMobileMenu(menuId) {
      const menu = document.getElementById(menuId);
      if (menu) {
        menu.classList.toggle('hidden');
      }
    }

    // 2. Accordion FAQ
    function toggleAccordion(button) {
      const parent = button.parentElement;
      const content = parent.querySelector('.arya-ruby-accordion-content');
      const icon = button.querySelector('svg') || button.querySelector('i');
      const isOpen = content.classList.contains('open');

      const container = parent.parentElement;
      const allContents = container.querySelectorAll('.arya-ruby-accordion-content');
      const allIcons = container.querySelectorAll('svg, i');

      allContents.forEach(c => c.classList.remove('open'));
      allIcons.forEach(i => i.style.transform = 'rotate(0deg)');

      if (!isOpen) {
        content.classList.add('open');
        if (icon) icon.style.transform = 'rotate(45deg)';
      }
    }

    // 3. Sample Reader Modal
    function openSampleModal(bookTitle) {
      document.getElementById('sample-book-title').innerText = bookTitle;
      const modal = document.getElementById('sample-modal');
      modal.classList.remove('hidden');
    }
    function closeSampleModal() {
      document.getElementById('sample-modal').classList.add('hidden');
    }

    // 4. AI Modal & Chat
    function toggleAiModal() {
      const modal = document.getElementById('ai-modal');
      const box = document.getElementById('ai-modal-box');
      if (modal.classList.contains('hidden')) {
        modal.classList.remove('hidden');
        setTimeout(() => box.classList.add('arya-ruby-fade-enter-active'), 10);
      } else {
        box.classList.remove('arya-ruby-fade-enter-active');
        setTimeout(() => modal.classList.add('hidden'), 200);
      }
    }

    function sendQuickPrompt(text) {
      document.getElementById('ai-input').value = text;
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
        <div class="bg-arya-ruby-800 text-white font-normal p-3 rounded-xl rounded-tr-none max-w-[80%] leading-relaxed shadow-sm">
          ${escapeHtml(query)}
        </div>
      `;
      chatBody.appendChild(userBubble);
      input.value = '';
      chatBody.scrollTop = chatBody.scrollHeight;

      // Author AI Response
      setTimeout(() => {
        let reply = "";
        const lower = query.toLowerCase();
        if (lower.includes('ketenangan') || lower.includes('batin') || lower.includes('hening')) {
          reply = "Untuk ketenangan batin, karya <strong>&ldquo;Lembah Keheningan&rdquo;</strong> adalah bacaan yang sangat direkomendasikan. Buku ini mengupas cara menyaring distraksi modern agar kita mampu berdamai dengan diri sendiri.";
        } else if (lower.includes('ttd') || lower.includes('tanda tangan') || lower.includes('pesan')) {
          reply = "Pemesanan buku edisi khusus bertanda tangan asli Arya Sanjaya dilayani langsung via WhatsApp tim penerbit. Anda juga dapat meminta penulisan nama dedikasi khusus pada lembar pembuka buku.";
        } else if (lower.includes('novel') || lower.includes('fiksi') || lower.includes('cerita')) {
          reply = "Bagi penikmat novel filosofis bernarasi kuat, Anda dapat memesan <strong>&ldquo;Arus di Balik Kabut&rdquo;</strong> yang memenangkan Kusala Sastra Khatulistiwa.";
        } else {
          reply = `Terima kasih atas pesan Anda mengenai &ldquo;${escapeHtml(query)}&rdquo;. Karya-karya Arya Sanjaya mengeksplorasi ketahanan jiwa dan refleksi kemanusiaan. Anda dapat mencicipi Bab 1 gratis melalui tombol 'Baca Sample' di atas!`;
        }

        const aiBubble = document.createElement('div');
        aiBubble.className = 'flex gap-2.5 items-start';
        aiBubble.innerHTML = `
          <div class="w-6 h-6 rounded bg-arya-ruby-850 text-white flex items-center justify-center shrink-0 text-[10px] font-bold">AI</div>
          <div class="bg-arya-canvas-subtle text-stone-800 p-3 rounded-xl rounded-tl-none border border-arya-canvas-border max-w-[85%] leading-relaxed">
            ${reply}
          </div>
        `;
        chatBody.appendChild(aiBubble);
        chatBody.scrollTop = chatBody.scrollHeight;
      }, 450);
    }

    // 5. Order Direct Handler via WhatsApp
    function orderBookDirect(bookTitle) {
      const message = encodeURIComponent(`Halo Tim Manajemen & Penulis Arya Sanjaya, saya ingin memesan buku: "${bookTitle}". Mohon informasi ketersediaan stok edisi bertanda tangan dan nomor rekening pembayaran.`);
      window.open(`https://wa.me/6281234567890?text=${message}`, '_blank');
    }

    // 6. Newsletter Handler
    function handleNewsletter(e) {
      e.preventDefault();
      alert("Terima kasih! Anda telah terdaftar dalam buletin editorial warta sastra Arya Sanjaya.");
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