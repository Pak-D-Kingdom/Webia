<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aura Amour — Bespoke Wedding & Event Atelier</title>
    <meta name="description" content="Aura Amour adalah perencana dan wedding organizer eksklusif yang mewujudkan pernikahan impian dengan estetika timeless, koordinasi tanpa cela, dan sentuhan personal.">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,400;0,500;0,600;0,700;1,400;1,600&family=Montserrat:wght@300;400;500;600&display=swap" rel="stylesheet">

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        serif: ['"Cormorant Garamond"', 'serif'],
                        sans: ['"Montserrat"', 'sans-serif'],
                    },
                    colors: {
                        champagne: {
                            50: '#fdfbf7',
                            100: '#f9f5ec',
                            200: '#f2e8d3',
                            400: '#dfc28e',
                            500: '#c5a059',
                            600: '#a6823c',
                            800: '#644e24',
                        },
                        blush: '#fcf6f5',
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-[#faf8f5] text-[#332f2c] antialiased font-sans selection:bg-[#dfc28e] selection:text-white">

    <!-- 1. TOPBAR -->
    <div class="bg-[#241f1c] text-[#f2e8d3] text-xs py-2.5 px-4 sm:px-8 border-b border-[#3d3632]">
        <div class="max-w-7xl mx-auto flex flex-wrap justify-between items-center gap-2">
            <div class="flex items-center gap-2">
                <span class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full bg-[#c5a059]/20 text-[#dfc28e] border border-[#c5a059]/40 text-[11px] font-medium tracking-wider">
                    ✦ RESERVASI MUSIM PERNIKAHAN 2026/2027
                </span>
                <span class="hidden md:inline text-zinc-400">· Konsultasi Konsep Intimate & Grand Wedding Gratis</span>
            </div>
            <div class="flex items-center gap-4 text-zinc-400 text-[11px]">
                <span>Atelier: Jakarta & Bali, Indonesia</span>
                <span class="hidden sm:inline">WA: +62 858-5018-0285</span>
            </div>
        </div>
    </div>

    <!-- 2. NAVBAR -->
    <header class="sticky top-0 z-40 bg-[#faf8f5]/95 backdrop-blur-md border-b border-[#e8dfd3]">
        <div class="max-w-7xl mx-auto px-4 sm:px-8 h-20 flex items-center justify-between">
            <a href="#hero" class="flex flex-col">
                <span class="font-serif text-2xl sm:text-3xl font-semibold tracking-[0.2em] text-[#241f1c]">AURA AMOUR</span>
                <span class="text-[9px] tracking-[0.3em] uppercase text-[#a6823c] font-medium -mt-1">WEDDING ATELIER</span>
            </a>

            <nav class="hidden md:flex items-center gap-8 text-xs uppercase tracking-[0.15em] font-medium text-[#5c544d]">
                <a href="#services" class="hover:text-[#a6823c] transition">Layanan</a>
                <a href="#packages" class="hover:text-[#a6823c] transition">Paket Wedding</a>
                <a href="#gallery" class="hover:text-[#a6823c] transition">Galeri Kisah</a>
                <a href="#process" class="hover:text-[#a6823c] transition">Alur Kerja</a>
                <a href="#faq" class="hover:text-[#a6823c] transition">FAQ</a>
            </nav>

            <div class="flex items-center gap-3">
                <a href="#consultation" class="hidden sm:inline-flex items-center gap-2 bg-[#241f1c] hover:bg-[#3d3632] text-[#f2e8d3] text-xs uppercase tracking-widest font-semibold px-5 py-2.5 rounded-full transition shadow-md">
                    Konsultasi <span>↗</span>
                </a>
                <button id="mobileMenuBtn" class="md:hidden p-2 text-[#241f1c]" aria-label="Toggle Menu">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 6h16M4 12h16m-7 6h7"/></svg>
                </button>
            </div>
        </div>

        <!-- Mobile Nav Menu -->
        <div id="mobileMenu" class="hidden md:hidden bg-[#faf8f5] border-b border-[#e8dfd3] px-6 py-4 space-y-3 text-xs uppercase tracking-widest">
            <a href="#services" class="block text-[#5c544d] hover:text-[#a6823c] py-1">Layanan</a>
            <a href="#packages" class="block text-[#5c544d] hover:text-[#a6823c] py-1">Paket Wedding</a>
            <a href="#gallery" class="block text-[#5c544d] hover:text-[#a6823c] py-1">Galeri Kisah</a>
            <a href="#process" class="block text-[#5c544d] hover:text-[#a6823c] py-1">Alur Kerja</a>
            <a href="#faq" class="block text-[#5c544d] hover:text-[#a6823c] py-1">FAQ</a>
            <a href="#consultation" class="block text-[#a6823c] font-bold pt-2">Konsultasi ↗</a>
        </div>
    </header>

    <main>
        <!-- 3. HERO SECTION -->
        <section id="hero" class="relative pt-14 pb-20 md:py-28 overflow-hidden bg-gradient-to-b from-[#faf8f5] via-[#f7f2e8] to-[#faf8f5]">
            <div class="max-w-7xl mx-auto px-4 sm:px-8">
                <div class="grid lg:grid-cols-12 gap-12 items-center">
                    <div class="lg:col-span-7 space-y-6 text-center lg:text-left">
                        <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-[#f2e8d3]/60 border border-[#dfc28e]/50 text-[#8a682c] text-xs tracking-widest uppercase font-medium">
                            ✦ TIMELESS MOMENTS & BESPOKE CELEBRATIONS
                        </div>

                        <h1 class="font-serif text-4xl sm:text-6xl lg:text-7xl font-normal text-[#241f1c] leading-[1.08]">
                            Mewujudkan Cinta Dalam <br>
                            <span class="italic text-[#a6823c] font-light">Keanggunan yang Abadi.</span>
                        </h1>

                        <p class="text-[#6b625b] text-sm sm:text-base leading-relaxed max-w-xl mx-auto lg:mx-0 font-light">
                            Aura Amour merancang perayaan pernikahan Anda dengan sentuhan estetika tinggi, ketelitian setiap detail, dan koordinasi yang tenang tanpa rasa cemas di hari paling bersejarah Anda.
                        </p>

                        <div class="flex flex-wrap justify-center lg:justify-start gap-4 pt-4">
                            <a href="#consultation" class="inline-flex items-center justify-center gap-2 bg-[#241f1c] hover:bg-[#3d3632] text-[#f2e8d3] text-xs uppercase tracking-widest font-semibold px-8 py-3.5 rounded-full transition shadow-lg">
                                Mulai Rancang Pernikahan ↗
                            </a>
                            <a href="#gallery" class="inline-flex items-center justify-center gap-2 bg-transparent hover:bg-[#f2e8d3]/40 text-[#5c544d] border border-[#d9ccba] text-xs uppercase tracking-widest font-medium px-6 py-3.5 rounded-full transition">
                                Lihat Kisah Cinta →
                            </a>
                        </div>

                        <!-- Stats -->
                        <div class="grid grid-cols-3 gap-6 pt-8 border-t border-[#e8dfd3] max-w-md mx-auto lg:mx-0">
                            <div>
                                <div class="font-serif text-3xl font-medium text-[#241f1c]">120+</div>
                                <div class="text-[11px] text-[#8a7f76] tracking-wider uppercase mt-1">Pernikahan Sukses</div>
                            </div>
                            <div>
                                <div class="font-serif text-3xl font-medium text-[#a6823c]">8 TAHUN</div>
                                <div class="text-[11px] text-[#8a7f76] tracking-wider uppercase mt-1">Dedikasi Atelier</div>
                            </div>
                            <div>
                                <div class="font-serif text-3xl font-medium text-[#241f1c]">100%</div>
                                <div class="text-[11px] text-[#8a7f76] tracking-wider uppercase mt-1">Ketenangan Hati</div>
                            </div>
                        </div>
                    </div>

                    <!-- Visual Frame -->
                    <div class="lg:col-span-5">
                        <div class="relative p-3 bg-white border border-[#e8dfd3] rounded-3xl shadow-xl">
                            <div class="rounded-2xl overflow-hidden aspect-[4/5] relative">
                                <img src="https://images.unsplash.com/photo-1519741497674-611481863552?auto=format&fit=crop&w=800&q=80" alt="Wedding Couple" class="w-full h-full object-cover">
                                <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent"></div>
                                <div class="absolute bottom-6 left-6 right-6 text-white text-center">
                                    <span class="font-serif italic text-2xl">Julian & Clara</span>
                                    <p class="text-[11px] tracking-widest uppercase opacity-80 mt-1">Intimate Clifftop Celebration · Bali</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- 4. SERVICES SECTION -->
        <section id="services" class="py-20 bg-white border-t border-[#e8dfd3]">
            <div class="max-w-7xl mx-auto px-4 sm:px-8">
                <div class="text-center max-w-2xl mx-auto mb-16">
                    <span class="text-[#a6823c] text-xs font-semibold tracking-widest uppercase">OUR EXPERTISE</span>
                    <h2 class="font-serif text-3xl sm:text-5xl font-normal text-[#241f1c] mt-1">Layanan Perencanaan Penuh</h2>
                    <p class="text-[#6b625b] text-xs sm:text-sm mt-2 font-light">Kami hadir untuk memastikan setiap fase persiapan hingga eksekusi hari-H berjalan sempurna dan harmonis.</p>
                </div>

                <div class="grid md:grid-cols-3 gap-8">
                    <!-- Service 1 -->
                    <div class="bg-[#faf8f5] border border-[#e8dfd3] p-8 rounded-2xl space-y-4 hover:border-[#c5a059] transition duration-300">
                        <span class="text-2xl">💍</span>
                        <h3 class="font-serif text-2xl font-normal text-[#241f1c]">Full-Service Wedding Planning</h3>
                        <p class="text-[#6b625b] text-xs leading-relaxed font-light">
                            Pendampingan komprehensif mulai dari pemilihan tema, manajemen anggaran, seleksi seluruh vendor (dekorasi, katering, gaun, fotografi), hingga technical meeting menyeluruh.
                        </p>
                        <div class="text-[11px] text-[#a6823c] uppercase tracking-wider font-medium pt-2">Dari Hari Pertama Persiapan →</div>
                    </div>

                    <!-- Service 2 -->
                    <div class="bg-[#faf8f5] border border-[#e8dfd3] p-8 rounded-2xl space-y-4 hover:border-[#c5a059] transition duration-300">
                        <span class="text-2xl">🕊️</span>
                        <h3 class="font-serif text-2xl font-normal text-[#241f1c]">Wedding Day Coordination</h3>
                        <p class="text-[#6b625b] text-xs leading-relaxed font-light">
                            Bagi pasangan yang telah memilih vendor sendiri. Tim profesional kami mengambil alih rundown hari-H 1 bulan sebelum acara untuk memastikan alur prosesi berjalan tepat waktu.
                        </p>
                        <div class="text-[11px] text-[#a6823c] uppercase tracking-wider font-medium pt-2">Koordinasi Hari-H Sempurna →</div>
                    </div>

                    <!-- Service 3 -->
                    <div class="bg-[#faf8f5] border border-[#e8dfd3] p-8 rounded-2xl space-y-4 hover:border-[#c5a059] transition duration-300">
                        <span class="text-2xl">🌿</span>
                        <h3 class="font-serif text-2xl font-normal text-[#241f1c]">Destination & Intimate Wedding</h3>
                        <p class="text-[#6b625b] text-xs leading-relaxed font-light">
                            Perencanaan khusus pernikahan di lokasi eksotis seperti Bali, Labuan Bajo, maupun venue heritage Jawa. Mengatur akomodasi tamu, logistik, dan pengalaman tak terlupakan.
                        </p>
                        <div class="text-[11px] text-[#a6823c] uppercase tracking-wider font-medium pt-2">Bespoke Destination Event →</div>
                    </div>
                </div>
            </div>
        </section>

        <!-- 5. WEDDING PACKAGES -->
        <section id="packages" class="py-20 bg-[#f7f2e8] border-t border-[#e8dfd3]">
            <div class="max-w-7xl mx-auto px-4 sm:px-8">
                <div class="text-center max-w-2xl mx-auto mb-16">
                    <span class="text-[#a6823c] text-xs font-semibold tracking-widest uppercase">CURATED PACKAGES</span>
                    <h2 class="font-serif text-3xl sm:text-5xl font-normal text-[#241f1c] mt-1">Pilihan Paket Wedding</h2>
                    <p class="text-[#6b625b] text-xs sm:text-sm mt-2 font-light">Transparan, dapat disesuaikan dengan impian dan kebutuhan keluarga kedua mempelai.</p>
                </div>

                <div class="grid md:grid-cols-3 gap-8 items-stretch">
                    <!-- Package 1 -->
                    <div class="bg-white border border-[#e8dfd3] rounded-3xl p-8 flex flex-col justify-between">
                        <div class="space-y-4">
                            <span class="text-[11px] uppercase tracking-widest text-[#a6823c] font-medium">INTIMATE GATHERING</span>
                            <h3 class="font-serif text-3xl font-normal text-[#241f1c]">Amour Petite</h3>
                            <p class="text-[#6b625b] text-xs font-light leading-relaxed">Dirancang untuk pernikahan hangat dan personal hingga 100 tamu undangan.</p>
                            <div class="font-serif text-3xl text-[#241f1c] pt-2">
                                Rp28.000.000
                            </div>
                            <ul class="text-xs text-[#5c544d] space-y-2.5 pt-4 border-t border-[#f2e8d3]">
                                <li>✔ 6 Kru Profesional di Hari-H</li>
                                <li>✔ Pembuatan Rundown & Time Schedule</li>
                                <li>✔ Koordinasi 1 Bulan Sebelum Acara</li>
                                <li>✔ Gladi Resik & Pengawalan Akad/Pemberkatan</li>
                            </ul>
                        </div>
                        <a href="#consultation" class="mt-8 text-center bg-[#faf8f5] hover:bg-[#f2e8d3] border border-[#d9ccba] text-[#241f1c] text-xs uppercase tracking-widest font-semibold py-3 rounded-full transition">Pilih Amour Petite</a>
                    </div>

                    <!-- Package 2 (Featured) -->
                    <div class="bg-white border-2 border-[#c5a059] rounded-3xl p-8 flex flex-col justify-between relative shadow-xl">
                        <div class="absolute -top-3 left-1/2 -translate-x-1/2 bg-[#c5a059] text-white text-[10px] uppercase tracking-widest font-bold px-4 py-1 rounded-full">
                            SIGNATURE FAVORITE
                        </div>
                        <div class="space-y-4">
                            <span class="text-[11px] uppercase tracking-widest text-[#a6823c] font-medium">GRAND CELEBRATION</span>
                            <h3 class="font-serif text-3xl font-normal text-[#241f1c]">Aura Royal Grand</h3>
                            <p class="text-[#6b625b] text-xs font-light leading-relaxed">Paket komprehensif untuk resepsi ballroom atau outdoor berkapasitas 300–800 tamu.</p>
                            <div class="font-serif text-3xl text-[#a6823c] pt-2">
                                Rp48.000.000
                            </div>
                            <ul class="text-xs text-[#5c544d] space-y-2.5 pt-4 border-t border-[#f2e8d3]">
                                <li>✔ 12 Kru Berpengalaman + 1 Event Director</li>
                                <li>✔ Pendampingan Fitting Gaun & Food Tasting</li>
                                <li>✔ VIP Guest & Family Assistance Khusus</li>
                                <li>✔ Koordinasi Vendor Dekorasi, Lighting & Band</li>
                                <li>✔ Souvenir & Angpao Management System</li>
                            </ul>
                        </div>
                        <a href="#consultation" class="mt-8 text-center bg-[#241f1c] hover:bg-[#3d3632] text-[#f2e8d3] text-xs uppercase tracking-widest font-semibold py-3.5 rounded-full transition shadow-md">Konsultasi Royal Grand ↗</a>
                    </div>

                    <!-- Package 3 -->
                    <div class="bg-white border border-[#e8dfd3] rounded-3xl p-8 flex flex-col justify-between">
                        <div class="space-y-4">
                            <span class="text-[11px] uppercase tracking-widest text-[#a6823c] font-medium">EXQUISITE EXPERIENCES</span>
                            <h3 class="font-serif text-3xl font-normal text-[#241f1c]">Bespoke Destination</h3>
                            <p class="text-[#6b625b] text-xs font-light leading-relaxed">Perencanaan pernikahan luxury di Bali atau destinasi impian Anda.</p>
                            <div class="font-serif text-3xl text-[#241f1c] pt-2">
                                Rp65.000.000
                            </div>
                            <ul class="text-xs text-[#5c544d] space-y-2.5 pt-4 border-t border-[#f2e8d3]">
                                <li>✔ Tim Khusus On-Site 3 Hari Sebelum Acara</li>
                                <li>✔ Koordinasi Welcome Dinner & After Party</li>
                                <li>✔ Airport Transfer & Guest Hospitality Desk</li>
                                <li>✔ Full Creative Concept & Styling Direction</li>
                            </ul>
                        </div>
                        <a href="#consultation" class="mt-8 text-center bg-[#faf8f5] hover:bg-[#f2e8d3] border border-[#d9ccba] text-[#241f1c] text-xs uppercase tracking-widest font-semibold py-3 rounded-full transition">Pilih Destination</a>
                    </div>
                </div>
            </div>
        </section>

        <!-- 6. LOVE STORIES & GALLERY -->
        <section id="gallery" class="py-20 bg-white border-t border-[#e8dfd3]">
            <div class="max-w-7xl mx-auto px-4 sm:px-8">
                <div class="text-center max-w-2xl mx-auto mb-16">
                    <span class="text-[#a6823c] text-xs font-semibold tracking-widest uppercase">LOVE ARCHIVE</span>
                    <h2 class="font-serif text-3xl sm:text-5xl font-normal text-[#241f1c] mt-1">Galeri Momen Berharga</h2>
                    <p class="text-[#6b625b] text-xs sm:text-sm mt-2 font-light">Setiap cinta memiliki narasinya sendiri. Lihat keindahan hari bahagia pasangan yang telah mempercayai kami.</p>
                </div>

                <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                    <div class="aspect-[3/4] rounded-2xl overflow-hidden group">
                        <img src="https://images.unsplash.com/photo-1583939003579-730e3918a45a?auto=format&fit=crop&w=600&q=80" alt="Moment 1" class="w-full h-full object-cover group-hover:scale-105 transition duration-500" loading="lazy" decoding="async">
                    </div>
                    <div class="aspect-[3/4] rounded-2xl overflow-hidden group">
                        <img src="https://images.unsplash.com/photo-1511285560929-80b456fea0bc?auto=format&fit=crop&w=600&q=80" alt="Moment 2" class="w-full h-full object-cover group-hover:scale-105 transition duration-500" loading="lazy" decoding="async">
                    </div>
                    <div class="aspect-[3/4] rounded-2xl overflow-hidden group">
                        <img src="https://images.unsplash.com/photo-1465495976277-4387d4b0b4c6?auto=format&fit=crop&w=600&q=80" alt="Moment 3" class="w-full h-full object-cover group-hover:scale-105 transition duration-500" loading="lazy" decoding="async">
                    </div>
                    <div class="aspect-[3/4] rounded-2xl overflow-hidden group">
                        <img src="https://images.unsplash.com/photo-1520854221256-17451cc331bf?auto=format&fit=crop&w=600&q=80" alt="Moment 4" class="w-full h-full object-cover group-hover:scale-105 transition duration-500" loading="lazy" decoding="async">
                    </div>
                </div>
            </div>
        </section>

        <!-- 7. FAQ ACCORDION -->
        <section id="faq" class="py-20 bg-[#faf8f5] border-t border-[#e8dfd3]">
            <div class="max-w-4xl mx-auto px-4 sm:px-8">
                <div class="text-center mb-14">
                    <span class="text-[#a6823c] text-xs font-semibold tracking-widest uppercase">FAQ</span>
                    <h2 class="font-serif text-3xl sm:text-4xl font-normal text-[#241f1c] mt-1">Frequently Asked Questions</h2>
                    <p class="text-[#6b625b] text-xs sm:text-sm mt-2 font-light">Pertanyaan yang sering diajukan calon pengantin seputar alur kerja kami.</p>
                </div>

                <div class="space-y-4">
                    <div class="bg-white border border-[#e8dfd3] rounded-2xl overflow-hidden">
                        <button type="button" class="w-full p-5 text-left flex justify-between items-center text-sm font-medium text-[#241f1c] hover:text-[#a6823c] transition" onclick="toggleWeddingFaq(this)">
                            <span>1. Kapan waktu paling ideal untuk mulai memesan jasa WO?</span>
                            <span class="faq-icon text-[#a6823c] text-lg font-serif">+</span>
                        </button>
                        <div class="faq-answer hidden px-5 pb-5 text-xs text-[#6b625b] leading-relaxed border-t border-[#f2e8d3] pt-3 font-light">
                            Untuk paket Full Planning, waktu terbaik adalah 6 hingga 12 bulan sebelum tanggal pernikahan guna mengamankan ketersediaan venue dan vendor favorit. Untuk paket Wedding Day Coordination, pemesanan dapat dilakukan 2 hingga 4 bulan sebelumnya.
                        </div>
                    </div>

                    <div class="bg-white border border-[#e8dfd3] rounded-2xl overflow-hidden">
                        <button type="button" class="w-full p-5 text-left flex justify-between items-center text-sm font-medium text-[#241f1c] hover:text-[#a6823c] transition" onclick="toggleWeddingFaq(this)">
                            <span>2. Apakah kami bebas memilih vendor sendiri?</span>
                            <span class="faq-icon text-[#a6823c] text-lg font-serif">+</span>
                        </button>
                        <div class="faq-answer hidden px-5 pb-5 text-xs text-[#6b625b] leading-relaxed border-t border-[#f2e8d3] pt-3 font-light">
                            Tentu saja! Kami sangat fleksibel. Anda dapat memilih vendor rekomendasi pilihan kami atau membawa vendor impian Anda sendiri, dan kami akan mengorkestrasi semuanya dalam satu komando yang selaras.
                        </div>
                    </div>

                    <div class="bg-white border border-[#e8dfd3] rounded-2xl overflow-hidden">
                        <button type="button" class="w-full p-5 text-left flex justify-between items-center text-sm font-medium text-[#241f1c] hover:text-[#a6823c] transition" onclick="toggleWeddingFaq(this)">
                            <span>3. Bagaimana sistem pembayaran paket Aura Amour?</span>
                            <span class="faq-icon text-[#a6823c] text-lg font-serif">+</span>
                        </button>
                        <div class="faq-answer hidden px-5 pb-5 text-xs text-[#6b625b] leading-relaxed border-t border-[#f2e8d3] pt-3 font-light">
                            Pembayaran dibagi menjadi 3 termin: Down Payment (DP) 30% untuk mengunci tanggal acara, 40% setelah technical meeting final dengan seluruh vendor (H-1 bulan), dan pelunasan 30% maksimal H-7 sebelum hari acara.
                        </div>
                    </div>

                    <div class="bg-white border border-[#e8dfd3] rounded-2xl overflow-hidden">
                        <button type="button" class="w-full p-5 text-left flex justify-between items-center text-sm font-medium text-[#241f1c] hover:text-[#a6823c] transition" onclick="toggleWeddingFaq(this)">
                            <span>4. Apakah Aura Amour menangani pernikahan adat tradisional?</span>
                            <span class="faq-icon text-[#a6823c] text-lg font-serif">+</span>
                        </button>
                        <div class="faq-answer hidden px-5 pb-5 text-xs text-[#6b625b] leading-relaxed border-t border-[#f2e8d3] pt-3 font-light">
                            Ya, tim kami sangat terbiasa mengawal prosesi adat (Jawa, Sunda, Minang, Batak, dll.) dengan panduan sesepuh adat dan pemangku adat terpercaya agar seluruh rangkaian sakral berlangsung khidmat.
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- 8. CONSULTATION FORM -->
        <section id="consultation" class="py-20 bg-gradient-to-b from-[#241f1c] to-[#1a1715] text-[#f2e8d3]">
            <div class="max-w-3xl mx-auto px-4 sm:px-8">
                <div class="bg-white/5 border border-[#dfc28e]/30 rounded-3xl p-8 sm:p-12 shadow-2xl backdrop-blur-sm">
                    <div class="text-center mb-8">
                        <span class="text-[#dfc28e] text-xs font-semibold uppercase tracking-widest">PRIVATE ATELIER SESSION</span>
                        <h2 class="font-serif text-3xl sm:text-4xl font-normal text-white mt-1">Konsultasikan Hari Bahagiamu</h2>
                        <p class="text-zinc-400 text-xs sm:text-sm mt-1 font-light">Ceritakan visi pernikahan Anda, kami akan menyusunkan proposal konsep awal secara gratis.</p>
                    </div>

                    <form onsubmit="handleWeddingSubmit(event)" class="space-y-4">
                        <div class="grid sm:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-xs uppercase tracking-wider text-[#dfc28e] mb-1">Nama Pasangan</label>
                                <input type="text" id="wedName" required placeholder="Contoh: Ryan & Jessica" class="w-full bg-white/10 border border-[#dfc28e]/40 rounded-xl px-4 py-2.5 text-xs text-white focus:outline-none focus:border-[#dfc28e]">
                            </div>
                            <div>
                                <label class="block text-xs uppercase tracking-wider text-[#dfc28e] mb-1">Nomor WhatsApp</label>
                                <input type="tel" id="wedPhone" required placeholder="08xxxxxxxxxx" class="w-full bg-white/10 border border-[#dfc28e]/40 rounded-xl px-4 py-2.5 text-xs text-white focus:outline-none focus:border-[#dfc28e]">
                            </div>
                        </div>

                        <div class="grid sm:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-xs uppercase tracking-wider text-[#dfc28e] mb-1">Rencana Tanggal / Bulan</label>
                                <input type="text" id="wedDate" required placeholder="Bulan / Tahun (cth: Desember 2026)" class="w-full bg-white/10 border border-[#dfc28e]/40 rounded-xl px-4 py-2.5 text-xs text-white focus:outline-none focus:border-[#dfc28e]">
                            </div>
                            <div>
                                <label class="block text-xs uppercase tracking-wider text-[#dfc28e] mb-1">Estimasi Tamu</label>
                                <select id="wedGuest" class="w-full bg-[#241f1c] border border-[#dfc28e]/40 rounded-xl px-4 py-2.5 text-xs text-white focus:outline-none">
                                    <option>Intimate (< 150 Tamu)</option>
                                    <option>Medium (150 - 400 Tamu)</option>
                                    <option>Grand Ballroom (400 - 1000 Tamu)</option>
                                    <option>Destination Wedding (Bali / Luar Kota)</option>
                                </select>
                            </div>
                        </div>

                        <button type="submit" class="w-full bg-[#c5a059] hover:bg-[#b58f48] text-[#1a1715] font-semibold py-3.5 rounded-full transition text-xs uppercase tracking-widest shadow-xl">
                            Reservasi Konsultasi via WhatsApp ↗
                        </button>
                    </form>
                </div>
            </div>
        </section>
    </main>

    <!-- 9. FOOTER -->
    <footer class="bg-[#1a1715] text-[#a69c92] text-xs py-14 border-t border-[#2e2925]">
        <div class="max-w-7xl mx-auto px-4 sm:px-8">
            <div class="grid grid-cols-2 md:grid-cols-5 gap-8 pb-10 border-b border-[#2e2925]">
                <div class="col-span-2 space-y-3">
                    <div class="font-serif text-2xl text-[#f2e8d3] tracking-widest">
                        AURA AMOUR
                    </div>
                    <p class="text-xs leading-relaxed max-w-sm font-light">
                        Bespoke wedding and event atelier. Creating timeless celebration of love with thoughtful care.
                    </p>
                </div>

                <div class="space-y-2">
                    <p class="font-serif text-sm text-[#f2e8d3] uppercase tracking-wider">Layanan</p>
                    <ul class="space-y-1.5 font-light">
                        <li><a href="#services" class="hover:text-white">Full Planning</a></li>
                        <li><a href="#services" class="hover:text-white">Day-Of Coordination</a></li>
                        <li><a href="#services" class="hover:text-white">Destination Event</a></li>
                    </ul>
                </div>

                <div class="space-y-2">
                    <p class="font-serif text-sm text-[#f2e8d3] uppercase tracking-wider">Atelier</p>
                    <ul class="space-y-1.5 font-light">
                        <li><a href="#packages" class="hover:text-white">Paket Wedding</a></li>
                        <li><a href="#gallery" class="hover:text-white">Kisah Pengantin</a></li>
                        <li><a href="#faq" class="hover:text-white">FAQ</a></li>
                    </ul>
                </div>

                <div class="col-span-2 md:col-span-1 space-y-2">
                    <p class="font-serif text-sm text-[#f2e8d3] uppercase tracking-wider">Kontak</p>
                    <p>Menteng, Jakarta Pusat</p>
                    <p>Seminyak, Bali</p>
                    <p>WA: +62 858-5018-0285</p>
                </div>
            </div>

            <div class="pt-8 flex flex-col sm:flex-row justify-between items-center gap-4 text-[11px] text-[#736a61]">
                <p>&copy; 2026 Aura Amour Wedding Atelier. All rights reserved.</p>
                <p>Website template by <strong class="text-[#dfc28e]">WEBIA</strong></p>
            </div>
        </div>
    </footer>

    <!-- 10. FLOATING WHATSAPP BUTTON -->
    <a href="https://wa.me/6285850180285?text=Halo%20Aura%20Amour%20Wedding,%20kami%20ingin%20konsultasi%20paket%20pernikahan." target="_blank" rel="noopener noreferrer" class="fixed bottom-6 left-6 z-50 flex items-center gap-2 bg-[#25D366] hover:bg-[#20bd5a] text-white px-4 py-3 rounded-full shadow-2xl transition duration-300 font-medium text-xs tracking-wide">
        <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/></svg>
        <span>WhatsApp WO</span>
    </a>

    <!-- 11. FLOATING AI ASSISTANT -->
    <button onclick="toggleWeddingBot()" class="fixed bottom-6 right-6 z-50 flex items-center gap-2 bg-[#241f1c] text-[#dfc28e] border border-[#dfc28e]/50 px-4.5 py-3 rounded-full shadow-2xl transition duration-300 font-medium text-xs tracking-wider">
        <span class="w-2 h-2 rounded-full bg-[#dfc28e] animate-ping"></span>
        <span>✦ Amour Concierge</span>
    </button>

    <!-- AI Bot Modal -->
    <div id="weddingBotModal" class="hidden fixed bottom-22 right-6 z-50 w-80 sm:w-96 bg-[#faf8f5] border border-[#e8dfd3] rounded-2xl shadow-2xl overflow-hidden flex flex-col h-[460px]">
        <div class="bg-[#241f1c] p-3.5 flex justify-between items-center text-[#f2e8d3]">
            <div class="flex items-center gap-2">
                <span class="font-serif text-[#dfc28e] text-base">✦</span>
                <div>
                    <h4 class="font-serif text-sm tracking-widest text-[#f2e8d3]">AURA CONCIERGE</h4>
                    <span class="text-[10px] text-[#dfc28e]">Wedding Planner AI</span>
                </div>
            </div>
            <button onclick="toggleWeddingBot()" class="text-zinc-400 hover:text-white text-lg p-1">&times;</button>
        </div>

        <div id="weddingBotMessages" class="p-4 flex-1 overflow-y-auto space-y-3 text-xs">
            <div class="bg-white border border-[#e8dfd3] p-3 rounded-2xl rounded-tl-none text-[#5c544d]">
                Selamat datang di Aura Amour Atelier ✦ Ada yang bisa kami bantu seputar konsep, paket pernikahan, atau estimasi tanggal acara Anda?
            </div>

            <div class="space-y-1.5 pt-1">
                <button onclick="sendWedQuick('Berapa harga paket pernikahan di Aura Amour?')" class="w-full text-left bg-white hover:bg-[#f2e8d3]/50 text-[#5c544d] p-2 rounded-lg border border-[#e8dfd3] transition">
                    💍 Berapa biaya paket pernikahan?
                </button>
                <button onclick="sendWedQuick('Kapan waktu ideal mulai persiapan?')" class="w-full text-left bg-white hover:bg-[#f2e8d3]/50 text-[#5c544d] p-2 rounded-lg border border-[#e8dfd3] transition">
                    ⏳ Kapan waktu terbaik mulai booking WO?
                </button>
                <button onclick="sendWedQuick('Apakah bisa wedding adat tradisional?')" class="w-full text-left bg-white hover:bg-[#f2e8d3]/50 text-[#5c544d] p-2 rounded-lg border border-[#e8dfd3] transition">
                    🕊️ Apakah menangani prosesi adat?
                </button>
            </div>
        </div>

        <div class="p-2.5 bg-white border-t border-[#e8dfd3] flex gap-2">
            <input type="text" id="weddingBotInput" placeholder="Tanya tentang paket / venue..." onkeydown="if(event.key==='Enter') sendWedCustom()" class="flex-1 bg-[#faf8f5] border border-[#e8dfd3] rounded-xl px-3 py-2 text-xs text-[#241f1c] placeholder-[#998f86] focus:outline-none focus:border-[#a6823c]">
            <button onclick="sendWedCustom()" class="bg-[#241f1c] text-[#dfc28e] font-semibold px-3 py-2 rounded-xl text-xs">
                Kirim
            </button>
        </div>
    </div>

    <script>
        const mobileMenuBtn = document.getElementById('mobileMenuBtn');
        const mobileMenu = document.getElementById('mobileMenu');
        if (mobileMenuBtn && mobileMenu) {
            mobileMenuBtn.addEventListener('click', () => {
                mobileMenu.classList.toggle('hidden');
            });
        }

        function toggleWeddingFaq(btn) {
            const answer = btn.nextElementSibling;
            const icon = btn.querySelector('.faq-icon');
            const isHidden = answer.classList.contains('hidden');

            document.querySelectorAll('.faq-answer').forEach(el => el.classList.add('hidden'));
            document.querySelectorAll('.faq-icon').forEach(el => el.textContent = '+');

            if (isHidden) {
                answer.classList.remove('hidden');
                icon.textContent = '−';
            }
        }

        function toggleWeddingBot() {
            document.getElementById('weddingBotModal').classList.toggle('hidden');
        }

        function sendWedQuick(q) {
            appendWedUser(q);
            let reply = "Terima kasih! Wedding planner kami dengan senang hati menyambut Anda untuk sesi konsultasi tatap muka atau via WhatsApp melalui tombol hijau di kiri bawah!";
            if (q.includes('harga')) {
                reply = "Paket kami mulai dari Rp28 Juta (Amour Petite untuk intimate wedding), Rp48 Juta (Aura Royal Grand untuk 300-800 tamu), dan Rp65 Juta untuk Bespoke Destination Wedding di Bali.";
            } else if (q.includes('waktu')) {
                reply = "Idealnya 6 hingga 12 bulan sebelum acara untuk paket Full Planning, atau minimal 2 bulan sebelum acara untuk Day-Of Coordination.";
            } else if (q.includes('adat')) {
                reply = "Tentu! Kami berpengalaman mengawal prosesi adat Jawa (Siraman, Midodareni), Sunda, Minang, hingga Batak dengan pemangku adat terpercaya.";
            }
            setTimeout(() => appendWedBot(reply), 500);
        }

        function sendWedCustom() {
            const input = document.getElementById('weddingBotInput');
            const val = input.value.trim();
            if (!val) return;
            appendWedUser(val);
            input.value = '';
            setTimeout(() => {
                appendWedBot("Pertanyaan yang sangat indah. Mengenai '" + val + "', Anda dapat langsung terhubung dengan tim wedding consultant kami melalui tombol WhatsApp untuk penawaran khusus! 💍");
            }, 600);
        }

        function appendWedUser(msg) {
            const box = document.getElementById('weddingBotMessages');
            const div = document.createElement('div');
            div.className = "bg-[#241f1c] text-[#dfc28e] p-2.5 rounded-2xl rounded-tr-none text-xs ml-auto max-w-[85%]";
            div.textContent = msg;
            box.appendChild(div);
            box.scrollTop = box.scrollHeight;
        }

        function appendWedBot(msg) {
            const box = document.getElementById('weddingBotMessages');
            const div = document.createElement('div');
            div.className = "bg-white border border-[#e8dfd3] text-[#5c544d] p-2.5 rounded-2xl rounded-tl-none text-xs mr-auto max-w-[85%]";
            div.textContent = msg;
            box.appendChild(div);
            box.scrollTop = box.scrollHeight;
        }

        function handleWeddingSubmit(e) {
            e.preventDefault();
            const name = document.getElementById('wedName').value;
            const phone = document.getElementById('wedPhone').value;
            const date = document.getElementById('wedDate').value;
            const guest = document.getElementById('wedGuest').value;

            const text = encodeURIComponent(
                `Halo Aura Amour Atelier! Kami ingin konsultasi wedding:\n\n` +
                `*Nama Pasangan:* ${name}\n` +
                `*WhatsApp:* ${phone}\n` +
                `*Perkiraan Waktu:* ${date}\n` +
                `*Estimasi Tamu:* ${guest}\n\n` +
                `Mohon informasi ketersediaan jadwal konsultasi privat. Terima kasih!`
            );
            window.open(`https://wa.me/6285850180285?text=${text}`, '_blank');
        }
    </script>
</body>
</html>
