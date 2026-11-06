{{-- Preview "Properti Pilihan": 4 properti pertama + tautan ke halaman Property. --}}
<section class="panel" id="property" aria-labelledby="pp-title">
  <header class="panel__head">
    <div><h2 class="panel__title" id="pp-title">Properti Pilihan</h2><p class="panel__sub">Temukan berbagai pilihan properti terbaik untuk Anda</p></div>
    <a class="link-more" href="{{ route('coral-peach.property') }}">Lihat Semua <svg class="icon" aria-hidden="true"><use href="#i-arrow-right"/></svg></a>
  </header>
  <div class="p-grid p-grid--preview">
    @foreach (array_slice($site['properties'], 0, 4) as $p)
      @include('website-bisnis.template.property.professional.real-estate-agency-coral-peach.partials.property-card', ['p' => $p])
    @endforeach
  </div>
</section>
