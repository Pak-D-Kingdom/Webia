<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>

<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>Vanguard Heritage Counsel | Advocates &amp; Legal Consultants</title>
<script src="https://cdn.tailwindcss.com"></script>
<link href="https://fonts.googleapis.com" rel="preconnect"/>
<link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect"/>
<link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,400;0,600;0,700;1,400;1,600&amp;family=Playfair+Display:ital,wght@0,400;0,600;0,700;0,900;1,400;1,600&amp;family=Plus+Jakarta+Sans:wght@300;400;500;600;700&amp;display=swap" rel="stylesheet"/>
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r128/three.min.js"></script>
<script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        oak: '#49392F',
                        leather: '#80654A',
                        brass: '#B99A72',
                        parchment: '#F4EBDD',
                        'parchment-dark': '#E9DEC9',
                        'oak-dark': '#32261E',
                        'brass-light': '#D4BD9B'
                    },
                    fontFamily: {
                        playfair: ['Playfair Display', 'serif'],
                        cormorant: ['Cormorant Garamond', 'serif'],
                        sans: ['Plus Jakarta Sans', 'sans-serif']
                    }
                }
            }
        }
    </script>


<link rel="stylesheet" href="{{ asset('css/website-bisnis/templates/professional-service/lawyer/vanguard/vanguard.css') }}">
</head>
<body class="font-sans antialiased selection:bg-brass selection:text-oak-dark overflow-x-hidden">

<div class="bg-oak text-parchment text-xs py-2.5 px-4 md:px-12 border-b border-brass/30">
<div class="max-w-7xl mx-auto flex flex-col sm:flex-row justify-between items-center gap-2">
<div class="flex items-center space-x-6">
<span><i class="fa-solid fa-phone text-brass mr-2"></i> Hot-line Darurat 24 Jam: +62 (21) 5088-7790</span>
<span class="hidden md:inline"><i class="fa-solid fa-shield-halved text-brass mr-2"></i> Akreditasi PERADI &amp; ISO 27001</span>
</div>
<div class="flex items-center space-x-4">
<span><i class="fa-solid fa-clock text-brass mr-1.5"></i> Senin - Sabtu: 08:00 - 18:00 WIB</span>
<button class="px-2 py-0.5 rounded bg-oak-dark text-brass font-serif border border-brass/40 flex items-center gap-1" onclick="toggleLanguage()">
<span id="langLabel">ID</span> <i class="fa-solid fa-globe text-[10px]"></i>
</button>
</div>
</div>
</div>
<nav class="sticky top-0 z-40 bg-parchment/95 backdrop-blur-md border-b border-oak/15 shadow-sm">
<div class="max-w-7xl mx-auto px-4 md:px-12 py-4 flex justify-between items-center">
<!-- Brand Logo -->
<a class="flex items-center space-x-3 group" href="#">
<div class="w-11 h-11 rounded bg-oak flex items-center justify-center border-2 border-brass text-brass font-playfair text-xl font-bold group-hover:bg-leather transition-all shadow">
                    ⚖️
                </div>
<div>
<span class="font-playfair text-2xl font-black tracking-tight text-oak block leading-none">VANGUARD</span>
<span class="font-cormorant text-xs italic tracking-widest text-leather block font-bold uppercase">Heritage Counsel • Advocates &amp; Legal Advisors</span>
</div>
</a>
<!-- Navigation Links -->
<div class="hidden lg:flex items-center space-x-8 text-xs uppercase tracking-widest font-serif font-bold">
<a class="hover:text-leather transition py-1 border-b-2 border-transparent hover:border-brass" href="#about">Filosofi</a>
<a class="hover:text-leather transition py-1 border-b-2 border-transparent hover:border-brass" href="#practices">Bidang Hukum</a>
<a class="hover:text-leather transition py-1 border-b-2 border-transparent hover:border-brass" href="#assessment">Evaluasi Kasus</a>
<a class="hover:text-leather transition py-1 border-b-2 border-transparent hover:border-brass" href="#attorneys">Tim Advokat</a>
<a class="hover:text-leather transition py-1 border-b-2 border-transparent hover:border-brass" href="#timeline">Tahapan Kerja</a>
<a class="hover:text-leather transition py-1 border-b-2 border-transparent hover:border-brass" href="#booking">Jadwal Konsultasi</a>
<a class="hover:text-leather transition py-1 border-b-2 border-transparent hover:border-brass" href="#portal">Portal Klien</a>
</div>
<!-- Header CTA -->
<div class="flex items-center space-x-3">
<a class="hidden sm:inline-block px-5 py-2.5 bg-oak text-parchment font-serif text-xs uppercase tracking-widest hover:bg-leather transition duration-300 rounded shadow border border-brass/50" href="#booking">
                    Jadwalkan Advis
                </a>
<button class="lg:hidden text-oak text-2xl p-2" onclick="toggleMobileMenu()">
<i class="fa-solid fa-bars-staggered"></i>
</button>
</div>
</div>
<!-- Mobile Menu -->
<div class="hidden lg:hidden bg-parchment border-b border-oak/10 px-6 py-6 space-y-4" id="mobileMenu">
<a class="block font-serif text-lg text-oak" href="#about" onclick="toggleMobileMenu()">Filosofi Hukum</a>
<a class="block font-serif text-lg text-oak" href="#practices" onclick="toggleMobileMenu()">Bidang Praktik Hukum</a>
<a class="block font-serif text-lg text-oak" href="#assessment" onclick="toggleMobileMenu()">Evaluasi Kasus Interaktif</a>
<a class="block font-serif text-lg text-oak" href="#attorneys" onclick="toggleMobileMenu()">Profil Advokat</a>
<a class="block font-serif text-lg text-oak" href="#booking" onclick="toggleMobileMenu()">Booking Konsultasi</a>
<a class="block font-serif text-lg text-oak" href="#portal" onclick="toggleMobileMenu()">Portal Dokumen &amp; Tracking</a>
</div>
</nav>
<section class="relative min-h-[92vh] bg-oak text-parchment overflow-hidden flex items-center py-16">
<!-- 3D Canvas Background -->
<div class="absolute inset-0 z-0 opacity-70 pointer-events-auto" id="hero3DCanvas"></div>
<!-- Rustic Vintage Pattern Overlay -->
<div class="absolute inset-0 bg-[radial-gradient(#B99A72_1px,transparent_1px)] [background-size:28px_28px] opacity-15 pointer-events-none"></div>
<div class="max-w-7xl mx-auto px-4 md:px-12 relative z-10 w-full grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
<!-- Hero Left Column -->
<div class="lg:col-span-7 space-y-8 text-left">
<div class="inline-flex items-center space-x-3 px-4 py-1.5 rounded-full bg-brass/20 border border-brass/40 text-brass text-xs font-serif tracking-widest uppercase">
<span class="w-2 h-2 rounded-full bg-brass animate-ping"></span>
<span>Kebenaran • Keadilan • Integritas Statutori</span>
</div>
<h1 class="font-playfair text-4xl sm:text-6xl lg:text-7xl font-bold leading-[1.1] tracking-tight">
                    Perlindungan Hukum Strategis.<br/>
<span class="italic text-brass font-cormorant font-normal">Advokasi Tanpa Kompromi.</span>
</h1>
<p class="text-base md:text-xl text-parchment/80 font-light max-w-2xl font-sans leading-relaxed h-16">
<span class="border-r-2 border-brass pr-1" id="heroTypingText"></span>
</p>
<div class="flex flex-wrap items-center gap-4 pt-2">
<a class="px-8 py-4 bg-brass text-oak-dark font-serif font-bold text-xs uppercase tracking-widest hover:bg-brass-light transition-all rounded shadow-lg flex items-center gap-3 border border-brass/80 group" href="#booking">
<span>Konsultasi Legal Segera</span>
<i class="fa-solid fa-gavel group-hover:rotate-12 transition-transform"></i>
</a>
<a class="px-8 py-4 bg-transparent border border-parchment/40 text-parchment font-serif text-xs uppercase tracking-widest hover:bg-parchment/10 transition-all rounded flex items-center gap-2" href="#assessment">
<i class="fa-solid fa-list-check text-brass"></i>
<span>Cek Potensi Kasus</span>
</a>
</div>
<!-- Credential Badges -->
<div class="pt-8 border-t border-parchment/10 flex flex-wrap items-center gap-6 text-xs text-parchment/70 font-serif">
<span class="flex items-center gap-2"><i class="fa-solid fa-award text-brass"></i> PERADI Certified Advocates</span>
<span class="flex items-center gap-2"><i class="fa-solid fa-scale-balanced text-brass"></i> 15+ Tahun Reputasi Litigasi</span>
<span class="flex items-center gap-2"><i class="fa-solid fa-stamp text-brass"></i> Kerahasiaan Hak Advokat</span>
</div>
</div>
<!-- Hero Right Quick Emergency Assessment Portal -->
<div class="lg:col-span-5 relative">
<div class="p-6 md:p-8 rounded-2xl bg-oak-dark/90 backdrop-blur-md border-2 border-brass/40 shadow-2xl space-y-6 relative overflow-hidden">
<div class="flex justify-between items-center border-b border-parchment/15 pb-4">
<div class="text-xs uppercase font-serif tracking-widest text-brass flex items-center gap-2">
<i class="fa-solid fa-book-bookmark"></i> Penilaian Situasi Hukum
                        </div>
