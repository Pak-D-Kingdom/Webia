/* ==========================================================================
   NovaLearn · E-Learning · Futuristic · Dark Mode
   e-learning.js — vanilla JS, tanpa dependensi. Semua modul berdiri sendiri
   dan hanya aktif bila elemennya ada di halaman.
   ========================================================================== */
(function () {
    'use strict';

    var $ = function (s, c) { return (c || document).querySelector(s); };
    var $$ = function (s, c) { return Array.prototype.slice.call((c || document).querySelectorAll(s)); };
    var params = new URLSearchParams(window.location.search);

    function store(key, val) {
        try {
            if (val === undefined) { return JSON.parse(window.localStorage.getItem(key)); }
            window.localStorage.setItem(key, JSON.stringify(val));
        } catch (e) { return null; }
    }

    /* ---------- 1. Navbar: menu mobile + bayangan saat scroll ---------- */
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
            window.matchMedia('(min-width: 1100px)').addEventListener('change', function () { setOpen(false); });
        }
        function onScroll() { bar.classList.toggle('is-stuck', window.scrollY > 8); }
        onScroll();
        window.addEventListener('scroll', onScroll, { passive: true });
    })();

    /* ---------- 2. Tab jadwal (ARIA tabs + navigasi keyboard) ---------- */
    $$('[data-tabs]').forEach(function (root) {
        var tabs = $$('[data-tab]', root), panels = $$('[role="tabpanel"]', root);
        function select(tab) {
            tabs.forEach(function (t) {
                var on = t === tab;
                t.setAttribute('aria-selected', String(on));
                t.tabIndex = on ? 0 : -1;
            });
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

    /* ---------- 3. Pricing: bulanan / tahunan ---------- */
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

    /* ---------- 4. Programs: cari + filter level + kategori ---------- */
    (function programs() {
        var tools = $('[data-programs-tools]'), list = $('[data-programs]');
        if (!tools || !list) { return; }
        var cards = $$('.nl-program', list), empty = $('[data-empty]');
        var q = $('[data-prog-q]', tools);
        var state = { q: (params.get('q') || '').toLowerCase().trim(), level: params.get('level') || 'all', cat: params.get('cat') || 'all' };
        q.value = params.get('q') || '';

        function sync(attr) {
            $$('[data-' + attr + ']', tools).forEach(function (b) { b.classList.toggle('is-on', b.dataset[attr] === state[attr]); });
        }
        function apply() {
            var shown = 0;
            cards.forEach(function (c) {
                var ok = (state.level === 'all' || c.dataset.level === state.level) &&
                         (state.cat === 'all' || c.dataset.cat === state.cat) &&
                         (!state.q || c.dataset.title.indexOf(state.q) > -1);
                c.hidden = !ok;
                if (ok) { shown++; }
            });
            if (empty) { empty.hidden = shown > 0; }
        }
        q.addEventListener('input', function () { state.q = q.value.toLowerCase().trim(); apply(); });
        ['level', 'cat'].forEach(function (attr) {
            $$('[data-' + attr + ']', tools).forEach(function (b) {
                b.addEventListener('click', function () { state[attr] = b.dataset[attr]; sync(attr); apply(); });
            });
            sync(attr);
        });
        apply();
        if (window.location.hash === '#cari') { q.focus(); }
    })();

    /* ---------- 5. Course content: pilih modul + tandai selesai + progres ---------- */
    $$('[data-course]').forEach(function (root) {
        var total = parseInt(root.dataset.total, 10) || 1;
        var done = [];
        try { done = JSON.parse(root.dataset.done || '[]'); } catch (e) { done = []; }
        var saved = store('nl-course-done');
        if (Array.isArray(saved)) { done = saved; }

        var bar = $('[data-progress]', root), txt = $('[data-progress-text]', root), now = $('[data-now]', root);
        var items = $$('.nl-lesson', root);

        function render() {
            var pct = Math.round(done.length / total * 100);
            if (bar) { bar.setAttribute('aria-valuenow', pct); $('i', bar).style.width = pct + '%'; }
            if (txt) { txt.textContent = pct + '%'; }
            var current = items.filter(function (li) { return done.indexOf(+li.dataset.lesson) === -1; })[0];
            items.forEach(function (li) {
                var id = +li.dataset.lesson, isDone = done.indexOf(id) > -1;
                li.classList.toggle('is-done', isDone);
                li.classList.toggle('is-current', li === current);
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
                store('nl-course-done', done);
                render();
            });
        });
        var play = $('[data-play]', root);
        if (play) { play.addEventListener('click', function () { play.blur(); }); }
        render();
    });

    /* ---------- 6. Validasi form (registrasi, login, newsletter) ---------- */
    var rules = {
        name: function (v) { return v.trim().length >= 3 ? '' : 'Nama minimal 3 karakter.'; },
        email: function (v) { return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(v) ? '' : 'Masukkan alamat email yang valid.'; },
        phone: function (v) { return /^(\+62|62|0)8[0-9]{7,12}$/.test(v.replace(/[\s-]/g, '')) ? '' : 'Masukkan nomor WhatsApp yang valid (08xx...).'; },
        program: function (v) { return v ? '' : 'Pilih salah satu program.'; },
        plan: function (v) { return v ? '' : 'Pilih salah satu paket.'; },
        password: function (v, f) { return v.length >= (f.dataset.min || 6) ? '' : 'Kata sandi minimal ' + (f.dataset.min || 6) + ' karakter.'; }
    };
    function check(field) {
        var rule = rules[field.name]; if (!rule) { return true; }
        var msg = rule(field.value, field);
        var wrap = field.closest('.nl-field'), out = wrap && $('.nl-err', wrap);
        if (wrap) { wrap.classList.toggle('has-error', !!msg); }
        if (out) { out.textContent = msg; }
        field.setAttribute('aria-invalid', msg ? 'true' : 'false');
        return !msg;
    }
    function handle(form, okText, minPass) {
        var msg = $('[data-form-msg]', form), fields = $$('input:not([type=checkbox]), select', form);
        if (minPass) { fields.forEach(function (f) { if (f.name === 'password') { f.dataset.min = minPass; } }); }
        fields.forEach(function (f) { f.addEventListener('blur', function () { check(f); }); f.addEventListener('input', function () { if (f.getAttribute('aria-invalid') === 'true') { check(f); } }); });
        form.addEventListener('submit', function (e) {
            var ok = fields.map(check).every(Boolean);
            var agree = $('input[name=agree]', form), agreeErr = $('[data-agree-err]', form);
            if (agree) { var a = agree.checked; if (agreeErr) { agreeErr.textContent = a ? '' : 'Setujui ketentuan untuk melanjutkan.'; } ok = ok && a; }
            if (!ok) { e.preventDefault(); if (msg) { msg.className = 'nl-form-msg is-error'; msg.textContent = 'Periksa kembali isian yang ditandai.'; } var bad = $('[aria-invalid="true"]', form); if (bad) { bad.focus(); } return; }
            if (form.getAttribute('action') === '#') { /* mode statis: backend belum terhubung */
                e.preventDefault();
                if (msg) { msg.className = 'nl-form-msg'; msg.textContent = okText; }
                form.reset();
            }
        });
    }
    $$('[data-register]').forEach(function (f) {
        handle(f, 'Terima kasih! Pendaftaranmu berhasil dicatat (mode demo, belum terhubung ke server).', 8);
        var prog = params.get('program'), plan = params.get('plan');
        var sp = $('[name=program]', f), spl = $('[name=plan]', f);
        if (prog && sp) { sp.value = prog; }
        if (plan && spl) { spl.value = plan; }
    });
    $$('[data-login]').forEach(function (f) { handle(f, 'Form login siap dihubungkan ke backend (mode demo).', 6); });
    $$('[data-newsletter]').forEach(function (f) {
        var msg = $('[data-news-msg]');
        f.addEventListener('submit', function (e) {
            e.preventDefault();
            var input = $('input', f), good = rules.email(input.value) === '';
            msg.className = 'nl-form-msg' + (good ? '' : ' is-error');
            msg.textContent = good ? 'Terima kasih sudah berlangganan!' : 'Masukkan alamat email yang valid.';
            if (good) { f.reset(); }
        });
    });

    /* ---------- 7. AI FAQ chatbot ---------- */
    (function ai() {
        var panel = $('[data-ai]'), btn = $('[data-ai-toggle]'), wrap = $('[data-float]');
        if (!panel || !btn) { return; }
        var faq = [];
        try { faq = JSON.parse(panel.dataset.faq || '[]'); } catch (e) { faq = []; }
        var log = $('[data-ai-log]', panel), quick = $('[data-ai-quick]', panel), form = $('[data-ai-form]', panel), input = $('input', form);
        var busy = false;

        function setOpen(open) {
            panel.hidden = !open;
            btn.setAttribute('aria-expanded', String(open));
            wrap.classList.toggle('is-open', open);
            if (open) { setTimeout(function () { input.focus(); }, 60); } else { btn.focus(); }
        }
        function add(text, who, url) {
            var m = document.createElement('div');
            m.className = 'nl-msg nl-msg--' + who;
            m.textContent = text;
            if (url) { var a = document.createElement('a'); a.href = url; a.textContent = 'Buka halaman terkait'; m.appendChild(document.createElement('br')); m.appendChild(a); }
            log.appendChild(m); log.scrollTop = log.scrollHeight;
            return m;
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
            busy = true;
            add(text, 'user');
            var typing = document.createElement('div');
            typing.className = 'nl-msg nl-msg--bot nl-msg--typing'; typing.setAttribute('aria-label', 'Nova sedang mengetik');
            typing.innerHTML = '<i></i><i></i><i></i>';
            log.appendChild(typing); log.scrollTop = log.scrollHeight;
            setTimeout(function () {
                typing.remove();
                var hit = answer(text);
                if (hit) { add(hit.a, 'bot', hit.u); } else { add(panel.dataset.fallback, 'bot'); }
                busy = false;
            }, 650);
        }

        btn.addEventListener('click', function () { setOpen(panel.hidden); });
        $('[data-ai-close]', panel).addEventListener('click', function () { setOpen(false); });
        document.addEventListener('keydown', function (e) { if (e.key === 'Escape' && !panel.hidden) { setOpen(false); } });
        quick.addEventListener('click', function (e) { var b = e.target.closest('button[data-q]'); if (b) { ask(b.dataset.q); } });
        form.addEventListener('submit', function (e) { e.preventDefault(); ask(input.value); input.value = ''; });
    })();
})();
