/* ==========================================================================
   RoseGlow Clinic — Klinik Kecantikan · Elegan / Rose Gold
   Vanilla JS (tanpa dependensi). Setiap fitur adalah modul kecil yang aman
   dijalankan walau elemennya tidak ada di halaman.
   ========================================================================== */
(function () {
    'use strict';

    var $ = function (s, r) { return (r || document).querySelector(s); };
    var $$ = function (s, r) { return Array.prototype.slice.call((r || document).querySelectorAll(s)); };
    var reduceMotion = window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches;

    document.documentElement.classList.add('rg-js');

    /* ---------- Header: bayangan saat scroll + tinggi untuk scroll-padding ---------- */
    function initHeader() {
        var header = $('#rgHeader');
        if (!header) return;
        var onScroll = function () { header.classList.toggle('is-stuck', window.scrollY > 8); };
        onScroll();
        window.addEventListener('scroll', onScroll, { passive: true });
        var setH = function () { document.documentElement.style.setProperty('--rg-header-h', header.offsetHeight + 'px'); };
        setH();
        window.addEventListener('resize', setH);
    }

    /* ---------- Toggle menu mobile, pencarian, notifikasi ---------- */
    function initToggles() {
        var map = { menu: '#rgMenu', search: '#rgSearch', notif: '#rgNotif' };
        var buttons = $$('[data-rg-toggle]');

        function setState(btn, open) {
            var target = $(map[btn.getAttribute('data-rg-toggle')]);
            if (!target) return;
            btn.setAttribute('aria-expanded', open ? 'true' : 'false');
            if (btn.getAttribute('data-rg-toggle') === 'menu') target.classList.toggle('is-open', open);
            else target.hidden = !open;
        }
        function closeAll(except) { buttons.forEach(function (b) { if (b !== except) setState(b, false); }); }

        buttons.forEach(function (btn) {
            btn.addEventListener('click', function (e) {
                e.stopPropagation();
                var open = btn.getAttribute('aria-expanded') !== 'true';
                closeAll(btn);
                setState(btn, open);
                if (open && btn.getAttribute('data-rg-toggle') === 'search') {
                    var i = $('#rgSearchInput'); if (i) setTimeout(function () { i.focus(); }, 30);
                }
            });
        });
        document.addEventListener('click', function (e) {
            if (!e.target.closest('.rg-pop, .rg-menu, .rg-burger')) closeAll();
        });
        document.addEventListener('keydown', function (e) { if (e.key === 'Escape') closeAll(); });
        $$('#rgMenu a').forEach(function (a) { a.addEventListener('click', function () { closeAll(); }); });
        window.addEventListener('resize', function () { if (window.innerWidth > 1100) closeAll(); });
    }

    /* ---------- Pencarian cepat di navbar ---------- */
    function initSiteSearch() {
        var input = $('#rgSearchInput'), list = $('#rgSearchList'), dataEl = $('#rgSearchData');
        if (!input || !list || !dataEl) return;
        var data = [];
        try { data = JSON.parse(dataEl.textContent); } catch (e) { return; }
        function render(q) {
            list.innerHTML = '';
            q = q.trim().toLowerCase();
            var found = data.filter(function (d) { return !q || d.t.toLowerCase().indexOf(q) > -1; }).slice(0, 8);
            if (!found.length) {
                var li = document.createElement('li'); li.className = 'rg-empty'; li.textContent = 'Tidak ada hasil.'; list.appendChild(li); return;
            }
            found.forEach(function (d) {
                var li = document.createElement('li'), a = document.createElement('a'), s = document.createElement('small');
                a.href = d.u; a.textContent = d.t; s.textContent = d.k; a.appendChild(s); li.appendChild(a); list.appendChild(li);
            });
        }
        input.addEventListener('input', function () { render(input.value); });
        render('');
    }

    /* ---------- Akordeon FAQ ---------- */
    function initAccordion() {
        $$('.rg-acc').forEach(function (acc) {
            acc.addEventListener('click', function (e) {
                var btn = e.target.closest('.rg-acc__btn');
                if (!btn || !acc.contains(btn)) return;
                var open = btn.getAttribute('aria-expanded') !== 'true';
                $$('.rg-acc__btn', acc).forEach(function (b) {
                    var isThis = b === btn, on = isThis ? open : false;
                    b.setAttribute('aria-expanded', on ? 'true' : 'false');
                    b.closest('.rg-acc__item').classList.toggle('is-open', on);
                    var p = document.getElementById(b.getAttribute('aria-controls')); if (p) p.hidden = !on;
                });
            });
        });
    }

    /* ---------- Filter kategori + pencarian (Layanan, Dokter, FAQ) ---------- */
    function initFilters() {
        $$('[data-rg-filter]').forEach(function (chips) {
            var list = $(chips.getAttribute('data-rg-filter'));
            if (!list) return;
            var scope = list.closest('section') || document;
            var search = $('[data-rg-search="' + chips.getAttribute('data-rg-filter') + '"]', scope);
            var empty = $('[data-filter-empty]', scope);
            var cat = '*', q = '';
            function apply() {
                var shown = 0;
                Array.prototype.forEach.call(list.children, function (el) {
                    if (!el.hasAttribute('data-cat')) return;
                    var ok = (cat === '*' || el.getAttribute('data-cat') === cat) &&
                             (!q || (el.getAttribute('data-text') || '').indexOf(q) > -1);
                    el.hidden = !ok; if (ok) shown++;
                });
                if (empty) empty.hidden = shown > 0;
            }
            chips.addEventListener('click', function (e) {
                var b = e.target.closest('.rg-chip'); if (!b) return;
                $$('.rg-chip', chips).forEach(function (c) { c.classList.toggle('is-active', c === b); });
                cat = b.getAttribute('data-filter'); apply();
            });
            if (search) search.addEventListener('input', function () { q = search.value.trim().toLowerCase(); apply(); });
        });
    }

    /* ---------- Daftar isi kebijakan: tandai bagian aktif ---------- */
    function initToc() {
        var links = $$('[data-toc]');
        if (!links.length || !('IntersectionObserver' in window)) return;
        var io = new IntersectionObserver(function (entries) {
            entries.forEach(function (en) {
                if (!en.isIntersecting) return;
                links.forEach(function (a) { a.classList.toggle('is-current', a.getAttribute('href') === '#' + en.target.id); });
            });
        }, { rootMargin: '-30% 0px -60% 0px' });
        links.forEach(function (a) { var t = document.getElementById(a.getAttribute('href').slice(1)); if (t) io.observe(t); });
    }

    /* ---------- Form booking: validasi → pesan WhatsApp ---------- */
    function initBooking() {
        var form = $('#rgBookingForm');
        if (!form) return;
        var status = $('#rgFormStatus');
        var date = form.elements.tanggal;
        if (date) { var t = new Date(); date.min = t.getFullYear() + '-' + String(t.getMonth() + 1).padStart(2, '0') + '-' + String(t.getDate()).padStart(2, '0'); }

        var qs = new URLSearchParams(window.location.search);
        ['layanan', 'dokter'].forEach(function (k) {
            var v = qs.get(k), f = form.elements[k];
            if (v && f && $('option[value="' + v.replace(/"/g, '') + '"]', f)) f.value = v;
        });

        function setErr(name, msg) {
            var el = $('[data-err-for="' + name + '"]', form), f = form.elements[name];
            if (el) el.textContent = msg || '';
            if (f && f.setAttribute) { if (msg) f.setAttribute('aria-invalid', 'true'); else f.removeAttribute('aria-invalid'); }
        }
        function label(sel) { return sel && sel.selectedIndex > 0 ? sel.options[sel.selectedIndex].text : '-'; }

        form.addEventListener('submit', function (e) {
            e.preventDefault();
            var f = form.elements, ok = true;
            var phone = (f.telepon.value || '').replace(/[^\d+]/g, '');
            var checks = [
                ['nama', f.nama.value.trim().length >= 3, 'Masukkan nama lengkap.'],
                ['telepon', /^(\+?62|0)8\d{7,12}$/.test(phone), 'Masukkan nomor telepon yang valid.'],
                ['email', !f.email.value || /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(f.email.value), 'Format email belum benar.'],
                ['layanan', !!f.layanan.value, 'Pilih layanan.'],
                ['tanggal', !!f.tanggal.value && (!f.tanggal.min || f.tanggal.value >= f.tanggal.min), 'Pilih tanggal hari ini atau setelahnya.'],
                ['jam', !!f.jam.value, 'Pilih jam.'],
                ['setuju', f.setuju.checked, 'Setujui kebijakan untuk melanjutkan.']
            ];
            var first = null;
            checks.forEach(function (c) { setErr(c[0], c[1] ? '' : c[2]); if (!c[1]) { ok = false; if (!first) first = f[c[0]]; } });
            if (!ok) { if (status) status.textContent = 'Periksa kembali data yang ditandai.'; if (first && first.focus) first.focus(); return; }

            var msg = [
                'Halo ' + form.dataset.clinic + ', saya ingin booking appointment.',
                '', 'Nama: ' + f.nama.value.trim(), 'Telepon: ' + f.telepon.value.trim(),
                'Email: ' + (f.email.value.trim() || '-'),
                'Layanan: ' + label(f.layanan), 'Dokter/Staff: ' + (f.dokter.value ? label(f.dokter) : 'Siapa saja yang tersedia'),
                'Tanggal: ' + f.tanggal.value, 'Jam: ' + f.jam.value,
                'Catatan: ' + (f.catatan.value.trim() || '-')
            ].join('\n');
            var url = 'https://wa.me/' + form.dataset.wa + '?text=' + encodeURIComponent(msg);
            if (status) status.textContent = 'Membuka WhatsApp untuk mengirim booking Anda...';
            window.open(url, '_blank', 'noopener');
        });
        form.addEventListener('input', function (e) { if (e.target.name) setErr(e.target.name, ''); });
    }

    /* ---------- AI Beauty Assistant (rule-based, statis) ---------- */
    function initAssistant() {
        var toggle = $('#rgAiToggle'), panel = $('#rgAssistant'), dataEl = $('#rgAiData');
        if (!toggle || !panel || !dataEl) return;
        var data; try { data = JSON.parse(dataEl.textContent); } catch (e) { return; }
        var log = $('#rgAiLog'), body = $('.rg-assistant__body', panel), form = $('#rgAiForm'), input = $('#rgAiInput');
        var busy = false;

        function setOpen(open) {
            panel.hidden = !open;
            toggle.setAttribute('aria-expanded', open ? 'true' : 'false');
            if (open) setTimeout(function () { input.focus(); }, 60); else toggle.focus();
        }
        toggle.addEventListener('click', function () { setOpen(panel.hidden); });
        $('[data-rg-close]', panel).addEventListener('click', function () { setOpen(false); });
        document.addEventListener('keydown', function (e) { if (e.key === 'Escape' && !panel.hidden) setOpen(false); });

        function add(text, who, link) {
            var d = document.createElement('div');
            d.className = 'rg-msg rg-msg--' + who;
            d.textContent = text;
            if (link) { var a = document.createElement('a'); a.href = link.url; a.textContent = link.label; if (/^https?:/.test(link.url) && link.url.indexOf(location.host) < 0) { a.target = '_blank'; a.rel = 'noopener'; } d.appendChild(document.createElement('br')); d.appendChild(a); }
            log.appendChild(d); body.scrollTop = body.scrollHeight; return d;
        }
        function typing() {
            var d = document.createElement('div'); d.className = 'rg-msg rg-msg--bot rg-msg--typing';
            d.setAttribute('aria-label', 'Mengetik'); d.innerHTML = '<span></span><span></span><span></span>';
            log.appendChild(d); body.scrollTop = body.scrollHeight; return d;
        }
        function detect(text) {
            var t = text.toLowerCase(), best = null, score = 0;
            Object.keys(data.keywords).forEach(function (k) {
                var s = data.keywords[k].reduce(function (n, w) { return n + (t.indexOf(w) > -1 ? 1 : 0); }, 0);
                if (s > score) { score = s; best = k; }
            });
            return best;
        }
        function reply(key) {
            var ans = key && data.answers[key];
            return ans ? { text: ans, link: data.links[key] } : { text: data.fallback, link: { label: 'Chat WhatsApp', url: data.wa } };
        }
        function ask(label, key) {
            if (busy) return;
            busy = true; panel.classList.add('has-chat');
            add(label, 'user');
            var t = typing();
            setTimeout(function () {
                t.remove();
                var r = (/^(halo|hai|hi|selamat)/i.test(label) && !key) ? { text: 'Halo! Senang bisa membantu. Pilih topik di atas atau tulis pertanyaan Anda.' } : reply(key);
                add(r.text, 'bot', r.link); busy = false;
            }, reduceMotion ? 0 : 650);
        }

        $$('[data-ai-key]', panel).forEach(function (b) {
            b.addEventListener('click', function () { ask(b.getAttribute('aria-label') || b.textContent.trim(), b.getAttribute('data-ai-key')); });
        });
        form.addEventListener('submit', function (e) {
            e.preventDefault();
            var v = input.value.trim(); if (!v) return;
            input.value = '';
            ask(v, detect(v));
        });
    }

    /* ---------- Reveal ringan: hanya blok di bawah lipatan, sekali jalan ---------- */
    function initReveal() {
        if (reduceMotion || !('IntersectionObserver' in window)) return;
        var io = new IntersectionObserver(function (entries) {
            entries.forEach(function (en) { if (en.isIntersecting) { en.target.classList.add('is-in'); io.unobserve(en.target); } });
        }, { threshold: .12 });
        $$('.rg-row, .rg-policy-grid, .rg-svc-full, .rg-doc-full').forEach(function (el) {
            if (el.getBoundingClientRect().top > window.innerHeight) { el.classList.add('rg-reveal'); io.observe(el); }
        });
    }

    function init() {
        initHeader(); initToggles(); initSiteSearch(); initAccordion(); initFilters();
        initToc(); initBooking(); initAssistant(); initReveal();
    }
    if (document.readyState === 'loading') document.addEventListener('DOMContentLoaded', init); else init();
})();
