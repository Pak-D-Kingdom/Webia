@php $a = $c['ai']; @endphp
<aside class="cp-ai" id="cp-ai" data-fallback="{{ $a['fallback'] }}">
    <button class="cp-ai__fab" type="button" data-ai-open aria-label="Buka {{ $a['title'] }}" aria-expanded="false">
        <span class="cp-wa__tip">{{ $a['fab_label'] }}</span>
        <span class="cp-bot">{{ $ic('bot') }}<img src="{{ $img($a['image']) }}" alt="" onerror="this.remove()"></span>
        <span class="cp-ai__spark" aria-hidden="true"></span>
    </button>

    <div class="cp-ai__panel" role="dialog" aria-label="{{ $a['title'] }}" hidden>
        <img class="cp-ai__robot" src="{{ $img($a['image']) }}" alt="" aria-hidden="true" onerror="this.remove()">
        <div class="cp-ai__main">
            <header class="cp-ai__head">
                <div><strong>{{ $a['title'] }}</strong><small>{{ $a['subtitle'] }}</small></div>
                <button class="cp-ai__close" type="button" data-ai-close aria-label="Tutup">{{ $ic('x') }}</button>
            </header>
            <div class="cp-ai__log"><p class="cp-ai__msg">{{ $a['hello'] }}</p></div>
            <div class="cp-ai__chips">
                @foreach ($a['faq'] as $f)
                    <button type="button" data-ai-q>{{ $f['q'] }}</button>
                @endforeach
            </div>
        </div>
        <form class="cp-ai__form">
            <label class="cp-sr" for="cp-ai-in">Pertanyaan Anda</label>
            <input id="cp-ai-in" placeholder="Tulis pertanyaan Anda..." autocomplete="off">
            <button type="submit" aria-label="Kirim">{{ $ic('send') }}</button>
        </form>
    </div>
    <script type="application/json" id="cp-ai-data">{!! json_encode($a['faq'], JSON_UNESCAPED_UNICODE | JSON_HEX_TAG | JSON_HEX_AMP) !!}</script>
</aside>
