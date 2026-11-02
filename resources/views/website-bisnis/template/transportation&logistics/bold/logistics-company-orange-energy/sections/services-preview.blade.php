@php $s = $site['services']; @endphp
<section class="lg-wrap lg-svc-wrap" aria-labelledby="lg-svc-title">
    <div class="lg-svc">
        <div class="lg-svc__intro">
            <h2 id="lg-svc-title"><a href="{{ $to('layanan') }}">{{ $s['title'] }}</a></h2>
            <p>{{ $s['text'] }}</p>
            <a class="lg-link" href="{{ $to('layanan') }}">{{ $s['link'] }}<svg class="lg-ic" aria-hidden="true"><use href="#i-arrow-right"></use></svg></a>
        </div>
        <ul class="lg-svc__list">
            @foreach ($s['items'] as $item)
                <li>
                    <a class="lg-svc__card" href="{{ $to('layanan') }}#{{ \Illuminate\Support\Str::slug($item['title']) }}">
                        <svg class="lg-ic lg-svc__ic" aria-hidden="true"><use href="#i-{{ $item['icon'] }}"></use></svg>
                        <span>{{ $item['title'] }}</span>
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
</section>
