@extends('website-bisnis.template.travel&tourism.classic.umrah-haji-emerald-green.layouts.app')


@section('title', 'Persyaratan Pendaftaran — Nur Rahmat Travel')
@section('description', 'Dokumen dan langkah pendaftaran umrah dan haji bersama Nur Rahmat Travel.')

@section('content')
    @include('website-bisnis.template.travel&tourism.classic.umrah-haji-emerald-green.partials.page-hero', ['key' => 'requirements'])

    <section class="uh-section">
        <div class="uh-container uh-split uh-split--even">
            <section class="uh-card uh-reqcard" data-uh-checklist aria-labelledby="uh-req-title">
                <header class="uh-reqcard__head">
                    <h2 id="uh-req-title" class="uh-card__title">Daftar dokumen</h2>
                    <p class="uh-card__sub">Centang dokumen yang sudah Anda siapkan.</p>
                </header>
                <div class="uh-progress" role="progressbar" aria-label="Kesiapan dokumen" aria-valuemin="0" aria-valuemax="{{ count($uh['requirements']['items']) }}" aria-valuenow="0" data-uh-progress>
                    <span class="uh-progress__bar" data-uh-progress-bar></span>
                </div>
                <p class="uh-progress__text"><span data-uh-progress-count>0</span> dari {{ count($uh['requirements']['items']) }} dokumen siap</p>
                <ul class="uh-reqlist">
                    @foreach ($uh['requirements']['items'] as $r)
                        <li>
                            <label class="uh-req">
                                <input type="checkbox" class="uh-req__input" data-uh-check>
                                <span class="uh-req__box" aria-hidden="true"><svg class="uh-i"><use href="#i-check"/></svg></span>
                                <span class="uh-req__text">
                                    <strong>{{ $r['label'] }}</strong>
                                    <small>{{ $r['note'] }}</small>
                                </span>
                            </label>
                        </li>
                    @endforeach
                </ul>
            </section>

            <aside class="uh-card uh-steps" aria-labelledby="uh-steps-title">
                <h2 id="uh-steps-title" class="uh-card__title">Langkah pendaftaran</h2>
                <ol class="uh-steps__list">
                    @foreach ($uh['requirements']['steps'] as $i => $s)
                        <li>
                            <span class="uh-steps__n">{{ $i + 1 }}</span>
                            <div>
                                <h3>{{ $s['title'] }}</h3>
                                <p>{{ $s['text'] }}</p>
                            </div>
                        </li>
                    @endforeach
                </ol>
                <a class="uh-btn uh-btn--gold uh-btn--block" href="{{ $wa($uh['requirements']['wa_register']) }}" target="_blank" rel="noopener noreferrer">
                    <svg class="uh-i" aria-hidden="true"><use href="#i-whatsapp"/></svg>
                    <span>Daftar via WhatsApp</span>
                </a>
            </aside>
        </div>
    </section>
@endsection
