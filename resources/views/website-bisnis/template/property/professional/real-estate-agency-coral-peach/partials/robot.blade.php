{{-- Maskot AI "Coco" — SVG beranimasi (melayang, berkedip, antena menyala, melambai). Gradient ada di partials/icons. --}}
<svg class="robot {{ $class ?? '' }}" viewBox="0 0 120 134" role="img" aria-label="Maskot AI Assistant Coral Homes" focusable="false">
  <ellipse class="rb-shadow" cx="60" cy="128" rx="26" ry="4" fill="#E8654A" opacity=".2"/>
  <g class="rb-float">
    <path d="M60 22V12" stroke="#E8654A" stroke-width="3" stroke-linecap="round"/>
    <circle class="rb-bulb" cx="60" cy="9" r="5" fill="url(#rbCoral)"/>
    <rect x="13" y="38" width="11" height="24" rx="5.5" fill="url(#rbCoral)"/>
    <rect x="96" y="38" width="11" height="24" rx="5.5" fill="url(#rbCoral)"/>
    <rect x="21" y="20" width="78" height="60" rx="27" fill="url(#rbBody)" stroke="#F3D3C4" stroke-width="1.5"/>
    <rect x="30" y="30" width="60" height="40" rx="18" fill="#1E2A33"/>
    <g class="rb-eyes">
      <ellipse cx="47" cy="49" rx="6.5" ry="8.5" fill="#FF9B6B"/>
      <ellipse cx="73" cy="49" rx="6.5" ry="8.5" fill="#FF9B6B"/>
    </g>
    <path d="M54 61q6 4.5 12 0" stroke="#FF9B6B" stroke-width="2.4" fill="none" stroke-linecap="round"/>
    <path d="M36 86h48a8 8 0 0 1 8 8v12a15 15 0 0 1-15 15H43a15 15 0 0 1-15-15V94a8 8 0 0 1 8-8z" fill="url(#rbBody)" stroke="#F3D3C4" stroke-width="1.5"/>
    <circle cx="60" cy="102" r="8" fill="url(#rbCoral)"/>
    <path d="M55.5 103.5 60 99l4.5 4.5M56.8 103v3.2h6.4V103" stroke="#fff" stroke-width="1.6" fill="none" stroke-linecap="round" stroke-linejoin="round"/>
    <g class="rb-arm-l"><rect x="14" y="88" width="13" height="22" rx="6.5" fill="url(#rbBody)" stroke="#F3D3C4" stroke-width="1.5"/></g>
    <g class="rb-arm-r"><rect x="93" y="88" width="13" height="22" rx="6.5" fill="url(#rbBody)" stroke="#F3D3C4" stroke-width="1.5"/></g>
  </g>
</svg>
