@php($r = $e['route'])
@php($full = $full ?? false)
<section @class(['nl-sec nl-sec--teachers', 'nl-card' => ! $full]) id="teachers" aria-labelledby="teachers-title">
    @if(! $full)
        <div class="nl-head">
            <h2 id="teachers-title">Teacher Terbaik</h2>
            <a class="nl-link" href="{{ route($r.'teachers') }}">Lihat Semua <svg class="ic"><use href="#i-arrow"/></svg></a>
        </div>
    @else
        <h2 class="nl-sr" id="teachers-title">Daftar pengajar</h2>
    @endif

    <ul @class(['nl-teachers', 'nl-teachers--full' => $full])>
        @foreach($e['teachers'] as $t)
            <li class="nl-teacher">
                <span class="nl-teacher__photo"><img src="{{ asset($e['img'].'/'.$t['img']) }}" alt="Foto {{ $t['name'] }}" loading="lazy" width="96" height="96"></span>
                <strong>{{ $t['name'] }}</strong>
                <small>{{ $t['role'] }}</small>
                <span class="nl-rate" aria-label="Rating {{ $t['rating'] }} dari {{ $t['reviews'] }} ulasan"><svg class="ic"><use href="#i-star"/></svg>{{ $t['rating'] }} <em>({{ $t['reviews'] }})</em></span>
            </li>
        @endforeach
    </ul>
</section>
