/* ==========================================================================
   GreenHaven · Real Estate Agency · Luxury / Emerald Green
   File   : real-estate-agency.js
   Vanilla JS, tanpa dependensi. Setiap fitur berdiri sendiri (init*) dan
   aman dijalankan walau elemennya tidak ada di halaman.

   Modul : Navbar · Search · Hero slider · Gallery + Lightbox + Viewer detail
           Menu cepat detail · Salin alamat · Forms (inquiry & booking) · AI Assistant (FAQ)
   Dipakai di semua halaman template (beranda, property, specification, price,
   about, gallery, booking, blog): tiap modul hanya aktif jika elemennya ada.

   Pengiriman form:
   - Form Inquiry & Booking dikirim ke WhatsApp: setelah validasi, WhatsApp dibuka dengan
     pesan yang sudah terisi. Nomor & kalimat pembuka ada di atribut data-wa-number /
     data-wa-intro pada <form> (berasal dari config), label tiap field di data-wa-label.
   - Opsional: isi data-endpoint pada <form> untuk JUGA mengirim ke backend via fetch
     (POST, FormData + token CSRF).
   - Event kustom di document: "rea:inquiry" dan "rea:booking" (detail = data form).
   - Assistant: ganti fungsi answerFor() untuk memanggil endpoint AI.
   ========================================================================== */
