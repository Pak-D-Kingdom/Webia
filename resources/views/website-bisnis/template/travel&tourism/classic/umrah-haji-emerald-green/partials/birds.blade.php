<span class="uh-birds" aria-hidden="true">
    @foreach ([[0, 34, 14, 1], [4, 30, 22, 0.75], [8, 38, 10, 1.1], [13, 42, 27, 0.6], [18, 36, 17, 0.85]] as $b)
        <span class="uh-bird" style="--d: {{ $b[0] }}s; --t: {{ $b[1] }}s; --y: {{ $b[2] }}%; --s: {{ $b[3] }}">
            <svg viewBox="0 0 24 12"><g class="uh-bird__wings"><path d="M1 6C5 1 9 1 12 6C15 1 19 1 23 6"/></g></svg>
        </span>
    @endforeach
</span>
