
        // 1. Mobile Menu Toggle
        function toggleMobileMenu() {
            const menu = document.getElementById('mobile-menu');
            menu.classList.toggle('hidden');
        }

        // 2. Hero Interactive Image Cycling
        const heroImages = [
            "https://images.unsplash.com/photo-1600585154340-be6161a56a0c?auto=format&fit=crop&w=1200&q=80",
            "https://images.unsplash.com/photo-1600607687939-ce8a6c25118c?auto=format&fit=crop&w=1200&q=80",
            "https://images.unsplash.com/photo-1600566753376-12c8ab7fb75b?auto=format&fit=crop&w=1200&q=80"
        ];
        let heroImgIdx = 0;
        function cycleHeroImage() {
            heroImgIdx = (heroImgIdx + 1) % heroImages.length;
            document.getElementById('hero-interactive-img').src = heroImages[heroImgIdx];
        }

        // 3. Portfolio Filter
        function filterPortfolio(category) {
            const items = document.querySelectorAll('.port-item');
            items.forEach(item => {
                if(category === 'all' || item.classList.contains(category)) {
                    item.style.display = 'block';
                } else {
                    item.style.display = 'none';
                }
            });
        }

        // 4. Project Modal Handler
        function openProjectModal(title, category, sqm, location, img, desc) {
            document.getElementById('modal-title').innerText = title;
            document.getElementById('modal-tag').innerText = category;
            document.getElementById('modal-img').src = img;
            document.getElementById('modal-desc').innerText = desc;
            document.getElementById('modal-specs').innerHTML = `<span>AREA: ${sqm}</span><span>LOCATION: ${location}</span>`;
            document.getElementById('project-modal').classList.remove('hidden');
            document.getElementById('project-modal').classList.add('flex');
        }
        function closeProjectModal() {
            document.getElementById('project-modal').classList.add('hidden');
            document.getElementById('project-modal').classList.remove('flex');
        }

        // 5. Floor Plan Switcher & Hotspots
        function switchFloorLayer(layer) {
            const title = document.getElementById('floor-layer-title');
            if(layer === 'ground') {
                title.innerText = "Ground Level: Grand Living & Courtyard";
            } else if(layer === 'first') {
                title.innerText = "1st Floor: Master Penthouse Suite & Lounge";
            } else {
                title.innerText = "Rooftop Terrace: Biophilic Garden & Sky Pool";
            }
        }
        function showHotspotInfo(title, desc) {
            document.getElementById('hotspot-title').innerText = title;
            document.getElementById('hotspot-desc').innerText = desc;
        }

        // 6. 3D Lighting Simulation Modes
        function setLightingMode(mode) {
            const overlay = document.getElementById('lighting-overlay');
            const tag = document.getElementById('light-mode-tag');
            const lux = document.getElementById('light-lux-meter');
            const title = document.getElementById('light-mode-title');
            const desc = document.getElementById('light-mode-desc');

            if(mode === 'dawn') {
                overlay.className = "absolute inset-0 bg-purple-900/30 transition-all duration-700 pointer-events-none";
                tag.innerText = "DAWN SIMULATION (05:00)";
                lux.innerText = "250 LUX • 4500K";
                title.innerText = "Soft Morning Horizon Glow";
                desc.innerText = "Low intensity ambient light accentuating exterior glass transparency and soft dawn reflections.";
            } else if(mode === 'daylight') {
                overlay.className = "absolute inset-0 bg-amber-500/10 transition-all duration-700 pointer-events-none";
                tag.innerText = "DAYLIGHT SIMULATION (12:00)";
                lux.innerText = "10,000 LUX • 5500K";
                title.innerText = "Natural Solar Horizon";
                desc.innerText = "Full spectrum daylight revealing raw warm travertine texture and natural passive shade overhangs.";
            } else if(mode === 'dusk') {
                overlay.className = "absolute inset-0 bg-orange-600/30 transition-all duration-700 pointer-events-none";
                tag.innerText = "DUSK SIMULATION (18:00)";
                lux.innerText = "1,200 LUX • 3200K";
                title.innerText = "Golden Sunset Crimson";
                desc.innerText = "Warm sunset light bouncing off exterior brushed copper louvers and warm wooden timber textures.";
            } else if(mode === 'night') {
                overlay.className = "absolute inset-0 bg-indigo-950/70 transition-all duration-700 pointer-events-none";
                tag.innerText = "NIGHT SIMULATION (21:00)";
                lux.innerText = "150 LUX • 2700K Warm Glow";
                title.innerText = "Dramatic Night Ambient";
                desc.innerText = "Interior warm amber spotlights highlighting structural architectural contours and moss walls.";
            }
        }

        // 7. Dynamic SQM Calculator
        function updateSqmCalc(val) {
            document.getElementById('sqm-val').innerText = val;
            const cost = val * 150; // $150 average
            document.getElementById('est-cost-display').innerText = '$' + cost.toLocaleString() + ' USD';
        }

        // 8. Testimonials Carousel logic
        const testimonials = [
            { quote: '"Aethel Moss transformed our cliffside plot in Bali into an architectural masterpiece. The passive moss cooling system and full BIM coordination ensured zero construction delays."', author: "Baron Henrik Von Berg", role: "Owner, The Emerald Horizon Villa" },
            { quote: '"Their spatial design for our corporate headquarters in Jakarta achieved LEED Platinum status while creating an iconic urban landmark."', author: "Siddharth Mehta", role: "CEO, Vertex Holdings" }
        ];
        let testIdx = 0;
        function prevTestimonial() {
            testIdx = (testIdx - 1 + testimonials.length) % testimonials.length;
            renderTestimonial();
        }
        function nextTestimonial() {
            testIdx = (testIdx + 1) % testimonials.length;
            renderTestimonial();
        }
        function renderTestimonial() {
            document.getElementById('testimonial-quote').innerText = testimonials[testIdx].quote;
            document.getElementById('testimonial-author').innerText = testimonials[testIdx].author;
            document.getElementById('testimonial-role').innerText = testimonials[testIdx].role;
        }

        // 9. Consultation Multi-Step Wizard
        let currentStep = 1;
        function nextWizardStep(step) {
            document.querySelectorAll('.wizard-step').forEach(el => el.classList.add('hidden'));
            document.getElementById(`wizard-step-${step}`).classList.remove('hidden');
            currentStep = step;
        }
        function selectWizardType(btn, type) {
            document.querySelectorAll('.wiz-type-btn').forEach(b => b.classList.replace('border-champagne-500', 'border-forest-700'));
            btn.classList.replace('border-forest-700', 'border-champagne-500');
        }
        function submitWizard() {
            alert('Thank you for your commission inquiry! An Aethel Moss principal architect will contact you within 24 hours.');
        }

        // 10. FAQ Accordion
        function toggleFaq(id) {
            const ans = document.getElementById(`faq-ans-${id}`);
            ans.classList.toggle('hidden');
        }

        // 11. Floating AI Chatbot
        function toggleAiChatbot() {
            const bot = document.getElementById('ai-chatbot-window');
            if(bot.classList.contains('hidden')) {
                bot.classList.remove('hidden');
                bot.classList.add('flex');
            } else {
                bot.classList.add('hidden');
                bot.classList.remove('flex');
            }
        }
        function handleChatKey(e) {
            if(e.key === 'Enter') sendChatMessage();
        }
        function sendChatMessage() {
    const input = document.getElementById('chat-input');
    const msg = input?.value.trim();
    if (!msg) return;

    const chatBox = document.getElementById('chat-messages');
    if (!chatBox) return;

    const userBubble = document.createElement('div');
    userBubble.className = 'bg-champagne-500 text-forest-900 p-3 rounded-2xl max-w-[85%] ml-auto font-medium';
    userBubble.textContent = msg;
    chatBox.appendChild(userBubble);
    input.value = '';
    chatBox.scrollTop = chatBox.scrollHeight;

    setTimeout(() => {
        let reply = 'Thank you for reaching out! A principal architect can review your project. Use the consultation form to send your project details directly to WhatsApp.';
        if (msg.toLowerCase().includes('price') || msg.toLowerCase().includes('cost') || msg.toLowerCase().includes('budget')) {
            reply = 'The reference packages show indicative fees around $120–$260 USD per SQM. Final pricing depends on project scope and complexity; send a quotation request via the consultation form for confirmation.';
        } else if (msg.toLowerCase().includes('booking') || msg.toLowerCase().includes('consultation') || msg.toLowerCase().includes('reserve')) {
            reply = 'You can request a consultation using the form below. Your details will be prepared in WhatsApp; the studio must confirm the schedule manually.';
        }
        const aiBubble = document.createElement('div');
        aiBubble.className = 'bg-forest-800/80 p-3 rounded-2xl border border-forest-700 text-linen/90 max-w-[85%]';
        aiBubble.textContent = reply;
        chatBox.appendChild(aiBubble);
        chatBox.scrollTop = chatBox.scrollHeight;
    }, 600);
}
    

