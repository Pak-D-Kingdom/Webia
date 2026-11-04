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
    if (show && !started) {
      started = true; say('Halo, aku Bibi Lebah! Mau tanya apa soal program atau cara ikut bergabung?');
      faqs.slice(0, 4).forEach(function (f) {
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
})();
