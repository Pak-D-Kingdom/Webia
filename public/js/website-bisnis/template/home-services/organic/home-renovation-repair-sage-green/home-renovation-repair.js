/* ==========================================================================
   Renovaku — Home Renovation & Repair · Organic · Sage Green
   Vanilla JS (tanpa dependensi). Data dari window.HRR (diisi oleh layout Blade).
   ========================================================================== */
(function () {
    'use strict';

    var D = window.HRR || {};
    var doc = document;
    var root = doc.documentElement;
    var reduceMotion = window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches;

    function $(sel, ctx) { return (ctx || doc).querySelector(sel); }
    function $$(sel, ctx) { return Array.prototype.slice.call((ctx || doc).querySelectorAll(sel)); }
    function on(el, ev, fn, opts) { if (el) { el.addEventListener(ev, fn, opts); } }
    function rupiah(n) { return 'Rp ' + String(Math.round(n)).replace(/\B(?=(\d{3})+(?!\d))/g, '.'); }
    function waLink(text) { return 'https://wa.me/' + (D.whatsapp || '') + '?text=' + encodeURIComponent(text); }
    function svgIcon(name) {
        var ns = 'http://www.w3.org/2000/svg';
        var svg = doc.createElementNS(ns, 'svg');
        svg.setAttribute('class', 'hr-ico');
        svg.setAttribute('aria-hidden', 'true');
        var use = doc.createElementNS(ns, 'use');
        use.setAttribute('href', '#i-' + name);
        svg.appendChild(use);
        return svg;
    }

    var header = $('[data-header]');
    var nav = $('[data-nav]');
    var scrim = $('[data-scrim]');
    var searchBox = $('[data-search]');
    var chatPanel = $('[data-chat]');

    /* ---------- 1. Header: bayangan saat scroll ---------- */
    function onScroll() {
        if (header) { header.classList.toggle('is-stuck', window.scrollY > 8); }
    }
    onScroll();
    on(window, 'scroll', onScroll, { passive: true });

    /* ---------- 2. Drawer mobile + dropdown ---------- */
    function setNav(open) {
        if (!nav) { return; }
        nav.classList.toggle('is-open', open);
        if (scrim) { scrim.hidden = !open; }
        $$('[data-nav-open]').forEach(function (b) { b.setAttribute('aria-expanded', open ? 'true' : 'false'); });
        root.style.overflow = open ? 'hidden' : '';
        root.classList.toggle('hr-lock', open);
        if (!open) { closeDropdowns(); }
    }
    function closeDropdowns(except) {
        $$('.hr-nav__item.is-open').forEach(function (li) {
            if (li !== except) {
                li.classList.remove('is-open');
                var t = $('[data-dd-toggle]', li);
                if (t) { t.setAttribute('aria-expanded', 'false'); }
            }
        });
    }
    $$('[data-nav-open]').forEach(function (b) { on(b, 'click', function () { setNav(true); }); });
    $$('[data-nav-close]').forEach(function (b) { on(b, 'click', function () { setNav(false); }); });
    on(scrim, 'click', function () { setNav(false); });

    $$('[data-dd-toggle]').forEach(function (btn) {
        on(btn, 'click', function (e) {
            e.stopPropagation();
            var li = btn.closest('.hr-nav__item');
            var open = !li.classList.contains('is-open');
            closeDropdowns(li);
            li.classList.toggle('is-open', open);
            btn.setAttribute('aria-expanded', open ? 'true' : 'false');
        });
    });
    on(doc, 'click', function (e) {
        if (!e.target.closest('.hr-nav__item')) { closeDropdowns(); }
    });
    $$('.hr-nav a').forEach(function (a) {
        on(a, 'click', function () {
            if (nav && nav.classList.contains('is-open')) { setNav(false); }
        });
    });
    on(window, 'resize', function () {
        if (window.innerWidth > 1180 && nav && nav.classList.contains('is-open')) { setNav(false); }
    });

    /* ---------- 3. Pencarian ---------- */
    var searchInput = $('[data-search-input]');
    var searchList = $('[data-search-results]');

    function renderSearch(q) {
        if (!searchList) { return; }
        var items = Array.isArray(D.search) ? D.search : [];
        var term = (q || '').toLowerCase().trim();
        var found;
        if (!term) {
            found = items.slice(0, 9);
        } else {
            var words = term.split(/\s+/);
            found = items.map(function (it) {
                var hay = (it.t + ' ' + it.d).toLowerCase();
                var score = 0;
                words.forEach(function (w) {
                    if (it.t.toLowerCase().indexOf(w) !== -1) { score += 3; }
                    else if (hay.indexOf(w) !== -1) { score += 1; }
                    else { score -= 10; }
                });
                return { it: it, score: score };
            }).filter(function (x) { return x.score > 0; })
                .sort(function (a, b) { return b.score - a.score; })
                .slice(0, 8)
                .map(function (x) { return x.it; });
        }
        searchList.textContent = '';
        if (!found.length) {
            var empty = doc.createElement('li');
            empty.className = 'hr-search__empty';
            empty.textContent = 'Tidak ada hasil untuk “' + q + '”. Coba kata lain, misalnya “paket” atau “survei”.';
            searchList.appendChild(empty);
            return;
        }
        found.forEach(function (it) {
            var li = doc.createElement('li');
            var a = doc.createElement('a');
            a.href = it.u;
            var ico = doc.createElement('span');
            ico.className = 'hr-dd__ico';
            ico.appendChild(svgIcon(it.i || 'search'));
            var box = doc.createElement('span');
            var strong = doc.createElement('strong');
            strong.textContent = it.t;
            var small = doc.createElement('small');
            small.textContent = it.d;
            box.appendChild(strong);
            box.appendChild(small);
            a.appendChild(ico);
            a.appendChild(box);
            li.appendChild(a);
            searchList.appendChild(li);
        });
    }
    function setSearch(open) {
        if (!searchBox) { return; }
        searchBox.hidden = !open;
        if (open) {
            renderSearch('');
            if (searchInput) { searchInput.value = ''; setTimeout(function () { searchInput.focus(); }, 30); }
            root.style.overflow = 'hidden';
            root.classList.add('hr-lock');
        } else if (!(nav && nav.classList.contains('is-open'))) {
            root.style.overflow = '';
            root.classList.remove('hr-lock');
        }
    }
    $$('[data-search-open]').forEach(function (b) { on(b, 'click', function () { setSearch(true); }); });
    $$('[data-search-close]').forEach(function (b) { on(b, 'click', function () { setSearch(false); }); });
    on(searchBox, 'click', function (e) { if (e.target === searchBox) { setSearch(false); } });
    on(searchInput, 'input', function () { renderSearch(searchInput.value); });
    on(searchInput, 'keydown', function (e) {
        if (e.key === 'Enter') {
            var first = $('a', searchList);
            if (first) { window.location.href = first.href; }
        }
    });
    on(doc, 'keydown', function (e) {
        if ((e.key === '/' || (e.key === 'k' && (e.ctrlKey || e.metaKey))) && searchBox && searchBox.hidden &&
            !/^(input|textarea|select)$/i.test((doc.activeElement || {}).tagName || '')) {
            e.preventDefault();
            setSearch(true);
        }
    });

    /* ---------- 4. Reveal saat scroll ---------- */
    var revealEls = $$('[data-reveal]');
    function revealAll() { revealEls.forEach(function (el) { el.classList.add('is-in'); }); }
    if (!('IntersectionObserver' in window) || reduceMotion) {
        revealAll();
    } else {
        var io = new IntersectionObserver(function (entries) {
            entries.forEach(function (en) {
                if (en.isIntersecting) { en.target.classList.add('is-in'); io.unobserve(en.target); }
            });
        }, { threshold: 0.12, rootMargin: '0px 0px -40px 0px' });
        revealEls.forEach(function (el) { io.observe(el); });
    }
    on(window, 'beforeprint', revealAll);
    if (location.hash.length > 1) {
        try {
            var tgt = doc.getElementById(decodeURIComponent(location.hash.slice(1)));
            if (tgt) { tgt.classList.add('is-in'); }
        } catch (err) { /* hash tidak valid: abaikan */ }
    }

    /* ---------- 5. Before / After slider ---------- */
    $$('[data-compare]').forEach(function (box) {
        var range = $('[data-compare-range]', box);
        function set() { box.style.setProperty('--pos', range.value + '%'); }
        if (range) { on(range, 'input', set); set(); }
    });

    /* ---------- 6. Cek wilayah ---------- */
    var cov = $('[data-coverage-check]');
    if (cov) {
        on(cov, 'submit', function (e) {
            e.preventDefault();
            var out = $('[data-coverage-out]', cov);
            var sel = $('select', cov);
            $$('.hr-region').forEach(function (r) { r.classList.remove('is-picked'); });
            if (!sel.value) {
                out.textContent = 'Pilih wilayah rumah Anda terlebih dahulu.';
                out.classList.add('is-error');
                return;
            }
            var card = doc.getElementById('wilayah-' + sel.value);
            out.classList.remove('is-error');
            if (card) {
                var name = $('h3', card).textContent;
                var cities = $('p', card).textContent;
                var lead = $('.hr-chip', card).textContent.trim();
                out.textContent = 'Kami melayani ' + name + ' (' + cities + '). Perkiraan jadwal: ' + lead + '.';
                card.classList.add('is-picked');
                card.classList.add('is-in');
                card.scrollIntoView({ behavior: reduceMotion ? 'auto' : 'smooth', block: 'center' });
            }
        });
    }

    /* ---------- 7. Formulir -> WhatsApp ---------- */
    function pad(n) { return n < 10 ? '0' + n : String(n); }
    function isoDate(d) { return d.getFullYear() + '-' + pad(d.getMonth() + 1) + '-' + pad(d.getDate()); }

    $$('[data-wa-form]').forEach(function (form) {
        var params = new URLSearchParams(window.location.search);
        $$('[data-prefill]', form).forEach(function (sel) {
            var v = params.get(sel.getAttribute('data-prefill'));
            if (v && $$('option', sel).some(function (o) { return o.value === v; })) { sel.value = v; }
        });
        var dateInput = $('[data-min-today]', form);
        if (dateInput) {
            var tomorrow = new Date();
            tomorrow.setDate(tomorrow.getDate() + 1);
            dateInput.min = isoDate(tomorrow);
        }

        function fieldOf(el) { return el.closest('.hr-field'); }
        function setError(el, msg) {
            var f = fieldOf(el);
            if (!f) { return; }
            f.classList.toggle('is-invalid', !!msg);
            var p = $('[data-err]', f);
            if (p) { p.textContent = msg || ''; }
            el.setAttribute('aria-invalid', msg ? 'true' : 'false');
        }
        function validate(el) {
            var v = (el.value || '').trim();
            var msg = '';
            if (el.required && !v) {
                msg = el.tagName === 'SELECT' ? 'Silakan pilih salah satu.' : 'Bagian ini wajib diisi.';
            } else if (v) {
                if (el.type === 'tel' && !/^[0-9+\s-]{9,16}$/.test(v)) { msg = 'Masukkan nomor yang valid, contoh 0812 3456 7890.'; }
                else if (el.type === 'email' && !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(v)) { msg = 'Format email belum benar.'; }
                else if (el.type === 'number' && (Number(v) < Number(el.min || 1) || Number(v) > Number(el.max || 1e9))) { msg = 'Angka di luar batas yang wajar.'; }
                else if (el.type === 'date' && el.min && v < el.min) { msg = 'Pilih tanggal mulai besok.'; }
                else if (el.minLength > 0 && v.length < el.minLength) { msg = 'Minimal ' + el.minLength + ' karakter.'; }
            }
            setError(el, msg);
            return !msg;
        }

        var controls = $$('input[name], select[name], textarea[name]', form);
        controls.forEach(function (el) {
            on(el, 'blur', function () { if ((el.value || '').trim() || fieldOf(el).classList.contains('is-invalid')) { validate(el); } });
            on(el, 'input', function () { if (fieldOf(el).classList.contains('is-invalid')) { validate(el); } });
            on(el, 'change', function () { if (fieldOf(el).classList.contains('is-invalid')) { validate(el); } });
        });

        on(form, 'submit', function (e) {
            e.preventDefault();
            var firstBad = null;
            controls.forEach(function (el) { if (!validate(el) && !firstBad) { firstBad = el; } });
            if (firstBad) { firstBad.focus(); return; }

            var lines = [form.getAttribute('data-wa-intro') || 'Halo Renovaku,', ''];
            controls.forEach(function (el) {
                var v = el.tagName === 'SELECT' ? (el.options[el.selectedIndex] || {}).text : el.value;
                v = (v || '').replace(/\s+/g, ' ').trim();
                if (el.type === 'date' && v) {
                    var dt = new Date(v + 'T00:00:00');
                    if (!isNaN(dt.getTime())) { v = dt.toLocaleDateString('id-ID', { day: 'numeric', month: 'long', year: 'numeric' }); }
                }
                if (!v || (el.tagName === 'SELECT' && !el.value)) { return; }
                var label = fieldOf(el) ? $('label', fieldOf(el)) : null;
                var name = label && label.childNodes[0] ? label.childNodes[0].textContent.trim() : el.name;
                lines.push(name + ': ' + v);
            });
            lines.push('', 'Terima kasih.');
            var url = waLink(lines.join('\n'));
            var ok = $('[data-form-ok]', form);
            var link = $('[data-form-link]', form);
            if (link) { link.href = url; }
            if (ok) { ok.hidden = false; }
            window.open(url, '_blank', 'noopener');
        });
    });

    /* ---------- 8. Newsletter (frontend saja) ---------- */
    $$('[data-newsletter]').forEach(function (form) {
        var msg = $('[data-newsletter-msg]', form.parentNode);
        on(form, 'submit', function (e) {
            e.preventDefault();
            var input = $('input[type="email"]', form);
            var v = (input.value || '').trim();
            if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(v)) {
                if (msg) { msg.textContent = 'Masukkan alamat email yang valid.'; }
                input.focus();
                return;
            }
            // Hook untuk tim backend: dengarkan event ini untuk menyimpan email.
            form.dispatchEvent(new CustomEvent('hrr:newsletter', { bubbles: true, detail: { email: v } }));
            if (msg) { msg.textContent = 'Terima kasih! Kami akan mengirim kabar terbaru ke ' + v + '.'; }
            form.reset();
        });
    });

    /* ---------- 9. AI Chatbot (Service & Estimate FAQ) ---------- */
    if (chatPanel) {
        var log = $('[data-chat-log]', chatPanel);
        var quick = $('[data-chat-quick]', chatPanel);
        var form = $('[data-chat-form]', chatPanel);
        var input = $('[data-chat-input]', chatPanel);
        var fab = $('[data-chat-toggle]');
        var faq = Array.isArray(D.faq) ? D.faq : [];
        var rates = D.estimate || {};
        var rateKeys = Object.keys(rates);
        var state = { open: false, greeted: false, step: null, type: null, queue: Promise.resolve() };

        function faqById(id) { return faq.filter(function (f) { return f.id === id; })[0]; }
        function wait(ms) { return new Promise(function (r) { setTimeout(r, reduceMotion ? 0 : ms); }); }
        function scrollLog() { log.scrollTop = log.scrollHeight; }

        function richText(el, text) {
            String(text).split(/(\*\*[^*]+\*\*)/g).forEach(function (part) {
                if (/^\*\*[^*]+\*\*$/.test(part)) {
                    var s = doc.createElement('strong');
                    s.textContent = part.slice(2, -2);
                    el.appendChild(s);
                } else if (part) {
                    el.appendChild(doc.createTextNode(part));
                }
            });
        }
        function addUser(text) {
            var m = doc.createElement('div');
            m.className = 'hr-msg hr-msg--user';
            m.textContent = text;
            log.appendChild(m);
            scrollLog();
        }
        function addBot(text, actions) {
            var m = doc.createElement('div');
            m.className = 'hr-msg hr-msg--bot';
            richText(m, text);
            if (actions && actions.length) {
                var box = doc.createElement('div');
                box.className = 'hr-msg__actions';
                actions.forEach(function (a) {
                    var l = doc.createElement('a');
                    l.className = 'hr-msg__btn' + (a.wa ? ' hr-msg__btn--wa' : '');
                    l.href = a.href;
                    if (a.wa) { l.target = '_blank'; l.rel = 'noopener noreferrer'; }
                    l.appendChild(svgIcon(a.wa ? 'whatsapp' : 'arrow'));
                    l.appendChild(doc.createTextNode(a.label));
                    box.appendChild(l);
                });
                m.appendChild(box);
            }
            log.appendChild(m);
            scrollLog();
        }
        function botSay(text, actions) {
            state.queue = state.queue.then(function () {
                var t = doc.createElement('div');
                t.className = 'hr-msg hr-msg--bot hr-typing';
                t.innerHTML = '<i></i><i></i><i></i>';
                t.setAttribute('aria-label', 'Asisten sedang mengetik');
                log.appendChild(t);
                scrollLog();
                return wait(420 + Math.min(text.length * 4, 500)).then(function () {
                    t.remove();
                    addBot(text, actions);
                });
            });
            return state.queue;
        }
        function setQuick(list) {
            quick.textContent = '';
            list.forEach(function (q) {
                var b = doc.createElement('button');
                b.type = 'button';
                b.className = 'hr-qbtn';
                b.textContent = q.label;
                on(b, 'click', function () { handle(q.ask || q.label); });
                quick.appendChild(b);
            });
        }
        function mainQuick() {
            var labels = { estimasi: 'Estimasi Biaya', lainnya: 'FAQ Lainnya' };
            setQuick((D.quick || []).map(function (id) {
                var f = faqById(id);
                return { label: labels[id] || (f ? f.q : id) };
            }));
        }
        function moreQuick() {
            var list = (D.more || []).map(function (id) { var f = faqById(id); return f ? { label: f.q } : null; }).filter(Boolean);
            list.push({ label: 'Menu utama', ask: 'menu' });
            setQuick(list);
        }
        function startEstimate() {
            state.step = 'type';
            state.type = null;
            botSay('Tentu! Pilih jenis pekerjaan yang ingin diperkirakan biayanya:');
            setQuick(rateKeys.map(function (k) { return { label: rates[k].label, ask: rates[k].label }; }));
        }
        function pickType(text) {
            var t = text.toLowerCase();
            for (var i = 0; i < rateKeys.length; i++) {
                var lbl = rates[rateKeys[i]].label.toLowerCase();
                if (t === lbl || t.indexOf(lbl) !== -1) { return rateKeys[i]; }
            }
            return null;
        }
        function finishEstimate(area) {
            var r = rates[state.type];
            var min = area * r.min;
            var max = area * r.max;
            var summary = 'Halo Renovaku, saya ingin konsultasi ' + r.label + ' ± ' + area + ' m² (estimasi chatbot ' + rupiah(min) + ' – ' + rupiah(max) + ').';
            botSay('**Estimasi awal ' + r.label + '** untuk ' + area + ' m²:\n' + rupiah(min) + ' – ' + rupiah(max) +
                '\n\nAngka ini perkiraan kasar. Biaya final ditentukan setelah survei lokasi dan pemilihan material.',
                [
                    { label: 'Booking survei', href: (D.links || {})['booking-survei'] || '#' },
                    { label: 'Minta penawaran', href: (D.links || {})['permintaan-penawaran'] || '#' },
                    { label: 'Kirim ke WhatsApp', href: waLink(summary), wa: true }
                ]);
            state.step = null;
            state.type = null;
            mainQuick();
        }
        function matchFaq(t) {
            var best = null;
            var bestScore = 0;
            faq.forEach(function (f) {
                var score = 0;
                if (t === f.q.toLowerCase()) { score += 10; }
                f.keys.forEach(function (k) { if (t.indexOf(k) !== -1) { score += 1; } });
                if (score > bestScore) { best = f; bestScore = score; }
            });
            return best;
        }
        function fallback() {
            botSay('Maaf, saya belum menemukan jawaban yang pas. Coba pilih topik di bawah, atau tanyakan langsung ke tim kami lewat WhatsApp.',
                [{ label: 'Tanya via WhatsApp', href: waLink('Halo Renovaku, saya ingin bertanya seputar layanan renovasi.'), wa: true }]);
            mainQuick();
        }

        function handle(raw) {
            var text = String(raw || '').replace(/\s+/g, ' ').trim().slice(0, 200);
            if (!text) { return; }
            addUser(text);
            var t = text.toLowerCase();

            if (/^(menu|batal|kembali)/.test(t)) {
                state.step = null;
                botSay('Baik, kembali ke menu utama. Apa yang ingin Anda ketahui?');
                mainQuick();
                return;
            }
            if (state.step === 'type') {
                var key = pickType(text);
                if (key) {
                    state.type = key;
                    state.step = 'area';
                    botSay('Berapa luas area yang akan dikerjakan (dalam m²)? Contoh: 36');
                    setQuick([{ label: '20', ask: '20' }, { label: '36', ask: '36' }, { label: '60', ask: '60' }, { label: '100', ask: '100' }, { label: 'Batal', ask: 'batal' }]);
                } else {
                    botSay('Silakan pilih salah satu jenis pekerjaan di bawah ini.');
                }
                return;
            }
            if (state.step === 'area') {
                var n = parseFloat(t.replace(',', '.').replace(/[^0-9.]/g, ''));
                if (isFinite(n) && n >= 1 && n <= 5000) {
                    finishEstimate(Math.round(n * 10) / 10);
                } else {
                    botSay('Mohon masukkan angka luas antara 1 dan 5000 m², misalnya 36.');
                }
                return;
            }
            if (/estimasi|biaya|hitung|kalkulator|\brab\b/.test(t) && !/penawaran/.test(t)) { startEstimate(); return; }
            if (/^(faq lainnya|lainnya|faq|bantuan)$/.test(t)) {
                botSay('Berikut pertanyaan yang sering diajukan. Pilih salah satu, atau ketik pertanyaan Anda.');
                moreQuick();
                return;
            }
            var hit = matchFaq(t);
            if (hit) {
                var acts = hit.link && (D.links || {})[hit.link] ? [{ label: hit.link_label || 'Selengkapnya', href: D.links[hit.link] }] : [];
                botSay(hit.a, acts);
                mainQuick();
            } else {
                fallback();
            }
        }

        function openChat(skipGreeting) {
            if (state.open) { return; }
            state.open = true;
            chatPanel.hidden = false;
            chatPanel.setAttribute('aria-hidden', 'false');
            if (fab) { fab.setAttribute('aria-expanded', 'true'); }
            window.requestAnimationFrame(function () { chatPanel.classList.add('is-open'); });
            if (!state.greeted) {
                state.greeted = true;
                if (!skipGreeting) {
                    botSay('Halo! Saya asisten Renovaku 👋 Ada yang bisa saya bantu seputar layanan, paket, dan estimasi biaya?');
                } else {
                    addBot('Halo! Saya asisten Renovaku 👋');
                }
                mainQuick();
            }
            if (window.matchMedia && window.matchMedia('(hover: hover)').matches) {
                setTimeout(function () { if (input) { input.focus(); } }, 320);
            }
        }
        function closeChat() {
            if (!state.open) { return; }
            state.open = false;
            chatPanel.classList.remove('is-open');
            chatPanel.setAttribute('aria-hidden', 'true');
            if (fab) { fab.setAttribute('aria-expanded', 'false'); }
            setTimeout(function () { if (!state.open) { chatPanel.hidden = true; } }, 300);
        }

        on(fab, 'click', function () { state.open ? closeChat() : openChat(); });
        $$('[data-chat-open]').forEach(function (b) { on(b, 'click', function () { openChat(); }); });
        $$('[data-chat-close]').forEach(function (b) { on(b, 'click', closeChat); });
        $$('[data-chat-ask]').forEach(function (b) {
            on(b, 'click', function () {
                if (nav && nav.classList.contains('is-open')) { setNav(false); }
                openChat(true);
                handle(b.getAttribute('data-chat-ask'));
            });
        });
        on(form, 'submit', function (e) {
            e.preventDefault();
            var v = input.value;
            input.value = '';
            handle(v);
        });
    }

    /* ---------- 10. Escape menutup panel yang terbuka ---------- */
    on(doc, 'keydown', function (e) {
        if (e.key !== 'Escape') { return; }
        if (searchBox && !searchBox.hidden) { setSearch(false); return; }
        if (nav && nav.classList.contains('is-open')) { setNav(false); return; }
        if (chatPanel && !chatPanel.hidden) {
            var c = $('[data-chat-close]', chatPanel);
            if (c) { c.click(); }
            return;
        }
        closeDropdowns();
    });
})();
