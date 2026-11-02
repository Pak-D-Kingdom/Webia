/* ==========================================================================
   GlowEra — Skincare E-Commerce · Premium Minimal · Warm Neutral
   WEBIA by D-KREASI · Vanilla JS, tanpa dependensi.
   Modul: utils · navbar · cart · filter · wa-form · ai-chat · float · reveal
   Konfigurasi dibaca dari window.SKIN (dirender oleh layouts/app.blade.php).
   ========================================================================== */
(function () {
    'use strict';

    var CFG = window.SKIN || { products: [], urls: {}, ai: { faq: [] }, whatsapp: '' };
    var $ = function (s, c) { return (c || document).querySelector(s); };
    var $$ = function (s, c) { return Array.prototype.slice.call((c || document).querySelectorAll(s)); };
    var rp = function (n) { return 'Rp ' + Math.round(n).toLocaleString('id-ID'); };
    var esc = function (s) { return String(s).replace(/[&<>"']/g, function (c) { return { '&': '&amp;', '<': '&lt;', '>': '&gt;', '"': '&quot;', "'": '&#39;' }[c]; }); };
    var product = function (id) { return CFG.products.filter(function (p) { return String(p.id) === String(id); })[0]; };
    var waUrl = function (text) { return 'https://wa.me/' + CFG.whatsapp + (text ? '?text=' + encodeURIComponent(text) : ''); };
    var reduceMotion = window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches;

    /* ---------- toast ---------- */
    var toastEl = $('[data-toast]'), toastTimer;
    function toast(msg, href, label) {
        if (!toastEl) return;
        toastEl.innerHTML = '<i class="bi bi-check-circle-fill"></i><span>' + esc(msg) + '</span>' + (href ? '<a href="' + href + '">' + esc(label || 'Lihat') + '</a>' : '');
        toastEl.hidden = false;
        requestAnimationFrame(function () { toastEl.classList.add('is-show'); });
        clearTimeout(toastTimer);
        toastTimer = setTimeout(function () { toastEl.classList.remove('is-show'); setTimeout(function () { toastEl.hidden = true; }, 300); }, 3200);
    }

    /* ---------- navbar ---------- */
    (function navbar() {
        var wrap = $('[data-navbar]'), nav = $('[data-nav]'), tog = $('[data-nav-toggle]'), back = $('[data-nav-backdrop]');
        var sBtn = $('[data-search-toggle]'), sForm = $('#navSearch');
        if (!wrap) return;

        function setDrawer(open) {
            nav.classList.toggle('is-open', open);
            tog.setAttribute('aria-expanded', open);
            tog.setAttribute('aria-label', open ? 'Tutup menu' : 'Buka menu');
            back.hidden = !open;
            document.body.style.overflow = open ? 'hidden' : '';
        }
        tog && tog.addEventListener('click', function () { setDrawer(!nav.classList.contains('is-open')); });
        back && back.addEventListener('click', function () { setDrawer(false); });
        nav.addEventListener('click', function (e) { if (e.target.closest('a[href]') || e.target.closest('[data-ai-open]')) setDrawer(false); });

        sBtn && sBtn.addEventListener('click', function () {
            var open = sForm.hidden;
            sForm.hidden = !open;
            sBtn.setAttribute('aria-expanded', open);
            if (open) $('input', sForm).focus();
        });

        document.addEventListener('keydown', function (e) {
            if (e.key !== 'Escape') return;
            setDrawer(false);
            if (sForm && !sForm.hidden) { sForm.hidden = true; sBtn.setAttribute('aria-expanded', 'false'); }
        });
        window.addEventListener('resize', function () { if (window.innerWidth > 991) setDrawer(false); });

        var onScroll = function () { wrap.classList.toggle('is-stuck', window.scrollY > 4); };
        window.addEventListener('scroll', onScroll, { passive: true }); onScroll();
    })();

    /* ---------- cart (localStorage; hanya menyimpan id & qty) ---------- */
    var KEY = 'glowera_cart_v1', memCart = [];
    var Cart = {
        get: function () {
            try { var d = JSON.parse(localStorage.getItem(KEY) || '[]'); return Array.isArray(d) ? d.filter(function (i) { return product(i.id); }) : []; }
            catch (e) { return memCart; }
        },
        save: function (items) {
            memCart = items;
            try { localStorage.setItem(KEY, JSON.stringify(items)); } catch (e) { /* storage penuh/diblokir */ }
            Cart.render();
        },
        add: function (id) {
            var p = product(id); if (!p || p.stock <= 0) return false;
            var items = Cart.get(), it = items.filter(function (i) { return String(i.id) === String(id); })[0];
            if (it) { if (it.qty >= p.stock) { toast('Stok ' + p.name + ' hanya tersisa ' + p.stock + ' unit.'); return false; } it.qty++; }
            else items.push({ id: p.id, qty: 1 });
            Cart.save(items); return true;
        },
        setQty: function (id, qty) {
            var p = product(id), items = Cart.get().map(function (i) { if (String(i.id) === String(id)) i.qty = Math.min(qty, p ? p.stock : qty); return i; }).filter(function (i) { return i.qty > 0; });
            Cart.save(items);
        },
        clear: function () { Cart.save([]); },
        lines: function () { return Cart.get().map(function (i) { var p = product(i.id); return { p: p, qty: i.qty, sum: p.price * i.qty }; }); },
        totals: function () { var l = Cart.lines(); return { qty: l.reduce(function (a, x) { return a + x.qty; }, 0), sub: l.reduce(function (a, x) { return a + x.sum; }, 0) }; },
        render: function () {
            var t = Cart.totals(), lines = Cart.lines();
            syncButtons();
            $$('[data-cart-count]').forEach(function (el) { el.textContent = t.qty; el.classList.add('is-bump'); setTimeout(function () { el.classList.remove('is-bump'); }, 250); });

            var mini = $('[data-cart-mini]');
            if (mini) {
                $('[data-cart-mini-count]', mini).textContent = t.qty + ' item';
                $('[data-cart-mini-total]', mini).textContent = rp(t.sub);
                $('[data-cart-mini-empty]', mini).hidden = lines.length > 0;
                $('[data-cart-mini-list]', mini).innerHTML = lines.slice(0, 3).map(function (l) {
                    return '<li><img src="' + esc(l.p.image) + '" alt="" width="48" height="48"><span>' + esc(l.p.name) + ' <small class="muted">×' + l.qty + '</small></span><b>' + rp(l.sum) + '</b></li>';
                }).join('');
            }

            var page = $('[data-cart-page]');
            if (page) {
                var list = $('[data-cart-list]', page);
                list.innerHTML = lines.map(function (l) {
                    return '<li class="cart-item" data-id="' + l.p.id + '"><img src="' + esc(l.p.image) + '" alt="' + esc(l.p.name) + '" width="76" height="76">' +
                        '<div><b>' + esc(l.p.name) + '</b><small>' + rp(l.p.price) + ' / unit</small></div>' +
                        '<div class="qty"><button type="button" data-dec aria-label="Kurangi">−</button><span>' + l.qty + '</span><button type="button" data-inc aria-label="Tambah">+</button></div>' +
                        '<strong class="cart-item__sum">' + rp(l.sum) + '</strong>' +
                        '<button type="button" class="cart-item__rm" data-rm aria-label="Hapus ' + esc(l.p.name) + '"><i class="bi bi-trash3"></i></button></li>';
                }).join('');
                var empty = lines.length === 0;
                $('[data-cart-empty]', page).hidden = !empty;
                $('[data-cart-checkout]', page).hidden = empty;
                $('[data-cart-clear]', page).hidden = empty;
                $('[data-cart-qty]', page).textContent = t.qty;
                $('[data-cart-subtotal]', page).textContent = rp(t.sub);
                $('[data-cart-total]', page).textContent = rp(t.sub);
                var free = CFG.freeShipping || 0, ok = t.sub >= free && t.sub > 0;
                $('[data-cart-ship]', page).textContent = empty ? '—' : (ok ? 'Gratis' : 'Dikonfirmasi admin');
                var note = $('[data-cart-ship-note]', page);
                $('p', note).textContent = empty ? 'Gratis ongkir untuk pembelian di atas ' + rp(free) + '.' : (ok ? 'Selamat! Pesananmu mendapat gratis ongkir.' : 'Belanja ' + rp(free - t.sub) + ' lagi untuk gratis ongkir.');
                $('.bar i', note).style.width = Math.min(100, free ? (t.sub / free) * 100 : 0) + '%';
                $$('[data-cart-submit]', page).forEach(function (b) { b.disabled = empty; });
            }
        }
    };

    /* Tombol "+ Keranjang" berubah menjadi stepper (− jumlah +) setelah produk masuk keranjang */
    function syncButtons() {
        var qtyOf = {};
        Cart.get().forEach(function (i) { qtyOf[String(i.id)] = i.qty; });
        $$('[data-add-cart]').forEach(function (btn) {
            var item = btn.closest('[data-item]'); if (!item) return;
            var ctl = btn.nextElementSibling && btn.nextElementSibling.hasAttribute('data-qty-ctl') ? btn.nextElementSibling : null;
            if (!ctl) {
                ctl = document.createElement('div');
                ctl.className = 'qty qty--inline'; ctl.setAttribute('data-qty-ctl', '');
                ctl.innerHTML = '<button type="button" data-card-dec aria-label="Kurangi jumlah">−</button><span aria-live="polite">0</span><button type="button" data-card-inc aria-label="Tambah jumlah">+</button>';
                btn.insertAdjacentElement('afterend', ctl);
            }
            var id = String(item.dataset.id), q = qtyOf[id] || 0, p = product(id);
            btn.hidden = q > 0; ctl.hidden = q <= 0;
            $('span', ctl).textContent = q;
            $('[data-card-inc]', ctl).disabled = !!p && q >= p.stock;
        });
    }

    document.addEventListener('click', function (e) {
        var step = e.target.closest('[data-card-inc], [data-card-dec]');
        if (step) {
            var holder = step.closest('[data-item]'); if (!holder) return;
            var pid = holder.dataset.id, cur = (Cart.get().filter(function (i) { return String(i.id) === String(pid); })[0] || {}).qty || 0;
            if (step.hasAttribute('data-card-inc')) Cart.add(pid); else Cart.setQty(pid, cur - 1);
            return;
        }
        var add = e.target.closest('[data-add-cart]');
        if (add) {
            var item = add.closest('[data-item]'); if (!item) return;
            var p = product(item.dataset.id);
            if (Cart.add(item.dataset.id) && p) toast(p.name + ' ditambahkan ke keranjang.', CFG.urls.cart, 'Lihat keranjang');
            return;
        }
        var row = e.target.closest('.cart-item'); if (!row) return;
        var id = row.dataset.id, cur = (Cart.get().filter(function (i) { return String(i.id) === id; })[0] || {}).qty || 0;
        if (e.target.closest('[data-inc]')) Cart.setQty(id, cur + 1);
        else if (e.target.closest('[data-dec]')) Cart.setQty(id, cur - 1);
        else if (e.target.closest('[data-rm]')) Cart.setQty(id, 0);
    });
    var clr = $('[data-cart-clear]'); clr && clr.addEventListener('click', function () { if (confirm('Kosongkan keranjang?')) Cart.clear(); });
    window.addEventListener('storage', function (e) { if (e.key === KEY) Cart.render(); });
    Cart.render();

    /* ---------- filter / sort / search (katalog, harga, ketersediaan) ---------- */
    $$('[data-filter-scope]').forEach(function (scope) {
        var list = $('[data-filter-list]', scope), items = $$('[data-item]', list);
        var qIn = $('[data-filter-q]', scope), sortSel = $('[data-filter-sort]', scope), stockChk = $('[data-filter-stock]', scope);
        var catCtl = $$('[data-filter-cat]', scope), statusCtl = $$('[data-filter-status]', scope);
        var count = $('[data-filter-count]', scope), empty = $('[data-filter-empty]', scope), reset = $('[data-filter-reset]', scope);
        var st = { q: '', cat: 'all', sort: 'order', stock: false, status: 'all' };

        var params = new URLSearchParams(location.search);
        if (params.get('q')) st.q = params.get('q').toLowerCase();
        if (params.get('kategori')) st.cat = params.get('kategori');

        function sync() {
            qIn && (qIn.value = st.q);
            sortSel && (sortSel.value = st.sort);
            stockChk && (stockChk.checked = st.stock);
            catCtl.forEach(function (c) { if (c.tagName === 'SELECT') c.value = st.cat; else c.classList.toggle('is-active', c.dataset.value === st.cat); });
            statusCtl.forEach(function (c) { c.classList.toggle('is-active', c.dataset.value === st.status); });
        }
        function apply() {
            var cmp = {
                'order': function (a, b) { return +a.dataset.order - +b.dataset.order; },
                'price-asc': function (a, b) { return +a.dataset.price - +b.dataset.price; },
                'price-desc': function (a, b) { return +b.dataset.price - +a.dataset.price; },
                'rating': function (a, b) { return +b.dataset.rating - +a.dataset.rating; }
            }[st.sort] || function () { return 0; };
            var shown = 0;
            items.slice().sort(cmp).forEach(function (el) {
                var d = el.dataset;
                var ok = (!st.q || (d.search || '').indexOf(st.q) > -1) && (st.cat === 'all' || d.category === st.cat) &&
                    (!st.stock || +d.stock > 0) && (st.status === 'all' || d.status === st.status);
                el.hidden = !ok; if (ok) shown++;
                list.appendChild(el);
            });
            count && (count.textContent = shown);
            empty && (empty.hidden = shown > 0);
            try {
                var u = new URL(location.href); st.q ? u.searchParams.set('q', st.q) : u.searchParams.delete('q'); st.cat !== 'all' ? u.searchParams.set('kategori', st.cat) : u.searchParams.delete('kategori');
                history.replaceState(null, '', u);
            } catch (e) { /* abaikan */ }
        }
        qIn && qIn.addEventListener('input', function () { st.q = qIn.value.trim().toLowerCase(); apply(); });
        sortSel && sortSel.addEventListener('change', function () { st.sort = sortSel.value; apply(); });
        stockChk && stockChk.addEventListener('change', function () { st.stock = stockChk.checked; apply(); });
        catCtl.forEach(function (c) { c.addEventListener(c.tagName === 'SELECT' ? 'change' : 'click', function () { st.cat = c.tagName === 'SELECT' ? c.value : c.dataset.value; sync(); apply(); }); });
        statusCtl.forEach(function (c) { c.addEventListener('click', function () { st.status = c.dataset.value; sync(); apply(); }); });
        reset && reset.addEventListener('click', function () { st = { q: '', cat: 'all', sort: 'order', stock: false, status: 'all' }; sync(); apply(); });
        sync(); apply();
    });

    /* ---------- form → WhatsApp ---------- */
    function fieldOf(el) { return el.closest('.field'); }
    function setError(el, msg) {
        var f = fieldOf(el); if (!f) return;
        f.classList.add('is-invalid');
        var e = $('.field__err', f); if (!e) { e = document.createElement('span'); e.className = 'field__err'; f.appendChild(e); }
        e.textContent = msg;
    }
    function clearError(el) { var f = fieldOf(el); if (!f) return; f.classList.remove('is-invalid'); var e = $('.field__err', f); e && e.remove(); }
    function validate(form) {
        var bad = null;
        $$('input, select, textarea', form).forEach(function (el) {
            var v = el.value.trim(), msg = '';
            if (el.required && !v) msg = 'Wajib diisi.';
            else if (v && el.dataset.type === 'phone' && !/^\+?[0-9\s\-()]{8,18}$/.test(v)) msg = 'Nomor tidak valid.';
            else if (v && (el.type === 'email' || el.dataset.type === 'email') && !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(v)) msg = 'Email tidak valid.';
            if (msg) { setError(el, msg); bad = bad || el; } else clearError(el);
        });
        return bad;
    }
    function formMsg(form, text, isErr) {
        var m = $('[data-form-msg]', form) || (form.parentElement && $('[data-form-msg]', form.parentElement));
        if (!m) return; m.textContent = text; m.hidden = false; m.classList.toggle('is-error', !!isErr);
    }
    $$('[data-wa-form]').forEach(function (form) {
        form.addEventListener('input', function (e) { clearError(e.target); });
        form.addEventListener('submit', function (e) {
            e.preventDefault();
            var bad = validate(form);
            if (bad) { bad.focus(); formMsg(form, 'Mohon lengkapi data yang ditandai.', true); return; }
            var lines = [form.dataset.waTitle || 'Halo ' + CFG.brand + ','];
            $$('[name]', form).forEach(function (el) { var v = el.value.trim(); if (v) lines.push((el.dataset.label || el.name) + ': ' + v); });
            if (form.hasAttribute('data-wa-cart')) {
                var cl = Cart.lines(); if (!cl.length) { formMsg(form, 'Keranjang masih kosong.', true); return; }
                lines.splice(1, 0, '');
                cl.forEach(function (l, i) { lines.splice(2 + i, 0, (i + 1) + '. ' + l.p.name + ' x' + l.qty + ' — ' + rp(l.sum)); });
                lines.splice(2 + cl.length, 0, 'Total: ' + rp(Cart.totals().sub), '');
            }
            var w = window.open(waUrl(lines.join('\n')), '_blank', 'noopener');
            if (!w) location.href = waUrl(lines.join('\n'));
            formMsg(form, 'Membuka WhatsApp… Silakan tekan kirim di WhatsApp untuk menyelesaikan.', false);
            if (!form.hasAttribute('data-wa-cart')) form.reset();
        });
    });

    /* ---------- prefill formulir dari preview beranda (?nama=&produk=&pesan=) ---------- */
    $$('[data-prefill]').forEach(function (form) {
        var qs = new URLSearchParams(location.search), filled = false;
        ['nama', 'produk', 'pesan'].forEach(function (k) {
            var v = qs.get(k), el = v && form.elements[k]; if (!el) return;
            if (el.tagName === 'SELECT') { var ok = Array.prototype.some.call(el.options, function (o) { return o.value === v || o.text === v; }); if (!ok) return; el.value = v; }
            else el.value = v.slice(0, 500);
            filled = true;
        });
        if (!filled) return;
        var first = Array.prototype.filter.call(form.elements, function (el) { return el.required && !el.value; })[0];
        var box = form.closest('#formulir') || form;
        setTimeout(function () { box.scrollIntoView({ behavior: reduceMotion ? 'auto' : 'smooth', block: 'start' }); first && first.focus({ preventScroll: true }); }, 250);
    });

    /* ---------- AI product FAQ ---------- */
    var norm = function (s) { return ' ' + s.toLowerCase().replace(/[^a-z0-9\s]/g, ' ').replace(/\s+/g, ' ').trim() + ' '; };
    var LABELS = { catalog: 'Lihat Katalog', cart: 'Buka Keranjang', stock: 'Cek Ketersediaan', price: 'Lihat Harga' };
    function stockText(p) { return p.stock <= 0 ? 'stok habis' : (p.stock <= 10 ? 'stok terbatas (sisa ' + p.stock + ')' : 'stok tersedia'); }
    function answer(raw) {
        var q = norm(raw), best = null, score = 0, hits = [];
        (CFG.ai.faq || []).forEach(function (f) {
            var s = 0; f.keys.forEach(function (k) { if (q.indexOf(' ' + k.toLowerCase() + ' ') > -1 || q.indexOf(k.toLowerCase()) > -1) s += k.split(' ').length; });
            if (s > score) { score = s; best = f; }
        });
        CFG.products.forEach(function (p) { if (q.indexOf(p.name.toLowerCase().replace(/[^a-z0-9\s]/g, ' ').replace(/\s+/g, ' ').trim()) > -1) hits.push(p); });
        var text = [], actions = [];
        if (hits.length) text.push(hits.map(function (p) { return p.name + ' — ' + rp(p.price) + ', ' + stockText(p) + '.'; }).join(' '));
        if (best) {
            text.push(best.a);
            if (best.link && CFG.urls[best.link]) actions.push({ label: LABELS[best.link], href: CFG.urls[best.link] });
        }
        if (!text.length) { text.push(CFG.ai.fallback); }
        if ((best && best.wa) || !best) actions.push({ label: 'Chat Admin via WhatsApp', href: waUrl('Halo ' + CFG.brand + ', saya ingin bertanya: ' + raw), blank: true });
        if (hits.length && !best) actions.unshift({ label: 'Lihat Katalog', href: CFG.urls.catalog });
        return { text: text.join(' '), actions: actions };
    }
    function bubble(log, cls, html) {
        var d = document.createElement('div'); d.className = 'msg ' + cls; d.innerHTML = html; log.appendChild(d);
        log.scrollTo ? log.scrollTo({ top: log.scrollHeight, behavior: reduceMotion ? 'auto' : 'smooth' }) : (log.scrollTop = log.scrollHeight);
        return d;
    }
    $$('[data-ai-chat]').forEach(function (box) {
        var log = $('[data-ai-log]', box), form = $('[data-ai-form]', box), input = $('input', form);
        function ask(q) {
            q = q.trim(); if (!q) return;
            bubble(log, 'msg--user', '<p>' + esc(q) + '</p>');
            var typing = bubble(log, 'msg--bot', '<p class="typing"><i></i><i></i><i></i></p>');
            var res = answer(q);
            setTimeout(function () {
                typing.innerHTML = '<p>' + esc(res.text) + '</p>' + (res.actions.length ? '<div class="msg__actions">' + res.actions.map(function (a) {
                    return '<a href="' + esc(a.href) + '"' + (a.blank ? ' target="_blank" rel="noopener"' : '') + '>' + esc(a.label) + '</a>';
                }).join('') + '</div>' : '');
                log.scrollTop = log.scrollHeight;
            }, reduceMotion ? 50 : Math.min(1300, 550 + res.text.length * 4));
        }
        form.addEventListener('submit', function (e) { e.preventDefault(); ask(input.value); input.value = ''; });
        $$('[data-ai-q]', box).forEach(function (b) { b.addEventListener('click', function () { ask(b.textContent); }); });
    });

    /* ---------- tombol AI melayang ---------- */
    (function floating() {
        var panel = $('#aiPanel'), pop = $('[data-ai-pop]'); if (!panel) return;
        var opener = null, seen = false;
        try { seen = sessionStorage.getItem('glowera_ai_seen') === '1'; } catch (e) { /* abaikan */ }
        function setOpen(open, from) {
            panel.hidden = !open;
            document.body.classList.toggle('ai-open', open);
            $$('.ai-fab').forEach(function (b) { b.setAttribute('aria-expanded', open); });
            if (open) {
                opener = from || opener; pop && pop.classList.remove('is-show');
                try { sessionStorage.setItem('glowera_ai_seen', '1'); seen = true; } catch (e) { /* abaikan */ }
                setTimeout(function () { $('input', panel).focus(); }, 60);
            } else if (opener) { opener.focus && opener.focus(); }
        }
        document.addEventListener('click', function (e) {
            var o = e.target.closest('[data-ai-open]');
            if (o) { e.preventDefault(); setOpen(panel.hidden || !o.classList.contains('ai-fab') ? true : false, o); return; }
            if (e.target.closest('[data-ai-close]')) setOpen(false);
        });
        document.addEventListener('keydown', function (e) { if (e.key === 'Escape' && !panel.hidden) setOpen(false); });
        function nudge() { if (seen || !panel.hidden || !pop) return; pop.classList.add('is-show'); setTimeout(function () { pop.classList.remove('is-show'); }, 5200); }
        setTimeout(nudge, 4000); setTimeout(nudge, 40000);
    })();

    /* ---------- reveal on scroll ---------- */
    (function reveal() {
        var els = $$('[data-reveal]'); if (!els.length) return;
        if (!('IntersectionObserver' in window) || reduceMotion) { els.forEach(function (el) { el.classList.add('is-in'); }); return; }
        var io = new IntersectionObserver(function (en) { en.forEach(function (x) { if (x.isIntersecting) { x.target.classList.add('is-in'); io.unobserve(x.target); } }); }, { threshold: 0.08, rootMargin: '0px 0px -40px 0px' });
        els.forEach(function (el) { io.observe(el); });
    })();
})();
