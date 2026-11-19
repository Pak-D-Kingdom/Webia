@extends('website-bisnis.template.home-services.organic.home-renovation-repair-sage-green.layouts.app')
@php
    $cfg = config('template.home-services.organic.home-renovation-repair-sage-green.home-renovation-repair')
        ?: require base_path('config/template/home-services/organic/home-renovation-repair-sage-green/home-renovation-repair.php');
    $vp  = 'website-bisnis.template.home-services.organic.home-renovation-repair-sage-green.partials.';
    $img = fn (string $file) => asset($cfg['paths']['images'].'/'.$file);
    $go  = fn (string $name) => route($cfg['route_prefix'].$name);
    $i   = fn (string $name, string $class = '') => new \Illuminate\Support\HtmlString('<svg class="hr-ico '.$class.'" aria-hidden="true" focusable="false"><use href="#i-'.$name.'"></use></svg>');
@endphp

@section('title', 'Proses Kerja Kami — Renovaku')
@section('meta_description', 'Lima tahap proses kerja Renovaku: konsultasi, survei, penawaran, pelaksanaan, dan serah terima.')

@section('content')
@include($vp.'page-hero', [
    'title' => 'Proses Kerja Kami',
    'desc'  => 'Proses mudah, transparan, dan profesional. Anda tahu apa yang terjadi di setiap tahap, dari pertama berkonsultasi sampai kunci rumah kembali ke tangan Anda.',
    'image' => 'survey-tape.jpg',
    'alt'   => 'Meteran dan denah rumah saat survei lokasi',
    'cta'   => ['Mulai Konsultasi', 'permintaan-penawaran'],
])

<section class="hr-section" id="tahapan">
    <div class="hr-container">
        <header class="hr-sechead">
            <p class="hr-kicker">{{ $i('gear') }} Alur kerja</p>
            <h2>Lima tahap dari ide sampai serah terima</h2>
        </header>
        <ol class="hr-timeline" data-timeline>
            <span class="hr-timeline__fill" data-timeline-fill aria-hidden="true"></span>
            @foreach ($cfg['steps'] as $s)
                <li class="hr-timeline__item" id="tahap-{{ $loop->iteration }}" data-reveal data-timeline-item>
                    <span class="hr-timeline__no">{{ $loop->iteration }}</span>
                    <div class="hr-timeline__card">
                        <span class="hr-step__ico">{{ $i($s['icon']) }}</span>
                        <div class="hr-timeline__txt">
                            <div class="hr-timeline__row"><h3>{{ $s['title'] }}</h3><span class="hr-chip">{{ $i('clock') }}{{ $s['duration'] }}</span></div>
                            <p>{{ $s['text'] }}</p>
                            <ul class="hr-tags hr-tags--check">
                                @foreach ($s['detail'] as $d)<li>{{ $i('check') }}{{ $d }}</li>@endforeach
                            </ul>
                        </div>
                    </div>
                </li>
            @endforeach
        </ol>
    </div>
</section>

<section class="hr-section hr-section--tint">
    <div class="hr-container">
        <div class="hr-promise">
            <article data-reveal><span>{{ $i('shield') }}</span><h3>Biaya transparan</h3><p>Rincian biaya tertulis sebelum pekerjaan dimulai, tanpa kejutan di tengah jalan.</p></article>
            <article data-reveal><span>{{ $i('clock') }}</span><h3>Jadwal jelas</h3><p>Target selesai disepakati di awal dan progres dilaporkan secara berkala.</p></article>
            <article data-reveal><span>{{ $i('check-circle') }}</span><h3>Bergaransi</h3><p>Paket Premium dan Exclusive dilengkapi garansi pekerjaan 1–2 tahun.</p></article>
        </div>
    </div>
</section>
@endsection
