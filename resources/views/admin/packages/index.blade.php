@extends('auth.layout')

@section('title', 'Paket Lisensi')

@section('content')
    <header class="ops-header">
        <div class="ops-header-copy">
            <span class="ops-pill"><span aria-hidden="true"></span> Master data</span>
            <h1 id="packages-title">Paket Lisensi</h1>
            <p>{{ $packages->count() }} paket; harga &amp; kuota chatbot yang ditawarkan saat pemesanan.</p>
        </div>
        <div class="ops-actionbar">
            <a class="ops-refresh" href="{{ route('admin.packages.create') }}"><span class="material-symbols-outlined" aria-hidden="true">add</span>Tambah paket</a>
        </div>
    </header>

    @if (session('status'))
        <p role="status">{{ session('status') }}</p>
    @endif

    <div class="catalog-grid">
        @forelse ($packages as $package)
            <article class="catalog-card {{ $package->is_active ? '' : 'catalog-card-off' }}">
                <header>
                    <h2>{{ $package->name }}</h2>
                    <span class="status-pill {{ $package->is_active ? 'status-pill--success' : 'status-pill-muted' }}">{{ $package->is_active ? 'Aktif' : 'Nonaktif' }}</span>
                </header>
                <p class="catalog-price">Rp {{ number_format($package->price, 0, ',', '.') }}{{ $package->old_price ? ' <s>Rp '.number_format($package->old_price, 0, ',', '.').'</s>' : '' }}</p>
                @if (is_array($package->features) && $package->features !== [])
                    <ul>
                        @foreach (array_slice($package->features, 0, 3) as $feature)
                            <li>{{ $feature }}</li>
                        @endforeach
                    </ul>
                @endif
                <footer>
                    <a href="{{ route('admin.packages.edit', $package) }}">Ubah</a>
                    <form method="POST" action="{{ route('admin.packages.destroy', $package) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Hapus</button>
                    </form>
                </footer>
            </article>
        @empty
            <div class="dashboard-empty" role="status">
                <h2>Belum ada paket</h2>
                <p>Tambahkan paket pertama agar dapat dipilih saat order.</p>
            </div>
        @endforelse
    </div>
@endsection
