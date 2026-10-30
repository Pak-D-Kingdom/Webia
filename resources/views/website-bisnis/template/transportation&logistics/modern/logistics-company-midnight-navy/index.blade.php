@extends($site['view'] . '.layouts.app')

@section('title', $site['brand']['name'] . ' — ' . $site['brand']['tagline'])
@section('page', 'home')

@section('content')
    @include($site['view'] . '.sections.hero')

    {{-- Preview: Layanan Logistik --}}
    <section class="lc-band lc-band--light lc-band--services" aria-labelledby="lc-services-title">
        <div class="lc-wrap">
            @include($site['view'] . '.sections.services', ['full' => false])
        </div>
    </section>

    {{-- Preview: Freight · Jangkauan · Armada & Gudang --}}
    <section class="lc-band lc-band--dark lc-band--triple" aria-label="Freight, jangkauan, armada dan gudang">
        <div class="lc-wrap lc-triple">
            @include($site['view'] . '.sections.freight', ['full' => false])
            @include($site['view'] . '.sections.coverage', ['full' => false])
            @include($site['view'] . '.sections.fleet', ['full' => false])
        </div>
    </section>

    {{-- Preview: Proses · Tracking · Klien · Penawaran --}}
    <section class="lc-band lc-band--mist lc-band--quad" aria-label="Proses pengiriman, tracking, klien, dan penawaran">
        <div class="lc-wrap lc-quad">
            @include($site['view'] . '.sections.process', ['full' => false])
            @include($site['view'] . '.sections.tracking', ['full' => false])
            @include($site['view'] . '.sections.clients', ['full' => false])
            @include($site['view'] . '.sections.quotation', ['full' => false])
        </div>
    </section>

    {{-- Preview: AI Assistant --}}
    <section class="lc-band lc-band--ai" aria-label="AI Assistant">
        <div class="lc-wrap">
            @include($site['view'] . '.sections.ai-assistant')
        </div>
    </section>
@endsection
