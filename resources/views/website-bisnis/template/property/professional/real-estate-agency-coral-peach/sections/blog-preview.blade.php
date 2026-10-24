{{-- Preview Blog di beranda: 3 artikel terbaru. --}}
@php $bl = $site['blog']; $img = $site['assets']['img']; @endphp
<section class="panel" id="blog" aria-labelledby="bl-title">
  <header class="panel__head">
    <div><h2 class="panel__title" id="bl-title">{{ $bl['title'] }}</h2><p class="panel__sub">{{ $bl['subtitle'] }}</p></div>
    <a class="link-more" href="{{ route('coral-peach.blog') }}">Lihat Semua <svg class="icon" aria-hidden="true"><use href="#i-arrow-right"/></svg></a>
  </header>
  <div class="b-grid">
    @foreach ($bl['posts'] as $post)
      <article class="b-card reveal">
        <a class="b-card__media" href="{{ route('coral-peach.blog.show', $post['slug']) }}" tabindex="-1" aria-hidden="true"><img src="{{ asset($img.'/'.$post['image']) }}" alt="" loading="lazy" width="465" height="300"></a>
        <div class="b-card__body">
          <p class="b-card__meta"><span class="tag">{{ $post['cat_label'] }}</span><time>{{ $post['date'] }}</time></p>
          <h3 class="b-card__title"><a href="{{ route('coral-peach.blog.show', $post['slug']) }}">{{ $post['title'] }}</a></h3>
        </div>
      </article>
    @endforeach
  </div>
</section>
