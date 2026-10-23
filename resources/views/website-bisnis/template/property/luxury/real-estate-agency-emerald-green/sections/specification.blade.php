{{-- ===================== SPECIFICATION (halaman detail properti) ===================== --}}
@php $showHead = $head ?? false; @endphp
<section class="rea-section rea-section--alt" id="specification" aria-label="{{ $pages['specification']['title'] }}">
    <div class="rea-container">
        @if ($showHead)
            <header class="rea-sec-head">
                <div class="rea-section-head">
                    <p class="rea-eyebrow rea-eyebrow--dark">PROPERTY DETAILS</p>
                    <h2>{{ $pages['specification']['title'] }}</h2>
                    <p>{{ $pages['specification']['subtitle'] }}</p>
                </div>
            </header>
        @endif

        <div class="rea-speccard">
            <dl class="rea-specs">
                @foreach ($property['specs'] as $spec)
                    <div class="rea-specs__row">
                        <dt>{{ $icon($spec['icon']) }}<span>{{ $spec['label'] }}</span></dt>
                        <dd>{{ $spec['value'] }}</dd>
                    </div>
                @endforeach
            </dl>
        </div>

        <div class="rea-facilities">
            <h3>Facilities &amp; Highlights</h3>
            <ul>
                @foreach ($property['facilities'] as $fac)
                    <li>{{ $icon($fac['icon']) }}<span>{{ $fac['label'] }}</span></li>
                @endforeach
            </ul>
        </div>

        <div class="rea-cta-row">
            <a class="rea-btn rea-btn--dark" href="#price">View Price {{ $icon('arrow') }}</a>
            <a class="rea-btn rea-btn--gold" href="#booking">Book a Viewing {{ $icon('arrow') }}</a>
        </div>
    </div>
</section>
