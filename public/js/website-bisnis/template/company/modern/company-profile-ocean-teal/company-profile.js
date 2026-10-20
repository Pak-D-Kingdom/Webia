/* ==========================================================================
   Company Profile - Modern / Ocean Teal
   Vanilla JS, tanpa dependensi. Setiap fitur memakai atribut data-* sehingga
   aman dipakai di semua halaman (fitur yang elemennya tidak ada akan dilewati).
   ========================================================================== */
(function () {
    'use strict';

    var $ = function (s, r) { return (r || document).querySelector(s); };
    var $$ = function (s, r) { return Array.prototype.slice.call((r || document).querySelectorAll(s)); };
    var root = document.documentElement;

    /* ---------- Navbar: sticky shadow + menu mobile ---------- */
    var nav = $('[data-nav]');
    var menu = $('[data-menu]');
    var toggle = $('[data-menu-toggle]');

    function onScroll() { if (nav) nav.classList.toggle('is-stuck', window.scrollY > 8); }
    window.addEventListener('scroll', onScroll, { passive: true });
    onScroll();

    function setMenu(open) {
        if (!menu || !toggle) return;
        menu.classList.toggle('is-open', open);
        toggle.setAttribute('aria-expanded', String(open));
        toggle.setAttribute('aria-label', open ? 'Tutup menu' : 'Buka menu');
    }
    if (toggle) {
        toggle.addEventListener('click', function () { setMenu(toggle.getAttribute('aria-expanded') !== 'true'); });
        $$('a', menu).forEach(function (a) { a.addEventListener('click', function () { setMenu(false); }); });
        document.addEventListener('keydown', function (e) { if (e.key === 'Escape') setMenu(false); });
        window.matchMedia('(min-width: 1024px)').addEventListener('change', function () { setMenu(false); });
    }

    /* ---------- Scroll-spy (beranda saja) ---------- */
    if (document.body.dataset.page === 'home' && 'IntersectionObserver' in window) {
        var links = $$('[data-spy]');
        var home = $('.ot-nav__menu a[href]:not([data-spy])');
        var map = {};
        links.forEach(function (a) { map[a.dataset.spy] = a; });
        var targets = Object.keys(map).map(function (id) { return document.getElementById(id); }).filter(Boolean);
        var setActive = function (el) {
            links.forEach(function (a) { a.removeAttribute('aria-current'); });
            if (home && !el) home.setAttribute('aria-current', 'page');
            if (el) { if (home) home.removeAttribute('aria-current'); map[el.id].setAttribute('aria-current', 'true'); }
        };
        var io = new IntersectionObserver(function (entries) {
            entries.forEach(function (en) { if (en.isIntersecting) setActive(en.target); });
        }, { rootMargin: '-35% 0px -55% 0px' });
        targets.forEach(function (t) { io.observe(t); });
        window.addEventListener('scroll', function () { if (window.scrollY < 200) setActive(null); }, { passive: true });
    }

    /* ---------- Carousel (panah muncul hanya jika konten meluap) ---------- */
    $$('[data-carousel]').forEach(function (c) {
        var track = $('[data-track]', c);
        var next = $('[data-next]', c);
        if (!track) return;
        var refresh = function () {
            if (!next) return;
            var overflow = track.scrollWidth - track.clientWidth > 4;
            var atEnd = track.scrollLeft + track.clientWidth >= track.scrollWidth - 4;
            next.hidden = !overflow || atEnd;
        };
        if (next) next.addEventListener('click', function () { track.scrollBy({ left: track.clientWidth * 0.8, behavior: 'smooth' }); });
        track.addEventListener('scroll', refresh, { passive: true });
        window.addEventListener('resize', refresh);
        refresh();
    });

    /* ---------- Filter portofolio ---------- */
    var filters = $('[data-filters]');
    if (filters) {
        var items = $$('[data-filter-list] [data-category]');
        filters.addEventListener('click', function (e) {
            var btn = e.target.closest('[data-filter]');
            if (!btn) return;
            $$('[data-filter]', filters).forEach(function (b) {
                var on = b === btn;
                b.classList.toggle('is-active', on);
                b.setAttribute('aria-pressed', String(on));
            });
            items.forEach(function (it) { it.hidden = btn.dataset.filter !== 'all' && it.dataset.category !== btn.dataset.filter; });
        });
    }

    /* ---------- Dialog (penawaran & video) ---------- */
    function openDialog(d) {
        if (!d) return;
        if (typeof d.showModal === 'function') { if (!d.open) d.showModal(); } else { d.setAttribute('open', ''); }
        root.classList.add('ot-lock');
    }
    function closeDialog(d) {
        if (!d) return;
        if (typeof d.close === 'function') d.close(); else d.removeAttribute('open');
    }
    $$('dialog.ot-modal').forEach(function (d) {
        d.addEventListener('close', function () {
            root.classList.remove('ot-lock');
            var f = $('iframe', d);
            if (f) f.removeAttribute('src'); // hentikan video
        });
        d.addEventListener('click', function (e) {
            if (e.target === d || e.target.closest('[data-close]')) closeDialog(d); // klik backdrop / tombol tutup
        });
    });

    /* ---------- Chat AI FAQ ---------- */
    var chat = $('[data-chat]');
    var fab = $('[data-ai-fab]');
    var chatApi = null;
    if (chat) {
        var log = $('[data-chat-log]', chat);
        var chips = $('[data-chat-chips]', chat);
        var form = $('[data-chat-form]', chat);
        var faq = [];
        try { faq = JSON.parse($('[data-chat-data]', chat).textContent) || []; } catch (e) { faq = []; }
        var started = false;

        var say = function (text, who) {
            var m = document.createElement('p');
            m.className = 'ot-msg ot-msg--' + who;
            m.textContent = text;
            log.appendChild(m);
            log.scrollTop = log.scrollHeight;
        };
        var answer = function (q) {
            var s = q.toLowerCase();
            var best = null, score = 0;
            faq.forEach(function (it) {
                var n = it.q.toLowerCase() === s ? 99 : (it.k || []).reduce(function (a, k) { return a + (s.indexOf(k) > -1 ? 1 : 0); }, 0);
                if (n > score) { score = n; best = it; }
            });
            return best ? best.a : chat.dataset.fallback;
        };
        var ask = function (q) {
            q = q.trim();
            if (!q) return;
            say(q, 'user');
            setTimeout(function () { say(answer(q), 'bot'); }, 450);
        };

        faq.forEach(function (it) {
            var b = document.createElement('button');
            b.type = 'button';
            b.textContent = it.q;
            b.addEventListener('click', function () { ask(it.q); });
            chips.appendChild(b);
        });
        form.addEventListener('submit', function (e) {
            e.preventDefault();
            var input = form.elements.q;
            ask(input.value);
            input.value = '';
        });

        chatApi = {
            open: function () {
                chat.hidden = false;
                root.classList.add('ot-chat-open');
                if (fab) fab.classList.remove('is-tip');
                if (!started) { say(chat.dataset.greeting, 'bot'); started = true; }
                form.elements.q.focus();
            },
            close: function () { chat.hidden = true; root.classList.remove('ot-chat-open'); }
        };
        $('[data-close-chat]', chat).addEventListener('click', chatApi.close);
        document.addEventListener('keydown', function (e) { if (e.key === 'Escape' && !chat.hidden) chatApi.close(); });
    }

    /* ---------- Tooltip tombol AI (muncul sekali per sesi) ---------- */
    if (fab) {
        var seen = false;
        try { seen = sessionStorage.getItem('ot-ai-tip') === '1'; } catch (e) { /* abaikan */ }
        if (!seen) {
            setTimeout(function () {
                if (chat && !chat.hidden) return;
                fab.classList.add('is-tip');
                try { sessionStorage.setItem('ot-ai-tip', '1'); } catch (e) { /* abaikan */ }
                setTimeout(function () { fab.classList.remove('is-tip'); }, 6000);
            }, 3500);
        }
    }

    /* ---------- Pemicu data-open ---------- */
    document.addEventListener('click', function (e) {
        var t = e.target.closest('[data-open]');
        if (!t) return;
        var what = t.dataset.open;
        if (what === 'quote') { e.preventDefault(); openDialog($('#ot-quote')); }
        if (what === 'chat' && chatApi) { e.preventDefault(); chatApi.open(); }
        if (what === 'video') {
            e.preventDefault();
            var d = $('#ot-video');
            var f = d && $('iframe', d);
            if (f && t.dataset.video) f.src = t.dataset.video + (t.dataset.video.indexOf('?') > -1 ? '&' : '?') + 'autoplay=1';
            openDialog(d);
        }
    });

    /* ---------- Form penawaran (quotation lead) ---------- */
    var qf = $('[data-quote-form]');
    if (qf) {
        var status = $('[data-form-status]', qf);
        var emailRe = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        var msgs = { name: 'Nama wajib diisi.', email: 'Masukkan email yang valid.', phone: 'Masukkan nomor telepon yang valid.', service: 'Pilih layanan yang dibutuhkan.' };

        var validate = function () {
            var ok = true;
            ['name', 'email', 'phone', 'service'].forEach(function (n) {
                var el = qf.elements[n];
                var v = (el.value || '').trim();
                var bad = !v || (n === 'email' && !emailRe.test(v)) || (n === 'phone' && v.replace(/\D/g, '').length < 8);
                el.closest('.ot-field').classList.toggle('has-error', bad);
                el.setAttribute('aria-invalid', String(bad));
                var em = $('[data-error-for="' + n + '"]', qf);
                if (em) em.textContent = bad ? msgs[n] : '';
                if (bad && ok) { el.focus(); ok = false; }
            });
            return ok;
        };
        var show = function (text, cls) { status.textContent = text; status.className = 'ot-form__status ' + cls; };
        var done = function () { qf.reset(); show(status.dataset.success, 'is-ok'); };

        qf.addEventListener('submit', function (e) {
            e.preventDefault();
            if (!validate()) return;
            var action = qf.getAttribute('action');
            if (!action || action === '#') { done(); return; } // mode frontend: belum ada endpoint
            var btn = $('button[type="submit"]', qf);
            btn.disabled = true;
            fetch(action, { method: 'POST', body: new FormData(qf), headers: { 'X-Requested-With': 'XMLHttpRequest', 'Accept': 'application/json' }, credentials: 'same-origin' })
                .then(function (r) { if (!r.ok) throw new Error(r.status); done(); })
                .catch(function () { show(status.dataset.error, 'is-err'); })
                .then(function () { btn.disabled = false; });
        });
    }
})();
