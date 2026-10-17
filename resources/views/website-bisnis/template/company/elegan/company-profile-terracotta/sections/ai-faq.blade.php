@php $a = $c['ai']; @endphp
<aside class="cp-ai" id="cp-ai" data-fallback="{{ $a['fallback'] }}">
    <button class="cp-ai__fab" type="button" data-ai-open aria-label="Buka {{ $a['title'] }}" aria-expanded="false">
        <span class="cp-bot">{{ $ic('bot') }}<img src="{{ $img($a['image']) }}" alt="" onerror="this.remove()"></span>
    </button>
    <div class="cp-ai__panel" role="dialog" aria-label="{{ $a['title'] }}" hidden>
        <header class="cp-ai__head">
            <span class="cp-bot">{{ $ic('bot') }}<img src="{{ $img($a['image']) }}" alt="" onerror="this.remove()"></span>
            <div><strong>{{ $a['title'] }}</strong><small>{{ $a['subtitle'] }}</small></div>
            <button class="cp-iconbtn" type="button" data-ai-close aria-label="Tutup">{{ $ic('x') }}</button>
        </header>
        <div class="cp-ai__log"><p class="cp-ai__msg">{{ $a['hello'] }}</p></div>
        <div class="cp-ai__chips">
            @foreach ($a['faq'] as $f)
                <button type="button" data-ai-q>{{ $f['q'] }}</button>
            @endforeach
        </div>
        <form class="cp-ai__form">
            <label class="cp-sr" for="cp-ai-in">Pertanyaan Anda</label>
            <input id="cp-ai-in" placeholder="Tulis pertanyaan Anda..." autocomplete="off">
            <button type="submit" aria-label="Kirim">{{ $ic('send') }}</button>
        </form>
    </div>
    <script type="application/json" id="cp-ai-data">{!! json_encode($a['faq'], JSON_UNESCAPED_UNICODE | JSON_HEX_TAG | JSON_HEX_AMP) !!}</script>
</aside>
