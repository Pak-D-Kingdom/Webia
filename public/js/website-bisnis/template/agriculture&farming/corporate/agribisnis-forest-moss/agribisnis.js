/* ==========================================================================
   Green Harvest — Agri Business & Commodity Trade  ·  WEBIA by D-KREASI
   File : agribisnis.js  (vanilla JS, tanpa dependensi)
   Isi  : navbar mobile · bahasa · pencarian halaman · carousel komoditas
          · dropdown (select) kustom · validasi form (statis) · animasi scroll
          · count-up · AI Chatbot FAQ · dock WhatsApp & AI melayang
   ========================================================================== */
(function () {
    'use strict';

    var $ = function (sel, root) { return (root || document).querySelector(sel); };
    var $$ = function (sel, root) { return Array.prototype.slice.call((root || document).querySelectorAll(sel)); };
    var isDesktop = function () { return window.matchMedia('(min-width: 1141px)').matches; };
    var reduceMotion = window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches;

    /* ---------- Tautan placeholder (href="#") ---------- */
    $$('[data-noop]').forEach(function (a) {
        a.addEventListener('click', function (e) { e.preventDefault(); });
    });

    /* ---------- Navbar: bayangan saat scroll ---------- */
    var navbar = $('.navbar');
    var progress = $('[data-progress]');
    if (navbar) {
        var onScroll = function () {
            navbar.classList.toggle('is-stuck', window.pageYOffset > 40);
            if (progress) {
                var max = document.documentElement.scrollHeight - window.innerHeight;
                progress.style.transform = 'scaleX(' + (max > 0 ? Math.min(window.pageYOffset / max, 1) : 0) + ')';
            }
        };
        window.addEventListener('scroll', onScroll, { passive: true });
        window.addEventListener('resize', onScroll);
        onScroll();
    }

    /* ---------- Navbar mobile ---------- */
    var toggle = $('.nav-toggle');
    var panel = $('#navPanel');
    var backdrop = $('[data-nav-backdrop]');

    function setNav(open) {
        if (!toggle || !panel) { return; }
        toggle.setAttribute('aria-expanded', String(open));
        toggle.setAttribute('aria-label', open ? 'Tutup menu' : 'Buka menu');
        panel.classList.toggle('is-open', open);
        if (backdrop) { backdrop.hidden = !open; }
        document.body.style.overflow = open && !isDesktop() ? 'hidden' : '';
    }
    if (toggle) {
        toggle.addEventListener('click', function () { setNav(toggle.getAttribute('aria-expanded') !== 'true'); });
    }
    if (backdrop) { backdrop.addEventListener('click', function () { setNav(false); }); }
    window.addEventListener('resize', function () { if (isDesktop()) { setNav(false); } });
    $$('.nav-panel a').forEach(function (a) { a.addEventListener('click', function () { setNav(false); }); });

    /* ---------- Bahasa (tampilan saja; terjemahan ditangani backend) ---------- */
    var lang = $('[data-lang]');
    if (lang) {
        var langBtn = $('.lang__btn', lang);
        var langMenu = $('.lang__menu', lang);
        var langLabel = $('[data-lang-label]', lang);
        var flag = $('.flag', langBtn);
        var langItems = $$('[data-lang-code]', lang);
        var closeLang = function () { langMenu.hidden = true; langBtn.setAttribute('aria-expanded', 'false'); };
        var markLang = function (code) {
            langItems.forEach(function (x) { x.classList.toggle('is-active', x.getAttribute('data-lang-code') === code); });
        };
        markLang(langLabel.textContent.trim());

        langBtn.addEventListener('click', function (e) {
            e.stopPropagation();
            var open = langMenu.hidden;
            langMenu.hidden = !open;
            langBtn.setAttribute('aria-expanded', String(open));
        });
        langItems.forEach(function (b) {
            b.addEventListener('click', function () {
                var code = b.getAttribute('data-lang-code');
                langLabel.textContent = code;
                flag.setAttribute('data-flag', b.getAttribute('data-lang-flag') || code.toLowerCase());
                markLang(code);
                document.documentElement.lang = code.toLowerCase();
                closeLang();
                langBtn.focus();
            });
        });
        document.addEventListener('click', function (e) { if (!lang.contains(e.target)) { closeLang(); } });
        lang.addEventListener('keydown', function (e) { if (e.key === 'Escape') { closeLang(); langBtn.focus(); } });
    }

    /* ---------- Pencarian halaman ---------- */
    var search = $('[data-search]');
    if (search) {
        var sBtn = $('[data-search-toggle]', search);
        var sPop = $('.site-search__pop', search);
        var sInput = $('[data-search-input]', search);
        var sItems = $$('[data-search-list] li', search);
        var closeSearch = function () { sPop.hidden = true; sBtn.setAttribute('aria-expanded', 'false'); };

        sBtn.addEventListener('click', function (e) {
            e.stopPropagation();
            var open = sPop.hidden;
            sPop.hidden = !open;
            sBtn.setAttribute('aria-expanded', String(open));
            if (open) { sInput.focus(); }
        });
        sInput.addEventListener('input', function () {
            var q = sInput.value.trim().toLowerCase();
            sItems.forEach(function (li) { li.hidden = q !== '' && li.textContent.toLowerCase().indexOf(q) === -1; });
        });
        document.addEventListener('click', function (e) { if (!search.contains(e.target)) { closeSearch(); } });
        search.addEventListener('keydown', function (e) { if (e.key === 'Escape') { closeSearch(); sBtn.focus(); } });
    }

    /* ---------- Carousel komoditas ---------- */
    $$('[data-carousel]').forEach(function (root) {
        var track = $('[data-carousel-track]', root);
        var prev = $('[data-carousel-prev]', root);
        var next = $('[data-carousel-next]', root);
        if (!track || !prev || !next) { return; }

        var step = function () {
            var li = track.querySelector('li');
            return li ? li.getBoundingClientRect().width + 10 : 120;
        };
        var update = function () {
            var max = track.scrollWidth - track.clientWidth - 2;
            prev.hidden = next.hidden = max <= 0;
            prev.disabled = track.scrollLeft <= 2;
            next.disabled = track.scrollLeft >= max;
        };
        prev.addEventListener('click', function () { track.scrollBy({ left: -step(), behavior: 'smooth' }); });
        next.addEventListener('click', function () { track.scrollBy({ left: step(), behavior: 'smooth' }); });
        track.addEventListener('scroll', update, { passive: true });
        window.addEventListener('resize', update);
        update();

        /* Putar otomatis pelan-pelan; berhenti saat disorot/difokus atau tab tidak aktif */
        if (!reduceMotion) {
            var paused = false;
            ['mouseenter', 'focusin', 'touchstart'].forEach(function (ev) { root.addEventListener(ev, function () { paused = true; }, { passive: true }); });
            ['mouseleave', 'focusout'].forEach(function (ev) { root.addEventListener(ev, function () { paused = false; }); });
            window.setInterval(function () {
                if (paused || document.hidden || next.hidden) { return; }
                if (track.scrollLeft >= track.scrollWidth - track.clientWidth - 2) { track.scrollTo({ left: 0, behavior: 'smooth' }); }
                else { track.scrollBy({ left: step(), behavior: 'smooth' }); }
            }, 4200);
        }
    });

    /* ---------- Dropdown (select) kustom ---------- */
    var openSelect = null;
    var selectUid = 0;

    function closeSelect(wrap, focusBtn) {
        if (!wrap) { return; }
        wrap.classList.remove('is-open');
        wrap.__btn.setAttribute('aria-expanded', 'false');
        if (openSelect === wrap) { openSelect = null; }
        if (focusBtn) { wrap.__btn.focus(); }
    }

    function enhanceSelect(select) {
        if (select.__enhanced || select.multiple) { return; }
        select.__enhanced = true;
        var uid = ++selectUid;
        var label = select.id ? document.querySelector('label[for="' + select.id + '"]') : null;
        var wrap = document.createElement('div');
        wrap.className = 'cselect';
        select.parentNode.insertBefore(wrap, select);
        wrap.appendChild(select);
        select.tabIndex = -1;
        select.setAttribute('aria-hidden', 'true');

        var btn = document.createElement('button');
        btn.type = 'button';
        btn.className = 'cselect__btn';
        btn.setAttribute('aria-haspopup', 'listbox');
        btn.setAttribute('aria-expanded', 'false');
        var val = document.createElement('span');
        val.className = 'cselect__val';
        btn.appendChild(val);

        var list = document.createElement('ul');
        list.className = 'cselect__list';
        list.id = 'cselect-' + uid;
        list.setAttribute('role', 'listbox');
        list.tabIndex = -1;
        btn.setAttribute('aria-controls', list.id);
        if (label) {
            if (!label.id) { label.id = 'cselect-label-' + uid; }
            list.setAttribute('aria-labelledby', label.id);
            btn.setAttribute('aria-labelledby', label.id + ' ' + 'cselect-val-' + uid);
            val.id = 'cselect-val-' + uid;
            label.addEventListener('click', function (e) { e.preventDefault(); btn.focus(); });
        }

        var options = [];
        $$('option', select).forEach(function (o, i) {
            var isEmpty = o.value === '';
            if (isEmpty && select.required) { return; }
            var li = document.createElement('li');
            li.className = 'cselect__opt' + (isEmpty ? ' is-muted' : '');
            li.setAttribute('role', 'option');
            li.id = list.id + '-o' + i;
            li.setAttribute('data-value', o.value);
            li.textContent = o.textContent;
            list.appendChild(li);
            options.push(li);
        });

        wrap.appendChild(btn);
        wrap.appendChild(list);
        wrap.__btn = btn;

        var active = -1;
        function setActive(i, scroll) {
            if (i < 0 || i >= options.length) { return; }
            options.forEach(function (o) { o.classList.remove('is-active'); });
            active = i;
            options[i].classList.add('is-active');
            btn.setAttribute('aria-activedescendant', options[i].id);
            if (scroll !== false) {
                var o = options[i];
                if (o.offsetTop < list.scrollTop) { list.scrollTop = o.offsetTop - 6; }
                else if (o.offsetTop + o.offsetHeight > list.scrollTop + list.clientHeight) { list.scrollTop = o.offsetTop + o.offsetHeight - list.clientHeight + 6; }
            }
        }
        function sync() {
            var selected = select.options[select.selectedIndex];
            var empty = !selected || selected.value === '';
            val.textContent = selected ? selected.textContent : '';
            val.classList.toggle('is-placeholder', empty);
            options.forEach(function (o) { o.setAttribute('aria-selected', String(o.getAttribute('data-value') === select.value)); });
        }
        function choose(i) {
            var o = options[i];
            if (!o) { return; }
            select.value = o.getAttribute('data-value');
            sync();
            select.dispatchEvent(new Event('input', { bubbles: true }));
            select.dispatchEvent(new Event('change', { bubbles: true }));
            closeSelect(wrap, true);
        }
        function open() {
            if (openSelect && openSelect !== wrap) { closeSelect(openSelect); }
            var rect = btn.getBoundingClientRect();
            var need = Math.min(list.scrollHeight, 252) + 14;
            wrap.classList.toggle('is-up', window.innerHeight - rect.bottom < need && rect.top > need);
            wrap.classList.add('is-open');
            btn.setAttribute('aria-expanded', 'true');
            openSelect = wrap;
            var sel = options.map(function (o) { return o.getAttribute('aria-selected') === 'true'; }).indexOf(true);
            setActive(sel > -1 ? sel : 0);
        }

        btn.addEventListener('click', function () { if (wrap.classList.contains('is-open')) { closeSelect(wrap); } else { open(); } });
        btn.addEventListener('blur', function () {
            window.setTimeout(function () {
                if (!wrap.contains(document.activeElement)) { closeSelect(wrap); select.dispatchEvent(new Event('blur')); }
            }, 120);
        });
        list.addEventListener('mousedown', function (e) { e.preventDefault(); });
        list.addEventListener('click', function (e) {
            var li = e.target.closest('.cselect__opt');
            if (li) { choose(options.indexOf(li)); }
        });
        list.addEventListener('mousemove', function (e) {
            var li = e.target.closest('.cselect__opt');
            if (li) { var i = options.indexOf(li); if (i !== active) { setActive(i, false); } }
        });

        var typed = '', typedTimer = null;
        btn.addEventListener('keydown', function (e) {
            var isOpen = wrap.classList.contains('is-open');
            var k = e.key;
            if (k === 'ArrowDown' || k === 'ArrowUp') {
                e.preventDefault();
                if (!isOpen) { open(); return; }
                setActive(Math.max(0, Math.min(options.length - 1, active + (k === 'ArrowDown' ? 1 : -1))));
            } else if (k === 'Home' || k === 'End') {
                if (isOpen) { e.preventDefault(); setActive(k === 'Home' ? 0 : options.length - 1); }
            } else if (k === 'Enter' || k === ' ') {
                if (isOpen) { e.preventDefault(); choose(active); }
                else if (k === 'Enter') { e.preventDefault(); open(); }
                else { e.preventDefault(); open(); }
            } else if (k === 'Escape') {
                if (isOpen) { e.preventDefault(); e.stopPropagation(); closeSelect(wrap, true); }
            } else if (k === 'Tab') {
                if (isOpen) { closeSelect(wrap); }
            } else if (k.length === 1 && !e.ctrlKey && !e.metaKey && !e.altKey) {
                typed += k.toLowerCase();
                window.clearTimeout(typedTimer);
                typedTimer = window.setTimeout(function () { typed = ''; }, 600);
                for (var i = 0; i < options.length; i++) {
                    if (options[i].textContent.toLowerCase().indexOf(typed) === 0) {
                        if (!isOpen) { open(); }
                        setActive(i);
                        break;
                    }
                }
            }
        });

        if (select.form) {
            select.form.addEventListener('reset', function () { window.setTimeout(sync, 0); });
        }
        sync();
    }

    $$('.field select').forEach(enhanceSelect);
    document.addEventListener('click', function (e) {
        if (openSelect && !openSelect.contains(e.target)) { closeSelect(openSelect); }
    });

    /* ---------- Form statis (Inquiry B2B & Penawaran) ---------- */
    var emailRe = /^[^\s@]+@[^\s@]+\.[^\s@]{2,}$/;
    var phoneRe = /^[+()\d\s-]{8,20}$/;

    function validateField(el) {
        var field = el.closest('.field');
        var err = field ? field.querySelector('[data-err]') : null;
        var val = (el.value || '').trim();
        var msg = '';

        if (el.required && !val) { msg = 'Wajib diisi.'; }
        else if (val && el.type === 'email' && !emailRe.test(val)) { msg = 'Format email tidak valid.'; }
        else if (val && el.type === 'tel' && !phoneRe.test(val)) { msg = 'Nomor telepon tidak valid.'; }

        if (field) { field.classList.toggle('has-error', msg !== ''); }
        if (err) { err.textContent = msg; }
        el.setAttribute('aria-invalid', msg ? 'true' : 'false');
        return msg === '';
    }

    function buildWaUrl(form) {
        var number = (form.getAttribute('data-wa') || '').replace(/\D/g, '');
        var lines = ['*' + (form.getAttribute('data-wa-title') || 'Pesan dari website') + '*', ''];
        $$('.field', form).forEach(function (f) {
            var el = $('input, select, textarea', f);
            var lab = $('label', f);
            if (!el) { return; }
            var v = '';
            if (el.tagName === 'SELECT') { v = el.value === '' ? '' : (el.options[el.selectedIndex] || {}).textContent || ''; }
            else { v = el.value || ''; }
            v = v.trim();
            if (v) { lines.push((lab ? lab.textContent.replace(/\s+/g, ' ').trim() : el.name) + ': ' + v); }
        });
        return 'https://wa.me/' + number + '?text=' + encodeURIComponent(lines.join('\n'));
    }

    $$('form[data-form]').forEach(function (form) {
        var ok = $('[data-ok]', form);
        var fields = $$('input, select, textarea', form);

        fields.forEach(function (el) {
            el.addEventListener('blur', function () { if (el.value !== '' || el.closest('.has-error')) { validateField(el); } });
            el.addEventListener('input', function () { if (el.closest('.has-error')) { validateField(el); } });
        });

        form.addEventListener('submit', function (e) {
            e.preventDefault();
            var firstBad = null;
            fields.forEach(function (el) {
                if (!validateField(el) && !firstBad) { firstBad = el; }
            });
            if (firstBad) {
                var f = firstBad.closest('.field');
                var target = (f && f.querySelector('.cselect__btn')) || firstBad;
                target.focus();
                if (ok) { ok.hidden = true; }
                return;
            }

            /* Kirim lewat WhatsApp: buka wa.me ke nomor tujuan dengan pesan terisi (tanpa backend). */
            var waUrl = buildWaUrl(form);
            var waLink = $('[data-wa-link]', form);
            if (waLink) { waLink.href = waUrl; }
            form.reset();
            if (ok) { ok.hidden = false; ok.scrollIntoView({ block: 'nearest', behavior: reduceMotion ? 'auto' : 'smooth' }); }
            var win = window.open(waUrl, '_blank');
            if (win) { win.opener = null; }
        });
        form.addEventListener('input', function () { if (ok && !ok.hidden) { ok.hidden = true; } });
    });

    /* ---------- Animasi muncul saat scroll + count-up ---------- */
    var revealSel = '.home-row > *, .band__grid > *, .feature-grid > li, .catalog > *, .rows > li, .card--flat, .split > *, .steps > li, .form-layout > *, .ai-layout > *, .bigstat, .section .cta-card, .bars > li, .card--map, .footer__main > *';

    function formatNum(n) { return n.toLocaleString('id-ID'); }

    function countUp(el) {
        var target = parseFloat(el.getAttribute('data-count'));
        if (isNaN(target) || reduceMotion) { return; }
        var dur = 1400, start = null;
        el.textContent = '0';
        var tick = function (ts) {
            if (start === null) { start = ts; }
            var p = Math.min((ts - start) / dur, 1);
            var eased = 1 - Math.pow(1 - p, 3);
            el.textContent = formatNum(Math.round(target * eased));
            if (p < 1) { window.requestAnimationFrame(tick); } else { el.textContent = formatNum(target); }
        };
        window.requestAnimationFrame(tick);
    }

    if ('IntersectionObserver' in window) {
        var seen = new WeakSet();
        var io = new IntersectionObserver(function (entries) {
            entries.forEach(function (en) {
                if (!en.isIntersecting) { return; }
                var el = en.target;
                io.unobserve(el);
                el.classList.add('is-in');
                $$('[data-count]', el).forEach(countUp);
                window.setTimeout(function () {
                    el.classList.remove('reveal', 'is-in');
                    el.style.removeProperty('--d');
                }, 1500);
            });
        }, { threshold: 0.12, rootMargin: '0px 0px -6% 0px' });

        var groups = new Map();
        $$(revealSel).forEach(function (el) {
            if (seen.has(el)) { return; }
            seen.add(el);
            var rect = el.getBoundingClientRect();
            if (rect.top < window.innerHeight * 0.9 && rect.bottom > 0) {
                $$('[data-count]', el).forEach(countUp);
                return;
            }
            var parent = el.parentNode;
            var idx = groups.get(parent) || 0;
            groups.set(parent, idx + 1);
            el.style.setProperty('--d', Math.min(idx, 5) * 90 + 'ms');
            el.classList.add('reveal');
            io.observe(el);
        });
    }

    /* ---------- AI Chatbot (FAQ komoditas & kemitraan) ---------- */
    function norm(s) {
        return String(s).toLowerCase().replace(/[^a-z0-9\s]/g, ' ').replace(/\s+/g, ' ').trim();
    }

    function initChat(root) {
        var dataEl = $('[data-chat-data]', root);
        if (!dataEl) { return null; }
        var data;
        try { data = JSON.parse(dataEl.textContent); } catch (err) { return null; }

        var log = $('[data-chat-log]', root);
        var form = $('[data-chat-form]', root);
        var input = $('[data-chat-input]', root);
        var wa = root.getAttribute('data-wa') || '';
        var busy = false;
        var timers = [];
        var holder = root.closest('.chat-panel') || root.closest('.chat-card') || root.parentNode;

        function addMsg(text, who, html) {
            var m = document.createElement('div');
            m.className = 'msg msg--' + who;
            if (who === 'bot') {
                var av = document.createElement('img');
                av.className = 'msg__av'; av.src = data.avatar; av.alt = ''; av.width = 32; av.height = 32;
                m.appendChild(av);
            }
            var b = document.createElement('div');
            b.className = 'msg__bub';
            if (html) { b.innerHTML = html; } else { b.textContent = text; }
            m.appendChild(b);
            log.appendChild(m);
            log.scrollTop = log.scrollHeight;
            return m;
        }

        function answer(q) {
            var nq = norm(q);
            var best = null, bestScore = 0;
            data.faqs.forEach(function (f) {
                var score = 0;
                f.k.forEach(function (k) { if (nq.indexOf(norm(k)) !== -1) { score += 2; } });
                norm(f.q).split(' ').forEach(function (w) { if (w.length > 3 && nq.indexOf(w) !== -1) { score += 1; } });
                if (score > bestScore) { best = f; bestScore = score; }
            });
            return bestScore >= 2 ? best.a : null;
        }

        function ask(q) {
            q = String(q || '').trim();
            if (!q || busy) { return; }
            busy = true;
            addMsg(q, 'user');
            var typing = addMsg('', 'bot', '<span class="typing" aria-label="Mengetik"><i></i><i></i><i></i></span>');
            timers.push(window.setTimeout(function () {
                if (typing.parentNode) { typing.parentNode.removeChild(typing); }
                var a = answer(q);
                if (a) {
                    addMsg(a, 'bot');
                } else {
                    var m = addMsg(data.fallback, 'bot');
                    var a2 = document.createElement('a');
                    a2.href = 'https://wa.me/' + encodeURIComponent(wa);
                    a2.target = '_blank'; a2.rel = 'noopener'; a2.textContent = ' Chat via WhatsApp';
                    m.querySelector('.msg__bub').appendChild(a2);
                }
                busy = false;
            }, reduceMotion ? 50 : 650));
        }

        function reset() {
            timers.forEach(function (t) { window.clearTimeout(t); });
            timers = []; busy = false;
            while (log.children.length > 1) { log.removeChild(log.lastChild); }
            log.scrollTop = 0;
            input.value = '';
        }

        $$('[data-chat-q]', root).forEach(function (chip) {
            chip.addEventListener('click', function () { ask(chip.getAttribute('data-chat-q')); });
        });
        $$('[data-chat-reset]', holder).forEach(function (b) { b.addEventListener('click', reset); });
        form.addEventListener('submit', function (e) {
            e.preventDefault();
            var v = input.value;
            input.value = '';
            ask(v);
        });
        return { root: root, ask: ask, input: input, reset: reset };
    }

    var chats = $$('[data-chat]').map(initChat);

    /* ---------- Dock melayang: WhatsApp + AI Assistant ---------- */
    var dock = $('[data-dock]');
    var chatPanel = $('#chatPanel');
    var fabAi = $('.fab--ai');
    var badge = $('[data-ai-badge]');

    /* Label tampil sebentar saat halaman dimuat, lalu menyusut jadi tombol bulat */
    if (dock) {
        var compactTimer = window.setTimeout(function () { dock.classList.add('is-compact'); }, 6500);
        dock.addEventListener('pointerdown', function () { window.clearTimeout(compactTimer); dock.classList.add('is-compact'); });
    }

    var badgeSeen = false;
    try { badgeSeen = window.sessionStorage.getItem('ghAiSeen') === '1'; } catch (err) { badgeSeen = false; }
    if (badge && badgeSeen) { badge.hidden = true; }
    function clearBadge() {
        if (badge) { badge.hidden = true; }
        try { window.sessionStorage.setItem('ghAiSeen', '1'); } catch (err) { /* abaikan */ }
    }

    if (chatPanel && fabAi) {
        var floatChat = chats.filter(function (c) { return c && chatPanel.contains(c.root); })[0];
        var lastFocus = null;

        var openChat = function () {
            clearBadge();
            lastFocus = document.activeElement;
            chatPanel.hidden = false;
            chatPanel.classList.remove('is-open');
            void chatPanel.offsetWidth; /* restart animasi */
            chatPanel.classList.add('is-open');
            fabAi.setAttribute('aria-expanded', 'true');
            if (floatChat && floatChat.input) { window.setTimeout(function () { floatChat.input.focus(); }, 160); }
        };
        var closeChat = function () {
            chatPanel.hidden = true;
            fabAi.setAttribute('aria-expanded', 'false');
            if (lastFocus && lastFocus.focus) { lastFocus.focus(); }
        };

        $$('[data-chat-open]').forEach(function (b) {
            b.addEventListener('click', function () {
                if (chatPanel.hidden) { openChat(); } else if (b === fabAi) { closeChat(); }
            });
        });
        $$('[data-chat-ask]').forEach(function (b) {
            b.addEventListener('click', function () {
                if (chatPanel.hidden) { openChat(); }
                if (floatChat) { window.setTimeout(function () { floatChat.ask(b.getAttribute('data-chat-ask')); }, 200); }
            });
        });
        $$('[data-chat-close]').forEach(function (b) { b.addEventListener('click', closeChat); });
        document.addEventListener('keydown', function (e) { if (e.key === 'Escape' && !chatPanel.hidden) { closeChat(); } });
    }

    /* ---------- Tombol kembali ke atas ---------- */
    $$('[data-to-top]').forEach(function (b) {
        b.addEventListener('click', function () { window.scrollTo({ top: 0, behavior: reduceMotion ? 'auto' : 'smooth' }); });
    });

    /* ---------- Esc: tutup menu mobile ---------- */
    document.addEventListener('keydown', function (e) { if (e.key === 'Escape') { setNav(false); } });
})();
