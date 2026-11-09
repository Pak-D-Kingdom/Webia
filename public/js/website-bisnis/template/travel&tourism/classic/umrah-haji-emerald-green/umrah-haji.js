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

    /* ---------- pencarian ---------- */
    (function search() {
        var box = $('[data-uh-search]');
        if (!box) { return; }
        var input = $('[data-uh-search-input]', box);
        var list = $('[data-uh-search-results]', box);
        var form = $('[data-uh-search-form]', box);
        var index = Array.isArray(DATA.search) ? DATA.search : [];
        var lastFocus = null;

        function render(q) {
            var n = norm(q);
            var hits = index.filter(function (it) {
                if (!n) { return true; }
                return norm(it.label + ' ' + (it.text || '') + ' ' + (it.keys || '')).indexOf(n) !== -1;
            }).slice(0, 8);
            list.innerHTML = '';
            if (!hits.length) {
                var empty = doc.createElement('li');
                empty.className = 'uh-search__empty';
                empty.textContent = 'Tidak ada hasil untuk "' + q + '". Coba kata kunci lain, misalnya "harga" atau "jadwal".';
                list.appendChild(empty);
                return;
            }
            hits.forEach(function (it) {
                var li = doc.createElement('li');
                var a = doc.createElement('a');
                a.href = it.url;
                a.appendChild(icon(it.icon || 'file'));
                var span = doc.createElement('span');
                var strong = doc.createElement('strong');
                strong.textContent = it.label;
                var small = doc.createElement('small');
                small.textContent = it.text || '';
                span.appendChild(strong);
                span.appendChild(small);
                a.appendChild(span);
                li.appendChild(a);
                list.appendChild(li);
            });
        }
        function open() {
            lastFocus = doc.activeElement;
            box.hidden = false;
            doc.body.style.overflow = 'hidden';
            render('');
            input.value = '';
            window.setTimeout(function () { input.focus(); }, 30);
        }
        function close() {
            box.hidden = true;
            doc.body.style.overflow = '';
            if (lastFocus && lastFocus.focus) { lastFocus.focus(); }
        }
        $$('[data-uh-search-open]').forEach(function (b) { on(b, 'click', open); });
        $$('[data-uh-search-close]', box).forEach(function (b) { on(b, 'click', close); });
        on(input, 'input', function () { render(input.value); });
        on(form, 'submit', function (e) {
            e.preventDefault();
            var first = $('a', list);
            if (first) { window.location.href = first.href; }
        });
        on(doc, 'keydown', function (e) {
            if (e.key === 'Escape' && !box.hidden) { close(); }
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
        var targets = $$('.uh-card, .uh-banner, .uh-arch, .uh-pkcard, .uh-pricecard, .uh-stay, .uh-block, .uh-gcard, .uh-tscard, .uh-timeline__item, .uh-chatwin, .uh-chataside__card');
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

    /* ---------- filter (paket & jadwal) ---------- */
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
            var state = { type: 'all', month: 'all' };

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
                    apply();
                });
            });
            on(month, 'change', function () { state.month = month.value; apply(); });
        });
    })();

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

    /* ---------- checklist persyaratan ---------- */
    $$('[data-uh-checklist]').forEach(function (wrap) {
        var boxes = $$('[data-uh-check]', wrap);
        var bar = $('[data-uh-progress-bar]', wrap);
        var prog = $('[data-uh-progress]', wrap);
        var count = $('[data-uh-progress-count]', wrap);
        var KEY = 'uh-req-v1';
        var saved = [];
        try { saved = JSON.parse(store('local', KEY) || '[]') || []; } catch (e) { saved = []; }

        function update() {
            var done = boxes.filter(function (b) { return b.checked; }).length;
            if (bar) { bar.style.width = (boxes.length ? Math.round(done / boxes.length * 100) : 0) + '%'; }
            if (prog) { prog.setAttribute('aria-valuenow', String(done)); }
            if (count) { count.textContent = String(done); }
            store('local', KEY, JSON.stringify(boxes.map(function (b) { return b.checked ? 1 : 0; })));
        }
        boxes.forEach(function (b, i) { b.checked = saved[i] === 1; on(b, 'change', update); });
        update();
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
    (function chatbot() {
        var win = $('[data-uh-chatbot]');
        if (!win) { return; }
        var log = $('[data-uh-chat-log]', win);
        var form = $('[data-uh-chat-form]', win);
        var input = $('[data-uh-chat-input]', win);
        var faq = Array.isArray(DATA.faq) ? DATA.faq : [];
        var ai = DATA.ai || {};
        var busy = false;

        function scrollDown() { log.scrollTop = log.scrollHeight; }

        function bubble(role, text, links, extra) {
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
            if (extra) { b.appendChild(extra); }
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
        $$('[data-uh-chat-ask]').forEach(function (b) {
            on(b, 'click', function () {
                ask(b.getAttribute('data-uh-chat-ask'));
                win.scrollIntoView({ behavior: reduceMotion ? 'auto' : 'smooth', block: 'center' });
            });
        });

        try {
            var q = new URLSearchParams(window.location.search).get('q');
            if (q) { window.setTimeout(function () { ask(q.slice(0, 200)); }, 500); }
        } catch (e) { /* URLSearchParams tidak tersedia */ }
    })();
})();
