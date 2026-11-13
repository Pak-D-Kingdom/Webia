<section class="abd-cta">
    <div class="abd-container">
        <div class="abd-cta__box" data-reveal>
            <div>
                <h2>{{ $ctaTitle ?? 'Siap mewujudkan bangunan impian Anda?' }}</h2>
                <p>{{ $ctaText ?? 'Ceritakan kebutuhan Anda. Tim arsitek kami akan membantu dari konsep hingga serah terima.' }}</p>
            </div>
            <div class="abd-cta__btns">
                <a class="abd-btn abd-btn--gold" href="{{ $u('/konsultasi') }}"><svg class="i" aria-hidden="true"><use href="#i-calendar"/></svg><span>Booking Konsultasi</span></a>
                <a class="abd-btn abd-btn--ghost-gold" href="{{ $u('/penawaran') }}"><svg class="i" aria-hidden="true"><use href="#i-doc"/></svg><span>Minta Penawaran</span></a>
            </div>
        </div>
    </div>
</section>
