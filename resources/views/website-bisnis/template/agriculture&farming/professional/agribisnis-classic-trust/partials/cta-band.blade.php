{{-- Variabel: $cta_title, $cta_text --}}
<section class="container ctaband">
    <div class="ctaband__in">
        <div>
            <h2>{{ $cta_title }}</h2>
            <p>{{ $cta_text }}</p>
        </div>
        <div class="ctaband__actions">
            <a class="btn btn--amber" href="{{ route('agribisnis-classic-trust.penawaran') }}">Minta Penawaran <svg class="i" aria-hidden="true"><use href="#i-arrow"/></svg></a>
            <button type="button" class="btn btn--ghost-dark" data-chat-open>
                <svg class="i" aria-hidden="true"><use href="#i-chat"/></svg> Tanya AgroBot
            </button>
        </div>
    </div>
</section>
