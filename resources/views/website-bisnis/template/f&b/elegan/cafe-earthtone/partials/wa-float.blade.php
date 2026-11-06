{{-- Tombol WhatsApp bulat (melayang). Pesan awal & label diatur di cafe.php → contact.chat_message, whatsapp.label --}}
<a class="lm-wa-float" href="{{ $wa($cafe['contact']['chat_message']) }}" target="_blank" rel="noopener" aria-label="{{ $cafe['whatsapp']['label'] }}">
    <svg class="i" aria-hidden="true"><use href="#i-wa-fill"/></svg>
    <span class="lm-wa-float__tip" aria-hidden="true">{{ $cafe['whatsapp']['label'] }}</span>
</a>