<span class="text-[10px] text-parchment/60 font-mono">Privasi Terjamin NDA</span>
</div>
<div class="space-y-4">
<label class="block text-xs uppercase font-serif text-parchment font-bold">Pilih Kategori Perkara Anda:</label>
<select class="w-full bg-oak border border-brass/40 text-parchment rounded-lg p-3 text-xs font-sans focus:outline-none focus:border-brass" id="heroQuickSelect">
<option value="corp">Sengketa Bisnis &amp; Perjanjian Komersial</option>
<option value="crim">Panggilan Kepolisian / Perkara Pidana</option>
<option value="prop">Sengketa Tanah, Properti &amp; Pertanahan</option>
<option value="fam">Sengketa Waris &amp; Hukum Keluarga</option>
<option value="ip">Pelanggaran Hak Kekayaan Intelektual (HAKI)</option>
</select>
<div class="p-4 bg-oak/60 rounded-xl border border-brass/20 space-y-2">
<span class="text-xs font-serif text-brass font-bold block" id="heroQuickTitle">Prosedur Penanganan Awal:</span>
<p class="text-[11px] text-parchment/80 leading-relaxed font-sans" id="heroQuickDesc">
                                Kami menyusun analisis risiko awal, pengumpulan bukti yuridis, serta penerbitan Somasi atau Audit Kontrak dalam 24-48 jam.
                            </p>
</div>
</div>
<button class="w-full py-3 bg-leather text-parchment rounded text-xs font-serif uppercase tracking-widest hover:bg-brass hover:text-oak-dark transition text-center font-bold block border border-brass/30" onclick="scrollToAssessment()">
                        Lanjutkan Assesment Lengkap <i class="fa-solid fa-arrow-right ml-1"></i>
</button>
</div>
</div>
</div>
</section>
<section class="py-20 px-4 md:px-12 max-w-7xl mx-auto" id="about">
<div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
<div class="lg:col-span-6 relative">
<div class="relative rounded-2xl overflow-hidden border-2 border-oak shadow-2xl">
<img alt="Law Library Gavel" class="w-full h-[480px] object-cover" src="https://images.unsplash.com/photo-1589829545856-d10d557cf95f?q=80&amp;w=1000&amp;auto=format&amp;fit=crop"/>
<div class="absolute inset-0 bg-gradient-to-t from-oak via-transparent to-transparent opacity-80"></div>
<div class="absolute bottom-6 left-6 right-6 text-parchment p-6 bg-oak/80 backdrop-blur-md rounded-xl border border-brass/40">
<span class="font-cormorant text-2xl italic font-bold text-brass block">"Fiat Justitia Ruat Caelum"</span>
<p class="text-xs text-parchment/80 font-sans mt-1">Hendaklah Keadilan Ditegakkan, Walaupun Langit Akan Runtuh.</p>
</div>
</div>
</div>
<div class="lg:col-span-6 space-y-6">
<span class="text-xs font-serif uppercase tracking-widest text-leather font-bold block">Filosofi &amp; Integritas Hukum</span>
<h2 class="font-playfair text-3xl md:text-5xl font-bold text-oak">Benteng Perlindungan Hak &amp; Kepastian Hukum Anda</h2>
<div class="w-16 h-0.5 bg-brass"></div>
<p class="text-sm md:text-base text-oak/80 leading-relaxed font-sans">
                    Didirikan oleh para senior advocate berlatar belakang akademis mumpuni dan rekam jejak litigasi kompleks, **Vanguard Heritage Counsel** memadukan kearifan tradisi hukum (*Heritage Jurisprudence*) dengan strategi legal modern kekinian.
                </p>
<div class="grid grid-cols-2 gap-4 pt-2">
<div class="p-4 bg-parchment-dark/70 rounded-xl border border-oak/10 space-y-1">
<span class="font-playfair font-bold text-xl text-oak block">98% Success</span>
<span class="text-xs text-oak/70 font-sans">Rasio Penyelesaian Litigasi &amp; Negosiasi</span>
</div>
<div class="p-4 bg-parchment-dark/70 rounded-xl border border-oak/10 space-y-1">
<span class="font-playfair font-bold text-xl text-oak block">$500M+ Handled</span>
<span class="text-xs text-oak/70 font-sans">Nilai Transaksi Korporasi Terkawal</span>
</div>
</div>
<div class="space-y-3 pt-2">
<div class="flex items-start space-x-3 text-xs text-oak/90">
<i class="fa-solid fa-stamp text-brass text-base mt-0.5"></i>
<span><strong>Kerahasiaan Mutlak (Attorney-Client Privilege):</strong> Seluruh berkas dan fakta perkara dilindungi secara hukum berdasarkan Pasal 19 UU Advokat.</span>
</div>
<div class="flex items-start space-x-3 text-xs text-oak/90">
<i class="fa-solid fa-gavel text-brass text-base mt-0.5"></i>
<span><strong>Strategi Presisi:</strong> Kombinasi analisis Doktrin, Yurisprudensi Mahkamah Agung, dan Hukum Positif Indonesia.</span>
</div>
</div>
</div>
</div>
</section>
<section class="py-20 bg-oak text-parchment" id="practices">
<div class="max-w-7xl mx-auto px-4 md:px-12 space-y-16">
<div class="flex flex-col md:flex-row md:items-end justify-between gap-6 border-b border-parchment/15 pb-8">
<div>
<span class="text-xs font-serif uppercase tracking-widest text-brass font-bold block mb-2">Spesialisasi Hukum</span>
<h2 class="font-playfair text-3xl md:text-5xl font-bold">Bidang Praktik Hukum Kami</h2>
</div>
<p class="text-sm text-parchment/70 max-w-md font-sans">
                    Layanan hukum komprehensif didukung oleh tim spesialis di setiap bidang Kitab Undang-Undang Hukum Positif Indonesia.
                </p>
