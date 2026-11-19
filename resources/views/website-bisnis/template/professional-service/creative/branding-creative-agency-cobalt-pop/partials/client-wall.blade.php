{{-- Parameter: $list (daftar klien) --}}
<ul class="bca-wall">
    @foreach($list as $c)
        <li><img src="{{ asset($site['asset_base'] . 'logos/client-' . $c['key'] . '.png') }}" loading="lazy" alt="Logo {{ $c['name'] }}"></li>
    @endforeach
</ul>
