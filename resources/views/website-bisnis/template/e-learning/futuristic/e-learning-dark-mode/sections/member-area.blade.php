@php($r = $e['route'])
@php($full = $full ?? false)
@php($m = $e['member'])
<section @class(['nl-sec nl-sec--member', 'nl-card' => ! $full]) id="member-area" aria-labelledby="member-title">
    @if(! $full)
        <div class="nl-member">
            <span class="nl-member__ic"><svg class="ic"><use href="#i-user"/></svg></span>
            <h2 id="member-title">{{ $m['title'] }}</h2>
            <p>{{ $m['text'] }}</p>
            <a class="nl-btn nl-btn--outline nl-btn--block" href="{{ route($r.'member-area') }}">{{ $m['cta'] }} <svg class="ic"><use href="#i-arrow"/></svg></a>
        </div>
    @else
        <h2 class="nl-sr" id="member-title">{{ $m['title'] }}</h2>
        <div class="nl-memberpage">
            <form class="nl-card nl-form" data-login action="{{ $e['login_action'] }}" method="post" novalidate aria-labelledby="login-title">
                @csrf
                <span class="nl-member__ic"><svg class="ic"><use href="#i-lock"/></svg></span>
                <h2 id="login-title">Masuk ke {{ $m['title'] }}</h2>
                <div class="nl-field"><label for="log-email">Email</label>
                    <input id="log-email" name="email" type="email" autocomplete="email" required aria-describedby="log-email-err"><small class="nl-err" id="log-email-err"></small></div>
                <div class="nl-field"><label for="log-pass">Kata sandi</label>
                    <input id="log-pass" name="password" type="password" autocomplete="current-password" required aria-describedby="log-pass-err"><small class="nl-err" id="log-pass-err"></small></div>
                <button class="nl-btn nl-btn--primary nl-btn--block" type="submit">{{ $m['cta'] }} <svg class="ic"><use href="#i-arrow"/></svg></button>
                <p class="nl-form-msg" data-form-msg role="status" aria-live="polite"></p>
                <p class="nl-form-alt">Belum punya akun? <a href="{{ route($r.'registration') }}">Daftar sekarang</a></p>
            </form>

            <ul class="nl-memberpage__items">
                @foreach($m['items'] as $it)
                    <li class="nl-card">
                        <span class="nl-feats__ic"><svg class="ic"><use href="#i-{{ $it['icon'] }}"/></svg></span>
                        <div><h3>{{ $it['title'] }}</h3><p>{{ $it['text'] }}</p></div>
                    </li>
                @endforeach
            </ul>
        </div>
    @endif
</section>
