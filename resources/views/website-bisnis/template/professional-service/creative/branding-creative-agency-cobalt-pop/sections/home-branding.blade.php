<section class="bca-section bca-tone-yellow" id="branding-preview" aria-labelledby="bca-br-h">
    <div class="bca-wrap">
        <div class="bca-shead">
            <span class="bca-label">Branding Showcase</span>
            <h2 class="bca-h2" id="bca-br-h">Identitas yang bekerja, <mark class="bca-hl">dari logo sampai kemasan.</mark></h2>
        </div>
        <div class="bca-bento">
            <figure class="bca-tile bca-tile--board bca-reveal">
                <img src="{{ asset($site['asset_base'] . $site['showcase']['boards'][0]['image']) }}" loading="lazy" alt="Papan identitas Tanah Seduh: logo, palet warna, tipografi, dan aplikasi">
                <figcaption class="bca-tile__cap"><span class="bca-chip bca-chip--fill">Brand board</span></figcaption>
            </figure>
            <div class="bca-tile bca-tile--pal bca-reveal" style="--bca-d:.06s">
                <div class="bca-swatches">
                    @foreach($site['showcase']['palettes'][0]['colors'] as $c)
                        <span style="background:{{ $c['hex'] }};color:{{ $c['on'] }}">{{ $c['name'] }}</span>
                    @endforeach
                </div>
            </div>
            <div class="bca-tile bca-tile--type bca-reveal" style="--bca-d:.1s"><b aria-hidden="true">Aa</b><span class="bca-tile__cap bca-chip bca-chip--fill">Tipografi</span></div>
            <figure class="bca-tile bca-tile--logo bca-reveal" style="--bca-d:.14s">
                <img src="{{ asset($site['asset_base'] . 'img/logo-sigma-daya.jpg') }}" loading="lazy" alt="Logo Sigma Daya: simbol sigma dalam kotak membulat">
                <figcaption class="bca-tile__cap"><span class="bca-chip bca-chip--fill">Logo</span></figcaption>
            </figure>
            <figure class="bca-tile bca-tile--wide bca-tile--w1 bca-reveal">
                <img src="{{ asset($site['asset_base'] . 'img/packaging.jpg') }}" loading="lazy" alt="Kemasan pouch dan tin Rempah Rasa">
                <figcaption class="bca-tile__cap"><span class="bca-chip bca-chip--fill">Packaging</span></figcaption>
            </figure>
            <figure class="bca-tile bca-tile--wide bca-tile--w2 bca-reveal" style="--bca-d:.08s">
                <img src="{{ asset($site['asset_base'] . 'img/stationery.jpg') }}" loading="lazy" alt="Stationery hotel Arunika: kop surat, amplop, dan kartu nama">
                <figcaption class="bca-tile__cap"><span class="bca-chip bca-chip--fill">Stationery</span></figcaption>
            </figure>
        </div>
        <div class="bca-more">
            <p>Logo, tipografi, warna, kemasan, stationery, dan brand guidelines.</p>
            <a class="bca-btn bca-btn--ink" href="{{ route($site['routes']['branding']) }}">Buka Branding Showcase @include('website-bisnis.template.professional-service.creative.branding-creative-agency-cobalt-pop.partials.icon', ['name' => 'arrow'])</a>
        </div>
    </div>
</section>
