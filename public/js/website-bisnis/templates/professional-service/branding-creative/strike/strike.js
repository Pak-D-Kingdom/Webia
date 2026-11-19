
        function appData() {
            return {
                lang: 'en',
                mobileNav: false,
                portfolioFilter: 'all',
                toastShow: false,

                // Dynamic Archetype Canvas State
                activeCanvasTitle: 'STUDIO BOLD®',
                activeCanvasBg: '#FF5A36',
                activeCanvasText: '#FFFFFF',
                activeCanvasTag: '[NEO-BRUTALIST SYSTEM]',

                setCanvas(title, bg, text, tag) {
                    this.activeCanvasTitle = title;
                    this.activeCanvasBg = bg;
                    this.activeCanvasText = text;
                    this.activeCanvasTag = tag;
                },

                // Personality Vibe Matrix State
                vibe: 'bold',
                vibeConfigs: {
                    bold: {
                        bg: '#FF5A36',
                        text: '#FFFFFF',
                        accent: '#D7FF00',
                        tag: 'NEO-BRUTALIST',
                        headline: 'HIGH-IMPACT & DISRUPTIVE',
                        desc: 'Unapologetic visual weight, oversized typography, and high-contrast color tokens.',
                        cardBg: '#171717',
                        cardText: '#D7FF00',
                        demoLabel: 'BOLD IDENTITY',
                        demoTag: 'DISRUPTIVE'
                    },
                    luxury: {
                        bg: '#171717',
                        text: '#FFFFFF',
                        accent: '#F5F0E8',
                        tag: 'LUXURY MINIMAL',
                        headline: 'REFINED & ARCHITECTURAL',
                        desc: 'Generous whitespace, thin crisp borders, editorial serif accents, and muted palettes.',
                        cardBg: '#F5F0E8',
                        cardText: '#171717',
                        demoLabel: 'MAISON BOLD',
                        demoTag: 'HIGH-END SYSTEM'
                    },
                    playful: {
                        bg: '#D7FF00',
                        text: '#171717',
                        accent: '#FF5A36',
                        tag: 'ACID PLAYFUL',
                        headline: 'ENERGIZED & EXPERIMENTAL',
                        desc: 'Vibrant lime swatches, dynamic motion badges, and unexpected visual sticker overlays.',
                        cardBg: '#FFFFFF',
                        cardText: '#FF5A36',
                        demoLabel: 'ACID STUDIO',
                        demoTag: 'KINETIC VIBE'
                    },
                    corporate: {
                        bg: '#2563EB',
                        text: '#FFFFFF',
                        accent: '#FFFFFF',
                        tag: 'MODERN CORPORATE',
                        headline: 'HIGH-TRUST & SCALABLE',
                        desc: 'Structured grid alignments, authoritative sans-serif typography, and enterprise clarity.',
                        cardBg: '#FFFFFF',
                        cardText: '#1E3A8A',
                        demoLabel: 'NEXUS TECH',
                        demoTag: 'ENTERPRISE UI'
                    }
                },

                // Typography Tester State
                sampleText: 'STUDIO BOLD® CREATIVE',

                // Hex Copy Helper
                copyHex(hex) {
                    const el = document.createElement('textarea');
                    el.value = hex;
                    document.body.appendChild(el);
                    el.select();
                    document.execCommand('copy');
                    document.body.removeChild(el);

                    this.toastShow = true;
                    setTimeout(() => { this.toastShow = false; }, 2200);
                },

                // Modal State
                modalOpen: false,
                mTitle: '',
                mCategory: '',
                mDesc: '',

                openModal(t, c, d) {
                    this.mTitle = t;
                    this.mCategory = c;
                    this.mDesc = d;
                    this.modalOpen = true;
                },

                // Brief Form
                briefForm: { name: '', email: '', company: '', timeline: '', services: [], notes: '', consultDate: '', consultTime: '' },
                selectedFiles: [],
                whatsappNumber: '6281234567890',
                handleFiles(event) { this.selectedFiles = Array.from(event.target.files || []).map(f => f.name); },
                submitBrief() {
                    const f = this.briefForm;
                    const message = [
                        'Halo STUDIO BOLD! Saya ingin memulai project branding.',
                        `Nama: ${f.name}`, `Email: ${f.email}`, `Brand: ${f.company}`,
                        `Target launch: ${f.timeline || '-'}`, `Layanan: ${(f.services || []).join(', ') || '-'}`,
                        `Preferensi konsultasi: ${f.consultDate || '-'} ${f.consultTime || ''}`,
                        `Catatan: ${f.notes || '-'}`,
                        `File referensi: ${this.selectedFiles.join(', ') || 'Akan saya lampirkan manual di WhatsApp'}`
                    ].join('\n');
                    // Navigate in the current tab so browsers do not block the WhatsApp hand-off as a popup.
                    const whatsappUrl = `https://wa.me/${this.whatsappNumber}?text=${encodeURIComponent(message)}`;
                    window.location.assign(whatsappUrl);
                },

                // AI Chatbot State
                chatInput: '',
                messages: [],
                async sendMessage() {
                    if (!this.chatInput.trim()) return;
                    const q = this.chatInput;
                    this.messages.push({ role: 'user', text: q });
                    this.chatInput = '';

                    setTimeout(() => {
                        const el = document.getElementById('chatWindow');
                        if (el) el.scrollTop = el.scrollHeight;
                    }, 50);

                    const ql = q.toLowerCase();
                    let reply = '⚡ Let’s make it bold. Ceritakan sedikit tentang brand, target audience, dan tantangan visualmu. Tim kami bisa bantu mulai dari discovery hingga brand system.';
                    if (ql.includes('harga') || ql.includes('price') || ql.includes('paket')) reply = 'Paket branding menyesuaikan scope dan deliverables. Pilih kebutuhan di Project Brief Generator agar tim kami dapat menyiapkan estimasi yang relevan.';
                    else if (ql.includes('logo')) reply = 'Logo adalah bagian dari identity system. Kami dapat membantu eksplorasi logo, typography, warna, brand guideline, hingga aplikasi visual.';
                    else if (ql.includes('jadwal') || ql.includes('konsultasi')) reply = 'Kamu bisa memilih tanggal dan waktu konsultasi pada Project Brief Generator. Permintaan jadwal akan dikonfirmasi tim melalui WhatsApp.';
                    this.messages.push({ role: 'bot', text: reply });

                    setTimeout(() => {
                        const el = document.getElementById('chatWindow');
                        if (el) el.scrollTop = el.scrollHeight;
                    }, 50);
                },

                toggleLanguage() {
                    this.lang = this.lang === 'en' ? 'id' : 'en';
                }
            }
        }
    
