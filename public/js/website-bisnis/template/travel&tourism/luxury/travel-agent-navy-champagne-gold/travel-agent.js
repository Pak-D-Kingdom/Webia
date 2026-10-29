/* ==========================================================================
   GrandJourney — Travel Agent · Luxury · Navy Champagne Gold
   File    : travel-agent.js
   Frontend statis (vanilla JS, tanpa dependensi). Modul:
   nav · filter · tabs · carousel (opsional) · slider · lightbox · inquiry · chatbot · hint
   Data chatbot dibaca dari window.GJ (di-render oleh layouts/app.blade.php).
   ========================================================================== */
(function () {
    'use strict';

    var $ = function (s, c) { return (c || document).querySelector(s); };
    var $$ = function (s, c) { return Array.prototype.slice.call((c || document).querySelectorAll(s)); };
    var reduceMotion = window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches;
    var GJ = window.GJ || {};

    /* ---------- NAVBAR ---------------------------------------------------- */
    function initNav() {
        var nav = $('[data-nav]');
        if (!nav) return;
        var toggle = $('[data-nav-toggle]', nav);
        var menu = $('[data-nav-menu]', nav);

        function setOpen(open) {
            toggle.setAttribute('aria-expanded', open ? 'true' : 'false');
            menu.classList.toggle('is-open', open);
        }
        toggle.addEventListener('click', function () {
            setOpen(toggle.getAttribute('aria-expanded') !== 'true');
        });
        $$('a', menu).forEach(function (a) { a.addEventListener('click', function () { setOpen(false); }); });
        document.addEventListener('keydown', function (e) {
            if (e.key === 'Escape' && toggle.getAttribute('aria-expanded') === 'true') { setOpen(false); toggle.focus(); }
        });
        document.addEventListener('click', function (e) {
            if (!nav.contains(e.target)) setOpen(false);
        });
        window.addEventListener('resize', function () { if (window.innerWidth >= 1260) setOpen(false); });

        var onScroll = function () { nav.classList.toggle('is-scrolled', window.scrollY > 8); };
        window.addEventListener('scroll', onScroll, { passive: true });
        onScroll();
    }

    /* ---------- FILTER (destinasi, paket, jadwal, galeri) ----------------- */
    function initFilters() {
        $$('[data-filter-group]').forEach(function (group) {
            var scope = group.closest('section') || document;
            var items = $$('[data-filter-item]', scope);
            var buttons = $$('[data-filter]', group);

            buttons.forEach(function (btn) {
                btn.addEventListener('click', function () {
                    var value = btn.getAttribute('data-filter');
                    buttons.forEach(function (b) { b.classList.toggle('is-active', b === btn); });
                    items.forEach(function (it) {
                        it.hidden = !(value === 'all' || it.getAttribute('data-value') === value);
                    });
                });
            });
        });
    }

    /* ---------- TABS (itinerary) ------------------------------------------ */
    function initTabs() {
        $$('[data-tabs]').forEach(function (root) {
            var tabs = $$('[role="tab"]', root);
            var panels = $$('[role="tabpanel"]', root);
            if (!tabs.length) return;

            function select(tab, focus) {
                tabs.forEach(function (t) {
                    var on = t === tab;
                    t.setAttribute('aria-selected', on ? 'true' : 'false');
                    t.tabIndex = on ? 0 : -1;
                });
                panels.forEach(function (p) { p.hidden = p.id !== tab.getAttribute('aria-controls'); });
                if (focus) tab.focus();
            }
            function fromHash() {
                var key = decodeURIComponent((location.hash || '').replace('#', ''));
                var match = tabs.filter(function (t) { return t.getAttribute('data-tab') === key; })[0];
                if (match) select(match, false);
            }

            tabs.forEach(function (tab, i) {
                tab.addEventListener('click', function () { select(tab, false); });
                tab.addEventListener('keydown', function (e) {
                    var next = null;
                    if (e.key === 'ArrowRight') next = tabs[(i + 1) % tabs.length];
                    if (e.key === 'ArrowLeft') next = tabs[(i - 1 + tabs.length) % tabs.length];
                    if (e.key === 'Home') next = tabs[0];
                    if (e.key === 'End') next = tabs[tabs.length - 1];
                    if (next) { e.preventDefault(); select(next, true); }
                });
            });
            window.addEventListener('hashchange', fromHash);
            fromHash();
        });
    }

    /* ---------- CAROUSEL (galeri preview) --------------------------------- */
    function initCarousels() {
        $$('[data-carousel]').forEach(function (root) {
            var track = $('[data-carousel-track]', root);
            var prev = $('[data-carousel-prev]', root);
            var next = $('[data-carousel-next]', root);
            if (!track) return;
            var step = function () {
                var li = track.firstElementChild;
                return li ? li.getBoundingClientRect().width + 8 : track.clientWidth * 0.8;
            };
            var go = function (dir) {
                var atEnd = track.scrollLeft + track.clientWidth >= track.scrollWidth - 4;
                if (dir > 0 && atEnd) track.scrollTo({ left: 0 });
                else track.scrollBy({ left: dir * step() });
            };
            if (prev) prev.addEventListener('click', function () { go(-1); });
            if (next) next.addEventListener('click', function () { go(1); });
        });
    }

    /* ---------- SLIDER (testimoni preview) -------------------------------- */
    function initSliders() {
        $$('[data-slider]').forEach(function (root) {
            var slides = $$('[data-slide]', root);
            var dots = $$('[data-dot]', root);
            var nextBtn = $('[data-slider-next]', root);
            var prevBtn = $('[data-slider-prev]', root);
            var index = 0, timer = null;
            if (slides.length < 2) return;

            function show(i) {
                index = (i + slides.length) % slides.length;
                slides.forEach(function (s, n) { s.classList.toggle('is-active', n === index); });
                dots.forEach(function (d, n) { d.classList.toggle('is-active', n === index); });
            }
            function start() {
                if (reduceMotion) return;
                stop();
                timer = setInterval(function () { show(index + 1); }, 7000);
            }
            function stop() { if (timer) { clearInterval(timer); timer = null; } }

            if (nextBtn) nextBtn.addEventListener('click', function () { show(index + 1); start(); });
            if (prevBtn) prevBtn.addEventListener('click', function () { show(index - 1); start(); });
            dots.forEach(function (d, n) { d.addEventListener('click', function () { show(n); start(); }); });
            root.addEventListener('mouseenter', stop);
            root.addEventListener('mouseleave', start);
            root.addEventListener('focusin', stop);
            root.addEventListener('focusout', start);
            start();
        });
    }

    /* ---------- LIGHTBOX (galeri penuh) ----------------------------------- */
    function initLightbox() {
        var modal = $('[data-lightbox-modal]');
        if (!modal) return;
        var img = $('[data-lightbox-img]', modal);
        var cap = $('[data-lightbox-cap]', modal);
        var closeBtn = $('[data-lightbox-close]', modal);
        var list = [], current = 0, opener = null;

        function visibleItems() {
            return $$('[data-lightbox]').filter(function (b) { return !b.closest('[hidden]'); });
        }
        function render() {
            var b = list[current];
            img.src = b.getAttribute('data-src');
            img.alt = b.getAttribute('data-caption') || '';
            cap.textContent = b.getAttribute('data-caption') || '';
        }
        function open(btn) {
            list = visibleItems();
            current = Math.max(0, list.indexOf(btn));
            opener = btn;
            render();
            modal.hidden = false;
            document.body.style.overflow = 'hidden';
            closeBtn.focus();
        }
        function close() {
            modal.hidden = true;
            document.body.style.overflow = '';
            if (opener) opener.focus();
        }
        function step(d) { current = (current + d + list.length) % list.length; render(); }

        $$('[data-lightbox]').forEach(function (b) { b.addEventListener('click', function () { open(b); }); });
        closeBtn.addEventListener('click', close);
        $('[data-lightbox-prev]', modal).addEventListener('click', function () { step(-1); });
        $('[data-lightbox-next]', modal).addEventListener('click', function () { step(1); });
        modal.addEventListener('click', function (e) { if (e.target === modal) close(); });
        document.addEventListener('keydown', function (e) {
            if (modal.hidden) return;
            if (e.key === 'Escape') close();
            if (e.key === 'ArrowLeft') step(-1);
            if (e.key === 'ArrowRight') step(1);
        });
    }

    /* ---------- INQUIRY (form penuh -> WhatsApp) -------------------------- */
    function initInquiry() {
        var form = $('[data-inquiry-form]');
        if (!form) return;
        var status = $('[data-form-status]', form);
        var wa = form.getAttribute('data-wa');

        // Prefill dari form preview di beranda / link paket & jadwal
        var params = new URLSearchParams(location.search);
        ['nama', 'email', 'whatsapp', 'peserta', 'destinasi', 'paket', 'tanggal', 'catatan'].forEach(function (name) {
            var val = params.get(name);
            var el = form.elements[name];
            if (!val || !el) return;
            if (el.tagName === 'SELECT') {
                var ok = Array.prototype.some.call(el.options, function (o) { return o.value === val; });
                if (ok) el.value = val;
            } else {
                el.value = val.slice(0, 300);
            }
        });

        function setError(name, msg) {
            var box = $('[data-error-for="' + name + '"]', form);
            var field = form.elements[name] && form.elements[name].closest('.ga-field');
            if (box) { box.textContent = msg || ''; box.hidden = !msg; }
            if (field) field.classList.toggle('has-error', !!msg);
            if (form.elements[name]) form.elements[name].setAttribute('aria-invalid', msg ? 'true' : 'false');
        }
        function validate() {
            var f = form.elements, ok = true, first = null;
            var phone = (f.whatsapp.value || '').replace(/[^\d]/g, '');
            var rules = [
                ['nama', f.nama.value.trim().length >= 2, 'Isi nama lengkap Anda.'],
                ['email', /^[^\s@]+@[^\s@]+\.[^\s@]{2,}$/.test(f.email.value.trim()), 'Masukkan email yang valid.'],
                ['whatsapp', phone.length >= 9 && phone.length <= 15, 'Masukkan nomor WhatsApp yang valid.'],
                ['destinasi', !!f.destinasi.value, 'Pilih destinasi tujuan.']
            ];
            rules.forEach(function (r) {
                setError(r[0], r[1] ? '' : r[2]);
                if (!r[1]) { ok = false; if (!first) first = f[r[0]]; }
            });
            if (first) first.focus();
            return ok;
        }
        function optionText(el) { return el.selectedIndex > 0 && el.options[el.selectedIndex] ? el.options[el.selectedIndex].text : '-'; }

        form.addEventListener('submit', function (e) {
            e.preventDefault();
            status.className = 'ga-form__status';
            if (!validate()) { status.textContent = 'Periksa kembali kolom yang ditandai.'; status.classList.add('is-bad'); return; }

            var f = form.elements;
            var lines = [
                'Halo GrandJourney, saya ingin booking inquiry.',
                '',
                'Nama: ' + f.nama.value.trim(),
                'Email: ' + f.email.value.trim(),
                'WhatsApp: ' + f.whatsapp.value.trim(),
                'Destinasi: ' + f.destinasi.value,
                'Paket: ' + (f.paket.value || '-'),
                'Tanggal: ' + optionText(f.tanggal),
                'Peserta: ' + (f.peserta.value || '-'),
                'Catatan: ' + (f.catatan.value.trim() || '-')
            ];
            var url = 'https://wa.me/' + wa + '?text=' + encodeURIComponent(lines.join('\n'));
            var win = window.open(url, '_blank', 'noopener');
            if (!win) { window.location.href = url; }
            status.textContent = 'Inquiry disiapkan. Lanjutkan pengiriman di WhatsApp.';
            status.classList.add('is-ok');
        });
        form.addEventListener('input', function (e) {
            if (e.target.name) setError(e.target.name, '');
        });
    }

    /* ---------- AI CHATBOT (FAQ destinasi & paket, statis) ---------------- */
    function initChatbot() {
        var root = $('[data-ai]');
        if (!root) return;
        var toggle = $('[data-ai-toggle]', root);
        var panel = $('[data-ai-panel]', root);
        var log = $('[data-ai-log]', root);
        var chipsBox = $('[data-ai-chips]', root);
        var form = $('[data-ai-form]', root);
        var input = $('[data-ai-input]', root);
        var hint = $('[data-ai-hint]', root);
        var greeted = false;
        var urls = GJ.urls || {};
        var aliases = { jepang: 'tokyo', japan: 'tokyo', komodo: 'labuan bajo', yunani: 'santorini', greece: 'santorini', maladewa: 'maldives', swiss: 'swiss', switzerland: 'swiss' };

        function norm(s) { return String(s || '').toLowerCase().replace(/[^a-z0-9\s]/g, ' ').replace(/\s+/g, ' ').trim(); }
        function scrollDown() { log.scrollTop = log.scrollHeight; }

        function addMsg(text, who, links) {
            var el = document.createElement('div');
            el.className = 'ga-msg ga-msg--' + who;
            el.textContent = text;
            if (links && links.length) {
                var box = document.createElement('div');
                box.className = 'ga-msg__links';
                links.forEach(function (l) {
                    var a = document.createElement('a');
                    a.textContent = l.label;
                    a.href = l.href;
                    if (l.external) { a.target = '_blank'; a.rel = 'noopener noreferrer'; }
                    box.appendChild(a);
                });
                el.appendChild(box);
            }
            log.appendChild(el);
            scrollDown();
            return el;
        }
        function addTyping() {
            var el = document.createElement('div');
            el.className = 'ga-msg ga-msg--bot ga-msg--typing';
            el.setAttribute('aria-label', 'Asisten sedang mengetik');
            el.innerHTML = '<i></i><i></i><i></i>';
            log.appendChild(el);
            scrollDown();
            return el;
        }
        function renderChips(items) {
            chipsBox.textContent = '';
            items.forEach(function (c) {
                var b = document.createElement('button');
                b.type = 'button';
                b.textContent = c.label;
                b.addEventListener('click', function () { ask(c.q); });
                chipsBox.appendChild(b);
            });
        }

        var waLink = { label: 'Chat WhatsApp', href: 'https://wa.me/' + (GJ.whatsapp || ''), external: true };

        function findDestination(q) {
            var text = q;
            Object.keys(aliases).forEach(function (k) { if (q.indexOf(k) > -1) text += ' ' + aliases[k]; });
            return (GJ.destinations || []).filter(function (d) { return text.indexOf(norm(d.name)) > -1; })[0];
        }
        function findPackage(q) {
            return (GJ.packages || []).filter(function (p) { return q.indexOf(norm(p.name)) > -1; })[0];
        }
        function bestFaq(q) {
            var words = q.split(' ').filter(function (w) { return w.length > 2; });
            var best = null, bestScore = 0;
            (GJ.faq || []).forEach(function (f) {
                var score = 0;
                (f.keys || []).forEach(function (k) { if (q.indexOf(norm(k)) > -1) score += 3; });
                words.forEach(function (w) { if (norm(f.q).indexOf(w) > -1) score += 1; });
                if (score > bestScore) { bestScore = score; best = f; }
            });
            return bestScore >= 2 ? best : null;
        }

        function answer(raw) {
            var q = norm(raw);

            if (/^faq$|pertanyaan|sering ditanya/.test(q)) {
                renderChips((GJ.faq || []).slice(0, 8).map(function (f) { return { label: f.q, q: f.q }; }));
                return { text: 'Berikut pertanyaan yang sering diajukan. Pilih salah satu di bawah atau lihat halaman FAQ.', links: [{ label: 'Halaman FAQ', href: urls.faq }] };
            }
            var dest = findDestination(q);
            if (dest && /itinerary|rute|hari/.test(q)) {
                return { text: 'Rincian itinerary tersedia untuk Bali, Jepang, dan Swiss di halaman Itinerary. Untuk ' + dest.name + ' kami siap menyusun rute khusus lewat inquiry.', links: [{ label: 'Lihat Itinerary', href: urls.itinerary }, { label: 'Inquiry ' + dest.name, href: urls.inquiry + '?destinasi=' + encodeURIComponent(dest.name) }] };
            }
            if (dest) {
                return { text: dest.name + ', ' + dest.country + ': ' + dest.desc + ' Waktu terbaik: ' + dest.best_time + '. Paket mulai ' + dest.from + ' per orang.', links: [{ label: 'Lihat Destinasi', href: urls.destinasi }, { label: 'Booking Inquiry', href: urls.inquiry + '?destinasi=' + encodeURIComponent(dest.name) }] };
            }
            var pkg = findPackage(q);
            if (pkg) {
                return { text: pkg.name + ' (' + pkg.duration + ') seharga ' + pkg.price + ' per orang. Termasuk: ' + pkg.highlights.join(', ') + '.', links: [{ label: 'Lihat Paket', href: urls.paket }, { label: 'Booking Inquiry', href: urls.inquiry + '?paket=' + encodeURIComponent(pkg.name) }] };
            }
            var faq = bestFaq(q);
            if (faq) {
                var map = { Destinasi: urls.destinasi, Paket: urls.paket };
                var links = [{ label: 'Halaman ' + faq.group, href: map[faq.group] || urls.faq }];
                if (/harga|biaya|promo/.test(q)) links = [{ label: 'Lihat Harga', href: urls.harga }];
                if (/jadwal|berangkat|tanggal/.test(q)) links = [{ label: 'Jadwal Keberangkatan', href: urls.jadwal }];
                if (/booking|pesan|inquiry/.test(q)) links = [{ label: 'Booking Inquiry', href: urls.inquiry }];
                return { text: faq.a, links: links };
            }
            return { text: GJ.fallback, links: [waLink, { label: 'Halaman FAQ', href: urls.faq }] };
        }

        function ask(text) {
            var value = String(text || '').trim();
            if (!value) return;
            addMsg(value, 'user');
            var typing = addTyping();
            var res = answer(value);
            setTimeout(function () {
                typing.remove();
                addMsg(res.text, 'bot', res.links);
            }, reduceMotion ? 0 : 550);
        }

        function open(focusInput) {
            panel.hidden = false;
            toggle.setAttribute('aria-expanded', 'true');
            document.body.classList.add('ga-ai-open');
            if (!greeted) {
                greeted = true;
                addMsg(GJ.greeting, 'bot');
                renderChips(GJ.chips || []);
            }
            if (hint) hint.classList.remove('is-show');
            if (focusInput !== false) input.focus();
        }
        function close() {
            panel.hidden = true;
            toggle.setAttribute('aria-expanded', 'false');
            document.body.classList.remove('ga-ai-open');
        }

        toggle.addEventListener('click', function () { panel.hidden ? open() : close(); });
        $('[data-ai-close]', root).addEventListener('click', function () { close(); toggle.focus(); });
        document.addEventListener('keydown', function (e) {
            if (e.key === 'Escape' && !panel.hidden) { close(); toggle.focus(); }
        });
        form.addEventListener('submit', function (e) {
            e.preventDefault();
            var v = input.value;
            input.value = '';
            ask(v);
        });

        // Tombol "buka chat" di halaman (banner AI, FAQ, itinerary)
        $$('[data-ai-open]').forEach(function (btn) {
            btn.addEventListener('click', function () {
                open();
                var q = btn.getAttribute('data-ai-ask');
                if (q) ask(q);
            });
        });

        // Gelembung sapaan: tampil sekali per sesi
        if (hint) {
            var seen = false;
            try { seen = sessionStorage.getItem('ga-ai-hint') === '1'; } catch (err) { /* abaikan */ }
            if (!seen) {
                setTimeout(function () {
                    if (!panel.hidden) return;
                    hint.classList.add('is-show');
                    try { sessionStorage.setItem('ga-ai-hint', '1'); } catch (err) { /* abaikan */ }
                    setTimeout(function () { hint.classList.remove('is-show'); }, 6000);
                }, 4000);
            }
        }
    }

    /* ---------- INIT ------------------------------------------------------ */
    function init() {
        initNav();
        initFilters();
        initTabs();
        initCarousels();
        initSliders();
        initLightbox();
        initInquiry();
        initChatbot();
    }
    if (document.readyState === 'loading') document.addEventListener('DOMContentLoaded', init);
    else init();
})();
