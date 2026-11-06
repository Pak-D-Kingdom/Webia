<section class="sec alt">
<div class="w g2">
<div class="cd pad"><h2>Datang atau sapa kami</h2>
<p class="ci"><b>Alamat</b>{{ $d['org']['addr'] }}</p>
<p class="ci"><b>Jam buka</b>{{ $d['org']['jam'] }}</p>
<p class="ci"><b>Email</b>{{ $d['org']['email'] }}</p>
<p class="ci"><b>WhatsApp</b>{{ $d['org']['tel'] }}</p>
<a class="btn btn-k" target="_blank" rel="noopener" href="https://wa.me/{{ $d['wa'] }}?text={{ $d['wa_text'] }}">Chat sekarang</a></div>
@if(empty($mini))
<form class="cd pad frm" data-wa-form data-intro="Halo SegarKita, saya ingin bertanya." novalidate>
<label>Nama<input name="Nama" required autocomplete="name"></label>
<label>Email atau WhatsApp<input name="Kontak" required></label>
<label class="full">Topik<select name="Topik"><option>Pertanyaan umum</option><option>Kemitraan</option><option>Donasi</option><option>Media</option></select></label>
<label class="full">Pesan<textarea name="Pesan" rows="4" required></textarea></label>
<button class="btn btn-k" type="submit">Kirim lewat WhatsApp</button><p class="msg" data-msg role="status"></p>
</form>
@else
<div class="cd pad map"><img src="{{ $img }}s8.svg" alt="Suasana Rumah Segar" width="600" height="450"><a class="btn" href="{{ $base }}/kontak">Halaman kontak</a></div>
@endif
</div>
</section>
