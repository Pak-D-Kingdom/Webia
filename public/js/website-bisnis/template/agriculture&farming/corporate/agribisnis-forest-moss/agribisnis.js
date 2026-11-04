/* ==========================================================================
   Green Harvest — Agri Business & Commodity Trade  ·  WEBIA by D-KREASI
   File : agribisnis.js  (vanilla JS, tanpa dependensi)
   Isi  : navbar & dropdown · bahasa · pencarian halaman · carousel komoditas
          · validasi form (statis) · AI Chatbot FAQ · panel chat melayang
   ========================================================================== */
(function () {
    'use strict';

    var $ = function (sel, root) { return (root || document).querySelector(sel); };
    var $$ = function (sel, root) { return Array.prototype.slice.call((root || document).querySelectorAll(sel)); };
    var isDesktop = function () { return window.matchMedia('(min-width: 1025px)').matches; };

    /* ---------- Tautan placeholder (href="#") ---------- */
    $$('[data-noop]').forEach(function (a) {
        a.addEventListener('click', function (e) { e.preventDefault(); });
    });

    /* ---------- Navbar mobile + dropdown ---------- */
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

    function closeSubs(except) {
        $$('.nav__item.is-open').forEach(function (li) {
            if (li !== except) {
                li.classList.remove('is-open');
                var c = $('.nav__caret', li);
                if (c) { c.setAttribute('aria-expanded', 'false'); }
            }
        });
    }

    if (toggle) {
        toggle.addEventListener('click', function () {
            setNav(toggle.getAttribute('aria-expanded') !== 'true');
        });
    }
    if (backdrop) { backdrop.addEventListener('click', function () { setNav(false); }); }

    $$('.nav__caret').forEach(function (btn) {
        btn.addEventListener('click', function (e) {
            e.stopPropagation();
            var li = btn.closest('.nav__item');
            var open = !li.classList.contains('is-open');
            closeSubs(li);
            li.classList.toggle('is-open', open);
            btn.setAttribute('aria-expanded', String(open));
        });
    });

    /* Dropdown desktop: buka saat fokus keyboard / tutup saat klik di luar */
    $$('.nav__item.has-sub').forEach(function (li) {
        li.addEventListener('focusin', function () { if (isDesktop()) { closeSubs(li); } });
    });
    document.addEventListener('click', function (e) {
        if (!e.target.closest('.nav__item')) { closeSubs(); }
    });

    window.addEventListener('resize', function () {
        if (isDesktop()) { setNav(false); closeSubs(); }
    });

    /* ---------- Bahasa (tampilan saja; terjemahan ditangani backend) ---------- */
    var lang = $('[data-lang]');
    if (lang) {
        var langBtn = $('.lang__btn', lang);
        var langMenu = $('.lang__menu', lang);
        var langLabel = $('[data-lang-label]', lang);
        var flag = $('.flag', lang);
        var closeLang = function () { langMenu.hidden = true; langBtn.setAttribute('aria-expanded', 'false'); };

        langBtn.addEventListener('click', function (e) {
            e.stopPropagation();
            var open = langMenu.hidden;
            langMenu.hidden = !open;
            langBtn.setAttribute('aria-expanded', String(open));
        });
        $$('[data-lang-code]', lang).forEach(function (b) {
            b.addEventListener('click', function () {
                var code = b.getAttribute('data-lang-code');
                langLabel.textContent = code;
                flag.setAttribute('data-flag', code.toLowerCase());
                $$('[data-lang-code]', lang).forEach(function (x) { x.classList.toggle('is-active', x === b); });
                document.documentElement.lang = code.toLowerCase();
                closeLang();
            });
        });
        document.addEventListener('click', function (e) { if (!lang.contains(e.target)) { closeLang(); } });
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
            var overflow = max > 0;
            prev.hidden = next.hidden = !overflow;
            prev.disabled = track.scrollLeft <= 2;
            next.disabled = track.scrollLeft >= max;
        };
        prev.addEventListener('click', function () { track.scrollBy({ left: -step(), behavior: 'smooth' }); });
        next.addEventListener('click', function () { track.scrollBy({ left: step(), behavior: 'smooth' }); });
        track.addEventListener('scroll', update, { passive: true });
        window.addEventListener('resize', update);
        update();
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
            if (firstBad) { firstBad.focus(); if (ok) { ok.hidden = true; } return; }

            /* Integrasi backend: kirim FormData(form) ke endpoint tim backend di sini. */
            form.reset();
            if (ok) { ok.hidden = false; ok.scrollIntoView({ block: 'nearest', behavior: 'smooth' }); }
            window.setTimeout(function () { if (ok) { ok.hidden = true; } }, 7000);
        });
    });

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
            window.setTimeout(function () {
                typing.parentNode.removeChild(typing);
                var a = answer(q);
                if (a) {
                    addMsg(a, 'bot');
                } else {
                    var link = 'https://wa.me/' + encodeURIComponent(wa);
                    var m = addMsg(data.fallback, 'bot');
                    var a2 = document.createElement('a');
                    a2.href = link; a2.target = '_blank'; a2.rel = 'noopener'; a2.textContent = ' Chat via WhatsApp';
                    m.querySelector('.msg__bub').appendChild(a2);
                }
                busy = false;
            }, 650);
        }

        $$('[data-chat-q]', root).forEach(function (chip) {
            chip.addEventListener('click', function () { ask(chip.getAttribute('data-chat-q')); });
        });
        form.addEventListener('submit', function (e) {
            e.preventDefault();
            var v = input.value;
            input.value = '';
            ask(v);
        });
        return { root: root, ask: ask, input: input };
    }

    var chats = $$('[data-chat]').map(initChat);

    /* ---------- Panel chat melayang ---------- */
    var chatPanel = $('#chatPanel');
    var fabAi = $('.fab--ai');
    if (chatPanel && fabAi) {
        var floatChat = chats.filter(function (c) { return c && chatPanel.contains(c.root); })[0];
        var lastFocus = null;

        var openChat = function () {
            lastFocus = document.activeElement;
            chatPanel.hidden = false;
            chatPanel.classList.remove('is-open');
            void chatPanel.offsetWidth; /* restart animasi */
            chatPanel.classList.add('is-open');
            fabAi.setAttribute('aria-expanded', 'true');
            if (floatChat && floatChat.input) { window.setTimeout(function () { floatChat.input.focus(); }, 120); }
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
        $$('[data-chat-close]').forEach(function (b) { b.addEventListener('click', closeChat); });
        document.addEventListener('keydown', function (e) { if (e.key === 'Escape' && !chatPanel.hidden) { closeChat(); } });
    }

    /* ---------- Tutup menu mobile saat navigasi / Esc ---------- */
    document.addEventListener('keydown', function (e) {
        if (e.key === 'Escape') { setNav(false); closeSubs(); }
    });
    $$('.nav-panel a').forEach(function (a) { a.addEventListener('click', function () { setNav(false); }); });
})();
