{{-- Tombol Login & Get Started di navbar (data: config 'nav_actions') --}}
@foreach ($e['nav_actions'] as $a)
    <a class="el-btn {{ $a['style'] === 'outline' ? 'el-btn--outline' : 'el-btn--primary' }}"
       href="{{ route($a['route']) }}"
       @if (request()->routeIs($a['route'])) aria-current="page" @endif>{{ $a['label'] }}@if (!empty($a['arrow']))<svg class="el-ico" aria-hidden="true"><use href="#i-arrow"/></svg>@endif</a>
@endforeach
