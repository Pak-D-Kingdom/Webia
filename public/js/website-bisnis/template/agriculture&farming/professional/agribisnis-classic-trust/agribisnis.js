/* =========================================================================
   AgroTrade — Agribisnis · Professional · Classic Trust
   JavaScript vanilla (tanpa dependensi). Semua fitur bersifat progressive:
   halaman tetap terbaca dan berfungsi dasar tanpa JS.
   ========================================================================= */
(function () {
    'use strict';

    var doc = document;
    var body = doc.body;
    var $ = function (sel, ctx) { return (ctx || doc).querySelector(sel); };
    var $$ = function (sel, ctx) { return Array.prototype.slice.call((ctx || doc).querySelectorAll(sel)); };
    var reduceMotion = !!(window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches);
    var hasIO = 'IntersectionObserver' in window;

    var DATA = {};
    try {
        var dataNode = $('#agro-data');
        DATA = dataNode ? JSON.parse(dataNode.textContent) : {};
    } catch (e) { DATA = {}; }

    var store = {
        get: function (k) { try { return window.sessionStorage.getItem(k); } catch (e) { return null; } },
        set: function (k, v) { try { window.sessionStorage.setItem(k, v); } catch (e) { /* abaikan */ } }
    };

    function svgIcon(name, cls) {
        return '<svg class="i' + (cls ? ' ' + cls : '') + '" aria-hidden="true"><use href="#i-' + name + '"/></svg>';
    }
    function escapeHtml(s) {
        return String(s).replace(/[&<>"']/g, function (c) { return { '&': '&amp;', '<': '&lt;', '>': '&gt;', '"': '&quot;', "'": '&#39;' }[c]; });
    }
    function escapeRegExp(s) { return s.replace(/[.*+?^${}()|[\]\\]/g, '\\$&'); }
    function lockScroll(on) { body.classList.toggle('modal-open', on); }

    /* -------------------------------------------------- Placeholder links */
    $$('a[data-placeholder]').forEach(function (a) {
        a.addEventListener('click', function (e) { e.preventDefault(); });
    });

    /* -------------------------------------------------- Navbar */
    var closeMenu = function () {};
    (function () {
        var nav = $('#siteNav');
        var toggle = $('#menuToggle');
        var backdrop = $('#navBackdrop');
        var menu = $('#mainMenu');
        var progress = $('#navProgress');
        var ticking = false;

        function update() {
            ticking = false;
            var y = window.pageYOffset || doc.documentElement.scrollTop || 0;
            if (nav) { nav.classList.toggle('is-stuck', y > 4); }
            if (progress) {
                var max = (doc.documentElement.scrollHeight - window.innerHeight) || 1;
                progress.style.width = Math.min(100, Math.max(0, (y / max) * 100)) + '%';
            }
        }
        update();
        window.addEventListener('scroll', function () {
            if (!ticking) { ticking = true; window.requestAnimationFrame(update); }
        }, { passive: true });
        window.addEventListener('resize', update);

        function setMenu(open) {
            if (!toggle) { return; }
            body.classList.toggle('menu-open', open);
            toggle.setAttribute('aria-expanded', open ? 'true' : 'false');
            toggle.setAttribute('aria-label', open ? 'Tutup menu' : 'Buka menu');
            if (backdrop) { backdrop.hidden = !open; }
        }
        closeMenu = function () { setMenu(false); };

        if (toggle) { toggle.addEventListener('click', function () { setMenu(!body.classList.contains('menu-open')); }); }
        if (backdrop) { backdrop.addEventListener('click', function () { setMenu(false); }); }
        if (menu) { $$('a', menu).forEach(function (a) { a.addEventListener('click', function () { setMenu(false); }); }); }
        doc.addEventListener('keydown', function (e) {
            if (e.key === 'Escape' && body.classList.contains('menu-open')) { setMenu(false); if (toggle) { toggle.focus(); } }
        });
        window.addEventListener('resize', function () { if (window.innerWidth > 1159) { setMenu(false); } });
    })();

    /* -------------------------------------------------- Dropdown navigasi (submenu) */
    (function () {
        var items = $$('[data-sub]');
        if (!items.length) { return; }
        var canHover = !!(window.matchMedia && window.matchMedia('(hover: hover) and (min-width: 1160px)').matches);

        function setOpen(li, open) {
            var btn = $('.menu__link--btn', li);
            li.classList.toggle('is-open', open);
            if (btn) { btn.setAttribute('aria-expanded', open ? 'true' : 'false'); }
        }
        function closeAll(except) {
            items.forEach(function (li) { if (li !== except) { setOpen(li, false); } });
        }

        items.forEach(function (li) {
            var btn = $('.menu__link--btn', li);
            var links = $$('.submenu__link', li);
            if (!btn) { return; }
            btn.addEventListener('click', function (e) {
                e.stopPropagation();
                var open = !li.classList.contains('is-open');
                closeAll(li);
                setOpen(li, open);
            });
            btn.addEventListener('keydown', function (e) {
                if (e.key === 'ArrowDown') {
                    e.preventDefault();
                    closeAll(li);
                    setOpen(li, true);
                    if (links[0]) { links[0].focus(); }
                }
            });
            links.forEach(function (a, i) {
                a.addEventListener('keydown', function (e) {
                    if (e.key === 'ArrowDown') { e.preventDefault(); (links[i + 1] || links[0]).focus(); }
                    else if (e.key === 'ArrowUp') { e.preventDefault(); (links[i - 1] || links[links.length - 1]).focus(); }
                    else if (e.key === 'Escape') { e.preventDefault(); setOpen(li, false); btn.focus(); }
                });
            });
            if (canHover) { li.addEventListener('mouseleave', function () { setOpen(li, false); }); }
        });
        doc.addEventListener('click', function (e) {
            if (!e.target.closest || !e.target.closest('[data-sub]')) { closeAll(null); }
        });
        doc.addEventListener('keydown', function (e) { if (e.key === 'Escape') { closeAll(null); } });
    })();

    /* -------------------------------------------------- Parallax hero + efek sorot kartu */
    (function () {
        var hero = $('.hero');
        if (hero && !reduceMotion) {
            var ticking = false;
            var update = function () {
                ticking = false;
                var y = window.pageYOffset || 0;
                if (y < 900) { hero.style.setProperty('--py', Math.round(y * 0.16) + 'px'); }
            };
            window.addEventListener('scroll', function () {
                if (!ticking) { ticking = true; window.requestAnimationFrame(update); }
            }, { passive: true });
        }
        if (window.matchMedia && window.matchMedia('(hover: hover)').matches) {
            doc.addEventListener('pointermove', function (e) {
                var t = e.target && e.target.closest ? e.target.closest('.pv') : null;
                if (!t) { return; }
                var r = t.getBoundingClientRect();
                t.style.setProperty('--mx', (e.clientX - r.left) + 'px');
                t.style.setProperty('--my', (e.clientY - r.top) + 'px');
            }, { passive: true });
        }
    })();

    /* -------------------------------------------------- Dropdown sederhana (bahasa) */
    $$('[data-dropdown]').forEach(function (dd) {
        var btn = $('button', dd);
        var list = $('.dropdown__menu', dd);
        if (!btn || !list) { return; }
        function set(open) {
            list.hidden = !open;
            btn.setAttribute('aria-expanded', open ? 'true' : 'false');
        }
        btn.addEventListener('click', function (e) { e.stopPropagation(); set(list.hidden); });
        doc.addEventListener('click', function (e) { if (!dd.contains(e.target)) { set(false); } });
        doc.addEventListener('keydown', function (e) { if (e.key === 'Escape') { set(false); } });
    });

    /* -------------------------------------------------- Pencarian (modal) */
    (function () {
        var modal = $('#searchModal');
        var btn = $('#searchToggle');
        var input = $('#searchInput');
        var bodyEl = $('#searchBody');
        var clear = $('#searchClear');
        var form = $('#searchForm');
        if (!modal || !btn || !input || !bodyEl || !DATA.search) { return; }

        var S = DATA.search;
        var results = [];
        var active = -1;
        var lastFocus = null;
        var popular = ['Kopi', 'Kakao', 'Kelapa Sawit', 'Padi', 'Minimum order', 'Sertifikasi'];

        function norm(t) {
            var s = String(t || '').toLowerCase();
            if (s.normalize) { s = s.normalize('NFD').replace(/[\u0300-\u036f]/g, ''); }
            return s.replace(/[^a-z0-9\s]/g, ' ').replace(/\s+/g, ' ').trim();
        }
        function mark(text, q) {
            var safe = escapeHtml(text);
            var words = q.split(/\s+/).filter(function (w) { return w.length > 0; }).map(escapeRegExp);
            if (!words.length) { return safe; }
            try { return safe.replace(new RegExp('(' + words.join('|') + ')', 'ig'), '<mark>$1</mark>'); } catch (e) { return safe; }
        }

        function score(hay, q) {
            var h = norm(hay);
            if (!h) { return 0; }
            if (h === q) { return 6; }
            if (h.indexOf(q) === 0) { return 5; }
            if (h.indexOf(' ' + q) !== -1) { return 4; }
            if (h.indexOf(q) !== -1) { return 3; }
            var words = q.split(' ');
            var hit = 0;
            words.forEach(function (w) { if (w && h.indexOf(w) !== -1) { hit += 1; } });
            return hit === words.length ? 2 : (hit ? 1 : 0);
        }

        function itemHtml(it, q, idx) {
            var lead = it.thumb
                ? '<span class="sitem__thumb"><img src="' + escapeHtml(it.thumb) + '" alt="" loading="lazy" width="58" height="44"></span>'
                : '<span class="sitem__ico">' + svgIcon(it.icon || 'leaf') + '</span>';
            return '<a class="sitem" role="option" id="sr-' + idx + '" data-i="' + idx + '" href="' + escapeHtml(it.url) + '">' + lead +
                '<span class="sitem__txt"><span class="sitem__t">' + mark(it.title, q) + '</span><span class="sitem__d">' + mark(it.desc, q) + '</span></span>' +
                '<span class="sitem__go">' + svgIcon('arrow') + '</span></a>';
        }

        function render() {
            var q = norm(input.value);
            clear.hidden = !input.value;
            results = [];
            var html = '';

            if (!q) {
                html += '<div class="sgroup__title">Pencarian populer</div><div class="schips">';
                popular.forEach(function (p) { html += '<button type="button" data-q="' + escapeHtml(p) + '">' + escapeHtml(p) + '</button>'; });
                html += '</div><div class="sgroup__title">Halaman</div>';
                S.pages.forEach(function (p) {
                    if (p.title === 'Beranda') { return; }
                    results.push({ title: p.title, desc: p.desc, icon: p.icon, url: p.url });
                    html += itemHtml(results[results.length - 1], '', results.length - 1);
                });
            } else {
                var com = S.commodities.map(function (c) {
                    var sc = Math.max(score(c.name, q) * 2, score(c.tag, q), score(c.group, q), score(c.meta, q));
                    return { sc: sc, it: { title: c.name, desc: c.tag + ' · ' + c.meta, thumb: c.thumb, url: c.url } };
                }).filter(function (x) { return x.sc > 0; }).sort(function (a, b) { return b.sc - a.sc; }).slice(0, 8);
                var pg = S.pages.map(function (p) {
                    return { sc: Math.max(score(p.title, q) * 2, score(p.kw, q), score(p.desc, q)), it: { title: p.title, desc: p.desc, icon: p.icon, url: p.url } };
                }).filter(function (x) { return x.sc > 0; }).sort(function (a, b) { return b.sc - a.sc; }).slice(0, 6);

                if (com.length) {
                    html += '<div class="sgroup__title">Komoditas</div>';
                    com.forEach(function (x) { results.push(x.it); html += itemHtml(x.it, input.value.trim(), results.length - 1); });
                }
                if (pg.length) {
                    html += '<div class="sgroup__title">Halaman</div>';
                    pg.forEach(function (x) { results.push(x.it); html += itemHtml(x.it, input.value.trim(), results.length - 1); });
                }
                if (!results.length) {
                    html = '<div class="sempty">' + svgIcon('search') + '<p>Tidak ada hasil untuk “' + escapeHtml(input.value.trim()) + '”.<br>Coba kata kunci lain, mis. <b>kopi</b>, <b>sertifikasi</b>, atau <b>minimum order</b>.</p></div>';
                }
            }
            bodyEl.innerHTML = html;
            setActive(results.length ? 0 : -1, false);
        }

        function setActive(i, scroll) {
            var items = $$('.sitem', bodyEl);
            items.forEach(function (el) { el.classList.remove('is-active'); el.removeAttribute('aria-selected'); });
            active = i;
            if (i >= 0 && items[i]) {
                items[i].classList.add('is-active');
                items[i].setAttribute('aria-selected', 'true');
                input.setAttribute('aria-activedescendant', items[i].id);
                if (scroll) { items[i].scrollIntoView({ block: 'nearest' }); }
            } else {
                input.removeAttribute('aria-activedescendant');
            }
        }

        function open() {
            if (!modal.hidden) { return; }
            closeMenu();
            lastFocus = doc.activeElement;
            modal.hidden = false;
            lockScroll(true);
            btn.setAttribute('aria-expanded', 'true');
            render();
            window.setTimeout(function () { input.focus(); input.select(); }, 20);
        }
        function close() {
            if (modal.hidden) { return; }
            modal.hidden = true;
            lockScroll(false);
            btn.setAttribute('aria-expanded', 'false');
            if (lastFocus && lastFocus.focus) { lastFocus.focus(); }
        }

        btn.setAttribute('aria-expanded', 'false');
        btn.addEventListener('click', open);
        $$('[data-search-close]', modal).forEach(function (el) { el.addEventListener('click', close); });
        input.setAttribute('role', 'combobox');
        input.setAttribute('aria-controls', 'searchBody');
        input.setAttribute('aria-expanded', 'true');
        bodyEl.setAttribute('role', 'listbox');
        input.addEventListener('input', render);
        clear.addEventListener('click', function () { input.value = ''; render(); input.focus(); });

        bodyEl.addEventListener('click', function (e) {
            var chip = e.target.closest('button[data-q]');
            if (chip) { input.value = chip.getAttribute('data-q'); render(); input.focus(); return; }
            if (e.target.closest('a.sitem')) { window.setTimeout(close, 0); }
        });
        bodyEl.addEventListener('mousemove', function (e) {
            var a = e.target.closest('a.sitem');
            if (a) { var i = parseInt(a.getAttribute('data-i'), 10); if (i !== active) { setActive(i, false); } }
        });

        form.addEventListener('submit', function (e) {
            if (results.length && active >= 0 && results[active]) {
                e.preventDefault();
                var url = results[active].url;
                close();
                window.location.href = url;
            }
            /* tanpa hasil: biarkan form terkirim ke halaman katalog (?q=…) */
        });

        modal.addEventListener('keydown', function (e) {
            var k = e.key;
            if (k === 'Escape') { e.preventDefault(); close(); }
            else if (k === 'ArrowDown') { e.preventDefault(); if (results.length) { setActive((active + 1) % results.length, true); } }
            else if (k === 'ArrowUp') { e.preventDefault(); if (results.length) { setActive((active - 1 + results.length) % results.length, true); } }
            else if (k === 'Tab') {
                var f = $$('input, button:not([hidden]), a', modal).filter(function (el) { return el.offsetParent !== null; });
                if (!f.length) { return; }
                var first = f[0];
                var last = f[f.length - 1];
                if (e.shiftKey && doc.activeElement === first) { e.preventDefault(); last.focus(); }
                else if (!e.shiftKey && doc.activeElement === last) { e.preventDefault(); first.focus(); }
            }
        });

        doc.addEventListener('keydown', function (e) {
            var t = e.target;
            var typing = t && (/^(INPUT|TEXTAREA|SELECT)$/.test(t.tagName) || t.isContentEditable);
            if (((e.key === '/' && !typing && !e.ctrlKey && !e.metaKey && !e.altKey) || ((e.ctrlKey || e.metaKey) && (e.key === 'k' || e.key === 'K')))) {
                e.preventDefault();
                open();
            }
        });
    })();

    /* -------------------------------------------------- Custom select (dropdown rapi, bottom-sheet di HP) */
    var uid = 0;
    function enhanceSelect(select) {
        if (select.dataset.enhanced) { return; }
        select.dataset.enhanced = '1';
        uid += 1;

        var wrap = doc.createElement('div');
        wrap.className = 'cselect';
        select.parentNode.insertBefore(wrap, select);
        wrap.appendChild(select);
        select.classList.add('cselect__native', 'is-enhanced');
        select.tabIndex = -1;
        select.setAttribute('aria-hidden', 'true');

        var btn = doc.createElement('button');
        btn.type = 'button';
        btn.className = 'cselect__btn';
        btn.id = 'cs-btn-' + uid;
        btn.setAttribute('aria-haspopup', 'listbox');
        btn.setAttribute('aria-expanded', 'false');
        btn.innerHTML = '<span class="cselect__val"></span>' + svgIcon('chev');
        wrap.appendChild(btn);

        var list = doc.createElement('ul');
        list.className = 'cselect__list';
        list.setAttribute('role', 'listbox');
        list.id = 'cs-list-' + uid;
        list.hidden = true;
        btn.setAttribute('aria-controls', list.id);
        wrap.appendChild(list);

        var label = select.id ? $('label[for="' + select.id + '"]') : null;
        var titleText = 'Pilih opsi';
        if (label) {
            if (!label.id) { label.id = 'cs-lbl-' + uid; }
            btn.setAttribute('aria-labelledby', label.id + ' ' + btn.id);
            label.addEventListener('click', function (e) { e.preventDefault(); btn.focus(); });
            titleText = label.textContent.replace('*', '').trim() || titleText;
        }

        var scrim = null;
        var valEl = $('.cselect__val', btn);
        var items = [];
        var activeIdx = -1;
        var typed = '';
        var typedTimer = null;

        function build() {
            list.innerHTML = '<li class="cselect__title" role="presentation">' + escapeHtml(titleText) + '</li>';
            items = [];
            $$('option', select).forEach(function (opt, i) {
                var li = doc.createElement('li');
                li.className = 'cselect__opt';
                li.setAttribute('role', 'option');
                li.dataset.index = String(i);
                li.id = list.id + '-' + i;
                if (opt.disabled) { li.setAttribute('aria-disabled', 'true'); }
                li.innerHTML = '<span></span>' + svgIcon('check');
                $('span', li).textContent = opt.textContent;
                list.appendChild(li);
                items.push({ el: li, opt: opt });
            });
            sync();
        }

        function sync() {
            var sel = select.options[select.selectedIndex];
            var isPlaceholder = !sel || sel.disabled;
            valEl.textContent = sel ? sel.textContent : '';
            valEl.classList.toggle('is-placeholder', !!isPlaceholder);
            items.forEach(function (it) {
                it.el.setAttribute('aria-selected', it.opt.selected && !it.opt.disabled ? 'true' : 'false');
            });
        }
        select._agroSync = sync;

        function visibleItems() { return items.filter(function (it) { return !it.opt.disabled; }); }

        function setActive(it, scroll) {
            items.forEach(function (x) { x.el.classList.remove('is-active'); });
            if (!it) { activeIdx = -1; btn.removeAttribute('aria-activedescendant'); return; }
            it.el.classList.add('is-active');
            activeIdx = items.indexOf(it);
            btn.setAttribute('aria-activedescendant', it.el.id);
            if (scroll) { it.el.scrollIntoView({ block: 'nearest' }); }
        }

        function open() {
            if (!list.hidden) { return; }
            $$('.cselect.is-open').forEach(function (o) { if (o !== wrap && o._close) { o._close(); } });
            var sheet = !!(window.matchMedia && window.matchMedia('(max-width: 575px)').matches);
            list.hidden = false;
            wrap.classList.add('is-open');
            btn.setAttribute('aria-expanded', 'true');
            if (sheet) {
                wrap.classList.add('is-sheet');
                scrim = doc.createElement('div');
                scrim.className = 'cselect__scrim';
                scrim.addEventListener('click', close);
                wrap.appendChild(scrim);
                lockScroll(true);
            } else {
                var rect = btn.getBoundingClientRect();
                var room = window.innerHeight - rect.bottom;
                wrap.classList.toggle('is-up', room < 300 && rect.top > room);
            }
            var cur = items.filter(function (it) { return it.opt.selected && !it.opt.disabled; })[0] || visibleItems()[0];
            setActive(cur, true);
        }

        function close() {
            if (list.hidden) { return; }
            list.hidden = true;
            wrap.classList.remove('is-open', 'is-up');
            if (wrap.classList.contains('is-sheet')) { wrap.classList.remove('is-sheet'); lockScroll(false); }
            if (scrim && scrim.parentNode) { scrim.parentNode.removeChild(scrim); }
            scrim = null;
            btn.setAttribute('aria-expanded', 'false');
            setActive(null);
        }
        wrap._close = close;

        function choose(it) {
            if (!it || it.opt.disabled) { return; }
            select.value = it.opt.value;
            sync();
            select.dispatchEvent(new Event('change', { bubbles: true }));
            close();
            btn.focus();
        }

        function move(step) {
            var vis = visibleItems();
            if (!vis.length) { return; }
            var cur = items[activeIdx];
            var pos = vis.indexOf(cur);
            var next = pos === -1 ? (step > 0 ? 0 : vis.length - 1) : (pos + step + vis.length) % vis.length;
            setActive(vis[next], true);
        }

        btn.addEventListener('click', function () { list.hidden ? open() : close(); });
        list.addEventListener('mousedown', function (e) { e.preventDefault(); });
        list.addEventListener('click', function (e) {
            var li = e.target.closest('.cselect__opt');
            if (!li) { return; }
            choose(items[parseInt(li.dataset.index, 10)]);
        });
        list.addEventListener('mousemove', function (e) {
            var li = e.target.closest('.cselect__opt');
            if (li && !li.classList.contains('is-active')) { setActive(items[parseInt(li.dataset.index, 10)], false); }
        });
        btn.addEventListener('keydown', function (e) {
            var k = e.key;
            if (k === 'ArrowDown' || k === 'ArrowUp') {
                e.preventDefault();
                if (list.hidden) { open(); } else { move(k === 'ArrowDown' ? 1 : -1); }
            } else if (k === 'Enter' || k === ' ') {
                e.preventDefault();
                if (list.hidden) { open(); } else { choose(items[activeIdx]); }
            } else if (k === 'Escape') {
                if (!list.hidden) { e.preventDefault(); e.stopPropagation(); close(); }
            } else if (k === 'Home' || k === 'End') {
                if (!list.hidden) {
                    e.preventDefault();
                    var vis = visibleItems();
                    setActive(k === 'Home' ? vis[0] : vis[vis.length - 1], true);
                }
            } else if (k === 'Tab') {
                close();
            } else if (k.length === 1 && !e.ctrlKey && !e.metaKey && !e.altKey) {
                typed += k.toLowerCase();
                window.clearTimeout(typedTimer);
                typedTimer = window.setTimeout(function () { typed = ''; }, 600);
                var hit = visibleItems().filter(function (it) { return it.opt.textContent.toLowerCase().indexOf(typed) === 0; })[0];
                if (hit) { if (list.hidden) { open(); } setActive(hit, true); }
            }
        });
        doc.addEventListener('click', function (e) { if (!wrap.contains(e.target)) { close(); } });
        select.addEventListener('change', sync);
        build();
    }
    $$('select.select').forEach(enhanceSelect);

    /* -------------------------------------------------- Animasi saat scroll + penghitung angka */
    (function () {
        var SEL = [
            '.hsec__head', '.tile', '.panen', '.spec', '.stat', '.dist', '.cert', '.proc', '.mini', '.ai-band',
            '.cm-card', '.info-card', '.check-row', '.cert-card', '.timeline > li', '.bigstat', '.terms', '.statgrid li', '.bars',
            '.table-wrap', '.sec-head', '.ctaband__in', '.faq__item', '.botcard', '.formcard', '.side', '.ports', '.mapcard', '.docs',
            '.benefits li', '.toolbar', '.stepcards > li', '.faq > h2', '.lead'
        ].join(',');

        function fmt(n) { return String(n).replace(/\B(?=(\d{3})+(?!\d))/g, '.'); }

        function countUp(el) {
            var target = parseInt(el.getAttribute('data-count'), 10);
            if (isNaN(target) || el._counted) { return; }
            el._counted = true;
            if (reduceMotion) { el.textContent = fmt(target); return; }
            var dur = 1500;
            var t0 = null;
            function step(ts) {
                if (t0 === null) { t0 = ts; }
                var p = Math.min(1, (ts - t0) / dur);
                var eased = 1 - Math.pow(1 - p, 3);
                el.textContent = fmt(Math.round(target * eased));
                if (p < 1) { window.requestAnimationFrame(step); } else { el.textContent = fmt(target); }
            }
            window.requestAnimationFrame(step);
        }

        var counters = $$('[data-count]');

        if (!hasIO) { return; }

        var io = new IntersectionObserver(function (entries) {
            entries.forEach(function (en) {
                if (!en.isIntersecting) { return; }
                en.target.classList.add('is-in');
                if (en.target.hasAttribute('data-count')) { countUp(en.target); }
                io.unobserve(en.target);
            });
        }, { threshold: 0.12, rootMargin: '0px 0px -5% 0px' });

        var counts = {};
        var vh = window.innerHeight || 800;
        $$(SEL).forEach(function (el) {
            var r = el.getBoundingClientRect();
            if (r.top < vh * 0.9 && r.bottom > 0) { el.classList.add('is-in'); return; }
            var parent = el.parentNode;
            if (parent && parent.tagName === 'LI') { parent = parent.parentNode; }
            var key = parent ? (parent._rvk || (parent._rvk = 'k' + Math.random().toString(36).slice(2))) : 'k0';
            counts[key] = (counts[key] || 0) + 1;
            el.style.setProperty('--d', Math.min(counts[key] - 1, 7) * 70 + 'ms');
            el.classList.add('rv');
            io.observe(el);
        });

        counters.forEach(function (el) {
            var r = el.getBoundingClientRect();
            el.textContent = '0';
            if (r.top < vh && r.bottom > 0) { countUp(el); } else { io.observe(el); }
        });
        // elemen di dalam viewport yang sudah punya data-count tidak perlu di-reveal
        $$('.bars, .proc').forEach(function (el) { if (!el.classList.contains('rv')) { el.classList.add('is-in'); } });
        $$('.bars li').forEach(function (li, i) { li.style.setProperty('--i', i); });
    })();

    /* -------------------------------------------------- Form → WhatsApp */
    (function () {
        var forms = $$('form[data-wa-form]');
        if (!forms.length) { return; }
        var number = (DATA.whatsapp && DATA.whatsapp.number) || '';
        var params = new URLSearchParams(window.location.search);

        function fieldWrap(el) { return el.closest('.field'); }

        function setError(el, msg) {
            var w = fieldWrap(el);
            if (!w) { return; }
            var err = $('.field__err', w);
            w.classList.toggle('is-invalid', !!msg);
            if (err) { err.hidden = !msg; err.textContent = msg || ''; }
            var focusable = el.classList.contains('is-enhanced') ? $('.cselect__btn', w) : el;
            if (focusable) { focusable.setAttribute('aria-invalid', msg ? 'true' : 'false'); }
        }

        function validate(el) {
            var v = (el.value || '').trim();
            if (el.required && !v) { return el.tagName === 'SELECT' ? 'Pilih salah satu opsi.' : 'Kolom ini wajib diisi.'; }
            if (!v) { return ''; }
            if (el.type === 'email' && !/^[^\s@]+@[^\s@]+\.[^\s@]{2,}$/.test(v)) { return 'Format email belum benar.'; }
            if (el.dataset.type === 'phone') {
                var digits = v.replace(/\D/g, '');
                if (digits.length < 9 || digits.length > 15 || !/^[+\d][\d\s\-()]+$/.test(v)) { return 'Masukkan nomor telepon yang valid (9–15 digit).'; }
            }
            if (el.type === 'number' && (isNaN(parseFloat(v)) || parseFloat(v) <= 0)) { return 'Masukkan angka lebih dari 0.'; }
            if (el.tagName === 'TEXTAREA' && el.required && v.length < 10) { return 'Tuliskan minimal 10 karakter.'; }
            return '';
        }

        function valueOf(el) {
            if (el.tagName === 'SELECT') {
                var o = el.options[el.selectedIndex];
                return o && !o.disabled && o.value !== '' ? o.textContent.trim() : '';
            }
            if (el.type === 'date' && el.value) {
                var p = el.value.split('-');
                return p.length === 3 ? p[2] + '/' + p[1] + '/' + p[0] : el.value;
            }
            return (el.value || '').trim();
        }

        forms.forEach(function (form) {
            var fields = $$('input[name], select[name], textarea[name]', form);
            var ok = $('.form__ok', form);
            var retry = $('[data-wa-retry]', form);

            // prefill ?komoditas=slug
            var pre = params.get('komoditas');
            if (pre) {
                var sel = $('select[name="komoditas"]', form);
                if (sel && $('option[value="' + pre.replace(/"/g, '') + '"]', sel)) {
                    sel.value = pre;
                    if (sel._agroSync) { sel._agroSync(); }
                }
            }

            fields.forEach(function (el) {
                var evt = el.tagName === 'SELECT' ? 'change' : 'input';
                el.addEventListener(evt, function () { if (fieldWrap(el) && fieldWrap(el).classList.contains('is-invalid')) { setError(el, validate(el)); } });
                el.addEventListener('blur', function () { if (el.value && el.tagName !== 'SELECT') { setError(el, validate(el)); } });
            });

            form.addEventListener('submit', function (e) {
                e.preventDefault();
                var firstBad = null;
                fields.forEach(function (el) {
                    var msg = validate(el);
                    setError(el, msg);
                    if (msg && !firstBad) { firstBad = el; }
                });
                if (firstBad) {
                    var f = firstBad.classList.contains('is-enhanced') ? $('.cselect__btn', fieldWrap(firstBad)) : firstBad;
                    if (f) { f.focus(); }
                    return;
                }

                var lines = ['*' + (form.dataset.waTitle || 'Permintaan') + '*', ''];
                fields.forEach(function (el) {
                    var val = valueOf(el);
                    if (val) { lines.push((el.dataset.label || el.name) + ': ' + val); }
                });
                lines.push('', 'Dikirim dari website AgroTrade.');
                var url = 'https://wa.me/' + number + '?text=' + encodeURIComponent(lines.join('\n'));

                if (retry) { retry.href = url; }
                if (ok) { ok.hidden = false; ok.scrollIntoView({ block: 'nearest', behavior: reduceMotion ? 'auto' : 'smooth' }); }
                var w = window.open(url, '_blank', 'noopener');
                if (!w && ok) { ok.focus && ok.focus(); }
            });
        });
    })();

    /* -------------------------------------------------- Filter katalog komoditas */
    (function () {
        var grid = $('#cmGrid');
        if (!grid) { return; }
        var cards = $$('.cm-card', grid);
        var input = $('#cmSearch');
        var clear = $('#cmClear');
        var chips = $$('.chip[data-filter]');
        var count = $('#cmCount');
        var empty = $('#cmEmpty');
        var group = 'all';

        function norm(t) {
            var s = String(t || '').toLowerCase();
            if (s.normalize) { s = s.normalize('NFD').replace(/[\u0300-\u036f]/g, ''); }
            return s;
        }

        function apply() {
            var q = norm(input ? input.value : '').trim();
            var shown = 0;
            cards.forEach(function (c) {
                var okGroup = group === 'all' || c.dataset.group === group;
                var okText = !q || norm(c.dataset.name).indexOf(q) !== -1;
                var show = okGroup && okText;
                c.hidden = !show;
                if (show) { shown += 1; if (c.classList.contains('rv')) { c.classList.add('is-in'); } }
            });
            if (count) { count.textContent = 'Menampilkan ' + shown + ' dari ' + cards.length + ' komoditas'; }
            if (empty) { empty.hidden = shown !== 0; }
            if (clear) { clear.hidden = !(input && input.value); }
        }

        chips.forEach(function (chip) {
            chip.addEventListener('click', function () {
                group = chip.dataset.filter;
                chips.forEach(function (c) {
                    var on = c === chip;
                    c.classList.toggle('is-active', on);
                    c.setAttribute('aria-pressed', on ? 'true' : 'false');
                });
                apply();
            });
        });
        if (input) {
            input.addEventListener('input', apply);
            input.addEventListener('keydown', function (e) { if (e.key === 'Escape' && input.value) { input.value = ''; apply(); } });
            var q = new URLSearchParams(window.location.search).get('q');
            if (q) { input.value = q; }
        }
        if (clear) { clear.addEventListener('click', function () { input.value = ''; apply(); input.focus(); }); }
        apply();
    })();

    /* -------------------------------------------------- Tabs (spesifikasi) */
    $$('[data-tabs]').forEach(function (root) {
        var tabs = $$('[role="tab"]', root);
        var panels = $$('[role="tabpanel"]', root);

        function activate(slug, focus) {
            var found = tabs.some(function (t) { return t.dataset.tab === slug; });
            if (!found) { return false; }
            tabs.forEach(function (t) {
                var on = t.dataset.tab === slug;
                t.classList.toggle('is-active', on);
                t.setAttribute('aria-selected', on ? 'true' : 'false');
                t.tabIndex = on ? 0 : -1;
                if (on && focus) { t.focus(); }
                if (on && t.scrollIntoView) { t.scrollIntoView({ block: 'nearest', inline: 'center', behavior: reduceMotion ? 'auto' : 'smooth' }); }
            });
            panels.forEach(function (p) { p.hidden = p.id !== 'spec-' + slug; });
            return found;
        }

        tabs.forEach(function (t, i) {
            t.addEventListener('click', function () {
                activate(t.dataset.tab, false);
                if (window.history && window.history.replaceState) { window.history.replaceState(null, '', '#' + t.dataset.tab); }
            });
            t.addEventListener('keydown', function (e) {
                var n = null;
                if (e.key === 'ArrowRight') { n = tabs[(i + 1) % tabs.length]; }
                if (e.key === 'ArrowLeft') { n = tabs[(i - 1 + tabs.length) % tabs.length]; }
                if (e.key === 'Home') { n = tabs[0]; }
                if (e.key === 'End') { n = tabs[tabs.length - 1]; }
                if (n) { e.preventDefault(); activate(n.dataset.tab, true); }
            });
        });

        function fromHash() {
            var h = window.location.hash.replace('#', '');
            if (h) { activate(h, false); }
        }
        fromHash();
        window.addEventListener('hashchange', fromHash);
    });

    /* -------------------------------------------------- AgroBot (chat FAQ) */
    (function () {
        var panel = $('#chatPanel');
        var toggle = $('#chatToggle');
        if (!panel || !toggle || !DATA.ai) { return; }

        var log = $('#chatLog');
        var chips = $('#chatChips');
        var form = $('#chatForm');
        var input = $('#chatInput');
        var closeBtn = $('#chatClose');
        var resetBtn = $('#chatReset');
        var badge = $('#chatBadge');
        var hint = $('#botHint');
        var hintClose = $('#botHintClose');
        var faq = DATA.ai.faq || [];
        var topics = DATA.ai.topics || [];
        var welcomed = false;
        var busy = false;
        var botImg = $('.chat__avatar img', panel);
        var botSrc = botImg ? botImg.getAttribute('src') : '';
        var waNumber = (DATA.whatsapp && DATA.whatsapp.number) || '';

        function scrollDown() { log.scrollTop = log.scrollHeight; }

        function now() {
            try { return new Date().toLocaleTimeString('id-ID', { hour: '2-digit', minute: '2-digit' }).replace('.', ':'); } catch (e) { return ''; }
        }

        function addMsg(role, content, isHtml) {
            var el = doc.createElement('div');
            el.className = 'msg msg--' + role;
            var html = '';
            if (role === 'bot') { html += '<span class="msg__av"><img src="' + escapeHtml(botSrc) + '" alt="" width="22" height="26"></span>'; }
            html += '<div class="msg__col"><div class="msg__bub"></div><span class="msg__time">' + now() + '</span></div>';
            el.innerHTML = html;
            var bub = $('.msg__bub', el);
            if (isHtml) { bub.innerHTML = content; } else { bub.textContent = content; }
            log.appendChild(el);
            scrollDown();
            return el;
        }

        function addTyping() {
            var el = addMsg('bot', '<span class="typing" role="status" aria-label="AgroBot sedang mengetik"><i></i><i></i><i></i></span>', true);
            var t = $('.msg__time', el);
            if (t) { t.hidden = true; }
            return el;
        }

        function normalize(t) {
            var s = String(t).toLowerCase();
            if (s.normalize) { s = s.normalize('NFD').replace(/[\u0300-\u036f]/g, ''); }
            return ' ' + s.replace(/[^a-z0-9\/\s]/g, ' ').replace(/\s+/g, ' ') + ' ';
        }

        function findAnswer(q) {
            var n = normalize(q);
            var best = null;
            var bestScore = 0;
            faq.forEach(function (f) {
                var score = 0;
                if (normalize(f.q).trim() === n.trim()) { score += 10; }
                (f.kw || []).forEach(function (k) {
                    if (n.indexOf(' ' + k.toLowerCase()) !== -1) { score += k.length > 3 ? 3 : 2; }
                });
                normalize(f.q).trim().split(' ').forEach(function (w) {
                    if (w.length > 4 && n.indexOf(' ' + w) !== -1) { score += 1; }
                });
                if (score > bestScore) { bestScore = score; best = f; }
            });
            return bestScore >= 2 ? best : null;
        }

        function waLink(text) { return 'https://wa.me/' + waNumber + '?text=' + encodeURIComponent(text); }

        function reply(q) {
            var n = normalize(q);
            if (/ (halo|hai|hi|hello|selamat) /.test(n) && n.trim().split(' ').length <= 3) {
                return escapeHtml('Halo! Ada yang bisa saya bantu seputar komoditas, harga, pengiriman, sertifikasi, atau kemitraan?');
            }
            if (/ (terima kasih|makasih|thanks|thank you) /.test(n)) {
                return escapeHtml('Sama-sama! Jika ada pertanyaan lain, silakan tanyakan kapan saja.');
            }
            if (/ (admin|cs|manusia|petugas|sales|agen) /.test(n)) {
                return escapeHtml('Tentu, Anda bisa langsung berbincang dengan tim kami melalui WhatsApp.') +
                    '<br><a class="msg__cta" href="' + waLink(DATA.whatsapp.greeting) + '" target="_blank" rel="noopener">Chat WhatsApp ' + svgIcon('arrow', 'i--sm') + '</a>';
            }
            var f = findAnswer(q);
            if (f) {
                return escapeHtml(f.a) + '<br><a class="msg__cta" href="' + escapeHtml(f.url) + '">' + escapeHtml(f.cta) + ' ' + svgIcon('arrow', 'i--sm') + '</a>';
            }
            return escapeHtml(DATA.ai.fallback) +
                '<br><a class="msg__cta" href="' + waLink('Halo AgroTrade, saya ingin bertanya: ' + q) + '" target="_blank" rel="noopener">Tanya via WhatsApp ' + svgIcon('arrow', 'i--sm') + '</a>';
        }

        function ask(q) {
            q = (q || '').trim();
            if (!q || busy) { return; }
            busy = true;
            var tp = $('.topics', log);
            if (tp) { tp.remove(); }
            addMsg('user', q, false);
            var t = addTyping();
            var delay = reduceMotion ? 0 : 500 + Math.min(800, q.length * 14);
            window.setTimeout(function () {
                t.remove();
                addMsg('bot', reply(q), true);
                busy = false;
            }, delay);
        }

        function renderChips() {
            chips.innerHTML = '';
            faq.forEach(function (f) {
                var b = doc.createElement('button');
                b.type = 'button';
                b.textContent = f.q;
                b.addEventListener('click', function () { ask(f.q); });
                chips.appendChild(b);
            });
        }

        function welcome() {
            if (welcomed) { return; }
            welcomed = true;
            addMsg('bot', DATA.ai.welcome, false);
            if (topics.length) {
                var wrap = doc.createElement('div');
                wrap.className = 'topics';
                topics.forEach(function (t) {
                    var b = doc.createElement('button');
                    b.type = 'button';
                    b.className = 'topic';
                    b.innerHTML = '<span class="topic__ico">' + svgIcon(t.icon) + '</span><span></span>';
                    $('span:last-child', b).textContent = t.label;
                    b.addEventListener('click', function () { ask(t.q); });
                    wrap.appendChild(b);
                });
                log.appendChild(wrap);
            }
            renderChips();
            scrollDown();
        }

        function markRead() {
            if (badge) { badge.classList.add('is-read'); }
            if (hint) { hint.hidden = true; }
            store.set('agroHintSeen', '1');
        }

        function open(question) {
            if (!panel.hidden) { if (question) { ask(question); } return; }
            panel.classList.remove('is-closing');
            panel.hidden = false;
            body.classList.add('chat-open');
            toggle.setAttribute('aria-expanded', 'true');
            markRead();
            welcome();
            if (question) {
                window.setTimeout(function () { ask(question); }, 250);
            } else {
                window.setTimeout(function () { input.focus(); }, 80);
            }
        }

        function close() {
            if (panel.hidden) { return; }
            function done() {
                panel.hidden = true;
                panel.classList.remove('is-closing');
                body.classList.remove('chat-open');
                toggle.setAttribute('aria-expanded', 'false');
                toggle.focus();
            }
            if (reduceMotion) { done(); return; }
            panel.classList.add('is-closing');
            window.setTimeout(done, 190);
        }

        function reset() {
            log.innerHTML = '';
            welcomed = false;
            busy = false;
            welcome();
            input.focus();
        }

        toggle.addEventListener('click', function () { panel.hidden ? open() : close(); });
        closeBtn.addEventListener('click', close);
        if (resetBtn) { resetBtn.addEventListener('click', reset); }
        doc.addEventListener('keydown', function (e) {
            if (e.key === 'Escape' && !panel.hidden && (!$('#searchModal') || $('#searchModal').hidden)) { close(); }
        });
        form.addEventListener('submit', function (e) {
            e.preventDefault();
            var v = input.value;
            input.value = '';
            ask(v);
        });

        $$('[data-chat-open]').forEach(function (b) { b.addEventListener('click', function () { open(); }); });
        $$('[data-chat-ask]').forEach(function (b) { b.addEventListener('click', function () { open(b.getAttribute('data-chat-ask')); }); });

        /* Sapaan AgroBot: muncul sekali per sesi, dengan efek mengetik */
        if (store.get('agroHintSeen') && badge) { badge.classList.add('is-read'); }
        if (hint && !store.get('agroHintSeen')) {
            window.setTimeout(function () {
                if (!panel.hidden) { return; }
                hint.hidden = false;
                var typing = $('.hint__typing', hint);
                var msg = $('.hint__msg', hint);
                var hchips = $('.hint__chips', hint);
                window.setTimeout(function () {
                    if (typing) { typing.hidden = true; }
                    if (msg) { msg.hidden = false; }
                    if (hchips) { hchips.hidden = false; }
                }, reduceMotion ? 0 : 1400);
            }, reduceMotion ? 800 : 4000);
        }
        if (hintClose) { hintClose.addEventListener('click', function () { hint.hidden = true; store.set('agroHintSeen', '1'); }); }
    })();
})();
