<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CocoExpress - Kirim Paket Semanis Cokelat, Secepat Kilat!</title>

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        coco: {
                            dark: '#2D1810',
                            deep: '#3D2015',
                            medium: '#5C3A29',
                            caramel: '#D9822B',
                            caramelLight: '#E5B25D',
                            cream: '#FFF9F2',
                            creamDark: '#F7EFE5',
                        }
                    },
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                        outfit: ['Outfit', 'sans-serif'],
                    }
                }
            }
        }
    </script>

    <!-- Google Fonts & FontAwesome -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=Outfit:wght@400;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/website-bisnis/templates/transportation-logistics/delivery-service/cocoexpress/cocoexpress.css') }}">
</head>
<body class="font-sans bg-coco-cream text-coco-dark antialiased overflow-x-hidden selection:bg-coco-caramel selection:text-white relative">

    <!-- CANVAS BACKGROUND ANIMATED BUBBLES / CHOCO PARTICLES -->
    <canvas id="choco-canvas" class="fixed inset-0 pointer-events-none z-0 opacity-50"></canvas>

    <!-- TOPBAR -->
    <div class="bg-coco-dark text-coco-cream text-xs font-mono py-2 px-4 relative z-50 border-b border-coco-caramel/30">
        <div class="max-w-7xl mx-auto flex flex-col sm:flex-row justify-between items-center gap-2">
            <div class="flex items-center space-x-4">
                <span class="flex items-center gap-1.5"><i class="fas fa-truck-fast text-coco-caramelLight animate-bounce"></i> Pickup Gratis Seluruh Indonesia</span>
                <span class="hidden md:inline text-coco-caramel">|</span>
                <span class="hidden md:flex items-center gap-1.5"><i class="fas fa-shield-halved text-coco-caramelLight"></i> Garansi Tepat Waktu 100%</span>
            </div>
            <div class="flex items-center space-x-5">
                <a href="tel:1500888" class="hover:text-coco-caramelLight transition"><i class="fas fa-headset mr-1"></i> Hotline: 1500-888</a>
                <a href="#coverage" class="hover:text-coco-caramelLight transition"><i class="fas fa-map-location-dot mr-1"></i> Cek Jangkauan</a>
            </div>
        </div>
    </div>

    <!-- NAVBAR -->
    <nav class="sticky top-0 z-40 bg-coco-cream/90 backdrop-blur-md border-b border-coco-caramel/20 shadow-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-20">
                <!-- Brand Logo -->
                <a href="#" class="flex items-center space-x-3 group">
                    <div class="w-12 h-12 rounded-2xl bg-gradient-to-tr from-coco-dark to-coco-medium flex items-center justify-center text-white text-2xl shadow-lg border-2 border-coco-caramel group-hover:scale-105 transition transform">
                        🚚
                    </div>
                    <div>
                        <span class="font-outfit text-2xl font-black text-coco-dark tracking-tight block">Coco<span class="text-coco-caramel">Express</span></span>
                        <span class="text-[10px] font-mono font-bold text-coco-medium tracking-widest uppercase block -mt-1">Sweet Logistics</span>
                    </div>
                </a>

                <!-- Desktop Nav Links -->
                <div class="hidden lg:flex items-center space-x-8 font-medium text-sm">
                    <a href="#hero" class="text-coco-dark hover:text-coco-caramel transition">Lacak Resi</a>
                    <a href="#calculator" class="text-coco-dark hover:text-coco-caramel transition">Cek Ongkir</a>
                    <a href="#services" class="text-coco-dark hover:text-coco-caramel transition">Layanan</a>
                    <a href="#pickup" class="text-coco-dark hover:text-coco-caramel transition">Jadwal Pickup</a>
                    <a href="#business" class="text-coco-dark hover:text-coco-caramel transition">Kemitraan Bisnis</a>
                    <a href="#faq" class="text-coco-dark hover:text-coco-caramel transition">FAQ</a>
                </div>

                <!-- CTA Button -->
                <div class="hidden sm:flex items-center space-x-3">
                    <button onclick="openModal('orderModal')" class="px-5 py-2.5 rounded-full bg-gradient-to-r from-coco-caramel to-coco-caramelLight text-white font-mono text-xs font-bold uppercase tracking-wider shadow-lg hover:shadow-xl hover:scale-105 transition transform">
                        <i class="fas fa-paper-plane mr-2"></i> Kirim Paket
                    </button>
                </div>

                <!-- Mobile Menu Toggle -->
                <button onclick="toggleMobileMenu()" class="lg:hidden text-coco-dark text-2xl p-2 focus:outline-none">
                    <i class="fas fa-bars"></i>
                </button>
            </div>
        </div>

        <!-- Mobile Drawer Menu -->
        <div id="mobileMenu" class="hidden lg:hidden bg-coco-cream border-b border-coco-caramel/20 px-4 pt-2 pb-6 space-y-3 font-medium text-sm">
            <a href="#hero" onclick="toggleMobileMenu()" class="block py-2 text-coco-dark">Lacak Resi</a>
            <a href="#calculator" onclick="toggleMobileMenu()" class="block py-2 text-coco-dark">Cek Ongkir</a>
            <a href="#services" onclick="toggleMobileMenu()" class="block py-2 text-coco-dark">Layanan</a>
            <a href="#pickup" onclick="toggleMobileMenu()" class="block py-2 text-coco-dark">Jadwal Pickup</a>
            <a href="#business" onclick="toggleMobileMenu()" class="block py-2 text-coco-dark">Kemitraan Bisnis</a>
            <button onclick="toggleMobileMenu(); openModal('orderModal')" class="w-full mt-2 py-3 rounded-xl bg-coco-caramel text-white font-mono font-bold text-xs uppercase">Kirim Paket Sekarang</button>
        </div>
    </nav>

    <!-- MAIN CONTENT -->
    <main class="relative z-10 space-y-20 py-6">

        <!-- HERO SECTION - ULTRA DYNAMIC UNIVERSE CARD -->
        <section id="hero" class="relative pt-4 pb-12 px-4 sm:px-6 lg:px-8 max-w-7xl mx-auto scroll-mt-28">
            
            <!-- FLOATING DECORATIONS -->
            <div class="absolute -top-6 left-10 z-0 opacity-40 animate-float-parcel pointer-events-none hidden sm:block">
                <span class="text-5xl">📦</span>
            </div>
            <div class="absolute top-1/3 right-4 z-0 opacity-40 animate-float-reverse pointer-events-none hidden sm:block">
                <span class="text-5xl">🍫</span>
            </div>

            <div class="relative z-10 rounded-[40px] bg-gradient-to-b from-coco-dark via-coco-deep to-coco-medium p-6 sm:p-10 border-4 border-coco-caramel/40 shadow-2xl text-coco-cream overflow-hidden">
                <div class="absolute inset-0 opacity-15 bg-[radial-gradient(#D9822B_1.5px,transparent_1.5px)] [background-size:24px_24px] pointer-events-none"></div>

                <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 items-center">
                    
                    <!-- Left Hero Content -->
                    <div class="lg:col-span-7 space-y-6">
                        <div class="inline-flex items-center space-x-2 px-4 py-2 rounded-full bg-coco-caramel/25 border-2 border-coco-caramelLight/40 text-coco-cream text-xs font-mono font-bold backdrop-blur-md shadow-lg">
                            <span class="w-3 h-3 rounded-full bg-coco-caramelLight animate-ping"></span>
                            <span>🚚 Kurir Ramah • Jaminan Senyum 100% • Bebas Ribet</span>
                        </div>

                        <h1 class="font-outfit text-4xl sm:text-6xl lg:text-7xl font-extrabold text-white leading-[1.05]">
                            Kirim Paket <br>
                            <span class="bg-gradient-to-r from-coco-caramelLight via-amber-300 to-white bg-clip-text text-transparent italic drop-shadow-md">
                                Semanis Cokelat,
                            </span>
                            <span class="block text-3xl sm:text-5xl text-coco-cream/90 font-sans mt-2">
                                Secepat Kilat! ⚡
                            </span>
                        </h1>

                        <p class="text-coco-cream/80 text-sm sm:text-base max-w-xl leading-relaxed">
                            Nikmati pengiriman logistik ramah dengan penjemputan <strong class="text-coco-caramelLight">GRATIS di depan pintu Anda</strong>, tanpa minimal order, serta live tracking presisi.
                        </p>

                        <!-- PROMINENT SHIPMENT TRACKING CARD -->
                        <div class="glass-choco p-4 sm:p-5 rounded-3xl border-2 border-coco-caramelLight/50 shadow-2xl text-coco-dark space-y-3 relative">
                            <div class="flex items-center justify-between">
                                <span class="text-xs font-mono font-extrabold uppercase tracking-wider text-coco-medium flex items-center gap-1.5">
                                    <span class="text-base animate-bounce">🔍</span> Lacak Keberadaan Paket Real-Time:
                                </span>
                                <span class="px-2 py-0.5 rounded-full bg-emerald-500/10 text-emerald-700 font-mono text-[9px] font-extrabold uppercase border border-emerald-500/30">Live GPS Connected</span>
                            </div>

                            <form onsubmit="handleTrackShipment(event)" class="flex flex-col sm:flex-row gap-2">
                                <div class="relative flex-1">
                                    <input type="text" id="hero-tracking-input" required placeholder="Masukkan Nomor Resi (Cth: CC-8921-ID)" class="w-full px-4 py-3.5 rounded-2xl bg-white border-2 border-coco-caramel/30 text-coco-dark font-mono text-xs focus:outline-none focus:border-coco-caramel font-bold shadow-inner">
                                    <span class="absolute right-3 top-3.5 text-coco-caramel font-mono text-xs">📦</span>
                                </div>
                                <button type="submit" class="px-7 py-3.5 rounded-2xl bg-gradient-to-r from-coco-caramel to-coco-caramelLight text-white font-mono text-xs font-extrabold uppercase tracking-wider hover:from-coco-dark hover:to-coco-medium transition flex items-center justify-center space-x-2 shadow-lg hover:scale-[1.02] transform">
                                    <span>Lacak Paket</span>
                                    <i class="fas fa-arrow-right"></i>
                                </button>
                            </form>
                        </div>

                        <!-- LIVE TRUCK SIMULATION MINI BAR -->
                        <div class="bg-black/30 backdrop-blur-md rounded-2xl p-3 border border-white/10 font-mono text-xs space-y-2">
                            <div class="flex justify-between text-[10px] text-coco-cream/70">
                                <span>📍 Hub Jakarta</span>
                                <span class="text-coco-caramelLight font-bold animate-pulse">● Kurir Dalam Perjalanan</span>
                                <span>🏡 Tujuan (Surabaya)</span>
                            </div>
                            <div class="relative w-full bg-white/10 h-3 rounded-full overflow-hidden border border-white/10">
                                <div class="absolute inset-y-0 left-0 bg-gradient-to-r from-coco-caramel to-emerald-400 h-full w-full opacity-30"></div>
                                <div class="animate-truck-sim text-xs absolute -top-1.5 transform">🚚</div>
                            </div>
                        </div>

                    </div>

                    <!-- Right Hero Interactive Display -->
                    <div class="lg:col-span-5 relative">
                        <div class="relative w-full max-w-md mx-auto">
                            
                            <!-- Floating Badge Left Top -->
                            <div class="absolute -top-6 -left-6 z-20 bg-white text-coco-dark p-3.5 rounded-2xl shadow-2xl border-2 border-coco-caramel rotate-[-6deg] animate-float-parcel">
                                <div class="flex items-center space-x-3">
                                    <div class="w-10 h-10 rounded-xl bg-coco-cream flex items-center justify-center text-coco-caramel text-xl font-bold shadow-sm">🎁</div>
                                    <div class="font-mono text-xs">
                                        <span class="block font-bold">Paket Tiba Manis</span>
                                        <span class="text-[10px] text-emerald-600 font-extrabold">● Tepat Waktu!</span>
                                    </div>
                                </div>
                            </div>

                            <!-- Floating Badge Right Bottom -->
                            <div class="absolute -bottom-6 -right-6 z-20 bg-coco-dark text-white p-3.5 rounded-2xl shadow-2xl border-2 border-coco-caramelLight rotate-[6deg] animate-float-reverse">
                                <div class="flex items-center space-x-2.5 font-mono text-xs">
                                    <span class="text-coco-caramelLight text-xl">🛡️</span>
                                    <div>
                                        <span class="block font-bold">Free Asuransi</span>
                                        <span class="text-[9px] text-coco-cream/70">Proteksi Rp 10 Juta</span>
                                    </div>
                                </div>
                            </div>

                            <!-- Main Stamp & Courier Card Visual -->
                            <div class="stamp-border p-6 shadow-2xl text-coco-dark space-y-4 relative">
                                <div class="flex justify-between items-center font-mono border-b border-coco-caramel/20 pb-3">
                                    <div class="flex items-center space-x-2">
                                        <span class="w-3 h-3 rounded-full bg-red-500 inline-block"></span>
                                        <span class="w-3 h-3 rounded-full bg-amber-500 inline-block"></span>
                                        <span class="w-3 h-3 rounded-full bg-emerald-500 inline-block"></span>
                                    </div>
                                    <span class="text-[10px] font-extrabold text-coco-caramel uppercase tracking-widest">COCO-LIVE-DASHBOARD</span>
                                </div>

                                <div class="bg-coco-dark text-white rounded-2xl p-4 space-y-3 shadow-lg border border-coco-caramel/30">
                                    <div class="flex items-center justify-between">
                                        <div class="flex items-center space-x-3">
                                            <div class="w-12 h-12 rounded-full bg-gradient-to-tr from-coco-caramel to-amber-300 flex items-center justify-center text-2xl shadow-md border-2 border-white">
                                                👨‍✈️
                                            </div>
                                            <div>
                                                <h4 class="font-outfit font-bold text-sm text-white">Budi Santoso</h4>
                                                <span class="text-[10px] font-mono text-coco-caramelLight block">Kurir Hero CocoExpress</span>
                                            </div>
                                        </div>
                                        <span class="px-2.5 py-1 bg-amber-400 text-coco-dark rounded-full text-[10px] font-mono font-bold">★ 4.98</span>
                                    </div>
                                    
                                    <div class="p-2.5 bg-white/10 rounded-xl font-mono text-[11px] space-y-1">
                                        <div class="flex justify-between text-coco-cream/80">
                                            <span>Paket:</span>
                                            <span class="font-bold text-white">Cokelat & Souvenir</span>
                                        </div>
                                        <div class="flex justify-between text-coco-cream/80">
                                            <span>Estimasi Pickup:</span>
                                            <span class="font-bold text-emerald-400">10 Menit Lagi</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="grid grid-cols-2 gap-3 font-mono text-xs">
                                    <div class="bg-white p-3 rounded-xl border border-coco-caramel/30 text-center shadow-sm">
                                        <span class="text-xl font-extrabold text-coco-dark block">15 Min</span>
                                        <span class="text-[9px] text-coco-medium uppercase font-bold">Avg Pickup</span>
                                    </div>
                                    <div class="bg-white p-3 rounded-xl border border-coco-caramel/30 text-center shadow-sm">
                                        <span class="text-xl font-extrabold text-coco-caramel block">99.9%</span>
                                        <span class="text-[9px] text-coco-medium uppercase font-bold">Aman & Selamat</span>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>

        <!-- HASHTAG MARQUEE TICKER — seamless infinite loop -->
        <div class="coco-marquee bg-coco-dark border-y-2 border-coco-caramel text-coco-caramelLight py-3 overflow-hidden font-mono text-xs font-bold uppercase tracking-wider">
            <div class="coco-marquee-track">
                <div class="coco-marquee-group">
                    <span>🚚 #KirimPaketSemanisCokelat</span>
                    <span>📦 #PickupGratisTiapHari</span>
                    <span>⚡ #SameDayExpress</span>
                    <span>🍫 #ChocolateLuxeLogistics</span>
                    <span>🛡️ #GaransiTepatWaktu</span>
                </div>
                <div class="coco-marquee-group" aria-hidden="true">
                    <span>🚚 #KirimPaketSemanisCokelat</span>
                    <span>📦 #PickupGratisTiapHari</span>
                    <span>⚡ #SameDayExpress</span>
                    <span>🍫 #ChocolateLuxeLogistics</span>
                    <span>🛡️ #GaransiTepatWaktu</span>
                </div>
            </div>
        </div>
        <!-- INSTANT DELIVERY RATE CALCULATOR -->
        <section id="calculator" class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 scroll-mt-28">
            <div class="text-center max-w-2xl mx-auto space-y-2 mb-10">
                <span class="text-coco-caramel font-mono text-xs font-bold uppercase tracking-widest">● Estimasi Biaya Transparan</span>
                <h2 class="font-outfit text-3xl sm:text-4xl font-extrabold text-coco-dark">Kalkulator Ongkir Instan</h2>
                <p class="text-coco-medium text-sm">Hitung tarif pengiriman paket Anda secara akurat tanpa biaya tersembunyi.</p>
            </div>

            <div class="glass-choco rounded-3xl p-6 sm:p-8 border-2 border-coco-caramel/30 shadow-xl max-w-4xl mx-auto">
                <form id="rateForm" onsubmit="calculateShipping(event)" class="space-y-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block font-mono text-xs font-bold text-coco-dark uppercase mb-2">Kota Asal Pickup</label>
                            <select id="originCity" class="w-full px-4 py-3 rounded-2xl bg-white border border-coco-caramel/30 font-medium text-sm focus:outline-none focus:border-coco-caramel">
                                <option value="jakarta">Jakarta (DKI)</option>
                                <option value="bandung">Bandung</option>
                                <option value="surabaya">Surabaya</option>
                                <option value="medan">Medan</option>
                                <option value="yogyakarta">Yogyakarta</option>
                            </select>
                        </div>
                        <div>
                            <label class="block font-mono text-xs font-bold text-coco-dark uppercase mb-2">Kota Tujuan</label>
                            <select id="destinationCity" class="w-full px-4 py-3 rounded-2xl bg-white border border-coco-caramel/30 font-medium text-sm focus:outline-none focus:border-coco-caramel">
                                <option value="surabaya">Surabaya</option>
                                <option value="jakarta">Jakarta (DKI)</option>
                                <option value="bandung">Bandung</option>
                                <option value="bali">Denpasar (Bali)</option>
                                <option value="semarang">Semarang</option>
                            </select>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">
                        <div>
                            <label class="block font-mono text-xs font-bold text-coco-dark uppercase mb-2">Berat Paket (Kg)</label>
                            <input type="number" id="packageWeight" min="0.5" step="0.5" value="1" class="w-full px-4 py-3 rounded-2xl bg-white border border-coco-caramel/30 font-mono text-sm font-bold text-coco-dark focus:outline-none focus:border-coco-caramel">
                        </div>
                        <div>
                            <label class="block font-mono text-xs font-bold text-coco-dark uppercase mb-2">Layanan Pengiriman</label>
                            <select id="serviceType" class="w-full px-4 py-3 rounded-2xl bg-white border border-coco-caramel/30 font-medium text-sm focus:outline-none focus:border-coco-caramel">
                                <option value="sameday">Same-Day Instant (3 Jam)</option>
                                <option value="express">Coco Express (1 Hari)</option>
                                <option value="regular">Regular Delivery (2-3 Hari)</option>
                            </select>
                        </div>
                        <div class="flex items-end">
                            <button type="submit" class="w-full py-3.5 rounded-2xl bg-gradient-to-r from-coco-caramel to-coco-dark text-white font-mono font-bold text-xs uppercase tracking-wider hover:opacity-90 transition shadow-md">
                                Hitung Tarif
                            </button>
                        </div>
                    </div>
                </form>

                <!-- Calculation Result Box -->
                <div id="calcResult" class="mt-6 pt-6 border-t border-coco-caramel/20 hidden">
                    <div class="bg-coco-creamDark p-4 rounded-2xl flex flex-col sm:flex-row justify-between items-center gap-4 border border-coco-caramel/20">
                        <div>
                            <span class="text-xs font-mono text-coco-medium block">Total Estimasi Biaya Kirim:</span>
                            <span id="resPrice" class="text-3xl font-outfit font-extrabold text-coco-dark">Rp 18.000</span>
                            <span id="resETA" class="text-xs font-mono text-emerald-700 font-bold block mt-0.5">Estimasi Tiba: Hari Ini (Max 3 Jam)</span>
                        </div>
                        <button onclick="openModal('orderModal')" class="px-6 py-3 rounded-xl bg-coco-caramel text-white font-mono text-xs font-bold uppercase shadow hover:bg-coco-dark transition">
                            Pesan Pickup Sekarang
                        </button>
                    </div>
                </div>
            </div>
        </section>

        <!-- DELIVERY SERVICE SELECTOR -->
        <section id="services" class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 scroll-mt-28">
            <div class="text-center max-w-2xl mx-auto space-y-2 mb-12">
                <span class="text-coco-caramel font-mono text-xs font-bold uppercase tracking-widest">● Pilihan Paling Pas</span>
                <h2 class="font-outfit text-3xl sm:text-4xl font-extrabold text-coco-dark">Layanan Pengiriman Utama</h2>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <!-- Service 1 -->
                <div class="bg-white p-6 rounded-3xl border-2 border-coco-caramel/20 shadow-lg hover:border-coco-caramel hover:shadow-2xl transition duration-300 relative group">
                    <div class="w-14 h-14 rounded-2xl bg-coco-cream flex items-center justify-center text-3xl mb-4 group-hover:scale-110 transition">
                        ⚡
                    </div>
                    <span class="px-2.5 py-1 bg-amber-100 text-coco-dark font-mono text-[10px] font-bold rounded-full">3 JAM SAMPAI</span>
                    <h3 class="font-outfit font-extrabold text-xl text-coco-dark mt-2">Same-Day Instant</h3>
                    <p class="text-coco-medium text-xs mt-2 leading-relaxed">Pengiriman kilat khusus area dalam kota. Kurir dedicated langsung menjemput dan mengantar tanpa transit.</p>
                </div>

                <!-- Service 2 -->
                <div class="bg-white p-6 rounded-3xl border-2 border-coco-caramel/20 shadow-lg hover:border-coco-caramel hover:shadow-2xl transition duration-300 relative group">
                    <div class="w-14 h-14 rounded-2xl bg-coco-cream flex items-center justify-center text-3xl mb-4 group-hover:scale-110 transition">
                        🚀
                    </div>
                    <span class="px-2.5 py-1 bg-emerald-100 text-emerald-800 font-mono text-[10px] font-bold rounded-full">BESOK SAMPAI</span>
                    <h3 class="font-outfit font-extrabold text-xl text-coco-dark mt-2">Coco Next-Day</h3>
                    <p class="text-coco-medium text-xs mt-2 leading-relaxed">Solusi ekonomis antar kota. Dijamin tiba keesokan harinya sebelum pukul 17.00 WIB.</p>
                </div>

                <!-- Service 3 -->
                <div class="bg-white p-6 rounded-3xl border-2 border-coco-caramel/20 shadow-lg hover:border-coco-caramel hover:shadow-2xl transition duration-300 relative group">
                    <div class="w-14 h-14 rounded-2xl bg-coco-cream flex items-center justify-center text-3xl mb-4 group-hover:scale-110 transition">
                        📦
                    </div>
                    <span class="px-2.5 py-1 bg-blue-100 text-blue-800 font-mono text-[10px] font-bold rounded-full">HEMAT & REGULER</span>
                    <h3 class="font-outfit font-extrabold text-xl text-coco-dark mt-2">Regular Cargo</h3>
                    <p class="text-coco-medium text-xs mt-2 leading-relaxed">Layanan reguler hemat untuk pengiriman barang harian ke 500+ kota di seluruh Indonesia.</p>
                </div>

                <!-- Service 4 -->
                <div class="bg-white p-6 rounded-3xl border-2 border-coco-caramel/20 shadow-lg hover:border-coco-caramel hover:shadow-2xl transition duration-300 relative group">
                    <div class="w-14 h-14 rounded-2xl bg-coco-cream flex items-center justify-center text-3xl mb-4 group-hover:scale-110 transition">
                        📅
                    </div>
                    <span class="px-2.5 py-1 bg-purple-100 text-purple-800 font-mono text-[10px] font-bold rounded-full">SESUAI JADWAL</span>
                    <h3 class="font-outfit font-extrabold text-xl text-coco-dark mt-2">Scheduled Delivery</h3>
                    <p class="text-coco-medium text-xs mt-2 leading-relaxed">Atur waktu dan tanggal pengiriman spesifik sesuai keinginan penerima. Cocok untuk kado & hampers.</p>
                </div>
            </div>
        </section>

        <!-- PACKAGE SIZE & WEIGHT GUIDE -->
        <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="glass-choco rounded-3xl p-8 border-2 border-coco-caramel/30">
                <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-6 mb-8">
                    <div>
                        <span class="text-coco-caramel font-mono text-xs font-bold uppercase tracking-widest">● Panduan Pengemasan</span>
                        <h2 class="font-outfit text-2xl sm:text-3xl font-extrabold text-coco-dark">Kategori Ukuran Paket</h2>
                    </div>
                    <span class="text-xs font-mono text-coco-medium bg-coco-creamDark px-4 py-2 rounded-full border border-coco-caramel/20">💡 Bebas Biaya Penimbangan di Tempat</span>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">
                    <div class="bg-white p-5 rounded-2xl border border-coco-caramel/20">
                        <span class="text-2xl mb-2 block">✉️</span>
                        <h4 class="font-outfit font-bold text-lg text-coco-dark">Paket Kecil (S)</h4>
                        <span class="font-mono text-xs text-coco-caramel font-bold block mb-2">Max 1.0 Kg • Ukuran Amplop/Box Kecil</span>
                        <p class="text-coco-medium text-xs">Dokumen, kosmetik, aksesoris, perhiasan, baju 1 pcs.</p>
                    </div>

                    <div class="bg-white p-5 rounded-2xl border border-coco-caramel/20">
                        <span class="text-2xl mb-2 block">📦</span>
                        <h4 class="font-outfit font-bold text-lg text-coco-dark">Paket Sedang (M)</h4>
                        <span class="font-mono text-xs text-coco-caramel font-bold block mb-2">Max 5.0 Kg • Box Sepatu / Hampers</span>
                        <p class="text-coco-medium text-xs">Sepatu, hampers makanan, elektronik kecil, jaket tebal.</p>
                    </div>

                    <div class="bg-white p-5 rounded-2xl border border-coco-caramel/20">
                        <span class="text-2xl mb-2 block">🧳</span>
                        <h4 class="font-outfit font-bold text-lg text-coco-dark">Paket Besar (L)</h4>
                        <span class="font-mono text-xs text-coco-caramel font-bold block mb-2">Max 20.0 Kg • Koper & Cargo</span>
                        <p class="text-coco-medium text-xs">Peralatan rumah tangga, koper travel, barang pecah belah.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- PICKUP SCHEDULING & FORM -->
        <section id="pickup" class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 scroll-mt-28">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 items-center">
                <div class="lg:col-span-5 space-y-6">
                    <span class="text-coco-caramel font-mono text-xs font-bold uppercase tracking-widest">● Pickup Door-to-Door</span>
                    <h2 class="font-outfit text-3xl sm:text-4xl font-extrabold text-coco-dark leading-tight">Kurir Datang Menjemput Ke Rumah Anda</h2>
                    <p class="text-coco-medium text-sm leading-relaxed">
                        Tidak perlu lagi repot mengantri di agen! Jadwalkan penjemputan paket kapan saja, kurir kami akan tiba sesuai waktu pilihan Anda.
                    </p>

                    <div class="space-y-4 font-mono text-xs">
                        <div class="flex items-center space-x-3 bg-white p-3.5 rounded-2xl border border-coco-caramel/20">
                            <span class="w-8 h-8 rounded-xl bg-coco-cream text-coco-caramel flex items-center justify-center font-bold text-sm">1</span>
                            <span>Isi formulir alamat jemput & tujuan.</span>
                        </div>
                        <div class="flex items-center space-x-3 bg-white p-3.5 rounded-2xl border border-coco-caramel/20">
                            <span class="w-8 h-8 rounded-xl bg-coco-cream text-coco-caramel flex items-center justify-center font-bold text-sm">2</span>
                            <span>Pilih slot jam penjemputan.</span>
                        </div>
                        <div class="flex items-center space-x-3 bg-white p-3.5 rounded-2xl border border-coco-caramel/20">
                            <span class="w-8 h-8 rounded-xl bg-coco-cream text-coco-caramel flex items-center justify-center font-bold text-sm">3</span>
                            <span>Kurir tiba, timbang di lokasi & siap kirim!</span>
                        </div>
                    </div>
                </div>

                <!-- Form Card -->
                <div class="lg:col-span-7">
                    <div class="glass-dark-choco p-6 sm:p-8 rounded-3xl text-coco-cream space-y-6">
                        <div class="flex justify-between items-center border-b border-coco-caramel/30 pb-4">
                            <h3 class="font-outfit font-extrabold text-xl text-white">Formulir Order Pickup</h3>
                            <span class="px-3 py-1 bg-coco-caramel/30 rounded-full font-mono text-[10px] text-coco-caramelLight border border-coco-caramel/50">Pickup Gratis</span>
                        </div>

                        <form onsubmit="handlePickupSubmit(event)" class="space-y-4 text-xs font-mono">
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-coco-cream/80 mb-1">Nama Pengirim</label>
                                    <input type="text" required placeholder="Cth: Ibu Maria" class="w-full px-4 py-3 rounded-xl bg-coco-deep border border-coco-caramel/40 text-white focus:outline-none focus:border-coco-caramelLight">
                                </div>
                                <div>
                                    <label class="block text-coco-cream/80 mb-1">Nomor WhatsApp</label>
                                    <input type="tel" required placeholder="Cth: 08123456789" class="w-full px-4 py-3 rounded-xl bg-coco-deep border border-coco-caramel/40 text-white focus:outline-none focus:border-coco-caramelLight">
                                </div>
                            </div>

                            <div>
                                <label class="block text-coco-cream/80 mb-1">Alamat Penjemputan Lengkap</label>
                                <textarea required rows="2" placeholder="Jl. Mawar No. 12, RT 02/05, Kebayoran Baru" class="w-full px-4 py-3 rounded-xl bg-coco-deep border border-coco-caramel/40 text-white focus:outline-none focus:border-coco-caramelLight"></textarea>
                            </div>

                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-coco-cream/80 mb-1">Tanggal Pickup</label>
                                    <input type="date" required class="w-full px-4 py-3 rounded-xl bg-coco-deep border border-coco-caramel/40 text-white focus:outline-none focus:border-coco-caramelLight">
                                </div>
                                <div>
                                    <label class="block text-coco-cream/80 mb-1">Slot Waktu Waktu</label>
                                    <select class="w-full px-4 py-3 rounded-xl bg-coco-deep border border-coco-caramel/40 text-white focus:outline-none focus:border-coco-caramelLight">
                                        <option>Sesi Pagi (09:00 - 12:00 WIB)</option>
                                        <option>Sesi Siang (13:00 - 16:00 WIB)</option>
                                        <option>Sesi Sore (16:00 - 19:00 WIB)</option>
                                    </select>
                                </div>
                            </div>

                            <button type="submit" class="w-full py-4 rounded-xl bg-gradient-to-r from-coco-caramel to-coco-caramelLight text-coco-dark font-extrabold uppercase tracking-wider hover:opacity-90 transition shadow-lg mt-2">
                                Konfirmasi Jadwal Pickup
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </section>

        <!-- BUSINESS & BULK SHIPPING PACKAGES -->
        <section id="business" class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 scroll-mt-28">
            <div class="bg-gradient-to-r from-coco-dark via-coco-deep to-coco-medium rounded-3xl p-8 sm:p-12 border-2 border-coco-caramel/40 text-white relative overflow-hidden">
                <div class="relative z-10 grid grid-cols-1 lg:grid-cols-12 gap-8 items-center">
                    <div class="lg:col-span-8 space-y-4">
                        <span class="px-3 py-1 bg-amber-400 text-coco-dark font-mono text-[10px] font-bold rounded-full">KHUSUS UMKM & E-COMMERCE</span>
                        <h2 class="font-outfit text-3xl sm:text-5xl font-extrabold">Program Kemitraan Bisnis CocoPartner</h2>
                        <p class="text-coco-cream/80 text-sm max-w-2xl leading-relaxed">
                            Dapatkan diskon ongkir hingga 35%, fasilitas pembayaran Cash On Delivery (COD) tanpa potongan komisi, serta Dedicated Account Manager untuk usaha Anda.
                        </p>
                        <div class="flex flex-wrap gap-4 font-mono text-xs pt-2">
                            <span class="flex items-center gap-1.5"><i class="fas fa-check-circle text-coco-caramelLight"></i> Cashback Bulanan</span>
                            <span class="flex items-center gap-1.5"><i class="fas fa-check-circle text-coco-caramelLight"></i> Sistem API Integrasi Store</span>
                            <span class="flex items-center gap-1.5"><i class="fas fa-check-circle text-coco-caramelLight"></i> Pencairan COD H+1</span>
                        </div>
                    </div>
                    <div class="lg:col-span-4 text-left lg:text-right">
                        <button onclick="openModal('businessModal')" class="px-8 py-4 rounded-full bg-white text-coco-dark font-mono font-extrabold text-xs uppercase tracking-wider hover:bg-coco-cream transition shadow-2xl">
                            Daftar Mitra Bisnis
                        </button>
                    </div>
                </div>
            </div>
        </section>

        <!-- FAQ ACCORDION -->
        <section id="faq" class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 scroll-mt-28">
            <div class="text-center space-y-2 mb-10">
                <span class="text-coco-caramel font-mono text-xs font-bold uppercase tracking-widest">● Tanya Jawab Umum</span>
                <h2 class="font-outfit text-3xl font-extrabold text-coco-dark">Pertanyaan Sering Diajukan</h2>
            </div>

            <div class="space-y-4">
                <div class="bg-white rounded-2xl border border-coco-caramel/20 overflow-hidden shadow-sm">
                    <button onclick="toggleFaq(this)" class="w-full px-6 py-4 text-left font-outfit font-bold text-coco-dark flex justify-between items-center">
                        <span>Apakah ada biaya tambahan untuk penjemputan paket (pickup)?</span>
                        <i class="fas fa-chevron-down text-coco-caramel transition-transform"></i>
                    </button>
                    <div class="px-6 pb-4 text-coco-medium text-xs hidden leading-relaxed border-t border-slate-100 pt-3">
                        Tidak ada sama sekali! Layanan penjemputan paket door-to-door CocoExpress 100% GRATIS tanpa syarat minimal jumlah paket.
                    </div>
                </div>

                <div class="bg-white rounded-2xl border border-coco-caramel/20 overflow-hidden shadow-sm">
                    <button onclick="toggleFaq(this)" class="w-full px-6 py-4 text-left font-outfit font-bold text-coco-dark flex justify-between items-center">
                        <span>Bagaimana cara kerja fitur Cash On Delivery (COD)?</span>
                        <i class="fas fa-chevron-down text-coco-caramel transition-transform"></i>
                    </button>
                    <div class="px-6 pb-4 text-coco-medium text-xs hidden leading-relaxed border-t border-slate-100 pt-3">
                        Kurir kami akan menagih uang pembayaran barang + ongkir ke penerima saat paket tiba. Dana COD akan ditransfer langsung ke rekening Anda H+1 setelah paket diterima.
                    </div>
                </div>

                <div class="bg-white rounded-2xl border border-coco-caramel/20 overflow-hidden shadow-sm">
                    <button onclick="toggleFaq(this)" class="w-full px-6 py-4 text-left font-outfit font-bold text-coco-dark flex justify-between items-center">
                        <span>Bagaimana jika barang rusak atau hilang selama pengiriman?</span>
                        <i class="fas fa-chevron-down text-coco-caramel transition-transform"></i>
                    </button>
                    <div class="px-6 pb-4 text-coco-medium text-xs hidden leading-relaxed border-t border-slate-100 pt-3">
                        Semua pengiriman CocoExpress sudah termasuk garansi perlindungan standar. Jika terjadi klaim, tim kami siap memproses ganti rugi maksimal 1x24 jam.
                    </div>
                </div>
            </div>
        </section>

    </main>

    <!-- FOOTER -->
    <footer class="bg-coco-dark text-coco-cream border-t-4 border-coco-caramel mt-20 font-mono text-xs">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8 mb-8">
                <div class="space-y-3">
                    <div class="flex items-center space-x-2">
                        <span class="text-2xl">🚚</span>
                        <span class="font-outfit text-xl font-bold text-white">CocoExpress</span>
                    </div>
                    <p class="text-coco-cream/70 text-[11px] leading-relaxed">
                        Layanan pengiriman kurir logistik terpercaya di Indonesia dengan sentuhan pelayanan ramah dan profesional.
                    </p>
                </div>

                <div>
                    <h4 class="font-bold text-white uppercase tracking-wider mb-3">Layanan</h4>
                    <ul class="space-y-2 text-coco-cream/70">
                        <li><a href="#services" class="hover:text-coco-caramelLight">Same-Day Instant</a></li>
                        <li><a href="#services" class="hover:text-coco-caramelLight">Coco Next-Day</a></li>
                        <li><a href="#services" class="hover:text-coco-caramelLight">Regular Cargo</a></li>
                    </ul>
                </div>

                <div>
                    <h4 class="font-bold text-white uppercase tracking-wider mb-3">Bantuan & Kontak</h4>
                    <ul class="space-y-2 text-coco-cream/70">
                        <li><a href="#faq" class="hover:text-coco-caramelLight">FAQ</a></li>
                        <li><a href="tel:1500888" class="hover:text-coco-caramelLight">Call Center 1500-888</a></li>
                        <li><a href="mailto:support@cocoexpress.id" class="hover:text-coco-caramelLight">support@cocoexpress.id</a></li>
                    </ul>
                </div>

                <div>
                    <h4 class="font-bold text-white uppercase tracking-wider mb-3">Ikuti Kami</h4>
                    <div class="flex space-x-3 text-lg text-coco-caramelLight">
                        <a href="#" class="hover:text-white"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="hover:text-white"><i class="fab fa-facebook"></i></a>
                        <a href="#" class="hover:text-white"><i class="fab fa-tiktok"></i></a>
                        <a href="#" class="hover:text-white"><i class="fab fa-twitter"></i></a>
                    </div>
                </div>
            </div>

            <div class="pt-6 border-t border-coco-caramel/20 text-center text-coco-cream/50 text-[10px]">
                © 2026 CocoExpress Delivery Logistics. All rights reserved. Made with 🍫 Sweet & Friendly Care.<br><span class="inline-block mt-2 text-coco-cream/60">Made with care ♡ · Website template by WEBIA</span>
            </div>
        </div>
    </footer>

    <!-- FLOATING BUTTONS (SIDE-BY-SIDE FIXED BOTTOM RIGHT) -->
    <div class="fixed bottom-6 right-6 z-50 flex items-center space-x-3">
        <!-- WhatsApp Floating Button -->
        <a href="https://wa.me/628123456789" target="_blank" class="w-14 h-14 rounded-full bg-emerald-500 text-white flex items-center justify-center text-2xl shadow-2xl hover:scale-110 transition transform">
            <i class="fab fa-whatsapp"></i>
        </a>

        <!-- Floating AI Chatbot Button (Chocolate Parcel Animated Theme) -->
        <button onclick="toggleAiChat()" class="relative group">
            <div class="w-16 h-16 rounded-2xl bg-gradient-to-tr from-coco-dark via-coco-medium to-coco-caramel text-white flex items-center justify-center text-2xl shadow-2xl animate-choco-bounce animate-caramel-glow border-2 border-coco-caramelLight">
                📦
            </div>
            <span class="absolute -top-2 -right-1 w-4 h-4 bg-emerald-400 border-2 border-coco-dark rounded-full"></span>
        </button>
    </div>

    <!-- FLOATING AI CHATBOX MODAL -->
    <div id="aiChatBox" class="fixed bottom-24 right-6 z-50 w-80 sm:w-96 bg-coco-cream rounded-3xl shadow-2xl border-2 border-coco-caramel overflow-hidden hidden font-sans">
        <div class="bg-coco-dark text-white p-4 flex justify-between items-center border-b border-coco-caramel">
            <div class="flex items-center space-x-3">
                <div class="w-10 h-10 rounded-xl bg-coco-caramel flex items-center justify-center text-xl animate-bounce">
                    📦
                </div>
                <div>
                    <h4 class="font-outfit font-bold text-sm">ChocoBot AI</h4>
                    <span class="text-[10px] font-mono text-emerald-400 block">● Siap Bantu 24/7</span>
                </div>
            </div>
            <button onclick="toggleAiChat()" class="text-coco-cream/70 hover:text-white text-lg"><i class="fas fa-times"></i></button>
        </div>

        <div id="chatMessages" class="p-4 h-64 overflow-y-auto space-y-3 font-mono text-xs bg-coco-creamDark">
            <div class="bg-white p-3 rounded-2xl rounded-tl-none border border-coco-caramel/20 text-coco-dark shadow-sm">
                Halo! Saya ChocoBot 📦 AI Kurir ramah Anda. Ada yang bisa saya bantu hari ini?
            </div>
        </div>

        <form onsubmit="handleAiMessage(event)" class="p-3 bg-white border-t border-coco-caramel/20 flex gap-2">
            <input type="text" id="aiInput" required placeholder="Tanyakan lokasi resi / ongkir..." class="flex-1 px-3 py-2 rounded-xl border border-coco-caramel/30 font-mono text-xs focus:outline-none focus:border-coco-caramel">
            <button type="submit" class="px-4 py-2 bg-coco-caramel text-white rounded-xl font-mono text-xs font-bold hover:bg-coco-dark transition">
                Kirim
            </button>
        </form>
    </div>

    <!-- MODAL POPUPS (ORDER & BUSINESS) -->
    <div id="orderModal" class="fixed inset-0 z-50 bg-black/60 backdrop-blur-sm flex items-center justify-center p-4 hidden">
        <div class="bg-coco-cream rounded-3xl max-w-md w-full p-6 border-2 border-coco-caramel shadow-2xl space-y-4">
            <div class="flex justify-between items-center">
                <h3 class="font-outfit font-extrabold text-xl text-coco-dark">Order Pengiriman Paket</h3>
                <button onclick="closeModal('orderModal')" class="text-coco-medium hover:text-coco-dark text-lg"><i class="fas fa-times"></i></button>
            </div>
            <p class="text-coco-medium text-xs">Isi formulir singkat ini, kurir kami akan segera menghubungi Anda via WhatsApp.</p>
            <form onsubmit="handleOrderSubmit(event)" class="space-y-3 font-mono text-xs">
                <input type="text" required placeholder="Nama Anda" class="w-full px-4 py-3 rounded-xl bg-white border border-coco-caramel/30">
                <input type="tel" required placeholder="Nomor WhatsApp" class="w-full px-4 py-3 rounded-xl bg-white border border-coco-caramel/30">
                <textarea placeholder="Detail Alamat Pickup" class="w-full px-4 py-3 rounded-xl bg-white border border-coco-caramel/30" rows="2"></textarea>
                <input type="text" placeholder="Alamat tujuan / penerima (opsional)" class="w-full px-4 py-3 rounded-xl bg-white border border-coco-caramel/30">
                <input type="number" min="1" value="1" placeholder="Jumlah paket" class="w-full px-4 py-3 rounded-xl bg-white border border-coco-caramel/30">
                <button type="submit" class="w-full py-3.5 bg-coco-caramel text-white font-bold uppercase rounded-xl hover:bg-coco-dark transition">Kirim Paket Sekarang</button>
            </form>
        </div>
    </div>


    <!-- BUSINESS PARTNERSHIP MODAL -->
    <div id="businessModal" class="fixed inset-0 z-50 bg-black/60 backdrop-blur-sm flex items-center justify-center p-4 hidden">
        <div class="bg-coco-cream rounded-3xl max-w-md w-full p-6 border-2 border-coco-caramel shadow-2xl space-y-4 max-h-[90vh] overflow-y-auto">
            <div class="flex justify-between items-center">
                <h3 class="font-outfit font-extrabold text-xl text-coco-dark">Daftar CocoPartner</h3>
                <button type="button" onclick="closeModal('businessModal')" class="text-coco-medium hover:text-coco-dark text-lg"><i class="fas fa-times"></i></button>
            </div>
            <p class="text-coco-medium text-xs">Ceritakan kebutuhan pengiriman bisnis Anda. Tim CocoExpress akan menghubungi untuk membahas penawaran kemitraan.</p>
            <form onsubmit="handleBusinessSubmit(event)" class="space-y-3 font-mono text-xs">
                <input type="text" required placeholder="Nama bisnis / perusahaan" class="w-full px-4 py-3 rounded-xl bg-white border border-coco-caramel/30">
                <input type="text" required placeholder="Nama PIC" class="w-full px-4 py-3 rounded-xl bg-white border border-coco-caramel/30">
                <input type="tel" required placeholder="Nomor WhatsApp" class="w-full px-4 py-3 rounded-xl bg-white border border-coco-caramel/30">
                <input type="email" placeholder="Email bisnis (opsional)" class="w-full px-4 py-3 rounded-xl bg-white border border-coco-caramel/30">
                <textarea required rows="3" placeholder="Perkiraan volume dan kebutuhan pengiriman" class="w-full px-4 py-3 rounded-xl bg-white border border-coco-caramel/30"></textarea>
                <button type="submit" class="w-full py-3.5 bg-coco-caramel text-white font-bold uppercase rounded-xl hover:bg-coco-dark transition">Kirim Permintaan Kemitraan</button>
            </form>
        </div>
    </div>

    <!-- JAVASCRIPT LOGIC -->
    <script>window.COCOEXPRESS_WA_ADMIN = window.COCOEXPRESS_WA_ADMIN || '6281234567890';</script>
    <script src="{{ asset('js/website-bisnis/templates/transportation-logistics/delivery-service/cocoexpress/cocoexpress.js') }}" defer></script>
</body>
</html>