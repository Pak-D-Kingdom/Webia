@php $p = $c['certifications']; @endphp
<section id="sertifikasi" class="cp-card" aria-labelledby="cp-cert-t">
    <header class="cp-card__head">
        <div><h2 id="cp-cert-t">{{ $p['title'] }}</h2><p>{{ $p['desc'] }}</p></div>
    </header>
    <ul class="cp-certs">
        @foreach ($p['items'] as $i)
            <li>
                <span class="cp-seal">{{ $i['badge'] }}</span>
                <strong>{{ $i['t'] }}</strong><small>{{ $i['c'] }}</small>
            </li>
        @endforeach
    </ul>
</section>
