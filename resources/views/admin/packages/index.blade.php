@extends('auth.layout')

@section('title', 'Paket')
@section('header-action')
    <a class="account-header-link" href="{{ route('admin.dashboard') }}">Panel admin</a>
@endsection

@section('content')
    <section class="dashboard-panel" aria-labelledby="packages-title">
        <p class="account-label">Master data</p>
        <h1 id="packages-title">Paket WEBIA</h1>
        @if (session('status'))
            <p role="status">{{ session('status') }}</p>
        @endif
        <a class="account-submit" href="{{ route('admin.packages.create') }}">Tambah paket</a>

        <div class="admin-list">
            @forelse ($packages as $package)
                <article class="admin-list-item">
                    <div>
                        <h2>{{ $package->name }}</h2>
                        <p>Rp{{ number_format($package->price, 0, ',', '.') }} · {{ $package->is_active ? 'Aktif' : 'Nonaktif' }}</p>
                    </div>
                    <div class="admin-actions">
                        <a href="{{ route('admin.packages.edit', $package) }}">Ubah</a>
                        <form method="POST" action="{{ route('admin.packages.destroy', $package) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Hapus</button>
                        </form>
                    </div>
                </article>
            @empty
                <div class="dashboard-empty" role="status">
                    <h2>Belum ada paket</h2>
                    <p>Tambahkan paket pertama agar dapat dipilih saat order.</p>
                </div>
            @endforelse
        </div>
    </section>
@endsection
