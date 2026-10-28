@if ($t['avatar'])
    <img class="ta-avatar" src="{{ $img($t['avatar']) }}" alt="" width="56" height="56" loading="lazy">
@else
    <span class="ta-avatar ta-avatar--init" aria-hidden="true">{{ collect(explode(' ', $t['name']))->map(fn ($w) => mb_substr($w, 0, 1))->take(2)->implode('') }}</span>
@endif
