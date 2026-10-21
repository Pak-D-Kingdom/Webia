{{-- Header halaman dalam. Param: $key (kunci di config 'pages') --}}
@php $pg = $e['pages'][$key]; @endphp
<section class="el-pagehead">
    <img class="el-pagehead__img" src="{{ $img('cta-books.jpg') }}" alt="" loading="eager" width="927" height="264">
    <div class="el-container el-pagehead__inner">
        <nav class="el-crumb" aria-label="Breadcrumb">
            <a href="{{ route('elearning.home') }}">Home</a><span aria-hidden="true">/</span><span aria-current="page">{{ $pg['title'] }}</span>
        </nav>
        <h1>{{ $pg['title'] }}</h1>
        <p>{{ $pg['sub'] }}</p>
    </div>
</section>
