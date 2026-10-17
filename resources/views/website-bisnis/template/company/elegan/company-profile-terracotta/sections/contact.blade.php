@php $t = $c['topbar']; @endphp
<section id="kontak" class="cp-card cp-contact" aria-labelledby="cp-ct-t">
    <div>
        <h2 id="cp-ct-t" class="cp-contact__h">{{ $c['contact']['title'] }}</h2>
        <ul class="cp-contact__list">
            <li>{{ $ic('phone') }}<a href="tel:{{ preg_replace('/\s+/', '', $t['phone']) }}">{{ $t['phone'] }}</a></li>
            <li>{{ $ic('mail') }}<a href="mailto:{{ $t['email'] }}">{{ $t['email'] }}</a></li>
            <li>{{ $ic('pin') }}<span>{{ $t['address'] }}</span></li>
        </ul>
    </div>
    {{-- Statis: JS menampilkan pesan sukses. Backend: isi action & data-endpoint. --}}
    <form class="cp-form" method="post" action="#" data-cp-form data-endpoint="" novalidate>
        @csrf
        <input type="hidden" name="type" value="kontak">
        <h2 class="cp-contact__h">{{ $c['contact']['form'] }}</h2>
        <div class="cp-form__grid">
            <label class="cp-sr" for="cf-name">Nama</label>
            <input id="cf-name" name="name" placeholder="Nama Anda*" autocomplete="name" required>
            <label class="cp-sr" for="cf-email">Email</label>
            <input id="cf-email" name="email" type="email" placeholder="Email Anda*" autocomplete="email" required>
            <label class="cp-sr" for="cf-service">Layanan</label>
            <select id="cf-service" name="service" required>
                <option value="">Pilih Layanan</option>
                @foreach ($c['services']['items'] as $i)
                    <option>{{ $i['t'] }}</option>
                @endforeach
            </select>
            <label class="cp-sr" for="cf-msg">Pesan</label>
            <textarea id="cf-msg" name="message" placeholder="Pesan Anda*" required></textarea>
            <button class="cp-btn" type="submit">{{ $c['contact']['send'] }} {{ $ic('arrow') }}</button>
        </div>
        <p class="cp-form__status" role="status" aria-live="polite"></p>
    </form>
</section>
