/* ==========================================================================
   Klinik Kecantikan — GlowAesthetics (Professional / Clean White)
   Vanilla JS, tanpa dependensi. Data dibaca dari <script id="gl-data"> (dari config).
   Modul : navbar · pencarian · jadwal · modal peta · form appointment
           · accordion · scrollspy kebijakan · asisten AI
   ========================================================================== */
(function () {
    'use strict';

    /* ---------- Util ---------- */
    var $  = function (sel, ctx) { return (ctx || document).querySelector(sel); };
    var $$ = function (sel, ctx) { return Array.prototype.slice.call((ctx || document).querySelectorAll(sel)); };

    var DATA = {};
    try { DATA = JSON.parse(($('#gl-data') || {}).textContent || '{}'); } catch (e) { DATA = {}; }

    var reduceMotion = window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches;

    function el(tag, attrs, children) {
        var node = document.createElement(tag);
        Object.keys(attrs || {}).forEach(function (k) {
            if (k === 'text') { node.textContent = attrs[k]; }
            else if (k === 'class') { node.className = attrs[k]; }
            else { node.setAttribute(k, attrs[k]); }
        });
        (children || []).forEach(function (c) { if (c) { node.appendChild(c); } });
        return node;
    }

    function parseISO(value) {
        var m = /^(\d{4})-(\d{2})-(\d{2})$/.exec(value || '');
        return m ? new Date(+m[1], +m[2] - 1, +m[3]) : null;
    }

    function fmtDate(d) {
        return (DATA.weekdays || [])[d.getDay()] + ', ' + d.getDate() + ' ' + (DATA.months || [])[d.getMonth()] + ' ' + d.getFullYear();
    }

    function norm(s) { return String(s || '').toLowerCase().normalize('NFD').replace(/[\u0300-\u036f]/g, ''); }

    function waLink(text) {
        var c = DATA.contact || {};
        return 'https://wa.me/' + c.whatsapp + (text ? '?text=' + encodeURIComponent(text) : '');
    }

    /* ---------- 1. Navbar, panel cari & notifikasi ---------- */
    function initHeader() {
        var header = $('[data-gl-navbar]');
        if (!header) { return; }

        var nav   = $('[data-gl-nav]', header);
        var panels = { search: $('[data-gl-panel="search"]', header), notif: $('[data-gl-panel="notif"]', header) };
        var toggles = $$('[data-gl-toggle]', header);

        function setScrolled() { header.classList.toggle('is-scrolled', window.scrollY > 8); }
        setScrolled();
        window.addEventListener('scroll', setScrolled, { passive: true });

        function closeAll(except) {
            toggles.forEach(function (btn) {
                var key = btn.getAttribute('data-gl-toggle');
                if (key === except) { return; }
                btn.setAttribute('aria-expanded', 'false');
                if (key === 'menu') { nav.classList.remove('is-open'); btn.setAttribute('aria-label', 'Buka menu'); }
                else if (panels[key]) { panels[key].hidden = true; }
            });
        }

        toggles.forEach(function (btn) {
            btn.addEventListener('click', function () {
                var key  = btn.getAttribute('data-gl-toggle');
                var open = btn.getAttribute('aria-expanded') !== 'true';
                closeAll(key);
                btn.setAttribute('aria-expanded', String(open));

                if (key === 'menu') {
                    nav.classList.toggle('is-open', open);
                    btn.setAttribute('aria-label', open ? 'Tutup menu' : 'Buka menu');
                } else if (panels[key]) {
                    panels[key].hidden = !open;
                    if (open && key === 'search') {
                        var input = $('[data-gl-search-input]', panels.search);
                        if (input) { input.focus(); renderSearch(''); }
                    }
                }
            });
        });

        document.addEventListener('keydown', function (e) {
            if (e.key === 'Escape') { closeAll(); }
        });
        document.addEventListener('click', function (e) {
            if (!header.contains(e.target)) { closeAll(); }
        });
        $$('a', nav).forEach(function (a) { a.addEventListener('click', function () { closeAll(); }); });

        window.addEventListener('resize', function () { if (window.innerWidth >= 1100) { closeAll(); } });

        /* Pencarian sisi-klien */
        var index = [];
        var R = DATA.routes || {};
        [
            ['Beranda', R.home, 'Halaman', 'beranda utama home'],
            ['Layanan', R.services, 'Halaman', 'layanan perawatan treatment harga'],
            ['Dokter & Staff', R.doctors, 'Halaman', 'dokter staff tim perawat therapist'],
            ['Jadwal Praktik', R.schedule, 'Halaman', 'jadwal praktik slot jam'],
            ['Lokasi Klinik', R.home + '#lokasi', 'Halaman', 'lokasi alamat peta maps'],
            ['Booking Appointment', R.appointment, 'Halaman', 'appointment booking janji temu reservasi'],
            ['FAQ', R.faq, 'Halaman', 'faq pertanyaan bantuan'],
            ['Kebijakan', R.policy, 'Halaman', 'kebijakan privasi syarat ketentuan pembatalan']
        ].forEach(function (p) { index.push({ label: p[0], href: p[1], type: p[2], keys: norm(p[0] + ' ' + p[3]) }); });
        (DATA.services || []).forEach(function (s) {
            index.push({ label: s.name, href: R.services + '#' + s.slug, type: 'Layanan', keys: norm(s.name + ' ' + s.short) });
        });
        (DATA.doctors || []).forEach(function (d) {
            index.push({ label: d.name, href: R.doctors + '#' + d.id, type: d.role, keys: norm(d.name + ' ' + d.role) });
        });
        (DATA.policies || []).forEach(function (p) {
            index.push({ label: p.title, href: R.policy + '#' + p.slug, type: 'Kebijakan', keys: norm(p.title) });
        });

        var results = $('[data-gl-search-results]');
        function renderSearch(q) {
            if (!results) { return; }
            results.textContent = '';
            var query = norm(q).trim();
            var found = query ? index.filter(function (i) { return i.keys.indexOf(query) !== -1; }) : index.slice(0, 8);
            if (!found.length) {
                results.appendChild(el('li', { class: 'gl-search__empty', text: 'Tidak ada hasil untuk "' + q + '".' }));
                return;
            }
            found.slice(0, 8).forEach(function (i) {
                var a = el('a', { href: i.href }, [el('span', { text: i.label }), el('small', { text: i.type })]);
                results.appendChild(el('li', {}, [a]));
            });
        }
        var searchInput = $('[data-gl-search-input]');
        if (searchInput) { searchInput.addEventListener('input', function () { renderSearch(searchInput.value); }); }
    }

    /* ---------- 2. Kembali ke atas ---------- */
    function initBackToTop() {
        $$('[data-gl-top]').forEach(function (a) {
            a.addEventListener('click', function (e) {
                e.preventDefault();
                window.scrollTo({ top: 0, behavior: reduceMotion ? 'auto' : 'smooth' });
            });
        });
    }

    /* ---------- 3. Jadwal praktik ---------- */
    function initSchedule() {
        $$('[data-gl-schedule]').forEach(function (root) {
            var full   = root.getAttribute('data-mode') === 'full';
            var label  = $('[data-gl-date-label]', root);
            var input  = $('[data-gl-date-input]', root);
            var list   = $('[data-gl-slots]', root);
            var days   = $$('[data-gl-day]', root);
            var docs   = {};
            (DATA.doctors || []).forEach(function (d) { docs[d.id] = d; });

            function render(date) {
                if (!date || !list) { return; }
                if (label) { label.textContent = fmtDate(date); }
                var slots = (DATA.schedule || {})[date.getDay()] || [];
                if (!full) { slots = slots.slice(0, 3); }
                list.textContent = '';

                if (!slots.length) {
                    list.appendChild(el('li', { class: 'gl-slots__empty', text: 'Belum ada jadwal praktik pada tanggal ini.' }));
                    return;
                }

                var iso = date.getFullYear() + '-' + String(date.getMonth() + 1).padStart(2, '0') + '-' + String(date.getDate()).padStart(2, '0');

                slots.forEach(function (s) {
                    var doc    = docs[s.doctor] || { name: '', role: '', id: '' };
                    var isFull = s.status === 'full';
                    var li = el('li', { class: 'gl-slot' + (isFull ? ' is-full' : '') }, [
                        el('p', { class: 'gl-slot__time', text: s.time }),
                        el('p', { class: 'gl-slot__doctor', text: doc.name }),
                        el('p', { class: 'gl-slot__role', text: doc.role }),
                        el('span', { class: 'gl-status' + (isFull ? ' gl-status--full' : ''), text: isFull ? 'Penuh' : 'Tersedia' })
                    ]);
                    if (full && !isFull) {
                        var url = (DATA.routes || {}).appointment + '?dokter=' + encodeURIComponent(doc.id) +
                                  '&tanggal=' + iso + '&jam=' + encodeURIComponent(s.time.slice(0, 5));
                        li.appendChild(el('a', { class: 'gl-btn gl-btn--primary gl-btn--xs', href: url, text: 'Booking' }));
                    }
                    list.appendChild(li);
                });
            }

            function markDay(iso) {
                days.forEach(function (b) {
                    var on = b.getAttribute('data-gl-day') === iso;
                    b.classList.toggle('is-active', on);
                    b.setAttribute('aria-pressed', on ? 'true' : 'false');
                });
            }

            if (input) {
                var wrap = input.closest('label');
                if (wrap) {
                    wrap.addEventListener('click', function () {
                        if (typeof input.showPicker === 'function') { try { input.showPicker(); } catch (err) { input.focus(); } }
                    });
                }
                input.addEventListener('change', function () {
                    var d = parseISO(input.value);
                    if (d) { render(d); markDay(input.value); }
                });
            }

            days.forEach(function (btn) {
                btn.addEventListener('click', function () {
                    var iso = btn.getAttribute('data-gl-day');
                    var d = parseISO(iso);
                    if (!d) { return; }
                    if (input) { input.value = iso; }
                    markDay(iso);
                    render(d);
                });
            });
        });
    }

    /* ---------- 4. Modal peta ---------- */
    function initModal() {
        var lastFocus = null;

        function open(name) {
            var modal = $('[data-gl-modal="' + name + '"]');
            if (!modal) { return; }
            lastFocus = document.activeElement;
            modal.hidden = false;
            document.body.classList.add('gl-modal-open');
            var frame = $('iframe[data-src]', modal);
            if (frame && !frame.getAttribute('src')) { frame.setAttribute('src', frame.getAttribute('data-src')); }
            var close = $('[data-gl-modal-close].gl-iconbtn', modal) || $('[data-gl-modal-close]', modal);
            if (close) { close.focus(); }
        }

        function close(modal) {
            modal.hidden = true;
            document.body.classList.remove('gl-modal-open');
            if (lastFocus && lastFocus.focus) { lastFocus.focus(); }
        }

        $$('[data-gl-modal-open]').forEach(function (btn) {
            btn.addEventListener('click', function () { open(btn.getAttribute('data-gl-modal-open')); });
        });
        $$('[data-gl-modal]').forEach(function (modal) {
            $$('[data-gl-modal-close]', modal).forEach(function (c) { c.addEventListener('click', function () { close(modal); }); });
            modal.addEventListener('keydown', function (e) {
                if (e.key === 'Escape') { close(modal); return; }
                if (e.key !== 'Tab') { return; }
                var f = $$('a[href], button:not([disabled]), iframe', modal);
                if (!f.length) { return; }
                var first = f[0], last = f[f.length - 1];
                if (e.shiftKey && document.activeElement === first) { e.preventDefault(); last.focus(); }
                else if (!e.shiftKey && document.activeElement === last) { e.preventDefault(); first.focus(); }
            });
        });
    }

    /* ---------- 5. Form appointment → WhatsApp ---------- */
    function initAppointmentForm() {
        var form = $('[data-gl-appt-form]');
        if (!form) { return; }
        var status = $('[data-gl-form-status]', form);

        function setError(name, message) {
            var box   = $('[data-error-for="' + name + '"]', form);
            var field = form.elements[name];
            if (box) { box.textContent = message || ''; }
            if (field) {
                if (message) { field.setAttribute('aria-invalid', 'true'); } else { field.removeAttribute('aria-invalid'); }
            }
        }

        function optionText(select) {
            return select && select.value ? select.options[select.selectedIndex].text : '';
        }

        function validate() {
            var f = form.elements, ok = true, firstBad = null;
            function bad(name, msg) { setError(name, msg); ok = false; if (!firstBad) { firstBad = f[name]; } }

            ['nama', 'whatsapp', 'email', 'layanan', 'tanggal', 'jam', 'setuju'].forEach(function (n) { setError(n, ''); });

            if (f.nama.value.trim().length < 2) { bad('nama', 'Nama lengkap wajib diisi.'); }

            var phone = f.whatsapp.value.replace(/[\s\-().]/g, '');
            if (!phone) { bad('whatsapp', 'No. WhatsApp wajib diisi.'); }
            else if (!/^(\+62|62|0)8\d{7,12}$/.test(phone)) { bad('whatsapp', 'Gunakan format nomor Indonesia, mis. 081234567890.'); }

            if (f.email.value && !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(f.email.value)) { bad('email', 'Format email belum benar.'); }
            if (!f.layanan.value) { bad('layanan', 'Pilih layanan terlebih dahulu.'); }

            var date = parseISO(f.tanggal.value);
            var today = new Date(); today.setHours(0, 0, 0, 0);
            if (!date) { bad('tanggal', 'Pilih tanggal kunjungan.'); }
            else if (date < today) { bad('tanggal', 'Tanggal tidak boleh sebelum hari ini.'); }

            if (!f.jam.value) { bad('jam', 'Pilih jam kunjungan.'); }
            if (!f.setuju.checked) { bad('setuju', 'Anda perlu menyetujui kebijakan sebelum mengirim.'); }

            if (firstBad) { firstBad.focus(); }
            return ok;
        }

        form.addEventListener('submit', function (e) {
            e.preventDefault();
            if (!validate()) { return; }

            var f = form.elements;
            var date = parseISO(f.tanggal.value);
            var lines = [
                'Halo ' + (DATA.brand || 'klinik') + ', saya ingin membuat janji temu.',
                '',
                'Nama: ' + f.nama.value.trim(),
                'No. WhatsApp: ' + f.whatsapp.value.trim()
            ];
            if (f.email.value.trim()) { lines.push('Email: ' + f.email.value.trim()); }
            lines.push('Layanan: ' + optionText(f.layanan));
            lines.push('Dokter/staf: ' + (optionText(f.dokter) || 'Tidak ada preferensi'));
            lines.push('Tanggal: ' + fmtDate(date));
            lines.push('Jam: ' + f.jam.value);
            if (f.catatan.value.trim()) { lines.push('Catatan: ' + f.catatan.value.trim()); }

            var win = window.open(waLink(lines.join('\n')), '_blank', 'noopener');
            if (!win) { window.location.href = waLink(lines.join('\n')); }

            if (status) {
                status.hidden = false;
                status.textContent = 'Terima kasih! WhatsApp admin klinik dibuka dengan data booking Anda. Kirim pesan tersebut untuk menyelesaikan booking.';
            }
        });

        form.addEventListener('input', function (e) {
            var t = e.target;
            if (t && t.name) { setError(t.name, ''); }
        });
    }

    /* ---------- 5b. Form booking singkat di beranda → WhatsApp ---------- */
    function initMiniForm() {
        var form = $('[data-gl-wa-mini]');
        if (!form) { return; }
        var status = $('[data-gl-form-status]', form);

        function setError(name, message) {
            var box = $('[data-error-for="' + name + '"]', form);
            var field = form.elements[name];
            if (box) { box.textContent = message || ''; }
            if (field) { if (message) { field.setAttribute('aria-invalid', 'true'); } else { field.removeAttribute('aria-invalid'); } }
        }

        form.addEventListener('submit', function (e) {
            e.preventDefault();
            var f = form.elements, ok = true, firstBad = null;
            function bad(n, m) { setError(n, m); ok = false; if (!firstBad) { firstBad = f[n]; } }
            ['nama', 'layanan', 'tanggal'].forEach(function (n) { setError(n, ''); });

            if (f.nama.value.trim().length < 2) { bad('nama', 'Nama wajib diisi.'); }
            if (!f.layanan.value) { bad('layanan', 'Pilih layanan.'); }
            var date = parseISO(f.tanggal.value);
            var today = new Date(); today.setHours(0, 0, 0, 0);
            if (!date) { bad('tanggal', 'Pilih tanggal.'); }
            else if (date < today) { bad('tanggal', 'Tanggal tidak boleh sebelum hari ini.'); }
            if (!ok) { if (firstBad) { firstBad.focus(); } return; }

            var text = [
                'Halo ' + (DATA.brand || 'klinik') + ', saya ingin booking sekarang.',
                '',
                'Nama: ' + f.nama.value.trim(),
                'Layanan: ' + f.layanan.options[f.layanan.selectedIndex].text,
                'Tanggal: ' + fmtDate(date)
            ].join('\n');

            var win = window.open(waLink(text), '_blank', 'noopener');
            if (!win) { window.location.href = waLink(text); }
            if (status) { status.hidden = false; status.textContent = 'WhatsApp admin dibuka. Kirim pesan tersebut untuk menyelesaikan booking.'; }
        });

        form.addEventListener('input', function (e) { if (e.target && e.target.name) { setError(e.target.name, ''); } });
    }

    /* ---------- 6. Accordion FAQ (fallback untuk browser tanpa <details name>) ---------- */
    function initAccordion() {
        $$('[data-gl-accordion]').forEach(function (acc) {
            var items = $$('details', acc);
            items.forEach(function (d) {
                d.addEventListener('toggle', function () {
                    if (!d.open) { return; }
                    items.forEach(function (o) { if (o !== d) { o.open = false; } });
                });
            });
        });
    }

    /* ---------- 7. Scrollspy halaman kebijakan ---------- */
    function initPolicyNav() {
        var nav = $('[data-gl-policy-nav]');
        if (!nav || !('IntersectionObserver' in window)) { return; }
        var links = $$('a', nav);

        function mark(id) {
            links.forEach(function (a) { a.classList.toggle('is-active', a.getAttribute('href') === '#' + id); });
        }
        var io = new IntersectionObserver(function (entries) {
            entries.forEach(function (en) { if (en.isIntersecting) { mark(en.target.id); } });
        }, { rootMargin: '-30% 0px -60% 0px' });
        $$('[data-gl-policy]').forEach(function (s) { io.observe(s); });
        if (location.hash) { mark(location.hash.slice(1)); }
    }

    /* ---------- 8. Asisten AI (rule-based) ---------- */
    function initAssistant() {
        var root = $('[data-gl-ai]');
        if (!root) { return; }

        var launcher = $('[data-gl-ai-open]', root);
        var panel    = $('.gl-ai__panel', root);
        var bubble   = $('[data-gl-ai-bubble]', root);
        var log      = $('[data-gl-ai-log]', root);
        var body     = $('[data-gl-ai-body]', root);
        var form     = $('[data-gl-ai-form]', root);
        var input    = $('[data-gl-ai-input]', root);
        var R = DATA.routes || {};
        var C = DATA.contact || {};
        var busy = false;

        /* Buka / tutup */
        function open() {
            panel.hidden = false;
            root.classList.add('is-open');
            document.body.classList.add('gl-ai-open');
            if (launcher) { launcher.setAttribute('aria-expanded', 'true'); }
            if (bubble) { bubble.classList.add('is-hidden'); }
            setTimeout(function () { if (input) { input.focus({ preventScroll: true }); } }, 60);
        }
        function close() {
            panel.hidden = true;
            root.classList.remove('is-open');
            document.body.classList.remove('gl-ai-open');
            if (launcher) { launcher.setAttribute('aria-expanded', 'false'); launcher.focus(); }
        }

        $$('[data-gl-ai-open]').forEach(function (b) { b.addEventListener('click', open); });
        $$('[data-gl-ai-close]', root).forEach(function (b) { b.addEventListener('click', close); });
        document.addEventListener('keydown', function (e) { if (e.key === 'Escape' && !panel.hidden) { close(); } });
        if (bubble) { setTimeout(function () { bubble.classList.add('is-hidden'); }, 9000); }

        /* Render pesan */
        function scrollDown() { body.scrollTop = body.scrollHeight; }

        function addUser(text) {
            log.appendChild(el('div', { class: 'gl-ai__msg gl-ai__msg--user' }, [el('p', { text: text })]));
            scrollDown();
        }

        function addBot(parts) {
            var box = el('div', { class: 'gl-ai__msg gl-ai__msg--bot' });
            parts.forEach(function (p) {
                if (typeof p === 'string') { box.appendChild(el('p', { text: p })); }
                else if (p.list) {
                    var ul = el('ul');
                    p.list.forEach(function (li) { ul.appendChild(el('li', { text: li })); });
                    box.appendChild(ul);
                } else if (p.link) {
                    var a = el('a', { href: p.link.href, text: p.link.label });
                    if (/^https?:/.test(p.link.href) && p.link.href.indexOf(location.origin) !== 0) {
                        a.setAttribute('target', '_blank'); a.setAttribute('rel', 'noopener noreferrer');
                    }
                    box.appendChild(el('p', {}, [a]));
                }
            });
            log.appendChild(box);
            scrollDown();
        }

        function reply(parts) {
            busy = true;
            var typing = el('div', { class: 'gl-ai__msg gl-ai__msg--bot gl-ai__msg--typing', 'aria-hidden': 'true' }, [el('i'), el('i'), el('i')]);
            log.appendChild(typing);
            scrollDown();
            setTimeout(function () {
                typing.remove();
                addBot(parts);
                busy = false;
            }, reduceMotion ? 0 : 550);
        }

        /* Basis pengetahuan (dari config) */
        var today = new Date();
        function todaySlots() {
            var docs = {};
            (DATA.doctors || []).forEach(function (d) { docs[d.id] = d; });
            var slots = ((DATA.schedule || {})[today.getDay()] || []).filter(function (s) { return s.status !== 'full'; });
            return slots.map(function (s) { return s.time + ' — ' + (docs[s.doctor] || {}).name; });
        }

        var answers = {
            services: function () {
                return [
                    'Layanan kami:',
                    { list: (DATA.services || []).map(function (s) { return s.name + ' — ' + s.price; }) },
                    'Harga bersifat perkiraan; dokter menentukan perawatan setelah konsultasi.',
                    { link: { label: 'Lihat detail layanan', href: R.services } }
                ];
            },
            tips: function () {
                return ['Tips perawatan kulit harian:', { list: DATA.tips || [] },
                    'Untuk masalah kulit tertentu, sebaiknya konsultasi langsung dengan dokter.',
                    { link: { label: 'Booking konsultasi', href: R.appointment } }];
            },
            schedule: function () {
                var slots = todaySlots();
                var parts = [];
                if (slots.length) { parts.push('Slot tersedia hari ini (' + fmtDate(today) + '):'); parts.push({ list: slots }); }
                else { parts.push('Slot untuk hari ini sudah penuh atau belum tersedia.'); }
                parts.push({ link: { label: 'Lihat jadwal lengkap', href: R.schedule } });
                return parts;
            },
            location: function () {
                return ['Klinik kami berada di ' + C.address + '.', 'Jam operasional: ' + C.hours + '.',
                    { link: { label: 'Buka di Google Maps', href: C.maps } },
                    { link: { label: 'Lihat lokasi di beranda', href: R.home + '#lokasi' } }];
            },
            hours: function () {
                return ['Klinik buka ' + C.hours + '.', { link: { label: 'Booking appointment', href: R.appointment } }];
            },
            products: function () {
                return ['Kami hanya menggunakan produk original dan terdaftar, serta alat yang disterilkan sesuai prosedur klinik.',
                    { link: { label: 'Baca kebijakan keamanan', href: R.policy + '#keamanan' } }];
            },
            faq: function () {
                return ['Beberapa pertanyaan yang sering diajukan:',
                    { list: (DATA.faqs || []).slice(0, 4).map(function (f) { return f.q; }) },
                    { link: { label: 'Lihat semua FAQ', href: R.faq } }];
            },
            booking: function () {
                return ['Booking mudah: isi formulir appointment, lalu data Anda dikirim ke WhatsApp admin untuk konfirmasi.',
                    { link: { label: 'Buka formulir booking', href: R.appointment } }];
            },
            policy: function () {
                return ['Kebijakan klinik:',
                    { list: (DATA.policies || []).map(function (p) { return p.title; }) },
                    { link: { label: 'Baca kebijakan', href: R.policy } }];
            },
            doctors: function () {
                return ['Tim profesional kami:',
                    { list: (DATA.doctors || []).map(function (d) { return d.name + ' — ' + d.role; }) },
                    { link: { label: 'Lihat dokter & staff', href: R.doctors } }];
            },
            contact: function () {
                return ['Hubungi kami:', { list: ['Telepon: ' + C.phone, 'Email: ' + C.email, 'Alamat: ' + C.address] },
                    { link: { label: 'Chat via WhatsApp', href: waLink('Halo ' + DATA.brand + ', saya ingin bertanya.') } }];
            },
            hello: function () { return ['Halo! 👋 Silakan tanyakan seputar layanan, jadwal dokter, lokasi, atau booking.']; },
            thanks: function () { return ['Sama-sama! Senang bisa membantu. Ada hal lain yang ingin ditanyakan?']; }
        };

        var rules = [
            ['booking',  /book|janji|reservasi|appointment/],
            ['schedule', /jadwal|jam praktik|slot|praktik/],
            ['doctors',  /\b(dokter|staff|staf|perawat|therapist|terapis|tim)\b/],
            ['hours',    /jam (buka|operasional)|buka|tutup|operasional/],
            ['location', /lokasi|alamat|dimana|di mana|maps|peta|arah/],
            ['contact',  /kontak|telepon|telp|nomor|hubungi|email|whatsapp|wa\b/],
            ['policy',   /kebijakan|privasi|syarat|ketentuan|batal|reschedule|jadwal ulang|data pribadi/],
            ['products', /\b(produk|original|steril|keamanan|aman)\b|\balat\b/],
            ['tips',     /tips|saran|rutinitas|skincare|cara merawat|sunscreen|tabir/],
            ['services', /layanan|treatment|perawatan|harga|biaya|tarif|paket|berapa/],
            ['faq',      /faq|pertanyaan|sering ditanya/],
            ['thanks',   /terima kasih|makasih|thanks|thx/],
            ['hello',    /^(hai|halo|hello|hi|selamat|pagi|siang|sore|malam)\b/]
        ];

        function matchService(q) {
            var hit = null;
            (DATA.services || []).forEach(function (s) {
                var words = norm(s.name).split(' ');
                var key = norm(s.name);
                if (q.indexOf(key) !== -1 || (words.length > 1 && q.indexOf(words[0]) !== -1 && words[0].length > 3)) { hit = s; }
            });
            if (!hit && /jerawat|komedo/.test(q)) { hit = (DATA.services || []).filter(function (s) { return /acne/i.test(s.name); })[0]; }
            if (!hit && /keriput|kerutan|penuaan/.test(q)) { hit = (DATA.services || []).filter(function (s) { return /anti/i.test(s.name); })[0]; }
            if (!hit && /bopeng|flek|noda|kusam|mencerahkan/.test(q)) { hit = (DATA.services || []).filter(function (s) { return /laser/i.test(s.name); })[0]; }
            return hit;
        }

        function matchFaq(q) {
            var qs = q.split(/\W+/).filter(function (w) { return w.length > 3; });
            var best = null, score = 0;
            (DATA.faqs || []).forEach(function (f) {
                var text = norm(f.q + ' ' + f.a), s = 0;
                qs.forEach(function (w) { if (text.indexOf(w) !== -1) { s++; } });
                if (s > score) { score = s; best = f; }
            });
            return score >= 2 ? best : null;
        }

        function respond(raw) {
            var q = norm(raw);
            var service = matchService(q);
            if (service) {
                return [service.name + ': ' + service.short + '.',
                    { list: ['Harga: ' + service.price, 'Durasi: ' + service.duration] },
                    { link: { label: 'Booking layanan ini', href: R.appointment } }];
            }
            for (var i = 0; i < rules.length; i++) {
                if (rules[i][1].test(q)) { return answers[rules[i][0]](); }
            }
            var faq = matchFaq(q);
            if (faq) { return [faq.a, { link: { label: 'Lihat FAQ lengkap', href: R.faq } }]; }
            return ['Maaf, saya belum menemukan jawaban untuk itu. Coba tanyakan seputar layanan, jadwal, lokasi, atau booking — atau hubungi admin kami.',
                { link: { label: 'Chat admin via WhatsApp', href: waLink('Halo ' + DATA.brand + ', saya ingin bertanya.') } }];
        }

        function ask(text, intent) {
            if (busy) { return; }
            addUser(text);
            reply(intent && answers[intent] ? answers[intent]() : respond(text));
        }

        $$('[data-gl-ai-intent]', root).forEach(function (b) {
            b.addEventListener('click', function () { ask(b.getAttribute('data-label') || b.textContent.trim(), b.getAttribute('data-gl-ai-intent')); });
        });

        form.addEventListener('submit', function (e) {
            e.preventDefault();
            var text = input.value.trim();
            if (!text) { return; }
            input.value = '';
            ask(text);
        });
    }

    /* ---------- Init ---------- */
    function init() {
        initHeader();
        initBackToTop();
        initSchedule();
        initModal();
        initAppointmentForm();
        initMiniForm();
        initAccordion();
        initPolicyNav();
        initAssistant();
    }

    if (document.readyState === 'loading') { document.addEventListener('DOMContentLoaded', init); } else { init(); }
})();
