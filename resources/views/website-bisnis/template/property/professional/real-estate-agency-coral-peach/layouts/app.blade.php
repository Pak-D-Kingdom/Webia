<!DOCTYPE html>
<html lang="id" class="no-js">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
  <meta name="theme-color" content="#E8654A">
  <meta name="description" content="@yield('meta_description', $site['meta']['description'])">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>@yield('title', $site['meta']['title'])</title>

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600;700;800&family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset($site['assets']['css']) }}">
  @stack('styles')
</head>
<body class="@yield('body_class', 'page-home')">
  <script>document.documentElement.classList.replace('no-js','js');</script>
  <a class="skip-link" href="#main">Lewati ke konten utama</a>

  @include('website-bisnis.template.property.professional.real-estate-agency-coral-peach.partials.icons')
  @include('website-bisnis.template.property.professional.real-estate-agency-coral-peach.partials.topbar')
  @include('website-bisnis.template.property.professional.real-estate-agency-coral-peach.partials.navbar')

  <main id="main" tabindex="-1">
    @yield('content')
  </main>

  @include('website-bisnis.template.property.professional.real-estate-agency-coral-peach.partials.footer')
  @include('website-bisnis.template.property.professional.real-estate-agency-coral-peach.partials.floating-whatsapp')
  @include('website-bisnis.template.property.professional.real-estate-agency-coral-peach.partials.ai-chatbot')

  {{-- Lightbox global (dipakai galeri) --}}
  <div class="lightbox" data-lightbox-root hidden role="dialog" aria-modal="true" aria-label="Penampil foto">
    <button class="lightbox__close" type="button" data-lb-close aria-label="Tutup"><svg class="icon" aria-hidden="true"><use href="#i-x"/></svg></button>
    <button class="lightbox__nav lightbox__nav--prev" type="button" data-lb-prev aria-label="Foto sebelumnya"><svg class="icon" aria-hidden="true"><use href="#i-chevron-left"/></svg></button>
    <figure class="lightbox__figure">
      <img src="" alt="" data-lb-img>
      <video controls playsinline hidden data-lb-video></video>
      <figcaption data-lb-caption></figcaption>
    </figure>
    <button class="lightbox__nav lightbox__nav--next" type="button" data-lb-next aria-label="Foto berikutnya"><svg class="icon" aria-hidden="true"><use href="#i-chevron-right"/></svg></button>
  </div>

  <script type="application/json" id="coral-faq">@json($site['faq'])</script>
  <script src="{{ asset($site['assets']['js']) }}" defer></script>
  @stack('scripts')
</body>
</html>
