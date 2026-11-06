{{--
    Banner dekoratif dari desain UI (bukan section baru): berada di baris FAQ + Kebijakan.
    $side = 'left'  → "Keindahan Alami untuk Kulit Sehatmu"
    $side = 'right' → "Your Skin Our Priority"
--}}
@if (($side ?? 'left') === 'left')
    <aside class="cg-banner cg-banner--left" aria-label="Penawaran perawatan">
        <img class="cg-banner__img" src="{{ $img }}/lotus-left.jpg" alt="" width="808" height="472" loading="lazy" decoding="async">
        <div class="cg-banner__body">
            <h2 class="cg-banner__title">Keindahan Alami<br>untuk Kulit Sehatmu</h2>
            <p>Dapatkan perawatan eksklusif dengan teknologi terbaru dan produk skincare berkualitas.</p>
            <a class="cg-btn cg-btn--primary cg-btn--sm" href="{{ route('glow.appointment') }}">
                Lihat Promo <i class="bi bi-arrow-right" aria-hidden="true"></i>
            </a>
        </div>
    </aside>
@else
    <aside class="cg-banner cg-banner--right" aria-label="Komitmen {{ $c['brand']['name'] }}">
        <img class="cg-banner__img" src="{{ $img }}/lotus-right.jpg" alt="" width="592" height="472" loading="lazy" decoding="async">
        <p class="cg-banner__script">Your Skin<br>Our Priority</p>
    </aside>
@endif