</div>
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
<!-- Practice 1: Corporate & M&A -->
<div class="practice-card bg-oak-dark rounded-xl overflow-hidden group">
<div class="h-44 overflow-hidden relative">
<img alt="Corporate Law" class="w-full h-full object-cover group-hover:scale-110 transition duration-500 opacity-90" src="https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?q=80&amp;w=600&amp;auto=format&amp;fit=crop"/>
<div class="absolute inset-0 bg-gradient-to-t from-oak-dark via-transparent to-transparent"></div>
<span class="absolute top-3 right-3 bg-brass text-oak-dark text-[10px] font-serif uppercase font-bold px-2 py-0.5 rounded">UU PT No. 40</span>
</div>
<div class="p-6 space-y-3">
<h3 class="font-playfair text-xl font-bold text-parchment group-hover:text-brass transition">Hukum Bisnis &amp; Korporasi</h3>
<p class="text-xs text-parchment/70 leading-relaxed">Pendirian PT, Akuisisi, Kepatuhan LHKPN/OJK, Audit Kepatuhan Lingkungan, dan Restrukturisasi Modal.</p>
<a class="inline-flex items-center text-xs font-serif text-brass group-hover:text-parchment transition gap-2 pt-2" href="#booking">
<span>Advis Korporasi</span> <i class="fa-solid fa-arrow-right text-[10px]"></i>
</a>
</div>
</div>
<!-- Practice 2: Criminal Defense -->
<div class="practice-card bg-oak-dark rounded-xl overflow-hidden group">
<div class="h-44 overflow-hidden relative">
<img alt="Criminal Law" class="w-full h-full object-cover group-hover:scale-110 transition duration-500 opacity-90" src="https://images.unsplash.com/photo-1505664194779-8beaceb93744?q=80&amp;w=600&amp;auto=format&amp;fit=crop"/>
<div class="absolute inset-0 bg-gradient-to-t from-oak-dark via-transparent to-transparent"></div>
<span class="absolute top-3 right-3 bg-brass text-oak-dark text-[10px] font-serif uppercase font-bold px-2 py-0.5 rounded">KUHP &amp; KUHAP</span>
</div>
<div class="p-6 space-y-3">
<h3 class="font-playfair text-xl font-bold text-parchment group-hover:text-brass transition">Hukum Pidana &amp; Khusus</h3>
<p class="text-xs text-parchment/70 leading-relaxed">Pendampingan BAP Kepolisian/Kejaksaan, Praperadilan, Tindak Pidana Korupsi (Tipikor), dan Tindak Pidana ITE.</p>
<a class="inline-flex items-center text-xs font-serif text-brass group-hover:text-parchment transition gap-2 pt-2" href="#booking">
<span>Pendampingan Pidana</span> <i class="fa-solid fa-arrow-right text-[10px]"></i>
</a>
</div>
</div>
<!-- Practice 3: Civil Litigation -->
<div class="practice-card bg-oak-dark rounded-xl overflow-hidden group">
<div class="h-44 overflow-hidden relative">
<img alt="Civil Court" class="w-full h-full object-cover group-hover:scale-110 transition duration-500 opacity-90" src="https://images.unsplash.com/photo-1453728013993-6d66e9c9123a?q=80&amp;w=600&amp;auto=format&amp;fit=crop"/>
<div class="absolute inset-0 bg-gradient-to-t from-oak-dark via-transparent to-transparent"></div>
<span class="absolute top-3 right-3 bg-brass text-oak-dark text-[10px] font-serif uppercase font-bold px-2 py-0.5 rounded">KUHPerdata</span>
</div>
<div class="p-6 space-y-3">
<h3 class="font-playfair text-xl font-bold text-parchment group-hover:text-brass transition">Litigasi Perdata &amp; Wanprestasi</h3>
<p class="text-xs text-parchment/70 leading-relaxed">Gugatan Wanprestasi, Perbuatan Melawan Hukum (PMH), Sengketa Utang Piutang, dan Eksekusi Jaminan Fudusia.</p>
<a class="inline-flex items-center text-xs font-serif text-brass group-hover:text-parchment transition gap-2 pt-2" href="#booking">
<span>Litigasi Perdata</span> <i class="fa-solid fa-arrow-right text-[10px]"></i>
</a>
</div>
</div>
<!-- Practice 4: Property & Agrarian -->
<div class="practice-card bg-oak-dark rounded-xl overflow-hidden group">
<div class="h-44 overflow-hidden relative">
<img alt="Property Real Estate" class="w-full h-full object-cover group-hover:scale-110 transition duration-500 opacity-90" src="https://images.unsplash.com/photo-1560518883-ce09059eeffa?q=80&amp;w=600&amp;auto=format&amp;fit=crop"/>
<div class="absolute inset-0 bg-gradient-to-t from-oak-dark via-transparent to-transparent"></div>
<span class="absolute top-3 right-3 bg-brass text-oak-dark text-[10px] font-serif uppercase font-bold px-2 py-0.5 rounded">UUPA No. 5</span>
</div>
<div class="p-6 space-y-3">
<h3 class="font-playfair text-xl font-bold text-parchment group-hover:text-brass transition">Pertanahan &amp; Properti</h3>
<p class="text-xs text-parchment/70 leading-relaxed">Sengketa Sertifikat Ganda, Pengurusan SHM/HGB, Sengketa Tumpang Tindih Lahan, dan Legal Due Diligence Pertanahan.</p>
<a class="inline-flex items-center text-xs font-serif text-brass group-hover:text-parchment transition gap-2 pt-2" href="#booking">
<span>Sengketa Tanah</span> <i class="fa-solid fa-arrow-right text-[10px]"></i>
</a>
</div>
</div>
<!-- Practice 5: Family & Inheritance -->
<div class="practice-card bg-oak-dark rounded-xl overflow-hidden group">
<div class="h-44 overflow-hidden relative">
<img alt="Family Law" class="w-full h-full object-cover group-hover:scale-110 transition duration-500 opacity-90" src="https://images.unsplash.com/photo-1450133064473-71024230f91b?q=80&amp;w=600&amp;auto=format&amp;fit=crop"/>
<div class="absolute inset-0 bg-gradient-to-t from-oak-dark via-transparent to-transparent"></div>
<span class="absolute top-3 right-3 bg-brass text-oak-dark text-[10px] font-serif uppercase font-bold px-2 py-0.5 rounded">Hukum Waris</span>
</div>
<div class="p-6 space-y-3">
<h3 class="font-playfair text-xl font-bold text-parchment group-hover:text-brass transition">Hukum Keluarga &amp; Warisan</h3>
<p class="text-xs text-parchment/70 leading-relaxed">Pembagian Harta Gono-Gini, Sengketa Waris Perdata/KHI, Hak Asuh Anak, dan Perjanjian Pra-Nikah (*Prenuptial*).</p>
<a class="inline-flex items-center text-xs font-serif text-brass group-hover:text-parchment transition gap-2 pt-2" href="#booking">
<span>Hukum Keluarga</span> <i class="fa-solid fa-arrow-right text-[10px]"></i>
</a>
</div>
</div>
<!-- Practice 6: Employment & Manpower -->
<div class="practice-card bg-oak-dark rounded-xl overflow-hidden group">
<div class="h-44 overflow-hidden relative">
<img alt="Employment Law" class="w-full h-full object-cover group-hover:scale-110 transition duration-500 opacity-90" src="https://images.unsplash.com/photo-1521791136064-7986c2920216?q=80&amp;w=600&amp;auto=format&amp;fit=crop"/>
<div class="absolute inset-0 bg-gradient-to-t from-oak-dark via-transparent to-transparent"></div>
<span class="absolute top-3 right-3 bg-brass text-oak-dark text-[10px] font-serif uppercase font-bold px-2 py-0.5 rounded">UU Cipta Kerja</span>
</div>
<div class="p-6 space-y-3">
<h3 class="font-playfair text-xl font-bold text-parchment group-hover:text-brass transition">Ketenagakerjaan &amp; PHI</h3>
<p class="text-xs text-parchment/70 leading-relaxed">Sengketa Perselisihan Hubungan Industrial (PHI), Pemutusan Hubungan Kerja (PHK), Peraturan Perusahaan (PP/PKB).</p>
<a class="inline-flex items-center text-xs font-serif text-brass group-hover:text-parchment transition gap-2 pt-2" href="#booking">
<span>Sengketa Ketenagakerjaan</span> <i class="fa-solid fa-arrow-right text-[10px]"></i>
</a>
</div>
</div>
<!-- Practice 7: Intellectual Property (IPR) -->
<div class="practice-card bg-oak-dark rounded-xl overflow-hidden group">
<div class="h-44 overflow-hidden relative">
<img alt="Intellectual Property" class="w-full h-full object-cover group-hover:scale-110 transition duration-500 opacity-90" src="https://images.unsplash.com/photo-1589216532372-1c2a367900d9?q=80&amp;w=600&amp;auto=format&amp;fit=crop"/>
<div class="absolute inset-0 bg-gradient-to-t from-oak-dark via-transparent to-transparent"></div>
<span class="absolute top-3 right-3 bg-brass text-oak-dark text-[10px] font-serif uppercase font-bold px-2 py-0.5 rounded">HAKI &amp; Hak Cipta</span>
</div>
<div class="p-6 space-y-3">
<h3 class="font-playfair text-xl font-bold text-parchment group-hover:text-brass transition">HAKI &amp; Hak Kekayaan Intelektual</h3>
<p class="text-xs text-parchment/70 leading-relaxed">Pendaftaran Merek, Hak Cipta, Paten, Rahasia Dagang, dan Gugatan Pelanggaran Merek Komersial.</p>
<a class="inline-flex items-center text-xs font-serif text-brass group-hover:text-parchment transition gap-2 pt-2" href="#booking">
<span>Perlindungan Merek</span> <i class="fa-solid fa-arrow-right text-[10px]"></i>
</a>
</div>
</div>
<!-- Practice 8: Contract Drafting & Audit -->
<div class="practice-card bg-oak-dark rounded-xl overflow-hidden group">
<div class="h-44 overflow-hidden relative">
<img alt="Contract Drafting" class="w-full h-full object-cover group-hover:scale-110 transition duration-500 opacity-90" src="https://images.unsplash.com/photo-1455390582262-044cdead277a?q=80&amp;w=600&amp;auto=format&amp;fit=crop"/>
<div class="absolute inset-0 bg-gradient-to-t from-oak-dark via-transparent to-transparent"></div>
<span class="absolute top-3 right-3 bg-brass text-oak-dark text-[10px] font-serif uppercase font-bold px-2 py-0.5 rounded">Perancangan Kontrak</span>
</div>
<div class="p-6 space-y-3">
<h3 class="font-playfair text-xl font-bold text-parchment group-hover:text-brass transition">Penyusunan &amp; Review Kontrak</h3>
<p class="text-xs text-parchment/70 leading-relaxed">Drafting MoU, Kontrak Kerjasama Bisnis, NDA, Amandemen Perjanjian, dan Legal Opinion Terstruktur.</p>
<a class="inline-flex items-center text-xs font-serif text-brass group-hover:text-parchment transition gap-2 pt-2" href="#booking">
<span>Review Kontrak</span> <i class="fa-solid fa-arrow-right text-[10px]"></i>
</a>
</div>
</div>
<div class="practice-card bg-oak-dark rounded-xl overflow-hidden group"><div class="h-44 overflow-hidden relative"><img alt="Contract Law" class="w-full h-full object-cover group-hover:scale-110 transition duration-500" src="https://images.unsplash.com/photo-1455390582262-044cdead277a?q=80&amp;w=600&amp;auto=format&amp;fit=crop"/><div class="absolute inset-0 bg-gradient-to-t from-oak-dark via-transparent to-transparent"></div></div><div class="p-6 space-y-3"><h3 class="font-playfair text-xl font-bold text-parchment">Hukum Kontrak</h3><p class="text-xs text-parchment/70">Penyusunan, review, negosiasi, dan penanganan sengketa perjanjian.</p><a class="text-xs text-brass" href="#booking">Konsultasi Kontrak →</a></div></div></div>
</div>
</section>
<section class="py-20 px-4 md:px-12 max-w-7xl mx-auto" id="assessment">
<div class="text-center max-w-3xl mx-auto space-y-4 mb-16">
<span class="text-xs font-serif uppercase tracking-widest text-leather font-bold block">Self-Assessment Tool</span>
<h2 class="font-playfair text-3xl md:text-5xl font-bold text-oak">Evaluasi Risiko &amp; Situasi Hukum Anda</h2>
<div class="w-16 h-0.5 bg-brass mx-auto"></div>
<p class="text-sm text-oak/70 font-sans">
                Gunakan modul diagnostik interaktif kami di bawah ini untuk mengidentifikasi klasifikasi sengketa, pasal terkait, serta langkah advokasi yang disarankan.
            </p>
