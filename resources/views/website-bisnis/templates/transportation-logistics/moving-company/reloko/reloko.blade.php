<!DOCTYPE html>
<html lang="id" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reloko - Premium Modern Moving & Relocation Services</title>

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        tealBrand: {
                            50: '#F0FDFD',
                            100: '#CCFBF1',
                            500: '#14B8A6',
                            600: '#0D9488',
                            700: '#0F766E',
                            800: '#115E59',
                            900: '#134E4A',
                            dark: '#0A2E2C',
                        },
                        amberBrand: {
                            300: '#FCD34D',
                            400: '#FBBF24',
                            500: '#F59E0B',
                            600: '#D97706',
                        },
                        warmSand: {
                            50: '#FDFBF7',
                            100: '#F8F4EC',
                            200: '#EFE6D5',
                            300: '#E3D3B8',
                        }
                    },
                    fontFamily: {
                        sans: ['Plus Jakarta Sans', 'Inter', 'sans-serif'],
                        mono: ['JetBrains Mono', 'monospace'],
                    }
                }
            }
        }
    </script>


    <!-- Google Fonts & FontAwesome -->
    <link
        href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=JetBrains+Mono:wght@400;600;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet"
        href="{{ asset('css/website-bisnis/templates/transportation-logistics/moving-company/reloko/reloko.css') }}">


</head>

