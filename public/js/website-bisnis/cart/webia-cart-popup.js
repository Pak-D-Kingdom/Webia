(function () {
    'use strict';

    const CART = () => window.WebiaCart;
    const CONFIG = {
        phone: '6285850180285',
        storeName: 'Furry & Co.'
    };

    let overlay;
    let drawer;
    let itemsContainer;
    let footer;
    let toast;
    let lastFocusedElement;

    function escapeHtml(value) {
        return String(value ?? '').replace(/[&<>"']/g, char => ({
            '&': '&amp;',
            '<': '&lt;',
            '>': '&gt;',
            '"': '&quot;',
            "'": '&#039;'
        })[char]);
    }

    function createPopup() {
        if (document.getElementById('webia-cart-overlay')) return;

        document.body.insertAdjacentHTML('beforeend', `
            <div class="webia-cart-overlay" id="webia-cart-overlay"></div>

            <aside class="webia-cart-drawer"
                id="webia-cart-drawer"
                role="dialog"
                aria-modal="true"
                aria-labelledby="webia-cart-title"
                aria-hidden="true">

                <header class="webia-cart-header">
                    <p class="webia-cart-kicker">A LITTLE LUXURY FOR YOUR PET</p>
                    <div class="webia-cart-heading">
                        <h2 id="webia-cart-title">Your Shopping Bag</h2>
                        <button type="button" class="webia-cart-close"
                            data-cart-close aria-label="Tutup keranjang">&times;</button>
                    </div>
                    <p class="webia-cart-caption">
                        Pilihan terbaik untuk teman berbulu kesayanganmu.
                    </p>
                </header>

                <div class="webia-cart-items" id="webia-cart-items"></div>

                <footer class="webia-cart-footer" id="webia-cart-footer"></footer>
            </aside>

            <div class="webia-cart-toast" id="webia-cart-toast"
                role="status" aria-live="polite"></div>
        `);

        overlay = document.getElementById('webia-cart-overlay');
        drawer = document.getElementById('webia-cart-drawer');
        itemsContainer = document.getElementById('webia-cart-items');
        footer = document.getElementById('webia-cart-footer');
        toast = document.getElementById('webia-cart-toast');

        overlay.addEventListener('click', close);
        drawer.addEventListener('click', handleDrawerClick);

        document.addEventListener('keydown', event => {
            if (event.key === 'Escape' && drawer.classList.contains('is-open')) {
                close();
            }

            if (event.key === 'Tab' && drawer.classList.contains('is-open')) {
                trapFocus(event);
            }
        });

        window.addEventListener('webia:cart-updated', render);
        window.addEventListener('storage', render);

        render();
    }

    function open() {
        if (!CART()) {
            console.error('WebiaCart belum dimuat. Periksa urutan script.');
            return;
        }

        createPopup();
        lastFocusedElement = document.activeElement;

        render();
        overlay.classList.add('is-open');
        drawer.classList.add('is-open');
        drawer.setAttribute('aria-hidden', 'false');
        document.body.classList.add('webia-cart-locked');

        const closeButton = drawer.querySelector('[data-cart-close]');
        if (closeButton) closeButton.focus();
    }

    function close() {
        if (!drawer) return;

        overlay.classList.remove('is-open');
        drawer.classList.remove('is-open');
        drawer.setAttribute('aria-hidden', 'true');
        document.body.classList.remove('webia-cart-locked');

        if (lastFocusedElement && typeof lastFocusedElement.focus === 'function') {
            lastFocusedElement.focus();
        }
    }

    function render() {
        if (!itemsContainer || !CART()) return;

        const items = CART().getItems();
        const count = CART().getCount();
        const subtotal = CART().getSubtotal();

        if (!items.length) {
            itemsContainer.innerHTML = `
                <div class="webia-cart-empty">
                    <div class="webia-cart-empty-icon" aria-hidden="true">♡</div>
                    <h3>Your bag is waiting</h3>
                    <p>Belum ada produk di keranjang. Yuk, temukan sesuatu yang spesial!</p>
                    <button type="button" class="webia-cart-continue"
                        data-cart-continue>JELAJAHI PRODUK</button>
                </div>
            `;

            footer.innerHTML = `
                <div class="webia-cart-summary-row">
                    <span class="webia-cart-summary-label">Total item</span>
                    <strong>0 produk</strong>
                </div>
                <button type="button" class="webia-cart-checkout"
                    disabled>KERANJANG KOSONG</button>
            `;
            return;
        }

        itemsContainer.innerHTML = items.map(item => {
            const image = item.image
                ? `<img src="${escapeHtml(item.image)}"
                    alt="${escapeHtml(item.name)}" loading="lazy">`
                : `<div class="webia-cart-item-image-placeholder" aria-hidden="true">♡</div>`;

            return `
                <article class="webia-cart-item">
                    <div class="webia-cart-item-image">${image}</div>

                    <div class="webia-cart-item-info">
                        <div class="webia-cart-item-top">
                            <div>
                                <h3 class="webia-cart-item-name">${escapeHtml(item.name)}</h3>
                                <p class="webia-cart-item-price">
                                    ${CART().formatRupiah(item.price)}
                                </p>
                            </div>
                            <button type="button" class="webia-cart-remove"
                                data-cart-remove="${escapeHtml(item.slug)}">
                                Hapus
                            </button>
                        </div>

                        <div class="webia-cart-item-bottom">
                            <div class="webia-cart-qty"
                                aria-label="Jumlah ${escapeHtml(item.name)}">
                                <button type="button"
                                    data-cart-qty="${escapeHtml(item.slug)}"
                                    data-delta="-1"
                                    aria-label="Kurangi jumlah">−</button>
                                <span>${item.quantity}</span>
                                <button type="button"
                                    data-cart-qty="${escapeHtml(item.slug)}"
                                    data-delta="1"
                                    aria-label="Tambah jumlah">+</button>
                            </div>

                            <span class="webia-cart-line-total">
                                ${CART().formatRupiah(item.price * item.quantity)}
                            </span>
                        </div>
                    </div>
                </article>
            `;
        }).join('');

        footer.innerHTML = `
            <div class="webia-cart-summary-row">
                <span class="webia-cart-summary-label">
                    Subtotal · ${count} item
                </span>
                <strong class="webia-cart-subtotal">
                    ${CART().formatRupiah(subtotal)}
                </strong>
            </div>

            <p class="webia-cart-disclaimer">
                Harga dan stok akan dikonfirmasi admin melalui WhatsApp.
                Subtotal belum termasuk biaya lain jika ada.
            </p>

            <button type="button" class="webia-cart-checkout"
                data-cart-checkout>
                <span aria-hidden="true">↗</span>
                PESAN VIA WHATSAPP
            </button>
        `;
    }

    function handleDrawerClick(event) {
        const closeButton = event.target.closest('[data-cart-close]');
        const continueButton = event.target.closest('[data-cart-continue]');
        const removeButton = event.target.closest('[data-cart-remove]');
        const quantityButton = event.target.closest('[data-cart-qty]');
        const checkoutButton = event.target.closest('[data-cart-checkout]');

        if (closeButton) {
            close();
            return;
        }

        if (continueButton) {
            close();
            return;
        }

        if (removeButton) {
            CART().remove(removeButton.dataset.cartRemove);
            showToast('Produk dihapus dari keranjang');
            render();
            return;
        }

        if (quantityButton) {
            const slug = quantityButton.dataset.cartQty;
            const delta = Number(quantityButton.dataset.delta);
            const item = CART().getItems().find(product => product.slug === slug);

            if (item) {
                CART().updateQuantity(slug, item.quantity + delta);
                render();
            }
            return;
        }

        if (checkoutButton) {
            CART().checkoutWhatsApp(CONFIG.phone, CONFIG.storeName);
        }
    }

    function trapFocus(event) {
        const focusable = [...drawer.querySelectorAll(
            'button:not(:disabled), a[href], input:not(:disabled), [tabindex]:not([tabindex="-1"])'
        )].filter(element => element.offsetParent !== null);

        if (!focusable.length) return;

        const first = focusable[0];
        const last = focusable[focusable.length - 1];

        if (event.shiftKey && document.activeElement === first) {
            event.preventDefault();
            last.focus();
        } else if (!event.shiftKey && document.activeElement === last) {
            event.preventDefault();
            first.focus();
        }
    }

    let toastTimeout;

    function showToast(message) {
        if (!toast) return;

        toast.textContent = message;
        toast.classList.add('is-visible');

        clearTimeout(toastTimeout);
        toastTimeout = setTimeout(() => {
            toast.classList.remove('is-visible');
        }, 2200);
    }

    function addProduct(product) {
        if (!CART()) {
            console.error('WebiaCart belum dimuat.');
            return;
        }

        CART().add(product);
        createPopup();
        render();
        showToast('♡  Produk berhasil ditambahkan');

        // Buka popup setelah menambahkan produk.
        open();
    }

    document.addEventListener('click', event => {
        const openButton = event.target.closest('[data-cart-open]');
        if (openButton) {
            event.preventDefault();
            open();
            return;
        }

        const addButton = event.target.closest('[data-cart-add]');
        if (addButton) {
            event.preventDefault();

            try {
                addProduct({
                    slug: addButton.dataset.slug,
                    name: addButton.dataset.name,
                    price: Number(addButton.dataset.price),
                    image: addButton.dataset.image || '',
                    quantity: Number(addButton.dataset.quantity) || 1
                });
            } catch (error) {
                console.error(error);
                showToast('Produk gagal ditambahkan. Periksa data produk.');
            }
        }
    });

    document.addEventListener('DOMContentLoaded', createPopup);

    window.WebiaCartPopup = { open, close, render, addProduct };
})();