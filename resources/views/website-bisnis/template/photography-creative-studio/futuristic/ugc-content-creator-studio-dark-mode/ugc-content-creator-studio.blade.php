@php $img = asset('images/website-bisnis/template/photography-creative-studio/futuristic/ugc-content-creator-studio-dark-mode'); @endphp
<!DOCTYPE html>
<html lang="id" class="ugc">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>{{ $d['heads'][$page]['n'] }} | {{ $d['brand']['name'] }}</title>
<meta name="description" content="{{ $d['brand']['desc'] }}">
<meta name="theme-color" content="#09080F">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;700&family=Bricolage+Grotesque:opsz,wght@12..96,600;12..96,700;12..96,800&display=swap">
<link rel="stylesheet" href="{{ asset('css/website-bisnis/template/photography-creative-studio/futuristic/ugc-content-creator-studio-dark-mode/ugc-content-creator-studio.css') }}">
</head>
<body class="ugc-body" data-page="{{ $page }}">
<a class="ugc-skip" href="#main">Lewati ke konten</a>

{{-- TOPBAR --}}
<div class="ugc-topbar"><div class="ugc-wrap">
  <p class="ugc-live"><span class="ugc-dot"></span>{{ $d['brand']['topbar'] }}</p>
  <p class="ugc-topbar__r"><span>{{ $d['brand']['hours'] }}</span><a href="https://wa.me/{{ $d['brand']['wa'] }}" target="_blank" rel="noopener">WhatsApp {{ $d['brand']['phone'] }}</a></p>
</div></div>

{{-- NAVBAR --}}
<header class="ugc-nav"><div class="ugc-wrap ugc-nav__in">
  <a class="ugc-logo" href="{{ route('ugc.home') }}" aria-label="{{ $d['brand']['name'] }}">
    <span class="ugc-logo__m"><svg viewBox="0 0 38 38" aria-hidden="true"><defs><linearGradient id="ugcl" x1="0" y1="0" x2="1" y2="1"><stop offset="0" stop-color="#8A63FF"/><stop offset="1" stop-color="#FF4D8D"/></linearGradient></defs><rect x="1.5" y="1.5" width="35" height="35" rx="11" fill="#14122B" stroke="url(#ugcl)" stroke-width="1.5"/><path d="M25.5 12.5c-1.8-3-11.5-3-11.5 2.7 0 6.3 11.5 3 11.5 9.3 0 5.8-9.8 5.8-12.5 2" fill="none" stroke="url(#ugcl)" stroke-width="3.2" stroke-linecap="round"/><circle cx="29.5" cy="9" r="2.2" fill="#FF4D8D"/></svg></span>
    <span class="ugc-logo__t"><b>S<i class="ugc-o"></i>R<i class="ugc-o"></i>T</b><small>UGC STUDIO</small></span>
  </a>
  <button class="ugc-burger" type="button" data-nav-toggle aria-expanded="false" aria-controls="ugc-links" aria-label="Buka menu"><i></i><i></i><i></i></button>
  <nav class="ugc-links" id="ugc-links" aria-label="Navigasi utama">
    @foreach($d['nav'] as $n)
    <a data-nav="{{ $n['key'] }}" class="ugc-link{{ $page===$n['key'] ? ' is-on' : '' }}" aria-current="{{ $page===$n['key'] ? 'page' : 'false' }}" href="{{ route('ugc.'.$n['key']) }}">{{ $n['label'] }}</a>
    @endforeach
    <a data-nav="inquiry" class="ugc-btn ugc-btn--pri ugc-links__cta" href="{{ route('ugc.inquiry') }}">Kirim brief</a>
  </nav>
</div></header>