<body
    class="font-sans bg-warmSand-50 text-tealBrand-dark antialiased overflow-x-hidden relative selection:bg-amberBrand-400 selection:text-tealBrand-dark">

    <!-- CANVAS PARTICLES BACKGROUND -->
    <canvas id="moving-canvas" class="fixed inset-0 pointer-events-none z-0 opacity-30"></canvas>

    <!-- TOPBAR -->
    <div
        class="bg-tealBrand-dark text-warmSand-100 text-xs font-mono py-2.5 px-4 border-b border-tealBrand-600/30 relative z-50">
        <div class="max-w-7xl mx-auto flex flex-col sm:flex-row justify-between items-center gap-2">
            <div class="flex items-center space-x-4">
                <span class="flex items-center gap-2"><i
                        class="fas fa-truck-ramp-box text-amberBrand-400 animate-pulse"></i> Layanan Pindahan Rumah &
                    Kantor Bebas Stres #1</span>
                <span class="hidden md:inline text-tealBrand-600">|</span>
                <span class="hidden md:flex items-center gap-1.5"><i
                        class="fas fa-shield-halved text-tealBrand-500"></i> Proteksi Barang & Asuransi Hingga Rp 500
                    Juta</span>
            </div>
            <div class="flex items-center space-x-6">
                <a href="tel:0800123456" class="hover:text-amberBrand-400 transition flex items-center gap-1.5"><i
                        class="fas fa-phone text-amberBrand-400"></i> Hotline: 0800-123-MOVE</a>
                <a href="#planner" class="hover:text-amberBrand-400 transition flex items-center gap-1.5"><i
                        class="fas fa-clipboard-check text-amberBrand-400"></i> Booking Survey Gratis</a>
            </div>
        </div>
    </div>

    <!-- NAVBAR -->
    <nav class="sticky top-0 z-40 bg-warmSand-50/90 backdrop-blur-md border-b border-warmSand-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-20">
                <!-- Brand Logo -->
                <a href="#" class="flex items-center space-x-3 group">
                    <div
                        class="w-11 h-11 rounded-2xl bg-gradient-to-br from-tealBrand-600 to-tealBrand-800 text-amberBrand-400 flex items-center justify-center text-xl shadow-lg border border-tealBrand-500/40 group-hover:scale-105 transition">
                        📦
                    </div>
                    <div>
                        <span class="font-extrabold text-2xl tracking-tight text-tealBrand-dark block">RELOKO<span
                                class="text-amberBrand-500">.</span></span>
                        <span
                            class="text-[10px] font-mono font-bold text-tealBrand-600 tracking-widest uppercase block -mt-1">Modern
                            Relocation Co.</span>
                    </div>
                </a>

                <!-- Nav Links -->
                <div class="hidden lg:flex items-center space-x-7 font-medium text-sm text-tealBrand-dark">
                    <a href="#planner" class="hover:text-tealBrand-600 transition">Planner Pindahan</a>
                    <a href="#services" class="hover:text-tealBrand-600 transition">Layanan</a>
                    <a href="#estimator" class="hover:text-tealBrand-600 transition">Estimasi Biaya</a>
                    <a href="#checklist" class="hover:text-tealBrand-600 transition">Checklist Barang</a>
                    <a href="#fleet" class="hover:text-tealBrand-600 transition">Armada & Tim</a>
                    <a href="#timeline" class="hover:text-tealBrand-600 transition">Timeline</a>
                    <a href="#faq" class="hover:text-tealBrand-600 transition">FAQ</a>
                </div>

                <!-- CTA Button -->
                <div class="hidden sm:flex items-center space-x-3">
                    <a href="#planner"
                        class="px-5 py-3 rounded-2xl bg-gradient-to-r from-tealBrand-600 to-tealBrand-800 text-white font-mono text-xs font-bold uppercase tracking-wider shadow-md hover:shadow-xl hover:scale-[1.02] transition">
                        <i class="fas fa-boxes-packing mr-2 text-amberBrand-400"></i> Plan Your Move
                    </a>
                </div>

                <button onclick="toggleMobileMenu()" class="lg:hidden text-2xl p-2 text-tealBrand-dark">
                    <i class="fas fa-bars"></i>
                </button>
            </div>
        </div>

        <div id="mobileMenu"
            class="hidden lg:hidden bg-warmSand-50 border-b border-warmSand-200 px-4 pt-2 pb-6 space-y-3 font-medium text-sm">
            <a href="#planner" onclick="toggleMobileMenu()" class="block py-2">Planner Pindahan</a>
            <a href="#services" onclick="toggleMobileMenu()" class="block py-2">Layanan</a>
            <a href="#estimator" onclick="toggleMobileMenu()" class="block py-2">Estimasi Biaya</a>
            <a href="#checklist" onclick="toggleMobileMenu()" class="block py-2">Checklist Barang</a>
            <a href="#planner" onclick="toggleMobileMenu()" class="block py-2">Survey Gratis</a>
        </div>
    </nav>

    <!-- MAIN CONTENT -->
    <main class="relative z-10 space-y-24 py-6">

        <!-- ULTRA-UNIQUE ANIMATED HERO BANNER WITH VIRTUAL DISPATCH STUDIO -->
        <section id="hero" class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div
                class="relative rounded-[40px] bg-gradient-to-br from-tealBrand-dark via-tealBrand-900 to-tealBrand-800 p-8 sm:p-14 border-2 border-tealBrand-500/40 shadow-2xl text-white overflow-hidden">
                <!-- Glowing Ambient Light Spheres -->
                <div
                    class="absolute -top-24 -right-24 w-96 h-96 bg-amberBrand-400/20 rounded-full blur-3xl pointer-events-none">
                </div>
                <div
                    class="absolute -bottom-24 -left-24 w-96 h-96 bg-tealBrand-500/30 rounded-full blur-3xl pointer-events-none">
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 items-center relative z-10">
                    <!-- Left Hero Content -->
                    <div class="lg:col-span-6 space-y-6">
                        <div
                            class="inline-flex items-center space-x-2 px-4 py-2 rounded-full bg-tealBrand-700/60 border border-tealBrand-400/30 text-amberBrand-300 font-mono text-xs font-bold shadow-inner">
                            <span class="w-2.5 h-2.5 rounded-full bg-amberBrand-400 animate-ping"></span>
                            <span>⚡ SMART RELOCATION & AUTOMATED DISPATCH</span>
                        </div>

                        <h1 class="font-extrabold text-4xl sm:text-6xl tracking-tight leading-[1.12]">
                            Pindahan Modern,<br>
                            <span
                                class="bg-gradient-to-r from-amberBrand-300 via-amberBrand-400 to-warmSand-100 bg-clip-text text-transparent italic">
                                Tanpa Stres & Terjadwal.
                            </span>
                        </h1>

                        <p class="text-warmSand-100/90 text-sm sm:text-base max-w-xl leading-relaxed">
                            Nikmati pengalaman pindah hunian & kantor serba otomatis. Dari pengepakan kardus berlapis,
                            penanganan barang mewah/fragile, hingga pelacakan truk real-time.
                        </p>

                        <div class="flex flex-col sm:flex-row gap-4 pt-2">
                            <a href="#planner"
                                class="px-8 py-4 rounded-2xl bg-gradient-to-r from-amberBrand-400 to-amberBrand-500 text-tealBrand-dark font-mono font-extrabold text-xs uppercase tracking-wider shadow-lg hover:shadow-2xl hover:scale-105 transition flex items-center justify-center gap-2">
                                <span>Rencanakan Pindahan</span>
                                <i class="fas fa-arrow-right"></i>
                            </a>
                            <a href="#estimator"
                                class="px-8 py-4 rounded-2xl bg-white/10 hover:bg-white/20 border border-white/20 text-white font-mono font-bold text-xs uppercase tracking-wider transition flex items-center justify-center gap-2 backdrop-blur-md">
                                <i class="fas fa-calculator text-amberBrand-400"></i> Simulasikan Biaya
                            </a>
                        </div>

                        <!-- Live Metrics Bar -->
                        <div class="grid grid-cols-3 gap-4 pt-6 border-t border-tealBrand-600/40 font-mono text-xs">
                            <div class="bg-tealBrand-900/60 p-3 rounded-2xl border border-tealBrand-700/50">
                                <span
                                    class="text-xl sm:text-2xl font-extrabold text-amberBrand-400 block">14,200+</span>
                                <span class="text-warmSand-100/70 text-[10px]">Pindahan Sukses</span>
                            </div>
                            <div class="bg-tealBrand-900/60 p-3 rounded-2xl border border-tealBrand-700/50">
                                <span class="text-xl sm:text-2xl font-extrabold text-white block">100%</span>
                                <span class="text-warmSand-100/70 text-[10px]">Garansi Proteksi</span>
                            </div>
                            <div class="bg-tealBrand-900/60 p-3 rounded-2xl border border-tealBrand-700/50">
                                <span class="text-xl sm:text-2xl font-extrabold text-amberBrand-400 block">45
                                    Min</span>
                                <span class="text-warmSand-100/70 text-[10px]">Respon Tim Survey</span>
                            </div>
                        </div>
                    </div>

                    <!-- Right Hero Visual: ANIMATED VIRTUAL MOVING HUB -->
                    <div class="lg:col-span-6 relative">
                        <div
                            class="relative bg-warmSand-50 text-tealBrand-dark rounded-3xl p-6 shadow-2xl border-2 border-amberBrand-400/50 space-y-5 animate-float-box overflow-hidden">
                            <!-- Animated Header Bar -->
                            <div class="flex justify-between items-center border-b border-warmSand-200 pb-3">
                                <div class="flex items-center space-x-2">
                                    <span class="w-3 h-3 rounded-full bg-red-400 inline-block"></span>
                                    <span class="w-3 h-3 rounded-full bg-amber-400 inline-block"></span>
                                    <span class="w-3 h-3 rounded-full bg-emerald-400 inline-block"></span>
                                    <span class="font-mono text-xs font-bold text-tealBrand-700 ml-2">RELOKO DISPATCH
                                        SIMULATOR</span>
                                </div>
                                <span
                                    class="px-2.5 py-1 rounded-full bg-tealBrand-100 text-tealBrand-800 font-mono text-[10px] font-bold animate-pulse">LIVE
                                    CONNECTED</span>
                            </div>

                            <!-- Animated Road & Truck Canvas Scene -->
                            <div
                                class="relative bg-tealBrand-dark text-white rounded-2xl p-5 overflow-hidden h-52 flex flex-col justify-between border border-tealBrand-600">
                                <!-- Background Radar Circle Animation -->
                                <div
                                    class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-44 h-44 rounded-full border border-tealBrand-500/40 pointer-events-none">
                                    <div
                                        class="w-full h-full rounded-full border border-amberBrand-400/30 animate-radar">
                                    </div>
                                </div>

                                <!-- Animated Dispatch Header -->
                                <div class="flex justify-between items-center relative z-10 font-mono text-xs">
                                    <span class="text-amberBrand-300 font-bold flex items-center gap-2">
                                        <i class="fas fa-satellite-dish text-emerald-400 animate-spin"
                                            style="animation-duration: 6s;"></i> Rute Aktif: Jakarta ➔ Bali
                                    </span>
                                    <span
                                        class="text-[10px] bg-amberBrand-400 text-tealBrand-dark font-bold px-2 py-0.5 rounded">Truk
                                        CDE #088</span>
                                </div>

                                <!-- Truck Simulation Track -->
                                <div
                                    class="relative w-full h-16 bg-tealBrand-900/80 rounded-xl border border-tealBrand-700/60 overflow-hidden flex items-center px-4 my-2">
                                    <!-- Animated Road Line -->
                                    <div
                                        class="absolute inset-0 flex items-center justify-between px-2 opacity-30 border-t border-b border-dashed border-warmSand-100">
                                    </div>

                                    <!-- Moving Animated Truck Icon -->
                                    <div
                                        class="absolute animate-truck-drive flex items-center space-x-2 text-amberBrand-400 text-2xl drop-shadow-md">
                                        <span>🚚</span>
                                        <span
                                            class="text-[9px] bg-tealBrand-700 text-white font-mono px-1.5 py-0.5 rounded shadow">📦
                                            18 CBM</span>
                                    </div>
                                </div>

                                <!-- Animated Conveyor Belt Items at Bottom -->
                                <div
                                    class="relative z-10 font-mono text-[11px] text-warmSand-100/80 flex justify-between items-center bg-tealBrand-900/90 px-3 py-2 rounded-xl border border-tealBrand-600/40">
                                    <span class="flex items-center gap-1.5 text-amberBrand-300 font-bold">
                                        <i class="fas fa-boxes-packing animate-bounce"></i> Sorting Hub:
                                    </span>
                                    <div class="flex space-x-2 text-sm overflow-hidden w-40 justify-end">
                                        <span class="animate-conveyor">🛋️</span>
                                        <span class="animate-conveyor">📺</span>
                                        <span class="animate-conveyor">🛏️</span>
                                        <span class="animate-conveyor">📦</span>
                                    </div>
                                </div>
                            </div>

                            <!-- Photo Preview Thumbnail Strip inside Hero -->
                            <div class="grid grid-cols-3 gap-2">
                                <div class="relative rounded-xl overflow-hidden h-16 group border border-warmSand-300">
                                    <img src="https://images.unsplash.com/photo-1600585154340-be6161a56a0c?auto=format&fit=crop&w=400&q=80"
                                        alt="Rumah"
                                        class="w-full h-full object-cover group-hover:scale-110 transition duration-300">
                                    <span
                                        class="absolute bottom-1 left-1 bg-tealBrand-dark/80 text-white text-[9px] font-mono px-1.5 py-0.5 rounded">Rumah</span>
                                </div>
                                <div class="relative rounded-xl overflow-hidden h-16 group border border-warmSand-300">
                                    <img src="https://images.unsplash.com/photo-1560448204-e02f11c3d0e2?auto=format&fit=crop&w=400&q=80"
                                        alt="Apartemen"
                                        class="w-full h-full object-cover group-hover:scale-110 transition duration-300">
                                    <span
                                        class="absolute bottom-1 left-1 bg-tealBrand-dark/80 text-white text-[9px] font-mono px-1.5 py-0.5 rounded">Apartemen</span>
                                </div>
                                <div class="relative rounded-xl overflow-hidden h-16 group border border-warmSand-300">
                                    <img src="https://images.unsplash.com/photo-1497366216548-37526070297c?auto=format&fit=crop&w=400&q=80"
                                        alt="Kantor"
                                        class="w-full h-full object-cover group-hover:scale-110 transition duration-300">
                                    <span
                                        class="absolute bottom-1 left-1 bg-tealBrand-dark/80 text-white text-[9px] font-mono px-1.5 py-0.5 rounded">Kantor</span>
                                </div>
                            </div>

                            <!-- Quick Action Button -->
                            <button onclick="openModal('surveyModal')"
                                class="w-full py-3.5 rounded-2xl bg-gradient-to-r from-tealBrand-600 to-tealBrand-800 text-white font-mono text-xs font-bold uppercase tracking-wider shadow-md hover:bg-tealBrand-900 transition flex items-center justify-center gap-2">
                                <i class="fas fa-calendar-check text-amberBrand-400"></i> Booking Survey & Konsultasi
                                Gratis
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- TICKER MARQUEE -->
        <div
            class="bg-tealBrand-dark text-amberBrand-300 py-3 overflow-hidden font-mono text-xs font-bold uppercase tracking-widest border-y border-tealBrand-700">
            <div class="animate-marquee whitespace-nowrap">
                <span class="mx-6">📦 #PindahanBebasStres</span>
                <span class="mx-6">🚚 #ModernMovingTrucks</span>
                <span class="mx-6">🛡️ #GaransiBarangAman</span>
                <span class="mx-6">🛋️ #PackingBubleWrapTebal</span>
                <span class="mx-6">🏢 #RelokasiKantorProfesional</span>
                <span class="mx-6">📦 #PindahanBebasStres</span>
                <span class="mx-6">🚚 #ModernMovingTrucks</span>
            </div>
        </div>

        <!-- INTERACTIVE MOVING JOURNEY PLANNER WITH PROPERTY PHOTOS -->
        <section id="planner" class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 scroll-mt-28">
            <div class="text-center max-w-2xl mx-auto space-y-2 mb-12">
                <span class="text-tealBrand-600 font-mono text-xs font-bold uppercase tracking-widest">● Rencanakan
                    Pindahan Anda</span>
                <h2 class="font-extrabold text-3xl sm:text-4xl text-tealBrand-dark">Interactive Moving Journey Planner
                </h2>
                <p class="text-tealBrand-600/80 text-sm">Pilih jenis hunian dan foto visual tempat yang paling sesuai
                    dengan kebutuhan Anda.</p>
            </div>

            <div class="glass-sand rounded-3xl p-6 sm:p-10 border border-warmSand-300 shadow-xl max-w-5xl mx-auto">
                <form id="journeyForm" class="space-y-8 font-mono text-xs">
                    <!-- Step 1: Address -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div class="space-y-1">
                            <label class="block font-bold text-tealBrand-dark uppercase flex items-center gap-1.5"><i
                                    class="fas fa-map-marker-alt text-amberBrand-500"></i> Alamat Penjemputan
                                (Origin)</label>
                            <input type="text" required placeholder="Contoh: Jl. Sudirman No. 45, Jakarta Selatan"
                                class="w-full px-4 py-3.5 rounded-2xl bg-white border border-warmSand-300 focus:outline-none focus:border-tealBrand-600 shadow-sm">
                        </div>
                        <div class="space-y-1">
                            <label class="block font-bold text-tealBrand-dark uppercase flex items-center gap-1.5"><i
                                    class="fas fa-flag-checkered text-tealBrand-600"></i> Alamat Tujuan
                                (Destination)</label>
                            <input type="text" required placeholder="Contoh: Komplek Dago Asri B3, Bandung"
                                class="w-full px-4 py-3.5 rounded-2xl bg-white border border-warmSand-300 focus:outline-none focus:border-tealBrand-600 shadow-sm">
                        </div>
                    </div>

                    <!-- Step 2: Visual Property Size Assessment with Real Photos -->
                    <div class="space-y-3">
                        <label
                            class="block font-bold text-tealBrand-dark uppercase text-sm flex items-center justify-between">
                            <span>Pilih Ukuran & Tipe Hunian:</span>
                            <span class="text-tealBrand-600 font-normal text-xs">Pilih salah satu gambar</span>
                        </label>
                        <div class="grid grid-cols-2 sm:grid-cols-5 gap-3">
                            <!-- Studio -->
                            <button type="button" onclick="selectProperty(this, 'Studio')"
                                class="prop-btn group text-left rounded-2xl overflow-hidden bg-white border-2 border-warmSand-300 p-2 hover:border-tealBrand-600 transition">
                                <img src="https://images.unsplash.com/photo-1522708323590-d24dbb6b0267?auto=format&fit=crop&w=300&q=80"
                                    alt="Studio"
                                    class="w-full h-24 object-cover rounded-xl group-hover:scale-105 transition">
                                <div class="mt-2 text-center font-bold text-tealBrand-dark text-xs">Studio</div>
                                <div class="text-[10px] text-center text-tealBrand-600 font-mono">1-5 CBM</div>
                            </button>

                            <!-- 1BR -->
                            <button type="button" onclick="selectProperty(this, '1BR')"
                                class="prop-btn group text-left rounded-2xl overflow-hidden bg-white border-2 border-warmSand-300 p-2 hover:border-tealBrand-600 transition">
                                <img src="https://images.unsplash.com/photo-1502672260266-1c1ef2d93688?auto=format&fit=crop&w=300&q=80"
                                    alt="1BR"
                                    class="w-full h-24 object-cover rounded-xl group-hover:scale-105 transition">
                                <div class="mt-2 text-center font-bold text-tealBrand-dark text-xs">1 Bedroom</div>
                                <div class="text-[10px] text-center text-tealBrand-600 font-mono">6-10 CBM</div>
                            </button>

                            <!-- 2BR Active -->
                            <button type="button" onclick="selectProperty(this, '2BR')"
                                class="prop-btn group text-left rounded-2xl overflow-hidden bg-tealBrand-600 text-white border-2 border-tealBrand-600 p-2 transition">
                                <img src="https://images.unsplash.com/photo-1560448204-e02f11c3d0e2?auto=format&fit=crop&w=300&q=80"
                                    alt="2BR"
                                    class="w-full h-24 object-cover rounded-xl group-hover:scale-105 transition">
                                <div class="mt-2 text-center font-bold text-white text-xs">2 Bedroom</div>
                                <div class="text-[10px] text-center text-amberBrand-300 font-mono">11-18 CBM</div>
                            </button>

                            <!-- 3BR -->
                            <button type="button" onclick="selectProperty(this, '3BR')"
                                class="prop-btn group text-left rounded-2xl overflow-hidden bg-white border-2 border-warmSand-300 p-2 hover:border-tealBrand-600 transition">
                                <img src="https://images.unsplash.com/photo-1600585154340-be6161a56a0c?auto=format&fit=crop&w=300&q=80"
                                    alt="3BR"
                                    class="w-full h-24 object-cover rounded-xl group-hover:scale-105 transition">
                                <div class="mt-2 text-center font-bold text-tealBrand-dark text-xs">3 Bedroom</div>
                                <div class="text-[10px] text-center text-tealBrand-600 font-mono">19-28 CBM</div>
                            </button>

                            <!-- House -->
                            <button type="button" onclick="selectProperty(this, 'House')"
                                class="prop-btn group text-left rounded-2xl overflow-hidden bg-white border-2 border-warmSand-300 p-2 hover:border-tealBrand-600 transition">
                                <img src="https://images.unsplash.com/photo-1600596542815-ffad4c1539a9?auto=format&fit=crop&w=300&q=80"
                                    alt="House"
                                    class="w-full h-24 object-cover rounded-xl group-hover:scale-105 transition">
                                <div class="mt-2 text-center font-bold text-tealBrand-dark text-xs">Rumah & Villa</div>
                                <div class="text-[10px] text-center text-tealBrand-600 font-mono">29+ CBM</div>
                            </button>
                        </div>
                    </div>

                    <!-- Step 3: Date & Additional Options -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label
                                class="block font-bold text-tealBrand-dark uppercase mb-1.5 flex items-center gap-1.5"><i
                                    class="fas fa-calendar-alt text-amberBrand-500"></i> Tanggal Rencana
                                Pindahan</label>
                            <input type="date" required
                                class="w-full px-4 py-3 rounded-2xl bg-white border border-warmSand-300 focus:outline-none focus:border-tealBrand-600">
                        </div>
                        <div>
                            <label
                                class="block font-bold text-tealBrand-dark uppercase mb-1.5 flex items-center gap-1.5"><i
                                    class="fas fa-cubes text-tealBrand-600"></i> Pilih Paket Pengepakan</label>
                            <select
                                class="w-full px-4 py-3 rounded-2xl bg-white border border-warmSand-300 focus:outline-none focus:border-tealBrand-600">
                                <option>Full Packing & Unpacking Service (All Inclusive)</option>
                                <option>Packing Standard (Barang Besar & Perabot Utama)</option>
                                <option>Pengangkutan & Driver Saja (Self Packed)</option>
                            </select>
                        </div>
                    </div>

                    <button type="submit"
                        class="w-full py-4 rounded-2xl bg-gradient-to-r from-tealBrand-600 to-tealBrand-800 text-white font-extrabold text-sm uppercase tracking-wider shadow-lg hover:bg-tealBrand-900 transition flex items-center justify-center gap-2">
                        <i class="fas fa-paper-plane text-amberBrand-400"></i> Kirim Rencana & Dapatkan Estimasi via WA
                    </button>
                </form>
            </div>
        </section>

        <!-- INSTANT COST & VOLUME ESTIMATOR -->
        <section id="estimator" class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 scroll-mt-28">
            <div
                class="bg-gradient-to-br from-tealBrand-900 to-tealBrand-dark rounded-3xl p-8 sm:p-12 text-white border border-tealBrand-600/30">
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-center">
                    <div class="lg:col-span-6 space-y-4">
                        <span
                            class="px-3 py-1 bg-amberBrand-400 text-tealBrand-dark font-mono text-[10px] font-bold rounded-full">ESTIMATOR
                            OTOMATIS</span>
                        <h2 class="font-extrabold text-3xl sm:text-4xl">Kalkulator Estimasi Ongkos</h2>
                        <p class="text-warmSand-100/80 text-sm leading-relaxed">
                            Simulasikan estimasi volume barang dan perkiraan biaya pindahan secara cepat dan transparan.
                        </p>

                        <div class="space-y-4 font-mono text-xs pt-2">
                            <div>
                                <div class="flex justify-between mb-1">
                                    <span>Estimasi Volume Barang (CBM):</span>
                                    <span id="cbmVal" class="text-amberBrand-300 font-bold">12 m³</span>
                                </div>
                                <input type="range" id="cbmRange" min="3" max="40" value="12"
                                    oninput="updateCostEstimator()" class="w-full accent-amberBrand-400">
                            </div>

                            <div>
                                <div class="flex justify-between mb-1">
                                    <span>Jarak Lokasi (Km):</span>
                                    <span id="distVal" class="text-amberBrand-300 font-bold">25 Km</span>
                                </div>
                                <input type="range" id="distRange" min="5" max="300" value="25"
                                    oninput="updateCostEstimator()" class="w-full accent-tealBrand-500">
                            </div>
                        </div>
                    </div>

                    <div class="lg:col-span-6">
                        <div
                            class="bg-warmSand-50 text-tealBrand-dark rounded-3xl p-6 border-2 border-amberBrand-400 shadow-xl space-y-4 text-center">
                            <span
                                class="font-mono text-xs font-bold text-tealBrand-600 uppercase tracking-widest block">Perkiraan
                                Biaya Pindahan</span>
                            <div id="costDisplay" class="text-4xl sm:text-5xl font-extrabold text-tealBrand-dark">Rp
                                2.450.000</div>
                            <p class="text-xs text-tealBrand-600">Sudah termasuk armada truk, kru bongkar muat, dan
                                garansi standar.</p>
                            <button onclick="openModal('surveyModal')"
                                class="w-full py-3.5 rounded-2xl bg-tealBrand-600 text-white font-mono text-xs font-bold uppercase tracking-wider hover:bg-tealBrand-800 transition">
                                Lock Harga & Booking Survey
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- RELOCATION SERVICES CATALOG WITH PICTURE CARDS -->
        <section id="services" class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 scroll-mt-28">
            <div class="text-center max-w-2xl mx-auto space-y-2 mb-12">
                <span class="text-tealBrand-600 font-mono text-xs font-bold uppercase tracking-widest">● Solusi Lengkap
                    Spesialis</span>
                <h2 class="font-extrabold text-3xl sm:text-4xl text-tealBrand-dark">Layanan Relokasi Terpercaya</h2>
                <p class="text-tealBrand-600/80 text-sm">Didukung armada kendaraan khusus dan kru berpengalaman di
                    bidangnya.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <!-- Service 1: Pindahan Rumah -->
                <div
                    class="bg-white rounded-3xl border border-warmSand-300 shadow-md overflow-hidden hover:border-tealBrand-600 transition group flex flex-col justify-between">
                    <div>
                        <div class="h-44 overflow-hidden relative">
                            <img src="https://images.unsplash.com/photo-1600585154340-be6161a56a0c?auto=format&fit=crop&w=600&q=80"
                                alt="Pindahan Rumah"
                                class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
                            <span
                                class="absolute top-3 left-3 bg-amberBrand-400 text-tealBrand-dark font-mono text-[10px] font-bold px-2.5 py-1 rounded-full shadow">BEST
                                SELLER</span>
                        </div>
                        <div class="p-5 space-y-2">
                            <h3 class="font-bold text-lg text-tealBrand-dark">Pindahan Rumah</h3>
                            <p class="text-tealBrand-600/80 text-xs leading-relaxed">Relokasi rumah tinggal lengkap
                                dengan pembongkaran & perakitan kembali furnitur utama.</p>
                        </div>
                    </div>
                    <div class="p-5 pt-0">
                        <a href="#planner"
                            class="text-xs font-mono font-bold text-tealBrand-600 hover:text-amberBrand-600 flex items-center gap-1">Rencanakan
                            Sekarang <i class="fas fa-chevron-right text-[10px]"></i></a>
                    </div>
                </div>

                <!-- Service 2: Pindahan Kantor -->
                <div
                    class="bg-white rounded-3xl border border-warmSand-300 shadow-md overflow-hidden hover:border-tealBrand-600 transition group flex flex-col justify-between">
                    <div>
                        <div class="h-44 overflow-hidden relative">
                            <img src="https://images.unsplash.com/photo-1497366216548-37526070297c?auto=format&fit=crop&w=600&q=80"
                                alt="Pindahan Kantor"
                                class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
                            <span
                                class="absolute top-3 left-3 bg-tealBrand-700 text-white font-mono text-[10px] font-bold px-2.5 py-1 rounded-full shadow">KOMERSIAL</span>
                        </div>
                        <div class="p-5 space-y-2">
                            <h3 class="font-bold text-lg text-tealBrand-dark">Pindahan Kantor</h3>
                            <p class="text-tealBrand-600/80 text-xs leading-relaxed">Pindahan gedung & area kerja
                                profesional untuk meja kerja, server, serta arsip penting.</p>
                        </div>
                    </div>
                    <div class="p-5 pt-0">
                        <a href="#planner"
                            class="text-xs font-mono font-bold text-tealBrand-600 hover:text-amberBrand-600 flex items-center gap-1">Konsultasi
                            Bisnis <i class="fas fa-chevron-right text-[10px]"></i></a>
                    </div>
                </div>

                <!-- Service 3: Packing Fragile & Piano -->
                <div
                    class="bg-white rounded-3xl border border-warmSand-300 shadow-md overflow-hidden hover:border-tealBrand-600 transition group flex flex-col justify-between">
                    <div>
                        <div class="h-44 overflow-hidden relative">
                            <img src="https://images.unsplash.com/photo-1578575437130-527eed3abbec?auto=format&fit=crop&w=600&q=80"
                                alt="Packing Fragile"
                                class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
                            <span
                                class="absolute top-3 left-3 bg-emerald-500 text-white font-mono text-[10px] font-bold px-2.5 py-1 rounded-full shadow">EXTRA
                                SAFE</span>
                        </div>
                        <div class="p-5 space-y-2">
                            <h3 class="font-bold text-lg text-tealBrand-dark">Packing Fragile</h3>
                            <p class="text-tealBrand-600/80 text-xs leading-relaxed">Pengepakan barang pecah belah,
                                karya seni, lukisan, cermin, dan piano dengan kayu & bubblewrap 4 lapis.</p>
                        </div>
                    </div>
                    <div class="p-5 pt-0">
                        <a href="#planner"
                            class="text-xs font-mono font-bold text-tealBrand-600 hover:text-amberBrand-600 flex items-center gap-1">Cek
                            Detail Packing <i class="fas fa-chevron-right text-[10px]"></i></a>
                    </div>
                </div>

                <!-- Service 4: Sewa Gudang Sementara -->
                <div
                    class="bg-white rounded-3xl border border-warmSand-300 shadow-md overflow-hidden hover:border-tealBrand-600 transition group flex flex-col justify-between">
                    <div>
                        <div class="h-44 overflow-hidden relative">
                            <img src="https://images.unsplash.com/photo-1586528116311-ad8dd3c8310d?auto=format&fit=crop&w=600&q=80"
                                alt="Sewa Gudang"
                                class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
                            <span
                                class="absolute top-3 left-3 bg-amberBrand-500 text-white font-mono text-[10px] font-bold px-2.5 py-1 rounded-full shadow">STORAGE</span>
                        </div>
                        <div class="p-5 space-y-2">
                            <h3 class="font-bold text-lg text-tealBrand-dark">Gudang Transit</h3>
                            <p class="text-tealBrand-600/80 text-xs leading-relaxed">Fasilitas tempat penyimpanan
                                barang temporary ber-AC dengan pengawasan CCTV 24 jam.</p>
                        </div>
                    </div>
                    <div class="p-5 pt-0">
                        <a href="#planner"
                            class="text-xs font-mono font-bold text-tealBrand-600 hover:text-amberBrand-600 flex items-center gap-1">Cek
                            Tarif Gudang <i class="fas fa-chevron-right text-[10px]"></i></a>
                    </div>
                </div>
            </div>
        </section>

        <!-- ROOM BY ROOM MOVING INVENTORY & PACKING CHECKLIST WITH PHOTOS -->
        <section id="checklist" class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 scroll-mt-28">
            <div class="glass-sand rounded-3xl p-8 border border-warmSand-300 shadow-lg space-y-6">
                <div
                    class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4 border-b border-warmSand-300 pb-4">
                    <div>
                        <span class="text-tealBrand-600 font-mono text-xs font-bold uppercase tracking-widest">● Tool
                            Interaktif & Inventaris Ruangan</span>
                        <h2 class="font-extrabold text-2xl sm:text-3xl text-tealBrand-dark">Room-by-Room Packing
                            Checklist</h2>
                    </div>
                    <span
                        class="text-xs font-mono text-tealBrand-700 bg-white px-4 py-2 rounded-full border border-warmSand-300 shadow-sm flex items-center gap-2">
                        <i class="fas fa-check-double text-emerald-500"></i> Centang perabot yang ingin dipindahkan
                    </span>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 font-mono text-xs">
                    <!-- Ruang Tamu -->
                    <div
                        class="bg-white rounded-3xl border border-warmSand-300 overflow-hidden shadow-sm space-y-4 pb-4">
                        <div class="h-36 overflow-hidden relative">
                            <img src="https://images.unsplash.com/photo-1555041469-a586c61ea9bc?auto=format&fit=crop&w=500&q=80"
                                alt="Ruang Tamu" class="w-full h-full object-cover">
                            <span
                                class="absolute bottom-2 left-2 bg-tealBrand-dark/90 text-amberBrand-300 font-bold px-2.5 py-1 rounded-lg">🛋️
                                Ruang Tamu</span>
                        </div>
                        <div class="px-4 space-y-2.5">
                            <label class="flex items-center space-x-2.5 cursor-pointer hover:text-tealBrand-600"><input
                                    type="checkbox" class="w-4 h-4 accent-tealBrand-600 rounded"> <span>Sofa L-Shape &
                                    Coffee Table</span></label>
                            <label class="flex items-center space-x-2.5 cursor-pointer hover:text-tealBrand-600"><input
                                    type="checkbox" class="w-4 h-4 accent-tealBrand-600 rounded"> <span>TV 55" &
                                    Credenza TV</span></label>
                            <label class="flex items-center space-x-2.5 cursor-pointer hover:text-tealBrand-600"><input
                                    type="checkbox" class="w-4 h-4 accent-tealBrand-600 rounded"> <span>Karpet &
                                    Hiasan Dinding</span></label>
                            <label class="flex items-center space-x-2.5 cursor-pointer hover:text-tealBrand-600"><input
                                    type="checkbox" class="w-4 h-4 accent-tealBrand-600 rounded"> <span>Lampu Hias &
                                    Pot Tanaman</span></label>
                        </div>
                    </div>

                    <!-- Kamar Tidur -->
                    <div
                        class="bg-white rounded-3xl border border-warmSand-300 overflow-hidden shadow-sm space-y-4 pb-4">
                        <div class="h-36 overflow-hidden relative">
                            <img src="https://images.unsplash.com/photo-1540518614846-7eded433c457?auto=format&fit=crop&w=500&q=80"
                                alt="Kamar Tidur" class="w-full h-full object-cover">
                            <span
                                class="absolute bottom-2 left-2 bg-tealBrand-dark/90 text-amberBrand-300 font-bold px-2.5 py-1 rounded-lg">🛏️
                                Kamar Tidur</span>
                        </div>
                        <div class="px-4 space-y-2.5">
                            <label class="flex items-center space-x-2.5 cursor-pointer hover:text-tealBrand-600"><input
                                    type="checkbox" class="w-4 h-4 accent-tealBrand-600 rounded"> <span>Kasur King
                                    Size & Springbed</span></label>
                            <label class="flex items-center space-x-2.5 cursor-pointer hover:text-tealBrand-600"><input
                                    type="checkbox" class="w-4 h-4 accent-tealBrand-600 rounded"> <span>Lemari Pakaian
                                    3 Pintu</span></label>
                            <label class="flex items-center space-x-2.5 cursor-pointer hover:text-tealBrand-600"><input
                                    type="checkbox" class="w-4 h-4 accent-tealBrand-600 rounded"> <span>Meja Rias &
                                    Cermin Gantung</span></label>
                            <label class="flex items-center space-x-2.5 cursor-pointer hover:text-tealBrand-600"><input
                                    type="checkbox" class="w-4 h-4 accent-tealBrand-600 rounded"> <span>AC Split
                                    (Pembongkaran)</span></label>
                        </div>
                    </div>

                    <!-- Dapur -->
                    <div
                        class="bg-white rounded-3xl border border-warmSand-300 overflow-hidden shadow-sm space-y-4 pb-4">
                        <div class="h-36 overflow-hidden relative">
                            <img src="https://images.unsplash.com/photo-1556911220-e15b29be8c8f?auto=format&fit=crop&w=500&q=80"
                                alt="Dapur" class="w-full h-full object-cover">
                            <span
                                class="absolute bottom-2 left-2 bg-tealBrand-dark/90 text-amberBrand-300 font-bold px-2.5 py-1 rounded-lg">🍽️
                                Dapur & Perabotan</span>
                        </div>
                        <div class="px-4 space-y-2.5">
                            <label class="flex items-center space-x-2.5 cursor-pointer hover:text-tealBrand-600"><input
                                    type="checkbox" class="w-4 h-4 accent-tealBrand-600 rounded"> <span>Kulkas 2 Pintu
                                    & Microwave</span></label>
                            <label class="flex items-center space-x-2.5 cursor-pointer hover:text-tealBrand-600"><input
                                    type="checkbox" class="w-4 h-4 accent-tealBrand-600 rounded"> <span>Piring & Gelas
                                    (Wooden Crate)</span></label>
                            <label class="flex items-center space-x-2.5 cursor-pointer hover:text-tealBrand-600"><input
                                    type="checkbox" class="w-4 h-4 accent-tealBrand-600 rounded"> <span>Mesin Cuci
                                    Front Load</span></label>
                            <label class="flex items-center space-x-2.5 cursor-pointer hover:text-tealBrand-600"><input
                                    type="checkbox" class="w-4 h-4 accent-tealBrand-600 rounded"> <span>Dispenser &
                                    Perabot Koki</span></label>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- FLEET & PROFESSIONAL CREW SHOWCASE WITH GALLERY -->
        <section id="fleet" class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 scroll-mt-28">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-center">
                <div class="lg:col-span-5 space-y-4">
                    <span class="text-tealBrand-600 font-mono text-xs font-bold uppercase tracking-widest">● Kualitas
                        Terbaik & Kru Tersertifikasi</span>
                    <h2 class="font-extrabold text-3xl sm:text-4xl text-tealBrand-dark">Armada Truk & Tim Profesional
                    </h2>
                    <p class="text-tealBrand-600/80 text-sm leading-relaxed">
                        Setiap pengerjaan dilakukan oleh kru berseragam resmi yang dilengkapi sarung tangan khusus,
                        sepatu keselamatan, alat pengangkat beban ergonomis, serta armada truk box tertutup.
                    </p>

                    <div class="space-y-3 font-mono text-xs pt-2">
                        <div class="flex items-center space-x-3 bg-white p-3 rounded-2xl border border-warmSand-300">
                            <span
                                class="w-8 h-8 rounded-full bg-tealBrand-100 text-tealBrand-700 flex items-center justify-center font-bold">✓</span>
                            <span>Truk Box CDE, CDD, hingga Fuso Wingbox</span>
                        </div>
                        <div class="flex items-center space-x-3 bg-white p-3 rounded-2xl border border-warmSand-300">
                            <span
                                class="w-8 h-8 rounded-full bg-amberBrand-300 text-tealBrand-dark flex items-center justify-center font-bold">✓</span>
                            <span>Kru Berseragam & Pengalaman Minimum 5 Tahun</span>
                        </div>
                    </div>
                </div>

                <div class="lg:col-span-7 grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div class="relative rounded-3xl overflow-hidden h-56 group shadow-md border border-warmSand-300">
                        <img src="https://images.unsplash.com/photo-1519003722824-194d4455a60c?auto=format&fit=crop&w=600&q=80"
                            alt="Truk Moving"
                            class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                        <div
                            class="absolute inset-0 bg-gradient-to-t from-tealBrand-dark/80 via-transparent to-transparent p-4 flex flex-col justify-end text-white">
                            <h4 class="font-bold text-sm font-mono">🚚 Armada Truk Box Tertutup</h4>
                            <p class="text-[10px] text-warmSand-100/80">Bebas dari cuaca hujan & debu jalanan</p>
                        </div>
                    </div>

                    <div class="relative rounded-3xl overflow-hidden h-56 group shadow-md border border-warmSand-300">
                        <img src="https://images.unsplash.com/photo-1616401784845-180882ba9ba8?auto=format&fit=crop&w=600&q=80"
                            alt="Tim Kru Packing"
                            class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                        <div
                            class="absolute inset-0 bg-gradient-to-t from-tealBrand-dark/80 via-transparent to-transparent p-4 flex flex-col justify-end text-white">
                            <h4 class="font-bold text-sm font-mono">👷‍♂️ Kru Pengepakan Ahli</h4>
                            <p class="text-[10px] text-warmSand-100/80">Teliti membalas perabot & sudut kayu</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <section id="timeline" class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 scroll-mt-28">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                <div class="glass-sand rounded-3xl p-7 sm:p-9 border border-warmSand-300 shadow-lg">
                    <span class="text-tealBrand-600 font-mono text-xs font-bold uppercase tracking-widest">● Alur
                        Relokasi</span>
                    <h2 class="font-extrabold text-2xl sm:text-3xl text-tealBrand-dark mt-2 mb-6">Moving Progress
                        Timeline</h2>
                    <div class="space-y-5">
                        <div class="flex gap-4"><span
                                class="w-9 h-9 shrink-0 rounded-full bg-tealBrand-600 text-white flex items-center justify-center font-bold">01</span>
                            <div>
                                <h3 class="font-bold text-sm">Konsultasi & Survey</h3>
                                <p class="text-xs text-tealBrand-600/80 mt-1">Diskusikan kebutuhan, alamat, volume
                                    barang, dan jadwal pindahan.</p>
                            </div>
                        </div>
                        <div class="flex gap-4"><span
                                class="w-9 h-9 shrink-0 rounded-full bg-tealBrand-600 text-white flex items-center justify-center font-bold">02</span>
                            <div>
                                <h3 class="font-bold text-sm">Quotation & Konfirmasi</h3>
                                <p class="text-xs text-tealBrand-600/80 mt-1">Terima rincian estimasi dan pilih paket
                                    layanan yang sesuai.</p>
                            </div>
                        </div>
                        <div class="flex gap-4"><span
                                class="w-9 h-9 shrink-0 rounded-full bg-amberBrand-400 text-tealBrand-dark flex items-center justify-center font-bold">03</span>
                            <div>
                                <h3 class="font-bold text-sm">Packing & Loading</h3>
                                <p class="text-xs text-tealBrand-600/80 mt-1">Tim melakukan pelabelan, perlindungan,
                                    dan pemuatan barang.</p>
                            </div>
                        </div>
                        <div class="flex gap-4"><span
                                class="w-9 h-9 shrink-0 rounded-full bg-tealBrand-600 text-white flex items-center justify-center font-bold">04</span>
                            <div>
                                <h3 class="font-bold text-sm">Delivery & Unloading</h3>
                                <p class="text-xs text-tealBrand-600/80 mt-1">Barang dikirim ke alamat tujuan dan
                                    diturunkan sesuai instruksi.</p>
                            </div>
                        </div>
                        <div class="flex gap-4"><span
                                class="w-9 h-9 shrink-0 rounded-full bg-tealBrand-dark text-amberBrand-300 flex items-center justify-center font-bold">05</span>
                            <div>
                                <h3 class="font-bold text-sm">Setup & Final Check</h3>
                                <p class="text-xs text-tealBrand-600/80 mt-1">Penataan, perakitan furnitur, dan
                                    pengecekan inventaris akhir.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-tealBrand-dark text-white rounded-3xl p-7 sm:p-9 border border-tealBrand-600 shadow-xl">
                    <span class="text-amberBrand-300 font-mono text-xs font-bold uppercase tracking-widest">● Jadwal
                        Pindahan</span>
                    <h2 class="font-extrabold text-2xl sm:text-3xl mt-2 mb-3">Cek Rencana Tanggal Anda</h2>
                    <p class="text-sm text-warmSand-100/75 mb-6">Pilih tanggal pindahan untuk dimasukkan ke permintaan
                        konsultasi. Ketersediaan final akan dikonfirmasi oleh tim Reloko.</p>
                    <label for="availabilityDate" class="block text-xs font-bold mb-2">Tanggal pindahan yang
                        diinginkan</label>
                    <input id="availabilityDate" type="date"
                        class="w-full px-4 py-3 rounded-xl bg-warmSand-50 text-tealBrand-dark border border-warmSand-300">
                    <p id="availabilityMessage" class="text-xs text-amberBrand-300 mt-3">Pilih tanggal untuk
                        menyiapkan permintaan jadwal.</p>
                    <button type="button" onclick="openModal('surveyModal')"
                        class="mt-5 w-full py-3 rounded-xl bg-amberBrand-400 text-tealBrand-dark font-bold text-xs uppercase tracking-wider hover:bg-amberBrand-300 transition">Booking
                        Konsultasi & Survey</button>
                </div>
            </div>
        </section>

        <section id="packing" class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 scroll-mt-28">
            <div class="text-center max-w-2xl mx-auto mb-10">
                <span class="text-tealBrand-600 font-mono text-xs font-bold uppercase tracking-widest">● Detail
                    Penanganan Barang</span>
                <h2 class="font-extrabold text-3xl sm:text-4xl text-tealBrand-dark mt-2">Packing, Protection &
                    Furniture Care</h2>
                <p class="text-tealBrand-600/80 text-sm mt-2">Perlindungan disesuaikan dengan jenis, ukuran, dan
                    tingkat kerentanan barang.</p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
                <article class="bg-white rounded-3xl p-6 border border-warmSand-300 shadow-sm">
                    <div class="text-3xl mb-3">📦</div>
                    <h3 class="font-bold text-lg">Professional Packing</h3>
                    <p class="text-xs text-tealBrand-600/80 mt-2 leading-relaxed">Kardus berlapis, bubble wrap, stretch
                        film, pelabelan, serta layanan unpacking di lokasi tujuan.</p>
                </article>
                <article class="bg-white rounded-3xl p-6 border border-warmSand-300 shadow-sm">
                    <div class="text-3xl mb-3">🛡️</div>
                    <h3 class="font-bold text-lg">Fragile Item Handling</h3>
                    <p class="text-xs text-tealBrand-600/80 mt-2 leading-relaxed">Penanganan khusus untuk kaca,
                        perangkat elektronik, karya seni, instrumen musik, dan barang bernilai tinggi.</p>
                </article>
                <article class="bg-white rounded-3xl p-6 border border-warmSand-300 shadow-sm">
                    <div class="text-3xl mb-3">🛠️</div>
                    <h3 class="font-bold text-lg">Furniture Care</h3>
                    <p class="text-xs text-tealBrand-600/80 mt-2 leading-relaxed">Bantuan pembongkaran dan perakitan
                        kembali tempat tidur, lemari, meja, rak, serta furnitur besar.</p>
                </article>
            </div>
            <div class="mt-6 bg-warmSand-100 rounded-3xl p-6 border border-warmSand-300">
                <h3 class="font-bold text-tealBrand-dark mb-4">Furniture & Large Item Catalog</h3>
                <div class="grid grid-cols-2 sm:grid-cols-4 gap-3 text-xs font-mono">
                    <div class="bg-white rounded-xl p-4">🛋️ Sofa & Sectional</div>
                    <div class="bg-white rounded-xl p-4">🛏️ Bed & Mattress</div>
                    <div class="bg-white rounded-xl p-4">🧊 Refrigerator</div>
                    <div class="bg-white rounded-xl p-4">📺 TV & Electronics</div>
                    <div class="bg-white rounded-xl p-4">🎹 Piano & Instruments</div>
                    <div class="bg-white rounded-xl p-4">🗄️ Wardrobe & Cabinet</div>
                    <div class="bg-white rounded-xl p-4">🖼️ Artwork & Mirror</div>
                    <div class="bg-white rounded-xl p-4">🏢 Office Equipment</div>
                </div>
            </div>
        </section>

        <section id="packing-checklist" class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 scroll-mt-28">
            <div class="glass-sand rounded-3xl p-7 sm:p-9 border border-warmSand-300 shadow-lg">
                <div class="flex flex-col sm:flex-row justify-between gap-3 mb-6">
                    <div><span class="text-tealBrand-600 font-mono text-xs font-bold uppercase tracking-widest">●
                            Moving Toolkit</span>
                        <h2 class="font-extrabold text-2xl sm:text-3xl mt-2">Packing Checklist Generator</h2>
                    </div><button type="button" id="printChecklist"
                        class="self-start px-4 py-2 rounded-xl bg-tealBrand-600 text-white text-xs font-bold">Print
                        Checklist</button>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-3 text-xs">
                    <label class="bg-white p-4 rounded-xl border border-warmSand-300"><input type="checkbox"
                            class="checklist-item accent-tealBrand-600 mr-2"> Pisahkan dokumen penting</label>
                    <label class="bg-white p-4 rounded-xl border border-warmSand-300"><input type="checkbox"
                            class="checklist-item accent-tealBrand-600 mr-2"> Label setiap kardus</label>
                    <label class="bg-white p-4 rounded-xl border border-warmSand-300"><input type="checkbox"
                            class="checklist-item accent-tealBrand-600 mr-2"> Foto kondisi barang</label>
                    <label class="bg-white p-4 rounded-xl border border-warmSand-300"><input type="checkbox"
                            class="checklist-item accent-tealBrand-600 mr-2"> Siapkan barang esensial</label>
                    <label class="bg-white p-4 rounded-xl border border-warmSand-300"><input type="checkbox"
                            class="checklist-item accent-tealBrand-600 mr-2"> Kosongkan kulkas</label>
                    <label class="bg-white p-4 rounded-xl border border-warmSand-300"><input type="checkbox"
                            class="checklist-item accent-tealBrand-600 mr-2"> Amankan barang fragile</label>
                    <label class="bg-white p-4 rounded-xl border border-warmSand-300"><input type="checkbox"
                            class="checklist-item accent-tealBrand-600 mr-2"> Konfirmasi akses lokasi</label>
                    <label class="bg-white p-4 rounded-xl border border-warmSand-300"><input type="checkbox"
                            class="checklist-item accent-tealBrand-600 mr-2"> Cek ulang inventaris</label>
                </div>
                <p id="checklistProgress" class="text-xs text-tealBrand-600 font-mono mt-4">0 dari 8 checklist selesai
                </p>
            </div>
        </section>

        <section id="gallery" class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 scroll-mt-28">
            <div class="text-center mb-9"><span
                    class="text-tealBrand-600 font-mono text-xs font-bold uppercase tracking-widest">● Cerita
                    Perjalanan</span>
                <h2 class="font-extrabold text-3xl sm:text-4xl mt-2">Moving Moments & Customer Stories</h2>
            </div>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-3">
                <img class="rounded-2xl h-44 sm:h-56 w-full object-cover"
                    src="https://images.unsplash.com/photo-1600585154340-be6161a56a0c?auto=format&fit=crop&w=500&q=80"
                    alt="Rumah sebelum pindahan">
                <img class="rounded-2xl h-44 sm:h-56 w-full object-cover"
                    src="https://images.unsplash.com/photo-1555041469-a586c61ea9bc?auto=format&fit=crop&w=500&q=80"
                    alt="Penataan ruang keluarga">
                <img class="rounded-2xl h-44 sm:h-56 w-full object-cover"
                    src="https://images.unsplash.com/photo-1519003722824-194d4455a60c?auto=format&fit=crop&w=500&q=80"
                    alt="Armada truk pindahan">
                <img class="rounded-2xl h-44 sm:h-56 w-full object-cover"
                    src="https://images.unsplash.com/photo-1497366216548-37526070297c?auto=format&fit=crop&w=500&q=80"
                    alt="Relokasi kantor">
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mt-6">
                <blockquote class="bg-white rounded-2xl p-6 border border-warmSand-300 shadow-sm">
                    <div class="text-amberBrand-500 mb-2">★★★★★</div>
                    <p class="text-sm text-tealBrand-dark">“Timnya rapi dan komunikatif. Proses pindahan rumah jadi
                        jauh lebih teratur.”</p>
                    <footer class="text-xs text-tealBrand-600 mt-4 font-bold">— Nadia, Jakarta</footer>
                </blockquote>
                <blockquote class="bg-white rounded-2xl p-6 border border-warmSand-300 shadow-sm">
                    <div class="text-amberBrand-500 mb-2">★★★★★</div>
                    <p class="text-sm text-tealBrand-dark">“Packing barang elektronik dan furnitur dilakukan dengan
                        sangat hati-hati.”</p>
                    <footer class="text-xs text-tealBrand-600 mt-4 font-bold">— Raka, Bandung</footer>
                </blockquote>
                <blockquote class="bg-white rounded-2xl p-6 border border-warmSand-300 shadow-sm">
                    <div class="text-amberBrand-500 mb-2">★★★★★</div>
                    <p class="text-sm text-tealBrand-dark">“Estimasi awal membantu kami menyiapkan relokasi kantor
                        dengan lebih baik.”</p>
                    <footer class="text-xs text-tealBrand-600 mt-4 font-bold">— Maya, Surabaya</footer>
                </blockquote>
            </div>
        </section>

        <!-- FAQ SECTION -->
        <section id="faq" class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 scroll-mt-28">
            <div class="text-center space-y-2 mb-10">
                <span class="text-tealBrand-600 font-mono text-xs font-bold uppercase tracking-widest">● Jawaban
                    Cepat</span>
                <h2 class="font-extrabold text-3xl text-tealBrand-dark">Pertanyaan Sering Diajukan</h2>
            </div>

            <div class="space-y-4 font-sans">
                <div class="bg-white rounded-2xl border border-warmSand-300 overflow-hidden shadow-sm">
                    <button onclick="toggleFaq(this)"
                        class="w-full px-6 py-4 text-left font-bold text-tealBrand-dark flex justify-between items-center">
                        <span>Apakah bahan packing (kardus & bubblewrap) sudah disediakan?</span>
                        <i class="fas fa-chevron-down text-tealBrand-600 transition-transform"></i>
                    </button>
                    <div
                        class="px-6 pb-4 text-tealBrand-600/80 text-xs hidden leading-relaxed border-t border-warmSand-100 pt-3">
                        Ya! Paket Full Packing kami sudah mencakup semua material pengepakan seperti kardus tebal,
                        bubblewrap 3 lapis, plastik wrap, dan lakban khusus.
                    </div>
                </div>

                <div class="bg-white rounded-2xl border border-warmSand-300 overflow-hidden shadow-sm">
                    <button onclick="toggleFaq(this)"
                        class="w-full px-6 py-4 text-left font-bold text-tealBrand-dark flex justify-between items-center">
                        <span>Bagaimana garansi ganti rugi jika ada barang yang rusak?</span>
                        <i class="fas fa-chevron-down text-tealBrand-600 transition-transform"></i>
                    </button>
                    <div
                        class="px-6 pb-4 text-tealBrand-600/80 text-xs hidden leading-relaxed border-t border-warmSand-100 pt-3">
                        Semua pengerjaan Reloko dilindungi asuransi standar. Jika terjadi kerusakan akibat kelalaian tim
                        kami, klaim ganti rugi akan diproses maksimal 3 hari kerja.
                    </div>
                </div>
            </div>
        </section>

    </main>

    <!-- FOOTER -->
    <footer class="bg-tealBrand-dark text-warmSand-100 border-t-4 border-amberBrand-400 mt-20 font-mono text-xs">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8 mb-8">
                <div class="space-y-3">
                    <div class="flex items-center space-x-2">
                        <span class="text-2xl">📦</span>
                        <span class="font-extrabold text-xl text-white">RELOKO</span>
                    </div>
                    <p class="text-warmSand-100/70 text-[11px] leading-relaxed">
                        Layanan relokasi pindahan modern terlengkap dengan jaminan keamanan dan kenyamanan terbaik.
                    </p>
                </div>

                <div>
                    <h4 class="font-bold text-white uppercase tracking-wider mb-3">Layanan</h4>
                    <ul class="space-y-2 text-warmSand-100/70">
                        <li><a href="#services" class="hover:text-amberBrand-400">Pindahan Rumah</a></li>
                        <li><a href="#services" class="hover:text-amberBrand-400">Pindahan Kantor</a></li>
                        <li><a href="#services" class="hover:text-amberBrand-400">Packing Fragile</a></li>
                    </ul>
                </div>

                <div>
                    <h4 class="font-bold text-white uppercase tracking-wider mb-3">Kontak & Hub</h4>
                    <ul class="space-y-2 text-warmSand-100/70">
                        <li><a href="tel:0800123456" class="hover:text-amberBrand-400">0800-123-MOVE</a></li>
                        <li><a href="mailto:hello@reloko.id" class="hover:text-amberBrand-400">hello@reloko.id</a>
                        </li>
                    </ul>
                </div>

                <div>
                    <h4 class="font-bold text-white uppercase tracking-wider mb-3">Ikuti Kami</h4>
                    <div class="flex space-x-3 text-lg text-amberBrand-400">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-facebook"></i></a>
                        <a href="#"><i class="fab fa-linkedin"></i></a>
                    </div>
                </div>
            </div>

            <div class="pt-6 border-t border-tealBrand-700 text-center text-warmSand-100/50 text-[10px]">
                © 2026 RELOKO Moving & Relocation Services. Modern Design Style. All rights reserved.
                <br>Made with care ♡ · Website template by WEBIA</br>            </div>
        </div>
    </footer>

    <!-- FLOATING BUTTONS FIXED BOTTOM-RIGHT -->
    <div class="fixed bottom-6 right-6 z-50 flex items-center space-x-3">
        <!-- WhatsApp Button -->
        <a href="https://wa.me/628123456789" target="_blank"
            class="w-14 h-14 rounded-full bg-emerald-500 text-white flex items-center justify-center text-2xl shadow-2xl hover:scale-110 transition">
            <i class="fab fa-whatsapp"></i>
        </a>

        <!-- Floating AI Chatbot Button (Unique Animated Moving-Box Effect) -->
        <button onclick="toggleRelokoAi()" class="relative group">
            <div
                class="w-16 h-16 rounded-2xl bg-gradient-to-tr from-tealBrand-800 via-tealBrand-600 to-amberBrand-500 text-white flex items-center justify-center text-2xl shadow-2xl animate-box-slide animate-orbit-glow border-2 border-amberBrand-300">
                📦
            </div>
            <span
                class="absolute -top-1 -right-1 w-4 h-4 bg-amberBrand-400 border-2 border-tealBrand-dark rounded-full"></span>
        </button>
    </div>

    <!-- FLOATING AI CHATBOX MODAL -->
    <div id="relokoAiBox" aria-hidden="true"
        class="fixed bottom-24 right-6 z-50 w-80 sm:w-96 bg-warmSand-50 rounded-3xl shadow-2xl border-2 border-tealBrand-600 overflow-hidden hidden">
        <div class="bg-tealBrand-dark text-white p-4 flex justify-between items-center border-b border-tealBrand-600">
            <div class="flex items-center space-x-3">
                <div
                    class="w-10 h-10 rounded-xl bg-amberBrand-400 text-tealBrand-dark flex items-center justify-center text-xl animate-bounce">
                    📦
                </div>
                <div>
                    <h4 class="font-bold text-sm">Reloko AI Assistant</h4>
                    <span class="text-[10px] font-mono text-amberBrand-300 block">● Pakar Pindahan 24/7</span>
                </div>
            </div>
            <button onclick="toggleRelokoAi()" class="text-warmSand-100/70 hover:text-white"><i
                    class="fas fa-times"></i></button>
        </div>

        <div id="relokoMessages" class="p-4 h-64 overflow-y-auto space-y-3 font-mono text-xs bg-warmSand-100">
            <div
                class="bg-white p-3 rounded-2xl rounded-tl-none border border-warmSand-300 text-tealBrand-dark shadow-sm">
                Halo! Saya Reloko AI 📦. Ingin estimasi ongkos pindahan atau booking jadwal survey gratis?
            </div>
        </div>

        <form onsubmit="handleRelokoMessage(event)" class="p-3 bg-white border-t border-warmSand-300 flex gap-2">
            <input type="text" id="relokoInput" required placeholder="Tanyakan seputar pindahan..."
                class="flex-1 px-3 py-2 rounded-xl border border-warmSand-300 font-mono text-xs focus:outline-none focus:border-tealBrand-600">
            <button type="submit"
                class="px-4 py-2 bg-tealBrand-600 text-white rounded-xl font-mono text-xs font-bold hover:bg-tealBrand-800 transition">Kirim</button>
        </form>
    </div>

    <!-- BOOKING SURVEY MODAL -->
    <div id="surveyModal" aria-hidden="true"
        class="fixed inset-0 z-50 bg-black/60 backdrop-blur-sm flex items-center justify-center p-4 hidden">
        <div class="bg-warmSand-50 rounded-3xl max-w-md w-full p-6 border-2 border-tealBrand-600 shadow-2xl space-y-4">
            <div class="flex justify-between items-center">
                <h3 class="font-bold text-xl text-tealBrand-dark">Booking Survey Gratis</h3>
                <button onclick="closeModal('surveyModal')"
                    class="text-tealBrand-600 hover:text-tealBrand-dark text-lg"><i class="fas fa-times"></i></button>
            </div>
            <p class="text-xs text-tealBrand-600">Tim surveyor kami akan berkunjung untuk menghitung volume barang
                secara akurat.</p>
            <form id="surveyBookingForm" class="space-y-3 font-mono text-xs">
                <input type="text" required placeholder="Nama Lengkap"
                    class="w-full px-4 py-3 rounded-xl bg-white border border-warmSand-300">
                <input type="tel" required placeholder="Nomor WhatsApp"
                    class="w-full px-4 py-3 rounded-xl bg-white border border-warmSand-300">
                <input type="date" required
                    class="w-full px-4 py-3 rounded-xl bg-white border border-warmSand-300">
                <button type="submit"
                    class="w-full py-3.5 bg-tealBrand-600 text-white font-bold uppercase rounded-xl hover:bg-tealBrand-800 transition">Konfirmasi
                    Booking Survey</button>
            </form>
        </div>
    </div>

    <!-- JAVASCRIPT LOGIC -->

    <script src="{{ asset('js/website-bisnis/templates/transportation-logistics/moving-company/reloko/reloko.js') }}" defer>
    </script>
</body>

</html>
