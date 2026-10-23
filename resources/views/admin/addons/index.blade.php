@extends('auth.layout')

@section('title', 'Add-on')

@section('content')
    <header class="ops-header">
        <div class="ops-header-copy">
            <span class="ops-pill"><span aria-hidden="true"></span> Master data</span>
            <h1 id="addons-title">Add-on Layanan</h1>
            <p>{{ $addons->count() }} layanan tambahan yang bisa di-tambahkan ke pesanan.</p>
        </div>
        <div class="ops-actionbar">
            <a class="ops-refresh" href="{{ route('admin.addons.create') }}"><span class="material-symbols-outlined" aria-hidden="true">add</span>Tambah add-on</a>
        </div>
    </header>

    @if (session('status'))
        <p role="status">{{ session('status') }}</p>
    @endif

    <div class="catalog-grid catalog-grid-narrow">
        @forelse ($addons as $addon)
            <article class="catalog-card {{ $addon->is_active ? '' : 'catalog-card-off' }}">
                <header>
                    <h2>{{ $addon->name }}</h2>
                    <span class="status-pill {{ $addon->is_active ? 'status-pill--success' : 'status-pill-muted' }}">{{ $addon->is_active ? 'Aktif' : 'Nonaktif' }}</span>
                </header>
                <p class="catalog-price">{{ $addon->price === null ? 'Konsultasi' : 'Rp '.number_format($addon->price, 0, ',', '.') }}</p>
                <footer>
                    <a href="{{ route('admin.addons.edit', $addon) }}">Ubah</a>
                    <form method="POST" action="{{ route('admin.addons.destroy', $addon) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Hapus</button>
                    </form>
                </footer>
            </article>
        @empty
            <div class="dashboard-empty" role="status">
                <h2>Belum ada add-on</h2>
                <p>Tambahkan layanan tambahan pertama.</p>
            </div>
        @endforelse
    </div>
@endsection
