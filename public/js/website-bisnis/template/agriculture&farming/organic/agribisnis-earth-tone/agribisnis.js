/* ==========================================================================
   AgroHarvest - Agribisnis (Organic / Earth Tone)
   Vanilla JS, tanpa dependensi. Setiap modul aman dijalankan walau elemennya
   tidak ada di halaman (mis. modul filter hanya aktif di halaman katalog).
   ========================================================================== */
(function () {
    'use strict';

    var doc = document;
    var root = doc.documentElement;
    root.classList.add('js');

    var $ = function (sel, ctx) { return (ctx || doc).querySelector(sel); };
    var $$ = function (sel, ctx) { return Array.prototype.slice.call((ctx || doc).querySelectorAll(sel)); };

    var cfg = {};
    try { cfg = JSON.parse(doc.getElementById('agConfig').textContent) || {}; } catch (e) { cfg = {}; }
    var urls = cfg.urls || {};
    var params = new URLSearchParams(window.location.search);

    function safeStorage(action, key, value) {
        try {
            if (action === 'get') { return window.sessionStorage.getItem(key); }
            window.sessionStorage.setItem(key, value);
        } catch (e) { /* storage tidak tersedia */ }
        return null;
    }

    /* ---------- Navbar mobile ------------------------------------------------ */
    (function navbar() {
        var toggle = $('#navToggle');
        var menu = $('#navMenu');
        if (!toggle || !menu) { return; }

        function setOpen(open) {
            menu.classList.toggle('is-open', open);
            toggle.setAttribute('aria-expanded', open ? 'true' : 'false');
            toggle.setAttribute('aria-label', open ? 'Tutup menu' : 'Buka menu');
        }
        toggle.addEventListener('click', function () { setOpen(!menu.classList.contains('is-open')); });
        $$('a', menu).forEach(function (a) { a.addEventListener('click', function () { setOpen(false); }); });
        doc.addEventListener('keydown', function (e) { if (e.key === 'Escape') { setOpen(false); } });
        window.addEventListener('resize', function () { if (window.innerWidth > 1100) { setOpen(false); } });
        doc.addEventListener('click', function (e) {
            if (menu.classList.contains('is-open') && !menu.contains(e.target) && !toggle.contains(e.target)) { setOpen(false); }
        });
    })();

    /* ---------- Search overlay ----------------------------------------------- */
    (function search() {
        var overlay = $('#searchOverlay');
        var openBtn = $('#searchToggle');
        var closeBtn = $('#searchClose');
        var input = $('#searchInput');
        if (!overlay || !openBtn) { return; }

        function open() {
            overlay.hidden = false;
            openBtn.setAttribute('aria-expanded', 'true');
            window.setTimeout(function () { if (input) { input.focus(); } }, 30);
        }
        function close() {
            overlay.hidden = true;
            openBtn.setAttribute('aria-expanded', 'false');
            openBtn.focus();
        }
        openBtn.addEventListener('click', open);
        if (closeBtn) { closeBtn.addEventListener('click', close); }
        overlay.addEventListener('click', function (e) { if (e.target === overlay) { close(); } });
        doc.addEventListener('keydown', function (e) { if (e.key === 'Escape' && !overlay.hidden) { close(); } });
    })();

    /* ---------- Scroll halus untuk anchor internal ---------------------------- */
    $$('[data-scroll]').forEach(function (el) {
        el.addEventListener('click', function (e) {
            var target = $(el.getAttribute('data-scroll'));
            if (target) {
                e.preventDefault();
                target.scrollIntoView({ behavior: 'smooth', block: 'start' });
            }
        });
    });

    /* ---------- Strip komoditas (tombol next) --------------------------------- */
    (function strip() {
        var list = $('#commStrip');
        var next = $('#commNext');
        if (!list || !next) { return; }
        next.addEventListener('click', function () {
            var atEnd = list.scrollLeft + list.clientWidth >= list.scrollWidth - 8;
            if (atEnd) { list.scrollTo({ left: 0, behavior: 'smooth' }); }
            else { list.scrollBy({ left: Math.max(240, list.clientWidth * 0.6), behavior: 'smooth' }); }
        });
    })();

    /* ---------- Filter (katalog & wilayah) ------------------------------------ */
    (function filters() {
        var searchInput = $('#commSearch');
        var empty = $('#commEmpty');

        $$('[data-filter-group]').forEach(function (group) {
            var target = $(group.getAttribute('data-filter-group'));
            if (!target) { return; }
            var items = $$('[data-category]', target);
            var active = 'semua';

            function apply() {
                var q = searchInput && target.id === 'commGrid' ? searchInput.value.trim().toLowerCase() : '';
                var shown = 0;
                items.forEach(function (item) {
                    var okCat = active === 'semua' || item.getAttribute('data-category') === active;
                    var okQ = !q || (item.getAttribute('data-name') || '').indexOf(q) !== -1;
                    item.hidden = !(okCat && okQ);
                    if (!item.hidden) { shown++; }
                });
                if (empty && target.id === 'commGrid') { empty.hidden = shown !== 0; }
            }

            $$('[data-filter]', group).forEach(function (btn) {
                btn.addEventListener('click', function () {
                    active = btn.getAttribute('data-filter');
                    $$('[data-filter]', group).forEach(function (b) {
                        var on = b === btn;
                        b.classList.toggle('is-active', on);
                        b.setAttribute('aria-pressed', on ? 'true' : 'false');
                    });
                    apply();
                });
            });

            if (searchInput && target.id === 'commGrid') {
                searchInput.addEventListener('input', apply);
                var q0 = params.get('q');
                if (q0) { searchInput.value = q0; }
            }
            apply();
        });
    })();

    /* ---------- Tabs (spesifikasi) -------------------------------------------- */
    $$('[data-tabs]').forEach(function (wrap) {
        var tabs = $$('[data-tab]', wrap);
        var panels = $$('[role="tabpanel"]', wrap);

        function activate(slug, focus) {
            tabs.forEach(function (t) {
                var on = t.getAttribute('data-tab') === slug;
                t.classList.toggle('is-active', on);
                t.setAttribute('aria-selected', on ? 'true' : 'false');
                t.tabIndex = on ? 0 : -1;
                if (on && focus) { t.focus(); }
            });
            panels.forEach(function (p) {
                var on = p.id === 'panel-' + slug;
                p.hidden = !on;
                p.classList.toggle('is-active', on);
            });
        }
        tabs.forEach(function (t, i) {
            t.addEventListener('click', function () { activate(t.getAttribute('data-tab')); });
            t.addEventListener('keydown', function (e) {
                var dir = e.key === 'ArrowRight' ? 1 : e.key === 'ArrowLeft' ? -1 : 0;
                if (!dir) { return; }
                e.preventDefault();
                var n = tabs[(i + dir + tabs.length) % tabs.length];
                activate(n.getAttribute('data-tab'), true);
            });
        });
        var hash = window.location.hash.replace('#', '');
        if (hash && tabs.some(function (t) { return t.getAttribute('data-tab') === hash; })) { activate(hash); }
        else if (tabs[0]) { activate(tabs[0].getAttribute('data-tab')); }
        window.addEventListener('hashchange', function () {
            var h = window.location.hash.replace('#', '');
            if (tabs.some(function (t) { return t.getAttribute('data-tab') === h; })) { activate(h); }
        });
    });

    /* ---------- Bar kapasitas ------------------------------------------------- */
    (function bars() {
        var lists = $$('[data-bars]');
        if (!lists.length) { return; }
        if (!('IntersectionObserver' in window)) {
            lists.forEach(function (l) { l.classList.add('is-visible'); });
            return;
        }
        var io = new IntersectionObserver(function (entries) {
            entries.forEach(function (en) {
                if (en.isIntersecting) { en.target.classList.add('is-visible'); io.unobserve(en.target); }
            });
        }, { threshold: 0.2 });
        lists.forEach(function (l) { io.observe(l); });
    })();

    /* ---------- Prefill dari query string ------------------------------------- */
    $$('[data-prefill]').forEach(function (el) {
        var val = params.get(el.getAttribute('data-prefill'));
        if (!val) { return; }
        if (el.tagName === 'SELECT') {
            var match = $$('option', el).filter(function (o) {
                return (o.getAttribute('data-slug') || '').toLowerCase() === val.toLowerCase() || o.value.toLowerCase() === val.toLowerCase();
            })[0];
            if (match) { el.value = match.value; }
        } else {
            el.value = val;
        }
    });

    /* ---------- Kalkulator pesanan minimum ------------------------------------ */
    (function moq() {
        var form = $('#moqForm');
        if (!form) { return; }
        var sel = $('#moqComm');
        var qty = $('#moqQty');
        var out = $('#moqResult');
        var cta = $('#moqCta');
        var base = cta ? cta.getAttribute('href').split('?')[0] : '';

        function update() {
            var opt = sel.options[sel.selectedIndex];
            var min = parseFloat(opt.getAttribute('data-moq')) || 1;
            var name = opt.text.replace(/\s*\(min.*$/, '');
            var n = parseFloat(String(qty.value).replace(',', '.'));
            out.classList.remove('is-ok', 'is-low');
            if (!n || n <= 0) {
                out.textContent = 'Masukkan jumlah untuk melihat hasil.';
            } else if (n < min) {
                out.classList.add('is-low');
                out.textContent = 'Jumlah ini di bawah pesanan minimum ' + name + ' (' + min + ' ton). Tambahkan ' + (Math.round((min - n) * 10) / 10) + ' ton lagi.';
            } else {
                var tier = n > 50 ? 'Kontrak' : n >= 5 ? 'Reguler' : 'Uji Pasar';
                out.classList.add('is-ok');
                out.textContent = 'Memenuhi syarat. Skema yang sesuai: ' + tier + ' (' + n + ' ton ' + name + ').';
            }
            if (cta) {
                var q = '?komoditas=' + encodeURIComponent(sel.value) + (n > 0 ? '&jumlah=' + encodeURIComponent(n) : '');
                cta.setAttribute('href', base + q);
            }
        }
        form.addEventListener('submit', function (e) { e.preventDefault(); update(); });
        sel.addEventListener('change', update);
        qty.addEventListener('input', update);
        update();
    })();

    /* ---------- Form -> WhatsApp ---------------------------------------------- */
    $$('[data-wa-form]').forEach(function (form) {
        var status = $('.form-status', form);
        var title = form.getAttribute('data-wa-title') || 'PESAN';

        function setStatus(msg, isError) {
            if (!status) { return; }
            status.textContent = msg;
            status.classList.toggle('is-error', !!isError);
        }
        $$('input, select, textarea', form).forEach(function (f) {
            f.addEventListener('input', function () { f.classList.remove('is-invalid'); });
            f.addEventListener('change', function () { f.classList.remove('is-invalid'); });
        });

        form.addEventListener('submit', function (e) {
            e.preventDefault();
            var firstBad = null;
            $$('input, select, textarea', form).forEach(function (f) {
                if (!f.checkValidity()) {
                    f.classList.add('is-invalid');
                    if (!firstBad) { firstBad = f; }
                }
            });
            if (firstBad) {
                setStatus('Mohon lengkapi data yang wajib diisi dengan benar.', true);
                firstBad.focus();
                return;
            }
            var lines = ['*' + title + ' - AgroHarvest*', ''];
            $$('[data-label]', form).forEach(function (f) {
                var v = String(f.value || '').trim();
                if (v) { lines.push(f.getAttribute('data-label') + ': ' + v); }
            });
            lines.push('', 'Dikirim dari website AgroHarvest.');
            var link = 'https://wa.me/' + (cfg.whatsapp || '') + '?text=' + encodeURIComponent(lines.join('\n'));
            var win = window.open(link, '_blank', 'noopener');
            if (!win) {
                status.textContent = '';
                var a = doc.createElement('a');
                a.href = link; a.target = '_blank'; a.rel = 'noopener';
                a.textContent = 'Klik di sini untuk membuka WhatsApp';
                a.style.textDecoration = 'underline';
                status.appendChild(a);
                status.classList.remove('is-error');
            } else {
                setStatus('Membuka WhatsApp. Silakan kirim pesan yang sudah terisi.', false);
            }
        });
    });

    /* ---------- AI Chatbot (FAQ komoditas & kemitraan) ------------------------- */
    var bot = cfg.chatbot || { faq: [] };

    function normalize(t) {
        return String(t || '').toLowerCase().replace(/[^a-z0-9\s]/g, ' ').replace(/\s+/g, ' ').trim();
    }

    function findAnswer(text) {
        var n = normalize(text);
        if (!n) { return null; }
        var best = null;
        var bestScore = 0;
        (bot.faq || []).forEach(function (f) {
            var score = 0;
            (f.keywords || []).forEach(function (k) {
                var kk = normalize(k);
                if (kk && (' ' + n + ' ').indexOf(' ' + kk) !== -1) { score += kk.indexOf(' ') !== -1 ? 3 : 2; }
            });
            normalize(f.q).split(' ').forEach(function (w) {
                if (w.length > 4 && n.indexOf(w) !== -1) { score += 1; }
            });
            if (score > bestScore) { bestScore = score; best = f; }
        });
        return bestScore >= 2 ? best : null;
    }

    function createChat(opts) {
        var body = opts.body;
        var form = opts.form;
        var input = opts.input;
        var quick = opts.quick;
        var greeted = false;
        var busy = false;

        function scroll() { body.scrollTop = body.scrollHeight; }

        function addMsg(kind, text, link) {
            var el = doc.createElement('div');
            el.className = 'msg msg--' + kind;
            var p = doc.createElement('span');
            p.textContent = text;
            el.appendChild(p);
            if (link && link.href) {
                var a = doc.createElement('a');
                a.className = 'msg__link';
                a.href = link.href;
                if (link.external) { a.target = '_blank'; a.rel = 'noopener'; }
                a.appendChild(doc.createTextNode(link.label + ' '));
                var svg = doc.createElementNS('http://www.w3.org/2000/svg', 'svg');
                svg.setAttribute('class', 'ico');
                var use = doc.createElementNS('http://www.w3.org/2000/svg', 'use');
                use.setAttribute('href', '#i-arrow');
                svg.appendChild(use);
                a.appendChild(svg);
                el.appendChild(doc.createElement('br'));
                el.appendChild(a);
            }
            body.appendChild(el);
            scroll();
            return el;
        }

        function reply(text, link) {
            busy = true;
            var typing = doc.createElement('div');
            typing.className = 'msg msg--bot msg--typing';
            typing.setAttribute('aria-label', 'Asisten sedang mengetik');
            typing.innerHTML = '<i></i><i></i><i></i>';
            body.appendChild(typing);
            scroll();
            window.setTimeout(function () {
                if (typing.parentNode) { typing.parentNode.removeChild(typing); }
                addMsg('bot', text, link);
                busy = false;
            }, 520);
        }

        function ask(text) {
            var q = String(text || '').trim();
            if (!q || busy) { return; }
            addMsg('user', q);
            var n = normalize(q);
            if (/^(halo|hai|hi|hello|selamat|permisi|assalamualaikum)/.test(n)) {
                reply('Halo! Ada yang bisa saya bantu seputar komoditas atau kemitraan AgroHarvest?');
                return;
            }
            if (/(terima kasih|makasih|thanks|thank you)/.test(n)) {
                reply('Sama-sama! Jika ada pertanyaan lain, saya siap membantu.');
                return;
            }
            var hit = findAnswer(q);
            if (hit) {
                var link = null;
                if (hit.link && urls[hit.link]) {
                    link = { href: urls[hit.link], label: hit.link_label || 'Lihat Detail', external: hit.link === 'whatsapp' };
                }
                reply(hit.a, link);
            } else {
                reply(bot.fallback || 'Maaf, saya belum menemukan jawaban yang pas.', { href: urls.whatsapp, label: 'Chat via WhatsApp', external: true });
            }
        }

        function greet() {
            if (greeted) { return; }
            greeted = true;
            addMsg('bot', bot.welcome || 'Halo! Ada yang bisa kami bantu?');
        }

        if (form && input) {
            form.addEventListener('submit', function (e) {
                e.preventDefault();
                var v = input.value;
                input.value = '';
                ask(v);
            });
        }
        if (quick) {
            quick.addEventListener('click', function (e) {
                var btn = e.target.closest ? e.target.closest('[data-chat-quick]') : null;
                if (btn) { ask(btn.getAttribute('data-chat-quick')); }
            });
        }
        return { greet: greet, ask: ask };
    }

    /* Panel melayang */
    (function floatingChat() {
        var panel = $('#agChat');
        var toggle = $('#agChatToggle');
        if (!panel || !toggle) { return; }
        var chat = createChat({ body: $('#agChatBody'), form: $('#agChatForm'), input: $('#agChatInput'), quick: $('#agChatQuick') });
        var closeBtn = $('#agChatClose');
        var hint = $('#agAiHint');
        var hintClose = $('#agAiHintClose');
        var hintTimer = null;

        function hideHint() {
            if (hint) { hint.hidden = true; }
            if (hintTimer) { window.clearTimeout(hintTimer); }
            safeStorage('set', 'agHintSeen', '1');
        }
        function open() {
            panel.hidden = false;
            toggle.setAttribute('aria-expanded', 'true');
            hideHint();
            chat.greet();
            var input = $('#agChatInput');
            if (input) { window.setTimeout(function () { input.focus(); }, 60); }
        }
        function close() {
            panel.hidden = true;
            toggle.setAttribute('aria-expanded', 'false');
            toggle.focus();
        }

        toggle.addEventListener('click', function () { if (panel.hidden) { open(); } else { close(); } });
        if (closeBtn) { closeBtn.addEventListener('click', close); }
        $$('[data-chat-open]').forEach(function (b) { b.addEventListener('click', function () { if (panel.hidden) { open(); } }); });
        doc.addEventListener('keydown', function (e) { if (e.key === 'Escape' && !panel.hidden) { close(); } });

        if (hint) {
            if (hintClose) { hintClose.addEventListener('click', hideHint); }
            if (!safeStorage('get', 'agHintSeen')) {
                window.setTimeout(function () {
                    if (panel.hidden) {
                        hint.hidden = false;
                        hintTimer = window.setTimeout(hideHint, 9000);
                    }
                }, 3500);
            }
        }
    })();

    /* Chat inline (halaman AI FAQ) */
    (function inlineChat() {
        var body = $('#agInlineBody');
        if (!body) { return; }
        var chat = createChat({ body: body, form: $('#agInlineForm'), input: $('#agInlineInput'), quick: $('#agInlineQuick') });
        chat.greet();
    })();
})();
