<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SakuraTech — Cyber-Sakura Hardware & High-Speed Networking Hub ⚡🤖</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        cherry: {
                            50: '#fff0f5',
                            100: '#ffe4ed',
                            200: '#fecddb',
                            300: '#fda4be',
                            400: '#ff5e97',
                            500: '#ff2a75',
                            600: '#e60050',
                            700: '#c4003d',
                            800: '#a20237',
                            900: '#870732',
                            dark: '#140b1d',
                            base: '#0f0814',
                            card: '#1b1026'
                        },
                        cyber: {
                            cyan: '#00f0ff',
                            blue: '#3b82f6',
                            purple: '#8a2be2',
                            violet: '#a855f7',
                            yellow: '#ffcc00',
                            green: '#00ff88'
                        }
                    },
                    fontFamily: {
                        sans: ['Plus Jakarta Sans', 'Inter', 'sans-serif'],
                        mono: ['Fira Code', 'monospace']
                    },
                    animation: {
                        'float-slow': 'float 6s ease-in-out infinite',
                        'float-fast': 'float 3s ease-in-out infinite',
                        'spin-slow': 'spin 15s linear infinite',
                        'bounce-soft': 'bounceSoft 2.5s infinite',
                        'pulse-glow': 'pulseGlow 2s infinite',
                        'neon-border': 'neonBorder 3s infinite alternate',
                        'marquee': 'marquee 25s linear infinite',
                    },
                    keyframes: {
                        float: {
                            '0%, 100%': { transform: 'translateY(0px) rotate(0deg)' },
                            '50%': { transform: 'translateY(-12px) rotate(2deg)' },
                        },
                        bounceSoft: {
                            '0%, 100%': { transform: 'translateY(0)' },
                            '50%': { transform: 'translateY(-8px)' },
                        },
                        pulseGlow: {
                            '0%, 100%': { boxShadow: '0 0 15px rgba(255, 42, 117, 0.4), 0 0 30px rgba(0, 240, 255, 0.2)' },
                            '50%': { boxShadow: '0 0 30px rgba(255, 42, 117, 0.8), 0 0 50px rgba(0, 240, 255, 0.5)' },
                        },
                        neonBorder: {
                            '0%': { borderColor: 'rgba(255, 42, 117, 0.6)' },
                            '100%': { borderColor: 'rgba(0, 240, 255, 0.6)' },
                        },
                        marquee: {
                            '0%': { transform: 'translateX(0%)' },
                            '100%': { transform: 'translateX(-50%)' }
                        }
                    }
                }
            }
        }
    </script>
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fira+Code:wght@400;600&family=Plus+Jakarta+Sans:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Canvas Confetti -->
    <script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.6.0/dist/confetti.browser.min.js"></script>
    

    <link rel="stylesheet" href="{{ asset('css/website-bisnis/templates/technology-it/hardware-computer-networking/sakuratech/sakuratech.css') }}">

