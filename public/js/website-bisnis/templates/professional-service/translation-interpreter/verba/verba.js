
        // MULTILINGUAL TYPING ANIMATION IN HERO
        const phrases = [
            "Legal & Sworn Court Certification.",
            "Deep Literary & Editorial Transcreation.",
            "Diplomatic & Conference Interpreters.",
            "Technical & Medical Precision in 120+ Languages."
        ];
        let phraseIdx = 0;
        let charIdx = 0;
        let isDeleting = false;
        const typingElem = document.getElementById('typingText');

        function typeLoop() {
            const currentPhrase = phrases[phraseIdx];
            if (isDeleting) {
                typingElem.textContent = currentPhrase.substring(0, charIdx - 1);
                charIdx--;
            } else {
                typingElem.textContent = currentPhrase.substring(0, charIdx + 1);
                charIdx++;
            }

            if (!isDeleting && charIdx === currentPhrase.length) {
                isDeleting = true;
                setTimeout(typeLoop, 2000);
            } else if (isDeleting && charIdx === 0) {
                isDeleting = false;
                phraseIdx = (phraseIdx + 1) % phrases.length;
                setTimeout(typeLoop, 500);
            } else {
                setTimeout(typeLoop, isDeleting ? 40 : 80);
            }
        }
        window.addEventListener('load', typeLoop);

        // ENHANCED THREE.JS 3D SPINNING GLOBE CANVAS
        let scene, camera, renderer, globeGroup, ringGroup;

        function initThreeGlobe() {
            const container = document.getElementById('heroCanvasContainer');
            if (!container) return;

            scene = new THREE.Scene();
            camera = new THREE.PerspectiveCamera(45, container.clientWidth / container.clientHeight, 0.1, 1000);
            camera.position.z = 250;

            renderer = new THREE.WebGLRenderer({ alpha: true, antialias: true });
            renderer.setSize(container.clientWidth, container.clientHeight);
            renderer.setPixelRatio(window.devicePixelRatio);
            container.appendChild(renderer.domElement);

            globeGroup = new THREE.Group();
            ringGroup = new THREE.Group();
            scene.add(globeGroup);
            scene.add(ringGroup);

            // Create Inner Glowing Core Globe
            const coreGeo = new THREE.SphereGeometry(75, 32, 32);
            const coreMat = new THREE.MeshBasicMaterial({
                color: 0x242424,
                wireframe: false
            });
            const coreMesh = new THREE.Mesh(coreGeo, coreMat);
            globeGroup.add(coreMesh);

            // Create Celestial Earth Wireframe Mesh
            const geometry = new THREE.IcosahedronGeometry(82, 3);
            const material = new THREE.MeshBasicMaterial({
                color: 0xE6B566,
                wireframe: true,
                transparent: true,
                opacity: 0.35
            });
            const globeMesh = new THREE.Mesh(geometry, material);
            globeGroup.add(globeMesh);

            // Create Outer Orbiting Rings
            const ringGeo = new THREE.TorusGeometry(115, 0.8, 16, 100);
            const ringMat = new THREE.MeshBasicMaterial({
                color: 0xD94F70,
                wireframe: true,
                transparent: true,
                opacity: 0.4
            });
            const ringMesh = new THREE.Mesh(ringGeo, ringMat);
            ringMesh.rotation.x = Math.PI / 3;
            ringGroup.add(ringMesh);

            // Particle Nodes for Global Hub Connections
            const particleGeo = new THREE.BufferGeometry();
            const particleCount = 350;
            const posArray = new Float32Array(particleCount * 3);

            for (let i = 0; i < particleCount * 3; i += 3) {
                const u = Math.random();
                const v = Math.random();
                const theta = u * 2.0 * Math.PI;
                const phi = Math.acos(2.0 * v - 1.0);
                const r = 85 + Math.random() * 25;

                posArray[i] = r * Math.sin(phi) * Math.cos(theta);
                posArray[i+1] = r * Math.sin(phi) * Math.sin(theta);
                posArray[i+2] = r * Math.cos(phi);
            }

            particleGeo.setAttribute('position', new THREE.BufferAttribute(posArray, 3));
            const particleMat = new THREE.PointsMaterial({
                size: 2.5,
                color: 0xE6B566,
                transparent: true,
                opacity: 0.8
            });
            const particleSystem = new THREE.Points(particleGeo, particleMat);
            globeGroup.add(particleSystem);

            // Animation Loop
            function animateThree() {
                requestAnimationFrame(animateThree);
                globeGroup.rotation.y += 0.0035;
                globeGroup.rotation.x += 0.001;
                ringGroup.rotation.z += 0.002;
                ringGroup.rotation.y += 0.0015;
                renderer.render(scene, camera);
            }
            animateThree();

            window.addEventListener('resize', () => {
                if (!container) return;
                camera.aspect = container.clientWidth / container.clientHeight;
                camera.updateProjectionMatrix();
                renderer.setSize(container.clientWidth, container.clientHeight);
            });
        }
        window.addEventListener('load', initThreeGlobe);

        // INSTANT ESTIMATOR CALCULATION LOGIC
        function calculateEstimate() {
            const words = parseInt(document.getElementById('wordSlider').value);
            const categorySelect = document.getElementById('calcCategory');
            const urgencySelect = document.getElementById('calcUrgency');
            
            let ratePerWord = 0.09;
            if (categorySelect.value === 'business') ratePerWord = 0.12;
            if (categorySelect.value === 'legal') ratePerWord = 0.16;
            if (categorySelect.value === 'medical') ratePerWord = 0.18;
            if (categorySelect.value === 'technical') ratePerWord = 0.14;

            const urgencyMultiplier = parseFloat(urgencySelect.value);
            const totalUSD = words * ratePerWord * urgencyMultiplier;
            const totalIDR = totalUSD * 16000;

            document.getElementById('wordCountLabel').textContent = `${words.toLocaleString()} Words`;
            document.getElementById('calcPriceUSD').innerHTML = `$${totalUSD.toFixed(2)} <span class="text-xs font-normal text-parchment/60 font-sans">USD</span>`;
            document.getElementById('calcPriceIDR').textContent = `≈ Rp ${Math.round(totalIDR).toLocaleString('id-ID')} IDR`;

            // Calculate Delivery Date
            const today = new Date();
            let daysToAdd = Math.ceil(words / 2000);
            if (urgencyMultiplier > 1.5) daysToAdd = 1;
            today.setDate(today.getDate() + daysToAdd);
            
            const options = { month: 'short', day: 'numeric', year: 'numeric' };
            document.getElementById('calcDeliveryDate').textContent = today.toLocaleDateString('en-US', options);
        }

        // LANGUAGE PAIR MATRIX UPDATER
        function updatePairMatrix() {
            const src = document.getElementById('sourceLang');
            const tgt = document.getElementById('targetLang');
            const srcText = src.options[src.selectedIndex].text;
            const tgtText = tgt.options[tgt.selectedIndex].text;
            
            document.getElementById('pairFlags').textContent = `${src.options[src.selectedIndex].dataset.flag || '🌐'} ➔ ${tgt.options[tgt.selectedIndex].dataset.flag || '🌐'}`;
            document.getElementById('pairTitle').textContent = `${srcText} to ${tgtText} Pair`;
        }

        function swapLanguages() {
            const src = document.getElementById('sourceLang');
            const tgt = document.getElementById('targetLang');
            const temp = src.value;
            src.value = tgt.value;
            tgt.value = temp;
            updatePairMatrix();
        }

        function quickSelectPair(s, t) {
            document.getElementById('sourceLang').value = s;
            document.getElementById('targetLang').value = t;
            updatePairMatrix();
            document.getElementById('explorer').scrollIntoView({ behavior: 'smooth' });
        }

        // SAMPLE GALLERY SWITCHER
        const sampleData = {
            legal: {
                origLang: "Original Deed (English)",
                origBody: `"The Licensee agrees to indemnify, defend, and hold harmless the Licensor from and against any and all claims, liabilities, losses, damages, or expenses arising out of any breach of warranty."`,
                transLang: "Translated Result (Indonesian - Court Sworn)",
                transBody: `"Penerima Lisensi setuju untuk mengganti rugi, membela, dan membebaskan Pemberi Lisensi dari dan terhadap setiap dan seluruh klaim, kewajiban, kerugian, kerusakan, atau biaya yang timbul dari pelanggaran jaminan."`
            },
            medical: {
                origLang: "Original Protocol (German)",
                origBody: `"Die doppelblinde, platzebokontrollierte Studie ergab eine statistisch signifikante Reduktion der Symptomlast nach 14-tägiger Verabreichung."`,
                transLang: "Translated Result (English)",
                transBody: `"The double-blind, placebo-controlled clinical study demonstrated a statistically significant reduction in symptom burden following 14-day administration."`
            },
            marketing: {
                origLang: "Original Campaign Copy (French)",
                origBody: `"L'élégance n'est pas une parure, c'est une manière d'être. Laissez-vous séduire par l'essence même du luxe."`,
                transLang: "Translated Result (Indonesian Transcreation)",
                transBody: `"Keanggunan bukanlah sekadar perhiasan, melainkan sebuah jalan hidup. Biarkan diri Anda terpesona oleh keaslian kemewahan sejati."`
            }
        };

        function switchSample(type) {
            ['legal', 'medical', 'marketing'].forEach(t => {
                const btn = document.getElementById(`sampleBtn-${t}`);
                if (t === type) {
                    btn.className = "px-5 py-2 rounded-full text-xs font-serif uppercase tracking-wider bg-ink text-gold border border-ink";
                } else {
                    btn.className = "px-5 py-2 rounded-full text-xs font-serif uppercase tracking-wider bg-parchment-dark text-ink hover:bg-ink hover:text-gold transition";
                }
            });

            document.getElementById('sampleOrigLang').textContent = sampleData[type].origLang;
            document.getElementById('sampleOrigBody').textContent = sampleData[type].origBody;
            document.getElementById('sampleTransLang').textContent = sampleData[type].transLang;
            document.getElementById('sampleTransBody').textContent = sampleData[type].transBody;
        }

        // GLOSSARY SEARCH FILTER
        function filterGlossary() {
            const input = document.getElementById('termSearchInput').value.toLowerCase();
            const rows = document.querySelectorAll('.glossary-row');
            rows.forEach(row => {
                const text = row.textContent.toLowerCase();
                row.style.display = text.includes(input) ? 'flex' : 'none';
            });
        }

        // VOICE PREVIEW SIMULATOR
        function playVoiceSample(id) {
            const icon = document.getElementById(`icon-${id}`);
            if (icon.classList.contains('fa-circle-play')) {
                icon.className = 'fa-solid fa-circle-pause text-rose text-lg';
                setTimeout(() => {
                    icon.className = 'fa-solid fa-circle-play text-gold text-lg';
                }, 3000);
            } else {
                icon.className = 'fa-solid fa-circle-play text-gold text-lg';
            }
        }

        // AI CHATBOT MODAL INTERACTION WITH GEMINI API INTEGRATION
        function toggleAiModal() {
            const modal = document.getElementById('aiChatModal');
            modal.classList.toggle('hidden');
        }

        async function handleAiChatSubmit(e) {
            e.preventDefault();
            const input = document.getElementById('aiInput');
            const prompt = input.value.trim();
            if (!prompt) return;
            appendChatMessage('You', prompt, 'user');
            input.value = '';
            const reply = appendChatMessage('VERBA AI', 'Thank you. I can help explain language pairs, translation categories, interpreting modes, and the estimate shown on this page. For a document-specific assessment, please send your project details to our team through WhatsApp.', 'bot');
        }

        function sendPresetAi(text) {
            document.getElementById('aiInput').value = text;
            handleAiChatSubmit(new Event('submit'));
        }

        function appendChatMessage(sender, text, type) {
            const body = document.getElementById('aiChatBody');
            const msgId = 'msg-' + Date.now();
            const div = document.createElement('div');
            
            if (type === 'user') {
                div.className = "p-3 rounded-lg bg-rose/20 border border-rose/30 max-w-[85%] ml-auto text-right space-y-1";
                div.innerHTML = `<p class="font-semibold text-rose font-serif">You</p><p class="text-parchment/90">${text}</p>`;
            } else {
                div.className = "p-3 rounded-lg bg-ink-light border border-gold/20 max-w-[85%] space-y-1";
                div.id = msgId;
                div.innerHTML = `<p class="font-semibold text-gold font-serif">${sender}</p><p class="text-parchment/90">${text}</p>`;
            }

            body.appendChild(div);
            body.scrollTop = body.scrollHeight;
            return msgId;
        }

        // BOOKING & UPLOAD MODALS
        function openBookingModal(name) {
            document.getElementById('modalTitle').textContent = `Booking Session for ${name}`;
            document.getElementById('bookingModal').classList.remove('hidden');
        }

        function closeBookingModal() {
            document.getElementById('bookingModal').classList.add('hidden');
        }

        function openUploadModal() {
            document.getElementById('modalTitle').textContent = `Submit Document for Appraisal`;
            document.getElementById('bookingModal').classList.remove('hidden');
        }

        const VERBA_WHATSAPP_NUMBER = '6281234567890'; // Replace with the business WhatsApp number.
        function handleBookingSubmit(e) {
            e.preventDefault();
            const form = e.currentTarget;
            const values = new FormData(form);
            const title = document.getElementById('modalTitle')?.textContent || 'Project inquiry';
            const lines = [
                'VERBA — Translation & Interpreter Inquiry',
                'Request: ' + title,
                'Name: ' + (values.get('customer_name') || '-'),
                'Email: ' + (values.get('customer_email') || '-'),
                'Target date: ' + (values.get('target_date') || '-'),
                'Service mode: ' + (values.get('session_mode') || '-'),
                'Project details: ' + (values.get('project_details') || '-')
            ];
            window.open('https://wa.me/' + VERBA_WHATSAPP_NUMBER + '?text=' + encodeURIComponent(lines.join('\n')), '_blank', 'noopener');
            closeBookingModal();
        }

        function handleHeroFileUpload(files) {
            if (files && files[0]) {
                document.getElementById('heroFileStatus').classList.remove('hidden');
                document.getElementById('heroFileName').textContent = files[0].name + ' — selected locally. Please attach it in the WhatsApp chat after opening the inquiry.';
            }
        }

        function downloadQuotePDF() {
            const words = document.getElementById('wordSlider')?.value || '1500';
            const usd = document.getElementById('calcPriceUSD')?.innerText || '';
            const idr = document.getElementById('calcPriceIDR')?.textContent || '';
            const delivery = document.getElementById('calcDeliveryDate')?.textContent || '';
            const source = document.getElementById('calcSource');
            const target = document.getElementById('calcTarget');
            const category = document.getElementById('calcCategory');
            const urgency = document.getElementById('calcUrgency');
            const content = [
                'VERBA — PRELIMINARY TRANSLATION ESTIMATE',
                'This is an indicative estimate only, not a binding quotation.',
                'Source language: ' + source.options[source.selectedIndex].text,
                'Target language: ' + target.options[target.selectedIndex].text,
                'Document category: ' + category.options[category.selectedIndex].text,
                'Urgency: ' + urgency.options[urgency.selectedIndex].text,
                'Estimated word count: ' + words,
                'Estimated price: ' + usd + ' | ' + idr,
                'Estimated delivery: ' + delivery,
                'Final scope, price, turnaround, certification, and availability require document review by VERBA.'
            ].join('\n');
            const blob = new Blob([content], {type:'text/plain;charset=utf-8'});
            const url = URL.createObjectURL(blob);
            const a = document.createElement('a'); a.href = url; a.download = 'verba-preliminary-estimate.txt'; a.click();
            URL.revokeObjectURL(url);
        }

        // FAQ TOGGLE
        function toggleFaq(id) {
            const ans = document.getElementById(`faqAns-${id}`);
            const icon = document.getElementById(`faqIcon-${id}`);
            ans.classList.toggle('hidden');
            if (ans.classList.contains('hidden')) {
                icon.className = 'fa-solid fa-plus text-xs text-gold';
            } else {
                icon.className = 'fa-solid fa-minus text-xs text-rose';
            }
        }

        // MOBILE MENU TOGGLE
        function toggleMobileMenu() {
            document.getElementById('mobileMenu').classList.toggle('hidden');
        }

        // LANGUAGE TOGGLE
        let currentLang = 'EN';
        function toggleLanguage() {
            currentLang = currentLang === 'EN' ? 'ID' : 'EN';
            document.getElementById('currentLangLabel').textContent = currentLang;
        }
    

// WEBIA contact integration
window.addEventListener('DOMContentLoaded', () => {
  const wa = document.getElementById('verbaWhatsApp');
  if (wa) wa.href = 'https://wa.me/' + VERBA_WHATSAPP_NUMBER + '?text=' + encodeURIComponent('Hello VERBA, I would like to ask about your translation and interpreter services.');
  calculateEstimate();
});
