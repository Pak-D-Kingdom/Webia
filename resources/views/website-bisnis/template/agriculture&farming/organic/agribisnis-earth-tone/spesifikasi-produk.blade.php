@extends('website-bisnis.template.agriculture&farming.organic.agribisnis-earth-tone.layouts.app')

@section('title', 'Spesifikasi Produk - ' . $data['brand']['name'])
@section('page_key', 'spesifikasi')

@section('content')
    @include($v . '.sections.page-banner', [
        'bannerKey'   => 'spesifikasi',
        'bannerTitle' => $data['specs']['title'],
        'bannerText'  => $data['specs']['text'],
    ])

    <section class="inner">
        <div class="inner__wrap">
            <header class="inner__head">
                <h2>Standar Umum Produk</h2>
                <p>Acuan kualitas yang berlaku di seluruh komoditas kami.</p>
            </header>
            <ul class="spec-tiles spec-tiles--page">
                @foreach ($data['specs']['headline'] as $s)
                    <li class="spec-tile">
                        <span class="spec-tile__icon"><svg class="ico"><use href="#i-{{ $s['icon'] }}"></use></svg></span>
                        <strong>{{ $s['label'] }}</strong>
                        <span>{{ $s['value'] }}</span>
                    </li>
                @endforeach
            </ul>

            <header class="inner__head inner__head--spaced">
                <h2>Spesifikasi per Komoditas</h2>
                <p>{{ $data['specs']['note'] }}</p>
            </header>

            <div class="tabs" data-tabs>
                <div class="tabs__list" role="tablist" aria-label="Pilih komoditas">
                    @foreach ($data['commodities'] as $c)
                        <button type="button" role="tab" class="tabs__tab {{ $loop->first ? 'is-active' : '' }}" id="tab-{{ $c['slug'] }}" data-tab="{{ $c['slug'] }}" aria-selected="{{ $loop->first ? 'true' : 'false' }}" aria-controls="panel-{{ $c['slug'] }}">
                            <img src="{{ $img }}/{{ $c['image'] }}" alt="" width="28" height="28" loading="lazy">{{ $c['name'] }}
                        </button>
                    @endforeach
                </div>

                @foreach ($data['commodities'] as $c)
                    <div class="tabs__panel {{ $loop->first ? 'is-active' : '' }}" role="tabpanel" id="panel-{{ $c['slug'] }}" aria-labelledby="tab-{{ $c['slug'] }}" @if(!$loop->first) hidden @endif>
                        <div class="spec-panel">
                            <div class="spec-panel__media">
                                <img src="{{ $img }}/{{ $c['image'] }}" alt="{{ $c['name'] }}" width="140" height="140" loading="lazy">
                                <h3>{{ $c['name'] }}</h3>
                                <em>{{ $c['en'] }}</em>
                                <a class="btn btn--primary btn--sm" href="{{ $u['penawaran'] }}?komoditas={{ $c['slug'] }}">Minta Penawaran <svg class="ico"><use href="#i-arrow"></use></svg></a>
                            </div>
                            <dl class="spec-table">
                                @foreach ($data['specs']['table'][$c['slug']] as $label => $value)
                                    <div><dt>{{ $label }}</dt><dd>{{ $value }}</dd></div>
                                @endforeach
                            </dl>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
