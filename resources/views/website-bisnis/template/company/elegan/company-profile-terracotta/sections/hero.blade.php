@php $h = $c['hero']; @endphp
<section id="beranda" class="cp-hero" aria-labelledby="cp-h1">
    <div class="cp-hero__bg cp-ph">
        <img src="{{ $img($h['image']) }}" alt="Gedung kantor {{ $c['brand']['name'] }}" onerror="this.remove()">
    </div>
    <img class="cp-leaf" src="{{ $img('leaf.svg') }}" alt="" aria-hidden="true" onerror="this.remove()">
    <div class="cp-wrap cp-hero__in">
        <p class="cp-eyebrow">
            @foreach ($h['eyebrow'] as $e)<span>{{ $e }}</span>@endforeach
        </p>
        <h1 id="cp-h1">{{ $h['title'] }} <em>{{ $h['accent'] }}</em></h1>
        <p class="cp-hero__text">{{ $h['text'] }}</p>
        <div class="cp-hero__cta">
            <a class="cp-btn" href="{{ $link($h['cta']) }}">{{ $h['cta']['t'] }} {{ $ic('arrow') }}</a>
            <a class="cp-btn cp-btn--outline" href="{{ $link($h['cta2']) }}">{{ $ic('users') }} {{ $h['cta2']['t'] }}</a>
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
