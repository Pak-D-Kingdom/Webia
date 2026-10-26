
        // DATA PRODUK (Pastel & Gemoy Theme)
        const productsData = [
            {
                id: 1,
                name: "Jumper Pastel Organik Bunny",
                category: "pakaian",
                price: 89000,
                rating: 4.9,
                badge: "Terlaris",
                badgeColor: "bg-pastelPink text-rose-600",
                image: "https://images.unsplash.com/photo-1522771739844-6a9f6d5f14af?auto=format&fit=crop&w=500&q=80",
                desc: "Jumper terbuat dari 100% kapas organik ekstra lembut. Anti-gatal, menyerap keringat, dan dilengkapi kancing snap higienis.",
                material: "100% Cotton Organic OEKO-TEX"
            },
            {
                id: 2,
                name: "Set MPASI Silicone Soft Pastel",
                category: "mpasi",
                price: 135000,
                rating: 5.0,
                badge: "BPA Free",
                badgeColor: "bg-pastelMint text-emerald-700",
                image: "https://images.unsplash.com/photo-1584308666744-24d5c474f2ae?auto=format&fit=crop&w=500&q=80",
                desc: "Set piring suction anti-tumpah, mangkok, sendok lentur & bib leher silicone ramah bayi. Tahan panas hingga 220°C.",
                material: "Food Grade Silicone BPA Free"
            },
            {
                id: 3,
                name: "Mainan Kayu Montessori Rainbow",
                category: "mainan",
                price: 110000,
                rating: 4.8,
                badge: "Edukasi",
                badgeColor: "bg-pastelYellow text-amber-700",
                image: "https://images.unsplash.com/photo-1596461404969-9ae70f2830c1?auto=format&fit=crop&w=500&q=80",
                desc: "Mainan susun kayu non-toxic dengan sudut tumpul yang aman. Melatih sensorik motorik halus si Kecil.",
                material: "Natural Wood + Non-Toxic Water Paint"
            },
            {
                id: 4,
                name: "Calming Baby Lotion Chamomile",
                category: "skincare",
                price: 78000,
                rating: 4.9,
                badge: "Sensitif",
                badgeColor: "bg-pastelBlue text-sky-700",
                image: "https://images.unsplash.com/photo-1556228720-195a672e8a03?auto=format&fit=crop&w=500&q=80",
                desc: "Lotion pelembap bayi dengan aroma chamomile alami. Menenangkan kulit kering & mencegah ruam popok.",
                material: "Ekstrak Chamomile & Organic Aloe Vera"
            },
            {
                id: 5,
                name: "Sleepsuit Footed Pastel Blue",
                category: "pakaian",
                price: 98000,
                rating: 4.9,
                badge: "Newborn",
                badgeColor: "bg-pastelLavender text-purple-700",
                image: "https://images.unsplash.com/photo-1519689680058-324335c77eba?auto=format&fit=crop&w=500&q=80",
                desc: "Baju tidur tutup kaki murni kapas. Menjaga kehangatan bayi sepanjang malam tanpa bikin gerah.",
                material: "100% Cotton Premium"
            },
            {
                id: 6,
                name: "Rattles Teeth Greet Cute Bear",
                category: "mainan",
                price: 45000,
                rating: 4.7,
                badge: "Gigitan Bayi",
                badgeColor: "bg-pastelPink text-rose-600",
                image: "https://images.unsplash.com/photo-1515488042361-ee00e0ddd4e4?auto=format&fit=crop&w=500&q=80",
                desc: "Gigitan bayi dengan bunyi kerincingan lembut. Tekstur empuk untuk merangsang pertumbuhan gigi.",
                material: "BPA Free Silicone + Soft Plush"
            }
        ];

        // FLASH SALE PRODUCTS DATA
        const flashSaleProducts = [
            { id: 101, name: "Topi Kupluk Rajut Bayi Pastel", price: 35000, oldPrice: 70000, img: "https://images.unsplash.com/photo-1522771739844-6a9f6d5f14af?auto=format&fit=crop&w=300&q=80" },
            { id: 102, name: "Kaos Kaki Boneka Antislip", price: 25000, oldPrice: 50000, img: "https://images.unsplash.com/photo-1515488042361-ee00e0ddd4e4?auto=format&fit=crop&w=300&q=80" },
            { id: 103, name: "Slabber Handuk Waslap Baby", price: 29000, oldPrice: 58000, img: "https://images.unsplash.com/photo-1584308666744-24d5c474f2ae?auto=format&fit=crop&w=300&q=80" }
        ];

        // STATE KERANJANG & WISHLIST
        let cart = [];
        let wishlistCount = 0;

        // INIT ON LOAD
        window.onload = function() {
            renderProducts(productsData);
            renderFlashSale();
            switchAgeTab('0-6');
            startCountdown();
        };

        // RENDER KATALOG PRODUK
        function renderProducts(items) {
            const container = document.getElementById('productGrid');
            container.innerHTML = '';

            items.forEach(prod => {
                const card = document.createElement('div');
                card.className = "bg-white p-4 rounded-3xl border-2 border-pastelLavender hover:border-pastelPink shadow-sm hover:shadow-cute transition-all flex flex-col justify-between group";
                card.innerHTML = `
                    <div>
                        <div class="relative overflow-hidden rounded-2xl mb-3 h-44 bg-pastelCream">
                            <span class="absolute top-2 left-2 ${prod.badgeColor} text-[10px] font-bold px-2.5 py-1 rounded-full z-10 shadow-sm">
                                ${prod.badge}
                            </span>
                            <img src="${prod.image}" alt="${prod.name}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                            <button onclick="toggleWishlist(this)" class="absolute top-2 right-2 w-8 h-8 bg-white/80 hover:bg-white rounded-full flex items-center justify-center text-rose-400 shadow-sm transition-all">
                                <i class="fa-regular fa-heart"></i>
                            </button>
                        </div>
                        
                        <div class="flex items-center gap-1 text-amber-400 text-xs mb-1">
                            <i class="fa-solid fa-star"></i>
                            <span class="font-bold text-gray-700">${prod.rating}</span>
                        </div>

                        <h3 class="font-bold text-sm text-textDark leading-snug line-clamp-2">${prod.name}</h3>
                        <p class="text-rose-500 font-extrabold text-sm mt-1">Rp ${prod.price.toLocaleString('id-ID')}</p>
                    </div>

                    <div class="mt-4 flex gap-2">
                        <button onclick="openQuickView(${prod.id})" class="flex-1 bg-pastelCream hover:bg-pastelLavender text-textDark font-bold py-2 rounded-2xl text-xs transition-all">
                            Detail
                        </button>
                        <button onclick="addToCart(${prod.id})" class="bg-pastelPink hover:bg-pastelPinkDark text-rose-700 font-bold px-3 py-2 rounded-2xl text-xs transition-all flex items-center gap-1">
                            <i class="fa-solid fa-plus"></i> <i class="fa-solid fa-cart-shopping"></i>
                        </button>
                    </div>
                `;
                container.appendChild(card);
            });
        }

        // RENDER FLASH SALE
        function renderFlashSale() {
            const container = document.getElementById('flashSaleContainer');
            container.innerHTML = '';
            flashSaleProducts.forEach(item => {
                container.innerHTML += `
                    <div class="bg-pastelCream p-3 rounded-2xl border border-pastelPink flex items-center gap-3">
                        <img src="${item.img}" class="w-16 h-16 rounded-xl object-cover">
                        <div class="flex-1">
                            <h4 class="font-bold text-xs line-clamp-1">${item.name}</h4>
                            <div class="flex items-center gap-2 mt-1">
                                <span class="text-rose-500 font-extrabold text-xs">Rp ${item.price.toLocaleString('id-ID')}</span>
                                <span class="text-[10px] text-gray-400 line-through">Rp ${item.oldPrice.toLocaleString('id-ID')}</span>
                            </div>
                            <button onclick="addToCartDirect('${item.name}', ${item.price})" class="mt-2 text-[10px] bg-rose-400 text-white font-bold px-3 py-1 rounded-full">Beli Diskon</button>
                        </div>
                    </div>
                `;
            });
        }

        // FILTER KATEGORI
        function filterCategory(cat) {
            // Highlight button
            document.querySelectorAll('.cat-btn').forEach(btn => {
                btn.classList.remove('bg-textDark', 'text-white');
                btn.classList.add('bg-white', 'text-textDark');
            });
            event.target.classList.remove('bg-white', 'text-textDark');
            event.target.classList.add('bg-textDark', 'text-white');

            if (cat === 'all') {
                renderProducts(productsData);
            } else {
                const filtered = productsData.filter(p => p.category === cat);
                renderProducts(filtered);
            }
        }

        // AGE TAB SWITCHER
        function switchAgeTab(age) {
            document.querySelectorAll('.age-tab').forEach(t => {
                t.classList.remove('bg-pastelPink', 'bg-pastelYellow', 'bg-pastelMint', 'bg-pastelBlue');
                t.classList.add('bg-gray-100');
            });

            const contentBox = document.getElementById('ageContent');
            const activeTab = document.getElementById(`tab-${age}`);

            if (age === '0-6') {
                activeTab.classList.add('bg-pastelPink');
                contentBox.innerHTML = `
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 items-center">
                        <div>
                            <span class="bg-rose-100 text-rose-600 font-bold px-3 py-1 rounded-full text-xs">Fase Newborn (0-6 Bulan)</span>
                            <h3 class="text-2xl font-bold mt-2">Kelembutan Ekstra Untuk Kulit Bayi Mungil</h3>
                            <p class="text-xs text-gray-600 mt-2 leading-relaxed">
                                Di usia 0-6 bulan, kulit bayi 3x lebih tipis dari orang dewasa. Fokus utama adalah pakaian berbahan organik 100% tanpa jahitan kasar serta selimut lembut hypoallergenic.
                            </p>
                            <ul class="text-xs space-y-2 mt-4 font-semibold text-textDark">
                                <li>✨ Jumper & Sleepsuit Kancing Snap</li>
                                <li>✨ Bedong Instant Elastis</li>
                                <li>✨ Calming Skincare Aloe & Chamomile</li>
                            </ul>
                        </div>
                        <div class="bg-white p-4 rounded-2xl border border-pastelPink text-center">
                            <p class="font-bold text-xs text-rose-500 mb-2">Rekomendasi Paket Newborn Gift Set</p>
                            <img src="https://images.unsplash.com/photo-1522771739844-6a9f6d5f14af?auto=format&fit=crop&w=400&q=80" class="rounded-xl h-40 w-full object-cover">
                        </div>
                    </div>
                `;
            } else if (age === '6-12') {
                activeTab.classList.add('bg-pastelYellow');
                contentBox.innerHTML = `
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 items-center">
                        <div>
                            <span class="bg-amber-100 text-amber-700 font-bold px-3 py-1 rounded-full text-xs">Fase MPASI (6-12 Bulan)</span>
                            <h3 class="text-2xl font-bold mt-2">Eksplorasi Rasa & Belajar Duduk Mandiri</h3>
                            <p class="text-xs text-gray-600 mt-2 leading-relaxed">
                                Saatnya si Kecil mulai MPASI! Dapatkan peralatan makan silicone BPA-Free yang aman digigit dan tidak mudah pecah saat jatuh.
                            </p>
                            <ul class="text-xs space-y-2 mt-4 font-semibold text-textDark">
                                <li>🥣 Piring Suction Lengket Di Meja</li>
                                <li>🥤 Training Cup Anti-Sedak</li>
                                <li>🧸 Mainan Teether Gigitan Gusi</li>
                            </ul>
                        </div>
                        <div class="bg-white p-4 rounded-2xl border border-pastelYellow text-center">
                            <p class="font-bold text-xs text-amber-600 mb-2">Peralatan MPASI Lengkap</p>
                            <img src="https://images.unsplash.com/photo-1584308666744-24d5c474f2ae?auto=format&fit=crop&w=400&q=80" class="rounded-xl h-40 w-full object-cover">
                        </div>
                    </div>
                `;
            } else if (age === '1-3') {
                activeTab.classList.add('bg-pastelMint');
                contentBox.innerHTML = `
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 items-center">
                        <div>
                            <span class="bg-emerald-100 text-emerald-700 font-bold px-3 py-1 rounded-full text-xs">Fase Toddler (1-3 Tahun)</span>
                            <h3 class="text-2xl font-bold mt-2">Dunia Aktivitas & Motorik Halus</h3>
                            <p class="text-xs text-gray-600 mt-2 leading-relaxed">
                                Anak mulai aktif berjalan dan mengeksplorasi sekitar. Pilih setelan baju santai yang menyerap keringat dan mainan edukasi Montessori kayu.
                            </p>
                        </div>
                        <div class="bg-white p-4 rounded-2xl border border-pastelMint text-center">
                            <p class="font-bold text-xs text-emerald-600 mb-2">Mainan Motorik Halus</p>
                            <img src="https://images.unsplash.com/photo-1596461404969-9ae70f2830c1?auto=format&fit=crop&w=400&q=80" class="rounded-xl h-40 w-full object-cover">
                        </div>
                    </div>
                `;
            } else {
                activeTab.classList.add('bg-pastelBlue');
                contentBox.innerHTML = `
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 items-center">
                        <div>
                            <span class="bg-sky-100 text-sky-700 font-bold px-3 py-1 rounded-full text-xs">Fase Kids (4+ Tahun)</span>
                            <h3 class="text-2xl font-bold mt-2">Keceriaan Anak Sekolah & Bermain</h3>
                            <p class="text-xs text-gray-600 mt-2 leading-relaxed">
                                Koleksi pakaian fashionable pastel mix untuk les, bepergian, dan tas ransel imut ramah punggung anak.
                            </p>
                        </div>
                        <div class="bg-white p-4 rounded-2xl border border-pastelBlue text-center">
                            <p class="font-bold text-xs text-sky-600 mb-2">Pakaian Trendy Anak</p>
                            <img src="https://images.unsplash.com/photo-1519689680058-324335c77eba?auto=format&fit=crop&w=400&q=80" class="rounded-xl h-40 w-full object-cover">
                        </div>
                    </div>
                `;
            }
        }

        // QUICK VIEW MODAL
        function openQuickView(id) {
            const item = productsData.find(p => p.id === id);
            const container = document.getElementById('quickViewContent');
            
            container.innerHTML = `
                <div class="bg-pastelCream rounded-2xl p-2 flex items-center justify-center">
                    <img src="${item.image}" class="rounded-xl max-h-64 object-cover">
                </div>
                <div class="space-y-3">
                    <span class="bg-pastelPink text-rose-600 text-[10px] font-bold px-2.5 py-1 rounded-full">${item.badge}</span>
                    <h3 class="font-bold text-lg text-textDark">${item.name}</h3>
                    <p class="text-rose-500 font-extrabold text-xl">Rp ${item.price.toLocaleString('id-ID')}</p>
                    <p class="text-xs text-gray-600 leading-relaxed">${item.desc}</p>
                    
                    <div class="p-3 bg-pastelCream rounded-xl border border-pastelLavender text-xs">
                        <span class="font-bold">Spesifikasi Bahan:</span>
                        <p class="text-gray-600">${item.material}</p>
                    </div>

                    <button onclick="addToCart(${item.id}); closeQuickView();" class="w-full bg-pastelPink hover:bg-pastelPinkDark text-rose-800 font-bold py-3 rounded-2xl text-xs transition-all shadow-md">
                        + Tambah Ke Keranjang Belanja
                    </button>
                </div>
            `;
            document.getElementById('quickViewModal').classList.remove('hidden');
        }

        function closeQuickView() {
            document.getElementById('quickViewModal').classList.add('hidden');
        }

        // CART LOGIC
        function addToCart(id) {
            const product = productsData.find(p => p.id === id);
            const existing = cart.find(c => c.id === id);
            if (existing) {
                existing.qty++;
            } else {
                cart.push({ ...product, qty: 1 });
            }
            updateCartUI();
            showToast(`"${product.name}" ditambahkan ke keranjang! 🛍️`);
        }

        function addToCartDirect(name, price) {
            cart.push({ id: Date.now(), name: name, price: price, qty: 1 });
            updateCartUI();
            showToast(`Promo "${name}" ditambahkan ke keranjang! 🎉`);
        }

        function updateCartUI() {
            const badge = document.getElementById('cartBadge');
            const totalQty = cart.reduce((acc, item) => acc + item.qty, 0);
            badge.innerText = totalQty;

            const list = document.getElementById('cartItemsList');
            const totalEl = document.getElementById('cartTotalPrice');
            list.innerHTML = '';

            let totalPrice = 0;

            if (cart.length === 0) {
                list.innerHTML = `<p class="text-center text-xs text-gray-400 py-8">Keranjang belanja Moms masih kosong 🌸</p>`;
            } else {
                cart.forEach((item, index) => {
                    const itemTotal = item.price * item.qty;
                    totalPrice += itemTotal;
                    list.innerHTML += `
                        <div class="flex items-center justify-between p-3 bg-pastelCream rounded-2xl border border-pastelLavender text-xs">
                            <div>
                                <h4 class="font-bold text-textDark line-clamp-1">${item.name}</h4>
                                <p class="text-rose-500 font-bold">Rp ${item.price.toLocaleString('id-ID')} x ${item.qty}</p>
                            </div>
                            <div class="flex items-center gap-2">
                                <button onclick="changeQty(${index}, -1)" class="w-6 h-6 bg-white rounded-full font-bold shadow-sm">-</button>
                                <span class="font-bold">${item.qty}</span>
                                <button onclick="changeQty(${index}, 1)" class="w-6 h-6 bg-white rounded-full font-bold shadow-sm">+</button>
                            </div>
                        </div>
                    `;
                });
            }

            totalEl.innerText = `Rp ${totalPrice.toLocaleString('id-ID')}`;
        }

        function changeQty(index, change) {
            cart[index].qty += change;
            if (cart[index].qty <= 0) {
                cart.splice(index, 1);
            }
            updateCartUI();
        }

        function openCartModal() {
            document.getElementById('cartModal').classList.remove('hidden');
        }
        function closeCartModal() {
            document.getElementById('cartModal').classList.add('hidden');
        }

        function checkoutCart() {
            if (!Array.isArray(cart) || cart.length === 0) {
                showToast("Keranjang belanja masih kosong, Moms!");
                return;
            }

            // Customer wajib mengisi data diri sebelum pesanan disiapkan ke WhatsApp.
            closeCartModal();
            const checkoutModal = document.getElementById('customerCheckoutModal');
            if (checkoutModal) {
                checkoutModal.classList.remove('hidden');
                document.body.classList.add('overflow-hidden');
            } else {
                showToast("Form data pemesan belum tersedia. Muat ulang halaman dan coba lagi ya, Moms.");
            }
        }

        function closeCustomerCheckout() {
            const modal = document.getElementById('customerCheckoutModal');
            if (modal) modal.classList.add('hidden');
            document.body.classList.remove('overflow-hidden');
        }

        function submitCustomerCheckout(event) {
            if (event) event.preventDefault();
            if (!Array.isArray(cart) || cart.length === 0) {
                showToast("Keranjang belanja masih kosong, Moms!");
                closeCustomerCheckout();
                return;
            }

            const form = document.getElementById('customerCheckoutForm');
            if (!form || !form.reportValidity()) return;
            const data = new FormData(form);
            const name = String(data.get('customer_name') || '').trim();
            const phone = String(data.get('customer_phone') || '').trim();
            const email = String(data.get('customer_email') || '').trim();
            const address = String(data.get('customer_address') || '').trim();
            const city = String(data.get('customer_city') || '').trim();
            const shipping = String(data.get('shipping_method') || '').trim();
            const notes = String(data.get('customer_notes') || '').trim();

            const whatsappAdmin = '6285850180285'; // Ganti dengan nomor WhatsApp admin yang benar.
            const total = cart.reduce((sum, item) => sum + (Number(item.price) * Number(item.qty)), 0);
            const formatRupiah = (amount) => `Rp ${Number(amount).toLocaleString('id-ID')}`;
            const lines = cart.map((item, index) =>
                `${index + 1}. ${item.name}\n   Jumlah: ${item.qty}\n   Harga satuan: ${formatRupiah(item.price)}\n   Subtotal: ${formatRupiah(item.price * item.qty)}`
            ).join('\n\n');

            const message = [
                'Halo Pebble & Sprouts! 🌱 Saya ingin melakukan pemesanan.',
                '',
                '🧾 NOTA PESANAN',
                lines,
                '',
                `TOTAL PRODUK: ${formatRupiah(total)}`,
                '(Ongkos kirim dan total akhir menunggu konfirmasi admin)',
                '',
                '👤 DATA PEMESAN',
                `Nama penerima: ${name}`,
                `Nomor HP/WhatsApp: ${phone}`,
                `Email: ${email || '-'}`,
                `Alamat lengkap: ${address}`,
                `Kota/Kecamatan/Kode Pos: ${city}`,
                `Metode pengiriman: ${shipping}`,
                `Catatan pesanan: ${notes || '-'}`,
                '',
                'Mohon konfirmasi ketersediaan stok, ongkos kirim, metode pembayaran, dan total akhir pesanan. Terima kasih!'
            ].join('\n');

            const whatsappUrl = `https://wa.me/${whatsappAdmin}?text=${encodeURIComponent(message)}`;
            // Buka langsung setelah submit form agar tidak terhalang popup blocker.
            const whatsappWindow = window.open(whatsappUrl, '_blank');
            if (!whatsappWindow) window.location.href = whatsappUrl;
            closeCustomerCheckout();
        }

        // WISHLIST LOGIC
        function toggleWishlist(btn) {
            const icon = btn.querySelector('i');
            if (icon.classList.contains('fa-regular')) {
                icon.classList.remove('fa-regular');
                icon.classList.add('fa-solid', 'text-rose-500');
                wishlistCount++;
                showToast("Simpan ke Wishlist Moms ❤️");
            } else {
                icon.classList.remove('fa-solid', 'text-rose-500');
                icon.classList.add('fa-regular');
                wishlistCount--;
            }
            document.getElementById('wishlistBadge').innerText = wishlistCount;
        }

        // VOUCHER COPY
        function copyCoupon(code) {
            const dummy = document.createElement("textarea");
            document.body.appendChild(dummy);
            dummy.value = code;
            dummy.select();
            document.execCommand("copy");
            document.body.removeChild(dummy);
            showToast(`Kupon "${code}" berhasil disalin! 📋`);
        }

        // CALCULATE SHIPPING
        function calculateShipping() {
            const city = document.getElementById('destinationCity').value;
            const method = document.getElementById('shippingMethod').value;
            const res = document.getElementById('shippingResult');

            let cost = 15000;
            if (city === 'surabaya' || city === 'bandung') cost = 20000;
            if (city === 'medan' || city === 'bali') cost = 30000;

            if (method === 'express') cost += 15000;
            if (method === 'instant') cost += 25000;

            res.innerHTML = `Estimasi Ongkir: <strong class="text-rose-600">Rp ${cost.toLocaleString('id-ID')}</strong> (Estimasi tiba: ${method === 'instant' ? '3 Jam' : '1-2 Hari'})`;
            res.classList.remove('hidden');
        }

        // FAQ TOGGLE ACCORDION
        function toggleFaq(num) {
            const content = document.getElementById(`faqContent-${num}`);
            const icon = document.getElementById(`faqIcon-${num}`);
            
            if (content.style.maxHeight) {
                content.style.maxHeight = null;
                icon.style.transform = 'rotate(0deg)';
            } else {
                content.style.maxHeight = content.scrollHeight + "px";
                icon.style.transform = 'rotate(180deg)';
            }
        }

        // SPROUTS AI CHATBOT LOGIC
        function toggleAiChat() {
            const chat = document.getElementById('aiChatWindow');
            chat.classList.toggle('hidden');
            chat.classList.toggle('flex');
        }

        function sendChatMessage() {
            const input = document.getElementById('chatInput');
            const msg = input.value.trim();
            if (!msg) return;

            appendMessage(msg, 'user');
            input.value = '';

            // AI Simulated Reply
            setTimeout(() => {
                let reply = "Terima kasih sudah bertanya Moms! Untuk informasi lebih detail, Moms bisa hubungi WhatsApp CS kami di 0812-3456-789 ya ✨";
                const lower = msg.toLowerCase();
                
                if (lower.includes('kado') || lower.includes('hadiah')) {
                    reply = "Untuk kado bayi 0-6 bulan, rekomendasi terbaik adalah **Set Jumper Organik Bunny** atau **Newborn Sleepsuit**! Kami juga menyediakan box kado pita pastel gratis 🎁";
                } else if (lower.includes('ukuran') || lower.includes('size')) {
                    reply = "Untuk ukuran baju: \n• 3-5 kg: Size S (0-3 Bln)\n• 5.5-7.5 kg: Size M (3-6 Bln)\n• 7.5-10 kg: Size L (6-12 Bln) 📐";
                } else if (lower.includes('promo') || lower.includes('diskon')) {
                    reply = "Gunakan kode kupon **BABYSERU15K** untuk potongan Rp 15.000 atau **PASTELCHEER** untuk Bebas Ongkir se-Indonesia! ⚡";
                }

                appendMessage(reply, 'bot');
            }, 800);
        }

        function sendQuickPrompt(text) {
            document.getElementById('chatInput').value = text;
            sendChatMessage();
        }

        function handleChatKeyPress(e) {
            if (e.key === 'Enter') sendChatMessage();
        }

        function appendMessage(text, sender) {
            const container = document.getElementById('chatMessages');
            const msgDiv = document.createElement('div');
            
            if (sender === 'user') {
                msgDiv.className = "bg-pastelPink text-textDark p-3 rounded-2xl ml-auto max-w-[85%] font-semibold";
            } else {
                msgDiv.className = "bg-white p-3 rounded-2xl border border-pastelPink max-w-[85%] text-textDark";
            }
            msgDiv.innerText = text;
            container.appendChild(msgDiv);
            container.scrollTop = container.scrollHeight;
        }

        // COUNTDOWN TIMER
        function startCountdown() {
            let time = 5 * 3600 + 24 * 60 + 12;
            setInterval(() => {
                time--;
                if (time < 0) time = 5 * 3600;
                const h = Math.floor(time / 3600).toString().padStart(2, '0');
                const m = Math.floor((time % 3600) / 60).toString().padStart(2, '0');
                const s = (time % 60).toString().padStart(2, '0');
                document.getElementById('countdown').innerText = `${h} : ${m} : ${s}`;
            }, 1000);
        }

        // SEARCH HANDLE
        function handleSearch() {
            const query = document.getElementById('searchInput').value.toLowerCase();
            const filtered = productsData.filter(p => p.name.toLowerCase().includes(query) || p.category.includes(query));
            renderProducts(filtered);
            showToast(`Menampilkan hasil pencarian: "${query}"`);
        }

        // SIZE MODAL TOGGLES
        function openSizeModal() { document.getElementById('sizeModal').classList.remove('hidden'); }
        function closeSizeModal() { document.getElementById('sizeModal').classList.add('hidden'); }

        // MOBILE MENU TOGGLE
        function toggleMobileMenu() { document.getElementById('mobileMenu').classList.toggle('hidden'); }

        // NEWSLETTER SUB
        function subscribeNewsletter() {
            const email = document.getElementById('newsletterEmail').value;
            if (email) {
                showToast("Selamat! Moms berhasil bergabung dengan Sprouts Club 💌");
                document.getElementById('newsletterEmail').value = '';
            } else {
                showToast("Mohon masukkan alamat email Moms!");
            }
        }

        // TOAST NOTIFICATION HELPERS
        function showToast(message) {
            const toast = document.createElement('div');
            toast.className = 'fixed top-24 right-5 z-50 bg-textDark text-white font-bold text-xs px-5 py-3 rounded-2xl shadow-xl animate-bounce-soft border-2 border-pastelPink';
            toast.innerText = message;
            document.body.appendChild(toast);
            setTimeout(() => { toast.remove(); }, 3000);
        }
    
