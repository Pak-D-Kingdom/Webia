
        // HERO TYPING ANIMATION
        const heroPhrases = [
            "Advokasi Sengketa Bisnis & Perjanjian Komersial.",
            "Pendampingan Litigasi Pidana & Corruption Defense.",
            "Penyelesaian Sengketa Pertanahan & HAKI.",
            "Kepatuhan Hukum Korporasi & Retainer Terpercaya."
        ];
        let hIdx = 0;
        let cIdx = 0;
        let isDeleting = false;
        const typingElem = document.getElementById('heroTypingText');

        function typeLoopHero() {
            const current = heroPhrases[hIdx];
            if (isDeleting) {
                typingElem.textContent = current.substring(0, cIdx - 1);
                cIdx--;
            } else {
                typingElem.textContent = current.substring(0, cIdx + 1);
                cIdx++;
            }

            if (!isDeleting && cIdx === current.length) {
                isDeleting = true;
                setTimeout(typeLoopHero, 2000);
            } else if (isDeleting && cIdx === 0) {
                isDeleting = false;
                hIdx = (hIdx + 1) % heroPhrases.length;
                setTimeout(typeLoopHero, 500);
            } else {
                setTimeout(typeLoopHero, isDeleting ? 40 : 80);
            }
        }
        window.addEventListener('load', typeLoopHero);

        // THREE.JS 3D BRASS SCALES OF JUSTICE HERO CANVAS
        let scene, camera, renderer, scaleGroup;

        function initThreeScales() {
            const container = document.getElementById('hero3DCanvas');
            if (!container) return;

            scene = new THREE.Scene();
            camera = new THREE.PerspectiveCamera(45, container.clientWidth / container.clientHeight, 0.1, 1000);
            camera.position.z = 220;

            renderer = new THREE.WebGLRenderer({ alpha: true, antialias: true });
            renderer.setSize(container.clientWidth, container.clientHeight);
            renderer.setPixelRatio(window.devicePixelRatio);
            container.appendChild(renderer.domElement);

            scaleGroup = new THREE.Group();
            scene.add(scaleGroup);

            // Center Brass Pillar Geometry
            const pillarGeo = new THREE.CylinderGeometry(4, 6, 120, 32);
            const brassMat = new THREE.MeshBasicMaterial({
                color: 0xB99A72,
                wireframe: true,
                transparent: true,
                opacity: 0.4
            });
            const pillar = new THREE.Mesh(pillarGeo, brassMat);
            scaleGroup.add(pillar);

            // Horizontal Beam Balance Bar
            const beamGeo = new THREE.BoxGeometry(110, 3, 3);
            const beam = new THREE.Mesh(beamGeo, brassMat);
            beam.position.y = 45;
            scaleGroup.add(beam);

            // Left Scale Pan Geometry
            const panGeo = new THREE.ConeGeometry(22, 10, 32);
            const panLeft = new THREE.Mesh(panGeo, brassMat);
            panLeft.position.set(-50, 10, 0);
            panLeft.rotation.x = Math.PI;
            scaleGroup.add(panLeft);

            // Right Scale Pan Geometry
            const panRight = new THREE.Mesh(panGeo, brassMat);
            panRight.position.set(50, 10, 0);
            panRight.rotation.x = Math.PI;
            scaleGroup.add(panRight);

            // Orbiting Legal Particles
            const particleGeo = new THREE.BufferGeometry();
            const pCount = 200;
            const posArray = new Float32Array(pCount * 3);

            for(let i=0; i<pCount*3; i+=3) {
                posArray[i] = (Math.random() - 0.5) * 300;
                posArray[i+1] = (Math.random() - 0.5) * 200;
                posArray[i+2] = (Math.random() - 0.5) * 200;
            }
            particleGeo.setAttribute('position', new THREE.BufferAttribute(posArray, 3));
            const pMat = new THREE.PointsMaterial({
                size: 2,
                color: 0xB99A72,
                transparent: true,
                opacity: 0.6
            });
            const particles = new THREE.Points(particleGeo, pMat);
            scaleGroup.add(particles);

            // Mouse Interactive Tilt Response
            let mouseX = 0;
            document.addEventListener('mousemove', (e) => {
                mouseX = (e.clientX / window.innerWidth - 0.5) * 0.3;
            });

            function animateScales() {
                requestAnimationFrame(animateScales);
                scaleGroup.rotation.y += 0.003;
                beam.rotation.z = Math.sin(Date.now() * 0.0015) * 0.08 + mouseX;
                panLeft.position.y = 10 + Math.sin(Date.now() * 0.0015) * 6;
                panRight.position.y = 10 - Math.sin(Date.now() * 0.0015) * 6;
                renderer.render(scene, camera);
            }
            animateScales();

            window.addEventListener('resize', () => {
                if(!container) return;
                camera.aspect = container.clientWidth / container.clientHeight;
                camera.updateProjectionMatrix();
                renderer.setSize(container.clientWidth, container.clientHeight);
            });
        }
        window.addEventListener('load', initThreeScales);
        window.addEventListener('DOMContentLoaded', updateLegalChecklist);

        // ASSESSMENT DIAGNOSTIC ENGINE
        function runCaseEvaluation() {
            const urgency = document.getElementById('urgencySelect').value;
            const val = document.getElementById('valueSlider').value;
            
            const titleElem = document.getElementById('evalTitle');
            const statuteElem = document.getElementById('evalStatute');
            const actionElem = document.getElementById('evalAction');

            if (urgency === 'summons') {
                titleElem.textContent = "Pendampingan Pemeriksaan Kepolisian (BAP)";
                statuteElem.textContent = "Landasan Hukum: KUHAP Pasal 54 & Pasal 55 (Hak Dampingan Advokat)";
                actionElem.textContent = "Langkah Disarankan: Penerbitan Surat Kuasa Khusus BAP, pendampingan penandatanganan Berita Acara Pemeriksaan, serta pengajuan Praperadilan jika terjadi kewenangan tidak sah.";
            } else if (urgency === 'warning') {
                titleElem.textContent = "Penanganan Surat Somasi / Peringatan Hukum";
                statuteElem.textContent = "Landasan Hukum: KUHPerdata Pasal 1238 (Pernyataannya Lalai)";
                actionElem.textContent = "Langkah Disarankan: Penyusunan Jawaban Somasi resmi dalam 3x24 jam, verifikasi legal standing pengirim, dan mediasi penyelesaian sengketa.";
            } else if (urgency === 'litigation') {
                titleElem.textContent = "Advokasi Persidangan Litigasi Pengadilan";
                statuteElem.textContent = "Landasan Hukum: HIR / RBg & Perma No. 1 Tahun 2016 (Mediasi Pengadilan)";
                actionElem.textContent = "Langkah Disarankan: Penyusunan Gugatan/Eksepsi, penyiapan alat bukti surat lengkap, dan pendampingan sidang Mediasi Wajib Pengadilan.";
            } else {
                titleElem.textContent = "Audit Perjanjian & Preventif Hukum Bisnis";
                statuteElem.textContent = "Landasan Hukum: KUHPerdata Pasal 1320 & Kebebasan Berkontrak";
                actionElem.textContent = "Langkah Disarankan: Review klausul cidera janji, penyesuaian regulasi sektoral, serta pendaftaran legalitas izin bisnis.";
            }
        }

        function setSubjectType(type) {
            const bIndiv = document.getElementById('btnSubjectIndiv');
            const bCorp = document.getElementById('btnSubjectCorp');
            if(type === 'individu') {
                bIndiv.className = "p-3 rounded-lg border border-oak/30 bg-oak text-parchment text-xs font-serif uppercase tracking-wider font-bold";
                bCorp.className = "p-3 rounded-lg border border-oak/10 bg-parchment text-oak text-xs font-serif uppercase tracking-wider font-bold";
            } else {
                bCorp.className = "p-3 rounded-lg border border-oak/30 bg-oak text-parchment text-xs font-serif uppercase tracking-wider font-bold";
                bIndiv.className = "p-3 rounded-lg border border-oak/10 bg-parchment text-oak text-xs font-serif uppercase tracking-wider font-bold";
            }
            runCaseEvaluation();
        }

        function scrollToAssessment() {
            document.getElementById('assessment').scrollIntoView({ behavior: 'smooth' });
        }

        // AI CHATBOT INTEGRATION WITH GEMINI API
        function toggleAiModal() {
            document.getElementById('aiChatModal').classList.toggle('hidden');
        }

        async function handleAiChatSubmit(e) { e.preventDefault(); const input=document.getElementById('aiInput'); const prompt=input.value.trim(); if(!prompt)return; appendChatMessage('Anda',prompt,'user'); input.value=''; appendChatMessage('LEXIS AI','Ini demo asisten informasi hukum. Untuk penilaian perkara, silakan ajukan konsultasi kepada advokat. Jangan masukkan data pribadi atau dokumen rahasia pada demo ini.','bot'); }

        function sendPresetAi(text) {
            document.getElementById('aiInput').value = text;
            handleAiChatSubmit(new Event('submit'));
        }

        function appendChatMessage(sender, text, type) {
            const body = document.getElementById('aiChatBody');
            const msgId = 'msg-' + Date.now();
            const div = document.createElement('div');
            
            if (type === 'user') {
                div.className = "p-3 rounded-lg bg-leather/40 border border-brass/30 max-w-[85%] ml-auto text-right space-y-1";
                div.innerHTML = `<p class="font-semibold text-brass font-serif">Anda</p><p class="text-parchment/90">${text}</p>`;
            } else {
                div.className = "p-3 rounded-lg bg-oak-dark border border-brass/20 max-w-[85%] space-y-1";
                div.id = msgId;
                div.innerHTML = `<p class="font-semibold text-brass font-serif">${sender}</p><p class="text-parchment/90">${text}</p>`;
            }

            body.appendChild(div);
            body.scrollTop = body.scrollHeight;
            return msgId;
        }

        // PORTAL & TRACKING SIMULATION
        function handleDocUpload(files) {
            if (files && files[0]) {
                document.getElementById('uploadStatus').classList.remove('hidden');
                document.getElementById('fileName').textContent = files[0].name;
            }
        }

        function trackCaseStatus() {
            const val = document.getElementById('caseIdInput').value.trim();
            if (val) {
                document.getElementById('caseTrackerResult').classList.remove('hidden');
            } else {
                alert('Silakan masukkan ID Perkara resmi Anda.');
            }
        }

        // MODAL BOOKING
        function openBookingModal(name) {
            document.getElementById('modalTitle').textContent = `Jadwalkan Advis Khusus: ${name}`;
            document.getElementById('bookingModal').classList.remove('hidden');
        }

        function closeBookingModal() {
            document.getElementById('bookingModal').classList.add('hidden');
        }

        const VANGUARD_WHATSAPP_NUMBER = '6281250887790'; // Ganti dengan nomor resmi kantor.
        function sendBookingToWhatsApp(d) { const msg=['Halo Vanguard Heritage Counsel, saya ingin mengajukan konsultasi hukum.',`Nama: ${d.name||'-'}`,`Kontak: ${d.contact||'-'}`,`Jenis konsultasi: ${d.mode||'-'}`,`Tanggal pilihan: ${d.date||'-'}`,`Advokat: ${d.lawyer||'-'}`,`Ringkasan: ${d.summary||'-'}`,'','Mohon konfirmasi jadwal dan biaya. Ini permohonan, bukan booking terkonfirmasi.'].join('\\n'); window.open(`https://wa.me/${VANGUARD_WHATSAPP_NUMBER}?text=${encodeURIComponent(msg)}`,'_blank','noopener'); }
        function handleBookingSubmit(e) { e.preventDefault(); const v=e.currentTarget.querySelectorAll('input,select,textarea'); sendBookingToWhatsApp({name:v[0]?.value,contact:v[1]?.value,mode:v[2]?.value,date:v[3]?.value,summary:v[4]?.value}); }
        function handleModalBookingSubmit(e) { e.preventDefault(); const v=e.currentTarget.querySelectorAll('input,textarea'); sendBookingToWhatsApp({name:v[0]?.value,contact:v[1]?.value,date:v[2]?.value,summary:v[3]?.value,lawyer:document.getElementById('modalTitle')?.textContent}); closeBookingModal(); }
        function updateLegalChecklist() { const d={corp:['Akta pendirian','NIB','NPWP','Anggaran dasar','Susunan pemegang saham'],crim:['Surat panggilan','Identitas pihak terkait','Kronologi kejadian','Bukti komunikasi','Dokumen pendukung'],civil:['Identitas para pihak','Perjanjian','Bukti pembayaran','Somasi dan jawaban','Kronologi'],family:['Identitas para pihak','Dokumen perkawinan','Dokumen aset','Putusan terdahulu','Kronologi'],property:['Sertifikat','Akta jual beli','PBB','Peta bidang','Kronologi'],employment:['Perjanjian kerja','Slip gaji','Surat PHK/peringatan','Peraturan perusahaan','Korespondensi'],ip:['Contoh karya/merek','Bukti penciptaan','Sertifikat','Bukti pelanggaran','Identitas pemilik'],litigation:['Surat gugatan/panggilan','Jawaban','Bukti surat','Putusan terdahulu','Surat kuasa'],contract:['Draft kontrak','Identitas para pihak','Addendum','Bukti pelaksanaan','Korespondensi']}; const el=document.getElementById('legalChecklist'); if(!el)return; el.innerHTML=''; (d[document.getElementById('checklistType').value]||[]).forEach(t=>{const l=document.createElement('label');l.className='flex items-center gap-3 border-b border-dotted border-brass/70 pb-2 text-sm';const c=document.createElement('input');c.type='checkbox';c.className='accent-leather';const s=document.createElement('span');s.textContent=t;l.append(c,s);el.append(l);}); }
        function showSelectedLegalFile(i) { const el=document.getElementById('secureFileName'); if(i.files&&i.files[0])el.textContent=`Dipilih: ${i.files[0].name} · Belum diunggah`; }

        // FAQ TOGGLE
        function toggleFaq(id) {
            const ans = document.getElementById(`faqAns-${id}`);
            const icon = document.getElementById(`faqIcon-${id}`);
            ans.classList.toggle('hidden');
            if (ans.classList.contains('hidden')) {
                icon.className = 'fa-solid fa-plus text-xs text-brass';
            } else {
                icon.className = 'fa-solid fa-minus text-xs text-leather';
            }
        }

        // MOBILE MENU
        function toggleMobileMenu() {
            document.getElementById('mobileMenu').classList.toggle('hidden');
        }

        // LANGUAGE TOGGLE
        let curLang = 'ID';
        function toggleLanguage() {
            curLang = curLang === 'ID' ? 'EN' : 'ID';
            document.getElementById('langLabel').textContent = curLang;
        }
    