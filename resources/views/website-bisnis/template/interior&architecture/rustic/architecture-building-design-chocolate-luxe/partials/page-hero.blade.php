{{-- Variabel: $key (kunci halaman). Data di config: pages.{key} --}}
<section class="abd-phero" data-phero>
    <div class="abd-phero__bg" aria-hidden="true"><img src="{{ $img($site['pages'][$key]['bg']) }}" alt="" width="2000" height="1400" decoding="async"></div>
    <div class="abd-phero__deco" aria-hidden="true">
        <svg viewBox="0 0 400 400"><circle cx="200" cy="200" r="190"/><circle cx="200" cy="200" r="140"/><circle cx="200" cy="200" r="90"/><path d="M200 10V390M10 200H390M66 66L334 334M334 66L66 334"/></svg>
    </div>
    <div class="abd-container abd-phero__in">
        <div class="abd-phero__main">
            <nav class="abd-crumb" aria-label="Jejak halaman">
                <a href="{{ $u() }}">Beranda</a><span aria-hidden="true">/</span><span aria-current="page">{{ $site['pages'][$key]['crumb'] }}</span>
            </nav>
            <div class="abd-phero__title">
                <span class="abd-phero__ico" aria-hidden="true"><svg class="i"><use href="#i-{{ $site['pages'][$key]['icon'] }}"/></svg></span>
                <h1>{{ $site['pages'][$key]['title'] }}</h1>
            </div>
            <p class="abd-phero__sub">{{ $site['pages'][$key]['sub'] }}</p>
            <ul class="abd-phero__stats">
                @foreach ($site['pages'][$key]['stats'] as $st)
                    <li style="--i:{{ $loop->iteration }}"><svg class="i" aria-hidden="true"><use href="#i-check-circle"/></svg>{{ $st }}</li>
                @endforeach
            </ul>
            <div class="abd-phero__cta">
                <a class="abd-btn abd-btn--gold abd-btn--sm" href="{{ $u($site['pages'][$key]['cta'][1]) }}"><span>{{ $site['pages'][$key]['cta'][0] }}</span><svg class="i" aria-hidden="true"><use href="#i-arrow"/></svg></a>
                <a class="abd-btn abd-btn--ghost-gold abd-btn--sm" href="{{ $u($site['pages'][$key]['cta2'][1]) }}"><span>{{ $site['pages'][$key]['cta2'][0] }}</span></a>
            </div>
        </div>
        <figure class="abd-phero__frame" aria-hidden="true">
            <i class="abd-phero__corner abd-phero__corner--tl"></i><i class="abd-phero__corner abd-phero__corner--tr"></i><i class="abd-phero__corner abd-phero__corner--bl"></i><i class="abd-phero__corner abd-phero__corner--br"></i>
            <img src="{{ $img($site['pages'][$key]['bg']) }}" alt="" width="2000" height="1400" decoding="async">
            <figcaption><svg class="i"><use href="#i-{{ $site['pages'][$key]['icon'] }}"/></svg>{{ $site['pages'][$key]['crumb'] }}</figcaption>
        </figure>
    </div>
    <svg class="abd-phero__edge" viewBox="0 0 1440 40" preserveAspectRatio="none" aria-hidden="true"><path d="M0 40V22Q180 0 360 16T720 22T1080 14T1440 24V40Z"/></svg>
</section>
