{{-- Parameter: $m (anggota tim). Potret berupa monogram grafis, bukan foto. --}}
<article class="bca-person bca-reveal">
    <div class="bca-person__ph" data-tone="{{ $m['tone'] }}" data-shape="{{ $m['shape'] }}" role="img" aria-label="Monogram {{ $m['name'] }}">
        <span class="bca-person__init" aria-hidden="true">{{ $m['initials'] }}</span>
    </div>
    <h3>{{ $m['name'] }}</h3>
    <p class="bca-person__role">{{ $m['role'] }}</p>
    <p class="bca-person__focus">{{ $m['focus'] }}</p>
    <ul class="bca-chips">
        @foreach($m['skills'] as $k)<li class="bca-chip">{{ $k }}</li>@endforeach
    </ul>
</article>
