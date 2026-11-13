{{-- Hero halaman dalam. Parameter: $title, $desc, $image, $alt (opsional), $cta (opsional [label, route]) --}}
<section class="hr-pagehero">
    @include($vp.'leaves')
    <div class="hr-container hr-pagehero__grid">
        <div class="hr-pagehero__text">
            <nav class="hr-crumb" aria-label="Breadcrumb">
                <a href="{{ $go('home') }}">Beranda</a>{{ $i('chevron-right') }}<span aria-current="page">{{ $title }}</span>
            </nav>
            <h1>{{ $title }}</h1>
            <p>{{ $desc }}</p>
            <div class="hr-pagehero__cta">
                <a class="hr-btn hr-btn--primary" href="{{ $go($cta[1] ?? 'permintaan-penawaran') }}"><span>{{ $cta[0] ?? 'Konsultasi Sekarang' }}</span>{{ $i('arrow') }}</a>
                <a class="hr-btn hr-btn--ghost" href="{{ $go('home') }}">{{ $i('home') }}<span>Kembali ke Beranda</span></a>
            </div>
        </div>
        <div class="hr-pagehero__media">
            <img src="{{ $img($image) }}" alt="{{ $alt ?? $title }}" width="900" height="560" loading="eager" decoding="async">
        </div>
    </div>
</section>
