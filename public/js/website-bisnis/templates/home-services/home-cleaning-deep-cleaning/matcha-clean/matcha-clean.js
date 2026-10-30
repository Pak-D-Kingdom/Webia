const MATCHA_WHATSAPP_NUMBER = '6281234567890'; // Ganti dengan nomor WhatsApp admin tanpa tanda + atau spasi.

        // 1. FALLING LEAVES CANVAS ANIMATION
        (function initLeavesCanvas() {
            const canvas = document.getElementById('leavesCanvas');
            const ctx = canvas.getContext('2d');
            let width = canvas.width = window.innerWidth;
            let height = canvas.height = window.innerHeight;

            window.addEventListener('resize', () => {
                width = canvas.width = window.innerWidth;
                height = canvas.height = window.innerHeight;
            });

            const leafCount = 22;
            const leaves = [];

            for (let i = 0; i < leafCount; i++) {
                leaves.push({
                    x: Math.random() * width,
                    y: Math.random() * height,
                    size: 8 + Math.random() * 12,
                    speedY: 0.4 + Math.random() * 0.8,
                    speedX: Math.sin(Math.random() * Math.PI) * 0.5,
                    angle: Math.random() * 360,
                    angularSpeed: (Math.random() - 0.5) * 1.5,
                    opacity: 0.25 + Math.random() * 0.45
                });
            }

            function drawLeaf(ctx, x, y, size, angle, opacity) {
                ctx.save();
                ctx.translate(x, y);
                ctx.rotate((angle * Math.PI) / 180);
                ctx.globalAlpha = opacity;
                
                // Draw leaf shape
                ctx.beginPath();
                ctx.moveTo(0, -size);
                ctx.bezierCurveTo(size * 0.8, -size * 0.5, size * 0.8, size * 0.5, 0, size);
                ctx.bezierCurveTo(-size * 0.8, size * 0.5, -size * 0.8, -size * 0.5, 0, -size);
                ctx.fillStyle = '#748E63';
                ctx.fill();

                // Leaf vein
                ctx.beginPath();
                ctx.moveTo(0, -size * 0.8);
                ctx.lineTo(0, size * 0.8);
                ctx.strokeStyle = 'rgba(255,255,255,0.4)';
                ctx.lineWidth = 1;
                ctx.stroke();

                ctx.restore();
            }

            function animateLeaves() {
                ctx.clearRect(0, 0, width, height);

                leaves.forEach(leaf => {
                    leaf.y += leaf.speedY;
                    leaf.x += Math.sin(leaf.y * 0.01) * 0.6;
                    leaf.angle += leaf.angularSpeed;

                    if (leaf.y > height + 20) {
                        leaf.y = -20;
                        leaf.x = Math.random() * width;
                    }

                    drawLeaf(ctx, leaf.x, leaf.y, leaf.size, leaf.angle, leaf.opacity);
                });

                requestAnimationFrame(animateLeaves);
            }

            animateLeaves();
        })();

        // 2. I18N DICTIONARY
        let currentLang = 'en';

        const i18n = {
            en: {
                topbar_badge: "100% Non-Toxic Botanical Bio-Enzymes",
                topbar_hours: "Mon-Sun: 07:00 - 20:00",
                nav_tagline: "Organic Botanical Sanitization",
                nav_services: "Service Selector",
                nav_transform: "Transformations",
                nav_packages: "Ritual Packages",
                nav_calculator: "Price Estimator",
                nav_products: "Eco Products",
                nav_care: "Surface Care",
                nav_book_btn: "Book Botanical Reset",
                hero_pill: "Organic Pure Living Standards",
                hero_title1: "Breathe Pure.",
                hero_title2: "Organic Home Reset",
                hero_title3: "For Healthy Living.",
                hero_desc: "Experience deep, toxic-free home restoration infused with organic matcha leaf extract, tea tree antiseptics, and non-allergenic botanical bio-enzymes.",
                hero_cta_primary: "Instant Area Price Quote",
                hero_cta_secondary: "Explore Room Menu",
                hero_stat1: "Pathogen Free",
                hero_stat2: "Botanical & Pet Safe",
                hero_stat3: "Homes Reset",
                hero_widget_label: "Interactive Home Meter",
                hero_widget_title: "Simulate Organic Cleanliness",
                badge_dust: "Dust-Free Air Filtered",
                badge_microbe: "Bio-Sanitized Surface",
                meter_dusty: "Heavy Dust & Bacteria",
                meter_pure: "Matcha Botanical Pure",
                sel_sub: "Smart Customization",
                sel_title: "Personalized Cleaning Service Selector",
                sel_desc: "Select your target room and current condition for a tailored organic care recipe.",
                sel_room_label: "1. Choose Target Room",
                room_living: "Living Room",
                room_kitchen: "Gourmet Kitchen",
                room_bed: "Bedroom Sanctuary",
                room_bath: "Bathroom & Spa",
                room_balcony: "Balcony & Patio",
                sel_cond_label: "2. Select Current Room Condition",
                cond_light: "Light Dust",
                cond_light_sub: "Routine Maintenance",
                cond_mod: "Moderate Build-up",
                cond_mod_sub: "Deep Dust & Stains",
                cond_heavy: "Post-Renovation",
                cond_heavy_sub: "Heavy Debris & Grime",
                recipe_badge: "Recommended Organic Treatment",
                recipe_duration_label: "Estimated Duration",
                btn_book_this: "Book This Recipe",
                fresh_sub: "Health & Comfort Profile",
                fresh_title: "Home Freshness Profile Generator",
                fresh_desc: "Check your primary home environment concerns to generate a custom botanical defense plan.",
                cb_dust: "Dust Build-up & Mites",
                cb_pet: "Pet Odors & Fur",
                cb_grease: "Kitchen Grease Slime",
                cb_mold: "Bathroom Mold & Grout",
                cb_allergen: "Hidden Allergens",
                cb_air: "Stale Air Quality",
                fresh_index_label: "Target Freshness Restoration Index",
                btn_view_recommended: "View Recommended Ritual",
                trans_sub: "Visual Proof",
                trans_title: "Botanical Before & After Slider",
                trans_desc: "Drag the interactive slider to view instant deep-cleaning results on delicate surfaces.",
                trans_after: "AFTER MATCHA RESET",
                trans_before: "BEFORE (DUST & DIRT)",
                pkg_sub: "Structured Packages",
                pkg_title: "Cleaning Ritual Packages",
                p1_badge: "Essential Care",
                p1_title: "Refresh Ritual",
                p1_desc: "Ideal for bi-weekly upkeep and allergen maintenance.",
                p1_price: "Rp 450.000 <span class='text-xs text-neutral-500 font-normal'>/ session</span>",
                pkg_popular: "Most Popular",
                p2_badge: "Deep Restoration",
                p2_title: "Reset Ritual",
                p2_desc: "Thorough bio-sanitization and deep extraction.",
                p2_price: "Rp 850.000 <span class='text-xs text-matcha-200 font-normal'>/ session</span>",
                p3_badge: "Total Bio-Shield",
                p3_title: "Deep Restore Ritual",
                p3_desc: "For post-renovation or moving into a new home.",
                p3_price: "Rp 1.450.000 <span class='text-xs text-neutral-500 font-normal'>/ session</span>",
                btn_choose_pkg: "Choose Ritual",
                calc_sub: "Instant Transparency",
                calc_title: "Home Area & Price Estimator",
                calc_area_label: "Home Area Size (m²)",
                calc_bed_label: "Bedrooms",
                calc_bath_label: "Bathrooms",
                calc_est_label: "Estimated Total Price",
                calc_duration: "Est. Duration:",
                calc_team: "Crew Size:",
                btn_book_estimate: "Proceed to Booking",
                prod_sub: "Pure Botanical Ingredients",
                prod_title: "Eco-Conscious Cleaning Product Showcase",
                p1_prod_title: "Matcha Leaf Antioxidant Spray",
                p1_prod_desc: "Natural polyphenols neutralize lingering organic odors without artificial perfumery.",
                p2_prod_title: "Thyme & Tea Tree Disinfectant",
                p2_prod_desc: "Bio-enzymatic anti-bacterial solution safe for infant cribs and high-touch areas.",
                p3_prod_title: "Coconut Surfactant Scrub",
                p3_prod_desc: "Biodegradable foaming agent derived from organic coconut oil for gentle grout polishing.",
                mat_sub: "Delicate Material Protection",
                mat_title: "Surface & Material Care Guide",
                tab_wood: "Hardwood & Timber",
                tab_stone: "Natural Marble & Stone",
                tab_fabric: "Velvet & Leather",
                live_badge: "Live Session Simulation",
                live_title: "Clean Home Progress Tracker",
                live_status: "In Progress",
                live_step1: "Living Room HEPA Vacuuming",
                live_step2: "Kitchen Degreasing & Marble Seal",
                book_sub: "Schedule Your Session",
                book_title: "Book Your Botanical Home Reset",
                form_name: "Full Name *",
                form_phone: "WhatsApp Phone *",
                form_address: "Property Area / Postal Code *",
                form_date: "Preferred Date *",
                form_btn: "Confirm Session Inquiry",
                faq_sub: "Common Inquiries",
                faq_title: "Frequently Asked Questions",
                q1: "Are your cleaning products safe for infants and pets?",
                a1: "Yes! All solutions are 100% plant-based, bio-enzymatic, and free of harsh synthetic bleaches or toxic artificial fumes.",
                q2: "Do I need to provide cleaning tools or vacuums?",
                a2: "No. Our crew arrives fully equipped with commercial HEPA vacuums, UV sanitizers, and fresh micro-fiber clothes.",
                footer_rights: "&copy; 2026 MATCHA CLEAN Organic Botanical Care. All rights reserved.",
                ai_status: "Online | Organic Advice",
                ai_welcome: "Hello! I am your Matcha Assistant. How can I guide your home reset today?"
            },
            id: {
                topbar_badge: "100% Bahan Alami Tanpa Kimia Berbahaya",
                topbar_hours: "Sen-Min: 07:00 - 20:00",
                nav_tagline: "Sanitasi Organik Alami",
                nav_services: "Pilih Layanan",
                nav_transform: "Transformasi",
                nav_packages: "Paket Ritual",
                nav_calculator: "Kalkulator Biaya",
                nav_products: "Produk Ramah Lingkungan",
                nav_care: "Perawatan Permukaan",
                nav_book_btn: "Pesan Pembersihan",
                hero_pill: "Standar Hunian Sehat Organik",
                hero_title1: "Bernapas Segar.",
                hero_title2: "Pembersihan Rumah Organik",
                hero_title3: "Untuk Hidup Sehat.",
                hero_desc: "Nikmati pembersihan rumah menyeluruh bebas racun dengan ekstrak daun matcha organik, minyak pohon teh, dan enzim ramah lingkungan.",
                hero_cta_primary: "Hitung Biaya Area",
                hero_cta_secondary: "Lihat Menu Ruangan",
                hero_stat1: "Bebas Kuman",
                hero_stat2: "Aman Untuk Bayi & Hewan",
                hero_stat3: "Rumah Direnovasi",
                hero_widget_label: "Pengukur Kebersihan Interaktif",
                hero_widget_title: "Simulasi Kebersihan Organik",
                badge_dust: "Udara Bebas Debu",
                badge_microbe: "Sanitasi Permukaan",
                meter_dusty: "Debu & Bakteri Pekat",
                meter_pure: "Bersih Murni Matcha",
                sel_sub: "Kustomisasi Cerdas",
                sel_title: "Pilihan Layanan Pembersihan Pribadi",
                sel_desc: "Pilih ruangan dan kondisi saat ini untuk rekomendasi perawatan organik terbaik.",
                sel_room_label: "1. Pilih Ruangan",
                room_living: "Ruang Tamu",
                room_kitchen: "Dapur Utama",
                room_bed: "Kamar Tidur",
                room_bath: "Kamar Mandi & Spa",
                room_balcony: "Balkon & Teras",
                sel_cond_label: "2. Pilih Kondisi Ruangan Saat Ini",
                cond_light: "Debu Ringan",
                cond_light_sub: "Perawatan Rutin",
                cond_mod: "Debu & Noda Sedang",
                cond_mod_sub: "Pembersihan Mendalam",
                cond_heavy: "Pasca Renovasi",
                cond_heavy_sub: "Kotoran & Debu Tebal",
                recipe_badge: "Rekomendasi Perawatan Organik",
                recipe_duration_label: "Estimasi Waktu",
                btn_book_this: "Pesan Formula Ini",
                fresh_sub: "Profil Kesehatan Hunian",
                fresh_title: "Generator Profil Kesegaran Rumah",
                fresh_desc: "Pilih masalah lingkungan rumah Anda untuk membuat rencana perlindungan alami.",
                cb_dust: "Penumpukan Debu & Tungau",
                cb_pet: "Bau & Bulu Hewan Peliharaan",
                cb_grease: "Noda Minyak Dapur",
                cb_mold: "Jamur Kamar Mandi & Sela Keramik",
                cb_allergen: "Alergen Tersembunyi",
                cb_air: "Udara Pengap",
                fresh_index_label: "Target Indeks Pemulihan Kesegaran",
                btn_view_recommended: "Lihat Ritual Yang Disarankan",
                trans_sub: "Bukti Nyata",
                trans_title: "Slider Transformasi Sebelum & Sesudah",
                trans_desc: "Geser tombol interaktif untuk melihat hasil pembersihan pada permukaan sensitif.",
                trans_after: "SESUDAH MATCHA RESET",
                trans_before: "SEBELUM (DEBU & KOTORAN)",
                pkg_sub: "Paket Terstruktur",
                pkg_title: "Paket Ritual Pembersihan",
                p1_badge: "Perawatan Esensial",
                p1_title: "Refresh Ritual",
                p1_desc: "Ideal untuk pemeliharaan rutin 2 minggu sekali.",
                p1_price: "Rp 450.000 <span class='text-xs text-neutral-500 font-normal'>/ sesi</span>",
                pkg_popular: "Paling Populer",
                p2_badge: "Restorasi Mendalam",
                p2_title: "Reset Ritual",
                p2_desc: "Sanitasi bio-enzimatik dan ekstraksi mendalam.",
                p2_price: "Rp 850.000 <span class='text-xs text-matcha-200 font-normal'>/ sesi</span>",
                p3_badge: "Perlindungan Total",
                p3_title: "Deep Restore Ritual",
                p3_desc: "Cocok untuk pasca renovasi atau pindah rumah.",
                p3_price: "Rp 1.450.000 <span class='text-xs text-neutral-500 font-normal'>/ sesi</span>",
                btn_choose_pkg: "Pilih Ritual",
                calc_sub: "Transparansi Biaya",
                calc_title: "Kalkulator Biaya & Luas Area",
                calc_area_label: "Luas Area Rumah (m²)",
                calc_bed_label: "Kamar Tidur",
                calc_bath_label: "Kamar Mandi",
                calc_est_label: "Estimasi Total Biaya",
                calc_duration: "Estimasi Waktu:",
                calc_team: "Jumlah Tim:",
                btn_book_estimate: "Lanjutkan Ke Pemesanan",
                prod_sub: "Bahan Alami Pilihan",
                prod_title: "Galeri Produk Ramah Lingkungan",
                p1_prod_title: "Semprotan Antioksidan Daun Matcha",
                p1_prod_desc: "Polifenol alami menetralkan bau tanpa wewangian sintetis.",
                p2_prod_title: "Disinfektan Thyme & Tea Tree",
                p2_prod_desc: "Cairan pembersih bio-enzimatik aman untuk boks bayi.",
                p3_prod_title: "Pembersih Busa Minyak Kelapa",
                p3_prod_desc: "Busa alami untuk mengilapkan sela keramik dengan lembut.",
                mat_sub: "Perlindungan Material Sensitif",
                mat_title: "Panduan Perawatan Permukaan",
                tab_wood: "Kayu Hardwood & Kayu Alam",
                tab_stone: "Marmer & Batu Alam",
                tab_fabric: "Beludru & Kulit",
                live_badge: "Simulasi Pembersihan",
                live_title: "Pelacak Kemajuan Pembersihan",
                live_status: "Sedang Berjalan",
                live_step1: "Penyedotan Debu HEPA Ruang Tamu",
                live_step2: "Pembersihan Minyak Dapur & Marmer",
                book_sub: "Jadwalkan Sesi Anda",
                book_title: "Pesan Sesi Pembersihan Organik",
                form_name: "Nama Lengkap *",
                form_phone: "Nomor WhatsApp *",
                form_address: "Area Properti / Kode Pos *",
                form_date: "Tanggal Yang Diinginkan *",
                form_btn: "Konfirmasi Pemesanan",
                faq_sub: "Pertanyaan Umum",
                faq_title: "Pertanyaan Yang Sering Diajukan",
                q1: "Apakah produk pembersih aman untuk bayi dan hewan?",
                a1: "Ya! Semua cairan 100% berbasis tanaman, bebas pemutih keras, dan bebas bahan kimia berbahaya.",
                q2: "Apakah saya perlu menyediakan alat pembersih?",
                a2: "Tidak. Tim kami hadir membawa peralatan vacuum HEPA dan kain mikrofiber steril.",
                footer_rights: "&copy; 2026 MATCHA CLEAN Perawatan Organik. Hak cipta dilindungi.",
                ai_status: "Online | Konsultasi Organik",
                ai_welcome: "Halo! Saya Asisten Matcha. Ada yang bisa saya bantu untuk hunian bersih Anda?"
            }
        };

        function setLang(lang) {
            currentLang = lang;
            if (lang === 'id') {
                document.getElementById('langID').className = "px-2.5 py-0.5 rounded-full text-[10px] font-bold uppercase transition tracking-wider bg-matcha-300 text-matcha-900";
                document.getElementById('langEN').className = "px-2.5 py-0.5 rounded-full text-[10px] font-bold uppercase transition tracking-wider text-matcha-200 hover:text-white";
                document.getElementById('waBtn').href = "https://wa.me/6281234567890?text=Halo%20MATCHA%20CLEAN,%20saya%20ingin%20bertanya%20mengenai%20layanan%20pembersihan%20rumah.";
            } else {
                document.getElementById('langEN').className = "px-2.5 py-0.5 rounded-full text-[10px] font-bold uppercase transition tracking-wider bg-matcha-300 text-matcha-900";
                document.getElementById('langID').className = "px-2.5 py-0.5 rounded-full text-[10px] font-bold uppercase transition tracking-wider text-matcha-200 hover:text-white";
                document.getElementById('waBtn').href = "https://wa.me/6281234567890?text=Hello%20MATCHA%20CLEAN%20Concierge,%20I%20would%20like%20to%20inquire%20about%20a%20botanical%20home%20cleaning%20session.";
            }

            document.querySelectorAll('[data-i18n]').forEach(el => {
                const key = el.getAttribute('data-i18n');
                if (i18n[lang] && i18n[lang][key]) {
                    el.innerHTML = i18n[lang][key];
                }
            });

            updateCalc();
        }

        // Hero Meter
        const heroSlider = document.getElementById('heroCleanSlider');
        const heroScore = document.getElementById('heroMeterScore');
        const heroOverlay = document.getElementById('heroDirtOverlay');

        heroSlider.addEventListener('input', (e) => {
            const val = e.target.value;
            heroScore.innerText = `${val}% Pure`;
            heroOverlay.style.opacity = (100 - val) / 100;
        });

        // Service Selector
        let selectedRoom = 'living';
        let selectedCond = 'light';

        function selectRoom(room, btn) {
            document.querySelectorAll('.room-btn').forEach(b => {
                b.className = "room-btn bg-oat text-matcha-900 p-4 rounded-2xl border border-matcha-300 font-sora text-xs font-bold text-left transition hover:border-matcha-600 flex flex-col justify-between h-24";
            });
            btn.className = "room-btn active bg-matcha-900 text-white p-4 rounded-2xl border border-matcha-700 font-sora text-xs font-bold text-left transition flex flex-col justify-between h-24";
            selectedRoom = room;
            updateRecipe();
        }

        function selectCond(cond, btn) {
            document.querySelectorAll('.cond-btn').forEach(b => {
                b.className = "cond-btn border border-matcha-300 bg-oat p-3 rounded-xl text-left text-xs font-extrabold text-matcha-900 hover:border-matcha-600";
            });
            btn.className = "cond-btn active border-2 border-matcha-900 bg-matcha-200 p-3 rounded-xl text-left text-xs font-extrabold text-matcha-900";
            selectedCond = cond;
            updateRecipe();
        }

        function updateRecipe() {
            const title = document.getElementById('recipeTitle');
            const desc = document.getElementById('recipeDesc');
            const duration = document.getElementById('recipeDuration');

            if (selectedRoom === 'kitchen') {
                title.innerText = currentLang === 'id' ? "Formula Pembersihan Dapur Utama" : "Gourmet Kitchen Organic Care Recipe";
                desc.innerText = currentLang === 'id' ? "Pembersihan minyak kompor dengan busa kelapa, pemolesan marmer, dan disinfeksi tempat cuci piring." : "Bio-enzymatic degreasing on chef stoves, marble countertop sealing, and sink sanitization.";
                duration.innerText = "2.0 - 2.5 Hours";
            } else if (selectedRoom === 'bedroom') {
                title.innerText = currentLang === 'id' ? "Formula Pembersihan Kamar Tidur" : "Bedroom Sanctuary Care Recipe";
                desc.innerText = currentLang === 'id' ? "Pembersihan debu di area tidur, penyedotan kasur, dan perawatan permukaan dengan formula lembut." : "Fine dust removal, mattress vacuuming, and gentle botanical surface care.";
                duration.innerText = "1.0 - 1.5 Hours";
            } else if (selectedRoom === 'balcony') {
                title.innerText = currentLang === 'id' ? "Formula Pembersihan Balkon & Teras" : "Balcony & Patio Care Recipe";
                desc.innerText = currentLang === 'id' ? "Pembersihan debu luar ruang, noda lantai, dan penyegaran area balkon." : "Outdoor dust removal, floor stain treatment, and a fresh balcony reset.";
                duration.innerText = "1.0 - 1.5 Hours";
            } else if (selectedRoom === 'bath') {
                title.innerText = currentLang === 'id' ? "Formula Pembersihan Kamar Mandi & Spa" : "Bathroom & Spa Sanitation Recipe";
                desc.innerText = currentLang === 'id' ? "Pembersihan jamur sela keramik, pembersihan kaca shower, dan aromaterapi lavender." : "Grout steam cleaning, glass water-spot removal, and anti-fungal botanical fogging.";
                duration.innerText = "1.5 - 2.0 Hours";
            } else {
                title.innerText = currentLang === 'id' ? "Formula Pembersihan Ruang Tamu Organik" : "Living Room Organic Care Recipe";
                desc.innerText = currentLang === 'id' ? "Penyedotan debu HEPA micro, pembersihan furnitur kayu dengan minyak matcha, dan pemurnian udara." : "High-HEPA micro-dust suction, matcha leaf anti-static wood wipe, and botanical air purification.";
                duration.innerText = "1.5 - 2.0 Hours";
            }
        }

        function updateFreshnessScore() {
            const checkboxes = document.querySelectorAll('.fresh-cb:checked');
            const targetText = document.getElementById('freshIndexText');

            if (checkboxes.length >= 4) {
                targetText.innerText = currentLang === 'id' ? "Membutuhkan Restorasi Deep Restore Ritual" : "Deep Restore Ritual Recommended";
            } else if (checkboxes.length >= 2) {
                targetText.innerText = currentLang === 'id' ? "Membutuhkan Sesi Reset Ritual" : "Reset Ritual Recommended";
            } else {
                targetText.innerText = currentLang === 'id' ? "Perawatan Standar Refresh Ritual" : "Standard Refresh Ritual Required";
            }
        }

        // Before After Slider
        const transRange = document.getElementById('transRange');
        const transOverlay = document.getElementById('transOverlay');
        const transHandle = document.getElementById('transHandle');

        transRange.addEventListener('input', (e) => {
            const val = e.target.value;
            transOverlay.style.setProperty('--slider-pos', `${val}%`);
            transHandle.style.left = `${val}%`;
        });

        // Area Calculator
        let bedCount = 2;
        let bathCount = 1;

        function adjustCalc(type, val) {
            if (type === 'bed') {
                bedCount = Math.max(1, bedCount + val);
                document.getElementById('calcBedVal').innerText = bedCount;
            } else {
                bathCount = Math.max(1, bathCount + val);
                document.getElementById('calcBathVal').innerText = bathCount;
            }
            updateCalc();
        }

        const calcAreaRange = document.getElementById('calcAreaRange');
        calcAreaRange.addEventListener('input', updateCalc);

        function updateCalc() {
            const sqm = parseInt(calcAreaRange.value);
            document.getElementById('calcAreaVal').innerText = `${sqm} m²`;

            const baseCost = 250000 + (sqm * 4000) + (bedCount * 50000) + (bathCount * 75000);
            document.getElementById('calcTotalPrice').innerText = `Rp ${baseCost.toLocaleString('id-ID')}`;

            const hours = Math.round((sqm / 35 + bedCount * 0.4) * 10) / 10;
            document.getElementById('calcTimeVal').innerText = `${hours} Hours`;
            
            const crew = sqm > 150 ? "3 Botanical Specialists" : "2 Botanical Specialists";
            document.getElementById('calcCrewVal').innerText = crew;
        }

        // Surface Care Tabs
        function showMatTab(type, btn) {
            document.querySelectorAll('.mat-tab').forEach(b => {
                b.className = "mat-tab bg-oat text-matcha-900 border border-matcha-300 px-5 py-2.5 rounded-full text-xs font-bold uppercase transition hover:border-matcha-600";
            });
            btn.className = "mat-tab active bg-matcha-900 text-white px-5 py-2.5 rounded-full text-xs font-bold uppercase transition";

            const title = document.getElementById('matTabTitle');
            const desc = document.getElementById('matTabDesc');

            if (type === 'stone') {
                title.innerText = currentLang === 'id' ? "Standar Perawatan Marmer & Batu Alam" : "Natural Marble & Stone Care Standards";
                desc.innerText = currentLang === 'id' ? "Pembersihan pH netral tanpa asam citrus untuk menjaga kilau alami batu marmer." : "Non-acidic pH 7 neutral formulas to protect marble sealants from chemical etching.";
            } else if (type === 'fabric') {
                title.innerText = currentLang === 'id' ? "Standar Perawatan Beludru & Kulit" : "Velvet & Fine Fabric Standards";
                desc.innerText = currentLang === 'id' ? "Ekstraksi uap suhu rendah dan kondisioner minyak alami untuk kelembutan kain." : "Low-moisture organic steam sanitization to safely cleanse velvet sofas without fabric shrinkage.";
            } else {
                title.innerText = currentLang === 'id' ? "Standar Perawatan Kayu Hardwood" : "Hardwood & Timber Care Standards";
                desc.innerText = currentLang === 'id' ? "Pembersihan dengan kadar air rendah dan minyak botanical untuk mencegah kayu melengkung." : "We utilize pH-neutral botanical oils and ultra-low moisture micro-mopping to prevent wood warping.";
            }
        }

        // AI Chat Assistant
        function toggleAiChat() {
            document.getElementById('aiChatBox').classList.toggle('hidden');
        }

        function sendAiMsg() {
            const input = document.getElementById('aiInput');
            const val = input.value.trim();
            if (!val) return;

            const box = document.getElementById('aiChatMessages');
            const userBubble = document.createElement('div');
            userBubble.className = 'flex justify-end';
            const userText = document.createElement('div');
            userText.className = 'bg-matcha-900 text-oat-50 p-3 rounded-2xl text-xs max-w-[80%]';
            userText.textContent = val;
            userBubble.appendChild(userText);
            box.appendChild(userBubble);
            input.value = '';
            box.scrollTop = box.scrollHeight;

            setTimeout(() => {
                let reply = currentLang === 'id' 
                    ? "Produk MATCHA CLEAN 100% aman untuk anak dan hewan peliharaan! Ingin kami bantu menjadwalkan sesi pembersihan?"
                    : "MATCHA CLEAN solutions are 100% non-toxic and child-safe! Would you like help booking a home reset session?";
                
                box.innerHTML += `
                    <div class="flex space-x-2">
                        <div class="w-6 h-6 rounded-full bg-matcha-900 text-matcha-300 text-[10px] flex items-center justify-center flex-shrink-0"><i class="fa-solid fa-leaf"></i></div>
                        <div class="bg-matcha-100 p-3 rounded-2xl text-matcha-900 text-xs max-w-[80%]">
                            ${reply}
                        </div>
                    </div>
                `;
                box.scrollTop = box.scrollHeight;
            }, 500);
        }

        function scrollToSection(id) {
            document.getElementById(id).scrollIntoView({ behavior: 'smooth' });
        }

        function handleBooking(e) {
            e.preventDefault();
            const form = e.currentTarget;
            const data = new FormData(form);
            const lang = currentLang === 'id';
            const message = [
                lang ? 'Halo MATCHA CLEAN, saya ingin mengajukan booking konsultasi pembersihan rumah.' : 'Hello MATCHA CLEAN, I would like to request a home-cleaning booking.',
                '',
                `${lang ? 'Nama' : 'Name'}: ${data.get('customer_name')}`,
                `${lang ? 'No. WhatsApp' : 'WhatsApp'}: ${data.get('customer_phone')}`,
                `${lang ? 'Area rumah' : 'Property area'}: ${data.get('property_area')}`,
                `${lang ? 'Tanggal pilihan' : 'Preferred date'}: ${data.get('preferred_date')}`,
                `${lang ? 'Ruangan' : 'Room'}: ${selectedRoom}`,
                `${lang ? 'Kondisi rumah' : 'Home condition'}: ${selectedCond}`,
                `${lang ? 'Luas rumah' : 'Home area'}: ${calcAreaRange.value} m²`,
                `${lang ? 'Kamar tidur' : 'Bedrooms'}: ${bedCount}`,
                `${lang ? 'Kamar mandi' : 'Bathrooms'}: ${bathCount}`,
                `${lang ? 'Estimasi harga (belum final)' : 'Estimated price (not final)'}: ${document.getElementById('calcTotalPrice').innerText}`,
                '',
                lang ? 'Mohon konfirmasi ketersediaan jadwal, cakupan layanan, dan harga final dari admin. Saya memahami booking belum terkonfirmasi sebelum admin membalas.' : 'Please confirm schedule availability, service scope, and final price. I understand the booking is not confirmed until the admin replies.'
            ].join('\n');
            window.open(`https://wa.me/${MATCHA_WHATSAPP_NUMBER}?text=${encodeURIComponent(message)}`, '_blank', 'noopener,noreferrer');
        }

        document.getElementById('mobileMenuBtn').addEventListener('click', () => {
            document.getElementById('mobileMenu').classList.toggle('hidden');
        });

        setLang('en');
    
