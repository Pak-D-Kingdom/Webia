@php $h = $c['hero']; @endphp
<section id="beranda" class="cp-hero" aria-labelledby="cp-h1">
    <div class="cp-hero__bg cp-ph">
        <img src="{{ $img($h['image']) }}" alt="Gedung kantor {{ $c['brand']['name'] }}" onerror="this.remove()">
    </div>
    <div class="cp-wrap cp-hero__in">
        <p class="cp-eyebrow">
            @foreach ($h['eyebrow'] as $e)<span>{{ $e }}</span>@endforeach
        </p>
        <h1 id="cp-h1">{{ $h['title'] }} <em>{{ $h['accent'] }}</em></h1>
        <p class="cp-hero__text">{{ $h['text'] }}</p>
        <div class="cp-hero__cta">
            <a class="cp-btn" href="{{ $h['cta'][1] }}">{{ $h['cta'][0] }} {{ $ic('arrow') }}</a>
            <a class="cp-btn cp-btn--ghost" href="{{ $h['cta2'][1] }}"><span class="cp-play">{{ $ic('play') }}</span>{{ $h['cta2'][0] }}</a>
        </div>
    </div>
    <p class="cp-hero__quote" aria-hidden="true">{{ $h['quote'][0] }}<br>{{ $h['quote'][1] }}</p>
</section>

<div class="cp-hl">
    <ul class="cp-wrap cp-hl__in">
        @foreach ($c['highlights'] as $i)
            <li>
                <span class="cp-ico">{{ $ic($i['i']) }}</span>
                <div><strong>{{ $i['t'] }}</strong><small>{{ $i['d'] }}</small></div>
            </li>
        @endforeach
    </ul>
</div>
