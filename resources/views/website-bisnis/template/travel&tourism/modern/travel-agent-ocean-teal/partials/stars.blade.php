<span class="ta-stars" role="img" aria-label="Rating {{ $rating }} dari 5">@for ($i = 1; $i <= 5; $i++){{ $icon('star', 'ta-ic--fill' . ($i <= $rating ? ' is-on' : '')) }}@endfor</span>
