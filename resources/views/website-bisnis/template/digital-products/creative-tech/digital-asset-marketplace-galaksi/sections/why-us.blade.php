<section class="section" id="why-us">
    <div class="wrap">
        @include($v . '.partials.section-head', ['eyebrow' => 'Why Choose Us', 'title' => 'Kenapa <span class="gt">Astraly</span>?', 'desc' => 'Kami membangun marketplace yang adil bagi pembeli dan kreator.'])
        <div class="grid gap-5 sm:grid-cols-2 lg:grid-cols-3">
            @foreach ($dam['why'] as $w)
                <div class="reveal" style="--d:{{ $loop->index % 3 * .08 }}s"><div class="why-card"><span class="wi">{{ $ic($w[0], 'ico-lg') }}</span><h3>{{ $w[1] }}</h3><p>{{ $w[2] }}</p></div></div>
            @endforeach
        </div>
    </div>
</section>