/* Standalone personality matrix: does not depend on Alpine initialization */
document.addEventListener('DOMContentLoaded', function () {
    const preview = document.getElementById('vibePreview');
    if (!preview) return;
    const configs = {
        bold: {tag:'NEO-BRUTALIST', headline:'HIGH-IMPACT & DISRUPTIVE', desc:'Unapologetic visual weight, oversized typography, and high-contrast color tokens.', label:'BOLD IDENTITY', demo:'DISRUPTIVE'},
        luxury: {tag:'LUXURY MINIMAL', headline:'REFINED & ARCHITECTURAL', desc:'Generous whitespace, thin crisp borders, editorial serif accents, and muted palettes.', label:'MAISON BOLD', demo:'HIGH-END SYSTEM'},
        playful: {tag:'ACID PLAYFUL', headline:'ENERGIZED & EXPERIMENTAL', desc:'Vibrant lime swatches, dynamic motion badges, and unexpected visual sticker overlays.', label:'ACID STUDIO', demo:'KINETIC VIBE'},
        corporate: {tag:'MODERN CORPORATE', headline:'HIGH-TRUST & SCALABLE', desc:'Structured grid alignments, authoritative sans-serif typography, and enterprise clarity.', label:'BOLD BUSINESS', demo:'SCALABLE SYSTEM'}
    };
    const fields = {
        tag: document.getElementById('vibeTag'),
        headline: document.getElementById('vibeHeadline'),
        desc: document.getElementById('vibeDesc'),
        label: document.getElementById('vibeDemoLabel'),
        demo: document.getElementById('vibeDemoTag')
    };
    document.querySelectorAll('.vibe-tab').forEach(function (button) {
        button.addEventListener('click', function () {
            const key = button.dataset.vibe;
            const config = configs[key];
            if (!config) return;
            preview.className = 'vibe-preview vibe-' + key + ' border-brutal-thick p-8 md:p-12 shadow-brutal-lg max-w-4xl mx-auto';
            fields.tag.textContent = config.tag;
            fields.headline.textContent = config.headline;
            fields.desc.textContent = config.desc;
            fields.label.textContent = config.label;
            fields.demo.textContent = config.demo;
            document.querySelectorAll('.vibe-tab').forEach(el => el.classList.toggle('is-active', el === button));
        });
    });
});
