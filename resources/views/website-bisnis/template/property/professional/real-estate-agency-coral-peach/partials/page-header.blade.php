{{-- Header halaman dalam. Variabel: $title, $subtitle, $crumb, $image (opsional: nama file gambar banner). --}}
@php $img = $site['assets']['img']; @endphp
<section class="page-hero {{ !empty($image) ? 'has-media' : '' }}">
  <img class="page-hero__leaf" src="{{ asset($img.'/leaf-branch.svg') }}" alt="" aria-hidden="true">
  <div class="container page-hero__inner">
    <nav class="breadcrumb" aria-label="Breadcrumb">
      <a href="{{ route('coral-peach.home') }}">Home</a><span aria-hidden="true">/</span><span aria-current="page">{{ $crumb }}</span>
    </nav>
    <h1 class="page-hero__title">{{ $title }}</h1>
    <p class="page-hero__sub">{{ $subtitle }}</p>
  </div>
  @if (!empty($image))
    <div class="page-hero__media">
      <img src="{{ asset($img.'/'.$image) }}" alt="" width="1200" height="520" fetchpriority="high">
    </div>
  @endif
</section>
