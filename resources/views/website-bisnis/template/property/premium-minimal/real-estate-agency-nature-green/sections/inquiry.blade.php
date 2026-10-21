<section class="panel side-card" id="inquiry" aria-labelledby="h-inquiry">
    <header class="side-card__head">
        <span class="side-card__ico"><svg class="i" aria-hidden="true"><use href="#i-edit"/></svg></span>
        <div><h2 id="h-inquiry" class="side-card__title">Inquiry</h2><p class="panel__sub">Tanyakan informasi lebih lanjut</p></div>
    </header>
    {{-- Backend: set action / data-endpoint ke route penyimpanan inquiry. --}}
    <form method="post" action="#" data-form data-success="Terima kasih! Pertanyaan Anda sudah kami terima.">
        @csrf
        <label class="field"><span class="sr-only">Nama lengkap</span><svg class="i" aria-hidden="true"><use href="#i-user"/></svg><input name="nama" required autocomplete="name" maxlength="80" placeholder="Nama Lengkap"></label>
        <label class="field field--ta"><span class="sr-only">Pesan atau pertanyaan</span><svg class="i" aria-hidden="true"><use href="#i-edit"/></svg><textarea name="pesan" rows="3" required maxlength="500" placeholder="Pesan / Pertanyaan"></textarea></label>
        <button class="btn btn--primary btn--block" type="submit">Kirim Inquiry <svg class="i" aria-hidden="true"><use href="#i-arrow"/></svg></button>
        <p class="form-status" role="status" data-form-status></p>
    </form>
</section>
