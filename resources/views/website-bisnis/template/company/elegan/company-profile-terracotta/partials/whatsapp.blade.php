@php $w = $c['whatsapp']; @endphp
<a class="cp-wa" href="https://wa.me/{{ $w['number'] }}?text={{ rawurlencode($w['text']) }}" target="_blank" rel="noopener" aria-label="{{ $w['label'] }}">
    <span class="cp-wa__tip">{{ $w['label'] }}</span>
    {{ $ic('wa') }}
</a>
