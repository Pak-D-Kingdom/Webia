{{-- Halaman GreenBot (FAQ program & donasi). Chat dihidupkan oleh foundation.js. --}}
@include($v('partials.page-header'))

<section class="fh-sec">
    <div class="fh-wrap fh-split fh-split--chat">
        <aside class="fh-botinfo fh-reveal">
            <img class="fh-botinfo__mascot" src="{{ $img('mascot.png') }}" alt="Maskot robot {{ $cfg['brand']['bot'] }}" width="288" height="324" loading="lazy">
            <h2>{{ $cfg['chatbot']['greeting'] }}</h2>
            <p>{{ $cfg['chatbot']['intro'] }}</p>
            <ul class="fh-checks">
                <li>{{ $icon('check') }}<span>Jawaban cepat seputar program dan donasi</span></li>
                <li>{{ $icon('check') }}<span>Tersedia kapan saja</span></li>
                <li>{{ $icon('check') }}<span>Pertanyaan yang belum terjawab bisa diteruskan ke tim lewat WhatsApp</span></li>
            </ul>
        </aside>

        <div class="fh-chatpage fh-panel fh-reveal">
            <header class="fh-chatpage__head">
                <span class="fh-chatpage__dot" aria-hidden="true"></span>
                <div><strong>{{ $cfg['brand']['bot'] }}</strong><small>Asisten FAQ Program &amp; Donasi</small></div>
            </header>
            @include($v('partials.chat'), ['chatId' => 'fh-page-input'])
        </div>
    </div>
</section>

<section class="fh-sec fh-sec--soft">
    <div class="fh-wrap fh-wrap--narrow">
        <div class="fh-sec__head fh-reveal">
            <span class="fh-eyebrow">FAQ</span>
            <h2>Pertanyaan yang Sering Diajukan</h2>
            <p>Klik pertanyaan untuk membaca jawabannya.</p>
        </div>
        <div class="fh-faq">
            @foreach ($cfg['chatbot']['faq'] as $f)
                <details class="fh-faq__item fh-reveal">
                    <summary>{{ $f['q'] }}{{ $icon('chevron') }}</summary>
                    <div>
                        <p>{{ $f['a'] }}</p>
                        <a class="fh-more" href="{{ $url($f['link']) }}">{{ $f['link_label'] }} {{ $icon('arrow') }}</a>
                    </div>
                </details>
            @endforeach
        </div>
    </div>
</section>
