@php $c = $z['certifications']; @endphp
<article class="ot-card" id="sertifikasi">
    <header class="ot-card__head">
        <div><h2>{{ $c['title'] }}</h2><p>{{ $c['subtitle'] }}</p></div>
    </header>
    <ul class="ot-certs">
        @foreach ($c['items'] as $i)
            <li class="ot-cert">
                @if ($i['badge'] === 'iso')
                    <span class="ot-cert__badge ot-cert__badge--iso" aria-hidden="true"><b>ISO</b></span>
                @else
                    <span class="ot-cert__badge ot-cert__badge--partner" aria-hidden="true"><svg class="ot-ic" aria-hidden="true"><use href="#i-qr"/></svg></span>
                @endif
                <strong>{{ $i['title'] }}</strong><small>{{ $i['text'] }}</small>
            </li>
        @endforeach
    </ul>
</article>
