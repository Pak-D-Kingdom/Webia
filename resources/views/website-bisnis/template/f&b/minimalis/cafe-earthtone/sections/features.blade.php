<div class="features"><ul class="container">
    @foreach (config('cafe.features') as [$icon, $title, $desc])
        <li><svg class="i i--lg" aria-hidden="true"><use href="#i-{{ $icon }}"/></svg><div><b>{{ $title }}</b><span>{{ $desc }}</span></div></li>
    @endforeach
</ul></div>
