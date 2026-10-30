/* ==========================================================================
   WoodenLane · Furniture · Premium Minimal · Mocha Cream  —  furniture.js
   Vanilla JS (tanpa dependensi). Data dibaca dari <script id="fm-data"> yang
   dirender layout dari config furniture.php.
   Modul: util · scroll-lock · header/drawer · search · favorit · hero slider ·
          modal · reveal · katalog · custom design · material · dimensions ·
          gallery · form→WhatsApp · lead time · chatbot · newsletter
   ========================================================================== */
(function () {
    'use strict';

    /* ───────── util ───────── */
    var $ = function (s, c) { return (c || document).querySelector(s); };
    var $$ = function (s, c) { return Array.prototype.slice.call((c || document).querySelectorAll(s)); };
    var FM = {};
    try { FM = JSON.parse(($('#fm-data') || {}).textContent || '{}'); } catch (e) { FM = {}; }
    var reduceMotion = window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches;
    var qs = new URLSearchParams(window.location.search);

    function el(tag, attrs) {
        var n = document.createElement(tag), k, v;
        for (k in (attrs || {})) {
            v = attrs[k];
            if (v == null || v === false) continue;
            if (k === 'class') n.className = v;
            else if (k === 'text') n.textContent = v;
            else if (k.indexOf('on') === 0 && typeof v === 'function') n.addEventListener(k.slice(2), v);
            else n.setAttribute(k, v === true ? '' : v);
        }
        for (var i = 2; i < arguments.length; i++) {
            [].concat(arguments[i]).forEach(function (c) { if (c != null && c !== false) n.append(c.nodeType ? c : document.createTextNode(c)); });
        }
        return n;
    }
    function icon(name, cls) {
        var ns = 'http://www.w3.org/2000/svg', s = document.createElementNS(ns, 'svg'), u = document.createElementNS(ns, 'use');
        s.setAttribute('class', 'fm-i ' + (cls || '')); s.setAttribute('aria-hidden', 'true');
        u.setAttribute('href', '#i-' + name); s.appendChild(u); return s;
    }
    function norm(s) { return String(s || '').toLowerCase().normalize('NFD').replace(/[\u0300-\u036f]/g, '').replace(/[^a-z0-9\s]/g, ' ').replace(/\s+/g, ' ').trim(); }
    function waUrl(text) { return 'https://wa.me/' + FM.wa + '?text=' + encodeURIComponent(text); }
    function openWA(text) {
        var w = window.open(waUrl(text), '_blank', 'noopener');
        if (!w) window.location.href = waUrl(text);
    }
    var store = {
        get: function (k, d) { try { var v = JSON.parse(localStorage.getItem(k)); return v == null ? d : v; } catch (e) { return d; } },
        set: function (k, v) { try { localStorage.setItem(k, JSON.stringify(v)); } catch (e) { /* storage dinonaktifkan */ } }
    };
    function findItem(slug) { return ((FM.catalog || {}).items || []).filter(function (i) { return i.slug === slug; })[0]; }
    function debounce(fn, ms) { var t; return function () { var a = arguments, c = this; clearTimeout(t); t = setTimeout(function () { fn.apply(c, a); }, ms); }; }

    /* ───────── scroll-lock + focus trap ───────── */
    var lockCount = 0;
    function lock() { lockCount++; document.body.classList.add('fm-lock'); }
    function unlock() { lockCount = Math.max(0, lockCount - 1); if (!lockCount) document.body.classList.remove('fm-lock'); }
    var FOCUSABLE = 'a[href],button:not([disabled]),input:not([disabled]),select,textarea,[tabindex]:not([tabindex="-1"])';
    function trap(container, e) {
        if (e.key !== 'Tab') return;
        var f = $$(FOCUSABLE, container).filter(function (n) { return n.offsetParent !== null; });
        if (!f.length) return;
        var first = f[0], last = f[f.length - 1];
        if (e.shiftKey && document.activeElement === first) { e.preventDefault(); last.focus(); }
        else if (!e.shiftKey && document.activeElement === last) { e.preventDefault(); first.focus(); }
    }

    /* ───────── overlay registry (ESC menutup yang paling atas) ───────── */
    var overlays = [];
    function registerOverlay(o) { overlays.push(o); }
    document.addEventListener('keydown', function (e) {
        if (e.key !== 'Escape') return;
        for (var i = overlays.length - 1; i >= 0; i--) { if (overlays[i].isOpen()) { overlays[i].close(); e.preventDefault(); break; } }
    });

    /* ───────── header, dropdown, drawer ───────── */
    function initHeader() {
        var header = $('[data-fm-header]');
        if (header) {
            var onScroll = function () { header.classList.toggle('is-stuck', window.scrollY > 8); };
            onScroll(); window.addEventListener('scroll', onScroll, { passive: true });
        }
        // dropdown navbar: hover-intent (mouse), klik (sentuh), keyboard penuh
        var canHover = window.matchMedia && window.matchMedia('(hover: hover)').matches;
        $$('[data-fm-drop]').forEach(function (d) {
            var btn = $('button', d), menu = $('.fm-menu', d), links = $$('a', menu), openT = null, closeT = null;
            function isOpen() { return d.classList.contains('is-open'); }
            function open(focusFirst) {
                clearTimeout(closeT);
                $$('[data-fm-drop].is-open').forEach(function (o) { if (o !== d) { o.classList.remove('is-open'); $('button', o).setAttribute('aria-expanded', 'false'); } });
                d.classList.add('is-open'); btn.setAttribute('aria-expanded', 'true');
                if (focusFirst && links[0]) setTimeout(function () { links[0].focus(); }, 40);
            }
            function close(returnFocus) {
                clearTimeout(openT); d.classList.remove('is-open'); btn.setAttribute('aria-expanded', 'false');
                if (returnFocus) btn.focus();
            }
            btn.addEventListener('click', function (e) { e.stopPropagation(); isOpen() ? close() : open(); });
            if (canHover) {
                d.addEventListener('mouseenter', function () { clearTimeout(closeT); openT = setTimeout(open, 90); });
                d.addEventListener('mouseleave', function () { clearTimeout(openT); closeT = setTimeout(function () { close(); }, 220); });
            }
            btn.addEventListener('keydown', function (e) {
                if (e.key === 'ArrowDown') { e.preventDefault(); open(true); }
                else if (e.key === 'ArrowUp') { e.preventDefault(); open(); setTimeout(function () { links[links.length - 1].focus(); }, 40); }
            });
            menu.addEventListener('keydown', function (e) {
                var i = links.indexOf(document.activeElement);
                if (e.key === 'ArrowDown') { e.preventDefault(); links[(i + 1) % links.length].focus(); }
                else if (e.key === 'ArrowUp') { e.preventDefault(); links[(i - 1 + links.length) % links.length].focus(); }
                else if (e.key === 'Home') { e.preventDefault(); links[0].focus(); }
                else if (e.key === 'End') { e.preventDefault(); links[links.length - 1].focus(); }
            });
            d.addEventListener('focusout', function (e) { if (isOpen() && !d.contains(e.relatedTarget)) close(); });
            document.addEventListener('click', function (e) { if (!d.contains(e.target)) close(); });
            registerOverlay({ isOpen: isOpen, close: function () { close(true); } });
        });
        // accordion di drawer mobile
        $$('[data-fm-acc]').forEach(function (a) {
            var b = $('.fm-acc__btn', a), p = $('.fm-acc__panel', a);
            b.addEventListener('click', function () {
                var open = p.hidden; p.hidden = !open; a.classList.toggle('is-open', open); b.setAttribute('aria-expanded', open);
            });
        });
        // drawer
        var drawer = $('[data-fm-drawer]'), burger = $('[data-fm-drawer-open]');
        if (!drawer || !burger) return;
        var panel = $('.fm-drawer__panel', drawer);
        function open() { drawer.hidden = false; burger.setAttribute('aria-expanded', 'true'); lock(); var f = $(FOCUSABLE, panel); if (f) f.focus(); }
        function close() { if (drawer.hidden) return; drawer.hidden = true; burger.setAttribute('aria-expanded', 'false'); unlock(); burger.focus(); }
        burger.addEventListener('click', open);
        $$('[data-fm-drawer-close]', drawer).forEach(function (b) { b.addEventListener('click', close); });
        $$('a', panel).forEach(function (a) { a.addEventListener('click', function () { drawer.hidden = true; unlock(); }); });
        panel.addEventListener('keydown', function (e) { trap(panel, e); });
        window.addEventListener('resize', debounce(function () { if (window.innerWidth > 991) close(); }, 150));
        registerOverlay({ isOpen: function () { return !drawer.hidden; }, close: close });
    }

    /* ───────── pencarian ───────── */
    function initSearch() {
        var wrap = $('[data-fm-search]'); if (!wrap) return;
        var input = $('[data-fm-search-input]', wrap), list = $('[data-fm-search-results]', wrap), hint = $('[data-fm-search-hint]', wrap), form = $('[data-fm-search-form]', wrap);
        var opener = null, focusIdx = -1;
        function open(btn) { opener = btn || null; wrap.hidden = false; lock(); input.value = ''; render(''); setTimeout(function () { input.focus(); }, 30); }
        function close() { if (wrap.hidden) return; wrap.hidden = true; unlock(); if (opener) opener.focus(); }
        function render(q) {
            list.textContent = ''; focusIdx = -1;
            var n = norm(q);
            if (n.length < 2) { hint.hidden = false; hint.textContent = 'Ketik minimal 2 huruf, mis. “sofa”, “jati”, atau “penawaran”.'; return; }
            var res = (FM.search || []).map(function (it) {
                var t = norm(it.t), d = norm(it.d), s = 0;
                if (t.indexOf(n) === 0) s = 4; else if (t.indexOf(n) > -1) s = 3; else if (d.indexOf(n) > -1) s = 1;
                return { it: it, s: s };
            }).filter(function (r) { return r.s; }).sort(function (a, b) { return b.s - a.s; }).slice(0, 8);
            if (!res.length) { hint.hidden = false; hint.textContent = 'Tidak ada hasil untuk “' + q + '”. Coba kata lain.'; return; }
            hint.hidden = true;
            res.forEach(function (r) {
                list.appendChild(el('li', { role: 'option' }, el('a', { href: r.it.u },
                    el('span', null, el('strong', { text: r.it.t }), el('small', { text: r.it.d })), el('em', { text: r.it.k }))));
            });
        }
        function move(dir) {
            var links = $$('a', list); if (!links.length) return;
            focusIdx = (focusIdx + dir + links.length) % links.length;
            links.forEach(function (a, i) { a.classList.toggle('is-focus', i === focusIdx); });
            links[focusIdx].scrollIntoView({ block: 'nearest' });
        }
        $$('[data-fm-search-open]').forEach(function (b) { b.addEventListener('click', function () { open(b); }); });
        $$('[data-fm-search-close]', wrap).forEach(function (b) { b.addEventListener('click', close); });
        input.addEventListener('input', debounce(function () { render(input.value); }, 90));
        input.addEventListener('keydown', function (e) {
            if (e.key === 'ArrowDown') { e.preventDefault(); move(1); } else if (e.key === 'ArrowUp') { e.preventDefault(); move(-1); }
        });
        form.addEventListener('submit', function (e) {
            e.preventDefault();
            var links = $$('a', list), t = links[focusIdx > -1 ? focusIdx : 0];
            if (t) window.location.href = t.href;
        });
        wrap.addEventListener('keydown', function (e) { trap($('.fm-search__box', wrap), e); });
        registerOverlay({ isOpen: function () { return !wrap.hidden; }, close: close });
    }

    /* ───────── favorit ───────── */
    var FAV_KEY = 'fm-furniture-fav';
    function initFav() {
        var root = $('[data-fm-fav]');
        var panel = root && $('[data-fm-fav-panel]', root), toggle = root && $('[data-fm-fav-toggle]', root);
        function get() { return store.get(FAV_KEY, []).filter(function (s) { return findItem(s); }); }
        function render() {
            var favs = get();
            $$('[data-fm-heart]').forEach(function (h) {
                var on = favs.indexOf(h.getAttribute('data-fm-heart')) > -1; h.setAttribute('aria-pressed', on);
            });
            if (!root) return;
            var count = $('[data-fm-fav-count]', root), list = $('[data-fm-fav-list]', root), empty = $('[data-fm-fav-empty]', root), cta = $('[data-fm-fav-quote]', root);
            count.hidden = !favs.length; count.textContent = favs.length;
            list.textContent = '';
            favs.forEach(function (s) {
                var it = findItem(s);
                list.appendChild(el('li', null, el('span', { text: it.name }),
                    el('button', { type: 'button', 'aria-label': 'Hapus ' + it.name + ' dari favorit', text: 'Hapus', onclick: function () { set(s, false); } })));
            });
            empty.hidden = !!favs.length; cta.hidden = !favs.length;
            if (favs.length) cta.href = (FM.routes.quotation || '#') + '?items=' + favs.join(',');
        }
        function set(slug, on) {
            var favs = get().filter(function (s) { return s !== slug; });
            if (on) favs.push(slug);
            store.set(FAV_KEY, favs); render();
        }
        $$('[data-fm-heart]').forEach(function (h) {
            h.addEventListener('click', function () { var s = h.getAttribute('data-fm-heart'); set(s, h.getAttribute('aria-pressed') !== 'true'); });
        });
        if (root) {
            var close = function () { panel.hidden = true; toggle.setAttribute('aria-expanded', 'false'); };
            toggle.addEventListener('click', function (e) { e.stopPropagation(); var o = panel.hidden; panel.hidden = !o; toggle.setAttribute('aria-expanded', o); });
            document.addEventListener('click', function (e) { if (!root.contains(e.target)) close(); });
            registerOverlay({ isOpen: function () { return !panel.hidden; }, close: function () { close(); toggle.focus(); } });
        }
        window.addEventListener('storage', render);
        render();
    }

    /* ───────── hero slider ───────── */
    function initHero() {
        $$('[data-fm-hero]').forEach(function (hero) {
            var slides = $$('[data-fm-slide]', hero), dots = $$('[data-fm-dot]', hero), i = 0, timer = null;
            if (slides.length < 2) return;
            function go(n) {
                i = (n + slides.length) % slides.length;
                slides.forEach(function (s, k) {
                    var on = k === i; s.classList.toggle('is-active', on);
                    if (on) s.removeAttribute('aria-hidden'); else s.setAttribute('aria-hidden', 'true');
                    $$('a,button', s).forEach(function (b) { b.tabIndex = on ? 0 : -1; });
                });
                dots.forEach(function (d, k) { d.classList.toggle('is-active', k === i); if (k === i) d.setAttribute('aria-current', 'true'); else d.removeAttribute('aria-current'); });
            }
            function play() { if (reduceMotion || timer) return; timer = setInterval(function () { go(i + 1); }, 6500); }
            function stop() { clearInterval(timer); timer = null; }
            dots.forEach(function (d) { d.addEventListener('click', function () { go(+d.getAttribute('data-fm-dot')); stop(); play(); }); });
            hero.addEventListener('mouseenter', stop); hero.addEventListener('mouseleave', play);
            hero.addEventListener('focusin', stop); hero.addEventListener('focusout', play);
            document.addEventListener('visibilitychange', function () { document.hidden ? stop() : play(); });
            var x0 = null;
            hero.addEventListener('touchstart', function (e) { x0 = e.touches[0].clientX; }, { passive: true });
            hero.addEventListener('touchend', function (e) {
                if (x0 == null) return; var dx = e.changedTouches[0].clientX - x0; x0 = null;
                if (Math.abs(dx) > 45) { go(i + (dx < 0 ? 1 : -1)); stop(); play(); }
            }, { passive: true });
            go(0); play();
        });
    }

    /* ───────── modal generik + video ───────── */
    function bindModal(m, onOpen, onClose) {
        var box = $('.fm-modal__box', m), last = null;
        function open() { last = document.activeElement; m.hidden = false; lock(); onOpen && onOpen(); var f = $(FOCUSABLE, box); (f || box).focus && (f || box).focus(); }
        function close() { if (m.hidden) return; m.hidden = true; unlock(); onClose && onClose(); if (last && last.focus) last.focus(); }
        $$('[data-fm-modal-close]', m).forEach(function (b) { b.addEventListener('click', close); });
        m.addEventListener('keydown', function (e) { trap(box, e); });
        registerOverlay({ isOpen: function () { return !m.hidden; }, close: close });
        return { open: open, close: close };
    }
    function initVideo() {
        var m = $('[data-fm-video-modal]'); if (!m) return;
        var stage = $('[data-fm-video-stage]', m), src = m.getAttribute('data-src'), original = stage.innerHTML;
        var api = bindModal(m, function () {
            if (!src) return;
            stage.textContent = '';
            stage.appendChild(/\.(mp4|webm)(\?|$)/i.test(src)
                ? el('video', { src: src, controls: true, autoplay: true, playsinline: true })
                : el('iframe', { src: src + (src.indexOf('?') > -1 ? '&' : '?') + 'autoplay=1', title: 'Video profil', allow: 'autoplay; encrypted-media; picture-in-picture', allowfullscreen: true }));
        }, function () { if (src) stage.innerHTML = original; });
        $$('[data-fm-video-open]').forEach(function (b) { b.addEventListener('click', api.open); });
    }

    /* ───────── reveal on scroll ───────── */
    function initReveal() {
        var items = $$('[data-fm-reveal]'); if (!items.length) return;
        if (!('IntersectionObserver' in window) || reduceMotion) { items.forEach(function (n) { n.classList.add('is-visible'); }); return; }
        items.forEach(function (n, k) { n.style.setProperty('--fm-d', (k % 6) * 70 + 'ms'); });
        var io = new IntersectionObserver(function (es) {
            es.forEach(function (e) { if (e.isIntersecting) { e.target.classList.add('is-visible'); io.unobserve(e.target); } });
        }, { rootMargin: '0px 0px -8% 0px', threshold: .08 });
        items.forEach(function (n) { io.observe(n); });
    }

    /* ───────── katalog ───────── */
    function initCatalog() {
        var root = $('[data-fm-catalog]'); if (!root) return;
        var cards = $$('.fm-catcard', root), q = $('[data-fm-cat-q]', root), chips = $$('[data-fm-cat-style]', root);
        var count = $('[data-fm-cat-count]', root), empty = $('[data-fm-cat-empty]', root), state = { q: '', style: '' };
        function apply() {
            var n = norm(state.q), shown = 0;
            cards.forEach(function (c) {
                var okQ = !n || norm(c.getAttribute('data-search')).indexOf(n) > -1;
                var okS = !state.style || c.getAttribute('data-styles').split(',').indexOf(state.style) > -1;
                c.hidden = !(okQ && okS); if (!c.hidden) { shown++; c.classList.add('is-visible'); }
            });
            count.textContent = 'Menampilkan ' + shown + ' dari ' + cards.length + ' kategori furniture';
            empty.hidden = shown > 0;
        }
        q.addEventListener('input', debounce(function () { state.q = q.value; apply(); }, 120));
        chips.forEach(function (c) {
            c.addEventListener('click', function () {
                state.style = c.getAttribute('data-fm-cat-style');
                chips.forEach(function (x) { var on = x === c; x.classList.toggle('is-active', on); x.setAttribute('aria-pressed', on); });
                apply();
            });
        });
        // parameter dari beranda / pencarian
        var cat = qs.get('cat'), st = qs.get('style');
        if (cat && findItem(cat)) { state.q = findItem(cat).name; q.value = state.q; }
        if (st) { var target = chips.filter(function (c) { return c.getAttribute('data-fm-cat-style') === st; })[0]; if (target) target.click(); }
        apply();

        // quick view
        var modal = $('[data-fm-quick-modal]', root), body = $('[data-fm-quick-body]', root);
        var api = bindModal(modal);
        function show(slug) {
            var it = findItem(slug); if (!it) return;
            function ul(arr) { return el('ul', { class: 'plain' }, arr.map(function (t) { return el('li', { text: t }); })); }
            body.textContent = '';
            body.append(
                el('img', { src: FM.img + '/' + it.image, alt: it.name }),
                el('div', { class: 'fm-quick__body' },
                    el('p', { class: 'fm-eyebrow', text: 'DETAIL KOLEKSI' }),
                    el('h3', { id: 'fm-quick-title', text: it.name }),
                    el('p', { text: it.text }),
                    el('div', null, el('h4', { text: 'Gaya tersedia' }), el('ul', { class: 'fm-tags' }, it.styles.map(function (s) { return el('li', { text: s }); }))),
                    el('div', null, el('h4', { text: 'Tipe' }), ul(it.types)),
                    el('div', null, el('h4', { text: 'Material' }), ul(it.materials)),
                    el('div', { class: 'fm-catcard__actions' },
                        el('a', { class: 'fm-btn fm-btn--dark fm-btn--sm', href: FM.routes.quotation + '?items=' + slug, text: 'Minta Penawaran' }),
                        el('a', { class: 'fm-btn fm-btn--outline fm-btn--sm', href: FM.routes['custom-design'], text: 'Custom Design' }))));
            api.open();
        }
        $$('[data-fm-quick]', root).forEach(function (b) { b.addEventListener('click', function () { show(b.getAttribute('data-fm-quick')); }); });
    }

    /* ───────── custom design (konfigurator) ───────── */
    function initConfig() {
        var root = $('[data-fm-config]'); if (!root) return;
        var form = $('[data-fm-cfg-form]', root), img = $('[data-fm-cfg-img]', root), go = $('[data-fm-cfg-go]', root);
        var customBox = $('[data-fm-cfg-custom]', root);
        function val(name) { var c = $('input[name="' + name + '"]:checked', form); return c; }
        function update() {
            var type = val('type'), style = val('style'), color = val('color'), mat = val('material'), size = val('size');
            var it = findItem(type.value);
            if (it) { img.style.opacity = .4; var n = new Image(); n.onload = function () { img.src = n.src; img.alt = 'Pratinjau ' + it.name; img.style.opacity = 1; }; n.src = FM.img + '/' + it.image; }
            var set = function (k, t) { $('[data-fm-cfg-o="' + k + '"]', root).textContent = t; };
            set('type', type.getAttribute('data-label')); set('style', style.value); set('color', color.value); set('material', mat.value);
            $('[data-fm-cfg-dot]', root).style.background = color.getAttribute('data-hex');
            $('[data-fm-cfg-wood]', root).style.background = mat.getAttribute('data-hex');
            var custom = size.value === 'kustom'; customBox.hidden = !custom;
            var w = form.w.value, d = form.d.value, h = form.h.value, sizeTxt = size.getAttribute('data-label');
            if (custom && w && d && h) sizeTxt += ' · ' + w + ' × ' + d + ' × ' + h + ' cm';
            set('size', sizeTxt);
            var p = new URLSearchParams({ type: type.value, style: style.value, color: color.value, material: mat.value, size: size.value });
            if (custom) { if (w) p.set('w', w); if (d) p.set('d', d); if (h) p.set('h', h); }
            go.href = FM.routes['custom-order'] + '?' + p.toString();
        }
        form.addEventListener('change', update); form.addEventListener('input', update);
        var t = qs.get('type'); if (t) { var r = $('input[name="type"][value="' + t + '"]', form); if (r) r.checked = true; }
        update();
    }

    /* ───────── material ───────── */
    function initMaterials() {
        var root = $('[data-fm-materials]'); if (!root) return;
        var btns = $$('[data-fm-mat]', root), detail = $('[data-fm-mat-detail]', root);
        function pick(key) {
            var it = ((FM.materials || {}).items || []).filter(function (m) { return m.key === key; })[0]; if (!it) return;
            btns.forEach(function (b) { var on = b.getAttribute('data-fm-mat') === key; b.classList.toggle('is-active', on); b.setAttribute('aria-pressed', on); });
            var g = function (k) { return $('[data-fm-md="' + k + '"]', detail); };
            g('sw').style.setProperty('--a', it.tone[0]); g('sw').style.setProperty('--b', it.tone[1]);
            g('name').textContent = it.name; g('text').textContent = it.text; g('grain').textContent = it.grain; g('best').textContent = it.best;
            var rt = g('rating'); rt.setAttribute('aria-label', it.durability + ' dari 5');
            $$('i', rt).forEach(function (i, k) { i.classList.toggle('on', k < it.durability); });
            g('go').href = FM.routes['custom-order'] + '?material=' + encodeURIComponent(it.name);
        }
        btns.forEach(function (b) { b.addEventListener('click', function () { pick(b.getAttribute('data-fm-mat')); }); });
        if (qs.get('m')) pick(qs.get('m'));
    }

    /* ───────── dimensions ───────── */
    function initDims() {
        var root = $('[data-fm-dims]'); if (!root) return;
        var groups = FM.dimensions || {}, tabs = $$('[data-fm-dim-tab]', root), body = $('[data-fm-dim-body]', root), title = $('[data-fm-dim-title]', root);
        var svg = $('[data-fm-dim-svg]', root), rect = $('[data-fm-dim-rect]', svg), lines = $('[data-fm-dim-lines]', svg), texts = $('[data-fm-dim-texts]', svg), cap = $('[data-fm-dim-caption]', root);
        var NS = 'http://www.w3.org/2000/svg';
        function s(tag, a) { var n = document.createElementNS(NS, tag); for (var k in a) n.setAttribute(k, a[k]); return n; }
        function txt(x, y, t, extra) { var n = s('text', Object.assign({ x: x, y: y, 'text-anchor': 'middle' }, extra || {})); n.textContent = t; return n; }
        function draw(row) {
            var w = row[1], d = row[2], h = row[3], k = Math.min(190 / w, 150 / h), bw = w * k, bh = h * k;
            var x1 = 195 - bw / 2 - 10, x2 = x1 + bw, y2 = 196, y1 = y2 - bh, off = Math.min(26, Math.max(10, d * k * .22));
            rect.setAttribute('x', x1); rect.setAttribute('y', y1); rect.setAttribute('width', bw); rect.setAttribute('height', bh);
            lines.textContent = ''; texts.textContent = '';
            lines.append(
                s('polygon', { points: [x1, y1, x1 + off, y1 - off, x2 + off, y1 - off, x2, y1].join(' '), fill: '#dcb994', stroke: '#8d5f3a', 'stroke-width': 1.4 }),
                s('polygon', { points: [x2, y1, x2 + off, y1 - off, x2 + off, y2 - off, x2, y2].join(' '), fill: '#b58557', stroke: '#8d5f3a', 'stroke-width': 1.4 }),
                s('path', { d: 'M' + (x1 - 22) + ' ' + y1 + 'V' + y2 + 'M' + (x1 - 28) + ' ' + y1 + 'h12M' + (x1 - 28) + ' ' + y2 + 'h12' }),
                s('path', { d: 'M' + x1 + ' ' + (y2 + 22) + 'H' + x2 + 'M' + x1 + ' ' + (y2 + 16) + 'v12M' + x2 + ' ' + (y2 + 16) + 'v12' }));
            texts.append(
                txt(x1 - 32, (y1 + y2) / 2, h + ' cm', { transform: 'rotate(-90 ' + (x1 - 32) + ' ' + (y1 + y2) / 2 + ')' }),
                txt((x1 + x2) / 2, y2 + 42, w + ' cm'),
                txt(x2 + off / 2 + 18, y1 - off / 2 - 6, 'Dalam ' + d + ' cm', { 'text-anchor': 'start' }));
            cap.textContent = row[0] + ' — ' + w + ' × ' + d + ' × ' + h + ' cm (panjang × dalam × tinggi)';
            $$('tr', body).forEach(function (tr) { tr.classList.toggle('is-active', tr.getAttribute('data-name') === row[0]); });
        }
        function show(slug) {
            var g = groups[slug]; if (!g) return;
            tabs.forEach(function (t) { var on = t.getAttribute('data-fm-dim-tab') === slug; t.classList.toggle('is-active', on); t.setAttribute('aria-selected', on); });
            title.textContent = g.name; body.textContent = '';
            g.rows.forEach(function (r) {
                var tr = el('tr', { 'data-name': r[0], tabindex: 0, onclick: function () { draw(r); } },
                    el('th', { scope: 'row', text: r[0] }), el('td', { text: r[1] + ' cm' }), el('td', { text: r[2] + ' cm' }), el('td', { text: r[3] + ' cm' }));
                tr.addEventListener('keydown', function (e) { if (e.key === 'Enter' || e.key === ' ') { e.preventDefault(); draw(r); } });
                body.appendChild(tr);
            });
            draw(g.rows[0]);
        }
        tabs.forEach(function (t) { t.addEventListener('click', function () { show(t.getAttribute('data-fm-dim-tab')); }); });
        show(tabs[0].getAttribute('data-fm-dim-tab'));
    }

    /* ───────── gallery + lightbox ───────── */
    function initGallery() {
        var root = $('[data-fm-gallery]'); if (!root) return;
        var items = []; try { items = JSON.parse($('#fm-gallery-data').textContent); } catch (e) { return; }
        var chips = $$('[data-fm-gal-room]', root), cells = $$('.fm-gal', root);
        chips.forEach(function (c) {
            c.addEventListener('click', function () {
                var room = c.getAttribute('data-fm-gal-room');
                chips.forEach(function (x) { var on = x === c; x.classList.toggle('is-active', on); x.setAttribute('aria-pressed', on); });
                cells.forEach(function (li) { li.hidden = !!room && li.getAttribute('data-room') !== room; if (!li.hidden) li.classList.add('is-visible'); });
            });
        });
        var lb = $('[data-fm-lightbox]', root), img = $('[data-fm-lb-img]', lb), cap = $('[data-fm-lb-cap]', lb), cur = 0, last = null;
        function visible() { return cells.filter(function (c) { return !c.hidden; }).map(function (c) { return +$('[data-fm-gal-open]', c).getAttribute('data-fm-gal-open'); }); }
        function show(idx) {
            var vis = visible(), pos = vis.indexOf(idx); if (pos < 0) { pos = 0; idx = vis[0]; }
            cur = idx; var it = items[idx];
            img.src = FM.img + '/' + it.image; img.alt = it.title; cap.textContent = it.title + ' · ' + it.room + ' · ' + it.style;
            $('[data-fm-lb-prev]', lb).hidden = $('[data-fm-lb-next]', lb).hidden = vis.length < 2;
        }
        function step(d) { var vis = visible(); show(vis[(vis.indexOf(cur) + d + vis.length) % vis.length]); }
        function open(i) { last = document.activeElement; lb.hidden = false; lock(); show(i); $('[data-fm-lb-close]', lb).focus(); }
        function close() { if (lb.hidden) return; lb.hidden = true; unlock(); if (last) last.focus(); }
        $$('[data-fm-gal-open]', root).forEach(function (b) { b.addEventListener('click', function () { open(+b.getAttribute('data-fm-gal-open')); }); });
        $$('[data-fm-lb-close]', lb).forEach(function (b) { b.addEventListener('click', close); });
        $('[data-fm-lb-prev]', lb).addEventListener('click', function () { step(-1); });
        $('[data-fm-lb-next]', lb).addEventListener('click', function () { step(1); });
        lb.addEventListener('keydown', function (e) { if (e.key === 'ArrowLeft') step(-1); else if (e.key === 'ArrowRight') step(1); else trap(lb, e); });
        var x0 = null;
        lb.addEventListener('touchstart', function (e) { x0 = e.touches[0].clientX; }, { passive: true });
        lb.addEventListener('touchend', function (e) { if (x0 == null) return; var dx = e.changedTouches[0].clientX - x0; x0 = null; if (Math.abs(dx) > 50) step(dx < 0 ? 1 : -1); }, { passive: true });
        registerOverlay({ isOpen: function () { return !lb.hidden; }, close: close });
    }

    /* ───────── form → WhatsApp (custom order & quotation) ───────── */
    function initForms() {
        $$('[data-fm-wa-form]').forEach(function (form) {
            var kind = form.getAttribute('data-fm-wa-form');
            var status = el('p', { class: 'fm-note', role: 'status', 'aria-live': 'polite' });
            form.appendChild(status);

            // prefill dari konfigurator / katalog
            if (kind === 'custom-order') {
                var t = qs.get('type');
                if (t) { var opt = $$('option', form.type).filter(function (o) { return o.getAttribute('data-slug') === t; })[0]; if (opt) form.type.value = opt.value; }
                ['style', 'color', 'material'].forEach(function (k) { var v = qs.get(k), fe = form.elements[k]; if (v && fe) { var o = $$('option', fe).filter(function (x) { return x.value === v || x.textContent === v; })[0]; if (o) fe.value = o.value; } });
                ['w', 'd', 'h'].forEach(function (k) { if (qs.get(k) && form.elements[k]) form.elements[k].value = qs.get(k); });
            } else {
                (qs.get('items') || '').split(',').forEach(function (s) { var c = $('input[data-slug="' + s + '"]', form); if (c) c.checked = true; });
            }

            function setErr(field, msg) {
                var g = field.closest('.fm-fg') || field.closest('fieldset'), e = g && $('[data-fm-err]', g);
                if (g) g.classList.toggle('has-error', !!msg);
                if (e) e.textContent = msg || '';
                if (field.setAttribute) { if (msg) field.setAttribute('aria-invalid', 'true'); else field.removeAttribute('aria-invalid'); if (field._fmBtn) { if (msg) field._fmBtn.setAttribute('aria-invalid', 'true'); else field._fmBtn.removeAttribute('aria-invalid'); } }
            }
            function validate() {
                var ok = true, firstBad = null;
                $$('[required]', form).forEach(function (f) {
                    var bad = !String(f.value).trim();
                    var msg = bad ? 'Wajib diisi.' : '';
                    if (!bad && f.name === 'wa' && !/^[0-9+\s\-]{8,16}$/.test(f.value.trim())) msg = 'Nomor WhatsApp tidak valid.';
                    if (!bad && f.name === 'qty' && (+f.value < 1)) msg = 'Minimal 1.';
                    setErr(f, msg); if (msg) { ok = false; firstBad = firstBad || f; }
                });
                var em = form.email; if (em) { var bad2 = em.value.trim() && !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(em.value.trim()); setErr(em, bad2 ? 'Format email tidak valid.' : ''); if (bad2) { ok = false; firstBad = firstBad || em; } }
                var need = $('[data-fm-need]', form);
                if (need) { var any = $$('input:checked', need).length > 0; setErr(need, any ? '' : 'Pilih minimal satu kebutuhan furniture.'); if (!any) { ok = false; firstBad = firstBad || $('input', need); } }
                if (firstBad) (firstBad._fmBtn || firstBad).focus();
                return ok;
            }
            function line(label, v) { v = String(v == null ? '' : v).trim(); return v ? '• ' + label + ': ' + v : ''; }
            function build() {
                var f = form, L = [];
                if (kind === 'custom-order') {
                    var size = [f.w.value, f.d.value, f.h.value].some(Boolean) ? (f.w.value || '-') + ' × ' + (f.d.value || '-') + ' × ' + (f.h.value || '-') + ' cm' : '';
                    L = ['Halo ' + FM.brand + ', saya ingin memesan furniture custom.', '',
                        line('Nama', f.nama.value), line('WhatsApp', f.wa.value), line('Email', f.email.value), line('Kota', f.kota.value), '',
                        line('Jenis furniture', f.type.value), line('Gaya', f.elements.style.value), line('Material', f.material.value), line('Finishing', f.finishing.value),
                        line('Warna', f.color.value), line('Ukuran (P × L × T)', size), line('Jumlah', f.qty.value), line('Anggaran', f.budget.value), '', line('Catatan', f.note.value)];
                } else {
                    var needs = $$('input[name="need[]"]:checked', f).map(function (c) { return c.value; }).join(', ');
                    L = ['Halo ' + FM.brand + ', saya ingin meminta penawaran (quotation).', '',
                        line('Nama', f.nama.value), line('Perusahaan/instansi', f.org.value), line('WhatsApp', f.wa.value), line('Email', f.email.value), '',
                        line('Kebutuhan', needs), line('Jumlah item', f.qty.value), line('Anggaran', f.budget.value), line('Target waktu', f.timeline.value),
                        line('Lokasi pengiriman', f.kota.value), '', line('Detail', f.note.value)];
                }
                return L.filter(function (l, i, a) { return !(l === '' && (i === 0 || a[i - 1] === '')); }).join('\n').trim();
            }
            form.addEventListener('input', function (e) { if (e.target.closest('.fm-fg.has-error')) setErr(e.target, ''); });
            form.addEventListener('submit', function (e) {
                e.preventDefault();
                if (!validate()) { status.textContent = 'Mohon lengkapi data yang ditandai.'; return; }
                status.textContent = 'Membuka WhatsApp…'; openWA(build());
            });
        });
    }

    /* ───────── lead time ───────── */
    function initLead() {
        var root = $('[data-fm-lead]'); if (!root) return;
        var form = $('[data-fm-lead-form]', root), days = $('[data-fm-lead-days]', root), date = $('[data-fm-lead-date]', root), lt = FM.leadTime || {};
        var fmt = new Intl.DateTimeFormat('id-ID', { day: 'numeric', month: 'long', year: 'numeric' });
        function pad(n) { return (n < 10 ? '0' : '') + n; }
        function parse(v) { var p = v.split('-'); return new Date(+p[0], +p[1] - 1, +p[2]); }
        function addWork(d0, n) { var d = new Date(d0), left = n; while (left > 0) { d.setDate(d.getDate() + 1); if (d.getDay() !== 0) left--; } return d; } // Senin–Sabtu
        var today = new Date(); form.start.value = today.getFullYear() + '-' + pad(today.getMonth() + 1) + '-' + pad(today.getDate());
        function calc() {
            var base = lt.days[form.type.value], cx = (lt.complexity || []).filter(function (c) { return c.key === form.cx.value; })[0];
            if (!base || !cx) return;
            var a = Math.ceil(base[0] * cx.mult), b = Math.ceil(base[1] * cx.mult);
            days.textContent = a + '–' + b + ' hari kerja';
            if (form.start.value) date.textContent = 'Perkiraan selesai: ' + fmt.format(addWork(parse(form.start.value), a)) + ' – ' + fmt.format(addWork(parse(form.start.value), b));
            else date.textContent = '';
        }
        form.addEventListener('change', calc); form.addEventListener('input', calc);
        var t = qs.get('type'); if (t && lt.days[t]) form.type.value = t;
        calc();
    }

    /* ───────── chatbot (FAQ produk & custom) ───────── */
    var chatPanel = null;
    function makeChat(root) {
        var AI = FM.ai || {}, body = $('[data-fm-chat-body]', root), quick = $('[data-fm-chat-quick]', root), form = $('[data-fm-chat-form]', root), input = $('[data-fm-chat-input]', root), started = false, busy = false;
        function scroll() { body.scrollTop = body.scrollHeight; }
        function bot(text, link) {
            var m = el('div', { class: 'fm-msg fm-msg--bot' }, el('span', { text: text }));
            if (link) { var a = el('a', { class: 'fm-msg__link', href: link[1] }, link[0], icon('arrow', 'fm-i--xs')); if (/^https?:/.test(link[1])) { a.target = '_blank'; a.rel = 'noopener'; } m.append(el('br'), a); }
            body.appendChild(m); scroll();
        }
        function me(text) { body.appendChild(el('div', { class: 'fm-msg fm-msg--me', text: text })); scroll(); }
        function find(q) {
            var n = norm(q), best = null, top = 0;
            (AI.faq || []).forEach(function (f) {
                var s = 0; f.keys.forEach(function (k) { var nk = norm(k); if (nk && n.indexOf(nk) > -1) s += nk.split(' ').length * 2 + 1; });
                if (s > top) { top = s; best = f; }
            });
            return best;
        }
        function ask(text) {
            text = String(text || '').trim(); if (!text || busy) return;
            start(); me(text); busy = true;
            var typing = el('div', { class: 'fm-msg fm-msg--bot fm-msg--typing', 'aria-label': 'Asisten sedang mengetik' }, el('i'), el('i'), el('i'));
            body.appendChild(typing); scroll();
            setTimeout(function () {
                typing.remove(); busy = false;
                var f = find(text);
                if (f) bot(f.a, f.link ? [f.link[0], FM.routes[f.link[1]]] : null);
                else bot(AI.fallback, ['Chat via WhatsApp', waUrl('Halo ' + FM.brand + ', saya ingin bertanya: ' + text)]);
            }, reduceMotion ? 0 : 650);
        }
        function start() { if (started) return; started = true; bot(AI.greeting); }
        (AI.quick || []).forEach(function (q) { quick.appendChild(el('button', { type: 'button', class: 'fm-qchip', text: q, onclick: function () { ask(q); } })); });
        form.addEventListener('submit', function (e) { e.preventDefault(); var v = input.value; input.value = ''; ask(v); });
        return { ask: ask, start: start, focus: function () { input.focus(); } };
    }
    function initChat() {
        var page = $('[data-fm-chat="page"]'), panel = $('[data-fm-chat="panel"]');
        var pageChat = page ? makeChat(page) : null;
        if (pageChat) pageChat.start();
        $$('[data-fm-ask-page]').forEach(function (b) { b.addEventListener('click', function () { pageChat && pageChat.ask(b.getAttribute('data-fm-ask-page')); }); });
        if (!panel) return;
        var chat = makeChat(panel), toggle = $('[data-fm-chat-toggle]'), bubble = $('[data-fm-aifab-bubble]'), opened = false, bubbleTimer = null;
        function setOpen(on) {
            panel.hidden = !on; toggle.setAttribute('aria-expanded', on); document.body.classList.toggle('fm-chat-open', on);
            if (on) { chat.start(); bubble.classList.remove('is-on'); opened = true; setTimeout(chat.focus, 60); } else { toggle.focus(); }
        }
        toggle.addEventListener('click', function () { setOpen(panel.hidden); });
        $$('[data-fm-chat-close]', panel).forEach(function (b) { b.addEventListener('click', function () { setOpen(false); }); });
        registerOverlay({ isOpen: function () { return !panel.hidden; }, close: function () { setOpen(false); } });
        function openAndAsk(text) { if (panel.hidden) setOpen(true); if (text) setTimeout(function () { chat.ask(text); }, 220); }
        $$('[data-fm-ask]').forEach(function (b) { b.addEventListener('click', function () { openAndAsk(b.getAttribute('data-fm-ask')); }); });
        var pv = $('[data-fm-ai-preview]');
        if (pv) pv.addEventListener('submit', function (e) { e.preventDefault(); var i = $('input', pv), v = i.value; i.value = ''; openAndAsk(v); });
        // gelembung "Tanya Apa Saja Ya!" muncul berkala sampai chat pernah dibuka
        function pop() { if (opened || !panel.hidden) return; bubble.classList.add('is-on'); setTimeout(function () { bubble.classList.remove('is-on'); }, 4800); }
        setTimeout(pop, 3200); bubbleTimer = setInterval(function () { if (opened) clearInterval(bubbleTimer); else pop(); }, 24000);
    }

    /* ───────── newsletter footer → WhatsApp ───────── */
    function initNews() {
        var f = $('[data-fm-news]'); if (!f) return;
        var msg = $('[data-fm-news-msg]');
        f.addEventListener('submit', function (e) {
            e.preventDefault();
            var v = f.email.value.trim();
            if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(v)) { msg.textContent = 'Masukkan email yang valid.'; f.email.focus(); return; }
            msg.textContent = 'Membuka WhatsApp…'; openWA('Halo ' + FM.brand + ', saya ingin mendapatkan update terbaru. Email saya: ' + v); f.reset();
        });
    }

    /* ───────── dropdown form (select kustom di atas <select> asli) ───────── */
    var selUid = 0;
    function initSelects() {
        var all = [];
        $$('.fm-fg select').forEach(function (native) {
            if (native.multiple || native.dataset.fmNative !== undefined) return;
            var uid = 'fm-sel-' + (++selUid), wrap = el('div', { class: 'fm-select' }), label = native.id && $('label[for="' + native.id + '"]');
            native.parentNode.insertBefore(wrap, native); wrap.appendChild(native);
            native.classList.add('fm-select__native'); native.tabIndex = -1; native.setAttribute('aria-hidden', 'true');

            var val = el('span', { class: 'fm-select__val' });
            var btn = el('button', { type: 'button', class: 'fm-select__btn', role: 'combobox', 'aria-haspopup': 'listbox', 'aria-expanded': 'false', 'aria-controls': uid + '-list', id: uid + '-btn' }, val, icon('chevron', 'fm-select__caret'));
            if (label) { if (!label.id) label.id = uid + '-label'; btn.setAttribute('aria-labelledby', label.id + ' ' + uid + '-btn'); }
            if (native.required) btn.setAttribute('aria-required', 'true');
            var list = el('ul', { class: 'fm-select__list', role: 'listbox', id: uid + '-list', 'aria-labelledby': label ? label.id : null, hidden: true });
            var opts = $$('option', native).map(function (o, i) {
                var li = el('li', { class: 'fm-select__opt' + (o.value === '' ? ' is-placeholder' : ''), role: 'option', id: uid + '-o' + i, 'data-i': i }, el('span', { text: o.textContent }), icon('check'));
                list.appendChild(li); return li;
            });
            wrap.append(btn, list);
            native._fmBtn = btn;

            var act = -1, typed = '', typedT = null;
            function sync() {
                var i = native.selectedIndex < 0 ? 0 : native.selectedIndex, o = native.options[i];
                val.textContent = o ? o.textContent : ''; val.classList.toggle('is-placeholder', !o || o.value === '');
                opts.forEach(function (li, k) { li.setAttribute('aria-selected', k === i ? 'true' : 'false'); });
                if (native.getAttribute('aria-invalid')) btn.setAttribute('aria-invalid', 'true'); else btn.removeAttribute('aria-invalid');
            }
            function setActive(i) {
                act = Math.max(0, Math.min(opts.length - 1, i));
                opts.forEach(function (li, k) { li.classList.toggle('is-active', k === act); });
                btn.setAttribute('aria-activedescendant', opts[act].id); opts[act].scrollIntoView({ block: 'nearest' });
            }
            function open() {
                if (!list.hidden) return;
                $$('.fm-select.is-open').forEach(function (w) { w._fmClose && w._fmClose(); });
                list.hidden = false; wrap.classList.add('is-open'); btn.setAttribute('aria-expanded', 'true');
                var r = btn.getBoundingClientRect(), need = Math.min(264, list.scrollHeight) + 16;
                wrap.classList.toggle('is-up', window.innerHeight - r.bottom < need && r.top > need);
                setActive(native.selectedIndex < 0 ? 0 : native.selectedIndex);
            }
            function close() { if (list.hidden) return; list.hidden = true; wrap.classList.remove('is-open', 'is-up'); btn.setAttribute('aria-expanded', 'false'); btn.removeAttribute('aria-activedescendant'); }
            function choose(i) {
                var changed = native.selectedIndex !== i; native.selectedIndex = i; sync(); close(); btn.focus();
                if (changed) { native.dispatchEvent(new Event('input', { bubbles: true })); native.dispatchEvent(new Event('change', { bubbles: true })); }
            }
            wrap._fmClose = close; native._fmSync = sync;

            btn.addEventListener('click', function () { list.hidden ? open() : close(); });
            opts.forEach(function (li, k) {
                li.addEventListener('mousedown', function (e) { e.preventDefault(); });
                li.addEventListener('click', function () { choose(k); });
                li.addEventListener('mousemove', function () { if (act !== k) setActive(k); });
            });
            btn.addEventListener('keydown', function (e) {
                var k = e.key;
                if (k === 'ArrowDown' || k === 'ArrowUp') { e.preventDefault(); if (list.hidden) open(); else setActive(act + (k === 'ArrowDown' ? 1 : -1)); }
                else if (k === 'Home' && !list.hidden) { e.preventDefault(); setActive(0); }
                else if (k === 'End' && !list.hidden) { e.preventDefault(); setActive(opts.length - 1); }
                else if (k === 'Enter' || k === ' ') { e.preventDefault(); if (list.hidden) open(); else choose(act); }
                else if (k === 'Tab') { close(); }
                else if (k.length === 1 && /\S/.test(k)) { // typeahead
                    clearTimeout(typedT); typed += k.toLowerCase(); typedT = setTimeout(function () { typed = ''; }, 600);
                    var hit = opts.map(function (li, i) { return i; }).filter(function (i) { return native.options[i].textContent.toLowerCase().indexOf(typed) === 0; })[0];
                    if (hit != null) { if (list.hidden) open(); setActive(hit); }
                }
            });
            btn.addEventListener('blur', function () { setTimeout(function () { if (!wrap.contains(document.activeElement)) close(); }, 0); });
            if (label) label.addEventListener('click', function (e) { e.preventDefault(); btn.focus(); });
            native.addEventListener('change', sync);
            sync(); all.push(wrap);
        });
        document.addEventListener('click', function (e) { all.forEach(function (w) { if (!w.contains(e.target)) w._fmClose(); }); });
        registerOverlay({ isOpen: function () { return all.some(function (w) { return w.classList.contains('is-open'); }); }, close: function () { all.forEach(function (w) { w._fmClose(); }); } });
    }

    /* ───────── sinkron tampilan chip radio/checkbox (fallback tanpa :has) ───────── */
    function initChips() {
        function sync() { $$('.fm-chip--radio, .fm-chip--check').forEach(function (l) { var i = $('input', l); l.classList.toggle('is-active', !!(i && i.checked)); }); }
        document.addEventListener('change', sync); sync();
    }

    /* ───────── boot ───────── */
    function boot() {
        initHeader(); initSearch(); initFav(); initHero(); initVideo(); initReveal();
        initCatalog(); initConfig(); initMaterials(); initDims(); initGallery(); initForms(); initLead(); initChat(); initNews(); initChips(); initSelects();
    }
    if (document.readyState === 'loading') document.addEventListener('DOMContentLoaded', boot); else boot();
})();
