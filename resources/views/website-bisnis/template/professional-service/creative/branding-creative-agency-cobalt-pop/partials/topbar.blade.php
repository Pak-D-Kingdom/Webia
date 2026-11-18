<div class="bca-topbar">
    <div class="bca-wrap bca-topbar__in">
        <ul class="bca-topbar__info">
            <li><a href="mailto:{{ $site['contact']['email'] }}">@include('website-bisnis.template.professional-service.creative.branding-creative-agency-cobalt-pop.partials.icon', ['name' => 'mail']){{ $site['contact']['email'] }}</a></li>
            <li><a href="{{ $site['contact']['phone_href'] }}">@include('website-bisnis.template.professional-service.creative.branding-creative-agency-cobalt-pop.partials.icon', ['name' => 'phone']){{ $site['contact']['phone'] }}</a></li>
            <li><span>@include('website-bisnis.template.professional-service.creative.branding-creative-agency-cobalt-pop.partials.icon', ['name' => 'pin']){{ $site['contact']['location'] }}</span></li>
            <li><span>@include('website-bisnis.template.professional-service.creative.branding-creative-agency-cobalt-pop.partials.icon', ['name' => 'clock']){{ $site['contact']['hours_short'] }} WIB</span></li>
        </ul>
        <ul class="bca-topbar__social" aria-label="Media sosial">
            @foreach($site['social'] as $s)
                <li><a href="{{ $s['url'] }}" target="_blank" rel="noopener noreferrer" aria-label="{{ $s['label'] }}">@include('website-bisnis.template.professional-service.creative.branding-creative-agency-cobalt-pop.partials.icon', ['name' => $s['icon']])</a></li>
            @endforeach
        </ul>
    </div>
</div>
