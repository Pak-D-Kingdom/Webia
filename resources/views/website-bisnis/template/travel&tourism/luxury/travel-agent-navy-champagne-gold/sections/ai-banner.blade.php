{{-- AI Chatbot (FAQ destinasi & paket): banner di beranda + halaman FAQ --}}
<section class="ga-aib" aria-labelledby="ga-aib-title">
    <img class="ga-aib__bg" src="{{ $img('banner-adventure.jpg') }}" alt="" loading="lazy" decoding="async">
    <div class="ga-container ga-aib__in">
        <img class="ga-aib__bot" src="{{ $img('mascot-full.jpg') }}" alt="Maskot AI Travel Assistant GrandJourney" width="180" height="138" loading="lazy" decoding="async">

        <div class="ga-aib__card">
            <h2 id="ga-aib-title">{{ $t['chatbot']['title'] }}</h2>
            <p>Tanya destinasi, paket tour, itinerary, harga, atau info perjalanan lainnya. Kami siap membantu!</p>
            <ul class="ga-aib__chips">
                @foreach ($t['chatbot']['chips'] as $c)
                    <li><button type="button" data-ai-open data-ai-ask="{{ $c['q'] }}">{{ $c['label'] }}</button></li>
                @endforeach
            </ul>
            <a class="ga-link" href="{{ $url('faq') }}">Buka halaman FAQ {!! $icon('arrow') !!}</a>
        </div>

        <p class="ga-aib__script" aria-hidden="true">Your Next Adventure Awaits…</p>
    </div>
</section>
