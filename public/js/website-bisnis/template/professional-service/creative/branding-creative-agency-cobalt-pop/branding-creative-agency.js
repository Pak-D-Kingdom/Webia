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

  var reduced = !!(window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches);
  var finePointer = !!(window.matchMedia && window.matchMedia('(hover: hover) and (pointer: fine)').matches);
  var raf = window.requestAnimationFrame ? window.requestAnimationFrame.bind(window) : function (fn) { return window.setTimeout(fn, 16); };

  function $(sel, ctx) { return (ctx || doc).querySelector(sel); }
  function $$(sel, ctx) { return Array.prototype.slice.call((ctx || doc).querySelectorAll(sel)); }
  function norm(s) {
    var t = String(s || '').toLowerCase();
    return t.normalize ? t.normalize('NFD').replace(/[\u0300-\u036f]/g, '') : t;
  }

  /* ------------------------------------------------------------------ Navbar */
  var nav = $('[data-bca-nav]');
  var drawer = $('[data-bca-drawer]');
  var menuBtn = $('[data-bca-menu-toggle]');

  function syncNavHeight() {
    if (!nav) { return; }
    var h = Math.round(nav.getBoundingClientRect().height);
    var bottom = Math.max(Math.round(nav.getBoundingClientRect().bottom), h);
    root.style.setProperty('--bca-navh', h + 'px');
    root.style.setProperty('--bca-nav-h', bottom + 'px');
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
    menuBtn.addEventListener('click', function () { setDrawer(drawer.getAttribute('data-open') !== 'true'); });
    drawer.addEventListener('click', function (e) { if (e.target.closest('a')) { setDrawer(false); } });
  }
  window.addEventListener('resize', function () {
    syncNavHeight();
    if (window.innerWidth >= 1100 && drawer && drawer.getAttribute('data-open') === 'true') { setDrawer(false); }
  }, { passive: true });
  syncNavHeight();
  window.addEventListener('load', syncNavHeight);

  // Dropdown "More" (kartu) + navigasi keyboard
  var more = $('[data-bca-more]');
  var moreBtn = more ? $('[data-bca-more-toggle]', more) : null;
  var moreMenu = more ? $('.bca-nav__sub', more) : null;

  function setMore(open) {
    if (!moreBtn || !moreMenu) { return; }
    moreBtn.setAttribute('aria-expanded', open ? 'true' : 'false');
    moreMenu.setAttribute('data-open', open ? 'true' : 'false');
  }
  if (moreBtn && moreMenu) {
    var moreLinks = function () { return $$('a', moreMenu); };
    moreBtn.addEventListener('click', function () { setMore(moreMenu.getAttribute('data-open') !== 'true'); });
    more.addEventListener('focusout', function (e) { if (!more.contains(e.relatedTarget)) { setMore(false); } });
    doc.addEventListener('click', function (e) { if (!more.contains(e.target)) { setMore(false); } });
    more.addEventListener('keydown', function (e) {
      var links = moreLinks();
      var open = moreMenu.getAttribute('data-open') === 'true';
      var idx = links.indexOf(doc.activeElement);
      if (e.key === 'ArrowDown') {
        e.preventDefault();
        if (!open) { setMore(true); }
        window.setTimeout(function () { (links[idx + 1] || links[0]).focus(); }, open ? 0 : 60);
      } else if (e.key === 'ArrowUp' && open) {
        e.preventDefault();
        if (idx <= 0) { moreBtn.focus(); } else { links[idx - 1].focus(); }
      } else if (e.key === 'Home' && open && idx !== -1) {
        e.preventDefault(); links[0].focus();
      } else if (e.key === 'End' && open && idx !== -1) {
        e.preventDefault(); links[links.length - 1].focus();
      }
    });
  }

  /* ------------------------------------------------------------------ Dialog */
  function openDialog(dlg) {
    if (!dlg) { return; }
    if (typeof dlg.showModal === 'function') { if (!dlg.open) { dlg.showModal(); } } else { dlg.setAttribute('open', ''); }
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
    if (e.target.tagName === 'DIALOG') {
      var r = e.target.getBoundingClientRect();
      var inside = e.clientX >= r.left && e.clientX <= r.right && e.clientY >= r.top && e.clientY <= r.bottom;
      if (!inside) { closeDialog(e.target); }
    }
  });
  doc.addEventListener('close', function (e) {
    if (e.target && e.target.tagName === 'DIALOG' && !$('dialog[open]')) { doc.body.classList.remove('bca-lock'); }
  }, true);

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

  // tombol "kembali ke atas"
  doc.addEventListener('click', function (e) {
    if (e.target.closest('[data-bca-top]')) { window.scrollTo({ top: 0, behavior: reduced ? 'auto' : 'smooth' }); }
  });

  /* ------------------------------------------------------- Pencarian global */
  var sdlg = $('[data-bca-search]');
  if (sdlg) {
    var sin = $('[data-bca-search-input]', sdlg);
    var sitems = $$('[data-bca-search-item]', sdlg);
    var scount = $('[data-bca-search-count]', sdlg);
    var sempty = $('[data-bca-search-empty]', sdlg);
    var sclear = $('[data-bca-search-clear]', sdlg);
    var titleOrig = sitems.map(function (li) { return $('[data-title]', li).textContent; });

    var markTitle = function (el, text, terms) {
      var low = text.toLowerCase(), ranges = [];
      terms.forEach(function (t) {
        var from = 0, i;
        while (t && (i = low.indexOf(t, from)) !== -1) { ranges.push([i, i + t.length]); from = i + t.length; }
      });
      ranges.sort(function (a, b) { return a[0] - b[0]; });
      var merged = [];
      ranges.forEach(function (r) {
        var last = merged[merged.length - 1];
        if (last && r[0] <= last[1]) { last[1] = Math.max(last[1], r[1]); } else { merged.push([r[0], r[1]]); }
      });
      el.textContent = '';
      var pos = 0;
      merged.forEach(function (r) {
        if (r[0] > pos) { el.appendChild(doc.createTextNode(text.slice(pos, r[0]))); }
        var m = doc.createElement('mark'); m.textContent = text.slice(r[0], r[1]); el.appendChild(m); pos = r[1];
      });
      if (pos < text.length) { el.appendChild(doc.createTextNode(text.slice(pos))); }
    };

    var runSearch = function () {
      var raw = sin.value.trim();
      var terms = norm(raw).split(/\s+/).filter(Boolean);
      var shown = 0;
      sitems.forEach(function (li, i) {
        var titleEl = $('[data-title]', li);
        var ok;
        if (!terms.length) { ok = li.getAttribute('data-type') === 'Halaman'; }
        else {
          var hay = norm(li.getAttribute('data-q'));
          ok = terms.every(function (t) { return hay.indexOf(t) !== -1; });
        }
        li.hidden = !ok;
        if (ok) { shown += 1; }
        if (ok && terms.length) { markTitle(titleEl, titleOrig[i], raw.toLowerCase().split(/\s+/).filter(Boolean)); } else { titleEl.textContent = titleOrig[i]; }
      });
      // urutkan menurut relevansi: judul cocok (0) > kata kunci (1) > teks (2); stabil terhadap urutan asli
      if (terms.length) {
        var list = $('[data-bca-search-list]', sdlg);
        var ranked = sitems.map(function (li, i) {
          var ti = norm(li.getAttribute('data-title-q')), ke = norm(li.getAttribute('data-keys'));
          var sc = terms.every(function (t) { return ti.indexOf(t) !== -1; }) ? 0 : (terms.every(function (t) { return ke.indexOf(t) !== -1; }) ? 1 : 2);
          return { li: li, sc: sc, i: i };
        }).sort(function (a, b) { return a.sc - b.sc || a.i - b.i; });
        ranked.forEach(function (r) { list.appendChild(r.li); });
      }
      sclear.hidden = raw === '';
      sempty.hidden = !(terms.length && shown === 0);
      scount.textContent = !terms.length ? 'Pintasan halaman' : (shown === 0 ? '' : shown + ' hasil untuk “' + raw + '”');
    };
    var visibleLinks = function () { return $$('[data-bca-search-item]:not([hidden]) a', sdlg); };

    var openSearch = function () {
      openDialog(sdlg);
      runSearch();
      window.setTimeout(function () { sin.focus(); sin.select(); }, 30);
    };
    doc.addEventListener('click', function (e) { if (e.target.closest('[data-bca-search-open]')) { openSearch(); } });
    doc.addEventListener('keydown', function (e) {
      var tag = (e.target && e.target.tagName) || '';
      var typing = tag === 'INPUT' || tag === 'TEXTAREA' || tag === 'SELECT' || (e.target && e.target.isContentEditable);
      if ((e.ctrlKey || e.metaKey) && (e.key === 'k' || e.key === 'K')) { e.preventDefault(); if (!sdlg.open) { openSearch(); } }
      else if (e.key === '/' && !typing && !$('dialog[open]')) { e.preventDefault(); openSearch(); }
    });
    sin.addEventListener('input', runSearch);
    sclear.addEventListener('click', function () { sin.value = ''; runSearch(); sin.focus(); });
    $$('[data-bca-search-fill]', sdlg).forEach(function (b) {
      b.addEventListener('click', function () { sin.value = b.getAttribute('data-bca-search-fill'); runSearch(); sin.focus(); });
    });
    sdlg.addEventListener('keydown', function (e) {
      if (e.key === 'Escape') { e.preventDefault(); closeDialog(sdlg); return; }   // Esc di input[type=search] tidak boleh hanya menghapus teks
      var links = visibleLinks();
      var idx = links.indexOf(doc.activeElement);
      if (e.key === 'ArrowDown') { e.preventDefault(); if (links.length) { (links[idx + 1] || links[links.length - 1]).focus(); } }
      else if (e.key === 'ArrowUp') { e.preventDefault(); if (idx <= 0) { sin.focus(); } else { links[idx - 1].focus(); } }
      else if (e.key === 'Enter' && doc.activeElement === sin && links.length) { e.preventDefault(); links[0].click(); }
    });
    sdlg.addEventListener('click', function (e) { if (e.target.closest('.bca-hit a')) { closeDialog(sdlg); } });
  }

  /* --------------------------------------------------- Filter + cari di halaman */
  $$('[data-bca-filter-scope]').forEach(function (scope) {
    var buttons = $$('[data-bca-filter]', scope);
    var items = $$('[data-bca-category]', scope);
    var label = $('[data-bca-count-label]', scope);
    var find = $('[data-bca-find]', scope);
    var findClear = $('[data-bca-find-clear]', scope);
    var emptyEl = $('[data-bca-empty]', scope);
    var cat = 'Semua';

    function apply() {
      var q = find ? find.value : '';
      var terms = norm(q).split(/\s+/).filter(Boolean);
      var shown = 0;
      items.forEach(function (it) {
        var okCat = cat === 'Semua' || it.getAttribute('data-bca-category') === cat;
        var txt = norm(it.getAttribute('data-bca-text') || it.textContent);
        var okQ = terms.every(function (t) { return txt.indexOf(t) !== -1; });
        var ok = okCat && okQ;
        it.hidden = !ok;
        if (ok) { shown += 1; it.classList.add('is-in'); }
      });
      buttons.forEach(function (b) { b.setAttribute('aria-pressed', b.getAttribute('data-bca-filter') === cat ? 'true' : 'false'); });
      if (findClear) { findClear.hidden = !q; }
      if (emptyEl) { emptyEl.hidden = shown !== 0; }
      if (label) {
        label.textContent = shown === 0 ? 'Belum ada item yang cocok.' :
          'Menampilkan ' + shown + ' dari ' + items.length + (cat === 'Semua' ? '' : ' · ' + cat) + (q ? ' · “' + q.trim() + '”' : '');
      }
    }
    buttons.forEach(function (b) { b.addEventListener('click', function () { cat = b.getAttribute('data-bca-filter'); apply(); }); });
    if (find) { find.addEventListener('input', apply); }
    if (findClear) { findClear.addEventListener('click', function () { find.value = ''; apply(); find.focus(); }); }
    apply();
  });

  /* ------------------------------------------------ Pecah teks (kata & huruf) */
  function splitWords(el) {
    var idx = 0;
    (function walk(node) {
      Array.prototype.slice.call(node.childNodes).forEach(function (n) {
        if (n.nodeType === 3) {
          var frag = doc.createDocumentFragment();
          n.textContent.split(/(\s+)/).forEach(function (p) {
            if (!p) { return; }
            if (/^\s+$/.test(p)) { frag.appendChild(doc.createTextNode(' ')); return; }
            var w = doc.createElement('span'); w.className = 'bca-w';
            var inner = doc.createElement('span'); inner.style.setProperty('--wi', String(idx)); idx += 1;
            inner.textContent = p; w.appendChild(inner); frag.appendChild(w);
          });
          node.replaceChild(frag, n);
        } else if (n.nodeType === 1 && n.tagName !== 'BR' && !n.classList.contains('bca-w')) { walk(n); }
      });
    }(el));
  }
  var splitTargets = $$('.bca-h2, .bca-phead__title, .bca-foot__big');
  if (!reduced) { splitTargets.forEach(splitWords); }

  var heroTitle = $('[data-bca-letters]');
  if (heroTitle && !reduced) {
    heroTitle.setAttribute('aria-label', heroTitle.textContent.replace(/\s+/g, ' ').trim());
    var ci = 0;
    $$('.bca-line > span', heroTitle).forEach(function (sp) {
      var txt = sp.textContent; sp.textContent = '';
      sp.setAttribute('aria-hidden', 'true');
      txt.split('').forEach(function (ch) {
        var i = doc.createElement('i'); i.className = 'bca-ch'; i.style.setProperty('--ci', String(ci)); ci += 1;
        i.textContent = ch; sp.appendChild(i);
      });
    });
    heroTitle.classList.add('is-split');
  }

  /* ------------------------------------------------------------ Scroll reveal */
  var revealEls = $$('.bca-reveal').concat(splitTargets);
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
    var start = null, dur = 1600;
    el.textContent = '0';
    function tick(ts) {
      if (start === null) { start = ts; }
      var p = Math.min((ts - start) / dur, 1);
      el.textContent = String(Math.round(end * (1 - Math.pow(1 - p, 3))));
      if (p < 1) { raf(tick); }
    }
    raf(tick);
  }
  if (counters.length && 'IntersectionObserver' in window) {
    var cio = new IntersectionObserver(function (entries) {
      entries.forEach(function (en) { if (en.isIntersecting) { runCount(en.target); cio.unobserve(en.target); } });
    }, { threshold: 0.4 });
    counters.forEach(function (c) { cio.observe(c); });
  }

  /* ---------------------------------- Progres gulir + paralaks bentuk header */
  var progressEl = $('[data-bca-progress]');
  var headShapes = reduced ? [] : $$('.bca-phead__shapes i');
  var scrollTicking = false;
  function onScroll() {
    if (scrollTicking) { return; }
    scrollTicking = true;
    raf(function () {
      var de = doc.documentElement;
      var max = de.scrollHeight - de.clientHeight;
      var y = window.pageYOffset || de.scrollTop || 0;
      if (progressEl) { progressEl.style.transform = 'scaleX(' + (max > 0 ? Math.min(y / max, 1) : 0).toFixed(4) + ')'; }
      var cy = Math.min(y, 700);
      headShapes.forEach(function (s, i) { s.style.translate = '0 ' + (cy * (0.07 + i * 0.05)).toFixed(1) + 'px'; });
      scrollTicking = false;
    });
  }
  window.addEventListener('scroll', onScroll, { passive: true });
  onScroll();

  /* -------------------------------- Interaksi pointer (hanya mouse/trackpad) */
  if (finePointer && !reduced) {
    // paralaks halus bentuk hero
    var para = $$('[data-bca-parallax]');
    if (para.length) {
      var px = 0, py = 0, pt = false;
      window.addEventListener('pointermove', function (e) {
        px = e.clientX / window.innerWidth - 0.5; py = e.clientY / window.innerHeight - 0.5;
        if (!pt) {
          pt = true;
          raf(function () {
            para.forEach(function (el) {
              var k = parseFloat(el.getAttribute('data-bca-parallax')) || 10;
              el.style.translate = (px * k * 2).toFixed(1) + 'px ' + (py * k * 2).toFixed(1) + 'px';
            });
            pt = false;
          });
        }
      }, { passive: true });
    }
    // tilt 3D bingkai hero
    $$('[data-bca-tilt]').forEach(function (box) {
      var frame = $('.bca-frame', box);
      if (!frame) { return; }
      box.addEventListener('pointermove', function (e) {
        var r = box.getBoundingClientRect();
        var x = (e.clientX - r.left) / r.width - 0.5, y = (e.clientY - r.top) / r.height - 0.5;
        frame.style.setProperty('--ry', (x * 12).toFixed(2) + 'deg');
        frame.style.setProperty('--rx', (-y * 10).toFixed(2) + 'deg');
        frame.style.setProperty('--gx', ((x + 0.5) * 100).toFixed(0) + '%');
        frame.style.setProperty('--gy', ((y + 0.5) * 100).toFixed(0) + '%');
      });
      box.addEventListener('pointerleave', function () {
        frame.style.setProperty('--ry', '0deg'); frame.style.setProperty('--rx', '0deg');
      });
    });
    // tombol magnetik
    $$('.bca-btn, .bca-fab').forEach(function (b) {
      b.addEventListener('pointermove', function (e) {
        var r = b.getBoundingClientRect();
        b.style.setProperty('--mag-x', ((e.clientX - r.left - r.width / 2) * 0.18).toFixed(1) + 'px');
        b.style.setProperty('--mag-y', ((e.clientY - r.top - r.height / 2) * 0.28).toFixed(1) + 'px');
      });
      b.addEventListener('pointerleave', function () { b.style.removeProperty('--mag-x'); b.style.removeProperty('--mag-y'); });
    });
    // gelembung "Lihat" yang mengikuti kursor pada kartu portofolio
    $$('.bca-pcard, .bca-pf-item__img').forEach(function (card) {
      var bubble = $('.bca-bubble', card);
      if (!bubble) { return; }
      card.addEventListener('pointerenter', function () { bubble.classList.add('is-on'); });
      card.addEventListener('pointerleave', function () { bubble.classList.remove('is-on'); });
      card.addEventListener('pointermove', function (e) {
        var r = card.getBoundingClientRect();
        bubble.style.setProperty('--mx', (e.clientX - r.left).toFixed(0) + 'px');
        bubble.style.setProperty('--my', (e.clientY - r.top).toFixed(0) + 'px');
      });
    });
  }

  /* -------------------------------------------------------- Salin ke papan klip */
  function copyText(text) {
    if (navigator.clipboard && navigator.clipboard.writeText) { return navigator.clipboard.writeText(text); }
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
      window.setTimeout(function () { sw.removeAttribute('data-copied'); }, 1500);
    }, function () { /* clipboard ditolak: abaikan */ });
  });

  /* ------------------------------------------------------ Form → WhatsApp */
  var PHONE_RE = /^[0-9+\s-]{8,18}$/;
  var EMAIL_RE = /^[^\s@]+@[^\s@]+\.[^\s@]{2,}$/;

  function messageFor(ctrl) {
    var v = (ctrl.value || '').trim();
    if (ctrl.type === 'checkbox') { return ctrl.checked ? '' : 'Mohon centang persetujuan untuk melanjutkan.'; }
    if (ctrl.required && v === '') { return 'Kolom ini wajib diisi.'; }
    if (ctrl.type === 'email' && v !== '' && !EMAIL_RE.test(v)) { return 'Format email belum benar.'; }
    if (ctrl.type === 'tel' && v !== '' && !PHONE_RE.test(v)) { return 'Gunakan angka, spasi, + atau -, 8 sampai 18 karakter.'; }
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
  function groupChecked(g) { return $$('input:checked', g).map(function (i) { return i.value; }); }
  function groupError(g, msg) {
    var out = $('[data-bca-error]', g);
    if (out) { out.textContent = msg; }
    $$('input', g).forEach(function (i) { if (msg) { i.setAttribute('aria-invalid', 'true'); } else { i.removeAttribute('aria-invalid'); } });
  }

  $$('form[data-bca-form]').forEach(function (form) {
    var el = form.elements;
    var checks = ['name', 'email', 'phone', 'message', 'consent'].map(function (n) { return el[n]; }).filter(Boolean);
    var svcGroup = $('[data-bca-group][data-bca-required]', form);
    var ok = $('[data-bca-form-ok]', form);
    var okLink = $('[data-bca-wa-link]', form);
    var meterBar = $('[data-bca-meter-bar]', form.closest('.bca-formcard') || form);
    var meterLabel = $('[data-bca-meter-label]', form.closest('.bca-formcard') || form);
    var counter = $('[data-bca-count-now]', form);
    var touched = new WeakSet();

    function filled() {
      var n = 0;
      if (el.name && el.name.value.trim().length >= 3) { n += 1; }
      if (el.email && EMAIL_RE.test(el.email.value.trim())) { n += 1; }
      if (svcGroup && groupChecked(svcGroup).length) { n += 1; }
      if (el.message && el.message.value.trim().length >= 20) { n += 1; }
      if (el.consent && el.consent.checked) { n += 1; }
      return n;
    }
    function updateMeter() {
      var n = filled();
      if (meterBar) { meterBar.style.width = (n / 5 * 100) + '%'; }
      if (meterLabel) { meterLabel.textContent = n === 5 ? 'Siap dikirim' : n + ' dari 5 terisi'; }
      if (counter && el.message) { counter.textContent = String(el.message.value.length); }
    }

    checks.forEach(function (c) {
      var evt = c.type === 'checkbox' ? 'change' : 'input';
      c.addEventListener(evt, function () { if (touched.has(c)) { showError(c, messageFor(c)); } });
      c.addEventListener('blur', function () { touched.add(c); showError(c, messageFor(c)); });
    });
    form.addEventListener('input', updateMeter);
    form.addEventListener('change', function () {
      updateMeter();
      if (svcGroup && groupChecked(svcGroup).length) { groupError(svcGroup, ''); }
    });
    updateMeter();

    function buildMessage() {
      var lines = [form.getAttribute('data-bca-wa-intro') || 'Halo, saya ingin memulai proyek.', ''];
      var push = function (k, v) { if (v) { lines.push(k + ': ' + v); } };
      push('Nama', el.name.value.trim());
      push('Email', el.email.value.trim());
      push('WhatsApp', el.phone ? el.phone.value.trim() : '');
      push('Brand/Perusahaan', el.company ? el.company.value.trim() : '');
      push('Layanan', svcGroup ? groupChecked(svcGroup).join(', ') : '');
      $$('[data-bca-group]:not([data-bca-required])', form).forEach(function (g) {
        push(g.getAttribute('data-bca-group'), groupChecked(g).join(', '));
      });
      lines.push('', 'Cerita proyek:', el.message.value.trim());
      return lines.join('\n');
    }

    form.addEventListener('submit', function (e) {
      e.preventDefault();
      var firstBad = null;
      checks.forEach(function (c) {
        touched.add(c);
        var msg = messageFor(c);
        showError(c, msg);
        if (msg && !firstBad) { firstBad = c; }
      });
      if (svcGroup && !groupChecked(svcGroup).length) {
        groupError(svcGroup, 'Pilih minimal satu layanan.');
        if (!firstBad) { firstBad = $('input', svcGroup); }
      }
      if (ok) { ok.hidden = true; }
      if (firstBad) { firstBad.focus(); return; }

      var number = (form.getAttribute('data-bca-wa') || '').replace(/[^0-9]/g, '');
      var url = 'https://wa.me/' + number + '?text=' + encodeURIComponent(buildMessage());
      if (okLink) { okLink.setAttribute('href', url); }
      window.open(url, '_blank', 'noopener');
      form.reset();
      checks.forEach(function (c) { showError(c, ''); });
      if (svcGroup) { groupError(svcGroup, ''); }
      updateMeter();
      if (ok) { ok.hidden = false; ok.focus(); }
    });
  });

  /* --------------------------------------------------------------- Chatbot */
  var chat = $('[data-bca-chat]');
  var chatBtn = $('[data-bca-chat-toggle]');
  var floatBox = $('[data-bca-float]');
  var dataEl = doc.getElementById('bca-chat-data');

  if (chat && chatBtn && dataEl) {
    var cfg = {};
    try { cfg = JSON.parse(dataEl.textContent || '{}'); } catch (err) { cfg = {}; }
    var log = $('[data-bca-chat-log]', chat);
    var cform = $('[data-bca-chat-form]', chat);
    var cinput = $('[data-bca-chat-input]', chat);
    var orbIcon = $('.bca-chat__orb svg', chat);
    var waLink = $('.bca-chat__wa', chat);
    var contactLink = $('.bca-nav__cta');
    var greeted = false;
    var busy = false;

    var nowTime = function () {
      try { return new Date().toLocaleTimeString('id-ID', { hour: '2-digit', minute: '2-digit' }); } catch (e) { return ''; }
    };
    var scrollEnd = function () { log.scrollTop = log.scrollHeight; };
    var addRow = function (who) {
      var row = doc.createElement('div');
      row.className = 'bca-row bca-row--' + who;
      if (who === 'bot') {
        var av = doc.createElement('span'); av.className = 'bca-av'; av.setAttribute('aria-hidden', 'true');
        if (orbIcon) { av.appendChild(orbIcon.cloneNode(true)); }
        row.appendChild(av);
      }
      var msg = doc.createElement('div'); msg.className = 'bca-msg bca-msg--' + who;
      row.appendChild(msg); log.appendChild(row); scrollEnd();
      return { row: row, msg: msg };
    };
    var addTime = function (msg) {
      var t = doc.createElement('time'); t.textContent = nowTime(); msg.appendChild(t);
    };
    var addActions = function (msg) {
      var acts = doc.createElement('div'); acts.className = 'bca-msg__acts';
      if (contactLink) {
        var a = doc.createElement('a'); a.href = contactLink.href; a.textContent = 'Buka formulir'; acts.appendChild(a);
      }
      if (waLink) {
        var w = doc.createElement('a'); w.href = waLink.href; w.target = '_blank'; w.rel = 'noopener noreferrer'; w.textContent = 'Chat WhatsApp'; acts.appendChild(w);
      }
      msg.appendChild(acts);
    };
    var answer = function (q) {
      var s = q.toLowerCase();
      var list = cfg.replies || [];
      for (var i = 0; i < list.length; i += 1) {
        for (var k = 0; k < list[i].keys.length; k += 1) {
          if (s.indexOf(list[i].keys[k]) !== -1) { return { text: list[i].text, actions: list[i].keys.indexOf('mulai') !== -1 }; }
        }
      }
      return { text: cfg.fallback || '', actions: true };
    };
    var queue = [];
    var pump = function () {
      if (busy || !queue.length) { return; }
      botSay(queue.shift());
    };
    var botSay = function (res) {
      busy = true;
      var typing = addRow('bot');
      typing.msg.innerHTML = '<span class="bca-typing" aria-label="Sedang mengetik"><i></i><i></i><i></i></span>';
      window.setTimeout(function () {
        typing.row.parentNode.removeChild(typing.row);
        var r = addRow('bot');
        var p = doc.createElement('span'); r.msg.appendChild(p);
        var finish = function () {
          p.textContent = res.text;
          if (res.actions) { addActions(r.msg); }
          addTime(r.msg); scrollEnd(); busy = false; pump();
        };
        if (reduced) { finish(); return; }
        var words = res.text.split(' '), i = 0;
        var step = function () {
          i += 1;
          p.textContent = words.slice(0, i).join(' ');
          scrollEnd();
          if (i < words.length) { window.setTimeout(step, 24); } else { finish(); }
        };
        step();
      }, reduced ? 100 : 700);
    };
    var send = function (text) {
      var t = (text || '').trim();
      if (!t) { return; }
      var r = addRow('me');
      r.msg.appendChild(doc.createTextNode(t));       // teks polos: aman dari injeksi HTML
      addTime(r.msg);
      chat.classList.add('is-active');
      queue.push(answer(t));
      pump();
    };
    var setChat = function (open) {
      chat.hidden = !open;
      chat.setAttribute('data-open', open ? 'true' : 'false');
      chatBtn.setAttribute('aria-expanded', open ? 'true' : 'false');
      chatBtn.setAttribute('aria-label', open ? 'Tutup asisten chat' : 'Buka asisten chat');
      if (floatBox) { floatBox.setAttribute('data-chat-open', open ? 'true' : 'false'); }
      if (open) {
        syncNavHeight();
        if (!greeted) { greeted = true; queue.push({ text: cfg.greeting || '', actions: false }); pump(); }
        window.setTimeout(function () { cinput.focus({ preventScroll: true }); }, 160);
      }
    };

    chatBtn.addEventListener('click', function () { setChat(chat.hidden); });
    $('[data-bca-chat-close]', chat).addEventListener('click', function () { setChat(false); chatBtn.focus(); });
    cform.addEventListener('submit', function (e) { e.preventDefault(); send(cinput.value); cinput.value = ''; });
    $$('[data-bca-quick]', chat).forEach(function (b) {
      b.addEventListener('click', function () { send(b.getAttribute('data-bca-quick')); });
    });
  }

  /* ------------------------------------------------ Testimoni (stage) */
  $$('[data-bca-tstage]').forEach(function (st) {
    var slides = $$('.bca-tslide', st);
    var tabs = $$('.bca-ttab', st);
    var n = slides.length;
    if (!n) { return; }
    var cur = 0, timer = null, paused = false, hovering = false, visible = true;
    var dur = parseInt(st.getAttribute('data-autoplay'), 10) || 7500;
    var auto = !reduced && n > 1;
    var playBtn = $('[data-bca-tplay]', st);
    var nowEl = $('[data-bca-tnow]', st);
    st.style.setProperty('--ts-dur', dur + 'ms');
    if (!auto) { st.classList.add('no-auto'); }

    function schedule() {
      window.clearTimeout(timer);
      var bar = $('.bca-ttab.is-active .bca-ttab__bar', st);
      if (bar) { bar.style.animation = 'none'; void bar.offsetWidth; bar.style.animation = ''; }
      if (auto && !paused && !hovering && visible) { timer = window.setTimeout(function () { go(cur + 1); }, dur); }
    }
    function go(i) {
      cur = (i + n) % n;
      slides.forEach(function (s, k) {
        var on = k === cur;
        s.classList.toggle('is-active', on);
        s.setAttribute('aria-hidden', on ? 'false' : 'true');
      });
      tabs.forEach(function (t, k) {
        var on = k === cur;
        t.classList.toggle('is-active', on);
        t.setAttribute('aria-selected', on ? 'true' : 'false');
        t.setAttribute('tabindex', on ? '0' : '-1');
      });
      st.setAttribute('data-tone', slides[cur].getAttribute('data-tone'));
      if (nowEl) { nowEl.textContent = String(cur + 1); }
      schedule();
    }
    tabs.forEach(function (t, k) { t.addEventListener('click', function () { go(k); }); });
    $('[data-bca-tnext]', st).addEventListener('click', function () { go(cur + 1); });
    $('[data-bca-tprev]', st).addEventListener('click', function () { go(cur - 1); });
    var tablist = $('[role="tablist"]', st);
    if (tablist) {
      tablist.addEventListener('keydown', function (e) {
        if (e.key === 'ArrowRight' || e.key === 'ArrowLeft') {
          e.preventDefault();
          go(cur + (e.key === 'ArrowRight' ? 1 : -1));
          tabs[cur].focus();
        }
      });
    }
    if (playBtn) {
      playBtn.addEventListener('click', function () {
        paused = !paused;
        playBtn.setAttribute('aria-pressed', paused ? 'true' : 'false');
        playBtn.setAttribute('aria-label', paused ? 'Lanjutkan pergantian otomatis' : 'Jeda pergantian otomatis');
        $('[data-pause]', playBtn).hidden = paused;
        $('[data-play]', playBtn).hidden = !paused;
        st.classList.toggle('is-paused', paused);
        schedule();
      });
    }
    st.addEventListener('mouseenter', function () { hovering = true; st.classList.add('is-paused'); window.clearTimeout(timer); });
    st.addEventListener('mouseleave', function () { hovering = false; if (!paused) { st.classList.remove('is-paused'); } schedule(); });
    st.addEventListener('focusin', function () { hovering = true; st.classList.add('is-paused'); window.clearTimeout(timer); });
    st.addEventListener('focusout', function () { hovering = false; if (!paused) { st.classList.remove('is-paused'); } schedule(); });
    if ('IntersectionObserver' in window) {
      new IntersectionObserver(function (entries) {
        visible = entries[0].isIntersecting;
        if (visible) { schedule(); } else { window.clearTimeout(timer); }
      }, { threshold: 0.25 }).observe(st);
    }
    schedule();
  });

  /* ------------------------------------------- Status buka/tutup di footer */
  var status = $('[data-bca-status]');
  if (status) {
    try {
      var textEl = $('[data-bca-status-text]', status);
      var base = textEl.textContent;
      var days = status.getAttribute('data-days').split(',').map(Number);
      var toMin = function (s) { var a = s.split(':'); return parseInt(a[0], 10) * 60 + parseInt(a[1], 10); };
      var parts = new Intl.DateTimeFormat('en-US', { timeZone: status.getAttribute('data-tz'), weekday: 'short', hour: '2-digit', minute: '2-digit', hour12: false }).formatToParts(new Date());
      var pm = {};
      parts.forEach(function (p) { pm[p.type] = p.value; });
      var dayNum = { Sun: 0, Mon: 1, Tue: 2, Wed: 3, Thu: 4, Fri: 5, Sat: 6 }[pm.weekday];
      var minutes = (parseInt(pm.hour, 10) % 24) * 60 + parseInt(pm.minute, 10);
      var isOpen = days.indexOf(dayNum) !== -1 && minutes >= toMin(status.getAttribute('data-open')) && minutes < toMin(status.getAttribute('data-close'));
      status.classList.add(isOpen ? 'is-open' : 'is-closed');
      textEl.textContent = (isOpen ? 'Buka sekarang · ' : 'Sedang tutup · ') + base;
    } catch (err) { /* Intl tidak tersedia: tampilkan jam operasional biasa */ }
  }

  /* ------------------------------------- Scrollspy bar layanan (Services) */
  var spyLinks = $$('[data-bca-spy]');
  if (spyLinks.length && 'IntersectionObserver' in window) {
    var spyMap = {};
    spyLinks.forEach(function (a) { spyMap[a.getAttribute('data-bca-spy')] = a; });
    var spyIo = new IntersectionObserver(function (entries) {
      entries.forEach(function (en) {
        if (!en.isIntersecting) { return; }
        spyLinks.forEach(function (a) { a.classList.remove('is-active'); a.removeAttribute('aria-current'); });
        var a = spyMap[en.target.id];
        if (a) { a.classList.add('is-active'); a.setAttribute('aria-current', 'true'); }
      });
    }, { rootMargin: '-38% 0px -56% 0px', threshold: 0 });
    Object.keys(spyMap).forEach(function (id) { var s = doc.getElementById(id); if (s) { spyIo.observe(s); } });
  }

  /* ------------------------------------------------- Escape (satu listener) */
  doc.addEventListener('keydown', function (e) {
    if (e.key !== 'Escape') { return; }
    if (drawer && drawer.getAttribute('data-open') === 'true') { setDrawer(false); if (menuBtn) { menuBtn.focus(); } return; }
    if (moreMenu && moreMenu.getAttribute('data-open') === 'true') { setMore(false); if (moreBtn) { moreBtn.focus(); } return; }
    if (chat && !chat.hidden && !$('dialog[open]')) {
      chat.hidden = true; chat.setAttribute('data-open', 'false');
      if (floatBox) { floatBox.setAttribute('data-chat-open', 'false'); }
      if (chatBtn) { chatBtn.setAttribute('aria-expanded', 'false'); chatBtn.focus(); }
    }
  });
}());
