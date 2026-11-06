@extends($v.'.layouts.app')

@section('title', 'Program Kami - '.$f['brand']['name'].' '.$f['brand']['suffix'])
@section('body_class', 'page-inner page-programs')

@section('content')
    @include($v.'.partials.page-header', ['crumb' => 'Program Kami', 'title' => 'Program Kami', 'lead' => $f['programs']['subtitle']])

    <div class="hf-container hf-page">
        <div class="hf-programlist">
            @foreach($f['programs']['items'] as $p)
                <article class="hf-card hf-card--pad hf-program" id="{{ $p['key'] }}" data-reveal>
                    <div class="hf-program__icon"><svg class="hf-art hf-art--xl" viewBox="0 0 64 64" aria-hidden="true"><use href="#{{ $p['icon'] }}"/></svg></div>
                    <div class="hf-program__body">
                        <h2 class="hf-h2">{{ $p['title'] }}</h2>
                        <p>{{ $p['text'] }}</p>
                        <ul class="hf-checklist">
                            @foreach($p['points'] as $pt)
                                <li><svg class="hf-i" aria-hidden="true"><use href="#i-check"/></svg>{{ $pt }}</li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="hf-program__side">
                        <strong class="hf-program__stat">{{ $p['stat_value'] }}</strong>
                        <span>{{ $p['stat_label'] }}</span>
                        <a class="hf-btn hf-btn--dark hf-btn--sm" href="{{ route($rp.'donation') }}#program">Dukung Program <svg class="hf-i" aria-hidden="true"><use href="#i-arrow"/></svg></a>
                    </div>
                </article>
            @endforeach
        </div>

        <section class="hf-cta" data-reveal>
            <div>
                <h2 class="hf-h2">Ingin tahu program mana yang paling butuh dukungan?</h2>
                <p>Tanyakan pada HopeBot atau hubungi tim kami lewat WhatsApp.</p>
            </div>
            <div class="hf-cta__actions">
                <a class="hf-btn hf-btn--dark" href="{{ route($rp.'chatbot') }}">Tanya HopeBot <svg class="hf-i" aria-hidden="true"><use href="#i-arrow"/></svg></a>
            </div>
        </section>
    </div>
@endsection
