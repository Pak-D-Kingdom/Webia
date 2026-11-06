@php
    $c    = config('template.company.elegan.company-profile-terracotta.company-profile');
    $v    = 'website-bisnis.template.company.elegan.company-profile-terracotta';
    $img  = fn ($f) => asset($c['img'] . $f);
    $ic   = fn ($n) => new \Illuminate\Support\HtmlString('<svg class="cp-ic" aria-hidden="true"><use href="#i-' . $n . '"/></svg>');
    $home = route('company-terracotta.home');
    // link anchor beranda ('h') atau halaman sendiri ('r'); dari halaman lain anchor diarahkan ke beranda
    $link = fn ($n) => isset($n['r']) ? route($n['r']) : ((request()->routeIs('company-terracotta.home') ? '' : $home) . $n['h']);
@endphp
@extends("$v.layouts.app")
@section('title', 'Tentang Kami — ' . $c['brand']['name'])

@section('content')
    @include("$v.partials.pagehead", ['crumb' => 'Tentang Kami', 'title' => $c['about']['title'], 'desc' => $c['about']['eyebrow']])

    <div class="cp-wrap cp-sec">
        @include("$v.sections.about")
    </div>

    <div class="cp-wrap cp-sec">
        <div class="cp-vm">
            <article class="cp-card">
                <span class="cp-ico">{{ $ic('rocket') }}</span>
                <h2>Visi</h2>
                <p>{{ $c['about']['vision'] }}</p>
            </article>
            <article class="cp-card">
                <span class="cp-ico">{{ $ic('check') }}</span>
                <h2>Misi</h2>
                <ul>
                    @foreach ($c['about']['mission'] as $m)
                        <li>{{ $ic('check') }}<span>{{ $m }}</span></li>
                    @endforeach
                </ul>
            </article>
        </div>
    </div>

    <div class="cp-wrap cp-sec">
        <h2 class="cp-h2 cp-h2--sm">{{ $c['about']['values_title'] }}</h2>
        <ul class="cp-values">
            @foreach ($c['highlights'] as $i)
                <li class="cp-card">
                    <span class="cp-ico">{{ $ic($i['i']) }}</span>
                    <strong>{{ $i['t'] }}</strong><small>{{ $i['d'] }}</small>
                </li>
            @endforeach
        </ul>
    </div>

    <div class="cp-wrap cp-sec cp-sec--last">
        @include("$v.sections.quotation")
    </div>
@endsection
