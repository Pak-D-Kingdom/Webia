
    const heroMoments = [
      {
        banner: 'Makan Malam Keluarga • Ayam Madu & Sup Jagung',
        kid: 'Chicken Katsu Mild',
        sharing: '4 Porsi Lauk + Sayur',
        img: 'https://images.unsplash.com/photo-1547592180-85f173990554?auto=format&fit=crop&w=900&q=85'
      },
      {
        banner: 'Bekal Sekolah Si Kecil • Bento Teriyaki & Buah',
        kid: 'Mini Tamago Bento',
        sharing: '2 Bento Anak + 2 Dewasa',
        img: 'https://images.unsplash.com/photo-1512621776951-a57141f2eefd?auto=format&fit=crop&w=900&q=85'
      },
      {
        banner: 'Sunday Family Feast • Ayam Panggang Rosemary',
        kid: 'Mac & Cheese Panggang',
        sharing: '1 Loyang Besar Sekeluarga',
        img: 'https://images.unsplash.com/photo-1504674900247-0877df9cc836?auto=format&fit=crop&w=900&q=85'
      }
    ];

    const weeklyRotations = {
      1: [
        { day: 'Sen', full: 'Senin', breakfast: 'Bubur Ayam Kampung Komplit', lunch: 'Ayam Bakar Madu & Tumis Buncis', dinner: 'Sup Ikan Dori Kuah Bening', snack: 'Bolu Pisang Kukus' },
        { day: 'Sel', full: 'Selasa', breakfast: 'Roti Panggang Telur & Alpukat', lunch: 'Beef Teriyaki & Brokoli Saus Tiram', dinner: 'Soto Ayam Lamongan (Koya Terpisah)', snack: 'Puding Mangga Chia' },
        { day: 'Rab', full: 'Rabu', breakfast: 'Nasi Uduk Ungu & Telur Dadar', lunch: 'Chicken Katsu Mild & Salad Jagung', dinner: 'Garang Asem Ayam Kampung', snack: 'Pastel Panggang Ayam' },
        { day: 'Kam', full: 'Kamis', breakfast: 'Pancake Oat Pisang Madu', lunch: 'Empal Gepuk Empuk & Sayur Asem', dinner: 'Salmon Panggang Mentega Lemon', snack: 'Buah Potong Segar' },
        { day: 'Jum', full: 'Jumat', breakfast: 'Lontong Sayur Labu Siam Mild', lunch: 'Semur Bola Daging & Wortel', dinner: 'Udang Bakar Saus Kecap Manis', snack: 'Kue Lumpur Kentang' },
        { day: 'Sab', full: 'Sabtu', breakfast: 'Waffle Gandum & Stroberi', lunch: 'Nasi Liwet Komplit Keluarga', dinner: 'Chicken Alfredo Pasta Creamy', snack: 'Brownies Panggang' },
        { day: 'Min', full: 'Minggu', breakfast: 'Dimsum Ayam Udang Kukus', lunch: 'Sunday Roast Chicken & Kentang', dinner: 'Shabu-Shabu Kuah Kaldu Ayam', snack: 'Es Puter Buah Alami' }
      ],
      2: [
        { day: 'Sen', full: 'Senin', breakfast: 'Omelet Keju & Hashbrown Panggang', lunch: 'Ayam Woku Kemangi (Cabai Terpisah)', dinner: 'Sup Krim Jagung & Roti Bawang', snack: 'Puding Cokelat Susu' },
        { day: 'Sel', full: 'Selasa', breakfast: 'Nasi Kuning Bento Anak', lunch: 'Korean Bulgogi Sapi & Japchae', dinner: 'Pepes Ikan Nila Daun Kemangi', snack: 'Muffin Blueberry' },
        { day: 'Rab', full: 'Rabu', breakfast: 'French Toast Kayu Manis', lunch: 'Rawon Daging Sapi & Tauge Pendek', dinner: 'Grilled Chicken Pesto & Pasta', snack: 'Sate Buah Pelangi' },
        { day: 'Kam', full: 'Kamis', breakfast: 'Bubur Kacang Hijau Gula Aren', lunch: 'Ikan Gurame Asam Manis Nanas', dinner: 'Tahu Telur & Capcay Kuah Hangat', snack: 'Kroket Kentang Ragout' },
        { day: 'Jum', full: 'Jumat', breakfast: 'Sandwich Tuna Jagung Manis', lunch: 'Rendang Daging Empuk & Daun Singkong', dinner: 'Bistik Ayam Kentang Goreng Oven', snack: 'Puding Karamel' },
        { day: 'Sab', full: 'Sabtu', breakfast: 'Martabak Telur Mini Daging', lunch: 'Hainanese Chicken Rice Keluarga', dinner: 'Lasagna Daging Sapi Panggang', snack: 'Churros Panggang' },
        { day: 'Min', full: 'Minggu', breakfast: 'Chawanmushi & Onigiri Salmon', lunch: 'Tumpeng Mini Sehat Keluarga', dinner: 'Steamboat Tomyum Kaldu Bening', snack: 'Salad Buah Yogurt' }
      ]
    };

    const familyDishes = [
      {
        id: 101,
        name: 'Ayam Bakar Madu & Sayur Asem Segar',
        cuisine: 'Indonesian',
        kidFriendly: true,
        pickyEater: true,
        noSpicy: true,
        nutFree: true,
        kcal: 480, protein: 34, carbs: 52, fat: 14,
        ingredients: 'Paha & Dada Ayam Kampung Ungkep Madu Hutan, Sayur Asem Labu Siam & Jagung Manis, Sambal Terasi dikemas terpisah.',
        allergens: ['Bebas Kacang', 'Bebas Seafood'],
        img: 'https://images.unsplash.com/photo-1547592180-85f173990554?auto=format&fit=crop&w=700&q=80'
      },
      {
        id: 102,
        name: 'Chicken Katsu Mild & Japanese Curry',
        cuisine: 'Asian',
        kidFriendly: true,
        pickyEater: true,
        noSpicy: true,
        nutFree: true,
        kcal: 510, protein: 32, carbs: 58, fat: 15,
        ingredients: 'Dada Ayam Tepung Roti Panko Renyah, Saus Kari Jepang Manis Gurih dengan Wortel & Kentang Lembut.',
        allergens: ['Gluten (Panko)', 'Telur'],
        img: 'https://images.unsplash.com/photo-1532550907401-a500c9a57435?auto=format&fit=crop&w=700&q=80'
      },
      {
        id: 103,
        name: 'Creamy Chicken & Broccoli Penne',
        cuisine: 'Western',
        kidFriendly: true,
        pickyEater: true,
        noSpicy: true,
        nutFree: true,
        kcal: 495, protein: 30, carbs: 54, fat: 16,
        ingredients: 'Pasta Penne Gandum, Potongan Dada Ayam Panggang, Brokoli Cincang Halus, Saus Keju Cheddar Ringan.',
        allergens: ['Susu (Keju)', 'Gluten'],
        img: 'https://images.unsplash.com/photo-1512621776951-a57141f2eefd?auto=format&fit=crop&w=700&q=80'
      },
      {
        id: 104,
        name: 'Empal Gepuk Daging Sapi & Oseng Tempe',
        cuisine: 'Traditional',
        kidFriendly: true,
        pickyEater: false,
        noSpicy: true,
        nutFree: true,
        kcal: 530, protein: 36, carbs: 49, fat: 19,
        ingredients: 'Daging Sapi Has Dalam Rebus Santan Encer & Ketumbar, Tempe Bacem Potong Dadu, Lalapan Rebus.',
        allergens: ['Kedelai (Tempe)'],
        img: 'https://images.unsplash.com/photo-1504674900247-0877df9cc836?auto=format&fit=crop&w=700&q=80'
      },
      {
        id: 105,
        name: 'Teriyaki Salmon & Edamame Rice Bowl',
        cuisine: 'International',
        kidFriendly: true,
        pickyEater: true,
        noSpicy: true,
        nutFree: true,
        kcal: 470, protein: 35, carbs: 46, fat: 15,
        ingredients: 'Fillet Salmon Norwegia Tanpa Duri, Edamame Kupas, Jagung Manis, Saus Teriyaki Manis Rendah Garam.',
        allergens: ['Ikan (Salmon)', 'Kedelai'],
        img: 'https://images.unsplash.com/photo-1546069901-ba9599a7e63c?auto=format&fit=crop&w=700&q=80'
      },
      {
        id: 106,
        name: 'Soto Ayam Lamongan Kuah Kuning Hangat',
        cuisine: 'Indonesian',
        kidFriendly: true,
        pickyEater: true,
        noSpicy: true,
        nutFree: true,
        kcal: 430, protein: 31, carbs: 45, fat: 12,
        ingredients: 'Suwiran Ayam Kampung, Soun, Telur Rebus, Kaldu Kunyit Jahe Hangat, Sambal Rawit Terpisah.',
        allergens: ['Telur'],
        img: 'https://images.unsplash.com/photo-1540420773420-3366772f4999?auto=format&fit=crop&w=700&q=80'
      },
      {
        id: 107,
        name: 'Beef Bulgogi & Sayuran Korea Manis',
        cuisine: 'Asian',
        kidFriendly: true,
        pickyEater: true,
        noSpicy: true,
        nutFree: true,
        kcal: 515, protein: 35, carbs: 50, fat: 17,
        ingredients: 'Irisan Tipis Daging Sapi Sirloin Marinasi Pir & Kecap Manis, Wortel, Jamur Kuping, Wijen Sangrai.',
        allergens: ['Kedelai', 'Wijen'],
        img: 'https://images.unsplash.com/photo-1547592180-85f173990554?auto=format&fit=crop&w=700&q=80'
      },
      {
        id: 108,
        name: 'Mediterranean Herb Roast Chicken & Potato',
        cuisine: 'International',
        kidFriendly: true,
        pickyEater: false,
        noSpicy: true,
        nutFree: true,
        kcal: 465, protein: 37, carbs: 42, fat: 14,
        ingredients: 'Ayam Panggang Rosemary & Minyak Zaitun, Baby Potato Panggang, Buncis Kukus Mentega.',
        allergens: ['Bebas Alergen Utama'],
        img: 'https://images.unsplash.com/photo-1532550907401-a500c9a57435?auto=format&fit=crop&w=700&q=80'
      }
    ];

    let familyState = {
      size: 4,
      adults: 2,
      kids: 2,
      style: 'sharing',
      weeklyTotal: 1380000
    };
    let activeWeekRot = 1;
    let activeDayIdx = 0;
    let activeCuisine = 'all';
    let familyTags = { kidFriendly: false, pickyEater: false, noSpicy: false, nutFree: false };

    function switchHeroMoment(idx) {
      const m = heroMoments[idx];
      if (!m) return;
      document.getElementById('hero-dining-img').src = m.img;
      document.getElementById('hero-table-banner').textContent = m.banner;
      document.getElementById('hero-kid-dish').textContent = m.kid;
      document.getElementById('hero-sharing-dish').textContent = m.sharing;
      document.querySelectorAll('.hero-moment-btn').forEach((b, i) => {
        b.className = i === idx
          ? 'hero-moment-btn bg-coral text-white text-[11px] font-bold px-2.5 py-1.5 rounded-xl transition-all'
          : 'hero-moment-btn hover:bg-white/15 text-apricot text-[11px] font-bold px-2.5 py-1.5 rounded-xl transition-all';
      });
    }

    function toggleMobileMenu() {
      document.getElementById('mobile-menu').classList.toggle('hidden');
    }

    function selectFamilySize(size) {
      familyState.size = size;
      const adults = Math.max(1, Math.ceil(size / 2));
      const kids = Math.max(0, size - adults);
      document.getElementById('adult-slider').value = adults;
      document.getElementById('kid-slider').value = kids;

      document.querySelectorAll('.hero-fsize-btn').forEach(btn => {
        btn.className = Number(btn.dataset.fsize) === size
          ? 'hero-fsize-btn py-2 rounded-xl font-mono font-bold text-xs border-2 border-plum bg-coral text-white shadow-sm transition-all'
          : 'hero-fsize-btn py-2 rounded-xl font-mono font-bold text-xs border border-plum/20 bg-cream text-cocoa hover:bg-apricot transition-all';
      });

      document.querySelectorAll('.fsize-card').forEach(card => {
        card.className = Number(card.dataset.fsize) === size
          ? 'fsize-card p-3 rounded-2xl border-2 border-plum bg-coral text-white text-center shadow-[0_3px_0_0_#9B5572] transition-all'
          : 'fsize-card p-3 rounded-2xl border-2 border-plum/25 bg-white text-center transition-all';
      });

      document.getElementById('hero-size-caption').textContent = `${size >= 8 ? '6+' : size} Anggota • Tersinkronisasi`;
      recalcFamilyPlan();
    }

    function setServingStyle(style) {
      familyState.style = style;
      document.getElementById('style-btn-sharing').className = style === 'sharing'
        ? 'p-4 rounded-2xl border-2 border-plum bg-apricot/70 text-left shadow-sm transition-all'
        : 'p-4 rounded-2xl border-2 border-plum/25 bg-white text-left hover:bg-apricot/30 transition-all';
      document.getElementById('style-btn-individual').className = style === 'individual'
        ? 'p-4 rounded-2xl border-2 border-plum bg-apricot/70 text-left shadow-sm transition-all'
        : 'p-4 rounded-2xl border-2 border-plum/25 bg-white text-left hover:bg-apricot/30 transition-all';
      recalcFamilyPlan();
    }

    function recalcFamilyPlan() {
      const adults = Number(document.getElementById('adult-slider').value) || 2;
      const kids = Number(document.getElementById('kid-slider').value) || 0;
      const totalMembers = adults + kids;
      const mealTimes = Number(document.getElementById('family-meal-times').value) || 2;
      const weeks = Number(document.getElementById('family-duration-weeks').value) || 2;

      familyState.adults = adults;
      familyState.kids = kids;

      const adultLabel = document.getElementById('adult-count-label');
      if (adultLabel) adultLabel.textContent = `${adults} Porsi`;
      const kidLabel = document.getElementById('kid-count-label');
      if (kidLabel) kidLabel.textContent = `${kids} Porsi`;

      const weeklyPortions = totalMembers * mealTimes * 5;
      const totalPortions = weeklyPortions * weeks;
      const baseRate = familyState.style === 'sharing' ? 34500 : 36500;
      const discount = weeks === 4 ? 0.15 : (weeks === 2 ? 0.08 : 0);
      const effectivePerServing = Math.round((baseRate * (1 - discount)) / 500) * 500;
      const weeklyTotal = weeklyPortions * effectivePerServing;
      familyState.weeklyTotal = weeklyTotal;

      const badge = document.getElementById('plan-total-portions-badge');
      if (badge) badge.textContent = `${totalPortions} Porsi (${weeks} Mgg)`;
      const perServ = document.getElementById('plan-per-serving');
      if (perServ) perServ.textContent = `Rp ${effectivePerServing.toLocaleString('id-ID')}`;
      
      const weeklyTotEl = document.getElementById('plan-weekly-total');
      if (weeklyTotEl) {
        weeklyTotEl.innerHTML = `Total Mingguan: <strong class="text-white">Rp ${weeklyTotal.toLocaleString('id-ID')} / minggu</strong> (${totalMembers} Anggota × ${mealTimes}x Makan × 5 Hari)`;
      }

      const weeklyEst = document.getElementById('plan-weekly-est');
      if (weeklyEst) weeklyEst.textContent = `Rp ${weeklyTotal.toLocaleString('id-ID')}`;
      const monthlyEst = document.getElementById('plan-monthly-est');
      if (monthlyEst) monthlyEst.textContent = `Rp ${(weeklyTotal * 4).toLocaleString('id-ID')}`;

      const formatSum = document.getElementById('plan-format-summary');
      if (formatSum) formatSum.textContent = familyState.style === 'sharing' ? 'Family Sharing Tray' : 'Individual Bento Box';
      const breakdownSum = document.getElementById('plan-breakdown-summary');
      if (breakdownSum) breakdownSum.textContent = `${adults} Dewasa + ${kids} Anak`;

      // Sync Optional Elements safely
      const groceryEst = Math.round(weeklyTotal * 1.18 / 10000) * 10000;
      const appEst = Math.round(weeklyTotal * 1.42 / 10000) * 10000;
      
      const bFamLbl = document.getElementById('budget-family-label');
      if (bFamLbl) bFamLbl.textContent = `${totalMembers} Anggota (${weeklyPortions} Porsi/Minggu)`;
      const gCostVal = document.getElementById('grocery-cost-val');
      if (gCostVal) gCostVal.textContent = `Rp ${groceryEst.toLocaleString('id-ID')} / mgg`;
      const dAppVal = document.getElementById('delivery-app-val');
      if (dAppVal) dAppVal.textContent = `Rp ${appEst.toLocaleString('id-ID')} / mgg`;
      const sCostVal = document.getElementById('sodatable-cost-val');
      if (sCostVal) sCostVal.textContent = `Rp ${weeklyTotal.toLocaleString('id-ID')} / mgg`;
      const bSavVal = document.getElementById('budget-savings-val');
      if (bSavVal) bSavVal.textContent = `Hemat Rp ${(groceryEst - weeklyTotal).toLocaleString('id-ID')}`;

      const floatPill = document.getElementById('floating-ai-family-pill');
      if (floatPill) floatPill.textContent = `🏡 Meja ${totalMembers} Org`;
      const aiRef = document.getElementById('ai-fam-size-ref');
      if (aiRef) aiRef.textContent = `${totalMembers} Org`;
      const aiSizeTxt = document.getElementById('ai-chat-size-text');
      if (aiSizeTxt) aiSizeTxt.textContent = `${totalMembers} Anggota Keluarga`;
      const navFamCount = document.getElementById('nav-family-count');
      if (navFamCount) navFamCount.textContent = totalMembers;
      const chkSum = document.getElementById('chk-family-summary');
      if (chkSum) chkSum.textContent = `${totalMembers} Anggota (${adults} Dewasa, ${kids} Anak) • ${mealTimes}x Makan • ${weeks} Minggu`;
      const chkTot = document.getElementById('chk-family-total');
      if (chkTot) chkTot.textContent = `Rp ${weeklyTotal.toLocaleString('id-ID')}`;
    }

    function switchWeekRotation(rot) {
      activeWeekRot = rot;
      [1, 2].forEach(r => {
        document.getElementById(`week-rot-${r}`).className = r === rot
          ? 'week-rot-btn bg-plum text-cream text-xs font-bold px-3.5 py-2 rounded-xl'
          : 'week-rot-btn text-cocoa hover:bg-apricot/60 text-xs font-bold px-3.5 py-2 rounded-xl';
      });
      renderWeeklyCalendar();
    }

    function selectCalendarDay(idx) {
      activeDayIdx = idx;
      renderWeeklyCalendar();
    }

    function renderWeeklyCalendar() {
      const days = weeklyRotations[activeWeekRot];
      document.getElementById('calendar-day-tabs').innerHTML = days.map((d, idx) => `
        <button type="button" onclick="selectCalendarDay(${idx})" class="py-2.5 px-1 rounded-2xl border-2 font-bold text-xs transition-all ${idx === activeDayIdx ? 'border-plum bg-coral text-white shadow-[0_3px_0_0_#9B5572]' : 'border-plum/20 bg-white text-cocoa hover:bg-apricot/50'}">
          <span class="block sm:hidden">${d.day}</span>
          <span class="hidden sm:block">${d.full}</span>
        </button>
      `).join('');

      const sel = days[activeDayIdx];
      const slots = [
        { icon: '🌅', title: 'Sarapan Keluarga (Breakfast)', dish: sel.breakfast, tag: '06.30 WIB' },
        { icon: '☀️', title: 'Makan Siang & Bekal (Lunch)', dish: sel.lunch, tag: '11.30 WIB' },
        { icon: '🌙', title: 'Makan Malam Bersama (Dinner)', dish: sel.dinner, tag: '17.30 WIB' },
        { icon: '🧁', title: 'Camilan Sore Keluarga (Snack)', dish: sel.snack, tag: 'Kid-Favorite' }
      ];

      document.getElementById('calendar-day-meals').innerHTML = slots.map(s => `
        <div class="bg-white rounded-3xl p-5 border-2 border-plum shadow-sm flex flex-col justify-between hover:-translate-y-1 transition-transform">
          <div>
            <div class="flex items-center justify-between mb-3">
              <span class="text-2xl">${s.icon}</span>
              <span class="bg-apricot text-plum font-bold text-[10px] px-2.5 py-0.5 rounded-full">${s.tag}</span>
            </div>
            <span class="text-[11px] font-bold text-cocoa-soft block">${s.title}</span>
            <h3 class="font-display font-bold text-base text-cocoa mt-1">${s.dish}</h3>
          </div>
          <button type="button" onclick="showToast('Menu ${s.dish} dikunci untuk hari ${sel.full}!')" class="mt-4 text-left text-xs font-extrabold text-coral-dark hover:text-plum">
            ✓ Termasuk dalam Rotasi ${sel.full}
          </button>
        </div>
      `).join('');
    }

    function filterCuisine(cuisine) {
      activeCuisine = cuisine;
      document.querySelectorAll('.cuisine-btn').forEach(btn => {
        btn.className = btn.dataset.cuisine === cuisine
          ? 'cuisine-btn px-4 py-2 rounded-full text-xs font-bold border-2 border-plum bg-plum text-cream'
          : 'cuisine-btn px-4 py-2 rounded-full text-xs font-bold border-2 border-plum bg-white text-cocoa hover:bg-peach/50';
      });
      renderFamilyDishes();
    }

    function toggleFamilyTag(tag) {
      familyTags[tag] = !familyTags[tag];
      const btn = document.getElementById(`tag-${tag}`);
      btn.className = familyTags[tag]
        ? 'ftag-btn px-3 py-1.5 rounded-xl text-xs font-bold bg-coral text-white border border-plum'
        : 'ftag-btn px-3 py-1.5 rounded-xl text-xs font-bold bg-cream border border-plum/25 text-cocoa';
      renderFamilyDishes();
    }

    function renderFamilyDishes() {
      const list = familyDishes.filter(d => {
        if (activeCuisine !== 'all' && d.cuisine !== activeCuisine) return false;
        if (familyTags.kidFriendly && !d.kidFriendly) return false;
        if (familyTags.pickyEater && !d.pickyEater) return false;
        if (familyTags.noSpicy && !d.noSpicy) return false;
        if (familyTags.nutFree && !d.nutFree) return false;
        return true;
      });

      document.getElementById('cuisine-result-count').textContent = `Menampilkan ${list.length} Hidangan Keluarga`;
      document.getElementById('family-dishes-grid').innerHTML = list.map(d => `
        <div class="bg-white rounded-3xl border-2 border-plum overflow-hidden shadow-sm hover:-translate-y-1.5 transition-all flex flex-col justify-between group">
          <div>
            <div class="relative h-40 overflow-hidden">
              <img src="${d.img}" onerror="this.src='https://placehold.co/600x400/FFD9C7/3E2731?text=${encodeURIComponent(d.name)}'" alt="${d.name}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" />
              <span class="absolute top-2.5 left-2.5 bg-plum/90 text-cream text-[10px] font-bold px-2.5 py-0.5 rounded-full">${d.cuisine}</span>
              ${d.kidFriendly ? '<span class="absolute top-2.5 right-2.5 bg-apricot text-cocoa text-[10px] font-extrabold px-2.5 py-0.5 rounded-full">🧒 Kid-Friendly</span>' : ''}
            </div>
            <div class="p-4">
              <h3 class="font-display font-bold text-sm text-cocoa leading-snug line-clamp-2 mb-2">${d.name}</h3>
              <p class="text-[11px] text-cocoa-soft line-clamp-2">${d.ingredients}</p>
            </div>
          </div>
          <div class="px-4 pb-4 flex gap-2">
            <button type="button" onclick="openDishDetailModal(${d.id})" class="flex-1 bg-cream hover:bg-apricot text-cocoa font-bold text-xs py-2 rounded-xl border border-plum/25">Bahan & Gizi</button>
            <button type="button" onclick="showToast('${d.name} ditambahkan ke Family Box!')" class="bg-coral hover:bg-coral-dark text-white font-bold text-xs px-3 py-2 rounded-xl border border-plum">+ Box</button>
          </div>
        </div>
      `).join('');
    }

    function openDishDetailModal(id) {
      const d = familyDishes.find(x => x.id === id);
      if (!d) return;
      document.getElementById('dmodal-img').src = d.img;
      document.getElementById('dmodal-badge').textContent = `${d.cuisine} • ${d.kidFriendly ? 'Ramah Anak' : 'Menu Keluarga'}`;
      document.getElementById('dmodal-title').textContent = d.name;
      document.getElementById('dmodal-ingredients').textContent = d.ingredients;
      document.getElementById('dmodal-kcal').textContent = `${d.kcal} kcal`;
      document.getElementById('dmodal-protein').textContent = `${d.protein}g`;
      document.getElementById('dmodal-carbs').textContent = `${d.carbs}g`;
      document.getElementById('dmodal-fat').textContent = `${d.fat}g`;
      document.getElementById('dmodal-allergen-tags').innerHTML = d.allergens.map(a => `<span class="bg-apricot text-plum font-bold px-2.5 py-0.5 rounded-full text-[11px]">Info: ${a}</span>`).join('');
      const m = document.getElementById('dish-detail-modal');
      m.classList.remove('hidden');
      m.classList.add('flex');
    }

    function closeDishDetailModal() {
      const m = document.getElementById('dish-detail-modal');
      m.classList.add('hidden');
      m.classList.remove('flex');
    }

    function initFamilyBoxBuilder() {
      const mainSel = document.getElementById('box-main-dish');
      const kidSel = document.getElementById('box-kid-dish');
      mainSel.innerHTML = familyDishes.map(d => `<option value="${d.name}">${d.name}</option>`).join('');
      kidSel.innerHTML = familyDishes.filter(d => d.kidFriendly).map(d => `<option value="${d.name}">${d.name}</option>`).join('');
      kidSel.selectedIndex = 1;
      updateFamilyBoxSummary();
    }

    function updateFamilyBoxSummary() {
      const items = [
        { label: 'Lauk Berbagi', val: document.getElementById('box-main-dish').value },
        { label: 'Menu Anak', val: document.getElementById('box-kid-dish').value },
        { label: 'Sayur & Sup', val: document.getElementById('box-veggie-dish').value },
        { label: 'Camilan Sore', val: document.getElementById('box-snack-dish').value }
      ];
      document.getElementById('family-box-preview-list').innerHTML = items.map(it => `
        <div class="bg-white p-3 rounded-2xl border border-plum/15 flex items-center justify-between gap-2">
          <span class="text-[11px] font-extrabold text-plum shrink-0">${it.label}:</span>
          <span class="font-bold text-cocoa text-right truncate">${it.val}</span>
        </div>
      `).join('');
    }

    function openCheckoutModal() {
      recalcFamilyPlan();
      const m = document.getElementById('checkout-modal');
      m.classList.remove('hidden');
      m.classList.add('flex');
    }

    function closeCheckoutModal() {
      const m = document.getElementById('checkout-modal');
      m.classList.add('hidden');
      m.classList.remove('flex');
    }

    const SODATABLE_WHATSAPP_NUMBER = '6281234567890'; // Ganti dengan nomor WhatsApp bisnis (format internasional tanpa +).

    function completeFamilyOrder(e) {
      e.preventDefault();
      const form = e.currentTarget;
      const fields = form.querySelectorAll('input, textarea');
      const parent = document.getElementById('chk-parent-name').value.trim();
      const phone = fields[1]?.value.trim() || '';
      const primaryAddress = fields[2]?.value.trim() || '';
      const secondaryAddress = fields[3]?.value.trim() || 'Tidak ada';
      const total = document.getElementById('chk-family-total')?.textContent.trim() || 'Lihat kalkulator';
      const members = document.getElementById('family-size')?.value || document.getElementById('family-members')?.value || 'Sesuai pilihan pada perencana';
      const duration = document.getElementById('family-duration-weeks')?.selectedOptions?.[0]?.textContent.trim() || 'Sesuai pilihan';
      const frequency = document.getElementById('family-meal-times')?.selectedOptions?.[0]?.textContent.trim() || 'Sesuai pilihan';
      const message = [
        'Halo SodaTable Family Kitchen! Saya ingin mengajukan langganan paket makan keluarga.',
        '', `Nama pemesan: ${parent}`, `Nomor WhatsApp: ${phone}`,
        `Jumlah anggota keluarga: ${members}`, `Durasi: ${duration}`, `Frekuensi makan: ${frequency}`,
        `Estimasi biaya: ${total}`, `Alamat utama: ${primaryAddress}`, `Alamat kedua: ${secondaryAddress}`,
        '', 'Mohon konfirmasi ketersediaan menu, jadwal pengiriman, dan total pembayaran. Saya memahami pesanan belum terkonfirmasi sebelum tim SodaTable membalas.'
      ].join('\n');
      const url = `https://wa.me/${SODATABLE_WHATSAPP_NUMBER}?text=${encodeURIComponent(message)}`;
      const opened = window.open(url, '_blank', 'noopener,noreferrer');
      if (!opened) window.location.href = url;
      showToast('WhatsApp dibuka. Kirim pesan untuk meminta konfirmasi tim SodaTable.');
    }

    let famSwapIdx = 0;
    const famAltMenus = [
      'Ayam Bakar Madu & Sayur Asem',
      'Chicken Katsu Mild & Sup Krim Jagung',
      'Teriyaki Salmon & Edamame Bowl'
    ];
    function swapFamilyTomorrowMenu() {
      famSwapIdx = (famSwapIdx + 1) % famAltMenus.length;
      document.getElementById('fam-tomorrow-menu').textContent = famAltMenus[famSwapIdx];
      showToast('Menu makan malam keluarga besok berhasil diganti!');
    }

    let famPaused = false;
    function toggleFamilyPause() {
      famPaused = !famPaused;
      document.getElementById('fam-dash-status').textContent = famPaused ? '⏸ Dijeda Liburan (Kuota Aman)' : '● Aktif Minggu Ini';
      document.getElementById('fam-pause-btn').textContent = famPaused ? '▶ Lanjutkan' : '⏸ Jeda Liburan';
      showToast(famPaused ? 'Langganan keluarga dijeda sementara. Kuota makan tetap utuh!' : 'Langganan keluarga kembali aktif!');
    }

    function copyPromoCode(code) {
      const tmp = document.createElement('input');
      tmp.value = code;
      document.body.appendChild(tmp);
      tmp.select();
      document.execCommand('copy');
      document.body.removeChild(tmp);
      showToast(`Kode promo keluarga ${code} berhasil disalin!`);
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
      box.innerHTML += `<div class="bg-coral text-white p-2.5 rounded-2xl rounded-tr-none ml-8 font-medium">${msg}</div>`;
      input.value = '';

      let reply = `Untuk <strong>${familyState.adults + familyState.kids} anggota keluarga</strong>, saya rekomendasikan paket <em>Family Sharing Tray</em> dengan Chicken Katsu Mild untuk anak dan Ayam Bakar Madu (sambal terpisah) untuk orang tua!`;
      const low = msg.toLowerCase();
      if (low.includes('picky') || low.includes('anak')) reply = 'Favorit anak picky eater: <strong>Chicken Katsu Mild & Japanese Curry</strong> serta <strong>Creamy Chicken & Broccoli Penne</strong> (sayuran dicincang lembut & bebas pedas).';
      else if (low.includes('biaya') || low.includes('harga')) reply = `Estimasi paket mingguan keluarga Anda adalah <strong>Rp ${familyState.weeklyTotal.toLocaleString('id-ID')}/minggu</strong>—sudah termasuk nasi, sayur pendamping, dan gratis ongkir!`;
      else if (low.includes('alamat')) reply = 'Bisa! Anda dapat mengatur <strong>2 alamat pengiriman</strong> (misal makan siang ke kantor & makan malam ke rumah) langsung dari Dasbor Keluarga.';

      setTimeout(() => {
        box.innerHTML += `<div class="bg-white p-2.5 rounded-2xl rounded-tl-none border border-plum/15 text-cocoa leading-relaxed">${reply}</div>`;
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

    // Scroll Progress & Scroll-Spy Navbar
    window.addEventListener('scroll', () => {
      const scrollTop = window.scrollY;
      const docHeight = document.documentElement.scrollHeight - window.innerHeight;
      const pct = docHeight > 0 ? Math.min(100, (scrollTop / docHeight) * 100) : 0;
      document.getElementById('scroll-progress-bar').style.width = `${pct}%`;

      const spyIds = ['hero', 'family-planner-section', 'weekly-calendar-section', 'cuisine-explorer-section', 'box-builder-section', 'budget-section', 'occasions-section'];
      let currentId = 'hero';
      spyIds.forEach(id => {
        const el = document.getElementById(id);
        if (el && scrollTop >= el.offsetTop - 160) {
          currentId = id;
        }
      });

      document.querySelectorAll('.nav-spy-link').forEach(link => {
        link.className = link.dataset.spy === currentId
          ? 'nav-spy-link px-3.5 py-1.5 rounded-full text-xs font-bold bg-plum text-cream transition-all'
          : 'nav-spy-link px-3.5 py-1.5 rounded-full text-xs font-semibold text-cocoa hover:bg-white/80 transition-all';
      });
    }, { passive: true });

    window.addEventListener('DOMContentLoaded', () => {
      recalcFamilyPlan();
      renderWeeklyCalendar();
      renderFamilyDishes();
      initFamilyBoxBuilder();

      const observer = new IntersectionObserver(entries => {
        entries.forEach(entry => {
          if (entry.isIntersecting) entry.target.classList.add('is-visible');
        });
      }, { threshold: 0.08 });

      document.querySelectorAll('.reveal-on-scroll').forEach(sec => observer.observe(sec));
    });
  