// 2. Mobile Nav Toggle
const mobileMenuBtn = document.getElementById('mobile-menu-btn');
const mobileMenu = document.getElementById('mobile-menu');
if (mobileMenuBtn && mobileMenu) {
    mobileMenuBtn.addEventListener('click', () => mobileMenu.classList.toggle('hidden'));
}

// 5. Style Switcher Data & Logic
const styleData = {
    'japandi': {
        tag: 'Japanese Simplicity × Clay Warmth',
        title: 'Terracotta Japandi Sanctuary',
        desc: 'A tranquil fusion of Scandinavian functionalism and rustic Japanese minimalism, grounded by rich matte terracotta plaster walls, light oak woods, and subtle dark stone accents.',
        features: ['Textured Clay Plaster', 'Low Profile Wood Frames', 'Diffused Ambient Lighting', 'Earthy Neutral Linen'],
        img: 'https://images.unsplash.com/photo-1618221195710-dd6b41faaea6?q=80&w=1000&auto=format&fit=crop'
    },
    'organic': {
        tag: 'Raw Earth Elements × Curvaceous Form',
        title: 'Modern Organic Earth',
        desc: 'Emphasizing raw fluid shapes, unpolished terracotta clay columns, micro-cement finishes, and organic monolithic kitchen islands.',
        features: ['Curved Clay Arches', 'Raw Unpolished Terra Tile', 'Monolithic Stone', 'Warm Diffused Strip LED'],
        img: 'https://images.unsplash.com/photo-1600585154340-be6161a56a0c?q=80&w=1000&auto=format&fit=crop'
    },
    'mediterranean': {
        tag: 'Sun-Drenched Clay × Coastal Elegance',
        title: 'Mediterranean Terracotta',
        desc: 'Rich roasted earth brick floorings paired with brushed bronze details, olive green greenery, and warm sun-lit arches.',
        features: ['Handcrafted Clay Roof & Floor Tiles', 'Wrought Iron Accents', 'Textured Terracotta Nooks', 'Natural Warm Light Filter'],
        img: 'https://images.unsplash.com/photo-1600585154526-990dced4db0d?q=80&w=1000&auto=format&fit=crop'
    },
    'industrial': {
        tag: 'Exposed Roasted Brick × Brushed Metallic',
        title: 'Industrial Terracotta Luxe',
        desc: 'A sophisticated dark industrial vibe incorporating exposed dark roasted terracotta bricks, black steel frames, and copper warm spotlights.',
        features: ['Exposed Brickwork', 'Copper Pipe Fixtures', 'Deep Basalt Countertops', 'Warm Industrial Glow'],
        img: 'https://images.unsplash.com/photo-1554118811-1e0d58224f24?q=80&w=1000&auto=format&fit=crop'
    },
    'minimalist': {
        tag: 'Deep Atmosphere × Minimal Clutter',
        title: 'Warm Mood Minimalist',
        desc: 'Stripping away excess white planes in favor of deep terracotta color block walls, recessed warm lighting, and statement monolithic clay furniture.',
        features: ['Color Block Plaster', 'Concealed Storage', 'Sculptural Lighting', 'Seamless Micro-Terracotta Floor'],
        img: 'https://images.unsplash.com/photo-1600607687939-ce8a6c25118c?q=80&w=1000&auto=format&fit=crop'
    }
};

function switchStyle(key) {
    document.querySelectorAll('.style-tab').forEach(btn => {
        btn.classList.remove('bg-terra-700', 'text-terra-100', 'border-copper-light/40');
        btn.classList.add('bg-terra-950', 'text-terra-300', 'border-terra-800');
    });
    const activeBtn = document.querySelector(`[data-tab="${key}"]`);
    if (activeBtn) {
        activeBtn.classList.remove('bg-terra-950', 'text-terra-300', 'border-terra-800');
        activeBtn.classList.add('bg-terra-700', 'text-terra-100', 'border-copper-light/40');
    }

    const data = styleData[key];
    if (data) {
        document.getElementById('style-tag').innerText = data.tag;
        document.getElementById('style-title').innerText = data.title;
        document.getElementById('style-desc').innerText = data.desc;
        document.getElementById('style-img').src = data.img;

        const featsContainer = document.getElementById('style-features');
        featsContainer.innerHTML = data.features.map(f => `
                    <div class="flex items-center space-x-2"><i class="fa-solid fa-leaf text-terra-500"></i><span>${f}</span></div>
                `).join('');
    }
}

