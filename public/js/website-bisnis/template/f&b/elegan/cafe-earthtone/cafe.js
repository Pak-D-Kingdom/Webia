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

        // Penanda menu aktif
        const links = $$('[data-spy]', nav);
        const setActive = (id) => links.forEach((a) => a.classList.toggle('is-active', a.getAttribute('href') === `#${id}`));
        links.forEach((a) => a.addEventListener('click', () => setActive(a.getAttribute('href').slice(1))));
        if ('IntersectionObserver' in window) {
            const io = new IntersectionObserver((entries) => {
                entries.forEach((en) => { if (en.isIntersecting) setActive(en.target.id); });
            }, { rootMargin: '-40% 0px -55% 0px' });
            links.forEach((a) => { const t = $(a.getAttribute('href')); if (t) io.observe(t); });
        }
        setActive('beranda');
    }

    const onScroll = () => {
        if (nav) nav.classList.toggle('is-stuck', scrollY > 8);
        if (toTop) toTop.classList.toggle('is-visible', scrollY > 600);
    };
    addEventListener('scroll', onScroll, { passive: true });
    onScroll();
    if (toTop) toTop.addEventListener('click', () => scrollTo({ top: 0, behavior: reduceMotion ? 'auto' : 'smooth' }));

    /* 3. Hero slider: panah, autoplay, geser (swipe) */
    const hero = $('#beranda');
    if (hero) {
        const slides = $$('.lm-slide', hero);
        let idx = 0;
        let timer = null;

        const go = (n) => {
            idx = (n + slides.length) % slides.length;
            slides.forEach((s, i) => {
                const on = i === idx;
                s.classList.toggle('is-active', on);
                s.setAttribute('aria-hidden', String(!on));
            });
        };
        const stop = () => clearInterval(timer);
        const play = () => {
            stop();
            if (!reduceMotion && slides.length > 1) timer = setInterval(() => go(idx + 1), 6500);
        };

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

    /* 4. Menu: filter kategori. Tab "Semua" dibatasi oleh data-limit */
    const grid = $('#menu-grid');
    if (grid) {
        const items = $$('.lm-product', grid);
        const tabs = $$('[data-filter]');
        const empty = $('.lm-empty');
        const limit = Number(grid.dataset.limit) || Infinity;

        const apply = (cat) => {
            let shown = 0;
            items.forEach((el) => {
                const match = cat === 'all' ? shown < limit : el.dataset.category === cat;
                el.hidden = !match;
                if (match) shown++;
            });
            if (empty) empty.hidden = shown > 0;
            tabs.forEach((t) => {
                const on = t.dataset.filter === cat;
                t.classList.toggle('is-active', on);
                t.setAttribute('aria-pressed', String(on));
            });
        };
        tabs.forEach((t) => t.addEventListener('click', () => apply(t.dataset.filter)));
    }

    /* 5. Jam operasional: tandai hari ini */
    const today = new Date().getDay();
    $$('.lm-hours__table tr[data-days]').forEach((tr) => {
        tr.classList.toggle('is-today', tr.dataset.days.split(',').map(Number).includes(today));
    });

    /* 6. Reservasi: dialog + kirim ke WhatsApp */
    const modal = $('#reservasi-modal');
    if (modal && typeof modal.showModal === 'function') {
        const form = $('form', modal);
        const isoToday = () => new Date(Date.now() - new Date().getTimezoneOffset() * 60000).toISOString().slice(0, 10);

        $$('[data-modal-open]').forEach((btn) => btn.addEventListener('click', () => {
            form.elements.tanggal.min = isoToday();
            modal.showModal();
        }));
        $$('[data-modal-close]', modal).forEach((btn) => btn.addEventListener('click', () => modal.close()));
        modal.addEventListener('click', (e) => { if (e.target === modal) modal.close(); });

        form.addEventListener('submit', (e) => {
            e.preventDefault(); // submit hanya terpicu bila validasi bawaan browser lolos
            const d = Object.fromEntries(new FormData(form));
            const tanggal = new Date(`${d.tanggal}T00:00`).toLocaleDateString('id-ID', {
                weekday: 'long', day: 'numeric', month: 'long', year: 'numeric',
            });
            const text = [
                `Halo ${form.dataset.brand}, saya ingin reservasi meja:`,
                `Nama: ${d.nama}`,
                `No. WhatsApp: ${d.telepon}`,
                `Tanggal: ${tanggal}`,
                `Jam: ${d.jam}`,
                `Jumlah tamu: ${d.tamu} orang`,
                d.catatan ? `Catatan: ${d.catatan}` : '',
            ].filter(Boolean).join('\n');

            form.dispatchEvent(new CustomEvent('lm:reservation', { bubbles: true, detail: d }));
            window.open(`https://wa.me/${form.dataset.wa}?text=${encodeURIComponent(text)}`, '_blank', 'noopener');
            form.reset();
            modal.close();
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
