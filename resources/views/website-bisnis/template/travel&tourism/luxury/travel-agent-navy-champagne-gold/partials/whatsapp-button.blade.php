{{-- Floating WhatsApp: pill navy dengan cincin emas + ikon hijau --}}
<a class="ga-wa"
   href="https://wa.me/{{ $brand['whatsapp'] }}?text={{ rawurlencode('Halo GrandJourney, saya ingin bertanya tentang paket tour.') }}"
   target="_blank" rel="noopener noreferrer" aria-label="Chat WhatsApp {{ $brand['name'] }}">
    <span class="ga-wa__ico">
        <span class="ga-wa__pulse" aria-hidden="true"></span>
        {!! $icon('whatsapp') !!}
    </span>
    <span class="ga-wa__label">WhatsApp</span>
</a>
