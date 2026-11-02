@php $thumbs = array_slice($f['projects'], 1, 5); @endphp
<article class="rf-galprev">
    <img class="rf-galprev__bg" src="{{ $img('gallery-main.jpg') }}" alt="" loading="lazy">
    <div class="rf-galprev__copy">
        <h2>Project Gallery</h2>
        <p>Lihat hasil karya kami di berbagai rumah, kantor, dan ruang komersial.</p>
        <a class="rf-btn rf-btn--solid rf-btn--sm" href="{{ $r('gallery') }}">Lihat Galeri {!! $icon('arrow-right') !!}</a>
    </div>
    <div class="rf-galprev__strip">
        <ul data-rf-strip>
            @foreach ($thumbs as $t)
                <li><a href="{{ $r('gallery') }}#proyek-{{ $t['id'] }}"><img src="{{ $img($t['image']) }}" alt="{{ $t['title'] }}" loading="lazy"></a></li>
            @endforeach
        </ul>
        <button class="rf-roundarrow rf-roundarrow--dark" type="button" data-rf-strip-next aria-label="Geser foto berikutnya">{!! $icon('chevron-right') !!}</button>
    </div>
</article>