<main id="main">
@if($page==='home')
{{-- HERO --}}
<section class="ugc-hero"><div class="ugc-wrap ugc-hero__grid">
  <div class="ugc-hero__copy">
    <p class="ugc-kicker"><span class="ugc-dot"></span>{{ $d['hero']['kicker'] }}</p>
    <h1>{{ $d['hero']['t1'] }} <em>{{ $d['hero']['t2'] }}</em> {{ $d['hero']['t3'] }}</h1>
    <p class="ugc-lead">{{ $d['hero']['lead'] }}</p>
    <div class="ugc-cta">
      <a class="ugc-btn ugc-btn--pri" href="{{ route('ugc.inquiry') }}">Kirim brief kampanye</a>
      <a class="ugc-btn" href="{{ route('ugc.samples') }}">Tonton sampel video</a>
    </div>
    <dl class="ugc-stats">
      @foreach($d['hero']['stats'] as $s)
      <div><dd>{{ $s['v'] }}</dd><dt>{{ $s['l'] }}</dt></div>
      @endforeach
    </dl>
  </div>
  <div class="ugc-stage" aria-hidden="true">
    <figure class="ugc-ph ugc-ph--a"><img src="{{ $img }}/sample-1.svg" alt="" width="360" height="640"></figure>
    <figure class="ugc-ph ugc-ph--b"><img src="{{ $img }}/sample-3.svg" alt="" width="360" height="640"></figure>
    <figure class="ugc-ph ugc-ph--c"><img src="{{ $img }}/sample-2.svg" alt="" width="360" height="640"></figure>
    <span class="ugc-chip ugc-chip--1"><i class="ugc-dot"></i>REC <b data-tc>00:24</b></span>
    <span class="ugc-chip ugc-chip--2">Hook 0–3 dtk</span>
    <span class="ugc-chip ugc-chip--3">CTR +38%</span>
  </div>
</div></section>
@else
<section class="ugc-phead"><div class="ugc-wrap">
  <p class="ugc-crumb"><a href="{{ route('ugc.home') }}">Beranda</a> / {{ $d['heads'][$page]['n'] }}</p>
  <h1>{{ $d['heads'][$page]['t'] }}</h1>
  <p>{{ $d['heads'][$page]['s'] }}</p>
</div></section>
@endif

