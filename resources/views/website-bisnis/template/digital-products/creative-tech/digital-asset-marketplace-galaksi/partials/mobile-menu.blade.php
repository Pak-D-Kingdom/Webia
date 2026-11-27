<nav class="mobile-menu" id="mobileMenu" aria-label="Menu mobile">
    @foreach ($dam['nav'] as $item)
        <a href="{{ $u($item['href']) }}">{{ $item['label'] }} {{ $ic('arrow') }}</a>
        @if (!empty($item['mega']))
            <div class="sub">
                @foreach ($dam['categories'] as $slug => $c)
                    <a href="{{ $u('explore-assets') }}?cat={{ $slug }}">{{ $c['name'] }}</a>
                @endforeach
            </div>
        @elseif (!empty($item['children']))
            <div class="sub">
                @foreach ($item['children'] as $ch)
                    <a href="{{ $u($ch[1]) }}">{{ $ch[0] }}</a>
                @endforeach
            </div>
        @endif
    @endforeach
    <div class="grid gap-3 mt-8">
        <a href="{{ $u('become-a-creator') }}" class="btn btn-primary btn-lg" style="font-family:var(--ff);font-size:16px;border:0">Jadi Kreator</a>
        <a href="{{ $u('user-profile') }}" class="btn btn-ghost btn-lg" style="font-family:var(--ff);font-size:16px">Profil Saya</a>
    </div>
</nav>
<button class="icon-btn mobile-close" data-close-menu aria-label="Tutup menu">{{ $ic('close') }}</button>
