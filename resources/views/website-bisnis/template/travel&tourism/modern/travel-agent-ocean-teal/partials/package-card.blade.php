{{-- Kartu paket. Param: $p, $full (bool) --}}
<article class="ta-pkg" data-cat="{{ $p['dest'] }}" data-name="{{ mb_strtolower($p['title'] . ' ' . $p['location']) }}">
    <a class="ta-pkg__media" href="{{ $routes['itinerary'] }}#{{ $p['slug'] }}" tabindex="-1" aria-hidden="true">
        <img src="{{ $img($p['image']) }}" alt="" loading="lazy">
        @if ($p['badge'])
            <span class="ta-badge">{{ $icon('star', 'ta-ic--fill') }} {{ $p['badge'] }}</span>
        @endif
    </a>
    <div class="ta-pkg__body">
        <h3 class="ta-pkg__title">{{ $p['title'] }}</h3>
        <ul class="ta-meta">
            <li>{{ $icon('calendar') }}{{ $p['duration'] }}</li>
            <li>{{ $icon('pin') }}{{ $p['location'] }}</li>
        </ul>
        @if ($full)
            <ul class="ta-checks">
                @foreach ($p['includes'] as $inc)<li>{{ $icon('check') }}{{ $inc }}</li>@endforeach
            </ul>
        @endif
        <div class="ta-pkg__foot">
            <p class="ta-pkg__price"><strong>{{ $rp($p['price']) }}</strong>@if ($full)<small>/orang</small>@endif</p>
            <a class="ta-btn ta-btn--outline ta-btn--xs" href="{{ $routes['itinerary'] }}#{{ $p['slug'] }}">Lihat Detail {{ $icon('arrow') }}</a>
        </div>
    </div>
</article>
