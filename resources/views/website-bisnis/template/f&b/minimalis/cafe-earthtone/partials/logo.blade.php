<a class="logo{{ !empty($light) ? ' logo--light' : '' }}" href="{{ $href ?? route('webia.fnb.minimalis.home') . '#beranda' }}">
    <img src="{{ asset("images/$path/" . (!empty($light) ? 'logo-icon-light.png' : 'logo-icon.png')) }}" alt="" width="62" height="47">
    <span><b>{{ config('cafe.name') }}</b><small>{{ config('cafe.tagline') }}</small></span>
</a>
