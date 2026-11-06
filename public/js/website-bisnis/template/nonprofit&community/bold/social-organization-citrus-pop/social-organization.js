(function () {
  'use strict';
  var $ = function (s, r) { return (r || document).querySelector(s); };
  var $$ = function (s, r) { return Array.prototype.slice.call((r || document).querySelectorAll(s)); };

  /* Navigasi mobile + tautan aktif */
  var burger = $('[data-burger]'), menu = $('[data-menu]');
  if (burger && menu) {
    burger.addEventListener('click', function () {
      var open = menu.classList.toggle('open');
      burger.setAttribute('aria-expanded', open ? 'true' : 'false');
    });
  }
  var path = location.pathname.replace(/\/+$/, '');
  $$('.menu a:not(.btn)').forEach(function (a) {
    var p = a.pathname.replace(/\/+$/, '');
    if (p === path) a.classList.add('on');
  });

  /* Lightbox galeri */
  var box = $('[data-lbox]');
  if (box) {
    var im = $('img', box), cp = $('figcaption', box);
    var close = function () { box.hidden = true; };
    $$('[data-lb]').forEach(function (b) {
      b.addEventListener('click', function () {
        im.src = b.getAttribute('data-lb'); im.alt = b.getAttribute('data-cap');
        cp.textContent = b.getAttribute('data-cap'); box.hidden = false;
        $('[data-lb-close]', box).focus();
      });
    });
    $('[data-lb-close]', box).addEventListener('click', close);
    box.addEventListener('click', function (e) { if (e.target === box) close(); });
    document.addEventListener('keydown', function (e) { if (e.key === 'Escape') close(); });
  }

  /* Filter agenda */
  $$('[data-f]').forEach(function (btn) {
    btn.addEventListener('click', function () {
      $$('[data-f]').forEach(function (x) { x.classList.toggle('on', x === btn); });
      var f = btn.getAttribute('data-f');
      $$('.ev').forEach(function (e) { e.hidden = f !== 'all' && e.getAttribute('data-c') !== f; });
    });
  });

  /* Formulir statis: validasi lalu lanjut ke WhatsApp */
  var wa = document.body.getAttribute('data-wa');
  $$('[data-wa-form]').forEach(function (form) {
    var msg = $('[data-msg]', form);
    form.addEventListener('submit', function (e) {
      e.preventDefault();
      var ok = true, lines = [form.getAttribute('data-intro') || 'Halo SegarKita,'];
      $$('input,select,textarea', form).forEach(function (f) {
        var v = f.value.trim(), bad = f.required && !v;
        if (f.pattern && v && !new RegExp('^(?:' + f.pattern + ')$').test(v)) bad = true;
        f.setAttribute('aria-invalid', bad ? 'true' : 'false');
        if (f.tagName === 'SELECT') f.parentNode.classList.toggle('bad', bad);
        if (bad) ok = false; else if (v) lines.push(f.name + ': ' + v);
      });
      if (!ok) { msg.textContent = 'Lengkapi kolom yang bertanda merah dulu ya.'; return; }
      msg.textContent = 'Terima kasih! Kami buka WhatsApp untuk mengirim pesanmu.';
      window.open('https://wa.me/' + wa + '?text=' + encodeURIComponent(lines.join('\n')), '_blank', 'noopener');
      form.reset();
    });
  });

  /* Bibi Lebah: asisten FAQ program & partisipasi */
  var panel = $('[data-chat]'), log = $('[data-chat-log]'), chips = $('[data-chat-chips]'), cf = $('[data-chat-form]');
  var faqs = []; try { faqs = JSON.parse($('#faq-data').textContent); } catch (err) { faqs = []; }
  var say = function (t, me) {
    var d = document.createElement('div'); d.className = 'm ' + (me ? 'me' : 'bot-m'); d.textContent = t;
    log.appendChild(d); log.scrollTop = log.scrollHeight;
  };
  var norm = function (s) { return s.toLowerCase().replace(/[^a-z0-9 ]/g, ' ').split(/\s+/).filter(function (w) { return w.length > 2; }); };
  var answer = function (q) {
    var qs = norm(q), best = null, top = 0;
    faqs.forEach(function (f) {
      var hay = norm(f.q + ' ' + f.a), s = 0;
      qs.forEach(function (w) { if (hay.indexOf(w) > -1) s++; });
      if (s > top) { top = s; best = f; }
    });
    return best && top > 0 ? best.a : 'Hmm, aku belum punya jawabannya. Coba tanya lewat WhatsApp, tim kami siap membantu.';
  };
  var ask = function (q) { say(q, true); setTimeout(function () { say(answer(q)); }, 350); };
  var started = false;
  var toggle = function (show) {
    if (!panel) return;
    panel.hidden = !show;
    document.body.classList.toggle('chat-open', show);
    if (show && !started) {
      started = true; say('Halo, aku Bibi Lebah! Mau tanya apa soal program atau cara ikut bergabung?');
      faqs.slice(0, 3).forEach(function (f) {
        var b = document.createElement('button'); b.type = 'button'; b.textContent = f.q;
        b.addEventListener('click', function () { ask(f.q); }); chips.appendChild(b);
      });
    }
    if (show) $('input', cf).focus();
  };
  $$('[data-chat-open]').forEach(function (b) { b.addEventListener('click', function () { toggle(panel.hidden); }); });
  var cl = $('[data-chat-close]'); if (cl) cl.addEventListener('click', function () { toggle(false); });
  if (cf) cf.addEventListener('submit', function (e) {
    e.preventDefault(); var i = $('input', cf), v = i.value.trim(); if (!v) return; i.value = ''; ask(v);
  });

  document.addEventListener('keydown', function (e) { if (e.key === 'Escape' && panel && !panel.hidden) toggle(false); });

  /* Dropdown kustom (select asli tetap dipakai untuk nilai formulir) */
  var openDd = null;
  $$('.frm select').forEach(function (sel, n) {
    var wrap = document.createElement('div'); wrap.className = 'dd';
    var btn = document.createElement('button'); btn.type = 'button'; btn.className = 'dd-b';
    btn.setAttribute('aria-haspopup', 'listbox'); btn.setAttribute('aria-expanded', 'false');
    var list = document.createElement('ul'); list.className = 'dd-l'; list.setAttribute('role', 'listbox'); list.hidden = true;
    sel.parentNode.insertBefore(wrap, sel); wrap.appendChild(btn); wrap.appendChild(sel); wrap.appendChild(list);
    sel.tabIndex = -1; sel.setAttribute('aria-hidden', 'true');
    var ph = sel.options[0] && sel.options[0].value === '' ? sel.options[0].text : 'Pilih';
    var opts = Array.prototype.filter.call(sel.options, function (o) { return o.value !== ''; });
    var act = 0, lis = opts.map(function (o, i) {
      var li = document.createElement('li'); li.setAttribute('role', 'option'); li.id = 'dd' + n + '-' + i; li.textContent = o.text;
      li.addEventListener('click', function (e) { e.preventDefault(); choose(i); btn.focus(); });
      list.appendChild(li); return li;
    });
    function render() {
      var sIdx = opts.findIndex(function (o) { return o.value === sel.value; });
      btn.textContent = sIdx > -1 ? opts[sIdx].text : ph;
      if (sIdx > -1) btn.removeAttribute('data-empty'); else btn.setAttribute('data-empty', '');
      lis.forEach(function (li, i) { li.setAttribute('aria-selected', i === sIdx ? 'true' : 'false'); });
      return sIdx;
    }
    function mark(i) {
      act = Math.max(0, Math.min(lis.length - 1, i));
      lis.forEach(function (li, k) { li.classList.toggle('act', k === act); });
      btn.setAttribute('aria-activedescendant', lis[act].id); lis[act].scrollIntoView({ block: 'nearest' });
    }
    function open() {
      if (openDd && openDd !== close) openDd();
      list.hidden = false; wrap.classList.add('open'); btn.setAttribute('aria-expanded', 'true'); openDd = close; mark(Math.max(0, render()));
    }
    function close() {
      list.hidden = true; wrap.classList.remove('open'); btn.setAttribute('aria-expanded', 'false');
      btn.removeAttribute('aria-activedescendant'); if (openDd === close) openDd = null;
    }
    function choose(i) {
      sel.value = opts[i].value; sel.setAttribute('aria-invalid', 'false'); wrap.classList.remove('bad');
      sel.dispatchEvent(new Event('change', { bubbles: true })); render(); close();
    }
    btn.addEventListener('click', function () { if (list.hidden) open(); else close(); });
    btn.addEventListener('keydown', function (e) {
      var k = e.key;
      if (k === 'ArrowDown' || k === 'ArrowUp') { e.preventDefault(); if (list.hidden) open(); else mark(act + (k === 'ArrowDown' ? 1 : -1)); }
      else if (k === 'Home' && !list.hidden) { e.preventDefault(); mark(0); }
      else if (k === 'End' && !list.hidden) { e.preventDefault(); mark(lis.length - 1); }
      else if ((k === 'Enter' || k === ' ') && !list.hidden) { e.preventDefault(); choose(act); }
      else if (k === 'Escape' && !list.hidden) { e.stopPropagation(); close(); }
      else if (k === 'Tab') close();
    });
    sel.form.addEventListener('reset', function () { setTimeout(render, 0); });
    render();
  });
  document.addEventListener('click', function (e) { if (openDd && !e.target.closest('.dd')) openDd(); });
})();
