/* ==========================================================================
   AgroHarvest - Agribisnis (Organic / Earth Tone)
   Vanilla JS tanpa dependensi. Setiap modul aman dijalankan walau elemennya
   tidak ada di halaman. Semua teks dari data dimasukkan via textContent (aman XSS).
   ========================================================================== */
(function () {
    'use strict';

    var doc = document;
    var root = doc.documentElement;
    root.classList.add('js');

    var $ = function (sel, ctx) { return (ctx || doc).querySelector(sel); };
    var $$ = function (sel, ctx) { return Array.prototype.slice.call((ctx || doc).querySelectorAll(sel)); };
    var reduceMotion = window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches;

    var cfg = {};
    try { cfg = JSON.parse(doc.getElementById('agConfig').textContent) || {}; } catch (e) { cfg = {}; }
    var urls = cfg.urls || {};
    var params = new URLSearchParams(window.location.search);
    var SVGNS = 'http://www.w3.org/2000/svg';

    function icon(name, cls) {
        var svg = doc.createElementNS(SVGNS, 'svg');
        svg.setAttribute('class', 'ico' + (cls ? ' ' + cls : ''));
        var use = doc.createElementNS(SVGNS, 'use');
        use.setAttribute('href', '#i-' + name);
        svg.appendChild(use);
        return svg;
    }
    function el(tag, cls, text) {
        var n = doc.createElement(tag);
        if (cls) { n.className = cls; }
        if (text != null) { n.textContent = text; }
        return n;
    }
    function safeStorage(action, key, value) {
        try {
            if (action === 'get') { return window.sessionStorage.getItem(key); }
            window.sessionStorage.setItem(key, value);
        } catch (e) { /* storage tidak tersedia */ }
        return null;
    }
    function normalize(t) {
        return String(t || '').toLowerCase().replace(/[^a-z0-9\s]/g, ' ').replace(/\s+/g, ' ').trim();
    }

    /* ---------- Dropdown (navbar & bahasa) ------------------------------------ */
    var openDropdown = null;
    function closeDropdown(dd, returnFocus) {
        if (!dd) { return; }
        var menu = $('.dd', dd);
        var toggle = $('[data-dd-toggle]', dd);
        if (menu) { menu.hidden = true; }
        if (toggle) {
            toggle.setAttribute('aria-expanded', 'false');
            if (returnFocus) { toggle.focus(); }
        }
        if (openDropdown === dd) { openDropdown = null; }
    }
    function showDropdown(dd) {
        if (openDropdown && openDropdown !== dd) { closeDropdown(openDropdown); }
        var menu = $('.dd', dd);
        var toggle = $('[data-dd-toggle]', dd);
        if (menu) { menu.hidden = false; }
        if (toggle) { toggle.setAttribute('aria-expanded', 'true'); }
        openDropdown = dd;
    }
    (function dropdowns() {
        var isDesktop = function () { return window.innerWidth > 1100; };
        $$('[data-dd]').forEach(function (dd) {
            var toggle = $('[data-dd-toggle]', dd);
            var menu = $('.dd', dd);
            var timer = null;
            var hoverAt = 0;
            if (!toggle || !menu) { return; }

            toggle.addEventListener('click', function (e) {
                e.preventDefault();
                if (menu.hidden) { showDropdown(dd); }
                else if (Date.now() - hoverAt > 700) { closeDropdown(dd); }
            });
            toggle.addEventListener('keydown', function (e) {
                if (e.key === 'ArrowDown') {
                    e.preventDefault(); showDropdown(dd);
                    var first = $('.dd__item:not([disabled])', menu);
                    if (first) { first.focus(); }
                }
            });
            menu.addEventListener('keydown', function (e) {
                var items = $$('.dd__item:not([disabled])', menu);
                var i = items.indexOf(doc.activeElement);
                if (e.key === 'ArrowDown') { e.preventDefault(); items[(i + 1) % items.length].focus(); }
                else if (e.key === 'ArrowUp') { e.preventDefault(); items[(i - 1 + items.length) % items.length].focus(); }
                else if (e.key === 'Home') { e.preventDefault(); items[0].focus(); }
                else if (e.key === 'End') { e.preventDefault(); items[items.length - 1].focus(); }
                else if (e.key === 'Escape') { e.stopPropagation(); closeDropdown(dd, true); }
            });
            dd.addEventListener('mouseenter', function () {
                if (!isDesktop() || !window.matchMedia('(hover: hover)').matches) { return; }
                window.clearTimeout(timer);
                if (menu.hidden) { hoverAt = Date.now(); }
                showDropdown(dd);
            });
            dd.addEventListener('mouseleave', function () {
                if (!isDesktop() || !window.matchMedia('(hover: hover)').matches) { return; }
                timer = window.setTimeout(function () { closeDropdown(dd); }, 160);
            });
            dd.addEventListener('focusout', function (e) {
                if (!dd.contains(e.relatedTarget) && !menu.hidden && isDesktop()) { closeDropdown(dd); }
            });
        });
        doc.addEventListener('click', function (e) {
            if (openDropdown && !openDropdown.contains(e.target)) { closeDropdown(openDropdown); }
        });
        doc.addEventListener('keydown', function (e) {
            if (e.key === 'Escape' && openDropdown) { closeDropdown(openDropdown, true); }
        });
    })();

    /* ---------- Navbar mobile ------------------------------------------------- */
    (function navbar() {
        var toggle = $('#navToggle');
        var menu = $('#navMenu');
        if (!toggle || !menu) { return; }
        function setOpen(open) {
            menu.classList.toggle('is-open', open);
            toggle.setAttribute('aria-expanded', open ? 'true' : 'false');
            toggle.setAttribute('aria-label', open ? 'Tutup menu' : 'Buka menu');
            doc.body.classList.toggle('nav-open', open);
        }
        toggle.addEventListener('click', function (e) { e.stopPropagation(); setOpen(!menu.classList.contains('is-open')); });
        $$('a', menu).forEach(function (a) { a.addEventListener('click', function () { setOpen(false); }); });
        doc.addEventListener('keydown', function (e) { if (e.key === 'Escape') { setOpen(false); } });
        window.addEventListener('resize', function () { if (window.innerWidth > 1100) { setOpen(false); } });
        doc.addEventListener('click', function (e) {
            if (menu.classList.contains('is-open') && !menu.contains(e.target) && !toggle.contains(e.target)) { setOpen(false); }
        });
    })();

    /* ---------- Pencarian (palette) ------------------------------------------- */
    (function search() {
        var overlay = $('#searchOverlay');
        var openBtn = $('#searchToggle');
        var closeBtn = $('#searchClose');
        var input = $('#searchInput');
        var list = $('#searchResults');
        var form = $('#searchForm');
        if (!overlay || !openBtn || !input || !list) { return; }

        var pages = Object.keys(cfg.pages || {}).map(function (k) {
            var p = cfg.pages[k];
            return { type: 'page', title: p.title, desc: p.desc, icon: p.icon, url: urls[k], hay: normalize([p.title, p.desc, p.keywords].join(' ')) };
        });
        var comms = (cfg.commodities || []).map(function (c) {
            return {
                type: 'comm', title: c.name, desc: c.en + ' - ' + c.desc, image: c.image,
                url: (urls.komoditas || '#') + '?q=' + encodeURIComponent(c.name.toLowerCase()),
                hay: normalize([c.name, c.en, c.desc, c.form, c.origin].join(' '))
            };
        });
        var active = -1;
        var current = [];
        var lastFocus = null;

        function score(item, q) {
            var t = normalize(item.title);
            if (t === q) { return 10; }
            if (t.indexOf(q) === 0) { return 6; }
            if (t.indexOf(q) !== -1) { return 4; }
            return item.hay.indexOf(q) !== -1 ? 2 : 0;
        }
        function setActive(i) {
            var rows = $$('.search__item', list);
            rows.forEach(function (r, n) { r.classList.toggle('is-active', n === i); r.setAttribute('aria-selected', n === i ? 'true' : 'false'); });
            active = i;
            if (rows[i]) {
                input.setAttribute('aria-activedescendant', rows[i].id);
                rows[i].scrollIntoView({ block: 'nearest' });
            }
        }
        function group(title) { return el('div', 'search__group', title); }
        function row(item, idx) {
            var a = el('a', 'search__item');
            a.href = item.url; a.id = 'sr-' + idx; a.setAttribute('role', 'option');
            if (item.type === 'comm') {
                var im = el('img', 'search__thumb'); im.src = (cfg.img || '') + '/' + item.image; im.alt = ''; im.width = 40; im.height = 40;
                a.appendChild(im);
            } else {
                var w = el('span', 'search__ico'); w.appendChild(icon(item.icon || 'doc')); a.appendChild(w);
            }
            var t = el('span', 'search__txt');
            t.appendChild(el('strong', null, item.title)); t.appendChild(el('small', null, item.desc));
            a.appendChild(t); a.appendChild(icon('arrow'));
            a.addEventListener('mousemove', function () { if (active !== idx) { setActive(idx); } });
            return a;
        }
        function render(q) {
            var nq = normalize(q);
            var c, p;
            if (!nq) { c = comms.slice(0, 5); p = pages.slice(0, 4); }
            else {
                c = comms.map(function (i) { return [i, score(i, nq)]; }).filter(function (x) { return x[1] > 0; }).sort(function (a, b) { return b[1] - a[1]; }).map(function (x) { return x[0]; }).slice(0, 5);
                p = pages.map(function (i) { return [i, score(i, nq)]; }).filter(function (x) { return x[1] > 0; }).sort(function (a, b) { return b[1] - a[1]; }).map(function (x) { return x[0]; }).slice(0, 5);
            }
            list.textContent = '';
            current = c.concat(p);
            if (!current.length) {
                var e = el('div', 'search__empty');
                e.appendChild(el('strong', null, 'Tidak ada hasil untuk "' + q.trim() + '"'));
                e.appendChild(doc.createTextNode('Coba kata kunci lain, mis. kopi, sertifikasi, atau pesanan minimum.'));
                list.appendChild(e); active = -1; return;
            }
            var idx = 0;
            if (c.length) { list.appendChild(group(nq ? 'Komoditas' : 'Komoditas unggulan')); c.forEach(function (i) { list.appendChild(row(i, idx++)); }); }
            if (p.length) { list.appendChild(group(nq ? 'Halaman' : 'Pintasan halaman')); p.forEach(function (i) { list.appendChild(row(i, idx++)); }); }
            setActive(0);
        }
        function open() {
            lastFocus = doc.activeElement;
            overlay.hidden = false;
            openBtn.setAttribute('aria-expanded', 'true');
            input.value = ''; render('');
            window.setTimeout(function () { input.focus(); }, 30);
            doc.body.style.overflow = 'hidden';
        }
        function close() {
            overlay.hidden = true;
            openBtn.setAttribute('aria-expanded', 'false');
            doc.body.style.overflow = '';
            if (lastFocus && lastFocus.focus) { lastFocus.focus(); }
        }
        openBtn.addEventListener('click', open);
        if (closeBtn) { closeBtn.addEventListener('click', close); }
        overlay.addEventListener('mousedown', function (e) { if (e.target === overlay) { close(); } });
        input.addEventListener('input', function () { render(input.value); });
        input.addEventListener('keydown', function (e) {
            if (e.key === 'ArrowDown') { e.preventDefault(); if (current.length) { setActive((active + 1) % current.length); } }
            else if (e.key === 'ArrowUp') { e.preventDefault(); if (current.length) { setActive((active - 1 + current.length) % current.length); } }
        });
        if (form) {
            form.addEventListener('submit', function (e) {
                e.preventDefault();
                var target = current[active];
                window.location.href = target ? target.url : ((urls.komoditas || '#') + '?q=' + encodeURIComponent(input.value.trim()));
            });
        }
        doc.addEventListener('keydown', function (e) {
            var tag = (doc.activeElement && doc.activeElement.tagName) || '';
            var typing = /INPUT|TEXTAREA|SELECT/.test(tag) || (doc.activeElement && doc.activeElement.isContentEditable);
            if (e.key === 'Escape' && !overlay.hidden) { e.preventDefault(); close(); }
            else if ((e.key === 'k' && (e.ctrlKey || e.metaKey)) || (e.key === '/' && !typing && overlay.hidden)) { e.preventDefault(); if (overlay.hidden) { open(); } }
        });
    })();

    /* ---------- Scroll halus --------------------------------------------------- */
    $$('[data-scroll]').forEach(function (a) {
        a.addEventListener('click', function (e) {
            var target = $(a.getAttribute('data-scroll'));
            if (target) { e.preventDefault(); target.scrollIntoView({ behavior: reduceMotion ? 'auto' : 'smooth', block: 'start' }); }
        });
    });

    /* ---------- Strip komoditas ------------------------------------------------ */
    (function strip() {
        var list = $('#commStrip');
        var next = $('#commNext');
        if (!list || !next) { return; }
        next.addEventListener('click', function () {
            var atEnd = list.scrollLeft + list.clientWidth >= list.scrollWidth - 8;
            if (atEnd) { list.scrollTo({ left: 0, behavior: 'smooth' }); }
            else { list.scrollBy({ left: Math.max(240, list.clientWidth * 0.6), behavior: 'smooth' }); }
        });
    })();

    /* ---------- Filter (katalog & wilayah) ------------------------------------- */
    (function filters() {
        var searchInput = $('#commSearch');
        var empty = $('#commEmpty');
        if (searchInput) {
            var box = searchInput.parentNode;
            var clear = el('button', 'field__clear'); clear.type = 'button'; clear.setAttribute('aria-label', 'Hapus pencarian'); clear.hidden = true;
            clear.appendChild(icon('close')); box.appendChild(clear);
            clear.addEventListener('click', function () { searchInput.value = ''; searchInput.dispatchEvent(new Event('input')); searchInput.focus(); });
            searchInput.addEventListener('input', function () { clear.hidden = !searchInput.value; });
        }
        $$('[data-filter-group]').forEach(function (group) {
            var target = $(group.getAttribute('data-filter-group'));
            if (!target) { return; }
            var items = $$('[data-category]', target);
            var active = 'semua';
            function apply() {
                var q = searchInput && target.id === 'commGrid' ? normalize(searchInput.value) : '';
                var shown = 0;
                items.forEach(function (item) {
                    var okCat = active === 'semua' || item.getAttribute('data-category') === active;
                    var okQ = !q || (item.getAttribute('data-name') || '').indexOf(q) !== -1;
                    item.hidden = !(okCat && okQ);
                    if (!item.hidden) { shown++; }
                });
                if (empty && target.id === 'commGrid') { empty.hidden = shown !== 0; }
            }
            $$('[data-filter]', group).forEach(function (btn) {
                btn.addEventListener('click', function () {
                    active = btn.getAttribute('data-filter');
                    $$('[data-filter]', group).forEach(function (b) {
                        var on = b === btn;
                        b.classList.toggle('is-active', on); b.setAttribute('aria-pressed', on ? 'true' : 'false');
                    });
                    apply();
                });
            });
            if (searchInput && target.id === 'commGrid') {
                searchInput.addEventListener('input', apply);
                var q0 = params.get('q');
                if (q0) { searchInput.value = q0; var c0 = $('.field__clear', searchInput.parentNode); if (c0) { c0.hidden = false; } }
            }
            apply();
        });
    })();

    /* ---------- Tabs ----------------------------------------------------------- */
    $$('[data-tabs]').forEach(function (wrap) {
        var tabs = $$('[data-tab]', wrap);
        var panels = $$('[role="tabpanel"]', wrap);
        function activate(slug, focus) {
            tabs.forEach(function (t) {
                var on = t.getAttribute('data-tab') === slug;
                t.classList.toggle('is-active', on); t.setAttribute('aria-selected', on ? 'true' : 'false'); t.tabIndex = on ? 0 : -1;
                if (on && focus) { t.focus(); }
                if (on && t.scrollIntoView) { t.scrollIntoView({ block: 'nearest', inline: 'center' }); }
            });
            panels.forEach(function (p) {
                var on = p.id === 'panel-' + slug;
                p.hidden = !on; p.classList.toggle('is-active', on);
            });
        }
        tabs.forEach(function (t, i) {
            t.addEventListener('click', function () { activate(t.getAttribute('data-tab')); });
            t.addEventListener('keydown', function (e) {
                var dir = e.key === 'ArrowRight' ? 1 : e.key === 'ArrowLeft' ? -1 : 0;
                if (!dir) { return; }
                e.preventDefault();
                activate(tabs[(i + dir + tabs.length) % tabs.length].getAttribute('data-tab'), true);
            });
        });
        var hash = window.location.hash.replace('#', '');
        var has = function (h) { return tabs.some(function (t) { return t.getAttribute('data-tab') === h; }); };
        if (hash && has(hash)) { activate(hash); } else if (tabs[0]) { activate(tabs[0].getAttribute('data-tab')); }
        window.addEventListener('hashchange', function () { var h = window.location.hash.replace('#', ''); if (has(h)) { activate(h); } });
    });

    /* ---------- Reveal saat scroll + bar + counter ------------------------------ */
    (function reveal() {
        var items = $$('.reveal');
        var bars = $$('[data-bars]');
        var counters = $$('[data-count]');
        if (!('IntersectionObserver' in window) || reduceMotion) {
            items.forEach(function (i) { i.classList.add('is-in'); });
            bars.forEach(function (b) { b.classList.add('is-visible'); });
            return;
        }
        var io = new IntersectionObserver(function (entries) {
            entries.forEach(function (en) {
                if (!en.isIntersecting) { return; }
                var node = en.target;
                node.classList.add('is-in'); io.unobserve(node);
                var delay = parseFloat(window.getComputedStyle(node).getPropertyValue('--d')) || 0;
                // setelah animasi selesai, lepas kelas reveal agar efek hover (transform) kembali berfungsi
                window.setTimeout(function () { node.classList.remove('reveal', 'is-in'); }, 900 + delay * 1000);
            });
        }, { threshold: 0.12, rootMargin: '0px 0px -6% 0px' });
        items.forEach(function (i) { io.observe(i); });

        var io2 = new IntersectionObserver(function (entries) {
            entries.forEach(function (en) {
                if (!en.isIntersecting) { return; }
                en.target.classList.add('is-visible'); io2.unobserve(en.target);
                $$('[data-count]', en.target).forEach(countUp);
            });
        }, { threshold: 0.2 });
        bars.forEach(function (b) { io2.observe(b); });

        function countUp(node) {
            var end = parseFloat(node.getAttribute('data-count')) || 0;
            var suffix = node.getAttribute('data-suffix') || '';
            var t0 = null;
            function step(t) {
                if (t0 === null) { t0 = t; }
                var p = Math.min((t - t0) / 1200, 1);
                var v = Math.round(end * (1 - Math.pow(1 - p, 3)));
                node.textContent = v.toLocaleString('id-ID') + suffix;
                if (p < 1) { window.requestAnimationFrame(step); }
            }
            node.textContent = '0' + suffix;
            window.requestAnimationFrame(step);
        }
        counters.forEach(function (c) { if (!c.closest('[data-bars]')) { io2.observe(c); } });
    })();

    /* ---------- Prefill dari query string -------------------------------------- */
    $$('[data-prefill]').forEach(function (node) {
        var val = params.get(node.getAttribute('data-prefill'));
        if (!val) { return; }
        if (node.tagName === 'SELECT') {
            var match = $$('option', node).filter(function (o) {
                return (o.getAttribute('data-slug') || '').toLowerCase() === val.toLowerCase() || o.value.toLowerCase() === val.toLowerCase();
            })[0];
            if (match) { node.value = match.value; }
        } else { node.value = val; }
    });

    /* ---------- Custom select -------------------------------------------------- */
    var selectUid = 0;
    function enhanceSelect(sel) {
        if (sel.getAttribute('data-enhanced')) { return; }
        sel.setAttribute('data-enhanced', '1');
        var uid = 'sel' + (++selectUid);
        var wrap = el('div', 'select');
        sel.parentNode.insertBefore(wrap, sel);
        wrap.appendChild(sel);
        sel.tabIndex = -1; sel.setAttribute('aria-hidden', 'true');

        var btn = el('button', 'select__btn'); btn.type = 'button'; btn.id = uid + '-btn';
        btn.setAttribute('aria-haspopup', 'listbox'); btn.setAttribute('aria-expanded', 'false');
        var val = el('span', 'select__val'); btn.appendChild(val); btn.appendChild(icon('chev-down'));
        var listEl = el('div', 'select__list'); listEl.setAttribute('role', 'listbox'); listEl.id = uid + '-list'; listEl.hidden = true;
        btn.setAttribute('aria-controls', listEl.id);
        wrap.appendChild(btn); wrap.appendChild(listEl);
        sel._btn = btn;

        var label = sel.id ? $('label[for="' + sel.id + '"]') : null;
        if (label) { label.addEventListener('click', function (e) { e.preventDefault(); btn.focus(); }); btn.setAttribute('aria-labelledby', label.id || (label.id = uid + '-lbl')); }

        var opts = [];
        $$('option', sel).forEach(function (o, i) {
            var d = el('div', 'select__opt'); d.setAttribute('role', 'option'); d.id = uid + '-o' + i;
            d.appendChild(el('span', null, o.text)); d.appendChild(icon('check'));
            d.addEventListener('mousedown', function (e) { e.preventDefault(); });
            d.addEventListener('click', function () { choose(i); });
            d.addEventListener('mousemove', function () { setActive(i); });
            listEl.appendChild(d); opts.push(d);
        });
        var act = 0;
        function sync() {
            var o = sel.options[sel.selectedIndex];
            val.textContent = o ? o.text : '';
            btn.classList.toggle('is-placeholder', !sel.value);
            opts.forEach(function (d, i) { d.setAttribute('aria-selected', i === sel.selectedIndex ? 'true' : 'false'); });
        }
        function setActive(i) {
            act = i;
            opts.forEach(function (d, n) { d.classList.toggle('is-active', n === i); });
            if (opts[i]) { opts[i].scrollIntoView({ block: 'nearest' }); btn.setAttribute('aria-activedescendant', opts[i].id); }
        }
        function isOpen() { return !listEl.hidden; }
        function open() {
            if (isOpen()) { return; }
            var rect = btn.getBoundingClientRect();
            var below = window.innerHeight - rect.bottom;
            wrap.classList.toggle('is-up', below < 260 && rect.top > below);
            listEl.hidden = false; wrap.classList.add('is-open'); btn.setAttribute('aria-expanded', 'true');
            setActive(Math.max(0, sel.selectedIndex));
        }
        function close() {
            if (!isOpen()) { return; }
            listEl.hidden = true; wrap.classList.remove('is-open'); btn.setAttribute('aria-expanded', 'false'); btn.removeAttribute('aria-activedescendant');
        }
        function choose(i) {
            sel.selectedIndex = i; sync(); close(); btn.focus();
            btn.classList.remove('is-invalid');
            sel.dispatchEvent(new Event('change', { bubbles: true }));
        }
        btn.addEventListener('click', function () { if (isOpen()) { close(); } else { open(); } });
        var typed = '', typedTimer = null;
        btn.addEventListener('keydown', function (e) {
            var k = e.key;
            if (k === 'ArrowDown' || k === 'ArrowUp') {
                e.preventDefault();
                if (!isOpen()) { open(); return; }
                setActive((act + (k === 'ArrowDown' ? 1 : -1) + opts.length) % opts.length);
            } else if (k === 'Home' && isOpen()) { e.preventDefault(); setActive(0); }
            else if (k === 'End' && isOpen()) { e.preventDefault(); setActive(opts.length - 1); }
            else if (k === 'Enter' || k === ' ') {
                e.preventDefault();
                if (isOpen()) { choose(act); } else { open(); }
            } else if (k === 'Escape') { if (isOpen()) { e.stopPropagation(); e.preventDefault(); close(); } }
            else if (k === 'Tab') { close(); }
            else if (k.length === 1) {
                typed += k.toLowerCase(); window.clearTimeout(typedTimer); typedTimer = window.setTimeout(function () { typed = ''; }, 600);
                var m = opts.findIndex(function (d) { return d.textContent.toLowerCase().indexOf(typed) === 0; });
                if (m > -1) { if (!isOpen()) { open(); } setActive(m); }
            }
        });
        doc.addEventListener('click', function (e) { if (!wrap.contains(e.target)) { close(); } });
        sel.addEventListener('change', sync);
        sel._sync = sync;
        sync();
    }
    $$('.field select').forEach(enhanceSelect);

    /* ---------- Kalkulator pesanan minimum ------------------------------------- */
    (function moq() {
        var form = $('#moqForm');
        if (!form) { return; }
        var sel = $('#moqComm');
        var qty = $('#moqQty');
        var out = $('#moqResult');
        var cta = $('#moqCta');
        var base = cta ? cta.getAttribute('href').split('?')[0] : '';
        function update() {
            var opt = sel.options[sel.selectedIndex];
            var min = parseFloat(opt.getAttribute('data-moq')) || 1;
            var name = opt.text.replace(/\s*\(min.*$/, '');
            var n = parseFloat(String(qty.value).replace(',', '.'));
            out.classList.remove('is-ok', 'is-low');
            if (!n || n <= 0) { out.textContent = 'Masukkan jumlah untuk melihat hasil.'; }
            else if (n < min) {
                out.classList.add('is-low');
                out.textContent = 'Jumlah ini di bawah pesanan minimum ' + name + ' (' + min + ' ton). Tambahkan ' + (Math.round((min - n) * 10) / 10) + ' ton lagi.';
            } else {
                var tier = n > 50 ? 'Kontrak' : n >= 5 ? 'Reguler' : 'Uji Pasar';
                out.classList.add('is-ok');
                out.textContent = 'Memenuhi syarat. Skema yang sesuai: ' + tier + ' (' + n + ' ton ' + name + ').';
            }
            if (cta) { cta.setAttribute('href', base + '?komoditas=' + encodeURIComponent(sel.value) + (n > 0 ? '&jumlah=' + encodeURIComponent(n) : '')); }
        }
        form.addEventListener('submit', function (e) { e.preventDefault(); update(); });
        sel.addEventListener('change', update);
        qty.addEventListener('input', update);
        update();
    })();

    /* ---------- Form -> WhatsApp ---------------------------------------------- */
    $$('[data-wa-form]').forEach(function (form) {
        var status = $('.form-status', form);
        var title = form.getAttribute('data-wa-title') || 'PESAN';
        function setStatus(msg, isError) { if (status) { status.textContent = msg; status.classList.toggle('is-error', !!isError); } }
        function mark(f, on) { f.classList.toggle('is-invalid', on); if (f._btn) { f._btn.classList.toggle('is-invalid', on); } }
        $$('input, select, textarea', form).forEach(function (f) {
            f.addEventListener('input', function () { mark(f, false); });
            f.addEventListener('change', function () { mark(f, false); });
        });
        form.addEventListener('submit', function (e) {
            e.preventDefault();
            var firstBad = null;
            $$('input, select, textarea', form).forEach(function (f) {
                if (!f.checkValidity()) { mark(f, true); if (!firstBad) { firstBad = f; } }
            });
            if (firstBad) {
                setStatus('Mohon lengkapi data yang wajib diisi dengan benar.', true);
                (firstBad._btn || firstBad).focus();
                return;
            }
            var lines = ['*' + title + ' - AgroHarvest*', ''];
            $$('[data-label]', form).forEach(function (f) {
                var v = String(f.value || '').trim();
                if (v) { lines.push(f.getAttribute('data-label') + ': ' + v); }
            });
            lines.push('', 'Dikirim dari website AgroHarvest.');
            var link = 'https://wa.me/' + (cfg.whatsapp || '') + '?text=' + encodeURIComponent(lines.join('\n'));
            var win = window.open(link, '_blank', 'noopener');
            if (!win) {
                status.textContent = '';
                var a = el('a', null, 'Klik di sini untuk membuka WhatsApp');
                a.href = link; a.target = '_blank'; a.rel = 'noopener'; a.style.textDecoration = 'underline';
                status.appendChild(a); status.classList.remove('is-error');
            } else { setStatus('Membuka WhatsApp. Silakan kirim pesan yang sudah terisi.', false); }
        });
    });

    /* ---------- AI Chatbot ------------------------------------------------------ */
    var bot = cfg.chatbot || { faq: [] };
    var topicIcons = ['sprout', 'package', 'supply', 'quality', 'globe', 'handshake'];

    function findAnswer(text) {
        var n = normalize(text);
        if (!n) { return null; }
        var best = null, bestScore = 0;
        (bot.faq || []).forEach(function (f) {
            var score = 0;
            (f.keywords || []).forEach(function (k) {
                var kk = normalize(k);
                if (kk && (' ' + n + ' ').indexOf(' ' + kk) !== -1) { score += kk.indexOf(' ') !== -1 ? 3 : 2; }
            });
            normalize(f.q).split(' ').forEach(function (w) { if (w.length > 4 && n.indexOf(w) !== -1) { score += 1; } });
            if (score > bestScore) { bestScore = score; best = f; }
        });
        return bestScore >= 2 ? best : null;
    }

    function createChat(opts) {
        var body = opts.body, form = opts.form, input = opts.input, quick = opts.quick;
        var greeted = false, busy = false;
        function scroll() { body.scrollTop = body.scrollHeight; }
        function addMsg(kind, text, link) {
            var m = el('div', 'msg msg--' + kind);
            m.appendChild(el('span', null, text));
            if (link && link.href) {
                var a = el('a', 'msg__link'); a.href = link.href;
                if (link.external) { a.target = '_blank'; a.rel = 'noopener'; }
                a.appendChild(doc.createTextNode(link.label)); a.appendChild(icon('arrow'));
                m.appendChild(doc.createElement('br')); m.appendChild(a);
            }
            body.appendChild(m); scroll();
            return m;
        }
        function reply(text, link) {
            busy = true;
            var typing = el('div', 'msg msg--bot msg--typing');
            typing.setAttribute('aria-label', 'Asisten sedang mengetik');
            typing.appendChild(el('i')); typing.appendChild(el('i')); typing.appendChild(el('i'));
            body.appendChild(typing); scroll();
            window.setTimeout(function () {
                if (typing.parentNode) { typing.parentNode.removeChild(typing); }
                addMsg('bot', text, link); busy = false;
            }, reduceMotion ? 0 : 520);
        }
        function ask(text) {
            var q = String(text || '').trim();
            if (!q || busy) { return; }
            var tp = $('.topics', body); if (tp) { tp.parentNode.removeChild(tp); }
            addMsg('user', q);
            var n = normalize(q);
            if (/^(halo|hai|hi|hello|selamat|permisi|assalamualaikum)/.test(n)) { reply('Halo! Ada yang bisa saya bantu seputar komoditas atau kemitraan AgroHarvest?'); return; }
            if (/(terima kasih|makasih|thanks|thank you)/.test(n)) { reply('Sama-sama! Jika ada pertanyaan lain, saya siap membantu.'); return; }
            var hit = findAnswer(q);
            if (hit) {
                var link = null;
                if (hit.link && urls[hit.link]) { link = { href: urls[hit.link], label: hit.link_label || 'Lihat Detail', external: hit.link === 'whatsapp' }; }
                reply(hit.a, link);
            } else {
                reply(bot.fallback || 'Maaf, saya belum menemukan jawaban yang pas.', { href: urls.whatsapp, label: 'Chat via WhatsApp', external: true });
            }
        }
        function topics() {
            var wrap = el('div', 'topics');
            (bot.quick || []).forEach(function (q, i) {
                var b = el('button', 'topic'); b.type = 'button';
                b.appendChild(icon(topicIcons[i % topicIcons.length])); b.appendChild(el('span', null, q));
                b.addEventListener('click', function () { ask(q); });
                wrap.appendChild(b);
            });
            body.appendChild(wrap); scroll();
        }
        function greet() {
            if (greeted) { return; }
            greeted = true;
            addMsg('bot', bot.welcome || 'Halo! Ada yang bisa kami bantu?');
            topics();
        }
        function reset() { body.textContent = ''; greeted = false; busy = false; greet(); }
        if (form && input) {
            form.addEventListener('submit', function (e) { e.preventDefault(); var v = input.value; input.value = ''; ask(v); });
        }
        if (quick) {
            quick.addEventListener('click', function (e) {
                var b = e.target.closest ? e.target.closest('[data-chat-quick]') : null;
                if (b) { ask(b.getAttribute('data-chat-quick')); }
            });
        }
        return { greet: greet, ask: ask, reset: reset };
    }

    (function floatingChat() {
        var panel = $('#agChat');
        var toggle = $('#agChatToggle');
        if (!panel || !toggle) { return; }
        var chat = createChat({ body: $('#agChatBody'), form: $('#agChatForm'), input: $('#agChatInput'), quick: $('#agChatQuick') });
        var closeBtn = $('#agChatClose'), resetBtn = $('#agChatReset');
        var hint = $('#agAiHint'), hintClose = $('#agAiHintClose');
        var hintTimer = null;

        function hideHint() {
            if (hint) { hint.hidden = true; }
            if (hintTimer) { window.clearTimeout(hintTimer); }
            safeStorage('set', 'agHintSeen', '1');
        }
        function open() {
            panel.hidden = false; toggle.setAttribute('aria-expanded', 'true'); hideHint(); chat.greet();
            var input = $('#agChatInput');
            if (input && window.innerWidth > 760) { window.setTimeout(function () { input.focus(); }, 80); }
        }
        function close() { panel.hidden = true; toggle.setAttribute('aria-expanded', 'false'); toggle.focus(); }

        toggle.addEventListener('click', function () { if (panel.hidden) { open(); } else { close(); } });
        if (closeBtn) { closeBtn.addEventListener('click', close); }
        if (resetBtn) { resetBtn.addEventListener('click', function () { chat.reset(); }); }
        $$('[data-chat-open]').forEach(function (b) { b.addEventListener('click', function () { if (panel.hidden) { open(); } }); });
        doc.addEventListener('keydown', function (e) { if (e.key === 'Escape' && !panel.hidden && !openDropdown) { close(); } });

        if (hint) {
            if (hintClose) { hintClose.addEventListener('click', hideHint); }
            if (!safeStorage('get', 'agHintSeen')) {
                window.setTimeout(function () {
                    if (panel.hidden) { hint.hidden = false; hintTimer = window.setTimeout(hideHint, 9000); }
                }, 3500);
            }
        }
    })();

    (function inlineChat() {
        var body = $('#agInlineBody');
        if (!body) { return; }
        createChat({ body: body, form: $('#agInlineForm'), input: $('#agInlineInput'), quick: $('#agInlineQuick') }).greet();
    })();
})();
