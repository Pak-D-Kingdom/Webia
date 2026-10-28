{{-- Itinerary: hanya halaman penuh (tab per paket). Tidak ada preview di beranda. --}}


    <section class="ta-section" aria-label="Itinerary per paket">
        <div class="ta-container ta-tabs" data-ta-tabs>
            <div class="ta-tabs__list" role="tablist" aria-label="Pilih paket tour">
                @foreach ($ta['packages'] as $i => $p)
                    <button type="button" role="tab" class="ta-tab" id="tab-{{ $p['slug'] }}" aria-controls="panel-{{ $p['slug'] }}"
                            aria-selected="{{ $i === 0 ? 'true' : 'false' }}" tabindex="{{ $i === 0 ? '0' : '-1' }}" data-tab="{{ $p['slug'] }}">
                        {{ explode(' – ', $p['title'])[0] }}
                    </button>
                @endforeach
            </div>

            @foreach ($ta['packages'] as $i => $p)
                <div class="ta-tabpanel" role="tabpanel" id="panel-{{ $p['slug'] }}" aria-labelledby="tab-{{ $p['slug'] }}" data-panel="{{ $p['slug'] }}" @if ($i !== 0) hidden @endif>
                    <div class="ta-it-layout">
                        <ol class="ta-timeline">
                            @foreach ($ta['itineraries'][$p['slug']] as $n => $day)
                                <li class="ta-timeline__item">
                                    <span class="ta-day">Hari {{ $n + 1 }}</span>
                                    <div class="ta-timeline__card">
                                        <h3>{{ $day['title'] }}</h3>
                                        <p>{{ $day['desc'] }}</p>
                                    </div>
                                </li>
                            @endforeach
                        </ol>

                        <aside class="ta-it-aside">
                            <img src="{{ $img($p['image']) }}" alt="" loading="lazy">
                            <div class="ta-it-aside__body">
                                <h3>{{ $p['title'] }}</h3>
                                <ul class="ta-meta">
                                    <li>{{ $icon('calendar') }}{{ $p['duration'] }}</li>
                                    <li>{{ $icon('pin') }}{{ $p['location'] }}</li>
                                </ul>
                                <ul class="ta-checks">
                                    @foreach ($p['includes'] as $inc)<li>{{ $icon('check') }}{{ $inc }}</li>@endforeach
                                </ul>
                                <p class="ta-pkg__price"><strong>{{ $rp($p['price']) }}</strong><small>/orang</small></p>
                                <a class="ta-btn ta-btn--primary" href="{{ $routes['inquiry'] }}?dest={{ $p['dest'] }}">Booking Paket Ini {{ $icon('arrow') }}</a>
                                <button class="ta-btn ta-btn--outline" type="button" data-ta-chat-open>{{ $icon('sparkle') }} Tanya AI</button>
                            </div>
                        </aside>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