@foreach($d['order'] as $k)
@if($page==='home' || $page===$k)
<section class="ugc-sec" id="{{ $k }}"><div class="ugc-wrap">
  @if($page==='home')
  <div class="ugc-sh">
    <div><p class="ugc-idx">0{{ $loop->iteration }} / {{ $d['heads'][$k]['n'] }}</p><h2>{{ $d['heads'][$k]['t'] }}</h2><p>{{ $d['heads'][$k]['s'] }}</p></div>
    <a class="ugc-more" href="{{ route('ugc.'.$k) }}">Lihat selengkapnya</a>
  </div>
  @endif

  @if($k==='portfolio')
  @if($page==='portfolio')
  <div class="ugc-chips" role="group" aria-label="Filter niche">
    @foreach($d['niches'] as $n)
    <button type="button" class="ugc-fchip{{ $n==='Semua' ? ' is-on' : '' }}" data-filter="{{ $n }}">{{ $n }}</button>
    @endforeach
  </div>
  @endif
  <div class="ugc-grid" style="--min:16rem">
    @foreach($d['portfolio'] as $r)
    @if($page!=='home' || $loop->index<$d['limit'][$k])
    <article class="ugc-creator" data-niche="{{ $r['niche'] }}">
      <div class="ugc-vf"><img src="{{ $img }}/{{ $r['img'] }}" alt="Potret kreator {{ $r['name'] }}" width="480" height="600" loading="lazy"><span class="ugc-tag">{{ $r['niche'] }}</span><span class="ugc-er">{{ $r['er'] }} ER</span></div>
      <div class="ugc-cbody">
        <h3>{{ $r['name'] }}</h3><p>{{ $r['bio'] }}</p>
        <dl class="ugc-metrics"><div><dt>Pengikut</dt><dd>{{ $r['fol'] }}</dd></div><div><dt>Engagement</dt><dd>{{ $r['er'] }}</dd></div><div><dt>Kota</dt><dd>{{ $r['city'] }}</dd></div></dl>
      </div>
    </article>
    @endif
    @endforeach
  </div>
  @endif

  @if($k==='samples')
  <div class="ugc-grid" style="--min:12rem">
    @foreach($d['samples'] as $r)
    @if($page!=='home' || $loop->index<$d['limit'][$k])
    <article class="ugc-sample">
      <a class="ugc-phone" href="{{ route('ugc.inquiry') }}" aria-label="Pesan video seperti {{ $r['title'] }}">
        <img src="{{ $img }}/{{ $r['img'] }}" alt="Cuplikan video {{ $r['title'] }}" width="360" height="640" loading="lazy">
        <span class="ugc-rec"><i class="ugc-dot"></i>REC</span><span class="ugc-dur">{{ $r['dur'] }}</span><span class="ugc-play"></span>
      </a>
      <h3>{{ $r['title'] }}</h3><p>{{ $r['brand'] }}</p><p class="ugc-views">{{ $r['views'] }} tayangan</p>
    </article>
    @endif
    @endforeach
  </div>
  @endif

  @if($k==='packages')
  <div class="ugc-grid" style="--min:17rem">
    @foreach($d['packages'] as $r)
    <article class="ugc-card ugc-pkg{{ $r['hot'] ? ' ugc-pkg--hot' : '' }}">
      @if($r['hot'])<span class="ugc-badge">Paling banyak dipilih</span>@endif
      <h3>{{ $r['name'] }}</h3><p class="ugc-mute">{{ $r['for'] }}</p>
      <p class="ugc-price">{{ $r['price'] }}<small> / {{ $r['qty'] }}</small></p>
      <ul class="ugc-ticks">@foreach($r['feat'] as $f)<li>{{ $f }}</li>@endforeach</ul>
      <a class="ugc-btn{{ $r['hot'] ? ' ugc-btn--pri' : '' }}" href="{{ route('ugc.inquiry') }}">Pilih paket {{ $r['name'] }}</a>
    </article>
    @endforeach
  </div>
  @endif

  @if($k==='rights')
  <div class="ugc-two">
    <div class="ugc-card"><h3>Yang Anda terima</h3>
      <ul class="ugc-ticks">@foreach($d['deliver'] as $f)<li>{{ $f }}</li>@endforeach</ul>
    </div>
    <div class="ugc-card"><h3>Hak penggunaan</h3>
      <div class="ugc-scroll"><table class="ugc-table"><thead><tr><th>Jenis</th><th>Durasi</th><th>Kanal</th><th>Biaya</th></tr></thead><tbody>
        @foreach($d['usage'] as $r)<tr><td>{{ $r['tier'] }}</td><td>{{ $r['dur'] }}</td><td>{{ $r['ch'] }}</td><td>{{ $r['fee'] }}</td></tr>@endforeach
      </tbody></table></div>
      <p class="ugc-note">Biaya tambahan dihitung dari harga paket. Perpanjangan bisa diajukan kapan saja.</p>
    </div>
  </div>
  @endif

  @if($k==='platforms')
  <div class="ugc-grid" style="--min:14rem">
    @foreach($d['platforms'] as $r)
    <article class="ugc-card ugc-plat"><span class="ugc-glyph">{{ $r['g'] }}</span><div><h3>{{ $r['name'] }}</h3><p class="ugc-mute">Rasio {{ $r['fmt'] }}, {{ $r['maxd'] }}</p></div></article>
    @endforeach
  </div>
  @endif

  @if($k==='brands')
  <div class="ugc-marq" aria-label="Logo brand klien"><div class="ugc-marq__t">
    @foreach($d['brands'] as $r)<img src="{{ $img }}/{{ $r['img'] }}" alt="Logo {{ $r['name'] }}" width="240" height="72" loading="lazy">@endforeach
    @foreach($d['brands'] as $r)<img src="{{ $img }}/{{ $r['img'] }}" alt="" aria-hidden="true" width="240" height="72" loading="lazy">@endforeach
  </div></div>
  <div class="ugc-grid" style="--min:19rem">
    @foreach($d['brands'] as $r)
    @if($page!=='home' || $loop->index<$d['limit'][$k])
    <article class="ugc-brand">
      <div class="ugc-brand__logo ugc-vf"><img src="{{ $img }}/{{ $r['img'] }}" alt="Logo {{ $r['name'] }}" width="240" height="72" loading="lazy"></div>
      <div class="ugc-brand__b">
        <div class="ugc-brand__t"><h3>{{ $r['name'] }}</h3><span class="ugc-pill">{{ $r['cat'] }}</span></div>
        <p class="ugc-mute">{{ $r['note'] }}</p>
        <p class="ugc-brand__res"><b>{{ $r['big'] }}</b><span>{{ $r['lbl'] }}</span></p>
        <p class="ugc-brand__f">Skema: {{ $r['fmt'] }}</p>
      </div>
    </article>
    @endif
    @endforeach
  </div>
  @if($page==='brands')
  <div class="ugc-bstats">@foreach($d['bstats'] as $s)<div><b>{{ $s['v'] }}</b><span>{{ $s['l'] }}</span></div>@endforeach</div>
  <h2 class="ugc-h2s">Skema kolaborasi</h2>
  <div class="ugc-grid" style="--min:16rem">
    @foreach($d['collab'] as $r)<article class="ugc-card ugc-collab"><span class="ugc-collab__n">0{{ $loop->iteration }}</span><h3>{{ $r['t'] }}</h3><p class="ugc-mute">{{ $r['d'] }}</p><p class="ugc-collab__fit">{{ $r['fit'] }}</p></article>@endforeach
  </div>
  <div class="ugc-banner"><div><h3>Brand Anda berikutnya?</h3><p class="ugc-mute">Ceritakan produk dan target Anda. Kami usulkan skema yang paling pas.</p></div><a class="ugc-btn ugc-btn--pri" href="{{ route('ugc.inquiry') }}">Kirim brief kampanye</a></div>
  @endif
  @endif

  @if($k==='testimonials')
  <div class="ugc-grid" style="--min:17rem">
    @foreach($d['testimonials'] as $r)
    <figure class="ugc-card ugc-quote">
      <p class="ugc-stars" aria-label="Rating 5 dari 5">★★★★★</p>
      <blockquote>{{ $r['q'] }}</blockquote>
      <figcaption><span class="ugc-av">{{ $r['ini'] }}</span><span><strong>{{ $r['name'] }}</strong><br><small>{{ $r['role'] }}, {{ $r['brand'] }}</small></span></figcaption>
    </figure>
    @endforeach
  </div>
  @endif

  @if($k==='inquiry')
  <div class="ugc-two ugc-two--form">
    <form class="ugc-card ugc-form" data-ugc-form data-wa="{{ $d['brand']['wa'] }}" action="#" method="post" novalidate>
      <section class="ugc-fs"><p class="ugc-fs__h"><b>01</b>Kontak Anda</p><div class="ugc-fgrid">
        <div class="ugc-f"><label for="f-nama">Nama lengkap</label><input id="f-nama" name="nama" placeholder="Nama Anda" data-req="t" data-msg="Isi nama Anda." autocomplete="name"><span class="ugc-err"></span></div>
        <div class="ugc-f"><label for="f-brand">Nama brand</label><input id="f-brand" name="brand" placeholder="Nama brand atau bisnis" data-req="t" data-msg="Isi nama brand." autocomplete="organization"><span class="ugc-err"></span></div>
        <div class="ugc-f"><label for="f-email">Email</label><input id="f-email" type="email" name="email" placeholder="nama@brand.com" data-req="email" data-msg="Gunakan format email yang benar." autocomplete="email"><span class="ugc-err"></span></div>
        <div class="ugc-f"><label for="f-wa">Nomor WhatsApp</label><input id="f-wa" type="tel" name="wa" placeholder="08xx xxxx xxxx" data-req="wa" data-msg="Isi nomor 8–16 digit." autocomplete="tel" inputmode="tel"><span class="ugc-err"></span></div>
      </div></section>
      <section class="ugc-fs"><p class="ugc-fs__h"><b>02</b>Kampanye</p>
        <fieldset class="ugc-f"><legend>Pilih paket</legend><div class="ugc-pks">
          @foreach($d['packages'] as $r)<label class="ugc-pk"><input type="radio" name="paket" value="{{ $r['name'] }}"{{ $r['hot'] ? ' checked' : '' }}><span><b>{{ $r['name'] }}</b><small>{{ $r['qty'] }}, {{ $r['price'] }}</small></span></label>@endforeach
          <label class="ugc-pk"><input type="radio" name="paket" value="Belum tahu"><span><b>Belum tahu</b><small>Kami bantu pilih</small></span></label>
        </div></fieldset>
        <div class="ugc-fgrid">
          <div class="ugc-f"><label for="f-budget">Anggaran</label><select id="f-budget" name="budget">@foreach($d['budgets'] as $b)<option>{{ $b }}</option>@endforeach</select></div>
          <div class="ugc-f"><label for="f-tgl">Target tayang</label><input id="f-tgl" type="date" name="tanggal"></div>
        </div>
        <fieldset class="ugc-f"><legend>Platform tayang</legend><div class="ugc-opts">@foreach($d['platforms'] as $r)<label class="ugc-opt"><input type="checkbox" name="platform[]" value="{{ $r['name'] }}"><span>{{ $r['name'] }}</span></label>@endforeach</div></fieldset>
      </section>
      <section class="ugc-fs"><p class="ugc-fs__h"><b>03</b>Brief</p>
        <div class="ugc-f"><label for="f-brief">Ceritakan produk dan tujuan kampanye</label><textarea id="f-brief" name="brief" rows="5" maxlength="600" placeholder="Contoh: serum wajah baru, target perempuan 20–30 tahun, tujuan penjualan di TikTok Shop." data-req="t" data-msg="Ceritakan produk dan tujuan kampanye."></textarea><span class="ugc-hint"><span class="ugc-err"></span><em data-count>0/600</em></span></div>
        <div class="ugc-f"><label class="ugc-check"><input type="checkbox" name="consent" data-consent> <span>Saya setuju data ini dipakai untuk menghubungi saya terkait kampanye.</span></label><span class="ugc-err"></span></div>
      </section>
      <div class="ugc-submit"><button class="ugc-btn ugc-btn--pri" type="submit">Kirim brief lewat WhatsApp</button><p>Brief terkirim ke WhatsApp tim kami di {{ $d['brand']['phone'] }}.</p></div>
    </form>
    <div class="ugc-card ugc-ok" data-ok hidden><h3>Brief siap dikirim</h3><p>WhatsApp terbuka dengan brief Anda. Tekan kirim di sana. Bila tidak terbuka, gunakan tombol di bawah.</p><div class="ugc-cta"><a class="ugc-btn ugc-btn--pri" data-wa-link href="#" target="_blank" rel="noopener">Buka WhatsApp</a><a class="ugc-btn" href="{{ route('ugc.packages') }}">Lihat paket</a></div></div>
    <aside class="ugc-card ugc-after"><h3>Setelah brief dikirim</h3>
      <ol>@foreach($d['after'] as $f)<li>{{ $f }}</li>@endforeach</ol>
    </aside>
  </div>
  @endif

  @if($k==='faq')
  <div class="ugc-two ugc-two--faq">
    <div class="ugc-mock ugc-vf">
      <p class="ugc-mock__h"><span class="ugc-avatar"></span>Sorot Assistant</p>
      <p class="ugc-b user">{{ $d['faq'][0]['q'] }}</p><p class="ugc-b bot">{{ $d['faq'][0]['a'] }}</p>
      <p class="ugc-b user">{{ $d['faq'][1]['q'] }}</p><p class="ugc-b bot">{{ $d['faq'][1]['a'] }}</p>
      <button class="ugc-btn ugc-btn--pri" type="button" data-bot-open>Buka AI chatbot</button>
    </div>
    <div class="ugc-acc">
      @foreach($d['faq'] as $r)
      @if($page!=='home' || $loop->index<$d['limit'][$k])
      <details><summary>{{ $r['q'] }}</summary><p>{{ $r['a'] }}</p></details>
      @endif
      @endforeach
    </div>
  </div>
  @endif
