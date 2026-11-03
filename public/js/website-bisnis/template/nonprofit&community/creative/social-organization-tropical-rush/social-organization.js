/* WEBIA — Gerak Nusa · Social Organization · Tropical Rush
   Vanilla JS, tanpa dependensi. Event dipasang lewat delegasi sehingga aman dijalankan ulang. */
(function () {
  'use strict';
  var d = document, b = d.body, root = d.documentElement;
  var $ = function (s, c) { return (c || d).querySelector(s); };
  var $$ = function (s, c) { return Array.prototype.slice.call((c || d).querySelectorAll(s)); };
  root.classList.add('so-js');

  var FAQ = [{"q": "Bagaimana cara menjadi relawan?", "a": "Isi formulir di halaman Gabung dan pilih peran Relawan. Tim kami akan menghubungimu lewat WhatsApp maksimal 2×24 jam untuk sesi orientasi singkat.", "k": ["relawan", "volunteer", "daftar", "gabung", "ikut", "cara"]}, {"q": "Apakah ada biaya keanggotaan?", "a": "Tidak ada. Keanggotaan dan kegiatan relawan gratis. Beberapa workshop khusus kadang meminta donasi sukarela untuk bahan.", "k": ["biaya", "gratis", "bayar", "iuran", "harga"]}, {"q": "Program apa saja yang tersedia?", "a": "Ada enam program: Pantai Bersih Bersama, Kelas Kreatif Anak Pulau, Mangrove Muda, Pasar Karya Warga, Mural Kampung Warna, dan Dapur Sehat Nusa.", "k": ["program", "kegiatan", "apa saja", "tersedia"]}, {"q": "Kapan event terdekat?", "a": "Event terdekat adalah Bersih Pantai Serentak pada 15 November 2026 di Pantai Kenjeran, pukul 07.00 WIB. Jadwal lengkap ada di halaman Event.", "k": ["event", "kapan", "jadwal", "terdekat", "acara"]}, {"q": "Apa syarat menjadi relawan?", "a": "Usia minimal 15 tahun (di bawah 18 tahun perlu izin orang tua). Tidak perlu pengalaman khusus, cukup mau belajar dan bekerja sama.", "k": ["syarat", "usia", "umur", "pengalaman", "minimal"]}, {"q": "Apakah relawan mendapat sertifikat?", "a": "Ya. Relawan aktif dengan minimal 3 kegiatan mendapat e-sertifikat dan surat keterangan kegiatan.", "k": ["sertifikat", "surat", "piagam"]}, {"q": "Bagaimana cara menjadi mitra?", "a": "Perusahaan, kampus, dan komunitas bisa bermitra lewat halaman Mitra atau WhatsApp. Kami siapkan proposal kolaborasi sesuai tujuanmu.", "k": ["mitra", "partner", "kolaborasi", "sponsor", "donasi", "csr"]}, {"q": "Di mana lokasi sekretariat?", "a": "Sekretariat kami di Jl. Raya Kenjeran No. 88, Surabaya, Jawa Timur 60129. Buka Senin–Sabtu, 09.00–17.00 WIB.", "k": ["lokasi", "alamat", "dimana", "di mana", "kantor", "jam", "kontak"]}];

  /* ---------- navigasi ---------- */
  function setNav(open) {
    b.classList.toggle('nav-open', open);
    var t = $('.so-burger'); if (t) t.setAttribute('aria-expanded', open ? 'true' : 'false');
  }
  function setActive() {
    var p = b.getAttribute('data-page');
    $$('[data-nav]').forEach(function (a) { a.classList.toggle('is-active', a.getAttribute('data-nav') === p); });
  }
  function onScroll() { var h = $('.so-header'); if (h) h.classList.toggle('is-stuck', window.scrollY > 10); }

  /* ---------- reveal + counter ---------- */
  var io = ('IntersectionObserver' in window) ? new IntersectionObserver(function (es) {
    es.forEach(function (e) {
      if (!e.isIntersecting) return;
      e.target.classList.add('in'); io.unobserve(e.target);
      $$('[data-count]', e.target).forEach(count);
      if (e.target.hasAttribute('data-count')) count(e.target);
    });
  }, { threshold: .15 }) : null;
  function count(el) {
    if (el.getAttribute('data-done')) return; el.setAttribute('data-done', '1');
    var to = parseFloat(el.getAttribute('data-count')), suf = el.getAttribute('data-suffix') || '', t0 = null;
    var reduce = window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches;
    function step(t) {
      if (t0 === null) t0 = t;
      var p = reduce ? 1 : Math.min((t - t0) / 1400, 1), v = Math.round(to * (1 - Math.pow(1 - p, 3)));
      el.textContent = v.toLocaleString('id-ID') + suf;
      if (p < 1) requestAnimationFrame(step);
    }
    requestAnimationFrame(step);
  }
  function scan() {
    $$('.so-reveal:not(.in), .so-bars:not(.in), [data-count]:not([data-done])').forEach(function (el) {
      if (io) io.observe(el); else { el.classList.add('in'); if (el.hasAttribute('data-count')) count(el); }
    });
  }
  function refresh() { setNav(false); setActive(); scan(); onScroll(); }

  /* ---------- galeri ---------- */
  var lbList = [], lbIdx = 0;
  function lbShow(i) {
    var lb = $('#soLb'); if (!lb || !lbList.length) return;
    lbIdx = (i + lbList.length) % lbList.length;
    var it = lbList[lbIdx], im = $('img', it);
    $('img', lb).src = im.src; $('img', lb).alt = im.alt; $('figcaption', lb).textContent = it.getAttribute('data-cap') || im.alt;
    lb.classList.add('is-open'); lb.setAttribute('aria-hidden', 'false');
  }
  function lbClose() { var lb = $('#soLb'); if (lb) { lb.classList.remove('is-open'); lb.setAttribute('aria-hidden', 'true'); } }

  /* ---------- toast + form ---------- */
  var tt;
  function toast(m) {
    var t = $('#soToast'); if (!t) return; t.textContent = m; t.classList.add('is-on');
    clearTimeout(tt); tt = setTimeout(function () { t.classList.remove('is-on'); }, 3800);
  }
  function validate(f) {
    var ok = true;
    $$('.so-field', f).forEach(function (w) {
      var c = $('input,textarea', w), er = $('.so-err', w); if (!c || !c.hasAttribute('required')) return;
      var v = (c.value || '').trim(), m = '';
      if (c.type === 'checkbox') { if (!c.checked) m = 'Centang untuk melanjutkan.'; }
      else if (!v) m = 'Kolom ini wajib diisi.';
      else if (c.type === 'email' && !/^[^\s@]+@[^\s@]+\.[^\s@]{2,}$/.test(v)) m = 'Format email belum benar.';
      else if (c.type === 'tel' && !/^[0-9+\-\s()]{8,16}$/.test(v)) m = 'Nomor WhatsApp belum benar.';
      w.classList.toggle('has-err', !!m); if (er) er.textContent = m; if (m) ok = false;
    });
    return ok;
  }

  /* ---------- chatbot ---------- */
  var greeted = false;
  function msgs() { return $('[data-chat-msgs]'); }
  function say(t, who) {
    var m = d.createElement('div'); m.className = 'so-msg so-msg--' + who; m.textContent = t;
    var box = msgs(); box.appendChild(m); box.scrollTop = box.scrollHeight; return m;
  }
  function answer(i) {
    var m = say('•••', 'bot'); m.classList.add('is-typing');
    setTimeout(function () {
      m.classList.remove('is-typing');
      if (i < 0) {
        m.textContent = 'Hmm, aku belum punya jawaban untuk itu. Coba pilih pertanyaan di bawah, atau tanya langsung tim kami lewat ';
        var a = d.createElement('a'); a.href = 'https://wa.me/' + b.getAttribute('data-wa'); a.target = '_blank'; a.rel = 'noopener'; a.textContent = 'WhatsApp'; m.appendChild(a); m.appendChild(d.createTextNode('.'));
      } else m.textContent = FAQ[i].a;
      var box = msgs(); box.scrollTop = box.scrollHeight;
    }, 650);
  }
  function find(t) {
    t = t.toLowerCase(); var best = -1, sc = 0;
    FAQ.forEach(function (f, i) { var s = 0; f.k.forEach(function (k) { if (t.indexOf(k) > -1) s++; }); if (s > sc) { sc = s; best = i; } });
    return best;
  }
  function chat(open) {
    var bot = $('#soBot'); if (!bot) return;
    var o = typeof open === 'boolean' ? open : !bot.classList.contains('is-open');
    bot.classList.toggle('is-open', o);
    $('#soBotPanel').setAttribute('aria-hidden', o ? 'false' : 'true');
    $('.so-bot__fab').setAttribute('aria-expanded', o ? 'true' : 'false');
    if (o && !greeted) {
      greeted = true;
      say('Halo, aku Tuki, asisten AI Gerak Nusa! Tanya apa saja soal program dan cara ikut berpartisipasi.', 'bot');
      var c = $('[data-chat-chips]');
      FAQ.slice(0, 6).forEach(function (f, i) {
        var x = d.createElement('button'); x.type = 'button'; x.className = 'so-chip'; x.textContent = f.q; x.setAttribute('data-chat-ask', i); c.appendChild(x);
      });
    }
    if (o) { var inp = $('[data-chat-form] input'); if (inp && window.innerWidth > 640) inp.focus(); }
  }
  function ask(i) { chat(true); say(FAQ[i].q, 'me'); answer(i); }

  /* ---------- delegasi event ---------- */
  d.addEventListener('click', function (e) {
    var t = e.target, el;
    if ((el = t.closest('.so-burger'))) { setNav(!b.classList.contains('nav-open')); return; }
    if (t.closest('.so-menu a')) setNav(false);
    if ((el = t.closest('[data-filter]'))) {
      var f = el.getAttribute('data-filter');
      $$('[data-filter]').forEach(function (c) { c.classList.toggle('is-on', c === el); });
      $$('.so-gal__item').forEach(function (g) { g.hidden = !(f === 'all' || g.getAttribute('data-cat') === f); });
      return;
    }
    if ((el = t.closest('.so-gal__item'))) {
      lbList = $$('.so-gal__item', el.closest('.so-main') || d).filter(function (g) { return !g.hidden; });
      lbShow(lbList.indexOf(el)); return;
    }
    if ((el = t.closest('[data-lb]'))) { var a = el.getAttribute('data-lb'); if (a === 'close') lbClose(); else lbShow(lbIdx + (a === 'next' ? 1 : -1)); return; }
    if (t.id === 'soLb') { lbClose(); return; }
    if ((el = t.closest('.so-faq__q'))) {
      var open = el.getAttribute('aria-expanded') === 'true';
      $$('.so-faq__q', el.closest('.so-faq')).forEach(function (q) { q.setAttribute('aria-expanded', 'false'); });
      el.setAttribute('aria-expanded', open ? 'false' : 'true'); return;
    }
    if ((el = t.closest('[data-chat-ask]'))) { ask(parseInt(el.getAttribute('data-chat-ask'), 10)); return; }
    if (t.closest('[data-chat-toggle]')) { chat(); return; }
    if (t.closest('[data-chat-open]')) { chat(true); }
  });
  d.addEventListener('submit', function (e) {
    var f = e.target;
    if (f.matches && f.matches('[data-chat-form]')) {
      e.preventDefault(); var inp = $('input', f), v = inp.value.trim(); if (!v) return;
      say(v, 'me'); inp.value = ''; answer(find(v)); return;
    }
    if (f.matches && f.matches('[data-so-form]')) {
      e.preventDefault();
      if (!validate(f)) { var bad = $('.has-err input,.has-err textarea', f); if (bad) bad.focus(); return; }
      // Hook untuk tim backend: dengarkan event ini untuk mengirim data ke server.
      f.dispatchEvent(new CustomEvent('so:submit', { bubbles: true, detail: new FormData(f) }));
      toast(f.getAttribute('data-ok') || 'Terima kasih! Tim kami akan menghubungimu lewat WhatsApp.'); f.reset();
    }
  });
  d.addEventListener('keydown', function (e) {
    if (e.key === 'Escape') { lbClose(); setNav(false); chat(false); }
    if ($('#soLb.is-open')) { if (e.key === 'ArrowRight') lbShow(lbIdx + 1); if (e.key === 'ArrowLeft') lbShow(lbIdx - 1); }
  });
  window.addEventListener('scroll', onScroll, { passive: true });
  window.addEventListener('resize', function () { if (window.innerWidth >= 1200) setNav(false); });
  d.addEventListener('so:refresh', refresh);
  if (d.readyState === 'loading') d.addEventListener('DOMContentLoaded', refresh); else refresh();
})();
