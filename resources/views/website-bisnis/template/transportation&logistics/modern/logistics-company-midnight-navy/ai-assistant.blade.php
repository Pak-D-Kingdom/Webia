@extends($site['view'] . '.layouts.app')

@section('title', 'AI Assistant — ' . $site['brand']['name'])
@section('page', 'chatbot')

@section('content')
    @include($site['view'] . '.partials.page-header', ['title' => 'AI Assistant', 'subtitle' => $site['ai']['subtitle']])

    <section class="lc-band lc-band--ai lc-page-sec">
        <div class="lc-wrap lc-aipage">
            <div class="lc-aipage__chat">
                @include($site['view'] . '.partials.chat-panel', ['inline' => true])
            </div>
            <div class="lc-aipage__faq" data-lc-accordion>
                <div class="lc-aipage__faqhead">
                    <h2>Pertanyaan yang sering diajukan</h2>
                    <button class="lc-acc__all" type="button" data-lc-acc-all hidden>Buka semua</button>
                </div>
                @foreach ($site['ai']['faq'] as $i => $item)
                    @php $n = $i + 1; $open = $i === 0; @endphp
                    <div class="lc-acc{{ $open ? ' is-open' : '' }}">
                        <h3 class="lc-acc__h">
                            <button class="lc-acc__btn" type="button" id="lc-acc-b-{{ $n }}" aria-expanded="{{ $open ? 'true' : 'false' }}" aria-controls="lc-acc-p-{{ $n }}">
                                <span class="lc-acc__no" aria-hidden="true">{{ str_pad($n, 2, '0', STR_PAD_LEFT) }}</span>
                                <span class="lc-acc__q">{{ $item['q'] }}</span>
                                <svg class="lc-ico lc-acc__chev" aria-hidden="true"><use href="#lc-i-chev-d"></use></svg>
                            </button>
                        </h3>
                        <div class="lc-acc__panel" id="lc-acc-p-{{ $n }}" role="region" aria-labelledby="lc-acc-b-{{ $n }}">
                            <div class="lc-acc__inner"><p>{{ $item['a'] }}</p></div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    @include($site['view'] . '.partials.cta-band')
@endsection
