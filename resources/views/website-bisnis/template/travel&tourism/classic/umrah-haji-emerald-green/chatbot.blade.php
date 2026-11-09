@extends('website-bisnis.template.travel&tourism.classic.umrah-haji-emerald-green.layouts.app')


@section('title', 'AI Assistant Muthawwif — Nur Rahmat Travel')
@section('description', 'Tanya AI Assistant Nur Rahmat Travel seputar paket, harga, jadwal, hotel, itinerary, dan persyaratan pendaftaran.')

@section('content')
    @include('website-bisnis.template.travel&tourism.classic.umrah-haji-emerald-green.partials.page-hero', ['key' => 'chatbot'])

    <section class="uh-section">
        <div class="uh-container uh-chatpage">
            <div class="uh-chatwin" data-uh-chatbot>
                <header class="uh-chatwin__head">
                    <span class="uh-chatwin__avatar"><img src="{{ $img('maskot-robot.png') }}" alt="" width="46" height="42"></span>
                    <div class="uh-chatwin__who">
                        <strong>Muthawwif AI</strong>
                        <span class="uh-chatwin__status"><i aria-hidden="true"></i>Online · FAQ paket &amp; pendaftaran</span>
                    </div>
                </header>

                <div class="uh-chatwin__log" data-uh-chat-log role="log" aria-live="polite" aria-label="Percakapan dengan AI Assistant"></div>

                <div class="uh-chatwin__chips" data-uh-chat-chips aria-label="Pertanyaan cepat">
                    @foreach ($uh['ai']['items'] as $it)
                        <button type="button" class="uh-chip uh-chip--sm" data-q="{{ $it['q'] }}">{{ $it['label'] }}</button>
                    @endforeach
                </div>

                <form class="uh-chatwin__form" data-uh-chat-form autocomplete="off">
                    <label class="uh-sr" for="uh-chat-input">Tulis pertanyaan Anda</label>
                    <input id="uh-chat-input" class="uh-chatwin__input" type="text" name="q" maxlength="200" placeholder="Tulis pertanyaan Anda, misalnya: apa saja syarat pendaftaran?" data-uh-chat-input>
                    <button type="submit" class="uh-chatwin__send" aria-label="Kirim pertanyaan">
                        <svg class="uh-i" aria-hidden="true"><use href="#i-send"/></svg>
                    </button>
                </form>
            </div>

            <aside class="uh-chataside">
                <div class="uh-card uh-chataside__card">
                    <img class="uh-chataside__robot" src="{{ $img('maskot-robot.png') }}" alt="" width="170" height="156" loading="lazy">
                    <h2 class="uh-chataside__title">Topik yang bisa ditanyakan</h2>
                    <ul class="uh-chataside__list">
                        @foreach ($uh['ai']['items'] as $it)
                            <li>
                                <button type="button" data-uh-chat-ask="{{ $it['q'] }}">
                                    <span class="uh-ai__ico"><svg class="uh-i" aria-hidden="true"><use href="#i-{{ $it['icon'] }}"/></svg></span>
                                    <span>{{ $it['label'] }}</span>
                                    <svg class="uh-i" aria-hidden="true"><use href="#i-chevron-right"/></svg>
                                </button>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div class="uh-card uh-chataside__card uh-chataside__card--help">
                    <h2 class="uh-chataside__title">Butuh bantuan langsung?</h2>
                    <p>Tim kami siap membantu pada {{ $uh['brand']['hours'] }}.</p>
                    <a class="uh-btn uh-btn--gold uh-btn--block" href="{{ $wa($uh['hero']['wa_consult']) }}" target="_blank" rel="noopener noreferrer">
                        <svg class="uh-i" aria-hidden="true"><use href="#i-whatsapp"/></svg>
                        <span>Hubungi via WhatsApp</span>
                    </a>
                </div>
            </aside>
        </div>
    </section>
@endsection
