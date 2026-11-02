{{-- Lokasi (preview beranda saja — tanpa halaman sendiri) --}}
@php $lo = $c['location']; $ct = $c['contact']; @endphp
<section class="rg-card rg-loc" id="lokasi" aria-labelledby="rgLocTitle">
    <div class="rg-loc__info">
        <div class="rg-loc__head">
            <span class="rg-roundicon rg-roundicon--lg"><i class="bi bi-geo-alt-fill" aria-hidden="true"></i></span>
            <div>
                <h2 id="rgLocTitle" class="rg-h4">{{ $lo['title'] }}</h2>
                <p>{{ $lo['text'] }}</p>
            </div>
        </div>
        <a class="rg-btn rg-btn--outline rg-btn--sm" href="{{ $ct['maps_url'] }}" target="_blank" rel="noopener">Lihat Lokasi <i class="bi bi-arrow-right" aria-hidden="true"></i></a>
        <ul class="rg-loc__list">
            <li><i class="bi bi-geo-alt" aria-hidden="true"></i>{{ $ct['address'] }}</li>
            <li><i class="bi bi-telephone" aria-hidden="true"></i><a href="tel:{{ preg_replace('/\s+/', '', $ct['phone']) }}">{{ $ct['phone'] }}</a></li>
            <li><i class="bi bi-envelope" aria-hidden="true"></i><a href="mailto:{{ $ct['email'] }}">{{ $ct['email'] }}</a></li>
        </ul>
    </div>
    <div class="rg-loc__media">
        <img src="{{ asset($c['images_dir'] . '/clinic.jpg') }}" alt="{{ $lo['image_alt'] }}" loading="lazy" width="960" height="912">
        <span class="rg-loc__pin" aria-hidden="true"><i class="bi bi-geo-alt-fill"></i></span>
        <span class="rg-loc__badge"><i class="bi bi-signpost-2" aria-hidden="true"></i>{{ $lo['badge'] }}</span>
    </div>
</section>
