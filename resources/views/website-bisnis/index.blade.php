@extends('website-bisnis.layouts.app')

@section('title', 'Website Bisnis — D-KREASI')
@section('meta_description',
    'Temukan paket pembuatan website bisnis dari D-KREASI. Website responsif, AI Chatbot, SEO,
    dan solusi digital sesuai kebutuhan bisnis Anda.')

@section('content')

    {{-- HERO WEBSITE BISNIS --}}
    <section class="website-hero" id="website-beranda">
        <div class="website-hero-decoration website-decoration-one"></div>
        <div class="website-hero-decoration website-decoration-two"></div>

        <div class="website-hero-inner">
            <div class="website-hero-copy">
                <span class="website-eyebrow">
                    ✦ DIGITAL SOLUTIONS FOR YOUR BUSINESS
                </span>

                <h1>
                    Bisnismu Punya Cerita.
                    <span>Website Kami Bantu Wujudkan!</span>
                </h1>

                <p>
                    Bangun identitas digital yang profesional dengan website
                    sesuai kebutuhan bisnis, dilengkapi AI Chatbot dan pilihan
                    fitur yang fleksibel.
                </p>

                <div class="website-hero-actions">
                    <a href="#paket-website" class="website-button website-button-primary">
                        Lihat Paket <span>↗</span>
                    </a>

                    <a href="#keunggulan-website" class="website-button website-button-secondary">
                        Kenali Layanannya
                    </a>
                </div>

                <div class="website-hero-note">
                    <span>✦</span> Satu platform untuk berbagai kebutuhan bisnis.
                </div>
            </div>

            <div class="website-hero-visual">
                <div class="website-floating-chip chip-top">✦ Responsive Design</div>

                <div class="website-browser">
                    <div class="website-browser-bar">
                        <span></span><span></span><span></span>
                        <div>website-bisnis.id</div>
                    </div>

                    <div class="website-browser-content">
                        <div class="website-demo-nav">
                            <div class="website-demo-logo">BRAND<span>.</span></div>
                            <div class="website-demo-links">
                                <i></i><i></i><i></i>
                            </div>
                        </div>

                        <div class="website-demo-hero">
                            <span>YOUR BUSINESS, YOUR STORY</span>
                            <div class="website-demo-title"></div>
                            <div class="website-demo-title short"></div>
                            <div class="website-demo-description"></div>
                            <div class="website-demo-description short"></div>
                            <div class="website-demo-button"></div>
                        </div>

                        <div class="website-demo-cards">
                            <div></div>
                            <div></div>
                            <div></div>
                        </div>
                    </div>
                </div>

                <div class="website-floating-chip chip-bottom">
                    <span>✧</span> AI Chatbot Ready
                </div>

                <div class="website-orbit-star">✳</div>
            </div>
        </div>
    </section>



    {{-- KATEGORI WEBSITE --}}
    <section class="webia-discovery webia-categories" id="kategori-website">
        <div class="webia-discovery-heading">
            <span class="website-eyebrow">FIND YOUR BUSINESS STYLE</span>
            <h2>Mulai dari <span>Kategori Bisnismu.</span></h2>
            <p>Pilih bidang usaha, lalu temukan inspirasi website yang paling cocok dengan cerita brand-mu.</p>
        </div>

        <div class="webia-category-grid">
            {{-- 01. F&B --}}
            <a class="webia-category-card category-fnb" href="{{ route('webia.collections', ['category' => 'fnb']) }}">
                <span class="webia-category-symbol">☕</span>
                <span class="webia-category-count">01 · F&B</span>
                <strong>F&B</strong>
                <small>Restaurant, cafe, catering, bakery, food product</small>
                <span class="webia-category-arrow">↗</span>
            </a>

            {{-- 02. BEAUTY --}}
            <a class="webia-category-card category-beauty"
                href="{{ route('webia.collections', ['category' => 'beauty']) }}">
                <span class="webia-category-symbol">✿</span>
                <span class="webia-category-count">02 · BEAUTY</span>
                <strong>Beauty</strong>
                <small>Salon, barbershop, beauty clinic, skincare, makeup artist</small>
                <span class="webia-category-arrow">↗</span>
            </a>

            {{-- 03. AUTOMOTIVE --}}
            <a class="webia-category-card category-auto"
                href="{{ route('webia.collections', ['category' => 'automotive']) }}">
                <span class="webia-category-symbol">✦</span>
                <span class="webia-category-count">03 · AUTOMOTIVE</span>
                <strong>Automotive</strong>
                <small>Bengkel, car wash, dealer, body repair</small>
                <span class="webia-category-arrow">↗</span>
            </a>

            {{-- 04. COMPANY --}}
            <a class="webia-category-card category-company"
                href="{{ route('webia.collections', ['category' => 'company']) }}">
                <span class="webia-category-symbol">▧</span>
                <span class="webia-category-count">04 · COMPANY</span>
                <strong>Company</strong>
                <small>Company profile, contractor, distributor, manufacturer, agency</small>
                <span class="webia-category-arrow">↗</span>
            </a>

            {{-- 05. PROPERTY --}}
            <a class="webia-category-card category-property"
                href="{{ route('webia.collections', ['category' => 'property']) }}">
                <span class="webia-category-symbol">⌂</span>
                <span class="webia-category-count">05 · PROPERTY</span>
                <strong>Property</strong>
                <small>Developer, property agent, real estate, villa</small>
                <span class="webia-category-arrow">↗</span>
            </a>

            {{-- 06. EDUCATION --}}
            <a class="webia-category-card category-education"
                href="{{ route('webia.collections', ['category' => 'education']) }}">
                <span class="webia-category-symbol">✎</span>
                <span class="webia-category-count">06 · EDUCATION</span>
                <strong>Education</strong>
                <small>School, course, tutor, training, online course</small>
                <span class="webia-category-arrow">↗</span>
            </a>

            {{-- 07. PROFESSIONAL SERVICE --}}
            <a class="webia-category-card category-professional"
                href="{{ route('webia.collections', ['category' => 'professional-service']) }}">
                <span class="webia-category-symbol">◇</span>
                <span class="webia-category-count">07 · PROFESSIONAL SERVICE</span>
                <strong>Professional Service</strong>
                <small>Consultant, lawyer, accountant, freelancer</small>
                <span class="webia-category-arrow">↗</span>
            </a>

            {{-- 08. PERSONAL BRAND --}}
            <a class="webia-category-card category-personal"
                href="{{ route('webia.collections', ['category' => 'personal-brand']) }}">
                <span class="webia-category-symbol">✧</span>
                <span class="webia-category-count">08 · PERSONAL BRAND</span>
                <strong>Personal Brand</strong>
                <small>Creator, influencer, portfolio</small>
                <span class="webia-category-arrow">↗</span>
            </a>

            {{-- 09. RETAIL --}}
            <a class="webia-category-card category-retail"
                href="{{ route('webia.collections', ['category' => 'retail']) }}">
                <span class="webia-category-symbol">▣</span>
                <span class="webia-category-count">09 · RETAIL</span>
                <strong>Retail</strong>
                <small>Store, distributor, supplier</small>
                <span class="webia-category-arrow">↗</span>
            </a>

            {{-- 10. HEALTHCARE --}}
            <a class="webia-category-card category-healthcare"
                href="{{ route('webia.collections', ['category' => 'healthcare']) }}">
                <span class="webia-category-symbol">✚</span>
                <span class="webia-category-count">10 · HEALTHCARE</span>
                <strong>Healthcare</strong>
                <small>Clinic, pharmacy, medical practice</small>
                <span class="webia-category-arrow">↗</span>
            </a>
        </div>

        <div class="webia-discovery-footer">
            <span>Belum menemukan kategori yang pas? Masih banyak kemungkinan ✨</span>
            <a class="website-button website-button-secondary" href="{{ route('webia.collections') }}">Jelajahi Semua
                Kategori <span>↗</span></a>
        </div>
    </section>

    {{-- TEMPLATE PILIHAN --}}
    <section class="webia-discovery webia-featured-templates" id="koleksi-template">
        <div class="webia-discovery-heading webia-discovery-heading-row">
            <div>
                <span class="website-eyebrow">A LITTLE PREVIEW OF OUR UNIVERSE</span>
                <h2>Template yang Bikin <span>Brand Makin Bersinar.</span></h2>
                <p>Intip beberapa gaya desain. Temukan favoritmu di galeri koleksi WEBIA.</p>
            </div>
            <a class="webia-text-link" href="{{ route('webia.collections') }}">Lihat Koleksi Kami <span>↗</span></a>
        </div>
        <div class="webia-featured-grid">
            <article class="webia-template-card">
                <a class="webia-template-preview preview-cafe"
                    href="{{ route('webia.collections', ['category' => 'fnb']) }}" aria-label="Lihat template cafe">
                    <div class="webia-preview-browser"><i></i><i></i><i></i><span>littlecorner.cafe</span></div>
                    <div class="webia-preview-content"><small>YOUR DAILY HAPPY PLACE</small><b>Good coffee.<br>Good
                            mood.</b><span></span>
                        <div class="webia-preview-tiles"><i></i><i></i><i></i></div>
                    </div>
                    <span class="webia-preview-open">Explore ↗</span>
                </a>
                <div class="webia-template-meta"><span>FOOD & BEVERAGE</span>
                    <h3>Little Corner</h3>
                    <p>Warm, welcoming, and full of flavor.</p>
                </div>
            </article>
            <article class="webia-template-card">
                <a class="webia-template-preview preview-beauty"
                    href="{{ route('webia.collections', ['category' => 'beauty']) }}" aria-label="Lihat template beauty">
                    <div class="webia-preview-browser"><i></i><i></i><i></i><span>maison.beauty</span></div>
                    <div class="webia-preview-content"><small>YOUR BEAUTY RITUAL</small><b>Feel good<br>in your
                            skin.</b><span></span>
                        <div class="webia-preview-tiles"><i></i><i></i><i></i></div>
                    </div>
                    <span class="webia-preview-open">Explore ↗</span>
                </a>
                <div class="webia-template-meta"><span>BEAUTY & LIFESTYLE</span>
                    <h3>Maison Beauty</h3>
                    <p>Soft, elegant, and effortlessly modern.</p>
                </div>
            </article>
            <article class="webia-template-card">
                <a class="webia-template-preview preview-company"
                    href="{{ route('webia.collections', ['category' => 'company']) }}"
                    aria-label="Lihat template company">
                    <div class="webia-preview-browser"><i></i><i></i><i></i><span>northstar.co</span></div>
                    <div class="webia-preview-content"><small>BUILT FOR WHAT'S NEXT</small><b>Ideas
                            into<br>impact.</b><span></span>
                        <div class="webia-preview-tiles"><i></i><i></i><i></i></div>
                    </div>
                    <span class="webia-preview-open">Explore ↗</span>
                </a>
                <div class="webia-template-meta"><span>COMPANY & SERVICES</span>
                    <h3>Northstar Studio</h3>
                    <p>Confident, clean, and professional.</p>
                </div>
            </article>
            <article class="webia-template-card webia-template-card-automotive">
                <a class="webia-template-preview preview-automotive"
                    href="{{ route('webia.collections', ['category' => 'automotive']) }}"
                    aria-label="Lihat template Velocity Garage">

                    <div class="webia-preview-browser">
                        <i></i><i></i><i></i>
                        <span>velocity.garage</span>
                    </div>

                    <div class="webia-automotive-badge">AUTOMOTIVE / PERFORMANCE</div>

                    <div class="webia-preview-content">
                        <small>DRIVE WITH CONFIDENCE</small>
                        <b>Built for<br>the road ahead.</b>
                        <span class="webia-automotive-accent"></span>
                        <p>Service. Performance. Care.</p>
                    </div>

                    <img class="webia-automotive-image" src="{{ asset('images/website-bisnis/automotive.png') }}"
                        alt="Ilustrasi otomotif" loading="lazy">

                    <span class="webia-preview-open">Explore ↗</span>
                </a>

                <div class="webia-template-meta">
                    <span>AUTOMOTIVE</span>
                    <h3>Velocity Garage</h3>
                    <p>Bold, precise, and built to perform.</p>
                </div>
            </article>
        </div>
        <div class="webia-featured-bottom"><span>✦ Koleksi akan terus bertambah seiring berkembangnya semesta
                WEBIA.</span><a href="{{ route('webia.collections') }}">Lihat semua template <span>→</span></a></div>
    </section>














    {{-- KEUNGGULAN --}}
    <section class="website-benefits" id="keunggulan-website">
        <div class="website-section-heading">
            <span class="website-eyebrow">WHY D-KREASI?</span>
            <h2>Lebih dari Sekadar <span>Website.</span></h2>
            <p>
                Solusi digital yang dirancang untuk membantu bisnis tampil
                profesional dan mempermudah pelanggan mengenal layanan Anda.
            </p>
        </div>

        <div class="website-benefit-grid">
            <article class="website-benefit-card benefit-purple">
                <div class="website-benefit-icon">✧</div>
                <h3>Desain Responsif</h3>
                <p>Tampilan menyesuaikan perangkat desktop, tablet, dan smartphone.</p>
            </article>

            <article class="website-benefit-card benefit-pink">
                <div class="website-benefit-icon">♡</div>
                <h3>AI Chatbot</h3>
                <p>Asisten virtual yang dirancang menjawab pertanyaan berdasarkan data bisnis.</p>
            </article>

            <article class="website-benefit-card benefit-blue">
                <div class="website-benefit-icon">↗</div>
                <h3>SEO</h3>
                <p>Pondasi optimasi mesin pencari sesuai cakupan paket yang dipilih.</p>
            </article>

            <article class="website-benefit-card benefit-green">
                <div class="website-benefit-icon">✳</div>
                <h3>Fleksibel</h3>
                <p>Pilih fitur dan modul sesuai kebutuhan serta perkembangan bisnis.</p>
            </article>
        </div>
    </section>

    {{-- ALUR PEMESANAN --}}
    <section class="website-process" id="alur-website">
        <div class="website-section-heading">
            <span class="website-eyebrow">ALUR PEMESANAN</span>
            <h2>Dari Ide Menjadi <span>Website.</span></h2>
            <p>
                Ikuti langkah pemesanan secara bertahap, mulai dari memilih
                desain hingga menyiapkan AI Chatbot untuk bisnis Anda.
            </p>
        </div>

        <div class="website-process-grid">

            {{-- STEP 1 --}}
            <article class="process-step-card">
                <div class="process-step-top">
                    <span class="process-step-number">01</span>
                    <span class="process-step-icon">▦</span>
                </div>
                <h3>Pilih Kategori</h3>
                <p>Pilih kategori bisnis dan subkategori yang paling sesuai dengan bidang usaha Anda.</p>
            </article>

            {{-- STEP 2 --}}
            <article class="process-step-card">
                <div class="process-step-top">
                    <span class="process-step-number">02</span>
                    <span class="process-step-icon">🎨</span>
                </div>
                <h3>Pilih Template</h3>
                <p>Temukan desain website yang sesuai dengan karakter dan identitas brand Anda.</p>
            </article>

            {{-- STEP 3 --}}
            <article class="process-step-card">
                <div class="process-step-top">
                    <span class="process-step-number">03</span>
                    <span class="process-step-icon">✦</span>
                </div>
                <h3>Pilih Paket</h3>
                <p>Tentukan paket website dan fitur tambahan sesuai kebutuhan bisnis.</p>
            </article>

            {{-- STEP 4 --}}
            <article class="process-step-card">
                <div class="process-step-top">
                    <span class="process-step-number">04</span>
                    <span class="process-step-icon">☑</span>
                </div>
                <h3>Konfirmasi Order</h3>
                <p>Periksa kembali pilihan kategori, template, paket, dan detail pesanan sebelum melanjutkan.</p>
            </article>

            {{-- STEP 5 --}}
            <article class="process-step-card">
                <div class="process-step-top">
                    <span class="process-step-number">05</span>
                    <span class="process-step-icon">💳</span>
                </div>
                <h3>Melakukan Pembayaran</h3>
                <p>Selesaikan pembayaran sesuai metode dan ketentuan yang disepakati.</p>
            </article>

            {{-- STEP 6 --}}
            <article class="process-step-card">
                <div class="process-step-top">
                    <span class="process-step-number">06</span>
                    <span class="process-step-icon">✎</span>
                </div>
                <h3>Isi Data Bisnis</h3>
                <p>Lengkapi profil bisnis, layanan, kontak, alamat, dan informasi pendukung website.</p>
            </article>

            {{-- STEP 7 --}}
            <article class="process-step-card">
                <div class="process-step-top">
                    <span class="process-step-number">07</span>
                    <span class="process-step-icon">✧</span>
                </div>
                <h3>Konfigurasi AI Chatbot</h3>
                <p>Siapkan FAQ, informasi produk, layanan, harga, dan data bisnis sebagai sumber jawaban AI Chatbot.</p>
            </article>

        </div>
    </section>

    {{-- EMPAT PAKET WEBSITE WEBIA --}}
    <section class="website-packages" id="paket-website">
        <div class="website-section-heading">
            <span class="website-eyebrow">FIND YOUR PERFECT PACKAGE</span>
            <h2>Pilih Paket, <span>Mulai Berkarya!</span></h2>
            <p>
                Dari landing page hingga website dengan CMS dan fitur custom.
                Pilih solusi yang sesuai dengan kebutuhan bisnismu.
            </p>
        </div>

        <div class="website-package-grid">

            {{-- 01 PIXEL --}}
            <article class="website-package-card package-pixel">
                <div class="website-package-top">
                    <span class="website-package-number">01 / START SIMPLE</span>
                    <div class="website-package-icon">◈</div>
                </div>

                <h3>Pixel</h3>
                <p class="website-package-description">
                    Tampil profesional di internet dengan landing page sederhana.
                </p>

                <span class="website-package-type">TANPA CMS</span>

                <div class="website-price-label">Biaya pembuatan</div>
                <div class="website-price-old">Rp589.500</div>
                <div class="website-price">Rp99.500</div>
                <div class="website-price-caption">Sekali bayar</div>

                <a href="#konsultasi-website" class="website-package-button">
                    Pilih Pixel <span>↗</span>
                </a>

                <button type="button" class="website-package-detail" data-package-detail="pixel">
                    Detail Paket <span>＋</span>
                </button>

                <div class="website-package-divider"></div>
                <h4>Highlight fitur</h4>
                <ul>
                    <li>1 halaman landing page</li>
                    <li>WhatsApp, kontak, dan peta</li>
                    <li>AI Chatbot 500 pesan/bulan*</li>
                </ul>
            </article>

            {{-- 02 PULSE --}}
            <article class="website-package-card package-pulse">
                <div class="website-package-top">
                    <span class="website-package-number">02 / GET NOTICED</span>
                    <div class="website-package-icon">✦</div>
                </div>

                <h3>Pulse</h3>
                <p class="website-package-description">
                    Landing page lebih lengkap untuk memperkuat kehadiran digital.
                </p>

                <span class="website-package-type">TANPA CMS</span>

                <div class="website-price-label">Biaya pembuatan</div>
                <div class="website-price-old">Rp1.199.000</div>
                <div class="website-price">Rp899.000</div>
                <div class="website-price-caption">Sekali bayar</div>

                <a href="#konsultasi-website" class="website-package-button">
                    Pilih Pulse <span>↗</span>
                </a>

                <button type="button" class="website-package-detail" data-package-detail="pulse">
                    Detail Paket <span>＋</span>
                </button>

                <div class="website-package-divider"></div>
                <h4>Highlight fitur</h4>
                <ul>
                    <li>Galeri, testimoni, layanan, FAQ</li>
                    <li>AI Chatbot 1.500 pesan/bulan*</li>
                    <li>SEO dasar dan analitik</li>
                </ul>
            </article>

            {{-- 03 NEXUS --}}
            <article class="website-package-card package-nexus">
                <div class="website-package-top">
                    <span class="website-package-number">03 / TAKE CONTROL</span>
                    <div class="website-package-icon">▦</div>
                </div>

                <h3>Nexus</h3>
                <p class="website-package-description">
                    Kelola konten, layanan, produk, dan artikel secara mandiri.
                </p>

                <span class="website-package-type">DENGAN CMS</span>

                <div class="website-price-label">Biaya pembuatan</div>
                <div class="website-price-old">Rp1.999.000</div>
                <div class="website-price">Rp1.499.000</div>
                <div class="website-price-caption">Sekali bayar</div>

                <a href="#konsultasi-website" class="website-package-button">
                    Pilih Nexus <span>↗</span>
                </a>

                <button type="button" class="website-package-detail" data-package-detail="nexus">
                    Detail Paket <span>＋</span>
                </button>

                <div class="website-package-divider"></div>
                <h4>Highlight fitur</h4>
                <ul>
                    <li>Website beberapa halaman</li>
                    <li>CMS dan tracking data pelanggan</li>
                    <li>AI Chatbot 2.500 pesan/bulan*</li>
                </ul>
            </article>

            {{-- 04 INFINITY - RECOMMENDED --}}
            <article class="website-package-card package-infinity">
                <div class="website-package-ribbon">
                    ★ REKOMENDASI UTAMA
                </div>

                <div class="website-package-top">
                    <span class="website-package-number">04 / BEYOND LIMITS</span>
                    <div class="website-package-icon">✧</div>
                </div>

                <h3>Infinity</h3>
                <p class="website-package-description">
                    Website fleksibel dengan CMS lanjutan dan fitur custom.
                </p>

                <span class="website-package-type">ADVANCED CMS</span>

                <div class="website-price-label">Biaya pembuatan</div>
                <div class="website-price-old">Rp3.499.000</div>
                <div class="website-price">Rp2.499.000</div>
                <div class="website-price-caption">Sekali bayar</div>

                <a href="#konsultasi-website" class="website-package-button">
                    Pilih Infinity <span>↗</span>
                </a>

                <button type="button" class="website-package-detail" data-package-detail="infinity">
                    Detail Paket <span>＋</span>
                </button>

                <div class="website-package-divider"></div>
                <h4>Highlight fitur</h4>
                <ul>
                    <li>Custom fitur sesuai kebutuhan</li>
                    <li>CMS lanjutan dan tracking pelanggan</li>
                    <li>AI Chatbot 5.000 pesan/bulan*</li>
                </ul>
            </article>

        </div>

        <p class="website-package-note">
            Harga pembuatan sekali bayar. Hosting terkelola tersedia melalui
            langganan. Kuota AI merupakan kuota awal dan dapat disesuaikan.
            *Kuota dan ketentuan final dikonfirmasi sebelum pemesanan.
        </p>

        {{-- POPUP DETAIL PAKET --}}
        <dialog class="website-package-dialog" id="websitePackageDialog" aria-labelledby="websitePackageDialogTitle">

            <div class="website-package-dialog-header">
                <div>
                    <span class="website-eyebrow">PACKAGE DETAILS</span>
                    <h3 id="websitePackageDialogTitle">Detail Paket</h3>
                    <p id="websitePackageDialogDescription"></p>
                </div>

                <button type="button" class="website-package-dialog-close" id="websitePackageDialogClose"
                    aria-label="Tutup detail paket">
                    &times;
                </button>
            </div>

            <div class="website-package-dialog-content">
                <h4>Yang kamu dapatkan</h4>
                <ul id="websitePackageDialogFeatures"></ul>
            </div>

            <div class="website-package-dialog-footer">
                <p id="websitePackageDialogNote"></p>
                <a href="#konsultasi-website" class="website-package-button" id="websitePackageDialogChoose">
                    Pilih Paket <span>↗</span>
                </a>
            </div>
        </dialog>
    </section>

    {{-- SEO DAN ADD-ON --}}
    <section class="website-addons" id="add-on-website">
        <div class="website-addons-inner">
            <div class="website-addons-copy">
                <span class="website-eyebrow">EXTRA POWER FOR YOUR WEBSITE</span>
                <h2>Butuh Lebih Banyak? <span>Tinggal Tambahkan!</span></h2>
                <p>
                    Kembangkan website sesuai kebutuhan melalui layanan tambahan.
                    Ketersediaan dan biaya mengikuti ruang lingkup proyek.
                </p>
            </div>

            <div class="website-addon-list">
                <article>
                    <span>01</span>
                    <div>
                        <h3>SEO Optimization</h3>
                        <p>Optimasi teknis dan konten sesuai ruang lingkup layanan.</p>
                    </div>
                    <b>+</b>
                </article>

                <article>
                    <span>02</span>
                    <div>
                        <h3>Admin Dashboard</h3>
                        <p>Kelola konten website melalui panel admin jika dibutuhkan.</p>
                    </div>
                    <b>+</b>
                </article>

                <article>
                    <span>03</span>
                    <div>
                        <h3>Custom Module</h3>
                        <p>Tambahkan fungsi khusus sesuai kebutuhan bisnis.</p>
                    </div>
                    <b>+</b>
                </article>

                <article>
                    <span>04</span>
                    <div>
                        <h3>Integrasi Tambahan</h3>
                        <p>Integrasi layanan eksternal sesuai kesepakatan proyek.</p>
                    </div>
                    <b>+</b>
                </article>
            </div>
        </div>
    </section>


    {{-- FAQ --}}
    <section class="website-faq" id="faq-website">
        <div class="website-section-heading">
            <span class="website-eyebrow">GOT QUESTIONS?</span>
            <h2>Pertanyaan yang <span>Sering Ditanyakan.</span></h2>
        </div>

        <div class="website-faq-list">
            <details>
                <summary>Apakah semua paket mendapatkan AI Chatbot?</summary>
                <p>Ya, keempat dirancang mencakup AI Chatbot. Cakupan konfigurasi, integrasi, dan penggunaan mengikuti
                    detail paket yang disepakati.</p>
            </details>

            <details>
                <summary>Apa perbedaan paket Pixel dan Nexus?</summary>
                <p>
                    Pixel berfokus pada landing page tanpa CMS, sedangkan Nexus
                    menyediakan CMS agar pelanggan dapat mengelola konten website
                    secara mandiri sesuai cakupan paket.
                </p>
            </details>
        
            <details>
                <summary>Apakah saya bisa menambahkan fitur khusus?</summary>
                <p>Bisa. Fitur tambahan akan ditinjau berdasarkan kebutuhan, kelayakan teknis, biaya, dan ruang lingkup
                    pengerjaan.</p>
            </details>

            <details>
                <summary>Apakah website sudah termasuk SEO?</summary>
                <p>Setiap paket dirancang memiliki cakupan SEO yang berbeda. Detail optimasi akan disesuaikan dengan paket
                    dan kebutuhan proyek.</p>
            </details>

            <details>
                <summary>Bagaimana jika saya belum tahu paket yang cocok?</summary>
                <p>Anda dapat mendiskusikan kebutuhan bisnis terlebih dahulu agar pilihan paket, modul, dan estimasi
                    pengerjaan lebih sesuai.</p>
            </details>
        </div>
    </section>


    {{-- CTA --}}
    <section class="website-final-cta" id="konsultasi-website">
        <div class="website-final-cta-inner">
            <span class="website-eyebrow">LET'S BUILD SOMETHING GREAT</span>
            <h2>Siap Membawa Bisnismu <span>Ke Level Berikutnya?</span></h2>
            <p>
                Mulai dari ide sederhana hingga kebutuhan website yang lebih kompleks,
                D-KREASI siap membantu merencanakan solusi digitalmu.
            </p>
            <a href="#paket-website" class="website-button website-button-primary">
                Temukan Paketmu <span>↗</span>
            </a>
        </div>
    </section>

@endsection


@push('scripts')
    <script src="{{ asset('js/website-bisnis/website-bisnis.js') }}" defer></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const dialog = document.getElementById('websitePackageDialog');

            if (!dialog) return;

            const title = document.getElementById('websitePackageDialogTitle');
            const description = document.getElementById('websitePackageDialogDescription');
            const features = document.getElementById('websitePackageDialogFeatures');
            const note = document.getElementById('websitePackageDialogNote');
            const closeButton = document.getElementById('websitePackageDialogClose');
            const chooseButton = document.getElementById('websitePackageDialogChoose');

            const packages = {
                pixel: {
                    name: 'Pixel',
                    description: 'Landing page sederhana untuk usaha kecil yang ingin tampil profesional.',
                    price: 'Rp499.000',
                    features: [
                        '1 halaman landing page dari template.',
                        'Tombol WhatsApp, kontak, dan peta lokasi.',
                        'AI Chatbot dengan kuota awal 500 pesan/bulan.',
                        'Dashboard konsumen untuk mengelola pengetahuan chatbot melalui login WEBIA.',
                        'Hosting terkelola dan SSL jika berlangganan layanan hosting.',
                        '1 kali revisi konten saat pengerjaan.'
                    ],
                    note: 'Tanpa CMS. Perubahan desain dan konten setelah website terbit diajukan melalui permintaan revisi.'
                },

                pulse: {
                    name: 'Pulse',
                    description: 'Landing page lebih lengkap tanpa perlu mengelola website sendiri.',
                    price: 'Rp899.000',
                    features: [
                        'Landing page dengan bagian konten lebih lengkap.',
                        'Galeri, testimoni, daftar layanan, dan FAQ.',
                        'AI Chatbot dengan kuota awal 1.500 pesan/bulan.',
                        'Dashboard konsumen dan pengaturan pengetahuan chatbot melalui login WEBIA.',
                        'SEO dasar dan integrasi analitik sederhana.',
                        '2 kali revisi saat pengerjaan.',
                        'Hosting terkelola tersedia melalui langganan.'
                    ],
                    note: 'Tanpa CMS. Konten website dikelola penyedia, sedangkan informasi chatbot bisa diperbarui pelanggan sendiri.'
                },

                nexus: {
                    name: 'Nexus',
                    description: 'Website dengan CMS untuk bisnis yang rutin memperbarui konten.',
                    price: 'Rp1.499.000',
                    features: [
                        'Website beberapa halaman sesuai batas paket.',
                        'Admin panel CMS untuk mengubah konten secara mandiri.',
                        'Pengelolaan layanan, galeri, artikel, atau produk sederhana.',
                        'Fitur tracking data pelanggan melalui CMS sesuai cakupan paket.',
                        'AI Chatbot dengan kuota awal 2.500 pesan/bulan.',
                        'Dashboard konsumen untuk paket, tagihan, dan chatbot.',
                        'SEO dasar dan analitik.',
                        '3 kali revisi saat pengerjaan.',
                        'Hosting terkelola tersedia melalui langganan.'
                    ],
                    note: 'Dengan CMS. Batas halaman, modul, dan cakupan tracking dikonfirmasi sebelum pemesanan.'
                },

                infinity: {
                    name: 'Infinity',
                    description: 'Solusi website custom dengan CMS lanjutan untuk bisnis berkembang.',
                    price: 'Rp2.499.000',
                    features: [
                        'Website multi-halaman dengan kustomisasi lebih luas.',
                        'Custom fitur sesuai kebutuhan dan kesepakatan proyek.',
                        'Dashboard konsumen dan pengaturan pengetahuan chatbot melalui login WEBIA.',
                        'CMS lanjutan untuk pengelolaan konten dan kategori.',
                        'Tracking data pelanggan melalui CMS sesuai cakupan proyek.',
                        'AI Chatbot dengan kuota awal 5.000 pesan/bulan.',
                        'Pengaturan sumber pengetahuan chatbot yang lebih luas.',
                        'SEO dan analitik lebih lengkap.',
                        'Prioritas dukungan teknis.',
                        '4 kali revisi saat pengerjaan.',
                        'Hosting terkelola tersedia melalui langganan.'
                    ],
                    note: 'CMS lanjutan dan fitur custom. Ruang lingkup fitur, estimasi biaya, dan ketentuan akhir disepakati sebelum pengerjaan.'
                }
            };

            document.querySelectorAll('[data-package-detail]').forEach(function(button) {
                button.addEventListener('click', function() {
                    const selected = packages[this.dataset.packageDetail];

                    if (!selected) return;

                    title.textContent = selected.name + ' — ' + selected.price;
                    description.textContent = selected.description;
                    note.textContent = selected.note;

                    features.replaceChildren();

                    selected.features.forEach(function(feature) {
                        const item = document.createElement('li');
                        item.textContent = feature;
                        features.appendChild(item);
                    });

                    chooseButton.textContent = 'Pilih ' + selected.name + ' ↗';

                    if (!dialog.open) {
                        dialog.showModal();
                    }
                });
            });

            closeButton.addEventListener('click', function() {
                dialog.close();
            });

            dialog.addEventListener('click', function(event) {
                if (event.target === dialog) {
                    dialog.close();
                }
            });

            chooseButton.addEventListener('click', function() {
                dialog.close();
            });

            document.addEventListener('keydown', function(event) {
                if (event.key === 'Escape' && dialog.open) {
                    dialog.close();
                }
            });
        });
    </script>
@endpush
