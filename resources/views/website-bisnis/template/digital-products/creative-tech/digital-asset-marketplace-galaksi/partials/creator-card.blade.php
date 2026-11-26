{{-- Param: $cid (id kreator), $c (data kreator) --}}
<a href="{{ $u('creator-profile') }}?creator={{ $cid }}" class="creator-card" data-tilt>
    <div class="av"><img src="{{ $img($c['avatar']) }}" alt="{{ $c['name'] }}" width="96" height="96" loading="lazy"><span class="ver">{{ $ic('check', 'ico-sm') }}</span></div>
    <h3>{{ $c['name'] }}</h3>
    <p class="dim tiny">{{ $c['role'] }} · {{ $c['city'] }}</p>
    <p class="muted mt-3" style="font-size:14px">{{ $c['bio'] }}</p>
    <div class="st"><span><b>{{ $c['assets'] }}</b>Aset</span><span><b>{{ $c['followers'] }}</b>Pengikut</span><span><b>{{ $c['rating'] }}</b>Rating</span></div>
</a>
