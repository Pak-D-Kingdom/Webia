<!DOCTYPE html>
<html lang="id" class="scroll-smooth dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REVOLT // IMPACT — Social Organization | WEBIA</title>

    <link rel="stylesheet"
        href="{{ asset('css/website-bisnis/templates/nonprofit-community/social-organization/revolt-impact/revolt-impact.css') }}">

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    colors: {
                        darkBg: '#0A050E',
                        surfaceBg: '#120A1A',
                        cardBg: '#1A0F26',
                        hotPink: '#FF007F',
                        magenta: '#D100D1',
                        acidLime: '#CCFF00',
                        pureWhite: '#FFFFFF',
                        mutedGray: '#A090B0'
                    },
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                        display: ['Space Grotesk', 'sans-serif']
                    },
                    boxShadow: {
                        'neon-pink': '0 0 30px rgba(255, 0, 127, 0.6), 0 0 60px rgba(255, 0, 127, 0.3)',
                        'neon-lime': '0 0 30px rgba(204, 255, 0, 0.6), 0 0 60px rgba(204, 255, 0, 0.3)',
                        'neon-magenta': '0 0 30px rgba(209, 0, 209, 0.6)'
                    }
                }
            }
        }
    </script>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=Space+Grotesk:wght@500;700;900&family=Fira+Code:wght@400;700&display=swap"
        rel="stylesheet">

    <!-- FontAwesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body
    class="bg-darkBg text-pureWhite font-sans antialiased selection:bg-acidLime selection:text-darkBg overflow-x-hidden">

    <!-- CUSTOM CYBER CURSOR -->
    <div id="cursor-dot"></div>
    <div id="cursor-ring"></div>

    <!-- 1. TOPBAR TICKER -->
    <div
        class="bg-gradient-to-r from-hotPink via-magenta to-acidLime text-darkBg font-display font-black text-xs md:text-sm py-2 px-4 relative overflow-hidden z-50 border-b border-acidLime/30">

        <div class="ticker-track whitespace-nowrap uppercase tracking-wider">

            <span class="mx-8 flex items-center gap-2">
                <i class="fa-solid fa-bolt text-darkBg"></i>
                CYBER SOLIDARITY INDEX: 248,910 ACTIVISTS ACTIVE
            </span>

            <span class="mx-8 flex items-center gap-2">
                <i class="fa-solid fa-fire text-hotPink"></i>
                EMERGENCY ALERT: PAPUA & SUMATRA REFORESTATION OPEN
            </span>

            <span class="mx-8 flex items-center gap-2">
                <i class="fa-solid fa-shield-halved text-magenta"></i>
                100% BLOCKCHAIN AUDITED DONATION FLOW
            </span>

            <span class="mx-8 flex items-center gap-2">
                <i class="fa-solid fa-bolt text-darkBg"></i>
                CYBER SOLIDARITY INDEX: 248,910 ACTIVISTS ACTIVE
            </span>

            <span class="mx-8 flex items-center gap-2">
                <i class="fa-solid fa-fire text-hotPink"></i>
                EMERGENCY ALERT: PAPUA & SUMATRA REFORESTATION OPEN
            </span>

            <span class="mx-8 flex items-center gap-2">
                <i class="fa-solid fa-shield-halved text-magenta"></i>
                100% BLOCKCHAIN AUDITED DONATION FLOW
            </span>

        </div>
    </div>

    <!-- 2. NAVBAR -->
    <header class="sticky top-0 z-40 cyber-glass border-b border-white/10 transition-all duration-300">

        <div class="w-full max-w-[1500px] mx-auto px-4 sm:px-6 xl:px-8 h-20 flex items-center justify-between gap-4">

            <a href="#" class="flex items-center gap-3 group">

                <div class="w-10 h-10 rounded-xl bg-gradient-to-tr from-hotPink to-acidLime p-0.5 animate-spin"
                    style="animation-duration: 12s;">

                    <div
                        class="w-full h-full bg-darkBg rounded-[10px] flex items-center justify-center font-display font-black text-acidLime text-lg">
                        R
                    </div>

                </div>

                <span
                    class="font-display font-black text-2xl tracking-wider text-pureWhite group-hover:text-acidLime transition-colors">
                    REVOLT<span class="text-hotPink">//</span>IMPACT
                </span>

            </a>

            <nav class="hidden min-[1536px]:flex items-center justify-center gap-5 2xl:gap-7 flex-1 font-display font-bold text-xs uppercase tracking-widest text-mutedGray whitespace-nowrap"
                <a href="#about" class="hover:text-acidLime transition-colors flex items-center gap-1">
                <span class="text-hotPink">//</span> Manifesto
                </a>

                <a href="#map" class="hover:text-acidLime transition-colors flex items-center gap-1">
                    <span class="text-hotPink">//</span> Peta Isu
                </a>

                <a href="#causes" class="hover:text-acidLime transition-colors flex items-center gap-1">
                    <span class="text-hotPink">//</span> Gerakan
                </a>

                <a href="#action-hub" class="hover:text-acidLime transition-colors flex items-center gap-1">
                    <span class="text-hotPink">//</span> Aksi Kilat
                </a>

                <a href="#generator" class="hover:text-acidLime transition-colors flex items-center gap-1">
                    <span class="text-hotPink">//</span> Mission Generator
                </a>

                <a href="#transparency" class="hover:text-acidLime transition-colors flex items-center gap-1">
                    <span class="text-hotPink">//</span> Transparansi
                </a>

            </nav>

            <div class="hidden min-[1536px]:flex items-center gap-4 shrink-0">

                <button onclick="openModal('joinModal')"
                    class="relative group overflow-hidden rounded-full p-0.5 font-display font-bold text-xs uppercase tracking-wider">

                    <span
                        class="absolute inset-0 bg-gradient-to-r from-hotPink via-magenta to-acidLime animate-pulse"></span>

                    <span
                        class="relative block px-6 py-2.5 rounded-full bg-darkBg text-pureWhite group-hover:bg-opacity-0 group-hover:text-darkBg transition-all">
                        Gabung Gerakan <i class="fa-solid fa-arrow-right ml-1"></i>
                    </span>

                </button>

            </div>

            <button id="mobileMenuBtn" class="min-[1536px]:hidden text-acidLime text-2xl focus:outline-none shrink-0"
                aria-label="Buka menu navigasi" aria-expanded="false" aria-controls="mobileMenu">
                <i class="fa-solid fa-bars-staggered"></i>
            </button>

        </div>


        <div id="mobileMenu"
            class="hidden lg:hidden cyber-glass px-6 py-6 border-t border-white/10 font-display font-bold text-sm max-h-[75vh] overflow-y-auto">

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">

                <a href="#about" class="mobile-nav-link">01. Manifesto</a>
                <a href="#map" class="mobile-nav-link">02. Peta Isu</a>
                <a href="#causes" class="mobile-nav-link">03. Gerakan</a>
                <a href="#action-hub" class="mobile-nav-link">04. Aksi Kilat</a>
                <a href="#action-wall" class="mobile-nav-link">05. Dinding Aksi</a>
                <a href="#timeline" class="mobile-nav-link">06. Jejak Perubahan</a>
                <a href="#skill-exchange" class="mobile-nav-link">07. Skill Exchange</a>
                <a href="#campaign" class="mobile-nav-link">08. Campaign</a>
                <a href="#volunteer" class="mobile-nav-link">09. Relawan</a>
                <a href="#transparency" class="mobile-nav-link">10. Transparansi</a>
                <a href="#generator" class="mobile-nav-link">11. Mission Generator</a>
                <a href="#event-rsvp" class="mobile-nav-link">12. Event & RSVP</a>
                <a href="#faq" class="mobile-nav-link">13. FAQ</a>

            </div>

            <button onclick="openModal('joinModal')"
                class="w-full bg-acidLime text-darkBg font-bold py-3 rounded-xl text-center mt-6">
                Gabung Gerakan
            </button>
        </div>

    </header>

    <!-- 3. REVOLUTIONARY HERO SECTION -->
    <section class="relative min-h-[95vh] flex items-center justify-center overflow-hidden px-4 py-16">

        <canvas id="heroCanvas" class="absolute inset-0 w-full h-full pointer-events-auto z-0"></canvas>

        <div class="max-w-6xl mx-auto text-center relative z-10 space-y-8 pointer-events-none">

            <div
                class="pointer-events-auto inline-flex items-center gap-3 px-5 py-2 rounded-full cyber-glass border border-acidLime/40 text-xs font-mono text-acidLime mb-2 shadow-neon-lime">

                <span class="w-2.5 h-2.5 rounded-full bg-hotPink animate-ping"></span>

                [ REVOLUTIONARY SOCIAL ENGINE V3.0 ONLINE ]

            </div>

            <h1
                class="font-display font-black text-5xl sm:text-7xl md:text-8xl lg:text-9xl tracking-tighter uppercase leading-none pointer-events-auto">

                <span class="glitch-text text-pureWhite" data-text="BREAK SILENCE.">
                    BREAK SILENCE.
                </span>

                <br>

                <span class="bg-gradient-to-r from-hotPink via-magenta to-acidLime bg-clip-text text-transparent">
                    IGNITE THE REVOLT.
                </span>

            </h1>

            <p
                class="max-w-3xl mx-auto text-mutedGray text-base sm:text-lg md:text-xl font-normal leading-relaxed pointer-events-auto">
                Bukan sekadar yayasan biasa. Kami adalah kolektif radikal berbasis teknologi & aksi langsung tanpa
                birokrasi gelap. Hancurkan ketidakadilan sosial, krisis iklim, dan monopoli edukasi.
            </p>

            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 max-w-4xl mx-auto pt-4 pointer-events-auto">

                <div class="tilt-card cyber-glass p-5 rounded-2xl border border-hotPink/30 hover:border-acidLime transition-all group text-left cursor-pointer"
                    onclick="createParticleBurst(event)">

                    <div class="text-xs font-mono text-hotPink mb-1">// STAGE 01</div>

                    <div class="font-display font-bold text-lg text-pureWhite group-hover:text-acidLime">
                        ACT NOW OR NEVER
                    </div>

                    <p class="text-xs text-mutedGray mt-1">
                        Sistem mikro-akuisisi aksi sosial instant 60 detik.
                    </p>

                </div>

                <div class="tilt-card cyber-glass p-5 rounded-2xl border border-acidLime/30 hover:border-hotPink transition-all group text-left cursor-pointer"
                    onclick="createParticleBurst(event)">

                    <div class="text-xs font-mono text-acidLime mb-1">// STAGE 02</div>

                    <div class="font-display font-bold text-lg text-pureWhite group-hover:text-hotPink">
                        100% OPEN LEDGER
                    </div>

                    <p class="text-xs text-mutedGray mt-1">
                        Audit aliran dana transparan berbasis blockchain ledger.
                    </p>

                </div>

                <div class="tilt-card cyber-glass p-5 rounded-2xl border border-magenta/30 hover:border-acidLime transition-all group text-left cursor-pointer"
                    onclick="createParticleBurst(event)">

                    <div class="text-xs font-mono text-magenta mb-1">// STAGE 03</div>

                    <div class="font-display font-bold text-lg text-pureWhite group-hover:text-acidLime">
                        RADICAL NETWORK
                    </div>

                    <p class="text-xs text-mutedGray mt-1">
                        Jaringan gotong-royong skill exchange desentralisir.
                    </p>

                </div>

            </div>

            <div class="pt-6 pointer-events-auto flex flex-col sm:flex-row items-center justify-center gap-6">

                <a href="#causes"
                    class="relative group overflow-hidden px-10 py-5 rounded-full font-display font-black text-sm uppercase tracking-widest text-darkBg bg-acidLime shadow-neon-lime transition-all transform hover:scale-105">

                    <span class="relative z-10 flex items-center gap-2">
                        Masuki Portal Aksi <i class="fa-solid fa-bolt"></i>
                    </span>

                    <span
                        class="absolute inset-0 bg-gradient-to-r from-hotPink to-magenta opacity-0 group-hover:opacity-100 transition-opacity"></span>

                </a>

                <a href="#map"
                    class="cyber-glass px-8 py-5 rounded-full font-display font-bold text-sm uppercase tracking-widest text-pureWhite hover:border-acidLime transition-all flex items-center gap-2">
                    <i class="fa-solid fa-radar text-acidLime animate-pulse"></i>
                    Jelajahi Peta Krisis
                </a>

            </div>

        </div>
    </section>

    <!-- 4. LIVE IMPACT COUNTER -->
    <section class="py-16 bg-surfaceBg border-y border-white/10 relative overflow-hidden">

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-center">

                <div class="cyber-glass p-6 rounded-3xl border border-white/5 relative group">
                    <div class="font-display font-black text-4xl lg:text-5xl text-acidLime counter"
                        data-target="125000">0</div>
                    <div class="text-xs font-mono uppercase text-mutedGray mt-2">Pohon Ditanam</div>
                </div>

                <div class="cyber-glass p-6 rounded-3xl border border-white/5 relative group">
                    <div class="font-display font-black text-4xl lg:text-5xl text-hotPink">
                        Rp <span class="counter" data-target="4.2">0</span>B+
                    </div>
                    <div class="text-xs font-mono uppercase text-mutedGray mt-2">Dana Tersalurkan</div>
                </div>

                <div class="cyber-glass p-6 rounded-3xl border border-white/5 relative group">
                    <div class="font-display font-black text-4xl lg:text-5xl text-magenta counter"
                        data-target="89000">0</div>
                    <div class="text-xs font-mono uppercase text-mutedGray mt-2">Komunitas Terhubung</div>
                </div>

                <div class="cyber-glass p-6 rounded-3xl border border-white/5 relative group">
                    <div class="font-display font-black text-4xl lg:text-5xl text-pureWhite counter"
                        data-target="320">0</div>
                    <div class="text-xs font-mono uppercase text-mutedGray mt-2">Aksi Sosial Lapangan</div>
                </div>

            </div>

        </div>
    </section>

    <!-- 5. INTERACTIVE CYBER SOCIAL ISSUE MAP -->
    <section id="map" class="py-24 px-4 sm:px-6 lg:px-8 max-w-7xl mx-auto">

        <div class="text-center max-w-3xl mx-auto mb-16 space-y-4">

            <span class="text-acidLime font-mono text-xs uppercase tracking-widest">
                // CRISIS RADAR MAP V2
            </span>

            <h2 class="font-display font-black text-3xl sm:text-5xl uppercase">
                Peta Isu Sosial Interaktif
            </h2>

            <p class="text-mutedGray text-sm">
                Gunakan radar krisis di bawah ini. Klik titik panas untuk mengakses laporan dan opsi bantuan langsung.
            </p>

        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 items-center">

            <div
                class="lg:col-span-2 cyber-glass p-6 rounded-3xl relative min-h-[440px] flex items-center justify-center border border-hotPink/30 overflow-hidden">

                <canvas id="mapCanvas" class="w-full h-full absolute inset-0 cursor-crosshair"></canvas>

                <div
                    class="absolute bottom-4 left-4 pointer-events-none text-xs font-mono text-mutedGray bg-darkBg/80 p-2 rounded-lg border border-white/10">
                    STATUS:
                    <span class="text-acidLime animate-pulse">RADAR SCANNING ONLINE</span>
                </div>

            </div>

            <div class="cyber-glass p-8 rounded-3xl space-y-6 border border-acidLime/30" id="mapInfoCard">

                <div class="inline-block px-3 py-1 rounded-full bg-hotPink/20 text-hotPink font-mono text-xs uppercase"
                    id="mapRegionTag">
                    Wilayah: PAPUA UTARA
                </div>

                <h3 class="font-display font-bold text-2xl text-pureWhite" id="mapRegionTitle">
                    Penyelamatan Hutan Adat
                </h3>

                <p class="text-mutedGray text-sm leading-relaxed" id="mapRegionDesc">
                    Intervensi darurat terhadap deforestasi liar seluas 1.200 Ha. Penanaman kembali spesies pohon
                    endemik & pemasangan sensor pemantau liar.
                </p>

                <div class="space-y-3 pt-2">

                    <div class="flex justify-between text-xs font-mono">
                        <span class="text-mutedGray">Target Pemulihan:</span>
                        <span class="text-acidLime font-bold" id="mapRegionProgress">78%</span>
                    </div>

                    <div class="w-full bg-darkBg h-2.5 rounded-full overflow-hidden p-0.5 border border-white/10">
                        <div class="bg-gradient-to-r from-hotPink via-magenta to-acidLime h-full rounded-full transition-all duration-700"
                            id="mapProgressBar" style="width: 78%"></div>
                    </div>

                </div>

                <button onclick="openModal('joinModal')"
                    class="w-full bg-hotPink text-pureWhite font-display font-bold py-3.5 rounded-xl hover:shadow-neon-pink transition-all text-sm uppercase tracking-wider">
                    Kirim Bantuan Ke Wilayah Ini
                </button>

            </div>

        </div>
    </section>
    <div class="space-y-3 pt-2">
        <div class="flex justify-between text-xs font-mono"><span class="text-mutedGray">TARGET PROGRES</span><span
                class="text-acidLime" id="mapProgressText">68%</span></div>
        <div class="w-full bg-darkBg rounded-full h-2 overflow-hidden">
            <div id="mapProgressBar" class="h-full bg-gradient-to-r from-hotPink to-acidLime rounded-full"
                style="width:68%"></div>
        </div>
    </div>
    <button onclick="openModal('joinModal')"
        class="w-full bg-acidLime text-darkBg font-display font-bold py-3 rounded-xl text-xs uppercase tracking-widest hover:shadow-neon-lime transition-all">Bantu
        Wilayah Ini <i class="fa-solid fa-arrow-right ml-1"></i></button>
    </div>
    </div>
    </section>

    <!-- 6. CHOOSE YOUR CAUSE -->
    <section id="causes" class="py-24 bg-surfaceBg px-4 sm:px-6 lg:px-8">
        <div class="max-w-7xl mx-auto">
            <div class="flex flex-col md:flex-row justify-between items-end gap-6 mb-12">
                <div class="space-y-4 max-w-2xl">
                    <span class="text-hotPink font-mono text-xs uppercase tracking-widest">// CHOOSE YOUR BATTLE</span>
                    <h2 class="font-display font-black text-3xl sm:text-5xl uppercase">Setiap Isu Butuh Aksi.</h2>
                    <p class="text-mutedGray text-sm">Pilih isu yang paling dekat denganmu. Setiap kontribusi, sekecil
                        apa pun, bisa menggerakkan perubahan.</p>
                </div>
                <span class="font-mono text-xs text-acidLime border border-acidLime/30 px-4 py-2 rounded-full">04
                    ACTIVE CAMPAIGNS</span>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-5">
                <article class="cause-card cyber-glass rounded-3xl overflow-hidden border border-hotPink/30 group">
                    <div
                        class="h-48 bg-gradient-to-br from-hotPink/30 to-purple-900/40 flex items-center justify-center relative overflow-hidden">
                        <i
                            class="fa-solid fa-tree text-7xl text-acidLime/80 group-hover:scale-125 transition-transform duration-500"></i>
                        <span
                            class="absolute top-4 left-4 bg-darkBg/80 text-acidLime text-[10px] font-mono px-3 py-1 rounded-full">ENVIRONMENT</span>
                    </div>
                    <div class="p-6 space-y-4">
                        <h3 class="font-display font-bold text-xl">Pulihkan Hutan Kita</h3>
                        <p class="text-mutedGray text-xs leading-relaxed">Gerakan restorasi hutan dan perlindungan
                            ekosistem bersama komunitas lokal.</p>
                        <button onclick="selectCause('Restorasi Hutan')"
                            class="text-hotPink font-display font-bold text-xs uppercase tracking-widest hover:text-acidLime">Dukung
                            Misi <i class="fa-solid fa-arrow-right ml-1"></i></button>
                    </div>
                </article>
                <article class="cause-card cyber-glass rounded-3xl overflow-hidden border border-acidLime/30 group">
                    <div
                        class="h-48 bg-gradient-to-br from-lime-900/30 to-emerald-900/40 flex items-center justify-center relative overflow-hidden">
                        <i
                            class="fa-solid fa-book-open-reader text-7xl text-hotPink/80 group-hover:scale-125 transition-transform duration-500"></i>
                        <span
                            class="absolute top-4 left-4 bg-darkBg/80 text-hotPink text-[10px] font-mono px-3 py-1 rounded-full">EDUCATION</span>
                    </div>
                    <div class="p-6 space-y-4">
                        <h3 class="font-display font-bold text-xl">Akses Edukasi Digital</h3>
                        <p class="text-mutedGray text-xs leading-relaxed">Buka akses perangkat, literasi, dan kelas
                            digital untuk wilayah yang membutuhkan.</p>
                        <button onclick="selectCause('Edukasi Digital')"
                            class="text-hotPink font-display font-bold text-xs uppercase tracking-widest hover:text-acidLime">Dukung
                            Misi <i class="fa-solid fa-arrow-right ml-1"></i></button>
                    </div>
                </article>
                <article class="cause-card cyber-glass rounded-3xl overflow-hidden border border-magenta/30 group">
                    <div
                        class="h-48 bg-gradient-to-br from-fuchsia-900/30 to-pink-900/40 flex items-center justify-center relative overflow-hidden">
                        <i
                            class="fa-solid fa-scale-balanced text-7xl text-acidLime/80 group-hover:scale-125 transition-transform duration-500"></i>
                        <span
                            class="absolute top-4 left-4 bg-darkBg/80 text-acidLime text-[10px] font-mono px-3 py-1 rounded-full">EQUALITY</span>
                    </div>
                    <div class="p-6 space-y-4">
                        <h3 class="font-display font-bold text-xl">Ruang Aman & Setara</h3>
                        <p class="text-mutedGray text-xs leading-relaxed">Dorong lingkungan yang inklusif, aman, dan
                            setara bagi setiap individu.</p>
                        <button onclick="selectCause('Kesetaraan dan Ruang Aman')"
                            class="text-hotPink font-display font-bold text-xs uppercase tracking-widest hover:text-acidLime">Dukung
                            Misi <i class="fa-solid fa-arrow-right ml-1"></i></button>
                    </div>
                </article>
                <article class="cause-card cyber-glass rounded-3xl overflow-hidden border border-white/20 group">
                    <div
                        class="h-48 bg-gradient-to-br from-indigo-900/30 to-purple-900/40 flex items-center justify-center relative overflow-hidden">
                        <i
                            class="fa-solid fa-hand-holding-heart text-7xl text-hotPink/80 group-hover:scale-125 transition-transform duration-500"></i>
                        <span
                            class="absolute top-4 left-4 bg-darkBg/80 text-hotPink text-[10px] font-mono px-3 py-1 rounded-full">HUMANITY</span>
                    </div>
                    <div class="p-6 space-y-4">
                        <h3 class="font-display font-bold text-xl">Bantuan Kemanusiaan</h3>
                        <p class="text-mutedGray text-xs leading-relaxed">Hubungkan bantuan darurat dengan kebutuhan
                            nyata masyarakat terdampak.</p>
                        <button onclick="selectCause('Bantuan Kemanusiaan')"
                            class="text-hotPink font-display font-bold text-xs uppercase tracking-widest hover:text-acidLime">Dukung
                            Misi <i class="fa-solid fa-arrow-right ml-1"></i></button>
                    </div>
                </article>
            </div>
        </div>
    </section>

    <!-- 7. ONE MINUTE ACTION HUB -->
    <section id="action-hub" class="py-24 px-4 sm:px-6 lg:px-8 max-w-7xl mx-auto">
        <div class="grid lg:grid-cols-2 gap-12 items-center">
            <div class="space-y-6">
                <span class="text-acidLime font-mono text-xs uppercase tracking-widest">// MICRO-ACTION PROTOCOL</span>
                <h2 class="font-display font-black text-4xl sm:text-6xl uppercase leading-tight">Satu Menitmu.<br><span
                        class="text-hotPink">Satu Perubahan.</span></h2>
                <p class="text-mutedGray text-sm leading-relaxed">Tidak punya banyak waktu? Mulai dari aksi sederhana
                    yang bisa dilakukan sekarang. Pilih satu misi singkat dan sebarkan dampaknya.</p>
                <div class="flex items-center gap-4 text-xs font-mono text-mutedGray"><span
                        class="w-2 h-2 bg-acidLime rounded-full animate-pulse"></span> 60-SECOND ACTION PROTOCOL</div>
            </div>
            <div class="cyber-glass rounded-3xl p-8 border border-acidLime/30 space-y-6">
                <div class="flex justify-between items-center"><span class="text-hotPink font-mono text-xs">// QUICK
                        MISSION</span><span class="text-acidLime text-xs font-mono">01 / 03</span></div>
                <h3 id="quickMissionTitle" class="font-display font-black text-2xl">Bagikan Informasi Edukasi</h3>
                <p id="quickMissionDesc" class="text-mutedGray text-sm">Sebarkan satu informasi edukatif dari sumber
                    tepercaya kepada tiga orang di sekitarmu.</p>
                <div class="flex gap-2"><button onclick="nextMission()"
                        class="flex-1 border border-white/20 text-white py-3 rounded-xl text-xs font-bold uppercase">Misi
                        Lain</button><button onclick="completeMission()"
                        class="flex-1 bg-acidLime text-darkBg py-3 rounded-xl text-xs font-bold uppercase">Selesaikan
                        <i class="fa-solid fa-check ml-1"></i></button></div>
            </div>
        </div>
    </section>

    <!-- 8. COMMUNITY ACTION WALL -->
    <section class="py-24 bg-surfaceBg px-4 sm:px-6 lg:px-8">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-12 space-y-4"><span
                    class="text-hotPink font-mono text-xs uppercase tracking-widest">// COMMUNITY SIGNAL</span>
                <h2 class="font-display font-black text-3xl sm:text-5xl uppercase">Dinding Aksi Komunitas</h2>
                <p class="text-mutedGray text-sm">Sinyal kecil dari orang-orang yang memilih untuk bergerak.</p>
            </div>
            <div id="actionWall" class="grid md:grid-cols-3 gap-5">
                <div class="cyber-glass rounded-2xl p-6 border border-hotPink/20">
                    <div class="text-acidLime text-xs font-mono mb-3">● FIELD UPDATE / 09:42</div>
                    <p class="text-sm leading-relaxed">"Berhasil mengumpulkan 30 buku bacaan untuk taman belajar akhir
                        pekan."</p>
                    <div class="text-mutedGray text-xs mt-4">— Komunitas Baca Bersama</div>
                </div>
                <div class="cyber-glass rounded-2xl p-6 border border-acidLime/20">
                    <div class="text-hotPink text-xs font-mono mb-3">● DIGITAL ACTION / 11:15</div>
                    <p class="text-sm leading-relaxed">"Membagikan panduan keamanan digital ke grup warga dan sekolah."
                    </p>
                    <div class="text-mutedGray text-xs mt-4">— Relawan Digital</div>
                </div>
                <div class="cyber-glass rounded-2xl p-6 border border-magenta/20">
                    <div class="text-acidLime text-xs font-mono mb-3">● GREEN MOVEMENT / 14:20</div>
                    <p class="text-sm leading-relaxed">"Menanam 120 bibit mangrove bersama warga pesisir."</p>
                    <div class="text-mutedGray text-xs mt-4">— Pesisir Lestari</div>
                </div>
            </div>
        </div>
    </section>

    <!-- 9. IMPACT TIMELINE -->
    <section class="py-24 px-4 sm:px-6 lg:px-8 max-w-6xl mx-auto">
        <div class="text-center mb-14 space-y-4"><span
                class="text-acidLime font-mono text-xs uppercase tracking-widest">// PROGRESS LOG</span>
            <h2 class="font-display font-black text-3xl sm:text-5xl uppercase">Jejak Perubahan</h2>
        </div>
        <div class="relative border-l border-hotPink/40 ml-4 md:ml-10 space-y-10">
            <div class="relative pl-8"><span
                    class="absolute -left-[7px] top-1 w-3 h-3 bg-acidLime rounded-full shadow-neon-lime"></span><span
                    class="text-hotPink font-mono text-xs">2024 / FOUNDATION</span>
                <h3 class="font-display font-bold text-xl mt-2">Gerakan Pertama Dimulai</h3>
                <p class="text-mutedGray text-sm mt-2">Menghubungkan komunitas lokal dan relawan lintas bidang.</p>
            </div>
            <div class="relative pl-8"><span
                    class="absolute -left-[7px] top-1 w-3 h-3 bg-hotPink rounded-full shadow-neon-pink"></span><span
                    class="text-acidLime font-mono text-xs">2025 / EXPANSION</span>
                <h3 class="font-display font-bold text-xl mt-2">Kolaborasi Lintas Wilayah</h3>
                <p class="text-mutedGray text-sm mt-2">Memperluas program pendidikan, lingkungan, dan bantuan
                    kemanusiaan.</p>
            </div>
            <div class="relative pl-8"><span
                    class="absolute -left-[7px] top-1 w-3 h-3 bg-magenta rounded-full"></span><span
                    class="text-hotPink font-mono text-xs">2026 / OPEN MOVEMENT</span>
                <h3 class="font-display font-bold text-xl mt-2">Aksi Terbuka untuk Semua</h3>
                <p class="text-mutedGray text-sm mt-2">Membuka ruang partisipasi digital dan aksi nyata bagi lebih
                    banyak orang.</p>
            </div>
        </div>
    </section>

    <!-- 10. SKILL EXCHANGE -->
    <section class="py-24 bg-surfaceBg px-4 sm:px-6 lg:px-8">
        <div class="max-w-7xl mx-auto grid lg:grid-cols-2 gap-12 items-center">
            <div class="space-y-5"><span class="text-hotPink font-mono text-xs uppercase tracking-widest">// GIVE WHAT
                    YOU KNOW</span>
                <h2 class="font-display font-black text-3xl sm:text-5xl uppercase">Keahlianmu Bisa Jadi Gerakan.</h2>
                <p class="text-mutedGray text-sm leading-relaxed">Tidak semua kontribusi harus berupa uang. Tukarkan
                    keahlianmu dengan kebutuhan komunitas dan bantu gerakan tumbuh bersama.</p><button
                    onclick="openModal('joinModal')"
                    class="bg-acidLime text-darkBg px-7 py-3 rounded-full font-display font-bold text-xs uppercase">Tawarkan
                    Keahlian</button>
            </div>
            <div class="grid grid-cols-2 gap-4">
                <div class="cyber-glass p-6 rounded-2xl border border-hotPink/20"><i
                        class="fa-solid fa-camera text-3xl text-hotPink"></i>
                    <h3 class="font-display font-bold mt-4">Fotografi</h3>
                    <p class="text-mutedGray text-xs mt-2">Dokumentasi kegiatan dan cerita lapangan.</p>
                </div>
                <div class="cyber-glass p-6 rounded-2xl border border-acidLime/20"><i
                        class="fa-solid fa-laptop-code text-3xl text-acidLime"></i>
                    <h3 class="font-display font-bold mt-4">Teknologi</h3>
                    <p class="text-mutedGray text-xs mt-2">Website, data, dan literasi digital.</p>
                </div>
                <div class="cyber-glass p-6 rounded-2xl border border-magenta/20"><i
                        class="fa-solid fa-pen-nib text-3xl text-magenta"></i>
                    <h3 class="font-display font-bold mt-4">Desain & Konten</h3>
                    <p class="text-mutedGray text-xs mt-2">Materi kampanye dan komunikasi publik.</p>
                </div>
                <div class="cyber-glass p-6 rounded-2xl border border-white/10"><i
                        class="fa-solid fa-language text-3xl text-white"></i>
                    <h3 class="font-display font-bold mt-4">Bahasa</h3>
                    <p class="text-mutedGray text-xs mt-2">Penerjemahan dan pendampingan belajar.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- 11. CAMPAIGN LAUNCHPAD -->
    <section class="py-24 px-4 sm:px-6 lg:px-8 max-w-7xl mx-auto">
        <div class="cyber-glass rounded-[2rem] p-8 sm:p-12 border border-hotPink/30 relative overflow-hidden">
            <div class="absolute -right-20 -top-20 w-72 h-72 bg-hotPink/10 rounded-full blur-3xl"></div>
            <div class="relative z-10 grid lg:grid-cols-2 gap-10 items-center">
                <div class="space-y-5"><span class="text-acidLime font-mono text-xs uppercase tracking-widest">// NEXT
                        MISSION DROP</span>
                    <h2 class="font-display font-black text-3xl sm:text-5xl uppercase">Kampanye Berikutnya Sedang
                        Disiapkan.</h2>
                    <p class="text-mutedGray text-sm">Ikuti peluncuran kampanye dan jadilah bagian dari aksi kolektif
                        selanjutnya.</p><button onclick="openModal('joinModal')"
                        class="bg-gradient-to-r from-hotPink to-magenta text-white px-7 py-3 rounded-full font-display font-bold text-xs uppercase">Ikuti
                        Update</button>
                </div>
                <div class="grid grid-cols-4 gap-3 text-center" id="campaignCountdown">
                    <div class="bg-darkBg p-4 rounded-xl border border-white/10"><strong
                            class="block font-display text-3xl text-acidLime" id="countDays">07</strong><span
                            class="text-[10px] text-mutedGray">HARI</span></div>
                    <div class="bg-darkBg p-4 rounded-xl border border-white/10"><strong
                            class="block font-display text-3xl text-hotPink" id="countHours">12</strong><span
                            class="text-[10px] text-mutedGray">JAM</span></div>
                    <div class="bg-darkBg p-4 rounded-xl border border-white/10"><strong
                            class="block font-display text-3xl text-magenta" id="countMinutes">30</strong><span
                            class="text-[10px] text-mutedGray">MENIT</span></div>
                    <div class="bg-darkBg p-4 rounded-xl border border-white/10"><strong
                            class="block font-display text-3xl text-white" id="countSeconds">00</strong><span
                            class="text-[10px] text-mutedGray">DETIK</span></div>
                </div>
            </div>
        </div>
    </section>

    <!-- 12. DONATION TRANSPARENCY -->
    <section id="transparency" class="py-24 bg-surfaceBg px-4 sm:px-6 lg:px-8">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-12 space-y-4"><span
                    class="text-hotPink font-mono text-xs uppercase tracking-widest">// OPEN LEDGER</span>
                <h2 class="font-display font-black text-3xl sm:text-5xl uppercase">Ke Mana Kontribusimu Bergerak?</h2>
                <p class="text-mutedGray text-sm">Ilustrasi alokasi kontribusi untuk kebutuhan program sosial.</p>
            </div>
            <div class="grid md:grid-cols-2 gap-8 items-center">
                <div class="cyber-glass p-8 rounded-3xl border border-acidLime/20 space-y-6">
                    <div>
                        <div class="flex justify-between text-sm mb-2"><span>Program Lingkungan</span><strong
                                class="text-acidLime">40%</strong></div>
                        <div class="h-3 bg-darkBg rounded-full overflow-hidden">
                            <div class="h-full bg-acidLime rounded-full" style="width:40%"></div>
                        </div>
                    </div>
                    <div>
                        <div class="flex justify-between text-sm mb-2"><span>Pendidikan & Literasi</span><strong
                                class="text-hotPink">30%</strong></div>
                        <div class="h-3 bg-darkBg rounded-full overflow-hidden">
                            <div class="h-full bg-hotPink rounded-full" style="width:30%"></div>
                        </div>
                    </div>
                    <div>
                        <div class="flex justify-between text-sm mb-2"><span>Bantuan Kemanusiaan</span><strong
                                class="text-magenta">20%</strong></div>
                        <div class="h-3 bg-darkBg rounded-full overflow-hidden">
                            <div class="h-full bg-magenta rounded-full" style="width:20%"></div>
                        </div>
                    </div>
                    <div>
                        <div class="flex justify-between text-sm mb-2"><span>Operasional & Audit</span><strong
                                class="text-white">10%</strong></div>
                        <div class="h-3 bg-darkBg rounded-full overflow-hidden">
                            <div class="h-full bg-white rounded-full" style="width:10%"></div>
                        </div>
                    </div>
                </div>
                <div class="text-center space-y-5">
                    <div
                        class="w-44 h-44 mx-auto rounded-full border-[14px] border-acidLime border-r-hotPink border-b-magenta flex items-center justify-center shadow-neon-pink">
                        <div><strong class="font-display text-4xl">100%</strong><span
                                class="block text-[10px] text-mutedGray">ALLOCATION</span></div>
                    </div>
                    <p class="text-mutedGray text-xs leading-relaxed">Data persentase di atas merupakan contoh
                        tampilan. Hubungkan dengan data keuangan dan laporan terverifikasi sebelum digunakan secara
                        publik.</p><button
                        onclick="openWhatsApp('Saya ingin bertanya tentang transparansi kontribusi REVOLT IMPACT.')"
                        class="border border-acidLime text-acidLime px-6 py-3 rounded-full text-xs font-bold uppercase">Tanya
                        Transparansi</button>
                </div>
            </div>
        </div>
    </section>

    <!-- 13. VOLUNTEER MATCH & SOCIAL CHALLENGE GENERATOR -->
    <section id="generator" class="py-24 px-4 sm:px-6 lg:px-8 max-w-7xl mx-auto">
        <div class="grid lg:grid-cols-2 gap-8">
            <div class="cyber-glass p-8 rounded-3xl border border-hotPink/30 space-y-6">
                <span class="text-hotPink font-mono text-xs uppercase tracking-widest">// VOLUNTEER MATCH</span>
                <h2 class="font-display font-black text-3xl uppercase">Temukan Peranmu.</h2>
                <p class="text-mutedGray text-sm">Pilih minat untuk melihat rekomendasi peran relawan.</p>
                <select id="volunteerInterest"
                    class="w-full bg-darkBg border border-white/10 rounded-xl p-4 text-sm text-white">
                    <option value="environment">Lingkungan</option>
                    <option value="education">Pendidikan</option>
                    <option value="technology">Teknologi</option>
                    <option value="humanity">Kemanusiaan</option>
                </select>
                <div id="volunteerMatchResult" class="bg-darkBg p-5 rounded-2xl border border-acidLime/20"><span
                        class="text-acidLime text-xs font-mono">MATCH RESULT</span>
                    <h3 class="font-display font-bold text-xl mt-2">Eco Action Volunteer</h3>
                    <p class="text-mutedGray text-xs mt-2">Bantu kegiatan restorasi, edukasi lingkungan, dan kampanye
                        hijau.</p>
                </div>
                <button onclick="openModal('joinModal')"
                    class="w-full bg-hotPink text-white py-3 rounded-xl text-xs font-bold uppercase">Daftar Jadi
                    Relawan</button>
            </div>
            <div class="cyber-glass p-8 rounded-3xl border border-acidLime/30 space-y-6">
                <span class="text-acidLime font-mono text-xs uppercase tracking-widest">// SOCIAL CHALLENGE
                    GENERATOR</span>
                <h2 class="font-display font-black text-3xl uppercase">Generate Your Impact.</h2>
                <p class="text-mutedGray text-sm">Buat tantangan sederhana untuk mengajak lingkunganmu bergerak.</p>
                <div id="challengeOutput"
                    class="min-h-32 bg-darkBg p-6 rounded-2xl border border-white/10 flex items-center justify-center text-center text-sm text-mutedGray">
                    Tekan tombol untuk mendapatkan tantangan sosial acak.</div>
                <button onclick="generateChallenge()"
                    class="w-full bg-acidLime text-darkBg py-3 rounded-xl text-xs font-bold uppercase">Generate
                    Challenge <i class="fa-solid fa-wand-magic-sparkles ml-1"></i></button>
            </div>
        </div>
    </section>

    <!-- 14. COMMUNITY VOICES & IMPACT PROOF -->
    <section class="py-24 bg-surfaceBg px-4 sm:px-6 lg:px-8">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-12 space-y-4"><span
                    class="text-hotPink font-mono text-xs uppercase tracking-widest">// VOICES FROM THE FIELD</span>
                <h2 class="font-display font-black text-3xl sm:text-5xl uppercase">Cerita di Balik Gerakan.</h2>
            </div>
            <div class="grid md:grid-cols-3 gap-5">
                <blockquote class="cyber-glass p-7 rounded-3xl border border-hotPink/20"><i
                        class="fa-solid fa-quote-left text-hotPink text-2xl"></i>
                    <p class="text-sm leading-relaxed mt-4">"Saya baru sadar bahwa satu jam mengajar bisa membuka
                        banyak kesempatan bagi anak-anak di sekitar."</p>
                    <footer class="text-acidLime text-xs mt-5">— Relawan Pendidikan</footer>
                </blockquote>
                <blockquote class="cyber-glass p-7 rounded-3xl border border-acidLime/20"><i
                        class="fa-solid fa-quote-left text-acidLime text-2xl"></i>
                    <p class="text-sm leading-relaxed mt-4">"Gerakan ini mempertemukan orang-orang yang punya tujuan
                        sama, meski keahlian mereka berbeda."</p>
                    <footer class="text-hotPink text-xs mt-5">— Koordinator Komunitas</footer>
                </blockquote>
                <blockquote class="cyber-glass p-7 rounded-3xl border border-magenta/20"><i
                        class="fa-solid fa-quote-left text-magenta text-2xl"></i>
                    <p class="text-sm leading-relaxed mt-4">"Aksi kecil yang dilakukan bersama ternyata bisa
                        menghasilkan perubahan yang nyata."</p>
                    <footer class="text-acidLime text-xs mt-5">— Relawan Lingkungan</footer>
                </blockquote>
            </div>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-3 mt-8">
                <div
                    class="h-32 rounded-2xl bg-gradient-to-br from-hotPink/30 to-purple-900/40 flex items-center justify-center">
                    <i class="fa-solid fa-people-group text-4xl text-white/70"></i>
                </div>
                <div
                    class="h-32 rounded-2xl bg-gradient-to-br from-lime-900/40 to-acidLime/10 flex items-center justify-center">
                    <i class="fa-solid fa-seedling text-4xl text-acidLime"></i>
                </div>
                <div
                    class="h-32 rounded-2xl bg-gradient-to-br from-fuchsia-900/40 to-hotPink/10 flex items-center justify-center">
                    <i class="fa-solid fa-graduation-cap text-4xl text-hotPink"></i>
                </div>
                <div
                    class="h-32 rounded-2xl bg-gradient-to-br from-indigo-900/40 to-magenta/10 flex items-center justify-center">
                    <i class="fa-solid fa-handshake-angle text-4xl text-magenta"></i>
                </div>
            </div>
        </div>
    </section>

    <!-- 15. PARTNERSHIP PORTAL -->
    <section class="py-24 px-4 sm:px-6 lg:px-8 max-w-6xl mx-auto">
        <div class="cyber-glass p-8 sm:p-12 rounded-3xl border border-magenta/30 text-center space-y-6">
            <span class="text-acidLime font-mono text-xs uppercase tracking-widest">// COLLECTIVE POWER</span>
            <h2 class="font-display font-black text-3xl sm:text-5xl uppercase">Organisasi, Brand, Komunitas — Mari
                Berkolaborasi.</h2>
            <p class="text-mutedGray text-sm max-w-2xl mx-auto">Punya sumber daya, jaringan, atau ide yang bisa
                memperkuat gerakan? Buka percakapan kolaborasi bersama tim REVOLT.</p><button
                onclick="openWhatsApp('Halo REVOLT IMPACT, saya ingin berdiskusi tentang peluang partnership dan kolaborasi.')"
                class="bg-gradient-to-r from-hotPink via-magenta to-acidLime text-darkBg px-9 py-4 rounded-full font-display font-black text-xs uppercase tracking-widest">Ajukan
                Kolaborasi <i class="fa-solid fa-arrow-right ml-1"></i></button>
        </div>
    </section>

    <!-- 16. EVENT RSVP & REGISTRATION -->
    <section id="event-rsvp" class="py-24 bg-surfaceBg px-4 sm:px-6 lg:px-8">
        <div class="max-w-3xl mx-auto cyber-glass p-8 sm:p-10 rounded-3xl border border-hotPink/30">
            <div class="text-center mb-8"><span class="text-hotPink font-mono text-xs uppercase tracking-widest">//
                    JOIN THE MOVEMENT</span>
                <h2 class="font-display font-black text-3xl sm:text-4xl uppercase mt-3">RSVP & Join The Movement</h2>
                <p class="text-mutedGray text-sm mt-3">Isi data untuk mengirim minat bergabung atau kehadiran acara.
                    Admin akan mengonfirmasi melalui WhatsApp.</p>
            </div>
            <form onsubmit="submitRsvp(event)" class="grid sm:grid-cols-2 gap-4"><input name="name" required
                    placeholder="Nama lengkap"
                    class="bg-darkBg border border-white/10 rounded-xl px-4 py-3 text-sm text-white focus:outline-none focus:border-acidLime"><input
                    name="phone" required type="tel" placeholder="Nomor WhatsApp"
                    class="bg-darkBg border border-white/10 rounded-xl px-4 py-3 text-sm text-white focus:outline-none focus:border-acidLime"><input
                    name="city" required placeholder="Kota domisili"
                    class="bg-darkBg border border-white/10 rounded-xl px-4 py-3 text-sm text-white focus:outline-none focus:border-acidLime"><select
                    name="interest" class="bg-darkBg border border-white/10 rounded-xl px-4 py-3 text-sm text-white">
                    <option>Relawan umum</option>
                    <option>Lingkungan & iklim</option>
                    <option>Edukasi digital</option>
                    <option>Kesetaraan hak</option>
                    <option>Kolaborasi organisasi</option>
                    <option>RSVP acara</option>
                </select>
                <textarea name="message" rows="3" placeholder="Pesan atau acara yang ingin diikuti (opsional)"
                    class="sm:col-span-2 bg-darkBg border border-white/10 rounded-xl px-4 py-3 text-sm text-white focus:outline-none focus:border-acidLime"></textarea><button type="submit"
                    class="sm:col-span-2 bg-gradient-to-r from-hotPink via-magenta to-acidLime text-darkBg font-display font-black py-4 rounded-xl text-xs uppercase tracking-widest">Kirim
                    Permintaan via WhatsApp</button>
            </form>
        </div>
    </section>

    <!-- 17. FAQ ACCORDION & FOOTER -->
    <section class="py-24 bg-surfaceBg px-4 sm:px-6 lg:px-8">
        <div class="max-w-4xl mx-auto space-y-8">
            <div class="text-center space-y-4 mb-12">
                <span class="text-hotPink font-mono text-xs uppercase tracking-widest">// FAQ</span>
                <h2 class="font-display font-black text-3xl sm:text-5xl uppercase">Pertanyaan Umum</h2>
            </div>

            <div class="space-y-4">
                <div class="cyber-glass rounded-2xl border border-white/5 overflow-hidden">
                    <button onclick="toggleFaq(this)"
                        class="w-full p-6 text-left flex justify-between items-center font-display font-bold text-base focus:outline-none">
                        <span>Bagaimana REVOLT // IMPACT menjamin akuntabilitas donasi?</span>
                        <i class="fa-solid fa-chevron-down text-acidLime transition-transform"></i>
                    </button>
                    <div class="faq-content hidden px-6 pb-6 text-mutedGray text-xs leading-relaxed">
                        Setiap transaksi dicatat dalam ledger terbuka yang diverifikasi secara berkala oleh auditor
                        independen serta dapat diakses kapan saja oleh para donatur.
                    </div>
                </div>
                <div class="cyber-glass rounded-2xl border border-white/5 overflow-hidden">
                    <button onclick="toggleFaq(this)"
                        class="w-full p-6 text-left flex justify-between items-center font-display font-bold text-base focus:outline-none">
                        <span>Apakah saya bisa menjadi relawan jika tidak memiliki keterampilan khusus?</span>
                        <i class="fa-solid fa-chevron-down text-acidLime transition-transform"></i>
                    </button>
                    <div class="faq-content hidden px-6 pb-6 text-mutedGray text-xs leading-relaxed">
                        Tentu saja! Kami memiliki aksi kilat One-Minute Action Hub serta pelatihan berkala untuk
                        berbagai bidang peran lapangan.
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer class="bg-darkBg border-t border-white/10 pt-16 pb-24 px-4 sm:px-6 lg:px-8">
        <div
            class="max-w-7xl mx-auto flex flex-col md:flex-row justify-between items-center gap-8 text-center md:text-left">
            <div>
                <span class="font-display font-black text-2xl tracking-wider text-pureWhite">
                    REVOLT<span class="text-hotPink">//</span>IMPACT
                </span>
                <p class="text-mutedGray text-xs mt-2">Kolektif Sosial Radikal Masa Depan. 2026 All Rights Reserved.
                </p>
                <p class="text-mutedGray text-xs mt-2">Made with care ♡ · Website template by WEBIA</p>
            </div>
            <div class="flex gap-6 text-xl text-mutedGray">
                <a href="#" class="hover:text-acidLime"><i class="fa-brands fa-x-twitter"></i></a>
                <a href="#" class="hover:text-acidLime"><i class="fa-brands fa-instagram"></i></a>
                <a href="#" class="hover:text-acidLime"><i class="fa-brands fa-discord"></i></a>
            </div>
        </div>
    </footer>

    <!-- 18. SIDE-BY-SIDE FLOATING BUTTONS -->
    <div class="fixed bottom-6 right-6 z-50 flex items-center gap-4">
        <a href="https://wa.me/6281234567890" target="_blank" rel="noopener noreferrer"
            class="w-14 h-14 rounded-full bg-green-500 text-darkBg flex items-center justify-center text-2xl shadow-[0_0_25px_rgba(34,197,94,0.6)] hover:scale-110 transition-transform"
            title="WhatsApp Direct Line">
            <i class="fa-brands fa-whatsapp"></i>
        </a>
        <div class="relative">
            <div class="absolute -inset-3 rounded-full border border-acidLime/60 animate-orbit-1 pointer-events-none">
            </div>
            <div class="absolute -inset-3 rounded-full border border-hotPink/60 animate-orbit-2 pointer-events-none">
            </div>
            <button onclick="toggleChatbot()"
                class="w-14 h-14 rounded-full bg-gradient-to-tr from-hotPink via-magenta to-acidLime text-darkBg flex items-center justify-center text-2xl neon-pulse hover:scale-110 transition-transform relative z-10"
                title="AI Revolt Assistant">
                <i class="fa-solid fa-robot"></i>
            </button>
        </div>
    </div>

    <div id="chatbotDrawer"
        class="fixed bottom-24 right-6 w-80 sm:w-96 cyber-glass rounded-3xl border border-acidLime/50 shadow-2xl z-50 hidden flex-col overflow-hidden">
        <div class="bg-darkBg p-4 border-b border-white/10 flex justify-between items-center">
            <div class="flex items-center gap-3"><span
                    class="w-3 h-3 rounded-full bg-acidLime animate-ping"></span><span
                    class="font-display font-bold text-sm text-pureWhite">REVOLT // AI ASSISTANT</span></div>
            <button onclick="toggleChatbot()" class="text-mutedGray hover:text-pureWhite"><i
                    class="fa-solid fa-xmark"></i></button>
        </div>
        <div class="p-4 h-80 overflow-y-auto space-y-3 text-xs" id="chatMessages">
            <div class="bg-surfaceBg p-3 rounded-2xl max-w-[85%] border border-white/10 text-pureWhite">Halo! Saya AI
                REVOLT. Tanya saya seputar isu sosial, lokasi aksi, atau transparansi dana!</div>
        </div>
        <div class="p-3 bg-darkBg border-t border-white/10 flex gap-2">
            <input type="text" id="chatInput" placeholder="Ketik pesan..."
                class="flex-1 bg-surfaceBg border border-white/10 rounded-xl px-4 py-2 text-xs text-pureWhite focus:outline-none focus:border-acidLime">
            <button onclick="sendChatMessage()"
                class="bg-acidLime text-darkBg font-bold px-4 py-2 rounded-xl text-xs">Kirim</button>
        </div>
    </div>

    <div id="joinModal"
        class="fixed inset-0 z-50 bg-darkBg/90 backdrop-blur-md hidden flex items-center justify-center p-4">
        <div class="cyber-glass p-8 rounded-3xl border border-hotPink/40 max-w-md w-full relative space-y-6">
            <button onclick="closeModal('joinModal')"
                class="absolute top-6 right-6 text-mutedGray hover:text-pureWhite text-lg"><i
                    class="fa-solid fa-xmark"></i></button>
            <h3 class="font-display font-black text-2xl uppercase">Daftar Aktivis</h3>
            <form onsubmit="submitJoinForm(event)" class="space-y-4">
                <input type="text" required placeholder="Nama Lengkap"
                    class="w-full bg-darkBg border border-white/10 rounded-xl px-4 py-3 text-xs text-pureWhite focus:outline-none focus:border-acidLime">
                <input type="email" required placeholder="Email"
                    class="w-full bg-darkBg border border-white/10 rounded-xl px-4 py-3 text-xs text-pureWhite focus:outline-none focus:border-acidLime">
                <button type="submit"
                    class="w-full bg-acidLime text-darkBg font-display font-bold py-3.5 rounded-xl hover:shadow-neon-lime transition-all text-xs uppercase tracking-widest">Gabung
                    Sekarang</button>
            </form>
        </div>
    </div>

    <div id="toast"
        class="fixed top-6 right-6 z-50 cyber-glass border border-acidLime text-pureWhite px-6 py-4 rounded-2xl shadow-2xl transform translate-x-full transition-transform duration-300 flex items-center gap-3">
        <i class="fa-solid fa-circle-check text-acidLime text-xl"></i>
        <div>
            <h5 class="font-display font-bold text-xs uppercase" id="toastTitle">Berhasil</h5>
            <p class="text-xs text-mutedGray" id="toastDesc">Aksi berhasil dicatat.</p>
        </div>
    </div>

    <script
        src="{{ asset('js/website-bisnis/templates/nonprofit-community/social-organization/revolt-impact/revolt-impact.js') }}">
    </script>
</body>

</html>
