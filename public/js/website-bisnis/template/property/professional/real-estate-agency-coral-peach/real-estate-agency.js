/* ==========================================================================
   Coral Homes — Real Estate Agency · Professional · Coral & Peach
   File  : public/js/website-bisnis/template/property/professional/
           real-estate-agency-coral-peach/real-estate-agency.js
   Vanilla JS (tanpa dependensi). Setiap modul aman dipanggil di halaman mana pun:
   modul hanya aktif bila elemen `data-*`-nya ada.
   Hook untuk backend  : event `coral:form-valid` (detail: { form, data }) dari form statis.
   ========================================================================== */
(function () {
  'use strict';

  /* ---------- Helper ---------- */
  var $ = function (s, c) { return (c || document).querySelector(s); };
  var $$ = function (s, c) { return Array.prototype.slice.call((c || document).querySelectorAll(s)); };
  var reduceMotion = window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches;
  var storage = {
    get: function (k) { try { return JSON.parse(window.localStorage.getItem(k)); } catch (e) { return null; } },
    set: function (k, v) { try { window.localStorage.setItem(k, JSON.stringify(v)); } catch (e) { /* abaikan */ } }
  };
  function debounce(fn, ms) { var t; return function () { var a = arguments, c = this; clearTimeout(t); t = setTimeout(function () { fn.apply(c, a); }, ms); }; }
  function pad(n) { return String(n).padStart(2, '0'); }
  function todayISO() { var d = new Date(); return d.getFullYear() + '-' + pad(d.getMonth() + 1) + '-' + pad(d.getDate()); }

  /* ---------- 1. Navbar (sticky, menu mobile, pencarian cepat) ---------- */
  function initNavbar() {
    var nav = $('[data-navbar]');
    if (!nav) return;
    var menu = $('[data-menu]', nav);
    var burger = $('[data-menu-toggle]', nav);
    var searchBtn = $('[data-search-toggle]', nav);
    var search = $('.quick-search', nav);

    function onScroll() { nav.classList.toggle('is-scrolled', window.scrollY > 8); }
    onScroll();
    window.addEventListener('scroll', onScroll, { passive: true });

    function setMenu(open) {
      if (!menu || !burger) return;
      menu.classList.toggle('is-open', open);
      burger.setAttribute('aria-expanded', String(open));
      burger.setAttribute('aria-label', open ? 'Tutup menu' : 'Buka menu');
      var use = $('use', burger);
      if (use) use.setAttribute('href', open ? '#i-x' : '#i-menu');
    }
    function setSearch(open) {
      if (!search || !searchBtn) return;
      search.hidden = !open;
      searchBtn.setAttribute('aria-expanded', String(open));
      if (open) { var i = $('input', search); if (i) i.focus(); }
    }

    if (burger) burger.addEventListener('click', function () { setMenu(!menu.classList.contains('is-open')); });
    if (searchBtn) searchBtn.addEventListener('click', function () { setSearch(search.hidden); });
    if (menu) $$('a', menu).forEach(function (a) { a.addEventListener('click', function () { setMenu(false); }); });
    document.addEventListener('keydown', function (e) { if (e.key === 'Escape') { setMenu(false); setSearch(false); } });
    document.addEventListener('click', function (e) { if (!nav.contains(e.target)) { setMenu(false); } });
    window.addEventListener('resize', debounce(function () { if (window.innerWidth >= 992) setMenu(false); }, 120));
  }

  /* ---------- 2. Reveal saat scroll ---------- */
  function initReveal() {
    var items = $$('.reveal');
    if (!items.length) return;
    if (!('IntersectionObserver' in window) || reduceMotion) { items.forEach(function (el) { el.classList.add('is-visible'); }); return; }
    var io = new IntersectionObserver(function (entries) {
      entries.forEach(function (en) { if (en.isIntersecting) { en.target.classList.add('is-visible'); io.unobserve(en.target); } });
    }, { rootMargin: '0px 0px -8% 0px', threshold: 0.08 });
    items.forEach(function (el, i) { el.style.transitionDelay = ((i % 4) * 70) + 'ms'; io.observe(el); });
  }

  /* ---------- 3. Form pencarian beranda (query string bersih) ---------- */
  function initSearchForm() {
    $$('[data-search-form]').forEach(function (form) {
      form.addEventListener('submit', function () {
        $$('select', form).forEach(function (s) { if (!s.value) s.disabled = true; });
      });
      window.addEventListener('pageshow', function () { $$('select', form).forEach(function (s) { s.disabled = false; }); });
    });
  }

  /* ---------- 4. Filter, cari & urut properti ---------- */
  function initPropertyFilter() {
    var form = $('[data-filter-form]');
    var grid = $('[data-property-grid]');
    if (!form || !grid) return;
    var cards = $$('[data-property]', grid);
    var count = $('[data-result-count]');
    var empty = $('[data-empty]');
    var keys = ['q', 'location', 'type', 'price', 'area', 'sort'];
    var params = new URLSearchParams(window.location.search);

    keys.forEach(function (k) { var el = form.elements[k]; if (el && params.get(k)) el.value = params.get(k); });
    cards.forEach(function (c, i) { c.dataset.index = i; });

    function range(v) { if (!v) return null; var p = v.split('-').map(Number); return { min: p[0], max: p[1] }; }

    function apply(updateUrl) {
      var q = (form.elements.q.value || '').trim().toLowerCase();
      var loc = form.elements.location.value;
      var type = form.elements.type.value;
      var pr = range(form.elements.price.value);
      var ar = range(form.elements.area.value);
      var sort = form.elements.sort.value;
      var visible = [];

      cards.forEach(function (c) {
        var d = c.dataset, price = Number(d.price), b = Number(d.building);
        var ok = (!q || d.name.indexOf(q) > -1 || d.city.indexOf(q) > -1) &&
                 (!loc || d.city === loc) && (!type || d.type === type) &&
                 (!pr || (price >= pr.min && price <= pr.max)) &&
                 (!ar || (b >= ar.min && b <= ar.max));
        c.hidden = !ok;
        if (ok) visible.push(c);
      });

      var sorted = cards.slice().sort(function (a, b) {
        if (sort === 'price-asc') return a.dataset.price - b.dataset.price;
        if (sort === 'price-desc') return b.dataset.price - a.dataset.price;
        if (sort === 'name') return a.dataset.name.localeCompare(b.dataset.name);
        return a.dataset.index - b.dataset.index;
      });
      sorted.forEach(function (c, i) { c.style.order = i; });

      if (count) count.textContent = visible.length ? 'Menampilkan ' + visible.length + ' dari ' + cards.length + ' properti' : 'Tidak ada properti yang cocok';
      if (empty) empty.hidden = visible.length > 0;
      grid.hidden = visible.length === 0;

      if (updateUrl && window.history && history.replaceState) {
        var qs = new URLSearchParams();
        keys.forEach(function (k) { var v = form.elements[k].value; if (v) qs.set(k, v); });
        history.replaceState(null, '', window.location.pathname + (qs.toString() ? '?' + qs.toString() : ''));
      }
    }

    function reset() { form.reset(); apply(true); }

    form.addEventListener('submit', function (e) { e.preventDefault(); apply(true); });
    form.addEventListener('change', function () { apply(true); });
    form.elements.q.addEventListener('input', debounce(function () { apply(true); }, 180));
    $$('[data-filter-reset]').forEach(function (b) { b.addEventListener('click', reset); });
    apply(false);
  }

  /* ---------- 5. Favorit (localStorage, aman bila diblokir) ---------- */
  function initFavorites() {
    var buttons = $$('[data-fav]');
    if (!buttons.length) return;
    var KEY = 'coralhomes:favs';
    var favs = storage.get(KEY) || [];
    function paint(btn) {
      var on = favs.indexOf(btn.dataset.fav) > -1;
      btn.setAttribute('aria-pressed', String(on));
    }
    buttons.forEach(function (btn) {
      paint(btn);
      btn.addEventListener('click', function (e) {
        e.preventDefault();
        var id = btn.dataset.fav, i = favs.indexOf(id);
        if (i > -1) favs.splice(i, 1); else favs.push(id);
        storage.set(KEY, favs);
        buttons.forEach(function (b) { if (b.dataset.fav === id) paint(b); });
      });
    });
  }

  /* ---------- 6. Lightbox galeri ---------- */
  function initLightbox() {
    var root = $('[data-lightbox-root]');
    var triggers = $$('a[data-lightbox]');
    if (!root || !triggers.length) return;
    var img = $('[data-lb-img]', root), video = $('[data-lb-video]', root), cap = $('[data-lb-caption]', root);
    var prev = $('[data-lb-prev]', root), next = $('[data-lb-next]', root), closeBtn = $('[data-lb-close]', root);
    var list = [], idx = 0, lastFocus = null, touchX = null;

    function render() {
      var el = list[idx];
      var vid = el.getAttribute('data-video');
      if (vid) {
        img.hidden = true; video.hidden = false; video.src = vid; video.play && video.play().catch(function () {});
      } else {
        video.pause && video.pause(); video.removeAttribute('src'); video.hidden = true;
        img.hidden = false; img.src = el.getAttribute('href'); img.alt = el.getAttribute('data-caption') || '';
      }
      cap.textContent = (el.getAttribute('data-caption') || '') + (list.length > 1 ? '  ·  ' + (idx + 1) + '/' + list.length : '');
      prev.hidden = next.hidden = list.length < 2;
    }
    function open(el) {
      var group = el.getAttribute('data-lightbox');
      list = $$('a[data-lightbox="' + group + '"]').filter(function (a) { return !a.hidden; });
      idx = Math.max(0, list.indexOf(el));
      lastFocus = document.activeElement;
      root.hidden = false; document.body.classList.add('no-scroll');
      render(); closeBtn.focus();
    }
    function close() {
      root.hidden = true; document.body.classList.remove('no-scroll');
      video.pause && video.pause(); video.removeAttribute('src');
      if (lastFocus && lastFocus.focus) lastFocus.focus();
    }
    function go(step) { idx = (idx + step + list.length) % list.length; render(); }

    triggers.forEach(function (a) { a.addEventListener('click', function (e) { e.preventDefault(); open(a); }); });
    closeBtn.addEventListener('click', close);
    prev.addEventListener('click', function () { go(-1); });
    next.addEventListener('click', function () { go(1); });
    root.addEventListener('click', function (e) { if (e.target === root) close(); });
    document.addEventListener('keydown', function (e) {
      if (root.hidden) return;
      if (e.key === 'Escape') close();
      else if (e.key === 'ArrowLeft' && list.length > 1) go(-1);
      else if (e.key === 'ArrowRight' && list.length > 1) go(1);
    });
    root.addEventListener('touchstart', function (e) { touchX = e.changedTouches[0].clientX; }, { passive: true });
    root.addEventListener('touchend', function (e) {
      if (touchX === null || list.length < 2) return;
      var dx = e.changedTouches[0].clientX - touchX;
      if (Math.abs(dx) > 50) go(dx < 0 ? 1 : -1);
      touchX = null;
    }, { passive: true });
  }

  /* ---------- 7. Filter kategori galeri ---------- */
  function initGalleryFilter() {
    var buttons = $$('[data-gallery-filter]');
    var items = $$('[data-gallery-grid] [data-cat]');
    if (!buttons.length) return;
    buttons.forEach(function (btn) {
      btn.addEventListener('click', function () {
        var cat = btn.getAttribute('data-gallery-filter');
        buttons.forEach(function (b) { var on = b === btn; b.classList.toggle('is-active', on); b.setAttribute('aria-pressed', String(on)); });
        items.forEach(function (it) { it.hidden = !(cat === 'all' || it.getAttribute('data-cat') === cat); });
      });
    });
  }

  /* ---------- 8. Form: validasi, booking & pesan sukses ---------- */
  var PHONE = /^(?:\+62|62|0)8[1-9]\d{6,11}$/;
  var EMAIL = /^[^\s@]+@[^\s@]+\.[^\s@]{2,}$/;
  var DAYS = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];

  /* ---------- 8a. Kirim form ke WhatsApp (data-whatsapp = nomor tujuan, format 62xxxxxxxxxx) ---------- */
  function formatDateId(v) {
    var d = new Date(v + 'T00:00:00');
    if (isNaN(d.getTime())) return v;
    try { return d.toLocaleDateString('id-ID', { weekday: 'long', day: 'numeric', month: 'long', year: 'numeric' }); } catch (e) { return v; }
  }
  function waMessage(form) {
    var lines = [form.getAttribute('data-wa-intro') || 'Halo Coral Homes,', ''];
    $$('[data-field]', form).forEach(function (f) {
      var c = $('input, textarea, select', f);
      if (!c) return;
      var v = (c.value || '').trim();
      if (!v) return;
      if (c.tagName === 'SELECT') v = c.options[c.selectedIndex].text;
      else if (c.type === 'date') v = formatDateId(v);
      var l = $('label', f);
      var label = c.getAttribute('data-wa-label') || (l ? l.textContent.trim() : c.name);
      lines.push(label + ': ' + v);
    });
    lines.push('', 'Terima kasih.');
    return lines.join('\n');
  }
  function openWhatsApp(url) {
    var a = document.createElement('a');
    a.href = url; a.target = '_blank'; a.rel = 'noopener noreferrer';
    document.body.appendChild(a); a.click(); a.remove();
  }

  function initForms() {
    var forms = $$('[data-validate-form]');
    if (!forms.length) return;
    var params = new URLSearchParams(window.location.search);

    forms.forEach(function (form) {
      var closed = [];
      try { closed = JSON.parse(form.getAttribute('data-closed') || '[]'); } catch (e) { closed = []; }
      var status = $('.form__status', form);
      var dateInput = $('[data-date]', form);
      if (dateInput) dateInput.min = todayISO();

      // Isi otomatis dari query string (alur beranda → halaman Booking)
      if (form.hasAttribute('data-prefill')) {
        ['date', 'time', 'property'].forEach(function (k) {
          var el = form.elements[k]; var v = params.get(k);
          if (el && v) el.value = v;
        });
      }

      function message(control) {
        var v = (control.value || '').trim();
        if (control.required && !v) {
          return control.tagName === 'SELECT' || control.type === 'date' ? 'Silakan pilih terlebih dahulu.' : 'Kolom ini wajib diisi.';
        }
        if (!v) return '';
        if (control.type === 'email' && !EMAIL.test(v)) return 'Format email tidak valid.';
        if (control.getAttribute('data-type') === 'phone' && !PHONE.test(v.replace(/[\s().-]/g, ''))) return 'Nomor tidak valid. Contoh: 0812 3456 7890';
        var min = Number(control.getAttribute('minlength'));
        if (min && v.length < min) return 'Minimal ' + min + ' karakter.';
        if (control.type === 'date') {
          if (v < todayISO()) return 'Tanggal tidak boleh sebelum hari ini.';
          var day = new Date(v + 'T00:00:00').getDay();
          if (closed.indexOf(day) > -1) return 'Kami tutup pada hari ' + DAYS[day] + '. Silakan pilih hari lain.';
        }
        return '';
      }

      function check(field) {
        var control = $('input, textarea, select', field);
        var err = $('.field__error', field);
        if (!control || !err) return true;
        var msg = message(control);
        field.classList.toggle('is-invalid', !!msg);
        control.setAttribute('aria-invalid', msg ? 'true' : 'false');
        err.textContent = msg;
        if (!err.id) err.id = 'err-' + (control.id || Math.random().toString(36).slice(2, 8));
        control.setAttribute('aria-describedby', err.id);
        return !msg;
      }

      $$('[data-field]', form).forEach(function (field) {
        var control = $('input, textarea, select', field);
        if (!control) return;
        control.addEventListener('blur', function () { check(field); });
        control.addEventListener(control.tagName === 'SELECT' || control.type === 'date' ? 'change' : 'input', function () {
          if (field.classList.contains('is-invalid')) check(field);
        });
      });

      form.addEventListener('submit', function (e) {
        var fields = $$('[data-field]', form);
        var firstBad = null;
        fields.forEach(function (f) { if (!check(f) && !firstBad) firstBad = f; });
        if (firstBad) {
          e.preventDefault();
          var c = $('input, textarea, select', firstBad); if (c) c.focus();
          return;
        }
        // Form GET (mis. booking singkat di beranda) → biarkan browser melanjutkan ke halaman tujuan.
        if ((form.getAttribute('method') || 'get').toLowerCase() === 'get') return;

        e.preventDefault();

        // Form WhatsApp: susun pesan dari isian, buka WhatsApp, tampilkan tautan cadangan.
        // (Tanpa honeypot: form ini tidak mengirim apa pun ke server, dan isian otomatis browser bisa mengisinya.)
        var waNum = form.getAttribute('data-whatsapp');
        if (waNum) {
          var waBtn = $('button[type="submit"]', form), waLabel = waBtn ? $('span', waBtn) : null, waOriginal = waLabel ? waLabel.textContent : '';
          var waUrl = 'https://wa.me/' + waNum + '?text=' + encodeURIComponent(waMessage(form));
          var waData = {};
          new FormData(form).forEach(function (v, k) { if (k !== '_token') waData[k] = v; });
          var failed = false;
          try { openWhatsApp(waUrl); } catch (err) { failed = true; }
          try { document.dispatchEvent(new CustomEvent('coral:form-valid', { detail: { form: form.getAttribute('data-form-name') || 'form', data: waData } })); } catch (err2) { /* abaikan */ }
          if (waBtn && waLabel) {
            waBtn.disabled = true; waLabel.textContent = 'Membuka WhatsApp…';
            window.setTimeout(function () { waBtn.disabled = false; waLabel.textContent = waOriginal; }, 1500);
          }
          form.reset();
          if (dateInput) dateInput.min = todayISO();
          if (status) {
            status.textContent = (failed ? 'WhatsApp tidak dapat dibuka otomatis. ' : (form.getAttribute('data-success') || 'WhatsApp dibuka dengan pesan Anda.') + ' ');
            var again = document.createElement('a');
            again.href = waUrl; again.target = '_blank'; again.rel = 'noopener noreferrer'; again.textContent = failed ? 'Klik di sini untuk membuka WhatsApp' : 'Buka WhatsApp lagi';
            again.style.fontWeight = '600'; again.style.textDecoration = 'underline';
            status.appendChild(again);
            status.classList.toggle('is-error', failed); status.hidden = false;
            status.scrollIntoView({ block: 'nearest', behavior: reduceMotion ? 'auto' : 'smooth' });
            window.setTimeout(function () { status.hidden = true; }, 15000);
          }
          return;
        }

        if (form.elements.website && form.elements.website.value) return; // honeypot (form non-WhatsApp)
        var btn = $('button[type="submit"]', form);
        var label = btn ? $('span', btn) : null, original = label ? label.textContent : '';
        if (btn) { btn.disabled = true; if (label) label.textContent = 'Mengirim…'; }

        var payload = {};
        new FormData(form).forEach(function (v, k) { if (k !== '_token' && k !== 'website') payload[k] = v; });

        window.setTimeout(function () {
          document.dispatchEvent(new CustomEvent('coral:form-valid', { detail: { form: form.getAttribute('data-form-name') || 'form', data: payload } }));
          form.reset();
          if (dateInput) dateInput.min = todayISO();
          if (btn) { btn.disabled = false; if (label) label.textContent = original; }
          if (status) {
            status.textContent = form.getAttribute('data-success') || 'Terima kasih! Data Anda telah terkirim.';
            status.classList.remove('is-error'); status.hidden = false;
            status.scrollIntoView({ block: 'nearest', behavior: reduceMotion ? 'auto' : 'smooth' });
            window.setTimeout(function () { status.hidden = true; }, 8000);
          }
        }, 700);
      });
    });
  }

  /* ---------- 9. Chatbot AI Property FAQ ---------- */
  function initChatbot() {
    var root = $('[data-chatbot]');
    var dataEl = $('#coral-faq');
    if (!root || !dataEl) return;
    var faq; try { faq = JSON.parse(dataEl.textContent); } catch (e) { return; }

    var panel = $('[data-chat-panel]', root), toggle = $('[data-chat-toggle]', root), closeBtn = $('[data-chat-close]', root);
    var log = $('[data-chat-log]', root), form = $('[data-chat-form]', root), input = $('input', form), hint = $('[data-chat-hint]', root);
    var wa = $('.fab-wa'); var waHref = wa ? wa.getAttribute('href') : '#';
    var busy = false;

    function setOpen(open) {
      panel.hidden = !open;
      toggle.setAttribute('aria-expanded', String(open));
      toggle.setAttribute('aria-label', open ? 'Tutup AI Assistant' : 'Buka AI Assistant');
      document.body.classList.toggle('chat-open', open);
      if (open) { hint.hidden = true; scroll(); if (window.innerWidth >= 768) input.focus(); }
    }
    function scroll() { log.scrollTop = log.scrollHeight; }

    function addMsg(text, who, withWa) {
      var el = document.createElement('div');
      el.className = 'msg msg--' + who;
      var p = document.createElement('p'); p.textContent = text; el.appendChild(p);
      if (withWa) {
        var a = document.createElement('a'); a.href = waHref; a.target = '_blank'; a.rel = 'noopener noreferrer'; a.textContent = 'Chat via WhatsApp →';
        a.style.display = 'inline-block'; a.style.marginTop = '6px'; el.appendChild(a);
      }
      log.appendChild(el); scroll();
      return el;
    }

    function find(text) {
      var t = text.toLowerCase();
      if (/\b(halo|hai|hi|hello|selamat (pagi|siang|sore|malam))\b/.test(t)) return { answer: faq.greeting };
      if (/(terima kasih|makasih|thanks|thank you)/.test(t)) return { answer: 'Sama-sama! Jika ada pertanyaan lain seputar properti kami, silakan tanya kapan saja 😊' };
      var best = null, bestScore = 0;
      faq.items.forEach(function (it) {
        var score = 0;
        it.keywords.forEach(function (k) { if (t.indexOf(k) > -1) score += k.length > 3 ? 2 : 1; });
        if (score > bestScore) { best = it; bestScore = score; }
      });
      return best ? { answer: best.answer } : { answer: faq.fallback, wa: true };
    }

    function reply(res) {
      busy = true;
      var typing = document.createElement('div');
      typing.className = 'msg msg--bot msg--typing'; typing.setAttribute('aria-label', 'Asisten sedang mengetik');
      typing.innerHTML = '<i></i><i></i><i></i>';
      log.appendChild(typing); scroll();
      window.setTimeout(function () {
        typing.remove(); addMsg(res.answer, 'bot', res.wa); busy = false;
      }, reduceMotion ? 50 : 650 + Math.min(res.answer.length * 4, 700));
    }

    function ask(text, key) {
      if (busy || !text.trim()) return;
      addMsg(text, 'user');
      var res;
      if (key) { var it = faq.items.filter(function (i) { return i.key === key; })[0]; res = it ? { answer: it.answer } : find(text); }
      else res = find(text);
      reply(res);
    }

    toggle.addEventListener('click', function () { setOpen(panel.hidden); });
    closeBtn.addEventListener('click', function () { setOpen(false); toggle.focus(); });
    document.addEventListener('keydown', function (e) { if (e.key === 'Escape' && !panel.hidden) { setOpen(false); toggle.focus(); } });

    form.addEventListener('submit', function (e) { e.preventDefault(); var v = input.value; input.value = ''; ask(v); });
    $$('[data-chat-quick]', root).forEach(function (b) {
      b.addEventListener('click', function () { ask(b.textContent, b.getAttribute('data-chat-quick')); });
    });

    // Pemicu dari kartu AI FAQ inline di halaman
    $$('[data-chat-open]').forEach(function (b) {
      b.addEventListener('click', function () { setOpen(true); ask(b.textContent, b.getAttribute('data-chat-open')); });
    });
    $$('[data-chat-inline]').forEach(function (f) {
      f.addEventListener('submit', function (e) {
        e.preventDefault(); var i = $('input', f); var v = i.value; i.value = '';
        setOpen(true); ask(v);
      });
    });

    // Gelembung sapaan sekali per sesi
    var seen = false; try { seen = window.sessionStorage.getItem('coral-hint') === '1'; } catch (e) { /* abaikan */ }
    if (!seen) {
      window.setTimeout(function () {
        if (!panel.hidden) return;
        hint.hidden = false;
        try { window.sessionStorage.setItem('coral-hint', '1'); } catch (e) { /* abaikan */ }
        window.setTimeout(function () { hint.hidden = true; }, 7000);
      }, 4500);
    }
  }

  /* ---------- 10. Tombol kembali ke atas ---------- */
  function initToTop() {
    $$('[data-to-top]').forEach(function (b) {
      b.addEventListener('click', function () { window.scrollTo({ top: 0, behavior: reduceMotion ? 'auto' : 'smooth' }); });
    });
  }

  /* ---------- 11. Blog: filter, cari, baca selengkapnya ---------- */
  function initBlog() {
    var grid = $('[data-blog-grid]');
    if (!grid) return;
    var cards = $$('.b-card', grid);
    var buttons = $$('[data-blog-filter]');
    var search = $('[data-blog-search]');
    var empty = $('[data-blog-empty]');
    var cat = 'all';

    function apply() {
      var q = search ? search.value.trim().toLowerCase() : '';
      var shown = 0;
      cards.forEach(function (c) {
        var ok = (cat === 'all' || c.getAttribute('data-cat') === cat) && (!q || c.getAttribute('data-title').indexOf(q) > -1);
        c.hidden = !ok; if (ok) shown++;
      });
      if (empty) empty.hidden = shown > 0;
    }
    buttons.forEach(function (b) {
      b.addEventListener('click', function () {
        cat = b.getAttribute('data-blog-filter');
        buttons.forEach(function (x) { var on = x === b; x.classList.toggle('is-active', on); x.setAttribute('aria-pressed', String(on)); });
        apply();
      });
    });
    if (search) search.addEventListener('input', debounce(apply, 150));
  }

  /* ---------- 12. Dropdown kustom (progressive enhancement dari <select>) ---------- */
  function initSelects() {
    var wraps = $$('.select');
    if (!wraps.length) return;
    var uid = 0;
    var CHECK = '<svg class="icon" aria-hidden="true"><use href="#i-check"/></svg>';

    function closeAll(except) {
      $$('.select.is-open').forEach(function (w) { if (w !== except && w._closeSelect) w._closeSelect(); });
    }

    wraps.forEach(function (wrap) {
      var sel = $('select', wrap);
      if (!sel || wrap.classList.contains('is-enhanced')) return;
      uid++;

      var btn = document.createElement('button');
      btn.type = 'button'; btn.className = 'select__btn'; btn.id = 'sel-btn-' + uid;
      btn.setAttribute('aria-haspopup', 'listbox'); btn.setAttribute('aria-expanded', 'false');
      var text = document.createElement('span'); text.className = 'select__label'; btn.appendChild(text);

      var list = document.createElement('ul');
      list.className = 'select__list'; list.id = 'sel-list-' + uid; list.setAttribute('role', 'listbox'); list.tabIndex = -1;
      btn.setAttribute('aria-controls', list.id);

      var label = sel.id ? document.querySelector('label[for="' + sel.id + '"]') : null;
      if (label) {
        if (!label.id) label.id = 'sel-lbl-' + uid;
        btn.setAttribute('aria-labelledby', label.id + ' ' + btn.id);
        list.setAttribute('aria-labelledby', label.id);
        label.addEventListener('click', function (e) { e.preventDefault(); btn.focus(); });
      }

      var opts = Array.prototype.slice.call(sel.options).map(function (o, i) {
        var li = document.createElement('li');
        li.className = 'select__opt' + (o.value ? '' : ' is-placeholder');
        li.id = list.id + '-' + i; li.setAttribute('role', 'option');
        li.innerHTML = '<span></span>' + CHECK;
        li.firstChild.textContent = o.text;
        list.appendChild(li);
        return li;
      });

      sel.tabIndex = -1; sel.setAttribute('aria-hidden', 'true');
      wrap.insertBefore(btn, sel); wrap.appendChild(list); wrap.classList.add('is-enhanced');

      var active = -1, typed = '', typedTimer;

      function sync() {
        var i = sel.selectedIndex < 0 ? 0 : sel.selectedIndex;
        text.textContent = sel.options[i] ? sel.options[i].text : '';
        btn.classList.toggle('has-value', !!sel.value);
        opts.forEach(function (li, n) { var on = n === i; li.classList.toggle('is-selected', on); li.setAttribute('aria-selected', String(on)); });
      }
      function setActive(i) {
        if (!opts.length) return;
        active = Math.max(0, Math.min(opts.length - 1, i));
        opts.forEach(function (li, n) { li.classList.toggle('is-active', n === active); });
        btn.setAttribute('aria-activedescendant', opts[active].id);
        opts[active].scrollIntoView({ block: 'nearest' });
      }
      function isOpen() { return wrap.classList.contains('is-open'); }
      function open() {
        closeAll(wrap);
        var r = btn.getBoundingClientRect();
        var below = window.innerHeight - r.bottom;
        wrap.classList.toggle('is-up', below < 290 && r.top > below);
        wrap.classList.add('is-open'); btn.setAttribute('aria-expanded', 'true');
        setActive(sel.selectedIndex < 0 ? 0 : sel.selectedIndex);
      }
      function close() {
        wrap.classList.remove('is-open'); btn.setAttribute('aria-expanded', 'false'); btn.removeAttribute('aria-activedescendant');
      }
      function choose(i) {
        if (i < 0 || i >= sel.options.length) return;
        var changed = sel.selectedIndex !== i;
        sel.selectedIndex = i; sync(); close(); btn.focus();
        if (changed) sel.dispatchEvent(new Event('change', { bubbles: true }));
      }
      wrap._closeSelect = close;

      btn.addEventListener('click', function () { if (isOpen()) close(); else open(); });
      opts.forEach(function (li, n) {
        li.addEventListener('mousedown', function (e) { e.preventDefault(); });
        li.addEventListener('click', function () { choose(n); });
        li.addEventListener('mousemove', function () { if (active !== n) setActive(n); });
      });
      btn.addEventListener('keydown', function (e) {
        var k = e.key;
        if (k === 'ArrowDown' || k === 'ArrowUp') {
          e.preventDefault();
          if (!isOpen()) { open(); return; }
          setActive(active + (k === 'ArrowDown' ? 1 : -1));
        } else if (k === 'Home' && isOpen()) { e.preventDefault(); setActive(0); }
        else if (k === 'End' && isOpen()) { e.preventDefault(); setActive(opts.length - 1); }
        else if (k === 'Enter' || k === ' ') {
          e.preventDefault();
          if (isOpen()) choose(active); else open();
        } else if (k === 'Escape' && isOpen()) { e.preventDefault(); e.stopPropagation(); close(); }
        else if (k === 'Tab' && isOpen()) { close(); }
        else if (k.length === 1 && /\S/.test(k)) {
          typed += k.toLowerCase(); clearTimeout(typedTimer); typedTimer = setTimeout(function () { typed = ''; }, 600);
          for (var n = 0; n < sel.options.length; n++) {
            if (sel.options[n].text.toLowerCase().indexOf(typed) === 0) { if (!isOpen()) open(); setActive(n); break; }
          }
        }
      });

      sel.addEventListener('change', sync);
      if (sel.form) sel.form.addEventListener('reset', function () { window.setTimeout(sync, 0); });
      sync();
    });

    document.addEventListener('click', function (e) {
      var inside = e.target.closest ? e.target.closest('.select') : null;
      closeAll(inside);
    });
    window.addEventListener('resize', debounce(function () { closeAll(null); }, 100));
  }

  /* ---------- 13. Salin tautan artikel ---------- */
  function initCopyLink() {
    $$('[data-copy-link]').forEach(function (btn) {
      var label = $('[data-copy-label]', btn.parentNode);
      function done() {
        if (!label) return;
        var old = label.textContent; label.textContent = 'Tautan disalin!';
        window.setTimeout(function () { label.textContent = old; }, 2000);
      }
      function fallback() {
        var i = document.createElement('input');
        i.value = window.location.href; document.body.appendChild(i); i.select();
        try { document.execCommand('copy'); done(); } catch (e) { /* abaikan */ }
        i.remove();
      }
      btn.addEventListener('click', function () {
        if (navigator.clipboard && navigator.clipboard.writeText) navigator.clipboard.writeText(window.location.href).then(done, fallback);
        else fallback();
      });
    });
  }

  /* ---------- Init ---------- */
  function init() {
    initNavbar(); initReveal(); initSearchForm(); initPropertyFilter(); initFavorites();
    initLightbox(); initGalleryFilter(); initForms(); initChatbot(); initToTop(); initBlog();
    initCopyLink();
    initSelects(); // terakhir: membaca nilai <select> yang sudah diisi filter/prefill
  }
  if (document.readyState === 'loading') document.addEventListener('DOMContentLoaded', init); else init();
})();
