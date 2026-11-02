@extends($ns . '.layouts.app')

@section('title', 'Inquiry & Konsultasi — ' . $skin['name'])
@section('description', 'Kirim pertanyaan atau konsultasi produk GlowEra melalui WhatsApp.')

@section('content')
    @include($ns . '.partials.page-header', ['title' => 'Inquiry & Konsultasi', 'text' => $skin['inquiry']['text']])

    <section class="section section--pt0">
        <div class="container">
            <ul class="iq-perks iq-perks--row">
                @foreach ($skin['inquiry']['perks'] as $perk)
                    <li>
                        <span class="iq-perks__ic"><i class="bi {{ $perk['icon'] }}"></i></span>
                        <span><b>{{ $perk['title'] }}</b><small>{{ $perk['text'] }}</small></span>
                    </li>
                @endforeach
            </ul>

            <div class="iq-layout">
                <div class="panel" id="formulir">
                    <h2 class="panel__title">Formulir Inquiry &amp; Konsultasi</h2>
                    <p class="panel__sub">Formulir ini dikirim langsung ke WhatsApp admin {{ $skin['name'] }}.</p>
                    @include($ns . '.partials.inquiry-form', ['compact' => false, 'fid' => 'pg'])
                </div>

                <aside class="iq-side">
                    <div class="panel">
                        <h2 class="panel__title panel__title--sm">Cara Konsultasi</h2>
                        <ol class="steps steps--tight">
                            @foreach ($skin['inquiry']['steps'] as $i => $step)
                                <li><b>{{ $i + 1 }}</b><span>{{ $step }}</span></li>
                            @endforeach
                        </ol>
                    </div>
                    <div class="panel">
                        <h2 class="panel__title panel__title--sm">Kontak Kami</h2>
                        <ul class="contact-list">
                            <li><i class="bi bi-geo-alt-fill"></i><span>{{ $skin['contact']['address'] }}</span></li>
                            <li><i class="bi bi-telephone-fill"></i><span>{{ $skin['contact']['phone'] }}</span></li>
                            <li><i class="bi bi-envelope-fill"></i><span>{{ $skin['contact']['email'] }}</span></li>
                            <li><i class="bi bi-clock-fill"></i><span>Layanan {{ $skin['contact']['hours'] }}</span></li>
                        </ul>
                        <a class="btn btn--block" href="https://wa.me/{{ $skin['whatsapp'] }}" target="_blank" rel="noopener"><i class="bi bi-whatsapp"></i> Chat Langsung</a>
                    </div>
                </aside>
            </div>
        </div>
    </section>
@endsection
