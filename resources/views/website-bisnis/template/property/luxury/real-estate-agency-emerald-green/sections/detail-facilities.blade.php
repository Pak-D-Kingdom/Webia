{{-- ===================== 4. FASILITAS & AMENITAS ===================== --}}
@php $t = $detailCfg['titles']['facilities']; @endphp
<section class="rea-panel" id="facilities" aria-labelledby="facilities-title">
    <header class="rea-panel__head">
        <div>
            <p class="rea-eyebrow rea-eyebrow--dark">AMENITIES</p>
            <h2 id="facilities-title">{{ $t['title'] }}</h2>
            <p>{{ $t['text'] }}</p>
        </div>
    </header>

    <div class="rea-facgroups">
        @foreach ($detailCfg['facility_groups'] as $group)
            <div class="rea-facgroup">
                <h3><span>{{ $icon($group['icon']) }}</span>{{ $group['title'] }}</h3>
                <ul>
                    @foreach ($property['facilities'] as $fac)
                        @if ($fac['group'] === $group['key'])
                            <li>{{ $icon($fac['icon']) }}<span>{{ $fac['label'] }}</span></li>
                        @endif
                    @endforeach
                </ul>
            </div>
        @endforeach
    </div>
</section>
