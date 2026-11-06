{{-- Halaman Program Kami --}}
@include($v('partials.page-header'))

<section class="fh-sec fh-sec--tight">
    <div class="fh-wrap">
        <nav class="fh-chips" aria-label="Lompat ke program">
            @foreach ($cfg['programs'] as $p)
                <a href="#{{ $p['key'] }}"><img src="{{ $img($p['icon']) }}" alt="" width="26" height="26">{{ $p['title'] }}</a>
            @endforeach
        </nav>
    </div>
</section>

@foreach ($cfg['programs'] as $p)
    <section class="fh-sec fh-sec--tight" id="{{ $p['key'] }}">
        <div class="fh-wrap">
            <article class="fh-feature {{ $loop->even ? 'fh-feature--flip' : '' }} fh-reveal">
                <div class="fh-feature__media">
                    <img src="{{ $img($p['image']) }}" alt="Kegiatan program {{ $p['title'] }}" width="528" height="138" loading="lazy">
                    <div class="fh-feature__stat"><strong>{{ $p['stat'] }}</strong><span>{{ $p['stat_label'] }}</span></div>
                </div>
                <div class="fh-feature__body">
                    <img class="fh-feature__icon" src="{{ $img($p['icon']) }}" alt="" width="56" height="56" loading="lazy">
                    <h2>{{ $p['title'] }}</h2>
                    <p>{{ $p['text'] }}</p>
                    <ul class="fh-checks">
                        @foreach ($p['points'] as $pt)
                            <li>{{ $icon('check') }}<span>{{ $pt }}</span></li>
                        @endforeach
                    </ul>
                    <div class="fh-feature__actions">
                        <a class="fh-btn fh-btn--dark fh-btn--sm" href="{{ $url('donasi') }}">Dukung Program Ini {{ $icon('arrow') }}</a>
                        <a class="fh-more" href="{{ $url('relawan') }}">Jadi relawan {{ $icon('arrow') }}</a>
                    </div>
                </div>
            </article>
        </div>
    </section>
@endforeach

@include($v('partials.cta-band'), [
    'ctaTitle' => 'Satu program, ribuan senyum',
    'ctaText' => 'Setiap donasi dan waktu yang Anda berikan membantu program kami menjangkau lebih banyak keluarga.',
    'ctaLabel' => 'Donasi Sekarang', 'ctaUrl' => $url('donasi'),
    'ctaLabel2' => 'Lihat Dampak', 'ctaUrl2' => $url('dampak'),
])
