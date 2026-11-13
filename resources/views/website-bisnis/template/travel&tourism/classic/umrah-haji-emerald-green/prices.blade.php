@extends('website-bisnis.template.travel&tourism.classic.umrah-haji-emerald-green.layouts.app')


@section('title', 'Harga Paket — Nur Rahmat Travel')
@section('description', 'Daftar harga paket umrah dan haji Nur Rahmat Travel berdasarkan tipe kamar, lengkap dengan fasilitas yang sudah termasuk.')

@section('content')
    @include('website-bisnis.template.travel&tourism.classic.umrah-haji-emerald-green.partials.page-hero', ['key' => 'prices'])

    <section class="uh-section">
        <div class="uh-container">
            <div class="uh-toolbar uh-toolbar--room">
                <div class="uh-seg uh-seg--room" role="radiogroup" aria-label="Pilih tipe kamar" data-uh-roomtoggle>
                    <span class="uh-seg__thumb" aria-hidden="true"></span>
                    @foreach ($uh['prices']['room_types'] as $i => $rt)
                        <button type="button" role="radio" class="uh-seg__btn @if ($i === 0) is-active @endif" @if ($i === 0) aria-checked="true" @else aria-checked="false" @endif data-room="{{ $rt[0] }}" data-room-name="{{ $rt[1] }}">
                            <svg class="uh-i" aria-hidden="true"><use href="#i-bed"/></svg>
                            <span>{{ $rt[1] }}</span><small>{{ $rt[2] }}</small>
                        </button>
                    @endforeach
                </div>
                <p class="uh-toolbar__result">Pilih tipe kamar untuk melihat harga pada semua paket</p>
            </div>

            <div class="uh-pricegrid">
                @foreach ($uh['prices']['items'] as $it)
                    <article class="uh-pricecard @if ($it['tag'] === 'Best Seller') uh-pricecard--feat @endif" id="{{ $it['slug'] }}">
                        <header class="uh-pricecard__head">
                            <span class="uh-tag">{{ $it['tag'] }}</span>
                            <h2 class="uh-pricecard__title">{{ $it['package'] }}</h2>
                        </header>

                        <div class="uh-pricecard__big" data-uh-pricebox>
                            <span class="uh-pricecard__bigl">Harga tipe <b data-uh-roomname>Quad</b></span>
                            <strong class="uh-pricecard__bigp" data-uh-roomprice>{{ $it['from'] }}</strong>
                        </div>

                        <table class="uh-table uh-table--rooms">
                            <caption class="uh-sr">Harga {{ $it['package'] }} per tipe kamar</caption>
                            <tbody>
                                @foreach ($it['rooms'] as $r)
                                    <tr data-room-row="{{ $r[2] }}">
                                        <th scope="row">{{ $r[0] }}</th>
                                        <td>{{ $r[1] }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <p class="uh-pricecard__dp"><svg class="uh-i" aria-hidden="true"><use href="#i-tag"/></svg>{{ $it['dp'] }}</p>

                        <div class="uh-pricecard__lists">
                            <div>
                                <h3 class="uh-pricecard__h3">Sudah termasuk</h3>
                                <ul class="uh-checklist">
                                    @foreach ($it['include'] as $x)
                                        <li><svg class="uh-i" aria-hidden="true"><use href="#i-check"/></svg><span>{{ $x }}</span></li>
                                    @endforeach
                                </ul>
                            </div>
                            <div>
                                <h3 class="uh-pricecard__h3">Belum termasuk</h3>
                                <ul class="uh-checklist uh-checklist--muted">
                                    @foreach ($it['exclude'] as $x)
                                        <li><svg class="uh-i" aria-hidden="true"><use href="#i-x"/></svg><span>{{ $x }}</span></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>

                        <a class="uh-btn uh-btn--gold uh-btn--block" href="{{ $wa('Assalamualaikum Nur Rahmat Travel, saya ingin menanyakan harga terbaru paket '.$it['package'].'.') }}" target="_blank" rel="noopener noreferrer">
                            <svg class="uh-i" aria-hidden="true"><use href="#i-whatsapp"/></svg>
                            <span>Tanya Harga via WhatsApp</span>
                        </a>
                    </article>
                @endforeach
            </div>

            <section class="uh-compare" aria-labelledby="uh-cmp-title">
                <header class="uh-compare__head">
                    <span class="uh-eyebrow">Bandingkan</span>
                    <h2 id="uh-cmp-title" class="uh-compare__title">Perbandingan cepat antar paket</h2>
                </header>
                <div class="uh-table-wrap">
                    <table class="uh-table uh-table--compare">
                        <thead>
                            <tr>
                                <th scope="col">Paket</th>
                                <th scope="col">Durasi</th>
                                <th scope="col">Hotel</th>
                                <th scope="col">Pesawat</th>
                                <th scope="col">Mulai dari</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($uh['packages'] as $pkg)
                                <tr>
                                    <th scope="row"><a href="{{ $url('packages') }}#{{ $pkg['slug'] }}">{{ $pkg['name'] }}</a></th>
                                    <td>{{ $pkg['duration'] }}</td>
                                    <td>{{ $pkg['hotel'] }}</td>
                                    <td>{{ $pkg['airline'] }}</td>
                                    <td><strong>{{ $pkg['price'] }}</strong></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </section>

            <p class="uh-note">{{ $uh['prices']['note'] }}</p>
        </div>
    </section>
@endsection
