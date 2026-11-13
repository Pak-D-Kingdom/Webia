{{-- Hero halaman dalam. Parameter: $title, $desc, $image, $alt (opsional), $cta (opsional [label, route]) --}}
@php $chips = $cfg['hero_chips'][$page] ?? []; @endphp
<section class="hr-pagehero">
    @include($vp.'leaves')
    <div class="hr-container hr-pagehero__grid">
        <div class="hr-pagehero__text">
            <nav class="hr-crumb" aria-label="Breadcrumb">
                <a href="{{ $go('home') }}">{{ $i('home') }}<span>Beranda</span></a>{{ $i('chevron-right') }}<span aria-current="page">{{ $title }}</span>
            </nav>
            <h1>{{ $title }}</h1>
            <p>{{ $desc }}</p>
            @if ($chips)
                <ul class="hr-pagehero__chips">
                    @foreach ($chips as $chip)
                        <li>{{ $i($chip[0]) }}<span>{{ $chip[1] }}</span></li>
                    @endforeach
                </ul>
            @endif
            <div class="hr-pagehero__cta">
                <a class="hr-btn hr-btn--primary" href="{{ $go($cta[1] ?? 'permintaan-penawaran') }}"><span>{{ $cta[0] ?? 'Konsultasi Sekarang' }}</span>{{ $i('arrow') }}</a>
                <button type="button" class="hr-btn hr-btn--ghost" data-chat-ask="Estimasi Biaya">{{ $i('bot') }}<span>Hitung Estimasi</span></button>
            </div>
        </div>
        <div class="hr-pagehero__media">
            <img src="{{ $img($image) }}" alt="{{ $alt ?? $title }}" width="900" height="560" loading="eager" decoding="async">
            <span class="hr-pagehero__badge">{{ $i('sparkle') }}<span>{{ $cfg['site']['name'] }}</span></span>
        </div>
    </div>
</section>
