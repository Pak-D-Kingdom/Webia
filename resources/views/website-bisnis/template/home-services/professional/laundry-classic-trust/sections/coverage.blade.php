<section class="sec">
    <div class="lw-wrap covp">
        <div class="mapbox mapbox--lg" data-map>
            <img src="{{ $img('map.svg') }}" alt="Peta area layanan FreshWash" loading="lazy">
            @foreach ($c['areas'] as $i => $a)
                <button type="button" class="pin pin--btn" style="left:{{ $a['x'] }}%;top:{{ $a['y'] }}%" data-area="{{ $a['name'] }}" aria-label="Area {{ $a['name'] }}">
                    <svg class="ic"><use href="#i-pin"/></svg><span>{{ $a['name'] }}</span>
                </button>
            @endforeach
        </div>

        <div class="covp__side">
            <ul class="arealist">
                @foreach ($c['areas'] as $a)
                    <li class="card card--pad area" data-area-card="{{ $a['name'] }}">
                        <h2>{{ $a['name'] }}</h2>
                        <p>{{ $a['note'] }}</p>
                        <dl><div><dt>Ongkir</dt><dd>{{ $a['fee'] }}</dd></div><div><dt>Estimasi</dt><dd>{{ $a['eta'] }}</dd></div></dl>
                    </li>
                @endforeach
            </ul>

            <form class="card card--pad checker" data-area-check novalidate>
                <h2>Cek Area Layanan</h2>
                <label class="field"><span>Ketik kota / kecamatan Anda</span>
                    <input type="text" name="area" list="area-list" placeholder="Contoh: Sidoarjo" required></label>
                <datalist id="area-list">@foreach ($c['areas'] as $a)<option value="{{ $a['name'] }}">@endforeach</datalist>
                <button class="btn btn--navy" type="submit">Cek Area <svg class="ic"><use href="#i-arrow"/></svg></button>
                <p class="checker__res" data-area-result role="status" aria-live="polite"></p>
            </form>
        </div>
    </div>
</section>