</div></section>
@endif
@endforeach
</main>

{{-- FOOTER --}}
<footer class="ugc-foot"><div class="ugc-wrap">
  <div class="ugc-fcta"><div><h2>Punya produk yang ingin dibuatkan video UGC?</h2><p>Kirim brief singkat. Kami balas dengan estimasi dan shortlist kreator dalam satu hari kerja.</p></div><a class="ugc-btn ugc-btn--pri" href="{{ route('ugc.inquiry') }}">Kirim brief sekarang</a></div>
  <div class="ugc-foot__grid">
    <div><a class="ugc-logo" href="{{ route('ugc.home') }}" aria-label="{{ $d['brand']['name'] }}">
    <span class="ugc-logo__m"><svg viewBox="0 0 38 38" aria-hidden="true"><defs><linearGradient id="ugcl2" x1="0" y1="0" x2="1" y2="1"><stop offset="0" stop-color="#8A63FF"/><stop offset="1" stop-color="#FF4D8D"/></linearGradient></defs><rect x="1.5" y="1.5" width="35" height="35" rx="11" fill="#14122B" stroke="url(#ugcl2)" stroke-width="1.5"/><path d="M25.5 12.5c-1.8-3-11.5-3-11.5 2.7 0 6.3 11.5 3 11.5 9.3 0 5.8-9.8 5.8-12.5 2" fill="none" stroke="url(#ugcl2)" stroke-width="3.2" stroke-linecap="round"/><circle cx="29.5" cy="9" r="2.2" fill="#FF4D8D"/></svg></span>
    <span class="ugc-logo__t"><b>S<i class="ugc-o"></i>R<i class="ugc-o"></i>T</b><small>UGC STUDIO</small></span>
  </a><p class="ugc-mute">{{ $d['brand']['desc'] }}</p><a class="ugc-btn ugc-fwa" href="https://wa.me/{{ $d['brand']['wa'] }}" target="_blank" rel="noopener">Chat {{ $d['brand']['phone'] }}</a></div>
    <div><h3>Halaman</h3><ul>@foreach($d['nav'] as $n)<li><a data-nav="{{ $n['key'] }}" href="{{ route('ugc.'.$n['key']) }}">{{ $n['label'] }}</a></li>@endforeach</ul></div>
    <div><h3>Layanan</h3><ul>@foreach($d['order'] as $k)@if($k==='inquiry' || $k==='faq')<li><a data-nav="{{ $k }}" href="{{ route('ugc.'.$k) }}">{{ $d['heads'][$k]['n'] }}</a></li>@endif @endforeach</ul></div>
    <div><h3>Kontak</h3><ul class="ugc-foot__c"><li><small>WhatsApp</small><a href="https://wa.me/{{ $d['brand']['wa'] }}" target="_blank" rel="noopener">{{ $d['brand']['phone'] }}</a></li><li><small>Email</small><a href="mailto:{{ $d['brand']['email'] }}">{{ $d['brand']['email'] }}</a></li><li><small>Jam kerja</small>{{ $d['brand']['hours'] }}</li><li><small>Studio</small>{{ $d['brand']['city'] }}, Indonesia</li></ul></div>
  </div>
  <div class="ugc-bar"><p class="ugc-credit">© 2026 WEBIA by D-KREASI. Seluruh hak cipta dilindungi.</p><a class="ugc-top" href="#main">Kembali ke atas</a></div>
