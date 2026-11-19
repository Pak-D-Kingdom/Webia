<article class="eo-card-projects">
    <div class="eo-card-projects__copy">
        <h2>Proyek Kami<br>Sebelumnya</h2>
        <p>Lihat berbagai acara<br>berkesan yang pernah<br>kami wujudkan.</p>
        <a class="eo-btn eo-btn--lilac eo-btn--sm" href="{{ url($eo['base'].'/proyek-kami') }}">Lihat Detail <svg class="eo-i" aria-hidden="true"><use href="#i-arrow"/></svg></a>
    </div>
    <figure class="eo-frame">
        <img src="{{ asset($eo['assets']['img']) }}/project-venue.jpg" alt="Resepsi pernikahan di ballroom dengan chandelier" width="1200" height="900" loading="lazy">
        <button type="button" class="eo-frame__play" data-eo-highlight
                data-title="{{ $eo['projects'][0]['title'] }}"
                data-tag="{{ $eo['projects'][0]['cat'] }}"
                data-meta="{{ $eo['projects'][0]['venue'] }} · {{ $eo['projects'][0]['date'] }}"
                data-text="{{ $eo['projects'][0]['desc'] }}"
                data-imgs="{{ asset($eo['assets']['img']) }}/project-venue.jpg|{{ asset($eo['assets']['img']) }}/polaroid-venue.jpg|{{ asset($eo['assets']['img']) }}/gal-wedding-rose.jpg|{{ asset($eo['assets']['img']) }}/gal-wedding-gold.jpg"
                aria-label="Putar sorotan proyek">
            <i class="eo-frame__ring"></i><svg class="eo-i" aria-hidden="true"><use href="#i-play"/></svg>
        </button>
    </figure>
    <img class="eo-card-projects__flora" src="{{ asset($eo['assets']['img']) }}/flora-right.svg" alt="" aria-hidden="true" loading="lazy">
</article>
