<section class="eo-sec">
    <div class="eo-container eo-faqgrid">
        <div class="eo-chatpage">
            <section class="eo-chat eo-chat--page" data-eo-chat="page" aria-label="AI Chatbot {{ $eo['brand']['name'] }}">
                @include($eo['view'].'partials.chat-body', ['chatid' => 'page'])
            </section>
        </div>

        <div class="eo-faq">
            <h2 class="eo-serif-title">Pertanyaan yang sering diajukan</h2>
            <p class="eo-faq__sub">Pilih pertanyaan untuk melihat jawabannya, atau tanyakan langsung ke asisten AI di samping.</p>
            @foreach($eo['assistant']['kb'] as $entry)
            <details class="eo-qa" data-reveal>
                <summary><span>{{ $entry['q'] }}</span><svg class="eo-i" aria-hidden="true"><use href="#i-plus"/></svg></summary>
                <div class="eo-qa__a">
                    <p>{!! $entry['a'] !!}</p>
                    @if(!empty($entry['link']))
                    <a class="eo-link" href="{{ url($eo['base'].$entry['link']['path']) }}">{{ $entry['link']['label'] }} <svg class="eo-i" aria-hidden="true"><use href="#i-arrow"/></svg></a>
                    @endif
                </div>
            </details>
            @endforeach
        </div>
    </div>
</section>
