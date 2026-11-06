/* ==========================================================================
   WEBIA — Travel & Tourism / Organic / Travel Agent Forest Moss ("GreenTrip")
   Vanilla JS (tanpa dependensi). Modul:
   header · burger · filter · tabs · pencarian paket · lightbox · slider ·
   form booking (→ WhatsApp) · asisten AI (FAQ destinasi & paket)
   ========================================================================== */
(function () {
    'use strict';

    var $ = function (sel, root) { return (root || document).querySelector(sel); };
    var $$ = function (sel, root) { return Array.prototype.slice.call((root || document).querySelectorAll(sel)); };
    var reduceMotion = window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches;

    var KB = {};
    try { KB = JSON.parse(($('#ta-kb') || {}).textContent || '{}'); } catch (e) { KB = {}; }

    function el(tag, cls, text) {
        var n = document.createElement(tag);
        if (cls) n.className = cls;
        if (text != null) n.textContent = text;
        return n;
    }
    function store(key, val) {
        try { if (val === undefined) return window.sessionStorage.getItem(key); window.sessionStorage.setItem(key, val); } catch (e) { return null; }
    }

    /* ---------------------------------------------------------------- header + burger */
    function initHeader() {
        var header = $('[data-ta-header]');
        if (!header) return;
        var nav = $('[data-ta-nav]', header);
        var burger = $('[data-ta-burger]', header);

        var onScroll = function () { header.classList.toggle('is-stuck', window.scrollY > 8); };
        onScroll();
        window.addEventListener('scroll', onScroll, { passive: true });

        if (!nav || !burger) return;
        var setOpen = function (open) {
            nav.classList.toggle('is-open', open);
            burger.setAttribute('aria-expanded', open ? 'true' : 'false');
            burger.setAttribute('aria-label', open ? 'Tutup menu' : 'Buka menu');
        };
        burger.addEventListener('click', function () { setOpen(burger.getAttribute('aria-expanded') !== 'true'); });
        nav.addEventListener('click', function (e) { if (e.target.closest('a')) setOpen(false); });
        document.addEventListener('keydown', function (e) { if (e.key === 'Escape') setOpen(false); });
        document.addEventListener('click', function (e) { if (!header.contains(e.target)) setOpen(false); });
        window.addEventListener('resize', function () { if (window.innerWidth >= 1100) setOpen(false); });
    }

    /* ---------------------------------------------------------------- filter chip */
    function initFilters() {
        $$('[data-ta-filter]').forEach(function (bar) {
            var scope = bar.closest('.ta-container') || bar.parentElement;
            var list = $('[data-ta-filter-list]', scope);
            if (!list) return;
            bar.addEventListener('click', function (e) {
                var btn = e.target.closest('[data-filter]');
                if (!btn) return;
                $$('[data-filter]', bar).forEach(function (b) { b.classList.toggle('is-active', b === btn); });
                var val = btn.getAttribute('data-filter');
                $$('[data-cat]', list).forEach(function (item) {
                    item.hidden = !(val === 'all' || item.getAttribute('data-cat') === val);
                });
            });
        });
    }

    /* ---------------------------------------------------------------- tabs itinerary */
    function initTabs() {
        $$('[data-ta-tabs]').forEach(function (root) {
            var tabs = $$('[role="tab"]', root);
            var panels = $$('[role="tabpanel"]', root);
            if (!tabs.length) return;

            var activate = function (slug, pushHash, focus) {
                var found = false;
                tabs.forEach(function (t) {
                    var on = t.getAttribute('data-tab') === slug;
                    if (on) found = true;
                    t.classList.toggle('is-active', on);
                    t.setAttribute('aria-selected', on ? 'true' : 'false');
                    t.tabIndex = on ? 0 : -1;
                    if (on && focus) t.focus();
                });
                if (!found) return;
                panels.forEach(function (p) { p.hidden = p.id !== slug; });
                if (pushHash && window.history && history.replaceState) history.replaceState(null, '', '#' + slug);
            };

            tabs.forEach(function (t, i) {
                t.addEventListener('click', function () { activate(t.getAttribute('data-tab'), true); });
                t.addEventListener('keydown', function (e) {
                    var next = null;
                    if (e.key === 'ArrowRight') next = tabs[(i + 1) % tabs.length];
                    if (e.key === 'ArrowLeft') next = tabs[(i - 1 + tabs.length) % tabs.length];
                    if (next) { e.preventDefault(); activate(next.getAttribute('data-tab'), true, true); }
                });
            });

            var fromHash = function () { var h = decodeURIComponent(location.hash.slice(1)); if (h) activate(h, false); };
            fromHash();
            window.addEventListener('hashchange', fromHash);
        });
    }

    /* ---------------------------------------------------------------- pencarian paket (halaman Paket Tour) */
    function initPackageSearch() {
        var form = $('[data-ta-pkgfilter]');
        var list = $('[data-pkg-list]');
        if (!form || !list) return;

        var params = new URLSearchParams(location.search);
        var dest = params.get('destinasi') || '';
        var date = params.get('tanggal') || '';
        var pax = params.get('peserta') || '';
        var selDest = $('[data-pkg-dest]', form), inDate = $('[data-pkg-date]', form), selPax = $('[data-pkg-pax]', form);
        if (selDest) selDest.value = dest;
        if (inDate && date) inDate.value = date;
        if (selPax && pax) selPax.value = pax;

        var items = $$('.ta-pk', list);
        var result = $('[data-pkg-result]');
        var empty = $('[data-pkg-empty]');
        var shown = items.length;

        if (dest) {
            shown = 0;
            items.forEach(function (it) {
                var ok = it.getAttribute('data-destination') === dest;
                it.hidden = !ok;
                if (ok) shown++;
            });
        }
        if (result && (dest || date || pax)) {
            var label = selDest && selDest.selectedIndex > 0 ? selDest.options[selDest.selectedIndex].text : 'semua destinasi';
            var parts = ['Hasil untuk ' + label];
            if (date) parts.push('berangkat ' + date);
            if (pax) parts.push(pax + ' orang');
            result.textContent = parts.join(' · ') + ' — ' + shown + ' paket ditemukan.';
            result.hidden = false;
        }
        if (empty) {
            empty.hidden = shown !== 0;
            var link = $('[data-pkg-empty-link]', empty);
            if (link && dest) link.href = link.getAttribute('href').split('?')[0] + '?destinasi=' + encodeURIComponent(dest) + (date ? '&tanggal=' + encodeURIComponent(date) : '');
        }
        var hash = decodeURIComponent(location.hash.slice(1));
        var target = hash && document.getElementById(hash);
        if (target && target.classList.contains('ta-pk')) target.classList.add('is-highlight');
    }

    /* ---------------------------------------------------------------- lightbox galeri */
    function initLightbox() {
        var root = $('[data-ta-lightbox]');
        if (!root) return;
        var box = null, img, cap, idx = 0, items = [], lastFocus = null, startX = null;

        var visible = function () { return $$('[data-lb-src]', root).filter(function (b) { return !b.closest('[hidden]'); }); };
        var show = function (i) {
            idx = (i + items.length) % items.length;
            img.src = items[idx].getAttribute('data-lb-src');
            img.alt = items[idx].getAttribute('data-lb-caption') || '';
            cap.textContent = (idx + 1) + ' / ' + items.length + ' — ' + img.alt;
        };
        var close = function () {
            if (!box) return;
            box.remove(); box = null;
            document.removeEventListener('keydown', onKey);
            document.body.style.overflow = '';
            if (lastFocus) lastFocus.focus();
        };
        var onKey = function (e) {
            if (e.key === 'Escape') close();
            if (e.key === 'ArrowRight') show(idx + 1);
            if (e.key === 'ArrowLeft') show(idx - 1);
        };
        var mkBtn = function (cls, label, icon) {
            var b = el('button', 'ta-lb__btn ' + cls);
            b.type = 'button'; b.setAttribute('aria-label', label);
            b.innerHTML = '<svg class="ta-i" aria-hidden="true"><use href="#i-' + icon + '"/></svg>';
            return b;
        };
        var open = function (btn) {
            items = visible();
            idx = Math.max(0, items.indexOf(btn));
            lastFocus = btn;
            box = el('div', 'ta-lb');
            box.setAttribute('role', 'dialog'); box.setAttribute('aria-modal', 'true'); box.setAttribute('aria-label', 'Pratinjau foto');
            img = el('img', 'ta-lb__img'); cap = el('p', 'ta-lb__cap');
            var x = mkBtn('ta-lb__close', 'Tutup', 'x'), p = mkBtn('ta-lb__prev', 'Foto sebelumnya', 'chev-left'), n = mkBtn('ta-lb__next', 'Foto berikutnya', 'chev-right');
            box.append(img, cap, x, p, n);
            document.body.appendChild(box);
            document.body.style.overflow = 'hidden';
            x.addEventListener('click', close);
            p.addEventListener('click', function () { show(idx - 1); });
            n.addEventListener('click', function () { show(idx + 1); });
            box.addEventListener('click', function (e) { if (e.target === box) close(); });
            box.addEventListener('touchstart', function (e) { startX = e.touches[0].clientX; }, { passive: true });
            box.addEventListener('touchend', function (e) {
                if (startX == null) return;
                var dx = e.changedTouches[0].clientX - startX;
                if (Math.abs(dx) > 50) show(idx + (dx < 0 ? 1 : -1));
                startX = null;
            });
            document.addEventListener('keydown', onKey);
            show(idx); x.focus();
        };
        root.addEventListener('click', function (e) { var b = e.target.closest('[data-lb-src]'); if (b) open(b); });
    }

    /* ---------------------------------------------------------------- slider testimoni */
    function initSliders() {
        $$('[data-ta-slider]').forEach(function (root) {
            var track = $('[data-slider-track]', root);
            var slides = $$('.ta-slider__slide', root);
            var dotsBox = $('[data-slider-dots]', root);
            if (!track || slides.length < 2) { $$('.ta-slider__nav', root).forEach(function (b) { b.hidden = true; }); return; }
            var i = 0, timer = null, startX = null, dots = [];

            slides.forEach(function (s, n) {
                var d = el('button'); d.type = 'button'; d.setAttribute('aria-label', 'Testimoni ' + (n + 1));
                d.addEventListener('click', function () { go(n); restart(); });
                dotsBox.appendChild(d); dots.push(d);
            });
            function go(n) {
                i = (n + slides.length) % slides.length;
                track.style.transform = 'translateX(' + (-i * 100) + '%)';
                slides.forEach(function (s, k) { s.setAttribute('aria-hidden', k === i ? 'false' : 'true'); });
                dots.forEach(function (d, k) { d.setAttribute('aria-current', k === i ? 'true' : 'false'); });
            }
            function restart() {
                if (timer) clearInterval(timer);
                if (!reduceMotion) timer = setInterval(function () { go(i + 1); }, 6500);
            }
            $('[data-slider-prev]', root).addEventListener('click', function () { go(i - 1); restart(); });
            $('[data-slider-next]', root).addEventListener('click', function () { go(i + 1); restart(); });
            root.addEventListener('pointerdown', function (e) { startX = e.clientX; });
            root.addEventListener('pointerup', function (e) {
                if (startX == null) return;
                var dx = e.clientX - startX;
                if (Math.abs(dx) > 40) { go(i + (dx < 0 ? 1 : -1)); restart(); }
                startX = null;
            });
            root.addEventListener('mouseenter', function () { if (timer) clearInterval(timer); });
            root.addEventListener('mouseleave', restart);
            root.addEventListener('focusin', function () { if (timer) clearInterval(timer); });
            go(0); restart();
        });
    }

    /* ---------------------------------------------------------------- form booking → WhatsApp */
    function initBooking() {
        var forms = $$('[data-ta-booking]');
        if (!forms.length) return;
        var wa = KB.wa || '';

        // prefill dari query string (halaman Booking Inquiry)
        var q = new URLSearchParams(location.search);
        var full = $('#bf-paket');
        if (full) {
            var slug = q.get('paket'), dslug = q.get('destinasi');
            if (slug) {
                var opt = $$('option', full).filter(function (o) { return o.getAttribute('data-slug') === slug; })[0];
                if (opt) {
                    full.value = opt.value;
                    dslug = dslug || opt.getAttribute('data-dest');
                }
            }
            if (dslug) {
                var dsel = $('#bf-dest');
                var dopt = $$('option', dsel).filter(function (o) { return o.getAttribute('data-slug') === dslug; })[0];
                if (dopt) dsel.value = dopt.value;
            }
            if (q.get('tanggal')) $('#bf-tgl').value = q.get('tanggal');
        }

        forms.forEach(function (form) {
            var msg = $('[data-form-msg]', form);
            var showMsg = function (text, err) {
                if (!msg) return;
                msg.textContent = text; msg.hidden = false; msg.classList.toggle('is-error', !!err);
            };
            var setErr = function (field, text) {
                var wrap = field.closest('.ta-field');
                var old = $('.ta-field__err', wrap);
                if (old) old.remove();
                wrap.classList.toggle('has-error', !!text);
                field.setAttribute('aria-invalid', text ? 'true' : 'false');
                if (text) { var p = el('p', 'ta-field__err', text); p.setAttribute('role', 'alert'); wrap.appendChild(p); }
            };

            form.addEventListener('submit', function (e) {
                e.preventDefault();
                var f = form.elements, firstBad = null, ok = true;
                var need = function (name, test, text) {
                    var field = f[name]; if (!field) return;
                    var val = (field.value || '').trim();
                    var bad = !test(val);
                    setErr(field, bad ? text : '');
                    if (bad) { ok = false; if (!firstBad) firstBad = field; }
                };
                need('nama', function (v) { return v.length >= 3; }, 'Isi nama lengkap Anda.');
                need('email', function (v) { return /^[^\s@]+@[^\s@]+\.[^\s@]{2,}$/.test(v); }, 'Masukkan email yang valid.');
                need('whatsapp', function (v) { return /^[0-9+\s-]{9,16}$/.test(v); }, 'Masukkan nomor WhatsApp yang valid.');
                need('destinasi', function (v) { return v !== ''; }, 'Pilih destinasi.');
                need('tanggal', function (v) { return v !== ''; }, 'Pilih tanggal keberangkatan.');

                if (!ok) { showMsg('Lengkapi data yang ditandai, lalu kirim lagi.', true); if (firstBad) firstBad.focus(); return; }

                var val = function (n) { return f[n] ? f[n].value.trim() : ''; };
                var lines = ['Halo GreenTrip, saya ingin mengajukan inquiry booking:', ''];
                lines.push('• Nama: ' + val('nama'));
                lines.push('• Email: ' + val('email'));
                if (val('whatsapp')) lines.push('• No. WhatsApp: ' + val('whatsapp'));
                lines.push('• Destinasi: ' + val('destinasi'));
                if (val('paket')) lines.push('• Paket: ' + val('paket'));
                lines.push('• Tanggal keberangkatan: ' + val('tanggal'));
                if (val('peserta')) lines.push('• Jumlah peserta: ' + val('peserta') + ' orang');
                if (val('pesan')) lines.push('• Pesan: ' + val('pesan'));
                var url = 'https://wa.me/' + wa + '?text=' + encodeURIComponent(lines.join('\n'));

                var w = window.open(url, '_blank', 'noopener');
                if (!w) { window.location.href = url; }
                showMsg('Terima kasih! Inquiry Anda siap dikirim — lanjutkan di WhatsApp yang terbuka.', false);
                form.reset();
                if (f.peserta) f.peserta.value = '2';
            });

            form.addEventListener('input', function (e) {
                if (e.target.closest('.ta-field.has-error')) setErr(e.target, '');
            });
        });
    }


    /* ---------------------------------------------------------------- dropdown kustom (select → listbox) */
    var openSelect = null;
    function closeSelect() {
        if (!openSelect) return;
        openSelect.list.remove();
        openSelect.wrap.classList.remove('is-open');
        openSelect.btn.setAttribute('aria-expanded', 'false');
        openSelect.btn.removeAttribute('aria-activedescendant');
        openSelect = null;
    }
    document.addEventListener('pointerdown', function (e) {
        if (openSelect && !openSelect.list.contains(e.target) && !openSelect.wrap.contains(e.target)) closeSelect();
    });
    window.addEventListener('resize', closeSelect);
    window.addEventListener('scroll', function (e) { if (openSelect && !openSelect.list.contains(e.target)) closeSelect(); }, true);

    function enhanceSelect(sel, uid) {
        var wrap = el('span', 'ta-select');
        sel.parentNode.insertBefore(wrap, sel);
        var btn = el('button', 'ta-select__btn'); btn.type = 'button';
        btn.setAttribute('aria-haspopup', 'listbox'); btn.setAttribute('aria-expanded', 'false');
        var label = el('span', 'ta-select__label');
        btn.appendChild(label);
        btn.insertAdjacentHTML('beforeend', '<svg class="ta-i" aria-hidden="true"><use href="#i-chev-down"/></svg>');
        wrap.appendChild(btn);              // tombol lebih dulu: klik <label> pembungkus mengaktifkan tombol
        wrap.appendChild(sel);
        sel.classList.add('ta-select__native');
        sel.tabIndex = -1; sel.setAttribute('aria-hidden', 'true');
        sel.addEventListener('focus', function () { btn.focus(); });

        var lab = sel.labels && sel.labels[0];
        var small = lab && lab.querySelector('small');
        var name = small ? small.textContent : (lab ? lab.firstChild.textContent : '') || sel.getAttribute('aria-label') || '';

        function sync() {
            var o = sel.options[sel.selectedIndex];
            label.textContent = o ? o.text : '';
            btn.classList.toggle('is-placeholder', !sel.value);
            btn.setAttribute('aria-label', (name ? name.trim() + ': ' : '') + label.textContent);
        }
        sel._taSync = sync; sync();
        if (sel.form) sel.form.addEventListener('reset', function () { setTimeout(sync, 0); });
        sel.addEventListener('change', sync);

        var active = 0, list = null;
        function setActive(i, scroll) {
            var opts = $$('.ta-select__opt', list);
            active = Math.max(0, Math.min(opts.length - 1, i));
            opts.forEach(function (o, k) { o.classList.toggle('is-active', k === active); });
            btn.setAttribute('aria-activedescendant', opts[active].id);
            if (scroll) opts[active].scrollIntoView({ block: 'nearest' });
        }
        function choose(i) {
            sel.selectedIndex = i;
            sel.dispatchEvent(new Event('change', { bubbles: true }));
            sync(); closeSelect(); btn.focus();
        }
        function open() {
            closeSelect();
            list = el('ul', 'ta-select__list');
            list.id = 'ta-sel-' + uid; list.setAttribute('role', 'listbox'); list.tabIndex = -1;
            Array.prototype.forEach.call(sel.options, function (o, i) {
                var li = el('li', 'ta-select__opt' + (o.value ? '' : ' is-ph'));
                li.id = list.id + '-' + i; li.setAttribute('role', 'option');
                li.setAttribute('aria-selected', o.selected ? 'true' : 'false');
                li.appendChild(el('span', null, o.text));
                li.insertAdjacentHTML('beforeend', '<svg class="ta-i" aria-hidden="true"><use href="#i-check"/></svg>');
                li.addEventListener('mouseenter', function () { setActive(i); });
                li.addEventListener('click', function () { choose(i); });
                list.appendChild(li);
            });
            document.body.appendChild(list);
            var host = btn.closest('.ta-search__field, .ta-field') || wrap;
            var r = host.getBoundingClientRect();
            var w = Math.max(r.width, 230);
            list.style.minWidth = w + 'px';
            list.style.left = Math.max(8, Math.min(r.left, window.innerWidth - w - 8)) + 'px';
            var h = Math.min(list.scrollHeight + 2, 300);
            var below = window.innerHeight - r.bottom - 16, above = r.top - 16;
            if (below >= h || below >= above) { list.style.top = (r.bottom + 10) + 'px'; list.style.maxHeight = Math.max(160, Math.min(300, below - 10)) + 'px'; }
            else { var mh = Math.min(300, above - 10); list.style.maxHeight = mh + 'px'; list.style.top = Math.max(8, r.top - Math.min(h, mh) - 10) + 'px'; list.style.transformOrigin = 'bottom left'; }
            wrap.classList.add('is-open'); btn.setAttribute('aria-expanded', 'true'); btn.setAttribute('aria-controls', list.id);
            openSelect = { list: list, wrap: wrap, btn: btn };
            setActive(Math.max(0, sel.selectedIndex), true);
        }
        btn.addEventListener('click', function (e) { e.preventDefault(); if (openSelect && openSelect.btn === btn) closeSelect(); else open(); });
        btn.addEventListener('keydown', function (e) {
            var isOpen = openSelect && openSelect.btn === btn;
            if (e.key === 'ArrowDown' || e.key === 'ArrowUp') {
                e.preventDefault();
                if (!isOpen) { open(); return; }
                setActive(active + (e.key === 'ArrowDown' ? 1 : -1), true);
            } else if (e.key === 'Home' && isOpen) { e.preventDefault(); setActive(0, true); }
            else if (e.key === 'End' && isOpen) { e.preventDefault(); setActive(sel.options.length - 1, true); }
            else if ((e.key === 'Enter' || e.key === ' ') && isOpen) { e.preventDefault(); choose(active); }
            else if (e.key === 'Escape' && isOpen) { e.stopPropagation(); closeSelect(); }
            else if (e.key === 'Tab' && isOpen) { closeSelect(); }
        });
    }
    function initSelects() {
        $$('select[data-ta-select]').forEach(function (sel, i) { enhanceSelect(sel, i); });
    }

    /* ---------------------------------------------------------------- field tanggal (placeholder + picker) */
    function initDates() {
        $$('.ta-datefield').forEach(function (box) {
            var input = $('input[type="date"]', box);
            if (!input) return;
            var sync = function () { box.classList.toggle('is-empty', !input.value); };
            sync();
            input.addEventListener('input', sync);
            input.addEventListener('change', sync);
            if (input.form) input.form.addEventListener('reset', function () { setTimeout(sync, 0); });
            var host = input.closest('label, .ta-field') || box;
            host.addEventListener('click', function () { try { if (input.showPicker) input.showPicker(); } catch (e) { /* diabaikan */ } });
        });
    }

    /* ---------------------------------------------------------------- asisten AI (FAQ destinasi & paket) */
    var ALIASES = {
        'bali': ['bali', 'ubud', 'uluwatu', 'kintamani', 'jimbaran'],
        'yogyakarta': ['yogya', 'jogja', 'borobudur', 'prambanan', 'malioboro'],
        'raja-ampat': ['raja ampat', 'rajaampat', 'wayag', 'papua'],
        'labuan-bajo': ['labuan bajo', 'labuan', 'komodo', 'padar', 'flores'],
        'tokyo': ['tokyo', 'jepang', 'japan', 'sakura', 'fuji', 'kyoto', 'osaka'],
        'swiss': ['swiss', 'switzerland', 'alpen', 'alps', 'eropa', 'europe', 'lucerne', 'interlaken'],
        'maldives': ['maldives', 'maladewa', 'water villa']
    };
    var PKG_DEST = { 'bali-romantic-getaway': 'bali', 'labuan-bajo-adventure': 'labuan-bajo', 'japan-highlights': 'tokyo', 'explore-eropa': 'swiss' };

    function norm(s) { return (' ' + String(s).toLowerCase().replace(/[^a-z0-9&\s]/g, ' ').replace(/\s+/g, ' ').trim() + ' '); }
    function hasAny(t, words) { return words.some(function (w) { return t.indexOf(' ' + w) > -1; }); }
    function detectSlug(t) {
        var best = null;
        Object.keys(ALIASES).forEach(function (slug) {
            if (!best && ALIASES[slug].some(function (w) { return t.indexOf(' ' + w) > -1; })) best = slug;
        });
        return best;
    }
    function pkgBySlug(slug) { return (KB.packages || []).filter(function (p) { return PKG_DEST[p.slug] === slug || p.slug === slug; })[0] || null; }
    function destBySlug(slug) { return (KB.destinations || []).filter(function (d) { return d.slug === slug; })[0] || null; }
    function link(label, href, ext) { return { label: label, href: href, external: !!ext }; }
    function waLink(label) { return link(label || 'Chat WhatsApp', 'https://wa.me/' + (KB.wa || '') + '?text=' + encodeURIComponent('Halo GreenTrip, saya ingin bertanya tentang paket tour.'), true); }

    function answer(raw) {
        var t = norm(raw), L = KB.links || {};
        var slug = detectSlug(t);

        // 1) cocok persis / kuat dengan FAQ
        var faqs = KB.faqs || [];
        var exact = faqs.filter(function (f) { return norm(f.q) === t; })[0];
        if (exact) return { text: exact.a, actions: [link('Booking Inquiry', L.booking)] };

        if (/^ (halo|hai|hi|hello|selamat|assalamualaikum|permisi)\b/.test(t) && t.split(' ').length < 6)
            return { text: 'Halo! Saya siap membantu soal destinasi, paket tour, itinerary, harga, dan jadwal. Mau mulai dari mana?' };
        if (hasAny(t, ['terima kasih', 'makasih', 'thanks', 'thank you', 'trims']))
            return { text: 'Sama-sama! Kalau ada pertanyaan lain soal perjalanan Anda, tanyakan saja.' };

        // 2) chip "FAQ"
        if (t.trim() === 'faq' || hasAny(t, ['pertanyaan umum', 'sering ditanyakan']))
            return { text: 'Berikut pertanyaan yang paling sering diajukan. Pilih salah satu:', items: faqs.map(function (f) { return { title: f.q, ask: f.q }; }) };

        // 3) itinerary
        if (hasAny(t, ['itinerary', 'rencana perjalanan', 'rincian perjalanan', 'agenda', 'hari pertama', 'hari ke'])) {
            var p1 = slug ? pkgBySlug(slug) : null;
            if (p1) return { text: 'Itinerary ' + p1.name + ' (' + p1.duration + '):', items: p1.days.map(function (d) { return { title: d }; }), actions: [link('Detail Itinerary', p1.url)] };
            return { text: 'Itinerary tersedia untuk setiap paket. Pilih paket yang ingin dilihat:', items: (KB.packages || []).map(function (p) { return { title: p.name, meta: p.duration, href: p.url, linkLabel: 'Lihat itinerary' }; }) };
        }

        // 4) harga & promo
        if (hasAny(t, ['harga', 'biaya', 'tarif', 'promo', 'diskon', 'murah', 'budget', 'berapa'])) {
            var p2 = slug ? pkgBySlug(slug) : null;
            if (p2) return { text: p2.name + ' (' + p2.duration + ') mulai ' + p2.price + ' per orang. Sudah termasuk: ' + p2.includes.join(', ') + '.', actions: [link('Lihat Harga', L.harga), link('Pesan Paket', L.booking)] };
            return {
                text: (KB.tiers || []).join('\n') + '\n\nSudah termasuk: ' + (KB.included || []).join(', ') + '.\nBelum termasuk: ' + (KB.excluded || []).join(', ') + '.\n\n' + (KB.promo || ''),
                actions: [link('Lihat Semua Harga', L.harga), waLink('Tanya promo')]
            };
        }

        // 5) jadwal
        if (hasAny(t, ['jadwal', 'tanggal', 'berangkat', 'keberangkatan', 'kapan'])) {
            var rows = KB.schedules || [];
            if (slug) { var d0 = destBySlug(slug); if (d0) rows = rows.filter(function (r) { return r.indexOf(d0.name) > -1; }); }
            if (!rows.length) rows = KB.schedules || [];
            return { text: 'Jadwal keberangkatan terdekat:', items: rows.map(function (r) { return { title: r }; }), actions: [link('Semua Jadwal', L.jadwal), link('Booking', L.booking)] };
        }

        // 6) destinasi tertentu
        if (slug) {
            var d = destBySlug(slug), p = pkgBySlug(slug);
            if (d) {
                var txt = d.name + ', ' + d.country + ' — ' + d.desc + '\nWaktu terbaik: ' + d.best + '.\nSorotan: ' + d.highlights.join(', ') + '.';
                if (d.from) txt += '\nPaket mulai ' + d.from + '.';
                return { text: txt, actions: [link('Lihat Destinasi', d.url)].concat(p ? [link('Itinerary', p.url)] : []).concat([link('Tanya Booking', L.booking)]) };
            }
            if (p) return { text: p.name + ' (' + p.duration + ') mulai ' + p.price + '. ' + p.summary, actions: [link('Itinerary', p.url), link('Booking', L.booking)] };
        }

        // 7) rekomendasi destinasi
        if (hasAny(t, ['rekomendasi', 'rekomendasikan', 'destinasi', 'liburan', 'wisata', 'tempat', 'ke mana', 'kemana', 'saran', 'pilihan', 'populer'])) {
            return { text: 'Beberapa destinasi populer kami:', items: (KB.destinations || []).map(function (x) { return { title: x.name + ', ' + x.country, meta: x.desc, href: x.url, linkLabel: 'Lihat destinasi' }; }), actions: [link('Semua Destinasi', L.destinasi)] };
        }

        // 8) info paket
        if (hasAny(t, ['paket', 'tour', 'trip', 'open trip', 'wisata'])) {
            return { text: 'Paket tour unggulan kami:', items: (KB.packages || []).map(function (x) { return { title: x.name + ' · ' + x.duration, meta: 'Mulai ' + x.price + ' — ' + x.summary, href: x.url, linkLabel: 'Lihat itinerary' }; }), actions: [link('Semua Paket', L.paket)] };
        }

        // 9) FAQ berdasarkan kata kunci
        var hit = faqs.filter(function (f) { return (f.keys || []).some(function (k) { return t.indexOf(' ' + k) > -1; }); })[0];
        if (hit) return { text: hit.a, actions: [link('Booking Inquiry', L.booking), waLink('Tanya tim kami')] };

        // 10) booking / kontak
        if (hasAny(t, ['booking', 'pesan', 'reservasi', 'daftar', 'kontak', 'hubungi', 'whatsapp', 'wa ', 'admin']))
            return { text: 'Anda bisa mengirim inquiry lewat form Booking Inquiry, atau langsung chat tim kami di WhatsApp.', actions: [link('Booking Inquiry', L.booking), waLink()] };

        return {
            text: 'Maaf, saya belum menemukan jawaban untuk itu. Coba salah satu topik di bawah, atau tanyakan langsung ke tim kami.',
            items: [{ title: 'Rekomendasi destinasi', ask: 'Rekomendasi Destinasi' }, { title: 'Info paket tour', ask: 'Info Paket Tour' }, { title: 'Harga & promo', ask: 'Harga & Promo' }],
            actions: [waLink('Tanya tim kami')]
        };
    }

    /* UI chat -------------------------------------------------------- */
    var chats = [];
    function Chat(root) {
        var self = this;
        this.root = root;
        this.log = $('[data-chat-log]', root);
        this.form = $('[data-chat-form]', root);
        this.input = $('[data-chat-input]', root);
        this.variant = root.getAttribute('data-variant');
        this.busy = false;

        this.form.addEventListener('submit', function (e) {
            e.preventDefault();
            var v = self.input.value.trim();
            if (!v) return;
            self.input.value = '';
            self.ask(v);
        });
        root.addEventListener('click', function (e) {
            var chip = e.target.closest('[data-chat-chip]');
            if (chip) self.ask(chip.getAttribute('data-chat-chip'));
        });
        if (this.variant !== 'inline') this.bot({ text: KB.greeting || 'Halo! Ada yang bisa kami bantu?' }, true);
    }
    Chat.prototype.scroll = function () { this.log.scrollTop = this.log.scrollHeight; };
    Chat.prototype.user = function (text) {
        var m = el('div', 'ta-msg ta-msg--user'), b = el('div', 'ta-msg__bubble', text);
        m.appendChild(b); this.log.appendChild(m); this.scroll();
    };
    Chat.prototype.bot = function (r, instant) {
        var self = this, m = el('div', 'ta-msg'), b = el('div', 'ta-msg__bubble');
        String(r.text || '').split('\n').forEach(function (line) { if (line.trim()) b.appendChild(el('p', null, line)); });
        if (r.items && r.items.length) {
            var ul = el('div', 'ta-msg__list');
            r.items.forEach(function (it) {
                var row = el('div', 'ta-msg__item');
                if (it.ask) {
                    var btn = el('button', 'ta-chip', it.title); btn.type = 'button';
                    btn.addEventListener('click', function () { self.ask(it.ask); });
                    row.appendChild(btn);
                } else {
                    row.appendChild(el('b', null, it.title));
                    if (it.meta) row.appendChild(el('span', null, it.meta));
                    if (it.href) { var a = el('a', null, (it.linkLabel || 'Lihat detail') + ' →'); a.href = it.href; row.appendChild(a); }
                }
                ul.appendChild(row);
            });
            b.appendChild(ul);
        }
        if (r.actions && r.actions.length) {
            var act = el('div', 'ta-msg__actions');
            r.actions.forEach(function (x) {
                var a = el('a', null, x.label); a.href = x.href;
                if (x.external) { a.target = '_blank'; a.rel = 'noopener'; }
                act.appendChild(a);
            });
            b.appendChild(act);
        }
        m.appendChild(b); this.log.appendChild(m);
        if (!instant) this.scroll();
    };
    Chat.prototype.ask = function (text) {
        var self = this;
        if (this.busy) return;
        this.busy = true;
        if (this.log.hidden) this.log.hidden = false;
        this.user(text);
        var typing = el('div', 'ta-msg'), tb = el('div', 'ta-msg__bubble ta-typing');
        tb.setAttribute('aria-label', 'Asisten sedang mengetik');
        tb.innerHTML = '<i></i><i></i><i></i>';
        typing.appendChild(tb); this.log.appendChild(typing); this.scroll();
        setTimeout(function () {
            typing.remove();
            self.bot(answer(text));
            self.busy = false;
        }, reduceMotion ? 0 : 520);
    };

    function initAI() {
        $$('[data-ta-chat]').forEach(function (root) { chats.push(new Chat(root)); });

        // tombol topik di luar widget (daftar FAQ halaman AI)
        var pageChat = chats.filter(function (c) { return c.variant === 'page'; })[0];
        if (pageChat) {
            $$('.ta-faqlist [data-chat-chip]').forEach(function (b) {
                b.addEventListener('click', function () { pageChat.ask(b.getAttribute('data-chat-chip')); pageChat.input.focus({ preventScroll: true }); });
            });
        }

        var panel = $('[data-ta-ai-panel]');
        var toggle = $('[data-ta-ai-toggle]');
        if (!panel || !toggle) return;
        var closeBtn = $('[data-ta-ai-close]', panel);
        var panelInput = $('[data-chat-input]', panel);

        var setOpen = function (open) {
            panel.hidden = !open;
            document.body.classList.toggle('ta-ai-open', open);
            toggle.setAttribute('aria-expanded', open ? 'true' : 'false');
            toggle.classList.remove('is-hint');
            if (open) { setTimeout(function () { if (panelInput) panelInput.focus({ preventScroll: true }); }, 60); }
            else { toggle.focus({ preventScroll: true }); }
        };
        toggle.addEventListener('click', function () { setOpen(panel.hidden); });
        if (closeBtn) closeBtn.addEventListener('click', function () { setOpen(false); });
        document.addEventListener('keydown', function (e) { if (e.key === 'Escape' && !panel.hidden) setOpen(false); });

        // gelembung sapaan sekali per sesi
        if (!store('ta-hint')) {
            setTimeout(function () {
                if (!panel.hidden) return;
                toggle.classList.add('is-hint');
                store('ta-hint', '1');
                setTimeout(function () { toggle.classList.remove('is-hint'); }, 6000);
            }, 3500);
        }
    }

    /* ---------------------------------------------------------------- init */
    function init() {
        initHeader();
        initFilters();
        initTabs();
        initPackageSearch();
        initLightbox();
        initSliders();
        initBooking();
        initSelects();   // setelah prefill nilai dari query string
        initDates();
        initAI();
    }
    if (document.readyState === 'loading') document.addEventListener('DOMContentLoaded', init); else init();
})();
