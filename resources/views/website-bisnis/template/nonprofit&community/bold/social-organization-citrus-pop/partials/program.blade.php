<section class="sec alt">
<div class="w">
<div class="sh"><h2>Program yang jalan tiap pekan</h2>
@if(empty($full))
<a class="btn" href="{{ $base }}/program">Semua program</a>
@endif
</div>
<div class="g3">
@foreach(array_slice($d['programs'], 0, $limit ?? 99) as $p)
<article class="cd"><img src="{{ $img }}{{ $p['i'] }}" alt="Program {{ $p['t'] }}" width="600" height="450" loading="lazy"><div class="pad"><span class="tag">{{ $p['w'] }}</span><h3>{{ $p['t'] }}</h3><p>{{ $p['d'] }}</p></div></article>
@endforeach
</div>
</div>
</section>
