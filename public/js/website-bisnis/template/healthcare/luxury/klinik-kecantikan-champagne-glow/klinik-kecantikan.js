/* ==========================================================================
   GlowClinic — Luxury / Champagne Glow
   File : klinik-kecantikan.js  (vanilla JS, tanpa dependensi, frontend statis)

   Modul: header, menu mobile, pencarian, accordion, jam operasional,
          form appointment (preview + lengkap), AI assistant, tombol mengambang.
   Data server dibaca dari <script id="cg-data" type="application/json">.
   ========================================================================== */
(function () {
    'use strict';

    var $ = function (sel, root) { return (root || document).querySelector(sel); };
    var $$ = function (sel, root) { return Array.prototype.slice.call((root || document).querySelectorAll(sel)); };

    var DATA = {};
    try { DATA = JSON.parse(($('#cg-data') || {}).textContent || '{}'); } catch (e) { DATA = {}; }

    var reduceMotion = window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches;

    /* ---------- util ---------- */
    function pad(n) { return (n < 10 ? '0' : '') + n; }

    // Waktu sekarang di zona waktu klinik (default Asia/Jakarta)
    function clinicNow() {
        var tz = (DATA.schedule && DATA.schedule.tz) || 'Asia/Jakarta';
        try {
            var parts = new Intl.DateTimeFormat('en-GB', { timeZone: tz, weekday: 'short', hour: '2-digit', minute: '2-digit', hour12: false }).formatToParts(new Date());
            var map = {};
            parts.forEach(function (p) { map[p.type] = p.value; });
            var days = { Sun: 0, Mon: 1, Tue: 2, Wed: 3, Thu: 4, Fri: 5, Sat: 6 };
            return { day: days[map.weekday], minutes: (parseInt(map.hour, 10) % 24) * 60 + parseInt(map.minute, 10) };
        } catch (e) {
            var d = new Date();
            return { day: d.getDay(), minutes: d.getHours() * 60 + d.getMinutes() };
        }
    }
    function toMin(hhmm) { var p = hhmm.split(':'); return parseInt(p[0], 10) * 60 + parseInt(p[1], 10); }
    function todayISO() { var d = new Date(); return d.getFullYear() + '-' + pad(d.getMonth() + 1) + '-' + pad(d.getDate()); }
    function el(tag, cls, text) { var n = document.createElement(tag); if (cls) n.className = cls; if (text != null) n.textContent = text; return n; }

    /* ---------- 1. Header: bayangan saat scroll ---------- */
    function initHeader() {
        var header = $('[data-cg-header]');
        if (!header) return;
        var onScroll = function () { header.classList.toggle('is-stuck', window.scrollY > 8); };
        onScroll();
        window.addEventListener('scroll', onScroll, { passive: true });
    }

    /* ---------- 2. Menu mobile (drawer) ---------- */
    function initMenu() {
        var burger = $('[data-cg-burger]');
        var menu = $('[data-cg-menu]');
        var scrim = $('[data-cg-scrim]');
        if (!burger || !menu) return;

        function setOpen(open) {
            menu.classList.toggle('is-open', open);
            burger.setAttribute('aria-expanded', String(open));
            burger.setAttribute('aria-label', open ? 'Tutup menu' : 'Buka menu');
            document.documentElement.style.overflow = open ? 'hidden' : '';
            if (scrim) scrim.hidden = !open;
        }
        burger.addEventListener('click', function () { setOpen(!menu.classList.contains('is-open')); });
        if (scrim) scrim.addEventListener('click', function () { setOpen(false); });
        menu.addEventListener('click', function (e) { if (e.target.closest('a')) setOpen(false); });
        document.addEventListener('keydown', function (e) { if (e.key === 'Escape') setOpen(false); });
        window.matchMedia('(min-width: 1100px)').addEventListener('change', function (m) { if (m.matches) setOpen(false); });
    }

    /* ---------- 3. Scroll-spy "Location" di beranda ---------- */
    function initLocationSpy() {
        var link = $('[data-cg-anchor="location"]');
        var target = $('#location');
        var home = $('.cg-menu__link.is-active');
        if (!link || !target || !('IntersectionObserver' in window)) return;
        new IntersectionObserver(function (entries) {
            entries.forEach(function (en) {
                var on = en.isIntersecting;
                link.classList.toggle('is-active', on);
                if (home) home.classList.toggle('is-active', !on);
            });
        }, { rootMargin: '-35% 0px -45% 0px' }).observe(target);
    }

    /* ---------- 4. Pencarian cepat ---------- */
    function initSearch() {
        var panel = $('[data-cg-search]');
        if (!panel) return;
        var input = $('[data-cg-search-input]', panel);
        var list = $('[data-cg-search-results]', panel);
        var index = DATA.search || [];

        function render(q) {
            list.innerHTML = '';
            q = q.trim().toLowerCase();
            var hits = (q ? index.filter(function (i) { return (i.t + ' ' + i.d).toLowerCase().indexOf(q) > -1; }) : index.slice(0, 7)).slice(0, 8);
            if (!hits.length) { list.appendChild(el('li', 'cg-search__empty', 'Tidak ada hasil untuk "' + q + '".')); return; }
            hits.forEach(function (h) {
                var li = el('li');
                var a = el('a'); a.href = h.u;
                a.appendChild(el('strong', null, h.t));
                a.appendChild(el('span', null, h.d));
                li.appendChild(a); list.appendChild(li);
            });
        }
        function open() { panel.hidden = false; render(''); input.value = ''; setTimeout(function () { input.focus(); }, 30); }
        function close() { panel.hidden = true; }

        $$('[data-cg-search-open]').forEach(function (b) { b.addEventListener('click', function () { panel.hidden ? open() : close(); }); });
        $('[data-cg-search-close]', panel).addEventListener('click', close);
        input.addEventListener('input', function () { render(input.value); });
        input.addEventListener('keydown', function (e) {
            if (e.key === 'Enter') { var first = $('a', list); if (first) location.href = first.href; }
        });
        document.addEventListener('keydown', function (e) { if (e.key === 'Escape' && !panel.hidden) close(); });
        list.addEventListener('click', function (e) { if (e.target.closest('a')) close(); });
    }

    /* ---------- 5. Accordion FAQ ---------- */
    function initAccordion() {
        $$('[data-cg-accordion]').forEach(function (group) {
            function toggle(btn, force) {
                var open = force != null ? force : btn.getAttribute('aria-expanded') !== 'true';
                var panel = document.getElementById(btn.getAttribute('aria-controls'));
                btn.setAttribute('aria-expanded', String(open));
                if (panel) panel.hidden = !open;
            }
            group.addEventListener('click', function (e) {
                var btn = e.target.closest('.cg-acc__btn');
                if (!btn) return;
                var willOpen = btn.getAttribute('aria-expanded') !== 'true';
                $$('.cg-acc__btn[aria-expanded="true"]', group).forEach(function (o) { if (o !== btn) toggle(o, false); });
                toggle(btn, willOpen);
            });
            // Buka otomatis bila URL mengarah ke #faq-N
            var hash = location.hash;
            if (hash) {
                var target = group.querySelector(hash);
                var btn = target && target.querySelector('.cg-acc__btn');
                if (btn) toggle(btn, true);
            }
        });
    }

    /* ---------- 6. Jam operasional: hari ini + status buka/tutup ---------- */
    function initHours() {
        var rows = $$('[data-cg-hours] .cg-hours__row');
        if (!rows.length) return;
        var now = clinicNow();
        var openNow = false, hasToday = false;

        rows.forEach(function (row) {
            var days = row.getAttribute('data-days').split(',').map(Number);
            var isToday = days.indexOf(now.day) > -1;
            row.classList.toggle('is-today', isToday);
            if (isToday) {
                hasToday = true;
                openNow = openNow || (now.minutes >= toMin(row.getAttribute('data-open')) && now.minutes < toMin(row.getAttribute('data-close')));
            }
        });

        $$('.cg-table [data-day]').forEach(function (c) { c.classList.toggle('is-today', Number(c.getAttribute('data-day')) === now.day); });

        var status = $('[data-cg-status]');
        if (status && hasToday) {
            status.classList.toggle('is-open', openNow);
            status.classList.toggle('is-closed', !openNow);
            $('span', status).textContent = openNow ? 'Buka sekarang' : 'Tutup sekarang';
        }
    }

    /* ---------- 7. Form appointment ---------- */
    // 7a. Form ringkas di beranda dikirim via GET ke halaman Appointment (tanpa JS).

    // 7b. Halaman Appointment: prefill, validasi, kirim ke WhatsApp
    function initAppointmentForm() {
        var form = $('[data-cg-appointment-form]');
        if (!form) return;

        var f = form.elements;
        var status = $('[data-cg-form-status]', form);
        var dateInput = f.tanggal, timeInput = f.jam;
        dateInput.min = todayISO();

        // Prefill dari query string (?layanan=, ?dokter=, ?nama=, ?telepon=, ?waktu=)
        var q = new URLSearchParams(location.search);
        ['nama', 'telepon', 'layanan', 'dokter'].forEach(function (k) {
            var v = q.get(k);
            if (v && f[k]) {
                f[k].value = v;
                if (f[k].tagName === 'SELECT' && f[k].value !== v) f[k].value = ''; // nilai tak dikenal
            }
        });
        var waktu = q.get('waktu');
        if (waktu && waktu.indexOf('T') > -1) {
            var parts = waktu.split('T');
            dateInput.value = parts[0];
            var want = toMin(parts[1].slice(0, 5)), best = null, diff = 1e9;
            $$('option', timeInput).forEach(function (o) {
                if (!o.value) return;
                var d = Math.abs(toMin(o.value) - want);
                if (d < diff) { diff = d; best = o.value; }
            });
            if (best) timeInput.value = best;
        }

        function label(sel) { var o = sel.options[sel.selectedIndex]; return o && o.value ? o.textContent.trim() : ''; }
        function setError(name, msg) {
            var box = $('[data-error-for="' + name + '"]', form);
            var field = f[name];
            if (field) field.setAttribute('aria-invalid', msg ? 'true' : 'false');
            if (box) { box.textContent = msg || ''; box.hidden = !msg; }
        }
        function validate() {
            var ok = true, first = null;
            function check(name, cond, msg) {
                setError(name, cond ? '' : msg);
                if (!cond) { ok = false; first = first || f[name]; }
            }
            check('nama', f.nama.value.trim().length >= 3, 'Masukkan nama lengkap (minimal 3 huruf).');
            check('telepon', /^(\+?62|0)8[0-9]{7,12}$/.test(f.telepon.value.replace(/[\s-]/g, '')), 'Masukkan nomor HP yang valid, contoh 081234567890.');
            check('email', !f.email.value || /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(f.email.value), 'Format email belum benar.');
            check('layanan', !!f.layanan.value, 'Pilih layanan yang diinginkan.');
            check('tanggal', !!f.tanggal.value && f.tanggal.value >= todayISO(), 'Pilih tanggal hari ini atau setelahnya.');
            check('jam', !!f.jam.value, 'Pilih jam kunjungan.');
            check('setuju', f.setuju.checked, 'Centang persetujuan untuk melanjutkan.');
            if (first && first.focus) first.focus();
            return ok;
        }
        function formatDate(iso) {
            var p = iso.split('-');
            var d = new Date(+p[0], +p[1] - 1, +p[2]);
            return d.toLocaleDateString('id-ID', { weekday: 'long', day: 'numeric', month: 'long', year: 'numeric' });
        }

        form.addEventListener('input', function (e) { if (e.target.name) setError(e.target.name, ''); });
        form.addEventListener('submit', function (e) {
            e.preventDefault();
            if (!validate()) return;

            var lines = [
                'Halo ' + (DATA.brand || 'GlowClinic') + ', saya ingin booking appointment:',
                '',
                'Nama: ' + f.nama.value.trim(),
                'No. Telepon: ' + f.telepon.value.trim(),
                f.email.value ? 'Email: ' + f.email.value.trim() : null,
                'Layanan: ' + label(f.layanan),
                'Dokter/Staff: ' + (label(f.dokter) || 'Tidak ada preferensi'),
                'Tanggal: ' + formatDate(f.tanggal.value),
                'Jam: ' + f.jam.value.replace(':', '.') + ' WIB',
                f.catatan.value.trim() ? 'Catatan: ' + f.catatan.value.trim() : null,
                '',
                'Mohon konfirmasi ketersediaannya. Terima kasih.'
            ].filter(function (l) { return l !== null; });

            var url = 'https://wa.me/' + DATA.wa + '?text=' + encodeURIComponent(lines.join('\n'));
            var win = window.open(url, '_blank', 'noopener');
            if (!win) { window.location.href = url; } // popup diblokir

            if (status) {
                status.hidden = false;
                status.textContent = 'WhatsApp dibuka dengan pesan booking Anda. Kirim pesannya agar tim kami dapat mengonfirmasi jadwal.';
            }
        });
    }

    /* ---------- 8. Indeks kebijakan: tandai bagian aktif ---------- */
    function initPolicyIndex() {
        var links = $$('[data-cg-policy-link]');
        if (!links.length || !('IntersectionObserver' in window)) return;
        var io = new IntersectionObserver(function (entries) {
            entries.forEach(function (en) {
                if (!en.isIntersecting) return;
                links.forEach(function (l) { l.classList.toggle('is-active', l.getAttribute('href') === '#' + en.target.id); });
            });
        }, { rootMargin: '-25% 0px -60% 0px' });
        links.forEach(function (l) { var t = $(l.getAttribute('href')); if (t) io.observe(t); });
    }

    /* ---------- 9. AI Information Assistant ---------- */
    function initAssistant() {
        var panel = $('[data-cg-ai]');
        var fab = $('[data-cg-ai-toggle]');
        if (!panel || !fab) return;

        var log = $('[data-cg-ai-log]', panel);
        var form = $('[data-cg-ai-form]', panel);
        var input = $('[data-cg-ai-input]', panel);
        var teaser = $('[data-cg-teaser]');
        var A = DATA.assistant || {};
        var busy = false;

        function isOpen() { return !panel.hidden; }
        function open() {
            panel.hidden = false;
            fab.setAttribute('aria-expanded', 'true');
            document.body.classList.toggle('cg-ai-open', window.matchMedia('(max-width: 639.98px)').matches);
            hideTeaser(true);
            setTimeout(function () { input.focus({ preventScroll: true }); }, 60);
        }
        function close() {
            panel.hidden = true;
            fab.setAttribute('aria-expanded', 'false');
            document.body.classList.remove('cg-ai-open');
            fab.focus({ preventScroll: true });
        }
        function toggle() { isOpen() ? close() : open(); }

        function scrollLog() { log.scrollTop = log.scrollHeight; }
        function addMsg(text, who, extra) {
            var m = el('p', 'cg-msg cg-msg--' + who, text);
            if (extra) m.appendChild(extra);
            log.appendChild(m); scrollLog();
            return m;
        }
        function answerFor(q) {
            var s = q.toLowerCase();
            var list = A.answers || [];
            for (var i = 0; i < list.length; i++) {
                for (var k = 0; k < list[i].keys.length; k++) {
                    if (s.indexOf(list[i].keys[k]) > -1) return { text: list[i].a, found: true };
                }
            }
            return { text: A.fallback || '', found: false };
        }
        function ask(text) {
            text = (text || '').trim();
            if (!text || busy) return;
            busy = true;
            panel.classList.add('is-chatting');
            addMsg(text, 'user');
            input.value = '';

            var typing = el('p', 'cg-msg cg-msg--bot cg-msg--typing');
            typing.setAttribute('aria-label', 'Asisten sedang mengetik');
            typing.innerHTML = '<i></i><i></i><i></i>';
            log.appendChild(typing); scrollLog();

            var res = answerFor(text);
            setTimeout(function () {
                typing.remove();
                var link = null;
                if (!res.found) {
                    link = el('a', null, A.waLabel || 'Tanya via WhatsApp');
                    link.href = 'https://wa.me/' + DATA.wa + '?text=' + encodeURIComponent('Halo, saya ingin bertanya: ' + text);
                    link.target = '_blank'; link.rel = 'noopener';
                }
                var m = addMsg(res.text, 'bot');
                if (link) { m.appendChild(document.createElement('br')); m.appendChild(link); }
                busy = false;
            }, reduceMotion ? 0 : 750);
        }

        fab.addEventListener('click', toggle);
        $('[data-cg-ai-close]', panel).addEventListener('click', close);
        document.addEventListener('keydown', function (e) { if (e.key === 'Escape' && isOpen()) close(); });
        form.addEventListener('submit', function (e) { e.preventDefault(); ask(input.value); });
        $$('[data-cg-ai-ask]', panel).forEach(function (b) { b.addEventListener('click', function () { ask(b.getAttribute('data-cg-ai-ask')); }); });

        // Pembuka dari tempat lain (teaser, tombol "Tanya GlowCat" di halaman FAQ)
        document.addEventListener('click', function (e) {
            var t = e.target.closest('[data-cg-ai-open]');
            if (t) { e.preventDefault(); open(); }
        });

        /* Teaser: muncul sekali per sesi setelah beberapa detik */
        function hideTeaser(remember) {
            if (!teaser) return;
            teaser.hidden = true;
            if (remember) { try { sessionStorage.setItem('cg-teaser', '1'); } catch (e) { /* abaikan */ } }
        }
        if (teaser) {
            var seen = false;
            try { seen = sessionStorage.getItem('cg-teaser') === '1'; } catch (e) { /* abaikan */ }
            if (!seen) {
                setTimeout(function () { if (!isOpen()) teaser.hidden = false; }, 4500);
                setTimeout(function () { hideTeaser(true); }, 16000);
            }
            $('[data-cg-teaser-close]', teaser).addEventListener('click', function () { hideTeaser(true); });
        }
    }

    /* ---------- init ---------- */
    function ready(fn) { document.readyState === 'loading' ? document.addEventListener('DOMContentLoaded', fn) : fn(); }
    ready(function () {
        initHeader();
        initMenu();
        initLocationSpy();
        initSearch();
        initAccordion();
        initHours();
        initAppointmentForm();
        initPolicyIndex();
        initAssistant();
    });
})();
