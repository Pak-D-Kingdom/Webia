(function () {
    'use strict';

    var doc = document;
    var reduceMotion = window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches;
    var menu = doc.querySelector('[data-menu]');
    var nav = doc.querySelector('[data-nav]');
    var header = doc.querySelector('[data-header]');

    function each(selector, callback) {
        Array.prototype.forEach.call(doc.querySelectorAll(selector), callback);
    }

    if (header) {
        var updateHeader = function () {
            header.classList.toggle('is-scrolled', window.scrollY > 24);
        };
        window.addEventListener('scroll', updateHeader, { passive: true });
        updateHeader();
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

    if ('IntersectionObserver' in window && !reduceMotion) {
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

    each('[data-consultation-form]', function (form) {
        form.addEventListener('submit', function (event) {
            event.preventDefault();
            var message = form.querySelector('[data-consultation-message]');
            if (message) { message.textContent = 'Thank you. An Atelier Move concierge will contact you privately.'; }
            form.reset();
        });
    });
}());
