@extends('auth.layout')

@section('title', $order->order_number)
@section('header-action')
    <a class="account-header-link" href="{{ route('orders.index') }}">Pesanan saya</a>
@endsection

@section('content')
    <section class="dashboard-panel" aria-labelledby="order-title">
        <p class="account-label">{{ $order->order_number }}</p>
        <h1 id="order-title">{{ $order->package->name }}</h1>
        @if (session('status')) <p role="status">{{ session('status') }}</p> @endif
        <div class="order-summary">
            <dl><div><dt>Status</dt><dd>{{ str_replace('_', ' ', ucfirst($order->status)) }}</dd></div><div><dt>Total</dt><dd>Rp{{ number_format($order->total_price, 0, ',', '.') }}</dd></div></dl>
        </div>

        @if (in_array($order->status, ['awaiting_payment', 'rejected']))
            <div class="dashboard-empty">
                <h2>Instruksi transfer</h2>
                @if (config('webia.payment_accounts'))
                    <ul>
                        @foreach (config('webia.payment_accounts') as $account)
                            <li><strong>{{ $account['bank'] }}</strong> {{ $account['number'] }} a.n. {{ $account['holder'] }}</li>
                        @endforeach
                    </ul>
                    <p>Transfer sesuai total ke salah satu rekening di atas, lalu unggah bukti di bawah.</p>
                    @if (config('webia.payment_note'))<p>{{ config('webia.payment_note') }}</p>@endif
                @else
                    <p>Transfer sesuai total ke rekening WEBIA yang dikonfirmasi tim, lalu unggah bukti di bawah.</p>
                @endif
            </div>
        @endif

        @if ($order->status === 'rejected' && $order->logs->where('to_status', 'rejected')->last()?->note)
            <div class="dashboard-empty">
                <h2>Catatan admin</h2>
                <p>{{ $order->logs->where('to_status', 'rejected')->last()->note }}</p>
            </div>
        @endif

        @if (in_array($order->status, ['awaiting_payment', 'rejected']))
            <form class="account-form admin-form" method="POST" action="{{ route('orders.receipt', $order) }}" enctype="multipart/form-data">
                @csrf
                <h2>Kirim bukti pembayaran</h2>
                @if ($order->status === 'rejected') <p class="form-error">Bukti sebelumnya ditolak. Periksa catatan admin dan unggah kembali.</p> @endif
                <div class="form-field"><label for="payment_receipt">Bukti transfer JPG, PNG, atau PDF (maks. 2 MB)</label><input id="payment_receipt" name="payment_receipt" type="file" accept=".jpg,.jpeg,.png,.pdf" required>@error('payment_receipt') <p class="form-error">{{ $message }}</p> @enderror</div>
                <div class="form-field"><label for="payment_note">Catatan (opsional)</label><textarea id="payment_note" name="payment_note" rows="3">{{ old('payment_note') }}</textarea>@error('payment_note') <p class="form-error">{{ $message }}</p> @enderror</div>
                <button class="account-submit" type="submit">Kirim bukti</button>
            </form>
        @elseif ($order->status === 'payment_uploaded')
            <div class="dashboard-empty" role="status"><h2>Menunggu verifikasi</h2><p>Admin sedang memeriksa bukti pembayaranmu.</p></div>
        @elseif ($order->status === 'paid')
            <div class="dashboard-empty" role="status"><h2>Pembayaran diterima</h2><p>Tim WEBIA akan melanjutkan order ke tahap pengisian data bisnis.</p></div>
        @endif
    </section>
@endsection
