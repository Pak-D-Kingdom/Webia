@php
    $tr   = $site['tracking'];
    $rp   = $site['route_prefix'];
    $full = $full ?? false;
    $uid  = $full ? 'full' : 'mini';
@endphp
<div class="lc-block lc-track{{ $full ? ' lc-track--full' : '' }}" data-lc-track data-endpoint="{{ $tr['endpoint'] }}">
    @unless ($full)
        <h2 class="lc-block__title lc-block__title--dark"><a href="{{ route($rp . 'tracking') }}">{{ $tr['title'] }}</a></h2>
        <p class="lc-block__sub lc-block__sub--dark">{{ $tr['subtitle'] }}</p>
    @endunless

    <form class="lc-track__form" data-lc-track-form novalidate>
        <label class="lc-sr" for="lc-awb-{{ $uid }}">Nomor resi atau tracking</label>
        <input id="lc-awb-{{ $uid }}" type="text" name="awb" maxlength="40" placeholder="{{ $tr['placeholder'] }}" autocomplete="off" data-lc-awb>
        <button class="lc-btn lc-btn--navy" type="submit">
            <svg class="lc-ico" aria-hidden="true"><use href="#lc-i-search"></use></svg>
            {{ $tr['button'] }}
            <svg class="lc-ico" aria-hidden="true"><use href="#lc-i-arrow"></use></svg>
        </button>
    </form>
    <p class="lc-track__msg" role="status" aria-live="polite" data-lc-track-msg></p>

    <ol class="lc-track__steps" data-lc-track-steps>
        @foreach ($tr['statuses'] as $i => $st)
            <li class="lc-tstep" data-lc-tstep="{{ $i }}">
                <span class="lc-tstep__dot" aria-hidden="true"><svg class="lc-ico"><use href="#lc-i-{{ $st['icon'] }}"></use></svg></span>
                <span class="lc-tstep__lbl">{{ $st['label'] }}</span>
            </li>
        @endforeach
    </ol>

    @if ($full)
        <p class="lc-track__note">Tampilan pelacakan ini memakai data contoh sampai tersambung ke sistem tracking. Hubungkan endpoint pada <code>tracking.endpoint</code> di file konfigurasi untuk menampilkan data pengiriman yang sebenarnya.</p>
    @endif
</div>
