{{-- Topbar: lokasi, telepon, email --}}
<div class="ga-topbar">
    <div class="ga-container ga-topbar__in">
        <ul class="ga-topbar__info">
            <li>{!! $icon('pin') !!}<span>{{ $brand['location'] }}</span></li>
            <li><a href="tel:{{ preg_replace('/[^\d+]/', '', $brand['phone']) }}">{!! $icon('phone') !!}<span>{{ $brand['phone'] }}</span></a></li>
            <li class="ga-topbar__mail"><a href="mailto:{{ $brand['email'] }}">{!! $icon('mail') !!}<span>{{ $brand['email'] }}</span></a></li>
        </ul>
    </div>
</div>
