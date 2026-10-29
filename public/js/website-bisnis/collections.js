/* WEBIA template gallery: multi-category, up to 3 business types, design-style filters */
document.addEventListener('DOMContentLoaded', () => {
    const grid = document.getElementById('webia-gallery-grid');
    if (!grid) return;

    const cards = Array.from(grid.querySelectorAll('.webia-gallery-card'));
    const search = document.getElementById('webia-template-search');
    const count = document.getElementById('webia-template-count');
    const empty = document.getElementById('webia-gallery-empty');
    const reset = document.getElementById('webia-gallery-reset');
    const categoryRoot = document.getElementById('webia-category-options');
    const subcategoryRoot = document.getElementById('webia-subcategory-options');
    const styleRoot = document.getElementById('webia-style-options');
    const typeCount = document.getElementById('webia-type-selection-count');
    const summary = document.getElementById('webia-filter-summary');

    const categories = [
        {id:'fnb',name:'F&B',types:['Restaurant','Cafe','Catering','Bakery','Food Product']},
        {id:'beauty',name:'Beauty',types:['Salon','Nail Art & Nail Care','Beauty Clinic','Skincare & Beauty Treatment','Makeup Artist']},
        {id:'automotive',name:'Automotive',types:['Auto Detailing & Car Care','Modifikasi & Aksesori Kendaraan','Bengkel & Servis Kendaraan','Dealer & Showroom Kendaraan']},
        {id:'company',name:'Company',types:['Company Profile','Contractor','Logistics & Supply Chain']},
        {id:'property',name:'Property',types:['Real Estate Agency','Property Agent','Perumahan & Cluster']},
        {id:'education',name:'Education',types:['School','Online Course & E-learning','Preschool & Daycare']},
        {id:'professional-service',name:'Professional Service',types:['Branding & Creative Agency','Lawyer','Translation & Interpreter Service']},
        {id:'personal-brand',name:'Personal Brand',types:['Content Creator & Influencer','Author & Writer','Public Speaker']},
        {id:'retail',name:'Retail',types:['Fashion & Clothing Store','Skincare & Beauty Products','Baby & Kids Products']},
        {id:'healthcare',name:'Healthcare',types:['Klinik kecantikan & aesthetic','Dental Clinic & Orthodontics','Psikologi & konseling']},
        {id:'travel-tourism',name:'Travel & Tourism',types:['Travel Agent & Tour Operator','Umrah & Haji','Adventure & Outdoor Tour']},
        {id:'wedding-event',name:'Wedding & Event',types:['Wedding Organizer','Event Organizer','Catering & Wedding Cake']},
        {id:'sports-fitness',name:'Sports & Fitness',types:['Personal Trainer','Gym & Fitness Center','Pilates Studio']},
        {id:'interior-architecture',name:'Interior & Architecture',types:['Interior Design Studio','Architecture & Building Design','Furniture & Custom Furniture']},
        {id:'home-services',name:'Home Services',types:['Home Renovation & Repair','Laundry','Home Cleaning & Deep Cleaning']},
        {id:'photography-creative-studio',name:'Photography & Creative Studio',types:['Product Photography & Videography','Motion Graphics & 3D Studio','UGC & Content Creator Studio']},
        {id:'pet-animal-services',name:'Pet & Animal Services',types:['Pet Shop','Pet Training','Animal Care']},
        {id:'transportation-logistics',name:'Transportation & Logistics',types:['Logistics Company','Delivery Service','Moving Company']},
        {id:'agriculture-farming',name:'Agriculture & Farming',types:['Agribisnis & Perdagangan Komoditas Pertanian','Perlengkapan & Peralatan Pertanian','Peternakan & Budidaya Hewan']},
        {id:'nonprofit-community',name:'Nonprofit & Community',types:['Foundation','Social Organization','Volunteer Group']},
        {id:'technology-it',name:'Technology & IT',types:['Software House','Data Analytics','Hardware & Computer Networking']}
    ];
    const styles = ['Modern','Classic','Elegant','Minimalist','Vintage','Professional','Luxury','Playful & Colorful','Bold','Futuristic','Artistic','Friendly','Premium Minimal'];
    const selectedCategories = new Set();
    const selectedTypes = new Set();
    let selectedStyle = '';

    const makeOption = (label, value, checked, onChange, className='') => {
        const labelNode = document.createElement('label');
        labelNode.className = `webia-filter-chip ${className}`.trim();
        const input = document.createElement('input');
        input.type = 'checkbox'; input.value = value; input.checked = checked;
        const text = document.createElement('span'); text.textContent = label;
        labelNode.append(input, text);
        input.addEventListener('change', () => onChange(input.checked));
        return labelNode;
    };

    const renderCategories = () => {
        if (!categoryRoot) return;
        categoryRoot.replaceChildren();
        categories.forEach(category => categoryRoot.appendChild(makeOption(category.name, category.id, selectedCategories.has(category.id), checked => {
            if (checked) selectedCategories.add(category.id); else {
                selectedCategories.delete(category.id);
                category.types.forEach(type => selectedTypes.delete(type));
            }
            renderCategories(); renderSubcategories(); applyFilters();
        })));
    };

    const renderSubcategories = () => {
        if (!subcategoryRoot) return;
        subcategoryRoot.replaceChildren();
        const selected = categories.filter(category => selectedCategories.has(category.id));
        if (!selected.length) {
            const hint = document.createElement('p'); hint.className='webia-filter-hint'; hint.textContent='Pilih kategori bisnis terlebih dahulu.'; subcategoryRoot.appendChild(hint);
        } else {
            selected.forEach(category => {
                const group = document.createElement('div'); group.className='webia-subcategory-group';
                const heading = document.createElement('h4'); heading.textContent=category.name; group.appendChild(heading);
                const chips = document.createElement('div'); chips.className='webia-subcategory-chips';
                category.types.forEach(type => chips.appendChild(makeOption(type,type,selectedTypes.has(type),checked => {
                    if (checked && selectedTypes.size >= 3) { window.alert('Maksimal 3 tipe bisnis, ya.'); renderSubcategories(); return; }
                    if (checked) selectedTypes.add(type); else selectedTypes.delete(type);
                    renderSubcategories(); applyFilters();
                })));
                group.appendChild(chips);
                subcategoryRoot.appendChild(group);
            });
        }
        if (typeCount) typeCount.textContent = `${selectedTypes.size}/3 dipilih`;
    };

    const renderStyles = () => {
        if (!styleRoot) return;
        styleRoot.replaceChildren();
        styles.forEach(style => {
            const label = document.createElement('label'); label.className='webia-filter-chip webia-style-chip' + (selectedStyle===style?' is-selected':'');
            const input=document.createElement('input'); input.type='radio'; input.name='webia-design-style'; input.value=style; input.checked=selectedStyle===style;
            const text=document.createElement('span'); text.textContent=style; label.append(input,text);
            input.addEventListener('change',()=>{selectedStyle=style;renderStyles();applyFilters();}); styleRoot.appendChild(label);
        });
    };

    const applyFilters = () => {
        const term=(search?.value||'').trim().toLowerCase(); let visible=0;
        cards.forEach(card=>{
            const category=card.dataset.category||'';
            let businessTypes=[]; try { businessTypes=JSON.parse(card.dataset.businessTypes||'[]'); } catch (_) { businessTypes=[]; }
            const categoryMatch=selectedCategories.size===0||selectedCategories.has(category);
            const typeMatch=selectedTypes.size===0||businessTypes.some(type=>selectedTypes.has(type));
            const styleMatch=!selectedStyle||(card.dataset.designStyle||'Modern')===selectedStyle;
            const searchMatch=!term||(card.dataset.search||'').toLowerCase().includes(term);
            const show=categoryMatch&&typeMatch&&styleMatch&&searchMatch;
            card.hidden=!show; if(show) visible++;
        });
        if(count) count.textContent=`Menampilkan ${visible} template`;
        if(empty) empty.hidden=visible!==0;
        if(summary){
            const catNames=categories.filter(c=>selectedCategories.has(c.id)).map(c=>c.name);
            const parts=[]; if(catNames.length)parts.push(`${catNames.length} kategori`); if(selectedTypes.size)parts.push(`${selectedTypes.size} tipe bisnis`); if(selectedStyle)parts.push(`Gaya ${selectedStyle}`); if(term)parts.push('pencarian aktif');
            summary.textContent=parts.length?`Filter aktif: ${parts.join(' · ')}`:'Belum ada filter yang dipilih.';
        }
    };

    const resetFilters = () => {
        selectedCategories.clear(); selectedTypes.clear(); selectedStyle=''; if(search)search.value='';
        renderCategories(); renderSubcategories(); renderStyles(); applyFilters();
    };
    search?.addEventListener('input',applyFilters);
    reset?.addEventListener('click',resetFilters);
    renderCategories(); renderSubcategories(); renderStyles(); applyFilters();

        /* WEBIA: per-card Explore Template gallery. Modal stays closed until clicked. */
    const escapeHtml = (value = '') => String(value).replace(/[&<>"']/g, (char) => ({
        '&': '&amp;', '<': '&lt;', '>': '&gt;', '"': '&quot;', "'": '&#39;'
    }[char]));


const themes = {
    fnb: {
        label: 'Food & Beverage',
        accent: '#d98b62',
        accent2: '#f3c7a8',
        ink: '#443126',
        soft: '#fff3e9',
        eyebrow: 'MADE WITH LOVE, SERVED FRESH',
        headline: 'A little taste of something special.',
        intro: 'Cerita, menu, dan pengalaman yang membuat pelanggan ingin kembali.',
        nav: ['Home', 'Our Menu', 'Our Story', 'Contact'],
        sections: ['Menu favorit', 'Cerita dari dapur', 'Kata pelanggan']
    },

    beauty: {
        label: 'Beauty & Lifestyle',
        accent: '#d979a6',
        accent2: '#f2b9d1',
        ink: '#482c3c',
        soft: '#fff0f6',
        eyebrow: 'YOUR BEAUTY, YOUR MOMENT',
        headline: 'Feel beautiful in your own way.',
        intro: 'Ruang untuk merawat diri, menemukan gaya, dan merasa percaya diri.',
        nav: ['Home', 'Treatments', 'Our Studio', 'Booking'],
        sections: ['Signature treatments', 'Meet our experts', 'Beauty stories']
    },

    'bold-pastel-beauty': {
        label: 'Skincare & Beauty Treatment',
        accent: '#d979a6',
        accent2: '#f7c8df',
        ink: '#482c3c',
        soft: '#fff0f6',
        eyebrow: 'YOUR BEAUTY, YOUR POWER',
        headline: 'Beauty is number one.',
        intro: 'Discover your beauty with fresh, modern skincare and beauty treatments designed to make you feel confident.',
        nav: ['Home', 'Treatments', 'Our Products', 'Book Now'],
        sections: [
            'Your Signature Beauty Treatments',
            'Discover Your Skincare Essentials',
            'Real Beauty, Real Stories'
        ]
    },

    automotive: {
        label: 'Automotive',
        accent: '#f28a4b',
        accent2: '#ffc28e',
        ink: '#252a35',
        soft: '#fff1e7',
        eyebrow: 'BUILT FOR THE ROAD AHEAD',
        headline: 'Performance you can trust.',
        intro: 'Layanan profesional, pengerjaan presisi, dan perawatan kendaraan yang bisa diandalkan.',
        nav: ['Home', 'Services', 'Workshop', 'Book Service'],
        sections: ['Layanan unggulan', 'Workshop showcase', 'Customer reviews']
    },

    company: {
        label: 'Company & Services',
        accent: '#638bc4',
        accent2: '#b7d3f5',
        ink: '#24354d',
        soft: '#edf5ff',
        eyebrow: 'BUILT FOR WHAT COMES NEXT',
        headline: 'Turning vision into real impact.',
        intro: 'Partner profesional untuk membantu bisnis bergerak lebih jauh.',
        nav: ['Home', 'About Us', 'Solutions', 'Contact'],
        sections: ['Tentang perusahaan', 'Solusi dan layanan', 'Klien & partner']
    },

    property: {
        label: 'Property & Real Estate',
        accent: '#779d7e',
        accent2: '#c7e1c8',
        ink: '#2c4032',
        soft: '#f0f8ef',
        eyebrow: 'FIND A PLACE TO BELONG',
        headline: 'Spaces made for living.',
        intro: 'Jelajahi properti pilihan dan temukan ruang yang terasa seperti rumah.',
        nav: ['Home', 'Properties', 'Our Projects', 'Contact Agent'],
        sections: ['Properti unggulan', 'Proyek pilihan', 'Hubungi agen']
    },

    education: {
        label: 'Education',
        accent: '#6f83cf',
        accent2: '#c8d2ff',
        ink: '#29355c',
        soft: '#f0f2ff',
        eyebrow: 'LEARN WITHOUT LIMITS',
        headline: 'Grow your potential.',
        intro: 'Belajar dengan cara yang lebih terarah, fleksibel, dan menyenangkan.',
        nav: ['Home', 'Programs', 'Mentors', 'Register'],
        sections: ['Program belajar', 'Mentor pilihan', 'Cerita alumni']
    },

    'professional-service': {
        label: 'Professional Service',
        accent: '#7289a7',
        accent2: '#c9d7e8',
        ink: '#2d3c51',
        soft: '#f0f4f9',
        eyebrow: 'EXPERTISE YOU CAN TRUST',
        headline: 'Clarity for every next move.',
        intro: 'Pendampingan ahli dengan solusi yang dirancang untuk kebutuhanmu.',
        nav: ['Home', 'Expertise', 'Our Approach', 'Consult'],
        sections: ['Bidang layanan', 'Cara kami bekerja', 'Insight & artikel']
    },

    'personal-brand': {
        label: 'Personal Brand',
        accent: '#a27bc8',
        accent2: '#e1c9f6',
        ink: '#403052',
        soft: '#f8f0ff',
        eyebrow: 'MAKE YOUR MARK',
        headline: 'Your story. Your impact.',
        intro: 'Perkenalkan karya, pengalaman, dan karakter personal brand dalam satu tempat.',
        nav: ['Home', 'My Story', 'Selected Work', 'Contact'],
        sections: ['Tentang saya', 'Karya pilihan', 'Kolaborasi']
    },

    retail: {
        label: 'Retail',
        accent: '#c68c42',
        accent2: '#f5d7a6',
        ink: '#45331e',
        soft: '#fff8e9',
        eyebrow: 'DISCOVER SOMETHING NEW',
        headline: 'Your next favorite find.',
        intro: 'Jelajahi koleksi pilihan dan temukan produk yang cocok untukmu.',
        nav: ['Home', 'Shop', 'Best Sellers', 'Contact'],
        sections: ['Koleksi terbaru', 'Produk terlaris', 'Ulasan pelanggan']
    },

    healthcare: {
        label: 'Healthcare',
        accent: '#429c9a',
        accent2: '#b8e8df',
        ink: '#214344',
        soft: '#eafaf7',
        eyebrow: 'CARE THAT MATTERS',
        headline: 'Your health comes first.',
        intro: 'Informasi layanan kesehatan dan akses konsultasi yang lebih mudah.',
        nav: ['Home', 'Our Services', 'Our Doctors', 'Book a Visit'],
        sections: ['Layanan kesehatan', 'Tim profesional', 'Informasi & konsultasi']
    }
};

    const modal = document.createElement('div');
    modal.className = 'webia-explore-modal';
    modal.id = 'webia-explore-modal';
    modal.hidden = true;
    modal.setAttribute('role', 'dialog');
    modal.setAttribute('aria-modal', 'true');
    modal.setAttribute('aria-labelledby', 'webia-explore-title');
    modal.innerHTML = `
        <button type="button" class="webia-explore-backdrop" aria-label="Tutup preview" data-explore-close></button>
        <section class="webia-explore-dialog" role="document">
            <header class="webia-explore-header">
                <div class="webia-explore-heading"><span class="webia-explore-kicker">✦ WEBIA TEMPLATE EXPLORER</span><h2 id="webia-explore-title">Preview website</h2><p>Gambaran halaman dari bagian atas sampai footer</p></div>
                <button type="button" class="webia-explore-close" aria-label="Tutup preview" data-explore-close>×</button>
            </header>
            <div class="webia-explore-scroll" id="webia-explore-scroll"></div>
            <footer class="webia-explore-footer"><span>Visual konsep · Detail final bisa disesuaikan</span><a href="/webia#konsultasi-website" class="webia-explore-consult">Diskusikan template ini <b>↗</b></a></footer>
        </section>`;
    document.body.appendChild(modal);

    const previewScroll = modal.querySelector('#webia-explore-scroll');
    let lastTrigger = null;
    let previousOverflow = '';

    const buildPageGallery = (card) => {
        const name = card.querySelector('.webia-template-meta h3')?.textContent.trim() || 'Website Concept';
        const category = card.dataset.category || 'company';
        const theme = themes[category] || themes.company;
        const description = card.querySelector('.webia-template-meta p')?.textContent.trim() || 'Website yang disesuaikan dengan kebutuhan bisnis.';
        let previewImages = [];
        try {
            previewImages = JSON.parse(card.dataset.previewImages || '[]');
        } catch (error) {
            previewImages = [];
        }
        modal.querySelector('#webia-explore-title').textContent = `Explore ${name}`;
        modal.querySelector('.webia-explore-consult').href = `/webia#konsultasi-website`;

        // When PNG captures exist in the template folder, show the actual captures in order.
        if (Array.isArray(previewImages) && previewImages.length) {
            previewScroll.innerHTML = `
                <div class="webia-capture-gallery" style="--explore-accent:${theme.accent};--explore-soft:${theme.soft}">
                    <div class="webia-capture-gallery-intro">
                        <span>WEBIA TEMPLATE GALLERY</span>
                        <h3>${escapeHtml(name)}</h3>
                        <p>${escapeHtml(theme.label)} · ${previewImages.length} gambar preview</p>
                        <small>Scroll ke bawah untuk melihat tampilan halaman dari bagian atas hingga footer.</small>
                    </div>
                    ${previewImages.map((src, index) => `
                        <figure class="webia-real-capture">
                            <figcaption><span>PREVIEW ${String(index + 1).padStart(2, '0')}</span><span>${escapeHtml(name)}</span></figcaption>
                            <img src="${escapeHtml(src)}" alt="Preview ${escapeHtml(name)} bagian ${index + 1}" loading="${index < 2 ? 'eager' : 'lazy'}">
                        </figure>
                    `).join('')}
                </div>`;
            return;
        }

        const nav = theme.nav.map((item, i) => `<span class="${i === 0 ? 'is-current' : ''}">${escapeHtml(item)}</span>`).join('');
        const sectionCards = theme.sections.map((item, i) => `<article class="capture-service-card"><span>0${i + 1}</span><i>${['✦', '◇', '✧'][i]}</i><h4>${escapeHtml(item)}</h4><p>Informasi ringkas dengan visual yang konsisten dan mudah dipahami pengunjung.</p></article>`).join('');
        previewScroll.innerHTML = `
        <div class="webia-page-gallery" style="--explore-accent:${theme.accent};--explore-accent-2:${theme.accent2};--explore-ink:${theme.ink};--explore-soft:${theme.soft}">
          <div class="webia-capture-intro"><span class="webia-capture-number">01 — 04</span><div><b>${escapeHtml(name)}</b><small>${escapeHtml(theme.label)} · Full-page preview</small></div><span class="webia-capture-scroll-hint">Scroll untuk menjelajah ↓</span></div>
          <article class="webia-page-capture capture-cover">
            <div class="capture-browser-bar"><span></span><span></span><span></span><small>${escapeHtml(name.toLowerCase().replace(/\s+/g,''))}.webia</small></div>
            <div class="capture-topbar"><span>✦ ${escapeHtml(name)}</span><span>Welcome to our website</span><span>Instagram&nbsp; · &nbsp;Contact</span></div>
            <nav class="capture-navbar"><strong>${escapeHtml(name)}<i>✦</i></strong><div>${nav}</div><b>☰</b></nav>
            <section class="capture-hero"><div class="capture-hero-copy"><small>${escapeHtml(theme.eyebrow)}</small><h3>${escapeHtml(theme.headline)}</h3><p>${escapeHtml(description)}</p><span class="capture-hero-button">Discover more ↗</span><div class="capture-proof"><span>✦ Thoughtful design</span><span>✦ Made for your brand</span></div></div><div class="capture-hero-visual"><div class="capture-hero-orb">${escapeHtml(name.split(' ').map(x=>x[0]).join('').slice(0,3).toUpperCase())}</div><div class="capture-hero-card"><small>FEATURED</small><b>${escapeHtml(theme.sections[0])}</b><span></span><span></span></div></div></section>
            <div class="capture-page-label"><span>CAPTURE 01</span><b>Topbar · Navbar · Hero section</b></div>
          </article>
          <article class="webia-page-capture capture-content">
            <div class="capture-section-heading"><small>WELCOME TO ${escapeHtml(name.toUpperCase())}</small><h3>A website that tells your story beautifully.</h3><p>${escapeHtml(theme.intro)}</p></div>
            <div class="capture-service-grid">${sectionCards}</div>
            <div class="capture-page-label"><span>CAPTURE 02</span><b>Intro · Layanan / fitur utama</b></div>
          </article>
          <article class="webia-page-capture capture-showcase">
            <div class="capture-showcase-copy"><small>OUR HIGHLIGHTS</small><h3>${escapeHtml(theme.sections[1])}</h3><p>Area untuk menampilkan produk, layanan, portofolio, proyek, atau foto terbaik sesuai kategori bisnis.</p><span class="capture-hero-button">Explore collection ↗</span></div>
            <div class="capture-showcase-grid"><div class="showcase-tile tile-one"><span>01</span><b>${escapeHtml(theme.sections[0])}</b></div><div class="showcase-tile tile-two"><span>02</span><b>${escapeHtml(theme.sections[1])}</b></div><div class="showcase-tile tile-three"><span>03</span><b>${escapeHtml(theme.sections[2])}</b></div></div>
            <div class="capture-page-label"><span>CAPTURE 03</span><b>Showcase · Galeri / portfolio</b></div>
          </article>
          <article class="webia-page-capture capture-ending">
            <section class="capture-quote"><small>THE WORDS THAT MATTER</small><h3>“Pengalaman yang berkesan dimulai dari detail yang tepat.”</h3><p>— Cerita pelanggan</p></section>
            <section class="capture-cta"><small>LET'S BUILD SOMETHING GREAT</small><h3>Ready to make your next move?</h3><p>Diskusikan kebutuhan dan gaya website yang paling cocok untuk bisnismu.</p><span>Let's talk ↗</span></section>
            <footer class="capture-real-footer"><strong>${escapeHtml(name)} ✦</strong><p>Website concept preview by WEBIA · by D-KREASI</p><div>${nav}</div><small>© ${new Date().getFullYear()} ${escapeHtml(name)}. All rights reserved.</small></footer>
            <div class="capture-page-label"><span>CAPTURE 04</span><b>Testimoni · CTA · Footer</b></div>
          </article>
        </div>`;
        modal.querySelector('#webia-explore-title').textContent = `Explore ${name}`;
        modal.querySelector('.webia-explore-consult').href = `/webia#konsultasi-website`;
    };

    const openGallery = (card, trigger) => {
        lastTrigger = trigger;
        buildPageGallery(card);
        modal.hidden = false;
        document.body.classList.add('webia-explore-open');
        previousOverflow = document.body.style.overflow;
        document.body.style.overflow = 'hidden';
        previewScroll.scrollTop = 0;
        modal.querySelector('.webia-explore-close')?.focus();
    };
    const closeGallery = () => {
        if (modal.hidden) return;
        modal.hidden = true;
        document.body.classList.remove('webia-explore-open');
        document.body.style.overflow = previousOverflow;
        lastTrigger?.focus();
    };

    // Delegate clicks so buttons already present in Blade also receive the click handler.
    grid.addEventListener('click', (event) => {
        const button = event.target.closest('.webia-explore-trigger');
        if (!button || !grid.contains(button)) return;
        event.preventDefault();
        event.stopPropagation();
        const card = button.closest('.webia-gallery-card');
        if (card) {
            const templateUrl = card.dataset.templateUrl;
            if (templateUrl) {
                window.location.href = templateUrl;
                return;
            }
            openGallery(card, button);
        }
    });

    modal.addEventListener('click', (event) => {
        if (event.target.closest('[data-explore-close]')) closeGallery();
    });
    document.addEventListener('keydown', (event) => {
        if (event.key === 'Escape' && !modal.hidden) closeGallery();
    });

    /* Respect any category query, but never open the modal automatically. */
    const params = new URLSearchParams(window.location.search);
    const requestedCategory = params.get('category');
    if (requestedCategory && filters.some((button) => button.dataset.category === requestedCategory)) {
        filters.find((button) => button.dataset.category === requestedCategory)?.click();
    } else {
        applyFilters();
    }

    /* ---------- Dialog pilih paket: data paket nyata, lanjut ke halaman Buat Pesanan ---------- */
    const packagePicker = document.getElementById('webia-package-picker');
    const packageOptionsRoot = packagePicker?.querySelector('.webia-package-options');
    const createBaseUrl = packagePicker?.dataset.createUrl || '/orders/create';
    let activeTemplate = null;

    const openDialog = (dialog) => { if (dialog && !dialog.open) dialog.showModal(); };
    const closeDialog = (dialog) => { if (dialog?.open) dialog.close(); };

    cards.forEach((card) => {
        const addButton = card.querySelector('[data-template-add]');
        addButton?.addEventListener('click', () => {
            activeTemplate = {
                id: card.dataset.templateId,
                name: card.querySelector('.webia-template-meta h3')?.textContent.trim() || 'Template Website',
            };
            if (!activeTemplate.id) return;
            document.getElementById('webia-package-template-name').textContent = `Template: ${activeTemplate.name}`;
            packageOptionsRoot?.querySelectorAll('[data-package-slug]').forEach((link) => {
                const url = new URL(createBaseUrl, window.location.origin);
                url.searchParams.set('template', activeTemplate.id);
                url.searchParams.set('package', link.dataset.packageSlug);
                link.href = url.toString();
            });
            openDialog(packagePicker);
        });
    });

    document.querySelectorAll('[data-close-dialog]').forEach((button) => {
        button.addEventListener('click', () => closeDialog(button.closest('dialog')));
    });
    packagePicker?.addEventListener('click', (event) => { if (event.target === packagePicker) closeDialog(packagePicker); });

});
