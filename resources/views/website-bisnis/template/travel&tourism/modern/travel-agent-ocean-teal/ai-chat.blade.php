@extends($ns . '.layouts.app')

@section('title', 'AI Chat – ' . $ta['brand']['name'])

@section('content')
    @include($ns . '.partials.page-hero', [
        'title' => 'AI Travel Assistant',
        'lead'  => $ta['chat']['subtitle'],
        'image' => 'gallery-2.jpg',
    ])

    @php $groups = collect($ta['faqs'])->filter(fn ($f) => $f['cat'])->groupBy('cat'); @endphp

    <section class="ta-section" aria-label="FAQ destinasi dan paket">
        <div class="ta-container ta-faq-layout">
            <div class="ta-faq">
                @foreach ($groups as $cat => $items)
                    <h2 class="ta-h3">{{ $cat }}</h2>
                    @foreach ($items as $f)
                        <details class="ta-qa">
                            <summary>{{ $f['q'] }}{{ $icon('down') }}</summary>
                            <div class="ta-qa__a">
                                @foreach (explode("\n", $f['a']) as $line)<p>{{ $line }}</p>@endforeach
                                @if ($f['link'])
                                    <a class="ta-link" href="{{ $routes[$f['link']] }}">{{ $f['link_label'] }} {{ $icon('arrow') }}</a>
                                @endif
                            </div>
                        </details>
                    @endforeach
                @endforeach
            </div>

            <aside class="ta-faq-side">
                <div class="ta-panel ta-faq-side__card">
                    <img src="{{ $img('mascot-ai.jpg') }}" alt="Maskot robot AI Travel Assistant" loading="lazy">
                    <h2 class="ta-h3">Tanya langsung ke asisten</h2>
                    <p>Ketik pertanyaan tentang destinasi, paket, harga, atau jadwal dan dapatkan jawaban seketika.</p>
                    <button class="ta-btn ta-btn--dark" type="button" data-ta-chat-open>{{ $icon('sparkle') }} Mulai AI Chat</button>
                    <a class="ta-btn ta-btn--outline" href="https://wa.me/{{ $ta['contact']['whatsapp'] }}" target="_blank" rel="noopener noreferrer">{{ $icon('whatsapp') }} Chat via WhatsApp</a>
                </div>
            </aside>
        </div>
    </section>
@endsection
