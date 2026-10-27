/* =========================================================================
   PureGlow — Skincare · Organic · Sage Green          WEBIA by D-KREASI
   File : public/js/website-bisnis/template/retail/organic/skincare-sage-green/skincare.js
   Vanilla JS (tanpa dependensi). Data produk datang dari window.SKINCARE
   yang dirakit layout dari config/template/.../skincare.php.
   Modul : util · header & nav · wishlist · cart · quick view · filter katalog
           · filter stok · form WhatsApp · AI FAQ chat · reveal
   ========================================================================= */
(() => {
    'use strict';

    const D = window.SKINCARE || {};
    const products = Array.isArray(D.products) ? D.products : [];
    const bySlug = Object.fromEntries(products.map((p) => [p.slug, p]));
    const categories = Object.fromEntries((D.categories || []).map((c) => [c.key, c.label]));
    const WA = (D.whatsapp && D.whatsapp.number) || '';
    const FREE_FROM = Number(D.freeFrom) || 0;
    const reduceMotion = window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches;

    /* ---------- util ---------- */
    const $ = (s, c = document) => c.querySelector(s);
    const $$ = (s, c = document) => Array.from(c.querySelectorAll(s));
    const rp = (n) => 'Rp ' + Number(n || 0).toLocaleString('id-ID');
    const esc = (s) => String(s).replace(/[&<>"']/g, (m) => ({ '&': '&amp;', '<': '&lt;', '>': '&gt;', '"': '&quot;', "'": '&#39;' }[m]));
    const waLink = (text) => `https://wa.me/${WA}?text=${encodeURIComponent(text)}`;
    const imgUrl = (p) => `${D.imgBase}/${p.image}`;
    const store = {
        get(k, d) { try { const v = JSON.parse(localStorage.getItem('pureglow:' + k)); return v == null ? d : v; } catch (e) { return d; } },
        set(k, v) { try { localStorage.setItem('pureglow:' + k, JSON.stringify(v)); } catch (e) { /* storage penuh / diblokir */ } },
    };
    const icon = (name) => `<svg class="ico" aria-hidden="true"><use href="#i-${name}"/></svg>`;
    const statusLabel = { tersedia: 'Stok Tersedia', terbatas: 'Stok Terbatas', habis: 'Stok Habis' };

    let lockCount = 0;
    const lock = () => { lockCount++; document.body.classList.add('is-locked'); };
    const unlock = () => { lockCount = Math.max(0, lockCount - 1); if (!lockCount) document.body.classList.remove('is-locked'); };

    function toast(message) {
        const wrap = $('[data-toast]');
        if (!wrap) return;
        const el = document.createElement('div');
        el.className = 'toast';
        el.innerHTML = `${icon('check')}<span>${esc(message)}</span>`;
        wrap.appendChild(el);
        setTimeout(() => { el.classList.add('is-out'); setTimeout(() => el.remove(), 320); }, 2600);
    }

    function trapFocus(container, e) {
        if (e.key !== 'Tab') return;
        const f = $$('a[href], button:not([disabled]), input, select, textarea, [tabindex]:not([tabindex="-1"])', container).filter((x) => x.offsetParent !== null);
        if (!f.length) return;
        const first = f[0], last = f[f.length - 1];
        if (e.shiftKey && document.activeElement === first) { e.preventDefault(); last.focus(); }
        else if (!e.shiftKey && document.activeElement === last) { e.preventDefault(); first.focus(); }
    }

    /* ---------- header & navigasi ---------- */
    const header = $('[data-header]');
    const nav = $('[data-nav]');
    const navToggle = $('[data-nav-toggle]');
    const navBackdrop = $('[data-nav-backdrop]');

    function onScroll() { if (header) header.classList.toggle('is-stuck', window.scrollY > 8); }
    window.addEventListener('scroll', onScroll, { passive: true });
    onScroll();

    function setNav(open) {
        if (!nav || !navToggle) return;
        const was = nav.classList.contains('is-open');
        if (was === open) return;
        nav.classList.toggle('is-open', open);
        document.body.classList.toggle('nav-open', open);
        navToggle.setAttribute('aria-expanded', String(open));
        navToggle.setAttribute('aria-label', open ? 'Tutup menu' : 'Buka menu');
        if (navBackdrop) navBackdrop.hidden = !open;
        open ? lock() : unlock();
    }
    window.addEventListener('resize', () => { if (window.innerWidth > 1180) setNav(false); });

    /* ---------- wishlist ---------- */
    let wish = store.get('wish', []).filter((s) => bySlug[s]);

    function syncWish() {
        $$('[data-wish]').forEach((b) => {
            const on = wish.includes(b.dataset.wish);
            b.setAttribute('aria-pressed', String(on));
        });
        $$('[data-wish-count]').forEach((c) => { c.textContent = wish.length; c.hidden = wish.length === 0; });
    }
    function toggleWish(slug) {
        const p = bySlug[slug];
        if (!p) return;
        if (wish.includes(slug)) { wish = wish.filter((s) => s !== slug); toast('Dihapus dari favorit'); }
        else { wish.push(slug); toast(`${p.name} disimpan ke favorit`); }
        store.set('wish', wish);
        syncWish();
        if (drawerMode === 'wish') renderDrawer();
    }

    /* ---------- cart ---------- */
    let cart = store.get('cart', {});
    Object.keys(cart).forEach((s) => { if (!bySlug[s] || bySlug[s].stock <= 0) delete cart[s]; });

    const cartCount = () => Object.values(cart).reduce((a, b) => a + b, 0);
    const cartSubtotal = () => Object.entries(cart).reduce((sum, [s, q]) => sum + bySlug[s].price * q, 0);

    function saveCart() {
        store.set('cart', cart);
        $$('[data-cart-count]').forEach((c) => { c.textContent = cartCount(); c.hidden = cartCount() === 0; });
        renderSummary();
        if (drawerMode === 'cart') renderDrawer();
    }
    function addToCart(slug, qty = 1, silent = false) {
        const p = bySlug[slug];
        if (!p || p.stock <= 0) return;
        const next = (cart[slug] || 0) + qty;
        if (next > p.stock) { toast(`Stok ${p.name} tersisa ${p.stock}`); return; }
        cart[slug] = next;
        saveCart();
        if (!silent) toast(`${p.name} masuk keranjang`);
    }
    function setQty(slug, delta) {
        const p = bySlug[slug];
        if (!p || !cart[slug]) return;
        const next = cart[slug] + delta;
        if (next <= 0) delete cart[slug];
        else if (next > p.stock) { toast(`Stok ${p.name} tersisa ${p.stock}`); return; }
        else cart[slug] = next;
        saveCart();
    }
    function removeFromCart(slug) { delete cart[slug]; saveCart(); }

    function shippingHTML(sub) {
        if (!FREE_FROM) return '';
        const left = Math.max(0, FREE_FROM - sub);
        const pct = Math.min(100, Math.round((sub / FREE_FROM) * 100));
        const msg = left > 0 ? `Belanja <strong>${rp(left)}</strong> lagi untuk gratis ongkir` : `${icon('check')} Selamat! Kamu dapat <strong>gratis ongkir</strong>`;
        return `<div class="ship"><div>${msg}</div><div class="meter"><span style="width:${pct}%"></span></div></div>`;
    }
    function lineHTML(p, qty) {
        return `<div class="cart-line">
            <img src="${esc(imgUrl(p))}" alt="" width="54" height="54">
            <div><h4>${esc(p.name)}</h4><small>${esc(p.size)} · ${rp(p.price)}</small>
                <div class="qty" role="group" aria-label="Jumlah ${esc(p.name)}">
                    <button type="button" data-qty="${p.slug}:-1" aria-label="Kurangi">${icon('minus')}</button>
                    <span aria-live="polite">${qty}</span>
                    <button type="button" data-qty="${p.slug}:1" aria-label="Tambah">${icon('plus')}</button>
                </div></div>
            <div class="cart-line__side">${rp(p.price * qty)}<br><button type="button" class="remove" data-remove="${p.slug}" aria-label="Hapus ${esc(p.name)}">${icon('trash')}</button></div>
        </div>`;
    }
    function totalsHTML(sub) {
        return `<div class="totals">
            <div><span>Subtotal</span><span>${rp(sub)}</span></div>
            <div><span>Ongkir</span><span>${FREE_FROM && sub >= FREE_FROM ? 'Gratis' : 'Dihitung admin'}</span></div>
            <div class="grand"><span>Total</span><span>${rp(sub)}</span></div></div>`;
    }
    function emptyHTML() {
        return `<div class="cart-empty">${icon('bag')}<p>Keranjangmu masih kosong.<br>Yuk pilih produk favoritmu!</p></div>`;
    }
    function checkout() {
        if (!cartCount()) return toast('Keranjang masih kosong');
        const lines = Object.entries(cart).map(([s, q], i) => `${i + 1}. ${bySlug[s].name} x${q} — ${rp(bySlug[s].price * q)}`);
        const sub = cartSubtotal();
        const msg = `Halo ${D.brand || 'PureGlow'}, saya ingin memesan:\n\n${lines.join('\n')}\n\nSubtotal: ${rp(sub)}\nOngkir: ${FREE_FROM && sub >= FREE_FROM ? 'Gratis' : 'mohon dihitungkan'}\n\nMohon info total & cara pembayarannya. Terima kasih!`;
        openExternal(waLink(msg));
    }
    function openExternal(url) {
        const w = window.open(url, '_blank', 'noopener');
        if (!w) window.location.href = url;
    }
    function renderSummary() {
        const box = $('[data-summary-body]');
        if (!box) return;
        const entries = Object.entries(cart);
        if (!entries.length) { box.innerHTML = emptyHTML(); return; }
        const sub = cartSubtotal();
        box.innerHTML = entries.map(([s, q]) => lineHTML(bySlug[s], q)).join('') + shippingHTML(sub) + totalsHTML(sub) +
            `<button type="button" class="btn btn--primary btn--block btn--lg" data-checkout style="margin-top:16px">${icon('whatsapp')} Checkout via WhatsApp</button>`;
    }

    /* ---------- drawer (keranjang / favorit) ---------- */
    const drawer = $('[data-drawer]');
    const scrim = $('[data-scrim]');
    let drawerMode = null;
    let lastFocus = null;

    function renderDrawer() {
        if (!drawer) return;
        const title = $('[data-drawer-title]', drawer), body = $('[data-drawer-body]', drawer), foot = $('[data-drawer-foot]', drawer);
        if (drawerMode === 'cart') {
            title.textContent = 'Keranjang';
            const entries = Object.entries(cart);
            if (!entries.length) {
                body.innerHTML = emptyHTML();
                foot.innerHTML = `<a class="btn btn--primary btn--block" href="${esc((D.routes || {}).shop || '#')}">Mulai Belanja</a>`;
            } else {
                const sub = cartSubtotal();
                body.innerHTML = entries.map(([s, q]) => lineHTML(bySlug[s], q)).join('') + shippingHTML(sub);
                foot.innerHTML = totalsHTML(sub) + `<button type="button" class="btn btn--primary btn--block btn--lg" data-checkout style="margin-top:14px">${icon('whatsapp')} Checkout via WhatsApp</button>`;
            }
        } else if (drawerMode === 'wish') {
            title.textContent = 'Produk Favorit';
            body.innerHTML = wish.length ? wish.map((s) => {
                const p = bySlug[s];
                return `<div class="cart-line"><img src="${esc(imgUrl(p))}" alt="" width="54" height="54">
                    <div><h4>${esc(p.name)}</h4><small>${rp(p.price)} · ${statusLabel[p.status]}</small></div>
                    <div class="cart-line__side">${p.stock > 0 ? `<button type="button" class="round-btn" data-add-cart="${p.slug}" aria-label="Tambah ke keranjang">${icon('bag')}</button>` : ''}<br>
                    <button type="button" class="remove" data-wish="${p.slug}" aria-label="Hapus dari favorit">${icon('trash')}</button></div></div>`;
            }).join('') : `<div class="cart-empty">${icon('heart')}<p>Belum ada produk favorit.<br>Ketuk ikon hati pada produk.</p></div>`;
            foot.innerHTML = '';
        }
        syncWish();
    }
    function openDrawer(mode) {
        if (!drawer) return;
        closeQV(); closeChat(); setNav(false);
        const wasOpen = !drawer.hidden;
        drawerMode = mode;
        renderDrawer();
        if (wasOpen) return;
        lastFocus = document.activeElement;
        drawer.hidden = false; scrim.hidden = false;
        lock();
        const closeBtn = $('[data-drawer-close]', drawer);
        if (closeBtn) closeBtn.focus();
    }
    function closeDrawer() {
        if (!drawer || drawer.hidden) return;
        drawer.hidden = true; scrim.hidden = true; drawerMode = null;
        unlock();
        if (lastFocus && lastFocus.focus) lastFocus.focus();
    }

    /* ---------- quick view ---------- */
    const qv = $('[data-qv]');
    const qvBox = $('[data-qv-box]');

    function openQV(slug) {
        const p = bySlug[slug];
        if (!qv || !p) return;
        closeDrawer(); closeChat();
        const off = p.discount > 0 ? `<span class="pill pill--sale">Hemat ${p.discount}%</span>` : '';
        qvBox.innerHTML = `<button type="button" class="icon-btn modal__close" data-qv-close aria-label="Tutup">${icon('x')}</button>
            <div class="qv">
                <div class="qv__media"><img src="${esc(imgUrl(p))}" alt="${esc(p.name)}" width="510" height="375"></div>
                <div class="qv__info">
                    <p class="qv__cat">${esc(categories[p.category] || p.category)}</p>
                    <h2 id="qv-title">${esc(p.name)}</h2>
                    <p class="qv__price"><strong>${rp(p.price)}</strong>${p.old_price ? `<del>${rp(p.old_price)}</del>` : ''} ${off}</p>
                    <div class="qv__meta">
                        <span class="rating">${icon('star')}${Number(p.rating).toFixed(1)} <small>(${esc(p.reviews)})</small></span>
                        <span>${esc(p.size)}</span>
                        <span class="stock stock--${p.status}"><i></i>${statusLabel[p.status]}${p.status === 'terbatas' ? ` (${p.stock})` : ''}</span>
                    </div>
                    <p class="qv__desc">${esc(p.desc)}</p>
                    <div class="qv__actions">
                        ${p.stock > 0
                            ? `<button type="button" class="btn btn--primary" data-add-cart="${p.slug}" data-qv-close>${icon('plus')} Keranjang</button>`
                            : `<a class="btn btn--soft" target="_blank" rel="noopener noreferrer" href="${esc(waLink(`Halo PureGlow, tolong kabari saya jika ${p.name} sudah tersedia kembali.`))}">${icon('bell')} Kabari Saya</a>`}
                        <a class="btn btn--soft" target="_blank" rel="noopener noreferrer" href="${esc(waLink(`Halo PureGlow, saya ingin bertanya tentang ${p.name}.`))}">${icon('whatsapp')} Tanya via WhatsApp</a>
                    </div>
                </div>
            </div>`;
        lastFocus = document.activeElement;
        qv.hidden = false;
        lock();
        qvBox.focus();
    }
    function closeQV() {
        if (!qv || qv.hidden) return;
        qv.hidden = true; qvBox.innerHTML = '';
        unlock();
        if (lastFocus && lastFocus.focus) lastFocus.focus();
    }

    /* ---------- filter katalog / harga / belanja ---------- */
    function initCatalog(root) {
        const grid = $('[data-catalog-grid]', root);
        if (!grid) return;
        const items = $$('[data-product-card]', grid);
        const holder = items.length ? items[0].parentNode : grid;
        items.forEach((el, i) => { el.dataset.idx = i; });
        const countEl = $('[data-catalog-count]', root);
        const emptyEl = $('[data-catalog-empty]', root);
        const searchEl = $('[data-catalog-search]', root);
        const sortEl = $('[data-catalog-sort]', root);
        const chips = $$('[data-filter-category]', root);
        const state = { cat: 'all', q: '', sort: 'default' };

        const params = new URLSearchParams(window.location.search);
        if (params.get('kategori') && chips.some((c) => c.dataset.filterCategory === params.get('kategori'))) state.cat = params.get('kategori');
        if (params.get('cari')) { state.q = params.get('cari').toLowerCase().trim(); if (searchEl) searchEl.value = params.get('cari'); }

        function apply() {
            let shown = 0;
            const order = items.slice().sort((a, b) => {
                if (state.sort === 'price-asc') return a.dataset.price - b.dataset.price;
                if (state.sort === 'price-desc') return b.dataset.price - a.dataset.price;
                if (state.sort === 'rating') return b.dataset.rating - a.dataset.rating;
                return a.dataset.idx - b.dataset.idx;
            });
            order.forEach((el) => {
                const ok = (state.cat === 'all' || el.dataset.category === state.cat) && (!state.q || el.dataset.name.includes(state.q));
                el.hidden = !ok;
                if (ok) shown++;
                holder.appendChild(el);
            });
            chips.forEach((c) => {
                const on = c.dataset.filterCategory === state.cat;
                c.classList.toggle('is-active', on);
                c.setAttribute('aria-pressed', String(on));
            });
            if (countEl) countEl.textContent = shown ? `Menampilkan ${shown} produk` : 'Tidak ada produk ditemukan';
            if (emptyEl) emptyEl.hidden = shown > 0;
        }
        chips.forEach((c) => c.addEventListener('click', () => { state.cat = c.dataset.filterCategory; apply(); }));
        if (searchEl) searchEl.addEventListener('input', () => { state.q = searchEl.value.toLowerCase().trim(); apply(); });
        if (sortEl) sortEl.addEventListener('change', () => { state.sort = sortEl.value; apply(); });
        apply();
        if (window.location.hash === '#cari' && searchEl) searchEl.focus({ preventScroll: false });
    }
    $$('[data-catalog]').forEach(initCatalog);

    /* ---------- filter stok ---------- */
    $$('[data-stock]').forEach((root) => {
        const items = $$('[data-stock-item]', root);
        const chips = $$('[data-filter-status]', root);
        const searchEl = $('[data-stock-search]', root);
        const countEl = $('[data-stock-count]', root);
        const emptyEl = $('[data-stock-empty]', root);
        if (!items.length || !chips.length) return;
        const state = { status: 'all', q: '' };
        function apply() {
            let shown = 0;
            items.forEach((el) => {
                const ok = (state.status === 'all' || el.dataset.status === state.status) && (!state.q || el.dataset.name.includes(state.q));
                el.hidden = !ok;
                if (ok) shown++;
            });
            chips.forEach((c) => { const on = c.dataset.filterStatus === state.status; c.classList.toggle('is-active', on); c.setAttribute('aria-pressed', String(on)); });
            if (countEl) countEl.textContent = shown ? `Menampilkan ${shown} produk` : 'Tidak ada produk ditemukan';
            if (emptyEl) emptyEl.hidden = shown > 0;
        }
        chips.forEach((c) => c.addEventListener('click', () => { state.status = c.dataset.filterStatus; apply(); }));
        if (searchEl) searchEl.addEventListener('input', () => { state.q = searchEl.value.toLowerCase().trim(); apply(); });
    });

    /* ---------- form → WhatsApp ---------- */
    $$('[data-wa-form]').forEach((form) => {
        const errEl = $('[data-form-error]', form) || (form.parentElement && $('[data-form-error]', form.parentElement));
        const showError = (msg) => { if (errEl) { errEl.textContent = msg; errEl.hidden = !msg; } };

        const pre = new URLSearchParams(window.location.search).get('produk');
        const sel = $('[data-product-select]', form);
        if (sel && pre && bySlug[pre]) sel.value = bySlug[pre].name;

        form.addEventListener('submit', (e) => {
            e.preventDefault();
            showError('');
            const fields = $$('input[name], select[name], textarea[name]', form);
            let bad = null;
            fields.forEach((f) => {
                f.classList.remove('is-invalid');
                const v = f.value.trim();
                let invalid = f.required && !v;
                if (!invalid && v && f.type === 'email') invalid = !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(v);
                if (!invalid && v && f.type === 'tel') invalid = v.replace(/\D/g, '').length < 8;
                if (invalid) { f.classList.add('is-invalid'); bad = bad || f; }
            });
            if (bad) {
                showError(bad.type === 'email' ? 'Format email belum benar.' : bad.type === 'tel' ? 'Nomor WhatsApp minimal 8 digit.' : 'Mohon lengkapi kolom yang wajib diisi.');
                bad.focus();
                return;
            }
            const subject = form.dataset.waSubject || 'Halo PureGlow,';
            const lines = fields.map((f) => {
                const v = f.value.trim();
                if (!v) return null;
                const label = f.dataset.label || (f.labels && f.labels[0] ? f.labels[0].textContent.trim() : f.name);
                return `${label}: ${v}`;
            }).filter(Boolean);
            openExternal(waLink(`${subject}\n\n${lines.join('\n')}`));
            toast('Membuka WhatsApp…');
            form.reset();
        });
        form.addEventListener('input', (e) => { if (e.target.classList) e.target.classList.remove('is-invalid'); });
    });

    /* ---------- AI Product FAQ ---------- */
    const chat = $('[data-chat]');
    const chatBody = $('[data-chat-body]');
    const chatForm = $('[data-chat-form]');
    const chatInput = chatForm ? $('input', chatForm) : null;
    const bubble = $('[data-ai-bubble]');
    const ai = D.ai || { faq: [], chips: [] };
    let greeted = false;

    const norm = (s) => s.toLowerCase().replace(/[^a-z0-9\s]/g, ' ').replace(/\s+/g, ' ').trim();

    function botSay(html, actions) {
        const el = document.createElement('div');
        el.className = 'msg msg--bot';
        el.innerHTML = html + (actions && actions.length ? `<div class="msg__actions">${actions.join('')}</div>` : '');
        chatBody.appendChild(el);
        chatBody.scrollTop = chatBody.scrollHeight;
    }
    function userSay(text) {
        const el = document.createElement('div');
        el.className = 'msg msg--user';
        el.textContent = text;
        chatBody.appendChild(el);
        chatBody.scrollTop = chatBody.scrollHeight;
    }
    const act = {
        link: (href, label, ic) => `<a href="${esc(href)}">${ic ? icon(ic) : ''}${esc(label)}</a>`,
        wa: (text, label = 'Tanya via WhatsApp') => `<a href="${esc(waLink(text))}" target="_blank" rel="noopener noreferrer">${icon('whatsapp')}${esc(label)}</a>`,
        add: (slug) => `<button type="button" data-add-cart="${slug}">${icon('plus')}Tambah ke keranjang</button>`,
        view: (slug) => `<button type="button" data-quickview="${slug}">${icon('eye')}Lihat detail</button>`,
    };

    function findProduct(q) {
        const hit = products.find((p) => q.includes(norm(p.name)));
        if (hit) return hit;
        // cocokkan nama tanpa kata umum (mis. "night repair", "gel cream", "toner")
        return products.find((p) => {
            const words = norm(p.name).split(' ').filter((w) => w.length > 3 && !['face', 'body', 'care', 'cream', 'serum', 'mask', 'pcs'].includes(w));
            return words.length && words.every((w) => q.includes(w));
        });
    }

    function answer(raw) {
        const q = norm(raw);
        const R = D.routes || {};

        const p = findProduct(q);
        if (p) {
            const tail = p.status === 'habis' ? 'Saat ini stok sedang <strong>habis</strong>.' : p.status === 'terbatas' ? `Stok <strong>terbatas</strong> (sisa ${p.stock}).` : 'Stok <strong>tersedia</strong>.';
            botSay(`<strong>${esc(p.name)}</strong> (${esc(p.size)}) — ${esc(p.tagline.toLowerCase())}.<br>Harga <strong>${rp(p.price)}</strong>${p.old_price ? ` <small>(normal ${rp(p.old_price)})</small>` : ''}. ${tail}`,
                [p.stock > 0 ? act.add(p.slug) : act.wa(`Halo PureGlow, tolong kabari saya jika ${p.name} sudah tersedia kembali.`, 'Kabari saya'), act.view(p.slug)]);
            return;
        }
        if (/^(hai|halo|hi|hello|pagi|siang|sore|malam)\b/.test(q) && q.split(' ').length <= 3) {
            botSay('Halo! Senang bertemu kamu. Mau tanya soal produk, cara pakai, atau stok? 😊');
            return;
        }
        if (/terima kasih|makasih|thanks|thank you/.test(q)) {
            botSay('Sama-sama! Kalau ada pertanyaan lain, aku siap bantu kapan saja. 🌿');
            return;
        }
        // FAQ dari config
        let best = null, bestScore = 0;
        (ai.faq || []).forEach((f) => {
            const score = f.keys.reduce((n, k) => n + (q.includes(norm(k)) ? 1 : 0), 0);
            if (score > bestScore) { best = f; bestScore = score; }
        });
        if (best) {
            const extra = [];
            if (/sensitif|kering|jerawat|berminyak|rekomendasi|rekomendasikan/.test(q)) extra.push(act.link(R.catalog || '#', 'Lihat katalog', 'arrow-right'));
            botSay(esc(best.a), extra);
            return;
        }
        if (/stok|stock|tersedia|ready|habis|restock/.test(q)) {
            botSay('Kamu bisa cek ketersediaan semua produk secara lengkap di halaman Stok. Produk yang habis bisa dipesan lewat pre-order.', [act.link(R.stock || '#', 'Cek stok', 'package'), act.wa('Halo PureGlow, saya ingin menanyakan ketersediaan stok.')]);
            return;
        }
        if (/harga|price|promo|diskon|murah|berapa/.test(q)) {
            const prices = products.map((x) => x.price);
            botSay(`Harga produk PureGlow mulai dari <strong>${rp(Math.min(...prices))}</strong> hingga <strong>${rp(Math.max(...prices))}</strong>, dengan banyak pilihan harga promo.`, [act.link(R.price || '#', 'Lihat daftar harga', 'tag')]);
            return;
        }
        if (/beli|pesan|order|checkout|keranjang/.test(q)) {
            botSay('Kamu bisa belanja lewat halaman Belanja: pilih produk, masukkan ke keranjang, lalu checkout otomatis ke WhatsApp admin.', [act.link(R.shop || '#', 'Mulai belanja', 'bag')]);
            return;
        }
        if (/produk|katalog|kategori|skincare|makeup|rambut|body|parfum|wangi/.test(q)) {
            botSay('Kami punya skincare, makeup, hair care, body care, fragrance, dan aksesoris. Lihat semuanya di katalog ya!', [act.link(R.catalog || '#', 'Buka katalog', 'arrow-right')]);
            return;
        }
        botSay(esc(ai.fallback || 'Maaf, aku belum punya jawaban untuk itu.'), [act.wa(`Halo PureGlow, saya ingin bertanya: ${raw}`), act.link(R.inquiry || '#', 'Kirim inquiry', 'message')]);
    }

    function ask(text) {
        const t = String(text || '').trim();
        if (!t) return;
        userSay(t);
        const typing = document.createElement('div');
        typing.className = 'typing';
        typing.setAttribute('aria-label', 'Sedang mengetik');
        typing.innerHTML = '<i></i><i></i><i></i>';
        chatBody.appendChild(typing);
        chatBody.scrollTop = chatBody.scrollHeight;
        setTimeout(() => { typing.remove(); answer(t); }, reduceMotion ? 50 : 650 + Math.random() * 400);
    }
    function openChat(question) {
        if (!chat) return;
        closeDrawer(); closeQV(); setNav(false);
        if (bubble) bubble.classList.remove('is-show');
        const wasHidden = chat.hidden;
        chat.hidden = false;
        if (!greeted) {
            greeted = true;
            botSay(esc(ai.greeting || 'Halo! Ada yang bisa aku bantu?'));
        }
        if (wasHidden) lastFocus = document.activeElement;
        if (question) ask(question);
        else if (chatInput) chatInput.focus();
    }
    function closeChat() {
        if (!chat || chat.hidden) return;
        chat.hidden = true;
        if (lastFocus && lastFocus.focus) lastFocus.focus();
    }
    if (chatForm) chatForm.addEventListener('submit', (e) => {
        e.preventDefault();
        const v = chatInput.value;
        chatInput.value = '';
        ask(v);
    });
    $$('[data-ai-inline]').forEach((f) => f.addEventListener('submit', (e) => {
        e.preventDefault();
        const input = $('input', f);
        const v = input.value.trim();
        input.value = '';
        openChat(v || undefined);
    }));
    if (bubble && !sessionStorage.getItem('pureglow:bubble')) {
        setTimeout(() => {
            if (chat && chat.hidden) { bubble.classList.add('is-show'); setTimeout(() => bubble.classList.remove('is-show'), 7000); }
            try { sessionStorage.setItem('pureglow:bubble', '1'); } catch (e) { /* abaikan */ }
        }, 4500);
    }

    /* ---------- event delegation global ---------- */
    document.addEventListener('click', (e) => {
        const t = e.target;
        const el = (sel) => t.closest(sel);
        let m;
        if ((m = el('[data-add-cart]'))) { addToCart(m.dataset.addCart); if (m.hasAttribute('data-qv-close')) closeQV(); return; }
        if ((m = el('[data-quickview]'))) { openQV(m.dataset.quickview); return; }
        if ((m = el('[data-wish]'))) { toggleWish(m.dataset.wish); return; }
        if (el('[data-wish-open]')) { openDrawer('wish'); return; }
        if (el('[data-cart-open]')) { openDrawer('cart'); return; }
        if ((m = el('[data-qty]'))) { const [s, d] = m.dataset.qty.split(':'); setQty(s, Number(d)); return; }
        if ((m = el('[data-remove]'))) { removeFromCart(m.dataset.remove); return; }
        if (el('[data-checkout]')) { checkout(); return; }
        if (el('[data-drawer-close]') || el('[data-scrim]')) { closeDrawer(); return; }
        if (el('[data-qv-close]')) { closeQV(); return; }
        if (qv && !qv.hidden && t === qv) { closeQV(); return; }
        if ((m = el('[data-ai-open]'))) { openChat(m.dataset.aiQuestion); return; }
        if (el('[data-ai-close]')) { closeChat(); return; }
        if ((m = el('[data-ai-ask]'))) { ask(m.dataset.aiAsk); return; }
        if (el('[data-nav-toggle]')) { setNav(!(nav && nav.classList.contains('is-open'))); return; }
        if (el('[data-nav-backdrop]')) { setNav(false); return; }
        if (nav && nav.classList.contains('is-open') && el('#site-nav a')) setNav(false);
    });

    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape') {
            if (qv && !qv.hidden) return closeQV();
            if (drawer && !drawer.hidden) return closeDrawer();
            if (chat && !chat.hidden) return closeChat();
            if (nav && nav.classList.contains('is-open')) return setNav(false);
        }
        if (qv && !qv.hidden) trapFocus(qv, e);
        else if (drawer && !drawer.hidden) trapFocus(drawer, e);
        else if (nav && nav.classList.contains('is-open')) trapFocus(nav, e);
    });

    /* ---------- reveal saat scroll ---------- */
    if (!reduceMotion && 'IntersectionObserver' in window) {
        const io = new IntersectionObserver((entries) => {
            entries.forEach((en) => { if (en.isIntersecting) { en.target.classList.add('is-visible'); io.unobserve(en.target); } });
        }, { threshold: 0.08, rootMargin: '0px 0px -40px 0px' });
        $$('.panel, .banner, .ai-panel, .features, .newsletter, .section__head, .stat-row, .table-wrap, .steps, .card-form, .inquiry__info, .cta-strip, .stock-grid, .pgrid--shopprev')
            .forEach((el) => { el.classList.add('reveal'); io.observe(el); });
    }

    /* ---------- init ---------- */
    syncWish();
    saveCart();
})();