</div>
<div class="bg-parchment-dark/70 rounded-2xl p-6 md:p-10 border border-oak/20 shadow-md">
<div class="grid grid-cols-1 md:grid-cols-12 gap-8 items-center">
<!-- Left Input Controls -->
<div class="md:col-span-6 space-y-6">
<div>
<label class="block text-xs uppercase font-serif tracking-widest text-oak font-bold mb-2">1. Pilih Jenis Subjek Hukum:</label>
<div class="grid grid-cols-2 gap-3">
<button class="p-3 rounded-lg border border-oak/30 bg-parchment text-oak text-xs font-serif uppercase tracking-wider font-bold hover:border-brass" id="btnSubjectIndiv" onclick="setSubjectType('individu')">Individu / Perorangan</button>
<button class="p-3 rounded-lg border border-oak/10 bg-oak text-parchment text-xs font-serif uppercase tracking-wider font-bold" id="btnSubjectCorp" onclick="setSubjectType('korporasi')">Badan Usaha / PT</button>
</div>
</div>
<div>
<label class="block text-xs uppercase font-serif tracking-widest text-oak font-bold mb-2">2. Urgensi / Status Perkara:</label>
<select class="w-full bg-parchment border border-oak/30 rounded-lg p-3 text-xs font-sans" id="urgencySelect" onchange="runCaseEvaluation()">
<option value="preventive">Pencegahan / Legal Opinion &amp; Review Kontrak</option>
<option value="warning">Telah Menerima Surat Somasi / Peringatan</option>
<option value="summons">Panggilan Penyidik Kepolisian (BAP)</option>
<option value="litigation">Gugatan Resmi di Pengadilan (Perdata / PHI)</option>
</select>
</div>
<div>
<label class="block text-xs uppercase font-serif tracking-widest text-oak font-bold mb-2">3. Estimasi Nilai Perkara / Kerugian:</label>
<input class="w-full accent-leather" id="valueSlider" max="5000" min="50" oninput="runCaseEvaluation()" step="50" type="range" value="500"/>
<div class="flex justify-between text-[10px] text-oak/60 font-mono">
<span>&lt; Rp 50 Juta</span>
<span>Rp 500 Juta</span>
<span>&gt; Rp 5 Miliar+</span>
</div>
</div>
</div>
<!-- Right Live Output Diagnostic Card -->
<div class="md:col-span-6 bg-oak text-parchment rounded-xl p-6 border border-brass/40 space-y-4 shadow-xl">
<div class="flex justify-between items-center border-b border-parchment/15 pb-3">
<span class="text-xs font-serif uppercase text-brass tracking-widest font-bold">Hasil Evaluasi Diagnostik</span>
<span class="text-[10px] bg-brass text-oak-dark font-mono px-2 py-0.5 rounded font-bold" id="evalCode">REF-LAW-8902</span>
</div>
<div class="space-y-3">
<h4 class="font-playfair text-xl font-bold text-parchment" id="evalTitle">Sengketa Korporasi &amp; Audit Perjanjian</h4>
<div class="text-xs font-mono text-brass" id="evalStatute">Landasan Hukum: KUHPerdata Pasal 1320 &amp; Pasal 1338 (Asas Pacta Sunt Servanda)</div>
<p class="text-xs text-parchment/80 leading-relaxed font-sans" id="evalAction">
                            Langkah Disarankan: Penerbitan Legal Opinion tertulis, analisa pasal-pasal cidera janji, dan penyelenggaraan Somasi Negosiasi Non-Litigasi sebelum mengajukan Gugatan.
                        </p>
</div>
<div class="pt-4 border-t border-parchment/15 flex justify-between items-center">
<div>
<span class="text-[10px] text-parchment/60 block">Rekomendasi Advokat:</span>
<span class="text-xs font-serif text-brass font-bold">Senior Corporate Litigation Partner</span>
</div>
<a class="px-4 py-2 bg-brass text-oak-dark font-serif text-xs uppercase tracking-widest hover:bg-parchment transition rounded font-bold" href="#booking">
                            Klaim Konsultasi
                        </a>
</div>
</div>
</div>
</div>
</section>
<section class="py-20 bg-oak text-parchment" id="attorneys">
<div class="max-w-7xl mx-auto px-4 md:px-12 space-y-16">
<div class="text-center max-w-3xl mx-auto space-y-4">
<span class="text-xs font-serif uppercase tracking-widest text-brass font-bold block">Dewan Advokat Senior</span>
<h2 class="font-playfair text-3xl md:text-5xl font-bold">Profil Advokat &amp; Legal Consultant</h2>
<div class="w-16 h-0.5 bg-brass mx-auto"></div>
<p class="text-sm text-parchment/70 font-sans">
                    Advokat terlisensi PERADI berlatar belakang akademis magister dan doktor hukum terkemuka.
                </p>
</div>
<div class="grid grid-cols-1 md:grid-cols-3 gap-8">
<!-- Advocate 1 -->
<div class="bg-oak-dark rounded-xl p-6 border border-brass/20 space-y-4 relative group">
<div class="h-64 rounded-lg overflow-hidden relative">
<img alt="Advocate Partner" class="w-full h-full object-cover group-hover:scale-105 transition duration-500" src="https://images.unsplash.com/photo-1560250097-0b93528c311a?q=80&amp;w=400&amp;auto=format&amp;fit=crop"/>
<div class="absolute inset-0 bg-gradient-to-t from-oak-dark via-transparent to-transparent opacity-60"></div>
<span class="absolute bottom-3 left-3 bg-oak/80 backdrop-blur text-brass text-[10px] font-mono px-2.5 py-1 rounded border border-brass/30">NIA PERADI: 09.88219/ADV</span>
</div>
<div class="space-y-1">
<h3 class="font-playfair text-xl font-bold text-parchment">Prof. Dr. Hendra Baskoro, S.H., LL.M.</h3>
<p class="text-xs text-brass font-serif">Managing Partner • Senior Litigation Advocate</p>
<p class="text-[11px] text-parchment/60 font-sans">Alumni: Universitas Indonesia &amp; Harvard Law School</p>
</div>
<p class="text-xs text-parchment/70 leading-relaxed">
                        Spesialis dalam litigasi pidana khusus korporasi, arbiter internasional, dan sengketa perbankan dengan pengalaman 22 tahun.
                    </p>
<button class="w-full py-2.5 bg-brass/20 text-brass border border-brass/40 rounded text-xs font-serif uppercase tracking-widest hover:bg-brass hover:text-oak-dark transition font-bold" onclick="openBookingModal('Prof. Dr. Hendra Baskoro, S.H.')">
                        Jadwalkan Advis Khusus
                    </button>
</div>
<!-- Advocate 2 -->
<div class="bg-oak-dark rounded-xl p-6 border border-brass/20 space-y-4 relative group">
<div class="h-64 rounded-lg overflow-hidden relative">
<img alt="Advocate Partner" class="w-full h-full object-cover group-hover:scale-105 transition duration-500" src="https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?q=80&amp;w=400&amp;auto=format&amp;fit=crop"/>
<div class="absolute inset-0 bg-gradient-to-t from-oak-dark via-transparent to-transparent opacity-60"></div>
<span class="absolute bottom-3 left-3 bg-oak/80 backdrop-blur text-brass text-[10px] font-mono px-2.5 py-1 rounded border border-brass/30">NIA PERADI: 12.44901/ADV</span>
</div>
<div class="space-y-1">
<h3 class="font-playfair text-xl font-bold text-parchment">Eleanor Danubrata, S.H., M.Kn.</h3>
<p class="text-xs text-brass font-serif">Partner • Property &amp; Corporate Legal Specialist</p>
<p class="text-[11px] text-parchment/60 font-sans">Alumni: Universitas Gadjah Mada &amp; Leiden University</p>
</div>
<p class="text-xs text-parchment/70 leading-relaxed">
                        Pakar sengketa pertanahan nasional, audit perjanjian komersial lintas negara, dan akuisisi aset properti bernilai tinggi.
                    </p>
