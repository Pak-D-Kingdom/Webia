/* ==========================================================================
   Foundation — Professional · Classic Trust  |  WEBIA by D-KREASI
   Vanilla JS tanpa dependensi. Data dari window.FD (dirender di layout.blade.php)
   ========================================================================== */
(function () {
  'use strict';

  var D = document, W = window;
  var $ = function (s, c) { return (c || D).querySelector(s); };
  var $$ = function (s, c) { return Array.prototype.slice.call((c || D).querySelectorAll(s)); };
  var FD = W.FD || {};
  var FAQ = FD.faq || { items: [], quick: [], greeting: '', fallback: '' };
  var reduced = W.matchMedia && W.matchMedia('(prefers-reduced-motion: reduce)').matches;

  D.documentElement.classList.add('fd-js');

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
    toastTimer = setTimeout(function () { toastEl.classList.remove('is-show'); }, 2800);
  }
  $$('[data-fd-toast]').forEach(function (el) {
    el.addEventListener('click', function (e) { e.preventDefault(); toast(el.getAttribute('data-fd-toast')); });
  });

  /* ---------- Header: shadow saat scroll ---------- */
  var header = $('[data-fd-header]');
  function onScroll() { if (header) header.classList.toggle('is-scrolled', W.scrollY > 8); }
  onScroll();
  W.addEventListener('scroll', onScroll, { passive: true });

  /* ---------- Dropdown topbar ---------- */
  $$('[data-fd-drop]').forEach(function (drop) {
    var btn = $('.fd-drop__btn', drop);
    function set(open) { drop.classList.toggle('is-open', open); btn.setAttribute('aria-expanded', open ? 'true' : 'false'); }
    btn.addEventListener('click', function (e) { e.stopPropagation(); set(!drop.classList.contains('is-open')); });
    D.addEventListener('click', function (e) { if (!drop.contains(e.target)) set(false); });
    D.addEventListener('keydown', function (e) { if (e.key === 'Escape') set(false); });
  });

  /* ---------- Menu mobile ---------- */
  var burger = $('[data-fd-burger]'), menu = $('#fd-menu');
  function setMenu(open) {
    if (!burger || !menu) return;
    menu.classList.toggle('is-open', open);
    burger.setAttribute('aria-expanded', open ? 'true' : 'false');
    var use = $('use', burger);
    if (use) use.setAttribute('href', open ? '#fd-i-close' : '#fd-i-menu');
  }
  if (burger && menu) {
    burger.addEventListener('click', function () { setMenu(!menu.classList.contains('is-open')); });
    $$('a', menu).forEach(function (a) { a.addEventListener('click', function () { setMenu(false); }); });
    W.addEventListener('resize', function () { if (W.innerWidth > 1040) setMenu(false); });
    D.addEventListener('keydown', function (e) { if (e.key === 'Escape') setMenu(false); });
  }

  /* ---------- Pencarian (navigasi ke halaman terkait) ---------- */
  var searchBox = $('#fd-search'), searchBtn = $('[data-fd-search-toggle]');
  if (searchBox && searchBtn) {
    searchBtn.addEventListener('click', function () {
      var open = !searchBox.classList.contains('is-open');
      searchBox.classList.toggle('is-open', open);
      searchBtn.setAttribute('aria-expanded', open ? 'true' : 'false');
      if (open) { var i = $('input', searchBox); if (i) setTimeout(function () { i.focus(); }, 50); }
    });
    D.addEventListener('keydown', function (e) {
      if (e.key === 'Escape' && searchBox.classList.contains('is-open')) { searchBox.classList.remove('is-open'); searchBtn.focus(); }
    });
    $('form', searchBox).addEventListener('submit', function (e) {
      e.preventDefault();
      var q = $('input', searchBox).value.trim().toLowerCase();
      if (!q) return;
      var hit = (FD.search || []).filter(function (p) {
        return p.keys.some(function (k) { return q.indexOf(k) > -1 || k.indexOf(q) > -1; });
      })[0];
      if (hit) { W.location.href = hit.url; } else { toast('Tidak ada halaman yang cocok. Coba kata kunci lain, misalnya "donasi" atau "relawan".'); }
    });
  }

  /* ---------- Reveal saat scroll ---------- */
  var reveals = $$('.fd-reveal');
  if ('IntersectionObserver' in W && !reduced) {
    var ro = new IntersectionObserver(function (entries) {
      entries.forEach(function (en) { if (en.isIntersecting) { en.target.classList.add('is-in'); ro.unobserve(en.target); } });
    }, { threshold: 0.12, rootMargin: '0px 0px -40px 0px' });
    reveals.forEach(function (el, i) { el.style.setProperty('--d', ((i % 4) * 0.08) + 's'); ro.observe(el); });
  } else { reveals.forEach(function (el) { el.classList.add('is-in'); }); }

  /* ---------- Counter, bar & meter ---------- */
  function fmt(n) { try { return Number(n).toLocaleString('id-ID'); } catch (e) { return String(n); } }
  function runCount(el) {
    var target = parseFloat(el.getAttribute('data-fd-count')) || 0, suffix = el.getAttribute('data-suffix') || '';
    if (reduced) { el.textContent = fmt(target) + suffix; return; }
    var start = null, dur = 1600;
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

  /* ---------- WhatsApp: tooltip sapaan ---------- */
  var tip = $('[data-fd-wa-tip]');
  if (tip) {
    var seen = false;
    try { seen = sessionStorage.getItem('fd-wa-tip') === '1'; } catch (e) {}
    if (!seen) {
      setTimeout(function () { tip.classList.add('is-show'); }, 5000);
      setTimeout(function () { tip.classList.remove('is-show'); }, 15000);
      try { sessionStorage.setItem('fd-wa-tip', '1'); } catch (e) {}
    }
    var tc = $('button', tip);
    if (tc) tc.addEventListener('click', function (e) { e.preventDefault(); e.stopPropagation(); tip.classList.remove('is-show'); });
  }

  /* ---------- Chatbot FAQ (program & donasi) ---------- */
  function norm(s) { return String(s).toLowerCase().replace(/[^a-z0-9\u00c0-\u024f\s]/g, ' ').replace(/\s+/g, ' ').trim(); }
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

  function initChat(root) {
    if (!root || root.__fdChat) return root && root.__fdChat;
    var body = $('.fd-chat__body', root), chips = $('.fd-chat__chips', root), form = $('form', root), input = form && $('input', form);
    var greeted = false;

    function add(role, text, link) {
      var m = D.createElement('div');
      m.className = 'fd-msg fd-msg--' + role;
      m.textContent = text;
      if (link) {
        var a = D.createElement('a');
        a.href = link.href; a.textContent = link.label;
        if (link.external) { a.target = '_blank'; a.rel = 'noopener'; }
        m.appendChild(D.createElement('br')); m.appendChild(a);
      }
      body.appendChild(m);
      body.scrollTop = body.scrollHeight;
      return m;
    }
    function reply(q) {
      var t = D.createElement('div');
      t.className = 'fd-msg fd-msg--bot fd-typing';
      t.innerHTML = '<i></i><i></i><i></i>';
      body.appendChild(t); body.scrollTop = body.scrollHeight;
      setTimeout(function () {
        t.remove();
        var hit = findAnswer(q);
        if (hit && hit.link && FD.links && FD.links[hit.link]) add('bot', hit.a, { href: FD.links[hit.link], label: 'Buka halaman terkait' });
        else if (hit) add('bot', hit.a);
        else add('bot', FAQ.fallback, { href: waUrl('Halo, saya ingin bertanya: ' + q), label: 'Tanya via WhatsApp', external: true });
      }, reduced ? 0 : 650 + Math.random() * 350);
    }
    function ask(q) { q = String(q || '').trim(); if (!q) return; add('me', q); reply(q); }
    function greet() {
      if (greeted) return; greeted = true;
      add('bot', FAQ.greeting);
      FAQ.quick.forEach(function (q) {
        var b = D.createElement('button');
        b.type = 'button'; b.className = 'fd-chip'; b.textContent = q;
        b.addEventListener('click', function () { ask(q); });
        chips.appendChild(b);
      });
    }
    if (form) form.addEventListener('submit', function (e) { e.preventDefault(); var v = input.value; input.value = ''; ask(v); });
    root.__fdChat = { ask: ask, greet: greet, focus: function () { if (input) input.focus(); } };
    return root.__fdChat;
  }

  var floatChat = $('#fd-chat'), toggleBtn = $('[data-fd-chat-toggle]');
  function chatOpen(open, question) {
    if (!floatChat || !toggleBtn) return;
    floatChat.hidden = !open;
    toggleBtn.classList.toggle('is-open', open);
    toggleBtn.setAttribute('aria-expanded', open ? 'true' : 'false');
    if (open) {
      var c = initChat(floatChat); c.greet();
      if (question) c.ask(question);
      setTimeout(c.focus, 60);
    }
  }
  if (floatChat && toggleBtn) {
    toggleBtn.addEventListener('click', function () { chatOpen(floatChat.hidden); });
    var closeBtn = $('[data-fd-chat-close]', floatChat);
    if (closeBtn) closeBtn.addEventListener('click', function () { chatOpen(false); toggleBtn.focus(); });
    D.addEventListener('keydown', function (e) { if (e.key === 'Escape' && !floatChat.hidden) { chatOpen(false); toggleBtn.focus(); } });
  }
  $$('[data-fd-chat-ask]').forEach(function (b) {
    b.addEventListener('click', function () {
      var q = b.getAttribute('data-fd-chat-ask');
      if (floatChat) chatOpen(true, q);
    });
  });
  $$('[data-fd-chat-form]').forEach(function (f) {
    f.addEventListener('submit', function (e) {
      e.preventDefault();
      var i = $('input', f), v = i.value.trim();
      i.value = '';
      chatOpen(true, v || null);
    });
  });
  $$('[data-fd-chat-inline]').forEach(function (r) { var c = initChat(r); c.greet(); });
  $$('[data-fd-inline-ask]').forEach(function (b) {
    b.addEventListener('click', function () {
      var r = $('[data-fd-chat-inline]'); if (!r) return;
      initChat(r).ask(b.getAttribute('data-fd-inline-ask'));
      r.scrollIntoView({ behavior: reduced ? 'auto' : 'smooth', block: 'center' });
    });
  });

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

  /* ---------- Form statis → WhatsApp ---------- */
  var emailRe = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  $$('[data-fd-wa-form]').forEach(function (form) {
    var ok = $('[data-fd-form-ok]', form);

    // Donasi: jenis dari ?jenis= , nominal bebas membatalkan pilihan nominal cepat
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

    form.addEventListener('submit', function (e) {
      e.preventDefault();
      var firstBad = null;
      $$('.fd-field', form).forEach(function (f) {
        var c = $('input:not([type=radio]):not([type=checkbox]), select, textarea', f);
        if (!c) return;
        var bad = c.hasAttribute('required') && !c.value.trim();
        if (!bad && c.type === 'email' && c.value && !emailRe.test(c.value)) bad = true;
        if (!bad && c.type === 'tel' && c.value && c.value.replace(/\D/g, '').length < 9) bad = true;
        f.classList.toggle('is-invalid', bad);
        if (bad && !firstBad) firstBad = c;
      });
      if (firstBad) { firstBad.focus(); toast('Mohon lengkapi data yang ditandai.'); return; }

      var lines = [form.getAttribute('data-title') || 'Halo Harapan Untuk Negeri Foundation', ''];
      var nominalLain = custom && custom.value ? Number(custom.value) : 0;
      $$('[name][data-label]', form).forEach(function (c) {
        if ((c.type === 'radio' || c.type === 'checkbox') && !c.checked) return;
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
