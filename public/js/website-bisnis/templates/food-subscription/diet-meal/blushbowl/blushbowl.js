const BLUSHBOWL_WHATSAPP_NUMBER = '6281234567890'; // Ganti dengan nomor WhatsApp bisnis tanpa tanda + atau spasi.

const heroDishes = [
      {
        name: 'Teriyaki Salmon Bowl',
        kcal: 440,
        p: '42g', pPct: '(38%)',
        c: '38g', cPct: '(35%)',
        f: '12g', fPct: '(27%)',
        img: 'https://images.unsplash.com/photo-1546069901-ba9599a7e63c?auto=format&fit=crop&w=800&q=85'
      },
      {
        name: 'Herb Grilled Chicken Bowl',
        kcal: 390,
        p: '45g', pPct: '(46%)',
        c: '28g', cPct: '(29%)',
        f: '11g', fPct: '(25%)',
        img: 'https://images.unsplash.com/photo-1512621776951-a57141f2eefd?auto=format&fit=crop&w=800&q=85'
      },
      {
        name: 'Roasted Tempeh Buddha Bowl',
        kcal: 350,
        p: '28g', pPct: '(32%)',
        c: '39g', cPct: '(44%)',
        f: '9g', fPct: '(24%)',
        img: 'https://images.unsplash.com/photo-1540420773420-3366772f4999?auto=format&fit=crop&w=800&q=85'
      }
    ];

    const dietProgramsData = {
      'High Protein': {
        badge: 'Paling Populer • Fitness & Gym',
        ratio: 'Rasio: 42% Protein • 33% Karbo • 25% Lemak',
        title: 'High Protein Muscle & Lean Sculpt',
        desc: 'Diformulasikan dengan 38g–48g protein berkualitas tinggi per kotak dari dada ayam organik, salmon Norwegia, dan tenderloin sapi rendah lemak untuk menjaga massa otot dan rasa kenyang lebih lama.',
        kcalRange: '420 – 550 kcal / porsi',
        price: 'Rp 49.000',
        img: 'https://images.unsplash.com/photo-1532550907401-a500c9a57435?auto=format&fit=crop&w=900&q=85',
        highlights: ['Ideal untuk gym-goers & fat loss aktif', 'Bebas gorengan & saus tinggi gula']
      },
      'Low Calorie': {
        badge: 'Defisit Kalori Lembut',
        ratio: 'Rasio: 36% Protein • 38% Karbo • 26% Lemak',
        title: 'Low Calorie Volume-Rich Fat Loss',
        desc: 'Porsi melimpah sayuran berserat tinggi dan protein tanpa lemak dengan total hanya 320–400 kcal per kotak agar perut kenyang maksimal tanpa melewati batas defisit harian.',
        kcalRange: '320 – 400 kcal / porsi',
        price: 'Rp 44.000',
        img: 'https://images.unsplash.com/photo-1490645935967-10de6ba17061?auto=format&fit=crop&w=900&q=85',
        highlights: ['Penurunan berat badan 0.5–0.8 kg/minggu', 'Tinggi serat prebiotik alami']
      },
      'Balanced Diet': {
        badge: 'Keseimbangan Harian',
        ratio: 'Rasio: 30% Protein • 45% Karbo • 25% Lemak',
        title: 'Balanced Diet Daily Energy & Wellness',
        desc: 'Komposisi gizi seimbang mengacu pada Pedoman Gizi Seimbang dengan beras merah organik, quinoa, protein hewani & nabati, serta minyak zaitun extra virgin.',
        kcalRange: '430 – 520 kcal / porsi',
        price: 'Rp 46.000',
        img: 'https://images.unsplash.com/photo-1547592180-85f173990554?auto=format&fit=crop&w=900&q=85',
        highlights: ['Cocok untuk pekerja aktif & pemula diet', 'Menjaga gula darah tetap stabil']
      },
      'Low Carb': {
        badge: 'Kontrol Insulin & Gula Darah',
        ratio: 'Rasio: 40% Protein • 15% Karbo • 45% Lemak Sehat',
        title: 'Low Carb Metabolic Reset',
        desc: 'Mengganti nasi putih dengan kembang kol panggang (cauliflower rice), alpukat Hass, dan ikan laut dalam untuk meminimalkan lonjakan glukosa.',
        kcalRange: '380 – 490 kcal / porsi',
        price: 'Rp 52.000',
        img: 'https://images.unsplash.com/photo-1512621776951-a57141f2eefd?auto=format&fit=crop&w=900&q=85',
        highlights: ['Karbohidrat bersih < 22g per porsi', 'Mendukung sensitivitas insulin & fokus']
      },
      'Plant-Based': {
        badge: '100% Nabati & Ramah Lingkungan',
        ratio: 'Rasio: 28% Protein Nabati • 48% Karbo • 24% Lemak',
        title: 'Plant-Based Whole Food Vitality',
        desc: 'Kombinasi asam amino lengkap dari tempe organik fermentasi, edamame, chickpea, tahu sutra panggang, dan biji chia untuk pencernaan ringan.',
        kcalRange: '340 – 450 kcal / porsi',
        price: 'Rp 43.000',
        img: 'https://images.unsplash.com/photo-1540420773420-3366772f4999?auto=format&fit=crop&w=900&q=85',
        highlights: ['Bebas kolesterol & Dairy-Free', 'Kaya antioksidan & fitonutrien']
      }
    };

    const mealsCatalog = [
      {
        id: 1,
        name: 'Teriyaki Salmon Quinoa Bowl',
        program: 'High Protein',
        slot: 'lunch',
        kcal: 440,
        protein: 42,
        carbs: 38,
        fat: 12,
        fiber: 7,
        sodium: 410,
        serving: '380g',
        restrictions: ['Dairy-Free', 'Nut-Free'],
        allergens: ['Ikan (Salmon)', 'Kedelai'],
        ingredients: 'Fillet Salmon Norwegia (130g), Quinoa Tri-Color (100g), Edamame, Brokoli Kukus, Glaze Tamari Stevia.',
        img: 'https://images.unsplash.com/photo-1546069901-ba9599a7e63c?auto=format&fit=crop&w=700&q=80'
      },
      {
        id: 2,
        name: 'Sous-Vide Herb Chicken & Sweet Potato',
        program: 'High Protein',
        slot: 'lunch',
        kcal: 410,
        protein: 45,
        carbs: 34,
        fat: 9,
        fiber: 6,
        sodium: 360,
        serving: '390g',
        restrictions: ['Gluten-Free', 'Dairy-Free', 'Nut-Free', 'Seafood-Free'],
        allergens: ['Bebas Alergen Utama'],
        ingredients: 'Dada Ayam Organik Tanpa Kulit (160g), Ubi Cilembu Panggang (110g), Buncis Prancis, Minyak Zaitun.',
        img: 'https://images.unsplash.com/photo-1532550907401-a500c9a57435?auto=format&fit=crop&w=700&q=80'
      },
      {
        id: 3,
        name: 'Dori Sambal Matah & Cauliflower Rice',
        program: 'Low Carb',
        slot: 'dinner',
        kcal: 350,
        protein: 34,
        carbs: 16,
        fat: 15,
        fiber: 6,
        sodium: 390,
        serving: '360g',
        restrictions: ['Gluten-Free', 'Dairy-Free', 'Nut-Free'],
        allergens: ['Ikan (Dori)'],
        ingredients: 'Fillet Ikan Dori Panggang (150g), Nasi Kembang Kol Kukus (130g), Sambal Matah VCO, Timun Jepang.',
        img: 'https://images.unsplash.com/photo-1504674900247-0877df9cc836?auto=format&fit=crop&w=700&q=80'
      },
      {
        id: 4,
        name: 'Lean Beef Bulgogi & Brown Rice',
        program: 'Balanced Diet',
        slot: 'dinner',
        kcal: 495,
        protein: 41,
        carbs: 48,
        fat: 14,
        fiber: 6,
        sodium: 440,
        serving: '400g',
        restrictions: ['Dairy-Free', 'Nut-Free', 'Seafood-Free'],
        allergens: ['Kedelai', 'Wijen'],
        ingredients: 'Sapi Sirloin Tanpa Lemak (140g), Beras Merah Organik (120g), Jamur Shiitake, Bayam Bawang Putih.',
        img: 'https://images.unsplash.com/photo-1547592180-85f173990554?auto=format&fit=crop&w=700&q=80'
      },
      {
        id: 5,
        name: 'Avocado Egg White & Grilled Chicken Salad',
        program: 'Low Calorie',
        slot: 'breakfast',
        kcal: 340,
        protein: 36,
        carbs: 18,
        fat: 13,
        fiber: 8,
        sodium: 310,
        serving: '350g',
        restrictions: ['Gluten-Free', 'Dairy-Free', 'Nut-Free', 'Seafood-Free'],
        allergens: ['Telur'],
        ingredients: 'Dada Ayam Panggang (110g), Putih Telur Rebus (2 butir), Alpukat Hass (40g), Romaine, Lemon Vinaigrette.',
        img: 'https://images.unsplash.com/photo-1512621776951-a57141f2eefd?auto=format&fit=crop&w=700&q=80'
      },
      {
        id: 6,
        name: 'Mediterranean Chickpea & Tempe Bowl',
        program: 'Plant-Based',
        slot: 'lunch',
        kcal: 375,
        protein: 28,
        carbs: 42,
        fat: 9,
        fiber: 11,
        sodium: 340,
        serving: '370g',
        restrictions: ['Gluten-Free', 'Dairy-Free', 'Nut-Free', 'Seafood-Free'],
        allergens: ['Kedelai (Tempe)'],
        ingredients: 'Tempe Organik Panggang Herbal (110g), Kacang Arab, Quinoa, Zaitun Hitam, Paprika, Hummus.',
        img: 'https://images.unsplash.com/photo-1540420773420-3366772f4999?auto=format&fit=crop&w=700&q=80'
      },
      {
        id: 7,
        name: 'Berry Chia Protein Overnight Oats',
        program: 'Balanced Diet',
        slot: 'breakfast',
        kcal: 330,
        protein: 26,
        carbs: 39,
        fat: 8,
        fiber: 9,
        sodium: 210,
        serving: '320g',
        restrictions: ['Gluten-Free', 'Nut-Free', 'Seafood-Free'],
        allergens: ['Susu (Greek Yogurt)'],
        ingredients: 'Rolled Oats Gluten-Free (55g), Greek Yogurt Rendah Lemak, Whey Isolate Vanila, Stroberi Segar, Biji Chia.',
        img: 'https://images.unsplash.com/photo-1517673132405-a56a62b18caf?auto=format&fit=crop&w=700&q=80'
      },
      {
        id: 8,
        name: 'Matcha Edamame Fit Protein Bites',
        program: 'Low Calorie',
        slot: 'snack',
        kcal: 195,
        protein: 18,
        carbs: 15,
        fat: 7,
        fiber: 5,
        sodium: 140,
        serving: '160g',
        restrictions: ['Gluten-Free', 'Dairy-Free', 'Nut-Free', 'Seafood-Free'],
        allergens: ['Kedelai (Edamame)'],
        ingredients: 'Edamame Panggang (70g), Pea Protein Isolate, Uji Matcha Organik, Kurma Medjool, Biji Labu.',
        img: 'https://images.unsplash.com/photo-1490645935967-10de6ba17061?auto=format&fit=crop&w=700&q=80'
      }
    ];

    let calcState = { gender: 'male', goal: 'fat_loss', targetKcal: 1897 };
    let portionMultiplier = 1.0;
    let portionLabel = 'Regular';
    let selectedModalMeal = null;
    let activeProgramName = 'High Protein';
    let subState = { weeks: 2, freq: 2, finalPrice: 985000, promoApplied: false };

    function switchHeroDish(idx) {
      const d = heroDishes[idx];
      if (!d) return;
      document.getElementById('hero-bowl-img').src = d.img;
      document.getElementById('hero-bowl-kcal').textContent = `${d.kcal} kcal • ${d.name}`;
      document.getElementById('hero-macro-p').innerHTML = `${d.p} <span class="text-xs text-sage">${d.pPct}</span>`;
      document.getElementById('hero-macro-c').innerHTML = `${d.c} <span class="text-xs text-sage-dark">${d.cPct}</span>`;
      document.getElementById('hero-macro-f').innerHTML = `${d.f} <span class="text-xs text-blush-dark">${d.fPct}</span>`;

      document.querySelectorAll('.hero-dish-btn').forEach((btn, i) => {
        btn.className = i === idx
          ? 'hero-dish-btn bg-sage text-white text-[11px] font-bold px-2.5 py-1.5 rounded-xl transition-all'
          : 'hero-dish-btn hover:bg-white/15 text-peach text-[11px] font-bold px-2.5 py-1.5 rounded-xl transition-all';
      });
    }

    function toggleMobileMenu() {
      document.getElementById('mobile-menu').classList.toggle('hidden');
    }

    function selectFitnessGoal(goal) {
      calcState.goal = goal;
      document.querySelectorAll('.goal-card').forEach(card => {
        card.className = card.dataset.goal === goal
          ? 'goal-card px-4 py-2 rounded-full border-2 border-sage bg-sage text-linen font-bold text-xs shadow-sm transition-all'
          : 'goal-card px-4 py-2 rounded-full border-2 border-sage bg-transparent text-linen hover:bg-sage/25 font-bold text-xs transition-all';
      });
      calculateNutrition();
    }

    function calculateNutrition() {
      const genderEl = document.getElementById('calc-gender');
      const gender = genderEl ? genderEl.value : 'male';
      calcState.gender = gender;

      const age = Math.max(15, Math.min(85, Number(document.getElementById('calc-age').value) || 28));
      const height = Math.max(130, Math.min(220, Number(document.getElementById('calc-height').value) || 165));
      const weight = Math.max(35, Math.min(180, Number(document.getElementById('calc-weight').value) || 65));
      const activity = Number(document.getElementById('calc-activity').value) || 1.55;

      const bmr = gender === 'male'
        ? (10 * weight) + (6.25 * height) - (5 * age) + 5
        : (10 * weight) + (6.25 * height) - (5 * age) - 161;
      const tdee = Math.round(bmr * activity);

      const goals = {
        fat_loss: {
          delta: -500,
          pPct: 0.35,
          cPct: 0.35,
          fPct: 0.30,
          progName: 'High Protein'
        },
        weight_management: {
          delta: -250,
          pPct: 0.32,
          cPct: 0.43,
          fPct: 0.25,
          progName: 'Low Calorie'
        },
        muscle_building: {
          delta: 300,
          pPct: 0.38,
          cPct: 0.42,
          fPct: 0.20,
          progName: 'High Protein'
        },
        weight_maintenance: {
          delta: 0,
          pPct: 0.30,
          cPct: 0.45,
          fPct: 0.25,
          progName: 'Balanced Diet'
        },
        general_fitness: {
          delta: -120,
          pPct: 0.33,
          cPct: 0.42,
          fPct: 0.25,
          progName: 'Balanced Diet'
        }
      };

      const cfg = goals[calcState.goal] || goals.fat_loss;
      const targetKcal = Math.max(1200, Math.round(tdee + cfg.delta));
      calcState.targetKcal = targetKcal;

      const pG = Math.round((targetKcal * cfg.pPct) / 4);
      const cG = Math.round((targetKcal * cfg.cPct) / 4);
      const fG = Math.round((targetKcal * cfg.fPct) / 9);
      const perMealKcal = Math.round(targetKcal / 3);

      document.getElementById('calc-bmr-tdee-label').textContent = `BMR: ${Math.round(bmr).toLocaleString('id-ID')} kkal • TDEE: ${tdee.toLocaleString('id-ID')} kkal`;
      document.getElementById('target-kcal-display').textContent = targetKcal;
      document.getElementById('recommended-plan-title').innerHTML = `Rekomendasi: program <strong class="text-white">${cfg.progName}</strong> sekitar <strong class="text-white">${perMealKcal} kkal</strong> per makan.`;

      // Update Horizontal Progress Bars
      document.getElementById('bar-protein').style.width = `${Math.round(cfg.pPct * 100)}%`;
      document.getElementById('bar-carbs').style.width = `${Math.round(cfg.cPct * 100)}%`;
      document.getElementById('bar-fat').style.width = `${Math.round(cfg.fPct * 100)}%`;

      document.getElementById('macro-protein-g').textContent = `${pG} g`;
      document.getElementById('macro-protein-pct').textContent = `${Math.round(cfg.pPct * 100)}%`;
      document.getElementById('macro-carbs-g').textContent = `${cG} g`;
      document.getElementById('macro-carbs-pct').textContent = `${Math.round(cfg.cPct * 100)}%`;
      document.getElementById('macro-fat-g').textContent = `${fG} g`;
      document.getElementById('macro-fat-pct').textContent = `${Math.round(cfg.fPct * 100)}%`;

      // Update 3-Segment SVG Donut Ring (circumference = 2 * PI * 46 ≈ 289)
      const circ = 289;
      const pLen = circ * cfg.pPct;
      const cLen = circ * cfg.cPct;
      const fLen = circ * cfg.fPct;

      const segP = document.getElementById('donut-seg-protein');
      const segC = document.getElementById('donut-seg-carbs');
      const segF = document.getElementById('donut-seg-fat');

      if (segP && segC && segF) {
        segP.setAttribute('stroke-dasharray', `${pLen.toFixed(1)} ${circ}`);
        segP.setAttribute('stroke-dashoffset', '0');

        segC.setAttribute('stroke-dasharray', `${cLen.toFixed(1)} ${circ}`);
        segC.setAttribute('stroke-dashoffset', `${(-pLen).toFixed(1)}`);

        segF.setAttribute('stroke-dasharray', `${fLen.toFixed(1)} ${circ}`);
        segF.setAttribute('stroke-dashoffset', `${(-(pLen + cLen)).toFixed(1)}`);
      }

      document.getElementById('floating-ai-kcal-pill').textContent = `⚡ ${targetKcal.toLocaleString('id-ID')} kcal`;
      document.getElementById('ai-chat-kcal-ref').textContent = `${targetKcal.toLocaleString('id-ID')} kcal`;
      document.getElementById('builder-goal-kcal').textContent = targetKcal.toLocaleString('id-ID');
      updateDailyBuilder();
      renderWeeklyBars();
    }

    function applyTargetToBuilder() {
      document.getElementById('builder-section').scrollIntoView({ behavior: 'smooth' });
      showToast(`Target ${calcState.targetKcal.toLocaleString('id-ID')} kcal diterapkan ke Meal Builder!`);
    }

    function selectDietProgram(progName) {
      activeProgramName = progName;
      const d = dietProgramsData[progName];
      if (!d) return;
      document.querySelectorAll('.prog-tab').forEach(btn => {
        btn.className = btn.dataset.prog === progName
          ? 'prog-tab px-5 py-2.5 rounded-full font-bold text-xs sm:text-sm border-2 border-espresso bg-espresso text-linen shadow-[0_3px_0_0_#647D68] transition-all'
          : 'prog-tab px-5 py-2.5 rounded-full font-bold text-xs sm:text-sm border-2 border-espresso bg-white text-espresso hover:bg-peach transition-all';
      });
      document.getElementById('prog-img').src = d.img;
      document.getElementById('prog-kcal-range').textContent = d.kcalRange;
      document.getElementById('prog-badge').textContent = d.badge;
      document.getElementById('prog-macro-ratio').textContent = d.ratio;
      document.getElementById('prog-title').textContent = d.title;
      document.getElementById('prog-desc').textContent = d.desc;
      document.getElementById('prog-price').innerHTML = `${d.price} <span class="text-xs font-sans font-normal text-espresso-soft">/ box</span>`;
      document.getElementById('prog-highlights').innerHTML = d.highlights.map(h => `
        <div class="flex items-center gap-2 bg-linen p-3 rounded-xl border border-espresso/10 text-xs font-bold text-espresso">
          <span class="text-sage">✓</span> ${h}
        </div>
      `).join('');
    }

    function filterCatalogByProgram() {
      document.getElementById('filter-program').value = activeProgramName;
      renderMealCatalog();
      document.getElementById('catalog-section').scrollIntoView({ behavior: 'smooth' });
    }

    function setPortionMultiplier(mult, label) {
      portionMultiplier = mult;
      portionLabel = label;
      document.querySelectorAll('.portion-btn').forEach(btn => {
        btn.className = 'portion-btn bg-white text-espresso text-xs font-bold px-3 py-1.5 rounded-xl border border-espresso/20';
      });
      document.getElementById(`portion-btn-${label}`).className = 'portion-btn bg-espresso text-linen text-xs font-bold px-3 py-1.5 rounded-xl';
      renderMealCatalog();
    }

    function renderMealCatalog() {
      const calF = document.getElementById('filter-calorie').value;
      const progF = document.getElementById('filter-program').value;
      const macroF = document.getElementById('filter-macro').value;
      const restF = document.getElementById('filter-restriction').value;

      const filtered = mealsCatalog.filter(m => {
        const k = Math.round(m.kcal * portionMultiplier);
        const p = Math.round(m.protein * portionMultiplier);
        const c = Math.round(m.carbs * portionMultiplier);
        const f = Math.round(m.fat * portionMultiplier);

        if (calF === 'under400' && k >= 400) return false;
        if (calF === '400to500' && (k < 400 || k > 500)) return false;
        if (calF === 'over500' && k <= 500) return false;
        if (progF !== 'all' && m.program !== progF) return false;
        if (macroF === 'high-protein' && p < 35) return false;
        if (macroF === 'low-carb' && c > 22) return false;
        if (macroF === 'low-fat' && f > 10) return false;
        if (restF !== 'all' && !m.restrictions.includes(restF)) return false;
        return true;
      });

      const grid = document.getElementById('meal-catalog-grid');
      if (filtered.length === 0) {
        grid.innerHTML = `<div class="col-span-full bg-linen rounded-3xl p-8 text-center border-2 border-dashed border-espresso/25">
          <p class="font-display font-bold text-lg text-espresso mb-2">Belum ada menu untuk kombinasi filter ini</p>
          <button type="button" onclick="resetCatalogFilters()" class="bg-sage text-white font-bold text-xs px-4 py-2 rounded-xl">Reset Filter</button>
        </div>`;
        return;
      }

      grid.innerHTML = filtered.map(m => {
        const k = Math.round(m.kcal * portionMultiplier);
        const p = Math.round(m.protein * portionMultiplier);
        const c = Math.round(m.carbs * portionMultiplier);
        const f = Math.round(m.fat * portionMultiplier);
        return `
          <div class="bg-linen rounded-3xl border-2 border-espresso overflow-hidden shadow-sm hover:-translate-y-1.5 transition-all flex flex-col justify-between group">
            <div>
              <div class="relative h-40 overflow-hidden">
                <img src="${m.img}" onerror="this.src='https://placehold.co/600x400/F1D8CE/493B38?text=${encodeURIComponent(m.name)}'" alt="${m.name}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" />
                <span class="absolute top-2.5 left-2.5 bg-espresso/90 text-linen font-mono text-[11px] font-bold px-2.5 py-0.5 rounded-full">${k} kcal</span>
                <span class="absolute top-2.5 right-2.5 bg-white/95 text-sage-dark text-[10px] font-extrabold px-2.5 py-0.5 rounded-full">${m.program}</span>
              </div>
              <div class="p-4">
                <h3 class="font-display font-bold text-sm text-espresso leading-snug line-clamp-2 mb-2">${m.name}</h3>
                <div class="grid grid-cols-3 gap-1.5 text-center bg-white p-2 rounded-xl border border-espresso/10 text-[11px]">
                  <div><span class="text-espresso-soft block">Protein</span><strong class="font-mono text-sage">${p}g</strong></div>
                  <div><span class="text-espresso-soft block">Karbo</span><strong class="font-mono text-espresso">${c}g</strong></div>
                  <div><span class="text-espresso-soft block">Lemak</span><strong class="font-mono text-blush-dark">${f}g</strong></div>
                </div>
              </div>
            </div>
            <div class="px-4 pb-4 flex gap-2">
              <button type="button" onclick="openNutritionModal(${m.id})" class="flex-1 bg-white hover:bg-peach text-espresso font-bold text-xs py-2 rounded-xl border border-espresso/25">Nutrition Facts</button>
              <button type="button" onclick="quickAddMealToBuilder(${m.id})" class="bg-sage hover:bg-sage-dark text-white font-bold text-xs px-3 py-2 rounded-xl border border-espresso">+ Box</button>
            </div>
          </div>
        `;
      }).join('');
    }

    function resetCatalogFilters() {
      document.getElementById('filter-calorie').value = 'all';
      document.getElementById('filter-program').value = 'all';
      document.getElementById('filter-macro').value = 'all';
      document.getElementById('filter-restriction').value = 'all';
      renderMealCatalog();
    }

    function openNutritionModal(id) {
      const m = mealsCatalog.find(x => x.id === id);
      if (!m) return;
      selectedModalMeal = m;
      document.getElementById('modal-meal-img').src = m.img;
      document.getElementById('modal-meal-tag').textContent = `${m.program} • Porsi ${portionLabel}`;
      document.getElementById('modal-meal-title').textContent = m.name;
      document.getElementById('modal-meal-desc').textContent = m.ingredients;
      document.getElementById('modal-serving-size').textContent = `Takaran Saji: 1 Box (${Math.round(parseInt(m.serving) * portionMultiplier)}g)`;
      document.getElementById('modal-kcal').textContent = `${Math.round(m.kcal * portionMultiplier)} kcal`;
      document.getElementById('modal-protein').textContent = `${Math.round(m.protein * portionMultiplier)}g`;
      document.getElementById('modal-carbs').textContent = `${Math.round(m.carbs * portionMultiplier)}g`;
      document.getElementById('modal-fiber').textContent = `${Math.round(m.fiber * portionMultiplier)}g`;
      document.getElementById('modal-fat').textContent = `${Math.round(m.fat * portionMultiplier)}g`;
      document.getElementById('modal-sodium').textContent = `${Math.round(m.sodium * portionMultiplier)}mg`;
      document.getElementById('modal-allergens').innerHTML = m.allergens.map(a => `<span class="bg-peach text-espresso font-bold px-2.5 py-0.5 rounded-full">Alergen: ${a}</span>`).join('');
      const modal = document.getElementById('nutrition-modal');
      modal.classList.remove('hidden');
      modal.classList.add('flex');
    }

    function closeNutritionModal() {
      const modal = document.getElementById('nutrition-modal');
      modal.classList.add('hidden');
      modal.classList.remove('flex');
    }

    function addModalMealToBuilder() {
      if (selectedModalMeal) {
        quickAddMealToBuilder(selectedModalMeal.id);
        closeNutritionModal();
      }
    }

    function initDailyBuilderSelects() {
      const slots = ['breakfast', 'lunch', 'dinner', 'snack'];
      const defaults = { breakfast: 5, lunch: 1, dinner: 3, snack: 8 };
      slots.forEach(s => {
        document.getElementById(`slot-${s}`).innerHTML = mealsCatalog.map(m => `
          <option value="${m.id}" ${m.id === defaults[s] ? 'selected' : ''}>${m.name} (${m.kcal} kcal • ${m.protein}g P)</option>
        `).join('');
      });
      updateDailyBuilder();
    }

    function quickAddMealToBuilder(mealId) {
      const m = mealsCatalog.find(x => x.id === mealId);
      if (!m) return;
      document.getElementById(`slot-${m.slot || 'lunch'}`).value = m.id;
      updateDailyBuilder();
      showToast(`"${m.name}" ditambahkan ke Meal Builder!`);
    }

    function updateDailyBuilder() {
      const ids = ['breakfast', 'lunch', 'dinner', 'snack'].map(s => Number(document.getElementById(`slot-${s}`).value));
      let k = 0, p = 0, c = 0, f = 0;
      ids.forEach(id => {
        const m = mealsCatalog.find(x => x.id === id);
        if (m) { k += m.kcal; p += m.protein; c += m.carbs; f += m.fat; }
      });
      document.getElementById('builder-total-kcal').textContent = k.toLocaleString('id-ID');
      document.getElementById('builder-total-p').textContent = `${p}g`;
      document.getElementById('builder-total-c').textContent = `${c}g`;
      document.getElementById('builder-total-f').textContent = `${f}g`;
      document.getElementById('builder-progress-bar').style.width = `${Math.min(100, Math.round((k / calcState.targetKcal) * 100))}%`;
      const diff = Math.abs(k - calcState.targetKcal);
      const badge = document.getElementById('builder-status-badge');
      badge.textContent = diff <= 160 ? 'Presisi Optimal ✓' : (k < calcState.targetKcal ? `Kurang ${calcState.targetKcal - k} kcal` : `Surplus +${k - calcState.targetKcal} kcal`);
    }

    function saveCustomBoxToCheckout() {
      document.getElementById('nav-box-count').textContent = '4';
      openCheckoutDrawer();
    }

    function renderWeeklyBars() {
      const mode = document.getElementById('weekly-mode').value;
      const days = ['Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab', 'Min'];
      const mult = mode === 'cycling' ? [0.92, 0.92, 1.0, 0.92, 0.95, 1.22, 1.05] : [1, 1, 1, 1, 1, 1, 1];
      document.getElementById('weekly-bars-container').innerHTML = days.map((d, i) => {
        const val = Math.round(calcState.targetKcal * mult[i]);
        const h = Math.min(100, Math.max(45, Math.round((val / 2400) * 100)));
        return `
          <div class="flex flex-col items-center gap-1 h-full justify-end">
            <span class="font-mono text-[9px] font-bold text-espresso">${val}</span>
            <div style="height: ${h}%" class="w-full rounded-t-xl border border-espresso/20 ${mode === 'cycling' && i === 5 ? 'bg-blush' : 'bg-sage'}"></div>
            <span class="text-[10px] font-extrabold text-espresso-soft">${d}</span>
          </div>
        `;
      }).join('');
    }

    function setSubOption(key, val) {
      subState[key] = val;
      if (key === 'weeks') {
        [1, 2, 4].forEach(w => {
          document.getElementById(`sub-week-${w}`).className = w === val
            ? 'sub-week-btn p-3.5 rounded-2xl border-2 border-espresso bg-sage text-white font-bold text-center shadow-[0_3px_0_0_#493B38]'
            : 'sub-week-btn p-3.5 rounded-2xl border-2 border-espresso bg-white font-bold text-center';
        });
      }
      if (key === 'freq') {
        [1, 2, 3].forEach(f => {
          document.getElementById(`sub-freq-${f}`).className = f === val
            ? 'sub-freq-btn p-3.5 rounded-2xl border-2 border-espresso bg-sage text-white text-left shadow-[0_3px_0_0_#493B38]'
            : 'sub-freq-btn p-3.5 rounded-2xl border-2 border-espresso bg-white text-espresso text-left';
        });
      }
      calculateSubscriptionCost();
    }

    function calculateSubscriptionCost() {
      const tierMult = Number(document.getElementById('sub-calorie-tier').value) || 1.12;
      const totalBoxes = subState.weeks * 5 * subState.freq;
      const rawTotal = Math.round((totalBoxes * 49000 * tierMult) / 1000) * 1000;
      const disc = subState.weeks === 4 ? 0.18 : (subState.weeks === 2 ? 0.10 : 0);
      const finalPrice = Math.round((rawTotal * (1 - disc)) / 1000) * 1000;
      subState.finalPrice = finalPrice;

      document.getElementById('sub-total-boxes').textContent = `${totalBoxes} Box Makanan`;
      document.getElementById('sub-final-price').textContent = `Rp ${finalPrice.toLocaleString('id-ID')}`;
      document.getElementById('sub-original-price').textContent = disc > 0 ? `Rp ${rawTotal.toLocaleString('id-ID')}` : '';
      document.getElementById('sub-per-box-price').textContent = `Setara Rp ${Math.round(finalPrice / totalBoxes).toLocaleString('id-ID')} / box • Gratis Thermal Bag`;
      document.getElementById('chk-plan-summary').textContent = `Paket ${subState.weeks} Minggu (${subState.freq}x Makan/Hari) • ${totalBoxes} Box`;
      const grand = subState.promoApplied ? Math.max(0, finalPrice - 50000) : finalPrice;
      document.getElementById('chk-grand-total').textContent = `Rp ${grand.toLocaleString('id-ID')}`;
    }

    function openCheckoutDrawer() {
      calculateSubscriptionCost();
      const m = document.getElementById('checkout-modal');
      m.classList.remove('hidden');
      m.classList.add('flex');
    }

    function closeCheckoutDrawer() {
      const m = document.getElementById('checkout-modal');
      m.classList.add('hidden');
      m.classList.remove('flex');
    }

    function applyCheckoutPromo() {
      if (document.getElementById('chk-promo-input').value.trim().toUpperCase() === 'BLUSHFIT26') {
        subState.promoApplied = true;
        calculateSubscriptionCost();
        showToast('Kode BLUSHFIT26 aktif! Diskon Rp 50.000 diterapkan.');
      } else {
        showToast('Masukkan kode BLUSHFIT26 untuk diskon minggu pertama.');
      }
    }

    function completeCheckoutOrder(e) {
      e.preventDefault();
      const name = document.getElementById('chk-name').value.trim();
      const phone = document.getElementById('chk-phone').value.trim();
      const address = document.getElementById('chk-address').value.trim();
      const promo = document.getElementById('chk-promo-input').value.trim().toUpperCase() || '-';
      const total = document.getElementById('chk-grand-total').textContent;
      const message = [
        'Halo BlushBowl Nutrition! Saya ingin melakukan pemesanan paket meal subscription.',
        '',
        `Nama: ${name}`,
        `No. WhatsApp: ${phone}`,
        `Alamat pengiriman: ${address}`,
        `Paket: ${subState.weeks} minggu`,
        `Frekuensi: ${subState.freq}x makan per hari`,
        `Jumlah: ${document.getElementById('sub-total-boxes').textContent}`,
        `Kategori kalori: ${document.getElementById('sub-calorie-tier').selectedOptions[0]?.text || '-'}`,
        `Jadwal pengiriman: ${document.getElementById('sub-delivery-slot').selectedOptions[0]?.text || '-'}`,
        `Kode promo: ${promo}`,
        `Estimasi total: ${total}`,
        '',
        'Mohon konfirmasi ketersediaan menu, area pengiriman, dan total akhir. Saya memahami pesanan belum terkonfirmasi sebelum mendapat balasan tim BlushBowl.'
      ].join('\n');
      const url = `https://wa.me/${BLUSHBOWL_WHATSAPP_NUMBER}?text=${encodeURIComponent(message)}`;
      window.open(url, '_blank', 'noopener,noreferrer');
      closeCheckoutDrawer();
      showToast('Ringkasan pesanan dibuka di WhatsApp. Kirim pesan untuk meminta konfirmasi tim.');
    }

    let mealSwapIdx = 0;
    const altMeals = [
      'Sous-Vide Herb Chicken & Sweet Potato (410 kcal)',
      'Teriyaki Salmon Quinoa Bowl (440 kcal)',
      'Lean Beef Bulgogi & Brown Rice (495 kcal)'
    ];
    function swapTomorrowMealDemo() {
      mealSwapIdx = (mealSwapIdx + 1) % altMeals.length;
      document.getElementById('dash-tomorrow-meal').textContent = altMeals[mealSwapIdx];
      showToast('Menu makan siang besok berhasil ditukar!');
    }

    let isPausedDemo = false;
    function togglePauseDemo() {
      isPausedDemo = !isPausedDemo;
      document.getElementById('dash-delivery-status').textContent = isPausedDemo ? '⏸ Dijeda 1 Hari (Kuota Utuh)' : '● Terjadwal Aktif';
      document.getElementById('dash-pause-btn').textContent = isPausedDemo ? '▶ Aktifkan' : '⏸ Jeda 1 Hari';
      showToast(isPausedDemo ? 'Pengiriman besok dijeda. Kuota otomatis digeser.' : 'Pengiriman besok kembali aktif!');
    }

    function showPlateInfo(part) {
      const info = {
        veggies: ['50% Sayuran & Fitonutrien', 'Volume Tinggi, Kalori Rendah', 'Brokoli, edamame, bayam baby, dan paprika memberikan volume kenyang fisik sekaligus memperlambat penyerapan glukosa.'],
        protein: ['25% Protein Tanpa Lemak', 'Pelindung Massa Otot', 'Dada ayam sous-vide, salmon Norwegia, dan tempe organik menjaga rasa kenyang lebih lama.'],
        carbs: ['25% Karbohidrat Kompleks', 'Energi Stabil Tanpa Ngantuk', 'Quinoa, beras merah organik, dan ubi Cilembu melepaskan energi secara bertahap.']
      }[part];
      document.getElementById('plate-info-box').innerHTML = `
        <span class="text-xs font-extrabold uppercase text-sage">${info[0]}</span>
        <h4 class="font-display font-bold text-base text-espresso mt-1">${info[1]}</h4>
        <p class="text-xs text-espresso-soft leading-relaxed mt-1">${info[2]}</p>
      `;
    }

    function submitConsultationBooking(e) {
      e.preventDefault();
      const name = document.getElementById('consult-name').value.trim();
      const expert = document.getElementById('consult-expert').value;
      const date = document.getElementById('consult-date').value;
      const message = [
        'Halo BlushBowl Nutrition! Saya ingin mengajukan jadwal konsultasi ahli gizi.',
        '',
        `Nama: ${name}`,
        `Ahli gizi pilihan: ${expert}`,
        `Tanggal yang diajukan: ${date}`,
        '',
        'Mohon informasikan ketersediaan jadwal dan konfirmasi reservasi. Saya memahami jadwal belum terkonfirmasi sebelum mendapat balasan tim.'
      ].join('\n');
      window.open(`https://wa.me/${BLUSHBOWL_WHATSAPP_NUMBER}?text=${encodeURIComponent(message)}`, '_blank', 'noopener,noreferrer');
      showToast('Permintaan konsultasi dibuka di WhatsApp. Jadwal menunggu konfirmasi tim.');
    }

    function updateCorporateQuote(pax) {
      document.getElementById('corp-pax-label').textContent = `${pax} Pax`;
      const price = pax >= 100 ? 38000 : (pax >= 50 ? 40500 : 42500);
      document.getElementById('corp-price-est').textContent = `Rp ${price.toLocaleString('id-ID')} / box`;
    }

    function copyPromoCode(code) {
      const tmp = document.createElement('input');
      tmp.value = code;
      document.body.appendChild(tmp);
      tmp.select();
      document.execCommand('copy');
      document.body.removeChild(tmp);
      showToast(`Kode promo ${code} disalin ke clipboard!`);
    }

    function toggleAIChat() {
      document.getElementById('ai-chat-window').classList.toggle('hidden');
    }

    function sendQuickAIPrompt(txt) {
      document.getElementById('ai-chat-input').value = txt;
      handleAIChatSubmit(new Event('submit'));
    }

    function handleAIChatSubmit(e) {
      e.preventDefault();
      const input = document.getElementById('ai-chat-input');
      const msg = input.value.trim();
      if (!msg) return;
      const box = document.getElementById('ai-chat-messages');
      box.innerHTML += `<div class="bg-sage text-white p-2.5 rounded-2xl rounded-tr-none ml-8 font-medium">${msg}</div>`;
      input.value = '';

      let reply = `Berdasarkan target <strong class="font-mono">${calcState.targetKcal.toLocaleString('id-ID')} kcal</strong> Anda, saya sarankan <em>Sous-Vide Herb Chicken (410 kcal, 45g Protein)</em> dan <em>Dori Sambal Matah (350 kcal)</em>.`;
      const low = msg.toLowerCase();
      if (low.includes('400')) reply = 'Menu < 400 kcal terfavorit: <strong>Avocado Egg White Salad (340 kcal)</strong> & <strong>Dori Sambal Matah Cauliflower Rice (350 kcal)</strong>!';
      else if (low.includes('40g') || low.includes('protein')) reply = 'Juara protein kami: <strong>Sous-Vide Herb Chicken (45g Protein)</strong> dan <strong>Teriyaki Salmon Bowl (42g Protein)</strong>.';
      else if (low.includes('harga') || low.includes('paket')) reply = 'Paket 2 Minggu (2x makan/hari) hanya <strong>Rp 985.000</strong> (hemat 10%) + potongan ekstra Rp 50.000 dengan kode <strong>BLUSHFIT26</strong>!';

      setTimeout(() => {
        box.innerHTML += `<div class="bg-white p-2.5 rounded-2xl rounded-tl-none border border-espresso/15 text-espresso leading-relaxed">${reply}</div>`;
        box.scrollTop = box.scrollHeight;
      }, 300);
    }

    let toastTimer;
    function showToast(msg) {
      const b = document.getElementById('toast-banner');
      document.getElementById('toast-message').textContent = msg;
      b.classList.remove('hidden');
      b.classList.add('flex');
      clearTimeout(toastTimer);
      toastTimer = setTimeout(() => {
        b.classList.add('hidden');
        b.classList.remove('flex');
      }, 3600);
    }

    // Scroll Progress & Active Navbar Scroll-Spy
    window.addEventListener('scroll', () => {
      const scrollTop = window.scrollY;
      const docHeight = document.documentElement.scrollHeight - window.innerHeight;
      const pct = docHeight > 0 ? Math.min(100, (scrollTop / docHeight) * 100) : 0;
      document.getElementById('scroll-progress-bar').style.width = `${pct}%`;

      const spySections = ['hero', 'calculator-section', 'programs-section', 'catalog-section', 'builder-section', 'subscription-section', 'nutritionist-section'];
      let currentId = 'hero';
      spySections.forEach(id => {
        const el = document.getElementById(id);
        if (el && scrollTop >= el.offsetTop - 160) {
          currentId = id;
        }
      });

      document.querySelectorAll('.nav-spy-link').forEach(link => {
        link.className = link.dataset.spy === currentId
          ? 'nav-spy-link px-3.5 py-1.5 rounded-full text-xs font-bold bg-espresso text-linen transition-all'
          : 'nav-spy-link px-3.5 py-1.5 rounded-full text-xs font-semibold text-espresso hover:bg-white/75 transition-all';
      });
    }, { passive: true });

    window.addEventListener('DOMContentLoaded', () => {
      calculateNutrition();
      renderMealCatalog();
      initDailyBuilderSelects();
      calculateSubscriptionCost();

      const tomorrow = new Date(Date.now() + 86400000).toISOString().split('T')[0];
      const cDate = document.getElementById('consult-date');
      if (cDate) cDate.value = tomorrow;

      const observer = new IntersectionObserver(entries => {
        entries.forEach(entry => {
          if (entry.isIntersecting) entry.target.classList.add('is-visible');
        });
      }, { threshold: 0.08 });

      document.querySelectorAll('.reveal-on-scroll').forEach(sec => observer.observe(sec));
    });
