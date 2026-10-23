/* =========================================================================
   EduPlus · E-Learning · Playful & Colorful · Pastel Mix  (WEBIA by D-KREASI)
   Vanilla JS, tanpa dependensi. Semua fitur aktif lewat atribut data-*.
   Frontend statis: form berjalan mode demo selama action masih "#".
   ========================================================================= */
(() => {
  'use strict';

  const $  = (sel, root = document) => root.querySelector(sel);
  const $$ = (sel, root = document) => Array.from(root.querySelectorAll(sel));
  const reduceMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

  const cfg = (() => {
    try { return JSON.parse($('#el-config').textContent) || {}; } catch (e) { return {}; }
  })();
  const ai = cfg.ai || { faq: [], intro: '', fallback: '' };

  const session = {
    get(k) { try { return sessionStorage.getItem(k); } catch (e) { return null; } },
    set(k, v) { try { sessionStorage.setItem(k, v); } catch (e) { /* diabaikan */ } },
  };

  /* ---------------------------------------------------------------- NAVBAR */
  function initNavbar() {
    const bar = $('[data-navbar]');
    if (!bar) return;
    const menu = $('[data-menu]', bar);
    const burger = $('[data-menu-toggle]', bar);
    const searchBtn = $('[data-search-toggle]', bar);
    const searchPanel = $('[data-search-panel]', bar);
    const searchClose = $('[data-search-close]', bar);

    const onScroll = () => bar.classList.toggle('is-stuck', window.scrollY > 8);
    onScroll();
    window.addEventListener('scroll', onScroll, { passive: true });

    const setMenu = (open) => {
      menu.classList.toggle('is-open', open);
      burger.setAttribute('aria-expanded', String(open));
      burger.setAttribute('aria-label', open ? 'Tutup menu' : 'Buka menu');
    };
    const setSearch = (open) => {
      searchPanel.hidden = !open;
      searchBtn.setAttribute('aria-expanded', String(open));
      if (open) $('input', searchPanel).focus();
    };

    burger.addEventListener('click', () => { setSearch(false); setMenu(!menu.classList.contains('is-open')); });
    searchBtn.addEventListener('click', () => { setMenu(false); setSearch(searchPanel.hidden); });
    if (searchClose) searchClose.addEventListener('click', () => { setSearch(false); searchBtn.focus(); });
    menu.addEventListener('click', (e) => { if (e.target.closest('a')) setMenu(false); });
    document.addEventListener('click', (e) => { if (!bar.contains(e.target)) { setMenu(false); setSearch(false); } });
    document.addEventListener('keydown', (e) => {
      if (e.key !== 'Escape') return;
      setMenu(false); setSearch(false);
    });
    window.matchMedia('(min-width: 992px)').addEventListener('change', (m) => { if (m.matches) setMenu(false); });
  }

  /* ------------------------------------------------------------------ TABS */
  function initTabs() {
    $$('[data-tabs]').forEach((root) => {
      const tabs = $$('[role="tab"]', root);
      const activate = (tab, focus) => {
        tabs.forEach((t) => {
          const on = t === tab;
          t.classList.toggle('is-active', on);
          t.setAttribute('aria-selected', String(on));
          t.tabIndex = on ? 0 : -1;
          const panel = document.getElementById(t.getAttribute('aria-controls'));
          if (panel) panel.hidden = !on;
        });
        if (focus) tab.focus();
      };
      tabs.forEach((tab, i) => {
        tab.addEventListener('click', () => activate(tab));
        tab.addEventListener('keydown', (e) => {
          const map = { ArrowRight: i + 1, ArrowLeft: i - 1, Home: 0, End: tabs.length - 1 };
          if (!(e.key in map)) return;
          e.preventDefault();
          activate(tabs[(map[e.key] + tabs.length) % tabs.length], true);
        });
      });
    });
  }

  /* ---------------------------------------------------- FILTER PROGRAMS */
  function initFilter() {
    const root = $('[data-filter-root]');
    if (!root) return;
    const cards = $$('.pcard', root);
    const empty = $('[data-filter-empty]', root);
    const search = $('[data-filter-search]', root);
    const count = $('[data-filter-count]', root);
    const clear = $('[data-filter-clear]', root);
    const catBtns = $$('[data-filter]', root);
    const lvBtns = $$('[data-level-filter]', root);
    const params = new URLSearchParams(window.location.search);
    const state = { cat: params.get('cat') || 'all', level: 'all', q: (params.get('q') || '').trim().toLowerCase() };
    if (!catBtns.some((b) => b.dataset.filter === state.cat)) state.cat = 'all';

    const markActive = (btns, attr, value) => btns.forEach((b) => {
      const on = b.dataset[attr] === value;
      b.classList.toggle('is-active', on);
      b.setAttribute('aria-pressed', String(on));
    });
    const apply = () => {
      let shown = 0;
      cards.forEach((c) => {
        const ok = (state.cat === 'all' || c.dataset.category === state.cat)
          && (state.level === 'all' || c.dataset.level === state.level)
          && (!state.q || c.dataset.title.includes(state.q));
        c.hidden = !ok;
        if (ok) shown++;
      });
      if (empty) empty.hidden = shown !== 0;
      if (count) {
        const all = shown === cards.length && !state.q && state.cat === 'all' && state.level === 'all';
        count.textContent = all ? `Menampilkan semua ${shown} program` : `${shown} program ditemukan`;
      }
      if (clear && search) clear.hidden = !search.value;
      markActive(catBtns, 'filter', state.cat);
      markActive(lvBtns, 'levelFilter', state.level);
    };

    catBtns.forEach((b) => b.addEventListener('click', () => { state.cat = b.dataset.filter; apply(); }));
    lvBtns.forEach((b) => b.addEventListener('click', () => { state.level = b.dataset.levelFilter; apply(); }));
    if (search) search.addEventListener('input', () => { state.q = search.value.trim().toLowerCase(); apply(); });
    if (clear && search) clear.addEventListener('click', () => { search.value = ''; state.q = ''; apply(); search.focus(); });
    apply();
  }

  /* ----------------------------------------------------------------- FORMS */
  const MESSAGES = {
    login: 'Berhasil masuk (mode demo). Sambungkan action form ke backend untuk login sungguhan.',
  };

  // Susun isi pesan WhatsApp dari isi form (registrasi / newsletter).
  function buildWaMessage(kind, form) {
    const val = (n) => (form.elements[n] ? String(form.elements[n].value).trim() : '');
    const sel = (n) => { const el = form.elements[n]; return el && el.selectedOptions && el.selectedOptions[0] ? el.selectedOptions[0].textContent.trim() : ''; };
    if (kind === 'newsletter') {
      return `Halo EduPlus, saya ingin berlangganan update terbaru.\n\n*Email:* ${val('email')}`;
    }
    const plan = $('input[name="plan"]:checked', form);
    const planName = plan && plan.closest('label') ? $('strong', plan.closest('label')).textContent.trim() : '-';
    const lines = [
      'Halo EduPlus, saya ingin mendaftar kursus.', '',
      `*Nama:* ${val('name')}`, `*Email:* ${val('email')}`, `*No. WhatsApp:* ${val('phone')}`,
      `*Program:* ${sel('program') || '-'}`, `*Paket:* ${planName}`, `*Jadwal:* ${val('slot') || '-'}`,
    ];
    if (val('note')) lines.push(`*Catatan:* ${val('note')}`);
    return lines.join('\n');
  }

  function validateField(el) {
    const v = (el.value || '').trim();
    if (el.type === 'checkbox') return el.required && !el.checked ? 'Kamu perlu menyetujui ketentuan ini.' : '';
    if (el.required && !v) return 'Kolom ini wajib diisi.';
    if (!v) return '';
    if (el.type === 'email' && !/^[^\s@]+@[^\s@]+\.[^\s@]{2,}$/.test(v)) return 'Format email belum benar.';
    if (el.type === 'tel' && !/^\+?\d{9,15}$/.test(v.replace(/[\s-]/g, ''))) return 'Nomor WhatsApp belum benar (9–15 digit).';
    if (el.minLength > 0 && v.length < el.minLength) return `Minimal ${el.minLength} karakter.`;
    return '';
  }

  function showError(el, message) {
    const wrap = el.closest('.field');
    const out = wrap && $('[data-err]', wrap);
    el.setAttribute('aria-invalid', message ? 'true' : 'false');
    if (wrap) wrap.classList.toggle('has-error', !!message);
    if (out) { out.textContent = message; out.hidden = !message; }
  }

  function initForms() {
    $$('[data-demo-form], [data-wa-form]').forEach((form) => {
      const isWa = form.hasAttribute('data-wa-form');
      const kind = isWa ? form.dataset.waForm : form.dataset.demoForm;
      const note = $('[data-form-note]', form) || $('[data-form-note]', form.parentElement);
      const fields = $$('input[required], select[required], textarea[required], input[minlength]', form);
      const setNote = (text, ok) => { if (note) { note.textContent = text; note.classList.toggle('is-ok', !!ok); note.classList.toggle('is-err', ok === false); } };

      fields.forEach((el) => {
        const ev = el.tagName === 'SELECT' || el.type === 'checkbox' ? 'change' : 'input';
        el.addEventListener(ev, () => { if (el.getAttribute('aria-invalid') === 'true') showError(el, validateField(el)); });
      });

      form.addEventListener('submit', (e) => {
        let firstBad = null;
        fields.forEach((el) => {
          const msg = validateField(el);
          if (kind === 'newsletter') { if (msg && !firstBad) { firstBad = el; setNote(msg, false); } return; }
          showError(el, msg);
          if (msg && !firstBad) firstBad = el;
        });
        if (firstBad) { e.preventDefault(); firstBad.focus(); if (kind !== 'newsletter') setNote('Periksa kembali kolom yang ditandai.', false); return; }

        if (isWa) {
          // Semua form kirim (kecuali login) dikirim ke WhatsApp admin dengan pesan yang sudah tersusun.
          e.preventDefault();
          const url = `https://wa.me/${cfg.formWhatsapp}?text=${encodeURIComponent(buildWaMessage(kind, form))}`;
          const win = window.open(url, '_blank', 'noopener');
          if (!win) window.location.href = url;
          form.reset();
          $$('.has-error', form).forEach((w) => w.classList.remove('has-error'));
          setNote('Membuka WhatsApp… pesanmu sudah disiapkan, tinggal tekan kirim.', true);
          return;
        }
        const action = form.getAttribute('action');
        const live = action && action !== '#' && !action.endsWith('#');
        if (live) return; // action sudah disambungkan backend → kirim normal (termasuk @csrf)
        e.preventDefault();
        form.reset();
        $$('.has-error', form).forEach((w) => w.classList.remove('has-error'));
        setNote(MESSAGES[kind] || 'Berhasil.', true);
      });
    });

    $$('[data-pass-toggle]').forEach((btn) => btn.addEventListener('click', () => {
      const input = $('input', btn.parentElement);
      const show = input.type === 'password';
      input.type = show ? 'text' : 'password';
      btn.setAttribute('aria-pressed', String(show));
      btn.setAttribute('aria-label', show ? 'Sembunyikan kata sandi' : 'Tampilkan kata sandi');
      $('i', btn).className = show ? 'bi bi-eye-slash-fill' : 'bi bi-eye-fill';
    }));
  }

  /* ------------------------------------------- PENCARIAN + SARAN (AUTOCOMPLETE) */
  const rupiah = (n) => `Rp ${Number(n).toLocaleString('id-ID')}`;
  const el = (tag, cls, text) => { const n = document.createElement(tag); if (cls) n.className = cls; if (text) n.textContent = text; return n; };

  function highlight(text, q) {
    const frag = document.createDocumentFragment();
    const i = q ? text.toLowerCase().indexOf(q.toLowerCase()) : -1;
    if (i < 0) { frag.append(text); return frag; }
    const m = el('mark', '', text.slice(i, i + q.length));
    frag.append(text.slice(0, i), m, text.slice(i + q.length));
    return frag;
  }

  function initSuggest() {
    const S = cfg.search;
    if (!S) return;
    let uid = 0;
    $$('[data-suggest]').forEach((input) => {
      const wrap = input.closest('.search');
      if (!wrap) return;
      const list = el('ul', 'suggest');
      list.id = `suggest-${++uid}`; list.setAttribute('role', 'listbox'); list.hidden = true;
      wrap.appendChild(list);
      input.setAttribute('role', 'combobox');
      input.setAttribute('aria-autocomplete', 'list');
      input.setAttribute('aria-controls', list.id);
      input.setAttribute('aria-expanded', 'false');

      let items = []; let active = -1;
      const urlFor = (params) => `${S.url}?${new URLSearchParams(params)}`;
      const setOpen = (v) => { list.hidden = !v; input.setAttribute('aria-expanded', String(v)); if (!v) setActive(-1); };
      const setActive = (i) => {
        active = i;
        items.forEach((li, k) => { li.classList.toggle('is-active', k === i); li.setAttribute('aria-selected', String(k === i)); });
        if (i >= 0) { input.setAttribute('aria-activedescendant', items[i].id); items[i].scrollIntoView({ block: 'nearest' }); }
        else input.removeAttribute('aria-activedescendant');
      };
      const addItem = (href, icon, build) => {
        const li = el('li', 'suggest__item'); li.id = `${list.id}-o${items.length}`; li.setAttribute('role', 'option');
        const a = el('a'); a.href = href; a.tabIndex = -1;
        a.appendChild(el('i', `bi ${icon} suggest__ico`)); build(a);
        li.appendChild(a); list.appendChild(li); items.push(li);
      };
      const heading = (t) => { const h = el('li', 'suggest__head', t); h.setAttribute('role', 'presentation'); list.appendChild(h); };

      const render = () => {
        const q = input.value.trim();
        list.textContent = ''; items = []; active = -1;
        if (!q) {
          heading('Kategori populer');
          S.popular.forEach((c) => addItem(urlFor({ cat: c.category }), 'bi-lightning-charge-fill', (a) => a.appendChild(el('span', 'suggest__txt', c.title))));
          return;
        }
        const tokens = norm(q).split(' ').filter(Boolean);
        const hits = S.programs.filter((p) => { const hay = norm(`${p.title} ${p.category} ${p.level}`); return tokens.every((t) => hay.includes(t)); }).slice(0, 5);
        if (hits.length) {
          heading('Program yang cocok');
          hits.forEach((p) => addItem(urlFor({ q: p.title }), 'bi-mortarboard-fill', (a) => {
            const txt = el('span', 'suggest__txt'); txt.appendChild(highlight(p.title, q));
            txt.appendChild(el('small', '', `${p.level} · ${rupiah(p.price)}`));
            a.appendChild(txt);
          }));
        } else {
          list.appendChild(el('li', 'suggest__empty', 'Belum ada program yang cocok dengan kata kunci itu.'));
        }
        addItem(hits.length ? urlFor({ q }) : S.url, 'bi-search', (a) => a.appendChild(el('span', 'suggest__txt suggest__all', hits.length ? `Lihat semua hasil untuk “${q}”` : 'Lihat semua program')));
      };

      input.addEventListener('focus', () => { render(); setOpen(true); });
      input.addEventListener('input', () => { render(); setOpen(true); });
      input.addEventListener('keydown', (e) => {
        if (e.key === 'ArrowDown' || e.key === 'ArrowUp') {
          if (list.hidden) { render(); setOpen(true); }
          if (!items.length) return;
          e.preventDefault();
          setActive(e.key === 'ArrowDown' ? (active + 1) % items.length : (active - 1 + items.length) % items.length);
        } else if (e.key === 'Enter' && active >= 0) {
          e.preventDefault();
          window.location.href = $('a', items[active]).href;
        } else if (e.key === 'Escape' && !list.hidden) {
          e.stopPropagation(); setOpen(false);
        }
      });
      document.addEventListener('click', (e) => { if (!wrap.contains(e.target)) setOpen(false); });
    });
  }

  /* ------------------------------------------------------------ AI CHATBOT */
  const norm = (s) => s.toLowerCase().normalize('NFD').replace(/[\u0300-\u036f]/g, '').replace(/[^a-z0-9\s]/g, ' ').replace(/\s+/g, ' ').trim();

  function findAnswer(text) {
    const n = norm(text);
    let best = null; let score = 0;
    (ai.faq || []).forEach((f) => {
      let s = norm(f.q) === n ? 100 : 0;
      (f.keywords || []).forEach((k) => { if (n.includes(norm(k))) s += 2; });
      if (s > score) { score = s; best = f; }
    });
    return best ? { text: best.a } : { text: ai.fallback, wa: true };
  }

  function initChat(root) {
    const log = $('[data-chat-log]', root);
    const form = $('[data-chat-form]', root);
    const input = form && $('input', form);
    let busy = false;

    const add = (kind, text, withWa) => {
      const el = document.createElement('div');
      el.className = `msg msg--${kind}`;
      el.textContent = text;
      if (withWa && cfg.whatsapp) {
        const a = document.createElement('a');
        a.href = cfg.whatsapp; a.target = '_blank'; a.rel = 'noopener'; a.textContent = ' Chat WhatsApp';
        el.appendChild(a);
      }
      log.appendChild(el);
      log.scrollTop = log.scrollHeight;
      return el;
    };

    const ask = (text) => {
      text = (text || '').trim();
      if (!text || busy) return;
      busy = true;
      add('user', text);
      const typing = document.createElement('div');
      typing.className = 'msg msg--bot msg--typing';
      typing.setAttribute('aria-label', 'Asisten sedang mengetik');
      typing.innerHTML = '<i></i><i></i><i></i>';
      log.appendChild(typing); log.scrollTop = log.scrollHeight;
      window.setTimeout(() => {
        typing.remove();
        const res = findAnswer(text);
        add('bot', res.text, res.wa);
        busy = false;
      }, reduceMotion ? 0 : 750);
    };

    $$('[data-q]', root).forEach((btn) => btn.addEventListener('click', () => {
      const f = (ai.faq || [])[Number(btn.dataset.q)];
      if (f) ask(f.q);
    }));
    if (form) form.addEventListener('submit', (e) => { e.preventDefault(); ask(input.value); input.value = ''; });
    if (root.hasAttribute('data-chat-welcome') && ai.intro) add('bot', ai.intro);
  }

  function initChatLauncher() {
    const panel = $('[data-chat-panel]');
    const openBtn = $('[data-chat-open]');
    const closeBtn = $('[data-chat-close]');
    const hint = $('[data-ai-hint]');
    const hintClose = $('[data-ai-hint-close]');
    if (!panel || !openBtn) return;

    const hideHint = () => { if (hint) hint.hidden = true; session.set('el-hint', '1'); };
    let lastTrigger = null;
    const setOpen = (open) => {
      panel.hidden = !open;
      openBtn.setAttribute('aria-expanded', String(open));
      if (open) { hideHint(); const i = $('input', panel); if (i) i.focus({ preventScroll: true }); }
      else if (document.activeElement && panel.contains(document.activeElement)) (lastTrigger || openBtn).focus();
    };

    // Menu "AI FAQ" (navbar & footer) membuka popup chat, bukan scroll ke section.
    $$('[data-chat-trigger]').forEach((a) => a.addEventListener('click', (e) => {
      e.preventDefault();
      lastTrigger = a;
      const menu = $('[data-menu]'); const burger = $('[data-menu-toggle]');
      if (menu) menu.classList.remove('is-open');
      if (burger) burger.setAttribute('aria-expanded', 'false');
      setOpen(true);
    }));

    openBtn.addEventListener('click', () => { lastTrigger = null; setOpen(panel.hidden); });
    if (closeBtn) closeBtn.addEventListener('click', () => setOpen(false));
    document.addEventListener('keydown', (e) => { if (e.key === 'Escape' && !panel.hidden) setOpen(false); });

    if (hint && !session.get('el-hint')) {
      window.setTimeout(() => { if (panel.hidden) hint.hidden = false; }, 4000);
      window.setTimeout(() => { if (!hint.hidden) hideHint(); }, 12000);
    }
    if (hintClose) hintClose.addEventListener('click', hideHint);
  }

  /* ---------------------------------------------------------------- REVEAL */
  function initReveal() {
    const items = $$('[data-reveal]');
    if (!items.length) return;
    if (!('IntersectionObserver' in window) || reduceMotion) { items.forEach((i) => i.classList.add('is-in')); return; }
    const io = new IntersectionObserver((entries) => entries.forEach((en) => {
      if (en.isIntersecting) { en.target.classList.add('is-in'); io.unobserve(en.target); }
    }), { threshold: 0.12, rootMargin: '0px 0px -40px 0px' });
    items.forEach((i) => io.observe(i));
  }

  /* ------------------------------------------------------------------ INIT */
  initNavbar();
  initTabs();
  initFilter();
  initSuggest();
  initForms();
  $$('[data-chat]').forEach(initChat);
  initChatLauncher();
  initReveal();
})();
