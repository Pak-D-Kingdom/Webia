/*!
 * GlobalCargo — Logistics Company · Modern · Midnight Navy
 * Vanilla JS, tanpa dependensi. Semua fitur bersifat progressive enhancement:
 * halaman tetap terbaca jika JS belum termuat.
 */
(function () {
    'use strict';

    var doc = document;
    var reduceMotion = !!(window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches);

    function $(selector, root) { return (root || doc).querySelector(selector); }
    function $$(selector, root) { return Array.prototype.slice.call((root || doc).querySelectorAll(selector)); }

    /* ------------------------------------------------------------------
     * 1. Header: bayangan saat scroll + menu mobile
     * ---------------------------------------------------------------- */
    function initHeader() {
        var header = $('[data-lc-header]');
        var burger = $('[data-lc-burger]');
        var nav = $('[data-lc-nav]');
        var scrim = $('[data-lc-scrim]');
        if (!header) { return; }

        function onScroll() { header.classList.toggle('is-stuck', window.scrollY > 8); }
        onScroll();
        window.addEventListener('scroll', onScroll, { passive: true });

        if (!burger || !nav) { return; }

        function setOpen(open) {
            header.classList.toggle('is-open', open);
            doc.body.classList.toggle('lc-nav-open', open);
            burger.setAttribute('aria-expanded', open ? 'true' : 'false');
            var label = $('.lc-sr', burger);
            if (label) { label.textContent = open ? 'Tutup menu' : 'Buka menu'; }
            if (scrim) { scrim.hidden = !open; }
        }

        burger.addEventListener('click', function () {
            setOpen(!header.classList.contains('is-open'));
        });
        if (scrim) { scrim.addEventListener('click', function () { setOpen(false); }); }
        $$('a', nav).forEach(function (a) { a.addEventListener('click', function () { setOpen(false); }); });
        doc.addEventListener('keydown', function (e) {
            if (e.key === 'Escape' && header.classList.contains('is-open')) { setOpen(false); burger.focus(); }
        });
        window.addEventListener('resize', function () {
            if (window.innerWidth >= 1280 && header.classList.contains('is-open')) { setOpen(false); }
        });
    }

    /* ------------------------------------------------------------------
     * 2. Hitung naik angka statistik
     * ---------------------------------------------------------------- */
    function initCounters() {
        var items = $$('[data-lc-count]');
        if (!items.length) { return; }

        function format(n) {
            try { return Math.round(n).toLocaleString('id-ID'); } catch (e) { return String(Math.round(n)); }
        }
        function run(el) {
            var target = parseFloat(el.getAttribute('data-lc-count'));
            var suffix = el.getAttribute('data-suffix') || '';
            if (isNaN(target)) { return; }
            if (reduceMotion) { el.textContent = format(target) + suffix; return; }
            var duration = 1400;
            var start = null;
            function step(ts) {
                if (start === null) { start = ts; }
                var p = Math.min((ts - start) / duration, 1);
                var eased = 1 - Math.pow(1 - p, 3);
                el.textContent = format(target * eased) + suffix;
                if (p < 1) { window.requestAnimationFrame(step); }
            }
            window.requestAnimationFrame(step);
        }

        if (!('IntersectionObserver' in window)) { return; } // teks akhir sudah ada di HTML
        var io = new IntersectionObserver(function (entries) {
            entries.forEach(function (entry) {
                if (entry.isIntersecting) { io.unobserve(entry.target); run(entry.target); }
            });
        }, { threshold: 0.4 });
        items.forEach(function (el) {
            if (!reduceMotion) {
                el.textContent = '0' + (el.getAttribute('data-suffix') || '');
            }
            io.observe(el);
        });
    }

    /* ------------------------------------------------------------------
     * 3. Slider foto armada & gudang
     * ---------------------------------------------------------------- */
    function initSliders() {
        $$('[data-lc-slider]').forEach(function (root) {
            var slides = $$('[data-lc-slide]', root);
            var dots = $$('[data-lc-dot]', root);
            var current = 0;
            if (slides.length < 2) {
                $$('[data-lc-prev],[data-lc-next],.lc-slider__dots', root).forEach(function (el) { el.hidden = true; });
                return;
            }
            function show(i) {
                current = (i + slides.length) % slides.length;
                slides.forEach(function (s, n) {
                    s.classList.toggle('is-active', n === current);
                    s.setAttribute('aria-hidden', n === current ? 'false' : 'true');
                });
                dots.forEach(function (d, n) { d.classList.toggle('is-active', n === current); });
            }
            var prev = $('[data-lc-prev]', root);
            var next = $('[data-lc-next]', root);
            if (prev) { prev.addEventListener('click', function () { show(current - 1); }); }
            if (next) { next.addEventListener('click', function () { show(current + 1); }); }
            dots.forEach(function (d) {
                d.addEventListener('click', function () { show(parseInt(d.getAttribute('data-lc-dot'), 10) || 0); });
            });
        });
    }

    /* ------------------------------------------------------------------
     * 4. Carousel klien (scroll horizontal dengan tombol)
     * ---------------------------------------------------------------- */
    function initScrollers() {
        $$('.lc-clients__row').forEach(function (row) {
            var track = $('[data-lc-scroller]', row);
            var prev = $('[data-lc-scroll-prev]', row);
            var next = $('[data-lc-scroll-next]', row);
            if (!track || !prev || !next) { return; }
            function by(dir) {
                var amount = Math.max(track.clientWidth * 0.7, 120) * dir;
                if (track.scrollBy) { track.scrollBy({ left: amount, behavior: reduceMotion ? 'auto' : 'smooth' }); }
                else { track.scrollLeft += amount; }
            }
            prev.addEventListener('click', function () { by(-1); });
            next.addEventListener('click', function () { by(1); });
        });
    }

    /* ------------------------------------------------------------------
     * 5. Modal video hero
     * ---------------------------------------------------------------- */
    function initVideo() {
        var modal = $('[data-lc-video-modal]');
        var openers = $$('[data-lc-video-open]');
        if (!modal || !openers.length) { return; }
        var frame = $('[data-lc-video-frame]', modal);
        var closeBtn = $('[data-lc-video-close]', modal);
        var lastFocus = null;

        function open() {
            lastFocus = doc.activeElement;
            var src = frame.getAttribute('data-src');
            if (src && !$('iframe', frame)) {
                frame.innerHTML = '';
                var f = doc.createElement('iframe');
                f.src = src;
                f.title = 'Video profil perusahaan';
                f.allow = 'accelerometer; autoplay; encrypted-media; picture-in-picture; fullscreen';
                f.setAttribute('allowfullscreen', '');
                frame.appendChild(f);
            }
            modal.hidden = false;
            doc.body.classList.add('lc-modal-open');
            closeBtn.focus();
        }
        function close() {
            modal.hidden = true;
            doc.body.classList.remove('lc-modal-open');
            var f = $('iframe', frame);
            if (f) { frame.removeChild(f); frame.innerHTML = '<p class="lc-modal__empty">Video profil perusahaan belum tersedia.</p>'; }
            if (lastFocus && lastFocus.focus) { lastFocus.focus(); }
        }
        openers.forEach(function (b) { b.addEventListener('click', open); });
        closeBtn.addEventListener('click', close);
        modal.addEventListener('click', function (e) { if (e.target === modal) { close(); } });
        doc.addEventListener('keydown', function (e) { if (e.key === 'Escape' && !modal.hidden) { close(); } });
    }

    /* ------------------------------------------------------------------
     * 6. Tracking pengiriman (mode contoh / endpoint opsional)
     * ---------------------------------------------------------------- */
    function initTracking() {
        $$('[data-lc-track]').forEach(function (root) {
            var form = $('[data-lc-track-form]', root);
            var input = $('[data-lc-awb]', root);
            var msg = $('[data-lc-track-msg]', root);
            var steps = $$('[data-lc-tstep]', root);
            var endpoint = root.getAttribute('data-endpoint') || '';
            if (!form || !input || !msg) { return; }

            function labelOf(i) {
                var l = steps[i] ? $('.lc-tstep__lbl', steps[i]) : null;
                return l ? l.textContent.trim() : '';
            }
            function paint(step) {
                steps.forEach(function (el, i) {
                    el.classList.toggle('is-done', i < step);
                    el.classList.toggle('is-current', i === step);
                });
            }
            function say(text, type) {
                msg.textContent = text;
                msg.className = 'lc-track__msg' + (type ? ' is-' + type : '');
            }

            form.addEventListener('submit', function (e) {
                e.preventDefault();
                var awb = (input.value || '').replace(/\s+/g, '').toUpperCase();
                input.setAttribute('aria-invalid', 'false');
                if (awb.length < 6) {
                    paint(-1);
                    input.setAttribute('aria-invalid', 'true');
                    say('Masukkan nomor resi minimal 6 karakter.', 'error');
                    input.focus();
                    return;
                }
                say('Memeriksa nomor resi ' + awb + '…', 'info');

                if (endpoint) {
                    var url = endpoint + (endpoint.indexOf('?') > -1 ? '&' : '?') + 'awb=' + encodeURIComponent(awb);
                    fetch(url, { headers: { 'Accept': 'application/json' } })
                        .then(function (r) { if (!r.ok) { throw new Error('http'); } return r.json(); })
                        .then(function (d) {
                            var s = parseInt(d && d.step, 10);
                            if (isNaN(s) || s < 0 || s >= steps.length) { throw new Error('data'); }
                            paint(s);
                            say((d && d.message) || ('Resi ' + awb + ': ' + labelOf(s) + '.'), 'ok');
                        })
                        .catch(function () {
                            paint(-1);
                            say('Nomor resi tidak ditemukan atau layanan tracking belum dapat dihubungi.', 'error');
                        });
                    return;
                }

                // Mode contoh: status ditentukan dari nomor resi agar hasil konsisten.
                var sum = 0;
                for (var i = 0; i < awb.length; i++) { sum += awb.charCodeAt(i); }
                var s = sum % steps.length;
                window.setTimeout(function () {
                    paint(s);
                    say('Resi ' + awb + ': ' + labelOf(s) + ' (data contoh).', 'ok');
                }, reduceMotion ? 0 : 450);
            });
        });
    }

    /* ------------------------------------------------------------------
     * 7. Formulir → WhatsApp
     * ---------------------------------------------------------------- */
    function initWaForms() {
        $$('[data-lc-wa-form]').forEach(function (form) {
            var err = $('[data-lc-form-err]', form);

            form.addEventListener('submit', function (e) {
                e.preventDefault();
                var invalid = [];
                $$('input, select, textarea', form).forEach(function (f) {
                    if (f.type === 'radio') { return; }
                    var value = (f.value || '').trim();
                    var bad = (f.required && !value) || (value && f.type === 'email' && !f.checkValidity());
                    var target = f.lcTrigger || f;
                    target.classList.toggle('is-invalid', !!bad);
                    target.setAttribute('aria-invalid', bad ? 'true' : 'false');
                    if (bad) { invalid.push(f); }
                });
                if (invalid.length) {
                    if (err) {
                        err.textContent = 'Lengkapi kolom bertanda * dan pastikan format email benar.';
                        err.hidden = false;
                    }
                    (invalid[0].lcTrigger || invalid[0]).focus();
                    return;
                }
                if (err) { err.hidden = true; }

                var lines = [form.getAttribute('data-title') || 'Permintaan penawaran', ''];
                $$('input, select, textarea', form).forEach(function (f) {
                    if (!f.name) { return; }
                    if (f.type === 'radio' && !f.checked) { return; }
                    var v = (f.value || '').trim();
                    if (v) { lines.push(f.name + ': ' + v); }
                });
                var url = (form.getAttribute('data-wa') || '') + '?text=' + encodeURIComponent(lines.join('\n'));
                var a = doc.createElement('a');
                a.href = url;
                a.target = '_blank';
                a.rel = 'noopener';
                doc.body.appendChild(a);
                a.click();
                doc.body.removeChild(a);
            });

            function clearInvalid(e) {
                var t = e.target && (e.target.lcTrigger || e.target);
                if (t && t.classList) { t.classList.remove('is-invalid'); t.removeAttribute('aria-invalid'); }
            }
            form.addEventListener('input', clearInvalid);
            form.addEventListener('change', clearInvalid);
        });
    }

    /* ------------------------------------------------------------------
     * 8. AI Chatbot FAQ (pencocokan kata kunci, tanpa backend)
     * ---------------------------------------------------------------- */
    function initChats() {
        var panels = $$('[data-lc-chat]');
        if (!panels.length) { return; }

        var floating = $('#lc-chat');
        var inlineChat = $('[data-lc-chat-inline]');
        var openers = $$('[data-lc-chat-open]');
        var fab = $('.lc-fab--ai');

        function normalize(s) {
            return (s || '').toLowerCase().replace(/[^a-z0-9\s]/g, ' ').replace(/\s+/g, ' ').trim();
        }

        panels.forEach(function (root) {
            var faq = [];
            try { faq = JSON.parse(root.getAttribute('data-faq') || '[]'); } catch (e) { faq = []; }
            var greeting = root.getAttribute('data-greeting') || '';
            var fallback = root.getAttribute('data-fallback') || '';
            var waUrl = root.getAttribute('data-wa') || '';
            var log = $('[data-lc-log]', root);
            var form = $('[data-lc-chat-form]', root);
            var input = $('[data-lc-input]', root);
            if (!log || !form || !input) { return; }

            function scroll() { log.scrollTop = log.scrollHeight; }

            function add(role, text, withWa) {
                var wrap = doc.createElement('div');
                wrap.className = 'lc-msg lc-msg--' + role;
                var p = doc.createElement('p');
                p.textContent = text;
                wrap.appendChild(p);
                if (withWa && waUrl) {
                    var a = doc.createElement('a');
                    a.className = 'lc-msg__wa';
                    a.href = waUrl;
                    a.target = '_blank';
                    a.rel = 'noopener';
                    a.textContent = 'Chat tim kami di WhatsApp';
                    wrap.appendChild(a);
                }
                log.appendChild(wrap);
                scroll();
                return wrap;
            }

            function match(text) {
                var n = normalize(text);
                if (!n) { return null; }
                var best = null;
                var top = 0;
                faq.forEach(function (item) {
                    var score = 0;
                    (item.keys || []).forEach(function (k) { if (n.indexOf(normalize(k)) > -1) { score += 2; } });
                    normalize(item.q).split(' ').forEach(function (w) { if (w.length > 3 && n.indexOf(w) > -1) { score += 1; } });
                    if (score > top) { top = score; best = item; }
                });
                return best;
            }

            function reply(item) {
                var typing = doc.createElement('div');
                typing.className = 'lc-msg lc-msg--bot lc-msg--typing';
                typing.innerHTML = '<span></span><span></span><span></span>';
                typing.setAttribute('aria-label', 'Sedang mengetik');
                log.appendChild(typing);
                scroll();
                window.setTimeout(function () {
                    if (typing.parentNode) { typing.parentNode.removeChild(typing); }
                    if (item) { add('bot', item.a, false); } else { add('bot', fallback, true); }
                }, reduceMotion ? 0 : 600);
            }

            add('bot', greeting, false);

            $$('[data-lc-ask]', root).forEach(function (btn) {
                btn.addEventListener('click', function () {
                    var item = faq[parseInt(btn.getAttribute('data-lc-ask'), 10)];
                    if (!item) { return; }
                    add('user', item.q, false);
                    reply(item);
                });
            });

            form.addEventListener('submit', function (e) {
                e.preventDefault();
                var text = (input.value || '').trim();
                if (!text) { input.focus(); return; }
                add('user', text, false);
                input.value = '';
                reply(match(text));
            });
        });

        function setExpanded(open) {
            openers.forEach(function (b) { b.setAttribute('aria-expanded', open ? 'true' : 'false'); });
        }

        function openChat() {
            if (inlineChat) {
                var field = $('[data-lc-input]', inlineChat);
                inlineChat.scrollIntoView({ behavior: reduceMotion ? 'auto' : 'smooth', block: 'center' });
                if (field) { field.focus({ preventScroll: true }); }
                return;
            }
            if (!floating) { return; }
            floating.hidden = false;
            window.requestAnimationFrame(function () { floating.classList.add('is-open'); });
            setExpanded(true);
            if (fab) { fab.classList.add('is-seen'); }
            var f = $('[data-lc-input]', floating);
            if (f) { window.setTimeout(function () { f.focus(); }, 60); }
        }

        function closeChat() {
            if (!floating || floating.hidden) { return; }
            floating.classList.remove('is-open');
            setExpanded(false);
            window.setTimeout(function () { if (!floating.classList.contains('is-open')) { floating.hidden = true; } }, reduceMotion ? 0 : 220);
            if (fab) { fab.focus(); }
        }

        openers.forEach(function (b) {
            b.addEventListener('click', function () {
                if (b === fab && floating && !floating.hidden && !inlineChat) { closeChat(); } else { openChat(); }
            });
        });
        var closeBtn = floating ? $('[data-lc-chat-close]', floating) : null;
        if (closeBtn) { closeBtn.addEventListener('click', closeChat); }
        doc.addEventListener('keydown', function (e) { if (e.key === 'Escape') { closeChat(); } });
    }

    /* ------------------------------------------------------------------
     * 9. Dropdown kustom (menggantikan <select>, aksesibel + keyboard)
     * ---------------------------------------------------------------- */
    function initSelects() {
        var SVG_NS = 'http://www.w3.org/2000/svg';
        var uid = 0;

        function icon(name, cls) {
            var svg = doc.createElementNS(SVG_NS, 'svg');
            svg.setAttribute('class', 'lc-ico' + (cls ? ' ' + cls : ''));
            svg.setAttribute('aria-hidden', 'true');
            var use = doc.createElementNS(SVG_NS, 'use');
            use.setAttribute('href', '#lc-i-' + name);
            svg.appendChild(use);
            return svg;
        }

        $$('[data-lc-select]').forEach(function (root) {
            var select = $('select', root);
            if (!select) { return; }
            uid += 1;

            var label = select.id ? doc.querySelector('label[for="' + select.id + '"]') : null;
            var placeholder = '';
            var items = [];

            var trigger = doc.createElement('button');
            trigger.type = 'button';
            trigger.className = 'lc-select__trigger';
            trigger.id = 'lc-select-btn-' + uid;
            trigger.setAttribute('aria-haspopup', 'listbox');
            trigger.setAttribute('aria-expanded', 'false');

            var lead = doc.createElement('span');
            lead.className = 'lc-select__lead';
            lead.hidden = true;
            var valueEl = doc.createElement('span');
            valueEl.className = 'lc-select__value';
            trigger.appendChild(lead);
            trigger.appendChild(valueEl);
            trigger.appendChild(icon('chev-d', 'lc-select__chev'));

            var list = doc.createElement('ul');
            list.className = 'lc-select__list';
            list.id = 'lc-select-list-' + uid;
            list.setAttribute('role', 'listbox');
            list.tabIndex = -1;
            list.hidden = true;
            trigger.setAttribute('aria-controls', list.id);

            if (label) {
                if (!label.id) { label.id = 'lc-select-label-' + uid; }
                label.setAttribute('for', trigger.id);
                list.setAttribute('aria-labelledby', label.id);
            }

            $$('option', select).forEach(function (opt, i) {
                if (!opt.value) { placeholder = opt.textContent.trim(); return; }
                var li = doc.createElement('li');
                li.className = 'lc-select__opt';
                li.id = list.id + '-opt-' + i;
                li.setAttribute('role', 'option');
                li.setAttribute('aria-selected', 'false');
                var ic = opt.getAttribute('data-icon');
                if (ic) {
                    var box = doc.createElement('span');
                    box.className = 'lc-select__ico';
                    box.appendChild(icon(ic));
                    li.appendChild(box);
                }
                var txt = doc.createElement('span');
                txt.className = 'lc-select__txt';
                txt.textContent = opt.textContent.trim();
                li.appendChild(txt);
                li.appendChild(icon('check', 'lc-select__check'));
                list.appendChild(li);
                items.push({ el: li, value: opt.value, text: txt.textContent, icon: ic });
            });
            if (!items.length) { return; }

            select.classList.add('lc-select__native');
            select.tabIndex = -1;
            select.setAttribute('aria-hidden', 'true');
            select.lcTrigger = trigger;
            root.classList.add('is-enhanced');
            root.appendChild(trigger);
            root.appendChild(list);

            var active = -1;
            var buffer = '';
            var bufferTimer = null;

            function currentIndex() {
                for (var i = 0; i < items.length; i++) { if (items[i].value === select.value) { return i; } }
                return -1;
            }
            function sync() {
                var idx = currentIndex();
                items.forEach(function (it, i) { it.el.setAttribute('aria-selected', i === idx ? 'true' : 'false'); });
                valueEl.textContent = idx > -1 ? items[idx].text : placeholder;
                root.classList.toggle('has-value', idx > -1);
                lead.innerHTML = '';
                lead.hidden = !(idx > -1 && items[idx].icon);
                if (!lead.hidden) { lead.appendChild(icon(items[idx].icon)); }
            }
            function setActive(i) {
                if (active > -1) { items[active].el.classList.remove('is-active'); }
                active = Math.max(0, Math.min(items.length - 1, i));
                items[active].el.classList.add('is-active');
                list.setAttribute('aria-activedescendant', items[active].el.id);
                if (items[active].el.scrollIntoView) { items[active].el.scrollIntoView({ block: 'nearest' }); }
            }
            function isOpen() { return !list.hidden; }
            function open() {
                if (isOpen()) { return; }
                list.hidden = false;
                buffer = '';
                var rect = trigger.getBoundingClientRect();
                var below = window.innerHeight - rect.bottom;
                var need = Math.min(list.scrollHeight, 320) + 16;
                root.classList.toggle('is-up', below < need && rect.top > below);
                root.classList.add('is-open');
                trigger.setAttribute('aria-expanded', 'true');
                var idx = currentIndex();
                setActive(idx > -1 ? idx : 0);
                list.focus({ preventScroll: true });
            }
            function close(returnFocus) {
                if (!isOpen()) { return; }
                list.hidden = true;
                root.classList.remove('is-open', 'is-up');
                trigger.setAttribute('aria-expanded', 'false');
                if (active > -1) { items[active].el.classList.remove('is-active'); active = -1; }
                if (returnFocus) { trigger.focus(); }
            }
            function choose(i) {
                var it = items[i];
                if (!it) { return; }
                if (select.value !== it.value) {
                    select.value = it.value;
                    select.dispatchEvent(new Event('change', { bubbles: true }));
                }
                sync();
                close(true);
            }

            trigger.addEventListener('click', function () { if (isOpen()) { close(false); } else { open(); } });
            trigger.addEventListener('keydown', function (e) {
                if (e.key === 'ArrowDown' || e.key === 'ArrowUp' || e.key === 'Enter' || e.key === ' ') {
                    e.preventDefault();
                    open();
                }
            });

            list.addEventListener('keydown', function (e) {
                var key = e.key;
                if (key === 'ArrowDown') { e.preventDefault(); setActive(active + 1); }
                else if (key === 'ArrowUp') { e.preventDefault(); setActive(active - 1); }
                else if (key === 'Home') { e.preventDefault(); setActive(0); }
                else if (key === 'End') { e.preventDefault(); setActive(items.length - 1); }
                else if (key === 'Enter' || key === ' ') { e.preventDefault(); choose(active); }
                else if (key === 'Escape') { e.preventDefault(); e.stopPropagation(); close(true); }
                else if (key === 'Tab') { close(false); }
                else if (key.length === 1 && !e.ctrlKey && !e.metaKey && !e.altKey) {
                    buffer += key.toLowerCase();
                    window.clearTimeout(bufferTimer);
                    bufferTimer = window.setTimeout(function () { buffer = ''; }, 600);
                    for (var i = 0; i < items.length; i++) {
                        if (items[i].text.toLowerCase().indexOf(buffer) === 0) { setActive(i); break; }
                    }
                }
            });
            list.addEventListener('click', function (e) {
                var li = e.target.closest ? e.target.closest('.lc-select__opt') : null;
                if (!li) { return; }
                for (var i = 0; i < items.length; i++) { if (items[i].el === li) { choose(i); return; } }
            });
            list.addEventListener('mousemove', function (e) {
                var li = e.target.closest ? e.target.closest('.lc-select__opt') : null;
                if (!li) { return; }
                for (var i = 0; i < items.length; i++) { if (items[i].el === li && i !== active) { setActive(i); return; } }
            });
            doc.addEventListener('mousedown', function (e) { if (isOpen() && !root.contains(e.target)) { close(false); } });
            doc.addEventListener('touchstart', function (e) { if (isOpen() && !root.contains(e.target)) { close(false); } }, { passive: true });
            select.addEventListener('change', sync);
            if (select.form) { select.form.addEventListener('reset', function () { window.setTimeout(sync, 0); }); }

            sync();
        });
    }

    /* ------------------------------------------------------------------
     * 10. Accordion FAQ (animasi halus + buka/tutup semua)
     * ---------------------------------------------------------------- */
    function initAccordions() {
        $$('[data-lc-accordion]').forEach(function (root) {
            var items = $$('.lc-acc', root);
            var allBtn = $('[data-lc-acc-all]', root);
            if (!items.length) { return; }

            function set(item, open) {
                var btn = $('.lc-acc__btn', item);
                item.classList.toggle('is-open', open);
                if (btn) { btn.setAttribute('aria-expanded', open ? 'true' : 'false'); }
            }
            function refresh() {
                if (!allBtn) { return; }
                var every = items.every(function (it) { return it.classList.contains('is-open'); });
                allBtn.textContent = every ? 'Tutup semua' : 'Buka semua';
                allBtn.setAttribute('data-state', every ? 'open' : 'closed');
            }

            items.forEach(function (item, idx) {
                var btn = $('.lc-acc__btn', item);
                if (!btn) { return; }
                btn.addEventListener('click', function () { set(item, !item.classList.contains('is-open')); refresh(); });
                btn.addEventListener('keydown', function (e) {
                    var to = -1;
                    if (e.key === 'ArrowDown') { to = (idx + 1) % items.length; }
                    else if (e.key === 'ArrowUp') { to = (idx - 1 + items.length) % items.length; }
                    else if (e.key === 'Home') { to = 0; }
                    else if (e.key === 'End') { to = items.length - 1; }
                    if (to > -1) {
                        e.preventDefault();
                        var next = $('.lc-acc__btn', items[to]);
                        if (next) { next.focus(); }
                    }
                });
            });

            if (allBtn) {
                allBtn.hidden = false;
                allBtn.addEventListener('click', function () {
                    var open = allBtn.getAttribute('data-state') !== 'open';
                    items.forEach(function (it) { set(it, open); });
                    refresh();
                });
            }
            refresh();
        });
    }

    function ready(fn) {
        if (doc.readyState === 'loading') { doc.addEventListener('DOMContentLoaded', fn); } else { fn(); }
    }

    ready(function () {
        initHeader();
        initCounters();
        initSliders();
        initScrollers();
        initVideo();
        initTracking();
        initWaForms();
        initChats();
        initSelects();
        initAccordions();
    });
})();
