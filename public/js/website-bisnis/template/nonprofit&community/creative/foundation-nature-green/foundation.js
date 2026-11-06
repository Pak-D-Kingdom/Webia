/* ==========================================================================
   GreenHope Foundation — Nonprofit & Community · Creative · Nature Green
   Vanilla JS (tanpa dependensi). Semua fitur progressive: halaman tetap
   terbaca tanpa JS. Hook memakai atribut data-fh-*.
   ========================================================================== */
(function () {
    'use strict';

    var doc = document;
    var reduceMotion = !!(window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches);

    function qs(sel, root) { return (root || doc).querySelector(sel); }
    function qsa(sel, root) { return Array.prototype.slice.call((root || doc).querySelectorAll(sel)); }
    function el(tag, cls) { var n = doc.createElement(tag); if (cls) { n.className = cls; } return n; }

    // Data dari layout (FAQ GreenBot + nomor WhatsApp)
    var data = { wa: '', faq: [], suggestions: [], intro: '', greeting: '', fallback: '' };
    try {
        var dataEl = qs('#fh-data');
        if (dataEl) { data = JSON.parse(dataEl.textContent) || data; }
    } catch (e) { /* abaikan: fitur chat memakai nilai default */ }

    /* ---- Toast ---------------------------------------------------------- */
    var toastEl = null;
    var toastTimer = 0;
    function toast(message) {
        toastEl = toastEl || qs('[data-fh-toast]');
        if (!toastEl) { return; }
        toastEl.textContent = message;
        toastEl.hidden = false;
        window.requestAnimationFrame(function () { toastEl.classList.add('is-show'); });
        window.clearTimeout(toastTimer);
        toastTimer = window.setTimeout(function () {
            toastEl.classList.remove('is-show');
            window.setTimeout(function () { toastEl.hidden = true; }, 280);
        }, 2800);
    }

    /* ---- Header (menu mobile) + pencarian situs (dialog) --------------- */
    function initHeader() {
        var header = qs('[data-fh-header]');
        var menuBtn = header ? qs('[data-fh-menu-toggle]', header) : null;
        var modal = qs('[data-fh-search]');
        var input = modal ? qs('[data-fh-search-input]', modal) : null;
        var list = modal ? qs('[data-fh-search-list]', modal) : null;
        var empty = modal ? qs('[data-fh-search-empty]', modal) : null;
        var term = modal ? qs('[data-fh-search-term]', modal) : null;
        var lastFocus = null;
        var closeTimer = 0;

        function setMenu(open) {
            if (!header) { return; }
            header.classList.toggle('is-open', open);
            if (menuBtn) {
                menuBtn.setAttribute('aria-expanded', open ? 'true' : 'false');
                menuBtn.setAttribute('aria-label', open ? 'Tutup menu' : 'Buka menu');
            }
        }
        function visibleLinks() {
            if (!list) { return []; }
            return qsa('li', list).filter(function (li) { return !li.hidden; }).map(function (li) { return qs('a', li); });
        }
        function filterList() {
            if (!input || !list) { return; }
            var q = input.value.toLowerCase().trim();
            var shown = 0;
            qsa('li', list).forEach(function (li) {
                var match = !q || (li.getAttribute('data-text') || '').indexOf(q) !== -1;
                li.hidden = !match;
                if (match) { shown += 1; }
            });
            if (empty) { empty.hidden = shown > 0; }
            if (term) { term.textContent = input.value.trim(); }
        }
        function openSearch() {
            if (!modal || !input) { return; }
            lastFocus = doc.activeElement;
            setMenu(false);
            window.clearTimeout(closeTimer);
            modal.hidden = false;
            doc.documentElement.classList.add('fh-lock');
            input.value = '';
            filterList();
            window.requestAnimationFrame(function () { modal.classList.add('is-open'); });
            window.setTimeout(function () { input.focus(); }, 40);
        }
        function closeSearch() {
            if (!modal || modal.hidden) { return; }
            modal.classList.remove('is-open');
            doc.documentElement.classList.remove('fh-lock');
            closeTimer = window.setTimeout(function () { modal.hidden = true; }, 260);
            if (lastFocus && lastFocus.focus) { lastFocus.focus(); }
        }

        if (menuBtn) { menuBtn.addEventListener('click', function () { setMenu(!header.classList.contains('is-open')); }); }
        if (header) {
            qsa('.fh-menu a', header).forEach(function (a) { a.addEventListener('click', function () { setMenu(false); }); });
            doc.addEventListener('click', function (e) { if (!header.contains(e.target)) { setMenu(false); } });
            var onScroll = function () { header.classList.toggle('is-stuck', window.scrollY > 8); };
            onScroll();
            window.addEventListener('scroll', onScroll, { passive: true });
        }

        qsa('[data-fh-search-toggle]').forEach(function (b) { b.addEventListener('click', openSearch); });
        if (modal && input) {
            qsa('[data-fh-search-close]', modal).forEach(function (b) { b.addEventListener('click', closeSearch); });
            qsa('[data-fh-search-fill]', modal).forEach(function (b) {
                b.addEventListener('click', function () {
                    input.value = b.getAttribute('data-fh-search-fill') || '';
                    filterList();
                    input.focus();
                });
            });
            input.addEventListener('input', filterList);
            input.addEventListener('keydown', function (e) {
                var links = visibleLinks();
                if (e.key === 'ArrowDown' && links.length) { e.preventDefault(); links[0].focus(); }
                if (e.key === 'Enter' && links.length) { e.preventDefault(); window.location.href = links[0].href; }
            });
            if (list) {
                list.addEventListener('keydown', function (e) {
                    var links = visibleLinks();
                    var idx = links.indexOf(doc.activeElement);
                    if (idx === -1) { return; }
                    if (e.key === 'ArrowDown') { e.preventDefault(); if (links[idx + 1]) { links[idx + 1].focus(); } }
                    if (e.key === 'ArrowUp') { e.preventDefault(); if (idx === 0) { input.focus(); } else { links[idx - 1].focus(); } }
                });
            }
            modal.addEventListener('keydown', function (e) {
                if (e.key === 'Escape') { e.preventDefault(); closeSearch(); return; }
                if (e.key !== 'Tab') { return; }
                var panel = qs('.fh-searchmodal__panel', modal);
                var f = qsa('input, button, a[href]', panel).filter(function (n) { return !n.disabled && n.offsetParent !== null; });
                if (!f.length) { return; }
                if (e.shiftKey && doc.activeElement === f[0]) { e.preventDefault(); f[f.length - 1].focus(); }
                else if (!e.shiftKey && doc.activeElement === f[f.length - 1]) { e.preventDefault(); f[0].focus(); }
            });
        }

        doc.addEventListener('keydown', function (e) {
            if (e.key === 'Escape') { setMenu(false); }
            if (!modal) { return; }
            var isK = (e.key === 'k' || e.key === 'K') && (e.ctrlKey || e.metaKey);
            if (isK) { e.preventDefault(); if (modal.hidden) { openSearch(); } else { closeSearch(); } return; }
            if (e.key === '/' && modal.hidden) {
                var t = e.target;
                var typing = t && (t.tagName === 'INPUT' || t.tagName === 'TEXTAREA' || t.tagName === 'SELECT' || t.isContentEditable);
                if (!typing) { e.preventDefault(); openSearch(); }
            }
        });
    }

    /* ---- Reveal saat scroll + counter angka ----------------------------- */
    function formatCount(value, suffix) {
        var n = Math.round(value);
        return n.toLocaleString('id-ID') + (suffix || '');
    }
    function runCounter(node) {
        var target = parseFloat(node.getAttribute('data-fh-count'));
        var suffix = node.getAttribute('data-fh-suffix') || '';
        if (isNaN(target)) { return; }
        if (reduceMotion) { node.textContent = formatCount(target, suffix); return; }
        var start = null;
        var duration = 1400;
        function step(ts) {
            if (start === null) { start = ts; }
            var p = Math.min((ts - start) / duration, 1);
            var eased = 1 - Math.pow(1 - p, 3);
            node.textContent = formatCount(target * eased, suffix);
            if (p < 1) { window.requestAnimationFrame(step); } else { node.textContent = formatCount(target, suffix); }
        }
        node.textContent = formatCount(0, suffix);
        window.requestAnimationFrame(step);
    }
    function initReveal() {
        var items = qsa('.fh-reveal');
        var counters = qsa('[data-fh-count]');

        if (!('IntersectionObserver' in window)) {
            items.forEach(function (i) { i.classList.add('is-in'); });
            return;
        }
        items.forEach(function (node) {
            var siblings = node.parentNode ? Array.prototype.indexOf.call(node.parentNode.children, node) : 0;
            node.style.setProperty('--d', (Math.min(siblings, 5) * 70) + 'ms');
        });
        var io = new IntersectionObserver(function (entries) {
            entries.forEach(function (entry) {
                if (!entry.isIntersecting) { return; }
                entry.target.classList.add('is-in');
                io.unobserve(entry.target);
            });
        }, { threshold: 0.12, rootMargin: '0px 0px -6% 0px' });
        items.forEach(function (node) { io.observe(node); });

        var co = new IntersectionObserver(function (entries) {
            entries.forEach(function (entry) {
                if (!entry.isIntersecting) { return; }
                runCounter(entry.target);
                co.unobserve(entry.target);
            });
        }, { threshold: 0.6 });
        counters.forEach(function (node) { co.observe(node); });
    }

    /* ---- Tab donasi ----------------------------------------------------- */
    function initTabs() {
        qsa('[data-fh-tabs]').forEach(function (root) {
            var tabs = qsa('[data-fh-tab]', root);
            var panels = qsa('[role="tabpanel"]', root);
            if (!tabs.length) { return; }

            function activate(key, focus, updateHash) {
                tabs.forEach(function (t) {
                    var on = t.getAttribute('data-fh-tab') === key;
                    t.setAttribute('aria-selected', on ? 'true' : 'false');
                    t.tabIndex = on ? 0 : -1;
                    if (on && focus) { t.focus(); }
                });
                panels.forEach(function (p) { p.hidden = p.id !== key; });
                if (updateHash && window.history && history.replaceState) { history.replaceState(null, '', '#' + key); }
            }
            tabs.forEach(function (t, i) {
                t.addEventListener('click', function () { activate(t.getAttribute('data-fh-tab'), false, true); });
                t.addEventListener('keydown', function (e) {
                    var next = null;
                    if (e.key === 'ArrowRight' || e.key === 'ArrowDown') { next = (i + 1) % tabs.length; }
                    if (e.key === 'ArrowLeft' || e.key === 'ArrowUp') { next = (i - 1 + tabs.length) % tabs.length; }
                    if (e.key === 'Home') { next = 0; }
                    if (e.key === 'End') { next = tabs.length - 1; }
                    if (next === null) { return; }
                    e.preventDefault();
                    activate(tabs[next].getAttribute('data-fh-tab'), true, true);
                });
            });
            function fromHash() {
                var key = window.location.hash.slice(1);
                var known = tabs.some(function (t) { return t.getAttribute('data-fh-tab') === key; });
                if (!known) { return; }
                activate(key, false, false);
                var list = qs('.fh-tabs__list', root);
                if (list && list.scrollIntoView) { list.scrollIntoView({ behavior: reduceMotion ? 'auto' : 'smooth', block: 'start' }); }
            }
            fromHash();
            window.addEventListener('hashchange', fromHash);
        });
    }

    /* ---- Filter + pencarian berita -------------------------------------- */
    function initFilters() {
        qsa('[data-fh-filters]').forEach(function (group) {
            var buttons = qsa('[data-fh-filter]', group);
            var items = qsa('[data-fh-type]');
            var empty = qs('[data-fh-filter-empty]');
            var search = qs('[data-fh-news-search]');
            var current = 'all';

            function apply() {
                var q = search ? search.value.toLowerCase().trim() : '';
                var shown = 0;
                items.forEach(function (item) {
                    var okType = current === 'all' || item.getAttribute('data-fh-type') === current;
                    var okText = !q || (item.getAttribute('data-fh-text') || '').indexOf(q) !== -1;
                    var show = okType && okText;
                    item.hidden = !show;
                    if (show) { shown += 1; }
                });
                if (empty) { empty.hidden = shown > 0; }
            }
            buttons.forEach(function (btn) {
                btn.addEventListener('click', function () {
                    current = btn.getAttribute('data-fh-filter');
                    buttons.forEach(function (b) {
                        var on = b === btn;
                        b.classList.toggle('is-active', on);
                        b.setAttribute('aria-pressed', on ? 'true' : 'false');
                    });
                    apply();
                });
            });
            if (search) { search.addEventListener('input', apply); }
        });
    }

    /* ---- Salin nomor rekening, tautan placeholder ----------------------- */
    function copyText(text) {
        if (navigator.clipboard && window.isSecureContext) { return navigator.clipboard.writeText(text); }
        return new Promise(function (resolve, reject) {
            var ta = el('textarea');
            ta.value = text;
            ta.setAttribute('readonly', '');
            ta.style.position = 'fixed';
            ta.style.opacity = '0';
            doc.body.appendChild(ta);
            ta.select();
            try { if (doc.execCommand('copy')) { resolve(); } else { reject(); } } catch (err) { reject(err); }
            doc.body.removeChild(ta);
        });
    }
    function initMisc() {
        qsa('[data-fh-copy]').forEach(function (btn) {
            btn.addEventListener('click', function () {
                var text = btn.getAttribute('data-fh-copy');
                copyText(text).then(function () { toast('Nomor rekening disalin: ' + text); }, function () { toast('Gagal menyalin. Salin nomor secara manual.'); });
            });
        });
        qsa('[data-fh-noop]').forEach(function (a) {
            a.addEventListener('click', function (e) {
                e.preventDefault();
                toast(a.getAttribute('data-fh-noop') || 'Tautan ini belum dihubungkan.');
            });
        });
    }

    /* ---- Form -> WhatsApp ---------------------------------------------- */
    function digits(v) { return String(v).replace(/[^0-9]/g, ''); }
    function rupiah(v) {
        var d = digits(v);
        return d ? 'Rp ' + Number(d).toLocaleString('id-ID') : '';
    }
    function openWhatsApp(text) {
        if (!data.wa) { toast('Nomor WhatsApp belum diatur.'); return; }
        var url = 'https://wa.me/' + data.wa + '?text=' + encodeURIComponent(text);
        var win = window.open(url, '_blank');
        if (win) { win.opener = null; } else { window.location.href = url; }
    }
    function initWaForms() {
        qsa('[data-fh-wa-form]').forEach(function (form) {
            var custom = qs('[data-overrides]', form);
            if (custom) {
                var group = custom.getAttribute('data-overrides');
                custom.addEventListener('input', function () {
                    custom.value = custom.value.replace(/[^0-9.]/g, '');
                    if (custom.value) {
                        qsa('input[type="radio"][name="' + group + '"]', form).forEach(function (r) { r.checked = false; });
                    }
                });
                qsa('input[type="radio"][name="' + group + '"]', form).forEach(function (r) {
                    r.addEventListener('change', function () { custom.value = ''; });
                });
            }
            var sum = qs('[data-fh-summary]', form);
            if (sum) {
                var updateSummary = function () {
                    var typed = custom ? digits(custom.value) : '';
                    var text = '';
                    if (typed) { text = rupiah(typed); }
                    else {
                        var checked = qs('input[type="radio"][name="nominal"]:checked', form);
                        text = checked ? checked.value : '';
                    }
                    sum.textContent = text || 'Rp 0';
                };
                form.addEventListener('input', updateSummary);
                form.addEventListener('change', updateSummary);
                updateSummary();
            }
            form.addEventListener('submit', function (e) {
                e.preventDefault();
                if (!form.checkValidity()) { form.reportValidity(); return; }
                var entries = [];
                qsa('[data-label]', form).forEach(function (field) {
                    var val = '';
                    if (field.type === 'radio') { if (!field.checked) { return; } val = field.value; }
                    else if (field.type === 'checkbox') { if (!field.checked) { return; } val = 'Ya'; }
                    else { val = (field.value || '').trim(); }
                    if (!val) { return; }
                    if (field.getAttribute('data-format') === 'rupiah') { val = rupiah(val); }
                    entries.push({ name: field.name, label: field.getAttribute('data-label'), value: val, over: field.getAttribute('data-overrides') });
                });
                var overridden = entries.filter(function (x) { return x.over; }).map(function (x) { return x.over; });
                entries = entries.filter(function (x) { return overridden.indexOf(x.name) === -1 || x.over; });
                var lines = entries.map(function (x) { return x.label + ': ' + x.value; });
                var title = form.getAttribute('data-wa-title') || 'Halo GreenHope,';
                openWhatsApp(title + '\n' + lines.join('\n') + '\n\nTerima kasih.');
            });
        });
    }

    /* ---- GreenBot (FAQ program & donasi) -------------------------------- */
    function norm(s) {
        return String(s).toLowerCase().normalize('NFD').replace(/[\u0300-\u036f]/g, '').replace(/[^a-z0-9\s]/g, ' ').replace(/\s+/g, ' ').trim();
    }
    function bestFaq(question) {
        var n = ' ' + norm(question) + ' ';
        var best = null;
        var top = 0;
        (data.faq || []).forEach(function (f) {
            var score = 0;
            (f.k || []).forEach(function (k) {
                var nk = norm(k);
                if (nk && n.indexOf(nk) !== -1) { score += nk.indexOf(' ') !== -1 ? 2 : 1; }
            });
            if (norm(f.q) === norm(question)) { score += 10; }
            if (score > top) { top = score; best = f; }
        });
        return best;
    }
    function waLink(question) {
        return 'https://wa.me/' + data.wa + '?text=' + encodeURIComponent('Halo GreenHope, saya ingin bertanya: ' + question);
    }
    function createChat(root) {
        var log = qs('[data-fh-log]', root);
        var chips = qs('[data-fh-chips]', root);
        var form = qs('[data-fh-form]', root);
        var input = form ? qs('input', form) : null;
        if (!log || !form || !input) { return null; }

        function scroll() { log.scrollTop = log.scrollHeight; }
        function userMsg(text) {
            var d = el('div', 'fh-msg fh-msg--user');
            d.textContent = text;
            log.appendChild(d);
            scroll();
        }
        function botMsg(text, actions, title) {
            var d = el('div', 'fh-msg fh-msg--bot');
            if (title) { var s = el('strong'); s.textContent = title; d.appendChild(s); }
            var p = el('span');
            p.textContent = text;
            d.appendChild(p);
            if (actions && actions.length) {
                var wrap = el('div', 'fh-msg__actions');
                actions.forEach(function (a) {
                    var link = el('a');
                    link.href = a.href;
                    link.textContent = a.label;
                    if (a.wa) { link.className = 'is-wa'; link.target = '_blank'; link.rel = 'noopener'; }
                    wrap.appendChild(link);
                });
                d.appendChild(wrap);
            }
            log.appendChild(d);
            scroll();
        }
        function typing() {
            var d = el('div', 'fh-msg fh-msg--bot');
            var t = el('span', 'fh-typing');
            t.setAttribute('aria-label', 'GreenBot sedang mengetik');
            t.appendChild(el('i')); t.appendChild(el('i')); t.appendChild(el('i'));
            d.appendChild(t);
            log.appendChild(d);
            scroll();
            return d;
        }
        function ask(question) {
            var q = String(question || '').trim();
            if (!q) { return; }
            root.classList.add('is-compact');
            userMsg(q);
            var wait = typing();
            var faq = bestFaq(q);
            window.setTimeout(function () {
                if (wait.parentNode) { wait.parentNode.removeChild(wait); }
                if (faq) {
                    botMsg(faq.a, [{ href: faq.url, label: faq.label }, { href: waLink(q), label: 'Lanjut via WhatsApp', wa: true }]);
                } else {
                    botMsg(data.fallback || 'Maaf, saya belum menemukan jawabannya.', [{ href: waLink(q), label: 'Kirim ke WhatsApp', wa: true }]);
                }
            }, reduceMotion ? 0 : 650);
        }

        botMsg(data.intro, null, data.greeting);
        if (chips) {
            (data.suggestions || []).forEach(function (q) {
                var b = el('button', 'fh-qchip');
                b.type = 'button';
                b.textContent = q;
                b.addEventListener('click', function () { ask(q); });
                chips.appendChild(b);
            });
        }
        form.addEventListener('submit', function (e) {
            e.preventDefault();
            var v = input.value;
            input.value = '';
            ask(v);
        });
        return { ask: ask, focus: function () { input.focus(); } };
    }

    function initBot() {
        var panel = qs('[data-fh-bot]');
        var btn = qs('[data-fh-bot-toggle]');
        var api = null;

        // Chat di halaman GreenBot (di luar panel floating)
        qsa('[data-fh-chat]').forEach(function (root) {
            if (!root.closest('[data-fh-bot]')) { createChat(root); }
        });

        if (panel && btn) {
            var chat = createChat(qs('[data-fh-chat]', panel));
            var closeTimer = 0;
            var open = function () {
                window.clearTimeout(closeTimer);
                panel.hidden = false;
                window.requestAnimationFrame(function () { panel.classList.add('is-open'); });
                btn.setAttribute('aria-expanded', 'true');
                btn.classList.remove('is-tip');
                window.setTimeout(function () { if (chat) { chat.focus(); } }, 280);
            };
            var close = function () {
                panel.classList.remove('is-open');
                btn.setAttribute('aria-expanded', 'false');
                closeTimer = window.setTimeout(function () { panel.hidden = true; }, 260);
            };
            btn.addEventListener('click', function () { if (panel.hidden || !panel.classList.contains('is-open')) { open(); } else { close(); } });
            var closeBtn = qs('[data-fh-bot-close]', panel);
            if (closeBtn) { closeBtn.addEventListener('click', function () { close(); btn.focus(); }); }
            doc.addEventListener('keydown', function (e) {
                if (e.key === 'Escape' && panel.classList.contains('is-open')) { close(); btn.focus(); }
            });
            api = {
                ask: function (q) { open(); window.setTimeout(function () { if (chat) { chat.ask(q); } }, reduceMotion ? 0 : 300); }
            };

            // Gelembung sapaan muncul sekali per sesi
            try {
                if (!window.sessionStorage.getItem('fhBotTip')) {
                    window.setTimeout(function () {
                        if (panel.classList.contains('is-open')) { return; }
                        btn.classList.add('is-tip');
                        window.setTimeout(function () { btn.classList.remove('is-tip'); }, 6000);
                        try { window.sessionStorage.setItem('fhBotTip', '1'); } catch (e2) { /* abaikan */ }
                    }, 4500);
                }
            } catch (e1) { /* sessionStorage tidak tersedia */ }
        }

        // Pratinjau GreenBot di beranda membuka panel floating
        qsa('[data-fh-ask]').forEach(function (b) {
            b.addEventListener('click', function () {
                var q = b.getAttribute('data-fh-ask');
                if (api) { api.ask(q); } else { window.location.href = waLink(q); }
            });
        });
        qsa('[data-fh-ask-form]').forEach(function (f) {
            f.addEventListener('submit', function (e) {
                e.preventDefault();
                var i = qs('input', f);
                var q = i ? i.value.trim() : '';
                if (!q) { if (i) { i.focus(); } return; }
                if (i) { i.value = ''; }
                if (api) { api.ask(q); } else { window.location.href = waLink(q); }
            });
        });
    }

    /* ---- Dropdown kustom (menggantikan <select> bawaan) ----------------- */
    function initSelects() {
        var chevron = '<svg class="fh-ic fh-dd__chev" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false"><path d="m6 9 6 6 6-6"/></svg>';
        var openDd = null;

        doc.addEventListener('click', function (e) {
            if (openDd && !openDd.wrap.contains(e.target)) { openDd.close(); }
        });

        qsa('.fh-field select').forEach(function (sel, idx) {
            if (sel.closest('.fh-dd')) { return; }
            var uid = 'fh-dd-' + idx;
            var wrap = el('div', 'fh-dd');
            sel.parentNode.insertBefore(wrap, sel);
            wrap.appendChild(sel);
            sel.classList.add('fh-dd__native');
            sel.tabIndex = -1;
            sel.setAttribute('aria-hidden', 'true');

            var btn = el('button', 'fh-dd__btn');
            btn.type = 'button';
            btn.id = uid + '-btn';
            btn.setAttribute('aria-haspopup', 'listbox');
            btn.setAttribute('aria-expanded', 'false');
            btn.setAttribute('aria-controls', uid + '-list');
            var val = el('span', 'fh-dd__val');
            btn.appendChild(val);
            btn.insertAdjacentHTML('beforeend', chevron);

            var label = sel.id ? qs('label[for="' + sel.id + '"]') : null;
            if (label) {
                label.id = label.id || (uid + '-label');
                btn.setAttribute('aria-labelledby', label.id + ' ' + btn.id);
                label.addEventListener('click', function (e) { e.preventDefault(); btn.focus(); });
            }

            var listEl = el('ul', 'fh-dd__list');
            listEl.id = uid + '-list';
            listEl.setAttribute('role', 'listbox');
            listEl.tabIndex = -1;
            listEl.hidden = true;
            if (label) { listEl.setAttribute('aria-labelledby', label.id); }
            var opts = Array.prototype.slice.call(sel.options).map(function (o, i) {
                var li = el('li', 'fh-dd__opt');
                li.id = uid + '-o' + i;
                li.setAttribute('role', 'option');
                li.setAttribute('aria-selected', 'false');
                li.textContent = o.textContent;
                listEl.appendChild(li);
                return li;
            });
            wrap.appendChild(btn);
            wrap.appendChild(listEl);

            var active = Math.max(0, sel.selectedIndex);
            var api = { wrap: wrap, close: function () { close(); } };

            function sync() {
                var o = sel.options[sel.selectedIndex];
                val.textContent = o ? o.textContent : '';
                opts.forEach(function (li, i) { li.setAttribute('aria-selected', i === sel.selectedIndex ? 'true' : 'false'); });
            }
            function setActive(i, reveal) {
                active = Math.max(0, Math.min(opts.length - 1, i));
                opts.forEach(function (li, k) { li.classList.toggle('is-active', k === active); });
                btn.setAttribute('aria-activedescendant', opts[active].id);
                if (reveal) {
                    var li = opts[active];
                    var top = li.offsetTop;
                    var bottom = top + li.offsetHeight;
                    if (top < listEl.scrollTop) { listEl.scrollTop = top - 4; }
                    else if (bottom > listEl.scrollTop + listEl.clientHeight) { listEl.scrollTop = bottom - listEl.clientHeight + 4; }
                }
            }
            function open() {
                if (openDd && openDd !== api) { openDd.close(); }
                listEl.hidden = false;
                wrap.classList.add('is-open');
                wrap.classList.remove('is-up');
                btn.setAttribute('aria-expanded', 'true');
                var r = wrap.getBoundingClientRect();
                var h = listEl.offsetHeight;
                if (r.bottom + h + 12 > window.innerHeight && r.top > h + 12) { wrap.classList.add('is-up'); }
                setActive(sel.selectedIndex, true);
                openDd = api;
            }
            function close() {
                listEl.hidden = true;
                wrap.classList.remove('is-open');
                wrap.classList.remove('is-up');
                btn.setAttribute('aria-expanded', 'false');
                btn.removeAttribute('aria-activedescendant');
                if (openDd === api) { openDd = null; }
            }
            function choose(i) {
                sel.selectedIndex = i;
                sel.dispatchEvent(new Event('change', { bubbles: true }));
                sync();
                close();
                btn.focus();
            }

            btn.addEventListener('click', function () { if (listEl.hidden) { open(); } else { close(); } });
            btn.addEventListener('keydown', function (e) {
                var isOpen = !listEl.hidden;
                switch (e.key) {
                    case 'ArrowDown': e.preventDefault(); if (!isOpen) { open(); } else { setActive(active + 1, true); } break;
                    case 'ArrowUp': e.preventDefault(); if (!isOpen) { open(); } else { setActive(active - 1, true); } break;
                    case 'Home': if (isOpen) { e.preventDefault(); setActive(0, true); } break;
                    case 'End': if (isOpen) { e.preventDefault(); setActive(opts.length - 1, true); } break;
                    case 'Enter':
                    case ' ': e.preventDefault(); if (!isOpen) { open(); } else { choose(active); } break;
                    case 'Escape': if (isOpen) { e.preventDefault(); e.stopPropagation(); close(); } break;
                    case 'Tab': if (isOpen) { close(); } break;
                    default:
                        if (e.key.length === 1 && !e.ctrlKey && !e.metaKey && !e.altKey) {
                            var ch = e.key.toLowerCase();
                            for (var n = 1; n <= opts.length; n += 1) {
                                var k = (active + n) % opts.length;
                                if (opts[k].textContent.trim().toLowerCase().charAt(0) === ch) {
                                    if (isOpen) { setActive(k, true); }
                                    else { sel.selectedIndex = k; sel.dispatchEvent(new Event('change', { bubbles: true })); sync(); setActive(k, false); }
                                    break;
                                }
                            }
                        }
                }
            });
            listEl.addEventListener('mousedown', function (e) { e.preventDefault(); });
            listEl.addEventListener('mouseover', function (e) {
                var li = e.target.closest ? e.target.closest('.fh-dd__opt') : null;
                if (li) { setActive(opts.indexOf(li), false); }
            });
            listEl.addEventListener('click', function (e) {
                var li = e.target.closest ? e.target.closest('.fh-dd__opt') : null;
                if (li) { choose(opts.indexOf(li)); }
            });
            sel.addEventListener('change', sync);
            sync();
        });
    }

    /* ---- Sub navigasi program: tandai bagian yang sedang dibaca --------- */
    function initSpy() {
        qsa('[data-fh-spy]').forEach(function (nav) {
            var links = qsa('[data-fh-spy-link]', nav);
            var targets = [];
            links.forEach(function (a) {
                var t = doc.getElementById(a.getAttribute('data-fh-spy-link'));
                if (t) { targets.push(t); }
            });
            if (!targets.length || !('IntersectionObserver' in window)) { return; }
            function setActive(id) {
                links.forEach(function (a) {
                    var on = a.getAttribute('data-fh-spy-link') === id;
                    a.classList.toggle('is-active', on);
                    if (on && nav.scrollWidth > nav.clientWidth) {
                        nav.scrollLeft = a.offsetLeft - (nav.clientWidth - a.offsetWidth) / 2;
                    }
                });
            }
            var spy = new IntersectionObserver(function (entries) {
                entries.forEach(function (entry) { if (entry.isIntersecting) { setActive(entry.target.id); } });
            }, { rootMargin: '-35% 0px -55% 0px', threshold: 0 });
            targets.forEach(function (t) { spy.observe(t); });
        });
    }

    /* ---- Init ----------------------------------------------------------- */
    function init() {
        initHeader();
        initReveal();
        initTabs();
        initFilters();
        initMisc();
        initSelects();
        initWaForms();
        initSpy();
        initBot();
    }
    if (doc.readyState === 'loading') { doc.addEventListener('DOMContentLoaded', init); } else { init(); }
})();
