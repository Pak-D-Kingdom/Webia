const VOLTCOURT_WHATSAPP_NUMBER = document.body?.dataset.whatsappNumber || '6281234567890';

    function voltLocalDateString() {
      const d = new Date();
      const y = d.getFullYear();
      const m = String(d.getMonth() + 1).padStart(2, '0');
      const day = String(d.getDate()).padStart(2, '0');
      return `${y}-${m}-${day}`;
    }

    function voltEscapeHtml(value) {
      return String(value ?? '').replace(/[&<>\"']/g, ch => ({ '&': '&amp;', '<': '&lt;', '>': '&gt;', '\"': '&quot;', "'": '&#39;' }[ch]));
    }

    function voltWhatsAppUrl(message) {
      return `https://wa.me/${VOLTCOURT_WHATSAPP_NUMBER}?text=${encodeURIComponent(message)}`;
    }

    // 1. FOUR SPORTS VISUAL COURT BLUEPRINTS & CURRICULUM DATA
    const sportsData = {
      padel: {
        title: 'Padel Academy & Training',
        badge: 'FIP Glass-Wall Panoramic Court (20m × 10m)',
        photo: 'https://images.unsplash.com/photo-1554068865-24cecd4e34b8?auto=format&fit=crop&w=900&q=85',
        desc: 'Kombinasi dinamis antara tenis dan squash di lapangan berdinding kaca temper. Ideal untuk pemula hingga pemain kompetitif yang ingin menguasai pantulan dinding kaca dan formasi ganda.',
        modules: [
          'Beginner Padel Introduction & Continental Grip',
          'Padel Technique & Glass-Wall Rebound Tactics',
          'Bandeja, Vibora, Chiquita & Volley Net Control',
          'Doubles Strategy & Australian Formation',
          'Private Coaching 1-on-1 & Court Booking + Racket Rental'
        ],
        coach: 'Coach Mateo Alvarez (FIP Level 2)',
        equipment: 'Raket karbon 355–370g & bola pressurized padel tersedia.',
        courtSvg: `
          <svg viewBox="0 0 320 180" class="w-full h-44 rounded-2xl bg-[#272D75] border-2 border-voltLime p-2">
            <rect x="20" y="16" width="280" height="148" rx="10" fill="#343A8F" stroke="#D8F05B" stroke-width="3"/>
            <line x1="160" y1="16" x2="160" y2="164" stroke="#FFF7F0" stroke-width="2.5" stroke-dasharray="6 4"/>
            <line x1="75" y1="16" x2="75" y2="164" stroke="#7468E8" stroke-width="1.5"/>
            <line x1="245" y1="16" x2="245" y2="164" stroke="#7468E8" stroke-width="1.5"/>
            <line x1="75" y1="90" x2="245" y2="90" stroke="#7468E8" stroke-width="1.5"/>
            <path d="M55 125 L165 65 L288 42 L215 110" stroke="#FF6B8A" stroke-width="2.5" fill="none" class="anim-dash"/>
            <circle cx="55" cy="125" r="7" fill="#D8F05B" class="anim-padel-rebound"/>
            <text x="160" y="175" text-anchor="middle" fill="#D8F05B" font-size="9" font-weight="bold">PADEL GLASS-WALL REBOUND TRAJECTORY</text>
          </svg>
        `
      },
      badminton: {
        title: 'Badminton Academy & Coaching',
        badge: 'BWF Pro Cushion Court Hall (13.4m × 6.1m)',
        photo: 'https://images.unsplash.com/photo-1626224583764-f87db24ac4ea?auto=format&fit=crop&w=900&q=85',
        desc: 'Program pelatihan bulutangkis berbasis kelincahan langkah kaki 6 sudut (6-corner footwork), ketajaman pukulan smash, dan pembibitan atlet junior hingga dewasa.',
        modules: [
          '6-Corner Footwork & Explosive Agility Training',
          'Basic Strokes, Forehand/Backhand Grip & Flick Serving',
          'Jump Smash Power, Netting Tipis & Defense Block',
          'Singles & Doubles Rotation Strategy',
          'Junior Athlete Development & Weekly Sparring Sessions'
        ],
        coach: 'Coach Dimas Pratama (BWF Level 2)',
        equipment: 'Shuttlecock bulu angsa grade turnamen & mesin feeder.',
        courtSvg: `
          <svg viewBox="0 0 320 180" class="w-full h-44 rounded-2xl bg-[#1F2463] border-2 border-coralNeon p-2">
            <rect x="24" y="18" width="272" height="144" rx="6" fill="#2E3588" stroke="#FFF7F0" stroke-width="2"/>
            <line x1="160" y1="18" x2="160" y2="162" stroke="#FF6B8A" stroke-width="3"/>
            <line x1="115" y1="18" x2="115" y2="162" stroke="#D8F05B" stroke-width="1.5"/>
            <line x1="205" y1="18" x2="205" y2="162" stroke="#D8F05B" stroke-width="1.5"/>
            <line x1="24" y1="90" x2="115" y2="90" stroke="#FFF7F0" stroke-width="1.2"/>
            <line x1="205" y1="90" x2="296" y2="90" stroke="#FFF7F0" stroke-width="1.2"/>
            <path d="M55 48 Q 160 20 265 130" stroke="#D8F05B" stroke-width="2.5" fill="none" class="anim-dash"/>
            <circle cx="65" cy="60" r="6" fill="#FFF7F0" stroke="#FF6B8A" stroke-width="2" class="anim-shuttle-flight"/>
            <text x="160" y="175" text-anchor="middle" fill="#FF6B8A" font-size="9" font-weight="bold">BWF 6-CORNER AGILITY & CROSS SMASH</text>
          </svg>
        `
      },
      tennis: {
        title: 'Tennis Academy & Lessons',
        badge: 'ITF Cushion Hardcourt (23.77m × 10.97m)',
        photo: 'https://images.unsplash.com/photo-1595435934249-5df7ed86e1c0?auto=format&fit=crop&w=900&q=85',
        desc: 'Penguasaan biomekanika pukulan modern dari baseline hingga net play pada lapangan hardcourt peredam benturan standar turnamen ITF.',
        modules: [
          'Tennis Fundamentals, Split-Step & Contact Point',
          'Kick/Flat Serve, Topspin Forehand & Two-Handed Backhand',
          'Baseline Consistency & Approach Volley Match Strategy',
          'Junior Tennis Program (Red, Orange, Green Dot Ball)',
          'Private 1-on-1 & Semi-Private Group Lessons'
        ],
        coach: 'Coach Clara Wijaya (ITF Certified)',
        equipment: 'Bola tekanan standar ITF & automated ball machine.',
        courtSvg: `
          <svg viewBox="0 0 320 180" class="w-full h-44 rounded-2xl bg-[#272D75] border-2 border-violetPop p-2">
            <rect x="20" y="18" width="280" height="144" rx="6" fill="#3B429F" stroke="#FFF7F0" stroke-width="2.2"/>
            <line x1="160" y1="18" x2="160" y2="162" stroke="#D8F05B" stroke-width="3"/>
            <line x1="88" y1="18" x2="88" y2="162" stroke="#FFF7F0" stroke-width="1.5"/>
            <line x1="232" y1="18" x2="232" y2="162" stroke="#FFF7F0" stroke-width="1.5"/>
            <line x1="88" y1="90" x2="232" y2="90" stroke="#FFF7F0" stroke-width="1.5"/>
            <path d="M40 130 Q 160 55 275 45" stroke="#D8F05B" stroke-width="2.5" fill="none" class="anim-dash"/>
            <circle cx="52" cy="122" r="7" fill="#D8F05B" stroke="#151842" stroke-width="1.8" class="anim-tennis-rally"/>
            <text x="160" y="175" text-anchor="middle" fill="#D8F05B" font-size="9" font-weight="bold">ITF TOPSPIN FOREHAND & SERVE PLACEMENT</text>
          </svg>
        `
      },
      tabletennis: {
        title: 'Table Tennis Training Center',
        badge: 'ITTF Pro 25mm Arena (2.74m × 1.525m)',
        photo: 'https://images.unsplash.com/photo-1534158914592-062992fbe900?auto=format&fit=crop&w=900&q=85',
        desc: 'Pusat pelatihan tenis meja presisi tinggi yang berfokus pada bacaan putaran bola (spin), refleks cepat, dan strategi serangan bola ketiga.',
        modules: [
          'Shakehand & Penhold Grip + Ready Stance Fundamentals',
          'Topspin Loop, Backspin Chop & Sidespin Ball Control',
          'Lateral Footwork & Crossover Step Training',
          'Competitive Multi-Ball & Robot Spin Drill Training',
          'ITTF Match Simulation & Ladder Tournament'
        ],
        coach: 'Coach Kenji Tanaka (ITTF Level 2)',
        equipment: 'Meja ITTF 25mm, robot pelontar multi-spin & bola 3-Star.',
        courtSvg: `
          <svg viewBox="0 0 320 180" class="w-full h-44 rounded-2xl bg-[#1A1F54] border-2 border-voltLime p-2">
            <rect x="44" y="24" width="232" height="132" rx="8" fill="#343A8F" stroke="#FFF7F0" stroke-width="2.5"/>
            <line x1="160" y1="20" x2="160" y2="160" stroke="#D8F05B" stroke-width="3"/>
            <line x1="44" y1="90" x2="276" y2="90" stroke="#FFF7F0" stroke-width="1.2" stroke-dasharray="5 4"/>
            <path d="M68 62 Q 160 35 252 118" stroke="#FF6B8A" stroke-width="2.5" fill="none" class="anim-dash"/>
            <circle cx="72" cy="65" r="6" fill="#FFF7F0" stroke="#FF6B8A" stroke-width="2" class="anim-pingpong-spin"/>
            <text x="160" y="175" text-anchor="middle" fill="#D8F05B" font-size="9" font-weight="bold">ITTF TOPSPIN LOOP & THIRD-BALL ATTACK</text>
          </svg>
        `
      }
    };

    function selectSportTab(key) {
      const s = sportsData[key];
      if (!s) return;

      document.querySelectorAll('.sport-visual-card').forEach(card => {
        if (card.dataset.sportCard === key) {
          card.className = 'sport-visual-card lively-card cursor-pointer rounded-[2rem] overflow-hidden bg-indigoDeep text-white border-4 border-voltLime shadow-2xl scale-[1.02]';
          card.querySelector('h3').className = 'font-sport font-bold text-lg text-voltLime uppercase';
          card.querySelector('p').className = 'text-xs text-creamCanvas/90 mt-1';
        } else {
          card.className = 'sport-visual-card lively-card cursor-pointer rounded-[2rem] overflow-hidden bg-white text-indigoDeep border-2 border-violetPop/30 shadow-lg';
          card.querySelector('h3').className = 'font-sport font-bold text-lg uppercase';
          card.querySelector('p').className = 'text-xs text-darkArena/75 mt-1';
        }
      });

      document.getElementById('sport-detail-panel').innerHTML = `
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-center">
          <div class="lg:col-span-5 space-y-4">
            <div class="relative rounded-3xl overflow-hidden border-2 border-indigoDeep/20 aspect-[16/10] shadow-lg">
              <img src="${s.photo}" alt="${s.title}" class="w-full h-full object-cover" />
              <span class="absolute top-3 left-3 px-3 py-1 rounded-full bg-indigoDeep text-voltLime font-sport font-bold text-xs">${s.badge}</span>
            </div>
            <div>
              <p class="text-[11px] font-extrabold uppercase tracking-wider text-indigoDeep mb-1.5">⚡ Simulasi Taktik Lapangan Interaktif:</p>
              ${s.courtSvg}
            </div>
          </div>
          <div class="lg:col-span-7 space-y-4">
            <h3 class="font-sport text-2xl sm:text-3xl font-bold text-indigoDeep uppercase">${s.title}</h3>
            <p class="text-xs sm:text-sm text-darkArena/80 leading-relaxed">${s.desc}</p>
            <div class="bg-creamCanvas p-5 rounded-3xl border border-violetPop/30">
              <p class="text-xs font-extrabold uppercase text-coralNeon mb-2.5">Kurikulum & Fokus Latihan Utama:</p>
              <ul class="grid grid-cols-1 sm:grid-cols-2 gap-2.5 text-xs font-semibold text-indigoDeep">
                ${s.modules.map(m => `<li class="flex items-start gap-2"><span class="text-coralNeon font-extrabold">⚡</span><span>${m}</span></li>`).join('')}
              </ul>
            </div>
            <div class="flex flex-wrap items-center justify-between gap-3 pt-2 text-xs">
              <div>
                <span class="block text-darkArena/65">Head Instructor: <strong class="text-indigoDeep">${s.coach}</strong></span>
                <span class="block text-darkArena/65 mt-0.5">Perlengkapan: <strong class="text-indigoDeep">${s.equipment}</strong></span>
              </div>
              <button onclick="bookSpecificSport('${key}')" class="px-6 py-3.5 rounded-full bg-coralNeon hover:brightness-110 text-white font-sport font-bold uppercase tracking-wider shadow-lg">
                Daftar Kelas ${key.toUpperCase()} →
              </button>
            </div>
          </div>
        </div>
      `;
    }

    function selectSportAndScroll(key) {
      switchPage('all');
      selectSportTab(key);
      document.getElementById('sports-categories-section').scrollIntoView({ behavior: 'smooth' });
    }

    function bookSpecificSport(key) {
      const map = { padel: 'Padel', badminton: 'Badminton', tennis: 'Tennis', tabletennis: 'Table Tennis' };
      const radio = document.querySelector(`input[name="bk_sport"][value="${map[key]}"]`);
      if (radio) radio.checked = true;
      syncBookingCoach();
      updateBookingSummary();
      goToBookingStep(2);
      document.getElementById('booking-wizard-section').scrollIntoView({ behavior: 'smooth' });
    }

    // 2. SKILL ASSESSMENT & PROGRESS TRACKING
    function runSkillAssessment() {
      const sport = document.getElementById('assess-sport').value;
      const exp = parseInt(document.getElementById('assess-exp').value);
      const goal = document.getElementById('assess-goal').value;

      const levels = [
        { lvl: 'Beginner Fundamentals', pkg: 'Trial Class atau Monthly Training 8x', note: 'Fokus pada grip dasar, footwork seimbang, dan konsistensi kontak bola.' },
        { lvl: 'Intermediate Tactics & Rally', pkg: 'Monthly Training 8x', note: 'Fokus pada variasi pukulan, penempatan bola, dan koordinasi ganda.' },
        { lvl: 'Advanced Competitive', pkg: 'Intensive Program 16x', note: 'Fokus pada tempo cepat, strategi poin kritis, dan sparring mingguan.' },
        { lvl: 'Professional Performance', pkg: 'Intensive Program + Private Coaching', note: 'Program intensif berbasis analisis video dan persiapan kejuaraan.' }
      ];
      const rec = levels[exp] || levels[0];
      const out = document.getElementById('assess-result');
      out.innerHTML = `
        <p class="font-sport font-bold text-sm text-indigoDeep uppercase">🎯 Hasil Evaluasi: ${sport} — ${rec.lvl}</p>
        <p class="text-darkArena/80">${rec.note} (Target: ${goal}).</p>
        <p class="font-bold text-coralNeon">Rekomendasi Paket: ${rec.pkg}</p>
      `;
      out.classList.remove('hidden');
    }

    const progressMetrics = {
      padel: {
        badge: 'Glass-Wall Bandeja Master',
        bars: [
          { label: 'Footwork & Net Split-Step', pct: 86, color: 'bg-voltLime' },
          { label: 'Glass Rebound & Lob Control', pct: 78, color: 'bg-coralNeon' },
          { label: 'Bandeja & Vibora Precision', pct: 82, color: 'bg-violetPop' },
          { label: 'Doubles Communication & Stamina', pct: 90, color: 'bg-voltLime' }
        ]
      },
      badminton: {
        badge: '6-Corner Agility Sprinter',
        bars: [
          { label: '6-Corner Footwork Speed', pct: 88, color: 'bg-voltLime' },
          { label: 'Jump Smash & Clear Power', pct: 81, color: 'bg-coralNeon' },
          { label: 'Netting & Flick Serve Accuracy', pct: 85, color: 'bg-violetPop' },
          { label: 'Rally Endurance & Reflex', pct: 91, color: 'bg-voltLime' }
        ]
      },
      tennis: {
        badge: 'Topspin Baseline Striker',
        bars: [
          { label: 'First & Second Serve Placement', pct: 80, color: 'bg-voltLime' },
          { label: 'Topspin Forehand Consistency', pct: 87, color: 'bg-coralNeon' },
          { label: 'Backhand & Approach Volley', pct: 76, color: 'bg-violetPop' },
          { label: 'Court Coverage & Match Stamina', pct: 89, color: 'bg-voltLime' }
        ]
      },
      tabletennis: {
        badge: 'Third-Ball Loop Specialist',
        bars: [
          { label: 'Forehand & Backhand Topspin Loop', pct: 90, color: 'bg-voltLime' },
          { label: 'Short Service & Spin Read', pct: 84, color: 'bg-coralNeon' },
          { label: 'Lateral Footwork & Recovery', pct: 82, color: 'bg-violetPop' },
          { label: 'Reflex Block & Counter-Attack', pct: 88, color: 'bg-voltLime' }
        ]
      }
    };

    function updateProgressPreview() {
      const key = document.getElementById('progress-sport-preview').value;
      const data = progressMetrics[key];
      document.getElementById('progress-badge-label').textContent = data.badge;
      document.getElementById('progress-bars-box').innerHTML = data.bars.map(b => `
        <div>
          <div class="flex justify-between text-xs font-bold mb-1">
            <span>${b.label}</span>
            <span class="text-voltLime">${b.pct}%</span>
          </div>
          <div class="w-full h-2.5 bg-white/15 rounded-full overflow-hidden">
            <div class="h-full ${b.color} rounded-full transition-all duration-700" style="width: ${b.pct}%"></div>
          </div>
        </div>
      `).join('');
    }

    // 3. TRAINING SCHEDULE & LIVE CAPACITY
    const scheduleData = [
      { sport: 'Padel', level: 'Beginner', title: 'Padel Intro & Glass Rebound', time: 'Senin & Rabu • 16:30 WIB', coach: 'Coach Mateo Alvarez • Court Padel 1', enrolled: 5, cap: 6 },
      { sport: 'Padel', level: 'Intermediate', title: 'Doubles Strategy & Bandeja', time: 'Sabtu • 08:30 WIB', coach: 'Coach Mateo Alvarez • Court Padel 2', enrolled: 6, cap: 6 },
      { sport: 'Badminton', level: 'Kids', title: 'Junior Footwork & Basic Strokes', time: 'Selasa & Kamis • 15:30 WIB', coach: 'Coach Dimas Pratama • Hall BWF 1-2', enrolled: 6, cap: 8 },
      { sport: 'Badminton', level: 'Advanced', title: 'Competitive Smash & Sparring', time: 'Jumat • 19:00 WIB', coach: 'Coach Dimas Pratama • Hall BWF 3-4', enrolled: 5, cap: 6 },
      { sport: 'Tennis', level: 'Beginner', title: 'Baseline Forehand & Serve Clinic', time: 'Rabu & Jumat • 16:00 WIB', coach: 'Coach Clara Wijaya • Hardcourt 1', enrolled: 3, cap: 6 },
      { sport: 'Tennis', level: 'Intermediate', title: 'Match Play & Net Volley Tactics', time: 'Minggu • 08:00 WIB', coach: 'Coach Clara Wijaya • Hardcourt 2', enrolled: 4, cap: 6 },
      { sport: 'Table Tennis', level: 'Beginner', title: 'Grip, Stance & Topspin Control', time: 'Selasa & Kamis • 17:00 WIB', coach: 'Coach Kenji Tanaka • ITTF Arena', enrolled: 4, cap: 6 },
      { sport: 'Table Tennis', level: 'Advanced', title: 'Multi-Ball Spin & Match Simulation', time: 'Sabtu • 10:00 WIB', coach: 'Coach Kenji Tanaka • ITTF Arena', enrolled: 5, cap: 6 }
    ];

    function renderScheduleTable() {
      const sp = document.getElementById('sched-sport-filter').value;
      const lv = document.getElementById('sched-level-filter').value;
      const rows = scheduleData.filter(r => (sp === 'All' || r.sport === sp) && (lv === 'All' || r.level === lv));

      document.getElementById('schedule-tbody').innerHTML = rows.map(r => {
        const left = r.cap - r.enrolled;
        const pct = Math.round((r.enrolled / r.cap) * 100);
        return `
          <tr class="hover:bg-creamCanvas/70 transition-colors">
            <td class="p-4">
              <span class="px-2.5 py-0.5 rounded-full bg-indigoDeep text-voltLime font-sport font-bold text-[10px] uppercase">${r.sport} • ${r.level}</span>
              <strong class="block text-indigoDeep mt-1">${r.title}</strong>
            </td>
            <td class="p-4 text-darkArena/80">${r.time}</td>
            <td class="p-4 text-darkArena/80">${r.coach}</td>
            <td class="p-4">
              <div class="flex items-center justify-between text-[11px] font-bold mb-1">
                <span>${r.enrolled}/${r.cap} Peserta</span>
                <span class="${left === 0 ? 'text-coralNeon' : 'text-emerald-700'}">${left === 0 ? 'Penuh' : 'Sisa ' + left + ' Slot'}</span>
              </div>
              <div class="w-28 h-2 bg-indigoDeep/10 rounded-full overflow-hidden">
                <div class="h-full ${left === 0 ? 'bg-coralNeon' : 'bg-violetPop'}" style="width: ${pct}%"></div>
              </div>
            </td>
            <td class="p-4 text-right">
              <button ${left === 0 ? 'disabled' : `onclick="quickBookSchedule('${r.sport}', '${r.level}')"`} class="px-4 py-2 rounded-full text-xs font-bold ${left === 0 ? 'bg-gray-200 text-gray-400 cursor-not-allowed' : 'bg-voltLime hover:brightness-105 text-indigoDeep shadow'}">
                ${left === 0 ? 'Full' : 'Booking Slot'}
              </button>
            </td>
          </tr>
        `;
      }).join('');
    }

    function quickBookSchedule(sport, level) {
      const radio = document.querySelector(`input[name="bk_sport"][value="${sport}"]`);
      if (radio) radio.checked = true;
      const programMap = {
        Beginner: 'Beginner Fundamentals',
        Intermediate: 'Intermediate Tactics & Rally',
        Advanced: 'Advanced Competitive',
        Kids: 'Kids & Junior Development (5-17 Thn)'
      };
      const program = document.getElementById('bk_program');
      if (program && programMap[level]) program.value = programMap[level];
      syncBookingCoach();
      updateBookingSummary();
      goToBookingStep(3);
      document.getElementById('booking-wizard-section').scrollIntoView({ behavior: 'smooth' });
    }

    // 4. 7-STEP CLASS BOOKING WIZARD
    let currentBkStep = 1;
    const bkStepLabels = [
      'Langkah 1 dari 7: Pilih Cabang Olahraga',
      'Langkah 2 dari 7: Pilih Program Latihan',
      'Langkah 3 dari 7: Pilih Pelatih dan Jadwal',
      'Langkah 4 dari 7: Isi Data Peserta',
      'Langkah 5 dari 7: Pilih Paket Latihan',
      'Langkah 6 dari 7: Ringkasan Pemesanan',
      'Langkah 7 dari 7: Kirim Reservasi via WhatsApp'
    ];

    function goToBookingStep(step) {
      if (step < 1 || step > 7) return;
      currentBkStep = step;
      document.querySelectorAll('.bk-step').forEach((el, i) => el.classList.toggle('hidden', i + 1 !== currentBkStep));
      document.getElementById('bk-step-title').textContent = bkStepLabels[currentBkStep - 1];
      const pct = Math.round((currentBkStep / 7) * 100);
      document.getElementById('bk-step-pct').textContent = `${pct}%`;
      document.getElementById('bk-progress-bar').style.width = `${(currentBkStep / 7) * 100}%`;

      document.querySelectorAll('.bk-dot').forEach((d, i) => {
        d.className = i + 1 <= currentBkStep ? 'bk-dot h-1.5 rounded-full bg-voltLime' : 'bk-dot h-1.5 rounded-full bg-white/25';
      });

      document.getElementById('bk-prev').disabled = currentBkStep === 1;
      const nextBtn = document.getElementById('bk-next');
      if (currentBkStep === 7) nextBtn.classList.add('hidden');
      else {
        nextBtn.classList.remove('hidden');
        nextBtn.textContent = currentBkStep === 6 ? 'Lanjut Kirim WA →' : 'Lanjut →';
      }
      updateBookingSummary();
    }

    function validateBookingStep(step) {
      const required = [];
      if (step === 3) required.push(['bk_date', 'Pilih tanggal mulai latihan terlebih dahulu.']);
      if (step === 4) {
        required.push(['bk_name', 'Isi nama lengkap peserta.']);
        required.push(['bk_age', 'Isi usia atau tanggal lahir peserta.']);
        required.push(['bk_wa', 'Isi nomor WhatsApp aktif.']);
      }
      for (const [id, message] of required) {
        const field = document.getElementById(id);
        const value = field?.value?.trim();
        if (!value) {
          alert(message);
          field?.focus();
          return false;
        }
        if (id === 'bk_date' && value < voltLocalDateString()) {
          alert('Tanggal latihan tidak boleh sebelum hari ini.');
          field.focus();
          return false;
        }
        if (id === 'bk_wa' && !/^[+0-9\s().-]{8,20}$/.test(value)) {
          alert('Periksa kembali nomor WhatsApp.');
          field.focus();
          return false;
        }
      }
      return true;
    }

    function changeBookingStep(delta) {
      if (delta > 0 && !validateBookingStep(currentBkStep)) return;
      goToBookingStep(currentBkStep + delta);
    }

    function syncBookingCoach() {
      const sp = document.querySelector('input[name="bk_sport"]:checked')?.value || 'Padel';
      const coachMap = {
        Padel: ['Coach Mateo Alvarez (Head Padel)', 'Coach Rafael Ortega (Doubles Specialist)'],
        Badminton: ['Coach Dimas Pratama (Head Badminton)', 'Coach Siska Amelia (Junior & Agility)'],
        Tennis: ['Coach Clara Wijaya (Tennis Director)', 'Coach Daniel Kusuma (Serve & Match)'],
        'Table Tennis': ['Coach Kenji Tanaka (Head Table Tennis)', 'Coach Budi Santoso (Spin & Footwork)']
      };
      const sel = document.getElementById('bk_coach');
      sel.innerHTML = (coachMap[sp] || coachMap.Padel).map(c => `<option value="${c}">${c}</option>`).join('');
    }

    function preselectTrial() {
      switchPage('all');
      const sel = document.getElementById('bk_package');
      sel.selectedIndex = 0;
      updateBookingSummary();
      goToBookingStep(1);
    }

    function preselectJoin() {
      switchPage('all');
      const sel = document.getElementById('bk_package');
      sel.selectedIndex = 2;
      updateBookingSummary();
      goToBookingStep(1);
    }

    function pickPackageForWizard(pkgText) {
      switchPage('all');
      const sel = document.getElementById('bk_package');
      const opt = Array.from(sel.options).find(o => o.value.includes(pkgText.split(' (')[0]));
      if (opt) sel.value = opt.value;
      updateBookingSummary();
      goToBookingStep(1);
      document.getElementById('booking-wizard-section').scrollIntoView({ behavior: 'smooth' });
    }

    function getBookingData() {
      const sport = document.querySelector('input[name="bk_sport"]:checked')?.value || 'Padel';
      const program = document.getElementById('bk_program').value;
      const coach = document.getElementById('bk_coach').value;
      const court = document.getElementById('bk_court').value;
      const date = document.getElementById('bk_date').value || '(Belum dipilih)';
      const time = document.getElementById('bk_time').value;
      const name = document.getElementById('bk_name').value.trim() || '(Belum diisi)';
      const age = document.getElementById('bk_age').value.trim() || '(Belum diisi)';
      const wa = document.getElementById('bk_wa').value.trim() || '(Belum diisi)';
      const exp = document.getElementById('bk_exp').value;

      const pkgSel = document.getElementById('bk_package');
      const pkgText = pkgSel.value;
      const pkgPrice = parseInt(pkgSel.options[pkgSel.selectedIndex]?.dataset.price || 150000);
      const rentRacket = document.getElementById('bk_racket_rent').checked;
      const racketFee = rentRacket && !pkgText.includes('Trial') ? 35000 : 0;
      const total = pkgPrice + racketFee;

      return { sport, program, coach, court, date, time, name, age, wa, exp, pkgText, rentRacket, racketFee, total };
    }

    function updateBookingSummary() {
      const d = getBookingData();
      const box = document.getElementById('bk-summary-box');
      if (box) {
        box.innerHTML = `
          <div class="grid grid-cols-1 sm:grid-cols-2 gap-2.5">
            <div><span class="text-darkArena/60 block">Cabang & Program</span><strong>${d.sport} — ${d.program}</strong></div>
            <div><span class="text-darkArena/60 block">Pelatih & Lokasi</span><strong>${d.coach} • ${d.court}</strong></div>
            <div><span class="text-darkArena/60 block">Jadwal Latihan</span><strong>${d.date} • ${d.time}</strong></div>
            <div><span class="text-darkArena/60 block">Peserta</span><strong>${voltEscapeHtml(d.name)} (${voltEscapeHtml(d.age)})</strong><span class="block text-xs text-darkArena/70">WA: ${voltEscapeHtml(d.wa)} • ${voltEscapeHtml(d.exp)}</span></div>
          </div>
          <div class="pt-3 border-t border-indigoDeep/15 flex items-center justify-between font-sport text-base font-bold text-indigoDeep">
            <span>Total Biaya (${d.pkgText.split(' (')[0]}):</span>
            <span class="text-coralNeon">Rp ${d.total.toLocaleString('id-ID')}</span>
          </div>
        `;
      }
      const msg = buildBookingWAMessage(d);
      const prev = document.getElementById('bk-wa-preview');
      if (prev) prev.textContent = msg;
    }

    function buildBookingWAMessage(d) {
      return `Halo Admin *VoltCourt Racquet Academy*! ⚡🏆
Saya ingin mendaftar kelas latihan dengan detail berikut:

*1. Cabang & Program:*
• Olahraga: ${d.sport}
• Program: ${d.program}
• Pelatih: ${d.coach}
• Lokasi & Jadwal: ${d.court} | ${d.date} (${d.time})

*2. Data Peserta:*
• Nama: ${d.name}
• Usia / Tgl Lahir: ${d.age}
• No. WhatsApp: ${d.wa}
• Pengalaman: ${d.exp}

*3. Paket & Biaya:*
• Paket: ${d.pkgText}
• Pinjam Raket/Bola: ${d.rentRacket ? (d.racketFee === 0 ? 'Ya (Gratis Trial)' : 'Ya (+Rp 35.000)') : 'Bawa Sendiri'}
• *Total Biaya: Rp ${d.total.toLocaleString('id-ID')}*

Mohon konfirmasi slot kelas saya ya Admin. Terima kasih!`;
    }

    function sendBookingWhatsApp() {
      const d = getBookingData();
      if (!d.date || d.date === '(Belum dipilih)' || d.date < voltLocalDateString()) {
        alert('Pilih tanggal latihan yang valid terlebih dahulu.');
        goToBookingStep(3);
        document.getElementById('bk_date')?.focus();
        return;
      }
      if (d.name === '(Belum diisi)' || d.age === '(Belum diisi)' || d.wa === '(Belum diisi)') {
        alert('Lengkapi nama, usia/tanggal lahir, dan nomor WhatsApp peserta terlebih dahulu.');
        goToBookingStep(4);
        return;
      }
      window.open(voltWhatsAppUrl(buildBookingWAMessage(d)), '_blank', 'noopener,noreferrer');
    }

    async function copyBookingWA() {
      const txt = document.getElementById('bk-wa-preview')?.textContent || '';
      let copied = false;
      try {
        if (navigator.clipboard?.writeText) {
          await navigator.clipboard.writeText(txt);
          copied = true;
        }
      } catch (_) { /* use legacy fallback below */ }
      if (!copied) {
        const t = document.createElement('textarea');
        t.value = txt;
        t.style.position = 'fixed'; t.style.opacity = '0';
        document.body.appendChild(t); t.select();
        try { copied = document.execCommand('copy'); } catch (_) { copied = false; }
        t.remove();
      }
      const toast = document.getElementById('bk-copy-toast');
      if (toast) {
        toast.textContent = copied ? '✓ Pesan berhasil disalin!' : 'Tidak dapat menyalin otomatis. Silakan salin teks secara manual.';
        toast.classList.remove('hidden');
        setTimeout(() => toast.classList.add('hidden'), 3500);
      }
    }

    // 5. STANDALONE COURT RESERVATION MODAL
    let activeCourtTitle = '';
    function openCourtReserveModal(title) {
      activeCourtTitle = title;
      document.getElementById('court-modal-name').textContent = title;
      const m = document.getElementById('court-modal');
      m.classList.remove('hidden'); m.classList.add('flex');
    }
    function closeCourtModal() {
      const m = document.getElementById('court-modal');
      m.classList.add('hidden'); m.classList.remove('flex');
    }
    function sendCourtReserveWA() {
      const nameField = document.getElementById('cm-name');
      const dateField = document.getElementById('cm-date');
      const n = nameField.value.trim();
      const d = dateField.value;
      if (!n) { alert('Isi nama pemesan terlebih dahulu.'); nameField.focus(); return; }
      if (!d || d < voltLocalDateString()) { alert('Pilih tanggal booking yang valid.'); dateField.focus(); return; }
      const h = document.getElementById('cm-hours').value;
      const r = document.getElementById('cm-racket').checked ? 'Ya (+Sewa Raket & Bola)' : 'Tidak';
      const msg = `Halo Admin VoltCourt! Saya ${n}, ingin booking lapangan *${activeCourtTitle}* pada tanggal ${d} selama ${h}. Sewa raket/bola: ${r}. Mohon konfirmasi ketersediaan court. Terima kasih.`;
      window.open(voltWhatsAppUrl(msg), '_blank', 'noopener,noreferrer');
    }

    // 6. FAQ ACCORDION
    const faqList = [
      { q: 'Apakah pemula yang belum punya raket bisa ikut Trial Class?', a: 'Tentu bisa! Untuk peserta Trial Class, VoltCourt menyediakan peminjaman raket Padel, Badminton, Tennis, maupun Bet Table Tennis beserta bola/shuttlecock secara gratis.' },
      { q: 'Berapa usia minimal untuk bergabung di kelas Kids Academy?', a: 'Kami menerima peserta mulai usia 5 tahun dengan peralatan khusus junior (raket ringan & bola low-compression) agar aman dan menyenangkan.' },
      { q: 'Bagaimana jika saya berhalangan hadir pada jadwal latihan bulanan?', a: 'Anda dapat melakukan reschedule atau mengikuti kelas pengganti (make-up session) pada hari lain di minggu yang sama dengan konfirmasi minimal H-1.' },
      { q: 'Apakah bisa menyewa lapangan tanpa mengikuti kelas latihan?', a: 'Bisa. Anda dapat memesan lapangan Padel, Badminton, Tennis, atau Meja Pingpong secara mandiri melalui tombol Booking Lapangan.' }
    ];

    function renderFAQ() {
      document.getElementById('faq-container').innerHTML = faqList.map((f, i) => `
        <div class="bg-creamCanvas rounded-2xl border border-indigoDeep/15 overflow-hidden">
          <button onclick="toggleFAQ(${i})" class="w-full px-5 py-4 text-left flex items-center justify-between font-bold text-xs sm:text-sm text-indigoDeep">
            <span>${f.q}</span>
            <span id="faq-sign-${i}" class="text-coralNeon font-extrabold text-lg">+</span>
          </button>
          <div id="faq-ans-${i}" class="hidden px-5 pb-4 text-xs text-darkArena/80 border-t border-indigoDeep/10 pt-3">${f.a}</div>
        </div>
      `).join('');
    }
    function toggleFAQ(i) {
      const a = document.getElementById(`faq-ans-${i}`);
      const s = document.getElementById(`faq-sign-${i}`);
      const isHidden = a.classList.contains('hidden');
      a.classList.toggle('hidden');
      s.textContent = isHidden ? '−' : '+';
    }

    // 7. MULTIPAGE SWITCHER & ID/EN LANGUAGE
    function switchPage(key) {
      document.querySelectorAll('.nav-tab').forEach(b => {
        b.className = b.dataset.nav === key
          ? 'nav-tab px-4 py-2 rounded-full text-xs font-extrabold transition-all bg-voltLime text-indigoDeep shadow'
          : 'nav-tab px-4 py-2 rounded-full text-xs font-bold text-white/85 hover:text-voltLime transition-all';
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

    const i18n = {
      id: {
        nav_all: 'Semua Halaman',
        nav_sports: '4 Cabang & Arena Visual',
        nav_sched: 'Jadwal & Court',
        nav_coach: 'Pelatih & Paket',
        nav_book: 'Booking & Turnamen',
        cta_trial: 'Book a Trial',
        hero_badge: 'Multi-Court Kinetic Racquet Academy',
        hero_h1_a: 'Unleash Your',
        hero_desc: 'Akademi olahraga raket modern berenergi tinggi untuk Kids, Teens, Adults hingga Seniors. Kuasai teknik, kelincahan footwork, dan strategi bertanding bersama pelatih bersertifikat BWF, ITF, FIP & ITTF.',
        cta_join: 'Join Academy',
        cta_trial_hero: 'Book a Trial'
      },
      en: {
        nav_all: 'All Pages',
        nav_sports: '4 Sports & Visual Arenas',
        nav_sched: 'Schedule & Courts',
        nav_coach: 'Coaches & Plans',
        nav_book: 'Booking & Events',
        cta_trial: 'Book a Trial',
        hero_badge: 'Multi-Court Kinetic Racquet Academy',
        hero_h1_a: 'Unleash Your',
        hero_desc: 'High-energy modern racquet sports academy for Kids, Teens, Adults, and Seniors. Master technique, agility footwork, and match tactics with certified BWF, ITF, FIP & ITTF coaches.',
        cta_join: 'Join Academy',
        cta_trial_hero: 'Book a Trial'
      }
    };

    function setLanguage(lang) {
      document.getElementById('lang-id').className = lang === 'id' ? 'px-2.5 py-1 rounded-full bg-voltLime text-indigoDeep transition-all' : 'px-2.5 py-1 rounded-full text-white/80 hover:text-white transition-all';
      document.getElementById('lang-en').className = lang === 'en' ? 'px-2.5 py-1 rounded-full bg-voltLime text-indigoDeep transition-all' : 'px-2.5 py-1 rounded-full text-white/80 hover:text-white transition-all';
      document.querySelectorAll('[data-i18n]').forEach(el => {
        const k = el.getAttribute('data-i18n');
        if (i18n[lang][k]) el.textContent = i18n[lang][k];
      });
    }

    // 8. UNIQUE FLOATING AI CHATBOT ("COACH VOLT AI")
    function toggleVoltAI() {
      document.getElementById('volt-ai-window').classList.toggle('hidden');
    }

    function handleVoltAISubmit(e) {
      e.preventDefault();
      const inp = document.getElementById('volt-ai-input');
      const txt = inp.value.trim();
      if (!txt) return;
      inp.value = '';
      askVoltAI(txt);
    }

    function askVoltAI(question) {
      const feed = document.getElementById('volt-ai-feed');
      const u = document.createElement('div');
      u.className = 'bg-indigoDeep text-white p-3 rounded-2xl rounded-tr-none ml-auto max-w-[82%] font-medium shadow-sm';
      u.textContent = question;
      feed.appendChild(u);

      const q = question.toLowerCase();
      let reply = '⚡ Silakan pilih cabang olahraga di <strong>Booking Wizard 7 Langkah</strong> untuk langsung mengamankan jadwal latihan Anda!';
      if (q.includes('padel')) {
        reply = '🎾 <strong>Padel Academy:</strong> Tersedia kelas <em>Beginner Glass Rebound</em> (Senin & Rabu 16:30) serta <em>Doubles Strategy</em> bersama Coach Mateo Alvarez. Raket karbon & bola disediakan!';
      } else if (q.includes('kids') || q.includes('junior') || q.includes('anak')) {
        reply = '🏸 <strong>Kids & Junior Development (5–17 Thn):</strong> Tersedia untuk Badminton, Tennis, Padel & Table Tennis dengan peralatan junior ringan dan rapor progres bulanan.';
      } else if (q.includes('jadwal') || q.includes('malam') || q.includes('akhir pekan')) {
        reply = '🗓️ <strong>Jadwal Latihan:</strong> Tersedia sesi Pagi (08:00), Sore (16:00), dan Malam (19:00 WIB) setiap hari termasuk Sabtu & Minggu. Cek tabel <em>Jadwal & Court</em> untuk sisa kuota live!';
      } else if (q.includes('harga') || q.includes('paket') || q.includes('biaya') || q.includes('trial')) {
        reply = '💳 <strong>Paket VoltCourt:</strong><br>• <em>Trial Class:</em> Rp 150.000 (Gratis pinjam raket)<br>• <em>Single Session:</em> Rp 250.000<br>• <em>Monthly (8x):</em> Rp 1.450.000<br>• <em>Private 1-on-1:</em> Rp 550.000';
      }

      setTimeout(() => {
        const b = document.createElement('div');
        b.className = 'bg-white p-3.5 rounded-2xl rounded-tl-none border border-violetPop/30 shadow-sm text-darkArena max-w-[88%] leading-relaxed';
        b.innerHTML = reply;
        feed.appendChild(b);
        feed.scrollTop = feed.scrollHeight;
      }, 320);
      feed.scrollTop = feed.scrollHeight;
    }

    // 9. SCROLL REVEAL & RESILIENT INITIALIZATION
    function voltcourtInitWidget(label, callback) {
      try { callback(); }
      catch (error) { console.error(`[VoltCourt] ${label} gagal diinisialisasi:`, error); }
    }

    function initVoltCourtPage() {
      const today = voltLocalDateString();
      ['bk_date', 'cm-date'].forEach(id => {
        const input = document.getElementById(id);
        if (input) input.min = today;
      });

      const waFab = document.getElementById('voltcourt-whatsapp-fab');
      if (waFab) {
        const hello = 'Halo Admin VoltCourt Racquet Academy! Saya ingin konsultasi kelas latihan.';
        waFab.href = voltWhatsAppUrl(hello);
      }

      voltcourtInitWidget('sport detail', () => selectSportTab('padel'));
      voltcourtInitWidget('progress preview', updateProgressPreview);
      voltcourtInitWidget('schedule table', renderScheduleTable);
      voltcourtInitWidget('booking coach', syncBookingCoach);
      voltcourtInitWidget('booking summary', updateBookingSummary);
      voltcourtInitWidget('FAQ', renderFAQ);

      if ('IntersectionObserver' in window) {
        const obs = new IntersectionObserver(entries => {
          entries.forEach(entry => {
            if (entry.isIntersecting) {
              entry.target.classList.add('visible');
              obs.unobserve(entry.target);
            }
          });
        }, { threshold: 0.08 });
        document.querySelectorAll('.reveal').forEach(el => obs.observe(el));
        document.body.classList.add('volt-reveal-ready');
        // Ensure currently visible reveal nodes are not left hidden if an observer callback is delayed.
        requestAnimationFrame(() => {
          document.querySelectorAll('.reveal').forEach(el => {
            const r = el.getBoundingClientRect();
            if (r.top < window.innerHeight && r.bottom > 0) el.classList.add('visible');
          });
        });
      } else {
        document.querySelectorAll('.reveal').forEach(el => el.classList.add('visible'));
      }
    }

    // Expose every function used by inline Blade/HTML handlers on window explicitly.
    Object.assign(window, {
      selectSportTab, selectSportAndScroll, bookSpecificSport, runSkillAssessment,
      updateProgressPreview, renderScheduleTable, quickBookSchedule, goToBookingStep,
      changeBookingStep, syncBookingCoach, preselectTrial, preselectJoin,
      pickPackageForWizard, updateBookingSummary, sendBookingWhatsApp, copyBookingWA,
      openCourtReserveModal, closeCourtModal, sendCourtReserveWA, renderFAQ, toggleFAQ,
      switchPage, toggleMobileMenu, setLanguage, toggleVoltAI, handleVoltAISubmit, askVoltAI
    });

    if (document.readyState === 'loading') {
      document.addEventListener('DOMContentLoaded', initVoltCourtPage, { once: true });
    } else {
      initVoltCourtPage();
    }