(() => {
    'use strict';

    const $  = (selector, scope = document) => scope.querySelector(selector);
    const $$ = (selector, scope = document) => Array.from(scope.querySelectorAll(selector));
    const reduceMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

    /* ---------------------------------------------------------------- */
    /* Storage aman (private mode / blocked storage)                     */
    /* ---------------------------------------------------------------- */
    const store = {
        get(key) { try { return window.sessionStorage.getItem(key); } catch (e) { return null; } },
        set(key, value) { try { window.sessionStorage.setItem(key, value); } catch (e) { /* abaikan */ } },
    };

    /* ================================================================ */
    /* NAVBAR                                                           */
    /* ================================================================ */
    function initNav() {
        const nav = $('[data-nav]');
        if (!nav) return;

        const toggle = $('[data-nav-toggle]', nav);
        const menu   = $('[data-nav-menu]', nav);

        const setOpen = (open) => {
            nav.classList.toggle('is-open', open);
            if (toggle) {
                toggle.setAttribute('aria-expanded', String(open));
                toggle.setAttribute('aria-label', open ? 'Close menu' : 'Open menu');
            }
        };

        toggle && toggle.addEventListener('click', () => setOpen(!nav.classList.contains('is-open')));
        menu && menu.addEventListener('click', (e) => { if (e.target.closest('a')) setOpen(false); });
        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape' && nav.classList.contains('is-open')) { setOpen(false); toggle && toggle.focus(); }
        });
        document.addEventListener('click', (e) => {
            if (nav.classList.contains('is-open') && !nav.contains(e.target)) setOpen(false);
        });
        window.matchMedia('(min-width: 1024px)').addEventListener('change', (e) => { if (e.matches) setOpen(false); });

        // Bayangan saat discroll
        const onScroll = () => nav.classList.toggle('is-stuck', window.scrollY > 8);
        onScroll();
        window.addEventListener('scroll', onScroll, { passive: true });
    }

    /* ================================================================ */
    /* SEARCH (navigasi cepat ke bagian halaman)                        */
    /* ================================================================ */
    function initSearch() {
        const toggle = $('[data-search-toggle]');
        const panel  = $('[data-search-panel]');
        const form   = $('[data-search-form]');
        const hint   = $('[data-search-hint]');
        if (!toggle || !panel || !form) return;

        const input = $('input', form);
        let targets = [];
        try { targets = JSON.parse(form.dataset.targets || '[]'); } catch (e) { targets = []; }

        const setOpen = (open) => {
            panel.hidden = !open;
            toggle.setAttribute('aria-expanded', String(open));
            if (open) { input.focus(); } else { hint.textContent = ''; }
        };

        toggle.addEventListener('click', () => setOpen(panel.hidden));
        document.addEventListener('keydown', (e) => { if (e.key === 'Escape' && !panel.hidden) { setOpen(false); toggle.focus(); } });

        form.addEventListener('submit', (e) => {
            e.preventDefault();
            const q = input.value.trim().toLowerCase();
            if (!q) { hint.textContent = 'Type a keyword, for example: price, gallery, location or booking.'; return; }
            const match = targets.find((t) => (t.words || []).some((w) => q.includes(w) || w.includes(q)));
            if (!match) { hint.textContent = 'No result. Try: price, gallery, location, booking, blog.'; return; }

            setOpen(false);
            input.value = '';
            const url = new URL(match.url, window.location.href);
            const el = url.hash.length > 1 ? document.getElementById(url.hash.slice(1)) : null;
            if (url.pathname === window.location.pathname && el) {
                el.scrollIntoView({ behavior: reduceMotion ? 'auto' : 'smooth', block: 'start' });
            } else {
                window.location.href = match.url;
            }
        });
    }

    /* ================================================================ */
    /* HERO SLIDER                                                      */
    /* ================================================================ */
    function initHero() {
        const hero = $('[data-hero]');
        if (!hero) return;

        const slides  = $$('[data-hero-slide]', hero);
        const current = $('[data-hero-current]', hero);
        const total   = $('[data-hero-total]', hero);
        const prev    = $('[data-hero-prev]', hero);
        const next    = $('[data-hero-next]', hero);
        if (slides.length < 2) {
            [prev, next].forEach((b) => b && (b.hidden = true));
            return;
        }

        const pad = (n) => String(n).padStart(2, '0');
        let index = 0;
        let timer = null;

        total && (total.textContent = pad(slides.length));

        const show = (i) => {
            index = (i + slides.length) % slides.length;
            slides.forEach((s, n) => {
                const on = n === index;
                s.classList.toggle('is-active', on);
                s.setAttribute('aria-hidden', String(!on));
                if (on && s.loading === 'lazy') s.loading = 'eager';
            });
            current && (current.textContent = pad(index + 1));
        };

        const stop  = () => { clearInterval(timer); timer = null; };
        const start = () => { if (!reduceMotion && !timer) timer = setInterval(() => show(index + 1), 6500); };

        prev && prev.addEventListener('click', () => { show(index - 1); stop(); start(); });
        next && next.addEventListener('click', () => { show(index + 1); stop(); start(); });

        hero.addEventListener('mouseenter', stop);
        hero.addEventListener('mouseleave', start);
        hero.addEventListener('focusin', stop);
        hero.addEventListener('focusout', start);
        document.addEventListener('visibilitychange', () => (document.hidden ? stop() : start()));

        // Swipe di layar sentuh
        let startX = null;
        hero.addEventListener('touchstart', (e) => { startX = e.touches[0].clientX; }, { passive: true });
        hero.addEventListener('touchend', (e) => {
            if (startX === null) return;
            const dx = e.changedTouches[0].clientX - startX;
            if (Math.abs(dx) > 50) { show(index + (dx < 0 ? 1 : -1)); stop(); start(); }
            startX = null;
        }, { passive: true });

        start();
    }

    /* ================================================================ */
    /* GALLERY + LIGHTBOX                                               */
    /* ================================================================ */
    function initGallery() {
        const root = $('[data-gallery]');
        if (!root) return;

        const box    = $('[data-lightbox]', root);
        const dataEl = $('[data-lightbox-data]', root);
        let photos = [];
        try { photos = JSON.parse(dataEl ? dataEl.textContent : '[]'); } catch (e) { photos = []; }
        // Viewer halaman detail: foto besar + thumbnail + panah + geser (swipe)
        const viewer = $('[data-viewer]', root) || (root.matches('[data-viewer]') ? root : null);
        if (viewer && photos.length) {
            const stage = $('.rea-viewer__stage', viewer);
            const img   = $('[data-viewer-img]', viewer);
            const cur   = $('[data-viewer-current]', viewer);
            const thumbs = $$('[data-viewer-thumb]', viewer);
            let idx = 0;
            const show = (i) => {
                idx = (i + photos.length) % photos.length;
                img.classList.add('is-swapping');
                window.setTimeout(() => {
                    img.src = photos[idx].src; img.alt = photos[idx].alt;
                    img.classList.remove('is-swapping');
                }, reduceMotion ? 0 : 160);
                cur && (cur.textContent = String(idx + 1));
                stage.dataset.galleryOpen = String(idx);
                thumbs.forEach((t, n) => {
                    const on = n === idx;
                    t.classList.toggle('is-active', on);
                    on ? t.setAttribute('aria-current', 'true') : t.removeAttribute('aria-current');
                });
            };
            thumbs.forEach((t) => t.addEventListener('click', () => show(Number(t.dataset.viewerThumb))));
            const prev = $('[data-viewer-prev]', viewer), next = $('[data-viewer-next]', viewer);
            prev && prev.addEventListener('click', () => show(idx - 1));
            next && next.addEventListener('click', () => show(idx + 1));
            viewer.addEventListener('keydown', (e) => {
                if (e.target.closest('dialog')) return;
                if (e.key === 'ArrowLeft') show(idx - 1);
                if (e.key === 'ArrowRight') show(idx + 1);
            });
            let x0 = null;
            stage.addEventListener('touchstart', (e) => { x0 = e.touches[0].clientX; }, { passive: true });
            stage.addEventListener('touchend', (e) => {
                if (x0 === null) return;
                const dx = e.changedTouches[0].clientX - x0;
                if (Math.abs(dx) > 40) show(idx + (dx < 0 ? 1 : -1));
                x0 = null;
            }, { passive: true });
            const fs = $('[data-viewer-fullscreen]', viewer);
            fs && fs.addEventListener('click', () => { fs.dataset.galleryOpen = String(idx); });
        }

        if (!box || typeof box.showModal !== 'function' || !photos.length) return;

        const img     = $('[data-lightbox-img]', box);
        const caption = $('[data-lightbox-caption]', box);
        const count   = $('[data-lightbox-count]', box);
        let current = 0;

        const render = (i) => {
            current = (i + photos.length) % photos.length;
            img.src = photos[current].src;
            img.alt = photos[current].alt;
            caption.textContent = photos[current].alt;
            count.textContent = (current + 1) + ' / ' + photos.length;
        };
        const open = (i) => {
            render(i);
            box.showModal();
            document.documentElement.classList.add('rea-lock');
        };

        $$('[data-gallery-open]', root).forEach((b) => b.addEventListener('click', () => open(Number(b.dataset.galleryOpen) || 0)));
        $('[data-lightbox-close]', box).addEventListener('click', () => box.close());
        $('[data-lightbox-prev]', box).addEventListener('click', () => render(current - 1));
        $('[data-lightbox-next]', box).addEventListener('click', () => render(current + 1));
        box.addEventListener('close', () => document.documentElement.classList.remove('rea-lock'));
        box.addEventListener('click', (e) => { if (e.target === box) box.close(); }); // klik backdrop
        box.addEventListener('keydown', (e) => {
            if (e.key === 'ArrowLeft') render(current - 1);
            if (e.key === 'ArrowRight') render(current + 1);
        });
    }

    /* ================================================================ */
    /* DETAIL PROPERTI: menu cepat (scroll-spy) & salin alamat          */
    /* ================================================================ */
    function initDetail() {
        const nav = $('[data-detailnav]');
        if (nav) {
            const links = $$('a[href^="#"]', nav);
            const map = new Map();
            links.forEach((a) => { const el = document.getElementById(a.getAttribute('href').slice(1)); if (el) map.set(el, a); });
            const setActive = (link) => {
                links.forEach((a) => {
                    const on = a === link;
                    a.classList.toggle('is-active', on);
                    on ? a.setAttribute('aria-current', 'true') : a.removeAttribute('aria-current');
                });
                // geser chip aktif ke tengah (layar kecil)
                link && link.scrollIntoView && link.scrollIntoView({ inline: 'center', block: 'nearest', behavior: reduceMotion ? 'auto' : 'smooth' });
            };
            if ('IntersectionObserver' in window && map.size) {
                const visible = new Set();
                const io = new IntersectionObserver((entries) => {
                    entries.forEach((en) => (en.isIntersecting ? visible.add(en.target) : visible.delete(en.target)));
                    const first = Array.from(map.keys()).filter((el) => visible.has(el))
                        .sort((a, b) => a.getBoundingClientRect().top - b.getBoundingClientRect().top)[0];
                    setActive(first ? map.get(first) : null);
                }, { rootMargin: '-25% 0px -65% 0px' });
                map.forEach((_, el) => io.observe(el));
            }
        }

        // Tombol "Copy address"
        $$('[data-copy]').forEach((btn) => btn.addEventListener('click', async () => {
            const text = btn.dataset.copy || '';
            const label = $('span', btn);
            try {
                if (navigator.clipboard && window.isSecureContext) { await navigator.clipboard.writeText(text); }
                else {
                    const ta = document.createElement('textarea');
                    ta.value = text; ta.style.position = 'fixed'; ta.style.opacity = '0';
                    document.body.appendChild(ta); ta.select(); document.execCommand('copy'); ta.remove();
                }
                if (label) {
                    const old = label.textContent;
                    label.textContent = btn.dataset.copyDone || 'Copied!';
                    window.setTimeout(() => { label.textContent = old; }, 2000);
                }
            } catch (e) { /* abaikan */ }
        }));
    }

    /* ================================================================ */
    /* FORMS: inquiry & booking                                         */
    /* ================================================================ */
    const validators = {
        name(v)    { return v.trim().length >= 3 ? '' : 'Please enter your full name (at least 3 characters).'; },
        email(v)   { return /^[^\s@]+@[^\s@]+\.[^\s@]{2,}$/.test(v.trim()) ? '' : 'Please enter a valid email address.'; },
        phone(v)   { return /^\+?[\d\s().-]{8,18}$/.test(v.trim()) && v.replace(/\D/g, '').length >= 8 ? '' : 'Please enter a valid phone number.'; },
        message(v) { return v.trim().length >= 10 ? '' : 'Please write a message of at least 10 characters.'; },
        date(v) {
            if (!v) return 'Please select a viewing date.';
            const picked = new Date(v + 'T00:00:00');
            const today = new Date(); today.setHours(0, 0, 0, 0);
            return picked >= today ? '' : 'Please choose today or a future date.';
        },
        time(v)    { return v ? '' : 'Please select a viewing time.'; },
    };

    // Susun pesan WhatsApp dari isi form: kalimat pembuka + nama properti + "Label: isi" tiap field
    function buildWhatsAppUrl(form, payload) {
        const number = (form.dataset.waNumber || '').replace(/\D/g, '');
        if (!number) return '';
        const lines = $$('[data-wa-label]', form).map((el) => {
            let value = el.value.trim();
            if (el.name === 'date' && value) {
                const d = new Date(value + 'T00:00:00');
                value = d.toLocaleDateString('id-ID', { weekday: 'long', day: 'numeric', month: 'long', year: 'numeric' });
            }
            return el.dataset.waLabel + ': ' + value;
        });
        const parts = [form.dataset.waIntro || ''];
        if (payload.property) parts.push('*' + payload.property + '*');
        parts.push(lines.join('\n'));
        return 'https://wa.me/' + number + '?text=' + encodeURIComponent(parts.filter(Boolean).join('\n\n'));
    }

    function initForms() {
        // Link placeholder (href="#") tidak melompat ke atas halaman
        document.addEventListener('click', (e) => {
            const a = e.target.closest('a[href="#"]');
            if (a) e.preventDefault();
        });

        // Tanggal minimum = hari ini (zona waktu lokal)
        $$('[data-min-today]').forEach((input) => {
            const d = new Date();
            const pad = (n) => String(n).padStart(2, '0');
            input.min = d.getFullYear() + '-' + pad(d.getMonth() + 1) + '-' + pad(d.getDate());
        });

        $$('form[data-form]').forEach((form) => {
            const status = $('[data-form-status]', form);
            const submitBtn = $('button[type="submit"]', form);
            const fields = $$('input[name], select[name], textarea[name]', form).filter((el) => validators[el.name]);

            const setError = (el, message) => {
                const wrap = el.closest('.rea-field');
                const out = wrap && $('.rea-field__error', wrap);
                wrap && wrap.classList.toggle('is-invalid', Boolean(message));
                el.setAttribute('aria-invalid', message ? 'true' : 'false');
                out && (out.textContent = message);
            };
            const check = (el) => { const msg = validators[el.name](el.value); setError(el, msg); return !msg; };
            const setStatus = (type, text) => {
                if (!status) return;
                status.className = 'rea-form-status' + (type ? ' is-' + type : '');
                status.textContent = text;
            };

            fields.forEach((el) => {
                el.addEventListener('blur', () => { if (el.value) check(el); });
                el.addEventListener('input', () => { if (el.closest('.rea-field').classList.contains('is-invalid')) check(el); });
            });

            form.addEventListener('submit', async (e) => {
                e.preventDefault();
                setStatus('', '');
                const results = fields.map(check);
                if (results.includes(false)) {
                    const firstBad = fields.find((el) => el.getAttribute('aria-invalid') === 'true');
                    firstBad && firstBad.focus();
                    return;
                }

                const type = form.dataset.form;
                const payload = Object.fromEntries(new FormData(form).entries());
                delete payload._token;
                const endpoint = (form.dataset.endpoint || '').trim();

                // 1) Buka WhatsApp dengan pesan terisi (harus sinkron dengan klik pengguna)
                const waUrl = buildWhatsAppUrl(form, payload);
                if (waUrl) {
                    const w = window.open(waUrl, '_blank');
                    if (w) w.opener = null;
                }

                // 2) Opsional: kirim juga ke backend bila data-endpoint diisi
                submitBtn && (submitBtn.disabled = true);
                try {
                    if (endpoint) {
                        const res = await fetch(endpoint, {
                            method: 'POST',
                            body: new FormData(form),
                            headers: { 'X-Requested-With': 'XMLHttpRequest', 'Accept': 'application/json' },
                        });
                        if (!res.ok) throw new Error('Request failed: ' + res.status);
                    }
                    document.dispatchEvent(new CustomEvent('rea:' + type, { detail: payload }));
                    setStatus('success', waUrl
                        ? 'Thank you! WhatsApp is opening with your message. Just press Send there to finish. '
                        : 'Thank you! We have received your message.');
                    if (waUrl && status) {
                        const link = document.createElement('a');
                        link.href = waUrl; link.target = '_blank'; link.rel = 'noopener';
                        link.textContent = 'Did not open? Open WhatsApp';
                        link.style.textDecoration = 'underline';
                        status.appendChild(link);
                    }
                    form.reset();
                    fields.forEach((el) => setError(el, ''));
                } catch (err) {
                    setStatus('error', 'Something went wrong. Please try again in a moment.');
                } finally {
                    submitBtn && (submitBtn.disabled = false);
                }
            });
        });
    }

    /* ================================================================ */
    /* AI PROPERTY ASSISTANT (FAQ statis)                               */
    /* ================================================================ */
    function initAssistant() {
        const root = $('[data-assistant]');
        if (!root) return;

        const panel    = $('[data-assistant-panel]', root);
        const launcher = $('[data-assistant-open]', root);
        const closeBtn = $('[data-assistant-close]', root);
        const log      = $('[data-assistant-log]', root);
        const form     = $('[data-assistant-form]', root);
        const input    = $('input', form);
        const KEY      = 'rea-assistant-closed';

        let faq = [];
        try { faq = JSON.parse(root.dataset.faq || '[]'); } catch (e) { faq = []; }
        const fallback = root.dataset.fallback || 'Maaf, saya belum menemukan jawabannya.';

        const setOpen = (open, remember = true) => {
            panel.hidden = !open;
            launcher.hidden = open;
            launcher.setAttribute('aria-expanded', String(open));
            if (remember) store.set(KEY, open ? '0' : '1');
        };

        // Terbuka di beranda desktop (seperti desain); tertutup di halaman dalam, layar kecil, atau jika pernah ditutup
        const wide = window.matchMedia('(min-width: 1200px)').matches;
        setOpen(wide && root.dataset.start !== 'closed' && store.get(KEY) !== '1', false);

        // Panel terbuka mengikuti desain, tetapi agar tidak menutupi form/tombol saat halaman
        // di-scroll, ia menciut ke launcher sekali saja kecuali pengunjung sudah memakainya.
        let engaged = false;
        const markEngaged = () => { engaged = true; };
        panel.addEventListener('focusin', markEngaged);
        panel.addEventListener('pointerdown', markEngaged);
        if (!panel.hidden) {
            const autoCollapse = () => {
                if (window.scrollY < 240) return;
                window.removeEventListener('scroll', autoCollapse);
                if (!engaged && !panel.hidden) setOpen(false, false);
            };
            window.addEventListener('scroll', autoCollapse, { passive: true });
        }

        closeBtn.addEventListener('click', () => { setOpen(false); launcher.focus(); });
        launcher.addEventListener('click', () => { setOpen(true); input.focus(); });
        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape' && !panel.hidden && root.contains(document.activeElement)) { setOpen(false); launcher.focus(); }
        });

        // --- pencocokan pertanyaan (keyword scoring) ---
        const normalize = (s) => s.toLowerCase().normalize('NFD').replace(/[\u0300-\u036f]/g, '').replace(/[^a-z0-9\s]/g, ' ').replace(/\s+/g, ' ').trim();

        // Ganti fungsi ini bila nanti memakai AI sungguhan (return string / Promise<string>).
        const answerFor = (question) => {
            const q = ' ' + normalize(question) + ' ';
            let best = null;
            let bestScore = 0;
            faq.forEach((item) => {
                if (normalize(item.q) === normalize(question)) { best = item; bestScore = Infinity; return; }
                const score = (item.keys || []).reduce((sum, k) => sum + (q.includes(' ' + normalize(k)) ? 1 : 0), 0);
                if (score > bestScore) { best = item; bestScore = score; }
            });
            return best && bestScore > 0 ? best.a : fallback;
        };

        const waNumber = (root.dataset.waNumber || '').replace(/\D/g, '');
        const waIntro  = root.dataset.waIntro || '';

        const addMessage = (text, who, waQuestion) => {
            const el = document.createElement('p');
            el.className = 'rea-msg rea-msg--' + who;
            el.textContent = text;
            // Pertanyaan yang tidak terjawab FAQ: tawarkan lanjut ke WhatsApp (nomor dari config)
            if (waQuestion && waNumber) {
                const link = document.createElement('a');
                link.href = 'https://wa.me/' + waNumber + '?text=' + encodeURIComponent((waIntro + '\n\n' + waQuestion).trim());
                link.target = '_blank'; link.rel = 'noopener';
                link.textContent = 'Lanjutkan via WhatsApp';
                el.appendChild(document.createElement('br'));
                el.appendChild(link);
            }
            log.hidden = false;
            log.appendChild(el);
            log.scrollTop = log.scrollHeight;
            return el;
        };

        let busy = false;
        const ask = async (question) => {
            const text = question.trim();
            if (!text || busy) return;
            busy = true;
            addMessage(text, 'user');

            const typing = document.createElement('p');
            typing.className = 'rea-msg rea-msg--bot rea-msg--typing';
            typing.setAttribute('aria-label', 'Asisten sedang mengetik');
            typing.innerHTML = '<i></i><i></i><i></i>';
            log.appendChild(typing);
            log.scrollTop = log.scrollHeight;

            const reply = await Promise.resolve(answerFor(text));
            await new Promise((r) => setTimeout(r, reduceMotion ? 0 : 650));
            typing.remove();
            addMessage(reply, 'bot', reply === fallback ? text : '');
            busy = false;
        };

        $$('[data-assistant-chip]', root).forEach((chip) => chip.addEventListener('click', () => ask(chip.dataset.assistantChip)));
        form.addEventListener('submit', (e) => {
            e.preventDefault();
            const value = input.value;
            input.value = '';
            ask(value);
        });
    }

    /* ================================================================ */
    /* BOOT                                                             */
    /* ================================================================ */
    const boot = () => { initNav(); initSearch(); initHero(); initGallery(); initDetail(); initForms(); initAssistant(); };
    if (document.readyState === 'loading') { document.addEventListener('DOMContentLoaded', boot); } else { boot(); }
})();
