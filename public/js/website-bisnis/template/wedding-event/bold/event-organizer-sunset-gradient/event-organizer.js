/* Eventora — Event Organizer · Bold · Sunset Gradient */
(function () {
  'use strict';

  var doc = document;
  var $ = function (s, r) { return (r || doc).querySelector(s); };
  var $$ = function (s, r) { return Array.prototype.slice.call((r || doc).querySelectorAll(s)); };
  var reduce = window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches;

  doc.body.classList.add('js');

  /* ---------- navbar: sticky state + mobile menu ---------- */
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
  }

  /* ---------- sparks (partikel cahaya di hero) ---------- */
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

  /* ---------- slider portofolio (beranda) ---------- */
  $$('[data-slider]').forEach(function (el) {
    var slides = $$('.slide', el);
    var i = 0, timer = null;
    if (slides.length < 2) return;
    function go(n) {
      slides[i].classList.remove('is-on');
      i = (n + slides.length) % slides.length;
      slides[i].classList.add('is-on');
    }
    function start() { if (!reduce) { stop(); timer = setInterval(function () { go(i + 1); }, 5000); } }
    function stop() { if (timer) { clearInterval(timer); timer = null; } }
    var prev = $('[data-prev]', el), next = $('[data-next]', el);
    if (prev) prev.addEventListener('click', function () { go(i - 1); start(); });
    if (next) next.addEventListener('click', function () { go(i + 1); start(); });
    el.addEventListener('mouseenter', stop);
    el.addEventListener('mouseleave', start);
    start();
  });

  /* ---------- filter portofolio ---------- */
  var filters = $$('[data-filter]');
  if (filters.length) {
    filters.forEach(function (btn) {
      btn.addEventListener('click', function () {
        var f = btn.getAttribute('data-filter');
        filters.forEach(function (b) { b.classList.toggle('is-on', b === btn); });
        $$('.g-item').forEach(function (it) {
          var show = f === 'all' || it.getAttribute('data-cat') === f;
          it.classList.toggle('is-hidden', !show);
          if (show) it.classList.add('is-in');
        });
      });
    });
  }

  /* ---------- reveal saat scroll ---------- */
  var rev = $$('[data-reveal]');
  if (rev.length) {
    if ('IntersectionObserver' in window && !reduce) {
      var io = new IntersectionObserver(function (es) {
        es.forEach(function (e) { if (e.isIntersecting) { e.target.classList.add('is-in'); io.unobserve(e.target); } });
      }, { threshold: 0.12 });
      rev.forEach(function (r, n) { r.style.transitionDelay = ((n % 4) * 70) + 'ms'; io.observe(r); });
    } else {
      rev.forEach(function (r) { r.classList.add('is-in'); });
    }
  }

  /* ---------- form penawaran -> WhatsApp ---------- */
  var form = $('#qform');
  if (form) {
    var note = $('#qnote');
    var paket = $('#q-paket');
    try {
      var qp = new URLSearchParams(window.location.search).get('paket');
      if (qp && paket) {
        $$('option', paket).forEach(function (o) { if (o.value === qp || o.textContent === qp) paket.value = o.value || o.textContent; });
      }
    } catch (e) { /* abaikan */ }

    var say = function (msg, bad) {
      if (!note) return;
      note.textContent = msg;
      note.classList.toggle('err', !!bad);
    };

    form.addEventListener('submit', function (ev) {
      ev.preventDefault();
      var bad = false;
      $$('[required]', form).forEach(function (f) {
        var miss = !f.value.trim();
        f.classList.toggle('is-bad', miss);
        if (miss) bad = true;
      });
      if (bad) { say('Lengkapi kolom yang bertanda merah terlebih dulu.', true); return; }

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
    });
    $$('input,select,textarea', form).forEach(function (f) {
      f.addEventListener('input', function () { f.classList.remove('is-bad'); });
    });
  }

  /* ---------- AI chatbot (FAQ layanan event) ---------- */
  var chat = $('#chat');
  var log = $('#chat-log');
  var chips = $('#chat-chips');
  var cform = $('#chat-form');
  var cin = $('#chat-in');
  var data = { faq: [], wa: '' };
  try { data = JSON.parse($('#eo-data').textContent) || data; } catch (e) { /* data kosong */ }

  if (chat && log && chips && cform && cin) {
    var started = false;
    var openers = $$('[data-chat-open]');

    var scrollDown = function () { log.scrollTop = log.scrollHeight; };
    function bubble(kind, text, link) {
      var d = doc.createElement('div');
      d.className = 'msg ' + kind;
      d.appendChild(doc.createTextNode(text));
      (link || []).forEach(function (l) {
        d.appendChild(doc.createElement('br'));
        var a = doc.createElement('a');
        a.href = l[1];
        a.textContent = l[0];
        if (/^https?:\/\/wa\.me/.test(l[1])) { a.target = '_blank'; a.rel = 'noopener'; }
        d.appendChild(a);
      });
      log.appendChild(d);
      scrollDown();
    }
    function typing(cb) {
      var t = doc.createElement('div');
      t.className = 'msg bot typing';
      t.innerHTML = '<i></i><i></i><i></i>';
      log.appendChild(t);
      scrollDown();
      setTimeout(function () { t.remove(); cb(); }, reduce ? 0 : 550);
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
        if (best) bubble('bot', best.a, [['Buka halaman terkait', best.url], ['Tanya lewat WhatsApp', waLink(q)]]);
        else bubble('bot', 'Maaf, saya belum punya jawaban untuk itu. Tim kami siap membantu langsung lewat WhatsApp.', [['Tanya lewat WhatsApp', waLink(q)]]);
      });
    }
    function ask(q) {
      q = q.trim();
      if (!q) return;
      bubble('me', q);
      answer(q);
    }
    function setOpen(open) {
      chat.hidden = !open;
      openers.forEach(function (b) { if (b.getAttribute('aria-controls')) b.setAttribute('aria-expanded', open ? 'true' : 'false'); });
      if (open) {
        if (!started) {
          started = true;
          bubble('bot', 'Halo! Saya asisten Eventora. Ada yang bisa kami bantu tentang layanan event Anda?');
          data.faq.forEach(function (f) {
            var b = doc.createElement('button');
            b.type = 'button';
            b.textContent = f.q;
            b.addEventListener('click', function () { ask(f.q); });
            chips.appendChild(b);
          });
        }
        setTimeout(function () { cin.focus(); }, 60);
      }
    }

    openers.forEach(function (b) { b.addEventListener('click', function () { setOpen(true); }); });
    $$('[data-chat-close]').forEach(function (b) { b.addEventListener('click', function () { setOpen(false); }); });
    $$('[data-faq]').forEach(function (b) {
      b.addEventListener('click', function () {
        var f = data.faq[parseInt(b.getAttribute('data-faq'), 10)];
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
    doc.addEventListener('keydown', function (e) {
      if (e.key === 'Escape') { if (!chat.hidden) setOpen(false); setMenu(false); }
    });
  }
})();
