{{-- Parameter: $items (daftar testimoni), $uid (awalan id unik) --}}
<div class="bca-tstage" data-bca-tstage data-tone="{{ $items[0]['variant'] }}" data-autoplay="7500">
    <div class="bca-tstage__slides">
        @foreach($items as $q)
            <figure class="bca-tslide @if($loop->first) is-active @endif" id="bca-ts-{{ $uid }}-{{ $loop->index }}" role="tabpanel" aria-labelledby="bca-tt-{{ $uid }}-{{ $loop->index }}" data-tone="{{ $q['variant'] }}" @if(!$loop->first) aria-hidden="true" @endif>
                <div class="bca-stars" role="img" aria-label="Penilaian {{ $q['rating'] }} dari 5">@foreach([1, 2, 3, 4, 5] as $n)@include('website-bisnis.template.professional-service.creative.branding-creative-agency-cobalt-pop.partials.icon', ['name' => 'star'])@endforeach</div>
                <blockquote>&ldquo;{{ $q['quote'] }}&rdquo;</blockquote>
                <figcaption class="bca-who">
                    <span class="bca-avatar" data-tone="{{ $q['tone'] }}" aria-hidden="true">{{ $q['initials'] }}</span>
                    <span><strong>{{ $q['name'] }}</strong><span>{{ $q['role'] }}, {{ $q['company'] }}</span></span>
                    <span class="bca-chip bca-tslide__proj">{{ $q['project'] }}</span>
                </figcaption>
            </figure>
        @endforeach
    </div>
    <div class="bca-tstage__nav">
        <div class="bca-tstage__tabs" role="tablist" aria-label="Pilih testimoni">
            @foreach($items as $q)
                <button type="button" role="tab" class="bca-ttab @if($loop->first) is-active @endif" id="bca-tt-{{ $uid }}-{{ $loop->index }}" aria-controls="bca-ts-{{ $uid }}-{{ $loop->index }}" aria-selected="{{ $loop->first ? 'true' : 'false' }}" tabindex="{{ $loop->first ? '0' : '-1' }}" data-i="{{ $loop->index }}">
                    <span class="bca-avatar" data-tone="{{ $q['tone'] }}" aria-hidden="true">{{ $q['initials'] }}</span>
                    <span class="bca-ttab__txt"><b>{{ $q['name'] }}</b><small>{{ $q['company'] }}</small></span>
                    <i class="bca-ttab__bar" aria-hidden="true"></i>
                </button>
            @endforeach
        </div>
        <div class="bca-tstage__ctrl">
            <button type="button" class="bca-round" data-bca-tprev aria-label="Testimoni sebelumnya">@include('website-bisnis.template.professional-service.creative.branding-creative-agency-cobalt-pop.partials.icon', ['name' => 'chevron-left'])</button>
            <button type="button" class="bca-round" data-bca-tplay aria-label="Jeda pergantian otomatis" aria-pressed="false"><span data-pause>@include('website-bisnis.template.professional-service.creative.branding-creative-agency-cobalt-pop.partials.icon', ['name' => 'pause'])</span><span data-play hidden>@include('website-bisnis.template.professional-service.creative.branding-creative-agency-cobalt-pop.partials.icon', ['name' => 'play'])</span></button>
            <button type="button" class="bca-round" data-bca-tnext aria-label="Testimoni berikutnya">@include('website-bisnis.template.professional-service.creative.branding-creative-agency-cobalt-pop.partials.icon', ['name' => 'chevron-right'])</button>
            <span class="bca-tstage__count"><b data-bca-tnow>1</b> / {{ count($items) }}</span>
        </div>
    </div>
</div>
