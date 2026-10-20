@extends('auth.layout')

@section('title', 'Buat pesanan')
@section('header-action')
    <a class="account-header-link" href="{{ route('orders.index') }}">Pesanan saya</a>
@endsection

@section('content')
    <section class="dashboard-panel" aria-labelledby="order-create-title">
        <p class="account-label">Order website</p>
        <h1 id="order-create-title">Buat pesanan</h1>
        <p>Pilih paket dan layanan tambahan. Total dihitung dari harga aktif di WEBIA.</p>

        <form class="account-form admin-form" method="POST" action="{{ route('orders.store') }}">
            @csrf

            <div class="form-field">
                <label for="package_id">Paket website</label>
                <select id="package_id" name="package_id" required>
                    <option value="">Pilih paket</option>
                    @foreach ($packages as $package)
                        <option value="{{ $package->id }}" @selected((string) old('package_id', $selectedPackage?->id) === (string) $package->id)>
                            {{ $package->name }} — Rp{{ number_format($package->price, 0, ',', '.') }}
                        </option>
                    @endforeach
                </select>
                @error('package_id') <p class="form-error">{{ $message }}</p> @enderror
            </div>

            <div class="form-field">
                <label for="category_slug">Kategori bisnis (opsional)</label>
                <input id="category_slug" name="category_slug" value="{{ old('category_slug', request('category')) }}" maxlength="80" placeholder="Contoh: beauty">
                @error('category_slug') <p class="form-error">{{ $message }}</p> @enderror
            </div>

            @if (request('template'))
                <input type="hidden" name="template_id" value="{{ request('template') }}">
            @endif

            @if ($addons->isNotEmpty())
                <fieldset class="order-options">
                    <legend>Layanan tambahan (opsional)</legend>
                    @foreach ($addons as $addon)
                        <label class="check-field">
                            <input type="checkbox" name="addon_ids[]" value="{{ $addon->id }}" @checked(in_array($addon->id, old('addon_ids', [])))>
                            <span>{{ $addon->name }} — {{ $addon->price === null ? 'Konsultasi' : 'Rp'.number_format($addon->price, 0, ',', '.') }}</span>
                        </label>
                    @endforeach
                    @error('addon_ids.*') <p class="form-error">{{ $message }}</p> @enderror
                </fieldset>
            @endif

            <button class="account-submit" type="submit">Lanjut ke pembayaran</button>
        </form>
    </section>
@endsection
