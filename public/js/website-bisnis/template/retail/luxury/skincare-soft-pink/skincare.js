/* ==========================================================================
   Belleza - Luxury Skincare (Soft Pink) - frontend statis
   Modul: util, nav, toast, cart, wishlist, filter, form WhatsApp, chat FAQ
   Data dari server: window.BELLEZA (lihat layouts/app.blade.php)
   ========================================================================== */
(function () {
    'use strict';

    var D = window.BELLEZA || {};
    var PRODUCTS = D.products || [];
    var BY_ID = {};
    PRODUCTS.forEach(function (p) { BY_ID[p.id] = p; });

    /* ---------- util ---------- */
    function $(s, c) { return (c || document).querySelector(s); }
    function $$(s, c) { return Array.prototype.slice.call((c || document).querySelectorAll(s)); }
    function rupiah(n) { return 'Rp ' + String(Math.round(n)).replace(/\B(?=(\d{3})+(?!\d))/g, '.'); }
    function esc(s) { return String(s).replace(/[&<>"']/g, function (c) { return { '&': '&amp;', '<': '&lt;', '>': '&gt;', '"': '&quot;', "'": '&#39;' }[c]; }); }
    function param(name) { try { return new URLSearchParams(location.search).get(name); } catch (e) { return null; } }
    var store = {
        get: function (k, d) { try { var v = localStorage.getItem(k); return v ? JSON.parse(v) : d; } catch (e) { return d; } },
        set: function (k, v) { try { localStorage.setItem(k, JSON.stringify(v)); } catch (e) { /* storage dinonaktifkan */ } }
    };
    function openWhatsApp(text) {
        var url = 'https://wa.me/' + D.whatsapp + '?text=' + encodeURIComponent(text);
        var w = window.open(url, '_blank', 'noopener');
        if (!w) { window.location.href = url; }
    }

    /* ---------- toast ---------- */
    var toastEl = $('[data-toast]'), toastTimer;
    function toast(msg) {
        if (!toastEl) { return; }
        toastEl.textContent = msg;
        toastEl.hidden = false;
        clearTimeout(toastTimer);
        toastTimer = setTimeout(function () { toastEl.hidden = true; }, 2600);
    }

    /* ---------- navbar ---------- */
    var menu = $('[data-nav-menu]'), burger = $('[data-nav-toggle]');
    function closeMenu() {
        if (!menu) { return; }
        menu.classList.remove('is-open');
        if (burger) { burger.setAttribute('aria-expanded', 'false'); }
    }
    if (burger && menu) {
        burger.addEventListener('click', function () {
            var open = menu.classList.toggle('is-open');
            burger.setAttribute('aria-expanded', String(open));
        });
    }
    document.addEventListener('click', function (e) {
        if (menu && burger && !e.target.closest('[data-nav-menu]') && !e.target.closest('[data-nav-toggle]')) { closeMenu(); }
    });

    /* ---------- cart ---------- */
    var cart = store.get('bz_cart', {});        // { productId: qty }
    var wish = store.get('bz_wish', []);        // [productId]
    var drawer = $('[data-drawer]'), overlay = $('[data-overlay]'), lastFocus;

    function cartLines() {
        return Object.keys(cart).map(function (id) {
            var p = BY_ID[id];
            return p ? { p: p, qty: cart[id] } : null;
        }).filter(Boolean);
    }
    function saveCart() { store.set('bz_cart', cart); renderCart(); }

    function addToCart(id) {
        var p = BY_ID[id];
        if (!p) { return; }
        if (p.stock <= 0) { toast(p.name + ' sedang habis.'); return; }
        var next = (cart[id] || 0) + 1;
        if (next > p.stock) { toast('Stok ' + p.name + ' tersisa ' + p.stock + ' unit.'); return; }
        cart[id] = next;
        saveCart();
        if (next === 1) { toast(p.name + ' ditambahkan ke keranjang.'); }
    }

    function renderCart() {
        var lines = cartLines(), count = 0, sub = 0;
        lines.forEach(function (l) { count += l.qty; sub += l.qty * l.p.price; });

        $$('[data-cart-count]').forEach(function (b) { b.textContent = count; b.hidden = count === 0; });
        $$('[data-cart-qty]').forEach(function (b) { b.textContent = count; });
        $$('[data-cart-total-text]').forEach(function (b) { b.textContent = rupiah(sub); });

        // tombol "+ Keranjang" <-> stepper jumlah di setiap kartu/baris/produk
        $$('[data-addctl]').forEach(function (ctl) {
            var id = ctl.getAttribute('data-addctl'), qty = cart[id] || 0, p = BY_ID[id];
            var addBtn = $('[data-add]', ctl), step = $('[data-stepper]', ctl);
            addBtn.hidden = qty > 0;
            step.hidden = qty === 0;
            $('[data-step-qty]', step).textContent = qty;
            var inc = $('[data-cart-inc]', step);
            if (inc && p) { inc.disabled = qty >= p.stock; }
        });

        var min = D.freeShipping || 0;
        var left = Math.max(0, min - sub);
        var pct = min ? Math.min(100, Math.round(sub / min * 100)) : 100;

        $$('[data-cart-panel]').forEach(function (panel) {
            var list = $('[data-cart-list]', panel);
            list.innerHTML = lines.map(function (l) {
                return '<li class="citem">' +
                    '<img src="' + esc(l.p.image) + '" alt="" width="64" height="64">' +
                    '<div><h4>' + esc(l.p.name) + '</h4><p class="citem__price">' + rupiah(l.p.price) + '</p>' +
                    '<div class="qty"><button type="button" data-cart-dec="' + l.p.id + '" aria-label="Kurangi jumlah ' + esc(l.p.name) + '">&minus;</button>' +
                    '<span aria-live="polite">' + l.qty + '</span>' +
                    '<button type="button" data-cart-inc="' + l.p.id + '" aria-label="Tambah jumlah ' + esc(l.p.name) + '"' + (l.qty >= l.p.stock ? ' disabled' : '') + '>+</button></div></div>' +
                    '<button type="button" class="citem__rm" data-cart-rm="' + l.p.id + '" aria-label="Hapus ' + esc(l.p.name) + '"><i class="bi bi-trash3" aria-hidden="true"></i></button></li>';
            }).join('');
            $('[data-cart-empty]', panel).hidden = lines.length > 0;
            $('[data-cart-foot]', panel).hidden = lines.length === 0;
            $('[data-cart-subtotal]', panel).textContent = rupiah(sub);
            $('[data-cart-ship-text]', panel).textContent = left === 0
                ? 'Selamat! Pesanan Anda mendapat gratis ongkir.'
                : 'Tambah ' + rupiah(left) + ' lagi untuk gratis ongkir.';
            $('[data-cart-ship-bar]', panel).style.width = pct + '%';
        });
    }

    function openDrawer() {
        if (!drawer) { return; }
        lastFocus = document.activeElement;
        overlay.hidden = false; drawer.hidden = false;
        requestAnimationFrame(function () { overlay.classList.add('is-open'); drawer.classList.add('is-open'); });
        document.body.style.overflow = 'hidden';
        var c = $('[data-drawer-close]', drawer); if (c) { c.focus(); }
    }
    function closeDrawer() {
        if (!drawer || drawer.hidden) { return; }
        overlay.classList.remove('is-open'); drawer.classList.remove('is-open');
        document.body.style.overflow = '';
        setTimeout(function () { overlay.hidden = true; drawer.hidden = true; }, 300);
        if (lastFocus && lastFocus.focus) { lastFocus.focus(); }
    }

    /* checkout -> WhatsApp */
    document.addEventListener('submit', function (e) {
        var form = e.target.closest('[data-checkout-form]');
        if (!form) { return; }
        e.preventDefault();
        var name = form.elements.name.value.trim(), addr = form.elements.address.value.trim();
        var err = $('[data-form-error]', form);
        [form.elements.name, form.elements.address].forEach(function (f) { f.classList.toggle('is-invalid', !f.value.trim()); });
        if (!name || !addr) { err.textContent = 'Nama dan alamat pengiriman wajib diisi.'; err.hidden = false; return; }
        err.hidden = true;
        var lines = cartLines(), sub = 0;
        var text = 'Halo ' + D.brand + ', saya ingin memesan:\n';
        lines.forEach(function (l, i) { sub += l.qty * l.p.price; text += (i + 1) + '. ' + l.p.name + ' x' + l.qty + ' - ' + rupiah(l.qty * l.p.price) + '\n'; });
        text += '\nSubtotal: ' + rupiah(sub) + '\nNama: ' + name + '\nAlamat: ' + addr + '\n\nMohon info total ongkir & cara pembayaran. Terima kasih.';
        openWhatsApp(text);
    });

    /* ---------- wishlist ---------- */
    function renderWish() {
        $$('[data-wish]').forEach(function (b) {
            var on = wish.indexOf(Number(b.getAttribute('data-wish'))) > -1;
            b.classList.toggle('is-on', on);
            b.setAttribute('aria-pressed', String(on));
            var i = $('i', b); if (i) { i.className = 'bi ' + (on ? 'bi-heart-fill' : 'bi-heart'); }
        });
        $$('[data-wish-count]').forEach(function (b) { b.textContent = wish.length; b.hidden = wish.length === 0; });
    }
    function toggleWish(id) {
        var i = wish.indexOf(id);
        if (i > -1) { wish.splice(i, 1); toast('Dihapus dari wishlist.'); } else { wish.push(id); toast('Disimpan ke wishlist.'); }
        store.set('bz_wish', wish);
        renderWish();
        scopes.forEach(function (s) { s.apply(); });
    }

    /* ---------- filter / sort / search ---------- */
    var scopes = [];
    $$('[data-filter-scope]').forEach(function (root) {
        var grid = $('[data-grid]', root);
        if (!grid) { return; }
        var items = $$('[data-item]', grid).map(function (el, i) { el._i = i; return el; });
        var qEl = $('[data-q]', root), sortEl = $('[data-sort]', root), countEl = $('[data-count]', root), emptyEl = $('[data-empty]', root);
        var st = { q: '', cat: 'all', status: 'all', sort: 'default', wish: false };

        var initCat = param('cat'); if (initCat) { st.cat = initCat; }
        var initQ = param('q'); if (initQ) { st.q = initQ.toLowerCase(); if (qEl) { qEl.value = initQ; } }
        if (param('wishlist') === '1') { st.wish = true; }
        if (param('focus') === 'search' && qEl) { setTimeout(function () { qEl.focus(); }, 150); }

        function setActive(sel, attr, val) {
            $$(sel, root).forEach(function (b) {
                var on = b.getAttribute(attr) === val;
                b.classList.toggle('is-active', on);
                b.setAttribute('aria-pressed', String(on));
            });
        }
        function apply() {
            var shown = 0;
            items.forEach(function (el) {
                var ok = (st.cat === 'all' || el.dataset.cat === st.cat) &&
                    (st.status === 'all' || el.dataset.status === st.status) &&
                    (!st.q || el.dataset.name.indexOf(st.q) > -1) &&
                    (!st.wish || wish.indexOf(Number(el.dataset.id)) > -1);
                el.hidden = !ok;
                if (ok) { shown++; }
            });
            var sorted = items.slice().sort(function (a, b) {
                if (st.sort === 'price-asc') { return a.dataset.price - b.dataset.price; }
                if (st.sort === 'price-desc') { return b.dataset.price - a.dataset.price; }
                if (st.sort === 'rating') { return b.dataset.rating - a.dataset.rating; }
                return a._i - b._i;
            });
            sorted.forEach(function (el) { grid.appendChild(el); });
            if (countEl) { countEl.textContent = (st.wish ? 'Wishlist: ' : '') + 'Menampilkan ' + shown + ' dari ' + items.length + ' produk'; }
            if (emptyEl) { emptyEl.hidden = shown > 0; }
            setActive('[data-cat-filter]', 'data-cat-filter', st.cat);
            setActive('[data-status-filter]', 'data-status-filter', st.status);
        }
        if (qEl) { qEl.addEventListener('input', function () { st.q = qEl.value.trim().toLowerCase(); apply(); }); }
        if (sortEl) { sortEl.addEventListener('change', function () { st.sort = sortEl.value; apply(); }); }
        root.addEventListener('click', function (e) {
            var c = e.target.closest('[data-cat-filter]'), s = e.target.closest('[data-status-filter]');
            if (c) { st.cat = c.getAttribute('data-cat-filter'); apply(); }
            if (s) { st.status = s.getAttribute('data-status-filter'); apply(); }
            if (e.target.closest('[data-reset]')) {
                st = { q: '', cat: 'all', status: 'all', sort: 'default', wish: false };
                if (qEl) { qEl.value = ''; } if (sortEl) { sortEl.value = 'default'; }
                apply();
            }
        });
        scopes.push({ apply: apply });
        apply();
    });

    /* ---------- inquiry -> WhatsApp ---------- */
    $$('[data-inquiry-form]').forEach(function (form) {
        var t = param('topic'), p = param('product'), n = param('name'), m = param('message');
        if (n && form.elements.name) { form.elements.name.value = n; }
        if (m && form.elements.message) { form.elements.message.value = m; }
        if (t && form.elements.topic) { form.elements.topic.value = t; }
        if (p && form.elements.product) { form.elements.product.value = p; }
        form.addEventListener('submit', function (e) {
            e.preventDefault();
            var f = form.elements, err = $('[data-form-error]', form), msgs = [];
            ['name', 'phone', 'message'].forEach(function (n) {
                if (!f[n]) { return; }
                var bad = !f[n].value.trim();
                if (n === 'phone' && !bad) { bad = f[n].value.replace(/\D/g, '').length < 8; }
                f[n].classList.toggle('is-invalid', bad);
                if (bad) { msgs.push(n === 'name' ? 'nama' : n === 'phone' ? 'nomor WhatsApp yang valid' : 'pesan'); }
            });
            if (msgs.length) { err.textContent = 'Mohon lengkapi ' + msgs.join(', ') + '.'; err.hidden = false; return; }
            err.hidden = true;
            var prodOpt = f.product && f.product.selectedOptions[0];
            var text = 'Halo ' + D.brand + ', saya ' + f.name.value.trim() + (f.phone ? ' (' + f.phone.value.trim() + ')' : '') + '.\n';
            if (f.topic) { text += 'Topik: ' + (D.topics[f.topic.value] || f.topic.value) + '\n'; }
            if (prodOpt && prodOpt.value) { text += 'Produk: ' + prodOpt.getAttribute('data-name') + '\n'; }
            text += '\n' + f.message.value.trim();
            openWhatsApp(text);
            toast('Membuka WhatsApp...');
        });
    });

    /* ---------- chat / AI product FAQ (aturan kata kunci, tanpa backend) ---------- */
    var R = D.routes || {};
    function link(href, label) { return '<a href="' + esc(href) + '">' + esc(label) + '</a>'; }
    function norm(s) { return s.toLowerCase().replace(/[^a-z0-9\s]/g, ' ').replace(/\s+/g, ' ').trim(); }

    function productAnswer(p) {
        var stok = p.stock <= 0 ? 'saat ini habis' : p.statusLabel.toLowerCase() + ' (' + p.stock + ' unit)';
        return '<strong>' + esc(p.name) + '</strong> (' + esc(p.size) + ') harganya ' + rupiah(p.price) + ', stok ' + stok + '. ' + esc(p.desc) +
            ' ' + link(R.catalog || '#', 'Lihat katalog');
    }
    function answer(q) {
        var n = norm(q), i, k;
        var faq = D.faq || [];
        for (i = 0; i < faq.length; i++) { if (norm(faq[i].q) === n) { return esc(faq[i].a); } }
        for (i = 0; i < PRODUCTS.length; i++) {
            var words = norm(PRODUCTS[i].name).split(' ');
            var hit = words.filter(function (w) { return w.length > 3 && n.indexOf(w) > -1; });
            if (hit.length && (hit.length >= 2 || ['serum', 'toner', 'moisturizer', 'sunscreen', 'lip', 'gift', 'routine'].indexOf(hit[0]) > -1)) {
                if (!/cara pakai|pakai|aturan/.test(n) || hit[0] !== 'serum') { return productAnswer(PRODUCTS[i]); }
            }
        }
        for (i = 0; i < faq.length; i++) {
            for (k = 0; k < faq[i].keywords.length; k++) { if (n.indexOf(faq[i].keywords[k]) > -1) { return esc(faq[i].a); } }
        }
        if (/harga|price|berapa|diskon|promo/.test(n)) { return 'Semua harga & diskon terbaru ada di ' + link(R.price, 'Daftar Harga') + '. Gratis ongkir untuk pembelian min. ' + rupiah(D.freeShipping) + '.'; }
        if (/stok|stock|ready|tersedia|habis/.test(n)) { return 'Cek ketersediaan produk real-time di ' + link(R.stock, 'halaman Stok') + '.'; }
        if (/ongkir|kirim|pengiriman|ekspedisi/.test(n)) { return 'Kami mengirim ke seluruh Indonesia. Gratis ongkir untuk pembelian min. ' + rupiah(D.freeShipping) + '.'; }
        if (/beli|pesan|order|checkout|keranjang/.test(n)) { return 'Anda bisa belanja lewat ' + link(R.shop, 'Toko Online'); }
        if (/admin|cs|whatsapp|wa|hubungi|kontak/.test(n)) { return 'Hubungi tim kami lewat ' + link('https://wa.me/' + D.whatsapp, 'WhatsApp') + ' atau isi ' + link(R.inquiry, 'form inquiry') + '.'; }
        return 'Maaf, saya belum menemukan jawaban yang pas. Coba pilih salah satu pertanyaan di bawah, atau tanyakan langsung ke tim kami lewat ' + link('https://wa.me/' + D.whatsapp, 'WhatsApp') + '.';
    }

    var chats = [];
    $$('[data-chat]').forEach(function (root) {
        var log = $('[data-chat-log]', root), form = $('[data-chat-form]', root), input = form.elements.q;
        function add(html, who) {
            var el = document.createElement('div');
            el.className = 'msg msg--' + who;
            if (who === 'user') { el.textContent = html; } else { el.innerHTML = html; }
            log.appendChild(el); log.scrollTop = log.scrollHeight;
            return el;
        }
        function ask(q) {
            add(q, 'user');
            var typing = document.createElement('div');
            typing.className = 'msg msg--bot msg--typing';
            typing.innerHTML = '<span></span><span></span><span></span>';
            log.appendChild(typing); log.scrollTop = log.scrollHeight;
            setTimeout(function () { typing.remove(); add(answer(q), 'bot'); }, 650);
        }
        form.addEventListener('submit', function (e) {
            e.preventDefault();
            var q = input.value.trim();
            if (!q) { return; }
            input.value = ''; ask(q);
        });
        root.addEventListener('click', function (e) {
            var c = e.target.closest('[data-chat-q]');
            if (c) { ask(c.getAttribute('data-chat-q')); }
        });
        chats.push({ root: root, add: add, input: input, log: log });
    });

    /* panel floating */
    var panel = $('[data-chat-panel]'), toggleBtn = $('[data-chat-toggle]'), tip = $('[data-chat-tip]'), greeted = false;
    function hideTip() { if (tip) { tip.hidden = true; } try { sessionStorage.setItem('bz_tip', '1'); } catch (e) { /* abaikan */ } }
    function openChat() {
        if (!panel) { return; }
        closeMenu(); hideTip();
        panel.hidden = false;
        toggleBtn.setAttribute('aria-expanded', 'true');
        var c = chats.filter(function (x) { return panel.contains(x.root); })[0];
        if (c && !greeted) { greeted = true; c.add('Halo! Saya asisten Belleza. Pilih pertanyaan di bawah atau tulis pertanyaan Anda tentang produk, stok, dan perawatan kulit.', 'bot'); }
        if (c) { setTimeout(function () { c.input.focus(); }, 50); }
    }
    function closeChat() {
        if (!panel || panel.hidden) { return; }
        panel.hidden = true;
        toggleBtn.setAttribute('aria-expanded', 'false');
        toggleBtn.focus();
    }
    if (tip) {
        var seen = false; try { seen = sessionStorage.getItem('bz_tip') === '1'; } catch (e) { /* abaikan */ }
        if (!seen) {
            setTimeout(function () { if (panel && panel.hidden) { tip.hidden = false; } }, 4000);
            setTimeout(hideTip, 15000);
        }
    }

    /* ---------- delegasi klik global ---------- */
    document.addEventListener('click', function (e) {
        var t;
        if ((t = e.target.closest('[data-add]'))) { addToCart(Number(t.getAttribute('data-add'))); return; }
        if ((t = e.target.closest('[data-wish]'))) { toggleWish(Number(t.getAttribute('data-wish'))); return; }
        if ((t = e.target.closest('[data-cart-inc]'))) {
            var id = t.getAttribute('data-cart-inc'), p = BY_ID[id];
            if (p && (cart[id] || 0) < p.stock) { cart[id] = (cart[id] || 0) + 1; saveCart(); } else if (p) { toast('Stok ' + p.name + ' tersisa ' + p.stock + ' unit.'); }
            return;
        }
        if ((t = e.target.closest('[data-cart-dec]'))) {
            var d = t.getAttribute('data-cart-dec');
            if (cart[d]) { cart[d]--; if (cart[d] <= 0) { delete cart[d]; } saveCart(); }
            return;
        }
        if ((t = e.target.closest('[data-cart-rm]'))) { delete cart[t.getAttribute('data-cart-rm')]; saveCart(); return; }
        if (e.target.closest('[data-cart-clear]')) { cart = {}; saveCart(); return; }
        if (e.target.closest('[data-cart-open]')) { openDrawer(); return; }
        if (e.target.closest('[data-drawer-close]') || e.target === overlay) { closeDrawer(); return; }
        if (e.target.closest('[data-open-chat]')) { openChat(); return; }
        if (e.target.closest('[data-chat-toggle]')) { if (panel.hidden) { openChat(); } else { closeChat(); } return; }
        if (e.target.closest('[data-chat-close]')) { closeChat(); return; }
        if (e.target.closest('[data-chat-tip-close]')) { hideTip(); return; }
    });
    document.addEventListener('keydown', function (e) {
        if (e.key !== 'Escape') { return; }
        closeDrawer(); closeChat(); closeMenu();
    });

    /* ---------- init ---------- */
    // buang item keranjang yang produknya sudah tidak ada / melebihi stok
    Object.keys(cart).forEach(function (id) {
        var p = BY_ID[id];
        if (!p || p.stock <= 0) { delete cart[id]; } else if (cart[id] > p.stock) { cart[id] = p.stock; }
    });
    renderCart();
    renderWish();
}());
