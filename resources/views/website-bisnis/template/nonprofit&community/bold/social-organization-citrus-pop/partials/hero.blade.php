<section class="hero">
<div class="w hero-g">
<div class="hero-t">
<span class="stk">Komunitas warga sejak 2019</span>
<h1>Peras semangat, bagi segarnya untuk sekitar.</h1>
<p>{{ $d['org']['name'] }} mengajak tetangga, mahasiswa, dan siapa saja untuk bergerak bareng lewat kebun, kelas, dapur, dan lapak warga.</p>
<div class="row"><a class="btn btn-k" href="{{ $base }}/daftar">Jadi relawan</a><a class="btn" href="{{ $base }}/program">Lihat program</a></div>
</div>
<div class="hero-a" aria-hidden="true">
<img class="slice" src="{{ $img }}slice.svg" alt="" width="520" height="520">
<img class="mega" src="{{ $img }}megaphone.svg" alt="" width="170" height="170">
<img class="bee b1" src="{{ $img }}bee.svg" alt="" width="70" height="70">
<img class="bee b2" src="{{ $img }}bee.svg" alt="" width="46" height="46">
</div>
</div>
<div class="mq" aria-hidden="true"><div class="mq-t">
@foreach($d['ticker'] as $t)
<span>{{ $t }}</span><b></b>
@endforeach
@foreach($d['ticker'] as $t)
<span>{{ $t }}</span><b></b>
@endforeach
</div></div>
</section>
