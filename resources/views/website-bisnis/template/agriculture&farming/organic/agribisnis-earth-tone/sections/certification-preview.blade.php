<article class="card card--cert" aria-labelledby="certPrevTitle">
    <div class="card__titlerow">
        <span class="title-icon"><svg class="ico"><use href="#i-sprout"></use></svg></span>
        <div>
            <h2 id="certPrevTitle">{{ $data['certifications']['title'] }}</h2>
            <p>{{ $data['certifications']['text'] }}</p>
        </div>
    </div>
    <ul class="cert-logos">
        @foreach ($data['certifications']['items'] as $c)
            <li><img src="{{ $img }}/{{ $c['image'] }}" alt="Logo {{ $c['name'] }}" loading="lazy"></li>
        @endforeach
    </ul>
    <a class="link-arrow" href="{{ $u['sertifikasi'] }}">Lihat Sertifikasi <svg class="ico"><use href="#i-arrow"></use></svg></a>
</article>
