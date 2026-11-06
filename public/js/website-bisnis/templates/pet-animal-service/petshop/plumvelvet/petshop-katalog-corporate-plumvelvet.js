
document.addEventListener('DOMContentLoaded', () => {
    const searchInput = document.getElementById('pbcSearch');
    const sortSelect = document.getElementById('pbcSort');
    const productGrid = document.getElementById('pbcProductGrid');
    const resultCount = document.getElementById('pbcResultCount');
    const emptyState = document.getElementById('pbcEmpty');

    if (!productGrid) return;

    const products = Array.from(
        productGrid.querySelectorAll('.pbc-product-card')
    );

    const config = window.PETBASE_CONFIG || {};
    const phone = String(config.whatsappNumber || '').replace(/\D/g, '');

    function getSelectedCategory() {
        return document.querySelector(
            'input[name="pbcCategory"]:checked'
        )?.value || 'all';
    }

    function formatRupiah(amount) {
        return new Intl.NumberFormat('id-ID', {
            style: 'currency',
            currency: 'IDR',
            maximumFractionDigits: 0
        }).format(amount);
    }

    function applyFilters() {
        const keyword = (searchInput?.value || '')
            .trim()
            .toLowerCase();

        const category = getSelectedCategory();
        const sortBy = sortSelect?.value || 'featured';

        const filtered = products.filter((product) => {
            const name = product.dataset.name?.toLowerCase() || '';
            const brand = product.dataset.brand?.toLowerCase() || '';
            const description =
                product.querySelector('.pbc-spec')?.textContent.toLowerCase() || '';

            const matchesKeyword =
                name.includes(keyword) ||
                brand.includes(keyword) ||
                description.includes(keyword);

            const matchesCategory =
                category === 'all' ||
                product.dataset.category === category;

            return matchesKeyword && matchesCategory;
        });

        if (sortBy === 'price-asc') {
            filtered.sort((a, b) =>
                Number(a.dataset.price) - Number(b.dataset.price)
            );
        } else if (sortBy === 'price-desc') {
            filtered.sort((a, b) =>
                Number(b.dataset.price) - Number(a.dataset.price)
            );
        } else if (sortBy === 'name') {
            filtered.sort((a, b) =>
                a.dataset.name.localeCompare(b.dataset.name, 'id')
            );
        } else {
            filtered.sort((a, b) =>
                products.indexOf(a) - products.indexOf(b)
            );
        }

        products.forEach((product) => {
            product.hidden = true;
        });

        filtered.forEach((product) => {
            product.hidden = false;
            productGrid.appendChild(product);
        });

        if (resultCount) {
            resultCount.textContent = `${filtered.length} products`;
        }

        if (emptyState) {
            emptyState.hidden = filtered.length !== 0;
        }
    }

    searchInput?.addEventListener('input', applyFilters);
    sortSelect?.addEventListener('change', applyFilters);

    document.querySelectorAll('input[name="pbcCategory"]')
        .forEach((input) => {
            input.addEventListener('change', applyFilters);
        });

    document.getElementById('pbcReset')?.addEventListener('click', () => {
        if (searchInput) searchInput.value = '';

        const allCategory = document.querySelector(
            'input[name="pbcCategory"][value="all"]'
        );

        if (allCategory) allCategory.checked = true;
        if (sortSelect) sortSelect.value = 'featured';

        applyFilters();
    });

    function openWhatsApp(message) {
        if (!phone) {
            alert('Nomor WhatsApp PetBase belum dikonfigurasi.');
            return;
        }

        window.open(
            `https://wa.me/${phone}?text=${encodeURIComponent(message)}`,
            '_blank',
            'noopener,noreferrer'
        );
    }

    document.getElementById('pbcBulkOrder')
        ?.addEventListener('click', () => {
            openWhatsApp(
                'Hello PetBase! I would like to ask about wholesale or bulk orders. Please share the available products, minimum order requirements, and pricing.'
            );
        });

    document.getElementById('pbcContact')
        ?.addEventListener('click', () => {
            openWhatsApp(
                'Hello PetBase! I would like to ask about your products, prices, and stock availability.'
            );
        });

    // Filter kategori dari URL, misalnya ?category=food
    const requestedCategory = new URLSearchParams(window.location.search)
        .get('category');

    if (requestedCategory) {
        const categoryInput = document.querySelector(
            `input[name="pbcCategory"][value="${CSS.escape(requestedCategory)}"]`
        );

        if (categoryInput) categoryInput.checked = true;
    }

    applyFilters();
});
