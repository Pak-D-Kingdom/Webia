@extends('website-bisnis.template.agriculture&farming.organic.agribisnis-earth-tone.layouts.app')

@section('title', 'Jumlah Pesanan Minimum - ' . $data['brand']['name'])
@section('page_key', 'moq')

@section('content')
    @include($v . '.sections.page-banner', [
        'bannerKey'   => 'moq',
        'bannerTitle' => $data['moq']['title'],
        'bannerText'  => $data['moq']['text'],
    ])

    <section class="inner">
        <div class="inner__wrap">
            <div class="split">
                <article class="card card--moq card--moq-lg">
                    <h2>Skala Pemesanan</h2>
                    <p>{{ $data['moq']['text'] }}</p>
                    <div class="metric">
                        <span class="metric__icon metric__icon--green"><svg class="ico"><use href="#i-sprout"></use></svg></span>
                        <div><small>{{ $data['moq']['from'] }}</small><strong>{{ $data['moq']['value'] }}</strong></div>
                    </div>
                    <dl class="kv kv--stack">
                        @foreach ($data['moq']['terms'] as $t)
                            <div><dt>{{ $t['label'] }}</dt><dd>{{ $t['value'] }}</dd></div>
                        @endforeach
                    </dl>
                </article>

                <article class="card calc" aria-labelledby="calcTitle">
                    <h2 id="calcTitle">Cek Jumlah Pesanan Anda</h2>
                    <p>Pilih komoditas dan masukkan jumlah untuk melihat skala pemesanan yang sesuai.</p>
                    <form id="moqForm" novalidate>
                        <div class="form-grid">
                            <div class="field">
                                <label for="moqComm">Komoditas</label>
                                <select id="moqComm">
                                    @foreach ($data['commodities'] as $c)
                                        <option value="{{ $c['slug'] }}" data-moq="{{ (int) filter_var($c['moq'], FILTER_SANITIZE_NUMBER_INT) }}">{{ $c['name'] }} (min. {{ $c['moq'] }})</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="field">
                                <label for="moqQty">Jumlah (ton)</label>
                                <input type="number" id="moqQty" min="0" step="0.5" placeholder="mis. 10" inputmode="decimal">
                            </div>
                        </div>
                        <p class="calc__result" id="moqResult" role="status" aria-live="polite">Masukkan jumlah untuk melihat hasil.</p>
                        <a class="btn btn--accent btn--sm" id="moqCta" href="{{ $u['penawaran'] }}">Lanjut Minta Penawaran <svg class="ico"><use href="#i-arrow"></use></svg></a>
                    </form>
                </article>
            </div>

            <header class="inner__head inner__head--spaced"><h2>Pilihan Skema</h2></header>
            <ul class="feature-grid feature-grid--3">
                @foreach ($data['moq']['tiers'] as $t)
                    <li class="feature-card reveal">
                        <span class="feature-card__tag">{{ $t['range'] }}</span>
                        <h3>{{ $t['name'] }}</h3>
                        <p>{{ $t['text'] }}</p>
                    </li>
                @endforeach
            </ul>

            <header class="inner__head inner__head--spaced"><h2>Pesanan Minimum per Komoditas</h2></header>
            <div class="table-scroll" tabindex="0" role="region" aria-label="Tabel pesanan minimum">
                <table class="data-table">
                    <thead><tr><th scope="col">Komoditas</th><th scope="col">Bentuk produk</th><th scope="col">Grade</th><th scope="col">Pesanan minimum</th></tr></thead>
                    <tbody>
                        @foreach ($data['commodities'] as $c)
                            <tr>
                                <th scope="row"><img src="{{ $img }}/{{ $c['image'] }}" alt="" width="28" height="28" loading="lazy">{{ $c['name'] }}</th>
                                <td>{{ $c['form'] }}</td>
                                <td>{{ $c['grade'] }}</td>
                                <td><strong>{{ $c['moq'] }}</strong></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>

    @include($v . '.partials.explore', ['exploreKeys' => ['kapasitas', 'penawaran', 'distribusi']])
@endsection
