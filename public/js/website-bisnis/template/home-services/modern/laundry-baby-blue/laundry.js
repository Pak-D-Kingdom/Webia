/*!
 * BlueLaundry — template "laundry-baby-blue" (home-services / modern)
 * laundry.js — interaksi front-end statis (tanpa backend)
 * Modul: header & menu mobile · tab harga · form inquiry → WhatsApp ·
 *        AI chatbot FAQ · badge jam buka · estimasi selesai · cek area
 */
(function () {
    'use strict';

    var CFG = window.BLUELAUNDRY || {};
    var doc = document;
    var $  = function (s, r) { return (r || doc).querySelector(s); };
    var $$ = function (s, r) { return Array.prototype.slice.call((r || doc).querySelectorAll(s)); };
    var reduceMotion = !!(window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches);

    /* ------------------------------------------------------------------ *
     * Util
     * ------------------------------------------------------------------ */
    var toastTimer;
    function toast(msg, ms) {
        var el = $('#lbToast');
        if (!el) { return; }
        el.textContent = msg;
        el.hidden = false;
        el.classList.add('is-show');
        clearTimeout(toastTimer);
        toastTimer = setTimeout(function () {
            el.classList.remove('is-show');
            setTimeout(function () { el.hidden = true; }, 250);
        }, ms || 3200);
    }

    function waLink(text) {
        return 'https://wa.me/' + (CFG.whatsapp || '') + '?text=' + encodeURIComponent(text);
    }

    function pad(n) { return (n < 10 ? '0' : '') + n; }

    /* ------------------------------------------------------------------ *
     * 1. Header (bayangan saat scroll) + menu mobile
     * ------------------------------------------------------------------ */
    function initHeader() {
        var header = $('[data-lb-header]');
        var toggle = $('[data-lb-nav-toggle]');
        var nav = $('[data-lb-nav]');
        var backdrop = $('[data-lb-nav-backdrop]');
        if (!header || !toggle || !nav) { return; }

        var desktop = window.matchMedia('(min-width: 1300px)');

        function onScroll() { header.classList.toggle('is-scrolled', window.scrollY > 6); }
        onScroll();
        window.addEventListener('scroll', onScroll, { passive: true });

        function setOpen(open) {
            nav.classList.toggle('is-open', open);
            toggle.classList.toggle('is-open', open);
            toggle.setAttribute('aria-expanded', String(open));
            toggle.setAttribute('aria-label', open ? 'Tutup menu' : 'Buka menu');
            doc.documentElement.classList.toggle('lb-lock', open);
            if (backdrop) { backdrop.hidden = !open; }
        }

        toggle.addEventListener('click', function () { setOpen(!nav.classList.contains('is-open')); });
        if (backdrop) { backdrop.addEventListener('click', function () { setOpen(false); }); }
        nav.addEventListener('click', function (e) { if (e.target.closest('a')) { setOpen(false); } });
        doc.addEventListener('keydown', function (e) {
            if (e.key === 'Escape' && nav.classList.contains('is-open')) { setOpen(false); toggle.focus(); }
        });
        var onMq = function () { if (desktop.matches) { setOpen(false); } };
        if (desktop.addEventListener) { desktop.addEventListener('change', onMq); } else if (desktop.addListener) { desktop.addListener(onMq); }
    }

    /* ------------------------------------------------------------------ *
     * 2. Tab harga (Berdasarkan Item / Berdasarkan Kg) — WAI-ARIA tabs
     * ------------------------------------------------------------------ */
    function initTabs() {
        $$('[data-lb-tabs]').forEach(function (root) {
            var tabs = $$('[role="tab"]', root);
            if (!tabs.length) { return; }

            function select(tab, focus) {
                tabs.forEach(function (t) {
                    var on = t === tab;
                    t.classList.toggle('is-active', on);
                    t.setAttribute('aria-selected', String(on));
                    t.tabIndex = on ? 0 : -1;
                    var panel = doc.getElementById(t.getAttribute('aria-controls'));
                    if (panel) { panel.hidden = !on; }
                });
                if (focus) { tab.focus(); }
            }

            tabs.forEach(function (tab, i) {
                tab.addEventListener('click', function () { select(tab); });
                tab.addEventListener('keydown', function (e) {
                    var next = null;
                    if (e.key === 'ArrowRight') { next = tabs[(i + 1) % tabs.length]; }
                    else if (e.key === 'ArrowLeft') { next = tabs[(i - 1 + tabs.length) % tabs.length]; }
                    else if (e.key === 'Home') { next = tabs[0]; }
                    else if (e.key === 'End') { next = tabs[tabs.length - 1]; }
                    if (next) { e.preventDefault(); select(next, true); }
                });
            });
        });
    }

    /* ------------------------------------------------------------------ *
     * 3. Form Order Inquiry → dibuka di WhatsApp
     * ------------------------------------------------------------------ */
    function validPhone(v) {
        var digits = String(v || '').replace(/\D/g, '');
        return digits.length >= 9 && digits.length <= 15;
    }

    function formatWhen(value) {
        if (!value) { return ''; }
        var d = new Date(value);
        if (isNaN(d.getTime())) { return value; }
        try {
            return new Intl.DateTimeFormat('id-ID', { weekday: 'long', day: 'numeric', month: 'long', year: 'numeric', hour: '2-digit', minute: '2-digit' }).format(d) + ' WIB';
        } catch (e) { return value; }
    }

    function initInquiry() {
        var params = new URLSearchParams(window.location.search);
        var preset = params.get('layanan');

        $$('form[data-lb-inquiry]').forEach(function (form) {
            var msg = $('[data-lb-form-msg]', form);
            var f = form.elements;

            if (preset && f.layanan) {
                Array.prototype.some.call(f.layanan.options, function (o) {
                    if (o.value === preset) { f.layanan.value = preset; return true; }
                    return false;
                });
            }

            function setError(name, text) {
                var el = $('[data-err-for="' + name + '"]', form);
                var field = f[name];
                if (el) { el.textContent = text || ''; el.hidden = !text; }
                if (field) { field.setAttribute('aria-invalid', text ? 'true' : 'false'); }
                if (field && field.closest) {
                    var wrap = field.closest('.lb-field');
                    if (wrap) { wrap.classList.toggle('has-error', !!text); }
                }
            }

            ['nama', 'wa', 'layanan'].forEach(function (n) {
                if (f[n]) { f[n].addEventListener('input', function () { setError(n, ''); }); f[n].addEventListener('change', function () { setError(n, ''); }); }
            });

            form.addEventListener('submit', function (e) {
                e.preventDefault();
                var data = {
                    nama: (f.nama.value || '').trim(),
                    wa: (f.wa.value || '').trim(),
                    layanan: f.layanan ? f.layanan.value : '',
                    area: f.area ? f.area.value : '',
                    alamat: f.alamat ? (f.alamat.value || '').trim() : '',
                    jadwal: f.jadwal ? f.jadwal.value : '',
                    catatan: f.catatan ? (f.catatan.value || '').trim() : ''
                };

                var first = null;
                function bad(name, text) { setError(name, text); if (!first) { first = f[name]; } }
                setError('nama', ''); setError('wa', ''); setError('layanan', '');
                if (data.nama.length < 2) { bad('nama', 'Nama lengkap wajib diisi.'); }
                if (!validPhone(data.wa)) { bad('wa', 'Masukkan nomor WhatsApp yang valid (9–15 angka).'); }
                if (!data.layanan) { bad('layanan', 'Pilih layanan terlebih dahulu.'); }
                if (first) { first.focus(); return; }

                var lines = [
                    'Halo BlueLaundry, saya ingin order / konsultasi laundry.',
                    '',
                    'Nama: ' + data.nama,
                    'No. WhatsApp: ' + data.wa,
                    'Layanan: ' + data.layanan
                ];
                if (data.area) { lines.push('Area: ' + data.area); }
                if (data.alamat) { lines.push('Alamat jemput: ' + data.alamat); }
                if (data.jadwal) { lines.push('Jadwal jemput: ' + formatWhen(data.jadwal)); }
                if (data.catatan) { lines.push('Catatan: ' + data.catatan); }

                var url = waLink(lines.join('\n'));
                var win = window.open(url, '_blank', 'noopener');
                if (!win) { window.location.href = url; }

                if (msg) {
                    msg.textContent = 'Terima kasih, ' + data.nama + '! Inquiry Anda dibuka di WhatsApp — tinggal tekan kirim.';
                    msg.hidden = false;
                }
                toast('Inquiry dibuka di WhatsApp.');
                form.reset();
                if (preset && f.layanan) { f.layanan.value = ''; }
            });
        });
    }

    /* ------------------------------------------------------------------ *
     * 4. AI Chatbot (FAQ harga & proses laundry) — tanpa backend
     * ------------------------------------------------------------------ */
    var FAQ = CFG.faq || [];
    var FAQ_BY_ID = {};
    FAQ.forEach(function (f) { FAQ_BY_ID[f.id] = f; });

    function norm(s) {
        return String(s || '').toLowerCase().normalize('NFD').replace(/[\u0300-\u036f]/g, '')
            .replace(/[^a-z0-9\s-]/g, ' ').replace(/\s+/g, ' ').trim();
    }

    function score(text, faq) {
        var t = ' ' + norm(text) + ' ';
        var s = 0;
        if (norm(faq.q) === norm(text)) { return 100; }
        faq.keywords.forEach(function (k) {
            var nk = norm(k);
            if (nk && t.indexOf(nk) > -1) { s += nk.indexOf(' ') > -1 ? 3 : (nk.length >= 5 ? 2 : 1); }
        });
        return s;
    }

    function answerFor(text) {
        var best = null, bestScore = 0;
        FAQ.forEach(function (f) {
            var sc = score(text, f);
            if (sc > bestScore) { best = f; bestScore = sc; }
        });
        if (best && bestScore >= 2) { return { text: best.a, cta: best.cta }; }

        var n = norm(text);
        if (/(^| )(halo|hai|hi|hello|selamat (pagi|siang|sore|malam)|assalamualaikum|permisi)( |$)/.test(n)) {
            return { text: 'Halo! Senang bisa membantu. Mau tanya soal harga, lama proses, atau antar-jemput laundry?' };
        }
        if (/terima kasih|makasih|thanks|thx|trims/.test(n)) {
            return { text: 'Sama-sama! Kalau ada pertanyaan lain seputar laundry, tanya saja ya.' };
        }
        return {
            text: (CFG.chat && CFG.chat.fallback) || 'Maaf, saya belum menemukan jawabannya.',
            cta: { label: 'Chat WhatsApp', url: waLink('Halo BlueLaundry, saya ingin bertanya: ' + text), external: true }
        };
    }

    function createChat(root) {
        var log = $('[data-lb-chat-log]', root);
        var chips = $('[data-lb-chat-chips]', root);
        var form = $('[data-lb-chat-form]', root);
        var input = form ? form.elements.q : null;
        var started = false, busy = false, queue = [];

        function scroll() { log.scrollTop = log.scrollHeight; }

        function addMsg(role, text, cta) {
            var row = doc.createElement('div');
            row.className = 'lb-msg lb-msg--' + role;
            if (role === 'bot') {
                var av = doc.createElement('span');
                av.className = 'lb-msg__avatar';
                var img = doc.createElement('img');
                img.src = CFG.robot || ''; img.alt = ''; img.width = 28; img.height = 18;
                av.appendChild(img);
                row.appendChild(av);
            }
            var bubble = doc.createElement('div');
            bubble.className = 'lb-msg__bubble';
            var p = doc.createElement('p');
            p.textContent = text;
            bubble.appendChild(p);
            if (cta && cta.url) {
                var a = doc.createElement('a');
                a.className = 'lb-msg__cta';
                a.href = cta.url;
                a.textContent = cta.label;
                if (cta.external) { a.target = '_blank'; a.rel = 'noopener'; }
                bubble.appendChild(a);
            }
            row.appendChild(bubble);
            log.appendChild(row);
            scroll();
            return row;
        }

        function typing() {
            var row = doc.createElement('div');
            row.className = 'lb-msg lb-msg--bot lb-msg--typing';
            row.innerHTML = '<span class="lb-msg__avatar"></span><div class="lb-msg__bubble" aria-label="Sedang mengetik"><i></i><i></i><i></i></div>';
            var img = doc.createElement('img');
            img.src = CFG.robot || ''; img.alt = ''; img.width = 28; img.height = 18;
            row.firstChild.appendChild(img);
            log.appendChild(row);
            scroll();
            return row;
        }

        function next() {
            if (busy || !queue.length) { return; }
            busy = true;
            var q = queue.shift();
            var t = typing();
            setTimeout(function () {
                t.remove();
                var r = answerFor(q);
                addMsg('bot', r.text, r.cta);
                busy = false;
                next();
            }, reduceMotion ? 0 : 450 + Math.random() * 350);
        }

        function ask(text) {
            text = String(text || '').trim();
            if (!text) { return; }
            start();
            addMsg('user', text);
            queue.push(text);
            next();
        }

        function renderChips() {
            if (!chips) { return; }
            chips.innerHTML = '';
            (CFG.chat.quick || []).forEach(function (id) {
                var f = FAQ_BY_ID[id];
                if (!f) { return; }
                var b = doc.createElement('button');
                b.type = 'button';
                b.className = 'lb-qchip lb-qchip--sm';
                b.textContent = f.q;
                b.addEventListener('click', function () { ask(f.q); });
                chips.appendChild(b);
            });
        }

        function start() {
            if (started) { return; }
            started = true;
            addMsg('bot', CFG.chat.greeting);
            renderChips();
        }

        if (form) {
            form.addEventListener('submit', function (e) {
                e.preventDefault();
                var v = input.value;
                input.value = '';
                ask(v);
            });
        }

        return { root: root, ask: ask, start: start, input: input };
    }

    function initChat() {
        var floatEl = $('#lbChat');
        var embedEl = $('[data-lb-chat-embed]');
        var floatChat = floatEl ? createChat(floatEl) : null;
        var embedChat = embedEl ? createChat(embedEl) : null;
        var triggers = $$('[data-lb-chat-open]');

        if (embedChat) { embedChat.start(); }

        function openFloat() {
            if (!floatChat) { return; }
            floatEl.hidden = false;
            requestAnimationFrame(function () { floatEl.classList.add('is-open'); });
            triggers.forEach(function (t) { t.setAttribute('aria-expanded', 'true'); });
            doc.documentElement.classList.add('lb-chat-open');
            floatChat.start();
            setTimeout(function () { if (floatChat.input) { floatChat.input.focus({ preventScroll: true }); } }, 120);
        }

        function closeFloat(returnFocus) {
            if (!floatChat || floatEl.hidden) { return; }
            floatEl.classList.remove('is-open');
            triggers.forEach(function (t) { t.setAttribute('aria-expanded', 'false'); });
            doc.documentElement.classList.remove('lb-chat-open');
            setTimeout(function () { floatEl.hidden = true; }, reduceMotion ? 0 : 220);
            if (returnFocus && triggers[0]) { triggers[0].focus(); }
        }

        triggers.forEach(function (t) {
            t.addEventListener('click', function () { floatEl.hidden ? openFloat() : closeFloat(true); });
        });
        $$('[data-lb-chat-close]').forEach(function (b) { b.addEventListener('click', function () { closeFloat(true); }); });
        doc.addEventListener('keydown', function (e) { if (e.key === 'Escape') { closeFloat(true); } });

        // Pertanyaan cepat / input di kartu beranda → buka chat
        function route(question) {
            if (embedChat) {
                embedChat.ask(question);
                embedEl.scrollIntoView({ behavior: reduceMotion ? 'auto' : 'smooth', block: 'center' });
            } else if (floatChat) {
                openFloat();
                floatChat.ask(question);
            }
        }
        doc.addEventListener('click', function (e) {
            var btn = e.target.closest ? e.target.closest('[data-lb-ask]') : null;
            if (btn) { route(btn.getAttribute('data-lb-ask')); }
        });
        $$('form[data-lb-ask-form]').forEach(function (f) {
            f.addEventListener('submit', function (e) {
                e.preventDefault();
                var v = f.elements.q.value;
                f.elements.q.value = '';
                if (v.trim()) { route(v); } else { openFloat(); }
            });
        });
    }

    /* ------------------------------------------------------------------ *
     * 5. Badge buka/tutup + sorot hari ini (zona WIB)
     * ------------------------------------------------------------------ */
    function nowWIB() {
        try {
            var parts = new Intl.DateTimeFormat('en-GB', { timeZone: 'Asia/Jakarta', weekday: 'short', hour: '2-digit', minute: '2-digit', hourCycle: 'h23' }).formatToParts(new Date());
            var o = {};
            parts.forEach(function (p) { o[p.type] = p.value; });
            var map = { Sun: 0, Mon: 1, Tue: 2, Wed: 3, Thu: 4, Fri: 5, Sat: 6 };
            return { h: parseInt(o.hour, 10) % 24, m: parseInt(o.minute, 10), wd: map[o.weekday] };
        } catch (e) {
            var d = new Date();
            return { h: d.getHours(), m: d.getMinutes(), wd: d.getDay() };
        }
    }

    function toMin(hhmm) { var p = String(hhmm).split(':'); return parseInt(p[0], 10) * 60 + parseInt(p[1], 10); }

    function initHours() {
        var badges = $$('[data-lb-open-badge]');
        var rows = $$('[data-lb-hours-list] [data-day]');
        if (!badges.length && !rows.length) { return; }
        var hrs = CFG.hours || { open: '08:00', close: '20:00' };

        function update() {
            var n = nowWIB();
            var mins = n.h * 60 + n.m;
            var open = mins >= toMin(hrs.open) && mins < toMin(hrs.close);
            badges.forEach(function (b) {
                b.hidden = false;
                b.classList.toggle('is-open', open);
                b.classList.toggle('is-closed', !open);
                b.textContent = open
                    ? 'Buka sekarang · tutup pukul ' + hrs.close + ' WIB'
                    : 'Sedang tutup · buka kembali pukul ' + hrs.open + ' WIB';
            });
            rows.forEach(function (r) { r.classList.toggle('is-today', parseInt(r.getAttribute('data-day'), 10) === n.wd); });
        }
        update();
        setInterval(update, 60000);
    }

    /* ------------------------------------------------------------------ *
     * 6. Kalkulator perkiraan selesai (halaman Estimasi Waktu)
     * ------------------------------------------------------------------ */
    function initEstimator() {
        var root = $('[data-lb-estimator]');
        if (!root) { return; }
        var sel = $('[data-lb-est-option]', root);
        var when = $('[data-lb-est-when]', root);
        var out = $('[data-lb-est-result]', root);

        var d = new Date();
        d.setMinutes(0, 0, 0);
        d.setHours(d.getHours() + 1);
        when.value = d.getFullYear() + '-' + pad(d.getMonth() + 1) + '-' + pad(d.getDate()) + 'T' + pad(d.getHours()) + ':' + pad(d.getMinutes());

        function fmt(date) {
            try {
                return new Intl.DateTimeFormat('id-ID', { weekday: 'long', day: 'numeric', month: 'long', hour: '2-digit', minute: '2-digit' }).format(date);
            } catch (e) { return date.toString(); }
        }

        function calc() {
            var t = (CFG.turnaround || []).filter(function (x) { return x.key === sel.value; })[0];
            var start = new Date(when.value);
            if (!t || isNaN(start.getTime())) { out.textContent = 'Pilih layanan dan waktu untuk melihat perkiraan selesai.'; return; }
            var note = '';
            if (t.key === 'Express' && start.getHours() >= 17) {
                start = new Date(start.getFullYear(), start.getMonth(), start.getDate() + 1, 8, 0, 0);
                note = 'Order Express setelah pukul 17.00 dihitung mulai besok pukul 08:00.';
            }
            var a = new Date(start.getTime() + t.min_h * 3600000);
            var b = new Date(start.getTime() + t.max_h * 3600000);
            out.innerHTML = '';
            var l1 = doc.createElement('span'); l1.textContent = 'Perkiraan selesai';
            var l2 = doc.createElement('strong'); l2.textContent = fmt(a) + ' – ' + fmt(b);
            out.appendChild(l1); out.appendChild(l2);
            if (note) { var l3 = doc.createElement('small'); l3.textContent = note; out.appendChild(l3); }
        }
        sel.addEventListener('change', calc);
        when.addEventListener('input', calc);
        calc();
    }

    /* ------------------------------------------------------------------ *
     * 7. Cek jangkauan area (halaman Area Layanan)
     * ------------------------------------------------------------------ */
    function initAreaCheck() {
        var root = $('[data-lb-area-check]');
        if (!root) { return; }
        var sel = $('[data-lb-area-select]', root);
        var out = $('[data-lb-area-result]', root);

        function render() {
            var a = (CFG.areas || []).filter(function (x) { return x.key === sel.value; })[0];
            out.innerHTML = '';
            out.classList.toggle('is-ok', !!a);
            if (!a) { out.textContent = 'Pilih area untuk melihat biaya dan estimasi penjemputan.'; return; }
            var h = doc.createElement('strong'); h.textContent = a.name + ' — tercakup';
            var p = doc.createElement('span'); p.textContent = a.places;
            var m = doc.createElement('small'); m.textContent = a.fee + ' · ' + a.eta;
            out.appendChild(h); out.appendChild(p); out.appendChild(m);
        }
        sel.addEventListener('change', render);
        render();

        // klik kartu area → pilih di pengecek
        $$('.lb-area').forEach(function (card) {
            card.addEventListener('click', function () {
                var key = (card.id || '').replace('area-', '');
                sel.value = key;
                render();
            });
        });
    }

    /* ------------------------------------------------------------------ */
    function init() {
        initHeader();
        initTabs();
        initInquiry();
        initChat();
        initHours();
        initEstimator();
        initAreaCheck();
    }

    if (doc.readyState === 'loading') { doc.addEventListener('DOMContentLoaded', init); } else { init(); }
})();
