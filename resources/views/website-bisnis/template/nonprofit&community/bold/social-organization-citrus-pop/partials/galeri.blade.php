<section class="sec">
<div class="w">
<div class="sh"><h2>Potret kerja bareng</h2>
@if(empty($full))
<a class="btn" href="{{ $base }}/galeri">Buka galeri</a>
@endif
</div>
<div class="gal">
@foreach(array_slice($d['gallery'], 0, $limit ?? 99) as $g)
<button class="gi" type="button" data-lb="{{ $img }}{{ $g['i'] }}" data-cap="{{ $g['c'] }}"><img src="{{ $img }}{{ $g['i'] }}" alt="{{ $g['c'] }}" width="600" height="450" loading="lazy"><span>{{ $g['c'] }}</span></button>
@endforeach
</div>
</div>
<div class="lb" data-lbox hidden><button type="button" aria-label="Tutup" data-lb-close>×</button><figure><img src="" alt=""><figcaption></figcaption></figure></div>
</section>
