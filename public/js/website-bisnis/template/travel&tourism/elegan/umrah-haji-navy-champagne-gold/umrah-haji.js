/*!
 * Al Hijrah Travel — Umrah & Haji (Elegant · Navy Champagne Gold)
 * Vanilla JS, tanpa dependensi. Semua modul aman dijalankan walau elemennya tidak ada.
 */
(function () {
    'use strict';

    var D = document;
    var W = window;
    var UH = W.UH || {};
    var root = D.documentElement;
    var reduceMotion = !!(W.matchMedia && W.matchMedia('(prefers-reduced-motion: reduce)').matches);

    function $(sel, ctx) { return (ctx || D).querySelector(sel); }
    function $$(sel, ctx) { return Array.prototype.slice.call((ctx || D).querySelectorAll(sel)); }
    function on(el, ev, fn, opt) { if (el) { el.addEventListener(ev, fn, opt || false); } }
    function norm(t) {
        t = String(t || '').toLowerCase();
        if (t.normalize) { t = t.normalize('NFD').replace(/[\u0300-\u036f]/g, ''); }
        return t.replace(/[^a-z0-9\s]/g, ' ').replace(/\s+/g, ' ').trim();
    }
    function lock(state) { D.body.classList.toggle('uh-lock', !!state); }

    var toastTimer = null;
    function toast(msg) {
        var t = $('#uh-toast');
        if (!t) { return; }
        t.textContent = msg;
        t.hidden = false;
        t.style.animation = 'none';
        void t.offsetWidth;
        t.style.animation = '';
        clearTimeout(toastTimer);
        toastTimer = setTimeout(function () { t.hidden = true; }, 3500);
    }

    root.classList.add('uh-js');

    /* ------------------------------------------------------------------ Header */
    (function header() {
        var h = $('#uh-header');
        if (!h) { return; }
        var ticking = false;
        var bar = $('.uh-progress');
        function update() {
            var y = W.pageYOffset || root.scrollTop;
            h.classList.toggle('is-stuck', y > 8);
            if (bar) {
                var max = Math.max(1, root.scrollHeight - W.innerHeight);
                bar.style.setProperty('--sp', Math.min(1, y / max).toFixed(4));
            }
            ticking = false;
        }
        on(W, 'scroll', function () {
            if (!ticking) { ticking = true; W.requestAnimationFrame(update); }
        }, { passive: true });
        update();
    })();

    /* ------------------------------------------------------------------ Mobile menu */
    var closeMenu = function () {};
    (function menu() {
        var header = $('#uh-header');
        var toggle = $('[data-menu-toggle]');
        var scrim = $('[data-menu-scrim]');
        var nav = $('#uh-menu');
        if (!header || !toggle || !nav) { return; }

        function set(open) {
            header.classList.toggle('is-open', open);
            toggle.setAttribute('aria-expanded', open ? 'true' : 'false');
            toggle.setAttribute('aria-label', open ? 'Tutup menu' : 'Buka menu');
            if (scrim) { scrim.hidden = !open; }
            lock(open);
        }
        closeMenu = function () { set(false); };
        on(toggle, 'click', function () { set(!header.classList.contains('is-open')); });
        on(scrim, 'click', closeMenu);
        $$('a', nav).forEach(function (a) { on(a, 'click', closeMenu); });
        on(W, 'resize', function () { if (W.innerWidth > 1199) { closeMenu(); } });
    })();

    /* ------------------------------------------------------------------ Dropdown (custom select) */
    var selects = $$('[data-select]');
    function setSelect(sel, open) {
        var btn = $('.uh-select__btn', sel);
        sel.classList.toggle('is-open', open);
        if (btn) { btn.setAttribute('aria-expanded', open ? 'true' : 'false'); }
        $$('.is-focus', sel).forEach(function (x) { x.classList.remove('is-focus'); });
        if (open) {
            var cur = $('[aria-selected="true"]', sel);
            if (cur) { cur.classList.add('is-focus'); }
        }
    }
    function closeSelects(except) {
        selects.forEach(function (sel) { if (sel !== except && sel.classList.contains('is-open')) { setSelect(sel, false); } });
    }
    selects.forEach(function (sel) {
        var btn = $('.uh-select__btn', sel);
        var menu = $('.uh-select__menu', sel);
        var opts = $$('[role="option"]', sel);
        var label = $('.uh-select__label', sel);
        var input = $('input[type="hidden"]', sel);
        if (!btn || !menu) { return; }

        function choose(o) {
            var lang = o.getAttribute('data-lang');
            if (lang && lang !== 'id') { toast('Versi bahasa Inggris segera hadir.'); setSelect(sel, false); return; }
            opts.forEach(function (x) { x.setAttribute('aria-selected', x === o ? 'true' : 'false'); });
            if (label) {
                label.textContent = o.getAttribute('data-label') || o.textContent.replace(/\s+/g, ' ').trim();
                label.classList.toggle('is-placeholder', o.hasAttribute('data-placeholder'));
            }
            if (input) {
                input.value = o.getAttribute('data-value') || '';
                input.dispatchEvent(new Event('change', { bubbles: true }));
            }
            setSelect(sel, false);
            btn.focus();
        }
        on(btn, 'click', function () {
            var open = !sel.classList.contains('is-open');
            closeSelects(sel);
            setSelect(sel, open);
        });
        opts.forEach(function (o) {
            on(o, 'click', function () { choose(o); });
            on(o, 'mousemove', function () {
                $$('.is-focus', sel).forEach(function (x) { x.classList.remove('is-focus'); });
                o.classList.add('is-focus');
            });
        });
        on(sel, 'keydown', function (e) {
            var open = sel.classList.contains('is-open');
            var cur = $('.is-focus', sel);
            var idx = opts.indexOf(cur);
            if (e.key === 'Escape' && open) { e.stopPropagation(); setSelect(sel, false); btn.focus(); return; }
            if (e.key === 'Tab') { setSelect(sel, false); return; }
            if (e.key === 'ArrowDown' || e.key === 'ArrowUp') {
                e.preventDefault();
                if (!open) { closeSelects(sel); setSelect(sel, true); return; }
                var next = e.key === 'ArrowDown' ? Math.min(opts.length - 1, idx + 1) : Math.max(0, idx - 1);
                if (cur) { cur.classList.remove('is-focus'); }
                opts[next].classList.add('is-focus');
                if (opts[next].scrollIntoView) { opts[next].scrollIntoView({ block: 'nearest' }); }
                return;
            }
            if ((e.key === 'Enter' || e.key === ' ') && open && cur) { e.preventDefault(); choose(cur); }
        });
    });
    on(D, 'click', function (e) {
        selects.forEach(function (sel) { if (!sel.contains(e.target)) { setSelect(sel, false); } });
    });

    /* ------------------------------------------------------------------ Search */
    var closeSearch = function () {};
    var chatAsk = function () {};
    (function search() {
        var box = $('#uh-search');
        var input = $('#uh-search-input');
        var body = $('#uh-search-body');
        if (!box || !input || !body) { return; }
        var S = UH.search || { pages: [], packages: [], faq: [] };
        var SVGNS = 'http://www.w3.org/2000/svg';
        var activeIdx = 0;

        function icon(name, cls) {
            var svg = D.createElementNS(SVGNS, 'svg');
            svg.setAttribute('class', 'uh-ico' + (cls ? ' ' + cls : ''));
            svg.setAttribute('aria-hidden', 'true');
            var use = D.createElementNS(SVGNS, 'use');
            use.setAttribute('href', '#i-' + name);
            use.setAttributeNS('http://www.w3.org/1999/xlink', 'xlink:href', '#i-' + name);
            svg.appendChild(use);
            return svg;
        }
        function highlight(text, tokens) {
            var frag = D.createDocumentFragment();
            var low = text.toLowerCase();
            var ranges = [];
            tokens.forEach(function (t) {
                var i = low.indexOf(t);
                if (t && i > -1) { ranges.push([i, i + t.length]); }
            });
            if (!ranges.length) { frag.appendChild(D.createTextNode(text)); return frag; }
            ranges.sort(function (a, b) { return a[0] - b[0]; });
            var pos = 0;
            ranges.forEach(function (r) {
                if (r[0] < pos) { return; }
                if (r[0] > pos) { frag.appendChild(D.createTextNode(text.slice(pos, r[0]))); }
                var m = D.createElement('mark');
                m.textContent = text.slice(r[0], r[1]);
                frag.appendChild(m);
                pos = r[1];
            });
            if (pos < text.length) { frag.appendChild(D.createTextNode(text.slice(pos))); }
            return frag;
        }
        function row(it, tokens, kind) {
            var el = D.createElement(kind === 'faq' ? 'button' : 'a');
            el.className = 'uh-sr';
            if (kind === 'faq') { el.type = 'button'; el.setAttribute('data-ask', it.t); } else { el.href = it.u; }
            var ic = D.createElement('span');
            ic.className = 'uh-sr__ico';
            ic.appendChild(icon(kind === 'faq' ? 'chat' : it.i));
            var tx = D.createElement('span');
            tx.className = 'uh-sr__t';
            var b = D.createElement('b');
            b.appendChild(highlight(it.t, tokens));
            tx.appendChild(b);
            if (it.d) {
                var sm = D.createElement('small');
                sm.textContent = it.d;
                tx.appendChild(sm);
            } else if (kind === 'faq') {
                var sm2 = D.createElement('small');
                sm2.textContent = 'Tanyakan ke AI Chat';
                tx.appendChild(sm2);
            }
            el.appendChild(ic);
            el.appendChild(tx);
            el.appendChild(icon(kind === 'faq' ? 'send' : 'chev'));
            on(el, 'mousemove', function () { setActive(items().indexOf(el)); });
            return el;
        }
        function group(title, list, tokens, kind) {
            if (!list.length) { return null; }
            var g = D.createElement('section');
            g.className = 'uh-sg';
            var h = D.createElement('h3');
            h.textContent = title;
            g.appendChild(h);
            list.forEach(function (it) { g.appendChild(row(it, tokens, kind)); });
            return g;
        }
        function items() { return $$('.uh-sr', body); }
        function setActive(i) {
            var list = items();
            if (!list.length) { return; }
            activeIdx = Math.max(0, Math.min(list.length - 1, i));
            list.forEach(function (x, n) { x.classList.toggle('is-active', n === activeIdx); });
            if (list[activeIdx].scrollIntoView) { list[activeIdx].scrollIntoView({ block: 'nearest' }); }
        }
        function match(list, tokens) {
            return list.filter(function (it) {
                var hay = norm(it.t + ' ' + (it.d || '') + ' ' + (it.k || ''));
                return tokens.every(function (t) { return hay.indexOf(t) > -1; });
            }).sort(function (a, b) {
                var q = tokens.join(' ');
                return (norm(a.t).indexOf(q) > -1 ? 0 : 1) - (norm(b.t).indexOf(q) > -1 ? 0 : 1);
            });
        }
        function render(q) {
            var raw = (q || '').trim();
            var tokens = norm(raw).split(' ').filter(Boolean);
            body.innerHTML = '';
            if (!tokens.length) {
                var quicks = D.createElement('div');
                quicks.className = 'uh-quicks';
                S.pages.slice(1, 6).forEach(function (p) {
                    var a = D.createElement('a');
                    a.href = p.u;
                    a.textContent = p.t.replace(/ — .*$/, '');
                    quicks.appendChild(a);
                });
                body.appendChild(quicks);
                var g0 = group('Halaman', S.pages, [], 'page');
                if (g0) { body.appendChild(g0); }
                setActive(0);
                return;
            }
            var lowTokens = raw.toLowerCase().split(/\s+/).filter(Boolean);
            var pages = match(S.pages, tokens).slice(0, 6);
            var pk = match(S.packages, tokens).slice(0, 6);
            var fq = match(S.faq, tokens).slice(0, 4);
            [group('Halaman', pages, lowTokens, 'page'), group('Paket', pk, lowTokens, 'page'), group('Tanya AI', fq, lowTokens, 'faq')].forEach(function (g) {
                if (g) { body.appendChild(g); }
            });
            if (!pages.length && !pk.length && !fq.length) {
                var none = D.createElement('div');
                none.className = 'uh-search__none';
                none.innerHTML = '<b>Tidak ditemukan</b>Coba kata kunci lain, misalnya &ldquo;harga&rdquo;, &ldquo;paspor&rdquo;, atau &ldquo;Turki&rdquo;.';
                var ask = D.createElement('button');
                ask.type = 'button';
                ask.className = 'uh-sr';
                ask.setAttribute('data-ask', raw);
                var ic = D.createElement('span');
                ic.className = 'uh-sr__ico';
                ic.appendChild(icon('chat'));
                var tx = D.createElement('span');
                tx.className = 'uh-sr__t';
                tx.innerHTML = '<b></b><small>Biarkan asisten kami membantu</small>';
                tx.firstChild.textContent = 'Tanya AI Chat: "' + raw + '"';
                ask.appendChild(ic); ask.appendChild(tx); ask.appendChild(icon('send'));
                body.appendChild(none);
                body.appendChild(ask);
            }
            setActive(0);
        }
        function open() {
            closeMenu();
            closeSelects();
            box.hidden = false;
            W.requestAnimationFrame(function () { box.classList.add('is-open'); });
            lock(true);
            input.value = '';
            render('');
            setTimeout(function () { input.focus(); }, 60);
        }
        closeSearch = function () {
            if (box.hidden) { return; }
            box.classList.remove('is-open');
            setTimeout(function () { box.hidden = true; }, 200);
            lock(false);
        };
        $$('[data-search-open]').forEach(function (b) { on(b, 'click', open); });
        $$('[data-search-close]').forEach(function (b) { on(b, 'click', closeSearch); });
        on(box, 'click', function (e) {
            if (e.target === box) { closeSearch(); return; }
            var ask = e.target.closest ? e.target.closest('[data-ask]') : null;
            if (ask) { var q = ask.getAttribute('data-ask'); closeSearch(); chatAsk(q); }
        });
        on(input, 'input', function () { render(input.value); });
        on(input, 'keydown', function (e) {
            if (e.key === 'ArrowDown') { e.preventDefault(); setActive(activeIdx + 1); }
            else if (e.key === 'ArrowUp') { e.preventDefault(); setActive(activeIdx - 1); }
            else if (e.key === 'Enter') {
                e.preventDefault();
                var cur = items()[activeIdx];
                if (cur) { cur.click(); }
            }
        });
        on(D, 'keydown', function (e) {
            var tag = (e.target && e.target.tagName) || '';
            if ((e.key === '/' || ((e.ctrlKey || e.metaKey) && e.key.toLowerCase() === 'k')) && !/INPUT|TEXTAREA|SELECT/.test(tag) && box.hidden) {
                e.preventDefault();
                open();
            }
        });
    })();

    /* ------------------------------------------------------------------ Reveal on scroll */
    (function reveal() {
        var els = $$('[data-reveal]');
        if (!els.length) { return; }
        if (!('IntersectionObserver' in W) || reduceMotion) { return; }
        els.forEach(function (el) { el.classList.add('uh-reveal'); });
        var io = new IntersectionObserver(function (entries) {
            entries.forEach(function (e) {
                if (e.isIntersecting) {
                    e.target.classList.add('is-in');
                    io.unobserve(e.target);
                }
            });
        }, { threshold: 0.12, rootMargin: '0px 0px -40px 0px' });
        els.forEach(function (el) { io.observe(el); });
    })();

    /* ------------------------------------------------------------------ Tabs (preview paket) */
    (function tabs() {
        $$('[data-tabs]').forEach(function (wrap) {
            var btns = $$('[data-tab]', wrap);
            var items = $$('[data-types]', wrap);
            function show(type) {
                btns.forEach(function (b) {
                    var a = b.getAttribute('data-tab') === type;
                    b.classList.toggle('is-active', a);
                    b.setAttribute('aria-selected', a ? 'true' : 'false');
                });
                items.forEach(function (it) {
                    var ok = (' ' + it.getAttribute('data-types') + ' ').indexOf(' ' + type + ' ') > -1;
                    it.hidden = !ok;
                    if (ok) { it.classList.remove('uh-pop'); void it.offsetWidth; it.classList.add('uh-pop'); }
                });
            }
            btns.forEach(function (b) { on(b, 'click', function () { show(b.getAttribute('data-tab')); }); });
            if (btns.length) { show(btns[0].getAttribute('data-tab')); }
        });
    })();

    /* ------------------------------------------------------------------ Filter, urutkan (halaman paket & jadwal) */
    (function filters() {
        $$('[data-filter-scope]').forEach(function (scope) {
            var groups = $$('[data-filter-key]', scope);
            var items = $$('[data-filter-item]', scope);
            var empty = $('[data-filter-empty]', scope);
            var counter = $('[data-filter-count]', scope);
            var state = {};

            function has(it, key, val) {
                return (' ' + (it.getAttribute('data-' + key) || '') + ' ').indexOf(' ' + val + ' ') > -1;
            }
            groups.forEach(function (g) {
                var key = g.getAttribute('data-filter-key');
                state[key] = 'all';
                $$('[data-filter]', g).forEach(function (b) {
                    if (g.classList.contains('uh-chips')) {
                        var v = b.getAttribute('data-filter');
                        var n = v === 'all' ? items.length : items.filter(function (it) { return has(it, key, v); }).length;
                        var em = D.createElement('em');
                        em.textContent = n;
                        b.appendChild(em);
                    }
                    on(b, 'click', function () {
                        state[key] = b.getAttribute('data-filter');
                        $$('[data-filter]', g).forEach(function (x) { x.classList.toggle('is-active', x === b); });
                        apply();
                    });
                });
            });
            function apply() {
                var visible = 0;
                items.forEach(function (it) {
                    var ok = Object.keys(state).every(function (k) { return state[k] === 'all' || has(it, k, state[k]); });
                    var was = it.hidden;
                    it.hidden = !ok;
                    if (ok) {
                        visible++;
                        if (was) { it.classList.remove('uh-pop'); void it.offsetWidth; it.classList.add('uh-pop'); }
                    }
                });
                if (empty) { empty.hidden = visible > 0; }
                if (counter) { counter.textContent = counter.textContent.replace(/\d+/, visible); }
            }
            $$('[data-filter-reset]', scope).forEach(function (r) {
                on(r, 'click', function () {
                    groups.forEach(function (g) {
                        var all = $('[data-filter="all"]', g);
                        if (all) { all.click(); }
                        var sel = g.classList.contains('uh-select') ? g : null;
                        if (sel) { setSelect(sel, false); }
                    });
                });
            });
        });

        $$('[data-sort-key]').forEach(function (g) {
            var scope = g.closest('[data-filter-scope]') || D;
            var list = $('[data-sort-list]', scope);
            if (!list) { return; }
            $$('[data-sort]', g).forEach(function (o) {
                on(o, 'click', function () {
                    var mode = o.getAttribute('data-sort');
                    var cards = $$('[data-sort-item]', list);
                    cards.sort(function (a, b) {
                        if (mode === 'price-asc') { return a.getAttribute('data-price') - b.getAttribute('data-price'); }
                        if (mode === 'price-desc') { return b.getAttribute('data-price') - a.getAttribute('data-price'); }
                        return a.getAttribute('data-order') - b.getAttribute('data-order');
                    });
                    cards.forEach(function (c) { list.appendChild(c); c.classList.remove('uh-pop'); void c.offsetWidth; c.classList.add('uh-pop'); });
                });
            });
        });
    })();

    /* ------------------------------------------------------------------ Slider testimoni (beranda) */
    (function slider() {
        $$('[data-slider]').forEach(function (wrap) {
            var slides = $$('[data-slide]', wrap);
            var dots = $$('[data-dot]', wrap);
            if (slides.length < 2) { return; }
            var idx = 0;
            var timer = null;
            function go(i) {
                idx = (i + slides.length) % slides.length;
                slides.forEach(function (s, n) { s.classList.toggle('is-active', n === idx); });
                dots.forEach(function (d, n) { d.classList.toggle('is-active', n === idx); });
            }
            function start() {
                if (reduceMotion) { return; }
                stop();
                timer = setInterval(function () { go(idx + 1); }, 6500);
            }
            function stop() { if (timer) { clearInterval(timer); timer = null; } }
            dots.forEach(function (d, n) { on(d, 'click', function () { go(n); start(); }); });
            on(wrap, 'mouseenter', stop);
            on(wrap, 'mouseleave', start);
            start();
        });
    })();

    /* ------------------------------------------------------------------ Dialog (syarat & privasi) */
    (function dialogs() {
        $$('[data-dialog]').forEach(function (b) {
            on(b, 'click', function () {
                var dlg = D.getElementById(b.getAttribute('data-dialog'));
                if (!dlg) { return; }
                if (typeof dlg.showModal === 'function') { dlg.showModal(); } else { dlg.setAttribute('open', ''); }
            });
        });
        $$('dialog.uh-dialog').forEach(function (dlg) {
            on(dlg, 'click', function (e) { if (e.target === dlg) { dlg.close ? dlg.close() : dlg.removeAttribute('open'); } });
            $$('[data-dialog-close]', dlg).forEach(function (c) {
                on(c, 'click', function () { dlg.close ? dlg.close() : dlg.removeAttribute('open'); });
            });
        });
    })();

    /* ------------------------------------------------------------------ Gold sparks (hero) */
    (function sparks() {
        var wrap = $('[data-sparks]');
        if (!wrap || reduceMotion) { return; }
        var n = W.innerWidth < 700 ? 10 : 22;
        for (var i = 0; i < n; i++) {
            var s = D.createElement('i');
            var size = 2 + Math.random() * 4;
            s.style.left = (Math.random() * 100).toFixed(1) + '%';
            s.style.width = s.style.height = size.toFixed(1) + 'px';
            s.style.animationDuration = (9 + Math.random() * 12).toFixed(1) + 's';
            s.style.animationDelay = (-Math.random() * 14).toFixed(1) + 's';
            wrap.appendChild(s);
        }
    })();

    /* ------------------------------------------------------------------ Hero parallax */
    (function parallax() {
        var img = $('.uh-hero__bg img');
        if (!img || reduceMotion) { return; }
        var ticking = false;
        function update() {
            var y = W.pageYOffset || root.scrollTop;
            if (y < 900) { img.style.setProperty('--py', (y * 0.1).toFixed(1) + 'px'); }
            ticking = false;
        }
        on(W, 'scroll', function () {
            if (!ticking) { ticking = true; W.requestAnimationFrame(update); }
        }, { passive: true });
    })();

    /* ------------------------------------------------------------------ Count-up angka harga */
    (function countUp() {
        var els = $$('[data-count]');
        if (!els.length) { return; }
        function fmt(n) { return String(Math.round(n)).replace(/\B(?=(\d{3})+(?!\d))/g, '.'); }
        function run(el) {
            var target = parseInt(el.getAttribute('data-count'), 10);
            var pre = el.getAttribute('data-prefix') || '';
            if (!target) { return; }
            var start = null;
            function step(ts) {
                if (start === null) { start = ts; }
                var p = Math.min(1, (ts - start) / 1400);
                var eased = 1 - Math.pow(1 - p, 3);
                el.textContent = pre + fmt(target * eased);
                if (p < 1) { W.requestAnimationFrame(step); } else { el.textContent = pre + fmt(target); }
            }
            W.requestAnimationFrame(step);
        }
        if (reduceMotion || !('IntersectionObserver' in W)) { return; }
        var io = new IntersectionObserver(function (entries) {
            entries.forEach(function (e) { if (e.isIntersecting) { run(e.target); io.unobserve(e.target); } });
        }, { threshold: 0.4 });
        els.forEach(function (el) { io.observe(el); });
    })();

    /* ------------------------------------------------------------------ Sorotan kursor pada kartu */
    (function spotlight() {
        var sel = '.uh-card, .uh-pkg, .uh-pricecard, .uh-member, .uh-req, .uh-tcard, .uh-hotel, .uh-flight, .uh-timeline__card, .uh-steps li, .uh-faq';
        $$(sel).forEach(function (el) { el.classList.add('uh-spot'); });
        if (!(W.matchMedia && W.matchMedia('(hover: hover)').matches) || reduceMotion) { return; }
        on(D, 'pointermove', function (e) {
            var el = e.target.closest ? e.target.closest('.uh-spot') : null;
            if (!el) { return; }
            var r = el.getBoundingClientRect();
            el.style.setProperty('--mx', (e.clientX - r.left).toFixed(0) + 'px');
            el.style.setProperty('--my', (e.clientY - r.top).toFixed(0) + 'px');
        }, { passive: true });
    })();

    /* ------------------------------------------------------------------ Garis timeline tergambar saat scroll */
    (function timeline() {
        var tl = $('.uh-timeline');
        if (!tl || reduceMotion) { return; }
        var ticking = false;
        function update() {
            var r = tl.getBoundingClientRect();
            var p = (W.innerHeight * 0.75 - r.top) / Math.max(1, r.height);
            tl.style.setProperty('--p', Math.max(0.03, Math.min(1, p)).toFixed(3));
            ticking = false;
        }
        on(W, 'scroll', function () { if (!ticking) { ticking = true; W.requestAnimationFrame(update); } }, { passive: true });
        on(W, 'resize', update);
        update();
    })();

    /* ------------------------------------------------------------------ Formulir pendaftaran -> WhatsApp */
    (function waForm() {
        $$('[data-wa-form]').forEach(function (form) {
            var txt = $('[data-wa-text]', form);
            function field(k) { return $('[data-field="' + k + '"]', form); }
            function val(k) { var f = field(k); return f ? String(f.value || '').trim() : ''; }
            function wrap(k) { var f = field(k); return f ? f.closest('.uh-field') : null; }
            function mark(k, bad) {
                var w = wrap(k);
                if (!w) { return; }
                w.classList.toggle('has-error', bad);
                var err = $('.uh-field__err', w);
                if (err) { err.hidden = !bad; }
                var f = field(k);
                if (f && f.type !== 'hidden') { f.setAttribute('aria-invalid', bad ? 'true' : 'false'); }
            }
            function validate() {
                var phone = val('hp').replace(/\D/g, '');
                var rules = [
                    ['nama', val('nama').length >= 3],
                    ['hp', phone.length >= 9 && phone.length <= 15 && /^[0-9+\s().-]+$/.test(val('hp'))],
                    ['paket', val('paket') !== '']
                ];
                var first = null;
                rules.forEach(function (r) {
                    mark(r[0], !r[1]);
                    if (!r[1] && !first) { first = r[0]; }
                });
                return first;
            }
            function message() {
                var lines = ["Assalamu'alaikum Al Hijrah Travel, saya ingin mendaftar.", '',
                    'Nama: ' + val('nama'),
                    'No. WhatsApp: ' + val('hp'),
                    'Paket: ' + val('paket')];
                if (val('jadwal')) { lines.push('Jadwal: ' + val('jadwal')); }
                lines.push('Jumlah jamaah: ' + (val('jumlah') || '1'));
                if (val('catatan')) { lines.push('Catatan: ' + val('catatan')); }
                lines.push('', 'Mohon informasi lebih lanjut. Terima kasih.');
                return lines.join('\n');
            }
            on(form, 'input', function (e) {
                var k = e.target.getAttribute && e.target.getAttribute('data-field');
                if (k && wrap(k) && wrap(k).classList.contains('has-error')) { validate(); }
            });
            on(form, 'change', function (e) {
                var k = e.target.getAttribute && e.target.getAttribute('data-field');
                if (k && wrap(k) && wrap(k).classList.contains('has-error')) { validate(); }
            });
            on(form, 'submit', function (e) {
                var bad = validate();
                if (bad) {
                    e.preventDefault();
                    var f = field(bad);
                    var focusEl = f && f.type === 'hidden' ? $('.uh-select__btn', f.parentNode) : f;
                    if (focusEl) { focusEl.focus(); }
                    toast('Mohon lengkapi data yang ditandai.');
                    return;
                }
                var text = message();
                if (txt) { txt.value = text; }
                var base = (form.getAttribute('action') || '').split('?')[0];
                if (!base) { return; }
                e.preventDefault();
                var url = base + '?text=' + encodeURIComponent(text);
                var w = W.open(url, '_blank', 'noopener');
                if (!w) { W.location.href = url; }
                toast('Membuka WhatsApp… silakan kirim pesannya di sana.');
            });
        });
    })();

    /* ------------------------------------------------------------------ AI Chat */
    var chats = [];

    function findAnswer(q) {
        var t = ' ' + norm(q) + ' ';
        var best = null;
        var score = 0;
        (UH.faq || []).forEach(function (f) {
            var s = 0;
            (f.k || []).forEach(function (k) {
                var n = norm(k);
                if (!n) { return; }
                var hit = n.length <= 3 ? t.indexOf(' ' + n + ' ') > -1 : t.indexOf(n) > -1;
                if (hit) { s += n.length > 3 ? 2 : 1; }
            });
            if (s > score) { score = s; best = f; }
        });
        return score > 0 ? best : null;
    }

    function Chat(el) {
        var self = this;
        self.el = el;
        self.mode = el.getAttribute('data-chat');
        self.log = $('[data-chat-log]', el);
        self.form = $('[data-chat-form]', el);
        self.input = $('[data-chat-input]', el);
        self.busy = false;
        self.started = false;
        on(self.form, 'submit', function (e) {
            e.preventDefault();
            var v = (self.input.value || '').trim();
            if (v) { self.input.value = ''; self.ask(v); }
        });
        if (self.mode === 'page') { self.start(); }
    }
    Chat.prototype.start = function () {
        if (this.started) { return; }
        this.started = true;
        this.say((UH.chat && UH.chat.greeting) || "Assalamu'alaikum! Ada yang bisa kami bantu?", 'bot');
    };
    Chat.prototype.say = function (text, who, link) {
        var m = D.createElement('div');
        m.className = 'uh-msg uh-msg--' + who;
        var p = D.createElement('p');
        p.textContent = text;
        m.appendChild(p);
        if (link && link.u) {
            var a = D.createElement('a');
            a.className = 'uh-msg__link';
            a.href = link.u;
            a.textContent = link.t + ' \u2192';
            if (link.ext) { a.target = '_blank'; a.rel = 'noopener'; }
            m.appendChild(a);
        }
        this.log.appendChild(m);
        this.log.scrollTop = this.log.scrollHeight;
    };
    Chat.prototype.ask = function (text) {
        var self = this;
        if (self.busy) { return; }
        self.start();
        self.say(text, 'user');
        self.busy = true;
        var typing = D.createElement('div');
        typing.className = 'uh-msg uh-msg--bot uh-msg--typing';
        typing.innerHTML = '<span></span><span></span><span></span>';
        self.log.appendChild(typing);
        self.log.scrollTop = self.log.scrollHeight;

        var t = norm(text);
        var reply;
        var link = null;
        if (/^(assalamu|assalam|salam|halo|hai|hi|selamat)\b/.test(t)) {
            reply = "Wa'alaikumussalam warahmatullahi wabarakatuh. Ada yang bisa kami bantu seputar paket Umrah & Haji?";
        } else if (/\b(terima kasih|makasih|thanks|jazakallah)\b/.test(t)) {
            reply = 'Sama-sama. Semoga Allah mudahkan perjalanan ibadah Anda.';
        } else {
            var f = findAnswer(text);
            if (f) { reply = f.a; link = f.l ? { u: f.l.u, t: f.l.t } : null; }
            else { reply = (UH.chat && UH.chat.fallback) || 'Silakan hubungi tim kami melalui WhatsApp.'; link = { u: UH.wa, t: 'Chat WhatsApp', ext: true }; }
        }
        setTimeout(function () {
            if (typing.parentNode) { typing.parentNode.removeChild(typing); }
            self.say(reply, 'bot', link);
            self.busy = false;
        }, reduceMotion ? 0 : 650);
    };
    Chat.prototype.open = function () {
        var self = this;
        if (self.mode === 'page') {
            self.start();
            self.el.scrollIntoView({ behavior: reduceMotion ? 'auto' : 'smooth', block: 'center' });
            if (self.input) { self.input.focus({ preventScroll: true }); }
            return;
        }
        closeMenu();
        self.start();
        self.el.hidden = false;
        W.requestAnimationFrame(function () { self.el.classList.add('is-open'); });
        D.body.classList.add('uh-chat-open');
        setTimeout(function () { if (self.input) { self.input.focus({ preventScroll: true }); } }, 200);
    };
    Chat.prototype.close = function () {
        var self = this;
        if (self.mode === 'page' || self.el.hidden) { return; }
        self.el.classList.remove('is-open');
        D.body.classList.remove('uh-chat-open');
        setTimeout(function () { self.el.hidden = true; }, 220);
    };

    $$('[data-chat]').forEach(function (el) { chats.push(new Chat(el)); });

    function activeChat() {
        var page = chats.filter(function (c) { return c.mode === 'page'; })[0];
        return page || chats[0] || null;
    }
    chatAsk = function (text) {
        var c = activeChat();
        if (!c) { return; }
        c.open();
        setTimeout(function () { c.ask(text); }, c.mode === 'page' ? 0 : 260);
    };
    $$('[data-chat-open]').forEach(function (b) {
        on(b, 'click', function () { var c = activeChat(); if (c) { c.open(); } });
    });
    $$('[data-chat-close]').forEach(function (b) {
        on(b, 'click', function () { chats.forEach(function (c) { c.close(); }); });
    });
    $$('[data-chat-ask]').forEach(function (b) {
        on(b, 'click', function () {
            var c = chats.filter(function (x) { return x.el.contains(b); })[0] || activeChat();
            if (!c) { return; }
            if (!c.el.contains(b)) { c.open(); }
            setTimeout(function () { c.ask(b.getAttribute('data-chat-ask')); }, c.el.contains(b) ? 0 : 260);
        });
    });

    /* ------------------------------------------------------------------ Global keys */
    on(D, 'keydown', function (e) {
        if (e.key !== 'Escape') { return; }
        closeSearch();
        closeMenu();
        closeSelects();
        chats.forEach(function (c) { c.close(); });
    });
})();
