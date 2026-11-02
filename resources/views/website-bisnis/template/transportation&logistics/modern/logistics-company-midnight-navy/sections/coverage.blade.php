@php
    $cv   = $site['coverage'];
    $rp   = $site['route_prefix'];
    $img  = fn ($f) => asset($site['paths']['images'] . $f);
    $full = $full ?? false;
@endphp
<div class="lc-block lc-cover{{ $full ? ' lc-cover--full' : '' }}">
    @unless ($full)
        <h2 class="lc-block__title"><a href="{{ route($rp . 'coverage') }}">{{ $cv['title'] }}</a></h2>
        <p class="lc-block__sub">{{ $cv['subtitle'] }}</p>
    @endunless

    <div class="lc-cover__map">
        <img src="{{ $img($cv['image']) }}" alt="Peta jaringan layanan global {{ $site['brand']['name'] }}" loading="lazy" width="1200" height="306">
    </div>

    <div class="lc-stats lc-stats--cover">
        @foreach ($cv['stats'] as $st)
            <div class="lc-stat">
                <strong class="lc-stat__num"@if (isset($st['count'])) data-lc-count="{{ $st['count'] }}" data-suffix="{{ $st['suffix'] }}"@endif>{{ isset($st['count']) ? number_format($st['count'], 0, ',', '.') . $st['suffix'] : $st['text'] }}</strong>
                <span class="lc-stat__lbl">{{ $st['label'] }}</span>
                @if ($full)<span class="lc-stat__desc">{{ $st['desc'] }}</span>@endif
            </div>
        @endforeach
    </div>
</div>
