<button type="button" class="gal__item media" data-lightbox="gallery" data-src="{{ $img($it['image']) }}" data-caption="{{ $it['alt'] }}" aria-label="Perbesar foto: {{ $it['alt'] }}">
    <img src="{{ $img($it['image']) }}" alt="{{ $it['alt'] }}" loading="lazy" data-fallback>
</button>
