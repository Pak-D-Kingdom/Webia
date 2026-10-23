@extends('website-bisnis.template.property.professional.real-estate-agency-coral-peach.layouts.app')

@section('title', 'Blog — '.$site['brand']['name'])
@section('meta_description', 'Tips membeli rumah, inspirasi desain, dan insight investasi properti dari tim Coral Homes.')
@section('body_class', 'page-blog')

@section('content')
  @php $bl = $site['blog']; $img = $site['assets']['img']; @endphp
  @include('website-bisnis.template.property.professional.real-estate-agency-coral-peach.partials.page-header', ['image' => $site['page_images']['blog'], 'crumb' => 'Blog', 'title' => $bl['title'], 'subtitle' => $bl['subtitle']])

  <div class="container section">
    <div class="blog-tools">
      <div class="chips-row" role="group" aria-label="Filter kategori blog">
        @foreach ($bl['categories'] as $cat)
          <button class="chip {{ $loop->first ? 'is-active' : '' }}" type="button" data-blog-filter="{{ $cat['value'] }}" aria-pressed="{{ $loop->first ? 'true' : 'false' }}">{{ $cat['label'] }}</button>
        @endforeach
      </div>
      <div class="field field--search">
        <span class="field__icon"><svg class="icon" aria-hidden="true"><use href="#i-search"/></svg></span>
        <label class="sr-only" for="blog-q">Cari artikel</label>
        <input id="blog-q" type="search" placeholder="Cari artikel…" data-blog-search autocomplete="off">
      </div>
    </div>

    <div class="b-grid b-grid--page" data-blog-grid>
      @foreach ($bl['posts'] as $post)
        <article class="b-card reveal" data-cat="{{ $post['cat'] }}" data-title="{{ strtolower($post['title'].' '.$post['excerpt']) }}">
          <a class="b-card__media" href="{{ route('coral-peach.blog.show', $post['slug']) }}" tabindex="-1" aria-hidden="true"><img src="{{ asset($img.'/'.$post['image']) }}" alt="" loading="lazy" width="465" height="300"></a>
          <div class="b-card__body">
            <p class="b-card__meta"><span class="tag">{{ $post['cat_label'] }}</span><time>{{ $post['date'] }}</time><span>· {{ $post['read'] }} baca</span></p>
            <h2 class="b-card__title"><a href="{{ route('coral-peach.blog.show', $post['slug']) }}">{{ $post['title'] }}</a></h2>
            <p class="b-card__excerpt">{{ $post['excerpt'] }}</p>
            <span class="link-more" aria-hidden="true">Baca selengkapnya <svg class="icon"><use href="#i-arrow-right"/></svg></span>
          </div>
        </article>
      @endforeach
    </div>

    <div class="empty" data-blog-empty hidden>
      <svg class="icon" aria-hidden="true"><use href="#i-search"/></svg>
      <h2>Artikel tidak ditemukan</h2>
      <p>Coba kata kunci atau kategori lain.</p>
    </div>
  </div>

  @include('website-bisnis.template.property.professional.real-estate-agency-coral-peach.sections.cta-band')
@endsection
