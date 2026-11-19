{{-- Beranda: hero + preview semua bagian (tiap bagian punya halaman sendiri). --}}
<div class="fh-home">
    <div class="fh-herowrap">
        @include($v('sections.hero'))
    </div>

    <div class="fh-wrap fh-home__grid">
        @include($v('sections.chatbot-preview'))
        <div class="fh-row fh-row--a">
            @include($v('sections.mission-vision'))
            @include($v('sections.programs'))
            @include($v('sections.impact'))
        </div>
        <div class="fh-row fh-row--b">
            @include($v('sections.donation'))
            @include($v('sections.finance'))
            @include($v('sections.partners'))
        </div>
        <div class="fh-row fh-row--c">
            @include($v('sections.volunteer'))
            @include($v('sections.news'))
            @include($v('sections.quote'))
        </div>
    </div>
</div>
