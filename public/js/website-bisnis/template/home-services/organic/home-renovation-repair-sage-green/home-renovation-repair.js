/* ==========================================================================
   Renovaku — Home Renovation & Repair · Organic · Sage Green
   Vanilla JS (tanpa dependensi). Data dari window.HRR (diisi oleh layout Blade).
   ========================================================================== */
(function () {
    'use strict';

    var D = window.HRR || {};
    var doc = document;
    var root = doc.documentElement;
    var reduceMotion = !!(window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches);
    var canHover = !!(window.matchMedia && window.matchMedia('(hover: hover)').matches);

    function $(sel, ctx) { return (ctx || doc).querySelector(sel); }
    function $$(sel, ctx) { return Array.prototype.slice.call((ctx || doc).querySelectorAll(sel)); }
    function on(el, ev, fn, opts) { if (el) { el.addEventListener(ev, fn, opts); } }
    function pad(n) { return n < 10 ? '0' + n : String(n); }
    function clamp(v, a, b) { return Math.min(b, Math.max(a, v)); }
    function rupiah(n) { return 'Rp ' + String(Math.round(n)).replace(/\B(?=(\d{3})+(?!\d))/g, '.'); }
    function waLink(text) { return 'https://wa.me/' + (D.whatsapp || '') + '?text=' + encodeURIComponent(text); }
    function raf(fn) { return window.requestAnimationFrame ? window.requestAnimationFrame(fn) : setTimeout(fn, 16); }
    function store(key, val) {
        try {
            if (val === undefined) { return window.sessionStorage.getItem(key); }
            window.sessionStorage.setItem(key, val);
        } catch (e) { /* penyimpanan tidak tersedia: abaikan */ }
        return null;
    }
    function svgIcon(name) {
        var ns = 'http://www.w3.org/2000/svg';
        var svg = doc.createElementNS(ns, 'svg');
        svg.setAttribute('class', 'hr-ico');
        svg.setAttribute('aria-hidden', 'true');
        var use = doc.createElementNS(ns, 'use');
        use.setAttribute('href', '#i-' + name);
        svg.appendChild(use);
        return svg;
    }
    function el(tag, cls, text) {
        var n = doc.createElement(tag);
        if (cls) { n.className = cls; }
        if (text !== undefined) { n.textContent = text; }
        return n;
    }

    var header = $('[data-header]');
    var nav = $('[data-nav]');
    var scrim = $('[data-scrim]');
    var searchBox = $('[data-search]');
    var chatPanel = $('[data-chat]');
    var lightbox = $('[data-lightbox]');

    /* Kunci scroll bersama (drawer, pencarian, lightbox) */
    var locks = 0;
    function lock(on_) {
        locks = Math.max(0, locks + (on_ ? 1 : -1));
        root.style.overflow = locks > 0 ? 'hidden' : '';
    }

    /* ---------- 1. Header: bayangan + progres scroll ---------- */
    var progress = $('[data-progress]');
    var ticking = false;
    function onScroll() {
        if (ticking) { return; }
        ticking = true;
        raf(function () {
            var y = window.scrollY || root.scrollTop;
            if (header) { header.classList.toggle('is-stuck', y > 8); }
            root.style.setProperty('--sy', String(Math.min(y, 1400)));
            if (progress) {
                var max = (root.scrollHeight - window.innerHeight) || 1;
                progress.style.transform = 'scaleX(' + clamp(y / max, 0, 1).toFixed(4) + ')';
            }
            updateTimeline();
            ticking = false;
        });
    }
    on(window, 'scroll', onScroll, { passive: true });
    on(window, 'resize', onScroll);

    /* ---------- 2. Topbar: status buka/tutup + pesan bergilir ---------- */
    (function () {
        var status = $('[data-open-status]');
        var text = status ? $('[data-open-text]', status) : null;
        var cfg = D.open_hours;
        var names = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
        var map = { Sun: 0, Mon: 1, Tue: 2, Wed: 3, Thu: 4, Fri: 5, Sat: 6 };

        function update() {
            if (!status || !text || !cfg) { return; }
            try {
                var parts = new Intl.DateTimeFormat('en-US', { timeZone: cfg.tz, weekday: 'short', hour: 'numeric', minute: 'numeric', hour12: false }).formatToParts(new Date());
                var day = 0, hour = 0, min = 0;
                parts.forEach(function (p) {
                    if (p.type === 'weekday') { day = map[p.value]; }
                    if (p.type === 'hour') { hour = parseInt(p.value, 10) % 24; }
                    if (p.type === 'minute') { min = parseInt(p.value, 10); }
                });
                var isDay = cfg.days.indexOf(day) !== -1;
                var open = isDay && hour >= cfg.from && hour < cfg.to;
                status.classList.toggle('is-open', open);
                status.classList.toggle('is-closed', !open);
                if (open) {
                    text.textContent = 'Buka sekarang · tutup ' + pad(cfg.to) + '.00 WIB';
                } else if (isDay && (hour < cfg.from)) {
                    text.textContent = 'Tutup · buka hari ini ' + pad(cfg.from) + '.00 WIB';
                } else {
                    var d = day, i = 0;
                    do { d = (d + 1) % 7; i++; } while (cfg.days.indexOf(d) === -1 && i < 8);
                    text.textContent = 'Tutup · buka ' + names[d] + ' ' + pad(cfg.from) + '.00 WIB';
                }
                $$('[data-human-status]').forEach(function (n) {
                    n.textContent = 'Tim kami: ' + text.textContent;
                    var bar = n.closest ? n.closest('.hr-chat__bar') : null;
                    if (bar) { bar.classList.toggle('is-open', open); bar.classList.toggle('is-closed', !open); }
                });
                void min;
            } catch (e) { /* Intl tidak tersedia: biarkan teks statis */ }
        }
        update();
        setInterval(update, 60000);

        var promos = $$('.hr-promo');
        if (promos.length > 1 && !reduceMotion) {
            var idx = 0, paused = false, wrap = $('[data-promos]');
            function show(n) {
                var prev = promos[idx];
                prev.classList.remove('is-on');
                prev.classList.add('is-out');
                prev.tabIndex = -1;
                setTimeout(function () { prev.classList.remove('is-out'); }, 600);
                idx = n;
                promos[idx].classList.add('is-on');
                promos[idx].tabIndex = 0;
            }
            on(wrap, 'mouseenter', function () { paused = true; });
            on(wrap, 'mouseleave', function () { paused = false; });
            on(wrap, 'focusin', function () { paused = true; });
            on(wrap, 'focusout', function () { paused = false; });
            setInterval(function () { if (!paused && !doc.hidden) { show((idx + 1) % promos.length); } }, 5200);
        }
    })();

    /* ---------- 3. Drawer mobile (tanpa dropdown) ---------- */
    function setNav(open) {
        if (!nav || nav.classList.contains('is-open') === open) { return; }
        nav.classList.toggle('is-open', open);
        if (scrim) { scrim.hidden = !open; }
        $$('[data-nav-open]').forEach(function (b) { b.setAttribute('aria-expanded', open ? 'true' : 'false'); });
        root.classList.toggle('hr-lock', open);
        lock(open);
    }
    $$('[data-nav-open]').forEach(function (b) { on(b, 'click', function () { setNav(true); }); });
    $$('[data-nav-close]').forEach(function (b) { on(b, 'click', function () { setNav(false); }); });
    on(scrim, 'click', function () { setNav(false); });
    $$('.hr-nav a').forEach(function (a) { on(a, 'click', function () { setNav(false); }); });
    on(window, 'resize', function () { if (window.innerWidth > 1240) { setNav(false); } });

    /* ---------- 4. Pencarian cepat (spotlight v2) ---------- */
    var sInput = $('[data-search-input]');
    var sBody = $('[data-search-results]');
    var sPrev = $('[data-search-preview]');
    var sClear = $('[data-search-clear]');
    var sTabs = $$('[data-search-tab]');
    var sMic = $('[data-search-voice]');
    var sVoiceMsg = $('[data-search-voice-msg]');
    var sSel = -1, sFilter = 'all', sFlat = [], sHl = null, phTimer = null, recog = null;
    var RECENT_KEY = 'hrr-recent';
    var DEFAULT_PH = sInput ? sInput.getAttribute('placeholder') : '';
    var PH = ['Cari “paket renovasi”…', 'Cari “booking survei”…', 'Cari “garansi pekerjaan”…', 'Cari “area Jabodetabek”…', 'Cari “desain interior”…'];
    var GROUP_ICON = { Halaman: 'home', Layanan: 'wrench', Paket: 'crown', Proyek: 'folder', Area: 'pin' };
    var SYN = {
        harga: ['paket'], tarif: ['paket'], biaya: ['paket', 'estimasi'], murah: ['basic'], renovasi: ['layanan'], perbaikan: ['layanan'],
        bocor: ['perbaikan'], dapur: ['renovasi'], taman: ['eksterior'], hasil: ['galeri', 'proyek'], foto: ['galeri'], wilayah: ['area'],
        kota: ['area'], jadwal: ['survei'], survey: ['survei'], kontak: ['penawaran'], hubungi: ['penawaran'], cat: ['finishing']
    };

    function loadRecent() {
        try { return JSON.parse(window.localStorage.getItem(RECENT_KEY) || '[]').slice(0, 5); } catch (e) { return []; }
    }
    function saveRecent(q) {
        q = (q || '').trim();
        if (!q) { return; }
        try {
            var r = loadRecent().filter(function (x) { return x.toLowerCase() !== q.toLowerCase(); });
            r.unshift(q);
            window.localStorage.setItem(RECENT_KEY, JSON.stringify(r.slice(0, 5)));
        } catch (e) { /* abaikan */ }
    }
    function clearRecent() { try { window.localStorage.removeItem(RECENT_KEY); } catch (e) { /* abaikan */ } }

    function appendHighlight(node, text, words) {
        if (!words.length) { node.appendChild(doc.createTextNode(text)); return; }
        var lower = text.toLowerCase(), pos = 0;
        while (pos < text.length) {
            var best = -1, bestLen = 0;
            for (var i = 0; i < words.length; i++) {
                if (!words[i]) { continue; }
                var at = lower.indexOf(words[i], pos);
                if (at !== -1 && (best === -1 || at < best)) { best = at; bestLen = words[i].length; }
            }
            if (best === -1) { node.appendChild(doc.createTextNode(text.slice(pos))); break; }
            if (best > pos) { node.appendChild(doc.createTextNode(text.slice(pos, best))); }
            var m = doc.createElement('mark');
            m.textContent = text.slice(best, best + bestLen);
            node.appendChild(m);
            pos = best + bestLen;
        }
    }
    function searchAll(term) {
        var items = Array.isArray(D.search) ? D.search : [];
        if (!term) { return items.slice(); }
        var words = term.split(/\s+/).filter(Boolean);
        return items.map(function (it) {
            var t = it.t.toLowerCase(), d = it.d.toLowerCase(), score = 0;
            words.forEach(function (w) {
                if (t.indexOf(w) === 0) { score += 6; }
                else if (t.indexOf(w) !== -1) { score += 4; }
                else if (d.indexOf(w) !== -1) { score += 2; }
                else if ((SYN[w] || []).some(function (s) { return t.indexOf(s) !== -1 || d.indexOf(s) !== -1; })) { score += 1; }
                else { score -= 30; }
            });
            return { it: it, score: score };
        }).filter(function (x) { return x.score > 0; })
            .sort(function (a, b) { return b.score - a.score; })
            .map(function (x) { return x.it; });
    }
    function setTabCounts(list) {
        var counts = { all: list.length };
        list.forEach(function (it) { counts[it.g] = (counts[it.g] || 0) + 1; });
        sTabs.forEach(function (b) {
            var key = b.getAttribute('data-search-tab');
            var badge = $('i', b);
            if (!badge) { badge = el('i'); b.appendChild(badge); }
            badge.textContent = String(counts[key] || 0);
        });
    }
    function activateTab(key) {
        sFilter = key;
        sTabs.forEach(function (x) { var is = x.getAttribute('data-search-tab') === key; x.classList.toggle('is-on', is); x.setAttribute('aria-selected', is ? 'true' : 'false'); });
    }
    function positionHl() {
        if (!sHl) { return; }
        var nodes = $$('.hr-sitem', sBody), cur = nodes[sSel];
        if (!cur) { sHl.style.opacity = '0'; return; }
        var top = cur.offsetTop, p = cur.offsetParent;
        while (p && p !== sBody) { top += p.offsetTop; p = p.offsetParent; }
        sHl.style.height = cur.offsetHeight + 'px';
        sHl.style.transform = 'translateY(' + top + 'px)';
        sHl.style.opacity = '1';
    }
    function showPreview(it) {
        if (!sPrev) { return; }
        sPrev.textContent = '';
        var pv = el('div', 'hr-pv');
        if (!it) {
            pv.appendChild(el('div', 'hr-pv__tags')).appendChild(el('span', '', 'Tips'));
            pv.appendChild(el('h3', '', 'Cari apa saja di Renovaku'));
            pv.appendChild(el('p', '', 'Ketik nama layanan, paket, proyek, atau wilayah. Gunakan panah ↑ ↓ untuk memilih hasil, Enter untuk membukanya, atau tekan ikon mikrofon untuk mencari dengan suara.'));
            sPrev.appendChild(pv);
            return;
        }
        if (it.m) {
            var wrap = el('div', 'hr-pv__img');
            var im = doc.createElement('img');
            im.src = it.m; im.alt = ''; im.loading = 'lazy';
            wrap.appendChild(im);
            pv.appendChild(wrap);
        }
        var tags = el('div', 'hr-pv__tags');
        tags.appendChild(el('span', '', it.g));
        if (it.x) { tags.appendChild(el('span', '', it.x)); }
        pv.appendChild(tags);
        pv.appendChild(el('h3', '', it.t));
        pv.appendChild(el('p', '', it.d));
        var acts = el('div', 'hr-pv__actions');
        var open = el('a', 'hr-btn hr-btn--primary hr-btn--sm');
        open.href = it.u;
        open.appendChild(el('span', '', 'Buka'));
        open.appendChild(svgIcon('arrow'));
        on(open, 'click', function () { saveRecent(sInput.value || it.t); });
        var ask = el('button', 'hr-btn hr-btn--light hr-btn--sm');
        ask.type = 'button';
        ask.setAttribute('data-search-ask', it.t);
        ask.appendChild(svgIcon('bot'));
        ask.appendChild(el('span', '', 'Tanya AI'));
        acts.appendChild(open); acts.appendChild(ask);
        pv.appendChild(acts);
        var rel = (D.search || []).filter(function (x) { return x.g === it.g && x.t !== it.t; }).slice(0, 3);
        if (rel.length) {
            var rw = el('div', 'hr-pv__rel');
            rw.appendChild(el('h5', '', 'Lihat juga'));
            var rb = el('div');
            rel.forEach(function (x) {
                var b = el('button', '', x.t);
                b.type = 'button';
                on(b, 'click', function () { sInput.value = x.t; renderSearch(x.t); sInput.focus(); });
                rb.appendChild(b);
            });
            rw.appendChild(rb);
            pv.appendChild(rw);
        }
        sPrev.appendChild(pv);
    }
    function selectItem(n) {
        var nodes = $$('.hr-sitem', sBody);
        if (!nodes.length) { sSel = -1; showPreview(null); if (sInput) { sInput.removeAttribute('aria-activedescendant'); } positionHl(); return; }
        sSel = (n + nodes.length) % nodes.length;
        nodes.forEach(function (it, i) {
            it.classList.toggle('is-sel', i === sSel);
            it.setAttribute('aria-selected', i === sSel ? 'true' : 'false');
        });
        var cur = nodes[sSel];
        if (sInput) { sInput.setAttribute('aria-activedescendant', cur.id); }
        if (cur.scrollIntoView) { cur.scrollIntoView({ block: 'nearest' }); }
        showPreview(sFlat[sSel]);
        positionHl();
    }
    function quickAction(icon, title, sub, href, act) {
        var n = el(href ? 'a' : 'button');
        if (href) { n.href = href; if (/^https?:/.test(href)) { n.target = '_blank'; n.rel = 'noopener noreferrer'; } } else { n.type = 'button'; }
        if (act) { n.setAttribute('data-search-act', act); }
        n.appendChild(svgIcon(icon));
        var box = el('span');
        box.appendChild(el('b', '', title));
        box.appendChild(el('small', '', sub));
        n.appendChild(box);
        n.appendChild(svgIcon('arrow'));
        return n;
    }
    function renderQuick() {
        sBody.textContent = '';
        sFlat = [];
        sHl = null;
        var all = Array.isArray(D.search) ? D.search : [];
        setTabCounts(all);
        var box = el('div', 'hr-sq');
        var recent = loadRecent();
        if (recent.length) {
            box.appendChild(el('h4', '', 'Pencarian terakhir'));
            var rc = el('div', 'hr-sq__recent');
            recent.forEach(function (q) {
                var b = el('button');
                b.type = 'button';
                b.appendChild(svgIcon('clock'));
                b.appendChild(doc.createTextNode(q));
                on(b, 'click', function () { sInput.value = q; renderSearch(q); sInput.focus(); });
                rc.appendChild(b);
            });
            var clr = el('button', 'hr-sq__clear', 'Hapus riwayat');
            clr.type = 'button';
            on(clr, 'click', function () { clearRecent(); renderQuick(); });
            rc.appendChild(clr);
            box.appendChild(rc);
        }
        box.appendChild(el('h4', '', 'Jelajahi kategori'));
        var tiles = el('div', 'hr-sq__tiles');
        ['Halaman', 'Layanan', 'Paket', 'Proyek', 'Area'].forEach(function (g, i) {
            var cnt = all.filter(function (x) { return x.g === g; }).length;
            var t = el('button');
            t.type = 'button';
            t.style.setProperty('--i', i);
            t.appendChild(svgIcon(GROUP_ICON[g]));
            t.appendChild(el('b', '', g));
            t.appendChild(el('small', '', cnt + ' item'));
            on(t, 'click', function () { activateTab(g); renderSearch(sInput.value); sInput.focus(); });
            tiles.appendChild(t);
        });
        box.appendChild(tiles);
        box.appendChild(el('h4', '', 'Aksi cepat'));
        var cards = el('div', 'hr-sq__cards');
        var links = D.links || {};
        cards.appendChild(quickAction('sliders', 'Hitung estimasi biaya', 'Kalkulator di AI Chatbot', null, 'calc'));
        cards.appendChild(quickAction('calendar', 'Booking survei lokasi', 'Jadwalkan kunjungan tim kami', links['booking-survei'] || '#'));
        cards.appendChild(quickAction('whatsapp', 'Chat via WhatsApp', 'Hubungi tim secara langsung', waLink('Halo Renovaku, saya ingin konsultasi renovasi rumah.')));
        box.appendChild(cards);
        sBody.appendChild(box);
        showPreview(null);
        sSel = -1;
        if (sInput) { sInput.removeAttribute('aria-activedescendant'); }
    }
    function renderSearch(q) {
        if (!sBody) { return; }
        var term = (q || '').toLowerCase().trim();
        if (sClear) { sClear.hidden = !term; }
        if (!term && sFilter === 'all') { renderQuick(); return; }
        var words = term.split(/\s+/).filter(Boolean);
        var all = searchAll(term);
        setTabCounts(all);
        var found = sFilter === 'all' ? all : all.filter(function (it) { return it.g === sFilter; });
        sBody.textContent = '';
        sFlat = [];
        sHl = null;
        if (!found.length) {
            var empty = el('div', 'hr-search__empty');
            empty.appendChild(svgIcon('search'));
            empty.appendChild(el('strong', '', 'Tidak ada hasil untuk “' + q + '”'));
            empty.appendChild(el('span', '', 'Coba kata lain seperti “paket”, “survei”, atau “garansi”, atau tanyakan ke asisten AI kami.'));
            var b = el('button', 'hr-btn hr-btn--primary hr-btn--sm');
            b.type = 'button';
            b.setAttribute('data-search-ask', q);
            b.appendChild(svgIcon('bot'));
            b.appendChild(el('span', '', 'Tanya AI Chatbot'));
            empty.appendChild(b);
            sBody.appendChild(empty);
            showPreview(null);
            sSel = -1;
            return;
        }
        sHl = el('div', 'hr-search__hl');
        sBody.appendChild(sHl);
        var groups = {}, order = [];
        found.forEach(function (it) {
            if (!groups[it.g]) { groups[it.g] = []; order.push(it.g); }
            groups[it.g].push(it);
        });
        var n = 0;
        order.forEach(function (g) {
            var sec = el('div', 'hr-sgroup');
            sec.appendChild(el('h4', '', g));
            groups[g].forEach(function (it) {
                var a = el('a', 'hr-sitem');
                a.href = it.u;
                a.id = 'hrSi' + n;
                a.style.setProperty('--i', n);
                a.setAttribute('role', 'option');
                var th = el('span', 'hr-sitem__thumb');
                if (it.m) { var im = doc.createElement('img'); im.src = it.m; im.alt = ''; im.loading = 'lazy'; th.appendChild(im); }
                var bd = el('span', 'hr-sitem__badge');
                bd.appendChild(svgIcon(it.i || GROUP_ICON[it.g] || 'search'));
                th.appendChild(bd);
                var box = el('span', 'hr-sitem__txt');
                var st = el('strong'); appendHighlight(st, it.t, words);
                var sm = el('small'); appendHighlight(sm, it.d, words);
                box.appendChild(st); box.appendChild(sm);
                a.appendChild(th); a.appendChild(box); a.appendChild(svgIcon('arrow'));
                (function (idx) {
                    on(a, 'mousemove', function () { if (idx !== sSel) { selectItem(idx); } });
                })(n);
                on(a, 'click', function () { saveRecent(sInput.value || it.t); setSearch(false); });
                sFlat.push(it);
                sec.appendChild(a);
                n++;
            });
            sBody.appendChild(sec);
        });
        selectItem(0);
    }

    /* Placeholder yang mengetik sendiri */
    function stopPlaceholder() { clearInterval(phTimer); phTimer = null; if (sInput) { sInput.setAttribute('placeholder', DEFAULT_PH); } }
    function startPlaceholder() {
        stopPlaceholder();
        if (reduceMotion || !sInput) { return; }
        var i = 0, pos = 0, mode = 'type', hold = 0;
        phTimer = setInterval(function () {
            if (sInput.value) { return; }
            var t = PH[i];
            if (mode === 'type') {
                pos++; sInput.setAttribute('placeholder', t.slice(0, pos));
                if (pos >= t.length) { mode = 'hold'; hold = 18; }
            } else if (mode === 'hold') {
                if (--hold <= 0) { mode = 'erase'; }
            } else {
                pos -= 2; sInput.setAttribute('placeholder', t.slice(0, Math.max(pos, 0)));
                if (pos <= 0) { mode = 'type'; pos = 0; i = (i + 1) % PH.length; }
            }
        }, 55);
    }

    /* Pencarian suara (bila didukung browser) */
    var SpeechRec = window.SpeechRecognition || window.webkitSpeechRecognition;
    if (sMic && SpeechRec) {
        sMic.hidden = false;
        on(sMic, 'click', function () {
            if (recog) { try { recog.stop(); } catch (e) { /* abaikan */ } return; }
            try {
                recog = new SpeechRec();
                recog.lang = 'id-ID';
                recog.interimResults = true;
                recog.maxAlternatives = 1;
                recog.onstart = function () { sMic.classList.add('is-listening'); if (sVoiceMsg) { sVoiceMsg.hidden = false; } };
                recog.onresult = function (ev) {
                    var text = Array.prototype.map.call(ev.results, function (r) { return r[0].transcript; }).join(' ').trim();
                    if (text) { sInput.value = text; renderSearch(text); }
                };
                var done = function () { sMic.classList.remove('is-listening'); if (sVoiceMsg) { sVoiceMsg.hidden = true; } recog = null; };
                recog.onerror = done; recog.onend = done;
                recog.start();
            } catch (e) { recog = null; sMic.classList.remove('is-listening'); }
        });
    }

    function setSearch(open) {
        if (!searchBox || searchBox.hidden === !open) { return; }
        searchBox.hidden = !open;
        root.classList.toggle('hr-lock', open || (nav && nav.classList.contains('is-open')));
        lock(open);
        if (!open) {
            if (sInput) { sInput.blur(); }
            stopPlaceholder();
            if (recog) { try { recog.stop(); } catch (e) { /* abaikan */ } }
        }
        if (open) {
            activateTab('all');
            if (sInput) { sInput.value = ''; }
            renderSearch('');
            startPlaceholder();
            setTimeout(function () { if (sInput) { sInput.focus(); } }, 40);
        }
    }
    $$('[data-search-open]').forEach(function (b) { on(b, 'click', function () { setNav(false); setSearch(true); }); });
    $$('[data-search-close]').forEach(function (b) { on(b, 'click', function () { setSearch(false); }); });
    on(searchBox, 'mousedown', function (e) { if (e.target === searchBox || (e.target.classList && e.target.classList.contains('hr-search__bg'))) { setSearch(false); } });
    on(sInput, 'input', function () { renderSearch(sInput.value); });
    on(sClear, 'click', function () { sInput.value = ''; renderSearch(''); sInput.focus(); });
    sTabs.forEach(function (b) {
        on(b, 'click', function () { activateTab(b.getAttribute('data-search-tab')); renderSearch(sInput.value); sInput.focus(); });
    });
    on($('[data-search-form]'), 'submit', function (e) {
        e.preventDefault();
        var nodes = $$('.hr-sitem', sBody);
        if (nodes[sSel]) { saveRecent(sInput.value || sFlat[sSel].t); window.location.href = nodes[sSel].href; }
        else if (sInput.value.trim()) { var q = sInput.value.trim(); setSearch(false); askChat(q); }
    });
    on(sInput, 'keydown', function (e) {
        if (e.key === 'ArrowDown') { e.preventDefault(); selectItem(sSel + 1); }
        else if (e.key === 'ArrowUp') { e.preventDefault(); selectItem(sSel - 1); }
    });
    on(window, 'resize', positionHl);
    on(sBody, 'scroll', function () { /* sorotan ikut bergulir karena berada dalam kontainer */ });
    function onSearchClick(e) {
        var t = e.target.closest ? e.target : null;
        if (!t) { return; }
        var ask = t.closest('[data-search-ask]');
        if (ask) { var q = ask.getAttribute('data-search-ask'); setSearch(false); askChat(q); return; }
        var act = t.closest('[data-search-act]');
        if (act && act.getAttribute('data-search-act') === 'calc') { setSearch(false); openCalc(); }
    }
    on(sBody, 'click', onSearchClick);
    on(sPrev, 'click', onSearchClick);
    on(doc, 'keydown', function (e) {
        var tag = ((doc.activeElement || {}).tagName || '').toLowerCase();
        var typing = tag === 'input' || tag === 'textarea' || tag === 'select' || (doc.activeElement && doc.activeElement.isContentEditable);
        if (searchBox && searchBox.hidden && !typing && (e.key === '/' || ((e.key === 'k' || e.key === 'K') && (e.ctrlKey || e.metaKey)))) {
            e.preventDefault();
            setSearch(true);
        }
    });

    /* ---------- 5. Reveal saat scroll + parallax hero ---------- */
    var revealEls = $$('[data-reveal]');
    function revealAll() { revealEls.forEach(function (n) { n.classList.add('is-in'); }); }
    if (!('IntersectionObserver' in window) || reduceMotion) {
        revealAll();
    } else {
        var io = new IntersectionObserver(function (entries) {
            entries.forEach(function (en) {
                if (en.isIntersecting) { en.target.classList.add('is-in'); io.unobserve(en.target); }
            });
        }, { threshold: 0.12, rootMargin: '0px 0px -40px 0px' });
        revealEls.forEach(function (n) { io.observe(n); });
    }
    on(window, 'beforeprint', revealAll);
    if (location.hash.length > 1) {
        try {
            var tgt = doc.getElementById(decodeURIComponent(location.hash.slice(1)));
            if (tgt) { tgt.classList.add('is-in'); }
        } catch (err) { /* hash tidak valid */ }
    }

    var hero = $('.hr-hero');
    if (hero && canHover && !reduceMotion) {
        on(hero, 'mousemove', function (e) {
            var r = hero.getBoundingClientRect();
            var x = ((e.clientX - r.left) / r.width - 0.5) * 2;
            var y = ((e.clientY - r.top) / r.height - 0.5) * 2;
            hero.style.setProperty('--px', (x * 12).toFixed(2));
            hero.style.setProperty('--py', (y * 8).toFixed(2));
        });
        on(hero, 'mouseleave', function () { hero.style.setProperty('--px', 0); hero.style.setProperty('--py', 0); });
    }

    /* ---------- 6. Before / After slider ---------- */
    $$('[data-compare]').forEach(function (box) {
        var range = $('[data-compare-range]', box);
        if (!range) { return; }
        var anim = null;
        function set(v) { range.value = v; box.style.setProperty('--pos', v + '%'); }
        function tween(to, ms) {
            if (anim) { cancelAnimationFrame(anim); }
            if (reduceMotion) { set(to); return; }
            var from = Number(range.value), t0 = null;
            function step(t) {
                if (t0 === null) { t0 = t; }
                var k = clamp((t - t0) / ms, 0, 1);
                var e = k < .5 ? 2 * k * k : 1 - Math.pow(-2 * k + 2, 2) / 2;
                set(Math.round(from + (to - from) * e));
                if (k < 1) { anim = requestAnimationFrame(step); } else { anim = null; }
            }
            anim = requestAnimationFrame(step);
        }
        var introTimers = [], touched = false;
        function userTouch() {
            touched = true;
            introTimers.forEach(clearTimeout);
            introTimers = [];
            if (anim) { cancelAnimationFrame(anim); anim = null; }
        }
        on(range, 'pointerdown', userTouch);
        on(range, 'keydown', userTouch);
        on(range, 'input', function () { userTouch(); set(range.value); });
        $$('[data-compare-set]').forEach(function (btn) {
            on(btn, 'click', function () { userTouch(); tween(Number(btn.getAttribute('data-compare-set')), 650); });
        });
        set(range.value);
        if ('IntersectionObserver' in window && !reduceMotion) {
            var once = new IntersectionObserver(function (en) {
                if (en[0].isIntersecting) {
                    once.disconnect();
                    introTimers.push(setTimeout(function () {
                        if (touched) { return; }
                        tween(85, 900);
                        introTimers.push(setTimeout(function () { if (!touched) { tween(50, 900); } }, 1100));
                    }, 500));
                }
            }, { threshold: 0.5 });
            once.observe(box);
        }
    });

    /* ---------- 7. Dropdown kustom (select) ---------- */
    var selUid = 0;
    function enhanceSelect(sel) {
        if (sel.getAttribute('data-enhanced')) { return; }
        sel.setAttribute('data-enhanced', '1');
        selUid++;
        var required = sel.required;
        var wrap = el('div', 'hr-select');
        sel.parentNode.insertBefore(wrap, sel);
        wrap.appendChild(sel);
        sel.tabIndex = -1;
        sel.setAttribute('aria-hidden', 'true');

        var btn = el('button', 'hr-select__btn');
        btn.type = 'button';
        btn.setAttribute('aria-haspopup', 'listbox');
        btn.setAttribute('aria-expanded', 'false');
        var val = el('span', 'hr-select__val');
        btn.appendChild(val);
        btn.appendChild(svgIcon('chevron'));
        var list = el('ul', 'hr-select__list');
        list.setAttribute('role', 'listbox');
        list.id = 'hrSel' + selUid;
        btn.setAttribute('aria-controls', list.id);
        wrap.appendChild(btn);
        wrap.appendChild(list);

        var opts = [];
        Array.prototype.forEach.call(sel.options, function (o) {
            if (required && o.value === '') { return; }
            var li = el('li', 'hr-select__opt');
            li.setAttribute('role', 'option');
            li.setAttribute('data-value', o.value);
            li.appendChild(el('span', '', o.text));
            li.appendChild(svgIcon('check'));
            list.appendChild(li);
            opts.push(li);
        });

        var active = -1, typed = '', typedT = null;
        var placeholder = sel.getAttribute('data-placeholder') || (sel.options[0] ? sel.options[0].text : '');
        function sync() {
            var o = sel.options[sel.selectedIndex];
            var empty = !sel.value;
            val.textContent = empty ? placeholder : (o ? o.text : '');
            btn.classList.toggle('is-placeholder', empty);
            opts.forEach(function (li) { li.setAttribute('aria-selected', li.getAttribute('data-value') === sel.value ? 'true' : 'false'); });
        }
        function setActive(n) {
            if (!opts.length) { return; }
            active = (n + opts.length) % opts.length;
            opts.forEach(function (li, i) { li.classList.toggle('is-active', i === active); });
            var cur = opts[active];
            list.scrollTop = Math.max(0, cur.offsetTop - list.clientHeight / 2 + cur.offsetHeight / 2);
        }
        function openList() {
            if (wrap.classList.contains('is-open')) { return; }
            $$('.hr-select.is-open').forEach(function (w) { w.classList.remove('is-open'); });
            var r = btn.getBoundingClientRect();
            var below = window.innerHeight - r.bottom, above = r.top;
            wrap.classList.toggle('is-up', below < 290 && above > below);
            wrap.classList.add('is-open');
            btn.setAttribute('aria-expanded', 'true');
            var cur = opts.map(function (li) { return li.getAttribute('data-value'); }).indexOf(sel.value);
            setActive(cur >= 0 ? cur : 0);
        }
        function closeList() {
            wrap.classList.remove('is-open');
            btn.setAttribute('aria-expanded', 'false');
        }
        function choose(n) {
            var li = opts[n];
            if (!li) { return; }
            sel.value = li.getAttribute('data-value');
            sync();
            sel.dispatchEvent(new Event('change', { bubbles: true }));
            closeList();
            btn.focus();
        }
        sel._hrFocus = btn;
        sel._hrSync = sync;
        sync();

        on(btn, 'click', function () { wrap.classList.contains('is-open') ? closeList() : openList(); });
        on(btn, 'keydown', function (e) {
            var open = wrap.classList.contains('is-open');
            if (e.key === 'ArrowDown' || e.key === 'ArrowUp') {
                e.preventDefault();
                if (!open) { openList(); } else { setActive(active + (e.key === 'ArrowDown' ? 1 : -1)); }
            } else if (e.key === 'Home' && open) { e.preventDefault(); setActive(0); }
            else if (e.key === 'End' && open) { e.preventDefault(); setActive(opts.length - 1); }
            else if ((e.key === 'Enter' || e.key === ' ') && open) { e.preventDefault(); choose(active); }
            else if (e.key === 'Escape' && open) { e.preventDefault(); e.stopPropagation(); closeList(); }
            else if (e.key === 'Tab') { closeList(); }
            else if (e.key.length === 1 && !e.ctrlKey && !e.metaKey && e.key !== ' ') {
                typed += e.key.toLowerCase();
                clearTimeout(typedT);
                typedT = setTimeout(function () { typed = ''; }, 600);
                for (var i = 0; i < opts.length; i++) {
                    if (opts[i].textContent.toLowerCase().indexOf(typed) === 0) {
                        if (!open) { openList(); }
                        setActive(i);
                        break;
                    }
                }
            }
        });
        opts.forEach(function (li, i) {
            on(li, 'mousedown', function (e) { e.preventDefault(); });
            on(li, 'click', function () { choose(i); });
            on(li, 'mousemove', function () { if (active !== i) { setActive(i); } });
        });
        on(doc, 'click', function (e) { if (!wrap.contains(e.target)) { closeList(); } });
        var lbl = sel.id ? $('label[for="' + sel.id + '"]') : null;
        on(lbl, 'click', function (e) { e.preventDefault(); btn.focus(); });
        on(sel, 'change', sync);
    }
    $$('select[data-select]').forEach(enhanceSelect);

    /* ---------- 8. Cek wilayah ---------- */
    var cov = $('[data-coverage-check]');
    if (cov) {
        on(cov, 'submit', function (e) {
            e.preventDefault();
            var out = $('[data-coverage-out]', cov);
            var sel = $('select', cov);
            $$('.hr-region').forEach(function (r) { r.classList.remove('is-picked'); });
            if (!sel.value) {
                out.textContent = 'Pilih wilayah rumah Anda terlebih dahulu.';
                out.classList.add('is-error');
                if (sel._hrFocus) { sel._hrFocus.focus(); }
                return;
            }
            var card = doc.getElementById('wilayah-' + sel.value);
            out.classList.remove('is-error');
            if (card) {
                var name = $('h3', card).textContent;
                var cities = $('p', card).textContent;
                var lead = $('.hr-chip', card).textContent.trim();
                out.textContent = 'Kami melayani ' + name + ' (' + cities + '). Perkiraan jadwal: ' + lead + '.';
                card.classList.add('is-picked', 'is-in');
                card.scrollIntoView({ behavior: reduceMotion ? 'auto' : 'smooth', block: 'center' });
            }
        });
    }

    /* ---------- 9. Formulir -> WhatsApp ---------- */
    function isoDate(d) { return d.getFullYear() + '-' + pad(d.getMonth() + 1) + '-' + pad(d.getDate()); }

    $$('[data-wa-form]').forEach(function (form) {
        var params = new URLSearchParams(window.location.search);
        $$('[data-group]', form).forEach(function (g) {
            var v = params.get(g.getAttribute('data-group'));
            if (!v) { return; }
            $$('input[type="radio"]', g).forEach(function (r) { if (r.value === v) { r.checked = true; } });
        });
        var dateInput = $('[data-min-today]', form);
        if (dateInput) {
            var tomorrow = new Date();
            tomorrow.setDate(tomorrow.getDate() + 1);
            dateInput.min = isoDate(tomorrow);
        }

        var fields = $$('.hr-field', form);
        var preview = $('[data-wa-preview]');
        var placeholderText = preview ? preview.textContent : '';
        var bar = $('[data-form-bar]', form), pct = $('[data-form-pct]', form), meter = $('[data-form-progress]', form);

        function ctrlsOf(field) { return $$('input[name], select[name], textarea[name]', field); }
        function groupOf(field) { return $('[data-group]', field); }
        function fieldValue(field) {
            var g = groupOf(field);
            if (g) {
                var c = $('input:checked', g);
                return c ? (c.getAttribute('data-text') || c.value) : '';
            }
            var ctrl = ctrlsOf(field)[0];
            if (!ctrl) { return ''; }
            var v = ctrl.tagName === 'SELECT' ? (ctrl.value ? (ctrl.options[ctrl.selectedIndex] || {}).text : '') : ctrl.value;
            v = (v || '').replace(/\s+/g, ' ').trim();
            if (ctrl.type === 'date' && v) {
                var dt = new Date(v + 'T00:00:00');
                if (!isNaN(dt.getTime())) { v = dt.toLocaleDateString('id-ID', { day: 'numeric', month: 'long', year: 'numeric' }); }
            }
            return v;
        }
        function labelOf(field) {
            var l = $('label, .hr-field__label', field);
            if (!l) { return ''; }
            var n = l.childNodes[0];
            return (n ? n.textContent : l.textContent).trim();
        }
        function problem(field) {
            var g = groupOf(field);
            if (g) { return (g.hasAttribute('data-required') && !$('input:checked', g)) ? 'Silakan pilih salah satu.' : ''; }
            var ctrl = ctrlsOf(field)[0];
            if (!ctrl) { return ''; }
            var v = (ctrl.value || '').trim();
            if (ctrl.required && !v) { return ctrl.tagName === 'SELECT' ? 'Silakan pilih salah satu.' : 'Bagian ini wajib diisi.'; }
            if (!v) { return ''; }
            if (ctrl.type === 'tel' && !/^[0-9+\s-]{9,16}$/.test(v)) { return 'Masukkan nomor yang valid, contoh 0812 3456 7890.'; }
            if (ctrl.type === 'email' && !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(v)) { return 'Format email belum benar.'; }
            if (ctrl.type === 'number' && (Number(v) < Number(ctrl.min || 1) || Number(v) > Number(ctrl.max || 1e9))) { return 'Angka di luar batas yang wajar.'; }
            if (ctrl.type === 'date' && ctrl.min && v < ctrl.min) { return 'Pilih tanggal mulai besok.'; }
            if (ctrl.minLength > 0 && v.length < ctrl.minLength) { return 'Minimal ' + ctrl.minLength + ' karakter.'; }
            return '';
        }
        function showProblem(field, msg) {
            field.classList.toggle('is-invalid', !!msg);
            var p = $('[data-err]', field);
            if (p) { p.textContent = msg || ''; }
            ctrlsOf(field).forEach(function (c) { c.setAttribute('aria-invalid', msg ? 'true' : 'false'); });
        }
        function isRequired(field) {
            var g = groupOf(field);
            if (g) { return g.hasAttribute('data-required'); }
            var c = ctrlsOf(field)[0];
            return !!(c && c.required);
        }
        function updateProgress() {
            var req = fields.filter(isRequired);
            var done = req.filter(function (f) { return problem(f) === ''; }).length;
            var p = req.length ? Math.round(done / req.length * 100) : 0;
            if (bar) { bar.style.width = p + '%'; }
            if (pct) { pct.textContent = p + '%'; }
            if (meter) { meter.setAttribute('aria-valuenow', String(p)); }
        }
        function buildLines() {
            var lines = [form.getAttribute('data-wa-intro') || 'Halo Renovaku,', ''];
            var any = false;
            fields.forEach(function (f) {
                var v = fieldValue(f);
                if (!v) { return; }
                any = true;
                lines.push(labelOf(f) + ': ' + v);
            });
            lines.push('', 'Terima kasih.');
            return { lines: lines, any: any };
        }
        var previewQueued = false;
        function updatePreview() {
            if (!preview) { return; }
            var b = buildLines();
            preview.textContent = b.any ? b.lines.join('\n') : placeholderText;
            preview.classList.remove('is-live');
            void preview.offsetWidth;
            if (b.any) { preview.classList.add('is-live'); }
        }
        function refresh() {
            updateProgress();
            if (!previewQueued) { previewQueued = true; raf(function () { previewQueued = false; updatePreview(); }); }
        }

        $$('textarea[data-count]', form).forEach(function (ta) {
            var out = $('[data-count-out]', ta.closest('.hr-field'));
            function c() { if (out) { out.textContent = ta.value.length + '/' + (ta.maxLength > 0 ? ta.maxLength : '∞'); } }
            on(ta, 'input', c); c();
        });

        on(form, 'input', function (e) {
            var f = e.target.closest ? e.target.closest('.hr-field') : null;
            if (f && f.classList.contains('is-invalid')) { showProblem(f, problem(f)); }
            refresh();
        });
        on(form, 'change', function (e) {
            var f = e.target.closest ? e.target.closest('.hr-field') : null;
            if (f && f.classList.contains('is-invalid')) { showProblem(f, problem(f)); }
            refresh();
        });
        on(form, 'focusout', function (e) {
            var f = e.target.closest ? e.target.closest('.hr-field') : null;
            if (f && fieldValue(f) && !groupOf(f)) { showProblem(f, problem(f)); }
        });

        on(form, 'submit', function (e) {
            e.preventDefault();
            var firstBad = null;
            fields.forEach(function (f) {
                var msg = problem(f);
                showProblem(f, msg);
                if (msg && !firstBad) { firstBad = f; }
            });
            if (firstBad) {
                var g = groupOf(firstBad);
                var c = g ? $('input', g) : ctrlsOf(firstBad)[0];
                var target = c && c._hrFocus ? c._hrFocus : c;
                if (target) { target.focus({ preventScroll: true }); }
                firstBad.scrollIntoView({ behavior: reduceMotion ? 'auto' : 'smooth', block: 'center' });
                return;
            }
            var url = waLink(buildLines().lines.join('\n'));
            var ok = $('[data-form-ok]', form);
            var link = $('[data-form-link]', form);
            if (link) { link.href = url; }
            if (ok) { ok.hidden = false; ok.scrollIntoView({ behavior: reduceMotion ? 'auto' : 'smooth', block: 'nearest' }); }
            window.open(url, '_blank', 'noopener');
        });
        refresh();
    });

    /* ---------- 10. Newsletter (frontend saja) ---------- */
    $$('[data-newsletter]').forEach(function (form) {
        var msg = $('[data-newsletter-msg]', form.parentNode);
        on(form, 'submit', function (e) {
            e.preventDefault();
            var input = $('input[type="email"]', form);
            var v = (input.value || '').trim();
            if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(v)) {
                if (msg) { msg.textContent = 'Masukkan alamat email yang valid.'; }
                input.focus();
                return;
            }
            // Hook untuk tim backend: dengarkan event ini untuk menyimpan email.
            form.dispatchEvent(new CustomEvent('hrr:newsletter', { bubbles: true, detail: { email: v } }));
            if (msg) { msg.textContent = 'Terima kasih! Kami akan mengirim kabar terbaru ke ' + v + '.'; }
            form.reset();
        });
    });

    /* ---------- 11. Slider testimoni ---------- */
    $$('[data-testi]').forEach(function (box) {
        var slides = $$('[data-testi-slide]', box);
        var dots = $$('[data-testi-dot]', box);
        var stage = $('.hr-testi__stage', box);
        if (slides.length < 2) { return; }
        var idx = 0, timer = null, hovering = false;
        function show(n) {
            var next = (n + slides.length) % slides.length;
            slides.forEach(function (s, i) {
                s.classList.toggle('is-on', i === next);
                s.classList.toggle('is-prev', i < next);
                s.setAttribute('aria-hidden', i === next ? 'false' : 'true');
            });
            dots.forEach(function (d, i) { d.classList.toggle('is-on', i === next); d.setAttribute('aria-selected', i === next ? 'true' : 'false'); });
            idx = next;
        }
        function play() {
            if (reduceMotion) { return; }
            stop();
            timer = setInterval(function () { if (!hovering && !doc.hidden) { show(idx + 1); } }, 6500);
        }
        function stop() { if (timer) { clearInterval(timer); timer = null; } }
        on($('[data-testi-prev]', box), 'click', function () { show(idx - 1); play(); });
        on($('[data-testi-next]', box), 'click', function () { show(idx + 1); play(); });
        dots.forEach(function (d, i) { on(d, 'click', function () { show(i); play(); }); });
        on(box, 'mouseenter', function () { hovering = true; });
        on(box, 'mouseleave', function () { hovering = false; });
        on(box, 'focusin', function () { hovering = true; });
        on(box, 'focusout', function () { hovering = false; });
        var x0 = null;
        on(stage, 'pointerdown', function (e) { x0 = e.clientX; });
        on(stage, 'pointerup', function (e) {
            if (x0 === null) { return; }
            var dx = e.clientX - x0;
            x0 = null;
            if (Math.abs(dx) > 40) { show(idx + (dx < 0 ? 1 : -1)); play(); }
        });
        show(0);
        play();
    });

    /* ---------- 12. Demo chat (kartu AI Chatbot beranda) ---------- */
    (function () {
        var box = $('[data-demo]');
        var demos = Array.isArray(D.demo) ? D.demo : [];
        if (!box || demos.length < 2 || reduceMotion) { return; }
        var q = $('[data-demo-q]', box), a = $('[data-demo-a]', box);
        var n = 0, timer = null, running = false;
        function type(text, i) {
            if (!running) { return; }
            a.textContent = text.slice(0, i);
            if (i < text.length) { timer = setTimeout(function () { type(text, i + 1); }, 20); }
            else { a.classList.remove('is-typing'); timer = setTimeout(next, 3600); }
        }
        function next() {
            if (!running) { return; }
            n = (n + 1) % demos.length;
            q.textContent = demos[n][0];
            a.textContent = '';
            a.classList.add('is-typing');
            timer = setTimeout(function () { type(demos[n][1], 0); }, 700);
        }
        if ('IntersectionObserver' in window) {
            new IntersectionObserver(function (en) {
                var vis = en[0].isIntersecting;
                if (vis && !running) { running = true; timer = setTimeout(next, 2800); }
                else if (!vis) { running = false; clearTimeout(timer); }
            }, { threshold: 0.3 }).observe(box);
        }
    })();

    /* ---------- 13. Lightbox ---------- */
    (function () {
        if (!lightbox) { return; }
        var img = $('[data-lightbox-img]', lightbox), cap = $('[data-lightbox-cap]', lightbox);
        var prev = $('[data-lightbox-prev]', lightbox), next = $('[data-lightbox-next]', lightbox);
        var group = [], idx = 0, opener = null;
        function render() {
            var it = group[idx];
            img.src = it.getAttribute('data-zoom');
            img.alt = it.getAttribute('data-caption') || '';
            cap.textContent = it.getAttribute('data-caption') || '';
            var multi = group.length > 1;
            prev.hidden = !multi; next.hidden = !multi;
        }
        function open(btn) {
            var g = btn.getAttribute('data-zoom-group');
            group = $$('[data-zoom]').filter(function (b) { return b.getAttribute('data-zoom-group') === g && !b.closest('[hidden]'); });
            idx = Math.max(0, group.indexOf(btn));
            opener = btn;
            render();
            lightbox.hidden = false;
            lock(true);
            $('[data-lightbox-close]', lightbox).focus();
        }
        function close() {
            if (lightbox.hidden) { return; }
            lightbox.hidden = true;
            lock(false);
            if (opener) { opener.focus(); }
        }
        function step(d) { if (group.length > 1) { idx = (idx + d + group.length) % group.length; render(); } }
        $$('[data-zoom]').forEach(function (b) { on(b, 'click', function () { open(b); }); });
        on($('[data-lightbox-close]', lightbox), 'click', close);
        on(prev, 'click', function () { step(-1); });
        on(next, 'click', function () { step(1); });
        on(lightbox, 'mousedown', function (e) { if (e.target === lightbox || e.target.tagName === 'FIGURE') { close(); } });
        on(doc, 'keydown', function (e) {
            if (lightbox.hidden) { return; }
            if (e.key === 'ArrowLeft') { step(-1); }
            else if (e.key === 'ArrowRight') { step(1); }
        });
        lightbox._close = close;
    })();

    /* ---------- 14. Filter proyek ---------- */
    $$('[data-filter]').forEach(function (bar) {
        var btns = $$('[data-filter-btn]', bar);
        var items = $$('[data-filter-item]');
        btns.forEach(function (b) {
            on(b, 'click', function () {
                var f = b.getAttribute('data-filter-btn');
                btns.forEach(function (x) { x.classList.toggle('is-on', x === b); x.setAttribute('aria-pressed', x === b ? 'true' : 'false'); });
                items.forEach(function (it) {
                    var show = f === 'all' || it.getAttribute('data-filter-item') === f;
                    it.hidden = !show;
                    if (show) { it.classList.add('is-in'); }
                });
            });
        });
    });

    /* ---------- 15. Sub-navigasi (aktif berdasarkan klik / hash) ---------- */
    $$('[data-subnav]').forEach(function (nv) {
        var links = $$('[data-spy]', nv);
        var list = $('ul', nv);
        function activate(id) {
            links.forEach(function (a) {
                var isOn = a.getAttribute('data-spy') === id;
                a.classList.toggle('is-active', isOn);
                if (isOn) {
                    a.setAttribute('aria-current', 'true');
                    if (list && list.scrollWidth > list.clientWidth) {
                        list.scrollTo({ left: a.offsetLeft - list.clientWidth / 2 + a.clientWidth / 2, behavior: reduceMotion ? 'auto' : 'smooth' });
                    }
                } else { a.removeAttribute('aria-current'); }
            });
        }
        links.forEach(function (a) {
            on(a, 'click', function () {
                var id = a.getAttribute('data-spy');
                var t = doc.getElementById(id);
                activate(id);
                if (t) { t.classList.add('is-in'); }
            });
        });
        function fromHash() { var h = decodeURIComponent((location.hash || '').slice(1)); if (h) { activate(h); } }
        on(window, 'hashchange', fromHash);
        fromHash();
    });

    /* ---------- 16. Timeline proses ---------- */
    var timeline = $('[data-timeline]');
    var tFill = timeline ? $('[data-timeline-fill]', timeline) : null;
    var tItems = timeline ? $$('[data-timeline-item]', timeline) : [];
    function updateTimeline() {
        if (!timeline || !tFill) { return; }
        var line = window.innerHeight * 0.55;
        var r = timeline.getBoundingClientRect();
        tFill.style.setProperty('--fill', clamp(line - r.top - 24, 0, r.height) + 'px');
        tItems.forEach(function (it) {
            var no = $('.hr-timeline__no', it).getBoundingClientRect();
            it.classList.toggle('is-done', no.top + no.height / 2 < line);
        });
    }
    updateTimeline();

    /* ---------- 17. FAQ: satu terbuka dalam satu waktu ---------- */
    $$('[data-faq]').forEach(function (box) {
        var items = $$('details', box);
        items.forEach(function (d) {
            on(d, 'toggle', function () {
                if (d.open) { items.forEach(function (o) { if (o !== d) { o.open = false; } }); }
            });
        });
    });

    /* ---------- 18. Kembali ke atas ---------- */
    $$('[data-top]').forEach(function (b) {
        on(b, 'click', function () { window.scrollTo({ top: 0, behavior: reduceMotion ? 'auto' : 'smooth' }); });
    });

    /* ---------- 19. AI Chatbot (Obrolan · Estimasi · FAQ) ---------- */
    var askChat = function () { /* diganti di bawah bila panel chat ada */ };
    var openCalc = function () { /* diganti di bawah bila panel chat ada */ };
    if (chatPanel) {
        var log = $('[data-chat-log]', chatPanel);
        var quick = $('[data-chat-quick]', chatPanel);
        var form = $('[data-chat-form]', chatPanel);
        var input = $('[data-chat-input]', chatPanel);
        var fab = $('[data-chat-toggle]');
        var tip = $('[data-chat-tip]');
        var badge = $('[data-chat-badge]');
        var veil = $('[data-chat-veil]');
        var welcome = $('[data-chat-welcome]', chatPanel);
        var greetEl = $('[data-greet]', chatPanel);
        if (greetEl) {
            var hrNow = new Date().getHours();
            greetEl.textContent = (hrNow < 11 ? 'Selamat pagi' : hrNow < 15 ? 'Selamat siang' : hrNow < 18 ? 'Selamat sore' : 'Selamat malam') + '! Saya asisten Renovaku.';
        }
        var welcomeHTML = welcome ? welcome.outerHTML : '';
        var HIST_KEY = 'hrr-chat';
        var history = [];
        function saveHistory() { try { window.sessionStorage.setItem(HIST_KEY, JSON.stringify(history.slice(-40))); } catch (e) { /* abaikan */ } }
        function loadHistory() { try { var h = JSON.parse(window.sessionStorage.getItem(HIST_KEY) || '[]'); return Array.isArray(h) ? h : []; } catch (e) { return []; } }
        var faq = Array.isArray(D.faq) ? D.faq : [];
        var rates = D.estimate || {};
        var tiers = Array.isArray(D.estimate_tiers) ? D.estimate_tiers : [];
        var rateKeys = Object.keys(rates);
        var state = { open: false, step: null, type: null, tab: 'chat', queue: Promise.resolve() };
        var tipTimer = null;
        var tabBtns = $$('[data-chat-tab]', chatPanel);
        var views = $$('[data-view]', chatPanel);
        var tabsNav = $('.hr-chat__tabs', chatPanel);
        var tabOrder = ['chat', 'estimate', 'faq'];

        function faqById(id) { return faq.filter(function (f) { return f.id === id; })[0]; }
        function wait(ms) { return new Promise(function (r) { setTimeout(r, reduceMotion ? 0 : ms); }); }
        function scrollLog() { log.scrollTop = log.scrollHeight; }
        function nowStr() { var d = new Date(); return pad(d.getHours()) + '.' + pad(d.getMinutes()); }

        /* --- Tab --- */
        function setTab(name) {
            if (tabOrder.indexOf(name) === -1) { name = 'chat'; }
            state.tab = name;
            chatPanel.setAttribute('data-tab', name);
            if (tabsNav) { tabsNav.style.setProperty('--ti', tabOrder.indexOf(name)); }
            tabBtns.forEach(function (b) {
                var is = b.getAttribute('data-chat-tab') === name;
                b.setAttribute('aria-selected', is ? 'true' : 'false');
            });
            views.forEach(function (v) {
                var is = v.getAttribute('data-view') === name;
                if (is) {
                    v.hidden = false;
                    setTimeout(function () { v.classList.add('is-on'); }, 24);
                } else if (v.classList.contains('is-on')) {
                    v.classList.remove('is-on');
                    setTimeout(function () { if (state.tab !== v.getAttribute('data-view')) { v.hidden = true; } }, 300);
                }
            });
            if (name === 'chat' && canHover && state.open) { setTimeout(function () { if (input) { input.focus(); } }, 320); }
        }
        tabBtns.forEach(function (b) { on(b, 'click', function () { setTab(b.getAttribute('data-chat-tab')); }); });

        /* --- Obrolan --- */
        function richText(node, text) {
            String(text).split(/(\*\*[^*]+\*\*)/g).forEach(function (part) {
                if (/^\*\*[^*]+\*\*$/.test(part)) { node.appendChild(el('strong', '', part.slice(2, -2))); }
                else if (part) { node.appendChild(doc.createTextNode(part)); }
            });
        }
        function row(role) {
            var r = el('div', 'hr-row-msg hr-row-msg--' + role);
            if (role === 'bot') {
                var av = el('span', 'hr-row-msg__av');
                av.appendChild(svgIcon('bot'));
                r.appendChild(av);
            }
            var col = el('div', 'hr-row-msg__col');
            r.appendChild(col);
            return { row: r, col: col };
        }
        function addUser(text, restoring) {
            if (!restoring) { history.push({ r: 'user', t: text }); saveHistory(); }
            var r = row('user');
            r.col.appendChild(el('div', 'hr-msg hr-msg--user', text));
            r.col.appendChild(el('time', '', nowStr()));
            log.appendChild(r.row);
            scrollLog();
        }
        function actionNode(a) {
            var l = el('a', 'hr-msg__btn' + (a.wa ? ' hr-msg__btn--wa' : ''));
            l.href = a.href;
            if (a.wa) { l.target = '_blank'; l.rel = 'noopener noreferrer'; }
            l.appendChild(svgIcon(a.wa ? 'whatsapp' : 'arrow'));
            l.appendChild(doc.createTextNode(a.label));
            return l;
        }
        function cardsNode(list) {
            var wrap = el('div', 'hr-cards');
            list.forEach(function (c, k) {
                var card = el('div', 'hr-card-mini' + (c.pop ? ' is-pop' : ''));
                card.style.setProperty('--k', k);
                if (c.img) { var im = doc.createElement('img'); im.src = c.img; im.alt = c.title; im.loading = 'lazy'; card.appendChild(im); }
                else if (c.icon) { var ic = el('span', 'hr-card-mini__ico'); ic.appendChild(svgIcon(c.icon)); card.appendChild(ic); }
                if (c.pop) { card.appendChild(el('span', 'hr-card-mini__tag', 'Populer')); }
                var b = el('div', 'hr-card-mini__b');
                b.appendChild(el('b', '', c.title));
                if (c.price) { b.appendChild(el('strong', '', c.price)); }
                if (c.sub) { b.appendChild(el('small', '', c.sub)); }
                if (c.href) { var a = el('a', '', (c.label || 'Lihat') + ' →'); a.href = c.href; b.appendChild(a); }
                card.appendChild(b);
                wrap.appendChild(card);
            });
            return wrap;
        }
        function feedbackNode() {
            var fb = el('div', 'hr-fb');
            fb.appendChild(el('span', '', 'Jawaban ini membantu?'));
            [['thumb-up', 'Membantu', true], ['thumb-down', 'Kurang membantu', false]].forEach(function (d) {
                var b = el('button');
                b.type = 'button';
                b.setAttribute('aria-label', d[1]);
                b.appendChild(svgIcon(d[0]));
                on(b, 'click', function () {
                    fb.classList.add('is-done');
                    var th = el('span', 'hr-fb__thanks', d[2] ? 'Terima kasih! 🙌' : 'Terima kasih masukannya.');
                    if (!d[2]) {
                        var l = el('a', '', 'Bicara dengan tim');
                        l.href = waLink('Halo Renovaku, saya butuh bantuan lebih lanjut.');
                        l.target = '_blank'; l.rel = 'noopener noreferrer';
                        th.appendChild(l);
                    }
                    fb.appendChild(th);
                });
                fb.appendChild(b);
            });
            return fb;
        }
        function addBot(text, actions, result, extra, restoring) {
            if (!restoring) { history.push({ r: 'bot', t: text, a: actions || null, res: result || null, x: extra || null }); saveHistory(); }
            var r = row('bot');
            var m = el('div', 'hr-msg hr-msg--bot');
            richText(m, text);
            if (extra && extra.cards && extra.cards.length) { m.appendChild(cardsNode(extra.cards)); }
            if (result) {
                var box = el('div', 'hr-result');
                box.appendChild(el('b', '', result.range));
                box.appendChild(el('small', '', result.sub));
                m.appendChild(box);
                if (result.note) { m.appendChild(doc.createTextNode(result.note)); }
            }
            if (actions && actions.length) {
                var acts = el('div', 'hr-msg__actions');
                actions.forEach(function (a) {
                    if (a.calc) {
                        var b = el('button', 'hr-msg__btn');
                        b.type = 'button';
                        b.appendChild(svgIcon('sliders'));
                        b.appendChild(doc.createTextNode(a.label));
                        on(b, 'click', function () { setTab('estimate'); });
                        acts.appendChild(b);
                    } else { acts.appendChild(actionNode(a)); }
                });
                m.appendChild(acts);
            }
            if (extra && extra.fb && !restoring) { m.appendChild(feedbackNode()); }
            r.col.appendChild(m);
            r.col.appendChild(el('time', '', nowStr()));
            log.appendChild(r.row);
            scrollLog();
        }
        function botSay(text, actions, result, extra) {
            state.queue = state.queue.then(function () {
                var t = row('bot');
                var bub = el('div', 'hr-msg hr-msg--bot hr-typing');
                bub.innerHTML = '<i></i><i></i><i></i>';
                t.col.appendChild(bub);
                t.row.setAttribute('aria-label', 'Asisten sedang mengetik');
                log.appendChild(t.row);
                scrollLog();
                return wait(450 + Math.min(text.length * 4, 550)).then(function () {
                    t.row.remove();
                    addBot(text, actions, result, extra);
                });
            });
            return state.queue;
        }
        function setQuick(list) {
            quick.textContent = '';
            list.forEach(function (q) {
                var b = el('button', 'hr-qbtn', q.label);
                b.type = 'button';
                on(b, 'click', function () { handle(q.ask || q.label); });
                quick.appendChild(b);
            });
        }
        function mainQuick() {
            setQuick((D.actions || []).map(function (a) { return { label: a.label, ask: a.ask }; }));
        }
        function relatedQuick(id) {
            var rel = ((D.related || {})[id] || []).map(function (rid) {
                if (rid === 'estimasi') { return { label: 'Estimasi Biaya', ask: 'Estimasi Biaya' }; }
                var f = faqById(rid);
                return f ? { label: f.q } : null;
            }).filter(Boolean);
            rel.push({ label: 'Menu utama', ask: 'menu' });
            setQuick(rel);
        }
        function moreQuick() {
            var list = (D.more || []).map(function (id) { var f = faqById(id); return f ? { label: f.q } : null; }).filter(Boolean);
            list.push({ label: 'Menu utama', ask: 'menu' });
            setQuick(list);
        }
        function startEstimate() {
            state.step = 'type';
            state.type = null;
            botSay('Tentu! Pilih jenis pekerjaan yang ingin diperkirakan biayanya:');
            setQuick(rateKeys.map(function (k) { return { label: rates[k].label, ask: rates[k].label }; }));
        }
        function pickType(text) {
            var t = text.toLowerCase();
            for (var i = 0; i < rateKeys.length; i++) {
                var lbl = rates[rateKeys[i]].label.toLowerCase();
                if (t === lbl || t.indexOf(lbl) !== -1) { return rateKeys[i]; }
            }
            return null;
        }
        function finishEstimate(area) {
            var r = rates[state.type];
            var min = area * r.min, max = area * r.max;
            var summary = 'Halo Renovaku, saya ingin konsultasi ' + r.label + ' ± ' + area + ' m² (estimasi chatbot ' + rupiah(min) + ' – ' + rupiah(max) + ').';
            botSay('**Estimasi awal ' + r.label + '**',
                [
                    { label: 'Booking survei', href: (D.links || {})['booking-survei'] || '#' },
                    { label: 'Minta penawaran', href: (D.links || {})['permintaan-penawaran'] || '#' },
                    { label: 'Kirim ke WhatsApp', href: waLink(summary), wa: true },
                    { label: 'Atur lewat kalkulator', calc: true }
                ],
                { range: rupiah(min) + ' – ' + rupiah(max), sub: r.label + ' · ' + area + ' m²', note: 'Ini perkiraan kasar. Biaya final ditentukan setelah survei lokasi dan pemilihan material.' });
            state.step = null;
            state.type = null;
            mainQuick();
        }
        function matchFaq(t) {
            var best = null, bestScore = 0;
            faq.forEach(function (f) {
                var score = 0;
                if (t === f.q.toLowerCase()) { score += 10; }
                f.keys.forEach(function (k) { if (t.indexOf(k) !== -1) { score += 1; } });
                if (score > bestScore) { best = f; bestScore = score; }
            });
            return best;
        }
        function fallback() {
            botSay('Maaf, saya belum menemukan jawaban yang pas. Coba pilih topik di bawah, buka tab FAQ, atau tanyakan langsung ke tim kami lewat WhatsApp.',
                [{ label: 'Tanya via WhatsApp', href: waLink('Halo Renovaku, saya ingin bertanya seputar layanan renovasi.'), wa: true }]);
            mainQuick();
        }
        function handle(raw) {
            var text = String(raw || '').replace(/\s+/g, ' ').trim().slice(0, 200);
            if (!text) { return; }
            if (state.tab !== 'chat') { setTab('chat'); }
            addUser(text);
            var t = text.toLowerCase();

            if (/^(menu|batal|kembali)/.test(t)) {
                state.step = null;
                botSay('Baik, kembali ke menu utama. Apa yang ingin Anda ketahui?');
                mainQuick();
                return;
            }
            if (state.step === 'type') {
                var key = pickType(text);
                if (key) {
                    state.type = key;
                    state.step = 'area';
                    botSay('Berapa luas area yang akan dikerjakan (dalam m²)? Contoh: 36');
                    setQuick([{ label: '20 m²', ask: '20' }, { label: '36 m²', ask: '36' }, { label: '60 m²', ask: '60' }, { label: '100 m²', ask: '100' }, { label: 'Batal', ask: 'batal' }]);
                } else {
                    botSay('Silakan pilih salah satu jenis pekerjaan di bawah ini.');
                }
                return;
            }
            if (state.step === 'area') {
                var n = parseFloat(t.replace(',', '.').replace(/[^0-9.]/g, ''));
                if (isFinite(n) && n >= 1 && n <= 5000) { finishEstimate(Math.round(n * 10) / 10); }
                else { botSay('Mohon masukkan angka luas antara 1 dan 5000 m², misalnya 36.'); }
                return;
            }
            if (/estimasi|biaya|hitung|kalkulator|\brab\b/.test(t) && !/penawaran/.test(t)) { startEstimate(); return; }
            if (/^(faq lainnya|lainnya|faq|bantuan)$/.test(t)) {
                botSay('Berikut pertanyaan yang sering diajukan. Pilih salah satu, buka tab FAQ, atau ketik pertanyaan Anda.');
                moreQuick();
                return;
            }
            var hit = matchFaq(t);
            if (hit) {
                var acts = hit.link && (D.links || {})[hit.link] ? [{ label: hit.link_label || 'Selengkapnya', href: D.links[hit.link] }] : [];
                var cardList = (D.cards || {})[hit.id];
                botSay(hit.a, acts, null, { cards: cardList || null, fb: true });
                relatedQuick(hit.id);
            } else {
                fallback();
            }
        }

        /* --- Kalkulator estimasi --- */
        var calc = $('[data-calc]', chatPanel);
        if (calc && rateKeys.length) {
            var cType = rateKeys[0], cTier = tiers[0] ? tiers[0].id : 'basic';
            var area = $('[data-calc-area]', calc);
            var areaOut = $('[data-calc-area-out]', calc);
            var rangeOut = $('[data-calc-range]', calc);
            var noteOut = $('[data-calc-note]', calc);
            var barOut = $('[data-calc-bar]', calc);
            var waBtn = $('[data-calc-wa]', calc);
            var aMin = Number(calc.getAttribute('data-min')) || 10, aMax = Number(calc.getAttribute('data-max')) || 300;
            var maxRate = 0, maxMult = 1;
            rateKeys.forEach(function (k) { maxRate = Math.max(maxRate, rates[k].max); });
            tiers.forEach(function (t) { maxMult = Math.max(maxMult, t.mult); });
            var refMax = aMax * maxRate * maxMult;
            function tierOf(id) { return tiers.filter(function (t) { return t.id === id; })[0] || { id: 'basic', label: 'Basic', mult: 1 }; }
            function round10k(n) { return Math.round(n / 10000) * 10000; }
            function calcUpdate() {
                var r = rates[cType], tr = tierOf(cTier), a = Number(area.value);
                var min = round10k(a * r.min * tr.mult), max = round10k(a * r.max * tr.mult);
                areaOut.textContent = a + ' m²';
                rangeOut.textContent = rupiah(min) + ' – ' + rupiah(max);
                rangeOut.classList.remove('is-bump');
                void rangeOut.offsetWidth;
                rangeOut.classList.add('is-bump');
                noteOut.textContent = r.label + ' · finishing ' + tr.label + ' · ± ' + rupiah(r.min * tr.mult) + ' – ' + rupiah(r.max * tr.mult) + ' per m²';
                barOut.style.width = clamp(Math.sqrt(max / refMax) * 100, 6, 100).toFixed(1) + '%';
                area.style.setProperty('--fill', ((a - aMin) / (aMax - aMin) * 100).toFixed(1) + '%');
                waBtn.href = waLink('Halo Renovaku, saya ingin konsultasi ' + r.label + ' ± ' + a + ' m² finishing ' + tr.label + ' (estimasi kalkulator ' + rupiah(min) + ' – ' + rupiah(max) + ').');
            }
            $$('[data-calc-type]', calc).forEach(function (b) {
                on(b, 'click', function () {
                    cType = b.getAttribute('data-calc-type');
                    $$('[data-calc-type]', calc).forEach(function (x) { var is = x === b; x.classList.toggle('is-on', is); x.setAttribute('aria-pressed', is ? 'true' : 'false'); });
                    calcUpdate();
                });
            });
            $$('[data-calc-tier]', calc).forEach(function (b) {
                on(b, 'click', function () {
                    cTier = b.getAttribute('data-calc-tier');
                    $$('[data-calc-tier]', calc).forEach(function (x) { var is = x === b; x.classList.toggle('is-on', is); x.setAttribute('aria-pressed', is ? 'true' : 'false'); });
                    calcUpdate();
                });
            });
            $$('[data-calc-step]', calc).forEach(function (b) {
                on(b, 'click', function () { area.value = clamp(Number(area.value) + Number(b.getAttribute('data-calc-step')), aMin, aMax); calcUpdate(); });
            });
            on(area, 'input', calcUpdate);
            on($('[data-calc-copy]', calc), 'click', function (e) {
                var btn = e.currentTarget, r = rates[cType], tr = tierOf(cTier);
                var txt = 'Estimasi Renovaku — ' + r.label + ', ' + area.value + ' m², finishing ' + tr.label + ': ' + rangeOut.textContent + ' (perkiraan awal, biaya final setelah survei).';
                var done = function () { var sp = $('span', btn); var old = sp.textContent; sp.textContent = 'Tersalin!'; setTimeout(function () { sp.textContent = old; }, 1600); };
                if (navigator.clipboard && navigator.clipboard.writeText) { navigator.clipboard.writeText(txt).then(done, function () { /* izin ditolak */ }); }
                else {
                    var ta = doc.createElement('textarea'); ta.value = txt; ta.setAttribute('readonly', ''); ta.style.position = 'fixed'; ta.style.opacity = '0';
                    doc.body.appendChild(ta); ta.select();
                    try { doc.execCommand('copy'); done(); } catch (err) { /* abaikan */ }
                    doc.body.removeChild(ta);
                }
            });
            calcUpdate();
        }

        /* --- FAQ --- */
        var faqList = $('[data-faqv-list]', chatPanel);
        var faqSearch = $('[data-faqv-q]', chatPanel);
        var faqEmpty = $('[data-faqv-empty]', chatPanel);
        var faqItems = [];
        var faqCat = 'Semua';
        var faqCatsBox = $('[data-faqv-cats]', chatPanel);
        function applyFaqFilter() {
            var term = faqSearch ? faqSearch.value.toLowerCase().trim() : '';
            var shown = 0;
            faqItems.forEach(function (it) {
                var okCat = faqCat === 'Semua' || it.cat === faqCat;
                var okTerm = !term || term.split(/\s+/).every(function (w) { return it.hay.indexOf(w) !== -1; });
                it.li.hidden = !(okCat && okTerm);
                if (!it.li.hidden) { shown++; }
            });
            if (faqEmpty) { faqEmpty.hidden = shown !== 0; }
        }
        if (faqList) {
            if (faqCatsBox && Array.isArray(D.cats)) {
                D.cats.forEach(function (c, i) {
                    var b = el('button', i === 0 ? 'is-on' : '', c);
                    b.type = 'button';
                    on(b, 'click', function () {
                        faqCat = c;
                        $$('button', faqCatsBox).forEach(function (x) { x.classList.toggle('is-on', x === b); });
                        applyFaqFilter();
                    });
                    faqCatsBox.appendChild(b);
                });
            }
            faq.forEach(function (f, i) {
                var li = el('li', 'hr-faqv__item');
                li.style.setProperty('--i', i);
                var q = el('button', 'hr-faqv__q');
                q.type = 'button';
                q.setAttribute('aria-expanded', 'false');
                q.appendChild(el('span', '', f.q));
                q.appendChild(svgIcon('chevron'));
                var a = el('div', 'hr-faqv__a');
                var inner = el('div');
                inner.appendChild(el('p', '', f.a));
                var acts = el('div', 'hr-msg__actions');
                if (f.link && (D.links || {})[f.link]) { acts.appendChild(actionNode({ label: f.link_label || 'Selengkapnya', href: D.links[f.link] })); }
                var ask = el('button', 'hr-msg__btn');
                ask.type = 'button';
                ask.appendChild(svgIcon('bot'));
                ask.appendChild(doc.createTextNode('Tanya di chat'));
                on(ask, 'click', function () { handle(f.q); });
                acts.appendChild(ask);
                inner.appendChild(acts);
                a.appendChild(inner);
                li.appendChild(q); li.appendChild(a);
                on(q, 'click', function () {
                    var open = !li.classList.contains('is-open');
                    faqItems.forEach(function (it) { it.li.classList.remove('is-open'); it.q.setAttribute('aria-expanded', 'false'); });
                    li.classList.toggle('is-open', open);
                    q.setAttribute('aria-expanded', open ? 'true' : 'false');
                });
                faqList.appendChild(li);
                faqItems.push({ li: li, q: q, cat: f.cat || 'Lainnya', hay: (f.q + ' ' + f.a + ' ' + f.keys.join(' ')).toLowerCase() });
            });
            on(faqSearch, 'input', applyFaqFilter);
            on($('[data-faqv-ask]', chatPanel), 'click', function () { var v = faqSearch.value.trim(); if (v) { handle(v); } else { setTab('chat'); } });
        }

        /* --- Buka / tutup panel --- */
        function hideTip() { if (tip) { tip.hidden = true; } clearTimeout(tipTimer); store('hrr-tip', '1'); }
        function openChat(tab) {
            if (!state.open) {
                state.open = true;
                chatPanel.hidden = false;
                chatPanel.setAttribute('aria-hidden', 'false');
                if (fab) { fab.setAttribute('aria-expanded', 'true'); fab.setAttribute('aria-label', 'Tutup AI Chatbot Renovaku'); }
                if (veil) { veil.hidden = false; }
                root.classList.add('hr-chat-open');
                if (badge) { badge.hidden = true; }
                hideTip();
                setTimeout(function () { chatPanel.classList.add('is-open'); }, 24);
            }
            setTab(tab || state.tab);
        }
        function closeChat() {
            if (!state.open) { return; }
            state.open = false;
            chatPanel.classList.remove('is-open');
            chatPanel.setAttribute('aria-hidden', 'true');
            if (fab) { fab.setAttribute('aria-expanded', 'false'); fab.setAttribute('aria-label', 'Buka AI Chatbot Renovaku'); }
            if (veil) { veil.hidden = true; }
            root.classList.remove('hr-chat-open');
            setTimeout(function () { if (!state.open) { chatPanel.hidden = true; } }, 340);
        }
        function resetChat() {
            history = [];
            saveHistory();
            log.textContent = '';
            if (welcomeHTML) { log.insertAdjacentHTML('beforeend', welcomeHTML); }
            quick.textContent = '';
            state.step = null;
            state.type = null;
            state.queue = Promise.resolve();
            if (input) { input.value = ''; }
            setTab('chat');
        }
        openCalc = function () {
            if (nav && nav.classList.contains('is-open')) { setNav(false); }
            openChat('estimate');
        };
        askChat = function (text) {
            if (nav && nav.classList.contains('is-open')) { setNav(false); }
            if (/^estimasi biaya$/i.test(String(text).trim())) { openCalc(); return; }
            openChat('chat');
            handle(text);
        };

        on($('[data-chat-expand]', chatPanel), 'click', function (e) {
            var b = e.currentTarget, wide = !chatPanel.classList.contains('is-wide');
            chatPanel.classList.toggle('is-wide', wide);
            b.setAttribute('aria-pressed', wide ? 'true' : 'false');
            b.setAttribute('aria-label', wide ? 'Perkecil panel' : 'Perbesar panel');
            var u = $('use', b);
            if (u) { u.setAttribute('href', wide ? '#i-shrink' : '#i-expand'); }
        });
        on(fab, 'click', function () { state.open ? closeChat() : openChat(); });
        on(veil, 'click', closeChat);
        $$('[data-chat-open]').forEach(function (b) { on(b, 'click', function () { openChat('chat'); }); });
        $$('[data-chat-close]').forEach(function (b) { on(b, 'click', closeChat); });
        $$('[data-chat-reset]').forEach(function (b) { on(b, 'click', resetChat); });
        on($('[data-chat-tip-close]'), 'click', hideTip);
        on(doc, 'click', function (e) {
            var b = e.target.closest ? e.target.closest('[data-chat-ask]') : null;
            if (b) { e.preventDefault(); hideTip(); askChat(b.getAttribute('data-chat-ask')); }
        });
        on(form, 'submit', function (e) {
            e.preventDefault();
            var v = input.value;
            input.value = '';
            handle(v);
        });

        // Saran otomatis (sekali per sesi) + lencana notifikasi
        if (badge && store('hrr-tip') === '1') { badge.hidden = true; }
        if (tip && store('hrr-tip') !== '1' && !reduceMotion) {
            tipTimer = setTimeout(function () {
                if (!state.open) {
                    tip.hidden = false;
                    tipTimer = setTimeout(function () { tip.hidden = true; }, 12000);
                }
            }, 7000);
        }
        // Pulihkan percakapan sebelumnya (satu sesi tab)
        history = loadHistory();
        if (history.length) {
            if (badge) { badge.hidden = true; }
            history.forEach(function (h) {
                if (h.r === 'user') { addUser(h.t, true); }
                else { addBot(h.t, h.a, h.res, h.x, true); }
            });
            mainQuick();
        }
        setTab('chat');
    }

    /* ---------- 20. Hitung naik harga paket + efek miring kartu ---------- */
    (function () {
        var prices = $$('[data-price]');
        if (prices.length && 'IntersectionObserver' in window && !reduceMotion) {
            var pio = new IntersectionObserver(function (entries) {
                entries.forEach(function (en) {
                    if (!en.isIntersecting) { return; }
                    pio.unobserve(en.target);
                    var node = en.target, finalText = node.textContent, target = Number(node.getAttribute('data-price')), t0 = null;
                    if (!target) { return; }
                    (function step(t) {
                        if (t0 === null) { t0 = t; }
                        var k = clamp((t - t0) / 1100, 0, 1), e = 1 - Math.pow(1 - k, 3);
                        node.textContent = k < 1 ? rupiah(target * e) : finalText;
                        if (k < 1) { requestAnimationFrame(step); }
                    })(performance.now());
                });
            }, { threshold: 0.6 });
            prices.forEach(function (n) { pio.observe(n); });
        }
        if (canHover && !reduceMotion) {
            $$('[data-tilt]').forEach(function (card) {
                var base = card.classList.contains('is-popular') ? -6 : 0;
                on(card, 'pointermove', function (e) {
                    var r = card.getBoundingClientRect();
                    var x = (e.clientX - r.left) / r.width - 0.5, y = (e.clientY - r.top) / r.height - 0.5;
                    card.style.transform = 'perspective(900px) translateY(' + (base - 6) + 'px) rotateX(' + (-y * 6).toFixed(2) + 'deg) rotateY(' + (x * 8).toFixed(2) + 'deg)';
                });
                on(card, 'pointerleave', function () { card.style.transform = ''; });
            });
        }
    })();

    /* ---------- 22. Animasi lanjutan ---------- */
    (function () {
        /* Judul hero: huruf muncul berurutan, lalu dikembalikan agar kilau gradien aktif */
        var title = $('.hr-hero__title');
        if (title && !reduceMotion) {
            var origHTML = title.innerHTML, count = 0;
            var split = function (node) {
                Array.prototype.slice.call(node.childNodes).forEach(function (n) {
                    if (n.nodeType === 3) {
                        var frag = doc.createDocumentFragment();
                        n.textContent.split(/(\s+)/).forEach(function (part) {
                            if (!part) { return; }
                            if (/^\s+$/.test(part)) { frag.appendChild(doc.createTextNode(' ')); return; }
                            var w = el('span', 'w');
                            part.split('').forEach(function (chr) {
                                var s = el('span', 'ch', chr);
                                s.style.setProperty('--c', count++);
                                s.setAttribute('aria-hidden', 'true');
                                w.appendChild(s);
                            });
                            frag.appendChild(w);
                        });
                        node.replaceChild(frag, n);
                    } else if (n.nodeType === 1 && !(n.classList && n.classList.contains('hr-sparkle'))) {
                        split(n);
                    }
                });
            };
            title.setAttribute('aria-label', title.textContent.replace(/\s+/g, ' ').trim());
            split(title);
            title.classList.add('is-split');
            setTimeout(function () {
                if (title.classList.contains('is-split')) { title.classList.remove('is-split'); title.innerHTML = origHTML; title.removeAttribute('aria-label'); }
            }, 1100 + count * 26);
        }

        /* Kilau yang mengikuti kursor pada kartu */
        if (canHover && !reduceMotion) {
            $$('.hr-card, .hr-svc, .hr-pkgcard, .hr-proj').forEach(function (card) {
                var g = el('span', 'hr-glare');
                g.setAttribute('aria-hidden', 'true');
                card.insertBefore(g, card.firstChild);
                on(card, 'pointermove', function (e) {
                    var r = card.getBoundingClientRect();
                    card.style.setProperty('--mx', (e.clientX - r.left).toFixed(0) + 'px');
                    card.style.setProperty('--my', (e.clientY - r.top).toFixed(0) + 'px');
                });
            });

            /* Tombol magnetis */
            $$('.hr-btn--lg, .hr-fab').forEach(function (b) {
                on(b, 'pointermove', function (e) {
                    var r = b.getBoundingClientRect();
                    var dx = (e.clientX - (r.left + r.width / 2)) / r.width, dy = (e.clientY - (r.top + r.height / 2)) / r.height;
                    b.style.translate = (dx * 10).toFixed(1) + 'px ' + (dy * 8).toFixed(1) + 'px';
                });
                on(b, 'pointerleave', function () { b.style.translate = ''; });
            });
        }

        /* Transisi antar halaman: panel hijau menyapu layar */
        if (!reduceMotion) {
            if (store('hrr-wipe') === '1') {
                root.classList.add('hr-entering');
                store('hrr-wipe', '0');
                setTimeout(function () { root.classList.remove('hr-entering'); }, 1200);
            }
            on(doc, 'click', function (e) {
                var a = e.target.closest ? e.target.closest('a[href]') : null;
                if (!a || e.defaultPrevented || e.button !== 0 || e.metaKey || e.ctrlKey || e.shiftKey || e.altKey) { return; }
                if ((a.target && a.target !== '_self') || a.hasAttribute('download')) { return; }
                var url;
                try { url = new URL(a.href, window.location.href); } catch (err) { return; }
                if (url.origin !== window.location.origin) { return; }
                if (url.pathname === window.location.pathname && url.search === window.location.search) { return; }
                e.preventDefault();
                store('hrr-wipe', '1');
                root.classList.add('hr-leaving');
                setTimeout(function () { window.location.href = a.href; }, 480);
            });
            on(window, 'pageshow', function (e) { if (e.persisted) { root.classList.remove('hr-leaving'); } });
        }
    })();

    /* ---------- 21. Escape menutup panel yang terbuka ---------- */
    on(doc, 'keydown', function (e) {
        if (e.key !== 'Escape') { return; }
        if (lightbox && !lightbox.hidden && lightbox._close) { lightbox._close(); return; }
        if (searchBox && !searchBox.hidden) { setSearch(false); return; }
        if (nav && nav.classList.contains('is-open')) { setNav(false); return; }
        if (chatPanel && !chatPanel.hidden) {
            var c = $('[data-chat-close]', chatPanel);
            if (c) { c.click(); }
        }
    });

    onScroll();
})();
