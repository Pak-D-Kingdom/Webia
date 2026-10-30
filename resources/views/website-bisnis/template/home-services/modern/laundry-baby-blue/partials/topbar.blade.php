@php $tel = preg_replace('/[^0-9+]/', '', $contact['phone']); @endphp
<div class="lb-topbar">
    <div class="lb-container lb-topbar__inner">
        <ul class="lb-topbar__list">
            <li class="lb-topbar__item lb-topbar__item--addr"><svg class="lb-i" aria-hidden="true"><use href="#i-pin"/></svg><span>{{ $contact['address'] }}</span></li>
            <li class="lb-topbar__item"><svg class="lb-i" aria-hidden="true"><use href="#i-clock"/></svg><span>{{ $contact['hours_text'] }}</span></li>
            <li class="lb-topbar__item lb-topbar__item--phone"><svg class="lb-i" aria-hidden="true"><use href="#i-phone"/></svg><a href="tel:{{ $tel }}">{{ $contact['phone'] }}</a></li>
        </ul>
        <div class="lb-topbar__right">
            <ul class="lb-social" aria-label="Media sosial">
                @foreach ($laundry['social'] as $s)
                    <li><a href="{{ $s['url'] }}" aria-label="{{ $s['label'] }}" target="_blank" rel="noopener"><svg class="lb-i" aria-hidden="true"><use href="#i-{{ $s['key'] }}"/></svg></a></li>
                @endforeach
            </ul>
            <span class="lb-topbar__sep" aria-hidden="true"></span>
            <a class="lb-topbar__mail" href="mailto:{{ $contact['email'] }}"><svg class="lb-i" aria-hidden="true"><use href="#i-mail"/></svg><span>{{ $contact['email'] }}</span></a>
        </div>
    </div>
</div>
