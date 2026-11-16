/* ==========================================================================
   Foundation — Professional · Classic Trust  |  WEBIA by D-KREASI
   Vanilla JS tanpa dependensi. Data dari window.FD (dirender di layout.blade.php)
   ========================================================================== */
(function () {
  'use strict';

  var D = document, W = window, root = D.documentElement;
  var $ = function (s, c) { return (c || D).querySelector(s); };
  var $$ = function (s, c) { return Array.prototype.slice.call((c || D).querySelectorAll(s)); };
  var FD = W.FD || {};
  var FAQ = FD.faq || { items: [], quick: [], greeting: '', fallback: '' };
  var reduced = W.matchMedia && W.matchMedia('(prefers-reduced-motion: reduce)').matches;
  var ICONS = ['heart', 'grid', 'users', 'doc', 'news'];

  root.classList.add('fd-js');

  function svgIcon(id, cls) {
    var s = D.createElementNS('http://www.w3.org/2000/svg', 'svg');
    s.setAttribute('class', 'fd-ico' + (cls ? ' ' + cls : ''));
    var u = D.createElementNS('http://www.w3.org/2000/svg', 'use');
    u.setAttribute('href', '#fd-i-' + id);
    s.appendChild(u);
    return s;
  }
  function isTyping(el) { return el && (/^(INPUT|TEXTAREA|SELECT)$/.test(el.tagName) || el.isContentEditable); }

  /* ---------- Toast ---------- */
  var toastEl, toastTimer;
  function toast(msg) {
    if (!toastEl) {
      toastEl = D.createElement('div');
      toastEl.className = 'fd-toast';
      toastEl.setAttribute('role', 'status');
      toastEl.setAttribute('aria-live', 'polite');
      D.body.appendChild(toastEl);
    }
    toastEl.textContent = msg;
    toastEl.classList.add('is-show');
    clearTimeout(toastTimer);
    toastTimer = setTimeout(function () { toastEl.classList.remove('is-show'); }, 3000);
  }
  $$('[data-fd-toast]').forEach(function (el) {
    el.addEventListener('click', function (e) { e.preventDefault(); toast(el.getAttribute('data-fd-toast')); });
  });

  /* ---------- Header: bayangan saat scroll ---------- */
  var header = $('[data-fd-header]');
  function onScroll() { if (header) header.classList.toggle('is-scrolled', W.scrollY > 8); }
  onScroll();
  W.addEventListener('scroll', onScroll, { passive: true });

  /* ---------- Dropdown donasi (topbar) ---------- */
  $$('[data-fd-drop]').forEach(function (drop) {
    var btn = $('.fd-drop__btn', drop), items = $$('.fd-drop__menu a', drop);
    function set(open, focusFirst) {
      drop.classList.toggle('is-open', open);
      btn.setAttribute('aria-expanded', open ? 'true' : 'false');
      if (open && focusFirst && items[0]) items[0].focus();
    }
    btn.addEventListener('click', function (e) { e.stopPropagation(); set(!drop.classList.contains('is-open')); });
    btn.addEventListener('keydown', function (e) { if (e.key === 'ArrowDown') { e.preventDefault(); set(true, true); } });
    drop.addEventListener('keydown', function (e) {
      if (!drop.classList.contains('is-open')) return;
      var idx = items.indexOf(D.activeElement);
      if (e.key === 'ArrowDown') { e.preventDefault(); (items[idx + 1] || items[0]).focus(); }
      if (e.key === 'ArrowUp') { e.preventDefault(); (items[idx - 1] || items[items.length - 1]).focus(); }
      if (e.key === 'Escape') { set(false); btn.focus(); }
    });
    D.addEventListener('click', function (e) { if (!drop.contains(e.target)) set(false); });
  });

  /* ---------- Menu mobile ---------- */
  var burger = $('[data-fd-burger]'), menu = $('#fd-menu');
  function setMenu(open) {
    if (!burger || !menu) return;
    menu.classList.toggle('is-open', open);
    burger.setAttribute('aria-expanded', open ? 'true' : 'false');
    burger.setAttribute('aria-label', open ? 'Tutup menu' : 'Buka menu');
    var use = $('use', burger);
    if (use) use.setAttribute('href', open ? '#fd-i-close' : '#fd-i-menu');
  }
  if (burger && menu) {
    burger.addEventListener('click', function () { setMenu(!menu.classList.contains('is-open')); });
    $$('a', menu).forEach(function (a) { a.addEventListener('click', function () { setMenu(false); }); });
    D.addEventListener('click', function (e) { if (menu.classList.contains('is-open') && !menu.contains(e.target) && !burger.contains(e.target)) setMenu(false); });
    W.addEventListener('resize', function () { if (W.innerWidth > 1023) setMenu(false); });
    D.addEventListener('keydown', function (e) { if (e.key === 'Escape') setMenu(false); });
  }

  /* ---------- Pencarian (modal + hasil langsung) ---------- */
  var sm = $('#fd-search'), smInput = $('#fd-search-input'), smList = $('#fd-search-list');
  var smLabel = $('[data-fd-search-label]'), smEmpty = $('[data-fd-search-empty]'), smTerm = $('[data-fd-search-term]');
  var smActive = 0, smLast = null, smResults = [];
  function norm(s) { return String(s).toLowerCase().replace(/[^a-z0-9\u00c0-\u024f\s]/g, ' ').replace(/\s+/g, ' ').trim(); }

  function smScore(p, q) {
    if (!q) return 1;
    var t = norm(p.title), sc = 0;
    if (t.indexOf(q) === 0) sc += 4; else if (t.indexOf(q) > -1) sc += 3;
    p.keys.forEach(function (k) { if (k.indexOf(q) > -1 || q.indexOf(k) > -1) sc += 2; });
    if (norm(p.desc).indexOf(q) > -1) sc += 1;
    return sc;
  }
  function smRender() {
    var q = norm(smInput.value);
    smResults = (FD.search || []).map(function (p) { return { p: p, s: smScore(p, q) }; })
      .filter(function (x) { return x.s > 0; })
      .sort(function (a, b) { return b.s - a.s; });
    smList.textContent = '';
    smLabel.textContent = q ? 'Hasil pencarian (' + smResults.length + ')' : 'Semua halaman';
    smEmpty.hidden = smResults.length > 0;
    smLabel.hidden = smResults.length === 0;
    if (!smResults.length && smTerm) smTerm.textContent = smInput.value.trim();
    if (smActive >= smResults.length) smActive = 0;
    smResults.forEach(function (x, i) {
      var li = D.createElement('li'), a = D.createElement('a');
      li.setAttribute('role', 'option'); li.id = 'fd-sr-' + i;
      li.setAttribute('aria-selected', i === smActive ? 'true' : 'false');
      if (i === smActive) li.className = 'is-active';
      a.href = x.p.url;
      var ico = D.createElement('span'); ico.className = 'fd-sm__ico'; ico.appendChild(svgIcon(x.p.icon));
      var txt = D.createElement('span'); txt.className = 'fd-sm__txt';
      var b = D.createElement('b'); b.textContent = x.p.title;
      var s = D.createElement('small'); s.textContent = x.p.desc;
      txt.appendChild(b); txt.appendChild(s);
      a.appendChild(ico); a.appendChild(txt); a.appendChild(svgIcon('arrow', 'fd-sm__go'));
      a.addEventListener('mousemove', function () { smSetActive(i, true); });
      li.appendChild(a); smList.appendChild(li);
    });
    smInput.setAttribute('aria-activedescendant', smResults.length ? 'fd-sr-' + smActive : '');
  }
  function smSetActive(i, noScroll) {
    if (!smResults.length) return;
    smActive = (i + smResults.length) % smResults.length;
    $$('li', smList).forEach(function (li, k) {
      li.classList.toggle('is-active', k === smActive);
      li.setAttribute('aria-selected', k === smActive ? 'true' : 'false');
    });
    smInput.setAttribute('aria-activedescendant', 'fd-sr-' + smActive);
    var cur = $('li.is-active', smList);
    if (cur && !noScroll && cur.scrollIntoView) cur.scrollIntoView({ block: 'nearest' });
  }
  function smOpen() {
    if (!sm) return;
    smLast = D.activeElement; smActive = 0;
    sm.hidden = false; root.classList.add('fd-lock');
    smInput.value = ''; smRender();
    setTimeout(function () { smInput.focus(); }, 30);
  }
  function smClose() {
    if (!sm || sm.hidden) return;
    sm.hidden = true; root.classList.remove('fd-lock');
    if (smLast && smLast.focus) smLast.focus();
  }
  if (sm && smInput && smList) {
    $$('[data-fd-search-open]').forEach(function (b) { b.addEventListener('click', smOpen); });
    $$('[data-fd-search-close]').forEach(function (b) { b.addEventListener('click', smClose); });
    $$('[data-fd-search-q]').forEach(function (b) {
      b.addEventListener('click', function () { smInput.value = b.getAttribute('data-fd-search-q'); smActive = 0; smRender(); smInput.focus(); });
    });
    smInput.addEventListener('input', function () { smActive = 0; smRender(); });
    smInput.addEventListener('keydown', function (e) {
      if (e.key === 'ArrowDown') { e.preventDefault(); smSetActive(smActive + 1); }
      else if (e.key === 'ArrowUp') { e.preventDefault(); smSetActive(smActive - 1); }
      else if (e.key === 'Enter') { e.preventDefault(); if (smResults[smActive]) W.location.href = smResults[smActive].p.url; }
    });
    var smAsk = $('[data-fd-search-ask]');
    if (smAsk) smAsk.addEventListener('click', function () { var q = smInput.value.trim(); smClose(); chatOpen(true, q || null); });
    D.addEventListener('keydown', function (e) {
      if (e.key === 'Escape') smClose();
      else if ((e.key === '/' && !isTyping(D.activeElement) && sm.hidden) || ((e.ctrlKey || e.metaKey) && e.key.toLowerCase() === 'k')) { e.preventDefault(); smOpen(); }
    });
  }

  /* ---------- Reveal saat scroll ---------- */
  var reveals = $$('.fd-reveal');
  if ('IntersectionObserver' in W && !reduced) {
    var ro = new IntersectionObserver(function (entries) {
      entries.forEach(function (en) { if (en.isIntersecting) { en.target.classList.add('is-in'); ro.unobserve(en.target); } });
    }, { threshold: 0.1, rootMargin: '0px 0px -30px 0px' });
    reveals.forEach(function (el, i) { el.style.setProperty('--d', ((i % 3) * 0.1) + 's'); ro.observe(el); });
  } else { reveals.forEach(function (el) { el.classList.add('is-in'); }); }

  /* ---------- Counter, bar & meter ---------- */
  function fmt(n) { try { return Number(n).toLocaleString('id-ID'); } catch (e) { return String(n); } }
  function runCount(el) {
    var target = parseFloat(el.getAttribute('data-fd-count')) || 0, suffix = el.getAttribute('data-suffix') || '';
    if (reduced) { el.textContent = fmt(target) + suffix; return; }
    var start = null, dur = 1700;
    function step(ts) {
      if (!start) start = ts;
      var p = Math.min((ts - start) / dur, 1), eased = 1 - Math.pow(1 - p, 3);
      el.textContent = fmt(Math.round(target * eased)) + suffix;
      if (p < 1) requestAnimationFrame(step);
    }
    requestAnimationFrame(step);
  }
  var animEls = $$('[data-fd-count], .fd-bars i[data-h], .fd-meter i[data-w]');
  function runAnim(el) {
    if (el.hasAttribute('data-fd-count')) runCount(el);
    else if (el.hasAttribute('data-h')) el.style.height = el.getAttribute('data-h') + '%';
    else if (el.hasAttribute('data-w')) el.style.width = el.getAttribute('data-w') + '%';
  }
  if ('IntersectionObserver' in W) {
    var ao = new IntersectionObserver(function (entries) {
      entries.forEach(function (en) { if (en.isIntersecting) { runAnim(en.target); ao.unobserve(en.target); } });
    }, { threshold: 0.3 });
    animEls.forEach(function (el) { ao.observe(el); });
  } else { animEls.forEach(runAnim); }

  /* ---------- Chatbot FAQ (program & donasi) ---------- */
  function waUrl(text) { return 'https://wa.me/' + (FD.wa || '') + (text ? '?text=' + encodeURIComponent(text) : ''); }

  function findAnswer(q) {
    var n = norm(q), best = null, bestScore = 0;
    if (/^(halo|hai|hi|hello|selamat)/.test(n)) return { a: FAQ.greeting };
    if (/(terima kasih|makasih|thanks)/.test(n)) return { a: 'Sama-sama! Semoga kebaikan Anda membawa perubahan besar. Ada hal lain yang ingin ditanyakan?' };
    FAQ.items.forEach(function (it) {
      var score = 0;
      if (norm(it.q) === n) score += 100;
      (it.keywords || []).forEach(function (k) { if (n.indexOf(norm(k)) > -1) score += 3; });
      norm(it.q).split(' ').forEach(function (w) { if (w.length > 3 && n.indexOf(w) > -1) score += 1; });
      if (score > bestScore) { bestScore = score; best = it; }
    });
    return best && bestScore >= 3 ? best : null;
  }

  function initChat(rootEl) {
    if (!rootEl) return null;
    if (rootEl.__fdChat) return rootEl.__fdChat;
    var body = $('.fd-chat__body', rootEl), chips = $('.fd-chat__chips', rootEl), form = $('form', rootEl), input = form && $('input', form);
    var avatarSrc = $('.fd-chat__avatar', rootEl);
    var greeted = false, suggest = null;

    function avatar() {
      var a = D.createElement('img');
      a.className = 'fd-line__av'; a.alt = ''; a.width = 32; a.height = 32;
      a.src = avatarSrc ? avatarSrc.getAttribute('src') : '';
      return a;
    }
    function add(role, text, link) {
      var row = D.createElement('div'); row.className = 'fd-line fd-line--' + role;
      if (role === 'bot') row.appendChild(avatar());
      var m = D.createElement('div'); m.className = 'fd-msg fd-msg--' + role;
      m.textContent = text;
      if (link) {
        var a = D.createElement('a'); a.className = 'fd-msg__act';
        a.href = link.href; a.textContent = link.label;
        if (link.external) { a.target = '_blank'; a.rel = 'noopener'; }
        a.appendChild(svgIcon('arrow'));
        m.appendChild(D.createElement('br')); m.appendChild(a);
      }
      row.appendChild(m); body.appendChild(row);
      body.scrollTop = body.scrollHeight;
      return row;
    }
    function reply(q) {
      var row = D.createElement('div'); row.className = 'fd-line'; row.appendChild(avatar());
      var t = D.createElement('div'); t.className = 'fd-msg fd-msg--bot fd-typing'; t.innerHTML = '<i></i><i></i><i></i>';
      row.appendChild(t); body.appendChild(row); body.scrollTop = body.scrollHeight;
      setTimeout(function () {
        row.remove();
        var hit = findAnswer(q);
        if (hit && hit.link && FD.links && FD.links[hit.link]) add('bot', hit.a, { href: FD.links[hit.link], label: 'Buka halaman terkait' });
        else if (hit) add('bot', hit.a);
        else add('bot', FAQ.fallback, { href: waUrl('Halo, saya ingin bertanya: ' + q), label: 'Tanya via WhatsApp', external: true });
      }, reduced ? 0 : 650 + Math.random() * 350);
    }
    function ask(q) {
      q = String(q || '').trim(); if (!q) return;
      if (suggest) { suggest.remove(); suggest = null; }
      add('me', q); reply(q);
    }
    function greet() {
      if (greeted) return; greeted = true;
      var w = D.createElement('div'); w.className = 'fd-welcome';
      var im = D.createElement('img'); im.src = rootEl.getAttribute('data-robot') || ''; im.alt = ''; im.width = 84;
      var tx = D.createElement('div');
      var h = D.createElement('b'); h.textContent = 'Halo! Saya HarapanBot!';
      var pp = D.createElement('p'); pp.textContent = 'Saya siap membantu Anda seputar program kami dan donasi. Pilih topik di bawah atau ketik pertanyaan Anda.';
      tx.appendChild(h); tx.appendChild(pp); w.appendChild(im); w.appendChild(tx); body.appendChild(w);
      suggest = D.createElement('div'); suggest.className = 'fd-topics';
      FAQ.quick.forEach(function (q, i) {
        var b = D.createElement('button'); b.type = 'button';
        var ic = D.createElement('span'); ic.className = 'fd-qbtn__ico'; ic.appendChild(svgIcon(ICONS[i % ICONS.length]));
        var t = D.createElement('span'); t.textContent = q;
        b.appendChild(ic); b.appendChild(t);
        b.addEventListener('click', function () { ask(q); });
        suggest.appendChild(b);
        var c = D.createElement('button'); c.type = 'button'; c.className = 'fd-chip'; c.textContent = q;
        c.addEventListener('click', function () { ask(q); });
        chips.appendChild(c);
      });
      body.appendChild(suggest);
    }
    function reset() { body.textContent = ''; chips.textContent = ''; greeted = false; suggest = null; greet(); }
    var rb = $('[data-fd-chat-reset]', rootEl);
    if (rb) rb.addEventListener('click', reset);
    if (form) form.addEventListener('submit', function (e) { e.preventDefault(); var v = input.value; input.value = ''; ask(v); });
    rootEl.__fdChat = { ask: ask, greet: greet, focus: function () { if (input) input.focus(); } };
    return rootEl.__fdChat;
  }

  var floatChat = $('#fd-chat'), toggleBtn = $('[data-fd-chat-toggle]'), hint = $('[data-fd-hint]');
  function hideHint() { if (hint) hint.hidden = true; }
  function chatOpen(open, question) {
    if (!floatChat || !toggleBtn) return;
    floatChat.hidden = !open;
    D.body.classList.toggle('fd-chat-open', open);
    toggleBtn.setAttribute('aria-expanded', open ? 'true' : 'false');
    if (open) {
      hideHint();
      var c = initChat(floatChat); c.greet();
      if (question) c.ask(question);
      setTimeout(c.focus, 80);
    }
  }
  if (floatChat && toggleBtn) {
    toggleBtn.addEventListener('click', function () { chatOpen(floatChat.hidden); });
    var closeBtn = $('[data-fd-chat-close]', floatChat);
    if (closeBtn) closeBtn.addEventListener('click', function () { chatOpen(false); toggleBtn.focus(); });
    D.addEventListener('keydown', function (e) {
      if (e.key === 'Escape' && !floatChat.hidden && (!sm || sm.hidden)) { chatOpen(false); toggleBtn.focus(); }
    });
  }
  $$('[data-fd-chat-ask]').forEach(function (b) {
    b.addEventListener('click', function () { if (floatChat) chatOpen(true, b.getAttribute('data-fd-chat-ask')); });
  });
  $$('[data-fd-chat-form]').forEach(function (f) {
    f.addEventListener('submit', function (e) {
      e.preventDefault();
      var i = $('input', f), v = i.value.trim();
      i.value = '';
      chatOpen(true, v || null);
    });
  });
  $$('[data-fd-chat-inline]').forEach(function (r) { initChat(r).greet(); });
  $$('[data-fd-inline-ask]').forEach(function (b) {
    b.addEventListener('click', function () {
      var r = $('[data-fd-chat-inline]'); if (!r) return;
      initChat(r).ask(b.getAttribute('data-fd-inline-ask'));
      r.scrollIntoView({ behavior: reduced ? 'auto' : 'smooth', block: 'center' });
    });
  });

  /* ---------- Sapaan HarapanBot (sekali per sesi) ---------- */
  if (hint && floatChat) {
    var shown = false;
    try { shown = sessionStorage.getItem('fd-hint') === '1'; } catch (e) {}
    var hc = $('[data-fd-hint-close]', hint);
    if (hc) hc.addEventListener('click', hideHint);
    $$('button[data-fd-chat-ask]', hint).forEach(function (b) { b.addEventListener('click', hideHint); });
    if (!shown) {
      setTimeout(function () {
        if (floatChat.hidden && (!sm || sm.hidden)) {
          hint.hidden = false;
          try { sessionStorage.setItem('fd-hint', '1'); } catch (e) {}
          setTimeout(hideHint, 14000);
        }
      }, 4500);
    }
  }

  /* ---------- Filter berita ---------- */
  $$('[data-fd-filter]').forEach(function (group) {
    var chipsF = $$('.fd-chip', group), items = $$('.fd-ncard');
    chipsF.forEach(function (c) {
      c.addEventListener('click', function () {
        var cat = c.getAttribute('data-cat');
        chipsF.forEach(function (x) { x.classList.toggle('is-active', x === c); x.setAttribute('aria-pressed', x === c ? 'true' : 'false'); });
        items.forEach(function (it) { it.hidden = !(cat === 'all' || it.getAttribute('data-cat') === cat); });
      });
    });
  });


  /* ---------- Dropdown pilihan (pengganti <select> bawaan) ---------- */
  function enhanceSelect(sel) {
    if (sel.__fd) return; sel.__fd = true;
    var wrap = D.createElement('div'); wrap.className = 'fd-sel';
    sel.parentNode.insertBefore(wrap, sel); wrap.appendChild(sel);
    sel.classList.add('fd-sel__native'); sel.tabIndex = -1; sel.setAttribute('aria-hidden', 'true');
    var btn = D.createElement('button'); btn.type = 'button'; btn.className = 'fd-sel__btn';
    btn.setAttribute('aria-haspopup', 'listbox'); btn.setAttribute('aria-expanded', 'false');
    var label = D.createElement('span'); btn.appendChild(label); btn.appendChild(svgIcon('chevron', 'fd-sel__chev'));
    var panel = D.createElement('div'); panel.className = 'fd-sel__panel'; panel.setAttribute('role', 'listbox');
    var opts = [];
    Array.prototype.forEach.call(sel.options, function (o, i) {
      var b = D.createElement('button'); b.type = 'button'; b.className = 'fd-sel__opt' + (o.value === '' ? ' is-empty' : '');
      b.setAttribute('role', 'option'); b.tabIndex = -1;
      var t = D.createElement('span'); t.textContent = o.text; b.appendChild(t); b.appendChild(svgIcon('check'));
      b.addEventListener('click', function () { pick(i); });
      panel.appendChild(b); opts.push(b);
    });
    wrap.appendChild(btn); wrap.appendChild(panel); sel.__fdBtn = btn;
    var lab = sel.id && D.querySelector('label[for="' + sel.id + '"]');
    if (lab) lab.addEventListener('click', function (e) { e.preventDefault(); btn.focus(); });
    function sync() {
      var o = sel.options[sel.selectedIndex];
      label.textContent = o ? o.text : '';
      btn.classList.toggle('is-placeholder', !sel.value);
      opts.forEach(function (b, i) { b.setAttribute('aria-selected', i === sel.selectedIndex ? 'true' : 'false'); });
    }
    function open(o) {
      wrap.classList.toggle('is-open', o); btn.setAttribute('aria-expanded', o ? 'true' : 'false');
      if (o) { var cur = opts[sel.selectedIndex] || opts[0]; if (cur) { cur.classList.add('is-active'); if (cur.scrollIntoView) cur.scrollIntoView({ block: 'nearest' }); } }
      else opts.forEach(function (b) { b.classList.remove('is-active'); });
    }
    function pick(i) {
      sel.selectedIndex = i; sync(); open(false); btn.focus();
      sel.dispatchEvent(new Event('input', { bubbles: true })); sel.dispatchEvent(new Event('change', { bubbles: true }));
    }
    function move(d) {
      var idx = opts.findIndex(function (b) { return b.classList.contains('is-active'); });
      idx = Math.max(0, Math.min(opts.length - 1, (idx < 0 ? sel.selectedIndex : idx) + d));
      opts.forEach(function (b, k) { b.classList.toggle('is-active', k === idx); });
      if (opts[idx].scrollIntoView) opts[idx].scrollIntoView({ block: 'nearest' });
    }
    btn.addEventListener('click', function () { open(!wrap.classList.contains('is-open')); });
    btn.addEventListener('keydown', function (e) {
      var isOpen = wrap.classList.contains('is-open');
      if (e.key === 'ArrowDown' || e.key === 'ArrowUp') { e.preventDefault(); if (!isOpen) open(true); else move(e.key === 'ArrowDown' ? 1 : -1); }
      else if ((e.key === 'Enter' || e.key === ' ') && isOpen) { e.preventDefault(); var a = opts.findIndex(function (b) { return b.classList.contains('is-active'); }); pick(a < 0 ? sel.selectedIndex : a); }
      else if (e.key === 'Escape' && isOpen) { e.preventDefault(); e.stopPropagation(); open(false); }
      else if (e.key === 'Tab') open(false);
    });
    D.addEventListener('click', function (e) { if (!wrap.contains(e.target)) open(false); });
    sel.addEventListener('change', sync);
    sync();
  }
  $$('.fd-input select').forEach(enhanceSelect);

  /* ---------- Form statis → WhatsApp ---------- */
  var emailRe = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  $$('[data-fd-wa-form]').forEach(function (form) {
    var ok = $('[data-fd-form-ok]', form);
    var qs = new URLSearchParams(W.location.search), jenis = qs.get('jenis');
    if (jenis) { var r = $('input[name="jenis"][value="' + jenis.replace(/[^a-z]/g, '') + '"]', form); if (r) r.checked = true; }
    var custom = $('input[name="nominal_lain"]', form);
    if (custom) {
      custom.addEventListener('input', function () {
        custom.value = custom.value.replace(/[^0-9]/g, '');
        if (custom.value) $$('input[name="nominal"]', form).forEach(function (x) { x.checked = false; });
      });
      $$('input[name="nominal"]', form).forEach(function (x) { x.addEventListener('change', function () { custom.value = ''; }); });
    }

    var sum = $('[data-fd-summary]', form), panels = $$('[data-fd-for]', form);
    var bar = $('[data-fd-progress-bar]', form), ptxt = $('[data-fd-progress-text]', form);
    var HINTS = {
      sekarang: 'Donasi sekali waktu, langsung tersalurkan ke program prioritas.',
      rutin: 'Berbagi setiap bulan — atur nominal, tanggal, dan durasi sesuai kemampuan Anda.',
      barang: 'Salurkan buku, pakaian layak, alat kesehatan, atau kebutuhan pokok langsung ke penerima.',
      program: 'Pilih program tematik yang ingin Anda dukung, lalu tentukan nominalnya.'
    };
    function curType() { var j = $('input[name="jenis"]:checked', form); return j ? j.value : 'sekarang'; }
    function applyType() {
      if (!panels.length) return;
      var t = curType();
      panels.forEach(function (p) {
        var on = p.getAttribute('data-fd-for').split(' ').indexOf(t) > -1;
        if (p.hidden === on) { p.hidden = !on; if (on) { p.classList.remove('fd-dyn--in'); void p.offsetWidth; p.classList.add('fd-dyn--in'); } }
        $$('input,select,textarea', p).forEach(function (c) { c.disabled = !on; });
      });
      var nt = $('[data-fd-nominal-title]', form), pt = $('[data-fd-prog-title]', form), th = $('[data-fd-typehint]', form);
      if (nt) nt.textContent = t === 'rutin' ? 'Nominal per bulan' : (t === 'program' ? 'Nominal donasi program' : 'Pilih nominal');
      if (pt) pt.textContent = t === 'program' ? 'Pilih program tematik' : 'Arahkan ke program';
      if (th) th.textContent = HINTS[t] || '';
      var n = 0;
      $$('.fd-step__n', form).forEach(function (el) {
        var host = el.closest('[data-fd-for]');
        if (host && host.hidden) return;
        el.textContent = ++n;
      });
    }
    function updSummary() {
      if (!sum) return;
      var t = curType(), j = $('input[name="jenis"]:checked', form), title = j ? j.getAttribute('data-v') : '-';
      var n = $('input[name="nominal"]:checked', form), pr = $('select[name="program"]', form);
      var amt = custom && custom.value ? Number(custom.value) : (n ? Number(n.value) : 0);
      var txt;
      if (t === 'barang') {
        var br = $('input[name="barang"]:checked', form), me = $('input[name="metode"]:checked', form);
        txt = title + ' · ' + (br ? br.value : '-') + ' · ' + (me ? me.value : '-');
      } else if (t === 'rutin') {
        var tg = $('select[name="tanggal"]', form), du = $('input[name="durasi"]:checked', form);
        txt = title + ' · ' + (amt ? 'Rp ' + fmt(amt) + '/bulan' : 'nominal belum dipilih') + ' · ' + (tg ? tg.value : '-') + ' · ' + (du ? du.value : '-');
      } else {
        txt = title + ' · ' + (amt ? 'Rp ' + fmt(amt) : 'nominal belum dipilih') + (pr ? ' · ' + pr.value : '');
      }
      sum.textContent = txt;
    }
    function updProgress() {
      if (!bar) return;
      var req = $$('[required]', form).filter(function (c) { return !c.disabled; });
      var done = req.filter(function (c) {
        if (c.type === 'email' && !emailRe.test(c.value)) return false;
        if (c.type === 'tel' && c.value.replace(/\D/g, '').length < 9) return false;
        return c.value.trim() !== '';
      }).length;
      var pct = req.length ? Math.round(done / req.length * 100) : 100;
      bar.style.width = pct + '%';
      bar.parentNode.parentNode.classList.toggle('is-done', pct === 100);
      if (ptxt) ptxt.textContent = pct === 100 ? 'Semua data wajib terisi — siap dikirim' : done + ' dari ' + req.length + ' data wajib terisi';
    }
    function refresh() { applyType(); updSummary(); updProgress(); }
    form.addEventListener('change', refresh); form.addEventListener('input', refresh); refresh();

    form.addEventListener('submit', function (e) {
      e.preventDefault();
      var firstBad = null;
      $$('.fd-field', form).forEach(function (f) {
        var host = f.closest('[data-fd-for]');
        if (host && host.hidden) { f.classList.remove('is-invalid'); return; }
        var c = $('input:not([type=radio]):not([type=checkbox]), select, textarea', f);
        if (!c || c.disabled) return;
        var bad = c.hasAttribute('required') && !c.value.trim();
        if (!bad && c.type === 'email' && c.value && !emailRe.test(c.value)) bad = true;
        if (!bad && c.type === 'tel' && c.value && c.value.replace(/\D/g, '').length < 9) bad = true;
        f.classList.toggle('is-invalid', bad);
        if (bad && !firstBad) firstBad = c;
      });
      if (firstBad) { (firstBad.__fdBtn || firstBad).focus(); toast('Mohon lengkapi data yang ditandai.'); return; }

      var lines = [form.getAttribute('data-title') || 'Halo Harapan Untuk Negeri Foundation', ''];
      var nominalLain = custom && custom.value ? Number(custom.value) : 0;
      $$('[name][data-label]', form).forEach(function (c) {
        if (c.disabled || ((c.type === 'radio' || c.type === 'checkbox') && !c.checked)) return;
        var v = (c.getAttribute('data-v') || c.value).trim();
        if (c.name === 'nominal_lain') { if (!v) return; v = 'Rp ' + fmt(nominalLain); }
        else if (c.name === 'nominal') { v = 'Rp ' + fmt(v); }
        if (v) lines.push(c.getAttribute('data-label') + ': ' + v);
      });
      if (ok) ok.hidden = false;
      toast('Mengarahkan ke WhatsApp…');
      var win = W.open(waUrl(lines.join('\n')), '_blank', 'noopener');
      if (!win) W.location.href = waUrl(lines.join('\n'));
    });
    form.addEventListener('input', function (e) {
      var f = e.target.closest && e.target.closest('.fd-field'); if (f) f.classList.remove('is-invalid');
    });
  });
})();
