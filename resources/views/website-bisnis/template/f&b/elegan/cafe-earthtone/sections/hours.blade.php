@php($h = $cafe['hours'])
<article class="lm-card lm-hours" id="jam">
    <p class="lm-eyebrow">{{ $h['eyebrow'] }}</p>
    <h2 class="lm-card__title">{{ $h['title'] }}</h2>
    <table class="lm-hours__table">
        <tbody>
            @foreach ($h['rows'] as $row)
                <tr data-days="{{ implode(',', $row['days']) }}">
                    <th scope="row"><svg class="i" aria-hidden="true"><use href="#i-clock"/></svg>{{ $row['day'] }}</th>
                    <td>{{ $row['time'] }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</article>
