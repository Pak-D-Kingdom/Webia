
document.addEventListener('DOMContentLoaded', () => {
    // Mobile navigation
    const menuToggle = document.getElementById('menuToggle');
    const mainNav = document.getElementById('mainNav');

    const closeMenu = () => {
        if (!menuToggle || !mainNav) return;

        menuToggle.setAttribute('aria-expanded', 'false');
        mainNav.classList.remove('is-open');
        document.body.classList.remove('menu-open');
    };

    if (menuToggle && mainNav) {
        menuToggle.addEventListener('click', () => {
            const isOpen =
                menuToggle.getAttribute('aria-expanded') === 'true';

            menuToggle.setAttribute(
                'aria-expanded',
                String(!isOpen)
            );

            mainNav.classList.toggle('is-open', !isOpen);
            document.body.classList.toggle('menu-open', !isOpen);
        });

        mainNav.querySelectorAll('a').forEach(link => {
            link.addEventListener('click', closeMenu);
        });

        document.addEventListener('keydown', event => {
            if (event.key === 'Escape') closeMenu();
        });

        window.addEventListener('resize', () => {
            if (window.innerWidth > 820) closeMenu();
        });
    }

    // Catalog search and category filter
    const searchInput = document.getElementById('catalogSearch');
    const categoryFilter = document.getElementById('catalogFilter');

    const catalogItems = document.querySelectorAll('.catalog-item');
    const emptyState = document.getElementById('catalogEmpty');

    const filterCatalog = () => {
        if (!catalogItems.length) return;

        const keyword = searchInput
            ? searchInput.value.trim().toLowerCase()
            : '';

        const category = categoryFilter
            ? categoryFilter.value
            : 'all';

        let visibleCount = 0;

        catalogItems.forEach(item => {
            const searchText = item.dataset.search || '';
            const itemCategory = item.dataset.category || '';

            const matchesKeyword = searchText.includes(keyword);
            const matchesCategory =
                category === 'all' || itemCategory === category;

            const visible = matchesKeyword && matchesCategory;

            item.hidden = !visible;

            if (visible) visibleCount++;
        });

        if (emptyState) {
            emptyState.hidden = visibleCount !== 0;
        }
    };

    searchInput?.addEventListener('input', filterCatalog);
    categoryFilter?.addEventListener('change', filterCatalog);

    // Prevent selecting a date in the past
    const appointmentDate = document.getElementById('appointmentDate');

    if (appointmentDate) {
        const today = new Date();
        const localToday = [
            today.getFullYear(),
            String(today.getMonth() + 1).padStart(2, '0'),
            String(today.getDate()).padStart(2, '0')
        ].join('-');

        appointmentDate.min = localToday;
    }

    // Scroll reveal animation
    const revealElements = document.querySelectorAll(
        '.beauty-card, .story-content, .product-feature, ' +
        '.booking-banner-inner, .detail-content'
    );

    if ('IntersectionObserver' in window) {
        const observer = new IntersectionObserver(entries => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('is-visible');
                    observer.unobserve(entry.target);
                }
            });
        }, {
            threshold: 0.12
        });

        revealElements.forEach(element => {
            element.classList.add('reveal');
            observer.observe(element);
        });
    } else {
        revealElements.forEach(element => {
            element.classList.add('is-visible');
        });
    }
});
