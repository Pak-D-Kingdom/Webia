<section class="section" id="how-it-works">
    <div class="wrap">
        @include($v . '.partials.section-head', ['eyebrow' => 'How It Works', 'title' => 'Empat Langkah <span class="gt">Menuju Aset</span>', 'desc' => 'Dari mencari hingga mengunduh — semudah menjelajah galaksi.'])
        <div class="steps">
            @foreach ($dam['steps'] as $s)
                <div class="step reveal" style="--d:{{ $loop->index * .1 }}s"><span class="si">{{ $ic($s[0], 'ico-lg') }}</span><h3>{{ $s[1] }}</h3><p>{{ $s[2] }}</p></div>
            @endforeach
        </div>
    </div>
</section>
