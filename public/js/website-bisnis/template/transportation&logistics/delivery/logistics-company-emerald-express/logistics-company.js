(function () {
    'use strict';

    var doc = document;
    var reduceMotion = window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches;

    function each(selector, callback) {
        Array.prototype.forEach.call(doc.querySelectorAll(selector), callback);
    }

    var header = doc.querySelector('[data-header]');
    var menu = doc.querySelector('[data-menu]');
    var nav = doc.querySelector('[data-nav]');

    if (header) {
        var onScroll = function () { header.classList.toggle('is-stuck', window.scrollY > 8); };
        onScroll();
        window.addEventListener('scroll', onScroll, { passive: true });
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

    var reveal = function (entries, observer) {
        entries.forEach(function (entry) {
            if (entry.isIntersecting) {
                entry.target.classList.add('is-visible');
                observer.unobserve(entry.target);
            }
        });
    };

    if ('IntersectionObserver' in window && !reduceMotion) {
        var observer = new IntersectionObserver(reveal, { threshold: .12 });
        each('[data-reveal]', function (element) { observer.observe(element); });
    } else {
        each('[data-reveal]', function (element) { element.classList.add('is-visible'); });
    }

    var trackForm = doc.querySelector('[data-track-form]');
    if (trackForm) {
        trackForm.addEventListener('submit', function (event) {
            event.preventDefault();
            var input = trackForm.querySelector('input');
            var message = trackForm.querySelector('[data-track-message]');
            var number = input.value.trim().toUpperCase();
            message.textContent = number ? 'Shipment ' + number + ' is in transit — arriving today by 18:00.' : 'Enter a tracking number to continue.';
            if (number) { trackForm.querySelector('.swift-track__line span:nth-child(2)').classList.add('is-active'); }
        });
    }

    each('[data-quote-form]', function (form) {
        form.addEventListener('submit', function (event) {
            event.preventDefault();
            var message = form.querySelector('[data-quote-message]');
            if (message) { message.textContent = 'Thanks — a Swiftly advisor will be in touch shortly.'; }
            form.reset();
        });
    });
}());
