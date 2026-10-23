{{-- BERANDA: preview Portofolio, Proyek Terbaru, Sertifikasi, Klien --}}
<div class="cp-panels">
    <div class="cp-container cp-panels__grid">

        <section class="cp-panel" id="portofolio" aria-labelledby="cp-portfolio-title">
            <div class="cp-head cp-head--panel">
                <div>
                    <h2 class="cp-panel__title" id="cp-portfolio-title">Portofolio</h2>
                    <p class="cp-subtitle">Karya terbaik yang telah kami selesaikan</p>
                </div>
                <a class="cp-link" href="{{ $page('portofolio') }}">Lihat Semua {!! $icon('arrow') !!}</a>
            </div>
            <ul class="cp-thumbs">
                @foreach ($portfolio as $item)
                    <li class="cp-thumb">
                        <img class="cp-thumb__img" src="{{ $img($item['image']) }}" alt="{{ $item['alt'] }}" width="252" height="264" loading="lazy">
                        <p class="cp-thumb__title">{{ $item['title'] }}</p>
                        <p class="cp-thumb__meta">{{ $item['meta'] }}</p>
                    </li>
                @endforeach
            </ul>
        </section>

        <section class="cp-panel" id="proyek" aria-labelledby="cp-projects-title">
            <div class="cp-head cp-head--panel">
                <div>
                    <h2 class="cp-panel__title" id="cp-projects-title">Proyek Terbaru</h2>
                    <p class="cp-subtitle">Inovasi yang sedang kami kerjakan</p>
                </div>
                <a class="cp-link" href="{{ $page('portofolio') }}#proyek">Lihat Semua {!! $icon('arrow') !!}</a>
            </div>
            <ul class="cp-thumbs">
                @foreach ($projects as $item)
                    <li class="cp-thumb">
                        <img class="cp-thumb__img" src="{{ $img($item['image']) }}" alt="{{ $item['alt'] }}" width="252" height="264" loading="lazy">
                        <p class="cp-thumb__title">{{ $item['title'] }}</p>
                        <p class="cp-thumb__meta">{{ $item['meta'] }}</p>
                    </li>
                @endforeach
            </ul>
        </section>

        @include($ns . '.partials.panel-certs')
        @include($ns . '.partials.panel-clients')

    </div>
</div>