</head>
<body class="cyber-grid-bg relative min-h-screen text-gray-100">

    <!-- CUSTOM TECH RETICLE CURSOR -->
    <div id="custom-cursor">
        <div class="relative w-8 h-8 flex items-center justify-center">
            <!-- Tech Target Reticle Ring -->
            <div class="w-8 h-8 border border-cyber-cyan rounded-full animate-ping opacity-40 absolute"></div>
            <div class="w-6 h-6 border-2 border-cherry-500 rounded-full flex items-center justify-center shadow-lg shadow-cherry-500/50">
                <div class="w-1.5 h-1.5 bg-cyber-cyan rounded-full"></div>
            </div>
            <span class="absolute -top-2 -right-2 text-[10px] text-cherry-400 font-mono font-bold">⚡</span>
        </div>
    </div>

    <!-- BACKGROUND CANVAS (CYBER TECH SPARKLES & BINARY DATA STREAM) -->
    <canvas id="sakura-matrix-canvas" class="fixed inset-0 pointer-events-none z-0 opacity-70"></canvas>

    <!-- TOPBAR TICKER -->
    <header class="relative z-40">
        <div class="bg-gradient-to-r from-cherry-dark via-cherry-900 to-black text-xs py-2 px-4 border-b border-cherry-500/30 overflow-hidden">
            <div class="max-w-7xl mx-auto flex items-center justify-between gap-4">
                <div class="flex items-center gap-3 shrink-0">
                    <span class="bg-cherry-500 text-white font-extrabold px-2.5 py-0.5 rounded text-[10px] tracking-wider uppercase animate-pulse">⚡ CYBER SAKURA TECH</span>
                </div>
                
                <!-- Live Ticker Marquee -->
                <div class="overflow-hidden whitespace-nowrap w-full">
                    <div class="inline-block animate-marquee text-cherry-200 text-[11px] font-mono">
                        🚀 STOCK READY: NVIDIA RTX 4090 Cyber Armor & Ryzen 7 7800X3D! &nbsp;&nbsp;&nbsp;&nbsp; 🔥 PROMO RAKIT PC: Free Custom Cable Sleeve Sleeving Cyber Pink & Cyan! &nbsp;&nbsp;&nbsp;&nbsp; ⚡ WI-FI 7 ULTRA MESH SETUP DISKON 20% HARI INI!
                    </div>
                </div>

                <div class="hidden md:flex items-center gap-4 shrink-0 text-gray-300 font-mono text-[11px]">
                    <a href="tel:08123456789" class="hover:text-cyber-cyan transition"><i class="fa-solid fa-headset text-cherry-400"></i> CS +62 812-3456-7890</a>
                    <span>|</span>
                    <button class="text-cyber-cyan font-bold">IDR (Rp)</button>
                </div>
            </div>
        </div>

        <!-- NAVBAR -->
        <nav class="sticky top-0 glass-panel border-b border-cherry-500/30 py-3.5 px-4 sm:px-8 z-40">
            <div class="max-w-7xl mx-auto flex items-center justify-between">
                
                <!-- Brand Logo -->
                <a href="#" class="flex items-center gap-3 group">
                    <div class="relative w-11 h-11 bg-gradient-to-tr from-cherry-500 via-purple-600 to-cyber-cyan rounded-xl p-0.5 shadow-lg shadow-cherry-500/40 group-hover:scale-105 transition">
                        <div class="w-full h-full bg-cherry-dark rounded-[10px] flex items-center justify-center relative overflow-hidden">
                            <i class="fa-solid fa-microchip text-cyber-cyan text-xl group-hover:rotate-45 transition duration-500"></i>
                            <span class="absolute -top-1 -right-1 text-[10px]">⚡</span>
                        </div>
                    </div>
                    <div>
                        <span class="text-2xl font-black tracking-wider gradient-text-cherry block leading-none font-sans">SAKURA<span class="text-cyber-cyan">TECH</span></span>
                        <span class="text-[9px] text-cherry-300 font-mono font-bold tracking-widest uppercase block">CYBER HARDWARE & NETWORK LAB</span>
                    </div>
                </a>

                <!-- Nav Menu -->
                <div class="hidden lg:flex items-center gap-7 font-bold text-xs uppercase tracking-wider text-gray-200">
                    <a href="#hero" class="hover:text-cherry-400 transition flex items-center gap-1.5"><i class="fa-solid fa-terminal text-cyber-cyan"></i> Core System</a>
                    <a href="#pc-configurator" class="text-cherry-400 hover:text-cyber-cyan transition font-extrabold flex items-center gap-1.5"><i class="fa-solid fa-sliders text-cherry-500"></i> Build PC Studio</a>
                    <a href="#catalog" class="hover:text-cherry-400 transition">Hardware Specs</a>
                    <a href="#networking" class="hover:text-cherry-400 transition">Networking</a>
                    <a href="#bundles" class="hover:text-cherry-400 transition">PC Rigs</a>
                    <a href="#gallery" class="hover:text-cherry-400 transition">Battlestations</a>
                    <a href="#guides" class="hover:text-cherry-400 transition">Tech Guides</a>
                </div>

                <!-- Right Actions -->
                <div class="flex items-center gap-4">
                    <button onclick="toggleModal('cart-modal')" class="relative w-11 h-11 rounded-xl bg-white/5 border border-cherry-500/40 flex items-center justify-center hover:bg-cherry-500/20 hover:border-cyber-cyan transition text-cherry-300">
                        <i class="fa-solid fa-cart-shopping text-base"></i>
                        <span id="cart-counter" class="absolute -top-2 -right-2 bg-gradient-to-r from-cherry-500 to-cyber-cyan text-white font-black text-[10px] w-5 h-5 rounded-full flex items-center justify-center shadow-lg border border-black animate-bounce">0</span>
                    </button>

                    <a href="#pc-configurator" class="hidden sm:flex items-center gap-2 bg-gradient-to-r from-cherry-500 via-cherry-600 to-cyber-cyan text-white font-extrabold text-xs uppercase tracking-wider px-5 py-3 rounded-xl shadow-lg shadow-cherry-500/40 hover:shadow-cyber-cyan/50 hover:scale-105 transition">
                        <i class="fa-solid fa-bolt"></i> CONFIGURATE RIG
                    </a>

                    <button id="mobile-menu-btn" class="lg:hidden text-2xl text-cherry-400 focus:outline-none">
                        <i class="fa-solid fa-bars-staggered"></i>
                    </button>
                </div>
            </div>

            <!-- Mobile Dropdown -->
            <div id="mobile-menu" class="hidden lg:hidden mt-4 pt-4 border-t border-cherry-500/20 space-y-3 font-bold text-xs uppercase tracking-wider px-2">
                <a href="#hero" class="block py-2 text-cherry-400"><i class="fa-solid fa-terminal mr-2"></i> Core System</a>
                <a href="#pc-configurator" class="block py-2 text-cyber-cyan"><i class="fa-solid fa-sliders mr-2"></i> Build PC Studio</a>
                <a href="#catalog" class="block py-2 hover:text-cherry-400"><i class="fa-solid fa-microchip mr-2"></i> Hardware Specs</a>
                <a href="#networking" class="block py-2 hover:text-cherry-400"><i class="fa-solid fa-network-wired mr-2"></i> Networking</a>
                <a href="#bundles" class="block py-2 hover:text-cherry-400"><i class="fa-solid fa-box-open mr-2"></i> Ready PC Bundles</a>
                <a href="#gallery" class="block py-2 hover:text-cherry-400"><i class="fa-solid fa-images mr-2"></i> Battlestation Showcase</a>
                <a href="#guides" class="block py-2 hover:text-cherry-400"><i class="fa-solid fa-book-code mr-2"></i> Tech Guides & FAQ</a>
            </div>
        </nav>
    </header>

    <!-- ULTRA HIGH-TECH HERO SECTION -->
    <section id="hero" class="relative pt-12 pb-24 px-4 sm:px-8 max-w-7xl mx-auto overflow-hidden">
        
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center relative z-10">
            
            <!-- Left Hero Content -->
            <div class="lg:col-span-7 space-y-6 text-center lg:text-left">
                
                <div class="inline-flex items-center gap-2 bg-cherry-card border border-cherry-500/50 px-4 py-2 rounded-full text-xs font-mono text-cherry-300 shadow-xl backdrop-blur-md animate-float-slow">
                    <span class="w-2.5 h-2.5 rounded-full bg-cyber-cyan animate-ping"></span>
                    <span>SYSTEM STATUS: <span class="text-cyber-cyan font-bold">CYBER SAKURA ENGINE ONLINE</span></span>
                </div>

                <h1 class="text-4xl sm:text-6xl font-black tracking-tight leading-tight uppercase font-sans">
                    RAKIT <span class="gradient-text-cherry neon-text-cherry">PC IMPIAN BEAST</span> & NETWORK WI-FI 7 <span class="text-cyber-cyan neon-text-cyan">ULTRA FAST!</span>
                </h1>

                <p class="text-sm sm:text-base text-gray-300 max-w-2xl leading-relaxed mx-auto lg:mx-0 font-normal">
                    Kombinasi performa komputasi monster, arsitektur pendingin Sakura Liquid Armor, dan jaringan fiber ultra-latency rendah. Didukung garansi 3 tahun replacement penuh & tes kompatibilitas AI!
                </p>

                <!-- High-Tech Feature Pills -->
                <div class="flex flex-wrap items-center justify-center lg:justify-start gap-3 pt-2 font-mono text-xs">
                    <div class="glass-panel px-3.5 py-2 rounded-xl border border-cherry-500/40 text-cherry-300 font-bold flex items-center gap-2">
                        <i class="fa-solid fa-robot text-cyber-cyan"></i> AI Compatibility Checker
                    </div>
                    <div class="glass-panel px-3.5 py-2 rounded-xl border border-cyber-purple/40 text-purple-300 font-bold flex items-center gap-2">
                        <i class="fa-solid fa-snowflake text-cherry-400"></i> Dual Loop Liquid Cooler
                    </div>
                    <div class="glass-panel px-3.5 py-2 rounded-xl border border-cyber-cyan/40 text-cyber-cyan font-bold flex items-center gap-2">
                        <i class="fa-solid fa-wifi text-cyber-green"></i> Wi-Fi 7 Ready
                    </div>
                </div>

                <!-- CTA Buttons -->
                <div class="flex flex-col sm:flex-row items-center justify-center lg:justify-start gap-4 pt-4">
                    <a href="#pc-configurator" onclick="triggerConfetti()" class="w-full sm:w-auto px-8 py-4 rounded-xl bg-gradient-to-r from-cherry-500 via-cherry-600 to-cyber-cyan text-white font-black text-xs tracking-widest uppercase shadow-xl shadow-cherry-500/40 hover:shadow-cyber-cyan/60 hover:scale-105 active:scale-95 transition text-center flex items-center justify-center gap-3">
                        <i class="fa-solid fa-terminal text-lg"></i>
                        Mulai Simulasi PC Configurator
                    </a>
                    <a href="#networking" class="w-full sm:w-auto px-7 py-4 rounded-xl glass-panel border border-cyber-cyan/50 hover:border-cyber-cyan text-cyber-cyan font-extrabold text-xs tracking-wider uppercase hover:bg-cyber-cyan/10 transition text-center flex items-center justify-center gap-2">
                        <i class="fa-solid fa-network-wired text-lg"></i> Paket Wi-Fi & Network
                    </a>
                </div>

                <!-- Live Performance Counter Widget -->
                <div class="grid grid-cols-3 gap-4 pt-6 border-t border-cherry-500/20 max-w-lg mx-auto lg:mx-0 font-mono">
                    <div>
                        <span class="text-2xl sm:text-3xl font-black text-cherry-400 block">4.850+</span>
                        <span class="text-[10px] text-gray-400 uppercase">PC Rigs Assembled</span>
                    </div>
                    <div>
                        <span class="text-2xl sm:text-3xl font-black text-cyber-cyan block">99.9%</span>
                        <span class="text-[10px] text-gray-400 uppercase">Uptime & Stability</span>
                    </div>
                    <div>
                        <span class="text-2xl sm:text-3xl font-black text-cyber-purple block">1.500+</span>
                        <span class="text-[10px] text-gray-400 uppercase">Networks Installed</span>
                    </div>
                </div>

            </div>

            <!-- Right Hero Content: Futuristic Cyber-Sakura AI Robot & Rig Interactive Showcase -->
            <div class="lg:col-span-5 relative flex items-center justify-center">
                
                <!-- Dynamic Tech Halo Ring -->
                <div class="absolute w-80 h-80 sm:w-96 sm:h-96 rounded-full border-2 border-dashed border-cherry-500/40 animate-spin-slow pointer-events-none"></div>
                <div class="absolute w-72 h-72 sm:w-80 sm:h-80 rounded-full border border-cyber-cyan/30 animate-pulse pointer-events-none"></div>

                <!-- Central Visual Hero Card -->
                <div class="relative z-10 w-full max-w-md glass-panel p-6 rounded-3xl border-2 border-cherry-500/50 shadow-2xl shadow-cherry-500/30 animate-float-slow">
                    
                    <div class="flex items-center justify-between border-b border-cherry-500/20 pb-4 mb-4">
                        <div class="flex items-center gap-2 font-mono text-xs">
                            <span class="w-2.5 h-2.5 rounded-full bg-cyber-cyan animate-ping"></span>
                            <span class="font-bold text-cherry-300">SakuraBot-AI Rig Edition 4090</span>
                        </div>
                        <span class="bg-cyber-cyan/20 text-cyber-cyan text-[10px] font-black px-2 py-0.5 rounded border border-cyber-cyan/40 font-mono">OVERCLOCK ON</span>
                    </div>

                    <!-- AI Robot & High-Tech Hardware Photo Display -->
                    <div class="relative rounded-2xl overflow-hidden group mb-4">
                        <img src="https://images.unsplash.com/photo-1587202372775-e229f172b9d7?auto=format&fit=crop&w=800&q=80" alt="Cyber Sakura PC Hardware" class="w-full h-64 object-cover group-hover:scale-110 transition-transform duration-700">
                        <div class="absolute inset-0 bg-gradient-to-t from-cherry-dark via-transparent to-transparent opacity-90"></div>
                        
                        <!-- Floating Live Spec Badge Overlays -->
                        <div class="absolute bottom-3 left-3 right-3 flex items-center justify-between text-xs font-mono">
                            <span class="bg-cherry-dark/90 backdrop-blur-md text-cherry-300 px-3 py-1 rounded-lg border border-cherry-500/40 font-bold flex items-center gap-1.5">
                                <i class="fa-solid fa-temperature-arrow-down text-cyber-cyan"></i> 38°C Liquid
                            </span>
                            <span class="bg-cherry-dark/90 backdrop-blur-md text-cyber-cyan px-3 py-1 rounded-lg border border-cyber-cyan/40 font-bold">
                                320 FPS 4K
                            </span>
                        </div>
                    </div>

                    <!-- Micro Hardware Component Gauges -->
                    <div class="grid grid-cols-2 gap-3 font-mono">
                        <div class="p-3 rounded-xl bg-cherry-500/10 border border-cherry-500/30 flex items-center gap-3">
                            <div class="w-9 h-9 rounded-lg bg-cherry-500/20 flex items-center justify-center text-cherry-400 font-bold text-lg">
                                <i class="fa-solid fa-microchip"></i>
                            </div>
                            <div>
                                <span class="text-[9px] text-gray-400 block uppercase">Processor</span>
                                <span class="text-xs font-bold text-white">i9 14900KS</span>
                            </div>
                        </div>

                        <div class="p-3 rounded-xl bg-cyber-cyan/10 border border-cyber-cyan/30 flex items-center gap-3">
                            <div class="w-9 h-9 rounded-lg bg-cyber-cyan/20 flex items-center justify-center text-cyber-cyan font-bold text-lg">
                                <i class="fa-solid fa-wifi"></i>
                            </div>
                            <div>
                                <span class="text-[9px] text-gray-400 block uppercase">Wi-Fi 7 Mesh</span>
                                <span class="text-xs font-bold text-white">9.6 Gbps</span>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- Floating Satellite Robot Mascot Badge -->
                <div class="absolute -top-6 -left-6 bg-cherry-card p-3 rounded-2xl border border-cherry-400/50 shadow-xl flex items-center gap-3 animate-float-fast z-20">
                    <div class="w-10 h-10 rounded-xl bg-gradient-to-tr from-cherry-500 to-cyber-cyan flex items-center justify-center text-white text-xl shadow-md">
                        <i class="fa-solid fa-robot"></i>
                    </div>
                    <div>
                        <span class="text-xs font-bold text-cherry-300 block font-mono">SakuraBot AI</span>
                        <span class="text-[10px] text-gray-400">Ready to Assist</span>
                    </div>
                </div>

                <div class="absolute -bottom-6 -right-6 bg-cherry-card p-3 rounded-2xl border border-cyber-cyan/50 shadow-xl flex items-center gap-3 animate-float-slow z-20" style="animation-delay: 1.5s">
                    <i class="fa-solid fa-ethernet text-2xl text-cyber-cyan"></i>
                    <div class="font-mono">
                        <span class="text-xs font-bold text-cyber-cyan block">CAT8 Armor LAN</span>
                        <span class="text-[10px] text-gray-400">0.5ms Ping Low Latency</span>
                    </div>
                </div>

            </div>

        </div>
    </section>

    <!-- PROMOTIONAL FLASH SALE TIMER BANNER -->
    <section class="py-6 px-4 sm:px-8 max-w-7xl mx-auto">
        <div class="glass-panel-neon rounded-3xl p-6 border-2 border-cherry-500/50 shadow-xl relative overflow-hidden flex flex-col md:flex-row items-center justify-between gap-6">
            <div class="flex items-center gap-4 text-center md:text-left">
                <div class="w-14 h-14 rounded-2xl bg-gradient-to-tr from-cherry-500 to-cyber-cyan flex items-center justify-center text-white text-2xl shadow-lg shrink-0 animate-bounce-soft">
                    <i class="fa-solid fa-bolt"></i>
                </div>
                <div>
                    <div class="flex items-center gap-2 justify-center md:justify-start font-mono">
                        <span class="bg-cherry-500 text-white font-bold text-[10px] px-2 py-0.5 rounded uppercase">FLASH SALE CYBER SAKURA</span>
                        <span class="text-xs text-cherry-300 font-bold">STOK TERBATAS!</span>
                    </div>
                    <h3 class="text-xl sm:text-2xl font-black text-white mt-1">Bundle GPU RTX 4070 Ti Super + Wi-Fi 6E Gaming Router</h3>
                </div>
            </div>

            <div class="flex items-center gap-3 font-mono">
                <div class="text-center bg-cherry-base/90 px-3 py-2 rounded-xl border border-cherry-500/30 min-w-[55px]">
                    <span id="timer-hours" class="text-xl font-bold text-cherry-400">08</span>
                    <span class="text-[9px] text-gray-400 block uppercase">Jam</span>
                </div>
                <span class="text-cherry-500 font-bold text-xl">:</span>
                <div class="text-center bg-cherry-base/90 px-3 py-2 rounded-xl border border-cherry-500/30 min-w-[55px]">
                    <span id="timer-minutes" class="text-xl font-bold text-cyber-cyan">42</span>
                    <span class="text-[9px] text-gray-400 block uppercase">Menit</span>
                </div>
                <span class="text-cherry-500 font-bold text-xl">:</span>
                <div class="text-center bg-cherry-base/90 px-3 py-2 rounded-xl border border-cherry-500/30 min-w-[55px]">
                    <span id="timer-seconds" class="text-xl font-bold text-cyber-purple">19</span>
                    <span class="text-[9px] text-gray-400 block uppercase">Detik</span>
                </div>
                <button onclick="triggerConfetti()" class="ml-2 px-5 py-3 rounded-xl bg-cherry-500 hover:bg-cherry-600 text-white font-bold text-xs uppercase tracking-wider transition">Claim Voucher</button>
            </div>
        </div>
    </section>

    <!-- BUILD YOUR DREAM PC INTERACTIVE CONFIGURATOR STUDIO -->
    <section id="pc-configurator" class="py-20 px-4 sm:px-8 max-w-7xl mx-auto relative">
        
        <div class="text-center max-w-3xl mx-auto mb-14">
            <span class="bg-cherry-500/20 text-cherry-300 border border-cherry-500/30 text-xs font-mono font-bold px-4 py-1.5 rounded-full uppercase tracking-widest inline-block mb-3">
                ⚡ Studio Rakit PC Interaktif
            </span>
            <h2 class="text-3xl sm:text-5xl font-black text-white uppercase tracking-tight">
                Build Your <span class="gradient-text-cherry">Dream PC Beast</span>
            </h2>
            <p class="text-gray-300 text-xs sm:text-base mt-2 font-normal">
                Pilih komponen favoritmu, kalkulasi daya watt otomatis, cek estimasi harga real-time, dan pastikan 100% kompatibel sebelum dibeli!
            </p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
            
            <!-- Component Selectors -->
            <div class="lg:col-span-7 space-y-4 font-sans">
                
                <!-- CPU Select -->
                <div class="glass-panel p-4 rounded-2xl border border-cherry-500/30 flex flex-col sm:flex-row items-center justify-between gap-4">
                    <div class="flex items-center gap-3 w-full sm:w-auto">
                        <div class="w-12 h-12 rounded-xl bg-cherry-500/20 text-cherry-400 flex items-center justify-center text-xl shrink-0">
                            <i class="fa-solid fa-microchip"></i>
                        </div>
                        <div>
                            <h4 class="font-bold text-white text-sm">Processor (CPU)</h4>
                            <span class="text-xs text-gray-400">Otak utama performa PC</span>
                        </div>
                    </div>
                    <select id="config-cpu" onchange="updatePCConfig()" class="w-full sm:w-auto bg-cherry-dark text-cherry-300 text-xs font-mono font-bold px-4 py-2.5 rounded-xl border border-cherry-500/40 focus:outline-none focus:border-cyber-cyan">
                        <option value="0" data-watt="0" data-socket="LGA1700">-- Pilih CPU --</option>
                        <option value="4200000" data-watt="125" data-socket="LGA1700">Intel Core i5-14600K (Rp 4.200.000)</option>
                        <option value="7800000" data-watt="253" data-socket="LGA1700">Intel Core i9-14900K Cyber Sakura (Rp 7.800.000)</option>
                        <option value="5100000" data-watt="120" data-socket="AM5">AMD Ryzen 7 7800X3D (Rp 5.100.000)</option>
                        <option value="9200000" data-watt="170" data-socket="AM5">AMD Ryzen 9 7950X3D (Rp 9.200.000)</option>
                    </select>
                </div>

                <!-- GPU Select -->
                <div class="glass-panel p-4 rounded-2xl border border-cherry-500/30 flex flex-col sm:flex-row items-center justify-between gap-4">
                    <div class="flex items-center gap-3 w-full sm:w-auto">
                        <div class="w-12 h-12 rounded-xl bg-cyber-cyan/20 text-cyber-cyan flex items-center justify-center text-xl shrink-0">
                            <i class="fa-solid fa-display"></i>
                        </div>
                        <div>
                            <h4 class="font-bold text-white text-sm">Graphics Card (GPU)</h4>
                            <span class="text-xs text-gray-400">Visual & Frame Rate Monster</span>
                        </div>
                    </div>
                    <select id="config-gpu" onchange="updatePCConfig()" class="w-full sm:w-auto bg-cherry-dark text-cyber-cyan text-xs font-mono font-bold px-4 py-2.5 rounded-xl border border-cyber-cyan/40 focus:outline-none focus:border-cyber-cyan">
                        <option value="0" data-watt="0">-- Pilih GPU --</option>
                        <option value="6500000" data-watt="200">NVIDIA RTX 4060 Ti 16GB Cyber Armor (Rp 6.500.000)</option>
                        <option value="12800000" data-watt="285">NVIDIA RTX 4070 Ti Super Sakura (Rp 12.800.000)</option>
                        <option value="28500000" data-watt="450">NVIDIA RTX 4090 24GB Cyber Neon (Rp 28.500.000)</option>
                        <option value="15200000" data-watt="355">AMD Radeon RX 7900 XTX (Rp 15.200.000)</option>
                    </select>
                </div>

                <!-- Motherboard Select -->
                <div class="glass-panel p-4 rounded-2xl border border-cherry-500/30 flex flex-col sm:flex-row items-center justify-between gap-4">
                    <div class="flex items-center gap-3 w-full sm:w-auto">
                        <div class="w-12 h-12 rounded-xl bg-purple-500/20 text-purple-400 flex items-center justify-center text-xl shrink-0">
                            <i class="fa-solid fa-memory"></i>
                        </div>
                        <div>
                            <h4 class="font-bold text-white text-sm">Motherboard</h4>
                            <span class="text-xs text-gray-400">Papan sirkuit utama</span>
                        </div>
                    </div>
                    <select id="config-mb" onchange="updatePCConfig()" class="w-full sm:w-auto bg-cherry-dark text-purple-300 text-xs font-mono font-bold px-4 py-2.5 rounded-xl border border-purple-500/40 focus:outline-none">
                        <option value="0" data-socket="NONE">-- Pilih Motherboard --</option>
                        <option value="3400000" data-socket="LGA1700">ASUS ROG Strix Z790-A Gaming Wi-Fi (Rp 3.400.000)</option>
                        <option value="4100000" data-socket="AM5">MSI MAG B650M Mortar Wifi Sakura (Rp 4.100.000)</option>
                        <option value="5600000" data-socket="LGA1700">GIGABYTE Z790 AORUS PRO X Dark (Rp 5.600.000)</option>
                    </select>
                </div>

                <!-- RAM Select -->
                <div class="glass-panel p-4 rounded-2xl border border-cherry-500/30 flex flex-col sm:flex-row items-center justify-between gap-4">
                    <div class="flex items-center gap-3 w-full sm:w-auto">
                        <div class="w-12 h-12 rounded-xl bg-pink-500/20 text-pink-400 flex items-center justify-center text-xl shrink-0">
                            <i class="fa-solid fa-server"></i>
                        </div>
                        <div>
                            <h4 class="font-bold text-white text-sm">Memory (RAM RGB)</h4>
                            <span class="text-xs text-gray-400">Multitasking & Speed</span>
                        </div>
                    </div>
                    <select id="config-ram" onchange="updatePCConfig()" class="w-full sm:w-auto bg-cherry-dark text-pink-300 text-xs font-mono font-bold px-4 py-2.5 rounded-xl border border-pink-500/40 focus:outline-none">
                        <option value="0" data-watt="15">-- Pilih RAM --</option>
                        <option value="1800000" data-watt="15">Corsair Vengeance RGB DDR5 32GB (2x16GB) 6000MHz (Rp 1.800.000)</option>
                        <option value="3200000" data-watt="25">G.Skill Trident Z5 Royal Neo 64GB (2x32GB) 7200MHz (Rp 3.200.000)</option>
                    </select>
                </div>

                <!-- SSD Storage Select -->
                <div class="glass-panel p-4 rounded-2xl border border-cherry-500/30 flex flex-col sm:flex-row items-center justify-between gap-4">
                    <div class="flex items-center gap-3 w-full sm:w-auto">
                        <div class="w-12 h-12 rounded-xl bg-yellow-500/20 text-yellow-400 flex items-center justify-center text-xl shrink-0">
                            <i class="fa-solid fa-hard-drive"></i>
                        </div>
                        <div>
                            <h4 class="font-bold text-white text-sm">Storage NVMe SSD</h4>
                            <span class="text-xs text-gray-400">Storage High Speed Gen4/Gen5</span>
                        </div>
                    </div>
                    <select id="config-ssd" onchange="updatePCConfig()" class="w-full sm:w-auto bg-cherry-dark text-yellow-300 text-xs font-mono font-bold px-4 py-2.5 rounded-xl border border-yellow-500/40 focus:outline-none">
                        <option value="0" data-watt="10">-- Pilih Storage --</option>
                        <option value="1450000" data-watt="10">Samsung 990 PRO 1TB NVMe M.2 (Rp 1.450.000)</option>
                        <option value="2750000" data-watt="12">Kingston FURY Renegade 2TB NVMe M.2 (Rp 2.750.000)</option>
                    </select>
                </div>

                <!-- Power Supply & Cooling Select -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div class="glass-panel p-4 rounded-2xl border border-cherry-500/30">
                        <label class="block text-xs font-bold text-white mb-2"><i class="fa-solid fa-plug text-cyber-cyan mr-1"></i> Power Supply (PSU)</label>
                        <select id="config-psu" onchange="updatePCConfig()" class="w-full bg-cherry-dark text-white text-xs font-mono font-bold px-3 py-2 rounded-xl border border-cyber-cyan/40">
                            <option value="0" data-psuwatt="0">-- Pilih PSU --</option>
                            <option value="1250000" data-psuwatt="650">MSI MAG A650BN 650W Bronze (Rp 1.250.000)</option>
                            <option value="2400000" data-psuwatt="850">CORSAIR RM850x Shift 850W Gold (Rp 2.400.000)</option>
                            <option value="3900000" data-psuwatt="1000">ASUS ROG Thor 1000W Platinum II (Rp 3.900.000)</option>
                        </select>
                    </div>

                    <div class="glass-panel p-4 rounded-2xl border border-cherry-500/30">
                        <label class="block text-xs font-bold text-white mb-2"><i class="fa-solid fa-fan text-cherry-400 mr-1"></i> Cooling System</label>
                        <select id="config-cooling" onchange="updatePCConfig()" class="w-full bg-cherry-dark text-white text-xs font-mono font-bold px-3 py-2 rounded-xl border border-cherry-400/40">
                            <option value="0">-- Pilih Cooling --</option>
                            <option value="850000">DeepCool AG620 ARGB Dual Tower (Rp 850.000)</option>
                            <option value="2600000">NZXT Kraken 360 RGB Cyber Liquid (Rp 2.600.000)</option>
                        </select>
                    </div>
                </div>

            </div>

            <!-- Summary & Live Compatibility Panel -->
            <div class="lg:col-span-5 glass-panel p-6 rounded-3xl border-2 border-cherry-500/50 shadow-2xl sticky top-24">
                
                <div class="flex items-center justify-between border-b border-cherry-500/20 pb-4 mb-4">
                    <h3 class="font-extrabold text-white text-base flex items-center gap-2">
                        <i class="fa-solid fa-calculator text-cherry-400"></i> Ringkasan Rakitan PC
                    </h3>
                    <span id="compat-badge" class="bg-emerald-500/20 text-emerald-300 text-[10px] font-mono font-bold px-3 py-1 rounded-full border border-emerald-500/40 flex items-center gap-1">
                        <i class="fa-solid fa-check-circle"></i> System Ready
                    </span>
                </div>

                <!-- Estimated Watt Meter -->
                <div class="mb-6 bg-cherry-dark/90 p-4 rounded-2xl border border-cherry-500/20 font-mono">
                    <div class="flex justify-between items-center text-xs mb-2">
                        <span class="text-gray-300 font-semibold">Estimasi Total Daya System:</span>
                        <span id="total-watt" class="font-bold text-cyber-cyan text-sm">0 Watt</span>
                    </div>
                    <div class="w-full bg-gray-800 h-3 rounded-full overflow-hidden p-0.5 border border-white/10">
                        <div id="watt-bar" class="bg-gradient-to-r from-cyber-cyan via-cherry-400 to-purple-600 h-full rounded-full transition-all duration-500" style="width: 0%"></div>
                    </div>
                    <p id="psu-warning" class="text-[10px] text-amber-400 mt-2 hidden"><i class="fa-solid fa-triangle-exclamation mr-1"></i> Warning: Pilih PSU dengan watt lebih tinggi dari kebutuhan system!</p>
                </div>

                <!-- Price Breakdown -->
                <div class="space-y-3 text-xs mb-6 border-b border-cherry-500/20 pb-4 font-mono">
                    <div class="flex justify-between text-gray-300">
                        <span>Total Komponen Hardware:</span>
                        <span id="subtotal-price" class="font-bold text-white">Rp 0</span>
                    </div>
                    <div class="flex justify-between text-gray-300">
                        <span>Jasa Rakit + Cable Sleeving:</span>
                        <span class="text-cyber-green font-bold">GRATIS ⚡</span>
                    </div>
                    <div class="flex justify-between text-gray-300">
                        <span>Instalasi Windows 11 Pro + Drivers:</span>
                        <span class="text-cyber-green font-bold">GRATIS ⚡</span>
                    </div>
                </div>

                <!-- Grand Total -->
                <div class="bg-gradient-to-r from-cherry-500/20 to-cyber-cyan/20 p-4 rounded-2xl border border-cherry-400/40 mb-6">
                    <span class="text-[10px] text-cherry-300 font-mono font-bold uppercase tracking-wider block">Total Estimasi Biaya</span>
                    <span id="grand-total-price" class="text-3xl font-black gradient-text-cherry block my-1">Rp 0</span>
                    <span class="text-[10px] text-gray-400 block font-mono">*Garansi Toko 3 Tahun Full Replacement & Support</span>
                </div>

                <div class="space-y-3">
                    <button onclick="saveBuildOrder()" class="w-full py-4 rounded-xl bg-gradient-to-r from-cherry-500 to-cyber-cyan text-white font-black text-xs uppercase tracking-widest shadow-lg shadow-cherry-500/40 hover:shadow-cyber-cyan/60 hover:scale-102 transition flex items-center justify-center gap-2">
                        <i class="fa-solid fa-paper-plane"></i> Kirim Order Rakitan Ini
                    </button>
                    <button onclick="resetConfigurator()" class="w-full py-2.5 rounded-xl border border-white/20 text-gray-300 font-semibold text-xs hover:bg-white/5 transition flex items-center justify-center gap-2">
                        <i class="fa-solid fa-rotate-right"></i> Reset Pilihan Komponen
                    </button>
                </div>

            </div>

        </div>

    </section>

    <!-- PC COMPATIBILITY PREVIEW TOOL -->
    <section class="py-12 px-4 sm:px-8 max-w-7xl mx-auto">
        <div class="glass-panel-neon p-8 rounded-3xl border-2 border-cherry-500/40 relative">
            <div class="flex flex-col md:flex-row items-center justify-between gap-6">
                <div>
                    <span class="bg-cyber-cyan/20 text-cyber-cyan text-[10px] font-mono font-black px-3 py-1 rounded-full uppercase tracking-wider border border-cyber-cyan/30">INSTANT HARDWARE VALIDATOR</span>
                    <h3 class="text-2xl font-black text-white mt-2">Cek Kompatibilitas Socket Processor & Motherboard</h3>
                    <p class="text-xs text-gray-300 mt-1">Uji apakah Processor pilihanmu pas dengan Motherboard tanpa khawatir salah pin!</p>
                </div>

                <div class="flex flex-wrap items-center gap-3 w-full md:w-auto font-mono">
                    <select id="quick-cpu-socket" class="bg-cherry-dark text-xs px-4 py-3 rounded-xl border border-cherry-500/40 font-bold text-cherry-300">
                        <option value="LGA1700">Intel LGA 1700 (12/13/14th Gen)</option>
                        <option value="AM5">AMD AM5 (Ryzen 7000/8000 Series)</option>
                        <option value="AM4">AMD AM4 (Ryzen 3000/5000 Series)</option>
                    </select>
                    
                    <span class="text-cherry-400 font-black text-lg"><i class="fa-solid fa-arrow-right-arrow-left"></i></span>

                    <select id="quick-mb-socket" class="bg-cherry-dark text-xs px-4 py-3 rounded-xl border border-cyber-cyan/40 font-bold text-cyber-cyan">
                        <option value="LGA1700">Motherboard Chipset Z790/B760 (LGA1700)</option>
                        <option value="AM5">Motherboard Chipset X670/B650 (AM5)</option>
                        <option value="AM4">Motherboard Chipset B550/A520 (AM4)</option>
                    </select>

                    <button onclick="checkSocketCompatibility()" class="px-6 py-3 rounded-xl bg-cyber-cyan text-cherry-dark font-black text-xs uppercase tracking-wider hover:bg-cyan-300 transition">Test Fit!</button>
                </div>
            </div>
            <div id="quick-compat-result" class="mt-4 p-4 rounded-xl bg-cherry-dark/90 border border-white/10 hidden text-xs font-bold font-mono text-center"></div>
        </div>
    </section>

    <!-- FULL HARDWARE COMPONENT CATALOG -->
    <section id="catalog" class="py-20 px-4 sm:px-8 max-w-7xl mx-auto">
        
        <div class="flex flex-col md:flex-row md:items-end justify-between mb-12 gap-6">
            <div>
                <span class="text-xs font-mono font-bold text-cherry-400 uppercase tracking-widest block mb-2">⚡ Monster Hardware Specs</span>
                <h2 class="text-3xl sm:text-5xl font-black text-white uppercase">Katalog <span class="gradient-text-cherry">Hardware PC</span></h2>
            </div>
            
            <div class="flex flex-wrap gap-2 font-mono text-xs">
                <button onclick="filterCatalog('all')" class="cat-btn active px-4 py-2 rounded-xl font-bold bg-cherry-500 text-white shadow-lg transition">Semua</button>
                <button onclick="filterCatalog('gpu')" class="cat-btn px-4 py-2 rounded-xl font-bold glass-panel hover:bg-cherry-500/20 text-gray-300 transition">VGA / GPU</button>
                <button onclick="filterCatalog('cpu')" class="cat-btn px-4 py-2 rounded-xl font-bold glass-panel hover:bg-cherry-500/20 text-gray-300 transition">Processor</button>
                <button onclick="filterCatalog('motherboard')" class="cat-btn px-4 py-2 rounded-xl font-bold glass-panel hover:bg-cherry-500/20 text-gray-300 transition">Motherboard</button>
                <button onclick="filterCatalog('cooling')" class="cat-btn px-4 py-2 rounded-xl font-bold glass-panel hover:bg-cherry-500/20 text-gray-300 transition">Cooling</button>
            </div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            
            <!-- Product Card 1 -->
            <div class="product-item gpu glass-panel p-5 rounded-3xl border border-cherry-500/30 interactive-card relative group flex flex-col justify-between">
                <span class="absolute top-4 left-4 bg-cherry-500 text-white font-mono font-bold text-[9px] px-2.5 py-1 rounded-full z-10">CYBER EDITION</span>
                
                <div class="relative overflow-hidden rounded-2xl mb-4 bg-cherry-dark/80 p-4">
                    <img src="https://images.unsplash.com/photo-1591488320449-011701bb6704?auto=format&fit=crop&w=600&q=80" alt="RTX 4070 Ti Super" class="w-full h-44 object-contain group-hover:scale-110 transition-transform duration-500">
                </div>

                <div>
                    <span class="text-[10px] text-cyber-cyan font-mono font-bold uppercase tracking-wider block">NVIDIA GeForce</span>
                    <h4 class="font-extrabold text-white text-base mt-1 group-hover:text-cherry-300 transition">RTX 4070 Ti Super Sakura 16GB</h4>
                    <p class="text-xs text-gray-400 mt-1 line-clamp-2">Dual fan ARGB sakura edition, DLSS 3.5 support, Ultra 4K Gaming.</p>
                </div>

                <div class="mt-4 pt-4 border-t border-cherry-500/20 flex items-center justify-between font-mono">
                    <div>
                        <span class="text-[10px] text-gray-400 block line-through">Rp 14.200.000</span>
                        <span class="text-lg font-black text-cherry-400">Rp 12.800.000</span>
                    </div>
                    <button onclick="addToCart('RTX 4070 Ti Super Sakura', 12800000)" class="w-10 h-10 rounded-xl bg-cherry-500 hover:bg-cherry-600 text-white flex items-center justify-center transition shadow-md">
                        <i class="fa-solid fa-cart-plus"></i>
                    </button>
                </div>
            </div>

            <!-- Product Card 2 -->
            <div class="product-item cpu glass-panel p-5 rounded-3xl border border-cherry-500/30 interactive-card relative group flex flex-col justify-between">
                <span class="absolute top-4 left-4 bg-cyber-cyan text-cherry-dark font-mono font-bold text-[9px] px-2.5 py-1 rounded-full z-10">KING OF GAMING</span>
                
                <div class="relative overflow-hidden rounded-2xl mb-4 bg-cherry-dark/80 p-4">
                    <img src="https://images.unsplash.com/photo-1555680202-c86f0e12f086?auto=format&fit=crop&w=600&q=80" alt="AMD Ryzen 7 7800X3D" class="w-full h-44 object-contain group-hover:scale-110 transition-transform duration-500">
                </div>

                <div>
                    <span class="text-[10px] text-purple-400 font-mono font-bold uppercase tracking-wider block">AMD Processor</span>
                    <h4 class="font-extrabold text-white text-base mt-1 group-hover:text-cherry-300 transition">Ryzen 7 7800X3D 8-Core 16-Thread</h4>
                    <p class="text-xs text-gray-400 mt-1 line-clamp-2">Rajanya Gaming CPU dengan 3D V-Cache Technology.</p>
                </div>

                <div class="mt-4 pt-4 border-t border-cherry-500/20 flex items-center justify-between font-mono">
                    <div>
                        <span class="text-[10px] text-gray-400 block line-through">Rp 5.800.000</span>
                        <span class="text-lg font-black text-cherry-400">Rp 5.100.000</span>
                    </div>
                    <button onclick="addToCart('AMD Ryzen 7 7800X3D', 5100000)" class="w-10 h-10 rounded-xl bg-cherry-500 hover:bg-cherry-600 text-white flex items-center justify-center transition shadow-md">
                        <i class="fa-solid fa-cart-plus"></i>
                    </button>
                </div>
            </div>

            <!-- Product Card 3 -->
            <div class="product-item motherboard glass-panel p-5 rounded-3xl border border-cherry-500/30 interactive-card relative group flex flex-col justify-between">
                <div class="relative overflow-hidden rounded-2xl mb-4 bg-cherry-dark/80 p-4">
                    <img src="https://images.unsplash.com/photo-1518770660439-4636190af475?auto=format&fit=crop&w=600&q=80" alt="ASUS ROG Strix Motherboard" class="w-full h-44 object-contain group-hover:scale-110 transition-transform duration-500">
                </div>

                <div>
                    <span class="text-[10px] text-pink-400 font-mono font-bold uppercase tracking-wider block">ASUS ROG</span>
                    <h4 class="font-extrabold text-white text-base mt-1 group-hover:text-cherry-300 transition">Strix Z790-A Gaming Wi-Fi</h4>
                    <p class="text-xs text-gray-400 mt-1 line-clamp-2">PCB Cyber Dark, PCIe 5.0, WiFi 6E Built-in.</p>
                </div>

                <div class="mt-4 pt-4 border-t border-cherry-500/20 flex items-center justify-between font-mono">
                    <div>
                        <span class="text-lg font-black text-cherry-400">Rp 3.400.000</span>
                    </div>
                    <button onclick="addToCart('ASUS ROG Z790-A', 3400000)" class="w-10 h-10 rounded-xl bg-cherry-500 hover:bg-cherry-600 text-white flex items-center justify-center transition shadow-md">
                        <i class="fa-solid fa-cart-plus"></i>
                    </button>
                </div>
            </div>

            <!-- Product Card 4 -->
            <div class="product-item cooling glass-panel p-5 rounded-3xl border border-cherry-500/30 interactive-card relative group flex flex-col justify-between">
                <span class="absolute top-4 left-4 bg-purple-600 text-white font-mono font-bold text-[9px] px-2.5 py-1 rounded-full z-10">AIO LIQUID</span>

                <div class="relative overflow-hidden rounded-2xl mb-4 bg-cherry-dark/80 p-4">
                    <img src="https://images.unsplash.com/photo-1544652478-6653e09f18a2?auto=format&fit=crop&w=600&q=80" alt="NZXT Kraken Liquid Cooler" class="w-full h-44 object-contain group-hover:scale-110 transition-transform duration-500">
                </div>

                <div>
                    <span class="text-[10px] text-cyber-cyan font-mono font-bold uppercase tracking-wider block">NZXT</span>
                    <h4 class="font-extrabold text-white text-base mt-1 group-hover:text-cherry-300 transition">Kraken 360 RGB Cyber Liquid</h4>
                    <p class="text-xs text-gray-400 mt-1 line-clamp-2">Layar LCD customizable dengan GIF animasi & info suhu realtime.</p>
                </div>

                <div class="mt-4 pt-4 border-t border-cherry-500/20 flex items-center justify-between font-mono">
                    <div>
                        <span class="text-lg font-black text-cherry-400">Rp 2.600.000</span>
                    </div>
                    <button onclick="addToCart('NZXT Kraken 360 Liquid', 2600000)" class="w-10 h-10 rounded-xl bg-cherry-500 hover:bg-cherry-600 text-white flex items-center justify-center transition shadow-md">
                        <i class="fa-solid fa-cart-plus"></i>
                    </button>
                </div>
            </div>

        </div>
    </section>

    <!-- NETWORKING ESSENTIALS CATALOG & WI-FI SETUP SERVICES -->
    <section id="networking" class="py-20 px-4 sm:px-8 max-w-7xl mx-auto border-t border-cherry-500/20">
        
        <div class="text-center max-w-3xl mx-auto mb-16">
            <span class="bg-cyber-cyan/20 text-cyber-cyan border border-cyber-cyan/30 text-xs font-mono font-bold px-4 py-1.5 rounded-full uppercase tracking-widest inline-block mb-3">
                🌐 High Speed Connectivity
            </span>
            <h2 class="text-3xl sm:text-5xl font-black text-white uppercase">Networking <span class="text-cyber-cyan">Essentials & Setup</span></h2>
            <p class="text-gray-300 text-xs sm:text-base mt-2 font-normal">
                Solusi jaringan tanpa lag untuk Home Gaming Setup, Studio Streamer, hingga Kantor Multi-Lantai.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            
            <!-- Networking Card 1 -->
            <div class="glass-panel p-6 rounded-3xl border border-cyber-cyan/40 interactive-card relative flex flex-col justify-between">
                <div>
                    <div class="w-14 h-14 rounded-2xl bg-cyber-cyan/20 text-cyber-cyan flex items-center justify-center text-2xl mb-6 shadow-lg shadow-cyber-cyan/20">
                        <i class="fa-solid fa-wifi"></i>
                    </div>
                    <h3 class="text-xl font-extrabold text-white mb-2">Wi-Fi 7 Gaming Router Ultra</h3>
                    <p class="text-xs text-gray-300 leading-relaxed mb-4">
                        Kecepatan hingga 9600 Mbps, Tri-Band Quad-Core CPU, didesain untuk latency 1ms bebas buffering saat live streaming 4K.
                    </p>
                    <ul class="text-xs text-gray-300 space-y-2 mb-6 font-mono">
                        <li class="flex items-center gap-2"><i class="fa-solid fa-check text-cyber-cyan"></i> Coverage s/d 350 m²</li>
                        <li class="flex items-center gap-2"><i class="fa-solid fa-check text-cyber-cyan"></i> VPN Fusion Built-in</li>
                        <li class="flex items-center gap-2"><i class="fa-solid fa-check text-cyber-cyan"></i> Port 2.5G Dual WAN</li>
                    </ul>
                </div>

                <div class="pt-4 border-t border-white/10 flex items-center justify-between font-mono">
                    <span class="text-xl font-black text-cyber-cyan">Rp 3.850.000</span>
                    <button onclick="addToCart('Wi-Fi 7 Gaming Router', 3850000)" class="px-4 py-2 rounded-xl bg-cyber-cyan text-cherry-dark font-bold text-xs hover:bg-cyan-300 transition">Beli Router</button>
                </div>
            </div>

            <!-- Networking Card 2 -->
            <div class="glass-panel-neon p-6 rounded-3xl border-2 border-cherry-500/60 interactive-card relative flex flex-col justify-between shadow-2xl">
                <span class="absolute -top-3 right-6 bg-cherry-500 text-white font-mono font-bold text-[9px] px-3 py-1 rounded-full uppercase tracking-widest shadow-md">REKOMENDASI RUMAH</span>
                <div>
                    <div class="w-14 h-14 rounded-2xl bg-cherry-500/20 text-cherry-400 flex items-center justify-center text-2xl mb-6 shadow-lg shadow-cherry-500/30">
                        <i class="fa-solid fa-network-wired"></i>
                    </div>
                    <h3 class="text-xl font-extrabold text-white mb-2">Home Mesh Installation Package</h3>
                    <p class="text-xs text-gray-300 leading-relaxed mb-4">
                        Paket Pemasangan Wi-Fi Mesh Seamless untuk rumah 2-3 lantai. Sinyal full bar di setiap sudut ruangan!
                    </p>
                    <ul class="text-xs text-gray-200 space-y-2 mb-6 font-mono">
                        <li class="flex items-center gap-2"><i class="fa-solid fa-check text-cherry-400"></i> Include 3 Unit Mesh Wi-Fi 6</li>
                        <li class="flex items-center gap-2"><i class="fa-solid fa-check text-cherry-400"></i> Gratis Tarik Kabel LAN Cat6 50m</li>
                        <li class="flex items-center gap-2"><i class="fa-solid fa-check text-cherry-400"></i> Survey & Tuning Sinyal Gratis</li>
                    </ul>
                </div>

                <div class="pt-4 border-t border-cherry-500/30 flex items-center justify-between font-mono">
                    <span class="text-xl font-black text-cherry-300">Rp 2.950.000</span>
                    <a href="#request-form" class="px-4 py-2 rounded-xl bg-cherry-500 text-white font-bold text-xs hover:bg-cherry-600 transition">Booking Install</a>
                </div>
            </div>

            <!-- Networking Card 3 -->
            <div class="glass-panel p-6 rounded-3xl border border-purple-500/40 interactive-card relative flex flex-col justify-between">
                <div>
                    <div class="w-14 h-14 rounded-2xl bg-purple-500/20 text-purple-400 flex items-center justify-center text-2xl mb-6 shadow-lg shadow-purple-500/20">
                        <i class="fa-solid fa-server"></i>
                    </div>
                    <h3 class="text-xl font-extrabold text-white mb-2">Smart Managed Gigabit Switch</h3>
                    <p class="text-xs text-gray-300 leading-relaxed mb-4">
                        16-Port PoE+ Managed Switch untuk distribusi bandwidth IP Camera, Access Point, dan Workstation office.
                    </p>
                    <ul class="text-xs text-gray-300 space-y-2 mb-6 font-mono">
                        <li class="flex items-center gap-2"><i class="fa-solid fa-check text-purple-400"></i> 16x Port 10/100/1000 Mbps</li>
                        <li class="flex items-center gap-2"><i class="fa-solid fa-check text-purple-400"></i> 250W Total PoE Power</li>
                        <li class="flex items-center gap-2"><i class="fa-solid fa-check text-purple-400"></i> VLAN & QoS Management</li>
                    </ul>
                </div>

                <div class="pt-4 border-t border-white/10 flex items-center justify-between font-mono">
                    <span class="text-xl font-black text-purple-300">Rp 2.450.000</span>
                    <button onclick="addToCart('Managed Gigabit Switch 16P', 2450000)" class="px-4 py-2 rounded-xl bg-purple-600 text-white font-bold text-xs hover:bg-purple-700 transition">Beli Switch</button>
                </div>
            </div>

        </div>

    </section>

    <!-- READY TO USE PC BUNDLES -->
    <section id="bundles" class="py-20 px-4 sm:px-8 max-w-7xl mx-auto">
        <div class="text-center max-w-3xl mx-auto mb-14">
            <span class="bg-cherry-500/20 text-cherry-300 border border-cherry-500/30 text-xs font-mono font-bold px-4 py-1.5 rounded-full uppercase tracking-widest inline-block mb-3">
                🎁 Siap Pakai Langsung Game
            </span>
            <h2 class="text-3xl sm:text-5xl font-black text-white uppercase">Ready-to-Use <span class="gradient-text-cherry">PC Rigs</span></h2>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            
            <!-- Bundle 1 -->
            <div class="glass-panel p-6 rounded-3xl border border-cherry-500/30 interactive-card relative overflow-hidden flex flex-col justify-between">
                <div>
                    <img src="https://images.unsplash.com/photo-1587202372775-e229f172b9d7?auto=format&fit=crop&w=600&q=80" alt="Cyber Sakura PC" class="w-full h-48 object-cover rounded-2xl mb-4">
                    <span class="bg-cherry-500/20 text-cherry-300 text-[9px] font-mono font-bold px-2.5 py-1 rounded border border-cherry-500/30 uppercase">CYBER SAKURA SETUP</span>
                    <h3 class="text-xl font-black text-white mt-2">Bundle "Sakura Streamer Pro"</h3>
                    <p class="text-xs text-gray-300 mt-1 mb-4">Ryzen 7 7800X3D / RTX 4070 Ti Sakura / 32GB DDR5 / 1TB SSD NVMe / Liquid Cooling 360</p>
                    <div class="bg-cherry-dark/90 p-3 rounded-xl border border-white/10 text-xs font-mono space-y-1">
                        <div class="flex justify-between text-gray-300"><span>Streaming 1080p:</span> <span class="text-cyber-green font-bold">Ultra Smooth</span></div>
                        <div class="flex justify-between text-gray-300"><span>Valorant 1080p:</span> <span class="text-cyber-cyan font-bold">450+ FPS</span></div>
                    </div>
                </div>

                <div class="mt-6 pt-4 border-t border-cherry-500/20 flex items-center justify-between font-mono">
                    <div>
                        <span class="text-2xl font-black text-cherry-400">Rp 26.500.000</span>
                    </div>
                    <button onclick="addToCart('Bundle Sakura Streamer Pro', 26500000)" class="px-5 py-2.5 rounded-xl bg-cherry-500 hover:bg-cherry-600 text-white font-bold text-xs uppercase shadow-md">Pesan Bundle</button>
                </div>
            </div>

            <!-- Bundle 2 -->
            <div class="glass-panel p-6 rounded-3xl border-2 border-cyber-cyan/50 interactive-card relative overflow-hidden flex flex-col justify-between shadow-xl">
                <span class="absolute top-4 right-4 bg-cyber-cyan text-cherry-dark font-mono font-black text-[9px] px-3 py-1 rounded-full uppercase">EXTREME BEAST</span>
                <div>
                    <img src="https://images.unsplash.com/photo-1547082299-de196ea013d6?auto=format&fit=crop&w=600&q=80" alt="Cyberpunk Beast Build" class="w-full h-48 object-cover rounded-2xl mb-4">
                    <span class="bg-cyber-cyan/20 text-cyber-cyan text-[9px] font-mono font-bold px-2.5 py-1 rounded border border-cyber-cyan/30 uppercase">Extreme 4K Gaming</span>
                    <h3 class="text-xl font-black text-white mt-2">Bundle "Cyberpunk Beast RTX 4090"</h3>
                    <p class="text-xs text-gray-300 mt-1 mb-4">Intel i9 14900K / RTX 4090 24GB / 64GB DDR5 / 2TB Gen5 SSD / 1000W Platinum PSU</p>
                    <div class="bg-cherry-dark/90 p-3 rounded-xl border border-white/10 text-xs font-mono space-y-1">
                        <div class="flex justify-between text-gray-300"><span>Cyberpunk 2077 RayTracing:</span> <span class="text-cyber-cyan font-bold">120+ FPS 4K</span></div>
                        <div class="flex justify-between text-gray-300"><span>Render 3D Blender:</span> <span class="text-cyber-green font-bold">Lightning Fast</span></div>
                    </div>
                </div>

                <div class="mt-6 pt-4 border-t border-cyber-cyan/20 flex items-center justify-between font-mono">
                    <div>
                        <span class="text-2xl font-black text-cyber-cyan">Rp 48.900.000</span>
                    </div>
                    <button onclick="addToCart('Bundle Cyberpunk Beast RTX 4090', 48900000)" class="px-5 py-2.5 rounded-xl bg-cyber-cyan text-cherry-dark font-bold text-xs uppercase shadow-md">Pesan Bundle</button>
                </div>
            </div>

            <!-- Bundle 3 -->
            <div class="glass-panel p-6 rounded-3xl border border-purple-500/30 interactive-card relative overflow-hidden flex flex-col justify-between">
                <div>
                    <img src="https://images.unsplash.com/photo-1616588589676-62b3bd4ff6d2?auto=format&fit=crop&w=600&q=80" alt="Budget Gaming Setup PC" class="w-full h-48 object-cover rounded-2xl mb-4">
                    <span class="bg-purple-500/20 text-purple-300 text-[9px] font-mono font-bold px-2.5 py-1 rounded border border-purple-500/30 uppercase">Entry Level</span>
                    <h3 class="text-xl font-black text-white mt-2">Bundle "Sakura Tech Starter"</h3>
                    <p class="text-xs text-gray-300 mt-1 mb-4">Core i5 14600K / RTX 4060 Ti / 16GB RAM / 1TB SSD / 650W Bronze PSU</p>
                    <div class="bg-cherry-dark/90 p-3 rounded-xl border border-white/10 text-xs font-mono space-y-1">
                        <div class="flex justify-between text-gray-300"><span>Genshin Impact Ultra:</span> <span class="text-purple-300 font-bold">60 FPS Stable</span></div>
                        <div class="flex justify-between text-gray-300"><span>Tugas Coding & Editing:</span> <span class="text-cyber-green font-bold">Lancar Jaya</span></div>
                    </div>
                </div>

                <div class="mt-6 pt-4 border-t border-purple-500/20 flex items-center justify-between font-mono">
                    <div>
                        <span class="text-2xl font-black text-purple-300">Rp 13.900.000</span>
                    </div>
                    <button onclick="addToCart('Bundle Sakura Tech Starter', 13900000)" class="px-5 py-2.5 rounded-xl bg-purple-600 hover:bg-purple-700 text-white font-bold text-xs uppercase shadow-md">Pesan Bundle</button>
                </div>
            </div>

        </div>
    </section>

    <!-- BATTLESTATION SETUP & CUSTOMER GALLERY SHOWCASE -->
    <section id="gallery" class="py-20 px-4 sm:px-8 max-w-7xl mx-auto border-t border-cherry-500/20">
        <div class="text-center max-w-3xl mx-auto mb-14">
            <span class="bg-cherry-500/20 text-cherry-300 border border-cherry-500/30 text-xs font-mono font-bold px-4 py-1.5 rounded-full uppercase tracking-widest inline-block mb-3">
                📸 Inspirasi Setup Battlestation
            </span>
            <h2 class="text-3xl sm:text-5xl font-black text-white uppercase">Battlestation <span class="gradient-text-cherry">Showcase</span></h2>
            <p class="text-gray-300 text-xs sm:text-base mt-2 font-normal">Hasil karya rakitan PC dan instalasi jaringan dari client setia SakuraTech.</p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
            
            <div class="group relative rounded-3xl overflow-hidden glass-panel border border-cherry-500/30 h-72">
                <img src="https://images.unsplash.com/photo-1593305841991-05c297ba4575?auto=format&fit=crop&w=800&q=80" alt="Cyber Gaming Battlestation" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                <div class="absolute inset-0 bg-gradient-to-t from-cherry-dark via-cherry-dark/40 to-transparent opacity-0 group-hover:opacity-100 transition-opacity p-6 flex flex-col justify-end">
                    <span class="text-xs font-mono font-bold text-cherry-400 uppercase">Cyber Rig 4090</span>
                    <h4 class="font-extrabold text-white text-base">Battlestation Setup Bro Rendy (Jakarta)</h4>
                </div>
            </div>

            <div class="group relative rounded-3xl overflow-hidden glass-panel border border-cyber-cyan/30 h-72">
                <img src="https://images.unsplash.com/photo-1603481588273-2f908a9a7a1b?auto=format&fit=crop&w=800&q=80" alt="Cyberpunk Neon PC Room" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                <div class="absolute inset-0 bg-gradient-to-t from-cherry-dark via-cherry-dark/40 to-transparent opacity-0 group-hover:opacity-100 transition-opacity p-6 flex flex-col justify-end">
                    <span class="text-xs font-mono font-bold text-cyber-cyan uppercase">Custom Waterloop</span>
                    <h4 class="font-extrabold text-white text-base">Cyberpunk Room Bro Dimas (Bandung)</h4>
                </div>
            </div>

            <div class="group relative rounded-3xl overflow-hidden glass-panel border border-purple-500/30 h-72">
                <img src="https://images.unsplash.com/photo-1563770660941-20978e870e26?auto=format&fit=crop&w=800&q=80" alt="Server Room Rack Networking" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                <div class="absolute inset-0 bg-gradient-to-t from-cherry-dark via-cherry-dark/40 to-transparent opacity-0 group-hover:opacity-100 transition-opacity p-6 flex flex-col justify-end">
                    <span class="text-xs font-mono font-bold text-purple-400 uppercase">Server & Wi-Fi Mesh</span>
                    <h4 class="font-extrabold text-white text-base">Instalasi Server Office PT Cyber Tech</h4>
                </div>
            </div>

        </div>
    </section>

    <!-- CUSTOM PC BUILD REQUEST FORM -->
    <section id="request-form" class="py-20 px-4 sm:px-8 max-w-5xl mx-auto">
        <div class="glass-panel-neon p-8 sm:p-12 rounded-3xl border-2 border-cherry-500/50 shadow-2xl relative">
            
            <div class="text-center max-w-xl mx-auto mb-10">
                <span class="bg-cherry-500 text-white font-mono font-bold text-[10px] px-3 py-1 rounded-full uppercase tracking-wider">KONSULTASI GRATIS</span>
                <h2 class="text-3xl font-black text-white uppercase mt-2">Formulir Request Rakit PC Custom</h2>
                <p class="text-xs text-gray-300 mt-1">Punya budget atau spesifikasi khusus? Tim spesialis SakuraTech siap meracikkan penawaran terbaik untukmu!</p>
            </div>

            <form onsubmit="handleRequestSubmit(event)" class="space-y-6">
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-xs font-bold text-gray-200 mb-2">Nama Lengkap *</label>
                        <input name="customer_name" type="text" required placeholder="Contoh: Alex Pratama" class="w-full bg-cherry-dark/90 text-white text-xs px-4 py-3 rounded-xl border border-cherry-500/40 focus:outline-none focus:border-cyber-cyan">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-gray-200 mb-2">Nomor WhatsApp *</label>
                        <input name="customer_phone" type="tel" required placeholder="0812xxxxxxx" class="w-full bg-cherry-dark/90 text-white text-xs px-4 py-3 rounded-xl border border-cherry-500/40 focus:outline-none focus:border-cyber-cyan">
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-xs font-bold text-gray-200 mb-2">Kebutuhan Utama</label>
                        <select name="customer_need" class="w-full bg-cherry-dark/90 text-cherry-300 text-xs px-4 py-3 rounded-xl border border-cherry-500/40 focus:outline-none font-mono">
                            <option>Gaming 4K & Live Streaming</option>
                            <option>3D Rendering & Editing Video</option>
                            <option>Instalasi Jaringan Wi-Fi Rumah/Kantor</option>
                            <option>Rakit PC Minimalis High Performance</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-gray-200 mb-2">Estimasi Budget (Rp)</label>
                        <input name="customer_budget" type="text" placeholder="Contoh: 20.000.000" class="w-full bg-cherry-dark/90 text-white text-xs px-4 py-3 rounded-xl border border-cherry-500/40 focus:outline-none">
                    </div>
                </div>

                <div>
                    <label class="block text-xs font-bold text-gray-200 mb-2">Catatan / Spesifikasi Tambahan</label>
                    <textarea name="customer_notes" rows="3" placeholder="Tuliskan jika ingin tema warna Cyber Dark, Water Cooling Dual Loop, atau request khusus lainnya..." class="w-full bg-cherry-dark/90 text-white text-xs px-4 py-3 rounded-xl border border-cherry-500/40 focus:outline-none"></textarea>
                </div>

                <button type="submit" class="w-full py-4 rounded-xl bg-gradient-to-r from-cherry-500 via-cherry-600 to-cyber-cyan text-white font-black text-xs uppercase tracking-wider shadow-lg shadow-cherry-500/40 hover:scale-102 transition">
                    <i class="fa-solid fa-paper-plane mr-2"></i> Kirim Request Konsultasi
                </button>
            </form>
        </div>
    </section>

    <!-- BEGINNER GUIDES & TECH TIPS -->
    <section id="guides" class="py-20 px-4 sm:px-8 max-w-7xl mx-auto border-t border-cherry-500/20">
        <div class="text-center max-w-3xl mx-auto mb-14">
            <span class="bg-purple-500/20 text-purple-300 border border-purple-500/30 text-xs font-mono font-bold px-4 py-1.5 rounded-full uppercase tracking-widest inline-block mb-3">
                📚 Edukasi Hardware
            </span>
            <h2 class="text-3xl sm:text-5xl font-black text-white uppercase">Panduan & <span class="text-purple-400">Tips Pemula</span></h2>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            
            <div class="glass-panel p-6 rounded-3xl border border-cherry-500/30 interactive-card">
                <span class="text-3xl mb-4 block">⚡</span>
                <span class="text-[10px] text-cherry-400 font-mono font-bold uppercase tracking-wider">Tips Hardware</span>
                <h4 class="font-extrabold text-white text-lg mt-1 mb-2">Cara Memilih PSU yang Tepat Agar Komponen Awet</h4>
                <p class="text-xs text-gray-300 leading-relaxed">Pelajari arti sertifikasi 80 Plus Bronze vs Gold dan pentingnya memilih headroom watt daya yang cukup.</p>
            </div>

            <div class="glass-panel p-6 rounded-3xl border border-cyber-cyan/30 interactive-card">
                <span class="text-3xl mb-4 block">🌐</span>
                <span class="text-[10px] text-cyber-cyan font-mono font-bold uppercase tracking-wider">Tips Network</span>
                <h4 class="font-extrabold text-white text-lg mt-1 mb-2">Perbedaan Wi-Fi 6 vs Wi-Fi 7: Mana yang Kamu Butuhkan?</h4>
                <p class="text-xs text-gray-300 leading-relaxed">Ulasan mendalam mengenai lebar pita 320MHz dan Multi-Link Operation (MLO) untuk koneksi anti-lag.</p>
            </div>

            <div class="glass-panel p-6 rounded-3xl border border-purple-500/30 interactive-card">
                <span class="text-3xl mb-4 block">❄️</span>
                <span class="text-[10px] text-purple-400 font-mono font-bold uppercase tracking-wider">Tips Cooling</span>
                <h4 class="font-extrabold text-white text-lg mt-1 mb-2">Air Cooling vs AIO Liquid Cooler: Mana Lebih Dingin?</h4>
                <p class="text-xs text-gray-300 leading-relaxed">Bandingkan performa pendingin udara dual tower vs pendingin cair 360mm untuk CPU Intel/AMD modern.</p>
            </div>

        </div>
    </section>

    <!-- FAQ SECTION -->
    <section id="faq" class="py-20 px-4 sm:px-8 max-w-4xl mx-auto">
        <div class="text-center mb-12">
            <span class="bg-cherry-500/20 text-cherry-300 text-xs font-mono font-bold px-4 py-1.5 rounded-full uppercase tracking-widest inline-block mb-3">❓ FAQ System</span>
            <h2 class="text-3xl sm:text-4xl font-black text-white uppercase">Frequently Asked <span class="gradient-text-cherry">Questions</span></h2>
        </div>

        <div class="space-y-4">
            
            <div class="glass-panel rounded-2xl border border-cherry-500/30 overflow-hidden">
                <button onclick="toggleFAQ(this)" class="w-full p-5 text-left font-bold text-white text-sm flex justify-between items-center">
                    <span>Apakah bisa custom tema warna komponen Cyber Dark & ARGB?</span>
                    <i class="fa-solid fa-chevron-down text-cherry-400 transition-transform"></i>
                </button>
                <div class="px-5 pb-5 text-xs text-gray-300 hidden leading-relaxed border-t border-cherry-500/20 pt-3">
                    Tentu saja! Kami memiliki koleksi khusus komponen bertema Cyber Dark, Neon Cyan, dan ARGB custom cable sleeve. Kami merakit dengan estetika tinggi dan cable management rapi!
                </div>
            </div>

            <div class="glass-panel rounded-2xl border border-cherry-500/30 overflow-hidden">
                <button onclick="toggleFAQ(this)" class="w-full p-5 text-left font-bold text-white text-sm flex justify-between items-center">
                    <span>Berapa lama garansi rakitan PC di SakuraTech?</span>
                    <i class="fa-solid fa-chevron-down text-cherry-400 transition-transform"></i>
                </button>
                <div class="px-5 pb-5 text-xs text-gray-300 hidden leading-relaxed border-t border-cherry-500/20 pt-3">
                    Setiap unit PC rakitan mendapatkan garansi toko 3 Tahun Full Support (Garansi part menyesuaikan distributor resmi 1-5 tahun). Jika ada kendala, kami siap klaim garansi gratis.
                </div>
            </div>

            <div class="glass-panel rounded-2xl border border-cherry-500/30 overflow-hidden">
                <button onclick="toggleFAQ(this)" class="w-full p-5 text-left font-bold text-white text-sm flex justify-between items-center">
                    <span>Apakah menerima jasa instalasi Wi-Fi Mesh ke luar kota?</span>
                    <i class="fa-solid fa-chevron-down text-cherry-400 transition-transform"></i>
                </button>
                <div class="px-5 pb-5 text-xs text-gray-300 hidden leading-relaxed border-t border-cherry-500/20 pt-3">
                    Saat ini layanan survey dan instalasi jaringan fisik langsung mencakup area JABODETABEK & Bandung. Untuk pengiriman unit router terkonfigurasi siap pakai (Plug & Play) melayani seluruh Indonesia!
                </div>
            </div>

        </div>
    </section>

    <!-- FOOTER -->
    <footer class="bg-cherry-dark border-t border-cherry-500/20 pt-16 pb-12 px-4 sm:px-8 relative z-10">
        <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-12 gap-10 mb-12">
            
            <div class="md:col-span-5 space-y-4">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 bg-gradient-to-tr from-cherry-500 to-cyber-cyan rounded-xl flex items-center justify-center text-white text-xl shadow-lg">
                        <i class="fa-solid fa-microchip"></i>
                    </div>
                    <span class="text-2xl font-black gradient-text-cherry uppercase">SAKURATECH</span>
                </div>
                <p class="text-xs text-gray-400 leading-relaxed max-w-sm">
                    Pusat perakitan PC gaming custom bertema Cyber-Sakura & spesialis instalasi jaringan komputer terdepan. Performa tinggi dengan estetika penuh warna!
                </p>
                <div class="flex items-center gap-3 text-cherry-400 pt-2">
                    <a href="#" class="w-9 h-9 rounded-xl bg-white/5 border border-cherry-500/30 flex items-center justify-center hover:bg-cherry-500 hover:text-white transition"><i class="fa-brands fa-instagram"></i></a>
                    <a href="#" class="w-9 h-9 rounded-xl bg-white/5 border border-cherry-500/30 flex items-center justify-center hover:bg-cherry-500 hover:text-white transition"><i class="fa-brands fa-youtube"></i></a>
                    <a href="#" class="w-9 h-9 rounded-xl bg-white/5 border border-cherry-500/30 flex items-center justify-center hover:bg-cherry-500 hover:text-white transition"><i class="fa-brands fa-tiktok"></i></a>
                    <a href="#" class="w-9 h-9 rounded-xl bg-white/5 border border-cherry-500/30 flex items-center justify-center hover:bg-cherry-500 hover:text-white transition"><i class="fa-brands fa-discord"></i></a>
                </div>
            </div>

            <div class="md:col-span-3 space-y-3 font-mono">
                <h4 class="font-extrabold text-white text-sm uppercase tracking-wider">Quick Links</h4>
                <ul class="space-y-2 text-xs text-gray-400">
                    <li><a href="#pc-configurator" class="hover:text-cherry-400 transition">Studio Rakit PC</a></li>
                    <li><a href="#catalog" class="hover:text-cherry-400 transition">Katalog Component Hardware</a></li>
                    <li><a href="#networking" class="hover:text-cherry-400 transition">Paket Wi-Fi & Switch</a></li>
                    <li><a href="#bundles" class="hover:text-cherry-400 transition">PC Bundles Siap Game</a></li>
                    <li><a href="#gallery" class="hover:text-cherry-400 transition">Galeri Hasil Rakitan</a></li>
                </ul>
            </div>

            <div class="md:col-span-4 space-y-4">
                <h4 class="font-extrabold text-white text-sm uppercase tracking-wider font-mono">Newsletter Cyber Club</h4>
                <p class="text-xs text-gray-400">Dapatkan update promo diskon hardware dan voucher gratis ongkir setiap minggu!</p>
                <div class="flex gap-2">
                    <input type="email" placeholder="Masukkan Email-mu..." class="w-full bg-white/5 text-xs px-4 py-3 rounded-xl border border-cherry-500/30 focus:outline-none focus:border-cherry-400 text-white">
                    <button onclick="triggerConfetti()" class="px-5 py-3 rounded-xl bg-cherry-500 text-white font-bold text-xs hover:bg-cherry-600 transition shrink-0 font-mono">Join</button>
                </div>
            </div>

        </div>

        <div class="max-w-7xl mx-auto pt-8 border-t border-white/10 text-center text-xs text-gray-500 flex flex-col sm:flex-row justify-between items-center gap-4 font-mono">
            <span>© 2026 SakuraTech Cyber Hardware & Network Lab. All Rights Reserved.
                <br>Made with care ♡ · Website template by WEBIA</br>
            </span>
            <div class="flex gap-4">
                <a href="#" class="hover:text-gray-400">Privacy Policy</a>
                <a href="#" class="hover:text-gray-400">Terms of Service</a>
            </div>
        </div>
    </footer>

    <!-- FLOATING ACTION BUTTONS (WHATSAPP & ANIMATED UNIQUE SAKURABOT-AI ROBOT MASCOT) -->
    <div class="fixed bottom-6 right-6 z-50 flex items-center gap-3 pointer-events-auto">
        
        <!-- WhatsApp Floating Button -->
        <a href="https://wa.me/6281234567890" target="_blank" class="w-14 h-14 rounded-full bg-emerald-500 hover:bg-emerald-600 text-white flex items-center justify-center text-2xl shadow-xl shadow-emerald-500/40 hover:scale-110 active:scale-95 transition-all relative group">
            <i class="fa-brands fa-whatsapp"></i>
            <span class="absolute right-full mr-3 bg-cherry-dark text-white text-xs font-mono px-3 py-1.5 rounded-xl border border-emerald-500/40 opacity-0 group-hover:opacity-100 transition whitespace-nowrap shadow-lg">Chat WhatsApp CS</span>
        </a>

        <!-- ANIMATED SAKURABOT-AI ROBOT FLOATING BUTTON -->
        <div class="relative">
            
            <!-- Bouncing Speech Bubble -->
            <div class="absolute bottom-full right-0 mb-3 bg-gradient-to-r from-cherry-500 to-cyber-cyan text-white text-xs font-mono font-bold px-3.5 py-2 rounded-2xl rounded-br-none shadow-xl border border-white/30 whitespace-nowrap animate-bounce-soft flex items-center gap-1.5 pointer-events-none">
                <span>Need help building your ultimate PC? 🤖⚡</span>
            </div>

            <!-- AI Robot Mascot Button -->
            <button onclick="toggleModal('ai-modal')" class="w-16 h-16 rounded-3xl bg-gradient-to-tr from-cherry-500 via-purple-600 to-cyber-cyan text-white flex items-center justify-center text-2xl shadow-2xl shadow-cherry-500/60 hover:scale-110 active:scale-95 transition animate-pulse-glow relative group overflow-hidden">
                <div class="absolute inset-0 bg-white/20 rounded-full animate-ping opacity-30"></div>
                <i class="fa-solid fa-robot group-hover:rotate-12 transition relative z-10"></i>
                <span class="absolute -top-1 -right-1 text-xs z-10">⚡</span>
            </button>
        </div>

    </div>

    <!-- AI CHATBOT MODAL -->
    <div id="ai-modal" class="fixed inset-0 bg-cherry-base/80 backdrop-blur-md z-50 hidden flex items-center justify-center p-4">
        <div class="glass-panel w-full max-w-lg rounded-3xl border-2 border-cherry-500/60 shadow-2xl overflow-hidden flex flex-col h-[550px]">
            
            <!-- Chat Header -->
            <div class="bg-gradient-to-r from-cherry-dark via-cherry-900 to-black p-4 border-b border-cherry-500/30 flex items-center justify-between">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-2xl bg-cherry-500/30 border border-cherry-400 flex items-center justify-center text-cyber-cyan text-xl">
                        <i class="fa-solid fa-robot"></i>
                    </div>
                    <div>
                        <h4 class="font-extrabold text-white text-sm flex items-center gap-1.5 font-mono">
                            SakuraBot AI Assistant 🤖⚡
                        </h4>
                        <span class="text-[10px] text-cyber-green font-mono font-semibold flex items-center gap-1">
                            <span class="w-2 h-2 rounded-full bg-cyber-green animate-pulse"></span> Online & Ready to Assist
                        </span>
                    </div>
                </div>
                <button onclick="toggleModal('ai-modal')" class="text-gray-400 hover:text-white text-xl">
                    <i class="fa-solid fa-xmark"></i>
                </button>
            </div>

            <!-- Chat Messages Body -->
            <div id="ai-chat-body" class="flex-1 p-4 overflow-y-auto space-y-4 text-xs font-mono">
                <div class="flex items-start gap-2.5">
                    <div class="w-8 h-8 rounded-xl bg-cherry-500/20 text-cherry-400 flex items-center justify-center text-sm shrink-0">🤖</div>
                    <div class="bg-cherry-500/10 border border-cherry-500/30 p-3 rounded-2xl rounded-tl-none text-gray-200 leading-relaxed max-w-[85%]">
                        System ready! Saya **SakuraBot AI Assistant**. Ada yang bisa saya bantu mengenai kompatibilitas GPU, simulasi daya PSU, atau konsultasi paket Wi-Fi 7?
                    </div>
                </div>
            </div>

            <!-- Chat Input Area -->
            <div class="p-4 border-t border-cherry-500/20 bg-cherry-dark/90 flex gap-2">
                <input id="ai-input" type="text" onkeydown="if(event.key==='Enter') sendAIMessage()" placeholder="Tanyakan rekomendasi PC atau Network..." class="w-full bg-white/5 text-white text-xs px-4 py-3 rounded-xl border border-cherry-500/30 focus:outline-none focus:border-cyber-cyan font-mono">
                <button onclick="sendAIMessage()" class="px-5 py-3 rounded-xl bg-cherry-500 hover:bg-cherry-600 text-white font-bold text-xs shrink-0 transition">
                    <i class="fa-solid fa-paper-plane"></i>
                </button>
            </div>

        </div>
    </div>

    <!-- CART MODAL -->
    <div id="cart-modal" class="fixed inset-0 bg-cherry-base/80 backdrop-blur-md z-50 hidden flex items-center justify-center p-4">
        <div class="glass-panel w-full max-w-md rounded-3xl border-2 border-cherry-500/60 shadow-2xl p-6">
            <div class="flex justify-between items-center border-b border-cherry-500/20 pb-4 mb-4">
                <h3 class="font-extrabold text-white text-base flex items-center gap-2">
                    <i class="fa-solid fa-cart-shopping text-cherry-400"></i> Keranjang Belanja
                </h3>
                <button onclick="toggleModal('cart-modal')" class="text-gray-400 hover:text-white text-xl">
                    <i class="fa-solid fa-xmark"></i>
                </button>
            </div>

            <div id="cart-items" class="space-y-3 max-h-60 overflow-y-auto pr-2 text-xs font-mono">
                <p class="text-gray-400 text-center py-8">Keranjang belanjaanmu masih kosong ⚡</p>
            </div>

            <div class="mt-6 pt-4 border-t border-cherry-500/20 font-mono">
                <div class="flex justify-between items-center mb-4">
                    <span class="text-xs font-bold text-gray-300">Total Pembayaran:</span>
                    <span id="cart-total" class="text-xl font-black text-cherry-400">Rp 0</span>
                </div>
                <button onclick="checkoutCart()" class="w-full py-3.5 rounded-xl bg-gradient-to-r from-cherry-500 to-cyber-cyan text-white font-bold text-xs uppercase tracking-wider shadow-lg">Checkout via WhatsApp</button>
            </div>
        </div>
    </div>

    <!-- JAVASCRIPT & CANVASES LOGIC -->
    


    <script src="{{ asset('js/website-bisnis/templates/technology-it/hardware-computer-networking/sakuratech/sakuratech.js') }}" defer></script>
</body>
</html>