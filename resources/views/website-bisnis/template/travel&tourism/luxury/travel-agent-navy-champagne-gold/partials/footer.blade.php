{{-- Footer: logo, menu, sosial media, kredit --}}
<footer class="ga-footer">
    <svg class="ga-footer__leaf ga-footer__leaf--l" viewBox="0 0 120 140" aria-hidden="true" focusable="false"><g fill="none" stroke="currentColor" stroke-width="1.1" stroke-linecap="round"><path d="M10 138C20 96 40 60 80 20"/><path d="M26 108c-10-2-18-8-22-18 12 0 20 6 22 18zM38 84c-8-4-14-12-14-22 10 4 16 12 14 22zM52 62c-5-7-6-16-2-24 8 6 9 15 2 24zM34 100c10-4 20-3 28 3-8 6-20 6-28-3zM48 78c9-3 18-1 25 6-9 5-19 4-25-6zM64 54c8-3 15-1 21 5-8 4-16 3-21-5z"/></g></svg>
    <svg class="ga-footer__leaf ga-footer__leaf--r" viewBox="0 0 120 140" aria-hidden="true" focusable="false"><g fill="none" stroke="currentColor" stroke-width="1.1" stroke-linecap="round"><path d="M10 138C20 96 40 60 80 20"/><path d="M26 108c-10-2-18-8-22-18 12 0 20 6 22 18zM38 84c-8-4-14-12-14-22 10 4 16 12 14 22zM52 62c-5-7-6-16-2-24 8 6 9 15 2 24zM34 100c10-4 20-3 28 3-8 6-20 6-28-3zM48 78c9-3 18-1 25 6-9 5-19 4-25-6zM64 54c8-3 15-1 21 5-8 4-16 3-21-5z"/></g></svg>

    <div class="ga-container">
        <div class="ga-footer__top">
            <a class="ga-logo ga-logo--light" href="{{ $url() }}" aria-label="{{ $brand['name'] }} — beranda">
                <svg class="ga-logo__mark" viewBox="0 0 48 48" aria-hidden="true" focusable="false">
                    <g fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M24 7c4 5 5 11 0 19-5-8-4-14 0-19z"/><path d="M24 26c-2-6-8-9-14-8 1 7 6 12 14 12"/><path d="M24 26c2-6 8-9 14-8-1 7-6 12-14 12"/><path d="M13 36c3 2 6 3 11 3s8-1 11-3"/>
                    </g>
                </svg>
                <span class="ga-logo__text"><strong>{{ $brand['name'] }}</strong><small>{{ $brand['tagline'] }}</small></span>
            </a>

            <nav class="ga-footer__nav" aria-label="Navigasi footer">
                <ul>
                    @foreach ($t['nav'] as $item)
                        <li><a href="{{ $url($item['path']) }}">{{ $item['label'] }}</a></li>
                    @endforeach
                    <li><a href="{{ $url('inquiry') }}">Booking Inquiry</a></li>
                    <li><a href="{{ $url('faq') }}">FAQ</a></li>
                </ul>
            </nav>

            <ul class="ga-footer__social" aria-label="Media sosial">
                @foreach ($t['footer']['social'] as $s)
                    <li><a href="{{ $s['url'] }}" aria-label="{{ $s['label'] }}" target="_blank" rel="noopener noreferrer">{!! $icon($s['key']) !!}</a></li>
                @endforeach
            </ul>
        </div>

        <p class="ga-footer__credit">{{ $brand['credit'] }}</p>
    </div>
</footer>
