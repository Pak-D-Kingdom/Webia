{{-- Halaman Misi & Visi --}}
@include($v('partials.page-header'))

<section class="fh-sec">
    <div class="fh-wrap fh-split">
        <article class="fh-vision fh-reveal">
            <img class="fh-vision__art" src="{{ $img('mission-globe.png') }}" alt="" aria-hidden="true" width="462" height="384" loading="lazy">
            <h2>Visi Kami</h2>
            <p class="fh-vision__quote">{{ $cfg['mission']['vision'] }}</p>
            <p class="fh-vision__sub">{{ $cfg['mission']['text'] }}</p>
        </article>

        <div class="fh-reveal">
            <div class="fh-sec__head fh-sec__head--left">
                <h2>Misi Kami</h2>
                <p>{{ $cfg['mission']['heading'] }}.</p>
            </div>
            <ol class="fh-missions">
                @foreach ($cfg['mission']['missions'] as $m)
                    <li>
                        <span class="fh-missions__n">{{ $loop->iteration }}</span>
                        <div><h3>{{ $m['title'] }}</h3><p>{{ $m['text'] }}</p></div>
                    </li>
                @endforeach
            </ol>
        </div>
    </div>
</section>

<section class="fh-sec fh-sec--soft">
    <div class="fh-wrap">
        <div class="fh-sec__head fh-reveal">
            <h2>Nilai yang Kami Pegang</h2>
            <p>Empat nilai yang memandu setiap keputusan dan kegiatan kami.</p>
        </div>
        <ul class="fh-grid fh-grid--4">
            @foreach ($cfg['mission']['values'] as $val)
                <li class="fh-panel fh-reveal">
                    <span class="fh-panel__ic">{{ $icon(['heart', 'shield', 'users', 'leaf'][$loop->index] ?? 'leaf') }}</span>
                    <h3>{{ $val['title'] }}</h3>
                    <p>{{ $val['text'] }}</p>
                </li>
            @endforeach
        </ul>
    </div>
</section>

<section class="fh-sec">
    <div class="fh-wrap">
        <div class="fh-sec__head fh-reveal">
            <h2>Perjalanan GreenHope</h2>
            <p>Dari gerakan kecil bersama warga hingga ratusan ribu penerima manfaat.</p>
        </div>
        <ol class="fh-timeline">
            @foreach ($cfg['mission']['timeline'] as $t)
                <li class="fh-reveal">
                    <span class="fh-timeline__year">{{ $t['year'] }}</span>
                    <h3>{{ $t['title'] }}</h3>
                    <p>{{ $t['text'] }}</p>
                </li>
            @endforeach
        </ol>
    </div>
</section>

@include($v('partials.cta-band'), [
    'ctaTitle' => 'Mari tumbuh bersama GreenHope',
    'ctaText' => 'Dukung program kami lewat donasi, atau bergabunglah sebagai relawan.',
    'ctaLabel' => 'Donasi Sekarang', 'ctaUrl' => $url('donasi'),
    'ctaLabel2' => 'Jadi Relawan', 'ctaUrl2' => $url('relawan'),
])
