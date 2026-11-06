<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CYBERWAVE — High-Performance Hardware & Enterprise IT Infrastructure</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        cyber: {
                            midnight: '#060913',
                            dark: '#0A0E1A',
                            card: '#0F1629',
                            cardHover: '#151F38',
                            cyan: '#00F0FF',
                            blue: '#0066FF',
                            ice: '#E0F7FC',
                            purple: '#7000FF',
                            green: '#00FF9D',
                            glow: 'rgba(0, 240, 255, 0.15)'
                        }
                    },
                    fontFamily: {
                        sans: ['Plus Jakarta Sans', 'Inter', 'sans-serif'],
                        mono: ['JetBrains Mono', 'Fira Code', 'monospace']
                    },
                    animation: {
                        'pulse-glow': 'pulseGlow 2.5s infinite ease-in-out',
                        'scanline': 'scanline 6s linear infinite',
                        'float': 'float 4s ease-in-out infinite',
                        'spin-slow': 'spin 20s linear infinite',
                        'matrix-glow': 'matrixGlow 3s infinite alternate'
                    },
                    keyframes: {
                        pulseGlow: {
                            '0%, 100%': { boxShadow: '0 0 15px rgba(0, 240, 255, 0.3), 0 0 30px rgba(0, 102, 255, 0.2)' },
                            '50%': { boxShadow: '0 0 30px rgba(0, 240, 255, 0.7), 0 0 50px rgba(0, 102, 255, 0.5)' },
                        },
                        scanline: {
                            '0%': { transform: 'translateY(-100%)' },
                            '100%': { transform: 'translateY(1000%)' }
                        },
                        float: {
                            '0%, 100%': { transform: 'translateY(0px)' },
                            '50%': { transform: 'translateY(-10px)' }
                        },
                        matrixGlow: {
                            '0%': { opacity: '0.4' },
                            '100%': { opacity: '0.8' }
                        }
                    }
                }
            }
        }
    </script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:wght@400;600;800&family=Plus+Jakarta+Sans:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/website-bisnis/templates/technology-it/hardware-computer-networking/cyberwave/cyberwave.css') }}">