/* WEBIA integration: consultation wizard -> WhatsApp */
let selectedWizardType = 'Not selected';
let selectedWizardBudget = 'Not selected';

function selectWizardType(btn, type) {
    selectedWizardType = type;
    document.querySelectorAll('.wiz-type-btn').forEach((button) => {
        button.classList.remove('border-champagne-500');
        button.classList.add('border-forest-700');
        button.setAttribute('aria-pressed', 'false');
    });
    btn.classList.remove('border-forest-700');
    btn.classList.add('border-champagne-500');
    btn.setAttribute('aria-pressed', 'true');
}

document.querySelectorAll('[data-budget]').forEach((button) => {
    button.addEventListener('click', () => {
        selectedWizardBudget = button.dataset.budget;
        document.querySelectorAll('[data-budget]').forEach((item) => {
            item.classList.remove('border-champagne-500');
            item.classList.add('border-forest-700');
            item.setAttribute('aria-pressed', 'false');
        });
        button.classList.remove('border-forest-700');
        button.classList.add('border-champagne-500');
        button.setAttribute('aria-pressed', 'true');
    });
});

function submitWizard() {
    const name = document.getElementById('wizard-name')?.value.trim() || '';
    const email = document.getElementById('wizard-email')?.value.trim() || '';
    const phone = document.getElementById('wizard-phone')?.value.trim() || '';
    const location = document.getElementById('wizard-location')?.value.trim() || '';
    const area = document.getElementById('wizard-area')?.value.trim() || '';

    if (!name || !email || !phone) {
        alert('Please fill in your name, email, and WhatsApp number before continuing.');
        nextWizardStep(4);
        return;
    }

    const message = [
        'Hello Aethel Moss Studio, I would like to request an architectural design consultation.',
        '',
        '*PROJECT CONSULTATION REQUEST*',
        'Name: ' + name,
        'Email: ' + email,
        'WhatsApp: ' + phone,
        'Project type: ' + selectedWizardType,
        'Project location: ' + (location || '-'),
        'Estimated land/building area: ' + (area ? area + ' SQM' : '-'),
        'Estimated budget: ' + selectedWizardBudget,
        '',
        'Please contact me to discuss project scope, pricing, and consultation availability. I understand the consultation is not confirmed until the studio replies.'
    ].join('\n');

    window.open('https://wa.me/6281234567890?text=' + encodeURIComponent(message), '_blank', 'noopener,noreferrer');
}

