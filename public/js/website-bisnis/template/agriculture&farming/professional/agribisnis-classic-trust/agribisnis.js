/* =========================================================================
   AgroTrade — Agribisnis · Professional · Classic Trust
   JavaScript vanilla (tanpa dependensi). Semua fitur bersifat progressive:
   halaman tetap terbaca tanpa JS.
   ========================================================================= */
(function () {
    'use strict';

    var doc = document;
    var body = doc.body;
    var $ = function (sel, ctx) { return (ctx || doc).querySelector(sel); };
    var $$ = function (sel, ctx) { return Array.prototype.slice.call((ctx || doc).querySelectorAll(sel)); };
    var reduceMotion = window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches;

    var DATA = {};
    try {
        var node = $('#agro-data');
        DATA = node ? JSON.parse(node.textContent) : {};
    } catch (e) { DATA = {}; }

    var store = {
        get: function (k) { try { return window.sessionStorage.getItem(k); } catch (e) { return null; } },
        set: function (k, v) { try { window.sessionStorage.setItem(k, v); } catch (e) { /* abaikan */ } }
    };

    function svgIcon(name, cls) {
        return '<svg class="i' + (cls ? ' ' + cls : '') + '" aria-hidden="true"><use href="#i-' + name + '"/></svg>';
    }

    /* -------------------------------------------------- Placeholder links */
    $$('a[data-placeholder]').forEach(function (a) {
        a.addEventListener('click', function (e) { e.preventDefault(); });
    });

    /* -------------------------------------------------- Navbar */
    (function () {
        var nav = $('#siteNav');
        var toggle = $('#menuToggle');
        var backdrop = $('#navBackdrop');
        var menu = $('#mainMenu');
        var searchBtn = $('#searchToggle');
        var searchBox = $('#searchBox');

        function onScroll() {
            if (nav) { nav.classList.toggle('is-stuck', window.scrollY > 4); }
        }
        onScroll();
        window.addEventListener('scroll', onScroll, { passive: true });

        function setMenu(open) {
            if (!toggle) { return; }
            body.classList.toggle('menu-open', open);
            toggle.setAttribute('aria-expanded', open ? 'true' : 'false');
            toggle.setAttribute('aria-label', open ? 'Tutup menu' : 'Buka menu');
            if (backdrop) { backdrop.hidden = !open; }
            if (open) { setSearch(false); }
        }

        function setSearch(open) {
            if (!searchBtn || !searchBox) { return; }
            searchBox.hidden = !open;
            searchBtn.setAttribute('aria-expanded', open ? 'true' : 'false');
            if (open) {
                var input = $('input', searchBox);
                if (input) { window.setTimeout(function () { input.focus(); }, 30); }
            }
        }

        if (toggle) {
            toggle.addEventListener('click', function () { setMenu(!body.classList.contains('menu-open')); });
        }
        if (backdrop) { backdrop.addEventListener('click', function () { setMenu(false); }); }
        if (menu) {
            $$('a', menu).forEach(function (a) { a.addEventListener('click', function () { setMenu(false); }); });
        }
        if (searchBtn) {
            searchBtn.addEventListener('click', function () {
                setSearch(searchBox.hidden);
                if (!searchBox.hidden) { setMenu(false); }
            });
        }
        doc.addEventListener('keydown', function (e) {
            if (e.key === 'Escape') {
                if (body.classList.contains('menu-open')) { setMenu(false); if (toggle) { toggle.focus(); } }
                if (searchBox && !searchBox.hidden) { setSearch(false); if (searchBtn) { searchBtn.focus(); } }
            }
        });
        window.addEventListener('resize', function () { if (window.innerWidth > 1159) { setMenu(false); } });
    })();

    /* -------------------------------------------------- Dropdown sederhana (bahasa) */
    $$('[data-dropdown]').forEach(function (dd) {
        var btn = $('button', dd);
        var list = $('.dropdown__menu', dd);
        if (!btn || !list) { return; }
        function set(open) {
            list.hidden = !open;
            btn.setAttribute('aria-expanded', open ? 'true' : 'false');
        }
        btn.addEventListener('click', function (e) { e.stopPropagation(); set(list.hidden); });
        doc.addEventListener('click', function (e) { if (!dd.contains(e.target)) { set(false); } });
        doc.addEventListener('keydown', function (e) { if (e.key === 'Escape') { set(false); } });
    });

    /* -------------------------------------------------- Custom select (dropdown rapi) */
    var uid = 0;
    function enhanceSelect(select) {
        if (select.dataset.enhanced) { return; }
        select.dataset.enhanced = '1';
        uid += 1;

        var wrap = doc.createElement('div');
        wrap.className = 'cselect';
        select.parentNode.insertBefore(wrap, select);
        wrap.appendChild(select);
        select.classList.add('cselect__native', 'is-enhanced');
        select.tabIndex = -1;
        select.setAttribute('aria-hidden', 'true');

        var btn = doc.createElement('button');
        btn.type = 'button';
        btn.className = 'cselect__btn';
        btn.id = 'cs-btn-' + uid;
        btn.setAttribute('aria-haspopup', 'listbox');
        btn.setAttribute('aria-expanded', 'false');
        btn.innerHTML = '<span class="cselect__val"></span>' + svgIcon('chev');
        wrap.appendChild(btn);

        var list = doc.createElement('ul');
        list.className = 'cselect__list';
        list.setAttribute('role', 'listbox');
        list.id = 'cs-list-' + uid;
        list.hidden = true;
        btn.setAttribute('aria-controls', list.id);
        wrap.appendChild(list);

        var label = select.id ? $('label[for="' + select.id + '"]') : null;
        if (label) {
            if (!label.id) { label.id = 'cs-lbl-' + uid; }
            btn.setAttribute('aria-labelledby', label.id + ' ' + btn.id);
            label.addEventListener('click', function (e) { e.preventDefault(); btn.focus(); });
        }

        var valEl = $('.cselect__val', btn);
        var items = [];
        var activeIdx = -1;
        var typed = '';
        var typedTimer = null;

        function build() {
            list.innerHTML = '';
            items = [];
            $$('option', select).forEach(function (opt, i) {
                var li = doc.createElement('li');
                li.className = 'cselect__opt';
                li.setAttribute('role', 'option');
                li.dataset.index = String(i);
                li.id = list.id + '-' + i;
                if (opt.disabled) { li.setAttribute('aria-disabled', 'true'); }
                li.innerHTML = '<span></span>' + svgIcon('check');
                $('span', li).textContent = opt.textContent;
                list.appendChild(li);
                items.push({ el: li, opt: opt });
            });
            sync();
        }

        function sync() {
            var sel = select.options[select.selectedIndex];
            var isPlaceholder = !sel || sel.disabled || sel.value === '' && sel.defaultSelected && select.required;
            valEl.textContent = sel ? sel.textContent : '';
            valEl.classList.toggle('is-placeholder', !!isPlaceholder);
            items.forEach(function (it) {
                it.el.setAttribute('aria-selected', it.opt.selected && !it.opt.disabled ? 'true' : 'false');
            });
        }
        select._agroSync = sync;

        function visibleItems() { return items.filter(function (it) { return !it.opt.disabled; }); }

        function setActive(it, scroll) {
            items.forEach(function (x) { x.el.classList.remove('is-active'); });
            if (!it) { activeIdx = -1; btn.removeAttribute('aria-activedescendant'); return; }
            it.el.classList.add('is-active');
            activeIdx = items.indexOf(it);
            btn.setAttribute('aria-activedescendant', it.el.id);
            if (scroll) { it.el.scrollIntoView({ block: 'nearest' }); }
        }

        function open() {
            if (!list.hidden) { return; }
            $$('.cselect.is-open').forEach(function (o) { if (o !== wrap && o._close) { o._close(); } });
            list.hidden = false;
            wrap.classList.add('is-open');
            btn.setAttribute('aria-expanded', 'true');
            var rect = btn.getBoundingClientRect();
            var room = window.innerHeight - rect.bottom;
            wrap.classList.toggle('is-up', room < 280 && rect.top > room);
            var cur = items.filter(function (it) { return it.opt.selected && !it.opt.disabled; })[0] || visibleItems()[0];
            setActive(cur, true);
        }

        function close() {
            if (list.hidden) { return; }
            list.hidden = true;
            wrap.classList.remove('is-open');
            btn.setAttribute('aria-expanded', 'false');
            setActive(null);
        }
        wrap._close = close;

        function choose(it) {
            if (!it || it.opt.disabled) { return; }
            select.value = it.opt.value;
            sync();
            select.dispatchEvent(new Event('change', { bubbles: true }));
            close();
            btn.focus();
        }

        function move(step) {
            var vis = visibleItems();
            if (!vis.length) { return; }
            var cur = items[activeIdx];
            var pos = vis.indexOf(cur);
            var next = pos === -1 ? (step > 0 ? 0 : vis.length - 1) : (pos + step + vis.length) % vis.length;
            setActive(vis[next], true);
        }

        btn.addEventListener('click', function () { list.hidden ? open() : close(); });
        list.addEventListener('mousedown', function (e) { e.preventDefault(); });
        list.addEventListener('click', function (e) {
            var li = e.target.closest('.cselect__opt');
            if (!li) { return; }
            choose(items[parseInt(li.dataset.index, 10)]);
        });
        list.addEventListener('mousemove', function (e) {
            var li = e.target.closest('.cselect__opt');
            if (li && !li.classList.contains('is-active')) { setActive(items[parseInt(li.dataset.index, 10)], false); }
        });
        btn.addEventListener('keydown', function (e) {
            var k = e.key;
            if (k === 'ArrowDown' || k === 'ArrowUp') {
                e.preventDefault();
                if (list.hidden) { open(); } else { move(k === 'ArrowDown' ? 1 : -1); }
            } else if (k === 'Enter' || k === ' ') {
                e.preventDefault();
                if (list.hidden) { open(); } else { choose(items[activeIdx]); }
            } else if (k === 'Escape') {
                if (!list.hidden) { e.preventDefault(); e.stopPropagation(); close(); }
            } else if (k === 'Home' || k === 'End') {
                if (!list.hidden) {
                    e.preventDefault();
                    var vis = visibleItems();
                    setActive(k === 'Home' ? vis[0] : vis[vis.length - 1], true);
                }
            } else if (k === 'Tab') {
                close();
            } else if (k.length === 1 && !e.ctrlKey && !e.metaKey && !e.altKey) {
                typed += k.toLowerCase();
                window.clearTimeout(typedTimer);
                typedTimer = window.setTimeout(function () { typed = ''; }, 600);
                var hit = visibleItems().filter(function (it) { return it.opt.textContent.toLowerCase().indexOf(typed) === 0; })[0];
                if (hit) { if (list.hidden) { open(); } setActive(hit, true); }
            }
        });
        doc.addEventListener('click', function (e) { if (!wrap.contains(e.target)) { close(); } });
        select.addEventListener('change', sync);
        build();
    }
    $$('select.select').forEach(enhanceSelect);

    /* -------------------------------------------------- Form → WhatsApp */
    (function () {
        var forms = $$('form[data-wa-form]');
        if (!forms.length) { return; }
        var number = (DATA.whatsapp && DATA.whatsapp.number) || '';
        var params = new URLSearchParams(window.location.search);

        function fieldWrap(el) { return el.closest('.field'); }

        function setError(el, msg) {
            var w = fieldWrap(el);
            if (!w) { return; }
            var err = $('.field__err', w);
            w.classList.toggle('is-invalid', !!msg);
            if (err) { err.hidden = !msg; err.textContent = msg || ''; }
            var focusable = el.classList.contains('is-enhanced') ? $('.cselect__btn', w) : el;
            if (focusable) { focusable.setAttribute('aria-invalid', msg ? 'true' : 'false'); }
        }

        function validate(el) {
            var v = (el.value || '').trim();
            if (el.required && !v) { return el.tagName === 'SELECT' ? 'Pilih salah satu opsi.' : 'Kolom ini wajib diisi.'; }
            if (!v) { return ''; }
            if (el.type === 'email' && !/^[^\s@]+@[^\s@]+\.[^\s@]{2,}$/.test(v)) { return 'Format email belum benar.'; }
            if (el.dataset.type === 'phone') {
                var digits = v.replace(/\D/g, '');
                if (digits.length < 9 || digits.length > 15 || !/^[+\d][\d\s\-()]+$/.test(v)) { return 'Masukkan nomor telepon yang valid (9–15 digit).'; }
            }
            if (el.type === 'number' && (isNaN(parseFloat(v)) || parseFloat(v) <= 0)) { return 'Masukkan angka lebih dari 0.'; }
            if (el.tagName === 'TEXTAREA' && el.required && v.length < 10) { return 'Tuliskan minimal 10 karakter.'; }
            return '';
        }

        function valueOf(el) {
            if (el.tagName === 'SELECT') {
                var o = el.options[el.selectedIndex];
                return o && !o.disabled && o.value !== '' ? o.textContent.trim() : '';
            }
            if (el.type === 'date' && el.value) {
                var p = el.value.split('-');
                return p.length === 3 ? p[2] + '/' + p[1] + '/' + p[0] : el.value;
            }
            return (el.value || '').trim();
        }

        forms.forEach(function (form) {
            var fields = $$('input[name], select[name], textarea[name]', form);
            var ok = $('.form__ok', form);
            var retry = $('[data-wa-retry]', form);

            // prefill ?komoditas=slug
            var pre = params.get('komoditas');
            if (pre) {
                var sel = $('select[name="komoditas"]', form);
                if (sel && $('option[value="' + pre.replace(/"/g, '') + '"]', sel)) {
                    sel.value = pre;
                    if (sel._agroSync) { sel._agroSync(); }
                }
            }

            fields.forEach(function (el) {
                var evt = el.tagName === 'SELECT' ? 'change' : 'input';
                el.addEventListener(evt, function () { if (fieldWrap(el) && fieldWrap(el).classList.contains('is-invalid')) { setError(el, validate(el)); } });
                el.addEventListener('blur', function () { if (el.value && el.tagName !== 'SELECT') { setError(el, validate(el)); } });
            });

            form.addEventListener('submit', function (e) {
                e.preventDefault();
                var firstBad = null;
                fields.forEach(function (el) {
                    var msg = validate(el);
                    setError(el, msg);
                    if (msg && !firstBad) { firstBad = el; }
                });
                if (firstBad) {
                    var f = firstBad.classList.contains('is-enhanced') ? $('.cselect__btn', fieldWrap(firstBad)) : firstBad;
                    if (f) { f.focus(); }
                    return;
                }

                var lines = ['*' + (form.dataset.waTitle || 'Permintaan') + '*', ''];
                fields.forEach(function (el) {
                    var val = valueOf(el);
                    if (val) { lines.push((el.dataset.label || el.name) + ': ' + val); }
                });
                lines.push('', 'Dikirim dari website AgroTrade.');
                var url = 'https://wa.me/' + number + '?text=' + encodeURIComponent(lines.join('\n'));

                if (retry) { retry.href = url; }
                if (ok) { ok.hidden = false; ok.scrollIntoView({ block: 'nearest', behavior: reduceMotion ? 'auto' : 'smooth' }); }
                var w = window.open(url, '_blank', 'noopener');
                if (!w && ok) { ok.focus && ok.focus(); }
            });
        });
    })();

    /* -------------------------------------------------- Filter katalog komoditas */
    (function () {
        var grid = $('#cmGrid');
        if (!grid) { return; }
        var cards = $$('.cm-card', grid);
        var input = $('#cmSearch');
        var chips = $$('.chip[data-filter]');
        var count = $('#cmCount');
        var empty = $('#cmEmpty');
        var group = 'all';

        function apply() {
            var q = (input ? input.value : '').trim().toLowerCase();
            var shown = 0;
            cards.forEach(function (c) {
                var okGroup = group === 'all' || c.dataset.group === group;
                var okText = !q || c.dataset.name.indexOf(q) !== -1;
                var show = okGroup && okText;
                c.hidden = !show;
                if (show) { shown += 1; }
            });
            if (count) { count.textContent = 'Menampilkan ' + shown + ' dari ' + cards.length + ' komoditas'; }
            if (empty) { empty.hidden = shown !== 0; }
        }

        chips.forEach(function (chip) {
            chip.addEventListener('click', function () {
                group = chip.dataset.filter;
                chips.forEach(function (c) {
                    var on = c === chip;
                    c.classList.toggle('is-active', on);
                    c.setAttribute('aria-pressed', on ? 'true' : 'false');
                });
                apply();
            });
        });
        if (input) {
            input.addEventListener('input', apply);
            var q = new URLSearchParams(window.location.search).get('q');
            if (q) { input.value = q; }
        }
        apply();
    })();

    /* -------------------------------------------------- Tabs (spesifikasi) */
    $$('[data-tabs]').forEach(function (root) {
        var tabs = $$('[role="tab"]', root);
        var panels = $$('[role="tabpanel"]', root);

        function activate(slug, focus) {
            var found = tabs.some(function (t) { return t.dataset.tab === slug; });
            if (!found) { return false; }
            tabs.forEach(function (t) {
                var on = t.dataset.tab === slug;
                t.classList.toggle('is-active', on);
                t.setAttribute('aria-selected', on ? 'true' : 'false');
                t.tabIndex = on ? 0 : -1;
                if (on && focus) { t.focus(); }
                if (on && t.scrollIntoView) { t.scrollIntoView({ block: 'nearest', inline: 'center', behavior: reduceMotion ? 'auto' : 'smooth' }); }
            });
            panels.forEach(function (p) { p.hidden = p.id !== 'spec-' + slug; });
            return found;
        }

        tabs.forEach(function (t, i) {
            t.addEventListener('click', function () {
                activate(t.dataset.tab, false);
                if (window.history && window.history.replaceState) { window.history.replaceState(null, '', '#' + t.dataset.tab); }
            });
            t.addEventListener('keydown', function (e) {
                var n = null;
                if (e.key === 'ArrowRight') { n = tabs[(i + 1) % tabs.length]; }
                if (e.key === 'ArrowLeft') { n = tabs[(i - 1 + tabs.length) % tabs.length]; }
                if (e.key === 'Home') { n = tabs[0]; }
                if (e.key === 'End') { n = tabs[tabs.length - 1]; }
                if (n) { e.preventDefault(); activate(n.dataset.tab, true); }
            });
        });

        function fromHash() {
            var h = window.location.hash.replace('#', '');
            if (h) { activate(h, false); }
        }
        fromHash();
        window.addEventListener('hashchange', fromHash);
    });

    /* -------------------------------------------------- AgroBot (chat FAQ) */
    (function () {
        var panel = $('#chatPanel');
        var toggle = $('#chatToggle');
        if (!panel || !toggle || !DATA.ai) { return; }

        var log = $('#chatLog');
        var chips = $('#chatChips');
        var form = $('#chatForm');
        var input = $('#chatInput');
        var closeBtn = $('#chatClose');
        var hint = $('#botHint');
        var hintClose = $('#botHintClose');
        var faq = DATA.ai.faq || [];
        var welcomed = false;
        var busy = false;
        var botImg = $('.chat__avatar img', panel);
        var botSrc = botImg ? botImg.getAttribute('src') : '';

        function scrollDown() { log.scrollTop = log.scrollHeight; }

        function addMsg(role, html, isHtml) {
            var el = doc.createElement('div');
            el.className = 'msg msg--' + role;
            var inner = '';
            if (role === 'bot') { inner += '<span class="msg__av"><img src="' + botSrc + '" alt="" width="22" height="26"></span>'; }
            inner += '<div class="msg__bub"></div>';
            el.innerHTML = inner;
            var bub = $('.msg__bub', el);
            if (isHtml) { bub.innerHTML = html; } else { bub.textContent = html; }
            log.appendChild(el);
            scrollDown();
            return el;
        }

        function addTyping() {
            var el = addMsg('bot', '<span class="typing" aria-label="AgroBot sedang mengetik"><i></i><i></i><i></i></span>', true);
            return el;
        }

        function normalize(t) {
            return (' ' + t.toLowerCase().replace(/[^a-z0-9\/\s]/g, ' ').replace(/\s+/g, ' ') + ' ');
        }

        function findAnswer(q) {
            var n = normalize(q);
            var best = null;
            var bestScore = 0;
            faq.forEach(function (f) {
                var score = 0;
                if (normalize(f.q).trim() === n.trim()) { score += 10; }
                (f.kw || []).forEach(function (k) {
                    if (n.indexOf(' ' + k.toLowerCase()) !== -1) { score += k.length > 3 ? 3 : 2; }
                });
                normalize(f.q).trim().split(' ').forEach(function (w) {
                    if (w.length > 4 && n.indexOf(' ' + w) !== -1) { score += 1; }
                });
                if (score > bestScore) { bestScore = score; best = f; }
            });
            return bestScore >= 2 ? best : null;
        }

        function waLink(text) {
            return 'https://wa.me/' + (DATA.whatsapp.number || '') + '?text=' + encodeURIComponent(text);
        }

        function escapeHtml(s) {
            return s.replace(/[&<>"']/g, function (c) { return { '&': '&amp;', '<': '&lt;', '>': '&gt;', '"': '&quot;', "'": '&#39;' }[c]; });
        }

        function reply(q) {
            var n = normalize(q);
            var html;
            if (/ (halo|hai|hi|hello|selamat) /.test(n) && n.trim().split(' ').length <= 3) {
                html = escapeHtml('Halo! Ada yang bisa saya bantu seputar komoditas, harga, pengiriman, sertifikasi, atau kemitraan?');
            } else if (/ (terima kasih|makasih|thanks|thank you) /.test(n)) {
                html = escapeHtml('Sama-sama! Jika ada pertanyaan lain, silakan tanyakan kapan saja.');
            } else if (/ (admin|cs|manusia|petugas|sales|agen) /.test(n)) {
                html = escapeHtml('Tentu, Anda bisa langsung berbincang dengan tim kami melalui WhatsApp.') +
                    '<br><a class="msg__cta" href="' + waLink(DATA.whatsapp.greeting) + '" target="_blank" rel="noopener">Chat WhatsApp ' + svgIcon('arrow', 'i--sm') + '</a>';
            } else {
                var f = findAnswer(q);
                if (f) {
                    html = escapeHtml(f.a) + '<br><a class="msg__cta" href="' + f.url + '">' + escapeHtml(f.cta) + ' ' + svgIcon('arrow', 'i--sm') + '</a>';
                } else {
                    html = escapeHtml(DATA.ai.fallback) +
                        '<br><a class="msg__cta" href="' + waLink('Halo AgroTrade, saya ingin bertanya: ' + q) + '" target="_blank" rel="noopener">Tanya via WhatsApp ' + svgIcon('arrow', 'i--sm') + '</a>';
                }
            }
            return html;
        }

        function ask(q) {
            q = (q || '').trim();
            if (!q || busy) { return; }
            busy = true;
            addMsg('user', q, false);
            var t = addTyping();
            var delay = reduceMotion ? 0 : 450 + Math.min(700, q.length * 12);
            window.setTimeout(function () {
                t.remove();
                addMsg('bot', reply(q), true);
                busy = false;
            }, delay);
        }

        function renderChips() {
            chips.innerHTML = '';
            faq.forEach(function (f) {
                var b = doc.createElement('button');
                b.type = 'button';
                b.textContent = f.q;
                b.addEventListener('click', function () { ask(f.q); });
                chips.appendChild(b);
            });
        }

        function welcome() {
            if (welcomed) { return; }
            welcomed = true;
            addMsg('bot', DATA.ai.welcome, false);
            renderChips();
        }

        function open(question) {
            panel.hidden = false;
            body.classList.add('chat-open');
            toggle.setAttribute('aria-expanded', 'true');
            if (hint) { hint.hidden = true; store.set('agroHintSeen', '1'); }
            welcome();
            if (question) {
                window.setTimeout(function () { ask(question); }, 200);
            } else {
                window.setTimeout(function () { input.focus(); }, 60);
            }
        }

        function close() {
            panel.hidden = true;
            body.classList.remove('chat-open');
            toggle.setAttribute('aria-expanded', 'false');
            toggle.focus();
        }

        toggle.addEventListener('click', function () { panel.hidden ? open() : close(); });
        closeBtn.addEventListener('click', close);
        doc.addEventListener('keydown', function (e) {
            if (e.key === 'Escape' && !panel.hidden) { close(); }
        });
        form.addEventListener('submit', function (e) {
            e.preventDefault();
            var v = input.value;
            input.value = '';
            ask(v);
        });

        $$('[data-chat-open]').forEach(function (b) { b.addEventListener('click', function () { open(); }); });
        $$('[data-chat-ask]').forEach(function (b) { b.addEventListener('click', function () { open(b.getAttribute('data-chat-ask')); }); });

        // Sapaan AgroBot (sekali per sesi)
        if (hint && !store.get('agroHintSeen')) {
            window.setTimeout(function () {
                if (panel.hidden) {
                    hint.hidden = false;
                    window.setTimeout(function () { hint.hidden = true; store.set('agroHintSeen', '1'); }, 9000);
                }
            }, 5000);
        }
        if (hintClose) {
            hintClose.addEventListener('click', function () { hint.hidden = true; store.set('agroHintSeen', '1'); });
        }
    })();
})();
