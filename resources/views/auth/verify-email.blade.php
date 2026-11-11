@extends('auth.layout')

@section('title', 'Verifikasi Email')

@section('content')
    <main class="auth-panel auth-page">
        <div class="auth-card">
            <p class="auth-pill">Keamanan Akun</p>
            <h1>Verifikasi email Anda</h1>
            <p class="auth-card-lede">Kami mengirim tautan verifikasi ke <strong>{{ auth()->user()->email }}</strong>. Buka tautan tersebut untuk melanjutkan ke portal WEBIA.</p>

            @if (session('status') === 'verification-link-sent')
                <p class="auth-status" role="status">Tautan verifikasi baru sudah dikirim.</p>
            @endif

            <form method="POST" action="{{ route('verification.send') }}" class="auth-form">
                @csrf
                <button type="submit" class="auth-submit">Kirim ulang tautan</button>
            </form>

            <form method="POST" action="{{ route('logout') }}" class="auth-form">
                @csrf
                <button type="submit" class="auth-back">Keluar dari akun</button>
            </form>
        </div>
    </main>
@endsection
