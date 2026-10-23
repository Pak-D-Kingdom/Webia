<footer class="el-footer">
    <svg class="el-footer__wave el-footer__wave--l" viewBox="0 0 400 300" aria-hidden="true" focusable="false"><path d="M0 40C90 10 150 80 200 150s-10 120-200 150z"/><path class="is-light" d="M0 110C60 100 110 150 120 210s-40 70-120 90z"/></svg>
    <svg class="el-footer__wave el-footer__wave--r" viewBox="0 0 400 300" aria-hidden="true" focusable="false"><path d="M400 20C310 50 250 120 230 190s60 90 170 110z"/><path class="is-light" d="M400 120c-50 10-95 60-100 110s30 60 100 70z"/></svg>

    <div class="el-container el-footer__grid">
        <div class="el-footer__brand">
            <a class="el-brand el-brand--light" href="{{ route('elearning.home') }}" aria-label="{{ $e['brand']['name'] }} — beranda">
                <img src="{{ $img('logo-mark-light.png') }}" alt="" width="52" height="46" loading="lazy">
                <span class="el-brand__text"><strong>{{ $e['brand']['name'] }}</strong><small>{{ $e['brand']['tagline'] }}</small></span>
            </a>
        </div>

        @foreach ($e['footer'] as $heading => $links)
            <nav class="el-footer__col" aria-label="{{ $heading }}">
                <h2>{{ $heading }}</h2>
                <ul>
                    @foreach ($links as $l)
                        @php
                            $act  = $l['action'] ?? null;
                            $href = $act === 'mailto' ? 'mailto:'.$e['contact']['email'] : ($l['route'] ? route($l['route']) : '#');
                        @endphp
                        <li><a href="{{ $href }}" @if ($act === 'chat') data-open-chat @endif>{{ $l['label'] }}</a></li>
                    @endforeach
                </ul>
            </nav>
        @endforeach

        <div class="el-footer__col">
            <h2>Ikuti Kami</h2>
            <ul class="el-social el-social--footer">
                @foreach ($e['social'] as $s)
                    <li><a href="{{ $s['url'] }}" aria-label="{{ $s['label'] }}" rel="noopener"><svg class="el-ico" aria-hidden="true"><use href="#i-{{ $s['key'] }}"/></svg></a></li>
                @endforeach
            </ul>
        </div>
    </div>

    <div class="el-footer__bottom">
        <div class="el-container">
            <p>{{ $e['brand']['credit'] }}</p>
        </div>
    </div>
</footer>
