<div class="cp-top">
    <div class="cp-wrap cp-top__in">
        <div class="cp-top__l">
            <span>{{ $ic('pin') }}{{ $c['topbar']['address'] }}</span>
            <a class="cp-hide-m" href="mailto:{{ $c['topbar']['email'] }}">{{ $ic('mail') }}{{ $c['topbar']['email'] }}</a>
            <span class="cp-hide-m">{{ $ic('clock') }}{{ $c['topbar']['hours'] }}</span>
        </div>
        <div class="cp-top__r">
            @foreach ($c['social'] as $s)
                <a class="cp-soc" href="{{ $s['u'] }}" aria-label="{{ $s['n'] }}" target="_blank" rel="noopener">{{ $s['k'] }}</a>
            @endforeach
            <a href="tel:{{ preg_replace('/\s+/', '', $c['topbar']['phone']) }}">{{ $ic('phone') }}<span class="cp-hide-s">{{ $c['topbar']['phone'] }}</span></a>
        </div>
    </div>
</div>
