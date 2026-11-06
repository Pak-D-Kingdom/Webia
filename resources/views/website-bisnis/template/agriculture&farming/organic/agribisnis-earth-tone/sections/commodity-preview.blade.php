<section class="home-row home-row--commodity" id="komoditas-unggulan" aria-labelledby="komUnggulanTitle">
    <div class="intro reveal">
        <h2 id="komUnggulanTitle">Komoditas Unggulan <span class="line-arrow" aria-hidden="true"></span></h2>
        <p>Pilihan komoditas terbaik dari perkebunan dan pertanian kami.</p>
        <a class="link-arrow" href="{{ $u['komoditas'] }}">Lihat Semua Komoditas <svg class="ico"><use href="#i-arrow"></use></svg></a>
    </div>

    <div class="card card--strip reveal" style="--d:.08s">
        <ul class="comm-strip" id="commStrip">
            @foreach ($data['commodities'] as $c)
                <li>
                    <a class="comm-item" href="{{ $u['komoditas'] }}?q={{ urlencode(strtolower($c['name'])) }}">
                        <img src="{{ $img }}/{{ $c['image'] }}" alt="{{ $c['name'] }}" width="52" height="52" loading="lazy">
                        <span class="comm-item__txt">
                            <strong>{{ $c['name'] }}</strong>
                            <em>{{ $c['en'] }}</em>
                            <svg class="ico"><use href="#i-chev-right"></use></svg>
                        </span>
                    </a>
                </li>
            @endforeach
        </ul>
        <button class="strip-next" type="button" id="commNext" aria-label="Geser komoditas berikutnya"><svg class="ico"><use href="#i-chev-right"></use></svg></button>
    </div>
</section>
