/* ==========================================================================
   ArchiDesign — Architecture & Building Design  ·  Rustic · Chocolate Luxe
   WEBIA by D-KREASI · Vanilla JS (tanpa dependensi)
   Modul: util · header · menu · palet pencarian · reveal & motion · hero
          filter · lightbox · tab denah · dialog · form (dropdown, pilihan,
          validasi, pratinjau, WhatsApp) · chatbot FAQ
   ========================================================================== */
(function () {
  'use strict';
  window.__abdReady = true;

  var $  = function (s, c) { return (c || document).querySelector(s); };
  var $$ = function (s, c) { return Array.prototype.slice.call((c || document).querySelectorAll(s)); };
  var reduce = window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches;
  var DATA = {};
  try { DATA = JSON.parse(($('#abd-data') || {}).textContent || '{}'); } catch (e) { DATA = {}; }
  DATA.faq = DATA.faq || []; DATA.quick = DATA.quick || []; DATA.search = DATA.search || []; DATA.popular = DATA.popular || [];

  /* ---------- util ---------- */
  var toastTimer;
  function toast(msg) {
    var t = $('#abd-toast'); if (!t) return;
    t.textContent = msg; t.classList.add('is-on');
    clearTimeout(toastTimer); toastTimer = setTimeout(function () { t.classList.remove('is-on'); }, 4200);
  }
  function norm(s) {
    return String(s || '').toLowerCase().normalize('NFD').replace(/[\u0300-\u036f]/g, '').replace(/[^a-z0-9\s]/g, ' ').replace(/\s+/g, ' ').trim();
  }
  function esc(s) { return String(s).replace(/[&<>"']/g, function (c) { return { '&': '&amp;', '<': '&lt;', '>': '&gt;', '"': '&quot;', "'": '&#39;' }[c]; }); }
  function icon(name, cls) { return '<svg class="i ' + (cls || '') + '" aria-hidden="true"><use href="#i-' + name + '"/></svg>'; }
  function waUrl(text) { return 'https://wa.me/' + (DATA.whatsapp || '') + '?text=' + encodeURIComponent(text || ''); }
  function openWA(text) {
    var a = document.createElement('a'); a.href = waUrl(text); a.target = '_blank'; a.rel = 'noopener noreferrer';
    document.body.appendChild(a); a.click(); a.remove();
  }
  function showDialog(d) { if (!d) return; if (typeof d.showModal === 'function') { if (!d.open) d.showModal(); } else { d.setAttribute('open', ''); } }
  function closeDialog(d) { if (!d) return; if (typeof d.close === 'function') { d.close(); } else { d.removeAttribute('open'); } }
  function raf(fn) { var t = false; return function () { if (!t) { t = true; requestAnimationFrame(function () { t = false; fn(); }); } }; }

  /* ---------- header: bayangan + progres scroll ---------- */
  (function () {
    var h = $('#abd-header'), bar = $('#abd-scroll i'); if (!h) return;
    var upd = raf(function () {
      var y = window.scrollY, max = document.documentElement.scrollHeight - window.innerHeight;
      h.classList.toggle('is-stuck', y > 8);
      if (bar) bar.style.setProperty('--p', max > 0 ? Math.min(1, y / max).toFixed(4) : 0);
      document.documentElement.style.setProperty('--abd-py', Math.min(70, y * 0.16).toFixed(1) + 'px');
      var tl = $('.abd-timeline');
      if (tl) { var r = tl.getBoundingClientRect(), p = (window.innerHeight * 0.6 - r.top) / r.height; tl.style.setProperty('--tl', Math.max(0, Math.min(1, p)).toFixed(3)); }
    });
    window.addEventListener('scroll', upd, { passive: true }); window.addEventListener('resize', upd); upd();
  })();

  /* ---------- drawer menu mobile ---------- */
  (function () {
    var drawer = $('#abd-drawer'); if (!drawer) return;
    var btn = $('.abd-burger');
    function set(open) {
      drawer.hidden = !open;
      if (btn) { btn.setAttribute('aria-expanded', open ? 'true' : 'false'); btn.setAttribute('aria-label', open ? 'Tutup menu' : 'Buka menu'); }
      document.body.style.overflow = open ? 'hidden' : '';
    }
    $$('[data-menu-toggle]').forEach(function (el) { el.addEventListener('click', function () { set(drawer.hidden); }); });
    $$('[data-menu-link]', drawer).forEach(function (a) { a.addEventListener('click', function () { set(false); }); });
    document.addEventListener('keydown', function (e) { if (e.key === 'Escape' && !drawer.hidden) set(false); });
    window.addEventListener('resize', function () { if (window.innerWidth >= 1180 && !drawer.hidden) set(false); });
  })();

  /* ---------- palet pencarian ---------- */
  (function () {
    var root = $('#abd-search'), input = $('#abd-search-input'), list = $('#abd-search-list');
    if (!root || !input || !list) return;
    var filtersEl = $('#abd-search-filters'), popEl = $('#abd-search-popular'), countEl = $('#abd-search-count'), clearBtn = $('[data-search-clear]', root);
    var toggles = $$('[data-search-toggle]'), group = 'Semua', active = -1, lastFocus = null, shown = [];
    var groups = ['Semua']; DATA.search.forEach(function (it) { if (groups.indexOf(it.g) < 0) groups.push(it.g); });

    function score(it, tokens) {
      var t = norm(it.t), rest = norm((it.s || '') + ' ' + it.g), sc = 0;
      for (var i = 0; i < tokens.length; i++) {
        var k = tokens[i];
        if (t.indexOf(k) === 0 || t.indexOf(' ' + k) > -1) sc += 3; else if (t.indexOf(k) > -1) sc += 2; else if (rest.indexOf(k) > -1) sc += 1; else return 0;
      }
      return sc;
    }
    function hi(text, q) {
      var s = String(text), i = q ? s.toLowerCase().indexOf(q.toLowerCase()) : -1;
      return i < 0 ? esc(s) : esc(s.slice(0, i)) + '<mark>' + esc(s.slice(i, i + q.length)) + '</mark>' + esc(s.slice(i + q.length));
    }
    function buildFilters() {
      filtersEl.innerHTML = '';
      groups.forEach(function (g) {
        var b = document.createElement('button'); b.type = 'button'; b.textContent = g; b.className = g === group ? 'is-active' : '';
        b.addEventListener('click', function () { group = g; buildFilters(); render(); input.focus(); });
        filtersEl.appendChild(b);
      });
    }
    function setActive(i, scroll) {
      var els = $$('.abd-cmdk__item', list); if (!els.length) { active = -1; return; }
      active = (i + els.length) % els.length;
      els.forEach(function (el, k) { el.classList.toggle('is-active', k === active); el.setAttribute('aria-selected', k === active ? 'true' : 'false'); });
      input.setAttribute('aria-activedescendant', els[active].id);
      if (scroll) els[active].scrollIntoView({ block: 'nearest' });
    }
    function render() {
      var q = input.value.trim(), tokens = norm(q).split(' ').filter(Boolean), res;
      clearBtn.hidden = !q;
      if (!tokens.length) {
        res = DATA.search.filter(function (it) { return group === 'Semua' ? it.g === 'Halaman' : it.g === group; }).slice(0, 12);
        popEl.innerHTML = '';
        if (group === 'Semua' && DATA.popular.length) {
          var lab = document.createElement('p'); lab.textContent = 'Pencarian populer'; popEl.appendChild(lab);
          DATA.popular.forEach(function (p) { var b = document.createElement('button'); b.type = 'button'; b.innerHTML = icon('spark') + esc(p); b.addEventListener('click', function () { input.value = p; render(); input.focus(); }); popEl.appendChild(b); });
        }
      } else {
        popEl.innerHTML = '';
        res = DATA.search.map(function (it) { return { it: it, s: score(it, tokens) }; }).filter(function (x) { return x.s > 0 && (group === 'Semua' || x.it.g === group); })
          .sort(function (a, b) { return b.s - a.s; }).map(function (x) { return x.it; }).slice(0, 24);
      }
      shown = res; list.innerHTML = '';
      if (!res.length) {
        var li = document.createElement('li'); li.className = 'abd-cmdk__empty'; li.setAttribute('role', 'presentation');
        li.innerHTML = '<span class="abd-cmdk__emptyico">' + icon('search') + '</span><strong>Tidak ada hasil untuk “' + esc(q) + '”</strong><span>Coba kata kunci lain, atau tanyakan langsung ke ArchiBot.</span><button type="button" class="abd-btn abd-btn--primary abd-btn--sm" data-search-ask>' + icon('chat') + '<span>Tanya ArchiBot</span></button>';
        list.appendChild(li); countEl.textContent = '0 hasil'; active = -1; return;
      }
      var cur = '', n = 0;
      res.forEach(function (it) {
        if (it.g !== cur) { cur = it.g; var l = document.createElement('li'); l.className = 'abd-cmdk__label'; l.setAttribute('role', 'presentation'); l.textContent = cur; list.appendChild(l); }
        var li2 = document.createElement('li'); li2.className = 'abd-cmdk__item'; li2.id = 'abd-sr-' + (n++); li2.setAttribute('role', 'option'); li2.setAttribute('aria-selected', 'false');
        li2.innerHTML = '<a href="' + esc(it.u) + '"><span class="abd-cmdk__ico">' + icon(it.i || 'arrow') + '</span><span class="abd-cmdk__txt"><span class="abd-cmdk__t">' + hi(it.t, q) + '</span><span class="abd-cmdk__s">' + esc(it.s || '') + '</span></span><span class="abd-cmdk__go">' + icon('enter') + '</span></a>';
        li2.addEventListener('mouseenter', function () { setActive($$('.abd-cmdk__item', list).indexOf(li2), false); });
        list.appendChild(li2);
      });
      countEl.textContent = res.length + (tokens.length ? ' hasil' : ' pintasan');
      setActive(0, false);
    }
    function open() {
      if (!root.hidden) return;
      lastFocus = document.activeElement; root.hidden = false; document.body.style.overflow = 'hidden';
      toggles.forEach(function (t) { if (t.hasAttribute('aria-expanded')) t.setAttribute('aria-expanded', 'true'); });
      buildFilters(); render(); setTimeout(function () { input.focus(); input.select(); }, 30);
    }
    function close() {
      if (root.hidden) return;
      root.hidden = true; document.body.style.overflow = '';
      toggles.forEach(function (t) { if (t.hasAttribute('aria-expanded')) t.setAttribute('aria-expanded', 'false'); });
      if (lastFocus && lastFocus.focus) lastFocus.focus();
    }
    toggles.forEach(function (t) { t.addEventListener('click', function () { root.hidden ? open() : close(); }); });
    clearBtn.addEventListener('click', function () { input.value = ''; render(); input.focus(); });
    input.addEventListener('input', function () { render(); });
    root.addEventListener('keydown', function (e) {
      if (e.key === 'ArrowDown') { e.preventDefault(); setActive(active + 1, true); }
      else if (e.key === 'ArrowUp') { e.preventDefault(); setActive(active - 1, true); }
      else if (e.key === 'Enter') { var a = $$('.abd-cmdk__item a', list)[active]; if (a && document.activeElement === input) { e.preventDefault(); window.location.href = a.href; } }
      else if (e.key === 'Escape') { e.preventDefault(); close(); }
    });
    list.addEventListener('click', function (e) {
      if (e.target.closest('[data-search-ask]')) { var q = input.value.trim(); close(); document.dispatchEvent(new CustomEvent('abd:ask', { detail: q })); }
      else if (e.target.closest('.abd-cmdk__item a')) { close(); }
    });
    document.addEventListener('keydown', function (e) {
      if (e.key === 'Escape' && !root.hidden) { close(); return; }
      var tag = (e.target.tagName || '').toLowerCase(), typing = tag === 'input' || tag === 'textarea' || tag === 'select' || e.target.isContentEditable;
      if ((e.ctrlKey || e.metaKey) && e.key.toLowerCase() === 'k') { e.preventDefault(); root.hidden ? open() : close(); }
      else if (e.key === '/' && !typing && root.hidden) { e.preventDefault(); open(); }
    });
  })();

  /* ---------- reveal saat scroll ---------- */
  (function () {
    var els = $$('[data-reveal]'); if (!els.length) return;
    els.forEach(function (el, i) { el.style.setProperty('--rd', ((i % 4) * 0.08).toFixed(2) + 's'); });
    if (reduce || !('IntersectionObserver' in window)) { els.forEach(function (el) { el.classList.add('is-in'); }); return; }
    var io = new IntersectionObserver(function (entries) {
      entries.forEach(function (en) { if (en.isIntersecting) { en.target.classList.add('is-in'); io.unobserve(en.target); } });
    }, { threshold: 0.12, rootMargin: '0px 0px -6% 0px' });
    els.forEach(function (el) { io.observe(el); });
  })();

  /* ---------- hero: daun & bokeh cahaya ---------- */
  (function () {
    var box = $('[data-leaves]'); if (!box || reduce) return;
    var colors = ['#6a9c4c', '#55953f', '#86b45e', '#3d7633', '#c98a4b'], small = window.innerWidth < 700, i, el;
    for (i = 0; i < (small ? 5 : 9); i++) {
      el = document.createElement('span'); el.className = 'abd-leaf';
      el.style.left = (Math.random() * 100).toFixed(1) + '%';
      el.style.setProperty('--s', (14 + Math.random() * 16).toFixed(0) + 'px');
      el.style.setProperty('--d', (12 + Math.random() * 12).toFixed(1) + 's');
      el.style.setProperty('--dl', (-Math.random() * 16).toFixed(1) + 's');
      el.style.setProperty('--c', colors[i % colors.length]);
      el.innerHTML = '<svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 2C6 6 4 12 7 18c2 3 6 4 9 2 4-3 5-9 1-14-1.5-2-3.5-3-5-4z"/></svg>';
      box.appendChild(el);
    }
    for (i = 0; i < (small ? 5 : 11); i++) {
      el = document.createElement('span'); el.className = 'abd-bokeh';
      el.style.left = (35 + Math.random() * 65).toFixed(1) + '%'; el.style.top = (10 + Math.random() * 70).toFixed(1) + '%';
      el.style.setProperty('--b', (24 + Math.random() * 46).toFixed(0) + 'px');
      el.style.setProperty('--d', (6 + Math.random() * 7).toFixed(1) + 's'); el.style.setProperty('--dl', (-Math.random() * 8).toFixed(1) + 's');
      box.appendChild(el);
    }
  })();

  /* ---------- filter portofolio ---------- */
  (function () {
    var wrap = $('[data-gallery]'); if (!wrap) return;
    var btns = $$('[data-filter]'), cards = $$('.abd-pcard', wrap), empty = $('[data-empty]');
    btns.forEach(function (b) {
      b.addEventListener('click', function () {
        var f = b.getAttribute('data-filter'), n = 0;
        btns.forEach(function (x) { var on = x === b; x.classList.toggle('is-active', on); x.setAttribute('aria-pressed', on ? 'true' : 'false'); });
        cards.forEach(function (c) { var ok = f === 'semua' || c.getAttribute('data-cat') === f; c.classList.toggle('is-hidden', !ok); if (ok) { n++; c.classList.add('is-in'); } });
        if (empty) empty.hidden = n > 0;
      });
    });
  })();

  /* ---------- lightbox ---------- */
  (function () {
    var dlg = $('#abd-lightbox'), img = $('#abd-lightbox-img'), cap = $('#abd-lightbox-cap'); if (!dlg || !img) return;
    document.addEventListener('click', function (e) {
      var t = e.target.closest('[data-lightbox]'); if (!t) return;
      img.src = t.getAttribute('data-lightbox'); img.alt = t.getAttribute('data-cap') || ''; if (cap) cap.textContent = t.getAttribute('data-cap') || '';
      showDialog(dlg);
    });
  })();

  /* ---------- tab denah 2D / 3D ---------- */
  $$('[data-plan]').forEach(function (card) {
    var tabs = $$('[role="tab"]', card), view = $('.abd-plan__view', card), im = view && $('img', view); if (!im) return;
    tabs.forEach(function (tab) {
      tab.addEventListener('click', function () {
        if (tab.classList.contains('is-active')) return;
        tabs.forEach(function (t) { var on = t === tab; t.classList.toggle('is-active', on); t.setAttribute('aria-selected', on ? 'true' : 'false'); });
        var src = tab.getAttribute('data-src'), is3d = tabs.indexOf(tab) === 1;
        im.classList.add('is-swap');
        setTimeout(function () { im.src = src; im.alt = (is3d ? 'Render 3D ' : 'Denah ') + (($('h3', card) || {}).textContent || ''); view.setAttribute('data-lightbox', src); im.classList.remove('is-swap'); }, reduce ? 0 : 280);
      });
    });
  });

  /* ---------- dialog: tutup & legal ---------- */
  (function () {
    $$('.abd-dialog').forEach(function (d) { d.addEventListener('click', function (e) { if (e.target === d || e.target.closest('[data-dialog-close]')) closeDialog(d); }); });
    var legal = $('#abd-legal'); if (!legal) return;
    var T = {
      privasi: ['Kebijakan Privasi', 'Data yang Anda kirim lewat formulir hanya digunakan untuk menanggapi permintaan konsultasi dan penawaran, serta tidak dibagikan kepada pihak ketiga tanpa persetujuan Anda.'],
      syarat: ['Syarat & Ketentuan', 'Informasi dan ilustrasi pada situs ini bersifat umum. Lingkup, biaya, dan jadwal proyek ditetapkan secara tertulis setelah konsultasi dan persetujuan penawaran.']
    };
    $$('[data-legal]').forEach(function (b) {
      b.addEventListener('click', function () { var c = T[b.getAttribute('data-legal')] || T.privasi; $('#abd-legal-title').textContent = c[0]; $('[data-legal-body]', legal).textContent = c[1]; showDialog(legal); });
    });
  })();

  /* ---------- FORM: dropdown kustom ---------- */
  var openSelect = null;
  function enhanceSelect(sel) {
    var ctl = sel.parentNode, ico = sel.getAttribute('data-ico'), ph = sel.getAttribute('data-ph') || 'Pilih', id = sel.id, typed = '', typedT;
    sel.id = id + '-native';
    var wrap = document.createElement('div'); wrap.className = 'abd-select'; ctl.insertBefore(wrap, sel); wrap.appendChild(sel);
    sel.classList.add('abd-select__native'); sel.tabIndex = -1; sel.setAttribute('aria-hidden', 'true');
    var btn = document.createElement('button'); btn.type = 'button'; btn.className = 'abd-select__btn' + (ico ? ' has-ico' : ''); btn.id = id;
    btn.setAttribute('aria-haspopup', 'listbox'); btn.setAttribute('aria-expanded', 'false');
    btn.innerHTML = (ico ? icon(ico, 'abd-control__ico') : '') + '<span class="abd-select__val"></span>' + icon('chevron', 'abd-select__chev');
    var val = $('.abd-select__val', btn);
    var panel = document.createElement('ul'); panel.className = 'abd-select__panel'; panel.setAttribute('role', 'listbox'); panel.hidden = true; panel.id = id + '-list';
    btn.setAttribute('aria-controls', panel.id);
    var veil = document.createElement('div'); veil.className = 'abd-select__veil'; veil.hidden = true;
    var opts = [], cur = -1;
    $$('option', sel).forEach(function (o, i) {
      if (!o.value) return;
      var li = document.createElement('li'); li.className = 'abd-select__opt'; li.setAttribute('role', 'option'); li.id = panel.id + '-' + i; li.setAttribute('data-value', o.value);
      li.innerHTML = (o.getAttribute('data-icon') ? icon(o.getAttribute('data-icon')) : '') + '<span>' + esc(o.text) + '</span>' + icon('check', 'abd-select__ck');
      li.addEventListener('mousedown', function (e) { e.preventDefault(); });
      li.addEventListener('click', function () { choose(o.value); });
      li.addEventListener('mouseenter', function () { mark(opts.indexOf(li)); });
      panel.appendChild(li); opts.push(li);
    });
    wrap.appendChild(btn); wrap.appendChild(panel); wrap.appendChild(veil);
    function sync() {
      var has = sel.value !== '', o = sel.options[sel.selectedIndex];
      val.textContent = has && o ? o.text : ph; btn.setAttribute('data-empty', has ? 'false' : 'true');
      opts.forEach(function (li) { li.setAttribute('aria-selected', li.getAttribute('data-value') === sel.value ? 'true' : 'false'); });
    }
    function mark(i) {
      cur = Math.max(0, Math.min(opts.length - 1, i));
      opts.forEach(function (li, k) { li.classList.toggle('is-active', k === cur); });
      if (opts[cur]) { btn.setAttribute('aria-activedescendant', opts[cur].id); opts[cur].scrollIntoView({ block: 'nearest' }); }
    }
    function open() {
      if (openSelect && openSelect !== api) openSelect.close();
      var sheet = window.innerWidth <= 640, r = btn.getBoundingClientRect();
      wrap.classList.toggle('is-sheet', sheet); panel.classList.toggle('is-up', !sheet && window.innerHeight - r.bottom < 300 && r.top > window.innerHeight - r.bottom);
      panel.hidden = false; veil.hidden = !sheet; wrap.classList.add('is-open'); btn.setAttribute('aria-expanded', 'true'); openSelect = api;
      var idx = 0; opts.forEach(function (li, k) { if (li.getAttribute('data-value') === sel.value) idx = k; }); mark(idx);
    }
    function close() { panel.hidden = true; veil.hidden = true; wrap.classList.remove('is-open'); btn.setAttribute('aria-expanded', 'false'); btn.removeAttribute('aria-activedescendant'); if (openSelect === api) openSelect = null; }
    function choose(v) { sel.value = v; sync(); close(); sel.dispatchEvent(new Event('input', { bubbles: true })); sel.dispatchEvent(new Event('change', { bubbles: true })); btn.focus(); }
    var api = { close: close };
    btn.addEventListener('click', function () { panel.hidden ? open() : close(); });
    veil.addEventListener('click', close);
    btn.addEventListener('keydown', function (e) {
      var isOpen = !panel.hidden;
      if (e.key === 'ArrowDown') { e.preventDefault(); isOpen ? mark(cur + 1) : open(); }
      else if (e.key === 'ArrowUp') { e.preventDefault(); isOpen ? mark(cur - 1) : open(); }
      else if (e.key === 'Home' && isOpen) { e.preventDefault(); mark(0); }
      else if (e.key === 'End' && isOpen) { e.preventDefault(); mark(opts.length - 1); }
      else if ((e.key === 'Enter' || e.key === ' ') && isOpen) { e.preventDefault(); if (opts[cur]) choose(opts[cur].getAttribute('data-value')); }
      else if (e.key === 'Escape' && isOpen) { e.preventDefault(); e.stopPropagation(); close(); }
      else if (e.key === 'Tab' && isOpen) { close(); }
      else if (e.key.length === 1 && /\S/.test(e.key)) {
        typed += e.key.toLowerCase(); clearTimeout(typedT); typedT = setTimeout(function () { typed = ''; }, 600);
        for (var k = 0; k < opts.length; k++) { if (norm(opts[k].textContent).indexOf(norm(typed)) === 0) { if (panel.hidden) open(); mark(k); break; } }
      }
    });
    sel._btn = btn; sel._sync = sync; sync();
  }
  document.addEventListener('click', function (e) { if (openSelect && !e.target.closest('.abd-select')) openSelect.close(); });

  /* ---------- FORM: pilihan kartu/chip, validasi, pratinjau, WhatsApp ---------- */
  (function () {
    var forms = $$('[data-wa-form]'); if (!forms.length) return;
    var d = new Date(), iso = d.getFullYear() + '-' + ('0' + (d.getMonth() + 1)).slice(-2) + '-' + ('0' + d.getDate()).slice(-2);
    $$('[data-min-today]').forEach(function (i) { i.min = iso; });
    $$('.abd-control select').forEach(enhanceSelect);

    $$('[data-choice]').forEach(function (grp) {
      var field = grp.closest('[data-field]'), hid = $('input[type=hidden]', field), btns = $$('.abd-opt', grp);
      function pick(b) {
        btns.forEach(function (x) { var on = x === b; x.setAttribute('aria-checked', on ? 'true' : 'false'); x.tabIndex = on ? 0 : -1; });
        hid.value = b.getAttribute('data-value'); hid.dispatchEvent(new Event('input', { bubbles: true }));
      }
      btns.forEach(function (b, i) {
        b.addEventListener('click', function () { pick(b); });
        b.addEventListener('keydown', function (e) {
          var k = e.key, n = btns.length;
          if (k === 'ArrowRight' || k === 'ArrowDown') { e.preventDefault(); btns[(i + 1) % n].focus(); pick(btns[(i + 1) % n]); }
          else if (k === 'ArrowLeft' || k === 'ArrowUp') { e.preventDefault(); btns[(i - 1 + n) % n].focus(); pick(btns[(i - 1 + n) % n]); }
        });
      });
      grp._reset = function () { btns.forEach(function (x) { x.setAttribute('aria-checked', 'false'); x.tabIndex = 0; }); hid.value = ''; };
    });

    function setErr(field, msg) {
      var el = $('input,select,textarea', field), err = $('.abd-err', field);
      if (err) err.textContent = msg || '';
      field.classList.toggle('has-error', !!msg);
      if (el && el.type !== 'hidden') el.setAttribute('aria-invalid', msg ? 'true' : 'false');
    }
    function fieldMsg(el) {
      var v = el.value.trim();
      if (el.required && !v) return el.type === 'hidden' || el.tagName === 'SELECT' ? 'Silakan pilih salah satu.' : 'Wajib diisi.';
      if (el.type === 'email' && v && !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(v)) return 'Format email tidak valid.';
      if (el.type === 'tel' && v && !/^\+?[0-9\s\-]{8,18}$/.test(v)) return 'Nomor telepon tidak valid.';
      if (el.type === 'date' && v && el.min && v < el.min) return 'Tanggal sudah terlewat.';
      if (el.type === 'number' && v && Number(v) < 1) return 'Isi angka lebih dari 0.';
      return '';
    }
    function compose(form) {
      var lines = ['Halo ' + (DATA.brand || 'ArchiDesign') + ', saya ingin *' + (form.getAttribute('data-intro') || 'bertanya') + '*:', ''];
      $$('[data-label]', form).forEach(function (el) {
        var v = el.value.trim(); if (!v) return;
        if (el.type === 'date') { var p = v.split('-'); v = p[2] + '/' + p[1] + '/' + p[0]; }
        if (el.getAttribute('data-label') === 'Perkiraan luas (m²)') v += ' m²';
        lines.push('• ' + el.getAttribute('data-label') + ': ' + v);
      });
      lines.push('', 'Terima kasih.'); return lines.join('\n');
    }
    function refresh(form) {
      var req = $$('[required]', form), filled = req.filter(function (e) { return e.value.trim() !== '' && !fieldMsg(e); }).length;
      var pct = req.length ? Math.round(filled / req.length * 100) : 0;
      $('[data-progress]', form).style.setProperty('--v', (pct / 100).toFixed(2));
      $('[data-progress-text]', form).textContent = pct + '% terisi';
      var pre = $('[data-preview]', form); if (pre) pre.textContent = filled || $$('[data-label]', form).some(function (e) { return e.value.trim(); }) ? compose(form) : 'Isi formulir untuk melihat pratinjau pesan.';
      $$('[data-count]', form).forEach(function (c) { var ta = $('textarea', c.parentNode); c.textContent = ta.value.length + '/' + c.getAttribute('data-count'); });
    }
    forms.forEach(function (form) {
      form.addEventListener('input', function (e) {
        var t = e.target;
        if (t.type === 'tel') t.value = t.value.replace(/[^\d+\s-]/g, '');
        var f = t.closest('[data-field]'); if (f && f.classList.contains('has-error') && !fieldMsg(t)) setErr(f, '');
        refresh(form);
      });
      form.addEventListener('focusout', function (e) {
        var t = e.target, f = t.closest && t.closest('[data-field]');
        if (f && /^(INPUT|TEXTAREA)$/.test(t.tagName) && t.value.trim()) setErr(f, fieldMsg(t));
      });
      form.addEventListener('submit', function (e) {
        e.preventDefault();
        var first = null, ok = true;
        $$('[data-field]', form).forEach(function (f) {
          var el = $('input,select,textarea', f); if (!el) return;
          var msg = fieldMsg(el); setErr(f, msg);
          if (msg) { ok = false; if (!first) first = f; }
        });
        if (!ok) {
          first.scrollIntoView({ behavior: reduce ? 'auto' : 'smooth', block: 'center' });
          var fe = $('input,select,textarea,.abd-opt', first); (fe && fe._btn ? fe._btn : (fe && fe.type === 'hidden' ? $('.abd-opt', first) : fe)).focus({ preventScroll: true });
          toast('Mohon lengkapi kolom yang ditandai.'); return;
        }
        var text = compose(form), done = $('[data-done]', form), link = $('[data-done-link]', form), btn = $('.abd-submit', form);
        link.href = waUrl(text); done.hidden = false; btn.classList.add('is-sent');
        openWA(text); toast('Membuka WhatsApp… silakan kirim pesan untuk menyelesaikan.');
        form.reset(); $$('select', form).forEach(function (s) { if (s._sync) s._sync(); }); $$('[data-choice]', form).forEach(function (g) { g._reset(); });
        $$('[data-field]', form).forEach(function (f) { setErr(f, ''); }); refresh(form);
        setTimeout(function () { btn.classList.remove('is-sent'); }, 2600);
      });
      refresh(form);
    });
  })();

  /* ---------- motion: ripple, spotlight, tilt, parallax hero, ke atas ---------- */
  (function () {
    $$('[data-top]').forEach(function (b) { b.addEventListener('click', function () { window.scrollTo({ top: 0, behavior: reduce ? 'auto' : 'smooth' }); }); });
    if (reduce) return;
    document.addEventListener('pointerdown', function (e) {
      var b = e.target.closest && e.target.closest('.abd-btn'); if (!b) return;
      var r = b.getBoundingClientRect(), d = Math.max(r.width, r.height) * 2, s = document.createElement('span');
      s.className = 'abd-ripple'; s.style.cssText = 'width:' + d + 'px;height:' + d + 'px;left:' + (e.clientX - r.left - d / 2) + 'px;top:' + (e.clientY - r.top - d / 2) + 'px';
      b.appendChild(s); setTimeout(function () { s.remove(); }, 750);
    });
    document.addEventListener('pointermove', function (e) {
      var c = e.target.closest && e.target.closest('.abd-card,.abd-svc,.abd-pcard,.abd-cert,.abd-plan'); if (!c) return;
      var r = c.getBoundingClientRect(); c.style.setProperty('--mx', (e.clientX - r.left) + 'px'); c.style.setProperty('--my', (e.clientY - r.top) + 'px');
    }, { passive: true });
    if (!window.matchMedia('(hover: hover)').matches) return;
    $$('.abd-thumb,.abd-tile,.abd-pcard__img,.abd-fig button,.abd-plan__view').forEach(function (el) {
      el.addEventListener('pointermove', function (e) {
        var r = el.getBoundingClientRect(), x = (e.clientX - r.left) / r.width - 0.5, y = (e.clientY - r.top) / r.height - 0.5;
        el.style.transform = 'perspective(800px) rotateX(' + (-y * 5).toFixed(2) + 'deg) rotateY(' + (x * 6).toFixed(2) + 'deg)';
      });
      el.addEventListener('pointerleave', function () { el.style.transform = ''; });
    });
    var hero = $('[data-hero]');
    if (hero) {
      var tick = raf(function () { hero.style.setProperty('--hx', hero._x.toFixed(3)); hero.style.setProperty('--hy', hero._y.toFixed(3)); });
      hero.addEventListener('pointermove', function (e) { var r = hero.getBoundingClientRect(); hero._x = (e.clientX - r.left) / r.width * 2 - 1; hero._y = (e.clientY - r.top) / r.height * 2 - 1; tick(); });
      hero.addEventListener('pointerleave', function () { hero._x = 0; hero._y = 0; tick(); });
    }
  })();

  /* ---------- chatbot FAQ ---------- */
  (function () {
    var panel = $('#abd-chat'), body = $('#abd-chat-body'), thread = $('#abd-chat-thread'), welcome = $('#abd-chat-welcome'),
        quick = $('#abd-chat-quick'), form = $('#abd-chat-form'), input = $('#abd-chat-input');
    if (!panel || !thread) return;
    var openers = $$('[data-chat-open]'), lastOpener = null, busy = false, asked = {}, av = (DATA.img || '') + '/archibot-avatar.svg';

    function scroll() { body.scrollTop = body.scrollHeight; }
    function hhmm() { var d = new Date(); return ('0' + d.getHours()).slice(-2) + ':' + ('0' + d.getMinutes()).slice(-2); }
    function row(kind) {
      var r = document.createElement('div'); r.className = 'abd-row abd-row--' + kind;
      if (kind === 'bot') r.innerHTML = '<img class="abd-row__av" src="' + esc(av) + '" alt="" width="30" height="30">';
      var w = document.createElement('div'); w.className = 'abd-row__wrap'; r.appendChild(w); thread.appendChild(r); return w;
    }
    function bubble(kind, text) {
      var w = row(kind), m = document.createElement('div'); m.className = 'abd-msg abd-msg--' + kind; m.textContent = text; w.appendChild(m);
      var t = document.createElement('span'); t.className = 'abd-time'; t.textContent = hhmm(); w.appendChild(t); scroll(); return m;
    }
    function cta(m, href, label, wa) {
      var a = document.createElement('a'); a.className = 'abd-msg__cta' + (wa ? ' abd-msg__cta--wa' : ''); a.href = href; a.innerHTML = icon(wa ? 'whatsapp' : 'arrow') + '<span>' + esc(label) + '</span>';
      if (wa) { a.target = '_blank'; a.rel = 'noopener noreferrer'; }
      m.appendChild(document.createElement('br')); m.appendChild(a);
    }
    function feedback(m) {
      var box = document.createElement('div'); box.className = 'abd-fb';
      box.innerHTML = '<span>Membantu?</span><button type="button" data-fb="up" aria-label="Membantu">' + icon('thumb') + '</button><button type="button" data-fb="down" aria-label="Kurang membantu">' + icon('thumb', 'abd-fb__down') + '</button>';
      box.addEventListener('click', function (e) {
        var b = e.target.closest('[data-fb]'); if (!b) return;
        var down = b.getAttribute('data-fb') === 'down'; box.className = 'abd-fb is-done'; box.textContent = down ? 'Terima kasih, kami catat masukan Anda.' : 'Terima kasih atas masukannya! 🙏';
        if (down) { var mm = bubble('bot', 'Maaf jika jawabannya kurang membantu. Tim kami siap menjawab langsung lewat WhatsApp.'); cta(mm, waUrl('Halo ' + (DATA.brand || '') + ', saya butuh bantuan lebih lanjut.'), 'Chat via WhatsApp', true); }
      });
      m.parentNode.appendChild(box);
    }
    function typing() {
      var w = row('bot'), t = document.createElement('div'); t.className = 'abd-msg abd-msg--bot abd-typing'; t.innerHTML = '<i></i><i></i><i></i>'; w.appendChild(t); scroll(); return w.parentNode;
    }
    function reply(fn, delay) { var t = typing(); busy = true; setTimeout(function () { t.remove(); fn(); busy = false; scroll(); }, reduce ? 0 : (delay || 700)); }
    function find(q) {
      var n = norm(q), best = null, score = 0;
      DATA.faq.forEach(function (f) {
        var s = norm(f.q) === n ? 10 : 0;
        (f.k || []).forEach(function (k) { var kk = norm(k); if (kk && n.indexOf(kk) > -1) s += kk.length > 3 ? 2 : 1; });
        if (s > score) { score = s; best = f; }
      });
      return score > 0 ? best : null;
    }
    function followUps(f) {
      quick.innerHTML = ''; var i0 = f ? DATA.faq.indexOf(f) : -1, list = [];
      for (var k = 1; k <= DATA.faq.length && list.length < 3; k++) { var c = DATA.faq[(i0 + k + DATA.faq.length) % DATA.faq.length]; if (c && c !== f && !asked[c.q]) list.push(c.q); }
      if (!list.length) list = DATA.quick.slice(0, 3);
      list.forEach(function (q) { var b = document.createElement('button'); b.type = 'button'; b.innerHTML = icon('spark') + '<span>' + esc(q) + '</span>'; b.addEventListener('click', function () { ask(q); }); quick.appendChild(b); });
    }
    function answer(q) {
      var n = norm(q);
      reply(function () {
        if (/^(halo|hai|hi|hello|selamat|pagi|siang|sore|malam)\b/.test(n) && n.split(' ').length <= 3) { bubble('bot', 'Halo! Senang bertemu Anda. Ada yang ingin ditanyakan tentang layanan arsitektur kami?'); followUps(null); return; }
        if (/terima kasih|makasih|thanks|thank you/.test(n)) { bubble('bot', 'Sama-sama! Jika ada pertanyaan lain, saya siap membantu.'); followUps(null); return; }
        var f = find(q), m;
        if (f) { asked[f.q] = true; m = bubble('bot', f.a); if (f.link) cta(m, DATA.base + f.link[0], f.link[1], false); feedback(m); followUps(f); }
        else { m = bubble('bot', 'Maaf, saya belum menemukan jawaban yang pas. Coba salah satu topik di bawah, atau tanyakan langsung ke tim kami lewat WhatsApp.'); cta(m, waUrl('Halo ' + (DATA.brand || '') + ', saya ingin bertanya: ' + q), 'Tanya via WhatsApp', true); followUps(null); }
      });
    }
    function ask(q) {
      q = String(q || '').trim(); if (!q || busy) return;
      welcome.classList.add('is-collapsed'); bubble('user', q); answer(q);
    }
    function open(from) {
      lastOpener = from || lastOpener; panel.hidden = false; document.body.classList.add('abd-chat-open');
      openers.forEach(function (o) { o.setAttribute('aria-expanded', 'true'); });
      setTimeout(function () { if (window.innerWidth > 640 && input) input.focus(); }, 380);
    }
    function close() {
      panel.hidden = true; document.body.classList.remove('abd-chat-open');
      openers.forEach(function (o) { o.setAttribute('aria-expanded', 'false'); });
      if (lastOpener && lastOpener.focus) lastOpener.focus();
    }
    openers.forEach(function (o) { o.addEventListener('click', function () { open(o); }); });
    $$('[data-chat-close]').forEach(function (c) { c.addEventListener('click', close); });
    $$('[data-chat-topic]').forEach(function (b) { b.addEventListener('click', function () { ask(b.getAttribute('data-chat-topic')); }); });
    var menu = $('[data-chat-menu]'); if (menu) menu.addEventListener('click', function () { welcome.classList.remove('is-collapsed'); body.scrollTop = 0; });
    document.addEventListener('keydown', function (e) { var sr = $('#abd-search'); if (e.key === 'Escape' && !panel.hidden && (!sr || sr.hidden)) close(); });
    if (form) form.addEventListener('submit', function (e) { e.preventDefault(); var v = input.value; input.value = ''; ask(v); });
    $$('[data-chat-ask]').forEach(function (b) { b.addEventListener('click', function () { open(b); setTimeout(function () { ask(b.getAttribute('data-chat-ask')); }, 700); }); });
    $$('[data-chatprev-form]').forEach(function (f) {
      f.addEventListener('submit', function (e) { e.preventDefault(); var i = $('input', f), v = i.value.trim(); i.value = ''; open(i); if (v) setTimeout(function () { ask(v); }, 700); });
    });
    document.addEventListener('abd:ask', function (e) { var q = e.detail; open(null); if (q) setTimeout(function () { ask(q); }, 700); });
    try {
      if (!sessionStorage.getItem('abd-hint')) {
        var tip = $('.abd-fab__tip--bot');
        setTimeout(function () { if (tip && panel.hidden) { tip.classList.add('is-hint'); setTimeout(function () { tip.classList.remove('is-hint'); }, 4500); } }, 3500);
        sessionStorage.setItem('abd-hint', '1');
      }
    } catch (err) { /* storage tidak tersedia */ }
  })();
})();
