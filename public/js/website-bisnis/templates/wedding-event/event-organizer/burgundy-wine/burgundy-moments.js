
(() => {
    'use strict';

    const config = window.BURGUNDY_MOMENTS_CONFIG || {};
    const whatsappNumber = String(config.whatsappNumber || '').replace(/\D/g, '');

    const menuToggle = document.getElementById('bmMenuToggle');
    const nav = document.getElementById('bmNav');
    const inquiryForm = document.getElementById('bmInquiryForm');
    const eventType = document.getElementById('bmEventType');
    const packageSelect = document.getElementById('bmPackage');
    const eventDate = document.getElementById('bmEventDate');
    const formStatus = document.getElementById('bmFormStatus');
    const floatingWhatsApp = document.getElementById('bmFloatingWhatsApp');
    const yearElement = document.getElementById('bmYear');

    // Footer year
    if (yearElement) {
        yearElement.textContent = new Date().getFullYear();
    }

    // Mobile navigation
    if (menuToggle && nav) {
        menuToggle.addEventListener('click', () => {
            const isOpen = nav.classList.toggle('is-open');
            menuToggle.setAttribute('aria-expanded', String(isOpen));
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

    // Prevent selecting a past event date
    if (eventDate) {
        const today = new Date();
        const localToday = [
            today.getFullYear(),
            String(today.getMonth() + 1).padStart(2, '0'),
            String(today.getDate()).padStart(2, '0')
        ].join('-');

        eventDate.min = localToday;
    }

    // Preselect the package clicked by the visitor
    document.querySelectorAll('[data-package-label]').forEach((button) => {
        button.addEventListener('click', () => {
            const selectedPackage = button.dataset.packageLabel;
            const selectedEvent = button.dataset.event;

            if (packageSelect && selectedPackage) {
                packageSelect.value = selectedPackage;
            }

            if (eventType && selectedEvent) {
                eventType.value = selectedEvent;
            }
        });
    });

    // Prepare a general WhatsApp inquiry message
    function openWhatsApp(message) {
        if (!whatsappNumber) {
            if (formStatus) {
                formStatus.textContent =
                    'Nomor WhatsApp belum diatur. Silakan hubungi administrator website.';
            }
            return;
        }

        const url =
            `https://wa.me/${whatsappNumber}?text=${encodeURIComponent(message)}`;

        window.open(url, '_blank', 'noopener,noreferrer');
    }

    // Floating WhatsApp button
    if (floatingWhatsApp) {
        if (whatsappNumber) {
            floatingWhatsApp.href =
                `https://wa.me/${whatsappNumber}?text=${encodeURIComponent(
                    'Halo Burgundy Moments, saya ingin bertanya tentang layanan event organizer.'
                )}`;
        } else {
            floatingWhatsApp.addEventListener('click', (event) => {
                event.preventDefault();
                window.alert('Nomor WhatsApp belum diatur oleh administrator.');
            });
        }
    }

    // Validate, summarize, and send the inquiry to WhatsApp
    if (inquiryForm) {
        inquiryForm.addEventListener('submit', (event) => {
            event.preventDefault();

            if (!inquiryForm.reportValidity()) {
                return;
            }

            if (!whatsappNumber) {
                if (formStatus) {
                    formStatus.textContent =
                        'Nomor WhatsApp admin belum diatur. Periksa konfigurasi template.';
                }
                return;
            }

            const formData = new FormData(inquiryForm);

            const getValue = (key, fallback = 'Belum diisi') => {
                const value = String(formData.get(key) || '').trim();
                return value || fallback;
            };

            const rawDate = getValue('eventDate');
            let formattedDate = rawDate;

            if (rawDate !== 'Belum diisi') {
                const parsedDate = new Date(`${rawDate}T00:00:00`);

                formattedDate = Number.isNaN(parsedDate.getTime())
                    ? rawDate
                    : parsedDate.toLocaleDateString('id-ID', {
                        day: 'numeric',
                        month: 'long',
                        year: 'numeric'
                    });
            }

            const message = [
                'Halo Burgundy Moments! Saya ingin konsultasi mengenai acara saya.',
                '',
                'DETAIL INQUIRY EVENT',
                '------------------------------',
                `Nama: ${getValue('name')}`,
                `Nomor WhatsApp: ${getValue('phone')}`,
                `Jenis acara: ${getValue('eventType')}`,
                `Paket: ${getValue('package')}`,
                `Tanggal acara: ${formattedDate}`,
                `Estimasi tamu: ${getValue('guests')}`,
                `Lokasi acara: ${getValue('location')}`,
                `Estimasi budget: ${getValue('budget')}`,
                `Detail tambahan: ${getValue('message')}`,
                '',
                'Mohon informasi mengenai ketersediaan tanggal, detail layanan, dan penawaran harga.',
                'Saya memahami bahwa inquiry ini belum merupakan konfirmasi booking.'
            ].join('\n');

            if (formStatus) {
                formStatus.textContent =
                    'Data siap dikirim. WhatsApp akan dibuka untuk melanjutkan inquiry.';
            }

            openWhatsApp(message);
        });
    }

    // AI Assistant is intentionally an entry-point button only.
    // Connect it to the actual chatbot service when that integration is available.
})();
