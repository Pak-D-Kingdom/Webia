@extends('website-bisnis.template.interior&architecture.rustic.architecture-building-design-chocolate-luxe.layouts.app')
@section('title', 'Permintaan Penawaran — ArchiDesign')
@section('active', 'penawaran')
@section('content')
@php
    $site = config('template.interior&architecture.rustic.architecture-building-design-chocolate-luxe.architecture-building-design')
        ?: require config_path('template/interior&architecture/rustic/architecture-building-design-chocolate-luxe/architecture-building-design.php');
    $u   = fn (string $p = '') => url($site['base'] . $p);
    $img = fn (string $f) => asset($site['img'] . '/' . $f);
    $v   = $site['view'];
@endphp
@include($v . '.partials.page-hero', ['title' => 'Permintaan Penawaran', 'sub' => 'Dapatkan penawaran terbaik untuk proyek Anda.', 'bg' => 'blueprint-desk.jpg', 'icon' => 'doc', 'crumb' => 'Penawaran'])

<section class="abd-section">
    <div class="abd-container abd-split">
        @include($v . '.partials.form', ['kind' => 'penawaran'])

        <aside class="abd-side" data-reveal>
            <div class="abd-side__img"><img src="{{ $img('blueprint-desk.jpg') }}" alt="" loading="lazy" width="2000" height="840"></div>
            <h3>Setelah Anda mengirim</h3>
            <ol class="abd-mini-steps">
                <li>Tim kami meninjau detail proyek Anda.</li>
                <li>Kami menghubungi Anda untuk klarifikasi singkat.</li>
                <li>Penawaran tertulis dikirim ke email atau WhatsApp Anda.</li>
            </ol>
            <p class="abd-side__row"><svg class="i" aria-hidden="true"><use href="#i-mail"/></svg>{{ $site['contact']['email'] }}</p>
        </aside>
    </div>
</section>
@endsection
