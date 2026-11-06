<article class="hf-card hf-news" data-reveal>
    <header class="hf-card__head hf-card__head--split">
        <div class="hf-card__headmain">
            <svg class="hf-art" viewBox="0 0 48 48" aria-hidden="true"><use href="#ic-calendar-art"/></svg>
            <div>
                <h2 class="hf-card__title">{{ $f['news']['title'] }}</h2>
                <p class="hf-card__sub hf-card__sub--tight">{{ $f['news']['subtitle'] }}</p>
            </div>
        </div>
        <a class="hf-linkmini" href="{{ route($rp.'news') }}">{{ $f['news']['link'] }} <svg class="hf-i" aria-hidden="true"><use href="#i-arrow"/></svg></a>
    </header>
    <ul class="hf-news__grid">
        @foreach($f['news']['items'] as $n)
            @if($loop->index < 3)
            <li>
                <a class="hf-newsitem" href="{{ route($rp.'news') }}">
                    <img src="{{ asset($img.'/'.$n['image']) }}" width="712" height="160" alt="{{ $n['title'] }}" loading="lazy">
                    <time>{{ $n['date'] }}</time>
                    <strong>{{ $n['title'] }}</strong>
                </a>
            </li>
            @endif
        @endforeach
    </ul>
</article>