// 6. Filterable Portfolio Logic
function filterPortfolio(category) {
    document.querySelectorAll('.port-filter').forEach(btn => {
        btn.classList.remove('bg-terra-700', 'text-terra-100');
        btn.classList.add('bg-terra-950', 'text-terra-300');
    });
    const activeBtn = document.querySelector(`[data-filter="${category}"]`);
    if (activeBtn) {
        activeBtn.classList.remove('bg-terra-950', 'text-terra-300');
        activeBtn.classList.add('bg-terra-700', 'text-terra-100');
    }

    const items = document.querySelectorAll('.port-item');
    items.forEach(item => {
        if (category === 'all' || item.classList.contains(category)) {
            item.style.display = 'block';
        } else {
            item.style.display = 'none';
        }
    });
}

// 7. Interactive Before-and-After Slider Logic
const slider = document.getElementById('ba-slider');
let isSliding = false;

if (slider) {
    const handleMove = (e) => {
        if (!isSliding) return;
        const rect = slider.getBoundingClientRect();
        let x = (e.clientX || (e.touches && e.touches[0].clientX)) - rect.left;
        if (x < 0) x = 0;
        if (x > rect.width) x = rect.width;
        const percent = (x / rect.width) * 100;
        slider.style.setProperty('--slider-pos', `${percent}%`);
    };

    slider.addEventListener('mousedown', () => isSliding = true);
    window.addEventListener('mouseup', () => isSliding = false);
    slider.addEventListener('mousemove', handleMove);

    slider.addEventListener('touchstart', () => isSliding = true);
    window.addEventListener('touchend', () => isSliding = false);
    slider.addEventListener('touchmove', handleMove);
}


// 9. Pricing Package Toggle
let turnkeyMode = false;

const toggleBtn = document.getElementById('pkg-toggle-btn');

if (toggleBtn) {
    toggleBtn.addEventListener('click', () => {
        turnkeyMode = !turnkeyMode;

        toggleBtn.setAttribute(
            'aria-checked',
            String(turnkeyMode)
        );

        const price1 = document.getElementById('price-1');
        const price2 = document.getElementById('price-2');
        const price3 = document.getElementById('price-3');

        if (turnkeyMode) {
            if (price1) price1.innerText = 'IDR 150.000.000+';
            if (price2) price2.innerText = 'IDR 450.000.000+';
            if (price3) price3.innerText = 'IDR 1.2 Billion+';
        } else {
            if (price1) price1.innerText = 'IDR 25.000.000';
            if (price2) price2.innerText = 'IDR 75.000.000';
            if (price3) price3.innerText = 'Custom Quote';
        }
    });
}


// 11. Swatch Viewer Data & Logic
const swatchData = {
    'raw-terra': {
        title: 'Raw Terracotta Clay',
        desc: 'Hand-harvested natural clay baked at low temperatures to retain its porous tactile warmth. Perfect for interior accent walls, arched nooks, and sculptural columns.',
        origin: 'Tuscany & Bali Handcrafted',
        finish: 'Matte Organic Tactile',
        use: 'Feature Walls, Living Rooms'
    },
    'roasted-earth': {
        title: 'Roasted Earth Plaster',
        desc: 'Deep burned sienna plaster formulation giving a moody, dramatic acoustic finish to master bedrooms and private dining spaces.',
        origin: 'Moroccan Tadelakt Blend',
        finish: 'Satin Burnished Plaster',
        use: 'Master Suites, Dining Lounges'
    },
    'brushed-copper': {
        title: 'Brushed Copper Accents',
        desc: 'Hand-brushed copper metallic trims designed to catch ambient warm light softly, accentuating wall panel joints and joinery edges.',
        origin: 'Custom Metalwork Atelier',
        finish: 'Brushed Metallic Polish',
        use: 'Trim Metalwork, Light Grids'
    },
    'warm-sand': {
        title: 'Warm Sand Travertine',
        desc: 'Honed warm beige travertine stone featuring rich natural striations, pairing harmoniously with deep terracotta walls.',
        origin: 'Central Java Quarries',
        finish: 'Honed Low-Gleam Stone',
        use: 'Bathroom Vanities, Flooring'
    },
    'charcoal-stone': {
        title: 'Deep Earth Basalt',
        desc: 'Dark volcanically derived stone providing necessary architectural contrast against warm terracotta surfaces.',
        origin: 'Volcanic Lava Formations',
        finish: 'Flamed & Brushed',
        use: 'Kitchen Countertops, Hearth'
    },
    'terrazzo': {
        title: 'Warm Clay Terrazzo',
        desc: 'Bespoke terrazzo featuring embedded terra fragments, warm cream quartz, and copper aggregate flecks.',
        origin: 'Custom Studio Cast',
        finish: 'Polished Smooth Aggregate',
        use: 'Commercial Floors, Bar Tops'
    }
};

