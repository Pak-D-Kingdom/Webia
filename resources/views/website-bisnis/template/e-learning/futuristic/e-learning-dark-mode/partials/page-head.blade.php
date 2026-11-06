{{-- Variabel: $title, $text, $crumb --}}
<div class="nl-pagehead">
    <div class="nl-container">
        <nav class="nl-crumb" aria-label="Breadcrumb">
            <a href="{{ route($e['route'].'home') }}">Home</a><span aria-hidden="true">/</span><span aria-current="page">{{ $crumb }}</span>
        </nav>
        <h1>{{ $title }}</h1>
        <p>{{ $text }}</p>
    </div>
</div>
