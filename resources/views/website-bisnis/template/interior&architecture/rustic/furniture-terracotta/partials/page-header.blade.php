<section class="rf-pagehead">
    <div class="rf-container">
        <nav class="rf-crumb" aria-label="Breadcrumb">
            <a href="{{ $r('index') }}">Beranda</a>{!! $icon('chevron-right') !!}<span>{{ $title }}</span>
        </nav>
        <p class="rf-eyebrow">{{ $eyebrow ?? 'RusticFurni' }}</p>
        <h1>{{ $title }}</h1>
        @isset($lead)<p class="rf-pagehead__lead">{{ $lead }}</p>@endisset
    </div>
</section>
