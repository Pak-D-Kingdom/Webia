@extends('auth.layout')

@section('title', 'Pesanan Dibuat')

@section('content')
    <section class="dashboard-panel" aria-labelledby="order-success-title">
        <div class="customer-create-card customer-verify-panel">
            <span class="customer-verify-icon" aria-hidden="true">
                <span class="material-symbols-outlined">mark_email_read</span>
            </span>
            <h1 id="order-success-title">Pesanan kamu sudah dibuat</h1>
            <p>Nomor pesanan <strong>{{ session('guest_order.order_number') }}</strong> sudah masuk ke akun WEBIA.</p>
            <p>Kami mengirim email berisi email dan kata sandi untuk masuk ke portal ke <strong>{{ session('guest_order.email') }}</strong>. Setelah masuk, lengkapi pembayaran di halaman detail pesanan.</p>
            <div class="customer-create-submit">
                <a class="account-submit customer-create-submit-btn" href="{{ route('login') }}">Masuk ke portal</a>
            </div>
            <p class="customer-verify-note">Tidak menerima email? Periksa folder spam atau hubungi tim WEBIA.</p>
        </div>
    </section>
@endsection
