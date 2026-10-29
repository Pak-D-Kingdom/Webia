{{-- CUSTOM DESIGN OPTIONS --}}
@php $preview = $preview ?? false; $d = $cfg['custom_design']; @endphp

@if ($preview)
    <article class="fm-pv fm-pv--custom fm-card" data-fm-reveal>
        <div class="fm-pv__lead">
            <p class="fm-eyebrow">{{ $d['eyebrow'] }}</p>
            <h2 class="fm-h3">{{ $d['title'] }}</h2>
            <p class="fm-pv__text">{{ $d['text'] }}</p>
            <a class="fm-btn fm-btn--dark fm-btn--sm" href="{{ $route('custom-design') }}">{{ $d['cta'] }}
                <svg class="fm-i" aria-hidden="true"><use href="#i-arrow"/></svg></a>
        </div>
        <img class="fm-pv__art fm-pv__art--custom" src="{{ $img($d['image']) }}" alt="Sketsa kursi custom dengan palet warna" loading="lazy" decoding="async">
    </article>
@else
    <section class="fm-section" data-fm-config>
        <div class="fm-container fm-config">
            <div class="fm-config__stage fm-card">
                <div class="fm-config__photo">
                    <img data-fm-cfg-img src="{{ $img($cfg['catalog']['items'][0]['image']) }}" alt="Pratinjau furniture pilihan Anda" decoding="async">
                </div>
                <dl class="fm-config__sum" aria-live="polite">
                    <div><dt>Jenis</dt><dd data-fm-cfg-o="type">–</dd></div>
                    <div><dt>Gaya</dt><dd data-fm-cfg-o="style">–</dd></div>
                    <div><dt>Warna</dt><dd><i class="fm-dotc" data-fm-cfg-dot></i><span data-fm-cfg-o="color">–</span></dd></div>
                    <div><dt>Material</dt><dd><i class="fm-dotc" data-fm-cfg-wood></i><span data-fm-cfg-o="material">–</span></dd></div>
                    <div><dt>Ukuran</dt><dd data-fm-cfg-o="size">–</dd></div>
                </dl>
            </div>

            <form class="fm-config__panel" data-fm-cfg-form onsubmit="return false">
                <fieldset class="fm-fieldset">
                    <legend><span>1</span> Jenis furniture</legend>
                    <div class="fm-chips">
                        @foreach ($cfg['catalog']['items'] as $i => $it)
                            <label class="fm-chip fm-chip--radio"><input type="radio" name="type" value="{{ $it['slug'] }}" data-label="{{ $it['name'] }}" @checked($i === 0)><span>{{ $it['name'] }}</span></label>
                        @endforeach
                    </div>
                </fieldset>
                <fieldset class="fm-fieldset">
                    <legend><span>2</span> Gaya</legend>
                    <div class="fm-chips">
                        @foreach ($cfg['catalog']['styles'] as $i => $st)
                            <label class="fm-chip fm-chip--radio"><input type="radio" name="style" value="{{ $st }}" data-label="{{ $st }}" @checked($i === 0)><span>{{ $st }}</span></label>
                        @endforeach
                    </div>
                </fieldset>
                <fieldset class="fm-fieldset">
                    <legend><span>3</span> Warna</legend>
                    <div class="fm-swatches">
                        @foreach ($d['colors'] as $i => $co)
                            <label class="fm-swatch" title="{{ $co['name'] }}">
                                <input type="radio" name="color" value="{{ $co['name'] }}" data-hex="{{ $co['hex'] }}" data-label="{{ $co['name'] }}" @checked($i === 1)>
                                <span style="--sw: {{ $co['hex'] }}"></span><em>{{ $co['name'] }}</em>
                            </label>
                        @endforeach
                    </div>
                </fieldset>
                <fieldset class="fm-fieldset">
                    <legend><span>4</span> Material rangka</legend>
                    <div class="fm-chips">
                        @foreach ($cfg['materials']['items'] as $i => $m)
                            <label class="fm-chip fm-chip--radio"><input type="radio" name="material" value="{{ $m['name'] }}" data-hex="{{ $m['tone'][0] }}" data-label="{{ $m['name'] }}" @checked($i === 0)><span>{{ $m['name'] }}</span></label>
                        @endforeach
                    </div>
                </fieldset>
                <fieldset class="fm-fieldset">
                    <legend><span>5</span> Ukuran</legend>
                    <div class="fm-chips">
                        @foreach ($d['sizes'] as $i => $sz)
                            <label class="fm-chip fm-chip--radio" title="{{ $sz['hint'] }}"><input type="radio" name="size" value="{{ $sz['key'] }}" data-label="{{ $sz['label'] }}" @checked($i === 1)><span>{{ $sz['label'] }}</span></label>
                        @endforeach
                    </div>
                    <div class="fm-sizeinputs" data-fm-cfg-custom hidden>
                        <label>Panjang (cm)<input type="number" name="w" min="20" max="600" inputmode="numeric"></label>
                        <label>Lebar (cm)<input type="number" name="d" min="20" max="400" inputmode="numeric"></label>
                        <label>Tinggi (cm)<input type="number" name="h" min="20" max="400" inputmode="numeric"></label>
                    </div>
                </fieldset>
                <a class="fm-btn fm-btn--dark fm-btn--lg" data-fm-cfg-go href="{{ $route('custom-order') }}">Lanjut ke Custom Order Form
                    <svg class="fm-i" aria-hidden="true"><use href="#i-arrow"/></svg></a>
            </form>
        </div>
    </section>

    <section class="fm-section fm-section--tint">
        <div class="fm-container">
            <header class="fm-sechead"><p class="fm-eyebrow">ALUR CUSTOM DESIGN</p><h2 class="fm-h2">Empat langkah menuju furniture impian</h2></header>
            <ol class="fm-steps">
                @foreach ($d['steps'] as $i => $st)
                    <li class="fm-card fm-step" data-fm-reveal><span class="fm-step__n">{{ $i + 1 }}</span><h3>{{ $st[0] }}</h3><p>{{ $st[1] }}</p></li>
                @endforeach
            </ol>
        </div>
    </section>
    @include($ns.'.partials.cta-band')
@endif
