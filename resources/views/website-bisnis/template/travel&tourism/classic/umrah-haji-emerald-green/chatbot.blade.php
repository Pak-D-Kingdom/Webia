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

                <div class="uh-chatwin__log" data-uh-chat-log data-webia-ai-log="travel" role="log" aria-live="polite" aria-label="Percakapan dengan AI Assistant"></div>

                <div class="uh-chatwin__chips" data-uh-chat-chips aria-label="Pertanyaan cepat">
                    @foreach ($uh['ai']['items'] as $it)
                        <button type="button" class="uh-chip uh-chip--sm" data-q="{{ $it['q'] }}">{{ $it['label'] }}</button>
                    @endforeach
                </div>

                <form class="uh-chatwin__form" data-uh-chat-form data-webia-ai-form="travel" autocomplete="off">
                    <span class="uh-sr" id="uh-chat-label">Tulis pertanyaan Anda</span>
                    <div class="uh-chatfield">
            <div class="uh-sugg" data-uh-chat-suggest id="uh-chat-input-sugg" role="listbox" aria-label="Saran pertanyaan" hidden></div>
            <label class="uh-chatfield__box" for="uh-chat-input">
                <svg class="uh-i uh-chatfield__lens" aria-hidden="true"><use href="#i-search"/></svg>
                <input id="uh-chat-input" class="uh-chatfield__input" type="text" name="q" maxlength="200" placeholder="Cari atau tulis pertanyaan Anda, misalnya: syarat pendaftaran" autocomplete="off" role="combobox" aria-autocomplete="list" aria-expanded="false" aria-controls="uh-chat-input-sugg" data-uh-chat-input data-webia-ai-input="travel">
                <span class="uh-chatfield__count" data-uh-chat-count hidden></span>
                <button type="button" class="uh-chatfield__clear" data-uh-chat-clear aria-label="Hapus pertanyaan" hidden>
                    <svg class="uh-i" aria-hidden="true"><use href="#i-x"/></svg>
                </button>
            </label>
            <button type="submit" class="uh-chatfield__send" aria-label="Kirim pertanyaan" disabled>
                <svg class="uh-i" aria-hidden="true"><use href="#i-send"/></svg>
            </button>
        </div>
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
