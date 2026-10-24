{{-- ===================== HIGHLIGHTS ===================== --}}
    <section class="rea-container rea-features" id="features" aria-label="Why this property">
        <ul class="rea-features__list">
            @foreach ($features as $f)
                <li class="rea-feature">
                    <span class="rea-feature__icon">{{ $icon($f['icon']) }}</span>
                    <div>
                        <h3>{{ $f['title'] }}</h3>
                        <p>{{ $f['text'] }}</p>
                    </div>
                </li>
            @endforeach
        </ul>
    </section>
