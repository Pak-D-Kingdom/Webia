{{-- TENTANG KAMI: Sertifikasi dan Klien --}}
<div class="cp-panels cp-panels--duo">
    <div class="cp-container cp-panels__grid">
        @unless (isset($pageUrl))
            @include($ns . '.partials.panel-certs')
            @include($ns . '.partials.panel-clients')
        @endunless
    </div>
</div>
