@php
    $cfg ??= config('template.retail.organic.skincare-sage-green.skincare');
@endphp
<div class="topbar" role="region" aria-label="Informasi toko">
    <div class="container topbar__inner">
        <ul class="topbar__list">
            @foreach($cfg['topbar'] as $item)
                <li>
                    <svg class="ico" aria-hidden="true"><use href="#i-{{ $item['icon'] }}"/></svg>
                    <span>{{ $item['text'] }}</span>
                </li>
            @endforeach
        </ul>
        <ul class="topbar__social" aria-label="Media sosial">
            @foreach($cfg['socials'] as $s)
                <li>
                    <a href="{{ $s['url'] }}" target="_blank" rel="noopener noreferrer" aria-label="{{ $s['label'] }}">
                        <svg class="ico" aria-hidden="true"><use href="#i-{{ $s['icon'] }}"/></svg>
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
</div>
