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

    /* 3. Slider generik: dipakai hero (panah) dan promo (titik). 1 slide = statis */
    const slider = (root, { slides, interval = 6500, dots = false, label = 'slide' }) => {
        if (slides.length < 2) return null;
        let idx = 0;
        let timer = null;
        const dotBtns = [];

        const go = (n) => {
            idx = (n + slides.length) % slides.length;
            slides.forEach((sl, i) => {
                const on = i === idx;
                sl.classList.toggle('is-active', on);
                sl.setAttribute('aria-hidden', String(!on));
            });
            dotBtns.forEach((b, i) => b.setAttribute('aria-current', String(i === idx)));
        };
        const stop = () => clearInterval(timer);
        const play = () => {
            stop();
            if (!reduceMotion) timer = setInterval(() => go(idx + 1), interval);
        };

        if (dots) {
            const wrap = document.createElement('div');
            wrap.className = 'lm-dots';
            slides.forEach((_, i) => {
                const b = document.createElement('button');
                b.type = 'button';
                b.setAttribute('aria-label', `Tampilkan ${label} ${i + 1}`);
                b.addEventListener('click', () => { go(i); play(); });
                wrap.append(b);
                dotBtns.push(b);
            });
            root.append(wrap);
        }

        root.addEventListener('mouseenter', stop);
        root.addEventListener('mouseleave', play);
        root.addEventListener('focusin', stop);
        root.addEventListener('focusout', play);

        let x0 = null;
        root.addEventListener('touchstart', (e) => { x0 = e.touches[0].clientX; }, { passive: true });
        root.addEventListener('touchend', (e) => {
            if (x0 === null) return;
            const dx = e.changedTouches[0].clientX - x0;
            x0 = null;
            if (Math.abs(dx) > 50) { go(idx + (dx < 0 ? 1 : -1)); play(); }
        });

        go(0);
        play();
        return { go: (n) => { go(n); play(); }, next: () => { go(idx + 1); play(); }, prev: () => { go(idx - 1); play(); } };
    };

    // Hero: panah kiri/kanan
    const hero = $('#beranda');
    if (hero) {
        const ctl = slider(hero, { slides: $$('.lm-slide', hero) });
        if (ctl) $$('[data-slide]', hero).forEach((btn) => btn.addEventListener('click', () => (btn.dataset.slide === 'next' ? ctl.next() : ctl.prev())));
    }

    // Promo: mode "slider" = bergantian (otomatis + titik). Mode "grid" = tampil bersamaan, tanpa JS.
    $$('.lm-promos[data-mode="slider"]').forEach((zone) => {
        slider(zone, {
            slides: $$(':scope > .lm-promo, :scope > .lm-banner', zone),
            interval: Number(zone.dataset.interval) || 6000,
            dots: true,
            label: 'promo',
        });
    });

    /* 5. Jam operasional: tandai hari ini */
    const today = new Date().getDay();
    $$('.lm-hours__table tr[data-days]').forEach((tr) => {
        tr.classList.toggle('is-today', tr.dataset.days.split(',').map(Number).includes(today));
    });

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
