(() => {
  'use strict';
  const $ = (s, r = document) => r.querySelector(s), $$ = (s, r = document) => [...r.querySelectorAll(s)];
  const wa = (t) => 'https://wa.me/' + (document.body.dataset.wa || '') + '?text=' + encodeURIComponent(t);

  const burger = $('[data-burger]'), menu = $('[data-menu]');
  burger?.addEventListener('click', () => burger.setAttribute('aria-expanded', menu.classList.toggle('open')));
  $$('a', menu || document).forEach((a) => a.addEventListener('click', () => menu?.classList.remove('open')));

  const sl = $('[data-slider]');
  if (sl) {
    const slides = $$('.slide', sl), dots = $$('.dots button', sl); let i = 0, t;
    const go = (n) => { i = (n + slides.length) % slides.length; slides.forEach((s, k) => s.classList.toggle('on', k === i)); dots.forEach((d, k) => d.classList.toggle('on', k === i)); };
    const run = () => { clearInterval(t); t = setInterval(() => go(i + 1), 5000); };
    dots.forEach((d, k) => d.addEventListener('click', () => { go(k); run(); })); run();
  }

  const tabs = $('[data-tabs]');
  tabs?.addEventListener('click', (e) => {
    const b = e.target.closest('button[data-t]'); if (!b) return;
    $$('button', tabs).forEach((x) => x.classList.toggle('on', x === b));
    $$('[data-pane]').forEach((p) => { p.hidden = p.dataset.pane !== b.dataset.t; });
  });

  $('[data-search]')?.addEventListener('submit', (e) => { e.preventDefault(); location.href = (document.body.dataset.base || '') + '/katalog?q=' + encodeURIComponent($('input', e.target).value); });
  $('[data-news]')?.addEventListener('submit', (e) => { e.preventDefault(); e.target.reset(); alert('Terima kasih, Anda sudah berlangganan!'); });
  $('[data-contact]')?.addEventListener('submit', (e) => {
    e.preventDefault(); const f = new FormData(e.target);
    window.open(wa(`Halo, saya ${f.get('nama')} (${f.get('email')}). ${f.get('pesan')}`), '_blank', 'noopener');
  });

  const fmt = (n, s) => (n >= 1e6 ? n / 1e6 : n >= 1e3 ? n / 1e3 : n).toFixed(0) + s;
  const io = 'IntersectionObserver' in window && new IntersectionObserver((es) => es.forEach((en) => {
    if (!en.isIntersecting) return; io.unobserve(en.target);
    const el = en.target, end = +el.dataset.count, s = el.dataset.suffix || '', t0 = performance.now();
    const step = (t) => { const p = Math.min((t - t0) / 1400, 1); el.textContent = fmt(end * p, s); if (p < 1) requestAnimationFrame(step); else el.textContent = fmt(end, s); };
    requestAnimationFrame(step);
  }), { threshold: .4 });
  if (io) $$('[data-count]').forEach((el) => io.observe(el));

  const chat = $('[data-chat]'), msgs = $('[data-msgs]'); let data = {};
  try { data = JSON.parse($('#bot-data')?.textContent || '{}'); } catch (_) {}
  const open = (v) => { chat.hidden = !v; if (v) $('input', chat).focus(); };
  $$('[data-chat-open]').forEach((b) => b.addEventListener('click', () => open(true)));
  $('[data-chat-close]')?.addEventListener('click', () => open(false));
  document.addEventListener('keydown', (e) => e.key === 'Escape' && open(false));
  const say = (txt, who) => { const p = document.createElement('p'); p.className = 'm ' + who; p.textContent = txt; msgs.append(p); msgs.scrollTop = msgs.scrollHeight; };
  $('[data-chat-form]')?.addEventListener('submit', (e) => {
    e.preventDefault(); const inp = $('input', e.target), q = inp.value.trim(); if (!q) return;
    say(q, 'me'); inp.value = '';
    const k = Object.keys(data).find((x) => x !== 'default' && q.toLowerCase().includes(x));
    setTimeout(() => say(data[k] || data.default || 'Terima kasih atas pertanyaannya.', 'bot'), 450);
  });
})();

