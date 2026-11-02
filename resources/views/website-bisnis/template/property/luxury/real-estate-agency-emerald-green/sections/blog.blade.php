{{-- ===================== BLOG (preview di beranda & halaman Blog) ===================== --}}
@php
    $isPreview = $preview ?? false;
    $posts     = $isPreview ? array_slice(array_values($blogPosts), 0, $limit ?? 3) : array_values($blogPosts);
@endphp
<section class="rea-section {{ $isPreview ? 'rea-section--alt' : '' }}" id="blog" aria-label="{{ $pages['blog']['title'] }}">
    <div class="rea-container">
        @if ($isPreview)
            <header class="rea-sec-head">
                <div class="rea-section-head">
                    <p class="rea-eyebrow rea-eyebrow--dark">JOURNAL</p>
                    <h2>{{ $pages['blog']['title'] }}</h2>
                    <p>{{ $pages['blog']['subtitle'] }}</p>
                </div>
                <a class="rea-link" href="{{ $route('blog') }}">View All Articles {{ $icon('arrow') }}</a>
            </header>
        @endif

        <div class="rea-blog">
            @foreach ($posts as $item)
                <article class="rea-post">
                    <a class="rea-post__media" href="{{ $route('blog.show', '', ['post' => $item['slug']]) }}" tabindex="-1" aria-hidden="true">
                        <img src="{{ $item['src'] }}" alt="{{ $item['alt'] }}" loading="lazy">
                        <span class="rea-post__tag">{{ $item['tag'] }}</span>
                    </a>
                    <div class="rea-post__body">
                        <p class="rea-post__meta"><span>{{ $item['date'] }}</span><span aria-hidden="true">·</span><span>{{ $item['read'] }}</span></p>
                        <h3><a href="{{ $route('blog.show', '', ['post' => $item['slug']]) }}">{{ $item['title'] }}</a></h3>
                        <p>{{ $item['excerpt'] }}</p>
                        <a class="rea-link" href="{{ $route('blog.show', '', ['post' => $item['slug']]) }}">Read More {{ $icon('arrow') }}</a>
                    </div>
                </article>
            @endforeach
        </div>
    </div>
</section>
