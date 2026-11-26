const ATELIER_WHATSAPP_NUMBER = (document.body?.dataset?.whatsappNumber || '6281234567890').replace(/\D/g, '');

// 1. FORMAL SPOTLIGHT CURSOR TRACKING
    (function initFormalCursor() {
      const ring = document.getElementById('formal-cursor-ring');
      const dot = document.getElementById('formal-cursor-dot');
      if (!ring || !dot) return;

      let mouseX = -100, mouseY = -100;
      let ringX = -100, ringY = -100;

      document.addEventListener('mousemove', (e) => {
        mouseX = e.clientX;
        mouseY = e.clientY;
        dot.style.left = `${mouseX}px`;
        dot.style.top = `${mouseY}px`;
        dot.style.opacity = '1';
        ring.style.opacity = '1';
      });

      document.addEventListener('mouseleave', () => {
        ring.style.opacity = '0';
        dot.style.opacity = '0';
      });

      document.addEventListener('mouseover', (e) => {
        const interactive = e.target.closest('a, button, select, input, [role="button"]');
        document.body.classList.toggle('cursor-link-hover', Boolean(interactive));
      });

      function followRing() {
        ringX += (mouseX - ringX) * 0.18;
        ringY += (mouseY - ringY) * 0.18;
        ring.style.left = `${ringX}px`;
        ring.style.top = `${ringY}px`;
        requestAnimationFrame(followRing);
      }
      requestAnimationFrame(followRing);
    })();

    // 2. HERO SCENE CUE SWITCHER
    const heroScenes = [
      {
        img: 'https://images.unsplash.com/photo-1507924538820-ede94a04019d?auto=format&fit=crop&w=1000&q=85',
        tag: 'ACT I • PROSCENIUM THEATRE',
        caption: '"Keheningan sebelum dialog pertama adalah ruang tempat karakter lahir."'
      },
      {
        img: 'https://images.unsplash.com/photo-1485846234645-a62644f84728?auto=format&fit=crop&w=1000&q=85',
        tag: 'SCENE 08 • CINEMA CLOSE-UP',
        caption: '"Di depan kamera, kejujuran batin lebih kuat daripada gerak yang berlebihan."'
      },
      {
        img: 'https://images.unsplash.com/photo-1503095396574-80af35ba3162?auto=format&fit=crop&w=1000&q=85',
        tag: 'FINALE • STAGE & MUSICAL',
        caption: '"Setiap sorotan cahaya menuntut keberanian hadir sepenuhnya di saat ini."'
      }
    ];

    function setHeroScene(idx) {
      const s = heroScenes[idx];
      if (!s) return;
      document.getElementById('hero-scene-img').src = s.img;
      document.getElementById('hero-scene-tag').textContent = s.tag;
      document.getElementById('hero-scene-caption').textContent = s.caption;

      document.querySelectorAll('.hero-cue-btn').forEach((btn, i) => {
        btn.className = i === idx
          ? 'hero-cue-btn px-3 py-1.5 rounded bg-spotgold text-velvet font-cinema font-bold text-[10px] uppercase'
          : 'hero-cue-btn px-3 py-1.5 rounded bg-umber/60 text-parchment border border-spotgold/40 font-cinema font-bold text-[10px] uppercase';
      });
    }

    // 3. ACTING PROGRAMS (FILM, THEATRE, TV, VOICE, MUSICAL THEATRE) WITH AGE & SKILL FILTER
    const actingProgramsData = [
      {
        name: 'Film Acting',
        ages: ['Teens', 'Adults'],
        levels: ['Beginner', 'Intermediate', 'Advanced'],
        img: 'https://images.unsplash.com/photo-1485846234645-a62644f84728?auto=format&fit=crop&w=750&q=85',
        desc: 'Akting untuk layar lebar: *eye-line*, kontinuitas emosi, *close-up restraint*, dan kerja sama dengan lensa kamera.',
        regValue: 'Film Acting'
      },
      {
        name: 'Theatre Acting',
        ages: ['Kids', 'Teens', 'Adults'],
        levels: ['Beginner', 'Intermediate', 'Advanced'],
        img: 'https://images.unsplash.com/photo-1507924538820-ede94a04019d?auto=format&fit=crop&w=750&q=85',
        desc: 'Seni peran panggung langsung: proyeksi suara, *blocking*, kedalaman karakter, dan *ensemble* teater.',
        regValue: 'Theatre Acting'
      },
      {
        name: 'TV Acting',
        ages: ['Teens', 'Adults'],
        levels: ['Beginner', 'Intermediate', 'Advanced'],
        img: 'https://images.unsplash.com/photo-1517604931442-7e0c8ed2963c?auto=format&fit=crop&w=750&q=85',
        desc: 'Adaptasi cepat terhadap *multi-cam*, *cold reading* naskah serial, dan ketepatan ritme adegan televisi/streaming.',
        regValue: 'TV Acting'
      },
      {
        name: 'Voice Acting',
        ages: ['Kids', 'Teens', 'Adults'],
        levels: ['Beginner', 'Intermediate', 'Advanced'],
        img: 'https://images.unsplash.com/photo-1598488035139-bdbb2231ce04?auto=format&fit=crop&w=750&q=85',
        desc: 'Pengolahan suara untuk animasi, *dubbing*, narasi dokumenter, dan *audio drama* di studio rekaman.',
        regValue: 'Voice Acting'
      },
      {
        name: 'Musical Theatre',
        ages: ['Kids', 'Teens', 'Adults'],
        levels: ['Beginner', 'Intermediate', 'Advanced'],
        img: 'https://images.unsplash.com/photo-1503095396574-80af35ba3162?auto=format&fit=crop&w=750&q=85',
        desc: 'Perpaduan akting dramatis, ekspresi vokal lagu (*song acting*), dan koreografi gerak panggung.',
        regValue: 'Musical Theatre'
      }
    ];

    let activeAgeFilter = 'All';

    function setAgeFilter(age) {
      activeAgeFilter = age;
      document.querySelectorAll('.age-pill').forEach(b => {
        b.className = b.dataset.age === age
          ? 'age-pill px-3 py-1 rounded bg-spotgold text-velvet font-bold'
          : 'age-pill px-3 py-1 rounded bg-umber/50 text-parchment hover:border-champagne border border-transparent';
      });
      renderActingPrograms();
    }

    function renderActingPrograms() {
      const skill = document.getElementById('skill-level-select').value;
      const list = actingProgramsData.filter(p =>
        (activeAgeFilter === 'All' || p.ages.includes(activeAgeFilter)) &&
        (skill === 'All' || p.levels.includes(skill))
      );

      document.getElementById('acting-programs-grid').innerHTML = list.map(p => `
        <div class="cinema-card bg-velvet border border-spotgold/45 rounded-xl overflow-hidden flex flex-col justify-between">
          <div>
            <div class="relative aspect-[16/10] bg-umber/40">
              <img src="${p.img}" alt="${p.name}" class="w-full h-full object-cover" />
              <div class="absolute inset-0 bg-gradient-to-t from-velvet via-transparent to-transparent"></div>
              <span class="absolute top-3 left-3 px-2.5 py-0.5 rounded bg-velvet/90 border border-spotgold/60 font-cinema text-[10px] font-bold text-champagne uppercase">
                ${p.ages.join(' • ')}
              </span>
            </div>
            <div class="p-5 space-y-2">
              <h3 class="font-cinema text-xl font-bold text-parchment uppercase">${p.name}</h3>
              <p class="text-xs text-parchment/80 leading-relaxed">${p.desc}</p>
              <p class="font-cinema text-[10px] text-spotgold uppercase pt-1">Levels: ${p.levels.join(' / ')}</p>
            </div>
          </div>
          <div class="px-5 pb-5">
            <button onclick="selectProgramForReg('${p.regValue}')" class="w-full py-2.5 rounded-lg bg-umber/50 hover:bg-spotgold hover:text-velvet text-champagne border border-spotgold/45 font-cinema font-bold text-xs uppercase transition-all">
              Daftar Program Ini →
            </button>
          </div>
        </div>
      `).join('');
    }

    function selectProgramForReg(progVal) {
      switchStageView('all');
      const r = Array.from(document.querySelectorAll('input[name="reg_program"]')).find(el => el.value === progVal);
      if (r) r.checked = true;
      updateRegSummary();
      goToRegStep(2);
      document.getElementById('registration-section').scrollIntoView({ behavior: 'smooth' });
    }

    // 4. INTERACTIVE MONOLOGUE & AUDITION CUE EXPLORER
    const cuePrompts = [
      {
        badge: 'DRAMATIC FILM CUE • SELF-TAPE',
        title: 'Adegan Konfrontasi Sunyi di Meja Makan',
        script: '"Kau menaruh amplop itu di sana sejak pagi, dan berharap aku tidak akan membukanya. Padahal dari cara kau menatap kopi itu, aku tahu jawabannya."',
        tips: [
          'Gunakan jeda 2 detik sebelum kalimat terakhir tanpa memutus kontak batin dengan lawan main.',
          'Jaga volume suara tetap intim (70% proyeksi) agar tertangkap hangat oleh mic kamera.',
          'Tentukan *objective*: membuat lawan bicara mengakui kebenaran tanpa berteriak.'
        ]
      },
      {
        badge: 'THEATRE MONOLOGUE • STAGE PROJECTION',
        title: 'Solilokui Menjelang Tirai Dibuka',
        script: '"Di balik tirai ini, semua orang datang membawa beban masing-masing. Saat lampu menyala, aku tidak sekadar berakting—aku membuka pintu agar mereka bisa bernapas."',
        tips: [
          'Proyeksikan suara dari diafragma ke baris belakang ruangan dengan artikulasi konsonan tegas.',
          'Gunakan pergeseran posisi tubuh (*blocking*) untuk menandai perubahan emosi.'
        ]
      },
      {
        badge: 'VOICE ACTING & DUBBING • CHARACTER LAB',
        title: 'Karakter Penjaga Menara Jam',
        script: '"Tik-tok, tik-tok... roda gigi ini sudah berputar seratus tahun, dan baru hari ini ada yang berani bertanya ke mana sebenarnya waktu bersembunyi!"',
        tips: [
          'Bangun *vocal placement* yang konsisten dan variasikan tempo antara kalimat cepat & lambat.',
          'Hindari *clipping* pada konsonan keras saat merekam di *recording booth*.'
        ]
      }
    ];

    function selectCuePrompt(idx) {
      const c = cuePrompts[idx];
      if (!c) return;
      document.querySelectorAll('.cue-tab').forEach((btn, i) => {
        btn.className = i === idx
          ? 'cue-tab px-3.5 py-2 rounded-lg bg-spotgold text-velvet font-cinema font-bold text-xs uppercase'
          : 'cue-tab px-3.5 py-2 rounded-lg bg-velvet text-parchment border border-spotgold/40 font-cinema font-bold text-xs uppercase';
      });

      document.getElementById('cue-explorer-body').innerHTML = `
        <div class="lg:col-span-7 space-y-3">
          <span class="font-cinema text-[10px] text-champagne font-bold uppercase">${c.badge}</span>
          <h4 class="font-cinema text-xl font-bold text-parchment uppercase">${c.title}</h4>
          <blockquote class="p-4 rounded-xl bg-velvet border-l-4 border-champagne font-editorial italic text-xl text-parchment leading-relaxed">
            ${c.script}
          </blockquote>
        </div>
        <div class="lg:col-span-5 bg-velvet/90 border border-spotgold/40 rounded-xl p-5 space-y-2.5 text-xs">
          <p class="font-cinema font-bold text-champagne uppercase">Director &amp; Audition Notes</p>
          <ul class="space-y-2 text-parchment/85">
            ${c.tips.map(t => `<li>✦ ${t}</li>`).join('')}
          </ul>
          <a href="#registration-section" onclick="switchStageView('all')" class="inline-block mt-2 font-cinema text-xs font-bold text-champagne hover:underline uppercase">
            Latih Materi Ini di Kelas →
          </a>
        </div>
      `;
    }

    // 5. CLASS SCHEDULE WITH DURATION, INSTRUCTOR & REMAINING QUOTA
    const actingScheduleList = [
      { day: 'Rabu', time: '18:30 – 20:30', program: 'Film Acting', level: 'Beginner – Int.', age: 'Adults', duration: '120 Menit', instructor: 'Hendra Kusuma', quota: 'Sisa 3 / 12 Kursi' },
      { day: 'Kamis', time: '19:00 – 21:00', program: 'Theatre Acting', level: 'All Levels', age: 'Adults', duration: '120 Menit', instructor: 'Clara Suryani', quota: 'Sisa 4 / 14 Kursi' },
      { day: 'Jumat', time: '18:30 – 20:30', program: 'Voice Acting', level: 'Beginner – Adv.', age: 'Adults', duration: '120 Menit', instructor: 'Raka Pratama', quota: 'Sisa 2 / 10 Kursi' },
      { day: 'Sabtu', time: '10:00 – 11:30', program: 'Theatre Acting', level: 'Beginner', age: 'Kids', duration: '90 Menit', instructor: 'Maya Anindita', quota: 'Sisa 5 / 12 Kursi' },
      { day: 'Sabtu', time: '11:45 – 13:15', program: 'TV Acting', level: 'Beginner – Int.', age: 'Teens', duration: '90 Menit', instructor: 'Hendra Kusuma', quota: 'Sisa 4 / 12 Kursi' },
      { day: 'Sabtu', time: '14:00 – 16:30', program: 'Musical Theatre', level: 'Int. – Adv.', age: 'Teens', duration: '150 Menit', instructor: 'Raka Pratama & Clara', quota: 'Sisa 3 / 12 Kursi' }
    ];

    function renderActingSchedule() {
      const progF = document.getElementById('sched-prog-filter').value;
      const ageF = document.getElementById('sched-age-filter').value;
      const rows = actingScheduleList.filter(item =>
        (progF === 'All' || item.program === progF) &&
        (ageF === 'All' || item.age === ageF)
      );

      const tbody = document.getElementById('acting-schedule-tbody');
      if (!tbody) return;
      if (!rows.length) { tbody.innerHTML = '<tr><td colspan="6" class="p-5 text-center text-parchment/70">Belum ada jadwal untuk filter ini.</td></tr>'; return; }
      tbody.innerHTML = rows.map(r => `
        <tr class="hover:bg-umber/25 transition-colors">
          <td class="p-4">
            <strong class="font-cinema text-champagne block">${r.day}</strong>
            <span class="text-xs text-parchment/80">${r.time} WIB</span>
          </td>
          <td class="p-4">
            <strong class="font-cinema text-parchment uppercase block">${r.program}</strong>
            <span class="text-xs text-parchment/70">${r.age} • ${r.level}</span>
          </td>
          <td class="p-4 text-xs font-semibold text-champagne">${r.duration}</td>
          <td class="p-4 text-xs text-parchment/85">${r.instructor}</td>
          <td class="p-4">
            <span class="px-2.5 py-1 rounded bg-umber/50 border border-spotgold/40 text-[11px] font-semibold text-parchment">${r.quota}</span>
          </td>
          <td class="p-4 text-right">
            <button onclick="bookFromActingSchedule('${r.program}', '${r.age}', '${r.day}', '${r.instructor}')" class="px-3.5 py-2 rounded-lg bg-spotgold hover:bg-champagne text-velvet font-cinema font-bold text-xs uppercase transition-all">
              Daftar
            </button>
          </td>
        </tr>
      `).join('');
    }

    function bookFromActingSchedule(prog, age, day, inst) {
      switchStageView('all');
      const r = Array.from(document.querySelectorAll('input[name="reg_program"]')).find(el => el.value === prog);
      if (r) r.checked = true;

      const ageSel = document.getElementById('reg_age_cat');
      const aOpt = Array.from(ageSel.options).find(o => o.value.includes(age));
      if (aOpt) ageSel.value = aOpt.value;

      const schedSel = document.getElementById('reg_schedule');
      const sOpt = Array.from(schedSel.options).find(o => o.value.startsWith(day));
      if (sOpt) schedSel.value = sOpt.value;

      const instSel = document.getElementById('reg_instructor');
      const iOpt = Array.from(instSel.options).find(o => o.value.includes(inst.split(' ')[0]));
      if (iOpt) instSel.value = iOpt.value;

      updateRegSummary();
      goToRegStep(4);
      document.getElementById('registration-section').scrollIntoView({ behavior: 'smooth' });
    }

    function prefillCastingNote(noteText) {
      switchStageView('all');
      document.getElementById('reg_notes').value = `Minat: ${noteText}`;
      updateRegSummary();
      goToRegStep(4);
      document.getElementById('registration-section').scrollIntoView({ behavior: 'smooth' });
    }

    // 6. 7-STEP BOOKING / REGISTRATION FLOW
    let currentRegStep = 1;
    const regStepLabels = [
      'LANGKAH 1 DARI 7 • PILIH PROGRAM ACTING',
      'LANGKAH 2 DARI 7 • KATEGORI USIA & LEVEL',
      'LANGKAH 3 DARI 7 • JADWAL & INSTRUKTUR',
      'LANGKAH 4 DARI 7 • ISI DATA PESERTA',
      'LANGKAH 5 DARI 7 • PILIH PAKET KELAS',
      'LANGKAH 6 DARI 7 • RINGKASAN PENDAFTARAN',
      'LANGKAH 7 DARI 7 • LANJUTKAN KE WHATSAPP'
    ];

    function goToRegStep(step) {
      if (step < 1 || step > 7) return;
      if (step > currentRegStep) {
        for (let s = currentRegStep; s < step; s++) {
          if (!validateRegStep(s)) return;
        }
      }
      currentRegStep = step;
      document.querySelectorAll('.reg-step').forEach((el, i) => el.classList.toggle('hidden', i + 1 !== currentRegStep));
      document.getElementById('reg-step-title').textContent = regStepLabels[currentRegStep - 1];
      const pct = Math.round((currentRegStep / 7) * 100);
      document.getElementById('reg-step-pct').textContent = `${pct}%`;
      document.getElementById('reg-progress-bar').style.width = `${(currentRegStep / 7) * 100}%`;

      document.querySelectorAll('.reg-dot').forEach((d, i) => {
        d.className = i + 1 <= currentRegStep ? 'reg-dot h-1.5 rounded bg-champagne' : 'reg-dot h-1.5 rounded bg-umber/60';
      });

      document.getElementById('reg-prev-btn').disabled = currentRegStep === 1;
      const nextBtn = document.getElementById('reg-next-btn');
      if (currentRegStep === 7) nextBtn.classList.add('hidden');
      else {
        nextBtn.classList.remove('hidden');
        nextBtn.textContent = currentRegStep === 6 ? 'Ke Langkah WhatsApp →' : 'Langkah Berikutnya →';
      }
      updateRegSummary();
    }

    function validateRegStep(step) {
      const d = getRegFormData();
      const fail = (message, fieldId) => {
        alert(message);
        if (fieldId) document.getElementById(fieldId)?.focus();
        return false;
      };
      if (step === 1 && !document.querySelector('input[name="reg_program"]:checked')) {
        return fail('Silakan pilih program acting terlebih dahulu.');
      }
      if (step === 2 && (!document.getElementById('reg_age_cat').value || !document.getElementById('reg_skill_lvl').value)) {
        return fail('Silakan pilih kategori usia dan level kemampuan.');
      }
      if (step === 3 && (!document.getElementById('reg_schedule').value || !document.getElementById('reg_instructor').value)) {
        return fail('Silakan pilih jadwal dan instruktur.');
      }
      if (step === 4) {
        if (!d.name || d.name === '(Belum diisi)') return fail('Nama lengkap peserta wajib diisi.', 'reg_name');
        if (!d.ageDob || d.ageDob === '(Belum diisi)') return fail('Usia atau tanggal lahir peserta wajib diisi.', 'reg_age_dob');
        const digits = d.wa.replace(/\D/g, '');
        if (digits.length < 9 || digits.length > 15) return fail('Masukkan nomor WhatsApp aktif dengan 9–15 digit.', 'reg_wa');
      }
      if (step === 5 && !document.getElementById('reg_package').value) {
        return fail('Silakan pilih paket kelas.');
      }
      return true;
    }

    function changeRegStep(delta) {
      if (delta > 0 && !validateRegStep(currentRegStep)) return;
      goToRegStep(currentRegStep + delta);
    }

    function selectPackageInWizard(pkgValue) {
      switchStageView('all');
      const sel = document.getElementById('reg_package');
      const opt = Array.from(sel.options).find(o => o.value === pkgValue);
      if (opt) sel.value = opt.value;
      updateRegSummary();
      goToRegStep(1);
      document.getElementById('registration-section').scrollIntoView({ behavior: 'smooth' });
    }

    function getRegFormData() {
      const program = document.querySelector('input[name="reg_program"]:checked')?.value || 'Film Acting';
      const ageCat = document.getElementById('reg_age_cat').value;
      const skillLvl = document.getElementById('reg_skill_lvl').value;
      const schedule = document.getElementById('reg_schedule').value;
      const instructor = document.getElementById('reg_instructor').value;
      const name = document.getElementById('reg_name').value.trim() || '(Belum diisi)';
      const ageDob = document.getElementById('reg_age_dob').value.trim() || '(Belum diisi)';
      const wa = document.getElementById('reg_wa').value.trim() || '(Belum diisi)';
      const exp = document.getElementById('reg_exp').value.trim() || 'Pemula / Belum ada';
      const notes = document.getElementById('reg_notes').value.trim() || '-';
      const pkg = document.getElementById('reg_package').value;

      return { program, ageCat, skillLvl, schedule, instructor, name, ageDob, wa, exp, notes, pkg };
    }

    function escapeRegHtml(value) {
      return String(value ?? '').replace(/[&<>"']/g, char => ({ '&': '&amp;', '<': '&lt;', '>': '&gt;', '"': '&quot;', "'": '&#39;' }[char]));
    }

    function updateRegSummary() {
      const d = getRegFormData();
      const safe = Object.fromEntries(Object.entries(d).map(([key, value]) => [key, escapeRegHtml(value)]));
      const card = document.getElementById('reg-summary-card');
      if (card) {
        card.innerHTML = `
          <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
            <div><span class="text-[11px] font-cinema text-champagne uppercase block">Program &amp; Level</span><strong class="text-parchment">${safe.program}</strong><span class="block text-xs text-parchment/75">${safe.ageCat} • ${safe.skillLvl}</span></div>
            <div><span class="text-[11px] font-cinema text-champagne uppercase block">Jadwal &amp; Instruktur</span><strong class="text-parchment">${safe.schedule}</strong><span class="block text-xs text-parchment/75">${safe.instructor}</span></div>
            <div><span class="text-[11px] font-cinema text-champagne uppercase block">Data Peserta</span><strong class="text-parchment">${safe.name} (${safe.ageDob})</strong><span class="block text-xs text-parchment/75">WA: ${safe.wa} • Exp: ${safe.exp}</span></div>
            <div><span class="text-[11px] font-cinema text-champagne uppercase block">Paket &amp; Catatan</span><strong class="text-champagne">${safe.pkg}</strong><span class="block text-xs text-parchment/75">Catatan: ${safe.notes}</span></div>
          </div>
        `;
      }
      const box = document.getElementById('reg-wa-format-box');
      if (box) box.textContent = formatRegistrationWAMessage(d);
    }

    function formatRegistrationWAMessage(d) {
      return `Halo Admin *Atelier Panggung & Sinema*! 🎭🎬
Saya ingin mendaftar kelas akting dengan rincian berikut:

1. *Program Acting:* ${d.program}
2. *Usia & Level:* ${d.ageCat} | ${d.skillLvl}
3. *Jadwal & Instruktur:*
   - Jadwal: ${d.schedule}
   - Instruktur: ${d.instructor}
4. *Data Peserta:*
   - Nama: ${d.name}
   - Usia / TTL: ${d.ageDob}
   - No. WhatsApp: ${d.wa}
   - Pengalaman Akting: ${d.exp}
   - Catatan: ${d.notes}
5. *Paket Kelas:* ${d.pkg}

Mohon informasi langkah pembayaran dan konfirmasi slot kelas. Terima kasih!`;
    }

    function sendRegistrationWA() {
      for (let step = 1; step <= 5; step++) {
        if (!validateRegStep(step)) {
          goToRegStep(step);
          return;
        }
      }
      const d = getRegFormData();
      const url = `https://wa.me/${ATELIER_WHATSAPP_NUMBER}?text=${encodeURIComponent(formatRegistrationWAMessage(d))}`;
      window.open(url, '_blank', 'noopener,noreferrer');
    }

    async function copyRegistrationWA() {
      const box = document.getElementById('reg-wa-format-box');
      const text = box?.textContent || formatRegistrationWAMessage(getRegFormData());
      try {
        if (navigator.clipboard?.writeText) await navigator.clipboard.writeText(text);
        else {
          const ta = document.createElement('textarea');
          ta.value = text;
          ta.style.position = 'fixed';
          ta.style.opacity = '0';
          document.body.appendChild(ta);
          ta.select();
          const copied = document.execCommand('copy');
          document.body.removeChild(ta);
          if (!copied) throw new Error('Copy command unavailable');
        }
        const fb = document.getElementById('reg-copy-feedback');
        fb?.classList.remove('hidden');
        window.setTimeout(() => fb?.classList.add('hidden'), 3000);
      } catch (error) {
        alert('Format pesan belum berhasil disalin. Silakan blok teks pada kotak pesan lalu salin manual.');
      }
    }

    // 7. FAQ ACCORDION
    const cinemaFaqItems = [
      { q: 'Apakah pemula yang belum pernah berakting bisa langsung mengikuti kelas?', a: 'Tentu saja. Kami memiliki jalur Beginner untuk Kids, Teens, dan Adults yang dimulai dari dasar pengolahan tubuh, vokal, kepercayaan diri, hingga pembacaan naskah bertahap.' },
      { q: 'Bagaimana alur audisi atau penempatan kelas di Atelier Panggung & Sinema?', a: 'Untuk kelas reguler dan trial tidak ada seleksi ketat; pelatih akan memetakan level Anda saat sesi awal. Untuk program intensif atau proyek produksi tertentu, akan dilakukan sesi pembacaan naskah/audisi singkat.' },
      { q: 'Apa saja pilihan paket kelas dan sistem pembayarannya?', a: 'Tersedia Trial Class (Rp 150.000), Regular Class Bulanan (Rp 1.250.000/bulan), Private Coaching (Rp 550.000/sesi), dan Intensive Program 8 Minggu (Rp 3.400.000).' },
      { q: 'Apakah siswa berkesempatan tampil di panggung, film pendek, atau casting?', a: 'Ya. Setiap periode pembelajaran ditutup dengan showcase/pertunjukan, serta siswa aktif dapat mengikuti proyek film pendek internal dan informasi casting call yang relevan.' }
    ];

    function renderCinemaFAQ() {
      document.getElementById('cinema-faq-list').innerHTML = cinemaFaqItems.map((item, i) => `
        <div class="bg-umber/25 border border-spotgold/40 rounded-xl overflow-hidden">
          <button onclick="toggleCinemaFAQ(${i})" class="w-full px-5 py-4 text-left flex items-center justify-between font-cinema font-bold text-xs sm:text-sm text-parchment uppercase">
            <span>${item.q}</span>
            <span id="c-faq-icon-${i}" class="text-champagne text-lg font-bold">+</span>
          </button>
          <div id="c-faq-ans-${i}" class="hidden px-5 pb-4 text-xs sm:text-sm text-parchment/80 border-t border-spotgold/20 pt-3 leading-relaxed">${item.a}</div>
        </div>
      `).join('');
    }
    function toggleCinemaFAQ(i) {
      const ans = document.getElementById(`c-faq-ans-${i}`);
      const ico = document.getElementById(`c-faq-icon-${i}`);
      const isHidden = ans.classList.contains('hidden');
      ans.classList.toggle('hidden');
      ico.textContent = isHidden ? '−' : '+';
    }

    // 8. MULTIPAGE VIEW SWITCHER & LANGUAGE (ID / EN)
    function switchStageView(viewKey) {
      document.querySelectorAll('.stage-nav-btn').forEach(btn => {
        btn.className = btn.dataset.stageNav === viewKey
          ? 'stage-nav-btn px-3.5 py-2 rounded text-xs font-cinema font-bold uppercase tracking-wider bg-spotgold text-velvet shadow transition-all'
          : 'stage-nav-btn px-3.5 py-2 rounded text-xs font-cinema font-semibold uppercase tracking-wider text-parchment/80 hover:text-champagne transition-all';
      });
      document.querySelectorAll('[data-stage-section]').forEach(sec => {
        if (viewKey === 'all') sec.classList.remove('hidden');
        else sec.classList.toggle('hidden', sec.getAttribute('data-stage-section') !== viewKey);
      });
      window.scrollTo({ top: 0, behavior: 'smooth' });
    }

    function toggleStageMobileMenu() {
      document.getElementById('stage-mobile-menu').classList.toggle('hidden');
    }

    const cinemaCopy = {
      id: {
        nav_all: 'All Stage',
        nav_craft: 'Programs & Craft',
        nav_spaces: 'Schedule & Spaces',
        nav_show: 'Showcase & Casting',
        nav_enroll: 'Enrollment',
        cta_join_top: 'Join Class',
        hero_badge: 'ACTING & DRAMA CONSERVATORY • STAGE & SCREEN',
        hero_title_1: 'Where Truth Meets',
        hero_subtitle: 'Sekolah seni peran & teater dramatis untuk Kids, Teens, dan Adults — mengasah Film Acting, Theatre, TV, Voice Acting, & Musical Theatre dari level Beginner hingga Advanced.',
        hero_desc: 'Berlatih di bawah bimbingan aktor panggung, sutradara film, dan pelatih vokal profesional dengan pendekatan Method Acting, improvisasi, analisis naskah, serta persiapan audisi & self-tape.',
        cta_join_class: 'Join Class',
        cta_explore_stage: 'Explore Stage & Programs'
      },
      en: {
        nav_all: 'All Stage',
        nav_craft: 'Programs & Craft',
        nav_spaces: 'Schedule & Spaces',
        nav_show: 'Showcase & Casting',
        nav_enroll: 'Enrollment',
        cta_join_top: 'Join Class',
        hero_badge: 'ACTING & DRAMA CONSERVATORY • STAGE & SCREEN',
        hero_title_1: 'Where Truth Meets',
        hero_subtitle: 'Dramatic acting & theatre conservatory for Kids, Teens, and Adults — mastering Film Acting, Theatre, TV, Voice Acting, & Musical Theatre from Beginner to Advanced.',
        hero_desc: 'Train with stage actors, film directors, and vocal coaches through Method Acting, improvisation, scene study, and audition & self-tape coaching.',
        cta_join_class: 'Join Class',
        cta_explore_stage: 'Explore Stage & Programs'
      }
    };

    function setCinemaLang(lang) {
      const idBtn = document.getElementById('lang-id-btn');
      const enBtn = document.getElementById('lang-en-btn');
      if (!cinemaCopy[lang] || !idBtn || !enBtn) return;
      idBtn.className = lang === 'id' ? 'px-2.5 py-1 rounded bg-spotgold text-velvet transition-all' : 'px-2.5 py-1 rounded text-parchment/75 hover:text-champagne transition-all';
      enBtn.className = lang === 'en' ? 'px-2.5 py-1 rounded bg-spotgold text-velvet transition-all' : 'px-2.5 py-1 rounded text-parchment/75 hover:text-champagne transition-all';
      document.querySelectorAll('[data-i18n]').forEach(el => {
        const key = el.getAttribute('data-i18n');
        if (cinemaCopy[lang][key]) el.textContent = cinemaCopy[lang][key];
      });
    }

    // 9. UNIQUE FLOATING AI CHATBOT ("MAESTRO CUE AI")
    function toggleMaestroAI() {
      document.getElementById('maestro-ai-window').classList.toggle('hidden');
    }

    function handleMaestroAISubmit(e) {
      e.preventDefault();
      const input = document.getElementById('maestro-ai-input');
      const q = input.value.trim();
      if (!q) return;
      input.value = '';
      askMaestroAI(q);
    }

    function askMaestroAI(question) {
      const feed = document.getElementById('maestro-ai-feed');
      const userBubble = document.createElement('div');
      userBubble.className = 'bg-spotgold text-velvet font-semibold p-3 rounded-xl ml-auto max-w-[82%]';
      userBubble.textContent = question;
      feed.appendChild(userBubble);

      const ql = question.toLowerCase();
      let reply = '<em>Action!</em> 🎭 Gunakan <strong>Pendaftaran 7 Langkah</strong> pada halaman ini untuk memilih program, jadwal, instruktur, dan langsung mengirim pendaftaran ke WhatsApp admin.';

      if (ql.includes('pemula') || ql.includes('program')) {
        reply = '🎬 Untuk pemula, kami menyarankan <strong>Film Acting</strong> atau <strong>Theatre Acting</strong> level <em>Beginner</em> (tersedia kelas Kids, Teens, dan Adults), atau <strong>Trial Class</strong> untuk mencoba suasana studio terlebih dahulu.';
      } else if (ql.includes('audisi') || ql.includes('self-tape') || ql.includes('casting')) {
        reply = '🎭 Untuk <strong>Audition &amp; Self-Tape</strong>, fokuslah pada kejelasan *objective* karakter, pencahayaan *key-light* yang rapi, *eye-line* konsisten, dan mendengarkan arahan sutradara dengan terbuka.';
      } else if (ql.includes('paket') || ql.includes('biaya') || ql.includes('trial') || ql.includes('regular')) {
        reply = '✦ <strong>Pilihan Paket:</strong><br>• <em>Trial Class:</em> Rp 150.000 (1 sesi)<br>• <em>Regular Class:</em> Rp 1.250.000/bulan (4x)<br>• <em>Private Coaching:</em> Rp 550.000/sesi<br>• <em>Intensive Program:</em> Rp 3.400.000 (8 minggu)';
      }

      setTimeout(() => {
        const aiBubble = document.createElement('div');
        aiBubble.className = 'bg-umber/35 p-3.5 rounded-xl border border-spotgold/35 text-parchment max-w-[88%] leading-relaxed';
        aiBubble.innerHTML = reply;
        feed.appendChild(aiBubble);
        feed.scrollTop = feed.scrollHeight;
      }, 300);
      feed.scrollTop = feed.scrollHeight;
    }

    // 10. INITIALIZE ON LOAD (progressive enhancement; no blank sections if JS fails)
    function initAtelierStage() {
      renderActingPrograms();
      selectCuePrompt(0);
      renderActingSchedule();
      updateRegSummary();
      renderCinemaFAQ();

      const waLink = document.getElementById('atelier-whatsapp-link');
      if (waLink) {
        const message = 'Halo Admin Atelier Panggung & Sinema! Saya ingin konsultasi kelas akting dan jadwal audisi.';
        waLink.href = `https://wa.me/${ATELIER_WHATSAPP_NUMBER}?text=${encodeURIComponent(message)}`;
      }

      const revealItems = document.querySelectorAll('.reveal-stage');
      if (!('IntersectionObserver' in window)) {
        revealItems.forEach(el => el.classList.add('visible'));
        return;
      }
      document.body.classList.add('reveal-stage-ready');
      const observer = new IntersectionObserver(entries => {
        entries.forEach(entry => {
          if (entry.isIntersecting) {
            entry.target.classList.add('visible');
            observer.unobserve(entry.target);
          }
        });
      }, { threshold: 0.08 });
      revealItems.forEach(el => observer.observe(el));
    }

    if (document.readyState === 'loading') {
      document.addEventListener('DOMContentLoaded', initAtelierStage, { once: true });
    } else {
      initAtelierStage();
    }
