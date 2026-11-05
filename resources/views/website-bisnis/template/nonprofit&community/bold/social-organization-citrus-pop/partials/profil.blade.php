<section class="sec">
<div class="w pf">
<div class="pf-i"><img src="{{ $img }}s7.svg" alt="Relawan SegarKita bekerja bersama" width="600" height="450" loading="lazy"><span class="stk st2">Dikelola warga</span></div>
<div>
<h2>Kami bermula dari sebuah gerobak jeruk.</h2>
<p>Tahun 2019, sekelompok warga berjualan jeruk untuk menambah kas ronda. Hasilnya dipakai membeli buku anak-anak. Sekarang kami adalah jaringan 14 RW dengan enam program rutin yang semuanya digerakkan relawan.</p>
<div class="chips">
@foreach($d['stats'] as $s)
<div class="chip"><strong>{{ $s[0] }}</strong> {{ $s[1] }}</div>
@endforeach
</div>
@if(empty($full))
<a class="btn btn-k" href="{{ $base }}/profil">Baca profil lengkap</a>
@endif
</div>
</div>
@if(!empty($full))
<div class="w g2 mt">
<div class="cd pad"><h3>Nilai yang kami pegang</h3>
@foreach($d['values'] as $x)
<p class="vl">{{ $x }}</p>
@endforeach
</div>
<div class="cd pad"><h3>Perjalanan kami</h3>
@foreach($d['timeline'] as $x)
<p class="tl"><b>{{ $x[0] }}</b> {{ $x[1] }}</p>
@endforeach
</div>
</div>
@endif
</section>
