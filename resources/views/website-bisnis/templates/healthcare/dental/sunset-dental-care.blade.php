<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GlowDental Studio & Orthodontics - Modern Gen-Z Dental Care</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Lucide Icons -->
    <script src="https://unpkg.com/lucide@latest"></script>
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['"Plus Jakarta Sans"', 'sans-serif'],
                    },
                    colors: {
                        sunset: {
                            50: '#fff1f2',
                            100: '#ffe4e6',
                            400: '#fb7185',
                            500: '#f43f5e',
                            orange: '#ff6b4a',
                            coral: '#ff8a65',
                            pink: '#ec4899',
                            purple: '#8b5cf6',
                            deep: '#4c1d95',
                        }
                    },
                    backgroundImage: {
                        'sunset-gradient': 'linear-gradient(135deg, #ff6b4a 0%, #ec4899 50%, #8b5cf6 100%)',
                        'sunset-gradient-soft': 'linear-gradient(135deg, rgba(255,107,74,0.1) 0%, rgba(236,72,153,0.1) 50%, rgba(139,92,246,0.1) 100%)',
                        'glass-gradient': 'linear-gradient(135deg, rgba(255, 255, 255, 0.8) 0%, rgba(255, 255, 255, 0.4) 100%)',
                    },
                    boxShadow: {
                        'sunset-glow': '0 10px 30px -5px rgba(236, 72, 153, 0.3)',
                        'sunset-glow-lg': '0 20px 40px -10px rgba(255, 107, 74, 0.4)',
                        'glass': '0 8px 32px 0 rgba(31, 38, 135, 0.07)',
                    }
                }
            }
        }
    </script>
    <link rel="stylesheet" href="{{ asset('css/website-bisnis/templates/healthcare/dental/sunset-dental-care.css') }}">

