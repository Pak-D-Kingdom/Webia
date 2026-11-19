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

        @php
            $invoiceCache = \App\Models\HostingInvoice::query()
                ->whereIn('hosting_service_id', auth()->user()->hostingServices()->select('id'))
                ->get()
                ->keyBy('id');
        @endphp

        @if ($notifications->isEmpty())
            <div class="dashboard-empty"><h2>Belum ada notifikasi</h2><p>Pengingat tagihan hosting akan tampil di sini.</p></div>
        @else
            <div class="admin-list customer-recent-list">
                @foreach ($notifications as $notification)
                    @php
                        $invoice = isset($notification->data['hosting_invoice_id'])
                            ? $invoiceCache[(int) $notification->data['hosting_invoice_id']] ?? null
                            : null;
                    @endphp
                    <article class="admin-list-item {{ $notification->read_at ? '' : 'bg-surface-container-low' }}">
                        <div>
                            <p class="account-label">{{ $notification->read_at ? 'Sudah dibaca' : 'Baru' }}</p>
                            <h2>{{ data_get($notification->data, 'invoice_number', 'Tagihan hosting') }}</h2>
                            <p>{{ data_get($notification->data, 'message') }}</p>
                        </div>
                        <div class="list-item-meta">
                            <button type="button" class="customer-detail-btn" data-modal-open="#notif-detail-{{ $notification->id }}">Detail</button>
                            <button type="button" class="customer-detail-btn" data-modal-open="#notif-delete-{{ $notification->id }}">Hapus</button>
                        </div>
                    </article>
                @endforeach
            </div>
            {{ $notifications->links() }}
        @endif

        @foreach ($notifications as $notification)
            @php
                $invoice = isset($notification->data['hosting_invoice_id'])
                    ? $invoiceCache[(int) $notification->data['hosting_invoice_id']] ?? null
                    : null;
            @endphp
            <x-customer-modal id="notif-detail-{{ $notification->id }}" title="Detail notifikasi" :subtitle="data_get($notification->data, 'message')" icon="info">
                <div class="customer-modal-rows">
                    <div class="customer-modal-row"><span>Invoice</span><span>{{ data_get($notification->data, 'invoice_number', '-') }}</span></div>
                    @if ($invoice)
                        <div class="customer-modal-row"><span>Jatuh tempo</span><span>{{ $invoice->due_at->translatedFormat('d M Y') }}</span></div>
                        <div class="customer-modal-row"><span>Total</span><span>Rp{{ number_format($invoice->amount, 0, ',', '.') }}</span></div>
                    @endif
                    <div class="customer-modal-row"><span>Status</span><span>{{ $notification->read_at ? 'Sudah dibaca' : 'Belum dibaca' }}</span></div>
                </div>
                <div class="customer-modal-actions" style="margin-top: 1.1rem;">
                    <button class="customer-btn" type="button" data-modal-close>Tutup</button>
                    <form method="POST" action="{{ route('notifications.read', $notification->id) }}" style="display:contents;">
                        @csrf
                        <button class="customer-btn customer-btn--primary" type="submit">Lihat tagihan</button>
                    </form>
                </div>
            </x-customer-modal>

            <x-customer-modal id="notif-delete-{{ $notification->id }}" tone="danger" title="Hapus notifikasi?" subtitle="Notifikasi akan dihapus dari daftar portal." icon="warning">
                <div class="customer-modal-rows">
                    <div class="customer-modal-row"><span>Invoice</span><span>{{ data_get($notification->data, 'invoice_number', '-') }}</span></div>
                    <div class="customer-modal-row"><span>Status</span><span>{{ $notification->read_at ? 'Sudah dibaca' : 'Belum dibaca' }}</span></div>
                    <div class="customer-modal-row"><span>Dampak</span><span>Tidak dapat dipulihkan</span></div>
                </div>
                <div class="customer-modal-actions" style="margin-top: 1.1rem;">
                    <button class="customer-btn" type="button" data-modal-close>Kembali</button>
                    <form method="POST" action="{{ route('notifications.destroy', $notification->id) }}" style="display:contents;">
                        @csrf
                        @method('DELETE')
                        <button class="customer-btn customer-btn--danger" type="submit">Hapus notifikasi</button>
                    </form>
                </div>
            </x-customer-modal>
        @endforeach
    </section>
@endsection
