@php $eds = $all->filter(fn ($a) => in_array('editor', $a['flags']))->values(); $main = $eds->first(); @endphp
<section class="section" id="editors-choice">
    <div class="wrap">
        @include($v . '.partials.section-head', ['eyebrow' => "Editor's Choice", 'title' => 'Pilihan <span class="gt">Editor</span>', 'desc' => 'Dikurasi langsung oleh tim editor Astraly berdasarkan kualitas, inovasi, dan kegunaan.'])
        <div class="editor-feature">
            <a href="{{ $aurl($main) }}" class="ef-main reveal reveal-l">
                <img src="{{ $img($main['img']) }}" alt="{{ $main['title'] }}" width="1280" height="720" loading="lazy">
                <div class="in">
                    <span class="badge b-hot">{{ $ic('crown', 'ico-sm') }} Pilihan Editor</span>
                    <h3 class="text-3xl mt-4">{{ $main['title'] }}</h3>
                    <p class="muted mt-3">{{ $cat($main)['desc'] }} Oleh {{ $cr($main)['name'] }}.</p>
                    <div class="flex items-center gap-4 mt-5"><span class="price">{{ $rp($main['price']) }}</span>{{ $stars($main['rating']) }}</div>
                </div>
            </a>
            <div class="grid gap-4 content-start">
                @foreach ($eds->slice(1, 3) as $a)
                    <a href="{{ $aurl($a) }}" class="best-row reveal reveal-r" style="--d:{{ $loop->index * .1 }}s;grid-template-columns:92px 1fr">
                        <img src="{{ $img($a['img']) }}" alt="{{ $a['title'] }}" width="92" height="58" loading="lazy">
                        <div><span class="ca-cat" style="font-size:11px">{{ $cat($a)['name'] }}</span><h4>{{ $a['title'] }}</h4><small>{{ $rp($a['price']) }} · {{ $a['rating'] }} / 5</small></div>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
</section>
