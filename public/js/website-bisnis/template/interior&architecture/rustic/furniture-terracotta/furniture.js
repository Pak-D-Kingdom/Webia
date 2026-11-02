/* ==========================================================================
   RusticFurni — Furniture Terracotta (Rustic)
   WEBIA by D-KREASI · public/js/website-bisnis/template/interior&architecture/rustic/furniture-terracotta/furniture.js
   Vanilla JS tanpa dependensi. Data datang dari window.RF (lihat layouts/app.blade.php).
   Modul: header · store (favorit & penawaran) · dialog · katalog · video · konfigurator ·
          material · dimensi · galeri · lead time · form WhatsApp · chatbot FAQ
   ========================================================================== */
(() => {
    'use strict';

    const RF = window.RF || {};
    const products = RF.products || [];
    const byId = Object.fromEntries(products.map((p) => [p.id, p]));
    const catLabel = Object.fromEntries((RF.categories || []).map((c) => [c.key, c.label]));
    const $ = (s, c = document) => c.querySelector(s);
    const $$ = (s, c = document) => Array.from(c.querySelectorAll(s));
    const esc = (s) => String(s ?? '').replace(/[&<>"']/g, (m) => ({ '&': '&amp;', '<': '&lt;', '>': '&gt;', '"': '&quot;', "'": '&#39;' }[m]));
    const img = (name) => `${RF.img}/${name}`;
    const waUrl = (text) => `https://wa.me/${RF.whatsapp}?text=${encodeURIComponent(text)}`;
    const fmtDate = (d) => new Intl.DateTimeFormat('id-ID', { day: 'numeric', month: 'short', year: 'numeric' }).format(d);

    /* ---------- storage aman (private mode / quota) ---------- */
    const mk = (area) => ({
        get(k, d) { try { const v = JSON.parse(window[area].getItem('rf:' + k)); return v ?? d; } catch (e) { return d; } },
        set(k, v) { try { window[area].setItem('rf:' + k, JSON.stringify(v)); } catch (e) { /* abaikan */ } },
        del(k) { try { window[area].removeItem('rf:' + k); } catch (e) { /* abaikan */ } },
    });
    const local = mk('localStorage');
    const session = mk('sessionStorage');

    let toastTimer;
    const toast = (msg) => {
        $('.rf-toast')?.remove();
        const t = Object.assign(document.createElement('div'), { className: 'rf-toast', textContent: msg });
        t.setAttribute('role', 'status');
        document.body.appendChild(t);
        clearTimeout(toastTimer);
        toastTimer = setTimeout(() => t.remove(), 2600);
    };

    /* ---------- dialog helper ---------- */
    const openDialog = (d) => { if (!d) return; if (typeof d.showModal === 'function') d.showModal(); else d.setAttribute('open', ''); };
    const closeDialog = (d) => { if (!d) return; if (typeof d.close === 'function') d.close(); else d.removeAttribute('open'); };
    document.addEventListener('click', (e) => {
        const closer = e.target.closest('[data-rf-modal-close]');
        if (closer) closeDialog(closer.closest('dialog'));
        if (e.target instanceof HTMLDialogElement && e.target.classList.contains('rf-modal')) closeDialog(e.target); // klik backdrop
    });

    /* ---------- header & navigasi ---------- */
    (() => {
        const header = $('[data-rf-header]');
        const toggle = $('[data-rf-nav-toggle]');
        const nav = $('[data-rf-nav]');
        if (header) {
            const onScroll = () => header.classList.toggle('is-stuck', window.scrollY > 8);
            onScroll();
            window.addEventListener('scroll', onScroll, { passive: true });
        }
        if (!toggle || !nav) return;
        const set = (open) => {
            nav.classList.toggle('is-open', open);
            toggle.setAttribute('aria-expanded', String(open));
            toggle.setAttribute('aria-label', open ? 'Tutup menu' : 'Buka menu');
        };
        toggle.addEventListener('click', () => set(!nav.classList.contains('is-open')));
        nav.addEventListener('click', (e) => { if (e.target.closest('a')) set(false); });
        document.addEventListener('keydown', (e) => { if (e.key === 'Escape') set(false); });
        window.matchMedia('(min-width: 1120px)').addEventListener('change', (m) => { if (m.matches) set(false); });
    })();

    /* ---------- store: favorit & daftar penawaran ---------- */
    const TRASH = '<svg class="rf-ic" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M4 7h16M10 11v6M14 11v6M6 7l1 13h10l1-13M9 7V4h6v3"/></svg>';
    const wish = { list: local.get('wish', []) };
    const quote = { list: local.get('quote', []) }; // [{id, qty}]
    const qtyOf = (id) => quote.list.find((i) => i.id === id)?.qty || 0;

    const sync = () => {
        const wc = wish.list.length;
        const qc = quote.list.reduce((n, i) => n + i.qty, 0);
        $$('[data-rf-wish-count]').forEach((el) => { el.textContent = wc; el.hidden = wc === 0; });
        $$('[data-rf-fav-count]').forEach((el) => { el.textContent = wc; });
        $$('[data-rf-quote-count]').forEach((el) => { el.textContent = qc; el.hidden = qc === 0; });
        $$('[data-rf-wish]').forEach((b) => b.setAttribute('aria-pressed', String(wish.list.includes(b.dataset.rfWish))));
        // kontrol jumlah (kartu produk & modal): tombol "+ Penawaran" berubah jadi stepper
        $$('[data-rf-quote-ctl]').forEach((ctl) => {
            const qty = qtyOf(ctl.dataset.rfQuoteCtl);
            $('[data-rf-quote-add]', ctl).hidden = qty > 0;
            $('.rf-stepper', ctl).hidden = qty === 0;
            if (!qty) return;
            $('[data-rf-q-qty]', ctl).textContent = qty;
            const dec = $('[data-rf-quote-dec]', ctl);
            dec.innerHTML = qty === 1 ? TRASH : '−';
            dec.setAttribute('aria-label', qty === 1 ? 'Hapus dari penawaran' : 'Kurangi jumlah');
        });
        document.dispatchEvent(new CustomEvent('rf:store'));
    };
    const toggleWish = (id) => {
        wish.list = wish.list.includes(id) ? wish.list.filter((x) => x !== id) : [...wish.list, id];
        local.set('wish', wish.list);
        sync();
    };
    const setQty = (id, n) => {
        const name = byId[id]?.name || 'Produk';
        const prev = qtyOf(id);
        n = Math.max(0, Math.min(99, n));
        if (n === 0) quote.list = quote.list.filter((i) => i.id !== id);
        else if (prev) quote.list.find((i) => i.id === id).qty = n;
        else quote.list.push({ id, qty: n });
        local.set('quote', quote.list);
        sync();
        toast(n === 0 ? `${name} dihapus dari penawaran` : prev === 0 ? `${name} ditambahkan ke penawaran` : `${name} × ${n}`);
    };
    document.addEventListener('click', (e) => {
        const w = e.target.closest('[data-rf-wish]');
        if (w) toggleWish(w.dataset.rfWish);
        const add = e.target.closest('[data-rf-quote-add]');
        if (add) setQty(add.dataset.rfQuoteAdd, 1);
        const inc = e.target.closest('[data-rf-quote-inc]');
        if (inc) setQty(inc.dataset.rfQuoteInc, qtyOf(inc.dataset.rfQuoteInc) + 1);
        const dec = e.target.closest('[data-rf-quote-dec]');
        if (dec) setQty(dec.dataset.rfQuoteDec, qtyOf(dec.dataset.rfQuoteDec) - 1);
    });

    /* ---------- katalog ---------- */
    (() => {
        const root = $('[data-rf-catalog]');
        if (!root) return;
        const grid = $('[data-rf-grid]', root);
        const cards = $$('[data-rf-product]', root);
        const search = $('[data-rf-search]', root);
        const clear = $('[data-rf-search-clear]', root);
        const sort = $('[data-rf-sort]', root);
        const reset = $('[data-rf-reset]', root);
        const empty = $('[data-rf-empty]', root);
        const emptyMsg = $('p', empty);
        const emptyDefault = emptyMsg.textContent;
        const count = $('[data-rf-result-count]', root);
        const chips = $$('[data-rf-filter]', root);
        const params = new URLSearchParams(location.search);
        const DEFAULT = { cat: 'all', q: '', sort: 'default' };
        const state = { ...DEFAULT };

        const apply = () => {
            const q = state.q.trim().toLowerCase();
            let shown = 0;
            cards.forEach((c) => {
                const okCat = state.cat === 'all' || (state.cat === 'fav' ? wish.list.includes(c.dataset.id) : c.dataset.cat === state.cat);
                const okQ = !q || c.dataset.name.includes(q) || (catLabel[c.dataset.cat] || '').toLowerCase().includes(q) || (byId[c.dataset.id]?.material || '').toLowerCase().includes(q);
                c.hidden = !(okCat && okQ);
                if (!c.hidden) shown++;
            });
            const key = { default: (c) => +c.dataset.order, name: (c) => c.dataset.name, size: (c) => -c.dataset.size }[state.sort];
            [...cards].sort((a, b) => (key(a) > key(b) ? 1 : key(a) < key(b) ? -1 : 0)).forEach((c) => grid.appendChild(c));
            count.textContent = shown;
            empty.hidden = shown !== 0;
            emptyMsg.textContent = state.cat === 'fav' && !wish.list.length && !q ? 'Belum ada produk favorit. Tekan ikon hati pada produk untuk menyimpannya di sini.' : emptyDefault;
            chips.forEach((b) => {
                const on = b.dataset.rfFilter === state.cat;
                b.classList.toggle('is-active', on);
                b.setAttribute('aria-pressed', String(on));
            });
            clear.hidden = !state.q;
            reset.hidden = state.cat === 'all' && !q && state.sort === 'default';
        };

        chips.forEach((b) => b.addEventListener('click', () => { state.cat = b.dataset.rfFilter; apply(); }));
        search.addEventListener('input', () => { state.q = search.value; apply(); });
        clear.addEventListener('click', () => { state.q = ''; search.value = ''; apply(); search.focus(); });
        sort.addEventListener('change', () => { state.sort = sort.value; apply(); });
        reset.addEventListener('click', () => { Object.assign(state, DEFAULT); search.value = ''; sort.value = 'default'; apply(); });
        document.addEventListener('rf:store', () => { if (state.cat === 'fav') apply(); });

        const c = params.get('cat');
        if (c && (c === 'fav' || catLabel[c])) state.cat = c;
        if (params.get('fav')) state.cat = 'fav';
        if (params.get('q')) { state.q = params.get('q'); search.value = state.q; }
        apply();
        if (params.get('focus') === 'search') search.focus();

        // modal detail (kontrol jumlah disalin dari kartu agar selalu sinkron)
        const dlg = $('#rf-product-modal');
        const box = $('[data-rf-product-detail]', dlg);
        grid.addEventListener('click', (e) => {
            const b = e.target.closest('[data-rf-detail]');
            const p = b && byId[b.dataset.rfDetail];
            if (!p) return;
            box.innerHTML = `
                <div class="rf-pd">
                    <div class="rf-pd__media"><img src="${esc(img(p.image))}" alt="${esc(p.name)}"></div>
                    <div class="rf-pd__body">
                        <p class="rf-product__cat">${esc(catLabel[p.category])}</p>
                        <h2>${esc(p.name)}</h2>
                        <p>${esc(p.summary)}</p>
                        <dl class="rf-spec">
                            <div><dt>Material</dt><dd>${esc(p.material)}</dd></div>
                            <div><dt>Finishing</dt><dd>${esc(p.finishing)}</dd></div>
                            <div><dt>Panjang × Lebar × Tinggi</dt><dd>${p.dims.join(' × ')} cm</dd></div>
                        </dl>
                        <div class="rf-pd__actions">
                            <div class="rf-pd__ctl" data-rf-modal-ctl></div>
                            <a class="rf-btn rf-btn--ghost" href="${esc(RF.routes.customDesign)}">Custom ukuran</a>
                        </div>
                    </div>
                </div>`;
            const src = $(`[data-rf-quote-ctl="${p.id}"]`, grid);
            if (src) $('[data-rf-modal-ctl]', box).appendChild(src.cloneNode(true));
            sync();
            openDialog(dlg);
        });
    })();

    /* ---------- video hero ---------- */
    (() => {
        const dlg = $('#rf-video');
        if (!dlg) return;
        const frame = $('iframe[data-src]', dlg);
        $$('[data-rf-video-open]').forEach((b) => b.addEventListener('click', () => {
            if (frame && !frame.src) frame.src = frame.dataset.src;
            openDialog(dlg);
        }));
        dlg.addEventListener('close', () => { if (frame) frame.removeAttribute('src'); });
    })();

    /* ---------- konfigurator custom design ---------- */
    (() => {
        const form = $('[data-rf-config]');
        if (!form) return;
        const out = $('[data-rf-summary]');
        const dot = $('[data-rf-swatch]');
        const dims = $('[data-rf-dims]');
        const val = (n) => form.elements[n]?.value || '';
        const read = () => {
            const sizeKey = $('input[name="size"]:checked', form)?.dataset.size;
            const custom = sizeKey === 'kustom';
            const [p, l, t] = ['p', 'l', 't'].map(val);
            return {
                model: val('model'), size: val('size'),
                dims: custom && (p || l || t) ? `${p || '?'} × ${l || '?'} × ${t || '?'} cm` : '',
                custom, p, l, t, material: val('material'), finishing: val('finishing'),
                extras: $$('input[name="extras[]"]:checked', form).map((i) => i.value),
                note: val('note').trim(),
            };
        };
        const render = () => {
            const s = read();
            dims.hidden = !s.custom;
            const rows = [['Furniture', s.model], ['Ukuran', s.dims ? `${s.size} (${s.dims})` : s.size], ['Material', s.material], ['Finishing', s.finishing], ['Tambahan', s.extras.join(', ') || '—']];
            out.innerHTML = rows.map(([k, v]) => `<div><dt>${esc(k)}</dt><dd>${esc(v)}</dd></div>`).join('');
            const hex = $('input[name="finishing"]:checked', form)?.dataset.hex;
            if (dot && hex) dot.style.background = hex;
            const nm = $('[data-rf-swatch-name]'); if (nm) nm.textContent = s.finishing;
        };
        form.addEventListener('input', render);
        form.addEventListener('change', render);
        render();
        $('[data-rf-config-next]')?.addEventListener('click', () => {
            session.set('config', read());
            location.href = RF.routes.order;
        });
    })();

    /* ---------- material: pemilih finishing ---------- */
    (() => {
        const root = $('[data-rf-finish]');
        if (!root) return;
        const chip = $('[data-rf-finish-chip]', root);
        const set = (i) => {
            const f = RF.finishings[i];
            if (!f) return;
            chip.style.setProperty('--hex', f.hex);
            $('[data-rf-finish-name]', root).textContent = f.name;
            $('[data-rf-finish-text]', root).textContent = f.text;
            $('[data-rf-finish-sheen]', root).textContent = f.sheen;
            $$('[data-rf-finish-pick]', root).forEach((b) => {
                const on = +b.dataset.rfFinishPick === i;
                b.classList.toggle('is-active', on);
                b.setAttribute('aria-pressed', String(on));
            });
        };
        root.addEventListener('click', (e) => {
            const b = e.target.closest('[data-rf-finish-pick]');
            if (b) set(+b.dataset.rfFinishPick);
        });
    })();

    /* ---------- dimensi ---------- */
    (() => {
        const root = $('[data-rf-dim]');
        if (!root) return;
        const select = $('[data-rf-dim-select]', root);
        const svgBox = $('[data-rf-dim-svg]', root);
        const figures = $('[data-rf-dim-figures]', root);
        const photo = $('[data-rf-dim-photo]', root);

        const draw = ([p, l, t]) => {
            const s = Math.min(230 / (p + 0.5 * l), 175 / (t + 0.35 * l));
            const W = p * s, H = t * s, dx = l * s * 0.5, dy = l * s * 0.35;
            const ox = 62 + (250 - (W + dx)) / 2, oy = 14 + (190 - (H + dy)) / 2;
            const fy = oy + dy, by = fy + H;
            const poly = (pts) => pts.map((q) => q.join(',')).join(' ');
            return `<svg viewBox="0 0 360 270" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                <polygon class="rf-dim-box" points="${poly([[ox, fy], [ox + dx, oy], [ox + W + dx, oy], [ox + W, fy]])}" style="fill:#f7e6cf"/>
                <polygon class="rf-dim-box" points="${poly([[ox + W, fy], [ox + W + dx, oy], [ox + W + dx, oy + H], [ox + W, by]])}" style="fill:#e8c9a3"/>
                <rect class="rf-dim-box" x="${ox}" y="${fy}" width="${W}" height="${H}"/>
                <g class="rf-dim-line" fill="none">
                    <path d="M${ox} ${by + 18}H${ox + W}M${ox} ${by + 12}v12M${ox + W} ${by + 12}v12"/>
                    <path d="M${ox - 18} ${fy}V${by}M${ox - 24} ${fy}h12M${ox - 24} ${by}h12"/>
                    <path d="M${ox + W + 12} ${by + 4}L${ox + W + dx + 12} ${by - dy + 4}"/>
                </g>
                <text class="rf-dim-text" x="${ox + W / 2}" y="${by + 36}" text-anchor="middle">${p} cm</text>
                <text class="rf-dim-text" x="${ox - 30}" y="${fy + H / 2}" text-anchor="middle" transform="rotate(-90 ${ox - 30} ${fy + H / 2})">${t} cm</text>
                <text class="rf-dim-text" x="${ox + W + dx / 2 + 26}" y="${by - dy / 2 + 22}" text-anchor="middle">${l} cm</text>
            </svg>`;
        };
        const set = (id) => {
            const p = byId[id];
            if (!p) return;
            select.value = id;
            svgBox.innerHTML = draw(p.dims);
            svgBox.setAttribute('aria-label', `Diagram ukuran ${p.name}: ${p.dims.join(' × ')} cm`);
            figures.innerHTML = [['Panjang', p.dims[0]], ['Lebar', p.dims[1]], ['Tinggi', p.dims[2]]].map(([k, v]) => `<li><b>${v}</b><span>${k} (cm)</span></li>`).join('');
            photo.src = img(p.image);
            photo.alt = p.name;
        };
        select.addEventListener('change', () => set(select.value));
        root.addEventListener('click', (e) => {
            const b = e.target.closest('[data-rf-dim-pick]');
            if (!b) return;
            set(b.dataset.rfDimPick);
            select.scrollIntoView({ behavior: 'smooth', block: 'center' });
        });
        set(select.value);
    })();

    /* ---------- galeri ---------- */
    (() => {
        const root = $('[data-rf-gallery]');
        if (!root) return;
        const shots = $$('.rf-shot', root);
        const chips = $$('[data-rf-gfilter]', root);
        const count = $('[data-rf-gresult]', root);
        const reset = $('[data-rf-greset]', root);
        const filter = (g) => {
            shots.forEach((s) => { s.hidden = !(g === 'all' || s.dataset.group === g); });
            chips.forEach((c) => {
                const on = c.dataset.rfGfilter === g;
                c.classList.toggle('is-active', on);
                c.setAttribute('aria-pressed', String(on));
            });
            count.textContent = shots.filter((s) => !s.hidden).length;
            reset.hidden = g === 'all';
        };
        chips.forEach((b) => b.addEventListener('click', () => filter(b.dataset.rfGfilter)));
        reset.addEventListener('click', () => filter('all'));

        const dlg = $('#rf-lightbox');
        const im = $('[data-rf-lb-img]', dlg);
        const cap = $('[data-rf-lb-cap]', dlg);
        let list = [], idx = 0;
        const show = (i) => {
            idx = (i + list.length) % list.length;
            const fig = list[idx];
            const src = $('img', fig);
            im.src = src.currentSrc || src.src;
            im.alt = src.alt;
            cap.textContent = `${$('b', fig).textContent} — ${$('span', fig).textContent}`;
        };
        const open = (id) => {
            list = shots.filter((s) => !s.hidden);
            const i = list.findIndex((s) => $('[data-rf-lightbox]', s).dataset.rfLightbox === String(id));
            show(Math.max(0, i));
            openDialog(dlg);
        };
        root.addEventListener('click', (e) => {
            const b = e.target.closest('[data-rf-lightbox]');
            if (b) open(b.dataset.rfLightbox);
        });
        $('[data-rf-lb-prev]', dlg).addEventListener('click', () => show(idx - 1));
        $('[data-rf-lb-next]', dlg).addEventListener('click', () => show(idx + 1));
        dlg.addEventListener('keydown', (e) => {
            if (e.key === 'ArrowLeft') show(idx - 1);
            if (e.key === 'ArrowRight') show(idx + 1);
        });
        const m = location.hash.match(/^#proyek-(\d+)$/);
        if (m) open(m[1]);
    })();

    /* ---------- strip pratinjau galeri (beranda) ---------- */
    (() => {
        const list = $('[data-rf-strip]');
        const next = $('[data-rf-strip-next]');
        if (!list || !next) return;
        next.addEventListener('click', () => {
            const end = list.scrollLeft + list.clientWidth >= list.scrollWidth - 4;
            list.scrollTo({ left: end ? 0 : list.scrollLeft + 100, behavior: 'smooth' });
        });
    })();

    /* ---------- estimasi lead time ---------- */
    (() => {
        const root = $('[data-rf-lead]');
        if (!root) return;
        const type = $('[data-rf-lead-type]', root), qty = $('[data-rf-lead-qty]', root);
        const custom = $('[data-rf-lead-custom]', root), start = $('[data-rf-lead-start]', root);
        const days = $('[data-rf-lead-days]', root), date = $('[data-rf-lead-date]', root);
        const pad = (n) => String(n).padStart(2, '0');
        const today = new Date();
        start.value = `${today.getFullYear()}-${pad(today.getMonth() + 1)}-${pad(today.getDate())}`;
        start.min = start.value;
        const addWorkdays = (from, n) => {
            const d = new Date(from);
            while (n > 0) { d.setDate(d.getDate() + 1); if (d.getDay() % 6 !== 0) n--; }
            return d;
        };
        const calc = () => {
            const lt = RF.leadTimes, t = lt.types[type.value];
            const extra = (lt.qty_extra[qty.value] || 0) + (custom.checked ? lt.custom_extra : 0);
            const min = t.min + extra, max = t.max + extra;
            days.textContent = `${min}–${max} hari kerja`;
            const from = start.value ? new Date(`${start.value}T00:00:00`) : new Date();
            date.textContent = `Perkiraan selesai ${fmtDate(addWorkdays(from, min))} – ${fmtDate(addWorkdays(from, max))}`;
        };
        [type, qty, custom, start].forEach((el) => el.addEventListener('change', calc));
        calc();
    })();

    /* ---------- daftar penawaran (halaman quotation) ---------- */
    (() => {
        const box = $('[data-rf-quote-list]');
        if (!box) return;
        const render = () => {
            if (!quote.list.length) {
                box.innerHTML = '<p class="rf-qempty">Daftar masih kosong. Tambahkan produk dari katalog, atau langsung tulis kebutuhan Anda di bawah.</p>';
                return;
            }
            box.innerHTML = quote.list.map((i) => {
                const p = byId[i.id];
                if (!p) return '';
                return `<div class="rf-qitem">
                    <img src="${esc(img(p.image))}" alt="">
                    <div><b>${esc(p.name)}</b><small>${p.dims.join(' × ')} cm · ${esc(p.material)}</small></div>
                    <div class="rf-qitem__ctl">
                        <button type="button" data-q-dec="${esc(i.id)}" aria-label="Kurangi jumlah">−</button>
                        <output>${i.qty}</output>
                        <button type="button" data-q-inc="${esc(i.id)}" aria-label="Tambah jumlah">+</button>
                        <button type="button" data-q-del="${esc(i.id)}" aria-label="Hapus ${esc(p.name)}">×</button>
                    </div>
                </div>`;
            }).join('');
        };
        box.addEventListener('click', (e) => {
            const b = e.target.closest('button');
            if (!b) return;
            const id = b.dataset.qInc || b.dataset.qDec || b.dataset.qDel;
            const item = quote.list.find((i) => i.id === id);
            if (!item) return;
            if (b.dataset.qInc) item.qty = Math.min(99, item.qty + 1);
            if (b.dataset.qDec) item.qty = Math.max(1, item.qty - 1);
            if (b.dataset.qDel) quote.list = quote.list.filter((i) => i.id !== id);
            local.set('quote', quote.list);
            sync();
        });
        document.addEventListener('rf:store', render);
        render();
    })();

    /* ---------- form → WhatsApp ---------- */
    (() => {
        const forms = $$('[data-rf-wa-form]');
        if (!forms.length) return;

        // Prefill Custom Order dari konfigurator
        const order = forms.find((f) => f.dataset.rfWaForm === 'order');
        const cfg = session.get('config', null);
        if (order && cfg) {
            const setv = (n, v) => { const el = order.elements[n]; if (el && v) el.value = v; };
            const sel = order.elements.jenis;
            if (sel) { const opt = [...sel.options].find((o) => o.value === cfg.model); if (opt) sel.value = cfg.model; }
            ['p', 'l', 't', 'material', 'finishing'].forEach((n) => setv(n, cfg[n]));
            const bits = [cfg.size && `Ukuran: ${cfg.size}`, cfg.extras?.length && `Tambahan: ${cfg.extras.join(', ')}`, cfg.note].filter(Boolean);
            setv('catatan', bits.join('\n'));
        }

        $$('[data-rf-file]').forEach((input) => input.addEventListener('change', () => {
            const label = input.parentElement.querySelector('[data-rf-file-label]');
            if (label) label.textContent = input.files.length ? `${input.files.length} berkas dipilih` : 'Pilih file';
        }));

        forms.forEach((form) => form.addEventListener('submit', (e) => {
            e.preventDefault();
            const err = $('[data-rf-form-error]', form);
            const bad = [...form.elements].filter((el) => el.willValidate && !el.checkValidity());
            $$('.rf-field', form).forEach((f) => f.classList.remove('is-invalid'));
            if (bad.length) {
                bad.forEach((el) => el.closest('.rf-field')?.classList.add('is-invalid'));
                err.textContent = 'Mohon lengkapi kolom bertanda * dengan benar.';
                err.hidden = false;
                bad[0].focus();
                return;
            }
            const kind = form.dataset.rfWaForm;
            const g = (n) => (form.elements[n]?.value || '').trim();
            const row = (k, v) => (v ? `${k}: ${v}` : '');
            let lines;
            if (kind === 'order') {
                lines = ['*Custom Order — RusticFurni*', '',
                    row('Nama', g('nama')), row('WhatsApp', g('wa')), row('Email', g('email')), row('Kota', g('kota')), '',
                    row('Jenis furniture', g('jenis')), row('Jumlah', g('jumlah')),
                    (g('p') || g('l') || g('t')) ? `Ukuran (P×L×T): ${g('p') || '-'} × ${g('l') || '-'} × ${g('t') || '-'} cm` : '',
                    row('Material', g('material')), row('Finishing', g('finishing')), row('Dibutuhkan sebelum', g('tanggal')), row('Anggaran', g('budget')),
                    '', row('Catatan', g('catatan'))];
            } else {
                const items = quote.list.map((i) => byId[i.id] && `- ${byId[i.id].name} (${byId[i.id].dims.join('×')} cm) × ${i.qty}`).filter(Boolean);
                if (!items.length && !g('catatan')) {
                    err.textContent = 'Tambahkan minimal satu produk atau tulis kebutuhan Anda pada kolom catatan.';
                    err.hidden = false;
                    return;
                }
                lines = ['*Permintaan Penawaran — RusticFurni*', '',
                    row('Nama', g('nama')), row('Perusahaan', g('perusahaan')), row('WhatsApp', g('wa')), row('Email', g('email')),
                    row('Alamat pengiriman', g('kota')), row('Anggaran', g('budget')),
                    form.elements.instalasi?.checked ? 'Butuh instalasi: Ya' : '',
                    '', items.length ? 'Daftar produk:' : '', ...items, '', row('Kebutuhan tambahan', g('catatan'))];
            }
            err.hidden = true;
            const text = lines.filter((l, i, a) => l !== '' || (a[i - 1] !== '' && i)).join('\n');
            window.open(waUrl(text), '_blank', 'noopener');
            toast('Membuka WhatsApp…');
        }));
    })();

    /* ---------- chatbot FAQ ---------- */
    (() => {
        const panel = $('#rf-chat');
        if (!panel) return;
        const log = $('[data-rf-chat-log]', panel);
        const chips = $('[data-rf-chat-chips]', panel);
        const form = $('[data-rf-chat-form]', panel);
        const input = $('input', form);
        const bot = RF.faq.bot;
        const faqItems = RF.faq.groups.flatMap((g) => g.items);
        let greeted = false;

        const norm = (s) => s.toLowerCase().normalize('NFKD').replace(/[^\p{L}\p{N}\s]/gu, ' ').replace(/\s+/g, ' ').trim();
        const stop = new Set(['yang', 'dan', 'untuk', 'apa', 'bisa', 'apakah', 'ada', 'di', 'ke', 'dari', 'saya', 'kami', 'anda', 'itu', 'ini', 'dengan', 'atau']);
        const roomKeys = {
            living: ['ruang tamu', 'living', 'sofa', 'meja kopi'], dining: ['ruang makan', 'meja makan', 'kursi makan'],
            bedroom: ['kamar tidur', 'kamar', 'ranjang', 'kasur', 'nakas'], workspace: ['ruang kerja', 'kantor', 'meja kerja', 'rak buku'],
            outdoor: ['outdoor', 'teras', 'taman', 'luar ruang'],
        };
        const links = [
            [/custom|ukuran|desain/, 'Buka Custom Design', RF.routes.customDesign],
            [/penawaran|quotation|harga|biaya/, 'Minta Penawaran', RF.routes.quotation],
            [/produk|katalog|rekomendasi/, 'Lihat Katalog', RF.routes.catalog],
            [/pesan|order/, 'Isi Form Custom Order', RF.routes.order],
        ];

        const add = (who, text, actions = []) => {
            const el = document.createElement('div');
            el.className = `rf-msg rf-msg--${who}`;
            const p = document.createElement('p');
            p.textContent = text;
            el.appendChild(p);
            actions.forEach((a) => {
                const link = document.createElement('a');
                link.className = `rf-msg__link${a.wa ? ' rf-msg__link--wa' : ''}`;
                link.href = a.href;
                link.textContent = a.label;
                if (a.wa) { link.target = '_blank'; link.rel = 'noopener'; }
                el.appendChild(link);
            });
            log.appendChild(el);
            log.scrollTop = log.scrollHeight;
        };

        const answer = (q) => {
            const n = norm(q);
            if (/^(halo|hai|hi|hello|selamat)/.test(n) && n.split(' ').length <= 3) return { text: 'Halo! Senang bisa membantu. Mau tanya soal produk, material, ukuran custom, atau waktu produksi?' };
            if (/terima kasih|makasih|thanks/.test(n)) return { text: 'Sama-sama! Kalau ada yang ingin ditanyakan lagi, saya di sini.' };

            // 1) rekomendasi per ruangan
            const room = Object.keys(roomKeys).find((k) => roomKeys[k].some((w) => n.includes(w)));
            if (room && /rekomendasi|saran|produk|pilih|cari|ada apa|koleksi/.test(n)) {
                const picks = products.filter((p) => p.category === room).slice(0, 3).map((p) => p.name);
                return { text: `Untuk ${catLabel[room].toLowerCase()}, beberapa pilihan kami: ${picks.join(', ')}. Semua ukuran bisa disesuaikan dengan ruangan Anda.`, actions: [{ label: `Lihat Koleksi ${catLabel[room]}`, href: `${RF.routes.catalog}?cat=${room}` }] };
            }

            // 2) cocokkan FAQ lewat kata kunci + irisan kata
            const words = n.split(' ').filter((w) => w.length > 2 && !stop.has(w));
            let best = null, top = 0;
            faqItems.forEach((it) => {
                let score = it.keys.reduce((s, k) => s + (n.includes(k) ? 2 : 0), 0);
                const qw = norm(it.q).split(' ');
                score += words.filter((w) => qw.includes(w)).length;
                if (score > top) { top = score; best = it; }
            });
            if (best && top >= 2) {
                const l = links.find(([re]) => re.test(norm(best.q + ' ' + best.a)));
                return { text: best.a, actions: l ? [{ label: l[1], href: l[2] }] : [] };
            }
            return { text: bot.fallback, actions: [{ label: 'Tanya via WhatsApp', href: waUrl(`Halo RusticFurni, saya ingin bertanya: ${q}`), wa: true }] };
        };

        const ask = (q) => {
            q = q.trim();
            if (!q) return;
            add('me', q);
            const typing = Object.assign(document.createElement('div'), { className: 'rf-typing', innerHTML: '<i></i><i></i><i></i>' });
            log.appendChild(typing);
            log.scrollTop = log.scrollHeight;
            const r = answer(q);
            setTimeout(() => { typing.remove(); add('bot', r.text, r.actions); }, 520 + Math.min(r.text.length * 4, 700));
        };

        const setOpen = (open) => {
            panel.hidden = !open;
            document.body.classList.toggle('rf-chat-open', open);
            $$('[data-rf-chat-open]').forEach((b) => b.setAttribute('aria-expanded', String(open)));
            if (open) {
                if (!greeted) { greeted = true; add('bot', bot.greeting); }
                input.focus({ preventScroll: true });
            }
        };

        chips.innerHTML = '';
        bot.chips.forEach((c) => {
            const b = Object.assign(document.createElement('button'), { type: 'button', textContent: c });
            b.addEventListener('click', () => ask(c));
            chips.appendChild(b);
        });

        document.addEventListener('click', (e) => {
            const o = e.target.closest('[data-rf-chat-open]');
            if (o) {
                if (o.classList.contains('rf-ai') && !panel.hidden) { setOpen(false); return; }
                setOpen(true);
                if (o.dataset.rfChatQ) ask(o.dataset.rfChatQ);
            }
            if (e.target.closest('[data-rf-chat-close]')) { setOpen(false); $('.rf-ai')?.focus(); }
        });
        document.addEventListener('keydown', (e) => { if (e.key === 'Escape' && !panel.hidden) { setOpen(false); $('.rf-ai')?.focus(); } });
        form.addEventListener('submit', (e) => { e.preventDefault(); ask(input.value); input.value = ''; });
        $$('[data-rf-chat-inline]').forEach((f) => f.addEventListener('submit', (e) => {
            e.preventDefault();
            const q = f.elements.q.value;
            f.reset();
            setOpen(true);
            ask(q);
        }));
    })();

    sync();
})();
