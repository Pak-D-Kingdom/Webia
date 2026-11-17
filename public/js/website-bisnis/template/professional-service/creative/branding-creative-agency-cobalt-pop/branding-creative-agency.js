/*!
 * Branding & Creative Agency — Cobalt Pop
 * Seluruh logika berada di dalam satu IIFE (tidak ada variabel global) dan dilindungi
 * penanda `data-bca-ready` agar listener tidak terpasang dua kali. Setiap modul
 * memeriksa keberadaan elemennya sendiri sehingga aman dijalankan di semua halaman.
 */
(function () {
  'use strict';

  var doc = document;
  var root = doc.documentElement;
  if (root.getAttribute('data-bca-ready') === '1') { return; }
  root.setAttribute('data-bca-ready', '1');

  var reduced = window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches;

  function $(sel, ctx) { return (ctx || doc).querySelector(sel); }
  function $$(sel, ctx) { return Array.prototype.slice.call((ctx || doc).querySelectorAll(sel)); }

  /* ------------------------------------------------------------------ Navbar */
  var nav = $('[data-bca-nav]');
  var drawer = $('[data-bca-drawer]');
  var menuBtn = $('[data-bca-menu-toggle]');

  function syncNavHeight() {
    if (!nav) { return; }
    var bottom = Math.max(nav.getBoundingClientRect().bottom, nav.offsetHeight);
    root.style.setProperty('--bca-nav-h', Math.round(bottom) + 'px');
  }

  function setDrawer(open) {
    if (!drawer || !menuBtn) { return; }
    syncNavHeight();
    drawer.setAttribute('data-open', open ? 'true' : 'false');
    drawer.setAttribute('aria-hidden', open ? 'false' : 'true');
    menuBtn.setAttribute('aria-expanded', open ? 'true' : 'false');
    menuBtn.setAttribute('aria-label', open ? 'Tutup menu' : 'Buka menu');
    doc.body.classList.toggle('bca-lock', open);
    if (open) {
      var first = $('a', drawer);
      if (first) { window.setTimeout(function () { first.focus({ preventScroll: true }); }, 60); }
    }
  }

  if (menuBtn && drawer) {
    menuBtn.addEventListener('click', function () {
      setDrawer(drawer.getAttribute('data-open') !== 'true');
    });
    drawer.addEventListener('click', function (e) {
      if (e.target.closest('a')) { setDrawer(false); }
    });
  }
  window.addEventListener('resize', function () {
    syncNavHeight();
    if (window.innerWidth >= 1100 && drawer && drawer.getAttribute('data-open') === 'true') { setDrawer(false); }
  }, { passive: true });
  syncNavHeight();

  // "More" dropdown
  var more = $('[data-bca-more]');
  var moreBtn = more ? $('[data-bca-more-toggle]', more) : null;
  var moreMenu = more ? $('.bca-nav__sub', more) : null;

  function setMore(open) {
    if (!moreBtn || !moreMenu) { return; }
    moreBtn.setAttribute('aria-expanded', open ? 'true' : 'false');
    moreMenu.setAttribute('data-open', open ? 'true' : 'false');
  }
  if (moreBtn && moreMenu) {
    moreBtn.addEventListener('click', function () {
      setMore(moreMenu.getAttribute('data-open') !== 'true');
    });
    more.addEventListener('focusout', function (e) {
      if (!more.contains(e.relatedTarget)) { setMore(false); }
    });
    doc.addEventListener('click', function (e) {
      if (!more.contains(e.target)) { setMore(false); }
    });
  }

  /* ------------------------------------------------------------------ Dialog */
  function openDialog(dlg) {
    if (!dlg) { return; }
    if (typeof dlg.showModal === 'function') {
      if (!dlg.open) { dlg.showModal(); }
    } else {
      dlg.setAttribute('open', '');
    }
    doc.body.classList.add('bca-lock');
  }
  function closeDialog(dlg) {
    if (!dlg) { return; }
    if (typeof dlg.close === 'function') { dlg.close(); } else { dlg.removeAttribute('open'); }
    if (!$('dialog[open]')) { doc.body.classList.remove('bca-lock'); }
  }

  doc.addEventListener('click', function (e) {
    var opener = e.target.closest('[data-bca-open]');
    if (opener) {
      var target = doc.getElementById(opener.getAttribute('data-bca-open'));
      if (target) { e.preventDefault(); openDialog(target); }
      return;
    }
    var closer = e.target.closest('[data-bca-close]');
    if (closer) { closeDialog(closer.closest('dialog')); return; }
    if (e.target.tagName === 'DIALOG') {          // klik pada backdrop
      var r = e.target.getBoundingClientRect();
      var inside = e.clientX >= r.left && e.clientX <= r.right && e.clientY >= r.top && e.clientY <= r.bottom;
      if (!inside) { closeDialog(e.target); }
    }
  });
  doc.addEventListener('close', function (e) {     // event `close` tidak bubbling, jadi memakai capture
    if (e.target && e.target.tagName === 'DIALOG' && !$('dialog[open]')) { doc.body.classList.remove('bca-lock'); }
  }, true);

  // Deep link: halaman Portfolio / Creative Journal membuka detail dari hash (#slug)
  function openFromHash() {
    var id = decodeURIComponent((window.location.hash || '').replace('#', ''));
    if (!id) { return; }
    var el = doc.getElementById(id);
    var opener = !el ? null : (el.hasAttribute('data-bca-open') ? el : $('[data-bca-open]', el));
    if (opener) {
      var dlg = doc.getElementById(opener.getAttribute('data-bca-open'));
      if (dlg) { openDialog(dlg); }
    }
  }
  window.addEventListener('hashchange', openFromHash);
  window.addEventListener('load', openFromHash);

  /* ------------------------------------------------------------------ Filter */
  $$('[data-bca-filter-scope]').forEach(function (scope) {
    var buttons = $$('[data-bca-filter]', scope);
    var items = $$('[data-bca-category]', scope);
    var label = $('[data-bca-count-label]', scope);

    function apply(cat) {
      var shown = 0;
      items.forEach(function (it) {
        var ok = cat === 'Semua' || it.getAttribute('data-bca-category') === cat;
        it.hidden = !ok;
        if (ok) { shown += 1; it.classList.add('is-in'); }
      });
      buttons.forEach(function (b) {
        b.setAttribute('aria-pressed', b.getAttribute('data-bca-filter') === cat ? 'true' : 'false');
      });
      if (label) {
        label.textContent = shown === 0 ? 'Belum ada item di kategori ini.' :
          'Menampilkan ' + shown + ' dari ' + items.length + (cat === 'Semua' ? '' : ' · ' + cat);
      }
    }
    buttons.forEach(function (b) {
      b.addEventListener('click', function () { apply(b.getAttribute('data-bca-filter')); });
    });
    apply('Semua');
  });

  /* ------------------------------------------------------------ Scroll reveal */
  var revealEls = $$('.bca-reveal');
  if (!('IntersectionObserver' in window) || reduced) {
    revealEls.forEach(function (el) { el.classList.add('is-in'); });
  } else {
    var io = new IntersectionObserver(function (entries) {
      entries.forEach(function (en) {
        if (en.isIntersecting) { en.target.classList.add('is-in'); io.unobserve(en.target); }
      });
    }, { threshold: 0.12, rootMargin: '0px 0px -6% 0px' });
    revealEls.forEach(function (el) { io.observe(el); });
  }

  /* ----------------------------------------------------------------- Count-up */
  var counters = $$('[data-bca-count]');
  function runCount(el) {
    var end = parseInt(el.getAttribute('data-bca-count'), 10);
    if (isNaN(end)) { return; }
    if (reduced) { el.textContent = String(end); return; }
    var start = null, dur = 1500;
    el.textContent = '0';
    function tick(ts) {
      if (start === null) { start = ts; }
      var p = Math.min((ts - start) / dur, 1);
      var eased = 1 - Math.pow(1 - p, 3);
      el.textContent = String(Math.round(end * eased));
      if (p < 1) { window.requestAnimationFrame(tick); }
    }
    window.requestAnimationFrame(tick);
  }
  if (counters.length) {
    if ('IntersectionObserver' in window) {
      var cio = new IntersectionObserver(function (entries) {
        entries.forEach(function (en) {
          if (en.isIntersecting) { runCount(en.target); cio.unobserve(en.target); }
        });
      }, { threshold: 0.4 });
      counters.forEach(function (c) { cio.observe(c); });
    }
  }

  /* ------------------------------------------------ Pointer parallax (halus) */
  var para = $$('[data-bca-parallax]');
  if (para.length && !reduced && window.matchMedia('(pointer: fine)').matches) {
    var px = 0, py = 0, ticking = false;
    window.addEventListener('pointermove', function (e) {
      px = (e.clientX / window.innerWidth - 0.5);
      py = (e.clientY / window.innerHeight - 0.5);
      if (!ticking) {
        ticking = true;
        window.requestAnimationFrame(function () {
          para.forEach(function (el) {
            var k = parseFloat(el.getAttribute('data-bca-parallax')) || 10;
            el.style.translate = (px * k * 2).toFixed(1) + 'px ' + (py * k * 2).toFixed(1) + 'px';
          });
          ticking = false;
        });
      }
    }, { passive: true });
  }

  /* ----------------------------------------------------------- Salin warna */
  function copyText(text) {
    if (navigator.clipboard && navigator.clipboard.writeText) {
      return navigator.clipboard.writeText(text);
    }
    return new Promise(function (resolve, reject) {
      var ta = doc.createElement('textarea');
      ta.value = text; ta.setAttribute('readonly', ''); ta.style.position = 'fixed'; ta.style.opacity = '0';
      doc.body.appendChild(ta); ta.select();
      try { doc.execCommand('copy') ? resolve() : reject(); } catch (err) { reject(err); }
      doc.body.removeChild(ta);
    });
  }
  doc.addEventListener('click', function (e) {
    var sw = e.target.closest('[data-bca-copy]');
    if (!sw) { return; }
    copyText(sw.getAttribute('data-bca-copy')).then(function () {
      sw.setAttribute('data-copied', 'true');
      window.setTimeout(function () { sw.removeAttribute('data-copied'); }, 1400);
    }, function () { /* clipboard ditolak: abaikan */ });
  });

  /* ------------------------------------------------------ Validasi formulir */
  var PHONE_RE = /^[0-9+\s-]{8,18}$/;

  function messageFor(ctrl) {
    var v = (ctrl.value || '').trim();
    if (ctrl.type === 'checkbox') { return ctrl.checked ? '' : 'Mohon centang persetujuan untuk melanjutkan.'; }
    if (ctrl.required && v === '') { return ctrl.tagName === 'SELECT' ? 'Pilih salah satu layanan.' : 'Kolom ini wajib diisi.'; }
    if (ctrl.type === 'email' && v !== '' && !/^[^\s@]+@[^\s@]+\.[^\s@]{2,}$/.test(v)) { return 'Format email belum benar.'; }
    if (ctrl.type === 'tel' && v !== '' && !PHONE_RE.test(v)) { return 'Gunakan angka, spasi, atau tanda + dan -, 8 sampai 18 karakter.'; }
    var min = parseInt(ctrl.getAttribute('minlength'), 10);
    if (!isNaN(min) && v !== '' && v.length < min) { return 'Minimal ' + min + ' karakter.'; }
    return '';
  }
  function showError(ctrl, msg) {
    var field = ctrl.closest('.bca-field');
    var out = field ? $('[data-bca-error]', field) : null;
    if (msg) { ctrl.setAttribute('aria-invalid', 'true'); } else { ctrl.removeAttribute('aria-invalid'); }
    if (out) { out.textContent = msg; }
  }

  $$('form[data-bca-form]').forEach(function (form) {
    var ctrls = $$('input, select, textarea', form);
    var ok = $('[data-bca-form-ok]', form);
    var touched = new WeakSet();

    ctrls.forEach(function (c) {
      var evt = (c.tagName === 'SELECT' || c.type === 'checkbox') ? 'change' : 'input';
      c.addEventListener(evt, function () { if (touched.has(c)) { showError(c, messageFor(c)); } });
      c.addEventListener('blur', function () { touched.add(c); showError(c, messageFor(c)); });
    });

    form.addEventListener('submit', function (e) {
      e.preventDefault();
      var firstBad = null;
      ctrls.forEach(function (c) {
        touched.add(c);
        var msg = messageFor(c);
        showError(c, msg);
        if (msg && !firstBad) { firstBad = c; }
      });
      if (ok) { ok.hidden = true; }
      if (firstBad) { firstBad.focus(); return; }
      form.reset();
      ctrls.forEach(function (c) { showError(c, ''); });
      if (ok) { ok.hidden = false; }
    });
  });

  /* ---------------------------------------------------------------- Chatbot */
  var chat = $('[data-bca-chat]');
  var chatBtn = $('[data-bca-chat-toggle]');
  var dataEl = doc.getElementById('bca-chat-data');

  if (chat && chatBtn && dataEl) {
    var cfg = {};
    try { cfg = JSON.parse(dataEl.textContent || '{}'); } catch (err) { cfg = {}; }
    var log = $('[data-bca-chat-log]', chat);
    var form = $('[data-bca-chat-form]', chat);
    var input = $('[data-bca-chat-input]', chat);
    var greeted = false;
    var waLink = $('.bca-fab--wa');
    var contactLink = $('.bca-nav__cta');

    var addMsg = function (text, who) {
      var m = doc.createElement('div');
      m.className = 'bca-msg bca-msg--' + who;
      m.textContent = text;
      log.appendChild(m);
      log.scrollTop = log.scrollHeight;
      return m;
    };
    var addFallbackLinks = function (m) {
      var p = doc.createElement('span');
      p.appendChild(doc.createTextNode(' '));
      if (contactLink) {
        var a = doc.createElement('a'); a.href = contactLink.href; a.textContent = 'Buka formulir';
        p.appendChild(a); p.appendChild(doc.createTextNode(' · '));
      }
      if (waLink) {
        var w = doc.createElement('a'); w.href = waLink.href; w.target = '_blank'; w.rel = 'noopener noreferrer'; w.textContent = 'Chat WhatsApp';
        p.appendChild(w);
      }
      m.appendChild(p);
    };
    var answer = function (q) {
      var s = q.toLowerCase();
      var list = cfg.replies || [];
      for (var i = 0; i < list.length; i += 1) {
        for (var k = 0; k < list[i].keys.length; k += 1) {
          if (s.indexOf(list[i].keys[k]) !== -1) { return { text: list[i].text, fallback: false }; }
        }
      }
      return { text: cfg.fallback || '', fallback: true };
    };
    var botSay = function (res) {
      var typing = doc.createElement('div');
      typing.className = 'bca-msg bca-msg--bot';
      typing.innerHTML = '<span class="bca-typing" aria-label="Sedang mengetik"><i></i><i></i><i></i></span>';
      log.appendChild(typing); log.scrollTop = log.scrollHeight;
      window.setTimeout(function () {
        log.removeChild(typing);
        var m = addMsg(res.text, 'bot');
        if (res.fallback) { addFallbackLinks(m); }
        log.scrollTop = log.scrollHeight;
      }, reduced ? 120 : 650);
    };
    var send = function (text) {
      var t = (text || '').trim();
      if (!t) { return; }
      addMsg(t, 'me');
      botSay(answer(t));
    };
    var setChat = function (open) {
      chat.hidden = !open;
      chat.setAttribute('data-open', open ? 'true' : 'false');
      chatBtn.setAttribute('aria-expanded', open ? 'true' : 'false');
      chatBtn.setAttribute('aria-label', open ? 'Tutup asisten chat' : 'Buka asisten chat');
      if (open) {
        if (!greeted) { greeted = true; botSay({ text: cfg.greeting || '', fallback: false }); }
        window.setTimeout(function () { input.focus({ preventScroll: true }); }, 120);
      }
    };

    chatBtn.addEventListener('click', function () { setChat(chat.hidden); });
    $('[data-bca-chat-close]', chat).addEventListener('click', function () { setChat(false); chatBtn.focus(); });
    form.addEventListener('submit', function (e) { e.preventDefault(); send(input.value); input.value = ''; });
    $$('[data-bca-quick]', chat).forEach(function (b) {
      b.addEventListener('click', function () { send(b.getAttribute('data-bca-quick')); });
    });
  }

  /* ------------------------------------------------- Escape (satu listener) */
  doc.addEventListener('keydown', function (e) {
    if (e.key !== 'Escape') { return; }
    if (drawer && drawer.getAttribute('data-open') === 'true') { setDrawer(false); if (menuBtn) { menuBtn.focus(); } return; }
    if (moreMenu && moreMenu.getAttribute('data-open') === 'true') { setMore(false); if (moreBtn) { moreBtn.focus(); } return; }
    if (chat && !chat.hidden && !$('dialog[open]')) {
      chat.hidden = true; chat.setAttribute('data-open', 'false');
      if (chatBtn) { chatBtn.setAttribute('aria-expanded', 'false'); chatBtn.focus(); }
    }
  });
}());
