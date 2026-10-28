@php $h = $f['hero']; $full = $full ?? false; @endphp
<section class="rf-hero {{ $full ? 'rf-hero--full' : '' }}" aria-labelledby="rf-hero-title">
    <img class="rf-hero__img" src="{{ $img($h['image']) }}" alt="Ruang tamu hangat dengan sofa, meja kopi kayu, dan tanaman hijau" fetchpriority="high">
    <div class="rf-hero__shade" aria-hidden="true"></div>

    <div class="rf-container rf-hero__in">
        <div class="rf-hero__copy">
            <p class="rf-eyebrow rf-eyebrow--light">{{ $h['eyebrow'] }}</p>
            <h1 id="rf-hero-title">{{ $h['title'][0] }}<br>{{ $h['title'][1] }} <em>{{ $h['accent'] }}</em></h1>
            <p class="rf-hero__text">{{ $h['text'] }}</p>
            <div class="rf-hero__actions">
                <a class="rf-btn rf-btn--outline-light" href="{{ $r('catalog') }}">Jelajahi Katalog {!! $icon('arrow-right') !!}</a>
                <button class="rf-play" type="button" data-rf-video-open aria-haspopup="dialog">
                    <span class="rf-play__disc">{!! $icon('play') !!}</span><span>Tonton Video</span>
                </button>
            </div>
        </div>
        <p class="rf-hero__script" aria-hidden="true"><span class="rf-hero__spark">+</span>{{ $h['script'][0] }}<br>{{ $h['script'][1] }}</p>
    </div>

    <dialog class="rf-modal rf-modal--video" id="rf-video" aria-label="Video profil RusticFurni">
        <button class="rf-modal__close" type="button" data-rf-modal-close aria-label="Tutup video">{!! $icon('close') !!}</button>
        <div class="rf-video" data-rf-video-box>
            @if ($h['video_url'])
                <iframe data-src="{{ $h['video_url'] }}" title="Video profil RusticFurni" allow="autoplay; encrypted-media; picture-in-picture" allowfullscreen loading="lazy"></iframe>
            @else
                <img src="{{ $img($h['image']) }}" alt="">
                <p>Video profil segera hadir. Sementara itu, kunjungi galeri proyek kami atau hubungi tim lewat WhatsApp.</p>
            @endif
        </div>
    </dialog>
</section>

@if ($full)
    <section class="rf-section">
        <div class="rf-container">
            <ul class="rf-highlights">
                @foreach ($h['highlights'] as $item)
                    <li class="rf-card rf-highlight">
                        <span class="rf-icondisc">{!! $icon($item['icon']) !!}</span>
                        <h2>{{ $item['title'] }}</h2>
                        <p>{{ $item['text'] }}</p>
                    </li>
                @endforeach
            </ul>
        </div>
    </section>
@endif
