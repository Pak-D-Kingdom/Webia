<article class="rf-card rf-feature rf-feature--sketch">
    <div class="rf-feature__copy">
        <p class="rf-eyebrow">Custom Design</p>
        <h2>Wujudkan Desain Impian Anda</h2>
        <p>Pilih model, ukuran, warna, dan detail lainnya sesuai kebutuhan dan gaya rumah Anda.</p>
        <a class="rf-btn rf-btn--solid rf-btn--sm" href="{{ $r('custom-design') }}">Mulai Custom Design {!! $icon('arrow-right') !!}</a>
    </div>
    <div class="rf-feature__art">
        <p class="rf-script">{{ $f['custom']['script'][0] }}<br>{{ $f['custom']['script'][1] }}</p>
        <img src="{{ $img($f['custom']['sketch']) }}" alt="Sketsa kursi lengan kayu" loading="lazy">
        <span class="rf-dots" aria-hidden="true"><i style="background:#7a3f23"></i><i style="background:#2a211c"></i><i style="background:#c9733f"></i><i style="background:#9b958c"></i></span>
    </div>
</article>
