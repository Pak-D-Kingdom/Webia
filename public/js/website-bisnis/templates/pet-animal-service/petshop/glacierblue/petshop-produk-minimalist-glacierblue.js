document.addEventListener('DOMContentLoaded', () => {
    const config = window.PAWMART_CONFIG || {};
    const whatsappNumber = config.whatsappNumber || '6285850180285';
    const slug = config.productSlug || '';

    const products = {
        'royal-canin-kitten': {
            name: 'Royal Canin Kitten',
            category: 'MAKANAN HEWAN',
            price: 185000,
            image: 'https://images.unsplash.com/photo-1589924691995-400dc9ecc119?auto=format&fit=crop&w=900&q=85',
            badge: 'BEST SELLER',
            description: 'Makanan untuk anak kucing yang dirancang untuk memenuhi kebutuhan nutrisi pada masa pertumbuhan.',
            longDescription: 'Royal Canin Kitten ditampilkan sebagai contoh produk makanan anak kucing pada katalog PawMart. Untuk informasi berat kemasan, komposisi, usia penggunaan, dan ketersediaan varian, silakan konfirmasi kepada admin sebelum memesan.'
        },
        'dog-treats': {
            name: 'Happy Bites Treats',
            category: 'CAMILAN',
            price: 45000,
            image: 'https://images.unsplash.com/photo-1582798358481-d199fb7347bb?auto=format&fit=crop&w=900&q=85',
            badge: 'PET FAVORITE',
            description: 'Camilan untuk menemani waktu bermain dan bonding bersama anjing kesayangan.',
            longDescription: 'Happy Bites Treats merupakan contoh produk camilan pada demo PawMart. Tanyakan bahan, ukuran kemasan, rekomendasi usia, dan ketersediaan stok kepada admin.'
        },
        'soft-pet-bed': {
            name: 'Cloudy Pet Bed',
            category: 'PERLENGKAPAN',
            price: 220000,
            image: 'https://images.unsplash.com/photo-1541599540903-216a46ca1dc0?auto=format&fit=crop&w=900&q=85',
            badge: 'PET COMFORT',
            description: 'Tempat istirahat untuk membantu sahabat berbulu merasa nyaman di rumah.',
            longDescription: 'Cloudy Pet Bed adalah contoh produk tempat tidur hewan di katalog demo. Konfirmasi ukuran, bahan, pilihan warna, dan stok yang tersedia sebelum melakukan pemesanan.'
        },
        'pet-grooming-kit': {
            name: 'Gentle Grooming Kit',
            category: 'PERAWATAN',
            price: 89000,
            image: 'https://images.unsplash.com/photo-1516734212186-a967f81ad0d7?auto=format&fit=crop&w=900&q=85',
            badge: 'DAILY CARE',
            description: 'Contoh perlengkapan untuk membantu rutinitas perawatan hewan peliharaan.',
            longDescription: 'Gentle Grooming Kit merupakan produk demo kategori perawatan. Tanyakan isi paket, bahan, cara penggunaan, dan ketersediaan kepada admin.'
        },
        'playful-rope-toy': {
            name: 'Playful Rope Toy',
            category: 'AKSESORI & MAINAN',
            price: 35000,
            image: 'https://images.unsplash.com/photo-1535294435445-d7249524ef2e?auto=format&fit=crop&w=900&q=85',
            badge: 'PLAY TIME',
            description: 'Contoh mainan untuk menemani waktu bermain bersama hewan kesayangan.',
            longDescription: 'Playful Rope Toy merupakan contoh produk mainan pada katalog demo PawMart. Konfirmasi bahan, ukuran, dan kecocokan untuk hewan peliharaanmu kepada admin.'
        },
        'cozy-pet-bowl': {
            name: 'Cozy Pet Bowl',
            category: 'AKSESORI',
            price: 55000,
            image: 'https://images.unsplash.com/photo-1585837575652-267c041d77d4?auto=format&fit=crop&w=900&q=85',
            badge: 'DAILY ESSENTIAL',
            description: 'Mangkuk untuk menemani waktu makan dan minum hewan kesayangan.',
            longDescription: 'Cozy Pet Bowl adalah contoh produk aksesori pada katalog demo. Tanyakan bahan, ukuran, warna, dan ketersediaan produk sebelum memesan.'
        }
    };

    const product = products[slug];

    const nameEl = document.getElementById('detailName');
    const categoryEl = document.getElementById('detailCategory');
    const priceEl = document.getElementById('detailPrice');
    const imageEl = document.getElementById('detailImage');
    const badgeEl = document.getElementById('detailBadge');
    const descriptionEl = document.getElementById('detailDescription');
    const longDescriptionEl = document.getElementById('detailLongDescription');
    const descriptionProductName = document.getElementById('descriptionProductName');
    const breadcrumbEl = document.getElementById('breadcrumbProduct');
    const quantityInput = document.getElementById('quantityInput');
    const orderButton = document.getElementById('orderButton');
    const stockButton = document.getElementById('stockButton');

    function formatRupiah(value) {
        return new Intl.NumberFormat('id-ID', {
            style: 'currency',
            currency: 'IDR',
            maximumFractionDigits: 0
        }).format(value);
    }

    function openWhatsApp(message) {
        window.open(
            `https://wa.me/${whatsappNumber}?text=${encodeURIComponent(message)}`,
            '_blank',
            'noopener,noreferrer'
        );
    }

    function getQuantity() {
        const value = Number.parseInt(quantityInput?.value || '1', 10);

        if (!Number.isFinite(value)) return 1;

        return Math.min(99, Math.max(1, value));
    }

    function getProductMessage(type) {
        const quantity = getQuantity();

        if (type === 'stock') {
            return [
                'Halo PawMart! 🐾 Saya ingin mengecek ketersediaan produk.',
                '',
                `Produk: ${product.name}`,
                `Jumlah yang dibutuhkan: ${quantity}`,
                '',
                'Mohon informasi stok, varian yang tersedia, dan harga terbaru. Terima kasih!'
            ].join('\n');
        }

        return [
            'Halo PawMart! 🐾 Saya ingin memesan produk berikut:',
            '',
            `Produk: ${product.name}`,
            `Harga yang tertera: ${formatRupiah(product.price)}`,
            `Jumlah: ${quantity}`,
            `Estimasi subtotal berdasarkan harga tertera: ${formatRupiah(product.price * quantity)}`,
            '',
            'Mohon konfirmasi stok, harga terbaru, dan cara pemesanannya ya. Terima kasih!'
        ].join('\n');
    }

    function showUnavailableProduct() {
        document.title = 'Produk Tidak Ditemukan — PawMart';

        nameEl.textContent = 'Produk tidak ditemukan';
        categoryEl.textContent = 'PRODUK TIDAK TERSEDIA';
        priceEl.textContent = 'Silakan hubungi admin';
        descriptionEl.textContent = 'Maaf, produk yang kamu cari belum tersedia pada katalog demo.';
        longDescriptionEl.textContent = 'Silakan kembali ke katalog untuk melihat produk lainnya atau hubungi admin PawMart untuk mendapatkan bantuan.';
        descriptionProductName.textContent = 'produk lainnya.';
        breadcrumbEl.textContent = 'Produk tidak ditemukan';
        imageEl.hidden = true;
        badgeEl.hidden = true;
        document.getElementById('detailStock').innerHTML =
            '<span></span> Silakan tanyakan produk ini kepada admin.';
        orderButton.textContent = 'Tanya Admin via WhatsApp ↗';

        orderButton.addEventListener('click', () => {
            openWhatsApp(
                `Halo PawMart! 🐾 Saya membuka tautan produk dengan slug "${slug}", tetapi produknya belum ditemukan. Bisa dibantu?`
            );
        });

        stockButton.addEventListener('click', () => {
            openWhatsApp(
                `Halo PawMart! 🐾 Apakah produk dengan slug "${slug}" tersedia?`
            );
        });
    }

    if (!product) {
        showUnavailableProduct();
    } else {
        document.title = `${product.name} — PawMart`;

        nameEl.textContent = product.name;
        categoryEl.textContent = product.category;
        priceEl.textContent = formatRupiah(product.price);
        imageEl.src = product.image;
        imageEl.alt = product.name;
        badgeEl.textContent = product.badge;
        descriptionEl.textContent = product.description;
        longDescriptionEl.textContent = product.longDescription;
        descriptionProductName.textContent = `${product.name}.`;
        breadcrumbEl.textContent = product.name;

        imageEl.addEventListener('error', () => {
            imageEl.alt = `Gambar ${product.name} tidak dapat dimuat`;
        });

        document.getElementById('quantityMinus')?.addEventListener('click', () => {
            quantityInput.value = Math.max(1, getQuantity() - 1);
        });

        document.getElementById('quantityPlus')?.addEventListener('click', () => {
            quantityInput.value = Math.min(99, getQuantity() + 1);
        });

        quantityInput?.addEventListener('change', () => {
            quantityInput.value = getQuantity();
        });

        orderButton.addEventListener('click', () => {
            openWhatsApp(getProductMessage('order'));
        });

        stockButton.addEventListener('click', () => {
            openWhatsApp(getProductMessage('stock'));
        });

        document.getElementById('detailQuestionButton')?.addEventListener('click', () => {
            openWhatsApp(
                `Halo PawMart! 🐾 Saya ingin bertanya tentang ${product.name}.\n\n` +
                `Produk: ${product.name}\n` +
                `Harga yang tertera: ${formatRupiah(product.price)}\n\n` +
                'Mohon informasi detail produk, varian, cara penggunaan, dan ketersediaannya.'
            );
        });

        document.getElementById('detailHelp')?.addEventListener('click', () => {
            openWhatsApp(
                `Halo PawMart! 🐾 Saya membutuhkan bantuan mengenai ${product.name}. Bisa dibantu?`
            );
        });
    }
});
