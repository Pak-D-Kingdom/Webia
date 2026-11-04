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
      menu.classList.toggle('is-open', open); document.body.classList.toggle('nav-open', open);
      burger.setAttribute('aria-expanded', String(open));
      burger.setAttribute('aria-label', open ? 'Tutup menu' : 'Buka menu');
      burger.querySelector('use').setAttribute('href', open ? '#i-close' : '#i-menu');
    }
    burger.addEventListener('click', function () { setMenu(!menu.classList.contains('is-open')); });

    document.addEventListener('click', function (e) {
      if (!nav.contains(e.target)) setMenu(false);
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

  /* ---------- DROPDOWN (submenu navbar + bahasa) ---------- */
  function initDropdowns() {
    var SEL = '[data-dropdown], .has-sub';
    function closeAll(except) {
      $$(SEL).forEach(function (r) {
        if (r === except) return;
        r.classList.remove('is-open');
        var b = $('.lang__btn, .sub-btn', r); if (b) b.setAttribute('aria-expanded', 'false');
      });
    }
    $$('.lang__btn, .sub-btn').forEach(function (b) {
      b.addEventListener('click', function (e) {
        e.stopPropagation();
        var r = b.closest(SEL), open = !r.classList.contains('is-open');
        closeAll(r); r.classList.toggle('is-open', open); b.setAttribute('aria-expanded', String(open));
      });
    });
    document.addEventListener('click', function (e) { if (!e.target.closest(SEL)) closeAll(); });
    document.addEventListener('keydown', function (e) { if (e.key === 'Escape') closeAll(); });
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
          (bad[0]._btn || bad[0]).focus(); return;
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

  /* ---------- DROPDOWN FORM: select kustom ---------- */
  var openSel = null;
  function closeSel() { if (openSel) { openSel.wrap.classList.remove('is-open'); openSel.btn.setAttribute('aria-expanded', 'false'); openSel.btn.removeAttribute('aria-activedescendant'); openSel = null; } }
  function initSelects() {
    $$('.field select').forEach(function (sel, n) {
      if (sel.dataset.enhanced) return; sel.dataset.enhanced = '1';
      var wrap = document.createElement('div'); wrap.className = 'sel';
      sel.parentNode.insertBefore(wrap, sel); wrap.appendChild(sel);
      sel.tabIndex = -1; sel.setAttribute('aria-hidden', 'true');
      var id = 'sel' + n, labelEl = sel.closest('.field').querySelector('span');
      var btn = document.createElement('button'); btn.type = 'button'; btn.className = 'sel__btn'; btn.id = id + '-b';
      btn.setAttribute('aria-haspopup', 'listbox'); btn.setAttribute('aria-expanded', 'false'); btn.setAttribute('aria-controls', id);
      if (labelEl) { labelEl.id = labelEl.id || id + '-l'; btn.setAttribute('aria-labelledby', labelEl.id + ' ' + btn.id); labelEl.addEventListener('click', function (e) { e.preventDefault(); btn.focus(); }); }
      var txt = document.createElement('span'); btn.appendChild(txt);
      btn.insertAdjacentHTML('beforeend', '<svg class="ic" aria-hidden="true"><use href="#i-chev"/></svg>');
      var list = document.createElement('ul'); list.className = 'sel__list'; list.id = id; list.setAttribute('role', 'listbox');
      wrap.appendChild(btn); wrap.appendChild(list); sel._btn = btn;
      var items = [], cur = 0, typed = '', typedAt = 0;
      Array.prototype.forEach.call(sel.options, function (o, i) {
        var li = document.createElement('li'); li.className = 'sel__opt' + (o.value === '' ? ' is-empty' : ''); li.id = id + '-o' + i;
        li.setAttribute('role', 'option'); li.innerHTML = '<span></span><svg class="ic" aria-hidden="true"><use href="#i-check"/></svg>'; li.firstChild.textContent = o.text;
        li.addEventListener('mousedown', function (e) { e.preventDefault(); });
        li.addEventListener('click', function () { choose(i); });
        li.addEventListener('mousemove', function () { setCur(i); });
        list.appendChild(li); items.push(li);
      });
      function sync() {
        var i = sel.selectedIndex < 0 ? 0 : sel.selectedIndex; txt.textContent = sel.options[i].text;
        btn.classList.toggle('has-value', sel.value !== '');
        items.forEach(function (li, k) { li.setAttribute('aria-selected', String(k === i)); li.lastChild.style.visibility = k === i && sel.value !== '' ? 'visible' : 'hidden'; });
      }
      function setCur(i) {
        cur = Math.max(0, Math.min(items.length - 1, i));
        items.forEach(function (li, k) { li.classList.toggle('is-active', k === cur); });
        btn.setAttribute('aria-activedescendant', items[cur].id); items[cur].scrollIntoView({ block: 'nearest' });
      }
      function open() {
        closeSel(); var r = btn.getBoundingClientRect();
        wrap.classList.toggle('is-up', window.innerHeight - r.bottom < 280 && r.top > 300);
        wrap.classList.add('is-open'); btn.setAttribute('aria-expanded', 'true'); openSel = { wrap: wrap, btn: btn };
        setCur(sel.selectedIndex < 0 ? 0 : sel.selectedIndex);
      }
      function choose(i) {
        sel.selectedIndex = i; sync(); closeSel(); btn.focus();
        sel.dispatchEvent(new Event('input', { bubbles: true })); sel.dispatchEvent(new Event('change', { bubbles: true }));
      }
      btn.addEventListener('click', function () { if (wrap.classList.contains('is-open')) closeSel(); else open(); });
      btn.addEventListener('keydown', function (e) {
        var isOpen = wrap.classList.contains('is-open'), k = e.key;
        if (k === 'ArrowDown' || k === 'ArrowUp') { e.preventDefault(); if (!isOpen) open(); else setCur(cur + (k === 'ArrowDown' ? 1 : -1)); }
        else if (k === 'Home' && isOpen) { e.preventDefault(); setCur(0); }
        else if (k === 'End' && isOpen) { e.preventDefault(); setCur(items.length - 1); }
        else if ((k === 'Enter' || k === ' ') && isOpen) { e.preventDefault(); choose(cur); }
        else if (k === 'Escape' && isOpen) { e.preventDefault(); e.stopPropagation(); closeSel(); }
        else if (k === 'Tab') closeSel();
        else if (k.length === 1 && /\S/.test(k)) {
          var now = Date.now(); typed = (now - typedAt > 700 ? '' : typed) + k.toLowerCase(); typedAt = now;
          for (var i = 0; i < items.length; i++) { if (sel.options[i].text.toLowerCase().indexOf(typed) === 0) { if (!isOpen) open(); setCur(i); break; } }
        }
      });
      sel.addEventListener('change', sync); sync();
    });
    document.addEventListener('click', function (e) { if (openSel && !openSel.wrap.contains(e.target)) closeSel(); });
  }

  /* ---------- SARAN AREA (cek area layanan) ---------- */
  function initSuggest() {
    var input = $('[data-area-check] input[name="area"]'); if (!input || !(D.areas || []).length) return;
    input.removeAttribute('list'); var dl = $('#area-list'); if (dl) dl.remove();
    input.setAttribute('autocomplete', 'off'); input.setAttribute('role', 'combobox'); input.setAttribute('aria-expanded', 'false'); input.setAttribute('aria-autocomplete', 'list');
    var wrap = document.createElement('div'); wrap.className = 'sel'; input.parentNode.insertBefore(wrap, input); wrap.appendChild(input);
    var list = document.createElement('ul'); list.className = 'sel__list'; list.id = 'area-suggest'; list.setAttribute('role', 'listbox'); wrap.appendChild(list); input.setAttribute('aria-controls', list.id);
    var cur = -1, shown = [];
    function render() {
      var q = input.value.trim().toLowerCase(); shown = D.areas.filter(function (a) { return !q || a.toLowerCase().indexOf(q) > -1; });
      list.innerHTML = ''; cur = -1;
      if (!shown.length) { list.innerHTML = '<li class="sel__empty">Area belum terdaftar. Tekan "Cek Area" untuk bertanya ke tim kami.</li>'; }
      shown.forEach(function (a, i) {
        var li = document.createElement('li'); li.className = 'sel__opt'; li.setAttribute('role', 'option'); li.id = 'area-o' + i;
        li.innerHTML = '<span></span><svg class="ic" aria-hidden="true"><use href="#i-pin"/></svg>'; li.firstChild.textContent = a;
        li.addEventListener('mousedown', function (e) { e.preventDefault(); pick(i); });
        list.appendChild(li);
      });
      wrap.classList.add('is-open'); input.setAttribute('aria-expanded', 'true');
    }
    function hide() { wrap.classList.remove('is-open'); input.setAttribute('aria-expanded', 'false'); input.removeAttribute('aria-activedescendant'); }
    function mark(i) { cur = i; $$('.sel__opt', list).forEach(function (li, k) { li.classList.toggle('is-active', k === i); }); if (i > -1) { input.setAttribute('aria-activedescendant', 'area-o' + i); $$('.sel__opt', list)[i].scrollIntoView({ block: 'nearest' }); } }
    function pick(i) { input.value = shown[i]; hide(); input.dispatchEvent(new Event('input', { bubbles: true })); }
    input.addEventListener('focus', render); input.addEventListener('input', render);
    input.addEventListener('blur', function () { setTimeout(hide, 120); });
    input.addEventListener('keydown', function (e) {
      var open = wrap.classList.contains('is-open');
      if (e.key === 'ArrowDown') { e.preventDefault(); if (!open) render(); mark(Math.min(shown.length - 1, cur + 1)); }
      else if (e.key === 'ArrowUp') { e.preventDefault(); mark(Math.max(0, cur - 1)); }
      else if (e.key === 'Enter' && open && cur > -1) { e.preventDefault(); pick(cur); }
      else if (e.key === 'Escape' && open) { e.stopPropagation(); hide(); }
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
    var fab = $('[data-fl-bot]'), started = false, busy = false, lastFocus = null;

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
      lastFocus = document.activeElement; panel.hidden = false; if (fab) fab.classList.remove('is-hint'); document.body.classList.add('bot-open');
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

    // label petunjuk tombol melayang (sekali per sesi): WhatsApp dulu, lalu FreshBot
    var wa = $('[data-fl-wa]'), seen = safe(function () { return sessionStorage.getItem('fw-hint'); });
    function hint(el, on, off) {
      if (!el) return;
      setTimeout(function () { if (panel.hidden) el.classList.add('is-hint'); }, on);
      setTimeout(function () { el.classList.remove('is-hint'); }, off);
    }
    if (!seen) { hint(wa, 1800, 5200); hint(fab, 6800, 12500); safe(function () { sessionStorage.setItem('fw-hint', '1'); }); }
  }

  function init() { initNav(); initDropdowns(); initTabs(); initHours(); initForms(); initSelects(); initCoverage(); initSuggest(); initBot(); }
  if (document.readyState === 'loading') document.addEventListener('DOMContentLoaded', init); else init();
})();
