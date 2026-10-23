<section id="lokasi" class="panel{{ !empty($wide) ? ' panel--wide' : '' }}" aria-labelledby="t-loc">
    <h2 id="t-loc"><svg class="i" aria-hidden="true"><use href="#i-pin"/></svg> Lokasi &amp; Jam Buka</h2>
    <div class="loc">
        <div class="map">
            <iframe title="Peta lokasi {{ config('cafe.name') }}" loading="lazy" referrerpolicy="no-referrer-when-downgrade"
                    src="https://www.google.com/maps?q={{ urlencode(config('cafe.address') . ' ' . config('cafe.city_short')) }}&amp;output=embed"></iframe>
        </div>
        <div class="loc__info">
            <address><svg class="i" aria-hidden="true"><use href="#i-pin"/></svg><span>{{ config('cafe.address') }}<br>{{ config('cafe.city') }}</span></address>
            <h3 class="sub"><svg class="i" aria-hidden="true"><use href="#i-clock"/></svg> Jam Operasional</h3>
            <table class="hours"><tbody>
                @foreach (config('cafe.hours') as $day => $time)
                    <tr><th scope="row">{{ $day }}</th><td>{{ $time }}</td></tr>
                @endforeach
            </tbody></table>
        </div>
    </div>
</section>
