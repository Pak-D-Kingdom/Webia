/* WEBIA — Galaxy FX. Hanya efek visual; tidak mengubah teks, data, atau struktur halaman. */
(function () {
    'use strict';
    var reduce = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
    var fine = window.matchMedia('(hover: hover) and (pointer: fine)').matches;
    var doc = document, root = doc.documentElement;
 
    function el(tag, cls) { var e = doc.createElement(tag); if (cls) e.className = cls; return e; }
 
    function init() {
        /* ---------- Bintang + bintang jatuh ---------- */
        var c = el('canvas'); c.id = 'gx-stars'; c.setAttribute('aria-hidden', 'true');
        doc.body.prepend(c);
        var aur = el('div', 'gx-aurora'); aur.setAttribute('aria-hidden', 'true'); doc.body.prepend(aur);
        var x = c.getContext('2d'), W, H, stars = [], shoot = [], mx = 0, my = 0, tick = 0;
        var colors = ['#ffffff', '#9be9ff', '#ffc2e0', '#ffe2a8', '#c9b8ff'];
 
        function size() {
            var dpr = Math.min(window.devicePixelRatio || 1, 2);
            W = window.innerWidth; H = window.innerHeight;
            c.width = W * dpr; c.height = H * dpr; x.setTransform(dpr, 0, 0, dpr, 0, 0);
            stars = [];
            var n = Math.min(240, Math.round(W / 6));
            for (var i = 0; i < n; i++) {
                stars.push({ x: Math.random() * W, y: Math.random() * H, z: Math.random() * 2 + .3,
                    t: Math.random() * 6, c: colors[i % colors.length] });
            }
        }
        size(); window.addEventListener('resize', size);
        window.addEventListener('pointermove', function (e) { mx = e.clientX / W - .5; my = e.clientY / H - .5; }, { passive: true });
 
        function frame() {
            if (doc.hidden) { requestAnimationFrame(frame); return; }
            x.clearRect(0, 0, W, H);
            var sy = window.scrollY;
            for (var i = 0; i < stars.length; i++) {
                var s = stars[i];
                if (!reduce) { s.t += .03; s.x += .05 * s.z; if (s.x > W + 5) s.x = -5; }
                x.globalAlpha = .45 + Math.sin(s.t) * .4;
                x.fillStyle = s.c;
                var py = (((s.y - my * s.z * 28 - sy * .05 * s.z) % H) + H) % H;
                x.beginPath(); x.arc(s.x - mx * s.z * 28, py, s.z * .95, 0, 6.3); x.fill();
            }
            if (!reduce) {
                if (Math.random() < .012) shoot.push({ x: Math.random() * W * .8, y: Math.random() * H * .45, l: 0 });
                shoot = shoot.filter(function (m) {
                    m.l++; m.x += 13; m.y += 6.5;
                    var g = x.createLinearGradient(m.x, m.y, m.x - 130, m.y - 65);
                    g.addColorStop(0, 'rgba(255,255,255,.95)'); g.addColorStop(1, 'rgba(45,212,245,0)');
                    x.globalAlpha = 1; x.strokeStyle = g; x.lineWidth = 2;
                    x.beginPath(); x.moveTo(m.x, m.y); x.lineTo(m.x - 130, m.y - 65); x.stroke();
                    return m.l < 70;
                });
            }
            requestAnimationFrame(frame);
        }
        frame();
 
        /* ---------- Progress scroll + header ---------- */
        var bar = el('div', 'gx-progress'); bar.setAttribute('aria-hidden', 'true'); doc.body.appendChild(bar);
        var header = doc.querySelector('.webia-header');
        function onScroll() {
            var h = root.scrollHeight - window.innerHeight;
            bar.style.transform = 'scaleX(' + (h > 0 ? window.scrollY / h : 0) + ')';
            if (header) header.classList.toggle('gx-scrolled', window.scrollY > 30);
        }
        window.addEventListener('scroll', onScroll, { passive: true }); onScroll();
 
        /* ---------- Reveal saat scroll ---------- */
        var targets = '.website-section-heading,.webia-discovery-heading,.webia-gallery-heading,.website-benefit-card,.website-package-card,' +
            '.website-process-grid article,.website-addon-list article,.webia-category-card,.webia-template-card,.website-faq-list details,.website-package-note,' +
            '.website-final-cta-inner,.webia-discovery-footer,.webia-gallery-cta,.website-addons-copy';
        if (!reduce && 'IntersectionObserver' in window) {
            var io = new IntersectionObserver(function (es) {
                es.forEach(function (e) { if (e.isIntersecting) { e.target.classList.add('gx-in'); io.unobserve(e.target); } });
            }, { threshold: .12, rootMargin: '0px 0px -40px 0px' });
            var seen = new WeakSet();
            var observe = function () {
                doc.querySelectorAll(targets).forEach(function (n, i) {
                    if (seen.has(n)) return; seen.add(n);
                    var r = n.getBoundingClientRect();
                    if (r.top < window.innerHeight && r.bottom > 0) return; // sudah terlihat: biarkan
                    n.classList.add('gx-rv'); n.style.transitionDelay = (i % 4) * 80 + 'ms'; io.observe(n);
                });
            };
            observe();
            // kartu yang dirender/difilter JS (galeri template) ikut dapat efek
            var grid = doc.getElementById('webia-gallery-grid');
            if (grid && 'MutationObserver' in window) new MutationObserver(observe).observe(grid, { childList: true });
        }
 
        /* ---------- Spotlight + tilt kartu ---------- */
        var cards = '.website-benefit-card,.website-package-card,.website-process-grid article,.website-addon-list article,.webia-template-card,.webia-category-card';
        doc.querySelectorAll(cards).forEach(function (cd) { if (!cd.classList.contains('webia-category-card')) cd.classList.add('gx-spot'); });
        if (fine) {
            doc.addEventListener('pointermove', function (e) {
                var cd = e.target.closest && e.target.closest(cards);
                if (!cd) return;
                var r = cd.getBoundingClientRect(), px = (e.clientX - r.left) / r.width, py = (e.clientY - r.top) / r.height;
                cd.style.setProperty('--gx-mx', px * 100 + '%'); cd.style.setProperty('--gx-my', py * 100 + '%');
                if (!reduce) cd.style.transform = 'perspective(800px) rotateX(' + ((.5 - py) * 6) + 'deg) rotateY(' + ((px - .5) * 8) + 'deg) translateY(-4px)';
            }, { passive: true });
            doc.addEventListener('pointerout', function (e) {
                var cd = e.target.closest && e.target.closest(cards);
                if (cd && !cd.contains(e.relatedTarget)) cd.style.transform = '';
            });
        }
 
        /* ---------- Parallax hero ---------- */
        var hero = doc.querySelector('.website-hero-visual');
        if (hero && fine && !reduce) {
            window.addEventListener('pointermove', function () {
                hero.style.transform = 'translate(' + (mx * -16) + 'px,' + (my * -16) + 'px)';
            }, { passive: true });
        }
 
        /* ---------- Kursor galaksi ---------- */
        if (fine) {
            var dot = el('div', 'gx-dot gx-hide'), ring = el('div', 'gx-ring gx-hide');
            dot.setAttribute('aria-hidden', 'true'); ring.setAttribute('aria-hidden', 'true');
            var fx = el('div'); fx.id = 'gx-fx'; fx.setAttribute('aria-hidden', 'true');
            var hasPop = typeof fx.showPopover === 'function';
            if (hasPop) fx.setAttribute('popover', 'manual');
            fx.appendChild(ring); fx.appendChild(dot); doc.body.appendChild(fx);
            function topLayer() {
                if (!hasPop) return;
                try { if (fx.matches(':popover-open')) fx.hidePopover(); fx.showPopover(); } catch (err) {}
            }
            topLayer();
            // saat dialog (showModal) dibuka, tampilkan ulang kursor agar berada di atasnya
            new MutationObserver(function (list) {
                for (var k = 0; k < list.length; k++) {
                    var t = list[k].target;
                    if (t.tagName === 'DIALOG' && t.hasAttribute('open')) { topLayer(); break; }
                }
            }).observe(doc.body, { subtree: true, attributes: true, attributeFilter: ['open'] });
            root.classList.add('gx-cursor');
            var tx = 0, ty = 0, rx = 0, ry = 0, lastSpark = 0, sparkCols = ['#2dd4f5', '#ff5caa', '#ffb84d', '#c9b8ff', '#ffffff'];
            var interactive = 'a,button,summary,.website-package-detail,label[for],[role="button"],[data-cart-add],[data-template-add],.webia-category-card,.webia-template-card,.webia-filter-chip,select';
 
            function spark(px, py, burst) {
                var s = el('span', 'gx-spark'); s.textContent = Math.random() > .5 ? '✦' : '✧';
                s.style.color = sparkCols[(Math.random() * sparkCols.length) | 0];
                s.style.left = px + 'px'; s.style.top = py + 'px';
                var a = Math.random() * 6.28, d = burst ? 40 + Math.random() * 50 : 12 + Math.random() * 22;
                s.style.setProperty('--dx', Math.cos(a) * d + 'px'); s.style.setProperty('--dy', Math.sin(a) * d + 'px');
                s.style.fontSize = (burst ? 12 + Math.random() * 12 : 8 + Math.random() * 8) + 'px';
                fx.appendChild(s); setTimeout(function () { s.remove(); }, 950);
            }
 
            window.addEventListener('pointermove', function (e) {
                if (e.pointerType && e.pointerType !== 'mouse') return;
                tx = e.clientX; ty = e.clientY;
                dot.style.transform = 'translate(' + tx + 'px,' + ty + 'px)';
                dot.classList.remove('gx-hide'); ring.classList.remove('gx-hide');
                var t = e.target, over = t.closest && t.closest(interactive);
                var onField = t.closest && t.closest('input,textarea,[contenteditable]');
                var onFrame = t.tagName === 'IFRAME';
                ring.classList.toggle('is-hover', !!over && !onField);
                dot.classList.toggle('is-hover', !!over && !onField);
                if (onField || onFrame) { dot.classList.add('gx-hide'); ring.classList.add('gx-hide'); }
                var now = performance.now();
                if (!reduce && now - lastSpark > 45) { lastSpark = now; spark(tx, ty, false); }
            }, { passive: true });
            doc.addEventListener('pointerdown', function (e) {
                ring.classList.add('is-down');
                if (!reduce) for (var i = 0; i < 12; i++) spark(e.clientX, e.clientY, true);
            });
            doc.addEventListener('pointerup', function () { ring.classList.remove('is-down'); });
            doc.addEventListener('mouseleave', function () { dot.classList.add('gx-hide'); ring.classList.add('gx-hide'); });
            (function follow() {
                rx += (tx - rx) * .16; ry += (ty - ry) * .16;
                ring.style.transform = 'translate(' + rx + 'px,' + ry + 'px)';
                requestAnimationFrame(follow);
            })();
        }
    }
 
    if (doc.readyState === 'loading') doc.addEventListener('DOMContentLoaded', init); else init();
})();