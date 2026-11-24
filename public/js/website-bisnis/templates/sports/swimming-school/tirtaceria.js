// 1. DATA: PROGRAM BERDASARKAN USIA
    const ageProgramsData = {
      baby: {
        badge: 'Baby Water Sensory • Usia Minimal 6 Bulan',
        title: 'Baby Swimming (6 – 24 Bulan)',
        subtitle: 'Pengenalan air hangat yang lembut untuk merangsang motorik, keseimbangan, dan ikatan emosional (bonding) orang tua & bayi.',
        image: 'https://images.unsplash.com/photo-1560089000-7433a4ebbd64?auto=format&fit=crop&w=900&q=80',
        highlights: [
          { label: 'Usia Minimal', value: '6 Bulan (Sudah kuat menopang kepala)' },
          { label: 'Pendamping', value: 'Wajib 1 Orang Tua / Wali di Kolam' },
          { label: 'Durasi & Suhu', value: '30 Menit • Kolam Hangat 31°–32°C' },
          { label: 'Rasio Kelas', value: 'Maksimal 1 Instruktur : 4 Bayi' },
        ],
        skills: ['Gentle Water Submersion (Refleks tahan napas alami)', 'Back Floating dengan sanggaan lembut', 'Kicking & Splashing ceria dengan lagu anak'],
        categoryValue: 'Baby (6-24 Bulan)'
      },
      toddler: {
        badge: 'Early Independence • Usia 2 – 4 Tahun',
        title: 'Toddler Swimming (2 – 4 Tahun)',
        subtitle: 'Transisi dari pendampingan penuh menuju kemandirian di air melalui permainan edukatif dan aturan keselamatan dasar.',
        image: 'https://images.unsplash.com/photo-1519315901367-f34ff9154487?auto=format&fit=crop&w=900&q=80',
        highlights: [
          { label: 'Pendampingan', value: 'Transisi bertahap tanpa orang tua di kolam' },
          { label: 'Durasi Sesi', value: '35 Menit • Kolam Hangat 31°C' },
          { label: 'Rasio Kelas', value: 'Maksimal 1 Instruktur : 4 Batita' },
          { label: 'Fokus Utama', value: 'Water Safety & Berani Masuk Wajah' },
        ],
        skills: ['Menyelam mengambil mainan di kolam dangkal', 'Belajar memutar badan & meraih pinggir kolam', 'Mengapung dengan kickboard & noodle'],
        categoryValue: 'Toddler (2-4 Tahun)'
      },
      kids: {
        badge: 'Confidence & Strokes • Usia 5 – 12 Tahun',
        title: 'Kids Swimming (5 – 12 Tahun)',
        subtitle: 'Dikelompokkan berdasarkan kelompok usia, kemampuan awal, dan tingkat kepercayaan diri di air menuju penguasaan teknik renang.',
        image: 'https://images.unsplash.com/photo-1530549387789-4c1017266635?auto=format&fit=crop&w=900&q=80',
        highlights: [
          { label: 'Pengelompokan', value: 'Berdasarkan Usia & Water Confidence' },
          { label: 'Durasi Sesi', value: '45 Menit • Kolam Utama 28°C' },
          { label: 'Rasio Kelas', value: '1 Instruktur : 5–6 Anak' },
          { label: 'Evaluasi', value: 'Digital Swim Passport tiap 4 sesi' },
        ],
        skills: ['Teknik pernapasan samping & meluncur streamline', 'Gaya Bebas (Freestyle), Gaya Punggung & Gaya Dada', 'Keterampilan menyelamatkan diri di air dalam'],
        categoryValue: 'Kids (5-12 Tahun)'
      },
      teens: {
        badge: 'Technique & Endurance • Usia 13 – 17 Tahun',
        title: 'Teen Swimming (13 – 17 Tahun)',
        subtitle: 'Penguasaan 4 gaya renang lengkap, peningkatan stamina kardio, teknik start/flip-turn, hingga persiapan seleksi sekolah/klub.',
        image: 'https://images.unsplash.com/photo-1519861531473-9200262188bf?auto=format&fit=crop&w=900&q=80',
        highlights: [
          { label: 'Kurikulum', value: '4 Gaya Renang & Efisiensi Gerak' },
          { label: 'Durasi Sesi', value: '60 Menit • Kolam 25 Meter' },
          { label: 'Rasio Kelas', value: '1 Instruktur : 6 Remaja' },
          { label: 'Level', value: 'Beginner hingga Pre-Competitive' },
        ],
        skills: ['Koreksi stroke Gaya Bebas, Punggung, Dada & Kupu-Kupu', 'Teknik Flip Turn & Diving Start Block', 'Latihan interval stamina & kecepatan'],
        categoryValue: 'Teens (13-17 Tahun)'
      },
      adults: {
        badge: 'Zero-Fear & Fitness • Usia 18+ Tahun',
        title: 'Adult Swimming (18+ Tahun)',
        subtitle: 'Mulai dari kelas pemula untuk mengatasi takut air (hydrophobia), perbaikan teknik renang agar tidak cepat lelah, hingga private lesson.',
        image: 'https://images.unsplash.com/photo-1575429198097-0414ec08e8cd?auto=format&fit=crop&w=900&q=80',
        highlights: [
          { label: 'Pilihan Kelas', value: 'Pemula Anti-Takut Air, Teknik & Stamina' },
          { label: 'Format', value: 'Tersedia Group Dewasa & Private 1-on-1' },
          { label: 'Durasi Sesi', value: '45 – 60 Menit' },
          { label: 'Privasi', value: 'Sesi khusus dewasa di jam nyaman' },
        ],
        skills: ['Mengatasi rasa panik & belajar mengapung rileks', 'Perbaikan napas Gaya Dada & Gaya Bebas jarak jauh', 'Program kebugaran low-impact & rehabilitasi sendi'],
        categoryValue: 'Adults (18+ Tahun)'
      }
    };

    function selectAgeProgram(key) {
      const data = ageProgramsData[key];
      if (!data) return;

      // Update Tab Styles
      document.querySelectorAll('.age-tab-btn').forEach(btn => {
        if (btn.dataset.age === key) {
          btn.className = 'age-tab-btn px-5 py-3 rounded-2xl font-bold text-sm transition-all bg-aqua text-white shadow-lg shadow-aqua/25 flex items-center gap-2';
        } else {
          btn.className = 'age-tab-btn px-5 py-3 rounded-2xl font-bold text-sm transition-all bg-bgLight text-navy hover:bg-mint/30 border border-mint/60 flex items-center gap-2';
        }
      });

      const container = document.getElementById('age-program-display');
      container.innerHTML = `
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-center">
          <div class="lg:col-span-5">
            <div class="relative rounded-[1.8rem] overflow-hidden aspect-[4/3] border-4 border-white shadow-lg">
              <img src="${data.image}" onerror="this.src='https://placehold.co/600x450/18B6B0/FFFFFF?text=${encodeURIComponent(data.title)}'" alt="${data.title}" class="w-full h-full object-cover" />
              <span class="absolute bottom-3 left-3 px-3 py-1 rounded-full bg-navy/85 text-sunny text-xs font-bold">${data.badge}</span>
            </div>
          </div>
          <div class="lg:col-span-7 space-y-5">
            <div>
              <h3 class="font-display text-2xl sm:text-3xl font-bold text-navy">${data.title}</h3>
              <p class="text-sm text-navy/80 mt-2 leading-relaxed">${data.subtitle}</p>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
              ${data.highlights.map(h => `
                <div class="bg-white p-3.5 rounded-2xl border border-mint/60">
                  <p class="text-[11px] font-extrabold uppercase text-aquaDark">${h.label}</p>
                  <p class="text-xs sm:text-sm font-bold text-navy mt-0.5">${h.value}</p>
                </div>
              `).join('')}
            </div>
            <div>
              <p class="text-xs font-extrabold uppercase text-navy/70 mb-2">Materi & Pencapaian Utama:</p>
              <div class="flex flex-wrap gap-2">
                ${data.skills.map(s => `<span class="px-3 py-1.5 rounded-xl bg-sunny/50 text-navy text-xs font-bold">✓ ${s}</span>`).join('')}
              </div>
            </div>
            <div class="pt-2">
              <button onclick="bookSpecificCategory('${data.categoryValue}')" class="px-6 py-3 rounded-xl bg-coral hover:bg-coralDark text-white font-bold text-sm shadow-md transition-all">
                Daftar Program ${data.title.split(' (')[0]} →
              </button>
            </div>
          </div>
        </div>
      `;
    }

    // 2. DATA: CLASS SCHEDULE & CAPACITY
    const scheduleData = [
      { id: 1, day: 'Selasa', time: '09:00 - 09:30', age: 'Baby', ageLabel: 'Baby (6-24 Bln)', level: 'Beginner', pool: 'Warm Baby Pool (32°C)', coach: 'Coach Nadia Putri', filled: 3, max: 4 },
      { id: 2, day: 'Selasa', time: '16:00 - 16:45', age: 'Kids', ageLabel: 'Kids (5-12 Thn)', level: 'Basic', pool: 'Kolam Utama (28°C)', coach: 'Coach Raka Pratama', filled: 5, max: 6 },
      { id: 3, day: 'Kamis', time: '10:00 - 10:35', age: 'Toddler', ageLabel: 'Toddler (2-4 Thn)', level: 'Beginner', pool: 'Warm Baby Pool (31°C)', coach: 'Coach Nadia Putri', filled: 2, max: 4 },
      { id: 4, day: 'Kamis', time: '17:00 - 18:00', age: 'Adults', ageLabel: 'Adults (18+ Thn)', level: 'Beginner', pool: 'Kolam Utama (28°C)', coach: 'Coach Clara Wijaya', filled: 4, max: 5 },
      { id: 5, day: 'Sabtu', time: '08:30 - 09:15', age: 'Kids', ageLabel: 'Kids (5-12 Thn)', level: 'Intermediate', pool: 'Kolam Utama (28°C)', coach: 'Coach Raka Pratama', filled: 6, max: 6 },
      { id: 6, day: 'Sabtu', time: '10:30 - 11:30', age: 'Teens', ageLabel: 'Teens (13-17 Thn)', level: 'Advanced', pool: 'Kolam 25m Lintasan 1-3', coach: 'Coach Dimas Saputra', filled: 3, max: 6 },
      { id: 7, day: 'Minggu', time: '09:00 - 09:30', age: 'Baby', ageLabel: 'Baby (6-24 Bln)', level: 'Beginner', pool: 'Warm Baby Pool (32°C)', coach: 'Coach Nadia Putri', filled: 4, max: 4 },
      { id: 8, day: 'Minggu', time: '10:30 - 11:30', age: 'Adults', ageLabel: 'Adults (18+ Thn)', level: 'Intermediate', pool: 'Kolam Utama (28°C)', coach: 'Coach Clara Wijaya', filled: 2, max: 5 },
      { id: 9, day: 'Minggu', time: '15:30 - 16:15', age: 'Kids', ageLabel: 'Kids (5-12 Thn)', level: 'Beginner', pool: 'Kolam Dangkal (0.8m)', coach: 'Coach Dimas Saputra', filled: 4, max: 6 },
    ];

    function renderSchedule() {
      const dayVal = document.getElementById('filter-day').value;
      const ageVal = document.getElementById('filter-age').value;
      const levelVal = document.getElementById('filter-level').value;

      const filtered = scheduleData.filter(item => {
        return (dayVal === 'all' || item.day === dayVal) &&
               (ageVal === 'all' || item.age === ageVal) &&
               (levelVal === 'all' || item.level === levelVal);
      });

      const grid = document.getElementById('schedule-grid');
      if (filtered.length === 0) {
        grid.innerHTML = `<div class="col-span-full text-center py-12 bg-white rounded-3xl border border-mint">
          <p class="font-display text-xl font-bold text-navy">Tidak ada kelas yang cocok dengan filter tersebut</p>
          <p class="text-xs text-navy/70 mt-1">Coba pilih filter "Semua Hari" atau hubungi Admin untuk kelas Private fleksibel.</p>
        </div>`;
        return;
      }

      grid.innerHTML = filtered.map(item => {
        const remaining = item.max - item.filled;
        const pct = Math.round((item.filled / item.max) * 100);
        let statusBadge = `<span class="px-2.5 py-1 rounded-full bg-aqua/15 text-aquaDark text-[11px] font-extrabold">Tersedia ${remaining} Slot</span>`;
        let barColor = 'bg-aqua';
        if (remaining === 0) {
          statusBadge = `<span class="px-2.5 py-1 rounded-full bg-gray-200 text-gray-600 text-[11px] font-extrabold">Slot Penuh</span>`;
          barColor = 'bg-gray-400';
        } else if (remaining === 1) {
          statusBadge = `<span class="px-2.5 py-1 rounded-full bg-coral/20 text-coralDark text-[11px] font-extrabold">Sisa 1 Slot!</span>`;
          barColor = 'bg-coral';
        }

        return `
          <div class="bg-white rounded-3xl p-6 border-2 border-mint/60 hover:border-aqua transition-all shadow-sm flex flex-col justify-between">
            <div>
              <div class="flex items-center justify-between gap-2 mb-3">
                <span class="px-3 py-1 rounded-xl bg-navy text-white text-xs font-bold">${item.day} • ${item.time}</span>
                ${statusBadge}
              </div>
              <h4 class="font-display text-xl font-bold text-navy">${item.ageLabel}</h4>
              <p class="text-xs font-bold text-aquaDark mt-0.5">Level: ${item.level} • ${item.pool}</p>
              <p class="text-xs text-navy/75 mt-2 flex items-center gap-1.5">
                <span>👨‍🏫</span> <strong>${item.coach}</strong>
              </p>

              <!-- Capacity Meter -->
              <div class="mt-4 pt-3 border-t border-gray-100">
                <div class="flex justify-between text-[11px] font-bold text-navy/75 mb-1.5">
                  <span>Kapasitas Kelas: ${item.filled}/${item.max} Peserta</span>
                  <span>${pct}% Terisi</span>
                </div>
                <div class="w-full h-2 bg-bgLight rounded-full overflow-hidden">
                  <div class="h-full ${barColor} rounded-full" style="width: ${pct}%"></div>
                </div>
              </div>
            </div>

            <button
              ${remaining === 0 ? 'disabled' : `onclick="bookFromSchedule('${item.ageLabel}', '${item.level}', '${item.day} • ${item.time}', '${item.coach}')"`}
              class="mt-5 w-full py-2.5 rounded-xl font-bold text-xs transition-all ${remaining === 0 ? 'bg-gray-100 text-gray-400 cursor-not-allowed' : 'bg-bgLight hover:bg-coral hover:text-white text-navy border border-mint'}"
            >
              ${remaining === 0 ? 'Kuota Penuh' : 'Kunci Slot Kelas Ini →'}
            </button>
          </div>
        `;
      }).join('');
    }

    // 3. SWIM PASSPORT PROGRESS DEMO
    const passportDemos = {
      baby: {
        student: 'Arka Pratama (11 Bulan)',
        level: 'Baby Water Sensory - Tahap 2',
        progress: 75,
        badges: [
          { name: 'Happy Splash', done: true },
          { name: 'Gentle Dip (3 Detik)', done: true },
          { name: 'Back Float Relax', done: true },
          { name: 'Reach & Grab Toy', done: false }
        ],
        note: 'Arka sudah sangat nyaman saat air menyentuh wajah dan mulai aktif menendang kaki dengan ceria!'
      },
      kids: {
        student: 'Kayla Putri (7 Tahun)',
        level: 'Kids Basic → Intermediate',
        progress: 85,
        badges: [
          { name: 'Bubble Master', done: true },
          { name: 'Starfish Float 10s', done: true },
          { name: 'Streamline Glide 10m', done: true },
          { name: 'Freestyle Breath 25m', done: false }
        ],
        note: 'Koordinasi kaki dan tangan gaya bebas sudah stabil. Sesi depan fokus latihan ambil napas samping.'
      },
      adult: {
        student: 'Dina Maharani (29 Tahun)',
        level: 'Adult Confidence & Technique',
        progress: 90,
        badges: [
          { name: 'Zero Panic Float', done: true },
          { name: 'Standing Recovery', done: true },
          { name: 'Breaststroke 25m', done: true },
          { name: 'Deep Pool Treading', done: true }
        ],
        note: 'Luar biasa! Rasa takut di kolam kedalaman 1.8m sudah teratasi sepenuhnya.'
      }
    };

    function setPassportDemo(type) {
      const d = passportDemos[type];
      ['baby', 'kids', 'adult'].forEach(k => {
        const b = document.getElementById(`pass-btn-${k}`);
        b.className = k === type
          ? 'px-3 py-1.5 rounded-xl text-xs font-bold bg-aqua text-white'
          : 'px-3 py-1.5 rounded-xl text-xs font-bold bg-white/15 text-white hover:bg-white/25';
      });

      document.getElementById('swim-passport-card').innerHTML = `
        <div class="flex justify-between items-start">
          <div>
            <p class="font-display font-bold text-base text-sunny">${d.student}</p>
            <p class="text-xs text-white/80">${d.level}</p>
          </div>
          <span class="px-2.5 py-1 rounded-lg bg-aqua text-white text-xs font-extrabold">${d.progress}%</span>
        </div>
        <div class="w-full h-2 bg-white/15 rounded-full overflow-hidden">
          <div class="h-full bg-sunny rounded-full transition-all duration-500" style="width: ${d.progress}%"></div>
        </div>
        <div class="grid grid-cols-2 gap-2 pt-1">
          ${d.badges.map(b => `
            <div class="px-2.5 py-2 rounded-xl text-[11px] font-bold flex items-center gap-1.5 ${b.done ? 'bg-aqua/30 text-white border border-aqua' : 'bg-white/5 text-white/50 border border-white/10'}">
              <span>${b.done ? '🏅' : '🔒'}</span>
              <span class="truncate">${b.name}</span>
            </div>
          `).join('')}
        </div>
        <p class="text-[11px] text-mint italic pt-1">"Catatan Coach: ${d.note}"</p>
      `;
    }

    // 4. FAQ ACCORDION
    const faqList = [
      {
        q: 'Berapa usia minimal bayi untuk mulai kelas Baby Swimming?',
        a: 'Bayi dapat mulai bergabung sejak usia minimal 6 bulan (atau sudah memiliki kontrol kepala dan leher yang kuat). Kelas dilaksanakan di kolam khusus air hangat bersuhu 31°–32°C selama 30 menit dengan wajib didampingi 1 orang tua di dalam kolam.'
      },
      {
        q: 'Apa saja perlengkapan yang wajib dibawa saat latihan?',
        a: 'Peserta wajib membawa baju renang berbahan lycra/spandex, kacamata renang, handuk, dan perlengkapan mandi. Khusus bayi & batita (6 bulan – 3 tahun) wajib mengenakan reusable swim diaper (popok renang khusus).'
      },
      {
        q: 'Saya orang dewasa dan sama sekali tidak bisa berenang serta takut air dalam, apakah bisa ikut?',
        a: 'Sangat bisa! Kami memiliki kelas khusus Adult Beginner / Hydrophobia Therapy (baik Group maupun Private 1-on-1). Pelatih akan membimbing mulai dari latihan pernapasan, cara mengapung rileks, hingga cara berdiri kembali dengan aman di air.'
      },
      {
        q: 'Bagaimana jika peserta sakit atau berhalangan hadir di jadwal rutin?',
        a: 'Anda dapat mengajukan Make-up Class (kelas pengganti) tanpa hangus dengan menghubungi Admin WhatsApp maksimal 6 jam sebelum jadwal kelas dimulai. Kuota make-up class berlaku hingga 2x dalam satu paket 8x pertemuan.'
      },
      {
        q: 'Bagaimana cara mengetahui level kelas yang cocok sebelum mendaftar?',
        a: 'Anda dapat menggunakan fitur "Cek Level / Mini Placement Quiz" di website ini atau memilih paket Trial Class (Rp 125.000) di mana pelatih akan melakukan evaluasi langsung di kolam pada pertemuan pertama.'
      }
    ];

    function renderFAQ() {
      const container = document.getElementById('faq-container');
      container.innerHTML = faqList.map((item, idx) => `
        <div class="bg-white rounded-2xl border-2 border-mint/50 overflow-hidden">
          <button onclick="toggleFAQ(${idx})" class="w-full px-5 py-4 text-left flex items-center justify-between gap-4 font-bold text-sm sm:text-base text-navy hover:text-aqua transition-colors">
            <span>${item.q}</span>
            <span id="faq-icon-${idx}" class="text-aqua font-extrabold text-xl transition-transform">+</span>
          </button>
          <div id="faq-ans-${idx}" class="hidden px-5 pb-4 text-xs sm:text-sm text-navy/75 leading-relaxed border-t border-gray-100 pt-3">
            ${item.a}
          </div>
        </div>
      `).join('');
    }

    function toggleFAQ(idx) {
      const ans = document.getElementById(`faq-ans-${idx}`);
      const icon = document.getElementById(`faq-icon-${idx}`);
      const isHidden = ans.classList.contains('hidden');
      ans.classList.toggle('hidden');
      icon.textContent = isHidden ? '−' : '+';
    }

    // 5. 7-STEP BOOKING WIZARD STATE & LOGIC
    let currentStep = 1;
    const totalSteps = 7;
    const stepTitles = [
      'Langkah 1 dari 7: Kategori Peserta',
      'Langkah 2 dari 7: Program & Level',
      'Langkah 3 dari 7: Jadwal & Instruktur',
      'Langkah 4 dari 7: Data Peserta',
      'Langkah 5 dari 7: Pilih Paket Kelas',
      'Langkah 6 dari 7: Ringkasan Reservasi',
      'Langkah 7 dari 7: Kirim ke WhatsApp'
    ];

    function goToStep(step) {
      if (step < 1 || step > totalSteps) return;
      currentStep = step;

      document.querySelectorAll('.wizard-step').forEach((el, i) => {
        el.classList.toggle('hidden', i + 1 !== currentStep);
      });

      document.getElementById('wizard-step-label').textContent = stepTitles[currentStep - 1];
      const pct = Math.round((currentStep / totalSteps) * 100);
      document.getElementById('wizard-progress-text').textContent = `${pct}% Selesai`;
      document.getElementById('wizard-progress-bar').style.width = `${(currentStep / totalSteps) * 100}%`;

      document.querySelectorAll('.step-dot').forEach((dot, i) => {
        dot.className = i + 1 <= currentStep
          ? 'step-dot h-2 rounded-full bg-sunny transition-all'
          : 'step-dot h-2 rounded-full bg-white/25 transition-all';
      });

      document.getElementById('btn-prev-step').disabled = currentStep === 1;
      const nextBtn = document.getElementById('btn-next-step');
      if (currentStep === totalSteps) {
        nextBtn.classList.add('hidden');
      } else {
        nextBtn.classList.remove('hidden');
        nextBtn.textContent = currentStep === 6 ? 'Lanjut ke Kirim WhatsApp →' : 'Lanjut Langkah Berikutnya →';
      }

      updateBookingState();
    }

    function changeStep(delta) {
      goToStep(currentStep + delta);
    }

    function getBookingData() {
      const category = document.querySelector('input[name="bk_category"]:checked')?.value || 'Baby (6-24 Bulan)';
      const level = document.querySelector('input[name="bk_level"]:checked')?.value || 'Beginner';
      const format = document.querySelector('input[name="bk_format"]:checked')?.value || 'Group Class';
      const schedule = document.getElementById('bk_schedule').value;
      const pool = document.getElementById('bk_pool').value;
      const instructor = document.getElementById('bk_instructor').value;
      const participants = document.getElementById('bk_participants').value;
      const name = document.getElementById('bk_name').value.trim() || '(Belum diisi)';
      const dob = document.getElementById('bk_dob').value || '(Belum diisi)';
      const parent = document.getElementById('bk_parent').value.trim() || '-';
      const wa = document.getElementById('bk_wa').value.trim() || '(Belum diisi)';
      const exp = document.getElementById('bk_exp').value.trim() || 'Pemula / Belum ada';
      const pkgInput = document.querySelector('input[name="bk_package"]:checked');
      const pkg = pkgInput ? pkgInput.value : 'Regular Group (8x Pertemuan) - Rp 880.000';

      return { category, level, format, schedule, pool, instructor, participants, name, dob, parent, wa, exp, pkg };
    }

    function updateBookingState() {
      const d = getBookingData();

      // Summary Card (Step 6)
      const summaryEl = document.getElementById('booking-summary-card');
      if (summaryEl) {
        summaryEl.innerHTML = `
          <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
            <div><span class="text-xs text-navy/60 block">Kategori Peserta</span><strong class="text-navy">${d.category}</strong></div>
            <div><span class="text-xs text-navy/60 block">Program & Level</span><strong class="text-navy">${d.level} • ${d.format}</strong></div>
            <div><span class="text-xs text-navy/60 block">Jadwal Pilihan</span><strong class="text-aquaDark">${d.schedule}</strong></div>
            <div><span class="text-xs text-navy/60 block">Instruktur & Kolam</span><strong class="text-navy">${d.instructor}</strong><span class="block text-xs text-navy/70">${d.pool}</span></div>
            <div><span class="text-xs text-navy/60 block">Nama Peserta (${d.participants})</span><strong class="text-navy">${d.name}</strong> <span class="text-xs text-navy/60">(${d.dob})</span></div>
            <div><span class="text-xs text-navy/60 block">Orang Tua/Wali & No. WA</span><strong class="text-navy">${d.parent} • ${d.wa}</strong></div>
            <div class="sm:col-span-2 pt-2 border-t border-mint">
              <span class="text-xs text-navy/60 block">Paket & Estimasi Biaya</span>
              <strong class="text-lg font-display text-coral">${d.pkg}</strong>
            </div>
          </div>
        `;
      }

      // WhatsApp Message Preview (Step 7)
      const waText = generateWhatsAppMessage(d);
      const previewBox = document.getElementById('wa-preview-box');
      if (previewBox) previewBox.textContent = waText;
    }

    function generateWhatsAppMessage(d) {
      return `Halo Admin *TirtaCeria Swim Academy*! 🏊‍♂️✨
Saya ingin melakukan reservasi kelas renang dengan rincian berikut:

• *Kategori Peserta:* ${d.category}
• *Level & Format:* ${d.level} (${d.format})
• *Jadwal:* ${d.schedule}
• *Lokasi Kolam:* ${d.pool}
• *Instruktur:* ${d.instructor}
• *Jumlah Peserta:* ${d.participants}

*Data Peserta:*
• Nama: ${d.name}
• Tanggal Lahir: ${d.dob}
• Orang Tua/Wali: ${d.parent}
• No. WhatsApp: ${d.wa}
• Pengalaman Renang: ${d.exp}

*Paket Pilihan:*
• ${d.pkg}

Mohon cek ketersediaan slot, instruktur, dan konfirmasi pendaftaran saya terlebih dahulu ya Admin. Saya memahami bahwa reservasi belum terkonfirmasi sebelum mendapat balasan dari admin. Terima kasih! 🙏`;
    }

    function sendBookingToWhatsApp() {
      const requiredFields = ['bk_name', 'bk_dob', 'bk_wa'];
      const missing = requiredFields.find(id => !document.getElementById(id)?.value.trim());
      if (missing) {
        const field = document.getElementById(missing);
        field?.focus();
        field?.scrollIntoView({ behavior: 'smooth', block: 'center' });
        alert('Lengkapi nama peserta, tanggal lahir, dan nomor WhatsApp terlebih dahulu.');
        return;
      }
      const d = getBookingData();
      const msg = encodeURIComponent(generateWhatsAppMessage(d));
      const targetWa = window.TIRTACERIA_WA_NUMBER || window.WEBIA_WA_ADMIN || '6285850180285';
      window.open(`https://wa.me/${targetWa}?text=${msg}`, '_blank', 'noopener,noreferrer');
    }

    function copyWhatsAppText() {
      const text = document.getElementById('wa-preview-box').textContent;
      const temp = document.createElement('textarea');
      temp.value = text;
      document.body.appendChild(temp);
      temp.select();
      document.execCommand('copy');
      document.body.removeChild(temp);
      const fb = document.getElementById('copy-feedback');
      fb.classList.remove('hidden');
      setTimeout(() => fb.classList.add('hidden'), 3000);
    }

    // Helper Shortcuts into Booking Wizard
    function bookSpecificCategory(catVal) {
      switchPage('all');
      const radio = document.querySelector(`input[name="bk_category"][value="${catVal}"]`);
      if (radio) radio.checked = true;
      goToStep(2);
      document.getElementById('booking-section').scrollIntoView({ behavior: 'smooth' });
    }

    function bookFromSchedule(ageLabel, level, scheduleText, coach) {
      switchPage('all');
      const catRadio = Array.from(document.querySelectorAll('input[name="bk_category"]')).find(r => r.value.includes(ageLabel.split(' ')[0]));
      if (catRadio) catRadio.checked = true;
      const lvlRadio = Array.from(document.querySelectorAll('input[name="bk_level"]')).find(r => r.value.includes(level));
      if (lvlRadio) lvlRadio.checked = true;

      const schedSelect = document.getElementById('bk_schedule');
      const opt = Array.from(schedSelect.options).find(o => o.value.includes(scheduleText.split(' ')[0]));
      if (opt) schedSelect.value = opt.value;

      const coachSelect = document.getElementById('bk_instructor');
      const cOpt = Array.from(coachSelect.options).find(o => o.value.includes(coach));
      if (cOpt) coachSelect.value = cOpt.value;

      goToStep(4);
      document.getElementById('booking-section').scrollIntoView({ behavior: 'smooth' });
    }

    function selectPackageAndScroll(pkgValue) {
      switchPage('all');
      const pkgRadio = document.querySelector(`input[name="bk_package"][value="${pkgValue}"]`);
      if (pkgRadio) pkgRadio.checked = true;
      goToStep(1);
      document.getElementById('booking-section').scrollIntoView({ behavior: 'smooth' });
    }

    // 6. PLACEMENT ASSESSMENT MODAL
    let recommendedQuizState = null;

    function openPlacementModal() {
      const m = document.getElementById('placement-modal');
      m.classList.remove('hidden');
      m.classList.add('flex');
    }

    function closePlacementModal() {
      const m = document.getElementById('placement-modal');
      m.classList.add('hidden');
      m.classList.remove('flex');
    }

    function calculatePlacement() {
      const age = document.getElementById('quiz-age').value;
      const comfort = document.getElementById('quiz-comfort').value;
      const pref = document.getElementById('quiz-pref').value;

      let lvlTitle = 'Beginner (Pengenalan Air)';
      let desc = 'Fokus membangun rasa nyaman di air, teknik pernapasan gelembung, dan mengapung aman.';
      if (comfort === 'Basic') {
        lvlTitle = 'Basic (Meluncur & Napas)';
        desc = 'Fokus meluncur mandiri 10m, gerakan kaki flutter kick, dan koordinasi ambil napas.';
      } else if (comfort === 'Intermediate') {
        lvlTitle = 'Intermediate (Gaya Bebas & Punggung)';
        desc = 'Fokus penyempurnaan gaya bebas & punggung jarak 25m serta pengenalan gaya dada.';
      } else if (comfort === 'Advanced') {
        lvlTitle = 'Advanced / Professional';
        desc = 'Fokus penguasaan 4 gaya renang lengkap, teknik turn, dan peningkatan stamina.';
      }

      recommendedQuizState = { age, comfort, pref };
      document.getElementById('quiz-result-box').classList.remove('hidden');
      document.getElementById('quiz-result-title').textContent = `${age} • Level ${comfort} (${pref})`;
      document.getElementById('quiz-result-desc').textContent = desc;
    }

    function applyQuizToBooking() {
      if (!recommendedQuizState) return;
      closePlacementModal();
      switchPage('all');

      const catRadio = document.querySelector(`input[name="bk_category"][value="${recommendedQuizState.age}"]`);
      if (catRadio) catRadio.checked = true;

      const lvlRadio = Array.from(document.querySelectorAll('input[name="bk_level"]')).find(r => r.value.includes(recommendedQuizState.comfort));
      if (lvlRadio) lvlRadio.checked = true;

      const fmtRadio = Array.from(document.querySelectorAll('input[name="bk_format"]')).find(r => r.value.includes(recommendedQuizState.pref));
      if (fmtRadio) fmtRadio.checked = true;

      goToStep(3);
      document.getElementById('booking-section').scrollIntoView({ behavior: 'smooth' });
    }

    // 7. MULTIPAGE VIEW SWITCHER
    function switchPage(pageKey) {
      document.querySelectorAll('.nav-pill').forEach(btn => {
        if (btn.dataset.nav === pageKey) {
          btn.className = 'nav-pill px-4 py-2 rounded-full text-sm font-bold transition-all bg-aqua text-white shadow-sm';
        } else {
          btn.className = 'nav-pill px-4 py-2 rounded-full text-sm font-semibold text-navy/80 hover:text-aqua transition-all';
        }
      });

      const sections = document.querySelectorAll('[data-section]');
      sections.forEach(sec => {
        if (pageKey === 'all') {
          sec.classList.remove('hidden');
        } else {
          const secType = sec.getAttribute('data-section');
          sec.classList.toggle('hidden', secType !== pageKey);
        }
      });

      window.scrollTo({ top: 0, behavior: 'smooth' });
    }

    function toggleMobileMenu() {
      document.getElementById('mobile-menu').classList.toggle('hidden');
    }

    // 8. UNIQUE AI CHATBOT ("COACH SPLASH AI")
    function toggleAIChat() {
      const win = document.getElementById('ai-chat-window');
      win.classList.toggle('hidden');
    }

    function handleAIChatSubmit(e) {
      e.preventDefault();
      const input = document.getElementById('ai-input');
      const q = input.value.trim();
      if (!q) return;
      input.value = '';
      askCoachAI(q);
    }

    function askCoachAI(question) {
      const feed = document.getElementById('ai-messages');

      // User Bubble
      const userMsg = document.createElement('div');
      userMsg.className = 'bg-aqua text-white p-3 rounded-2xl rounded-tr-none ml-auto max-w-[82%] font-medium shadow-sm';
      userMsg.textContent = question;
      feed.appendChild(userMsg);

      // AI Response Logic
      const qLower = question.toLowerCase();
      let reply = 'Asisten demo TirtaCeria: Untuk informasi lebih lanjut atau penjadwalan langsung, Anda bisa mencoba <strong>Formulir Booking 7 Langkah</strong> di halaman ini atau klik tombol WhatsApp di pojok kiri bawah ya! 🏊‍♂️';

      if (qLower.includes('bayi') || qLower.includes('baby') || qLower.includes('bulan')) {
        reply = '👶 <strong>Kelas Baby Swimming (6–24 Bulan)</strong>:<br>• Usia minimal: 6 bulan.<br>• Wajib didampingi 1 orang tua di kolam.<br>• Durasi: 30 menit di kolam air hangat <strong>32°C</strong>.<br>• Rasio maksimal 1 instruktur : 4 bayi.<br>Mau langsung coba <em>Trial Class</em> Rp 125rb?';
      } else if (qLower.includes('harga') || qLower.includes('biaya') || qLower.includes('paket') || qLower.includes('trial')) {
        reply = '💰 <strong>Daftar Biaya Paket TirtaCeria</strong>:<br>• <strong>Trial Class (1x):</strong> Rp 125.000<br>• <strong>Regular Group (8x):</strong> Rp 880.000 (Favorit!)<br>• <strong>Private 1-on-1 (4x):</strong> Rp 950.000<br>• <strong>Monthly Unlimited:</strong> Rp 1.250.000/bln';
      } else if (qLower.includes('dewasa') || qLower.includes('takut') || qLower.includes('adult')) {
        reply = '🏊‍♂️ <strong>Kelas Dewasa (18+ Tahun)</strong> sangat cocok untuk pemula yang takut air! Coach Clara spesialis membimbing dari nol (latihan mengapung rileks & napas) lewat format <em>Group Dewasa</em> maupun <em>Private 1-on-1</em>.';
      } else if (qLower.includes('perlengkapan') || qLower.includes('bawa') || qLower.includes('diaper')) {
        reply = '🥽 <strong>Perlengkapan Wajib:</strong><br>• Baju renang berbahan lycra/spandex.<br>• Kacamata renang & handuk.<br>• Khusus bayi/batita (6 bln–3 thn) wajib memakai <em>reusable swim diaper</em>.';
      } else if (qLower.includes('jadwal') || qLower.includes('hari') || qLower.includes('jam')) {
        reply = '📅 Kelas tersedia hari <strong>Selasa, Kamis, Sabtu, dan Minggu</strong> mulai pukul 08.30 pagi hingga 18.00 sore. Cek bagian <em>Jadwal & Ketersediaan Slot</em> untuk melihat sisa kuota secara real-time!';
      }

      setTimeout(() => {
        const botMsg = document.createElement('div');
        botMsg.className = 'bg-white p-3.5 rounded-2xl rounded-tl-none border border-mint/60 shadow-sm text-navy max-w-[88%] leading-relaxed';
        botMsg.innerHTML = reply;
        feed.appendChild(botMsg);
        feed.scrollTop = feed.scrollHeight;
      }, 350);

      feed.scrollTop = feed.scrollHeight;
    }

    // 9. ANIMATIONS: HERO BUBBLES, MOUSE PARALLAX & SCROLL REVEAL
    function initAquaticAnimations() {
      // Generate Rising Bubbles in Hero
      const bubbleContainer = document.getElementById('hero-bubbles');
      if (bubbleContainer) {
        for (let i = 0; i < 16; i++) {
          const b = document.createElement('span');
          const size = Math.floor(Math.random() * 22) + 10;
          const left = Math.floor(Math.random() * 96);
          const delay = (Math.random() * 6).toFixed(1);
          const duration = (Math.random() * 5 + 6).toFixed(1);
          b.style.cssText = `
            position: absolute;
            bottom: -30px;
            left: ${left}%;
            width: ${size}px;
            height: ${size}px;
            border-radius: 9999px;
            background: radial-gradient(circle at 30% 30%, rgba(255,255,255,0.9), rgba(24,182,176,0.22));
            border: 1px solid rgba(255,255,255,0.7);
            animation: bubbleRise ${duration}s ease-in ${delay}s infinite;
          `;
          bubbleContainer.appendChild(b);
        }
      }

      // Subtle Parallax on Hero Swim Gear
      document.addEventListener('mousemove', (e) => {
        const items = document.querySelectorAll('.parallax-item');
        const x = (window.innerWidth / 2 - e.clientX);
        const y = (window.innerHeight / 2 - e.clientY);
        items.forEach(item => {
          const speed = parseFloat(item.getAttribute('data-speed')) || 0.03;
          item.style.transform = `translate(${x * speed}px, ${y * speed}px)`;
        });
      });

      // IntersectionObserver for Scroll Reveal
      const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
          if (entry.isIntersecting) {
            entry.target.classList.add('visible');
          }
        });
      }, { threshold: 0.1 });

      document.querySelectorAll('.reveal').forEach(el => observer.observe(el));
    }

    // Expose every function used by inline onclick/onchange attributes.
    // This keeps the controls callable from Blade markup in all browsers.
    Object.assign(window, {
      selectAgeProgram,
      renderSchedule,
      setPassportDemo,
      renderFAQ,
      toggleFAQ,
      goToStep,
      changeStep,
      getBookingData,
      updateBookingState,
      generateWhatsAppMessage,
      sendBookingToWhatsApp,
      copyWhatsAppText,
      bookSpecificCategory,
      bookFromSchedule,
      selectPackageAndScroll,
      openPlacementModal,
      closePlacementModal,
      calculatePlacement,
      applyQuizToBooking,
      switchPage,
      toggleMobileMenu,
      toggleAIChat,
      handleAIChatSubmit,
      askCoachAI,
      initAquaticAnimations,
    });

    // Run initialization whether this file loads before or after DOMContentLoaded.
    function initializeTirtaCeria() {
      if (window.__tirtaceriaInitialized) return;
      window.__tirtaceriaInitialized = true;
      try {
        selectAgeProgram('baby');
        renderSchedule();
        setPassportDemo('baby');
        renderFAQ();
        updateBookingState();
        initAquaticAnimations();
      } catch (error) {
        window.__tirtaceriaInitialized = false;
        console.error('[TirtaCeria] Initialization failed:', error);
      }
    }

    if (document.readyState === 'loading') {
      document.addEventListener('DOMContentLoaded', initializeTirtaCeria, { once: true });
    } else {
      initializeTirtaCeria();
    }
