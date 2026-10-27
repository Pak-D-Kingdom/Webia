/* ==========================================================================
   E-LEARNING · MODERN · OCEAN BLUE   (brand: E-learna)
   public/js/website-bisnis/template/e-learning/modern/e-learning-ocean-blue/e-learning.js
   Vanilla JS, tanpa dependensi. Semua modul aman dijalankan di halaman mana pun
   (modul otomatis berhenti bila elemennya tidak ada).
   ========================================================================== */
(function () {
  'use strict';

  var $ = function (s, c) { return (c || document).querySelector(s); };
  var $$ = function (s, c) { return Array.prototype.slice.call((c || document).querySelectorAll(s)); };
  var params = new URLSearchParams(window.location.search);
  var reduceMotion = window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches;

  /* 1 · NAVBAR ---------------------------------------------------------- */
  function initNavbar() {
    var bar = $('[data-navbar]');
    if (!bar) return;
    var toggle = $('[data-nav-toggle]', bar);
    var panel = $('[data-nav-panel]', bar);
    var sToggle = $('[data-search-toggle]', bar);
    var search = $('#elSearch');

    function setNav(open) {
      if (!panel || !toggle) return;
      panel.classList.toggle('is-open', open);
      toggle.setAttribute('aria-expanded', String(open));
      toggle.setAttribute('aria-label', open ? 'Tutup menu' : 'Buka menu');
    }
    function setSearch(open) {
      if (!search || !sToggle) return;
      search.hidden = !open;
      sToggle.setAttribute('aria-expanded', String(open));
      if (open) { var i = $('input', search); if (i) i.focus(); }
    }

    if (toggle) toggle.addEventListener('click', function () { setNav(!panel.classList.contains('is-open')); setSearch(false); });
    if (sToggle) sToggle.addEventListener('click', function () { setSearch(search.hidden); setNav(false); });
    if (panel) panel.addEventListener('click', function (e) { if (e.target.closest('a, [data-open-chat]')) setNav(false); });
    document.addEventListener('click', function (e) {
      if (!bar.contains(e.target)) { setNav(false); setSearch(false); }
    });
    document.addEventListener('keydown', function (e) {
      if (e.key === 'Escape') { setNav(false); setSearch(false); }
    });
    window.addEventListener('resize', function () { if (window.innerWidth >= 1280) setNav(false); });

    var onScroll = function () { bar.classList.toggle('is-stuck', window.scrollY > 8); };
    onScroll();
    window.addEventListener('scroll', onScroll, { passive: true });
  }

  /* 2 · PRICING TOGGLE -------------------------------------------------- */
  function initPricing() {
    var fmt = new Intl.NumberFormat('id-ID');
    $$('[data-pricing]').forEach(function (box) {
      var discount = parseFloat(box.getAttribute('data-discount')) || 0;
      var btns = $$('[data-billing]', box);
      btns.forEach(function (btn) {
        btn.addEventListener('click', function () {
          var yearly = btn.getAttribute('data-billing') === 'yearly';
          btns.forEach(function (b) {
            var on = b === btn;
            b.classList.toggle('is-active', on);
            b.setAttribute('aria-pressed', String(on));
          });
          $$('[data-price]', box).forEach(function (el) {
            var base = parseFloat(el.getAttribute('data-price'));
            var val = yearly ? Math.round(base * (1 - discount / 100)) : base;
            el.textContent = 'Rp ' + fmt.format(val);
          });
          $$('[data-note]', box).forEach(function (n) { n.hidden = !yearly; });
        });
      });
    });
  }

  /* 3 · ACCORDION ------------------------------------------------------- */
  function initAccordion() {
    $$('[data-accordion]').forEach(function (acc) {
      acc.addEventListener('click', function (e) {
        var btn = e.target.closest('.el-acc-btn');
        if (!btn || !acc.contains(btn)) return;
        var item = btn.closest('.el-acc-item');
        var panel = document.getElementById(btn.getAttribute('aria-controls'));
        var open = btn.getAttribute('aria-expanded') === 'true';
        btn.setAttribute('aria-expanded', String(!open));
        item.classList.toggle('is-open', !open);
        if (panel) panel.hidden = open;
      });
    });
  }

  /* 4 · FILTER (programs, schedules, course tabs) ----------------------- */
  function setChipState(group, value) {
    $$('[data-filter]', group).forEach(function (c) {
      var on = c.getAttribute('data-filter') === value;
      c.classList.toggle('is-active', on);
      c.setAttribute('aria-pressed', String(on));
    });
  }

  function initProgramsFilter() {
    var grid = $('[data-program-grid]');
    var group = $('[data-filter-group="level"]');
    if (!grid || !group) return;
    var input = $('[data-program-search]');
    var empty = $('[data-empty]', grid.parentNode);
    var level = 'all';

    function apply() {
      var q = (input && input.value || '').trim().toLowerCase();
      var shown = 0;
      $$('.el-program', grid).forEach(function (card) {
        var okLevel = level === 'all' || card.getAttribute('data-level').split(' ').indexOf(level) > -1;
        var okQ = !q || card.getAttribute('data-name').indexOf(q) > -1;
        card.hidden = !(okLevel && okQ);
        if (!card.hidden) shown++;
      });
      if (empty) empty.hidden = shown > 0;
    }
    group.addEventListener('click', function (e) {
      var chip = e.target.closest('[data-filter]');
      if (!chip) return;
      level = chip.getAttribute('data-filter');
      setChipState(group, level);
      apply();
    });
    if (input) input.addEventListener('input', apply);
    if (params.get('q') && input) { input.value = params.get('q'); apply(); }
  }

  function initSchedulesFilter() {
    var list = $('[data-schedule-list]');
    var group = $('[data-filter-group="program"]');
    if (!list || !group) return;
    var empty = $('[data-empty]', list.parentNode);

    function apply(value) {
      var shown = 0;
      $$('.el-schedule', list).forEach(function (row) {
        row.hidden = !(value === 'all' || row.getAttribute('data-program') === value);
        if (!row.hidden) shown++;
      });
      if (empty) empty.hidden = shown > 0;
      setChipState(group, value);
    }
    group.addEventListener('click', function (e) {
      var chip = e.target.closest('[data-filter]');
      if (chip) apply(chip.getAttribute('data-filter'));
    });
    var preset = params.get('program');
    if (preset && $('[data-filter="' + preset + '"]', group)) apply(preset);
  }

  function initCourseTabs() {
    var tabs = $('[data-course-tabs]');
    if (!tabs) return;
    function show(slug) {
      $$('[data-course]', tabs).forEach(function (t) {
        var on = t.getAttribute('data-course') === slug;
        t.classList.toggle('is-active', on);
        t.setAttribute('aria-selected', String(on));
        t.tabIndex = on ? 0 : -1;
      });
      $$('[data-course-panel]').forEach(function (p) { p.hidden = p.getAttribute('data-course-panel') !== slug; });
    }
    tabs.addEventListener('click', function (e) {
      var t = e.target.closest('[data-course]');
      if (t) show(t.getAttribute('data-course'));
    });
    tabs.addEventListener('keydown', function (e) {
      if (e.key !== 'ArrowRight' && e.key !== 'ArrowLeft') return;
      var all = $$('[data-course]', tabs);
      var i = all.indexOf(document.activeElement);
      if (i < 0) return;
      var next = all[(i + (e.key === 'ArrowRight' ? 1 : all.length - 1)) % all.length];
      next.focus(); show(next.getAttribute('data-course'));
    });
    var preset = params.get('course');
    if (preset && $('[data-course="' + preset + '"]', tabs)) show(preset);
  }

  /* 5 · FORM (registrasi -> WhatsApp, login) ---------------------------------------- */
  var MSG = {
    required: 'Kolom ini wajib diisi.',
    email: 'Format email belum benar, contoh: nama@email.com.',
    phone: 'Gunakan nomor WhatsApp Indonesia, contoh: 081234567890.',
    agree: 'Centang persetujuan untuk melanjutkan.'
  };

  function fieldMessage(el) {
    var v = el.validity;
    if (v.valid) return '';
    if (el.type === 'checkbox') return MSG.agree;
    if (v.valueMissing) return MSG.required;
    if (v.typeMismatch) return MSG.email;
    if (v.patternMismatch) return MSG.phone;
    if (v.tooShort) return 'Minimal ' + el.getAttribute('minlength') + ' karakter.';
    return 'Isian belum sesuai.';
  }
  function showError(el) {
    var wrap = el.closest('.el-field');
    if (!wrap) return;
    var msg = fieldMessage(el);
    var out = $('[data-error]', wrap);
    wrap.classList.toggle('has-error', !!msg);
    el.setAttribute('aria-invalid', msg ? 'true' : 'false');
    if (out) {
      out.textContent = msg;
      if (!out.id) out.id = 'err-' + (el.id || Math.random().toString(36).slice(2, 8));
      if (msg) el.setAttribute('aria-describedby', out.id); else el.removeAttribute('aria-describedby');
    }
  }
  function status(form, text, isError, link) {
    var s = $('[data-form-status]', form);
    if (!s) return;
    s.textContent = text;
    if (link) {
      var a = document.createElement('a');
      a.href = link; a.target = '_blank'; a.rel = 'noopener noreferrer';
      a.textContent = 'Buka WhatsApp';
      s.appendChild(document.createTextNode(' '));
      s.appendChild(a);
    }
    s.classList.toggle('is-error', !!isError);
    s.hidden = false;
  }

  /* Kirim isi formulir ke WhatsApp (nomor dari atribut data-wa) */
  function sendToWhatsApp(form) {
    var number = (form.getAttribute('data-wa') || '').replace(/\D/g, '');
    var el = function (n) { return form.elements.namedItem(n); };
    var val = function (n) { var c = el(n); return c && c.value ? String(c.value).trim() : ''; };
    var opt = function (n) { var c = el(n); return c && c.selectedIndex > 0 ? c.options[c.selectedIndex].text.trim() : ''; };
    var planInput = form.querySelector('input[name="plan"]:checked');
    var plan = planInput ? planInput.closest('label').textContent.replace(/\s+/g, ' ').trim() : '';

    var lines = [
      '*Pendaftaran Baru - E-learna*', '',
      'Nama: ' + val('name'),
      'Email: ' + val('email'),
      'No. WhatsApp: ' + val('phone'),
      'Program: ' + opt('program'),
      'Jadwal: ' + (opt('schedule') || 'Belum menentukan'),
      'Paket: ' + plan
    ];
    if (val('note')) lines.push('Catatan: ' + val('note'));

    var url = 'https://wa.me/' + number + '?text=' + encodeURIComponent(lines.join('\n'));
    var win = window.open(url, '_blank');
    if (win) { win.opener = null; } else { window.location.href = url; }
    status(form, 'Mengarahkan ke WhatsApp untuk mengirim pendaftaranmu.', false, url);
  }

  function bindForm(form, successText, onValid) {
    var fields = $$('input, select, textarea', form).filter(function (f) { return f.name && f.type !== 'hidden'; });
    fields.forEach(function (f) {
      f.addEventListener('blur', function () { if (f.value || f.type === 'checkbox') showError(f); });
      f.addEventListener('input', function () { if (f.closest('.el-field.has-error')) showError(f); });
      f.addEventListener('change', function () { if (f.closest('.el-field.has-error')) showError(f); });
    });
    form.addEventListener('submit', function (e) {
      var firstBad = null;
      fields.forEach(function (f) {
        showError(f);
        if (!f.validity.valid && !firstBad) firstBad = f;
      });
      if (firstBad) {
        e.preventDefault();
        firstBad.focus();
        status(form, 'Periksa kembali isian yang ditandai.', true);
        return;
      }
      if (onValid) {
        e.preventDefault();
        onValid(form);
        return;
      }
      if (form.hasAttribute('data-demo')) {
        e.preventDefault();
        status(form, successText + ' (mode demo: form belum terhubung ke backend.)', false);
      }
    });
  }

  function initForms() {
    var reg = $('[data-reg-form]');
    if (reg) {
      bindForm(reg, '', sendToWhatsApp);
      ['program', 'schedule'].forEach(function (k) {
        var sel = reg.elements[k], val = params.get(k);
        if (sel && val) {
          var ok = $$('option', sel).some(function (o) { return o.value === val; });
          if (ok) sel.value = val;
        }
      });
      var plan = params.get('plan');
      if (plan) {
        var r = reg.querySelector('input[name="plan"][value="' + plan + '"]');
        if (r) r.checked = true;
      }
    }
    // Login tetap memakai alur sendiri (backend), tidak dikirim ke WhatsApp
    $$('[data-auth-form]').forEach(function (f) { bindForm(f, 'Berhasil! Kamu akan diarahkan ke dashboard member.'); });

    $$('[data-pass-toggle]').forEach(function (btn) {
      btn.addEventListener('click', function () {
        var input = $('input', btn.parentNode);
        var show = input.type === 'password';
        input.type = show ? 'text' : 'password';
        btn.setAttribute('aria-label', show ? 'Sembunyikan kata sandi' : 'Tampilkan kata sandi');
      });
    });
  }

  /* 6 · MODAL (trailer) ------------------------------------------------- */
  function initModal() {
    var lastFocus = null;
    function open(id) {
      var m = document.getElementById(id);
      if (!m) return;
      lastFocus = document.activeElement;
      var frame = $('iframe[data-src]', m);
      if (frame && !frame.src) frame.src = frame.getAttribute('data-src');
      m.hidden = false;
      document.body.style.overflow = 'hidden';
      var c = $('[data-modal-close]', m); if (c) c.focus();
    }
    function close(m) {
      m.hidden = true;
      document.body.style.overflow = '';
      var frame = $('iframe', m); if (frame) frame.removeAttribute('src');
      if (lastFocus) lastFocus.focus();
    }
    document.addEventListener('click', function (e) {
      var o = e.target.closest('[data-modal-open]');
      if (o) { open(o.getAttribute('data-modal-open')); return; }
      var c = e.target.closest('[data-modal-close]');
      if (c) { close(c.closest('[data-modal]')); return; }
      if (e.target.matches('[data-modal]')) close(e.target);
    });
    document.addEventListener('keydown', function (e) {
      if (e.key === 'Escape') $$('[data-modal]').forEach(function (m) { if (!m.hidden) close(m); });
    });
  }

  /* 7 · AI FAQ CHATBOT -------------------------------------------------- */
  function initChat() {
    var root = $('[data-chat]');
    if (!root) return;
    var dataEl = $('#elFaqData');
    var data = { items: [], greeting: '', fallback: '', whatsapp: '#' };
    try { data = JSON.parse(dataEl.textContent); } catch (err) { /* gunakan default */ }

    var panel = $('[data-chat-panel]', root);
    var toggle = $('[data-chat-toggle]', root);
    var closeBtn = $('[data-chat-close]', root);
    var body = $('[data-chat-body]', root);
    var log = $('[data-chat-log]', root);
    var welcome = $('[data-chat-welcome]', root);
    var form = $('[data-chat-form]', root);
    var input = $('[data-chat-input]', root);
    var nudge = $('[data-chat-nudge]', root);
    var greeted = false, busy = false;

    function norm(s) { return String(s).toLowerCase().replace(/[^a-z0-9\s]/g, ' ').replace(/\s+/g, ' ').trim(); }
    function scroll() { body.scrollTop = body.scrollHeight; }

    function addMsg(who, text, link) {
      var li = document.createElement('li');
      li.className = 'el-msg el-msg--' + who;
      var p = document.createElement('span');
      p.textContent = text;
      li.appendChild(p);
      if (link) {
        var a = document.createElement('a');
        a.className = 'el-msg__link';
        a.href = link.url;
        a.textContent = link.label;
        li.appendChild(document.createElement('br'));
        li.appendChild(a);
      }
      log.appendChild(li);
      scroll();
      return li;
    }

    function botReply(item) {
      if (busy) return;
      busy = true;
      var t = document.createElement('li');
      t.className = 'el-msg el-msg--bot el-msg--typing';
      t.setAttribute('aria-label', 'Asisten sedang mengetik');
      t.innerHTML = '<i></i><i></i><i></i>';
      log.appendChild(t); scroll();
      setTimeout(function () {
        t.remove();
        if (item) {
          addMsg('bot', item.a, item.url ? { url: item.url, label: item.link } : null);
        } else {
          addMsg('bot', data.fallback, { url: data.whatsapp, label: 'Hubungi via WhatsApp' });
          showAllQuestions();
        }
        busy = false;
      }, reduceMotion ? 0 : 650);
    }

    function showAllQuestions() {
      var li = document.createElement('li');
      li.className = 'el-msg el-msg--bot';
      var wrap = document.createElement('div');
      wrap.className = 'el-chat__welcome is-compact';
      var chips = document.createElement('div');
      chips.className = 'el-chat__chips';
      data.items.forEach(function (it) {
        var b = document.createElement('button');
        b.type = 'button'; b.className = 'el-chat__chip';
        b.setAttribute('data-chat-chip', it.id);
        b.textContent = it.q;
        chips.appendChild(b);
      });
      wrap.appendChild(chips); li.appendChild(wrap); log.appendChild(li); scroll();
    }

    function findById(id) { return data.items.filter(function (i) { return i.id === id; })[0]; }

    function findBest(text) {
      var q = norm(text), words = q.split(' ').filter(function (w) { return w.length > 3; });
      var best = null, bestScore = 0;
      data.items.forEach(function (it) {
        var score = 0;
        it.keywords.forEach(function (k) { if (q.indexOf(norm(k)) > -1) score += 3; });
        words.forEach(function (w) { if (norm(it.q).indexOf(w) > -1) score += 1; });
        if (score > bestScore) { best = it; bestScore = score; }
      });
      return best;
    }

    function ask(label, item) {
      if (busy) return;
      welcome.classList.add('is-compact');
      addMsg('user', label);
      botReply(item);
    }

    function openChat() {
      panel.hidden = false;
      root.classList.add('is-open');
      toggle.setAttribute('aria-expanded', 'true');
      toggle.setAttribute('aria-label', 'Tutup AI FAQ');
      if (nudge) nudge.hidden = true;
      if (!greeted) { greeted = true; addMsg('bot', data.greeting); }
      setTimeout(function () { input.focus(); }, 60);
      try { sessionStorage.setItem('el-nudge', '1'); } catch (e) { /* abaikan */ }
    }
    function closeChat(returnFocus) {
      panel.hidden = true;
      root.classList.remove('is-open');
      toggle.setAttribute('aria-expanded', 'false');
      toggle.setAttribute('aria-label', 'Buka AI FAQ');
      if (returnFocus) toggle.focus();
    }

    toggle.addEventListener('click', function () { panel.hidden ? openChat() : closeChat(false); });
    closeBtn.addEventListener('click', function () { closeChat(true); });
    document.addEventListener('keydown', function (e) { if (e.key === 'Escape' && !panel.hidden) closeChat(true); });
    document.addEventListener('click', function (e) {
      var o = e.target.closest('[data-open-chat]');
      if (o) { e.preventDefault(); if (panel.hidden) openChat(); else input.focus(); }
    });

    root.addEventListener('click', function (e) {
      var chip = e.target.closest('[data-chat-chip]');
      if (!chip) return;
      var id = chip.getAttribute('data-chat-chip');
      if (id === '__more') {
        if (busy) return;
        welcome.classList.add('is-compact');
        addMsg('user', chip.textContent);
        addMsg('bot', 'Tentu! Pilih pertanyaan yang ingin kamu ketahui:');
        showAllQuestions();
        return;
      }
      var item = findById(id);
      if (item) ask(chip.textContent, item);
    });

    form.addEventListener('submit', function (e) {
      e.preventDefault();
      var text = input.value.trim();
      if (!text) return;
      input.value = '';
      ask(text, findBest(text));
    });

    // Sapaan kecil dari maskot (sekali per sesi)
    var seen = false;
    try { seen = !!sessionStorage.getItem('el-nudge'); } catch (e) { /* abaikan */ }
    if (nudge && !seen) {
      setTimeout(function () { if (panel.hidden) nudge.hidden = false; }, 4000);
      setTimeout(function () { nudge.hidden = true; }, 12000);
    }
  }

  /* INIT ---------------------------------------------------------------- */
  function init() {
    initNavbar(); initPricing(); initAccordion();
    initProgramsFilter(); initSchedulesFilter(); initCourseTabs();
    initForms(); initModal(); initChat();
  }
  if (document.readyState === 'loading') document.addEventListener('DOMContentLoaded', init); else init();
})();
