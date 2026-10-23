<a href="{{ config('webia.dkreasi_url') ?: '#' }}" class="webia-portal" aria-label="Kembali ke D-KREASI Homebase"
    @if (config('webia.dkreasi_url')) target="_blank" rel="noopener noreferrer" @endif>
    <span class="webia-portal-icon" aria-hidden="true">
        <img
            src="{{ asset('images/website-bisnis/galaksi3.png') }}"
            alt=""
        >
    </span>

    <span class="webia-portal-copy">
        <strong>Portal D-KREASI</strong>
        <small>Jelajahi semesta kreasi ↗</small>
    </span>
</a>