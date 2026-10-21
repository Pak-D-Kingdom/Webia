
document.addEventListener('DOMContentLoaded', () => {
    // 1. Initialize Lucide Icons
    if (window.lucide) {
        window.lucide.createIcons();
    }

    // 2. Mobile Menu Toggle
    const menuBtn = document.getElementById('menuBtn');
    const mobileMenu = document.getElementById('mobileMenu');

    if (menuBtn && mobileMenu) {
        menuBtn.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');

            const isOpen = !mobileMenu.classList.contains('hidden');
            menuBtn.setAttribute('aria-expanded', String(isOpen));
        });

        document.querySelectorAll('.mobile-link').forEach((link) => {
            link.addEventListener('click', () => {
                mobileMenu.classList.add('hidden');
                menuBtn.setAttribute('aria-expanded', 'false');
            });
        });
    }

    // 3. Promo Countdown
    const countdown = document.getElementById('countdown');

    if (countdown) {
        let remainingSeconds = 5 * 3600 + 42 * 60 + 19;

        const updateCountdown = () => {
            const hours = String(
                Math.floor(remainingSeconds / 3600)
            ).padStart(2, '0');

            const minutes = String(
                Math.floor((remainingSeconds % 3600) / 60)
            ).padStart(2, '0');

            const seconds = String(
                remainingSeconds % 60
            ).padStart(2, '0');

            countdown.textContent = `${hours}:${minutes}:${seconds}`;
        };

        updateCountdown();

        window.setInterval(() => {
            if (remainingSeconds > 0) {
                remainingSeconds--;
                updateCountdown();
            }
        }, 1000);
    }

    // 4. Before & After Transformation
    window.toggleTransform = function (state) {
        const image = document.getElementById('transformationImg');
        const stateTag = document.getElementById('transformStateTag');
        const description = document.getElementById('transformDesc');
        const btnBefore = document.getElementById('btnBefore');
        const btnAfter = document.getElementById('btnAfter');

        if (!image || !stateTag || !description) return;

        const before = state === 'before';

        image.src = before
            ? 'https://images.unsplash.com/photo-1571772996211-2f02c9727629?auto=format&fit=crop&q=80&w=600'
            : 'https://images.unsplash.com/photo-1588776814546-1ffcf47267a5?auto=format&fit=crop&q=80&w=600';

        image.alt = before
            ? 'Ilustrasi kondisi sebelum perawatan'
            : 'Ilustrasi perawatan gigi';

        stateTag.textContent = before
            ? 'BEFORE - Kondisi Awal Gigi'
            : 'AFTER - 6 Bulan Invisalign';

        stateTag.className = before
            ? 'text-xs font-bold bg-amber-500 px-2.5 py-0.5 rounded-full uppercase tracking-wider text-white'
            : 'text-xs font-bold bg-emerald-500 px-2.5 py-0.5 rounded-full uppercase tracking-wider text-white';

        description.textContent = before
            ? 'Ilustrasi kondisi awal sebelum perawatan.'
            : 'Ilustrasi hasil perawatan. Hasil aktual berbeda pada setiap pasien.';

        if (btnBefore && btnAfter) {
            btnBefore.className = before
                ? 'py-2 text-xs font-bold rounded-lg bg-white text-pink-600 shadow-sm transition'
                : 'py-2 text-xs font-bold rounded-lg text-slate-600 transition';

            btnAfter.className = !before
                ? 'py-2 text-xs font-bold rounded-lg bg-white text-pink-600 shadow-sm transition'
                : 'py-2 text-xs font-bold rounded-lg text-slate-600 transition';

            btnBefore.setAttribute('aria-pressed', String(before));
            btnAfter.setAttribute('aria-pressed', String(!before));
        }
    };

    // 5. Treatment Tabs
    window.switchTab = function (tabKey) {
        const selectedContent = document.getElementById(`content-${tabKey}`);
        const selectedButton = document.getElementById(`tab-${tabKey}`);

        if (!selectedContent || !selectedButton) return;

        document.querySelectorAll('.tab-content').forEach((content) => {
            content.classList.add('hidden');
        });

        document.querySelectorAll('.tab-btn').forEach((button) => {
            button.className =
                'tab-btn px-6 py-3 rounded-2xl font-bold text-sm whitespace-nowrap transition bg-white text-slate-600 hover:bg-slate-200';

            button.setAttribute('aria-selected', 'false');
        });

        selectedContent.classList.remove('hidden');

        selectedButton.className =
            'tab-btn active-tab px-6 py-3 rounded-2xl font-bold text-sm whitespace-nowrap transition bg-sunset-gradient text-white shadow-md';

        selectedButton.setAttribute('aria-selected', 'true');
    };

    // 6. Treatment Price Calculator
    let selectedTenor = 1;

    const treatmentPrices = {
        scaling: 450000,
        whitening: 1950000,
        braces: 7500000,
        invisalign: 18000000,
        veneer: 3200000
    };

    const formatRupiah = (amount) => {
        return 'Rp ' + amount.toLocaleString('id-ID');
    };

    window.setTenor = function (tenor) {
        const allowedTenors = [1, 3, 6, 12];

        if (!allowedTenors.includes(Number(tenor))) return;

        selectedTenor = Number(tenor);

        document.querySelectorAll('.tenor-btn').forEach((button) => {
            button.className =
                'tenor-btn py-2 text-xs font-bold rounded-xl border border-slate-700 bg-slate-800 text-slate-300 hover:border-slate-500';
        });

        const activeButton = document.getElementById(`tenor${selectedTenor}`);

        if (activeButton) {
            activeButton.className =
                'tenor-btn py-2 text-xs font-bold rounded-xl border border-pink-500 bg-pink-500 text-white';
        }

        window.calculatePrice();
    };

    window.calculatePrice = function () {
        const treatmentSelect = document.getElementById('calcTreatment');
        const totalElement = document.getElementById('calcTotal');
        const monthlyElement = document.getElementById('calcMonthly');

        if (!treatmentSelect || !totalElement || !monthlyElement) return;

        const total = treatmentPrices[treatmentSelect.value];

        if (typeof total !== 'number') return;

        const monthly = Math.ceil(total / selectedTenor);

        totalElement.textContent = formatRupiah(total);
        monthlyElement.textContent = selectedTenor > 1
            ? `${formatRupiah(monthly)} / bln`
            : formatRupiah(total);
    };

    const treatmentSelect = document.getElementById('calcTreatment');

    if (treatmentSelect) {
        treatmentSelect.addEventListener('change', window.calculatePrice);
        window.calculatePrice();
    }

    // 7. BOOKING WHATSAPP
    window.handleBooking = function (event) {
        if (event) {
            event.preventDefault();
        }

        const form = document.getElementById('bookingForm');

        if (!form) {
            alert('Form booking tidak ditemukan. Periksa ID bookingForm di Blade.');
            console.error('Form dengan ID bookingForm tidak ditemukan.');
            return;
        }

        if (!form.checkValidity()) {
            form.reportValidity();
            return;
        }

        // Baca data langsung dari elemen form agar tetap bisa
        // mengambil data meskipun atribut name belum lengkap.
        const getFieldValue = (selectors) => {
            for (const selector of selectors) {
                const field = form.querySelector(selector);

                if (field && String(field.value || '').trim() !== '') {
                    return String(field.value).trim();
                }
            }

            return '-';
        };

        const patientName = getFieldValue([
            '[name="name"]', '[name="nama"]',
            '[name="patient_name"]', '#patientName',
            '#bookingName', '#nama'
        ]);

        const phone = getFieldValue([
            '[name="phone"]', '[name="no_hp"]',
            '[name="whatsapp"]', '[name="patient_phone"]',
            '#patientPhone', '#bookingPhone', '#phone'
        ]);

        const treatment = getFieldValue([
            '[name="treatment"]', '[name="perawatan"]',
            '[name="service"]', '#bookingTreatment',
            '#bookingService', '#treatment'
        ]);

        const dentist = getFieldValue([
            '[name="doctor"]', '[name="dokter"]',
            '[name="dentist"]', '#bookingDoctor',
            '#doctor'
        ]);

        const rawDate = getFieldValue([
            '[name="date"]', '[name="tanggal"]',
            '[name="appointment_date"]', '#bookingDate',
            '#appointmentDate', '#date'
        ]);

        const date = rawDate !== '-' && /^\d{4}-\d{2}-\d{2}$/.test(rawDate)
            ? rawDate.split('-').reverse().join('/')
            : rawDate;

        const time = getFieldValue([
            '[name="time"]', '[name="waktu"]',
            '[name="appointment_time"]', '#bookingTime',
            '#appointmentTime', '#time'
        ]);

        const complaint = getFieldValue([
            '[name="complaint"]', '[name="keluhan"]',
            '[name="notes"]', '#bookingComplaint',
            '#complaint', '#notes'
        ]);

        // Format internasional: 62, tanpa tanda +, spasi, atau angka 0 di depan.
        // Ganti jika nomor WhatsApp klinik berbeda.
        const whatsappNumber = '6285850180285';

        const message = [
            '🦷 *RESERVASI APPOINTMENT — SUNSET DENTAL CARE*',
            '',
            'Halo Sunset Dental Care! Saya ingin melakukan reservasi konsultasi dengan detail berikut:',
            '',
            `👤 Nama Pasien: ${patientName}`,
            `📱 Nomor HP: ${phone}`,
            `🩺 Jenis Perawatan: ${treatment}`,
            `👨‍⚕️ Dokter: ${dentist}`,
            `📅 Tanggal Kedatangan: ${date}`,
            `🕐 Pilihan Waktu: ${time}`,
            `📝 Keluhan / Catatan: ${complaint}`,
            '',
            'Mohon konfirmasi ketersediaan jadwal dan informasi selanjutnya.',
            '',
            'Terima kasih! 🙏'
        ].join('\n');

        const whatsappUrl =
            `https://wa.me/${whatsappNumber}?text=${encodeURIComponent(message)}`;

        console.log('Membuka WhatsApp booking:', whatsappUrl);

        // Buka WhatsApp di tab baru; jika popup diblokir,
        // gunakan navigasi pada tab saat ini sebagai cadangan.
        const whatsappWindow = window.open(whatsappUrl, '_blank');

        if (!whatsappWindow) {
            window.location.href = whatsappUrl;
        }
    };

    // 8. Chatbot FAQ Demo
    window.toggleChatbot = function () {
        const chatbotModal = document.getElementById('chatbotModal');

        if (!chatbotModal) return;

        chatbotModal.classList.toggle('hidden');

        const isOpen = !chatbotModal.classList.contains('hidden');

        chatbotModal.setAttribute('aria-hidden', String(!isOpen));

        if (isOpen) {
            document.getElementById('chatInput')?.focus();
        }
    };

    window.sendQuickReply = function (question) {
        window.appendMessage(question, 'user');

        window.setTimeout(() => {
            const normalizedQuestion = question.toLowerCase();
            let answer;

            if (
                normalizedQuestion.includes('harga invisalign') ||
                normalizedQuestion.includes('biaya invisalign')
            ) {
                answer =
                    'Estimasi harga Invisalign pada demo ini mulai Rp18.000.000. Harga aktual perlu dikonfirmasi melalui konsultasi klinik.';
            } else if (
                normalizedQuestion.includes('sakit') ||
                normalizedQuestion.includes('nyeri')
            ) {
                answer =
                    'Tingkat ketidaknyamanan berbeda untuk setiap pasien dan jenis perawatan. Dokter dapat menjelaskan pilihan yang sesuai saat konsultasi.';
            } else if (
                normalizedQuestion.includes('jadwal') ||
                normalizedQuestion.includes('reservasi') ||
                normalizedQuestion.includes('booking')
            ) {
                answer =
                    'Kamu bisa mengisi formulir booking pada halaman ini atau menghubungi klinik melalui WhatsApp.';
            } else {
                answer =
                    'Terima kasih sudah bertanya! Untuk informasi yang lebih spesifik, silakan hubungi staf klinik melalui WhatsApp.';
            }

            window.appendMessage(answer, 'bot');
        }, 500);
    };

    window.sendCustomMessage = function () {
        const input = document.getElementById('chatInput');

        if (!input) return;

        const message = input.value.trim();

        if (!message) return;

        window.appendMessage(message, 'user');
        input.value = '';

        window.setTimeout(() => {
            window.appendMessage(
                'Terima kasih atas pertanyaannya! Chatbot ini masih berupa demo FAQ. Untuk informasi pasti, silakan hubungi staf klinik melalui WhatsApp.',
                'bot'
            );
        }, 500);
    };

    window.appendMessage = function (message, sender) {
        const chatMessages = document.getElementById('chatMessages');

        if (!chatMessages) return;

        const messageElement = document.createElement('div');

        messageElement.className = sender === 'user'
            ? 'bg-sunset-gradient text-white p-3 rounded-2xl rounded-tr-none ml-auto max-w-[80%] shadow-sm'
            : 'bg-white p-3 rounded-2xl rounded-tl-none border border-slate-100 text-slate-700 max-w-[85%] shadow-sm';

        messageElement.textContent = message;

        chatMessages.appendChild(messageElement);
        chatMessages.scrollTop = chatMessages.scrollHeight;
    };

    // Enter to send chatbot message
    const chatInput = document.getElementById('chatInput');

    if (chatInput) {
        chatInput.addEventListener('keydown', (event) => {
            if (event.key === 'Enter' && !event.shiftKey) {
                event.preventDefault();
                window.sendCustomMessage();
            }
        });
    }

    // 9. Smooth Scroll
    document.querySelectorAll('a[href^="#"]').forEach((link) => {
        link.addEventListener('click', (event) => {
            const targetId = link.getAttribute('href');

            if (!targetId || targetId === '#') return;

            const target = document.querySelector(targetId);

            if (!target) return;

            event.preventDefault();

            target.scrollIntoView({
                behavior: 'smooth',
                block: 'start'
            });
        });
    });
});
