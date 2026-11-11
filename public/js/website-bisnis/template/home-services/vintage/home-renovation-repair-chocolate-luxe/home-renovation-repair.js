/* ==========================================================================
   RenovatePro — Home Services · Vintage · Chocolate Luxe
   File : home-renovation-repair.js  (vanilla JS, tanpa dependensi)
   Data : dibaca dari <script type="application/json" id="rr-data"> pada view
   ========================================================================== */
(function () {
  'use strict';

  /* ---------- util ---------- */
  var $ = function (s, c) { return (c || document).querySelector(s); };
  var $$ = function (s, c) { return Array.prototype.slice.call((c || document).querySelectorAll(s)); };
  var reduced = window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches;
  var DATA = {};
  try { DATA = JSON.parse(($('#rr-data') || {}).textContent || '{}'); } catch (e) { DATA = {}; }
  var WA = DATA.wa || '';
  var BASE = (DATA.base || '').replace(/\/$/, '');
  var url = function (slug) { return BASE + (slug ? '/' + slug : ''); };
  var waUrl = function (text) { return 'https://wa.me/' + WA + '?text=' + encodeURIComponent(text || DATA.greeting || ''); };
  var rupiah = function (n) { try { return 'Rp ' + new Intl.NumberFormat('id-ID').format(Math.round(n)); } catch (e) { return 'Rp ' + Math.round(n); } };
  var store = { get: function (k) { try { return window.sessionStorage.getItem(k); } catch (e) { return null; } }, set: function (k, v) { try { window.sessionStorage.setItem(k, v); } catch (e) { /* abaikan */ } } };

  var toastTimer;
  function toast(msg, ms) {
    var t = $('#rr-toast'); if (!t) { return; }
    t.textContent = msg; t.hidden = false;
    clearTimeout(toastTimer);
    toastTimer = setTimeout(function () { t.hidden = true; }, ms || 3600);
  }
  function openWA(text) {
    var w = window.open(waUrl(text), '_blank', 'noopener');
    if (!w) { window.location.href = waUrl(text); }
  }
  function useIcon(btn, id) { var u = $('use', btn); if (u) { u.setAttribute('href', '#' + id); } }

  /* ---------- navbar: burger, dropdown, search ---------- */
  var menu = $('#rr-menu'), burger = $('.rr-burger'), scrim = $('.rr-scrim');
  function setMenu(open) {
    if (!menu || !burger) { return; }
    menu.classList.toggle('is-open', open);
    burger.setAttribute('aria-expanded', String(open));
    burger.setAttribute('aria-label', open ? 'Tutup menu' : 'Buka menu');
    useIcon(burger, open ? 'i-close' : 'i-menu');
    if (scrim) { scrim.hidden = !open; }
    document.body.style.overflow = open ? 'hidden' : '';
  }
  if (burger) { burger.addEventListener('click', function () { setMenu(!menu.classList.contains('is-open')); }); }
  if (scrim) { scrim.addEventListener('click', function () { setMenu(false); closeSearch(); }); }

  function closeSubs(except) {
    $$('.rr-menu__li.is-open').forEach(function (li) {
      if (li !== except) { li.classList.remove('is-open'); var b = $('.rr-menu__tg', li); if (b) { b.setAttribute('aria-expanded', 'false'); } }
    });
  }
  $$('.rr-menu__tg').forEach(function (btn) {
    btn.addEventListener('click', function (e) {
      e.stopPropagation();
      var li = btn.closest('.rr-menu__li'), open = !li.classList.contains('is-open');
      closeSubs(li); li.classList.toggle('is-open', open); btn.setAttribute('aria-expanded', String(open));
    });
  });
  $$('.rr-menu a').forEach(function (a) { a.addEventListener('click', function () { setMenu(false); }); });
  document.addEventListener('click', function (e) { if (!e.target.closest('.rr-menu__li')) { closeSubs(); } });
  window.addEventListener('resize', function () { if (window.innerWidth >= 1280) { setMenu(false); } });

  var sBtn = $('.rr-searchbtn'), sBox = $('#rr-search'), sInput = $('#rr-search-input'), sList = $('#rr-search-list');
  function renderSearch(q) {
    if (!sList) { return; }
    q = (q || '').trim().toLowerCase();
    var items = (DATA.search || []).filter(function (it) { return !q || (it.t + ' ' + it.d).toLowerCase().indexOf(q) > -1; }).slice(0, 12);
    sList.innerHTML = '';
    if (!items.length) { var li = document.createElement('li'); li.className = 'rr-search__empty'; li.textContent = 'Tidak ada hasil untuk “' + q + '”.'; sList.appendChild(li); return; }
    items.forEach(function (it) {
      var li = document.createElement('li'), a = document.createElement('a'), s = document.createElement('strong'), d = document.createElement('span');
      a.href = it.u; s.textContent = it.t; d.textContent = it.d; a.appendChild(s); a.appendChild(d); li.appendChild(a); sList.appendChild(li);
    });
  }
  function openSearch() { if (!sBox) { return; } sBox.hidden = false; sBtn.setAttribute('aria-expanded', 'true'); renderSearch(''); setTimeout(function () { sInput.focus(); }, 30); }
  function closeSearch() { if (!sBox || sBox.hidden) { return; } sBox.hidden = true; if (sBtn) { sBtn.setAttribute('aria-expanded', 'false'); } }
  if (sBtn) { sBtn.addEventListener('click', function () { if (sBox.hidden) { openSearch(); } else { closeSearch(); } }); }
  if (sInput) { sInput.addEventListener('input', function () { renderSearch(sInput.value); }); }
  var sForm = $('[data-rr-searchform]');
  if (sForm) { sForm.addEventListener('submit', function (e) { e.preventDefault(); var a = $('a', sList); if (a) { window.location.href = a.href; } }); }
  var sClose = $('.rr-search__close'); if (sClose) { sClose.addEventListener('click', function () { closeSearch(); sBtn.focus(); }); }

  /* ---------- reveal saat scroll ---------- */
  var reveal = $$('[data-rr-in]');
  reveal.forEach(function (el) { var i = Array.prototype.indexOf.call(el.parentNode.children, el); el.style.setProperty('--d', (i % 4) * 0.09 + 's'); });
  if ('IntersectionObserver' in window && !reduced) {
    var io = new IntersectionObserver(function (es) { es.forEach(function (en) { if (en.isIntersecting) { en.target.classList.add('is-in'); io.unobserve(en.target); } }); }, { threshold: 0.12, rootMargin: '0px 0px -4% 0px' });
    reveal.forEach(function (el) { io.observe(el); });
  } else { reveal.forEach(function (el) { el.classList.add('is-in'); }); }

  /* ---------- before / after slider ---------- */
  $$('[data-rr-compare]').forEach(function (box) {
    var input = $('input[type="range"]', box), touched = false;
    function set(v) { box.style.setProperty('--pos', v + '%'); }
    input.addEventListener('input', function () { touched = true; set(input.value); });
    if (!reduced && 'IntersectionObserver' in window) {
      var o = new IntersectionObserver(function (es) {
        if (!es[0].isIntersecting) { return; } o.disconnect();
        var t0 = null, dur = 2600;
        (function step(ts) {
          if (touched) { return; } if (t0 === null) { t0 = ts; }
          var p = Math.min((ts - t0) / dur, 1), v = 50 + Math.sin(p * Math.PI * 2) * 22 * (1 - p * 0.35);
          input.value = v; set(v);
          if (p < 1) { requestAnimationFrame(step); } else { input.value = 50; set(50); }
        })(performance.now());
      }, { threshold: 0.5 });
      o.observe(box);
    }
  });

  /* ---------- filter proyek ---------- */
  var filters = $$('[data-rr-filter]');
  function applyFilter(cat) {
    filters.forEach(function (b) { b.classList.toggle('is-on', b.getAttribute('data-rr-filter') === cat); });
    $$('.rr-prj').forEach(function (c) { c.hidden = !(cat === 'all' || c.getAttribute('data-cat') === cat); });
  }
  filters.forEach(function (b) { b.addEventListener('click', function () { applyFilter(b.getAttribute('data-rr-filter')); }); });
  if (filters.length) {
    var h = (window.location.hash || '').replace('#', '');
    if (h === 'interior' || h === 'eksterior') { applyFilter(h); var g = $('.rr-filter'); if (g) { setTimeout(function () { g.scrollIntoView({ block: 'center' }); }, 60); } }
  }

  /* ---------- formulir → WhatsApp ---------- */
  var params = new URLSearchParams(window.location.search);
  [['paket', '#q-paket'], ['layanan', '#q-layanan']].forEach(function (p) {
    var v = params.get(p[0]), el = $(p[1]);
    if (v && el && $('option[value="' + v.replace(/[^a-z0-9-]/gi, '') + '"]', el)) { el.value = v.replace(/[^a-z0-9-]/gi, ''); }
  });
  var dateEl = $('#s-tanggal');
  if (dateEl) { var d = new Date(); d.setMinutes(d.getMinutes() - d.getTimezoneOffset()); dateEl.min = d.toISOString().slice(0, 10); }

  function field(form, name) { return form.elements[name]; }
  function val(form, name) { var f = field(form, name); return f && f.value ? String(f.value).trim() : ''; }
  function optText(form, name) { var f = field(form, name); return f && f.selectedIndex > -1 && f.value ? f.options[f.selectedIndex].text : ''; }
  function setErr(wrap, msg) {
    if (!wrap) { return; }
    wrap.classList.toggle('is-err', !!msg);
    var e = $('.rr-field__err', wrap);
    if (msg) { if (!e) { e = document.createElement('span'); e.className = 'rr-field__err'; wrap.appendChild(e); } e.textContent = msg; } else if (e) { e.remove(); }
  }
  function validate(form) {
    var ok = true, first = null;
    $$('input[required], select[required], textarea[required]', form).forEach(function (f) {
      var wrap = f.closest('.rr-field'), msg = '';
      if (f.type === 'radio') {
        var any = $$('input[name="' + f.name + '"]', form).some(function (r) { return r.checked; });
        if (!any) { msg = 'Pilih salah satu.'; }
        if (wrap) { wrap.classList.toggle('is-err', !any); }
        if (!any) { ok = false; first = first || f; }
        return;
      }
      var v = f.value.trim();
      if (!v) { msg = 'Wajib diisi.'; }
      else if (f.type === 'tel' && v.replace(/\D/g, '').length < 9) { msg = 'Nomor tidak valid.'; }
      else if (f.type === 'email' && !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(v)) { msg = 'Email tidak valid.'; }
      setErr(wrap, msg);
      if (msg) { ok = false; first = first || f; }
    });
    var em = field(form, 'email');
    if (em && !em.required && em.value.trim() && !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(em.value.trim())) { setErr(em.closest('.rr-field'), 'Email tidak valid.'); ok = false; first = first || em; }
    if (first) { first.focus(); }
    return ok;
  }
  function msgEl(form) { return $('.rr-form__msg', form) || $('.rr-form__msg', form.parentNode); }
  function say(form, text, kind) { var m = msgEl(form); if (m) { m.textContent = text; m.className = 'rr-form__msg ' + (kind ? 'is-' + kind : ''); } }
  function fmtDate(iso) { try { return new Date(iso + 'T00:00:00').toLocaleDateString('id-ID', { weekday: 'long', day: 'numeric', month: 'long', year: 'numeric' }); } catch (e) { return iso; } }

  $$('[data-rr-form]').forEach(function (form) {
    var type = form.getAttribute('data-rr-form');
    $$('input, select, textarea', form).forEach(function (f) { f.addEventListener('input', function () { setErr(f.closest('.rr-field'), ''); }); f.addEventListener('change', function () { setErr(f.closest('.rr-field'), ''); }); });
    form.addEventListener('submit', function (e) {
      e.preventDefault();
      if (!validate(form)) { say(form, 'Mohon lengkapi data yang ditandai.', 'err'); return; }
      var L = [];
      if (type === 'quote') {
        L.push('*Permintaan Penawaran — RenovatePro*', 'Nama: ' + val(form, 'nama'), 'WhatsApp: ' + val(form, 'whatsapp'));
        if (val(form, 'email')) { L.push('Email: ' + val(form, 'email')); }
        L.push('Layanan: ' + optText(form, 'layanan'));
        if (optText(form, 'paket')) { L.push('Paket: ' + optText(form, 'paket')); }
        L.push('Lokasi proyek: ' + val(form, 'lokasi'));
        if (val(form, 'luas')) { L.push('Perkiraan luas: ' + val(form, 'luas') + ' m²'); }
        if (val(form, 'catatan')) { L.push('Kebutuhan: ' + val(form, 'catatan')); }
        openWA(L.join('\n')); say(form, 'Mengarahkan ke WhatsApp. Jika tidak terbuka, izinkan pop-up lalu kirim ulang.', 'ok'); toast('Pesan siap dikirim lewat WhatsApp.');
      } else if (type === 'survey') {
        L.push('*Booking Survei Lokasi — RenovatePro*', 'Nama: ' + val(form, 'nama'), 'WhatsApp: ' + val(form, 'whatsapp'), 'Alamat: ' + val(form, 'alamat'), 'Wilayah: ' + optText(form, 'wilayah'), 'Layanan: ' + optText(form, 'layanan'), 'Tanggal: ' + fmtDate(val(form, 'tanggal')), 'Jam: ' + (($('input[name="waktu"]:checked', form) || {}).value || ''));
        if (val(form, 'catatan')) { L.push('Catatan: ' + val(form, 'catatan')); }
        openWA(L.join('\n')); say(form, 'Mengarahkan ke WhatsApp. Tim kami akan mengonfirmasi jadwal Anda.', 'ok'); toast('Permintaan survei siap dikirim.');
      } else if (type === 'newsletter') {
        openWA('Halo RenovatePro, saya ingin berlangganan newsletter. Email saya: ' + val(form, 'email')); say(form, 'Terima kasih! Lanjutkan di WhatsApp.', 'ok'); form.reset();
      } else if (type === 'area') {
        var wil = val(form, 'wilayah'), kota = val(form, 'kota'), res = $('.rr-check__res', form), hit = (DATA.areas || []).filter(function (a) { return a.name === wil; })[0];
        var text = hit ? 'Wilayah ' + hit.name + ' termasuk area layanan kami (' + hit.cities + '). Tim kami akan memastikan ketersediaan untuk ' + kota + '.' : 'Wilayah ' + kota + ' belum tercantum di daftar kami. Hubungi tim agar kami cek kemungkinan layanan ke sana.';
        res.textContent = ''; res.appendChild(document.createTextNode(text));
        var a = document.createElement('a'); a.className = 'rr-btn rr-btn--wa rr-btn--sm'; a.target = '_blank'; a.rel = 'noopener';
        a.href = waUrl('Halo RenovatePro, saya ingin memastikan layanan tersedia di ' + kota + ' (' + (wil === 'Lainnya' ? 'wilayah lain' : wil) + ').'); a.textContent = 'Konfirmasi via WhatsApp';
        res.appendChild(document.createElement('br')); res.appendChild(a);
      }
    });
  });

  /* ---------- dialog syarat & privasi ---------- */
  var modal = $('#rr-modal'), modalOpener = null;
  function openModal(key, opener) {
    var info = (DATA.legal || {})[key]; if (!modal || !info) { return; }
    modalOpener = opener || null;
    $('#rr-modal-t').textContent = info.title;
    var body = $('#rr-modal-body'); body.innerHTML = '';
    info.body.forEach(function (t) { var p = document.createElement('p'); p.textContent = t; body.appendChild(p); });
    modal.hidden = false; document.body.style.overflow = 'hidden'; $('.rr-modal__x', modal).focus();
  }
  function closeModal() { if (!modal || modal.hidden) { return; } modal.hidden = true; document.body.style.overflow = ''; if (modalOpener) { modalOpener.focus(); } }
  $$('[data-rr-legal]').forEach(function (b) { b.addEventListener('click', function () { openModal(b.getAttribute('data-rr-legal'), b); }); });
  if (modal) { modal.addEventListener('click', function (e) { if (e.target === modal || e.target.closest('[data-rr-modal-close]')) { closeModal(); } }); }

  /* ---------- AI chatbot (FAQ layanan & estimasi) ---------- */
  var chat = $('#rr-chat'), log = $('#rr-chat-log'), quick = $('#rr-chat-quick'), form = $('#rr-chat-form'), cInput = $('#rr-chat-input'), floatBox = $('#rr-float'), hint = $('#rr-hint'), opener = null;
  var flow = null, CH = DATA.chat || {};
  function scrollLog() { log.scrollTop = log.scrollHeight; }
  function bubble(role, text, links) {
    var m = document.createElement('div'); m.className = 'rr-msg rr-msg--' + role;
    String(text).split('\n').forEach(function (line, i) { if (i) { m.appendChild(document.createElement('br')); } m.appendChild(document.createTextNode(line)); });
    (links || []).forEach(function (l) { var a = document.createElement('a'); a.className = 'rr-btn rr-btn--' + (l.wa ? 'wa' : 'dark') + ' rr-btn--sm'; a.href = l.href; if (l.wa) { a.target = '_blank'; a.rel = 'noopener'; } a.textContent = l.label; m.appendChild(document.createElement('br')); m.appendChild(a); });
    log.appendChild(m); scrollLog(); return m;
  }
  function bot(text, links, chips) {
    var t = document.createElement('div'); t.className = 'rr-msg rr-msg--bot'; t.innerHTML = '<span class="rr-typing"><i></i><i></i><i></i></span>'; log.appendChild(t); scrollLog();
    setTimeout(function () { t.remove(); bubble('bot', text, links); setQuick(chips || defaultChips()); }, reduced ? 0 : 520 + Math.min(String(text).length * 4, 700));
  }
  function setQuick(list) {
    quick.innerHTML = '';
    list.forEach(function (c) { var b = document.createElement('button'); b.type = 'button'; b.textContent = c; b.addEventListener('click', function () { handle(c); }); quick.appendChild(b); });
  }
  function defaultChips() { return CH.quick || []; }
  function normalize(s) { return String(s).toLowerCase().replace(/[^a-z0-9\u00c0-\u024f\s]/g, ' ').replace(/\s+/g, ' ').trim(); }
  function has(s, words) { return words.some(function (w) { return s.indexOf(w) > -1; }); }
  function priceAnswer() {
    var rows = (DATA.packages || []).map(function (p) { return '• ' + p.name + ': mulai dari ' + p.label; });
    bot('Harga paket kami (' + (DATA.unit || '') + '):\n' + rows.join('\n') + '\n\nHarga final ditentukan setelah survei lokasi.', [{ label: 'Lihat Paket Layanan', href: url('paket-layanan') }]);
  }
  function startEstimate() {
    flow = { step: 'pkg' };
    bot('Mari hitung estimasi awal. Paket mana yang Anda minati?', null, (DATA.packages || []).map(function (p) { return p.name; }).concat(['Batal']));
  }
  function pickPackage(s) { return (DATA.packages || []).filter(function (p) { return s.indexOf(p.id) > -1 || s.indexOf(normalize(p.name)) > -1; })[0]; }
  function handleFlow(raw, s) {
    if (has(s, ['batal', 'cancel', 'tidak jadi'])) { flow = null; bot('Baik, perhitungan dibatalkan. Ada hal lain yang ingin ditanyakan?'); return true; }
    if (flow.step === 'pkg') {
      var p = pickPackage(s);
      if (!p) { bot('Pilih salah satu paket: Basic, Premium, atau Exclusive.', null, (DATA.packages || []).map(function (x) { return x.name; }).concat(['Batal'])); return true; }
      flow = { step: 'area', pkg: p };
      bot('Oke, ' + p.name + '. Berapa perkiraan luas area yang akan dikerjakan (dalam m²)? Ketik angkanya saja, misalnya 40.', null, ['Batal']); return true;
    }
    if (flow.step === 'area') {
      var n = parseFloat(String(raw).replace(',', '.').replace(/[^0-9.]/g, ''));
      if (!isFinite(n) || n < 1 || n > 10000) { bot('Mohon ketik luas area dalam angka antara 1 – 10.000 m², misalnya 40.', null, ['Batal']); return true; }
      var low = flow.pkg.price * n, high = low * 1.3, name = flow.pkg.name; flow = null;
      bot('Estimasi awal ' + name + ' untuk ' + n + ' m²:\n' + rupiah(low) + ' – ' + rupiah(high) + '\n\nIni perkiraan kasar berdasarkan harga paket (' + (DATA.unit || '') + '). Biaya final menyesuaikan kondisi bangunan dan material setelah survei lokasi.',
        [{ label: 'Minta Penawaran', href: url('permintaan-penawaran') }, { label: 'Booking Survei', href: url('booking-survei') }]);
      return true;
    }
    return false;
  }
  function answer(raw) {
    var s = normalize(raw);
    if (flow && handleFlow(raw, s)) { return; }
    if (has(s, ['estimasi', 'hitung', 'kalkulasi', 'perkiraan', 'budget', 'anggaran'])) { startEstimate(); return; }
    if (has(s, ['harga', 'biaya', 'tarif', 'price']) || (has(s, ['berapa']) && !has(s, ['lama', 'hari', 'minggu', 'bulan', 'waktu']))) { priceAnswer(); return; }
    var best = null, score = 0;
    (DATA.faq || []).forEach(function (f) { var sc = 0; f.k.forEach(function (k) { if (s.indexOf(k) > -1) { sc += k.length; } }); if (sc > score) { score = sc; best = f; } });
    if (best) { bot(best.a, best.go ? [{ label: best.go_label || 'Buka halaman', href: url(best.go) }] : null); return; }
    bot(CH.fallback || 'Maaf, saya belum menemukan jawabannya.', [{ label: 'Lanjut via WhatsApp', href: waUrl(), wa: true }]);
  }
  function handle(raw) {
    raw = String(raw).trim(); if (!raw) { return; }
    bubble('me', raw); quick.innerHTML = ''; answer(raw);
  }
  function openChat(from) {
    if (!chat) { return; }
    opener = from || document.activeElement; chat.hidden = false; if (floatBox) { floatBox.classList.add('is-hidden'); } if (hint) { hint.hidden = true; }
    if (!log.children.length) { bubble('bot', CH.hello || 'Halo!'); setQuick(defaultChips()); }
    store.set('rr-hint', '1'); setTimeout(function () { cInput.focus(); }, 60);
  }
  function closeChat() { if (!chat || chat.hidden) { return; } chat.hidden = true; if (floatBox) { floatBox.classList.remove('is-hidden'); } var o = $('.rr-aibtn'); if (o && o.offsetParent) { o.focus(); } else if (opener && opener.focus) { opener.focus(); } }
  $$('[data-rr-chat-open]').forEach(function (b) { b.addEventListener('click', function (e) { e.preventDefault(); setMenu(false); openChat(b); }); });
  $$('[data-rr-chat-close]').forEach(function (b) { b.addEventListener('click', closeChat); });
  if (form) { form.addEventListener('submit', function (e) { e.preventDefault(); var v = cInput.value; cInput.value = ''; handle(v); }); }
  if (hint && !store.get('rr-hint') && !reduced) {
    setTimeout(function () { if (chat && chat.hidden) { hint.hidden = false; setTimeout(function () { hint.hidden = true; }, 7000); store.set('rr-hint', '1'); } }, 7000);
  }

  /* ---------- tombol keyboard global ---------- */
  document.addEventListener('keydown', function (e) {
    if (e.key !== 'Escape') { return; }
    if (modal && !modal.hidden) { closeModal(); return; }
    if (chat && !chat.hidden) { closeChat(); return; }
    if (sBox && !sBox.hidden) { closeSearch(); if (sBtn) { sBtn.focus(); } return; }
    if (menu && menu.classList.contains('is-open')) { setMenu(false); if (burger) { burger.focus(); } return; }
    closeSubs();
  });
})();
