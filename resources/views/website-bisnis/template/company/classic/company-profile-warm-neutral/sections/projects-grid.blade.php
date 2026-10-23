{{-- PROYEK TERBARU (di halaman Portofolio) --}}
<section class="cp-works cp-works--projects" id="proyek" aria-labelledby="cp-projects-title">
    <div class="cp-container">
        <div class="cp-head">
            <div>
                <h2 class="cp-title" id="cp-projects-title">Proyek Terbaru</h2>
                <p class="cp-subtitle">Inovasi yang sedang kami kerjakan</p>
            </div>
        </div>

        <ul class="cp-works__grid">
            @foreach ($projects as $item)
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
