(() => {
    'use strict';
    // Ganti dengan nomor WhatsApp bisnis (format internasional tanpa +).
    const WHATSAPP_NUMBER = '628123456789';
    const $ = (selector, root = document) => root.querySelector(selector);
    const $$ = (selector, root = document) => [...root.querySelectorAll(selector)];
    const rupiah = value => 'Rp ' + Number(value).toLocaleString('id-ID');
    function openWhatsApp(message) {
        window.open(`https://wa.me/${WHATSAPP_NUMBER}?text=${encodeURIComponent(message)}`, '_blank', 'noopener,noreferrer');
    }

    const movingIcons = ['📦', '🚚', '🛋️', '✨', '🏷️'];
    let lastParticleAt = 0;
    document.addEventListener('mousemove', event => {
        if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) return;
        const now = Date.now();
        if (now - lastParticleAt < 90 || Math.random() > 0.18) return;
        lastParticleAt = now;
        const particle = document.createElement('span');
        particle.className = 'cursor-moving-particle';
        particle.textContent = movingIcons[Math.floor(Math.random() * movingIcons.length)];
        particle.style.left = `${event.clientX}px`;
        particle.style.top = `${event.clientY}px`;
        document.body.appendChild(particle);
        window.setTimeout(() => particle.remove(), 800);
    }, { passive: true });

    function updateCostEstimator() {
        const cbmInput = $('#cbmRange'), distInput = $('#distRange');
        if (!cbmInput || !distInput) return;
        const cbm = Number(cbmInput.value), distance = Number(distInput.value);
        const total = 800000 + cbm * 120000 + distance * 10000;
        if ($('#cbmVal')) $('#cbmVal').textContent = `${cbm} m³`;
        if ($('#distVal')) $('#distVal').textContent = `${distance} Km`;
        if ($('#costDisplay')) $('#costDisplay').textContent = rupiah(total);
        return { cbm, distance, total };
    }
    window.updateCostEstimator = updateCostEstimator;
    ['#cbmRange', '#distRange'].forEach(selector => $(selector)?.addEventListener('input', updateCostEstimator));
    updateCostEstimator();

    let selectedProperty = '2BR';
    window.selectProperty = (button, type) => {
        selectedProperty = type;
        $$('.prop-btn').forEach(item => { item.classList.remove('is-selected'); item.setAttribute('aria-pressed', 'false'); });
        button.classList.add('is-selected');
        button.setAttribute('aria-pressed', 'true');
    };

    window.openModal = id => {
        const modal = document.getElementById(id);
        if (!modal) return;
        modal.classList.remove('hidden'); modal.setAttribute('aria-hidden', 'false');
        document.body.classList.add('overflow-hidden');
    };
    window.closeModal = id => {
        const modal = document.getElementById(id);
        if (!modal) return;
        modal.classList.add('hidden'); modal.setAttribute('aria-hidden', 'true');
        document.body.classList.remove('overflow-hidden');
    };
    window.toggleMobileMenu = () => $('#mobileMenu')?.classList.toggle('hidden');
    window.toggleRelokoAi = () => {
        const panel = $('#relokoAiBox');
        if (!panel) return;
        panel.classList.toggle('hidden');
        panel.setAttribute('aria-hidden', panel.classList.contains('hidden') ? 'true' : 'false');
        if (!panel.classList.contains('hidden')) $('#relokoInput')?.focus();
    };
    window.toggleFaq = button => {
        const content = button.nextElementSibling, icon = button.querySelector('i');
        content?.classList.toggle('hidden'); icon?.classList.toggle('rotate-180');
        button.setAttribute('aria-expanded', content && !content.classList.contains('hidden') ? 'true' : 'false');
    };

    $('#journeyForm')?.addEventListener('submit', event => {
        event.preventDefault();
        const fields = $$('input, select', event.currentTarget);
        const estimate = updateCostEstimator() || {};
        openWhatsApp([
            'Halo Reloko, saya ingin meminta estimasi pindahan.',
            `Alamat penjemputan: ${fields[0]?.value?.trim() || '-'}`,
            `Alamat tujuan: ${fields[1]?.value?.trim() || '-'}`,
            `Tipe hunian: ${selectedProperty}`,
            `Tanggal pindahan: ${fields[fields.length - 2]?.value || '-'}`,
            `Paket packing: ${fields[fields.length - 1]?.value || '-'}`,
            `Estimasi volume: ${estimate.cbm ?? '-'} m³`,
            `Estimasi jarak: ${estimate.distance ?? '-'} km`,
            `Estimasi biaya awal: ${estimate.total ? rupiah(estimate.total) : 'Perlu konsultasi'}`,
            'Mohon informasi quotation dan ketersediaan jadwal. Terima kasih.'
        ].join('\n'));
    });

    $('#surveyBookingForm')?.addEventListener('submit', event => {
        event.preventDefault();
        const inputs = $$('input', event.currentTarget);
        const name = inputs[0]?.value?.trim() || '-', phone = inputs[1]?.value?.trim() || '-', date = inputs[2]?.value || '-';
        closeModal('surveyModal');
        openWhatsApp(['Halo Reloko, saya ingin booking survey/konsultasi pindahan.', `Nama: ${name}`, `Nomor WhatsApp: ${phone}`, `Tanggal yang diinginkan: ${date}`, 'Mohon konfirmasi ketersediaan jadwal survey. Terima kasih.'].join('\n'));
    });

    const datePicker = $('#availabilityDate');
    if (datePicker) {
        datePicker.min = new Date().toISOString().slice(0, 10);
        datePicker.addEventListener('change', () => {
            const output = $('#availabilityMessage');
            if (output) output.textContent = datePicker.value
                ? `Tanggal ${datePicker.value} dipilih. Ketersediaan akan dikonfirmasi tim Reloko.`
                : 'Pilih tanggal untuk menyiapkan permintaan jadwal.';
        });
    }

    const checklistItems = $$('.checklist-item');
    function updateChecklistProgress() {
        const done = checklistItems.filter(item => item.checked).length;
        if ($('#checklistProgress')) $('#checklistProgress').textContent = `${done} dari ${checklistItems.length} checklist selesai`;
    }
    checklistItems.forEach(item => item.addEventListener('change', updateChecklistProgress));
    $('#printChecklist')?.addEventListener('click', () => window.print());
    updateChecklistProgress();

    // Connected to AI Assistant service with offline demo fallback
    window.handleRelokoMessage = async event => {
        event.preventDefault();
        const input = $('#relokoInput'), messages = $('#relokoMessages'), value = input?.value?.trim();
        if (!value || !messages) return;
        const userBubble = document.createElement('div');
        userBubble.className = 'bg-tealBrand-600 text-white p-3 rounded-2xl rounded-tr-none font-mono text-xs ml-auto max-w-[80%] shadow-sm';
        userBubble.textContent = value; messages.appendChild(userBubble); input.value = ''; messages.scrollTop = messages.scrollHeight;

        // Indikator respon
        const typingIndicator = document.createElement('div');
        typingIndicator.className = 'bg-white p-3 rounded-2xl rounded-tl-none border border-warmSand-300 text-tealBrand-dark font-mono text-xs max-w-[85%] shadow-sm italic text-gray-400';
        typingIndicator.textContent = 'Menghubungkan ke Asisten Reloko...';
        messages.appendChild(typingIndicator);
        messages.scrollTop = messages.scrollHeight;

        const tenantId = window.PAKDE_TENANT_ID || 'tenant_logistics_01';
        const apiUrl = window.PAKDE_API_URL || 'http://localhost:8001/api/v1/chat';

        try {
            const res = await fetch(apiUrl, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-Site-Key': 'site_webia_public'
                },
                body: JSON.stringify({
                    layer: 'l4',
                    tenant_id: tenantId,
                    messages: [{ role: 'user', content: value }]
                })
            });
            if (!res.ok) throw new Error('API offline');
            const data = await res.json();
            typingIndicator.remove();
            const reply = document.createElement('div');
            reply.className = 'bg-white p-3 rounded-2xl rounded-tl-none border border-warmSand-300 text-tealBrand-dark font-mono text-xs max-w-[85%] shadow-sm';
            reply.textContent = data.reply || data.response || 'Terima kasih! Kebutuhan pindahan Anda siap kami bantu.';
            messages.appendChild(reply);
            messages.scrollTop = messages.scrollHeight;
        } catch (err) {
            typingIndicator.remove();
            const reply = document.createElement('div');
            reply.className = 'bg-white p-3 rounded-2xl rounded-tl-none border border-warmSand-300 text-tealBrand-dark font-mono text-xs max-w-[85%] shadow-sm';
            reply.textContent = 'Terima kasih! Asisten Reloko siap membantu kebutuhan pindahan Anda. Untuk konsultasi langsung atau booking jadwal, silakan hubungi tim kami via WhatsApp.';
            messages.appendChild(reply);
            messages.scrollTop = messages.scrollHeight;
        }
    };

    const canvas = $('#moving-canvas'), context = canvas?.getContext('2d');
    if (canvas && context && !window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
        let particles = [];
        function resizeCanvas() {
            const ratio = Math.min(window.devicePixelRatio || 1, 2);
            canvas.width = Math.floor(window.innerWidth * ratio); canvas.height = Math.floor(window.innerHeight * ratio);
            canvas.style.width = `${window.innerWidth}px`; canvas.style.height = `${window.innerHeight}px`;
            context.setTransform(ratio, 0, 0, ratio, 0, 0);
        }
        class Particle {
            constructor() { this.reset(true); }
            reset(initial = false) {
                this.x = Math.random() * window.innerWidth; this.y = initial ? Math.random() * window.innerHeight : window.innerHeight + 30;
                this.radius = Math.random() * 3 + 1; this.speed = Math.random() * .6 + .15;
                this.color = ['rgba(20,184,166,.25)', 'rgba(245,158,11,.2)', 'rgba(227,211,184,.3)'][Math.floor(Math.random() * 3)];
            }
            update() { this.y -= this.speed; if (this.y < -20) this.reset(); }
            draw() { context.beginPath(); context.arc(this.x, this.y, this.radius, 0, Math.PI * 2); context.fillStyle = this.color; context.fill(); }
        }
        resizeCanvas(); particles = Array.from({ length: 25 }, () => new Particle());
        window.addEventListener('resize', resizeCanvas, { passive: true });
        function animateCanvas() {
            context.clearRect(0, 0, window.innerWidth, window.innerHeight);
            particles.forEach(particle => { particle.update(); particle.draw(); });
            window.requestAnimationFrame(animateCanvas);
        }
        animateCanvas();
    }

    $('#surveyModal')?.addEventListener('click', event => { if (event.target.id === 'surveyModal') closeModal('surveyModal'); });
    document.addEventListener('keydown', event => {
        if (event.key === 'Escape') { closeModal('surveyModal'); $('#relokoAiBox')?.classList.add('hidden'); }
    });
})();