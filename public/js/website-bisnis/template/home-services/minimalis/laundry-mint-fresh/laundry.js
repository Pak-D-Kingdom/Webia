/* ==========================================================================
   FreshWash — Template Laundry · Minimalist · Mint Fresh
   Vanilla JS (tanpa dependensi). Modul: nav, tabs, jam operasional,
   cek area, form → WhatsApp, chatbot FAQ (harga & proses laundry).
   ========================================================================== */
(function () {
    'use strict';

    var $ = function (s, ctx) { return (ctx || document).querySelector(s); };
    var $$ = function (s, ctx) { return Array.prototype.slice.call((ctx || document).querySelectorAll(s)); };
    var reduceMotion = window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches;
    var brand = ($('.lw-brand__name') || {}).textContent || 'FreshWash';

    /* ---------- 1. NAVBAR + DROPDOWN ---------- */
    function initNav() {
        var nav = $('[data-lw-nav]');
        if (!nav) return;
        var toggle = $('[data-lw-menu-toggle]', nav);
        var more = $('[data-lw-more]', nav);
        var moreBtn = more && $('button', more);
        var items = more ? $$('.lw-drop__item', more) : [];
        var hoverMQ = window.matchMedia ? window.matchMedia('(min-width: 1024px) and (hover: hover)') : { matches: false };
        var timer = null;

        function setMenu(open) {
            nav.classList.toggle('is-open', open);
            toggle.setAttribute('aria-expanded', String(open));
            document.body.classList.toggle('lw-menu-open', open);
        }
        function setMore(open, focusFirst) {
            if (!more) return;
            clearTimeout(timer);
            more.classList.toggle('is-open', open);
            moreBtn.setAttribute('aria-expanded', String(open));
            if (open && focusFirst && items[0]) items[0].focus();
        }
        function isOpen() { return more && more.classList.contains('is-open'); }

        toggle.addEventListener('click', function () { setMenu(!nav.classList.contains('is-open')); });

        if (more) {
            moreBtn.addEventListener('click', function (e) {
                // Mouse di desktop: hover sudah membuka panel, klik tidak boleh menutupnya lagi.
                // Keyboard (detail = 0) dan layar sentuh/mobile: toggle biasa.
                if (hoverMQ.matches && e.detail > 0) setMore(true);
                else setMore(!isOpen());
            });
            moreBtn.addEventListener('keydown', function (e) {
                if (e.key === 'ArrowDown') { e.preventDefault(); setMore(true, true); }
            });
            more.addEventListener('keydown', function (e) {
                var i = items.indexOf(document.activeElement);
                if (e.key === 'Escape' && isOpen()) { e.stopPropagation(); setMore(false); moreBtn.focus(); }
                else if (e.key === 'ArrowDown' && i > -1) { e.preventDefault(); items[(i + 1) % items.length].focus(); }
                else if (e.key === 'ArrowUp' && i > -1) { e.preventDefault(); (i === 0 ? moreBtn : items[i - 1]).focus(); }
                else if (e.key === 'Home' && i > -1) { e.preventDefault(); items[0].focus(); }
                else if (e.key === 'End' && i > -1) { e.preventDefault(); items[items.length - 1].focus(); }
            });
            // buka saat hover (hanya perangkat dengan mouse), tutup dengan jeda singkat
            more.addEventListener('mouseenter', function () { if (hoverMQ.matches) setMore(true); });
            more.addEventListener('mouseleave', function () {
                if (hoverMQ.matches) { clearTimeout(timer); timer = setTimeout(function () { setMore(false); }, 160); }
            });
            // tutup saat fokus keluar dari dropdown
            more.addEventListener('focusout', function (e) {
                if (e.relatedTarget && !more.contains(e.relatedTarget)) setMore(false);
            });
        }

        document.addEventListener('click', function (e) {
            if (more && !more.contains(e.target)) setMore(false);
            if (!nav.contains(e.target)) setMenu(false);
        });
        document.addEventListener('keydown', function (e) {
            if (e.key === 'Escape') { setMore(false); setMenu(false); }
        });
        $$('a', nav).forEach(function (a) { a.addEventListener('click', function () { setMenu(false); }); });

        var onScroll = function () { nav.classList.toggle('is-stuck', window.scrollY > 8); };
        onScroll();
        window.addEventListener('scroll', onScroll, { passive: true });
    }

    /* ---------- 1b. KEMBALI KE ATAS ---------- */
    function initToTop() {
        var btn = $('[data-lw-totop]');
        if (!btn) return;
        btn.addEventListener('click', function () {
            window.scrollTo({ top: 0, behavior: reduceMotion ? 'auto' : 'smooth' });
        });
    }

    /* ---------- 2. TABS (Per Item / Per Kg) ---------- */
    function initTabs() {
        $$('[data-lw-tabs]').forEach(function (root) {
            var tabs = $$('[role="tab"]', root);
            function select(tab) {
                tabs.forEach(function (t) {
                    var on = t === tab;
                    t.classList.toggle('is-active', on);
                    t.setAttribute('aria-selected', String(on));
                    t.tabIndex = on ? 0 : -1;
                    var panel = document.getElementById(t.getAttribute('aria-controls'));
                    if (panel) panel.hidden = !on;
                });
            }
            tabs.forEach(function (t, i) {
                t.addEventListener('click', function () { select(t); });
                t.addEventListener('keydown', function (e) {
                    var d = e.key === 'ArrowRight' ? 1 : e.key === 'ArrowLeft' ? -1 : 0;
                    if (!d) return;
                    var n = tabs[(i + d + tabs.length) % tabs.length];
                    select(n); n.focus();
                });
            });
        });
    }

    /* ---------- 3. JAM OPERASIONAL (WIB) ---------- */
    function wibNow() {
        var parts = new Intl.DateTimeFormat('en-US', {
            timeZone: 'Asia/Jakarta', hour: 'numeric', minute: 'numeric', hour12: false, weekday: 'short'
        }).formatToParts(new Date());
        var o = {};
        parts.forEach(function (p) { o[p.type] = p.value; });
        var map = { Sun: 0, Mon: 1, Tue: 2, Wed: 3, Thu: 4, Fri: 5, Sat: 6 };
        return { h: parseInt(o.hour, 10) % 24, m: parseInt(o.minute, 10), day: map[o.weekday] };
    }
    function pad(n) { return (n < 10 ? '0' : '') + n; }

    function initHours() {
        var cards = $$('[data-lw-hours]');
        var week = $('[data-lw-week]');
        if (!cards.length && !week) return;

        function render() {
            var now = wibNow();
            cards.forEach(function (card) {
                var open = +card.dataset.open, close = +card.dataset.close;
                var isOpen = now.h >= open && now.h < close;
                var st = $('[data-lw-status]', card), tx = $('[data-lw-status-text]', card);
                st.classList.toggle('is-open', isOpen);
                st.classList.toggle('is-closed', !isOpen);
                tx.textContent = isOpen
                    ? 'Buka · tutup ' + pad(close) + '.00'
                    : 'Tutup · buka ' + pad(open) + '.00';
            });
            if (week) $$('li', week).forEach(function (li) { li.classList.toggle('is-today', +li.dataset.day === now.day); });
        }
        render();
        setInterval(render, 60000);
    }

    /* ---------- 4. FORM ORDER → WHATSAPP ---------- */
    function openWhatsApp(number, text) {
        var url = 'https://wa.me/' + number + '?text=' + encodeURIComponent(text);
        var w = window.open(url, '_blank', 'noopener');
        if (!w) window.location.href = url;
    }

    function initOrderForm() {
        var form = $('[data-lw-order-form]');
        if (!form) return;
        var err = $('[data-lw-form-error]', form);
        var number = (form.getAttribute('action') || '').replace(/\D/g, '');

        // Isi otomatis dari tautan halaman lain (?layanan=...&opsi=...)
        var qs = new URLSearchParams(window.location.search);
        ['layanan', 'opsi'].forEach(function (k) {
            var sel = form.elements[k], val = qs.get(k);
            if (!sel || !val) return;
            Array.prototype.some.call(sel.options, function (o) {
                if (o.value === val || o.text === val) { sel.value = o.value || o.text; return true; }
            });
        });

        form.addEventListener('submit', function (e) {
            e.preventDefault();
            var f = form.elements, bad = [];
            ['nama', 'wa', 'layanan', 'opsi', 'area', 'alamat'].forEach(function (n) {
                var el = f[n], v = (el.value || '').trim();
                var invalid = !v || (n === 'wa' && !/^\+?\d{9,15}$/.test(v.replace(/[\s-]/g, '')));
                var tgt = el.__lwBtn || el;
                tgt.classList.toggle('is-invalid', invalid);
                if (invalid) bad.push(tgt);
            });
            if (bad.length) {
                err.hidden = false;
                err.textContent = 'Lengkapi data yang ditandai. Nomor WhatsApp harus berupa 9–15 digit.';
                bad[0].focus();
                return;
            }
            err.hidden = true;
            var lines = [
                'Halo ' + brand + ', saya ingin memesan laundry.', '',
                'Nama: ' + f.nama.value.trim(),
                'No. WhatsApp: ' + f.wa.value.trim(),
                'Layanan: ' + f.layanan.value,
                'Opsi: ' + f.opsi.value,
                'Area jemput: ' + f.area.value,
                'Alamat: ' + f.alamat.value.trim()
            ];
            if (f.catatan.value.trim()) lines.push('Catatan: ' + f.catatan.value.trim());
            openWhatsApp(number, lines.join('\n'));
        });
        form.addEventListener('input', function (e) { (e.target.__lwBtn || e.target).classList.remove('is-invalid'); });
    }

    /* ---------- 5. CEK AREA ---------- */
    function initAreaCheck() {
        var box = $('[data-lw-area-check]');
        if (!box) return;
        var form = $('form', box), out = $('[data-lw-check-result]', box), wa = box.dataset.wa;
        var norm = function (s) { return (s || '').toLowerCase().replace(/\s+/g, ' ').trim(); };

        form.addEventListener('submit', function (e) {
            e.preventDefault();
            var sel = form.elements.area, kec = norm(form.elements.kec.value);
            out.className = 'lw-check-result'; out.textContent = '';
            if (!sel.value) { out.className += ' is-no'; out.textContent = 'Pilih kota terlebih dahulu.'; (sel.__lwBtn || sel).focus(); return; }

            var opt = sel.options[sel.selectedIndex];
            var list = (opt.dataset.list || '').split('|').map(norm);
            var all = opt.dataset.all === '1';
            var hit = !kec || all || list.some(function (x) { return x.indexOf(kec) > -1 || kec.indexOf(x) > -1; });

            if (hit) {
                out.textContent = '✓ Tersedia jemput & antar gratis di ' + (kec ? form.elements.kec.value.trim() + ', ' : '') + sel.value + '.';
            } else {
                out.className += ' is-no';
                out.textContent = '"' + form.elements.kec.value.trim() + '" belum ada di daftar kami. ';
                var a = document.createElement('a');
                a.href = 'https://wa.me/' + wa + '?text=' + encodeURIComponent('Halo ' + brand + ', apakah area ' + form.elements.kec.value.trim() + ', ' + sel.value + ' bisa dijemput?');
                a.target = '_blank'; a.rel = 'noopener'; a.textContent = 'Tanya via WhatsApp';
                a.style.textDecoration = 'underline';
                out.appendChild(a);
            }
        });
    }

    /* ---------- 5b. DROPDOWN KUSTOM (select) + KALKULATOR ---------- */
    function initSelects() {
        // Perangkat sentuh tetap memakai select bawaan (lebih nyaman di mobile).
        if (!window.matchMedia || !window.matchMedia('(hover: hover) and (pointer: fine)').matches) return;
        var openOne = null;

        function enhance(sel) {
            var wrap = document.createElement('div');
            wrap.className = 'lw-select';
            sel.parentNode.insertBefore(wrap, sel);
            wrap.appendChild(sel);
            sel.classList.add('lw-select__native');
            sel.tabIndex = -1;
            sel.setAttribute('aria-hidden', 'true');

            var base = sel.id || ('lw-sel-' + Math.random().toString(36).slice(2, 7));
            var btn = document.createElement('button');
            btn.type = 'button';
            btn.className = 'lw-select__btn';
            btn.id = base + '-btn';
            btn.setAttribute('aria-haspopup', 'listbox');
            btn.setAttribute('aria-expanded', 'false');
            btn.innerHTML = '<span class="lw-select__val"></span><svg class="lw-i" aria-hidden="true"><use href="#i-chevron"/></svg>';
            var val = btn.firstChild;
            var list = document.createElement('ul');
            list.className = 'lw-select__list';
            list.id = base + '-list';
            list.setAttribute('role', 'listbox');
            btn.setAttribute('aria-controls', list.id);
            wrap.appendChild(btn);
            wrap.appendChild(list);

            if (sel.id) {
                var lab = document.querySelector('label[for="' + sel.id + '"]');
                if (lab) lab.setAttribute('for', btn.id);
            }
            sel.__lwBtn = btn;

            var items = [], active = -1;
            var api = { close: function () { close(false); } };

            function addOpt(o) {
                var li = document.createElement('li');
                li.className = 'lw-select__opt' + (o.value === '' ? ' is-empty' : '');
                li.id = base + '-o' + items.length;
                li.setAttribute('role', 'option');
                li.textContent = o.text;
                li.dataset.index = String(Array.prototype.indexOf.call(sel.options, o));
                li.addEventListener('mousedown', function (e) { e.preventDefault(); });
                li.addEventListener('click', function () { choose(+li.dataset.index); });
                li.addEventListener('mousemove', function () { setActive(items.indexOf(li)); });
                list.appendChild(li);
                items.push(li);
            }
            function build() {
                list.innerHTML = ''; items = [];
                Array.prototype.forEach.call(sel.children, function (ch) {
                    if (ch.tagName === 'OPTGROUP') {
                        var g = document.createElement('li');
                        g.className = 'lw-select__group';
                        g.setAttribute('role', 'presentation');
                        g.textContent = ch.label;
                        list.appendChild(g);
                        Array.prototype.forEach.call(ch.children, addOpt);
                    } else if (ch.tagName === 'OPTION') {
                        addOpt(ch);
                    }
                });
            }
            function setActive(i) {
                active = i;
                items.forEach(function (it, k) { it.classList.toggle('is-active', k === i); });
                if (i > -1 && items[i]) {
                    var it = items[i];
                    btn.setAttribute('aria-activedescendant', it.id);
                    if (it.offsetTop < list.scrollTop) list.scrollTop = it.offsetTop - 6;
                    else if (it.offsetTop + it.offsetHeight > list.scrollTop + list.clientHeight) list.scrollTop = it.offsetTop + it.offsetHeight - list.clientHeight + 6;
                }
            }
            function sync() {
                var o = sel.options[sel.selectedIndex];
                val.textContent = o ? o.text : '';
                btn.classList.toggle('is-placeholder', !sel.value);
                items.forEach(function (it) {
                    var on = +it.dataset.index === sel.selectedIndex;
                    it.classList.toggle('is-selected', on);
                    it.setAttribute('aria-selected', String(on));
                });
            }
            function choose(idx) {
                if (idx < 0) return;
                sel.selectedIndex = idx;
                sync();
                close(true);
                sel.dispatchEvent(new Event('input', { bubbles: true }));
                sel.dispatchEvent(new Event('change', { bubbles: true }));
            }
            function open() {
                if (openOne && openOne !== api) openOne.close();
                wrap.classList.add('is-open');
                btn.setAttribute('aria-expanded', 'true');
                openOne = api;
                var r = btn.getBoundingClientRect(), below = window.innerHeight - r.bottom;
                wrap.classList.toggle('is-up', below < 270 && r.top > below);
                var cur = items.map(function (it) { return +it.dataset.index; }).indexOf(sel.selectedIndex);
                setActive(cur > -1 ? cur : 0);
            }
            function close(focusBtn) {
                wrap.classList.remove('is-open');
                btn.setAttribute('aria-expanded', 'false');
                if (openOne === api) openOne = null;
                if (focusBtn) btn.focus();
            }

            btn.addEventListener('click', function () { wrap.classList.contains('is-open') ? close(false) : open(); });
            btn.addEventListener('keydown', function (e) {
                var isOpen = wrap.classList.contains('is-open');
                if (e.key === 'ArrowDown' || e.key === 'ArrowUp') {
                    e.preventDefault();
                    if (!isOpen) { open(); return; }
                    setActive(Math.min(items.length - 1, Math.max(0, active + (e.key === 'ArrowDown' ? 1 : -1))));
                } else if (e.key === 'Home' && isOpen) { e.preventDefault(); setActive(0); }
                else if (e.key === 'End' && isOpen) { e.preventDefault(); setActive(items.length - 1); }
                else if (e.key === 'Enter' || e.key === ' ') {
                    e.preventDefault();
                    if (isOpen) { if (active > -1) choose(+items[active].dataset.index); } else open();
                } else if (e.key === 'Escape' && isOpen) { e.preventDefault(); e.stopPropagation(); close(true); }
                else if (e.key === 'Tab' && isOpen) { close(false); }
                else if (e.key.length === 1 && /\S/.test(e.key)) {
                    var ch = e.key.toLowerCase();
                    for (var k = 1; k <= items.length; k++) {
                        var j = (Math.max(active, -1) + k) % items.length;
                        if (items[j].textContent.trim().toLowerCase().indexOf(ch) === 0) { if (!isOpen) open(); setActive(j); break; }
                    }
                }
            });
            document.addEventListener('click', function (e) { if (!wrap.contains(e.target)) close(false); });
            sel.addEventListener('change', sync);
            sel.addEventListener('lw-sync', sync);
            build();
            sync();
        }

        $$('.lw-form select').forEach(enhance);
    }

    function initCalc() {
        var box = $('[data-lw-calc]');
        if (!box) return;
        var sel = $('select', box), qty = $('input[type="number"]', box);
        var unitEl = $('[data-lw-calc-unit]', box), totalEl = $('[data-lw-calc-total]', box), wa = $('[data-lw-calc-wa]', box);
        var brandName = box.dataset.brand || brand;
        var rupiah = new Intl.NumberFormat('id-ID');
        var lastTotal = null;

        function cur() { return sel.options[sel.selectedIndex]; }
        function stepFor() { return cur().dataset.unit === 'kg' ? 0.5 : 1; }
        function clamp(v) {
            v = parseFloat(String(v).replace(',', '.'));
            var s = stepFor();
            if (!isFinite(v)) v = s;
            v = Math.round(v / s) * s;
            return Math.min(99, Math.max(s, v));
        }
        function fmtQty(q) { return String(q).replace('.', ','); }
        function render() {
            var o = cur(), unit = o.dataset.unit, q = clamp(qty.value), total = Math.round(+o.value * q);
            qty.step = String(stepFor());
            qty.min = String(stepFor());
            unitEl.textContent = unit;
            totalEl.textContent = 'Rp ' + rupiah.format(total);
            if (lastTotal !== null && lastTotal !== total) {
                totalEl.classList.remove('is-bump'); void totalEl.offsetWidth; totalEl.classList.add('is-bump');
            }
            lastTotal = total;
            var text = 'Halo ' + brandName + ', saya ingin memesan:\n' + o.dataset.name + ' × ' + fmtQty(q) + ' ' + unit +
                '\nEstimasi: Rp ' + rupiah.format(total) + ' (belum termasuk biaya opsi tambahan)';
            wa.href = 'https://wa.me/' + box.dataset.wa + '?text=' + encodeURIComponent(text);
        }
        $$('[data-lw-qty]', box).forEach(function (b) {
            b.addEventListener('click', function () {
                qty.value = fmtQty(clamp(clamp(qty.value) + (+b.dataset.lwQty) * stepFor())).replace(',', '.');
                render();
            });
        });
        qty.addEventListener('input', render);
        qty.addEventListener('change', function () { qty.value = String(clamp(qty.value)); render(); });
        sel.addEventListener('change', function () { qty.value = String(clamp(qty.value)); render(); });
        render();
    }

    /* ---------- 6. CHATBOT ---------- */
    function initChat() {
        var panel = $('#lw-chat'), dataEl = $('#lw-chat-data');
        if (!panel || !dataEl) return;

        var data = JSON.parse(dataEl.textContent);
        var log = $('[data-lw-chat-log]', panel);
        var form = $('[data-lw-chat-form]', panel);
        var input = form.elements.q;
        var fabs = $$('.lw-fab--bot');
        var teaser = $('[data-lw-teaser]');
        var lastOpener = null, busy = false;
        var rupiah = new Intl.NumberFormat('id-ID');

        var norm = function (s) { return (' ' + (s || '').toLowerCase().replace(/[^a-z0-9\s]/g, ' ').replace(/\s+/g, ' ').trim() + ' '); };

        function scroll() { log.scrollTop = log.scrollHeight; }

        function addMsg(role, text, link) {
            var el = document.createElement('div');
            el.className = 'lw-msg lw-msg--' + role;
            el.textContent = text;
            if (link) {
                el.appendChild(document.createElement('br'));
                var a = document.createElement('a');
                a.href = link.url; a.textContent = link.text + ' →';
                if (/^https?:\/\/wa\.me/.test(link.url)) { a.target = '_blank'; a.rel = 'noopener'; }
                el.appendChild(a);
            }
            log.appendChild(el); scroll();
        }

        function reply(text, link) {
            busy = true;
            var t = document.createElement('div');
            t.className = 'lw-typing'; t.innerHTML = '<i></i><i></i><i></i>';
            log.appendChild(t); scroll();
            setTimeout(function () {
                t.remove(); addMsg('bot', text, link); busy = false;
            }, reduceMotion ? 0 : 520 + Math.min(text.length * 4, 700));
        }

        function findPrice(q) {
            // Cocokkan nama lengkap; untuk harga per item juga kata kunci tunggal (kemeja, kaos, jas, ...)
            return data.prices.filter(function (p) {
                var name = norm(p.name).trim();
                if (q.indexOf(' ' + name + ' ') > -1) return true;
                return p.unit === 'item' && name.split(' ').some(function (w) {
                    return (w.length > 3 || w === 'jas') && q.indexOf(' ' + w + ' ') > -1;
                });
            }).slice(0, 3);
        }

        function answer(raw) {
            var q = norm(raw);

            var prices = findPrice(q);
            if (prices.length) {
                var txt = prices.map(function (p) { return p.name + ': Rp ' + rupiah.format(p.price) + ' / ' + p.unit; }).join('\n');
                return reply(txt, { url: data.priceUrl, text: 'Lihat Daftar Harga' });
            }

            var best = null, score = 0;
            data.faq.concat([data.hours]).forEach(function (f) {
                var s = 0;
                f.keywords.forEach(function (k) { if (q.indexOf(' ' + k + ' ') > -1 || q.indexOf(k) > -1) s += k.length > 3 ? 2 : 1; });
                if (s > score) { score = s; best = f; }
            });

            if (best) return reply(best.answer, { url: best.url, text: best.linkText });

            reply(data.fallback, {
                url: 'https://wa.me/' + data.whatsapp + '?text=' + encodeURIComponent('Halo ' + brand + ', saya ingin bertanya…'),
                text: 'Tanya via WhatsApp'
            });
        }

        function ask(text) {
            if (busy || !text.trim()) return;
            addMsg('user', text.trim());
            answer(text);
        }

        function open(opener) {
            lastOpener = opener || lastOpener;
            panel.hidden = false;
            fabs.forEach(function (f) { f.setAttribute('aria-expanded', 'true'); });
            if (teaser) teaser.hidden = true;
            if (!log.children.length) addMsg('bot', data.welcome);
            setTimeout(function () { input.focus({ preventScroll: true }); }, 60);
        }
        function close() {
            panel.hidden = true;
            fabs.forEach(function (f) { f.setAttribute('aria-expanded', 'false'); });
            if (lastOpener && lastOpener.focus) lastOpener.focus();
        }

        document.addEventListener('click', function (e) {
            var o = e.target.closest('[data-lw-chat-open]');
            if (o) { e.preventDefault(); panel.hidden ? open(o) : (o.classList.contains('lw-fab') ? close() : input.focus()); return; }

            var c = e.target.closest('[data-lw-chat-close]');
            if (c) { close(); return; }

            var t = e.target.closest('[data-lw-chat-topic]');
            if (t) {
                e.preventDefault();
                var f = data.faq.filter(function (x) { return x.key === t.dataset.lwChatTopic; })[0];
                if (!f) return;
                if (panel.hidden) open(t);
                ask(f.label);
            }
        });
        document.addEventListener('keydown', function (e) { if (e.key === 'Escape' && !panel.hidden) close(); });
        form.addEventListener('submit', function (e) {
            e.preventDefault();
            var v = input.value; input.value = '';
            ask(v);
        });

        // Teaser sekali per sesi
        try {
            if (teaser && !sessionStorage.getItem('lw-teaser')) {
                setTimeout(function () {
                    if (!panel.hidden) return;
                    teaser.hidden = false;
                    sessionStorage.setItem('lw-teaser', '1');
                    setTimeout(function () { teaser.hidden = true; }, 7000);
                }, 3500);
            }
        } catch (err) { /* storage dimatikan: abaikan */ }
    }

    /* ---------- 7. GERAK: progress scroll, parallax hero, muncul saat di-scroll ---------- */
    function initFx() {
        var nav = $('[data-lw-nav]');
        var bar = $('[data-lw-progress]');
        var hero = $('.lw-hero');
        var heroImg = hero && $('.lw-hero__img', hero);
        var wide = window.matchMedia ? window.matchMedia('(min-width: 1280px)') : { matches: false };
        var ticking = false;

        function update() {
            ticking = false;
            var y = window.scrollY || window.pageYOffset || 0;
            if (bar) {
                var max = document.documentElement.scrollHeight - window.innerHeight;
                bar.style.setProperty('--lw-p', max > 0 ? Math.min(1, Math.max(0, y / max)).toFixed(4) : 0);
            }
            if (heroImg && !reduceMotion && wide.matches && y < hero.offsetHeight + 80) {
                heroImg.style.setProperty('--lw-py', Math.min(y * 0.16, 56).toFixed(1) + 'px');
            }
        }
        function onScroll() {
            if (!ticking) { ticking = true; window.requestAnimationFrame(update); }
        }
        update();
        window.addEventListener('scroll', onScroll, { passive: true });
        window.addEventListener('resize', onScroll);
    }

    function initReveal() {
        if (reduceMotion || !('IntersectionObserver' in window)) return;
        var groups = [
            '.lw-home-wrap .lw-card', '.lw-home-wrap .lw-band',
            '.lw-page .lw-card', '.lw-page .lw-hsteps li',
            '.lw-cta__box', '.lw-footer__grid > *'
        ];
        var vh = window.innerHeight || 800;
        var targets = [];
        $$(groups.join(',')).forEach(function (el) {
            if (el.classList.contains('lw-rv')) return;
            // elemen yang sudah terlihat saat load tidak disembunyikan (hindari kedipan)
            if (el.getBoundingClientRect().top < vh * 0.92) return;
            var sibs = el.parentElement ? Array.prototype.filter.call(el.parentElement.children, function (c) { return c.tagName === el.tagName; }) : [el];
            el.style.setProperty('--rv-d', (Math.max(0, sibs.indexOf(el)) % 4) * 90 + 'ms');
            el.classList.add('lw-rv');
            targets.push(el);
        });
        if (!targets.length) return;

        var io = new IntersectionObserver(function (entries) {
            entries.forEach(function (en) {
                if (!en.isIntersecting) return;
                var el = en.target;
                io.unobserve(el);
                el.classList.add('is-in');
                // setelah animasi selesai, lepaskan kelas agar transisi hover normal kembali
                setTimeout(function () {
                    el.classList.remove('lw-rv', 'is-in');
                    el.style.removeProperty('--rv-d');
                }, 1100);
            });
        }, { threshold: 0.1, rootMargin: '0px 0px -6% 0px' });
        targets.forEach(function (el) { io.observe(el); });
    }

    /* ---------- BOOT ---------- */
    function boot() {
        initNav(); initFx(); initReveal(); initToTop(); initTabs(); initHours(); initOrderForm(); initAreaCheck(); initSelects(); initCalc(); initChat();
    }
    if (document.readyState === 'loading') document.addEventListener('DOMContentLoaded', boot);
    else boot();
})();
