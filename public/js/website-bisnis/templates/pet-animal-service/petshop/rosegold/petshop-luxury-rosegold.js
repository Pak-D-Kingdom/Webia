document.addEventListener('DOMContentLoaded', () => {
    const config = window.FURRY_CONFIG || {};
    const whatsappNumber = config.whatsappNumber || '6285850180285';

    function openWhatsApp(message) {
        const url = `https://wa.me/${whatsappNumber}?text=${encodeURIComponent(message)}`;
        window.open(url, '_blank', 'noopener,noreferrer');
    }

    // Mobile navigation
    const menuToggle = document.getElementById('fcMenuToggle');
    const navLeft = document.getElementById('fcNavLeft');
    const navRight = document.getElementById('fcNavRight');

    menuToggle?.addEventListener('click', () => {
        const isOpen = navLeft?.classList.contains('is-open');

        navLeft?.classList.toggle('is-open', !isOpen);
        navRight?.classList.toggle('is-open', !isOpen);

        menuToggle.textContent = isOpen ? '☰' : '✕';
        menuToggle.setAttribute('aria-expanded', String(!isOpen));
    });

    [navLeft, navRight].forEach(nav => {
        nav?.querySelectorAll('a').forEach(link => {
            link.addEventListener('click', () => {
                navLeft?.classList.remove('is-open');
                navRight?.classList.remove('is-open');

                if (menuToggle) {
                    menuToggle.textContent = '☰';
                    menuToggle.setAttribute('aria-expanded', 'false');
                }
            });
        });
    });

    document.getElementById('fcFaqContact')
        ?.addEventListener('click', () => {
            const config = window.FURRY_CONFIG || {};
            const phone = config.whatsappNumber || '6285850180285';

            const message = [
                'Hello Furry & Co. 💗',
                '',
                'I have a question about your pet boutique collection.',
                'Could your team please help me?',
                '',
                'Thank you!'
            ].join('\n');

            window.open(
                `https://wa.me/${phone}?text=${encodeURIComponent(message)}`,
                '_blank',
                'noopener,noreferrer'
            );
        });

    // Product ordering buttons
    document.querySelectorAll('.fc-add-button').forEach(button => {
        button.addEventListener('click', () => {
            const product = button.dataset.product || 'Produk Furry & Co.';
            const price = Number(button.dataset.price || 0);

            const formattedPrice = new Intl.NumberFormat('id-ID', {
                style: 'currency',
                currency: 'IDR',
                maximumFractionDigits: 0
            }).format(price);

            openWhatsApp(
                [
                    'Hello Furry & Co. 💗',
                    '',
                    'I would love to enquire about this item:',
                    `Product: ${product}`,
                    `Displayed price: ${formattedPrice}`,
                    'Quantity: 1',
                    '',
                    'Could you please confirm availability, current pricing, and how to place an order? Thank you!'
                ].join('\n')
            );
        });
    });

    // Promotions
    document.getElementById('fcPromoButton')?.addEventListener('click', () => {
        openWhatsApp(
            [
                'Hello Furry & Co. 💗',
                '',
                'I would love to know about your current promotions and special offers.',
                'Could you share the available deals, applicable terms, and promotion period? Thank you!'
            ].join('\n')
        );
    });

    // Concierge / contact
    document.getElementById('fcContactButton')?.addEventListener('click', () => {
        openWhatsApp(
            [
                'Hello Furry & Co. 💗',
                '',
                'I would love some help choosing the right products for my pet.',
                'Could you please assist me with product recommendations and availability?'
            ].join('\n')
        );
    });

    // Floating chat button
    document.getElementById('fcChatButton')?.addEventListener('click', () => {
        openWhatsApp(
            [
                'Hello Furry & Co. 💗',
                '',
                'I would love a personalised recommendation for my pet.',
                'Could you help me find the right products?'
            ].join('\n')
        );
    });
});
