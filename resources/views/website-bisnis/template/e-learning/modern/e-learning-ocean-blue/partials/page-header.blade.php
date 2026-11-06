{{-- Header halaman dalam. Param: $key (kunci di config 'pages'), $art (opsional: gambar bulat di kanan) --}}
@php $pg = $e['pages'][$key]; @endphp
<section class="el-pagehead {{ isset($art) ? 'el-pagehead--art' : '' }}">
    @isset($art)
        <img class="el-pagehead__art" src="{{ $img($art) }}" alt="" width="190" height="190" loading="eager">
    @else
        <img class="el-pagehead__img" src="{{ $img('cta-books.jpg') }}" alt="" loading="eager" width="927" height="264">
    @endisset
    <div class="el-container el-pagehead__inner">
        <nav class="el-crumb" aria-label="Breadcrumb">
            <a href="{{ route('elearning.home') }}">Home</a><span aria-hidden="true">/</span><span aria-current="page">{{ $pg['title'] }}</span>
        </nav>
        <h1>{{ $pg['title'] }}</h1>
        <p>{{ $pg['sub'] }}</p>
    </div>
</section>
