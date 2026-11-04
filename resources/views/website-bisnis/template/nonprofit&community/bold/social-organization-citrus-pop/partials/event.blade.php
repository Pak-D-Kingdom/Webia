<section class="sec">
<div class="w">
<div class="sh"><h2>Agenda terdekat</h2>
@if(empty($full))
<a class="btn" href="{{ $base }}/event">Semua agenda</a>
@endif
</div>
@if(!empty($full))
<div class="flt" role="group" aria-label="Filter kategori"><button class="on" type="button" data-f="all">Semua</button><button type="button" data-f="Lingkungan">Lingkungan</button><button type="button" data-f="Pendidikan">Pendidikan</button><button type="button" data-f="Kesehatan">Kesehatan</button></div>
@endif
<div class="evs">
@foreach(array_slice($d['events'], 0, $limit ?? 99) as $e)
<article class="ev" data-c="{{ $e['c'] }}"><div class="ev-d"><b>{{ $e['d'] }}</b>{{ $e['m'] }}</div><div class="ev-i"><h3>{{ $e['t'] }}</h3><p>{{ $e['p'] }} · pukul {{ $e['j'] }}</p></div><span class="tag">{{ $e['c'] }}</span><a class="btn btn-o" href="{{ $base }}/daftar">Ikut</a></article>
@endforeach
</div>
</div>
</section>
