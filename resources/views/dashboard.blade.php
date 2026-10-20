@extends('auth.layout')

@section('title', 'Dashboard')

@section('header-action')
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button class="account-header-link account-link-button" type="submit">Keluar</button>
    </form>
@endsection

@section('content')
    <section class="dashboard-panel" aria-labelledby="dashboard-title">
        <p class="account-label">Dashboard customer</p>
        <h1 id="dashboard-title">Halo, {{ auth()->user()->name }}</h1>
        <div class="dashboard-empty">
            <h2>Kelola pesanan</h2>
            <p>Lihat status order dan kirim bukti pembayaran dari halaman pesanan.</p>
            <div class="admin-actions">
                <a href="{{ route('orders.index') }}">Pesanan saya</a>
                <a href="{{ route('home') }}#paket-website">Pilih paket website</a>
            </div>
        </div>
    </section>
@endsection
