{{-- Topbar: info kontak singkat di atas navbar --}}
<div class="gl-topbar">
    <div class="gl-container gl-topbar__inner">
        <ul class="gl-topbar__list">
            <li>
                <a href="tel:{{ preg_replace('/\s+/', '', $clinic['contact']['phone']) }}">
                    <svg class="gl-ic" aria-hidden="true"><use href="#gl-i-phone"/></svg>
                    <span>{{ $clinic['contact']['phone'] }}</span>
                </a>
            </li>
            <li class="gl-topbar__hide-sm">
                <a href="mailto:{{ $clinic['contact']['email'] }}">
                    <svg class="gl-ic" aria-hidden="true"><use href="#gl-i-mail"/></svg>
                    <span>{{ $clinic['contact']['email'] }}</span>
                </a>
            </li>
            <li class="gl-topbar__hide-xs">
                <span>
                    <svg class="gl-ic" aria-hidden="true"><use href="#gl-i-clock"/></svg>
                    <span>{{ $clinic['contact']['hours_short'] }}</span>
                </span>
            </li>
        </ul>

        <ul class="gl-topbar__social" aria-label="Media sosial">
            @foreach ($clinic['social'] as $s)
                <li>
                    <a href="{{ $s['url'] }}" target="_blank" rel="noopener noreferrer" aria-label="{{ $s['label'] }}">
                        <svg class="gl-ic" aria-hidden="true"><use href="#gl-i-{{ $s['icon'] }}"/></svg>
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
</div>
