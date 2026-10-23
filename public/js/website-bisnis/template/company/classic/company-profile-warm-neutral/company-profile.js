/* ==========================================================================
   Company Profile — Classic / Warm Neutral
   WEBIA by D-KREASI

   Frontend statis, tanpa dependensi. Setiap fitur berdiri sendiri dan hanya
   aktif jika elemennya ada di halaman. Hook JavaScript memakai atribut
   data-cp-* (bukan class) agar styling dan perilaku tidak saling terikat.

   Fitur: navbar (menu mobile, bayangan saat scroll, scroll-spy), pencarian
   situs, dialog video profil, carousel klien, validasi formulir penawaran,
   dan AI Assistant (FAQ perusahaan statis).
   ========================================================================== */
(function () {
    'use strict';

    var doc = document;
    var win = window;

    /* ---------------------------------------------------------------------
       Helper
       --------------------------------------------------------------------- */
    function $(selector, context) { return (context || doc).querySelector(selector); }
    function $$(selector, context) { return Array.prototype.slice.call((context || doc).querySelectorAll(selector)); }

    var reduceMotion = win.matchMedia ? win.matchMedia('(prefers-reduced-motion: reduce)').matches : false;
    var desktopNav = win.matchMedia ? win.matchMedia('(min-width: 1200px)') : null;

    var store = {
        get: function (key) { try { return win.sessionStorage.getItem(key); } catch (e) { return null; } },
        set: function (key, value) { try { win.sessionStorage.setItem(key, value); } catch (e) { /* storage tidak tersedia */ } }
    };

    function onMediaChange(query, handler) {
        if (!query) { return; }
        if (query.addEventListener) { query.addEventListener('change', handler); }
        else if (query.addListener) { query.addListener(handler); }
    }

    function rafThrottle(fn) {
        var ticking = false;
        return function () {
            if (ticking) { return; }
            ticking = true;
            win.requestAnimationFrame(function () { ticking = false; fn(); });
        };
    }

    function navbarHeight() {
        var bar = $('[data-cp-navbar]');
        return bar ? bar.offsetHeight : 0;
    }

    /* ---------------------------------------------------------------------
       Navbar: menu mobile, bayangan saat scroll, scroll-spy
       --------------------------------------------------------------------- */
    function initNavbar() {
        var bar = $('[data-cp-navbar]');
        var nav = $('[data-cp-nav]');
        var toggle = $('[data-cp-nav-toggle]');
        if (!bar || !nav) { return; }

        function setOpen(open) {
            nav.classList.toggle('is-open', open);
            if (toggle) {
                toggle.setAttribute('aria-expanded', open ? 'true' : 'false');
                toggle.setAttribute('aria-label', open ? 'Tutup menu' : 'Buka menu');
            }
        }

        if (toggle) {
            toggle.addEventListener('click', function () {
                setOpen(!nav.classList.contains('is-open'));
            });
        }

        // Tutup menu saat tautan dipilih, Esc ditekan, klik di luar, atau layar melebar.
        nav.addEventListener('click', function (event) {
            if (event.target.closest('a')) { setOpen(false); }
        });
        doc.addEventListener('keydown', function (event) {
            if (event.key === 'Escape' && nav.classList.contains('is-open')) {
                setOpen(false);
                if (toggle) { toggle.focus(); }
            }
        });
        doc.addEventListener('click', function (event) {
            if (nav.classList.contains('is-open') && !bar.contains(event.target)) { setOpen(false); }
        });
        onMediaChange(desktopNav, function (e) { if (e.matches) { setOpen(false); } });

        // Bayangan navbar saat halaman di-scroll
        var updateScrolled = function () { bar.classList.toggle('is-scrolled', win.scrollY > 8); };
        win.addEventListener('scroll', rafThrottle(updateScrolled), { passive: true });
        updateScrolled();

        // Scroll-spy: hanya untuk tautan anchor (#id) yang targetnya ada di halaman ini.
        // Tautan ke halaman lain (Tentang Kami, Portofolio) diberi tanda aktif oleh Blade.
        var links = $$('[data-cp-spy]', nav);
        var targets = links.map(function (link) {
            var id = (link.getAttribute('href') || '').replace('#', '');
            return { id: id, link: link, el: id ? doc.getElementById(id) : null };
        }).filter(function (item) { return item.el; });
        if (!targets.length) { return; }

        var lockedId = null;
        var lockUntil = 0;

        function setActive(id) {
            targets.forEach(function (item) {
                var active = item.id === id;
                item.link.classList.toggle('is-active', active);
                if (active) { item.link.setAttribute('aria-current', 'location'); }
                else { item.link.removeAttribute('aria-current'); }
            });
        }

        function updateSpy() {
            var probe = navbarHeight() + win.innerHeight * 0.3;
            var hits = targets.filter(function (item) {
                var rect = item.el.getBoundingClientRect();
                return rect.top <= probe && rect.bottom > probe;
            });

            var atBottom = win.innerHeight + win.scrollY >= doc.documentElement.scrollHeight - 4;
            var chosen = null;

            if (lockedId && Date.now() < lockUntil) { chosen = lockedId; }
            else {
                var lockedHit = hits.filter(function (item) { return item.id === lockedId; })[0];
                if (lockedHit) { chosen = lockedHit.id; }
                else { lockedId = null; chosen = hits.length ? hits[0].id : null; }
            }
            if (atBottom && !lockedId) { chosen = targets[targets.length - 1].id; }
            if (chosen) { setActive(chosen); }
        }

        links.forEach(function (link) {
            link.addEventListener('click', function () {
                lockedId = (link.getAttribute('href') || '').replace('#', '');
                lockUntil = Date.now() + 900;
                setActive(lockedId);
            });
        });

        win.addEventListener('scroll', rafThrottle(updateSpy), { passive: true });
        win.addEventListener('resize', rafThrottle(updateSpy));
        updateSpy();
    }

    /* ---------------------------------------------------------------------
       Pencarian situs (melompat ke halaman / bagian yang cocok)
       --------------------------------------------------------------------- */
    function initSearch() {
        var toggle = $('[data-cp-search-toggle]');
        var panel = $('[data-cp-search-panel]');
        var input = $('[data-cp-search-input]');
        var results = $('[data-cp-search-results]');
        var empty = $('[data-cp-search-empty]');
        var form = $('[data-cp-search-form]');
        if (!toggle || !panel || !input || !results) { return; }

        // Indeks pencarian lintas halaman dibaca dari <script id="cp-search-data"> di layout.
        var index = [];
        try {
            var dataNode = doc.getElementById('cp-search-data');
            index = JSON.parse(dataNode ? dataNode.textContent : '[]');
        } catch (e) { index = []; }

        function setOpen(open) {
            panel.hidden = !open;
            toggle.setAttribute('aria-expanded', open ? 'true' : 'false');
            if (open) { input.focus(); render(input.value); }
        }

        function render(query) {
            var q = query.trim().toLowerCase();
            results.textContent = '';
            if (empty) { empty.hidden = true; }
            if (!q) { return; }

            var seen = {};
            var matches = index.filter(function (item) {
                var key = item.label + '|' + item.href;
                if (seen[key] || item.label.toLowerCase().indexOf(q) === -1) { return false; }
                seen[key] = true;
                return true;
            }).slice(0, 6);

            if (!matches.length) {
                if (empty) { empty.textContent = 'Tidak ada hasil untuk "' + query.trim() + '".'; empty.hidden = false; }
                return;
            }

            matches.forEach(function (item) {
                var li = doc.createElement('li');
                var a = doc.createElement('a');
                var group = doc.createElement('span');
                a.href = item.href;
                a.appendChild(doc.createTextNode(item.label));
                group.className = 'cp-search__group';
                group.textContent = item.group || '';
                a.appendChild(group);
                li.appendChild(a);
                results.appendChild(li);
            });
        }

        toggle.addEventListener('click', function () { setOpen(panel.hidden); });

        input.addEventListener('input', function () { render(input.value); });

        if (form) {
            form.addEventListener('submit', function (event) {
                event.preventDefault();
                var first = $('a', results);
                if (first) { first.click(); }
            });
        }

        results.addEventListener('click', function (event) {
            if (event.target.closest('a')) { setOpen(false); input.value = ''; }
        });

        doc.addEventListener('keydown', function (event) {
            if (event.key === 'Escape' && !panel.hidden) { setOpen(false); toggle.focus(); }
        });
        doc.addEventListener('click', function (event) {
            if (!panel.hidden && !panel.contains(event.target) && !toggle.contains(event.target)) { setOpen(false); }
        });
    }

    /* ---------------------------------------------------------------------
       Dialog video profil
       Isi $company['video_url'] di Blade dengan URL .mp4 atau YouTube.
       --------------------------------------------------------------------- */
    function initVideo() {
        var dialog = $('[data-cp-video-dialog]');
        var stage = $('[data-cp-video-stage]');
        var openers = $$('[data-cp-video-open]');
        if (!dialog || !stage || !openers.length) { return; }

        function youtubeEmbed(url) {
            var match = url.match(/(?:youtube\.com\/(?:watch\?v=|embed\/)|youtu\.be\/)([\w-]{6,})/);
            return match ? 'https://www.youtube-nocookie.com/embed/' + match[1] + '?autoplay=1&rel=0' : null;
        }

        function buildMedia(src) {
            var node;
            var embed = src ? youtubeEmbed(src) : null;
            if (embed) {
                node = doc.createElement('iframe');
                node.src = embed;
                node.title = 'Video profil perusahaan';
                node.allow = 'autoplay; encrypted-media; picture-in-picture; fullscreen';
                node.allowFullscreen = true;
            } else if (src) {
                node = doc.createElement('video');
                node.src = src;
                node.controls = true;
                node.autoplay = true;
                node.playsInline = true;
            } else {
                node = doc.createElement('p');
                node.className = 'cp-dialog__note';
                node.textContent = 'Video profil perusahaan akan ditampilkan di sini.';
            }
            return node;
        }

        function open(event) {
            stage.textContent = '';
            stage.appendChild(buildMedia(dialog.getAttribute('data-src')));
            if (typeof dialog.showModal === 'function') { dialog.showModal(); }
            else { dialog.setAttribute('open', ''); }
            dialog._opener = event.currentTarget;
        }

        function close() {
            if (typeof dialog.close === 'function') { dialog.close(); }
            else { dialog.removeAttribute('open'); cleanup(); }
        }

        function cleanup() {
            stage.textContent = ''; // menghentikan pemutaran video / iframe
            if (dialog._opener && dialog._opener.focus) { dialog._opener.focus(); }
        }

        openers.forEach(function (btn) { btn.addEventListener('click', open); });
        $$('[data-cp-video-close]', dialog).forEach(function (btn) { btn.addEventListener('click', close); });
        dialog.addEventListener('close', cleanup);
        dialog.addEventListener('click', function (event) { if (event.target === dialog) { close(); } });
    }

    /* ---------------------------------------------------------------------
       Carousel klien (scroll-snap + tombol panah)
       --------------------------------------------------------------------- */
    function initClients() {
        var viewport = $('[data-cp-clients]');
        var prev = $('[data-cp-clients-prev]');
        var next = $('[data-cp-clients-next]');
        if (!viewport || !prev || !next) { return; }

        function update() {
            var max = viewport.scrollWidth - viewport.clientWidth;
            prev.disabled = max <= 1 || viewport.scrollLeft <= 1;
            next.disabled = max <= 1 || viewport.scrollLeft >= max - 1;
        }

        function scrollByPage(direction) {
            viewport.scrollBy({ left: direction * viewport.clientWidth, behavior: reduceMotion ? 'auto' : 'smooth' });
        }

        prev.addEventListener('click', function () { scrollByPage(-1); });
        next.addEventListener('click', function () { scrollByPage(1); });
        viewport.addEventListener('scroll', rafThrottle(update), { passive: true });
        viewport.addEventListener('keydown', function (event) {
            if (event.key === 'ArrowRight') { scrollByPage(1); }
            if (event.key === 'ArrowLeft') { scrollByPage(-1); }
        });
        win.addEventListener('resize', rafThrottle(update));
        if ('ResizeObserver' in win) { new win.ResizeObserver(update).observe(viewport); }
        update();
    }

    /* ---------------------------------------------------------------------
       Formulir penawaran (quotation lead)
       - Validasi sisi klien dengan pesan error yang jelas.
       - Setelah valid, isian disusun menjadi pesan dan WhatsApp dibuka (wa.me)
         ke nomor di config (whatsapp.number). Tidak ada pengiriman ke backend.
       --------------------------------------------------------------------- */
    function initQuoteForm() {
        var form = $('[data-cp-quote-form]');
        if (!form) { return; }
        var status = $('[data-cp-form-status]', form);
        var success = $('[data-cp-quote-success]');
        var resetBtn = $('[data-cp-quote-reset]');
        var counter = $('[data-cp-counter]');
        var submitBtn = $('.cp-form__submit', form);
        var submitText = $('.cp-form__submit-text', form);
        var submitLabel = submitText ? submitText.textContent : '';
        var reopen = $('[data-cp-wa-reopen]');
        var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]{2,}$/;

        // Susun isi pesan WhatsApp dari isian form, lalu kembalikan URL wa.me lengkap.
        function buildWhatsAppUrl() {
            var base = form.getAttribute('data-cp-wa');
            if (!base) { return ''; }
            var lines = [
                form.getAttribute('data-cp-wa-greeting') || 'Halo, saya ingin meminta penawaran.',
                '',
                'Nama: ' + valueOf('name'),
                'Email: ' + valueOf('email'),
                'Layanan: ' + valueOf('service'),
                'Pesan: ' + valueOf('message')
            ];
            return base + '?text=' + encodeURIComponent(lines.join('\n'));
        }

        var rules = {
            name: function (v) {
                if (!v) { return 'Nama lengkap wajib diisi.'; }
                if (v.length < 2) { return 'Nama minimal 2 karakter.'; }
                return '';
            },
            email: function (v) {
                if (!v) { return 'Email wajib diisi.'; }
                if (!emailPattern.test(v)) { return 'Format email belum benar, contoh: nama@perusahaan.com.'; }
                return '';
            },
            service: function (v) { return v ? '' : 'Pilih jenis layanan yang Anda butuhkan.'; },
            message: function (v) {
                if (!v) { return 'Detail kebutuhan wajib diisi.'; }
                if (v.length < 10) { return 'Ceritakan kebutuhan Anda minimal 10 karakter.'; }
                return '';
            }
        };
        var names = Object.keys(rules);

        // "service" berupa grup radio: pembungkusnya adalah <fieldset id="cp-q-service">.
        function control(name) { return name === 'service' ? doc.getElementById('cp-q-service') : form.elements[name]; }

        function valueOf(name) {
            if (name === 'service') {
                var checked = form.querySelector('input[name="service"]:checked');
                return checked ? checked.value : '';
            }
            var el = form.elements[name];
            return el ? el.value.trim() : '';
        }

        function showError(name, message) {
            var el = control(name);
            var error = doc.getElementById('cp-q-' + name + '-error');
            if (!el) { return; }
            el.setAttribute('aria-invalid', message ? 'true' : 'false');
            if (!error) { return; }
            error.textContent = message;
            error.hidden = !message;
        }

        function validateField(name) {
            var message = rules[name](valueOf(name));
            showError(name, message);
            return message;
        }

        function focusField(name) {
            var el = name === 'service' ? form.querySelector('input[name="service"]') : form.elements[name];
            if (el) { el.focus(); }
        }

        function setStatus(message, type) {
            if (!status) { return; }
            status.textContent = message;
            status.className = 'cp-form__status' + (type ? ' is-' + type : '');
        }

        function setLoading(loading) {
            form.classList.toggle('is-loading', loading);
            form.setAttribute('aria-busy', loading ? 'true' : 'false');
            if (submitBtn) { submitBtn.disabled = loading; }
            if (submitText) { submitText.textContent = loading ? 'Mengirim...' : submitLabel; }
        }

        function updateCounter() {
            var area = form.elements.message;
            if (counter && area) { counter.textContent = area.value.length + '/' + (area.maxLength > 0 ? area.maxLength : 2000); }
        }

        function resetForm() {
            form.reset();
            names.forEach(function (name) { showError(name, ''); });
            setStatus('', '');
            updateCounter();
        }

        names.forEach(function (name) {
            if (name === 'service') {
                $$('input[name="service"]', form).forEach(function (radio) {
                    radio.addEventListener('change', function () { validateField('service'); });
                });
                return;
            }
            var el = form.elements[name];
            if (!el) { return; }
            el.addEventListener('blur', function () { validateField(name); });
            el.addEventListener('input', function () {
                if (el.getAttribute('aria-invalid') === 'true') { validateField(name); }
            });
        });
        if (form.elements.message) { form.elements.message.addEventListener('input', updateCounter); }

        form.addEventListener('submit', function (event) {
            event.preventDefault();
            setStatus('', '');

            var firstInvalid = '';
            names.forEach(function (name) {
                if (validateField(name) && !firstInvalid) { firstInvalid = name; }
            });
            if (firstInvalid) {
                setStatus('Periksa kembali isian yang ditandai.', 'error');
                focusField(firstInvalid);
                return;
            }

            // Honeypot: bot mengisi kolom tersembunyi, tampilkan sukses tanpa membuka WhatsApp.
            var honey = form.elements.website;
            var isBot = !!(honey && honey.value);

            var waUrl = isBot ? '' : buildWhatsAppUrl();
            setLoading(true);

            // Buka WhatsApp langsung di dalam klik pengguna agar tidak diblokir pop-up blocker.
            if (waUrl) {
                var popup = win.open(waUrl, '_blank');
                if (popup) { popup.opener = null; }
                else { win.location.href = waUrl; } // pop-up diblokir: buka di tab ini
            }

            win.setTimeout(function () {
                setLoading(false);
                if (reopen && waUrl) { reopen.href = waUrl; }
                resetForm();
                if (success) {
                    form.hidden = true;
                    success.hidden = false;
                    success.focus({ preventScroll: true });
                } else {
                    setStatus('WhatsApp dibuka dengan pesan Anda. Tekan Kirim di WhatsApp untuk mengirimnya.', 'success');
                }
            }, reduceMotion ? 0 : 500);
        });

        if (resetBtn) {
            resetBtn.addEventListener('click', function () {
                if (success) { success.hidden = true; }
                form.hidden = false;
                focusField('name');
            });
        }

        // Tombol "Minta Penawaran": setelah menggulir, fokuskan kolom pertama.
        $$('[data-cp-focus-quote]').forEach(function (link) {
            link.addEventListener('click', function () {
                if (form.hidden) { return; }
                win.setTimeout(function () {
                    var first = form.elements.name;
                    if (first) { first.focus({ preventScroll: true }); }
                }, reduceMotion ? 0 : 650);
            });
        });

        updateCounter();
    }

    /* ---------------------------------------------------------------------
       AI Assistant — FAQ perusahaan (statis)
       Data jawaban dibaca dari <script id="cp-faq-data">. Tidak memakai
       innerHTML sehingga aman dari injeksi; siap diganti ke endpoint backend.
       --------------------------------------------------------------------- */
    function initAssistant() {
        var root = $('[data-cp-ai]');
        var panel = $('[data-cp-ai-panel]');
        var toggle = $('[data-cp-ai-toggle]');
        var closeBtn = $('[data-cp-ai-close]');
        var log = $('[data-cp-ai-log]');
        var form = $('[data-cp-ai-form]');
        var input = $('[data-cp-ai-input]');
        var dataNode = doc.getElementById('cp-faq-data');
        if (!root || !panel || !toggle || !log || !form || !input) { return; }

        var teaser = $('[data-cp-ai-teaser]');
        var faq = [];
        try { faq = JSON.parse(dataNode ? dataNode.textContent : '[]'); } catch (e) { faq = []; }

        var fallback = {
            answer: 'Maaf, saya belum menemukan jawaban untuk itu. Anda bisa menanyakannya langsung ke tim kami lewat WhatsApp.',
            link: { href: doc.getElementById('kontak') ? '#kontak' : '/', label: 'Lihat kontak kami' }
        };

        function hideTeaser() {
            if (teaser) { teaser.hidden = true; }
            store.set('cp-ai-teaser', '1');
        }

        function setOpen(open, options) {
            options = options || {};
            panel.hidden = !open;
            toggle.setAttribute('aria-expanded', open ? 'true' : 'false');
            toggle.setAttribute('aria-label', open ? 'Tutup AI Assistant' : 'Buka AI Assistant');
            if (open && options.focus !== false) { input.focus(); }
            if (!open && options.remember) { store.set('cp-ai-dismissed', '1'); }
            if (open) { hideTeaser(); scrollLog(); }
        }

        function scrollLog() { log.scrollTop = log.scrollHeight; }

        function addMessage(role, text, link) {
            var msg = doc.createElement('div');
            var p = doc.createElement('p');
            msg.className = 'cp-ai__msg cp-ai__msg--' + role;
            p.textContent = text;
            msg.appendChild(p);
            if (link && link.href) {
                var a = doc.createElement('a');
                a.href = link.href;
                a.textContent = link.label;
                if (link.external) { a.target = '_blank'; a.rel = 'noopener noreferrer'; }
                msg.appendChild(a);
            }
            log.appendChild(msg);
            scrollLog();
            return msg;
        }

        function typingIndicator() {
            var msg = doc.createElement('div');
            var dots = doc.createElement('span');
            msg.className = 'cp-ai__msg cp-ai__msg--bot';
            dots.className = 'cp-ai__typing';
            dots.setAttribute('aria-label', 'AI Assistant sedang mengetik');
            dots.innerHTML = '<span></span><span></span><span></span>'; // markup statis, tanpa data pengguna
            msg.appendChild(dots);
            log.appendChild(msg);
            scrollLog();
            return msg;
        }

        function findAnswer(query) {
            var q = query.toLowerCase();
            var best = null;
            var bestScore = 0;
            faq.forEach(function (entry) {
                var score = 0;
                (entry.keywords || []).forEach(function (word) { if (q.indexOf(word) !== -1) { score += 1; } });
                if (score > bestScore) { best = entry; bestScore = score; }
            });
            return best || fallback;
        }

        function reply(entry) {
            var wait = reduceMotion ? 0 : 550;
            var typing = typingIndicator();
            win.setTimeout(function () {
                typing.remove();
                addMessage('bot', entry.answer, entry.link);
            }, wait);
        }

        function ask(text, entry) {
            var clean = text.trim();
            if (!clean) { return; }
            addMessage('user', clean);
            var result = entry || findAnswer(clean);
            var waBase = root.getAttribute('data-wa');
            if (result === fallback && waBase) {
                result = {
                    answer: fallback.answer,
                    link: { href: waBase + '?text=' + encodeURIComponent('Halo Nusantara Kreasi, saya ingin bertanya: ' + clean), label: 'Tanya via WhatsApp', external: true }
                };
            }
            reply(result);
        }

        form.addEventListener('submit', function (event) {
            event.preventDefault();
            ask(input.value);
            input.value = '';
            input.focus();
        });

        $$('[data-cp-ai-chip]', log).forEach(function (chip) {
            chip.addEventListener('click', function () {
                var id = chip.getAttribute('data-cp-ai-chip');
                var entry = faq.filter(function (item) { return item.id === id; })[0];
                ask(chip.textContent, entry);
            });
        });

        // Link jawaban: gulir ke bagian lalu biarkan panel tetap terbuka.
        log.addEventListener('click', function (event) {
            if (event.target.closest('a') && win.innerWidth < 760) { setOpen(false); }
        });

        toggle.addEventListener('click', function () { setOpen(panel.hidden); });
        // Gelembung sapaan di samping tombol robot: muncul sekali per sesi, hilang sendiri.
        if (teaser) {
            teaser.addEventListener('click', function () { setOpen(true); });
            if (!store.get('cp-ai-teaser')) {
                win.setTimeout(function () {
                    if (!panel.hidden) { return; }
                    teaser.hidden = false;
                    win.setTimeout(hideTeaser, 9000);
                }, 3500);
            }
        }
        if (closeBtn) { closeBtn.addEventListener('click', function () { setOpen(false, { remember: true }); toggle.focus(); }); }
        doc.addEventListener('keydown', function (event) {
            if (event.key === 'Escape' && !panel.hidden && root.contains(doc.activeElement)) {
                setOpen(false, { remember: true });
                toggle.focus();
            }
        });

        // Buka otomatis di desktop (sesuai desain), sekali per sesi.
        // Ubah data-autoopen="off" pada elemen <aside data-cp-ai> untuk menonaktifkan.
        var autoOpen = root.getAttribute('data-autoopen');
        if (autoOpen === 'desktop' && win.matchMedia && win.matchMedia('(min-width: 1280px)').matches && !store.get('cp-ai-dismissed')) {
            win.setTimeout(function () { if (panel.hidden) { setOpen(true, { focus: false }); } }, 1200);
        }
    }

    /* ---------------------------------------------------------------------
       Init
       --------------------------------------------------------------------- */
    function init() {
        initNavbar();
        initSearch();
        initVideo();
        initClients();
        initQuoteForm();
        initAssistant();
    }

    if (doc.readyState === 'loading') { doc.addEventListener('DOMContentLoaded', init); }
    else { init(); }
})();
