{{-- Kartu program (dipakai preview beranda & halaman Programs). Param: $p --}}
@php $lv = mb_strtolower($p['level']); @endphp
<article class="pcard" data-category="{{ $p['category'] }}" data-level="{{ $lv }}" data-title="{{ mb_strtolower($p['title']) }}">
    <a class="pcard__media tone-{{ $p['tone'] }}" href="{{ route($rp.'registration', ['program' => $p['slug']]) }}" tabindex="-1" aria-hidden="true">
        @if ($p['image'])
            <img src="{{ $img.$p['image'] }}" alt="" width="450" height="240" loading="lazy">
        @else
            <span class="pcard__fallback"><i class="bi {{ $p['icon'] }}"></i></span>
        @endif
        <span class="badge lv-{{ $lv }}">{{ $p['level'] }}</span>
    </a>
    <h3 class="pcard__title">{{ $p['title'] }}</h3>
    <ul class="pcard__meta">
        <li><i class="bi bi-journal-text" aria-hidden="true"></i>{{ $p['modules'] }} Modul</li>
        <li><i class="bi bi-clock-fill" aria-hidden="true"></i>{{ $p['hours'] }} Jam</li>
    </ul>
    <div class="pcard__foot">
        <strong class="price">Rp {{ number_format($p['price'], 0, ',', '.') }}</strong>
        <a class="go-btn" href="{{ route($rp.'registration', ['program' => $p['slug']]) }}" aria-label="Daftar {{ $p['title'] }}"><i class="bi bi-arrow-right" aria-hidden="true"></i></a>
    </div>
</article>
