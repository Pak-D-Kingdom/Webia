<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VERDANT ARCHIVE — Museum Collection &amp; Artifact Database</title>
    <!-- FontAwesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Google Fonts: Newsreader (Archival Serif), Plus Jakarta Sans & IBM Plex Mono (Catalog IDs/Metadata) -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Mono:wght@400;500&family=Newsreader:ital,opsz,wght@0,6..72,400;0,6..72,500;0,6..72,600;1,6..72,400&family=Plus+Jakarta+Sans:wght@400;500;600&display=swap" rel="stylesheet">


    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="verdant-page font-verdant-sans antialiased selection:bg-verdant-sage-600 selection:text-white">

    <!-- =================================================================
         1. TOPBAR & NAVBAR (Clean Archival Header + Functional Links)
         ================================================================= -->
    <header class="sticky top-0 z-40 bg-verdant-paper-50/95 backdrop-blur-md border-b verdant-archival-border">
        <!-- Minimalist Metadata Topbar -->
        <div class="bg-verdant-sage-900 text-verdant-sage-200 text-[11px] py-1.5 px-4 border-b border-verdant-sage-800">
            <div class="max-w-7xl mx-auto flex flex-wrap justify-between items-center gap-2 font-verdant-mono">
                <span>INDEX RELEASE: v2026.11 &bull; 48,920 CATALOGED RECORDS</span>
                <span class="hidden sm:inline text-verdant-sage-300">OPEN ACCESS (CC0) &amp; INSTITUTIONAL METADATA API</span>
            </div>
        </div>

        <nav class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-18 py-4">
                <!-- Brand Logo -->
                <a href="#beranda" class="flex items-center space-x-3 group">
                    <div class="w-9 h-9 border border-verdant-sage-700 bg-verdant-sage-100 flex items-center justify-center text-verdant-sage-900 group-hover:bg-verdant-sage-800 group-hover:text-white transition-colors">
                        <i class="fa-solid fa-box-archive text-sm"></i>
                    </div>
                    <div>
                        <span class="font-verdant-serif text-xl font-semibold tracking-tight text-verdant-sage-950 block leading-none">Verdant Archive</span>
                        <span class="font-verdant-mono text-[10px] uppercase tracking-widest text-verdant-sage-600 block mt-1">Artifact Database</span>
                    </div>
                </a>

                <!-- Desktop Navigation -->
                <div class="hidden md:flex items-center space-x-8 text-xs font-medium tracking-wider uppercase text-verdant-sage-800">
                    <a href="#beranda" class="hover:text-verdant-sage-600 transition-colors">Beranda</a>
                    <a href="#katalog" class="hover:text-verdant-sage-600 transition-colors">Katalog Artefak</a>
                    <a href="#lisensi" class="hover:text-verdant-sage-600 transition-colors">Akses &amp; Lisensi</a>
                    <a href="#faq" class="hover:text-verdant-sage-600 transition-colors">FAQ</a>
                    <a href="#kontak" class="hover:text-verdant-sage-600 transition-colors">Kontak</a>
                </div>

                <!-- Right Action & Mobile Toggle -->
                <div class="flex items-center space-x-3">
                    <a href="#katalog" class="hidden sm:inline-flex items-center gap-2 px-4 py-2 bg-verdant-sage-800 hover:bg-verdant-sage-900 text-white text-xs font-medium tracking-wide transition-colors">
                        <i class="fa-solid fa-magnifying-glass text-[11px]"></i> Telusuri Indeks
                    </a>
                    <button id="mobile-menu-btn" aria-label="Buka Menu" class="md:hidden text-verdant-sage-900 p-2 focus:outline-none">
                        <i class="fa-solid fa-bars text-lg"></i>
                    </button>
                </div>
            </div>

            <!-- Mobile Dropdown Menu -->
            <div id="mobile-menu" class="hidden md:hidden pb-5 pt-2 border-t verdant-archival-border space-y-2.5 text-xs uppercase tracking-wider font-medium text-verdant-sage-900">
                <a href="#beranda" class="mobile-link block py-1.5 hover:text-verdant-sage-600">Beranda</a>
                <a href="#katalog" class="mobile-link block py-1.5 hover:text-verdant-sage-600">Katalog Artefak</a>
                <a href="#lisensi" class="mobile-link block py-1.5 hover:text-verdant-sage-600">Akses &amp; Lisensi</a>
                <a href="#faq" class="mobile-link block py-1.5 hover:text-verdant-sage-600">FAQ</a>
                <a href="#kontak" class="mobile-link block py-1.5 hover:text-verdant-sage-600">Ruang Baca &amp; Kontak</a>
            </div>
        </nav>
    </header>

    <!-- =================================================================
         2. HERO BANNER (Archival Minimalist Index & Search Focus)
         ================================================================= -->
    <section id="beranda" class="border-b verdant-archival-border bg-verdant-paper-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 lg:py-24">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-start">
                
                <!-- Left Column: Archival Statement & Search Bar (7 Cols) -->
                <div class="lg:col-span-7 space-y-6">
                    <div class="inline-flex items-center gap-2 px-3 py-1 bg-verdant-sage-100 border border-verdant-sage-300 text-verdant-sage-800 font-verdant-mono text-xs">
                        <span>REPOSITORY ID: VA-IDN-01</span>
                        <span>&bull;</span>
                        <span>TERVERIFIKASI KURATOR</span>
                    </div>

                    <h1 class="font-verdant-serif text-4xl sm:text-5xl lg:text-[54px] font-normal text-verdant-sage-950 leading-[1.12] tracking-tight">
                        Basis Data Koleksi Museum &amp; <span class="italic text-verdant-sage-700">Dokumentasi Artefak</span> Terbuka.
                    </h1>

                    <p class="text-verdant-sage-800/80 text-base sm:text-lg leading-relaxed max-w-2xl">
                        Akses catatan provenans terstruktur, fotografi pemindaian resolusi tinggi, dan metadata standar internasional untuk penelitian sejarah, kurasi, dan pelestarian budaya.
                    </p>

                    <!-- Interactive Quick Search Box -->
                    <form onsubmit="handleQuickSearch(event)" class="pt-2 max-w-xl">
                        <div class="flex flex-col sm:flex-row border border-verdant-sage-700 bg-white">
                            <input id="archive-search-input" type="text" placeholder="Cari nomor inventaris, era, material, atau asal wilayah..." 
                                   class="flex-1 px-4 py-3.5 text-sm text-verdant-sage-950 placeholder-verdant-sage-500 focus:outline-none">
                            <button type="submit" class="px-6 py-3.5 bg-verdant-sage-800 hover:bg-verdant-sage-950 text-white text-xs font-verdant-mono uppercase tracking-wider transition-colors">
                                Cari Arsip
                            </button>
                        </div>
                        <div class="flex flex-wrap gap-2 mt-3 text-xs text-verdant-sage-700 font-verdant-mono">
                            <span>Populer:</span>
                            <a href="#katalog" class="underline hover:text-verdant-sage-950">#PrasastiBatu</a>
                            <a href="#katalog" class="underline hover:text-verdant-sage-950">#KeramikKlasik</a>
                            <a href="#katalog" class="underline hover:text-verdant-sage-950">#NaskahLontar</a>
                            <a href="#katalog" class="underline hover:text-verdant-sage-950">#Numismatik</a>
                        </div>
                    </form>

                    <!-- Minimalist Taxonomy Stats -->
                    <div class="grid grid-cols-3 gap-6 pt-8 border-t verdant-archival-border max-w-xl">
                        <div>
                            <p class="font-verdant-serif text-3xl text-verdant-sage-950">48.920</p>
                            <p class="font-verdant-mono text-[11px] uppercase text-verdant-sage-600 mt-1">Entri Terkatalog</p>
                        </div>
                        <div>
                            <p class="font-verdant-serif text-3xl text-verdant-sage-950">19</p>
                            <p class="font-verdant-mono text-[11px] uppercase text-verdant-sage-600 mt-1">Museum Kontributor</p>
                        </div>
                        <div>
                            <p class="font-verdant-serif text-3xl text-verdant-sage-950">94%</p>
                            <p class="font-verdant-mono text-[11px] uppercase text-verdant-sage-600 mt-1">Domain Publik (CC0)</p>
                        </div>
                    </div>
                </div>

                <!-- Right Column: Featured Archival Specimen Sheet (5 Cols) -->
                <div class="lg:col-span-5">
                    <div class="border verdant-archival-border bg-white p-5">
                        <div class="flex justify-between items-center border-b verdant-archival-border pb-3 mb-4 font-verdant-mono text-[11px] text-verdant-sage-700">
                            <span>SPECIMEN RECORD // INV. 1904.082</span>
                            <span class="px-2 py-0.5 bg-verdant-sage-100 text-verdant-sage-800">TERDIGITALISASI</span>
                        </div>
                        <div class="aspect-[4/3] bg-verdant-sage-100 overflow-hidden mb-4 border verdant-archival-border">
                            <img src="https://images.unsplash.com/photo-1599420186946-7b6fb4e297f0?auto=format&fit=crop&w=900&q=80" 
                                 alt="Artefak Keramik Klasik dalam Arsip" 
                                 class="w-full h-full object-cover hover:scale-103 transition-transform duration-500">
                        </div>
                        <h2 class="font-verdant-serif text-2xl text-verdant-sage-950">Guci Glasir Seladon Abad ke-13</h2>
                        <dl class="mt-4 pt-3 border-t verdant-archival-border grid grid-cols-2 gap-y-2 text-xs">
                            <dt class="font-verdant-mono text-verdant-sage-600">Material:</dt>
                            <dd class="text-verdant-sage-950 font-medium">Stoneware, Glasir Hijau</dd>
                            <dt class="font-verdant-mono text-verdant-sage-600">Dimensi:</dt>
                            <dd class="text-verdant-sage-950 font-medium">T. 34,2 cm &times; D. 21,8 cm</dd>
                            <dt class="font-verdant-mono text-verdant-sage-600">Provenans:</dt>
                            <dd class="text-verdant-sage-950 font-medium">Koleksi Pesisir Utara Jawa</dd>
                            <dt class="font-verdant-mono text-verdant-sage-600">Status:</dt>
                            <dd class="text-verdant-sage-800 font-medium">Tersedia untuk Sitasi &amp; Unduh</dd>
                        </dl>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- =================================================================
         3. ARTIFACT & COLLECTION CATALOG (Structured Index Cards)
         ================================================================= -->
    <section id="katalog" class="py-20 lg:py-24 border-b verdant-archival-border bg-verdant-paper-100/60">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row md:items-end justify-between mb-12 gap-4">
                <div>
                    <span class="font-verdant-mono text-xs uppercase tracking-widest text-verdant-sage-600">01 // Indeks Spesimen</span>
                    <h2 class="font-verdant-serif text-3xl sm:text-4xl text-verdant-sage-950 mt-1">Katalog Artefak Terkurasi</h2>
                </div>
                <p class="text-sm text-verdant-sage-800/80 max-w-md">
                    Setiap entri dilengkapi nomor inventaris permanen, kondisi konservasi, serta tautan unduhan metadata standar Dublin Core.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- Record 1 -->
                <article class="verdant-archival-card p-5 flex flex-col justify-between" data-archive-record>
                    <div>
                        <div class="flex justify-between items-center font-verdant-mono text-[11px] text-verdant-sage-600 mb-3">
                            <span>INV. 2011.014</span>
                            <span>ABAD KE-15</span>
                        </div>
                        <div class="aspect-[4/3] bg-verdant-sage-100 overflow-hidden mb-4 border verdant-archival-border">
                            <img src="https://images.unsplash.com/photo-1582555172866-f73bb12a2ab3?auto=format&fit=crop&w=800&q=80" 
                                 alt="Manuskrip Lontar dan Kertas" class="w-full h-full object-cover">
                        </div>
                        <span class="inline-block px-2 py-0.5 bg-verdant-sage-100 text-verdant-sage-800 font-verdant-mono text-[10px] uppercase mb-2">Manuskrip &amp; Filologi</span>
                        <h3 class="font-verdant-serif text-xl text-verdant-sage-950 font-medium mb-2">Risalah Astronomi &amp; Pranata Mangsa</h3>
                        <p class="text-xs text-verdant-sage-800/80 leading-relaxed">
                            Naskah tulis tangan di atas kertas dluwang berisi tabel perbintangan dan kalender pertanian tradisional.
                        </p>
                    </div>
                    <div class="mt-5 pt-3 border-t verdant-archival-border flex items-center justify-between font-verdant-mono text-[11px]">
                        <span class="text-verdant-sage-600">TIFF 600 DPI / CC0</span>
                        <a href="#lisensi" class="text-verdant-sage-900 font-medium hover:underline">Lihat Record &rarr;</a>
                    </div>
                </article>

                <!-- Record 2 -->
                <article class="verdant-archival-card p-5 flex flex-col justify-between" data-archive-record>
                    <div>
                        <div class="flex justify-between items-center font-verdant-mono text-[11px] text-verdant-sage-600 mb-3">
                            <span>INV. 1987.309</span>
                            <span>ABAD KE-10</span>
                        </div>
                        <div class="aspect-[4/3] bg-verdant-sage-100 overflow-hidden mb-4 border verdant-archival-border">
                            <img src="https://images.unsplash.com/photo-1566127444979-b3d2b654e3d7?auto=format&fit=crop&w=800&q=80" 
                                 alt="Arca Batu Klasik" class="w-full h-full object-cover">
                        </div>
                        <span class="inline-block px-2 py-0.5 bg-verdant-sage-100 text-verdant-sage-800 font-verdant-mono text-[10px] uppercase mb-2">Arkeologi &amp; Pahat Batu</span>
                        <h3 class="font-verdant-serif text-xl text-verdant-sage-950 font-medium mb-2">Fragmen Relief Teratai Andesit</h3>
                        <p class="text-xs text-verdant-sage-800/80 leading-relaxed">
                            Pemindaian fotogrametri 3D dari fragmen candi batu andesit dengan detail pahatan flora klasik yang terjaga.
                        </p>
                    </div>
                    <div class="mt-5 pt-3 border-t verdant-archival-border flex items-center justify-between font-verdant-mono text-[11px]">
                        <span class="text-verdant-sage-600">OBJ + 8K Texture</span>
                        <a href="#lisensi" class="text-verdant-sage-900 font-medium hover:underline">Lihat Record &rarr;</a>
                    </div>
                </article>

                <!-- Record 3 -->
                <article class="verdant-archival-card p-5 flex flex-col justify-between" data-archive-record>
                    <div>
                        <div class="flex justify-between items-center font-verdant-mono text-[11px] text-verdant-sage-600 mb-3">
                            <span>INV. 2005.118</span>
                            <span>ABAD KE-17</span>
                        </div>
                        <div class="aspect-[4/3] bg-verdant-sage-100 overflow-hidden mb-4 border verdant-archival-border">
                            <img src="https://images.unsplash.com/photo-1518998053901-5348d3961a04?auto=format&fit=crop&w=800&q=80" 
                                 alt="Arsip Lukisan dan Kartografi" class="w-full h-full object-cover">
                        </div>
                        <span class="inline-block px-2 py-0.5 bg-verdant-sage-100 text-verdant-sage-800 font-verdant-mono text-[10px] uppercase mb-2">Kartografi &amp; Arsip Visual</span>
                        <h3 class="font-verdant-serif text-xl text-verdant-sage-950 font-medium mb-2">Peta Topografi Pelabuhan Lama</h3>
                        <p class="text-xs text-verdant-sage-800/80 leading-relaxed">
                            Gambar ukur tata kota pesisir dan benteng maritim dengan anotasi catatan kuratorial terjemahan modern.
                        </p>
                    </div>
                    <div class="mt-5 pt-3 border-t verdant-archival-border flex items-center justify-between font-verdant-mono text-[11px]">
                        <span class="text-verdant-sage-600">GeoTIFF + JSON-LD</span>
                        <a href="#lisensi" class="text-verdant-sage-900 font-medium hover:underline">Lihat Record &rarr;</a>
                    </div>
                </article>
            </div>
        </div>
    </section>

    <!-- =================================================================
         4. ACCESS TIERS, API & INSTITUTIONAL DATASET LICENSING
         ================================================================= -->
    <section id="lisensi" class="py-20 bg-verdant-paper-50 border-b verdant-archival-border">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="mb-12">
                <span class="font-verdant-mono text-xs uppercase tracking-widest text-verdant-sage-600">02 // Akses Data &amp; Lisensi</span>
                <h2 class="font-verdant-serif text-3xl sm:text-4xl text-verdant-sage-950 mt-1">Skema Penggunaan &amp; Kemitraan Riset</h2>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- Tier 1 -->
                <div class="border verdant-archival-border bg-white p-7 flex flex-col justify-between">
                    <div>
                        <span class="font-verdant-mono text-xs text-verdant-sage-600 uppercase">Tier 01 // Publik</span>
                        <h3 class="font-verdant-serif text-2xl text-verdant-sage-950 mt-1">Open-Access Researcher</h3>
                        <p class="font-verdant-serif text-3xl text-verdant-sage-900 mt-4">Gratis <span class="text-xs font-verdant-mono text-verdant-sage-600">/ selamanya</span></p>
                        <ul class="space-y-2.5 text-xs text-verdant-sage-800 mt-6">
                            <li><i class="fa-solid fa-check text-verdant-sage-600 mr-2"></i> Pencarian tanpa batas pada 48.920 record</li>
                            <li><i class="fa-solid fa-check text-verdant-sage-600 mr-2"></i> Unduh gambar web-resolution &amp; sitasi BibTeX</li>
                            <li><i class="fa-solid fa-check text-verdant-sage-600 mr-2"></i> Lisensi Domain Publik (CC0) untuk pendidikan</li>
                        </ul>
                    </div>
                    <a href="#katalog" class="mt-8 block text-center py-3 border border-verdant-sage-800 text-verdant-sage-900 hover:bg-verdant-sage-800 hover:text-white font-verdant-mono text-xs uppercase tracking-wider transition-colors">
                        Mulai Telusuri
                    </a>
                </div>

                <!-- Tier 2 -->
                <div class="border-2 border-verdant-sage-800 bg-verdant-sage-50 p-7 flex flex-col justify-between">
                    <div>
                        <span class="font-verdant-mono text-xs text-verdant-sage-700 uppercase font-medium">Tier 02 // Akademik &amp; Penerbitan</span>
                        <h3 class="font-verdant-serif text-2xl text-verdant-sage-950 mt-1">High-Res Archival Pass</h3>
                        <p class="font-verdant-serif text-3xl text-verdant-sage-950 mt-4">Rp 250.000 <span class="text-xs font-verdant-mono text-verdant-sage-700">/ tahun</span></p>
                        <ul class="space-y-2.5 text-xs text-verdant-sage-900 mt-6">
                            <li><i class="fa-solid fa-check text-verdant-sage-700 mr-2"></i> Unduhan file master TIFF 600 DPI &amp; model 3D</li>
                            <li><i class="fa-solid fa-check text-verdant-sage-700 mr-2"></i> Laporan analisis konservasi &amp; X-Ray lengkap</li>
                            <li><i class="fa-solid fa-check text-verdant-sage-700 mr-2"></i> Izin cetak buku akademik &amp; jurnal ilmiah</li>
                        </ul>
                    </div>
                    <a href="https://wa.me/6281234567890?text=Halo%20Verdant%20Archive%2C%20saya%20ingin%20mendaftar%20High-Res%20Archival%20Pass." target="_blank" class="mt-8 block text-center py-3 bg-verdant-sage-800 hover:bg-verdant-sage-950 text-white font-verdant-mono text-xs uppercase tracking-wider transition-colors">
                        Ajukan Akses Peneliti
                    </a>
                </div>

                <!-- Tier 3 -->
                <div class="border verdant-archival-border bg-white p-7 flex flex-col justify-between">
                    <div>
                        <span class="font-verdant-mono text-xs text-verdant-sage-600 uppercase">Tier 03 // Institusi &amp; API</span>
                        <h3 class="font-verdant-serif text-2xl text-verdant-sage-950 mt-1">Institutional Bulk Dataset</h3>
                        <p class="font-verdant-serif text-3xl text-verdant-sage-900 mt-4">Kustom <span class="text-xs font-verdant-mono text-verdant-sage-600">/ MoU institusi</span></p>
                        <ul class="space-y-2.5 text-xs text-verdant-sage-800 mt-6">
                            <li><i class="fa-solid fa-check text-verdant-sage-600 mr-2"></i> Akses REST API &amp; OAI-PMH metadata harvest</li>
                            <li><i class="fa-solid fa-check text-verdant-sage-600 mr-2"></i> Ekspor dataset massal (CSV, JSON-LD, XML)</li>
                            <li><i class="fa-solid fa-check text-verdant-sage-600 mr-2"></i> Pendampingan integrasi katalog museum mitra</li>
                        </ul>
                    </div>
                    <a href="https://wa.me/6281234567890?text=Halo%20Verdant%20Archive%2C%20kami%20dari%20institusi%20ingin%20konsultasi%20akses%20API%20dan%20dataset%20massal." target="_blank" class="mt-8 block text-center py-3 border border-verdant-sage-800 text-verdant-sage-900 hover:bg-verdant-sage-800 hover:text-white font-verdant-mono text-xs uppercase tracking-wider transition-colors">
                        Hubungi Sekretariat Data
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- =================================================================
         5. FAQ SECTION (Clean Minimalist Accordion)
         ================================================================= -->
    <section id="faq" class="py-20 lg:py-24 bg-verdant-paper-100/60 border-b verdant-archival-border">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="mb-12">
                <span class="font-verdant-mono text-xs uppercase tracking-widest text-verdant-sage-600">03 // Dokumentasi &amp; Bantuan</span>
                <h2 class="font-verdant-serif text-3xl sm:text-4xl text-verdant-sage-950 mt-1">Pertanyaan Umum Arsip</h2>
            </div>

            <div class="divide-y divide-verdant-sage-300 border-y border-verdant-sage-300 bg-white">
                <!-- FAQ 1 -->
                <div>
                    <button onclick="toggleFAQ(1)" class="w-full px-6 py-4 text-left flex items-center justify-between focus:outline-none hover:bg-verdant-sage-50 transition-colors">
                        <span class="font-verdant-serif text-lg sm:text-xl text-verdant-sage-950">Bagaimana standar penulisan sitasi untuk artefak dari basis data ini?</span>
                        <i id="faq-icon-1" class="fa-solid fa-plus text-verdant-sage-700 text-xs transition-transform duration-200 ml-4"></i>
                    </button>
                    <div id="faq-answer-1" class="hidden px-6 pb-5 text-xs sm:text-sm text-verdant-sage-800/85 leading-relaxed border-t border-verdant-sage-100 pt-3">
                        Setiap halaman detail artefak menyediakan tombol salin sitasi otomatis dalam format APA, Chicago, dan BibTeX yang mencantumkan Nomor Inventaris permanen, nama museum penyimpan, serta URL arsip.
                    </div>
                </div>

                <!-- FAQ 2 -->
                <div>
                    <button onclick="toggleFAQ(2)" class="w-full px-6 py-4 text-left flex items-center justify-between focus:outline-none hover:bg-verdant-sage-50 transition-colors">
                        <span class="font-verdant-serif text-lg sm:text-xl text-verdant-sage-950">Apakah peneliti dapat melihat artefak fisik secara langsung di laboratorium konservasi?</span>
                        <i id="faq-icon-2" class="fa-solid fa-plus text-verdant-sage-700 text-xs transition-transform duration-200 ml-4"></i>
                    </button>
                    <div id="faq-answer-2" class="hidden px-6 pb-5 text-xs sm:text-sm text-verdant-sage-800/85 leading-relaxed border-t border-verdant-sage-100 pt-3">
                        Kunjungan ruang baca dan inspeksi fisik spesimen tersedia bagi peneliti terdaftar dengan membuat janji minimal 7 hari kerja sebelumnya melalui sekretariat arsip atau tombol WhatsApp layanan peneliti.
                    </div>
                </div>

                <!-- FAQ 3 -->
                <div>
                    <button onclick="toggleFAQ(3)" class="w-full px-6 py-4 text-left flex items-center justify-between focus:outline-none hover:bg-verdant-sage-50 transition-colors">
                        <span class="font-verdant-serif text-lg sm:text-xl text-verdant-sage-950">Bagaimana cara museum daerah atau yayasan budaya menyumbangkan data koleksi?</span>
                        <i id="faq-icon-3" class="fa-solid fa-plus text-verdant-sage-700 text-xs transition-transform duration-200 ml-4"></i>
                    </button>
                    <div id="faq-answer-3" class="hidden px-6 pb-5 text-xs sm:text-sm text-verdant-sage-800/85 leading-relaxed border-t border-verdant-sage-100 pt-3">
                        Kami membuka program kemitraan digitalisasi bersama museum daerah dan koleksi pribadi bersejarah. Tim kurator data kami akan membantu standardisasi metadata dan pemindaian tanpa mengalihkan hak kepemilikan fisik artefak.
                    </div>
                </div>

                <!-- FAQ 4 -->
                <div>
                    <button onclick="toggleFAQ(4)" class="w-full px-6 py-4 text-left flex items-center justify-between focus:outline-none hover:bg-verdant-sage-50 transition-colors">
                        <span class="font-verdant-serif text-lg sm:text-xl text-verdant-sage-950">Apa kegunaan Asisten Arsip AI pada platform ini?</span>
                        <i id="faq-icon-4" class="fa-solid fa-plus text-verdant-sage-700 text-xs transition-transform duration-200 ml-4"></i>
                    </button>
                    <div id="faq-answer-4" class="hidden px-6 pb-5 text-xs sm:text-sm text-verdant-sage-800/85 leading-relaxed border-t border-verdant-sage-100 pt-3">
                        Asisten Arsip AI membantu mencocokkan kata kunci riset dengan nomor inventaris terkait, merangkum catatan provenans, serta memandu proses permohonan lisensi file resolusi tinggi.
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- =================================================================
         6. FOOTER (Archival Repository Info, Hours & Links)
         ================================================================= -->
    <footer id="kontak" class="bg-verdant-sage-950 text-verdant-sage-200 pt-14 pb-10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-10 pb-12 border-b border-verdant-sage-800">
                <!-- Col 1 -->
                <div class="space-y-3">
                    <div class="flex items-center space-x-2.5">
                        <i class="fa-solid fa-box-archive text-verdant-sage-400"></i>
                        <span class="font-verdant-serif text-xl text-white">Verdant Archive</span>
                    </div>
                    <p class="text-xs text-verdant-sage-300/80 leading-relaxed">
                        Repositori digital terpadu untuk dokumentasi koleksi museum, catatan provenans, dan pelestarian artefak budaya berbasis akses terbuka.
                    </p>
                </div>

                <!-- Col 2 -->
                <div>
                    <h4 class="font-verdant-mono text-xs uppercase tracking-wider text-verdant-sage-400 mb-3">Indeks Situs</h4>
                    <ul class="space-y-2 text-xs">
                        <li><a href="#beranda" class="hover:text-white transition-colors">Beranda Repositori</a></li>
                        <li><a href="#katalog" class="hover:text-white transition-colors">Katalog Artefak</a></li>
                        <li><a href="#lisensi" class="hover:text-white transition-colors">Akses &amp; Lisensi Data</a></li>
                        <li><a href="#faq" class="hover:text-white transition-colors">Panduan &amp; FAQ</a></li>
                    </ul>
                </div>

                <!-- Col 3 -->
                <div>
                    <h4 class="font-verdant-mono text-xs uppercase tracking-wider text-verdant-sage-400 mb-3">Ruang Baca &amp; Jam</h4>
                    <ul class="space-y-2 text-xs text-verdant-sage-300/85 leading-relaxed">
                        <li><i class="fa-solid fa-location-dot text-verdant-sage-400 mr-2"></i> Gedung Dokumentasi Budaya Lt. 3, Pusat Arsip</li>
                        <li><i class="fa-regular fa-clock text-verdant-sage-400 mr-2"></i> Senin – Jumat: 09.00 – 16.30 WIB</li>
                        <li><i class="fa-solid fa-database text-verdant-sage-400 mr-2"></i> Basis Data Daring: 24/7</li>
                    </ul>
                </div>

                <!-- Col 4 -->
                <div>
                    <h4 class="font-verdant-mono text-xs uppercase tracking-wider text-verdant-sage-400 mb-3">Sekretariat Kurator</h4>
                    <p class="text-xs text-verdant-sage-300/80 leading-relaxed mb-3">
                        Korespondensi riset, verifikasi nomor inventaris, dan kemitraan data institusi:
                    </p>
                    <p class="font-verdant-mono text-xs text-white">arsip@verdant-heritage.org</p>
                </div>
            </div>

            <div class="pt-8 flex flex-col sm:flex-row justify-between items-center font-verdant-mono text-[11px] text-verdant-sage-400">
                <p>&copy; 2026 Verdant Archive &amp; Artifact Database.</p>
                <p class="mt-2 sm:mt-0">METADATA STANDARD: DUBLIN CORE / CIDOC-CRM</p>
            </div>
        </div>
    </footer>

    <!-- =================================================================
         7. FLOATING ACTION BUTTONS (AI Archivist Button & WhatsApp Button)
         ================================================================= -->
    <div class="fixed bottom-6 right-6 z-50 flex flex-col items-end space-y-2.5">
        <!-- AI Archivist Button -->
        <button onclick="toggleAIModal()" 
                class="flex items-center gap-2.5 bg-verdant-sage-900 hover:bg-verdant-sage-950 text-white border border-verdant-sage-500 px-4 py-2.5 shadow-xl transition-all hover:scale-103">
            <i class="fa-solid fa-sparkles text-verdant-sage-300 text-xs"></i>
            <span class="font-verdant-mono text-xs uppercase tracking-wider">Asisten Arsip AI</span>
        </button>

        <!-- WhatsApp Button -->
        <a href="https://wa.me/6281234567890?text=Halo%20Verdant%20Archive%2C%20saya%20ingin%20bertanya%20mengenai%20akses%20data%20koleksi%20dan%20lisensi%20artefak." 
           target="_blank" 
           rel="noopener noreferrer"
           aria-label="WhatsApp Layanan Arsip"
           class="flex items-center gap-2.5 bg-[#246B46] hover:bg-[#1D5739] text-white px-4 py-2.5 shadow-xl transition-all hover:scale-103 border border-white/15">
            <i class="fa-brands fa-whatsapp text-lg"></i>
            <span class="font-verdant-mono text-xs uppercase tracking-wider">Layanan Kurator</span>
        </a>
    </div>

    <!-- =================================================================
         AI ARCHIVIST ASSISTANT MODAL
         ================================================================= -->
    <div id="ai-modal" class="hidden fixed inset-0 z-50 bg-verdant-sage-950/75 backdrop-blur-sm flex items-center justify-center p-4">
        <div class="bg-white border border-verdant-sage-700 max-w-md w-full p-6 shadow-2xl relative">
            <button onclick="toggleAIModal()" aria-label="Tutup" class="absolute top-4 right-4 text-verdant-sage-700 hover:text-verdant-sage-950">
                <i class="fa-solid fa-xmark text-lg"></i>
            </button>
            <div class="border-b verdant-archival-border pb-3 mb-4">
                <span class="font-verdant-mono text-[10px] uppercase tracking-widest text-verdant-sage-600">Archival Lookup Assistant</span>
                <h3 class="font-verdant-serif text-xl text-verdant-sage-950">Asisten Basis Data Artefak</h3>
            </div>
            <div id="ai-chat-box" class="bg-verdant-sage-50 border verdant-archival-border p-3.5 h-44 overflow-y-auto text-xs text-verdant-sage-900 space-y-3 mb-4 leading-relaxed">
                <p><strong class="font-verdant-mono text-verdant-sage-700">AI Arsip:</strong> Halo. Masukkan kata kunci artefak, era sejarah, atau pertanyaan seputar format sitasi &amp; lisensi dataset.</p>
            </div>
            <form onsubmit="sendAIMessage(event)" class="flex gap-2">
                <input id="ai-input" type="text" placeholder="Contoh: Sitasi INV. 1904.082 atau akses TIFF..." required
                       class="flex-1 border border-verdant-sage-400 px-3 py-2 text-xs text-verdant-sage-950 focus:outline-none focus:border-verdant-sage-800">
                <button type="submit" class="px-4 py-2 bg-verdant-sage-800 hover:bg-verdant-sage-950 text-white font-verdant-mono text-xs uppercase">
                    Kirim
                </button>
            </form>
        </div>
    </div>

    <!-- =================================================================
         JAVASCRIPT INTERACTIVITY
         ================================================================= -->
    <script>
        // Mobile Menu Toggle
        const mobileBtn = document.getElementById('mobile-menu-btn');
        const mobileMenu = document.getElementById('mobile-menu');
        mobileBtn.addEventListener('click', () => mobileMenu.classList.toggle('hidden'));
        document.querySelectorAll('.mobile-link').forEach(link => {
            link.addEventListener('click', () => mobileMenu.classList.add('hidden'));
        });

        // Search the artifact catalog
        function handleQuickSearch(e) {
            e.preventDefault();
            const query = document.getElementById('archive-search-input').value.trim().toLocaleLowerCase();
            const records = Array.from(document.querySelectorAll('#katalog [data-archive-record]'));
            const matchCount = records.reduce((count, record) => {
                const matches = record.textContent.toLocaleLowerCase().includes(query);
                record.classList.toggle('hidden', !matches);
                return count + Number(matches);
            }, 0);
            document.getElementById('archive-search-status').textContent = query
                ? `${matchCount} record cocok dengan pencarian.`
                : `Menampilkan ${records.length} record.`;
            document.getElementById('katalog').scrollIntoView({ behavior: 'smooth' });
        }

        // FAQ Accordion
        function toggleFAQ(id) {
            const answer = document.getElementById(`faq-answer-${id}`);
            const icon = document.getElementById(`faq-icon-${id}`);
            const isHidden = answer.classList.contains('hidden');

            for (let i = 1; i <= 4; i++) {
                document.getElementById(`faq-answer-${i}`).classList.add('hidden');
                document.getElementById(`faq-icon-${i}`).className = 'fa-solid fa-plus text-verdant-sage-700 text-xs transition-transform duration-200 ml-4';
            }

            if (isHidden) {
                answer.classList.remove('hidden');
                icon.className = 'fa-solid fa-minus text-verdant-sage-900 text-xs transition-transform duration-200 ml-4';
            }
        }

        // AI Archivist Modal
        function toggleAIModal() {
            document.getElementById('ai-modal').classList.toggle('hidden');
        }

        function sendAIMessage(e) {
            e.preventDefault();
            const input = document.getElementById('ai-input');
            const box = document.getElementById('ai-chat-box');
            const text = input.value.trim();
            if (!text) return;

            const userMessage = document.createElement('p');
            const userLabel = document.createElement('strong');
            userLabel.className = 'font-verdant-mono text-verdant-sage-950';
            userLabel.textContent = 'Anda:';
            userMessage.append(userLabel, document.createTextNode(` ${text}`));
            box.append(userMessage);
            input.value = '';

            setTimeout(() => {
                const assistantMessage = document.createElement('p');
                const assistantLabel = document.createElement('strong');
                assistantLabel.className = 'font-verdant-mono text-verdant-sage-700';
                assistantLabel.textContent = 'AI Arsip:';
                assistantMessage.append(assistantLabel, document.createTextNode(` Record terkait tersedia dalam indeks publik (CC0) dengan format metadata Dublin Core. Untuk unduhan file master TIFF 600 DPI atau akses API institusi, silakan hubungi kurator via tombol Layanan Kurator.`));
                box.append(assistantMessage);
                box.scrollTop = box.scrollHeight;
            }, 400);
        }
    </script>
</body>
</html>