<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fresh Harvest - Organic Healthy Meal Prep Subscription</title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,500;0,600;0,700;1,400&family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link rel="stylesheet" href="{{ asset('css/website-bisnis/templates/fnb/healthy-meal-prep/fresh-harvest.css') }}">
</head>
<body x-data="freshHarvestApp()" class="selection:bg-[#A8C69F] selection:text-[#263A2B]">

    <!-- 1. TOPBAR -->
    <div class="bg-[#263A2B] text-[#F7F6EC] text-xs py-2 px-4 sticky top-0 z-50 transition-all duration-300">
        <div class="max-w-7xl mx-auto flex flex-col sm:flex-row justify-between items-center gap-2">
            <div class="flex items-center gap-3">
                <span class="bg-[#E8A95B] text-[#263A2B] font-bold px-2 py-0.5 rounded-full text-[10px] uppercase tracking-wider animate-pulse">Promo Hari Ini</span>
                <span>🌿 Diskon Langganan Pertama 20% dengan Kode: <b>FRESHHEALTY20</b></span>
            </div>
            <div class="flex items-center gap-4">
                <a href="#jangkauan" class="hover:text-[#A8C69F] transition"><i class="fa-solid fa-location-dot mr-1"></i> Cek Area Pengiriman</a>
                <span>|</span>
                <a href="https://wa.me/6281234567890" target="_blank" class="hover:text-[#A8C69F] transition"><i class="fa-brands fa-whatsapp mr-1 text-[#A8C69F]"></i> +62 812-3456-7890</a>
            </div>
        </div>
    </div>

    <!-- 2. NAVBAR -->
    <nav class="sticky top-[33px] sm:top-[33px] z-40 glass-organic shadow-sm transition-all duration-300" x-data="{ mobileMenu: false }">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-20 flex items-center justify-between">
            <a href="#" class="flex items-center gap-3">
                <div class="w-12 h-12 rounded-2xl bg-[#527A55] flex items-center justify-center text-[#F7F6EC] text-xl shadow-md">
                    <i class="fa-solid fa-seedling animate-bounce"></i>
                </div>
                <div>
                    <span class="font-serif text-2xl font-bold tracking-tight text-[#263A2B]">Fresh Harvest</span>
                    <span class="block text-[10px] uppercase tracking-widest text-[#527A55] font-semibold">Organic Meal Prep</span>
                </div>
            </a>
            
            <div class="hidden lg:flex items-center gap-8 font-medium text-sm text-[#263A2B]">
                <a href="#beranda" class="hover:text-[#527A55] transition font-semibold border-b-2 border-[#527A55] pb-1">Beranda</a>
                <a href="#konsep" class="hover:text-[#527A55] transition">Tentang Kami</a>
                <a href="#planner" class="hover:text-[#527A55] transition">Planner Menu</a>
                <a href="#katalog" class="hover:text-[#527A55] transition">Katalog Menu</a>
                <a href="#kalkulator" class="hover:text-[#527A55] transition">Paket & Harga</a>
                <a href="#korporat" class="hover:text-[#527A55] transition">Korporat</a>
                <a href="#faq" class="hover:text-[#527A55] transition">FAQ</a>
            </div>

            <div class="hidden lg:flex items-center gap-4">
                <a href="#kalkulator" class="bg-[#527A55] hover:bg-[#263A2B] text-[#F7F6EC] px-6 py-3 rounded-full font-semibold text-sm transition shadow-lg hover:shadow-xl transform hover:-translate-y-0.5">
                    Mulai Berlangganan
                </a>
            </div>

            <button @click="mobileMenu = !mobileMenu" class="lg:hidden text-[#263A2B] text-2xl focus:outline-none">
                <i :class="mobileMenu ? 'fa-solid fa-xmark' : 'fa-solid fa-bars'"></i>
            </button>
        </div>

        <!-- Mobile Menu -->
        <div x-show="mobileMenu" x-transition class="lg:hidden glass-organic px-6 py-6 space-y-4 border-t border-[#A8C69F]/30 shadow-xl">
            <a href="#beranda" @click="mobileMenu = false" class="block font-semibold text-[#263A2B]">Beranda</a>
            <a href="#konsep" @click="mobileMenu = false" class="block font-semibold text-[#263A2B]">Tentang Kami</a>
            <a href="#planner" @click="mobileMenu = false" class="block font-semibold text-[#263A2B]">Planner Menu</a>
            <a href="#katalog" @click="mobileMenu = false" class="block font-semibold text-[#263A2B]">Katalog Menu</a>
            <a href="#kalkulator" @click="mobileMenu = false" class="block font-semibold text-[#263A2B]">Paket & Harga</a>
            <a href="#korporat" @click="mobileMenu = false" class="block font-semibold text-[#263A2B]">Korporat</a>
            <a href="#faq" @click="mobileMenu = false" class="block font-semibold text-[#263A2B]">FAQ</a>
            <div class="pt-2">
                <a href="#kalkulator" @click="mobileMenu = false" class="block text-center bg-[#527A55] text-[#F7F6EC] py-3 rounded-full font-semibold text-sm">Mulai Berlangganan</a>
            </div>
        </div>
    </nav>

    <!-- 3. HERO BANNER -->
    <header id="beranda" class="relative overflow-hidden py-16 lg:py-24 bg-gradient-to-b from-[#F7F6EC] to-[#E2EBE0]">
        <!-- Floating Decorative Elements -->
        <div class="absolute top-10 left-10 w-24 h-24 bg-[#A8C69F]/30 rounded-full blur-xl animate-float"></div>
        <div class="absolute bottom-10 right-10 w-48 h-48 bg-[#E8A95B]/20 rounded-full blur-2xl animate-float" style="animation-delay: 2s;"></div>
        
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
                <!-- Left Content -->
                <div class="lg:col-span-7 space-y-6">
                    <div class="inline-flex items-center gap-2 bg-[#A8C69F]/30 border border-[#527A55]/30 px-4 py-2 rounded-full text-xs font-semibold text-[#263A2B]">
                        <i class="fa-solid fa-leaf text-[#527A55]"></i> 100% Bahan Organik & Tersertifikasi Ahli Gizi
                    </div>
                    <h1 class="font-serif text-4xl sm:text-6xl font-bold leading-tight text-[#263A2B]">
                        Makanan Sehat <span class="text-[#527A55] italic">Siap Santap</span>, Dibuat Khusus untuk Tubuh Bugar Anda
                    </h1>
                    <p class="text-lg text-[#263A2B]/80 max-w-xl">
                        Nikmati hidangan lezat bernutrisi seimbang harian tanpa repot memasak. Rotasi menu mingguan bervariasi, dihitung presisi kalorinya oleh chef & ahli nutrisi profesional.
                    </p>
                    
                    <div class="flex flex-col sm:flex-row gap-4 pt-2">
                        <a href="#kalkulator" class="bg-[#527A55] hover:bg-[#263A2B] text-[#F7F6EC] px-8 py-4 rounded-full font-bold text-center transition shadow-xl flex items-center justify-center gap-3 transform hover:-translate-y-1">
                            <span>Mulai Langganan Sekarang</span>
                            <i class="fa-solid fa-arrow-right"></i>
                        </a>
                        <a href="#planner" class="bg-white/80 hover:bg-white text-[#263A2B] border border-[#527A55]/40 px-8 py-4 rounded-full font-bold text-center transition shadow-sm flex items-center justify-center gap-2">
                            <i class="fa-solid fa-calendar-days text-[#527A55]"></i>
                            <span>Cek Menu Minggu Ini</span>
                        </a>
                    </div>

                    <!-- Trust Stats -->
                    <div class="grid grid-cols-3 gap-6 pt-8 border-t border-[#A8C69F]/40">
                        <div>
                            <p class="font-serif text-3xl font-bold text-[#527A55]">15.000+</p>
                            <p class="text-xs text-[#263A2B]/70 mt-1">Porsi Dikirim Tiap Minggu</p>
                        </div>
                        <div>
                            <p class="font-serif text-3xl font-bold text-[#527A55]">99.4%</p>
                            <p class="text-xs text-[#263A2B]/70 mt-1">Pelanggan Puas & Susut Berat</p>
                        </div>
                        <div>
                            <p class="font-serif text-3xl font-bold text-[#527A55]">100%</p>
                            <p class="text-xs text-[#263A2B]/70 mt-1">Bahan Segar Tanpa MSG</p>
                        </div>
                    </div>
                </div>

                <!-- Right Visual Showcase -->
                <div class="lg:col-span-5 relative">
                    <div class="relative mx-auto max-w-md">
                        <!-- Main Image Bowl -->
                        <div class="relative rounded-3xl overflow-hidden shadow-2xl border-4 border-white aspect-square">
                            <img src="https://images.unsplash.com/photo-1540420773420-3366772f4999?auto=format&fit=crop&w=800&q=80" alt="Healthy Meal Prep Bowl" class="w-full h-full object-cover transform hover:scale-105 transition duration-500">
                            <div class="absolute inset-0 bg-gradient-to-t from-[#263A2B]/70 via-transparent to-transparent"></div>
                            <div class="absolute bottom-6 left-6 right-6 text-white">
                                <span class="bg-[#E8A95B] text-[#263A2B] text-xs font-bold px-3 py-1 rounded-full">Menu Favorit</span>
                                <h3 class="font-serif text-xl font-bold mt-2">Herb Quinoa & Grilled Salmon Bowl</h3>
                                <p class="text-xs text-gray-200 mt-1">420 Kcal • 32g Protein • 12g Fat</p>
                            </div>
                        </div>

                        <!-- Floating Badge 1 -->
                        <div class="absolute -top-6 -left-6 glass-organic px-5 py-3 rounded-2xl shadow-xl flex items-center gap-3 animate-float">
                            <div class="w-10 h-10 rounded-full bg-[#527A55] text-white flex items-center justify-center font-bold">
                                <i class="fa-solid fa-fire text-sm"></i>
                            </div>
                            <div>
                                <p class="text-[10px] uppercase font-bold text-[#527A55]">Rata-rata Kalori</p>
                                <p class="text-sm font-bold text-[#263A2B]">350 - 450 Kcal / Porsi</p>
                            </div>
                        </div>

                        <!-- Floating Badge 2 -->
                        <div class="absolute -bottom-6 -right-6 glass-organic px-5 py-3 rounded-2xl shadow-xl flex items-center gap-3 animate-float" style="animation-delay: 1.5s;">
                            <div class="w-10 h-10 rounded-full bg-[#E8A95B] text-[#263A2B] flex items-center justify-center font-bold">
                                <i class="fa-solid fa-shield-heart text-sm"></i>
                            </div>
                            <div>
                                <p class="text-[10px] uppercase font-bold text-[#527A55]">Jaminan Kualitas</p>
                                <p class="text-sm font-bold text-[#263A2B]">Bebas Pengawet & MSG</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- 4. PENGENALAN LAYANAN & KEUNTUNGAN -->
    <section id="konsep" class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto space-y-4 mb-16">
                <span class="text-xs font-bold text-[#527A55] uppercase tracking-widest bg-[#A8C69F]/20 px-3 py-1.5 rounded-full">Konsep Layanan</span>
                <h2 class="font-serif text-3xl sm:text-5xl font-bold text-[#263A2B]">Mengapa Memilih Fresh Harvest?</h2>
                <p class="text-[#263A2B]/80 text-base">Kami merancang solusi makanan sehat menyeluruh untuk memudahkan gaya hidup sibuk Anda tanpa mengorbankan kualitas nutrisi.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- Feature 1 -->
                <div class="bg-[#F7F6EC] p-8 rounded-3xl border border-[#A8C69F]/30 hover:shadow-lg transition group">
                    <div class="w-14 h-14 rounded-2xl bg-[#527A55] text-[#F7F6EC] flex items-center justify-center text-xl mb-6 group-hover:scale-110 transition">
                        <i class="fa-solid fa-carrot"></i>
                    </div>
                    <h3 class="font-serif text-xl font-bold text-[#263A2B] mb-3">100% Organik & Segar</h3>
                    <p class="text-sm text-[#263A2B]/70 leading-relaxed">Bahan baku dipanen langsung dari petani lokal mitra terpercaya setiap hari tanpa pestisida sintetis.</p>
                </div>
                <!-- Feature 2 -->
                <div class="bg-[#F7F6EC] p-8 rounded-3xl border border-[#A8C69F]/30 hover:shadow-lg transition group">
                    <div class="w-14 h-14 rounded-2xl bg-[#E8A95B] text-[#263A2B] flex items-center justify-center text-xl mb-6 group-hover:scale-110 transition">
                        <i class="fa-solid fa-calculator"></i>
                    </div>
                    <h3 class="font-serif text-xl font-bold text-[#263A2B] mb-3">Kalori Terhitung Presisi</h3>
                    <p class="text-sm text-[#263A2B]/70 leading-relaxed">Setiap porsi ditimbang dan dikalkulasi kandungan makronutrisi (protein, karbo, lemak, serat) oleh ahli gizi klinis.</p>
                </div>
                <!-- Feature 3 -->
                <div class="bg-[#F7F6EC] p-8 rounded-3xl border border-[#A8C69F]/30 hover:shadow-lg transition group">
                    <div class="w-14 h-14 rounded-2xl bg-[#527A55] text-[#F7F6EC] flex items-center justify-center text-xl mb-6 group-hover:scale-110 transition">
                        <i class="fa-solid fa-utensils"></i>
                    </div>
                    <h3 class="font-serif text-xl font-bold text-[#263A2B] mb-3">Rotasi Menu 4 Minggu</h3>
                    <p class="text-sm text-[#263A2B]/70 leading-relaxed">Menu tidak pernah membosankan karena berputar otomatis setiap minggu dengan cita rasa nusantara & western.</p>
                </div>
                <!-- Feature 4 -->
                <div class="bg-[#F7F6EC] p-8 rounded-3xl border border-[#A8C69F]/30 hover:shadow-lg transition group">
                    <div class="w-14 h-14 rounded-2xl bg-[#E8A95B] text-[#263A2B] flex items-center justify-center text-xl mb-6 group-hover:scale-110 transition">
                        <i class="fa-solid fa-truck-fast"></i>
                    </div>
                    <h3 class="font-serif text-xl font-bold text-[#263A2B] mb-3">Pengiriman Fleksibel</h3>
                    <p class="text-sm text-[#263A2B]/70 leading-relaxed">Pilih jadwal pengiriman harian atau mingguan dengan wadah eco-friendly yang menjaga kesegaran makanan.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- 10. KATEGORI POLA MAKAN (Diet Type Filters) -->
    <section class="py-16 bg-[#F7F6EC]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-2xl mx-auto mb-10">
                <span class="text-xs font-bold text-[#527A55] uppercase tracking-widest">Kategori Spesifik</span>
                <h2 class="font-serif text-3xl font-bold text-[#263A2B] mt-2">Pilih Program Pola Makan Anda</h2>
                <p class="text-sm text-[#263A2B]/70 mt-1">Sesuaikan dengan target kebugaran dan kesehatan tubuh Anda.</p>
            </div>
            <div class="flex flex-wrap justify-center gap-3">
                <button @click="activeDiet = 'all'" :class="activeDiet === 'all' ? 'bg-[#527A55] text-white shadow-md' : 'bg-white text-[#263A2B] border border-[#A8C69F]/50'" class="px-6 py-3 rounded-full font-semibold text-sm transition">🌱 Semua Kategori</button>
                <button @click="activeDiet = 'high-protein'" :class="activeDiet === 'high-protein' ? 'bg-[#527A55] text-white shadow-md' : 'bg-white text-[#263A2B] border border-[#A8C69F]/50'" class="px-6 py-3 rounded-full font-semibold text-sm transition">💪 Tinggi Protein</button>
                <button @click="activeDiet = 'low-carb'" :class="activeDiet === 'low-carb' ? 'bg-[#527A55] text-white shadow-md' : 'bg-white text-[#263A2B] border border-[#A8C69F]/50'" class="px-6 py-3 rounded-full font-semibold text-sm transition">🥑 Rendah Karbohidrat</button>
                <button @click="activeDiet = 'plant-based'" :class="activeDiet === 'plant-based' ? 'bg-[#527A55] text-white shadow-md' : 'bg-white text-[#263A2B] border border-[#A8C69F]/50'" class="px-6 py-3 rounded-full font-semibold text-sm transition">🥗 Nabati (Plant-Based)</button>
                <button @click="activeDiet = 'balanced'" :class="activeDiet === 'balanced' ? 'bg-[#527A55] text-white shadow-md' : 'bg-white text-[#263A2B] border border-[#A8C69F]/50'" class="px-6 py-3 rounded-full font-semibold text-sm transition">⚖️ Gizi Seimbang</button>
            </div>
        </div>
    </section>

    <!-- 5 & 6 & 8 & 9. KATALOG MENU & KATEGORI MAKANAN -->
    <section id="katalog" class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row justify-between items-start md:items-end mb-12 gap-6">
                <div>
                    <span class="text-xs font-bold text-[#527A55] uppercase tracking-widest bg-[#A8C69F]/20 px-3 py-1.5 rounded-full">Katalog Menu</span>
                    <h2 class="font-serif text-3xl sm:text-4xl font-bold text-[#263A2B] mt-3">Menu Sehat Minggu Ini</h2>
                    <p class="text-[#263A2B]/70 text-sm mt-1">Dibuat segar setiap hari oleh Chef Eksekutif & Ahli Nutrisi kami.</p>
                </div>
                <!-- Meal Time Filter -->
                <div class="flex flex-wrap gap-2 bg-[#F7F6EC] p-2 rounded-2xl border border-[#A8C69F]/40">
                    <button @click="mealTimeFilter = 'all'" :class="mealTimeFilter === 'all' ? 'bg-[#527A55] text-white shadow' : 'text-[#263A2B] hover:bg-[#A8C69F]/20'" class="px-4 py-2 rounded-xl text-xs font-semibold transition">Semua Waktu</button>
                    <button @click="mealTimeFilter = 'Sarapan'" :class="mealTimeFilter === 'Sarapan' ? 'bg-[#527A55] text-white shadow' : 'text-[#263A2B] hover:bg-[#A8C69F]/20'" class="px-4 py-2 rounded-xl text-xs font-semibold transition">🌅 Sarapan</button>
                    <button @click="mealTimeFilter = 'Makan Siang'" :class="mealTimeFilter === 'Makan Siang' ? 'bg-[#527A55] text-white shadow' : 'text-[#263A2B] hover:bg-[#A8C69F]/20'" class="px-4 py-2 rounded-xl text-xs font-semibold transition">☀️ Makan Siang</button>
                    <button @click="mealTimeFilter = 'Makan Malam'" :class="mealTimeFilter === 'Makan Malam' ? 'bg-[#527A55] text-white shadow' : 'text-[#263A2B] hover:bg-[#A8C69F]/20'" class="px-4 py-2 rounded-xl text-xs font-semibold transition">🌙 Makan Malam</button>
                    <button @click="mealTimeFilter = 'Camilan'" :class="mealTimeFilter === 'Camilan' ? 'bg-[#527A55] text-white shadow' : 'text-[#263A2B] hover:bg-[#A8C69F]/20'" class="px-4 py-2 rounded-xl text-xs font-semibold transition">🍪 Camilan</button>
                </div>
            </div>

            <!-- Menu Cards Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <template x-for="menu in filteredCatalog" :key="menu.id">
                    <div class="bg-[#F7F6EC] rounded-3xl overflow-hidden border border-[#A8C69F]/40 hover:shadow-xl transition flex flex-col justify-between group">
                        <div>
                            <!-- Image Container -->
                            <div class="relative h-60 overflow-hidden">
                                <img :src="menu.image" :alt="menu.name" class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                                <div class="absolute top-4 left-4 bg-white/90 backdrop-blur px-3 py-1 rounded-full text-xs font-bold text-[#527A55]">
                                    <span x-text="menu.category"></span>
                                </div>
                                <div class="absolute top-4 right-4 bg-[#E8A95B] text-[#263A2B] px-3 py-1 rounded-full text-xs font-bold">
                                    <span x-text="menu.calories + ' Kcal'"></span>
                                </div>
                            </div>
                            <!-- Content -->
                            <div class="p-6">
                                <h3 class="font-serif text-xl font-bold text-[#263A2B] mb-2" x-text="menu.name"></h3>
                                <p class="text-xs text-[#263A2B]/70 mb-4" x-text="menu.desc"></p>
                                
                                <!-- Macro Badges -->
                                <div class="grid grid-cols-4 gap-2 mb-4 bg-white/60 p-3 rounded-2xl text-center text-[10px]">
                                    <div>
                                        <p class="font-bold text-[#527A55]">Protein</p>
                                        <p class="text-[#263A2B] font-semibold" x-text="menu.protein"></p>
                                    </div>
                                    <div>
                                        <p class="font-bold text-[#527A55]">Carbs</p>
                                        <p class="text-[#263A2B] font-semibold" x-text="menu.carbs"></p>
                                    </div>
                                    <div>
                                        <p class="font-bold text-[#527A55]">Lemak</p>
                                        <p class="text-[#263A2B] font-semibold" x-text="menu.fat"></p>
                                    </div>
                                    <div>
                                        <p class="font-bold text-[#527A55]">Serat</p>
                                        <p class="text-[#263A2B] font-semibold" x-text="menu.fiber"></p>
                                    </div>
                                </div>

                                <!-- Ingredients & Allergens -->
                                <div class="text-[11px] text-[#263A2B]/80 space-y-1">
                                    <p><b>Komposisi:</b> <span x-text="menu.ingredients"></span></p>
                                    <p><b>Alergen:</b> <span class="text-amber-700" x-text="menu.allergen"></span></p>
                                </div>
                            </div>
                        </div>

                        <!-- Card Footer Action -->
                        <div class="p-6 pt-0">
                            <button @click="selectMenuForPlan(menu)" class="w-full bg-[#527A55] hover:bg-[#263A2B] text-white py-3 rounded-2xl text-xs font-bold transition flex items-center justify-center gap-2">
                                <i class="fa-solid fa-plus"></i> Tambah ke Planner
                            </button>
                        </div>
                    </div>
                </template>
            </div>
        </div>
    </section>

    <!-- 7. PERENCANA MENU MINGGUAN (INTERAKTIF & Bervariasi) -->
    <section id="planner" class="py-20 bg-[#F7F6EC]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto space-y-4 mb-12">
                <span class="text-xs font-bold text-[#527A55] uppercase tracking-widest bg-[#A8C69F]/30 px-3 py-1.5 rounded-full">Interaktif & Bervariasi</span>
                <h2 class="font-serif text-3xl sm:text-5xl font-bold text-[#263A2B]">Perencana Menu Mingguan Anda</h2>
                <p class="text-[#263A2B]/80 text-base">Setiap hari memiliki rekomendasi menu yang berbeda agar diet Anda tidak pernah membosankan. Klik harinya untuk melihat racikan gizi Chef!</p>
            </div>

            <!-- Day Selector Tabs -->
            <div class="bg-white p-4 rounded-3xl shadow-xl border border-[#A8C69F]/40 max-w-5xl mx-auto">
                <div class="grid grid-cols-2 sm:grid-cols-4 lg:grid-cols-7 gap-2 mb-8">
                    <template x-for="(day, idx) in ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu']" :key="idx">
                        <button @click="selectedPlannerDay = idx" 
                            :class="selectedPlannerDay === idx ? 'bg-[#527A55] text-white shadow-lg scale-105' : 'bg-[#F7F6EC] text-[#263A2B] hover:bg-[#A8C69F]/30'"
                            class="py-4 px-3 rounded-2xl font-bold text-sm transition text-center flex flex-col items-center justify-center gap-1">
                            <span class="text-xs uppercase tracking-wider opacity-80" x-text="'Hari ke-' + (idx+1)"></span>
                            <span x-text="day"></span>
                        </button>
                    </template>
                </div>

                <!-- Active Day Meal Plan Container -->
                <div class="bg-[#F7F6EC]/60 rounded-2xl p-6 sm:p-8 border border-[#A8C69F]/30" x-transition.duration.300ms>
                    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-6 pb-4 border-b border-[#A8C69F]/40 gap-4">
                        <div>
                            <h3 class="font-serif text-2xl font-bold text-[#263A2B] flex items-center gap-3">
                                <i class="fa-solid fa-calendar-days text-[#527A55]"></i>
                                <span x-text="'Rencana Menu Hari ' + ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'][selectedPlannerDay]"></span>
                            </h3>
                            <p class="text-xs text-[#263A2B]/70 mt-1">Kombinasi makronutrisi seimbang diracik khusus untuk energi optimal harian.</p>
                        </div>
                        <span class="bg-[#E8A95B] text-[#263A2B] px-4 py-2 rounded-xl text-xs font-bold shadow-sm" x-text="'Total Nutrisi: ~' + getPlannerTotalCalories() + ' Kcal'"></span>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <!-- Sarapan Slot -->
                        <div class="bg-white p-5 rounded-2xl border border-[#A8C69F]/30 shadow-sm flex flex-col justify-between">
                            <div>
                                <div class="flex justify-between items-center mb-3">
                                    <span class="text-xs font-bold uppercase tracking-wider text-[#E8A95B] bg-[#E8A95B]/10 px-2.5 py-1 rounded-lg">Sarapan (Breakfast)</span>
                                    <span class="text-xs font-bold text-[#527A55]" x-text="weeklyPlannerData[selectedPlannerDay].sarapan.calories + ' Kcal'"></span>
                                </div>
                                <img :src="weeklyPlannerData[selectedPlannerDay].sarapan.image" class="w-full h-36 object-cover rounded-xl mb-3 shadow-sm">
                                <h4 class="font-bold text-base text-[#263A2B]" x-text="weeklyPlannerData[selectedPlannerDay].sarapan.name"></h4>
                                <p class="text-xs text-[#263A2B]/70 mt-1" x-text="weeklyPlannerData[selectedPlannerDay].sarapan.desc"></p>
                            </div>
                            <div class="mt-4 pt-3 border-t border-gray-100 flex justify-between items-center">
                                <span class="text-[10px] text-gray-500" x-text="'Protein: ' + weeklyPlannerData[selectedPlannerDay].sarapan.protein"></span>
                                <button @click="openSwapModal('sarapan')" class="text-xs font-bold text-[#527A55] hover:underline"><i class="fa-solid fa-rotate mr-1"></i> Tukar Menu</button>
                            </div>
                        </div>

                        <!-- Makan Siang Slot -->
                        <div class="bg-white p-5 rounded-2xl border border-[#A8C69F]/30 shadow-sm flex flex-col justify-between">
                            <div>
                                <div class="flex justify-between items-center mb-3">
                                    <span class="text-xs font-bold uppercase tracking-wider text-[#527A55] bg-[#527A55]/10 px-2.5 py-1 rounded-lg">Makan Siang (Lunch)</span>
                                    <span class="text-xs font-bold text-[#527A55]" x-text="weeklyPlannerData[selectedPlannerDay].siang.calories + ' Kcal'"></span>
                                </div>
                                <img :src="weeklyPlannerData[selectedPlannerDay].siang.image" class="w-full h-36 object-cover rounded-xl mb-3 shadow-sm">
                                <h4 class="font-bold text-base text-[#263A2B]" x-text="weeklyPlannerData[selectedPlannerDay].siang.name"></h4>
                                <p class="text-xs text-[#263A2B]/70 mt-1" x-text="weeklyPlannerData[selectedPlannerDay].siang.desc"></p>
                            </div>
                            <div class="mt-4 pt-3 border-t border-gray-100 flex justify-between items-center">
                                <span class="text-[10px] text-gray-500" x-text="'Protein: ' + weeklyPlannerData[selectedPlannerDay].siang.protein"></span>
                                <button @click="openSwapModal('siang')" class="text-xs font-bold text-[#527A55] hover:underline"><i class="fa-solid fa-rotate mr-1"></i> Tukar Menu</button>
                            </div>
                        </div>

                        <!-- Makan Malam Slot -->
                        <div class="bg-white p-5 rounded-2xl border border-[#A8C69F]/30 shadow-sm flex flex-col justify-between">
                            <div>
                                <div class="flex justify-between items-center mb-3">
                                    <span class="text-xs font-bold uppercase tracking-wider text-emerald-800 bg-emerald-100 px-2.5 py-1 rounded-lg">Makan Malam (Dinner)</span>
                                    <span class="text-xs font-bold text-[#527A55]" x-text="weeklyPlannerData[selectedPlannerDay].malam.calories + ' Kcal'"></span>
                                </div>
                                <img :src="weeklyPlannerData[selectedPlannerDay].malam.image" class="w-full h-36 object-cover rounded-xl mb-3 shadow-sm">
                                <h4 class="font-bold text-base text-[#263A2B]" x-text="weeklyPlannerData[selectedPlannerDay].malam.name"></h4>
                                <p class="text-xs text-[#263A2B]/70 mt-1" x-text="weeklyPlannerData[selectedPlannerDay].malam.desc"></p>
                            </div>
                            <div class="mt-4 pt-3 border-t border-gray-100 flex justify-between items-center">
                                <span class="text-[10px] text-gray-500" x-text="'Protein: ' + weeklyPlannerData[selectedPlannerDay].malam.protein"></span>
                                <button @click="openSwapModal('malam')" class="text-xs font-bold text-[#527A55] hover:underline"><i class="fa-solid fa-rotate mr-1"></i> Tukar Menu</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 11, 12, 13, 14. KUSTOMISASI, PORSI, PAKET & KALKULATOR BIAYA -->
    <section id="kalkulator" class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto space-y-4 mb-16">
                <span class="text-xs font-bold text-[#527A55] uppercase tracking-widest bg-[#A8C69F]/20 px-3 py-1.5 rounded-full">Kalkulator Berlangganan</span>
                <h2 class="font-serif text-3xl sm:text-5xl font-bold text-[#263A2B]">Rancang & Hitung Paket Anda</h2>
                <p class="text-[#263A2B]/80 text-base">Pilih jumlah porsi mingguan dan durasi berlangganan untuk mendapatkan estimasi harga terbaik secara instan.</p>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-start">
                <!-- Left Configuration Controls -->
                <div class="lg:col-span-7 space-y-8 bg-[#F7F6EC] p-8 rounded-3xl border border-[#A8C69F]/40">
                    <!-- 13. Paket Porsi per Minggu -->
                    <div>
                        <label class="block font-serif text-lg font-bold text-[#263A2B] mb-3">1. Pilih Jumlah Porsi per Minggu</label>
                        <div class="grid grid-cols-2 sm:grid-cols-4 gap-4">
                            <template x-for="p in [5, 10, 15, 20]" :key="p">
                                <button @click="selectedMealsPerWeek = p" 
                                    :class="selectedMealsPerWeek === p ? 'bg-[#527A55] text-white shadow-lg ring-2 ring-[#527A55]' : 'bg-white text-[#263A2B] hover:bg-[#A8C69F]/20'"
                                    class="py-4 rounded-2xl font-bold text-center transition flex flex-col items-center justify-center">
                                    <span class="text-2xl font-serif" x-text="p"></span>
                                    <span class="text-xs opacity-80 mt-1">Makanan / Mgg</span>
                                </button>
                            </template>
                        </div>
                    </div>

                    <!-- 12. Pilihan Durasi Langganan -->
                    <div>
                        <label class="block font-serif text-lg font-bold text-[#263A2B] mb-3">2. Pilih Durasi Langganan</label>
                        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                            <button @click="selectedWeeksDuration = 1" :class="selectedWeeksDuration === 1 ? 'bg-[#527A55] text-white shadow' : 'bg-white text-[#263A2B]'" class="py-3 px-4 rounded-2xl font-bold text-center transition">
                                1 Minggu <span class="block text-[10px] font-normal opacity-80">Uji Coba Fleksibel</span>
                            </button>
                            <button @click="selectedWeeksDuration = 4" :class="selectedWeeksDuration === 4 ? 'bg-[#527A55] text-white shadow' : 'bg-white text-[#263A2B]'" class="py-3 px-4 rounded-2xl font-bold text-center transition">
                                1 Bulan (4 Mgg) <span class="block text-[10px] font-normal opacity-80">Hemat 10%</span>
                            </button>
                            <button @click="selectedWeeksDuration = 12" :class="selectedWeeksDuration === 12 ? 'bg-[#527A55] text-white shadow' : 'bg-white text-[#263A2B]'" class="py-3 px-4 rounded-2xl font-bold text-center transition">
                                3 Bulan (12 Mgg) <span class="block text-[10px] font-normal opacity-80">Hemat 20% + Bonus</span>
                            </button>
                        </div>
                    </div>

                    <!-- 11. Kustomisasi Preferensi Diet Utama -->
                    <div>
                        <label class="block font-serif text-lg font-bold text-[#263A2B] mb-3">3. Preferensi Utama Paket</label>
                        <select x-model="selectedDietGoal" class="w-full bg-white border border-[#A8C69F] rounded-2xl p-4 text-sm font-semibold text-[#263A2B] focus:outline-none focus:ring-2 focus:ring-[#527A55]">
                            <option value="balanced">⚖️ Gizi Seimbang Umum (Balanced Nutrition)</option>
                            <option value="weightloss">🔥 Penurunan Berat Badan (Low Calorie / High Fiber)</option>
                            <option value="muscle">💪 Pembentukan Otot (High Protein & Lean Meat)</option>
                            <option value="plant">🌱 Vegetarian / Nabati Murni (Plant-Based)</option>
                        </select>
                    </div>
                </div>

                <!-- Right Cost Summary & Checkout Widget -->
                <div class="lg:col-span-5 bg-[#263A2B] text-[#F7F6EC] p-8 rounded-3xl shadow-2xl relative overflow-hidden">
                    <div class="absolute top-0 right-0 w-32 h-32 bg-[#A8C69F]/10 rounded-full blur-2xl"></div>
                    <h3 class="font-serif text-2xl font-bold mb-6 border-b border-[#A8C69F]/30 pb-4">Ringkasan Paket Anda</h3>
                    
                    <div class="space-y-4 text-sm mb-8">
                        <div class="flex justify-between">
                            <span class="text-gray-300">Jumlah Porsi:</span>
                            <span class="font-bold" x-text="selectedMealsPerWeek + ' porsi / minggu'"></span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-300">Durasi Berlangganan:</span>
                            <span class="font-bold" x-text="selectedWeeksDuration + ' minggu'"></span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-300">Target Diet:</span>
                            <span class="font-bold capitalize" x-text="selectedDietGoal"></span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-300">Diskon Paket:</span>
                            <span class="font-bold text-[#E8A95B]" x-text="calculateDiscount() + '%'"></span>
                        </div>
                        <div class="pt-4 border-t border-[#A8C69F]/30 flex justify-between items-center">
                            <span class="text-base font-bold">Total Estimasi Biaya:</span>
                            <span class="font-serif text-2xl font-bold text-[#E8A95B]" x-text="formatIDR(calculateTotalPrice())"></span>
                        </div>
                    </div>

                    <button @click="openCheckoutModal()" class="w-full bg-[#E8A95B] hover:bg-[#d99748] text-[#263A2B] py-4 rounded-2xl font-bold text-center transition shadow-xl flex items-center justify-center gap-2">
                        <i class="fa-solid fa-lock"></i> Lanjutkan ke Pembayaran
                    </button>
                    <p class="text-[11px] text-center text-gray-400 mt-4">Garansi uang kembali 100% pada minggu pertama jika Anda tidak puas dengan kualitas makanan kami.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- 15. KALENDER ROTASI MENU & 16. JADWAL PENGIRIMAN & 17. JANGKAUAN -->
    <section id="jangkauan" class="py-20 bg-[#F7F6EC]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <!-- Rotasi & Jadwal -->
                <div class="space-y-6">
                    <span class="text-xs font-bold text-[#527A55] uppercase tracking-widest bg-[#A8C69F]/30 px-3 py-1.5 rounded-full">Rotasi & Pengiriman</span>
                    <h2 class="font-serif text-3xl sm:text-4xl font-bold text-[#263A2B]">Jadwal & Rotasi Menu Otomatis</h2>
                    <p class="text-[#263A2B]/80 text-sm leading-relaxed">
                        Menu berputar secara siklus 4 mingguan untuk memastikan Anda mendapatkan nutrisi makro yang lengkap dan variasi rasa kuliner dunia. Pengiriman dilakukan setiap hari pukul 06.00 - 09.00 pagi atau sore hari untuk makan malam.
                    </p>
                    <div class="space-y-4">
                        <div class="flex items-start gap-4 bg-white p-4 rounded-2xl border border-[#A8C69F]/30">
                            <div class="w-10 h-10 rounded-xl bg-[#527A55] text-white flex items-center justify-center shrink-0"><i class="fa-solid fa-clock"></i></div>
                            <div>
                                <h4 class="font-bold text-sm text-[#263A2B]">Waktu Pengiriman Fleksibel</h4>
                                <p class="text-xs text-[#263A2B]/70 mt-0.5">Sesi Pagi (06.00 - 09.00) atau Sesi Sore (15.00 - 18.00).</p>
                            </div>
                        </div>
                        <div class="flex items-start gap-4 bg-white p-4 rounded-2xl border border-[#A8C69F]/30">
                            <div class="w-10 h-10 rounded-xl bg-[#E8A95B] text-[#263A2B] flex items-center justify-center shrink-0"><i class="fa-solid fa-box-open"></i></div>
                            <div>
                                <h4 class="font-bold text-sm text-[#263A2B]">Thermal Eco-Bag</h4>
                                <p class="text-xs text-[#263A2B]/70 mt-0.5">Dikemas dalam tas insulasi khusus agar makanan tetap segar di depan pintu Anda.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- 17. Cek Jangkauan Pengiriman Widget -->
                <div class="bg-white p-8 rounded-3xl shadow-xl border border-[#A8C69F]/40" x-data="{ zipInput: '', checkResult: null }">
                    <h3 class="font-serif text-2xl font-bold text-[#263A2B] mb-2">Periksa Jangkauan Pengiriman</h3>
                    <p class="text-xs text-[#263A2B]/70 mb-6">Masukkan kode pos atau nama area Anda untuk memastikan layanan kurir dingin kami menjangkau lokasi Anda.</p>
                    
                    <div class="flex gap-3 mb-4">
                        <input type="text" x-model="zipInput" placeholder="Contoh: Menteng, Kebayoran, Surabaya Gubeng..." class="flex-1 bg-[#F7F6EC] border border-[#A8C69F] rounded-2xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-[#527A55]">
                        <button @click="checkResult = zipInput.trim() ? true : false" class="bg-[#527A55] hover:bg-[#263A2B] text-white px-6 py-3 rounded-2xl font-bold text-sm transition">Cek Area</button>
                    </div>

                    <template x-if="checkResult === true">
                        <div class="bg-emerald-50 border border-emerald-200 text-emerald-800 p-4 rounded-2xl text-xs flex items-center gap-3">
                            <i class="fa-solid fa-circle-check text-emerald-600 text-base"></i>
                            <span><b>Kabar Baik!</b> Area Anda masuk dalam jangkauan pengiriman gratis ongkir Fresh Harvest.</span>
                        </div>
                    </template>
                </div>
            </div>
        </div>
    </section>

    <!-- 18. INFORMASI PENYIMPANAN MAKANAN & 19. GALERI PRODUKSI & 20. PROFIL KOKI -->
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- 19. Galeri Proses Produksi & Dapur -->
            <div class="text-center max-w-3xl mx-auto space-y-4 mb-16">
                <span class="text-xs font-bold text-[#527A55] uppercase tracking-widest bg-[#A8C69F]/20 px-3 py-1.5 rounded-full">Dapur & Higienitas</span>
                <h2 class="font-serif text-3xl sm:text-5xl font-bold text-[#263A2B]">Dibalik Layar Dapur Fresh Harvest</h2>
                <p class="text-[#263A2B]/80 text-base">Standar kebersihan tertinggi, peralatan modern, dan tim chef berpengalaman yang mendedikasikan diri untuk kesehatan Anda.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-20">
                <div class="rounded-3xl overflow-hidden shadow-lg border border-gray-100 group">
                    <img src="https://images.unsplash.com/photo-1556910103-1c02745aae4d?auto=format&fit=crop&w=600&q=80" alt="Kitchen Cooking" class="w-full h-64 object-cover group-hover:scale-105 transition duration-500">
                    <div class="p-6 bg-[#F7F6EC]">
                        <h4 class="font-serif font-bold text-lg text-[#263A2B] mb-1">Pemilihan Sayur Organik</h4>
                        <p class="text-xs text-[#263A2B]/70">Sayuran segar disortir ketat dan dicuci menggunakan air ozon steril.</p>
                    </div>
                </div>
                <div class="rounded-3xl overflow-hidden shadow-lg border border-gray-100 group">
                    <img src="https://images.unsplash.com/photo-1577219491135-ce391730fb2c?auto=format&fit=crop&w=600&q=80" alt="Chef Cooking" class="w-full h-64 object-cover group-hover:scale-105 transition duration-500">
                    <div class="p-6 bg-[#F7F6EC]">
                        <h4 class="font-serif font-bold text-lg text-[#263A2B] mb-1">Dimasak oleh Chef Profesional</h4>
                        <p class="text-xs text-[#263A2B]/70">Teknik memasak rendah minyak, minim garam, dan tanpa penguat rasa buatan.</p>
                    </div>
                </div>
                <div class="rounded-3xl overflow-hidden shadow-lg border border-gray-100 group">
                    <img src="https://images.unsplash.com/photo-1590779035983-465e3152e3f6?auto=format&fit=crop&w=600&q=80" alt="Packaging" class="w-full h-64 object-cover group-hover:scale-105 transition duration-500">
                    <div class="p-6 bg-[#F7F6EC]">
                        <h4 class="font-serif font-bold text-lg text-[#263A2B] mb-1">Vacuum Sealing Higienis</h4>
                        <p class="text-xs text-[#263A2B]/70">Dikemas dalam wadah BPA-Free ramah lingkungan yang aman untuk microwave.</p>
                    </div>
                </div>
            </div>

            <!-- 18. Petunjuk Penyimpanan & 20. Tim Koki -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center bg-[#F7F6EC] p-8 sm:p-12 rounded-3xl border border-[#A8C69F]/40">
                <div class="space-y-4">
                    <span class="text-xs font-bold text-[#527A55] uppercase tracking-widest">Panduan Konsumsi</span>
                    <h3 class="font-serif text-2xl font-bold text-[#263A2B]">Petunjuk Penyimpanan & Penghangatan</h3>
                    <ul class="space-y-3 text-sm text-[#263A2B]/80">
                        <li class="flex items-start gap-3">
                            <i class="fa-solid fa-snowflake text-[#527A55] mt-1"></i>
                            <span><b>Suhu Chiller:</b> Simpan dalam lemari es (chiller) bersuhu 2-4°C segera setelah diterima. Tahan hingga 3 hari.</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <i class="fa-solid fa-fire-burner text-[#E8A95B] mt-1"></i>
                            <span><b>Cara Menghangatkan:</b> Buka sedikit tutup wadah, panaskan dalam microwave selama 2-3 menit pada suhu medium.</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <i class="fa-solid fa-shield-halved text-[#527A55] mt-1"></i>
                            <span><b>Tanpa Pengawet:</b> Karena bebas bahan kimia pengawet, harap dikonsumsi sebelum tanggal kadaluarsa pada label kemasan.</span>
                        </li>
                    </ul>
                </div>
                <div class="bg-white p-8 rounded-2xl border border-[#A8C69F]/30 space-y-4 shadow-sm">
                    <div class="flex items-center gap-4">
                        <img src="https://images.unsplash.com/photo-1583394838336-acd977736f90?auto=format&fit=crop&w=200&q=80" class="w-16 h-16 rounded-full object-cover shadow">
                        <div>
                            <h4 class="font-serif font-bold text-lg text-[#263A2B]">Chef Marcus & Dr. Nadia, Sp.GK</h4>
                            <p class="text-xs text-[#527A55] font-semibold">Executive Chef & Clinical Nutritionist</p>
                        </div>
                    </div>
                    <p class="text-xs text-[#263A2B]/70 leading-relaxed">
                        "Kami memastikan setiap kalori yang masuk ke dalam tubuh Anda bukan sekadar angka, melainkan bahan bakar berkualitas tinggi untuk meningkatkan produktivitas dan umur panjang."
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- 21. CERITA & ULASAN PELANGGAN -->
    <section class="py-20 bg-[#F7F6EC]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto space-y-4 mb-16">
                <span class="text-xs font-bold text-[#527A55] uppercase tracking-widest bg-[#A8C69F]/30 px-3 py-1.5 rounded-full">Testimoni Nyata</span>
                <h2 class="font-serif text-3xl sm:text-5xl font-bold text-[#263A2B]">Cerita Sukses Pelanggan Kami</h2>
                <p class="text-[#263A2B]/80 text-base">Ribuan profesional dan ibu rumah tangga telah merasakan transformasi kesehatan bersama Fresh Harvest.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Testi 1 -->
                <div class="bg-white p-8 rounded-3xl border border-[#A8C69F]/30 shadow-sm flex flex-col justify-between">
                    <div class="space-y-4">
                        <div class="flex text-amber-500 text-sm">
                            <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
                        </div>
                        <p class="text-sm text-[#263A2B]/80 italic">"Berat badan turun 4 kg dalam sebulan tanpa merasa lemas. Rasanya enak banget, gak kayak makanan diet pada umumnya!"</p>
                    </div>
                    <div class="mt-6 pt-4 border-t border-gray-100 flex items-center gap-3">
                        <div class="w-10 h-10 rounded-full bg-[#527A55] text-white flex items-center justify-center font-bold text-sm">AR</div>
                        <div>
                            <p class="font-bold text-xs text-[#263A2B]">Amanda Rahma</p>
                            <p class="text-[10px] text-gray-500">UI/UX Designer, Jakarta</p>
                        </div>
                    </div>
                </div>
                <!-- Testi 2 -->
                <div class="bg-white p-8 rounded-3xl border border-[#A8C69F]/30 shadow-sm flex flex-col justify-between">
                    <div class="space-y-4">
                        <div class="flex text-amber-500 text-sm">
                            <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
                        </div>
                        <p class="text-sm text-[#263A2B]/80 italic">"Sangat membantu pekerja kantoran yang sibuk. Makanan datang tepat waktu pagi-pagi, higienis, dan porsinya pas."</p>
                    </div>
                    <div class="mt-6 pt-4 border-t border-gray-100 flex items-center gap-3">
                        <div class="w-10 h-10 rounded-full bg-[#E8A95B] text-[#263A2B] flex items-center justify-center font-bold text-sm">DP</div>
                        <div>
                            <p class="font-bold text-xs text-[#263A2B]">Dimas Prasetyo</p>
                            <p class="text-[10px] text-gray-500">Product Manager, Surabaya</p>
                        </div>
                    </div>
                </div>
                <!-- Testi 3 -->
                <div class="bg-white p-8 rounded-3xl border border-[#A8C69F]/30 shadow-sm flex flex-col justify-between">
                    <div class="space-y-4">
                        <div class="flex text-amber-500 text-sm">
                            <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
                        </div>
                        <p class="text-sm text-[#263A2B]/80 italic">"Fitur ganti menu dan jeda langganannya fleksibel banget pas saya dinas luar kota. Recommended banget!"</p>
                    </div>
                    <div class="mt-6 pt-4 border-t border-gray-100 flex items-center gap-3">
                        <div class="w-10 h-10 rounded-full bg-[#527A55] text-white flex items-center justify-center font-bold text-sm">SK</div>
                        <div>
                            <p class="font-bold text-xs text-[#263A2B]">Siti Kania</p>
                            <p class="text-[10px] text-gray-500">Dokter Spesialis, Bandung</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 22. PENGELOLAAN LANGGANAN (Subscription Management Feature Info) -->
    <section class="py-16 bg-white border-y border-[#A8C69F]/30">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-gradient-to-r from-[#263A2B] to-[#3A5340] text-white p-8 sm:p-12 rounded-3xl shadow-xl flex flex-col lg:flex-row items-center justify-between gap-8">
                <div class="space-y-4 max-w-2xl">
                    <span class="bg-[#E8A95B] text-[#263A2B] text-xs font-bold px-3 py-1 rounded-full uppercase">Fleksibilitas Penuh</span>
                    <h3 class="font-serif text-2xl sm:text-3xl font-bold">Kelola Langganan Anda Semudah 1-2-3</h3>
                    <p class="text-xs sm:text-sm text-gray-200 leading-relaxed">
                        Sibuk atau ingin liburan? Anda dapat menjeda (pause) jadwal pengiriman, melewati hari tertentu, atau mengganti preferensi menu langsung melalui dashboard member kami kapan saja tanpa biaya tambahan.
                    </p>
                </div>
                <div class="flex flex-col sm:flex-row gap-4 shrink-0">
                    <button @click="openManageModal()" class="bg-[#E8A95B] hover:bg-[#d99748] text-[#263A2B] px-6 py-3 rounded-2xl font-bold text-xs transition shadow-md">
                        <i class="fa-solid fa-sliders mr-2"></i> Buka Dashboard Member
                    </button>
                </div>
            </div>
        </div>
    </section>

    <!-- 24. PAKET LANGGANAN KORPORAT -->
    <section id="korporat" class="py-20 bg-[#F7F6EC]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white p-8 sm:p-16 rounded-3xl shadow-xl border border-[#A8C69F]/40 grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <div class="space-y-6">
                    <span class="text-xs font-bold text-[#527A55] uppercase tracking-widest bg-[#A8C69F]/20 px-3 py-1.5 rounded-full">B2B Corporate Wellness</span>
                    <h2 class="font-serif text-3xl sm:text-4xl font-bold text-[#263A2B]">Paket Langganan Sehat untuk Perusahaan & Kantor</h2>
                    <p class="text-[#263A2B]/80 text-sm leading-relaxed">
                        Tingkatkan produktivitas dan kesehatan karyawan Anda dengan program katering kantor harian atau mingguan. Tersedia konsultasi gizi gratis untuk seluruh karyawan korporat.
                    </p>
                    <ul class="space-y-2 text-xs text-[#263A2B]/80">
                        <li><i class="fa-solid fa-check text-[#527A55] mr-2"></i> Harga khusus volume korporat & diskon spesial</li>
                        <li><i class="fa-solid fa-check text-[#527A55] mr-2"></i> Laporan kesehatan & produktivitas bulanan</li>
                        <li><i class="fa-solid fa-check text-[#527A55] mr-2"></i> Pengiriman tepat waktu sebelum jam makan siang kantor</li>
                    </ul>
                    <a href="https://wa.me/6281234567890?text=Halo%20Fresh%20Harvest,%20saya%20tertarik%20dengan%20Paket%20Korporat" target="_blank" class="inline-flex items-center gap-2 bg-[#527A55] hover:bg-[#263A2B] text-white px-6 py-3 rounded-2xl font-bold text-xs transition shadow">
                        <i class="fa-brands fa-whatsapp text-sm"></i> Konsultasi Paket Korporat
                    </a>
                </div>
                <div>
                    <img src="https://images.unsplash.com/photo-1522071820081-009f0129c71c?auto=format&fit=crop&w=800&q=80" alt="Corporate Team" class="rounded-2xl shadow-lg w-full h-80 object-cover">
                </div>
            </div>
        </div>
    </section>

    <!-- 25. FAQ (PERTANYAAN UMUM) -->
    <section id="faq" class="py-20 bg-white" x-data="{ openFaq: null }">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center space-y-4 mb-16">
                <span class="text-xs font-bold text-[#527A55] uppercase tracking-widest bg-[#A8C69F]/20 px-3 py-1.5 rounded-full">Bantuan & FAQ</span>
                <h2 class="font-serif text-3xl sm:text-5xl font-bold text-[#263A2B]">Pertanyaan Yang Sering Diajukan</h2>
                <p class="text-[#263A2B]/80 text-base">Semua informasi seputar menu, pembayaran, pengiriman, dan langganan Anda.</p>
            </div>

            <div class="space-y-4">
                <template x-for="(faq, idx) in faqs" :key="idx">
                    <div class="bg-[#F7F6EC] rounded-2xl border border-[#A8C69F]/40 overflow-hidden transition">
                        <button @click="openFaq = openFaq === idx ? null : idx" class="w-full p-6 text-left font-serif font-bold text-[#263A2B] flex justify-between items-center focus:outline-none">
                            <span x-text="faq.q"></span>
                            <i :class="openFaq === idx ? 'fa-solid fa-chevron-up text-[#527A55]' : 'fa-solid fa-chevron-down text-gray-400'"></i>
                        </button>
                        <div x-show="openFaq === idx" x-transition class="px-6 pb-6 text-xs sm:text-sm text-[#263A2B]/80 leading-relaxed border-t border-[#A8C69F]/20 pt-4">
                            <p x-text="faq.a"></p>
                        </div>
                    </div>
                </template>
            </div>
        </div>
    </section>

    <!-- 26. FOOTER -->
    <footer class="bg-[#263A2B] text-[#F7F6EC] pt-16 pb-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-12 mb-12">
                <!-- Col 1: Brand -->
                <div class="lg:col-span-2 space-y-4">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-xl bg-[#527A55] flex items-center justify-center text-[#F7F6EC]">
                            <i class="fa-solid fa-seedling"></i>
                        </div>
                        <span class="font-serif text-2xl font-bold">Fresh Harvest</span>
                    </div>
                    <p class="text-xs text-gray-300 leading-relaxed max-w-sm">
                        Layanan langganan makanan sehat siap santap (healthy meal prep subscription) terkemuka dengan bahan organik pilihan dan perhitungan nutrisi klinis profesional.
                    </p>
                    <div class="flex gap-4 pt-2">
                        <a href="#" class="w-9 h-9 rounded-full bg-white/10 flex items-center justify-center hover:bg-[#527A55] transition"><i class="fa-brands fa-instagram"></i></a>
                        <a href="#" class="w-9 h-9 rounded-full bg-white/10 flex items-center justify-center hover:bg-[#527A55] transition"><i class="fa-brands fa-facebook-f"></i></a>
                        <a href="#" class="w-9 h-9 rounded-full bg-white/10 flex items-center justify-center hover:bg-[#527A55] transition"><i class="fa-brands fa-tiktok"></i></a>
                        <a href="#" class="w-9 h-9 rounded-full bg-white/10 flex items-center justify-center hover:bg-[#527A55] transition"><i class="fa-brands fa-whatsapp"></i></a>
                    </div>
                </div>

                <!-- Col 2: Navigasi -->
                <div class="space-y-3">
                    <h4 class="font-serif font-bold text-sm text-[#E8A95B] uppercase tracking-wider">Navigasi</h4>
                    <ul class="space-y-2 text-xs text-gray-300">
                        <li><a href="#beranda" class="hover:text-white transition">Beranda</a></li>
                        <li><a href="#konsep" class="hover:text-white transition">Tentang Kami</a></li>
                        <li><a href="#planner" class="hover:text-white transition">Planner Menu</a></li>
                        <li><a href="#katalog" class="hover:text-white transition">Katalog Menu</a></li>
                        <li><a href="#kalkulator" class="hover:text-white transition">Paket & Harga</a></li>
                    </ul>
                </div>

                <!-- Col 3: Kategori Diet -->
                <div class="space-y-3">
                    <h4 class="font-serif font-bold text-sm text-[#E8A95B] uppercase tracking-wider">Pola Makan</h4>
                    <ul class="space-y-2 text-xs text-gray-300">
                        <li><a href="#katalog" class="hover:text-white transition">Tinggi Protein</a></li>
                        <li><a href="#katalog" class="hover:text-white transition">Rendah Karbohidrat</a></li>
                        <li><a href="#katalog" class="hover:text-white transition">Nabati / Vegetarian</a></li>
                        <li><a href="#katalog" class="hover:text-white transition">Gizi Seimbang</a></li>
                        <li><a href="#korporat" class="hover:text-white transition">Paket Korporat</a></li>
                    </ul>
                </div>

                <!-- Col 4: Kontak -->
                <div class="space-y-3">
                    <h4 class="font-serif font-bold text-sm text-[#E8A95B] uppercase tracking-wider">Kontak & Lokasi</h4>
                    <p class="text-xs text-gray-300">Jl. Senopati Raya No. 45, Kebayoran Baru, Jakarta Selatan</p>
                    <p class="text-xs text-gray-300">Email: halo@freshharvest.id</p>
                    <p class="text-xs text-gray-300">Telepon: +62 21 5558900</p>
                </div>
            </div>

            <div class="pt-8 border-t border-white/10 flex flex-col sm:flex-row justify-between items-center text-xs text-gray-400">
                <p>&copy; 2026 PT Fresh Harvest Indonesia. All rights reserved.</p>
                <div class="flex gap-6 mt-4 sm:mt-0">
                    <a href="#" class="hover:text-white transition">Kebijakan Privasi</a>
                    <a href="#" class="hover:text-white transition">Syarat & Ketentuan</a>
                </div>
            </div>
        </div>
    </footer>

    <!-- 27 & 28. FLOATING BUTTONS (WHATSAPP & AI CHATBOT UNIK) -->
    <div class="fixed bottom-6 right-6 z-50 flex flex-col items-end gap-4">
        <!-- 27. Floating WhatsApp Button -->
        <a href="https://wa.me/6281234567890?text=Halo%20Fresh%20Harvest,%20saya%20ingin%20berkonsultasi%20menu%20sehat" target="_blank" 
           class="w-14 h-14 bg-[#25D366] hover:bg-[#20ba59] text-white rounded-full flex items-center justify-center shadow-2xl transition transform hover:scale-110 relative group">
            <i class="fa-brands fa-whatsapp text-2xl"></i>
            <span class="absolute right-16 bg-[#263A2B] text-white text-[10px] font-bold px-3 py-1.5 rounded-xl opacity-0 group-hover:opacity-100 transition whitespace-nowrap shadow-md pointer-events-none">
                Chat WhatsApp Admin 🌿
            </span>
        </a>

        <!-- 28. Floating AI Chatbot Button (Unik & Meriah) -->
        <div x-data="{ chatOpen: false }" class="relative">
            <!-- Chatbot Window Popup -->
            <div x-show="chatOpen" x-transition class="absolute bottom-20 right-0 w-80 sm:w-96 bg-white rounded-3xl shadow-2xl border border-[#527A55]/30 overflow-hidden z-50">
                <div class="bg-[#527A55] text-white p-4 flex justify-between items-center">
                    <div class="flex items-center gap-3">
                        <div class="w-9 h-9 rounded-full bg-[#E8A95B] text-[#263A2B] flex items-center justify-center font-bold">
                            <i class="fa-solid fa-robot text-sm"></i>
                        </div>
                        <div>
                            <p class="font-bold text-sm">Harvest AI Assistant</p>
                            <p class="text-[10px] text-[#A8C69F]">Online • Tanya Nutrisi & Menu</p>
                        </div>
                    </div>
                    <button @click="chatOpen = false" class="text-white hover:text-gray-200"><i class="fa-solid fa-xmark text-lg"></i></button>
                </div>
                <div class="p-4 h-64 overflow-y-auto space-y-3 bg-[#F7F6EC]/50 text-xs">
                    <div class="bg-white p-3 rounded-2xl shadow-sm max-w-[80%] border border-[#A8C69F]/30">
                        Halo! Saya asisten AI Fresh Harvest. Ada yang ingin Anda tanyakan seputar kalori menu, saran diet, atau cara berlangganan? 🥗
                    </div>
                </div>
                <div class="p-3 bg-white border-t border-gray-100 flex gap-2">
                    <input type="text" placeholder="Ketik pertanyaan gizi..." class="flex-1 bg-[#F7F6EC] border border-[#A8C69F]/40 rounded-xl px-3 py-2 text-xs focus:outline-none focus:ring-1 focus:ring-[#527A55]">
                    <button class="bg-[#527A55] text-white px-4 py-2 rounded-xl text-xs font-bold hover:bg-[#263A2B] transition"><i class="fa-solid fa-paper-plane"></i></button>
                </div>
            </div>

            <!-- Floating Button Trigger with Leaf Spin & Glow -->
            <button @click="chatOpen = !chatOpen" 
                    class="relative w-16 h-16 rounded-full bg-gradient-to-tr from-[#527A55] to-[#E8A95B] p-1 shadow-2xl animate-pulse-glow flex items-center justify-center transform hover:scale-110 transition group">
                <!-- Outer rotating leaf ring -->
                <div class="absolute inset-0 rounded-full border-2 border-dashed border-[#F7F6EC] animate-leaf-spin pointer-events-none"></div>
                <!-- Inner Icon -->
                <div class="w-full h-full bg-[#263A2B] rounded-full flex items-center justify-center text-[#F7F6EC] relative z-10">
                    <i class="fa-solid fa-seedling text-xl text-[#A8C69F] animate-bounce"></i>
                </div>
                <span class="absolute right-20 bg-[#263A2B] text-white text-[10px] font-bold px-3 py-1.5 rounded-xl opacity-0 group-hover:opacity-100 transition whitespace-nowrap shadow-md pointer-events-none">
                    Tanya AI Ahli Gizi 🤖
                </span>
            </button>
        </div>
    </div>

    <!-- MODAL: SWAP MENU PLANNER -->
    <div x-show="swapModalOpen" x-transition class="fixed inset-0 z-50 bg-black/50 backdrop-blur-sm flex items-center justify-center p-4">
        <div class="bg-white rounded-3xl max-w-md w-full p-6 shadow-2xl border border-[#527A55]/30 space-y-4">
            <div class="flex justify-between items-center border-b pb-3">
                <h3 class="font-serif font-bold text-lg text-[#263A2B]">Pilih Variasi Pengganti Menu</h3>
                <button @click="swapModalOpen = false" class="text-gray-400 hover:text-gray-600"><i class="fa-solid fa-xmark text-lg"></i></button>
            </div>
            <p class="text-xs text-gray-600">Pilih menu alternatif sehat di bawah ini untuk mengganti slot <span class="font-bold capitalize" x-text="swapSlotType"></span> hari ini:</p>
            <div class="space-y-3 max-h-64 overflow-y-auto pr-1">
                <template x-for="m in catalogMenus" :key="m.id">
                    <div @click="confirmSwapMenu(m)" class="flex items-center gap-3 p-3 rounded-2xl bg-[#F7F6EC] hover:bg-[#A8C69F]/20 cursor-pointer transition border border-[#A8C69F]/30">
                        <img :src="m.image" class="w-12 h-12 rounded-xl object-cover">
                        <div class="flex-1">
                            <h4 class="font-bold text-xs text-[#263A2B]" x-text="m.name"></h4>
                            <p class="text-[10px] text-gray-500" x-text="m.calories + ' Kcal • Protein ' + m.protein"></p>
                        </div>
                        <i class="fa-solid fa-circle-plus text-[#527A55]"></i>
                    </div>
                </template>
            </div>
        </div>
    </div>

    <!-- MODAL: DATA DIRI & KONFIRMASI VIA WHATSAPP -->
    <div x-show="checkoutModalOpen" x-transition class="fixed inset-0 z-[60] bg-black/60 backdrop-blur-sm flex items-center justify-center p-3 sm:p-5" @keydown.escape.window="checkoutModalOpen = false">
        <div @click.outside="checkoutModalOpen = false" class="bg-white rounded-3xl max-w-2xl w-full max-h-[92vh] overflow-y-auto p-6 sm:p-8 shadow-2xl border border-[#527A55]/30">
            <div class="flex items-start justify-between gap-4 mb-6">
                <div>
                    <span class="text-[10px] font-bold tracking-[.2em] uppercase text-[#527A55]">Satu langkah lagi</span>
                    <h3 class="font-serif font-bold text-2xl sm:text-3xl text-[#263A2B] mt-1">Data Pemesanan</h3>
                    <p class="text-sm text-gray-500 mt-2">Lengkapi data diri dan alamat pengiriman. Setelah itu, detail pesanan akan otomatis disiapkan di WhatsApp.</p>
                </div>
                <button type="button" @click="checkoutModalOpen = false" class="w-10 h-10 shrink-0 rounded-full bg-[#F7F6EC] text-[#263A2B] hover:bg-[#A8C69F]/40" aria-label="Tutup">&times;</button>
            </div>

            <div class="bg-[#F7F6EC] border border-[#A8C69F]/40 rounded-2xl p-4 mb-6 text-sm">
                <div class="flex justify-between gap-3"><span class="text-gray-600">Paket</span><strong class="text-right text-[#263A2B]" x-text="selectedMealsPerWeek + ' porsi/minggu · ' + selectedWeeksDuration + ' minggu'"></strong></div>
                <div class="flex justify-between gap-3 mt-2"><span class="text-gray-600">Preferensi diet</span><strong class="text-right text-[#263A2B]" x-text="dietGoalLabel()"></strong></div>
                <div class="flex justify-between gap-3 mt-2 pt-3 border-t border-[#A8C69F]/50"><span class="font-bold text-[#263A2B]">Total estimasi</span><strong class="font-serif text-xl text-[#527A55]" x-text="formatIDR(calculateTotalPrice())"></strong></div>
            </div>

            <form @submit.prevent="sendOrderToWhatsApp()" class="space-y-4">
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <label class="block text-xs font-bold text-[#263A2B]">Nama Lengkap *
                        <input required x-model.trim="customer.name" type="text" autocomplete="name" placeholder="Nama penerima" class="mt-2 w-full rounded-xl border border-[#A8C69F] bg-white px-4 py-3 text-sm font-normal outline-none focus:ring-2 focus:ring-[#527A55]">
                    </label>
                    <label class="block text-xs font-bold text-[#263A2B]">Nomor WhatsApp *
                        <input required x-model.trim="customer.phone" type="tel" inputmode="tel" autocomplete="tel" placeholder="08xxxxxxxxxx" class="mt-2 w-full rounded-xl border border-[#A8C69F] bg-white px-4 py-3 text-sm font-normal outline-none focus:ring-2 focus:ring-[#527A55]">
                    </label>
                    <label class="block text-xs font-bold text-[#263A2B]">Email (opsional)
                        <input x-model.trim="customer.email" type="email" autocomplete="email" placeholder="nama@email.com" class="mt-2 w-full rounded-xl border border-[#A8C69F] bg-white px-4 py-3 text-sm font-normal outline-none focus:ring-2 focus:ring-[#527A55]">
                    </label>
                    <label class="block text-xs font-bold text-[#263A2B]">Kota / Kecamatan *
                        <input required x-model.trim="customer.area" type="text" placeholder="Contoh: Surabaya, Gubeng" class="mt-2 w-full rounded-xl border border-[#A8C69F] bg-white px-4 py-3 text-sm font-normal outline-none focus:ring-2 focus:ring-[#527A55]">
                    </label>
                </div>
                <label class="block text-xs font-bold text-[#263A2B]">Alamat Lengkap Pengiriman *
                    <textarea required x-model.trim="customer.address" rows="3" autocomplete="street-address" placeholder="Nama jalan, nomor rumah, RT/RW, patokan, dan kode pos" class="mt-2 w-full rounded-xl border border-[#A8C69F] bg-white px-4 py-3 text-sm font-normal outline-none focus:ring-2 focus:ring-[#527A55]"></textarea>
                </label>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <label class="block text-xs font-bold text-[#263A2B]">Pilihan Hari Pengiriman *
                        <select required x-model="customer.deliveryDay" class="mt-2 w-full rounded-xl border border-[#A8C69F] bg-white px-4 py-3 text-sm font-normal outline-none focus:ring-2 focus:ring-[#527A55]">
                            <option value="">Pilih hari</option><option>Senin</option><option>Selasa</option><option>Rabu</option><option>Kamis</option><option>Jumat</option><option>Sabtu</option><option>Minggu</option>
                        </select>
                    </label>
                    <label class="block text-xs font-bold text-[#263A2B]">Waktu Pengiriman *
                        <select required x-model="customer.deliveryTime" class="mt-2 w-full rounded-xl border border-[#A8C69F] bg-white px-4 py-3 text-sm font-normal outline-none focus:ring-2 focus:ring-[#527A55]">
                            <option value="">Pilih waktu</option><option>07.00–10.00</option><option>10.00–13.00</option><option>13.00–16.00</option><option>16.00–19.00</option>
                        </select>
                    </label>
                </div>
                <label class="block text-xs font-bold text-[#263A2B]">Catatan Tambahan (opsional)
                    <textarea x-model.trim="customer.notes" rows="2" placeholder="Alergi, pantangan makanan, instruksi kurir, dan lainnya" class="mt-2 w-full rounded-xl border border-[#A8C69F] bg-white px-4 py-3 text-sm font-normal outline-none focus:ring-2 focus:ring-[#527A55]"></textarea>
                </label>
                <p class="text-[11px] text-gray-500">Dengan menekan tombol di bawah, WhatsApp akan terbuka dengan format pesan berisi data dan ringkasan paket yang Anda isi. Pesanan belum diproses sampai admin mengonfirmasi.</p>
                <div class="flex flex-col-reverse sm:flex-row gap-3 pt-2">
                    <button type="button" @click="checkoutModalOpen = false" class="sm:w-1/3 bg-gray-100 hover:bg-gray-200 text-gray-700 py-3.5 rounded-xl font-bold text-sm transition">Kembali</button>
                    <button type="submit" class="sm:flex-1 bg-[#25D366] hover:bg-[#1fb85a] text-white py-3.5 rounded-xl font-bold text-sm transition flex items-center justify-center gap-2 shadow-lg"><i class="fa-brands fa-whatsapp text-lg"></i> Kirim Pesanan via WhatsApp</button>
                </div>
            </form>
        </div>
    </div>

    <!-- SCRIPT ALPINE APP LOGIC -->
    <script src="{{ asset('js/website-bisnis/templates/fnb/healthy-meal-prep/fresh-harvest.js') }}"></script>
</body>
</html>
