// CURSOR SPARKLES TRAIL
        const cursorIcons = ['📦', '🍫', '🛵', '🚚', '✨', '🎁'];
        document.addEventListener('mousemove', function(e) {
            if (Math.random() < 0.2) {
                const particle = document.createElement('span');
                particle.className = 'cursor-delivery-particle';
                particle.innerText = cursorIcons[Math.floor(Math.random() * cursorIcons.length)];
                particle.style.left = e.clientX + 'px';
                particle.style.top = e.clientY + 'px';
                document.body.appendChild(particle);
                setTimeout(() => particle.remove(), 850);
            }
        });

        // CALCULATOR FUNCTION
        function calculateShipping(e) {
            e.preventDefault();
            const weight = parseFloat(document.getElementById('packageWeight').value) || 1;
            const service = document.getElementById('serviceType').value;
            let baseRate = 12000;
            let eta = "1-2 Hari Kerja";

            if (service === 'sameday') {
                baseRate = 22000;
                eta = "Hari Ini (Max 3 Jam)";
            } else if (service === 'express') {
                baseRate = 16000;
                eta = "Besok Tiba (Max 24 Jam)";
            }

            const totalPrice = Math.round(baseRate * weight);
            document.getElementById('resPrice').innerText = 'Rp ' + totalPrice.toLocaleString('id-ID');
            document.getElementById('resETA').innerText = 'Estimasi Tiba: ' + eta;
            document.getElementById('calcResult').classList.remove('hidden');
        }

        // TRACK SHIPMENT
        function handleTrackShipment(e) {
            e.preventDefault();
            const resi = document.getElementById('hero-tracking-input').value;
            alert('Mencari status nomor resi: ' + resi + '\nStatus: Kurir Budi Santoso sedang menuju lokasi penerima.');
        }

        // PICKUP FORM SUBMIT
        function handlePickupSubmit(e) {
            e.preventDefault();
            const form = e.target;
            const values = Array.from(form.querySelectorAll('input, select, textarea')).map(el => el.value.trim());
            const message = [
                'Halo CocoExpress! Saya ingin mengajukan jadwal pickup paket.',
                '',
                '*PERMINTAAN PICKUP*',
                'Nama pengirim: ' + (values[0] || '-'),
                'WhatsApp: ' + (values[1] || '-'),
                'Alamat pickup: ' + (values[2] || '-'),
                'Tanggal pickup: ' + (values[3] || '-'),
                'Slot waktu: ' + (values[4] || '-'),
                '',
                'Mohon konfirmasi ketersediaan jadwal dan biaya pengiriman. Permintaan ini menunggu konfirmasi admin.'
            ].join('\\n');
            sendCocoWhatsApp(message);
        }


        // WHATSAPP INQUIRY HANDOFF — requests are not confirmed until admin replies.
        function sendCocoWhatsApp(message) {
            const phone = (window.COCOEXPRESS_WA_ADMIN || '6281234567890').replace(/\\D/g, '');
            window.open('https://wa.me/' + phone + '?text=' + encodeURIComponent(message), '_blank', 'noopener');
        }

        function handleOrderSubmit(e) {
            e.preventDefault();
            const form = e.target;
            const values = Array.from(form.querySelectorAll('input, textarea')).map(el => el.value.trim());
            const message = [
                'Halo CocoExpress! Saya ingin mengajukan order pengiriman paket.',
                '',
                '*ORDER PENGIRIMAN*',
                'Nama: ' + (values[0] || '-'),
                'WhatsApp: ' + (values[1] || '-'),
                'Alamat pickup: ' + (values[2] || '-'),
                'Alamat tujuan: ' + (values[3] || '-'),
                'Jumlah paket: ' + (values[4] || '1'),
                '',
                'Mohon dibantu proses dan konfirmasi detail pengiriman. Order belum terkonfirmasi sebelum admin membalas.'
            ].join('\\n');
            closeModal('orderModal');
            sendCocoWhatsApp(message);
        }

        function handleBusinessSubmit(e) {
            e.preventDefault();
            const form = e.target;
            const values = Array.from(form.querySelectorAll('input, textarea')).map(el => el.value.trim());
            const message = [
                'Halo CocoExpress! Saya tertarik mendaftar sebagai mitra bisnis.',
                '',
                '*PENDAFTARAN COCOPARTNER*',
                'Nama bisnis: ' + (values[0] || '-'),
                'PIC: ' + (values[1] || '-'),
                'WhatsApp: ' + (values[2] || '-'),
                'Email: ' + (values[3] || '-'),
                'Kebutuhan pengiriman: ' + (values[4] || '-'),
                '',
                'Mohon informasi paket kemitraan dan proses selanjutnya.'
            ].join('\\n');
            closeModal('businessModal');
            sendCocoWhatsApp(message);
        }

        // FAQ ACCORDION
        function toggleFaq(btn) {
            const content = btn.nextElementSibling;
            const icon = btn.querySelector('i');
            content.classList.toggle('hidden');
            icon.classList.toggle('rotate-180');
        }

        // MODAL CONTROLS
        function openModal(id) { document.getElementById(id).classList.remove('hidden'); }
        function closeModal(id) { document.getElementById(id).classList.add('hidden'); }

        // AI CHATBOT
        function toggleAiChat() {
            document.getElementById('aiChatBox').classList.toggle('hidden');
        }

        function handleAiMessage(e) {
            e.preventDefault();
            const input = document.getElementById('aiInput');
            const messages = document.getElementById('chatMessages');
            const val = input.value.trim();
            if(!val) return;

            // User Message
            const userDiv = document.createElement('div');
            userDiv.className = 'bg-coco-caramel text-white p-3 rounded-2xl rounded-tr-none font-mono text-xs ml-auto max-w-[80%] shadow-sm';
            userDiv.innerText = val;
            messages.appendChild(userDiv);

            input.value = '';
            messages.scrollTop = messages.scrollHeight;

            // Bot Response Simulation
            setTimeout(() => {
                const botDiv = document.createElement('div');
                botDiv.className = 'bg-white p-3 rounded-2xl rounded-tl-none border border-coco-caramel/20 text-coco-dark font-mono text-xs max-w-[85%] shadow-sm';
                botDiv.innerText = 'Terima kasih atas pertanyaannya! Tim kurir CocoExpress siap membantu Anda 24/7.';
                messages.appendChild(botDiv);
                messages.scrollTop = messages.scrollHeight;
            }, 600);
        }

        // MOBILE MENU TOGGLE
        function toggleMobileMenu() {
            document.getElementById('mobileMenu').classList.toggle('hidden');
        }

        // BACKGROUND CANVAS ANIMATION
        const canvas = document.getElementById('choco-canvas');
        const ctx = canvas.getContext('2d');
        let particles = [];

        function resizeCanvas() {
            canvas.width = window.innerWidth;
            canvas.height = window.innerHeight;
        }
        window.addEventListener('resize', resizeCanvas);
        resizeCanvas();

        class ChocoParticle {
            constructor() { this.reset(); }
            reset() {
                this.x = Math.random() * canvas.width;
                this.y = canvas.height + Math.random() * 60;
                this.radius = Math.random() * 6 + 2;
                this.speed = Math.random() * 0.8 + 0.2;
                this.color = ['rgba(217,130,43,0.3)', 'rgba(92,58,41,0.25)', 'rgba(255,249,242,0.4)'][Math.floor(Math.random() * 3)];
                this.isParcel = Math.random() < 0.12;
            }
            update() {
                this.y -= this.speed;
                if (this.y < -30) this.reset();
            }
            draw() {
                if (this.isParcel) {
                    ctx.font = '14px sans-serif';
                    ctx.fillText('📦', this.x, this.y);
                } else {
                    ctx.beginPath();
                    ctx.arc(this.x, this.y, this.radius, 0, Math.PI * 2);
                    ctx.fillStyle = this.color;
                    ctx.fill();
                }
            }
        }

        for (let i = 0; i < 30; i++) particles.push(new ChocoParticle());

        function animateCanvas() {
            ctx.clearRect(0, 0, canvas.width, canvas.height);
            particles.forEach(p => { p.update(); p.draw(); });
            requestAnimationFrame(animateCanvas);
        }
        animateCanvas();

// Apply configured admin WhatsApp number to all existing wa.me anchors.
document.addEventListener('DOMContentLoaded', function () {
    const phone = (window.COCOEXPRESS_WA_ADMIN || '6281234567890').replace(/\\D/g, '');
    document.querySelectorAll('a[href*="wa.me/"]').forEach(function (link) {
        link.href = 'https://wa.me/' + phone;
    });
});