<button class="w-full py-2.5 bg-brass/20 text-brass border border-brass/40 rounded text-xs font-serif uppercase tracking-widest hover:bg-brass hover:text-oak-dark transition font-bold" onclick="openBookingModal('Eleanor Danubrata, S.H.')">
                        Jadwalkan Advis Khusus
                    </button>
</div>
<!-- Advocate 3 -->
<div class="bg-oak-dark rounded-xl p-6 border border-brass/20 space-y-4 relative group">
<div class="h-64 rounded-lg overflow-hidden relative">
<img alt="Advocate Partner" class="w-full h-full object-cover group-hover:scale-105 transition duration-500" src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?q=80&amp;w=400&amp;auto=format&amp;fit=crop"/>
<div class="absolute inset-0 bg-gradient-to-t from-oak-dark via-transparent to-transparent opacity-60"></div>
<span class="absolute bottom-3 left-3 bg-oak/80 backdrop-blur text-brass text-[10px] font-mono px-2.5 py-1 rounded border border-brass/30">NIA PERADI: 15.33120/ADV</span>
</div>
<div class="space-y-1">
<h3 class="font-playfair text-xl font-bold text-parchment">Raden Farhan Wirawan, S.H., MH.</h3>
<p class="text-xs text-brass font-serif">Partner • Criminal Defense &amp; ITE Legal Counsel</p>
<p class="text-[11px] text-parchment/60 font-sans">Alumni: Universitas Padjadjaran</p>
</div>
<p class="text-xs text-parchment/70 leading-relaxed">
                        Pendamping hukum kasus pidana khusus, sengketa perselisihan PHI, serta penyelesaian klaim pencemaran nama baik digital.
                    </p>
<button class="w-full py-2.5 bg-brass/20 text-brass border border-brass/40 rounded text-xs font-serif uppercase tracking-widest hover:bg-brass hover:text-oak-dark transition font-bold" onclick="openBookingModal('Raden Farhan Wirawan, S.H.')">
                        Jadwalkan Advis Khusus
                    </button>
</div>
</div>
</div>
</section>
<section class="py-20 px-4 md:px-12 max-w-7xl mx-auto" id="timeline">
<div class="text-center max-w-3xl mx-auto space-y-4 mb-16">
<span class="text-xs font-serif uppercase tracking-widest text-leather font-bold block">SOP Penanganan Kasus</span>
<h2 class="font-playfair text-3xl md:text-5xl font-bold text-oak">5 Tahapan Penanganan Perkara Hukum</h2>
<div class="w-16 h-0.5 bg-brass mx-auto"></div>
</div>
<div class="grid grid-cols-1 md:grid-cols-5 gap-6">
<div class="p-6 bg-parchment-dark/70 rounded-xl border border-oak/10 space-y-3 relative">
<span class="text-3xl font-playfair font-bold text-leather">01</span>
<h3 class="font-playfair text-lg font-bold text-oak">Konsultasi Awal</h3>
<p class="text-xs text-oak/70 leading-relaxed">Identifikasi fakta hukum, wawancara fakta perkara, dan penandatanganan Lembar Kerahasiaan (NDA).</p>
</div>
<div class="p-6 bg-parchment-dark/70 rounded-xl border border-oak/10 space-y-3 relative">
<span class="text-3xl font-playfair font-bold text-brass">02</span>
<h3 class="font-playfair text-lg font-bold text-oak">Legal Audit &amp; Bukti</h3>
<p class="text-xs text-oak/70 leading-relaxed">Pemeriksaan bukti surat, kesesuaian pasal-pasal terkait, serta verifikasi legalitas subjek hukum.</p>
</div>
<div class="p-6 bg-parchment-dark/70 rounded-xl border border-oak/10 space-y-3 relative">
<span class="text-3xl font-playfair font-bold text-leather">03</span>
<h3 class="font-playfair text-lg font-bold text-oak">Formulasi Strategi</h3>
<p class="text-xs text-oak/70 leading-relaxed">Penyusunan Opinio Juris, draft Somasi, atau draft Surat Kuasa Khusus Litigasi/Non-Litigasi.</p>
</div>
<div class="p-6 bg-parchment-dark/70 rounded-xl border border-oak/10 space-y-3 relative">
<span class="text-3xl font-playfair font-bold text-brass">04</span>
<h3 class="font-playfair text-lg font-bold text-oak">Pendampingan Resmi</h3>
<p class="text-xs text-oak/70 leading-relaxed">Advokasi langsung dalam negosiasi, pemeriksaan instansi kepolisian, atau persidangan pengadilan.</p>
</div>
<div class="p-6 bg-parchment-dark/70 rounded-xl border border-oak/10 space-y-3 relative">
<span class="text-3xl font-playfair font-bold text-leather">05</span>
<h3 class="font-playfair text-lg font-bold text-oak">Resolusi &amp; Eksekusi</h3>
<p class="text-xs text-oak/70 leading-relaxed">Penyelesaian sengketa, penandatanganan Akta Perdamaian (Dading), atau eksekusi putusan inkrah.</p>
</div>
</div>
</section>
<section class="py-20 bg-oak text-parchment" id="booking">
<div class="max-w-7xl mx-auto px-4 md:px-12 grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
<div class="lg:col-span-5 space-y-6">
<span class="text-xs font-serif uppercase tracking-widest text-brass font-bold block">Reservasi Waktu Advisory</span>
<h2 class="font-playfair text-3xl md:text-5xl font-bold">Jadwalkan Konsultasi Hukum Lanjutan</h2>
<p class="text-sm text-parchment/70 leading-relaxed font-sans">
                    Pilih metode advis yang sesuai dengan kebutuhan Anda. Seluruh sesi diawali dengan Penandatanganan Lembar Kerahasiaan Klien.
                </p>
<div class="space-y-3 pt-2">
<div class="p-4 bg-oak-dark rounded-lg border border-brass/20 flex items-center space-x-4">
<i class="fa-solid fa-building-columns text-2xl text-brass"></i>
<div>
<h4 class="font-serif font-bold text-sm text-parchment">In-Person Consultation</h4>
<p class="text-[11px] text-parchment/60">Kantor Vanguard SCBD Jakarta / Surabaya Hub</p>
</div>
</div>
<div class="p-4 bg-oak-dark rounded-lg border border-brass/20 flex items-center space-x-4">
<i class="fa-solid fa-video text-2xl text-brass"></i>
<div>
<h4 class="font-serif font-bold text-sm text-parchment">Encrypted Video Conference</h4>
<p class="text-[11px] text-parchment/60">Sesi Online Terenkripsi Zoom/Teams 45 Menit</p>
</div>
</div>
</div>
</div>
<!-- Booking Interactive Form -->
<div class="lg:col-span-7 bg-oak-dark p-6 md:p-10 rounded-2xl border border-brass/40 shadow-2xl space-y-6">
<form class="space-y-4" onsubmit="handleBookingSubmit(event)">
<div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
<div>
<label class="block text-xs font-serif uppercase font-bold text-brass mb-1">Nama Lengkap Klien / Kuasa</label>
<input class="w-full bg-oak border border-brass/30 rounded p-3 text-xs text-parchment focus:outline-none focus:border-brass" placeholder="Sesuai KTP / Paspor" required="" type="text"/>
</div>
<div>
<label class="block text-xs font-serif uppercase font-bold text-brass mb-1">Email / Kontak HP (WhatsApp)</label>
<input class="w-full bg-oak border border-brass/30 rounded p-3 text-xs text-parchment focus:outline-none focus:border-brass" placeholder="0812-xxxx-xxxx" required="" type="text"/>
</div>
</div>
<div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
<div>
<label class="block text-xs font-serif uppercase font-bold text-brass mb-1">Pilih Mode Advisory</label>
<select class="w-full bg-oak border border-brass/30 rounded p-3 text-xs text-parchment">
<option>In-Person (Kantor SCBD Jakarta)</option>
<option>Online Video Consultation</option>
<option>Phone Advisory</option>
</select>
</div>
<div>
<label class="block text-xs font-serif uppercase font-bold text-brass mb-1">Pilih Tanggal Jadwal</label>
<input class="w-full bg-oak border border-brass/30 rounded p-3 text-xs text-parchment" required="" type="date"/>
</div>
</div>
<div>
<label class="block text-xs font-serif uppercase font-bold text-brass mb-1">Ringkasan Singkat Permasalahan Hukum</label>
<textarea class="w-full bg-oak border border-brass/30 rounded p-3 text-xs text-parchment focus:outline-none focus:border-brass" placeholder="Sebutkan kronologi singkat atau pasal perjanjian yang perlu dikaji..." rows="3"></textarea>
</div>
<button class="w-full py-3 bg-brass text-oak-dark font-serif uppercase tracking-widest text-xs font-bold rounded hover:bg-brass-light transition shadow-lg" type="submit">
                        Konfirmasi Booking Konsultasi
                    </button>