</head>
<body class="bg-slate-50 text-slate-800 font-sans antialiased overflow-x-hidden selection:bg-pink-500 selection:text-white">

    <!-- 1. PROGRESS TOPBAR (Announcement / Promo Bar) -->
    <div id="topbar" class="bg-gradient-to-r from-sunset-orange via-sunset-pink to-sunset-purple text-white text-xs sm:text-sm py-2.5 px-4 font-medium sticky top-0 z-50 shadow-md">
        <div class="max-w-7xl mx-auto flex flex-col sm:flex-row justify-between items-center gap-2 text-center sm:text-left">
            <div class="flex items-center gap-2">
                <span class="bg-white/20 text-white px-2 py-0.5 rounded-full text-[11px] uppercase tracking-wider font-bold animate-pulse">Special Offer</span>
                <span>✨ Free Dental 3D Scan & Consultation for First Timers! (Slot Terbatas Hari Ini)</span>
            </div>
            <div class="flex items-center gap-4 text-xs font-semibold">
                <span class="hidden md:inline-flex items-center gap-1"><i data-lucide="clock" class="w-3.5 h-3.5"></i> Promo Berakhir: <span id="countdown" class="font-mono bg-black/20 px-1.5 py-0.5 rounded">05:42:19</span></span>
                <a href="#booking" class="bg-white text-pink-600 hover:bg-slate-100 px-3 py-1 rounded-full text-xs font-bold transition-all transform hover:scale-105 shadow-sm">
                    Klaim Promo <i data-lucide="arrow-right" class="w-3 h-3 inline"></i>
                </a>
            </div>
        </div>
    </div>

    <!-- 2. NAVBAR -->
    <header class="sticky top-[38px] z-40 bg-white/80 backdrop-blur-md border-b border-slate-100 transition-all duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-20 flex items-center justify-between">
            <!-- Logo -->
            <a href="#" class="flex items-center gap-2.5 group">
                <div class="w-10 h-10 rounded-2xl bg-sunset-gradient p-2 flex items-center justify-center text-white shadow-sunset-glow group-hover:rotate-6 transition-transform">
                    <i data-lucide="sparkles" class="w-6 h-6"></i>
                </div>
                <div class="flex flex-col">
                    <span class="text-xl font-extrabold tracking-tight text-slate-900 leading-tight">
                        Glow<span class="text-gradient">Dental</span>
                    </span>
                    <span class="text-[10px] tracking-widest text-slate-400 font-bold uppercase">Studio & Ortho</span>
                </div>
            </a>

            <!-- Desktop Nav Links -->
            <nav class="hidden lg:flex items-center gap-7 text-sm font-semibold text-slate-600">
                <a href="#home" class="text-pink-600 font-bold hover:text-pink-600 transition">Beranda</a>
                <a href="#services" class="hover:text-pink-600 transition">Layanan</a>
                <a href="#treatments" class="hover:text-pink-600 transition">Detail Perawatan</a>
                <a href="#dentists" class="hover:text-pink-600 transition">Tim Dokter</a>
                <a href="#pricing" class="hover:text-pink-600 transition">Estimasi Biaya</a>
                <a href="#facilities" class="hover:text-pink-600 transition">Fasilitas</a>
                <a href="#testimonials" class="hover:text-pink-600 transition">Testimoni</a>
                <a href="#contact" class="hover:text-pink-600 transition">Lokasi</a>
            </nav>

            <!-- Actions -->
            <div class="hidden sm:flex items-center gap-3">
                <a href="https://wa.me/" target="_blank" class="p-2.5 text-emerald-600 bg-emerald-50 hover:bg-emerald-100 rounded-full transition-colors flex items-center justify-center" title="Chat WhatsApp">
                    <i data-lucide="message-circle" class="w-5 h-5"></i>
                </a>
                <a href="#booking" class="bg-sunset-gradient hover:opacity-95 text-white font-bold text-sm px-5 py-2.5 rounded-full shadow-sunset-glow transition-all transform hover:-translate-y-0.5 flex items-center gap-2">
                    <i data-lucide="calendar" class="w-4 h-4"></i>
                    <span>Book Appointment</span>
                </a>
            </div>

            <!-- Mobile Menu Toggle Button -->
            <button id="menuBtn" class="lg:hidden p-2 rounded-xl text-slate-600 hover:bg-slate-100 focus:outline-none">
                <i data-lucide="menu" class="w-6 h-6"></i>
            </button>
        </div>

        <!-- Mobile Menu Container -->
        <div id="mobileMenu" class="hidden lg:hidden bg-white/95 backdrop-blur-xl border-b border-slate-200 px-6 py-6 space-y-4">
            <a href="#home" class="block font-semibold text-pink-600 mobile-link">Beranda</a>
            <a href="#services" class="block font-semibold text-slate-700 hover:text-pink-600 mobile-link">Layanan</a>
            <a href="#treatments" class="block font-semibold text-slate-700 hover:text-pink-600 mobile-link">Detail Perawatan</a>
            <a href="#dentists" class="block font-semibold text-slate-700 hover:text-pink-600 mobile-link">Tim Dokter</a>
            <a href="#pricing" class="block font-semibold text-slate-700 hover:text-pink-600 mobile-link">Estimasi Biaya</a>
            <a href="#facilities" class="block font-semibold text-slate-700 hover:text-pink-600 mobile-link">Fasilitas</a>
            <a href="#testimonials" class="block font-semibold text-slate-700 hover:text-pink-600 mobile-link">Testimoni</a>
            <a href="#contact" class="block font-semibold text-slate-700 hover:text-pink-600 mobile-link">Lokasi & Jam</a>
            <div class="pt-4 border-t border-slate-100 flex flex-col gap-3">
                <a href="#booking" class="w-full bg-sunset-gradient text-white text-center font-bold py-3 rounded-xl shadow-sunset-glow mobile-link">
                    Book Appointment Now
                </a>
            </div>
        </div>
    </header>

    <!-- 3. HERO BANNER -->
    <section id="home" class="relative pt-8 pb-20 lg:pt-16 lg:pb-28 overflow-hidden">
        <!-- Background Decorative Elements -->
        <div class="absolute top-1/4 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[600px] h-[600px] bg-gradient-to-tr from-pink-300/30 via-orange-300/30 to-purple-300/30 rounded-full blur-3xl -z-10"></div>
        <div class="absolute top-10 right-10 w-32 h-32 bg-purple-400/20 rounded-full blur-2xl -z-10"></div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid lg:grid-cols-12 gap-12 items-center">
                
                <!-- Left Column Text -->
                <div class="lg:col-span-7 space-y-6 text-center lg:text-left">
                    
                    <!-- Rating Badge -->
                    <div class="inline-flex items-center gap-2 bg-white/80 backdrop-blur-md px-4 py-2 rounded-full border border-pink-100 shadow-sm">
                        <div class="flex text-amber-400">
                            <i data-lucide="star" class="w-4 h-4 fill-amber-400"></i>
                            <i data-lucide="star" class="w-4 h-4 fill-amber-400"></i>
                            <i data-lucide="star" class="w-4 h-4 fill-amber-400"></i>
                            <i data-lucide="star" class="w-4 h-4 fill-amber-400"></i>
                            <i data-lucide="star" class="w-4 h-4 fill-amber-400"></i>
                        </div>
                        <span class="text-xs font-bold text-slate-700">4.9/5 Rating</span>
                        <span class="text-xs text-slate-400">|</span>
                        <span class="text-xs text-slate-600 font-medium">2,500+ Senyum Gen-Z & Professionals</span>
                    </div>

                    <!-- Main Headline -->
                    <h1 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold text-slate-900 tracking-tight leading-[1.15]">
                        Senyum Aesthetic & Rapi Tanpa Rasa Takut <span class="text-gradient">#GlowUpYourSmile</span>
                    </h1>

                    <p class="text-base sm:text-lg text-slate-600 max-w-2xl mx-auto lg:mx-0 leading-relaxed font-normal">
                        Klinik spesialis perataan gigi (Invisalign & Behel) dan estetik gigi modern. Pengalaman perawatan super nyaman dengan teknologi digital 3D Scanner, suasana bak cafe, & dokter ramah.
                    </p>

                    <!-- CTA Buttons -->
                    <div class="flex flex-col sm:flex-row items-center justify-center lg:justify-start gap-4 pt-2">
                        <a href="#booking" class="w-full sm:w-auto bg-sunset-gradient text-white text-base font-bold px-8 py-4 rounded-2xl shadow-sunset-glow-lg hover:shadow-none hover:scale-105 transition-all flex items-center justify-center gap-3">
                            <i data-lucide="sparkles" class="w-5 h-5"></i>
                            <span>Reservasi Konsultasi Gratis</span>
                        </a>
                        <a href="#pricing" class="w-full sm:w-auto bg-white hover:bg-slate-50 text-slate-800 border border-slate-200 font-bold text-base px-6 py-4 rounded-2xl transition-all flex items-center justify-center gap-2">
                            <i data-lucide="calculator" class="w-5 h-5 text-pink-500"></i>
                            <span>Cek Estimasi Biaya</span>
                        </a>
                    </div>

                    <!-- Micro Highlights -->
                    <div class="pt-6 grid grid-cols-3 gap-4 border-t border-slate-200/60 max-w-lg mx-auto lg:mx-0">
                        <div>
                            <p class="text-xl sm:text-2xl font-extrabold text-slate-900">100%</p>
                            <p class="text-xs text-slate-500 font-medium">Painless Tech</p>
                        </div>
                        <div>
                            <p class="text-xl sm:text-2xl font-extrabold text-slate-900">0%</p>
                            <p class="text-xs text-slate-500 font-medium">Cicilan Bunga</p>
                        </div>
                        <div>
                            <p class="text-xl sm:text-2xl font-extrabold text-slate-900">15 Min</p>
                            <p class="text-xs text-slate-500 font-medium">Fast Whitening</p>
                        </div>
                    </div>
                </div>

                <!-- Right Column Interactive Hero Card (Before & After Preview) -->
                <div class="lg:col-span-5 relative">
                    <div class="relative bg-white rounded-3xl p-4 sm:p-6 shadow-2xl border border-slate-100 max-w-md mx-auto">
                        <!-- Floating Badge -->
                        <div class="absolute -top-4 -right-4 bg-sunset-gradient text-white text-xs font-extrabold px-4 py-2 rounded-full shadow-lg flex items-center gap-1.5 animate-bounce">
                            <i data-lucide="zap" class="w-4 h-4"></i> Real Transformation
                        </div>

                        <div class="mb-4">
                            <div class="flex justify-between items-center mb-2">
                                <span class="text-xs font-bold text-slate-400 uppercase tracking-wider">Interactive Preview</span>
                                <span class="text-xs font-bold text-pink-600 bg-pink-50 px-2.5 py-1 rounded-full">Invisalign Treatment</span>
                            </div>
                            <h3 class="font-bold text-slate-800 text-base">Smile Transformation Hub</h3>
                        </div>

                        <!-- Before / After Switcher -->
                        <div class="relative h-64 rounded-2xl overflow-hidden group shadow-inner border border-slate-100">
                            <img id="transformationImg" src="https://images.unsplash.com/photo-1588776814546-1ffcf47267a5?auto=format&fit=crop&q=80&w=600" alt="Smile After" class="w-full h-full object-cover transition-all duration-500">
                            
                            <div class="absolute inset-x-0 bottom-0 bg-gradient-to-t from-black/80 via-black/30 to-transparent p-4 text-white">
                                <span id="transformStateTag" class="text-xs font-bold bg-emerald-500 px-2.5 py-0.5 rounded-full uppercase tracking-wider">AFTER - 6 Bulan Invisalign</span>
                                <p id="transformDesc" class="text-xs text-slate-200 mt-1">Gigi rapi presisi, alignment sempurna, lebih percaya diri.</p>
                            </div>
                        </div>

                        <!-- Toggle Slider Buttons -->
                        <div class="mt-4 grid grid-cols-2 gap-2 bg-slate-100 p-1.5 rounded-xl">
                            <button onclick="toggleTransform('before')" id="btnBefore" class="py-2 text-xs font-bold rounded-lg text-slate-600 transition">Sebelum</button>
                            <button onclick="toggleTransform('after')" id="btnAfter" class="py-2 text-xs font-bold rounded-lg bg-white text-pink-600 shadow-sm transition">Sesudah (Glow Up)</button>
                        </div>

                        <div class="mt-4 pt-3 border-t border-slate-100 flex items-center gap-3">
                            <div class="w-9 h-9 rounded-full bg-pink-100 text-pink-600 flex items-center justify-center font-bold text-sm">
                                <i data-lucide="shield-check" class="w-5 h-5"></i>
                            </div>
                            <div class="text-xs">
                                <p class="font-bold text-slate-800">Garansi Kepuasan Hasil</p>
                                <p class="text-slate-500">Simulasi 3D senyum diberikan sebelum treatment.</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- 4. DENTAL SERVICES GRID -->
    <section id="services" class="py-20 bg-white relative">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <span class="text-xs font-bold uppercase tracking-widest text-pink-600 bg-pink-50 px-3.5 py-1.5 rounded-full border border-pink-100">Our Signature Services</span>
                <h2 class="text-3xl sm:text-4xl font-extrabold text-slate-900 mt-3 tracking-tight">Perawatan Estetik Lengkap Untuk Senyum Impianmu</h2>
                <p class="text-slate-600 text-sm sm:text-base mt-2">Pilih perawatan terbaik yang dirancang khusus sesuai kebutuhan estetik dan kesehatan gigimu.</p>
            </div>

            <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-8">
                
                <!-- Service 1 -->
                <div class="glass-card rounded-3xl p-8 hover:-translate-y-2 transition-all duration-300 border border-slate-100 hover:border-pink-200 hover:shadow-sunset-glow group">
                    <div class="w-14 h-14 rounded-2xl bg-gradient-to-tr from-pink-500 to-orange-400 text-white flex items-center justify-center mb-6 shadow-md group-hover:scale-110 transition-transform">
                        <i data-lucide="sparkle" class="w-7 h-7"></i>
                    </div>
                    <span class="text-xs font-extrabold text-pink-600 tracking-wider uppercase">Most Popular Gen-Z</span>
                    <h3 class="text-xl font-bold text-slate-900 mt-1 mb-2">Invisalign (Clear Aligners)</h3>
                    <p class="text-slate-600 text-sm leading-relaxed mb-6">Perataan gigi transparan tanpa kawat, nyaman, dapat dilepas pasang, dan hampir tidak terlihat.</p>
                    <a href="#treatments" class="text-sm font-bold text-pink-600 hover:text-pink-700 flex items-center gap-1 group-hover:translate-x-1 transition-transform">
                        Detail Perawatan <i data-lucide="chevron-right" class="w-4 h-4"></i>
                    </a>
                </div>

                <!-- Service 2 -->
                <div class="glass-card rounded-3xl p-8 hover:-translate-y-2 transition-all duration-300 border border-slate-100 hover:border-pink-200 hover:shadow-sunset-glow group">
                    <div class="w-14 h-14 rounded-2xl bg-gradient-to-tr from-purple-500 to-pink-500 text-white flex items-center justify-center mb-6 shadow-md group-hover:scale-110 transition-transform">
                        <i data-lucide="smile" class="w-7 h-7"></i>
                    </div>
                    <span class="text-xs font-extrabold text-purple-600 tracking-wider uppercase">Instant Glow</span>
                    <h3 class="text-xl font-bold text-slate-900 mt-1 mb-2">Laser Teeth Whitening</h3>
                    <p class="text-slate-600 text-sm leading-relaxed mb-6">Memutihkan gigi hingga 8 tingkat lebih cerah hanya dalam 45 menit dengan teknologi cold-laser aman.</p>
                    <a href="#treatments" class="text-sm font-bold text-purple-600 hover:text-purple-700 flex items-center gap-1 group-hover:translate-x-1 transition-transform">
                        Detail Perawatan <i data-lucide="chevron-right" class="w-4 h-4"></i>
                    </a>
                </div>

                <!-- Service 3 -->
                <div class="glass-card rounded-3xl p-8 hover:-translate-y-2 transition-all duration-300 border border-slate-100 hover:border-pink-200 hover:shadow-sunset-glow group">
                    <div class="w-14 h-14 rounded-2xl bg-gradient-to-tr from-orange-400 to-pink-500 text-white flex items-center justify-center mb-6 shadow-md group-hover:scale-110 transition-transform">
                        <i data-lucide="gem" class="w-7 h-7"></i>
                    </div>
                    <span class="text-xs font-extrabold text-orange-600 tracking-wider uppercase">Hollywood Smile</span>
                    <h3 class="text-xl font-bold text-slate-900 mt-1 mb-2">Porcelain & Composite Veneers</h3>
                    <p class="text-slate-600 text-sm leading-relaxed mb-6">Ubah bentuk, warna, dan celah gigi secara instan untuk tampilan senyum sempurna bak selebriti.</p>
                    <a href="#treatments" class="text-sm font-bold text-orange-600 hover:text-orange-700 flex items-center gap-1 group-hover:translate-x-1 transition-transform">
                        Detail Perawatan <i data-lucide="chevron-right" class="w-4 h-4"></i>
                    </a>
                </div>

                <!-- Service 4 -->
                <div class="glass-card rounded-3xl p-8 hover:-translate-y-2 transition-all duration-300 border border-slate-100 hover:border-pink-200 hover:shadow-sunset-glow group">
                    <div class="w-14 h-14 rounded-2xl bg-gradient-to-tr from-rose-500 to-purple-500 text-white flex items-center justify-center mb-6 shadow-md group-hover:scale-110 transition-transform">
                        <i data-lucide="grid" class="w-7 h-7"></i>
                    </div>
                    <span class="text-xs font-extrabold text-rose-600 tracking-wider uppercase">Classic Alignment</span>
                    <h3 class="text-xl font-bold text-slate-900 mt-1 mb-2">Aesthetic & Sapphire Braces</h3>
                    <p class="text-slate-600 text-sm leading-relaxed mb-6">Behel kawat estetik transparan / berwarna trendi dengan kontrol rutin yang terkontrol presisi.</p>
                    <a href="#treatments" class="text-sm font-bold text-rose-600 hover:text-rose-700 flex items-center gap-1 group-hover:translate-x-1 transition-transform">
                        Detail Perawatan <i data-lucide="chevron-right" class="w-4 h-4"></i>
                    </a>
                </div>

                <!-- Service 5 -->
                <div class="glass-card rounded-3xl p-8 hover:-translate-y-2 transition-all duration-300 border border-slate-100 hover:border-pink-200 hover:shadow-sunset-glow group">
                    <div class="w-14 h-14 rounded-2xl bg-gradient-to-tr from-amber-400 to-rose-500 text-white flex items-center justify-center mb-6 shadow-md group-hover:scale-110 transition-transform">
                        <i data-lucide="heart-pulse" class="w-7 h-7"></i>
                    </div>
                    <span class="text-xs font-extrabold text-amber-600 tracking-wider uppercase">Preventive Care</span>
                    <h3 class="text-xl font-bold text-slate-900 mt-1 mb-2">Gentle Scaling & Spa Gigi</h3>
                    <p class="text-slate-600 text-sm leading-relaxed mb-6">Pembersihan karang gigi ultrasonik bebas rasa sakit dipadu dengan pemijatan gusi & stain removal.</p>
                    <a href="#treatments" class="text-sm font-bold text-amber-600 hover:text-amber-700 flex items-center gap-1 group-hover:translate-x-1 transition-transform">
                        Detail Perawatan <i data-lucide="chevron-right" class="w-4 h-4"></i>
                    </a>
                </div>

                <!-- Service 6 -->
                <div class="glass-card rounded-3xl p-8 hover:-translate-y-2 transition-all duration-300 border border-slate-100 hover:border-pink-200 hover:shadow-sunset-glow group">
                    <div class="w-14 h-14 rounded-2xl bg-gradient-to-tr from-indigo-500 to-purple-500 text-white flex items-center justify-center mb-6 shadow-md group-hover:scale-110 transition-transform">
                        <i data-lucide="shield" class="w-7 h-7"></i>
                    </div>
                    <span class="text-xs font-extrabold text-indigo-600 tracking-wider uppercase">Permanent Replacement</span>
                    <h3 class="text-xl font-bold text-slate-900 mt-1 mb-2">Implan Gigi & Crown</h3>
                    <p class="text-slate-600 text-sm leading-relaxed mb-6">Penggantian gigi hilang dengan akar implan titanium yang kokoh, alami, dan tampak sangat natural.</p>
                    <a href="#treatments" class="text-sm font-bold text-indigo-600 hover:text-indigo-700 flex items-center gap-1 group-hover:translate-x-1 transition-transform">
                        Detail Perawatan <i data-lucide="chevron-right" class="w-4 h-4"></i>
                    </a>
                </div>

            </div>
        </div>
    </section>

    <!-- 5. DETAILED TREATMENT INFORMATION (Interactive Tabs) -->
    <section id="treatments" class="py-20 bg-slate-100/70">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-2xl mx-auto mb-12">
                <span class="text-xs font-bold uppercase tracking-widest text-purple-600 bg-purple-50 px-3.5 py-1.5 rounded-full border border-purple-100">Treatment Insight</span>
                <h2 class="text-3xl font-extrabold text-slate-900 mt-3">Detail Informasi Perawatan</h2>
                <p class="text-slate-600 text-sm mt-2">Ketahui estimasi durasi, tingkat sensasi, dan alur prosedur sebelum kamu mendaftar.</p>
            </div>

            <!-- Tabs Navigation -->
            <div class="flex overflow-x-auto pb-4 justify-start md:justify-center gap-2 no-scrollbar">
                <button onclick="switchTab('invisalign')" id="tab-invisalign" class="tab-btn active-tab px-6 py-3 rounded-2xl font-bold text-sm whitespace-nowrap transition bg-sunset-gradient text-white shadow-md">Invisalign</button>
                <button onclick="switchTab('whitening')" id="tab-whitening" class="tab-btn px-6 py-3 rounded-2xl font-bold text-sm whitespace-nowrap transition bg-white text-slate-600 hover:bg-slate-200">Teeth Whitening</button>
                <button onclick="switchTab('veneers')" id="tab-veneers" class="tab-btn px-6 py-3 rounded-2xl font-bold text-sm whitespace-nowrap transition bg-white text-slate-600 hover:bg-slate-200">Veneer Gigi</button>
                <button onclick="switchTab('scaling')" id="tab-scaling" class="tab-btn px-6 py-3 rounded-2xl font-bold text-sm whitespace-nowrap transition bg-white text-slate-600 hover:bg-slate-200">Scaling Spa</button>
            </div>

            <!-- Tab Contents Container -->
            <div class="mt-8 bg-white rounded-3xl p-6 sm:p-10 shadow-xl border border-slate-100">
                
                <!-- Content 1: Invisalign -->
                <div id="content-invisalign" class="tab-content grid lg:grid-cols-12 gap-8 items-center">
                    <div class="lg:col-span-7 space-y-4">
                        <div class="flex items-center gap-2 text-xs font-bold text-pink-600 uppercase">
                            <i data-lucide="sparkles" class="w-4 h-4"></i> Clear Aligner Specialist
                        </div>
                        <h3 class="text-2xl font-extrabold text-slate-900">Perataan Gigi Modern Tanpa Kawat</h3>
                        <p class="text-slate-600 text-sm leading-relaxed">
                            Invisalign menggunakan set plastik bening medis yang dicetak khusus berdasarkan hasil pemindaian 3D iTero scanner. Kamu bisa melepasnya saat makan dan menyikat gigi.
                        </p>
                        
                        <div class="grid grid-cols-2 sm:grid-cols-3 gap-4 pt-2">
                            <div class="bg-slate-50 p-3.5 rounded-2xl border border-slate-100">
                                <span class="text-xs text-slate-400 block font-medium">Estimasi Waktu</span>
                                <span class="text-sm font-extrabold text-slate-800">3 - 12 Bulan</span>
                            </div>
                            <div class="bg-slate-50 p-3.5 rounded-2xl border border-slate-100">
                                <span class="text-xs text-slate-400 block font-medium">Sensitivitas</span>
                                <span class="text-sm font-extrabold text-emerald-600">Sangat Rendah (1/5)</span>
                            </div>
                            <div class="bg-slate-50 p-3.5 rounded-2xl border border-slate-100">
                                <span class="text-xs text-slate-400 block font-medium">Kontrol Rutin</span>
                                <span class="text-sm font-extrabold text-slate-800">1x / 6-8 Minggu</span>
                            </div>
                        </div>

                        <div class="space-y-2 pt-2">
                            <h4 class="font-bold text-slate-800 text-sm">Tahapan Prosedur:</h4>
                            <ul class="text-xs text-slate-600 space-y-1.5 list-disc list-inside">
                                <li>Scan Gigi 3D dengan iTero Element 5D Scanner (Tanpa cetakan lengket).</li>
                                <li>Simulasi video 3D pergerakan gigi (ClinCheck) sebelum pembuatan tray.</li>
                                <li>Pemasangan tray aligner pertama & panduan pemakaian harian (20-22 jam/hari).</li>
                            </ul>
                        </div>
                    </div>
                    <div class="lg:col-span-5">
                        <img src="https://images.unsplash.com/photo-1606811841689-23dfddce3e95?auto=format&fit=crop&q=80&w=600" alt="Invisalign Detail" loading="lazy" decoding="async" class="rounded-2xl w-full h-64 object-cover shadow-md">
                    </div>
                </div>

                <!-- Content 2: Whitening (Hidden by default) -->
                <div id="content-whitening" class="tab-content hidden grid lg:grid-cols-12 gap-8 items-center">
                    <div class="lg:col-span-7 space-y-4">
                        <div class="flex items-center gap-2 text-xs font-bold text-purple-600 uppercase">
                            <i data-lucide="zap" class="w-4 h-4"></i> Cold-Laser Express
                        </div>
                        <h3 class="text-2xl font-extrabold text-slate-900">Laser Teeth Whitening 45 Menit</h3>
                        <p class="text-slate-600 text-sm leading-relaxed">
                            Menggunakan formula pencerah khusus yang diaktivasi sinar laser dingin untuk merontokkan noda kopi, teh, dan rokok tanpa merusak email gigi.
                        </p>
                        
                        <div class="grid grid-cols-2 sm:grid-cols-3 gap-4 pt-2">
                            <div class="bg-slate-50 p-3.5 rounded-2xl border border-slate-100">
                                <span class="text-xs text-slate-400 block font-medium">Durasi</span>
                                <span class="text-sm font-extrabold text-slate-800">45 - 60 Menit</span>
                            </div>
                            <div class="bg-slate-50 p-3.5 rounded-2xl border border-slate-100">
                                <span class="text-xs text-slate-400 block font-medium">Sensitivitas</span>
                                <span class="text-sm font-extrabold text-amber-500">Ringan (2/5)</span>
                            </div>
                            <div class="bg-slate-50 p-3.5 rounded-2xl border border-slate-100">
                                <span class="text-xs text-slate-400 block font-medium">Kecerahan</span>
                                <span class="text-sm font-extrabold text-purple-600">Up to 8 Shades</span>
                            </div>
                        </div>

                        <div class="space-y-2 pt-2">
                            <h4 class="font-bold text-slate-800 text-sm">Tahapan Prosedur:</h4>
                            <ul class="text-xs text-slate-600 space-y-1.5 list-disc list-inside">
                                <li>Pembersihan plak awal & aplikasi pelindung gusi (Gingival Barrier).</li>
                                <li>Aplikasi gel bleaching profesional berkadar terkontrol.</li>
                                <li>Aktivasi sinar laser dingin selama 3 x 15 menit sesi.</li>
                            </ul>
                        </div>
                    </div>
                    <div class="lg:col-span-5">
                        <img src="https://images.unsplash.com/photo-1598256989800-fe5f95da9787?auto=format&fit=crop&q=80&w=600" alt="Whitening Detail" loading="lazy" decoding="async" class="rounded-2xl w-full h-64 object-cover shadow-md">
                    </div>
                </div>

                <!-- Content 3: Veneers (Hidden) -->
                <div id="content-veneers" class="tab-content hidden grid lg:grid-cols-12 gap-8 items-center">
                    <div class="lg:col-span-7 space-y-4">
                        <div class="flex items-center gap-2 text-xs font-bold text-orange-600 uppercase">
                            <i data-lucide="gem" class="w-4 h-4"></i> Hollywood Smile Design
                        </div>
                        <h3 class="text-2xl font-extrabold text-slate-900">Porcelain Veneers Presisi Tinggi</h3>
                        <p class="text-slate-600 text-sm leading-relaxed">
                            Lapisan porselen tipis khusus buatan lab presisi yang ditempatkan di permukaan depan gigi untuk menciptakan senyum sempurna nan alami.
                        </p>

                        <div class="grid grid-cols-2 sm:grid-cols-3 gap-4 pt-2">
                            <div class="bg-slate-50 p-3.5 rounded-2xl border border-slate-100">
                                <span class="text-xs text-slate-400 block font-medium">Ketahanan</span>
                                <span class="text-sm font-extrabold text-slate-800">10 - 15 Tahun</span>
                            </div>
                            <div class="bg-slate-50 p-3.5 rounded-2xl border border-slate-100">
                                <span class="text-xs text-slate-400 block font-medium">Kunjungan</span>
                                <span class="text-sm font-extrabold text-slate-800">2 - 3 Sesi</span>
                            </div>
                            <div class="bg-slate-50 p-3.5 rounded-2xl border border-slate-100">
                                <span class="text-xs text-slate-400 block font-medium">Garansi</span>
                                <span class="text-sm font-extrabold text-pink-600"> Garansi 3 Tahun</span>
                            </div>
                        </div>
                    </div>
                    <div class="lg:col-span-5">
                        <img src="https://images.unsplash.com/photo-1571772996211-2f02c9727629?auto=format&fit=crop&q=80&w=600" alt="Veneer Detail" loading="lazy" decoding="async" class="rounded-2xl w-full h-64 object-cover shadow-md">
                    </div>
                </div>

                <!-- Content 4: Scaling (Hidden) -->
                <div id="content-scaling" class="tab-content hidden grid lg:grid-cols-12 gap-8 items-center">
                    <div class="lg:col-span-7 space-y-4">
                        <div class="flex items-center gap-2 text-xs font-bold text-amber-600 uppercase">
                            <i data-lucide="smile" class="w-4 h-4"></i> Painless Ultrasonic
                        </div>
                        <h3 class="text-2xl font-extrabold text-slate-900">Scaling Spa & Stain Removal</h3>
                        <p class="text-slate-600 text-sm leading-relaxed">
                            Pembersihan karang gigi dengan getaran mikro-ultrasonik lembut diikuti dengan pemijatan gusi dan penggosokan noda (airflow stain remover).
                        </p>

                        <div class="grid grid-cols-2 sm:grid-cols-3 gap-4 pt-2">
                            <div class="bg-slate-50 p-3.5 rounded-2xl border border-slate-100">
                                <span class="text-xs text-slate-400 block font-medium">Durasi</span>
                                <span class="text-sm font-extrabold text-slate-800">30 - 45 Menit</span>
                            </div>
                            <div class="bg-slate-50 p-3.5 rounded-2xl border border-slate-100">
                                <span class="text-xs text-slate-400 block font-medium">Sensitivitas</span>
                                <span class="text-sm font-extrabold text-emerald-600">Sangat Minimal</span>
                            </div>
                            <div class="bg-slate-50 p-3.5 rounded-2xl border border-slate-100">
                                <span class="text-xs text-slate-400 block font-medium">Rekomendasi</span>
                                <span class="text-sm font-extrabold text-slate-800">Setiap 6 Bulan</span>
                            </div>
                        </div>
                    </div>
                    <div class="lg:col-span-5">
                        <img src="https://images.unsplash.com/photo-1629909613654-28e377c37b09?auto=format&fit=crop&q=80&w=600" alt="Scaling Detail" loading="lazy" decoding="async" class="rounded-2xl w-full h-64 object-cover shadow-md">
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- 6. DENTIST PROFILES & CREDENTIALS -->
    <section id="dentists" class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <span class="text-xs font-bold uppercase tracking-widest text-pink-600 bg-pink-50 px-3.5 py-1.5 rounded-full border border-pink-100">Expert Care Team</span>
                <h2 class="text-3xl sm:text-4xl font-extrabold text-slate-900 mt-3">Dokter Spesialis Ramah & Berpengalaman</h2>
                <p class="text-slate-600 text-sm sm:text-base mt-2">Lulusan universitas terkemuka dengan sertifikasi internasional dalam estetika & ortodonti.</p>
            </div>

            <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-8">
                
                <!-- Dentist Card 1 -->
                <div class="bg-slate-50 rounded-3xl overflow-hidden border border-slate-100 shadow-sm hover:shadow-xl transition-all duration-300 group">
                    <div class="relative h-72 overflow-hidden bg-slate-200">
                        <img src="https://images.unsplash.com/photo-1559839734-2b71ea197ec2?auto=format&fit=crop&q=80&w=600" alt="drg. Valery" loading="lazy" decoding="async" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                        <div class="absolute top-4 left-4 bg-white/90 backdrop-blur-md px-3 py-1 rounded-full text-xs font-bold text-pink-600">
                            Head Orthodontist
                        </div>
                    </div>
                    <div class="p-6 space-y-3">
                        <div>
                            <h3 class="text-xl font-bold text-slate-900">drg. Valerie Anastasya, Sp.Ort</h3>
                            <p class="text-xs text-slate-500 font-medium">Spesialis Ortodonti & Certified Invisalign Provider</p>
                        </div>
                        <div class="flex items-center gap-2 text-xs text-slate-600">
                            <i data-lucide="award" class="w-4 h-4 text-pink-500"></i>
                            <span>10+ Tahun Pengalaman | FKG UI</span>
                        </div>
                        <p class="text-xs text-slate-600 leading-relaxed">"Setiap senyuman punya keunikan tersendiri. Fokus saya adalah menghadirkan alignment alami tanpa rasa nyeri berlebih."</p>
                        <div class="pt-3 border-t border-slate-200/60 flex justify-between items-center text-xs">
                            <span class="text-slate-500"><i data-lucide="clock" class="w-3.5 h-3.5 inline"></i> Senin, Rabu, Jumat</span>
                            <a href="#booking" class="font-bold text-pink-600 hover:text-pink-700">Pilih Dokter &rarr;</a>
                        </div>
                    </div>
                </div>

                <!-- Dentist Card 2 -->
                <div class="bg-slate-50 rounded-3xl overflow-hidden border border-slate-100 shadow-sm hover:shadow-xl transition-all duration-300 group">
                    <div class="relative h-72 overflow-hidden bg-slate-200">
                        <img src="https://images.unsplash.com/photo-1622253692010-333f2da6031d?auto=format&fit=crop&q=80&w=600" alt="drg. Julian" loading="lazy" decoding="async" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                        <div class="absolute top-4 left-4 bg-white/90 backdrop-blur-md px-3 py-1 rounded-full text-xs font-bold text-purple-600">
                            Aesthetic Dentist
                        </div>
                    </div>
                    <div class="p-6 space-y-3">
                        <div>
                            <h3 class="text-xl font-bold text-slate-900">drg. Julian Pratama, MDSc</h3>
                            <p class="text-xs text-slate-500 font-medium">Spesialis Estetika Gigi & Veneer Design</p>
                        </div>
                        <div class="flex items-center gap-2 text-xs text-slate-600">
                            <i data-lucide="award" class="w-4 h-4 text-purple-500"></i>
                            <span>Certified Smile Designer (USA)</span>
                        </div>
                        <p class="text-xs text-slate-600 leading-relaxed">"Aesthetic dentistry bukan cuma soal putih, tapi harmoni antara bentuk gigi, bibir, dan karakter wajahmu."</p>
                        <div class="pt-3 border-t border-slate-200/60 flex justify-between items-center text-xs">
                            <span class="text-slate-500"><i data-lucide="clock" class="w-3.5 h-3.5 inline"></i> Selasa, Kamis, Sabtu</span>
                            <a href="#booking" class="font-bold text-pink-600 hover:text-pink-700">Pilih Dokter &rarr;</a>
                        </div>
                    </div>
                </div>

                <!-- Dentist Card 3 -->
                <div class="bg-slate-50 rounded-3xl overflow-hidden border border-slate-100 shadow-sm hover:shadow-xl transition-all duration-300 group">
                    <div class="relative h-72 overflow-hidden bg-slate-200">
                        <img src="https://images.unsplash.com/photo-1594824813566-888242274b8a?auto=format&fit=crop&q=80&w=600" alt="drg. Nadine" loading="lazy" decoding="async" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                        <div class="absolute top-4 left-4 bg-white/90 backdrop-blur-md px-3 py-1 rounded-full text-xs font-bold text-orange-600">
                            Pediatric & General Care
                        </div>
                    </div>
                    <div class="p-6 space-y-3">
                        <div>
                            <h3 class="text-xl font-bold text-slate-900">drg. Nadine Clarissa, KGA</h3>
                            <p class="text-xs text-slate-500 font-medium">Spesialis Kedokteran Gigi Anak & Umum</p>
                        </div>
                        <div class="flex items-center gap-2 text-xs text-slate-600">
                            <i data-lucide="award" class="w-4 h-4 text-orange-500"></i>
                            <span>Painless Dental Specialist</span>
                        </div>
                        <p class="text-xs text-slate-600 leading-relaxed">"Menciptakan lingkungan konsultasi yang santai, fun, dan tidak menakutkan bagi remaja dan keluarga."</p>
                        <div class="pt-3 border-t border-slate-200/60 flex justify-between items-center text-xs">
                            <span class="text-slate-500"><i data-lucide="clock" class="w-3.5 h-3.5 inline"></i> Setiap Hari (Shift Siang)</span>
                            <a href="#booking" class="font-bold text-pink-600 hover:text-pink-700">Pilih Dokter &rarr;</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- 7. TREATMENT PRICE ESTIMATES (Interactive Calculator) -->
    <section id="pricing" class="py-20 bg-gradient-to-br from-slate-900 via-purple-950 to-slate-900 text-white relative">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid lg:grid-cols-12 gap-12 items-center">
                
                <div class="lg:col-span-5 space-y-6">
                    <span class="text-xs font-bold uppercase tracking-widest text-pink-400 bg-pink-500/20 px-3.5 py-1.5 rounded-full border border-pink-500/30">Transparent Pricing</span>
                    <h2 class="text-3xl sm:text-4xl font-extrabold leading-tight">Simulasi Estimasi Biaya & Cicilan 0%</h2>
                    <p class="text-slate-300 text-sm leading-relaxed">
                        Tidak ada biaya tersembunyi! Hitung estimasi perawatanmu dan pilih skema cicilan fleksibel hingga 12 bulan dengan metode BNPL atau Kartu Kredit.
                    </p>

                    <div class="space-y-3 pt-2">
                        <div class="flex items-center gap-3 text-sm">
                            <div class="w-6 h-6 rounded-full bg-emerald-500/20 text-emerald-400 flex items-center justify-center">
                                <i data-lucide="check" class="w-4 h-4"></i>
                            </div>
                            <span>Sudah termasuk konsultasi awal & 3D Scan gratis</span>
                        </div>
                        <div class="flex items-center gap-3 text-sm">
                            <div class="w-6 h-6 rounded-full bg-emerald-500/20 text-emerald-400 flex items-center justify-center">
                                <i data-lucide="check" class="w-4 h-4"></i>
                            </div>
                            <span>Bisa gunakan ShopeePayLater, GoPayLater, & Card</span>
                        </div>
                        <div class="flex items-center gap-3 text-sm">
                            <div class="w-6 h-6 rounded-full bg-emerald-500/20 text-emerald-400 flex items-center justify-center">
                                <i data-lucide="check" class="w-4 h-4"></i>
                            </div>
                            <span>Bebas admin pendaftaran ulang</span>
                        </div>
                    </div>
                </div>

                <!-- Calculator Card -->
                <div class="lg:col-span-7 bg-white/10 backdrop-blur-xl p-6 sm:p-8 rounded-3xl border border-white/20 shadow-2xl">
                    <h3 class="text-xl font-bold text-white mb-6 flex items-center gap-2">
                        <i data-lucide="calculator" class="w-5 h-5 text-pink-400"></i> Kalkulator Estimasi Biaya
                    </h3>

                    <div class="space-y-5">
                        <!-- Select Treatment -->
                        <div>
                            <label class="block text-xs font-bold uppercase tracking-wider text-slate-300 mb-2">Pilih Jenis Perawatan</label>
                            <select id="calcTreatment" onchange="calculatePrice()" class="w-full bg-slate-800/90 text-white border border-slate-700 rounded-xl px-4 py-3 text-sm focus:outline-none focus:border-pink-500">
                                <option value="scaling">Gentle Scaling Spa (Rp 450.000)</option>
                                <option value="whitening">Laser Teeth Whitening (Rp 1.950.000)</option>
                                <option value="braces">Aesthetic Sapphire Braces (Rp 7.500.000)</option>
                                <option value="invisalign" selected>Invisalign Clear Aligners (Rp 18.000.000)</option>
                                <option value="veneer">Porcelain Veneer per Tooth (Rp 3.200.000)</option>
                            </select>
                        </div>

                        <!-- Tenor Select -->
                        <div>
                            <label class="block text-xs font-bold uppercase tracking-wider text-slate-300 mb-2">Skema Cicilan (0% Interest)</label>
                            <div class="grid grid-cols-4 gap-2">
                                <button onclick="setTenor(1)" id="tenor1" class="tenor-btn py-2 text-xs font-bold rounded-xl border border-pink-500 bg-pink-500 text-white">Full</button>
                                <button onclick="setTenor(3)" id="tenor3" class="tenor-btn py-2 text-xs font-bold rounded-xl border border-slate-700 bg-slate-800 text-slate-300 hover:border-slate-500">3 Bulan</button>
                                <button onclick="setTenor(6)" id="tenor6" class="tenor-btn py-2 text-xs font-bold rounded-xl border border-slate-700 bg-slate-800 text-slate-300 hover:border-slate-500">6 Bulan</button>
                                <button onclick="setTenor(12)" id="tenor12" class="tenor-btn py-2 text-xs font-bold rounded-xl border border-slate-700 bg-slate-800 text-slate-300 hover:border-slate-500">12 Bulan</button>
                            </div>
                        </div>

                        <!-- Price Calculation Display Box -->
                        <div class="bg-gradient-to-r from-pink-500/20 to-purple-500/20 p-5 rounded-2xl border border-pink-500/30 space-y-3">
                            <div class="flex justify-between items-center text-xs text-slate-300">
                                <span>Total Estimated Cost:</span>
                                <span id="calcTotal" class="text-base font-extrabold text-white">Rp 18.000.000</span>
                            </div>
                            <div class="flex justify-between items-center pt-2 border-t border-white/10">
                                <span class="text-xs font-medium text-pink-300">Estimasi Cicilan per Bulan:</span>
                                <span id="calcMonthly" class="text-2xl font-extrabold text-gradient">Rp 1.500.000 / bln</span>
                            </div>
                        </div>

                        <a href="#booking" class="block w-full text-center bg-sunset-gradient text-white font-bold py-3.5 rounded-2xl shadow-sunset-glow hover:scale-[1.02] transition-transform">
                            Kunci Harga & Promo Ini Sekarang
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- 8. CLINIC FACILITIES & EQUIPMENT -->
    <section id="facilities" class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <span class="text-xs font-bold uppercase tracking-widest text-pink-600 bg-pink-50 px-3.5 py-1.5 rounded-full border border-pink-100">Modern Atmosphere</span>
                <h2 class="text-3xl sm:text-4xl font-extrabold text-slate-900 mt-3">Fasilitas Standar Internasional & Aesthetic Comfort</h2>
                <p class="text-slate-600 text-sm sm:text-base mt-2">Didesain dengan nuansa lounge santai, bersih steril, dan dilengkapi hiburan Netflix/Spotify selama perawatan.</p>
            </div>

            <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-6">
                
                <!-- Facility 1 -->
                <div class="bg-slate-50 rounded-2xl p-5 border border-slate-100 space-y-3 hover:shadow-md transition">
                    <img src="https://images.unsplash.com/photo-1629909615184-74f495363b67?auto=format&fit=crop&q=80&w=500" alt="iTero Scanner" loading="lazy" decoding="async" class="w-full h-40 object-cover rounded-xl">
                    <h3 class="font-bold text-slate-800 text-base">iTero 3D Intraoral Scanner</h3>
                    <p class="text-xs text-slate-500">Pemindaian gigi digital presisi tinggi tanpa perlu cetakan pasta yang membuat mual.</p>
                </div>

                <!-- Facility 2 -->
                <div class="bg-slate-50 rounded-2xl p-5 border border-slate-100 space-y-3 hover:shadow-md transition">
                    <img src="https://images.unsplash.com/photo-1519494026892-80bbd2d6fd0d?auto=format&fit=crop&q=80&w=500" alt="Comfort Lounge" loading="lazy" decoding="async" class="w-full h-40 object-cover rounded-xl">
                    <h3 class="font-bold text-slate-800 text-base">Comfort Dental Lounge</h3>
                    <p class="text-xs text-slate-500">Ruang tunggu bergaya cafe modern dengan complimentary artisan coffee, tea, & Wi-Fi kencang.</p>
                </div>

                <!-- Facility 3 -->
                <div class="bg-slate-50 rounded-2xl p-5 border border-slate-100 space-y-3 hover:shadow-md transition">
                    <img src="https://images.unsplash.com/photo-1584515979956-d9f6e5d09982?auto=format&fit=crop&q=80&w=500" alt="Sterilization Lab" loading="lazy" decoding="async" class="w-full h-40 object-cover rounded-xl">
                    <h3 class="font-bold text-slate-800 text-base">Autoclave Steril Room</h3>
                    <p class="text-xs text-slate-500">Sistem sterilisasi 4-tahap standar rumah sakit internasional jaminan 100% higienis.</p>
                </div>

                <!-- Facility 4 -->
                <div class="bg-slate-50 rounded-2xl p-5 border border-slate-100 space-y-3 hover:shadow-md transition">
                    <img src="https://images.unsplash.com/photo-1516549655169-df83a0774514?auto=format&fit=crop&q=80&w=500" alt="Entertainment Room" loading="lazy" decoding="async" class="w-full h-40 object-cover rounded-xl">
                    <h3 class="font-bold text-slate-800 text-base">Netflix & Spotify Ceiling Screens</h3>
                    <p class="text-xs text-slate-500">Tonton film atau dengarkan musik favorit di langit-langit plafon selama perawatan berlangsung.</p>
                </div>

            </div>
        </div>
    </section>

    <!-- 9. INSURANCE & PAYMENT OPTIONS -->
    <section class="py-12 bg-slate-50 border-y border-slate-200/60">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center space-y-6">
            <span class="text-xs font-bold text-slate-400 uppercase tracking-widest">Metode Pembayaran & Partner Asuransi</span>
            <div class="flex flex-wrap justify-center items-center gap-6 sm:gap-12 grayscale opacity-70 hover:grayscale-0 hover:opacity-100 transition-all">
                <span class="font-extrabold text-slate-700 text-lg tracking-wider">QRIS</span>
                <span class="font-extrabold text-slate-700 text-lg tracking-wider">BCA 0%</span>
                <span class="font-extrabold text-slate-700 text-lg tracking-wider">Mandiri</span>
                <span class="font-extrabold text-slate-700 text-lg tracking-wider">ShopeePayLater</span>
                <span class="font-extrabold text-slate-700 text-lg tracking-wider">GoPayLater</span>
                <span class="font-extrabold text-slate-700 text-lg tracking-wider">ALLIANZ</span>
                <span class="font-extrabold text-slate-700 text-lg tracking-wider">PRUDENTIAL</span>
            </div>
        </div>
    </section>

    <!-- 10. PATIENT TESTIMONIALS (Social Media Style Cards) -->
    <section id="testimonials" class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <span class="text-xs font-bold uppercase tracking-widest text-pink-600 bg-pink-50 px-3.5 py-1.5 rounded-full border border-pink-100">Real Reviews</span>
                <h2 class="text-3xl sm:text-4xl font-extrabold text-slate-900 mt-3">Kata Mereka Tentang GlowDental</h2>
                <p class="text-slate-600 text-sm sm:text-base mt-2">Pengalaman asli dari para pasien kami yang sudah merasakan perubahan senyumnya.</p>
            </div>

            <div class="grid md:grid-cols-3 gap-8">
                
                <!-- Review 1 -->
                <div class="bg-slate-50 p-6 rounded-3xl border border-slate-100 space-y-4 relative">
                    <div class="flex items-center gap-3">
                        <img src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&q=80&w=150" alt="Patient" class="w-12 h-12 rounded-full object-cover border-2 border-pink-400">
                        <div>
                            <h4 class="font-bold text-slate-900 text-sm">Amanda Clarissa</h4>
                            <span class="text-xs text-pink-600 font-medium">@amanda_clara (Content Creator)</span>
                        </div>
                    </div>
                    <div class="flex text-amber-400 text-xs">
                        <i data-lucide="star" class="w-4 h-4 fill-amber-400"></i>
                        <i data-lucide="star" class="w-4 h-4 fill-amber-400"></i>
                        <i data-lucide="star" class="w-4 h-4 fill-amber-400"></i>
                        <i data-lucide="star" class="w-4 h-4 fill-amber-400"></i>
                        <i data-lucide="star" class="w-4 h-4 fill-amber-400"></i>
                    </div>
                    <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">
                        "First time cobain Invisalign di sini dan puas banget! Dokternya ramah bgt ngejelasin detail, tempatnya estetik kayak coffee shop. Gak berasa trauma sama sekali!"
                    </p>
                    <span class="inline-block text-[10px] bg-slate-200 text-slate-600 px-2 py-0.5 rounded-md font-bold">Verified Patient - Invisalign</span>
                </div>

                <!-- Review 2 -->
                <div class="bg-slate-50 p-6 rounded-3xl border border-slate-100 space-y-4 relative">
                    <div class="flex items-center gap-3">
                        <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?auto=format&fit=crop&q=80&w=150" alt="Patient" class="w-12 h-12 rounded-full object-cover border-2 border-pink-400">
                        <div>
                            <h4 class="font-bold text-slate-900 text-sm">Rizky Ramadhan</h4>
                            <span class="text-xs text-pink-600 font-medium">@rizky_rmd</span>
                        </div>
                    </div>
                    <div class="flex text-amber-400 text-xs">
                        <i data-lucide="star" class="w-4 h-4 fill-amber-400"></i>
                        <i data-lucide="star" class="w-4 h-4 fill-amber-400"></i>
                        <i data-lucide="star" class="w-4 h-4 fill-amber-400"></i>
                        <i data-lucide="star" class="w-4 h-4 fill-amber-400"></i>
                        <i data-lucide="star" class="w-4 h-4 fill-amber-400"></i>
                    </div>
                    <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">
                        "Whitening gigi 45 menit beneran langsung kelihatan bedanya! Pas pengerjaan bisa sambil nonton Netflix pakai ceiling screen. Super recommended!"
                    </p>
                    <span class="inline-block text-[10px] bg-slate-200 text-slate-600 px-2 py-0.5 rounded-md font-bold">Verified Patient - Whitening</span>
                </div>

                <!-- Review 3 -->
                <div class="bg-slate-50 p-6 rounded-3xl border border-slate-100 space-y-4 relative">
                    <div class="flex items-center gap-3">
                        <img src="https://images.unsplash.com/photo-1517841905240-472988babdf9?auto=format&fit=crop&q=80&w=150" alt="Patient" class="w-12 h-12 rounded-full object-cover border-2 border-pink-400">
                        <div>
                            <h4 class="font-bold text-slate-900 text-sm">Jessica Tan</h4>
                            <span class="text-xs text-pink-600 font-medium">@jessica_t</span>
                        </div>
                    </div>
                    <div class="flex text-amber-400 text-xs">
                        <i data-lucide="star" class="w-4 h-4 fill-amber-400"></i>
                        <i data-lucide="star" class="w-4 h-4 fill-amber-400"></i>
                        <i data-lucide="star" class="w-4 h-4 fill-amber-400"></i>
                        <i data-lucide="star" class="w-4 h-4 fill-amber-400"></i>
                        <i data-lucide="star" class="w-4 h-4 fill-amber-400"></i>
                    </div>
                    <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">
                        "Paling suka pelayanan admin & pembayaran cicilannya yang transparan bgt. Bebas drama biaya mendadak. Tempatnya super wangi dan bersih."
                    </p>
                    <span class="inline-block text-[10px] bg-slate-200 text-slate-600 px-2 py-0.5 rounded-md font-bold">Verified Patient - Veneers</span>
                </div>

            </div>
        </div>
    </section>

    <!-- 11. APPOINTMENT BOOKING WIDGET -->
    <section id="booking" class="py-20 bg-slate-100/80">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white rounded-3xl p-6 sm:p-10 shadow-2xl border border-slate-200">
                <div class="text-center mb-8">
                    <span class="text-xs font-bold uppercase tracking-widest text-pink-600 bg-pink-50 px-3.5 py-1.5 rounded-full border border-pink-100">Quick Booking</span>
                    <h2 class="text-3xl font-extrabold text-slate-900 mt-3">Reservasi Jadwal Konsultasi</h2>
                    <p class="text-slate-600 text-sm mt-1">Pilih tanggal, dokter, dan waktu yang kamu inginkan dalam 1 menit.</p>
                </div>

                <form id="bookingForm" onsubmit="handleBooking(event)" class="space-y-6">
                    <div class="grid sm:grid-cols-2 gap-6">
                        <!-- Nama -->
                        <div>
                            <label class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-2">Nama Lengkap *</label>
                            <input type="text" name="name" required placeholder="Contoh: Sarah Azhari" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-sm focus:outline-none focus:border-pink-500 transition">
                        </div>
                        <!-- Nomor WA -->
                        <div>
                            <label class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-2">Nomor WhatsApp *</label>
                            <input type="tel" name="phone" required placeholder="08123456789" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-sm focus:outline-none focus:border-pink-500 transition">
                        </div>
                    </div>

                    <div class="grid sm:grid-cols-2 gap-6">
                        <!-- Perawatan -->
                        <div>
                            <label class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-2">Pilih Perawatan *</label>
                            <select name="treatment" required class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-sm focus:outline-none focus:border-pink-500 transition">
                                <option value="">-- Pilih Jenis Treatment --</option>
                                <option value="Invisalign">Invisalign (Clear Aligners)</option>
                                <option value="Teeth Whitening">Laser Teeth Whitening</option>
                                <option value="Behel / Braces">Behel Estetik / Sapphire</option>
                                <option value="Veneers">Porcelain / Composite Veneers</option>
                                <option value="Scaling">Gentle Scaling & Spa</option>
                                <option value="General Checkup">Konsultasi Umum</option>
                            </select>
                        </div>
                        <!-- Pilih Dokter -->
                        <div>
                            <label class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-2">Pilih Dokter Spesialis</label>
                            <select name="doctor" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-sm focus:outline-none focus:border-pink-500 transition">
                                <option value="Bebas">Dokter Mana Saja (Jadwal Tercepat)</option>
                                <option value="drg. Valerie Anastasya">drg. Valerie Anastasya, Sp.Ort</option>
                                <option value="drg. Julian Pratama">drg. Julian Pratama, MDSc</option>
                                <option value="drg. Nadine Clarissa">drg. Nadine Clarissa, KGA</option>
                            </select>
                        </div>
                    </div>

                    <div class="grid sm:grid-cols-2 gap-6">
                        <!-- Tanggal -->
                        <div>
                            <label class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-2">Tanggal Kedatangan *</label>
                            <input type="date" name="date" required class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-sm focus:outline-none focus:border-pink-500 transition">
                        </div>
                        <!-- Jam -->
                        <div>
                            <label class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-2">Pilihan Waktu *</label>
                            <select name="time" required class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-sm focus:outline-none focus:border-pink-500 transition">
                                <option value="10:00 - 12:00">Pagi (10:00 - 12:00)</option>
                                <option value="13:00 - 16:00">Siang (13:00 - 16:00)</option>
                                <option value="17:00 - 20:00">Sore/Malam (17:00 - 20:00)</option>
                            </select>
                        </div>
                    </div>

                    <!-- Note -->
                    <div>
                        <label class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-2">Catatan Keluhan Gigi (Opsional)</label>
                        <textarea name="complaint" rows="3" placeholder="Contoh: Gigi bagian depan agak bertumpuk, mau tanya estimasi Invisalign..." class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-sm focus:outline-none focus:border-pink-500 transition"></textarea>
                    </div>

                    <button type="submit" class="w-full bg-sunset-gradient hover:opacity-95 text-white font-bold py-4 rounded-2xl shadow-sunset-glow transition-all transform hover:-translate-y-0.5 flex items-center justify-center gap-2">
                        <i data-lucide="check-circle" class="w-5 h-5"></i>
                        <span>Konfirmasi Booking via WhatsApp</span>
                    </button>
                </form>

                <!-- Feedback Message Container -->
                <div id="bookingAlert" class="hidden mt-4 p-4 rounded-2xl bg-emerald-50 text-emerald-800 text-xs font-bold text-center border border-emerald-200">
                    ✅ Data booking berhasil terkirim! Tim kami akan segera mengonfirmasi via WhatsApp.
                </div>
            </div>
        </div>
    </section>

    <!-- 12. CLINIC LOCATION & OPENING HOURS -->
    <section id="contact" class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid lg:grid-cols-12 gap-12 items-center">
                
                <div class="lg:col-span-6 space-y-6">
                    <span class="text-xs font-bold uppercase tracking-widest text-pink-600 bg-pink-50 px-3.5 py-1.5 rounded-full border border-pink-100">Visit Our Studio</span>
                    <h2 class="text-3xl font-extrabold text-slate-900">Lokasi Strategis & Jam Operasional</h2>
                    <p class="text-slate-600 text-sm leading-relaxed">
                        Terletak di pusat kota yang mudah diakses dengan area parkir luas & gratis valet service untuk kenyamananmu.
                    </p>

                    <div class="space-y-4 pt-2">
                        <div class="flex items-start gap-4">
                            <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center shrink-0">
                                <i data-lucide="map-pin" class="w-5 h-5"></i>
                            </div>
                            <div>
                                <h4 class="font-bold text-slate-900 text-sm">Alamat Studio</h4>
                                <p class="text-xs text-slate-600 mt-0.5">Jl. Senopati No. 88, Kebayoran Baru, Jakarta Selatan (Samping Parkir Barat)</p>
                            </div>
                        </div>

                        <div class="flex items-start gap-4">
                            <div class="w-10 h-10 rounded-xl bg-purple-100 text-purple-600 flex items-center justify-center shrink-0">
                                <i data-lucide="clock" class="w-5 h-5"></i>
                            </div>
                            <div>
                                <h4 class="font-bold text-slate-900 text-sm">Jam Operasional</h4>
                                <p class="text-xs text-slate-600 mt-0.5">Senin - Sabtu: 09:00 - 21:00 WIB</p>
                                <p class="text-xs text-slate-600">Minggu: 10:00 - 18:00 WIB</p>
                            </div>
                        </div>

                        <div class="flex items-start gap-4">
                            <div class="w-10 h-10 rounded-xl bg-emerald-100 text-emerald-600 flex items-center justify-center shrink-0">
                                <i data-lucide="phone" class="w-5 h-5"></i>
                            </div>
                            <div>
                                <h4 class="font-bold text-slate-900 text-sm">Layanan Telepon / WA Hotline</h4>
                                <p class="text-xs text-slate-600 mt-0.5">+62 812-9988-7766 (Fast Response 24/7)</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Mock Map visual -->
                <div class="lg:col-span-6 bg-slate-100 rounded-3xl h-80 relative overflow-hidden border border-slate-200 flex items-center justify-center shadow-inner">
                    <img src="https://images.unsplash.com/photo-1526778548025-fa2f459cd5c1?auto=format&fit=crop&q=80&w=800" alt="Map View" loading="lazy" decoding="async" class="w-full h-full object-cover opacity-60">
                    <div class="absolute inset-0 bg-gradient-to-t from-slate-900/60 to-transparent"></div>
                    <div class="absolute bg-white/95 backdrop-blur-md p-4 rounded-2xl shadow-xl text-center space-y-2 border border-slate-100 max-w-xs">
                        <i data-lucide="map-pin" class="w-8 h-8 text-pink-600 mx-auto animate-bounce"></i>
                        <p class="font-extrabold text-slate-800 text-sm">GlowDental Studio Senopati</p>
                        <a href="https://maps.google.com" target="_blank" class="inline-block bg-sunset-gradient text-white text-xs font-bold px-4 py-2 rounded-xl">Buka di Google Maps</a>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- 13. FLOATING BUTTONS & AI CHATBOT MOCKUP -->
    
    <!-- Floating WhatsApp Button -->
    <a href="https://wa.me/" target="_blank" class="fixed bottom-6 right-6 z-40 bg-emerald-500 hover:bg-emerald-600 text-white p-3.5 rounded-full shadow-2xl transition-transform transform hover:scale-110 flex items-center justify-center group" title="Chat Admin WA">
        <i data-lucide="message-circle" class="w-7 h-7"></i>
        <span class="max-w-0 overflow-hidden group-hover:max-w-xs transition-all duration-300 whitespace-nowrap text-xs font-bold pl-0 group-hover:pl-2">Chat WA Admin</span>
    </a>

    <!-- Floating AI Chatbot Trigger -->
    <button onclick="toggleChatbot()" class="fixed bottom-6 right-24 z-40 bg-sunset-gradient text-white p-3.5 rounded-full shadow-2xl transition-transform transform hover:scale-110 flex items-center justify-center" title="AI Dental Assistant">
        <i data-lucide="bot" class="w-7 h-7"></i>
    </button>

    <!-- AI Chatbot Popup Window (Mockup UI Interaktif) -->
    <div id="chatbotModal" class="hidden fixed bottom-24 right-6 z-50 w-80 sm:w-96 bg-white rounded-3xl shadow-2xl border border-slate-200 overflow-hidden flex flex-col h-[480px]">
        <!-- Chat Header -->
        <div class="bg-sunset-gradient p-4 text-white flex justify-between items-center">
            <div class="flex items-center gap-2">
                <div class="w-8 h-8 rounded-full bg-white/20 flex items-center justify-center">
                    <i data-lucide="sparkles" class="w-4 h-4 text-white"></i>
                </div>
                <div>
                    <h4 class="font-bold text-sm">GlowBot AI Assistant</h4>
                    <span class="text-[10px] text-pink-100 flex items-center gap-1"><span class="w-1.5 h-1.5 rounded-full bg-emerald-400"></span> Online (FAQ & Pricing)</span>
                </div>
            </div>
            <button onclick="toggleChatbot()" class="text-white/80 hover:text-white">
                <i data-lucide="x" class="w-5 h-5"></i>
            </button>
        </div>

        <!-- Chat Body -->
        <div id="chatMessages" class="p-4 flex-1 overflow-y-auto space-y-3 bg-slate-50 text-xs">
            <div class="bg-white p-3 rounded-2xl rounded-tl-none border border-slate-100 text-slate-700 shadow-sm">
                👋 Halo! Saya GlowBot. Ada yang bisa saya bantu hari ini? Pilih pertanyaan cepat di bawah:
            </div>
            
            <!-- Quick FAQ Options -->
            <div class="space-y-1.5 pt-1">
                <button onclick="sendQuickReply('Berapa harga Invisalign?')" class="w-full text-left bg-pink-50 hover:bg-pink-100 text-pink-700 p-2 rounded-xl border border-pink-200 transition font-medium">
                    ❓ Berapa estimasi harga Invisalign?
                </button>
                <button onclick="sendQuickReply('Apakah scaling sakit?')" class="w-full text-left bg-pink-50 hover:bg-pink-100 text-pink-700 p-2 rounded-xl border border-pink-200 transition font-medium">
                    ❓ Apakah Scaling Gigi terasa sakit?
                </button>
                <button onclick="sendQuickReply('Bagaimana cara buat janji?')" class="w-full text-left bg-pink-50 hover:bg-pink-100 text-pink-700 p-2 rounded-xl border border-pink-200 transition font-medium">
                    ❓ Bagaimana cara reservasi jadwal?
                </button>
            </div>
        </div>

        <!-- Chat Input -->
        <div class="p-3 bg-white border-t border-slate-100 flex gap-2">
            <input id="chatInput" type="text" placeholder="Ketik pertanyaanmu..." class="flex-1 text-xs bg-slate-100 rounded-xl px-3 py-2.5 focus:outline-none focus:ring-1 focus:ring-pink-500">
            <button onclick="sendCustomMessage()" class="bg-sunset-gradient text-white p-2.5 rounded-xl hover:opacity-90">
                <i data-lucide="send" class="w-4 h-4"></i>
            </button>
        </div>
    </div>

    <!-- 14. FOOTER -->
    <footer class="bg-slate-900 text-slate-400 pt-16 pb-12 text-xs border-t border-slate-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-2 md:grid-cols-5 gap-8 pb-12 border-b border-slate-800">
                
                <!-- Col 1 Logo & Info -->
                <div class="col-span-2 space-y-4">
                    <div class="flex items-center gap-2">
                        <div class="w-8 h-8 rounded-xl bg-sunset-gradient p-1.5 flex items-center justify-center text-white">
                            <i data-lucide="sparkles" class="w-5 h-5"></i>
                        </div>
                        <span class="text-lg font-bold text-white">GlowDental Studio</span>
                    </div>
                    <p class="text-slate-400 leading-relaxed max-w-sm">
                        Klinik spesialis estetik gigi & ortodonti terpercaya. Menghadirkan pengalaman perawatan gigi modern, estetis, dan tanpa nyeri bagi Gen-Z & profesional.
                    </p>
                    <div class="flex gap-3 text-slate-300 pt-2">
                        <a href="#" class="w-8 h-8 rounded-full bg-slate-800 flex items-center justify-center hover:bg-pink-600 transition"><i data-lucide="instagram" class="w-4 h-4"></i></a>
                        <a href="#" class="w-8 h-8 rounded-full bg-slate-800 flex items-center justify-center hover:bg-pink-600 transition"><i data-lucide="video" class="w-4 h-4"></i></a>
                        <a href="#" class="w-8 h-8 rounded-full bg-slate-800 flex items-center justify-center hover:bg-pink-600 transition"><i data-lucide="youtube" class="w-4 h-4"></i></a>
                    </div>
                </div>

                <!-- Col 2 Links -->
                <div class="space-y-3">
                    <p class="font-bold text-white text-sm">Layanan Utama</p>
                    <ul class="space-y-2">
                        <li><a href="#services" class="hover:text-white transition">Invisalign Aligners</a></li>
                        <li><a href="#services" class="hover:text-white transition">Laser Whitening</a></li>
                        <li><a href="#services" class="hover:text-white transition">Porcelain Veneers</a></li>
                        <li><a href="#services" class="hover:text-white transition">Behel Sapphire</a></li>
                        <li><a href="#services" class="hover:text-white transition">Gentle Scaling Spa</a></li>
                    </ul>
                </div>

                <!-- Col 3 Links -->
                <div class="space-y-3">
                    <p class="font-bold text-white text-sm">Informasi</p>
                    <ul class="space-y-2">
                        <li><a href="#dentists" class="hover:text-white transition">Dokter Spesialis</a></li>
                        <li><a href="#pricing" class="hover:text-white transition">Estimasi & Cicilan</a></li>
                        <li><a href="#facilities" class="hover:text-white transition">Fasilitas Klinik</a></li>
                        <li><a href="#testimonials" class="hover:text-white transition">Ulasan Pasien</a></li>
                    </ul>
                </div>

                <!-- Col 4 Newsletter -->
                <div class="col-span-2 md:col-span-1 space-y-3">
                    <p class="font-bold text-white text-sm">Glow Newsletter</p>
                    <p class="text-slate-400 text-[11px]">Dapatkan info promo spesial gigi harian & tips kesehatan senyum.</p>
                    <div class="space-y-2">
                        <input type="email" placeholder="Email kamu..." class="w-full bg-slate-800 border border-slate-700 rounded-xl px-3 py-2 text-xs text-white focus:outline-none focus:border-pink-500">
                        <button class="w-full bg-sunset-gradient text-white font-bold py-2 rounded-xl">Subscribe</button>
                    </div>
                </div>

            </div>

            <div class="pt-8 flex flex-col sm:flex-row justify-between items-center gap-4 text-[11px] text-slate-500">
                <p>&copy; 2026 GlowDental Studio & Orthodontics. All Rights Reserved.</p>
                <div class="flex gap-4">
                    <a href="#" class="hover:text-slate-300">Privacy Policy</a>
                    <a href="#" class="hover:text-slate-300">Terms of Service</a>
                </div>
            </div>
        </div>
    </footer>

    <!-- INTERACTIVE JAVASCRIPT LOGIC -->
    <script src="{{ asset('js/website-bisnis/templates/healthcare/dental/sunset-dental-care.js') }}" defer></script>
</body>
</html>