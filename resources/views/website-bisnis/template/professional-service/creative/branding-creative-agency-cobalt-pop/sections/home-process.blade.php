<section class="bca-section bca-tone-cobalt" id="process-preview" aria-labelledby="bca-pr-h">
    <div class="bca-wrap">
        <div class="bca-shead">
            <span class="bca-label">Creative Process</span>
            <h2 class="bca-h2" id="bca-pr-h">Enam tahap yang membuat hasil akhir <mark class="bca-hl">tidak mengejutkan.</mark></h2>
        </div>
        <ol class="bca-steps">
            @foreach($site['process'] as $s)
                <li class="bca-step bca-reveal" style="--bca-d:{{ ($loop->index % 3) * 0.08 }}s">
                    <span class="bca-step__n" aria-hidden="true">0{{ $loop->iteration }}</span>
                    <h3>{{ $s['title'] }}</h3>
                    <p>{{ $s['text'] }}</p>
                    <span class="bca-chip bca-chip--fill" style="justify-self:start">{{ $s['time'] }}</span>
                </li>
            @endforeach
        </ol>
        <div class="bca-more"><span></span><a class="bca-btn" href="{{ route($site['routes']['process']) }}">Pelajari proses kami @include('website-bisnis.template.professional-service.creative.branding-creative-agency-cobalt-pop.partials.icon', ['name' => 'arrow'])</a></div>
    </div>
</section>
