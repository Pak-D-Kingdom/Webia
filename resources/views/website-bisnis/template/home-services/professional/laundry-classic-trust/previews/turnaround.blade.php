<section class="card b-turn" aria-labelledby="pv-turn">
    <header class="card__head"><div><h2 id="pv-turn">Estimasi Waktu Pengerjaan</h2><p>Pilih layanan, sesuaikan dengan kebutuhan Anda.</p></div></header>
    <ul class="tiles tiles--4">
        @foreach ($c['turnaround'] as $t)
            <li><a class="tile" href="{{ $url('turnaround') }}">
                <span class="bub bub--sm"><svg class="ic"><use href="#i-{{ $t['icon'] }}"/></svg></span>
                <strong>{{ $t['name'] }}</strong><em>{{ $t['time'] }}</em>
            </a></li>
        @endforeach
    </ul>
</section>
