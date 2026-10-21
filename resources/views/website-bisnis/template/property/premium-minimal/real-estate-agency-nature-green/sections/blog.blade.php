@php
    $posts = $t['blog'];
    if (isset($limit)) { $posts = array_slice($posts, 0, $limit); }
    $isPreview = !empty($preview);
@endphp
<section class="panel" id="blog" aria-labelledby="h-blog">
    @if ($isPreview)
        <header class="panel__head">
            <div>
                <h2 id="h-blog" class="panel__title">Blog</h2>
                <p class="panel__sub">Tips dan wawasan seputar properti</p>
            </div>
            <a class="link-all" href="{{ $r('blog') }}">Lihat Semua <svg class="i" aria-hidden="true"><use href="#i-arrow"/></svg></a>
        </header>
    @else
        <h2 id="h-blog" class="sr-only">Artikel blog</h2>
    @endif

    <div class="cards cards--page">
        @foreach ($posts as $post)
            <article class="card">
                <div class="card__media card__media--blog media"><img src="{{ $img($post['image']) }}" alt="" loading="lazy" data-fallback></div>
                <div class="card__body">
                    <p class="card__tag"><span>{{ $post['category'] }}</span><time>{{ $post['date'] }}</time></p>
                    <h3>{{ $post['title'] }}</h3>
                    <p class="card__text">{{ $post['excerpt'] }}</p>
                </div>
            </article>
        @endforeach
    </div>
</section>