</form>
</div>
</div>
</section>
<section class="py-20 px-4 md:px-12 max-w-7xl mx-auto" id="portal">
<div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
<!-- Document Upload Portal Box -->
<div class="lg:col-span-6 bg-parchment-dark/70 rounded-2xl p-6 md:p-8 border border-oak/20 space-y-4">
<div class="flex justify-between items-center border-b border-oak/10 pb-3">
<span class="text-xs font-serif uppercase font-bold text-oak">Portal Unggah Dokumen Rahasia</span>
<span class="text-[10px] bg-oak text-brass px-2 py-0.5 rounded font-mono">256-Bit SSL Encrypted</span>
</div>
<p class="text-xs text-oak/70">Unggah berkas perjanjian, bukti surat, atau dokumen somasi untuk ditinjau oleh Advokat Senior.</p>
<div class="border-2 border-dashed border-leather hover:border-oak rounded-xl p-8 text-center cursor-pointer bg-parchment transition group" onclick="document.getElementById('docPortalInput').click()">
<i class="fa-solid fa-file-shield text-4xl text-leather group-hover:scale-110 transition-transform mb-2"></i>
<p class="text-xs font-bold text-oak">Klik / Drag &amp; Drop Dokumen Hukum</p>
<span class="text-[10px] text-oak/50">Format: PDF, DOCX, JPG (Maks. 50MB)</span>
<input class="hidden" id="docPortalInput" onchange="handleDocUpload(this.files)" type="file"/>
</div>
<div class="hidden text-xs font-mono text-leather p-2 bg-parchment rounded flex justify-between" id="uploadStatus">
<span id="fileName">berkas_perjanjian.pdf</span>
<span class="text-oak font-bold">Terenkripsi ✓</span>
</div>
</div>
<!-- Case Progress Tracking Box -->
<div class="lg:col-span-6 bg-oak text-parchment rounded-2xl p-6 md:p-8 border border-brass/40 space-y-4">
<div class="flex justify-between items-center border-b border-parchment/15 pb-3">
<span class="text-xs font-serif uppercase font-bold text-brass">Cek Progres Perkara Klien</span>
<span class="text-[10px] text-parchment/50 font-mono">Live Portal</span>
</div>
<p class="text-xs text-parchment/70">Masukkan ID Perkara resmi yang tertera pada Lembar Surat Kuasa untuk melihat update jadwal sidang/negosiasi.</p>
<div class="flex gap-2">
<input class="bg-oak-dark border border-brass/30 rounded p-3 text-xs text-parchment focus:outline-none flex-1" id="caseIdInput" placeholder="Contoh ID: VHC-2026-889" type="text"/>
<button class="px-5 py-3 bg-brass text-oak-dark font-serif text-xs font-bold uppercase rounded hover:bg-parchment transition" onclick="trackCaseStatus()">Lacak</button>
</div>
<div class="hidden p-4 bg-oak-dark rounded-xl border border-brass/20 space-y-2 text-xs" id="caseTrackerResult">
<div class="flex justify-between font-bold text-brass">
<span>Status Perkara: VHC-2026-889</span>
<span>Sidang II - Pengadilan Negeri</span>
</div>
<p class="text-parchment/80 font-sans">Agenda: Penyerahan Replik &amp; Pembuktian Surat. Sidang dijadwalkan pada Kamis, 14 November 2026, Pukul 10:00 WIB di PN Jakarta Selatan.</p>
</div>
</div>
</div>
</section>

