{{-- Topbar: info kontak, status buka/tutup (live), pesan bergilir, dan sosial media. --}}
<div class="hr-topbar" data-topbar>
    <div class="hr-container hr-topbar__inner">
        <ul class="hr-topbar__info">
            <li class="hr-tb hr-tb--addr">
                <a href="{{ $cfg['site']['maps_url'] }}" target="_blank" rel="noopener noreferrer" title="Buka lokasi di Google Maps">
                    <span class="hr-tb__ico">{{ $i('pin') }}</span><span class="hr-tb__txt">{{ $cfg['site']['address'] }}</span>
                </a>
            </li>
            <li class="hr-tb hr-tb--phone">
                <a href="{{ $cfg['site']['phone_href'] }}" title="Telepon kami">
                    <span class="hr-tb__ico">{{ $i('phone') }}</span><span class="hr-tb__txt">{{ $cfg['site']['phone'] }}</span>
                </a>
            </li>
            <li class="hr-tb hr-tb--mail">
                <a href="mailto:{{ $cfg['site']['email'] }}" title="Kirim email">
                    <span class="hr-tb__ico">{{ $i('mail') }}</span><span class="hr-tb__txt">{{ $cfg['site']['email'] }}</span>
                </a>
            </li>
        </ul>

        <div class="hr-topbar__promo" data-promos>
            @foreach ($cfg['promos'] as $promo)
                @if (! empty($promo['chat']))
                    <button type="button" class="hr-promo {{ $loop->first ? 'is-on' : '' }}" data-chat-ask="{{ $promo['chat'] }}" tabindex="{{ $loop->first ? '0' : '-1' }}">
                        <span class="hr-promo__ico">{{ $i($promo['icon']) }}</span><span class="hr-promo__txt">{{ $promo['text'] }}</span><b>{{ $promo['cta'] }} {{ $i('arrow') }}</b>
                    </button>
                @else
                    <a class="hr-promo {{ $loop->first ? 'is-on' : '' }}" href="{{ $go($promo['route']) }}" tabindex="{{ $loop->first ? '0' : '-1' }}">
                        <span class="hr-promo__ico">{{ $i($promo['icon']) }}</span><span class="hr-promo__txt">{{ $promo['text'] }}</span><b>{{ $promo['cta'] }} {{ $i('arrow') }}</b>
                    </a>
                @endif
            @endforeach
        </div>

        <div class="hr-topbar__end">
            <span class="hr-status" data-open-status title="{{ $cfg['site']['hours'] }}">
                <i class="hr-live" aria-hidden="true"></i><span data-open-text>{{ $cfg['site']['hours'] }}</span>
            </span>
            <ul class="hr-social hr-social--top">
                @foreach ($cfg['social'] as $s)
                    <li><a href="{{ $s['url'] }}" target="_blank" rel="noopener noreferrer" aria-label="{{ $s['label'] }}" title="{{ $s['label'] }}">{{ $i($s['icon']) }}</a></li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
