@extends('website-bisnis.template.property.professional.real-estate-agency-coral-peach.layouts.app')

@section('title', $post['title'].' — '.$site['brand']['name'])
@section('meta_description', $post['excerpt'])
@section('body_class', 'page-blog page-article')

@section('content')
  @php
    $img = $site['assets']['img'];
    $posts = $site['blog']['posts'];
    $idx = collect($posts)->search(fn ($p) => $p['slug'] === $post['slug']);
    $prev = $idx > 0 ? $posts[$idx - 1] : null;
    $next = $posts[$idx + 1] ?? null;
    $related = collect($posts)->where('slug', '!=', $post['slug'])->values();
    $shareUrl = url()->current();
  @endphp

  @include('website-bisnis.template.property.professional.real-estate-agency-coral-peach.partials.page-header', [
    'image'    => $post['cover'],
    'parent'   => ['label' => 'Blog', 'url' => route('coral-peach.blog')],
    'crumb'    => 'Artikel',
    'title'    => $post['title'],
    'subtitle' => $post['cat_label'].' · '.$post['date'].' · '.$post['read'].' baca',
  ])

  <div class="container section article-layout">
    <article class="panel article">
      <div class="article__cover"><img src="{{ asset($img.'/'.$post['cover']) }}" alt="{{ $post['title'] }}" width="1200" height="600"></div>
      <div class="article__body">
        <p class="article__meta">
          <span class="tag">{{ $post['cat_label'] }}</span>
          <span><svg class="icon" aria-hidden="true"><use href="#i-user"/></svg>{{ $post['author'] }}</span>
          <span><svg class="icon" aria-hidden="true"><use href="#i-calendar"/></svg><time>{{ $post['date'] }}</time></span>
          <span><svg class="icon" aria-hidden="true"><use href="#i-clock"/></svg>{{ $post['read'] }} baca</span>
        </p>

        <div class="prose">
          @foreach ($post['content'] as $block)
            @switch($block['type'])
              @case('h2')
                <h2>{{ $block['text'] }}</h2>
                @break
              @case('list')
                <ul class="check-list">
                  @foreach ($block['items'] as $item)
                    <li><svg class="icon" aria-hidden="true"><use href="#i-check"/></svg>{{ $item }}</li>
                  @endforeach
                </ul>
                @break
              @case('quote')
                <blockquote>{{ $block['text'] }}</blockquote>
                @break
              @default
                <p>{{ $block['text'] }}</p>
            @endswitch
          @endforeach
        </div>

        <div class="article__foot">
          <div class="share">
            <span class="share__label" data-copy-label>Bagikan:</span>
            <a href="https://wa.me/?text={{ rawurlencode($post['title'].' '.$shareUrl) }}" target="_blank" rel="noopener noreferrer" aria-label="Bagikan lewat WhatsApp"><svg class="icon" aria-hidden="true"><use href="#i-whatsapp"/></svg></a>
            <a href="https://www.facebook.com/sharer/sharer.php?u={{ rawurlencode($shareUrl) }}" target="_blank" rel="noopener noreferrer" aria-label="Bagikan ke Facebook"><svg class="icon" aria-hidden="true"><use href="#i-facebook"/></svg></a>
            <button type="button" data-copy-link aria-label="Salin tautan artikel"><svg class="icon" aria-hidden="true"><use href="#i-link"/></svg></button>
          </div>
          <a class="link-more" href="{{ route('coral-peach.blog') }}"><svg class="icon" aria-hidden="true" style="transform:rotate(180deg)"><use href="#i-arrow-right"/></svg> Kembali ke Blog</a>
        </div>
      </div>
    </article>

    <aside class="article-side" aria-label="Artikel lainnya">
      @if ($related->isNotEmpty())
        <section class="panel">
          <h2 class="panel__title">Artikel Lainnya</h2>
          <ul class="side-posts">
            @foreach ($related as $rp)
              <li class="side-post">
                <a class="side-post__img" href="{{ route('coral-peach.blog.show', $rp['slug']) }}" tabindex="-1" aria-hidden="true"><img src="{{ asset($img.'/'.$rp['image']) }}" alt="" loading="lazy" width="96" height="72"></a>
                <div>
                  <a class="side-post__title" href="{{ route('coral-peach.blog.show', $rp['slug']) }}">{{ $rp['title'] }}</a>
                  <small>{{ $rp['date'] }} · {{ $rp['read'] }}</small>
                </div>
              </li>
            @endforeach
          </ul>
        </section>
      @endif

      <section class="side-cta">
        <h2>Butuh konsultasi properti?</h2>
        <p>Tim Coral Homes siap membantu Anda memilih unit yang paling sesuai.</p>
        <a class="btn btn--light btn--block" href="{{ route('coral-peach.contact') }}">Hubungi Kami <svg class="icon" aria-hidden="true"><use href="#i-arrow-right"/></svg></a>
      </section>
    </aside>

    @if ($prev || $next)
      <nav class="article-nav" aria-label="Artikel sebelumnya dan berikutnya">
        @if ($prev)
          <a class="article-nav__item" href="{{ route('coral-peach.blog.show', $prev['slug']) }}"><small>← Artikel sebelumnya</small><strong>{{ $prev['title'] }}</strong></a>
        @else <span></span> @endif
        @if ($next)
          <a class="article-nav__item article-nav__item--next" href="{{ route('coral-peach.blog.show', $next['slug']) }}"><small>Artikel berikutnya →</small><strong>{{ $next['title'] }}</strong></a>
        @endif
      </nav>
    @endif
  </div>

  @include('website-bisnis.template.property.professional.real-estate-agency-coral-peach.sections.cta-band')
@endsection
