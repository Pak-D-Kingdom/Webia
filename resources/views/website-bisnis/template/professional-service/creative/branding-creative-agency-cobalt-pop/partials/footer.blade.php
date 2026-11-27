<footer class="bca-foot">
    <div class="bca-wrap">
        <div class="bca-foot__cta bca-reveal">
            <p class="bca-foot__big">Punya ide yang ingin dibuat <mark class="bca-hl">lebih berani?</mark></p>
            <div class="bca-actions">
                <a class="bca-btn" href="{{ route($site['routes']['contact']) }}">Start a Project @include('website-bisnis.template.professional-service.creative.branding-creative-agency-cobalt-pop.partials.icon', ['name' => 'arrow'])</a>
                <a class="bca-btn bca-btn--paper" href="https://wa.me/{{ $site['whatsapp']['number'] }}?text={{ rawurlencode($site['whatsapp']['message']) }}" target="_blank" rel="noopener noreferrer">@include('website-bisnis.template.professional-service.creative.branding-creative-agency-cobalt-pop.partials.icon', ['name' => 'whatsapp']) WhatsApp</a>
            </div>
        </div>
    </div>

    <div class="bca-wrap bca-foot__grid">
        <div class="bca-foot__brand">
            <a class="bca-brand" href="{{ route($site['routes']['home']) }}" aria-label="{{ $site['name'] }}, kembali ke beranda">
                <span class="bca-brand__mark" aria-hidden="true"></span>
                <span class="bca-brand__word">{{ $site['short_name'] }}<small>studio</small></span>
            </a>
            <p>{{ $site['description'] }}</p>
            <p class="bca-status" data-bca-status data-tz="{{ $site['open_hours']['tz'] }}" data-days="{{ implode(',', $site['open_hours']['days']) }}" data-open="{{ $site['open_hours']['open'] }}" data-close="{{ $site['open_hours']['close'] }}">
                <i aria-hidden="true"></i><span data-bca-status-text>{{ $site['contact']['hours'] }}</span>
            </p>
            <ul class="bca-social" aria-label="Media sosial">
                @foreach($site['social'] as $s)
                    <li><a href="{{ $s['url'] }}" target="_blank" rel="noopener noreferrer" aria-label="{{ $s['label'] }}">@include('website-bisnis.template.professional-service.creative.branding-creative-agency-cobalt-pop.partials.icon', ['name' => $s['icon']])<span>{{ $s['label'] }}</span></a></li>
                @endforeach
            </ul>
        </div>

        <nav class="bca-foot__col" aria-label="Quick links">
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
        </nav>

        <nav class="bca-foot__col" aria-label="Layanan">
            <h2>Layanan</h2>
            <ul>
                @foreach($site['services'] as $s)
                    <li><a href="{{ route($site['routes']['services']) }}#{{ $s['key'] }}">{{ $s['title'] }}</a></li>
                @endforeach
            </ul>
        </nav>

        <div class="bca-foot__col">
            <h2>Kontak</h2>
            <ul class="bca-foot__contact">
                <li>@include('website-bisnis.template.professional-service.creative.branding-creative-agency-cobalt-pop.partials.icon', ['name' => 'mail'])<a href="mailto:{{ $site['contact']['email'] }}">{{ $site['contact']['email'] }}</a><button type="button" class="bca-copy" data-bca-copy="{{ $site['contact']['email'] }}" aria-label="Salin email">@include('website-bisnis.template.professional-service.creative.branding-creative-agency-cobalt-pop.partials.icon', ['name' => 'copy'])</button></li>
                <li>@include('website-bisnis.template.professional-service.creative.branding-creative-agency-cobalt-pop.partials.icon', ['name' => 'phone'])<a href="{{ $site['contact']['phone_href'] }}">{{ $site['contact']['phone'] }}</a></li>
                <li>@include('website-bisnis.template.professional-service.creative.branding-creative-agency-cobalt-pop.partials.icon', ['name' => 'pin'])<span>{{ $site['contact']['address'] }}</span></li>
                <li>@include('website-bisnis.template.professional-service.creative.branding-creative-agency-cobalt-pop.partials.icon', ['name' => 'clock'])<span>{{ $site['contact']['hours'] }}</span></li>
            </ul>
        </div>
    </div>

    <div class="bca-foot__mega" aria-hidden="true">
        @foreach(['p', 'i', 'g', 'm', 'e', 'n'] as $ch)<span style="--i:{{ $loop->index }}">{{ $ch }}</span>@endforeach
    </div>

    <div class="bca-wrap">
        <div class="bca-foot__legal">
            <ul>
                <li><button type="button" data-bca-open="bca-legal-privacy">Privacy Policy</button></li>
                <li><button type="button" data-bca-open="bca-legal-terms">Terms &amp; Conditions</button></li>
            </ul>
            <button type="button" class="bca-totop" data-bca-top>Kembali ke atas @include('website-bisnis.template.professional-service.creative.branding-creative-agency-cobalt-pop.partials.icon', ['name' => 'arrow-up'])</button>
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
