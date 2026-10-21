document.addEventListener('DOMContentLoaded', () => {
    const config = window.PAWMART_CONFIG || {};
    const whatsappNumber = config.whatsappNumber || '6285850180285';

    function openWhatsApp(message) {
        const url = `https://wa.me/${whatsappNumber}?text=${encodeURIComponent(message)}`;
        window.open(url, '_blank', 'noopener,noreferrer');
    }

    const menuToggle = document.getElementById('menuToggle');
    const mainNav = document.getElementById('mainNav');

    menuToggle?.addEventListener('click', () => {
        mainNav?.classList.toggle('is-open');
    });

    mainNav?.querySelectorAll('a').forEach(link => {
        link.addEventListener('click', () => {
            mainNav.classList.remove('is-open');
        });
    });

    document.querySelectorAll('.paw-add-button').forEach(button => {
        button.addEventListener('click', () => {
            const product = button.dataset.product || 'Produk PawMart';
            const price = Number(button.dataset.price || 0);
            const formattedPrice = new Intl.NumberFormat('id-ID', {
                style: 'currency',
                currency: 'IDR',
                maximumFractionDigits: 0
            }).format(price);

            openWhatsApp(
                `Halo PawMart! 🐾 Saya ingin memesan produk berikut:\n\n` +
                `Produk: ${product}\n` +
                `Harga yang tertera: ${formattedPrice}\n` +
                `Jumlah: 1\n\n` +
                `Apakah produknya tersedia? Mohon info cara pemesanannya ya.`
            );
        });
    });

    document.getElementById('promoButton')?.addEventListener('click', () => {
        openWhatsApp(
            'Halo PawMart! 🐾 Saya ingin bertanya tentang promo yang sedang tersedia, syarat promo, dan periode berlakunya. Terima kasih!'
        );
    });

    document.getElementById('contactButton')?.addEventListener('click', () => {
        openWhatsApp(
            'Halo PawMart! 🐾 Saya ingin bertanya tentang produk dan kebutuhan hewan peliharaan. Bisa dibantu?'
        );
    });

    document.getElementById('chatbotButton')?.addEventListener('click', () => {
        openWhatsApp(
            'Halo PawMart! 🐾 Saya butuh rekomendasi produk untuk hewan peliharaan saya. Bisa bantu saya memilih produk yang sesuai?'
        );
    });
});