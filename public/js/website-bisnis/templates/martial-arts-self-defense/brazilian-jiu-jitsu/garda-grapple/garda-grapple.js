// 1. BJJ PROGRAMS DATA (BY LEVEL, AGE & WOMEN-ONLY)
    const GARDA_WHATSAPP_NUMBER = String(document.body?.dataset.whatsappNumber || '6281234567890').replace(/\D/g, '');

    function gardaEscapeHtml(value) {
      return String(value ?? '').replace(/[&<>"']/g, (char) => ({
        '&': '&amp;', '<': '&lt;', '>': '&gt;', '"': '&quot;', "'": '&#39;'
      }[char]));
    }

    function validateTrialParticipant(showMessage = true) {
      const program = document.querySelector('input[name="tr_program"]:checked')?.value || '';
      const name = document.getElementById('tr_name')?.value.trim() || '';
      const ageValue = document.getElementById('tr_age')?.value.trim() || '';
      const age = Number(ageValue);
      const wa = document.getElementById('tr_wa')?.value.trim() || '';
      const parent = document.getElementById('tr_parent')?.value.trim() || '';
      const errors = [];
      if (!name) errors.push('Nama lengkap peserta wajib diisi.');
      if (!ageValue || !Number.isFinite(age) || age < 4 || age > 75) errors.push('Usia peserta harus diisi dengan angka 4–75 tahun.');
      if (!wa || wa.replace(/\D/g, '').length < 9) errors.push('Nomor WhatsApp aktif belum valid.');
      if ((program.includes('Kids') || program.includes('Teen')) && !parent) errors.push('Kontak orang tua/wali wajib diisi untuk peserta Kids dan Teen.');
      if (errors.length && showMessage) {
        window.alert(errors.join('\n'));
        const firstInvalid = !name ? 'tr_name' : (!ageValue || !Number.isFinite(age) || age < 4 || age > 75) ? 'tr_age' : (!wa || wa.replace(/\D/g, '').length < 9) ? 'tr_wa' : 'tr_parent';
        document.getElementById(firstInvalid)?.focus();
      }
      return errors.length === 0;
    }

    const bjjPrograms = [
      {
        title: 'BJJ Fundamentals',
        cat: 'Level',
        badge: 'COMPLETE BEGINNER',
        mode: 'GI (KIMONO)',
        img: 'https://images.unsplash.com/photo-1555597673-b21d5c935865?auto=format&fit=crop&w=700&q=85',
        desc: 'Kurikulum 16 minggu teknik dasar pertahanan diri, posisi dominan, escape dari bawah, dan kuncian dasar yang aman.',
        programValue: 'Adult BJJ (Fundamentals / Gi & No-Gi)'
      },
      {
        title: 'Beginner & Intermediate',
        cat: 'Level',
        badge: 'WHITE – BLUE BELT',
        mode: 'GI & NO-GI',
        img: 'https://images.unsplash.com/photo-1517438322307-e67111335449?auto=format&fit=crop&w=700&q=85',
        desc: 'Kombinasi guard passing, sweep berantai, takedown judo/gulat, dan positional sparring terstruktur.',
        programValue: 'Adult BJJ (Fundamentals / Gi & No-Gi)'
      },
      {
        title: 'Advanced & Competition Team',
        cat: 'Level',
        badge: 'BLUE – BLACK BELT',
        mode: 'PRO SPARRING',
        img: 'https://images.unsplash.com/photo-1583473848882-f9a5bc7fd2ee?auto=format&fit=crop&w=700&q=85',
        desc: 'Strategi poin IBJJF, submission-only leg lock system, dan sesi sparring intensitas tinggi persiapan kejuaraan.',
        programValue: 'Competition Team & Submission Grappling'
      },
      {
        title: 'Women-Only BJJ & Self-Defense',
        cat: 'Women',
        badge: 'WOMEN EXCLUSIVE',
        mode: 'GI & SELF-DEFENSE',
        img: 'https://images.unsplash.com/photo-1544367567-0f2fcb009e0b?auto=format&fit=crop&w=700&q=85',
        desc: 'Kelas khusus perempuan yang dipimpin instruktur wanita. Fokus pada pertahanan diri realistis, kebugaran, dan rasa percaya diri.',
        programValue: 'Women Only BJJ & Self-Defense'
      },
      {
        title: 'Kids BJJ (Little Grapplers)',
        cat: 'Age',
        badge: 'USIA 5 – 12 TAHUN',
        mode: 'ANTI-BULLYING',
        img: 'https://images.unsplash.com/photo-1534438327276-14e5300c3a48?auto=format&fit=crop&w=700&q=85',
        desc: 'Membangun koordinasi motorik, disiplin, fokus, dan keterampilan bela diri non-kekerasan dalam suasana menyenangkan.',
        programValue: 'Kids BJJ (5 - 12 Thn)'
      },
      {
        title: 'Teen BJJ Academy',
        cat: 'Age',
        badge: 'USIA 13 – 17 TAHUN',
        mode: 'YOUTH ATHLETE',
        img: 'https://images.unsplash.com/photo-1567013127542-490d757e51fc?auto=format&fit=crop&w=700&q=85',
        desc: 'Transisi teknik dewasa untuk remaja, ketahanan mental, kebugaran atletik, dan kesiapan turnamen remaja.',
        programValue: 'Teen BJJ (13 - 17 Thn)'
      },
      {
        title: 'No-Gi Submission Grappling',
        cat: 'Level',
        badge: 'ALL LEVELS',
        mode: 'RASH GUARD',
        img: 'https://images.unsplash.com/photo-1594381898411-846e7d193883?auto=format&fit=crop&w=700&q=85',
        desc: 'Grappling modern bertempo cepat tanpa seragam kimono, mengandalkan kontrol pergelangan, gulat, dan kuncian.',
        programValue: 'Adult BJJ (Fundamentals / Gi & No-Gi)'
      },
      {
        title: '1-on-1 Private Coaching',
        cat: 'Level',
        badge: 'PERSONAL MENTORSHIP',
        mode: 'FLEXIBLE TIME',
        img: 'https://images.unsplash.com/photo-1555597673-b21d5c935865?auto=format&fit=crop&w=700&q=85',
        desc: 'Percepatan penguasaan teknik bersama Professor sabuk hitam dengan jadwal dan target latihan khusus Anda.',
        programValue: 'Adult BJJ (Fundamentals / Gi & No-Gi)'
      }
    ];

    function filterPrograms(cat) {
      document.querySelectorAll('.prog-filter-btn').forEach(b => {
        b.className = b.dataset.progCat === cat
          ? 'prog-filter-btn px-4 py-2 rounded text-xs font-tactical font-bold uppercase bg-crimson text-bone'
          : 'prog-filter-btn px-4 py-2 rounded text-xs font-tactical font-bold uppercase bg-carbon text-bone/80 border border-steel/50 hover:border-crimson';
      });

      const list = cat === 'All' ? bjjPrograms : bjjPrograms.filter(p => p.cat === cat);
      document.getElementById('programs-grid').innerHTML = list.map(p => `
        <div class="tactical-card bg-obsidian border border-steel/50 chamfer-card overflow-hidden flex flex-col justify-between">
          <div>
            <div class="relative aspect-[16/10] bg-carbon">
              <img src="${p.img}" alt="${p.title}" class="w-full h-full object-cover" />
              <div class="absolute inset-0 bg-gradient-to-t from-obsidian via-transparent to-transparent"></div>
              <span class="absolute top-3 left-3 px-2.5 py-0.5 bg-crimson text-bone font-mono text-[10px] font-bold">${p.badge}</span>
              <span class="absolute bottom-2.5 right-3 font-mono text-[10px] text-bone/90 bg-obsidian/85 px-2 py-0.5 rounded">${p.mode}</span>
            </div>
            <div class="p-5 space-y-2">
              <h3 class="font-tactical font-bold text-lg text-bone uppercase leading-snug">${p.title}</h3>
              <p class="text-xs text-bone/75 leading-relaxed">${p.desc}</p>
            </div>
          </div>
          <div class="px-5 pb-5">
            <button onclick="selectProgramForTrial('${p.programValue}')" class="w-full py-2.5 rounded bg-carbon hover:bg-crimson text-bone font-tactical font-bold text-xs uppercase border border-steel/50 transition-all">
              Pilih untuk Trial →
            </button>
          </div>
        </div>
      `).join('');
    }

    function selectProgramForTrial(progVal) {
      switchPage('all');
      const radio = Array.from(document.querySelectorAll('input[name="tr_program"]')).find(r => r.value === progVal);
      if (radio) radio.checked = true;
      toggleParentField();
      updateTrialSummary();
      goToTrialStep(2);
      document.getElementById('trial-booking-section').scrollIntoView({ behavior: 'smooth' });
    }

    // 2. IBJJF BELT RANKING SYSTEM & STUDENT PROGRESS SIMULATOR
    const beltSpecs = {
      white: {
        name: 'White Belt (Sabuk Putih)',
        time: '0 – 18 Bulan • 4 Stripes Progression',
        colorHex: '#F2EFE9',
        barHex: '#111318',
        focus: 'Survival, Escapes & Fundamental Positions',
        criteria: 'Menguasai teknik jatuh aman (ukemi), melepaskan diri dari side control/mount, mempertahankan closed guard, serta 2 sapuan (sweep) dan 2 kuncian dasar.',
        stripes: 'Setiap 35–45 jam latihan di matras, siswa dievaluasi untuk menerima 1 stripe putih pada ujung sabuk.'
      },
      blue: {
        name: 'Blue Belt (Sabuk Biru)',
        time: '1.5 – 3.5 Tahun • 4 Stripes Progression',
        colorHex: '#1E56A0',
        barHex: '#111318',
        focus: 'Technical Breadth, Guard Passing & Takedowns',
        criteria: 'Memiliki sistem serangan dan pertahanan lengkap dari setiap posisi utama, mampu merangkai kombinasi teknik (chain grappling) saat live rolling.',
        stripes: 'Membutuhkan konsistensi kehadiran, pemahaman aturan poin IBJJF, serta kontrol emosi saat sparring.'
      },
      purple: {
        name: 'Purple Belt (Sabuk Ungu)',
        time: '4 – 6 Tahun • 4 Stripes Progression',
        colorHex: '#6A2C91',
        barHex: '#111318',
        focus: 'Personal Game Development & Transition Mastery',
        criteria: 'Mengembangkan gaya permainan khas (A-game), transisi mulus antar posisi, dan mulai membimbing rekan latihan sabuk putih/biru.',
        stripes: 'Evaluasi kedalaman strategi pertarungan dan efisiensi penggunaan energi di matras.'
      },
      brown: {
        name: 'Brown Belt (Sabuk Cokelat)',
        time: '6.5 – 8.5 Tahun • 4 Stripes Progression',
        colorHex: '#5C3A21',
        barHex: '#111318',
        focus: 'Precision Refinement & Submission Traps',
        criteria: 'Penyempurnaan detail mikro pada setiap kuncian dan pertahanan, tanpa celah posisi yang mudah dieksploitasi lawan.',
        stripes: 'Tahap pematangan akhir sebelum memasuki standar instruktur sabuk hitam.'
      },
      black: {
        name: 'Black Belt (Sabuk Hitam)',
        time: '9+ Tahun • IBJJF Certified Lineage',
        colorHex: '#111318',
        barHex: '#C43B35',
        focus: 'Mastery, Pedagogy & Art Preservation',
        criteria: 'Penguasaan menyeluruh seni Brazilian Jiu-Jitsu Gi & No-Gi, integritas karakter tinggi, dan kemampuan mengajarkan sistem secara terstruktur.',
        stripes: 'Degree diberikan setiap 3–5 tahun pengabdian aktif setelah menyandang Sabuk Hitam.'
      }
    };

    function selectBelt(key) {
      const b = beltSpecs[key];
      if (!b) return;

      document.querySelectorAll('.belt-btn').forEach(btn => {
        btn.className = btn.dataset.belt === key
          ? 'belt-btn p-4 rounded-lg bg-carbon border-2 border-crimson text-left transition-all shadow-lg'
          : 'belt-btn p-4 rounded-lg bg-carbon border border-steel/40 hover:border-crimson text-left transition-all';
      });

      document.getElementById('belt-detail-box').innerHTML = `
        <div>
          <span class="font-mono text-xs text-crimson font-bold uppercase">${b.time}</span>
          <h3 class="font-tactical text-2xl sm:text-3xl font-bold text-bone uppercase mt-1">${b.name}</h3>

          <!-- Realistic Pearl-Weave Belt Graphic -->
          <div class="my-6 h-12 w-full rounded pearl-weave border border-steel/60 flex justify-end overflow-hidden shadow-xl" style="background-color: ${b.colorHex}">
            <div class="w-28 h-full flex items-center justify-evenly px-3" style="background-color: ${b.barHex}">
              <span class="w-2 h-full bg-white shadow"></span>
              <span class="w-2 h-full bg-white shadow"></span>
              <span class="w-2 h-full bg-white shadow"></span>
              <span class="w-2 h-full bg-white shadow"></span>
            </div>
          </div>

          <div class="space-y-3 text-xs sm:text-sm">
            <div class="p-4 bg-obsidian/85 rounded border border-steel/35">
              <strong class="text-crimson font-tactical uppercase block mb-1">Fokus Utama Kurikulum: ${b.focus}</strong>
              <p class="text-bone/80 leading-relaxed">${b.criteria}</p>
            </div>
            <div class="p-4 bg-obsidian/85 rounded border border-steel/35">
              <strong class="text-bone font-tactical uppercase block mb-1">Kriteria Kenaikan Stripe:</strong>
              <p class="text-bone/75 leading-relaxed">${b.stripes}</p>
            </div>
          </div>
        </div>
      `;
    }

    function updateStudentProgressSim() {
      const hrs = parseInt(document.getElementById('sim-hours-slider').value);
      let rankLabel = 'White Belt — Stripe 1';
      if (hrs >= 350) rankLabel = 'Blue Belt Promotion Eligible! 🥋';
      else if (hrs >= 250) rankLabel = 'White Belt — Stripe 4';
      else if (hrs >= 140) rankLabel = 'White Belt — Stripe 3';
      else if (hrs >= 70) rankLabel = 'White Belt — Stripe 2';

      document.getElementById('sim-hours-val').textContent = `${hrs} Jam (${rankLabel})`;

      const base = Math.min(98, Math.round((hrs / 380) * 100));
      const skills = [
        { name: 'Guard Retention & Hip Escape', pct: Math.min(98, base + 12) },
        { name: 'Positional Control (Mount & Side)', pct: Math.min(96, base + 5) },
        { name: 'Takedowns & Guard Passing', pct: Math.min(94, Math.max(18, base - 4)) },
        { name: 'Submission Finishes & Defense', pct: Math.min(95, Math.max(15, base - 2)) }
      ];

      document.getElementById('student-skill-bars').innerHTML = skills.map(s => `
        <div>
          <div class="flex justify-between font-mono text-[11px] mb-1">
            <span class="text-bone/85">${s.name}</span>
            <span class="text-crimson font-bold">${s.pct}%</span>
          </div>
          <div class="w-full h-2 bg-obsidian rounded-full overflow-hidden">
            <div class="h-full bg-crimson transition-all duration-300" style="width: ${s.pct}%"></div>
          </div>
        </div>
      `).join('');
    }

    // 3. WEEKLY CLASS SCHEDULE & OPEN MAT
    const scheduleItems = [
      { day: 'Senin', time: '19:00 – 20:30', title: 'BJJ Fundamentals (All Levels)', type: 'Fundamentals', mode: 'GI', prof: 'Prof. Rafael Santoso', slots: 'Sisa 4 Slot' },
      { day: 'Selasa', time: '16:00 – 17:15', title: 'Kids & Teens BJJ Academy', type: 'Kids & Teens', mode: 'GI', prof: 'Coach Bima Wijaya', slots: 'Sisa 5 Slot' },
      { day: 'Selasa', time: '19:00 – 20:30', title: 'No-Gi Submission Grappling', type: 'Competition', mode: 'NO-GI', prof: 'Coach Marcus Silva', slots: 'Sisa 3 Slot' },
      { day: 'Rabu', time: '19:00 – 20:30', title: 'Women-Only BJJ & Self-Defense', type: 'Women Only', mode: 'GI', prof: 'Coach Nadia Kartika', slots: 'Sisa 6 Slot' },
      { day: 'Kamis', time: '19:30 – 21:00', title: 'Competition Team & Advanced Drilling', type: 'Competition', mode: 'GI & NO-GI', prof: 'Prof. Rafael & Coach Marcus', slots: 'Sisa 2 Slot' },
      { day: 'Jumat', time: '19:30 – 21:30', title: 'Friday Night Open Mat Sparring', type: 'Open Mat', mode: 'GI / NO-GI', prof: 'All Professors Supervising', slots: 'Open Entry' },
      { day: 'Sabtu', time: '09:00 – 10:30', title: 'Saturday Women-Only & Beginner Intro', type: 'Women Only', mode: 'GI', prof: 'Coach Nadia Kartika', slots: 'Sisa 5 Slot' },
      { day: 'Sabtu', time: '10:45 – 12:00', title: 'Kids & Teens Weekend Mat', type: 'Kids & Teens', mode: 'GI', prof: 'Coach Bima Wijaya', slots: 'Sisa 4 Slot' }
    ];

    function renderSchedule() {
      const dayF = document.getElementById('sched-day-filter').value;
      const typeF = document.getElementById('sched-type-filter').value;
      const filtered = scheduleItems.filter(s =>
        (dayF === 'All' || s.day.includes(dayF)) &&
        (typeF === 'All' || s.type === typeF)
      );

      document.getElementById('bjj-schedule-body').innerHTML = filtered.map(s => `
        <tr class="hover:bg-carbon/60 transition-colors">
          <td class="p-4 font-mono text-xs">
            <strong class="text-crimson block">${s.day}</strong>
            <span class="text-bone/80">${s.time} WIB</span>
          </td>
          <td class="p-4">
            <strong class="text-bone font-tactical uppercase block">${s.title}</strong>
            <span class="font-mono text-[10px] text-bone/60">${s.type} • ${s.slots}</span>
          </td>
          <td class="p-4">
            <span class="px-2.5 py-1 rounded bg-carbon border border-steel/50 font-mono text-[10px] font-bold text-bone">${s.mode}</span>
          </td>
          <td class="p-4 text-xs text-bone/85">${s.prof}</td>
          <td class="p-4 text-right">
            <button onclick="bookFromSchedule('${s.day}', '${s.prof}')" class="px-3.5 py-2 rounded bg-crimson hover:bg-[#d8443e] text-bone font-tactical font-bold text-xs uppercase">
              Book Trial
            </button>
          </td>
        </tr>
      `).join('');
    }

    function bookFromSchedule(day, prof) {
      switchPage('all');
      const daySel = document.getElementById('tr_day');
      const dOpt = Array.from(daySel.options).find(o => o.value.includes(day));
      if (dOpt) daySel.value = dOpt.value;

      const profSel = document.getElementById('tr_prof');
      const pOpt = Array.from(profSel.options).find(o => o.value.includes(prof.split(' ')[1]));
      if (pOpt) profSel.value = pOpt.value;

      updateTrialSummary();
      goToTrialStep(4);
      document.getElementById('trial-booking-section').scrollIntoView({ behavior: 'smooth' });
    }

    // 4. 7-STEP TRIAL CLASS RESERVATION WIZARD
    let currentTrialStep = 1;
    const trialStepTitles = [
      'STEP 1 OF 7 // PILIH PROGRAM BJJ',
      'STEP 2 OF 7 // PILIH LEVEL PENGALAMAN',
      'STEP 3 OF 7 // PILIH JADWAL & INSTRUKTUR',
      'STEP 4 OF 7 // ISI DATA PESERTA',
      'STEP 5 OF 7 // PILIH JENIS SESI',
      'STEP 6 OF 7 // REVIEW RESERVASI',
      'STEP 7 OF 7 // KIRIM RESERVASI VIA WHATSAPP'
    ];

    function goToTrialStep(step) {
      if (step < 1 || step > 7) return;
      currentTrialStep = step;
      document.querySelectorAll('.tr-step').forEach((el, i) => el.classList.toggle('hidden', i + 1 !== currentTrialStep));
      document.getElementById('tr-step-label').textContent = trialStepTitles[currentTrialStep - 1];
      const pct = Math.round((currentTrialStep / 7) * 100);
      document.getElementById('tr-step-pct').textContent = `${pct}%`;
      document.getElementById('tr-progress-bar').style.width = `${(currentTrialStep / 7) * 100}%`;

      document.querySelectorAll('.tr-dot').forEach((d, i) => {
        d.className = i + 1 <= currentTrialStep ? 'tr-dot h-1.5 rounded bg-crimson' : 'tr-dot h-1.5 rounded bg-steel/40';
      });

      document.getElementById('tr-prev').disabled = currentTrialStep === 1;
      const nextBtn = document.getElementById('tr-next');
      if (currentTrialStep === 7) nextBtn.classList.add('hidden');
      else {
        nextBtn.classList.remove('hidden');
        nextBtn.textContent = currentTrialStep === 6 ? 'Lanjut Kirim WA →' : 'Next Step →';
      }
      updateTrialSummary();
    }

    function changeTrialStep(delta) {
      if (delta > 0 && currentTrialStep === 4 && !validateTrialParticipant(true)) return;
      goToTrialStep(currentTrialStep + delta);
    }

    function toggleParentField() {
      const prog = document.querySelector('input[name="tr_program"]:checked')?.value || '';
      const isMinor = prog.includes('Kids') || prog.includes('Teen');
      document.getElementById('parent-contact-wrap').classList.toggle('hidden', !isMinor);
    }

    function selectSessionForWizard(sessionText) {
      switchPage('all');
      const sel = document.getElementById('tr_session');
      const opt = Array.from(sel.options).find(o => o.value.includes(sessionText.split(' (')[0]));
      if (opt) sel.value = opt.value;
      updateTrialSummary();
      goToTrialStep(1);
      document.getElementById('trial-booking-section').scrollIntoView({ behavior: 'smooth' });
    }

    function getTrialBookingData() {
      const program = document.querySelector('input[name="tr_program"]:checked')?.value || 'Adult BJJ';
      const level = document.getElementById('tr_level').value;
      const day = document.getElementById('tr_day').value;
      const time = document.getElementById('tr_time').value;
      const prof = document.getElementById('tr_prof').value;
      const name = document.getElementById('tr_name').value.trim() || '(Belum diisi)';
      const age = document.getElementById('tr_age').value.trim() || '(Belum diisi)';
      const wa = document.getElementById('tr_wa').value.trim() || '(Belum diisi)';
      const exp = document.getElementById('tr_exp').value.trim() || 'Pemula / Belum pernah';
      const parent = document.getElementById('tr_parent').value.trim();

      const sesSel = document.getElementById('tr_session');
      const session = sesSel.value;
      const cost = sesSel.options[sesSel.selectedIndex]?.dataset.cost || 'GRATIS (Rp 0)';

      return { program, level, day, time, prof, name, age, wa, exp, parent, session, cost };
    }

    function updateTrialSummary() {
      const d = getTrialBookingData();
      const box = document.getElementById('tr-summary-box');
      if (box) {
        box.innerHTML = `
          <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
            <div><span class="font-mono text-[11px] text-bone/60 block">Program & Level</span><strong class="text-bone">${gardaEscapeHtml(d.program)}</strong><span class="block text-xs text-crimson">${gardaEscapeHtml(d.level)}</span></div>
            <div><span class="font-mono text-[11px] text-bone/60 block">Jadwal & Professor</span><strong class="text-bone">${gardaEscapeHtml(d.day)} • ${gardaEscapeHtml(d.time)}</strong><span class="block text-xs text-bone/80">${gardaEscapeHtml(d.prof)}</span></div>
            <div><span class="font-mono text-[11px] text-bone/60 block">Data Peserta</span><strong class="text-bone">${gardaEscapeHtml(d.name)} (${gardaEscapeHtml(d.age)} Thn)</strong><span class="block text-xs text-bone/75">WA: ${gardaEscapeHtml(d.wa)} • Exp: ${gardaEscapeHtml(d.exp)}</span>${d.parent ? `<span class="block text-xs text-crimson">Wali: ${gardaEscapeHtml(d.parent)}</span>` : ''}</div>
            <div><span class="font-mono text-[11px] text-bone/60 block">Lokasi & Jenis Sesi</span><strong class="text-bone">Garda Grapple HQ, Jakarta Selatan</strong><span class="block text-xs text-bone/80">${gardaEscapeHtml(d.session)}</span></div>
          </div>
          <div class="pt-3 border-t border-steel/40 flex justify-between items-center font-tactical text-base font-bold">
            <span class="text-bone">Estimasi Biaya Sesi:</span>
            <span class="text-crimson">${d.cost}</span>
          </div>
        `;
      }
      const prev = document.getElementById('tr-wa-preview');
      if (prev) prev.textContent = buildTrialWAMessage(d);
    }

    function buildTrialWAMessage(d) {
      return `Oss Admin *Garda Grapple BJJ Academy*! 🥋⚔️
Saya ingin melakukan reservasi Trial Class dengan detail berikut:

*1. Program & Level:*
• Program: ${d.program}
• Level Pengalaman: ${d.level}

*2. Jadwal & Instruktur:*
• Hari & Jam: ${d.day} | ${d.time}
• Professor / Coach: ${d.prof}
• Lokasi: Garda Grapple HQ, Jl. Panglima Polim No. 19

*3. Data Peserta:*
• Nama: ${d.name}
• Usia: ${d.age} Tahun
• No. WhatsApp: ${d.wa}
• Pengalaman Bela Diri: ${d.exp}${d.parent ? `\n• Kontak Orang Tua/Wali: ${d.parent}` : ''}

*4. Jenis Sesi & Biaya:*
• Sesi: ${d.session}
• Estimasi Biaya: *${d.cost}*

Mohon konfirmasi ketersediaan slot matras untuk sesi tersebut. Terima kasih, Oss! 🙏`;
    }

    function sendTrialToWhatsApp() {
      if (!validateTrialParticipant(true)) {
        goToTrialStep(4);
        return;
      }
      const d = getTrialBookingData();
      if (!GARDA_WHATSAPP_NUMBER || GARDA_WHATSAPP_NUMBER.length < 9) {
        window.alert('Nomor WhatsApp admin belum dikonfigurasi. Perbarui data-whatsapp-number pada tag body.');
        return;
      }
      window.open(`https://wa.me/${GARDA_WHATSAPP_NUMBER}?text=${encodeURIComponent(buildTrialWAMessage(d))}`, '_blank', 'noopener,noreferrer');
    }

    function copyTrialWA() {
      const txt = document.getElementById('tr-wa-preview').textContent;
      const t = document.createElement('textarea');
      t.value = txt;
      document.body.appendChild(t);
      t.select();
      document.execCommand('copy');
      document.body.removeChild(t);
      const toast = document.getElementById('tr-copy-toast');
      toast.classList.remove('hidden');
      setTimeout(() => toast.classList.add('hidden'), 3000);
    }

    // 5. FAQ ACCORDION
    const bjjFaqs = [
      { q: 'Apakah saya harus sudah bugar atau fleksibel sebelum mulai latihan BJJ?', a: 'Tidak perlu. Justru latihan Brazilian Jiu-Jitsu akan membangun kebugaran kardio, kekuatan inti, dan fleksibilitas Anda secara bertahap sejak hari pertama.' },
      { q: 'Apakah saya harus membeli Gi (seragam kimono) sebelum datang ke kelas pertama?', a: 'Tidak wajib. Untuk Free Trial pertama Anda bisa memakai kaos olahraga dan celana training tanpa ritsleting, atau memilih opsi Loaner Gi steril seharga Rp 100.000.' },
      { q: 'Apakah kelas Women-Only aman untuk perempuan tanpa pengalaman bela diri?', a: 'Sangat aman. Kelas Women-Only dipandu oleh Coach Nadia Kartika (Black Belt) dalam lingkungan tertutup yang suportif, berfokus pada teknik leverage dan pelepasan kuncian.' },
      { q: 'Berapa lama waktu yang dibutuhkan untuk naik dari White Belt ke Blue Belt?', a: 'Rata-rata membutuhkan waktu 1,5 hingga 2,5 tahun dengan frekuensi latihan 2–3 kali per minggu. Kenaikan stripe diberikan setiap beberapa bulan berdasarkan progres teknis.' }
    ];

    function renderBjjFAQ() {
      document.getElementById('bjj-faq-list').innerHTML = bjjFaqs.map((f, i) => `
        <div class="bg-carbon border border-steel/40 rounded overflow-hidden">
          <button onclick="toggleBjjFAQ(${i})" class="w-full px-5 py-4 text-left flex items-center justify-between font-tactical font-bold text-xs sm:text-sm text-bone uppercase">
            <span>${f.q}</span>
            <span id="bjj-faq-s-${i}" class="text-crimson font-mono text-lg">+</span>
          </button>
          <div id="bjj-faq-a-${i}" class="hidden px-5 pb-4 text-xs text-bone/80 border-t border-steel/30 pt-3 leading-relaxed">${f.a}</div>
        </div>
      `).join('');
    }
    function toggleBjjFAQ(i) {
      const a = document.getElementById(`bjj-faq-a-${i}`);
      const s = document.getElementById(`bjj-faq-s-${i}`);
      const hidden = a.classList.contains('hidden');
      a.classList.toggle('hidden');
      s.textContent = hidden ? '−' : '+';
    }

    // 6. MULTIPAGE SWITCHER & ID/EN LANGUAGE
    function switchPage(key) {
      document.querySelectorAll('.nav-pill').forEach(b => {
        b.className = b.dataset.nav === key
          ? 'nav-pill px-3.5 py-2 rounded text-xs font-tactical font-bold uppercase tracking-wider transition-all bg-crimson text-bone shadow'
          : 'nav-pill px-3.5 py-2 rounded text-xs font-tactical font-semibold uppercase tracking-wider text-bone/75 hover:text-bone transition-all';
      });
      document.querySelectorAll('[data-section]').forEach(sec => {
        if (key === 'all') sec.classList.remove('hidden');
        else sec.classList.toggle('hidden', sec.getAttribute('data-section') !== key);
      });
      window.scrollTo({ top: 0, behavior: 'smooth' });
    }

    function toggleMobileMenu() {
      document.getElementById('mobile-menu').classList.toggle('hidden');
    }

    const i18nDict = {
      id: {
        nav_all: 'All Sectors',
        nav_prog: 'Programs & Belts',
        nav_sched: 'Schedule & Mats',
        nav_gear: 'Gear & Safety',
        nav_book: 'Trial Booking',
        cta_nav: 'Join Free Trial',
        hero_tag: 'TACTICAL GRAPPLING • GI & NO-GI • JAKARTA',
        hero_h1_1: 'Master The Art Of',
        hero_h1_2: 'Leverage Over Strength. Precision Under Pressure.',
        hero_desc: 'Akademi Brazilian Jiu-Jitsu modern dengan kurikulum sistematis untuk Kids, Teens, Adults, Women-Only Self-Defense, hingga Competition Team. Dirancang aman untuk pemula tanpa latar belakang bela diri.',
        cta_hero_trial: 'Join a Trial Class',
        cta_hero_prog: 'Explore Programs'
      },
      en: {
        nav_all: 'All Sectors',
        nav_prog: 'Programs & Belts',
        nav_sched: 'Schedule & Mats',
        nav_gear: 'Gear & Safety',
        nav_book: 'Trial Booking',
        cta_nav: 'Join Free Trial',
        hero_tag: 'TACTICAL GRAPPLING • GI & NO-GI • JAKARTA',
        hero_h1_1: 'Master The Art Of',
        hero_h1_2: 'Leverage Over Strength. Precision Under Pressure.',
        hero_desc: 'Modern Brazilian Jiu-Jitsu academy with structured curricula for Kids, Teens, Adults, Women-Only Self-Defense, and Competition Team. Designed to be safe and welcoming for complete beginners.',
        cta_hero_trial: 'Join a Trial Class',
        cta_hero_prog: 'Explore Programs'
      }
    };

    function setLanguage(lang) {
      document.getElementById('lang-id').className = lang === 'id' ? 'px-2.5 py-1 rounded bg-crimson text-bone transition-all' : 'px-2.5 py-1 rounded text-bone/70 hover:text-bone transition-all';
      document.getElementById('lang-en').className = lang === 'en' ? 'px-2.5 py-1 rounded bg-crimson text-bone transition-all' : 'px-2.5 py-1 rounded text-bone/70 hover:text-bone transition-all';
      document.querySelectorAll('[data-i18n]').forEach(el => {
        const k = el.getAttribute('data-i18n');
        if (i18nDict[lang][k]) el.textContent = i18nDict[lang][k];
      });
    }

    // 7. UNIQUE FLOATING AI CHATBOT ("PROFESSOR KIRA AI")
    function toggleKiraAI() {
      document.getElementById('kira-ai-window').classList.toggle('hidden');
    }

    function handleKiraAISubmit(e) {
      e.preventDefault();
      const inp = document.getElementById('kira-ai-input');
      const txt = inp.value.trim();
      if (!txt) return;
      inp.value = '';
      askKiraAI(txt);
    }

    function askKiraAI(question) {
      const feed = document.getElementById('kira-ai-feed');
      const u = document.createElement('div');
      u.className = 'bg-crimson text-bone p-3 rounded ml-auto max-w-[82%] font-medium';
      u.textContent = question;
      feed.appendChild(u);

      const q = question.toLowerCase();
      let ans = 'Oss! Silakan gunakan <strong>7-Step Trial Reservation Wizard</strong> di halaman ini untuk memilih jadwal dan langsung terhubung dengan admin dojo kami.';
      if (q.includes('pemula') || q.includes('mulai')) {
        ans = '🥋 <strong>Untuk Pemula Total:</strong> Mulailah dari kelas <em>BJJ Fundamentals</em> (Senin 19:00) atau <em>Saturday Beginner Intro</em> (Sabtu 09:00). Tersedia <strong>Free Trial</strong> dan peminjaman seragam Gi bersih!';
      } else if (q.includes('women') || q.includes('perempuan') || q.includes('wanita')) {
        ans = '🛡️ <strong>Women-Only BJJ & Self-Defense:</strong> Berlangsung setiap <em>Rabu (19:00 WIB)</em> dan <em>Sabtu (09:00 WIB)</em> bersama Coach Nadia Kartika (Black Belt 1°).';
      } else if (q.includes('gi') || q.includes('no-gi') || q.includes('perbedaan')) {
        ans = '⚔️ <strong>Gi vs No-Gi:</strong><br>• <em>Gi:</em> Menggunakan seragam kimono katun & sabuk; teknik fokus pada cengkeraman kerah, lengan baju, dan kontrol strategis.<br>• <em>No-Gi:</em> Menggunakan rash guard & celana pendek; tempo lebih cepat tanpa cengkeraman kain.';
      } else if (q.includes('biaya') || q.includes('harga') || q.includes('trial') || q.includes('monthly')) {
        ans = '💳 <strong>Biaya & Paket:</strong><br>• <em>Free Trial:</em> Rp 0 (bawa baju olahraga)<br>• <em>Paid Trial + Loaner Gi:</em> Rp 100.000<br>• <em>Single Drop-In:</em> Rp 220.000<br>• <em>Monthly Unlimited:</em> Rp 1.350.000/bulan';
      }

      setTimeout(() => {
        const b = document.createElement('div');
        b.className = 'bg-carbon p-3.5 rounded border border-steel/40 text-bone max-w-[88%] leading-relaxed';
        b.innerHTML = ans;
        feed.appendChild(b);
        feed.scrollTop = feed.scrollHeight;
      }, 320);
      feed.scrollTop = feed.scrollHeight;
    }

    // 8. ONLOAD INITIALIZATION
    function safeGardaInit(label, callback) {
      try { callback(); }
      catch (error) { console.error(`[Garda Grapple] ${label} initialization failed:`, error); }
    }

    function initGardaGrapple() {
      const waLink = document.querySelector('[data-whatsapp-link]');
      if (waLink && GARDA_WHATSAPP_NUMBER) {
        waLink.href = `https://wa.me/${GARDA_WHATSAPP_NUMBER}?text=${encodeURIComponent('Oss Admin Garda Grapple BJJ! Saya ingin bertanya tentang jadwal Trial Class.')}`;
      }
      safeGardaInit('programs', () => filterPrograms('All'));
      safeGardaInit('belt system', () => selectBelt('white'));
      safeGardaInit('student progress', updateStudentProgressSim);
      safeGardaInit('weekly schedule', renderSchedule);
      safeGardaInit('trial summary', updateTrialSummary);
      safeGardaInit('parent contact', toggleParentField);
      safeGardaInit('FAQ', renderBjjFAQ);

      if ('IntersectionObserver' in window) {
        const obs = new IntersectionObserver(entries => {
          entries.forEach(entry => {
            if (entry.isIntersecting) { entry.target.classList.add('visible'); obs.unobserve(entry.target); }
          });
        }, { threshold: 0.08 });
        document.body.classList.add('js-reveal');
        document.querySelectorAll('.reveal').forEach(el => obs.observe(el));
      }

      Object.assign(window, {
        filterPrograms, selectProgramForTrial, selectBelt, updateStudentProgressSim,
        renderSchedule, bookFromSchedule, goToTrialStep, changeTrialStep,
        toggleParentField, selectSessionForWizard, updateTrialSummary,
        sendTrialToWhatsApp, copyTrialWA, renderBjjFAQ, toggleBjjFAQ,
        switchPage, toggleMobileMenu, setLanguage, toggleKiraAI,
        handleKiraAISubmit, askKiraAI
      });
    }

    if (document.readyState === 'loading') {
      document.addEventListener('DOMContentLoaded', initGardaGrapple, { once: true });
    } else {
      initGardaGrapple();
    }