<section class="py-20 px-4 md:px-12 max-w-7xl mx-auto" id="fees"><div class="text-center mb-10"><h2 class="font-playfair text-3xl md:text-5xl">Biaya &amp; Informasi Konsultasi</h2><div class="w-16 h-0.5 bg-brass mx-auto mt-4"></div></div><div class="overflow-x-auto border border-brass/40 rounded"><table class="w-full min-w-[650px] bg-[#FBF6ED] text-sm"><thead class="bg-oak text-parchment"><tr><th class="p-4 text-left">Layanan</th><th class="p-4 text-left">Keterangan</th><th class="p-4 text-left">Biaya (contoh)</th></tr></thead><tbody><tr class="border-b border-brass/40"><td class="p-4 font-bold">Screening awal</td><td class="p-4">Penilaian singkat 15 menit</td><td class="p-4">Gratis</td></tr><tr class="border-b border-brass/40"><td class="p-4 font-bold">Konsultasi 60 menit</td><td class="p-4">Online / tatap muka / telepon</td><td class="p-4">Rp 400–750 rb</td></tr><tr class="border-b border-brass/40"><td class="p-4 font-bold">Review kontrak</td><td class="p-4">Per dokumen, hingga 20 halaman</td><td class="p-4">Mulai Rp 1,5 jt</td></tr><tr class="border-b border-brass/40"><td class="p-4 font-bold">Drafting kontrak</td><td class="p-4">Sesuai kompleksitas</td><td class="p-4">Mulai Rp 2,5 jt</td></tr><tr class="border-b border-brass/40"><td class="p-4 font-bold">Retainer korporat</td><td class="p-4">Per bulan, jam konsultasi terukur</td><td class="p-4">Mulai Rp 5 jt</td></tr><tr><td class="p-4 font-bold">Litigasi</td><td class="p-4">Perjanjian jasa hukum tertulis</td><td class="p-4">Sesuai kesepakatan</td></tr></tbody></table></div><p class="text-xs text-oak/60 mt-3">Biaya merupakan contoh template dan wajib diverifikasi oleh pemilik kantor.</p></section>
<section class="py-20 px-4 md:px-12 bg-parchment-dark/50" id="document-checklist"><div class="max-w-7xl mx-auto"><div class="text-center mb-10"><h2 class="font-playfair text-3xl md:text-5xl">Checklist dokumen &amp; pengiriman aman</h2></div><div class="grid lg:grid-cols-2 gap-8"><div class="bg-[#FBF6ED] p-6 rounded-xl border border-brass/40"><label class="block text-xs uppercase font-bold mb-3">Jenis perkara</label><select class="w-full p-3 border border-brass bg-white mb-4" id="checklistType" onchange="updateLegalChecklist()"><option value="corp">Hukum Korporasi</option><option value="crim">Hukum Pidana</option><option value="civil">Hukum Perdata</option><option value="family">Hukum Keluarga</option><option value="property">Hukum Properti</option><option value="employment">Ketenagakerjaan</option><option value="ip">Kekayaan Intelektual</option><option value="litigation">Litigasi</option><option value="contract">Hukum Kontrak</option></select><div class="space-y-3" id="legalChecklist"></div></div><div class="space-y-5"><div class="border-2 border-dashed border-leather bg-[#FBF6ED] rounded-xl p-8 text-center"><i class="fa-solid fa-file-arrow-up text-4xl text-leather"></i><h3 class="font-playfair text-xl mt-3">Portal Pengiriman Dokumen</h3><p class="text-sm my-3">PDF · DOCX · JPG · PNG</p><input accept=".pdf,.doc,.docx,.jpg,.jpeg,.png" class="hidden" id="secureDocInput" onchange="showSelectedLegalFile(this)" type="file"/><button class="px-6 py-3 bg-oak text-parchment" onclick="document.getElementById('secureDocInput').click()" type="button">Pilih File</button><p class="text-xs mt-3" id="secureFileName">Belum ada file dipilih.</p></div><div class="bg-[#FBF6ED] p-6 rounded-xl border border-brass/40"><h3 class="font-playfair text-xl mb-3">Panduan pengiriman aman</h3><ul class="text-sm space-y-3"><li>🔒 Kirim salinan, simpan dokumen asli.</li><li>✂️ Sensor data yang tidak relevan.</li><li>📎 Beri nama file: tanggal_jenis_dokumen.</li><li>⚠️ Demo: file tidak dikirim ke server.</li></ul></div></div></div></div></section>
<section class="py-20 px-4 md:px-12 max-w-7xl mx-auto space-y-8" id="knowledge"><div class="text-center"><h2 class="font-playfair text-3xl md:text-5xl">Pusat Edukasi Hukum &amp; Kepatuhan Bisnis</h2></div><div class="grid md:grid-cols-3 gap-6"><article class="p-6 bg-parchment-dark/70 rounded-xl"><h3 class="font-playfair text-xl">Due diligence sebelum transaksi</h3><p class="text-sm mt-3">Telaah dokumen, kewenangan penandatangan, dan risiko kontraktual.</p></article><article class="p-6 bg-parchment-dark/70 rounded-xl"><h3 class="font-playfair text-xl">Langkah awal menerima somasi</h3><p class="text-sm mt-3">Simpan surat, perhatikan tenggat, dan minta penilaian profesional.</p></article><article class="p-6 bg-parchment-dark/70 rounded-xl"><h3 class="font-playfair text-xl">Klausul penting perjanjian</h3><p class="text-sm mt-3">Periksa ruang lingkup, kewajiban, pembayaran, pengakhiran, dan sengketa.</p></article></div><div class="grid md:grid-cols-2 gap-6"><div class="p-7 bg-oak text-parchment rounded-xl"><h3 class="font-playfair text-2xl text-brass">Pengalaman &amp; Studi Kasus</h3><p class="text-sm mt-3">Publikasikan hanya ringkasan perkara anonim yang telah memperoleh persetujuan dan tidak melanggar kerahasiaan.</p></div><div class="p-7 bg-parchment-dark/70 rounded-xl"><h3 class="font-playfair text-2xl">Corporate Legal Retainer</h3><p class="text-sm mt-3">Konsultasi berkala, review dokumen, pemantauan kepatuhan, dan koordinasi isu hukum.</p><a class="inline-block mt-4 px-5 py-3 bg-oak text-parchment text-xs" href="#booking">Diskusikan Retainer</a></div></div></section>
<section class="py-20 px-4 md:px-12 bg-parchment-dark/50" id="offices"><div class="max-w-7xl mx-auto"><div class="text-center mb-10"><h2 class="font-playfair text-3xl md:text-5xl">Kantor &amp; wilayah layanan</h2></div><div class="grid md:grid-cols-2 gap-6"><div class="bg-[#FBF6ED] border border-brass/40 rounded-xl overflow-hidden"><div class="h-36 bg-leather flex items-center justify-center text-white text-5xl"><i class="fa-solid fa-building-columns"></i></div><div class="p-6"><h3 class="font-playfair text-xl">Kantor Pusat — Surabaya</h3><p class="text-sm mt-2">Jl. Contoh Hukum No. 18, Surabaya, Jawa Timur</p><p class="text-sm mt-2">Sen–Jum · 08.30–17.30</p></div></div><div class="bg-[#FBF6ED] border border-brass/40 rounded-xl overflow-hidden"><div class="h-36 bg-brass flex items-center justify-center text-oak text-5xl"><i class="fa-solid fa-landmark"></i></div><div class="p-6"><h3 class="font-playfair text-xl">Kantor Perwakilan — Jakarta</h3><p class="text-sm mt-2">Gedung Contoh Lt. 12, Jakarta Selatan</p><p class="text-sm mt-2">Sen–Jum · 08.30–17.30</p></div></div></div><div class="bg-[#FBF6ED] border border-brass/40 rounded-xl p-6 mt-6"><h3 class="font-playfair text-xl mb-4">Yurisdiksi Layanan</h3><div class="flex flex-wrap gap-2 text-xs"><span class="border border-leather px-3 py-1">Pengadilan Negeri</span><span class="border border-leather px-3 py-1">Pengadilan Niaga</span><span class="border border-leather px-3 py-1">Pengadilan Hubungan Industrial</span><span class="border border-leather px-3 py-1">Pengadilan Agama</span><span class="border border-leather px-3 py-1">PTUN</span><span class="border border-leather px-3 py-1">Pengadilan Tinggi</span><span class="border border-leather px-3 py-1">Mahkamah Agung</span><span class="border border-leather px-3 py-1">Arbitrase &amp; Mediasi</span></div></div></div></section>
<section class="py-20 bg-oak text-parchment">
<div class="max-w-4xl mx-auto px-4 md:px-12 space-y-12">
<div class="text-center space-y-4">
<span class="text-xs font-serif uppercase tracking-widest text-brass font-bold block">Tanya Jawab Hukum</span>
<h2 class="font-playfair text-3xl md:text-5xl font-bold">Pertanyaan Sering Diajukan (FAQ)</h2>
</div>
<div class="space-y-4">
<div class="bg-oak-dark rounded-xl border border-parchment/10 overflow-hidden">
<button class="w-full p-5 text-left font-playfair font-bold text-base text-parchment flex justify-between items-center hover:text-brass transition" onclick="toggleFaq(1)">
<span>Bagaimana skema perhitungan Honorarium / Retainer Hukum di Vanguard Counsel?</span>
<i class="fa-solid fa-plus text-xs text-brass" id="faqIcon-1"></i>
</button>
<div class="hidden p-5 pt-0 text-xs text-parchment/70 font-sans leading-relaxed border-t border-parchment/5" id="faqAns-1">
                        Skema fee disesuaikan dengan jenis perkara: Fixed Retainer bulanan untuk Korporasi, Lump Sum Fee per Tahapan Perkara untuk Litigasi, atau Hourly Rate untuk Legal Opinion &amp; Audit Kontrak. Seluruh rincian dituangkan secara transparan dalam Surat Penawaran Jasa Hukum (Proposal of Legal Services).
                    </div>
</div>
<div class="bg-oak-dark rounded-xl border border-parchment/10 overflow-hidden">
<button class="w-full p-5 text-left font-playfair font-bold text-base text-parchment flex justify-between items-center hover:text-brass transition" onclick="toggleFaq(2)">
<span>Apakah kerahasiaan dokumen saya terjamin saat berkonsultasi?</span>
<i class="fa-solid fa-plus text-xs text-brass" id="faqIcon-2"></i>
</button>
<div class="hidden p-5 pt-0 text-xs text-parchment/70 font-sans leading-relaxed border-t border-parchment/5" id="faqAns-2">
                        Ya, berdasarkan Pasal 19 UU No. 18 Tahun 2003 tentang Advokat, seluruh advokat wajib memegang teguh kerahasiaan hubungan antara Advokat dan Klien. Kami juga menandatangani Non-Disclosure Agreement (NDA) sebelum peninjauan berkas dimulai.
                    </div>
</div>
</div>
</div>
</section>
<footer class="bg-oak-dark border-t border-brass/30 text-parchment py-16 px-4 md:px-12 text-xs">
<div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-12 gap-12">
<div class="md:col-span-5 space-y-4">
<div class="flex items-center space-x-3">
<div class="w-8 h-8 rounded bg-brass text-oak-dark font-playfair text-base font-bold flex items-center justify-center">⚖️</div>
<span class="font-playfair text-xl font-bold tracking-tight text-parchment">VANGUARD HERITAGE COUNSEL</span>
</div>
<p class="text-parchment/60 leading-relaxed font-sans">
                    Kantor Advokat &amp; Legal Consultant berlisensi resmi PERADI. Memberikan perlindungan hukum strategis untuk Korporasi, Individu, dan Lembaga Internasional.
                </p>
<div class="text-[11px] text-brass font-mono">
                    Lokasi Utama: Pacific Century Place Lt. 28, SCBD Lot 10, Jl. Jend. Sudirman, Jakarta Selatan.
                </div>
