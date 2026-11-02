/* ==========================================================================
   LuxeFurni - Luxury / Chocolate Luxe
   WEBIA by D-KREASI  |  furniture.js  (frontend statis, tanpa dependensi)
   Modul: header, navbar, video modal, slider, tabs, galeri + lightbox,
          estimator lead time, form -> WhatsApp, newsletter, AI chatbot FAQ
   ========================================================================== */
(function () {
    'use strict';

    var $ = function (sel, root) { return (root || document).querySelector(sel); };
    var $$ = function (sel, root) { return Array.prototype.slice.call((root || document).querySelectorAll(sel)); };

    var CONFIG = {};
    try {
        CONFIG = JSON.parse(($('#lf-config') || {}).textContent || '{}');
    } catch (e) { CONFIG = {}; }

    var reduceMotion = window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches;

    function waUrl(text) {
        return 'https://wa.me/' + (CONFIG.whatsapp || '') + '?text=' + encodeURIComponent(text);
    }

    function openWhatsApp(text) {
        var win = window.open(waUrl(text), '_blank', 'noopener');
        if (!win) { window.location.href = waUrl(text); }
    }

    function lockScroll(on) { document.body.classList.toggle('lf-lock', !!on); }

    /* ---------------------------------------------------------- HEADER */
    function initHeader() {
        var body = document.body;
        var top = $('.lf-topbar');
        var nav = $('.lf-nav');
        function measure() {
            var h = (top ? top.offsetHeight : 0) + (nav ? nav.offsetHeight : 0);
            if (h) { body.style.setProperty('--lf-header-h', h + 'px'); }
        }
        measure();
        window.addEventListener('resize', measure, { passive: true });
        window.addEventListener('load', measure);
    }

    /* ---------------------------------------------------------- NAVBAR */
    function initNav() {
        var toggle = $('[data-nav-toggle]');
        var menu = $('[data-nav-menu]');
        if (!toggle || !menu) { return; }
        var iconOpen = $('[data-icon-open]', toggle);
        var iconClose = $('[data-icon-close]', toggle);

        function set(open) {
            menu.classList.toggle('is-open', open);
            toggle.setAttribute('aria-expanded', open ? 'true' : 'false');
            if (iconOpen) { iconOpen.hidden = open; }
            if (iconClose) { iconClose.hidden = !open; }
        }

        toggle.addEventListener('click', function () { set(!menu.classList.contains('is-open')); });
        menu.addEventListener('click', function (e) { if (e.target.closest('a')) { set(false); } });
        document.addEventListener('keydown', function (e) {
            if (e.key === 'Escape' && menu.classList.contains('is-open')) { set(false); toggle.focus(); }
        });
        document.addEventListener('click', function (e) {
            if (menu.classList.contains('is-open') && !e.target.closest('.lf-nav')) { set(false); }
        });
        window.addEventListener('resize', function () { if (window.innerWidth > 1180) { set(false); } }, { passive: true });
    }

    /* ----------------------------------------------------- VIDEO MODAL */
    function initVideo() {
        var modal = $('[data-video-modal]');
        var openers = $$('[data-video-open]');
        if (!modal || !openers.length) { return; }
        var stage = $('[data-video-stage]', modal);
        var original = stage.innerHTML;
        var closeBtn = $('[data-video-close]', modal);
        var lastFocus = null;

        function open() {
            lastFocus = document.activeElement;
            var src = modal.getAttribute('data-video-src');
            if (src) {
                var sep = src.indexOf('?') > -1 ? '&' : '?';
                stage.innerHTML = '<iframe src="' + src + sep + 'autoplay=1&rel=0" title="Video profil" allow="autoplay; encrypted-media; picture-in-picture" allowfullscreen></iframe>';
            }
            modal.hidden = false;
            lockScroll(true);
            closeBtn.focus();
        }
        function close() {
            modal.hidden = true;
            stage.innerHTML = original;
            lockScroll(false);
            if (lastFocus) { lastFocus.focus(); }
        }

        openers.forEach(function (b) { b.addEventListener('click', open); });
        closeBtn.addEventListener('click', close);
        modal.addEventListener('click', function (e) { if (e.target === modal) { close(); } });
        document.addEventListener('keydown', function (e) { if (e.key === 'Escape' && !modal.hidden) { close(); } });
    }

    /* ----------------------------------------------------------- SLIDER */
    function initSliders() {
        $$('[data-slider]').forEach(function (slider) {
            var track = $('[data-slider-track]', slider);
            var prev = $('[data-slider-prev]', slider);
            var next = $('[data-slider-next]', slider);
            if (!track) { return; }

            function step() {
                var item = track.firstElementChild;
                return item ? item.getBoundingClientRect().width + 10 : track.clientWidth * 0.5;
            }
            function update() {
                var max = track.scrollWidth - track.clientWidth - 2;
                if (prev) { prev.hidden = track.scrollLeft <= 2; }
                if (next) { next.hidden = track.scrollLeft >= max; }
            }
            function go(dir) { track.scrollBy({ left: dir * step(), behavior: reduceMotion ? 'auto' : 'smooth' }); }

            if (prev) { prev.addEventListener('click', function () { go(-1); }); }
            if (next) { next.addEventListener('click', function () { go(1); }); }
            track.addEventListener('scroll', update, { passive: true });
            track.addEventListener('keydown', function (e) {
                if (e.key === 'ArrowRight') { go(1); } else if (e.key === 'ArrowLeft') { go(-1); }
            });
            window.addEventListener('resize', update, { passive: true });
            update();
        });
    }

    /* ------------------------------------------------------------- TABS */
    function initTabs() {
        $$('[data-tabs]').forEach(function (root) {
            var tabs = $$('[role="tab"]', root);
            var panels = $$('[role="tabpanel"]', root);

            function select(tab, focus) {
                tabs.forEach(function (t) {
                    var on = t === tab;
                    t.setAttribute('aria-selected', on ? 'true' : 'false');
                    t.tabIndex = on ? 0 : -1;
                });
                panels.forEach(function (p) { p.hidden = p.id !== tab.getAttribute('aria-controls'); });
                if (focus) { tab.focus(); }
            }

            tabs.forEach(function (tab, i) {
                tab.addEventListener('click', function () { select(tab, false); });
                tab.addEventListener('keydown', function (e) {
                    var n = null;
                    if (e.key === 'ArrowRight') { n = tabs[(i + 1) % tabs.length]; }
                    else if (e.key === 'ArrowLeft') { n = tabs[(i - 1 + tabs.length) % tabs.length]; }
                    else if (e.key === 'Home') { n = tabs[0]; }
                    else if (e.key === 'End') { n = tabs[tabs.length - 1]; }
                    if (n) { e.preventDefault(); select(n, true); }
                });
            });

            // dukung /dimensions#sofa
            var hash = (location.hash || '').replace('#', '');
            var fromHash = hash && tabs.filter(function (t) { return t.getAttribute('data-tab') === hash; })[0];
            if (fromHash) { select(fromHash, false); }
        });
    }

    /* -------------------------------------------- GALERI + LIGHTBOX */
    function initGallery() {
        var list = $('[data-gallery]');
        if (!list) { return; }
        var items = $$('.lf-gallery__item', list);
        var filters = $$('[data-filter]');

        filters.forEach(function (btn) {
            btn.addEventListener('click', function () {
                var f = btn.getAttribute('data-filter');
                filters.forEach(function (b) { b.setAttribute('aria-pressed', b === btn ? 'true' : 'false'); });
                items.forEach(function (it) { it.hidden = !(f === 'all' || it.getAttribute('data-type') === f); });
            });
        });

        var modal = $('[data-lightbox-modal]');
        if (!modal) { return; }
        var img = $('[data-lb-img]', modal);
        var cap = $('[data-lb-cap]', modal);
        var closeBtn = $('[data-lb-close]', modal);
        var current = 0;
        var visible = [];
        var lastFocus = null;

        function show(i) {
            current = (i + visible.length) % visible.length;
            var node = $('img', visible[current]);
            var text = $('.lf-gallery__cap', visible[current]);
            img.src = node.currentSrc || node.src;
            img.alt = node.alt;
            cap.textContent = text ? text.textContent.replace(/\s+/g, ' ').trim() : node.alt;
        }
        function open(item) {
            visible = items.filter(function (it) { return !it.hidden; });
            lastFocus = document.activeElement;
            modal.hidden = false;
            lockScroll(true);
            show(visible.indexOf(item));
            closeBtn.focus();
        }
        function close() {
            modal.hidden = true;
            lockScroll(false);
            if (lastFocus) { lastFocus.focus(); }
        }

        items.forEach(function (it) {
            $('button', it).addEventListener('click', function () { open(it); });
        });
        $('[data-lb-prev]', modal).addEventListener('click', function () { show(current - 1); });
        $('[data-lb-next]', modal).addEventListener('click', function () { show(current + 1); });
        closeBtn.addEventListener('click', close);
        modal.addEventListener('click', function (e) { if (e.target === modal) { close(); } });
        document.addEventListener('keydown', function (e) {
            if (modal.hidden) { return; }
            if (e.key === 'Escape') { close(); }
            else if (e.key === 'ArrowLeft') { show(current - 1); }
            else if (e.key === 'ArrowRight') { show(current + 1); }
        });
    }

    /* ---------------------------------------------- ESTIMATOR LEAD TIME */
    function initEstimator() {
        var root = $('[data-estimator]');
        if (!root || !CONFIG.leadTime) { return; }
        var weeksEl = $('[data-est-weeks]', root);
        var dateEl = $('[data-est-date]', root);
        var fmt = new Intl.DateTimeFormat('id-ID', { day: 'numeric', month: 'long', year: 'numeric' });

        function update() {
            var checked = $('input[name="lead-type"]:checked', root);
            var t = checked && CONFIG.leadTime[checked.value];
            if (!t) { return; }
            var now = new Date();
            var from = new Date(now.getTime() + t.min * 7 * 864e5);
            var to = new Date(now.getTime() + t.max * 7 * 864e5);
            weeksEl.textContent = t.min + ' - ' + t.max + ' minggu';
            dateEl.textContent = 'Jika pesanan dikonfirmasi hari ini: ' + fmt.format(from) + ' s/d ' + fmt.format(to);
        }
        $$('input[name="lead-type"]', root).forEach(function (r) { r.addEventListener('change', update); });
        update();
    }

    /* -------------------------------------------- FORM -> WHATSAPP */
    var FORM_TITLES = { order: 'Custom Order', quotation: 'Permintaan Penawaran' };

    function validPhone(v) { return (v || '').replace(/\D/g, '').length >= 9; }

    function initWaForms() {
        $$('[data-wa-form]').forEach(function (form) {
            var kind = form.getAttribute('data-wa-form');
            var msg = $('[data-form-msg]', form);

            // prefill dari query string (?jenis=Sofa / ?produk=Sofa)
            var params = new URLSearchParams(window.location.search);
            var jenis = params.get('jenis');
            var produk = params.get('produk');
            if (jenis) {
                var sel = form.elements.jenis;
                if (sel) {
                    Array.prototype.some.call(sel.options, function (o) {
                        if (o.value.toLowerCase() === jenis.toLowerCase() || o.text.toLowerCase() === jenis.toLowerCase()) { sel.value = o.value || o.text; return true; }
                        return false;
                    });
                }
            }
            if (produk) {
                $$('input[name="produk"]', form).forEach(function (c) { if (c.value.toLowerCase() === produk.toLowerCase()) { c.checked = true; } });
            }

            form.addEventListener('input', function (e) {
                if (e.target.getAttribute && e.target.getAttribute('aria-invalid')) { e.target.removeAttribute('aria-invalid'); }
            });

            form.addEventListener('submit', function (e) {
                e.preventDefault();
                var firstBad = null;
                $$('[required]', form).forEach(function (el) {
                    var bad = !el.value.trim() || (el.type === 'tel' && !validPhone(el.value)) || (el.type === 'email' && el.value && !el.checkValidity());
                    if (bad) { el.setAttribute('aria-invalid', 'true'); firstBad = firstBad || el; }
                });
                var email = form.elements.email;
                if (email && email.value && !email.checkValidity()) { email.setAttribute('aria-invalid', 'true'); firstBad = firstBad || email; }

                if (firstBad) {
                    msg.textContent = 'Lengkapi kolom yang ditandai terlebih dahulu (nomor WhatsApp minimal 9 digit).';
                    msg.classList.add('is-error');
                    var focusEl = firstBad.dataset && firstBad.dataset.enhanced ? $('.lf-select__btn', firstBad.parentNode) : firstBad;
                    if (focusEl) { focusEl.focus(); }
                    return;
                }

                var lines = ['*' + (FORM_TITLES[kind] || 'Pesan') + ' - ' + (CONFIG.brand || 'LuxeFurni') + '*', ''];
                var done = {};
                $$('[data-label]', form).forEach(function (el) {
                    var label = el.getAttribute('data-label');
                    if (el.type === 'checkbox') {
                        if (done[label]) { return; }
                        done[label] = true;
                        var vals = $$('input[name="' + el.name + '"]:checked', form).map(function (c) { return c.value; });
                        if (vals.length) { lines.push(label + ': ' + vals.join(', ')); }
                        return;
                    }
                    var v = (el.value || '').trim();
                    if (v) { lines.push(label + ': ' + v); }
                });
                var w = form.elements.panjang, l = form.elements.lebar, t = form.elements.tinggi;
                if (w && (w.value || l.value || t.value)) {
                    // gabungkan ukuran agar rapi di WhatsApp
                    lines = lines.filter(function (x) { return !/^(Panjang|Lebar|Tinggi) \(cm\):/.test(x); });
                    lines.push('Ukuran (P x L x T): ' + (w.value || '-') + ' x ' + (l.value || '-') + ' x ' + (t.value || '-') + ' cm');
                }

                msg.classList.remove('is-error');
                msg.textContent = 'Membuka WhatsApp... jika tidak terbuka otomatis, izinkan pop-up lalu kirim ulang.';
                openWhatsApp(lines.join('\n'));
            });
        });
    }

    /* ------------------------------------------------------ NEWSLETTER */
    function initNewsletter() {
        var form = $('[data-news-form]');
        if (!form) { return; }
        var msg = $('[data-news-msg]');
        form.addEventListener('submit', function (e) {
            e.preventDefault();
            var input = form.elements.email;
            if (!input.value || !input.checkValidity()) {
                msg.classList.add('is-error');
                msg.textContent = 'Masukkan alamat email yang valid.';
                input.focus();
                return;
            }
            msg.classList.remove('is-error');
            msg.textContent = 'Membuka WhatsApp untuk mengirim email Anda...';
            openWhatsApp('Halo ' + (CONFIG.brand || 'LuxeFurni') + ', mohon daftarkan email ' + input.value.trim() + ' untuk menerima update terbaru.');
            form.reset();
        });
    }

    /* ---------------------------------------------------- AI CHATBOT */
    var STOP = ['yang', 'dan', 'atau', 'apa', 'apakah', 'bisa', 'untuk', 'dengan', 'di', 'ke', 'dari', 'saya', 'kami', 'anda', 'itu', 'ini', 'ada', 'berapa', 'bagaimana', 'cara', 'mau', 'ingin', 'tanya', 'dong', 'ya', 'nya', 'sih', 'kah'];
    var LABELS = { catalog: 'Katalog', materials: 'Material & Finishing', 'custom-design': 'Custom Design', 'lead-time': 'Lead Time', quotation: 'Penawaran', order: 'Order Form', dimensions: 'Dimensi' };

    function normalize(s) {
        return (s || '').toLowerCase().replace(/[^a-z0-9\s]/g, ' ').replace(/\s+/g, ' ').trim();
    }
    function tokens(s) {
        return normalize(s).split(' ').filter(function (w) { return w.length > 2 && STOP.indexOf(w) === -1; });
    }

    function initChat() {
        var panel = $('#lf-chat');
        var ai = CONFIG.ai;
        if (!panel || !ai) { return; }
        var log = $('[data-chat-log]', panel);
        var chips = $('[data-chat-chips]', panel);
        var form = $('[data-chat-form]', panel);
        var input = form.elements.q;
        var fab = $('.lf-ai');
        var faqs = ai.faqs || [];
        var asked = {};
        var greeted = false;
        var lastFocus = null;
        var busy = false;

        function avatar() {
            return '<span class="lf-msg__avatar" aria-hidden="true"><svg viewBox="0 0 100 100"><use href="#lf-bot-static"/></svg></span>';
        }
        function scroll() { log.scrollTop = log.scrollHeight; }

        function addUser(text) {
            var el = document.createElement('div');
            el.className = 'lf-msg lf-msg--user';
            var b = document.createElement('div');
            b.className = 'lf-msg__bubble';
            b.textContent = text;
            el.appendChild(b);
            log.appendChild(el);
            scroll();
        }

        function addBot(text, link) {
            var el = document.createElement('div');
            el.className = 'lf-msg';
            el.innerHTML = avatar();
            var b = document.createElement('div');
            b.className = 'lf-msg__bubble';
            b.textContent = text;
            if (link && CONFIG.routes && CONFIG.routes[link]) {
                var a = document.createElement('a');
                a.href = CONFIG.routes[link];
                a.className = 'lf-link';
                a.style.display = 'inline-block';
                a.style.marginTop = '.5rem';
                a.textContent = 'Buka halaman ' + (LABELS[link] || link);
                b.appendChild(document.createElement('br'));
                b.appendChild(a);
            }
            el.appendChild(b);
            log.appendChild(el);
            scroll();
        }

        function typing() {
            var el = document.createElement('div');
            el.className = 'lf-msg';
            el.innerHTML = avatar() + '<div class="lf-msg__bubble"><span class="lf-typing" aria-label="Luxe sedang mengetik"><i></i><i></i><i></i></span></div>';
            log.appendChild(el);
            scroll();
            return el;
        }

        function findAnswer(q) {
            var n = normalize(q);
            if (!n) { return null; }
            if (/^(halo|hai|hi|hello|selamat (pagi|siang|sore|malam))\b/.test(n) && n.split(' ').length <= 4) {
                return { text: 'Halo! Senang bisa membantu. Silakan pilih pertanyaan di bawah atau ketik kebutuhan Anda tentang produk dan custom furniture.' };
            }
            if (/(terima kasih|makasih|thanks|thank you)/.test(n)) {
                return { text: 'Sama-sama! Jika masih ada yang ingin ditanyakan, saya siap membantu.' };
            }
            var qt = tokens(q);
            var best = null, bestScore = 0;
            faqs.forEach(function (f) {
                var score = 0;
                var fq = normalize(f.q);
                if (fq === n) { score += 20; }
                (f.keywords || []).forEach(function (k) {
                    var nk = normalize(k);
                    if (nk && n.indexOf(nk) > -1) { score += nk.indexOf(' ') > -1 ? 4 : 3; }
                });
                tokens(f.q).forEach(function (t) { if (qt.indexOf(t) > -1) { score += 1; } });
                if (score > bestScore) { bestScore = score; best = f; }
            });
            return bestScore >= 3 ? { text: best.a, link: best.link, faq: best } : null;
        }

        function renderChips(list) {
            chips.innerHTML = '';
            list.forEach(function (q) {
                var b = document.createElement('button');
                b.type = 'button';
                b.className = 'lf-chip';
                b.textContent = q;
                b.addEventListener('click', function () { ask(q); });
                chips.appendChild(b);
            });
        }

        function nextSuggestions(lastFaq) {
            var pool = faqs.filter(function (f) { return !asked[f.q]; });
            if (lastFaq) {
                pool.sort(function (a, b) { return (b.group === lastFaq.group) - (a.group === lastFaq.group); });
            }
            var list = pool.slice(0, 4).map(function (f) { return f.q; });
            if (!list.length) { list = (ai.suggestions || []).slice(0, 4); }
            renderChips(list);
        }

        function ask(question) {
            question = (question || '').trim();
            if (!question || busy) { return; }
            busy = true;
            open();
            addUser(question);
            var t = typing();
            var res = findAnswer(question);
            window.setTimeout(function () {
                t.remove();
                if (res) {
                    if (res.faq) { asked[res.faq.q] = true; }
                    addBot(res.text, res.link);
                    nextSuggestions(res.faq);
                } else {
                    addBot(ai.fallback);
                    nextSuggestions(null);
                }
                busy = false;
            }, reduceMotion ? 0 : 650);
        }

        function open() {
            if (!panel.hidden) { return; }
            lastFocus = document.activeElement;
            panel.hidden = false;
            if (fab) { fab.setAttribute('aria-expanded', 'true'); }
            if (!greeted) {
                greeted = true;
                addBot(ai.greeting);
                renderChips(ai.suggestions || []);
            }
            window.setTimeout(function () { input.focus(); }, 60);
        }
        function close() {
            if (panel.hidden) { return; }
            panel.hidden = true;
            if (fab) { fab.setAttribute('aria-expanded', 'false'); }
            if (lastFocus && lastFocus.focus) { lastFocus.focus(); }
        }

        document.addEventListener('click', function (e) {
            var openBtn = e.target.closest('[data-chat-open]');
            var askBtn = e.target.closest('[data-chat-ask]');
            if (askBtn) { e.preventDefault(); ask(askBtn.getAttribute('data-chat-ask')); return; }
            if (openBtn) { e.preventDefault(); if (panel.hidden) { open(); } else { close(); } }
        });
        $('[data-chat-close]', panel).addEventListener('click', close);
        document.addEventListener('keydown', function (e) { if (e.key === 'Escape' && !panel.hidden) { close(); } });

        form.addEventListener('submit', function (e) {
            e.preventDefault();
            var v = input.value;
            input.value = '';
            ask(v);
        });

        // sembunyikan gelembung sapaan setelah chat pernah dibuka
        panel.addEventListener('animationstart', function () {
            var bubble = $('[data-ai-bubble]');
            if (bubble) { bubble.style.display = 'none'; }
        });
    }

    /* --------------------------------------- DROPDOWN (SELECT KUSTOM) */
    var selectUid = 0;
    var CHEV = '<svg class="ic lf-select__chev" aria-hidden="true" viewBox="0 0 24 24"><path d="M6 9l6 6 6-6"/></svg>';
    var CHECK = '<svg class="ic lf-select__check" aria-hidden="true" viewBox="0 0 24 24"><path d="M5 12.5l4.5 4.5L19 7.5"/></svg>';

    function enhanceSelect(native) {
        if (native.multiple || native.dataset.enhanced) { return; }
        native.dataset.enhanced = '1';
        var uid = 'lf-sel-' + (++selectUid);
        var field = native.closest('.lf-field');
        var label = field ? field.querySelector('label[for="' + native.id + '"]') : null;
        if (label && !label.id) { label.id = uid + '-label'; }

        var wrap = document.createElement('div');
        wrap.className = 'lf-select';
        wrap.innerHTML =
            '<button type="button" class="lf-select__btn" aria-haspopup="listbox" aria-expanded="false" aria-controls="' + uid + '-list">' +
            '<span class="lf-select__value"></span>' + CHEV + '</button>' +
            '<ul class="lf-select__list" role="listbox" id="' + uid + '-list" tabindex="-1" hidden></ul>';
        native.classList.add('lf-select-native');
        native.tabIndex = -1;
        native.setAttribute('aria-hidden', 'true');
        native.parentNode.insertBefore(wrap, native.nextSibling);

        var btn = wrap.querySelector('.lf-select__btn');
        var valueEl = wrap.querySelector('.lf-select__value');
        var list = wrap.querySelector('.lf-select__list');
        if (label) {
            btn.setAttribute('aria-labelledby', label.id + ' ' + uid + '-val');
            valueEl.id = uid + '-val';
            list.setAttribute('aria-labelledby', label.id);
            label.addEventListener('click', function (e) { e.preventDefault(); btn.focus(); });
        }

        var options = Array.prototype.slice.call(native.options).map(function (o, i) {
            var li = document.createElement('li');
            li.className = 'lf-select__opt' + (o.value === '' ? ' is-placeholder' : '');
            li.id = uid + '-opt-' + i;
            li.setAttribute('role', 'option');
            li.dataset.index = i;
            li.innerHTML = '<span></span>' + CHECK;
            li.firstChild.textContent = o.text;
            list.appendChild(li);
            return li;
        });

        var active = -1;
        var typed = '';
        var typedTimer = null;

        function sync() {
            var o = native.options[native.selectedIndex];
            valueEl.textContent = o ? o.text : '';
            valueEl.classList.toggle('is-placeholder', !o || o.value === '');
            options.forEach(function (li, i) { li.setAttribute('aria-selected', i === native.selectedIndex ? 'true' : 'false'); });
        }
        function setActive(i, scrollIt) {
            if (i < 0 || i >= options.length) { return; }
            active = i;
            options.forEach(function (li, k) { li.classList.toggle('is-active', k === i); });
            btn.setAttribute('aria-activedescendant', options[i].id);
            if (scrollIt !== false) { options[i].scrollIntoView({ block: 'nearest' }); }
        }
        function isOpen() { return !list.hidden; }
        function open() {
            if (isOpen()) { return; }
            // buka ke atas jika ruang di bawah tidak cukup
            var rect = btn.getBoundingClientRect();
            var nav = $('.lf-nav');
            var headH = nav ? nav.getBoundingClientRect().bottom : 0;
            var below = window.innerHeight - rect.bottom - 16;
            var above = rect.top - Math.max(headH, 0) - 16;
            var up = below < 230 && above > below;
            wrap.classList.toggle('is-up', up);
            list.style.maxHeight = Math.max(150, Math.min(264, up ? above : below)) + 'px';
            list.hidden = false;
            wrap.classList.add('is-open');
            btn.setAttribute('aria-expanded', 'true');
            setActive(native.selectedIndex > -1 ? native.selectedIndex : 0);
        }
        function close(focusBtn) {
            if (!isOpen()) { return; }
            list.hidden = true;
            wrap.classList.remove('is-open');
            btn.setAttribute('aria-expanded', 'false');
            btn.removeAttribute('aria-activedescendant');
            if (focusBtn) { btn.focus(); }
        }
        function choose(i) {
            native.selectedIndex = i;
            native.removeAttribute('aria-invalid');
            sync();
            native.dispatchEvent(new Event('change', { bubbles: true }));
            close(true);
        }

        btn.addEventListener('click', function () { if (isOpen()) { close(false); } else { open(); } });
        list.addEventListener('mousedown', function (e) { e.preventDefault(); });
        list.addEventListener('click', function (e) {
            var li = e.target.closest('.lf-select__opt');
            if (li) { choose(+li.dataset.index); }
        });
        list.addEventListener('mousemove', function (e) {
            var li = e.target.closest('.lf-select__opt');
            if (li && +li.dataset.index !== active) { setActive(+li.dataset.index, false); }
        });

        btn.addEventListener('keydown', function (e) {
            var k = e.key;
            if (k === 'ArrowDown' || k === 'ArrowUp') {
                e.preventDefault();
                if (!isOpen()) { open(); return; }
                setActive(Math.min(options.length - 1, Math.max(0, active + (k === 'ArrowDown' ? 1 : -1))));
            } else if (k === 'Home' || k === 'End') {
                if (isOpen()) { e.preventDefault(); setActive(k === 'Home' ? 0 : options.length - 1); }
            } else if (k === 'Enter' || k === ' ') {
                if (isOpen()) { e.preventDefault(); if (active > -1) { choose(active); } }
                else if (k === ' ' && typed) { /* spasi saat mengetik */ }
            } else if (k === 'Escape') {
                if (isOpen()) { e.preventDefault(); e.stopPropagation(); close(true); }
            } else if (k === 'Tab') {
                close(false);
            } else if (k.length === 1 && !e.ctrlKey && !e.metaKey && !e.altKey) {
                // type-ahead
                typed += k.toLowerCase();
                window.clearTimeout(typedTimer);
                typedTimer = window.setTimeout(function () { typed = ''; }, 700);
                var hit = options.findIndex(function (li, i) {
                    return native.options[i].value !== '' && native.options[i].text.toLowerCase().indexOf(typed) === 0;
                });
                if (hit > -1) { if (!isOpen()) { open(); } setActive(hit); }
            }
        });

        document.addEventListener('click', function (e) { if (!wrap.contains(e.target)) { close(false); } });
        native.addEventListener('change', sync);
        sync();
    }

    function initSelects() {
        $$('.lf-field select').forEach(enhanceSelect);
    }

    /* ------------------------------------------------------------ INIT */
    function init() {
        initHeader();
        initNav();
        initVideo();
        initSliders();
        initTabs();
        initGallery();
        initEstimator();
        initWaForms();
        initSelects();
        initNewsletter();
        initChat();
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', init);
    } else {
        init();
    }
})();
