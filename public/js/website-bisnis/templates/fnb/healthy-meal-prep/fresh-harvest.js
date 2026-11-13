function freshHarvestApp() {
            return {
                activeDiet: 'all',
                mealTimeFilter: 'all',
                selectedPlannerDay: 0,
                selectedMealsPerWeek: 10,
                selectedWeeksDuration: 4,
                selectedDietGoal: 'balanced',
                swapModalOpen: false,
                swapSlotType: '',
                checkoutModalOpen: false,
                customer: { name: '', phone: '', email: '', area: '', address: '', deliveryDay: '', deliveryTime: '', notes: '' },

                catalogMenus: (window.FRESH_HARVEST_MENUS && window.FRESH_HARVEST_MENUS.length ? window.FRESH_HARVEST_MENUS : [
                    { id: 1, name: 'Avocado Sourdough Toast & Egg', category: 'Sarapan', mealTime: 'Sarapan', diet: 'balanced', calories: 290, protein: '14g', carbs: '28g', fat: '12g', fiber: '6g', ingredients: 'Roti Sourdough organik, alpukat mentega, telur omega rebus, chia seeds', allergen: 'Gluten, Telur', image: 'https://images.unsplash.com/photo-1525351484163-7529414344d8?auto=format&fit=crop&w=600&q=80', desc: 'Sarapan tinggi serat dan lemak sehat untuk energi pagi yang stabil.' },
                    { id: 2, name: 'Salmon Panggang Herb Quinoa Bowl', category: 'Makan Siang', mealTime: 'Makan Siang', diet: 'high-protein', calories: 420, protein: '34g', carbs: '40g', fat: '12g', fiber: '7g', ingredients: 'Salmon Norwegia, quinoa organik, brokoli kukus, saus lemon dill', allergen: 'Ikan', image: 'https://images.unsplash.com/photo-1540420773420-3366772f4999?auto=format&fit=crop&w=600&q=80', desc: 'Sumber protein omega-3 tinggi dengan karbohidrat kompleks quinoa.' },
                    { id: 3, name: 'Tofu Tempeh Teriyaki Buddha Bowl', category: 'Makan Malam', mealTime: 'Makan Malam', diet: 'plant-based', calories: 350, protein: '22g', carbs: '45g', fat: '9g', fiber: '8g', ingredients: 'Tahu organik, tempe kedelai murni, edamame, wortel, saus teriyaki madu', allergen: 'Kedelai', image: 'https://images.unsplash.com/photo-1512621776951-a57141f2eefd?auto=format&fit=crop&w=600&q=80', desc: 'Menu nabati kaya protein nabati dan serat untuk pencernaan malam.' },
                    { id: 4, name: 'Dada Ayam Sous-Vide & Sweet Potato', category: 'Makan Siang', mealTime: 'Makan Siang', diet: 'high-protein', calories: 380, protein: '38g', carbs: '32g', fat: '8g', fiber: '5g', ingredients: 'Dada ayam sous-vide, ubi jalar panggang, asparagus, rosemary', allergen: 'Tidak ada', image: 'https://images.unsplash.com/photo-1604908176997-125f2596f378?auto=format&fit=crop&w=600&q=80', desc: 'Empuk, juicy, dan sangat direkomendasikan untuk pembentukan otot.' },
                    { id: 5, name: 'Berry Chia Protein Pudding', category: 'Camilan', mealTime: 'Camilan', diet: 'balanced', calories: 210, protein: '12g', carbs: '22g', fat: '6g', fiber: '9g', ingredients: 'Biji chia, susu almond murni, buah beri segar, bubuk whey organik', allergen: 'Kacang', image: 'https://images.unsplash.com/photo-1488477181946-6428a0291777?auto=format&fit=crop&w=600&q=80', desc: 'Camilan manis sehat penahan nafsu makan berlebih.' },
                    { id: 6, name: 'Zucchini Noodles & Pesto Shrimp', category: 'Makan Malam', mealTime: 'Makan Malam', diet: 'low-carb', calories: 320, protein: '28g', carbs: '12g', fat: '14g', fiber: '4g', ingredients: 'Mi zucchini (zoodles), udang segar, saus pesto kemangi kacang mede', allergen: 'Udang, Kacang', image: 'https://images.unsplash.com/photo-1565299624946-b28f40a0ae38?auto=format&fit=crop&w=600&q=80', desc: 'Rendah karbohidrat total, kaya antioksidan dan protein udang.' }
                ]),

                // Perencana Menu 7 Hari Bervariasi Sepenuhnya
                weeklyPlannerData: [
                    {
                        day: 'Senin',
                        sarapan: { name: 'Avocado Sourdough Toast & Egg', calories: 290, protein: '14g', image: 'https://images.unsplash.com/photo-1525351484163-7529414344d8?auto=format&fit=crop&w=400&q=80', desc: 'Roti Sourdough dengan alpukat dan telur omega.' },
                        siang: { name: 'Dada Ayam Sous-Vide & Sweet Potato', calories: 380, protein: '38g', image: 'https://images.unsplash.com/photo-1604908176997-125f2596f378?auto=format&fit=crop&w=400&q=80', desc: 'Ayam empuk dengan ubi panggang & asparagus.' },
                        malam: { name: 'Tofu Tempeh Teriyaki Buddha Bowl', calories: 350, protein: '22g', image: 'https://images.unsplash.com/photo-1512621776951-a57141f2eefd?auto=format&fit=crop&w=400&q=80', desc: 'Kombinasi tahu, tempe, dan edamame segar.' }
                    },
                    {
                        day: 'Selasa',
                        sarapan: { name: 'Oatmeal Berry Chia Protein Pudding', calories: 270, protein: '15g', image: 'https://images.unsplash.com/photo-1517673132405-a56a62b18caf?auto=format&fit=crop&w=400&q=80', desc: 'Oatmeal malam dengan chia seeds & buah beri.' },
                        siang: { name: 'Salmon Panggang Herb Quinoa Bowl', calories: 420, protein: '34g', image: 'https://images.unsplash.com/photo-1540420773420-3366772f4999?auto=format&fit=crop&w=400&q=80', desc: 'Salmon Norwegia segar dengan quinoa organik.' },
                        malam: { name: 'Zucchini Noodles & Pesto Shrimp', calories: 320, protein: '28g', image: 'https://images.unsplash.com/photo-1565299624946-b28f40a0ae38?auto=format&fit=crop&w=400&q=80', desc: 'Mi zucchini rendah karbo dengan udang pesto.' }
                    },
                    {
                        day: 'Rabu',
                        sarapan: { name: 'Tropical Mango Greek Yogurt Bowl', calories: 260, protein: '18g', image: 'https://images.unsplash.com/photo-1488477181946-6428a0291777?auto=format&fit=crop&w=400&q=80', desc: 'Greek yogurt tinggi protein dengan mangga segar.' },
                        siang: { name: 'Lean Beef Cauliflower Rice Bowl', calories: 410, protein: '36g', image: 'https://images.unsplash.com/photo-1543339308-43e59d6b73a6?auto=format&fit=crop&w=400&q=80', desc: 'Daging sapi cincang lean dengan nasi kembang kol.' },
                        malam: { name: 'Roasted Mushroom & Spinach Soup', calories: 280, protein: '12g', image: 'https://images.unsplash.com/photo-1547592166-23ac45744acd?auto=format&fit=crop&w=400&q=80', desc: 'Sup krim jamur champignon tanpa susu berlebih.' }
                    },
                    {
                        day: 'Kamis',
                        sarapan: { name: 'Matcha Chia Seed Pudding', calories: 240, protein: '10g', image: 'https://images.unsplash.com/photo-1536256263959-770b48d82b0a?auto=format&fit=crop&w=400&q=80', desc: 'Pudding chia rasa matcha organik penambah energi.' },
                        siang: { name: 'Lemon Herb Grilled Chicken Salad', calories: 360, protein: '35g', image: 'https://images.unsplash.com/photo-1512621776951-a57141f2eefd?auto=format&fit=crop&w=400&q=80', desc: 'Salad segar dengan dada ayam panggang lemon.' },
                        malam: { name: 'Baked Cod Fish with Sweet Potato Mash', calories: 340, protein: '30g', image: 'https://images.unsplash.com/photo-1519708227418-c8fd9a32b7a2?auto=format&fit=crop&w=400&q=80', desc: 'Ikan cod panggang lembut dengan puree ubi.' }
                    },
                    {
                        day: 'Jumat',
                        sarapan: { name: 'Banana Peanut Butter Toast', calories: 310, protein: '12g', image: 'https://images.unsplash.com/photo-1525351484163-7529414344d8?auto=format&fit=crop&w=400&q=80', desc: 'Roti gandum utuh, selai kacang murni, dan pisang.' },
                        siang: { name: 'Garlic Butter Shrimp Brown Rice', calories: 390, protein: '32g', image: 'https://images.unsplash.com/photo-1534422298391-e4f8c172dddb?auto=format&fit=crop&w=400&q=80', desc: 'Udang tumis bawang putih dengan beras merah.' },
                        malam: { name: 'Stuffed Bell Pepper with Quinoa', calories: 330, protein: '18g', image: 'https://images.unsplash.com/photo-1543339308-43e59d6b73a6?auto=format&fit=crop&w=400&q=80', desc: 'Paprika panggang isi quinoa dan keju feta.' }
                    },
                    {
                        day: 'Sabtu',
                        sarapan: { name: 'Dragon Fruit Smoothie Bowl', calories: 280, protein: '11g', image: 'https://images.unsplash.com/photo-1590301157890-4810ed352733?auto=format&fit=crop&w=400&q=80', desc: 'Smoothie buah naga segar topping granola.' },
                        siang: { name: 'Sirloin Steak Salad & Balsamic', calories: 450, protein: '40g', image: 'https://images.unsplash.com/photo-1544025162-d76694265947?auto=format&fit=crop&w=400&q=80', desc: 'Daging sirloin lean iris tipis dengan dressing balsamic.' },
                        malam: { name: 'Baked Cauliflower Curry Bowl', calories: 310, protein: '14g', image: 'https://images.unsplash.com/photo-1547592166-23ac45744acd?auto=format&fit=crop&w=400&q=80', desc: 'Kembang kol panggang bumbu kari rempah hangat.' }
                    },
                    {
                        day: 'Minggu',
                        sarapan: { name: 'Berry Protein Granola Bowl', calories: 300, protein: '16g', image: 'https://images.unsplash.com/photo-1488477181946-6428a0291777?auto=format&fit=crop&w=400&q=80', desc: 'Granola panggang rumah dengan susu almond.' },
                        siang: { name: 'Rosemary Grilled Salmon & Red Rice', calories: 430, protein: '35g', image: 'https://images.unsplash.com/photo-1540420773420-3366772f4999?auto=format&fit=crop&w=400&q=80', desc: 'Salmon rosemary dengan nasi merah organik.' },
                        malam: { name: 'Tempeh Mushroom Stir-Fry', calories: 320, protein: '20g', image: 'https://images.unsplash.com/photo-1512621776951-a57141f2eefd?auto=format&fit=crop&w=400&q=80', desc: 'Tumis tempe dan jamur shitake kecap manis gurih.' }
                    }
                ],

                get filteredCatalog() {
                    let result = this.catalogMenus;
                    if (this.activeDiet !== 'all') {
                        result = result.filter(m => m.diet === this.activeDiet);
                    }
                    if (this.mealTimeFilter !== 'all') {
                        result = result.filter(m => m.mealTime === this.mealTimeFilter);
                    }
                    return result;
                },

                getPlannerTotalCalories() {
                    const dayObj = this.weeklyPlannerData[this.selectedPlannerDay];
                    if (!dayObj) return 1000;
                    return dayObj.sarapan.calories + dayObj.siang.calories + dayObj.malam.calories;
                },

                openSwapModal(slotType) {
                    this.swapSlotType = slotType;
                    this.swapModalOpen = true;
                },

                confirmSwapMenu(menuItem) {
                    if (!this.weeklyPlannerData[this.selectedPlannerDay]) return;
                    if (this.swapSlotType === 'sarapan') {
                        this.weeklyPlannerData[this.selectedPlannerDay].sarapan = {
                            name: menuItem.name,
                            calories: menuItem.calories,
                            protein: menuItem.protein,
                            image: menuItem.image,
                            desc: menuItem.desc
                        };
                    } else if (this.swapSlotType === 'siang') {
                        this.weeklyPlannerData[this.selectedPlannerDay].siang = {
                            name: menuItem.name,
                            calories: menuItem.calories,
                            protein: menuItem.protein,
                            image: menuItem.image,
                            desc: menuItem.desc
                        };
                    } else if (this.swapSlotType === 'malam') {
                        this.weeklyPlannerData[this.selectedPlannerDay].malam = {
                            name: menuItem.name,
                            calories: menuItem.calories,
                            protein: menuItem.protein,
                            image: menuItem.image,
                            desc: menuItem.desc
                        };
                    }
                    this.swapModalOpen = false;
                },

                selectMenuForPlan(menu) {
                    alert('Menu ' + menu.name + ' berhasil ditambahkan ke rencana mingguan Anda!');
                    const el = document.getElementById('planner');
                    if(el) el.scrollIntoView({ behavior: 'smooth' });
                },

                calculateDiscount() {
                    if (this.selectedWeeksDuration === 12) return 20;
                    if (this.selectedWeeksDuration === 4) return 10;
                    return 5;
                },

                calculateTotalPrice() {
                    const pricePerMeal = 65000;
                    const totalMeals = this.selectedMealsPerWeek * this.selectedWeeksDuration;
                    const subtotal = totalMeals * pricePerMeal;
                    const disc = this.calculateDiscount() / 100;
                    return Math.round(subtotal * (1 - disc));
                },

                formatIDR(num) {
                    return 'Rp ' + num.toLocaleString('id-ID');
                },

                openCheckoutModal() {
                    this.checkoutModalOpen = true;
                },

                dietGoalLabel() {
                    const labels = {
                        balanced: 'Gizi Seimbang Umum (Balanced Nutrition)',
                        weightloss: 'Penurunan Berat Badan (Low Calorie / High Fiber)',
                        muscle: 'Pembentukan Otot (High Protein & Lean Meat)',
                        plant: 'Vegetarian / Nabati Murni (Plant-Based)'
                    };
                    return labels[this.selectedDietGoal] || this.selectedDietGoal;
                },

                sendOrderToWhatsApp() {
                    const c = this.customer;
                    const phone = String(c.phone || '').replace(/[^0-9+]/g, '');
                    if (!c.name || !phone || !c.area || !c.address || !c.deliveryDay || !c.deliveryTime) {
                        alert('Mohon lengkapi seluruh data wajib terlebih dahulu.');
                        return;
                    }

                    const message = [
                        '*HALO FRESH HARVEST! 🌿*',
                        'Saya ingin memesan paket langganan healthy meal prep. Berikut detail pesanan saya:',
                        '',
                        '*DATA PEMESAN*',
                        'Nama: ' + c.name,
                        'No. WhatsApp: ' + phone,
                        'Email: ' + (c.email || '-'),
                        'Kota/Kecamatan: ' + c.area,
                        'Alamat Pengiriman: ' + c.address,
                        '',
                        '*DETAIL PAKET*',
                        'Jumlah porsi: ' + this.selectedMealsPerWeek + ' porsi/minggu',
                        'Durasi langganan: ' + this.selectedWeeksDuration + ' minggu',
                        'Preferensi diet: ' + this.dietGoalLabel(),
                        'Diskon paket: ' + this.calculateDiscount() + '%',
                        'Total estimasi: ' + this.formatIDR(this.calculateTotalPrice()),
                        '',
                        '*JADWAL PENGIRIMAN*',
                        'Hari pilihan: ' + c.deliveryDay,
                        'Waktu: ' + c.deliveryTime,
                        'Catatan: ' + (c.notes || '-'),
                        '',
                        'Mohon konfirmasi ketersediaan area, rincian pesanan, dan instruksi pembayaran. Terima kasih!'
                    ].join('\n');

                    const whatsappUrl = 'https://wa.me/6281234567890?text=' + encodeURIComponent(message);
                    window.open(whatsappUrl, '_blank', 'noopener,noreferrer');
                    this.checkoutModalOpen = false;
                },

                openManageModal() {
                    alert('Membuka Dashboard Member: Fitur ganti menu, jeda jadwal, dan lanjut langganan.');
                },

                faqs: [
                    { q: 'Bagaimana cara kerja langganan makanan sehat Fresh Harvest?', a: 'Anda memilih jumlah porsi per minggu dan durasi berlangganan. Menu harian akan otomatis diracik dan dikirimkan langsung ke alamat Anda sesuai jadwal.' },
                    { q: 'Apakah menu makanan bisa diganti jika saya memiliki alergi?', a: 'Tentu! Anda dapat menggunakan fitur Planner Menu interaktif atau dashboard member untuk mengganti menu harian sesuai preferensi dan alergi Anda.' },
                    { q: 'Bagaimana makanan dikirimkan agar tetap segar?', a: 'Makanan dimasak setiap subuh, dikemas dalam wadah vacuum BPA-free, lalu dikirim menggunakan tas insulasi berpendingin (thermal bag) khusus kurir kami.' },
                    { q: 'Apakah saya bisa menjeda langganan jika sedang liburan?', a: 'Sangat bisa. Anda dapat melakukan pause atau reschedule jadwal pengiriman melalui dashboard member minimal H-1 sebelum pengiriman.' }
                ]
            }
        }
