<section class="cp-pagehead">
    <img class="cp-leaf" src="{{ $img('leaf.svg') }}" alt="" aria-hidden="true" onerror="this.remove()">
    <div class="cp-wrap cp-pagehead__in">
        <nav class="cp-crumb" aria-label="Breadcrumb">
            <a href="{{ $home }}">Beranda</a><span aria-hidden="true">/</span><span aria-current="page">{{ $crumb }}</span>
        </nav>
        <h1>{{ $title }}</h1>
        <p>{{ $desc }}</p>
    </div>
</section>
