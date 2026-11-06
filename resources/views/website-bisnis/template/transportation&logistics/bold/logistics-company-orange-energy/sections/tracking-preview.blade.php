@php $t = $site['tracking']; $stageIcons = ['box', 'clipboard', 'truck', 'check']; @endphp
<article class="lg-trk">
    <h2 class="lg-panel__title"><a href="{{ $to('tracking') }}">{{ $t['title'] }}</a></h2>
    <p class="lg-panel__text">{{ $t['text'] }}</p>
    <form class="lg-trk__form" action="{{ $to('tracking') }}" method="get">
        <label class="lg-sr" for="lg-trk-home">Nomor resi</label>
        <input id="lg-trk-home" name="resi" type="text" placeholder="{{ $t['placeholder'] }}" autocomplete="off" required>
        <button class="lg-btn lg-btn--primary lg-btn--sm" type="submit">Lacak<svg class="lg-ic" aria-hidden="true"><use href="#i-arrow-right"></use></svg></button>
    </form>
    <ol class="lg-trk__stages">
        @foreach ($t['stages'] as $i => $st)
            <li>
                <span><svg class="lg-ic" aria-hidden="true"><use href="#i-{{ $stageIcons[$i] }}"></use></svg></span>
                <small>{{ $st }}</small>
            </li>
        @endforeach
    </ol>
</article>
