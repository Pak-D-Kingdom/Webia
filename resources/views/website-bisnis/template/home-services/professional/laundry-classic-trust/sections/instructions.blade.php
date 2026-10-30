<section class="sec">
    <div class="lw-wrap insp">
        <ol class="timeline">
            @foreach ($c['steps'] as $i => $s)
                <li class="card card--pad">
                    <span class="timeline__n">{{ $i + 1 }}</span>
                    <span class="steps__ic"><svg class="ic"><use href="#i-{{ $s['icon'] }}"/></svg></span>
                    <div><h2>{{ $s['title'] }}</h2><p>{{ $s['detail'] }}</p></div>
                </li>
            @endforeach
        </ol>
        <aside class="card card--pad botcard">
            <img src="{{ $img('robot-freshbot.png') }}" alt="{{ $c['chatbot']['name'] }}, robot asisten laundry" loading="lazy">
            <h2>Masih ada pertanyaan?</h2>
            <p>{{ $c['chatbot']['name'] }} siap menjawab seputar harga dan proses laundry kapan saja.</p>
            <button type="button" class="btn btn--navy btn--block" data-bot-open>Chat Sekarang <svg class="ic"><use href="#i-arrow"/></svg></button>
            <a class="btn btn--ghost btn--block" href="{{ $url('contact') }}" style="margin-top:10px">Mulai Pesan</a>
        </aside>
    </div>
</section>
