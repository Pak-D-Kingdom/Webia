<footer class="bca-foot">
    <div class="bca-wrap bca-foot__top">
        <div class="bca-foot__brand">
            <a class="bca-brand" href="{{ route($site['routes']['home']) }}" aria-label="{{ $site['name'] }}, kembali ke beranda">
                <span class="bca-brand__mark" aria-hidden="true"></span>
                <span class="bca-brand__word">{{ $site['short_name'] }}<small>studio</small></span>
            </a>
            <p>{{ $site['description'] }}</p>
            <ul class="bca-social" aria-label="Media sosial">
                @foreach($site['social'] as $s)
                    <li><a href="{{ $s['url'] }}" target="_blank" rel="noopener noreferrer" aria-label="{{ $s['label'] }}">@include('website-bisnis.template.professional-service.creative.branding-creative-agency-cobalt-pop.partials.icon', ['name' => $s['icon']])</a></li>
                @endforeach
            </ul>
        </div>

        <div class="bca-foot__cols">
            <div>
                <h2>Quick Links</h2>
                <ul>
                    <li><a href="{{ route($site['routes']['home']) }}">Home</a></li>
                    <li><a href="{{ route($site['routes']['about']) }}">About Us</a></li>
                    <li><a href="{{ route($site['routes']['portfolio']) }}">Portfolio</a></li>
                    <li><a href="{{ route($site['routes']['branding']) }}">Branding Showcase</a></li>
                    <li><a href="{{ route($site['routes']['process']) }}">Our Process</a></li>
                    <li><a href="{{ route($site['routes']['team']) }}">Our Team</a></li>
                    <li><a href="{{ route($site['routes']['clients']) }}">Our Clients</a></li>
                    <li><a href="{{ route($site['routes']['testimonials']) }}">Testimonials</a></li>
                    <li><a href="{{ route($site['routes']['journal']) }}">Creative Journal</a></li>
                    <li><a href="{{ route($site['routes']['contact']) }}">Contact Us</a></li>
                </ul>
            </div>
            <div>
                <h2>Layanan</h2>
                <ul>
                    @foreach($site['services'] as $s)
                        <li><a href="{{ route($site['routes']['services']) }}#{{ $s['key'] }}">{{ $s['title'] }}</a></li>
                    @endforeach
                </ul>
            </div>
            <div>
                <h2>Kontak</h2>
                <address>
                    <a href="mailto:{{ $site['contact']['email'] }}">{{ $site['contact']['email'] }}</a>
                    <a href="{{ $site['contact']['phone_href'] }}">{{ $site['contact']['phone'] }}</a>
                    <span>{{ $site['contact']['address'] }}</span>
                    <span>{{ $site['contact']['hours'] }}</span>
                </address>
            </div>
        </div>
    </div>

    <div class="bca-foot__mega" aria-hidden="true">{{ $site['short_name'] }}</div>

    <div class="bca-wrap">
        <div class="bca-foot__legal">
            <span>{{ $site['name'] }} · {{ $site['tagline'] }}</span>
            <ul>
                <li><button type="button" data-bca-open="bca-legal-privacy">Privacy Policy</button></li>
                <li><button type="button" data-bca-open="bca-legal-terms">Terms &amp; Conditions</button></li>
            </ul>
        </div>
    </div>

    @foreach(['privacy', 'terms'] as $key)
        <dialog class="bca-dialog bca-dialog--sm" id="bca-legal-{{ $key }}" aria-labelledby="bca-legal-{{ $key }}-t">
            <button type="button" class="bca-dialog__close" data-bca-close aria-label="Tutup">@include('website-bisnis.template.professional-service.creative.branding-creative-agency-cobalt-pop.partials.icon', ['name' => 'close'])</button>
            <div class="bca-dialog__body">
                <h2 class="bca-h3" id="bca-legal-{{ $key }}-t">{{ $site['legal'][$key]['title'] }}</h2>
                @foreach($site['legal'][$key]['body'] as $para)
                    <p>{{ $para }}</p>
                @endforeach
            </div>
        </dialog>
    @endforeach

    <p class="bca-foot__credit">{{ $site['credit'] }}</p>
</footer>
