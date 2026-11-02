/* ==========================================================================
   Energi Cargo - Logistics Company | Bold - Orange Energy
   WEBIA by D-KREASI
   Modul: toast & link "segera hadir", dropdown, menu mobile, pencarian,
          tab, hitung angka, tracking, form penawaran, AI chatbot (FAQ).
   ========================================================================== */
(function () {
    'use strict';

    var CONFIG = {};
    try {
        var raw = document.getElementById('lg-config');
        CONFIG = raw ? JSON.parse(raw.textContent) : {};
    } catch (e) { CONFIG = {}; }

    var reduceMotion = window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches;

    function qs(sel, root) { return (root || document).querySelector(sel); }
    function qsa(sel, root) { return Array.prototype.slice.call((root || document).querySelectorAll(sel)); }
    function el(tag, cls, text) {
        var node = document.createElement(tag);
        if (cls) { node.className = cls; }
        if (text !== undefined && text !== null) { node.textContent = text; }
        return node;
    }
    function norm(s) {
        return String(s || '').toLowerCase().normalize('NFD').replace(/[\u0300-\u036f]/g, '')
            .replace(/[^a-z0-9\s-]/g, ' ').replace(/\s+/g, ' ').trim();
    }
    function store(action, key, value) {
        try {
            if (action === 'get') { return window.sessionStorage.getItem(key); }
            window.sessionStorage.setItem(key, value);
        } catch (e) { /* storage bisa diblokir */ }
        return null;
    }

    /* ---------- Toast & link yang belum tersedia ------------------------ */
    var toastEl = qs('[data-toast]');
    var toastTimer = null;
    function toast(message) {
        if (!toastEl) { return; }
        toastEl.textContent = message;
        toastEl.classList.add('is-show');
        clearTimeout(toastTimer);
        toastTimer = setTimeout(function () { toastEl.classList.remove('is-show'); }, 2600);
    }
    document.addEventListener('click', function (e) {
        var soon = e.target.closest('[data-soon]');
        if (soon) {
            e.preventDefault();
            toast(soon.getAttribute('data-soon') || 'Halaman ini belum tersedia pada template.');
        }
    });

    /* ---------- Dropdown (bahasa) --------------------------------------- */
    qsa('[data-dropdown]').forEach(function (dd) {
        var btn = qs('[data-dropdown-btn]', dd);
        var menuEl = qs('[data-dropdown-menu]', dd);
        if (!btn || !menuEl) { return; }
        var items = qsa('.lg-menu__item', menuEl);

        function setOpen(open, focusItem) {
            menuEl.hidden = !open;
            dd.classList.toggle('is-open', open);
            btn.setAttribute('aria-expanded', open ? 'true' : 'false');
            if (open && focusItem && items.length) { (qs('.lg-menu__item.is-active', menuEl) || items[0]).focus(); }
        }
        btn.addEventListener('click', function (e) { e.stopPropagation(); setOpen(menuEl.hidden, false); });
        btn.addEventListener('keydown', function (e) {
            if (e.key === 'ArrowDown' || e.key === 'ArrowUp') { e.preventDefault(); setOpen(true, true); }
        });
        menuEl.addEventListener('keydown', function (e) {
            var i = items.indexOf(document.activeElement);
            if (e.key === 'ArrowDown') { e.preventDefault(); items[(i + 1) % items.length].focus(); }
            else if (e.key === 'ArrowUp') { e.preventDefault(); items[(i - 1 + items.length) % items.length].focus(); }
            else if (e.key === 'Home') { e.preventDefault(); items[0].focus(); }
            else if (e.key === 'End') { e.preventDefault(); items[items.length - 1].focus(); }
            else if (e.key === 'Tab') { setOpen(false); }
        });
        menuEl.addEventListener('click', function (e) { if (e.target.closest('.lg-menu__item')) { setOpen(false); btn.focus(); } });
        document.addEventListener('click', function (e) { if (!dd.contains(e.target)) { setOpen(false); } });
        document.addEventListener('keydown', function (e) {
            if (e.key === 'Escape' && !menuEl.hidden) { setOpen(false); btn.focus(); }
        });
    });

    /* ---------- Menu mobile --------------------------------------------- */
    var menu = qs('[data-menu]');
    var menuBtn = qs('[data-menu-btn]');
    function setMenu(open) {
        if (!menu || !menuBtn) { return; }
        menu.classList.toggle('is-open', open);
        menuBtn.setAttribute('aria-expanded', open ? 'true' : 'false');
        menuBtn.setAttribute('aria-label', open ? 'Tutup menu' : 'Buka menu');
    }
    if (menu && menuBtn) {
        menuBtn.addEventListener('click', function () { setMenu(!menu.classList.contains('is-open')); });
        menu.addEventListener('click', function (e) { if (e.target.closest('a')) { setMenu(false); } });
        window.addEventListener('resize', function () { if (window.innerWidth >= 1280) { setMenu(false); } });
    }

    /* ---------- Pencarian halaman (popover) ----------------------------- */
    var searchBtn = qs('[data-search-btn]');
    var searchBox = qs('[data-search]');
    if (searchBtn && searchBox) {
        var sInput = qs('[data-search-input]', searchBox);
        var sItems = qsa('[data-search-list] li', searchBox);
        var sEmpty = qs('[data-search-empty]', searchBox);

        var visibleLinks = function () {
            return sItems.filter(function (li) { return !li.hidden; }).map(function (li) { return qs('a', li); });
        };
        var filter = function (term) {
            var t = norm(term), shown = 0;
            sItems.forEach(function (li) {
                var match = !t || norm(li.textContent).indexOf(t) > -1;
                li.hidden = !match;
                if (match) { shown++; }
            });
            if (sEmpty) { sEmpty.hidden = shown > 0; }
        };
        var setSearch = function (open) {
            searchBox.hidden = !open;
            searchBtn.setAttribute('aria-expanded', open ? 'true' : 'false');
            if (open) { setMenu(false); sInput.value = ''; filter(''); sInput.focus(); }
        };
        searchBtn.addEventListener('click', function (e) { e.stopPropagation(); setSearch(searchBox.hidden); });
        sInput.addEventListener('input', function () { filter(sInput.value); });
        searchBox.addEventListener('keydown', function (e) {
            var links = visibleLinks();
            var i = links.indexOf(document.activeElement);
            if (e.key === 'ArrowDown') {
                e.preventDefault();
                if (links.length) { links[i < 0 ? 0 : Math.min(i + 1, links.length - 1)].focus(); }
            } else if (e.key === 'ArrowUp') {
                e.preventDefault();
                if (i > 0) { links[i - 1].focus(); } else { sInput.focus(); }
            } else if (e.key === 'Enter' && document.activeElement === sInput && links.length) {
                e.preventDefault();
                window.location.href = links[0].href;
            }
        });
        document.addEventListener('click', function (e) {
            if (!searchBox.hidden && !searchBox.contains(e.target) && !searchBtn.contains(e.target)) { setSearch(false); }
        });
        document.addEventListener('keydown', function (e) {
            if (e.key !== 'Escape') { return; }
            if (!searchBox.hidden) { setSearch(false); searchBtn.focus(); }
            setMenu(false);
        });
    }

    /* ---------- Tab (opsi pengiriman) ----------------------------------- */
    qsa('[data-tabs]').forEach(function (wrap) {
        var tabs = qsa('[data-tab]', wrap);
        var panels = qsa('[data-panel]', wrap);
        var link = qs('[data-tab-link]', wrap);
        var sync = wrap.getAttribute('data-sync-url');

        function activate(key, pushUrl) {
            var found = false;
            tabs.forEach(function (t) {
                var on = t.getAttribute('data-tab') === key;
                if (on) { found = true; }
                t.classList.toggle('is-active', on);
                t.setAttribute('aria-selected', on ? 'true' : 'false');
            });
            if (!found) { return; }
            panels.forEach(function (p) { p.hidden = p.getAttribute('data-panel') !== key; });
            if (link) { link.href = link.getAttribute('data-base') + '?tab=' + encodeURIComponent(key) + '#opsi'; }
            if (sync && pushUrl && window.history && history.replaceState) {
                var url = new URL(window.location.href);
                url.searchParams.set(sync, key);
                history.replaceState(null, '', url.toString());
            }
        }
        tabs.forEach(function (t) {
            t.addEventListener('click', function () { activate(t.getAttribute('data-tab'), true); });
        });
        if (sync) {
            var initial = new URL(window.location.href).searchParams.get(sync);
            if (initial) { activate(initial, false); }
        }
    });

    /* ---------- Hitung angka -------------------------------------------- */
    var counters = qsa('[data-count]');
    function runCount(node) {
        var target = parseInt(node.getAttribute('data-count'), 10);
        var suffix = node.getAttribute('data-suffix') || '';
        if (isNaN(target)) { return; }
        var start = null, dur = 1100;
        function tick(ts) {
            if (start === null) { start = ts; }
            var p = Math.min((ts - start) / dur, 1);
            var eased = 1 - Math.pow(1 - p, 3);
            node.textContent = Math.round(target * eased) + (p === 1 ? suffix : '');
            if (p < 1) { requestAnimationFrame(tick); }
        }
        requestAnimationFrame(tick);
    }
    if (counters.length && 'IntersectionObserver' in window && !reduceMotion) {
        var io = new IntersectionObserver(function (entries) {
            entries.forEach(function (en) {
                if (en.isIntersecting) { runCount(en.target); io.unobserve(en.target); }
            });
        }, { threshold: 0.4 });
        counters.forEach(function (c) { io.observe(c); });
    }

    /* ---------- Dropdown formulir (select kustom) ----------------------- */
    var selectUid = 0;
    function enhanceSelect(sel) {
        if (sel.multiple || sel.closest('.lg-select')) { return; }
        selectUid++;
        var wrap = el('div', 'lg-select');
        sel.parentNode.insertBefore(wrap, sel);
        wrap.appendChild(sel);
        sel.classList.add('lg-select__native');
        sel.tabIndex = -1;
        sel.setAttribute('aria-hidden', 'true');

        var btn = el('button', 'lg-select__btn');
        btn.type = 'button';
        btn.setAttribute('aria-haspopup', 'listbox');
        btn.setAttribute('aria-expanded', 'false');
        var val = el('span', 'lg-select__val');
        btn.appendChild(val);
        btn.insertAdjacentHTML('beforeend', '<svg class="lg-ic" aria-hidden="true"><use href="#i-chevron-down"></use></svg>');

        var list = el('ul', 'lg-select__list');
        list.id = 'lg-select-' + selectUid;
        list.setAttribute('role', 'listbox');
        list.tabIndex = -1;
        list.hidden = true;
        btn.setAttribute('aria-controls', list.id);

        var lab = sel.id ? document.querySelector('label[for="' + sel.id + '"]') : null;
        if (lab) {
            if (!lab.id) { lab.id = 'lg-select-label-' + selectUid; }
            btn.setAttribute('aria-labelledby', lab.id);
            list.setAttribute('aria-labelledby', lab.id);
        }

        var options = [], placeholder = '';
        qsa('option', sel).forEach(function (o) {
            if (o.value === '') { placeholder = o.textContent; return; }
            var li = el('li', '', o.textContent);
            li.setAttribute('role', 'option');
            li.setAttribute('data-value', o.value);
            li.id = list.id + '-' + options.length;
            list.appendChild(li);
            options.push(li);
        });
        wrap.appendChild(btn);
        wrap.appendChild(list);

        var active = -1;
        function paint() {
            var cur = sel.value, found = null;
            options.forEach(function (li) {
                var on = li.getAttribute('data-value') === cur;
                li.setAttribute('aria-selected', on ? 'true' : 'false');
                if (on) { found = li; }
            });
            val.textContent = found ? found.textContent : (placeholder || 'Pilih');
            val.classList.toggle('is-placeholder', !found);
        }
        function setActive(i, scroll) {
            if (!options.length) { return; }
            active = Math.max(0, Math.min(i, options.length - 1));
            options.forEach(function (li, k) { li.classList.toggle('is-active', k === active); });
            btn.setAttribute('aria-activedescendant', options[active].id);
            if (scroll) { options[active].scrollIntoView({ block: 'nearest' }); }
        }
        function open() {
            list.hidden = false;
            wrap.classList.add('is-open');
            btn.setAttribute('aria-expanded', 'true');
            var rect = btn.getBoundingClientRect();
            wrap.classList.toggle('is-up', window.innerHeight - rect.bottom < 280 && rect.top > 280);
            var idx = options.map(function (li) { return li.getAttribute('data-value'); }).indexOf(sel.value);
            setActive(idx > -1 ? idx : 0, true);
        }
        function close() {
            list.hidden = true;
            wrap.classList.remove('is-open', 'is-up');
            btn.setAttribute('aria-expanded', 'false');
            btn.removeAttribute('aria-activedescendant');
        }
        function choose(i) {
            if (!options[i]) { return; }
            sel.value = options[i].getAttribute('data-value');
            sel.classList.remove('is-invalid');
            sel.dispatchEvent(new Event('change', { bubbles: true }));
            paint();
            close();
            btn.focus();
        }

        btn.addEventListener('click', function () { if (list.hidden) { open(); } else { close(); } });
        btn.addEventListener('keydown', function (e) {
            var isOpen = !list.hidden;
            if (e.key === 'ArrowDown' || e.key === 'ArrowUp') {
                e.preventDefault();
                if (!isOpen) { open(); } else { setActive(active + (e.key === 'ArrowDown' ? 1 : -1), true); }
            } else if (e.key === 'Home' && isOpen) { e.preventDefault(); setActive(0, true); }
            else if (e.key === 'End' && isOpen) { e.preventDefault(); setActive(options.length - 1, true); }
            else if ((e.key === 'Enter' || e.key === ' ') && isOpen) { e.preventDefault(); choose(active); }
            else if (e.key === 'Escape' && isOpen) { e.preventDefault(); e.stopPropagation(); close(); }
            else if (e.key === 'Tab' && isOpen) { close(); }
            else if (e.key.length === 1 && /\S/.test(e.key)) {
                var ch = e.key.toLowerCase();
                for (var n = 1; n <= options.length; n++) {
                    var k = (Math.max(active, 0) + n) % options.length;
                    if (options[k].textContent.toLowerCase().indexOf(ch) === 0) { if (!isOpen) { open(); } setActive(k, true); break; }
                }
            }
        });
        list.addEventListener('mousedown', function (e) { e.preventDefault(); });
        list.addEventListener('click', function (e) {
            var li = e.target.closest('li');
            if (li) { choose(options.indexOf(li)); }
        });
        list.addEventListener('mousemove', function (e) {
            var li = e.target.closest('li');
            if (li) { setActive(options.indexOf(li), false); }
        });
        document.addEventListener('click', function (e) { if (!wrap.contains(e.target)) { close(); } });
        sel.addEventListener('focus', function () { btn.focus(); });
        sel.addEventListener('change', paint);
        paint();
    }
    qsa('.lg-field select').forEach(enhanceSelect);

    /* ---------- Tracking ------------------------------------------------- */
    (function initTracking() {
        var form = qs('[data-track-form]');
        if (!form) { return; }
        var input = qs('[data-track-input]', form);
        var out = qs('[data-track-result]');
        var cfg = CONFIG.tracking || { stages: [], demo: {} };

        function showError(message) {
            out.hidden = false;
            out.innerHTML = '';
            out.appendChild(el('div', 'lg-res lg-res--error', message));
        }
        function render(d) {
            out.hidden = false;
            out.innerHTML = '';
            var card = el('div', 'lg-res');

            var head = el('div', 'lg-res__head');
            head.appendChild(el('h2', '', 'Resi ' + d.resi));
            head.appendChild(el('span', 'lg-res__badge', d.status || ''));
            card.appendChild(head);

            var meta = el('dl', 'lg-res__meta');
            [['Layanan', d.service], ['Asal', d.origin], ['Tujuan', d.destination]].forEach(function (row) {
                if (!row[1]) { return; }
                var box = el('div');
                box.appendChild(el('dt', '', row[0]));
                box.appendChild(el('dd', '', row[1]));
                meta.appendChild(box);
            });
            card.appendChild(meta);

            var bar = el('ol', 'lg-res__bar');
            (cfg.stages || []).forEach(function (name, i) {
                var li = el('li', i <= Number(d.stage) ? 'is-done' : '');
                li.appendChild(el('i'));
                li.appendChild(el('span', '', name));
                bar.appendChild(li);
            });
            card.appendChild(bar);

            var list = el('ul', 'lg-res__events');
            (d.events || []).forEach(function (ev) {
                var li = el('li');
                li.appendChild(el('strong', '', ev.title));
                li.appendChild(el('span', '', [ev.time, ev.location].filter(Boolean).join(' - ')));
                list.appendChild(li);
            });
            card.appendChild(list);
            out.appendChild(card);
        }

        function lookup(value) {
            var resi = String(value || '').trim().toUpperCase().replace(/\s+/g, '');
            if (!resi) { showError('Masukkan nomor resi terlebih dahulu.'); input.focus(); return; }
            if (window.history && history.replaceState) {
                var url = new URL(window.location.href);
                url.searchParams.set('resi', resi);
                history.replaceState(null, '', url.toString());
            }
            if (cfg.endpoint) {
                showError('Mencari data pengiriman...');
                var sep = cfg.endpoint.indexOf('?') > -1 ? '&' : '?';
                fetch(cfg.endpoint + sep + 'resi=' + encodeURIComponent(resi), { headers: { 'Accept': 'application/json' } })
                    .then(function (r) { if (!r.ok) { throw new Error('not-found'); } return r.json(); })
                    .then(function (data) { data.resi = data.resi || resi; render(data); })
                    .catch(function () { showError('Nomor resi ' + resi + ' tidak ditemukan atau layanan tracking sedang tidak tersedia.'); });
                return;
            }
            var demo = cfg.demo && cfg.demo[resi];
            if (demo) {
                var copy = {}; Object.keys(demo).forEach(function (k) { copy[k] = demo[k]; });
                copy.resi = resi;
                render(copy);
            } else {
                showError('Nomor resi ' + resi + ' tidak ditemukan. Periksa kembali nomor Anda atau coba nomor demo di atas.');
            }
        }

        form.addEventListener('submit', function (e) { e.preventDefault(); lookup(input.value); });
        qsa('[data-track-demo]', form).forEach(function (b) {
            b.addEventListener('click', function () { input.value = b.getAttribute('data-track-demo'); lookup(input.value); });
        });
        var initial = new URL(window.location.href).searchParams.get('resi');
        if (initial) { input.value = initial; lookup(initial); }
    })();

    /* ---------- Form penawaran (dikirim ke WhatsApp) -------------------- */
    (function initQuote() {
        var form = qs('[data-quote-form]');
        if (!form) { return; }
        var status = qs('[data-quote-status]', form);
        var wa = CONFIG.whatsapp || {};

        function setStatus(msg, type) {
            status.textContent = msg;
            status.className = 'lg-form__status' + (type ? ' is-' + type : '');
        }
        function val(name) {
            var f = form.elements[name];
            return f ? String(f.value || '').trim() : '';
        }
        form.addEventListener('submit', function (e) {
            e.preventDefault();
            var firstBad = null;
            qsa('input, select, textarea', form).forEach(function (f) { f.classList.remove('is-invalid'); });
            qsa('[required]', form).forEach(function (f) {
                if (!String(f.value || '').trim()) { f.classList.add('is-invalid'); firstBad = firstBad || f; }
            });
            var email = val('email');
            if (email && !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
                form.elements.email.classList.add('is-invalid'); firstBad = firstBad || form.elements.email;
            }
            var phone = val('telepon').replace(/[^0-9]/g, '');
            if (phone && phone.length < 8) {
                form.elements.telepon.classList.add('is-invalid'); firstBad = firstBad || form.elements.telepon;
            }
            if (firstBad) {
                setStatus('Periksa kembali kolom yang ditandai merah.', 'error');
                firstBad.focus();
                return;
            }
            var lines = [
                'Halo ' + (CONFIG.quote ? CONFIG.quote.label : 'Energi Cargo') + ', saya ingin meminta penawaran harga.',
                '',
                'Nama: ' + val('nama'),
                'Perusahaan: ' + (val('perusahaan') || '-'),
                'Telepon: ' + val('telepon'),
                'Email: ' + (email || '-'),
                'Layanan: ' + val('layanan'),
                'Asal: ' + val('asal'),
                'Tujuan: ' + val('tujuan'),
                'Jenis barang: ' + (val('barang') || '-'),
                'Estimasi berat/volume: ' + (val('berat') || '-'),
                'Catatan: ' + (val('catatan') || '-')
            ];
            var url = 'https://wa.me/' + wa.number + '?text=' + encodeURIComponent(lines.join('\n'));
            var win = window.open(url, '_blank');
            if (win) { try { win.opener = null; } catch (err) { /* abaikan */ } }
            else { window.location.href = url; }
            setStatus('Permintaan disiapkan. Lanjutkan pengiriman pesan di WhatsApp.', 'ok');
        });
    })();

    /* ---------- AI Chatbot (FAQ pengiriman & logistik) ------------------ */
    var AI = CONFIG.ai || { faqs: [], questions: [] };

    function findAnswer(text) {
        var t = ' ' + norm(text) + ' ';
        var best = null, bestScore = 0;
        (AI.faqs || []).forEach(function (f) {
            var score = 0;
            (f.keywords || []).forEach(function (k) {
                var nk = norm(k);
                if (nk && t.indexOf(nk) > -1) { score += nk.length > 5 ? 2 : 1; }
            });
            if (norm(f.q) === norm(text)) { score += 10; }
            if (score > bestScore) { bestScore = score; best = f; }
        });
        return bestScore > 0 ? best : null;
    }

    function createChat(root) {
        var msgs = qs('[data-chat-messages]', root);
        var chips = qs('[data-chat-chips]', root);
        var form = qs('[data-chat-form]', root);
        var input = qs('[data-chat-input]', root);
        var started = false, busy = false, asked = {};

        function scrollDown() { msgs.scrollTop = msgs.scrollHeight; }
        function addMsg(role, text, cta) {
            var m = el('div', 'lg-msg lg-msg--' + role, text);
            if (cta && cta.url) {
                var a = el('a', 'lg-msg__cta', cta.label);
                a.href = cta.url;
                if (/^https?:/.test(cta.url) && cta.url.indexOf(window.location.origin) !== 0) { a.target = '_blank'; a.rel = 'noopener'; }
                m.appendChild(a);
            }
            msgs.appendChild(m);
            scrollDown();
        }
        function renderChips() {
            chips.innerHTML = '';
            var pool = (AI.questions || []).concat((AI.faqs || []).map(function (f) { return f.q; }));
            var seen = {}, list = [];
            pool.forEach(function (q) { if (!seen[q] && !asked[q]) { seen[q] = true; list.push(q); } });
            list.slice(0, 4).forEach(function (q) {
                var b = el('button', 'lg-qchip', q);
                b.type = 'button';
                b.addEventListener('click', function () { ask(q); });
                chips.appendChild(b);
            });
        }
        function ask(text) {
            text = String(text || '').trim();
            if (!text || busy) { return; }
            start();
            busy = true;
            asked[text] = true;
            addMsg('user', text);
            var typing = el('div', 'lg-typing');
            typing.appendChild(el('i')); typing.appendChild(el('i')); typing.appendChild(el('i'));
            msgs.appendChild(typing);
            scrollDown();
            setTimeout(function () {
                typing.remove();
                var hit = findAnswer(text);
                if (hit) {
                    addMsg('bot', hit.a, hit.url ? { url: hit.url, label: hit.cta || 'Selengkapnya' } : null);
                } else {
                    var wa = CONFIG.whatsapp || {};
                    addMsg('bot', AI.fallback, { url: 'https://wa.me/' + wa.number + '?text=' + encodeURIComponent(text), label: 'Chat via WhatsApp' });
                }
                renderChips();
                busy = false;
            }, reduceMotion ? 0 : 750);
        }
        function start() {
            if (started) { return; }
            started = true;
            addMsg('bot', AI.greeting);
            renderChips();
        }
        form.addEventListener('submit', function (e) {
            e.preventDefault();
            var v = input.value;
            input.value = '';
            ask(v);
        });
        return { start: start, ask: ask, focus: function () { if (input) { input.focus(); } } };
    }

    // Chat tertanam (halaman AI Assistant)
    qsa('[data-chat]').forEach(function (root) {
        if (root.hasAttribute('data-bot-panel')) { return; }
        var chat = createChat(root);
        root._chat = chat;
        chat.start();
    });

    // Tombol chat melayang
    (function initBot() {
        var bot = qs('[data-bot]');
        if (!bot) { return; }
        var panel = qs('[data-bot-panel]', bot);
        var fab = qs('[data-bot-toggle]', bot);
        var tip = qs('[data-bot-tip]', bot);
        var closeBtn = qs('[data-bot-close]', bot);
        var chat = createChat(panel);
        var tipTimer = null;

        function hideTip() { if (tip) { tip.hidden = true; } clearTimeout(tipTimer); }
        function open() {
            panel.hidden = false;
            bot.classList.add('is-open');
            fab.setAttribute('aria-expanded', 'true');
            hideTip();
            store('set', 'lg-tip', '1');
            chat.start();
            setTimeout(chat.focus, 60);
        }
        function close() {
            panel.hidden = true;
            bot.classList.remove('is-open');
            fab.setAttribute('aria-expanded', 'false');
        }
        fab.addEventListener('click', function () { if (panel.hidden) { open(); } else { close(); } });
        if (closeBtn) { closeBtn.addEventListener('click', close); }
        document.addEventListener('keydown', function (e) { if (e.key === 'Escape' && !panel.hidden) { close(); fab.focus(); } });

        qsa('[data-bot-open]').forEach(function (b) { b.addEventListener('click', open); });
        qsa('[data-bot-ask]').forEach(function (b) {
            b.addEventListener('click', function () {
                open();
                chat.ask(b.getAttribute('data-bot-ask'));
            });
        });

        // Gelembung sapaan: muncul sekali per sesi
        if (tip && !store('get', 'lg-tip')) {
            tipTimer = setTimeout(function () {
                if (!panel.hidden) { return; }
                tip.hidden = false;
                tipTimer = setTimeout(hideTip, 7000);
            }, 4500);
        }
    })();
})();
