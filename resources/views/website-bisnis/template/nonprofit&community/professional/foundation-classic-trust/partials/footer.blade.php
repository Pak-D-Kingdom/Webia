@php $c = $fd['contact']; @endphp
<footer class="fd-footer">
    <div class="fd-wrap fd-footer__in">
        <div>
            <a class="fd-brand" href="{{ $r('index') }}">
                <img src="{{ $i('logo-footer.png') }}" alt="" width="52" height="52">
                <span><strong style="font-size:17px">{{ $fd['brand']['name'] }}</strong><em style="font-size:16px">{{ $fd['brand']['suffix'] }}</em></span>
            </a>
            <p class="fd-footer__copy">{{ $fd['brand']['copyright'] }}</p>
        </div>
        @foreach ($fd['footer_nav'] as $title => $items)
            <div>
                <h4>{{ $title }}</h4>
                <ul>
                    @foreach ($items as $it)
                        <li><a href="{{ $r($it[1]) }}">{{ $it[0] }}</a></li>
                    @endforeach
                </ul>
            </div>
        @endforeach
        <div id="kontak">
            <h4>Kontak Kami</h4>
            <ul class="fd-contact">
                <li><svg class="fd-ico"><use href="#fd-i-pin"/></svg><span>{{ $c['address'] }}</span></li>
                <li><svg class="fd-ico"><use href="#fd-i-phone"/></svg><a href="{{ $c['phone_href'] }}">{{ $c['phone'] }}</a></li>
                <li><svg class="fd-ico"><use href="#fd-i-mail"/></svg><a href="mailto:{{ $c['email'] }}">{{ $c['email'] }}</a></li>
            </ul>
            <div class="fd-footer__social">
                @foreach ($fd['social'] as $s)
                    <a href="{{ $s['url'] }}" aria-label="{{ $s['label'] }}" @if($s['url'] !== '#') target="_blank" rel="noopener" @endif><svg class="fd-ico"><use href="#fd-i-{{ $s['key'] }}"/></svg></a>
                @endforeach
            </div>
        </div>
        <div class="fd-footer__dl">
            <div>
                <h4>Download Profile</h4>
                <a class="fd-dlbtn" href="{{ $i('profile-harapan-untuk-negeri.pdf') }}" download><svg class="fd-ico"><use href="#fd-i-download"/></svg>Download PDF</a>
            </div>
            <div class="fd-legal">
                <a href="#" data-fd-toast="Halaman Kebijakan Privasi akan segera tersedia.">Kebijakan Privasi</a><i></i>
                <a href="#" data-fd-toast="Halaman Syarat & Ketentuan akan segera tersedia.">Syarat & Ketentuan</a>
            </div>
        </div>
    </div>
    <div class="fd-credit">{{ $fd['brand']['credit'] }}</div>
</footer>
