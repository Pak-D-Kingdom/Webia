<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apex Pulse Fitness — High Performance Gym & Training Club</title>
    <meta name="description" content="Apex Pulse Fitness adalah mega gym dan training club modern dengan peralatan impor standar olimpiade, pelatih tersertifikasi, dan kelas intensif HIIT & CrossFit.">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Teko:wght@500;600;700&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        heading: ['"Teko"', 'sans-serif'],
                        sans: ['"Plus Jakarta Sans"', 'sans-serif'],
                    },
                    colors: {
                        volt: '#ccff00',
                        crimson: '#ff1e42',
                        darkBg: '#09090b',
                        cardBg: '#121215',
                    }
                }
            }
        }
    </script>
    <style>
        .volt-glow {
            box-shadow: 0 0 30px -5px rgba(204, 255, 0, 0.35);
        }
        .crimson-glow {
            box-shadow: 0 0 30px -5px rgba(255, 30, 66, 0.35);
        }
    </style>
</head>
<body class="bg-[#09090b] text-zinc-200 antialiased font-sans selection:bg-[#ccff00] selection:text-black">

    <!-- 1. TOPBAR -->
    <div class="bg-black border-b border-zinc-800 text-xs py-2 px-4 sm:px-8">
        <div class="max-w-7xl mx-auto flex flex-wrap justify-between items-center gap-2">
            <div class="flex items-center gap-2">
                <span class="inline-flex items-center gap-1.5 px-2 py-0.5 rounded-full bg-[#ccff00]/10 text-[#ccff00] border border-[#ccff00]/30 font-bold text-[11px] uppercase tracking-wider">
                    ⚡ Free 1-Day Trial Pass Available
                </span>
                <span class="hidden md:inline text-zinc-400">· Jam Operasional: Setiap Hari 06.00 – 22.00 WIB</span>
            </div>
            <div class="flex items-center gap-4 text-zinc-400">
                <span>📍 Mega Gym Mall Lt. 3, Jakarta Selatan</span>
                <span class="hidden sm:inline">📞 +62 858-5018-0285</span>
            </div>
        </div>
    </div>

    <!-- 2. NAVBAR -->
    <header class="sticky top-0 z-40 bg-[#09090b]/90 backdrop-blur-md border-b border-zinc-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-8 h-18 flex items-center justify-between">
            <a href="#hero" class="flex items-center gap-2 text-white font-extrabold text-2xl tracking-tighter font-heading">
                <div class="w-8 h-8 rounded-lg bg-[#ccff00] text-black flex items-center justify-center font-bold text-lg">
                    ⚡
                </div>
                <span>APEX<span class="text-[#ccff00]">PULSE</span></span>
            </a>

            <nav class="hidden md:flex items-center gap-7 text-sm font-bold uppercase tracking-wider text-zinc-300">
                <a href="#classes" class="hover:text-[#ccff00] transition">Kelas & Program</a>
                <a href="#trainers" class="hover:text-[#ccff00] transition">Pelatih</a>
                <a href="#facilities" class="hover:text-[#ccff00] transition">Fasilitas</a>
                <a href="#pricing" class="hover:text-[#ccff00] transition">Membership</a>
                <a href="#faq" class="hover:text-[#ccff00] transition">FAQ</a>
            </nav>

            <div class="flex items-center gap-3">
                <a href="#trial" class="hidden sm:inline-flex items-center gap-2 bg-[#ccff00] hover:bg-[#b8e600] text-black font-extrabold text-xs uppercase tracking-wider px-5 py-2.5 rounded-xl transition volt-glow">
                    Klaim Free Pass <span>↗</span>
                </a>
                <button id="mobileMenuBtn" class="md:hidden p-2 text-zinc-400 hover:text-white" aria-label="Toggle Menu">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"/></svg>
                </button>
            </div>
        </div>

        <!-- Mobile Nav Menu -->
        <div id="mobileMenu" class="hidden md:hidden bg-[#121215] border-b border-zinc-800 px-6 py-4 space-y-3 text-sm font-bold uppercase">
            <a href="#classes" class="block text-zinc-300 hover:text-[#ccff00] py-1">Kelas & Program</a>
            <a href="#trainers" class="block text-zinc-300 hover:text-[#ccff00] py-1">Pelatih</a>
            <a href="#facilities" class="block text-zinc-300 hover:text-[#ccff00] py-1">Fasilitas</a>
            <a href="#pricing" class="block text-zinc-300 hover:text-[#ccff00] py-1">Membership</a>
            <a href="#faq" class="block text-zinc-300 hover:text-[#ccff00] py-1">FAQ</a>
            <a href="#trial" class="block text-[#ccff00] pt-2">Klaim Free Pass ↗</a>
        </div>
    </header>

    <main>
        <!-- 3. HERO SECTION -->
        <section id="hero" class="relative pt-12 pb-20 md:py-24 overflow-hidden border-b border-zinc-800">
            <div class="absolute top-1/2 left-1/3 w-[500px] h-[300px] bg-[#ccff00]/10 blur-[130px] rounded-full pointer-events-none"></div>
            <div class="absolute top-1/4 right-1/4 w-[400px] h-[250px] bg-[#ff1e42]/10 blur-[120px] rounded-full pointer-events-none"></div>

            <div class="max-w-7xl mx-auto px-4 sm:px-8">
                <div class="grid lg:grid-cols-12 gap-12 items-center">
                    <div class="lg:col-span-7 space-y-6">
                        <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-zinc-900 border border-zinc-700 text-[#ccff00] text-xs font-bold tracking-widest uppercase">
                            🔥 ELEVATE YOUR HUMAN PERFORMANCE
                        </div>

                        <h1 class="text-4xl sm:text-6xl lg:text-7xl font-extrabold text-white tracking-tight uppercase font-heading leading-[0.95]">
                            Tempa Fisikmu. <br>
                            <span class="text-[#ccff00]">Bongkar Limitmu</span> Hari Ini.
                        </h1>

                        <p class="text-zinc-300 text-base sm:text-lg leading-relaxed max-w-xl">
                            Apex Pulse Fitness bukan sekadar gym biasa. Kami menggabungkan peralatan kekuatan standar kompetisi dunia, program latihan fungsional berbasis sains, dan komunitas atletik yang suportif.
                        </p>

                        <div class="flex flex-wrap gap-4 pt-2">
                            <a href="#trial" class="inline-flex items-center justify-center gap-2 bg-[#ccff00] hover:bg-[#b8e600] text-black font-extrabold text-sm uppercase tracking-wider px-8 py-3.5 rounded-xl transition volt-glow">
                                Ambil Free Trial Pass ↗
                            </a>
                            <a href="#classes" class="inline-flex items-center justify-center gap-2 bg-zinc-900 hover:bg-zinc-800 text-white border border-zinc-700 font-bold text-sm px-6 py-3.5 rounded-xl transition">
                                Jadwal Kelas Mingguan →
                            </a>
                        </div>

                        <!-- Highlights -->
                        <div class="grid grid-cols-3 gap-4 pt-6 border-t border-zinc-800 max-w-md">
                            <div>
                                <div class="text-2xl sm:text-3xl font-extrabold text-white font-heading">1.200 M²</div>
                                <div class="text-xs text-zinc-400">Area Latihan Luas</div>
                            </div>
                            <div>
                                <div class="text-2xl sm:text-3xl font-extrabold text-[#ccff00] font-heading">45+ KELAS</div>
                                <div class="text-xs text-zinc-400">Per Minggu</div>
                            </div>
                            <div>
                                <div class="text-2xl sm:text-3xl font-extrabold text-white font-heading">15+ COACH</div>
                                <div class="text-xs text-zinc-400">Certified Trainers</div>
                            </div>
                        </div>
                    </div>

                    <!-- Hero Visual Card -->
                    <div class="lg:col-span-5">
                        <div class="rounded-3xl bg-[#121215] border border-zinc-700/80 p-3 shadow-2xl relative overflow-hidden group">
                            <img src="https://images.unsplash.com/photo-1534438327276-14e5300c3a48?auto=format&fit=crop&w=800&q=80" alt="Gym Workout" class="rounded-2xl w-full h-[400px] object-cover group-hover:scale-105 transition duration-500">
                            <div class="absolute inset-0 bg-gradient-to-t from-black via-transparent to-transparent rounded-2xl"></div>
                            <div class="absolute bottom-6 left-6 right-6 p-4 rounded-2xl bg-black/80 backdrop-blur-md border border-zinc-700/80 flex items-center justify-between">
                                <div>
                                    <span class="text-xs text-[#ccff00] font-bold uppercase tracking-wider">FEATURED PROGRAM</span>
                                    <h4 class="text-white font-bold text-sm">Hyper-Pulse Strength & HIIT</h4>
                                </div>
                                <span class="bg-[#ff1e42] text-white text-xs font-bold px-2.5 py-1 rounded">HOT</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- 4. CLASSES & PROGRAMS -->
        <section id="classes" class="py-20 bg-[#0d0d10]">
            <div class="max-w-7xl mx-auto px-4 sm:px-8">
                <div class="text-center max-w-3xl mx-auto mb-16">
                    <span class="text-[#ccff00] text-xs font-bold tracking-widest uppercase">SIGNATURE PROGRAMS</span>
                    <h2 class="text-3xl sm:text-5xl font-extrabold text-white uppercase font-heading mt-1">Kelas Latihan Terpandu</h2>
                    <p class="text-zinc-400 text-sm sm:text-base mt-2">Setiap kelas dirancang oleh pelatih bersertifikasi untuk memaksimalkan pembakaran kalori dan pembentukan massa otot.</p>
                </div>

                <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
                    <!-- Class 1 -->
                    <div class="bg-[#151518] border border-zinc-800 hover:border-[#ccff00]/60 rounded-2xl p-6 transition duration-300 space-y-4">
                        <div class="w-12 h-12 rounded-xl bg-[#ccff00]/10 border border-[#ccff00]/30 flex items-center justify-center text-[#ccff00] text-2xl font-bold">
                            🏋️
                        </div>
                        <h3 class="text-xl font-bold text-white uppercase font-heading">Powerlifting & Strength</h3>
                        <p class="text-zinc-400 text-xs leading-relaxed">Fokus pada teknik compound lift (Squat, Bench, Deadlift) yang aman dan terukur untuk menaikkan kekuatan maksimal.</p>
                        <div class="pt-2 text-xs text-zinc-500 font-mono flex justify-between border-t border-zinc-800">
                            <span>Durasi: 60 Menit</span>
                            <span class="text-[#ccff00]">Level: Semua</span>
                        </div>
                    </div>

                    <!-- Class 2 -->
                    <div class="bg-[#151518] border border-zinc-800 hover:border-[#ccff00]/60 rounded-2xl p-6 transition duration-300 space-y-4">
                        <div class="w-12 h-12 rounded-xl bg-[#ff1e42]/10 border border-[#ff1e42]/30 flex items-center justify-center text-[#ff1e42] text-2xl font-bold">
                            ⚡
                        </div>
                        <h3 class="text-xl font-bold text-white uppercase font-heading">High Intensity HIIT</h3>
                        <p class="text-zinc-400 text-xs leading-relaxed">Kombinasi interval kardio dan beban tubuh eksplosif untuk memacu metabolisme dan membakar hingga 800 kalori.</p>
                        <div class="pt-2 text-xs text-zinc-500 font-mono flex justify-between border-t border-zinc-800">
                            <span>Durasi: 45 Menit</span>
                            <span class="text-[#ff1e42]">Intensitas Tinggi</span>
                        </div>
                    </div>

                    <!-- Class 3 -->
                    <div class="bg-[#151518] border border-zinc-800 hover:border-[#ccff00]/60 rounded-2xl p-6 transition duration-300 space-y-4">
                        <div class="w-12 h-12 rounded-xl bg-cyan-500/10 border border-cyan-500/30 flex items-center justify-center text-cyan-400 text-2xl font-bold">
                            🥊
                        </div>
                        <h3 class="text-xl font-bold text-white uppercase font-heading">Boxing Conditioning</h3>
                        <p class="text-zinc-400 text-xs leading-relaxed">Latihan footwork, shadow boxing, pad work, dan ketahanan fisik tanpa kontak sparing keras.</p>
                        <div class="pt-2 text-xs text-zinc-500 font-mono flex justify-between border-t border-zinc-800">
                            <span>Durasi: 50 Menit</span>
                            <span class="text-cyan-400">Stamina & Agility</span>
                        </div>
                    </div>

                    <!-- Class 4 -->
                    <div class="bg-[#151518] border border-zinc-800 hover:border-[#ccff00]/60 rounded-2xl p-6 transition duration-300 space-y-4">
                        <div class="w-12 h-12 rounded-xl bg-purple-500/10 border border-purple-500/30 flex items-center justify-center text-purple-400 text-2xl font-bold">
                            🧘
                        </div>
                        <h3 class="text-xl font-bold text-white uppercase font-heading">Mobility & Yoga Core</h3>
                        <p class="text-zinc-400 text-xs leading-relaxed">Peregangan sendi aktif, penguatan otot inti (core stability), dan teknik pernapasan untuk mempercepat pemulihan.</p>
                        <div class="pt-2 text-xs text-zinc-500 font-mono flex justify-between border-t border-zinc-800">
                            <span>Durasi: 55 Menit</span>
                            <span class="text-purple-400">Recovery</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- 5. CERTIFIED TRAINERS -->
        <section id="trainers" class="py-20 border-t border-zinc-800">
            <div class="max-w-7xl mx-auto px-4 sm:px-8">
                <div class="flex flex-col md:flex-row md:items-end justify-between mb-12">
                    <div>
                        <span class="text-[#ccff00] text-xs font-bold tracking-widest uppercase">EXPERT GUIDANCE</span>
                        <h2 class="text-3xl sm:text-4xl font-extrabold text-white uppercase font-heading mt-1">Pelatih Profesional Kami</h2>
                    </div>
                    <p class="text-zinc-400 text-sm max-w-md mt-2 md:mt-0">Bersertifikasi NASM, CSCS, dan ACE dengan pengalaman mendampingi ratusan transformasi tubuh.</p>
                </div>

                <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
                    <div class="bg-[#121215] border border-zinc-800 rounded-2xl overflow-hidden group">
                        <img src="https://images.unsplash.com/photo-1567013127542-490d757e51fc?auto=format&fit=crop&w=600&q=80" alt="Trainer 1" class="w-full h-64 object-cover object-top group-hover:scale-105 transition duration-500">
                        <div class="p-6 space-y-2">
                            <span class="text-xs text-[#ccff00] font-bold font-mono">HEAD COACH · CSCS</span>
                            <h4 class="text-xl font-bold text-white font-heading uppercase">Rendra Pratama</h4>
                            <p class="text-zinc-400 text-xs">Spesialis Hypertrophy & Olympic Weightlifting dengan pengalaman 10+ tahun.</p>
                        </div>
                    </div>

                    <div class="bg-[#121215] border border-zinc-800 rounded-2xl overflow-hidden group">
                        <img src="https://images.unsplash.com/photo-1517838277536-f5f99be501cd?auto=format&fit=crop&w=600&q=80" alt="Trainer 2" class="w-full h-64 object-cover object-top group-hover:scale-105 transition duration-500">
                        <div class="p-6 space-y-2">
                            <span class="text-xs text-[#ff1e42] font-bold font-mono">FUNCTIONAL COACH · NASM-CPT</span>
                            <h4 class="text-xl font-bold text-white font-heading uppercase">Maya Salsabila</h4>
                            <p class="text-zinc-400 text-xs">Pakar HIIT, Kettlebell conditioning, dan program fat loss khusus wanita.</p>
                        </div>
                    </div>

                    <div class="bg-[#121215] border border-zinc-800 rounded-2xl overflow-hidden group">
                        <img src="https://images.unsplash.com/photo-1571019614242-c5c5dee9f50b?auto=format&fit=crop&w=600&q=80" alt="Trainer 3" class="w-full h-64 object-cover object-top group-hover:scale-105 transition duration-500">
                        <div class="p-6 space-y-2">
                            <span class="text-xs text-cyan-400 font-bold font-mono">CALISTHENICS & MOBILITY</span>
                            <h4 class="text-xl font-bold text-white font-heading uppercase">David Santoso</h4>
                            <p class="text-zinc-400 text-xs">Spesialis bodyweight training, pencegahan cedera, dan kelenturan sendi.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- 6. MEMBERSHIP TIERS -->
        <section id="pricing" class="py-20 bg-[#0d0d10] border-t border-zinc-800">
            <div class="max-w-7xl mx-auto px-4 sm:px-8">
                <div class="text-center max-w-3xl mx-auto mb-16">
                    <span class="text-[#ccff00] text-xs font-bold tracking-widest uppercase">NO HIDDEN FEES</span>
                    <h2 class="text-3xl sm:text-5xl font-extrabold text-white uppercase font-heading mt-1">Pilihan Membership Fleksibel</h2>
                    <p class="text-zinc-400 text-sm sm:text-base mt-2">Semua paket membership mencakup akses gym tak terbatas, loker pribadi, shower air panas, dan sauna.</p>
                </div>

                <div class="grid md:grid-cols-3 gap-8 items-stretch">
                    <!-- Monthly -->
                    <div class="bg-[#151518] border border-zinc-800 rounded-2xl p-7 flex flex-col justify-between hover:border-zinc-700 transition">
                        <div class="space-y-4">
                            <span class="text-xs font-mono text-zinc-400 uppercase">FLEXIBLE PASS</span>
                            <h3 class="text-2xl font-bold text-white font-heading uppercase">Monthly Explorer</h3>
                            <p class="text-zinc-400 text-xs leading-relaxed">Sempurna untuk yang ingin fleksibilitas bulanan tanpa komitmen kontrak panjang.</p>
                            <div class="text-4xl font-extrabold text-white font-heading pt-2">
                                Rp450.000 <span class="text-xs font-sans text-zinc-400 font-normal">/ bulan</span>
                            </div>
                            <ul class="text-xs text-zinc-300 space-y-2.5 pt-4 border-t border-zinc-800">
                                <li>✔ Akses Penuh Gym (06.00 – 22.00)</li>
                                <li>✔ Akses Sauna & Locker Room</li>
                                <li>✔ 2x Sesi Kelas Signature / Bulan</li>
                                <li>✔ 1x Free Body Composition Scan (InBody)</li>
                            </ul>
                        </div>
                        <a href="#trial" class="mt-8 text-center bg-zinc-800 hover:bg-zinc-700 text-white font-bold py-3 rounded-xl transition text-xs uppercase tracking-wider">Pilih Bulanan</a>
                    </div>

                    <!-- 6 Months (Featured) -->
                    <div class="bg-[#1a1a20] border-2 border-[#ccff00] rounded-2xl p-7 flex flex-col justify-between relative volt-glow">
                        <div class="absolute -top-3 left-1/2 -translate-x-1/2 bg-[#ccff00] text-black text-[11px] font-extrabold px-3 py-1 rounded-full uppercase tracking-wider">
                            BEST VALUE · DISKON 25%
                        </div>
                        <div class="space-y-4">
                            <span class="text-xs font-mono text-[#ccff00] uppercase">COMMITTED ATHLETE</span>
                            <h3 class="text-2xl font-bold text-white font-heading uppercase">Pro 6-Month Pass</h3>
                            <p class="text-zinc-300 text-xs leading-relaxed">Paling populer untuk transformasi tubuh terstruktur dengan benefit kelas tanpa batas.</p>
                            <div class="text-4xl font-extrabold text-[#ccff00] font-heading pt-2">
                                Rp350.000 <span class="text-xs font-sans text-zinc-400 font-normal">/ bulan (billed 6 bln)</span>
                            </div>
                            <ul class="text-xs text-zinc-200 space-y-2.5 pt-4 border-t border-zinc-800">
                                <li>✔ Akses Gym 7 Hari Seminggu</li>
                                <li>✔ <strong>Unlimited Akses Semua Kelas</strong> (HIIT, Boxing, Yoga)</li>
                                <li>✔ 2x Sesi Personal Trainer 1-on-1</li>
                                <li>✔ InBody Scan Gratis Tiap Bulan</li>
                                <li>✔ Free Guest Pass 2x untuk Teman</li>
                            </ul>
                        </div>
                        <a href="#trial" class="mt-8 text-center bg-[#ccff00] hover:bg-[#b8e600] text-black font-extrabold py-3.5 rounded-xl transition text-xs uppercase tracking-wider">Join Pro Athlete ↗</a>
                    </div>

                    <!-- Annual VIP -->
                    <div class="bg-[#151518] border border-zinc-800 rounded-2xl p-7 flex flex-col justify-between hover:border-zinc-700 transition">
                        <div class="space-y-4">
                            <span class="text-xs font-mono text-[#ff1e42] uppercase">ALL-ACCESS VIP</span>
                            <h3 class="text-2xl font-bold text-white font-heading uppercase">Apex VIP Annual</h3>
                            <p class="text-zinc-400 text-xs leading-relaxed">Investasi kebugaran terbaik setahun penuh dengan fasilitas premium prioritas.</p>
                            <div class="text-4xl font-extrabold text-white font-heading pt-2">
                                Rp299.000 <span class="text-xs font-sans text-zinc-400 font-normal">/ bulan (billed 12 bln)</span>
                            </div>
                            <ul class="text-xs text-zinc-300 space-y-2.5 pt-4 border-t border-zinc-800">
                                <li>✔ Seluruh Benefit Pro 6-Month</li>
                                <li>✔ 5x Sesi Personal Training Eksklusif</li>
                                <li>✔ Free Loker Tetap (Dedicated Locker)</li>
                                <li>✔ Free Laundry Gym Kit Harian</li>
                                <li>✔ Diskon 20% di Apex Juice & Shake Bar</li>
                            </ul>
                        </div>
                        <a href="#trial" class="mt-8 text-center bg-zinc-800 hover:bg-zinc-700 text-white font-bold py-3 rounded-xl transition text-xs uppercase tracking-wider">Pilih Annual VIP</a>
                    </div>
                </div>
            </div>
        </section>

        <!-- 7. FAQ ACCORDION -->
        <section id="faq" class="py-20 border-t border-zinc-800">
            <div class="max-w-4xl mx-auto px-4 sm:px-8">
                <div class="text-center mb-14">
                    <span class="text-[#ccff00] text-xs font-bold tracking-widest uppercase">COMMON QUESTIONS</span>
                    <h2 class="text-3xl sm:text-4xl font-extrabold text-white uppercase font-heading mt-1">Frequently Asked Questions</h2>
                    <p class="text-zinc-400 text-sm mt-2">Segala hal yang perlu kamu ketahui sebelum memulai latihan di Apex Pulse.</p>
                </div>

                <div class="space-y-4">
                    <div class="bg-[#121215] border border-zinc-800 rounded-xl overflow-hidden">
                        <button type="button" class="w-full p-5 text-left flex justify-between items-center text-sm font-bold text-white hover:text-[#ccff00] transition" onclick="toggleGymFaq(this)">
                            <span>1. Apa syarat klaim Free 1-Day Trial Pass?</span>
                            <span class="faq-icon text-[#ccff00] text-xl font-mono">+</span>
                        </button>
                        <div class="faq-answer hidden px-5 pb-5 text-xs sm:text-sm text-zinc-400 leading-relaxed border-t border-zinc-800/80 pt-3">
                            Free Trial Pass berlaku untuk calon member yang belum pernah mendaftar di Apex Pulse. Cukup tunjukkan KTP/kartu identitas resmi di meja resepsionis setelah mengisi formulir klaim online.
                        </div>
                    </div>

                    <div class="bg-[#121215] border border-zinc-800 rounded-xl overflow-hidden">
                        <button type="button" class="w-full p-5 text-left flex justify-between items-center text-sm font-bold text-white hover:text-[#ccff00] transition" onclick="toggleGymFaq(this)">
                            <span>2. Apakah pemula yang belum pernah angkat beban boleh bergabung?</span>
                            <span class="faq-icon text-[#ccff00] text-xl font-mono">+</span>
                        </button>
                        <div class="faq-answer hidden px-5 pb-5 text-xs sm:text-sm text-zinc-400 leading-relaxed border-t border-zinc-800/80 pt-3">
                            Sangat boleh! 60% member kami adalah pemula saat pertama kali mendaftar. Seluruh member baru mendapatkan sesi orientasi gratis dengan coach untuk diajari cara menggunakan alat dan form dasar angkat beban.
                        </div>
                    </div>

                    <div class="bg-[#121215] border border-zinc-800 rounded-xl overflow-hidden">
                        <button type="button" class="w-full p-5 text-left flex justify-between items-center text-sm font-bold text-white hover:text-[#ccff00] transition" onclick="toggleGymFaq(this)">
                            <span>3. Fasilitas apa saja yang tersedia di ruang loker?</span>
                            <span class="faq-icon text-[#ccff00] text-xl font-mono">+</span>
                        </button>
                        <div class="faq-answer hidden px-5 pb-5 text-xs sm:text-sm text-zinc-400 leading-relaxed border-t border-zinc-800/80 pt-3">
                            Ruang ganti terpisah pria & wanita kami dilengkapi loker digital, shower dengan air panas, sabun/shampoo gratis, hair dryer, serta ruang sauna inframerah untuk relaksasi otot.
                        </div>
                    </div>

                    <div class="bg-[#121215] border border-zinc-800 rounded-xl overflow-hidden">
                        <button type="button" class="w-full p-5 text-left flex justify-between items-center text-sm font-bold text-white hover:text-[#ccff00] transition" onclick="toggleGymFaq(this)">
                            <span>4. Bagaimana cara booking sesi kelas Signature?</span>
                            <span class="faq-icon text-[#ccff00] text-xl font-mono">+</span>
                        </button>
                        <div class="faq-answer hidden px-5 pb-5 text-xs sm:text-sm text-zinc-400 leading-relaxed border-t border-zinc-800/80 pt-3">
                            Booking kelas dapat dilakukan secara instan melalui aplikasi WhatsApp resmi atau langsung di counter resepsionis hingga 2 jam sebelum kelas dimulai.
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- 8. TRIAL BOOKING FORM -->
        <section id="trial" class="py-20 bg-[#0d0d10] border-t border-zinc-800">
            <div class="max-w-3xl mx-auto px-4 sm:px-8">
                <div class="bg-[#151518] border border-zinc-700 rounded-3xl p-8 sm:p-12 volt-glow">
                    <div class="text-center mb-8">
                        <span class="text-[#ccff00] text-xs font-bold uppercase tracking-widest font-mono">INSTANT PASS</span>
                        <h2 class="text-3xl font-extrabold text-white uppercase font-heading mt-1">Dapatkan 1-Day Trial Pass Gratis</h2>
                        <p class="text-zinc-400 text-xs sm:text-sm mt-1">Rasakan atmosfer latihan bertenaga tinggi di Apex Pulse tanpa dipungut biaya sepeserpun.</p>
                    </div>

                    <form onsubmit="handleGymSubmit(event)" class="space-y-4">
                        <div class="grid sm:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-xs font-bold text-zinc-300 mb-1">Nama Lengkap</label>
                                <input type="text" id="gymName" required placeholder="Nama Anda" class="w-full bg-zinc-900 border border-zinc-700 rounded-xl px-4 py-2.5 text-xs text-white focus:outline-none focus:border-[#ccff00]">
                            </div>
                            <div>
                                <label class="block text-xs font-bold text-zinc-300 mb-1">Nomor WhatsApp</label>
                                <input type="tel" id="gymPhone" required placeholder="08xxxxxxxxxx" class="w-full bg-zinc-900 border border-zinc-700 rounded-xl px-4 py-2.5 text-xs text-white focus:outline-none focus:border-[#ccff00]">
                            </div>
                        </div>

                        <div class="grid sm:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-xs font-bold text-zinc-300 mb-1">Target Utama Latihan</label>
                                <select id="gymGoal" class="w-full bg-zinc-900 border border-zinc-700 rounded-xl px-4 py-2.5 text-xs text-white focus:outline-none focus:border-[#ccff00]">
                                    <option>Bina Kekuatan & Massa Otot (Hypertrophy)</option>
                                    <option>Menurunkan Berat Badan & Fat Loss</option>
                                    <option>Stamina, Kardio & Agility</option>
                                    <option>Pemulihan Fleksibilitas & Kesehatan Postur</option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-xs font-bold text-zinc-300 mb-1">Rencana Tanggal Kunjungan</label>
                                <input type="date" id="gymDate" required class="w-full bg-zinc-900 border border-zinc-700 rounded-xl px-4 py-2.5 text-xs text-white focus:outline-none focus:border-[#ccff00]">
                            </div>
                        </div>

                        <button type="submit" class="w-full bg-[#ccff00] hover:bg-[#b8e600] text-black font-extrabold py-3.5 rounded-xl transition text-xs uppercase tracking-wider volt-glow">
                            Klaim Pass via WhatsApp Resepsionis ↗
                        </button>
                    </form>
                </div>
            </div>
        </section>
    </main>

    <!-- 9. FOOTER -->
    <footer class="bg-black border-t border-zinc-900 text-zinc-400 text-xs py-14">
        <div class="max-w-7xl mx-auto px-4 sm:px-8">
            <div class="grid grid-cols-2 md:grid-cols-5 gap-8 pb-10 border-b border-zinc-900">
                <div class="col-span-2 space-y-3">
                    <div class="flex items-center gap-2 text-white font-extrabold text-2xl font-heading">
                        ⚡ APEX<span class="text-[#ccff00]">PULSE</span>
                    </div>
                    <p class="text-zinc-400 text-xs leading-relaxed max-w-sm">
                        High performance training center & athletic community. Elevating mind, body, and human endurance.
                    </p>
                    <div class="text-[11px] text-zinc-500">
                        Buka Setiap Hari: 06.00 – 22.00 WIB
                    </div>
                </div>

                <div class="space-y-2">
                    <p class="font-bold text-white text-xs uppercase font-heading tracking-wider">Programs</p>
                    <ul class="space-y-1.5">
                        <li><a href="#classes" class="hover:text-[#ccff00]">Strength & Power</a></li>
                        <li><a href="#classes" class="hover:text-[#ccff00]">HIIT Cardio</a></li>
                        <li><a href="#classes" class="hover:text-[#ccff00]">Boxing Condition</a></li>
                        <li><a href="#classes" class="hover:text-[#ccff00]">Yoga Core</a></li>
                    </ul>
                </div>

                <div class="space-y-2">
                    <p class="font-bold text-white text-xs uppercase font-heading tracking-wider">Club</p>
                    <ul class="space-y-1.5">
                        <li><a href="#trainers" class="hover:text-[#ccff00]">Pelatih</a></li>
                        <li><a href="#pricing" class="hover:text-[#ccff00]">Membership</a></li>
                        <li><a href="#faq" class="hover:text-[#ccff00]">FAQ</a></li>
                        <li><a href="#trial" class="hover:text-[#ccff00]">Free Pass</a></li>
                    </ul>
                </div>

                <div class="col-span-2 md:col-span-1 space-y-2">
                    <p class="font-bold text-white text-xs uppercase font-heading tracking-wider">Lokasi Kami</p>
                    <p class="text-zinc-400">Mega Gym Mall Lt. 3</p>
                    <p class="text-zinc-400">Kav. 45 Jakarta Selatan</p>
                    <p class="text-zinc-400">WA: +62 858-5018-0285</p>
                </div>
            </div>

            <div class="pt-8 flex flex-col sm:flex-row justify-between items-center gap-4 text-[11px] text-zinc-500">
                <p>&copy; 2026 Apex Pulse Fitness. All rights reserved.</p>
                <p>Website template by <strong class="text-[#ccff00]">WEBIA</strong></p>
            </div>
        </div>
    </footer>

    <!-- 10. FLOATING WHATSAPP BUTTON -->
    <a href="https://wa.me/6285850180285?text=Halo%20Apex%20Pulse%20Gym,%20saya%20ingin%20tanya%20membership%20dan%20free%20trial%20pass." target="_blank" rel="noopener noreferrer" class="fixed bottom-6 left-6 z-50 flex items-center gap-2 bg-[#25D366] hover:bg-[#20bd5a] text-white px-4 py-3 rounded-full shadow-2xl transition duration-300 font-bold text-xs tracking-wide">
        <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/></svg>
        <span>WhatsApp Gym</span>
    </a>

    <!-- 11. FLOATING AI ASSISTANT -->
    <button onclick="toggleGymBot()" class="fixed bottom-6 right-6 z-50 flex items-center gap-2 bg-[#ccff00] hover:bg-[#b8e600] text-black px-4.5 py-3 rounded-full shadow-2xl transition duration-300 font-extrabold text-xs uppercase tracking-wider volt-glow">
        <span class="w-2 h-2 rounded-full bg-black animate-ping"></span>
        <span>⚡ Apex Coach AI</span>
    </button>

    <!-- AI Bot Modal -->
    <div id="gymBotModal" class="hidden fixed bottom-22 right-6 z-50 w-80 sm:w-96 bg-[#121215] border border-zinc-700 rounded-2xl shadow-2xl overflow-hidden flex flex-col h-[460px] volt-glow">
        <div class="bg-black p-3.5 border-b border-zinc-800 flex justify-between items-center text-white">
            <div class="flex items-center gap-2">
                <span class="w-6 h-6 rounded bg-[#ccff00] text-black font-bold flex items-center justify-center text-xs">⚡</span>
                <div>
                    <h4 class="font-bold text-xs uppercase font-heading tracking-wide">Apex Coach AI</h4>
                    <span class="text-[10px] text-[#ccff00] font-mono">Tanya Program & Membership</span>
                </div>
            </div>
            <button onclick="toggleGymBot()" class="text-zinc-400 hover:text-white text-lg p-1">&times;</button>
        </div>

        <div id="gymBotMessages" class="p-4 flex-1 overflow-y-auto space-y-3 text-xs">
            <div class="bg-zinc-900 border border-zinc-800 p-3 rounded-2xl rounded-tl-none text-zinc-300">
                Wassup athlete! 🔥 Aku <strong>Apex Coach AI</strong>. Ada yang bisa dibantu tentang program latihan, kelas HIIT, atau info promo membership?
            </div>

            <div class="space-y-1.5 pt-1">
                <button onclick="sendGymQuick('Berapa harga membership gym?')" class="w-full text-left bg-zinc-800/80 hover:bg-zinc-700 text-zinc-200 p-2 rounded-lg border border-zinc-700 transition">
                    💰 Berapa biaya paket membership?
                </button>
                <button onclick="sendGymQuick('Bagaimana cara ambil Free Trial Pass?')" class="w-full text-left bg-zinc-800/80 hover:bg-zinc-700 text-zinc-200 p-2 rounded-lg border border-zinc-700 transition">
                    🎟️ Cara klaim 1-Day Trial Pass?
                </button>
                <button onclick="sendGymQuick('Apakah ada pelatih untuk pemula?')" class="w-full text-left bg-zinc-800/80 hover:bg-zinc-700 text-zinc-200 p-2 rounded-lg border border-zinc-700 transition">
                    🏋️ Apakah pemula didampingi coach?
                </button>
            </div>
        </div>

        <div class="p-2.5 bg-black border-t border-zinc-800 flex gap-2">
            <input type="text" id="gymBotInput" placeholder="Tanya tentang program / gym..." onkeydown="if(event.key==='Enter') sendGymCustom()" class="flex-1 bg-zinc-900 border border-zinc-800 rounded-xl px-3 py-2 text-xs text-white placeholder-zinc-500 focus:outline-none focus:border-[#ccff00]">
            <button onclick="sendGymCustom()" class="bg-[#ccff00] text-black font-bold px-3 py-2 rounded-xl text-xs">
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

        function toggleGymFaq(btn) {
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

        function toggleGymBot() {
            document.getElementById('gymBotModal').classList.toggle('hidden');
        }

        function sendGymQuick(q) {
            appendGymUser(q);
            let reply = "Semangat! Tim resepsionis kami siap membantu konfirmasi jadwal kunjunganmu. Bisa langsung klik tombol 'WhatsApp Gym' di kiri bawah ya!";
            if (q.includes('membership')) {
                reply = "Membership mulai Rp350.000/bln untuk paket Pro 6-Month (akses kelas unlimited) atau Rp450.000 untuk paket bulanan fleksibel!";
            } else if (q.includes('Trial')) {
                reply = "Kamu bisa klaim 1-Day Trial Pass gratis dengan isi form di atas, lalu tunjukkan konfirmasi WA ke resepsionis!";
            } else if (q.includes('pemula')) {
                reply = "Pasti! Setiap member baru dapat sesi orientasi bersama Coach untuk belajar teknik dasar angkat beban yang aman.";
            }
            setTimeout(() => appendGymBot(reply), 500);
        }

        function sendGymCustom() {
            const input = document.getElementById('gymBotInput');
            const val = input.value.trim();
            if (!val) return;
            appendGymUser(val);
            input.value = '';
            setTimeout(() => {
                appendGymBot("Pertanyaan keren! Untuk info '" + val + "', kamu juga bisa langsung chat resepsionis kami via WhatsApp untuk fast response! 💪");
            }, 600);
        }

        function appendGymUser(msg) {
            const box = document.getElementById('gymBotMessages');
            const div = document.createElement('div');
            div.className = "bg-[#ccff00] text-black font-semibold p-2.5 rounded-2xl rounded-tr-none text-xs ml-auto max-w-[85%]";
            div.textContent = msg;
            box.appendChild(div);
            box.scrollTop = box.scrollHeight;
        }

        function appendGymBot(msg) {
            const box = document.getElementById('gymBotMessages');
            const div = document.createElement('div');
            div.className = "bg-zinc-900 border border-zinc-800 text-zinc-200 p-2.5 rounded-2xl rounded-tl-none text-xs mr-auto max-w-[85%]";
            div.textContent = msg;
            box.appendChild(div);
            box.scrollTop = box.scrollHeight;
        }

        function handleGymSubmit(e) {
            e.preventDefault();
            const name = document.getElementById('gymName').value;
            const phone = document.getElementById('gymPhone').value;
            const goal = document.getElementById('gymGoal').value;
            const date = document.getElementById('gymDate').value;

            const text = encodeURIComponent(
                `Halo Apex Pulse Fitness! Saya ingin klaim 1-Day Trial Pass:\n\n` +
                `*Nama:* ${name}\n` +
                `*WhatsApp:* ${phone}\n` +
                `*Target Latihan:* ${goal}\n` +
                `*Rencana Tanggal Datang:* ${date}\n\n` +
                `Mohon konfirmasi ketersediaan slot loker & coach. Terima kasih!`
            );
            window.open(`https://wa.me/6285850180285?text=${text}`, '_blank');
        }
    </script>
</body>
</html>
