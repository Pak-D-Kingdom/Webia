@extends('website-bisnis.template.travel&tourism.classic.umrah-haji-emerald-green.layouts.app')


@section('title', 'Itinerary Perjalanan — Nur Rahmat Travel')
@section('description', 'Itinerary perjalanan umrah dan haji hari demi hari bersama Nur Rahmat Travel.')

@section('content')
    @include('website-bisnis.template.travel&tourism.classic.umrah-haji-emerald-green.partials.page-hero', ['key' => 'itinerary'])

    <section class="uh-section">
        <div class="uh-container uh-split">
            <div class="uh-tabs" data-uh-tabs>
                <div class="uh-tabs__list" role="tablist" aria-label="Pilih paket untuk melihat itinerary">
                    <span class="uh-seg__thumb" aria-hidden="true"></span>
                    @foreach ($uh['itinerary']['tabs'] as $i => $tab)
                        <button type="button" role="tab" class="uh-tab @if ($i === 0) is-active @endif" id="tab-{{ $tab['key'] }}" aria-controls="panel-{{ $tab['key'] }}" @if ($i === 0) aria-selected="true" tabindex="0" @else aria-selected="false" tabindex="-1" @endif>{{ $tab['label'] }}</button>
                    @endforeach
                </div>

                @foreach ($uh['itinerary']['tabs'] as $i => $tab)
                    <div class="uh-tabpanel" role="tabpanel" id="panel-{{ $tab['key'] }}" aria-labelledby="tab-{{ $tab['key'] }}" @if ($i !== 0) hidden @endif>
                        <ol class="uh-timeline">
                            @foreach ($tab['days'] as $d)
                                <li class="uh-timeline__item">
                                    <span class="uh-timeline__day"><svg class="uh-i" aria-hidden="true"><use href="#i-{{ $d['icon'] }}"/></svg>{{ $d['day'] }}</span>
                                    <div class="uh-timeline__card">
                                        <h2 class="uh-timeline__title">{{ $d['title'] }}</h2>
                                        <p>{{ $d['text'] }}</p>
                                    </div>
                                </li>
                            @endforeach
                        </ol>
                    </div>
                @endforeach
            </div>

            <aside class="uh-aside">
                <div class="uh-card uh-asidecard">
                    <figure class="uh-asidecard__media uh-frame"><img class="uh-frame__bg" src="{{ $img($uh['itinerary']['image']) }}" alt="" aria-hidden="true" loading="lazy"><img src="{{ $img($uh['itinerary']['image']) }}" alt="Masjid dan menara di tengah kota" width="260" height="204" loading="lazy"></figure>
                    <h2 class="uh-asidecard__title">Ringkasan perjalanan</h2>
                    <ol class="uh-mini">
                        @foreach ($uh['itinerary']['steps'] as $s)
                            <li><span class="uh-mini__ico"><svg class="uh-i" aria-hidden="true"><use href="#i-{{ $s['icon'] }}"/></svg></span><span><strong>{{ $s['day'] }}</strong> {{ $s['label'] }}</span></li>
                        @endforeach
                    </ol>
                    <a class="uh-btn uh-btn--gold uh-btn--block" href="{{ $wa($uh['hero']['wa_consult']) }}" target="_blank" rel="noopener noreferrer">
                        <svg class="uh-i" aria-hidden="true"><use href="#i-whatsapp"/></svg>
                        <span>Tanya Itinerary</span>
                    </a>
                </div>
            </aside>
        </div>
    </section>
@endsection
