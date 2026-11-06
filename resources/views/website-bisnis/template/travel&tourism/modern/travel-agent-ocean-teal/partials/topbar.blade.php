@php $c = $ta['contact']; @endphp
<div class="ta-topbar">
    <div class="ta-container ta-topbar__in">
        <ul class="ta-topbar__info">
            <li>
                <a href="tel:{{ $c['tel'] }}">{{ $icon('phone') }}<span>{{ $c['phone'] }}</span></a>
            </li>
            <li class="ta-hide-sm">
                <a href="mailto:{{ $c['email'] }}">{{ $icon('mail') }}<span>{{ $c['email'] }}</span></a>
            </li>
            <li class="ta-hide-md">
                {{ $icon('clock') }}<span>{{ $c['hours'] }}</span>
            </li>
        </ul>
        <ul class="ta-topbar__social" aria-label="Media sosial">
            @foreach ($ta['social'] as $s)
                <li>
                    <a href="{{ $s['url'] }}" target="_blank" rel="noopener noreferrer" aria-label="{{ $s['label'] }}">{{ $icon($s['icon']) }}</a>
                </li>
            @endforeach
        </ul>
    </div>
</div>
