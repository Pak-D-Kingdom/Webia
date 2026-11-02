{{-- ===================== ARTIKEL BLOG (halaman /blog/{post}) ===================== --}}
@php $related = array_slice(array_values(array_diff_key($blogPosts, [$currentPost['slug'] => 1])), 0, 3); @endphp
<section class="rea-section" id="article" aria-label="{{ $currentPost['title'] }}">
    <div class="rea-container rea-article">
        <article class="rea-article__main">
            <figure class="rea-article__cover">
                <img src="{{ $currentPost['src'] }}" alt="{{ $currentPost['alt'] }}">
                <span class="rea-post__tag">{{ $currentPost['tag'] }}</span>
            </figure>

            <div class="rea-article__body">
                <p class="rea-article__lead">{{ $currentPost['excerpt'] }}</p>
                @foreach ($currentPost['body'] as $block)
                    @if ($block['type'] === 'h')
                        <h2>{{ $block['text'] }}</h2>
                    @elseif ($block['type'] === 'img')
                        <figure class="rea-article__inline"><img src="{{ $img($block['file']) }}" alt="{{ $block['alt'] }}" loading="lazy"></figure>
                    @else
                        <p>{{ $block['text'] }}</p>
                    @endif
                @endforeach
            </div>

            <a class="rea-link" href="{{ $route('blog') }}">{{ $icon('chev-l') }} Back to all articles</a>
        </article>

        <aside class="rea-article__side" aria-label="More">
            <div class="rea-article__cta">
                <p class="rea-eyebrow">PRIVATE VIEWING</p>
                <h2>Ready to see it in person?</h2>
                <p>Book a viewing or chat with our team on WhatsApp.</p>
                <a class="rea-btn rea-btn--gold" href="{{ $route('booking') }}">Book a Viewing {{ $icon('arrow') }}</a>
            </div>

            <div class="rea-article__related">
                <h3>More articles</h3>
                <ul>
                    @foreach ($related as $item)
                        <li>
                            <a href="{{ $route('blog.show', '', ['post' => $item['slug']]) }}">
                                <img src="{{ $item['src'] }}" alt="" loading="lazy">
                                <span><small>{{ $item['date'] }}</small>{{ $item['title'] }}</span>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </aside>
    </div>
</section>
