@extends('website-bisnis.template.travel&tourism.classic.umrah-haji-emerald-green.layouts.app')


@section('title', 'Harga Paket — Nur Rahmat Travel')
@section('description', 'Daftar harga paket umrah dan haji Nur Rahmat Travel berdasarkan tipe kamar, lengkap dengan fasilitas yang sudah termasuk.')

@section('content')
    @include('website-bisnis.template.travel&tourism.classic.umrah-haji-emerald-green.partials.page-hero', ['key' => 'prices'])

    <section class="uh-section">
        <div class="uh-container">
            <div class="uh-pricegrid">
                @foreach ($uh['prices']['items'] as $it)
                    <article class="uh-pricecard @if ($it['tag'] === 'Best Seller') uh-pricecard--feat @endif" id="{{ $it['slug'] }}">
                        <header class="uh-pricecard__head">
                            <span class="uh-tag">{{ $it['tag'] }}</span>
                            <h2 class="uh-pricecard__title">{{ $it['package'] }}</h2>
                            <p class="uh-pricecard__from"><span>Mulai dari</span><strong>{{ $it['from'] }}</strong></p>
                        </header>

                        <table class="uh-table uh-table--rooms">
                            <caption class="uh-sr">Harga {{ $it['package'] }} per tipe kamar</caption>
                            <tbody>
                                @foreach ($it['rooms'] as $r)
                                    <tr>
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
            <p class="uh-note">{{ $uh['prices']['note'] }}</p>
        </div>
    </section>
@endsection
