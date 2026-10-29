/*!
 * Travel Agent · Modern · Ocean Teal ("OceanJourney")
 * Frontend statis (tanpa backend). Semua modul bersifat opsional: hanya aktif bila elemennya ada.
 * Data (FAQ chatbot, nomor WhatsApp, URL halaman) dibaca dari <script id="ta-data">.
 */
(function () {
    'use strict';

    var doc = document;
    var $ = function (sel, ctx) { return (ctx || doc).querySelector(sel); };
    var $$ = function (sel, ctx) { return Array.prototype.slice.call((ctx || doc).querySelectorAll(sel)); };
    var reduceMotion = window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches;

    var DATA = {};
    try { DATA = JSON.parse($('#ta-data').textContent) || {}; } catch (e) { DATA = {}; }
    var params = new URLSearchParams(window.location.search);

    /* ------------------------------------------------------------------ */
    /* 1. Header: bayangan saat scroll + menu mobile                       */
    /* ------------------------------------------------------------------ */
    function initHeader() {
        var header = $('[data-ta-header]');
        var menu = $('[data-ta-menu]');
        var burger = $('[data-ta-burger]');
        var scrim = $('[data-ta-scrim]');
        if (!header) return;

        var onScroll = function () { header.classList.toggle('is-stuck', window.scrollY > 8); };
        onScroll();
        window.addEventListener('scroll', onScroll, { passive: true });

        if (!menu || !burger) return;

        function setOpen(open) {
            menu.classList.toggle('is-open', open);
            burger.setAttribute('aria-expanded', String(open));
            burger.setAttribute('aria-label', open ? 'Tutup menu' : 'Buka menu');
            doc.body.classList.toggle('ta-lock', open);
            if (scrim) scrim.hidden = !open;
        }
        burger.addEventListener('click', function () { setOpen(!menu.classList.contains('is-open')); });
        if (scrim) scrim.addEventListener('click', function () { setOpen(false); });
        menu.addEventListener('click', function (e) { if (e.target.closest('a')) setOpen(false); });
        doc.addEventListener('keydown', function (e) {
            if (e.key === 'Escape' && menu.classList.contains('is-open')) { setOpen(false); burger.focus(); }
        });
        window.matchMedia('(min-width: 1320px)').addEventListener('change', function (e) { if (e.matches) setOpen(false); });
    }

    /* ------------------------------------------------------------------ */
    /* 2. Input tanggal: minimal hari ini                                  */
    /* ------------------------------------------------------------------ */
    function initDates() {
        var d = new Date();
        var iso = d.getFullYear() + '-' + String(d.getMonth() + 1).padStart(2, '0') + '-' + String(d.getDate()).padStart(2, '0');
        $$('[data-ta-min-today]').forEach(function (el) {
            el.min = iso;
            var sync = function () { el.classList.toggle('is-empty', !el.value); };
            el.addEventListener('input', sync); el.addEventListener('change', sync);
            sync();
        });
    }


    /* ------------------------------------------------------------------ */
    /* 2b. Dropdown kustom (peningkatan <select data-ta-select>)           */
    /*     <select> asli tetap dipakai untuk submit & validasi form.       */
    /* ------------------------------------------------------------------ */
    var CHEV = '<svg class="ta-ic ta-dd__chev" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="m6 9 6 6 6-6"/></svg>';
    var ddCount = 0;

    function initSelects() {
        var openDD = null;

        function closeAll(focusBtn) {
            if (!openDD) return;
            openDD.close(focusBtn);
        }

        $$('select[data-ta-select]').forEach(function (sel) {
            var uid = 'ta-dd-' + (++ddCount);
            var wrap = doc.createElement('div');
            wrap.className = 'ta-dd';
            sel.parentNode.insertBefore(wrap, sel);

            var btn = doc.createElement('button');
            btn.type = 'button';
            btn.className = 'ta-dd__btn';
            btn.setAttribute('aria-haspopup', 'listbox');
            btn.setAttribute('aria-expanded', 'false');
            btn.setAttribute('aria-controls', uid);
            btn.innerHTML = '<span class="ta-dd__val"></span>' + CHEV;
            var val = btn.firstChild;

            var list = doc.createElement('ul');
            list.className = 'ta-dd__list';
            list.id = uid;
            list.setAttribute('role', 'listbox');
            list.hidden = true;

            wrap.appendChild(btn);
            wrap.appendChild(list);
            wrap.appendChild(sel);
            sel.classList.add('ta-dd__native');
            sel.tabIndex = -1;
            sel.setAttribute('aria-hidden', 'true');

            var label = sel.id ? doc.querySelector('label[for="' + sel.id + '"]') : null;
            if (label) {
                if (!label.id) label.id = uid + '-label';
                btn.setAttribute('aria-labelledby', label.id + ' ' + uid + '-val');
                val.id = uid + '-val';
                list.setAttribute('aria-labelledby', label.id);
                label.addEventListener('click', function (e) { e.preventDefault(); toggle(); btn.focus(); });
            }

            var opts = [], active = -1, field = wrap.closest('.ta-search__field');

            Array.prototype.forEach.call(sel.options, function (o, i) {
                var li = doc.createElement('li');
                li.className = 'ta-dd__opt' + (o.value === '' ? ' is-placeholder' : '');
                li.id = uid + '-o' + i;
                li.setAttribute('role', 'option');
                li.textContent = o.text;
                li.addEventListener('click', function () { choose(i); close(true); });
                li.addEventListener('mousemove', function () { setActive(i); });
                list.appendChild(li);
                opts.push(li);
            });

            function sync() {
                var i = sel.selectedIndex < 0 ? 0 : sel.selectedIndex;
                val.textContent = sel.options[i] ? sel.options[i].text : '';
                opts.forEach(function (li, k) { li.setAttribute('aria-selected', String(k === i)); });
            }
            function choose(i) {
                if (sel.selectedIndex !== i) {
                    sel.selectedIndex = i;
                    sel.dispatchEvent(new Event('change', { bubbles: true }));
                }
                sync();
            }
            function setActive(i) {
                if (i < 0 || i >= opts.length) return;
                if (active > -1) opts[active].classList.remove('is-active');
                active = i;
                opts[i].classList.add('is-active');
                btn.setAttribute('aria-activedescendant', opts[i].id);
                opts[i].scrollIntoView({ block: 'nearest' });
            }
            function open() {
                if (openDD && openDD.wrap !== wrap) openDD.close();
                list.hidden = false;
                wrap.classList.add('is-open');
                if (field) field.classList.add('is-open');
                btn.setAttribute('aria-expanded', 'true');
                setActive(sel.selectedIndex < 0 ? 0 : sel.selectedIndex);
                openDD = { wrap: wrap, close: close };
            }
            function close(focusBtn) {
                list.hidden = true;
                wrap.classList.remove('is-open');
                if (field) field.classList.remove('is-open');
                btn.setAttribute('aria-expanded', 'false');
                btn.removeAttribute('aria-activedescendant');
                if (openDD && openDD.wrap === wrap) openDD = null;
                if (focusBtn === true) btn.focus();
            }
            function toggle() { if (list.hidden) open(); else close(); }

            btn.addEventListener('click', toggle);
            btn.addEventListener('keydown', function (e) {
                var k = e.key;
                if (list.hidden) {
                    if (k === 'ArrowDown' || k === 'ArrowUp' || k === 'Enter' || k === ' ') { e.preventDefault(); open(); }
                    return;
                }
                if (k === 'ArrowDown') { e.preventDefault(); setActive(Math.min(active + 1, opts.length - 1)); }
                else if (k === 'ArrowUp') { e.preventDefault(); setActive(Math.max(active - 1, 0)); }
                else if (k === 'Home') { e.preventDefault(); setActive(0); }
                else if (k === 'End') { e.preventDefault(); setActive(opts.length - 1); }
                else if (k === 'Enter' || k === ' ') { e.preventDefault(); if (active > -1) choose(active); close(true); }
                else if (k === 'Escape') { e.preventDefault(); e.stopPropagation(); close(true); }
                else if (k === 'Tab') { close(); }
            });
            sel.addEventListener('change', sync);
            if (sel.form) sel.form.addEventListener('reset', function () { setTimeout(sync, 0); });
            // validasi bawaan browser (required) memfokuskan <select> asli: arahkan ke tombol kustom
            sel.addEventListener('focus', function () { btn.focus(); });
            sync();
        });

        doc.addEventListener('click', function (e) { if (openDD && !openDD.wrap.contains(e.target)) closeAll(); });
    }

    /* ------------------------------------------------------------------ */
    /* 3. Filter chip + pencarian (destinasi, paket, jadwal, galeri)        */
    /* ------------------------------------------------------------------ */
    function initFilters() {
        $$('[data-ta-filter]').forEach(function (box) {
            var chips = $$('[data-filter]', box);
            var items = $$('[data-ta-items] > [data-cat]', box);
            var search = $('[data-ta-search]', box);
            var count = $('[data-ta-count]', box);
            var empty = $('[data-ta-empty]', box);
            var current = '*';

            function apply() {
                var q = search ? search.value.trim().toLowerCase() : '';
                var shown = 0;
                items.forEach(function (it) {
                    var cats = (it.getAttribute('data-cat') || '').split(' ');
                    var okCat = current === '*' || cats.indexOf(current) !== -1;
                    var okText = !q || (it.getAttribute('data-name') || it.textContent).toLowerCase().indexOf(q) !== -1;
                    var ok = okCat && okText;
                    it.hidden = !ok;
                    if (ok) shown++;
                });
                if (count) count.textContent = shown + ' dari ' + items.length + ' ditampilkan';
                if (empty) empty.hidden = shown !== 0;
            }
            function select(value) {
                current = value;
                chips.forEach(function (c) {
                    var on = c.getAttribute('data-filter') === value;
                    c.classList.toggle('is-active', on);
                    c.setAttribute('aria-pressed', String(on));
                });
                apply();
            }

            chips.forEach(function (c) { c.addEventListener('click', function () { select(c.getAttribute('data-filter')); }); });
            if (search) search.addEventListener('input', apply);

            var param = box.getAttribute('data-param');
            var initial = param ? params.get(param) : null;
            var valid = chips.some(function (c) { return c.getAttribute('data-filter') === initial; });
            select(valid ? initial : '*');
        });
    }

    /* ------------------------------------------------------------------ */
    /* 4. Tab itinerary (+ hash #slug-paket)                               */
    /* ------------------------------------------------------------------ */
    function initTabs() {
        $$('[data-ta-tabs]').forEach(function (box) {
            var tabs = $$('[role="tab"]', box);
            var panels = $$('[role="tabpanel"]', box);

            function activate(slug, focus) {
                var found = false;
                tabs.forEach(function (t) {
                    var on = t.getAttribute('data-tab') === slug;
                    if (on) found = true;
                    t.setAttribute('aria-selected', String(on));
                    t.tabIndex = on ? 0 : -1;
                    if (on && focus) t.focus();
                });
                if (!found) return;
                panels.forEach(function (p) { p.hidden = p.getAttribute('data-panel') !== slug; });
            }
            tabs.forEach(function (t, i) {
                t.addEventListener('click', function () { activate(t.getAttribute('data-tab')); history.replaceState(null, '', '#' + t.getAttribute('data-tab')); });
                t.addEventListener('keydown', function (e) {
                    var n = null;
                    if (e.key === 'ArrowRight') n = tabs[(i + 1) % tabs.length];
                    if (e.key === 'ArrowLeft') n = tabs[(i - 1 + tabs.length) % tabs.length];
                    if (e.key === 'Home') n = tabs[0];
                    if (e.key === 'End') n = tabs[tabs.length - 1];
                    if (n) { e.preventDefault(); activate(n.getAttribute('data-tab'), true); }
                });
            });
            var fromHash = function () { var h = window.location.hash.slice(1); if (h) activate(h); };
            fromHash();
            window.addEventListener('hashchange', fromHash);
        });
    }

    /* ------------------------------------------------------------------ */
    /* 5. Slider testimoni                                                 */
    /* ------------------------------------------------------------------ */
    function initSliders() {
        $$('[data-ta-slider]').forEach(function (box) {
            var slides = $$('[data-slide]', box);
            var dotsWrap = $('[data-dots]', box);
            var prev = $('[data-prev]', box);
            var next = $('[data-next]', box);
            var i = 0, timer = null, dots = [];
            if (slides.length < 2) return;

            slides.forEach(function (_, n) {
                if (!dotsWrap) return;
                var b = doc.createElement('button');
                b.type = 'button';
                b.setAttribute('aria-label', 'Testimoni ' + (n + 1));
                b.addEventListener('click', function () { go(n); restart(); });
                dotsWrap.appendChild(b);
                dots.push(b);
            });
            function go(n) {
                i = (n + slides.length) % slides.length;
                slides.forEach(function (s, k) {
                    s.classList.toggle('is-active', k === i);
                    s.setAttribute('aria-hidden', String(k !== i));
                });
                dots.forEach(function (d, k) { if (k === i) d.setAttribute('aria-current', 'true'); else d.removeAttribute('aria-current'); });
            }
            function restart() {
                clearInterval(timer);
                if (!reduceMotion) timer = setInterval(function () { go(i + 1); }, 7000);
            }
            if (prev) prev.addEventListener('click', function () { go(i - 1); restart(); });
            if (next) next.addEventListener('click', function () { go(i + 1); restart(); });
            box.addEventListener('mouseenter', function () { clearInterval(timer); });
            box.addEventListener('mouseleave', restart);
            box.addEventListener('focusin', function () { clearInterval(timer); });
            go(0);
            restart();
        });
    }

    /* ------------------------------------------------------------------ */
    /* 6. Lightbox galeri                                                  */
    /* ------------------------------------------------------------------ */
    function initLightbox() {
        var groups = $$('[data-ta-lightbox]');
        if (!groups.length) return;

        var lb = doc.createElement('div');
        lb.className = 'ta-lb';
        lb.hidden = true;
        lb.setAttribute('role', 'dialog');
        lb.setAttribute('aria-modal', 'true');
        lb.setAttribute('aria-label', 'Pratinjau foto');
        lb.innerHTML = '<button type="button" class="ta-lb__close" aria-label="Tutup">&#10005;</button>' +
            '<button type="button" class="ta-lb__prev" aria-label="Foto sebelumnya">&#10094;</button>' +
            '<img alt=""><p></p>' +
            '<button type="button" class="ta-lb__next" aria-label="Foto berikutnya">&#10095;</button>';
        doc.body.appendChild(lb);
        var img = $('img', lb), cap = $('p', lb);
        var list = [], idx = 0, opener = null;

        function show(n) {
            idx = (n + list.length) % list.length;
            var a = list[idx];
            img.src = a.href;
            img.alt = a.getAttribute('data-caption') || '';
            cap.textContent = a.getAttribute('data-caption') || '';
        }
        function open(links, n, trigger) {
            list = links; opener = trigger; lb.hidden = false; doc.body.classList.add('ta-lock'); show(n);
            $('.ta-lb__close', lb).focus();
        }
        function close() { lb.hidden = true; doc.body.classList.remove('ta-lock'); if (opener) opener.focus(); }

        groups.forEach(function (g) {
            g.addEventListener('click', function (e) {
                var a = e.target.closest('a[href]');
                if (!a || a.hasAttribute('data-ta-nolb')) return;
                e.preventDefault();
                var links = $$('a[href]', g).filter(function (x) { return !x.closest('[hidden]') && !x.hasAttribute('data-ta-nolb'); });
                open(links, links.indexOf(a), a);
            });
        });
        $('.ta-lb__close', lb).addEventListener('click', close);
        $('.ta-lb__prev', lb).addEventListener('click', function () { show(idx - 1); });
        $('.ta-lb__next', lb).addEventListener('click', function () { show(idx + 1); });
        lb.addEventListener('click', function (e) { if (e.target === lb) close(); });
        doc.addEventListener('keydown', function (e) {
            if (lb.hidden) return;
            if (e.key === 'Escape') close();
            if (e.key === 'ArrowLeft') show(idx - 1);
            if (e.key === 'ArrowRight') show(idx + 1);
        });
    }

    /* ------------------------------------------------------------------ */
    /* 7. Form inquiry -> WhatsApp                                         */
    /* ------------------------------------------------------------------ */
    function formatDate(iso) {
        if (!iso) return '-';
        var m = /^(\d{4})-(\d{2})-(\d{2})$/.exec(iso);
        if (!m) return iso;
        var bulan = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
        return parseInt(m[3], 10) + ' ' + bulan[parseInt(m[2], 10) - 1] + ' ' + m[1];
    }
    function initInquiry() {
        $$('[data-ta-inquiry]').forEach(function (form) {
            var status = $('[data-ta-status]', form);
            var dest = form.elements.dest, tgl = form.elements.tgl;

            // Prefill dari query (?dest=bali&tgl=2026-11-12&paket=4D3N)
            var qd = params.get('dest'), qt = params.get('tgl');
            if (dest && qd && $$('option', dest).some(function (o) { return o.value === qd; })) {
                dest.value = qd;
                dest.dispatchEvent(new Event('change'));
            }
            if (tgl && qt) tgl.value = qt;
            var paket = params.get('paket');
            if (paket && form.elements.pesan && !form.elements.pesan.value) form.elements.pesan.value = 'Saya tertarik dengan Paket ' + paket + '.';

            form.addEventListener('submit', function (e) {
                e.preventDefault();
                var f = form.elements;
                var destText = dest && dest.selectedIndex > 0 ? dest.options[dest.selectedIndex].text : '-';
                var lines = [
                    'Halo ' + (DATA.brand || 'OceanJourney') + ', saya ingin mengirim booking inquiry:',
                    '',
                    'Nama: ' + f.nama.value.trim(),
                    'Email: ' + f.email.value.trim(),
                    'Destinasi: ' + destText,
                    'Tanggal Keberangkatan: ' + formatDate(f.tgl && f.tgl.value)
                ];
                if (f.peserta) lines.push('Jumlah Peserta: ' + f.peserta.value + ' orang');
                if (f.wa && f.wa.value.trim()) lines.push('No. WhatsApp: ' + f.wa.value.trim());
                if (f.pesan && f.pesan.value.trim()) lines.push('Pesan: ' + f.pesan.value.trim());

                var url = 'https://wa.me/' + (DATA.whatsapp || '') + '?text=' + encodeURIComponent(lines.join('\n'));
                var win = window.open(url, '_blank', 'noopener');
                if (status) {
                    status.classList.toggle('is-error', !win);
                    status.textContent = win ? 'Inquiry siap dikirim. WhatsApp dibuka di tab baru.' : 'Pop-up diblokir. Izinkan pop-up lalu kirim ulang.';
                }
            });
        });
    }

    /* ------------------------------------------------------------------ */
    /* 8. Chatbot FAQ destinasi & paket                                    */
    /* ------------------------------------------------------------------ */
    function initChat() {
        var panel = $('[data-ta-chat]');
        if (!panel) return;

        var log = $('[data-ta-chat-log]', panel);
        var quick = $('[data-ta-chat-quick]', panel);
        var form = $('[data-ta-chat-form]', panel);
        var input = $('[data-ta-chat-input]', panel);
        var faqs = DATA.faqs || [];
        var cfg = DATA.chat || {};
        var routes = DATA.routes || {};
        var byId = {};
        faqs.forEach(function (f) { byId[f.id] = f; });
        var started = false, lastTrigger = null, busy = false;

        var fabAI = $('.ta-fab--ai');
        var hint = $('[data-ta-hint]');
        var hintTimer;

        function norm(s) {
            return String(s).toLowerCase().normalize('NFD').replace(/[\u0300-\u036f]/g, '').replace(/[^a-z0-9 ]+/g, ' ').replace(/\s+/g, ' ').trim();
        }
        function scrollDown() { log.scrollTop = log.scrollHeight; }

        function addMsg(text, who, link) {
            var row = doc.createElement('div');
            row.className = 'ta-msg ta-msg--' + who;
            if (who === 'bot' && DATA.mascot) {
                var ava = doc.createElement('img');
                ava.className = 'ta-msg__ava'; ava.src = DATA.mascot; ava.alt = ''; row.appendChild(ava);
            }
            var b = doc.createElement('div');
            b.className = 'ta-msg__bubble';
            String(text).split('\n').forEach(function (line) {
                var p = doc.createElement('p'); p.textContent = line; b.appendChild(p);
            });
            if (link && link.href) {
                var a = doc.createElement('a');
                a.className = 'ta-msg__link'; a.href = link.href; a.textContent = link.label + ' \u2192';
                if (link.external) { a.target = '_blank'; a.rel = 'noopener noreferrer'; }
                b.appendChild(a);
            }
            row.appendChild(b);
            log.appendChild(row);
            scrollDown();
            return row;
        }
        function typing() {
            var row = doc.createElement('div');
            row.className = 'ta-msg ta-msg--bot';
            row.innerHTML = '<div class="ta-msg__bubble ta-typing" aria-label="Asisten sedang mengetik"><i></i><i></i><i></i></div>';
            log.appendChild(row); scrollDown();
            return row;
        }
        function reply(text, link) {
            busy = true;
            var t = typing();
            setTimeout(function () { t.remove(); addMsg(text, 'bot', link); busy = false; }, reduceMotion ? 0 : 650);
        }
        function waLink(label) {
            return { href: 'https://wa.me/' + (DATA.whatsapp || '') + '?text=' + encodeURIComponent('Halo ' + (DATA.brand || '') + ', saya ingin bertanya.'), label: label, external: true };
        }
        function answer(faq) {
            var link = faq.link && routes[faq.link] ? { href: routes[faq.link], label: faq.link_label || 'Lihat' } : null;
            if (faq.id === 'lainnya') link = waLink('Chat WhatsApp');
            reply(faq.a, link);
        }
        function best(q) {
            var nq = ' ' + norm(q) + ' ', top = null, score = 0;
            faqs.forEach(function (f) {
                var s = 0;
                (f.keys || []).forEach(function (k) {
                    var nk = norm(k);
                    if (nk && nq.indexOf(nk.indexOf(' ') > -1 ? nk : ' ' + nk) !== -1) s += nk.length > 4 ? 2 : 1;
                });
                if (norm(f.q) === norm(q)) s += 10;
                if (s > score) { score = s; top = f; }
            });
            return score > 0 ? top : null;
        }
        function ask(text) {
            if (busy) return;
            text = String(text).trim();
            if (!text) return;
            addMsg(text, 'user');
            var f = best(text);
            if (f) { answer(f); return; }
            reply(cfg.fallback || 'Maaf, saya belum menemukan jawabannya.', waLink('Tanya via WhatsApp'));
        }
        function askById(id) { var f = byId[id]; if (f) { if (busy) return; addMsg(f.q, 'user'); answer(f); } }

        // chip pertanyaan cepat
        (cfg.quick || []).concat(['bali', 'booking']).filter(function (v, i, a) { return a.indexOf(v) === i; }).forEach(function (id) {
            if (!byId[id]) return;
            var b = doc.createElement('button');
            b.type = 'button'; b.textContent = byId[id].q;
            b.addEventListener('click', function () { askById(id); });
            quick.appendChild(b);
        });

        function openChat(trigger) {
            lastTrigger = trigger || fabAI;
            panel.hidden = false;
            if (fabAI) fabAI.setAttribute('aria-expanded', 'true');
            if (hint) hint.hidden = true;
            clearTimeout(hintTimer);
            if (!started) { started = true; addMsg(cfg.welcome || 'Halo!', 'bot'); }
            setTimeout(function () { input.focus(); }, 60);
        }
        function closeChat() {
            panel.hidden = true;
            if (fabAI) fabAI.setAttribute('aria-expanded', 'false');
            if (lastTrigger && lastTrigger.focus) lastTrigger.focus();
        }

        doc.addEventListener('click', function (e) {
            var openBtn = e.target.closest('[data-ta-chat-open]');
            var askBtn = e.target.closest('[data-ta-chat-ask]');
            if (askBtn) { openChat(askBtn); askById(askBtn.getAttribute('data-ta-chat-ask')); return; }
            if (openBtn) { if (!panel.hidden && openBtn === fabAI) { closeChat(); } else { openChat(openBtn); } }
        });
        $('[data-ta-chat-close]', panel).addEventListener('click', closeChat);
        doc.addEventListener('keydown', function (e) { if (e.key === 'Escape' && !panel.hidden) closeChat(); });
        form.addEventListener('submit', function (e) { e.preventDefault(); var v = input.value; input.value = ''; ask(v); });

        // Saran singkat dari maskot: sekali per sesi, hilang sendiri
        var hintClose = $('[data-ta-hint-close]');
        if (hint) {
            var seen = false;
            try { seen = sessionStorage.getItem('ta-hint') === '1'; } catch (e) { /* abaikan */ }
            if (!seen) {
                setTimeout(function () {
                    if (!panel.hidden) return;
                    hint.hidden = false;
                    try { sessionStorage.setItem('ta-hint', '1'); } catch (e) { /* abaikan */ }
                    hintTimer = setTimeout(function () { hint.hidden = true; }, 8000);
                }, 5000);
            }
            if (hintClose) hintClose.addEventListener('click', function () { hint.hidden = true; });
        }
    }

    /* ------------------------------------------------------------------ */
    function init() {
        initHeader();
        initDates();
        initSelects();
        initFilters();
        initTabs();
        initSliders();
        initLightbox();
        initInquiry();
        initChat();
    }
    if (doc.readyState === 'loading') doc.addEventListener('DOMContentLoaded', init); else init();
})();
