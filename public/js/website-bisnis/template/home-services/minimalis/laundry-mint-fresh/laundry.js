/* ==========================================================================
   FreshWash — Template Laundry · Minimalist · Mint Fresh
   Vanilla JS (tanpa dependensi). Modul: nav, tabs, jam operasional,
   cek area, form → WhatsApp, chatbot FAQ (harga & proses laundry).
   ========================================================================== */
(function () {
    'use strict';

    var $ = function (s, ctx) { return (ctx || document).querySelector(s); };
    var $$ = function (s, ctx) { return Array.prototype.slice.call((ctx || document).querySelectorAll(s)); };
    var reduceMotion = window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches;
    var brand = ($('.lw-brand__name') || {}).textContent || 'FreshWash';

    /* ---------- 1. NAVBAR ---------- */
    function initNav() {
        var nav = $('[data-lw-nav]');
        if (!nav) return;
        var toggle = $('[data-lw-menu-toggle]', nav);
        var more = $('[data-lw-more]', nav);
        var moreBtn = more && $('button', more);

        function setMenu(open) {
            nav.classList.toggle('is-open', open);
            toggle.setAttribute('aria-expanded', String(open));
        }
        function setMore(open) {
            if (!more) return;
            more.classList.toggle('is-open', open);
            moreBtn.setAttribute('aria-expanded', String(open));
        }

        toggle.addEventListener('click', function () { setMenu(!nav.classList.contains('is-open')); });
        if (moreBtn) moreBtn.addEventListener('click', function () { setMore(!more.classList.contains('is-open')); });

        document.addEventListener('click', function (e) {
            if (more && !more.contains(e.target)) setMore(false);
            if (!nav.contains(e.target)) setMenu(false);
        });
        document.addEventListener('keydown', function (e) {
            if (e.key === 'Escape') { setMore(false); setMenu(false); }
        });
        $$('a', nav).forEach(function (a) { a.addEventListener('click', function () { setMenu(false); }); });

        var onScroll = function () { nav.classList.toggle('is-stuck', window.scrollY > 8); };
        onScroll();
        window.addEventListener('scroll', onScroll, { passive: true });
    }

    /* ---------- 2. TABS (Per Item / Per Kg) ---------- */
    function initTabs() {
        $$('[data-lw-tabs]').forEach(function (root) {
            var tabs = $$('[role="tab"]', root);
            function select(tab) {
                tabs.forEach(function (t) {
                    var on = t === tab;
                    t.classList.toggle('is-active', on);
                    t.setAttribute('aria-selected', String(on));
                    t.tabIndex = on ? 0 : -1;
                    var panel = document.getElementById(t.getAttribute('aria-controls'));
                    if (panel) panel.hidden = !on;
                });
            }
            tabs.forEach(function (t, i) {
                t.addEventListener('click', function () { select(t); });
                t.addEventListener('keydown', function (e) {
                    var d = e.key === 'ArrowRight' ? 1 : e.key === 'ArrowLeft' ? -1 : 0;
                    if (!d) return;
                    var n = tabs[(i + d + tabs.length) % tabs.length];
                    select(n); n.focus();
                });
            });
        });
    }

    /* ---------- 3. JAM OPERASIONAL (WIB) ---------- */
    function wibNow() {
        var parts = new Intl.DateTimeFormat('en-US', {
            timeZone: 'Asia/Jakarta', hour: 'numeric', minute: 'numeric', hour12: false, weekday: 'short'
        }).formatToParts(new Date());
        var o = {};
        parts.forEach(function (p) { o[p.type] = p.value; });
        var map = { Sun: 0, Mon: 1, Tue: 2, Wed: 3, Thu: 4, Fri: 5, Sat: 6 };
        return { h: parseInt(o.hour, 10) % 24, m: parseInt(o.minute, 10), day: map[o.weekday] };
    }
    function pad(n) { return (n < 10 ? '0' : '') + n; }

    function initHours() {
        var cards = $$('[data-lw-hours]');
        var week = $('[data-lw-week]');
        if (!cards.length && !week) return;

        function render() {
            var now = wibNow();
            cards.forEach(function (card) {
                var open = +card.dataset.open, close = +card.dataset.close;
                var isOpen = now.h >= open && now.h < close;
                var st = $('[data-lw-status]', card), tx = $('[data-lw-status-text]', card);
                st.classList.toggle('is-open', isOpen);
                st.classList.toggle('is-closed', !isOpen);
                tx.textContent = isOpen
                    ? 'Buka · tutup ' + pad(close) + '.00'
                    : 'Tutup · buka ' + pad(open) + '.00';
            });
            if (week) $$('li', week).forEach(function (li) { li.classList.toggle('is-today', +li.dataset.day === now.day); });
        }
        render();
        setInterval(render, 60000);
    }

    /* ---------- 4. FORM ORDER → WHATSAPP ---------- */
    function openWhatsApp(number, text) {
        var url = 'https://wa.me/' + number + '?text=' + encodeURIComponent(text);
        var w = window.open(url, '_blank', 'noopener');
        if (!w) window.location.href = url;
    }

    function initOrderForm() {
        var form = $('[data-lw-order-form]');
        if (!form) return;
        var err = $('[data-lw-form-error]', form);
        var number = (form.getAttribute('action') || '').replace(/\D/g, '');

        // Isi otomatis dari tautan halaman lain (?layanan=...&opsi=...)
        var qs = new URLSearchParams(window.location.search);
        ['layanan', 'opsi'].forEach(function (k) {
            var sel = form.elements[k], val = qs.get(k);
            if (!sel || !val) return;
            Array.prototype.some.call(sel.options, function (o) {
                if (o.value === val || o.text === val) { sel.value = o.value || o.text; return true; }
            });
        });

        form.addEventListener('submit', function (e) {
            e.preventDefault();
            var f = form.elements, bad = [];
            ['nama', 'wa', 'layanan', 'opsi', 'area', 'alamat'].forEach(function (n) {
                var el = f[n], v = (el.value || '').trim();
                var invalid = !v || (n === 'wa' && !/^\+?\d{9,15}$/.test(v.replace(/[\s-]/g, '')));
                el.classList.toggle('is-invalid', invalid);
                if (invalid) bad.push(el);
            });
            if (bad.length) {
                err.hidden = false;
                err.textContent = 'Lengkapi data yang ditandai. Nomor WhatsApp harus berupa 9–15 digit.';
                bad[0].focus();
                return;
            }
            err.hidden = true;
            var lines = [
                'Halo ' + brand + ', saya ingin memesan laundry.', '',
                'Nama: ' + f.nama.value.trim(),
                'No. WhatsApp: ' + f.wa.value.trim(),
                'Layanan: ' + f.layanan.value,
                'Opsi: ' + f.opsi.value,
                'Area jemput: ' + f.area.value,
                'Alamat: ' + f.alamat.value.trim()
            ];
            if (f.catatan.value.trim()) lines.push('Catatan: ' + f.catatan.value.trim());
            openWhatsApp(number, lines.join('\n'));
        });
        form.addEventListener('input', function (e) { e.target.classList.remove('is-invalid'); });
    }

    /* ---------- 5. CEK AREA ---------- */
    function initAreaCheck() {
        var box = $('[data-lw-area-check]');
        if (!box) return;
        var form = $('form', box), out = $('[data-lw-check-result]', box), wa = box.dataset.wa;
        var norm = function (s) { return (s || '').toLowerCase().replace(/\s+/g, ' ').trim(); };

        form.addEventListener('submit', function (e) {
            e.preventDefault();
            var sel = form.elements.area, kec = norm(form.elements.kec.value);
            out.className = 'lw-check-result'; out.textContent = '';
            if (!sel.value) { out.className += ' is-no'; out.textContent = 'Pilih kota terlebih dahulu.'; sel.focus(); return; }

            var opt = sel.options[sel.selectedIndex];
            var list = (opt.dataset.list || '').split('|').map(norm);
            var all = opt.dataset.all === '1';
            var hit = !kec || all || list.some(function (x) { return x.indexOf(kec) > -1 || kec.indexOf(x) > -1; });

            if (hit) {
                out.textContent = '✓ Tersedia jemput & antar gratis di ' + (kec ? form.elements.kec.value.trim() + ', ' : '') + sel.value + '.';
            } else {
                out.className += ' is-no';
                out.textContent = '"' + form.elements.kec.value.trim() + '" belum ada di daftar kami. ';
                var a = document.createElement('a');
                a.href = 'https://wa.me/' + wa + '?text=' + encodeURIComponent('Halo ' + brand + ', apakah area ' + form.elements.kec.value.trim() + ', ' + sel.value + ' bisa dijemput?');
                a.target = '_blank'; a.rel = 'noopener'; a.textContent = 'Tanya via WhatsApp';
                a.style.textDecoration = 'underline';
                out.appendChild(a);
            }
        });
    }

    /* ---------- 6. CHATBOT ---------- */
    function initChat() {
        var panel = $('#lw-chat'), dataEl = $('#lw-chat-data');
        if (!panel || !dataEl) return;

        var data = JSON.parse(dataEl.textContent);
        var log = $('[data-lw-chat-log]', panel);
        var form = $('[data-lw-chat-form]', panel);
        var input = form.elements.q;
        var fabs = $$('.lw-fab--bot');
        var teaser = $('[data-lw-teaser]');
        var lastOpener = null, busy = false;
        var rupiah = new Intl.NumberFormat('id-ID');

        var norm = function (s) { return (' ' + (s || '').toLowerCase().replace(/[^a-z0-9\s]/g, ' ').replace(/\s+/g, ' ').trim() + ' '); };

        function scroll() { log.scrollTop = log.scrollHeight; }

        function addMsg(role, text, link) {
            var el = document.createElement('div');
            el.className = 'lw-msg lw-msg--' + role;
            el.textContent = text;
            if (link) {
                el.appendChild(document.createElement('br'));
                var a = document.createElement('a');
                a.href = link.url; a.textContent = link.text + ' →';
                if (/^https?:\/\/wa\.me/.test(link.url)) { a.target = '_blank'; a.rel = 'noopener'; }
                el.appendChild(a);
            }
            log.appendChild(el); scroll();
        }

        function reply(text, link) {
            busy = true;
            var t = document.createElement('div');
            t.className = 'lw-typing'; t.innerHTML = '<i></i><i></i><i></i>';
            log.appendChild(t); scroll();
            setTimeout(function () {
                t.remove(); addMsg('bot', text, link); busy = false;
            }, reduceMotion ? 0 : 520 + Math.min(text.length * 4, 700));
        }

        function findPrice(q) {
            // Cocokkan nama lengkap; untuk harga per item juga kata kunci tunggal (kemeja, kaos, jas, ...)
            return data.prices.filter(function (p) {
                var name = norm(p.name).trim();
                if (q.indexOf(' ' + name + ' ') > -1) return true;
                return p.unit === 'item' && name.split(' ').some(function (w) {
                    return (w.length > 3 || w === 'jas') && q.indexOf(' ' + w + ' ') > -1;
                });
            }).slice(0, 3);
        }

        function answer(raw) {
            var q = norm(raw);

            var prices = findPrice(q);
            if (prices.length) {
                var txt = prices.map(function (p) { return p.name + ': Rp ' + rupiah.format(p.price) + ' / ' + p.unit; }).join('\n');
                return reply(txt, { url: data.priceUrl, text: 'Lihat Daftar Harga' });
            }

            var best = null, score = 0;
            data.faq.concat([data.hours]).forEach(function (f) {
                var s = 0;
                f.keywords.forEach(function (k) { if (q.indexOf(' ' + k + ' ') > -1 || q.indexOf(k) > -1) s += k.length > 3 ? 2 : 1; });
                if (s > score) { score = s; best = f; }
            });

            if (best) return reply(best.answer, { url: best.url, text: best.linkText });

            reply(data.fallback, {
                url: 'https://wa.me/' + data.whatsapp + '?text=' + encodeURIComponent('Halo ' + brand + ', saya ingin bertanya…'),
                text: 'Tanya via WhatsApp'
            });
        }

        function ask(text) {
            if (busy || !text.trim()) return;
            addMsg('user', text.trim());
            answer(text);
        }

        function open(opener) {
            lastOpener = opener || lastOpener;
            panel.hidden = false;
            fabs.forEach(function (f) { f.setAttribute('aria-expanded', 'true'); });
            if (teaser) teaser.hidden = true;
            if (!log.children.length) addMsg('bot', data.welcome);
            setTimeout(function () { input.focus({ preventScroll: true }); }, 60);
        }
        function close() {
            panel.hidden = true;
            fabs.forEach(function (f) { f.setAttribute('aria-expanded', 'false'); });
            if (lastOpener && lastOpener.focus) lastOpener.focus();
        }

        document.addEventListener('click', function (e) {
            var o = e.target.closest('[data-lw-chat-open]');
            if (o) { e.preventDefault(); panel.hidden ? open(o) : (o.classList.contains('lw-fab') ? close() : input.focus()); return; }

            var c = e.target.closest('[data-lw-chat-close]');
            if (c) { close(); return; }

            var t = e.target.closest('[data-lw-chat-topic]');
            if (t) {
                e.preventDefault();
                var f = data.faq.filter(function (x) { return x.key === t.dataset.lwChatTopic; })[0];
                if (!f) return;
                if (panel.hidden) open(t);
                ask(f.label);
            }
        });
        document.addEventListener('keydown', function (e) { if (e.key === 'Escape' && !panel.hidden) close(); });
        form.addEventListener('submit', function (e) {
            e.preventDefault();
            var v = input.value; input.value = '';
            ask(v);
        });

        // Teaser sekali per sesi
        try {
            if (teaser && !sessionStorage.getItem('lw-teaser')) {
                setTimeout(function () {
                    if (!panel.hidden) return;
                    teaser.hidden = false;
                    sessionStorage.setItem('lw-teaser', '1');
                    setTimeout(function () { teaser.hidden = true; }, 7000);
                }, 3500);
            }
        } catch (err) { /* storage dimatikan: abaikan */ }
    }

    /* ---------- BOOT ---------- */
    function boot() {
        initNav(); initTabs(); initHours(); initOrderForm(); initAreaCheck(); initChat();
    }
    if (document.readyState === 'loading') document.addEventListener('DOMContentLoaded', boot);
    else boot();
})();
