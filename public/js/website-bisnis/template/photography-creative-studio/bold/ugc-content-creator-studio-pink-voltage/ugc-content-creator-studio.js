/* UGC & Content Creator Studio, interaksi statis (tanpa backend) */
(function () {
  'use strict';
  var d = document;
  var $ = function (s, c) { return (c || d).querySelector(s); };
  var $$ = function (s, c) { return Array.prototype.slice.call((c || d).querySelectorAll(s)); };
  var U = window.UGC || { wa: '', faq: [] };
  var reduce = window.matchMedia && matchMedia('(prefers-reduced-motion: reduce)').matches;

  /* menu seluler */
  var mm = $('.mm'), tg = $('.tg');
  function menu(o) {
    if (!mm || !tg) return;
    mm.classList.toggle('on', o);
    tg.setAttribute('aria-expanded', String(o));
    d.body.style.overflow = o ? 'hidden' : '';
  }
  if (tg) tg.addEventListener('click', function () { menu(!mm.classList.contains('on')); });

  /* penghitung angka */
  function count(el) {
    var t = +el.getAttribute('data-count'), s = el.getAttribute('data-suf') || '', n = 0, st = Math.max(1, Math.ceil(t / 45));
    var fmt = function (v) { return v.toLocaleString('id-ID') + s; };
    if (reduce) { el.textContent = fmt(t); return; }
    var iv = setInterval(function () { n += st; if (n >= t) { n = t; clearInterval(iv); } el.textContent = fmt(n); }, 28);
  }
  var io = 'IntersectionObserver' in window ? new IntersectionObserver(function (es) {
    es.forEach(function (e) { if (e.isIntersecting) { count(e.target); io.unobserve(e.target); } });
  }, { threshold: .4 }) : null;
  $$('[data-count]').forEach(function (el) { if (io) io.observe(el); else count(el); });

  /* routing pratinjau (hanya jika body[data-spa]); di Laravel tiap halaman punya URL sendiri */
  var spa = d.body.hasAttribute('data-spa');
  function route() {
    var h = (location.hash || '#home').slice(1), pg = h;
    if (spa) {
      if (!$('[data-page="' + h + '"]')) pg = 'home';
      $$('[data-page]').forEach(function (p) { p.hidden = p.getAttribute('data-page') !== pg; });
      $$('.nl a,.mm a,.pn a').forEach(function (a) { a.classList.toggle('on', a.getAttribute('href') === '#' + pg); });
      window.scrollTo(0, 0);
    } else {
      var cur = location.pathname.replace(/\/$/, '');
      $$('.nl a,.mm a,.pn a').forEach(function (a) { a.classList.toggle('on', a.pathname.replace(/\/$/, '') === cur); });
    }
    menu(false);
  }
  addEventListener('hashchange', route);
  route();

  /* asisten AI (FAQ lokal berbasis kata kunci) */
  var cp = $('.cp');
  if (cp) {
    var cm = $('.cm', cp), cc = $('.cc', cp), cf = $('form', cp), ci = $('input', cf);
    var say = function (w, t) {
      var p = d.createElement('p'); p.className = 'm ' + w; p.textContent = t; cm.appendChild(p); cm.scrollTop = cm.scrollHeight;
    };
    var find = function (q) {
      q = q.toLowerCase(); var best = null, sc = 0;
      (U.faq || []).forEach(function (f) { var s = 0; f.k.forEach(function (k) { if (q.indexOf(k) > -1) s++; }); if (s > sc) { sc = s; best = f; } });
      return best ? best.a : null;
    };
    var typing = function () {
      var p = d.createElement('p'); p.className = 'm ai typing'; p.innerHTML = '<i></i><i></i><i></i>'; cm.appendChild(p); cm.scrollTop = cm.scrollHeight; return p;
    };
    var ask = function (q) {
      say('me', q);
      var t = typing();
      setTimeout(function () {
        t.remove();
        say('ai', find(q) || 'Pertanyaan ini perlu dijawab tim kami langsung. Klik tombol WhatsApp di bawah untuk diskusi brief Anda.');
      }, reduce ? 0 : 750);
    };
    (U.faq || []).slice(0, 4).forEach(function (f) {
      var b = d.createElement('button'); b.type = 'button'; b.textContent = f.q;
      b.addEventListener('click', function () { ask(f.q); }); cc.appendChild(b);
    });
    var gr = $('.greet'), bt = $('.bot');
    var chat = function (o) {
      cp.classList.toggle('on', o);
      if (bt) bt.setAttribute('aria-expanded', String(o));
      if (gr) gr.hidden = true;
      if (o) { if (!cm.children.length) say('ai', 'Halo, saya asisten VOLT. Tanya soal paket, harga, hak guna konten, atau alur kolaborasi.'); ci.focus(); }
    };
    if (gr) {
      setTimeout(function () { if (!cp.classList.contains('on')) { gr.hidden = false; setTimeout(function () { gr.hidden = true; }, 9000); } }, 3500);
      $('[data-close-greet]', gr).addEventListener('click', function () { gr.hidden = true; });
    }
    $$('[data-open-chat]').forEach(function (b) { b.addEventListener('click', function () { chat(!cp.classList.contains('on') || b.classList.contains('btn')); }); });
    $('[data-close]', cp).addEventListener('click', function () { chat(false); });
    d.addEventListener('keydown', function (e) { if (e.key === 'Escape') { chat(false); menu(false); } });
    cf.addEventListener('submit', function (e) { e.preventDefault(); var v = ci.value.trim(); if (v) { ask(v); ci.value = ''; } });
  }

  /* dropdown kustom (listbox, bisa dipakai keyboard) */
  var ddOpen = null;
  function closeDD() {
    if (!ddOpen) return;
    ddOpen.classList.remove('on'); $('.ddb', ddOpen).setAttribute('aria-expanded', 'false'); $('.ddl', ddOpen).hidden = true; ddOpen = null;
  }
  $$('[data-dd]').forEach(function (dd) {
    var b = $('.ddb', dd), l = $('.ddl', dd), h = $('input', dd), opts = $$('li', l), idx = 0;
    var pick = function (i) {
      idx = i;
      opts.forEach(function (o, k) { o.setAttribute('aria-selected', String(k === i)); });
      h.value = opts[i].getAttribute('data-v'); $('span', b).textContent = h.value;
    };
    var show = function (o) {
      closeDD(); if (!o) return;
      dd.classList.add('on'); b.setAttribute('aria-expanded', 'true'); l.hidden = false; ddOpen = dd;
    };
    b.addEventListener('click', function (e) { e.stopPropagation(); show(!dd.classList.contains('on')); });
    opts.forEach(function (o, i) { o.addEventListener('click', function () { pick(i); closeDD(); b.focus(); }); });
    b.addEventListener('keydown', function (e) {
      var on = dd.classList.contains('on');
      if (e.key === 'ArrowDown' || e.key === 'ArrowUp') {
        e.preventDefault();
        if (!on) show(true); else pick(Math.min(opts.length - 1, Math.max(0, idx + (e.key === 'ArrowDown' ? 1 : -1))));
      } else if ((e.key === 'Enter' || e.key === ' ') && on) { e.preventDefault(); closeDD(); }
    });
  });
  d.addEventListener('click', function (e) { if (ddOpen && !ddOpen.contains(e.target)) closeDD(); });
  d.addEventListener('keydown', function (e) { if (e.key === 'Escape') closeDD(); });

  /* formulir brief: validasi per kolom, lalu kirim lewat WhatsApp */
  var f = $('#brief');
  if (f) {
    var rules = {
      nama: [/\S/, 'Nama wajib diisi'], brand: [/\S/, 'Nama brand wajib diisi'],
      email: [/^\S+@\S+\.\S+$/, 'Format email belum benar'], wa: [/^[0-9+\s-]{9,18}$/, 'Isi nomor WhatsApp yang valid'],
      brief: [/^[\s\S]{10,}$/, 'Brief minimal 10 karakter']
    };
    var check = function (i) {
      var r = rules[i.name], ok = !r || r[0].test(i.value.trim()), fd = i.closest('.fd'), er = $('.er', fd);
      fd.classList.toggle('bad', !ok); i.setAttribute('aria-invalid', String(!ok)); if (er) er.textContent = ok ? '' : r[1];
      return ok;
    };
    $$('.fi', f).forEach(function (i) {
      i.addEventListener('input', function () { if (i.closest('.fd').classList.contains('bad')) check(i); });
      i.addEventListener('blur', function () { if (i.value) check(i); });
    });
    f.addEventListener('submit', function (e) {
      e.preventDefault();
      var ok = true;
      $$('.fi', f).forEach(function (i) { if (!check(i)) ok = false; });
      if (!ok) { var first = $('.fd.bad .fi', f); if (first) first.focus(); return; }
      var g = function (n) { return f.elements[n].value.trim(); };
      var msg = 'Halo VOLT Studio, saya ' + g('nama') + ' dari ' + g('brand') + '.\nPaket: ' + g('paket') + '\nPlatform: ' + g('platform') + '\nBudget: ' + g('budget') + '\nBrief: ' + g('brief') + '\nEmail: ' + g('email') + '\nWhatsApp: ' + g('wa');
      window.open('https://wa.me/' + U.wa + '?text=' + encodeURIComponent(msg), '_blank', 'noopener');
      $('.fok', f).hidden = false;
    });
  }
})();
