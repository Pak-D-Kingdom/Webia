<footer class="hda-footer">
    <div class="hda-container hda-footer__grid">
        <div class="hda-footer__brand">
            <a class="hda-logo" href="{{ $hu('home') }}"><img src="{{ $ha('ui/logo-light.svg') }}" alt="" width="52" height="39"><span class="hda-logo__t"><strong>HISTORICAL</strong><small>Document Archive</small></span></a>
            <p>{{ $hda['site']['tagline'] }}</p>
            <ul class="hda-contactlist">
                <li><svg class="hda-icon"><use href="#i-pin"/></svg><span>{{ $hda['site']['address'] }}</span></li>
                <li><svg class="hda-icon"><use href="#i-mail"/></svg><a href="mailto:{{ $hda['site']['email'] }}">{{ $hda['site']['email'] }}</a></li>
            </ul>
        </div>
        <div>
            <h3>Quick Links</h3>
            <ul>@foreach($hda['footer']['quick'] as $f)<li><a href="{{ $hu($f['route']) }}">{{ $f['label'] }}</a></li>@endforeach</ul>
        </div>
        <div>
            <h3>Archive Collections</h3>
            <ul>@foreach($hda['footer']['collections'] as $f)<li><a href="{{ $hu($f['route']) }}">{{ $f['label'] }}</a></li>@endforeach</ul>
        </div>
        <div>
            <h3>Research Resources</h3>
            <ul>@foreach($hda['footer']['resources'] as $f)<li><a href="{{ $hu($f['route']) }}">{{ $f['label'] }}</a></li>@endforeach</ul>
        </div>
        <div>
            <h3>Follow Us</h3>
            <div class="hda-social">
                @foreach($hda['site']['social'] as $so)
                <a href="{{ $so['url'] }}" target="_blank" rel="noopener" aria-label="{{ $so['name'] }}"><svg class="hda-icon"><use href="{{ $so['name'] == 'Facebook' ? '#i-fb' : ($so['name'] == 'X' ? '#i-xx' : ($so['name'] == 'YouTube' ? '#i-yt' : '#i-ig')) }}"/></svg></a>
                @endforeach
            </div>
        </div>
    </div>
    <div class="hda-footer__bottom">
        <div class="hda-container hda-footer__row">
            <div class="hda-footer__legal">
                @foreach($hda['footer']['legal'] as $f)<a href="{{ $hu($f['route']) }}">{{ $f['label'] }}</a>@endforeach
            </div>
            <p class="hda-footer__credit">{{ $hda['site']['copyright'] }}</p>
        </div>
    </div>
</footer>
