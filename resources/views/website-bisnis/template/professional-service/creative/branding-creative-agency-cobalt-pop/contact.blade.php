@php($site = config('template.professional-service.creative.branding-creative-agency-cobalt-pop.branding-creative-agency'))
@php($current = 'contact')
@extends('website-bisnis.template.professional-service.creative.branding-creative-agency-cobalt-pop.layouts.app')

@section('title', 'Contact Us')

@section('content')
    @include('website-bisnis.template.professional-service.creative.branding-creative-agency-cobalt-pop.partials.page-header', ['tone' => 'yellow', 'crumb' => 'Contact Us', 'title' => 'Mari mulai dengan obrolan.', 'lead' => 'Ceritakan proyek Anda lewat formulir, WhatsApp, atau email. Konsultasi awal tidak dipungut biaya.'])

    <section class="bca-section bca-tone-paper" aria-labelledby="bca-cn-h">
        <div class="bca-wrap bca-split" style="align-items:start">
            <div class="bca-stack-p">
                <h2 class="bca-h2" id="bca-cn-h">Hubungi studio.</h2>
                <div class="bca-cinfo">
                    <article>@include('website-bisnis.template.professional-service.creative.branding-creative-agency-cobalt-pop.partials.icon', ['name' => 'mail'])<h3>Email</h3><a href="mailto:{{ $site['contact']['email'] }}">{{ $site['contact']['email'] }}</a></article>
                    <article>@include('website-bisnis.template.professional-service.creative.branding-creative-agency-cobalt-pop.partials.icon', ['name' => 'phone'])<h3>Telepon &amp; WhatsApp</h3><a href="{{ $site['contact']['phone_href'] }}">{{ $site['contact']['phone'] }}</a></article>
                    <article>@include('website-bisnis.template.professional-service.creative.branding-creative-agency-cobalt-pop.partials.icon', ['name' => 'pin'])<h3>Alamat studio</h3><p>{{ $site['contact']['address'] }}</p></article>
                    <article>@include('website-bisnis.template.professional-service.creative.branding-creative-agency-cobalt-pop.partials.icon', ['name' => 'clock'])<h3>Jam operasional</h3><p>{{ $site['contact']['hours'] }}</p></article>
                </div>
                <div class="bca-actions">
                    <a class="bca-btn bca-btn--cobalt" href="https://wa.me/{{ $site['whatsapp']['number'] }}?text={{ rawurlencode($site['whatsapp']['message']) }}" target="_blank" rel="noopener noreferrer">Chat via WhatsApp @include('website-bisnis.template.professional-service.creative.branding-creative-agency-cobalt-pop.partials.icon', ['name' => 'whatsapp'])</a>
                </div>
                <div>
                    <h3 class="bca-h3" style="margin-bottom:12px">Media sosial</h3>
                    <ul class="bca-social" style="--x:0">
                        @foreach($site['social'] as $s)
                            <li><a href="{{ $s['url'] }}" target="_blank" rel="noopener noreferrer" aria-label="{{ $s['label'] }}" style="border-color:var(--bca-ink)">@include('website-bisnis.template.professional-service.creative.branding-creative-agency-cobalt-pop.partials.icon', ['name' => $s['icon']])</a></li>
                        @endforeach
                    </ul>
                </div>
                <div>
                    <h3 class="bca-h3" style="margin-bottom:14px">Setelah Anda mengirim</h3>
                    <ol class="bca-next-steps">
                        <li><span>Kami membaca brief dan membalas dalam satu hari kerja.</span></li>
                        <li><span>Kita jadwalkan konsultasi 30 menit lewat video atau tatap muka.</span></li>
                        <li><span>Anda menerima proposal tertulis dengan ruang lingkup dan estimasi biaya.</span></li>
                    </ol>
                </div>
            </div>
            @include('website-bisnis.template.professional-service.creative.branding-creative-agency-cobalt-pop.partials.contact-form', ['fid' => 'bca-contact'])
        </div>
    </section>
@endsection
