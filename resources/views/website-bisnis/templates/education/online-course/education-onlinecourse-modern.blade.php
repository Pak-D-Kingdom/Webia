<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EduPrime Academy — Platform Bootcamp & Kursus Karir Digital Masa Depan</title>
    <meta name="description" content="EduPrime Academy adalah platform pembelajaran digital interaktif dengan kurikulum industri terkini, bimbingan 1-on-1 mentor praktisi, dan jaminan penyaluran kerja.">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['"Plus Jakarta Sans"', 'sans-serif'],
                    },
                    colors: {
                        edu: {
                            50: '#eff6ff',
                            100: '#dbeafe',
                            500: '#2563eb',
                            600: '#1d4ed8',
                            700: '#1e40af',
                            amber: '#f59e0b',
                            emerald: '#10b981',
                        }
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-slate-50 text-slate-800 antialiased font-sans selection:bg-blue-600 selection:text-white">

    <!-- 1. TOPBAR -->
    <div class="bg-gradient-to-r from-blue-900 to-indigo-950 text-white text-xs py-2 px-4 sm:px-8 border-b border-blue-800">
        <div class="max-w-7xl mx-auto flex flex-wrap justify-between items-center gap-2">
            <div class="flex items-center gap-2">
                <span class="inline-flex items-center gap-1.5 px-2 py-0.5 rounded-full bg-amber-400 text-slate-950 font-bold text-[11px]">
                    🎉 PENDAFTARAN BATCH 14 DIBUKA
                </span>
                <span class="hidden md:inline text-blue-200">· Beasiswa Potongan Biaya s.d. 40% & Garansi Portofolio Nyata</span>
            </div>
            <div class="flex items-center gap-4 text-blue-200 text-[11px]">
                <span>Konsultasi Jalur Karir: <strong>+62 858-5018-0285</strong></span>
                <span class="hidden sm:inline">Senin–Sabtu 09.00–18.00 WIB</span>
            </div>
        </div>
    </div>

    <!-- 2. NAVBAR -->
    <header class="sticky top-0 z-40 bg-white/95 backdrop-blur-md border-b border-slate-200 shadow-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-8 h-18 flex items-center justify-between">
            <a href="#hero" class="flex items-center gap-2.5 font-extrabold text-xl text-blue-900 tracking-tight">
                <div class="w-9 h-9 rounded-xl bg-gradient-to-tr from-blue-600 to-indigo-600 flex items-center justify-center text-white shadow-md shadow-blue-500/20 font-bold">
                    🎓
                </div>
                <span>EDUPRIME<span class="text-blue-600 font-medium">ACADEMY</span></span>
            </a>

            <nav class="hidden md:flex items-center gap-7 text-sm font-semibold text-slate-600">
                <a href="#courses" class="hover:text-blue-600 transition">Bootcamp Unggulan</a>
                <a href="#curriculum" class="hover:text-blue-600 transition">Metode Belajar</a>
                <a href="#mentors" class="hover:text-blue-600 transition">Mentor Praktisi</a>
                <a href="#alumni" class="hover:text-blue-600 transition">Testimoni Alumni</a>
                <a href="#faq" class="hover:text-blue-600 transition">FAQ</a>
            </nav>

            <div class="flex items-center gap-3">
                <a href="#daftar" class="hidden sm:inline-flex items-center gap-2 bg-blue-600 hover:bg-blue-700 text-white font-bold text-xs uppercase tracking-wider px-5 py-2.5 rounded-xl transition shadow-lg shadow-blue-600/20">
                    Daftar Kelas <span>↗</span>
                </a>
                <button id="mobileMenuBtn" class="md:hidden p-2 text-slate-600 hover:text-blue-600" aria-label="Toggle Menu">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"/></svg>
                </button>
            </div>
        </div>

        <!-- Mobile Nav Menu -->
        <div id="mobileMenu" class="hidden md:hidden bg-white border-b border-slate-200 px-6 py-4 space-y-3 text-sm font-medium">
            <a href="#courses" class="block text-slate-700 hover:text-blue-600 py-1">Bootcamp Unggulan</a>
            <a href="#curriculum" class="block text-slate-700 hover:text-blue-600 py-1">Metode Belajar</a>
            <a href="#mentors" class="block text-slate-700 hover:text-blue-600 py-1">Mentor Praktisi</a>
            <a href="#alumni" class="block text-slate-700 hover:text-blue-600 py-1">Testimoni Alumni</a>
            <a href="#faq" class="block text-slate-700 hover:text-blue-600 py-1">FAQ</a>
            <a href="#daftar" class="block text-blue-600 font-bold pt-2">Daftar Kelas ↗</a>
        </div>
    </header>

    <main>
        <!-- 3. HERO SECTION -->
        <section id="hero" class="relative pt-12 pb-20 md:py-24 bg-gradient-to-b from-blue-50/70 via-white to-slate-50 overflow-hidden">
            <div class="max-w-7xl mx-auto px-4 sm:px-8">
                <div class="grid lg:grid-cols-12 gap-12 items-center">
                    <div class="lg:col-span-7 space-y-6">
                        <div class="inline-flex items-center gap-2 px-3 py-1.5 rounded-full bg-blue-100 text-blue-700 text-xs font-bold">
                            <span class="w-2 h-2 rounded-full bg-blue-600 animate-pulse"></span>
                            PLATFORM BELAJAR DIGITAL TERAKREDITASI
                        </div>

                        <h1 class="text-3xl sm:text-5xl lg:text-6xl font-extrabold text-slate-900 tracking-tight leading-[1.15]">
                            Kuasai Skill Digital Masa Depan. <br>
                            <span class="bg-gradient-to-r from-blue-600 to-indigo-600 bg-clip-text text-transparent">Raih Karir Impianmu</span> Bersama Mentor Nyata.
                        </h1>

                        <p class="text-slate-600 text-base sm:text-lg leading-relaxed max-w-xl">
                            Belajar teknologi dan bisnis digital secara intensif dari nol hingga siap kerja. Dilengkapi kurikulum industri, sesi live mentoring mingguan, review portofolio privat, dan bimbingan interview HR.
                        </p>

                        <div class="flex flex-wrap gap-4 pt-2">
                            <a href="#courses" class="inline-flex items-center justify-center gap-2 bg-blue-600 hover:bg-blue-700 text-white font-bold text-sm px-7 py-3.5 rounded-xl transition shadow-xl shadow-blue-600/25">
                                Jelajahi Bootcamp <span>→</span>
                            </a>
                            <a href="#daftar" class="inline-flex items-center justify-center gap-2 bg-white hover:bg-slate-100 text-slate-700 border border-slate-300 font-semibold text-sm px-6 py-3.5 rounded-xl transition shadow-sm">
                                Konsultasi Jurusan Gratis ↗
                            </a>
                        </div>

                        <!-- Stats -->
                        <div class="grid grid-cols-3 gap-4 pt-6 border-t border-slate-200 max-w-lg">
                            <div>
                                <div class="text-2xl sm:text-3xl font-extrabold text-blue-900">14.500+</div>
                                <div class="text-xs text-slate-500 font-medium">Alumni Tersebar</div>
                            </div>
                            <div>
                                <div class="text-2xl sm:text-3xl font-extrabold text-blue-600">89.4%</div>
                                <div class="text-xs text-slate-500 font-medium">Hiring Rate (<6 bln)</div>
                            </div>
                            <div>
                                <div class="text-2xl sm:text-3xl font-extrabold text-amber-500">4.9 / 5.0</div>
                                <div class="text-xs text-slate-500 font-medium">Rating Kelas</div>
                            </div>
                        </div>
                    </div>

                    <!-- Visual Card -->
                    <div class="lg:col-span-5">
                        <div class="rounded-3xl bg-white border border-slate-200 p-6 shadow-2xl relative">
                            <div class="flex items-center justify-between pb-4 border-b border-slate-100">
                                <div class="flex items-center gap-2.5">
                                    <span class="w-3 h-3 rounded-full bg-emerald-500"></span>
                                    <span class="font-bold text-xs text-slate-800">Sesi Live Mentoring Aktif</span>
                                </div>
                                <span class="bg-blue-50 text-blue-700 text-[11px] font-bold px-2.5 py-0.5 rounded-full">Interactive Room</span>
                            </div>

                            <div class="mt-4 space-y-4">
                                <div class="relative rounded-2xl overflow-hidden bg-slate-900 h-52">
                                    <img src="https://images.unsplash.com/photo-1531482615713-2afd69097998?auto=format&fit=crop&w=800&q=80" alt="Online Learning" class="w-full h-full object-cover opacity-90">
                                    <div class="absolute bottom-3 left-3 bg-black/70 backdrop-blur-md px-3 py-1.5 rounded-xl text-white text-xs flex items-center gap-2">
                                        <span class="w-2 h-2 rounded-full bg-rose-500 animate-ping"></span>
                                        <span>Fullstack Engineering Track</span>
                                    </div>
                                </div>

                                <div class="p-3.5 rounded-xl bg-slate-50 border border-slate-100 flex items-center justify-between">
                                    <div>
                                        <div class="text-xs font-bold text-slate-800">Bimbingan Portofolio Real-Case</div>
                                        <div class="text-[11px] text-slate-500">Disupervisi langsung Tech Lead ex-Unicorn</div>
                                    </div>
                                    <span class="text-xs font-bold text-emerald-600 bg-emerald-50 px-2 py-1 rounded">1-on-1</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- 4. BOOTCAMP COURSES -->
        <section id="courses" class="py-20 bg-white border-t border-slate-200">
            <div class="max-w-7xl mx-auto px-4 sm:px-8">
                <div class="text-center max-w-3xl mx-auto mb-16">
                    <span class="text-blue-600 text-xs font-bold tracking-widest uppercase">PROGRAM UNGGULAN</span>
                    <h2 class="text-3xl sm:text-4xl font-extrabold text-slate-900 mt-1">Bootcamp Karir Siap Kerja</h2>
                    <p class="text-slate-600 text-sm sm:text-base mt-2">Kurikulum berbasis proyek riil yang selalu diperbarui menyesuaikan kebutuhan hiring partner perusahaan teknologi.</p>
                </div>

                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                    <!-- Course 1 -->
                    <div class="bg-white border border-slate-200 rounded-2xl overflow-hidden shadow-sm hover:shadow-xl transition duration-300 flex flex-col justify-between">
                        <div class="p-6 space-y-4">
                            <div class="flex justify-between items-center">
                                <span class="bg-blue-100 text-blue-800 text-xs font-bold px-3 py-1 rounded-full">Engineering</span>
                                <span class="text-xs text-slate-500 font-medium">16 Minggu</span>
                            </div>
                            <h3 class="text-xl font-bold text-slate-900">Fullstack Web Development (Laravel & React)</h3>
                            <p class="text-slate-600 text-xs leading-relaxed">Pelajari arsitektur backend scalable dengan Laravel, frontend modern React & Tailwind, serta deployment cloud AWS.</p>
                            <ul class="text-xs text-slate-600 space-y-1.5 pt-2 border-t border-slate-100">
                                <li>✔ 5 Proyek Portofolio Siap Rilis</li>
                                <li>✔ Bimbingan Live Coding Mingguan</li>
                                <li>✔ Penyaluran Kerja ke 120+ Partner</li>
                            </ul>
                        </div>
                        <div class="p-6 bg-slate-50 border-t border-slate-100 flex items-center justify-between">
                            <div>
                                <span class="text-[11px] text-slate-400 line-through">Rp6.500.000</span>
                                <div class="text-lg font-extrabold text-blue-900">Rp3.900.000</div>
                            </div>
                            <a href="#daftar" class="bg-blue-600 hover:bg-blue-700 text-white font-bold text-xs px-4 py-2.5 rounded-xl transition">Daftar ↗</a>
                        </div>
                    </div>

                    <!-- Course 2 -->
                    <div class="bg-white border border-slate-200 rounded-2xl overflow-hidden shadow-sm hover:shadow-xl transition duration-300 flex flex-col justify-between">
                        <div class="p-6 space-y-4">
                            <div class="flex justify-between items-center">
                                <span class="bg-purple-100 text-purple-800 text-xs font-bold px-3 py-1 rounded-full">Design</span>
                                <span class="text-xs text-slate-500 font-medium">12 Minggu</span>
                            </div>
                            <h3 class="text-xl font-bold text-slate-900">UI/UX Design & Product Strategy</h3>
                            <p class="text-slate-600 text-xs leading-relaxed">Kuasai riset pengguna (user research), wireframing di Figma, design system berskala, dan usability testing terstruktur.</p>
                            <ul class="text-xs text-slate-600 space-y-1.5 pt-2 border-t border-slate-100">
                                <li>✔ 3 Studi Kasus End-to-End di Behance</li>
                                <li>✔ Bimbingan Bedah Portofolio Desain</li>
                                <li>✔ Garansi Sertifikat Internasional</li>
                            </ul>
                        </div>
                        <div class="p-6 bg-slate-50 border-t border-slate-100 flex items-center justify-between">
                            <div>
                                <span class="text-[11px] text-slate-400 line-through">Rp5.500.000</span>
                                <div class="text-lg font-extrabold text-blue-900">Rp3.400.000</div>
                            </div>
                            <a href="#daftar" class="bg-blue-600 hover:bg-blue-700 text-white font-bold text-xs px-4 py-2.5 rounded-xl transition">Daftar ↗</a>
                        </div>
                    </div>

                    <!-- Course 3 -->
                    <div class="bg-white border border-slate-200 rounded-2xl overflow-hidden shadow-sm hover:shadow-xl transition duration-300 flex flex-col justify-between">
                        <div class="p-6 space-y-4">
                            <div class="flex justify-between items-center">
                                <span class="bg-emerald-100 text-emerald-800 text-xs font-bold px-3 py-1 rounded-full">Data & AI</span>
                                <span class="text-xs text-slate-500 font-medium">14 Minggu</span>
                            </div>
                            <h3 class="text-xl font-bold text-slate-900">Data Analytics & Business Intelligence</h3>
                            <p class="text-slate-600 text-xs leading-relaxed">Ekstraksi data bisnis dengan SQL, visualisasi interaktif di Tableau/PowerBI, serta otomatisasi data pipeline menggunakan Python.</p>
                            <ul class="text-xs text-slate-600 space-y-1.5 pt-2 border-t border-slate-100">
                                <li>✔ Dashboard Real-Time untuk Eksekutif</li>
                                <li>✔ Bedah Data Kasus E-Commerce & FinTech</li>
                                <li>✔ Simulasi Technical Interview Data</li>
                            </ul>
                        </div>
                        <div class="p-6 bg-slate-50 border-t border-slate-100 flex items-center justify-between">
                            <div>
                                <span class="text-[11px] text-slate-400 line-through">Rp6.000.000</span>
                                <div class="text-lg font-extrabold text-blue-900">Rp3.650.000</div>
                            </div>
                            <a href="#daftar" class="bg-blue-600 hover:bg-blue-700 text-white font-bold text-xs px-4 py-2.5 rounded-xl transition">Daftar ↗</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- 5. LEARNING METHODOLOGY -->
        <section id="curriculum" class="py-20 bg-slate-50 border-t border-slate-200">
            <div class="max-w-7xl mx-auto px-4 sm:px-8">
                <div class="text-center max-w-3xl mx-auto mb-16">
                    <span class="text-blue-600 text-xs font-bold tracking-widest uppercase">THE EDUPRIME METHOD</span>
                    <h2 class="text-3xl font-extrabold text-slate-900 mt-1">4 Langkah Transformasi Karirmu</h2>
                    <p class="text-slate-600 text-sm mt-2">Metode teruji yang dirancang khusus untuk mahasiswa, fresh graduate, maupun profesional yang ingin career switch.</p>
                </div>

                <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-6">
                    <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm space-y-3">
                        <div class="text-3xl font-extrabold text-blue-600">01</div>
                        <h4 class="font-bold text-slate-900 text-base">Fundamental & Teori Terapan</h4>
                        <p class="text-slate-600 text-xs leading-relaxed">Memahami konsep pondasi secara mendalam melalui video modul fleksibel dan studi kasus terstruktur.</p>
                    </div>

                    <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm space-y-3">
                        <div class="text-3xl font-extrabold text-indigo-600">02</div>
                        <h4 class="font-bold text-slate-900 text-base">Live Mentoring & Q&A</h4>
                        <p class="text-slate-600 text-xs leading-relaxed">Sesi tatap muka virtual interaktif tiap minggu untuk berdiskusi masalah kode, tips karir, dan best practices.</p>
                    </div>

                    <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm space-y-3">
                        <div class="text-3xl font-extrabold text-amber-500">03</div>
                        <h4 class="font-bold text-slate-900 text-base">Capstone Real Project</h4>
                        <p class="text-slate-600 text-xs leading-relaxed">Mengerjakan proyek nyata dari perusahaan mitra untuk dimasukkan ke dalam portofolio profesional Anda.</p>
                    </div>

                    <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm space-y-3">
                        <div class="text-3xl font-extrabold text-emerald-600">04</div>
                        <h4 class="font-bold text-slate-900 text-base">Career Coaching & Hiring</h4>
                        <p class="text-slate-600 text-xs leading-relaxed">Optimalisasi resume/CV, latihan interview HR & user, serta penyaluran profil ke jaringan 120+ hiring partner.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- 6. FAQ ACCORDION -->
        <section id="faq" class="py-20 bg-white border-t border-slate-200">
            <div class="max-w-4xl mx-auto px-4 sm:px-8">
                <div class="text-center mb-14">
                    <span class="text-blue-600 text-xs font-bold tracking-widest uppercase">FAQ</span>
                    <h2 class="text-3xl font-extrabold text-slate-900 mt-1">Pertanyaan yang Sering Diajukan</h2>
                    <p class="text-slate-600 text-sm mt-2">Semua jawaban penting sebelum kamu memutuskan bergabung di EduPrime Academy.</p>
                </div>

                <div class="space-y-4">
                    <div class="bg-slate-50 border border-slate-200 rounded-xl overflow-hidden">
                        <button type="button" class="w-full p-5 text-left flex justify-between items-center text-sm font-bold text-slate-900 hover:text-blue-600 transition" onclick="toggleEduFaq(this)">
                            <span>1. Saya tidak memiliki latar belakang IT, apakah bisa ikut?</span>
                            <span class="faq-icon text-blue-600 text-xl font-bold">+</span>
                        </button>
                        <div class="faq-answer hidden px-5 pb-5 text-xs sm:text-sm text-slate-600 leading-relaxed border-t border-slate-200 pt-3">
                            Bisa sekali! Lebih dari 55% peserta bootcamp kami berasal dari latar belakang non-IT (ekonomi, sastra, teknik sipil, hingga perhotelan). Kurikulum kami disusun bertahap mulai dari pengenalan logika dasar dan dibimbing mentor sabar.
                        </div>
                    </div>

                    <div class="bg-slate-50 border border-slate-200 rounded-xl overflow-hidden">
                        <button type="button" class="w-full p-5 text-left flex justify-between items-center text-sm font-bold text-slate-900 hover:text-blue-600 transition" onclick="toggleEduFaq(this)">
                            <span>2. Apakah jadwal belajar fleksibel bagi karyawan yang bekerja?</span>
                            <span class="faq-icon text-blue-600 text-xl font-bold">+</span>
                        </button>
                        <div class="faq-answer hidden px-5 pb-5 text-xs sm:text-sm text-slate-600 leading-relaxed border-t border-slate-200 pt-3">
                            Ya, kami menyediakan kelas Night Class (Senin & Rabu 19.30 - 21.30 WIB) dan Weekend Class (Sabtu pagi). Semua rekaman sesi kelas live juga diarsipkan di learning dashboard dan dapat diakses selamanya.
                        </div>
                    </div>

                    <div class="bg-slate-50 border border-slate-200 rounded-xl overflow-hidden">
                        <button type="button" class="w-full p-5 text-left flex justify-between items-center text-sm font-bold text-slate-900 hover:text-blue-600 transition" onclick="toggleEduFaq(this)">
                            <span>3. Bagaimana sistem cicilan pembayaran biaya kursus?</span>
                            <span class="faq-icon text-blue-600 text-xl font-bold">+</span>
                        </button>
                        <div class="faq-answer hidden px-5 pb-5 text-xs sm:text-sm text-slate-600 leading-relaxed border-t border-slate-200 pt-3">
                            Kami menyediakan opsi cicilan 0% hingga 12 bulan menggunakan kartu kredit atau mitra resmi (Kredivo, Danacita, SpayLater) tanpa uang muka.
                        </div>
                    </div>

                    <div class="bg-slate-50 border border-slate-200 rounded-xl overflow-hidden">
                        <button type="button" class="w-full p-5 text-left flex justify-between items-center text-sm font-bold text-slate-900 hover:text-blue-600 transition" onclick="toggleEduFaq(this)">
                            <span>4. Apakah sertifikat EduPrime diakui industri kerja?</span>
                            <span class="faq-icon text-blue-600 text-xl font-bold">+</span>
                        </button>
                        <div class="faq-answer hidden px-5 pb-5 text-xs sm:text-sm text-slate-600 leading-relaxed border-t border-slate-200 pt-3">
                            Ya, sertifikat kelulusan kami dilengkapi nomor verifikasi digital resmi yang dapat dilampirkan langsung pada profil LinkedIn Anda dan telah diakui oleh lebih dari 120 perusahaan hiring partner kami.
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- 7. ENROLLMENT FORM -->
        <section id="daftar" class="py-20 bg-gradient-to-b from-blue-900 to-indigo-950 text-white">
            <div class="max-w-3xl mx-auto px-4 sm:px-8">
                <div class="bg-white/10 backdrop-blur-md border border-white/20 rounded-3xl p-8 sm:p-12 shadow-2xl">
                    <div class="text-center mb-8">
                        <span class="text-amber-300 text-xs font-bold uppercase tracking-widest">BEASISWA BATCH 14</span>
                        <h2 class="text-2xl sm:text-3xl font-extrabold text-white mt-1">Konsultasikan Jalur Karir & Daftar</h2>
                        <p class="text-blue-200 text-xs sm:text-sm mt-1">Tim konselor akademik kami akan membantumu memilih program yang paling cocok dengan target karirmu.</p>
                    </div>

                    <form onsubmit="handleEduSubmit(event)" class="space-y-4">
                        <div class="grid sm:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-xs font-semibold text-blue-100 mb-1">Nama Lengkap</label>
                                <input type="text" id="eduName" required placeholder="Nama Anda" class="w-full bg-white/20 border border-white/30 rounded-xl px-4 py-2.5 text-xs text-white placeholder-blue-200 focus:outline-none focus:bg-white/30">
                            </div>
                            <div>
                                <label class="block text-xs font-semibold text-blue-100 mb-1">Nomor WhatsApp</label>
                                <input type="tel" id="eduPhone" required placeholder="08xxxxxxxxxx" class="w-full bg-white/20 border border-white/30 rounded-xl px-4 py-2.5 text-xs text-white placeholder-blue-200 focus:outline-none focus:bg-white/30">
                            </div>
                        </div>

                        <div>
                            <label class="block text-xs font-semibold text-blue-100 mb-1">Pilihan Bootcamp</label>
                            <select id="eduTrack" class="w-full bg-slate-900 border border-white/30 rounded-xl px-4 py-2.5 text-xs text-white focus:outline-none">
                                <option>Fullstack Web Development (Laravel & React)</option>
                                <option>UI/UX Design & Product Strategy</option>
                                <option>Data Analytics & Business Intelligence</option>
                                <option>Belum yakin, ingin konsultasi minat bakat dulu</option>
                            </select>
                        </div>

                        <button type="submit" class="w-full bg-amber-400 hover:bg-amber-300 text-slate-950 font-extrabold py-3.5 rounded-xl transition text-xs uppercase tracking-wider shadow-xl shadow-amber-400/20">
                            Hubungi Konselor via WhatsApp ↗
                        </button>
                    </form>
                </div>
            </div>
        </section>
    </main>

    <!-- 8. FOOTER -->
    <footer class="bg-slate-900 text-slate-400 text-xs py-14 border-t border-slate-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-8">
            <div class="grid grid-cols-2 md:grid-cols-5 gap-8 pb-10 border-b border-slate-800">
                <div class="col-span-2 space-y-3">
                    <div class="flex items-center gap-2 text-white font-extrabold text-xl">
                        🎓 EDUPRIME ACADEMY
                    </div>
                    <p class="text-slate-400 text-xs leading-relaxed max-w-sm">
                        Platform pendidikan teknologi dan pengembangan karir digital terpercaya untuk generasi muda berdaya saing global.
                    </p>
                </div>

                <div class="space-y-2">
                    <p class="font-bold text-white text-xs uppercase">Program</p>
                    <ul class="space-y-1.5">
                        <li><a href="#courses" class="hover:text-white">Fullstack Web</a></li>
                        <li><a href="#courses" class="hover:text-white">UI/UX Design</a></li>
                        <li><a href="#courses" class="hover:text-white">Data Analytics</a></li>
                    </ul>
                </div>

                <div class="space-y-2">
                    <p class="font-bold text-white text-xs uppercase">Tentang Kami</p>
                    <ul class="space-y-1.5">
                        <li><a href="#curriculum" class="hover:text-white">Metode Belajar</a></li>
                        <li><a href="#faq" class="hover:text-white">FAQ</a></li>
                        <li><a href="#daftar" class="hover:text-white">Beasiswa</a></li>
                    </ul>
                </div>

                <div class="col-span-2 md:col-span-1 space-y-2">
                    <p class="font-bold text-white text-xs uppercase">Kontak</p>
                    <p class="text-slate-400">Gedung EduPrime Center</p>
                    <p class="text-slate-400">Jl. Teknologi No. 12, Jakarta</p>
                    <p class="text-slate-400">WA: +62 858-5018-0285</p>
                </div>
            </div>

            <div class="pt-8 flex flex-col sm:flex-row justify-between items-center gap-4 text-[11px] text-slate-500">
                <p>&copy; 2026 EduPrime Academy. All rights reserved.</p>
                <p>Website template by <strong class="text-blue-400">WEBIA</strong></p>
            </div>
        </div>
    </footer>

    <!-- 9. FLOATING WHATSAPP BUTTON -->
    <a href="https://wa.me/6285850180285?text=Halo%20EduPrime%20Academy,%20saya%20ingin%20tanya%20info%20pendaftaran%20bootcamp%20dan%20beasiswa." target="_blank" rel="noopener noreferrer" class="fixed bottom-6 left-6 z-50 flex items-center gap-2 bg-[#25D366] hover:bg-[#20bd5a] text-white px-4 py-3 rounded-full shadow-2xl transition duration-300 font-bold text-xs tracking-wide">
        <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/></svg>
        <span>Chat Konselor WA</span>
    </a>

    <!-- 10. FLOATING AI ASSISTANT -->
    <button onclick="toggleEduBot()" class="fixed bottom-6 right-6 z-50 flex items-center gap-2 bg-blue-600 hover:bg-blue-700 text-white px-4.5 py-3 rounded-full shadow-2xl transition duration-300 font-bold text-xs">
        <span class="w-2 h-2 rounded-full bg-emerald-400 animate-ping"></span>
        <span>🎓 EduBot Assistant</span>
    </button>

    <!-- AI Bot Modal -->
    <div id="eduBotModal" class="hidden fixed bottom-22 right-6 z-50 w-80 sm:w-96 bg-white border border-slate-200 rounded-2xl shadow-2xl overflow-hidden flex flex-col h-[460px]">
        <div class="bg-blue-600 p-3.5 flex justify-between items-center text-white">
            <div class="flex items-center gap-2">
                <span class="w-6 h-6 rounded bg-white text-blue-600 font-bold flex items-center justify-center text-xs">🎓</span>
                <div>
                    <h4 class="font-bold text-xs">EduBot Academic AI</h4>
                    <span class="text-[10px] text-blue-100">Bantuan Kursus & Karir</span>
                </div>
            </div>
            <button onclick="toggleEduBot()" class="text-white hover:text-slate-200 text-lg p-1">&times;</button>
        </div>

        <div id="eduBotMessages" class="p-4 flex-1 overflow-y-auto space-y-3 text-xs">
            <div class="bg-blue-50 border border-blue-100 p-3 rounded-2xl rounded-tl-none text-slate-700">
                Halo Calon Profesional Muda! 👋 Saya <strong>EduBot</strong>. Butuh rekomendasi jalur karir yang cocok atau info diskon beasiswa?
            </div>

            <div class="space-y-1.5 pt-1">
                <button onclick="sendEduQuick('Berapa biaya kursus dan apakah bisa cicilan?')" class="w-full text-left bg-slate-100 hover:bg-slate-200 text-slate-700 p-2 rounded-lg border border-slate-200 transition">
                    💳 Berapa biaya & opsi cicilan?
                </button>
                <button onclick="sendEduQuick('Apakah cocok untuk yang tidak punya dasar IT?')" class="w-full text-left bg-slate-100 hover:bg-slate-200 text-slate-700 p-2 rounded-lg border border-slate-200 transition">
                    🌱 Cocok untuk pemula non-IT?
                </button>
                <button onclick="sendEduQuick('Bagaimana jaminan penyaluran kerja?')" class="w-full text-left bg-slate-100 hover:bg-slate-200 text-slate-700 p-2 rounded-lg border border-slate-200 transition">
                    💼 Bagaimana program penyaluran kerja?
                </button>
            </div>
        </div>

        <div class="p-2.5 bg-slate-50 border-t border-slate-200 flex gap-2">
            <input type="text" id="eduBotInput" placeholder="Tanya tentang silabus / kelas..." onkeydown="if(event.key==='Enter') sendEduCustom()" class="flex-1 bg-white border border-slate-200 rounded-xl px-3 py-2 text-xs text-slate-800 placeholder-slate-400 focus:outline-none focus:border-blue-600">
            <button onclick="sendEduCustom()" class="bg-blue-600 text-white font-bold px-3 py-2 rounded-xl text-xs">
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

        function toggleEduFaq(btn) {
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

        function toggleEduBot() {
            document.getElementById('eduBotModal').classList.toggle('hidden');
        }

        function sendEduQuick(q) {
            appendEduUser(q);
            let reply = "Konselor akademik kami siap membantu konsultasi minat bakatmu secara gratis via WhatsApp di tombol kiri bawah!";
            if (q.includes('biaya')) {
                reply = "Biaya bootcamp mulai dari Rp3.400.000 (diskon Batch 14) dan tersedia opsi cicilan 0% s.d 12 bulan via Danacita & SpayLater!";
            } else if (q.includes('pemula')) {
                reply = "Sangat cocok! Materi dimulai dari pengenalan fondasi dasar dan kamu didampingi mentor praktisi 1-on-1 saat pengerjaan tugas.";
            } else if (q.includes('penyaluran')) {
                reply = "Kami terhubung dengan 120+ Hiring Partner di seluruh Indonesia dan menyediakan sesi bedah CV serta simulasi interview!";
            }
            setTimeout(() => appendEduBot(reply), 500);
        }

        function sendEduCustom() {
            const input = document.getElementById('eduBotInput');
            const val = input.value.trim();
            if (!val) return;
            appendEduUser(val);
            input.value = '';
            setTimeout(() => {
                appendEduBot("Terima kasih atas pertanyaannya! Mengenai '" + val + "', kamu dapat langsung terhubung dengan tim admissions konselor kami di WhatsApp ya! 🎓");
            }, 600);
        }

        function appendEduUser(msg) {
            const box = document.getElementById('eduBotMessages');
            const div = document.createElement('div');
            div.className = "bg-blue-600 text-white font-medium p-2.5 rounded-2xl rounded-tr-none text-xs ml-auto max-w-[85%]";
            div.textContent = msg;
            box.appendChild(div);
            box.scrollTop = box.scrollHeight;
        }

        function appendEduBot(msg) {
            const box = document.getElementById('eduBotMessages');
            const div = document.createElement('div');
            div.className = "bg-slate-100 border border-slate-200 text-slate-700 p-2.5 rounded-2xl rounded-tl-none text-xs mr-auto max-w-[85%]";
            div.textContent = msg;
            box.appendChild(div);
            box.scrollTop = box.scrollHeight;
        }

        function handleEduSubmit(e) {
            e.preventDefault();
            const name = document.getElementById('eduName').value;
            const phone = document.getElementById('eduPhone').value;
            const track = document.getElementById('eduTrack').value;

            const text = encodeURIComponent(
                `Halo EduPrime Academy! Saya tertarik mendaftar program:\n\n` +
                `*Nama:* ${name}\n` +
                `*WhatsApp:* ${phone}\n` +
                `*Pilihan Bootcamp:* ${track}\n\n` +
                `Mohon informasi silabus lengkap & diskon Batch 14. Terima kasih!`
            );
            window.open(`https://wa.me/6285850180285?text=${text}`, '_blank');
        }
    </script>
</body>
</html>
