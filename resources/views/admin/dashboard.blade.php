@extends('auth.layout')

@section('title', 'Admin')

@section('header-action')
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button class="account-header-link account-link-button" type="submit">Keluar</button>
    </form>
@endsection

@section('content')
    <section class="dashboard-panel" aria-labelledby="admin-title">
        <p class="account-label">Admin WEBIA</p>
        <h1 id="admin-title">Panel pengelolaan</h1>
        <div class="dashboard-empty">
            <h2>Master data</h2>
            <p>Kelola layanan yang tersedia untuk proses order customer.</p>
            <div class="admin-actions">
                <a href="{{ route('admin.packages.index') }}">Kelola paket</a>
                <a href="{{ route('admin.addons.index') }}">Kelola add-on</a>
                <a href="{{ route('admin.orders.index') }}">Kelola pesanan</a>
            </div>
        </div>
    </section>
@endsection
