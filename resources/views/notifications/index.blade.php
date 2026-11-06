@extends('auth.layout')

@section('title', 'Notifikasi')

@section('content')
    <section class="dashboard-panel" aria-labelledby="notifications-title">
        <div class="customer-page-head">
            <div>
                <h1 id="notifications-title">Notifikasi</h1>
                <p>Pengingat tagihan dan status layanan hosting.</p>
            </div>
            @if (auth()->user()->unreadNotifications()->exists())
                <form method="POST" action="{{ route('notifications.read-all') }}">
                    @csrf
                    <button class="customer-detail-btn" type="submit">Tandai semua dibaca</button>
                </form>
            @endif
        </div>

        @if (session('status')) <p role="status">{{ session('status') }}</p> @endif

        @if ($notifications->isEmpty())
            <div class="dashboard-empty"><h2>Belum ada notifikasi</h2><p>Pengingat tagihan hosting akan tampil di sini.</p></div>
        @else
            <div class="admin-list customer-recent-list">
                @foreach ($notifications as $notification)
                    <article class="admin-list-item {{ $notification->read_at ? '' : 'bg-surface-container-low' }}">
                        <div>
                            <p class="account-label">{{ $notification->read_at ? 'Sudah dibaca' : 'Baru' }}</p>
                            <h2>{{ data_get($notification->data, 'invoice_number', 'Tagihan hosting') }}</h2>
                            <p>{{ data_get($notification->data, 'message') }}</p>
                        </div>
                        <form method="POST" action="{{ route('notifications.read', $notification->id) }}">
                            @csrf
                            <button class="customer-detail-btn" type="submit">Lihat tagihan</button>
                        </form>
                    </article>
                @endforeach
            </div>
            {{ $notifications->links() }}
        @endif
    </section>
@endsection
