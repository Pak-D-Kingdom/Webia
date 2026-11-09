<article class="eo-card-portfolio">
    <div class="eo-card-portfolio__copy">
        <h2>Event Portfolio</h2>
        <p>Karya terbaik kami<br>di berbagai acara.</p>
        <a class="eo-btn eo-btn--lilac eo-btn--sm" href="{{ url($eo['base'].'/portofolio') }}">Lihat Portfolio <svg class="eo-i" aria-hidden="true"><use href="#i-arrow"/></svg></a>
    </div>
    <a class="eo-polaroid" href="{{ url($eo['base'].'/portofolio') }}" aria-label="Lihat portofolio acara">
        <img src="{{ asset($eo['assets']['img']) }}/polaroid-venue.jpg" alt="Resepsi dengan chandelier dan meja bundar" width="1200" height="900" loading="lazy">
        <span class="eo-polaroid__cap">Dream Event<br>Come True &#9825;</span>
    </a>
    <img class="eo-card-portfolio__flora" src="{{ asset($eo['assets']['img']) }}/flora-card.svg" alt="" aria-hidden="true" loading="lazy">
</article>
