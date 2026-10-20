@extends('website-bisnis.layouts.app')

@section('title', 'Koleksi Template Website — WEBIA')
@section('meta_description',
    'Jelajahi koleksi template website WEBIA berdasarkan kategori bisnis dan temukan inspirasi
    desain yang sesuai.')


@section('content')
    <style>
        .webia-gallery-card .webia-template-preview{position:relative;overflow:hidden;isolation:isolate}
        .webia-gallery-card .webia-real-hero-frame{display:block;position:relative;width:100%;height:clamp(300px,34vw,390px);overflow:hidden;background:#f8f3f7;border:0}
        .webia-gallery-card .webia-real-hero-frame iframe{position:absolute;left:0;top:0;width:200%;height:1300px;border:0;transform:scale(.5);transform-origin:top left;pointer-events:none}
        .webia-gallery-card .webia-real-hero-overlay{position:absolute;inset:auto 0 0;display:flex;justify-content:flex-end;padding:12px;background:linear-gradient(180deg,transparent,rgba(25,20,35,.25));pointer-events:none}
        .webia-gallery-card .webia-real-hero-overlay span{font-size:10px;font-weight:700;letter-spacing:.04em;color:#fff;background:rgba(31,24,43,.48);border:1px solid rgba(255,255,255,.45);border-radius:999px;padding:6px 10px;backdrop-filter:blur(8px)}
        .webia-gallery-card .webia-template-meta{padding-top:18px}
        .webia-gallery-card .webia-template-flags{display:flex;flex-wrap:wrap;gap:6px;margin:0 0 12px}
        .webia-gallery-card .webia-template-flag{display:inline-flex;align-items:center;max-width:100%;font-size:10px;line-height:1.35;font-weight:700;letter-spacing:.01em;padding:6px 9px;border-radius:999px;border:1px solid #e8dff4;background:#fbf8ff;color:#66518b}
        .webia-gallery-card .webia-template-flag--category{background:#f4eaff;border-color:#e5d1fa;color:#7142a4}
        .webia-gallery-card .webia-template-flag--business{background:#f0f8f4;border-color:#d8eae0;color:#3f7158}
        .webia-gallery-card .webia-template-flag--style{background:#fff7e8;border-color:#f2e4c8;color:#916b28}
        .webia-gallery-card .webia-template-meta>span:first-child{display:none}
        @media(max-width:600px){.webia-gallery-card .webia-real-hero-frame{height:280px}.webia-gallery-card .webia-template-flag{font-size:9px;padding:5px 7px}}
    </style>

    <section class="webia-gallery-hero">
        <div class="webia-gallery-orb webia-gallery-orb-one"></div>
        <div class="webia-gallery-orb webia-gallery-orb-two"></div>
        <div class="webia-gallery-hero-inner">
            <a class="webia-gallery-back" href="{{ route('home') }}">← Kembali ke WEBIA</a>
            <span class="website-eyebrow">THE WEBIA TEMPLATE UNIVERSE</span>
            <h1>Temukan Tampilan yang <span>Pas untuk Ceritamu.</span></h1>
            <p>Jelajahi inspirasi website berdasarkan kategori bisnis. Pilih gaya yang kamu suka, lalu konsultasikan
                kebutuhanmu bersama tim WEBIA.</p>
            <div class="webia-gallery-stats">
                <span><b>01</b> Pilih kategori</span><i>✦</i><span><b>02</b> Temukan inspirasi</span><i>✦</i><span><b>03</b>
                    Kembangkan bersama</span>
            </div>
        </div>
    </section>

    <section class="webia-gallery-section">
        <div class="webia-gallery-heading">
            <div>
                <span class="website-eyebrow">BROWSE THE COLLECTION</span>
                <h2>Galeri <span>Template WEBIA.</span></h2>
                <p>Gunakan filter atau pencarian untuk menemukan kategori yang kamu butuhkan.</p>
            </div>
            <a class="website-button website-button-secondary" href="{{ route('home') }}#paket-website">Lihat Paket
                <span>↗</span></a>
        </div>

        <div class="webia-gallery-toolbar webia-filter-toolbar">
            <label class="webia-gallery-search">
                <span aria-hidden="true">⌕</span>
                <input id="webia-template-search" type="search"
                    placeholder="Cari nama template, kategori, atau tipe bisnis..."
                    aria-label="Cari template, kategori, atau tipe bisnis">
            </label>

            <section class="webia-filter-step" aria-labelledby="webia-filter-categories-title">
                <div class="webia-filter-step-heading"><span>01</span>
                    <div>
                        <h3 id="webia-filter-categories-title">Pilih kategori bisnis</h3>
                        <p>Pilih satu atau beberapa kategori yang sesuai dengan bisnismu.</p>
                    </div>
                </div>
                <div class="webia-filter-options webia-category-options" id="webia-category-options"></div>
            </section>
            <section class="webia-filter-step" aria-labelledby="webia-filter-types-title">
                <div class="webia-filter-step-heading"><span>02</span>
                    <div>
                        <h3 id="webia-filter-types-title">Pilih tipe bisnis</h3>
                        <p>Pilih maksimal 3 tipe bisnis dari kategori yang kamu pilih.</p>
                    </div><b class="webia-filter-limit" id="webia-type-selection-count">0/3 dipilih</b>
                </div>
                <div class="webia-filter-options webia-subcategory-options" id="webia-subcategory-options">
                    <p class="webia-filter-hint">Pilih kategori bisnis terlebih dahulu.</p>
                </div>
            </section>
            <section class="webia-filter-step" aria-labelledby="webia-filter-style-title">
                <div class="webia-filter-step-heading"><span>03</span>
                    <div>
                        <h3 id="webia-filter-style-title">Pilih gaya desain</h3>
                        <p>Pilih gaya visual yang paling cocok dengan brand-mu.</p>
                    </div>
                </div>
                <div class="webia-filter-options webia-style-options" id="webia-style-options"></div>
            </section>
            <div class="webia-filter-actions"><span id="webia-filter-summary">Belum ada filter yang dipilih.</span><button
                    type="button" id="webia-gallery-reset">Reset filter</button></div>
        </div>

        <div class="webia-gallery-resultline">
            <span id="webia-template-count">Menampilkan template yang sesuai</span>
            <span>Template preview · Demo visual</span>
        </div>

        <div class="webia-gallery-grid" id="webia-gallery-grid">
            @foreach ($templates as $template)
                @php
                    $previewImages = [];
                    if (!empty($template['preview_folder'])) {
                        $previewDirectory = public_path('images/template website/' . $template['preview_folder']);
                        if (is_dir($previewDirectory)) {
                            foreach (glob($previewDirectory . '/*.png') ?: [] as $previewImage) {
                                $previewImages[] = asset(
                                    'images/template website/' .
                                        $template['preview_folder'] .
                                        '/' .
                                        basename($previewImage),
                                );
                            }
                        }
                    }
                @endphp
                <article class="webia-template-card webia-gallery-card" data-category="{{ $template['category'] }}"
                    data-business-types="{{ json_encode($template['business_types'] ?? []) }}"
                    data-design-style="{{ $template['design_style'] ?? 'Modern' }}"
                    data-color-theme="{{ $template['color_theme'] ?? '' }}"
                    data-template-url="{{ $template['template_url'] ?? '' }}"
                    data-search="{{ strtolower($template['name'] . ' ' . $template['label'] . ' ' . $template['desc'] . ' ' . implode(' ', $template['business_types'] ?? []) . ' ' . ($template['design_style'] ?? 'Modern') . ' ' . ($template['color_theme'] ?? '')) }}"
                    data-preview-images="{{ json_encode($previewImages) }}">
                    <div class="webia-template-preview {{ $template['style'] }}">
                        @if (!empty($template['template_url']))
                            <div class="webia-real-hero-frame" aria-label="Preview hero asli {{ $template['name'] }}">
                                <iframe
                                    src="{{ $template['template_url'] }}?preview=1"
                                    title="Preview {{ $template['name'] }}"
                                    loading="lazy"
                                    tabindex="-1"
                                    aria-hidden="true">
                                </iframe>
                                <div class="webia-real-hero-overlay"><span>✦ HERO ASLI TEMPLATE</span></div>
                            </div>
                        @else
                            <div class="webia-preview-browser">
                                <i></i><i></i><i></i><span>{{ strtolower(str_replace(' ', '', $template['name'])) }}.webia</span>
                            </div>
                            <div class="webia-preview-content">
                                <small>{{ $template['eyebrow'] }}</small>
                                <b>{!! $template['headline'] !!}</b>
                                <span></span>
                                <div class="webia-preview-tiles"><i></i><i></i><i></i></div>
                            </div>
                            <span class="webia-preview-open">Template Preview ✦</span>
                        @endif
                        <button type="button" class="webia-explore-trigger"
                            aria-label="Buka template {{ $template['name'] }}">
                            <span>Explore Template</span><b aria-hidden="true">↗</b>
                        </button>
                    </div>
                    <button type="button" class="webia-add-to-cart" data-template-add
                        aria-label="Tambahkan {{ $template['name'] }} ke keranjang">
                        <span>＋</span> Tambahkan ke Keranjang
                    </button>
                    <div class="webia-template-meta">
                        <div class="webia-template-flags" aria-label="Informasi template">
                            <span class="webia-template-flag webia-template-flag--category">✦ {{ $template['label'] }}</span>
                            @foreach (($template['business_types'] ?? []) as $businessType)
                                <span class="webia-template-flag webia-template-flag--business">{{ $businessType }}</span>
                            @endforeach
                            <span class="webia-template-flag webia-template-flag--style">{{ $template['design_style'] ?? 'Modern' }}</span>
                        </div>
                        <h3>{{ $template['name'] }}</h3>
                        <p>{{ $template['desc'] }}</p>
                        <div class="webia-gallery-card-bottom"><small>{{ $template['tag'] }}</small><a
                                href="{{ route('orders.create', ['template' => $template['id'], 'category' => $template['category']]) }}"
                                aria-label="Pesan template {{ $template['name'] }}">Pilih template ↗</a></div>
                    </div>
                </article>
            @endforeach
        </div>

        <div class="webia-gallery-empty" id="webia-gallery-empty" hidden>
            <span>✧</span>
            <h3>Belum ada template yang cocok.</h3>
            <p>Coba kata kunci atau kategori lainnya, ya!</p>
            <button type="button" id="webia-gallery-reset">Tampilkan semua template</button>
        </div>

        <div class="webia-gallery-cta">
            <span class="website-eyebrow">YOUR BRAND, YOUR UNIVERSE</span>
            <h2>Belum menemukan yang <span>benar-benar kamu?</span></h2>
            <p>Jadikan inspirasi ini titik awal. Kita bisa diskusikan penyesuaian desain sesuai karakter dan kebutuhan
                bisnismu.</p>
            <a href="{{ route('home') }}#konsultasi-website"
                class="website-button website-button-primary">Diskusikan Kebutuhanmu <span>↗</span></a>
        </div>
    </section>

    {{-- KERANJANG FRONTEND: seluruh data disimpan sementara di browser --}}
    <button type="button" class="webia-cart-fab" id="webia-cart-open" aria-label="Buka keranjang">
        <span aria-hidden="true">🛒</span><span>Keranjang</span><b id="webia-cart-badge">0</b>
    </button>

    <dialog class="webia-cart-dialog" id="webia-package-picker" aria-labelledby="webia-package-picker-title">
        <div class="webia-cart-dialog-head">
            <div><span class="website-eyebrow">PERSONALIZE YOUR WEBSITE</span>
                <h2 id="webia-package-picker-title">Pilih Paket Website</h2>
                <p id="webia-package-template-name">Template pilihan</p>
            </div>
            <button type="button" class="webia-cart-close" data-close-dialog aria-label="Tutup">×</button>
        </div>
        <div class="webia-package-options" id="webia-package-options"></div>
        <p class="webia-cart-note">Harga dan fitur merupakan data demo frontend. Detail akhir akan dikonfirmasi oleh tim
            WEBIA.</p>
    </dialog>

    <dialog class="webia-cart-dialog webia-cart-review" id="webia-cart-dialog" aria-labelledby="webia-cart-title">
        <div class="webia-cart-dialog-head">
            <div><span class="website-eyebrow">YOUR SELECTED DESIGNS</span>
                <h2 id="webia-cart-title">Keranjang Belanja</h2>
                <p>Periksa template dan paket pilihanmu.</p>
            </div>
            <button type="button" class="webia-cart-close" data-close-dialog aria-label="Tutup">×</button>
        </div>
        <div id="webia-cart-items" class="webia-cart-items"></div>
        <div class="webia-cart-total"><span>Estimasi total</span><strong id="webia-cart-total">Rp0</strong></div>
        <button type="button" class="website-button website-button-primary webia-cart-checkout"
            id="webia-checkout-open">Lanjut Checkout ↗</button>
        <p class="webia-cart-note">Belum ada pembayaran sungguhan. Ini hanya simulasi alur checkout frontend.</p>
    </dialog>

    <dialog class="webia-cart-dialog webia-checkout-dialog" id="webia-checkout-dialog"
        aria-labelledby="webia-checkout-title">
        <div class="webia-cart-dialog-head">
            <div><span class="website-eyebrow">CHECKOUT PREVIEW</span>
                <h2 id="webia-checkout-title">Data Pemesan</h2>
                <p>Isi data dummy untuk mencoba tampilan checkout.</p>
            </div>
            <button type="button" class="webia-cart-close" data-close-dialog aria-label="Tutup">×</button>
        </div>
        <form id="webia-checkout-form" class="webia-checkout-form">
            <label>Nama lengkap<input name="name" required autocomplete="name" placeholder="Nama pemesan"></label>
            <label>Email<input name="email" type="email" required autocomplete="email"
                    placeholder="nama@email.com"></label>
            <label>Nomor WhatsApp<input name="phone" required inputmode="tel" placeholder="08xxxxxxxxxx"></label>
            <label>Nama bisnis<input name="business" required placeholder="Nama bisnis kamu"></label>
            <label>Alamat / catatan kebutuhan
                <textarea name="address" rows="3" placeholder="Alamat atau kebutuhan khusus (opsional)"></textarea>
            </label>
            <label>Metode pembayaran demo<select name="payment" required>
                    <option value="">Pilih metode</option>
                    <option>QRIS (demo)</option>
                    <option>Transfer bank (demo)</option>
                    <option>Konfirmasi admin via WhatsApp</option>
                </select></label>
            <div class="webia-checkout-summary" id="webia-checkout-summary"></div>
            <button class="website-button website-button-primary" type="submit">Konfirmasi Checkout Demo ↗</button>
            <p class="webia-cart-note">Form ini tidak mengirim atau menyimpan data ke server.</p>
        </form>
    </dialog>

    <dialog class="webia-cart-dialog" id="webia-checkout-success" aria-labelledby="webia-checkout-success-title">
        <div class="webia-checkout-success"><span>✦</span>
            <h2 id="webia-checkout-success-title">Simulasi checkout selesai!</h2>
            <p>Pesanan demo sudah dirangkum di tampilan ini. Belum ada pesanan atau pembayaran yang dikirim ke backend.</p>
            <button type="button" class="website-button website-button-primary" data-close-dialog>Selesai</button>
        </div>
    </dialog>
@endsection

@push('styles')
@endpush

@push('scripts')
    <script src="{{ asset('js/website-bisnis/collections.js') }}" defer></script>
@endpush
