<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pebble & Sprouts - Dunia Keceriaan Si Kecil</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Fredoka:wght@400;500;600;700&family=Quicksand:wght@500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script>
        tailwind.config = { theme: { extend: { colors: {
            pastelPink:'#FFD1DC', pastelPinkDark:'#FF9EAA', pastelYellow:'#FFF5BA',
            pastelYellowDark:'#FFE600', pastelMint:'#C1E1C1', pastelMintDark:'#90D490',
            pastelBlue:'#B5E2FA', pastelBlueDark:'#70C1B3', pastelLavender:'#E6E6FA',
            pastelLavenderDark:'#C7CEEA', pastelCream:'#FFFDF9', textDark:'#5E548E'
        }, fontFamily:{fredoka:['Fredoka','sans-serif'],quicksand:['Quicksand','sans-serif']},
        boxShadow:{cute:'0 10px 25px -5px rgba(255,182,193,.4),0 8px 10px -6px rgba(181,226,250,.4)',glow:'0 0 20px rgba(255,209,220,.8)'} } } };
    </script>
    <link rel="stylesheet" href="{{ asset('css/website-bisnis/templates/retail/baby-kids-products/pebble-sprouts/pebble-sprouts.css') }}">
</head>
<body class="bg-pastelCream text-textDark antialiased selection:bg-pastelPink selection:text-textDark">


    <!-- 1. TOPBAR PROMO -->
    <div class="bg-gradient-to-r from-pastelPink via-pastelYellow to-pastelBlue px-4 py-2 text-xs md:text-sm text-textDark font-semibold shadow-sm">
        <div class="max-w-7xl mx-auto flex flex-col md:flex-row justify-between items-center text-center gap-2">
            <div class="flex items-center gap-2">
                <span class="bg-white/80 px-2 py-0.5 rounded-full text-xs animate-pulse">🎉 Promo Gemoy</span>
                <span>Gratis Ongkir Min. Belanja Rp 150rb se-Indonesia! 🚚</span>
            </div>
            <div class="flex items-center gap-4 text-xs">
                <a href="https://wa.me/628123456789" target="_blank" class="hover:underline flex items-center gap-1">
                    <i class="fa-brands fa-whatsapp text-green-600 font-bold"></i> Bantuan WA Moms: 0812-3456-789
                </a>
                <span class="hidden md:inline">|</span>
                <div class="hidden md:flex items-center gap-1">
                    <i class="fa-solid fa-location-dot text-rose-400"></i>
                    <span>Kirim Ke: <strong>Jakarta (Kemang)</strong></span>
                </div>
            </div>
        </div>
    </div>

    <!-- 2. NAVBAR UTAMA -->
    <nav class="sticky top-0 z-40 bg-white/90 backdrop-blur-md border-b-4 border-pastelLavender shadow-sm transition-all">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-20">
                
                <!-- Logo -->
                <a href="#" class="flex items-center gap-3 group">
                    <div class="w-12 h-12 bg-gradient-to-br from-pastelPink to-pastelYellow rounded-2xl flex items-center justify-center shadow-md transform group-hover:rotate-12 transition-transform">
                        <i class="fa-solid fa-seedling text-2xl text-emerald-600"></i>
                    </div>
                    <div>
                        <span class="font-heading text-2xl md:text-3xl font-bold bg-gradient-to-r from-rose-400 via-purple-400 to-sky-400 bg-clip-text text-transparent">
                            Pebble & Sprouts
                        </span>
                        <p class="text-[10px] tracking-wider uppercase font-bold text-pastelPinkDark -mt-1">Toko Bayi & Anak Gemoy</p>
                    </div>
                </a>

                <!-- Nav Links Desktop -->
                <div class="hidden lg:flex items-center space-x-6 font-semibold text-sm">
                    <a href="#beranda" class="text-rose-400 hover:text-rose-500 transition-colors">Beranda</a>
                    <a href="#kategori" class="hover:text-rose-400 transition-colors">Kategori</a>
                    <a href="#usia" class="hover:text-rose-400 transition-colors">Pilih Usia</a>
                    <a href="#promo" class="hover:text-rose-400 transition-colors">Voucher & Promo</a>
                    <a href="#ongkir" class="hover:text-rose-400 transition-colors">Cek Ongkir</a>
                    <a href="#lokasi" class="hover:text-rose-400 transition-colors">Lokasi Toko</a>
                </div>

                <!-- Search Bar -->
                <div class="hidden md:flex items-center relative w-48 lg:w-64">
                    <input type="text" id="searchInput" placeholder="Cari baju, mainan, MPASI..." 
                           class="w-full bg-pastelCream border-2 border-pastelLavender rounded-full py-2 pl-4 pr-10 text-xs focus:outline-none focus:border-pastelPink transition-all">
                    <button onclick="handleSearch()" class="absolute right-3 text-pastelPinkDark hover:text-rose-500">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </button>
                </div>

                <!-- Action Buttons (Wishlist & Cart) -->
                <div class="flex items-center gap-3">
                    <button onclick="openWishlistModal()" class="relative p-2.5 bg-pastelLavender/50 hover:bg-pastelLavender rounded-full text-textDark transition-all">
                        <i class="fa-solid fa-heart text-rose-400 text-lg"></i>
                        <span id="wishlistBadge" class="absolute -top-1 -right-1 bg-rose-500 text-white text-[10px] font-bold w-5 h-5 rounded-full flex items-center justify-center border-2 border-white">0</span>
                    </button>
                    
                    <button onclick="openCartModal()" class="relative flex items-center gap-2 bg-pastelPink hover:bg-pastelPinkDark px-4 py-2.5 rounded-full font-bold text-xs md:text-sm text-textDark transition-all shadow-sm hover:shadow-md">
                        <i class="fa-solid fa-basket-shopping text-lg text-rose-600"></i>
                        <span class="hidden sm:inline">Keranjang</span>
                        <span id="cartBadge" class="bg-white text-rose-500 font-extrabold px-2 py-0.5 rounded-full text-xs">0</span>
                    </button>

                    <!-- Mobile Menu Button -->
                    <button onclick="toggleMobileMenu()" class="lg:hidden p-2 text-textDark text-xl">
                        <i class="fa-solid fa-bars"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile Nav Menu -->
        <div id="mobileMenu" class="hidden lg:hidden bg-white border-t border-pastelLavender px-4 py-4 space-y-3 font-semibold text-sm">
            <a href="#beranda" onclick="toggleMobileMenu()" class="block text-rose-400 py-1">Beranda</a>
            <a href="#kategori" onclick="toggleMobileMenu()" class="block py-1">Kategori Produk</a>
            <a href="#usia" onclick="toggleMobileMenu()" class="block py-1">Rekomendasi Usia</a>
            <a href="#promo" onclick="toggleMobileMenu()" class="block py-1">Promo & Kupon</a>
            <a href="#ongkir" onclick="toggleMobileMenu()" class="block py-1">Kalkulator Ongkir</a>
            <a href="#lokasi" onclick="toggleMobileMenu()" class="block py-1">Lokasi Toko Physical</a>
        </div>
    </nav>

    <!-- 3. HERO BANNER -->
    <section id="beranda" class="relative overflow-hidden bg-gradient-to-b from-pastelLavender/40 via-pastelPink/20 to-pastelCream py-12 md:py-20">
        <!-- Background Elements Floating -->
        <div class="absolute top-10 left-5 text-pastelPink opacity-40 animate-float text-4xl"><i class="fa-solid fa-cloud"></i></div>
        <div class="absolute bottom-10 right-10 text-pastelYellow opacity-60 animate-float text-5xl" style="animation-delay: 1s;"><i class="fa-solid fa-star"></i></div>
        <div class="absolute top-1/2 right-1/4 text-pastelBlue opacity-50 animate-float text-3xl" style="animation-delay: 2s;"><i class="fa-solid fa-heart"></i></div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                
                <!-- Text Left -->
                <div class="space-y-6 text-center lg:text-left">
                    <div class="inline-flex items-center gap-2 bg-white px-4 py-2 rounded-full border-2 border-pastelPink shadow-sm animate-bounce-soft">
                        <span class="text-xl">👶</span>
                        <span class="text-xs md:text-sm font-bold text-rose-500">100% Organik & Aman Untuk Kulit Sensitif</span>
                    </div>

                    <h1 class="text-4xl sm:text-5xl lg:text-6xl font-bold text-textDark leading-tight">
                        Tumbuh Bersama <br>
                        <span class="bg-gradient-to-r from-rose-400 via-purple-400 to-sky-400 bg-clip-text text-transparent">
                            Keceriaan Si Kecil ✨
                        </span>
                    </h1>

                    <p class="text-base md:text-lg text-gray-600 max-w-xl mx-auto lg:mx-0">
                        Koleksi perlengkapan bayi & anak terlengkap dengan kualitas premium pastel mix. Lembut di kulit, aman dipakai harian, dan didesain penuh cinta untuk tumbuh kembang optimal si Buah Hati.
                    </p>

                    <div class="flex flex-col sm:flex-row items-center justify-center lg:justify-start gap-4">
                        <a href="#kategori" class="w-full sm:w-auto bg-gradient-to-r from-pastelPinkDark to-rose-400 hover:from-rose-400 hover:to-pastelPinkDark text-white font-bold px-8 py-4 rounded-3xl shadow-cute hover:shadow-glow transform hover:-translate-y-1 transition-all text-center flex items-center justify-center gap-2">
                            <i class="fa-solid fa-bag-shopping"></i> Belanja Sekarang
                        </a>
                        <button onclick="openSizeModal()" class="w-full sm:w-auto bg-white border-2 border-pastelBlue hover:bg-pastelBlue/20 text-textDark font-bold px-6 py-4 rounded-3xl transition-all flex items-center justify-center gap-2">
                            <i class="fa-solid fa-ruler-combined text-sky-400"></i> Konsultasi Ukuran Bayi
                        </button>
                    </div>

                    <!-- Floating Badges -->
                    <div class="pt-6 grid grid-cols-3 gap-3 max-w-md mx-auto lg:mx-0">
                        <div class="bg-white/80 p-3 rounded-2xl border border-pastelPink/50 text-center shadow-sm">
                            <i class="fa-solid fa-shield-cat text-2xl text-rose-400 mb-1"></i>
                            <p class="text-[11px] font-bold">Anti-Alergi</p>
                        </div>
                        <div class="bg-white/80 p-3 rounded-2xl border border-pastelYellow/50 text-center shadow-sm">
                            <i class="fa-solid fa-leaf text-2xl text-emerald-400 mb-1"></i>
                            <p class="text-[11px] font-bold">BPA Free</p>
                        </div>
                        <div class="bg-white/80 p-3 rounded-2xl border border-pastelBlue/50 text-center shadow-sm">
                            <i class="fa-solid fa-truck-fast text-2xl text-sky-400 mb-1"></i>
                            <p class="text-[11px] font-bold">Kirim Cepat</p>
                        </div>
                    </div>
                </div>

                <!-- Hero Image Showcase -->
                <div class="relative flex justify-center">
                    <div class="w-72 h-72 sm:w-96 sm:h-96 bg-gradient-to-tr from-pastelPink via-pastelYellow to-pastelBlue rounded-full filter blur-xl opacity-60 absolute animate-pulse-glow"></div>
                    
                    <div class="relative bg-white p-4 rounded-3xl border-4 border-white shadow-cute transform rotate-1 hover:rotate-0 transition-transform max-w-sm sm:max-w-md">
                        <img src="https://images.unsplash.com/photo-1519689680058-324335c77eba?auto=format&fit=crop&w=800&q=80" 
                             alt="Bayi Imut Pebble Sprouts" 
                             class="rounded-2xl w-full h-80 object-cover"
                             onerror="this.src='https://placehold.co/600x600/FFD1DC/5E548E?text=Pebble+%26+Sprouts+Cute+Baby'">
                        
                        <!-- Floating Mini Card inside Hero -->
                        <div class="absolute -bottom-6 -left-6 bg-white p-3 rounded-2xl shadow-lg border border-pastelPink flex items-center gap-3 animate-float">
                            <div class="w-10 h-10 rounded-full bg-pastelYellow flex items-center justify-center text-xl">✨</div>
                            <div>
                                <p class="text-xs font-bold">10.000+ Moms Puas</p>
                                <p class="text-[10px] text-gray-500">Rating 4.9/5.0 Bintang ⭐</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- 4. REKOMENDASI BERDASARKAN USIA (AGE SWITCHER) -->
    <section id="usia" class="py-12 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-2xl mx-auto mb-8">
                <span class="bg-pastelPink text-rose-600 font-bold px-3 py-1 rounded-full text-xs uppercase tracking-wider">Panduan Tumbuh Kembang</span>
                <h2 class="text-3xl font-bold mt-2">Pilih Produk Berdasarkan Usia</h2>
                <p class="text-xs md:text-sm text-gray-500 mt-1">Sesuaikan kebutuhan si Kecil di setiap fase usia emasnya</p>
            </div>

            <!-- Age Tabs Switcher -->
            <div class="flex justify-center gap-2 md:gap-4 flex-wrap mb-8">
                <button onclick="switchAgeTab('0-6')" id="tab-0-6" class="age-tab bg-pastelPink text-textDark font-bold px-5 py-2.5 rounded-full text-xs md:text-sm transition-all shadow-sm">👶 0-6 Bulan (Newborn)</button>
                <button onclick="switchAgeTab('6-12')" id="tab-6-12" class="age-tab bg-gray-100 hover:bg-pastelYellow text-textDark font-bold px-5 py-2.5 rounded-full text-xs md:text-sm transition-all">🍼 6-12 Bulan (MPASI)</button>
                <button onclick="switchAgeTab('1-3')" id="tab-1-3" class="age-tab bg-gray-100 hover:bg-pastelMint text-textDark font-bold px-5 py-2.5 rounded-full text-xs md:text-sm transition-all">🧸 1-3 Tahun (Toddler)</button>
                <button onclick="switchAgeTab('4+')" id="tab-4+" class="age-tab bg-gray-100 hover:bg-pastelBlue text-textDark font-bold px-5 py-2.5 rounded-full text-xs md:text-sm transition-all">🚀 4+ Tahun (Kids)</button>
            </div>

            <!-- Age Content Container -->
            <div id="ageContent" class="bg-pastelCream p-6 md:p-8 rounded-3xl border-2 border-pastelLavender">
                <!-- Dynamic Content Loaded via JS -->
            </div>
        </div>
    </section>

    <!-- 5. KATALOG PRODUK & FILTER KATEGORI -->
    <section id="kategori" class="py-16 bg-pastelCream">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row justify-between items-center mb-10 gap-4">
                <div>
                    <h2 class="text-3xl font-bold">Katalog Produk Gemoy</h2>
                    <p class="text-xs md:text-sm text-gray-500">Semua produk sudah teruji klinis & bersertifikasi SNI</p>
                </div>

                <!-- Category Filters -->
                <div class="flex gap-2 overflow-x-auto pb-2 w-full md:w-auto scrollbar-none">
                    <button onclick="filterCategory('all')" class="cat-btn bg-textDark text-white font-bold px-4 py-2 rounded-2xl text-xs shrink-0">Semua Produk</button>
                    <button onclick="filterCategory('pakaian')" class="cat-btn bg-white hover:bg-pastelPink text-textDark font-bold px-4 py-2 rounded-2xl text-xs shrink-0 border">Pakaian Organik</button>
                    <button onclick="filterCategory('mainan')" class="cat-btn bg-white hover:bg-pastelYellow text-textDark font-bold px-4 py-2 rounded-2xl text-xs shrink-0 border">Mainan Montessori</button>
                    <button onclick="filterCategory('mpasi')" class="cat-btn bg-white hover:bg-pastelMint text-textDark font-bold px-4 py-2 rounded-2xl text-xs shrink-0 border">Perlengkapan MPASI</button>
                    <button onclick="filterCategory('skincare')" class="cat-btn bg-white hover:bg-pastelBlue text-textDark font-bold px-4 py-2 rounded-2xl text-xs shrink-0 border">Skincare & Perawatan</button>
                </div>
            </div>

            <!-- Product Grid -->
            <div id="productGrid" class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 md:gap-6">
                <!-- Dynamic Products Rendered Here -->
            </div>
        </div>
    </section>

    <!-- 6. FLASH SALE & BEST SELLERS -->
    <section class="py-12 bg-gradient-to-r from-pastelPink/30 via-pastelYellow/40 to-pastelBlue/30">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white p-6 md:p-8 rounded-3xl border-4 border-pastelYellow shadow-cute">
                <div class="flex flex-col md:flex-row items-center justify-between mb-6 gap-4">
                    <div class="flex items-center gap-3">
                        <span class="text-3xl">⚡</span>
                        <div>
                            <h3 class="text-2xl font-bold text-rose-500">Flash Sale Gemoy Hari Ini!</h3>
                            <p class="text-xs text-gray-500">Diskon ekstra hingga 50% untuk produk pilihan Moms</p>
                        </div>
                    </div>
                    <!-- Countdown Timer -->
                    <div class="flex items-center gap-2 bg-rose-50 px-4 py-2 rounded-2xl border border-rose-200">
                        <span class="text-xs font-bold text-rose-600">Berakhir Dalam:</span>
                        <div id="countdown" class="font-mono font-bold text-rose-600 text-sm">05 : 24 : 12</div>
                    </div>
                </div>

                <!-- Flash Sale Products Carousel/Grid -->
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4" id="flashSaleContainer">
                    <!-- Loaded JS -->
                </div>
            </div>
        </div>
    </section>

    <!-- 7. VOUCHER & PROMOSI -->
    <section id="promo" class="py-12 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-xl mx-auto mb-8">
                <h2 class="text-3xl font-bold">Kupon Promo Moms Hemat</h2>
                <p class="text-xs md:text-sm text-gray-500">Klik tombol simpan untuk langsung menyalin kode voucher</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Coupon 1 -->
                <div class="bg-gradient-to-r from-pastelPink to-pink-100 p-5 rounded-3xl border-2 border-dashed border-rose-300 flex justify-between items-center relative overflow-hidden">
                    <div>
                        <span class="bg-rose-500 text-white text-[10px] font-bold px-2 py-0.5 rounded-full">Member Baru</span>
                        <h4 class="font-bold text-lg text-textDark mt-1">Potongan Rp 15.000</h4>
                        <p class="text-xs text-gray-600">Min. belanja Rp 100rb</p>
                        <p class="text-[10px] font-mono font-bold text-rose-600 mt-2">KODE: BABYSERU15K</p>
                    </div>
                    <button onclick="copyCoupon('BABYSERU15K')" class="bg-white hover:bg-rose-50 text-rose-500 font-bold px-4 py-2 rounded-2xl text-xs border border-rose-200 shadow-sm transition-all">
                        Klaim Kupon
                    </button>
                </div>

                <!-- Coupon 2 -->
                <div class="bg-gradient-to-r from-pastelYellow to-amber-100 p-5 rounded-3xl border-2 border-dashed border-amber-300 flex justify-between items-center relative overflow-hidden">
                    <div>
                        <span class="bg-amber-500 text-white text-[10px] font-bold px-2 py-0.5 rounded-full">Bebas Ongkir</span>
                        <h4 class="font-bold text-lg text-textDark mt-1">Gratis Ongkir Rp 20rb</h4>
                        <p class="text-xs text-gray-600">Min. belanja Rp 150rb</p>
                        <p class="text-[10px] font-mono font-bold text-amber-700 mt-2">KODE: PASTELCHEER</p>
                    </div>
                    <button onclick="copyCoupon('PASTELCHEER')" class="bg-white hover:bg-amber-50 text-amber-600 font-bold px-4 py-2 rounded-2xl text-xs border border-amber-200 shadow-sm transition-all">
                        Klaim Kupon
                    </button>
                </div>

                <!-- Coupon 3 -->
                <div class="bg-gradient-to-r from-pastelMint to-emerald-100 p-5 rounded-3xl border-2 border-dashed border-emerald-300 flex justify-between items-center relative overflow-hidden">
                    <div>
                        <span class="bg-emerald-500 text-white text-[10px] font-bold px-2 py-0.5 rounded-full">Spesial MPASI</span>
                        <h4 class="font-bold text-lg text-textDark mt-1">Diskon 10% MPASI Set</h4>
                        <p class="text-xs text-gray-600">Tanpa minimum belanja</p>
                        <p class="text-[10px] font-mono font-bold text-emerald-700 mt-2">KODE: MPASISEHAT</p>
                    </div>
                    <button onclick="copyCoupon('MPASISEHAT')" class="bg-white hover:bg-emerald-50 text-emerald-600 font-bold px-4 py-2 rounded-2xl text-xs border border-emerald-200 shadow-sm transition-all">
                        Klaim Kupon
                    </button>
                </div>
            </div>
        </div>
    </section>

    <!-- 8. PANDUAN BELANJA & KALKULATOR ONGKIR -->
    <section id="ongkir" class="py-12 bg-pastelCream border-t border-b border-pastelLavender">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 items-center">
                
                <div>
                    <span class="bg-pastelBlue text-sky-700 font-bold px-3 py-1 rounded-full text-xs">Pengiriman Cepat & Safe</span>
                    <h2 class="text-3xl font-bold mt-2">Kalkulator Estimasi Ongkir</h2>
                    <p class="text-xs md:text-sm text-gray-600 mt-2 mb-6">
                        Kami bekerja sama dengan ekspedisi terpercaya dan layanan Instant Courier (Gojek/Grab) agar perlengkapan si Kecil sampai dengan aman & cepat.
                    </p>

                    <!-- Calculator Form -->
                    <div class="bg-white p-6 rounded-3xl border-2 border-pastelLavender shadow-sm space-y-4">
                        <div>
                            <label class="block text-xs font-bold mb-1">Pilih Kota Tujuan Moms:</label>
                            <select id="destinationCity" class="w-full bg-pastelCream border border-pastelLavender rounded-2xl p-3 text-xs font-semibold focus:outline-none">
                                <option value="jakarta">DKI Jakarta (Kemang / PIK)</option>
                                <option value="bandung">Bandung Kota</option>
                                <option value="surabaya">Surabaya Kota</option>
                                <option value="medan">Medan Kota</option>
                                <option value="bali">Denpasar, Bali</option>
                            </select>
                        </div>

                        <div>
                            <label class="block text-xs font-bold mb-1">Metode Pengiriman:</label>
                            <select id="shippingMethod" class="w-full bg-pastelCream border border-pastelLavender rounded-2xl p-3 text-xs font-semibold focus:outline-none">
                                <option value="reguler">Reguler Standard (2-3 Hari)</option>
                                <option value="express">Express Next Day (1 Hari)</option>
                                <option value="instant">Instant Courier (Gojek/Grab - 3 Jam)</option>
                            </select>
                        </div>

                        <button onclick="calculateShipping()" class="w-full bg-pastelBlue hover:bg-sky-300 text-textDark font-bold py-3 rounded-2xl text-xs transition-all">
                            Hitung Estimasi Biaya
                        </button>

                        <div id="shippingResult" class="hidden p-3 bg-pastelYellow/50 rounded-2xl border border-amber-200 text-xs font-semibold text-center text-textDark">
                            <!-- Result text -->
                        </div>
                    </div>
                </div>

                <!-- Delivery Guarantees -->
                <div class="space-y-4">
                    <div class="bg-white p-4 rounded-3xl border-2 border-pastelPink flex items-center gap-4">
                        <div class="w-12 h-12 bg-pastelPink/40 rounded-2xl flex items-center justify-center text-2xl text-rose-500 shrink-0">
                            <i class="fa-solid fa-box-open"></i>
                        </div>
                        <div>
                            <h4 class="font-bold text-sm">Kemasan Steril & Bubble Wrap Ekstra</h4>
                            <p class="text-xs text-gray-500">Setiap paket dibungkus rapat dan dipastikan higienis sebelum dikirim.</p>
                        </div>
                    </div>

                    <div class="bg-white p-4 rounded-3xl border-2 border-pastelYellow flex items-center gap-4">
                        <div class="w-12 h-12 bg-pastelYellow/40 rounded-2xl flex items-center justify-center text-2xl text-amber-500 shrink-0">
                            <i class="fa-solid fa-arrow-rotate-left"></i>
                        </div>
                        <div>
                            <h4 class="font-bold text-sm">Garansi Tukar Size 7 Hari</h4>
                            <p class="text-xs text-gray-500">Ukuran baju kekecilan atau kebesaran? Bisa ditukar dengan mudah tanpa biaya ribet.</p>
                        </div>
                    </div>

                    <div class="bg-white p-4 rounded-3xl border-2 border-pastelMint flex items-center gap-4">
                        <div class="w-12 h-12 bg-pastelMint/40 rounded-2xl flex items-center justify-center text-2xl text-emerald-500 shrink-0">
                            <i class="fa-solid fa-headset"></i>
                        </div>
                        <div>
                            <h4 class="font-bold text-sm">Layanan Pelanggan Moms Friendly</h4>
                            <p class="text-xs text-gray-500">Tim ramah kami siap mendampingi pertanyaan Moms setiap hari (08.00 - 21.00 WIB).</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- 9. LOKASI TOKO PHYSICAL (BOUTIQUE) -->
    <section id="lokasi" class="py-12 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-xl mx-auto mb-10">
                <span class="bg-pastelMint text-emerald-700 font-bold px-3 py-1 rounded-full text-xs">Kunjungi Store Physical Kami</span>
                <h2 class="text-3xl font-bold mt-2">Butik Pebble & Sprouts</h2>
                <p class="text-xs md:text-sm text-gray-500">Nikmati pengalaman berbelanja langsung dengan area nursery & playroom anak</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- Location 1 -->
                <div class="bg-pastelCream p-6 rounded-3xl border-2 border-pastelLavender text-center hover:shadow-md transition-all">
                    <div class="w-14 h-14 bg-pastelPink rounded-2xl flex items-center justify-center text-2xl text-rose-500 mx-auto mb-4">
                        <i class="fa-solid fa-store"></i>
                    </div>
                    <h3 class="font-bold text-lg">Flagship Kemang</h3>
                    <p class="text-xs text-gray-600 mt-2">Jl. Kemang Raya No. 45B, Jakarta Selatan</p>
                    <p class="text-xs font-semibold text-rose-500 mt-2">⏰ Buka Setiap Hari: 09:00 - 21:00 WIB</p>
                    <a href="https://maps.google.com" target="_blank" class="mt-4 inline-block bg-white border border-pastelPink text-rose-500 font-bold px-4 py-2 rounded-2xl text-xs hover:bg-pastelPink hover:text-textDark transition-all">
                        <i class="fa-solid fa-map-pin"></i> Petunjuk Arah Google Maps
                    </a>
                </div>

                <!-- Location 2 -->
                <div class="bg-pastelCream p-6 rounded-3xl border-2 border-pastelLavender text-center hover:shadow-md transition-all">
                    <div class="w-14 h-14 bg-pastelYellow rounded-2xl flex items-center justify-center text-2xl text-amber-500 mx-auto mb-4">
                        <i class="fa-solid fa-store"></i>
                    </div>
                    <h3 class="font-bold text-lg">Boutique PIK Avenue</h3>
                    <p class="text-xs text-gray-600 mt-2">PIK Avenue Mall L2 #204, Jakarta Utara</p>
                    <p class="text-xs font-semibold text-amber-600 mt-2">⏰ Buka Setiap Hari: 10:00 - 22:00 WIB</p>
                    <a href="https://maps.google.com" target="_blank" class="mt-4 inline-block bg-white border border-pastelYellow text-amber-600 font-bold px-4 py-2 rounded-2xl text-xs hover:bg-pastelYellow hover:text-textDark transition-all">
                        <i class="fa-solid fa-map-pin"></i> Petunjuk Arah Google Maps
                    </a>
                </div>

                <!-- Location 3 -->
                <div class="bg-pastelCream p-6 rounded-3xl border-2 border-pastelLavender text-center hover:shadow-md transition-all">
                    <div class="w-14 h-14 bg-pastelMint rounded-2xl flex items-center justify-center text-2xl text-emerald-500 mx-auto mb-4">
                        <i class="fa-solid fa-store"></i>
                    </div>
                    <h3 class="font-bold text-lg">Surabaya Boutique</h3>
                    <p class="text-xs text-gray-600 mt-2">Jl. Raya Darmo No. 88, Surabaya Barat</p>
                    <p class="text-xs font-semibold text-emerald-600 mt-2">⏰ Buka Setiap Hari: 09:00 - 20:00 WIB</p>
                    <a href="https://maps.google.com" target="_blank" class="mt-4 inline-block bg-white border border-pastelMint text-emerald-600 font-bold px-4 py-2 rounded-2xl text-xs hover:bg-pastelMint hover:text-textDark transition-all">
                        <i class="fa-solid fa-map-pin"></i> Petunjuk Arah Google Maps
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- 10. ULASAN ORANG TUA (TESTIMONIALS) -->
    <section class="py-12 bg-gradient-to-b from-pastelCream via-pastelPink/10 to-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-xl mx-auto mb-10">
                <h2 class="text-3xl font-bold">Kata Moms & Dads</h2>
                <p class="text-xs md:text-sm text-gray-500">Pengalaman asli dari para orang tua yang memercayakan si Kecil pada kami</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- Testi 1 -->
                <div class="bg-white p-6 rounded-3xl border border-pastelPink shadow-sm relative">
                    <div class="flex items-center gap-3 mb-3">
                        <div class="w-10 h-10 rounded-full bg-pastelPink flex items-center justify-center font-bold text-rose-500">MA</div>
                        <div>
                            <h4 class="font-bold text-xs">Mom Alyssa N.</h4>
                            <span class="bg-emerald-100 text-emerald-700 text-[9px] font-bold px-2 py-0.5 rounded-full">✓ Verified Mom (Jakarta)</span>
                        </div>
                    </div>
                    <div class="text-amber-400 text-xs mb-2">★★★★★</div>
                    <p class="text-xs text-gray-600 italic">
                        "Baju bahannya beneran sangat lembut! Anakku sensitif banget kulitnya, tapi pakai jumpsuit dari Pebble & Sprouts nggak ada kemerahan sama sekali. Pengiriman cepat banget!"
                    </p>
                </div>

                <!-- Testi 2 -->
                <div class="bg-white p-6 rounded-3xl border border-pastelYellow shadow-sm relative">
                    <div class="flex items-center gap-3 mb-3">
                        <div class="w-10 h-10 rounded-full bg-pastelYellow flex items-center justify-center font-bold text-amber-600">DR</div>
                        <div>
                            <h4 class="font-bold text-xs">Dad Rizky P.</h4>
                            <span class="bg-emerald-100 text-emerald-700 text-[9px] font-bold px-2 py-0.5 rounded-full">✓ Verified Dad (Surabaya)</span>
                        </div>
                    </div>
                    <div class="text-amber-400 text-xs mb-2">★★★★★</div>
                    <p class="text-xs text-gray-600 italic">
                        "Mainan Montessori kayu-nya halus dan aman banget. Anak aktif 2 tahun betah main jam-jaman. Rekomendasi banget buat kado atau belanja harian!"
                    </p>
                </div>

                <!-- Testi 3 -->
                <div class="bg-white p-6 rounded-3xl border border-pastelBlue shadow-sm relative">
                    <div class="flex items-center gap-3 mb-3">
                        <div class="w-10 h-10 rounded-full bg-pastelBlue flex items-center justify-center font-bold text-sky-600">MC</div>
                        <div>
                            <h4 class="font-bold text-xs">Mom Clara S.</h4>
                            <span class="bg-emerald-100 text-emerald-700 text-[9px] font-bold px-2 py-0.5 rounded-full">✓ Verified Mom (Bandung)</span>
                        </div>
                    </div>
                    <div class="text-amber-400 text-xs mb-2">★★★★★</div>
                    <p class="text-xs text-gray-600 italic">
                        "Set MPASI Silicone-nya juara! Anti slip di meja makan, warna pastel gemoy banget. Asisten AI websitanya juga bantu banget waktu bingung pilih ukuran!"
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- 11. FAQ ACCORDION -->
    <section class="py-12 bg-white">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-8">
                <h2 class="text-3xl font-bold">Pertanyaan Sering Diajukan (FAQ)</h2>
                <p class="text-xs md:text-sm text-gray-500">Informasi penting seputar keamanan produk & pesanan Moms</p>
            </div>

            <div class="space-y-3">
                <!-- FAQ Item 1 -->
                <div class="border-2 border-pastelLavender rounded-2xl overflow-hidden">
                    <button onclick="toggleFaq(1)" class="w-full text-left p-4 bg-pastelCream flex justify-between items-center font-bold text-xs md:text-sm text-textDark">
                        <span>Apakah bahan produk pakaian Pebble & Sprouts aman untuk bayi baru lahir (Newborn)?</span>
                        <i id="faqIcon-1" class="fa-solid fa-chevron-down transition-transform"></i>
                    </button>
                    <div id="faqContent-1" class="accordion-content px-4 bg-white text-xs text-gray-600">
                        <p class="py-3">
                            Ya, 100%! Semua pakaian kami terbuat dari 100% Cotton Bamboo & Organik tersertifikasi OEKO-TEX Standard 100. Bebas dari zat kimia berbahaya, pewarna sintetis keras, dan bersifat hypoallergenic (anti-alergi).
                        </p>
                    </div>
                </div>

                <!-- FAQ Item 2 -->
                <div class="border-2 border-pastelLavender rounded-2xl overflow-hidden">
                    <button onclick="toggleFaq(2)" class="w-full text-left p-4 bg-pastelCream flex justify-between items-center font-bold text-xs md:text-sm text-textDark">
                        <span>Bagaimana jika ukuran pakaian yang saya beli kekecilan atau kebesaran?</span>
                        <i id="faqIcon-2" class="fa-solid fa-chevron-down transition-transform"></i>
                    </button>
                    <div id="faqContent-2" class="accordion-content px-4 bg-white text-xs text-gray-600">
                        <p class="py-3">
                            Moms tidak perlu khawatir. Kami menyediakan garansi retur/tukar size dalam 7 hari setelah barang diterima, dengan catatan tag produk masih utuh dan pakaian belum dicuci.
                        </p>
                    </div>
                </div>

                <!-- FAQ Item 3 -->
                <div class="border-2 border-pastelLavender rounded-2xl overflow-hidden">
                    <button onclick="toggleFaq(3)" class="w-full text-left p-4 bg-pastelCream flex justify-between items-center font-bold text-xs md:text-sm text-textDark">
                        <span>Berapa lama estimasi pengiriman pesanan?</span>
                        <i id="faqIcon-3" class="fa-solid fa-chevron-down transition-transform"></i>
                    </button>
                    <div id="faqContent-3" class="accordion-content px-4 bg-white text-xs text-gray-600">
                        <p class="py-3">
                            Untuk Jabodetabek, pengiriman Reguler membutuhkan 1-2 hari kerja. Layanan Instant Courier (Gojek/Grab) langsung dikirim dalam 3 jam. Untuk luar Jabodetabek berkisar 2-4 hari kerja.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 12. FOOTER & SPROUTS CLUB -->
    <footer class="bg-gradient-to-t from-pastelLavender/60 via-pastelPink/20 to-white pt-12 pb-6 border-t border-pastelLavender">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Newsletter Sub Card -->
            <div class="bg-gradient-to-r from-pastelPink via-pastelYellow to-pastelBlue p-6 md:p-8 rounded-3xl mb-12 shadow-sm text-center md:text-left flex flex-col md:flex-row items-center justify-between gap-6">
                <div>
                    <h3 class="text-2xl font-bold text-textDark">Gabung "Sprouts Club" 💌</h3>
                    <p class="text-xs text-gray-700 mt-1">Dapatkan voucher diskon 15% untuk pembelian pertama & tips pengasuhan anak mingguan.</p>
                </div>
                <div class="flex w-full md:w-auto gap-2">
                    <input type="email" id="newsletterEmail" placeholder="Masukkan email Moms..." class="px-4 py-3 rounded-2xl text-xs w-full md:w-64 focus:outline-none">
                    <button onclick="subscribeNewsletter()" class="bg-textDark hover:bg-purple-900 text-white font-bold px-6 py-3 rounded-2xl text-xs shrink-0 transition-all">
                        Daftar Gratis
                    </button>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-4 gap-8 mb-8 text-xs">
                <div>
                    <div class="flex items-center gap-2 mb-3">
                        <div class="w-8 h-8 bg-pastelPink rounded-xl flex items-center justify-center text-emerald-600 font-bold">
                            <i class="fa-solid fa-seedling"></i>
                        </div>
                        <span class="font-heading text-lg font-bold">Pebble & Sprouts</span>
                    </div>
                    <p class="text-gray-600 leading-relaxed">
                        Toko retail perlengkapan bayi & anak dengan koleksi bermutu tinggi, estetik pastel, dan 100% aman untuk si Kecil.
                    </p>
                </div>

                <div>
                    <h4 class="font-bold text-sm mb-3">Navigasi Cepat</h4>
                    <ul class="space-y-2 text-gray-600">
                        <li><a href="#kategori" class="hover:text-rose-500">Katalog Pakaian Organik</a></li>
                        <li><a href="#kategori" class="hover:text-rose-500">Mainan Edukasi Montessori</a></li>
                        <li><a href="#kategori" class="hover:text-rose-500">Peralatan MPASI Silicone</a></li>
                        <li><a href="#usia" class="hover:text-rose-500">Panduan Ukuran Bayi</a></li>
                    </ul>
                </div>

                <div>
                    <h4 class="font-bold text-sm mb-3">Layanan Pelanggan</h4>
                    <ul class="space-y-2 text-gray-600">
                        <li><a href="#" class="hover:text-rose-500">Konfirmasi Pembayaran</a></li>
                        <li><a href="#" class="hover:text-rose-500">Cek Status Resi Pengiriman</a></li>
                        <li><a href="#" class="hover:text-rose-500">Kebijakan Pengembalian Produk</a></li>
                        <li><a href="#" class="hover:text-rose-500">Syarat & Ketentuan Voucher</a></li>
                    </ul>
                </div>

                <div>
                    <h4 class="font-bold text-sm mb-3">Hubungi & Ikuti Kami</h4>
                    <p class="text-gray-600 mb-2">WhatsApp CS: 0812-3456-789</p>
                    <p class="text-gray-600 mb-4">Email: hello@pebblesprouts.co.id</p>
                    <div class="flex gap-3 text-lg text-rose-400">
                        <a href="#" class="w-8 h-8 rounded-full bg-white flex items-center justify-center shadow-sm hover:bg-pastelPink transition-all"><i class="fa-brands fa-instagram"></i></a>
                        <a href="#" class="w-8 h-8 rounded-full bg-white flex items-center justify-center shadow-sm hover:bg-pastelPink transition-all"><i class="fa-brands fa-tiktok"></i></a>
                        <a href="#" class="w-8 h-8 rounded-full bg-white flex items-center justify-center shadow-sm hover:bg-pastelPink transition-all"><i class="fa-brands fa-facebook"></i></a>
                    </div>
                </div>
            </div>

            <div class="border-t border-pastelLavender/80 pt-6 text-center text-[11px] text-gray-500">
                <p>© 2026 Pebble & Sprouts Indonesia. Hak Cipta Dilindungi.<br><span class="mt-2 inline-block">Made with care ♡ · Website template by WEBIA</span></p>
            </div>
        </div>
    </footer>

    <!-- 13. FLOATING ACTIONS HUB & AI CHATBOT -->
    <div class="fixed bottom-5 right-5 z-50 flex flex-row items-center gap-3">
        
        <!-- WhatsApp Floating Button -->
        <a href="https://wa.me/628123456789?text=Halo%20Pebble%20%26%20Sprouts,%20saya%20mau%20tanya%20produk%20bayi" target="_blank" 
           class="w-12 h-12 bg-green-500 hover:bg-green-600 text-white rounded-full flex items-center justify-center shadow-lg transform hover:scale-110 transition-all">
            <i class="fa-brands fa-whatsapp text-2xl"></i>
        </a>

        <!-- AI Assistant Floating Toggle Button -->
        <button onclick="toggleAiChat()" 
                class="bg-gradient-to-r from-pastelPinkDark to-rose-400 text-white font-bold px-4 py-3 rounded-full shadow-cute flex items-center gap-2 hover:shadow-glow transform hover:scale-105 transition-all">
            <span class="text-xl">🌱</span>
            <span class="text-xs">Sprouts AI Assistant</span>
        </button>
    </div>

    <!-- AI CHATBOT WINDOW MODAL -->
    <div id="aiChatWindow" class="fixed bottom-20 right-5 z-50 w-80 sm:w-96 bg-white rounded-3xl shadow-2xl border-4 border-pastelLavender hidden flex-col overflow-hidden">
        <!-- Chat Header -->
        <div class="bg-gradient-to-r from-pastelPink via-pastelYellow to-pastelBlue p-4 flex justify-between items-center border-b border-pastelLavender">
            <div class="flex items-center gap-2">
                <div class="w-8 h-8 bg-white rounded-full flex items-center justify-center text-rose-500 text-sm font-bold shadow-sm">🌱</div>
                <div>
                    <h4 class="font-bold text-xs text-textDark">Sprouts AI Assistant</h4>
                    <span class="text-[9px] text-emerald-700 font-semibold">● Online | Siap Bantu Moms</span>
                </div>
            </div>
            <button onclick="toggleAiChat()" class="text-textDark hover:text-rose-500 text-sm">
                <i class="fa-solid fa-xmark"></i>
            </button>
        </div>

        <!-- Chat Body -->
        <div id="chatMessages" class="p-4 h-72 overflow-y-auto space-y-3 bg-pastelCream text-xs">
            <div class="bg-white p-3 rounded-2xl border border-pastelPink max-w-[85%] text-textDark">
                Halo Moms/Dads! 👋 Saya <strong>Sprouts AI</strong>. Ada yang bisa saya bantu hari ini? 
                <br><br>
                Moms bisa tanya:
                <ul class="list-disc ml-4 mt-1 space-y-1 text-[11px]">
                    <li>Rekomendasi kado bayi 6 bulan</li>
                    <li>Saran ukuran baju berdasarkan berat badan</li>
                    <li>Cek diskon & promo aktif</li>
                </ul>
            </div>
        </div>

        <!-- Quick Prompts Buttons -->
        <div class="px-3 py-2 bg-white border-t border-gray-100 flex gap-1.5 overflow-x-auto scrollbar-none">
            <button onclick="sendQuickPrompt('Rekomendasi Kado 0-6 Bulan')" class="bg-pastelPink/40 text-[10px] font-semibold px-2.5 py-1 rounded-full shrink-0 border border-pastelPink">🎁 Kado 0-6 Bln</button>
            <button onclick="sendQuickPrompt('Tabel Ukuran Baju Bayi')" class="bg-pastelYellow/50 text-[10px] font-semibold px-2.5 py-1 rounded-full shrink-0 border border-pastelYellow">📏 Panduan Ukuran</button>
            <button onclick="sendQuickPrompt('Promo Hari Ini')" class="bg-pastelBlue/40 text-[10px] font-semibold px-2.5 py-1 rounded-full shrink-0 border border-pastelBlue">⚡ Promo Aktif</button>
        </div>

        <!-- Chat Input -->
        <div class="p-3 bg-white border-t border-pastelLavender flex items-center gap-2">
            <input type="text" id="chatInput" onkeypress="handleChatKeyPress(event)" placeholder="Ketik pertanyaan Moms di sini..." class="w-full bg-pastelCream border border-pastelLavender rounded-full px-3 py-2 text-xs focus:outline-none">
            <button onclick="sendChatMessage()" class="bg-rose-400 hover:bg-rose-500 text-white rounded-full p-2 w-8 h-8 flex items-center justify-center shrink-0">
                <i class="fa-solid fa-paper-plane text-xs"></i>
            </button>
        </div>
    </div>

    <!-- MODAL QUICK VIEW PRODUK -->
    <div id="quickViewModal" class="fixed inset-0 z-50 bg-black/40 backdrop-blur-sm hidden flex items-center justify-center p-4">
        <div class="bg-white rounded-3xl max-w-2xl w-full p-6 relative border-4 border-pastelPink overflow-hidden shadow-2xl animate-bounce-soft">
            <button onclick="closeQuickView()" class="absolute top-4 right-4 text-gray-400 hover:text-rose-500 text-xl">
                <i class="fa-solid fa-circle-xmark"></i>
            </button>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6" id="quickViewContent">
                <!-- Loaded dynamically via JS -->
            </div>
        </div>
    </div>

    <!-- MODAL KERANJANG BELANJA -->
    <div id="cartModal" class="fixed inset-0 z-50 bg-black/40 backdrop-blur-sm hidden flex items-center justify-end">
        <div class="bg-white w-full max-w-md h-full p-6 flex flex-col border-l-4 border-pastelPink shadow-2xl">
            <div class="flex justify-between items-center pb-4 border-b border-pastelLavender">
                <h3 class="font-bold text-lg text-textDark">Keranjang Belanja Moms 🛍️</h3>
                <button onclick="closeCartModal()" class="text-gray-400 hover:text-rose-500 text-lg">
                    <i class="fa-solid fa-xmark"></i>
                </button>
            </div>

            <div id="cartItemsList" class="flex-1 overflow-y-auto py-4 space-y-3">
                <!-- Cart items JS -->
            </div>

            <div class="pt-4 border-t border-pastelLavender space-y-3">
                <div class="flex justify-between font-bold text-sm">
                    <span>Total Belanja:</span>
                    <span id="cartTotalPrice" class="text-rose-500">Rp 0</span>
                </div>
                <button onclick="checkoutCart()" class="w-full bg-gradient-to-r from-pastelPinkDark to-rose-400 hover:from-rose-400 hover:to-pastelPinkDark text-white font-bold py-3 rounded-2xl text-xs transition-all shadow-md">
                    Lanjut Ke Pembayaran (Checkout)
                </button>
            </div>
        </div>
    </div>

    <!-- MODAL DATA PEMESAN: diisi sebelum nota dikirim ke WhatsApp -->
    <div id="customerCheckoutModal" class="fixed inset-0 z-[70] bg-black/50 backdrop-blur-sm hidden items-center justify-center p-4 overflow-y-auto" onclick="if(event.target === this) closeCustomerCheckout()">
        <div class="bg-white rounded-3xl max-w-xl w-full p-6 md:p-8 relative border-4 border-pastelPink shadow-2xl my-auto">
            <button type="button" onclick="closeCustomerCheckout()" class="absolute top-4 right-4 text-gray-400 hover:text-rose-500 text-xl" aria-label="Tutup form checkout">
                <i class="fa-solid fa-xmark"></i>
            </button>
            <span class="inline-flex bg-pastelYellow px-3 py-1 rounded-full text-xs font-bold text-textDark mb-3">🛍️ Satu langkah lagi, Moms!</span>
            <h3 class="font-bold text-2xl text-textDark mb-2">Data Pemesan & Pengiriman</h3>
            <p class="text-sm text-gray-500 mb-5">Lengkapi data di bawah ini. Setelah dikirim, nota pesanan akan terbuka di WhatsApp admin untuk dikonfirmasi.</p>
            <form id="customerCheckoutForm" onsubmit="submitCustomerCheckout(event)" class="space-y-4">
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <label class="block text-sm font-semibold text-textDark">Nama penerima <span class="text-rose-500">*</span>
                        <input name="customer_name" type="text" required autocomplete="name" maxlength="100" placeholder="Nama lengkap" class="mt-1 w-full rounded-xl border-2 border-pastelLavender bg-pastelCream px-3 py-3 text-sm focus:outline-none focus:border-pastelPink">
                    </label>
                    <label class="block text-sm font-semibold text-textDark">Nomor HP / WhatsApp <span class="text-rose-500">*</span>
                        <input name="customer_phone" type="tel" required autocomplete="tel" maxlength="25" placeholder="08xxxxxxxxxx" class="mt-1 w-full rounded-xl border-2 border-pastelLavender bg-pastelCream px-3 py-3 text-sm focus:outline-none focus:border-pastelPink">
                    </label>
                </div>
                <label class="block text-sm font-semibold text-textDark">Email (opsional)
                    <input name="customer_email" type="email" autocomplete="email" maxlength="120" placeholder="nama@email.com" class="mt-1 w-full rounded-xl border-2 border-pastelLavender bg-pastelCream px-3 py-3 text-sm focus:outline-none focus:border-pastelPink">
                </label>
                <label class="block text-sm font-semibold text-textDark">Alamat lengkap <span class="text-rose-500">*</span>
                    <textarea name="customer_address" required autocomplete="street-address" rows="2" maxlength="500" placeholder="Nama jalan, nomor rumah, RT/RW, kelurahan, patokan..." class="mt-1 w-full rounded-xl border-2 border-pastelLavender bg-pastelCream px-3 py-3 text-sm focus:outline-none focus:border-pastelPink"></textarea>
                </label>
                <label class="block text-sm font-semibold text-textDark">Kota / Kecamatan / Kode Pos <span class="text-rose-500">*</span>
                    <input name="customer_city" type="text" required autocomplete="address-level2" maxlength="150" placeholder="Contoh: Lowokwaru, Kota Malang, 65141" class="mt-1 w-full rounded-xl border-2 border-pastelLavender bg-pastelCream px-3 py-3 text-sm focus:outline-none focus:border-pastelPink">
                </label>
                <label class="block text-sm font-semibold text-textDark">Metode pengiriman <span class="text-rose-500">*</span>
                    <select name="shipping_method" required class="mt-1 w-full rounded-xl border-2 border-pastelLavender bg-pastelCream px-3 py-3 text-sm focus:outline-none focus:border-pastelPink">
                        <option value="" disabled selected>Pilih metode pengiriman</option>
                        <option value="Reguler">Reguler</option>
                        <option value="Express">Express</option>
                        <option value="Instant Courier">Instant Courier (jika tersedia)</option>
                        <option value="Ambil di toko">Ambil di toko</option>
                    </select>
                </label>
                <label class="block text-sm font-semibold text-textDark">Catatan pesanan (opsional)
                    <textarea name="customer_notes" rows="2" maxlength="500" placeholder="Warna/ukuran pilihan, patokan alamat, atau catatan lain..." class="mt-1 w-full rounded-xl border-2 border-pastelLavender bg-pastelCream px-3 py-3 text-sm focus:outline-none focus:border-pastelPink"></textarea>
                </label>
                <p class="text-xs text-gray-500">* Wajib diisi. Harga yang dikirim adalah total produk; admin akan mengonfirmasi stok, ongkir, dan total akhir.</p>
                <div class="flex flex-col-reverse sm:flex-row gap-3 pt-1">
                    <button type="button" onclick="closeCustomerCheckout()" class="sm:w-1/3 rounded-2xl border-2 border-pastelLavender px-4 py-3 text-sm font-bold text-textDark hover:bg-pastelCream">Kembali</button>
                    <button type="submit" class="sm:flex-1 rounded-2xl bg-gradient-to-r from-pastelPinkDark to-rose-400 hover:from-rose-400 hover:to-pastelPinkDark px-4 py-3 text-sm font-bold text-white shadow-md transition-all"><i class="fa-brands fa-whatsapp mr-2"></i>Kirim Nota ke WhatsApp</button>
                </div>
            </form>
        </div>
    </div>

    <!-- MODAL SIZE CONSULTATION -->
    <div id="sizeModal" class="fixed inset-0 z-50 bg-black/40 backdrop-blur-sm hidden flex items-center justify-center p-4">
        <div class="bg-white rounded-3xl max-w-md w-full p-6 relative border-4 border-pastelBlue shadow-2xl">
            <button onclick="closeSizeModal()" class="absolute top-4 right-4 text-gray-400 hover:text-rose-500 text-xl">
                <i class="fa-solid fa-xmark"></i>
            </button>
            
            <h3 class="font-bold text-lg text-textDark mb-2">📐 Panduan Ukuran Pakaian Bayi</h3>
            <p class="text-xs text-gray-500 mb-4">Pilih berat badan si Kecil untuk ukuran paling presisi:</p>

            <div class="space-y-2 text-xs">
                <div class="p-3 bg-pastelPink/30 rounded-2xl flex justify-between font-semibold">
                    <span>0 - 3 Bulan (Berat 3 - 5 kg)</span>
                    <span class="bg-white px-2 py-0.5 rounded-full text-rose-500">Size S / NB</span>
                </div>
                <div class="p-3 bg-pastelYellow/40 rounded-2xl flex justify-between font-semibold">
                    <span>3 - 6 Bulan (Berat 5.5 - 7.5 kg)</span>
                    <span class="bg-white px-2 py-0.5 rounded-full text-amber-600">Size M</span>
                </div>
                <div class="p-3 bg-pastelMint/40 rounded-2xl flex justify-between font-semibold">
                    <span>6 - 12 Bulan (Berat 7.5 - 10 kg)</span>
                    <span class="bg-white px-2 py-0.5 rounded-full text-emerald-600">Size L</span>
                </div>
                <div class="p-3 bg-pastelBlue/40 rounded-2xl flex justify-between font-semibold">
                    <span>1 - 2 Tahun (Berat 10 - 13 kg)</span>
                    <span class="bg-white px-2 py-0.5 rounded-full text-sky-600">Size XL</span>
                </div>
            </div>
        </div>
    </div>

<script src="{{ asset('js/website-bisnis/templates/retail/baby-kids-products/pebble-sprouts/pebble-sprouts.js') }}"></script>
</body>
</html>
