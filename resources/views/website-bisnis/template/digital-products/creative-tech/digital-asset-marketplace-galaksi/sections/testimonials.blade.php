<section class="section" id="testimonials">
    <div class="wrap">
        @include($v . '.partials.section-head', ['eyebrow' => 'Testimonials', 'title' => 'Dipercaya <span class="gt">Ribuan Kreator</span>', 'arrows' => 'carTesti'])
        <div class="carousel" id="carTesti">
            @foreach ($dam['testimonials'] as $t)
                <div class="testi-card" style="flex-basis:min(380px,86vw)">
                    {{ $stars($t[3]) }}
                    <q>{{ $t[4] }}</q>
                    <div class="who"><img src="{{ $img($t[2]) }}" alt="{{ $t[0] }}" width="48" height="48" loading="lazy"><div><b>{{ $t[0] }}</b><br><small>{{ $t[1] }}</small></div></div>
                </div>
            @endforeach
        </div>
    </div>
</section>
