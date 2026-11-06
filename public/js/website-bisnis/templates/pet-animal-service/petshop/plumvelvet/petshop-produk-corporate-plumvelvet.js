
document.addEventListener('DOMContentLoaded', () => {
    const quantityInput = document.getElementById('pbpdQuantity');
    const addButton = document.getElementById('pbpdAddToCart');
    const config = window.PETBASE_CONFIG || {};
    const phone = String(config.whatsappNumber || '').replace(/\D/g, '');

    function getQuantity() {
        const value = Number(quantityInput?.value || 1);

        if (!Number.isFinite(value)) return 1;

        return Math.min(99, Math.max(1, Math.floor(value)));
    }

    function updateQuantity(value) {
        if (!quantityInput) return;

        quantityInput.value = Math.min(99, Math.max(1, value));
        addButton?.setAttribute('data-quantity', String(getQuantity()));
    }

    document.getElementById('pbpdMinus')?.addEventListener('click', () => {
        updateQuantity(getQuantity() - 1);
    });

    document.getElementById('pbpdPlus')?.addEventListener('click', () => {
        updateQuantity(getQuantity() + 1);
    });

    quantityInput?.addEventListener('change', () => {
        updateQuantity(getQuantity());
    });

    // Simpan jumlah pada tombol sebelum modul keranjang memprosesnya.
    addButton?.addEventListener('click', () => {
        updateQuantity(getQuantity());
    }, true);

    document.getElementById('pbpdContact')?.addEventListener('click', () => {
        if (!phone) {
            alert('Nomor WhatsApp PetBase belum dikonfigurasi.');
            return;
        }

        const productName = addButton?.dataset.product || 'produk ini';
        const message = [
            'Hello PetBase!',
            '',
            `I would like to ask about ${productName}.`,
            'Could you confirm the current price, product specifications, and stock availability?',
        ].join('\n');

        window.open(
            `https://wa.me/${phone}?text=${encodeURIComponent(message)}`,
            '_blank',
            'noopener,noreferrer'
        );
    });
u
    updateQuantity(1);
});
