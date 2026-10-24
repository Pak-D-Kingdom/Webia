@extends($ns.'layouts.app')

@section('title', $post['title'].' — '.$t['brand']['name'])
@section('description', $post['excerpt'])

@section('content')
    @include($ns.'partials.page-header', [
        'title'       => $post['title'],
        'desc'        => $post['category'].' — '.$post['date'],
        'parent'      => ['label' => 'Blog', 'url' => $r('blog')],
        'headerImage' => $post['image'],
    ])

    <div class="container page detail">
        <article class="panel article">
            <p class="article__meta">
                <span>{{ $post['category'] }}</span><time>{{ $post['date'] }}</time><span>{{ $post['read'] }}</span><span>{{ $post['author'] }}</span>
            </p>
            <p class="article__lead">{{ $post['lead'] }}</p>

            @foreach ($post['body'] as $block)
                @if (isset($block['h']))
                    <h2>{{ $block['h'] }}</h2>
                @elseif (isset($block['p']))
                    <p>{{ $block['p'] }}</p>
                @elseif (isset($block['ul']))
                    <ul class="checks">
                        @foreach ($block['ul'] as $li)
                            <li><svg class="i" aria-hidden="true"><use href="#i-check"/></svg>{{ $li }}</li>
                        @endforeach
                    </ul>
                @endif
            @endforeach

            <a class="btn btn--primary article__back" href="{{ $r('blog') }}"><svg class="i" aria-hidden="true"><use href="#i-left"/></svg> Kembali ke Blog</a>
        </article>

        <aside class="detail__side" aria-label="Artikel lainnya">
            <section class="panel">
                <h2 class="panel__title">Artikel Lainnya</h2>
                <ul class="side-posts">
                    @foreach ($t['blog'] as $other)
                        @continue($other['slug'] === $post['slug'])
                        <li>
                            <a href="{{ $r('blog.show', ['slug' => $other['slug']]) }}">
                                <span class="side-posts__img media"><img src="{{ $img($other['image']) }}" alt="" loading="lazy" data-fallback></span>
                                <span><small>{{ $other['category'] }} — {{ $other['date'] }}</small><b>{{ $other['title'] }}</b></span>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </section>
            <section class="panel side-cta">
                <h2 class="panel__title">Temukan Properti Impian</h2>
                <p class="panel__sub">Lihat pilihan hunian asri yang siap Anda kunjungi.</p>
                <a class="btn btn--primary btn--block" href="{{ $r('properties') }}">Lihat Properti <svg class="i" aria-hidden="true"><use href="#i-arrow"/></svg></a>
            </section>
        </aside>
    </div>
@endsection
