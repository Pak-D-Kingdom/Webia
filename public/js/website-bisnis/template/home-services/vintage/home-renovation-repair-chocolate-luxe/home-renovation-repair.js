/* ==========================================================================
   RenovatePro — Home Services · Vintage · Chocolate Luxe
   File : home-renovation-repair.js  (vanilla JS, tanpa dependensi)
   Data : dibaca dari <script type="application/json" id="rr-data"> pada view
   ========================================================================== */
(function () {
  'use strict';
  var root = document.documentElement;
  root.classList.add('rr-ready');

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
  var NS = 'http://www.w3.org/2000/svg';
  function el(tag, cls, text) { var e = document.createElement(tag); if (cls) { e.className = cls; } if (text != null) { e.textContent = text; } return e; }
  function icon(id, cls) { var s = document.createElementNS(NS, 'svg'), u = document.createElementNS(NS, 'use'); s.setAttribute('class', 'rr-i' + (cls ? ' ' + cls : '')); s.setAttribute('aria-hidden', 'true'); u.setAttribute('href', '#' + id); s.appendChild(u); return s; }
  function raf(fn) { var t = false; return function () { if (t) { return; } t = true; window.requestAnimationFrame(function () { t = false; fn(); }); }; }
  function tween(from, to, ms, cb) {
    if (reduced || ms <= 0) { cb(to); return; }
    var t0 = null; (function step(ts) { if (t0 === null) { t0 = ts; } var p = Math.min((ts - t0) / ms, 1), e = 1 - Math.pow(1 - p, 3); cb(from + (to - from) * e); if (p < 1) { window.requestAnimationFrame(step); } })(performance.now());
  }

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

  /* ---------- navbar: drawer mobile, pencarian, progres scroll ---------- */
  var menu = $('#rr-menu'), burger = $('.rr-burger'), scrim = $('.rr-scrim'), header = $('#rr-header');
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
  $$('.rr-menu a').forEach(function (a) { a.addEventListener('click', function () { setMenu(false); }); });
  window.addEventListener('resize', function () { if (window.innerWidth >= 1280) { setMenu(false); } });

  var bar = null;
  if (header) { bar = el('i', 'rr-scroll'); bar.setAttribute('aria-hidden', 'true'); header.appendChild(bar); }
  var onScroll = raf(function () {
    var h = document.documentElement.scrollHeight - window.innerHeight;
    if (bar) { bar.style.setProperty('--p', (h > 0 ? Math.min(window.scrollY / h, 1) * 100 : 0) + '%'); }
    flowUpdate();
  });
  window.addEventListener('scroll', onScroll, { passive: true });
  window.addEventListener('resize', onScroll);

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
  reveal.forEach(function (e) { var i = Array.prototype.indexOf.call(e.parentNode.children, e); e.style.setProperty('--d', (i % 4) * 0.09 + 's'); });
  if ('IntersectionObserver' in window && !reduced) {
    var io = new IntersectionObserver(function (es) { es.forEach(function (en) { if (en.isIntersecting) { en.target.classList.add('is-in'); io.unobserve(en.target); } }); }, { threshold: 0.12, rootMargin: '0px 0px -4% 0px' });
    reveal.forEach(function (e) { io.observe(e); });
  } else { reveal.forEach(function (e) { e.classList.add('is-in'); }); }

  /* ---------- hitung naik (harga paket) ---------- */
  $$('[data-rr-count]').forEach(function (e) {
    var target = parseFloat(e.getAttribute('data-rr-count')) || 0;
    if (!('IntersectionObserver' in window) || reduced || !target) { return; }
    var o = new IntersectionObserver(function (es) { if (!es[0].isIntersecting) { return; } o.disconnect(); tween(0, target, 1300, function (v) { e.textContent = rupiah(v); }); }, { threshold: 0.6 });
    o.observe(e);
  });

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

  /* ---------- alur proses kerja (garis progres + langkah aktif) ---------- */
  var flow = $('[data-rr-flow]'), steps = $$('[data-rr-step]'), fill = $('[data-rr-flow-fill]');
  function flowUpdate() {
    if (!flow || !fill) { return; }
    var r = flow.getBoundingClientRect(), mid = window.innerHeight * 0.55;
    var p = Math.max(0, Math.min((mid - r.top) / Math.max(r.height, 1), 1));
    flow.style.setProperty('--fill', (p * 100) + '%');
    steps.forEach(function (s) { var n = $('.rr-step__node', s).getBoundingClientRect(); s.classList.toggle('is-on', n.top + n.height / 2 < mid); });
  }
  if (steps.length) {
    if ('IntersectionObserver' in window && !reduced) {
      var so = new IntersectionObserver(function (es) { es.forEach(function (en) { if (en.isIntersecting) { en.target.classList.add('is-in'); so.unobserve(en.target); } }); }, { threshold: 0.15 });
      steps.forEach(function (s) { so.observe(s); });
    } else { steps.forEach(function (s) { s.classList.add('is-in'); }); }
    flowUpdate();
  }

  /* ---------- kalkulator estimasi (halaman paket) ---------- */
  $$('[data-rr-calc]').forEach(function (box) {
    var range = $('input[type="range"]', box), area = $('[data-rr-calc-area]', box), lo = $('[data-rr-calc-low]', box), hi = $('[data-rr-calc-high]', box), cta = $('[data-rr-calc-cta]', box);
    var cur = { lo: 0, hi: 0 };
    function pkg() { var r = $('input[name="calc-paket"]:checked', box); return r ? { id: r.value, price: parseFloat(r.getAttribute('data-price')) || 0 } : null; }
    function update(anim) {
      var p = pkg(), n = parseFloat(range.value) || 0; if (!p) { return; }
      var min = parseFloat(range.min) || 0, max = parseFloat(range.max) || 100;
      range.style.setProperty('--fill', ((n - min) / (max - min) * 100) + '%');
      area.textContent = n + ' m²';
      var L = p.price * n, H = L * 1.3;
      if (anim) { tween(cur.lo, L, 450, function (v) { lo.textContent = rupiah(v); }); tween(cur.hi, H, 450, function (v) { hi.textContent = rupiah(v); }); }
      else { lo.textContent = rupiah(L); hi.textContent = rupiah(H); }
      cur.lo = L; cur.hi = H;
      cta.href = url('permintaan-penawaran') + '?paket=' + encodeURIComponent(p.id) + '&luas=' + n;
    }
    range.addEventListener('input', function () { update(false); });
    $$('input[name="calc-paket"]', box).forEach(function (r) { r.addEventListener('change', function () { update(true); }); });
    update(false);
  });

  /* ---------- dropdown kustom (menggantikan <select> bawaan) ---------- */
  var openers = [];
  function closePickers(except) { openers.forEach(function (o) { if (o.node !== except) { o.close(); } }); }
  function flip(node, popH) { var r = node.getBoundingClientRect(); node.classList.toggle('is-up', window.innerHeight - r.bottom < popH && r.top > popH); }

  function enhanceSelect(sel) {
    var wrap = sel.closest('.rr-select'); if (!wrap || wrap.classList.contains('is-enh')) { return; }
    var lab = sel.id ? $('label[for="' + sel.id + '"]') : null;
    var dd = el('div', 'rr-dd'), btn = el('button', 'rr-dd__btn'), val = el('span', 'rr-dd__val'), list = el('ul', 'rr-dd__list');
    btn.type = 'button'; btn.setAttribute('aria-haspopup', 'listbox'); btn.setAttribute('aria-expanded', 'false');
    if (lab) { btn.setAttribute('aria-label', lab.textContent.trim()); }
    list.setAttribute('role', 'listbox'); list.tabIndex = -1;
    if (sel.getAttribute('data-icon')) { btn.appendChild(icon('i-' + sel.getAttribute('data-icon'))); }
    btn.appendChild(val); btn.appendChild(icon('i-chev', 'rr-dd__chev'));
    var opts = [], active = -1, ph = sel.getAttribute('data-placeholder') || 'Pilih';
    $$('option', sel).forEach(function (o, i) {
      if (!o.value) { return; }
      var li = el('li', 'rr-dd__opt'); li.setAttribute('role', 'option'); li.id = (sel.id || 'dd') + '-o' + i; li.setAttribute('data-value', o.value);
      li.appendChild(el('span', '', o.textContent)); li.appendChild(icon('i-check')); list.appendChild(li); opts.push(li);
      li.addEventListener('click', function () { choose(li); });
      li.addEventListener('mousemove', function () { setActive(opts.indexOf(li)); });
    });
    function sync() {
      var cur = null; opts.forEach(function (li) { var on = li.getAttribute('data-value') === sel.value; li.setAttribute('aria-selected', String(on)); if (on) { cur = li; } });
      val.textContent = cur ? cur.firstChild.textContent : ph; val.classList.toggle('is-ph', !cur);
    }
    function setActive(i) { active = Math.max(0, Math.min(i, opts.length - 1)); opts.forEach(function (li, k) { li.classList.toggle('is-active', k === active); }); if (opts[active]) { btn.setAttribute('aria-activedescendant', opts[active].id); opts[active].scrollIntoView({ block: 'nearest' }); } }
    function open() { closePickers(dd); dd.classList.add('is-open'); btn.setAttribute('aria-expanded', 'true'); flip(dd, 270); var i = opts.map(function (o) { return o.getAttribute('data-value'); }).indexOf(sel.value); setActive(i < 0 ? 0 : i); }
    function close() { dd.classList.remove('is-open'); btn.setAttribute('aria-expanded', 'false'); btn.removeAttribute('aria-activedescendant'); }
    function choose(li) { sel.value = li.getAttribute('data-value'); sel.dispatchEvent(new Event('change', { bubbles: true })); sync(); close(); btn.focus(); }
    btn.addEventListener('click', function () { if (dd.classList.contains('is-open')) { close(); } else { open(); } });
    btn.addEventListener('keydown', function (e) {
      var isOpen = dd.classList.contains('is-open');
      if (e.key === 'ArrowDown' || e.key === 'ArrowUp') { e.preventDefault(); if (!isOpen) { open(); } else { setActive(active + (e.key === 'ArrowDown' ? 1 : -1)); } }
      else if (e.key === 'Home' && isOpen) { e.preventDefault(); setActive(0); }
      else if (e.key === 'End' && isOpen) { e.preventDefault(); setActive(opts.length - 1); }
      else if ((e.key === 'Enter' || e.key === ' ') && isOpen) { e.preventDefault(); if (opts[active]) { choose(opts[active]); } }
      else if (e.key === 'Escape' && isOpen) { e.stopPropagation(); close(); }
      else if (e.key === 'Tab') { close(); }
      else if (e.key.length === 1 && /\S/.test(e.key)) { var k = e.key.toLowerCase(); for (var j = 1; j <= opts.length; j++) { var n = (active + j) % opts.length; if (opts[n].textContent.toLowerCase().indexOf(k) === 0) { if (!isOpen) { open(); } setActive(n); break; } } }
    });
    dd.appendChild(btn); dd.appendChild(list); wrap.appendChild(dd); wrap.classList.add('is-enh');
    sel.tabIndex = -1; sel.addEventListener('change', sync);
    var f = sel.form; if (f) { f.addEventListener('reset', function () { setTimeout(sync, 0); }); }
    openers.push({ node: dd, close: close, sync: sync }); sync();
  }
  $$('.rr-select select').forEach(enhanceSelect);

  /* ---------- kalender kustom (menggantikan input tanggal bawaan) ---------- */
  var MONTHS = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
  var DOW = ['Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab', 'Min'];
  function iso(d) { return d.getFullYear() + '-' + String(d.getMonth() + 1).padStart(2, '0') + '-' + String(d.getDate()).padStart(2, '0'); }
  function parseIso(s) { var m = /^(\d{4})-(\d{2})-(\d{2})$/.exec(s || ''); return m ? new Date(+m[1], +m[2] - 1, +m[3]) : null; }
  function today() { var n = new Date(); return new Date(n.getFullYear(), n.getMonth(), n.getDate()); }
  function fmtLong(d) { try { return d.toLocaleDateString('id-ID', { weekday: 'long', day: 'numeric', month: 'long', year: 'numeric' }); } catch (e) { return iso(d); } }

  function enhanceDate(wrap) {
    var input = $('input[type="date"]', wrap); if (!input || wrap.classList.contains('is-enh')) { return; }
    var t = today(), min = parseIso(input.min) || t, max = parseIso(input.max) || new Date(t.getFullYear() + 1, t.getMonth(), t.getDate());
    var sel = parseIso(input.value), view = new Date((sel || min).getFullYear(), (sel || min).getMonth(), 1);
    var lab = input.id ? $('label[for="' + input.id + '"]') : null;
    var btn = el('button', 'rr-dd__btn'), val = el('span', 'rr-dd__val is-ph', 'Pilih tanggal'), pop = el('div', 'rr-cal');
    btn.type = 'button'; btn.setAttribute('aria-haspopup', 'dialog'); btn.setAttribute('aria-expanded', 'false'); if (lab) { btn.setAttribute('aria-label', lab.textContent.trim()); }
    btn.appendChild(icon('i-calendar')); btn.appendChild(val); btn.appendChild(icon('i-chev', 'rr-dd__chev'));
    pop.setAttribute('role', 'dialog'); pop.setAttribute('aria-label', 'Pilih tanggal');
    wrap.appendChild(btn); wrap.appendChild(pop); wrap.classList.add('is-enh');
    function isOpen() { return wrap.classList.contains('is-open'); }
    function open() { closePickers(wrap); wrap.classList.add('is-open'); btn.setAttribute('aria-expanded', 'true'); flip(wrap, 380); render(); var f = $('.rr-cal__day.is-sel, .rr-cal__day.is-today, .rr-cal__day:not(:disabled)', pop); if (f) { f.focus({ preventScroll: true }); } }
    function close() { wrap.classList.remove('is-open'); btn.setAttribute('aria-expanded', 'false'); }
    function sync() { sel = parseIso(input.value); val.textContent = sel ? fmtLong(sel) : 'Pilih tanggal'; val.classList.toggle('is-ph', !sel); }
    function pick(d) { input.value = iso(d); input.dispatchEvent(new Event('change', { bubbles: true })); sync(); close(); btn.focus(); }
    function render() {
      pop.innerHTML = '';
      var head = el('div', 'rr-cal__head'), prev = el('button', 'rr-cal__nav'), next = el('button', 'rr-cal__nav');
      prev.type = next.type = 'button'; prev.setAttribute('aria-label', 'Bulan sebelumnya'); next.setAttribute('aria-label', 'Bulan berikutnya');
      prev.appendChild(icon('i-chevl')); next.appendChild(icon('i-chevr'));
      prev.disabled = view <= new Date(min.getFullYear(), min.getMonth(), 1); next.disabled = view >= new Date(max.getFullYear(), max.getMonth(), 1);
      prev.addEventListener('click', function () { view = new Date(view.getFullYear(), view.getMonth() - 1, 1); render(); });
      next.addEventListener('click', function () { view = new Date(view.getFullYear(), view.getMonth() + 1, 1); render(); });
      head.appendChild(prev); head.appendChild(el('strong', '', MONTHS[view.getMonth()] + ' ' + view.getFullYear())); head.appendChild(next); pop.appendChild(head);
      var dow = el('div', 'rr-cal__dow'); DOW.forEach(function (d) { dow.appendChild(el('span', '', d)); }); pop.appendChild(dow);
      var grid = el('div', 'rr-cal__grid'), lead = (view.getDay() + 6) % 7, days = new Date(view.getFullYear(), view.getMonth() + 1, 0).getDate();
      for (var i = 0; i < lead; i++) { grid.appendChild(el('span')); }
      for (var d = 1; d <= days; d++) {
        (function (d) {
          var dt = new Date(view.getFullYear(), view.getMonth(), d), b = el('button', 'rr-cal__day', String(d)); b.type = 'button';
          b.setAttribute('aria-label', fmtLong(dt)); b.disabled = dt < min || dt > max;
          if (+dt === +t) { b.classList.add('is-today'); } if (sel && +dt === +sel) { b.classList.add('is-sel'); b.setAttribute('aria-pressed', 'true'); }
          b.addEventListener('click', function () { pick(dt); }); grid.appendChild(b);
        })(d);
      }
      pop.appendChild(grid);
      var foot = el('div', 'rr-cal__foot'), now = el('button', '', 'Hari ini'), x = el('button', '', 'Tutup'); now.type = x.type = 'button';
      now.disabled = t < min || t > max;
      now.addEventListener('click', function () { pick(t); }); x.addEventListener('click', function () { close(); btn.focus(); });
      foot.appendChild(now); foot.appendChild(x); pop.appendChild(foot);
    }
    btn.addEventListener('click', function () { if (isOpen()) { close(); } else { open(); } });
    btn.addEventListener('keydown', function (e) { if (e.key === 'ArrowDown' && !isOpen()) { e.preventDefault(); open(); } });
    pop.addEventListener('keydown', function (e) {
      if (e.key === 'Escape') { e.stopPropagation(); close(); btn.focus(); return; }
      var days = $$('.rr-cal__day:not(:disabled)', pop), i = days.indexOf(document.activeElement), step = { ArrowRight: 1, ArrowLeft: -1, ArrowDown: 7, ArrowUp: -7 }[e.key];
      if (step && i > -1) { e.preventDefault(); var n = days[Math.max(0, Math.min(i + step, days.length - 1))]; if (n) { n.focus(); } }
    });
    input.addEventListener('change', sync); var f = input.form; if (f) { f.addEventListener('reset', function () { setTimeout(sync, 0); }); }
    openers.push({ node: wrap, close: close, sync: sync }); sync();
  }
  $$('[data-rr-date]').forEach(enhanceDate);
  document.addEventListener('click', function (e) { if (!e.target.closest('.rr-dd') && !e.target.closest('[data-rr-date]')) { closePickers(); } });

  /* ---------- formulir → WhatsApp ---------- */
  var params = new URLSearchParams(window.location.search);
  function setRadio(form, name, v) { var r = form.querySelector('input[name="' + name + '"][value="' + v + '"]'); if (r) { r.checked = true; r.dispatchEvent(new Event('change', { bubbles: true })); } }
  function field(form, name) { return form.elements[name]; }
  function val(form, name) { var f = field(form, name); if (!f) { return ''; } if (f.length && !f.tagName) { var c = $('input[name="' + name + '"]:checked', form); return c ? c.value : ''; } return f.value ? String(f.value).trim() : ''; }
  function labelOf(form, name) {
    var r = $('input[name="' + name + '"]:checked', form); if (r) { return r.getAttribute('data-label') || ''; }
    var f = field(form, name); return f && f.selectedIndex > -1 && f.value ? f.options[f.selectedIndex].text : '';
  }
  function setErr(wrap, msg) {
    if (!wrap) { return; }
    wrap.classList.toggle('is-err', !!msg);
    var e = $('.rr-field__err', wrap);
    if (msg) { if (!e) { e = el('span', 'rr-field__err'); wrap.appendChild(e); } e.textContent = msg; } else if (e) { e.remove(); }
  }
  function focusTarget(f) { var w = f.closest('.rr-select, [data-rr-date]'); var b = w && $('.rr-dd__btn', w); return b || f; }
  var EMAIL = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  function validate(form) {
    var ok = true, first = null, seen = {};
    $$('input[required], select[required], textarea[required]', form).forEach(function (f) {
      var wrap = f.closest('.rr-field'), msg = '';
      if (f.type === 'radio') {
        if (seen[f.name]) { return; } seen[f.name] = 1;
        var any = $$('input[name="' + f.name + '"]', form).some(function (r) { return r.checked; });
        setErr(wrap, any ? '' : 'Pilih salah satu.'); if (!any) { ok = false; first = first || f; } return;
      }
      var v = f.value.trim();
      if (!v) { msg = f.tagName === 'SELECT' || f.type === 'date' ? 'Silakan pilih.' : 'Wajib diisi.'; }
      else if (f.type === 'tel' && v.replace(/\D/g, '').length < 9) { msg = 'Nomor tidak valid.'; }
      else if (f.type === 'email' && !EMAIL.test(v)) { msg = 'Email tidak valid.'; }
      setErr(wrap, msg); if (msg) { ok = false; first = first || f; }
    });
    var em = field(form, 'email');
    if (em && em.type === 'email' && !em.required && em.value.trim() && !EMAIL.test(em.value.trim())) { setErr(em.closest('.rr-field'), 'Email tidak valid.'); ok = false; first = first || em; }
    if (first) { var t = focusTarget(first); t.focus({ preventScroll: true }); t.scrollIntoView({ block: 'center', behavior: reduced ? 'auto' : 'smooth' }); }
    return ok;
  }
  function msgEl(form) { return $('.rr-form__msg', form) || $('.rr-form__msg', form.parentNode); }
  function say(form, text, kind) { var m = msgEl(form); if (m) { m.textContent = text; m.className = 'rr-form__msg ' + (kind ? 'is-' + kind : ''); } }

  /* susunan pesan WhatsApp (dipakai untuk kirim & pratinjau) */
  function compose(type, form, preview) {
    var g = function (n) { var x = val(form, n); return x || (preview ? '…' : ''); };
    var L = [];
    if (type === 'quote') {
      L.push('*Permintaan Penawaran — RenovatePro*', 'Nama: ' + g('nama'), 'WhatsApp: ' + g('whatsapp'));
      if (val(form, 'email')) { L.push('Email: ' + val(form, 'email')); }
      L.push('Layanan: ' + (labelOf(form, 'layanan') || (preview ? '…' : '')));
      if (labelOf(form, 'paket')) { L.push('Paket: ' + labelOf(form, 'paket')); }
      L.push('Lokasi proyek: ' + g('lokasi'));
      if (val(form, 'luas')) { L.push('Perkiraan luas: ' + val(form, 'luas') + ' m²'); }
      if (val(form, 'catatan')) { L.push('Kebutuhan: ' + val(form, 'catatan')); }
    } else if (type === 'survey') {
      var d = parseIso(val(form, 'tanggal'));
      L.push('*Booking Survei Lokasi — RenovatePro*', 'Nama: ' + g('nama'), 'WhatsApp: ' + g('whatsapp'), 'Alamat: ' + g('alamat'),
        'Wilayah: ' + (labelOf(form, 'wilayah') || (preview ? '…' : '')), 'Layanan: ' + (labelOf(form, 'layanan') || (preview ? '…' : '')),
        'Tanggal: ' + (d ? fmtLong(d) : (preview ? '…' : '')), 'Jam: ' + (labelOf(form, 'waktu') || (preview ? '…' : '')));
      if (val(form, 'catatan')) { L.push('Catatan: ' + val(form, 'catatan')); }
    }
    return L.join('\n');
  }
  function renderPreview(box, type, form) {
    box.innerHTML = '';
    compose(type, form, true).split('\n').forEach(function (line, i) {
      if (i) { box.appendChild(document.createTextNode('\n')); }
      var parts = line.split('*');
      if (parts.length === 3) { box.appendChild(el('b', '', parts[1])); return; }
      var empty = /…$/.test(line);
      if (empty) { var k = line.indexOf(':'); box.appendChild(document.createTextNode(line.slice(0, k + 1) + ' ')); box.appendChild(el('span', 'is-empty', '…')); }
      else { box.appendChild(document.createTextNode(line)); }
    });
  }
  function updateProgress(form) {
    var card = form.closest('.rr-fc'), prog = card && $('[data-rr-progress]', card); var seen = {}, total = 0, done = 0;
    $$('input[required], select[required], textarea[required]', form).forEach(function (f) {
      if (f.type === 'radio') { if (seen[f.name]) { return; } seen[f.name] = 1; total++; if ($$('input[name="' + f.name + '"]', form).some(function (r) { return r.checked; })) { done++; } return; }
      total++; if (f.value.trim()) { done++; }
    });
    var pct = total ? Math.round(done / total * 100) : 0;
    if (prog) { prog.style.setProperty('--p', pct + '%'); $('span', prog).textContent = pct + '%'; }
    $$('.rr-fs', form).forEach(function (fs) {
      var req = $$('input[required], select[required], textarea[required]', fs), s2 = {}, ok = req.length > 0;
      req.forEach(function (f) { if (f.type === 'radio') { if (s2[f.name]) { return; } s2[f.name] = 1; if (!$$('input[name="' + f.name + '"]', form).some(function (r) { return r.checked; })) { ok = false; } } else if (!f.value.trim()) { ok = false; } });
      fs.classList.toggle('is-done', ok);
    });
  }

  $$('[data-rr-form]').forEach(function (form) {
    var type = form.getAttribute('data-rr-form'), card = form.closest('.rr-fc'), pv = card && card.parentNode ? $('[data-rr-preview="' + type + '"]', card.parentNode) : null;
    function refresh() { if (pv) { renderPreview(pv, type, form); } updateProgress(form); $$('[data-rr-count-for]', form).forEach(function (c) { var t = $('#' + c.getAttribute('data-rr-count-for'), form); if (t) { c.textContent = t.value.length + '/' + (t.maxLength > 0 ? t.maxLength : 500); } }); }
    var onChange = function (e) { var w = e.target.closest && e.target.closest('.rr-field'); if (w) { setErr(w, ''); } var m = msgEl(form); if (m && m.classList.contains('is-err')) { say(form, '', ''); } refresh(); };
    form.addEventListener('input', onChange); form.addEventListener('change', onChange);
    form.addEventListener('reset', function () { setTimeout(refresh, 0); });
    if (type === 'quote') {
      [['paket', 'paket'], ['layanan', 'layanan']].forEach(function (p) { var v = params.get(p[0]); if (v) { setRadio(form, p[1], v.replace(/[^a-z0-9-]/gi, '')); } });
      var lu = params.get('luas'); if (lu && field(form, 'luas') && /^\d{1,5}$/.test(lu)) { field(form, 'luas').value = lu; }
    }
    var dateEl = field(form, 'tanggal'); if (dateEl && dateEl.type === 'date') { dateEl.min = iso(today()); }
    refresh();
    form.addEventListener('submit', function (e) {
      e.preventDefault();
      if (!validate(form)) { say(form, 'Mohon lengkapi data yang ditandai.', 'err'); return; }
      if (type === 'quote' || type === 'survey') {
        var text = compose(type, form, false); openWA(text); say(form, '', '');
        toast(type === 'quote' ? 'Pesan siap dikirim lewat WhatsApp.' : 'Permintaan survei siap dikirim.');
        var done = card && $('.rr-done', card);
        if (done) { var a = $('[data-rr-wa]', done); if (a) { a.href = waUrl(text); } form.hidden = true; var pg = $('[data-rr-progress]', card); if (pg) { pg.hidden = true; } done.hidden = false; done.scrollIntoView({ block: 'center', behavior: reduced ? 'auto' : 'smooth' }); var again = $('[data-rr-again]', done); if (again) { again.onclick = function () { done.hidden = true; form.hidden = false; if (pg) { pg.hidden = false; } form.reset(); setTimeout(refresh, 0); form.scrollIntoView({ block: 'start', behavior: reduced ? 'auto' : 'smooth' }); }; } }
      } else if (type === 'newsletter') {
        openWA('Halo RenovatePro, saya ingin berlangganan newsletter. Email saya: ' + val(form, 'email')); say(form, 'Terima kasih! Lanjutkan di WhatsApp.', 'ok'); form.reset();
      } else if (type === 'area') {
        var wil = val(form, 'wilayah'), kota = val(form, 'kota'), res = $('.rr-check__res', form), hit = (DATA.areas || []).filter(function (a) { return a.name === wil; })[0];
        var msg = hit ? 'Wilayah ' + hit.name + ' termasuk area layanan kami (' + hit.cities + '). Tim kami akan memastikan ketersediaan untuk ' + kota + '.' : 'Wilayah ' + kota + ' belum tercantum di daftar kami. Hubungi tim agar kami cek kemungkinan layanan ke sana.';
        res.textContent = ''; res.appendChild(document.createTextNode(msg));
        var b = document.createElement('a'); b.className = 'rr-btn rr-btn--wa rr-btn--sm'; b.target = '_blank'; b.rel = 'noopener';
        b.href = waUrl('Halo RenovatePro, saya ingin memastikan layanan tersedia di ' + kota + ' (' + (wil === 'Lainnya' ? 'wilayah lain' : wil) + ').'); b.textContent = 'Konfirmasi via WhatsApp';
        res.appendChild(document.createElement('br')); res.appendChild(b);
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
    if (openers.some(function (o) { return o.node.classList.contains('is-open'); })) { closePickers(); return; }
    if (modal && !modal.hidden) { closeModal(); return; }
    if (chat && !chat.hidden) { closeChat(); return; }
    if (sBox && !sBox.hidden) { closeSearch(); if (sBtn) { sBtn.focus(); } return; }
    if (menu && menu.classList.contains('is-open')) { setMenu(false); if (burger) { burger.focus(); } }
  });
})();
