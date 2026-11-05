<section class="sec alt">
<div class="w">
<div class="sh"><h2>Mereka sudah merasakan segarnya</h2>
@if(empty($full))
<a class="btn" href="{{ $base }}/kisah">Semua kisah</a>
@endif
</div>
<div class="g2">
@foreach(array_slice($d['stories'], 0, $limit ?? 99) as $s)
<blockquote class="cd st"><img src="{{ $img }}{{ $s['i'] }}" alt="" width="600" height="450" loading="lazy"><div class="pad"><p>“{{ $s['q'] }}”</p><footer><strong>{{ $s['n'] }}</strong>, {{ $s['r'] }}<span class="tag">{{ $s['m'] }}</span></footer></div></blockquote>
@endforeach
</div>
</div>
</section>
