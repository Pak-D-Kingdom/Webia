/* UGC & Content Creator Studio | Futuristic Dark Mode | frontend statis (tanpa backend) */
(function () {
  'use strict';
  var $ = function (s, c) { return (c || document).querySelector(s); };
  var $$ = function (s, c) { return Array.prototype.slice.call((c || document).querySelectorAll(s)); };
  var reduce = window.matchMedia && matchMedia('(prefers-reduced-motion: reduce)').matches;

  /* ---- Navbar mobile ---- */
  var nav = $('.ugc-nav'), tg = $('[data-nav-toggle]');
  if (nav && tg) {
    var setNav = function (o) { nav.classList.toggle('is-open', o); tg.setAttribute('aria-expanded', String(o)); };
    tg.addEventListener('click', function () { setNav(!nav.classList.contains('is-open')); });
    $$('.ugc-links a').forEach(function (a) { a.addEventListener('click', function () { setNav(false); }); });
    document.addEventListener('keydown', function (e) { if (e.key === 'Escape') setNav(false); });
    window.addEventListener('resize', function () { if (window.innerWidth >= 1200) setNav(false); });
  }

  /* ---- Animasi muncul saat scroll ---- */
  if ('IntersectionObserver' in window) {
    document.documentElement.classList.add('ugc-js');
    var io = new IntersectionObserver(function (es) {
      es.forEach(function (e) {
        if (!e.isIntersecting) return;
        e.target.classList.add('is-in'); io.unobserve(e.target);
        setTimeout(function (t) { t.style.transitionDelay = ''; }, 900, e.target);
      });
    }, { threshold: 0.1 });
    $$('.ugc-sh,.ugc-card,.ugc-creator,.ugc-sample,.ugc-brand,.ugc-bstats,.ugc-marq,.ugc-banner,.ugc-mock,.ugc-acc details,.ugc-fcta,.ugc-rate,.ugc-cmp,.ugc-orbit,.ugc-form,.ugc-side').forEach(function (el, i) {
      el.classList.add('ugc-rv'); el.style.transitionDelay = (i % 4) * 70 + 'ms'; io.observe(el);
    });
  }

  /* ---- Hitung naik pada statistik hero + timecode REC ---- */
  if (!reduce) $$('.ugc-stats dd').forEach(function (el) {
    var m = el.textContent.match(/^([\d.,]+)(.*)$/); if (!m) return;
    var dec = m[1].indexOf(',') > -1, n = parseFloat(m[1].replace(/\./g, '').replace(',', '.')), suf = m[2], t0 = null;
    var fmt = function (v) { return dec ? v.toFixed(1).replace('.', ',') : Math.round(v).toLocaleString('id-ID'); };
    (function step(t) { t0 = t0 || t; var p = Math.min((t - t0) / 1400, 1); el.textContent = fmt(n * (1 - Math.pow(1 - p, 3))) + suf; if (p < 1) requestAnimationFrame(step); })(performance.now());
  });
  var tc = $('[data-tc]');
  if (tc && !reduce) { var sec = 24, pad = function (x) { return (x < 10 ? '0' : '') + x; }; setInterval(function () { sec = (sec + 1) % 3600; tc.textContent = pad(Math.floor(sec / 60)) + ':' + pad(sec % 60); }, 1000); }

  /* ---- Filter niche kreator ---- */
  $$('[data-filter]').forEach(function (b) {
    b.addEventListener('click', function () {
      var v = b.getAttribute('data-filter');
      $$('[data-filter]').forEach(function (x) { x.classList.toggle('is-on', x === b); });
      $$('[data-niche]').forEach(function (c) { c.hidden = !(v === 'Semua' || c.getAttribute('data-niche') === v); });
    });
  });

  /* ---- Dropdown kustom (menggantikan tampilan select bawaan, nilai tetap di select asli) ---- */
  $$('.ugc-f select').forEach(function (sel) {
    var w = document.createElement('div'); w.className = 'ugc-dd'; sel.parentNode.insertBefore(w, sel); w.appendChild(sel);
    sel.classList.add('ugc-dd__native'); sel.tabIndex = -1; sel.setAttribute('aria-hidden', 'true');
    var b = document.createElement('button'); b.type = 'button'; b.className = 'ugc-dd__btn'; b.setAttribute('aria-haspopup', 'listbox'); b.setAttribute('aria-expanded', 'false');
    var ul = document.createElement('ul'); ul.className = 'ugc-dd__list'; ul.setAttribute('role', 'listbox'); ul.hidden = true;
    Array.prototype.forEach.call(sel.options, function (o, i) { var li = document.createElement('li'); li.setAttribute('role', 'option'); li.textContent = o.text; li.setAttribute('data-i', i); ul.appendChild(li); });
    w.appendChild(b); w.appendChild(ul);
    var lb = $('label[for="' + sel.id + '"]'); if (lb) lb.addEventListener('click', function (e) { e.preventDefault(); b.focus(); });
    var sync = function () { b.textContent = sel.options[sel.selectedIndex].text; Array.prototype.forEach.call(ul.children, function (li, i) { li.setAttribute('aria-selected', String(i === sel.selectedIndex)); }); };
    var shut = function () { ul.hidden = true; b.setAttribute('aria-expanded', 'false'); };
    b.addEventListener('click', function () { var o = ul.hidden; $$('.ugc-dd__list').forEach(function (x) { x.hidden = true; }); ul.hidden = !o; b.setAttribute('aria-expanded', String(o)); });
    ul.addEventListener('click', function (e) { var li = e.target.closest('li'); if (!li) return; sel.selectedIndex = +li.getAttribute('data-i'); sync(); shut(); b.focus(); sel.dispatchEvent(new Event('change', { bubbles: true })); });
    b.addEventListener('keydown', function (e) {
      var i = sel.selectedIndex, n = sel.options.length;
      if (e.key === 'ArrowDown' || e.key === 'ArrowUp') { e.preventDefault(); sel.selectedIndex = Math.max(0, Math.min(n - 1, i + (e.key === 'ArrowDown' ? 1 : -1))); sync(); }
      if (e.key === 'Escape') shut();
    });
    document.addEventListener('click', function (e) { if (!w.contains(e.target)) shut(); });
    sync();
  });

  /* ---- Pratinjau video (lightbox) ---- */
  var lb = $('.ugc-lb');
  if (lb) {
    $$('[data-lb]').forEach(function (a) {
      a.addEventListener('click', function (e) {
        e.preventDefault();
        var g = function (k) { return a.getAttribute('data-' + k); };
        $('img', lb).src = g('img'); $('[data-lb-t]', lb).textContent = g('title'); $('[data-lb-b]', lb).textContent = g('brand');
        $('[data-lb-d]', lb).textContent = g('dur'); $('[data-lb-v]', lb).textContent = g('views'); $('[data-lb-r]', lb).textContent = g('ret');
        if (lb.showModal) lb.showModal(); else lb.setAttribute('open', '');
      });
    });
    var shutLb = function () { if (lb.close) lb.close(); else lb.removeAttribute('open'); };
    lb.addEventListener('click', function (e) { if (e.target === lb) shutLb(); });
    $('[data-lb-close]', lb).addEventListener('click', shutLb);
  }

  /* ---- Form inquiry: validasi, lalu kirim lewat WhatsApp (tanpa server) ---- */
  var form = $('[data-ugc-form]');
  if (form) {
    var ta = $('textarea', form), cnt = $('[data-count]', form);
    if (ta && cnt) ta.addEventListener('input', function () { cnt.textContent = ta.value.length + '/600'; });
    var setSum = function (k, v) { var x = $('[data-sum="' + k + '"]'); if (x) x.textContent = v; };
    var upd = function () {
      var req = $$('[data-req]', form), n = req.filter(function (x) { return x.value.trim(); }).length + ($('[data-consent]', form).checked ? 1 : 0), p = Math.round(n / (req.length + 1) * 100);
      var bar = $('[data-prog]', form), pt = $('[data-prog-t]', form); if (bar) bar.style.width = p + '%'; if (pt) pt.textContent = p + '%';
      var pk = $('[name=paket]:checked', form), pf = $$('[name="platform[]"]:checked', form).map(function (x) { return x.value; });
      setSum('paket', pk ? pk.value : '-'); setSum('budget', form.elements.budget.value || '-');
      setSum('platform', pf.length ? pf.join(', ') : 'Belum dipilih'); setSum('tanggal', form.elements.tanggal.value || '-');
    };
    form.addEventListener('input', upd); form.addEventListener('change', upd); upd();
    form.addEventListener('submit', function (e) {
      e.preventDefault();
      var ok = true;
      $$('[data-req]', form).forEach(function (el) {
        var v = el.value.trim(), t = el.getAttribute('data-req');
        var bad = !v || (t === 'email' && !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(v)) || (t === 'wa' && !/^\+?[0-9\s-]{8,16}$/.test(v));
        var m = el.parentNode.querySelector('.ugc-err');
        el.setAttribute('aria-invalid', String(bad));
        if (m) m.textContent = bad ? el.getAttribute('data-msg') : '';
        if (bad && ok) { el.focus(); ok = false; }
      });
      var c = $('[data-consent]', form), cm = c.closest('.ugc-f').querySelector('.ugc-err');
      cm.textContent = c.checked ? '' : 'Centang persetujuan untuk melanjutkan.';
      if (!c.checked) ok = false;
      if (!ok) return;
      var g = function (n) { var x = form.elements[n]; return x && x.value ? x.value.trim() : '-'; };
      var pf = $$('[name="platform[]"]:checked', form).map(function (x) { return x.value; }).join(', ') || '-';
      var pk = $('[name=paket]:checked', form);
      var msg = ['Halo SOROT Studio, saya ingin mengirim brief kampanye.', '', 'Nama: ' + g('nama'), 'Brand: ' + g('brand'), 'Email: ' + g('email'), 'WhatsApp: ' + g('wa'),
        'Paket: ' + (pk ? pk.value : '-'), 'Anggaran: ' + g('budget'), 'Platform: ' + pf, 'Target tayang: ' + g('tanggal'), '', 'Brief:', g('brief')].join('\n');
      var url = 'https://wa.me/' + form.getAttribute('data-wa') + '?text=' + encodeURIComponent(msg);
      var done = $('[data-ok]'), lk = $('[data-wa-link]', done);
      lk.href = url; form.hidden = true; done.hidden = false; done.scrollIntoView({ block: 'center' });
      window.open(url, '_blank', 'noopener');
    });
  }

  /* ---- Chatbot FAQ (paket & kolaborasi) ---- */
  var chat = $('#ugc-chat'); if (!chat) return;
  var faq = []; try { faq = JSON.parse($('#ugc-data').textContent) || []; } catch (err) { faq = []; }
  var log = $('.ugc-chat__log', chat), chips = $('.ugc-chat__chips', chat), inp = $('.ugc-chat__in input', chat);
  var fab = $('.ugc-fab'), greeted = false, box = null, asked = [];

  function add(text, who, go) {
    var p = document.createElement('p'); p.className = 'ugc-b ' + who; p.textContent = text;
    var l = go ? $('[data-nav="' + go + '"]') : null;
    if (l) { p.appendChild(document.createElement('br')); var a = document.createElement('a'); a.href = l.href; a.textContent = 'Buka halaman terkait'; p.appendChild(a); }
    log.appendChild(p); log.scrollTop = log.scrollHeight; return p;
  }
  function chipsFor() {
    chips.innerHTML = '';
    faq.filter(function (f) { return asked.indexOf(f.q) < 0; }).slice(0, 3).forEach(function (f) {
      var b = document.createElement('button'); b.type = 'button'; b.textContent = f.q; b.addEventListener('click', function () { ask(f.q); }); chips.appendChild(b);
    });
  }
  function answer(q) {
    var t = q.toLowerCase(), best = null, score = 0;
    faq.forEach(function (f) {
      var s = t === f.q.toLowerCase() ? 99 : (f.k || []).reduce(function (n, k) { return n + (t.indexOf(k) > -1 ? 1 : 0); }, 0);
      if (s > score) { score = s; best = f; }
    });
    var typing = document.createElement('p'); typing.className = 'ugc-b bot'; typing.innerHTML = '<span class="ugc-typing"><i></i><i></i><i></i></span>';
    log.appendChild(typing); log.scrollTop = log.scrollHeight;
    setTimeout(function () {
      typing.remove();
      if (best) add(best.a, 'bot', best.go);
      else {
        var p = add('Saya belum menemukan jawabannya. Coba pilih pertanyaan di bawah, atau tanyakan langsung ke tim kami lewat WhatsApp.', 'bot'), wa = $('.ugc-wa');
        if (wa) { var a = document.createElement('a'); p.appendChild(document.createElement('br')); a.href = wa.href; a.target = '_blank'; a.rel = 'noopener'; a.textContent = 'Chat WhatsApp'; p.appendChild(a); }
      }
    }, reduce ? 0 : 550);
  }
  function ask(q) {
    if (!q.trim()) return;
    if (box) { box.remove(); box = null; }
    asked.push(q); add(q, 'user'); answer(q); chipsFor();
  }
  function open(o) {
    chat.hidden = !o; fab.setAttribute('aria-expanded', String(o));
    if (o) {
      if (!greeted) {
        greeted = true;
        add('Halo! Saya asisten SOROT. Pilih pertanyaan di bawah atau ketik sendiri.', 'bot');
        box = document.createElement('div'); box.className = 'ugc-sugg'; box.innerHTML = '<p>Pertanyaan populer</p>';
        faq.forEach(function (f) { var b = document.createElement('button'); b.type = 'button'; b.textContent = f.q; b.addEventListener('click', function () { ask(f.q); }); box.appendChild(b); });
        log.appendChild(box);
      }
      inp.focus();
    } else fab.focus();
  }
  $$('[data-bot-open]').forEach(function (b) { b.addEventListener('click', function () { open(b === fab ? chat.hidden : true); }); });
  $('[data-bot-close]', chat).addEventListener('click', function () { open(false); });
  document.addEventListener('keydown', function (e) { if (e.key === 'Escape' && !chat.hidden) open(false); });
  $('.ugc-chat__in', chat).addEventListener('submit', function (e) { e.preventDefault(); var v = inp.value; inp.value = ''; ask(v); });
})();
