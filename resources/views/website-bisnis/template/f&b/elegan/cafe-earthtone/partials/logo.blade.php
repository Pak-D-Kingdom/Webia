{{-- Parameter opsional: $light (true = versi terang untuk latar gelap) --}}
<a class="lm-logo {{ ! empty($light) ? 'lm-logo--light' : '' }}" href="#beranda" aria-label="{{ $cafe['brand']['title'] }}, ke beranda">
    <svg class="i lm-logo__ico" aria-hidden="true"><use href="#i-leaf"/></svg>
    <span class="lm-logo__txt">
        <strong>{{ $cafe['brand']['name'] }}</strong>
        <small>Café &amp; Kitchen</small>
    </span>
</a>