</div></footer>

{{-- WHATSAPP --}}
<a class="ugc-wa" href="https://wa.me/{{ $d['brand']['wa'] }}?text=Halo%20SOROT%20Studio%2C%20saya%20ingin%20tanya%20paket%20UGC." target="_blank" rel="noopener" aria-label="Chat WhatsApp {{ $d['brand']['phone'] }}">
  <span class="ugc-wa__ic"><svg viewBox="0 0 24 24" width="22" height="22" aria-hidden="true"><path fill="currentColor" d="M12 2.5a9.500 9.500 0 0 0-8.200 14.300L2.500 21.500l4.800-1.200A9.500 9.500 0 1 0 12 2.500Zm4.700 13.100c-.2.600-1.200 1.100-1.700 1.200-.5.100-1.100.100-3.200-.7-2.500-1-4.100-3.600-4.200-3.800-.1-.2-1-1.300-1-2.500s.6-1.800.9-2c.2-.2.500-.3.700-.3h.5c.2 0 .4 0 .5.500l.7 1.800c.1.200.1.300 0 .5l-.4.500-.3.300c-.1.100-.3.300-.1.500.2.300.8 1.200 1.600 1.900 1.100.9 1.900 1.200 2.200 1.300.3.100.4.100.5-.1l.7-.9c.2-.2.400-.2.600-.1l1.700.8c.3.100.4.200.5.300.1.200.1.700-.2 1.300Z"/></svg><i class="ugc-wa__live"></i></span>
  <span class="ugc-wa__tx"><b>Chat WhatsApp</b><small>Online, balas kurang dari 1 jam</small></span>
