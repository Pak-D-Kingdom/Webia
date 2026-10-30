/* =========================================================================
   FreshWash - Laundry Classic Trust | laundry.js  (vanilla JS, tanpa dependensi)
   Data dari Blade: window.FRESHWASH = { wa, brand, bot, hours, areas, prices }
   Modul: nav | tabs+filter harga | status buka | form WhatsApp | coverage | chatbot
   ========================================================================= */
(function () {
  'use strict';

  var D = window.FRESHWASH || {};
  var $ = function (s, r) { return (r || document).querySelector(s); };
  var $$ = function (s, r) { return Array.prototype.slice.call((r || document).querySelectorAll(s)); };
  var waLink = function (text) { return 'https://wa.me/' + (D.wa || '') + '?text=' + encodeURIComponent(text); };
  var safe = function (fn) { try { return fn(); } catch (e) { return null; } };

  /* ---------- NAV ---------- */
  function initNav() {
    var nav = $('[data-nav]'); if (!nav) return;
    var menu = $('#menu'), burger = $('[data-nav-toggle]');
    var onScroll = function () { nav.classList.toggle('is-stuck', window.scrollY > 8); };
    onScroll(); window.addEventListener('scroll', onScroll, { passive: true });

    function setMenu(open) {
      menu.classList.toggle('is-open', open);
      burger.setAttribute('aria-expanded', String(open));
      burger.setAttribute('aria-label', open ? 'Tutup menu' : 'Buka menu');
      burger.querySelector('use').setAttribute('href', open ? '#i-close' : '#i-menu');
    }
    burger.addEventListener('click', function () { setMenu(!menu.classList.contains('is-open')); });

    $$('.sub-btn', nav).forEach(function (b) {
      b.addEventListener('click', function () {
        var li = b.closest('.has-sub'), open = !li.classList.contains('is-open');
        li.classList.toggle('is-open', open); b.setAttribute('aria-expanded', String(open));
      });
    });
    document.addEventListener('click', function (e) {
      if (!nav.contains(e.target)) { setMenu(false); $$('.has-sub.is-open', nav).forEach(function (li) { li.classList.remove('is-open'); }); }
    });
    window.addEventListener('resize', function () { if (window.innerWidth > 1180) setMenu(false); });

    var box = $('[data-search]', nav), input = box && $('input', box);
    var openS = $('[data-search-open]', nav), closeS = $('[data-search-close]', nav);
    if (box && openS) {
      openS.addEventListener('click', function () { box.hidden = !box.hidden; if (!box.hidden) input.focus(); });
      closeS.addEventListener('click', function () { box.hidden = true; openS.focus(); });
    }
    document.addEventListener('keydown', function (e) {
      if (e.key !== 'Escape') return;
      if (box && !box.hidden) { box.hidden = true; }
      setMenu(false);
    });
  }

  /* ---------- TABS (Per Item / Per Kg) + FILTER ---------- */
  function initTabs() {
    $$('[data-tabs]').forEach(function (root) {
      var tabs = $$('[data-tab]', root), panels = $$('[data-panel]', root);
      function show(name) {
        tabs.forEach(function (t) { var on = t.dataset.tab === name; t.classList.toggle('is-on', on); t.setAttribute('aria-selected', String(on)); });
        panels.forEach(function (p) { p.hidden = p.dataset.panel !== name; });
      }
      tabs.forEach(function (t) { t.addEventListener('click', function () { show(t.dataset.tab); }); });

      var filter = $('[data-price-filter]', root); if (!filter) return;
      function apply() {
        var q = filter.value.trim().toLowerCase(), hits = {};
        panels.forEach(function (p) {
          var n = 0;
          $$('tbody tr', p).forEach(function (tr) { var m = !q || tr.dataset.name.indexOf(q) > -1; tr.hidden = !m; if (m) n++; });
          var empty = $('[data-empty]', p); if (empty) empty.hidden = n > 0;
          hits[p.dataset.panel] = n;
        });
        var cur = tabs.filter(function (t) { return t.classList.contains('is-on'); })[0];
        if (q && cur && !hits[cur.dataset.tab]) { for (var k in hits) { if (hits[k]) { show(k); break; } } }
      }
      filter.addEventListener('input', apply);
      var q0 = new URLSearchParams(location.search).get('q');
      if (q0) { filter.value = q0; apply(); }
    });
  }

  /* ---------- STATUS BUKA / TUTUP + HARI INI (WIB) ---------- */
  function initHours() {
    var els = $$('[data-open-status]'), rows = $$('[data-dow]');
    if (!els.length && !rows.length) return;
    function nowWIB() {
      var p = {};
      new Intl.DateTimeFormat('en-GB', { timeZone: 'Asia/Jakarta', hour: '2-digit', minute: '2-digit', hour12: false, weekday: 'short' })
        .formatToParts(new Date()).forEach(function (x) { p[x.type] = x.value; });
      var map = { Sun: 0, Mon: 1, Tue: 2, Wed: 3, Thu: 4, Fri: 5, Sat: 6 };
      return { dow: map[p.weekday], min: parseInt(p.hour, 10) % 24 * 60 + parseInt(p.minute, 10) };
    }
    function toMin(s) { var a = String(s).replace(':', '.').split('.'); return parseInt(a[0], 10) * 60 + parseInt(a[1] || 0, 10); }
    function render() {
      var n = safe(nowWIB); if (!n) return;
      var o = toMin((D.hours || {}).open || '08.00'), c = toMin((D.hours || {}).close || '20.00'), open = n.min >= o && n.min < c;
      els.forEach(function (el) {
        el.classList.toggle('is-open', open); el.classList.toggle('is-closed', !open);
        $('[data-open-text]', el).textContent = open ? 'Buka sekarang' : 'Tutup - buka lagi pukul ' + D.hours.open;
      });
      rows.forEach(function (r) { r.classList.toggle('is-today', Number(r.dataset.dow) === n.dow); });
    }
    render(); setInterval(render, 60000);
  }

  /* ---------- FORM -> WHATSAPP ---------- */
  function initForms() {
    $$('[data-wa-form]').forEach(function (form) {
      var num = form.dataset.wa || D.wa, err = $('[data-form-error]', form);
      var pre = new URLSearchParams(location.search).get('layanan');
      if (pre && form.layanan) form.layanan.value = pre;

      form.addEventListener('submit', function (e) {
        e.preventDefault();
        var bad = [];
        $$('[required]', form).forEach(function (f) {
          var ok = f.value.trim() !== '';
          if (f.name === 'telp' && ok) ok = /^[0-9+\s-]{8,16}$/.test(f.value.trim());
          f.closest('.field').classList.toggle('is-bad', !ok); if (!ok) bad.push(f);
        });
        if (bad.length) {
          err.hidden = false; err.textContent = 'Mohon lengkapi data yang bertanda merah' + (form.telp.closest('.is-bad') ? ' (nomor WhatsApp 8-16 digit).' : '.');
          bad[0].focus(); return;
        }
        err.hidden = true;
        var opt = form.layanan.options[form.layanan.selectedIndex];
        var extra = $$('input[name="opsi"]:checked', form).map(function (i) { return i.value; }).join(', ') || '-';
        var msg = ['Halo ' + D.brand + ', saya ingin memesan laundry.', '',
          'Nama: ' + form.nama.value.trim(), 'No. WhatsApp: ' + form.telp.value.trim(),
          'Layanan: ' + (opt.dataset.label || opt.text), 'Service option: ' + extra,
          'Area: ' + form.area.value, 'Alamat: ' + form.alamat.value.trim(),
          'Catatan: ' + (form.catatan.value.trim() || '-')].join('\n');
        window.open('https://wa.me/' + num + '?text=' + encodeURIComponent(msg), '_blank', 'noopener');
      });
      form.addEventListener('input', function (e) { var f = e.target.closest('.field'); if (f) f.classList.remove('is-bad'); });
    });
  }

  /* ---------- COVERAGE ---------- */
  function initCoverage() {
    var map = $('[data-map]');
    function focusArea(name) {
      $$('[data-area]').forEach(function (p) { p.classList.toggle('is-on', p.dataset.area === name); });
      $$('[data-area-card]').forEach(function (c) { c.classList.toggle('is-on', c.dataset.areaCard === name); });
    }
    if (map) {
      $$('[data-area]', map).forEach(function (p) { p.addEventListener('click', function () { focusArea(p.dataset.area); }); });
      $$('[data-area-card]').forEach(function (c) { c.addEventListener('click', function () { focusArea(c.dataset.areaCard); }); });
    }
    var form = $('[data-area-check]'); if (!form) return;
    var res = $('[data-area-result]', form);
    form.addEventListener('submit', function (e) {
      e.preventDefault();
      var v = form.area.value.trim().toLowerCase(); if (!v) { res.className = 'checker__res no'; res.textContent = 'Ketik nama kota atau kecamatan terlebih dahulu.'; return; }
      var hit = (D.areas || []).filter(function (a) { return v.indexOf(a.toLowerCase()) > -1 || a.toLowerCase().indexOf(v) > -1; })[0];
      res.textContent = '';
      if (hit) {
        res.className = 'checker__res ok'; res.textContent = 'Area ' + hit + ' masuk jangkauan jemput & antar kami.'; focusArea(hit);
      } else {
        res.className = 'checker__res no';
        res.appendChild(document.createTextNode('Area belum terdaftar. '));
        var a = document.createElement('a'); a.href = waLink('Halo FreshWash, apakah area ' + form.area.value.trim() + ' bisa dijangkau?'); a.target = '_blank'; a.rel = 'noopener'; a.textContent = 'Tanya tim kami';
        res.appendChild(a);
      }
    });
  }

  /* ---------- CHATBOT (FreshBot) ---------- */
  function initBot() {
    var panel = $('[data-bot]'); if (!panel) return;
    var B = D.bot || { faq: [] }, log = $('[data-bot-log]', panel), form = $('[data-bot-form]', panel), input = $('input', form);
    var fab = $('[data-bot-bubble]') && $('[data-bot-bubble]').parentNode, started = false, busy = false, lastFocus = null;

    function add(text, who, link) {
      var m = document.createElement('div'); m.className = 'msg msg--' + who; m.textContent = text;
      if (link) { var a = document.createElement('a'); a.href = link; a.target = '_blank'; a.rel = 'noopener'; a.textContent = 'Chat via WhatsApp'; m.appendChild(document.createElement('br')); m.appendChild(a); }
      log.appendChild(m); log.scrollTop = log.scrollHeight; return m;
    }
    function answer(q) {
      var t = q.toLowerCase(), best = null, score = 0;
      if (/^(halo|hai|hi|hello|selamat)\b/.test(t) && t.length < 24) return { a: 'Halo! Ada yang bisa aku bantu soal harga atau proses laundry?' };
      (B.faq || []).forEach(function (f) {
        var s = f.k.reduce(function (n, k) { return n + (t.indexOf(k) > -1 ? 1 : 0); }, 0);
        if (s > score) { score = s; best = f; }
      });
      return best ? { a: best.a } : { a: B.fallback, wa: waLink('Halo ' + D.brand + ', saya ingin bertanya: ' + q) };
    }
    function ask(q) {
      q = (q || '').trim(); if (!q || busy) return;
      busy = true; add(q, 'me');
      var typing = document.createElement('div'); typing.className = 'msg msg--bot msg--typing'; typing.innerHTML = '<i></i><i></i><i></i>';
      log.appendChild(typing); log.scrollTop = log.scrollHeight;
      var r = answer(q);
      setTimeout(function () { typing.remove(); add(r.a, 'bot', r.wa); busy = false; }, 650);
    }
    function open(q) {
      lastFocus = document.activeElement; panel.hidden = false; document.body.classList.add('bot-open');
      if (!started) { started = true; add(B.greeting, 'bot'); }
      var openers = $$('[data-bot-open]'); openers.forEach(function (o) { o.setAttribute('aria-expanded', 'true'); });
      if (q) ask(q); else setTimeout(function () { input.focus(); }, 50);
    }
    function close() {
      panel.hidden = true; document.body.classList.remove('bot-open');
      $$('[data-bot-open]').forEach(function (o) { o.setAttribute('aria-expanded', 'false'); });
      if (lastFocus && lastFocus.focus) lastFocus.focus();
    }

    $$('[data-bot-open]').forEach(function (b) { b.addEventListener('click', function () { open(); }); });
    $$('[data-bot-close]', panel).forEach(function (b) { b.addEventListener('click', close); });
    document.addEventListener('keydown', function (e) { if (e.key === 'Escape' && !panel.hidden) close(); });
    $$('[data-bot-ask]').forEach(function (b) {
      b.addEventListener('click', function () { if (panel.hidden) open(b.dataset.botAsk); else ask(b.dataset.botAsk); });
    });
    form.addEventListener('submit', function (e) { e.preventDefault(); var v = input.value; input.value = ''; ask(v); });
    $$('[data-bot-inline]').forEach(function (f) {
      f.addEventListener('submit', function (e) { e.preventDefault(); var i = $('input', f), v = i.value; i.value = ''; open(v || undefined); });
    });

    // petunjuk kecil di tombol chatbot (sekali per sesi)
    var seen = safe(function () { return sessionStorage.getItem('fw-bot-hint'); });
    if (fab && !seen) {
      setTimeout(function () { fab.classList.add('is-hint'); safe(function () { sessionStorage.setItem('fw-bot-hint', '1'); }); }, 3500);
      setTimeout(function () { fab.classList.remove('is-hint'); }, 9000);
    }
  }

  function init() { initNav(); initTabs(); initHours(); initForms(); initCoverage(); initBot(); }
  if (document.readyState === 'loading') document.addEventListener('DOMContentLoaded', init); else init();
})();
