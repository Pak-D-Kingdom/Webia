@php $p = $z['portfolio']; @endphp
<section class="ot-section ot-portfolio" id="portofolio" aria-labelledby="ot-portfolio-title">
    <div class="ot-container">
        <header class="ot-section__head">
            <h2 id="ot-portfolio-title">{{ $p['title'] }}</h2>
            <p>{{ $p['subtitle'] }}</p>
        </header>

        <div class="ot-filters" role="group" aria-label="Filter portofolio" data-filters>
            <button type="button" class="is-active" data-filter="all" aria-pressed="true">Semua</button>
            @foreach ($p['categories'] as $key => $label)
                <button type="button" data-filter="{{ $key }}" aria-pressed="false">{{ $label }}</button>
            @endforeach
        </div>

        <ul class="ot-portfolio__grid" data-filter-list>
            @foreach ($p['items'] as $i)
                <li class="ot-work" data-category="{{ $i['type'] }}">
                    <img src="{{ $img($i['image']) }}" alt="{{ $i['title'] }} - {{ $i['category'] }}" loading="lazy" width="400" height="256">
                    <div class="ot-work__body">
                        <span class="ot-work__tag">{{ $p['categories'][$i['type']] ?? '' }}</span>
                        <h3>{{ $i['title'] }}</h3>
                        <p>{{ $i['category'] }}</p>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
</section>
