{{-- Kartu produk. Butuh variabel $p (satu item dari config skincare.php) --}}
<article class="pcard" data-item
    data-id="{{ $p['id'] }}"
    data-name="{{ mb_strtolower($p['name']) }}"
    data-cat="{{ $p['category'] }}"
    data-status="{{ $p['status'] }}"
    data-price="{{ $p['price'] }}"
    data-rating="{{ $p['rating'] }}">
    <div class="pcard__media">
        <img src="{{ $img }}/{{ $p['image'] }}" alt="{{ $p['name'] }}" width="486" height="342" loading="lazy">
        @if ($p['badge'])
            <span class="badge badge--{{ $p['badge_class'] }}">{{ $p['badge'] }}</span>
        @endif
        <button class="pcard__wish" type="button" data-wish="{{ $p['id'] }}" aria-pressed="false" aria-label="Simpan {{ $p['name'] }} ke wishlist"><i class="bi bi-heart" aria-hidden="true"></i></button>
    </div>
    <div class="pcard__body">
        <h3 class="pcard__name">{{ $p['name'] }}</h3>
        <p class="pcard__meta">{{ $p['size'] }} | {{ $p['category_name'] }}</p>
        <p class="pcard__price"><strong>{{ $p['price_fmt'] }}</strong> @if ($p['discount'])<s>{{ $p['old_fmt'] }}</s>@endif</p>
        <p class="pcard__info">
            <span class="rate"><i class="bi bi-star-fill" aria-hidden="true"></i> {{ $p['rating'] }} ({{ $p['reviews'] }})</span>
            <span class="stock stock--{{ $p['status'] }}"><i class="bi bi-circle-fill" aria-hidden="true"></i> {{ $p['status_label'] }}</span>
        </p>
        <button class="btn btn--rose btn--block" type="button" data-add="{{ $p['id'] }}" @disabled($p['status'] === 'out')>
            @if ($p['status'] === 'out') Habis @else <i class="bi bi-plus-lg" aria-hidden="true"></i> Keranjang @endif
        </button>
    </div>
</article>
