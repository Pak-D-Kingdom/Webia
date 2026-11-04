@php $c = $fd['contact']; @endphp
<div class="fd-topbar">
    <div class="fd-wrap fd-topbar__in">
        <div class="fd-topbar__info">
            <a href="#kontak"><svg class="fd-ico"><use href="#fd-i-pin"/></svg><span>{{ $c['address'] }}</span></a>
            <a href="{{ $c['phone_href'] }}"><svg class="fd-ico"><use href="#fd-i-phone"/></svg><span>{{ $c['phone'] }}</span></a>
            <a href="mailto:{{ $c['email'] }}"><svg class="fd-ico"><use href="#fd-i-mail"/></svg><span>{{ $c['email'] }}</span></a>
        </div>
        <div class="fd-topbar__right">
            <div class="fd-topbar__social">
                @foreach ($fd['social'] as $s)
                    <a href="{{ $s['url'] }}" aria-label="{{ $s['label'] }}" @if($s['url'] !== '#') target="_blank" rel="noopener" @endif><svg class="fd-ico"><use href="#fd-i-{{ $s['key'] }}"/></svg></a>
                @endforeach
            </div>
            <span class="fd-topbar__sep"></span>
            <div class="fd-drop" data-fd-drop>
                <button type="button" class="fd-drop__btn" aria-expanded="false" aria-haspopup="true">
                    <svg class="fd-ico" style="color:var(--fd-gold)"><use href="#fd-i-heart"/></svg><span>Donasi Sekarang</span><svg class="fd-ico"><use href="#fd-i-chevron"/></svg>
                </button>
                <div class="fd-drop__menu">
                    @foreach ($fd['donation']['options'] as $o)
                        <a href="{{ route('foundation-classic-trust.donation', ['jenis' => $o['key']]) }}">{{ $o['title'] }} <small style="margin-left:6px;opacity:.6">{{ $o['sub'] }}</small></a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
