/* ==========================================================================
   ASTRALY — Digital Asset Marketplace · Creative Tech · Galaxy
   WEBIA by D-KREASI — JavaScript frontend statis (data dummy + localStorage)
   Modul: util · state · ui · cart · wishlist · search · preview/download · pages · ai · chat · fx
   ========================================================================== */
(() => {
  'use strict';

  const D = window.DAM || { assets: [], categories: [], licenses: {}, ai: { kb: [], quick: [] }, pages: {}, wa: {}, coupons: [] };
  const $ = (s, r = document) => r.querySelector(s);
  const $$ = (s, r = document) => Array.from(r.querySelectorAll(s));
  const reduce = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
  const fine = window.matchMedia('(pointer: fine)').matches;
  const rp = (n) => (n ? 'Rp ' + Math.round(n).toLocaleString('id-ID') : 'Gratis');
  const esc = (s) => String(s).replace(/[&<>"']/g, (c) => ({ '&': '&amp;', '<': '&lt;', '>': '&gt;', '"': '&quot;', "'": '&#39;' }[c]));
  const byId = (id) => D.assets.find((a) => a.id === Number(id));
  const page = document.body.dataset.page;
  const on = (el, ev, fn, o) => el && el.addEventListener(ev, fn, o);

  /* ---------- 1. ICON & KARTU (untuk render dinamis) ---------- */
  const P = {
    cart: '<circle cx="9" cy="20" r="1.5"/><circle cx="18" cy="20" r="1.5"/><path d="M2 3h3l2.6 12.4a2 2 0 0 0 2 1.6h7.6a2 2 0 0 0 2-1.5L21 8H6"/>',
    heart: '<path d="M20.8 5.6a5.2 5.2 0 0 0-7.4 0L12 7l-1.4-1.4a5.2 5.2 0 0 0-7.4 7.4L12 21.8l8.8-8.8a5.2 5.2 0 0 0 0-7.4z"/>',
    eye: '<path d="M2 12s3.6-7 10-7 10 7 10 7-3.6 7-10 7S2 12 2 12z"/><circle cx="12" cy="12" r="3"/>',
    star: '<path d="M12 2l3 6.6 7.2.8-5.4 4.9 1.5 7.1L12 17.8 5.7 21.4l1.5-7.1L1.8 9.4 9 8.6z"/>',
    trash: '<path d="M4 7h16M10 11v6m4-6v6M6 7l1 13h10l1-13M9 7V4h6v3"/>',
    close: '<path d="M6 6l12 12M18 6 6 18"/>',
    download: '<path d="M12 3v12m-5-5 5 5 5-5M4 21h16"/>',
    sparkle: '<path d="M12 3l1.8 5.2L19 10l-5.2 1.8L12 17l-1.8-5.2L5 10l5.2-1.8z"/>',
    check: '<path d="m5 12.5 4.5 4.5L19 7.5"/>',
    arrow: '<path d="M5 12h14m-6-6 6 6-6 6"/>',
    send: '<path d="M22 2 11 13M22 2l-7 20-4-9-9-4z"/>',
    chev: '<path d="m6 9 6 6 6-6"/>',
    search: '<circle cx="11" cy="11" r="7"/><path d="m20 20-3.5-3.5"/>',
    user: '<circle cx="12" cy="8" r="4"/><path d="M4 21a8 8 0 0 1 16 0"/>',
    mail: '<rect x="3" y="5" width="18" height="14" rx="2"/><path d="m3 7 9 6 9-6"/>',
    phone: '<path d="M5 3h4l2 5-2.5 1.5a11 11 0 0 0 6 6L16 13l5 2v4a2 2 0 0 1-2 2A16 16 0 0 1 3 5a2 2 0 0 1 2-2z"/>',
    package: '<path d="M21 8 12 3 3 8v8l9 5 9-5z"/><path d="m3 8 9 5 9-5M7.5 5.5l9 5"/>',
    pin: '<path d="M12 22s7-6.2 7-12a7 7 0 0 0-14 0c0 5.8 7 12 7 12z"/><circle cx="12" cy="10" r="2.5"/>',
    globe: '<circle cx="12" cy="12" r="9"/><path d="M3 12h18M12 3c3 3.2 3 14.8 0 18M12 3c-3 3.2-3 14.8 0 18"/>',
    lock: '<rect x="4" y="11" width="16" height="10" rx="2"/><path d="M8 11V7a4 4 0 0 1 8 0v4"/>',
    chat: '<path d="M21 12a8 8 0 0 1-11.6 7.1L3 20l1-4.6A8 8 0 1 1 21 12z"/>',
    book: '<path d="M4 5a2 2 0 0 1 2-2h13v16H6a2 2 0 0 0-2 2z"/><path d="M4 21V5M9 7h6"/>',
    clock: '<circle cx="12" cy="12" r="9"/><path d="M12 7v5l3 2"/>',
  };
  const ic = (n, c = 'ico-sm') => `<svg class="ico ${c}" viewBox="0 0 24 24" aria-hidden="true">${P[n] || ''}</svg>`;
  const stars = (r) => `<span class="stars">${[1, 2, 3, 4, 5].map((i) => `<svg viewBox="0 0 24 24"${i <= Math.round(r) ? '' : ' class="off"'}>${P.star}</svg>`).join('')}</span>`;
  const licPrice = (a, lic = 'personal') => (a.price ? Math.round((a.price * (D.licenses[lic] ? D.licenses[lic].mult : 1)) / 1000) * 1000 : 0);

  const card = (a, extra = '') => {
    const off = a.old ? Math.round((1 - a.price / a.old) * 100) : 0;
    return `<article class="card-asset" data-tilt data-id="${a.id}">
      <div class="ca-media"><a href="${a.url}" class="block h-full" aria-label="${esc(a.title)}"><img src="${a.img}" alt="${esc(a.title)}" width="1280" height="720" loading="lazy"></a>
        <div class="ca-badges">${a.days <= 14 ? '<span class="badge b-new">Baru</span>' : ''}${off ? `<span class="badge b-sale">-${off}%</span>` : ''}${!a.price ? '<span class="badge b-free">Gratis</span>' : ''}${a.sales > 2000 ? '<span class="badge b-hot">Terlaris</span>' : ''}${extra}</div>
        <div class="ca-actions"><button type="button" class="ca-btn" data-wish="${a.id}" aria-label="Wishlist">${ic('heart')}</button><button type="button" class="ca-btn" data-preview="${a.id}" aria-label="Pratinjau">${ic('eye')}</button></div></div>
      <div class="ca-body"><span class="ca-cat">${esc(a.catName)}</span><h3 class="ca-title"><a href="${a.url}">${esc(a.title)}</a></h3>
        <div class="ca-meta"><span class="by"><img src="${a.creatorAvatar}" alt="" width="24" height="24" loading="lazy"><span>${esc(a.creator)}</span></span><span class="flex items-center gap-1">${ic('star')}<b style="color:var(--tx)">${a.rating}</b> (${a.reviews})</span></div>
        <div class="ca-foot"><span class="price ${a.price ? '' : 'free'}">${rp(a.price)}${a.old ? `<s>${rp(a.old)}</s>` : ''}</span><button type="button" class="add-btn" data-add="${a.id}" aria-label="Tambah ke keranjang">${ic('cart')}</button></div></div></article>`;
  };

  /* ---------- 2. STATE (localStorage) ---------- */
  const store = {
    get(k, f) { try { const v = JSON.parse(localStorage.getItem('dam_' + k)); return v === null || v === undefined ? f : v; } catch (e) { return f; } },
    set(k, v) { try { localStorage.setItem('dam_' + k, JSON.stringify(v)); } catch (e) { /* abaikan */ } },
  };
  let cart = store.get('cart', []);
  let wish = store.get('wish', []);
  let library = store.get('library', null);
  let coupon = store.get('coupon', '');
  if (!Array.isArray(library)) {
    library = [3, 6, 15].filter(byId).map((id, i) => ({ id, lic: 'personal', date: new Date(Date.now() - (i + 2) * 864e5).toISOString(), order: 'AST-DEMO' + (i + 1) }));
    store.set('library', library);
  }
  const save = () => { store.set('cart', cart); store.set('wish', wish); store.set('library', library); store.set('coupon', coupon); };

  /* ---------- 3. UI UTILITAS ---------- */
  const toast = (msg, type = 'ok') => {
    const box = $('#toasts'); if (!box) return;
    const t = document.createElement('div'); t.className = 'toast ' + type;
    t.innerHTML = `<span class="ti">${ic(type === 'ok' ? 'check' : 'sparkle')}</span><span>${esc(msg)}</span>`;
    box.appendChild(t); while (box.children.length > 3) box.firstChild.remove();
    setTimeout(() => { t.classList.add('out'); setTimeout(() => t.remove(), 320); }, 2800);
  };
  const lockCheck = () => document.documentElement.classList.toggle('lock', !!$('.overlay.open, .mobile-menu.open'));
  const openOv = (el) => { el && el.classList.add('open'); lockCheck(); };
  const closeOv = (el) => { el && el.classList.remove('open'); lockCheck(); };

  const updateUI = () => {
    const cc = cart.length, wc = wish.length;
    $$('[data-cart-count]').forEach((e) => { e.textContent = cc; e.classList.toggle('on', cc > 0); });
    $$('[data-wish-count]').forEach((e) => { e.textContent = wc; e.classList.toggle('on', wc > 0); });
    $$('[data-wish]').forEach((b) => {
      const w = wish.includes(Number(b.dataset.wish)); b.classList.toggle('on', w);
      if (b.hasAttribute('data-wish-label') && b.lastChild) b.lastChild.textContent = w ? ' Tersimpan' : ' Wishlist';
    });
    $$('[data-add]').forEach((b) => { const i = cart.some((c) => c.id === Number(b.dataset.add)); b.classList.toggle('in', i); b.innerHTML = ic(i ? 'check' : 'cart'); });
    $$('[data-stat]').forEach((e) => { e.textContent = { library: library.length, wish: wish.length, orders: store.get('orders', []).length }[e.dataset.stat] || 0; });
  };

  /* ---------- 4. KERANJANG ---------- */
  const totals = () => {
    const sub = cart.reduce((s, c) => s + licPrice(byId(c.id) || { price: 0 }, c.lic), 0);
    let disc = 0, msg = '', ok = false;
    if (coupon) {
      if (coupon === 'ASTRA20') { if (sub >= 150000) { disc = Math.round(sub * 0.2); ok = true; } else msg = 'ASTRA20 butuh minimal belanja Rp 150.000.'; }
      else if (coupon === 'GALAXY10') { disc = Math.round(sub * 0.1); ok = true; }
      else if (coupon === 'BUNDLE50') { disc = Math.min(50000, sub); ok = sub > 0; if (!ok) msg = 'Keranjang kosong.'; }
      else msg = 'Kode promo tidak valid.';
    }
    const tax = Math.round((sub - disc) * 0.11);
    return { sub, disc, tax, total: sub - disc + tax, msg, ok };
  };
  const addToCart = (id, lic = 'personal', silent) => {
    const a = byId(id); if (!a) return;
    const ex = cart.find((c) => c.id === a.id);
    if (ex) { ex.lic = lic; if (!silent) toast('Aset sudah ada di keranjang — lisensi diperbarui'); }
    else { cart.push({ id: a.id, lic }); if (!silent) toast(`“${a.title}” ditambahkan ke keranjang`); }
    save(); renderCart();
  };
  const removeFromCart = (id) => { cart = cart.filter((c) => c.id !== Number(id)); save(); renderCart(); };
  const renderCart = () => {
    updateUI();
    const t = totals();
    const drawer = $('#cartDrawerBody');
    if (drawer) {
      $('#cartDrawerCount').textContent = cart.length ? `(${cart.length})` : '';
      drawer.innerHTML = cart.length ? cart.map((c) => { const a = byId(c.id); return `<div class="mini-item"><a href="${a.url}"><img src="${a.img}" alt="" width="78" height="50"></a><div><h5>${esc(a.title)}</h5><small class="dim">Lisensi ${esc(D.licenses[c.lic].name)} · <b style="color:var(--tx)">${rp(licPrice(a, c.lic))}</b></small></div><button class="rm" data-remove="${a.id}" aria-label="Hapus">${ic('trash')}</button></div>`; }).join('')
        : `<div class="empty">${ic('cart', 'ico-lg')}<p>Keranjangmu masih kosong.</p><a href="${D.pages['explore-assets']}" class="btn btn-primary btn-sm mt-4">Jelajahi Aset</a></div>`;
      $('#cartDrawerTotal').textContent = rp(t.sub);
    }
    const list = $('#cartList');
    if (list) {
      list.innerHTML = cart.map((c) => { const a = byId(c.id); return `<div class="line-item"><a href="${a.url}"><img src="${a.img}" alt="" width="110" height="70"></a><div><h4><a href="${a.url}">${esc(a.title)}</a></h4><p class="dim tiny mb-2">${esc(a.catName)} · ${esc(a.creator)}</p><select class="select" data-cs-size="sm" data-lic-change="${a.id}" aria-label="Lisensi">${Object.entries(D.licenses).map(([k, l]) => `<option value="${k}" ${k === c.lic ? 'selected' : ''}>${l.name}</option>`).join('')}</select></div><div class="text-right"><b class="price">${rp(licPrice(a, c.lic))}</b><br><button class="rm tiny mt-2" data-remove="${a.id}">${ic('trash')} Hapus</button></div></div>`; }).join('');
      $('#cartEmpty').classList.toggle('hidden', cart.length > 0);
      $('#cartClear').classList.toggle('hidden', !cart.length); enhanceSelects(list);
    }
    const co = $('#checkoutItems');
    if (co) {
      co.innerHTML = cart.length ? cart.map((c) => { const a = byId(c.id); return `<div class="mini-item"><img src="${a.img}" alt="" width="78" height="50"><div><h5>${esc(a.title)}</h5><small class="dim">${esc(D.licenses[c.lic].name)}</small></div><b>${rp(licPrice(a, c.lic))}</b></div>`; }).join('') : `<p class="muted">Keranjang kosong. <a href="${D.pages['explore-assets']}" style="color:var(--cyan)">Cari aset</a></p>`;
      const b = $('#placeOrder'); if (b) b.disabled = !cart.length;
    }
    const set = (id, v) => { const e = $(id); if (e) e.textContent = v; };
    set('#sumSub', rp(t.sub)); set('#sumDisc', '- ' + rp(t.disc).replace('Gratis', 'Rp 0')); set('#sumTax', rp(t.tax).replace('Gratis', 'Rp 0')); set('#sumTotal', rp(t.total).replace('Gratis', 'Rp 0'));
    const m = $('#couponMsg'); if (m) { m.textContent = coupon ? (t.ok ? `Kode ${coupon} diterapkan.` : t.msg) : ''; m.style.color = t.ok ? 'var(--emerald)' : 'var(--rose)'; }
  };

  /* ---------- 5. WISHLIST ---------- */
  const toggleWish = (id) => {
    id = Number(id); const a = byId(id); if (!a) return;
    if (wish.includes(id)) { wish = wish.filter((w) => w !== id); toast('Dihapus dari wishlist'); } else { wish.push(id); toast(`“${a.title}” disimpan ke wishlist`); }
    save(); updateUI(); renderWish();
  };
  const renderWish = () => {
    const l = $('#wishList'); if (!l) return;
    l.innerHTML = wish.map((id) => byId(id)).filter(Boolean).map((a) => card(a)).join('');
    $('#wishEmpty').classList.toggle('hidden', wish.length > 0); $('#wishActions').classList.toggle('hidden', !wish.length); updateUI();
  };

  /* ---------- 6. PREVIEW & DOWNLOAD ---------- */
  let pvId = 0;
  const openPreview = (id) => {
    const a = byId(id); if (!a) return; pvId = a.id; const m = $('#previewModal');
    m.innerHTML = `<button class="icon-btn modal-x" data-close-preview aria-label="Tutup">${ic('close')}</button>
      <div class="pv-grid"><div style="position:relative;background:#0b0720;overflow:hidden;min-height:260px;cursor:zoom-in" data-pv-zoom><img src="${a.img}" alt="${esc(a.title)}" width="1280" height="720" style="width:100%;height:100%;object-fit:cover;transition:transform .25s ease-out"></div>
      <div class="pv-info"><span class="ca-cat">${esc(a.catName)}</span><h3 class="text-3xl">${esc(a.title)}</h3><div class="flex items-center gap-3">${stars(a.rating)}<span class="muted tiny">${a.rating} (${a.reviews} ulasan)</span></div>
      <p class="muted">Oleh <b style="color:var(--tx)">${esc(a.creator)}</b> · Format ${esc(a.format)} · ${esc(a.size)}</p>
      <div class="chip-row">${a.tags.map((t) => `<span class="chip">#${esc(t)}</span>`).join('')}</div>
      <label class="field"><span class="label">Lisensi</span><select class="select" id="pvLic">${Object.entries(D.licenses).map(([k, l]) => `<option value="${k}">${l.name} — ${l.desc}</option>`).join('')}</select></label>
      <div class="flex items-end justify-between"><span class="dim">Harga</span><span class="price" style="font-size:30px" id="pvPrice">${rp(a.price)}</span></div>
      <div class="grid gap-3 sm:grid-cols-2">${a.price ? `<button class="btn btn-primary" data-pv-add="${a.id}">${ic('cart')} Tambah ke Keranjang</button>` : `<button class="btn btn-primary" data-download="${a.id}">${ic('download')} Unduh Gratis</button>`}<a class="btn btn-ghost" href="${a.url}">Lihat Detail ${ic('arrow')}</a></div></div></div>`;
    enhanceSelects(m); openOv($('#previewOverlay'));
  };
  let dlTimer;
  const openDownload = (id, lic = 'personal') => {
    const a = byId(id); if (!a) return; clearInterval(dlTimer);
    const bar = $('#dlBar'), pct = $('#dlPct'); let p = 0;
    $('#dlTitle').textContent = 'Menyiapkan unduhan…'; $('#dlName').textContent = a.title; $('#dlSize').textContent = a.size; bar.style.width = '0'; pct.textContent = '0%';
    $('#dlIcon').innerHTML = ic('download', 'ico-lg'); openOv($('#downloadOverlay'));
    dlTimer = setInterval(() => {
      p = Math.min(100, p + 4 + Math.random() * 9); bar.style.width = p + '%'; pct.textContent = Math.round(p) + '%';
      if (p >= 100) {
        clearInterval(dlTimer); $('#dlTitle').textContent = 'Unduhan selesai!'; $('#dlIcon').innerHTML = ic('check', 'ico-lg');
        if (!library.some((l) => l.id === a.id)) { library.unshift({ id: a.id, lic, date: new Date().toISOString(), order: 'AST-FREE' }); save(); renderLibrary(); updateUI(); }
        try {
          const blob = new Blob([`ASTRALY — Simulasi Unduhan\n\nAset   : ${a.title}\nKreator: ${a.creator}\nFormat : ${a.format}\nLisensi: ${D.licenses[lic].name}\n\nIni adalah file demo dari template frontend statis WEBIA by D-KREASI.\n`], { type: 'text/plain' });
          const url = URL.createObjectURL(blob); const l = document.createElement('a'); l.href = url; l.download = `astraly-${a.slug}.txt`; document.body.appendChild(l); l.click(); l.remove(); setTimeout(() => URL.revokeObjectURL(url), 1500);
        } catch (e) { /* abaikan */ }
      }
    }, 120);
  };
  const renderLibrary = () => {
    const l = $('#dlList'); if (!l) return;
    $('#dlCount').textContent = library.length; $('#dlEmpty').classList.toggle('hidden', library.length > 0);
    l.innerHTML = library.map((e) => { const a = byId(e.id); if (!a) return ''; return `<div class="line-item" style="grid-template-columns:110px 1fr auto"><a href="${a.url}"><img src="${a.img}" alt="" width="110" height="70"></a><div><h4><a href="${a.url}">${esc(a.title)}</a></h4><p class="dim tiny">${esc(a.format)} · ${esc(a.size)} · Lisensi ${esc(D.licenses[e.lic].name)}</p><p class="dim tiny">Diperoleh ${new Date(e.date).toLocaleDateString('id-ID', { day: 'numeric', month: 'long', year: 'numeric' })} · ${esc(e.order)}</p></div><button class="btn btn-primary btn-sm" data-download="${a.id}" data-lic="${e.lic}">${ic('download')} Unduh</button></div>`; }).join('');
  };

  /* ---------- 7. SMART SEARCH (command palette + typeahead) ---------- */
  const so = $('#searchOverlay'), si = $('#searchInput'), sr = $('#searchResults');
  const SYN = { musik: 'audio', suara: 'audio', sfx: 'audio', lagu: 'audio', beat: 'audio', video: 'motion', animasi: 'motion', transisi: 'motion', desain: 'ui-kits', ui: 'ui-kits', aplikasi: 'ui-kits', dashboard: 'ui-kits', ikon: 'icons', icon: 'icons', template: 'web-templates', website: 'web-templates', web: 'web-templates', laravel: 'web-templates', '3d': '3d-models', model: '3d-models', game: '3d-models', ilustrasi: 'illustrations', vektor: 'illustrations', background: 'illustrations', buku: 'ebooks', ebook: 'ebooks', kursus: 'ebooks', belajar: 'ebooks' };
  let sTab = 'all'; const qf = { free: false, sale: false, fresh: false, cheap: false };
  const recents = () => store.get('recent', []);
  const saveRecent = (q) => { q = (q || '').trim(); if (q.length < 2) return; store.set('recent', [q, ...recents().filter((x) => x !== q)].slice(0, 6)); };
  const hl = (t, terms) => { const ts = (terms || []).filter(Boolean).map((x) => x.replace(/[.*+?^${}()|[\]\\]/g, '\\$&')); return ts.length ? esc(t).replace(new RegExp('(' + ts.join('|') + ')', 'ig'), '<mark>$1</mark>') : esc(t); };
  const parseQ = (raw) => {
    const f = { free: qf.free, sale: qf.sale, cheap: qf.cheap, fresh: qf.fresh, cat: null, terms: [] };
    raw.toLowerCase().split(/\s+/).filter(Boolean).forEach((t) => {
      if (['gratis', 'free'].includes(t)) f.free = true; else if (['diskon', 'promo', 'sale'].includes(t)) f.sale = true; else if (['murah', 'hemat'].includes(t)) f.cheap = true; else if (['baru', 'terbaru', 'new'].includes(t)) f.fresh = true;
      else { if (SYN[t]) f.cat = f.cat || SYN[t]; f.terms.push(t); }
    });
    return f;
  };
  const scoreAsset = (a, f) => {
    if ((f.free && a.price) || (f.sale && !a.old) || (f.cheap && a.price > 150000) || (f.fresh && a.days > 14)) return 0;
    const h = (a.title + ' ' + a.tags.join(' ') + ' ' + a.catName + ' ' + a.creator).toLowerCase(); let s = 0;
    if (!f.terms.length && !f.cat) return 1 + a.rating / 10;
    if (f.cat && a.cat === f.cat) s += 4;
    for (const t of f.terms) { if (a.title.toLowerCase().includes(t)) s += 5; else if (a.tags.some((x) => x.includes(t))) s += 3; else if (h.includes(t)) s += 1; else if (!(f.cat && SYN[t] === f.cat && a.cat === f.cat)) return 0; }
    return s > 0 ? s + a.rating / 10 + a.sales / 20000 : 0;
  };
  const searchAll = (raw) => {
    const f = parseQ(raw), ts = f.terms; const has = ts.length || f.cat;
    const assets = D.assets.map((a) => [scoreAsset(a, f), a]).filter((x) => x[0] > 0).sort((x, y) => y[0] - x[0]).map((x) => x[1]);
    const cats = has ? D.categories.filter((c) => f.cat === c.slug || (ts.length && ts.every((t) => c.name.toLowerCase().includes(t) || c.slug.includes(t)))) : [];
    const creators = ts.length ? (D.creators || []).filter((c) => ts.every((t) => (c.name + ' ' + c.role + ' ' + c.handle).toLowerCase().includes(t))) : [];
    const help = ts.length ? (D.help || []).flatMap((g) => g.items.map((t) => ({ t, g: g.g }))).filter((h) => ts.every((t) => (h.g + ' ' + h.t).toLowerCase().includes(t))) : [];
    return { f, ts, assets, cats, creators, help };
  };
  const iAsset = (a, ts) => `<a class="sr-item" href="${a.url}"><img class="sr-thumb" src="${a.img}" alt="" width="68" height="44"><span class="sr-meta"><b>${hl(a.title, ts)}</b><small>${esc(a.catName)} · ${esc(a.creator)} · ★ ${a.rating}</small></span><span class="sr-price ${a.price ? '' : 'free'}">${rp(a.price)}</span></a>`;
  const iCat = (c, ts) => `<a class="sr-item" href="${D.pages['explore-assets']}?cat=${c.slug}"><span class="sr-ico">${ic('package', 'ico-sm')}</span><span class="sr-meta"><b>${hl(c.name, ts)}</b><small>Jelajahi kategori</small></span>${ic('arrow')}</a>`;
  const iCreator = (c, ts) => `<a class="sr-item" href="${c.url}"><img class="sr-av" src="${c.avatar}" alt="" width="44" height="44"><span class="sr-meta"><b>${hl(c.name, ts)}</b><small>${esc(c.role)} · ${esc(c.handle)}</small></span>${ic('arrow')}</a>`;
  const iHelp = (h, ts) => `<a class="sr-item" href="${D.pages['help-center']}"><span class="sr-ico">${ic('book', 'ico-sm')}</span><span class="sr-meta"><b>${hl(h.t, ts)}</b><small>${esc(h.g)}</small></span>${ic('arrow')}</a>`;
  const sec = (title, html, extra = '') => (html ? `<div class="sr-sec"><span>${title}</span>${extra}</div>${html}` : '');
  const exploreUrl = (raw) => {
    const f = parseQ(raw), p = new URLSearchParams(), q = f.terms.filter((t) => !SYN[t]).join(' ');
    if (q) p.set('q', q); if (f.cat) p.set('cat', f.cat); if (f.free) p.set('free', 1); if (f.sale) p.set('sale', 1); if (f.fresh) p.set('sort', 'new');
    return D.pages['explore-assets'] + (p.toString() ? '?' + p : '');
  };
  const renderSearch = (q) => {
    if (!sr) return; const raw = (q || '').trim(); const flags = Object.values(qf).some(Boolean);
    $$('[data-sq]').forEach((b) => b.classList.toggle('on', qf[b.dataset.sq]));
    const und = $('#searchUnderstood');
    if (!raw && !flags) {
      und.hidden = true; $$('.stab em').forEach((e) => { e.textContent = ''; });
      const rc = recents();
      sr.innerHTML = (rc.length ? sec('Pencarian terakhir', rc.map((r) => `<div class="sr-recent" data-fill="${esc(r)}">${ic('clock', 'ico-sm')}<span>${esc(r)}</span><button type="button" class="rm" data-rmrecent="${esc(r)}" aria-label="Hapus">${ic('close', 'ico-sm')}</button></div>`).join(''), '<button type="button" data-clear-recent>Hapus semua</button>') : '')
        + sec('Sedang dicari', `<div class="sr-chips">${['dashboard', 'spaceship', 'icons', 'ambient', 'laravel', 'blender'].map((t) => `<button type="button" class="chip" data-fill="${t}">${t}</button>`).join('')}</div>`)
        + sec('Coba pakai bahasa sehari-hari', `<div class="sr-chips">${['musik gratis untuk game', 'template web laravel murah', 'ui kit dashboard terbaru'].map((t) => `<button type="button" class="chip" data-fill="${t}">${ic('sparkle', 'ico-sm')} ${t}</button>`).join('')}</div>`)
        + sec('Aset trending', D.assets.filter((a) => a.flags.includes('trending')).slice(0, 4).map((a) => iAsset(a, [])).join(''));
      return;
    }
    const r = searchAll(raw), ts = r.ts;
    const tot = { asset: r.assets.length, cat: r.cats.length, creator: r.creators.length, help: r.help.length }; tot.all = tot.asset + tot.cat + tot.creator + tot.help;
    $$('.stab').forEach((b) => { b.querySelector('em').textContent = tot[b.dataset.stab]; });
    const bits = []; if (r.f.cat) bits.push(`Kategori <b>${esc((D.categories.find((c) => c.slug === r.f.cat) || {}).name || '')}</b>`);
    if (r.f.free) bits.push('<b>Gratis</b>'); if (r.f.sale) bits.push('<b>Diskon</b>'); if (r.f.cheap) bits.push('<b>≤ Rp 150rb</b>'); if (r.f.fresh) bits.push('<b>Terbaru</b>');
    und.hidden = !bits.length; und.innerHTML = bits.length ? ic('sparkle', 'ico-sm') + ' Dipahami sebagai: ' + bits.join(' · ') : '';
    const all = sTab === 'all', lim = (n) => (all ? n : 12);
    const html = (sTab === 'all' || sTab === 'asset' ? sec(`Aset (${tot.asset})`, r.assets.slice(0, lim(5)).map((a) => iAsset(a, ts)).join('')) : '')
      + (all || sTab === 'cat' ? sec(`Kategori (${tot.cat})`, r.cats.slice(0, lim(3)).map((c) => iCat(c, ts)).join('')) : '')
      + (all || sTab === 'creator' ? sec(`Kreator (${tot.creator})`, r.creators.slice(0, lim(3)).map((c) => iCreator(c, ts)).join('')) : '')
      + (all || sTab === 'help' ? sec(`Bantuan (${tot.help})`, r.help.slice(0, lim(4)).map((h) => iHelp(h, ts)).join('')) : '');
    sr.innerHTML = html || `<div class="sr-empty">${ic('search')}<b>Tidak ada hasil${raw ? ` untuk “${esc(raw)}”` : ''}</b><p class="tiny mt-1">Coba kata kunci lain, lepas filter, atau tanya Nova.</p><button type="button" class="btn btn-ghost btn-sm mt-4" data-chat-open>Tanya Nova</button></div>`;
  };
  const openSearch = () => { openOv(so); renderSearch(si.value); setTimeout(() => si.focus(), 60); };
  const closeSearch = () => closeOv(so);
  on(si, 'input', () => renderSearch(si.value));
  on(si, 'keydown', (e) => {
    const items = $$('.sr-item, .sr-recent', sr); let i = items.findIndex((x) => x.classList.contains('act'));
    if (e.key === 'ArrowDown' || e.key === 'ArrowUp') { e.preventDefault(); if (!items.length) return; items[i] && items[i].classList.remove('act'); i = (i + (e.key === 'ArrowDown' ? 1 : -1) + items.length) % items.length; items[i].classList.add('act'); items[i].scrollIntoView({ block: 'nearest' }); }
    if (e.key === 'Enter') { e.preventDefault(); const t = items[i]; if (t && t.matches('.sr-recent')) { si.value = t.dataset.fill; renderSearch(si.value); return; } saveRecent(si.value); location.href = t ? t.href : exploreUrl(si.value); }
  });
  on(so, 'click', (e) => {
    const t = (s) => e.target.closest(s); let el;
    if ((el = t('[data-stab]'))) { sTab = el.dataset.stab; $$('.stab').forEach((b) => b.classList.toggle('on', b === el)); renderSearch(si.value); }
    else if ((el = t('[data-sq]'))) { qf[el.dataset.sq] = !qf[el.dataset.sq]; renderSearch(si.value); }
    else if ((el = t('[data-rmrecent]'))) { e.stopPropagation(); store.set('recent', recents().filter((x) => x !== el.dataset.rmrecent)); renderSearch(si.value); }
    else if (t('[data-clear-recent]')) { store.set('recent', []); renderSearch(si.value); }
    else if ((el = t('[data-fill]'))) { si.value = el.dataset.fill; renderSearch(si.value); si.focus(); si.dispatchEvent(new Event('input', { bubbles: true })); }
    else if (t('.sr-item')) saveRecent(si.value);
  });
  /* typeahead di hero */
  const hq = $('#heroQ'), hs = $('#heroSuggest');
  if (hq && hs) {
    const upd = () => {
      const raw = hq.value.trim(); if (!raw) { hs.hidden = true; return; }
      const r = searchAll(raw);
      hs.innerHTML = (r.assets.slice(0, 4).map((a) => iAsset(a, r.ts)).join('') + r.cats.slice(0, 2).map((c) => iCat(c, r.ts)).join(''))
        + `<a class="sr-item" href="${exploreUrl(raw)}" style="justify-content:center;color:var(--cyan)">Lihat semua hasil untuk “${esc(raw)}” ${ic('arrow')}</a>`;
      if (!r.assets.length && !r.cats.length) hs.innerHTML = `<div class="sr-empty">${ic('search')}<p>Belum ada yang cocok dengan “${esc(raw)}”.</p></div>`;
      hs.hidden = false;
    };
    on(hq, 'input', upd); on(hq, 'focus', () => hq.value.trim() && upd());
    on(hq, 'keydown', (e) => {
      const items = $$('.sr-item', hs); let i = items.findIndex((x) => x.classList.contains('act'));
      if ((e.key === 'ArrowDown' || e.key === 'ArrowUp') && !hs.hidden && items.length) { e.preventDefault(); items[i] && items[i].classList.remove('act'); i = (i + (e.key === 'ArrowDown' ? 1 : -1) + items.length) % items.length; items[i].classList.add('act'); }
      else if (e.key === 'Enter' && i > -1) { e.preventDefault(); saveRecent(hq.value); location.href = items[i].href; }
      else if (e.key === 'Escape') hs.hidden = true;
    });
    on(document, 'click', (e) => { if (!e.target.closest('.hero-search')) hs.hidden = true; });
  }

  /* ---------- 8. REKOMENDASI AI ---------- */
  const initAiRec = (root) => {
    let goal = '';
    const map = { game: { cats: ['3d-models', 'audio'], tags: ['game', 'sci-fi', 'character'] }, ui: { cats: ['ui-kits', 'icons'], tags: ['dashboard', 'app', 'saas', 'ui'] }, web: { cats: ['web-templates', 'ui-kits'], tags: ['landing', 'laravel', 'tailwind'] }, video: { cats: ['motion', 'audio'], tags: ['video', 'hud', 'transition', 'cinematic'] }, brand: { cats: ['illustrations', 'icons'], tags: ['branding', 'brand', 'mascot', 'vector'] }, belajar: { cats: ['ebooks'], tags: ['belajar', 'kursus', 'ebook'] } };
    on($('[data-ai-goals]', root), 'click', (e) => { const b = e.target.closest('[data-goal]'); if (!b) return; $$('[data-goal]', root).forEach((x) => x.classList.remove('on')); b.classList.add('on'); goal = b.dataset.goal; });
    on($('[data-ai-run]', root), 'click', () => {
      if (!goal) return toast('Pilih tujuan proyekmu dulu ya', 'info');
      const out = $('[data-ai-result]', root); const budget = Number($('[data-ai-budget]', root).value);
      out.innerHTML = `<div class="ai-thinking"><span class="dots"><i></i><i></i><i></i></span> AI sedang menganalisis ribuan aset…</div>`;
      setTimeout(() => {
        const m = map[goal]; const interests = store.get('interests', []);
        const ranked = D.assets.filter((a) => (budget === 1 ? !a.price : budget ? a.price <= budget : true)).map((a) => {
          const s = (m.cats.includes(a.cat) ? 5 : 0) + a.tags.filter((t) => m.tags.includes(t)).length * 3 + a.rating + a.sales / 6000 + (interests.some((i) => a.tags.includes(i)) ? 1 : 0); return [s, a];
        }).sort((x, y) => y[0] - x[0]).slice(0, 4);
        out.innerHTML = ranked.length ? `<p class="muted mb-4">${ic('sparkle')} Ditemukan ${ranked.length} aset paling cocok untuk proyekmu:</p><div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-4">${ranked.map(([s, a]) => card(a, `<span class="badge b-new">${Math.min(99, Math.round(72 + s * 2.2))}% cocok</span>`)).join('')}</div>` : '<p class="muted">Belum ada aset yang cocok dengan budget ini. Coba naikkan budget.</p>';
        updateUI();
      }, reduce ? 0 : 1100);
    });
  };

  /* ---------- 9. CHAT AI FAQ ---------- */
  const chat = $('#chatPanel'), cb = $('#chatBody'); let greeted = false;
  const links = { lisensi: ['legal#license', 'Baca perjanjian lisensi'], refund: ['legal#refund', 'Kebijakan refund'], kreator: ['become-a-creator', 'Halaman Jadi Kreator'], langganan: ['subscription-plans', 'Lihat paket langganan'], unduh: ['my-downloads', 'Buka Unduhan Saya'], gratis: ['explore-assets?free=1', 'Lihat aset gratis'] };
  const addMsg = (t, who, html) => { const m = document.createElement('div'); m.className = 'msg ' + who; if (html) m.innerHTML = html; else m.textContent = t; cb.appendChild(m); cb.scrollTop = cb.scrollHeight; return m; };
  const answer = (q) => {
    const t = q.toLowerCase(); let best = null, bs = 0;
    D.ai.kb.forEach((e) => { const s = e[0].filter((k) => t.includes(k)).length; if (s > bs) { bs = s; best = e; } });
    if (!best) return { text: D.ai.fallback, key: '' };
    return { text: best[1], key: best[0][0] };
  };
  const ask = (q) => {
    q = q.trim(); if (!q) return; addMsg(q, 'me');
    const typing = addMsg('', 'bot', '<span class="dots"><i></i><i></i><i></i></span>');
    const r = answer(q);
    setTimeout(() => {
      const base = D.pages['explore-assets'].replace('explore-assets', ''); const lk = links[r.key];
      typing.innerHTML = esc(r.text) + (lk ? `<br><a href="${base}${lk[0]}">${lk[1]} →</a>` : r.key === '' ? `<br><a href="https://wa.me/${D.wa.number}" target="_blank" rel="noopener">Chat WhatsApp →</a>` : '');
      cb.scrollTop = cb.scrollHeight;
    }, reduce ? 0 : 650 + Math.random() * 500);
  };
  const openChat = () => {
    if (!chat) return; chat.classList.add('open'); chat.setAttribute('aria-hidden', 'false'); document.body.classList.add('chat-open'); $('#aiToggle').setAttribute('aria-expanded', 'true');
    if (!greeted) { greeted = true; addMsg(D.ai.greeting, 'bot'); $('#chatQuick').innerHTML = D.ai.quick.map((q) => `<button type="button">${esc(q)}</button>`).join(''); }
    if (fine) setTimeout(() => $('#chatInput').focus(), 300);
    const b = $('#aiBubble'); b && b.classList.remove('show');
  };
  const closeChat = () => { if (!chat) return; chat.classList.remove('open'); chat.setAttribute('aria-hidden', 'true'); document.body.classList.remove('chat-open'); $('#aiToggle').setAttribute('aria-expanded', 'false'); };
  on($('#chatForm'), 'submit', (e) => { e.preventDefault(); const i = $('#chatInput'); ask(i.value); i.value = ''; });
  on($('#chatQuick'), 'click', (e) => { const b = e.target.closest('button'); if (b) ask(b.textContent); });

  /* FAB: tampil hanya di luar Hero */
  const fabs = $$('.fab'); const hero = $('#hero');
  const showFabs = (v) => fabs.forEach((f) => f.classList.toggle('hide', !v));
  if (hero && 'IntersectionObserver' in window) new IntersectionObserver(([en]) => showFabs(!en.isIntersecting), { threshold: 0.12 }).observe(hero);
  else setTimeout(() => showFabs(true), 500);
  setTimeout(() => { const b = $('#aiBubble'); if (b && !sessionStorage.getItem('dam_bubble') && !(hero && hero.getBoundingClientRect().bottom > 80)) { b.classList.add('show'); sessionStorage.setItem('dam_bubble', '1'); setTimeout(() => b.classList.remove('show'), 6000); } }, 7000);

  /* ---------- 10. EXPLORE (filter lanjutan) ---------- */
  const initExplore = () => {
    const grid = $('#assetGrid'); if (!grid) return;
    const form = $('#filterForm'), sort = $('#sortSelect'); let shown = 12;
    const cards = $$('.card-asset', grid); const orig = cards.slice();
    const params = new URLSearchParams(location.search);
    if (params.get('q')) form.q.value = params.get('q');
    if (params.get('cat')) $$('[name=cat]', form).forEach((c) => { c.checked = c.value === params.get('cat'); });
    if (params.get('free')) form.free.checked = true; if (params.get('sale')) form.sale.checked = true; if (params.get('sort')) { sort.value = params.get('sort'); sort.dispatchEvent(new Event('csync')); }
    const state = () => ({ q: form.q.value.trim().toLowerCase(), cats: $$('[name=cat]:checked', form).map((x) => x.value), pmax: Number(form.pmax.value), rating: Number($$('[name=rating]:checked', form)[0].value), formats: $$('[name=format]:checked', form).map((x) => x.value), free: form.free.checked, sale: form.sale.checked, sort: sort.value });
    const apply = (reset) => {
      if (reset) shown = 12; const s = state();
      $('#pmaxLabel').textContent = s.pmax >= 500000 ? 'Bebas' : rp(s.pmax);
      $$('[name=format]', form).forEach((x) => x.closest('.chip').classList.toggle('on', x.checked));
      let list = orig.filter((c) => {
        const d = c.dataset; const price = Number(d.price);
        return (!s.q || d.search.includes(s.q)) && (!s.cats.length || s.cats.includes(d.cat)) && (s.pmax >= 500000 || price <= s.pmax) && Number(d.rating) >= s.rating
          && (!s.formats.length || s.formats.some((f) => d.format.includes(f))) && (!s.free || price === 0) && (!s.sale || c.querySelector('.b-sale'));
      });
      const key = { popular: (c) => -c.dataset.sales, new: (c) => Number(c.dataset.days), rating: (c) => -c.dataset.rating, 'price-asc': (c) => Number(c.dataset.price), 'price-desc': (c) => -c.dataset.price }[s.sort];
      if (key) list = list.slice().sort((a, b) => key(a) - key(b));
      else if (s.q) list = list.slice().sort((a, b) => (b.dataset.search.split(s.q).length) - (a.dataset.search.split(s.q).length));
      orig.forEach((c) => { c.style.display = 'none'; });
      list.forEach((c, i) => { grid.appendChild(c); c.style.display = i < shown ? '' : 'none'; });
      $('#resultCount').textContent = list.length; $('#assetEmpty').classList.toggle('hidden', list.length > 0); $('#loadMore').parentElement.classList.toggle('hidden', list.length <= shown);
      const act = []; if (s.q) act.push(['q', `“${s.q}”`]); s.cats.forEach((c) => act.push(['cat:' + c, (D.categories.find((x) => x.slug === c) || {}).name])); if (s.free) act.push(['free', 'Gratis']); if (s.sale) act.push(['sale', 'Diskon']); if (s.rating) act.push(['rating', `★ ${s.rating}+`]); s.formats.forEach((f) => act.push(['format:' + f, f.toUpperCase()]));
      $('#activeFilters').innerHTML = act.map(([k, l]) => `<button type="button" class="chip on" data-unfilter="${k}">${esc(l)} ${ic('close')}</button>`).join('');
      const u = new URLSearchParams(); if (s.q) u.set('q', s.q); if (s.cats.length === 1) u.set('cat', s.cats[0]); if (s.free) u.set('free', 1); if (s.sale) u.set('sale', 1); if (s.sort !== 'relevance') u.set('sort', s.sort);
      history.replaceState(null, '', location.pathname + (u.toString() ? '?' + u : ''));
    };
    const reset = () => { form.reset(); sort.value = 'relevance'; sort.dispatchEvent(new Event('csync')); $$('.search-field', form).forEach((f) => f.classList.remove('has-val')); apply(true); };
    on(form, 'input', () => apply(true)); on(form, 'change', () => apply(true)); on(sort, 'change', () => apply(true));
    on($('#filterReset'), 'click', reset); on($('#emptyReset'), 'click', reset);
    on($('#loadMore'), 'click', () => { shown += 12; apply(false); });
    on($('#filterToggle'), 'click', () => $('#filters').classList.toggle('mobile-hidden'));
    on($('#activeFilters'), 'click', (e) => {
      const b = e.target.closest('[data-unfilter]'); if (!b) return; const [k, v] = b.dataset.unfilter.split(':');
      if (k === 'q') form.q.value = ''; if (k === 'cat') $$('[name=cat]', form).forEach((x) => { if (x.value === v) x.checked = false; }); if (k === 'free') form.free.checked = false; if (k === 'sale') form.sale.checked = false;
      if (k === 'rating') $$('[name=rating]', form)[0].checked = true; if (k === 'format') $$('[name=format]', form).forEach((x) => { if (x.value === v) x.checked = false; }); apply(true);
    });
    const gv = store.get('view', 'grid'); const setView = (v) => { $$('[data-view]').forEach((x) => x.classList.toggle('on', x.dataset.view === v)); grid.classList.toggle('is-list', v === 'list'); store.set('view', v); };
    $$('[data-view]').forEach((b) => on(b, 'click', () => setView(b.dataset.view))); setView(gv);
    apply(true);
  };

  /* ---------- 11. HALAMAN PRODUK ---------- */
  const initProduct = () => {
    const root = $('[data-product]'); if (!root) return; const a = byId(root.dataset.product);
    const lic = $('#licenseSelector'); const sel = () => ($('[name=license]:checked', lic) || {}).value || 'personal';
    const upd = () => { const l = sel(); const old = $('[data-price-old]'); $$('[data-price-now]').forEach((n) => { n.textContent = rp(licPrice(a, l)); }); if (old) old.textContent = rp(licPrice({ price: a.old }, l)); };
    on(lic, 'change', upd);
    const view = $('#pdViewer'), img = $('#pdImg'); let mode = 'render';
    const modes = { render: ['', 1], wire: ['grayscale(1) contrast(1.6) brightness(1.1)', 1], night: ['hue-rotate(70deg) saturate(1.3)', 1], zoom: ['', 1.8] };
    $$('.pd-thumb').forEach((t) => on(t, 'click', () => { mode = t.dataset.mode; $$('.pd-thumb').forEach((x) => x.classList.toggle('on', x === t)); img.style.filter = modes[mode][0]; img.style.transform = `scale(${modes[mode][1]})`; }));
    on(view, 'pointermove', (e) => { if (!fine) return; const r = view.getBoundingClientRect(); img.style.transformOrigin = `${((e.clientX - r.left) / r.width) * 100}% ${((e.clientY - r.top) / r.height) * 100}%`; img.style.transform = `scale(${modes[mode][1] * 1.6})`; });
    on(view, 'pointerleave', () => { img.style.transform = `scale(${modes[mode][1]})`; });
    on(view, 'click', () => openPreview(a.id));
    document.addEventListener('click', (e) => {
      const add = e.target.closest('[data-add-lic]'); if (add) { addToCart(a.id, sel()); openOv($('#cartOverlay')); $('#cartDrawer').classList.add('open'); }
      if (e.target.closest('[data-buy-now]')) { addToCart(a.id, sel(), true); location.href = D.pages.checkout; }
    });
    const rf = $('#reviewForm'); const key = 'reviews_' + a.id; const list = $('#reviewList');
    const rev = (r) => `<article class="review"><header><span class="rav">${esc(r.name[0].toUpperCase())}</span><div><b>${esc(r.name)}</b><div class="dim tiny">Baru saja</div></div><span style="margin-left:auto">${stars(r.rate)}</span></header><p class="muted">${esc(r.text)}</p></article>`;
    list.insertAdjacentHTML('afterbegin', store.get(key, []).map(rev).join(''));
    on(rf, 'submit', (e) => {
      e.preventDefault(); const name = rf.name.value.trim(), text = rf.text.value.trim();
      if (!name || text.length < 5) return toast('Isi nama dan ulasan (min. 5 karakter)', 'info');
      const r = { name, text, rate: Number(rf.rate.value) }; const all = store.get(key, []); all.unshift(r); store.set(key, all);
      busy(rf, () => { list.insertAdjacentHTML('afterbegin', rev(r)); rf.reset(); resetStates(rf); toast('Terima kasih atas ulasanmu!'); }, 600);
    });
  };

  /* ---------- 12. HALAMAN LAIN ---------- */
  const fieldMsg = (i) => {
    const v = i.value.trim(); if (i.type === 'checkbox') return i.checked ? '' : 'Centang untuk melanjutkan';
    if (i.required && !v) return 'Wajib diisi'; if (!v) return '';
    if (i.type === 'email' && !/^\S+@\S+\.\S+$/.test(v)) return 'Format email belum valid';
    if (i.name === 'phone' && v.replace(/\D/g, '').length < 9) return 'Nomor minimal 9 digit';
    if (i.tagName === 'TEXTAREA' && i.required && v.length < 5) return 'Tulis minimal 5 karakter'; return '';
  };
  const setState = (i, show = true) => {
    const m = fieldMsg(i), w = i.closest('.inp'), fd = i.closest('.field');
    if (w) { w.classList.toggle('err', show && !!m); w.classList.toggle('valid', show && !m && !!i.value.trim()); } else i.classList.toggle('err', show && !!m);
    const em = fd && $('.err-msg', fd); if (em) em.textContent = show ? m : ''; return !m;
  };
  const validate = (form) => {
    let ok = true, first = null;
    $$('input[required],textarea[required]', form).forEach((i) => {
      if (i.type === 'checkbox') { const m = fieldMsg(i), c = i.closest('.check'); c && c.classList.toggle('err', !!m); const ee = $('#agreeErr'); if (ee) ee.textContent = m; if (m) { ok = false; first = first || i; } return; }
      i.dataset.touched = '1'; if (!setState(i)) { ok = false; first = first || i; }
    });
    if (first) first.focus(); return ok;
  };
  const busy = (form, fn, ms = 800) => { const b = $('[type=submit]', form); if (!b) return fn(); b.classList.add('loading'); b.disabled = true; setTimeout(() => { b.classList.remove('loading'); b.disabled = false; fn(); }, reduce ? 0 : ms); };
  const resetStates = (form) => $$('.inp', form).forEach((w) => w.classList.remove('valid', 'err'));
  const FIELD_ICO = { name: 'user', email: 'mail', phone: 'phone', company: 'package', city: 'pin', link: 'globe', q: 'search', message: 'chat', text: 'chat', bio: 'chat' };
  const enhanceFields = (root = document) => {
    $$('.field', root).forEach((fd) => {
      const inp = $('input.input, textarea.textarea', fd); if (!inp || fd.dataset.ef) return; fd.dataset.ef = '1';
      const area = inp.tagName === 'TEXTAREA', icon = inp.type === 'email' ? 'mail' : inp.type === 'password' ? 'lock' : FIELD_ICO[inp.name] || (area ? 'chat' : '');
      const w = document.createElement('div'); w.className = 'inp' + (area ? ' inp-area' : '') + (icon ? ' has-ico' : ''); inp.parentNode.insertBefore(w, inp);
      if (icon) w.insertAdjacentHTML('beforeend', `<span class="inp-ico">${ic(icon, '')}</span>`);
      w.appendChild(inp); w.insertAdjacentHTML('beforeend', '<span class="inp-state" aria-hidden="true"></span>');
      if (inp.type === 'password') { const b = document.createElement('button'); b.type = 'button'; b.className = 'inp-eye'; b.setAttribute('aria-label', 'Tampilkan kata sandi'); b.innerHTML = ic('eye', ''); on(b, 'click', () => { inp.type = inp.type === 'password' ? 'text' : 'password'; }); w.appendChild(b); }
      if (area && inp.maxLength > 0) { const c = document.createElement('span'); c.className = 'cnt'; w.appendChild(c); const u = () => { c.textContent = inp.value.length + '/' + inp.maxLength; }; on(inp, 'input', u); u(); }
      if (!$('.err-msg', fd)) { const em = document.createElement('span'); em.className = 'err-msg'; em.setAttribute('role', 'alert'); fd.appendChild(em); }
      on(inp, 'blur', () => { inp.dataset.touched = '1'; setState(inp); }); on(inp, 'input', () => { if (inp.dataset.touched) setState(inp); });
    });
  };

  const initPages = () => {
    // checkout
    const cf = $('#checkoutForm');
    on(cf, 'submit', (e) => {
      e.preventDefault(); if (!cart.length) return toast('Keranjang masih kosong', 'info'); if (!validate(cf)) return toast('Lengkapi data yang wajib diisi', 'info');
      const btn = $('#placeOrder'); btn.disabled = true; btn.textContent = 'Memproses pembayaran…'; const t = totals();
      setTimeout(() => {
        const no = 'AST-' + Date.now().toString(36).toUpperCase().slice(-7); const now = new Date().toISOString();
        const order = { no, date: now, items: cart.map((c) => ({ ...c })), totals: t, name: cf.name.value, email: cf.email.value, pay: cf.pay.value, coupon };
        const orders = store.get('orders', []); orders.unshift(order); store.set('orders', orders); store.set('lastOrder', order);
        order.items.forEach((c) => { if (!library.some((l) => l.id === c.id)) library.unshift({ id: c.id, lic: c.lic, date: now, order: no }); });
        cart = []; coupon = ''; save(); location.href = D.pages['order-confirmation'];
      }, reduce ? 0 : 1300);
    });
    // order confirmation
    const ob = $('#orderBox');
    if (ob) {
      const o = store.get('lastOrder', null);
      ob.innerHTML = !o ? `<p class="muted text-center">Belum ada pesanan terbaru. <a href="${D.pages['explore-assets']}" style="color:var(--cyan)">Mulai belanja</a></p>`
        : `<div class="flex justify-between flex-wrap gap-2"><div><small class="dim">No. Pesanan</small><p><b>${esc(o.no)}</b></p></div><div><small class="dim">Tanggal</small><p><b>${new Date(o.date).toLocaleString('id-ID')}</b></p></div><div><small class="dim">Pembayaran</small><p><b>${esc(o.pay)}</b></p></div><div><small class="dim">Total</small><p><b class="gt">${rp(o.totals.total)}</b></p></div></div>
          <hr class="sep">${o.items.map((c) => { const a = byId(c.id); return `<div class="mini-item"><img src="${a.img}" alt="" width="78" height="50"><div><h5>${esc(a.title)}</h5><small class="dim">Lisensi ${esc(D.licenses[c.lic].name)}</small></div><button class="btn btn-ghost btn-sm" data-download="${a.id}" data-lic="${c.lic}">${ic('download')} Unduh</button></div>`; }).join('')}<p class="tiny dim">Bukti pembayaran dikirim ke ${esc(o.email)}.</p>`;
    }
    // profile
    const pf = $('#profileForm');
    if (pf) {
      const p = store.get('profile', null); if (p) Object.keys(p).forEach((k) => { if (pf[k]) pf[k].value = p[k]; });
      const show = () => { $('#pfShowName').textContent = pf.name.value || 'Pengguna'; $('#pfShowEmail').textContent = pf.email.value; }; show();
      on(pf, 'submit', (e) => { e.preventDefault(); store.set('profile', Object.fromEntries(new FormData(pf))); show(); toast('Profil berhasil disimpan'); });
      const orders = store.get('orders', []);
      $('#orderTable').innerHTML = orders.length ? orders.map((o) => `<tr><td><b>${esc(o.no)}</b></td><td>${new Date(o.date).toLocaleDateString('id-ID')}</td><td>${o.items.length} aset</td><td>${rp(o.totals.total)}</td></tr>`).join('') : '<tr><td colspan="4" class="muted" style="text-align:center;padding:30px">Belum ada pesanan.</td></tr>';
      const ints = store.get('interests', []);
      $$('[data-interest]').forEach((b) => { b.classList.toggle('on', ints.includes(b.dataset.interest)); on(b, 'click', () => { const cur = store.get('interests', []); const i = cur.indexOf(b.dataset.interest); i > -1 ? cur.splice(i, 1) : cur.push(b.dataset.interest); store.set('interests', cur); b.classList.toggle('on'); toast('Preferensi AI diperbarui'); }); });
    }
    // creator
    on($('[data-follow]'), 'click', function () { const f = this.classList.toggle('on'); this.querySelector('span').textContent = f ? 'Mengikuti' : 'Ikuti'; toast(f ? 'Kamu mengikuti kreator ini' : 'Berhenti mengikuti'); });
    const cr = $('#creatorForm'); on(cr, 'submit', (e) => { e.preventDefault(); if (!validate(cr)) return toast('Lengkapi form pendaftaran', 'info'); busy(cr, () => { cr.reset(); resetStates(cr); toast('Pendaftaran terkirim! Kami menghubungimu dalam 2 hari kerja.'); }); });
    const cp = $('#calcPrice'), cs = $('#calcSales');
    if (cp) { const calc = () => { $('#calcPriceLbl').textContent = rp(cp.value); $('#calcSalesLbl').textContent = cs.value + ' penjualan'; $('#calcOut').textContent = rp(cp.value * cs.value * 0.8); }; on(cp, 'input', calc); on(cs, 'input', calc); calc(); }
    // dashboard
    const ch = $('#salesChart');
    if (ch) {
      const d = Array.from({ length: 30 }, (_, i) => 380 + Math.sin(i / 3) * 120 + i * 14 + ((i * 53) % 70)); const mx = Math.max(...d) * 1.1; const pts = d.map((v, i) => [(i / 29) * 800, 240 - (v / mx) * 220]);
      const path = pts.map((p, i) => (i ? 'L' : 'M') + p[0].toFixed(1) + ',' + p[1].toFixed(1)).join(' ');
      ch.innerHTML = `<defs><linearGradient id="cg" x1="0" y1="0" x2="0" y2="1"><stop offset="0" stop-color="#d946ef" stop-opacity=".45"/><stop offset="1" stop-color="#8b5cf6" stop-opacity="0"/></linearGradient><linearGradient id="cl" x1="0" x2="1"><stop offset="0" stop-color="#8b5cf6"/><stop offset=".6" stop-color="#d946ef"/><stop offset="1" stop-color="#22d3ee"/></linearGradient></defs>${[0, 1, 2, 3].map((i) => `<line x1="0" x2="800" y1="${20 + i * 73}" y2="${20 + i * 73}"/>`).join('')}<path class="area" d="${path} L800,260 L0,260Z"/><path class="ln" d="${path}"/>`;
    }
    const up = $('#uploadOverlay');
    on($('[data-open-upload]'), 'click', () => openOv(up)); on($('[data-close-upload]'), 'click', () => closeOv(up));
    on($('#uploadFile'), 'change', function () {
      const f = this.files[0]; if (!f) return; $('#upName').textContent = f.name; const w = $('#upBarWrap'); w.classList.remove('hidden'); let p = 0; const t = setInterval(() => { p = Math.min(100, p + 8); $('#upBar').style.width = p + '%'; if (p >= 100) clearInterval(t); }, 100);
    });
    on($('[data-submit-upload]'), 'click', () => { closeOv(up); toast('Aset dikirim untuk kurasi (demo)'); });
    // kontak → WhatsApp
    const ct = $('#contactForm');
    on(ct, 'submit', (e) => { e.preventDefault(); if (!validate(ct)) return toast('Lengkapi form terlebih dahulu', 'info'); const t = `Halo Astraly, saya ${ct.name.value} (${ct.email.value}).\nTopik: ${ct.topic.value}\n\n${ct.message.value}`; busy(ct, () => { window.open(`https://wa.me/${D.wa.number}?text=${encodeURIComponent(t)}`, '_blank', 'noopener'); toast('Membuka WhatsApp…'); }); });
    // help
    const hs = $('#helpSearch');
    on(hs, 'input', () => { const q = hs.value.toLowerCase().trim(); let n = 0; $$('.help-card').forEach((c) => { const v = !q || c.dataset.text.includes(q); c.style.display = v ? '' : 'none'; if (v) n++; }); $('#helpEmpty').classList.toggle('hidden', n > 0); });
    // blog
    on($('#blogFilters'), 'click', (e) => { const b = e.target.closest('[data-blog-filter]'); if (!b) return; $$('[data-blog-filter]').forEach((x) => x.classList.toggle('on', x === b)); $$('#blogGrid .blog-card').forEach((c) => { c.style.display = b.dataset.blogFilter === 'all' || c.dataset.cat === b.dataset.blogFilter ? '' : 'none'; }); });
    // billing
    on($('#billingSwitch'), 'click', (e) => { const b = e.target.closest('[data-billing]'); if (!b) return; $$('#billingSwitch button').forEach((x) => x.classList.toggle('on', x === b)); $$('[data-price-m]').forEach((p) => { const v = b.dataset.billing === 'y' ? p.dataset.priceY : p.dataset.priceM; p.textContent = rp(Number(v)); }); });
    // legal
    const lg = $('#legalNav');
    if (lg) {
      const show = (k) => { if (!$('#legal-' + k)) k = 'terms'; $$('#legalNav a').forEach((a) => a.classList.toggle('on', a.dataset.legal === k)); $$('[id^=legal-]').forEach((p) => p.classList.toggle('on', p.id === 'legal-' + k)); };
      on(lg, 'click', (e) => { const a = e.target.closest('[data-legal]'); if (!a) return; e.preventDefault(); history.replaceState(null, '', '#' + a.dataset.legal); show(a.dataset.legal); });
      show(location.hash.slice(1) || 'terms'); on(window, 'hashchange', () => show(location.hash.slice(1)));
    }
    // newsletter
    $$('[data-newsletter]').forEach((f) => on(f, 'submit', (e) => { e.preventDefault(); const i = f.email; if (!/^\S+@\S+\.\S+$/.test(i.value)) { i.focus(); return toast('Masukkan email yang valid', 'info'); } f.reset(); toast('Berhasil berlangganan newsletter Astraly!'); }));
    $$('[data-demo-form]').forEach((f) => on(f, 'submit', (e) => { e.preventDefault(); toast(f.dataset.demoForm); }));
    // kupon
    on($('#couponApply'), 'click', () => { coupon = ($('#couponInput').value || '').trim().toUpperCase(); if (!coupon) return toast('Masukkan kode promo', 'info'); save(); renderCart(); });
    on($('#cartClear'), 'click', () => { cart = []; save(); renderCart(); toast('Keranjang dikosongkan'); });
    on($('#toCheckout'), 'click', (e) => { if (!cart.length) { e.preventDefault(); toast('Keranjang masih kosong', 'info'); } });
    on($('#wishAddAll'), 'click', () => { wish.forEach((id) => addToCart(id, 'personal', true)); toast('Semua wishlist ditambahkan ke keranjang'); });
    // tabs
    $$('[data-tabs]').forEach((t) => on(t, 'click', (e) => { const b = e.target.closest('[data-tab]'); if (!b) return; $$('.tab', t).forEach((x) => x.classList.toggle('on', x === b)); $$('.tab-pane').forEach((p) => { if (p.id.startsWith('tab-')) p.classList.toggle('on', p.id === 'tab-' + b.dataset.tab); }); }));
  };

  /* ---------- 13. EFEK VISUAL ---------- */
  const initFx = () => {
    // navbar + progress
    const nav = $('#navbar'), pr = $('#progress');
    const sc = () => { const y = window.scrollY; nav && nav.classList.toggle('scrolled', y > 20); if (pr) pr.style.width = (y / Math.max(1, document.documentElement.scrollHeight - innerHeight)) * 100 + '%'; };
    on(window, 'scroll', sc, { passive: true }); sc();
    // reveal + counter
    const io = 'IntersectionObserver' in window ? new IntersectionObserver((en) => en.forEach((e) => { if (e.isIntersecting) { e.target.classList.add('in'); io.unobserve(e.target); } }), { threshold: 0.12, rootMargin: '0px 0px -40px 0px' }) : null;
    $$('.reveal').forEach((el) => (io ? io.observe(el) : el.classList.add('in')));
    const co = 'IntersectionObserver' in window ? new IntersectionObserver((en) => en.forEach((e) => {
      if (!e.isIntersecting) return; co.unobserve(e.target); const el = e.target, end = parseFloat(el.dataset.count), dec = String(end).includes('.') ? 1 : 0, suf = el.dataset.suffix || ''; const t0 = performance.now();
      const step = (t) => { const p = Math.min(1, (t - t0) / 1600), v = end * (1 - Math.pow(1 - p, 3)); el.textContent = v.toLocaleString('id-ID', { minimumFractionDigits: dec, maximumFractionDigits: dec }) + suf; if (p < 1) requestAnimationFrame(step); }; reduce ? (el.textContent = end.toLocaleString('id-ID') + suf) : requestAnimationFrame(step);
    }), { threshold: 0.4 }) : null;
    $$('[data-count]').forEach((el) => co && co.observe(el));
    // hero parallax
    const h = $('#hero');
    if (h && fine && !reduce) on(h, 'pointermove', (e) => { const r = h.getBoundingClientRect(), x = (e.clientX - r.left) / r.width - 0.5, y = (e.clientY - r.top) / r.height - 0.5; const bg = $('#heroBg'); bg.style.transform = `translate(${x * -26}px, ${y * -18}px) scale(1.03)`; $$('[data-depth]', h).forEach((c) => { const d = Number(c.dataset.depth); c.style.translate = `${x * d}px ${y * d}px`; }); });
    // tilt (delegasi)
    let tEl = null;
    if (fine && !reduce) {
      on(document, 'pointermove', (e) => { if (e.pointerType !== 'mouse') return; const t = e.target.closest && e.target.closest('[data-tilt]'); if (t !== tEl) { if (tEl) tEl.style.transform = ''; tEl = t; } if (!t) return; const r = t.getBoundingClientRect(); t.style.transform = `perspective(900px) rotateX(${-((e.clientY - r.top) / r.height - 0.5) * 6}deg) rotateY(${((e.clientX - r.left) / r.width - 0.5) * 8}deg) translateY(-6px)`; });
      on(document.documentElement, 'mouseleave', () => { if (tEl) { tEl.style.transform = ''; tEl = null; } });
      const g = $('#cursorGlow'); on(document, 'pointermove', (e) => { g.style.left = e.clientX + 'px'; g.style.top = e.clientY + 'px'; });
    }
    // countdown
    $$('[data-countdown]').forEach((c) => {
      const k = 'dam_cd'; let end = Number(sessionStorage.getItem(k)); if (!end || end < Date.now()) { end = Date.now() + Number(c.dataset.countdown) * 36e5; sessionStorage.setItem(k, end); }
      const tick = () => { let s = Math.max(0, Math.floor((end - Date.now()) / 1000)); const v = { h: Math.floor(s / 3600), m: Math.floor((s % 3600) / 60), s: s % 60 }; Object.keys(v).forEach((x) => { const e = $(`[data-cd=${x}]`, c); if (e) e.textContent = String(v[x]).padStart(2, '0'); }); };
      tick(); setInterval(tick, 1000);
    });
    // starfield
    const cv = $('#starfield');
    if (cv) {
      const ctx = cv.getContext('2d'); let W, H, stars = [], shoot = null; const dpr = Math.min(devicePixelRatio || 1, 1.5);
      const init = () => { W = cv.width = innerWidth * dpr; H = cv.height = innerHeight * dpr; cv.style.width = '100%'; cv.style.height = '100%'; stars = Array.from({ length: Math.round((innerWidth * innerHeight) / 7000) }, () => ({ x: Math.random() * W, y: Math.random() * H, r: (Math.random() * 1.3 + 0.3) * dpr, a: Math.random() * 6.28, s: Math.random() * 0.02 + 0.005, z: Math.random() * 0.5 + 0.1, c: ['#fff', '#c4b5fd', '#a5f3fc', '#f5d0fe'][Math.floor(Math.random() * 4)] })); };
      const draw = () => {
        ctx.clearRect(0, 0, W, H); const off = reduce ? 0 : window.scrollY * 0.12 * dpr;
        stars.forEach((s) => { s.a += s.s; ctx.globalAlpha = 0.35 + 0.65 * Math.abs(Math.sin(s.a)); ctx.fillStyle = s.c; ctx.beginPath(); ctx.arc(s.x, (s.y - off * s.z + H * 4) % H, s.r, 0, 6.28); ctx.fill(); });
        if (!reduce) { if (!shoot && Math.random() < 0.004) shoot = { x: Math.random() * W, y: Math.random() * H * 0.4, l: 0 }; if (shoot) { ctx.globalAlpha = 1 - shoot.l / 70; const g = ctx.createLinearGradient(shoot.x, shoot.y, shoot.x - 90 * dpr, shoot.y - 40 * dpr); g.addColorStop(0, '#fff'); g.addColorStop(1, 'transparent'); ctx.strokeStyle = g; ctx.lineWidth = 2 * dpr; ctx.beginPath(); ctx.moveTo(shoot.x, shoot.y); ctx.lineTo(shoot.x - 90 * dpr, shoot.y - 40 * dpr); ctx.stroke(); shoot.x += 14 * dpr; shoot.y += 6 * dpr; if (++shoot.l > 70) shoot = null; } }
        if (!reduce && !document.hidden) requestAnimationFrame(draw);
      };
      init(); draw(); on(window, 'resize', () => { init(); if (reduce) draw(); }); on(document, 'visibilitychange', () => { if (!document.hidden && !reduce) draw(); });
    }
  };

  /* ---------- 14. DELEGASI KLIK GLOBAL ---------- */
  on(document, 'click', (e) => {
    const t = (s) => e.target.closest(s);
    let el;
    if ((el = t('[data-add]'))) { e.preventDefault(); const id = Number(el.dataset.add); cart.some((c) => c.id === id) ? (openOv($('#cartOverlay')), $('#cartDrawer').classList.add('open')) : addToCart(id); }
    else if ((el = t('[data-add-bundle]'))) { el.dataset.addBundle.split(',').forEach((id) => addToCart(Number(id), 'personal', true)); toast('Bundle ditambahkan ke keranjang'); }
    else if ((el = t('[data-pv-add]'))) { addToCart(Number(el.dataset.pvAdd), $('#pvLic').value); closeOv($('#previewOverlay')); openOv($('#cartOverlay')); $('#cartDrawer').classList.add('open'); }
    else if ((el = t('[data-wish]'))) { e.preventDefault(); toggleWish(el.dataset.wish); }
    else if ((el = t('[data-preview]'))) openPreview(el.dataset.preview);
    else if ((el = t('[data-download]'))) openDownload(el.dataset.download, el.dataset.lic || 'personal');
    else if ((el = t('[data-remove]'))) removeFromCart(el.dataset.remove);
    else if (t('[data-open-cart]')) { openOv($('#cartOverlay')); $('#cartDrawer').classList.add('open'); $('#cartDrawer').setAttribute('aria-hidden', 'false'); }
    else if (t('[data-close-cart]') && (t('#cartOverlay') || t('button'))) { closeOv($('#cartOverlay')); $('#cartDrawer').classList.remove('open'); }
    else if (t('[data-open-search]')) openSearch();
    else if (t('[data-close-search]') || e.target === so) closeSearch();
    else if ((el = t('[data-clear]'))) { const i = $(el.dataset.clear); if (i) { i.value = ''; i.dispatchEvent(new Event('input', { bubbles: true })); i.focus(); } }
    else if ((el = t('[data-fill-input]'))) { const i = $(el.dataset.fillInput); if (i) { i.value = el.dataset.v; i.dispatchEvent(new Event('input', { bubbles: true })); i.focus(); } }
    else if ((el = t('[data-scroll-to]'))) { const x = $(el.dataset.scrollTo); if (x) x.scrollIntoView({ behavior: reduce ? 'auto' : 'smooth', block: 'start' }); }
    else if (t('[data-open-menu]')) { $('#mobileMenu').classList.add('open'); lockCheck(); $('[data-open-menu]').setAttribute('aria-expanded', 'true'); }
    else if (t('[data-close-menu]') || t('#mobileMenu a')) { $('#mobileMenu').classList.remove('open'); lockCheck(); }
    else if (t('[data-close-preview]') || e.target === $('#previewOverlay')) closeOv($('#previewOverlay'));
    else if (t('[data-close-download]') || e.target === $('#downloadOverlay')) { clearInterval(dlTimer); closeOv($('#downloadOverlay')); }
    else if (t('[data-chat-open]') || t('#aiToggle')) { chat.classList.contains('open') && t('#aiToggle') ? closeChat() : openChat(); }
    else if (t('[data-chat-close]')) closeChat();
    else if ((el = t('[data-copy]'))) { const v = el.dataset.copy; (navigator.clipboard ? navigator.clipboard.writeText(v) : Promise.reject()).catch(() => { const x = document.createElement('textarea'); x.value = v; document.body.appendChild(x); x.select(); document.execCommand('copy'); x.remove(); }); toast(`Kode ${v} disalin`); }
    else if ((el = t('[data-scroll]'))) { const c = document.getElementById(el.dataset.scroll); c.scrollBy({ left: Number(el.dataset.dir) * c.clientWidth * 0.8, behavior: 'smooth' }); }
    else if ((el = t('[data-toast]'))) { e.preventDefault(); toast(el.dataset.toast, 'info'); }
    else if ((el = t('[data-pv-zoom]'))) { /* zoom via pointermove */ }
  });
  on(document, 'change', (e) => {
    const s = e.target.closest('[data-lic-change]'); if (s) { const c = cart.find((x) => x.id === Number(s.dataset.licChange)); if (c) { c.lic = s.value; save(); renderCart(); } }
    if (e.target.id === 'pvLic') { const a = byId(pvId); if (a) $('#pvPrice').textContent = rp(licPrice(a, e.target.value)); }
  });
  on(document, 'pointermove', (e) => { const z = e.target.closest && e.target.closest('[data-pv-zoom]'); if (z && fine) { const r = z.getBoundingClientRect(), i = $('img', z); i.style.transformOrigin = `${((e.clientX - r.left) / r.width) * 100}% ${((e.clientY - r.top) / r.height) * 100}%`; i.style.transform = 'scale(1.6)'; } });
  on(document, 'pointerout', (e) => { const z = e.target.closest && e.target.closest('[data-pv-zoom]'); if (z && !z.contains(e.relatedTarget)) $('img', z).style.transform = ''; });
  on(document, 'keydown', (e) => {
    if (e.key === 'Escape') { $$('.menu > li.open').forEach((li) => li.classList.remove('open')); closeSearch(); closeOv($('#previewOverlay')); closeOv($('#downloadOverlay')); closeOv($('#uploadOverlay')); closeOv($('#cartOverlay')); const d = $('#cartDrawer'); d && d.classList.remove('open'); $('#mobileMenu') && $('#mobileMenu').classList.remove('open'); closeChat(); lockCheck(); }
    const typing = /input|textarea|select/i.test(document.activeElement.tagName);
    if ((e.key === '/' && !typing) || ((e.ctrlKey || e.metaKey) && e.key.toLowerCase() === 'k')) { e.preventDefault(); openSearch(); }
  });

  /* ---------- 14b. DROPDOWN KUSTOM (select) ---------- */
  const enhanceSelects = (root = document) => {
    $$('select', root).forEach((sel) => {
      if (sel.dataset.cs || sel.multiple) return; sel.dataset.cs = '1';
      const w = document.createElement('div');
      w.className = 'cs ' + (sel.classList.contains('select') ? 'cs-field' : 'cs-ghost') + (sel.dataset.csSize === 'sm' ? ' cs-sm' : '') + (sel.style.width === 'auto' ? ' cs-auto' : '');
      sel.parentNode.insertBefore(w, sel); w.appendChild(sel); sel.classList.add('cs-native'); sel.tabIndex = -1; sel.setAttribute('aria-hidden', 'true');
      const btn = document.createElement('button'); btn.type = 'button'; btn.className = 'cs-btn'; btn.setAttribute('aria-haspopup', 'listbox'); btn.setAttribute('aria-expanded', 'false');
      btn.innerHTML = '<span class="cs-val"></span>' + ic('chev', ''); w.appendChild(btn);
      const lab = sel.getAttribute('aria-label'); if (lab) btn.setAttribute('aria-label', lab);
      const sync = () => { const o = sel.options[sel.selectedIndex]; btn.querySelector('.cs-val').textContent = o ? o.text.split(' — ')[0] : ''; };
      sync(); on(sel, 'csync', sync); if (sel.form) on(sel.form, 'reset', () => setTimeout(sync, 0));
      let panel = null;
      const away = (e) => { if (panel && !panel.contains(e.target) && !w.contains(e.target)) close(); };
      const scr = (e) => { if (!(panel && panel.contains(e.target))) close(); };
      const close = () => { if (!panel) return; panel.remove(); panel = null; w.classList.remove('open'); btn.setAttribute('aria-expanded', 'false'); document.removeEventListener('click', away, true); window.removeEventListener('scroll', scr, true); window.removeEventListener('resize', close); };
      const open = () => {
        if (panel) return close(); $$('.cs-panel').forEach((p) => p.remove()); $$('.cs.open').forEach((x) => x.classList.remove('open'));
        panel = document.createElement('div'); panel.className = 'cs-panel'; panel.setAttribute('role', 'listbox');
        panel.innerHTML = Array.from(sel.options).map((o, i) => { const [a, b] = o.text.split(' — '); return `<button type="button" class="cs-opt ${i === sel.selectedIndex ? 'sel' : ''}" role="option" data-i="${i}"><span>${esc(a)}${b ? `<small>${esc(b)}</small>` : ''}</span>${ic('check')}</button>`; }).join('');
        document.body.appendChild(panel); w.classList.add('open'); btn.setAttribute('aria-expanded', 'true');
        const r = btn.getBoundingClientRect(), h = Math.min(panel.scrollHeight, 280), below = innerHeight - r.bottom, wd = Math.max(r.width, 200);
        panel.style.minWidth = wd + 'px'; panel.style.left = Math.max(8, Math.min(r.left, innerWidth - wd - 12)) + 'px'; panel.style.top = (below < h + 16 && r.top > below ? r.top - h - 8 : r.bottom + 8) + 'px';
        const cur = $('.cs-opt.sel', panel) || $('.cs-opt', panel); if (cur) { cur.focus({ preventScroll: true }); cur.scrollIntoView({ block: 'nearest' }); }
        on(panel, 'click', (e) => { const o = e.target.closest('.cs-opt'); if (!o) return; sel.selectedIndex = Number(o.dataset.i); sync(); sel.dispatchEvent(new Event('input', { bubbles: true })); sel.dispatchEvent(new Event('change', { bubbles: true })); close(); btn.focus(); });
        on(panel, 'keydown', (e) => { const os = $$('.cs-opt', panel), i = os.indexOf(document.activeElement); if (e.key === 'ArrowDown') { e.preventDefault(); os[(i + 1) % os.length].focus(); } else if (e.key === 'ArrowUp') { e.preventDefault(); os[(i - 1 + os.length) % os.length].focus(); } else if (e.key === 'Escape') { e.stopPropagation(); close(); btn.focus(); } else if (e.key === 'Tab') close(); });
        setTimeout(() => { document.addEventListener('click', away, true); window.addEventListener('scroll', scr, true); window.addEventListener('resize', close); }, 0);
      };
      on(btn, 'click', open); on(btn, 'keydown', (e) => { if (e.key === 'ArrowDown' || e.key === 'ArrowUp') { e.preventDefault(); open(); } });
    });
  };

  /* ---------- 14c. NAVBAR DROPDOWN (hover-intent, keyboard, touch) ---------- */
  const initNav = () => {
    const items = $$('.menu > li.has-dd'); const closeAll = (ex) => items.forEach((li) => { if (li !== ex) { li.classList.remove('open'); const l = $('.nlink', li); l && l.setAttribute('aria-expanded', 'false'); } });
    const openLi = (li) => { closeAll(li); li.classList.add('open'); const l = $('.nlink', li); l && l.setAttribute('aria-expanded', 'true'); };
    items.forEach((li) => {
      on(li, 'mouseenter', () => { if (!fine) return; clearTimeout(li._t); openLi(li); });
      on(li, 'mouseleave', () => { if (!fine) return; li._t = setTimeout(() => li.classList.remove('open'), 200); });
      on(li, 'focusin', () => openLi(li)); on(li, 'focusout', (e) => { if (!li.contains(e.relatedTarget)) li.classList.remove('open'); });
      on($('.nlink', li), 'click', (e) => { if (!fine && !li.classList.contains('open')) { e.preventDefault(); openLi(li); } });
    });
    on(document, 'click', (e) => { if (!e.target.closest('.menu')) closeAll(); });
  };

  /* ---------- 14d. HERO: orbit planet, typed, konstelasi ---------- */
  const initHero = () => {
    const h = $('#hero'); if (!h) return; const bg = $('#heroBg'), orb = $('#heroOrbit');
    const place = () => { const W = bg.clientWidth, H = bg.clientHeight, k = Math.max(W / 3840, H / 2160), ox = W - 3840 * k, oy = (H - 2160 * k) / 2; orb.style.setProperty('--ox', ox + 2760 * k + 'px'); orb.style.setProperty('--oy', oy + 1060 * k + 'px'); orb.style.setProperty('--ow', 640 * k * 6 + 'px'); };
    place(); on(window, 'resize', place);
    const ty = $('#heroTyped');
    if (ty) { const words = JSON.parse(ty.dataset.words); let wi = 0, ci = 0, del = false; const tick = () => { const w = words[wi]; ci += del ? -1 : 1; ty.textContent = w.slice(0, ci); let d = del ? 38 : 85; if (!del && ci === w.length) { del = true; d = 1500; } else if (del && ci === 0) { del = false; wi = (wi + 1) % words.length; d = 320; } setTimeout(tick, d); }; if (reduce) ty.textContent = words[0]; else { ci = words[0].length; del = true; setTimeout(tick, 1800); } }
    const cv = $('#heroFx'); if (!cv || reduce) return;
    const ctx = cv.getContext('2d'), dpr = Math.min(devicePixelRatio || 1, 1.5); let W, H, nodes = [], mx = -999, my = -999, run = true, going = false;
    const size = () => { W = cv.width = h.clientWidth * dpr; H = cv.height = h.clientHeight * dpr; const n = Math.min(72, Math.round((h.clientWidth * h.clientHeight) / 15000)); nodes = Array.from({ length: n }, () => ({ x: Math.random() * W, y: Math.random() * H, vx: (Math.random() - 0.5) * 0.35 * dpr, vy: (Math.random() - 0.5) * 0.35 * dpr, r: (Math.random() * 1.6 + 0.6) * dpr, c: Math.random() < 0.5 ? '167,139,250' : '34,211,238' })); };
    size(); on(window, 'resize', size);
    on(h, 'pointermove', (e) => { const r = h.getBoundingClientRect(); mx = (e.clientX - r.left) * dpr; my = (e.clientY - r.top) * dpr; }); on(h, 'pointerleave', () => { mx = my = -999; });
    const L = 140 * dpr, M = 180 * dpr;
    const frame = () => {
      if (!run) { going = false; return; }
      ctx.clearRect(0, 0, W, H);
      nodes.forEach((n) => { n.x += n.vx; n.y += n.vy; if (n.x < 0 || n.x > W) n.vx *= -1; if (n.y < 0 || n.y > H) n.vy *= -1; const dx = mx - n.x, dy = my - n.y; if (Math.hypot(dx, dy) < M) { n.x += dx * 0.012; n.y += dy * 0.012; } ctx.beginPath(); ctx.fillStyle = 'rgba(' + n.c + ',.85)'; ctx.arc(n.x, n.y, n.r, 0, 6.283); ctx.fill(); });
      ctx.lineWidth = dpr * 0.8;
      for (let i = 0; i < nodes.length; i++) for (let j = i + 1; j < nodes.length; j++) { const a = nodes[i], b = nodes[j], d = Math.hypot(a.x - b.x, a.y - b.y); if (d < L) { ctx.strokeStyle = 'rgba(' + a.c + ',' + (1 - d / L) * 0.32 + ')'; ctx.beginPath(); ctx.moveTo(a.x, a.y); ctx.lineTo(b.x, b.y); ctx.stroke(); } }
      if (mx > 0) nodes.forEach((n) => { const d = Math.hypot(mx - n.x, my - n.y); if (d < M) { ctx.strokeStyle = 'rgba(232,121,249,' + (1 - d / M) * 0.55 + ')'; ctx.beginPath(); ctx.moveTo(mx, my); ctx.lineTo(n.x, n.y); ctx.stroke(); } });
      requestAnimationFrame(frame);
    };
    const start = () => { if (!going) { going = true; requestAnimationFrame(frame); } };
    if ('IntersectionObserver' in window) new IntersectionObserver(([en]) => { run = en.isIntersecting; if (run) start(); }).observe(h); start();
  };

  /* ---------- 15. INIT ---------- */
  const init = () => {
    document.documentElement.classList.add('js');
    $$('[data-ai-rec]').forEach(initAiRec);
    enhanceSelects(); enhanceFields(); initNav(); initHero();
    initExplore(); initProduct(); initPages(); initFx();
    $$('.search-field input').forEach((i) => i.closest('.search-field').classList.toggle('has-val', !!i.value));
    on(document, 'input', (e) => { const f = e.target.closest && e.target.closest('.search-field'); if (f) f.classList.toggle('has-val', !!e.target.value); });
    on(document, 'change', (e) => { if (e.target.type === 'checkbox') { const c = e.target.closest('.check'); c && c.classList.remove('err'); } });
    renderCart(); renderWish(); renderLibrary(); updateUI();
    const done = () => { const l = $('#loader'); l && l.classList.add('done'); };
    document.readyState === 'complete' ? setTimeout(done, 250) : on(window, 'load', () => setTimeout(done, 250)); setTimeout(done, 2800);
  };
  init();
})();
