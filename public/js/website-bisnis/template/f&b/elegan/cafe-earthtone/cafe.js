/* ==========================================================================
   The Lumière Café & Kitchen — F&B · Elegan · Cafe Earthtone
   Vanilla JS, tanpa dependensi. Setiap modul aman dijalankan walau elemennya
   tidak ada di halaman.
   Event untuk backend (opsional):
     - "lm:reservation"  → detail = data form reservasi
     - "lm:newsletter"   → detail = { email }
   ========================================================================== */
(() => {
    'use strict';

    const $ = (sel, ctx = document) => ctx.querySelector(sel);
    const $$ = (sel, ctx = document) => [...ctx.querySelectorAll(sel)];
    const reduceMotion = matchMedia('(prefers-reduced-motion: reduce)').matches;

    /* 1. Gambar gagal dimuat → sembunyikan, gradasi latar wadah yang tampil */
    const markBroken = (img) => img.classList.add('is-broken');
    document.addEventListener('error', (e) => {
        if (e.target instanceof HTMLImageElement) markBroken(e.target);
    }, true);
    $$('img').forEach((img) => { if (img.complete && img.naturalWidth === 0) markBroken(img); });

    /* 2. Navbar: menu mobile, bayangan saat scroll, tombol kembali ke atas */
    const nav = $('#navbar');
    const toTop = $('[data-top]');

    if (nav) {
        const toggle = $('.lm-nav__toggle', nav);
        const setOpen = (open) => {
            nav.classList.toggle('is-open', open);
            toggle.setAttribute('aria-expanded', String(open));
            toggle.setAttribute('aria-label', open ? 'Tutup menu' : 'Buka menu');
        };
        toggle.addEventListener('click', () => setOpen(!nav.classList.contains('is-open')));
        nav.addEventListener('click', (e) => { if (e.target.closest('a')) setOpen(false); });
        document.addEventListener('click', (e) => { if (!nav.contains(e.target)) setOpen(false); });
        document.addEventListener('keydown', (e) => { if (e.key === 'Escape') setOpen(false); });
        matchMedia('(min-width: 992px)').addEventListener('change', (e) => { if (e.matches) setOpen(false); });

        // Penanda menu aktif (hanya link yang menuju halaman ini)
        const links = $$('[data-spy]', nav).filter((a) => a.pathname === location.pathname && a.hash);
        const setActive = (id) => links.forEach((a) => a.classList.toggle('is-active', a.hash === `#${id}`));
        links.forEach((a) => a.addEventListener('click', () => setActive(a.hash.slice(1))));
        if (links.length && 'IntersectionObserver' in window) {
            const io = new IntersectionObserver((entries) => {
                entries.forEach((en) => { if (en.isIntersecting) setActive(en.target.id); });
            }, { rootMargin: '-40% 0px -55% 0px' });
            links.forEach((a) => { const t = $(a.hash); if (t) io.observe(t); });
        }
        if (links.length) setActive('beranda');
    }

    const onScroll = () => {
        if (nav) nav.classList.toggle('is-stuck', scrollY > 8);
        if (toTop) toTop.classList.toggle('is-visible', scrollY > 600);
    };
    addEventListener('scroll', onScroll, { passive: true });
    onScroll();
    if (toTop) toTop.addEventListener('click', () => scrollTo({ top: 0, behavior: reduceMotion ? 'auto' : 'smooth' }));

    /* 3. Hero: slider fade dengan panah. 1 slide = statis */
    const hero = $('#beranda');
    if (hero) {
        const slides = $$('.lm-slide', hero);
        if (slides.length > 1) {
            let idx = 0;
            let timer = null;
            const go = (n) => {
                idx = (n + slides.length) % slides.length;
                slides.forEach((sl, i) => {
                    sl.classList.toggle('is-active', i === idx);
                    sl.setAttribute('aria-hidden', String(i !== idx));
                });
            };
            const stop = () => clearInterval(timer);
            const play = () => { stop(); if (!reduceMotion) timer = setInterval(() => go(idx + 1), 6500); };

            $$('[data-slide]', hero).forEach((btn) => btn.addEventListener('click', () => {
                go(idx + (btn.dataset.slide === 'next' ? 1 : -1));
                play();
            }));
            hero.addEventListener('mouseenter', stop);
            hero.addEventListener('mouseleave', play);
            hero.addEventListener('focusin', stop);
            hero.addEventListener('focusout', play);

            let x0 = null;
            hero.addEventListener('touchstart', (e) => { x0 = e.touches[0].clientX; }, { passive: true });
            hero.addEventListener('touchend', (e) => {
                if (x0 === null) return;
                const dx = e.changedTouches[0].clientX - x0;
                x0 = null;
                if (Math.abs(dx) > 50) { go(idx + (dx < 0 ? 1 : -1)); play(); }
            });
            go(0);
            play();
        }
    }

    /* 4. Promo mode "slider": tampil bergantian, 1..N promo sekaligus (data-per-view).
          Jumlah sekaligus otomatis berkurang bila lebar zona tidak muat (data-min-width).
          Mode "grid": semua tampil bersamaan, murni CSS. */
    $$('.lm-promos[data-mode="slider"]').forEach((zone) => {
        const track = $('.lm-promos__track', zone);
        const items = [...track.children];
        const wanted = Math.max(1, Number(zone.dataset.perView) || 1);
        const minW = Number(zone.dataset.minWidth) || 320;
        const interval = Number(zone.dataset.interval) || 6000;
        const gap = 16;
        let pv = 1;
        let max = 0;
        let idx = 0;
        let timer = null;
        let dots = null;

        const render = () => {
            zone.style.setProperty('--pv', pv);
            zone.style.setProperty('--idx', idx);
            if (dots) [...dots.children].forEach((b, i) => b.setAttribute('aria-current', String(i === idx)));
            items.forEach((el, i) => el.setAttribute('aria-hidden', String(i < idx || i >= idx + pv)));
        };
        const go = (n) => { idx = n > max ? 0 : (n < 0 ? max : n); render(); };
        const stop = () => clearInterval(timer);
        const play = () => { stop(); if (!reduceMotion && max > 0) timer = setInterval(() => go(idx + 1), interval); };

        const layout = () => {
            const fit = Math.max(1, Math.floor((zone.clientWidth + gap) / (minW + gap)));
            pv = Math.min(wanted, fit, items.length);
            max = items.length - pv;
            idx = Math.min(idx, max);
            if (dots) dots.remove();
            dots = null;
            if (max > 0) {
                dots = document.createElement('div');
                dots.className = 'lm-dots';
                for (let i = 0; i <= max; i++) {
                    const b = document.createElement('button');
                    b.type = 'button';
                    b.setAttribute('aria-label', `Tampilkan promo ${i + 1}`);
                    b.addEventListener('click', () => { go(i); play(); });
                    dots.append(b);
                }
                zone.append(dots);
            }
            render(); // menerapkan --pv dulu, baru ukur lebar kartu
            zone.dataset.compact = String(items[0].getBoundingClientRect().width < 480);
            play();
        };

        zone.addEventListener('mouseenter', stop);
        zone.addEventListener('mouseleave', play);
        zone.addEventListener('focusin', stop);
        zone.addEventListener('focusout', play);
        let x0 = null;
        zone.addEventListener('touchstart', (e) => { x0 = e.touches[0].clientX; }, { passive: true });
        zone.addEventListener('touchend', (e) => {
            if (x0 === null || max === 0) return;
            const dx = e.changedTouches[0].clientX - x0;
            x0 = null;
            if (Math.abs(dx) > 50) { go(idx + (dx < 0 ? 1 : -1)); play(); }
        });

        if ('ResizeObserver' in window) {
            let lastW = -1;
            new ResizeObserver(() => {
                const w = Math.round(zone.clientWidth);
                if (w !== lastW) { lastW = w; layout(); }
            }).observe(zone);
        } else {
            layout();
            addEventListener('resize', layout);
        }
    });

    // Mode grid: hanya perlu menandai kartu sempit
    $$('.lm-promos[data-mode="grid"]').forEach((zone) => {
        const mark = () => {
            const first = $('.lm-promos__track > *', zone);
            if (first) zone.dataset.compact = String(first.getBoundingClientRect().width < 480);
        };
        if ('ResizeObserver' in window) new ResizeObserver(mark).observe(zone);
        else { mark(); addEventListener('resize', mark); }
    });

    /* 4b. Halaman Menu: filter kategori (menampilkan/menyembunyikan grup). Bisa dibuka langsung: /menu#kopi */
    const groups = $$('[data-group]');
    if (groups.length) {
        const tabs = $$('[data-filter]');
        const bar = $('.lm-tabsbar');
        const navEl = $('#navbar');

        const apply = (cat) => {
            groups.forEach((g) => { g.hidden = !(cat === 'all' || g.dataset.group === cat); });
            tabs.forEach((t) => {
                const active = t.dataset.filter === cat;
                t.classList.toggle('is-active', active);
                t.setAttribute('aria-pressed', String(active));
            });
        };

        // Gulir otomatis: judul grup + kartu menu langsung terlihat tepat di bawah navbar dan tab
        const showMenu = (instant) => {
            const first = groups.find((g) => !g.hidden);
            if (!first) return;
            const offset = (navEl ? navEl.offsetHeight : 0) + (bar ? bar.offsetHeight : 0) + 24;
            const y = first.getBoundingClientRect().top + window.pageYOffset - offset;
            scrollTo({ top: Math.max(0, y), behavior: (instant || reduceMotion) ? 'auto' : 'smooth' });
        };

        tabs.forEach((t) => t.addEventListener('click', () => {
            apply(t.dataset.filter);
            history.replaceState(null, '', t.dataset.filter === 'all' ? location.pathname : `#${t.dataset.filter}`);
            showMenu(false);
        }));

        const fromHash = () => {
            const h = location.hash.slice(1);
            if (tabs.some((t) => t.dataset.filter === h)) { apply(h); showMenu(true); }
        };
        fromHash();
        addEventListener('hashchange', fromHash);
    }

    /* 5. Jam operasional: tandai hari ini */
    const today = new Date().getDay();
    $$('.lm-hours__table tr[data-days]').forEach((tr) => {
        tr.classList.toggle('is-today', tr.dataset.days.split(',').map(Number).includes(today));
    });

    /* 5b. Peta lokasi: terkunci sampai diklik/diketuk (agar tidak menangkap scroll halaman) */
    const map = $('[data-map]');
    if (map) {
        const lock = $('.lm-map__lock', map);
        const unlock = () => map.classList.add('is-active');
        const relock = () => map.classList.remove('is-active');
        lock.addEventListener('click', unlock);
        map.addEventListener('mouseleave', relock);
        document.addEventListener('touchstart', (e) => { if (!map.contains(e.target)) relock(); }, { passive: true });
    }

    /* 6. Reservasi (halaman sendiri): kirim ke WhatsApp */
    const rform = $('#reservasi-form');
    if (rform) {
        const status = $('.lm-form__status', rform);
        const isoToday = () => new Date(Date.now() - new Date().getTimezoneOffset() * 60000).toISOString().slice(0, 10);
        rform.elements.tanggal.min = isoToday();

        rform.addEventListener('submit', (e) => {
            e.preventDefault(); // submit hanya terpicu bila validasi bawaan browser lolos
            const d = Object.fromEntries(new FormData(rform));
            const tanggal = new Date(`${d.tanggal}T00:00`).toLocaleDateString('id-ID', {
                weekday: 'long', day: 'numeric', month: 'long', year: 'numeric',
            });
            const text = [
                `Halo ${rform.dataset.brand}, saya ingin reservasi meja:`,
                `Nama: ${d.nama}`,
                `No. WhatsApp: ${d.telepon}`,
                `Tanggal: ${tanggal}`,
                `Jam: ${d.jam}`,
                `Jumlah tamu: ${d.tamu} orang`,
                d.catatan ? `Catatan: ${d.catatan}` : '',
            ].filter(Boolean).join('\n');

            rform.dispatchEvent(new CustomEvent('lm:reservation', { bubbles: true, detail: d }));
            window.open(`https://wa.me/${rform.dataset.wa}?text=${encodeURIComponent(text)}`, '_blank', 'noopener');
            rform.reset();
            status.hidden = false;
            status.textContent = 'Reservasi Anda dibuka di WhatsApp. Kirim pesannya untuk menyelesaikan reservasi.';
        });
    }

    /* 7. AI FAQ: pencocokan kata kunci di browser (statis) */
    const faq = $('#faq');
    if (faq) {
        const data = JSON.parse(faq.dataset.faq || '[]');
        const fallback = faq.dataset.fallback || '';
        const form = $('form', faq);
        const input = $('input', faq);
        const box = $('.lm-faq__answer', faq);
        let timer = null;

        const norm = (s) => s.toLowerCase().normalize('NFD').replace(/[\u0300-\u036f]/g, '').replace(/[^a-z0-9\s]/g, ' ');
        const find = (q) => {
            const n = norm(q);
            let best = null;
            let top = 0;
            data.forEach((it) => {
                let score = norm(it.q) === n ? 99 : 0;
                it.keywords.forEach((k) => { if (n.includes(norm(k))) score++; });
                if (score > top) { top = score; best = it; }
            });
            return best;
        };

        // Titik sambung AI backend: ganti isi find()/ask() dengan fetch ke endpoint Anda.
        const ask = (q) => {
            q = q.trim();
            if (!q) return;
            box.hidden = false;
            box.innerHTML = '<span class="lm-typing" aria-label="Sedang mengetik"><i></i><i></i><i></i></span>';
            clearTimeout(timer);
            timer = setTimeout(() => {
                const hit = find(q);
                const title = document.createElement('b');
                const body = document.createElement('span');
                title.textContent = hit ? hit.q : 'Belum ada jawabannya';
                body.textContent = hit ? hit.a : fallback;
                box.replaceChildren(title, body);
            }, reduceMotion ? 0 : 600);
        };

        form.addEventListener('submit', (e) => { e.preventDefault(); ask(input.value); });
        $$('[data-q]', faq).forEach((chip) => chip.addEventListener('click', () => {
            input.value = chip.textContent.trim();
            ask(input.value);
        }));
    }
    // Ikon cari di navbar → fokus ke kolom FAQ
    $$('[data-faq-focus]').forEach((a) => a.addEventListener('click', () => {
        setTimeout(() => { const f = $('#faq-q'); if (f) f.focus({ preventScroll: true }); }, 450);
    }));

    /* 8. Newsletter footer (statis) */
    const news = $('.lm-news');
    if (news) {
        const msg = $('.lm-news__msg');
        news.addEventListener('submit', (e) => {
            e.preventDefault();
            const field = news.elements.email;
            const ok = field.value.trim() !== '' && field.checkValidity();
            msg.hidden = false;
            msg.textContent = ok ? 'Terima kasih! Email Anda sudah kami terima.' : 'Masukkan alamat email yang valid.';
            if (ok) {
                news.dispatchEvent(new CustomEvent('lm:newsletter', { bubbles: true, detail: { email: field.value.trim() } }));
                news.reset();
            }
        });
    }
})();
