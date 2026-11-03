/* =========================================================================
   Nusa Logistik — Logistics Company · Corporate · Classic Trust
   JavaScript murni (tanpa dependensi). Semua data dibaca dari <script type="application/json">
   yang dirender oleh Blade (lc-urls, lc-contact, lc-chatbot, lc-tracking, lc-search).
   Modul: navbar · bahasa · pencarian · tabs · carousel · tracking · form penawaran
          · chatbot Nusa AI · tombol melayang
   ========================================================================= */
(function () {
    'use strict';

    /* ---------- Util ---------- */
    var $ = function (sel, ctx) { return (ctx || document).querySelector(sel); };
    var $$ = function (sel, ctx) { return Array.prototype.slice.call((ctx || document).querySelectorAll(sel)); };
    var reduceMotion = window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches;

    function readJSON(id, fallback) {
        var node = document.getElementById(id);
        if (!node) { return fallback; }
        try { return JSON.parse(node.textContent); } catch (e) { return fallback; }
    }
    function safeStorage(action, key, value) {
        try {
            if (action === 'get') { return window.sessionStorage.getItem(key); }
            window.sessionStorage.setItem(key, value);
        } catch (e) { /* storage tidak tersedia: abaikan */ }
        return null;
    }
    function norm(text) {
        return ' ' + String(text || '').toLowerCase().replace(/[^a-z0-9\s]/g, ' ').replace(/\s+/g, ' ').trim() + ' ';
    }
    function el(tag, className, text) {
        var node = document.createElement(tag);
        if (className) { node.className = className; }
        if (text !== undefined && text !== null) { node.textContent = text; }
        return node;
    }
    function icon(id, cls) {
        return '<svg class="ic ' + (cls || '') + '" aria-hidden="true"><use href="#' + id + '"/></svg>';
    }

    var URLS = readJSON('lc-urls', {});
    var CONTACT = readJSON('lc-contact', {});
    var CHATBOT = readJSON('lc-chatbot', { faqs: [] });
    var TRACKING = readJSON('lc-tracking', { demo: {}, steps: [] });
    var SEARCH = readJSON('lc-search', []);

    function waLink(text) {
        return 'https://wa.me/' + (CONTACT.whatsapp || '') + '?text=' + encodeURIComponent(text || CONTACT.whatsapp_text || '');
    }

    /* ---------- Navbar & drawer ---------- */
    function initNavbar() {
        var navbar = $('[data-navbar]');
        var nav = $('[data-nav]');
        var toggle = $('[data-nav-toggle]');
        var backdrop = $('[data-nav-backdrop]');
        if (!navbar || !nav || !toggle) { return; }

        function onScroll() { navbar.classList.toggle('is-stuck', window.scrollY > 8); }
        window.addEventListener('scroll', onScroll, { passive: true });
        onScroll();

        function setOpen(open) {
            if (open) {
                nav.style.top = Math.max(0, Math.round(navbar.getBoundingClientRect().bottom)) + 'px';
            }
            nav.classList.toggle('is-open', open);
            toggle.setAttribute('aria-expanded', open ? 'true' : 'false');
            toggle.setAttribute('aria-label', open ? 'Tutup menu' : 'Buka menu');
            document.body.classList.toggle('nav-open', open);
            if (backdrop) { backdrop.hidden = !open; }
        }
        toggle.addEventListener('click', function () { setOpen(!nav.classList.contains('is-open')); });
        if (backdrop) { backdrop.addEventListener('click', function () { setOpen(false); }); }
        $$('a', nav).forEach(function (a) { a.addEventListener('click', function () { setOpen(false); }); });
        document.addEventListener('keydown', function (e) {
            if (e.key === 'Escape' && nav.classList.contains('is-open')) { setOpen(false); toggle.focus(); }
        });
        window.addEventListener('resize', function () {
            if (window.innerWidth > 1239 && nav.classList.contains('is-open')) { setOpen(false); }
        });
    }

    /* ---------- Dropdown bahasa & tautan non-aktif ---------- */
    function initLang() {
        var btn = $('[data-lang-toggle]');
        var menu = $('[data-lang-menu]');
        if (btn && menu) {
            btn.addEventListener('click', function (e) {
                e.stopPropagation();
                var open = menu.hidden;
                menu.hidden = !open;
                btn.setAttribute('aria-expanded', open ? 'true' : 'false');
            });
            document.addEventListener('click', function () { menu.hidden = true; btn.setAttribute('aria-expanded', 'false'); });
            document.addEventListener('keydown', function (e) {
                if (e.key === 'Escape') { menu.hidden = true; btn.setAttribute('aria-expanded', 'false'); }
            });
        }
        $$('[data-noop]').forEach(function (a) { a.addEventListener('click', function (e) { e.preventDefault(); }); });
    }

    /* ---------- Pencarian halaman ---------- */
    function initSearch() {
        var modal = $('[data-search-modal]');
        var openBtn = $('[data-search-open]');
        if (!modal || !openBtn) { return; }
        var input = $('[data-search-input]', modal);
        var list = $('[data-search-list]', modal);
        var form = $('[data-search-form]', modal);
        var lastFocus = null;

        function render(q) {
            var query = norm(q).trim();
            var items = SEARCH.filter(function (it) {
                if (!query) { return true; }
                return norm(it.label + ' ' + it.keys).indexOf(query) !== -1;
            });
            list.innerHTML = '';
            if (!items.length) { list.appendChild(el('li', 'search-modal__empty', 'Tidak ada halaman yang cocok.')); return; }
            items.forEach(function (it) {
                var li = el('li');
                var a = el('a', '', it.label);
                a.href = URLS[it.route] || '#';
                a.insertAdjacentHTML('beforeend', icon('i-chevron-right', 'ic--xs'));
                li.appendChild(a);
                list.appendChild(li);
            });
        }
        function open() {
            lastFocus = document.activeElement;
            modal.hidden = false;
            document.body.style.overflow = 'hidden';
            render('');
            input.value = '';
            setTimeout(function () { input.focus(); }, 30);
        }
        function close() {
            modal.hidden = true;
            document.body.style.overflow = '';
            if (lastFocus && lastFocus.focus) { lastFocus.focus(); }
        }
        openBtn.addEventListener('click', open);
        $('[data-search-close]', modal).addEventListener('click', close);
        modal.addEventListener('click', function (e) { if (e.target === modal) { close(); } });
        input.addEventListener('input', function () { render(input.value); });
        form.addEventListener('submit', function (e) {
            e.preventDefault();
            var first = $('a', list);
            if (first) { window.location.href = first.href; }
        });
        document.addEventListener('keydown', function (e) {
            if (e.key === 'Escape' && !modal.hidden) { close(); }
            if ((e.key === 'k' || e.key === 'K') && (e.ctrlKey || e.metaKey)) { e.preventDefault(); modal.hidden ? open() : close(); }
        });
    }

    /* ---------- Tabs ---------- */
    function initTabs() {
        $$('[data-tabs]').forEach(function (root) {
            var tabs = $$('[data-tab]', root);
            if (!tabs.length) { return; }
            function activate(tab, focus) {
                tabs.forEach(function (t) {
                    var on = t === tab;
                    t.classList.toggle('is-active', on);
                    t.setAttribute('aria-selected', on ? 'true' : 'false');
                    t.tabIndex = on ? 0 : -1;
                    var panel = document.getElementById(t.getAttribute('aria-controls'));
                    if (panel) { panel.hidden = !on; }
                });
                if (focus) { tab.focus(); }
            }
            tabs.forEach(function (tab, i) {
                tab.addEventListener('click', function () { activate(tab, false); });
                tab.addEventListener('keydown', function (e) {
                    var next = null;
                    if (e.key === 'ArrowRight') { next = tabs[(i + 1) % tabs.length]; }
                    if (e.key === 'ArrowLeft') { next = tabs[(i - 1 + tabs.length) % tabs.length]; }
                    if (e.key === 'Home') { next = tabs[0]; }
                    if (e.key === 'End') { next = tabs[tabs.length - 1]; }
                    if (next) { e.preventDefault(); activate(next, true); }
                });
            });
            if (root.hasAttribute('data-tabs-hash')) {
                var applyHash = function () {
                    var key = window.location.hash.replace('#', '');
                    var match = tabs.filter(function (t) { return t.getAttribute('data-tab') === key; })[0];
                    if (match) { activate(match, false); }
                };
                applyHash();
                window.addEventListener('hashchange', applyHash);
            }
        });
    }

    /* ---------- Carousel ---------- */
    function initCarousels() {
        $$('[data-carousel]').forEach(function (root) {
            var track = $('[data-carousel-track]', root);
            var prev = $('[data-carousel-prev]', root);
            var next = $('[data-carousel-next]', root);
            if (!track || !prev || !next) { return; }
            function step() {
                var item = track.firstElementChild;
                if (!item) { return track.clientWidth; }
                var gap = parseFloat(window.getComputedStyle(track).columnGap) || 0;
                return item.getBoundingClientRect().width + gap;
            }
            function update() {
                var max = track.scrollWidth - track.clientWidth - 2;
                prev.disabled = track.scrollLeft <= 2;
                next.disabled = track.scrollLeft >= max;
            }
            prev.addEventListener('click', function () { track.scrollBy({ left: -step(), behavior: reduceMotion ? 'auto' : 'smooth' }); });
            next.addEventListener('click', function () { track.scrollBy({ left: step(), behavior: reduceMotion ? 'auto' : 'smooth' }); });
            track.addEventListener('scroll', function () { window.requestAnimationFrame(update); }, { passive: true });
            window.addEventListener('resize', update);
            update();
        });
    }

    /* ---------- Tracking (halaman Tracking) ---------- */
    function initTracking() {
        var root = $('[data-track-page]');
        if (!root) { return; }
        var form = $('[data-track-form]', root);
        var input = $('[data-track-input]', root);
        var msg = $('[data-track-msg]', root);
        var result = $('[data-track-result]', root);
        var summary = $('[data-track-summary]', root);
        var stepsWrap = $('[data-track-steps]', root);
        var history = $('[data-track-history]', root);

        function showMsg(text) { msg.textContent = text; msg.hidden = !text; result.hidden = true; }

        function render(no, data) {
            msg.hidden = true;
            summary.innerHTML = '';
            [['Nomor resi', no], ['Layanan', data.service], ['Asal', data.origin], ['Tujuan', data.destination], ['Estimasi', data.eta]].forEach(function (pair) {
                if (!pair[1]) { return; }
                var wrap = el('div');
                wrap.appendChild(el('dt', '', pair[0]));
                wrap.appendChild(el('dd', '', pair[1]));
                summary.appendChild(wrap);
            });
            var current = parseInt(data.step, 10) || 1;
            stepsWrap.setAttribute('data-state', 'ready');
            $$('.track-step', stepsWrap).forEach(function (li, i) {
                li.classList.toggle('is-done', i < current);
                li.classList.toggle('is-current', i === current - 1);
            });
            history.innerHTML = '';
            (data.history || []).slice().reverse().forEach(function (h) {
                var li = el('li');
                li.appendChild(el('strong', '', h.title));
                li.appendChild(el('span', '', [h.time, h.location].filter(Boolean).join(' · ')));
                history.appendChild(li);
            });
            result.hidden = false;
        }

        function lookup(raw) {
            var no = String(raw || '').trim().toUpperCase().replace(/\s+/g, '');
            input.value = no;
            if (no.length < 6) { showMsg('Masukkan nomor resi yang valid (minimal 6 karakter).'); return; }
            if (TRACKING.endpoint) {
                showMsg('');
                fetch(TRACKING.endpoint + (TRACKING.endpoint.indexOf('?') === -1 ? '?' : '&') + 'resi=' + encodeURIComponent(no), { headers: { 'Accept': 'application/json' } })
                    .then(function (r) { if (!r.ok) { throw new Error('http'); } return r.json(); })
                    .then(function (data) {
                        if (!data || data.found === false) { showMsg('Nomor resi ' + no + ' tidak ditemukan. Periksa kembali atau hubungi tim kami.'); return; }
                        render(no, { step: data.step, service: (data.summary || {}).service, origin: (data.summary || {}).origin, destination: (data.summary || {}).destination, eta: (data.summary || {}).eta, history: data.history });
                    })
                    .catch(function () { showMsg('Layanan tracking sedang tidak dapat dihubungi. Coba lagi beberapa saat.'); });
                return;
            }
            var demo = (TRACKING.demo || {})[no];
            if (!demo) { showMsg('Nomor resi ' + no + ' tidak ditemukan. Periksa kembali atau hubungi tim kami.'); return; }
            render(no, demo);
        }

        form.addEventListener('submit', function (e) {
            e.preventDefault();
            lookup(input.value);
            if (window.history && window.history.replaceState) {
                var url = new URL(window.location.href);
                url.searchParams.set('resi', input.value.trim());
                window.history.replaceState(null, '', url.toString());
            }
        });
        $$('[data-track-demo]', root).forEach(function (btn) {
            btn.addEventListener('click', function () { input.value = btn.getAttribute('data-track-demo'); lookup(input.value); });
        });
        var q = new URLSearchParams(window.location.search).get('resi');
        if (q) { input.value = q; lookup(q); }
    }

    /* ---------- Form penawaran -> WhatsApp ---------- */
    function initQuoteForm() {
        var form = $('[data-quote-form]');
        if (!form) { return; }
        var msg = $('[data-quote-msg]', form.parentNode) || $('[data-quote-msg]');
        var required = { nama: 'Nama lengkap wajib diisi.', telepon: 'Nomor telepon / WhatsApp wajib diisi.', layanan: 'Pilih jenis layanan.', asal: 'Kota asal wajib diisi.', tujuan: 'Tujuan wajib diisi.' };

        var preset = new URLSearchParams(window.location.search).get('layanan');
        if (preset && form.elements.layanan) {
            $$('option', form.elements.layanan).forEach(function (o) { if (o.value.toLowerCase() === preset.toLowerCase()) { form.elements.layanan.value = o.value; } });
        }

        function setError(name, text) {
            var field = form.elements[name] && form.elements[name].closest('.field');
            var err = $('[data-err="' + name + '"]', form);
            if (!field || !err) { return; }
            field.classList.toggle('is-invalid', !!text);
            form.elements[name].setAttribute('aria-invalid', text ? 'true' : 'false');
            var customBtn = $('.select__btn', field);
            if (customBtn) { customBtn.setAttribute('aria-invalid', text ? 'true' : 'false'); }
            err.textContent = text || '';
            err.hidden = !text;
        }

        form.addEventListener('submit', function (e) {
            e.preventDefault();
            var ok = true;
            Object.keys(required).forEach(function (name) {
                var value = (form.elements[name].value || '').trim();
                var text = value ? '' : required[name];
                if (name === 'telepon' && value && value.replace(/\D/g, '').length < 8) { text = 'Nomor telepon belum valid.'; }
                setError(name, text);
                if (text) { ok = false; }
            });
            var email = (form.elements.email.value || '').trim();
            var emailBad = email && !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
            setError('email', emailBad ? 'Format email belum valid.' : '');
            if (emailBad) { ok = false; }
            if (!ok) {
                msg.className = 'form-msg'; msg.textContent = 'Mohon lengkapi data yang ditandai.'; msg.hidden = false;
                var firstBad = $('.is-invalid .select__btn, .is-invalid input', form) || $('.is-invalid select', form);
                if (firstBad) { firstBad.focus(); }
                return;
            }
            var f = form.elements;
            var lines = [
                'Halo Nusa Logistik, saya ingin meminta penawaran pengiriman.',
                '',
                'Nama: ' + f.nama.value.trim(),
                f.perusahaan.value.trim() ? 'Perusahaan: ' + f.perusahaan.value.trim() : '',
                'Telepon/WA: ' + f.telepon.value.trim(),
                email ? 'Email: ' + email : '',
                'Layanan: ' + f.layanan.value,
                f.barang.value ? 'Jenis barang: ' + f.barang.value : '',
                'Asal: ' + f.asal.value.trim(),
                'Tujuan: ' + f.tujuan.value.trim(),
                f.berat.value.trim() ? 'Berat/volume: ' + f.berat.value.trim() : '',
                f.catatan.value.trim() ? 'Catatan: ' + f.catatan.value.trim() : ''
            ].filter(function (l, i) { return l !== '' || i === 1; });
            var win = window.open(waLink(lines.join('\n')), '_blank', 'noopener');
            msg.className = 'form-msg is-ok';
            msg.textContent = win ? 'Terima kasih! Detail Anda dibuka di WhatsApp. Tekan kirim agar tim kami dapat menindaklanjuti.' : 'Pop-up diblokir browser. Izinkan pop-up lalu kirim ulang formulir.';
            msg.hidden = false;
        });
        $$('input, select', form).forEach(function (n) {
            n.addEventListener('input', function () { if (required[n.name] || n.name === 'email') { setError(n.name, ''); } });
        });
    }


    /* ---------- Dropdown kustom (menggantikan tampilan <select> bawaan) ---------- */
    function initSelects() {
        var uid = 0;
        var instances = [];
        $$('select[data-select]').forEach(function (sel) {
            uid += 1;
            var wrap = el('div', 'select');
            sel.parentNode.insertBefore(wrap, sel);
            wrap.appendChild(sel);
            sel.classList.add('select__native');
            sel.tabIndex = -1;
            sel.setAttribute('aria-hidden', 'true');

            var placeholder = '';
            var opts = [];
            $$('option', sel).forEach(function (o) {
                if (o.value === '') { placeholder = o.textContent; } else { opts.push(o); }
            });

            var btn = el('button', 'select__btn');
            btn.type = 'button';
            btn.setAttribute('aria-haspopup', 'listbox');
            btn.setAttribute('aria-expanded', 'false');
            var label = el('span', 'select__label');
            btn.appendChild(label);
            btn.insertAdjacentHTML('beforeend', icon('i-chevron-down', 'select__chev'));

            var panel = el('ul', 'select__panel');
            panel.id = 'select-panel-' + uid;
            panel.setAttribute('role', 'listbox');
            panel.hidden = true;
            btn.setAttribute('aria-controls', panel.id);

            var lab = sel.id ? document.querySelector('label[for="' + sel.id + '"]') : null;
            if (lab) {
                lab.id = lab.id || ('select-label-' + uid);
                btn.setAttribute('aria-labelledby', lab.id);
                panel.setAttribute('aria-labelledby', lab.id);
                lab.addEventListener('click', function (e) { e.preventDefault(); btn.focus(); });
            }

            var items = opts.map(function (o, i) {
                var li = el('li', 'select__opt');
                li.id = 'select-' + uid + '-opt-' + i;
                li.setAttribute('role', 'option');
                li.setAttribute('data-value', o.value);
                li.appendChild(el('span', '', o.textContent));
                li.insertAdjacentHTML('beforeend', icon('i-check'));
                panel.appendChild(li);
                return li;
            });
            wrap.appendChild(btn);
            wrap.appendChild(panel);

            var active = -1;
            var typed = '';
            var typedTimer = null;

            function selectedIndex() {
                for (var i = 0; i < items.length; i++) { if (items[i].getAttribute('data-value') === sel.value) { return i; } }
                return -1;
            }
            function sync() {
                var idx = selectedIndex();
                label.textContent = idx > -1 ? items[idx].firstChild.textContent : placeholder;
                btn.classList.toggle('is-placeholder', idx === -1);
                items.forEach(function (li, i) { li.setAttribute('aria-selected', i === idx ? 'true' : 'false'); });
            }
            function setActive(i, scroll) {
                if (!items.length) { return; }
                active = Math.max(0, Math.min(items.length - 1, i));
                items.forEach(function (li, k) { li.classList.toggle('is-active', k === active); });
                btn.setAttribute('aria-activedescendant', items[active].id);
                if (scroll !== false) {
                    var it = items[active];
                    if (it.offsetTop < panel.scrollTop) { panel.scrollTop = it.offsetTop - 6; }
                    else if (it.offsetTop + it.offsetHeight > panel.scrollTop + panel.clientHeight) { panel.scrollTop = it.offsetTop + it.offsetHeight - panel.clientHeight + 6; }
                }
            }
            function isOpen() { return !panel.hidden; }
            function open() {
                if (isOpen() || !items.length) { return; }
                instances.forEach(function (o) { if (o !== api) { o.close(); } });
                panel.hidden = false;
                wrap.classList.add('is-open');
                btn.setAttribute('aria-expanded', 'true');
                var rect = btn.getBoundingClientRect();
                var need = Math.min(panel.scrollHeight, 280) + 16;
                var below = window.innerHeight - rect.bottom;
                wrap.classList.toggle('is-up', below < need && rect.top > below);
                var idx = selectedIndex();
                setActive(idx > -1 ? idx : 0);
            }
            function close() {
                if (!isOpen()) { return; }
                panel.hidden = true;
                wrap.classList.remove('is-open');
                btn.setAttribute('aria-expanded', 'false');
                btn.removeAttribute('aria-activedescendant');
            }
            function choose(i) {
                sel.value = items[i].getAttribute('data-value');
                sel.dispatchEvent(new Event('input', { bubbles: true }));
                sel.dispatchEvent(new Event('change', { bubbles: true }));
                sync();
                close();
                btn.focus();
            }
            var api = { close: close, wrap: wrap };
            instances.push(api);

            btn.addEventListener('click', function () { isOpen() ? close() : open(); });
            items.forEach(function (li, i) {
                li.addEventListener('click', function () { choose(i); });
                li.addEventListener('mousemove', function () { if (active !== i) { setActive(i, false); } });
            });
            btn.addEventListener('keydown', function (e) {
                var k = e.key;
                if (k === 'ArrowDown' || k === 'ArrowUp') {
                    e.preventDefault();
                    if (!isOpen()) { open(); return; }
                    setActive(active + (k === 'ArrowDown' ? 1 : -1));
                } else if (k === 'Home' && isOpen()) { e.preventDefault(); setActive(0); }
                else if (k === 'End' && isOpen()) { e.preventDefault(); setActive(items.length - 1); }
                else if (k === 'Enter' || k === ' ') {
                    if (isOpen()) { e.preventDefault(); if (active > -1) { choose(active); } }
                    else if (k === ' ') { e.preventDefault(); open(); }
                }
                else if (k === 'Escape' && isOpen()) { e.preventDefault(); e.stopPropagation(); close(); }
                else if (k === 'Tab') { close(); }
                else if (k.length === 1 && !e.ctrlKey && !e.metaKey && !e.altKey) {
                    typed += k.toLowerCase();
                    window.clearTimeout(typedTimer);
                    typedTimer = window.setTimeout(function () { typed = ''; }, 600);
                    for (var n = 0; n < items.length; n++) {
                        if (items[n].firstChild.textContent.toLowerCase().indexOf(typed) === 0) {
                            if (!isOpen()) { open(); }
                            setActive(n);
                            break;
                        }
                    }
                }
            });
            sel.addEventListener('change', sync);
            sync();
        });
        if (instances.length) {
            document.addEventListener('mousedown', function (e) {
                instances.forEach(function (o) { if (!o.wrap.contains(e.target)) { o.close(); } });
            });
        }
    }

    /* ---------- Chatbot Nusa AI ---------- */
    var chatInstances = [];
    var AVATAR = (function () { var img = $('.chat__avatar img'); return img ? img.getAttribute('src') : ''; })();

    function answerFor(text) {
        var t = norm(text);
        var trimmed = t.trim();
        if (!trimmed) { return null; }
        var words = trimmed.split(' ').length;
        var isGreeting = (CHATBOT.greetings || []).some(function (g) { return trimmed === g || (words <= 3 && t.indexOf(' ' + g + ' ') !== -1); });
        var best = null; var bestScore = 0;
        (CHATBOT.faqs || []).forEach(function (faq) {
            var score = 0;
            if (norm(faq.q) === t) { score = 100; }
            (faq.keywords || []).forEach(function (k) {
                var nk = norm(k).trim();
                if (!nk) { return; }
                var hit = nk.length <= 3 ? t.indexOf(' ' + nk + ' ') !== -1 : t.indexOf(nk) !== -1;
                if (hit) { score += Math.max(2, nk.length / 2); }
            });
            if (score > bestScore) { best = faq; bestScore = score; }
        });
        if (best && bestScore >= 3) { return { text: best.a, actions: best.actions || [], faq: best.id }; }
        if (isGreeting) { return { text: 'Halo! Senang bisa membantu. Anda bisa menanyakan tarif, estimasi waktu, area pengiriman, jenis barang, atau cara melacak pengiriman.', actions: [] }; }
        if ((CHATBOT.thanks || []).some(function (g) { return t.indexOf(' ' + norm(g).trim() + ' ') !== -1; })) {
            return { text: 'Sama-sama! Jika ada pertanyaan lain seputar pengiriman, saya siap membantu.', actions: [] };
        }
        return { text: CHATBOT.fallback, actions: [], fallback: true };
    }

    function initChat(root) {
        var log = $('[data-chat-log]', root);
        var chips = $('[data-chat-chips]', root);
        var form = $('[data-chat-form]', root);
        var input = $('[data-chat-input]', root);
        if (!log || !form || !input) { return null; }
        var busy = false;

        function scroll() { log.scrollTop = log.scrollHeight; }

        function bubble(kind, text, actions, withWa) {
            var row = el('div', 'msg msg--' + kind);
            if (kind === 'bot') {
                var av = el('span', 'msg__av');
                var im = document.createElement('img');
                im.src = AVATAR; im.alt = ''; im.width = 28; im.height = 28;
                av.appendChild(im); row.appendChild(av);
            }
            var b = el('div', 'msg__bubble');
            b.appendChild(el('span', '', text));
            if ((actions && actions.length) || withWa) {
                var box = el('div', 'msg__actions');
                (actions || []).forEach(function (a) {
                    var link = el('a', '', a.label);
                    link.href = URLS[a.route] || '#';
                    box.appendChild(link);
                });
                if (withWa) {
                    var wa = el('a', 'is-wa', 'Chat WhatsApp');
                    wa.href = waLink(); wa.target = '_blank'; wa.rel = 'noopener';
                    box.appendChild(wa);
                }
                b.appendChild(box);
            }
            row.appendChild(b);
            log.appendChild(row);
            scroll();
            return row;
        }

        function typing() {
            var row = el('div', 'msg msg--bot');
            var av = el('span', 'msg__av');
            var im = document.createElement('img'); im.src = AVATAR; im.alt = ''; im.width = 28; im.height = 28;
            av.appendChild(im); row.appendChild(av);
            var b = el('div', 'msg__bubble');
            b.innerHTML = '<span class="typing" aria-label="Nusa AI sedang mengetik"><i></i><i></i><i></i></span>';
            row.appendChild(b);
            log.appendChild(row); scroll();
            return row;
        }

        function ask(text) {
            var q = String(text || '').trim();
            if (!q || busy) { return; }
            busy = true;
            bubble('user', q);
            var ans = answerFor(q);
            var indicator = typing();
            window.setTimeout(function () {
                indicator.remove();
                var needsWa = ans.fallback || ans.faq === 'kontak';
                bubble('bot', ans.text, ans.actions, needsWa);
                busy = false;
            }, reduceMotion ? 80 : 650 + Math.min(500, q.length * 8));
        }

        form.addEventListener('submit', function (e) {
            e.preventDefault();
            var v = input.value;
            input.value = '';
            ask(v);
        });

        if (chips) {
            (CHATBOT.faqs || []).slice(0, 6).forEach(function (faq) {
                var b = el('button', '', faq.q);
                b.type = 'button';
                b.addEventListener('click', function () { ask(faq.q); });
                chips.appendChild(b);
            });
        }
        bubble('bot', CHATBOT.greeting);
        return { root: root, ask: ask, focus: function () { input.focus(); } };
    }

    function initChatUI() {
        $$('[data-chat]').forEach(function (root) {
            var inst = initChat(root);
            if (inst) { chatInstances.push(inst); }
        });
        var panel = $('[data-chat-panel]');
        var fab = $('.fab--ai');
        var panelInst = null;
        chatInstances.forEach(function (i) { if (panel && panel.contains(i.root)) { panelInst = i; } });
        if (!panel || !panelInst) { return; }

        function openPanel() {
            panel.hidden = false;
            $$('[data-chat-open]').forEach(function (b) { b.setAttribute('aria-expanded', 'true'); });
            hideTeaser(true);
            setTimeout(function () { panelInst.focus(); }, 60);
        }
        function closePanel() {
            panel.hidden = true;
            $$('[data-chat-open]').forEach(function (b) { b.setAttribute('aria-expanded', 'false'); });
            if (fab) { fab.focus(); }
        }
        $$('[data-chat-open]').forEach(function (b) {
            b.addEventListener('click', function () { panel.hidden ? openPanel() : closePanel(); });
        });
        $$('[data-chat-close]', panel).forEach(function (b) { b.addEventListener('click', closePanel); });
        $$('[data-chat-ask]').forEach(function (b) {
            b.addEventListener('click', function () {
                if (panel.hidden) { openPanel(); }
                panelInst.ask(b.getAttribute('data-chat-ask'));
            });
        });
        document.addEventListener('keydown', function (e) { if (e.key === 'Escape' && !panel.hidden) { closePanel(); } });

        /* Sapaan singkat di atas tombol AI Chat */
        var teaser = $('[data-fab-teaser]');
        var teaserTimer = null;
        function hideTeaser(remember) {
            if (!teaser) { return; }
            teaser.hidden = true;
            window.clearTimeout(teaserTimer);
            if (remember) { safeStorage('set', 'lc-teaser', '1'); }
        }
        if (teaser) {
            var close = $('[data-fab-teaser-close]', teaser);
            if (close) { close.addEventListener('click', function () { hideTeaser(true); }); }
            if (!safeStorage('get', 'lc-teaser')) {
                window.setTimeout(function () {
                    if (!panel.hidden) { return; }
                    teaser.hidden = false;
                    teaserTimer = window.setTimeout(function () { hideTeaser(true); }, 12000);
                }, 5000);
            }
        }
    }

    /* ---------- Mulai ---------- */
    function init() {
        initNavbar();
        initLang();
        initSearch();
        initTabs();
        initCarousels();
        initTracking();
        initQuoteForm();
        initSelects();
        initChatUI();
    }
    if (document.readyState === 'loading') { document.addEventListener('DOMContentLoaded', init); } else { init(); }
})();
