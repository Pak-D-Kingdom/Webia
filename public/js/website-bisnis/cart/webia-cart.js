/**
 * WEBIA Shared Shopping Cart
 * Penyimpanan keranjang frontend menggunakan localStorage.
 */
(function () {
    'use strict';

    const STORAGE_KEY = 'webia_shopping_cart_v1';

    function readCart() {
        try {
            const saved = JSON.parse(localStorage.getItem(STORAGE_KEY));
            return Array.isArray(saved) ? saved : [];
        } catch {
            return [];
        }
    }

    function saveCart(cart) {
        localStorage.setItem(STORAGE_KEY, JSON.stringify(cart));
        window.dispatchEvent(new CustomEvent('webia:cart-updated', {
            detail: { cart }
        }));
    }

    function normalizeProduct(product) {
        if (!product || !product.slug || !product.name) {
            throw new Error('Data produk tidak lengkap.');
        }

        const price = Number(product.price);
        const quantity = Math.max(
            1,
            Math.min(99, Math.floor(Number(product.quantity) || 1))
        );

        if (!Number.isFinite(price) || price < 0) {
            throw new Error('Harga produk tidak valid.');
        }

        return {
            slug: String(product.slug),
            name: String(product.name),
            price,
            image: String(product.image || ''),
            quantity
        };
    }

    function add(product) {
        const item = normalizeProduct(product);
        const cart = readCart();
        const existing = cart.find(p => p.slug === item.slug);

        if (existing) {
            existing.quantity = Math.min(
                99,
                existing.quantity + item.quantity
            );
            existing.name = item.name;
            existing.price = item.price;
            existing.image = item.image;
        } else {
            cart.push(item);
        }

        saveCart(cart);
        return cart;
    }

    function updateQuantity(slug, quantity) {
        const cart = readCart();
        const item = cart.find(p => p.slug === slug);

        if (!item) return cart;

        const nextQuantity = Math.floor(Number(quantity));

        if (!Number.isFinite(nextQuantity) || nextQuantity <= 0) {
            return remove(slug);
        }

        item.quantity = Math.min(99, nextQuantity);
        saveCart(cart);

        return cart;
    }

    function remove(slug) {
        const cart = readCart().filter(p => p.slug !== slug);
        saveCart(cart);
        return cart;
    }

    function clear() {
        saveCart([]);
    }

    function getItems() {
        return readCart();
    }

    function getCount() {
        return readCart().reduce((total, item) => {
            return total + item.quantity;
        }, 0);
    }

    function getSubtotal() {
        return readCart().reduce((total, item) => {
            return total + item.price * item.quantity;
        }, 0);
    }

    function formatRupiah(amount) {
        return new Intl.NumberFormat('id-ID', {
            style: 'currency',
            currency: 'IDR',
            maximumFractionDigits: 0
        }).format(amount);
    }

    function updateBadges() {
        document.querySelectorAll('[data-cart-count]').forEach(element => {
            element.textContent = getCount();
            element.hidden = getCount() === 0;
        });
    }

    function checkoutWhatsApp(phone, storeName) {
        const items = getItems();

        if (!items.length) {
            alert('Keranjang masih kosong. Yuk, pilih produk dahulu!');
            return;
        }

        const lines = [
            `Halo ${storeName || 'Admin'}, saya ingin memesan produk berikut:`,
            ''
        ];

        items.forEach((item, index) => {
            lines.push(
                `${index + 1}. ${item.name}`,
                `   Jumlah: ${item.quantity}`,
                `   Harga: ${formatRupiah(item.price)}`,
                `   Subtotal: ${formatRupiah(item.price * item.quantity)}`,
                ''
            );
        });

        lines.push(
            `Total sementara: ${formatRupiah(getSubtotal())}`,
            '',
            'Mohon konfirmasi ketersediaan stok, total pembayaran, dan cara pemesanan. Terima kasih!'
        );

        const message = encodeURIComponent(lines.join('\n'));
        const cleanPhone = String(phone || '').replace(/\D/g, '');

        if (!cleanPhone) {
            alert('Nomor WhatsApp toko belum dikonfigurasi.');
            return;
        }

        window.open(
            `https://wa.me/${cleanPhone}?text=${message}`,
            '_blank',
            'noopener,noreferrer'
        );
    }

    window.WebiaCart = {
        add,
        updateQuantity,
        remove,
        clear,
        getItems,
        getCount,
        getSubtotal,
        formatRupiah,
        checkoutWhatsApp,
        updateBadges
    };

    document.addEventListener('DOMContentLoaded', updateBadges);

    window.addEventListener('storage', event => {
        if (event.key === STORAGE_KEY) {
            updateBadges();
        }
    });

    window.addEventListener('webia:cart-updated', updateBadges);
})();