/* ==========================================================================
   Nur Rahmat Travel — Umrah & Haji · Classic · Emerald Green
   WEBIA by D-KREASI · JavaScript murni (tanpa dependensi).
   Seluruh fitur memeriksa keberadaan elemen dulu, sehingga aman di semua halaman.
   ========================================================================== */
(function () {
    'use strict';

    var doc = document;
    var root = doc.documentElement;
    var reduceMotion = window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches;
    var SVG_NS = 'http://www.w3.org/2000/svg';

    /* ---------- util ---------- */
    function $(sel, ctx) { return (ctx || doc).querySelector(sel); }
    function $$(sel, ctx) { return Array.prototype.slice.call((ctx || doc).querySelectorAll(sel)); }
    function on(el, ev, fn, opts) { if (el) { el.addEventListener(ev, fn, opts || false); } }
    function readJSON(id) {
        var el = doc.getElementById(id);
        if (!el) { return {}; }
        try { return JSON.parse(el.textContent || '{}') || {}; } catch (e) { return {}; }
    }
    function store(kind, key, value) {
        try {
            var s = kind === 'session' ? window.sessionStorage : window.localStorage;
            if (value === undefined) { return s.getItem(key); }
            s.setItem(key, value);
        } catch (e) { /* penyimpanan diblokir: abaikan */ }
        return null;
    }
    function norm(s) {
        return String(s || '').toLowerCase().normalize('NFD').replace(/[\u0300-\u036f]/g, '').replace(/[^a-z0-9\s]/g, ' ').replace(/\s+/g, ' ').trim();
    }
    function icon(name) {
        var svg = doc.createElementNS(SVG_NS, 'svg');
        svg.setAttribute('class', 'uh-i');
        svg.setAttribute('aria-hidden', 'true');
        var use = doc.createElementNS(SVG_NS, 'use');
        use.setAttribute('href', '#i-' + name);
        svg.appendChild(use);
        return svg;
    }

    /* indikator geser pada kontrol segmen (filter, tipe kamar, tab) */
    function placeThumb(group) {
        var thumb = $('.uh-seg__thumb', group);
        var act = $('.uh-seg__btn.is-active, .uh-tab.is-active', group);
        if (!thumb || !act) { return; }
        group.style.setProperty('--thumb-x', act.offsetLeft + 'px');
        group.style.setProperty('--thumb-w', act.offsetWidth + 'px');
        group.classList.add('has-thumb');
    }
    function refreshThumbs() { $$('.uh-seg, .uh-tabs__list').forEach(placeThumb); }

    var DATA = readJSON('uh-data');
    root.classList.add('uh-js');

    /* ---------- navbar: bayangan saat scroll + menu mobile ---------- */
    (function navbar() {
        var bar = $('[data-uh-navbar]');
        if (!bar) { return; }
        var burger = $('[data-uh-burger]', bar);

        function onScroll() { bar.classList.toggle('is-scrolled', window.scrollY > 8); }
        onScroll();
        on(window, 'scroll', onScroll, { passive: true });

        function setOpen(open) {
            bar.classList.toggle('is-open', open);
            if (burger) {
                burger.setAttribute('aria-expanded', open ? 'true' : 'false');
                burger.setAttribute('aria-label', open ? 'Tutup menu' : 'Buka menu');
            }
        }
        on(burger, 'click', function () { setOpen(!bar.classList.contains('is-open')); });
        $$('.uh-nav__link', bar).forEach(function (a) { on(a, 'click', function () { setOpen(false); }); });
        on(doc, 'keydown', function (e) { if (e.key === 'Escape') { setOpen(false); } });
        on(doc, 'click', function (e) { if (bar.classList.contains('is-open') && !bar.contains(e.target)) { setOpen(false); } });
        on(window, 'resize', function () { if (window.innerWidth > 1179) { setOpen(false); } });
    })();

    /* ---------- dropdown bahasa ---------- */
    (function lang() {
        var wrap = $('[data-uh-lang]');
        if (!wrap) { return; }
        var btn = $('.uh-lang__btn', wrap);
        var menu = $('.uh-lang__menu', wrap);
        function set(open) { menu.hidden = !open; btn.setAttribute('aria-expanded', open ? 'true' : 'false'); }
        on(btn, 'click', function (e) { e.stopPropagation(); set(menu.hidden); });
        on(doc, 'click', function (e) { if (!wrap.contains(e.target)) { set(false); } });
        on(doc, 'keydown', function (e) { if (e.key === 'Escape') { set(false); } });
        $$('button:not([disabled])', menu).forEach(function (b) { on(b, 'click', function () { set(false); }); });
    })();

    /* ---------- pencarian: palet perintah (akses cepat, riwayat, tab hasil, sorotan, keyboard) ---------- */
    (function search() {
        var box = $('[data-uh-search]');
        if (!box) { return; }
        var input = $('[data-uh-search-input]', box);
        var list = $('[data-uh-search-results]', box);
        var form = $('[data-uh-search-form]', box);
        var home = $('[data-uh-search-home]', box);
        var tabsEl = $('[data-uh-search-tabs]', box);
        var clearBtn = $('[data-uh-search-clear]', box);
        var recentWrap = $('[data-uh-search-recent-wrap]', box);
        var recentList = $('[data-uh-search-recent]', box);
        var index = Array.isArray(DATA.search) ? DATA.search : [];
        var RKEY = 'uh-recent-v1';
        var lastFocus = null, rows = [], active = -1, tab = 'all';

        function loadRecent() { try { return JSON.parse(store('local', RKEY) || '[]') || []; } catch (e) { return []; } }
        function saveRecent(it) {
            var arr = loadRecent().filter(function (r) { return r.url !== it.url; });
            arr.unshift({ label: it.label, url: it.url, icon: it.icon || 'file', text: it.text || '' });
            store('local', RKEY, JSON.stringify(arr.slice(0, 5)));
        }
        function renderRecent() {
            var arr = loadRecent();
            recentList.innerHTML = '';
            recentWrap.hidden = !arr.length;
            arr.forEach(function (r) {
                var li = doc.createElement('li');
                var a = doc.createElement('a');
                a.href = r.url;
                a.appendChild(icon('clock'));
                var t = doc.createElement('span');
                t.textContent = r.label;
                a.appendChild(t);
                li.appendChild(a);
                recentList.appendChild(li);
            });
        }
        function highlight(el, text, q) {
            var i = q ? text.toLowerCase().indexOf(q.toLowerCase()) : -1;
            if (i < 0) { el.textContent = text; return; }
            el.appendChild(doc.createTextNode(text.slice(0, i)));
            var m = doc.createElement('mark');
            m.textContent = text.slice(i, i + q.length);
            el.appendChild(m);
            el.appendChild(doc.createTextNode(text.slice(i + q.length)));
        }
        function setActive(n) {
            if (!rows.length) { active = -1; input.removeAttribute('aria-activedescendant'); return; }
            active = (n + rows.length) % rows.length;
            rows.forEach(function (r, i) {
                r.li.classList.toggle('is-active', i === active);
                r.li.setAttribute('aria-selected', i === active ? 'true' : 'false');
            });
            input.setAttribute('aria-activedescendant', rows[active].li.id);
            rows[active].li.scrollIntoView({ block: 'nearest' });
        }
        function showHome(show) {
            home.hidden = !show;
            list.hidden = show;
            tabsEl.hidden = show;
        }
        function render(q) {
            var raw = q.trim();
            var n = norm(raw);
            clearBtn.hidden = !raw;
            if (!n) { rows = []; showHome(true); renderRecent(); setActive(-1); return; }
            showHome(false);

            var hits = index.filter(function (it) { return tab === 'all' || it.group === tab; }).map(function (it) {
                var hay = norm(it.label + ' ' + (it.text || '') + ' ' + (it.keys || ''));
                var score = norm(it.label).indexOf(n) !== -1 ? 3 : (hay.indexOf(n) !== -1 ? 1 : 0);
                return { it: it, score: score };
            }).filter(function (h) { return h.score > 0; });
            hits.sort(function (a, b) { return b.score - a.score; });
            hits = hits.slice(0, 9);

            list.innerHTML = '';
            rows = [];
            if (!hits.length) {
                var empty = doc.createElement('li');
                empty.className = 'uh-search__empty';
                var img = doc.createElement('span');
                img.className = 'uh-search__emptyico';
                img.appendChild(icon('search'));
                var t = doc.createElement('p');
                t.textContent = 'Tidak ada hasil untuk “' + raw + '”';
                var sub = doc.createElement('small');
                sub.textContent = 'Coba kata kunci lain, atau tanyakan langsung ke tim kami.';
                var acts = doc.createElement('div');
                var wa = doc.createElement('a');
                wa.className = 'uh-msg__link';
                wa.href = DATA.wa || '#'; wa.target = '_blank'; wa.rel = 'noopener noreferrer';
                var ws = doc.createElement('span'); ws.textContent = 'Tanya via WhatsApp';
                wa.appendChild(ws); wa.appendChild(icon('whatsapp'));
                acts.appendChild(wa);
                empty.appendChild(img); empty.appendChild(t); empty.appendChild(sub); empty.appendChild(acts);
                list.appendChild(empty);
                setActive(-1);
                return;
            }
            hits.forEach(function (h, i) {
                var li = doc.createElement('li');
                li.id = 'uh-so-' + i;
                li.style.setProperty('--i', i);
                li.setAttribute('role', 'option');
                li.setAttribute('aria-selected', 'false');
                var a = doc.createElement('a');
                a.href = h.it.url;
                var ico = doc.createElement('span');
                ico.className = 'uh-search__ico';
                ico.appendChild(icon(h.it.icon || 'file'));
                var txt = doc.createElement('span');
                txt.className = 'uh-search__txt';
                var strong = doc.createElement('strong');
                highlight(strong, h.it.label, raw);
                var small = doc.createElement('small');
                small.textContent = h.it.text || '';
                txt.appendChild(strong); txt.appendChild(small);
                var badge = doc.createElement('span');
                badge.className = 'uh-search__badge';
                badge.textContent = h.it.group || 'Hasil';
                a.appendChild(ico); a.appendChild(txt); a.appendChild(badge); a.appendChild(icon('chevron-right'));
                on(a, 'click', function () { saveRecent(h.it); });
                li.appendChild(a);
                on(li, 'mouseenter', function () { setActive(i); });
                list.appendChild(li);
                rows.push({ li: li, url: h.it.url, it: h.it });
            });
            setActive(0);
        }
        function open() {
            lastFocus = doc.activeElement;
            box.hidden = false;
            doc.body.style.overflow = 'hidden';
            input.value = '';
            tab = 'all';
            $$('[data-uh-search-tab]', box).forEach(function (b) {
                var on_ = b.getAttribute('data-uh-search-tab') === 'all';
                b.classList.toggle('is-active', on_);
                b.setAttribute('aria-selected', on_ ? 'true' : 'false');
            });
            render('');
            window.setTimeout(function () { input.focus(); }, 40);
        }
        function close() {
            if (box.hidden) { return; }
            box.hidden = true;
            doc.body.style.overflow = '';
            if (lastFocus && lastFocus.focus) { lastFocus.focus(); }
        }
        $$('[data-uh-search-open]').forEach(function (b) { on(b, 'click', open); });
        $$('[data-uh-search-close]', box).forEach(function (b) { on(b, 'click', close); });
        $$('[data-uh-search-term]', box).forEach(function (b) {
            on(b, 'click', function () { input.value = b.getAttribute('data-uh-search-term'); render(input.value); input.focus(); });
        });
        $$('[data-uh-search-tab]', box).forEach(function (b) {
            on(b, 'click', function () {
                tab = b.getAttribute('data-uh-search-tab');
                $$('[data-uh-search-tab]', box).forEach(function (x) {
                    var a_ = x === b;
                    x.classList.toggle('is-active', a_);
                    x.setAttribute('aria-selected', a_ ? 'true' : 'false');
                });
                render(input.value);
                input.focus();
            });
        });
        function resetTab() {
            tab = 'all';
            $$('[data-uh-search-tab]', box).forEach(function (b) {
                var a_ = b.getAttribute('data-uh-search-tab') === 'all';
                b.classList.toggle('is-active', a_);
                b.setAttribute('aria-selected', a_ ? 'true' : 'false');
            });
        }
        on(clearBtn, 'click', function () { input.value = ''; resetTab(); render(''); input.focus(); });
        on($('[data-uh-search-wipe]', box), 'click', function () { store('local', RKEY, '[]'); renderRecent(); });
        on(input, 'input', function () { render(input.value); });
        on(input, 'keydown', function (e) {
            if (e.key === 'ArrowDown') { e.preventDefault(); setActive(active + 1); }
            else if (e.key === 'ArrowUp') { e.preventDefault(); setActive(active - 1); }
        });
        on(form, 'submit', function (e) {
            e.preventDefault();
            var r = rows[active >= 0 ? active : 0];
            if (r) { saveRecent(r.it); window.location.href = r.url; }
        });
        on(doc, 'keydown', function (e) {
            if (e.key === 'Escape') { close(); return; }
            var tag = (doc.activeElement && doc.activeElement.tagName) || '';
            var typing = /INPUT|TEXTAREA|SELECT/.test(tag) || (doc.activeElement && doc.activeElement.isContentEditable);
            if (box.hidden && ((e.key === '/' && !typing) || ((e.ctrlKey || e.metaKey) && e.key.toLowerCase() === 'k'))) {
                e.preventDefault();
                open();
            }
        });
    })();

    /* ---------- slider testimoni ---------- */
    $$('[data-uh-slider]').forEach(function (slider) {
        var slides = $$('[data-uh-slide]', slider);
        if (slides.length < 2) {
            $$('[data-uh-prev],[data-uh-next]', slider).forEach(function (b) { b.hidden = true; });
            return;
        }
        var i = 0, timer = null;
        function show(n) {
            slides[i].classList.remove('is-active');
            i = (n + slides.length) % slides.length;
            slides[i].classList.add('is-active');
        }
        function play() {
            if (reduceMotion) { return; }
            stop();
            timer = window.setInterval(function () { show(i + 1); }, 6500);
        }
        function stop() { if (timer) { window.clearInterval(timer); timer = null; } }
        on($('[data-uh-prev]', slider), 'click', function () { show(i - 1); play(); });
        on($('[data-uh-next]', slider), 'click', function () { show(i + 1); play(); });
        on(slider, 'mouseenter', stop);
        on(slider, 'mouseleave', play);
        on(slider, 'focusin', stop);
        on(slider, 'focusout', play);
        play();
    });

    /* ---------- reveal saat scroll ---------- */
    (function reveal() {
        var targets = $$('.uh-card, .uh-banner, .uh-arch, .uh-pkcard, .uh-pricecard, .uh-stay, .uh-block, .uh-gcard, .uh-tscard, .uh-timeline__item, .uh-chatwin, .uh-chataside__card, .uh-sch, .uh-feature, .uh-pass, .uh-compare, .uh-tssum, .uh-regform, .uh-legend');
        if (!targets.length) { return; }
        if (reduceMotion || !('IntersectionObserver' in window)) { return; }
        targets.forEach(function (el, idx) {
            el.setAttribute('data-uh-reveal', '');
            el.style.setProperty('--uh-d', (idx % 4) * 70 + 'ms');
        });
        var io = new IntersectionObserver(function (entries) {
            entries.forEach(function (en) {
                if (en.isIntersecting) { en.target.classList.add('is-in'); io.unobserve(en.target); }
            });
        }, { rootMargin: '0px 0px -6% 0px', threshold: 0.06 });
        targets.forEach(function (el) { io.observe(el); });
        // jaring pengaman: tampilkan semua jika observer tidak sempat berjalan
        window.setTimeout(function () { targets.forEach(function (el) { el.classList.add('is-in'); }); }, 2500);
    })();

    /* ---------- filter (paket & jadwal): jumlah per kategori, penghitung hasil, indikator geser ---------- */
    (function filters() {
        var groups = {};
        $$('[data-uh-filter]').forEach(function (g) { groups[g.getAttribute('data-uh-filter')] = g; });
        Object.keys(groups).forEach(function (name) {
            var group = groups[name];
            var list = $('[data-uh-filter-list="' + name + '"]');
            if (!list) { return; }
            var items = $$('[data-type]', list);
            var scope = list.closest('.uh-container') || doc;
            var empty = $('[data-uh-empty]', scope);
            var month = $('[data-uh-month]', scope);
            var shownEl = $('[data-uh-shown]', scope);
            var state = { type: 'all', month: 'all' };

            var counts = { all: items.length };
            items.forEach(function (it) { var t = it.getAttribute('data-type'); counts[t] = (counts[t] || 0) + 1; });
            $$('[data-uh-count]', group).forEach(function (c) { c.textContent = String(counts[c.getAttribute('data-uh-count')] || 0); });

            function apply() {
                var shown = 0;
                items.forEach(function (it) {
                    var okType = state.type === 'all' || it.getAttribute('data-type') === state.type;
                    var m = it.getAttribute('data-month');
                    var okMonth = state.month === 'all' || !m || m === state.month;
                    var ok = okType && okMonth;
                    it.hidden = !ok;
                    if (ok) { shown++; }
                });
                if (shownEl) { shownEl.textContent = String(shown); }
                if (empty) { empty.hidden = shown !== 0; }
            }
            $$('[data-filter]', group).forEach(function (btn) {
                on(btn, 'click', function () {
                    $$('[data-filter]', group).forEach(function (b) {
                        var active = b === btn;
                        b.classList.toggle('is-active', active);
                        b.setAttribute('aria-pressed', active ? 'true' : 'false');
                    });
                    state.type = btn.getAttribute('data-filter');
                    refreshThumbs();
                    apply();
                });
            });
            on(month, 'change', function () { state.month = month.value; apply(); });
            apply();
        });
    })();

    /* ---------- pilih tipe kamar (halaman Harga Paket) ---------- */
    $$('[data-uh-roomtoggle]').forEach(function (tg) {
        var btns = $$('[data-room]', tg);
        var cards = $$('.uh-pricecard');
        function set(btn) {
            var key = btn.getAttribute('data-room');
            var label = btn.getAttribute('data-room-name');
            btns.forEach(function (b) {
                var a = b === btn;
                b.classList.toggle('is-active', a);
                b.setAttribute('aria-checked', a ? 'true' : 'false');
                b.tabIndex = a ? 0 : -1;
            });
            cards.forEach(function (card) {
                var row = $('[data-room-row="' + key + '"]', card);
                var price = $('[data-uh-roomprice]', card);
                var nm = $('[data-uh-roomname]', card);
                var boxEl = $('[data-uh-pricebox]', card);
                $$('[data-room-row]', card).forEach(function (r) { r.classList.toggle('is-selected', r === row); });
                if (row) { price.textContent = $('td', row).textContent; boxEl.classList.remove('is-na'); }
                else { price.textContent = 'Tidak tersedia'; boxEl.classList.add('is-na'); }
                nm.textContent = label;
                boxEl.classList.remove('is-flip');
                void boxEl.offsetWidth;
                boxEl.classList.add('is-flip');
            });
            refreshThumbs();
        }
        btns.forEach(function (b, i) {
            on(b, 'click', function () { set(b); });
            on(b, 'keydown', function (e) {
                var n = null;
                if (e.key === 'ArrowRight' || e.key === 'ArrowDown') { n = btns[(i + 1) % btns.length]; }
                if (e.key === 'ArrowLeft' || e.key === 'ArrowUp') { n = btns[(i - 1 + btns.length) % btns.length]; }
                if (n) { e.preventDefault(); set(n); n.focus(); }
            });
        });
        set(btns[0]);
    });

    /* ---------- tab itinerary ---------- */
    $$('[data-uh-tabs]').forEach(function (wrap) {
        var tabs = $$('[role="tab"]', wrap);
        function select(tab, focus) {
            tabs.forEach(function (t) {
                var active = t === tab;
                t.classList.toggle('is-active', active);
                t.setAttribute('aria-selected', active ? 'true' : 'false');
                t.tabIndex = active ? 0 : -1;
                var panel = doc.getElementById(t.getAttribute('aria-controls'));
                if (panel) { panel.hidden = !active; }
            });
            if (focus) { tab.focus(); }
            refreshThumbs();
        }
        tabs.forEach(function (t, idx) {
            on(t, 'click', function () { select(t, false); });
            on(t, 'keydown', function (e) {
                var next = null;
                if (e.key === 'ArrowRight') { next = tabs[(idx + 1) % tabs.length]; }
                if (e.key === 'ArrowLeft') { next = tabs[(idx - 1 + tabs.length) % tabs.length]; }
                if (e.key === 'Home') { next = tabs[0]; }
                if (e.key === 'End') { next = tabs[tabs.length - 1]; }
                if (next) { e.preventDefault(); select(next, true); }
            });
        });
    });

    /* ---------- checklist persyaratan (cincin kemajuan) ---------- */
    $$('[data-uh-checklist]').forEach(function (wrap) {
        var boxes = $$('[data-uh-check]', wrap);
        var ring = $('[data-uh-ring-fg]', wrap);
        var prog = $('[data-uh-progress]', wrap);
        var count = $('[data-uh-progress-count]', wrap);
        var text = $('[data-uh-progress-text]', wrap);
        var KEY = 'uh-req-v1';
        var CIRC = 2 * Math.PI * 18;
        var saved = [];
        try { saved = JSON.parse(store('local', KEY) || '[]') || []; } catch (e) { saved = []; }

        function update() {
            var done = boxes.filter(function (b) { return b.checked; }).length;
            var total = boxes.length;
            if (ring) { ring.style.strokeDasharray = CIRC.toFixed(1); ring.style.strokeDashoffset = (CIRC * (1 - (total ? done / total : 0))).toFixed(1); }
            if (prog) { prog.setAttribute('aria-valuenow', String(done)); prog.classList.toggle('is-done', total > 0 && done === total); }
            if (count) { count.textContent = String(done); }
            if (text) {
                text.textContent = done === 0 ? 'Belum ada dokumen yang dicentang.'
                    : (done === total ? 'Semua dokumen siap! Lanjutkan pendaftaran lewat formulir di bawah.' : done + ' dari ' + total + ' dokumen siap, ' + (total - done) + ' lagi.');
            }
            store('local', KEY, JSON.stringify(boxes.map(function (b) { return b.checked ? 1 : 0; })));
        }
        boxes.forEach(function (b, i) { b.checked = saved[i] === 1; on(b, 'change', update); });
        update();
    });

    /* ---------- dropdown kustom (menggantikan <select> bawaan, tetap sinkron dengan select aslinya) ---------- */
    (function dropdowns() {
        var uid = 0;
        $$('select[data-uh-select]').forEach(function (sel) {
            uid++;
            var variant = sel.getAttribute('data-uh-select');
            var wrap = doc.createElement('div');
            wrap.className = 'uh-dd' + (variant === 'pill' ? ' uh-dd--pill' : '');
            sel.parentNode.insertBefore(wrap, sel);
            wrap.appendChild(sel);
            sel.tabIndex = -1;
            sel.setAttribute('aria-hidden', 'true');

            var btn = doc.createElement('button');
            btn.type = 'button';
            btn.className = 'uh-dd__btn';
            btn.setAttribute('aria-haspopup', 'listbox');
            btn.setAttribute('aria-expanded', 'false');
            var val = doc.createElement('span');
            val.className = 'uh-dd__value';
            val.id = 'uh-dd-val-' + uid;
            btn.appendChild(val);
            btn.appendChild(icon('chevron-down'));

            var lbl = sel.id ? $('label[for="' + sel.id + '"]') : null;
            var labelId = sel.getAttribute('aria-labelledby') || (lbl && (lbl.id = lbl.id || 'uh-dd-lbl-' + uid));
            btn.setAttribute('aria-labelledby', (labelId ? labelId + ' ' : '') + val.id);

            var ul = doc.createElement('ul');
            ul.className = 'uh-dd__list';
            ul.id = 'uh-dd-list-' + uid;
            ul.setAttribute('role', 'listbox');
            ul.hidden = true;
            btn.setAttribute('aria-controls', ul.id);
            wrap.appendChild(btn);
            wrap.appendChild(ul);

            var opts = [];
            var cur = -1;
            Array.prototype.forEach.call(sel.options, function (o, i) {
                var li = doc.createElement('li');
                li.className = 'uh-dd__opt';
                li.setAttribute('role', 'option');
                li.id = ul.id + '-' + i;
                var t = doc.createElement('span');
                t.textContent = o.textContent;
                li.appendChild(t);
                li.appendChild(icon('check'));
                if (o.disabled) { li.setAttribute('aria-disabled', 'true'); }
                on(li, 'mousedown', function (e) { e.preventDefault(); });
                on(li, 'click', function () { if (!o.disabled) { choose(i); } });
                on(li, 'mouseenter', function () { highlightOpt(i); });
                ul.appendChild(li);
                opts.push(li);
            });

            function sync() {
                var i = sel.selectedIndex < 0 ? 0 : sel.selectedIndex;
                val.textContent = sel.options[i] ? sel.options[i].textContent : '';
                val.classList.toggle('is-placeholder', !!sel.options[i] && sel.options[i].value === '' && sel.hasAttribute('required'));
                opts.forEach(function (li, n) { li.setAttribute('aria-selected', n === i ? 'true' : 'false'); });
            }
            function highlightOpt(i) {
                cur = i;
                opts.forEach(function (li, n) { li.classList.toggle('is-active', n === i); });
                if (opts[i]) { btn.setAttribute('aria-activedescendant', opts[i].id); opts[i].scrollIntoView({ block: 'nearest' }); }
            }
            function isOpen() { return !ul.hidden; }
            function setOpen(open) {
                ul.hidden = !open;
                wrap.classList.toggle('is-open', open);
                btn.setAttribute('aria-expanded', open ? 'true' : 'false');
                if (open) { highlightOpt(sel.selectedIndex < 0 ? 0 : sel.selectedIndex); } else { btn.removeAttribute('aria-activedescendant'); }
            }
            function choose(i) {
                sel.selectedIndex = i;
                sel.dispatchEvent(new Event('change', { bubbles: true }));
                sync();
                setOpen(false);
                btn.focus();
            }
            function move(step) {
                var n = cur;
                do { n = (n + step + opts.length) % opts.length; } while (sel.options[n] && sel.options[n].disabled && n !== cur);
                highlightOpt(n);
            }
            on(btn, 'click', function () { setOpen(!isOpen()); });
            on(btn, 'keydown', function (e) {
                if (e.key === 'ArrowDown' || e.key === 'ArrowUp') {
                    e.preventDefault();
                    if (!isOpen()) { setOpen(true); } else { move(e.key === 'ArrowDown' ? 1 : -1); }
                } else if (e.key === 'Home' && isOpen()) { e.preventDefault(); highlightOpt(0); }
                else if (e.key === 'End' && isOpen()) { e.preventDefault(); highlightOpt(opts.length - 1); }
                else if ((e.key === 'Enter' || e.key === ' ') && isOpen()) { e.preventDefault(); choose(cur); }
                else if (e.key === 'Escape' && isOpen()) { e.preventDefault(); e.stopPropagation(); setOpen(false); }
                else if (e.key === 'Tab' && isOpen()) { setOpen(false); }
                else if (e.key.length === 1 && /\S/.test(e.key)) {
                    var ch = e.key.toLowerCase();
                    for (var k = 1; k <= opts.length; k++) {
                        var n = (cur + k + opts.length) % opts.length;
                        if (sel.options[n].textContent.trim().toLowerCase().indexOf(ch) === 0) { if (!isOpen()) { setOpen(true); } highlightOpt(n); break; }
                    }
                }
            });
            on(doc, 'click', function (e) { if (isOpen() && !wrap.contains(e.target)) { setOpen(false); } });
            on(sel, 'change', sync);
            if (lbl) { on(lbl, 'click', function (e) { e.preventDefault(); btn.focus(); }); }
            var formEl = sel.form;
            if (formEl) { on(formEl, 'reset', function () { window.setTimeout(sync, 0); }); }
            sync();
        });
    })();

    /* ---------- form pendaftaran → WhatsApp ---------- */
    $$('[data-uh-waform]').forEach(function (form) {
        var hint = $('.uh-form__hint', form);
        var hintDefault = hint ? hint.textContent : '';
        var fields = $$('.uh-field', form);

        function fieldOf(el) { return el.closest('.uh-field'); }
        function setError(el, msg) {
            var f = fieldOf(el);
            if (!f) { return; }
            var m = $('[data-uh-msg]', f);
            f.classList.toggle('is-invalid', !!msg);
            f.classList.toggle('is-valid', !msg && !!el.value);
            if (m) { m.textContent = msg || ''; m.hidden = !msg; }
            el.setAttribute('aria-invalid', msg ? 'true' : 'false');
        }
        function phoneDigits(v) {
            var d = String(v || '').replace(/[^\d+]/g, '').replace(/^\+/, '');
            if (d.charAt(0) === '0') { d = '62' + d.slice(1); }
            return d;
        }
        function check(el) {
            var v = String(el.value || '').trim();
            var msg = '';
            if (el.hasAttribute('data-uh-required') && !v) { msg = el.getAttribute('data-uh-required'); }
            else if (el.name === 'name' && v.length < 3) { msg = 'Nama minimal 3 karakter'; }
            else if (el.name === 'phone') {
                var d = phoneDigits(v);
                if (!/^\d{9,15}$/.test(d)) { msg = 'Nomor tidak valid. Contoh: 0812-3456-7890'; }
            }
            setError(el, msg);
            return !msg;
        }
        var validated = $$('[data-uh-required], input[name="phone"]', form);
        validated.forEach(function (el) {
            on(el, 'blur', function () { if (el.value || fieldOf(el).classList.contains('is-invalid')) { check(el); } });
            on(el, 'input', function () { if (fieldOf(el).classList.contains('is-invalid')) { check(el); } });
            on(el, 'change', function () { check(el); });
        });

        /* stepper jumlah jemaah */
        $$('[data-uh-stepper]', form).forEach(function (st) {
            var inp = $('input', st);
            function clamp() {
                var n = parseInt(inp.value, 10);
                if (isNaN(n)) { n = 1; }
                inp.value = Math.min(Math.max(n, +inp.min || 1), +inp.max || 50);
            }
            $$('[data-step]', st).forEach(function (b) {
                on(b, 'click', function () { inp.value = (parseInt(inp.value, 10) || 1) + parseInt(b.getAttribute('data-step'), 10); clamp(); });
            });
            on(inp, 'change', clamp);
        });

        on(form, 'submit', function (e) {
            e.preventDefault();
            var firstBad = null;
            validated.forEach(function (el) { if (!check(el) && !firstBad) { firstBad = el; } });
            if (firstBad) {
                var target = firstBad.tagName === 'SELECT' ? $('.uh-dd__btn', fieldOf(firstBad)) || firstBad : firstBad;
                target.focus();
                return;
            }
            var get = function (n) { var el = form.elements[n]; return el ? String(el.value || '').trim() : ''; };
            var lines = [
                (DATA.waIntro || 'Assalamu\u2019alaikum, saya ingin mendaftar umrah/haji dengan data berikut:'),
                '',
                'Nama: ' + get('name'),
                'No. WhatsApp: ' + get('phone'),
                'Paket: ' + get('package'),
                'Jadwal: ' + (get('date') || 'Belum menentukan'),
                'Jumlah jemaah: ' + (get('pax') || '1')
            ];
            if (get('note')) { lines.push('Catatan: ' + get('note')); }
            var url = 'https://wa.me/' + (DATA.waNumber || '') + '?text=' + encodeURIComponent(lines.join('\n'));
            var w = window.open(url, '_blank', 'noopener');
            if (!w) { window.location.href = url; }
            if (hint) {
                hint.textContent = 'Membuka WhatsApp… jika tidak terbuka otomatis, izinkan pop-up lalu kirim ulang.';
                hint.classList.add('is-ok');
                window.setTimeout(function () { hint.textContent = hintDefault; hint.classList.remove('is-ok'); }, 6000);
            }
        });
    });

    /* ---------- kembali ke atas ---------- */
    $$('[data-uh-totop]').forEach(function (b) {
        on(b, 'click', function () { window.scrollTo({ top: 0, behavior: reduceMotion ? 'auto' : 'smooth' }); });
    });

    /* ---------- bubble chatbot mengambang ---------- */
    (function chatBubble() {
        var chat = $('[data-uh-chat]');
        if (!chat) { return; }
        if (store('session', 'uh-chat-closed') === '1') { chat.classList.add('is-closed'); }
        on($('[data-uh-chat-close]', chat), 'click', function () {
            chat.classList.add('is-closed');
            store('session', 'uh-chat-closed', '1');
        });
    })();

    /* ---------- AI Chatbot (FAQ paket & pendaftaran) ---------- */
    // Satu mesin chat dipakai bersama oleh halaman Chatbot dan panel melayang.
    function createChat(win) {
        var log = $('[data-uh-chat-log]', win);
        var form = $('[data-uh-chat-form]', win);
        var input = $('[data-uh-chat-input]', win);
        var faq = Array.isArray(DATA.faq) ? DATA.faq : [];
        var ai = DATA.ai || {};
        var busy = false;

        function scrollDown() { log.scrollTop = log.scrollHeight; }

        function bubble(role, text, links) {
            var row = doc.createElement('div');
            row.className = 'uh-msg uh-msg--' + role;
            var b = doc.createElement('div');
            b.className = 'uh-msg__bubble';
            b.textContent = text;
            if (links && links.length) {
                var holder = doc.createElement('div');
                links.forEach(function (l) {
                    var a = doc.createElement('a');
                    a.className = 'uh-msg__link';
                    a.href = l.url;
                    if (l.external) { a.target = '_blank'; a.rel = 'noopener noreferrer'; }
                    var s = doc.createElement('span');
                    s.textContent = l.label;
                    a.appendChild(s);
                    a.appendChild(icon(l.icon || 'arrow-right'));
                    holder.appendChild(a);
                });
                b.appendChild(holder);
            }
            row.appendChild(b);
            log.appendChild(row);
            scrollDown();
            return row;
        }

        function waLink() {
            return { label: 'Chat WhatsApp', url: DATA.wa || '#', external: true, icon: 'whatsapp' };
        }

        function answer(q) {
            var n = norm(q);
            if (!n) { return null; }
            if (/\b(assalamualaikum|assalamu alaikum|halo|hai|hallo|selamat (pagi|siang|sore|malam))\b/.test(n)) {
                return { text: 'Wa\u2019alaikumussalam! Ada yang ingin Anda ketahui tentang paket, harga, jadwal, hotel & pesawat, itinerary, atau persyaratan pendaftaran?', links: [] };
            }
            if (/\b(terima kasih|makasih|thanks|jazakallah)\b/.test(n)) {
                return { text: 'Sama-sama. Semoga ibadah Anda dimudahkan dan diberkahi. Jika masih ada pertanyaan, silakan tanyakan kembali.', links: [] };
            }
            var best = null, bestScore = 0;
            faq.forEach(function (f) {
                var score = 0;
                (f.keys || []).forEach(function (k) {
                    var nk = norm(k);
                    if (nk && (' ' + n + ' ').indexOf(' ' + nk + ' ') !== -1) { score += nk.indexOf(' ') !== -1 ? 2 : 1; }
                    else if (nk.length > 4 && n.indexOf(nk) !== -1) { score += 1; }
                });
                if (score > bestScore) { bestScore = score; best = f; }
            });
            if (!best) { return { text: ai.fallback || 'Maaf, saya belum menemukan jawabannya.', links: [waLink()] }; }
            var links = [];
            if (best.url) { links.push({ label: best.link_label || 'Lihat halaman', url: best.url, icon: 'arrow-right' }); }
            links.push(waLink());
            return { text: best.a, links: links };
        }

        function ask(q) {
            q = String(q || '').trim();
            if (!q || busy) { return; }
            busy = true;
            bubble('user', q);
            var typing = doc.createElement('div');
            typing.className = 'uh-msg';
            var t = doc.createElement('div');
            t.className = 'uh-typing';
            t.innerHTML = '<i></i><i></i><i></i>';
            t.setAttribute('aria-label', 'Muthawwif AI sedang mengetik');
            typing.appendChild(t);
            log.appendChild(typing);
            scrollDown();
            window.setTimeout(function () {
                typing.remove();
                var r = answer(q);
                if (r) { bubble('bot', r.text, r.links); }
                busy = false;
            }, reduceMotion ? 0 : 650 + Math.min(q.length * 12, 600));
        }

        bubble('bot', ai.welcome || 'Assalamu\u2019alaikum! Silakan ajukan pertanyaan Anda.');

        on(form, 'submit', function (e) {
            e.preventDefault();
            var v = input.value;
            input.value = '';
            ask(v);
            input.focus();
        });
        $$('[data-q]', win).forEach(function (b) { on(b, 'click', function () { ask(b.getAttribute('data-q')); }); });

        return { ask: ask, focus: function () { if (input) { input.focus(); } } };
    }

    /* halaman Chatbot (jendela penuh) */
    var chatPage = $('[data-uh-chatbot]');
    if (chatPage) {
        var pageChat = createChat(chatPage);
        $$('[data-uh-chat-ask]').forEach(function (b) {
            on(b, 'click', function () {
                pageChat.ask(b.getAttribute('data-uh-chat-ask'));
                chatPage.scrollIntoView({ behavior: reduceMotion ? 'auto' : 'smooth', block: 'center' });
            });
        });
        try {
            var qs = new URLSearchParams(window.location.search).get('q');
            if (qs) { window.setTimeout(function () { pageChat.ask(qs.slice(0, 200)); }, 500); }
        } catch (e) { /* URLSearchParams tidak tersedia */ }
    }

    /* panel chat melayang: dibuka oleh semua tombol [data-uh-chat-open] */
    (function chatPanel() {
        var panel = $('[data-uh-cpanel]');
        if (!panel || chatPage) { return; }
        var launcher = $('[data-uh-chat]');
        var fab = $('.uh-chat__fab');
        var inst = null;
        var lastFocus = null;

        function isOpen() { return !panel.hidden; }
        function open(q) {
            if (!isOpen()) {
                lastFocus = doc.activeElement;
                panel.hidden = false;
                if (launcher) { launcher.classList.add('is-open'); }
                if (fab) { fab.setAttribute('aria-expanded', 'true'); }
                if (!inst) { inst = createChat(panel); }
                window.setTimeout(function () { inst.focus(); }, 60);
            }
            if (q) { inst.ask(q); }
        }
        function close() {
            if (!isOpen()) { return; }
            panel.hidden = true;
            if (launcher) { launcher.classList.remove('is-open'); }
            if (fab) { fab.setAttribute('aria-expanded', 'false'); }
            if (lastFocus && lastFocus.focus) { lastFocus.focus(); }
        }

        $$('[data-uh-chat-open]').forEach(function (a) {
            on(a, 'click', function (e) {
                e.preventDefault();
                if (a === fab && isOpen()) { close(); return; }
                open(a.getAttribute('data-q'));
            });
        });
        on($('[data-uh-cpanel-close]', panel), 'click', close);
        on(doc, 'keydown', function (e) { if (e.key === 'Escape') { close(); } });
    })();

    refreshThumbs();
    window.addEventListener('load', refreshThumbs);
    window.addEventListener('resize', refreshThumbs);
    if (doc.fonts && doc.fonts.ready) { doc.fonts.ready.then(refreshThumbs); }
})();
