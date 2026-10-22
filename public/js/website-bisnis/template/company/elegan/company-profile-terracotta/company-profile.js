/* Company Profile — Elegan / Terracotta. Vanilla JS, tanpa dependensi. */
(() => {
  'use strict';
  const $ = (s, r = document) => r.querySelector(s);
  const $$ = (s, r = document) => [...r.querySelectorAll(s)];

  /* navbar mobile */
  const nav = $('#cp-nav'), menu = $('#cp-menu'), burger = $('.cp-burger');
  const closeMenu = () => { menu.classList.remove('is-open'); burger.setAttribute('aria-expanded', 'false'); };
  burger.addEventListener('click', () => {
    const open = menu.classList.toggle('is-open');
    burger.setAttribute('aria-expanded', String(open));
  });
  menu.addEventListener('click', e => e.target.closest('a') && closeMenu());
  document.addEventListener('keydown', e => e.key === 'Escape' && closeMenu());
  addEventListener('resize', () => innerWidth > 1024 && closeMenu());

  /* bayangan navbar + tombol ke atas */
  const toTop = $('.cp-totop');
  const onScroll = () => {
    nav.classList.toggle('is-stuck', scrollY > 8);
    toTop.classList.toggle('is-show', scrollY > 600);
  };
  addEventListener('scroll', onScroll, { passive: true });
  onScroll();
  toTop.addEventListener('click', () => scrollTo({ top: 0, behavior: 'smooth' }));

  /* menu aktif sesuai section */
  const links = $$('a', menu).filter(a => a.getAttribute('href').startsWith('#'));
  const byId = new Map(links.map(a => [a.getAttribute('href').slice(1), a]));
  if ('IntersectionObserver' in window) {
    const io = new IntersectionObserver(entries => entries.forEach(e => {
      if (!e.isIntersecting) return;
      links.forEach(l => l.classList.remove('is-active'));
      byId.get(e.target.id)?.classList.add('is-active');
    }), { rootMargin: '-40% 0px -55% 0px' });
    byId.forEach((_, id) => { const el = document.getElementById(id); if (el) io.observe(el); });
  }

  /* kirim isi form ke WhatsApp (dipanggil langsung dari event klik/submit agar tidak diblokir popup blocker) */
  const toWhatsApp = f => {
    const d = Object.fromEntries(new FormData(f));
    const jenis = d.type === 'penawaran' ? 'Permintaan penawaran' : 'Pesan kontak';
    const text = [f.dataset.waIntro, '', `Jenis: ${jenis}`, `Nama: ${d.name}`, `Email: ${d.email}`, `Layanan: ${d.service}`, `Pesan: ${d.message}`].join('\n');
    const a = document.createElement('a');
    a.href = `https://wa.me/${f.dataset.waNumber}?text=${encodeURIComponent(text)}`;
    a.target = '_blank';
    a.rel = 'noopener';
    a.click();
  };

  /* form kontak & penawaran: buka WhatsApp; bila data-endpoint diisi, data juga dikirim ke backend */
  $$('[data-cp-form]').forEach(form => {
    const status = $('.cp-form__status', form), btn = $('[type=submit]', form);
    const say = (msg, s) => { status.textContent = msg; status.dataset.s = s; };
    form.addEventListener('submit', async e => {
      e.preventDefault();
      if (!form.checkValidity()) { form.reportValidity(); return say('Lengkapi semua kolom yang wajib diisi.', 'err'); }
      const wa = !!form.dataset.waNumber;
      if (wa) toWhatsApp(form);
      btn.disabled = true;
      try {
        const url = form.dataset.endpoint;
        if (url) {
          const res = await fetch(url, { method: 'POST', body: new FormData(form), headers: { Accept: 'application/json' } });
          if (!res.ok) throw new Error(res.status);
        }
        form.reset();
        say(wa ? 'Terima kasih! Lanjutkan pengiriman pesan di WhatsApp.' : 'Terima kasih! Pesan Anda sudah kami terima.', 'ok');
      } catch {
        say('Pesan belum terkirim. Coba lagi beberapa saat.', 'err');
      }
      btn.disabled = false;
    });
  });

  /* tombol penawaran → isi formulir kontak sebagai permintaan penawaran */
  $$('[data-quote]').forEach(a => a.addEventListener('click', () => {
    const f = $('#kontak form'); if (!f) return;
    const el = n => f.elements.namedItem(n);
    el('type').value = 'penawaran';
    if (!el('message').value) el('message').value = 'Saya ingin meminta penawaran untuk proyek: ';
    setTimeout(() => el('name').focus({ preventScroll: true }), 600);
  }));

  /* AI company FAQ */
  const ai = $('#cp-ai');
  if (ai) {
    const panel = $('.cp-ai__panel', ai), log = $('.cp-ai__log', ai), fab = $('.cp-ai__fab', ai);
    const form = $('.cp-ai__form', ai), input = $('input', form);
    const faq = JSON.parse($('#cp-ai-data').textContent), fallback = ai.dataset.fallback;
    const KEY = 'cp-ai-open';

    const setOpen = open => {
      panel.hidden = !open;
      ai.classList.toggle('is-open', open);
      fab.setAttribute('aria-expanded', String(open));
      try { sessionStorage.setItem(KEY, open ? '1' : '0'); } catch {}
    };
    const say = (text, me) => {
      const p = document.createElement('p');
      p.className = 'cp-ai__msg' + (me ? ' is-me' : '');
      p.textContent = text;
      log.append(p);
      log.scrollTop = log.scrollHeight;
    };
    const answer = q => {
      const s = q.toLowerCase();
      const hit = faq.find(f => f.q.toLowerCase() === s || f.keys.some(k => s.includes(k)));
      setTimeout(() => say(hit ? hit.a : fallback), 350);
    };

    $$('[data-ai-q]', ai).forEach(b => b.addEventListener('click', () => { say(b.textContent, true); answer(b.textContent); }));
    form.addEventListener('submit', e => {
      e.preventDefault();
      const q = input.value.trim();
      if (!q) return;
      say(q, true); answer(q); input.value = '';
    });
    $$('[data-ai-open]', ai).forEach(b => b.addEventListener('click', () => { setOpen(true); input.focus(); }));
    $$('[data-ai-close]', ai).forEach(b => b.addEventListener('click', () => { setOpen(false); fab.focus(); }));

    let saved = null;
    try { saved = sessionStorage.getItem(KEY); } catch {}
    setOpen(saved ? saved === '1' : innerWidth >= 1280); // terbuka otomatis hanya di layar lebar, seperti desain
  }
})();
