@extends($v.'layouts.app')

@section('title', 'Tanya AI Assistant - '.$site['brand']['name'])

@section('content')
    @php $ai = $site['ai']; @endphp

    @include($v.'partials.page-header', ['ph' => [
        'crumb' => 'AI Assistant',
        'title' => $ai['title'],
        'text'  => $ai['text'],
        'image' => 'robot-mascot.png',
    ]])

    <section class="lg-wrap lg-sec">
        <div class="lg-split lg-split--chat">
            <div class="lg-chatpage" data-chat>
                <header class="lg-bot__head lg-bot__head--page">
                    <span class="lg-bot__headav"><img src="{{ $img('robot-avatar.png') }}" alt="" width="44" height="44"></span>
                    <div>
                        <strong>{{ $ai['bot_name'] }}</strong>
                        <small><i></i>Online - FAQ pengiriman &amp; logistik</small>
                    </div>
                </header>
                <div class="lg-chat__msgs" data-chat-messages aria-live="polite"></div>
                <div class="lg-chat__chips" data-chat-chips></div>
                <form class="lg-chat__form" data-chat-form autocomplete="off">
                    <label class="lg-sr" for="lg-page-input">Tulis pertanyaan</label>
                    <input id="lg-page-input" type="text" data-chat-input placeholder="Tulis pertanyaan Anda..." maxlength="200">
                    <button type="submit" aria-label="Kirim"><svg class="lg-ic" aria-hidden="true"><use href="#i-send"></use></svg></button>
                </form>
            </div>

            <div>
                <h2 class="lg-h2 lg-h2--first">Pertanyaan yang sering diajukan</h2>
                <div class="lg-faq">
                    @foreach ($ai['faqs'] as $faq)
                        <details>
                            <summary>{{ $faq['q'] }}<svg class="lg-ic" aria-hidden="true"><use href="#i-chevron-down"></use></svg></summary>
                            <p>{{ $faq['a'] }}</p>
                            @if (! empty($faq['route']))
                                <a class="lg-link" href="{{ $to($faq['route']) }}">{{ $faq['cta'] }}<svg class="lg-ic" aria-hidden="true"><use href="#i-arrow-right"></use></svg></a>
                            @endif
                        </details>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection
