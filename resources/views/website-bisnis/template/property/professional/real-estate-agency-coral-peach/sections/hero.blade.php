{{-- Hero beranda: judul, deskripsi, 4 fitur ringkas, foto rumah modern + dekorasi daun. --}}
@php $h = $site['hero']; $img = $site['assets']['img']; @endphp
<section class="hero" aria-labelledby="hero-title">
  <img class="hero__leaf" src="{{ asset($img.'/leaf-branch.svg') }}" alt="" aria-hidden="true">
  <div class="container hero__inner">
    <div class="hero__content">
      <p class="eyebrow">{{ $h['eyebrow'] }}</p>
      <h1 class="hero__title" id="hero-title">{{ $h['title_1'] }} <span>{{ $h['title_2'] }}</span></h1>
      <p class="hero__text">{{ $h['text'] }}</p>
      <ul class="hero__features">
        @foreach ($h['features'] as $f)
          <li>
            <span class="feat-icon"><svg class="icon" aria-hidden="true"><use href="#i-{{ $f['icon'] }}"/></svg></span>
            <span class="feat-text"><strong>{{ $f['title'] }}</strong><small>{{ $f['sub'] }}</small></span>
          </li>
        @endforeach
      </ul>
    </div>
  </div>
  <div class="hero__media">
    <img src="{{ asset($img.'/'.$h['image']) }}" alt="Rumah modern dua lantai dengan balkon kaca saat matahari terbenam" width="1752" height="466" fetchpriority="high">
  </div>
</section>
