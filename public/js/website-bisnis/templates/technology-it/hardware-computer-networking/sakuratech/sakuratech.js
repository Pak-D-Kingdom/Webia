// SakuraTech template configuration
const SAKURATECH_WA_NUMBER = '6281234567890'; // Ganti dengan nomor WhatsApp bisnis (format internasional tanpa +).

// Custom Tech Reticle Cursor Trail
        const cursor = document.getElementById('custom-cursor');
        document.addEventListener('mousemove', (e) => {
            if (window.matchMedia('(hover: none), (max-width: 768px)').matches) return;
            cursor.style.left = e.clientX + 'px';
            cursor.style.top = e.clientY + 'px';

            if(Math.random() > 0.4) {
                const trail = document.createElement('div');
                trail.className = 'cursor-trail';
                trail.style.left = e.clientX + 'px';
                trail.style.top = e.clientY + 'px';
                document.body.appendChild(trail);
                setTimeout(() => trail.remove(), 500);
            }
        });

        // Mobile Menu Toggle
        document.getElementById('mobile-menu-btn').addEventListener('click', () => {
            const menu = document.getElementById('mobile-menu');
            menu.classList.toggle('hidden');
        });

        // Confetti Burst Trigger
        function triggerConfetti() {
            confetti({
                particleCount: 90,
                spread: 80,
                origin: { y: 0.7 },
                colors: ['#ff2a75', '#00f0ff', '#8a2be2', '#ffffff']
            });
        }

        // Realtime PC Configurator Calculator
        function updatePCConfig() {
            const cpu = document.getElementById('config-cpu');
            const gpu = document.getElementById('config-gpu');
            const mb = document.getElementById('config-mb');
            const ram = document.getElementById('config-ram');
            const ssd = document.getElementById('config-ssd');
            const psu = document.getElementById('config-psu');
            const cooling = document.getElementById('config-cooling');

            const cpuPrice = parseInt(cpu.value) || 0;
            const gpuPrice = parseInt(gpu.value) || 0;
            const mbPrice = parseInt(mb.value) || 0;
            const ramPrice = parseInt(ram.value) || 0;
            const ssdPrice = parseInt(ssd.value) || 0;
            const psuPrice = parseInt(psu.value) || 0;
            const coolingPrice = parseInt(cooling.value) || 0;

            const total = cpuPrice + gpuPrice + mbPrice + ramPrice + ssdPrice + psuPrice + coolingPrice;

            const cpuWatt = parseInt(cpu.options[cpu.selectedIndex]?.dataset.watt) || 0;
            const gpuWatt = parseInt(gpu.options[gpu.selectedIndex]?.dataset.watt) || 0;
            const ramWatt = parseInt(ram.options[ram.selectedIndex]?.dataset.watt) || 0;
            const ssdWatt = parseInt(ssd.options[ssd.selectedIndex]?.dataset.watt) || 0;

            const estimatedWatt = cpuWatt + gpuWatt + ramWatt + ssdWatt + 50;
            const chosenPSUWatt = parseInt(psu.options[psu.selectedIndex]?.dataset.psuwatt) || 0;

            document.getElementById('total-watt').innerText = estimatedWatt + ' Watt';
            
            const wattPercent = Math.min((estimatedWatt / 1000) * 100, 100);
            document.getElementById('watt-bar').style.width = wattPercent + '%';

            const psuWarning = document.getElementById('psu-warning');
            if (chosenPSUWatt > 0 && chosenPSUWatt < estimatedWatt) {
                psuWarning.classList.remove('hidden');
            } else {
                psuWarning.classList.add('hidden');
            }

            const cpuSocket = cpu.options[cpu.selectedIndex]?.dataset.socket;
            const mbSocket = mb.options[mb.selectedIndex]?.dataset.socket;
            const compatBadge = document.getElementById('compat-badge');

            if (cpuSocket && mbSocket && cpuSocket !== 'NONE' && mbSocket !== 'NONE') {
                if (cpuSocket === mbSocket) {
                    compatBadge.className = "bg-emerald-500/20 text-emerald-300 text-[10px] font-mono font-bold px-3 py-1 rounded-full border border-emerald-500/40 flex items-center gap-1";
                    compatBadge.innerHTML = `<i class="fa-solid fa-check-circle"></i> Compatible (${cpuSocket})`;
                } else {
                    compatBadge.className = "bg-rose-500/20 text-rose-300 text-[10px] font-mono font-bold px-3 py-1 rounded-full border border-rose-500/40 flex items-center gap-1";
                    compatBadge.innerHTML = `<i class="fa-solid fa-xmark-circle"></i> Socket Mismatch!`;
                }
            }

            document.getElementById('subtotal-price').innerText = 'Rp ' + total.toLocaleString('id-ID');
            document.getElementById('grand-total-price').innerText = 'Rp ' + total.toLocaleString('id-ID');
        }

        function resetConfigurator() {
            document.getElementById('config-cpu').value = "0";
            document.getElementById('config-gpu').value = "0";
            document.getElementById('config-mb').value = "0";
            document.getElementById('config-ram').value = "0";
            document.getElementById('config-ssd').value = "0";
            document.getElementById('config-psu').value = "0";
            document.getElementById('config-cooling').value = "0";
            updatePCConfig();
        }

        function saveBuildOrder() {
            const total = document.getElementById('grand-total-price').innerText;
            if (total === 'Rp 0') {
                alert('Silakan pilih minimal 1 komponen sebelum memesan!');
                return;
            }
            triggerConfetti();
            const message = encodeURIComponent(`Halo SakuraTech! Saya ingin memesan rakitan PC dengan total: ${total}`);
            window.open(`https://wa.me/${SAKURATECH_WA_NUMBER}?text=${message}`, '_blank', 'noopener');
        }

        function checkSocketCompatibility() {
            const cpu = document.getElementById('quick-cpu-socket').value;
            const mb = document.getElementById('quick-mb-socket').value;
            const res = document.getElementById('quick-compat-result');
            
            res.classList.remove('hidden');
            if (cpu === mb) {
                res.className = "mt-4 p-4 rounded-xl bg-emerald-500/20 border border-emerald-500/40 text-xs font-bold font-mono text-emerald-300 text-center";
                res.innerHTML = `🎉 SYSTEM MATCH! Processor dan Motherboard sama-sama menggunakan socket <strong>${cpu}</strong>. Siap dirakit!`;
                triggerConfetti();
            } else {
                res.className = "mt-4 p-4 rounded-xl bg-rose-500/20 border border-rose-500/40 text-xs font-bold font-mono text-rose-300 text-center";
                res.innerHTML = `⚠️ SYSTEM MISMATCH! Processor (${cpu}) tidak dapat dipasang pada Motherboard (${mb}). Silakan pilih socket yang sama!`;
            }
        }

        // Cart Management
        let cart = [];
        function addToCart(name, price) {
            cart.push({ name, price });
            updateCartUI();
            triggerConfetti();
            toggleModal('cart-modal');
        }

        function updateCartUI() {
            document.getElementById('cart-counter').innerText = cart.length;
            const container = document.getElementById('cart-items');
            if(cart.length === 0) {
                container.innerHTML = `<p class="text-gray-400 text-center py-8">Keranjang belanjaanmu masih kosong ⚡</p>`;
                document.getElementById('cart-total').innerText = 'Rp 0';
                return;
            }

            let html = '';
            let total = 0;
            cart.forEach((item, index) => {
                total += item.price;
                html += `
                    <div class="flex items-center justify-between p-3 rounded-xl bg-white/5 border border-white/10 font-mono">
                        <div>
                            <h5 class="font-bold text-white">${item.name}</h5>
                            <span class="text-cherry-400 font-semibold">Rp ${item.price.toLocaleString('id-ID')}</span>
                        </div>
                        <button onclick="removeFromCart(${index})" class="text-rose-400 hover:text-rose-300"><i class="fa-solid fa-trash"></i></button>
                    </div>
                `;
            });
            container.innerHTML = html;
            document.getElementById('cart-total').innerText = 'Rp ' + total.toLocaleString('id-ID');
        }

        function removeFromCart(index) {
            cart.splice(index, 1);
            updateCartUI();
        }

        function checkoutCart() {
            if(cart.length === 0) { alert('Keranjang masih kosong. Tambahkan produk terlebih dahulu.'); return; }
            const items = cart.map(c => `- ${c.name} (Rp ${c.price.toLocaleString('id-ID')})`).join('\n');
            const total = document.getElementById('cart-total').innerText;
            const msg = `Halo SakuraTech! Saya ingin melanjutkan checkout dan konfirmasi stok item berikut:\n${cart.map(c => `- ${c.name} (Rp ${c.price.toLocaleString('id-ID')})`).join('\n')}\n\nTotal estimasi: ${total}\nMohon konfirmasi ketersediaan, ongkir, dan metode pembayaran.`;
            window.open(`https://wa.me/${SAKURATECH_WA_NUMBER}?text=${encodeURIComponent(msg)}`, '_blank', 'noopener');
        }

        function toggleModal(id) {
            const modal = document.getElementById(id);
            modal.classList.toggle('hidden');
        }

        function toggleFAQ(button) {
            const content = button.nextElementSibling;
            const icon = button.querySelector('i');
            content.classList.toggle('hidden');
            icon.classList.toggle('rotate-180');
        }

        function filterCatalog(category, activeButton) {
            const items = document.querySelectorAll('.product-item');
            const btns = document.querySelectorAll('.cat-btn');
            
            btns.forEach(btn => {
                btn.className = "cat-btn px-4 py-2 rounded-xl font-bold glass-panel text-gray-300 hover:bg-cherry-500/20 transition";
            });
            if (activeButton) activeButton.className = "cat-btn active px-4 py-2 rounded-xl font-bold bg-cherry-500 text-white shadow-lg transition";

            items.forEach(item => {
                if(category === 'all' || item.classList.contains(category)) {
                    item.style.display = 'flex';
                } else {
                    item.style.display = 'none';
                }
            });
        }

        function sendAIMessage() {
            const input = document.getElementById('ai-input');
            const text = input.value.trim();
            if(!text) return;

            const body = document.getElementById('ai-chat-body');
            
            const safeText = text.replace(/[&<>"']/g, char => ({'&':'&amp;','<':'&lt;','>':'&gt;','"':'&quot;',"'":'&#39;'}[char]));
            const userHtml = `
                <div class="flex items-start justify-end gap-2.5">
                    <div class="bg-gradient-to-r from-cherry-500 to-cyber-cyan p-3 rounded-2xl rounded-tr-none text-white font-medium max-w-[85%] font-mono">
                        ${safeText}
                    </div>
                </div>
            `;
            body.innerHTML += userHtml;
            input.value = '';
            body.scrollTop = body.scrollHeight;

            setTimeout(() => {
                let reply = "Saya masih menggunakan mode demo frontend. Tim AI dapat menghubungkan knowledge base dan layanan chatbot di tahap integrasi. Untuk konsultasi produk, silakan kirim pertanyaan melalui WhatsApp SakuraTech.";
                if(text.toLowerCase().includes('wifi') || text.toLowerCase().includes('router') || text.toLowerCase().includes('network')) {
                    reply = "Mode demo: Untuk rekomendasi router, switch, access point, dan instalasi jaringan, silakan lanjutkan konsultasi melalui WhatsApp. 🌐";
                }
                const aiHtml = `
                    <div class="flex items-start gap-2.5 font-mono">
                        <div class="w-8 h-8 rounded-xl bg-cherry-500/20 text-cherry-400 flex items-center justify-center text-sm shrink-0">🤖</div>
                        <div class="bg-cherry-500/10 border border-cherry-500/30 p-3 rounded-2xl rounded-tl-none text-gray-200 leading-relaxed max-w-[85%]">
                            ${reply}
                        </div>
                    </div>
                `;
                body.innerHTML += aiHtml;
                body.scrollTop = body.scrollHeight;
            }, 500);
        }

        function handleRequestSubmit(e) {
            e.preventDefault();
            const form = e.currentTarget;
            const fields = Array.from(form.querySelectorAll('input, select, textarea'));
            const [name, phone, need, budget, notes] = fields.map(field => field.value.trim());
            const message = [
                'Halo SakuraTech! Saya ingin konsultasi / request rakit PC atau instalasi jaringan.',
                '',
                `Nama: ${name || '-'}`,
                `WhatsApp: ${phone || '-'}`,
                `Kebutuhan: ${need || '-'}`,
                `Estimasi budget: ${budget || '-'}`,
                `Catatan: ${notes || '-'}`
            ].join(String.fromCharCode(10));
            triggerConfetti();
            window.open(`https://wa.me/${SAKURATECH_WA_NUMBER}?text=${encodeURIComponent(message)}`, '_blank', 'noopener');
        }

        // CANVAS ANIMATION: CYBER TECH SPARKLES, DATA BINARY (0/1), & CIRCUIT NODES
        const canvas = document.getElementById('sakura-matrix-canvas');
        const ctx = canvas.getContext('2d');
        let width = canvas.width = window.innerWidth;
        let height = canvas.height = window.innerHeight;

        window.addEventListener('resize', () => {
            width = canvas.width = window.innerWidth;
            height = canvas.height = window.innerHeight;
        });

        const particles = Array.from({ length: 65 }, () => ({
            x: Math.random() * width,
            y: Math.random() * height,
            size: Math.random() * 4 + 2,
            speedY: Math.random() * 1.8 + 0.4,
            speedX: Math.random() * 1 - 0.5,
            opacity: Math.random() * 0.7 + 0.3,
            type: Math.floor(Math.random() * 3), // 0: Tech Sparkle, 1: Binary Digit (0/1), 2: Glowing Node
            char: Math.random() > 0.5 ? '1' : '0'
        }));

        function drawParticles() {
            ctx.clearRect(0, 0, width, height);

            particles.forEach(p => {
                ctx.save();
                ctx.globalAlpha = p.opacity;

                if (p.type === 0) {
                    // Cyber Neon Sparkle Star
                    ctx.translate(p.x, p.y);
                    ctx.fillStyle = '#ff2a75';
                    ctx.shadowBlur = 10;
                    ctx.shadowColor = '#ff2a75';
                    ctx.beginPath();
                    ctx.arc(0, 0, p.size / 2, 0, Math.PI * 2);
                    ctx.fill();

                    ctx.strokeStyle = '#00f0ff';
                    ctx.lineWidth = 1;
                    ctx.beginPath();
                    ctx.moveTo(-p.size * 1.5, 0);
                    ctx.lineTo(p.size * 1.5, 0);
                    ctx.moveTo(0, -p.size * 1.5);
                    ctx.lineTo(0, p.size * 1.5);
                    ctx.stroke();
                } else if (p.type === 1) {
                    // Binary Data Stream ('0' or '1')
                    ctx.font = `${Math.floor(p.size * 3 + 9)}px Fira Code`;
                    ctx.fillStyle = p.opacity > 0.5 ? '#00f0ff' : '#ff5e97';
                    ctx.shadowBlur = 8;
                    ctx.shadowColor = ctx.fillStyle;
                    ctx.fillText(p.char, p.x, p.y);
                } else {
                    // Circuit Glowing Particle
                    ctx.fillStyle = '#8a2be2';
                    ctx.shadowBlur = 12;
                    ctx.shadowColor = '#00f0ff';
                    ctx.beginPath();
                    ctx.arc(p.x, p.y, p.size, 0, Math.PI * 2);
                    ctx.fill();
                }

                ctx.restore();

                p.y += p.speedY;
                p.x += p.speedX;

                if (p.y > height) {
                    p.y = -10;
                    p.x = Math.random() * width;
                }
            });

            requestAnimationFrame(drawParticles);
        }
        drawParticles();

// Sakura petal accents: lightweight decorative animation around the page.
(function createSakuraPetals() {
    const reduceMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
    if (reduceMotion) return;
    function spawnPetal() {
        const petal = document.createElement('span');
        petal.className = 'sakura-petal';
        petal.textContent = Math.random() > 0.5 ? '✿' : '❀';
        petal.style.left = Math.random() * 100 + 'vw';
        petal.style.fontSize = (10 + Math.random() * 12) + 'px';
        petal.style.setProperty('--drift', (Math.random() * 140 - 70) + 'px');
        petal.style.animationDuration = (7 + Math.random() * 6) + 's';
        document.body.appendChild(petal);
        window.setTimeout(() => petal.remove(), 14000);
    }
    window.setInterval(spawnPetal, 1100);
})();

// Close modal when clicking its backdrop or pressing Escape.
document.querySelectorAll('#ai-modal, #cart-modal').forEach(modal => {
    modal.addEventListener('click', event => {
        if (event.target === modal) modal.classList.add('hidden');
    });
});
document.addEventListener('keydown', event => {
    if (event.key === 'Escape') {
        document.querySelectorAll('#ai-modal, #cart-modal').forEach(modal => modal.classList.add('hidden'));
    }
});
