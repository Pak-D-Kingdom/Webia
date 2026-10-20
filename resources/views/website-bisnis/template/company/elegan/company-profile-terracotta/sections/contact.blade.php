@php $t = $c['topbar']; $k = $c['contact']; $w = $c['whatsapp']; @endphp
<section id="kontak" class="cp-contact" aria-labelledby="cp-ct-t">
    <aside class="cp-contact__info">
        <h2 id="cp-ct-t">{{ $k['title'] }}</h2>
        <p>{{ $k['text'] }}</p>
        <ul class="cp-contact__list">
            <li><span class="cp-ico">{{ $ic('phone') }}</span><div><small>Telepon</small><a href="tel:{{ preg_replace('/\s+/', '', $t['phone']) }}">{{ $t['phone'] }}</a></div></li>
            <li><span class="cp-ico">{{ $ic('mail') }}</span><div><small>Email</small><a href="mailto:{{ $t['email'] }}">{{ $t['email'] }}</a></div></li>
            <li><span class="cp-ico">{{ $ic('pin') }}</span><div><small>Alamat</small><span>{{ $t['address'] }}</span></div></li>
            <li><span class="cp-ico">{{ $ic('clock') }}</span><div><small>Jam kerja</small><span>{{ $t['hours'] }}</span></div></li>
        </ul>
        <a class="cp-btn cp-btn--light" href="https://wa.me/{{ $w['number'] }}?text={{ rawurlencode($w['text']) }}" target="_blank" rel="noopener">{{ $ic('wa') }} {{ $w['label'] }}</a>
    </aside>

    {{-- Statis: JS menampilkan pesan sukses. Backend: isi action & data-endpoint. --}}
    <form class="cp-form cp-contact__form" method="post" action="#" data-cp-form data-endpoint="" novalidate>
        @csrf
        <input type="hidden" name="type" value="kontak">
        <h2>{{ $k['form'] }}</h2>
        <p class="cp-muted">{{ $k['form_text'] }}</p>
        <div class="cp-form__grid">
            <div class="cp-field">
                <label for="cf-name">Nama</label>
                <input id="cf-name" name="name" placeholder="Nama lengkap" autocomplete="name" required>
            </div>
            <div class="cp-field">
                <label for="cf-email">Email</label>
                <input id="cf-email" name="email" type="email" placeholder="nama@email.com" autocomplete="email" required>
            </div>
            <div class="cp-field cp-field--full">
                <label for="cf-service">Layanan yang dibutuhkan</label>
                <select id="cf-service" name="service" required>
                    <option value="">Pilih Layanan</option>
                    @foreach ($c['services']['items'] as $i)
                        <option>{{ $i['t'] }}</option>
                    @endforeach
                </select>
            </div>
            <div class="cp-field cp-field--full">
                <label for="cf-msg">Pesan</label>
                <textarea id="cf-msg" name="message" placeholder="Ceritakan singkat kebutuhan proyek Anda" required></textarea>
            </div>
            <div class="cp-form__foot">
                <button class="cp-btn" type="submit">{{ $k['send'] }} {{ $ic('send') }}</button>
                <p class="cp-form__status" role="status" aria-live="polite"></p>
            </div>
        </div>
    </form>
</section>
