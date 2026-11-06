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

    /* ---- Header: menu, pencarian, bayangan saat scroll ------------------ */
    function initHeader() {
        var header = qs('[data-fh-header]');
        if (!header) { return; }
        var menuBtn = qs('[data-fh-menu-toggle]', header);
        var searchBtn = qs('[data-fh-search-toggle]', header);
        var search = qs('#fh-search', header);
        var input = qs('[data-fh-search-input]', header);
        var list = qs('[data-fh-search-list]', header);
        var empty = qs('[data-fh-search-empty]', header);

        function setMenu(open) {
            header.classList.toggle('is-open', open);
            if (menuBtn) {
                menuBtn.setAttribute('aria-expanded', open ? 'true' : 'false');
                menuBtn.setAttribute('aria-label', open ? 'Tutup menu' : 'Buka menu');
            }
        }
        function setSearch(open) {
            if (!search || !searchBtn) { return; }
            search.hidden = !open;
            searchBtn.setAttribute('aria-expanded', open ? 'true' : 'false');
            if (open) {
                setMenu(false);
                if (input) { input.focus(); }
            }
        }

        if (menuBtn) { menuBtn.addEventListener('click', function () { setMenu(!header.classList.contains('is-open')); }); }
        if (searchBtn) { searchBtn.addEventListener('click', function () { setSearch(search ? search.hidden : false); }); }
        qsa('.fh-menu a', header).forEach(function (a) { a.addEventListener('click', function () { setMenu(false); }); });
        doc.addEventListener('keydown', function (e) {
            if (e.key === 'Escape') { setMenu(false); setSearch(false); }
        });
        doc.addEventListener('click', function (e) {
            if (!header.contains(e.target)) { setMenu(false); setSearch(false); }
        });

        if (input && list) {
            input.addEventListener('input', function () {
                var q = input.value.toLowerCase().trim();
                var shown = 0;
                qsa('li', list).forEach(function (li) {
                    var match = !q || (li.getAttribute('data-text') || '').indexOf(q) !== -1;
                    li.hidden = !match;
                    if (match) { shown += 1; }
                });
                if (empty) { empty.hidden = shown > 0; }
            });
            input.addEventListener('keydown', function (e) {
                if (e.key !== 'Enter') { return; }
                var first = qsa('li', list).filter(function (li) { return !li.hidden; })[0];
                if (first) { var a = qs('a', first); if (a) { window.location.href = a.href; } }
            });
        }

        function onScroll() { header.classList.toggle('is-stuck', window.scrollY > 8); }
        onScroll();
        window.addEventListener('scroll', onScroll, { passive: true });
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

    /* ---- Filter berita -------------------------------------------------- */
    function initFilters() {
        qsa('[data-fh-filters]').forEach(function (group) {
            var buttons = qsa('[data-fh-filter]', group);
            var items = qsa('[data-fh-type]');
            var empty = qs('[data-fh-filter-empty]');
            buttons.forEach(function (btn) {
                btn.addEventListener('click', function () {
                    var f = btn.getAttribute('data-fh-filter');
                    var shown = 0;
                    buttons.forEach(function (b) {
                        var on = b === btn;
                        b.classList.toggle('is-active', on);
                        b.setAttribute('aria-pressed', on ? 'true' : 'false');
                    });
                    items.forEach(function (item) {
                        var show = f === 'all' || item.getAttribute('data-fh-type') === f;
                        item.hidden = !show;
                        if (show) { shown += 1; }
                    });
                    if (empty) { empty.hidden = shown > 0; }
                });
            });
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

    /* ---- Init ----------------------------------------------------------- */
    function init() {
        initHeader();
        initReveal();
        initTabs();
        initFilters();
        initMisc();
        initWaForms();
        initBot();
    }
    if (doc.readyState === 'loading') { doc.addEventListener('DOMContentLoaded', init); } else { init(); }
})();
