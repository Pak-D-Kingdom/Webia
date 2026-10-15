/* WEBIA template gallery: client-side category and search filters */
document.addEventListener('DOMContentLoaded', () => {
    const grid = document.getElementById('webia-gallery-grid');
    if (!grid) return;

    const cards = Array.from(grid.querySelectorAll('.webia-gallery-card'));
    const filters = Array.from(document.querySelectorAll('.webia-gallery-filters [data-category]'));
    const search = document.getElementById('webia-template-search');
    const count = document.getElementById('webia-template-count');
    const empty = document.getElementById('webia-gallery-empty');
    const reset = document.getElementById('webia-gallery-reset');
    let activeCategory = 'all';

    const applyFilters = () => {
        const term = (search?.value || '').trim().toLowerCase();
        let visible = 0;

        cards.forEach((card) => {
            const categoryMatch = activeCategory === 'all' || card.dataset.category === activeCategory;
            const searchMatch = !term || (card.dataset.search || '').includes(term);
            const show = categoryMatch && searchMatch;
            card.hidden = !show;
            if (show) visible += 1;
        });

        if (count) {
            count.textContent = `Menampilkan ${visible} inspirasi`;
        }
        if (empty) {
            empty.hidden = visible !== 0;
        }
    };

    filters.forEach((button) => {
        button.addEventListener('click', () => {
            activeCategory = button.dataset.category || 'all';
            filters.forEach((filter) => {
                const isActive = filter === button;
                filter.classList.toggle('is-active', isActive);
                filter.setAttribute('aria-pressed', String(isActive));
            });
            applyFilters();
        });
    });

    search?.addEventListener('input', applyFilters);

    reset?.addEventListener('click', () => {
        activeCategory = 'all';
        if (search) search.value = '';
        filters.forEach((filter) => {
            const isActive = filter.dataset.category === 'all';
            filter.classList.toggle('is-active', isActive);
            filter.setAttribute('aria-pressed', String(isActive));
        });
        applyFilters();
    });

    /* WEBIA: per-card Explore Template gallery. Modal stays closed until clicked. */
    const escapeHtml = (value = '') => String(value).replace(/[&<>"']/g, (char) => ({
        '&': '&amp;', '<': '&lt;', '>': '&gt;', '"': '&quot;', "'": '&#39;'
    }[char]));

    const themes = {
        fnb: { label: 'Food & Beverage', accent: '#d98b62', accent2: '#f3c7a8', ink: '#443126', soft: '#fff3e9', eyebrow: 'MADE WITH LOVE, SERVED FRESH', headline: 'A little taste of something special.', intro: 'Cerita, menu, dan pengalaman yang membuat pelanggan ingin kembali.', nav: ['Home', 'Our Menu', 'Our Story', 'Contact'], sections: ['Menu favorit', 'Cerita dari dapur', 'Kata pelanggan'] },
        beauty: { label: 'Beauty & Lifestyle', accent: '#d979a6', accent2: '#f2b9d1', ink: '#482c3c', soft: '#fff0f6', eyebrow: 'YOUR BEAUTY, YOUR MOMENT', headline: 'Feel beautiful in your own way.', intro: 'Ruang untuk merawat diri, menemukan gaya, dan merasa percaya diri.', nav: ['Home', 'Treatments', 'Our Studio', 'Booking'], sections: ['Signature treatments', 'Meet our experts', 'Beauty stories'] },
        automotive: { label: 'Automotive', accent: '#f28a4b', accent2: '#ffc28e', ink: '#252a35', soft: '#fff1e7', eyebrow: 'BUILT FOR THE ROAD AHEAD', headline: 'Performance you can trust.', intro: 'Layanan profesional, pengerjaan presisi, dan perawatan kendaraan yang bisa diandalkan.', nav: ['Home', 'Services', 'Workshop', 'Book Service'], sections: ['Layanan unggulan', 'Workshop showcase', 'Customer reviews'] },
        company: { label: 'Company & Services', accent: '#638bc4', accent2: '#b7d3f5', ink: '#24354d', soft: '#edf5ff', eyebrow: 'BUILT FOR WHAT COMES NEXT', headline: 'Turning vision into real impact.', intro: 'Partner profesional untuk membantu bisnis bergerak lebih jauh.', nav: ['Home', 'About Us', 'Solutions', 'Contact'], sections: ['Tentang perusahaan', 'Solusi dan layanan', 'Klien & partner'] },
        property: { label: 'Property & Real Estate', accent: '#779d7e', accent2: '#c7e1c8', ink: '#2c4032', soft: '#f0f8ef', eyebrow: 'FIND A PLACE TO BELONG', headline: 'Spaces made for living.', intro: 'Jelajahi properti pilihan dan temukan ruang yang terasa seperti rumah.', nav: ['Home', 'Properties', 'Our Projects', 'Contact Agent'], sections: ['Properti unggulan', 'Proyek pilihan', 'Hubungi agen'] },
        education: { label: 'Education', accent: '#6f83cf', accent2: '#c8d2ff', ink: '#29355c', soft: '#f0f2ff', eyebrow: 'LEARN WITHOUT LIMITS', headline: 'Grow your potential.', intro: 'Belajar dengan cara yang lebih terarah, fleksibel, dan menyenangkan.', nav: ['Home', 'Programs', 'Mentors', 'Register'], sections: ['Program belajar', 'Mentor pilihan', 'Cerita alumni'] },
        'professional-service': { label: 'Professional Service', accent: '#7289a7', accent2: '#c9d7e8', ink: '#2d3c51', soft: '#f0f4f9', eyebrow: 'EXPERTISE YOU CAN TRUST', headline: 'Clarity for every next move.', intro: 'Pendampingan ahli dengan solusi yang dirancang untuk kebutuhanmu.', nav: ['Home', 'Expertise', 'Our Approach', 'Consult'], sections: ['Bidang layanan', 'Cara kami bekerja', 'Insight & artikel'] },
        'personal-brand': { label: 'Personal Brand', accent: '#a27bc8', accent2: '#e1c9f6', ink: '#403052', soft: '#f8f0ff', eyebrow: 'MAKE YOUR MARK', headline: 'Your story. Your impact.', intro: 'Perkenalkan karya, pengalaman, dan karakter personal brand dalam satu tempat.', nav: ['Home', 'My Story', 'Selected Work', 'Contact'], sections: ['Tentang saya', 'Karya pilihan', 'Kolaborasi'] },
        retail: { label: 'Retail', accent: '#c68c42', accent2: '#f5d7a6', ink: '#45331e', soft: '#fff8e9', eyebrow: 'DISCOVER SOMETHING NEW', headline: 'Your next favorite find.', intro: 'Jelajahi koleksi pilihan dan temukan produk yang cocok untukmu.', nav: ['Home', 'Shop', 'Best Sellers', 'Contact'], sections: ['Koleksi terbaru', 'Produk terlaris', 'Ulasan pelanggan'] },
        healthcare: { label: 'Healthcare', accent: '#429c9a', accent2: '#b8e8df', ink: '#214344', soft: '#eafaf7', eyebrow: 'CARE THAT MATTERS', headline: 'Your health comes first.', intro: 'Informasi layanan kesehatan dan akses konsultasi yang lebih mudah.', nav: ['Home', 'Our Services', 'Our Doctors', 'Book a Visit'], sections: ['Layanan kesehatan', 'Tim profesional', 'Informasi & konsultasi'] }
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
        if (card) openGallery(card, button);
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
});
