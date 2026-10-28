{{-- ===================== 5. DESKRIPSI & NARASI PROPERTI ===================== --}}
@php $t = $detailCfg['titles']['description']; @endphp
<section class="rea-panel" id="description" aria-labelledby="description-title">
    <header class="rea-panel__head">
        <div>
            <p class="rea-eyebrow rea-eyebrow--dark">THE STORY</p>
            <h2 id="description-title">{{ $t['title'] }}</h2>
            <p>{{ $t['text'] }}</p>
        </div>
    </header>

    <div class="rea-story">
        @foreach ($property['description'] as $i => $para)
            <p class="{{ $i === 0 ? 'rea-story__lead' : '' }}">{{ $para }}</p>
        @endforeach
    </div>

    <ul class="rea-story__points">
        @foreach ($property['story_points'] as $point)
            <li>{{ $icon('check') }}<span>{{ $point }}</span></li>
        @endforeach
    </ul>
</section>
