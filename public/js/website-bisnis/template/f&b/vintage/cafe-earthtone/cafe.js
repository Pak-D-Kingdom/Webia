/* ==========================================================================
   WEBIA by D-KREASI — Template F&B / Vintage / Cafe Earthtone (Kopi Lembang)
   --------------------------------------------------------------------------
   Vanilla JS tanpa dependensi. Setiap fitur punya init sendiri dan hanya
   berjalan jika elemennya ada di halaman (hook: atribut data-kl-*).
     1. Navbar (menu mobile, pencarian, shadow, scrollspy)
     2. Filter & pencarian menu
     3. Form reservasi (validasi + mode demo)
     4. AI FAQ (pencocokan kata kunci statis)
     5. Slider promo (bergantian; mode grid tidak butuh JS)
   ========================================================================== */
(() => {
    'use strict';

    const $ = (selector, scope = document) => scope.querySelector(selector);
    const $$ = (selector, scope = document) => Array.from(scope.querySelectorAll(selector));
    const reduceMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

    /* Hilangkan aksen & huruf besar agar pencocokan teks lebih toleran */
    const normalize = (text) =>
        String(text).toLowerCase().normalize('NFD').replace(/[\u0300-\u036f]/g, '').replace(/\s+/g, ' ').trim();

    /* ---------------------------------------------------------------------
       1. NAVBAR
       --------------------------------------------------------------------- */
    function initNavbar() {
        const bar = $('[data-kl-navbar]');
        if (!bar) return;

        const toggle = $('[data-kl-nav-toggle]', bar);
        const nav = $('#kl-nav', bar);
        const searchToggle = $('[data-kl-search-toggle]', bar);
        const searchPanel = $('[data-kl-search-panel]', bar);

        const setNav = (open) => {
            bar.classList.toggle('is-open', open);
            toggle?.setAttribute('aria-expanded', String(open));
            toggle?.setAttribute('aria-label', open ? 'Tutup menu navigasi' : 'Buka menu navigasi');
        };

        const setSearch = (open) => {
            if (!searchPanel) return;
            searchPanel.hidden = !open;
            searchToggle.setAttribute('aria-expanded', String(open));
            if (open) $('input', searchPanel)?.focus();
        };

        toggle?.addEventListener('click', () => {
            const open = !bar.classList.contains('is-open');
            setNav(open);
            if (open) setSearch(false);
        });

        nav?.addEventListener('click', (event) => {
            if (event.target.closest('a')) setNav(false);
        });

        searchToggle?.addEventListener('click', () => {
            const open = searchPanel.hidden;
            setSearch(open);
            if (open) setNav(false);
        });

        document.addEventListener('keydown', (event) => {
            if (event.key !== 'Escape') return;
            setNav(false);
            if (searchPanel && !searchPanel.hidden) {
                setSearch(false);
                searchToggle.focus();
            }
        });

        // Tutup menu mobile saat layar melebar ke desktop
        window.matchMedia('(min-width: 992px)').addEventListener('change', (e) => e.matches && setNav(false));

        // Bayangan tipis saat halaman di-scroll
        const onScroll = () => bar.classList.toggle('is-stuck', window.scrollY > 8);
        onScroll();
        window.addEventListener('scroll', onScroll, { passive: true });

        initScrollSpy();
    }

    /* Tandai link navbar aktif sesuai section yang sedang terlihat (hanya beranda).
       Section yang berada satu baris (mis. Tentang Kami & Lokasi) dibedakan lewat klik. */
    function initScrollSpy() {
        if (document.body.dataset.klPage !== 'home') return;

        const links = new Map($$('[data-kl-nav]').map((a) => [a.dataset.klNav, a]));
        const targets = [...links.keys()].map((id) => document.getElementById(id)).filter(Boolean);
        if (!targets.length) return;

        let lockUntil = 0;
        const setActive = (id) => {
            links.forEach((link, key) => {
                const active = key === id;
                link.classList.toggle('is-active', active);
                active ? link.setAttribute('aria-current', 'true') : link.removeAttribute('aria-current');
            });
        };

        const update = () => {
            if (Date.now() < lockUntil) return;
            const line = window.innerHeight * 0.4;
            let current = targets[0];
            targets.forEach((t) => {
                if (t.getBoundingClientRect().top <= line) current = t;
            });
            setActive(window.scrollY < 80 ? targets[0].id : current.id);
        };

        links.forEach((link, id) =>
            link.addEventListener('click', () => {
                setActive(id);
                lockUntil = Date.now() + 900; // biarkan smooth-scroll selesai dulu
            })
        );

        let ticking = false;
        window.addEventListener('scroll', () => {
            if (ticking) return;
            ticking = true;
            window.requestAnimationFrame(() => {
                update();
                ticking = false;
            });
        }, { passive: true });
        update();
    }

    /* ---------------------------------------------------------------------
       2. FILTER & PENCARIAN MENU (halaman menu)
       --------------------------------------------------------------------- */
    function initMenu() {
        const root = $('[data-kl-menu]');
        if (!root) return;

        const dishes = $$('[data-kl-dish]', root);
        const pills = $$('[data-kl-filter]', root);
        const search = $('[data-kl-menu-search]', root);
        const count = $('[data-kl-menu-count]', root);
        const empty = $('[data-kl-menu-empty]', root);

        const params = new URLSearchParams(window.location.search);
        let category = params.get('kategori') || 'semua';
        if (!pills.some((p) => p.dataset.klFilter === category)) category = 'semua';
        let query = params.get('q') || '';
        if (search) search.value = query;

        const apply = () => {
            const q = normalize(query);
            let shown = 0;

            dishes.forEach((dish) => {
                const matchCategory = category === 'semua' || dish.dataset.category === category;
                const matchQuery = !q || normalize(dish.dataset.name).includes(q);
                const visible = matchCategory && matchQuery;
                dish.hidden = !visible;
                if (visible) shown += 1;
            });

            pills.forEach((pill) => {
                const active = pill.dataset.klFilter === category;
                pill.classList.toggle('is-active', active);
                pill.setAttribute('aria-pressed', String(active));
            });

            if (count) count.textContent = shown ? `Menampilkan ${shown} menu` : '';
            if (empty) empty.hidden = shown > 0;

            // Sinkronkan URL tanpa reload agar filter bisa dibagikan
            const next = new URLSearchParams();
            if (category !== 'semua') next.set('kategori', category);
            if (query.trim()) next.set('q', query.trim());
            const qs = next.toString();
            window.history.replaceState(null, '', window.location.pathname + (qs ? `?${qs}` : ''));
        };

        pills.forEach((pill) =>
            pill.addEventListener('click', () => {
                category = pill.dataset.klFilter;
                apply();
            })
        );

        search?.addEventListener('input', () => {
            query = search.value;
            apply();
        });

        apply();
    }

    /* ---------------------------------------------------------------------
       3. FORM RESERVASI
       --------------------------------------------------------------------- */
    function initReservation() {
        const form = $('[data-kl-reservation]');
        if (!form) return;

        const success = $('[data-kl-success]');
        const timeMin = form.dataset.timeMin || '00:00';
        const timeMax = form.dataset.timeMax || '23:59';
        const maxGuests = parseInt(form.dataset.maxGuests, 10) || 20;

        // Tanggal minimum = hari ini (zona waktu perangkat)
        const today = new Date();
        today.setMinutes(today.getMinutes() - today.getTimezoneOffset());
        const todayStr = today.toISOString().slice(0, 10);
        form.elements.tanggal.min = todayStr;

        const validators = {
            nama: (v) => (v.trim().length >= 3 ? '' : 'Isi nama lengkap minimal 3 karakter.'),
            telepon: (v) => {
                const digits = v.replace(/[\s().-]/g, '');
                return /^(\+62|62|0)8\d{7,12}$/.test(digits) ? '' : 'Masukkan nomor WhatsApp Indonesia yang valid, mis. 0812 3456 7890.';
            },
            tanggal: (v) => {
                if (!v) return 'Pilih tanggal kedatangan.';
                return v < todayStr ? 'Tanggal tidak boleh sebelum hari ini.' : '';
            },
            jam: (v) => {
                if (!v) return 'Pilih jam kedatangan.';
                return v < timeMin || v > timeMax
                    ? `Pilih jam antara ${timeMin.replace(':', '.')} dan ${timeMax.replace(':', '.')}.`
                    : '';
            },
            tamu: (v) => {
                const n = parseInt(v, 10);
                return n >= 1 && n <= maxGuests ? '' : `Jumlah tamu 1 – ${maxGuests} orang. Untuk rombongan lebih besar, hubungi kami via WhatsApp.`;
            },
        };

        const setError = (name, message) => {
            const field = form.elements[name];
            const slot = $(`[data-kl-error="${name}"]`, form);
            if (slot) slot.textContent = message;
            field.setAttribute('aria-invalid', message ? 'true' : 'false');
            if (!message) field.removeAttribute('aria-invalid');
        };

        const check = (name) => {
            const message = validators[name](form.elements[name].value);
            setError(name, message);
            return !message;
        };

        Object.keys(validators).forEach((name) => {
            form.elements[name].addEventListener('blur', () => check(name));
            form.elements[name].addEventListener('input', () => {
                if (form.elements[name].getAttribute('aria-invalid') === 'true') check(name);
            });
        });

        form.addEventListener('submit', (event) => {
            const invalid = Object.keys(validators).filter((name) => !check(name));
            if (invalid.length) {
                event.preventDefault();
                form.elements[invalid[0]].focus();
                return;
            }

            // action="#" = mode demo (frontend statis): tidak ada data yang dikirim.
            if ((form.getAttribute('action') || '#') === '#') {
                event.preventDefault();
                form.reset();
                form.hidden = true;
                if (success) {
                    success.hidden = false;
                    success.focus();
                    success.scrollIntoView({ behavior: reduceMotion ? 'auto' : 'smooth', block: 'center' });
                }
            }
        });
    }

    /* ---------------------------------------------------------------------
       4. AI FAQ (statis)
       --------------------------------------------------------------------- */
    function initFaq() {
        const root = $('[data-kl-faq]');
        const dataNode = $('#kl-faq-data');
        if (!root || !dataNode) return;

        let data;
        try {
            data = JSON.parse(dataNode.textContent);
        } catch (e) {
            return;
        }

        const form = $('[data-kl-faq-form]', root);
        const input = $('[data-kl-faq-input]', root);
        const thread = $('[data-kl-faq-thread]', root);

        const matches = (question, keyword) => {
            const k = normalize(keyword);
            // kata kunci pendek dicocokkan sebagai kata utuh (mis. "wa") agar tidak salah cocok
            return k.length <= 3 ? new RegExp(`\\b${k}\\b`).test(question) : question.includes(k);
        };

        const findAnswer = (question) => {
            const q = normalize(question);
            let best = null;
            let bestScore = 0;

            data.items.forEach((item) => {
                const score = item.keywords.reduce((sum, keyword) => sum + (matches(q, keyword) ? normalize(keyword).length : 0), 0);
                if (score > bestScore) {
                    best = item;
                    bestScore = score;
                }
            });

            return best
                ? { text: best.answer, link: best.link }
                : { text: data.fallback, link: { label: data.whatsappLabel, url: data.whatsapp, external: true } };
        };

        const addBubble = (type) => {
            const bubble = document.createElement('div');
            bubble.className = `kl-bubble kl-bubble--${type}`;
            thread.appendChild(bubble);
            thread.hidden = false;
            thread.scrollTop = thread.scrollHeight;
            return bubble;
        };

        const renderAnswer = (bubble, answer) => {
            bubble.textContent = answer.text;
            if (answer.link) {
                const link = document.createElement('a');
                link.className = 'kl-bubble__link';
                link.href = answer.link.url;
                link.textContent = answer.link.label;
                if (answer.link.external) {
                    link.target = '_blank';
                    link.rel = 'noopener';
                }
                bubble.append(document.createElement('br'), link);
            }
            thread.scrollTop = thread.scrollHeight;
        };

        const ask = (question) => {
            const text = question.trim();
            if (!text) return;

            addBubble('user').textContent = text;

            const reply = addBubble('bot');
            reply.innerHTML = '<span class="kl-typing" aria-label="Sedang mengetik"><i></i><i></i><i></i></span>';

            // Simpan 3 percakapan terakhir saja
            while (thread.children.length > 6) thread.removeChild(thread.firstChild);

            window.setTimeout(() => renderAnswer(reply, findAnswer(text)), reduceMotion ? 0 : 550);
        };

        form.addEventListener('submit', (event) => {
            event.preventDefault();
            ask(input.value);
            input.value = '';
        });

        $$('[data-kl-faq-chip]', root).forEach((chip) =>
            chip.addEventListener('click', () => ask(chip.textContent))
        );
    }

    /* ---------------------------------------------------------------------
       5. SLIDER PROMO
       Track memakai CSS scroll-snap (bisa digeser/swipe tanpa JS). JS hanya
       menambah tombol, titik halaman, dan autoplay.
       --------------------------------------------------------------------- */
    function initPromos() {
        $$('[data-kl-promos]').forEach((root) => {
            const track = $('[data-kl-promo-track]', root);
            const slides = $$('.kl-promo', track);
            const nav = $('[data-kl-promo-nav]', root);
            const dotsBox = $('[data-kl-promo-dots]', root);
            if (!track || slides.length < 2 || !nav) return;

            const autoplay = root.dataset.autoplay === 'true' && !reduceMotion;
            const interval = Math.max(2500, parseInt(root.dataset.interval, 10) || 5500);
            let timer = null;
            let dots = [];

            const gap = () => parseFloat(getComputedStyle(track).columnGap) || 0;
            const step = () => slides[0].getBoundingClientRect().width + gap();
            const perView = () => Math.max(1, Math.round((track.clientWidth + gap()) / step()));
            const maxIndex = () => Math.max(0, slides.length - perView());
            const pages = () => Math.ceil(slides.length / perView());
            const index = () => Math.min(maxIndex(), Math.round(track.scrollLeft / step()));
            const page = () => (index() >= maxIndex() ? pages() - 1 : Math.min(pages() - 1, Math.round(index() / perView())));

            const goTo = (i, smooth = true) =>
                track.scrollTo({ left: Math.max(0, Math.min(i, maxIndex())) * step(), behavior: smooth && !reduceMotion ? 'smooth' : 'auto' });

            const paintDots = () => {
                const current = page();
                dots.forEach((dot, n) => {
                    dot.classList.toggle('is-active', n === current);
                    dot.setAttribute('aria-selected', String(n === current));
                });
            };

            const build = () => {
                const total = pages();
                nav.hidden = total <= 1;
                dotsBox.textContent = '';
                dots = Array.from({ length: total }, (_, n) => {
                    const dot = document.createElement('button');
                    dot.type = 'button';
                    dot.className = 'kl-promos__dot';
                    dot.setAttribute('role', 'tab');
                    dot.setAttribute('aria-label', `Promo halaman ${n + 1} dari ${total}`);
                    dot.addEventListener('click', () => { goTo(n * perView()); restart(); });
                    dotsBox.appendChild(dot);
                    return dot;
                });
                paintDots();
            };

            const next = () => (index() >= maxIndex() ? goTo(0) : goTo(index() + perView()));
            const prev = () => (index() <= 0 ? goTo(maxIndex()) : goTo(index() - perView()));

            const stop = () => { window.clearInterval(timer); timer = null; };
            const start = () => { if (autoplay && !timer) timer = window.setInterval(next, interval); };
            const restart = () => { stop(); start(); };

            $('[data-kl-promo-next]', root).addEventListener('click', () => { next(); restart(); });
            $('[data-kl-promo-prev]', root).addEventListener('click', () => { prev(); restart(); });

            let scrollTick = false;
            track.addEventListener('scroll', () => {
                if (scrollTick) return;
                scrollTick = true;
                window.requestAnimationFrame(() => { paintDots(); scrollTick = false; });
            }, { passive: true });

            track.addEventListener('keydown', (e) => {
                if (e.key === 'ArrowRight') { e.preventDefault(); next(); restart(); }
                if (e.key === 'ArrowLeft') { e.preventDefault(); prev(); restart(); }
            });

            // Jeda saat user berinteraksi atau tab tidak aktif
            ['mouseenter', 'focusin', 'touchstart'].forEach((ev) => root.addEventListener(ev, stop, { passive: true }));
            ['mouseleave', 'focusout'].forEach((ev) => root.addEventListener(ev, start));
            root.addEventListener('touchend', () => window.setTimeout(start, interval), { passive: true });
            document.addEventListener('visibilitychange', () => (document.hidden ? stop() : start()));

            if ('ResizeObserver' in window) new ResizeObserver(build).observe(track);
            build();
            start();
        });
    }

    /* --------------------------------------------------------------------- */
    const boot = () => {
        initNavbar();
        initMenu();
        initReservation();
        initFaq();
        initPromos();
    };

    if (document.readyState === 'loading') document.addEventListener('DOMContentLoaded', boot);
    else boot();
})();
