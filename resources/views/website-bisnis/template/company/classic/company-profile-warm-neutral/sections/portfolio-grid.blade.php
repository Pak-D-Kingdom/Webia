{{-- PORTOFOLIO (halaman sendiri) --}}
<section class="cp-works" id="portofolio" aria-labelledby="cp-works-title">
    <div class="cp-container">
        <div class="cp-head">
            <div>
                <h2 class="cp-title" id="cp-works-title">Portofolio</h2>
                <p class="cp-subtitle">Karya terbaik yang telah kami selesaikan</p>
            </div>
        </div>

        <ul class="cp-works__grid">
            @foreach ($portfolio as $item)
                <li class="cp-work">
                    <div class="cp-work__media">
                        <img src="{{ $img($item['image']) }}" alt="{{ $item['alt'] }}" width="252" height="264" loading="lazy">
                    </div>
                    <div class="cp-work__body">
                        <h3 class="cp-work__title">{{ $item['title'] }}</h3>
                        <p class="cp-work__meta">{{ $item['meta'] }}</p>
                        <p class="cp-work__desc">{{ $item['desc'] }}</p>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
</section>
