/* Historical Document Archive — Vintage Editorial / Burgundy Classic
   Frontend-only interactions. No network calls, no backend, no AI API.
   Everything is scoped to #hda-app and data-* hooks. */
(function () {
  'use strict';
  var app = document.getElementById('hda-app');
  if (!app) return;
  var doc = document, root = doc.documentElement;
  var reduce = window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches;
  var $ = function (s, c) { return (c || app).querySelector(s); };
  var $$ = function (s, c) { return Array.prototype.slice.call((c || app).querySelectorAll(s)); };
  var store = {
    get: function (k, d) { try { var v = localStorage.getItem('hda.' + k); return v ? JSON.parse(v) : d; } catch (e) { return d; } },
    set: function (k, v) { try { localStorage.setItem('hda.' + k, JSON.stringify(v)); } catch (e) {} }
  };
  var esc = function (s) { return String(s == null ? '' : s).replace(/[&<>"']/g, function (c) { return { '&': '&amp;', '<': '&lt;', '>': '&gt;', '"': '&quot;', "'": '&#39;' }[c]; }); };
  var json = function (id) { var el = doc.getElementById(id); try { return el ? JSON.parse(el.textContent) : null; } catch (e) { return null; } };
  var INDEX = json('hda-index') || [];
  var toastT;
  function toast(msg) { var t = $('#hda-toast'); if (!t) return; t.textContent = msg; t.classList.add('is-show'); clearTimeout(toastT); toastT = setTimeout(function () { t.classList.remove('is-show'); }, 2400); }

  doc.body.classList.remove('hda-no-js');
  if (!reduce) root.classList.add('hda-smooth');

  /* ---- Reveal on scroll ------------------------------------------------ */
  (function () {
    var els = $$('.hda-reveal');
    if (!('IntersectionObserver' in window) || reduce) { els.forEach(function (e) { e.classList.add('is-in'); }); return; }
    var io = new IntersectionObserver(function (en) { en.forEach(function (x) { if (x.isIntersecting) { x.target.classList.add('is-in'); io.unobserve(x.target); } }); }, { threshold: .12, rootMargin: '0px 0px -40px 0px' });
    els.forEach(function (e) { io.observe(e); });
  })();

  /* ---- Navbar dropdowns ------------------------------------------------ */
  (function () {
    var items = $$('[data-menu]'), closeT;
    function setOpen(it, on) { it.classList.toggle('is-open', on); var l = $('[data-menu-link]', it); if (l) l.setAttribute('aria-expanded', on ? 'true' : 'false'); }
    function closeAll(except) { items.forEach(function (i) { if (i !== except) setOpen(i, false); }); }
    items.forEach(function (it) {
      var link = $('[data-menu-link]', it); if (!link) return;
      it.addEventListener('mouseenter', function () { if (window.matchMedia('(hover:hover)').matches) { clearTimeout(closeT); closeAll(it); setOpen(it, true); } });
      it.addEventListener('mouseleave', function () { if (window.matchMedia('(hover:hover)').matches) { closeT = setTimeout(function () { setOpen(it, false); }, 160); } });
      it.addEventListener('focusin', function () { closeAll(it); setOpen(it, true); });
      link.addEventListener('click', function (e) { if (!window.matchMedia('(hover:hover)').matches && !it.classList.contains('is-open')) { e.preventDefault(); closeAll(it); setOpen(it, true); } });
      it.addEventListener('keydown', function (e) { if (e.key === 'Escape') { setOpen(it, false); link.focus(); } });
    });
    doc.addEventListener('click', function (e) { if (!e.target.closest('[data-menu]')) closeAll(); });
    doc.addEventListener('focusin', function (e) { if (!e.target.closest('[data-menu]')) closeAll(); });
  })();

  /* ---- Drawer, nav search, language, accessibility ---------------------- */
  (function () {
    var drawer = $('[data-drawer]'), opener = $('[data-drawer-open]');
    function drawerSet(on) { if (!drawer) return; drawer.classList.toggle('is-open', on); drawer.setAttribute('aria-hidden', on ? 'false' : 'true'); doc.body.classList.toggle('hda-lock', on); if (opener) opener.setAttribute('aria-expanded', on ? 'true' : 'false'); }
    if (opener) opener.addEventListener('click', function () { drawerSet(true); });
    $$('[data-drawer-close]').forEach(function (b) { b.addEventListener('click', function () { drawerSet(false); }); });
    $$('[data-acc]').forEach(function (b) { b.addEventListener('click', function () { var p = b.parentNode, on = !p.classList.contains('is-open'); p.classList.toggle('is-open', on); b.setAttribute('aria-expanded', on ? 'true' : 'false'); }); });
    window.addEventListener('resize', function () { if (window.innerWidth >= 1100) drawerSet(false); });
    doc.addEventListener('keydown', function (e) { if (e.key === 'Escape') drawerSet(false); });

    var ns = $('[data-navsearch]'), nsb = $('[data-navsearch-toggle]');
    if (ns && nsb) nsb.addEventListener('click', function () { var on = !ns.classList.contains('is-open'); ns.classList.toggle('is-open', on); nsb.setAttribute('aria-expanded', on ? 'true' : 'false'); if (on) { var i = $('input', ns); if (i) i.focus(); } });

    var lang = $('[data-lang]');
    if (lang) {
      var lb = $('[data-lang-btn]', lang), ll = $('[data-lang-label]', lang);
      function setLang(v) { ll.textContent = v; root.setAttribute('lang', v.toLowerCase()); store.set('lang', v); $$('[data-lang-set]', lang).forEach(function (b) { b.setAttribute('aria-current', b.getAttribute('data-lang-set') === v ? 'true' : 'false'); }); }
      setLang(store.get('lang', 'EN'));
      lb.addEventListener('click', function (e) { e.stopPropagation(); var on = !lang.classList.contains('is-open'); lang.classList.toggle('is-open', on); lb.setAttribute('aria-expanded', on ? 'true' : 'false'); });
      $$('[data-lang-set]', lang).forEach(function (b) { b.addEventListener('click', function () { setLang(b.getAttribute('data-lang-set')); lang.classList.remove('is-open'); toast('Language preference saved (demo: content stays in English).'); }); });
      doc.addEventListener('click', function (e) { if (!e.target.closest('[data-lang]')) lang.classList.remove('is-open'); });
    }
    var fs = store.get('fs', 0), sizes = { '-1': '90%', '0': '100%', '1': '112.5%' };
    function applyFs() { root.style.fontSize = sizes[String(fs)] || '100%'; }
    applyFs();
    $$('[data-fs]').forEach(function (b) { b.addEventListener('click', function () { fs = parseInt(b.getAttribute('data-fs'), 10); store.set('fs', fs); applyFs(); }); });
    var cb = $('[data-contrast]');
    function applyC(on) { app.classList.toggle('hda-contrast', on); if (cb) cb.setAttribute('aria-pressed', on ? 'true' : 'false'); }
    applyC(store.get('contrast', false));
    if (cb) cb.addEventListener('click', function () { var on = !app.classList.contains('hda-contrast'); store.set('contrast', on); applyC(on); });
  })();

  /* ---- Hero parallax + floating dust ----------------------------------- */
  (function () {
    var bgs = $$('[data-parallax]'); if (!bgs.length || reduce) return;
    var ticking = false;
    function upd() { var y = window.pageYOffset; bgs.forEach(function (b) { var r = b.parentNode.getBoundingClientRect(); if (r.bottom > 0 && r.top < window.innerHeight) b.style.transform = 'translate3d(0,' + Math.round(y * .18) + 'px,0)'; }); ticking = false; }
    window.addEventListener('scroll', function () { if (!ticking) { ticking = true; requestAnimationFrame(upd); } }, { passive: true });
    var d = $('[data-dust]');
    if (d) for (var i = 0; i < 22; i++) { var s = doc.createElement('span'); s.className = 'hda-dust'; var sz = 3 + Math.random() * 6; s.style.cssText = 'left:' + (Math.random() * 100) + '%;width:' + sz + 'px;height:' + sz + 'px;animation-duration:' + (9 + Math.random() * 12) + 's;animation-delay:' + (-Math.random() * 18) + 's;--dx:' + (Math.random() * 80 - 40) + 'px'; d.appendChild(s); }
  })();

  /* ---- Sliders ---------------------------------------------------------- */
  $$('[data-slider]').forEach(function (sl) {
    var track = $('[data-track]', sl), slides = $$('.hda-slide', sl), dots = $('[data-dots]', sl), n = slides.length, i = 0, timer;
    if (!track || !n) return;
    slides.forEach(function (_, k) { var b = doc.createElement('button'); b.type = 'button'; b.setAttribute('aria-label', 'Go to slide ' + (k + 1)); b.addEventListener('click', function () { go(k); }); dots.appendChild(b); });
    function go(k) { i = (k + n) % n; track.style.transform = 'translateX(' + (-100 * i) + '%)'; $$('button', dots).forEach(function (b, x) { b.setAttribute('aria-current', x === i ? 'true' : 'false'); }); slides.forEach(function (s, x) { s.setAttribute('aria-hidden', x === i ? 'false' : 'true'); }); }
    $('[data-prev]', sl).addEventListener('click', function () { go(i - 1); reset(); });
    $('[data-next]', sl).addEventListener('click', function () { go(i + 1); reset(); });
    function reset() { clearInterval(timer); if (!reduce) timer = setInterval(function () { go(i + 1); }, 7000); }
    sl.addEventListener('mouseenter', function () { clearInterval(timer); }); sl.addEventListener('mouseleave', reset);
    var x0 = null; track.addEventListener('touchstart', function (e) { x0 = e.touches[0].clientX; }, { passive: true });
    track.addEventListener('touchend', function (e) { if (x0 === null) return; var dx = e.changedTouches[0].clientX - x0; if (Math.abs(dx) > 40) { go(i + (dx < 0 ? 1 : -1)); reset(); } x0 = null; });
    go(0); reset();
  });

  /* ---- Timeline preview --------------------------------------------------- */
  (function () {
    var wrap = $('[data-timeline]'); if (!wrap) return;
    var items = $$('[data-tl-item]', wrap), desc = $('[data-tl-desc]', wrap), cur = 2;
    function set(k, scroll) {
      cur = (k + items.length) % items.length;
      items.forEach(function (it, x) { var on = x === cur; it.classList.toggle('is-active', on); $('.hda-tl__btn', it).setAttribute('aria-selected', on ? 'true' : 'false'); });
      var it = items[cur]; desc.innerHTML = esc(it.getAttribute('data-desc')) + ' <a class="hda-textlink" href="' + esc(it.getAttribute('data-href')) + '">Open period guide →</a>';
      if (scroll && it.scrollIntoView && window.innerWidth < 900) it.scrollIntoView({ behavior: reduce ? 'auto' : 'smooth', inline: 'center', block: 'nearest' });
    }
    items.forEach(function (it, x) { $('.hda-tl__btn', it).addEventListener('click', function () { set(x, true); }); });
    $$('[data-tl-prev]', wrap).forEach(function (b) { b.addEventListener('click', function () { set(cur - 1, true); }); });
    $$('[data-tl-next]', wrap).forEach(function (b) { b.addEventListener('click', function () { set(cur + 1, true); }); });
    set(2, false);
  })();

  /* ---- Stats counter ------------------------------------------------------ */
  (function () {
    var box = $('[data-stats]'); if (!box || reduce || !('IntersectionObserver' in window)) return;
    var io = new IntersectionObserver(function (en) { if (!en[0].isIntersecting) return; io.disconnect();
      $$('[data-count]', box).forEach(function (el) {
        var raw = el.getAttribute('data-count'), m = raw.match(/^([\d,\.]+)(.*)$/); if (!m) return;
        var target = parseFloat(m[1].replace(/,/g, '')), comma = m[1].indexOf(',') > -1, start = null;
        function step(t) { if (!start) start = t; var p = Math.min((t - start) / 1200, 1), v = Math.round(target * (1 - Math.pow(1 - p, 3))); el.textContent = (comma ? v.toLocaleString('en-US') : v) + m[2]; if (p < 1) requestAnimationFrame(step); }
        requestAnimationFrame(step);
      }); }, { threshold: .4 });
    io.observe(box);
  })();

  /* ---- Search suggestions (from the static index) ------------------------ */
  $$('[data-suggest-input]').forEach(function (input) {
    var box = input.parentNode.querySelector('[data-suggest]'), sel = -1, hits = [];
    function render() {
      var q = input.value.trim().toLowerCase(); sel = -1;
      if (q.length < 2) { box.classList.remove('is-open'); return; }
      hits = INDEX.filter(function (x) { return (x.title + ' ' + (x.sub || '')).toLowerCase().indexOf(q) > -1; }).slice(0, 6);
      box.innerHTML = hits.length ? hits.map(function (h, k) { return '<button type="button" role="option" data-k="' + k + '"><span>' + esc(h.title) + '</span><small>' + esc(h.type) + '</small></button>'; }).join('') : '<button type="button" disabled><span>No quick matches — press Enter to search</span></button>';
      box.classList.add('is-open');
    }
    input.addEventListener('input', render);
    input.addEventListener('keydown', function (e) {
      var bs = $$('button[data-k]', box);
      if (e.key === 'ArrowDown' && bs.length) { e.preventDefault(); sel = (sel + 1) % bs.length; }
      else if (e.key === 'ArrowUp' && bs.length) { e.preventDefault(); sel = (sel - 1 + bs.length) % bs.length; }
      else if (e.key === 'Enter' && sel > -1) { e.preventDefault(); location.href = hits[sel].url; return; }
      else if (e.key === 'Escape') { box.classList.remove('is-open'); return; } else return;
      bs.forEach(function (b, k) { b.setAttribute('aria-selected', k === sel ? 'true' : 'false'); });
    });
    box.addEventListener('click', function (e) { var b = e.target.closest('button[data-k]'); if (b) location.href = hits[+b.getAttribute('data-k')].url; });
    doc.addEventListener('click', function (e) { if (!e.target.closest('.hda-search__row')) box.classList.remove('is-open'); });
  });

  /* ---- Newsletter / demo forms --------------------------------------------- */
  $$('[data-newsletter]').forEach(function (f) { f.addEventListener('submit', function (e) { e.preventDefault(); var i = $('input', f), ok = $('[data-newsletter-ok]'); if (!i.value || i.value.indexOf('@') < 1) { i.focus(); toast('Please enter a valid email address.'); return; } if (ok) ok.classList.add('is-show'); f.reset(); }); });
  $$('[data-demo-form]').forEach(function (f) { f.addEventListener('submit', function (e) { e.preventDefault(); if (!f.checkValidity()) { f.reportValidity(); return; } var a = $('[data-demo-ok]', f.parentNode) || $('[data-demo-ok]'); if (a) { a.classList.add('is-show'); a.scrollIntoView({ block: 'nearest', behavior: reduce ? 'auto' : 'smooth' }); } f.reset(); }); });
  $$('[data-copy]').forEach(function (b) { b.addEventListener('click', function () { var t = b.getAttribute('data-copy') || location.href; if (navigator.clipboard) navigator.clipboard.writeText(t).then(function () { toast('Copied to clipboard'); }, function () { toast('Copy not available'); }); else toast('Copy not available'); }); });

  /* ---- Back to top ----------------------------------------------------------- */
  (function () { var b = $('[data-top]'); if (!b) return; window.addEventListener('scroll', function () { b.classList.toggle('is-show', window.pageYOffset > 700); }, { passive: true }); b.addEventListener('click', function () { window.scrollTo({ top: 0, behavior: reduce ? 'auto' : 'smooth' }); }); })();

  /* ---- Library Assistant (static FAQ — no AI backend) ----------------------- */
  (function () {
    var panel = $('[data-chat]'), data = json('hda-assistant'); if (!panel || !data) return;
    var body = $('[data-chat-body]', panel), quick = $('[data-chat-quick]', panel), sugg = $('[data-chat-sugg]', panel), form = $('[data-chat-form]', panel), input = $('[data-chat-input]', panel);
    var toggle = $('[data-chat-toggle]'), started = false, group = null;
    var all = []; data.groups.forEach(function (g) { g.qa.forEach(function (x) { all.push({ g: g.name, q: x.q, a: x.a }); }); });
    function add(t, who) { var m = doc.createElement('div'); m.className = 'hda-msg hda-msg--' + who; m.textContent = t; body.appendChild(m); body.scrollTop = body.scrollHeight; return m; }
    function reply(text) {
      var t = doc.createElement('div'); t.className = 'hda-msg hda-msg--bot hda-msg--typing'; t.innerHTML = '<i></i><i></i><i></i>'; body.appendChild(t); body.scrollTop = body.scrollHeight;
      setTimeout(function () { t.remove(); add(text, 'bot'); }, reduce ? 0 : 550);
    }
    function findAnswer(q) {
      var s = q.toLowerCase().replace(/[^a-z0-9 ]/g, ' '), words = s.split(/\s+/).filter(function (w) { return w.length > 2; }), best = null, score = 0;
      all.forEach(function (x) { var t = (x.q + ' ' + x.a).toLowerCase(), sc = 0; if (x.q.toLowerCase() === q.toLowerCase()) sc = 99; words.forEach(function (w) { if (t.indexOf(w) > -1) sc++; }); if (sc > score) { score = sc; best = x; } });
      return score >= 2 ? best.a : null;
    }
    function ask(q) { if (!q) return; add(q, 'me'); var a = findAnswer(q); if (!a) { var g = data.groups.filter(function (x) { return q.toLowerCase().indexOf(x.name.toLowerCase().split(' ')[0]) > -1; })[0]; if (g) { reply('Here are common questions about ' + g.name + '. Choose one below.'); showGroup(g.name); return; } } reply(a || data.fallback); }
    function showGroup(name) { group = name; $$('.hda-qr', quick).forEach(function (b) { b.classList.toggle('is-on', b.textContent === name); }); sugg.innerHTML = ''; var g = data.groups.filter(function (x) { return x.name === name; })[0]; (g ? g.qa.map(function (x) { return x.q; }) : data.suggestions).forEach(function (q) { var b = doc.createElement('button'); b.type = 'button'; b.className = 'hda-qr'; b.textContent = q; b.addEventListener('click', function () { ask(q); }); sugg.appendChild(b); }); }
    data.quick.forEach(function (n) { var b = doc.createElement('button'); b.type = 'button'; b.className = 'hda-qr'; b.textContent = n; b.addEventListener('click', function () { add(n, 'me'); reply('Here are common questions about ' + n + '.'); showGroup(n); }); quick.appendChild(b); });
    showGroup('');
    function open(first) {
      panel.classList.add('is-open'); if (toggle) { toggle.setAttribute('aria-expanded', 'true'); } 
      if (!started) { started = true; add(data.welcome, 'bot'); }
      setTimeout(function () { input.focus(); }, 280);
    }
    function close() { panel.classList.remove('is-open'); if (toggle) { toggle.setAttribute('aria-expanded', 'false'); toggle.focus(); } }
    if (toggle) toggle.addEventListener('click', function () { panel.classList.contains('is-open') ? close() : open(); });
    $('[data-chat-close]', panel).addEventListener('click', close);
    doc.addEventListener('keydown', function (e) { if (e.key === 'Escape' && panel.classList.contains('is-open')) close(); });
    form.addEventListener('submit', function (e) { e.preventDefault(); var v = input.value.trim(); if (!v) return; input.value = ''; ask(v); });
    $$('[data-open-chat]').forEach(function (b) { b.addEventListener('click', function () { open(); }); });
    $$('[data-group]').forEach(function (b) { b.addEventListener('click', function () { var n = b.getAttribute('data-group'); open(); setTimeout(function () { add(n, 'me'); reply('Here are common questions about ' + n + '.'); showGroup(n); }, 320); }); });
    $$('[data-ask]').forEach(function (b) { b.addEventListener('click', function () { open(); setTimeout(function () { ask(b.getAttribute('data-ask')); }, 320); }); });
  })();

  /* ---- Generic list filtering ------------------------------------------------ */
  $$('[data-filter-root]').forEach(function (rt) {
    var items = $$('[data-filter-item]', rt), q = $('[data-filter-q]', rt), selects = $$('[data-filter-select]', rt), sort = $('[data-filter-sort]', rt), count = $('[data-filter-count]', rt), empty = $('[data-filter-empty]', rt), grid = $('[data-filter-grid]', rt);
    function run() {
      var term = q ? q.value.trim().toLowerCase() : '', shown = 0;
      items.forEach(function (it) {
        var ok = !term || (it.getAttribute('data-text') || '').toLowerCase().indexOf(term) > -1;
        selects.forEach(function (s) { var v = s.value, k = s.getAttribute('data-filter-select'); if (v && (it.getAttribute('data-' + k) || '').toLowerCase().indexOf(v.toLowerCase()) < 0) ok = false; });
        it.hidden = !ok; if (ok) shown++;
      });
      if (count) count.textContent = shown + (shown === 1 ? ' result' : ' results');
      if (empty) empty.classList.toggle('is-show', shown === 0);
    }
    function doSort() { if (!sort || !grid) return; var k = sort.value, arr = items.slice(); arr.sort(function (a, b) { if (k === 'title') return (a.getAttribute('data-title') || '').localeCompare(b.getAttribute('data-title') || ''); var ya = parseInt(a.getAttribute('data-year'), 10) || 0, yb = parseInt(b.getAttribute('data-year'), 10) || 0; return k === 'oldest' ? ya - yb : yb - ya; }); arr.forEach(function (it) { grid.appendChild(it); }); }
    if (q) q.addEventListener('input', run);
    selects.forEach(function (s) { s.addEventListener('change', run); });
    if (sort) sort.addEventListener('change', doSort);
    $$('[data-view]', rt).forEach(function (b) { b.addEventListener('click', function () { if (grid) grid.classList.toggle('is-list', b.getAttribute('data-view') === 'list'); $$('[data-view]', rt).forEach(function (x) { x.setAttribute('aria-pressed', x === b ? 'true' : 'false'); }); }); });
    var pre = new URLSearchParams(location.search).get('q'); if (pre && q) q.value = pre;
    run();
  });

  /* ---- Save / bookmark -------------------------------------------------------- */
  (function () {
    var saved = store.get('saved', []);
    function sync() { $$('[data-save]').forEach(function (b) { b.setAttribute('aria-pressed', saved.indexOf(b.getAttribute('data-save')) > -1 ? 'true' : 'false'); }); }
    doc.addEventListener('click', function (e) {
      var b = e.target.closest('[data-save]'); if (!b) return; e.preventDefault(); e.stopPropagation();
      var id = b.getAttribute('data-save'), k = saved.indexOf(id);
      if (k > -1) { saved.splice(k, 1); toast('Removed from My Saved Archives'); } else { saved.push(id); toast('Saved to My Saved Archives'); }
      store.set('saved', saved); sync(); renderSaved();
    });
    function renderSaved() {
      var host = $('[data-saved-list]'); if (!host) return;
      var items = saved.map(function (id) { return INDEX.filter(function (x) { return x.id === id; })[0]; }).filter(Boolean);
      var empty = $('[data-saved-empty]'); if (empty) empty.classList.toggle('is-show', !items.length);
      host.innerHTML = items.map(function (h) { return card(h, true); }).join('');
      var c = $('[data-saved-count]'); if (c) c.textContent = items.length + (items.length === 1 ? ' item' : ' items');
    }
    sync(); renderSaved(); window.hdaSaved = { get: function () { return saved; } };
  })();

  function card(h, withSave) {
    return '<a class="hda-card" href="' + esc(h.url) + '">' + (withSave ? '<button type="button" class="hda-save" data-save="' + esc(h.id) + '" aria-pressed="true" aria-label="Remove from saved"><svg class="hda-icon"><use href="#i-bookmark"/></svg></button>' : '') +
      '<span class="hda-card__img"><img src="' + esc(h.image) + '" alt="" loading="lazy"></span><span class="hda-card__body"><span class="hda-tag">' + esc(h.type) + '</span><strong class="hda-card__title" style="font-family:var(--serif)">' + esc(h.title) + '</strong><span class="hda-card__text">' + esc(h.sub || '') + '</span></span></a>';
  }

  /* ---- Search results page (client-side over the static index) ---------------- */
  (function () {
    var pg = $('[data-search-page]'); if (!pg) return;
    var p = new URLSearchParams(location.search), qEl = $('[name="q"]', pg), yf = parseInt(p.get('from'), 10) || 0, yt = parseInt(p.get('to'), 10) || 0, per = $('[name="period"]', pg), cat = $('[name="category"]', pg), loc = $('[name="location"]', pg), typ = $('[name="type"]', pg);
    [['q', qEl], ['period', per], ['category', cat], ['location', loc], ['type', typ]].forEach(function (x) { if (x[1] && p.get(x[0])) x[1].value = p.get(x[0]); });
    var out = $('[data-search-out]', pg), cnt = $('[data-search-count]', pg), empty = $('[data-search-empty]', pg), form = $('form', pg);
    function run() {
      var q = (qEl.value || '').trim().toLowerCase();
      var res = INDEX.filter(function (x) {
        if (q && (x.title + ' ' + (x.sub || '') + ' ' + x.type).toLowerCase().indexOf(q) < 0) return false;
        if (per && per.value && (x.period || '') !== per.value) return false;
        if (cat && cat.value && (x.category || '') !== cat.value) return false;
        if (loc && loc.value && (x.location || '') !== loc.value) return false;
        if (typ && typ.value && x.type !== typ.value) return false;
        if ((yf || yt) && (!x.year || (yf && x.year < yf) || (yt && x.year > yt))) return false;
        return true;
      });
      out.innerHTML = res.map(function (h) { return card(h, false); }).join('');
      cnt.textContent = res.length + (res.length === 1 ? ' result' : ' results') + (q ? ' for “' + qEl.value.trim() + '”' : '');
      empty.classList.toggle('is-show', !res.length);
    }
    form.addEventListener('submit', function (e) { e.preventDefault(); var u = new URLSearchParams(new FormData(form)); [].slice.call(u.keys()).forEach(function (k) { if (!u.get(k)) u.delete(k); }); history.replaceState(null, '', '?' + u.toString()); run(); });
    $$('select', pg).forEach(function (s) { s.addEventListener('change', run); });
    run();
  })();

  /* ---- Tabs ------------------------------------------------------------------- */
  $$('[data-tabs]').forEach(function (t) {
    var btns = $$('[role="tab"]', t), panels = $$('.hda-tabs__panel', t);
    function sel(k) { btns.forEach(function (b, x) { b.setAttribute('aria-selected', x === k ? 'true' : 'false'); }); panels.forEach(function (p, x) { p.hidden = x !== k; }); }
    btns.forEach(function (b, k) { b.addEventListener('click', function () { sel(k); }); });
    sel(0);
  });

  /* ---- Glossary A–Z ------------------------------------------------------------ */
  (function () {
    var g = $('[data-glossary]'); if (!g) return;
    var entries = $$('[data-term]', g), az = $('[data-az]', g), q = $('[data-gloss-q]', g), cur = '';
    var letters = {}; entries.forEach(function (e) { letters[e.getAttribute('data-term').charAt(0).toUpperCase()] = 1; });
    'ABCDEFGHIJKLMNOPQRSTUVWXYZ'.split('').forEach(function (L) { var b = doc.createElement('button'); b.type = 'button'; b.textContent = L; b.setAttribute('aria-pressed', 'false'); if (!letters[L]) b.disabled = true; b.addEventListener('click', function () { cur = cur === L ? '' : L; run(); }); az.appendChild(b); });
    function run() { var t = q ? q.value.trim().toLowerCase() : ''; entries.forEach(function (e) { var term = e.getAttribute('data-term'); e.hidden = !((!cur || term.charAt(0).toUpperCase() === cur) && (!t || (term + ' ' + e.textContent).toLowerCase().indexOf(t) > -1)); }); $$('button', az).forEach(function (b) { b.setAttribute('aria-pressed', b.textContent === cur ? 'true' : 'false'); }); }
    if (q) q.addEventListener('input', run);
  })();

  /* ---- Document viewer ----------------------------------------------------------- */
  (function () {
    var v = $('[data-viewer]'); if (!v) return;
    var page = $('[data-vpage]', v), z = 1, rot = 0, zl = $('[data-zoom-label]', v), stage = $('.hda-viewer__stage', v), side = $('[data-vside]', v), prog = $('.hda-progress i', v), pgNo = $('[data-pgno]', v), total = parseInt(v.getAttribute('data-pages'), 10) || 1, cur = 1;
    function apply() { page.style.transform = 'scale(' + z + ') rotate(' + rot + 'deg)'; zl.textContent = Math.round(z * 100) + '%'; pgNo.textContent = cur + ' / ' + total; prog.style.width = (cur / total * 100) + '%'; }
    $$('[data-v]', v).forEach(function (b) { b.addEventListener('click', function () { var a = b.getAttribute('data-v');
      if (a === 'in') z = Math.min(3, z + .25); else if (a === 'out') z = Math.max(.5, z - .25); else if (a === 'rot') rot = (rot + 90) % 360; else if (a === 'reset') { z = 1; rot = 0; }
      else if (a === 'prev') cur = Math.max(1, cur - 1); else if (a === 'next') cur = Math.min(Math.min(total, 12), cur + 1);
      else if (a === 'full') { (stage.requestFullscreen || stage.webkitRequestFullscreen || function () {}).call(stage); }
      else if (a === 'side') { side.hidden = !side.hidden; b.setAttribute('aria-pressed', side.hidden ? 'false' : 'true'); }
      apply(); }); });
    stage.addEventListener('wheel', function (e) { if (e.ctrlKey) { e.preventDefault(); z = Math.min(3, Math.max(.5, z + (e.deltaY < 0 ? .1 : -.1))); apply(); } }, { passive: false });
    var drag = null; stage.addEventListener('pointerdown', function (e) { drag = { x: e.clientX, y: e.clientY, l: stage.scrollLeft, t: stage.scrollTop }; stage.style.cursor = 'grabbing'; });
    window.addEventListener('pointerup', function () { drag = null; stage.style.cursor = ''; });
    window.addEventListener('pointermove', function (e) { if (!drag) return; stage.scrollLeft = drag.l - (e.clientX - drag.x); stage.scrollTop = drag.t - (e.clientY - drag.y); });
    apply();
  })();

  /* ---- Citation generator ---------------------------------------------------------- */
  (function () {
    var c = $('[data-citation]'); if (!c) return;
    var sel = $('[data-cite-item]', c), style = $('[data-cite-style]', c), out = $('[data-cite-out]', c), url = location.origin + location.pathname;
    function make() {
      var o = sel.options[sel.selectedIndex], a = o.getAttribute('data-author'), t = o.getAttribute('data-title'), y = o.getAttribute('data-year'), ty = o.getAttribute('data-type'), s = style.value, today = new Date().toLocaleDateString('en-GB', { day: 'numeric', month: 'long', year: 'numeric' });
      if (s === 'APA') return a + '. (' + y + '). ' + t + ' [' + ty + ']. Digital Library. ' + url;
      if (s === 'MLA') return a + '. ' + t + '. ' + y + '. Digital Library, ' + url + '. Accessed ' + today + '.';
      return a + '. ' + t + '. ' + y + '. Digital Library. ' + url + '.';
    }
    function upd() { out.textContent = make(); }
    sel.addEventListener('change', upd); style.addEventListener('change', upd);
    var cb = $('[data-cite-copy]', c); if (cb) cb.addEventListener('click', function () { if (navigator.clipboard) navigator.clipboard.writeText(out.textContent).then(function () { toast('Citation copied'); }); });
    upd();
  })();

  /* ---- My Research notes -------------------------------------------------------------- */
  (function () {
    var n = $('[data-notes]'); if (!n) return;
    var list = $('[data-note-list]', n), f = $('form', n), notes = store.get('notes', []);
    function render() { list.innerHTML = notes.length ? notes.map(function (x, i) { return '<div class="hda-note"><div><strong>' + esc(x.title) + '</strong><time>' + esc(x.date) + '</time><p style="margin:.4em 0 0;font-size:.9rem">' + esc(x.text) + '</p></div><button type="button" data-del="' + i + '">Delete</button></div>'; }).join('') : '<p class="hda-empty is-show"><strong>No notes yet</strong>Add your first research note above.</p>'; }
    f.addEventListener('submit', function (e) { e.preventDefault(); var t = $('[name="title"]', f).value.trim(), x = $('[name="text"]', f).value.trim(); if (!t || !x) return; notes.unshift({ title: t, text: x, date: new Date().toLocaleDateString('en-GB', { day: 'numeric', month: 'short', year: 'numeric' }) }); store.set('notes', notes); f.reset(); render(); toast('Note saved in this browser'); });
    list.addEventListener('click', function (e) { var b = e.target.closest('[data-del]'); if (!b) return; notes.splice(+b.getAttribute('data-del'), 1); store.set('notes', notes); render(); });
    render();
  })();

  /* ---- Map board pins -------------------------------------------------------------------- */
  (function () {
    var b = $('[data-board]'); if (!b) return;
    var pins = $$('[data-pin]', b), cards = $$('[data-loc-card]');
    function on(slug) { pins.forEach(function (p) { p.classList.toggle('is-on', p.getAttribute('data-pin') === slug); }); cards.forEach(function (c) { c.style.outline = c.getAttribute('data-loc-card') === slug ? '3px solid var(--gold)' : ''; }); }
    pins.forEach(function (p) { p.addEventListener('mouseenter', function () { on(p.getAttribute('data-pin')); }); p.addEventListener('focus', function () { on(p.getAttribute('data-pin')); }); });
    cards.forEach(function (c) { c.addEventListener('mouseenter', function () { on(c.getAttribute('data-loc-card')); }); });
  })();
})();
