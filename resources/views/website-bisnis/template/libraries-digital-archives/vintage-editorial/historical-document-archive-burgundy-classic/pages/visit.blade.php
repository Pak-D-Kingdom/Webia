@extends($hv.'layouts.app')
@section('title', $page['title'])
@section('content')
@include($hv.'partials.inner-hero')
<div class="hda-page"><div class="hda-container">
<div class="hda-layout">
<div style="display:grid;gap:28px">
    <img src="{{ $ha('about-library.webp') }}" alt="Reading room" style="border-radius:12px;border:2px solid var(--gold)" width="1200" height="900">
    <section class="hda-panel"><h3>Opening hours</h3><div class="hda-tablewrap"><table class="hda-table" style="min-width:0"><tbody>@foreach($hda['hours'] as $h)<tr><td>{{ $h['day'] }}</td><td><strong>{{ $h['time'] }}</strong></td></tr>@endforeach</tbody></table></div></section>
    <section class="hda-panel"><h3>Reading room rules</h3><ul class="hda-list">@foreach($hda['rules'] as $r)<li>{{ $r }}</li>@endforeach</ul></section>
</div>
<aside class="hda-aside">
    <div class="hda-panel"><h3>Find us</h3><p style="font-size:.92rem">{{ $hda['site']['address'] }}</p><p style="margin:0;font-size:.92rem"><a class="hda-textlink" href="mailto:{{ $hda['site']['email'] }}">{{ $hda['site']['email'] }}</a></p></div>
    <div class="hda-panel" id="book"><h3>Request a visit</h3>
        <form class="hda-form" data-demo-form>
            <div class="hda-field"><label for="v-name">Name</label><input id="v-name" type="text" required></div>
            <div class="hda-field"><label for="v-mail">Email</label><input id="v-mail" type="email" required></div>
            <div class="hda-field"><label for="v-date">Preferred date</label><input id="v-date" type="date" required></div>
            <div class="hda-field"><label for="v-note">What would you like to see?</label><textarea id="v-note"></textarea></div>
            <button class="hda-btn hda-btn--primary" type="submit">Send request</button>
        </form>
        <p class="hda-alert" data-demo-ok role="status" style="margin-top:12px">Thank you — this is a demo form. Connect it to your booking system.</p>
    </div>
</aside>
</div>
</div></div>
@endsection
