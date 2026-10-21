/* GreenEstate — Premium Minimal · Nature Green        WEBIA by D-KREASI
   Vanilla JS, tanpa dependensi. Setiap modul berdiri sendiri dan aman bila elemennya tidak ada. */
(() => {
    'use strict';

    const $ = (sel, ctx = document) => ctx.querySelector(sel);
    const $$ = (sel, ctx = document) => Array.from(ctx.querySelectorAll(sel));
    const reduceMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

    /* 1. Fallback gambar: bila file belum ada, latar hijau .media tetap tampil rapi */
    $$('img[data-fallback]').forEach((img) => {
        const miss = () => img.classList.add('is-missing');
        if (img.complete && img.naturalWidth === 0) miss();
        img.addEventListener('error', miss, { once: true });
    });

    /* 2. Navbar: sticky shadow, menu mobile, pencarian */
    const navbar = $('[data-navbar]');
    if (navbar) {
        const toggle = $('[data-nav-toggle]', navbar);
        const setOpen = (open) => {
            navbar.classList.toggle('is-open', open);
            toggle?.setAttribute('aria-expanded', String(open));
            toggle?.setAttribute('aria-label', open ? 'Tutup menu' : 'Buka menu');
            document.body.classList.toggle('no-scroll', open);
        };
        toggle?.addEventListener('click', () => setOpen(!navbar.classList.contains('is-open')));
        $$('.nav a', navbar).forEach((a) => a.addEventListener('click', () => setOpen(false)));
        window.matchMedia('(min-width: 992px)').addEventListener('change', (e) => e.matches && setOpen(false));

        const onScroll = () => navbar.classList.toggle('is-stuck', window.scrollY > 8);
        onScroll();
        window.addEventListener('scroll', onScroll, { passive: true });

        const sBtn = $('[data-search-toggle]', navbar);
        const sBox = $('[data-search-box]', navbar);
        const setSearch = (open) => {
            if (!sBtn || !sBox) return;
            sBox.hidden = !open;
            sBtn.setAttribute('aria-expanded', String(open));
            if (open) $('input', sBox).focus();
        };
        sBtn?.addEventListener('click', () => setSearch(sBox.hidden));

        document.addEventListener('keydown', (e) => {
            if (e.key !== 'Escape') return;
            setOpen(false);
            setSearch(false);
        });
    }

    /* 3. Hero slider */
    const hero = $('[data-hero]');
    if (hero) {
        const slides = $$('[data-slide]', hero);
        const current = $('[data-hero-current]', hero);
        let index = 0;
        let timer = null;

        const go = (n) => {
            index = (n + slides.length) % slides.length;
            slides.forEach((s, k) => {
                const on = k === index;
                s.classList.toggle('is-active', on);
                s.setAttribute('aria-hidden', String(!on));
            });
            if (current) current.textContent = String(index + 1);
        };
        const stop = () => clearInterval(timer);
        const play = () => {
            stop();
            if (!reduceMotion && slides.length > 1) timer = setInterval(() => go(index + 1), 6500);
        };

        $('[data-hero-prev]', hero)?.addEventListener('click', () => { go(index - 1); play(); });
        $('[data-hero-next]', hero)?.addEventListener('click', () => { go(index + 1); play(); });
        hero.addEventListener('mouseenter', stop);
        hero.addEventListener('mouseleave', play);
        hero.addEventListener('focusin', stop);
        hero.addEventListener('focusout', play);
        document.addEventListener('visibilitychange', () => (document.hidden ? stop() : play()));
        go(0);
        play();
    }

    /* 4. Input tanggal / waktu: tampil sebagai placeholder, berubah jadi picker native saat fokus */
    const localToday = () => new Date(Date.now() - new Date().getTimezoneOffset() * 60000).toISOString().slice(0, 10);
    const initPicker = (input) => {
        const type = input.dataset.picker;
        const toNative = () => {
            input.type = type;
            if (type === 'date') input.min = localToday();
            try { input.showPicker?.(); } catch (_) { /* browser lama: abaikan */ }
        };
        const toText = () => { if (!input.value) input.type = 'text'; };
        input.type = input.value ? type : 'text';
        input.addEventListener('focus', toNative);
        input.addEventListener('blur', toText);
        input.form?.addEventListener('reset', () => setTimeout(toText));
    };
    $$('[data-picker]').forEach(initPicker);

    /* 5. Form (inquiry & booking): validasi native + kirim.
          Backend: isi data-endpoint / action pada <form>; tanpa itu form hanya simulasi sukses. */
    $$('form[data-form]').forEach((form) => {
        const status = $('[data-form-status]', form);
        const say = (msg, ok) => {
            if (!status) return;
            status.textContent = msg;
            status.className = 'form-status ' + (ok ? 'is-ok' : 'is-err');
        };

        form.addEventListener('submit', async (e) => {
            e.preventDefault();
            if (!form.checkValidity()) { form.reportValidity(); return; }

            const btn = $('[type="submit"]', form);
            if (btn) btn.disabled = true;
            try {
                const endpoint = form.dataset.endpoint;
                if (endpoint) {
                    const token = $('meta[name="csrf-token"]')?.content;
                    const res = await fetch(endpoint, {
                        method: 'POST',
                        body: new FormData(form),
                        headers: { 'X-Requested-With': 'XMLHttpRequest', ...(token ? { 'X-CSRF-TOKEN': token } : {}) },
                    });
                    if (!res.ok) throw new Error(String(res.status));
                } else {
                    await new Promise((r) => setTimeout(r, 450));
                }
                form.reset();
                say(form.dataset.success || 'Terkirim.', true);
                form.dispatchEvent(new CustomEvent('ge:sent', { bubbles: true }));
            } catch (_) {
                say('Gagal mengirim. Periksa koneksi Anda lalu coba lagi.', false);
            } finally {
                if (btn) btn.disabled = false;
            }
        });
    });

    /* 6. Favorit (visual saja) */
    $$('[data-fav]').forEach((btn) => btn.addEventListener('click', () => {
        btn.setAttribute('aria-pressed', String(btn.getAttribute('aria-pressed') !== 'true'));
    }));

    /* 7. Lightbox galeri */
    const lbItems = $$('[data-lightbox]');
    if (lbItems.length) {
        const box = document.createElement('div');
        box.className = 'lightbox';
        box.hidden = true;
        box.setAttribute('role', 'dialog');
        box.setAttribute('aria-modal', 'true');
        box.setAttribute('aria-label', 'Galeri foto');
        box.innerHTML =
            '<button type="button" class="lightbox__close" aria-label="Tutup" data-lb-close><svg class="i"><use href="#i-close"/></svg></button>' +
            '<button type="button" aria-label="Foto sebelumnya" data-lb-prev><svg class="i"><use href="#i-left"/></svg></button>' +
            '<figure><img alt=""><figcaption></figcaption></figure>' +
            '<button type="button" aria-label="Foto berikutnya" data-lb-next><svg class="i"><use href="#i-right"/></svg></button>';
        document.body.appendChild(box);

        const img = $('img', box);
        const cap = $('figcaption', box);
        let i = 0;
        let opener = null;

        const show = (n) => {
            i = (n + lbItems.length) % lbItems.length;
            img.src = lbItems[i].dataset.src;
            img.alt = cap.textContent = lbItems[i].dataset.caption || '';
        };
        const open = (n) => { opener = document.activeElement; show(n); box.hidden = false; document.body.classList.add('no-scroll'); $('[data-lb-close]', box).focus(); };
        const close = () => { box.hidden = true; document.body.classList.remove('no-scroll'); opener?.focus(); };

        lbItems.forEach((el, n) => el.addEventListener('click', () => open(n)));
        $('[data-lb-close]', box).addEventListener('click', close);
        $('[data-lb-prev]', box).addEventListener('click', () => show(i - 1));
        $('[data-lb-next]', box).addEventListener('click', () => show(i + 1));
        box.addEventListener('click', (e) => { if (e.target === box) close(); });
        document.addEventListener('keydown', (e) => {
            if (box.hidden) return;
            if (e.key === 'Escape') close();
            if (e.key === 'ArrowLeft') show(i - 1);
            if (e.key === 'ArrowRight') show(i + 1);
        });
    }

    /* 8. AI Property Assistant (FAQ berbasis kata kunci, data dari config lewat data-faq) */
    const ai = $('[data-ai]');
    if (ai) {
        let faq = [];
        try { faq = JSON.parse(ai.dataset.faq || '[]'); } catch (_) { faq = []; }

        const btn = $('[data-ai-toggle]', ai);
        const panel = $('[data-ai-panel]', ai);
        const log = $('[data-ai-log]', ai);
        const form = $('[data-ai-form]', ai);
        const input = $('input', form);
        const tip = $('[data-ai-tip]', ai);
        let greeted = false;

        const norm = (s) => s.toLowerCase().normalize('NFD').replace(/[\u0300-\u036f]/g, '').replace(/[^a-z0-9\s]/g, ' ');
        const scroll = () => { log.scrollTop = log.scrollHeight; };
        const add = (text, who) => {
            const el = document.createElement('div');
            el.className = 'msg msg--' + who;
            el.textContent = text;
            log.appendChild(el);
            scroll();
            return el;
        };
        const find = (q) => {
            const n = norm(q);
            let best = null;
            let top = 0;
            faq.forEach((f) => {
                let score = f.keywords.reduce((sum, k) => sum + (n.includes(norm(k)) ? 1 : 0), 0);
                if (norm(f.q).trim() === n.trim()) score += 5;
                if (score > top) { top = score; best = f; }
            });
            return best;
        };
        const ask = (q) => {
            q = q.trim();
            if (!q) return;
            add(q, 'user');
            const typing = add('', 'bot');
            typing.classList.add('msg--typing');
            typing.innerHTML = '<i></i><i></i><i></i>';
            setTimeout(() => {
                const hit = find(q);
                typing.classList.remove('msg--typing');
                typing.textContent = hit ? hit.a : ai.dataset.fallback;
                if (!hit && ai.dataset.wa) {
                    const a = document.createElement('a');
                    a.href = ai.dataset.wa; a.target = '_blank'; a.rel = 'noopener';
                    a.textContent = 'Chat via WhatsApp';
                    typing.appendChild(document.createElement('br'));
                    typing.appendChild(a);
                }
                scroll();
            }, reduceMotion ? 0 : 650);
        };

        const setOpen = (open) => {
            panel.classList.toggle('is-open', open);
            panel.setAttribute('aria-hidden', String(!open));
            btn.setAttribute('aria-expanded', String(open));
            tip.classList.remove('is-show');
            if (open) {
                if (!greeted) { greeted = true; add('Halo! Saya asisten GreenEstate. Ada yang ingin Anda ketahui tentang properti ini?', 'bot'); }
                input.focus();
            } else {
                btn.focus();
            }
        };
        panel.setAttribute('aria-hidden', 'true');
        btn.addEventListener('click', () => setOpen(!panel.classList.contains('is-open')));
        $('[data-ai-close]', ai).addEventListener('click', () => setOpen(false));
        document.addEventListener('keydown', (e) => { if (e.key === 'Escape' && panel.classList.contains('is-open')) setOpen(false); });
        $$('[data-q]', ai).forEach((c) => c.addEventListener('click', () => ask(c.dataset.q)));
        form.addEventListener('submit', (e) => { e.preventDefault(); ask(input.value); input.value = ''; });

        // Gelembung sapaan muncul sekali per sesi
        try {
            if (!sessionStorage.getItem('ge-ai-tip')) {
                setTimeout(() => {
                    if (panel.classList.contains('is-open')) return;
                    tip.classList.add('is-show');
                    sessionStorage.setItem('ge-ai-tip', '1');
                    setTimeout(() => tip.classList.remove('is-show'), 5000);
                }, 3500);
            }
        } catch (_) { /* storage dinonaktifkan: lewati */ }
    }
})();
