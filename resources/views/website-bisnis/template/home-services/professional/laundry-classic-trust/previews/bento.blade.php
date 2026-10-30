{{-- Grid beranda (mengikuti layout desain UI). Tiap kartu = satu preview. --}}
<div class="lw-wrap">
    <div class="bento">
        @include("{$T}.previews.services")
        @include("{$T}.previews.prices")
        @include("{$T}.previews.chat-intro")
        @include("{$T}.previews.options")
        @include("{$T}.previews.turnaround")
        @include("{$T}.previews.coverage")
        @include("{$T}.previews.chat-faq")
        @include("{$T}.previews.instructions")
        @include("{$T}.previews.hours")
        @include("{$T}.previews.inquiry")
    </div>
</div>
