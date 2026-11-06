/* ==========================================================================
   NovaLearn · E-Learning · Futuristic · Dark Mode
   e-learning.js — vanilla JS tanpa dependensi. Tiap modul hanya aktif bila
   elemennya ada di halaman. Daftar modul:
   1 Navbar · 2 Tab jadwal · 3 Pricing · 4 Mesin pencarian · 5 Saran hero
   6 Dialog pencarian · 7 Filter program · 8 Course · 9 Form + WhatsApp
   10 Login (demo) · 11 AI FAQ
   ========================================================================== */
(function () {
    'use strict';

    var $ = function (s, c) { return (c || document).querySelector(s); };
    var $$ = function (s, c) { return Array.prototype.slice.call((c || document).querySelectorAll(s)); };
    var params = new URLSearchParams(window.location.search);
    var SVG_NS = 'http://www.w3.org/2000/svg';

    function store(key, val) {
        try {
            if (val === undefined) { return JSON.parse(window.localStorage.getItem(key)); }
            window.localStorage.setItem(key, JSON.stringify(val));
        } catch (e) { return null; }
    }
    function icon(name) {
        var svg = document.createElementNS(SVG_NS, 'svg'), use = document.createElementNS(SVG_NS, 'use');
        svg.setAttribute('class', 'ic'); svg.setAttribute('aria-hidden', 'true');
        use.setAttribute('href', '#i-' + name); svg.appendChild(use);
        return svg;
    }
    function isTyping(el) { return el && (/^(INPUT|TEXTAREA|SELECT)$/.test(el.tagName) || el.isContentEditable); }

    /* ---------- 1. Navbar ---------- */
    (function nav() {
        var bar = $('[data-nav]'), toggle = $('[data-nav-toggle]'), menu = $('[data-nav-menu]');
        if (!bar) { return; }
        function setOpen(open) {
            if (!toggle || !menu) { return; }
            menu.classList.toggle('is-open', open);
            toggle.setAttribute('aria-expanded', String(open));
            toggle.setAttribute('aria-label', open ? 'Tutup menu' : 'Buka menu');
            toggle.querySelector('use').setAttribute('href', open ? '#i-close' : '#i-menu');
        }
        if (toggle) {
            toggle.addEventListener('click', function () { setOpen(toggle.getAttribute('aria-expanded') !== 'true'); });
            document.addEventListener('keydown', function (e) { if (e.key === 'Escape') { setOpen(false); } });
            document.addEventListener('click', function (e) { if (!bar.contains(e.target)) { setOpen(false); } });
            window.matchMedia('(min-width: 1280px)').addEventListener('change', function () { setOpen(false); });
            if (menu) { menu.addEventListener('click', function (e) { if (e.target.closest('[data-ai-open]')) { setOpen(false); } }); }
        }
        function onScroll() { bar.classList.toggle('is-stuck', window.scrollY > 8); }
        onScroll();
        window.addEventListener('scroll', onScroll, { passive: true });
    })();

    /* ---------- 2. Tab jadwal ---------- */
    $$('[data-tabs]').forEach(function (root) {
        var tabs = $$('[data-tab]', root), panels = $$('[role="tabpanel"]', root);
        function select(tab) {
            tabs.forEach(function (t) { var on = t === tab; t.setAttribute('aria-selected', String(on)); t.tabIndex = on ? 0 : -1; });
            panels.forEach(function (p) { p.hidden = p.id !== 'panel-' + tab.dataset.tab; });
        }
        tabs.forEach(function (tab, i) {
            tab.addEventListener('click', function () { select(tab); });
            tab.addEventListener('keydown', function (e) {
                var n = null;
                if (e.key === 'ArrowRight') { n = tabs[(i + 1) % tabs.length]; }
                if (e.key === 'ArrowLeft') { n = tabs[(i - 1 + tabs.length) % tabs.length]; }
                if (n) { e.preventDefault(); n.focus(); select(n); }
            });
        });
    });

    /* ---------- 3. Pricing ---------- */
    $$('[data-pricing]').forEach(function (root) {
        var btns = $$('[data-billing]', root), prices = $$('[data-monthly]', root);
        btns.forEach(function (b) {
            b.addEventListener('click', function () {
                var yearly = b.dataset.billing === 'yearly';
                btns.forEach(function (x) { var on = x === b; x.classList.toggle('is-on', on); x.setAttribute('aria-pressed', String(on)); });
                prices.forEach(function (p) { p.textContent = yearly ? p.dataset.yearly : p.dataset.monthly; });
            });
        });
    });

    /* ---------- 4. Mesin pencarian (indeks JSON dari server) ---------- */
    var INDEX = [];
    try { INDEX = JSON.parse(($('#nl-search-index') || {}).textContent || '[]'); } catch (e) { INDEX = []; }
    var ORDER = { Program: 0, Teacher: 1, Kategori: 2, Halaman: 3 };

    function tokens(q) { return q.toLowerCase().trim().split(/\s+/).filter(Boolean); }
    function esc(s) { return s.replace(/[.*+?^${}()|[\]\\]/g, '\\$&'); }

    function search(q, limit) {
        var t = tokens(q);
        if (!t.length) { return []; }
        return INDEX.map(function (it) {
            var title = it.title.toLowerCase(), score = 0, ok = true;
            t.forEach(function (w) {
                if (it.k.indexOf(w) === -1) { ok = false; return; }
                score += title.indexOf(w) === 0 ? 4 : (title.indexOf(w) > -1 ? 3 : 1);
            });
            return ok ? { it: it, s: score } : null;
        }).filter(Boolean).sort(function (a, b) {
            return b.s - a.s || ORDER[a.it.type] - ORDER[b.it.type];
        }).slice(0, limit || 8).map(function (x) { return x.it; });
    }
    function highlight(text, t) {
        var frag = document.createDocumentFragment();
        if (!t.length) { frag.appendChild(document.createTextNode(text)); return frag; }
        text.split(new RegExp('(' + t.map(esc).join('|') + ')', 'ig')).forEach(function (part, i) {
            if (i % 2) { var m = document.createElement('mark'); m.textContent = part; frag.appendChild(m); }
            else if (part) { frag.appendChild(document.createTextNode(part)); }
        });
        return frag;
    }
    function resultItem(it, t, id) {
        var li = document.createElement('li'), a = document.createElement('a'), body = document.createElement('span'),
            title = document.createElement('strong'), sub = document.createElement('small'), tag = document.createElement('em');
        li.setAttribute('role', 'option'); li.id = id;
        a.href = it.url; if (it.act) { a.dataset.act = it.act; }
        title.appendChild(highlight(it.title, t)); sub.textContent = it.sub; tag.textContent = it.type;
        body.appendChild(title); body.appendChild(sub);
        a.appendChild(icon(it.icon)); a.appendChild(body); a.appendChild(tag); li.appendChild(a);
        return li;
    }
    // Navigasi keyboard untuk daftar hasil (combobox ARIA)
    function keyNav(input, list) {
        var active = -1;
        function items() { return $$('[role="option"]', list); }
        function set(i) {
            var all = items(); active = i;
            all.forEach(function (li, j) { li.classList.toggle('is-active', j === i); li.setAttribute('aria-selected', String(j === i)); });
            if (i > -1 && all[i]) { input.setAttribute('aria-activedescendant', all[i].id); all[i].scrollIntoView({ block: 'nearest' }); }
            else { input.removeAttribute('aria-activedescendant'); }
        }
        input.addEventListener('keydown', function (e) {
            var n = items().length;
            if (e.key === 'ArrowDown' && n) { e.preventDefault(); set((active + 1) % n); }
            else if (e.key === 'ArrowUp' && n) { e.preventDefault(); set((active - 1 + n) % n); }
            else if (e.key === 'Enter' && active > -1) { e.preventDefault(); items()[active].querySelector('a').click(); }
        });
        return { reset: function () { set(-1); } };
    }
    function openAI() { document.dispatchEvent(new CustomEvent('nl:open-ai')); }
    function actionClick(e, after) {
        var a = e.target.closest('a[data-act="ai"]');
        if (a) { e.preventDefault(); if (after) { after(); } openAI(); }
    }

    /* ---------- 5. Saran pencarian di hero ---------- */
    (function heroSearch() {
        var form = $('[data-hero-search]'); if (!form) { return; }
        var input = $('[data-suggest-input]', form), list = $('[data-suggest-list]'), clear = $('[data-clear]', form);
        var nav = keyNav(input, list), progUrl = form.getAttribute('action');

        function show(open) { list.hidden = !open; input.setAttribute('aria-expanded', String(open)); }
        function render() {
            var q = input.value, t = tokens(q), res = search(q, 6);
            list.textContent = ''; nav.reset(); clear.hidden = !q;
            if (!t.length) { show(false); return; }
            res.forEach(function (it, i) { list.appendChild(resultItem(it, t, 'hs-' + i)); });
            var all = document.createElement('li'), a = document.createElement('a'), s = document.createElement('span');
            all.setAttribute('role', 'option'); all.id = 'hs-all'; all.className = 'nl-suggest__all';
            a.href = progUrl + '?q=' + encodeURIComponent(q.trim()); s.textContent = 'Cari “' + q.trim() + '” di semua program';
            a.appendChild(icon('search')); a.appendChild(s); all.appendChild(a); list.appendChild(all);
            show(true);
        }
        input.addEventListener('input', render);
        input.addEventListener('focus', function () { if (input.value) { render(); } });
        clear.addEventListener('click', function () { input.value = ''; render(); input.focus(); });
        list.addEventListener('mousedown', function (e) { e.preventDefault(); });
        list.addEventListener('click', function (e) { actionClick(e, function () { show(false); }); });
        input.addEventListener('keydown', function (e) { if (e.key === 'Escape') { show(false); } });
        document.addEventListener('click', function (e) { if (!form.contains(e.target) && !list.contains(e.target)) { show(false); } });
        form.addEventListener('submit', function (e) { if (!input.value.trim()) { e.preventDefault(); input.focus(); } });
    })();

    /* ---------- 6. Dialog pencarian global ( / atau Ctrl+K ) ---------- */
    (function searchDialog() {
        var box = $('[data-sx]'); if (!box) { return; }
        var input = $('[data-sx-input]', box), list = $('[data-sx-list]', box), pop = $('[data-sx-popular]', box),
            empty = $('[data-sx-empty]', box), term = $('[data-sx-term]', box), dialog = $('.nl-sx__dialog', box);
        var nav = keyNav(input, list), last = null;

        function render() {
            var q = input.value, t = tokens(q), res = search(q, 8);
            list.textContent = ''; nav.reset();
            pop.hidden = !!t.length;
            empty.hidden = !t.length || res.length > 0;
            term.textContent = q.trim();
            res.forEach(function (it, i) { list.appendChild(resultItem(it, t, 'sx-' + i)); });
        }
        function open() {
            if (!box.hidden) { return; }
            last = document.activeElement; box.hidden = false;
            document.documentElement.classList.add('nl-lock');
            input.value = ''; render();
            setTimeout(function () { input.focus(); }, 30);
        }
        function close() {
            if (box.hidden) { return; }
            box.hidden = true; document.documentElement.classList.remove('nl-lock');
            if (last && last.focus) { last.focus(); }
        }
        $$('[data-sx-open]').forEach(function (b) { b.addEventListener('click', function (e) { e.preventDefault(); open(); }); });
        $$('[data-sx-close]', box).forEach(function (b) { b.addEventListener('click', close); });
        input.addEventListener('input', render);
        list.addEventListener('click', function (e) { actionClick(e, close); });
        pop.addEventListener('click', function (e) {
            var b = e.target.closest('[data-term]'); if (!b) { return; }
            input.value = b.dataset.term; render(); input.focus();
        });
        document.addEventListener('keydown', function (e) {
            if (e.key === 'Escape') { close(); }
            if ((e.key === '/' && !e.ctrlKey && !e.metaKey && !e.altKey && !isTyping(document.activeElement)) || ((e.ctrlKey || e.metaKey) && e.key.toLowerCase() === 'k')) {
                e.preventDefault(); open();
            }
            if (e.key === 'Tab' && !box.hidden) { /* jebakan fokus sederhana */
                var f = $$('input, button, a[href]', dialog).filter(function (x) { return !x.disabled && x.offsetParent !== null; });
                if (!f.length) { return; }
                var first = f[0], lastEl = f[f.length - 1];
                if (e.shiftKey && document.activeElement === first) { e.preventDefault(); lastEl.focus(); }
                else if (!e.shiftKey && document.activeElement === lastEl) { e.preventDefault(); first.focus(); }
            }
        });
    })();

    /* ---------- 7. Programs: cari + filter + urutkan + sinkron URL ---------- */
    (function programs() {
        var tools = $('[data-programs-tools]'), grid = $('[data-programs]');
        if (!tools || !grid) { return; }
        var cards = $$('.nl-program', grid), empty = $('[data-empty]'), count = $('[data-count]', tools),
            q = $('[data-prog-q]', tools), clear = $('[data-prog-clear]', tools), sort = $('[data-prog-sort]', tools),
            resets = $$('[data-prog-reset]');
        var state = { q: params.get('q') || '', level: params.get('level') || 'all', cat: params.get('cat') || 'all', sort: params.get('sort') || 'default' };
        q.value = state.q; sort.value = state.sort;

        var sorters = {
            'default': function (a, b) { return a.dataset.i - b.dataset.i; },
            'price-asc': function (a, b) { return a.dataset.price - b.dataset.price; },
            'price-desc': function (a, b) { return b.dataset.price - a.dataset.price; },
            'name': function (a, b) { return a.dataset.name.localeCompare(b.dataset.name); },
            'hours': function (a, b) { return a.dataset.hours - b.dataset.hours; }
        };
        function sync(attr) { $$('[data-' + attr + ']', tools).forEach(function (b) { b.classList.toggle('is-on', b.dataset[attr] === state[attr]); }); }
        function url() {
            var p = new URLSearchParams();
            if (state.q.trim()) { p.set('q', state.q.trim()); }
            if (state.level !== 'all') { p.set('level', state.level); }
            if (state.cat !== 'all') { p.set('cat', state.cat); }
            if (state.sort !== 'default') { p.set('sort', state.sort); }
            var s = p.toString();
            try { window.history.replaceState(null, '', window.location.pathname + (s ? '?' + s : '') + window.location.hash); } catch (e) { /* abaikan */ }
        }
        function apply() {
            var t = tokens(state.q), shown = 0;
            cards.slice().sort(sorters[state.sort] || sorters['default']).forEach(function (c) {
                var ok = (state.level === 'all' || c.dataset.level === state.level) &&
                         (state.cat === 'all' || c.dataset.cat === state.cat) &&
                         t.every(function (w) { return c.dataset.k.indexOf(w) > -1; });
                c.hidden = !ok; if (ok) { shown++; }
                grid.appendChild(c);
            });
            count.textContent = shown;
            if (empty) { empty.hidden = shown > 0; }
            clear.hidden = !state.q;
            var dirty = state.q.trim() || state.level !== 'all' || state.cat !== 'all' || state.sort !== 'default';
            $$('[data-prog-reset]', tools).forEach(function (b) { b.hidden = !dirty; });
            url();
        }
        var timer;
        q.addEventListener('input', function () { clearTimeout(timer); timer = setTimeout(function () { state.q = q.value; apply(); }, 120); });
        clear.addEventListener('click', function () { q.value = ''; state.q = ''; apply(); q.focus(); });
        sort.addEventListener('change', function () { state.sort = sort.value; apply(); });
        ['level', 'cat'].forEach(function (attr) {
            $$('[data-' + attr + ']', tools).forEach(function (b) { b.addEventListener('click', function () { state[attr] = b.dataset[attr]; sync(attr); apply(); }); });
            sync(attr);
        });
        resets.forEach(function (b) {
            b.addEventListener('click', function () {
                state = { q: '', level: 'all', cat: 'all', sort: 'default' };
                q.value = ''; sort.value = 'default'; sync('level'); sync('cat'); apply();
            });
        });
        apply();
        if (window.location.hash === '#cari') { q.focus(); }
    })();

    /* ---------- 8. Course content ---------- */
    $$('[data-course]').forEach(function (root) {
        var total = parseInt(root.dataset.total, 10) || 1, done = [];
        try { done = JSON.parse(root.dataset.done || '[]'); } catch (e) { done = []; }
        var saved = store('nl-course-done'); if (Array.isArray(saved)) { done = saved; }
        var bar = $('[data-progress]', root), txt = $('[data-progress-text]', root), now = $('[data-now]', root), items = $$('.nl-lesson', root);

        function render() {
            var pct = Math.round(done.length / total * 100);
            if (bar) { bar.setAttribute('aria-valuenow', pct); $('i', bar).style.width = pct + '%'; }
            if (txt) { txt.textContent = pct + '%'; }
            var current = items.filter(function (li) { return done.indexOf(+li.dataset.lesson) === -1; })[0];
            items.forEach(function (li) {
                var isDone = done.indexOf(+li.dataset.lesson) > -1;
                li.classList.toggle('is-done', isDone); li.classList.toggle('is-current', li === current);
                $('[data-done-btn]', li).setAttribute('aria-pressed', String(isDone));
            });
        }
        items.forEach(function (li) {
            $('[data-pick]', li).addEventListener('click', function () {
                if (now) { now.textContent = this.dataset.pick; }
                items.forEach(function (x) { x.classList.toggle('is-current', x === li); });
            });
            $('[data-done-btn]', li).addEventListener('click', function () {
                var id = +li.dataset.lesson, i = done.indexOf(id);
                if (i > -1) { done.splice(i, 1); } else { done.push(id); }
                store('nl-course-done', done); render();
            });
        });
        render();
    });

    /* ---------- 9. Form + kirim ke WhatsApp ---------- */
    var rules = {
        name: function (v) { return v.trim().length >= 3 ? '' : 'Nama minimal 3 karakter.'; },
        email: function (v) { return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(v.trim()) ? '' : 'Masukkan alamat email yang valid.'; },
        phone: function (v) { return /^(\+62|62|0)8[0-9]{7,12}$/.test(v.replace(/[\s-]/g, '')) ? '' : 'Masukkan nomor WhatsApp yang valid (08xx...).'; },
        program: function (v) { return v ? '' : 'Pilih salah satu program.'; },
        plan: function (v) { return v ? '' : 'Pilih salah satu paket.'; },
        password: function (v) { return v.length >= 6 ? '' : 'Kata sandi minimal 6 karakter.'; }
    };
    function check(field, fallbackMsg) {
        var rule = rules[field.name]; if (!rule) { return true; }
        var text = rule(field.value), wrap = field.closest('.nl-field'), out = wrap && $('.nl-err', wrap);
        if (wrap) { wrap.classList.toggle('has-error', !!text); }
        if (out) { out.textContent = text; }
        field.setAttribute('aria-invalid', text ? 'true' : 'false');
        if (!wrap && fallbackMsg) { fallbackMsg.className = 'nl-form-msg' + (text ? ' is-error' : ''); fallbackMsg.textContent = text; }
        return !text;
    }
    function bindValidation(form, fields, msg) {
        fields.forEach(function (f) {
            f.addEventListener('blur', function () { check(f, msg); });
            f.addEventListener('input', function () { if (f.getAttribute('aria-invalid') === 'true') { check(f, msg); } });
        });
    }
    function setMsg(el, text, isError, linkUrl) {
        if (!el) { return; }
        el.className = 'nl-form-msg' + (isError ? ' is-error' : ''); el.textContent = text;
        if (linkUrl) { var a = document.createElement('a'); a.href = linkUrl; a.target = '_blank'; a.rel = 'noopener'; a.textContent = ' Buka WhatsApp'; el.appendChild(a); }
    }
    function labelOf(f) {
        if (f.dataset.label) { return f.dataset.label; }
        var l = f.id && $('label[for="' + f.id + '"]'); return l ? l.textContent.trim() : f.name;
    }
    function valueOf(f) { return f.tagName === 'SELECT' ? (f.value ? f.options[f.selectedIndex].text : '') : f.value.trim(); }
    function waUrl(number, title, pairs) {
        var lines = ['*' + title + ' - NovaLearn*', ''];
        pairs.forEach(function (p) { if (p[1]) { lines.push(p[0] + ': ' + p[1]); } });
        return 'https://wa.me/' + number + '?text=' + encodeURIComponent(lines.join('\n'));
    }

    $$('[data-wa-form]').forEach(function (form) {
        var msg = $('[data-form-msg]', form) || (form.dataset.msg ? $(form.dataset.msg) : null);
        var fields = $$('input:not([type=checkbox]):not([type=password]), select, textarea', form);
        bindValidation(form, fields, msg);

        form.addEventListener('submit', function (e) {
            e.preventDefault();
            var ok = fields.map(function (f) { return check(f, msg); }).every(Boolean);
            var agree = $('input[name=agree]', form), agreeErr = $('[data-agree-err]', form);
            if (agree) { ok = ok && agree.checked; if (agreeErr) { agreeErr.textContent = agree.checked ? '' : 'Setujui pengiriman data untuk melanjutkan.'; } }
            if (!ok) {
                setMsg(msg && $('[data-form-msg]', form) ? msg : null, 'Periksa kembali isian yang ditandai.', true);
                var bad = $('[aria-invalid="true"]', form); if (bad) { bad.focus(); }
                return;
            }
            var url = waUrl(form.dataset.wa, form.dataset.waTitle || 'Pesan Baru', fields.map(function (f) { return [labelOf(f), valueOf(f)]; }));
            var w = window.open(url, '_blank');
            if (w) { w.opener = null; setMsg(msg, 'Membuka WhatsApp… jika tidak terbuka otomatis, klik tautan ini.', false, url); }
            else { window.location.href = url; }
            form.reset();
        });
    });

    /* ---------- 10. Login (demo statis — TIDAK dikirim ke WhatsApp) ---------- */
    $$('[data-login]').forEach(function (form) {
        var msg = $('[data-form-msg]', form), fields = $$('input', form);
        bindValidation(form, fields, msg);
        form.addEventListener('submit', function (e) {
            var ok = fields.map(function (f) { return check(f, msg); }).every(Boolean);
            if (!ok) { e.preventDefault(); setMsg(msg, 'Periksa kembali isian yang ditandai.', true); return; }
            if (form.getAttribute('action') === '#') {
                e.preventDefault(); setMsg(msg, 'Form login siap dihubungkan ke backend (mode demo).', false); form.reset();
            }
        });
    });

    /* ---------- 11. AI FAQ ---------- */
    (function ai() {
        var panel = $('[data-ai]'), btn = $('[data-ai-toggle]'), wrap = $('[data-float]');
        if (!panel || !btn) { return; }
        var faq = [];
        try { faq = JSON.parse(panel.dataset.faq || '[]'); } catch (e) { faq = []; }
        var log = $('[data-ai-log]', panel), quick = $('[data-ai-quick]', panel), form = $('[data-ai-form]', panel), input = $('input', form);
        var openers = $$('[data-ai-open]'), busy = false;

        function setOpen(open, focusBack) {
            panel.hidden = !open;
            btn.setAttribute('aria-expanded', String(open));
            wrap.classList.toggle('is-open', open);
            openers.forEach(function (o) { o.setAttribute('aria-expanded', String(open)); o.classList.toggle('is-active', open); });
            if (open) { setTimeout(function () { input.focus(); }, 60); }
            else if (focusBack) { btn.focus(); }
        }
        function add(text, who, url, label) {
            var m = document.createElement('div');
            m.className = 'nl-msg nl-msg--' + who; m.textContent = text;
            if (url) { var a = document.createElement('a'); a.href = url; a.textContent = label || 'Buka halaman terkait'; if (/^https?:/.test(url)) { a.target = '_blank'; a.rel = 'noopener'; } m.appendChild(document.createElement('br')); m.appendChild(a); }
            log.appendChild(m); log.scrollTop = log.scrollHeight;
        }
        function answer(text) {
            var s = text.toLowerCase(), best = null, score = 0;
            faq.forEach(function (f) {
                var n = f.k.reduce(function (c, k) { return c + (s.indexOf(k) > -1 ? 1 : 0); }, 0);
                if (s.trim() === f.q.toLowerCase()) { n += 10; }
                if (n > score) { score = n; best = f; }
            });
            return best;
        }
        function ask(text) {
            text = text.trim(); if (!text || busy) { return; }
            busy = true; add(text, 'user');
            var typing = document.createElement('div');
            typing.className = 'nl-msg nl-msg--bot nl-msg--typing'; typing.setAttribute('aria-label', 'Nova sedang mengetik');
            typing.innerHTML = '<i></i><i></i><i></i>';
            log.appendChild(typing); log.scrollTop = log.scrollHeight;
            setTimeout(function () {
                typing.remove();
                var hit = answer(text);
                if (hit) { add(hit.a, 'bot', hit.u); } else { add(panel.dataset.fallback, 'bot', panel.dataset.waUrl, 'Chat via WhatsApp'); }
                busy = false;
            }, 650);
        }

        btn.addEventListener('click', function () { setOpen(panel.hidden); });
        openers.forEach(function (o) { o.addEventListener('click', function () { if (panel.hidden) { setOpen(true); } else { input.focus(); } }); });
        document.addEventListener('nl:open-ai', function () { setOpen(true); });
        $('[data-ai-close]', panel).addEventListener('click', function () { setOpen(false, true); });
        document.addEventListener('keydown', function (e) { if (e.key === 'Escape' && !panel.hidden && $('[data-sx]').hidden) { setOpen(false, true); } });
        quick.addEventListener('click', function (e) { var b = e.target.closest('button[data-q]'); if (b) { ask(b.dataset.q); } });
        form.addEventListener('submit', function (e) { e.preventDefault(); ask(input.value); input.value = ''; });
        if (window.location.hash === '#ai-faq') { setOpen(true); }
    })();
})();
