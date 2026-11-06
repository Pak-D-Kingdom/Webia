{{-- TOMBOL WHATSAPP MELAYANG: dirender di dalam <aside class="cp-ai"> agar menumpuk rapi di atas tombol AI --}}
<a class="cp-wa" href="{{ $waUrl }}" target="_blank" rel="noopener noreferrer" aria-label="{{ $whatsapp['label'] ?? 'Chat WhatsApp' }} (membuka tab baru)">
    <span class="cp-wa__label">{{ $whatsapp['label'] ?? 'Chat WhatsApp' }}</span>
    <span class="cp-wa__icon">{!! $icon('whatsapp') !!}</span>
</a>
