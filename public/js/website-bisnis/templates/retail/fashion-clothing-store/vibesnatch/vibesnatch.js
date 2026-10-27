
    // PRODUCT DATA
    const products = [
      {
        id: 1,
        title: "Cyber Rave Puffer Jacket",
        category: "hoodies",
        price: 129.99,
        oldPrice: 179.99,
        image: "https://images.unsplash.com/photo-1544441893-675973e31985?w=600&auto=format&fit=crop&q=80",
        badge: "-30%",
        tab: "trending",
        desc: "Jaket puffer ultra-heavy dengan warna pastel vibrant khas Gen-Z."
      },
      {
        id: 2,
        title: "Matrix Chrome Goggles",
        category: "accessories",
        price: 45.00,
        oldPrice: 60.00,
        image: "https://images.unsplash.com/photo-1511499767150-a48a237f0083?w=600&auto=format&fit=crop&q=80",
        badge: "HOT",
        tab: "trending",
        desc: "Kacamata visor futuristik UV400 untuk melengkapi gaya Y2K kamu."
      },
      {
        id: 3,
        title: "Y2K Multi-Pocket Cargo",
        category: "cargos",
        price: 89.99,
        oldPrice: 119.99,
        image: "https://images.unsplash.com/photo-1517445312882-bc9910d016b7?w=600&auto=format&fit=crop&q=80",
        badge: "NEW",
        tab: "new",
        desc: "Celana cargo komplit kantong berbahan katun tebal dengan fitingan baggy."
      },
      {
        id: 4,
        title: "Dopamine Acid Wash Hoodie",
        category: "hoodies",
        price: 95.00,
        oldPrice: 130.00,
        image: "https://images.unsplash.com/photo-1556905055-8f358a7a47b2?w=600&auto=format&fit=crop&q=80",
        badge: "-25%",
        tab: "sale",
        desc: "Hoodie warna-warni 330GSM dengan sentuhan acid wash yang super adem."
      },
      {
        id: 5,
        title: "Pop Pleated Cyber Skirt",
        category: "skirts",
        price: 65.00,
        oldPrice: 85.00,
        image: "https://images.unsplash.com/photo-1583496661160-fb5886a0aaaa?w=600&auto=format&fit=crop&q=80",
        badge: "POP",
        tab: "all",
        desc: "Rok lipat bergaya high-waist dengan sabuk klip warna pop."
      },
      {
        id: 6,
        title: "Holographic Mini Bag",
        category: "accessories",
        price: 52.00,
        oldPrice: 70.00,
        image: "https://images.unsplash.com/photo-1584917865442-de89df76afd3?w=600&auto=format&fit=crop&q=80",
        badge: "LIMITED",
        tab: "trending",
        desc: "Tas selempang mini warna mengkilap metallic dengan rantai tebal."
      },
      {
        id: 7,
        title: "Happy Graphic Baby Tee",
        category: "tees",
        price: 38.00,
        oldPrice: 50.00,
        image: "https://images.unsplash.com/photo-1521572267360-ee0c2909d518?w=600&auto=format&fit=crop&q=80",
        badge: "BEST",
        tab: "new",
        desc: "Kaos potong baby tee dengan sablon timbul bergambar ceria."
      },
      {
        id: 8,
        title: "Neon Electric Rave Vest",
        category: "rave",
        price: 78.00,
        oldPrice: 99.00,
        image: "https://images.unsplash.com/photo-1508214751196-bcfd4ca60f91?w=600&auto=format&fit=crop&q=80",
        badge: "-20%",
        tab: "sale",
        desc: "Rompi taktis penuh warna neon khas festival musik rave."
      }
    ];

    let cart = [];
    let wishlist = [];
    let currentLang = 'ID';
    let selectedProductSize = 'M';
    let selectedProductColor = 'Vivid Pink';

    const i18nData = {
      ID: {
        tagline: "Pop Dopamine Store",
        nav_categories: "KATEGORI",
        nav_shop: "KATALOG",
        nav_lookbook: "LOOKBOOK",
        nav_sizeguide: "UKURAN",
        nav_howto: "CARA ORDER",
        nav_faq: "FAQ",
        btn_cart: "KERANJANG",
        hero_badge: "SS2026 // POP-DOPAMINE RAVE DROP",
        hero_desc: "Bosan dengan baju yang flat? Sambut fashion Gen-Z super ceria, colorful, dan playful! Ekspresikan vibe unik kamu dengan style Cyber-Y2K terlengkap!",
        hero_cta1: "BELANJA NOW!",
        hero_cta2: "MIX & MATCH FIT",
        stat1: "Original Gen-Z",
        stat2: "Happy Besties",
        stat3: "Top Rating",
        sale_voucher: "Gunakan Kode Voucher: POPVIBE20",
        cat_tag: "// KATEGORI",
        cat_title: "EXPLORE VIBE CATEGORIES 🌈",
        cat_subtitle: "Pilih kategori favorit kamu untuk memfilter produk!",
        shop_desc: "Klik pada produk untuk Quick View & rekomendasi ukuran!",
        lookbook_tag: "// INSPIRASI STYLE",
        lookbook_title: "MIX & MATCH LOOKBOOK ✨",
        lookbook_desc: "Klik titik hotspot interaktif pada gambar untuk beli langsung per item outfit!",
        size_tag: "📏 KALKULATOR SIZE",
        size_title: "CARI UKURAN OVERSIZED KAMU ✨",
        lbl_height: "TINGGI BADAN (CM)",
        lbl_weight: "BERAT BADAN (KG)",
        btn_calc: "HITUNG UKURAN IDEAL ⚡",
        size_rec_text: "Rekomendasi Ukuran Kamu:",
        size_fit_desc: "Memberikan potongan boxy & comfy khas Gen-Z!",
        order_title: "CARA BELANJA SUPER EASY 🚀",
        order_subtitle: "3 langkah gampang buat dapetin fit ter-kece kamu!",
        step1_title: "Pilih Fit & Quick Add",
        step1_desc: "Pilih baju favorit kamu, cek ukuran dengan kalkulator otomatis, lalu klik Add to Cart.",
        step2_title: "Checkout & WhatsApp Confirm",
        step2_desc: "Lakukan checkout instan di website atau konfirmasi pembayaran via WhatsApp admin.",
        step3_title: "Unbox & Flex Your Style",
        step3_desc: "Paket tiba dalam 48 jam! Unbox sticker eksklusif dan flex OOTD kamu di TikTok!",
        faq_title: "FREQUENTLY ASKED QUESTIONS 💬",
        faq1_q: "⚡ Apakah bahannya adem dan nyaman untuk dipakai harian?",
        faq1_a: "100%! Semua baju VIBESNATCH menggunakan bahan Heavy Cotton Combed 30s/24s & fleece tebal 330GSM yang tetap dingin dan menyerap keringat.",
        faq2_q: "📦 Berapa lama pengiriman pesanan saya?",
        faq2_a: "Pesanan diproses dalam 1x24 jam. Pengiriman reguler memakan waktu 2-3 hari kerja untuk Jabodetabek dan 3-5 hari untuk luar pulau.",
        faq3_q: "🔄 Apakah bisa tukar size jika kebesaran/kekecilan?",
        faq3_a: "Bisa banget! Garansi retur/penukaran size berlaku hingga 7 hari setelah barang diterima.",
        footer_desc: "Brand fashion Gen-Z terlengkap dengan konsep Pop-Dopamine dan Y2K streetwear yang penuh warna dan kebahagiaan!"
      },
      EN: {
        tagline: "Pop Dopamine Store",
        nav_categories: "CATEGORIES",
        nav_shop: "CATALOG",
        nav_lookbook: "LOOKBOOK",
        nav_sizeguide: "SIZE FIT",
        nav_howto: "HOW TO ORDER",
        nav_faq: "FAQ",
        btn_cart: "CART",
        hero_badge: "SS2026 // POP-DOPAMINE RAVE DROP",
        hero_desc: "Bored with plain clothes? Welcome to hyper-colorful, happy Gen-Z fashion! Express your vibe with our vibrant Cyber-Y2K streetwear collection!",
        hero_cta1: "SHOP NOW!",
        hero_cta2: "MIX & MATCH FIT",
        stat1: "Original Gen-Z",
        stat2: "Happy Besties",
        stat3: "Top Rating",
        sale_voucher: "Use Voucher Code: POPVIBE20",
        cat_tag: "// CATEGORIES",
        cat_title: "EXPLORE VIBE CATEGORIES 🌈",
        cat_subtitle: "Click any category below to filter products!",
        shop_desc: "Click any item for Quick View & fit recommendations!",
        lookbook_tag: "// STYLE INSPIRATION",
        lookbook_title: "MIX & MATCH LOOKBOOK ✨",
        lookbook_desc: "Click interactive hotspot pins to shop individual outfit pieces!",
        size_tag: "📏 SIZE CALCULATOR",
        size_title: "FIND YOUR PERFECT OVERSIZED FIT ✨",
        lbl_height: "HEIGHT (CM)",
        lbl_weight: "WEIGHT (KG)",
        btn_calc: "CALCULATE FIT ⚡",
        size_rec_text: "Recommended Size:",
        size_fit_desc: "Delivers that signature boxy Gen-Z drape!",
        order_title: "EASY SHOPPING TIMELINE 🚀",
        order_subtitle: "3 simple steps to unbox your dream streetwear fit!",
        step1_title: "Choose Fit & Quick Add",
        step1_desc: "Pick your favourite fits, verify size with our calculator, then click Add to Cart.",
        step2_title: "Checkout & Confirm",
        step2_desc: "Complete instant website checkout or confirm via WhatsApp admin.",
        step3_title: "Unbox & Flex Your Style",
        step3_desc: "Fast 48-hour delivery! Unbox exclusive free stickers and flex on TikTok!",
        faq_title: "FREQUENTLY ASKED QUESTIONS 💬",
        faq1_q: "⚡ Are the fabrics breathable for daily wear?",
        faq1_a: "100%! We use premium heavy 100% organic cotton (330GSM fleece) that remains super soft and cool.",
        faq2_q: "📦 How long does delivery take?",
        faq2_a: "Orders dispatch within 24 hours. Express local delivery takes 2-3 business days.",
        faq3_q: "🔄 Can I exchange sizing if it doesn't fit?",
        faq3_a: "Yes! We offer a hassle-free 7-day size exchange policy.",
        footer_desc: "Ultimate Gen-Z fashion brand delivering Pop-Dopamine & colorful Y2K streetwear happiness!"
      }
    };

    window.onload = function() {
      renderProducts(products);
      startCountdownTimer();
    };

    function showToast(msg) {
      const container = document.getElementById('toastContainer');
      const toast = document.createElement('div');
      toast.className = "bg-black text-white px-4 py-2.5 rounded-2xl border-2 border-goldenYellow font-fredoka text-xs font-bold shadow-pop-pink pointer-events-auto flex items-center gap-2 animate-bounce";
      toast.innerHTML = `<span>💖</span> <span>${msg}</span>`;
      container.appendChild(toast);
      setTimeout(() => toast.remove(), 2500);
    }

    function toggleLanguage() {
      currentLang = currentLang === 'ID' ? 'EN' : 'ID';
      document.getElementById('langFlag').innerText = currentLang === 'ID' ? '🇮🇩' : '🇬🇧';
      document.getElementById('langLabel').innerText = currentLang;

      document.querySelectorAll('[data-i18n]').forEach(el => {
        const key = el.getAttribute('data-i18n');
        if (i18nData[currentLang][key]) {
          el.innerText = i18nData[currentLang][key];
        }
      });
    }

    function renderProducts(items) {
      const grid = document.getElementById('productGrid');
      grid.innerHTML = '';

      if (items.length === 0) {
        grid.innerHTML = `<div class="col-span-full text-center py-10 font-fredoka font-bold text-black/60">No fits found matching your search!</div>`;
        return;
      }

      items.forEach(p => {
        const isWishlist = wishlist.includes(p.id);
        const card = document.createElement('div');
        card.className = "bg-white rounded-3xl p-4 border-3 border-black shadow-pop-pink hover:shadow-pop-yellow transition-all duration-300 group flex flex-col justify-between relative";

        card.innerHTML = `
          <div>
            <div class="relative overflow-hidden rounded-2xl aspect-[4/5] mb-3 border-2 border-black">
              <img src="${p.image}" alt="${p.title}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
              <span class="absolute top-2 left-2 bg-goldenYellow text-black font-fredoka font-black text-[10px] px-2.5 py-1 rounded-lg border border-black shadow-sm">
                ${p.badge}
              </span>
              <button onclick="toggleWishlist(${p.id}, event)" class="absolute top-2 right-2 w-8 h-8 rounded-full bg-white text-black border border-black flex items-center justify-center text-xs hover:text-vividPink transition">
                <i class="${isWishlist ? 'fa-solid text-vividPink' : 'fa-regular'} fa-heart"></i>
              </button>
            </div>

            <p class="text-[10px] text-vividPink font-bold font-mono uppercase">${p.category}</p>
            <h3 onclick="openProductModal(${p.id})" class="font-fredoka font-bold text-base text-black hover:text-vividPink cursor-pointer leading-snug mt-0.5">${p.title}</h3>
          </div>

          <div class="mt-4 pt-3 border-t-2 border-black/10 flex items-center justify-between">
            <div>
              <p class="font-fredoka font-black text-lg text-flameOrange">$${p.price.toFixed(2)}</p>
              <p class="text-[10px] text-black/40 font-bold line-through">$${p.oldPrice.toFixed(2)}</p>
            </div>
            
            <button onclick="addToCart(${p.id}, event)" class="px-3.5 py-2.5 bg-vividPink text-white rounded-xl font-fredoka font-bold text-xs hover:bg-goldenYellow hover:text-black border-2 border-black transition shadow-pop-black">
              + CART
            </button>
          </div>
        `;
        grid.appendChild(card);
      });
    }

    function filterCategory(cat) {
      const filtered = products.filter(p => p.category === cat);
      renderProducts(filtered.length ? filtered : products);
      showToast(`Filtering category: ${cat.toUpperCase()}`);
    }

    function filterTab(tab) {
      if (tab === 'all') renderProducts(products);
      else renderProducts(products.filter(p => p.tab === tab));
    }

    function filterProductsBySearch() {
      const q = document.getElementById('searchInput').value.toLowerCase();
      renderProducts(products.filter(p => p.title.toLowerCase().includes(q) || p.category.toLowerCase().includes(q)));
    }

    function openProductModal(id) {
      const p = products.find(x => x.id === id);
      if (!p) return;

      document.getElementById('modalImg').src = p.image;
      document.getElementById('modalTitle').innerText = p.title;
      document.getElementById('modalCategory').innerText = p.category;
      document.getElementById('modalPrice').innerText = `$${p.price.toFixed(2)}`;
      document.getElementById('modalOldPrice').innerText = `$${p.oldPrice.toFixed(2)}`;
      document.getElementById('modalBadge').innerText = p.badge;
      document.getElementById('modalDesc').innerText = p.desc;
      selectedProductSize = 'M';
      selectedProductColor = 'Vivid Pink';
      document.querySelectorAll('.variant-size').forEach(btn => {
        const active = btn.textContent.trim() === selectedProductSize;
        btn.classList.toggle('bg-vividPink', active);
        btn.classList.toggle('text-white', active);
        btn.classList.toggle('bg-pastelPink', !active);
      });
      document.querySelectorAll('.variant-color').forEach(btn => {
        btn.classList.toggle('ring-2', btn.getAttribute('aria-label') === selectedProductColor);
        btn.classList.toggle('ring-offset-2', btn.getAttribute('aria-label') === selectedProductColor);
      });

      document.getElementById('modalAddBtn').onclick = function() {
        addToCart(p.id, null, selectedProductSize, selectedProductColor);
        closeProductModal();
      };

      document.getElementById('productModal').classList.remove('hidden');
    }

    function closeProductModal() {
      document.getElementById('productModal').classList.add('hidden');
    }

    function selectProductSize(size, button) {
      selectedProductSize = size;
      document.querySelectorAll('.variant-size').forEach(btn => {
        const active = btn === button;
        btn.classList.toggle('bg-vividPink', active);
        btn.classList.toggle('text-white', active);
        btn.classList.toggle('bg-pastelPink', !active);
      });
    }

    function selectProductColor(color, button) {
      selectedProductColor = color;
      document.querySelectorAll('.variant-color').forEach(btn => {
        const active = btn === button;
        btn.classList.toggle('ring-2', active);
        btn.classList.toggle('ring-offset-2', active);
        btn.classList.toggle('ring-black', active);
      });
    }

    function addToCart(id, event, size = 'M', color = 'Vivid Pink') {
      if (event) event.stopPropagation();
      const item = products.find(p => p.id === id);
      const existing = cart.find(x => x.id === id && x.size === size && x.color === color);

      if (existing) {
        existing.qty += 1;
      } else {
        cart.push({ ...item, qty: 1, size, color });
      }

      updateCartUI();
      showToast(`Added "${item.title}" to Cart! 🎉`);
      toggleCartDrawer(true);
    }

    function updateCartUI() {
      const badge = document.getElementById('cartBadge');
      const container = document.getElementById('cartItemsContainer');
      const subtotalEl = document.getElementById('cartSubtotal');

      const totalQty = cart.reduce((acc, item) => acc + item.qty, 0);
      const subtotal = cart.reduce((acc, item) => acc + (item.price * item.qty), 0);

      badge.innerText = totalQty;
      subtotalEl.innerText = `$${subtotal.toFixed(2)}`;

      container.innerHTML = '';
      if (cart.length === 0) {
        container.innerHTML = `<p class="text-xs font-bold text-black/60 text-center py-8">Keranjang belanja kamu masih kosong!</p>`;
        return;
      }

      cart.forEach(item => {
        const div = document.createElement('div');
        div.className = "flex items-center justify-between bg-pastelPink/40 p-3 rounded-2xl border-2 border-black";
        div.innerHTML = `
          <div class="flex items-center gap-3">
            <img src="${item.image}" class="w-12 h-12 object-cover rounded-xl border border-black">
            <div>
              <p class="font-fredoka font-bold text-xs text-black">${item.title}</p>
              <p class="text-xs font-black text-vividPink">$${item.price.toFixed(2)} x ${item.qty}</p>
              <p class="text-[10px] font-bold text-black/60">Size: ${item.size || 'M'} · Color: ${item.color || 'Vivid Pink'}</p>
            </div>
          </div>
          <button onclick="removeFromCart(${item.id})" class="text-red-500 hover:text-black text-xs p-2 font-bold">
            <i class="fa-solid fa-trash"></i>
          </button>
        `;
        container.appendChild(div);
      });
    }

    function removeFromCart(id) {
      cart = cart.filter(x => x.id !== id);
      updateCartUI();
    }

    function toggleCartDrawer(open) {
      const drawer = document.getElementById('cartDrawer');
      if (open === true) drawer.classList.remove('translate-x-full');
      else drawer.classList.toggle('translate-x-full');
    }

    function toggleWishlist(id, event) {
      if (event) event.stopPropagation();
      if (wishlist.includes(id)) {
        wishlist = wishlist.filter(x => x !== id);
        showToast("Removed from Wishlist!");
      } else {
        wishlist.push(id);
        showToast("Saved to Wishlist! 💖");
      }
      document.getElementById('wishlistBadge').innerText = wishlist.length;
      renderProducts(products);
      updateWishlistUI();
    }

    function updateWishlistUI() {
      const container = document.getElementById('wishlistItemsContainer');
      container.innerHTML = '';

      if (wishlist.length === 0) {
        container.innerHTML = `<p class="text-xs font-bold text-black/60 text-center py-8">Belum ada item wishlist tersimpan!</p>`;
        return;
      }

      wishlist.forEach(id => {
        const item = products.find(p => p.id === id);
        if (!item) return;
        const div = document.createElement('div');
        div.className = "flex items-center justify-between bg-pastelYellow/40 p-3 rounded-2xl border-2 border-black";
        div.innerHTML = `
          <div class="flex items-center gap-3">
            <img src="${item.image}" class="w-12 h-12 object-cover rounded-xl border border-black">
            <div>
              <p class="font-fredoka font-bold text-xs text-black">${item.title}</p>
              <p class="text-xs font-black text-vividPink">$${item.price.toFixed(2)}</p>
            </div>
          </div>
          <button onclick="addToCart(${item.id})" class="px-3 py-1.5 bg-goldenYellow text-black text-xs font-fredoka font-bold rounded-lg border border-black">
            + CART
          </button>
        `;
        container.appendChild(div);
      });
    }

    function toggleWishlistDrawer() {
      document.getElementById('wishlistDrawer').classList.toggle('translate-x-full');
    }

    function calculateSize() {
      const h = parseFloat(document.getElementById('calcHeight').value);
      const w = parseFloat(document.getElementById('calcWeight').value);
      const resDiv = document.getElementById('sizeResult');
      const output = document.getElementById('sizeOutput');

      if (!h || !w) {
        alert("Please enter valid height and weight values!");
        return;
      }

      let rec = "OVERSIZED M";
      if (h > 175 || w > 75) rec = "OVERSIZED XL";
      else if (h > 165 || w > 60) rec = "OVERSIZED L";
      else if (h < 155 && w < 48) rec = "CROPPED S";

      output.innerText = rec;
      resDiv.classList.remove('hidden');
    }

    function startCountdownTimer() {
      let hours = 8, mins = 42, secs = 15;
      setInterval(() => {
        secs--;
        if (secs < 0) { secs = 59; mins--; }
        if (mins < 0) { mins = 59; hours--; }
        if (hours < 0) hours = 12;

        document.getElementById('cdHours').innerText = String(hours).padStart(2, '0');
        document.getElementById('cdMins').innerText = String(mins).padStart(2, '0');
        document.getElementById('cdSecs').innerText = String(secs).padStart(2, '0');
      }, 1000);
    }

    function toggleAccordion(id) {
      document.getElementById(id).classList.toggle('hidden');
    }

    function toggleMobileNav() {
      document.getElementById('mobileNav').classList.toggle('hidden');
    }

    function toggleWaDrawer() {
      document.getElementById('waDrawer').classList.toggle('hidden');
    }

    function toggleAiBot() {
      document.getElementById('aiBotDrawer').classList.toggle('hidden');
    }

    function handleAiMessage(e) {
      e.preventDefault();
      const input = document.getElementById('aiInput');
      const box = document.getElementById('aiChatBox');
      const val = input.value.trim();
      if (!val) return;

      const userMsg = document.createElement('div');
      userMsg.className = "bg-vividPink text-white p-2.5 rounded-xl ml-auto max-w-[85%] font-bold text-right border border-black";
      userMsg.innerText = val;
      box.appendChild(userMsg);

      input.value = '';
      box.scrollTop = box.scrollHeight;

      setTimeout(() => {
        const botMsg = document.createElement('div');
        botMsg.className = "bg-white p-2.5 rounded-xl border border-black max-w-[85%]";
        
        if (val.toLowerCase().includes('size') || val.toLowerCase().includes('ukuran')) {
          botMsg.innerText = "⚡ Pakai Widget Fit Calculator kami di bagian tengah halaman buat dapet rekomendasi akurat!";
        } else if (val.toLowerCase().includes('promo') || val.toLowerCase().includes('diskon')) {
          botMsg.innerText = "🔥 Gunakan kode voucher 'POPVIBE20' untuk diskon 20% ekstra saat checkout!";
        } else {
          botMsg.innerText = "✨ Coba cek koleksi 'Dopamine Acid Wash Hoodie' atau 'Matrix Chrome Goggles' di katalog kami!";
        }

        box.appendChild(botMsg);
        box.scrollTop = box.scrollHeight;
      }, 500);
    }

    function handleNewsletter(e) {
      e.preventDefault();
      alert("🎉 CONGRATS! Diskon $10 berhasil di klaim. Kode Voucher: POPVIBE20");
      document.getElementById('newsEmail').value = '';
    }

    // Ganti nomor contoh ini dengan nomor WhatsApp admin yang aktif (format internasional tanpa +).
    const whatsappAdmin = '628123456789';

    function formatProductPrice(value) {
      return `$${Number(value).toFixed(2)}`;
    }

    function checkoutMock() {
      if (!cart.length) {
        showToast("Keranjang belanja kamu masih kosong!");
        return;
      }
      const summary = document.getElementById('checkoutOrderSummary');
      const lines = cart.map(item =>
        `<div class="flex justify-between gap-3 py-1"><span>${item.title} × ${item.qty}</span><span>${formatProductPrice(item.price * item.qty)}</span></div>`
      ).join('');
      const subtotal = cart.reduce((sum, item) => sum + item.price * item.qty, 0);
      summary.innerHTML = `<p class="font-fredoka font-black text-sm mb-2">RINGKASAN PESANAN</p>${lines}<div class="border-t-2 border-black mt-2 pt-2 flex justify-between font-fredoka font-black"><span>Subtotal produk</span><span>${formatProductPrice(subtotal)}</span></div>`;
      document.getElementById('checkoutModal').classList.remove('hidden');
      document.getElementById('checkoutModal').classList.add('flex');
    }

    function closeCheckoutModal() {
      const modal = document.getElementById('checkoutModal');
      modal.classList.add('hidden');
      modal.classList.remove('flex');
    }

    function submitCheckoutToWhatsApp(event) {
      event.preventDefault();
      if (!cart.length) {
        closeCheckoutModal();
        showToast("Keranjang belanja kamu masih kosong!");
        return;
      }
      const form = document.getElementById('checkoutCustomerForm');
      if (!form.reportValidity()) return;
      const data = new FormData(form);
      const subtotal = cart.reduce((sum, item) => sum + item.price * item.qty, 0);
      const productLines = cart.map((item, index) =>
        `${index + 1}. ${item.title}\n   Ukuran: ${item.size || 'M'}\n   Warna: ${item.color || 'Vivid Pink'}\n   Jumlah: ${item.qty}\n   Harga satuan: ${formatProductPrice(item.price)}\n   Total: ${formatProductPrice(item.price * item.qty)}`
      ).join('\n\n');
      const message = [
        'HALO VIBESNATCH! SAYA INGIN KONFIRMASI PESANAN 🛍️',
        '',
        '=== DATA PEMESAN ===',
        `Nama: ${data.get('buyerName')}`,
        `WhatsApp: ${data.get('buyerPhone')}`,
        `Email: ${data.get('buyerEmail') || '-'}`,
        `Alamat: ${data.get('buyerAddress')}`,
        `Kota/Kabupaten: ${data.get('buyerCity')}`,
        `Metode pengiriman: ${data.get('buyerShipping')}`,
        `Catatan: ${data.get('buyerNotes') || '-'}`,
        '',
        '=== NOTA PESANAN ===',
        productLines,
        '',
        `SUBTOTAL PRODUK: ${formatProductPrice(subtotal)}`,
        'Ongkir dan total akhir mohon dikonfirmasi oleh admin.',
        '',
        'Mohon konfirmasi ketersediaan ukuran/warna, stok, promo, ongkir, dan total pembayaran sebelum saya melakukan pembayaran. Terima kasih!'
      ].join('\n');
      const url = `https://wa.me/${whatsappAdmin}?text=${encodeURIComponent(message)}`;
      // Open WhatsApp from the direct form-submit interaction.
      window.open(url, '_blank', 'noopener,noreferrer');
      closeCheckoutModal();
      showToast("Nota siap dikirim ke WhatsApp admin! 💬");
    }
