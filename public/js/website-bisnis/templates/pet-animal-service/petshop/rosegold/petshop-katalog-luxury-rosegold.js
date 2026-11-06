document.addEventListener('DOMContentLoaded', () => {
    const config = window.FURRY_CONFIG || {};
    const whatsappNumber = config.whatsappNumber || '6285850180285';

    const grid = document.getElementById('fckProductGrid');
    const cards = [...document.querySelectorAll('.fck-product-card')];
    const search = document.getElementById('fckSearch');
    const categorySelect = document.getElementById('fckCategory');
    const sortSelect = document.getElementById('fckSort');
    const count = document.getElementById('fckCount');
    const empty = document.getElementById('fckEmpty');
    const tabs = [...document.querySelectorAll('#fckCategoryTabs button')];

    let activeCategory = 'all';

    function openWhatsApp(message) {
        const url = `https://wa.me/${whatsappNumber}?text=${encodeURIComponent(message)}`;
        window.open(url, '_blank', 'noopener,noreferrer');
    }

    function rupiah(value) {
        return new Intl.NumberFormat('id-ID', {
            style: 'currency',
            currency: 'IDR',
            maximumFractionDigits: 0
        }).format(value);
    }

    function applyFilters() {
        const keyword = (search?.value || '').trim().toLowerCase();
        const category = categorySelect?.value || activeCategory;
        const sort = sortSelect?.value || 'featured';

        const visibleCards = cards.filter(card => {
            const name = (card.dataset.name || '').toLowerCase();
            const description = (
                card.querySelector('.fck-product-info > p')?.textContent || ''
            ).toLowerCase();

            const matchesSearch = `${name} ${description}`.includes(keyword);
            const matchesCategory =
                category === 'all' || card.dataset.category === category;

            card.hidden = !(matchesSearch && matchesCategory);

            return matchesSearch && matchesCategory;
        });

        visibleCards.sort((a, b) => {
            const priceA = Number(a.dataset.price || 0);
            const priceB = Number(b.dataset.price || 0);

            if (sort === 'low') return priceA - priceB;
            if (sort === 'high') return priceB - priceA;

            if (sort === 'name') {
                return (a.dataset.name || '').localeCompare(
                    b.dataset.name || '',
                    'id'
                );
            }

            return Number(a.dataset.order || 0) -
                Number(b.dataset.order || 0);
        });

        visibleCards.forEach(card => grid.appendChild(card));

        if (count) {
            count.textContent =
                `${visibleCards.length} curated piece(s) to discover`;
        }

        if (empty) {
            empty.hidden = visibleCards.length > 0;
        }

        tabs.forEach(tab => {
            tab.classList.toggle(
                'active',
                tab.dataset.category === category
            );
        });
    }

    search?.addEventListener('input', applyFilters);

    categorySelect?.addEventListener('change', () => {
        activeCategory = categorySelect.value;
        applyFilters();
    });

    sortSelect?.addEventListener('change', applyFilters);

    tabs.forEach(tab => {
        tab.addEventListener('click', () => {
            activeCategory = tab.dataset.category || 'all';

            if (categorySelect) {
                categorySelect.value = activeCategory;
            }

            applyFilters();
        });
    });



    function contactConcierge() {
        openWhatsApp([
            'Hello Furry & Co. 💗',
            '',
            'I would love some assistance with your pet boutique collection.',
            'Could you help me with product recommendations, availability, and current prices?'
        ].join('\n'));
    }

    document.getElementById('fckContact')
        ?.addEventListener('click', contactConcierge);

    document.getElementById('fckConciergeButton')
        ?.addEventListener('click', contactConcierge);

    document.getElementById('fckFooterContact')
        ?.addEventListener('click', event => {
            event.preventDefault();
            contactConcierge();
        });

    const params = new URLSearchParams(window.location.search);
    const requestedCategory = params.get('kategori');

    const allowedCategories = [
        'makanan',
        'camilan',
        'aksesoris',
        'perawatan',
        'perlengkapan'
    ];

    if (requestedCategory && allowedCategories.includes(requestedCategory)) {
        activeCategory = requestedCategory;

        if (categorySelect) {
            categorySelect.value = requestedCategory;
        }
    }

    applyFilters();
});
