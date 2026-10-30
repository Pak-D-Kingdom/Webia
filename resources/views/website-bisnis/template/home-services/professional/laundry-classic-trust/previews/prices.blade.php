<section class="card b-price" aria-labelledby="pv-price" data-tabs>
    <header class="card__head"><div><h2 id="pv-price">Daftar Harga</h2><p>Transparan, jelas, dan sesuai kualitas layanan.</p></div></header>
    <div class="seg" role="tablist" aria-label="Jenis harga">
        <button type="button" role="tab" class="is-on" aria-selected="true" data-tab="item">Per Item</button>
        <button type="button" role="tab" aria-selected="false" data-tab="kg">Per Kg</button>
    </div>
    @foreach (['item', 'kg'] as $mode)
        <ul class="plist" role="tabpanel" data-panel="{{ $mode }}" @if ($mode === 'kg') hidden @endif>
            @foreach (array_slice($c['prices'][$mode], 0, 5) as $p)
                <li><svg class="ic"><use href="#i-{{ $p['icon'] }}"/></svg><span>{{ $p['name'] }}</span><b>{{ $rp($p['price']) }}</b></li>
            @endforeach
        </ul>
    @endforeach
    <a class="link link--bottom" href="{{ $url('prices') }}">Lihat Lengkap <svg class="ic"><use href="#i-arrow"/></svg></a>
</section>
