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

    /* ---------- 4. Pencarian cepat ---------- */
    var sInput = $('[data-search-input]');
    var sBody = $('[data-search-results]');
    var sClear = $('[data-search-clear]');
    var sSel = -1;

    function appendHighlight(node, text, words) {
        if (!words.length) { node.appendChild(doc.createTextNode(text)); return; }
        var lower = text.toLowerCase(), pos = 0;
        while (pos < text.length) {
            var best = -1, bestLen = 0;
            for (var i = 0; i < words.length; i++) {
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
    function selectItem(n) {
        var items = $$('.hr-sitem', sBody);
        if (!items.length) { sSel = -1; return; }
        sSel = (n + items.length) % items.length;
        items.forEach(function (it, i) {
            it.classList.toggle('is-sel', i === sSel);
            it.setAttribute('aria-selected', i === sSel ? 'true' : 'false');
        });
        var cur = items[sSel];
        if (cur && cur.scrollIntoView) { cur.scrollIntoView({ block: 'nearest' }); }
    }
    function renderSearch(q) {
        if (!sBody) { return; }
        var items = Array.isArray(D.search) ? D.search : [];
        var term = (q || '').toLowerCase().trim();
        var words = term ? term.split(/\s+/) : [];
        var found;
        if (!term) {
            found = items.filter(function (it) { return it.g === 'Halaman' || it.g === 'Paket'; }).slice(0, 8);
        } else {
            found = items.map(function (it) {
                var t = it.t.toLowerCase(), d = it.d.toLowerCase(), score = 0;
                words.forEach(function (w) {
                    if (t.indexOf(w) === 0) { score += 5; }
                    else if (t.indexOf(w) !== -1) { score += 3; }
                    else if (d.indexOf(w) !== -1) { score += 1; }
                    else { score -= 20; }
                });
                return { it: it, score: score };
            }).filter(function (x) { return x.score > 0; })
                .sort(function (a, b) { return b.score - a.score; })
                .slice(0, 10)
                .map(function (x) { return x.it; });
        }
        sBody.textContent = '';
        if (sClear) { sClear.hidden = !term; }
        if (!found.length) {
            var empty = el('div', 'hr-search__empty');
            var s = el('strong', '', 'Tidak ada hasil untuk “' + q + '”');
            var p = el('span', '', 'Coba kata lain seperti “paket”, “survei”, atau “garansi”, atau tanyakan ke asisten AI kami.');
            var b = el('button', 'hr-btn hr-btn--primary hr-btn--sm');
            b.type = 'button';
            b.setAttribute('data-search-ask', q);
            b.appendChild(svgIcon('bot'));
            b.appendChild(el('span', '', 'Tanya AI Chatbot'));
            empty.appendChild(s); empty.appendChild(p); empty.appendChild(b);
            sBody.appendChild(empty);
            sSel = -1;
            return;
        }
        var groups = {}, order = [];
        found.forEach(function (it) {
            var g = it.g || 'Halaman';
            if (!groups[g]) { groups[g] = []; order.push(g); }
            groups[g].push(it);
        });
        order.forEach(function (g) {
            var sec = el('div', 'hr-sgroup');
            sec.appendChild(el('h4', '', g));
            groups[g].forEach(function (it) {
                var a = el('a', 'hr-sitem');
                a.href = it.u;
                a.setAttribute('role', 'option');
                var ico = el('span', 'hr-sitem__ico');
                ico.appendChild(svgIcon(it.i || 'search'));
                var box = el('span', 'hr-sitem__txt');
                var st = el('strong'); appendHighlight(st, it.t, words);
                var sm = el('small'); appendHighlight(sm, it.d, words);
                box.appendChild(st); box.appendChild(sm);
                a.appendChild(ico); a.appendChild(box); a.appendChild(svgIcon('arrow'));
                on(a, 'mousemove', function () {
                    var all = $$('.hr-sitem', sBody);
                    var n = all.indexOf(a);
                    if (n !== sSel) { selectItem(n); }
                });
                on(a, 'click', function () { setSearch(false); });
                sec.appendChild(a);
            });
            sBody.appendChild(sec);
        });
        selectItem(0);
    }
    function setSearch(open) {
        if (!searchBox || searchBox.hidden === !open) { return; }
        searchBox.hidden = !open;
        root.classList.toggle('hr-lock', open || (nav && nav.classList.contains('is-open')));
        lock(open);
        if (open) {
            if (sInput) { sInput.value = ''; }
            renderSearch('');
            setTimeout(function () { if (sInput) { sInput.focus(); } }, 30);
        }
    }
    $$('[data-search-open]').forEach(function (b) { on(b, 'click', function () { setNav(false); setSearch(true); }); });
    $$('[data-search-close]').forEach(function (b) { on(b, 'click', function () { setSearch(false); }); });
    on(searchBox, 'mousedown', function (e) { if (e.target === searchBox) { setSearch(false); } });
    on(sInput, 'input', function () { renderSearch(sInput.value); });
    on(sClear, 'click', function () { sInput.value = ''; renderSearch(''); sInput.focus(); });
    $$('[data-search-q]').forEach(function (b) {
        on(b, 'click', function () { sInput.value = b.getAttribute('data-search-q'); renderSearch(sInput.value); sInput.focus(); });
    });
    on($('[data-search-form]'), 'submit', function (e) {
        e.preventDefault();
        var items = $$('.hr-sitem', sBody);
        if (items[sSel]) { window.location.href = items[sSel].href; }
        else if (sInput.value.trim()) { askChat(sInput.value.trim()); setSearch(false); }
    });
    on(sInput, 'keydown', function (e) {
        if (e.key === 'ArrowDown') { e.preventDefault(); selectItem(sSel + 1); }
        else if (e.key === 'ArrowUp') { e.preventDefault(); selectItem(sSel - 1); }
    });
    on(sBody, 'click', function (e) {
        var b = e.target.closest ? e.target.closest('[data-search-ask]') : null;
        if (b) { var q = b.getAttribute('data-search-ask'); setSearch(false); askChat(q); }
    });
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

    /* ---------- 19. AI Chatbot (Service & Estimate FAQ) ---------- */
    var askChat = function () { /* diganti di bawah bila panel chat ada */ };
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
        var welcomeHTML = welcome ? welcome.outerHTML : '';
        var faq = Array.isArray(D.faq) ? D.faq : [];
        var rates = D.estimate || {};
        var rateKeys = Object.keys(rates);
        var state = { open: false, step: null, type: null, queue: Promise.resolve() };
        var tipTimer = null;

        function faqById(id) { return faq.filter(function (f) { return f.id === id; })[0]; }
        function wait(ms) { return new Promise(function (r) { setTimeout(r, reduceMotion ? 0 : ms); }); }
        function scrollLog() { log.scrollTop = log.scrollHeight; }
        function nowStr() { var d = new Date(); return pad(d.getHours()) + '.' + pad(d.getMinutes()); }

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
        function addUser(text) {
            var r = row('user');
            r.col.appendChild(el('div', 'hr-msg hr-msg--user', text));
            r.col.appendChild(el('time', '', nowStr()));
            log.appendChild(r.row);
            scrollLog();
        }
        function addBot(text, actions, result) {
            var r = row('bot');
            var m = el('div', 'hr-msg hr-msg--bot');
            richText(m, text);
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
                    var l = el('a', 'hr-msg__btn' + (a.wa ? ' hr-msg__btn--wa' : ''));
                    l.href = a.href;
                    if (a.wa) { l.target = '_blank'; l.rel = 'noopener noreferrer'; }
                    l.appendChild(svgIcon(a.wa ? 'whatsapp' : 'arrow'));
                    l.appendChild(doc.createTextNode(a.label));
                    acts.appendChild(l);
                });
                m.appendChild(acts);
            }
            r.col.appendChild(m);
            r.col.appendChild(el('time', '', nowStr()));
            log.appendChild(r.row);
            scrollLog();
        }
        function botSay(text, actions, result) {
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
                    addBot(text, actions, result);
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
                    { label: 'Kirim ke WhatsApp', href: waLink(summary), wa: true }
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
            botSay('Maaf, saya belum menemukan jawaban yang pas. Coba pilih topik di bawah, atau tanyakan langsung ke tim kami lewat WhatsApp.',
                [{ label: 'Tanya via WhatsApp', href: waLink('Halo Renovaku, saya ingin bertanya seputar layanan renovasi.'), wa: true }]);
            mainQuick();
        }
        function handle(raw) {
            var text = String(raw || '').replace(/\s+/g, ' ').trim().slice(0, 200);
            if (!text) { return; }
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
                botSay('Berikut pertanyaan yang sering diajukan. Pilih salah satu, atau ketik pertanyaan Anda.');
                moreQuick();
                return;
            }
            var hit = matchFaq(t);
            if (hit) {
                var acts = hit.link && (D.links || {})[hit.link] ? [{ label: hit.link_label || 'Selengkapnya', href: D.links[hit.link] }] : [];
                botSay(hit.a, acts);
                mainQuick();
            } else {
                fallback();
            }
        }

        function hideTip() { if (tip) { tip.hidden = true; } clearTimeout(tipTimer); store('hrr-tip', '1'); }
        function openChat() {
            if (state.open) { return; }
            state.open = true;
            chatPanel.hidden = false;
            chatPanel.setAttribute('aria-hidden', 'false');
            if (fab) { fab.setAttribute('aria-expanded', 'true'); }
            if (veil) { veil.hidden = false; }
            root.classList.add('hr-chat-open');
            if (badge) { badge.hidden = true; }
            hideTip();
            raf(function () { chatPanel.classList.add('is-open'); });
            if (canHover) { setTimeout(function () { if (input) { input.focus(); } }, 340); }
        }
        function closeChat() {
            if (!state.open) { return; }
            state.open = false;
            chatPanel.classList.remove('is-open');
            chatPanel.setAttribute('aria-hidden', 'true');
            if (fab) { fab.setAttribute('aria-expanded', 'false'); }
            if (veil) { veil.hidden = true; }
            root.classList.remove('hr-chat-open');
            setTimeout(function () { if (!state.open) { chatPanel.hidden = true; } }, 320);
        }
        function resetChat() {
            log.textContent = '';
            if (welcomeHTML) { log.insertAdjacentHTML('beforeend', welcomeHTML); }
            quick.textContent = '';
            state.step = null;
            state.type = null;
            state.queue = Promise.resolve();
            if (input) { input.value = ''; }
        }
        askChat = function (text) {
            if (nav && nav.classList.contains('is-open')) { setNav(false); }
            openChat();
            handle(text);
        };

        on(fab, 'click', function () { state.open ? closeChat() : openChat(); });
        on(veil, 'click', closeChat);
        $$('[data-chat-open]').forEach(function (b) { on(b, 'click', function () { openChat(); }); });
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
    }

    /* ---------- 20. Escape menutup panel yang terbuka ---------- */
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
