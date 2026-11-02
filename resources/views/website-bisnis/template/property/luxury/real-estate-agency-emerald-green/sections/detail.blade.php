{{-- ===================== HALAMAN DETAIL PROPERTI: susunan 6 bagian + kartu samping ===================== --}}
<div class="rea-container rea-detail">
    <div class="rea-detail__main">
        @include($v . '.sections.detail-gallery')
        @include($v . '.sections.detail-overview')
        @include($v . '.sections.detail-specification')
        @include($v . '.sections.detail-facilities')
        @include($v . '.sections.detail-description')
        @include($v . '.sections.detail-location')
    </div>

    <aside class="rea-detail__aside" aria-label="Quick actions">
        @include($v . '.partials.detail-aside')
    </aside>
</div>
