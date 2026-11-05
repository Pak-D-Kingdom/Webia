{{-- Variabel: $ph_title, $ph_lead, $ph_icon (opsional) --}}
<section class="phero">
    <div class="phero__bg" aria-hidden="true"></div>
    <div class="container phero__in">
        <nav class="crumb" aria-label="Breadcrumb">
            <ol>
                <li><a href="{{ route('agribisnis-classic-trust.home') }}">Beranda</a></li>
                <li aria-current="page">{{ $ph_title }}</li>
            </ol>
        </nav>
        <div class="phero__row">
            @isset($ph_icon)
                <span class="phero__ico" aria-hidden="true"><svg class="i"><use href="#i-{{ $ph_icon }}"/></svg></span>
            @endisset
            <div>
                <h1 class="phero__title">{{ $ph_title }}</h1>
                <p class="phero__lead">{{ $ph_lead }}</p>
            </div>
        </div>
    </div>
</section>
