@extends('auth.layout')

@section('title', 'Buat Pesanan')

@section('content')
    <section class="dashboard-panel" aria-labelledby="order-create-title">
        <div class="customer-create-head">
            <a class="customer-create-back" href="{{ auth()->check() ? route('orders.index') : route('collections') }}">
                <span aria-hidden="true" class="material-symbols-outlined">arrow_back</span>
                {{ auth()->check() ? 'Kembali ke Pesanan Saya' : 'Kembali ke koleksi template' }}
            </a>
            <div class="customer-page-head">
                <h1 id="order-create-title">Buat Pesanan</h1>
                <p>Pilih paket dan layanan tambahan untuk website kamu.</p>
            </div>
        </div>

        @if (session('status')) <p role="status">{{ session('status') }}</p> @endif

        <form class="customer-create-grid" method="POST" action="{{ route('orders.store') }}">
            @csrf
            @if ($selectedTemplate)
                <input type="hidden" name="template_id" value="{{ $selectedTemplate->id }}">
            @endif

            <section class="customer-create-main" aria-label="Formulir pemilihan paket dan layanan">
                @guest
                    <fieldset class="customer-create-card">
                        <legend class="customer-create-legend">
                            <span aria-hidden="true" class="material-symbols-outlined">badge</span>
                            Data akun
                        </legend>
                        <p class="customer-create-hint">Setelah pembayaran terkonfirmasi, akun WEBIA otomatis dibuat dan kredensial dikirim ke email ini.</p>
                        <div class="form-field"><label for="guest_name">Nama lengkap</label><input id="guest_name" name="name" type="text" value="{{ old('name') }}" required autocomplete="name">@error('name') <p class="form-error">{{ $message }}</p> @enderror</div>
                        <div class="form-field"><label for="guest_email">Email</label><input id="guest_email" name="email" type="email" value="{{ old('email') }}" required autocomplete="email">@error('email') <p class="form-error">{{ $message }}</p> @enderror</div>
                    </fieldset>
                @endguest

                @if ($selectedTemplate)
                    @php
                        $templatePreview = null;
                        if ($selectedTemplate->preview_folder) {
                            $previewDirectory = public_path('images/template website/' . $selectedTemplate->preview_folder);
                            $firstPreview = is_dir($previewDirectory) ? (glob($previewDirectory . '/*.png')[0] ?? null) : null;
                            $templatePreview = $firstPreview ? asset('images/template website/' . $selectedTemplate->preview_folder . '/' . basename($firstPreview)) : null;
                        }
                    @endphp
                    <article class="customer-create-card">
                        <div class="customer-create-card-head">
                            <h2>
                                <span aria-hidden="true" class="material-symbols-outlined">web</span>
                                Template Dipilih
                            </h2>
                            <a class="customer-create-swap" href="{{ route('collections') }}">Ganti template</a>
                        </div>
                        <div class="customer-create-template">
                            @if ($templatePreview)
                                <img class="customer-create-thumb" src="{{ $templatePreview }}" alt="Preview template {{ $selectedTemplate->name }}">
                            @else
                                <span class="customer-create-thumb customer-create-thumb-empty" aria-hidden="true">
                                    <span class="material-symbols-outlined">image</span>
                                </span>
                            @endif
                            <div class="customer-create-template-body">
                                @if ($selectedTemplate->category_label)
                                    <span class="customer-create-cat">{{ $selectedTemplate->category_label }}</span>
                                @endif
                                <h3>{{ $selectedTemplate->name }}</h3>
                                @if ($selectedTemplate->description)
                                    <p>{{ $selectedTemplate->description }}</p>
                                @endif
                            </div>
                        </div>
                    </article>
                @else
                    <article class="customer-create-card customer-create-tpl-empty">
                        <div class="customer-create-tpl-empty-box">
                            <span class="customer-create-tpl-empty-icon" aria-hidden="true">
                                <span class="material-symbols-outlined">style</span>
                            </span>
                            <h2>Pilih template terlebih dahulu</h2>
                            <p>Template menentukan struktur dan tampilan awal website bisnismu sebelum dikustomisasi oleh tim WEBIA.</p>
                            <a class="account-submit" href="{{ route('collections') }}">
                                <span aria-hidden="true" class="material-symbols-outlined">grid_view</span>
                                Pilih template
                            </a>
                        </div>
                    </article>
                @endif

                <fieldset class="customer-create-card @error('package_id') has-error @enderror">
                    <legend class="customer-create-legend">
                        <span aria-hidden="true" class="material-symbols-outlined">inventory_2</span>
                        Pilih Paket
                    </legend>
                    <p class="customer-create-hint">Pilih satu paket pengerjaan website yang sesuai dengan kebutuhan bisnismu.</p>

                    @error('package_id')
                        <p class="customer-create-alert" role="alert">
                            <span aria-hidden="true" class="material-symbols-outlined">error</span>
                            {{ $message }}
                        </p>
                    @enderror

                    <div class="customer-create-options" role="radiogroup" aria-label="Daftar paket" @error('package_id') aria-invalid="true" @enderror>
                        @forelse ($packages as $package)
                            <label @class(['customer-create-option', 'is-selected' => (string) old('package_id', $selectedPackage?->id) === (string) $package->id])>
                                <input type="radio" name="package_id" value="{{ $package->id }}" data-price="{{ $package->price }}" @checked((string) old('package_id', $selectedPackage?->id) === (string) $package->id) required>
                                <span class="customer-create-option-body">
                                    <span class="customer-create-option-row">
                                        <strong data-pkg-name>{{ $package->name }}</strong>
                                        <strong class="customer-create-option-price">Rp{{ number_format($package->price, 0, ',', '.') }}</strong>
                                    </span>
                                    @if ($package->description)
                                        <span class="customer-create-option-desc">{{ $package->description }}</span>
                                    @endif
                                    @if ($package->features)
                                        <span class="customer-create-features">
                                            @foreach ($package->features as $feature)
                                                <span><span aria-hidden="true" class="material-symbols-outlined">check</span>{{ $feature }}</span>
                                            @endforeach
                                        </span>
                                    @endif
                                </span>
                            </label>
                        @empty
                            <p class="form-error">Belum ada paket aktif. Hubungi admin WEBIA.</p>
                        @endforelse
                    </div>
                </fieldset>

                @if ($addons->isNotEmpty())
                    <fieldset class="customer-create-card">
                        <legend class="customer-create-legend">
                            <span aria-hidden="true" class="material-symbols-outlined">extension</span>
                            Layanan Tambahan (Add-on)
                        </legend>
                        <p class="customer-create-hint">Pilih modul atau fitur opsional untuk mendukung operasional websitemu.</p>

                        <div class="customer-create-options">
                            @foreach ($addons as $addon)
                                <label class="customer-create-option customer-create-option-addon">
                                    <input type="checkbox" name="addon_ids[]" value="{{ $addon->id }}" data-price="{{ $addon->price ?? 0 }}" @checked(in_array($addon->id, old('addon_ids', [])))>
                                    <span class="customer-create-option-body">
                                        <span class="customer-create-option-row">
                                            <strong data-addon-name>{{ $addon->name }}</strong>
                                            @if ($addon->price === null)
                                                <span class="customer-create-badge">Konsultasi</span>
                                            @else
                                                <strong class="customer-create-option-price">Rp{{ number_format($addon->price, 0, ',', '.') }}</strong>
                                            @endif
                                        </span>
                                        @if ($addon->description)
                                            <span class="customer-create-option-desc">{{ $addon->description }}</span>
                                        @endif
                                    </span>
                                </label>
                            @endforeach
                            @error('addon_ids.*') <p class="form-error">{{ $message }}</p> @enderror
                        </div>
                    </fieldset>
                @endif
            </section>

            @php
                $initialPackageId = old('package_id', $selectedPackage?->id);
                $initialPackage = $packages->firstWhere('id', $initialPackageId);
                $initialAddons = $addons->whereIn('id', old('addon_ids', []));
                $initialTotal = ($initialPackage->price ?? 0) + $initialAddons->sum('price');
            @endphp
            <aside class="customer-create-aside" aria-labelledby="summary-title">
                <div class="customer-create-card customer-create-summary">
                    <h2 id="summary-title">
                        <span aria-hidden="true" class="material-symbols-outlined">receipt_long</span>
                        Ringkasan Pesanan
                    </h2>

                    <div class="customer-create-summary-rows">
                        <div class="customer-create-summary-row">
                            <span>Template</span>
                            <strong @class(['is-unset' => ! $selectedTemplate])>{{ $selectedTemplate?->name ?? 'Belum dipilih' }}</strong>
                        </div>
                        <div class="customer-create-summary-row">
                            <span>Paket</span>
                            <strong data-summary-package @class(['is-unset' => ! $initialPackage])>{{ $initialPackage?->name ?? 'Belum dipilih' }}</strong>
                        </div>
                        <div class="customer-create-summary-row">
                            <span>Harga paket</span>
                            <strong data-summary-package-price>{{ $initialPackage ? 'Rp' . number_format($initialPackage->price, 0, ',', '.') : '-' }}</strong>
                        </div>
                        <div class="customer-create-summary-addons">
                            <span>Add-on terpilih:</span>
                            <div class="customer-create-addon-list" data-summary-addons>
                                @if ($initialAddons->isEmpty())
                                    <span data-summary-addons-empty class="is-unset">Tidak ada add-on</span>
                                @else
                                    @foreach ($initialAddons as $addon)
                                        <span class="customer-create-addon-row">
                                            <span data-addon-row-name>{{ $addon->name }}</span>
                                            <span>{{ $addon->price === null ? 'Konsultasi' : 'Rp' . number_format($addon->price, 0, ',', '.') }}</span>
                                        </span>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <div class="customer-create-summary-total">
                            <span>Total</span>
                            <strong data-total>Rp{{ number_format($initialTotal, 0, ',', '.') }}</strong>
                        </div>
                    </div>

                    <div class="customer-create-submit">
                        <button class="account-submit customer-create-submit-btn" type="submit" data-submit @unless ($initialPackage) disabled @endunless>
                            Lanjut ke pembayaran
                            <span aria-hidden="true" class="material-symbols-outlined">arrow_forward</span>
                        </button>
                        <p class="customer-create-note-error" data-submit-note @if ($initialPackage) hidden @endif>Pilih satu paket untuk melanjutkan pemesanan.</p>
                        <p class="customer-create-note" data-submit-caption @if (! $initialPackage) hidden @endif>@if (auth()->check())Pesanan dibuat setelah kamu menekan tombol ini.@else Akun dan pesanan dibuat setelah kamu menekan tombol ini; kredensial masuk dikirim via email.@endif</p>
                    </div>
                </div>
            </aside>
        </form>
    </section>
@endsection
