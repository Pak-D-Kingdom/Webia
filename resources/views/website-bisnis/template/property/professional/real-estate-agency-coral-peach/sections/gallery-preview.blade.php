{{-- Preview "Galeri Properti": foto utama (tombol play), 3 thumbnail, penanda "+ N Foto". Klik membuka lightbox. --}}
@php $g = $site['gallery']; $img = $site['assets']['img']; $items = array_slice($g['items'], 0, 4); @endphp
<section class="panel" id="gallery" aria-labelledby="gp-title">
  <header class="panel__head">
    <div><h2 class="panel__title" id="gp-title">Galeri Properti</h2><p class="panel__sub">Lihat keindahan setiap sudut properti kami</p></div>
    <a class="link-more" href="{{ route('coral-peach.gallery') }}">Lihat Semua <svg class="icon" aria-hidden="true"><use href="#i-arrow-right"/></svg></a>
  </header>
  <div class="g-preview">
    <a class="g-preview__main" href="{{ asset($img.'/'.$items[0]['file']) }}" data-lightbox="home-gallery" data-caption="{{ $items[0]['alt'] }}" @if($g['video']) data-video="{{ $g['video'] }}" @endif aria-label="Putar tur video properti">
      <img src="{{ asset($img.'/'.$items[0]['file']) }}" alt="{{ $items[0]['alt'] }}" loading="lazy" width="855" height="666">
      <span class="play" aria-hidden="true"><svg class="icon"><use href="#i-play"/></svg></span>
    </a>
    <div class="g-preview__thumbs">
      @foreach (array_slice($items, 1) as $i => $it)
        <a class="g-preview__thumb" href="{{ asset($img.'/'.$it['file']) }}" data-lightbox="home-gallery" data-caption="{{ $it['alt'] }}">
          <img src="{{ asset($img.'/'.$it['file']) }}" alt="{{ $it['alt'] }}" loading="lazy" width="300" height="204">
          @if ($loop->last)<span class="g-preview__more"><svg class="icon" aria-hidden="true"><use href="#i-image"/></svg>+ {{ $g['total_extra'] }} Foto</span>@endif
        </a>
      @endforeach
    </div>
  </div>
</section>