(() => {
  'use strict';
  const $ = (s, r = document) => r.querySelector(s), $$ = (s, r = document) => [...r.querySelectorAll(s)];
  let D = {}; try { D = JSON.parse($('#lib-data').textContent); } catch (_) {}
  const B = (D.books || []).map((b, i) => ({ id: i, title: b[0], author: b[1], fmt: b[2], cat: b[3], rate: b[4], year: b[5], isbn: `978-602-${1200 + i * 7}-${10 + i}-${i % 10}`, pub: 'Penerbit Cahaya Ilmu' }));
  const base = D.base || '', H = [210, 28, 190, 260, 150, 340], q = new URLSearchParams(location.search), UP = () => document.dispatchEvent(new Event('dl:update'));
  const S = { get: (k, d) => { try { const v = localStorage.getItem('dl.' + k); return v ? JSON.parse(v) : d; } catch (_) { return d; } }, set: (k, v) => { try { localStorage.setItem('dl.' + k, JSON.stringify(v)); } catch (_) {} } };
  const esc = (s) => String(s).replace(/[&<>"']/g, (c) => ({ '&': '&amp;', '<': '&lt;', '>': '&gt;', '"': '&quot;', "'": '&#39;' }[c]));
  const url = (p, x = '') => `${base}/${p}${x}`, stars = (r) => '★'.repeat(Math.round(r)) + '☆'.repeat(5 - Math.round(r));
  const toast = (m) => { const t = document.createElement('div'); t.className = 'toast'; t.textContent = m; document.body.append(t); setTimeout(() => t.remove(), 2600); };
  const cover = (b) => `<div class="bk" style="--h:${H[b.id % 6]}"><b>${esc(b.title)}</b><small>${esc(b.author)}</small></div>`;
  const notify = (t) => S.set('nt', [t, ...S.get('nt', [])].slice(0, 5));
  const notes = () => [...S.get('nt', []), ...(D.notifs || [])].slice(0, 6);
  const card = (b) => `<article class="bcard"><a href="${url('detail-buku', '?b=' + b.id)}" aria-label="${esc(b.title)}">${cover(b)}</a><div><h4><a href="${url('detail-buku', '?b=' + b.id)}">${esc(b.title)}</a></h4><small>${esc(b.author)} · ${b.year}</small><span class="rt">${stars(b.rate)} ${b.rate}</span><em>${esc(b.fmt)}</em></div><div class="acts"><button data-wish="${b.id}" aria-label="Wishlist">${S.get('wish', []).includes(b.id) ? '♥' : '♡'}</button><button data-borrow="${b.id}">Pinjam</button></div></article>`;
  const dl = (id) => { const b = B[id]; if (!b) return; const a = document.createElement('a'); a.href = URL.createObjectURL(new Blob([`${b.title}\n${b.author}\nISBN ${b.isbn}\n\n(Berkas contoh unduhan statis)`], { type: 'text/plain' })); a.download = b.title.replace(/\W+/g, '-') + '.txt'; document.body.append(a); a.click(); setTimeout(() => { URL.revokeObjectURL(a.href); a.remove(); }, 800); toast('Unduhan dimulai'); };

  document.addEventListener('click', (e) => {
    const t = e.target.closest('[data-wish],[data-borrow],[data-return],[data-dl],[data-ask]'); if (!t) return;
    if (t.dataset.wish !== undefined) { const id = +t.dataset.wish, w = S.get('wish', []), on = w.includes(id); S.set('wish', on ? w.filter((x) => x !== id) : [...w, id]); toast(on ? 'Dihapus dari wishlist' : 'Ditambahkan ke wishlist'); UP(); }
    else if (t.dataset.borrow !== undefined) { const id = +t.dataset.borrow, l = S.get('borrow', []); if (l.some((x) => x.id === id)) return toast('Buku sudah Anda pinjam'); const d = new Date(Date.now() + 14 * 864e5).toISOString().slice(0, 10); S.set('borrow', [...l, { id, due: d }]); notify('Berhasil meminjam: ' + B[id].title); toast('Dipinjam sampai ' + d); UP(); }
    else if (t.dataset.return !== undefined) { S.set('borrow', S.get('borrow', []).filter((x) => x.id !== +t.dataset.return)); toast('Buku dikembalikan'); UP(); }
    else if (t.dataset.dl !== undefined) dl(+t.dataset.dl);
    else if (t.dataset.ask !== undefined) { $('button.bot')?.click(); const f = $('[data-chat-form]'), i = $('input', f); i.value = t.dataset.ask; f.requestSubmit(); }
  });

  const cat = $('[data-view="catalog"]');
  if (cat) {
    const el = $('[data-filters]').elements, g = $('[data-grid]'), n = $('[data-count]'), pre = cat.dataset.preset;
    if (q.get('q')) el.q.value = q.get('q'); if (q.get('cat')) el.cat.value = q.get('cat');
    el.sort.value = { featured: 'rate', new: 'year', popular: 'rate' }[pre] || 'title';
    const run = () => {
      let r = B.filter((b) => (b.title + b.author + b.isbn).toLowerCase().includes(el.q.value.toLowerCase()) && (!el.cat.value || b.cat === el.cat.value) && (!el.fmt.value || b.fmt === el.fmt.value) && (!el.author.value || b.author.toLowerCase().includes(el.author.value.toLowerCase())) && b.rate >= +el.rate.value && (!el.year.value || b.year >= +el.year.value));
      if (pre === 'featured') r = r.filter((b) => b.rate >= 4.5);
      const s = el.sort.value; r.sort((a, b) => s === 'title' ? a.title.localeCompare(b.title) : s === 'year' ? b.year - a.year || b.rate - a.rate : b.rate - a.rate);
      n.textContent = r.length + ' buku ditemukan'; g.innerHTML = r.map(card).join('') || '<p class="empty">Tidak ada buku yang cocok. Ubah kata kunci atau filter.</p>';
    };
    $('[data-filters]').addEventListener('input', run); $('[data-filters]').addEventListener('submit', (e) => { e.preventDefault(); run(); }); document.addEventListener('dl:update', run); run();
  }

  const cg = $('[data-view="cats"]');
  if (cg) cg.innerHTML = '<div class="catgrid">' + (D.cats || []).map((c, i) => `<a class="card catc" href="${url('katalog', '?cat=' + encodeURIComponent(c))}"><i>${(D.icons || [])[i] || '📚'}</i><h4>${esc(c)}</h4><small>${B.filter((b) => b.cat === c).length} judul</small></a>`).join('') + '</div>';

  const dt = $('[data-view="detail"]');
  if (dt && B.length) {
    const b = B[+q.get('b')] || B[0], rev = () => S.get('rev.' + b.id, []);
    const cite = () => { const s = $('[data-cs]', dt).value; $('[data-cite]', dt).textContent = { APA: `${b.author}. (${b.year}). ${b.title}. ${b.pub}.`, MLA: `${b.author}. ${b.title}. ${b.pub}, ${b.year}.`, Chicago: `${b.author}. ${b.title}. Jakarta: ${b.pub}, ${b.year}.` }[s]; };
    const draw = () => {
      dt.innerHTML = `<div class="detail"><div>${cover(b)}</div><div class="dinfo"><h2>${esc(b.title)}</h2><p class="rt">${stars(b.rate)} ${b.rate} · ${esc(b.fmt)}</p><dl><dt>Penulis</dt><dd>${esc(b.author)}</dd><dt>ISBN</dt><dd>${b.isbn}</dd><dt>Penerbit</dt><dd>${b.pub}</dd><dt>Tahun</dt><dd>${b.year}</dd><dt>Kategori</dt><dd>${esc(b.cat)}</dd></dl><p>${esc(b.title)} membahas topik ${esc(b.cat.toLowerCase())} secara runtut, dengan contoh nyata, ringkasan bab, dan latihan reflektif untuk pembaca dari berbagai latar belakang.</p><div class="acts row"><a class="btn" href="${url('baca', '?b=' + b.id)}">Baca Online</a><button class="btn gold" data-borrow="${b.id}">Pinjam</button><button class="btn ghost" data-dl="${b.id}">Unduh</button><button class="btn ghost" data-wish="${b.id}">${S.get('wish', []).includes(b.id) ? '♥ Di Wishlist' : '♡ Wishlist'}</button></div></div></div>
<div class="two"><section class="card"><h3>Generator Sitasi</h3><select data-cs aria-label="Gaya sitasi"><option>APA</option><option>MLA</option><option>Chicago</option></select><p class="cite" data-cite></p><button class="btn sm" data-copy>Salin</button></section>
<section class="card"><h3>Ulasan & Rating</h3><form data-rev><select name="r" aria-label="Rating"><option value="5">★★★★★</option><option value="4">★★★★</option><option value="3">★★★</option></select><input name="t" placeholder="Tulis ulasan" required><button class="btn sm">Kirim</button></form><ul class="revs">${rev().map((x) => `<li><b>${stars(x.r)}</b> ${esc(x.t)}</li>`).join('') || '<li>Belum ada ulasan.</li>'}</ul></section></div>`; cite();
    };
    dt.addEventListener('change', (e) => e.target.matches('[data-cs]') && cite());
    dt.addEventListener('submit', (e) => { if (!e.target.matches('[data-rev]')) return; e.preventDefault(); const f = e.target.elements; S.set('rev.' + b.id, [{ r: +f.r.value, t: f.t.value }, ...rev()]); toast('Ulasan terkirim'); draw(); });
    dt.addEventListener('click', (e) => { if (e.target.matches('[data-copy]')) navigator.clipboard?.writeText($('[data-cite]', dt).textContent).then(() => toast('Sitasi disalin'), () => toast('Gagal menyalin')); });
    document.addEventListener('dl:update', draw); draw();
  }

  const rd = $('[data-view="reader"]');
  if (rd && B.length) {
    const b = B[+q.get('b')] || B[0], N = 20, T = ['Pengetahuan tumbuh ketika rasa ingin tahu bertemu kebiasaan membaca yang konsisten.', 'Setiap bab disusun agar pembaca dapat berhenti, merenung, lalu melanjutkan dengan pemahaman baru.', 'Contoh kasus dari berbagai daerah menghubungkan teori dengan kehidupan sehari-hari.', 'Bookmark membantu Anda kembali ke gagasan penting kapan saja.'];
    let p = Math.min(Math.max(S.get('pg.' + b.id, 1), 1), N), z = 100; const bm = () => S.get('bm.' + b.id, []);
    const draw = () => {
      const m = bm(); rd.innerHTML = `<div class="rbar"><button data-r="prev" ${p < 2 ? 'disabled' : ''} aria-label="Sebelumnya">‹</button><span>Hal ${p} / ${N}</span><button data-r="next" ${p >= N ? 'disabled' : ''} aria-label="Berikutnya">›</button><span class="sp"></span><button data-r="zo" aria-label="Perkecil">−</button><span>${z}%</span><button data-r="zi" aria-label="Perbesar">+</button><button data-r="bm">${m.includes(p) ? '★ Bookmark' : '☆ Bookmark'}</button><button data-dl="${b.id}">Unduh</button></div><div class="prog" role="progressbar" aria-valuenow="${Math.round(p / N * 100)}" aria-valuemin="0" aria-valuemax="100"><i style="width:${p / N * 100}%"></i></div><div class="paper" style="font-size:${z / 100}rem"><h3>${esc(b.title)}</h3><small>Bab ${Math.ceil(p / 4)} · Halaman ${p}</small>${[0, 1, 2].map((k) => `<p>${T[(p + k) % 4]} ${T[(p * 2 + k) % 4]}</p>`).join('')}</div><p class="bmlist">Bookmark: ${m.length ? m.map((x) => `<button data-r="go" data-p="${x}">${x}</button>`).join(' ') : 'belum ada'}</p>`;
      S.set('pg.' + b.id, p); S.set('hist', [{ id: b.id, pct: Math.round(p / N * 100), date: new Date().toISOString().slice(0, 10) }, ...S.get('hist', []).filter((x) => x.id !== b.id)]);
    };
    rd.addEventListener('click', (e) => { const t = e.target.closest('[data-r]'); if (!t) return; const a = t.dataset.r; if (a === 'prev') p = Math.max(1, p - 1); else if (a === 'next') p = Math.min(N, p + 1); else if (a === 'zi') z = Math.min(200, z + 10); else if (a === 'zo') z = Math.max(60, z - 10); else if (a === 'go') p = +t.dataset.p; else if (a === 'bm') { const m = bm(); S.set('bm.' + b.id, m.includes(p) ? m.filter((x) => x !== p) : [...m, p]); toast('Bookmark diperbarui'); } draw(); });
    document.addEventListener('keydown', (e) => { if (e.target.closest('input,textarea,select')) return; if (e.key === 'ArrowRight' && p < N) { p++; draw(); } if (e.key === 'ArrowLeft' && p > 1) { p--; draw(); } });
    draw();
  }

  const ac = $('[data-view="academic"]');
  if (ac) { const A = D.acad || {}, ks = Object.keys(A); let k = ks[0]; const draw = () => { ac.innerHTML = `<div class="tabs">${ks.map((x) => `<button class="${x === k ? 'on' : ''}" data-k="${esc(x)}">${esc(x)}</button>`).join('')}</div><ul class="arows">${(A[k] || []).map((i) => `<li><span class="bk sm" style="--h:210"></span><div><b>${esc(i[0])}</b><small>${esc(i[1])}</small></div><a class="btn sm" href="${url('katalog')}">Lihat</a></li>`).join('')}</ul>`; }; ac.addEventListener('click', (e) => { const t = e.target.closest('[data-k]'); if (t) { k = t.dataset.k; draw(); } }); draw(); }

  const ar = $('[data-view="article"]');
  if (ar && (D.arts || []).length) { const i = +q.get('a') || 0, a = D.arts[i] || D.arts[0]; ar.innerHTML = `<article class="card art-full"><span class="thumb wide" style="--h:${H[i % 6]}"></span><em>${esc(a[1])}</em><h2>${esc(a[0])}</h2><p>${esc(a[2])}</p><p>Membaca secara rutin melatih fokus, memperkaya kosakata, dan membuka sudut pandang baru. Mulailah dari topik yang Anda sukai, lalu perluas ke bidang lain secara bertahap.</p><p>Manfaatkan fitur bookmark, catatan, dan pelacak progres agar setiap sesi membaca terasa terarah.</p><a class="btn sm" href="${url('knowledge-hub')}">← Kembali ke Knowledge Hub</a></article>`; }

  const ls = $('[data-view="list"]');
  if (ls) {
    const m = ls.dataset.preset, draw = () => {
      let r = []; if (m === 'borrow') r = S.get('borrow', []).map((x) => ({ b: B[x.id], t: 'Jatuh tempo ' + x.due, a: `<a class="btn sm" href="${url('baca', '?b=' + x.id)}">Baca</a><button data-return="${x.id}">Kembalikan</button>` }));
      else if (m === 'hist') r = S.get('hist', []).map((x) => ({ b: B[x.id], t: `Dibaca ${x.date} · ${x.pct}%`, a: `<a class="btn sm" href="${url('baca', '?b=' + x.id)}">Lanjutkan</a>` }));
      else r = S.get('wish', []).map((id) => ({ b: B[id], t: (B[id] || {}).cat, a: `<button data-borrow="${id}">Pinjam</button><button data-wish="${id}">Hapus</button>` }));
      r = r.filter((x) => x.b); ls.innerHTML = r.length ? '<ul class="lrows">' + r.map((x) => `<li>${cover(x.b)}<div><b>${esc(x.b.title)}</b><small>${esc(x.b.author)}</small><em>${esc(x.t)}</em></div><div class="acts row">${x.a}</div></li>`).join('') + '</ul>' : `<p class="empty">Belum ada data. <a href="${url('katalog')}">Jelajahi katalog</a></p>`;
    }; draw(); document.addEventListener('dl:update', draw);
  }

  const ds = $('[data-view="dash"]');
  if (ds) { const u = S.get('user', { nama: 'Anggota' }), h = S.get('hist', []); ds.innerHTML = `<h3 class="st">Halo, ${esc(u.nama)}!</h3><div class="stats4"><a class="card" href="${url('pinjaman')}"><b>${S.get('borrow', []).length}</b><span>Sedang dipinjam</span></a><a class="card" href="${url('riwayat')}"><b>${h.length}</b><span>Riwayat baca</span></a><a class="card" href="${url('wishlist')}"><b>${S.get('wish', []).length}</b><span>Wishlist</span></a><div class="card"><b>${B.reduce((n, b) => n + S.get('bm.' + b.id, []).length, 0)}</b><span>Bookmark</span></div></div><div class="two"><section class="card"><h3>Lanjutkan Membaca</h3>${h[0] && B[h[0].id] ? `<a href="${url('baca', '?b=' + h[0].id)}">${esc(B[h[0].id].title)} — ${h[0].pct}%</a>` : '<p>Belum ada bacaan.</p>'}</section><section class="card"><h3>Notifikasi</h3><ul class="revs">${notes().map((x) => '<li>' + esc(x) + '</li>').join('')}</ul></section></div>`; }

  $('[data-auth]')?.addEventListener('submit', (e) => { e.preventDefault(); const f = e.target.elements; if (f.pw2 && f.pw.value !== f.pw2.value) return toast('Kata sandi tidak sama'); S.set('user', { nama: f.nama ? f.nama.value : f.email.value.split('@')[0], email: f.email.value }); location.href = url('dashboard'); });
  const pf = $('[data-profile]');
  if (pf) { const d = S.get('prof', S.get('user', {})); ['nama', 'email', 'hp', 'bio'].forEach((k) => { if (d[k]) pf.elements[k].value = d[k]; }); pf.addEventListener('submit', (e) => { e.preventDefault(); const o = {}; ['nama', 'email', 'hp', 'bio'].forEach((k) => { o[k] = pf.elements[k].value; }); S.set('prof', o); toast('Profil disimpan'); }); }
  $('[data-faq-search]')?.addEventListener('input', (e) => $$('[data-faq] details').forEach((d) => { d.hidden = !d.textContent.toLowerCase().includes(e.target.value.toLowerCase()); }));

  const bell = $('[data-bell]'), nb = $('[data-notif]');
  if (bell) { const r = () => { const n = notes(); $('[data-nc]').textContent = n.length; nb.innerHTML = '<ul>' + n.map((x) => '<li>' + esc(x) + '</li>').join('') + '</ul>'; }; r(); document.addEventListener('dl:update', r); bell.addEventListener('click', () => { nb.hidden = !nb.hidden; }); document.addEventListener('click', (e) => { if (!e.target.closest('[data-bell],[data-notif]')) nb.hidden = true; }); }
})();
