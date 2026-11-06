<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Maison Breads &amp; Pastry menghadirkan roti artisan dan pastry premium dengan fermentasi alami dan bahan pilihan.">
    <title>Maison Breads &amp; Pastry - Bold Luxury Bakery</title>
    @vite('resources/css/app.css')
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@500;700;900&amp;family=Plus+Jakarta+Sans:wght@300;400;500;600;700&amp;display=swap" rel="stylesheet">
    <style>
        ::-webkit-scrollbar { width: 8px; }
        ::-webkit-scrollbar-track { background: #1C1412; }
        ::-webkit-scrollbar-thumb { background: #241D1B; border: 1px solid #C59B27; }
        ::-webkit-scrollbar-thumb:hover { background: #C59B27; }
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
        body.bakery-bold-preview > :not(header):not(.bakery-bold-hero) { display: none !important; }
    </style>
</head>
<body class="bg-espresso text-oat font-sans antialiased selection:bg-ochre selection:text-espresso relative{{ request()->boolean('preview') ? ' bakery-bold-preview' : '' }}">
<!-- 1. TOPBAR / NAVBAR -->
    <header class="bg-espresso/95 backdrop-blur-md border-b border-ochre/20 sticky top-0 z-40">
        <div class="max-w-7xl mx-auto px-6 py-4 flex items-center justify-between">
            <a href="#" class="font-cinzel text-2xl font-bold tracking-widest text-ochre uppercase">
                Maison<span class="text-oat">.</span>
            </a>

            <!-- Navigation Links -->
            <nav class="hidden md:flex items-center space-x-8 text-xs font-semibold tracking-widest uppercase text-oat/80">
                <a href="#about" class="hover:text-ochre transition-colors">Filosofi</a>
                <a href="#menu" class="hover:text-ochre transition-colors">Katalog Artisan</a>
                <a href="#location" class="hover:text-ochre transition-colors">Outlet &amp; Jam</a>
                <a href="#faq" class="hover:text-ochre transition-colors">FAQ</a>
            </nav>

            <div class="flex items-center space-x-4">
                <button onclick="openPreorderModal('General Pre-Order')" class="hidden sm:inline-block bg-ochre hover:bg-ochre-hover text-espresso font-bold px-6 py-2.5 rounded-none text-xs uppercase tracking-widest transition-all shadow-lg hover:shadow-ochre/20">
                    Pre-Order
                </button>
                
                <!-- Mobile Menu Button -->
                <button onclick="toggleMobileMenu()" class="md:hidden text-oat focus:outline-none">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
            </div>
        </div>

        <!-- Mobile Nav Menu -->
        <div id="mobileMenu" class="hidden md:hidden bg-charcoal border-b border-ochre/20 px-6 py-4 space-y-3">
            <a href="#about" onclick="toggleMobileMenu()" class="block text-xs uppercase tracking-widest text-oat/80 hover:text-ochre">Filosofi</a>
            <a href="#menu" onclick="toggleMobileMenu()" class="block text-xs uppercase tracking-widest text-oat/80 hover:text-ochre">Katalog Artisan</a>
            <a href="#location" onclick="toggleMobileMenu()" class="block text-xs uppercase tracking-widest text-oat/80 hover:text-ochre">Outlet &amp; Jam</a>
            <a href="#faq" onclick="toggleMobileMenu()" class="block text-xs uppercase tracking-widest text-oat/80 hover:text-ochre">FAQ</a>
            <button onclick="toggleMobileMenu(); openPreorderModal('General Pre-Order');" class="w-full bg-ochre text-espresso font-bold py-2 text-xs uppercase tracking-widest">
                Pre-Order
            </button>
        </div>
    </header>

    <!-- 2. HERO SECTION -->
    <section class="bakery-bold-hero relative min-h-[85vh] flex items-center justify-center bg-charcoal overflow-hidden border-b border-ochre/20">
        <!-- Background Banner -->
        <div class="absolute inset-0 opacity-30 bg-cover bg-center" style="background-image: url('https://images.unsplash.com/photo-1509440159596-0249088772ff?auto=format&amp;fit=crop&amp;q=80&amp;w=1920');"></div>
        <div class="absolute inset-0 bg-gradient-to-t from-espresso via-espresso/70 to-transparent"></div>

        <div class="relative max-w-5xl mx-auto px-6 py-20 text-center z-10">
            <span class="inline-block text-ochre font-bold tracking-[0.3em] text-xs uppercase mb-4 border-b-2 border-ochre pb-1">
                CRAFTED WITH PASSION
            </span>
            <h1 class="font-cinzel text-4xl sm:text-6xl md:text-7xl font-black uppercase tracking-tight text-oat mb-6 leading-tight">
                Artisanal Breads.<br><span class="text-ochre">Unmatched Excellence.</span>
            </h1>
            <p class="max-w-2xl mx-auto text-oat/80 text-base md:text-lg font-light mb-10 leading-relaxed">
                Menghadirkan keintiman rasa roti dan pastry khas Eropa dengan teknik fermentasi alami 72 jam, tepung organik pilihan, dan butter premium dari Prancis.
            </p>
            <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
                <a href="#menu" class="w-full sm:w-auto bg-ochre hover:bg-ochre-hover text-espresso font-bold px-8 py-4 text-xs uppercase tracking-widest transition-all">
                    Jelajahi Menu
                </a>
                <button onclick="openPreorderModal('General Pre-Order')" class="w-full sm:w-auto border border-oat/30 hover:border-ochre text-oat hover:text-ochre font-bold px-8 py-4 text-xs uppercase tracking-widest transition-all">
                    Reservasi &amp; Pre-Order
                </button>
            </div>
        </div>
    </section>

    <!-- HIGHLIGHT FEATURE SECTION -->
    <section id="about" class="py-20 bg-espresso border-b border-ochre/10">
        <div class="max-w-7xl mx-auto px-6 grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="p-8 bg-charcoal border border-ochre/10 text-center hover:border-ochre/40 transition-colors">
                <div class="w-12 h-12 bg-ochre/10 border border-ochre text-ochre mx-auto flex items-center justify-center font-cinzel text-xl font-bold mb-4">01</div>
                <h3 class="font-cinzel text-xl font-bold text-ochre mb-3 uppercase">Natural Sourdough</h3>
                <p class="text-oat/70 text-sm leading-relaxed">Ragi alami yang dipelihara sejak 2018 untuk tekstur renyah di luar, lembut di dalam, dan ramah pencernaan.</p>
            </div>
            <div class="p-8 bg-charcoal border border-ochre/10 text-center hover:border-ochre/40 transition-colors">
                <div class="w-12 h-12 bg-ochre/10 border border-ochre text-ochre mx-auto flex items-center justify-center font-cinzel text-xl font-bold mb-4">02</div>
                <h3 class="font-cinzel text-xl font-bold text-ochre mb-3 uppercase">French Butter 84%</h3>
                <p class="text-oat/70 text-sm leading-relaxed">Mentega artisan dari Normandy yang menghasilkan lapisan croissant renyah, ringan, dan luar biasa harum.</p>
            </div>
            <div class="p-8 bg-charcoal border border-ochre/10 text-center hover:border-ochre/40 transition-colors">
                <div class="w-12 h-12 bg-ochre/10 border border-ochre text-ochre mx-auto flex items-center justify-center font-cinzel text-xl font-bold mb-4">03</div>
                <h3 class="font-cinzel text-xl font-bold text-ochre mb-3 uppercase">Zero Preservatives</h3>
                <p class="text-oat/70 text-sm leading-relaxed">Dibuat segar setiap pagi secara terbatas tanpa pemutih, pengawet, maupun bahan kimia buatan.</p>
            </div>
        </div>
    </section>

    <!-- 3. PRODUCT CATALOG WITH CATEGORY FILTER -->
    <section id="menu" class="py-24 bg-charcoal">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center mb-12">
                <span class="text-ochre text-xs font-bold tracking-[0.2em] uppercase">Pilihan Terbaik Hari Ini</span>
                <h2 class="font-cinzel text-3xl md:text-5xl font-bold uppercase text-oat tracking-wider mt-2 mb-4">Katalog Artisan</h2>
                <div class="w-16 h-1 bg-ochre mx-auto"></div>
            </div>

            <!-- Category Filter Tabs -->
            <div class="flex justify-center space-x-2 sm:space-x-4 mb-12 overflow-x-auto pb-2">
                <button onclick="filterCategory('all')" id="btn-all" class="cat-btn bg-ochre text-espresso px-5 py-2 text-xs font-bold uppercase tracking-wider transition-all">Semua</button>
                <button onclick="filterCategory('croissant')" id="btn-croissant" class="cat-btn bg-espresso text-oat/70 border border-ochre/20 hover:border-ochre px-5 py-2 text-xs font-bold uppercase tracking-wider transition-all">Croissant &amp; Viennoiserie</button>
                <button onclick="filterCategory('bread')" id="btn-bread" class="cat-btn bg-espresso text-oat/70 border border-ochre/20 hover:border-ochre px-5 py-2 text-xs font-bold uppercase tracking-wider transition-all">Sourdough &amp; Breads</button>
                <button onclick="filterCategory('pastry')" id="btn-pastry" class="cat-btn bg-espresso text-oat/70 border border-ochre/20 hover:border-ochre px-5 py-2 text-xs font-bold uppercase tracking-wider transition-all">Sweet Pastry</button>
            </div>

            <!-- Product Grid -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Item 1 -->
                <div class="menu-item croissant bg-espresso border border-ochre/20 group hover:border-ochre transition-all">
                    <div class="overflow-hidden h-64 relative">
                        <img src="https://images.unsplash.com/photo-1555507036-ab1f4038808a?auto=format&amp;fit=crop&amp;q=80&amp;w=800" alt="Butter Croissant" loading="lazy" decoding="async" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                        <span class="absolute top-4 left-4 bg-ochre text-espresso text-[10px] font-bold px-2 py-1 uppercase tracking-widest">Best Seller</span>
                    </div>
                    <div class="p-6">
                        <h3 class="font-cinzel text-xl font-bold text-oat mb-2">Classic Butter Croissant</h3>
                        <p class="text-oat/70 text-sm mb-4 min-h-[40px]">Lapisan flaky sempurna beraroma mentega Prancis yang kaya dengan tekstur krispi alami.</p>
                        <div class="flex items-center justify-between border-t border-oat/10 pt-4">
                            <span class="font-bold text-ochre text-lg">Rp 38.000</span>
                            <button onclick="openPreorderModal('Classic Butter Croissant')" class="text-xs font-bold bg-ochre/10 hover:bg-ochre hover:text-espresso text-ochre px-4 py-2 border border-ochre/30 uppercase tracking-wider transition-all">
                                Pre-Order
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Item 2 -->
                <div class="menu-item bread bg-espresso border border-ochre/20 group hover:border-ochre transition-all">
                    <div class="overflow-hidden h-64 relative">
                        <img src="https://images.unsplash.com/photo-1586444248902-2f64eddc13df?auto=format&amp;fit=crop&amp;q=80&amp;w=800" alt="Country Sourdough" loading="lazy" decoding="async" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                        <span class="absolute top-4 left-4 bg-ochre text-espresso text-[10px] font-bold px-2 py-1 uppercase tracking-widest">Signature</span>
                    </div>
                    <div class="p-6">
                        <h3 class="font-cinzel text-xl font-bold text-oat mb-2">Country Sourdough Loaf</h3>
                        <p class="text-oat/70 text-sm mb-4 min-h-[40px]">Roti sourdough khas pedesaan Prancis dengan fermentasi 72 jam, rasa asam lembut dan crust renyah.</p>
                        <div class="flex items-center justify-between border-t border-oat/10 pt-4">
                            <span class="font-bold text-ochre text-lg">Rp 65.000</span>
                            <button onclick="openPreorderModal('Country Sourdough Loaf')" class="text-xs font-bold bg-ochre/10 hover:bg-ochre hover:text-espresso text-ochre px-4 py-2 border border-ochre/30 uppercase tracking-wider transition-all">
                                Pre-Order
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Item 3 -->
                <div class="menu-item croissant pastry bg-espresso border border-ochre/20 group hover:border-ochre transition-all">
                    <div class="overflow-hidden h-64 relative">
                        <img src="https://images.unsplash.com/photo-1608198093002-ad4e005484ec?auto=format&amp;fit=crop&amp;q=80&amp;w=800" alt="Pain Au Chocolat" loading="lazy" decoding="async" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                    </div>
                    <div class="p-6">
                        <h3 class="font-cinzel text-xl font-bold text-oat mb-2">Pain Au Chocolat</h3>
                        <p class="text-oat/70 text-sm mb-4 min-h-[40px]">Dua batangan cokelat hitam Valrhona 66% terbungkus pasteri renyah berlapis butter.</p>
                        <div class="flex items-center justify-between border-t border-oat/10 pt-4">
                            <span class="font-bold text-ochre text-lg">Rp 42.000</span>
                            <button onclick="openPreorderModal('Pain Au Chocolat')" class="text-xs font-bold bg-ochre/10 hover:bg-ochre hover:text-espresso text-ochre px-4 py-2 border border-ochre/30 uppercase tracking-wider transition-all">
                                Pre-Order
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Item 4 -->
                <div class="menu-item bread bg-espresso border border-ochre/20 group hover:border-ochre transition-all">
                    <div class="overflow-hidden h-64 relative">
                        <img src="https://images.unsplash.com/photo-1509440159596-0249088772ff?auto=format&amp;fit=crop&amp;q=80&amp;w=800" alt="Focaccia" loading="lazy" decoding="async" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                    </div>
                    <div class="p-6">
                        <h3 class="font-cinzel text-xl font-bold text-oat mb-2">Rosemary &amp; Olive Focaccia</h3>
                        <p class="text-oat/70 text-sm mb-4 min-h-[40px]">Focaccia Italia bertabur rosemary segar, buah zaitun hitam, dan minyak zaitun extra virgin.</p>
                        <div class="flex items-center justify-between border-t border-oat/10 pt-4">
                            <span class="font-bold text-ochre text-lg">Rp 58.000</span>
                            <button onclick="openPreorderModal('Rosemary &amp; Olive Focaccia')" class="text-xs font-bold bg-ochre/10 hover:bg-ochre hover:text-espresso text-ochre px-4 py-2 border border-ochre/30 uppercase tracking-wider transition-all">
                                Pre-Order
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Item 5 -->
                <div class="menu-item pastry bg-espresso border border-ochre/20 group hover:border-ochre transition-all">
                    <div class="overflow-hidden h-64 relative">
                        <img src="https://images.unsplash.com/photo-1530610476181-d83430b64dcd?auto=format&amp;fit=crop&amp;q=80&amp;w=800" alt="Cinnamon Roll" loading="lazy" decoding="async" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                    </div>
                    <div class="p-6">
                        <h3 class="font-cinzel text-xl font-bold text-oat mb-2">Artisan Cinnamon Brioche</h3>
                        <p class="text-oat/70 text-sm mb-4 min-h-[40px]">Roti brioche kayu manis organik berkilau dengan saus cream cheese vanilla bourbon.</p>
                        <div class="flex items-center justify-between border-t border-oat/10 pt-4">
                            <span class="font-bold text-ochre text-lg">Rp 45.000</span>
                            <button onclick="openPreorderModal('Artisan Cinnamon Brioche')" class="text-xs font-bold bg-ochre/10 hover:bg-ochre hover:text-espresso text-ochre px-4 py-2 border border-ochre/30 uppercase tracking-wider transition-all">
                                Pre-Order
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Item 6 -->
                <div class="menu-item croissant pastry bg-espresso border border-ochre/20 group hover:border-ochre transition-all">
                    <div class="overflow-hidden h-64 relative">
                        <img src="https://images.unsplash.com/photo-1549903072-7e6e0bedb7fb?auto=format&amp;fit=crop&amp;q=80&amp;w=800" alt="Almond Croissant" loading="lazy" decoding="async" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                    </div>
                    <div class="p-6">
                        <h3 class="font-cinzel text-xl font-bold text-oat mb-2">Double Baked Almond Croissant</h3>
                        <p class="text-oat/70 text-sm mb-4 min-h-[40px]">Croissant dipanggang dua kali dengan isian frangipane almond dan taburan almon iris.</p>
                        <div class="flex items-center justify-between border-t border-oat/10 pt-4">
                            <span class="font-bold text-ochre text-lg">Rp 48.000</span>
                            <button onclick="openPreorderModal('Double Baked Almond Croissant')" class="text-xs font-bold bg-ochre/10 hover:bg-ochre hover:text-espresso text-ochre px-4 py-2 border border-ochre/30 uppercase tracking-wider transition-all">
                                Pre-Order
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- LOCATION & OPERATIONAL HOURS -->
    <section id="location" class="py-20 bg-espresso border-t border-b border-ochre/20">
        <div class="max-w-7xl mx-auto px-6 grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
            <div>
                <span class="text-ochre font-bold tracking-widest text-xs uppercase">Kunjungi Flagship Boutique Kami</span>
                <h2 class="font-cinzel text-3xl md:text-4xl font-bold text-oat mt-2 mb-6">Maison Flagship Outlet</h2>
                <div class="space-y-4 text-oat/80 text-sm border-l-2 border-ochre pl-6 py-2">
                    <p><strong class="text-ochre">Lokasi:</strong> Jl. Raya Darmo No. 108, Surabaya, Jawa Timur</p>
                    <p><strong class="text-ochre">Jam Operasional:</strong> Selasa – Minggu | 07:00 – 20:00 WIB (Senin Tutup)</p>
                    <p><strong class="text-ochre">Layanan:</strong> Dine-in Experience, Takeaway, &amp; Direct Courier Delivery</p>
                    <p><strong class="text-ochre">Batch Pemanggangan:</strong> Morning Batch (07:00) &amp; Afternoon Batch (14:00)</p>
                </div>
            </div>
            <div class="bg-charcoal p-8 border border-ochre/20 text-center relative overflow-hidden">
                <div class="absolute -right-10 -bottom-10 w-40 h-40 bg-ochre/5 rounded-full blur-2xl"></div>
                <h3 class="font-cinzel text-xl font-bold text-ochre mb-3 uppercase">Pemesanan Custom &amp; Hampers</h3>
                <p class="text-oat/70 text-sm mb-6 leading-relaxed">Menyediakan catering pastry eksklusif dan hamper artisanal khusus untuk acara pernikahan, hampers korporat, maupun perayaan istimewa.</p>
                <button onclick="openPreorderModal('Custom Hampers &amp; Corporate Event')" class="inline-block bg-ochre hover:bg-ochre-hover text-espresso font-bold px-8 py-3 text-xs uppercase tracking-widest transition-all">
                    Hubungi Concierge
                </button>
            </div>
        </div>
    </section>

    <!-- 4. INTERACTIVE FAQ SECTION -->
    <section id="faq" class="py-24 bg-charcoal">
        <div class="max-w-4xl mx-auto px-6">
            <div class="text-center mb-16">
                <span class="text-ochre font-bold tracking-widest text-xs uppercase">Informasi &amp; Layanan</span>
                <h2 class="font-cinzel text-3xl md:text-4xl font-bold uppercase text-oat mt-2 mb-4">Frequently Asked Questions</h2>
                <div class="w-16 h-1 bg-ochre mx-auto"></div>
            </div>

            <div class="space-y-4">
                <!-- FAQ Item 1 -->
                <div class="bg-espresso border border-ochre/10 overflow-hidden">
                    <button onclick="toggleFaq(1)" class="w-full p-6 text-left flex justify-between items-center focus:outline-none">
                        <span class="font-cinzel text-base font-bold text-ochre">Bagaimana sistem Pre-Order untuk produk Artisan Bakery?</span>
                        <span id="faq-icon-1" class="text-ochre font-bold text-xl transition-transform duration-300">+</span>
                    </button>
                    <div id="faq-answer-1" class="hidden px-6 pb-6 text-oat/70 text-sm leading-relaxed border-t border-oat/5 pt-4">
                        Karena proses fermentasi ragi alami memakan waktu hingga 72 jam, kami menyarankan melakukan pemesanan H-1 sebelum pukul 17:00 WIB untuk pengiriman atau pengambilan esok hari agar roti dipanggang segar khusus untuk Anda.
                    </div>
                </div>

                <!-- FAQ Item 2 -->
                <div class="bg-espresso border border-ochre/10 overflow-hidden">
                    <button onclick="toggleFaq(2)" class="w-full p-6 text-left flex justify-between items-center focus:outline-none">
                        <span class="font-cinzel text-base font-bold text-ochre">Apakah bahan yang digunakan 100% organik dan halal?</span>
                        <span id="faq-icon-2" class="text-ochre font-bold text-xl transition-transform duration-300">+</span>
                    </button>
                    <div id="faq-answer-2" class="hidden px-6 pb-6 text-oat/70 text-sm leading-relaxed border-t border-oat/5 pt-4">
                        Ya, seluruh tepung organik diimpor secara langsung dan bersertifikat. Seluruh bahan yang kami gunakan 100% halal, tanpa pengawet, tanpa perisa buatan, maupun pewarna sintesis.
                    </div>
                </div>

                <!-- FAQ Item 3 -->
                <div class="bg-espresso border border-ochre/10 overflow-hidden">
                    <button onclick="toggleFaq(3)" class="w-full p-6 text-left flex justify-between items-center focus:outline-none">
                        <span class="font-cinzel text-base font-bold text-ochre">Bagaimana ketentuan pengiriman eksklusif?</span>
                        <span id="faq-icon-3" class="text-ochre font-bold text-xl transition-transform duration-300">+</span>
                    </button>
                    <div id="faq-answer-3" class="hidden px-6 pb-6 text-oat/70 text-sm leading-relaxed border-t border-oat/5 pt-4">
                        Pengiriman dilakukan menggunakan kurir khusus berpendingin atau instan khusus area Surabaya dan sekitarnya guna memastikan kerapihan serta kesegaran renyahnya pastry saat tiba di tempat Anda.
                    </div>
                </div>

                <!-- FAQ Item 4 -->
                <div class="bg-espresso border border-ochre/10 overflow-hidden">
                    <button onclick="toggleFaq(4)" class="w-full p-6 text-left flex justify-between items-center focus:outline-none">
                        <span class="font-cinzel text-base font-bold text-ochre">Berapa lama daya simpan roti sourdough &amp; croissant Maison?</span>
                        <span id="faq-icon-4" class="text-ochre font-bold text-xl transition-transform duration-300">+</span>
                    </button>
                    <div id="faq-answer-4" class="hidden px-6 pb-6 text-oat/70 text-sm leading-relaxed border-t border-oat/5 pt-4">
                        Sourdough bertahan hingga 3 hari di suhu ruang atau 2 minggu di freezer. Croissant terbaik dikonsumsi pada hari yang sama atau dapat dipanaskan ulang di oven/air fryer pada suhu 160°C selama 3-5 menit.
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 5. FOOTER -->
    <footer class="bg-espresso text-oat/60 border-t border-ochre/20 py-12 text-sm">
        <div class="max-w-7xl mx-auto px-6 flex flex-col md:flex-row items-center justify-between gap-6">
            <div>
                <a href="#" class="font-cinzel text-xl font-bold tracking-widest text-ochre uppercase">Maison Breads &amp; Pastry</a>
                <p class="text-xs text-oat/40 mt-1">© 2026 Maison Breads. All rights reserved. Powered by WEBIA Architecture.</p>
            </div>
            <div class="flex space-x-6 text-xs uppercase tracking-wider">
                <a href="#" class="hover:text-ochre transition-colors">Privacy Policy</a>
                <a href="#" class="hover:text-ochre transition-colors">Terms of Service</a>
                <a href="#" class="hover:text-ochre transition-colors">Instagram</a>
            </div>
        </div>
    </footer>

    <!-- 6. FLOATING BUTTONS -->
    
    <!-- Floating WhatsApp Button -->
    <a href="https://wa.me/6281234567890?text=Halo%20Maison%20Breads,%20saya%20ingin%20tanya%20mengenai%20pre-order%20artisan%20bakery" target="_blank" title="Hubungi WhatsApp" class="fixed bottom-6 right-6 z-40 bg-[#25D366] hover:bg-[#20ba5a] text-white p-3.5 rounded-full shadow-2xl transition-transform hover:scale-110 flex items-center justify-center">
        <svg class="w-6 h-6 fill-current" viewBox="0 0 24 24">
            <path d="M12.031 0c-6.627 0-12 5.373-12 12 0 2.159.57 4.26 1.654 6.103l-1.685 6.152 6.293-1.651c1.787.974 3.805 1.496 5.869 1.496 6.627 0 12-5.373 12-12s-5.373-12-12-12zm5.834 16.92c-.244.688-1.22 1.32-1.99 1.488-.526.115-1.213.208-3.52-.746-2.951-1.218-4.851-4.225-4.998-4.422-.147-.197-1.199-1.597-1.199-3.045 0-1.448.758-2.162 1.026-2.456.268-.293.585-.366.78-.366.195 0 .39.002.56.01.181.007.423-.069.663.508.244.586.83 2.028.903 2.174.073.146.122.317.024.512-.098.195-.146.317-.293.488-.146.171-.307.382-.439.512-.146.146-.298.305-.128.598.17.293.754 1.245 1.622 2.019 1.116.994 2.057 1.302 2.35 1.448.293.146.464.122.635-.073.171-.195.732-.854.928-1.147.195-.293.39-.244.659-.146.268.098 1.708.805 2.001.952.293.146.488.22.56.342.073.122.073.708-.171 1.396z"></path>
        </svg>
    </a>

    <!-- Floating AI Business Chatbot Button -->
    <button onclick="toggleChatbot()" title="Tanya AI Concierge" class="fixed bottom-20 right-6 z-40 bg-ochre hover:bg-ochre-hover text-espresso p-3.5 rounded-full shadow-2xl transition-transform hover:scale-110 flex items-center justify-center border-2 border-espresso">
        <svg class="w-6 h-6 fill-current" viewBox="0 0 24 24">
            <path d="M12 2a2 2 0 0 1 2 2v1a2 2 0 0 1-2 2 2 2 0 0 1-2-2V4a2 2 0 0 1 2-2zm8 7a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2h-1.2a4 4 0 0 1-3.8 2.8H9a4 4 0 0 1-3.8-2.8H4a2 2 0 0 1-2-2v-8a2 2 0 0 1 2-2h16zm-5 3a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3zm-6 0a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3z"></path>
        </svg>
    </button>

    <!-- INTERACTIVE AI CHATBOT MODAL WIDGET -->
    <div id="chatbotModal" class="fixed bottom-28 right-6 z-50 w-80 sm:w-96 bg-espresso border border-ochre shadow-2xl rounded-none hidden flex-col overflow-hidden">
        <div class="bg-charcoal p-4 border-b border-ochre/20 flex justify-between items-center">
            <div class="flex items-center space-x-2">
                <div class="w-2.5 h-2.5 bg-ochre rounded-full animate-pulse"></div>
                <h4 class="font-cinzel text-sm font-bold text-ochre uppercase">Maison AI Concierge</h4>
            </div>
            <button onclick="toggleChatbot()" class="text-oat/60 hover:text-ochre font-bold">×</button>
        </div>
        <div id="chatMessages" class="p-4 h-64 overflow-y-auto space-y-3 text-xs">
            <div class="bg-charcoal p-3 border-l-2 border-ochre text-oat/90">
                Bonjour! Saya AI Concierge Maison Breads. Ada yang bisa saya bantu mengenai menu artisan, reservasi, atau jam operasional kami?
            </div>
        </div>
        <div class="p-3 bg-charcoal border-t border-ochre/20 flex gap-2">
            <input type="text" id="chatInput" onkeydown="if(event.key==='Enter') sendChatMessage()" placeholder="Ketik pertanyaan..." class="w-full bg-espresso border border-ochre/20 px-3 py-2 text-xs text-oat focus:outline-none focus:border-ochre">
            <button onclick="sendChatMessage()" class="bg-ochre text-espresso px-3 py-2 text-xs font-bold uppercase">Kirim</button>
        </div>
    </div>

    <!-- PRE-ORDER FORM MODAL -->
    <div id="preorderModal" class="fixed inset-0 z-50 bg-black/80 backdrop-blur-sm hidden items-center justify-center p-4">
        <div class="bg-espresso border border-ochre max-w-md w-full p-6 relative">
            <button onclick="closePreorderModal()" class="absolute top-4 right-4 text-oat/60 hover:text-ochre font-bold text-xl">×</button>
            
            <h3 class="font-cinzel text-2xl font-bold text-ochre mb-2">Form Pre-Order Artisan</h3>
            <p id="selectedProductText" class="text-xs text-oat/70 mb-6 border-b border-ochre/20 pb-2">Produk: General Pre-Order</p>

            <form onsubmit="handlePreorderSubmit(event)" class="space-y-4 text-xs">
                <div>
                    <label class="block text-ochre uppercase tracking-wider mb-1">Nama Lengkap</label>
                    <input type="text" name="name" required placeholder="Masukkan nama Anda" class="w-full bg-charcoal border border-ochre/20 p-2.5 text-oat focus:border-ochre outline-none">
                </div>
                <div>
                    <label class="block text-ochre uppercase tracking-wider mb-1">Nomor WhatsApp</label>
                    <input type="tel" name="phone" required placeholder="08123456789" class="w-full bg-charcoal border border-ochre/20 p-2.5 text-oat focus:border-ochre outline-none">
                </div>
                <div>
                    <label class="block text-ochre uppercase tracking-wider mb-1">Tanggal Pengambilan / Kirim</label>
                    <input type="date" name="date" required class="w-full bg-charcoal border border-ochre/20 p-2.5 text-oat focus:border-ochre outline-none">
                </div>
                <div>
                    <label class="block text-ochre uppercase tracking-wider mb-1">Catatan Khusus</label>
                    <textarea name="notes" rows="2" placeholder="Catatan alergi atau instruksi khusus" class="w-full bg-charcoal border border-ochre/20 p-2.5 text-oat focus:border-ochre outline-none"></textarea>
                </div>
                <button type="submit" class="w-full bg-ochre hover:bg-ochre-hover text-espresso font-bold py-3 uppercase tracking-widest transition-colors mt-2">
                    Kirim via WhatsApp
                </button>
            </form>
        </div>
    </div>

    <!-- JAVASCRIPT LOGIC -->
    <script>
        // 1. Mobile Menu Toggle
        function toggleMobileMenu() {
            const menu = document.getElementById('mobileMenu');
            menu.classList.toggle('hidden');
        }

        // 2. FAQ Accordion Toggle
        function toggleFaq(id) {
            const answer = document.getElementById(`faq-answer-${id}`);
            const icon = document.getElementById(`faq-icon-${id}`);
            
            if (answer.classList.contains('hidden')) {
                answer.classList.remove('hidden');
                icon.textContent = '−';
            } else {
                answer.classList.add('hidden');
                icon.textContent = '+';
            }
        }

        // 3. Category Filter
        function filterCategory(cat) {
            const items = document.querySelectorAll('.menu-item');
            const btns = document.querySelectorAll('.cat-btn');

            btns.forEach(btn => {
                btn.classList.remove('bg-ochre', 'text-espresso');
                btn.classList.add('bg-espresso', 'text-oat/70');
            });

            const activeBtn = document.getElementById(`btn-${cat}`);
            if (activeBtn) {
                activeBtn.classList.remove('bg-espresso', 'text-oat/70');
                activeBtn.classList.add('bg-ochre', 'text-espresso');
            }

            items.forEach(item => {
                if (cat === 'all' || item.classList.contains(cat)) {
                    item.style.display = 'block';
                } else {
                    item.style.display = 'none';
                }
            });
        }

        // 4. Pre-order Modal Functions
        let currentProduct = "General Pre-Order";
        function openPreorderModal(productName) {
            currentProduct = productName;
            document.getElementById('selectedProductText').textContent = `Produk: ${productName}`;
            document.getElementById('preorderModal').classList.remove('hidden');
            document.getElementById('preorderModal').classList.add('flex');
        }

        function closePreorderModal() {
            document.getElementById('preorderModal').classList.add('hidden');
            document.getElementById('preorderModal').classList.remove('flex');
        }

        function handlePreorderSubmit(e) {
            e.preventDefault();

            const formData = new FormData(e.currentTarget);
            const message = [
                `Halo Maison Breads, saya ingin pre-order ${currentProduct}.`,
                `Nama: ${formData.get('name')}`,
                `Nomor WhatsApp: ${formData.get('phone')}`,
                `Tanggal pengambilan/pengiriman: ${formData.get('date')}`,
                `Catatan: ${formData.get('notes') || '-'}`,
            ].join('\n');

            window.open(`https://wa.me/6281234567890?text=${encodeURIComponent(message)}`, '_blank', 'noopener,noreferrer');
            closePreorderModal();
        }

        // 5. AI Chatbot Widget Logic
        function toggleChatbot() {
            const bot = document.getElementById('chatbotModal');
            bot.classList.toggle('hidden');
            bot.classList.toggle('flex');
        }

        function sendChatMessage() {
            const input = document.getElementById('chatInput');
            const container = document.getElementById('chatMessages');
            const msg = input.value.trim();

            if (!msg) return;

            // Add user message
            const userBubble = document.createElement('div');
            userBubble.className = 'bg-ochre/20 text-oat p-3 text-right ml-auto border-r-2 border-ochre max-w-[80%]';
            userBubble.textContent = msg;
            container.appendChild(userBubble);

            input.value = '';
            container.scrollTop = container.scrollHeight;

            // Simulate Bot Response
            setTimeout(() => {
                const botBubble = document.createElement('div');
                botBubble.className = 'bg-charcoal p-3 border-l-2 border-ochre text-oat/90 max-w-[80%]';
                
                const lowerMsg = msg.toLowerCase();
                if (lowerMsg.includes('harga') || lowerMsg.includes('menu')) {
                    botBubble.textContent = "Katalog artisan kami berkisar dari Rp 38.000 hingga Rp 65.000. Anda bisa melihat daftar lengkapnya di section Katalog Artisan.";
                } else if (lowerMsg.includes('lokasi') || lowerMsg.includes('buka')) {
                    botBubble.textContent = "Kami berlokasi di Jl. Raya Darmo No. 108, Surabaya. Buka Selasa-Minggu jam 07:00 - 20:00 WIB.";
                } else {
                    botBubble.textContent = "Terima kasih telah bertanya. Untuk pertanyaan khusus ini, Anda juga bisa langsung menghubung tim staf artisan kami via WhatsApp.";
                }

                container.appendChild(botBubble);
                container.scrollTop = container.scrollHeight;
            }, 600);
        }

    </script>


</body>
</html>
