{{-- Teacher terbaik. $full=true → kartu detail dengan bio & keahlian --}}
@php $full = $full ?? false; @endphp
<section id="teachers" class="{{ $full ? 'block' : 'panel panel--teachers' }}" aria-labelledby="teachers-title">
    @if (! $full)
        <header class="panel__head">
            <h2 id="teachers-title" class="h-fun">Teacher <span>Terbaik</span></h2>
            <a class="link-more" href="{{ route($rp.'teachers') }}">Lihat Semua <i class="bi bi-arrow-right" aria-hidden="true"></i></a>
        </header>
    @else
        <h2 id="teachers-title" class="sr-only">Daftar teacher</h2>
    @endif

    <div class="teacher-grid {{ $full ? 'teacher-grid--full' : '' }}">
        @foreach ($t['teachers'] as $tc)
            <article class="tcard">
                <img class="tcard__img" src="{{ $img.$tc['image'] }}" alt="{{ $tc['name'] }}" width="{{ $full ? 120 : 84 }}" height="{{ $full ? 120 : 84 }}" loading="lazy">
                <h3 class="tcard__name">{{ $tc['name'] }}</h3>
                <p class="tcard__role">{{ $tc['role'] }}</p>
                <p class="rating"><i class="bi bi-star-fill" aria-hidden="true"></i> {{ $tc['rating'] }} <span>({{ $tc['reviews'] }})</span></p>
                @if ($full)
                    <p class="tcard__bio">{{ $tc['bio'] }}</p>
                    <ul class="tags">@foreach ($tc['skills'] as $sk)<li>{{ $sk }}</li>@endforeach</ul>
                    <a class="btn btn--soft btn--sm" href="{{ route($rp.'schedules') }}">Lihat Jadwal <i class="bi bi-arrow-right" aria-hidden="true"></i></a>
                @endif
            </article>
        @endforeach
    </div>
</section>
