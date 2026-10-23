{{-- TOPBAR: alamat, email, jam kerja, sosial media, telepon (tanpa menu navigasi) --}}
<div class="cp-topbar">
    <div class="cp-container cp-topbar__inner">
        <ul class="cp-topbar__info">
            <li class="cp-topbar__item cp-show-sm">{!! $icon('pin') !!}<span>{{ $company['address'] }}</span></li>
            <li class="cp-topbar__item cp-show-md">{!! $icon('mail') !!}<a href="mailto:{{ $company['email'] }}">{{ $company['email'] }}</a></li>
            <li class="cp-topbar__item cp-show-lg">{!! $icon('clock') !!}<span>{{ $company['hours'] }}</span></li>
        </ul>

        <div class="cp-topbar__side">
            <ul class="cp-social">
                @foreach ($social as $item)
                    <li><a class="cp-social__link" href="{{ $item['url'] }}" aria-label="{{ $item['label'] }}">{!! $icon($item['icon']) !!}</a></li>
                @endforeach
            </ul>
            <a class="cp-topbar__phone" href="tel:{{ $company['phone_href'] }}">{!! $icon('phone') !!}<span>{{ $company['phone'] }}</span></a>
        </div>
    </div>
</div>
