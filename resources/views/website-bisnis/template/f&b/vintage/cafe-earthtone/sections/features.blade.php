<section class="kl-features" aria-label="Keunggulan Kopi Lembang">
    <ul class="kl-features__list">
        @foreach ($cafe['features'] as $f)
            <li class="kl-feature">
                <img class="kl-feature__icon" src="{{ $img($f['icon']) }}" alt="" aria-hidden="true" width="38" height="38" loading="lazy">
                <div>
                    <h2 class="kl-feature__title">{{ $f['title'] }}</h2>
                    <p class="kl-feature__text">{{ $f['text'] }}</p>
                </div>
            </li>
        @endforeach
    </ul>
</section>
