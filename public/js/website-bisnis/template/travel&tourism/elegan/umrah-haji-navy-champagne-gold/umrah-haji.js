/*!
 * Al Hijrah Travel — Umrah & Haji (Elegant · Navy Champagne Gold)
 * Vanilla JS, tanpa dependensi. Semua modul aman dijalankan walau elemennya tidak ada.
 */
(function () {
    'use strict';

    var D = document;
    var W = window;
    var UH = W.UH || {};
    var root = D.documentElement;
    var reduceMotion = !!(W.matchMedia && W.matchMedia('(prefers-reduced-motion: reduce)').matches);

    function $(sel, ctx) { return (ctx || D).querySelector(sel); }
    function $$(sel, ctx) { return Array.prototype.slice.call((ctx || D).querySelectorAll(sel)); }
    function on(el, ev, fn, opt) { if (el) { el.addEventListener(ev, fn, opt || false); } }
    function norm(t) {
        t = String(t || '').toLowerCase();
        if (t.normalize) { t = t.normalize('NFD').replace(/[\u0300-\u036f]/g, ''); }
        return t.replace(/[^a-z0-9\s]/g, ' ').replace(/\s+/g, ' ').trim();
    }
    function lock(state) { D.body.classList.toggle('uh-lock', !!state); }

    root.classList.add('uh-js');

    /* ------------------------------------------------------------------ Header */
    (function header() {
        var h = $('#uh-header');
        if (!h) { return; }
        var ticking = false;
        function update() {
            h.classList.toggle('is-stuck', (W.pageYOffset || root.scrollTop) > 8);
            ticking = false;
        }
        on(W, 'scroll', function () {
            if (!ticking) { ticking = true; W.requestAnimationFrame(update); }
        }, { passive: true });
        update();
    })();

    /* ------------------------------------------------------------------ Mobile menu */
    var closeMenu = function () {};
    (function menu() {
        var header = $('#uh-header');
        var toggle = $('[data-menu-toggle]');
        var scrim = $('[data-menu-scrim]');
        var nav = $('#uh-menu');
        if (!header || !toggle || !nav) { return; }

        function set(open) {
            header.classList.toggle('is-open', open);
            toggle.setAttribute('aria-expanded', open ? 'true' : 'false');
            toggle.setAttribute('aria-label', open ? 'Tutup menu' : 'Buka menu');
            if (scrim) { scrim.hidden = !open; }
            lock(open);
        }
        closeMenu = function () { set(false); };
        on(toggle, 'click', function () { set(!header.classList.contains('is-open')); });
        on(scrim, 'click', closeMenu);
        $$('a', nav).forEach(function (a) { on(a, 'click', closeMenu); });
        on(W, 'resize', function () { if (W.innerWidth > 1199) { closeMenu(); } });
    })();

    /* ------------------------------------------------------------------ Search */
    var closeSearch = function () {};
    (function search() {
        var box = $('#uh-search');
        var input = $('#uh-search-input');
        var list = $('#uh-search-list');
        var empty = $('#uh-search-empty');
        if (!box || !input || !list) { return; }
        var items = UH.search || [];

        function render(q) {
            var n = norm(q);
            var found = items.filter(function (it) {
                return !n || norm(it.label + ' ' + it.k).indexOf(n) > -1;
            });
            list.innerHTML = '';
            found.forEach(function (it) {
                var li = D.createElement('li');
                var a = D.createElement('a');
                a.href = it.url;
                a.textContent = it.label;
                li.appendChild(a);
                list.appendChild(li);
            });
            if (empty) { empty.hidden = found.length > 0; }
        }
        function open() {
            closeMenu();
            box.hidden = false;
            W.requestAnimationFrame(function () { box.classList.add('is-open'); });
            lock(true);
            render('');
            input.value = '';
            setTimeout(function () { input.focus(); }, 60);
        }
        closeSearch = function () {
            if (box.hidden) { return; }
            box.classList.remove('is-open');
            setTimeout(function () { box.hidden = true; }, 180);
            lock(false);
        };
        $$('[data-search-open]').forEach(function (b) { on(b, 'click', open); });
        $$('[data-search-close]').forEach(function (b) { on(b, 'click', closeSearch); });
        on(box, 'click', function (e) { if (e.target === box) { closeSearch(); } });
        on(input, 'input', function () { render(input.value); });
        on(input, 'keydown', function (e) {
            if (e.key === 'Enter') {
                var first = $('a', list);
                if (first) { W.location.href = first.href; }
            }
        });
    })();

    /* ------------------------------------------------------------------ Reveal on scroll */
    (function reveal() {
        var els = $$('[data-reveal]');
        if (!els.length) { return; }
        if (!('IntersectionObserver' in W) || reduceMotion) { return; }
        els.forEach(function (el) { el.classList.add('uh-reveal'); });
        var io = new IntersectionObserver(function (entries) {
            entries.forEach(function (e) {
                if (e.isIntersecting) {
                    e.target.classList.add('is-in');
                    io.unobserve(e.target);
                }
            });
        }, { threshold: 0.12, rootMargin: '0px 0px -40px 0px' });
        els.forEach(function (el) { io.observe(el); });
    })();

    /* ------------------------------------------------------------------ Tabs (preview paket) */
    (function tabs() {
        $$('[data-tabs]').forEach(function (wrap) {
            var btns = $$('[data-tab]', wrap);
            var items = $$('[data-types]', wrap);
            function show(type) {
                btns.forEach(function (b) {
                    var a = b.getAttribute('data-tab') === type;
                    b.classList.toggle('is-active', a);
                    b.setAttribute('aria-selected', a ? 'true' : 'false');
                });
                items.forEach(function (it) {
                    var ok = (' ' + it.getAttribute('data-types') + ' ').indexOf(' ' + type + ' ') > -1;
                    it.hidden = !ok;
                    if (ok) { it.classList.remove('uh-pop'); void it.offsetWidth; it.classList.add('uh-pop'); }
                });
            }
            btns.forEach(function (b) { on(b, 'click', function () { show(b.getAttribute('data-tab')); }); });
            if (btns.length) { show(btns[0].getAttribute('data-tab')); }
        });
    })();

    /* ------------------------------------------------------------------ Filters (halaman paket & jadwal) */
    (function filters() {
        $$('[data-filter-scope]').forEach(function (scope) {
            var groups = $$('[data-filter-key]', scope);
            var items = $$('[data-filter-item]', scope);
            var empty = $('[data-filter-empty]', scope);
            var state = {};
            groups.forEach(function (g) {
                var key = g.getAttribute('data-filter-key');
                state[key] = 'all';
                $$('[data-filter]', g).forEach(function (b) {
                    on(b, 'click', function () {
                        state[key] = b.getAttribute('data-filter');
                        $$('[data-filter]', g).forEach(function (x) { x.classList.toggle('is-active', x === b); });
                        apply();
                    });
                });
            });
            function apply() {
                var visible = 0;
                items.forEach(function (it) {
                    var ok = Object.keys(state).every(function (k) {
                        if (state[k] === 'all') { return true; }
                        var v = ' ' + (it.getAttribute('data-' + k) || '') + ' ';
                        return v.indexOf(' ' + state[k] + ' ') > -1;
                    });
                    it.hidden = !ok;
                    if (ok) { visible++; }
                });
                if (empty) { empty.hidden = visible > 0; }
            }
        });
    })();

    /* ------------------------------------------------------------------ Slider testimoni (beranda) */
    (function slider() {
        $$('[data-slider]').forEach(function (wrap) {
            var slides = $$('[data-slide]', wrap);
            var dots = $$('[data-dot]', wrap);
            if (slides.length < 2) { return; }
            var idx = 0;
            var timer = null;
            function go(i) {
                idx = (i + slides.length) % slides.length;
                slides.forEach(function (s, n) { s.classList.toggle('is-active', n === idx); });
                dots.forEach(function (d, n) { d.classList.toggle('is-active', n === idx); });
            }
            function start() {
                if (reduceMotion) { return; }
                stop();
                timer = setInterval(function () { go(idx + 1); }, 6500);
            }
            function stop() { if (timer) { clearInterval(timer); timer = null; } }
            dots.forEach(function (d, n) { on(d, 'click', function () { go(n); start(); }); });
            on(wrap, 'mouseenter', stop);
            on(wrap, 'mouseleave', start);
            start();
        });
    })();

    /* ------------------------------------------------------------------ Dialog (syarat & privasi) */
    (function dialogs() {
        $$('[data-dialog]').forEach(function (b) {
            on(b, 'click', function () {
                var dlg = D.getElementById(b.getAttribute('data-dialog'));
                if (!dlg) { return; }
                if (typeof dlg.showModal === 'function') { dlg.showModal(); } else { dlg.setAttribute('open', ''); }
            });
        });
        $$('dialog.uh-dialog').forEach(function (dlg) {
            on(dlg, 'click', function (e) { if (e.target === dlg) { dlg.close ? dlg.close() : dlg.removeAttribute('open'); } });
            $$('[data-dialog-close]', dlg).forEach(function (c) {
                on(c, 'click', function () { dlg.close ? dlg.close() : dlg.removeAttribute('open'); });
            });
        });
    })();

    /* ------------------------------------------------------------------ Gold sparks (hero) */
    (function sparks() {
        var wrap = $('[data-sparks]');
        if (!wrap || reduceMotion) { return; }
        var n = W.innerWidth < 700 ? 10 : 22;
        for (var i = 0; i < n; i++) {
            var s = D.createElement('i');
            var size = 2 + Math.random() * 4;
            s.style.left = (Math.random() * 100).toFixed(1) + '%';
            s.style.width = s.style.height = size.toFixed(1) + 'px';
            s.style.animationDuration = (9 + Math.random() * 12).toFixed(1) + 's';
            s.style.animationDelay = (-Math.random() * 14).toFixed(1) + 's';
            wrap.appendChild(s);
        }
    })();

    /* ------------------------------------------------------------------ Hero parallax */
    (function parallax() {
        var img = $('.uh-hero__bg img');
        if (!img || reduceMotion) { return; }
        var ticking = false;
        function update() {
            var y = W.pageYOffset || root.scrollTop;
            if (y < 900) { img.style.setProperty('--py', (y * 0.1).toFixed(1) + 'px'); }
            ticking = false;
        }
        on(W, 'scroll', function () {
            if (!ticking) { ticking = true; W.requestAnimationFrame(update); }
        }, { passive: true });
    })();

    /* ------------------------------------------------------------------ AI Chat */
    var chats = [];

    function findAnswer(q) {
        var t = ' ' + norm(q) + ' ';
        var best = null;
        var score = 0;
        (UH.faq || []).forEach(function (f) {
            var s = 0;
            (f.k || []).forEach(function (k) {
                var n = norm(k);
                if (!n) { return; }
                var hit = n.length <= 3 ? t.indexOf(' ' + n + ' ') > -1 : t.indexOf(n) > -1;
                if (hit) { s += n.length > 3 ? 2 : 1; }
            });
            if (s > score) { score = s; best = f; }
        });
        return score > 0 ? best : null;
    }

    function Chat(el) {
        var self = this;
        self.el = el;
        self.mode = el.getAttribute('data-chat');
        self.log = $('[data-chat-log]', el);
        self.form = $('[data-chat-form]', el);
        self.input = $('[data-chat-input]', el);
        self.busy = false;
        self.started = false;
        on(self.form, 'submit', function (e) {
            e.preventDefault();
            var v = (self.input.value || '').trim();
            if (v) { self.input.value = ''; self.ask(v); }
        });
        if (self.mode === 'page') { self.start(); }
    }
    Chat.prototype.start = function () {
        if (this.started) { return; }
        this.started = true;
        this.say((UH.chat && UH.chat.greeting) || "Assalamu'alaikum! Ada yang bisa kami bantu?", 'bot');
    };
    Chat.prototype.say = function (text, who, link) {
        var m = D.createElement('div');
        m.className = 'uh-msg uh-msg--' + who;
        var p = D.createElement('p');
        p.textContent = text;
        m.appendChild(p);
        if (link && link.u) {
            var a = D.createElement('a');
            a.className = 'uh-msg__link';
            a.href = link.u;
            a.textContent = link.t + ' \u2192';
            if (link.ext) { a.target = '_blank'; a.rel = 'noopener'; }
            m.appendChild(a);
        }
        this.log.appendChild(m);
        this.log.scrollTop = this.log.scrollHeight;
    };
    Chat.prototype.ask = function (text) {
        var self = this;
        if (self.busy) { return; }
        self.start();
        self.say(text, 'user');
        self.busy = true;
        var typing = D.createElement('div');
        typing.className = 'uh-msg uh-msg--bot uh-msg--typing';
        typing.innerHTML = '<span></span><span></span><span></span>';
        self.log.appendChild(typing);
        self.log.scrollTop = self.log.scrollHeight;

        var t = norm(text);
        var reply;
        var link = null;
        if (/^(assalamu|assalam|salam|halo|hai|hi|selamat)\b/.test(t)) {
            reply = "Wa'alaikumussalam warahmatullahi wabarakatuh. Ada yang bisa kami bantu seputar paket Umrah & Haji?";
        } else if (/\b(terima kasih|makasih|thanks|jazakallah)\b/.test(t)) {
            reply = 'Sama-sama. Semoga Allah mudahkan perjalanan ibadah Anda.';
        } else {
            var f = findAnswer(text);
            if (f) { reply = f.a; link = f.l ? { u: f.l.u, t: f.l.t } : null; }
            else { reply = (UH.chat && UH.chat.fallback) || 'Silakan hubungi tim kami melalui WhatsApp.'; link = { u: UH.wa, t: 'Chat WhatsApp', ext: true }; }
        }
        setTimeout(function () {
            if (typing.parentNode) { typing.parentNode.removeChild(typing); }
            self.say(reply, 'bot', link);
            self.busy = false;
        }, reduceMotion ? 0 : 650);
    };
    Chat.prototype.open = function () {
        var self = this;
        if (self.mode === 'page') {
            self.start();
            self.el.scrollIntoView({ behavior: reduceMotion ? 'auto' : 'smooth', block: 'center' });
            if (self.input) { self.input.focus({ preventScroll: true }); }
            return;
        }
        closeMenu();
        self.start();
        self.el.hidden = false;
        W.requestAnimationFrame(function () { self.el.classList.add('is-open'); });
        D.body.classList.add('uh-chat-open');
        setTimeout(function () { if (self.input) { self.input.focus({ preventScroll: true }); } }, 200);
    };
    Chat.prototype.close = function () {
        var self = this;
        if (self.mode === 'page' || self.el.hidden) { return; }
        self.el.classList.remove('is-open');
        D.body.classList.remove('uh-chat-open');
        setTimeout(function () { self.el.hidden = true; }, 220);
    };

    $$('[data-chat]').forEach(function (el) { chats.push(new Chat(el)); });

    function activeChat() {
        var page = chats.filter(function (c) { return c.mode === 'page'; })[0];
        return page || chats[0] || null;
    }
    $$('[data-chat-open]').forEach(function (b) {
        on(b, 'click', function () { var c = activeChat(); if (c) { c.open(); } });
    });
    $$('[data-chat-close]').forEach(function (b) {
        on(b, 'click', function () { chats.forEach(function (c) { c.close(); }); });
    });
    $$('[data-chat-ask]').forEach(function (b) {
        on(b, 'click', function () {
            var c = chats.filter(function (x) { return x.el.contains(b); })[0] || activeChat();
            if (!c) { return; }
            if (!c.el.contains(b)) { c.open(); }
            setTimeout(function () { c.ask(b.getAttribute('data-chat-ask')); }, c.el.contains(b) ? 0 : 260);
        });
    });

    /* ------------------------------------------------------------------ Global keys */
    on(D, 'keydown', function (e) {
        if (e.key !== 'Escape') { return; }
        closeSearch();
        closeMenu();
        chats.forEach(function (c) { c.close(); });
    });
})();
