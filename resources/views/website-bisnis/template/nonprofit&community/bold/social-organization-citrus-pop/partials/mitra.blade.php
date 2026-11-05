<section class="sec alt">
<div class="w">
<div class="sh"><h2>Berjalan bersama mitra</h2>
@if(empty($full))
<a class="btn" href="{{ $base }}/mitra">Semua mitra</a>
@endif
</div>
<div class="g4">
@foreach(array_slice($d['partners'], 0, $limit ?? 99) as $m)
<div class="cd pt"><span class="ini">{{ $m[0][0] }}</span><div><strong>{{ $m[0] }}</strong><small>{{ $m[1] }}</small></div></div>
@endforeach
</div>
@if(!empty($full))
<p class="note">Ingin bergabung sebagai mitra? Hubungi kami lewat halaman <a href="{{ $base }}/kontak">Kontak</a>.</p>
@endif
</div>
</section>