</div>
<div class="md:col-span-3 space-y-3 font-sans">
<h4 class="font-serif text-brass font-bold uppercase tracking-widest text-[11px]">Bidang Praktik</h4>
<ul class="space-y-2 text-parchment/70">
<li><a class="hover:text-brass" href="#practices">Hukum Bisnis &amp; Korporasi</a></li>
<li><a class="hover:text-brass" href="#practices">Pendampingan Pidana &amp; Tipikor</a></li>
<li><a class="hover:text-brass" href="#practices">Litigasi Perdata &amp; Wanprestasi</a></li>
<li><a class="hover:text-brass" href="#practices">Sengketa Tanah &amp; Properti</a></li>
</ul>
</div>
<div class="md:col-span-4 space-y-3">
<h4 class="font-serif text-brass font-bold uppercase tracking-widest text-[11px]">Surat Edaran Hukum</h4>
<p class="text-parchment/60">Dapatkan analisis regulasi terbaru &amp; Yurisprudensi Mahkamah Agung langsung di email Anda.</p>
<form class="flex gap-2" onsubmit="event.preventDefault(); alert('Terima kasih telah berlangganan edaran hukum Vanguard.');">
<input class="bg-oak border border-brass/30 rounded px-3 py-2 text-xs text-parchment focus:outline-none focus:border-brass flex-1" placeholder="Email Anda" required="" type="email">
<button class="bg-brass text-oak-dark font-serif font-bold px-4 py-2 text-xs uppercase tracking-wider rounded hover:bg-parchment" type="submit">Langganan</button>
</input></form>
</div>
</div>
<div class="max-w-7xl mx-auto mt-8 p-5 border border-brass/20 rounded-lg text-parchment/50 text-[10px]">Legal disclaimer: Informasi situs bersifat umum, bukan nasihat hukum perkara tertentu. Hubungan advokat-klien tidak terbentuk hanya dengan mengakses situs atau mengirim formulir. Jangan kirim data sensitif sebelum kanal resmi disepakati. Verifikasi seluruh profil, lisensi, alamat, tarif, dan klaim template.<div class="max-w-7xl mx-auto pt-12 mt-12 border-t border-parchment/10 flex flex-col sm:flex-row justify-between items-center text-parchment/40 text-[11px] gap-4">
<div>© 2026 Vanguard Heritage Counsel. Hak Cipta Dilindungi Undang-Undang.</div>
<div class="flex space-x-6">
<a class="hover:text-brass" href="#">Kerangka Legal Disclaimer</a>
<a class="hover:text-brass" href="#">Kebijakan Privasi Klien</a>
<a class="hover:text-brass" href="#">Verifikasi Lisensi PERADI</a>
</div>
</div>
</div></footer>
<div class="fixed bottom-6 right-6 z-50 flex items-center space-x-3 pointer-events-auto">
<!-- Floating Emergency Legal WhatsApp Button -->
<a class="relative group w-14 h-14 rounded-full bg-emerald-700 text-white flex items-center justify-center shadow-2xl hover:scale-110 transition duration-300 border-2 border-brass" href="https://wa.me/6281250887790?text=Halo%20Vanguard%20Heritage%20Counsel,%20saya%20membutuhkan%20konsultasi%20hukum%20segera" target="_blank" title="Emergency Legal WhatsApp">
<span class="absolute -inset-1 rounded-full bg-emerald-500 animate-ping opacity-30"></span>
<i class="fa-brands fa-whatsapp text-2xl"></i>
<span class="absolute right-16 top-1/2 -translate-y-1/2 bg-oak text-parchment text-[10px] font-serif uppercase tracking-widest px-3 py-1.5 rounded shadow-lg whitespace-nowrap opacity-0 group-hover:opacity-100 transition duration-300 pointer-events-none border border-brass/40">
                WhatsApp Darurat Hukum
            </span>
</a>
<!-- Floating AI Legal Assistant Button ('LEXIS AI') -->
<button class="relative group w-14 h-14 rounded-full bg-oak text-brass flex items-center justify-center shadow-2xl hover:scale-110 transition duration-300 border-2 border-brass overflow-hidden" onclick="toggleAiModal()" title="LEXIS AI Legal Assistant">
<!-- Animated Rotating Antique Wax Seal & Brass Rings -->
<div class="absolute inset-0 rounded-full border-2 border-dashed border-brass/50 seal-ring-outer pointer-events-none"></div>
<div class="absolute inset-1 rounded-full border border-dotted border-brass/70 seal-ring-inner pointer-events-none"></div>
<!-- Floating Balance Scales Icon -->
<i class="fa-solid fa-scale-balanced text-xl text-brass z-10 group-hover:rotate-12 transition-transform"></i>
<span class="absolute right-16 top-1/2 -translate-y-1/2 bg-oak text-parchment text-[10px] font-serif uppercase tracking-widest px-3 py-1.5 rounded shadow-lg whitespace-nowrap opacity-0 group-hover:opacity-100 transition duration-300 pointer-events-none border border-brass/40">
                LEXIS AI Legal Assistant
            </span>
</button>
</div>
<div class="fixed inset-0 z-50 bg-oak/70 backdrop-blur-sm flex justify-end items-end p-4 md:p-6 hidden transition-all duration-300" id="aiChatModal">
<div class="w-full sm:w-[420px] bg-oak border-2 border-brass rounded-2xl shadow-2xl flex flex-col h-[520px] overflow-hidden text-parchment relative">
<!-- Chat Header -->
<div class="p-4 bg-oak-dark border-b border-brass/30 flex justify-between items-center brass-shimmer">
<div class="flex items-center space-x-3">
<div class="w-9 h-9 rounded-full bg-oak flex items-center justify-center text-brass font-playfair font-bold text-sm border border-brass">
                        ⚖️
                    </div>
<div>
<h4 class="font-playfair text-sm font-bold text-oak-dark">LEXIS AI Legal Advisor</h4>
<span class="text-[10px] text-oak-dark/80 font-mono block">Asisten informasi hukum · Demo</span>
</div>
</div>
<button class="text-oak-dark hover:text-white transition text-lg p-1" onclick="toggleAiModal()">
<i class="fa-solid fa-xmark"></i>
</button>
</div>
<!-- Chat Message History -->
<div class="flex-1 p-4 overflow-y-auto space-y-3 text-xs font-sans" id="aiChatBody">
<div class="p-3 rounded-lg bg-oak-dark border border-brass/20 max-w-[85%] space-y-1">
<p class="font-semibold text-brass font-serif">LEXIS AI Assistant</p>
<p class="text-parchment/90">Salam. Saya asisten intelijen hukum Vanguard. Silakan tanyakan pasal Kitab Undang-Undang, prosedur somasi, atau estimasi penanganan perkara Anda.</p>
</div>
</div>
<!-- Quick Preset Prompts -->
<div class="p-2 bg-oak-dark/50 border-t border-parchment/10 flex gap-2 overflow-x-auto text-[10px] font-mono">
<button class="px-2.5 py-1 bg-oak border border-brass/30 rounded hover:border-brass whitespace-nowrap text-brass" onclick="sendPresetAi('Bagaimana syarat mengajukan gugatan Wanprestasi?')">📜 Wanprestasi</button>
<button class="px-2.5 py-1 bg-oak border border-brass/30 rounded hover:border-brass whitespace-nowrap text-brass" onclick="sendPresetAi('Apa yang harus dilakukan saat terima Surat Somasi?')">✉️ Terima Somasi</button>
<button class="px-2.5 py-1 bg-oak border border-brass/30 rounded hover:border-brass whitespace-nowrap text-brass" onclick="sendPresetAi('Berapa estimasi Honorarium Advokat?')">💰 Retainer Fee</button>
</div>
<!-- Input Form -->
<form class="p-3 bg-oak-dark border-t border-brass/30 flex gap-2 items-center" onsubmit="handleAiChatSubmit(event)">
<input class="flex-1 bg-oak border border-brass/30 rounded-lg px-3 py-2 text-xs text-parchment focus:outline-none focus:border-brass" id="aiInput" placeholder="Ketik pertanyaan hukum Anda..." required="" type="text"/>
<button class="p-2 bg-brass text-oak-dark rounded-lg hover:bg-parchment transition w-9 h-9 flex items-center justify-center font-bold" type="submit">
<i class="fa-solid fa-paper-plane text-xs"></i>
</button>
</form>
</div>
</div>
<div class="fixed inset-0 z-50 bg-oak/80 backdrop-blur-sm flex justify-center items-center p-4 hidden" id="bookingModal">
<div class="w-full max-w-lg bg-parchment rounded-2xl p-6 md:p-8 border-2 border-brass space-y-6 relative text-oak">
<button class="absolute top-4 right-4 text-oak hover:text-leather text-xl" onclick="closeBookingModal()">
<i class="fa-solid fa-xmark"></i>
</button>
<div class="space-y-1">
<span class="text-xs font-serif uppercase tracking-widest text-leather font-bold block">Reservasi Advokat</span>
<h3 class="font-playfair text-2xl font-bold" id="modalTitle">Jadwalkan Konsultasi Khusus</h3>
</div>
<form class="space-y-4 text-xs" onsubmit="handleModalBookingSubmit(event)">
<div>
<label class="block font-bold mb-1">Nama Lengkap Klien</label>
<input class="w-full bg-parchment-dark p-3 rounded border border-oak/20" placeholder="John Doe, S.E." required="" type="text"/>
</div>
<div>
<label class="block font-bold mb-1">Nomor Kontak WhatsApp / Email</label>
<input class="w-full bg-parchment-dark p-3 rounded border border-oak/20" placeholder="0812-xxxx-xxxx" required="" type="text"/>
</div>
<div>
<label class="block font-bold mb-1">Tanggal Konsultasi Disukai</label>
<input class="w-full bg-parchment-dark p-3 rounded border border-oak/20" required="" type="date"/>
</div>
<div>
<label class="block font-bold mb-1">Ringkasan Situasi Perkara</label>
<textarea class="w-full bg-parchment-dark p-3 rounded border border-oak/20" placeholder="Sebutkan konteks perkara atau dokumen terkait..." rows="3"></textarea>
</div>
<button class="w-full py-3 bg-oak text-parchment font-serif uppercase tracking-widest text-xs font-bold rounded hover:bg-leather transition" type="submit">
                    Kirim Permohonan Advokasi
                </button>
</form>
</div>
</div>


<script src="{{ asset('js/website-bisnis/templates/professional-service/lawyer/vanguard/vanguard.js') }}" defer></script>
</body>
</html>
