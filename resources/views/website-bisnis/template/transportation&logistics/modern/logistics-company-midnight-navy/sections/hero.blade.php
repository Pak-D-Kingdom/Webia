@php
    $h   = $site['hero'];
    $rp  = $site['route_prefix'];
    $img = fn ($f) => asset($site['paths']['images'] . $f);
@endphp
<section class="lc-hero" aria-labelledby="lc-hero-title">
    <div class="lc-hero__media" style="--lc-hero-img: url('{{ $img('hero-bg.jpg') }}')" role="img" aria-label="Kapal kontainer, pesawat kargo, dan pelabuhan peti kemas saat senja"></div>

    <div class="lc-wrap lc-hero__in">
        <div class="lc-hero__copy">
            <span class="lc-pill">
                <span class="lc-pill__dot" aria-hidden="true"><svg class="lc-ico"><use href="#lc-i-play"></use></svg></span>
                {{ $h['badge'] }}
            </span>
            <h1 class="lc-hero__title" id="lc-hero-title">{{ $h['title'] }} <span class="lc-hero__hl">{{ $h['title_hl'] }}</span></h1>
            <p class="lc-hero__text">{{ $h['text'] }}</p>
            <div class="lc-hero__actions">
                <a class="lc-btn lc-btn--primary" href="{{ route($rp . 'quotation') }}">{{ $h['cta'] }}
                    <svg class="lc-ico" aria-hidden="true"><use href="#lc-i-arrow"></use></svg>
                </a>
                <button class="lc-btn lc-btn--ghost" type="button" data-lc-video-open aria-haspopup="dialog">
                    <span class="lc-btn__play" aria-hidden="true"><svg class="lc-ico"><use href="#lc-i-play"></use></svg></span>
                    {{ $h['video'] }}
                </button>
            </div>
        </div>

        <p class="lc-hero__script" aria-hidden="true">
            @foreach ($h['script'] as $line)<span>{{ $line }}</span>@endforeach
        </p>

        <ul class="lc-hero__card" aria-label="Keunggulan layanan">
            @foreach ($h['highlights'] as $f)
                <li class="lc-hero__feat">
                    <span class="lc-hero__feat-ico" aria-hidden="true"><svg class="lc-ico"><use href="#lc-i-{{ $f['icon'] === 'delivery' ? 'truck' : $f['icon'] }}"></use></svg></span>
                    <span class="lc-hero__feat-txt"><strong>{{ $f['title'] }}</strong><small>{{ $f['text'] }}</small></span>
                </li>
            @endforeach
        </ul>
    </div>
</section>

<div class="lc-modal" data-lc-video-modal role="dialog" aria-modal="true" aria-label="Video profil {{ $site['brand']['name'] }}" hidden>
    <div class="lc-modal__box">
        <button class="lc-modal__close" type="button" data-lc-video-close aria-label="Tutup video">
            <svg class="lc-ico" aria-hidden="true"><use href="#lc-i-close"></use></svg>
        </button>
        <div class="lc-modal__frame" data-lc-video-frame data-src="{{ $h['video_url'] }}">
            <p class="lc-modal__empty">Video profil perusahaan belum tersedia.</p>
        </div>
    </div>
</div>
