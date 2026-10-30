<section class="sec">
    <div class="lw-wrap">
        <ol class="timeline">
            @foreach ($c['steps'] as $i => $s)
                <li class="card card--pad">
                    <span class="timeline__n">{{ $i + 1 }}</span>
                    <span class="steps__ic"><svg class="ic"><use href="#i-{{ $s['icon'] }}"/></svg></span>
                    <div><h2>{{ $s['title'] }}</h2><p>{{ $s['detail'] }}</p></div>
                </li>
            @endforeach
        </ol>
        <div class="svc__act svc__act--c"><a class="btn btn--navy" href="{{ $url('contact') }}">Mulai Pesan <svg class="ic"><use href="#i-arrow"/></svg></a><a class="link" href="{{ $url('prices') }}">Cek daftar harga</a></div>
    </div>
</section>
