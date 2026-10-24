{{-- Floating WhatsApp: tombol bundar gradient coral + ripple, label muncul saat hover/fokus. --}}
@php $c = $site['contact']; @endphp
<a class="fab-wa" href="https://wa.me/{{ $c['whatsapp'] }}?text={{ rawurlencode($c['whatsapp_text']) }}" target="_blank" rel="noopener noreferrer" aria-label="Chat WhatsApp {{ $site['brand']['name'] }}">
  <span class="fab-wa__label">Chat WhatsApp</span>
  <span class="fab-wa__btn">
    <span class="fab-wa__ripple" aria-hidden="true"></span>
    <svg class="icon" aria-hidden="true"><use href="#i-whatsapp"/></svg>
    <i class="fab-wa__dot" aria-hidden="true"></i>
  </span>
</a>
