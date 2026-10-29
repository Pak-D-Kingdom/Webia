{{-- Avatar testimoni: foto jika ada, inisial jika tidak. Parameter: $t --}}
@if (!empty($t['avatar']))
    <img class="ta-avatar" src="{{ $img($t['avatar']) }}" alt="" width="44" height="44" loading="lazy">
@else
    <span class="ta-avatar ta-avatar--initial" aria-hidden="true">{{ mb_strtoupper(mb_substr($t['name'], 0, 1)) }}</span>
@endif
