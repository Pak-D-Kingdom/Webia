@php $c = $fd['contact']; @endphp
<div class="fd-topbar">
    <div class="fd-wrap fd-topbar__in">
        <div class="fd-topbar__info">
            <a href="#kontak" class="fd-topbar__addr"><svg class="fd-ico"><use href="#fd-i-pin"/></svg><span>{{ $c['address'] }}</span></a>
            <a href="{{ $c['phone_href'] }}"><svg class="fd-ico"><use href="#fd-i-phone"/></svg><span>{{ $c['phone'] }}</span></a>
            <a href="mailto:{{ $c['email'] }}" class="fd-topbar__mail"><svg class="fd-ico"><use href="#fd-i-mail"/></svg><span>{{ $c['email'] }}</span></a>
        </div>
        <div class="fd-topbar__right">
            <div class="fd-topbar__social">
                @foreach ($fd['social'] as $s)
                    <a href="{{ $s['url'] }}" aria-label="{{ $s['label'] }}" @if($s['url'] !== '#') target="_blank" rel="noopener" @endif><svg class="fd-ico"><use href="#fd-i-{{ $s['key'] }}"/></svg></a>
                @endforeach
            </div>
            <span class="fd-topbar__sep"></span>
            <div class="fd-drop" data-fd-drop>
                <button type="button" class="fd-drop__btn" aria-expanded="false" aria-haspopup="true" aria-controls="fd-dropmenu">
                    <svg class="fd-ico fd-ico--fill fd-drop__heart"><use href="#fd-i-heart"/></svg><span>Donasi Sekarang</span><svg class="fd-ico fd-drop__chev"><use href="#fd-i-chevron"/></svg>
                </button>
                <div class="fd-drop__menu" id="fd-dropmenu" role="menu">
                    <p class="fd-drop__title">Pilih cara berdonasi</p>
                    @foreach ($fd['donation']['options'] as $o)
                        <a role="menuitem" href="{{ route('foundation-classic-trust.donation', ['jenis' => $o['key']]) }}">
                            <img src="{{ $i($o['icon']) }}" alt="" width="40" height="40">
                            <span><b>{{ $o['title'] }}</b><small>{{ $o['sub'] }}</small></span>
                            <svg class="fd-ico"><use href="#fd-i-arrow"/></svg>
                        </a>
                    @endforeach
                    <a class="fd-drop__all" role="menuitem" href="{{ $r('donation') }}">Lihat semua pilihan donasi <svg class="fd-ico"><use href="#fd-i-arrow"/></svg></a>
                </div>
            </div>
        </div>
    </div>
</div>
