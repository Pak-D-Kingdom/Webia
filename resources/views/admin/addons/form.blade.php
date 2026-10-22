@extends('auth.layout')

@section('title', $addon->exists ? 'Ubah add-on' : 'Tambah add-on')
@section('header-action')
    <a class="account-header-link" href="{{ route('admin.addons.index') }}">Kembali</a>
@endsection

@section('content')
    <section class="dashboard-panel" aria-labelledby="addon-form-title">
        <p class="account-label">Master data</p>
        <h1 id="addon-form-title">{{ $addon->exists ? 'Ubah add-on' : 'Tambah add-on' }}</h1>
        <form class="account-form admin-form" method="POST" action="{{ $addon->exists ? route('admin.addons.update', $addon) : route('admin.addons.store') }}">
            @csrf
            @if ($addon->exists) @method('PUT') @endif
            <div class="form-field"><label for="name">Nama</label><input id="name" name="name" value="{{ old('name', $addon->name) }}" required>@error('name') <p class="form-error">{{ $message }}</p> @enderror</div>
            <div class="form-field"><label for="description">Deskripsi</label><textarea id="description" name="description" rows="4" required>{{ old('description', $addon->description) }}</textarea>@error('description') <p class="form-error">{{ $message }}</p> @enderror</div>
            <div class="form-field"><label for="price">Harga, kosongkan untuk konsultasi</label><input id="price" name="price" type="number" min="0" value="{{ old('price', $addon->price) }}">@error('price') <p class="form-error">{{ $message }}</p> @enderror</div>
            <label class="check-field"><input type="checkbox" name="is_active" value="1" @checked(old('is_active', $addon->exists ? $addon->is_active : true))> Add-on aktif</label>
            <button class="account-submit" type="submit">Simpan add-on</button>
        </form>
    </section>
@endsection
