<section class="sec cta">
<div class="w g2 al">
<div><h2>Ada waktu luang sepekan sekali? Kami butuh kamu.</h2><p>Pilih peran, isi formulir, dan tim kami menyapa lewat WhatsApp. Tidak perlu pengalaman.</p>
@if(!empty($mini))
<a class="btn btn-k" href="{{ $base }}/daftar">Buka formulir lengkap</a>
@endif
</div>
@if(empty($mini))
<form class="cd pad frm" data-wa-form data-intro="Halo SegarKita, saya ingin mendaftar." novalidate>
<label>Nama lengkap<input name="Nama" required autocomplete="name"></label>
<label>Nomor WhatsApp<input name="WhatsApp" required inputmode="tel" autocomplete="tel" pattern="[0-9+ -]{8,16}"></label>
<label>Kota atau RW<input name="Domisili" required></label>
<label>Ingin menjadi<select name="Peran" required><option value="">Pilih peran</option><option>Relawan</option><option>Anggota</option><option>Relawan dan anggota</option></select></label>
<label class="full">Program yang diminati<select name="Program">
@foreach($d['programs'] as $p)
<option>{{ $p['t'] }}</option>
@endforeach
</select></label>
<label class="full">Pesan singkat<textarea name="Pesan" rows="3"></textarea></label>
<button class="btn btn-k" type="submit">Kirim lewat WhatsApp</button><p class="msg" data-msg role="status"></p>
</form>
@endif
</div>
</section>
