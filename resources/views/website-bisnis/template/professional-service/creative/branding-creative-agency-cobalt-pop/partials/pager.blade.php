{{-- Parameter: $prev_route, $prev_label, $next_route, $next_label --}}
<nav class="bca-pager" aria-label="Navigasi halaman">
    <div class="bca-wrap">
        <a href="{{ route($site['routes'][$prev_route]) }}"><small>Sebelumnya</small><b>{{ $prev_label }}</b></a>
        <a href="{{ route($site['routes'][$next_route]) }}"><small>Selanjutnya</small><b>{{ $next_label }}</b></a>
    </div>
</nav>
