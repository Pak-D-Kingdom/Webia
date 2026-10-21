@php $full = ($mode ?? 'preview') === 'full'; @endphp
<section class="{{ $full ? 'el-section ' : '' }}el-teachers {{ $full ? 'is-full' : 'el-panel' }}" id="teachers" aria-labelledby="teachersTitle">
    @if ($full)<div class="el-container">@endif
    <header class="el-head el-head--sm">
        <div>
            <h2 class="el-title" id="teachersTitle">{{ $e['pages']['teachers']['title'] }}</h2>
            <p class="el-sub">{{ $e['pages']['teachers']['sub'] }}</p>
        </div>
        @unless ($full)<a class="el-link" href="{{ route('elearning.teachers') }}">Lihat Semua <svg class="el-ico" aria-hidden="true"><use href="#i-arrow"/></svg></a>@endunless
    </header>

    <ul class="el-teacher-grid">
        @foreach ($e['teachers'] as $t)
            <li class="el-teacher">
                <img class="el-teacher__photo" src="{{ $img($t['photo']) }}" alt="Foto {{ $t['name'] }}" width="{{ $full ? 120 : 68 }}" height="{{ $full ? 120 : 68 }}" loading="lazy">
                <h3>{{ $t['name'] }}</h3>
                <p class="el-teacher__role">{{ $t['role'] }}</p>
                @if ($full)
                    <p class="el-teacher__bio">{{ $t['bio'] }}</p>
                    <ul class="el-tags el-tags--center">@foreach ($t['skills'] as $sk)<li>{{ $sk }}</li>@endforeach</ul>
                    <dl class="el-teacher__stats">
                        <div><dt>Pengalaman</dt><dd>{{ $t['exp'] }}</dd></div>
                        <div><dt>Rating</dt><dd><svg class="el-ico el-ico--fill" aria-hidden="true"><use href="#i-star"/></svg>{{ $t['rating'] }}</dd></div>
                        <div><dt>Kelas</dt><dd>{{ $t['classes'] }}</dd></div>
                    </dl>
                    <a class="el-btn el-btn--soft el-btn--sm" href="{{ route('elearning.schedules', ['program' => $t['program']]) }}">Lihat jadwal kelas</a>
                @endif
            </li>
        @endforeach
    </ul>
    @if ($full)</div>@endif
</section>
