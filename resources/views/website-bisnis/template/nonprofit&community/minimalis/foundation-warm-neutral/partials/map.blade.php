<div class="hf-map" role="img" aria-label="Peta sebaran program HopeTogether di Indonesia">
    <svg class="hf-map__svg" viewBox="0 0 600 240" preserveAspectRatio="xMidYMid meet" aria-hidden="true">
        <g fill="currentColor">
            <path d="M18 20 40 12 72 36 112 68 152 110 174 140 150 150 110 120 70 94 38 62z"/>
            <path d="M178 160 230 150 290 158 332 168 300 177 240 171 190 173z"/>
            <path d="M215 42 255 22 300 30 330 52 338 92 318 124 280 134 245 120 222 86z"/>
            <path d="M372 50 394 40 402 62 388 80 414 96 402 108 380 94 386 124 374 142 360 110 366 82z"/>
            <path d="M346 178 376 172 402 178 374 184z"/>
            <path d="M412 176 440 172 462 178 436 184z"/>
            <path d="M440 82 456 72 468 84 454 96z"/>
            <path d="M452 120 472 114 480 128 460 136z"/>
            <path d="M474 82 522 66 572 78 600 100 584 132 540 126 506 150 490 126 472 108z"/>
        </g>
    </svg>
    @foreach($f['impact']['pins'] as $pin)
        <span class="hf-pin" style="left: {{ $pin['x'] }}%; top: {{ $pin['y'] }}%; animation-delay: {{ $loop->index * 0.35 }}s">
            <svg viewBox="0 0 24 32" aria-hidden="true"><use href="#ic-pin"/></svg>
            <em>{{ $pin['label'] }}</em>
        </span>
    @endforeach
</div>
