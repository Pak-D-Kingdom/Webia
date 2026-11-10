<section class="eo-sec">
    <div class="eo-container">
        @include($eo['view'].'partials.section-head', ['heading' => 'Solusi lengkap untuk setiap acara', 'sub' => 'Pilih jenis acara Anda, lalu serahkan detailnya kepada tim kreatif dan produksi kami.'])

        <div class="eo-svc-full">
            @foreach($eo['services'] as $svc)
            <article class="eo-svc-big" id="{{ $svc['slug'] }}" data-reveal>
                <div class="eo-svc-big__art"><img src="{{ asset($eo['assets']['img']) }}/{{ $svc['icon'] }}" alt="" width="120" height="114" loading="lazy"></div>
                <div class="eo-svc-big__body">
                    <span class="eo-tag">{{ $svc['tag'] }}</span>
                    <h3>{{ $svc['title'] }}</h3>
                    <p>{{ $svc['desc'] }}</p>
                    <ul class="eo-checks">
                        @foreach($svc['features'] as $feat)
                        <li><svg class="eo-i" aria-hidden="true"><use href="#i-check"/></svg>{{ $feat }}</li>
                        @endforeach
                    </ul>
                    <div class="eo-svc-big__act">
                        <a class="eo-btn eo-btn--violet eo-btn--sm" href="{{ url($eo['base'].'/penawaran?layanan='.$svc['slug']) }}">Konsultasikan <svg class="eo-i" aria-hidden="true"><use href="#i-arrow"/></svg></a>
                        <a class="eo-link" href="{{ url($eo['base'].'/portofolio?kategori='.$svc['slug']) }}">Lihat portofolio</a>
                    </div>
                </div>
            </article>
            @endforeach
        </div>
    </div>
</section>
