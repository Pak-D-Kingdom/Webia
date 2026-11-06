{{-- Halaman Berita & Acara. Filter kategori dikelola foundation.js ([data-fh-filter]). --}}
@include($v('partials.page-header'))

<section class="fh-sec">
    <div class="fh-wrap">
        <div class="fh-filters" role="group" aria-label="Saring berita dan acara" data-fh-filters>
            <button type="button" class="is-active" data-fh-filter="all" aria-pressed="true">Semua</button>
            <button type="button" data-fh-filter="Berita" aria-pressed="false">Berita</button>
            <button type="button" data-fh-filter="Acara" aria-pressed="false">Acara</button>
        </div>

        <ul class="fh-newsgrid">
            @foreach ($cfg['news']['items'] as $n)
                <li id="{{ $n['id'] }}" data-fh-type="{{ $n['type'] }}">
                    <article class="fh-newscard fh-reveal">
                        <div class="fh-newscard__img">
                            <img src="{{ $img($n['image']) }}" alt="{{ $n['title'] }}" width="528" height="300" loading="lazy">
                            <span class="fh-tag fh-tag--float">{{ $n['type'] }}</span>
                        </div>
                        <div class="fh-newscard__body">
                            <time>{{ $icon('calendar') }}{{ $n['date'] }}</time>
                            <h3>{{ $n['title'] }}</h3>
                            <p>{{ $n['excerpt'] }}</p>
                            <a class="fh-more" href="{{ $wa('Halo GreenHope, saya ingin tahu lebih lanjut tentang: '.$n['title']) }}" target="_blank" rel="noopener">Tanya detailnya {{ $icon('arrow') }}</a>
                        </div>
                    </article>
                </li>
            @endforeach
        </ul>
        <p class="fh-note" data-fh-filter-empty hidden>Belum ada item untuk kategori ini.</p>
    </div>
</section>

@include($v('partials.cta-band'), [
    'ctaTitle' => 'Ingin ikut di kegiatan berikutnya?',
    'ctaText' => 'Daftar sebagai relawan dan jadi yang pertama tahu jadwal aksi kami.',
    'ctaLabel' => 'Daftar Relawan', 'ctaUrl' => $url('relawan'),
])
