@extends('auth.layout')

@section('title', 'Buat Pesanan')

@section('content')
    <section class="dashboard-panel" aria-labelledby="order-create-title">
        <p class="account-label">Order website</p>
        <h1 id="order-create-title">Buat Pesanan</h1>
        <p>Pilih paket dan layanan tambahan. Total dihitung dari harga aktif di WEBIA.</p>

        @if (session('status')) <p role="status">{{ session('status') }}</p> @endif

        @if ($selectedTemplate)
            <div class="dashboard-empty customer-template-card">
                <h2>Template terpilih</h2>
                <p><strong>{{ $selectedTemplate->name }}</strong></p>
                <div class="admin-actions">
                    <a href="{{ route('collections') }}">Ganti template</a>
                </div>
            </div>
        @else
            <div class="dashboard-empty customer-template-card">
                <h2>Belum pilih template</h2>
                <p>Pesan bisa dibuat tanpa template, tapi template menentukan hasil website.</p>
                <div class="admin-actions">
                    <a href="{{ route('collections') }}">Pilih template</a>
                </div>
            </div>
        @endif

        <form class="account-form admin-form customer-order-form" method="POST" action="{{ route('orders.store') }}">
            @csrf

            @if ($selectedTemplate)
                <input type="hidden" name="template_id" value="{{ $selectedTemplate->id }}">
            @endif

            <fieldset class="order-options customer-package-options">
                <legend>Paket website</legend>
                @forelse ($packages as $package)
                    <label class="customer-package-option">
                        <input type="radio" name="package_id" value="{{ $package->id }}" data-price="{{ $package->price }}" @checked((string) old('package_id', $selectedPackage?->id) === (string) $package->id) required>
                        <span class="customer-package-body">
                            <strong>{{ $package->name }}</strong>
                            <span>Rp{{ number_format($package->price, 0, ',', '.') }}</span>
                            @if ($package->description) <small>{{ $package->description }}</small> @endif
                        </span>
                    </label>
                @empty
                    <p class="form-error">Belum ada paket aktif. Hubungi admin WEBIA.</p>
                @endforelse
                @error('package_id') <p class="form-error">{{ $message }}</p> @enderror
            </fieldset>

            @if ($addons->isNotEmpty())
                <fieldset class="order-options">
                    <legend>Layanan tambahan (opsional)</legend>
                    @foreach ($addons as $addon)
                        <label class="check-field">
                            <input type="checkbox" name="addon_ids[]" value="{{ $addon->id }}" data-price="{{ $addon->price ?? 0 }}" @checked(in_array($addon->id, old('addon_ids', [])))>
                            <span>{{ $addon->name }} &middot; {{ $addon->price === null ? 'Konsultasi' : 'Rp'.number_format($addon->price, 0, ',', '.') }}</span>
                        </label>
                    @endforeach
                    @error('addon_ids.*') <p class="form-error">{{ $message }}</p> @enderror
                </fieldset>
            @endif

            @php
                $initialPackageId = old('package_id', $selectedPackage?->id);
                $initialTotal = ($packages->firstWhere('id', $initialPackageId)?->price ?? 0)
                    + $addons->whereIn('id', old('addon_ids', []))->sum('price');
            @endphp
            <div class="order-summary customer-order-summary">
                <dl>
                    <div><dt>Total</dt><dd data-total>Rp{{ number_format($initialTotal, 0, ',', '.') }}</dd></div>
                </dl>
            </div>

            <button class="account-submit" type="submit">Lanjut ke pembayaran</button>
        </form>
    </section>
@endsection
