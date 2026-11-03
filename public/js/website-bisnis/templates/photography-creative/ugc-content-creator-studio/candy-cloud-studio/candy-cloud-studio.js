/* CANDY CLOUD STUDIO — interactions extracted from the supplied reference.
   WhatsApp handoff is connected to the configurable CANDY_CLOUD_WA_ADMIN number. */
// CURSOR SPARKLES & FLOWERS
        const cursorIcons = ['✨', '🌸', '💖', '🌼', '🌺'];
        document.addEventListener('mousemove', function(e) {
            if (Math.random() < 0.2) {
                const particle = document.createElement('span');
                particle.className = 'cursor-sparkle';
                particle.innerText = cursorIcons[Math.floor(Math.random() * cursorIcons.length)];
                particle.style.left = e.clientX + 'px';
                particle.style.top = e.clientY + 'px';
                document.body.appendChild(particle);
                setTimeout(() => particle.remove(), 800);
            }
        });

        // UGC FILTERING
        function filterUgc(cat) {
            const btns = document.querySelectorAll('#ugc-filters .ugc-btn');
            btns.forEach(b => b.className = 'ugc-btn px-4 py-2 rounded-full bg-white text-candy-dark border border-candy-pinkLight hover:bg-candy-pinkLight transition');
            event.currentTarget.className = 'ugc-btn active px-4 py-2 rounded-full bg-candy-dark text-white border border-candy-dark transition';

            const cards = document.querySelectorAll('#ugc-cards-grid .ugc-card');
            cards.forEach(card => {
                if (cat === 'all' || card.classList.contains(cat)) card.style.display = 'block';
                else card.style.display = 'none';
            });
        }

        // REEL MODAL PREVIEW
        function playReelModal(title, brand, imgSrc) {
            document.getElementById('reel-modal-title').innerText = title;
            document.getElementById('reel-modal-brand').innerText = brand;
            document.getElementById('reel-modal-img').src = imgSrc;
            document.getElementById('modal-reel').classList.remove('hidden');
        }

        function closeModal(id) { document.getElementById(id).classList.add('hidden'); }
        function openModal(id) { document.getElementById(id).classList.remove('hidden'); }

        // BRAND MATCHBOARD SELECTION
        function selectMatchIndustry(btn, type) {
            document.querySelectorAll('.match-ind').forEach(b => b.classList.remove('bg-candy-pinkLight', 'border-candy-pink'));
            btn.classList.add('bg-candy-pinkLight', 'border-candy-pink');

            const title = document.getElementById('match-title');
            const desc = document.getElementById('match-desc');

            if (type === 'beauty') {
                title.innerText = 'ASMR Unboxing & Texture Close-Ups';
                desc.innerText = 'Menampilkan aplikasi produk di kulit secara bersih dan aesthetic untuk membangun rasa percaya.';
            } else if (type === 'fashion') {
                title.innerText = 'Dynamic OOTD & Styling Transitions';
                desc.innerText = 'Video transisi sesuai audio populer untuk menunjukkan versatility & kenyamanan pakaian.';
            } else if (type === 'food') {
                title.innerText = 'Crisp Audio Recipe & Taste Reaction';
                desc.innerText = 'Suara ASMR tuangan & gigitan produk dipadukan dengan reaksi spontan yang membangkitkan selera penonton.';
            } else {
                title.innerText = 'Day-In-The-Life Vlog & Honest Review';
                desc.innerText = 'Mengintegrasikan produk secara alami dalam rutinitas harian tanpa kesan jualan berlebih.';
            }
        }

        // DYNAMIC PRICING CALCULATOR
        function updateCalculator() {
            const qty = parseInt(document.getElementById('calc-qty').value);
            document.getElementById('calc-qty-val').innerText = qty + (qty > 1 ? ' Videos' : ' Video');
            document.getElementById('calc-total-price').innerText = 'Rp ' + (qty * 1300000).toLocaleString('id-ID');
        }

        function handleBriefSubmit(e) {
            e.preventDefault();
            const form = e.target;
            const fields = form.querySelectorAll('input, textarea');
            const brand = fields[0]?.value.trim() || '-';
            const social = fields[1]?.value.trim() || '-';
            const email = fields[2]?.value.trim() || '-';
            const brief = fields[3]?.value.trim() || '-';
            const qty = document.getElementById('calc-qty')?.value || '3';
            const estimate = document.getElementById('calc-total-price')?.innerText || '-';
            const message = [
                'Halo Candy Cloud Studio! Saya ingin mengajukan kolaborasi campaign.',
                '',
                '*PROJECT BRIEF*',
                'Brand: ' + brand,
                'Instagram/TikTok: ' + social,
                'Email: ' + email,
                'Jumlah video: ' + qty,
                'Estimasi investasi: ' + estimate,
                'Campaign brief: ' + brief,
                '',
                'Mohon informasi ketersediaan jadwal dan konfirmasi dari tim studio. Terima kasih!'
            ].join('\\n');
            const phone = (window.CANDY_CLOUD_WA_ADMIN || '6281234567890').replace(/\\D/g, '');
            window.open('https://wa.me/' + phone + '?text=' + encodeURIComponent(message), '_blank', 'noopener');
        }

        function toggleFaq(btn) {
            const c = btn.nextElementSibling;
            c.classList.toggle('hidden');
        }

        function toggleCandyAi() {
            document.getElementById('candy-ai-window').classList.toggle('hidden');
        }

        function handleCandyAiSubmit(e) {
            e.preventDefault();
            const input = document.getElementById('candy-ai-input');
            const q = input.value.trim();
            if (!q) return;

            const box = document.getElementById('candy-ai-messages');
            const userDiv = document.createElement('div');
            userDiv.className = 'bg-candy-pink text-white p-3 rounded-2xl rounded-tr-none ml-auto max-w-[85%]';
            userDiv.innerText = q;
            box.appendChild(userDiv);
            input.value = '';

            setTimeout(() => {
                const botDiv = document.createElement('div');
                botDiv.className = 'bg-white p-3 rounded-2xl rounded-tl-none border border-candy-pinkLight max-w-[85%]';
                botDiv.innerText = 'Terima kasih pertanyaannya! Tim Candy Cloud Studio siap membantu kebutuhan campaign Anda ✨';
                box.appendChild(botDiv);
                box.scrollTop = box.scrollHeight;
            }, 500);
        }

        // BACKGROUND BUBBLES ANIMATION CANVAS
        const canvas = document.getElementById('bubble-canvas');
        const ctx = canvas.getContext('2d');
        let bubbles = [];

        function resizeCanvas() {
            canvas.width = window.innerWidth;
            canvas.height = window.innerHeight;
        }
        window.addEventListener('resize', resizeCanvas);
        resizeCanvas();

        class Bubble {
            constructor() {
                this.x = Math.random() * canvas.width;
                this.y = canvas.height + Math.random() * 100;
                this.radius = Math.random() * 10 + 4;
                this.speed = Math.random() * 1 + 0.3;
                this.color = ['rgba(255,148,185,0.3)', 'rgba(199,146,234,0.3)', 'rgba(112,214,255,0.3)'][Math.floor(Math.random() * 3)];
            }
            update() {
                this.y -= this.speed;
                if (this.y < -20) {
                    this.y = canvas.height + 20;
                    this.x = Math.random() * canvas.width;
                }
            }
            draw() {
                ctx.beginPath();
                ctx.arc(this.x, this.y, this.radius, 0, Math.PI * 2);
                ctx.fillStyle = this.color;
                ctx.fill();
            }
        }

        for (let i = 0; i < 25; i++) bubbles.push(new Bubble());

        function animateBubbles() {
            ctx.clearRect(0, 0, canvas.width, canvas.height);
            bubbles.forEach(b => { b.update(); b.draw(); });
            requestAnimationFrame(animateBubbles);
        }
        animateBubbles();

// Keep WhatsApp links configurable from the Blade window variable.
document.addEventListener('DOMContentLoaded', function () {
    const phone = (window.CANDY_CLOUD_WA_ADMIN || '6281234567890').replace(/\\D/g, '');
    document.querySelectorAll('a[href*="wa.me/"]').forEach(function (link) {
        const url = new URL(link.href);
        url.pathname = '/' + phone;
        link.href = url.toString();
    });
});

