@php $wa = $site['whatsapp']; @endphp
<a class="lg-wa" href="https://wa.me/{{ $wa['number'] }}?text={{ rawurlencode($wa['message']) }}" target="_blank" rel="noopener noreferrer" aria-label="Chat via WhatsApp">
    <span class="lg-wa__ring" aria-hidden="true"></span>
    <span class="lg-wa__ic" aria-hidden="true"><svg class="lg-ic"><use href="#i-whatsapp"></use></svg></span>
    <span class="lg-wa__txt">{{ $wa['label'] }}</span>
</a>
