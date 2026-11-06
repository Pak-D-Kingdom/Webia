{{-- Preview About Us di beranda. --}}
@php $a = $site['about']; $img = $site['assets']['img']; @endphp
<section class="panel about-mini" id="about" aria-labelledby="ab-title">
  <div class="about-mini__media"><img src="{{ asset($img.'/'.$a['image']) }}" alt="Fasad rumah modern Coral Homes" loading="lazy" width="1680" height="699"></div>
  <div class="about-mini__body">
    <header class="panel__head panel__head--stack">
      <div><h2 class="panel__title" id="ab-title">{{ $a['title'] }}</h2><p class="panel__sub">{{ $a['subtitle'] }}</p></div>
    </header>
    <p>{{ $a['text'][0] }}</p>
    <ul class="stat-row">
      @foreach (array_slice($a['stats'], 0, 3) as $st)
        <li><strong>{{ $st['value'] }}</strong><small>{{ $st['label'] }}</small></li>
      @endforeach
    </ul>
    <a class="btn btn--primary btn--sm" href="{{ route('coral-peach.about') }}">Selengkapnya <svg class="icon" aria-hidden="true"><use href="#i-arrow-right"/></svg></a>
  </div>
</section>
