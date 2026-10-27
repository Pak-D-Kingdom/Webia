@php
    $cfg ??= config('template.retail.organic.skincare-sage-green.skincare');
@endphp
<ul class="features">
    @foreach($cfg['features'] as $f)
        <li>
            <span class="features__ico"><svg class="ico" aria-hidden="true"><use href="#i-{{ $f['icon'] }}"/></svg></span>
            <span><strong>{{ $f['title'] }}</strong>{{ $f['text'] }}</span>
        </li>
    @endforeach
</ul>
