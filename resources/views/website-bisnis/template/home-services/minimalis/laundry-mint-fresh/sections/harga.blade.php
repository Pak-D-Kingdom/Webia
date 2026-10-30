<article class="lw-card lw-card--price" data-lw-tabs>
    <header class="lw-card__head">
        <h2 class="lw-card__title">{{ $c['prices']['title'] }}</h2>
        <p>{{ $c['prices']['sub'] }}</p>
    </header>
    <div class="lw-tabs" role="tablist" aria-label="Jenis harga">
        <button type="button" role="tab" class="is-active" aria-selected="true" aria-controls="lw-pv-item" id="lw-pt-item">Per Item</button>
        <button type="button" role="tab" aria-selected="false" aria-controls="lw-pv-kg" id="lw-pt-kg" tabindex="-1">Per Kg</button>
    </div>
    @foreach (['item', 'kg'] as $mode)
        <ul class="lw-prices" role="tabpanel" id="lw-pv-{{ $mode }}" aria-labelledby="lw-pt-{{ $mode }}" @if ($mode === 'kg') hidden @endif>
            @foreach (array_slice($c['prices'][$mode], 0, $c['prices']['preview_count']) as $p)
                <li>
                    <svg class="lw-i"><use href="#i-{{ $p['icon'] }}"/></svg>
                    <span>{{ $p['name'] }}</span>
                    <b>{{ $rp($p['price']) }}</b>
                </li>
            @endforeach
        </ul>
    @endforeach
    <a class="lw-link" href="{{ $r('harga') }}">Lihat Lengkap <svg class="lw-i"><use href="#i-arrow"/></svg></a>
</article>
