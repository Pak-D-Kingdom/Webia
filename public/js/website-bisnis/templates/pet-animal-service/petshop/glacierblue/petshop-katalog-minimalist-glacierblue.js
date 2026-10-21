document.addEventListener('DOMContentLoaded', () => {
    const config = window.PAWMART_CONFIG || {};
    const whatsappNumber = config.whatsappNumber || '6285850180285';
    const cards = [...document.querySelectorAll('.catalog-product')];
    const searchInput = document.getElementById('productSearch');
    const categorySelect = document.getElementById('categoryFilter');
    const sortSelect = document.getElementById('sortFilter');
    const grid = document.getElementById('catalogGrid');
    const empty = document.getElementById('catalogEmpty');
    const count = document.getElementById('productCount');
    const chips = [...document.querySelectorAll('#categoryChips button')];

    let activeCategory = 'all';

    function openWhatsApp(message) {
        window.open(
            `https://wa.me/${whatsappNumber}?text=${encodeURIComponent(message)}`,
            '_blank',
            'noopener,noreferrer'
        );
    }

    function applyFilters() {
        const keyword = (searchInput?.value || '').trim().toLowerCase();
        const category = categorySelect?.value || activeCategory;
        const sort = sortSelect?.value || 'featured';

        const visibleCards = cards.filter(card => {
            const name = (card.dataset.name || '').toLowerCase();
            const description = (card.querySelector('.catalog-product-info p')?.textContent || '').toLowerCase();
            const matchesKeyword = `${name} ${description}`.includes(keyword);
            const matchesCategory = category === 'all' || card.dataset.category === category;

            card.hidden = !(matchesKeyword && matchesCategory);
            return matchesKeyword && matchesCategory;
        });

        visibleCards.sort((a, b) => {
            const priceA = Number(a.dataset.price || 0);
            const priceB = Number(b.dataset.price || 0);

            if (sort === 'low') return priceA - priceB;
            if (sort === 'high') return priceB - priceA;
            if (sort === 'name') return a.dataset.name.localeCompare(b.dataset.name, 'id');
            return Number(a.dataset.order || 0) - Number(b.dataset.order || 0);
        });

        visibleCards.forEach(card => grid.appendChild(card));

        if (count) {
            count.textContent = `Menampilkan ${visibleCards.length} dari ${cards.length} produk.`;
        }

        if (empty) empty.hidden = visibleCards.length !== 0;

        chips.forEach(chip => {
            chip.classList.toggle('active', chip.dataset.category === category);
        });
    }

    searchInput?.addEventListener('input', applyFilters);
    categorySelect?.addEventListener('change', () => {
        activeCategory = categorySelect.value;
        applyFilters();
    });
    sortSelect?.addEventListener('change', applyFilters);

    chips.forEach(chip => {
        chip.addEventListener('click', () => {
            activeCategory = chip.dataset.category || 'all';
            if (categorySelect) categorySelect.value = activeCategory;
            applyFilters();
        });
    });

    document.querySelectorAll('.catalog-order').forEach(button => {
        button.addEventListener('click', () => {
            const product = button.dataset.product || 'Produk PawMart';
            const price = Number(button.dataset.price || 0);
            const formattedPrice = new Intl.NumberFormat('id-ID', {
                style: 'currency',
                currency: 'IDR',
                maximumFractionDigits: 0
            }).format(price);

            openWhatsApp(
                `Halo PawMart! 🐾 Saya tertarik memesan:\n\n` +
                `Produk: ${product}\nHarga yang tertera: ${formattedPrice}\nJumlah: 1\n\n` +
                `Apakah produk ini tersedia? Mohon informasi cara pemesanannya.`
            );
        });
    });

    const askAdmin = () => openWhatsApp(
        'Halo PawMart! 🐾 Saya ingin bertanya tentang produk, ketersediaan stok, dan cara pemesanan. Bisa dibantu?'
    );

    document.getElementById('catalogHelp')?.addEventListener('click', event => {
        event.preventDefault();
        askAdmin();
    });

    document.getElementById('catalogHelpBottom')?.addEventListener('click', askAdmin);

    const urlCategory = new URLSearchParams(window.location.search).get('kategori');
    const allowedCategories = ['makanan', 'camilan', 'aksesoris', 'perawatan', 'perlengkapan'];

    if (urlCategory && allowedCategories.includes(urlCategory)) {
        activeCategory = urlCategory;
        if (categorySelect) categorySelect.value = urlCategory;
    }

    applyFilters();
});