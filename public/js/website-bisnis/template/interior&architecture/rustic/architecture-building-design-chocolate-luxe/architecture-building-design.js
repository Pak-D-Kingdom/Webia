/* ==========================================================================
   ArchiDesign — Architecture & Building Design  ·  Rustic · Chocolate Luxe
   WEBIA by D-KREASI · Vanilla JS (tanpa dependensi)
   Modul: header · search · reveal · hero leaves · gallery filter · lightbox
          plan tabs · form → WhatsApp · chatbot FAQ · dialog legal
   ========================================================================== */
(function () {
  'use strict';
  window.__abdReady = true;

  var $  = function (s, c) { return (c || document).querySelector(s); };
  var $$ = function (s, c) { return Array.prototype.slice.call((c || document).querySelectorAll(s)); };
  var reduce = window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches;

  var DATA = {};
  try { DATA = JSON.parse(($('#abd-data') || {}).textContent || '{}'); } catch (e) { DATA = {}; }
  DATA.faq = DATA.faq || []; DATA.quick = DATA.quick || []; DATA.search = DATA.search || [];

  /* ---------- util ---------- */
  var toastTimer;
  function toast(msg) {
    var t = $('#abd-toast'); if (!t) return;
    t.textContent = msg; t.classList.add('is-on');
    clearTimeout(toastTimer); toastTimer = setTimeout(function () { t.classList.remove('is-on'); }, 4200);
  }
  function norm(s) {
    return String(s || '').toLowerCase().normalize('NFD').replace(/[\u0300-\u036f]/g, '')
      .replace(/[^a-z0-9\s]/g, ' ').replace(/\s+/g, ' ').trim();
  }
  function openWA(text) {
    var a = document.createElement('a');
    a.href = 'https://wa.me/' + (DATA.whatsapp || '') + '?text=' + encodeURIComponent(text || '');
    a.target = '_blank'; a.rel = 'noopener noreferrer';
    document.body.appendChild(a); a.click(); a.remove();
  }
  function showDialog(d) {
    if (!d) return;
    if (typeof d.showModal === 'function') { if (!d.open) d.showModal(); } else { d.setAttribute('open', ''); }
  }
  function closeDialog(d) {
    if (!d) return;
    if (typeof d.close === 'function') { d.close(); } else { d.removeAttribute('open'); }
  }

  /* ---------- header: bayangan saat scroll ---------- */
  (function () {
    var h = $('#abd-header'); if (!h) return;
    var ticking = false;
    function upd() { h.classList.toggle('is-stuck', window.scrollY > 8); ticking = false; }
    window.addEventListener('scroll', function () { if (!ticking) { ticking = true; requestAnimationFrame(upd); } }, { passive: true });
    upd();
  })();

  /* ---------- drawer menu mobile ---------- */
  (function () {
    var drawer = $('#abd-drawer'); if (!drawer) return;
    var btn = $('.abd-burger');
    function set(open) {
      drawer.hidden = !open;
      if (btn) { btn.setAttribute('aria-expanded', open ? 'true' : 'false'); btn.setAttribute('aria-label', open ? 'Tutup menu' : 'Buka menu'); }
      document.body.style.overflow = open ? 'hidden' : '';
    }
    $$('[data-menu-toggle]').forEach(function (el) {
      el.addEventListener('click', function () { set(drawer.hidden); });
    });
    $$('[data-menu-link]', drawer).forEach(function (a) { a.addEventListener('click', function () { set(false); }); });
    document.addEventListener('keydown', function (e) { if (e.key === 'Escape' && !drawer.hidden) set(false); });
    window.addEventListener('resize', function () { if (window.innerWidth >= 1280 && !drawer.hidden) set(false); });
  })();

  /* ---------- pencarian ---------- */
  (function () {
    var panel = $('#abd-search'), input = $('#abd-search-input'), list = $('#abd-search-list');
    if (!panel || !input || !list) return;
    var toggles = $$('[data-search-toggle]');
    function render(q) {
      var n = norm(q), items = DATA.search.filter(function (it) {
        return !n || norm(it.t).indexOf(n) > -1 || norm(it.s).indexOf(n) > -1;
      }).slice(0, 12);
      list.innerHTML = '';
      if (!items.length) { var p = document.createElement('li'); p.className = 'abd-search__none'; p.textContent = 'Tidak ada hasil untuk “' + q + '”.'; list.appendChild(p); return; }
      items.forEach(function (it) {
        var li = document.createElement('li'), a = document.createElement('a'), s = document.createElement('strong'), m = document.createElement('small');
        a.href = it.u; s.textContent = it.t; m.textContent = it.s; a.appendChild(s); a.appendChild(m); li.appendChild(a); list.appendChild(li);
      });
    }
    function set(open) {
      panel.hidden = !open;
      toggles.forEach(function (t) { if (t.hasAttribute('aria-expanded')) t.setAttribute('aria-expanded', open ? 'true' : 'false'); });
      if (open) { render(input.value); setTimeout(function () { input.focus(); }, 30); }
    }
    toggles.forEach(function (t) { t.addEventListener('click', function () { set(panel.hidden); }); });
    input.addEventListener('input', function () { render(input.value); });
    document.addEventListener('keydown', function (e) { if (e.key === 'Escape' && !panel.hidden) set(false); });
    document.addEventListener('click', function (e) {
      if (!panel.hidden && !panel.contains(e.target) && !e.target.closest('[data-search-toggle]')) set(false);
    });
  })();

  /* ---------- reveal saat scroll ---------- */
  (function () {
    var els = $$('[data-reveal]'); if (!els.length) return;
    els.forEach(function (el, i) { el.style.setProperty('--rd', ((i % 4) * 0.08).toFixed(2) + 's'); });
    if (reduce || !('IntersectionObserver' in window)) { els.forEach(function (el) { el.classList.add('is-in'); }); return; }
    var io = new IntersectionObserver(function (entries) {
      entries.forEach(function (en) { if (en.isIntersecting) { en.target.classList.add('is-in'); io.unobserve(en.target); } });
    }, { threshold: 0.12, rootMargin: '0px 0px -6% 0px' });
    els.forEach(function (el) { io.observe(el); });
  })();

  /* ---------- daun melayang di hero ---------- */
  (function () {
    var box = $('[data-leaves]'); if (!box || reduce) return;
    var colors = ['#6a9c4c', '#55953f', '#86b45e', '#3d7633', '#c98a4b'];
    var n = window.innerWidth < 700 ? 5 : 9;
    for (var i = 0; i < n; i++) {
      var l = document.createElement('span');
      l.className = 'abd-leaf';
      l.style.left = (Math.random() * 100).toFixed(1) + '%';
      l.style.setProperty('--s', (14 + Math.random() * 16).toFixed(0) + 'px');
      l.style.setProperty('--d', (12 + Math.random() * 12).toFixed(1) + 's');
      l.style.setProperty('--dl', (-Math.random() * 16).toFixed(1) + 's');
      l.style.setProperty('--c', colors[i % colors.length]);
      l.innerHTML = '<svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 2C6 6 4 12 7 18c2 3 6 4 9 2 4-3 5-9 1-14-1.5-2-3.500-3-5-4z"/></svg>';
      box.appendChild(l);
    }
  })();

  /* ---------- filter portofolio ---------- */
  (function () {
    var wrap = $('[data-gallery]'); if (!wrap) return;
    var btns = $$('[data-filter]'), cards = $$('.abd-pcard', wrap), empty = $('[data-empty]');
    btns.forEach(function (b) {
      b.addEventListener('click', function () {
        var f = b.getAttribute('data-filter'), shown = 0;
        btns.forEach(function (x) { var on = x === b; x.classList.toggle('is-active', on); x.setAttribute('aria-pressed', on ? 'true' : 'false'); });
        cards.forEach(function (c) {
          var ok = f === 'semua' || c.getAttribute('data-cat') === f;
          c.classList.toggle('is-hidden', !ok); if (ok) { shown++; c.classList.add('is-in'); }
        });
        if (empty) empty.hidden = shown > 0;
      });
    });
  })();

  /* ---------- lightbox ---------- */
  (function () {
    var dlg = $('#abd-lightbox'), img = $('#abd-lightbox-img'), cap = $('#abd-lightbox-cap');
    if (!dlg || !img) return;
    document.addEventListener('click', function (e) {
      var t = e.target.closest('[data-lightbox]'); if (!t) return;
      img.src = t.getAttribute('data-lightbox'); img.alt = t.getAttribute('data-cap') || '';
      if (cap) cap.textContent = t.getAttribute('data-cap') || '';
      showDialog(dlg);
    });
  })();

  /* ---------- tab denah 2D / 3D ---------- */
  $$('[data-plan]').forEach(function (card) {
    var tabs = $$('[role="tab"]', card), view = $('.abd-plan__view', card), im = view && $('img', view);
    if (!im) return;
    tabs.forEach(function (tab) {
      tab.addEventListener('click', function () {
        if (tab.classList.contains('is-active')) return;
        tabs.forEach(function (t) { var on = t === tab; t.classList.toggle('is-active', on); t.setAttribute('aria-selected', on ? 'true' : 'false'); });
        var src = tab.getAttribute('data-src'), is3d = tabs.indexOf(tab) === 1;
        im.classList.add('is-swap');
        setTimeout(function () {
          im.src = src; im.alt = (is3d ? 'Render 3D ' : 'Denah ') + (($('h3', card) || {}).textContent || '');
          view.setAttribute('data-lightbox', src); im.classList.remove('is-swap');
        }, reduce ? 0 : 280);
      });
    });
  });

  /* ---------- dialog: tutup & legal ---------- */
  (function () {
    $$('.abd-dialog').forEach(function (d) {
      d.addEventListener('click', function (e) { if (e.target === d || e.target.closest('[data-dialog-close]')) closeDialog(d); });
    });
    var legal = $('#abd-legal'); if (!legal) return;
    var T = {
      privasi: ['Kebijakan Privasi', 'Data yang Anda kirim lewat formulir hanya digunakan untuk menanggapi permintaan konsultasi dan penawaran, serta tidak dibagikan kepada pihak ketiga tanpa persetujuan Anda.'],
      syarat: ['Syarat & Ketentuan', 'Informasi dan ilustrasi pada situs ini bersifat umum. Lingkup, biaya, dan jadwal proyek ditetapkan secara tertulis setelah konsultasi dan persetujuan penawaran.']
    };
    $$('[data-legal]').forEach(function (b) {
      b.addEventListener('click', function () {
        var c = T[b.getAttribute('data-legal')] || T.privasi;
        $('#abd-legal-title').textContent = c[0]; $('[data-legal-body]', legal).textContent = c[1]; showDialog(legal);
      });
    });
  })();

  /* ---------- form → WhatsApp ---------- */
  (function () {
    var forms = $$('[data-wa-form]'); if (!forms.length) return;
    var d = new Date(), iso = d.getFullYear() + '-' + ('0' + (d.getMonth() + 1)).slice(-2) + '-' + ('0' + d.getDate()).slice(-2);
    $$('[data-min-today]').forEach(function (i) { i.min = iso; });

    function setErr(field, msg) {
      var el = $('input,select,textarea', field), err = $('.abd-err', field);
      if (!err) { err = document.createElement('span'); err.className = 'abd-err'; err.setAttribute('role', 'alert'); field.appendChild(err); }
      err.textContent = msg || ''; field.classList.toggle('has-error', !!msg);
      if (el) el.setAttribute('aria-invalid', msg ? 'true' : 'false');
    }
    function check(form) {
      var ok = true, first = null;
      $$('.abd-field', form).forEach(function (f) {
        var el = $('input,select,textarea', f); if (!el) return;
        var v = el.value.trim(), msg = '';
        if (el.required && !v) msg = 'Wajib diisi.';
        else if (el.type === 'email' && v && !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(v)) msg = 'Format email tidak valid.';
        else if (el.type === 'tel' && v && !/^\+?[0-9\s\-]{8,16}$/.test(v)) msg = 'Nomor telepon tidak valid.';
        else if (el.type === 'date' && v && el.min && v < el.min) msg = 'Tanggal sudah terlewat.';
        else if (el.type === 'number' && v && Number(v) < 1) msg = 'Isi angka lebih dari 0.';
        setErr(f, msg); if (msg) { ok = false; if (!first) first = el; }
      });
      if (first) first.focus();
      return ok;
    }
    forms.forEach(function (form) {
      form.addEventListener('input', function (e) { var f = e.target.closest('.abd-field'); if (f && f.classList.contains('has-error')) setErr(f, ''); });
      form.addEventListener('submit', function (e) {
        e.preventDefault();
        if (!check(form)) { toast('Mohon lengkapi kolom yang ditandai.'); return; }
        var kind = form.getAttribute('data-wa-form'), brand = DATA.brand || 'ArchiDesign';
        var lines = [kind === 'konsultasi' ? 'Halo ' + brand + ', saya ingin *booking konsultasi*:' : 'Halo ' + brand + ', saya ingin *meminta penawaran*:', ''];
        $$('[data-label]', form).forEach(function (el) {
          var v = el.value.trim(); if (!v) return;
          if (el.type === 'date') { var p = v.split('-'); v = p[2] + '/' + p[1] + '/' + p[0]; }
          if (el.getAttribute('data-label') === 'Luas bangunan') v += ' m²';
          lines.push('• ' + el.getAttribute('data-label') + ': ' + v);
        });
        lines.push('', 'Terima kasih.');
        openWA(lines.join('\n'));
        toast('Membuka WhatsApp… silakan kirim pesan untuk menyelesaikan.');
        form.reset(); $$('.abd-field', form).forEach(function (f) { setErr(f, ''); });
      });
    });
  })();

  /* ---------- chatbot FAQ ---------- */
  (function () {
    var panel = $('#abd-chat'), body = $('#abd-chat-body'), quick = $('#abd-chat-quick'), form = $('#abd-chat-form'), input = $('#abd-chat-input');
    if (!panel || !body) return;
    var openers = $$('[data-chat-open]'), started = false, lastOpener = null, busy = false;

    function scroll() { body.scrollTop = body.scrollHeight; }
    function bubble(kind, text) {
      var m = document.createElement('div'); m.className = 'abd-msg abd-msg--' + kind; m.textContent = text; body.appendChild(m); scroll(); return m;
    }
    function cta(m, href, label, wa) {
      var a = document.createElement('a'); a.className = 'abd-msg__cta' + (wa ? ' abd-msg__cta--wa' : ''); a.href = href; a.textContent = label;
      if (wa) { a.target = '_blank'; a.rel = 'noopener noreferrer'; }
      m.appendChild(document.createElement('br')); m.appendChild(a);
    }
    function typing() {
      var t = document.createElement('div'); t.className = 'abd-msg abd-msg--bot abd-typing'; t.innerHTML = '<i></i><i></i><i></i>'; body.appendChild(t); scroll(); return t;
    }
    function reply(fn, delay) {
      var t = typing(); busy = true;
      setTimeout(function () { t.remove(); fn(); busy = false; scroll(); }, reduce ? 0 : (delay || 650));
    }
    function waLink(q) { return 'https://wa.me/' + (DATA.whatsapp || '') + '?text=' + encodeURIComponent('Halo ' + (DATA.brand || '') + ', saya ingin bertanya: ' + q); }
    function find(q) {
      var n = norm(q), best = null, score = 0;
      DATA.faq.forEach(function (f) {
        var s = norm(f.q) === n ? 10 : 0;
        (f.k || []).forEach(function (k) { var kk = norm(k); if (kk && n.indexOf(kk) > -1) s += kk.length > 3 ? 2 : 1; });
        if (s > score) { score = s; best = f; }
      });
      return score > 0 ? best : null;
    }
    function answer(q) {
      var n = norm(q);
      reply(function () {
        if (/^(halo|hai|hi|hello|selamat|pagi|siang|sore|malam)\b/.test(n) && n.split(' ').length <= 3) { bubble('bot', 'Halo! Senang bertemu Anda. Ada yang ingin ditanyakan tentang layanan arsitektur kami?'); return; }
        if (/terima kasih|makasih|thanks|thank you/.test(n)) { bubble('bot', 'Sama-sama! Jika ada pertanyaan lain, saya siap membantu.'); return; }
        var f = find(q), m;
        if (f) {
          m = bubble('bot', f.a);
          if (f.link) cta(m, DATA.base + f.link[0], f.link[1], false);
        } else {
          m = bubble('bot', 'Maaf, saya belum menemukan jawaban yang pas. Coba pilih pertanyaan di bawah, atau tanyakan langsung ke tim kami lewat WhatsApp.');
          cta(m, waLink(q), 'Tanya via WhatsApp', true);
        }
      });
    }
    function ask(q) {
      q = String(q || '').trim(); if (!q || busy) return;
      bubble('user', q); answer(q);
    }
    function chips() {
      quick.innerHTML = '';
      var src = DATA.quick.concat(DATA.faq.map(function (f) { return f.q; }).filter(function (q) { return DATA.quick.indexOf(q) < 0; })).slice(0, 10);
      src.forEach(function (q) {
        var b = document.createElement('button'); b.type = 'button'; b.textContent = q; b.addEventListener('click', function () { ask(q); }); quick.appendChild(b);
      });
    }
    function open(from) {
      lastOpener = from || lastOpener; panel.hidden = false; document.body.classList.add('abd-chat-open');
      openers.forEach(function (o) { o.setAttribute('aria-expanded', 'true'); });
      if (!started) {
        started = true; chips();
        bubble('bot', 'Halo! Saya ArchiBot 👋');
        reply(function () { bubble('bot', 'Tanyakan apa saja tentang layanan arsitektur kami, atau pilih pertanyaan cepat di bawah.'); }, 700);
      }
      setTimeout(function () { if (window.innerWidth > 640 && input) input.focus(); }, 350);
    }
    function close() {
      panel.hidden = true; document.body.classList.remove('abd-chat-open');
      openers.forEach(function (o) { o.setAttribute('aria-expanded', 'false'); });
      if (lastOpener && lastOpener.focus) lastOpener.focus();
    }
    openers.forEach(function (o) { o.addEventListener('click', function () { open(o); }); });
    $$('[data-chat-close]').forEach(function (c) { c.addEventListener('click', close); });
    document.addEventListener('keydown', function (e) { if (e.key === 'Escape' && !panel.hidden) close(); });
    if (form) form.addEventListener('submit', function (e) { e.preventDefault(); var v = input.value; input.value = ''; ask(v); });

    // pertanyaan cepat & input dari preview beranda
    $$('[data-chat-ask]').forEach(function (b) {
      b.addEventListener('click', function () { open(b); setTimeout(function () { ask(b.getAttribute('data-chat-ask')); }, started ? 50 : 1600); });
    });
    $$('[data-chatprev-form]').forEach(function (f) {
      f.addEventListener('submit', function (e) {
        e.preventDefault(); var i = $('input', f), v = i.value.trim(); i.value = ''; open(i);
        if (v) setTimeout(function () { ask(v); }, 1600);
      });
    });

    // petunjuk kecil pada tombol bot (sekali per sesi)
    try {
      if (!sessionStorage.getItem('abd-hint')) {
        var tip = $('.abd-fab__tip--bot');
        setTimeout(function () { if (tip && panel.hidden) { tip.classList.add('is-hint'); setTimeout(function () { tip.classList.remove('is-hint'); }, 4500); } }, 3500);
        sessionStorage.setItem('abd-hint', '1');
      }
    } catch (e) { /* storage tidak tersedia */ }
  })();
})();
