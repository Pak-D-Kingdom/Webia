<section class="rf-collections" aria-labelledby="rf-col-title">
    <div class="rf-collections__intro">
        <p class="rf-eyebrow">Koleksi Unggulan</p>
        <h2 id="rf-col-title">Furniture Pilihan untuk Setiap Ruangan</h2>
        <p>Dari ruang tamu hingga kamar tidur, temukan furniture yang sesuai dengan gaya hidup Anda.</p>
        <a class="rf-textlink" href="{{ $r('catalog') }}">Lihat Semua Katalog {!! $icon('arrow-right') !!}</a>
    </div>
    <ul class="rf-collections__list">
        @foreach ($f['categories'] as $c)
            <li>
                <a class="rf-collcard" href="{{ $r('catalog') }}?cat={{ $c['key'] }}">
                    <img src="{{ $img($c['image']) }}" alt="Koleksi {{ $c['label'] }}" loading="lazy">
                    <span class="rf-collcard__row">
                        <span><b>{{ $c['label'] }}</b><small>Lihat Koleksi {!! $icon('arrow-right') !!}</small></span>
                        <i class="rf-roundarrow" aria-hidden="true">{!! $icon('arrow-right') !!}</i>
                    </span>
                </a>
            </li>
        @endforeach
    </ul>
</section>
