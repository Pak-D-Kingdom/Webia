
(() => {
    const menuButton = document.querySelector('.heritage-menu-toggle');
    const nav = document.getElementById('heritage-nav');

    if (menuButton && nav) {
        menuButton.addEventListener('click', () => {
            const open = nav.classList.toggle('is-open');
            menuButton.setAttribute('aria-expanded', String(open));
        });

        nav.querySelectorAll('a').forEach((link) => {
            link.addEventListener('click', () => {
                nav.classList.remove('is-open');
                menuButton.setAttribute('aria-expanded', 'false');
            });
        });
    }

    // Set minimum booking date to today.
    const dateInput = document.querySelector(
        '.heritage-booking-form input[name="date"]'
    );

    if (dateInput) {
        const today = new Date();
        dateInput.min = new Date(
            today.getTime() - today.getTimezoneOffset() * 60000
        ).toISOString().slice(0, 10);
    }

    // Dynamic footer year.
    const year = document.getElementById('heritage-current-year');
    if (year) {
        year.textContent = String(new Date().getFullYear());
    }

    // Booking form redirects to WhatsApp admin.
    const form = document.getElementById('heritage-booking-form');

    if (form) {
        form.addEventListener('submit', (event) => {
            event.preventDefault();

            const data = new FormData(form);
            const name = String(data.get('name') || '').trim();
            const phone = String(data.get('phone') || '').trim();
            const vehicle = String(data.get('vehicle') || '').trim();
            const appointment = String(data.get('appointment') || '').trim();
            const date = String(data.get('date') || '').trim();
            const notes = String(data.get('notes') || '').trim();

            if (!name || !phone || !vehicle || !appointment || !date) {
                form.reportValidity();
                return;
            }


            const message = [
                'Halo Admin Heritage Motors 👋',
                '',
                'Saya ingin membuat janji kunjungan showroom.',
                '',
                '*Detail Reservasi*',
                `Nama: ${name}`,
                `Nomor WhatsApp: ${phone}`,
                `Kendaraan: ${vehicle}`,
                `Keperluan: ${appointment}`,
                `Tanggal kunjungan: ${date}`,
                `Catatan: ${notes || '-'}`,
                '',
                'Mohon informasi ketersediaan kendaraan, konfirmasi jadwal, dan informasi harga.',
                '',
                'Terima kasih! 🫶🏻'
            ].join('\n');


            window.location.href =
                'https://wa.me/6285850180285?text=' +
                encodeURIComponent(message);
        });
    }

    // Vehicle details.
    let selectedVehicle = null;

    const panel = document.getElementById('heritage-detail-panel');
    const bookingVehicle = document.getElementById('heritage-booking-vehicle');

    const escapeHTML = (value) =>
        String(value).replace(/[&<>"']/g, (character) => ({
            '&': '&amp;',
            '<': '&lt;',
            '>': '&gt;',
            '"': '&quot;',
            "'": '&#039;'
        })[character]);

    function askAboutSelected() {
        const vehicle = selectedVehicle
            ? selectedVehicle.name
            : 'kendaraan yang tersedia';

        const details = selectedVehicle
            ? `\nTahun: ${selectedVehicle.year}` +
            `\nKilometer: ${selectedVehicle.mileage}` +
            `\nSpesifikasi: ${selectedVehicle.specs}` +
            `\nHarga contoh: ${selectedVehicle.price}`
            : '';

        const message =
            `Halo Heritage Motors, saya ingin bertanya tentang ${vehicle}.` +
            `${details}\nMohon konfirmasi spesifikasi dan ketersediaan aktual.`;

        window.location.href =
            'https://wa.me/6285850180285?text=' +
            encodeURIComponent(message);
    }

    document.querySelectorAll('.heritage-detail-button').forEach((button) => {
        button.addEventListener('click', () => {
            selectedVehicle = {
                name: button.dataset.car || '',
                year: button.dataset.year || '—',
                mileage: button.dataset.mileage || '—',
                condition: button.dataset.condition || 'Confirm with showroom',
                specs: button.dataset.specs || 'Confirm with showroom',
                price: button.dataset.price || 'Confirm with showroom'
            };

            if (panel) {
                panel.innerHTML = `
                    <span class="heritage-detail-number">HM / VEHICLE DETAIL</span>
                    <h3>${escapeHTML(selectedVehicle.name)}</h3>
                    <p>${escapeHTML(selectedVehicle.specs)}</p>

                    <div class="heritage-spec-grid">
                        <span>YEAR
                            <strong>${escapeHTML(selectedVehicle.year)}</strong>
                        </span>
                        <span>MILEAGE
                            <strong>${escapeHTML(selectedVehicle.mileage)}</strong>
                        </span>
                        <span>CONDITION
                            <strong>${escapeHTML(selectedVehicle.condition)}</strong>
                        </span>
                        <span>PRICE
                            <strong>${escapeHTML(selectedVehicle.price)}</strong>
                        </span>
                    </div>

                    <button type="button"
                        class="heritage-button heritage-button-dark"
                        id="heritage-detail-ask">
                        Ask via WhatsApp ↗
                    </button>
                `;

                document
                    .getElementById('heritage-detail-ask')
                    ?.addEventListener('click', askAboutSelected);

                panel.scrollIntoView({
                    behavior: 'smooth',
                    block: 'center'
                });
            }

            if (bookingVehicle) {
                const option = Array.from(bookingVehicle.options).find(
                    (item) => item.text.trim() === selectedVehicle.name
                );

                if (option) {
                    bookingVehicle.value = option.value || option.text;
                }
            }
        });
    });

    // AI chatbot — frontend demo.
    const chatPanel = document.getElementById('heritage-chat-panel');
    const chatToggle = document.getElementById('heritage-ai-fab');
    const chatClose = document.getElementById('heritage-chat-close');
    const messages = document.getElementById('heritage-chat-messages');
    const chatForm = document.getElementById('heritage-chat-form');
    const chatInput = document.getElementById('heritage-chat-input');
    const quick = document.getElementById('heritage-chat-quick');

    function toggleChat(open) {
        if (!chatPanel || !chatToggle) return;

        chatPanel.hidden = !open;
        chatToggle.setAttribute('aria-expanded', String(open));

        if (open && chatInput) {
            chatInput.focus();
        }
    }

    if (chatToggle) {
        chatToggle.addEventListener('click', () => {
            toggleChat(chatPanel ? chatPanel.hidden : false);
        });
    }

    if (chatClose) {
        chatClose.addEventListener('click', () => toggleChat(false));
    }

    function getAnswer(question) {
        const q = question.toLowerCase();

        if (/spec|engine|mesin|transmisi|tahun|kilometer|mileage/.test(q)) {
            return selectedVehicle
                ? `${selectedVehicle.name}: ${selectedVehicle.specs}. ` +
                `Tahun ${selectedVehicle.year}, jarak tempuh ` +
                `${selectedVehicle.mileage}, kondisi ` +
                `${selectedVehicle.condition}. Data ini contoh preview; ` +
                'konfirmasi spesifikasi aktual ke showroom.'
                : 'Spesifikasi berbeda menurut unit, tahun, dan varian. ' +
                'Pilih “View details” atau hubungi admin untuk data aktual.';
        }

        if (/stok|tersedia|availability|available|inventory|unit/.test(q)) {
            return 'Ketersediaan unit berubah sewaktu-waktu dan daftar ini masih demo. Hubungi admin WhatsApp untuk mengecek stok aktual.';
        }

        if (/test.?drive|booking|jadwal|appointment|reservasi|viewing/.test(q)) {
            return 'Isi form Arrange a Test Drive. Setelah dikirim, WhatsApp akan terbuka dengan pesan yang siap dikirim ke admin.';
        }

        if (/harga|price|biaya|financing|kredit|cicilan|pembayaran/.test(q)) {
            return 'Harga kartu adalah contoh, bukan penawaran resmi. Konfirmasi harga dan opsi pembiayaan aktual dengan showroom.';
        }

        if (/lokasi|alamat|jam|buka|contact|showroom/.test(q)) {
            return 'Alamat dan jam operasional masih contoh. Jam contoh: Senin–Sabtu, 09.00–18.00 WIB.';
        }

        if (/halo|hai|hi|hello/.test(q)) {
            return 'Welcome to Heritage Motors! Ask me about specifications, availability, test drives, or showroom information.';
        }

        return 'Aku asisten demo Heritage Motors. Aku bisa menjawab pertanyaan umum tentang spesifikasi, stok, test drive, harga contoh, dan showroom. Untuk data aktual, konfirmasi via WhatsApp.';
    }

    function addMessage(text, type) {
        if (!messages) return;

        const bubble = document.createElement('div');
        bubble.className =
            `heritage-chat-message ${type === 'user'
                ? 'heritage-chat-user'
                : 'heritage-chat-bot'
            }`;

        bubble.textContent = text;
        messages.appendChild(bubble);
        messages.scrollTop = messages.scrollHeight;
    }

    function sendMessage(question) {
        question = String(question || '').trim();
        if (!question) return;

        addMessage(question, 'user');
        addMessage(getAnswer(question), 'bot');

        if (chatInput) {
            chatInput.value = '';
        }
    }

    if (chatForm) {
        chatForm.addEventListener('submit', (event) => {
            event.preventDefault();
            sendMessage(chatInput ? chatInput.value : '');
        });
    }

    if (quick) {
        quick.querySelectorAll('[data-chat-question]').forEach((button) => {
            button.addEventListener('click', () => {
                const questions = {
                    inventory: 'Unit apa saja yang tersedia?',
                    specifications: 'Bisa jelaskan spesifikasi kendaraan?',
                    availability: 'Apakah kendaraan masih tersedia?',
                    showroom: 'Bagaimana informasi showroom dan jam buka?'
                };

                sendMessage(
                    questions[button.dataset.chatQuestion] ||
                    'Saya ingin bertanya tentang kendaraan.'
                );
            });
        });
    }

    // Collection page category filters.
    const collectionGrid = document.querySelector('.heritage-collection-grid');
    if (collectionGrid) {
        const filterButtons = Array.from(document.querySelectorAll('[data-filter]'));
        const collectionCards = Array.from(collectionGrid.querySelectorAll('[data-category]'));
        const countLabel = document.getElementById('heritage-collection-count');

        function applyCategoryFilter(category) {
            const chosen = category || 'All vehicles';
            let visible = 0;
            collectionCards.forEach((card) => {
                const show = chosen === 'All vehicles' || card.dataset.category === chosen;
                card.hidden = !show;
                if (show) visible += 1;
            });
            filterButtons.forEach((button) => {
                const active = button.dataset.filter === chosen;
                button.classList.toggle('is-active', active);
                button.setAttribute('aria-pressed', String(active));
            });
            if (countLabel) {
                countLabel.textContent = `Showing ${visible} vehicle${visible === 1 ? '' : 's'}`;
            }
        }

        filterButtons.forEach((button) => {
            button.addEventListener('click', () => {
                applyCategoryFilter(button.dataset.filter);
                const url = new URL(window.location.href);
                if (button.dataset.filter === 'All vehicles') {
                    url.searchParams.delete('category');
                } else {
                    url.searchParams.set('category', button.dataset.filter);
                }
                window.history.replaceState({}, '', url);
            });
        });

        const requestedCategory = new URLSearchParams(window.location.search).get('category');
        const validCategories = ['Classic', 'Sport', 'SUV', 'Daily drive'];
        applyCategoryFilter(validCategories.includes(requestedCategory) ? requestedCategory : 'All vehicles');
    }

})();
