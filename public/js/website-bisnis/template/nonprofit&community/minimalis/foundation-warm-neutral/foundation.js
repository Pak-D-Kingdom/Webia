/* =========================================================================
   HopeTogether Foundation - Nonprofit & Community (Minimalist / Warm Neutral)
   foundation.js  |  Vanilla JS, tanpa dependensi. Semua modul aman jika elemennya tidak ada.
   Modul: nav, search, reveal, counter, donut, toast, form->WhatsApp, donasi, filter berita, chatbot
   ========================================================================= */
(function () {
    'use strict';

    var doc = document;
    var reduceMotion = window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches;

    function $(sel, ctx) { return (ctx || doc).querySelector(sel); }
    function $$(sel, ctx) { return Array.prototype.slice.call((ctx || doc).querySelectorAll(sel)); }
    function readJSON(id, fallback) {
        var el = doc.getElementById(id);
        if (!el) { return fallback; }
        try { return JSON.parse(el.textContent); } catch (e) { return fallback; }
    }
    function norm(s) {
        return String(s || '').toLowerCase().normalize('NFD').replace(/[\u0300-\u036f]/g, '')
            .replace(/[^a-z0-9\s]/g, ' ').replace(/\s+/g, ' ').trim();
    }
    function formatID(n) { return Number(n).toLocaleString('id-ID'); }

    var routes = readJSON('hf-routes', {});
    var chatData = readJSON('hf-chat-data', null);
    var navData = readJSON('hf-nav-data', []);

    /* ---------- Toast ---------- */
    var toastEl = $('#hf-toast');
    var toastTimer = null;
    function toast(message) {
        if (!toastEl) { return; }
        toastEl.textContent = message;
        toastEl.hidden = false;
        toastEl.style.animation = 'none';
        void toastEl.offsetWidth; // restart animation
        toastEl.style.animation = '';
        clearTimeout(toastTimer);
        toastTimer = setTimeout(function () { toastEl.hidden = true; }, 3400);
    }
    doc.addEventListener('click', function (e) {
        var soon = e.target.closest ? e.target.closest('[data-soon]') : null;
        if (!soon) { return; }
        e.preventDefault();
        toast(soon.getAttribute('data-soon') || 'Halaman ini akan tersedia pada versi produksi.');
    });

    /* ---------- Navbar ---------- */
    var nav = $('[data-nav]');
    var burger = $('[data-menu-toggle]');
    function setMenu(open) {
        if (!nav || !burger) { return; }
        nav.classList.toggle('is-menu-open', open);
        burger.setAttribute('aria-expanded', open ? 'true' : 'false');
        burger.setAttribute('aria-label', open ? 'Tutup menu' : 'Buka menu');
    }
    if (nav) {
        var onScroll = function () { nav.classList.toggle('is-scrolled', window.scrollY > 8); };
        onScroll();
        window.addEventListener('scroll', onScroll, { passive: true });
    }
    if (burger) {
        burger.addEventListener('click', function () { setMenu(!nav.classList.contains('is-menu-open')); });
        $$('[data-menu-link]').forEach(function (a) { a.addEventListener('click', function () { setMenu(false); }); });
        window.addEventListener('resize', function () { if (window.innerWidth >= 1200) { setMenu(false); } });
    }

    /* ---------- Search ---------- */
    var searchBox = $('#hf-search');
    var searchInput = $('#hf-search-input');
    var searchList = $('#hf-search-list');
    var searchPages = [];
    (navData || []).forEach(function (item) { searchPages.push({ label: item.label, route: item.route, kw: '' }); });
    searchPages.push({ label: 'Donasi', route: 'donation', kw: 'donasi sumbang berdonasi rutin barang' });
    searchPages.push({ label: 'HopeBot - FAQ Program & Donasi', route: 'chatbot', kw: 'chatbot bot tanya faq bantuan' });
    searchPages.push({ label: 'Laporan Keuangan', route: 'transparency', kw: 'laporan keuangan audit dana' });
    searchPages.push({ label: 'Misi & Visi', route: 'mission-vision', kw: 'visi misi nilai tentang' });

    function renderSearch(q) {
        if (!searchList) { return; }
        var nq = norm(q);
        var seen = {};
        var html = '';
        searchPages.forEach(function (p) {
            var key = p.label;
            if (seen[key] || !routes[p.route]) { return; }
            if (nq && norm(p.label + ' ' + p.kw).indexOf(nq) === -1) { return; }
            seen[key] = true;
            html += '<li><a href="' + routes[p.route] + '"><span></span><b aria-hidden="true">&rarr;</b></a></li>';
        });
        searchList.innerHTML = html || '<li class="hf-search__empty">Halaman tidak ditemukan. Coba kata lain, misalnya "donasi".</li>';
        // isi label via textContent agar aman
        var labels = [];
        searchPages.forEach(function (p) {
            if (labels.indexOf(p.label) !== -1 || !routes[p.route]) { return; }
            if (nq && norm(p.label + ' ' + p.kw).indexOf(nq) === -1) { return; }
            labels.push(p.label);
        });
        $$('a > span', searchList).forEach(function (s, i) { s.textContent = labels[i]; });
    }
    function openSearch() {
        if (!searchBox) { return; }
        renderSearch('');
        searchBox.hidden = false;
        setTimeout(function () { if (searchInput) { searchInput.value = ''; searchInput.focus(); } }, 30);
    }
    function closeSearch() { if (searchBox) { searchBox.hidden = true; } }
    $$('[data-search-open]').forEach(function (b) { b.addEventListener('click', openSearch); });
    $$('[data-search-close]').forEach(function (b) { b.addEventListener('click', closeSearch); });
    if (searchInput) { searchInput.addEventListener('input', function () { renderSearch(searchInput.value); }); }

    /* ---------- Reveal on scroll ---------- */
    var revealEls = $$('[data-reveal]');
    if ('IntersectionObserver' in window && !reduceMotion) {
        var io = new IntersectionObserver(function (entries) {
            entries.forEach(function (en) {
                if (en.isIntersecting) { en.target.classList.add('is-in'); io.unobserve(en.target); }
            });
        }, { threshold: 0.1, rootMargin: '0px 0px -30px 0px' });
        revealEls.forEach(function (el) { io.observe(el); });
    } else {
        revealEls.forEach(function (el) { el.classList.add('is-in'); });
    }

    /* ---------- Counter ---------- */
    var counters = $$('[data-count]');
    function runCounter(el) {
        var target = parseInt(el.getAttribute('data-count'), 10);
        if (isNaN(target)) { return; }
        var start = null, dur = 1500;
        function step(ts) {
            if (start === null) { start = ts; }
            var p = Math.min((ts - start) / dur, 1);
            var eased = 1 - Math.pow(1 - p, 3);
            el.textContent = formatID(Math.round(target * eased));
            if (p < 1) { requestAnimationFrame(step); }
        }
        requestAnimationFrame(step);
    }
    if (counters.length && 'IntersectionObserver' in window && !reduceMotion) {
        var cio = new IntersectionObserver(function (entries) {
            entries.forEach(function (en) {
                if (en.isIntersecting) { runCounter(en.target); cio.unobserve(en.target); }
            });
        }, { threshold: 0.4 });
        counters.forEach(function (el) { cio.observe(el); });
    }

    /* ---------- Donut chart ---------- */
    $$('[data-donut]').forEach(function (el) {
        var parts = el.getAttribute('data-donut').split(',').map(function (s) { return s.trim(); }).filter(Boolean);
        var acc = 0, stops = [];
        parts.forEach(function (p) {
            var bits = p.split(':');
            var pct = parseFloat(bits[0]);
            if (isNaN(pct) || !bits[1]) { return; }
            stops.push(bits[1] + ' ' + acc + '% ' + (acc + pct) + '%');
            acc += pct;
        });
        if (stops.length) { el.style.background = 'conic-gradient(' + stops.join(', ') + ')'; }
    });

    /* ---------- Filter berita & acara ---------- */
    var filterBtns = $$('[data-filter]');
    var filterList = $('[data-filter-list]');
    filterBtns.forEach(function (btn) {
        btn.addEventListener('click', function () {
            var cat = btn.getAttribute('data-filter');
            filterBtns.forEach(function (b) { b.classList.toggle('is-active', b === btn); });
            if (!filterList) { return; }
            $$('li[data-cat]', filterList).forEach(function (li) {
                li.hidden = !(cat === 'all' || li.getAttribute('data-cat') === cat);
            });
        });
    });

    /* ---------- Form -> WhatsApp ---------- */
    function waURL(number, text) { return 'https://wa.me/' + number + '?text=' + encodeURIComponent(text); }
    function setError(field, message) {
        var wrap = field.closest('.hf-field');
        if (!wrap) { return; }
        wrap.classList.toggle('has-error', !!message);
        var out = $('[data-error]', wrap);
        if (out) { out.textContent = message || ''; }
        field.setAttribute('aria-invalid', message ? 'true' : 'false');
    }
    function digits(v) { return String(v || '').replace(/\D+/g, ''); }

    $$('[data-money]').forEach(function (inp) {
        inp.addEventListener('input', function () {
            var d = digits(inp.value);
            inp.value = d ? formatID(parseInt(d, 10)) : '';
            $$('.hf-chip--amt').forEach(function (c) { c.classList.toggle('is-active', digits(c.getAttribute('data-amount')) === d); });
        });
    });
    $$('.hf-chip--amt').forEach(function (chip) {
        chip.addEventListener('click', function () {
            var amount = $('#don-amount');
            if (!amount) { return; }
            amount.value = formatID(parseInt(chip.getAttribute('data-amount'), 10));
            $$('.hf-chip--amt').forEach(function (c) { c.classList.toggle('is-active', c === chip); });
            setError(amount, '');
        });
    });

    function selectDonationType(key, scroll) {
        var sel = $('#don-type');
        if (!sel) { return; }
        var found = false;
        $$('option', sel).forEach(function (o) { if (o.value === key) { found = true; } });
        if (!found) { return; }
        sel.value = key;
        $$('.hf-donoption').forEach(function (c) { c.classList.toggle('is-selected', c.id === key); });
        syncAmountField();
        if (scroll) {
            var form = $('#form-donasi');
            if (form) { form.scrollIntoView({ behavior: reduceMotion ? 'auto' : 'smooth', block: 'start' }); }
        }
    }
    function syncAmountField() {
        var sel = $('#don-type');
        var wrap = $('[data-amount-field]');
        if (!sel || !wrap) { return; }
        var goods = sel.value === 'barang';
        wrap.hidden = goods;
        var amount = $('#don-amount');
        if (amount) { amount.required = !goods; setError(amount, ''); }
    }
    $$('[data-donation-type]').forEach(function (b) {
        b.addEventListener('click', function () { selectDonationType(b.getAttribute('data-donation-type'), true); });
    });
    var donType = $('#don-type');
    if (donType) {
        donType.addEventListener('change', function () { selectDonationType(donType.value, false); });
        var hashKey = (window.location.hash || '').replace('#', '');
        if (hashKey) { selectDonationType(hashKey, false); } else { syncAmountField(); }
    }

    $$('[data-wa-form]').forEach(function (form) {
        form.addEventListener('submit', function (e) {
            e.preventDefault();
            var kind = form.getAttribute('data-wa-form');
            var number = form.getAttribute('data-wa');
            var ok = true, firstBad = null;
            var lines = [];

            $$('input, select, textarea', form).forEach(function (field) {
                if (!field.name) { return; }
                var value = String(field.value || '').trim();
                var visible = !field.closest('[hidden]');
                var msg = '';
                if (visible && field.required && !value) { msg = 'Wajib diisi.'; }
                else if (value && field.name === 'phone') {
                    var d = digits(value);
                    if (!/^(62|0)8\d{7,12}$/.test(d)) { msg = 'Masukkan nomor WhatsApp yang valid, contoh 0812xxxxxxx.'; }
                } else if (value && field.name === 'email' && !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(value)) {
                    msg = 'Format email belum benar.';
                } else if (value && field.name === 'amount' && parseInt(digits(value), 10) <= 0) {
                    msg = 'Nominal harus lebih dari 0.';
                }
                if (field.type !== 'hidden') { setError(field, msg); }
                if (msg) { ok = false; if (!firstBad) { firstBad = field; } }
                if (visible && value) {
                    var label = field.getAttribute('data-label') || field.name;
                    if (field.name === 'amount') { value = 'Rp ' + formatID(parseInt(digits(value), 10)); }
                    if (field.tagName === 'SELECT') { value = field.options[field.selectedIndex].text.trim(); }
                    lines.push('- ' + label + ': ' + value);
                }
            });

            if (!ok) {
                if (firstBad) { firstBad.focus(); }
                toast('Mohon lengkapi data yang masih kosong atau belum sesuai.');
                return;
            }
            var intro = kind === 'relawan'
                ? 'Halo HopeTogether Foundation, saya ingin mendaftar sebagai relawan.'
                : 'Halo HopeTogether Foundation, saya ingin berdonasi.';
            var url = waURL(number, intro + '\n\n' + lines.join('\n') + '\n\nTerima kasih.');
            toast('Mengalihkan ke WhatsApp...');
            var w = window.open(url, '_blank', 'noopener');
            if (!w) { window.location.href = url; }
        });
    });

    /* ---------- Chatbot HopeBot ---------- */
    function escapeText(t) { var d = doc.createElement('div'); d.textContent = t; return d.innerHTML; }

    function findAnswer(q) {
        if (!chatData || !chatData.faq) { return null; }
        var nq = norm(q);
        if (!nq) { return null; }
        var best = null, bestScore = 0;
        chatData.faq.forEach(function (item) {
            var s = 0;
            if (norm(item.q) === nq) { s += 100; }
            (item.keywords || []).forEach(function (kw) {
                var k = norm(kw);
                if (k && nq.indexOf(k) !== -1) { s += k.indexOf(' ') !== -1 ? 3 : 2; }
            });
            if (s > bestScore) { bestScore = s; best = item; }
        });
        return bestScore >= 2 ? best : null;
    }

    function ChatView(root) {
        var log = $('[data-chat-log]', root);
        var form = $('[data-chat-form]', root);
        var input = $('[data-chat-input]', root);
        var greeted = false;
        var busy = false;

        function scrollDown() { if (log) { log.scrollTop = log.scrollHeight; } }
        function add(role, html) {
            var el = doc.createElement('div');
            el.className = 'hf-msg hf-msg--' + role;
            el.innerHTML = html;
            log.appendChild(el);
            scrollDown();
            return el;
        }
        function botReply(item) {
            var html;
            if (item) {
                html = '<span>' + escapeText(item.a) + '</span>';
                var url = item.link ? routes[item.link] : '';
                if (url) { html += '<br><a class="hf-msg__link" href="' + url + '">' + escapeText(item.link_label || 'Buka halaman') + ' &rarr;</a>'; }
            } else {
                html = '<span>' + escapeText(chatData.fallback) + '</span>';
            }
            return html;
        }
        function waLinkHTML() {
            return '<br><a class="hf-msg__link" target="_blank" rel="noopener" href="https://wa.me/' + (waNumber()) + '">Chat WhatsApp &rarr;</a>';
        }
        function ask(text) {
            text = String(text || '').trim();
            if (!text || busy || !chatData || !log) { return; }
            greet();
            busy = true;
            add('user', escapeText(text));
            var typing = add('bot', '<i></i><i></i><i></i>');
            typing.classList.add('hf-msg--typing');
            var nq = norm(text);
            setTimeout(function () {
                typing.remove();
                var html;
                if (/^(halo|hai|hi|hello|selamat)/.test(nq) && nq.split(' ').length <= 3) {
                    html = '<span>Halo juga! Ada yang ingin Anda ketahui tentang program, donasi, atau relawan?</span>';
                } else if (/terima kasih|makasih|thanks|thank you/.test(nq)) {
                    html = '<span>Sama-sama! Senang bisa membantu. Semoga harapan baik kita tumbuh bersama.</span>';
                } else {
                    var item = findAnswer(text);
                    html = botReply(item);
                    if (!item) { html += waLinkHTML(); }
                }
                add('bot', html);
                busy = false;
            }, reduceMotion ? 0 : 650);
        }
        function greet() {
            if (greeted || !chatData || !log) { return; }
            greeted = true;
            add('bot', '<strong>' + escapeText(chatData.greeting) + '</strong><br><span>' + escapeText(chatData.intro) + '</span>');
        }
        if (form && input) {
            form.addEventListener('submit', function (e) {
                e.preventDefault();
                var v = input.value;
                input.value = '';
                ask(v);
            });
        }
        return { ask: ask, greet: greet, focus: function () { if (input) { input.focus(); } } };
    }

    function waNumber() {
        var f = $('[data-wa]');
        if (f) { return f.getAttribute('data-wa'); }
        var link = $('.hf-fab--wa');
        if (link) {
            var m = (link.getAttribute('href') || '').match(/wa\.me\/(\d+)/);
            if (m) { return m[1]; }
        }
        return '';
    }

    var panel = $('#hf-chat');
    var toggleBtn = $('[data-chat-toggle]');
    var pageRoot = $('[data-chat-page]');
    var panelChat = panel ? ChatView(panel) : null;
    var pageChat = pageRoot ? ChatView(pageRoot) : null;
    var closeTimer = null;

    function openPanel() {
        if (!panel || !panelChat) { return; }
        clearTimeout(closeTimer);
        panel.hidden = false;
        requestAnimationFrame(function () { panel.classList.add('is-open'); });
        if (toggleBtn) { toggleBtn.setAttribute('aria-expanded', 'true'); }
        panelChat.greet();
        setTimeout(function () { panelChat.focus(); }, 280);
    }
    function closePanel() {
        if (!panel) { return; }
        panel.classList.remove('is-open');
        if (toggleBtn) { toggleBtn.setAttribute('aria-expanded', 'false'); }
        closeTimer = setTimeout(function () { panel.hidden = true; }, 280);
    }

    if (pageChat) {
        pageChat.greet();
        if (panel) { panel.hidden = true; }
    }
    if (toggleBtn) {
        toggleBtn.addEventListener('click', function () {
            if (pageChat && pageRoot) {
                pageRoot.scrollIntoView({ behavior: reduceMotion ? 'auto' : 'smooth', block: 'center' });
                pageChat.focus();
                return;
            }
            if (panel && panel.hidden) { openPanel(); } else { closePanel(); }
        });
    }
    $$('[data-chat-close]').forEach(function (b) { b.addEventListener('click', closePanel); });

    doc.addEventListener('click', function (e) {
        var t = e.target.closest ? e.target.closest('[data-ask], [data-ask-page]') : null;
        if (!t) { return; }
        var q = t.getAttribute('data-ask') || t.getAttribute('data-ask-page');
        if (pageChat) { pageChat.ask(q); pageChat.focus(); return; }
        if (panelChat) { openPanel(); setTimeout(function () { panelChat.ask(q); }, 220); }
    });
    var cardForm = $('[data-chat-card-form]');
    if (cardForm) {
        cardForm.addEventListener('submit', function (e) {
            e.preventDefault();
            var inp = $('input', cardForm);
            var v = inp ? inp.value.trim() : '';
            if (!v) { if (inp) { inp.focus(); } return; }
            inp.value = '';
            if (pageChat) { pageChat.ask(v); return; }
            if (panelChat) { openPanel(); setTimeout(function () { panelChat.ask(v); }, 220); }
        });
    }

    /* ---------- Keyboard ---------- */
    doc.addEventListener('keydown', function (e) {
        if (e.key !== 'Escape') { return; }
        if (searchBox && !searchBox.hidden) { closeSearch(); return; }
        if (panel && !panel.hidden) { closePanel(); return; }
        if (nav && nav.classList.contains('is-menu-open')) { setMenu(false); }
    });
})();
