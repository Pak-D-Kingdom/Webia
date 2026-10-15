<section class="lm-features" aria-label="Keunggulan kami">
    <ul class="lm-container lm-features__list">
        @foreach ($cafe['features'] as $f)
            <li class="lm-feature">
                <svg class="i lm-feature__ico" aria-hidden="true"><use href="#i-{{ $f['icon'] }}"/></svg>
                <div>
                    <strong>{{ $f['title'] }}</strong>
                    <span>{{ $f['text'] }}</span>
                </div>
            </li>
        @endforeach
    </ul>
</section>