function selectSwatch(key) {
    document.querySelectorAll('.swatch-card').forEach(c => {
        c.classList.remove('border-2', 'border-copper-light');
        c.classList.add('border', 'border-terra-800');
    });
    const card = document.querySelector(`[data-swatch="${key}"]`);
    if (card) {
        card.classList.remove('border-terra-800');
        card.classList.add('border-2', 'border-copper-light');
    }

    const info = swatchData[key];
    if (info) {
        document.getElementById('swatch-title').innerText = info.title;
        document.getElementById('swatch-desc').innerText = info.desc;
        document.getElementById('swatch-origin').innerText = info.origin;
        document.getElementById('swatch-finish').innerText = info.finish;
        document.getElementById('swatch-use').innerText = info.use;
    }
}

// 14. Consultation Booking Toast Notification
function handleBooking(e) {
    e.preventDefault();
    const form = document.getElementById('booking-form');
    if (!form || !form.reportValidity()) return;
    const data = new FormData(form);
    const value = (key) => String(data.get(key) || '-').trim();
    const message = [
        'Halo Terracotta Studio, saya ingin mengajukan konsultasi desain interior.',
        '',
        '*RINGKASAN PERMINTAAN KONSULTASI*',
        'Nama: ' + value('full_name'),
        'Email: ' + value('email'),
        'WhatsApp: ' + value('phone'),
        'Kategori proyek: ' + value('project_category'),
        'Paket yang diminati: ' + value('package_interest'),
        'Estimasi budget: ' + value('budget_range'),
        'Tanggal pilihan: ' + value('preferred_date'),
        'Waktu pilihan: ' + value('preferred_time'),
        'Metode konsultasi: ' + value('consultation_method'),
        'Visi/lokasi proyek: ' + value('project_vision'),
        '',
        'Mohon konfirmasi ketersediaan jadwal dan langkah selanjutnya. Saya memahami bahwa jadwal belum terkonfirmasi sampai admin memberikan konfirmasi.'
    ].join('\n');
    showToast('Ringkasan siap. WhatsApp akan dibuka untuk mengirim permintaan konsultasi.');
    const whatsappUrl = 'https://wa.me/6281234567890?text=' + encodeURIComponent(message);
    window.open(whatsappUrl, '_blank', 'noopener');
}

function showToast(text) {
    const toast = document.getElementById('toast-msg');
    document.getElementById('toast-text').innerText = text;
    toast.classList.remove('hidden');
    setTimeout(() => {
        toast.classList.add('hidden');
    }, 4000);
}

// 16. FAQ Toggle Logic
function toggleFaq(index) {
    const ans = document.getElementById(`faq-ans-${index}`);
    const icon = document.getElementById(`faq-icon-${index}`);
    if (ans) {
        ans.classList.toggle('hidden');
        if (icon) {
            icon.classList.toggle('rotate-180');
        }
    }
}

// 19. Floating Interactive AI Chatbot Logic

function toggleAiModal() {
    const modal = document.getElementById('ai-chat-modal');
    const button = document.getElementById('ai-assistant-button');

    if (!modal) return;

    const isOpening = modal.classList.contains('hidden');

    modal.classList.toggle('hidden', !isOpening);

    if (button) {
        button.setAttribute(
            'aria-expanded',
            String(isOpening)
        );
    }
}


function sendChatMessage() {
    const input = document.getElementById('chat-input');
    const query = input.value.trim();
    if (!query) return;

    const messages = document.getElementById('chat-messages');

    // User Message
    const userBubble = document.createElement('div');
    userBubble.className = 'bg-terra-700 text-terra-100 p-3 rounded-2xl max-w-[85%] ml-auto text-right';
    userBubble.innerText = query;
    messages.appendChild(userBubble);

    input.value = '';
    messages.scrollTop = messages.scrollHeight;

    // Simulated AI Intelligent Response
    setTimeout(() => {
        const aiBubble = document.createElement('div');
        aiBubble.className = 'bg-terra-900/90 border border-terra-800 p-3 rounded-2xl max-w-[85%] text-terra-200';

        let response = "Terima kasih! Terracotta Studio menggabungkan warna earthy, material natural, dan pencahayaan hangat. Untuk saran yang sesuai kebutuhan proyekmu, kamu bisa mengirim detail melalui formulir konsultasi.";
        if (query.toLowerCase().includes('price') || query.toLowerCase().includes('cost') || query.toLowerCase().includes('rate')) {
            response = "Paket konsep desain pada contoh ini mulai dari IDR 25 juta. Estimasi final bergantung pada luas, ruang lingkup, dan spesifikasi. Silakan pilih paket lalu kirim formulir untuk konfirmasi dari admin.";
        } else if (query.toLowerCase().includes('location') || query.toLowerCase().includes('bali') || query.toLowerCase().includes('jakarta')) {
            response = "Referensi studio menampilkan lokasi Jakarta dan Bali serta cakupan proyek internasional. Detail lokasi dan ketersediaan layanan perlu dikonfirmasi langsung dengan admin.";
        }

        aiBubble.innerText = response;
        messages.appendChild(aiBubble);
        messages.scrollTop = messages.scrollHeight;
    }, 800);
}
