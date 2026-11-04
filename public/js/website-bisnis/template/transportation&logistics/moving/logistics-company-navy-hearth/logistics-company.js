(function () {
    'use strict';

    var doc = document;
    var prefersReducedMotion = window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches;
    var menu = doc.querySelector('[data-menu]');
    var nav = doc.querySelector('[data-nav]');

    function each(selector, callback) {
        Array.prototype.forEach.call(doc.querySelectorAll(selector), callback);
    }

    if (menu && nav) {
        menu.addEventListener('click', function () {
            var open = nav.classList.toggle('is-open');
            menu.setAttribute('aria-expanded', open ? 'true' : 'false');
        });
        each('[data-nav] a', function (link) {
            link.addEventListener('click', function () {
                nav.classList.remove('is-open');
                menu.setAttribute('aria-expanded', 'false');
            });
        });
    }

    if ('IntersectionObserver' in window && !prefersReducedMotion) {
        var observer = new IntersectionObserver(function (entries, instance) {
            entries.forEach(function (entry) {
                if (entry.isIntersecting) {
                    entry.target.classList.add('is-visible');
                    instance.unobserve(entry.target);
                }
            });
        }, { threshold: .12 });
        each('[data-reveal]', function (element) { observer.observe(element); });
    } else {
        each('[data-reveal]', function (element) { element.classList.add('is-visible'); });
    }

    each('[data-quote-form]', function (form) {
        form.addEventListener('submit', function (event) {
            event.preventDefault();
            var message = form.querySelector('[data-quote-message]');
            if (message) { message.textContent = 'Your request is received. Our moving advisor will call within one business day.'; }
            form.reset();
        });
    });
}());
