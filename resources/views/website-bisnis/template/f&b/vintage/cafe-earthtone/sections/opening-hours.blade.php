@php $o = $cafe['hours']; @endphp
<article class="kl-panel kl-hours" id="jam-operasional" aria-labelledby="kl-hours-title">
    <h2 class="kl-panel__title kl-panel__title--icon" id="kl-hours-title">
        <svg class="kl-icon" aria-hidden="true"><use href="#kl-i-clock"/></svg>
        <span>{{ $o['title'] }}</span>
    </h2>
    <dl class="kl-hours__list">
        @foreach ($o['rows'] as $row)
            <div class="kl-hours__row">
                <dt>{{ $row['day'] }}</dt>
                <dd>{{ $row['time'] }}</dd>
            </div>
        @endforeach
    </dl>
    <img class="kl-panel__art kl-panel__art--grinder" src="{{ $img('grinder.png') }}" alt="" aria-hidden="true" width="150" height="249" loading="lazy">
</article>
