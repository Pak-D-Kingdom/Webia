/* =========================================================================
   HopeTogether Foundation - Nonprofit & Community (Minimalist / Warm Neutral)
   foundation.js  |  Vanilla JS, tanpa dependensi. Semua modul aman jika elemennya tidak ada.
   Modul: toast, nav, search, dropdown, scroll (progress/parallax), reveal, counter, donut,
          filter berita, form->WhatsApp, donasi, chatbot HopeBot
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
    function escapeHTML(t) {
        return String(t).replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;').replace(/"/g, '&quot;');
    }
    function escRe(t) { return t.replace(/[.*+?^${}()|[\]\\]/g, '\\$&'); }

    var routes = readJSON('hf-routes', {});
    var chatData = readJSON('hf-chat-data', null);

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
        var onNavScroll = function () { nav.classList.toggle('is-scrolled', window.scrollY > 8); };
        onNavScroll();
        window.addEventListener('scroll', onNavScroll, { passive: true });
    }
    if (burger) {
        burger.addEventListener('click', function () { setMenu(!nav.classList.contains('is-menu-open')); });
        $$('[data-menu-link]').forEach(function (a) { a.addEventListener('click', function () { setMenu(false); }); });
        window.addEventListener('resize', function () { if (window.innerWidth >= 1200) { setMenu(false); } });
    }

    /* ---------- Search (command palette) ---------- */
    var searchBox = $('#hf-search');
    var searchInput = $('#hf-search-input');
    var searchList = $('#hf-search-list');
    var searchLabel = $('#hf-search-label');
    var searchOpener = null;
    var searchActive = -1;
    var searchPages = [
        { label: 'Beranda', desc: 'Ringkasan program, dampak, donasi, dan kabar terbaru', route: 'home', icon: 'ic-grid', kw: 'home utama awal' },
        { label: 'Misi & Visi', desc: 'Tujuan, nilai, dan langkah yang kami jalani', route: 'mission-vision', icon: 'ic-target', kw: 'tentang kami visi misi nilai yayasan' },
        { label: 'Program Kami', desc: 'Pendidikan, kesehatan, ekonomi, dan lingkungan', route: 'programs', icon: 'ic-grid', kw: 'program pendidikan kesehatan ekonomi lingkungan beasiswa' },
        { label: 'Laporan Dampak', desc: 'Penerima manfaat, sebaran provinsi, dan cerita lapangan', route: 'impact', icon: 'ic-chart', kw: 'dampak penerima manfaat provinsi peta statistik' },
        { label: 'Pilihan Donasi', desc: 'Donasi satu kali, rutin, barang, atau untuk program', route: 'donation', icon: 'ic-gift', kw: 'donasi berdonasi sumbang rutin barang bayar' },
        { label: 'Transparansi Keuangan', desc: 'Alokasi dana, laporan tahunan, dan audit independen', route: 'transparency', icon: 'ic-doc', kw: 'laporan keuangan audit dana transparansi unduh' },
        { label: 'Mitra & Sponsor', desc: 'Perusahaan dan komunitas yang bergerak bersama kami', route: 'partners', icon: 'ic-handshake', kw: 'mitra sponsor csr kerja sama bca mandiri bni unilever pertamina' },
        { label: 'Daftar Relawan', desc: 'Formulir pendaftaran dan manfaat menjadi relawan', route: 'volunteer', icon: 'ic-people', kw: 'relawan volunteer daftar bergabung' },
        { label: 'Berita & Acara', desc: 'Kabar terbaru dan agenda kegiatan mendatang', route: 'news', icon: 'ic-calendar-art', kw: 'berita acara agenda kegiatan event' },
        { label: 'Tanya HopeBot', desc: 'Asisten FAQ untuk program dan donasi', route: 'chatbot', icon: 'i-chat', line: true, kw: 'chatbot bot tanya faq bantuan' }
    ];
    function highlight(text, tokens) {
        var out = escapeHTML(text);
        tokens.forEach(function (t) {
            if (!t) { return; }
            out = out.replace(new RegExp('(' + escRe(escapeHTML(t)) + ')', 'ig'), '<mark>$1</mark>');
        });
        return out;
    }
    function setSearchActive(i, scroll) {
        var items = $$('.hf-search__item', searchList);
        if (!items.length) { searchActive = -1; return; }
        searchActive = (i + items.length) % items.length;
        items.forEach(function (el, idx) {
            var on = idx === searchActive;
            el.classList.toggle('is-active', on);
            el.parentNode.setAttribute('aria-selected', on ? 'true' : 'false');
            if (on && searchInput) { searchInput.setAttribute('aria-activedescendant', el.parentNode.id); }
            if (on && scroll && el.scrollIntoView) { el.scrollIntoView({ block: 'nearest' }); }
        });
    }
    function renderSearch(q) {
        if (!searchList) { return; }
        var nq = norm(q);
        var tokens = nq ? nq.split(' ') : [];
        var found = [];
        searchPages.forEach(function (p) {
            if (!routes[p.route]) { return; }
            var hay = norm(p.label + ' ' + p.desc + ' ' + p.kw);
            var lab = norm(p.label);
            var score = 0, ok = true;
            tokens.forEach(function (t) {
                if (hay.indexOf(t) === -1) { ok = false; return; }
                if (lab.indexOf(t) === 0) { score += 6; } else if (lab.indexOf(t) !== -1) { score += 4; }
                if (norm(p.kw).indexOf(t) !== -1) { score += 3; }
                score += 1;
            });
            if (ok) { found.push({ p: p, score: score }); }
        });
        if (tokens.length) { found.sort(function (a, b) { return b.score - a.score; }); }
        if (searchLabel) { searchLabel.textContent = tokens.length ? (found.length + ' hasil untuk "' + q.trim() + '"') : 'Halaman populer'; }
        if (!found.length) {
            searchList.innerHTML = '<li class="hf-search__empty" role="presentation"><span>Tidak ada halaman yang cocok dengan "' + escapeHTML(q.trim()) + '".</span><a href="' + (routes.chatbot || '#') + '">Tanya HopeBot &rarr;</a></li>';
            searchActive = -1;
            return;
        }
        var html = '';
        found.forEach(function (f, i) {
            var p = f.p;
            var icon = p.line
                ? '<svg class="hf-i" viewBox="0 0 24 24" aria-hidden="true"><use href="#' + p.icon + '"/></svg>'
                : '<svg viewBox="0 0 48 48" aria-hidden="true"><use href="#' + p.icon + '"/></svg>';
            html += '<li role="option" id="hf-sr-' + i + '" aria-selected="false"><a class="hf-search__item" href="' + routes[p.route] + '">' +
                '<span class="hf-search__icon">' + icon + '</span>' +
                '<span class="hf-search__txt"><strong>' + highlight(p.label, tokens) + '</strong><span>' + escapeHTML(p.desc) + '</span></span>' +
                '<svg class="hf-i" aria-hidden="true"><use href="#i-arrow"/></svg></a></li>';
        });
        searchList.innerHTML = html;
        setSearchActive(0, false);
    }
    function openSearch(opener) {
        if (!searchBox) { return; }
        searchOpener = opener || doc.activeElement;
        if (searchInput) { searchInput.value = ''; }
        renderSearch('');
        searchBox.hidden = false;
        doc.body.style.overflow = 'hidden';
        setTimeout(function () { if (searchInput) { searchInput.focus(); } }, 40);
    }
    function closeSearch() {
        if (!searchBox || searchBox.hidden) { return; }
        searchBox.hidden = true;
        doc.body.style.overflow = '';
        if (searchOpener && searchOpener.focus) { try { searchOpener.focus(); } catch (e) { /* abaikan */ } }
    }
    $$('[data-search-open]').forEach(function (b) { b.addEventListener('click', function () { openSearch(b); }); });
    $$('[data-search-close]').forEach(function (b) { b.addEventListener('click', closeSearch); });
    $$('[data-search-tag]').forEach(function (b) {
        b.addEventListener('click', function () {
            if (!searchInput) { return; }
            searchInput.value = b.getAttribute('data-search-tag');
            renderSearch(searchInput.value);
            searchInput.focus();
        });
    });
    if (searchInput) {
        searchInput.addEventListener('input', function () { renderSearch(searchInput.value); });
        searchInput.addEventListener('keydown', function (e) {
            if (e.key === 'ArrowDown') { e.preventDefault(); setSearchActive(searchActive + 1, true); }
            else if (e.key === 'ArrowUp') { e.preventDefault(); setSearchActive(searchActive - 1, true); }
            else if (e.key === 'Home') { e.preventDefault(); setSearchActive(0, true); }
            else if (e.key === 'End') { e.preventDefault(); setSearchActive(-1, true); }
            else if (e.key === 'Enter') {
                var items = $$('.hf-search__item', searchList);
                var target = items[searchActive];
                if (!target) { target = $('.hf-search__empty a', searchList); }
                if (target) { e.preventDefault(); window.location.href = target.getAttribute('href'); }
            }
        });
    }
    if (searchList) {
        searchList.addEventListener('mousemove', function (e) {
            var li = e.target.closest ? e.target.closest('li[role="option"]') : null;
            if (!li) { return; }
            var idx = $$('li[role="option"]', searchList).indexOf(li);
            if (idx !== searchActive) { setSearchActive(idx, false); }
        });
    }
    doc.addEventListener('keydown', function (e) {
        if (e.key !== '/' || e.ctrlKey || e.metaKey || e.altKey) { return; }
        var t = e.target;
        var tag = t && t.tagName ? t.tagName.toLowerCase() : '';
        if (tag === 'input' || tag === 'textarea' || tag === 'select' || (t && t.isContentEditable)) { return; }
        if (searchBox && searchBox.hidden) { e.preventDefault(); openSearch(null); }
    });

    /* ---------- Dropdown kustom (select.hf-select) ---------- */
    function enhanceSelect(sel) {
        if (sel.getAttribute('data-enhanced')) { return; }
        sel.setAttribute('data-enhanced', '1');
        var wrap = doc.createElement('div');
        wrap.className = 'hf-dd';
        sel.parentNode.insertBefore(wrap, sel);
        wrap.appendChild(sel);
        sel.classList.add('hf-dd__native');
        sel.setAttribute('tabindex', '-1');
        sel.setAttribute('aria-hidden', 'true');

        var uid = sel.id || ('dd' + Math.floor(Math.random() * 100000));
        var btn = doc.createElement('button');
        btn.type = 'button';
        btn.className = 'hf-dd__btn';
        btn.id = uid + '-btn';
        btn.setAttribute('aria-haspopup', 'listbox');
        btn.setAttribute('aria-expanded', 'false');
        btn.innerHTML = '<span class="hf-dd__value"></span><svg class="hf-i hf-dd__chev" aria-hidden="true"><use href="#i-chevron"/></svg>';
        var list = doc.createElement('ul');
        list.className = 'hf-dd__list';
        list.setAttribute('role', 'listbox');
        list.id = uid + '-list';
        list.setAttribute('tabindex', '-1');
        btn.setAttribute('aria-controls', list.id);
        wrap.appendChild(btn);
        wrap.appendChild(list);

        var label = sel.id ? doc.querySelector('label[for="' + sel.id + '"]') : null;
        if (label) { label.setAttribute('for', btn.id); }

        var valueEl = $('.hf-dd__value', btn);
        var opts = [];
        var active = 0;

        Array.prototype.forEach.call(sel.options, function (o, i) {
            var li = doc.createElement('li');
            li.className = 'hf-dd__opt';
            li.setAttribute('role', 'option');
            li.id = uid + '-opt-' + i;
            li.innerHTML = '<span></span><svg class="hf-i" aria-hidden="true"><use href="#i-check"/></svg>';
            $('span', li).textContent = o.text.trim();
            li.addEventListener('mousedown', function (e) { e.preventDefault(); });
            li.addEventListener('click', function () { choose(i); });
            li.addEventListener('mousemove', function () { setActive(i); });
            list.appendChild(li);
            opts.push(li);
        });

        function sync() {
            var idx = sel.selectedIndex < 0 ? 0 : sel.selectedIndex;
            valueEl.textContent = sel.options[idx] ? sel.options[idx].text.trim() : '';
            opts.forEach(function (li, i) {
                li.classList.toggle('is-selected', i === idx);
                li.setAttribute('aria-selected', i === idx ? 'true' : 'false');
            });
            active = idx;
        }
        function setActive(i) {
            active = Math.max(0, Math.min(opts.length - 1, i));
            opts.forEach(function (li, k) { li.classList.toggle('is-active', k === active); });
            btn.setAttribute('aria-activedescendant', opts[active].id);
            if (opts[active].scrollIntoView) { opts[active].scrollIntoView({ block: 'nearest' }); }
        }
        function isOpen() { return wrap.classList.contains('is-open'); }
        function open() {
            if (isOpen()) { return; }
            $$('.hf-dd.is-open').forEach(function (d) { d.classList.remove('is-open'); });
            var r = btn.getBoundingClientRect();
            var need = Math.min(280, opts.length * 44 + 20);
            wrap.classList.toggle('is-up', window.innerHeight - r.bottom < need && r.top > need);
            wrap.classList.add('is-open');
            btn.setAttribute('aria-expanded', 'true');
            setActive(sel.selectedIndex < 0 ? 0 : sel.selectedIndex);
        }
        function close(focusBtn) {
            wrap.classList.remove('is-open');
            btn.setAttribute('aria-expanded', 'false');
            btn.removeAttribute('aria-activedescendant');
            if (focusBtn) { btn.focus(); }
        }
        function choose(i) {
            sel.selectedIndex = i;
            sel.dispatchEvent(new Event('change', { bubbles: true }));
            sync();
            close(true);
        }
        btn.addEventListener('click', function () { if (isOpen()) { close(false); } else { open(); } });
        btn.addEventListener('keydown', function (e) {
            var k = e.key;
            if (k === 'ArrowDown' || k === 'ArrowUp') {
                e.preventDefault();
                if (!isOpen()) { open(); } else { setActive(active + (k === 'ArrowDown' ? 1 : -1)); }
            } else if (k === 'Enter' || k === ' ') {
                e.preventDefault();
                if (isOpen()) { choose(active); } else { open(); }
            } else if (k === 'Escape') {
                if (isOpen()) { e.preventDefault(); e.stopPropagation(); close(false); }
            } else if (k === 'Tab') {
                if (isOpen()) { close(false); }
            } else if (k === 'Home' && isOpen()) { e.preventDefault(); setActive(0); }
            else if (k === 'End' && isOpen()) { e.preventDefault(); setActive(opts.length - 1); }
            else if (k.length === 1 && /\S/.test(k)) {
                var ch = k.toLowerCase();
                for (var n = 1; n <= opts.length; n++) {
                    var idx = (active + n) % opts.length;
                    if (opts[idx].textContent.trim().toLowerCase().indexOf(ch) === 0) { if (!isOpen()) { open(); } setActive(idx); break; }
                }
            }
        });
        doc.addEventListener('click', function (e) { if (isOpen() && !wrap.contains(e.target)) { close(false); } });
        sel.addEventListener('change', sync);
        sel._hfSync = sync;
        sync();
    }
    $$('select.hf-select').forEach(enhanceSelect);

    /* ---------- Progress scroll, parallax, penghitung karakter ---------- */
    var progressBar = $('[data-scroll-progress]');
    var parallaxEls = $$('[data-parallax]');
    var ticking = false;
    function onFrame() {
        ticking = false;
        var h = doc.documentElement;
        var max = h.scrollHeight - h.clientHeight;
        if (progressBar) { progressBar.style.transform = 'scaleX(' + (max > 0 ? Math.min(1, h.scrollTop / max) : 0) + ')'; }
        if (!reduceMotion) {
            parallaxEls.forEach(function (el) {
                var img = $('img', el);
                if (!img) { return; }
                var r = el.getBoundingClientRect();
                if (r.bottom < 0 || r.top > window.innerHeight) { return; }
                var shift = Math.max(-22, Math.min(22, -(r.top + r.height / 2 - window.innerHeight / 2) * 0.06));
                img.style.transform = 'translateY(' + shift.toFixed(1) + 'px) scale(1.1)';
            });
        }
    }
    function requestFrame() { if (!ticking) { ticking = true; requestAnimationFrame(onFrame); } }
    window.addEventListener('scroll', requestFrame, { passive: true });
    window.addEventListener('resize', requestFrame);
    onFrame();
    $$('[data-count-target]').forEach(function (ta) {
        var out = doc.getElementById(ta.getAttribute('data-count-target'));
        var max = ta.getAttribute('maxlength') || '300';
        var upd = function () { if (out) { out.textContent = ta.value.length + '/' + max; } };
        ta.addEventListener('input', upd);
        upd();
    });

    /* ---------- Reveal on scroll ---------- */
    $$('[data-stagger]').forEach(function (c) {
        Array.prototype.forEach.call(c.children, function (ch, i) {
            ch.setAttribute('data-reveal', '');
            ch.style.setProperty('--i', String(i % 6));
        });
    });
    var revealEls = $$('[data-reveal]');
    function revealDone(el) {
        el.classList.add('is-in');
        // setelah animasi selesai, lepas atribut agar hover/transisi bawaan komponen tidak terganggu
        setTimeout(function () { el.removeAttribute('data-reveal'); el.style.removeProperty('--i'); }, 1600);
    }
    if ('IntersectionObserver' in window && !reduceMotion) {
        var io = new IntersectionObserver(function (entries) {
            entries.forEach(function (en) {
                if (en.isIntersecting) { revealDone(en.target); io.unobserve(en.target); }
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
        if (sel._hfSync) { sel._hfSync(); }
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
                html = '<span>' + escapeHTML(item.a) + '</span>';
                var url = item.link ? routes[item.link] : '';
                if (url) { html += '<br><a class="hf-msg__link" href="' + url + '">' + escapeHTML(item.link_label || 'Buka halaman') + ' &rarr;</a>'; }
            } else {
                html = '<span>' + escapeHTML(chatData.fallback) + '</span>';
            }
            return html;
        }
        function waLinkHTML() {
            return '<br><a class="hf-msg__link" target="_blank" rel="noopener" href="https://wa.me/' + waNumber() + '">Chat WhatsApp &rarr;</a>';
        }
        function ask(text) {
            text = String(text || '').trim();
            if (!text || busy || !chatData || !log) { return; }
            greet();
            busy = true;
            add('user', escapeHTML(text));
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
            add('bot', '<strong>' + escapeHTML(chatData.greeting) + '</strong><br><span>' + escapeHTML(chatData.intro) + '</span>');
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
