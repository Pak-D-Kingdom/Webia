/*
|--------------------------------------------------------------------------
| WEBIA by D-KREASI - Eventora (Event Organizer & Planner)
|--------------------------------------------------------------------------
| Template : wedding-event / creative / event-organizer-purple-dream
| File     : event-organizer.js
|
| JavaScript vanilla (tanpa dependensi). Seluruh modul di-scope pada
| <body class="eo"> dan hanya aktif bila elemen terkait ada di halaman.
| Modul: navbar, pencarian, reveal, counter, marquee, filter
| portofolio, lightbox/highlight, switch paket, custom select, datepicker,
| form penawaran (WhatsApp), newsletter, modal legal, hero dust, timeline,
| dan AI chatbot (floating + halaman FAQ).
*/
(function () {
    'use strict';

    var doc = document;
    var win = window;
    var body = doc.body;
    if (!body || !body.classList.contains('eo')) { return; }

    var BASE = body.getAttribute('data-eo-base') || '';
    var WA = body.getAttribute('data-eo-wa') || '';
    var PAGE = body.getAttribute('data-eo-page') || '';
    var reduceMotion = !!(win.matchMedia && win.matchMedia('(prefers-reduced-motion: reduce)').matches);
    var MQ_NAV = win.matchMedia ? win.matchMedia('(min-width: 1181px)') : { matches: true };
var MQ_HOVER = win.matchMedia ? win.matchMedia('(hover: hover) and (pointer: fine)') : { matches: false };
    var MQ_MARQUEE = win.matchMedia ? win.matchMedia('(max-width: 1100px)') : { matches: false };

    /* ---------------------------------------------------------------- util */
    function qs(sel, root) { return (root || doc).querySelector(sel); }
    function qsa(sel, root) { return Array.prototype.slice.call((root || doc).querySelectorAll(sel)); }
    function on(node, evt, fn, opts) { if (node) { node.addEventListener(evt, fn, opts || false); } }
    function make(tag, cls, html) {
        var node = doc.createElement(tag);
        if (cls) { node.className = cls; }
        if (html !== undefined) { node.innerHTML = html; }
        return node;
    }
    function esc(str) {
        return String(str).replace(/[&<>"']/g, function (c) {
            return { '&': '&amp;', '<': '&lt;', '>': '&gt;', '"': '&quot;', "'": '&#39;' }[c];
        });
    }
    function lockScroll(state) { body.classList.toggle('is-locked', !!state); }
    function raf(fn) { return (win.requestAnimationFrame || function (cb) { return setTimeout(cb, 16); })(fn); }
    function openLink(url) {
        var a = make('a');
        a.href = url; a.target = '_blank'; a.rel = 'noopener noreferrer';
        a.style.display = 'none';
        body.appendChild(a); a.click(); body.removeChild(a);
    }
    function waUrl(text) { return 'https://wa.me/' + WA + '?text=' + encodeURIComponent(text); }
    function getParam(name) {
        try { return new URLSearchParams(win.location.search).get(name) || ''; } catch (e) { return ''; }
    }
    function focusables(root) {
        return qsa('a[href], button:not([disabled]), input:not([disabled]):not([type="hidden"]), textarea, select, [tabindex]:not([tabindex="-1"])', root)
            .filter(function (n) { return n.offsetParent !== null; });
    }
    function trapTab(root, e) {
        if (e.key !== 'Tab') { return; }
        var list = focusables(root);
        if (!list.length) { return; }
        var first = list[0], last = list[list.length - 1];
        if (e.shiftKey && doc.activeElement === first) { e.preventDefault(); last.focus(); }
        else if (!e.shiftKey && doc.activeElement === last) { e.preventDefault(); first.focus(); }
    }

    /* ----------------------------------------------------------- navbar */
    var nav = qs('[data-eo-nav]');
    var toggle = qs('.eo-nav__toggle');

    function setMenu(open) {
        if (!nav || !toggle) { return; }
        nav.classList.toggle('is-menu-open', open);
        toggle.setAttribute('aria-expanded', open ? 'true' : 'false');
        toggle.setAttribute('aria-label', open ? 'Tutup menu' : 'Buka menu');
    }
    on(toggle, 'click', function () { setMenu(!nav.classList.contains('is-menu-open')); });

    var stuckTick = false;
    function onScrollNav() {
        if (stuckTick || !nav) { return; }
        stuckTick = true;
        raf(function () {
            var y = win.pageYOffset || 0;
            var max = Math.max((doc.documentElement.scrollHeight || 0) - (win.innerHeight || 0), 1);
            nav.classList.toggle('is-stuck', y > 8);
            nav.style.setProperty('--eo-scroll', Math.min(Math.max(y / max, 0), 1).toFixed(4));
            stuckTick = false;
        });
    }
    on(win, 'scroll', onScrollNav, { passive: true });
    on(win, 'resize', onScrollNav);
    onScrollNav();

    qsa('.eo-nav__menu a').forEach(function (a) {
        on(a, 'click', function () { setMenu(false); });
    });

    /* ---------------------------------------------------------- modal */
    var activeModal = null;
    var lastOpener = null;
    function openOverlay(node, opener, focusSel) {
        if (!node) { return; }
        closeOverlay(true);
        activeModal = node; lastOpener = opener || null;
        node.hidden = false; lockScroll(true);
        var target = focusSel ? qs(focusSel, node) : null;
        if (!target) { target = focusables(node)[0]; }
        if (target) { setTimeout(function () { target.focus({ preventScroll: true }); }, 30); }
    }
    function closeOverlay(silent) {
        if (!activeModal) { return; }
        var node = activeModal;
        node.hidden = true; activeModal = null; lockScroll(false);
        if (node.hasAttribute('data-eo-lightbox-modal')) { stopSlides(); }
        if (!silent && lastOpener && lastOpener.focus) { lastOpener.focus({ preventScroll: true }); }
    }
    qsa('[data-eo-modal-close], [data-eo-search-close]').forEach(function (b) { on(b, 'click', function () { closeOverlay(false); }); });

    /* -------------------------------------------------------- pencarian */
    var searchBox = qs('[data-eo-search]');
    var searchInput = qs('[data-eo-search-input]');
    var searchItems = qsa('[data-eo-search-list] li');
    var searchEmpty = qs('[data-eo-search-empty]');
    function filterSearch() {
        var q = (searchInput && searchInput.value || '').toLowerCase().trim();
        var tokens = q.split(/\s+/).filter(Boolean);
        var shown = 0;
        searchItems.forEach(function (li) {
            var hay = (li.getAttribute('data-kw') || '').toLowerCase();
            var ok = tokens.every(function (t) { return hay.indexOf(t) !== -1; });
            li.hidden = !ok; if (ok) { shown++; }
        });
        if (searchEmpty) { searchEmpty.hidden = shown !== 0; }
    }
    qsa('[data-eo-search-open]').forEach(function (b) {
        on(b, 'click', function () {
            if (searchInput) { searchInput.value = ''; }
            filterSearch();
            openOverlay(searchBox, b, '[data-eo-search-input]');
        });
    });
    on(searchInput, 'input', filterSearch);
    on(qs('[data-eo-search-form]'), 'submit', function (e) {
        e.preventDefault();
        var first = searchItems.filter(function (li) { return !li.hidden; })[0];
        var link = first && qs('a', first);
        if (link) { win.location.href = link.href; }
    });

    /* ---------------------------------------------------------- legal */
    var legalModal = qs('[data-eo-legal-modal]');
    qsa('[data-eo-legal]').forEach(function (b) {
        on(b, 'click', function () {
            var key = b.getAttribute('data-eo-legal');
            qsa('[data-eo-legal-doc]', legalModal).forEach(function (d) { d.hidden = d.getAttribute('data-eo-legal-doc') !== key; });
            openOverlay(legalModal, b, '.eo-modal__x');
        });
    });

    /* --------------------------------------------- lightbox + highlight */
    var lbModal = qs('[data-eo-lightbox-modal]');
    var lbBox = lbModal ? qs('.eo-lightbox', lbModal) : null;
    var lbSlides = lbModal ? qs('[data-eo-lb-slides]', lbModal) : null;
    var lbProgress = lbModal ? qs('[data-eo-lb-progress] i', lbModal) : null;
    var lbIndex = 0, lbTimer = null, lbAuto = false;

    function stopSlides() { clearTimeout(lbTimer); lbTimer = null; if (lbProgress) { lbProgress.classList.remove('is-run'); } }
    function showSlide(i) {
        var imgs = qsa('img', lbSlides);
        if (!imgs.length) { return; }
        lbIndex = (i + imgs.length) % imgs.length;
        imgs.forEach(function (im, n) { im.classList.toggle('is-on', n === lbIndex); });
        stopSlides();
        if (lbAuto && imgs.length > 1) {
            if (lbProgress) { void lbProgress.offsetWidth; lbProgress.style.setProperty('--dur', '3.6s'); lbProgress.classList.add('is-run'); }
            lbTimer = setTimeout(function () { showSlide(lbIndex + 1); }, 3600);
        }
    }
    function openGallery(btn, auto) {
        if (!lbModal || !lbSlides) { return; }
        var imgs = (btn.getAttribute('data-imgs') || '').split('|').filter(Boolean);
        lbSlides.innerHTML = '';
        imgs.forEach(function (src, n) {
            var im = make('img'); im.src = src; im.alt = n === 0 ? (btn.getAttribute('data-title') || '') : ''; im.decoding = 'async';
            lbSlides.appendChild(im);
        });
        qs('[data-eo-lb-tag]', lbModal).textContent = btn.getAttribute('data-tag') || '';
        qs('[data-eo-lb-title]', lbModal).textContent = btn.getAttribute('data-title') || '';
        qs('[data-eo-lb-meta]', lbModal).textContent = btn.getAttribute('data-meta') || '';
        qs('[data-eo-lb-text]', lbModal).textContent = btn.getAttribute('data-text') || '';
        lbBox.classList.toggle('is-single', imgs.length < 2);
        lbAuto = !!auto && !reduceMotion;
        openOverlay(lbModal, btn, '.eo-modal__x');
        showSlide(0);
    }
    qsa('[data-eo-lightbox]').forEach(function (b) { on(b, 'click', function () { openGallery(b, false); }); });
    qsa('[data-eo-highlight]').forEach(function (b) { on(b, 'click', function () { openGallery(b, true); }); });
    on(qs('[data-eo-lb-prev]'), 'click', function () { lbAuto = false; showSlide(lbIndex - 1); });
    on(qs('[data-eo-lb-next]'), 'click', function () { lbAuto = false; showSlide(lbIndex + 1); });

    /* --------------------------------------------------- filter portofolio */
    var gallery = qs('[data-eo-gallery]');
    var galleryEmpty = qs('[data-eo-gallery-empty]');
    var filters = qsa('[data-eo-filter]');
    function applyFilter(key) {
        if (!gallery) { return; }
        var shown = 0;
        filters.forEach(function (f) {
            var active = f.getAttribute('data-eo-filter') === key;
            f.classList.toggle('is-active', active);
            f.setAttribute('aria-pressed', active ? 'true' : 'false');
        });
        qsa('.eo-shot', gallery).forEach(function (shot) {
            var ok = key === 'all' || shot.getAttribute('data-cat') === key;
            shot.classList.toggle('is-hidden', !ok);
            if (ok) {
                shown++;
                shot.classList.remove('is-visible');
                void shot.offsetWidth;
                shot.style.setProperty('--eo-delay', (Math.min(shown, 8) * 0.05) + 's');
                shot.classList.add('is-visible');
            }
        });
        if (galleryEmpty) { galleryEmpty.hidden = shown !== 0; }
    }
    filters.forEach(function (f) { on(f, 'click', function () { applyFilter(f.getAttribute('data-eo-filter')); }); });
    if (gallery) {
        var wanted = getParam('kategori');
        var valid = filters.some(function (f) { return f.getAttribute('data-eo-filter') === wanted; });
        if (valid) { applyFilter(wanted); }
    }

    /* -------------------------------------------------------- switch paket */
    var pkgSwitch = qs('[data-eo-pkgswitch]');
    function setPkgType(type) {
        if (!pkgSwitch) { return; }
        pkgSwitch.setAttribute('data-active', type);
        qsa('button', pkgSwitch).forEach(function (b) {
            var on_ = b.getAttribute('data-type') === type;
            b.classList.toggle('is-active', on_); b.setAttribute('aria-selected', on_ ? 'true' : 'false');
        });
        qsa('[data-pkgset]').forEach(function (s) { s.classList.toggle('is-active', s.getAttribute('data-pkgset') === type); });
    }
    if (pkgSwitch) {
        qsa('button', pkgSwitch).forEach(function (b) { on(b, 'click', function () { setPkgType(b.getAttribute('data-type')); }); });
        var tipe = getParam('tipe');
        if (tipe === 'corporate' || tipe === 'private') { setPkgType(tipe); }
    }

    /* ------------------------------------------------------ custom select */
    var selects = qsa('[data-eo-select]');
    function closeSelects(except) {
        selects.forEach(function (s) {
            if (s !== except && s.classList.contains('is-open')) { toggleSelect(s, false); }
        });
    }
    function toggleSelect(root, open) {
        root.classList.toggle('is-open', open);
        var btn = qs('.eo-select__btn', root);
        btn.setAttribute('aria-expanded', open ? 'true' : 'false');
        if (open) {
            closeSelects(root); closeDates(null);
            var sel = qs('li[aria-selected="true"]', root) || qs('li', root);
            setFocusOpt(root, sel);
        } else { qsa('li.is-focus', root).forEach(function (l) { l.classList.remove('is-focus'); }); }
    }
    function setFocusOpt(root, li) {
        qsa('li.is-focus', root).forEach(function (l) { l.classList.remove('is-focus'); });
        if (li) { li.classList.add('is-focus'); if (li.scrollIntoView) { li.scrollIntoView({ block: 'nearest' }); } }
    }
    function chooseOpt(root, li) {
        var input = qs('input[type="hidden"]', root);
        var val = li ? li.getAttribute('data-value') : '';
        qsa('li', root).forEach(function (l) { l.setAttribute('aria-selected', l === li ? 'true' : 'false'); });
        input.value = val;
        var label = qs('.eo-select__val', root);
        label.textContent = val || label.getAttribute('data-placeholder');
        label.classList.toggle('is-placeholder', !val);
        clearInvalid(root.closest('[data-eo-field]'));
    }
    function setSelectValue(name, value) {
        var input = qs('input[name="' + name + '"]');
        if (!input) { return; }
        var root = input.closest('[data-eo-select]');
        var li = qsa('li', root).filter(function (l) { return l.getAttribute('data-value') === value; })[0];
        if (li) { chooseOpt(root, li); }
    }
    selects.forEach(function (root) {
        var btn = qs('.eo-select__btn', root);
        var list = qs('.eo-select__list', root);
        chooseOpt(root, null);
        on(btn, 'click', function (e) { e.stopPropagation(); toggleSelect(root, !root.classList.contains('is-open')); });
        on(list, 'click', function (e) {
            var li = e.target.closest('li'); if (!li) { return; }
            chooseOpt(root, li); toggleSelect(root, false); btn.focus();
        });
        on(btn, 'keydown', function (e) {
            var open = root.classList.contains('is-open');
            var opts = qsa('li', root);
            var cur = qs('li.is-focus', root);
            var idx = opts.indexOf(cur);
            if (e.key === 'ArrowDown' || e.key === 'ArrowUp') {
                e.preventDefault();
                if (!open) { toggleSelect(root, true); return; }
                idx = e.key === 'ArrowDown' ? Math.min(idx + 1, opts.length - 1) : Math.max(idx - 1, 0);
                setFocusOpt(root, opts[idx]);
            } else if (e.key === 'Home' && open) { e.preventDefault(); setFocusOpt(root, opts[0]); }
            else if (e.key === 'End' && open) { e.preventDefault(); setFocusOpt(root, opts[opts.length - 1]); }
            else if ((e.key === 'Enter' || e.key === ' ') && open) {
                e.preventDefault(); if (cur) { chooseOpt(root, cur); } toggleSelect(root, false);
            } else if (e.key === 'Escape' && open) { e.stopPropagation(); toggleSelect(root, false); }
            else if (e.key === 'Tab' && open) { toggleSelect(root, false); }
        });
    });

    /* ------------------------------------------------------- date picker */
    var MONTHS = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
    var DAYS_LONG = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
    var DOW = ['Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab', 'Min'];
    var dates = qsa('[data-eo-date]');
    function pad(n) { return (n < 10 ? '0' : '') + n; }
    function iso(y, m, d) { return y + '-' + pad(m + 1) + '-' + pad(d); }
    function closeDates(except) {
        dates.forEach(function (dt) { if (dt !== except) { toggleDate(dt, false); } });
    }
    function toggleDate(root, open) {
        var pop = qs('.eo-date__pop', root);
        var btn = qs('.eo-select__btn', root);
        if (!pop) { return; }
        pop.hidden = !open;
        btn.setAttribute('aria-expanded', open ? 'true' : 'false');
        if (open) { closeDates(root); closeSelects(null); renderCal(root); }
    }
    function renderCal(root) {
        var pop = qs('.eo-date__pop', root);
        var input = qs('input[type="hidden"]', root);
        var today = new Date(); today.setHours(0, 0, 0, 0);
        var y = parseInt(root.getAttribute('data-y'), 10), m = parseInt(root.getAttribute('data-m'), 10);
        if (isNaN(y) || isNaN(m)) {
            var base = input.value ? new Date(input.value + 'T00:00:00') : today;
            y = base.getFullYear(); m = base.getMonth();
        }
        root.setAttribute('data-y', y); root.setAttribute('data-m', m);
        var first = new Date(y, m, 1);
        var offset = (first.getDay() + 6) % 7;
        var days = new Date(y, m + 1, 0).getDate();
        var minY = today.getFullYear(), minM = today.getMonth();
        var atMin = y === minY && m === minM;
        var html = '<div class="eo-cal__head"><button type="button" class="eo-cal__nav" data-cal="prev" aria-label="Bulan sebelumnya"' + (atMin ? ' disabled' : '') + '><svg class="eo-i" aria-hidden="true"><use href="#i-chev-left"/></svg></button>' +
            '<strong>' + MONTHS[m] + ' ' + y + '</strong>' +
            '<button type="button" class="eo-cal__nav" data-cal="next" aria-label="Bulan berikutnya"><svg class="eo-i" aria-hidden="true"><use href="#i-chev-right"/></svg></button></div><div class="eo-cal__grid">';
        DOW.forEach(function (d) { html += '<span class="eo-cal__dow">' + d + '</span>'; });
        for (var i = 0; i < offset; i++) { html += '<span></span>'; }
        for (var d = 1; d <= days; d++) {
            var cur = new Date(y, m, d);
            var past = cur < today;
            var val = iso(y, m, d);
            var cls = 'eo-cal__day' + (cur.getTime() === today.getTime() ? ' is-today' : '') + (input.value === val ? ' is-selected' : '');
            html += '<button type="button" class="' + cls + '" data-day="' + val + '"' + (past ? ' disabled' : '') + '>' + d + '</button>';
        }
        html += '</div>';
        pop.innerHTML = html;
    }
    dates.forEach(function (root) {
        var btn = qs('.eo-select__btn', root);
        var pop = qs('.eo-date__pop', root);
        var input = qs('input[type="hidden"]', root);
        var label = qs('.eo-select__val', root);
        label.classList.add('is-placeholder');
        on(btn, 'click', function (e) { e.stopPropagation(); toggleDate(root, pop.hidden); });
        on(pop, 'click', function (e) {
            e.stopPropagation();
            var nav_ = e.target.closest('[data-cal]');
            var day = e.target.closest('[data-day]');
            if (nav_) {
                var y = parseInt(root.getAttribute('data-y'), 10), m = parseInt(root.getAttribute('data-m'), 10);
                m += nav_.getAttribute('data-cal') === 'next' ? 1 : -1;
                if (m < 0) { m = 11; y--; } if (m > 11) { m = 0; y++; }
                root.setAttribute('data-y', y); root.setAttribute('data-m', m); renderCal(root);
            } else if (day) {
                var v = day.getAttribute('data-day'); var p = v.split('-');
                var dt = new Date(+p[0], +p[1] - 1, +p[2]);
                input.value = v;
                label.textContent = DAYS_LONG[dt.getDay()] + ', ' + dt.getDate() + ' ' + MONTHS[dt.getMonth()] + ' ' + dt.getFullYear();
                label.classList.remove('is-placeholder');
                clearInvalid(root.closest('[data-eo-field]'));
                toggleDate(root, false); btn.focus();
            }
        });
    });

    /* ----------------------------------------------------- form penawaran */
    function setInvalid(field, msg) {
        if (!field) { return; }
        field.classList.add('is-invalid');
        var m = qs('[data-eo-msg]', field); if (m) { m.textContent = msg; }
    }
    function clearInvalid(field) {
        if (!field) { return; }
        field.classList.remove('is-invalid');
        var m = qs('[data-eo-msg]', field); if (m) { m.textContent = ''; }
    }
    function val(form, name) {
        var f = form.elements[name];
        return f ? String(f.value || '').replace(/\s+/g, ' ').trim() : '';
    }
    var quote = qs('[data-eo-quote]');
    if (quote) {
        var formMsg = qs('[data-eo-form-msg]', quote);
        var EVENT_MAP = { wedding: 'Wedding & Engagement', corporate: 'Corporate Event', festival: 'Festival & Celebration', concert: 'Concert & Show', exhibition: 'Exhibition & Launching', seminar: 'Seminar & Workshop' };
        var PKG_MAP = { basic: 'Basic Package', premium: 'Premium Package', exclusive: 'Exclusive Package' };
        var qLayanan = getParam('layanan'), qPaket = getParam('paket');
        if (EVENT_MAP[qLayanan]) { setSelectValue('jenis', EVENT_MAP[qLayanan]); }
        if (PKG_MAP[qPaket]) { setSelectValue('paket', PKG_MAP[qPaket]); }
        var tipeLabel = getParam('tipe') === 'corporate' ? 'Corporate' : (getParam('tipe') === 'private' ? 'Private' : '');
        if (tipeLabel && PKG_MAP[qPaket] && !EVENT_MAP[qLayanan]) { setSelectValue('jenis', tipeLabel === 'Corporate' ? 'Corporate Event' : ''); }

        qsa('input, textarea', quote).forEach(function (f) {
            on(f, 'input', function () { clearInvalid(f.closest('[data-eo-field]')); if (formMsg) { formMsg.textContent = ''; } });
        });
        on(quote, 'submit', function (e) {
            e.preventDefault();
            var ok = true, firstBad = null;
            function bad(name, msg) {
                var f = quote.elements[name];
                var field = f && f.closest('[data-eo-field]');
                setInvalid(field, msg); ok = false;
                if (!firstBad) { firstBad = field; }
            }
            qsa('[data-eo-field]', quote).forEach(clearInvalid);
            if (val(quote, 'nama').length < 2) { bad('nama', 'Nama lengkap wajib diisi.'); }
            if (!/^[^\s@]+@[^\s@]+\.[^\s@]{2,}$/.test(val(quote, 'email'))) { bad('email', 'Masukkan alamat email yang valid.'); }
            var digits = val(quote, 'whatsapp').replace(/[^0-9]/g, '');
            if (digits.length < 9 || digits.length > 15) { bad('whatsapp', 'Masukkan nomor WhatsApp yang valid (9-15 digit).'); }
            if (!val(quote, 'jenis')) { bad('jenis', 'Pilih jenis acara Anda.'); }
            if (!val(quote, 'tanggal')) { bad('tanggal', 'Pilih tanggal acara.'); }
            if (!ok) {
                if (formMsg) { formMsg.textContent = 'Mohon lengkapi kolom yang ditandai.'; }
                var focusTarget = firstBad && (qs('input:not([type="hidden"]), textarea, .eo-select__btn', firstBad));
                if (focusTarget) { focusTarget.focus(); }
                return;
            }
            var lines = ['Halo Eventora, saya ingin meminta penawaran acara.', '',
                '*Nama*: ' + val(quote, 'nama'), '*Email*: ' + val(quote, 'email'), '*WhatsApp*: ' + val(quote, 'whatsapp'),
                '*Jenis Acara*: ' + val(quote, 'jenis'), '*Tanggal Acara*: ' + (qs('.eo-date .eo-select__val', quote) || {}).textContent];
            if (val(quote, 'tamu')) { lines.push('*Perkiraan Tamu*: ' + val(quote, 'tamu')); }
            if (val(quote, 'anggaran')) { lines.push('*Anggaran*: ' + val(quote, 'anggaran')); }
            if (val(quote, 'lokasi')) { lines.push('*Lokasi*: ' + val(quote, 'lokasi')); }
            if (val(quote, 'paket')) { lines.push('*Paket*: ' + val(quote, 'paket') + (tipeLabel ? ' (' + tipeLabel + ')' : '')); }
            if (val(quote, 'catatan')) { lines.push('*Catatan*: ' + val(quote, 'catatan')); }
            lines.push('', 'Terima kasih.');
            openLink(waUrl(lines.join('\n')));
            if (formMsg) { formMsg.style.color = '#1d8f4f'; formMsg.textContent = 'WhatsApp dibuka dengan pesan yang sudah terisi. Tekan kirim di WhatsApp untuk menyelesaikan.'; }
        });
    }

    /* ------------------------------------------------------- newsletter */
    var news = qs('[data-eo-newsletter]');
    if (news) {
        var newsMsg = qs('[data-eo-news-msg]');
        on(news, 'submit', function (e) {
            e.preventDefault();
            var email = String(news.elements.email.value || '').trim();
            newsMsg.className = 'eo-news__msg';
            if (!/^[^\s@]+@[^\s@]+\.[^\s@]{2,}$/.test(email)) {
                newsMsg.classList.add('is-err'); newsMsg.textContent = 'Masukkan alamat email yang valid.'; return;
            }
            newsMsg.classList.add('is-ok'); newsMsg.textContent = 'Terima kasih! Lanjutkan konfirmasi langganan melalui WhatsApp.';
            openLink(waUrl('Halo Eventora, saya ingin berlangganan newsletter. Email saya: ' + email));
            news.reset();
        });
    }

    /* ------------------------------------------------ reveal + counter */
    var AUTO_REVEAL = ['.eo-svc__intro', '.eo-svc-card', '.eo-card-portfolio', '.eo-pkgs-panel', '.eo-card-projects', '.eo-proc', '.eo-quote', '.eo-clients__row',
        '.eo-sec__head', '.eo-shot', '.eo-filter', '.eo-switch', '.eo-form', '.eo-chatpage', '.eo-cta__inner', '.eo-pkgcard', '.eo-proj', '.eo-feature'];
    qsa(AUTO_REVEAL.join(',')).forEach(function (n) { if (!n.hasAttribute('data-reveal')) { n.setAttribute('data-reveal', ''); } });
    var revealNodes = qsa('[data-reveal]');
    function assignDelays() {
        var groups = (typeof Map !== 'undefined') ? new Map() : null;
        revealNodes.forEach(function (n) {
            var key = n.parentNode;
            var idx = groups ? (groups.get(key) || 0) : 0;
            if (groups) { groups.set(key, idx + 1); }
            n.style.setProperty('--eo-delay', (Math.min(idx, 6) * 0.07) + 's');
        });
    }
    assignDelays();
    function animateCount(node) {
        var target = parseFloat(node.getAttribute('data-eo-count')) || 0;
        if (reduceMotion) { node.textContent = target.toLocaleString('id-ID'); return; }
        var start = null, dur = 1400;
        function step(ts) {
            if (start === null) { start = ts; }
            var p = Math.min((ts - start) / dur, 1);
            var eased = 1 - Math.pow(1 - p, 3);
            node.textContent = Math.round(target * eased).toLocaleString('id-ID');
            if (p < 1) { raf(step); }
        }
        raf(step);
    }
    var counters = qsa('[data-eo-count]');
    if ('IntersectionObserver' in win) {
        var io = new IntersectionObserver(function (entries) {
            entries.forEach(function (en) {
                if (!en.isIntersecting) { return; }
                en.target.classList.add('is-visible'); io.unobserve(en.target);
            });
        }, { threshold: 0.12, rootMargin: '0px 0px -6% 0px' });
        revealNodes.forEach(function (n) { io.observe(n); });
        var co = new IntersectionObserver(function (entries) {
            entries.forEach(function (en) { if (en.isIntersecting) { animateCount(en.target); co.unobserve(en.target); } });
        }, { threshold: 0.6 });
        counters.forEach(function (n) { n.textContent = '0'; co.observe(n); });
    } else {
        revealNodes.forEach(function (n) { n.classList.add('is-visible'); });
    }

    /* ---------------------------------------------------------- marquee */
    var marquee = qs('[data-eo-marquee]');
    function updateMarquee() {
        if (!marquee) { return; }
        var track = qs('.eo-marquee__track', marquee);
        var running = marquee.classList.contains('is-running');
        if (MQ_MARQUEE.matches && !running) {
            qsa('li', track).forEach(function (li) {
                var c = li.cloneNode(true); c.setAttribute('aria-hidden', 'true'); c.setAttribute('data-clone', '1'); track.appendChild(c);
            });
            marquee.classList.add('is-running');
        } else if (!MQ_MARQUEE.matches && running) {
            qsa('li[data-clone]', track).forEach(function (c) { track.removeChild(c); });
            marquee.classList.remove('is-running');
        }
    }
    updateMarquee();
    if (MQ_MARQUEE.addEventListener) { MQ_MARQUEE.addEventListener('change', updateMarquee); }
    else if (MQ_MARQUEE.addListener) { MQ_MARQUEE.addListener(updateMarquee); }

    /* ------------------------------------------------------- hero dust */
    var dust = qs('[data-eo-dust]');
    if (dust && !reduceMotion) {
        for (var i = 0; i < 18; i++) {
            var p = make('i');
            var size = 3 + Math.random() * 5;
            p.style.left = (Math.random() * 100) + '%';
            p.style.width = p.style.height = size + 'px';
            p.style.setProperty('--d', (9 + Math.random() * 10) + 's');
            p.style.setProperty('--delay', (-Math.random() * 14) + 's');
            p.style.setProperty('--x', ((Math.random() - 0.5) * 120) + 'px');
            dust.appendChild(p);
        }
    }

    /* --------------------------------------------------------- timeline */
    var timeline = qs('[data-eo-timeline]');
    if (timeline) {
        var tlTick = false;
        var updateTl = function () {
            tlTick = false;
            var r = timeline.getBoundingClientRect();
            var vh = win.innerHeight || 800;
            var p = (vh * 0.6 - r.top) / Math.max(r.height, 1);
            timeline.style.setProperty('--eo-progress', (Math.max(0, Math.min(1, p)) * 100).toFixed(1) + '%');
        };
        on(win, 'scroll', function () { if (!tlTick) { tlTick = true; raf(updateTl); } }, { passive: true });
        on(win, 'resize', updateTl);
        updateTl();
    }

    /* ------------------------------------------------- parallax hero */
    var heroEl = qs('.eo-hero');
    if (heroEl && !reduceMotion && MQ_HOVER.matches) {
        var pTick = false, px = 0, py = 0;
        on(heroEl, 'pointermove', function (e) {
            var r = heroEl.getBoundingClientRect();
            px = ((e.clientX - r.left) / Math.max(r.width, 1) - 0.5) * 2;
            py = ((e.clientY - r.top) / Math.max(r.height, 1) - 0.5) * 2;
            if (pTick) { return; }
            pTick = true;
            raf(function () {
                heroEl.style.setProperty('--mx', px.toFixed(3));
                heroEl.style.setProperty('--my', py.toFixed(3));
                pTick = false;
            });
        });
        on(heroEl, 'pointerleave', function () {
            heroEl.style.setProperty('--mx', '0');
            heroEl.style.setProperty('--my', '0');
        });
    }

    /* ================================================== AI CHATBOT */
    var dataNode = doc.getElementById('eo-assistant-data');
    var AI = null;
    try { AI = dataNode ? JSON.parse(dataNode.textContent) : null; } catch (err) { AI = null; }
    var imgBase = body.getAttribute('data-eo-img') || '';

    function normalize(s) {
        return String(s).toLowerCase().replace(/[^a-z0-9\s]/g, ' ').replace(/\s+/g, ' ').trim();
    }
    function scoreEntry(entry, text) {
        var score = 0;
        (entry.kw || []).forEach(function (k) {
            var nk = normalize(k);
            if (nk && (' ' + text + ' ').indexOf(' ' + nk) !== -1) { score += nk.length > 4 ? 3 : 2; }
        });
        var qTokens = normalize(entry.q).split(' ').filter(function (t) { return t.length > 3; });
        var tTokens = text.split(' ');
        qTokens.forEach(function (t) { if (tTokens.indexOf(t) !== -1) { score += 1; } });
        if (text === normalize(entry.q)) { score += 10; }
        return score;
    }
    function findAnswer(raw) {
        var text = normalize(raw);
        if (!text) { return null; }
        var best = null, bestScore = 0;
        (AI.kb || []).forEach(function (e) { var s = scoreEntry(e, text); if (s > bestScore) { best = e; bestScore = s; } });
        return bestScore >= 2 ? best : null;
    }

    function ChatUI(root) {
        this.root = root;
        this.log = qs('[data-eo-chat-log]', root);
        this.chips = qs('[data-eo-chat-chips]', root);
        this.form = qs('[data-eo-chat-form]', root);
        this.input = this.form ? qs('input[name="q"]', this.form) : null;
        this.busy = false; this.started = false; this.asked = {};
        var self = this;
        on(this.form, 'submit', function (e) {
            e.preventDefault();
            var v = self.input.value.trim();
            if (!v) { return; }
            self.input.value = ''; self.ask(v);
        });
        on(this.chips, 'click', function (e) {
            var b = e.target.closest('button[data-ask]');
            if (b) { self.ask(b.getAttribute('data-ask')); }
        });
    }
    ChatUI.prototype.scroll = function () { var l = this.log; raf(function () { l.scrollTop = l.scrollHeight; }); };
    ChatUI.prototype.addMsg = function (who, html, actions) {
        var wrap = make('div', 'eo-msg eo-msg--' + who);
        if (who === 'bot') { wrap.appendChild(make('span', 'eo-msg__ava', '<img src="' + esc(imgBase) + '/robot-head.svg" alt="" width="22" height="22">')); }
        var bubble = make('div', 'eo-msg__bubble', html);
        if (actions && actions.length) {
            var act = make('div', 'eo-msg__actions');
            actions.forEach(function (a) {
                var link = make('a', '', esc(a.label) + ' <svg class="eo-i" aria-hidden="true"><use href="#i-arrow"/></svg>');
                link.href = a.href;
                if (a.external) { link.target = '_blank'; link.rel = 'noopener noreferrer'; }
                act.appendChild(link);
            });
            bubble.appendChild(act);
        }
        wrap.appendChild(bubble); this.log.appendChild(wrap); this.scroll();
        return wrap;
    };
    ChatUI.prototype.typing = function () {
        var wrap = make('div', 'eo-msg eo-msg--bot');
        wrap.appendChild(make('span', 'eo-msg__ava', '<img src="' + esc(imgBase) + '/robot-head.svg" alt="" width="22" height="22">'));
        wrap.appendChild(make('div', 'eo-msg__bubble eo-typing', '<i></i><i></i><i></i>'));
        this.log.appendChild(wrap); this.scroll();
        return wrap;
    };
    ChatUI.prototype.setChips = function (items) {
        this.chips.innerHTML = '';
        var self = this;
        items.forEach(function (it) {
            var b = make('button', '', esc(it.label)); b.type = 'button'; b.setAttribute('data-ask', it.ask);
            self.chips.appendChild(b);
        });
    };
    ChatUI.prototype.defaultChips = function () {
        var items = (AI.quick || []).map(function (q) { return { label: q.q, ask: q.ask }; });
        this.setChips(items);
    };
    ChatUI.prototype.suggestChips = function (currentId) {
        var pool = (AI.kb || []).filter(function (e) { return e.id !== currentId && !this.asked[e.id]; }, this);
        pool = pool.slice(0, 5).map(function (e) { return { label: e.q.replace(/\?$/, ''), ask: e.q }; });
        if (!pool.length) { this.defaultChips(); } else { this.setChips(pool); }
    };
    ChatUI.prototype.start = function () {
        if (this.started || !AI) { return; }
        this.started = true;
        this.addMsg('bot', esc(AI.greeting));
        this.defaultChips();
    };
    ChatUI.prototype.ask = function (text) {
        if (!AI || this.busy) { return; }
        this.start();
        this.busy = true;
        this.addMsg('user', esc(text));
        var typing = this.typing();
        var self = this;
        var norm = normalize(text);
        var reply, actions = [], currentId = null;
        if (/^(hai|halo|hi|hello|hey|selamat (pagi|siang|sore|malam)|assalamualaikum)\b/.test(norm) && norm.split(' ').length <= 4) {
            reply = 'Halo! Senang bisa membantu. Anda bisa bertanya seputar layanan, paket & harga, portofolio, atau proses pemesanan event.';
        } else if (/(terima kasih|makasih|thanks|thank you)/.test(norm)) {
            reply = 'Sama-sama! Jika ada yang ingin ditanyakan lagi, silakan tulis di sini. Tim kami juga siap membantu via WhatsApp.';
            actions.push({ label: 'Chat WhatsApp', href: waUrl('Halo Eventora, saya ingin bertanya mengenai acara saya.'), external: true });
        } else {
            var hit = findAnswer(text);
            if (hit) {
                reply = hit.a; currentId = hit.id; this.asked[hit.id] = true;
                if (hit.link) { actions.push({ label: hit.link.label, href: BASE + hit.link.path }); }
            } else {
                reply = esc(AI.fallback);
                actions.push({ label: 'Chat WhatsApp', href: waUrl('Halo Eventora, saya ingin bertanya: ' + text), external: true });
            }
        }
        var delay = reduceMotion ? 80 : Math.min(500 + reply.length * 4, 1300);
        setTimeout(function () {
            if (typing.parentNode) { typing.parentNode.removeChild(typing); }
            self.addMsg('bot', reply, actions);
            if (currentId) { self.suggestChips(currentId); } else { self.defaultChips(); }
            self.busy = false;
        }, delay);
    };

    var chats = {};
    qsa('[data-eo-chat]').forEach(function (root) {
        var kind = root.getAttribute('data-eo-chat');
        chats[kind] = new ChatUI(root);
    });
    if (chats.page) { chats.page.start(); }

    var fab = qs('.eo-ai-fab');
    var floatRoot = chats.float ? chats.float.root : null;
    var hint = qs('[data-eo-chat-hint]');
    var hintTimer = null;
    function hideHint() { if (hint) { hint.hidden = true; } clearTimeout(hintTimer); try { sessionStorage.setItem('eo-hint', '1'); } catch (e) { /* storage tidak tersedia */ } }
    function setChat(open) {
        if (!floatRoot) { return; }
        if (open && chats.page) {
            var pi = chats.page.input; if (pi) { pi.scrollIntoView({ block: 'center', behavior: reduceMotion ? 'auto' : 'smooth' }); pi.focus({ preventScroll: true }); }
            return;
        }
        floatRoot.hidden = !open;
        if (fab) { fab.setAttribute('aria-expanded', open ? 'true' : 'false'); }
        if (open) {
            hideHint(); chats.float.start();
            setTimeout(function () { if (chats.float.input) { chats.float.input.focus({ preventScroll: true }); } }, 80);
        }
    }
    qsa('[data-eo-chat-open]').forEach(function (b) {
        on(b, 'click', function () { setChat(b === fab ? floatRoot.hidden : true); });
    });
    qsa('[data-eo-chat-close]').forEach(function (b) { on(b, 'click', function () { setChat(false); if (fab) { fab.focus({ preventScroll: true }); } }); });
    qsa('[data-eo-ask]').forEach(function (b) {
        on(b, 'click', function () {
            var q = b.getAttribute('data-eo-ask');
            if (chats.page) { chats.page.ask(q); setChat(true); return; }
            setChat(true); if (chats.float) { chats.float.ask(q); }
        });
    });
    on(qs('[data-eo-hint-close]'), 'click', hideHint);
    if (hint && !chats.page) {
        var seen = false;
        try { seen = sessionStorage.getItem('eo-hint') === '1'; } catch (e) { seen = false; }
        if (!seen) {
            hintTimer = setTimeout(function () {
                if (floatRoot && floatRoot.hidden) {
                    hint.hidden = false;
                    hintTimer = setTimeout(hideHint, 9000);
                }
            }, 7000);
        }
    }

    /* ---------------------------------------------- global listeners */
    on(doc, 'click', function (e) {
        var t = e.target;
        if (!t.closest('[data-eo-select]')) { closeSelects(null); }
        if (!t.closest('[data-eo-date]')) { closeDates(null); }
        if (nav && nav.classList.contains('is-menu-open') && !t.closest('[data-eo-nav]')) { setMenu(false); }
    });
    on(doc, 'keydown', function (e) {
        if (e.key === 'Escape') {
            if (activeModal) { closeOverlay(false); return; }
            if (floatRoot && !floatRoot.hidden) { setChat(false); if (fab) { fab.focus({ preventScroll: true }); } return; }
            if (nav && nav.classList.contains('is-menu-open')) { setMenu(false); if (toggle) { toggle.focus(); } return; }
            closeSelects(null); closeDates(null);
        } else if (e.key === 'Tab' && activeModal) {
            trapTab(qs('.eo-search__box, .eo-modal__box', activeModal) || activeModal, e);
        } else if ((e.key === 'k' || e.key === 'K') && (e.ctrlKey || e.metaKey) && searchBox) {
            e.preventDefault(); openOverlay(searchBox, null, '[data-eo-search-input]');
        } else if (activeModal && lbModal && activeModal === lbModal) {
            if (e.key === 'ArrowRight') { lbAuto = false; showSlide(lbIndex + 1); }
            if (e.key === 'ArrowLeft') { lbAuto = false; showSlide(lbIndex - 1); }
        }
    });
    on(win, 'resize', function () { if (MQ_NAV.matches) { setMenu(false); } });
})();
