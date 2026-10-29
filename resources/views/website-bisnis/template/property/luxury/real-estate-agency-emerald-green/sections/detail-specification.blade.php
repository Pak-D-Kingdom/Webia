{{-- ===================== 3. SPESIFIKASI TEKNIS ===================== --}}
@php $t = $detailCfg['titles']['specification']; @endphp
<section class="rea-panel" id="specification" aria-labelledby="specification-title">
    <header class="rea-panel__head">
        <div>
            <p class="rea-eyebrow rea-eyebrow--dark">PROPERTY DETAILS</p>
            <h2 id="specification-title">{{ $t['title'] }}</h2>
            <p>{{ $t['text'] }}</p>
        </div>
    </header>
    <dl class="rea-specs">
        @foreach ($property['specs'] as $spec)
            <div class="rea-specs__row">
                <dt>{{ $icon($spec['icon']) }}<span>{{ $spec['label'] }}</span></dt>
                <dd>{{ $spec['value'] }}</dd>
            </div>
        @endforeach
    </dl>
</section>
