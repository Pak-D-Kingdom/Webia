/* Eventora — Event Organizer · Bold · Sunset Gradient */
(function () {
  'use strict';

  var doc = document;
  var $ = function (s, r) { return (r || doc).querySelector(s); };
  var $$ = function (s, r) { return Array.prototype.slice.call((r || doc).querySelectorAll(s)); };
  var reduce = window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches;
  var CHECK = '<svg class="ic xs" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M20 6 9 17l-5-5"/></svg>';
  var CHEVD = '<svg class="ic xs" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="m6 9 6 6 6-6"/></svg>';
  var ARROW = '<svg class="ic xs" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M5 12h14M13 6l6 6-6 6"/></svg>';

  doc.body.classList.add('js');

  var data = { faq: [], search: [], wa: '' };
  try { data = JSON.parse($('#eo-data').textContent) || data; } catch (e) { /* data kosong */ }

  var openChat = null;
  var closeSearchFn = null;
  var closeChatFn = null;

  /* ---------- navbar: sticky + menu mobile ---------- */
  var nav = $('#nav');
  var onScroll = function () { if (nav) nav.classList.toggle('is-stuck', window.scrollY > 40); };
  window.addEventListener('scroll', onScroll, { passive: true });
  onScroll();

  var burger = $('#burger');
  var menu = $('#menu');
  function setMenu(open) {
    if (!burger || !menu) return;
    menu.classList.toggle('is-open', open);
    burger.setAttribute('aria-expanded', open ? 'true' : 'false');
    burger.setAttribute('aria-label', open ? 'Tutup menu' : 'Buka menu');
  }
  if (burger && menu) {
    burger.addEventListener('click', function () { setMenu(!menu.classList.contains('is-open')); });
    $$('a', menu).forEach(function (a) { a.addEventListener('click', function () { setMenu(false); }); });
    doc.addEventListener('click', function (e) {
      if (menu.classList.contains('is-open') && !menu.contains(e.target) && !burger.contains(e.target)) setMenu(false);
    });
    window.addEventListener('resize', function () { if (window.innerWidth > 1180) setMenu(false); });
  }

  /* ---------- dropdown bahasa (topbar) ---------- */
  var lang = $('[data-lang]');
  if (lang) {
    doc.addEventListener('click', function (e) { if (lang.open && !lang.contains(e.target)) lang.open = false; });
  }

  /* ---------- partikel cahaya ---------- */
  if (!reduce) {
    $$('[data-sparks]').forEach(function (box) {
      for (var i = 0; i < 18; i++) {
        var s = doc.createElement('i');
        s.style.left = (Math.random() * 100).toFixed(1) + '%';
        s.style.setProperty('--s', (4 + Math.random() * 7).toFixed(1) + 'px');
        s.style.setProperty('--d', (7 + Math.random() * 9).toFixed(1) + 's');
        s.style.setProperty('--l', (-Math.random() * 12).toFixed(1) + 's');
        box.appendChild(s);
      }
    });
  }

  /* ---------- slider portofolio ---------- */
  $$('[data-slider]').forEach(function (el) {
    var slides = $$('.slide', el);
    var dots = $$('.sl-dots i', el);
    var i = 0, timer = null;
    if (slides.length < 2) return;
    function go(n) {
      slides[i].classList.remove('is-on');
      if (dots[i]) dots[i].classList.remove('is-on');
      i = (n + slides.length) % slides.length;
      slides[i].classList.add('is-on');
      if (dots[i]) dots[i].classList.add('is-on');
    }
    function stop() { if (timer) { clearInterval(timer); timer = null; } }
    function start() { if (!reduce) { stop(); timer = setInterval(function () { go(i + 1); }, 5000); } }
    var prev = $('[data-prev]', el), next = $('[data-next]', el);
    if (prev) prev.addEventListener('click', function () { go(i - 1); start(); });
    if (next) next.addEventListener('click', function () { go(i + 1); start(); });
    el.addEventListener('mouseenter', stop);
    el.addEventListener('mouseleave', start);
    start();
  });

  /* ---------- filter portofolio ---------- */
  var filters = $$('[data-filter]');
  filters.forEach(function (btn) {
    btn.addEventListener('click', function () {
      var f = btn.getAttribute('data-filter');
      filters.forEach(function (b) {
        b.classList.toggle('is-on', b === btn);
        b.setAttribute('aria-pressed', b === btn ? 'true' : 'false');
      });
      $$('.g-item').forEach(function (it) {
        var show = f === 'all' || it.getAttribute('data-cat') === f;
        it.classList.toggle('is-hidden', !show);
        if (show) it.classList.add('is-in');
      });
    });
  });

  /* ---------- reveal saat scroll (berurutan) ---------- */
  var rev = $$('[data-reveal]');
  if (rev.length) {
    if ('IntersectionObserver' in window && !reduce) {
      var io = new IntersectionObserver(function (es) {
        es.forEach(function (e) { if (e.isIntersecting) { e.target.classList.add('is-in'); io.unobserve(e.target); } });
      }, { threshold: 0.12, rootMargin: '0px 0px -40px 0px' });
      rev.forEach(function (r) {
        var n = 0, sib = r.previousElementSibling;
        while (sib) { if (sib.hasAttribute('data-reveal')) n++; sib = sib.previousElementSibling; }
        r.style.transitionDelay = ((n % 4) * 90) + 'ms';
        io.observe(r);
      });
    } else {
      rev.forEach(function (r) { r.classList.add('is-in'); });
    }
  }

  /* ---------- dropdown kustom (select[data-dd]) ---------- */
  function enhanceSelect(sel) {
    var wrap = doc.createElement('div');
    wrap.className = 'dd';
    sel.parentNode.insertBefore(wrap, sel);
    wrap.appendChild(sel);
    sel.classList.add('dd-native');
    sel.tabIndex = -1;
    sel.setAttribute('aria-hidden', 'true');

    var btn = doc.createElement('button');
    btn.type = 'button';
    btn.className = 'dd-btn';
    btn.setAttribute('aria-haspopup', 'listbox');
    btn.setAttribute('aria-expanded', 'false');
    var val = doc.createElement('span');
    val.className = 'dd-val';
    btn.appendChild(val);
    btn.insertAdjacentHTML('beforeend', CHEVD);
    var list = doc.createElement('ul');
    list.className = 'dd-list';
    list.setAttribute('role', 'listbox');
    list.hidden = true;
    var lbl = sel.id ? $('label[for="' + sel.id + '"]') : null;
    if (lbl) {
      lbl.addEventListener('click', function (e) { e.preventDefault(); btn.focus(); });
      if (!lbl.id) lbl.id = sel.id + '-lbl';
      btn.setAttribute('aria-labelledby', lbl.id);
      list.setAttribute('aria-labelledby', lbl.id);
    }

    var opts = [];
    var act = 0;
    Array.prototype.forEach.call(sel.options, function (o, idx) {
      var li = doc.createElement('li');
      li.className = 'dd-opt';
      li.setAttribute('role', 'option');
      li.appendChild(doc.createTextNode(o.textContent));
      li.insertAdjacentHTML('beforeend', CHECK);
      li.addEventListener('mousedown', function (e) { e.preventDefault(); });
      li.addEventListener('click', function () { choose(idx); btn.focus(); });
      li.addEventListener('mousemove', function () { setAct(idx, false); });
      list.appendChild(li);
      opts.push(li);
    });
    wrap.appendChild(btn);
    wrap.appendChild(list);

    function sync() {
      var o = sel.options[sel.selectedIndex];
      val.textContent = o ? o.textContent : '';
      btn.classList.toggle('is-ph', !sel.value);
      opts.forEach(function (li, i) {
        var on = i === sel.selectedIndex;
        li.classList.toggle('is-sel', on);
        li.setAttribute('aria-selected', on ? 'true' : 'false');
      });
    }
    function setAct(i, scroll) {
      act = Math.max(0, Math.min(opts.length - 1, i));
      opts.forEach(function (li, k) { li.classList.toggle('is-act', k === act); });
      if (scroll !== false && opts[act].scrollIntoView) opts[act].scrollIntoView({ block: 'nearest' });
    }
    function isOpen() { return !list.hidden; }
    function open() {
      $$('.dd.is-open').forEach(function (d) { if (d !== wrap) d.querySelector('.dd-btn').dispatchEvent(new Event('dd-close')); });
      list.hidden = false;
      wrap.classList.add('is-open');
      btn.setAttribute('aria-expanded', 'true');
      setAct(sel.selectedIndex < 0 ? 0 : sel.selectedIndex);
    }
    function close() {
      list.hidden = true;
      wrap.classList.remove('is-open');
      btn.setAttribute('aria-expanded', 'false');
    }
    function choose(i) {
      sel.selectedIndex = i;
      sel.dispatchEvent(new Event('input', { bubbles: true }));
      sel.dispatchEvent(new Event('change', { bubbles: true }));
      close();
    }
    btn.addEventListener('dd-close', close);
    btn.addEventListener('click', function () { if (isOpen()) close(); else open(); });
    btn.addEventListener('keydown', function (e) {
      var k = e.key;
      if (k === 'ArrowDown' || k === 'ArrowUp') {
        e.preventDefault();
        if (!isOpen()) open(); else setAct(act + (k === 'ArrowDown' ? 1 : -1));
      } else if (k === 'Home' && isOpen()) { e.preventDefault(); setAct(0); }
      else if (k === 'End' && isOpen()) { e.preventDefault(); setAct(opts.length - 1); }
      else if (k === 'Enter' || k === ' ') {
        e.preventDefault();
        if (isOpen()) choose(act); else open();
      } else if (k === 'Escape' && isOpen()) { e.preventDefault(); e.stopPropagation(); close(); }
      else if (k === 'Tab') close();
    });
    doc.addEventListener('click', function (e) { if (isOpen() && !wrap.contains(e.target)) close(); });
    sel.addEventListener('change', sync);
    sync();
  }
  $$('select[data-dd]').forEach(enhanceSelect);

  /* ---------- form penawaran -> WhatsApp ---------- */
  var form = $('#qform');
  if (form) {
    var note = $('#qnote');
    var defaultNote = note ? note.textContent : '';
    var paket = $('#q-paket');
    try {
      var qp = new URLSearchParams(window.location.search).get('paket');
      if (qp && paket) {
        Array.prototype.forEach.call(paket.options, function (o) {
          if (o.value === qp || o.textContent === qp) { paket.value = o.value || o.textContent; paket.dispatchEvent(new Event('change')); }
        });
      }
    } catch (e) { /* abaikan */ }

    var say = function (msg, bad) {
      if (!note) return;
      note.textContent = msg;
      note.classList.toggle('err', !!bad);
    };
    var mark = function (f, bad) {
      var box = f.closest('.f');
      if (box) box.classList.toggle('has-bad', bad);
    };

    form.addEventListener('submit', function (ev) {
      ev.preventDefault();
      var firstBad = null;
      $$('[required]', form).forEach(function (f) {
        var bad = !f.value.trim();
        if (f.name === 'hp' && !bad) bad = f.value.replace(/\D/g, '').length < 8;
        mark(f, bad);
        if (bad && !firstBad) firstBad = f;
      });
      var em = form.elements.email;
      if (em && em.value.trim() && !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(em.value.trim())) {
        mark(em, true);
        if (!firstBad) firstBad = em;
      }
      if (firstBad) {
        say('Lengkapi kolom yang bertanda merah terlebih dulu.', true);
        var target = firstBad.closest('.f');
        var focusEl = target && (target.querySelector('.dd-btn') || firstBad);
        if (focusEl) focusEl.focus();
        return;
      }

      var v = function (n) { var f = form.elements[n]; return f && f.value ? f.value.trim() : '-'; };
      var text = [
        'Halo Eventora, saya ingin meminta penawaran.',
        '',
        'Nama: ' + v('nama'),
        'WhatsApp: ' + v('hp'),
        'Email: ' + v('email'),
        'Jenis acara: ' + v('jenis'),
        'Paket: ' + v('paket'),
        'Tanggal acara: ' + v('tgl'),
        'Perkiraan tamu: ' + v('tamu'),
        'Lokasi: ' + v('lokasi'),
        'Catatan: ' + v('pesan')
      ].join('\n');

      var url = 'https://wa.me/' + (form.getAttribute('data-wa') || '') + '?text=' + encodeURIComponent(text);
      say('Membuka WhatsApp…');
      var w = window.open(url, '_blank', 'noopener');
      if (!w) window.location.href = url;
      setTimeout(function () { say(defaultNote); }, 4000);
    });
    $$('input,select,textarea', form).forEach(function (f) {
      var clear = function () { mark(f, false); };
      f.addEventListener('input', clear);
      f.addEventListener('change', clear);
    });
  }

  /* ---------- pemilih paket (halaman Paket Event) ---------- */
  var pkGrid = $('#pk-grid');
  var pkRes = $('#pk-result');
  if (pkGrid && pkRes) {
    var picks = $$('[data-pick]');
    var cards = $$('.pk-card', pkGrid);
    var clearPick = function () {
      pkGrid.classList.remove('has-pick');
      cards.forEach(function (c) { c.classList.remove('is-pick'); });
      picks.forEach(function (b) { b.setAttribute('aria-pressed', 'false'); });
      pkRes.hidden = true;
      pkRes.textContent = '';
    };
    picks.forEach(function (btn) {
      btn.addEventListener('click', function () {
        if (btn.getAttribute('aria-pressed') === 'true') { clearPick(); return; }
        var idx = parseInt(btn.getAttribute('data-pick'), 10);
        var card = cards[idx];
        if (!card) return;
        clearPick();
        btn.setAttribute('aria-pressed', 'true');
        pkGrid.classList.add('has-pick');
        card.classList.add('is-pick');
        var name = card.getAttribute('data-name') || '';
        pkRes.textContent = '';
        var t = doc.createElement('span');
        t.textContent = 'Paket yang cocok: ' + name;
        var a = doc.createElement('a');
        a.className = 'btn btn-sun';
        a.href = (pkGrid.getAttribute('data-quote') || '#') + '?paket=' + encodeURIComponent(name);
        a.textContent = 'Minta penawaran paket ini';
        pkRes.appendChild(t);
        pkRes.appendChild(a);
        pkRes.hidden = false;
        if (card.scrollIntoView) card.scrollIntoView({ behavior: reduce ? 'auto' : 'smooth', block: 'center' });
      });
    });
  }

  /* ---------- AI chatbot (FAQ layanan event) ---------- */
  var chat = $('#chat');
  var log = $('#chat-log');
  var chips = $('#chat-chips');
  var cform = $('#chat-form');
  var cin = $('#chat-in');
  var teaser = $('#teaser');

  function hideTeaser() { if (teaser) teaser.hidden = true; }

  if (chat && log && chips && cform && cin) {
    var started = false;
    var openers = $$('[data-chat-open]');
    var lastOpener = null;

    var scrollDown = function () { log.scrollTop = log.scrollHeight; };
    function bubble(kind, text, links) {
      var d = doc.createElement('div');
      d.className = 'msg ' + kind;
      d.appendChild(doc.createTextNode(text));
      if (links && links.length) {
        var box = doc.createElement('div');
        box.className = 'msg-links';
        links.forEach(function (l) {
          var a = doc.createElement('a');
          a.href = l[1];
          a.textContent = l[0];
          if (/^https?:\/\/wa\.me/.test(l[1])) { a.target = '_blank'; a.rel = 'noopener'; }
          box.appendChild(a);
        });
        d.appendChild(box);
      }
      log.appendChild(d);
      scrollDown();
    }
    function typing(cb) {
      var t = doc.createElement('div');
      t.className = 'msg bot typing';
      t.innerHTML = '<i></i><i></i><i></i>';
      log.appendChild(t);
      scrollDown();
      setTimeout(function () { t.remove(); cb(); }, reduce ? 0 : 600);
    }
    function waLink(q) {
      return 'https://wa.me/' + data.wa + '?text=' + encodeURIComponent('Halo Eventora, saya ingin bertanya: ' + q);
    }
    function answer(q) {
      var s = q.toLowerCase();
      var best = null, bestScore = 0;
      data.faq.forEach(function (f) {
        var sc = 0;
        if (s.indexOf(f.q.toLowerCase()) !== -1) sc += 3;
        f.k.forEach(function (k) { if (s.indexOf(k) !== -1) sc++; });
        if (sc > bestScore) { best = f; bestScore = sc; }
      });
      typing(function () {
        if (best) bubble('bot', best.a, [['Buka halaman terkait', best.url], ['Tanya via WhatsApp', waLink(q)]]);
        else bubble('bot', 'Maaf, saya belum punya jawaban untuk itu. Tim kami siap membantu langsung lewat WhatsApp.', [['Tanya via WhatsApp', waLink(q)]]);
      });
    }
    var menuEl = null;
    function buildMenu() {
      if (!data.faq.length) return;
      menuEl = doc.createElement('div');
      var h = doc.createElement('p');
      h.className = 'chat-menu-h';
      h.textContent = 'Pilih topik';
      var box = doc.createElement('div');
      box.className = 'chat-menu';
      data.faq.forEach(function (f) {
        var b = doc.createElement('button');
        b.type = 'button';
        b.className = 'cm-t';
        var i = doc.createElement('i');
        i.innerHTML = '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">' + (f.i || '') + '</svg>';
        var sp = doc.createElement('span');
        var t = doc.createElement('b');
        t.textContent = f.q;
        var sm = doc.createElement('small');
        sm.textContent = f.h || '';
        sp.appendChild(t);
        sp.appendChild(sm);
        b.appendChild(i);
        b.appendChild(sp);
        b.appendChild(doc.createRange().createContextualFragment(ARROW));
        b.addEventListener('click', function () { ask(f.q); });
        box.appendChild(b);
      });
      menuEl.appendChild(h);
      menuEl.appendChild(box);
      log.appendChild(menuEl);
      chips.hidden = true;
      scrollDown();
    }
    function ask(q) {
      q = (q || '').trim();
      if (!q) return;
      if (menuEl) { menuEl.remove(); menuEl = null; chips.hidden = false; }
      bubble('me', q);
      answer(q);
    }
    function setOpen(open) {
      chat.hidden = !open;
      doc.body.classList.toggle('chat-open', open);
      $$('[aria-controls="chat"]').forEach(function (b) { b.setAttribute('aria-expanded', open ? 'true' : 'false'); });
      if (open) {
        hideTeaser();
        if (!started) {
          started = true;
          bubble('bot', 'Halo! Saya asisten Eventora. Ada yang bisa kami bantu tentang layanan event Anda?');
          buildMenu();
          data.faq.forEach(function (f) {
            var b = doc.createElement('button');
            b.type = 'button';
            b.textContent = f.q;
            b.addEventListener('click', function () { ask(f.q); });
            chips.appendChild(b);
          });
        }
        setTimeout(function () { cin.focus(); }, 80);
      } else if (lastOpener && lastOpener.focus) {
        lastOpener.focus();
      }
    }
    openChat = function (q) { setOpen(true); if (q) ask(q); };
    closeChatFn = function () { if (!chat.hidden) { setOpen(false); return true; } return false; };

    openers.forEach(function (b) { b.addEventListener('click', function () { lastOpener = b; setOpen(true); }); });
    $$('[data-chat-close]').forEach(function (b) { b.addEventListener('click', function () { setOpen(false); }); });
    $$('[data-faq]').forEach(function (b) {
      b.addEventListener('click', function () {
        var f = data.faq[parseInt(b.getAttribute('data-faq'), 10)];
        lastOpener = b;
        setOpen(true);
        if (f) ask(f.q);
      });
    });
    cform.addEventListener('submit', function (e) {
      e.preventDefault();
      var q = cin.value;
      cin.value = '';
      ask(q);
    });
  }

  /* ---------- sapaan di tombol AI (sekali per sesi) ---------- */
  if (teaser && !reduce) {
    var seen = false;
    try { seen = sessionStorage.getItem('eo-teaser') === '1'; } catch (e) { /* abaikan */ }
    if (!seen) {
      setTimeout(function () {
        if (!doc.body.classList.contains('chat-open')) {
          teaser.hidden = false;
          try { sessionStorage.setItem('eo-teaser', '1'); } catch (e) { /* abaikan */ }
          setTimeout(hideTeaser, 12000);
        }
      }, 4500);
    }
    var tx = $('[data-teaser-close]');
    if (tx) tx.addEventListener('click', hideTeaser);
  }

  /* ---------- pencarian ---------- */
  var sBox = $('#search');
  var sIn = $('#search-in');
  var sRes = $('#search-res');
  var sForm = $('#search-form');
  if (sBox && sIn && sRes && sForm) {
    var sLinks = [];
    var sAct = -1;
    var sOpener = null;
    var esc = function (s) { return s.replace(/[.*+?^${}()|[\]\\]/g, '\\$&'); };

    function hl(text, tokens) {
      var frag = doc.createDocumentFragment();
      if (!tokens.length) { frag.appendChild(doc.createTextNode(text)); return frag; }
      var re = new RegExp('(' + tokens.map(esc).join('|') + ')', 'ig');
      text.split(re).forEach(function (part, i) {
        if (i % 2 === 1) { var m = doc.createElement('mark'); m.textContent = part; frag.appendChild(m); }
        else if (part) frag.appendChild(doc.createTextNode(part));
      });
      return frag;
    }
    function setActive(i) {
      if (!sLinks.length) { sAct = -1; return; }
      sAct = (i + sLinks.length) % sLinks.length;
      sLinks.forEach(function (a, k) { a.classList.toggle('is-act', k === sAct); });
      sLinks[sAct].scrollIntoView({ block: 'nearest' });
    }
    function item(it, tokens) {
      var a = doc.createElement('a');
      a.className = 'sr-i';
      a.href = it.u;
      a.setAttribute('role', 'option');
      var b = doc.createElement('span');
      b.className = 'sr-b';
      b.textContent = it.g;
      var t = doc.createElement('span');
      t.className = 'sr-t';
      var h = doc.createElement('b');
      h.appendChild(hl(it.t, tokens));
      var d = doc.createElement('small');
      d.appendChild(hl(it.d, tokens));
      t.appendChild(h);
      t.appendChild(d);
      a.appendChild(b);
      a.appendChild(t);
      a.insertAdjacentHTML('beforeend', ARROW);
      a.addEventListener('mousemove', function () { setActive(sLinks.indexOf(a)); });
      return a;
    }
    function group(title) {
      var g = doc.createElement('div');
      g.className = 'sr-g';
      g.textContent = title;
      return g;
    }
    function render(q) {
      sRes.innerHTML = '';
      sLinks = [];
      sAct = -1;
      var tokens = q.toLowerCase().split(/\s+/).filter(Boolean);
      if (!tokens.length) {
        sRes.appendChild(group('Pencarian populer'));
        var box = doc.createElement('div');
        box.className = 'sr-chips';
        ['Wedding', 'Corporate', 'Paket', 'Proses', 'Klien', 'FAQ'].forEach(function (w) {
          var b = doc.createElement('button');
          b.type = 'button';
          b.textContent = w;
          b.addEventListener('click', function () { sIn.value = w; render(w); sIn.focus(); });
          box.appendChild(b);
        });
        sRes.appendChild(box);
        sRes.appendChild(group('Halaman'));
        data.search.filter(function (x) { return x.g === 'Halaman'; }).forEach(function (x) {
          var a = item(x, []);
          sLinks.push(a);
          sRes.appendChild(a);
        });
        return;
      }
      var scored = [];
      data.search.forEach(function (x) {
        var hay = (x.t + ' ' + x.d + ' ' + x.g).toLowerCase();
        var ok = tokens.every(function (t) { return hay.indexOf(t) !== -1; });
        if (!ok) return;
        var sc = 1;
        var tl = x.t.toLowerCase();
        tokens.forEach(function (t) { if (tl.indexOf(t) === 0) sc += 3; else if (tl.indexOf(t) !== -1) sc += 2; });
        scored.push([sc, x]);
      });
      scored.sort(function (a, b) { return b[0] - a[0]; });
      scored = scored.slice(0, 10);
      if (!scored.length) {
        var e = doc.createElement('div');
        e.className = 'sr-empty';
        e.innerHTML = '<b>Tidak ada hasil</b>Coba kata kunci lain, atau tanyakan langsung ke asisten kami.';
        var bt = doc.createElement('button');
        bt.type = 'button';
        bt.className = 'btn btn-sun';
        bt.textContent = 'Tanya AI Assistant';
        bt.addEventListener('click', function () { var qq = sIn.value; close(); if (openChat) openChat(qq); });
        e.appendChild(doc.createElement('br'));
        e.appendChild(bt);
        sRes.appendChild(e);
        return;
      }
      var seen = {}, order = [];
      scored.forEach(function (p) {
        var g = p[1].g;
        if (!seen[g]) { seen[g] = []; order.push(g); }
        seen[g].push(p[1]);
      });
      order.forEach(function (g) {
        sRes.appendChild(group(g));
        seen[g].forEach(function (x) { var a = item(x, tokens); sLinks.push(a); sRes.appendChild(a); });
      });
      setActive(0);
    }
    function open(opener) {
      sOpener = opener || null;
      sBox.hidden = false;
      doc.body.style.overflow = 'hidden';
      sIn.value = '';
      render('');
      setTimeout(function () { sIn.focus(); }, 30);
    }
    function close() {
      if (sBox.hidden) return false;
      sBox.hidden = true;
      doc.body.style.overflow = '';
      if (sOpener && sOpener.focus) sOpener.focus();
      return true;
    }
    closeSearchFn = close;

    $$('[data-search-open]').forEach(function (b) { b.addEventListener('click', function () { open(b); }); });
    $$('[data-search-close]').forEach(function (b) { b.addEventListener('click', close); });
    sIn.addEventListener('input', function () { render(sIn.value); });
    sForm.addEventListener('submit', function (e) {
      e.preventDefault();
      var a = sLinks[sAct] || sLinks[0];
      if (a) window.location.href = a.getAttribute('href');
    });
    sIn.addEventListener('keydown', function (e) {
      if (e.key === 'ArrowDown') { e.preventDefault(); setActive(sAct + 1); }
      else if (e.key === 'ArrowUp') { e.preventDefault(); setActive(sAct - 1); }
    });
    doc.addEventListener('keydown', function (e) {
      var tag = (e.target && e.target.tagName) || '';
      var typingNow = /INPUT|TEXTAREA|SELECT/.test(tag) || (e.target && e.target.isContentEditable);
      if ((e.key === '/' && !typingNow && !e.ctrlKey && !e.metaKey && !e.altKey) || ((e.ctrlKey || e.metaKey) && e.key.toLowerCase() === 'k')) {
        e.preventDefault();
        if (sBox.hidden) open($('[data-search-open]'));
      }
    });
  }

  /* ---------- Escape: tutup lapisan teratas ---------- */
  doc.addEventListener('keydown', function (e) {
    if (e.key !== 'Escape') return;
    if (closeSearchFn && closeSearchFn()) return;
    if (closeChatFn && closeChatFn()) return;
    if (lang && lang.open) { lang.open = false; return; }
    setMenu(false);
  });
})();