</a>

{{-- AI CHATBOT --}}
<div class="ugc-bot">
  <section class="ugc-chat" id="ugc-chat" role="dialog" aria-label="Asisten FAQ paket dan kolaborasi" hidden>
    <header class="ugc-chat__h"><span class="ugc-avatar"></span><div><strong>Sorot Assistant</strong><small><i class="ugc-on"></i>Online, jawab instan</small></div><button type="button" class="ugc-x" data-bot-close aria-label="Tutup chatbot">×</button></header>
    <div class="ugc-chat__log" aria-live="polite"></div>
    <div class="ugc-chat__chips"></div>
    <form class="ugc-chat__in" autocomplete="off"><input type="text" placeholder="Tanya soal paket atau kolaborasi" aria-label="Pesan Anda" maxlength="200"><button type="submit">Kirim</button></form>
  </section>
  <button type="button" class="ugc-fab" data-bot-open aria-expanded="false" aria-controls="ugc-chat" aria-label="Buka AI chatbot">
    <svg class="ugc-lens" viewBox="0 0 64 64" aria-hidden="true"><defs><linearGradient id="ugcg" x1="0" y1="0" x2="1" y2="1"><stop offset="0" stop-color="#8A63FF"/><stop offset="1" stop-color="#FF4D8D"/></linearGradient></defs><circle cx="32" cy="32" r="30" fill="#0B0A16" stroke="url(#ugcg)" stroke-width="2.5"/><g class="ugc-blades" fill="url(#ugcg)" opacity=".92"><path d="M32 9l9 15-9-2z"/><path d="M32 9l9 15-9-2z" transform="rotate(60 32 32)"/><path d="M32 9l9 15-9-2z" transform="rotate(120 32 32)"/><path d="M32 9l9 15-9-2z" transform="rotate(180 32 32)"/><path d="M32 9l9 15-9-2z" transform="rotate(240 32 32)"/><path d="M32 9l9 15-9-2z" transform="rotate(300 32 32)"/></g><circle class="ugc-core" cx="32" cy="32" r="7" fill="#5CE1FF"/><path d="M17 21a18 18 0 0 1 14-9" stroke="#fff" stroke-opacity=".55" stroke-width="2" fill="none" stroke-linecap="round"/></svg>
    <span class="ugc-fab__tip">Tanya paket</span>
  </button>
</div>

<script type="application/json" id="ugc-data">@json($d['faq'])</script>
<script src="{{ asset('js/website-bisnis/template/photography-creative-studio/futuristic/ugc-content-creator-studio-dark-mode/ugc-content-creator-studio.js') }}"></script>
</body>
</html>
