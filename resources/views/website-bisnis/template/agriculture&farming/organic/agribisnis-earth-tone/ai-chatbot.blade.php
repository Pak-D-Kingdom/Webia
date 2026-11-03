@extends('website-bisnis.template.agriculture&farming.organic.agribisnis-earth-tone.layouts.app')

@section('title', 'AI FAQ Komoditas & Kemitraan - ' . $data['brand']['name'])
@section('page_key', 'chatbot')

@section('content')
    @include($v . '.sections.page-banner', [
        'bannerKey'   => 'chatbot',
        'bannerTitle' => 'AI FAQ Komoditas & Kemitraan',
        'bannerText'  => 'Tanyakan seputar komoditas, spesifikasi, pesanan minimum, pengiriman, sertifikasi, dan kemitraan bisnis.',
    ])

    <section class="inner">
        <div class="inner__wrap">
            <div class="split split--chat">
                <section class="chat-inline" id="agInline" aria-label="Asisten AgroHarvest">
                    <header class="ag-chat__head">
                        <span class="ag-chat__avatar"><img src="{{ $img }}/mascot-avatar.jpg" alt="" width="44" height="44"></span>
                        <div class="ag-chat__who">
                            <h2>{{ $data['chatbot']['name'] }}</h2>
                            <p><i aria-hidden="true"></i>{{ $data['chatbot']['subtitle'] }}</p>
                        </div>
                    </header>
                    <div class="ag-chat__body" id="agInlineBody" role="log" aria-live="polite" aria-relevant="additions"></div>
                    <div class="ag-chat__quick" id="agInlineQuick">
                        @foreach ($data['chatbot']['quick'] as $q)
                            <button type="button" class="chip" data-chat-quick="{{ $q }}">{{ $q }}</button>
                        @endforeach
                    </div>
                    <form class="ag-chat__form" id="agInlineForm" autocomplete="off">
                        <label class="sr-only" for="agInlineInput">Tulis pertanyaan Anda</label>
                        <input type="text" id="agInlineInput" placeholder="Tulis pertanyaan Anda..." maxlength="200">
                        <button type="submit" aria-label="Kirim pertanyaan"><svg class="ico"><use href="#i-send"></use></svg></button>
                    </form>
                </section>

                <div class="faq">
                    <h2>Pertanyaan yang Sering Diajukan</h2>
                    @foreach ($data['chatbot']['faq'] as $f)
                        <details class="faq__item">
                            <summary>{{ $f['q'] }}<svg class="ico"><use href="#i-chev-down"></use></svg></summary>
                            <p>{{ $f['a'] }}</p>
                        </details>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection
