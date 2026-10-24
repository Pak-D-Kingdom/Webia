@php
    $ns  = 'website-bisnis.template.e-learning.modern.e-learning-ocean-blue';
    $e   = config('template.e-learning.modern.e-learning-ocean-blue.e-learning');
    $img = fn ($f) => asset($e['assets']['img'].$f);
@endphp
@extends($ns.'.layouts.app')

@section('title', 'E-learna — Learn Anytime, Anywhere')
@section('page', 'home')

@section('content')
    @include($ns.'.sections.hero')
    @include($ns.'.sections.programs', ['mode' => 'preview'])

    <section class="el-section el-section--tight el-trio-wrap" aria-label="Jadwal, pengajar, dan paket">
        <div class="el-container el-trio">
            @include($ns.'.sections.schedules', ['mode' => 'preview'])
            @include($ns.'.sections.teachers',  ['mode' => 'preview'])
            @include($ns.'.sections.pricing',   ['mode' => 'preview'])
        </div>
    </section>

    @include($ns.'.sections.course-content', ['mode' => 'preview'])
    @include($ns.'.sections.member-area',    ['mode' => 'preview'])
    @include($ns.'.sections.registration',   ['mode' => 'preview'])
@endsection
