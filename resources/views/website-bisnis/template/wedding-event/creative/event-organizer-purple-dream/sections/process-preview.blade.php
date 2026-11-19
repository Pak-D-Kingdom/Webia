<section class="eo-proc" aria-labelledby="eo-proc-title">
    <div class="eo-proc__intro">
        <h2 id="eo-proc-title">Our Event<br>Planning Process</h2>
        <p>Proses mudah, hasil maksimal.</p>
    </div>
    <ol class="eo-proc__steps">
        @foreach($eo['process'] as $step)
        <li class="eo-proc__step">
            <a href="{{ url($eo['base'].'/proses#langkah-'.$step['n']) }}">
                <span class="eo-proc__ico"><svg class="eo-i" aria-hidden="true"><use href="#{{ $step['icon'] }}"/></svg></span>
                <span class="eo-proc__label">{{ $step['n'] }}. {!! $step['short'] !!}</span>
            </a>
            @if(!$loop->last)
            <span class="eo-proc__arrow" aria-hidden="true"><svg class="eo-i"><use href="#i-arrow"/></svg></span>
            @endif
        </li>
        @endforeach
    </ol>
</section>
