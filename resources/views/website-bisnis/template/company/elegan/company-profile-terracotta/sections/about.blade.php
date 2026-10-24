@php $a = $c['about']; @endphp
<section id="tentang" class="cp-about" aria-labelledby="cp-about-t">
    <div>
        <p class="cp-label">{{ $a['eyebrow'] }}</p>
        <h2 id="cp-about-t" class="cp-h2">{{ $a['title'] }}</h2>
        <p class="cp-muted">{{ $a['text'] }}</p>
    </div>
    <figure class="cp-video cp-ph">
        <img src="{{ $img($a['video']['image']) }}" alt="" loading="lazy" onerror="this.remove()">
        <button class="cp-video__play" type="button" aria-label="Putar video: {{ $a['video']['caption'] }}">{{ $ic('play') }}</button>
        <figcaption>{{ $a['video']['caption'] }}</figcaption>
        <time>{{ $a['video']['duration'] }}</time>
    </figure>
</section>
