@extends($v.'.layouts.app')

@section('title', 'HopeBot - FAQ Program & Donasi - '.$f['brand']['name'].' '.$f['brand']['suffix'])
@section('body_class', 'page-inner page-chatbot')

@section('content')
    @include($v.'.partials.page-header', ['crumb' => 'HopeBot', 'title' => 'Tanya HopeBot', 'lead' => $f['chatbot']['intro']])

    <div class="hf-container hf-page">
        <section class="hf-split hf-split--chat" data-reveal>
            <aside class="hf-card hf-card--pad hf-botintro">
                <div class="hf-botintro__mascot">@include($v.'.partials.mascot', ['view' => 'full', 'cls' => ''])</div>
                <h2 class="hf-h2">{{ $f['chatbot']['greeting'] }}</h2>
                <p>Saya asisten FAQ untuk program dan donasi. Pilih topik di bawah atau tulis pertanyaan Anda.</p>
                <ul class="hf-topics">
                    @foreach($f['chatbot']['quick'] as $q)
                        <li><button type="button" class="hf-chip" data-ask-page="{{ $q }}">{{ $q }}</button></li>
                    @endforeach
                </ul>
            </aside>

            <div class="hf-card hf-chatpage" id="hf-chat-page" data-chat-page>
                <header class="hf-chat__head">
                    <span class="hf-chat__avatar">@include($v.'.partials.mascot', ['view' => 'head', 'cls' => ''])</span>
                    <div class="hf-chat__title"><strong>{{ $f['chatbot']['name'] }}</strong><span><i class="hf-chat__online"></i> Siap membantu program &amp; donasi</span></div>
                </header>
                <div class="hf-chat__log" data-chat-log aria-live="polite"></div>
                <form class="hf-chat__form" data-chat-form autocomplete="off">
                    <input type="text" data-chat-input placeholder="{{ $f['chatbot']['placeholder'] }}" aria-label="Tulis pertanyaan" maxlength="200">
                    <button type="submit" class="hf-chat__send" aria-label="Kirim"><svg class="hf-i" aria-hidden="true"><use href="#i-send"/></svg></button>
                </form>
            </div>
        </section>
    </div>
@endsection
