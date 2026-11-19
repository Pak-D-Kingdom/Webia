<section class="uh-banner" aria-labelledby="uh-bn-title">
    <img class="uh-banner__img" src="{{ $img('banner-harga.jpg') }}" alt="" width="283" height="100" loading="lazy">
    <div class="uh-banner__body">
        <h2 id="uh-bn-title" class="uh-banner__title">{{ $uh['prices']['banner_title'] }}</h2>
        <p class="uh-banner__text">{{ $uh['prices']['banner_text'] }}</p>
        <a class="uh-btn uh-btn--cream" href="{{ $url('prices') }}">
            <span>{{ $uh['prices']['banner_button'] }}</span>
            <svg class="uh-i" aria-hidden="true"><use href="#i-arrow-right"/></svg>
        </a>
    </div>
</section>
