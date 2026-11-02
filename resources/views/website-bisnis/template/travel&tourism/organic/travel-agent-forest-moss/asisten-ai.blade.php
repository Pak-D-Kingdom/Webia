@extends($ns . '.layouts.app')
@section('title', 'AI Travel Assistant')
@section('page', 'asisten-ai')
@section('content')
    @include($ns . '.partials.page-header', ['title' => 'AI Travel Assistant', 'subtitle' => $cfg['ai']['subtitle'], 'crumb' => 'AI Chatbot'])

    <section class="ta-section" aria-label="Asisten AI">
        <div class="ta-container ta-aipage">
            <div class="ta-card ta-aipage__chat">
                <header class="ta-aipage__head">
                    <span class="ta-aipage__avatar"><img src="{{ $img('mascot.jpg') }}" alt="" width="56" height="56"></span>
                    <div><strong>{{ $cfg['ai']['title'] }}</strong><small><i class="ta-dot"></i> FAQ destinasi & paket tour</small></div>
                </header>
                @include($ns . '.partials.ai-chat', ['variant' => 'page', 'cid' => 'chat-page'])
            </div>

            <aside class="ta-aipage__side">
                <div class="ta-card">
                    <h2 class="ta-subtitle">Pertanyaan yang sering diajukan</h2>
                    <ul class="ta-faqlist">
                        @foreach ($cfg['ai']['faqs'] as $f)
                            <li><button type="button" data-chat-chip="{{ $f['q'] }}">{{ $f['q'] }}<svg class="ta-i" aria-hidden="true"><use href="#i-chev-right"/></svg></button></li>
                        @endforeach
                    </ul>
                </div>
                <div class="ta-card ta-aipage__art"><img src="{{ $img('ai-banner-left.jpg') }}" alt="Maskot robot penjelajah GreenTrip" loading="lazy"></div>
            </aside>
        </div>
    </section>
@endsection
