document.addEventListener('DOMContentLoaded', () => {
    const config = window.FURRY_CONFIG || {};
    const whatsappNumber = config.whatsappNumber || '6285850180285';
    const slug = config.productSlug || '';

    const products = {
        'royal-canin-kitten': {
            name: 'Royal Canin Kitten',
            category: 'NOURISH · DAILY NUTRITION',
            price: 185000,
            badge: 'THE FAVOURITE',
            image: 'https://images.unsplash.com/photo-1589924691995-400dc9ecc119?auto=format&fit=crop&w=1000&q=85',
            description: 'Thoughtful nutrition for little paws. A demo selection for growing kittens and their everyday nutritional needs.',
            details: 'Royal Canin Kitten is presented as a sample product in the Furry & Co. boutique. Please confirm the available packaging, ingredients, recommended age, and current price with the store before ordering.'
        },
        'dog-treats': {
            name: 'Happy Bites Treats',
            category: 'LITTLE TREATS · REWARDS',
            price: 45000,
            badge: 'A LITTLE TREAT',
            image: 'https://images.unsplash.com/photo-1582798358481-d199fb7347bb?auto=format&fit=crop&w=1000&q=85',
            description: 'Little rewards, endless affection. A sample treat selection for special moments with your companion.',
            details: 'Happy Bites Treats is a demonstration product for the boutique collection. Please ask the store about ingredients, package sizes, suitable ages, and availability before ordering.'
        },
        'soft-pet-bed': {
            name: 'Cloudy Pet Bed',
            category: 'COMFORT · PET LIVING',
            price: 220000,
            badge: 'EVERYDAY COMFORT',
            image: 'https://images.unsplash.com/photo-1541599540903-216a46ca1dc0?auto=format&fit=crop&w=1000&q=85',
            description: 'A softer place to call their own. Thoughtfully presented as a comfort essential for your pet.',
            details: 'Cloudy Pet Bed is a sample pet accessory in this demo. Contact the store to confirm available sizes, materials, colours, and current stock.'
        },
        'pet-grooming-kit': {
            name: 'Gentle Grooming Kit',
            category: 'WELLNESS · DAILY CARE',
            price: 89000,
            badge: 'DAILY CARE',
            image: 'https://images.unsplash.com/photo-1516734212186-a967f81ad0d7?auto=format&fit=crop&w=1000&q=85',
            description: 'Everyday care, made more special. A sample grooming essential for your pet-care routine.',
            details: 'Gentle Grooming Kit is a demonstration item. Ask the store about the package contents, materials, usage instructions, and availability.'
        },
        'playful-rope-toy': {
            name: 'Playful Rope Toy',
            category: 'PLAY · ACCESSORIES',
            price: 35000,
            badge: 'LITTLE ADVENTURES',
            image: 'https://images.unsplash.com/photo-1535294435445-d7249524ef2e?auto=format&fit=crop&w=1000&q=85',
            description: 'For the joy of little adventures. A sample toy selection for playtime with your companion.',
            details: 'Playful Rope Toy is a sample product in the Furry & Co. demo. Confirm the material, size, intended pet type, and availability with the store.'
        },
        'cozy-pet-bowl': {
            name: 'Cozy Pet Bowl',
            category: 'DAILY RITUALS · ACCESSORIES',
            price: 55000,
            badge: 'DAILY ESSENTIAL',
            image: 'https://images.unsplash.com/photo-1585837575652-267c041d77d4?auto=format&fit=crop&w=1000&q=85',
            description: 'A thoughtful touch to every meal. A sample feeding accessory for everyday pet routines.',
            details: 'Cozy Pet Bowl is a demonstration product. Please ask the store to confirm its material, dimensions, available colours, and current price.'
        }
    };

    const nameEl = document.getElementById('fcpProductName');
    const categoryEl = document.getElementById('fcpCategory');
    const priceEl = document.getElementById('fcpProductPrice');
    const imageEl = document.getElementById('fcpProductImage');
    const badgeEl = document.getElementById('fcpImageBadge');
    const descriptionEl = document.getElementById('fcpProductDescription');
    const detailsEl = document.getElementById('fcpLongDescription');
    const detailsHeading = document.getElementById('fcpDetailHeading');
    const breadcrumbEl = document.getElementById('fcpBreadcrumbName');
    const quantityInput = document.getElementById('fcpQuantity');

    const orderButton = document.getElementById('fcpOrderButton');
    const stockButton = document.getElementById('fcpStockButton');

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
        const parsed = Number.parseInt(quantityInput?.value || '1', 10);

        if (!Number.isFinite(parsed)) return 1;

        return Math.min(99, Math.max(1, parsed));
    }

    function contactMessage() {
        return [
            'Hello Furry & Co. 💗',
            '',
            'I would love some personal assistance with your pet boutique collection.',
            'Could you help me with product recommendations and availability?'
        ].join('\n');
    }

    function setupQuantity() {
        document.getElementById('fcpMinus')?.addEventListener('click', () => {
            quantityInput.value = Math.max(1, getQuantity() - 1);
        });

        document.getElementById('fcpPlus')?.addEventListener('click', () => {
            quantityInput.value = Math.min(99, getQuantity() + 1);
        });

        quantityInput?.addEventListener('change', () => {
            quantityInput.value = getQuantity();
        });
    }

    function showMissingProduct() {
        document.title = 'Product Not Found — Furry & Co.';

        nameEl.textContent = 'A little something is missing.';
        categoryEl.textContent = 'THE BOUTIQUE COLLECTION';
        priceEl.textContent = 'Ask our concierge';
        descriptionEl.textContent =
            'We could not find this item in the current demo collection. Our team may be able to help you find an alternative.';
        detailsHeading.textContent = 'Let us help you find a favourite.';
        detailsEl.textContent =
            'Please return to the collection to explore available demo products or contact our team for assistance.';
        breadcrumbEl.textContent = 'Product not found';
        imageEl.hidden = true;
        badgeEl.hidden = true;

        orderButton.textContent = 'Ask Our Concierge ↗';

        orderButton.addEventListener('click', () => {
            openWhatsApp(
                `Hello Furry & Co. 💗\n\nI opened a product link with slug "${slug}", but the product was not found. Could you help me?`
            );
        });

        stockButton.addEventListener('click', () => {
            openWhatsApp(
                `Hello Furry & Co. 💗\n\nIs a product with slug "${slug}" available? Could you please help me find it?`
            );
        });
    }

    const product = products[slug];

    if (!product) {
        showMissingProduct();
    } else {
        document.title = `${product.name} — Furry & Co.`;

        nameEl.textContent = product.name;
        categoryEl.textContent = product.category;
        priceEl.textContent = formatRupiah(product.price);
        imageEl.src = product.image;
        imageEl.alt = product.name;
        badgeEl.textContent = product.badge;
        descriptionEl.textContent = product.description;
        detailsHeading.textContent = `Meet ${product.name}.`;
        detailsEl.textContent = product.details;
        breadcrumbEl.textContent = product.name;

        imageEl.addEventListener('error', () => {
            imageEl.alt = `Image unavailable for ${product.name}`;
        });

        orderButton.addEventListener('click', () => {
            const quantity = getQuantity();

            openWhatsApp([
                'Hello Furry & Co. 💗',
                '',
                'I would love to enquire about placing an order:',
                `Product: ${product.name}`,
                `Displayed price: ${formatRupiah(product.price)}`,
                `Quantity: ${quantity}`,
                `Estimated subtotal: ${formatRupiah(product.price * quantity)}`,
                '',
                'Could you please confirm stock, current pricing, and the ordering process? Thank you!'
            ].join('\n'));
        });

        stockButton.addEventListener('click', () => {
            openWhatsApp([
                'Hello Furry & Co. 💗',
                '',
                'Could I check the availability of this item?',
                `Product: ${product.name}`,
                `Quantity needed: ${getQuantity()}`,
                '',
                'Please confirm available variations and the current price. Thank you!'
            ].join('\n'));
        });

        document.getElementById('fcpQuestionButton')
            ?.addEventListener('click', () => {
                openWhatsApp([
                    'Hello Furry & Co. 💗',
                    '',
                    `I would love to know more about ${product.name}.`,
                    'Could you help me with product details, suitable variations, recommendations, and availability?'
                ].join('\n'));
            });
    }

    document.getElementById('fcpHeaderContact')
        ?.addEventListener('click', () => openWhatsApp(contactMessage()));

    document.getElementById('fcpFooterContact')
        ?.addEventListener('click', event => {
            event.preventDefault();
            openWhatsApp(contactMessage());
        });

    setupQuantity();
});