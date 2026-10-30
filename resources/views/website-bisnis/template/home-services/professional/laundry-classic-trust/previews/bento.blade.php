{{-- Grid beranda mengikuti desain UI: 3 baris di kiri + kolom chatbot di kanan --}}
<div class="lw-wrap home">
    <div class="home__main">
        <div class="hrow hrow--1">
            @include("{$T}.previews.services")
            @include("{$T}.previews.prices")
        </div>
        <div class="hrow hrow--2">
            @include("{$T}.previews.options")
            @include("{$T}.previews.turnaround")
            @include("{$T}.previews.coverage")
        </div>
        <div class="hrow hrow--3">
            @include("{$T}.previews.instructions")
            @include("{$T}.previews.hours")
            @include("{$T}.previews.inquiry")
        </div>
    </div>
    <aside class="home__side" aria-label="Asisten FreshBot">
        @include("{$T}.previews.chat-intro")
        @include("{$T}.previews.chat-faq")
    </aside>
</div>
