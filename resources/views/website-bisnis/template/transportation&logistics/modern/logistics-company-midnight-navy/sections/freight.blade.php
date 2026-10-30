@php
    $fr   = $site['freight'];
    $rp   = $site['route_prefix'];
    $img  = fn ($f) => asset($site['paths']['images'] . $f);
    $full = $full ?? false;
@endphp
@if (! $full)
    <div class="lc-block lc-freight">
        <h2 class="lc-block__title"><a href="{{ route($rp . 'freight') }}">{{ $fr['title'] }}</a></h2>
        <p class="lc-block__sub">{{ $fr['subtitle'] }}</p>
        <ul class="lc-fr">
            @foreach ($fr['items'] as $it)
                <li>
                    <a class="lc-fr__card" href="{{ route($rp . 'freight') }}">
                        <img class="lc-fr__img" src="{{ $img($it['image']) }}" alt="Pengiriman {{ strtolower($it['title']) }}" loading="lazy" width="468" height="320">
                        <span class="lc-fr__body">
                            <span class="lc-fr__txt"><strong>{{ $it['title'] }}</strong><small>{{ $it['tagline'] }}</small></span>
                            <span class="lc-fr__go" aria-hidden="true"><svg class="lc-ico"><use href="#lc-i-arrow"></use></svg></span>
                        </span>
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
@else
    <ul class="lc-frfull">
        @foreach ($fr['items'] as $it)
            <li class="lc-frfull__card">
                <img src="{{ $img($it['image']) }}" alt="Pengiriman {{ strtolower($it['title']) }}" loading="lazy" width="468" height="320">
                <div class="lc-frfull__body">
                    <h2>Freight {{ $it['title'] }}</h2>
                    <p class="lc-frfull__tag">{{ $it['tagline'] }}</p>
                    <p>{{ $it['desc'] }}</p>
                    <ul class="lc-ticks lc-ticks--light">
                        @foreach ($it['points'] as $pt)
                            <li><svg class="lc-ico" aria-hidden="true"><use href="#lc-i-check"></use></svg>{{ $pt }}</li>
                        @endforeach
                    </ul>
                    <a class="lc-btn lc-btn--primary lc-btn--sm" href="{{ route($rp . 'quotation') }}">Minta penawaran
                        <svg class="lc-ico" aria-hidden="true"><use href="#lc-i-arrow"></use></svg>
                    </a>
                </div>
            </li>
        @endforeach
    </ul>

    <div class="lc-compare">
        <h2 class="lc-compare__title">Perbandingan moda pengiriman</h2>
        <div class="lc-compare__scroll" tabindex="0" role="region" aria-label="Tabel perbandingan moda pengiriman">
            <table>
                <thead>
                    <tr>@foreach ($fr['compare']['head'] as $th)<th scope="col">{{ $th }}</th>@endforeach</tr>
                </thead>
                <tbody>
                    @foreach ($fr['compare']['rows'] as $row)
                        <tr>
                            @foreach ($row as $i => $td)
                                @if ($i === 0)<th scope="row">{{ $td }}</th>@else<td>{{ $td }}</td>@endif
                            @endforeach
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endif
