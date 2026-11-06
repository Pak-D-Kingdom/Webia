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
     * 1. Header (bayangan saat scroll) + bar navigasi geser (layar kecil)
     * ------------------------------------------------------------------ */
    function initHeader() {
        var header = $('[data-lb-header]');
        if (!header) { return; }

        function onScroll() { header.classList.toggle('is-scrolled', window.scrollY > 6); }
        onScroll();
        window.addEventListener('scroll', onScroll, { passive: true });

        // Bar navigasi bisa digeser: pastikan menu aktif terlihat di tengah.
        var list = $('.lb-nav__list', header);
        var active = list ? $('.is-active', list) : null;
        if (list && active && list.scrollWidth > list.clientWidth) {
            list.scrollLeft = Math.max(0, active.offsetLeft - (list.clientWidth - active.offsetWidth) / 2);
        }
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
                if (f.layanan._lbRefresh) { f.layanan._lbRefresh(); }
            }
            var picks = $$('[data-lb-pick]', form);
            function syncPicks() {
                picks.forEach(function (b) {
                    var on = !!f.layanan && f.layanan.value === b.getAttribute('data-lb-pick');
                    b.classList.toggle('is-active', on);
                    b.setAttribute('aria-pressed', String(on));
                });
            }
            picks.forEach(function (b) {
                b.addEventListener('click', function () {
                    if (!f.layanan) { return; }
                    f.layanan.value = b.getAttribute('data-lb-pick');
                    if (f.layanan._lbRefresh) { f.layanan._lbRefresh(); }
                    f.layanan.dispatchEvent(new Event('change', { bubbles: true }));
                });
            });
            if (f.layanan) { f.layanan.addEventListener('change', syncPicks); }
            syncPicks();
            form.addEventListener('reset', function () {
                setTimeout(function () {
                    Array.prototype.forEach.call(form.elements, function (el) { if (el._lbRefresh) { el._lbRefresh(); } });
                    syncPicks();
                }, 0);
            });

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
                if (first) { (first._lbFocus || first).focus(); return; }

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
        var sub = $('[data-lb-hours-sub]');
        var box = $('[data-lb-hours-status]');
        if (!badges.length && !rows.length && !sub) { return; }

        function dur(m) {
            var h = Math.floor(m / 60), mm = m % 60;
            return (h ? h + ' jam' : '') + (h && mm ? ' ' : '') + (mm || !h ? mm + ' menit' : '');
        }
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
            if (box) { box.classList.toggle('is-open', open); box.classList.toggle('is-closed', !open); }
            if (sub) {
                var oM = toMin(hrs.open), cM = toMin(hrs.close);
                if (open) { sub.textContent = 'Tutup pukul ' + hrs.close + ' WIB · ' + dur(cM - mins) + ' lagi'; }
                else if (mins < oM) { sub.textContent = 'Buka hari ini pukul ' + hrs.open + ' WIB · ' + dur(oM - mins) + ' lagi'; }
                else { sub.textContent = 'Buka kembali besok pukul ' + hrs.open + ' WIB'; }
            }
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

        when.value = toLocalValue(nextAvailable());
        if (when._lbRefresh) { when._lbRefresh(); }

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
                if (sel._lbRefresh) { sel._lbRefresh(); }
                render();
            });
        });
    }


    /* ------------------------------------------------------------------ *
     * 7b. Komponen: dropdown kustom + pemilih tanggal & jam
     *     <select> / <input type="datetime-local"> asli tetap ada (tersembunyi)
     *     sehingga nilai form, validasi, dan fallback tanpa JS tetap bekerja.
     * ------------------------------------------------------------------ */
    var MONTHS = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
    var MONTHS_S = ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'];
    var DAYS_S = ['Min', 'Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab'];
    var uidSeq = 0;
    function uid(p) { uidSeq += 1; return 'lb' + p + uidSeq; }

    var current = null; // popover yang sedang terbuka
    function closePopover() { if (current) { var c = current; current = null; c.close(); } }

    function svgIcon(name, cls) {
        var s2 = doc.createElementNS('http://www.w3.org/2000/svg', 'svg');
        s2.setAttribute('class', 'lb-i' + (cls ? ' ' + cls : ''));
        s2.setAttribute('aria-hidden', 'true');
        var u = doc.createElementNS('http://www.w3.org/2000/svg', 'use');
        u.setAttribute('href', '#i-' + name);
        s2.appendChild(u);
        return s2;
    }

    /* Membuka elemen `pop` (dipindah ke <body>) di dekat `anchor`. Di layar kecil tampil sebagai lembar bawah. */
    function openPopover(cfg) {
        closePopover();
        var pop = cfg.el, anchor = cfg.anchor;
        var mq = window.matchMedia('(max-width: 559.98px)');
        var backdrop = doc.createElement('div');
        backdrop.className = 'lb-pop-backdrop';
        doc.body.appendChild(backdrop);
        doc.body.appendChild(pop);
        pop.hidden = false;

        function position() {
            if (mq.matches) { pop.style.left = pop.style.top = pop.style.width = pop.style.minWidth = pop.style.maxHeight = ''; return; }
            var r = anchor.getBoundingClientRect();
            var vw = doc.documentElement.clientWidth, vh = window.innerHeight;
            pop.style.maxHeight = '';
            pop.style.width = cfg.width ? Math.min(cfg.width, vw - 16) + 'px' : '';
            pop.style.minWidth = cfg.width ? '' : Math.max(r.width, cfg.minWidth || 0) + 'px';
            var pw = pop.offsetWidth, ph = pop.offsetHeight;
            var below = vh - r.bottom - 14, above = r.top - 14;
            var openUp = ph > below && above > below;
            var maxH = Math.max(180, openUp ? above : below);
            var h = Math.min(ph, maxH);
            var top = openUp ? Math.max(8, r.top - 6 - h) : r.bottom + 6;
            var left = Math.min(Math.max(8, r.left), Math.max(8, vw - pw - 8));
            pop.style.left = left + 'px';
            pop.style.top = top + 'px';
            pop.style.maxHeight = maxH + 'px';
            pop.classList.toggle('is-up', openUp);
        }

        function onDown(e) { if (!pop.contains(e.target) && !anchor.contains(e.target)) { closePopover(); } }
        function onKey(e) { if (e.key === 'Escape') { e.stopPropagation(); closePopover(); if (cfg.focusBack) { cfg.focusBack.focus(); } } }
        function onMove() { position(); }
        doc.addEventListener('pointerdown', onDown, true);
        doc.addEventListener('keydown', onKey, true);
        window.addEventListener('resize', onMove);
        window.addEventListener('scroll', onMove, true);
        backdrop.addEventListener('click', function () { closePopover(); });
        doc.documentElement.classList.toggle('lb-pop-open', mq.matches);

        position();
        requestAnimationFrame(function () { pop.classList.add('is-open'); backdrop.classList.add('is-open'); });

        current = {
            close: function () {
                doc.removeEventListener('pointerdown', onDown, true);
                doc.removeEventListener('keydown', onKey, true);
                window.removeEventListener('resize', onMove);
                window.removeEventListener('scroll', onMove, true);
                pop.classList.remove('is-open');
                pop.hidden = true;
                if (pop.parentNode) { pop.parentNode.removeChild(pop); }
                if (backdrop.parentNode) { backdrop.parentNode.removeChild(backdrop); }
                doc.documentElement.classList.remove('lb-pop-open');
                if (cfg.onClose) { cfg.onClose(); }
            }
        };
        return current;
    }

    function liftCard(el, on) {
        var card = el.closest ? el.closest('.lb-card') : null;
        if (card) { card.classList.toggle('lb-card--lift', on); }
    }

    /* ----- Dropdown ----- */
    function enhanceSelect(sel) {
        if (sel._lbDd) { return; }
        var field = sel.closest ? sel.closest('.lb-field') : null;
        if (!field) { return; }
        sel._lbDd = true;
        field.classList.add('lb-field--dd');
        sel.classList.add('lb-native');
        sel.tabIndex = -1;
        sel.setAttribute('aria-hidden', 'true');

        var lab = sel.id ? doc.querySelector('label[for="' + sel.id + '"]') : null;
        var btn = doc.createElement('button');
        btn.type = 'button';
        btn.className = 'lb-dd__btn';
        btn.setAttribute('aria-haspopup', 'listbox');
        btn.setAttribute('aria-expanded', 'false');
        var txt = doc.createElement('span');
        txt.className = 'lb-dd__label';
        txt.id = uid('ddt');
        btn.appendChild(txt);
        if (lab) { if (!lab.id) { lab.id = uid('ddl'); } btn.setAttribute('aria-labelledby', lab.id + ' ' + txt.id); lab.addEventListener('click', function () { btn.focus(); }); }
        sel.insertAdjacentElement('afterend', btn);

        var list = doc.createElement('ul');
        list.className = 'lb-pop lb-dd__list';
        list.id = uid('ddlist');
        list.setAttribute('role', 'listbox');
        list.hidden = true;
        if (lab) { list.setAttribute('aria-labelledby', lab.id); }
        btn.setAttribute('aria-controls', list.id);

        function sync() {
            var o = sel.options[sel.selectedIndex];
            txt.textContent = o ? o.text : '';
            txt.classList.toggle('is-placeholder', !sel.value);
        }
        sel._lbRefresh = sync;
        sel._lbFocus = btn;
        sync();

        function build() {
            list.innerHTML = '';
            Array.prototype.forEach.call(sel.options, function (o, i) {
                var li = doc.createElement('li');
                li.className = 'lb-dd__opt' + (o.value === '' ? ' is-placeholder' : '');
                li.setAttribute('role', 'option');
                li.tabIndex = -1;
                li.setAttribute('data-i', String(i));
                li.setAttribute('aria-selected', String(i === sel.selectedIndex));
                var t = doc.createElement('span');
                t.textContent = o.text;
                li.appendChild(t);
                li.appendChild(svgIcon('check', 'lb-dd__tick'));
                list.appendChild(li);
            });
        }

        function opts() { return Array.prototype.slice.call(list.querySelectorAll('.lb-dd__opt')); }

        function choose(i) {
            sel.selectedIndex = i;
            sel.dispatchEvent(new Event('input', { bubbles: true }));
            sel.dispatchEvent(new Event('change', { bubbles: true }));
            sync();
            closePopover();
            btn.focus();
        }

        function open() {
            build();
            field.classList.add('is-open');
            btn.setAttribute('aria-expanded', 'true');
            liftCard(field, true);
            openPopover({
                anchor: field, el: list, minWidth: 220, focusBack: btn,
                onClose: function () { field.classList.remove('is-open'); btn.setAttribute('aria-expanded', 'false'); liftCard(field, false); }
            });
            var items = opts();
            var cur = items[sel.selectedIndex] || items[0];
            if (cur) { cur.focus({ preventScroll: true }); cur.scrollIntoView({ block: 'nearest' }); }
        }

        btn.addEventListener('click', function () { if (current && field.classList.contains('is-open')) { closePopover(); } else { open(); } });
        btn.addEventListener('keydown', function (e) {
            if (e.key === 'ArrowDown' || e.key === 'ArrowUp' || e.key === 'Enter' || e.key === ' ') { e.preventDefault(); open(); }
        });

        var typed = '', typedTimer;
        list.addEventListener('click', function (e) {
            var li = e.target.closest ? e.target.closest('.lb-dd__opt') : null;
            if (li) { choose(parseInt(li.getAttribute('data-i'), 10)); }
        });
        list.addEventListener('keydown', function (e) {
            var items = opts();
            var idx = items.indexOf(doc.activeElement);
            if (e.key === 'ArrowDown') { e.preventDefault(); (items[Math.min(items.length - 1, idx + 1)] || items[0]).focus(); }
            else if (e.key === 'ArrowUp') { e.preventDefault(); (items[Math.max(0, idx - 1)] || items[0]).focus(); }
            else if (e.key === 'Home') { e.preventDefault(); items[0].focus(); }
            else if (e.key === 'End') { e.preventDefault(); items[items.length - 1].focus(); }
            else if (e.key === 'Enter' || e.key === ' ') { e.preventDefault(); if (idx > -1) { choose(idx); } }
            else if (e.key === 'Tab') { closePopover(); }
            else if (e.key.length === 1 && /\S/.test(e.key)) {
                typed += e.key.toLowerCase();
                clearTimeout(typedTimer);
                typedTimer = setTimeout(function () { typed = ''; }, 700);
                var hit = items.filter(function (li) { return li.textContent.toLowerCase().indexOf(typed) === 0; })[0];
                if (hit) { hit.focus(); }
            }
        });
        list.addEventListener('mousemove', function (e) {
            var li = e.target.closest ? e.target.closest('.lb-dd__opt') : null;
            if (li && li !== doc.activeElement) { li.focus({ preventScroll: true }); }
        });
    }

    /* ----- Tanggal & jam ----- */
    function pad2(n) { return (n < 10 ? '0' : '') + n; }
    function slotList() {
        var hrs = (CFG.hours || { open: '08:00', close: '20:00' });
        var out = [], t = toMin(hrs.open), end = toMin(hrs.close) - 30;
        for (; t <= end; t += 30) { out.push(pad2(Math.floor(t / 60)) + ':' + pad2(t % 60)); }
        return out;
    }
    function dayStart(d) { return new Date(d.getFullYear(), d.getMonth(), d.getDate()); }
    function sameDay(a, b) { return a.getFullYear() === b.getFullYear() && a.getMonth() === b.getMonth() && a.getDate() === b.getDate(); }
    function slotDate(day, hhmm) { var p = hhmm.split(':'); return new Date(day.getFullYear(), day.getMonth(), day.getDate(), parseInt(p[0], 10), parseInt(p[1], 10)); }
    function slotFree(day, hhmm) { return slotDate(day, hhmm).getTime() >= Date.now() + 30 * 60000; }
    function firstFreeSlot(day) { return slotList().filter(function (t) { return slotFree(day, t); })[0] || null; }
    function nextAvailable() {
        var d = dayStart(new Date());
        for (var i = 0; i < 14; i += 1) {
            var day = new Date(d.getFullYear(), d.getMonth(), d.getDate() + i);
            var t = firstFreeSlot(day);
            if (t) { return slotDate(day, t); }
        }
        return new Date();
    }
    function toLocalValue(d) { return d.getFullYear() + '-' + pad2(d.getMonth() + 1) + '-' + pad2(d.getDate()) + 'T' + pad2(d.getHours()) + ':' + pad2(d.getMinutes()); }

    function enhanceDateTime(inp) {
        if (inp._lbDt) { return; }
        var field = inp.closest ? inp.closest('.lb-field') : null;
        if (!field) { return; }
        inp._lbDt = true;
        field.classList.add('lb-field--dd');
        inp.classList.add('lb-native');
        inp.tabIndex = -1;
        inp.setAttribute('aria-hidden', 'true');

        var lab = inp.id ? doc.querySelector('label[for="' + inp.id + '"]') : null;
        var btn = doc.createElement('button');
        btn.type = 'button';
        btn.className = 'lb-dd__btn';
        btn.setAttribute('aria-haspopup', 'dialog');
        btn.setAttribute('aria-expanded', 'false');
        var txt = doc.createElement('span');
        txt.className = 'lb-dd__label';
        txt.id = uid('dtt');
        btn.appendChild(txt);
        if (lab) { if (!lab.id) { lab.id = uid('dtl'); } btn.setAttribute('aria-labelledby', lab.id + ' ' + txt.id); lab.addEventListener('click', function () { btn.focus(); }); }
        inp.insertAdjacentElement('afterend', btn);
        field.appendChild(svgIcon('chevron', 'lb-field__chev'));

        var placeholder = inp.getAttribute('data-placeholder') || 'Pilih tanggal & jam';
        var selDate = null, selTime = null, viewY, viewM;

        function parse() {
            var m = /^(\d{4})-(\d{2})-(\d{2})T(\d{2}):(\d{2})/.exec(inp.value || '');
            if (!m) { selDate = null; selTime = null; return; }
            selDate = new Date(parseInt(m[1], 10), parseInt(m[2], 10) - 1, parseInt(m[3], 10));
            selTime = m[4] + ':' + m[5];
        }
        function sync() {
            parse();
            if (selDate) {
                txt.textContent = DAYS_S[selDate.getDay()] + ', ' + selDate.getDate() + ' ' + MONTHS_S[selDate.getMonth()] + ' ' + selDate.getFullYear() + ' · ' + selTime + ' WIB';
                txt.classList.remove('is-placeholder');
            } else {
                txt.textContent = placeholder;
                txt.classList.add('is-placeholder');
            }
        }
        inp._lbRefresh = sync;
        inp._lbFocus = btn;
        sync();

        function commit() {
            if (selDate && selTime) {
                inp.value = toLocalValue(slotDate(selDate, selTime));
            } else {
                inp.value = '';
            }
            inp.dispatchEvent(new Event('input', { bubbles: true }));
            inp.dispatchEvent(new Event('change', { bubbles: true }));
            sync();
        }

        function open() {
            parse();
            var today = dayStart(new Date());
            var minDay = firstFreeSlot(today) ? today : new Date(today.getFullYear(), today.getMonth(), today.getDate() + 1);
            var maxDay = new Date(today.getFullYear(), today.getMonth(), today.getDate() + 60);
            var base = selDate || minDay;
            viewY = base.getFullYear(); viewM = base.getMonth();

            var pop = doc.createElement('div');
            pop.className = 'lb-pop lb-dt';
            pop.setAttribute('role', 'dialog');
            pop.setAttribute('aria-label', 'Pilih tanggal dan jam');
            pop.innerHTML =
                '<div class="lb-dt__cal">' +
                '<div class="lb-dt__head"><button type="button" class="lb-dt__nav" data-nav="-1" aria-label="Bulan sebelumnya"></button><strong class="lb-dt__title" aria-live="polite"></strong><button type="button" class="lb-dt__nav" data-nav="1" aria-label="Bulan berikutnya"></button></div>' +
                '<div class="lb-dt__dow" aria-hidden="true"><span>Sen</span><span>Sel</span><span>Rab</span><span>Kam</span><span>Jum</span><span>Sab</span><span>Min</span></div>' +
                '<div class="lb-dt__grid" role="group" aria-label="Tanggal"></div>' +
                '</div>' +
                '<div class="lb-dt__time"><p class="lb-dt__label">Pilih jam <small>(WIB)</small></p><div class="lb-dt__slots" role="group" aria-label="Jam"></div></div>' +
                '<div class="lb-dt__foot"><button type="button" class="lb-dt__clear">Hapus</button><button type="button" class="lb-btn lb-btn--primary lb-btn--sm lb-dt__ok">Selesai</button></div>';

            var title = pop.querySelector('.lb-dt__title');
            var grid = pop.querySelector('.lb-dt__grid');
            var slots = pop.querySelector('.lb-dt__slots');
            var prev = pop.querySelector('[data-nav="-1"]');
            var next = pop.querySelector('[data-nav="1"]');
            prev.appendChild(svgIcon('chevron-r', 'lb-dt__arrow lb-dt__arrow--l'));
            next.appendChild(svgIcon('chevron-r', 'lb-dt__arrow'));

            function renderCal() {
                title.textContent = MONTHS[viewM] + ' ' + viewY;
                grid.innerHTML = '';
                var first = new Date(viewY, viewM, 1);
                var offset = (first.getDay() + 6) % 7;
                var count = new Date(viewY, viewM + 1, 0).getDate();
                for (var i = 0; i < offset; i += 1) { grid.appendChild(doc.createElement('span')); }
                var focusTarget = null;
                for (var d = 1; d <= count; d += 1) {
                    var date = new Date(viewY, viewM, d);
                    var b = doc.createElement('button');
                    b.type = 'button';
                    b.className = 'lb-dt__day';
                    b.textContent = String(d);
                    b.setAttribute('data-d', String(d));
                    var off = date < minDay || date > maxDay;
                    b.disabled = off;
                    if (sameDay(date, today)) { b.classList.add('is-today'); b.setAttribute('aria-label', d + ' ' + MONTHS[viewM] + ' (hari ini)'); }
                    else { b.setAttribute('aria-label', d + ' ' + MONTHS[viewM] + ' ' + viewY); }
                    var sel2 = selDate && sameDay(date, selDate);
                    if (sel2) { b.classList.add('is-selected'); b.setAttribute('aria-pressed', 'true'); }
                    b.tabIndex = -1;
                    if (!off && (sel2 || (!focusTarget && (!selDate || selDate.getMonth() !== viewM || selDate.getFullYear() !== viewY)))) { focusTarget = b; }
                    grid.appendChild(b);
                }
                if (focusTarget) { focusTarget.tabIndex = 0; }
                prev.disabled = new Date(viewY, viewM, 1) <= new Date(minDay.getFullYear(), minDay.getMonth(), 1);
                next.disabled = new Date(viewY, viewM + 1, 1) > maxDay;
            }

            function renderSlots() {
                slots.innerHTML = '';
                slotList().forEach(function (t) {
                    var b = doc.createElement('button');
                    b.type = 'button';
                    b.className = 'lb-dt__slot';
                    b.textContent = t;
                    b.setAttribute('data-t', t);
                    b.disabled = !selDate || !slotFree(selDate, t);
                    if (selTime === t && selDate) { b.classList.add('is-selected'); b.setAttribute('aria-pressed', 'true'); }
                    slots.appendChild(b);
                });
                if (!selDate) {
                    var hint = doc.createElement('p');
                    hint.className = 'lb-dt__hint';
                    hint.textContent = 'Pilih tanggal terlebih dahulu.';
                    slots.appendChild(hint);
                }
            }

            pop.addEventListener('click', function (e) {
                var t = e.target.closest ? e.target.closest('button') : null;
                if (!t || t.disabled) { return; }
                if (t.hasAttribute('data-nav')) {
                    viewM += parseInt(t.getAttribute('data-nav'), 10);
                    if (viewM < 0) { viewM = 11; viewY -= 1; } else if (viewM > 11) { viewM = 0; viewY += 1; }
                    renderCal();
                } else if (t.classList.contains('lb-dt__day')) {
                    selDate = new Date(viewY, viewM, parseInt(t.getAttribute('data-d'), 10));
                    if (selTime && !slotFree(selDate, selTime)) { selTime = null; }
                    if (!selTime) { selTime = firstFreeSlot(selDate); }
                    renderCal(); renderSlots();
                    var ds = grid.querySelector('.is-selected'); if (ds) { ds.tabIndex = 0; }
                    commit();
                } else if (t.classList.contains('lb-dt__slot')) {
                    selTime = t.getAttribute('data-t');
                    renderSlots();
                    commit();
                    closePopover();
                    btn.focus();
                } else if (t.classList.contains('lb-dt__clear')) {
                    selDate = null; selTime = null;
                    commit();
                    closePopover();
                    btn.focus();
                } else if (t.classList.contains('lb-dt__ok')) {
                    closePopover();
                    btn.focus();
                }
            });
            // navigasi keyboard pada grid tanggal
            grid.addEventListener('keydown', function (e) {
                var cur = e.target.closest ? e.target.closest('.lb-dt__day') : null;
                if (!cur) { return; }
                var days = Array.prototype.slice.call(grid.querySelectorAll('.lb-dt__day:not(:disabled)'));
                var i = days.indexOf(cur), n = null;
                if (e.key === 'ArrowRight') { n = days[i + 1]; }
                else if (e.key === 'ArrowLeft') { n = days[i - 1]; }
                else if (e.key === 'ArrowDown') { n = days[i + 7]; }
                else if (e.key === 'ArrowUp') { n = days[i - 7]; }
                else if (e.key === 'Home') { n = days[0]; }
                else if (e.key === 'End') { n = days[days.length - 1]; }
                if (n) { e.preventDefault(); cur.tabIndex = -1; n.tabIndex = 0; n.focus(); }
            });

            renderCal(); renderSlots();
            field.classList.add('is-open');
            btn.setAttribute('aria-expanded', 'true');
            liftCard(field, true);
            openPopover({
                anchor: field, el: pop, width: 560, focusBack: btn,
                onClose: function () { field.classList.remove('is-open'); btn.setAttribute('aria-expanded', 'false'); liftCard(field, false); }
            });
            var f0 = grid.querySelector('[tabindex="0"]') || grid.querySelector('.lb-dt__day:not(:disabled)');
            if (f0) { f0.focus({ preventScroll: true }); }
        }

        btn.addEventListener('click', function () { if (current && field.classList.contains('is-open')) { closePopover(); } else { open(); } });
        btn.addEventListener('keydown', function (e) { if (e.key === 'ArrowDown' || e.key === 'Enter' || e.key === ' ') { e.preventDefault(); open(); } });
    }

    function initWidgets() {
        $$('.lb-field--select select').forEach(enhanceSelect);
        $$('.lb-field input[type="datetime-local"]').forEach(enhanceDateTime);
    }

    /* ------------------------------------------------------------------ */
    function init() {
        initHeader();
        initTabs();
        initWidgets();
        initInquiry();
        initChat();
        initHours();
        initEstimator();
        initAreaCheck();
    }

    if (doc.readyState === 'loading') { doc.addEventListener('DOMContentLoaded', init); } else { init(); }
})();
