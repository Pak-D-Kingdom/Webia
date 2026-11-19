<section class="eo-sec">
    <div class="eo-container">
        @include($eo['view'].'partials.section-head', ['heading' => 'Lima langkah menuju acara impian', 'sub' => 'Proses terstruktur agar setiap detail terkendali dan hasilnya maksimal.'])

        <ol class="eo-timeline" data-eo-timeline>
            @foreach($eo['process'] as $step)
            <li class="eo-step" id="langkah-{{ $step['n'] }}" data-reveal>
                <span class="eo-step__node"><svg class="eo-i" aria-hidden="true"><use href="#{{ $step['icon'] }}"/></svg><b>{{ $step['n'] }}</b></span>
                <div class="eo-step__card">
                    <div class="eo-step__top">
                        <h3>{{ $step['title'] }}</h3>
                        <span class="eo-chip eo-chip--static"><svg class="eo-i" aria-hidden="true"><use href="#i-clock"/></svg>{{ $step['time'] }}</span>
                    </div>
                    <p>{{ $step['desc'] }}</p>
                    <ul class="eo-pills">
                        @foreach($step['output'] as $out)
                        <li>{{ $out }}</li>
                        @endforeach
                    </ul>
                </div>
            </li>
            @endforeach
        </ol>
    </div>
</section>
