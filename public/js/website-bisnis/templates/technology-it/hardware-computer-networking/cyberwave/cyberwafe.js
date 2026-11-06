
        // CYBERWAVE TEMPLATE CONFIG
const CYBERWAVE_WA_NUMBER = '6281234567890'; // Ganti dengan nomor WhatsApp admin tanpa tanda +
const cyberwaveWa = (message) => `https://wa.me/${CYBERWAVE_WA_NUMBER}?text=${encodeURIComponent(message)}`;
document.querySelectorAll('.js-cyberwave-wa').forEach(link => {
    link.href = `https://wa.me/${CYBERWAVE_WA_NUMBER}`;
});
const escapeCyberwaveHTML = (value) => String(value).replace(/[&<>"']/g, (char) => ({
    '&': '&amp;', '<': '&lt;', '>': '&gt;', '"': '&quot;', "'": '&#39;'
}[char]));

// Custom Tech Reticle Cursor Trail
        const cursor = document.getElementById('custom-cursor');
        document.addEventListener('mousemove', (e) => {
            if (window.matchMedia('(pointer: coarse)').matches) return;
            cursor.style.left = e.clientX + 'px';
            cursor.style.top = e.clientY + 'px';

            if(Math.random() > 0.4) {
                const trail = document.createElement('div');
                trail.className = 'cursor-trail';
                trail.style.left = e.clientX + 'px';
                trail.style.top = e.clientY + 'px';
                document.body.appendChild(trail);
                setTimeout(() => trail.remove(), 400);
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
                particleCount: 80,
                spread: 70,
                origin: { y: 0.7 },
                colors: ['#00F0FF', '#0066FF', '#E0F7FC', '#00FF9D']
            });
        }

        // Benchmark Interactive Visualizer Updates
        const benchData = {
            '4090': { name: 'NVIDIA RTX 4090', fps: 142, points: 40850 },
            '4080': { name: 'NVIDIA RTX 4080 Super', fps: 118, points: 38200 },
            '4070': { name: 'NVIDIA RTX 4070 Ti Super', fps: 88, points: 34100 },
            '4060': { name: 'NVIDIA RTX 4060 Ti', fps: 62, points: 24500 }
        };

        function updateBenchmarkVisual() {
            const aKey = document.getElementById('bench-hardware-a').value;
            const bKey = document.getElementById('bench-hardware-b').value;

            const a = benchData[aKey];
            const b = benchData[bKey];

            document.getElementById('score-a-1').innerText = a.fps + ' FPS';
            document.getElementById('score-b-1').innerText = b.fps + ' FPS';

            document.getElementById('score-a-2').innerText = a.points.toLocaleString() + ' Pts';
            document.getElementById('score-b-2').innerText = b.points.toLocaleString() + ' Pts';

            document.getElementById('bar-a-1').style.width = Math.min((a.fps / 160) * 100, 100) + '%';
            document.getElementById('bar-b-1').style.width = Math.min((b.fps / 160) * 100, 100) + '%';

            document.getElementById('bar-a-2').style.width = Math.min((a.points / 45000) * 100, 100) + '%';
            document.getElementById('bar-b-2').style.width = Math.min((b.points / 45000) * 100, 100) + '%';
        }

        function setBenchWorkload(type) {
            const btns = ['gaming', 'rendering', 'ai'];
            btns.forEach(b => {
                const el = document.getElementById(`btn-workload-${b}`);
                if(b === type) {
                    el.className = "px-3 py-2 rounded-xl font-bold border border-cyber-cyan bg-cyber-cyan/20 text-cyber-cyan";
                } else {
                    el.className = "px-3 py-2 rounded-xl font-bold border border-white/10 hover:border-cyber-cyan text-gray-300";
                }
            });

            if(type === 'gaming') {
                document.getElementById('bench-label-1').innerText = '4K Cyberpunk 2077 RayTracing (FPS)';
                document.getElementById('bench-label-2').innerText = 'Cinebench R23 Multi-Core (Points)';
            } else if(type === 'rendering') {
                document.getElementById('bench-label-1').innerText = 'Blender 3D Render Time (Secs - Lower Best)';
                document.getElementById('bench-label-2').innerText = 'V-Ray GPU Render Benchmark Score';
            } else {
                document.getElementById('bench-label-1').innerText = 'LLM Tokens Generated per Sec (T/s)';
                document.getElementById('bench-label-2').innerText = 'Tensor Core FP16 TFLOPS';
            }
            updateBenchmarkVisual();
        }

        // PC Configurator Calculator
        function setBuildCategory(cat) {
            const tabs = ['gaming', 'workstation', 'server'];
            tabs.forEach(t => {
                const el = document.getElementById(`tab-cat-${t}`);
                if(t === cat) {
                    el.className = "px-6 py-3 rounded-xl font-bold bg-gradient-to-r from-cyber-blue to-cyber-cyan text-cyber-midnight shadow-lg transition";
                } else {
                    el.className = "px-6 py-3 rounded-xl font-bold cyber-glass hover:border-cyber-cyan text-gray-300 transition";
                }
            });
        }

        function calcPCConfig() {
            const cpu = document.getElementById('config-cpu');
            const gpu = document.getElementById('config-gpu');
            const ram = document.getElementById('config-ram');
            const psu = document.getElementById('config-psu');

            const cpuPrice = parseInt(cpu.value) || 0;
            const gpuPrice = parseInt(gpu.value) || 0;
            const ramPrice = parseInt(ram.value) || 0;
            const psuPrice = parseInt(psu.value) || 0;

            const total = cpuPrice + gpuPrice + ramPrice + psuPrice;

            const cpuWatt = parseInt(cpu.options[cpu.selectedIndex]?.dataset.watt) || 0;
            const gpuWatt = parseInt(gpu.options[gpu.selectedIndex]?.dataset.watt) || 0;
            const ramWatt = parseInt(ram.options[ram.selectedIndex]?.dataset.watt) || 0;

            const watt = cpuWatt + gpuWatt + ramWatt + 60;
            document.getElementById('calc-watt').innerText = watt + ' Watt';
            document.getElementById('calc-watt-bar').style.width = Math.min((watt / 1200) * 100, 100) + '%';

            document.getElementById('calc-subtotal').innerText = 'Rp ' + total.toLocaleString('id-ID');
            document.getElementById('calc-total').innerText = 'Rp ' + total.toLocaleString('id-ID');
        }

        function saveBuildRequest() {
            const total = document.getElementById('calc-total').innerText;
            const selected = ['config-cpu', 'config-gpu', 'config-ram', 'config-psu'].map(id => {
                const select = document.getElementById(id);
                return `${select.previousElementSibling?.innerText || id}: ${select.options[select.selectedIndex]?.text || '-'}`;
            }).join('\\n');
            if(total === 'Rp 0') {
                alert('Pilih komponen terlebih dahulu!');
                return;
            }
            triggerConfetti();
            window.open(cyberwaveWa(`Halo CYBERWAVE! Saya ingin memesan rakitan system.\\n${selected}\\nEstimasi total: ${total}`), '_blank');
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
                container.innerHTML = `<p class="text-gray-400 text-center py-8">No hardware components selected ⚡</p>`;
                document.getElementById('cart-total').innerText = 'Rp 0';
                return;
            }

            let html = '';
            let total = 0;
            cart.forEach((item, index) => {
                total += item.price;
                html += `
                    <div class="flex items-center justify-between p-3 rounded-xl bg-cyber-midnight border border-cyber-cyan/30">
                        <div>
                            <h5 class="font-bold text-white">${item.name}</h5>
                            <span class="text-cyber-cyan font-semibold">Rp ${item.price.toLocaleString('id-ID')}</span>
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
            if(cart.length === 0) return;
            const items = cart.map(c => `- ${c.name} (Rp ${c.price.toLocaleString('id-ID')})`).join('\\n');
            const total = document.getElementById('cart-total').innerText;
            window.open(cyberwaveWa(`Halo CYBERWAVE! Saya ingin memesan hardware berikut:\n${items}\n\nTotal: ${total}`), '_blank');
        }

        function toggleModal(id) {
            document.getElementById(id).classList.toggle('hidden');
        }

        function toggleFAQ(button) {
            const content = button.nextElementSibling;
            const icon = button.querySelector('i');
            content.classList.toggle('hidden');
            icon.classList.toggle('rotate-180');
        }

        function sendAIMessage() {
            const input = document.getElementById('ai-input');
            const text = input.value.trim();
            if(!text) return;

            const body = document.getElementById('ai-chat-body');
            body.innerHTML += `
                <div class="flex items-start justify-end gap-2.5">
                    <div class="bg-gradient-to-r from-cyber-blue to-cyber-cyan p-3 rounded-2xl rounded-tr-none text-cyber-midnight font-bold max-w-[85%] font-mono">
                        ${escapeCyberwaveHTML(text)}
                    </div>
                </div>
            `;
            input.value = '';
            body.scrollTop = body.scrollHeight;

            setTimeout(() => {
                let reply = "Untuk throughput maksimal pada server cluster, disarankan menggunakan konfigurasi **4U High-Density GPU Compute Nodes** dengan jaringan 100G Spine-Leaf Mesh.";
                if(text.toLowerCase().includes('gpu') || text.toLowerCase().includes('4090')) {
                    reply = "**NVIDIA RTX 4090 24GB Liquid Armor** adalah pilihan terbaik untuk AI Tensor Processing & Ultra 4K Gaming!";
                }
                body.innerHTML += `
                    <div class="flex items-start gap-2.5 font-mono">
                        <div class="w-8 h-8 rounded-xl bg-cyber-cyan/20 text-cyber-cyan flex items-center justify-center text-sm shrink-0">🤖</div>
                        <div class="bg-cyber-midnight border border-cyber-cyan/30 p-3 rounded-2xl rounded-tl-none text-gray-200 leading-relaxed max-w-[85%]">
                            ${reply}
                        </div>
                    </div>
                `;
                body.scrollTop = body.scrollHeight;
            }, 500);
        }

        function handleConsultationSubmit(e) {
            e.preventDefault();
            const form = e.currentTarget;
            const data = new FormData(form);
            const message = [
                'Halo CYBERWAVE! Saya ingin konsultasi teknis.',
                `Nama / Perusahaan: ${data.get('company') || '-'}`,
                `WhatsApp: ${data.get('phone') || '-'}`,
                `Layanan: ${data.get('service') || '-'}`,
                `Jadwal konsultasi yang diinginkan: ${data.get('schedule') || 'Mohon dijadwalkan'}`,
                `Kebutuhan: ${data.get('requirements') || '-'}`
            ].join('\\n');
            triggerConfetti();
            window.open(cyberwaveWa(message), '_blank');
            toggleModal('consultation-modal');
            form.reset();
        }

        // BACKGROUND CANVAS (CYBERWAVE QUANTUM GRID & NODE PARTICLES)
        const bgCanvas = document.getElementById('cyberwave-bg-canvas');
        const bgCtx = bgCanvas.getContext('2d');
        let bgWidth = bgCanvas.width = window.innerWidth;
        let bgHeight = bgCanvas.height = window.innerHeight;

        window.addEventListener('resize', () => {
            bgWidth = bgCanvas.width = window.innerWidth;
            bgHeight = bgCanvas.height = window.innerHeight;
            initTopologyCanvas();
        });

        const bgParticles = Array.from({ length: 50 }, () => ({
            x: Math.random() * bgWidth,
            y: Math.random() * bgHeight,
            size: Math.random() * 3 + 1,
            speedY: Math.random() * 1 + 0.3,
            opacity: Math.random() * 0.7 + 0.3
        }));

        function drawBgParticles() {
            bgCtx.clearRect(0, 0, bgWidth, bgHeight);
            bgParticles.forEach(p => {
                bgCtx.save();
                bgCtx.globalAlpha = p.opacity;
                bgCtx.fillStyle = '#00F0FF';
                bgCtx.shadowBlur = 8;
                bgCtx.shadowColor = '#0066FF';
                bgCtx.beginPath();
                bgCtx.arc(p.x, p.y, p.size, 0, Math.PI * 2);
                bgCtx.fill();
                bgCtx.restore();

                p.y += p.speedY;
                if(p.y > bgHeight) p.y = -5;
            });
            requestAnimationFrame(drawBgParticles);
        }
        drawBgParticles();

        // NETWORK TOPOLOGY NODE GRAPH CANVAS
        let topCanvas, topCtx, nodes = [];
        function initTopologyCanvas() {
            topCanvas = document.getElementById('topology-canvas');
            if(!topCanvas) return;
            topCtx = topCanvas.getContext('2d');
            topCanvas.width = topCanvas.parentElement.clientWidth;
            topCanvas.height = topCanvas.parentElement.clientHeight;

            nodes = Array.from({ length: 18 }, () => ({
                x: Math.random() * (topCanvas.width - 40) + 20,
                y: Math.random() * (topCanvas.height - 40) + 20,
                vx: (Math.random() - 0.5) * 1.2,
                vy: (Math.random() - 0.5) * 1.2,
                radius: Math.random() * 4 + 3
            }));
        }
        initTopologyCanvas();

        function drawTopologyNodes() {
            if(!topCtx) return;
            topCtx.clearRect(0, 0, topCanvas.width, topCanvas.height);

            // Draw Connection Lines
            for(let i = 0; i < nodes.length; i++) {
                for(let j = i + 1; j < nodes.length; j++) {
                    const dx = nodes[i].x - nodes[j].x;
                    const dy = nodes[i].y - nodes[j].y;
                    const dist = Math.sqrt(dx * dx + dy * dy);

                    if(dist < 130) {
                        topCtx.save();
                        topCtx.strokeStyle = `rgba(0, 240, 255, ${1 - dist / 130})`;
                        topCtx.lineWidth = 1;
                        topCtx.beginPath();
                        topCtx.moveTo(nodes[i].x, nodes[i].y);
                        topCtx.lineTo(nodes[j].x, nodes[j].y);
                        topCtx.stroke();
                        topCtx.restore();
                    }
                }
            }

            // Draw Nodes & Move
            nodes.forEach(n => {
                topCtx.save();
                topCtx.fillStyle = '#00F0FF';
                topCtx.shadowBlur = 10;
                topCtx.shadowColor = '#0066FF';
                topCtx.beginPath();
                topCtx.arc(n.x, n.y, n.radius, 0, Math.PI * 2);
                topCtx.fill();
                topCtx.restore();

                n.x += n.vx;
                n.y += n.vy;

                if(n.x < 10 || n.x > topCanvas.width - 10) n.vx *= -1;
                if(n.y < 10 || n.y > topCanvas.height - 10) n.vy *= -1;
            });

            requestAnimationFrame(drawTopologyNodes);
        }
        drawTopologyNodes();

        // Close mobile navigation after selecting a section
        document.querySelectorAll('#mobile-menu a').forEach(link => {
            link.addEventListener('click', () => document.getElementById('mobile-menu').classList.add('hidden'));
        });
        // Initialize benchmark values from the selected hardware
        updateBenchmarkVisual();
    