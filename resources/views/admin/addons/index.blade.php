@extends('auth.layout')

@section('title', 'Add-on')
@section('content')
    <section class="dashboard-panel" aria-labelledby="addons-title">
        <p class="account-label">Master data</p>
        <h1 id="addons-title">Add-on WEBIA</h1>
        @if (session('status')) <p role="status">{{ session('status') }}</p> @endif
        <a class="account-submit" href="{{ route('admin.addons.create') }}">Tambah add-on</a>
        <div class="admin-list">
            @forelse ($addons as $addon)
                <article class="admin-list-item">
                    <div><h2>{{ $addon->name }}</h2><p>{{ $addon->price === null ? 'Konsultasi' : 'Rp'.number_format($addon->price, 0, ',', '.') }}</p></div>
                    <div class="list-item-meta">
                        <span class="status-pill {{ $addon->is_active ? '' : 'status-pill-muted' }}">{{ $addon->is_active ? 'Aktif' : 'Nonaktif' }}</span>
                        <div class="admin-actions">
                            <a href="{{ route('admin.addons.edit', $addon) }}">Ubah</a>
                            <form method="POST" action="{{ route('admin.addons.destroy', $addon) }}">@csrf @method('DELETE')<button type="submit">Hapus</button></form>
                        </div>
                    </div>
                </article>
            @empty
                <div class="dashboard-empty" role="status"><h2>Belum ada add-on</h2><p>Tambahkan layanan tambahan pertama.</p></div>
            @endforelse
        </div>
    </section>
@endsection
