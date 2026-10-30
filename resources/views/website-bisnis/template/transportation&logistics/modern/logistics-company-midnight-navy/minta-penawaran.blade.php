@extends($site['view'] . '.layouts.app')

@section('title', 'Minta Penawaran — ' . $site['brand']['name'])
@section('page', 'quotation')

@section('content')
    @php $c = $site['contact']; @endphp
    @include($site['view'] . '.partials.page-header', ['title' => 'Minta Penawaran', 'subtitle' => $site['quotation']['subtitle']])

    <section class="lc-band lc-band--mist lc-page-sec">
        <div class="lc-wrap lc-quotepage">
            <div class="lc-quotepage__form">
                @include($site['view'] . '.sections.quotation', ['full' => true])
            </div>
            <aside class="lc-quotepage__side" aria-label="Kontak">
                <h2>Butuh bantuan langsung?</h2>
                <p>Tim kami siap membantu menyusun penawaran yang sesuai dengan kebutuhan pengiriman Anda.</p>
                <ul class="lc-footer__contact lc-footer__contact--card">
                    <li><svg class="lc-ico" aria-hidden="true"><use href="#lc-i-phone"></use></svg><a href="tel:{{ $c['phone_href'] }}">{{ $c['phone'] }}</a></li>
                    <li><svg class="lc-ico" aria-hidden="true"><use href="#lc-i-mail"></use></svg><a href="mailto:{{ $c['email'] }}">{{ $c['email'] }}</a></li>
                    <li><svg class="lc-ico" aria-hidden="true"><use href="#lc-i-clock"></use></svg><span>{{ $c['hours'] }}</span></li>
                    <li><svg class="lc-ico" aria-hidden="true"><use href="#lc-i-pin"></use></svg><span>{{ $c['address'] }}</span></li>
                </ul>
            </aside>
        </div>
    </section>
@endsection
