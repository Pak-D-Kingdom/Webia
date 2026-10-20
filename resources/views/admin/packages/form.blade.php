@extends('auth.layout')

@section('title', $package->exists ? 'Ubah paket' : 'Tambah paket')
@section('header-action')
    <a class="account-header-link" href="{{ route('admin.packages.index') }}">Kembali</a>
@endsection

@section('content')
    <section class="dashboard-panel" aria-labelledby="package-form-title">
        <h1 id="package-form-title">{{ $package->exists ? 'Ubah paket' : 'Tambah paket' }}</h1>
        <form class="account-form admin-form" method="POST" action="{{ $package->exists ? route('admin.packages.update', $package) : route('admin.packages.store') }}">
            @csrf
            @if ($package->exists) @method('PUT') @endif
            @foreach ([
                ['name', 'Nama', 'text'], ['slug', 'Slug', 'text'], ['description', 'Deskripsi', 'text'],
                ['old_price', 'Harga lama', 'number'], ['price', 'Harga', 'number'],
                ['chatbot_monthly_quota', 'Kuota chatbot bulanan', 'number'], ['sort_order', 'Urutan', 'number']
            ] as [$field, $label, $type])
                <div class="form-field">
                    <label for="{{ $field }}">{{ $label }}</label>
                    <input id="{{ $field }}" name="{{ $field }}" type="{{ $type }}" value="{{ old($field, $package->{$field}) }}" {{ in_array($field, ['name', 'slug', 'description', 'price', 'chatbot_monthly_quota', 'sort_order']) ? 'required' : '' }}>
                    @error($field) <p class="form-error">{{ $message }}</p> @enderror
                </div>
            @endforeach
            <div class="form-field">
                <label for="features">Fitur, satu per baris</label>
                <textarea id="features" name="features" rows="7" required>{{ old('features', implode("\n", $package->features ?? [])) }}</textarea>
                @error('features') <p class="form-error">{{ $message }}</p> @enderror
            </div>
            <label class="check-field"><input type="checkbox" name="cms_enabled" value="1" @checked(old('cms_enabled', $package->cms_enabled))> CMS aktif</label>
            <label class="check-field"><input type="checkbox" name="is_active" value="1" @checked(old('is_active', $package->exists ? $package->is_active : true))> Paket aktif</label>
            <button class="account-submit" type="submit">Simpan paket</button>
        </form>
    </section>
@endsection
