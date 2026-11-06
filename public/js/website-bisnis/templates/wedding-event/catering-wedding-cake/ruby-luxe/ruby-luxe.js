(() => {
    'use strict';

    const config = window.RUBY_LUXE_CONFIG || {};
    const whatsappNumber = String(config.whatsappNumber || '').replace(/\D/g, '');

    const menuToggle = document.getElementById('rlMenuToggle');
    const nav = document.getElementById('rlNav');
    const form = document.getElementById('rlInquiryForm');
    const eventDate = document.getElementById('rlEventDate');
    const status = document.getElementById('rlFormStatus');
    const waButton = document.getElementById('rlFloatingWhatsApp');
    const year = document.getElementById('rlYear');

    if (year) year.textContent = new Date().getFullYear();

    // Demo promotion countdown. Expiry is displayed honestly after the deadline.
    const countdowns = document.querySelectorAll('[data-countdown]');
    countdowns.forEach((countdown) => {
        const deadline = new Date(countdown.dataset.countdown).getTime();
        const tick = () => {
            const remaining = deadline - Date.now();
            if (remaining <= 0) {
                countdown.innerHTML = '<span class="rl-promo-expired">DEMO PROMOTION ENDED</span>';
                const card = countdown.closest('.rl-package-card, .rl-detail-promo, .rl-promo-banner');
                if (card) card.classList.add('rl-promo-ended');
                document.querySelectorAll('.rl-promo-copy small').forEach((node) => {
                    node.textContent = 'This illustrative promotion has ended. Please request a current quotation.';
                });
                return;
            }
            const units = {
                days: Math.floor(remaining / 86400000),
                hours: Math.floor((remaining % 86400000) / 3600000),
                minutes: Math.floor((remaining % 3600000) / 60000),
                seconds: Math.floor((remaining % 60000) / 1000)
            };
            Object.entries(units).forEach(([unit, value]) => {
                const target = countdown.querySelector(`[data-${unit}]`);
                if (target) target.textContent = String(value).padStart(2, '0');
            });
        };
        tick();
        const timer = window.setInterval(() => {
            tick();
            if (Date.now() >= deadline) window.clearInterval(timer);
        }, 1000);
    });

    // Mobile navigation
    if (menuToggle && nav) {
        menuToggle.addEventListener('click', () => {
            const opened = nav.classList.toggle('is-open');
            menuToggle.setAttribute('aria-expanded', String(opened));
        });

        nav.querySelectorAll('a').forEach((link) => {
            link.addEventListener('click', () => {
                nav.classList.remove('is-open');
                menuToggle.setAttribute('aria-expanded', 'false');
            });
        });

        document.addEventListener('click', (event) => {
            if (
                nav.classList.contains('is-open') &&
                !nav.contains(event.target) &&
                !menuToggle.contains(event.target)
            ) {
                nav.classList.remove('is-open');
                menuToggle.setAttribute('aria-expanded', 'false');
            }
        });
    }

    // Event date cannot be in the past
    if (eventDate) {
        const now = new Date();
        eventDate.min = [
            now.getFullYear(),
            String(now.getMonth() + 1).padStart(2, '0'),
            String(now.getDate()).padStart(2, '0')
        ].join('-');
    }

    function openWhatsApp(message) {
        if (!whatsappNumber) {
            if (status) {
                status.textContent =
                    'Nomor WhatsApp admin belum diatur. Silakan periksa konfigurasi template.';
            }
            return;
        }

        const url = `https://wa.me/${whatsappNumber}?text=${encodeURIComponent(message)}`;
        const opened = window.open(url, '_blank', 'noopener,noreferrer');

        if (!opened && status) {
            status.innerHTML = '';
            const link = document.createElement('a');
            link.href = url;
            link.target = '_blank';
            link.rel = 'noopener noreferrer';
            link.textContent = 'Buka WhatsApp untuk melanjutkan inquiry ↗';
            status.appendChild(link);
        }
    }

    // Floating WhatsApp contact
    if (waButton) {
        if (whatsappNumber) {
            waButton.href =
                `https://wa.me/${whatsappNumber}?text=${encodeURIComponent(
                    'Halo Ruby Luxe, saya ingin bertanya tentang layanan catering dan wedding cake.'
                )}`;
        } else {
            waButton.addEventListener('click', (event) => {
                event.preventDefault();
                if (status) {
                    status.textContent =
                        'Nomor WhatsApp admin belum diatur pada konfigurasi template.';
                }
            });
        }
    }

    // Prepare an order inquiry and open WhatsApp
    if (form) {
        form.addEventListener('submit', (event) => {
            event.preventDefault();

            if (!form.reportValidity()) return;

            if (!whatsappNumber) {
                if (status) {
                    status.textContent =
                        'Nomor WhatsApp admin belum diatur. Silakan periksa konfigurasi template.';
                }
                return;
            }

            const data = new FormData(form);

            const value = (key, fallback = 'Belum diisi') => {
                const result = String(data.get(key) || '').trim();
                return result || fallback;
            };

            const rawDate = value('eventDate');
            let dateText = rawDate;

            if (rawDate !== 'Belum diisi') {
                const date = new Date(`${rawDate}T00:00:00`);
                if (!Number.isNaN(date.getTime())) {
                    dateText = date.toLocaleDateString('id-ID', {
                        day: 'numeric',
                        month: 'long',
                        year: 'numeric'
                    });
                }
            }

            const message = [
                'Halo Ruby Luxe! Saya ingin berkonsultasi mengenai pesanan catering/wedding cake.',
                '',
                'DETAIL ORDER INQUIRY',
                '------------------------------',
                `Nama: ${value('name')}`,
                `Nomor WhatsApp: ${value('phone')}`,
                `Jenis pesanan: ${value('orderType')}`,
                `Item/paket pilihan: ${value('selectedItem', 'Tidak ada item khusus')}`,
                `Tanggal acara: ${dateText}`,
                `Estimasi tamu: ${value('guests')}`,
                `Lokasi acara/pengiriman: ${value('location')}`,
                `Ukuran cake: ${value('cakeSize')}`,
                `Rasa pilihan: ${value('flavor')}`,
                `Menu/desain/permintaan khusus: ${value('message')}`,
                '',
                'Mohon informasi ketersediaan, detail menu atau desain, harga, dan ketentuan pengiriman.',
                'Saya memahami bahwa inquiry ini belum merupakan konfirmasi pesanan.'
            ].join('\n');

            if (status) {
                status.textContent =
                    'Data inquiry siap. WhatsApp akan dibuka untuk melanjutkan konsultasi.';
            }

            openWhatsApp(message);
        });
    }

    // AI Assistant is an entry-point button only.
    // Connect this button to the actual chatbot integration when available.
})();
