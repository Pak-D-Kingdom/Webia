{{-- Logo Renovaku. Parameter opsional: $light = true untuk versi footer (latar gelap). --}}
@php $light = $light ?? false; @endphp
<svg class="hr-logo__mark" viewBox="0 0 64 60" role="img" aria-label="Logo Renovaku">
    <rect x="40" y="6" width="7" height="13" rx="1.5" fill="{{ $light ? '#d5e3ca' : '#a8703f' }}"/>
    <path d="M9 31 32 9l23 22" fill="none" stroke="{{ $light ? '#ffffff' : '#355a33' }}" stroke-width="6" stroke-linecap="round" stroke-linejoin="round"/>
    <path d="M13 30 32 13l19 17v21H13z" fill="{{ $light ? '#ffffff' : '#9cba8a' }}"/>
    <rect x="26" y="34" width="12" height="17" rx="2" fill="{{ $light ? '#243622' : '#355a33' }}"/>
    <path d="M32 37v8M28.5 41h7" stroke="#fff" stroke-width="2" stroke-linecap="round"/>
    <path d="M44 56c0-9 6-14 15-14 0 9-5 14-15 14z" fill="#7fa24a"/>
    <path d="M45 55c3-5 7-8 12-10" stroke="#fff" stroke-opacity=".6" stroke-width="1.4" fill="none" stroke-linecap="round"/>
</svg>
