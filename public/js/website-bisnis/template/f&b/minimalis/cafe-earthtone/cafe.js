'use strict';
(() => {
  const $ = (s, c = document) => c.querySelector(s);
  const $$ = (s, c = document) => [...c.querySelectorAll(s)];

  /* ---------- Navbar: tombol mobile + link aktif saat scroll ---------- */
  const toggle = $('#navToggle'), links = $('#navLinks');
  if (toggle && links) {
    const setNav = open => { links.classList.toggle('open', open); toggle.setAttribute('aria-expanded', open); };
    toggle.addEventListener('click', () => setNav(!links.classList.contains('open')));
    links.addEventListener('click', e => e.target.closest('a') && setNav(false));
    document.addEventListener('keydown', e => e.key === 'Escape' && setNav(false));

    // scrollspy hanya untuk anchor yang ada di halaman ini (beranda)
    const spy = new IntersectionObserver(entries => entries.forEach(en => {
      if (en.isIntersecting) $$('.nav__links a').forEach(a => a.classList.toggle('active', a.hash === '#' + en.target.id));
    }), { rootMargin: '-45% 0px -50% 0px' });
    $$('.nav__links a').forEach(a => {
      if (a.hash && a.pathname === location.pathname) { const s = $(a.hash); s && spy.observe(s); }
    });
  }

  /* ---------- Promo: slider (bergantian) atau grid (bersamaan) ---------- */
  const promo = $('[data-promo]');
  if (promo && promo.dataset.mode === 'slider') {
    const track = $('.promo-track', promo), cards = $$('.promo-card', track), dotsBox = $('.promo-dots', promo);
    const perView = Math.max(1, +promo.dataset.perView || 1), delay = +promo.dataset.autoplay || 0;
    const reduce = matchMedia('(prefers-reduced-motion: reduce)').matches;
    let n = perView, page = 0, timer;
    const pages = () => Math.max(1, Math.ceil(cards.length / n));
    const mark = () => $$('button', dotsBox).forEach((d, i) => d.setAttribute('aria-current', i === page));
    const go = p => {
      page = (p + pages()) % pages();
      const first = Math.max(0, Math.min(page * n, cards.length - n));
      track.scrollTo({ left: cards[first].offsetLeft - cards[0].offsetLeft, behavior: reduce ? 'auto' : 'smooth' });
      mark();
    };
    const stop = () => clearInterval(timer);
    const start = () => { stop(); if (delay && pages() > 1 && !reduce) timer = setInterval(() => go(page + 1), delay); };
    const build = () => {
      n = innerWidth < 640 ? 1 : innerWidth < 1024 ? Math.min(perView, 2) : perView;   // tablet maks 2, HP 1
      promo.style.setProperty('--n', n);
      promo.classList.toggle('is-single', pages() === 1);
      page = Math.min(page, pages() - 1);
      dotsBox.replaceChildren(...Array.from({ length: pages() }, (_, i) => {
        const b = document.createElement('button');
        b.type = 'button'; b.setAttribute('aria-label', 'Promo halaman ' + (i + 1));
        b.addEventListener('click', () => { go(i); start(); });
        return b;
      }));
      go(page); start();
    };
    $('[data-prev]', promo).addEventListener('click', () => { go(page - 1); start(); });
    $('[data-next]', promo).addEventListener('click', () => { go(page + 1); start(); });
    ['mouseenter', 'focusin', 'touchstart'].forEach(ev => promo.addEventListener(ev, stop, { passive: true }));
    ['mouseleave', 'focusout'].forEach(ev => promo.addEventListener(ev, start));
    let t;                                                   // sinkronkan titik saat digeser manual
    track.addEventListener('scroll', () => {
      clearTimeout(t);
      t = setTimeout(() => {
        const step = cards[1] ? cards[1].offsetLeft - cards[0].offsetLeft : track.clientWidth;
        const end = track.scrollLeft + track.clientWidth >= track.scrollWidth - 4;
        page = end ? pages() - 1 : Math.min(pages() - 1, Math.floor(Math.round(track.scrollLeft / step) / n));
        mark();
      }, 120);
    });
    let r; addEventListener('resize', () => { clearTimeout(r); r = setTimeout(build, 150); });
    build();
  }

  /* ---------- Favorit (hati) ---------- */
  $$('.fav').forEach(btn => btn.addEventListener('click', () =>
    btn.setAttribute('aria-pressed', btn.getAttribute('aria-pressed') !== 'true')));

  /* ---------- Halaman Menu: filter kategori + pencarian ---------- */
  const grid = $('[data-filterable]');
  if (grid) {
    const tabs = $$('.tab[data-filter]'), items = $$('.item[data-cat]', grid), search = $('#menuSearch'), empty = $('#menuEmpty');
    let cat = 'all';
    const apply = () => {
      const q = (search ? search.value : '').trim().toLowerCase();
      let shown = 0;
      items.forEach(i => {
        const ok = (cat === 'all' || i.dataset.cat === cat) && i.dataset.name.includes(q);
        i.hidden = !ok; shown += ok;
      });
      empty.hidden = shown > 0;
    };
    const pick = c => { cat = c; tabs.forEach(t => t.setAttribute('aria-pressed', t.dataset.filter === c)); apply(); };
    tabs.forEach(t => t.addEventListener('click', () => pick(t.dataset.filter)));
    search && search.addEventListener('input', apply);
    const k = new URLSearchParams(location.search).get('kategori');   // dari tab beranda
    pick(tabs.some(t => t.dataset.filter === k) ? k : 'all');
  }

  /* ---------- Tanggal: tidak boleh di masa lalu ---------- */
  const today = new Date(Date.now() - new Date().getTimezoneOffset() * 6e4).toISOString().slice(0, 10);
  $$('input[type=date]').forEach(i => { i.min = today; });

  /* ---------- Halaman Reservasi ---------- */
  const rf = $('#reservationForm');
  if (rf) {
    const params = new URLSearchParams(location.search);              // isi otomatis dari form singkat beranda
    ['date', 'time', 'guests'].forEach(n => {
      const f = rf.elements[n], v = params.get(n);
      if (f && v && (f.tagName !== 'SELECT' || [...f.options].some(o => o.value === v))) f.value = v;
    });
    rf.addEventListener('submit', e => {
      e.preventDefault();
      const msg = $('#formMsg');
      let valid = true;
      $$('[data-req]', rf).forEach(f => {
        const val = f.value.trim();
        let bad = !val, text = 'Wajib diisi.';
        if (!bad && f.name === 'phone' && !/^\+?[0-9\s-]{9,16}$/.test(val)) { bad = true; text = 'Nomor WhatsApp tidak valid.'; }
        f.setAttribute('aria-invalid', bad);
        const er = $(`[data-err="${f.name}"]`, rf);
        if (er) er.textContent = bad ? text : '';
        valid = valid && !bad;
      });
      if (!valid) { msg.textContent = ''; return; }
      const data = Object.fromEntries(new FormData(rf));
      const [y, m, d] = data.date.split('-').map(Number);
      const tgl = new Date(y, m - 1, d).toLocaleDateString('id-ID', { weekday: 'long', day: 'numeric', month: 'long', year: 'numeric' });
      const text = [`Halo ${rf.dataset.name}, saya ingin melakukan reservasi.`, '',
        `Nama: ${data.name}`, `No. WhatsApp: ${data.phone}`, `Tanggal: ${tgl}`, `Waktu: ${data.time}`, `Jumlah orang: ${data.guests}`,
        data.notes ? `Catatan: ${data.notes}` : null].filter(v => v !== null).join('\n');
      const url = `https://wa.me/${rf.dataset.wa}?text=${encodeURIComponent(text)}`;   // semua data form dikirim ke WhatsApp
      window.open(url, '_blank', 'noopener');
      msg.textContent = `Terima kasih, ${data.name}! Kami membuka WhatsApp untuk mengirim reservasi Anda. Jika tidak terbuka, `;
      const a = document.createElement('a');
      a.href = url; a.target = '_blank'; a.rel = 'noopener'; a.textContent = 'klik di sini';
      msg.append(a, '.');
      rf.reset();
    });
  }

  /* ---------- AI FAQ (simulasi statis) ---------- */
  const log = $('#chatLog');
  if (log) {
    const answers = {
      menu: 'Menu favorit kami: Café Latte, Es Kopi Susu Origins, Chicken Aglio Olio, dan Tiramisu Cake. Menu lengkap ada di halaman Menu.',
      promo: 'Promo Buy 2 Get 1 Coffee berlaku setiap Senin – Kamis.',
      reservasi: 'Buka halaman Reservasi, isi nama, nomor WhatsApp, tanggal, waktu, dan jumlah orang. Tim kami akan mengonfirmasi lewat WhatsApp.',
      jam: 'Senin – Kamis 08.00 – 22.00, Jumat – Sabtu 08.00 – 23.00, Minggu 09.00 – 22.00.',
      lokasi: 'Kami ada di Jl. Raya Dharmahusada No. 88, Surabaya, Jawa Timur.'
    };
    const say = (text, mine) => {
      const el = document.createElement('div');
      el.className = 'msg' + (mine ? ' msg--me' : '');
      el.textContent = text;                       // textContent: aman dari XSS
      log.append(el); log.scrollTop = log.scrollHeight;
      return el;
    };
    // TODO (backend/AI): ganti isi reply() dengan panggilan ke API chatbot.
    const faq = $('#faq');
    const reply = q => {
      const key = Object.keys(answers).find(k => q.toLowerCase().includes(k));
      setTimeout(() => {
        if (key) { say(answers[key]); return; }
        // tidak ada jawaban otomatis -> arahkan pertanyaan ke WhatsApp
        const el = say('Maaf, saya belum menemukan jawabannya. Kirim pertanyaan Anda langsung ke tim kami lewat WhatsApp:');
        const a = document.createElement('a');
        a.className = 'msg__wa'; a.target = '_blank'; a.rel = 'noopener'; a.textContent = 'Kirim ke WhatsApp →';
        a.href = `https://wa.me/${faq.dataset.wa}?text=${encodeURIComponent(`Halo ${faq.dataset.name}, saya ingin bertanya: ${q}`)}`;
        el.append(document.createElement('br'), a);
      }, 400);
    };
    $$('.chip').forEach(c => c.addEventListener('click', () => { say(c.textContent, true); reply(c.dataset.q); }));
    const cf = $('#chatForm');
    cf && cf.addEventListener('submit', e => {
      e.preventDefault();
      const input = cf.elements.q, text = input.value.trim();
      if (!text) return;
      say(text, true); reply(text); input.value = '';
    });
  }

  /* ---------- Gambar yang belum ada → sembunyikan, latar gradasi tetap tampil ---------- */
  $$('img').forEach(img => {
    const drop = () => img.remove();
    if (img.complete && !img.naturalWidth) drop(); else img.addEventListener('error', drop, { once: true });
  });
})();
