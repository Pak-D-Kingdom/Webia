@extends($hv.'layouts.app')
@section('title', $page['title'])
@section('content')
@include($hv.'partials.inner-hero')
<div class="hda-page"><div class="hda-container">
<div class="hda-layout">
    <div class="hda-panel">
        <h3>Send us a message</h3>
        <form class="hda-form" data-demo-form>
            <div class="hda-form__row"><div class="hda-field"><label for="c-name">Full name</label><input id="c-name" type="text" required></div><div class="hda-field"><label for="c-mail">Email</label><input id="c-mail" type="email" required></div></div>
            <div class="hda-field"><label for="c-topic">Topic</label><select id="c-topic"><option>General question</option><option>Collection suggestion</option><option>Research enquiry</option><option>Rights &amp; permissions</option><option>Correction to a record</option></select></div>
            <div class="hda-field"><label for="c-msg">Message</label><textarea id="c-msg" required></textarea></div>
            <label class="hda-check"><input type="checkbox" required> I agree to be contacted about this message.</label>
            <button class="hda-btn hda-btn--primary" type="submit" style="justify-self:start">Send message <svg class="hda-icon hda-arrow"><use href="#i-arrow"/></svg></button>
        </form>
        <p class="hda-alert" data-demo-ok role="status" style="margin-top:14px">Thank you — this is a demo form. Connect it to your mail or CRM service.</p>
    </div>
    <aside class="hda-aside">
        <div class="hda-panel"><h3>Contact details</h3><ul class="hda-list"><li>{{ $hda['site']['address'] }}</li><li><a class="hda-textlink" href="mailto:{{ $hda['site']['email'] }}">{{ $hda['site']['email'] }}</a></li><li>{{ $hda['site']['hours'] }}</li></ul></div>
        <div class="hda-panel hda-panel--dark"><h3>Quick help</h3><p style="font-size:.9rem">Chat with WhatsApp or ask the Library Assistant.</p><a class="hda-btn hda-btn--gold hda-btn--sm" href="{{ $hwa }}" target="_blank" rel="noopener">Open WhatsApp</a></div>
        <div class="hda-panel"><h3>Before you write</h3><p style="margin:0;font-size:.9rem">Many answers are in the <a class="hda-textlink" href="{{ $hu('faq') }}">FAQ</a>.</p></div>
    </aside>
</div>
</div></div>
@endsection