</head>
<body class="cyber-bg-grid relative min-h-screen text-gray-100">


    <!-- CUSTOM TECH RETICLE CURSOR -->
    <div id="custom-cursor">
        <div class="relative w-9 h-9 flex items-center justify-center pointer-events-none">
            <div class="w-9 h-9 border border-cyber-cyan/50 rounded-full animate-ping opacity-40 absolute"></div>
            <div class="w-7 h-7 border-2 border-cyber-blue rounded-full flex items-center justify-center shadow-lg shadow-cyber-cyan/50">
                <div class="w-1.5 h-1.5 bg-cyber-cyan rounded-full"></div>
            </div>
            <!-- Target Crosshair Lines -->
            <div class="absolute -top-1 w-0.5 h-1.5 bg-cyber-cyan"></div>
            <div class="absolute -bottom-1 w-0.5 h-1.5 bg-cyber-cyan"></div>
            <div class="absolute -left-1 h-0.5 w-1.5 bg-cyber-cyan"></div>
            <div class="absolute -right-1 h-0.5 w-1.5 bg-cyber-cyan"></div>
            <span class="absolute -top-3 -right-3 text-[9px] text-cyber-cyan font-mono font-bold">CYBER-HUD</span>
        </div>
    </div>

    <!-- BACKGROUND CANVAS (CYBERWAVE QUANTUM GRID & NODE DATA STREAMS) -->
    <canvas id="cyberwave-bg-canvas" class="fixed inset-0 pointer-events-none z-0 opacity-60"></canvas>

    <!-- HEADER & TOPBAR -->
    <header class="relative z-40">
        <!-- TOPBAR TICKER -->
        <div class="bg-cyber-dark/90 text-xs py-2 px-4 border-b border-cyber-cyan/20 font-mono">
            <div class="max-w-7xl mx-auto flex items-center justify-between gap-4">
                <div class="flex items-center gap-3 shrink-0">
                    <span class="bg-gradient-to-r from-cyber-blue to-cyber-cyan text-cyber-midnight font-extrabold px-2.5 py-0.5 rounded text-[10px] uppercase tracking-wider">
                        ⚡ SYSTEM READY
                    </span>
                    <span class="hidden sm:inline text-cyber-cyan font-semibold">ENTERPRISE HARDWARE & 100G NETWORKING</span>
                </div>
                
                <!-- Ticker -->
                <div class="overflow-hidden whitespace-nowrap w-full max-w-xl">
                    <div class="inline-block animate-marquee text-gray-300 text-[11px]">
                        🚀 READY STOCK: NVIDIA HGX H100 AI Server Racks &nbsp;&nbsp;|&nbsp;&nbsp; ⚡ CISCO Nexus 9000 Series 400G Switches &nbsp;&nbsp;|&nbsp;&nbsp; 🛡️ SLA 99.999% Guaranteed 24/7 Support
                    </div>
                </div>

                <div class="hidden md:flex items-center gap-5 text-gray-300 text-[11px]">
                    <a href="tel:+6281234567890" class="hover:text-cyber-cyan transition flex items-center gap-1.5">
                        <i class="fa-solid fa-headset text-cyber-cyan"></i> +62 (21) 5088-9900
                    </a>
                    <span>|</span>
                    <button class="text-cyber-cyan font-bold hover:underline">IDR (Rp) / USD ($)</button>
                </div>
            </div>
        </div>

        <!-- NAVBAR -->
        <nav class="sticky top-0 cyber-glass border-b border-cyber-cyan/20 py-4 px-4 sm:px-8 z-40">
            <div class="max-w-7xl mx-auto flex items-center justify-between">
                
                <!-- Brand Logo -->
                <a href="#hero" class="flex items-center gap-3 group">
                    <div class="relative w-11 h-11 bg-gradient-to-tr from-cyber-blue via-cyber-cyan to-white rounded-xl p-0.5 shadow-lg shadow-cyber-cyan/30 group-hover:scale-105 transition">
                        <div class="w-full h-full bg-cyber-midnight rounded-[10px] flex items-center justify-center relative overflow-hidden">
                            <i class="fa-solid fa-cube text-cyber-cyan text-xl group-hover:rotate-90 transition duration-500"></i>
                        </div>
                    </div>
                    <div>
                        <span class="text-2xl font-black tracking-wider gradient-cyber block leading-none">CYBER<span class="text-cyber-cyan">WAVE</span></span>
                        <span class="text-[9px] text-cyber-cyan font-mono tracking-widest uppercase block font-bold">ENTERPRISE IT SYSTEMS</span>
                    </div>
                </a>

                <!-- Nav Mega Links -->
                <div class="hidden lg:flex items-center gap-7 font-bold text-xs uppercase tracking-wider text-gray-300 font-mono">
                    <a href="#hero" class="text-cyber-cyan hover:text-white transition">System Core</a>
                    <a href="#builder" class="hover:text-cyber-cyan transition">Performance Configurator</a>
                    <a href="#benchmarks" class="hover:text-cyber-cyan transition">Benchmarks</a>
                    <a href="#catalog" class="hover:text-cyber-cyan transition">Hardware Catalog</a>
                    <a href="#network" class="hover:text-cyber-cyan transition">Network Topology</a>
                    <a href="#solutions" class="hover:text-cyber-cyan transition">Enterprise Racks</a>
                    <a href="#services" class="hover:text-cyber-cyan transition">Services & SLA</a>
                </div>

                <!-- Right Actions -->
                <div class="flex items-center gap-4">
                    <button onclick="toggleModal('cart-modal')" class="relative w-11 h-11 rounded-xl bg-cyber-card border border-cyber-cyan/30 flex items-center justify-center hover:border-cyber-cyan hover:bg-cyber-cyan/10 transition text-cyber-cyan">
                        <i class="fa-solid fa-server text-base"></i>
                        <span id="cart-counter" class="absolute -top-2 -right-2 bg-cyber-cyan text-cyber-midnight font-black text-[10px] w-5 h-5 rounded-full flex items-center justify-center shadow-lg border border-black animate-pulse">0</span>
                    </button>

                    <a href="#builder" class="hidden sm:flex items-center gap-2 bg-gradient-to-r from-cyber-blue to-cyber-cyan text-cyber-midnight font-extrabold text-xs uppercase tracking-wider px-5 py-3 rounded-xl shadow-lg shadow-cyber-cyan/30 hover:shadow-cyber-blue/50 hover:scale-105 transition font-mono">
                        <i class="fa-solid fa-microchip"></i> BUILD SYSTEM
                    </a>

                    <button id="mobile-menu-btn" class="lg:hidden text-2xl text-cyber-cyan focus:outline-none">
                        <i class="fa-solid fa-bars-staggered"></i>
                    </button>
                </div>
            </div>

            <!-- Mobile Dropdown -->
            <div id="mobile-menu" class="hidden lg:hidden mt-4 pt-4 border-t border-cyber-cyan/20 space-y-3 font-bold text-xs uppercase tracking-wider px-2 font-mono">
                <a href="#hero" class="block py-2 text-cyber-cyan"><i class="fa-solid fa-terminal mr-2"></i> System Core</a>
                <a href="#builder" class="block py-2 hover:text-cyber-cyan"><i class="fa-solid fa-sliders mr-2"></i> Configurator</a>
                <a href="#benchmarks" class="block py-2 hover:text-cyber-cyan"><i class="fa-solid fa-chart-simple mr-2"></i> Benchmarks</a>
                <a href="#catalog" class="block py-2 hover:text-cyber-cyan"><i class="fa-solid fa-hard-drive mr-2"></i> Hardware Specs</a>
                <a href="#network" class="block py-2 hover:text-cyber-cyan"><i class="fa-solid fa-network-wired mr-2"></i> Network Infrastructure</a>
                <a href="#solutions" class="block py-2 hover:text-cyber-cyan"><i class="fa-solid fa-server mr-2"></i> Enterprise Racks</a>
                <a href="#services" class="block py-2 hover:text-cyber-cyan"><i class="fa-solid fa-shield-halved mr-2"></i> Services & SLA</a>
            </div>
        </nav>
    </header>

    <!-- ULTRA-BOLD HERO BANNER SECTION -->
    <section id="hero" class="relative pt-16 pb-28 px-4 sm:px-8 max-w-7xl mx-auto overflow-hidden">
        
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center relative z-10">
            
            <!-- Left Oversized Technical Typography & Messaging -->
            <div class="lg:col-span-7 space-y-6 text-center lg:text-left">
                
                <div class="inline-flex items-center gap-3 bg-cyber-card border border-cyber-cyan/40 px-4 py-2 rounded-full text-xs font-mono text-cyber-ice shadow-xl backdrop-blur-md animate-float">
                    <span class="w-2.5 h-2.5 rounded-full bg-cyber-cyan animate-ping"></span>
                    <span>CYBERWAVE v4.8: <span class="text-cyber-cyan font-bold">HIGH-DENSITY HARDWARE ONLINE</span></span>
                </div>

                <h1 class="text-4xl sm:text-6xl lg:text-7xl font-black tracking-tight leading-none uppercase font-sans">
                    UNLEASH <span class="gradient-cyber text-glow-cyan">COMPUTATIONAL POWER</span> & NEXT-GEN <span class="text-cyber-blue text-glow-blue">NETWORKING.</span>
                </h1>

                <p class="text-sm sm:text-base text-gray-300 max-w-2xl leading-relaxed mx-auto lg:mx-0 font-normal">
                    Infrastruktur IT kelas enterprise, server cluster berdensitas tinggi, dan rakitan Workstation/Gaming Beast yang divalidasi oleh arsitek sirkuit tingkat tinggi.
                </p>

                <!-- High-Tech Specifications Badges -->
                <div class="flex flex-wrap items-center justify-center lg:justify-start gap-3 pt-2 font-mono text-xs">
                    <div class="cyber-glass px-3.5 py-2 rounded-xl border border-cyber-cyan/30 text-cyber-cyan font-bold flex items-center gap-2">
                        <i class="fa-solid fa-bolt text-cyber-green"></i> 5.8 GHz Clock Frequency
                    </div>
                    <div class="cyber-glass px-3.5 py-2 rounded-xl border border-cyber-blue/30 text-cyber-ice font-bold flex items-center gap-2">
                        <i class="fa-solid fa-wifi text-cyber-cyan"></i> 100 Gbps Low-Latency Mesh
                    </div>
                    <div class="cyber-glass px-3.5 py-2 rounded-xl border border-purple-500/30 text-purple-300 font-bold flex items-center gap-2">
                        <i class="fa-solid fa-shield-halved text-purple-400"></i> Tier-4 Data Center Certified
                    </div>
                </div>

                <!-- CTA Actions -->
                <div class="flex flex-col sm:flex-row items-center justify-center lg:justify-start gap-4 pt-4 font-mono">
                    <a href="#builder" onclick="triggerConfetti()" class="w-full sm:w-auto px-8 py-4 rounded-xl bg-gradient-to-r from-cyber-blue to-cyber-cyan text-cyber-midnight font-black text-xs tracking-widest uppercase shadow-xl shadow-cyber-cyan/30 hover:shadow-cyber-blue/50 hover:scale-105 active:scale-95 transition text-center flex items-center justify-center gap-3">
                        <i class="fa-solid fa-terminal text-lg"></i>
                        Launch Hardware Configurator
                    </a>
                    <a href="#network" class="w-full sm:w-auto px-7 py-4 rounded-xl cyber-glass border border-cyber-cyan/40 hover:border-cyber-cyan text-cyber-cyan font-extrabold text-xs tracking-wider uppercase hover:bg-cyber-cyan/10 transition text-center flex items-center justify-center gap-2">
                        <i class="fa-solid fa-network-wired text-lg"></i> Architecture Topology
                    </a>
                </div>

                <!-- Real-Time System Telemetry Stats Bar -->
                <div class="grid grid-cols-3 gap-4 pt-8 border-t border-cyber-cyan/20 max-w-lg mx-auto lg:mx-0 font-mono">
                    <div>
                        <span class="text-2xl sm:text-3xl font-black text-cyber-cyan block">100 Gbps</span>
                        <span class="text-[10px] text-gray-400 uppercase">Fiber Backbone</span>
                    </div>
                    <div>
                        <span class="text-2xl sm:text-3xl font-black text-cyber-blue block">99.999%</span>
                        <span class="text-[10px] text-gray-400 uppercase">Uptime Reliability</span>
                    </div>
                    <div>
                        <span class="text-2xl sm:text-3xl font-black text-cyber-green block">&lt; 0.4 ms</span>
                        <span class="text-[10px] text-gray-400 uppercase">Data Center Latency</span>
                    </div>
                </div>

            </div>

            <!-- Right Visual: Interactive Dynamic 3D-Like Hardware Telemetry Visualization -->
            <div class="lg:col-span-5 relative flex items-center justify-center">
                
                <!-- Cyber Glowing Orbit Rings -->
                <div class="absolute w-80 h-80 sm:w-96 sm:h-96 rounded-full border-2 border-dashed border-cyber-cyan/30 animate-spin-slow pointer-events-none"></div>
                <div class="absolute w-72 h-72 sm:w-80 sm:h-80 rounded-full border border-cyber-blue/30 animate-pulse pointer-events-none"></div>

                <!-- Main Central Visual Box -->
                <div class="relative z-10 w-full max-w-md cyber-glass-glow p-6 rounded-3xl border-2 border-cyber-cyan/50 shadow-2xl animate-float">
                    
                    <div class="flex items-center justify-between border-b border-cyber-cyan/20 pb-4 mb-4 font-mono">
                        <div class="flex items-center gap-2 text-xs">
                            <span class="w-2.5 h-2.5 rounded-full bg-cyber-green animate-ping"></span>
                            <span class="font-bold text-cyber-cyan">RIG TELEMETRY #8890</span>
                        </div>
                        <span class="bg-cyber-blue/20 text-cyber-cyan text-[10px] font-black px-2.5 py-0.5 rounded border border-cyber-cyan/40">OVERCLOCK LIVE</span>
                    </div>

                    <!-- High Tech Image Display -->
                    <div class="relative rounded-2xl overflow-hidden group mb-4 border border-cyber-cyan/30">
                        <img src="https://images.unsplash.com/photo-1587202372775-e229f172b9d7?auto=format&fit=crop&w=800&q=80" alt="Liquid Cooled High End Hardware" class="w-full h-64 object-cover group-hover:scale-110 transition-transform duration-700">
                        <div class="absolute inset-0 bg-gradient-to-t from-cyber-midnight via-transparent to-transparent opacity-90"></div>
                        
                        <!-- Overlay Telemetry Floating Badges -->
                        <div class="absolute bottom-3 left-3 right-3 flex items-center justify-between text-xs font-mono">
                            <span class="bg-cyber-midnight/90 backdrop-blur-md text-cyber-cyan px-3 py-1 rounded-lg border border-cyber-cyan/40 font-bold flex items-center gap-1.5">
                                <i class="fa-solid fa-temperature-arrow-down text-cyber-green"></i> 32°C LN2 Cooling
                            </span>
                            <span class="bg-cyber-midnight/90 backdrop-blur-md text-cyber-blue px-3 py-1 rounded-lg border border-cyber-blue/40 font-bold">
                                480 FPS 4K
                            </span>
                        </div>
                    </div>

                    <!-- Component Gauges -->
                    <div class="grid grid-cols-2 gap-3 font-mono">
                        <div class="p-3 rounded-xl bg-cyber-cyan/10 border border-cyber-cyan/30 flex items-center gap-3">
                            <div class="w-9 h-9 rounded-lg bg-cyber-cyan/20 flex items-center justify-center text-cyber-cyan font-bold text-lg">
                                <i class="fa-solid fa-microchip"></i>
                            </div>
                            <div>
                                <span class="text-[9px] text-gray-400 block uppercase">Clock Speed</span>
                                <span class="text-xs font-bold text-white">5.8 GHz Turbo</span>
                            </div>
                        </div>

                        <div class="p-3 rounded-xl bg-cyber-blue/10 border border-cyber-blue/30 flex items-center gap-3">
                            <div class="w-9 h-9 rounded-lg bg-cyber-blue/20 flex items-center justify-center text-cyber-cyan font-bold text-lg">
                                <i class="fa-solid fa-server"></i>
                            </div>
                            <div>
                                <span class="text-[9px] text-gray-400 block uppercase">DDR5 Speed</span>
                                <span class="text-xs font-bold text-white">7200 MT/s</span>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- Floating Satellite Telemetry Cards -->
                <div class="absolute -top-6 -left-6 cyber-glass p-3 rounded-2xl border border-cyber-cyan/50 shadow-xl flex items-center gap-3 z-20 font-mono">
                    <div class="w-10 h-10 rounded-xl bg-gradient-to-tr from-cyber-blue to-cyber-cyan flex items-center justify-center text-cyber-midnight text-xl shadow-md">
                        <i class="fa-solid fa-gauge-high"></i>
                    </div>
                    <div>
                        <span class="text-xs font-bold text-cyber-cyan block">PCIe 5.0 x16</span>
                        <span class="text-[10px] text-gray-400">128 GB/s Bandwidth</span>
                    </div>
                </div>

                <div class="absolute -bottom-6 -right-6 cyber-glass p-3 rounded-2xl border border-cyber-blue/50 shadow-xl flex items-center gap-3 z-20 font-mono">
                    <i class="fa-solid fa-ethernet text-2xl text-cyber-cyan"></i>
                    <div>
                        <span class="text-xs font-bold text-cyber-cyan block">CAT8 Armor Shield</span>
                        <span class="text-[10px] text-gray-400">2000 MHz Frequency</span>
                    </div>
                </div>

            </div>

        </div>
    </section>

    <!-- HARDWARE PERFORMANCE SHOWCASE SECTION -->
    <section class="py-16 px-4 sm:px-8 max-w-7xl mx-auto relative">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            
            <div class="cyber-glass p-6 rounded-3xl border border-cyber-cyan/30 cyber-card-hover">
                <div class="w-12 h-12 rounded-2xl bg-cyber-cyan/20 text-cyber-cyan flex items-center justify-center text-2xl mb-4">
                    <i class="fa-solid fa-bolt"></i>
                </div>
                <h3 class="text-xl font-extrabold text-white mb-2">Extreme Throughput</h3>
                <p class="text-xs text-gray-300 leading-relaxed font-normal">
                    Arsitektur pemrosesan data berkecepatan tinggi dengan integrasi bus PCIe Gen5 murni tanpa bottleneck.
                </p>
            </div>

            <div class="cyber-glass p-6 rounded-3xl border border-cyber-blue/30 cyber-card-hover">
                <div class="w-12 h-12 rounded-2xl bg-cyber-blue/20 text-cyber-cyan flex items-center justify-center text-2xl mb-4">
                    <i class="fa-solid fa-brain"></i>
                </div>
                <h3 class="text-xl font-extrabold text-white mb-2">AI Deep Learning Ready</h3>
                <p class="text-xs text-gray-300 leading-relaxed font-normal">
                    Didukung Tensor Core generasi terbaru untuk eksekusi LLM lokal, machine learning, dan rendering visual AI.
                </p>
            </div>

            <div class="cyber-glass p-6 rounded-3xl border border-purple-500/30 cyber-card-hover">
                <div class="w-12 h-12 rounded-2xl bg-purple-500/20 text-purple-300 flex items-center justify-center text-2xl mb-4">
                    <i class="fa-solid fa-snowflake"></i>
                </div>
                <h3 class="text-xl font-extrabold text-white mb-2">Thermal Dissipation Armor</h3>
                <p class="text-xs text-gray-300 leading-relaxed font-normal">
                    Sistem pendinginan cair Dual-Loop dengan sertifikasi tekanan tinggi untuk performa stabil 24/7.
                </p>
            </div>

        </div>
    </section>

    <!-- INTERACTIVE GPU & CPU BENCHMARK COMPARISON VISUALIZER -->
    <section id="benchmarks" class="py-20 px-4 sm:px-8 max-w-7xl mx-auto border-t border-cyber-cyan/20">
        
        <div class="text-center max-w-3xl mx-auto mb-14">
            <span class="bg-cyber-cyan/20 text-cyber-cyan border border-cyber-cyan/30 text-xs font-mono font-bold px-4 py-1.5 rounded-full uppercase tracking-widest inline-block mb-3">
                📊 REAL-TIME HARDWARE COMPARISON
            </span>
            <h2 class="text-3xl sm:text-5xl font-black text-white uppercase">
                Interactive PC <span class="gradient-cyber">Benchmark Matrix</span>
            </h2>
            <p class="text-xs sm:text-base text-gray-300 mt-2 font-normal">
                Bandingkan skor 3DMark, Cinebench R23 Multi-Core, dan estimasi FPS pada resolusi 4K Ultra Settings.
            </p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-center">
            
            <!-- Controls Slider & Hardware Picker -->
            <div class="lg:col-span-5 cyber-glass p-6 rounded-3xl border border-cyber-cyan/30 font-mono space-y-6">
                
                <div>
                    <label class="block text-xs font-bold text-cyber-cyan mb-2">Hardware Setup A (Flagship Rig)</label>
                    <select id="bench-hardware-a" onchange="updateBenchmarkVisual()" class="w-full bg-cyber-midnight text-white text-xs px-4 py-3 rounded-xl border border-cyber-cyan/40 focus:outline-none">
                        <option value="4090">NVIDIA RTX 4090 24GB + Intel i9-14900KS</option>
                        <option value="4080">NVIDIA RTX 4080 Super + AMD Ryzen 7 7800X3D</option>
                    </select>
                </div>

                <div>
                    <label class="block text-xs font-bold text-cyber-blue mb-2">Hardware Setup B (Standard Enterprise)</label>
                    <select id="bench-hardware-b" onchange="updateBenchmarkVisual()" class="w-full bg-cyber-midnight text-white text-xs px-4 py-3 rounded-xl border border-cyber-blue/40 focus:outline-none">
                        <option value="4070">NVIDIA RTX 4070 Ti Super + Intel i7-14700K</option>
                        <option value="4060">NVIDIA RTX 4060 Ti 16GB + Ryzen 5 7600X</option>
                    </select>
                </div>

                <div>
                    <label class="block text-xs font-bold text-gray-300 mb-2">Target Workload Test</label>
                    <div class="grid grid-cols-3 gap-2 text-[10px]">
                        <button onclick="setBenchWorkload('gaming')" id="btn-workload-gaming" class="px-3 py-2 rounded-xl font-bold border border-cyber-cyan bg-cyber-cyan/20 text-cyber-cyan">4K Gaming</button>
                        <button onclick="setBenchWorkload('rendering')" id="btn-workload-rendering" class="px-3 py-2 rounded-xl font-bold border border-white/10 hover:border-cyber-cyan text-gray-300">3D Render</button>
                        <button onclick="setBenchWorkload('ai')" id="btn-workload-ai" class="px-3 py-2 rounded-xl font-bold border border-white/10 hover:border-cyber-cyan text-gray-300">AI LLM</button>
                    </div>
                </div>

            </div>

            <!-- Visual Bar Comparison Graphs -->
            <div class="lg:col-span-7 cyber-glass-glow p-8 rounded-3xl border-2 border-cyber-cyan/50 space-y-6 font-mono">
                
                <div class="flex items-center justify-between border-b border-cyber-cyan/20 pb-4">
                    <span class="text-xs font-bold text-cyber-cyan">BENCHMARK COMPARISON BAR CHART</span>
                    <span class="text-[10px] text-gray-400">HIGHER IS BETTER</span>
                </div>

                <!-- Graph 1: Cyberpunk 2077 / 3D Mark Score -->
                <div>
                    <div class="flex justify-between text-xs font-bold mb-1">
                        <span id="bench-label-1" class="text-white">4K Cyberpunk 2077 RayTracing (FPS)</span>
                    </div>
                    <div class="space-y-2">
                        <div>
                            <div class="flex justify-between text-[11px] text-cyber-cyan mb-1">
                                <span>Setup A</span>
                                <span id="score-a-1">142 FPS</span>
                            </div>
                            <div class="w-full bg-gray-800 h-3 rounded-full overflow-hidden">
                                <div id="bar-a-1" class="bg-gradient-to-r from-cyber-blue to-cyber-cyan h-full rounded-full transition-all duration-700" style="width: 85%"></div>
                            </div>
                        </div>
                        <div>
                            <div class="flex justify-between text-[11px] text-cyber-blue mb-1">
                                <span>Setup B</span>
                                <span id="score-b-1">88 FPS</span>
                            </div>
                            <div class="w-full bg-gray-800 h-3 rounded-full overflow-hidden">
                                <div id="bar-b-1" class="bg-cyber-blue h-full rounded-full transition-all duration-700" style="width: 55%"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Graph 2: Cinebench / Multi Core -->
                <div>
                    <div class="flex justify-between text-xs font-bold mb-1">
                        <span id="bench-label-2" class="text-white">Cinebench R23 Multi-Core (Points)</span>
                    </div>
                    <div class="space-y-2">
                        <div>
                            <div class="flex justify-between text-[11px] text-cyber-cyan mb-1">
                                <span>Setup A</span>
                                <span id="score-a-2">40,850 Pts</span>
                            </div>
                            <div class="w-full bg-gray-800 h-3 rounded-full overflow-hidden">
                                <div id="bar-a-2" class="bg-gradient-to-r from-cyber-blue to-cyber-cyan h-full rounded-full transition-all duration-700" style="width: 92%"></div>
                            </div>
                        </div>
                        <div>
                            <div class="flex justify-between text-[11px] text-cyber-blue mb-1">
                                <span>Setup B</span>
                                <span id="score-b-2">34,100 Pts</span>
                            </div>
                            <div class="w-full bg-gray-800 h-3 rounded-full overflow-hidden">
                                <div id="bar-b-2" class="bg-cyber-blue h-full rounded-full transition-all duration-700" style="width: 70%"></div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </section>

    <!-- PERFORMANCE-BASED PC BUILDER CONFIGURATOR -->
    <section id="builder" class="py-20 px-4 sm:px-8 max-w-7xl mx-auto relative">
        
        <div class="text-center max-w-3xl mx-auto mb-14">
            <span class="bg-cyber-cyan/20 text-cyber-cyan border border-cyber-cyan/30 text-xs font-mono font-bold px-4 py-1.5 rounded-full uppercase tracking-widest inline-block mb-3">
                ⚡ PERFORMANCE-BASED SYSTEM BUILDER
            </span>
            <h2 class="text-3xl sm:text-5xl font-black text-white uppercase">
                Configure Your <span class="gradient-cyber">High-End Rig</span>
            </h2>
            <p class="text-xs sm:text-base text-gray-300 mt-2 font-normal">
                Pilih kategori rakitan (Gaming, Workstation Studio, atau Server Data Center) untuk konfigurasi cepat dengan kalkulator watt dan harga real-time.
            </p>
        </div>

        <!-- Build Category Tabs -->
        <div class="flex justify-center gap-3 mb-10 font-mono text-xs">
            <button onclick="setBuildCategory('gaming')" id="tab-cat-gaming" class="px-6 py-3 rounded-xl font-bold bg-gradient-to-r from-cyber-blue to-cyber-cyan text-cyber-midnight shadow-lg transition">🎮 Ultimate Gaming Rig</button>
            <button onclick="setBuildCategory('workstation')" id="tab-cat-workstation" class="px-6 py-3 rounded-xl font-bold cyber-glass hover:border-cyber-cyan text-gray-300 transition">🖥️ Studio Workstation</button>
            <button onclick="setBuildCategory('server')" id="tab-cat-server" class="px-6 py-3 rounded-xl font-bold cyber-glass hover:border-cyber-cyan text-gray-300 transition">🗄️ Server Cluster</button>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
            
            <!-- Component Selectors -->
            <div class="lg:col-span-7 space-y-4 font-sans">
                
                <!-- CPU Select -->
                <div class="cyber-glass p-4 rounded-2xl border border-cyber-cyan/30 flex flex-col sm:flex-row items-center justify-between gap-4">
                    <div class="flex items-center gap-3 w-full sm:w-auto">
                        <div class="w-12 h-12 rounded-xl bg-cyber-cyan/20 text-cyber-cyan flex items-center justify-center text-xl shrink-0">
                            <i class="fa-solid fa-microchip"></i>
                        </div>
                        <div>
                            <h4 class="font-bold text-white text-sm">Processor (CPU)</h4>
                            <span class="text-xs text-gray-400">High frequency compute core</span>
                        </div>
                    </div>
                    <select id="config-cpu" onchange="calcPCConfig()" class="w-full sm:w-auto bg-cyber-midnight text-cyber-cyan text-xs font-mono font-bold px-4 py-2.5 rounded-xl border border-cyber-cyan/40 focus:outline-none">
                        <option value="0" data-watt="0">-- Select Processor --</option>
                        <option value="9800000" data-watt="253">Intel Core i9-14900KS 6.2GHz (Rp 9.800.000)</option>
                        <option value="7200000" data-watt="120">AMD Ryzen 7 7800X3D (Rp 7.200.000)</option>
                        <option value="16500000" data-watt="350">AMD EPYC 9654 96-Core Server CPU (Rp 16.500.000)</option>
                    </select>
                </div>

                <!-- GPU Select -->
                <div class="cyber-glass p-4 rounded-2xl border border-cyber-cyan/30 flex flex-col sm:flex-row items-center justify-between gap-4">
                    <div class="flex items-center gap-3 w-full sm:w-auto">
                        <div class="w-12 h-12 rounded-xl bg-cyber-blue/20 text-cyber-cyan flex items-center justify-center text-xl shrink-0">
                            <i class="fa-solid fa-display"></i>
                        </div>
                        <div>
                            <h4 class="font-bold text-white text-sm">Graphics Accelerator (GPU)</h4>
                            <span class="text-xs text-gray-400">Visuals & AI Tensor calculation</span>
                        </div>
                    </div>
                    <select id="config-gpu" onchange="calcPCConfig()" class="w-full sm:w-auto bg-cyber-midnight text-cyber-cyan text-xs font-mono font-bold px-4 py-2.5 rounded-xl border border-cyber-blue/40 focus:outline-none">
                        <option value="0" data-watt="0">-- Select GPU --</option>
                        <option value="31500000" data-watt="450">NVIDIA RTX 4090 24GB Liquid Armor (Rp 31.500.000)</option>
                        <option value="15800000" data-watt="285">NVIDIA RTX 4070 Ti Super 16GB (Rp 15.800.000)</option>
                        <option value="55000000" data-watt="700">NVIDIA RTX 6000 Ada Generation Workstation (Rp 55.000.000)</option>
                    </select>
                </div>

                <!-- RAM Select -->
                <div class="cyber-glass p-4 rounded-2xl border border-cyber-cyan/30 flex flex-col sm:flex-row items-center justify-between gap-4">
                    <div class="flex items-center gap-3 w-full sm:w-auto">
                        <div class="w-12 h-12 rounded-xl bg-purple-500/20 text-purple-400 flex items-center justify-center text-xl shrink-0">
                            <i class="fa-solid fa-memory"></i>
                        </div>
                        <div>
                            <h4 class="font-bold text-white text-sm">Memory (DDR5 RAM)</h4>
                            <span class="text-xs text-gray-400">Low-latency high bandwidth</span>
                        </div>
                    </div>
                    <select id="config-ram" onchange="calcPCConfig()" class="w-full sm:w-auto bg-cyber-midnight text-purple-300 text-xs font-mono font-bold px-4 py-2.5 rounded-xl border border-purple-500/40 focus:outline-none">
                        <option value="0" data-watt="15">-- Select Memory --</option>
                        <option value="3400000" data-watt="15">64GB (2x32GB) DDR5 7200MHz Corsair Dominator (Rp 3.400.000)</option>
                        <option value="7800000" data-watt="30">128GB (4x32GB) DDR5 6400MHz ECC Server RAM (Rp 7.800.000)</option>
                    </select>
                </div>

                <!-- PSU Select -->
                <div class="cyber-glass p-4 rounded-2xl border border-cyber-cyan/30 flex flex-col sm:flex-row items-center justify-between gap-4">
                    <div class="flex items-center gap-3 w-full sm:w-auto">
                        <div class="w-12 h-12 rounded-xl bg-cyber-green/20 text-cyber-green flex items-center justify-center text-xl shrink-0">
                            <i class="fa-solid fa-plug"></i>
                        </div>
                        <div>
                            <h4 class="font-bold text-white text-sm">Power Supply (Titanium PSU)</h4>
                            <span class="text-xs text-gray-400">High efficiency ATX 3.0</span>
                        </div>
                    </div>
                    <select id="config-psu" onchange="calcPCConfig()" class="w-full sm:w-auto bg-cyber-midnight text-cyber-green text-xs font-mono font-bold px-4 py-2.5 rounded-xl border border-cyber-green/40 focus:outline-none">
                        <option value="0">-- Select PSU --</option>
                        <option value="2800000">850W ATX 3.0 80+ Gold (Rp 2.800.000)</option>
                        <option value="4500000">1200W ATX 3.0 80+ Platinum (Rp 4.500.000)</option>
                        <option value="7900000">1600W Titanium Redundant Server PSU (Rp 7.900.000)</option>
                    </select>
                </div>

            </div>

            <!-- Summary Card -->
            <div class="lg:col-span-5 cyber-glass-glow p-6 rounded-3xl border-2 border-cyber-cyan/50 shadow-2xl sticky top-24 font-mono">
                <div class="flex items-center justify-between border-b border-cyber-cyan/20 pb-4 mb-4">
                    <h3 class="font-black text-white text-base flex items-center gap-2">
                        <i class="fa-solid fa-calculator text-cyber-cyan"></i> SYSTEM SUMMARY
                    </h3>
                    <span class="bg-cyber-green/20 text-cyber-green text-[10px] font-bold px-3 py-1 rounded-full border border-cyber-green/40">
                        VALIDATED
                    </span>
                </div>

                <div class="bg-cyber-midnight p-4 rounded-2xl border border-cyber-cyan/30 mb-6">
                    <div class="flex justify-between text-xs mb-2">
                        <span class="text-gray-300">Estimated Power Draw:</span>
                        <span id="calc-watt" class="font-bold text-cyber-cyan">0 Watt</span>
                    </div>
                    <div class="w-full bg-gray-800 h-2.5 rounded-full overflow-hidden">
                        <div id="calc-watt-bar" class="bg-gradient-to-r from-cyber-blue to-cyber-cyan h-full rounded-full transition-all duration-500" style="width: 0%"></div>
                    </div>
                </div>

                <div class="space-y-3 text-xs mb-6 border-b border-cyber-cyan/20 pb-4">
                    <div class="flex justify-between text-gray-300">
                        <span>Hardware Components Subtotal:</span>
                        <span id="calc-subtotal" class="font-bold text-white">Rp 0</span>
                    </div>
                    <div class="flex justify-between text-gray-300">
                        <span>Professional Assembly & Stress Test:</span>
                        <span class="text-cyber-green font-bold">FREE SLA</span>
                    </div>
                </div>

                <div class="bg-gradient-to-r from-cyber-blue/20 to-cyber-cyan/20 p-4 rounded-2xl border border-cyber-cyan/40 mb-6">
                    <span class="text-[10px] text-cyber-cyan font-bold uppercase tracking-wider block">Estimated Investment</span>
                    <span id="calc-total" class="text-3xl font-black gradient-cyber block my-1">Rp 0</span>
                    <span class="text-[10px] text-gray-400 block">*Includes 5-Year Enterprise On-Site SLA Warranty</span>
                </div>

                <button onclick="saveBuildRequest()" class="w-full py-4 rounded-xl bg-gradient-to-r from-cyber-blue to-cyber-cyan text-cyber-midnight font-black text-xs uppercase tracking-widest shadow-lg shadow-cyber-cyan/30 hover:scale-102 transition flex items-center justify-center gap-2">
                    <i class="fa-solid fa-paper-plane"></i> Submit System Order
                </button>
            </div>

        </div>

    </section>

    <!-- ADVANCED HARDWARE COMPONENT CATALOG -->
    <section id="catalog" class="py-20 px-4 sm:px-8 max-w-7xl mx-auto border-t border-cyber-cyan/20">
        
        <div class="flex flex-col md:flex-row md:items-end justify-between mb-12 gap-6">
            <div>
                <span class="text-xs font-mono font-bold text-cyber-cyan uppercase tracking-widest block mb-2">⚡ HIGH-SPEC CATALOG</span>
                <h2 class="text-3xl sm:text-5xl font-black text-white uppercase">Featured <span class="gradient-cyber">Hardware Specs</span></h2>
            </div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            
            <!-- Hardware Product 1 -->
            <div class="cyber-glass p-5 rounded-3xl border border-cyber-cyan/30 cyber-card-hover relative flex flex-col justify-between">
                <span class="absolute top-4 left-4 bg-cyber-cyan text-cyber-midnight font-mono font-bold text-[9px] px-2.5 py-1 rounded-full z-10">IN STOCK</span>
                
                <div class="relative overflow-hidden rounded-2xl mb-4 bg-cyber-midnight p-4 border border-cyber-cyan/20">
                    <img src="https://images.unsplash.com/photo-1591488320449-011701bb6704?auto=format&fit=crop&w=600&q=80" alt="GPU RTX 4090" class="w-full h-44 object-contain">
                </div>

                <div class="space-y-1 font-mono">
                    <span class="text-[10px] text-cyber-cyan block">NVIDIA GEFORCE</span>
                    <h4 class="font-extrabold text-white text-sm">RTX 4090 24GB Liquid Armor</h4>
                    <p class="text-[11px] text-gray-400 font-sans">24GB GDDR6X, 16384 CUDA Cores, Dual Loop Liquid Cooled Block.</p>
                </div>

                <div class="mt-4 pt-4 border-t border-cyber-cyan/20 flex items-center justify-between font-mono">
                    <span class="text-base font-black text-cyber-cyan">Rp 31.500.000</span>
                    <button onclick="addToCart('RTX 4090 Liquid Armor', 31500000)" class="w-9 h-9 rounded-xl bg-cyber-blue hover:bg-cyber-cyan hover:text-cyber-midnight text-white flex items-center justify-center transition">
                        <i class="fa-solid fa-cart-plus"></i>
                    </button>
                </div>
            </div>

            <!-- Hardware Product 2 -->
            <div class="cyber-glass p-5 rounded-3xl border border-cyber-cyan/30 cyber-card-hover relative flex flex-col justify-between">
                <span class="absolute top-4 left-4 bg-cyber-blue text-white font-mono font-bold text-[9px] px-2.5 py-1 rounded-full z-10">LOW STOCK</span>

                <div class="relative overflow-hidden rounded-2xl mb-4 bg-cyber-midnight p-4 border border-cyber-cyan/20">
                    <img src="https://images.unsplash.com/photo-1555680202-c86f0e12f086?auto=format&fit=crop&w=600&q=80" alt="Intel i9 Processor" class="w-full h-44 object-contain">
                </div>

                <div class="space-y-1 font-mono">
                    <span class="text-[10px] text-cyber-blue block">INTEL ENTERPRISE</span>
                    <h4 class="font-extrabold text-white text-sm">Core i9-14900KS Unlocked</h4>
                    <p class="text-[11px] text-gray-400 font-sans">24 Cores / 32 Threads, up to 6.2 GHz Max Turbo Frequency.</p>
                </div>

                <div class="mt-4 pt-4 border-t border-cyber-cyan/20 flex items-center justify-between font-mono">
                    <span class="text-base font-black text-cyber-cyan">Rp 9.800.000</span>
                    <button onclick="addToCart('Intel i9-14900KS', 9800000)" class="w-9 h-9 rounded-xl bg-cyber-blue hover:bg-cyber-cyan hover:text-cyber-midnight text-white flex items-center justify-center transition">
                        <i class="fa-solid fa-cart-plus"></i>
                    </button>
                </div>
            </div>

            <!-- Hardware Product 3 -->
            <div class="cyber-glass p-5 rounded-3xl border border-cyber-cyan/30 cyber-card-hover relative flex flex-col justify-between">
                <div class="relative overflow-hidden rounded-2xl mb-4 bg-cyber-midnight p-4 border border-cyber-cyan/20">
                    <img src="https://images.unsplash.com/photo-1544652478-6653e09f18a2?auto=format&fit=crop&w=600&q=80" alt="Gen5 NVMe SSD" class="w-full h-44 object-contain">
                </div>

                <div class="space-y-1 font-mono">
                    <span class="text-[10px] text-purple-400 block">PCIe 5.0 STORAGE</span>
                    <h4 class="font-extrabold text-white text-sm">4TB PCIe 5.0 NVMe SSD</h4>
                    <p class="text-[11px] text-gray-400 font-sans">Sequential Read speed up to 12,400 MB/s with Active Heatsink.</p>
                </div>

                <div class="mt-4 pt-4 border-t border-cyber-cyan/20 flex items-center justify-between font-mono">
                    <span class="text-base font-black text-cyber-cyan">Rp 6.200.000</span>
                    <button onclick="addToCart('4TB PCIe 5.0 NVMe SSD', 6200000)" class="w-9 h-9 rounded-xl bg-cyber-blue hover:bg-cyber-cyan hover:text-cyber-midnight text-white flex items-center justify-center transition">
                        <i class="fa-solid fa-cart-plus"></i>
                    </button>
                </div>
            </div>

            <!-- Hardware Product 4 -->
            <div class="cyber-glass p-5 rounded-3xl border border-cyber-cyan/30 cyber-card-hover relative flex flex-col justify-between">
                <div class="relative overflow-hidden rounded-2xl mb-4 bg-cyber-midnight p-4 border border-cyber-cyan/20">
                    <img src="https://images.unsplash.com/photo-1518770660439-4636190af475?auto=format&fit=crop&w=600&q=80" alt="Server Motherboard" class="w-full h-44 object-contain">
                </div>

                <div class="space-y-1 font-mono">
                    <span class="text-[10px] text-cyber-green block">WORKSTATION BOARD</span>
                    <h4 class="font-extrabold text-white text-sm">ASUS ROG Z790 HERO BTF</h4>
                    <p class="text-[11px] text-gray-400 font-sans">Hidden Connectors, DDR5-8000+, 20+1+2 Power Stages.</p>
                </div>

                <div class="mt-4 pt-4 border-t border-cyber-cyan/20 flex items-center justify-between font-mono">
                    <span class="text-base font-black text-cyber-cyan">Rp 11.400.000</span>
                    <button onclick="addToCart('ASUS ROG Z790 HERO', 11400000)" class="w-9 h-9 rounded-xl bg-cyber-blue hover:bg-cyber-cyan hover:text-cyber-midnight text-white flex items-center justify-center transition">
                        <i class="fa-solid fa-cart-plus"></i>
                    </button>
                </div>
            </div>

        </div>

    </section>

    <!-- NETWORK COVERAGE & TOPOLOGY VISUALIZATION CANVAS -->
    <section id="network" class="py-20 px-4 sm:px-8 max-w-7xl mx-auto border-t border-cyber-cyan/20">
        
        <div class="text-center max-w-3xl mx-auto mb-14">
            <span class="bg-cyber-cyan/20 text-cyber-cyan border border-cyber-cyan/30 text-xs font-mono font-bold px-4 py-1.5 rounded-full uppercase tracking-widest inline-block mb-3">
                🌐 LIVE TOPOLOGY NODE SIMULATOR
            </span>
            <h2 class="text-3xl sm:text-5xl font-black text-white uppercase">
                Network Architecture <span class="text-cyber-cyan">& Infrastructure</span>
            </h2>
            <p class="text-xs sm:text-base text-gray-300 mt-2 font-normal">
                Visualisasi interaktif node routing data packet pada jaringan fiber optic 100G Data Center.
            </p>
        </div>

        <div class="cyber-glass-glow p-6 rounded-3xl border-2 border-cyber-cyan/50 relative overflow-hidden">
            <div class="flex items-center justify-between font-mono text-xs mb-4 border-b border-cyber-cyan/20 pb-3">
                <span class="text-cyber-cyan font-bold"><i class="fa-solid fa-circle-dot text-cyber-green mr-2"></i> DATA CENTER PACKET ROUTING CANVAS</span>
                <span class="text-gray-400">ACTIVE NODES: 24 | BANDWIDTH: 100 Gbps</span>
            </div>

            <!-- Canvas Visualization -->
            <div class="relative w-full h-80 bg-cyber-midnight rounded-2xl overflow-hidden border border-cyber-cyan/30">
                <canvas id="topology-canvas" class="w-full h-full"></canvas>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mt-6 font-mono text-xs">
                <div class="p-3 rounded-xl bg-cyber-midnight border border-cyber-cyan/20 flex items-center gap-3">
                    <i class="fa-solid fa-diagram-project text-2xl text-cyber-cyan"></i>
                    <div>
                        <span class="text-gray-400 block text-[10px]">Backbone Mesh</span>
                        <span class="text-white font-bold">Spine-Leaf Architecture</span>
                    </div>
                </div>

                <div class="p-3 rounded-xl bg-cyber-midnight border border-cyber-blue/20 flex items-center gap-3">
                    <i class="fa-solid fa-shield-virus text-2xl text-cyber-blue"></i>
                    <div>
                        <span class="text-gray-400 block text-[10px]">DDoS Protection</span>
                        <span class="text-white font-bold">Hardware Scrubbing 2 Tbps</span>
                    </div>
                </div>

                <div class="p-3 rounded-xl bg-cyber-midnight border border-cyber-green/20 flex items-center gap-3">
                    <i class="fa-solid fa-bolt text-2xl text-cyber-green"></i>
                    <div>
                        <span class="text-gray-400 block text-[10px]">Latency SLA</span>
                        <span class="text-white font-bold">&lt; 0.4ms Ultra-Low Latency</span>
                    </div>
                </div>
            </div>
        </div>

    </section>

    <!-- CUSTOM ENTERPRISE SERVER & DATA CENTER SOLUTIONS -->
    <section id="solutions" class="py-20 px-4 sm:px-8 max-w-7xl mx-auto">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-center">
            
            <div class="lg:col-span-6 space-y-6">
                <span class="bg-cyber-blue/20 text-cyber-cyan border border-cyber-blue/30 text-xs font-mono font-bold px-4 py-1.5 rounded-full uppercase tracking-widest inline-block">
                    🗄️ ENTERPRISE HARDWARE
                </span>
                <h2 class="text-3xl sm:text-5xl font-black text-white uppercase leading-tight">
                    High-Density <span class="gradient-cyber">Server Racks & SAN Storage</span>
                </h2>
                <p class="text-xs sm:text-base text-gray-300 leading-relaxed font-normal">
                    Solusi server rack berdensitas tinggi untuk Data Center, Machine Learning Cluster, dan Storage Area Network (SAN) berkapasitas Petabyte.
                </p>

                <div class="space-y-4 font-mono text-xs">
                    <div class="p-4 rounded-2xl cyber-glass border border-cyber-cyan/30 flex items-center gap-4">
                        <div class="w-10 h-10 rounded-xl bg-cyber-cyan/20 text-cyber-cyan flex items-center justify-center text-xl shrink-0">
                            <i class="fa-solid fa-server"></i>
                        </div>
                        <div>
                            <h4 class="font-bold text-white">4U High-Density GPU Compute Nodes</h4>
                            <p class="text-gray-400 text-[11px]">Dukungan hingga 8x GPU NVIDIA H100 SXM5 per node chassis.</p>
                        </div>
                    </div>

                    <div class="p-4 rounded-2xl cyber-glass border border-cyber-blue/30 flex items-center gap-4">
                        <div class="w-10 h-10 rounded-xl bg-cyber-blue/20 text-cyber-cyan flex items-center justify-center text-xl shrink-0">
                            <i class="fa-solid fa-hard-drive"></i>
                        </div>
                        <div>
                            <h4 class="font-bold text-white">NVMe Over Fabrics (NVMe-oF) SAN Storage</h4>
                            <p class="text-gray-400 text-[11px]">Sub-millisecond access time dengan 100G RoCE v2 Ethernet.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="lg:col-span-6">
                <div class="relative rounded-3xl overflow-hidden border-2 border-cyber-cyan/40 shadow-2xl">
                    <img src="https://images.unsplash.com/photo-1558494949-ef010cbdcc31?auto=format&fit=crop&w=800&q=80" alt="Data Center Rack Server" class="w-full h-96 object-cover">
                    <div class="absolute inset-0 bg-gradient-to-t from-cyber-midnight via-transparent to-transparent"></div>
                    <div class="absolute bottom-6 left-6 right-6 font-mono text-xs bg-cyber-midnight/90 backdrop-blur-md p-4 rounded-2xl border border-cyber-cyan/40">
                        <span class="text-cyber-cyan font-bold block">ENTERPRISE DEPLOYMENT GUARANTEE</span>
                        <span class="text-gray-300 text-[11px]">5-Year On-Site SLA Response Time &lt; 4 Hours.</span>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <!-- IT INFRASTRUCTURE ASSESSMENT & SLA SERVICES -->
    <section id="services" class="py-20 px-4 sm:px-8 max-w-7xl mx-auto border-t border-cyber-cyan/20">
        <div class="text-center max-w-3xl mx-auto mb-14">
            <span class="bg-cyber-cyan/20 text-cyber-cyan border border-cyber-cyan/30 text-xs font-mono font-bold px-4 py-1.5 rounded-full uppercase tracking-widest inline-block mb-3">
                🛡️ AFTER-SALES & SLA GUARANTEE
            </span>
            <h2 class="text-3xl sm:text-5xl font-black text-white uppercase">
                Enterprise SLA <span class="gradient-cyber">& Consultation</span>
            </h2>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            
            <div class="cyber-glass p-6 rounded-3xl border border-cyber-cyan/40 flex flex-col justify-between">
                <div>
                    <i class="fa-solid fa-clipboard-check text-3xl text-cyber-cyan mb-4"></i>
                    <h3 class="text-xl font-bold text-white mb-2">Infrastructure Assessment</h3>
                    <p class="text-xs text-gray-300 leading-relaxed">
                        Audit menyeluruh untuk arsitektur jaringan, beban server, dan bottleneck performa sistem IT kamu.
                    </p>
                </div>
                <button onclick="toggleModal('consultation-modal')" class="mt-6 w-full py-3 rounded-xl bg-cyber-cyan/20 border border-cyber-cyan text-cyber-cyan font-mono font-bold text-xs uppercase hover:bg-cyber-cyan hover:text-cyber-midnight transition">Book Assessment</button>
            </div>

            <div class="cyber-glass-glow p-6 rounded-3xl border-2 border-cyber-cyan/60 flex flex-col justify-between shadow-xl">
                <div>
                    <span class="bg-cyber-cyan text-cyber-midnight font-mono font-bold text-[9px] px-3 py-1 rounded-full uppercase">RECOMMENDED SLA</span>
                    <i class="fa-solid fa-headset text-3xl text-cyber-cyan my-4 block"></i>
                    <h3 class="text-xl font-bold text-white mb-2">24/7 Enterprise On-Site SLA</h3>
                    <p class="text-xs text-gray-300 leading-relaxed">
                        Garansi ganti unit (replacement) langsung di lokasi dalam waktu &lt; 4 jam untuk menjaga uptime bisnis.
                    </p>
                </div>
                <button onclick="toggleModal('consultation-modal')" class="mt-6 w-full py-3 rounded-xl bg-gradient-to-r from-cyber-blue to-cyber-cyan text-cyber-midnight font-mono font-bold text-xs uppercase shadow-md hover:scale-102 transition">Get SLA Package</button>
            </div>

            <div class="cyber-glass p-6 rounded-3xl border border-purple-500/40 flex flex-col justify-between">
                <div>
                    <i class="fa-solid fa-boxes-packing text-3xl text-purple-400 mb-4"></i>
                    <h3 class="text-xl font-bold text-white mb-2">Bulk Procurement & B2B</h3>
                    <p class="text-xs text-gray-300 leading-relaxed">
                        Pengadaan perangkat keras dalam skala besar untuk kantor, sekolah, dan Data Center dengan penawaran resmi.
                    </p>
                </div>
                <button onclick="toggleModal('consultation-modal')" class="mt-6 w-full py-3 rounded-xl bg-purple-500/20 border border-purple-500 text-purple-300 font-mono font-bold text-xs uppercase hover:bg-purple-500 hover:text-white transition">Inquire Bulk Quote</button>
            </div>

        </div>
    </section>

    <!-- FAQ ACCORDION SECTION -->
    <section id="faq" class="py-20 px-4 sm:px-8 max-w-4xl mx-auto">
        <div class="text-center mb-12">
            <span class="bg-cyber-cyan/20 text-cyber-cyan text-xs font-mono font-bold px-4 py-1.5 rounded-full uppercase tracking-widest inline-block mb-3">❓ FAQ SYSTEM</span>
            <h2 class="text-3xl sm:text-4xl font-black text-white uppercase">Frequently Asked <span class="gradient-cyber">Questions</span></h2>
        </div>

        <div class="space-y-4 font-mono">
            
            <div class="cyber-glass rounded-2xl border border-cyber-cyan/30 overflow-hidden">
                <button onclick="toggleFAQ(this)" class="w-full p-5 text-left font-bold text-white text-xs sm:text-sm flex justify-between items-center">
                    <span>Apakah seluruh rakitan PC dan server di-stress test sebelum dikirim?</span>
                    <i class="fa-solid fa-chevron-down text-cyber-cyan transition-transform"></i>
                </button>
                <div class="px-5 pb-5 text-xs text-gray-300 hidden leading-relaxed border-t border-cyber-cyan/20 pt-3">
                    Ya, setiap unit melewati pengujian beban penuh selama 24 jam menggunakan Prime95, FurMark, dan memtest86 untuk menjamin stabilitas 100% sebelum serah terima.
                </div>
            </div>

            <div class="cyber-glass rounded-2xl border border-cyber-cyan/30 overflow-hidden">
                <button onclick="toggleFAQ(this)" class="w-full p-5 text-left font-bold text-white text-xs sm:text-sm flex justify-between items-center">
                    <span>Bagaimana klaim garansi 5-Year Enterprise SLA?</span>
                    <i class="fa-solid fa-chevron-down text-cyber-cyan transition-transform"></i>
                </button>
                <div class="px-5 pb-5 text-xs text-gray-300 hidden leading-relaxed border-t border-cyber-cyan/20 pt-3">
                    Tim teknisi kami siap meluncur ke Data Center / lokasi kantor Anda dengan membawa unit cadangan dalam waktu maksimal 4 jam setelah laporan kendala diterima.
                </div>
            </div>

        </div>
    </section>

    <!-- FOOTER -->
    <footer class="bg-cyber-midnight border-t border-cyber-cyan/20 pt-16 pb-12 px-4 sm:px-8 relative z-10 font-mono">
        <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-12 gap-10 mb-12">
            
            <div class="md:col-span-5 space-y-4 font-sans">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 bg-gradient-to-tr from-cyber-blue to-cyber-cyan rounded-xl flex items-center justify-center text-cyber-midnight text-xl shadow-lg">
                        <i class="fa-solid fa-cube"></i>
                    </div>
                    <span class="text-2xl font-black gradient-cyber uppercase tracking-wider">CYBERWAVE</span>
                </div>
                <p class="text-xs text-gray-400 leading-relaxed max-w-sm">
                    Penyedia infrastruktur IT enterprise, hardware compute cluster, dan arsitektur jaringan fiber 100G terdepan.
                </p>
                <div class="flex items-center gap-3 text-cyber-cyan pt-2">
                    <a href="#" class="w-9 h-9 rounded-xl bg-cyber-card border border-cyber-cyan/30 flex items-center justify-center hover:bg-cyber-cyan hover:text-cyber-midnight transition"><i class="fa-brands fa-linkedin"></i></a>
                    <a href="#" class="w-9 h-9 rounded-xl bg-cyber-card border border-cyber-cyan/30 flex items-center justify-center hover:bg-cyber-cyan hover:text-cyber-midnight transition"><i class="fa-brands fa-github"></i></a>
                    <a href="#" class="w-9 h-9 rounded-xl bg-cyber-card border border-cyber-cyan/30 flex items-center justify-center hover:bg-cyber-cyan hover:text-cyber-midnight transition"><i class="fa-brands fa-youtube"></i></a>
                </div>
            </div>

            <div class="md:col-span-3 space-y-3">
                <h4 class="font-extrabold text-white text-sm uppercase tracking-wider">Mega Navigation</h4>
                <ul class="space-y-2 text-xs text-gray-400">
                    <li><a href="#builder" class="hover:text-cyber-cyan transition">Performance Builder</a></li>
                    <li><a href="#benchmarks" class="hover:text-cyber-cyan transition">Benchmark Visualizer</a></li>
                    <li><a href="#catalog" class="hover:text-cyber-cyan transition">Hardware Specs</a></li>
                    <li><a href="#network" class="hover:text-cyber-cyan transition">Network Topology</a></li>
                </ul>
            </div>

            <div class="md:col-span-4 space-y-4">
                <h4 class="font-extrabold text-white text-sm uppercase tracking-wider">Subscribe SLA Tech Updates</h4>
                <p class="text-xs text-gray-400">Dapatkan bulletin spesifikasi hardware & update firmware jaringan setiap bulan.</p>
                <div class="flex gap-2">
                    <input type="email" placeholder="enter-email@domain.com" class="w-full bg-cyber-card text-xs px-4 py-3 rounded-xl border border-cyber-cyan/30 focus:outline-none text-white">
                    <button onclick="triggerConfetti()" class="px-5 py-3 rounded-xl bg-gradient-to-r from-cyber-blue to-cyber-cyan text-cyber-midnight font-bold text-xs hover:opacity-90 transition shrink-0">Join</button>
                </div>
            </div>

        </div>

        <div class="max-w-7xl mx-auto pt-8 border-t border-cyber-cyan/20 text-center text-xs text-gray-500 flex flex-col sm:flex-row justify-between items-center gap-4">
            <span>© 2026 CYBERWAVE IT Systems Inc. All Rights Reserved.</span>
            <div class="flex gap-4">
                <a href="#" class="hover:text-cyber-cyan">Privacy SLA</a>
                <a href="#" class="hover:text-cyber-cyan">Terms of Service</a>
            </div>
        </div>
    </footer>

    <!-- FLOATING ACTION BUTTONS (WHATSAPP & UNIQUE ANIMATED CYBERWAVE AI SPECIALIST) -->
    <div class="fixed bottom-6 right-6 z-50 flex items-center gap-3 pointer-events-auto">
        
        <!-- WhatsApp Floating Button -->
        <a href="#" target="_blank" rel="noopener" class="js-cyberwave-wa w-14 h-14 rounded-full bg-emerald-500 hover:bg-emerald-600 text-white flex items-center justify-center text-2xl shadow-xl shadow-emerald-500/40 hover:scale-110 active:scale-95 transition-all relative group">
            <i class="fa-brands fa-whatsapp"></i>
            <span class="absolute right-full mr-3 bg-cyber-midnight text-white text-xs font-mono px-3 py-1.5 rounded-xl border border-emerald-500/40 opacity-0 group-hover:opacity-100 transition whitespace-nowrap shadow-lg">Chat WhatsApp Tech Support</span>
        </a>

        <!-- UNIQUE FLOATING CYBERWAVE AI SPECIALIST BUTTON -->
        <div class="relative cyber-ai-orbit">
            
            <!-- Speech Bubble -->
            <div class="absolute bottom-full right-0 mb-3 bg-gradient-to-r from-cyber-blue to-cyber-cyan text-cyber-midnight text-xs font-mono font-bold px-3.5 py-2 rounded-2xl rounded-br-none shadow-2xl border border-white/40 whitespace-nowrap animate-float flex items-center gap-1.5 pointer-events-none">
                <span>Cyberwave AI: Real-time SLA & Hardware Advisor ⚡</span>
            </div>

            <!-- AI Specialist Animated Button -->
            <button onclick="toggleModal('ai-modal')" class="w-16 h-16 rounded-3xl bg-gradient-to-tr from-cyber-blue via-cyber-cyan to-white text-cyber-midnight flex items-center justify-center text-2xl shadow-2xl shadow-cyber-cyan/60 hover:scale-110 active:scale-95 transition animate-pulse-glow relative group overflow-hidden">
                <div class="absolute inset-0 bg-cyber-cyan/30 rounded-full animate-ping opacity-40"></div>
                <i class="fa-solid fa-robot group-hover:rotate-12 transition relative z-10"></i>
                <span class="absolute -top-1 -right-1 text-xs z-10">⚡</span>
            </button>
        </div>

    </div>

    <!-- AI CHATBOT MODAL -->
    <div id="ai-modal" class="fixed inset-0 bg-cyber-midnight/80 backdrop-blur-md z-50 hidden flex items-center justify-center p-4">
        <div class="cyber-glass-glow w-full max-w-lg rounded-3xl border-2 border-cyber-cyan/60 shadow-2xl overflow-hidden flex flex-col h-[550px]">
            
            <!-- Chat Header -->
            <div class="bg-cyber-dark p-4 border-b border-cyber-cyan/30 flex items-center justify-between">
                <div class="flex items-center gap-3 font-mono">
                    <div class="w-10 h-10 rounded-2xl bg-cyber-cyan/20 border border-cyber-cyan flex items-center justify-center text-cyber-cyan text-xl">
                        <i class="fa-solid fa-robot"></i>
                    </div>
                    <div>
                        <h4 class="font-extrabold text-white text-sm flex items-center gap-1.5">
                            Cyberwave AI Specialist ⚡
                        </h4>
                        <span class="text-[10px] text-cyber-green font-semibold flex items-center gap-1">
                            <span class="w-2 h-2 rounded-full bg-cyber-green animate-pulse"></span> SYSTEM ONLINE (0.2ms)
                        </span>
                    </div>
                </div>
                <button onclick="toggleModal('ai-modal')" class="text-gray-400 hover:text-white text-xl">
                    <i class="fa-solid fa-xmark"></i>
                </button>
            </div>

            <!-- Chat Messages -->
            <div id="ai-chat-body" class="flex-1 p-4 overflow-y-auto space-y-4 text-xs font-mono">
                <div class="flex items-start gap-2.5">
                    <div class="w-8 h-8 rounded-xl bg-cyber-cyan/20 text-cyber-cyan flex items-center justify-center text-sm shrink-0">🤖</div>
                    <div class="bg-cyber-midnight border border-cyber-cyan/30 p-3 rounded-2xl rounded-tl-none text-gray-200 leading-relaxed max-w-[85%]">
                        Halo! Saya **Cyberwave AI Specialist**. Ada yang bisa saya bantu terkait spesifikasi GPU RTX 4090, konfigurasi server cluster, atau garansi SLA 5 tahun?
                    </div>
                </div>
            </div>

            <!-- Chat Input -->
            <div class="p-4 border-t border-cyber-cyan/20 bg-cyber-midnight flex gap-2">
                <input id="ai-input" type="text" onkeydown="if(event.key==='Enter') sendAIMessage()" placeholder="Tanyakan rekomendasi hardware enterprise..." class="w-full bg-cyber-card text-white text-xs px-4 py-3 rounded-xl border border-cyber-cyan/30 focus:outline-none focus:border-cyber-cyan font-mono">
                <button onclick="sendAIMessage()" class="px-5 py-3 rounded-xl bg-cyber-blue hover:bg-cyber-cyan hover:text-cyber-midnight text-white font-bold text-xs shrink-0 transition font-mono">
                    <i class="fa-solid fa-paper-plane"></i>
                </button>
            </div>

        </div>
    </div>

    <!-- CONSULTATION / BOOKING MODAL -->
    <div id="consultation-modal" class="fixed inset-0 bg-cyber-midnight/80 backdrop-blur-md z-50 hidden flex items-center justify-center p-4">
        <div class="cyber-glass-glow w-full max-w-md rounded-3xl border-2 border-cyber-cyan/60 p-6 shadow-2xl font-mono">
            <div class="flex justify-between items-center border-b border-cyber-cyan/20 pb-4 mb-4">
                <h3 class="font-extrabold text-white text-sm flex items-center gap-2">
                    <i class="fa-solid fa-calendar-check text-cyber-cyan"></i> BOOK TECHNICAL CONSULTATION
                </h3>
                <button onclick="toggleModal('consultation-modal')" class="text-gray-400 hover:text-white text-xl">
                    <i class="fa-solid fa-xmark"></i>
                </button>
            </div>

            <form onsubmit="handleConsultationSubmit(event)" class="space-y-4 text-xs font-sans">
                <div>
                    <label class="block text-gray-300 font-bold mb-1">Company / Full Name *</label>
                    <input name="company" type="text" required placeholder="Ex: PT Cyber Tech Indonesia" class="w-full bg-cyber-midnight text-white px-4 py-2.5 rounded-xl border border-cyber-cyan/40 focus:outline-none">
                </div>
                <div>
                    <label class="block text-gray-300 font-bold mb-1">Corporate WhatsApp / Phone *</label>
                    <input name="phone" type="tel" required placeholder="0812xxxxxxx" class="w-full bg-cyber-midnight text-white px-4 py-2.5 rounded-xl border border-cyber-cyan/40 focus:outline-none">
                </div>
                <div>
                    <label class="block text-gray-300 font-bold mb-1">Service Required</label>
                    <select name="service" class="w-full bg-cyber-midnight text-cyber-cyan px-4 py-2.5 rounded-xl border border-cyber-cyan/40 focus:outline-none font-mono text-xs">
                        <option>IT Infrastructure Audit & Assessment</option>
                        <option>24/7 Enterprise On-Site SLA Package</option>
                        <option>Bulk Hardware Procurement Quote</option>
                    </select>
                </div>
                <div>
                    <label class="block text-gray-300 font-bold mb-1">Preferred Consultation Date</label>
                    <input name="schedule" type="date" min="{{ date('Y-m-d') }}" class="w-full bg-cyber-midnight text-white px-4 py-2.5 rounded-xl border border-cyber-cyan/40 focus:outline-none">
                </div>
                <div>
                    <label class="block text-gray-300 font-bold mb-1">Project / Infrastructure Requirements</label>
                    <textarea name="requirements" rows="3" placeholder="Ceritakan kebutuhan hardware, server, atau jaringan..." class="w-full bg-cyber-midnight text-white px-4 py-2.5 rounded-xl border border-cyber-cyan/40 focus:outline-none"></textarea>
                </div>
                <button type="submit" class="w-full py-3.5 rounded-xl bg-gradient-to-r from-cyber-blue to-cyber-cyan text-cyber-midnight font-bold font-mono text-xs uppercase tracking-wider mt-2">Submit Request</button>
            </form>
        </div>
    </div>

    <!-- CART MODAL -->
    <div id="cart-modal" class="fixed inset-0 bg-cyber-midnight/80 backdrop-blur-md z-50 hidden flex items-center justify-center p-4">
        <div class="cyber-glass-glow w-full max-w-md rounded-3xl border-2 border-cyber-cyan/60 p-6 shadow-2xl font-mono">
            <div class="flex justify-between items-center border-b border-cyber-cyan/20 pb-4 mb-4">
                <h3 class="font-extrabold text-white text-base flex items-center gap-2">
                    <i class="fa-solid fa-server text-cyber-cyan"></i> HARDWARE SELECTIONS
                </h3>
                <button onclick="toggleModal('cart-modal')" class="text-gray-400 hover:text-white text-xl">
                    <i class="fa-solid fa-xmark"></i>
                </button>
            </div>

            <div id="cart-items" class="space-y-3 max-h-60 overflow-y-auto pr-2 text-xs">
                <p class="text-gray-400 text-center py-8">No hardware components selected ⚡</p>
            </div>

            <div class="mt-6 pt-4 border-t border-cyber-cyan/20">
                <div class="flex justify-between items-center mb-4">
                    <span class="text-xs font-bold text-gray-300">Total Investment:</span>
                    <span id="cart-total" class="text-xl font-black text-cyber-cyan">Rp 0</span>
                </div>
                <button onclick="checkoutCart()" class="w-full py-3.5 rounded-xl bg-gradient-to-r from-cyber-blue to-cyber-cyan text-cyber-midnight font-bold text-xs uppercase tracking-wider">Checkout Order via WhatsApp</button>
            </div>
        </div>
    </div>

    <!-- JAVASCRIPT & CANVASES LOGIC -->
    <script>
        // Custom Tech Reticle Cursor Trail
        const cursor = document.getElementById('custom-cursor');
        document.addEventListener('mousemove', (e) => {
            cursor.style.left = e.clientX + 'px';
            cursor.style.top = e.clientY + 'px';

            if(Math.random() > 0.4) {
                const trail = document.createElement('div');
                trail.className = 'cursor-trail';
                trail.style.left = e.clientX + 'px';
                trail.style.top = e.clientY + 'px';
                document.body.appendChild(trail);
                setTimeout(() => trail.remove(), 400);
            }
        });

        // Mobile Menu Toggle
        document.getElementById('mobile-menu-btn').addEventListener('click', () => {
            const menu = document.getElementById('mobile-menu');
            menu.classList.toggle('hidden');
        });

        // Confetti Burst Trigger
        function triggerConfetti() {
            confetti({
                particleCount: 80,
                spread: 70,
                origin: { y: 0.7 },
                colors: ['#00F0FF', '#0066FF', '#E0F7FC', '#00FF9D']
            });
        }

        // Benchmark Interactive Visualizer Updates
        const benchData = {
            '4090': { name: 'NVIDIA RTX 4090', fps: 142, points: 40850 },
            '4080': { name: 'NVIDIA RTX 4080 Super', fps: 118, points: 38200 },
            '4070': { name: 'NVIDIA RTX 4070 Ti Super', fps: 88, points: 34100 },
            '4060': { name: 'NVIDIA RTX 4060 Ti', fps: 62, points: 24500 }
        };

        function updateBenchmarkVisual() {
            const aKey = document.getElementById('bench-hardware-a').value;
            const bKey = document.getElementById('bench-hardware-b').value;

            const a = benchData[aKey];
            const b = benchData[bKey];

            document.getElementById('score-a-1').innerText = a.fps + ' FPS';
            document.getElementById('score-b-1').innerText = b.fps + ' FPS';

            document.getElementById('score-a-2').innerText = a.points.toLocaleString() + ' Pts';
            document.getElementById('score-b-2').innerText = b.points.toLocaleString() + ' Pts';

            document.getElementById('bar-a-1').style.width = Math.min((a.fps / 160) * 100, 100) + '%';
            document.getElementById('bar-b-1').style.width = Math.min((b.fps / 160) * 100, 100) + '%';

            document.getElementById('bar-a-2').style.width = Math.min((a.points / 45000) * 100, 100) + '%';
            document.getElementById('bar-b-2').style.width = Math.min((b.points / 45000) * 100, 100) + '%';
        }

        function setBenchWorkload(type) {
            const btns = ['gaming', 'rendering', 'ai'];
            btns.forEach(b => {
                const el = document.getElementById(`btn-workload-${b}`);
                if(b === type) {
                    el.className = "px-3 py-2 rounded-xl font-bold border border-cyber-cyan bg-cyber-cyan/20 text-cyber-cyan";
                } else {
                    el.className = "px-3 py-2 rounded-xl font-bold border border-white/10 hover:border-cyber-cyan text-gray-300";
                }
            });

            if(type === 'gaming') {
                document.getElementById('bench-label-1').innerText = '4K Cyberpunk 2077 RayTracing (FPS)';
                document.getElementById('bench-label-2').innerText = 'Cinebench R23 Multi-Core (Points)';
            } else if(type === 'rendering') {
                document.getElementById('bench-label-1').innerText = 'Blender 3D Render Time (Secs - Lower Best)';
                document.getElementById('bench-label-2').innerText = 'V-Ray GPU Render Benchmark Score';
            } else {
                document.getElementById('bench-label-1').innerText = 'LLM Tokens Generated per Sec (T/s)';
                document.getElementById('bench-label-2').innerText = 'Tensor Core FP16 TFLOPS';
            }
            updateBenchmarkVisual();
        }

        // PC Configurator Calculator
        function setBuildCategory(cat) {
            const tabs = ['gaming', 'workstation', 'server'];
            tabs.forEach(t => {
                const el = document.getElementById(`tab-cat-${t}`);
                if(t === cat) {
                    el.className = "px-6 py-3 rounded-xl font-bold bg-gradient-to-r from-cyber-blue to-cyber-cyan text-cyber-midnight shadow-lg transition";
                } else {
                    el.className = "px-6 py-3 rounded-xl font-bold cyber-glass hover:border-cyber-cyan text-gray-300 transition";
                }
            });
        }

        function calcPCConfig() {
            const cpu = document.getElementById('config-cpu');
            const gpu = document.getElementById('config-gpu');
            const ram = document.getElementById('config-ram');
            const psu = document.getElementById('config-psu');

            const cpuPrice = parseInt(cpu.value) || 0;
            const gpuPrice = parseInt(gpu.value) || 0;
            const ramPrice = parseInt(ram.value) || 0;
            const psuPrice = parseInt(psu.value) || 0;

            const total = cpuPrice + gpuPrice + ramPrice + psuPrice;

            const cpuWatt = parseInt(cpu.options[cpu.selectedIndex]?.dataset.watt) || 0;
            const gpuWatt = parseInt(gpu.options[gpu.selectedIndex]?.dataset.watt) || 0;
            const ramWatt = parseInt(ram.options[ram.selectedIndex]?.dataset.watt) || 0;

            const watt = cpuWatt + gpuWatt + ramWatt + 60;
            document.getElementById('calc-watt').innerText = watt + ' Watt';
            document.getElementById('calc-watt-bar').style.width = Math.min((watt / 1200) * 100, 100) + '%';

            document.getElementById('calc-subtotal').innerText = 'Rp ' + total.toLocaleString('id-ID');
            document.getElementById('calc-total').innerText = 'Rp ' + total.toLocaleString('id-ID');
        }

        function saveBuildRequest() {
            const total = document.getElementById('calc-total').innerText;
            if(total === 'Rp 0') {
                alert('Pilih komponen terlebih dahulu!');
                return;
            }
            triggerConfetti();
            const msg = encodeURIComponent(`Halo Cyberwave IT! Saya ingin memesan rakitan system dengan estimasi total: ${total}`);
            window.open(`https://wa.me/6281234567890?text=${msg}`, '_blank');
        }

        // Cart Management
        let cart = [];
        function addToCart(name, price) {
            cart.push({ name, price });
            updateCartUI();
            triggerConfetti();
            toggleModal('cart-modal');
        }

        function updateCartUI() {
            document.getElementById('cart-counter').innerText = cart.length;
            const container = document.getElementById('cart-items');
            if(cart.length === 0) {
                container.innerHTML = `<p class="text-gray-400 text-center py-8">No hardware components selected ⚡</p>`;
                document.getElementById('cart-total').innerText = 'Rp 0';
                return;
            }

            let html = '';
            let total = 0;
            cart.forEach((item, index) => {
                total += item.price;
                html += `
                    <div class="flex items-center justify-between p-3 rounded-xl bg-cyber-midnight border border-cyber-cyan/30">
                        <div>
                            <h5 class="font-bold text-white">${item.name}</h5>
                            <span class="text-cyber-cyan font-semibold">Rp ${item.price.toLocaleString('id-ID')}</span>
                        </div>
                        <button onclick="removeFromCart(${index})" class="text-rose-400 hover:text-rose-300"><i class="fa-solid fa-trash"></i></button>
                    </div>
                `;
            });
            container.innerHTML = html;
            document.getElementById('cart-total').innerText = 'Rp ' + total.toLocaleString('id-ID');
        }

        function removeFromCart(index) {
            cart.splice(index, 1);
            updateCartUI();
        }

        function checkoutCart() {
            if(cart.length === 0) return;
            const items = cart.map(c => `- ${c.name} (Rp ${c.price.toLocaleString('id-ID')})`).join('%0A');
            const total = document.getElementById('cart-total').innerText;
            const msg = `Halo Cyberwave! Saya ingin memesan hardware berikut:%0A${items}%0A%0ATotal: ${total}`;
            window.open(`https://wa.me/6281234567890?text=${msg}`, '_blank');
        }

        function toggleModal(id) {
            document.getElementById(id).classList.toggle('hidden');
        }

        function toggleFAQ(button) {
            const content = button.nextElementSibling;
            const icon = button.querySelector('i');
            content.classList.toggle('hidden');
            icon.classList.toggle('rotate-180');
        }

        function sendAIMessage() {
            const input = document.getElementById('ai-input');
            const text = input.value.trim();
            if(!text) return;

            const body = document.getElementById('ai-chat-body');
            body.innerHTML += `
                <div class="flex items-start justify-end gap-2.5">
                    <div class="bg-gradient-to-r from-cyber-blue to-cyber-cyan p-3 rounded-2xl rounded-tr-none text-cyber-midnight font-bold max-w-[85%] font-mono">
                        ${text}
                    </div>
                </div>
            `;
            input.value = '';
            body.scrollTop = body.scrollHeight;

            setTimeout(() => {
                let reply = "Untuk throughput maksimal pada server cluster, disarankan menggunakan konfigurasi **4U High-Density GPU Compute Nodes** dengan jaringan 100G Spine-Leaf Mesh.";
                if(text.toLowerCase().includes('gpu') || text.toLowerCase().includes('4090')) {
                    reply = "**NVIDIA RTX 4090 24GB Liquid Armor** adalah pilihan terbaik untuk AI Tensor Processing & Ultra 4K Gaming!";
                }
                body.innerHTML += `
                    <div class="flex items-start gap-2.5 font-mono">
                        <div class="w-8 h-8 rounded-xl bg-cyber-cyan/20 text-cyber-cyan flex items-center justify-center text-sm shrink-0">🤖</div>
                        <div class="bg-cyber-midnight border border-cyber-cyan/30 p-3 rounded-2xl rounded-tl-none text-gray-200 leading-relaxed max-w-[85%]">
                            ${reply}
                        </div>
                    </div>
                `;
                body.scrollTop = body.scrollHeight;
            }, 500);
        }

        function handleConsultationSubmit(e) {
            e.preventDefault();
            triggerConfetti();
            alert('Request Assessment / SLA Berhasil Terkirim! Tim Senior Architect Cyberwave akan meluncurkan penawaran dalam 15 menit.');
            toggleModal('consultation-modal');
        }

        // BACKGROUND CANVAS (CYBERWAVE QUANTUM GRID & NODE PARTICLES)
        const bgCanvas = document.getElementById('cyberwave-bg-canvas');
        const bgCtx = bgCanvas.getContext('2d');
        let bgWidth = bgCanvas.width = window.innerWidth;
        let bgHeight = bgCanvas.height = window.innerHeight;

        window.addEventListener('resize', () => {
            bgWidth = bgCanvas.width = window.innerWidth;
            bgHeight = bgCanvas.height = window.innerHeight;
            initTopologyCanvas();
        });

        const bgParticles = Array.from({ length: 50 }, () => ({
            x: Math.random() * bgWidth,
            y: Math.random() * bgHeight,
            size: Math.random() * 3 + 1,
            speedY: Math.random() * 1 + 0.3,
            opacity: Math.random() * 0.7 + 0.3
        }));

        function drawBgParticles() {
            bgCtx.clearRect(0, 0, bgWidth, bgHeight);
            bgParticles.forEach(p => {
                bgCtx.save();
                bgCtx.globalAlpha = p.opacity;
                bgCtx.fillStyle = '#00F0FF';
                bgCtx.shadowBlur = 8;
                bgCtx.shadowColor = '#0066FF';
                bgCtx.beginPath();
                bgCtx.arc(p.x, p.y, p.size, 0, Math.PI * 2);
                bgCtx.fill();
                bgCtx.restore();

                p.y += p.speedY;
                if(p.y > bgHeight) p.y = -5;
            });
            requestAnimationFrame(drawBgParticles);
        }
        drawBgParticles();

        // NETWORK TOPOLOGY NODE GRAPH CANVAS
        let topCanvas, topCtx, nodes = [];
        function initTopologyCanvas() {
            topCanvas = document.getElementById('topology-canvas');
            if(!topCanvas) return;
            topCtx = topCanvas.getContext('2d');
            topCanvas.width = topCanvas.parentElement.clientWidth;
            topCanvas.height = topCanvas.parentElement.clientHeight;

            nodes = Array.from({ length: 18 }, () => ({
                x: Math.random() * (topCanvas.width - 40) + 20,
                y: Math.random() * (topCanvas.height - 40) + 20,
                vx: (Math.random() - 0.5) * 1.2,
                vy: (Math.random() - 0.5) * 1.2,
                radius: Math.random() * 4 + 3
            }));
        }
        initTopologyCanvas();

        function drawTopologyNodes() {
            if(!topCtx) return;
            topCtx.clearRect(0, 0, topCanvas.width, topCanvas.height);

            // Draw Connection Lines
            for(let i = 0; i < nodes.length; i++) {
                for(let j = i + 1; j < nodes.length; j++) {
                    const dx = nodes[i].x - nodes[j].x;
                    const dy = nodes[i].y - nodes[j].y;
                    const dist = Math.sqrt(dx * dx + dy * dy);

                    if(dist < 130) {
                        topCtx.save();
                        topCtx.strokeStyle = `rgba(0, 240, 255, ${1 - dist / 130})`;
                        topCtx.lineWidth = 1;
                        topCtx.beginPath();
                        topCtx.moveTo(nodes[i].x, nodes[i].y);
                        topCtx.lineTo(nodes[j].x, nodes[j].y);
                        topCtx.stroke();
                        topCtx.restore();
                    }
                }
            }

            // Draw Nodes & Move
            nodes.forEach(n => {
                topCtx.save();
                topCtx.fillStyle = '#00F0FF';
                topCtx.shadowBlur = 10;
                topCtx.shadowColor = '#0066FF';
                topCtx.beginPath();
                topCtx.arc(n.x, n.y, n.radius, 0, Math.PI * 2);
                topCtx.fill();
                topCtx.restore();

                n.x += n.vx;
                n.y += n.vy;

                if(n.x < 10 || n.x > topCanvas.width - 10) n.vx *= -1;
                if(n.y < 10 || n.y > topCanvas.height - 10) n.vy *= -1;
            });

            requestAnimationFrame(drawTopologyNodes);
        }
        drawTopologyNodes();
    </script>

<script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.6.0/dist/confetti.browser.min.js"></script>
<script src="{{ asset('js/website-bisnis/templates/technology-it/hardware-computer-networking/cyberwave/cyberwave.js') }}"></script>
</body>
</html>