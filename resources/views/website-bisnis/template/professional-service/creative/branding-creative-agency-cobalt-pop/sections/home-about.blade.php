<section class="bca-section bca-tone-paper" id="about-preview" aria-labelledby="bca-about-h">
    <div class="bca-wrap bca-about__grid">
        <div class="bca-about__media bca-reveal">
            <div class="bca-about__img1"><img src="{{ asset($site['asset_base'] . 'img/about-studio.jpg') }}" width="1100" height="1375" loading="lazy" alt="Meja kerja studio: buku sketsa, tablet berisi layout, kipas palet warna, dan secangkir kopi"></div>
            <div class="bca-about__img2"><img src="{{ asset($site['asset_base'] . 'img/about-workshop.jpg') }}" width="1400" height="1000" loading="lazy" alt="Dinding moodboard biru kobalt berisi sketsa logo, palet warna, dan catatan brief"></div>
        </div>
        <div class="bca-about__copy">
            <div class="bca-shead" style="margin:0">
                <span class="bca-label">About Agency</span>
                <h2 class="bca-h2" id="bca-about-h">Studio kecil dengan satu keyakinan: <mark class="bca-hl">merek yang jelas</mark> lebih mudah dicintai.</h2>
            </div>
            <p class="bca-lead">{{ $site['about']['story'][0] }}</p>
            <ul class="bca-pillars">
                @foreach($site['about']['approach'] as $a)
                    <li><i aria-hidden="true"></i><h3>{{ $a['title'] }}</h3><p>{{ $a['text'] }}</p></li>
                @endforeach
            </ul>
            <div class="bca-vm">
                <div class="bca-vm__box bca-vm__box--cobalt"><h3>Visi</h3><p>{{ $site['about']['vision'] }}</p></div>
                <div class="bca-vm__box bca-vm__box--coral"><h3>Misi</h3><ul>
                    @foreach($site['about']['mission'] as $m)<li>{{ $m }}</li>@endforeach
                </ul></div>
            </div>
            <div class="bca-actions"><a class="bca-btn bca-btn--cobalt" href="{{ route($site['routes']['about']) }}">Tentang Kami @include('website-bisnis.template.professional-service.creative.branding-creative-agency-cobalt-pop.partials.icon', ['name' => 'arrow'])</a></div>
        </div>
    </div>
</section>
