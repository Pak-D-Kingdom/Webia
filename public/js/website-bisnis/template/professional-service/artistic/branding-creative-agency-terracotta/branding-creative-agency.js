/* Senja Atelier - Branding & Creative Agency (Artistic, Terracotta). Vanilla JS, tanpa dependensi. */
(function () {
  'use strict';
  var $ = function (s, r) { return (r || document).querySelector(s); };
  var $$ = function (s, r) { return Array.prototype.slice.call((r || document).querySelectorAll(s)); };
  var body = document.body;
  if (!body || !body.classList.contains('bca')) return;

  /* Header + menu mobile */
  var header = $('#bca-header'), burger = $('[data-bca-burger]');
  function setHH() { document.documentElement.style.setProperty('--bca-hh', (header ? header.getBoundingClientRect().bottom : 72) + 'px'); }
  function menu(open) {
    if (!header || !burger) return;
    if (open) setHH();
    header.classList.toggle('is-open', open);
    burger.setAttribute('aria-expanded', String(open));
    body.classList.toggle('bca-lock', open);
  }
  if (burger) {
    burger.addEventListener('click', function () { menu(!header.classList.contains('is-open')); });
    $$('#bca-nav a').forEach(function (a) { a.addEventListener('click', function () { menu(false); }); });
  }
  window.addEventListener('scroll', function () { if (header) header.classList.toggle('is-stuck', window.scrollY > 8); }, { passive: true });
  window.addEventListener('resize', function () { if (window.innerWidth >= 960) menu(false); else if (header && header.classList.contains('is-open')) setHH(); });

  /* Reveal */
  var rv = $$('[data-rv]');
  if ('IntersectionObserver' in window) {
    var io = new IntersectionObserver(function (es) {
      es.forEach(function (e) { if (e.isIntersecting) { e.target.classList.add('is-in'); io.unobserve(e.target); } });
    }, { threshold: 0.1, rootMargin: '0px 0px -40px 0px' });
    rv.forEach(function (el, i) { el.style.transitionDelay = (i % 3) * 80 + 'ms'; io.observe(el); });
  } else { rv.forEach(function (el) { el.classList.add('is-in'); }); }

  /* Layanan: lajur cat */
  $$('[data-bca-pcs]').forEach(function (box) {
    var pcs = $$('.bca-pc', box);
    function on(pc) {
      pcs.forEach(function (x) { var a = x === pc; x.classList.toggle('is-active', a); $('.bca-pc__h', x).setAttribute('aria-expanded', String(a)); });
    }
    pcs.forEach(function (pc) {
      var h = $('.bca-pc__h', pc);
      h.addEventListener('click', function () { on(pc); });
      h.addEventListener('focus', function () { on(pc); });
      pc.addEventListener('mouseenter', function () { if (window.matchMedia('(min-width:960px) and (hover:hover)').matches) on(pc); });
    });
  });

  /* Rail portofolio */
  $$('[data-rail]').forEach(function (b) {
    b.addEventListener('click', function () {
      var rail = $('[data-bca-rail]'), card = rail && $('.bca-card', rail);
      if (rail && card) rail.scrollBy({ left: Number(b.getAttribute('data-rail')) * (card.getBoundingClientRect().width + 20), behavior: 'smooth' });
    });
  });

  /* Filter portofolio */
  $$('[data-bca-filter]').forEach(function (g) {
    var btns = $$('button', g), items = $$('[data-cat]');
    btns.forEach(function (b) {
      b.addEventListener('click', function () {
        var f = b.getAttribute('data-f');
        btns.forEach(function (x) { x.setAttribute('aria-pressed', String(x === b)); });
        items.forEach(function (it) { it.hidden = !(f === 'all' || it.getAttribute('data-cat') === f); });
      });
    });
  });

  /* Detail proyek (dialog) */
  var lb = $('#bca-lb');
  if (lb) {
    document.addEventListener('click', function (e) {
      var b = e.target.closest ? e.target.closest('[data-lb]') : null;
      if (!b) return;
      var it = b.closest('[data-item]'), im = it && $('img', it);
      if (!it || !im) return;
      var t = $('img', lb); t.src = im.src; t.alt = im.alt;
      $('.bca-meta', lb).textContent = it.getAttribute('data-meta') || '';
      $('h2', lb).textContent = it.getAttribute('data-title') || '';
      $('.bca-lead', lb).textContent = it.getAttribute('data-desc') || '';
      if (typeof lb.showModal === 'function') lb.showModal(); else lb.setAttribute('open', '');
    });
    $('[data-lb-close]', lb).addEventListener('click', function () { if (lb.close) lb.close(); else lb.removeAttribute('open'); });
    lb.addEventListener('click', function (e) { if (e.target === lb && lb.close) lb.close(); });
  }

  /* Tanggal */
  var DAY = ['Min', 'Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab'], DAYL = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
  var MON = ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'];
  function pad(n) { return (n < 10 ? '0' : '') + n; }
  function iso(d) { return d.getFullYear() + '-' + pad(d.getMonth() + 1) + '-' + pad(d.getDate()); }
  function workdays(n) {
    var out = [], d = new Date(); d.setHours(12, 0, 0, 0);
    while (out.length < n) { d.setDate(d.getDate() + 1); var w = d.getDay(); if (w !== 0 && w !== 6) out.push(new Date(d.getTime())); }
    return out;
  }
  var nx = $('[data-bca-next]');
  if (nx) { var d0 = workdays(1)[0]; nx.textContent = DAYL[d0.getDay()] + ', ' + d0.getDate() + ' ' + MON[d0.getMonth()] + ', ' + (nx.getAttribute('data-slot') || '09:00').replace(':', '.') + ' WIB'; }

  /* Janji temu */
  var bk = $('[data-bca-booking]');
  if (bk) {
    var slots = []; try { slots = JSON.parse(bk.getAttribute('data-slots')) || []; } catch (e) { slots = []; }
    var dBox = $('[data-bca-dates]', bk), sBox = $('[data-bca-slots]', bk), fT = bk.elements.tanggal, fW = bk.elements.waktu;
    function sum(k, v) { var el = $('[data-sum="' + k + '"]', bk); if (el) el.textContent = v; }
    function pick(box, btn, field, key, label) {
      $$('button', box).forEach(function (b) { b.setAttribute('aria-pressed', String(b === btn)); });
      field.value = btn.getAttribute('data-v'); sum(key, label);
      var fs = field.closest('.bca-fs'); if (fs) { fs.classList.remove('is-bad'); var er = $('.bca-err', fs); if (er) er.textContent = ''; }
    }
    workdays(10).forEach(function (d) {
      var b = document.createElement('button'); b.type = 'button'; b.className = 'bca-date'; b.setAttribute('aria-pressed', 'false'); b.setAttribute('data-v', iso(d));
      b.innerHTML = '<small>' + DAY[d.getDay()] + '</small><strong>' + d.getDate() + '</strong><small>' + MON[d.getMonth()] + '</small>';
      b.addEventListener('click', function () { pick(dBox, b, fT, 'tanggal', DAYL[d.getDay()] + ', ' + d.getDate() + ' ' + MON[d.getMonth()]); });
      dBox.appendChild(b);
    });
    slots.forEach(function (s) {
      var b = document.createElement('button'); b.type = 'button'; b.className = 'bca-slot'; b.setAttribute('aria-pressed', 'false'); b.setAttribute('data-v', s); b.textContent = s.replace(':', '.');
      b.addEventListener('click', function () { pick(sBox, b, fW, 'waktu', s.replace(':', '.') + ' WIB'); });
      sBox.appendChild(b);
    });
    function radios() {
      var j = $('input[name=jenis]:checked', bk), m = $('input[name=mode]:checked', bk);
      if (j) { sum('jenis', j.value); var small = $('small', j.parentNode); sum('dur', small ? small.textContent : '-'); }
      if (m) sum('mode', m.value);
    }
    bk.addEventListener('change', radios); radios();
  }

  /* Susun pesan WhatsApp dari isi formulir */
  var LBL = { nama: 'Nama', email: 'Email', whatsapp: 'WhatsApp', brand: 'Brand', industri: 'Industri', layanan: 'Layanan', anggaran: 'Anggaran', mulai: 'Rencana mulai', deskripsi: 'Cerita proyek', referensi: 'Referensi', jenis: 'Jenis konsultasi', mode: 'Cara bertemu', tanggal: 'Tanggal', waktu: 'Jam', catatan: 'Catatan' };
  function waText(form) {
    var lines = ['Halo ' + (form.getAttribute('data-brand') || '') + ', saya ingin ' + (form.getAttribute('data-topic') || 'berkonsultasi') + '.', ''], seen = {};
    $$('input,select,textarea', form).forEach(function (el) {
      var n = (el.name || '').replace('[]', ''), v = '';
      if (!LBL[n] || seen[n]) return;
      if (el.type === 'checkbox') { v = $$('input[name="' + el.name + '"]:checked', form).map(function (x) { return x.value; }).join(', '); }
      else if (el.type === 'radio') { var c = $('input[name="' + el.name + '"]:checked', form); v = c ? c.value : ''; }
      else { v = el.value; }
      if (n === 'tanggal' || n === 'waktu') { var sm = $('[data-sum="' + n + '"]', form); v = sm ? sm.textContent : v; }
      seen[n] = 1;
      if (v && v.trim()) lines.push(LBL[n] + ': ' + v.trim());
    });
    return lines.join('\n');
  }

  /* Formulir: prefill + validasi */
  $$('[data-bca-form]').forEach(function (form) {
    var qs = new URLSearchParams(window.location.search);
    qs.forEach(function (v, k) {
      if (!v) return;
      var el = form.elements[k];
      if (el && el.tagName && el.type !== 'hidden') { el.value = v; }
      $$('input[type=checkbox][name="layanan[]"]', form).forEach(function (c) { if (k === 'layanan' && c.value === v) c.checked = true; });
    });
    var rules = {
      nama: function (v) { return v.trim().length >= 2 ? '' : 'Tuliskan nama Anda.'; },
      email: function (v, el) { return (!v.trim() && !el.required) || /^[^\s@]+@[^\s@]+\.[^\s@]{2,}$/.test(v.trim()) ? '' : 'Format email belum benar.'; },
      whatsapp: function (v) { return /^[+\d][\d\s-]{7,16}$/.test(v.trim()) ? '' : 'Nomor WhatsApp belum benar.'; },
      deskripsi: function (v) { return v.trim().length >= 10 ? '' : 'Ceritakan proyek Anda minimal 10 karakter.'; },
      tanggal: function (v) { return v ? '' : 'Pilih tanggal konsultasi.'; },
      waktu: function (v) { return v ? '' : 'Pilih jam konsultasi.'; }
    };
    function mark(wrap, msg) {
      if (!wrap) return;
      wrap.classList.toggle('is-bad', !!msg);
      var er = $('.bca-err', wrap); if (er) er.textContent = msg;
    }
    function check(el) {
      var r = rules[el.name]; if (!r) return true;
      var msg = r(el.value, el); mark(el.closest('.bca-field') || el.closest('.bca-fs'), msg);
      el.setAttribute('aria-invalid', msg ? 'true' : 'false'); return !msg;
    }
    function checkOne() {
      var fs = $('[data-req-one]', form); if (!fs) return null;
      var ok = !!$('input:checked', fs); mark(fs, ok ? '' : 'Pilih minimal satu layanan.'); return ok ? null : fs;
    }
    $$('input,select,textarea', form).forEach(function (el) {
      el.addEventListener('blur', function () { check(el); });
      el.addEventListener('input', function () { if (el.closest('.is-bad')) check(el); });
    });
    form.addEventListener('submit', function (e) {
      var bad = $$('input,select,textarea', form).filter(function (el) { return !check(el); }).map(function (el) { return el.type === 'hidden' ? el.closest('.bca-fs') : el; });
      var one = checkOne(); if (one) bad.push(one);
      if (bad.length) { e.preventDefault(); var t = bad[0]; if (t.scrollIntoView) t.scrollIntoView({ behavior: 'smooth', block: 'center' }); if (t.focus && t.tagName !== 'FIELDSET') t.focus({ preventScroll: true }); return; }
      var act = form.getAttribute('action');
      if (!act || act === '#') { /* Mode WhatsApp: pesan siap kirim ke nomor studio */
        e.preventDefault();
        var url = (form.getAttribute('data-wa') || 'https://wa.me/') + '?text=' + encodeURIComponent(waText(form));
        var ok = $('.bca-ok', form), fb = ok && $('[data-wa-fallback]', ok);
        if (fb) fb.href = url;
        window.open(url, '_blank', 'noopener');
        if (ok) { ok.hidden = false; ok.scrollIntoView({ behavior: 'smooth', block: 'center' }); ok.focus({ preventScroll: true }); }
      } else { var s = $('button[type=submit]', form); if (s) s.disabled = true; }
    });
  });


  /* Parallax hero (pointer halus saja) */
  var art = $('.bca-hero__art'), fine = window.matchMedia && window.matchMedia('(pointer:fine)').matches, calm = window.matchMedia && window.matchMedia('(prefers-reduced-motion:reduce)').matches;
  if (art && fine && !calm) {
    var hero = art.closest('.bca-hero');
    hero.addEventListener('pointermove', function (e) {
      var r = hero.getBoundingClientRect();
      art.style.setProperty('--px', ((e.clientX - r.left) / r.width - 0.5) * 2);
      art.style.setProperty('--py', ((e.clientY - r.top) / r.height - 0.5) * 2);
    });
    hero.addEventListener('pointerleave', function () { art.style.setProperty('--px', 0); art.style.setProperty('--py', 0); });
  }

  /* Kembali ke atas */
  $$('[data-top]').forEach(function (b) { b.addEventListener('click', function () { window.scrollTo({ top: 0, behavior: calm ? 'auto' : 'smooth' }); }); });

  /* Asisten AI (konsultasi FAQ) */
  var chat = $('#bca-chat'), dataEl = $('#bca-faq-data'), cfg = null;
  if (chat && dataEl) { try { cfg = JSON.parse(dataEl.textContent); } catch (e) { cfg = null; } }
  if (chat && cfg) {
    var log = $('.bca-chat__log', chat), chips = $('.bca-chat__chips', chat), cform = $('.bca-chat__form', chat), input = $('input', cform);
    var fab = $('.bca-bot'), greeted = false, lastFocus = null;
    var stop = ['yang', 'dan', 'di', 'ke', 'dari', 'untuk', 'apa', 'apakah', 'bagaimana', 'berapa', 'saya', 'anda', 'itu', 'ini', 'ada', 'bisa', 'dengan', 'atau', 'kami', 'kamu', 'mau', 'nya'];
    function tok(s) { return s.toLowerCase().replace(/[^a-z0-9\s]/g, ' ').split(/\s+/).filter(function (w) { return w.length > 2 && stop.indexOf(w) < 0; }); }
    function msg(text, me, link) {
      var d = document.createElement('div'); d.className = 'bca-msg' + (me ? ' bca-msg--me' : ''); d.textContent = text;
      if (link && link.href) { d.appendChild(document.createElement('br')); var a = document.createElement('a'); a.href = link.href; a.textContent = link.text; if (link.ext) { a.target = '_blank'; a.rel = 'noopener'; } d.appendChild(a); }
      log.appendChild(d); log.scrollTop = log.scrollHeight; return d;
    }
    function answer(q) {
      var qt = tok(q), best = null, top = 0;
      cfg.items.forEach(function (it) {
        var pool = tok(it.k + ' ' + it.q), s = 0;
        qt.forEach(function (w) { if (pool.some(function (p) { return p === w || (w.length > 4 && p.indexOf(w) === 0); })) s++; });
        if (s > top) { top = s; best = it; }
      });
      if (!best || !top) return { t: cfg.bot.fallback, link: { href: chat.getAttribute('data-wa'), text: 'Chat WhatsApp', ext: true } };
      var u = best.go ? chat.getAttribute('data-u-' + best.go) : null;
      return { t: best.a, link: u ? { href: u, text: best.gt } : null };
    }
    function ask(q) {
      q = q.trim(); if (!q) return;
      msg(q, true);
      var t = document.createElement('div'); t.className = 'bca-msg bca-typing'; t.innerHTML = '<i></i><i></i><i></i>'; t.setAttribute('aria-label', 'Prisma sedang mengetik');
      log.appendChild(t); log.scrollTop = log.scrollHeight;
      var r = answer(q);
      setTimeout(function () { if (t.parentNode) t.parentNode.removeChild(t); msg(r.t, false, r.link); }, 650);
    }
    cfg.items.slice(0, 6).forEach(function (it) {
      var b = document.createElement('button'); b.type = 'button'; b.textContent = it.q;
      b.addEventListener('click', function () { ask(it.q); }); chips.appendChild(b);
    });
    function open() {
      lastFocus = document.activeElement; chat.hidden = false;
      if (fab) fab.setAttribute('aria-expanded', 'true');
      if (!greeted) { msg(cfg.bot.greet, false); greeted = true; }
      setTimeout(function () { input.focus(); }, 50);
    }
    function close() {
      chat.hidden = true; if (fab) fab.setAttribute('aria-expanded', 'false');
      if (lastFocus && lastFocus.focus) lastFocus.focus();
    }
    $$('[data-bca-chat-open]').forEach(function (t) { t.addEventListener('click', function () { chat.hidden ? open() : close(); }); });
    $('[data-bca-chat-close]', chat).addEventListener('click', close);
    document.addEventListener('keydown', function (e) { if (e.key === 'Escape' && !chat.hidden) close(); });
    cform.addEventListener('submit', function (e) { e.preventDefault(); ask(input.value); input.value = ''; });
  }
})();
