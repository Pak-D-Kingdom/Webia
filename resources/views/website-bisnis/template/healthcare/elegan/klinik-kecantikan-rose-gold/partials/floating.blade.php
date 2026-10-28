{{-- Tombol melayang: WhatsApp + AI Beauty Assistant (panel chat) --}}
@php
    $a  = $c['assistant'];
    $wa = 'https://wa.me/' . $c['contact']['whatsapp'] . '?text=' . rawurlencode($c['whatsapp']['message']);
@endphp

<div class="rg-float" id="rgFloat">
    {{-- WhatsApp: kelopak teratai berputar pelan di belakang tombol --}}
    <a class="rg-wa" href="{{ $wa }}" target="_blank" rel="noopener" aria-label="{{ $c['whatsapp']['label'] }}">
        <svg class="rg-wa__petals" viewBox="0 0 100 100" aria-hidden="true">
            @foreach (range(0, 7) as $i)
                <path d="M50 4C58 18 58 30 50 40C42 30 42 18 50 4Z" transform="rotate({{ $i * 45 }} 50 50)"/>
            @endforeach
        </svg>
        <span class="rg-wa__core"><i class="bi bi-whatsapp" aria-hidden="true"></i></span>
        <span class="rg-wa__tip">{{ $c['whatsapp']['label'] }}</span>
    </a>

    {{-- AI Beauty Assistant: maskot dokter + kucing, cincin berputar, melayang pelan --}}
    <button class="rg-ai" type="button" id="rgAiToggle" aria-expanded="false" aria-controls="rgAssistant" aria-label="Buka {{ $a['name'] }}">
        <span class="rg-ai__ring" aria-hidden="true"></span>
        <span class="rg-ai__sparkle rg-ai__sparkle--a" aria-hidden="true"></span>
        <span class="rg-ai__sparkle rg-ai__sparkle--b" aria-hidden="true"></span>
        <img class="rg-ai__img" src="{{ asset($c['images_dir'] . '/mascot-avatar.jpg') }}" alt="" width="64" height="64">
        <span class="rg-ai__online" aria-hidden="true"></span>
        <span class="rg-ai__teaser" id="rgAiTeaser">{{ $a['teaser'] }}</span>
    </button>

    <section class="rg-assistant" id="rgAssistant" role="dialog" aria-label="{{ $a['name'] }}" aria-modal="false" hidden
             data-endpoint="" data-wa="{{ $wa }}">
        <header class="rg-assistant__head">
            <img src="{{ asset($c['images_dir'] . '/mascot-avatar.jpg') }}" alt="" width="44" height="44">
            <div>
                <h2>{{ $a['name'] }}</h2>
                <p>{{ $a['subtitle'] }}</p>
            </div>
            <button type="button" class="rg-assistant__close" data-rg-close aria-label="Tutup asisten"><i class="bi bi-x-lg" aria-hidden="true"></i></button>
        </header>

        <div class="rg-assistant__body">
            <div class="rg-assistant__log" id="rgAiLog" role="log" aria-live="polite">
                <div class="rg-msg rg-msg--bot rg-msg--hello">
                    <strong>{{ $a['hello'] }} <i class="bi bi-stars" aria-hidden="true"></i></strong>
                    <span>{{ $a['greeting'] }}</span>
                </div>
            </div>

            <ul class="rg-quick" id="rgAiQuick">
                @foreach ($a['quick'] as $q)
                    <li><button type="button" data-ai-key="{{ $q['key'] }}"><i class="bi {{ $q['icon'] }}" aria-hidden="true"></i>{{ $q['label'] }}</button></li>
                @endforeach
            </ul>

            <img class="rg-assistant__mascot" src="{{ asset($c['images_dir'] . '/mascot.jpg') }}" alt="" loading="lazy">
        </div>

        <form class="rg-assistant__form" id="rgAiForm" autocomplete="off">
            <label class="rg-sr" for="rgAiInput">Pertanyaan Anda</label>
            <input id="rgAiInput" type="text" placeholder="{{ $a['placeholder'] }}" maxlength="200">
            <button type="submit" aria-label="Kirim"><i class="bi bi-send" aria-hidden="true"></i></button>
        </form>

        <ul class="rg-assistant__tabs">
            @foreach ($a['shortcuts'] as $s)
                <li><button type="button" data-ai-key="{{ $s['key'] }}" aria-label="{{ $s['label'] }}" title="{{ $s['label'] }}"><i class="bi {{ $s['icon'] }}" aria-hidden="true"></i></button></li>
            @endforeach
        </ul>

        {{-- Data jawaban untuk JS (statis, dibangun dari config) --}}
        <script type="application/json" id="rgAiData">
            {!! json_encode([
                'fallback' => $a['fallback'],
                'keywords' => $a['keywords'],
                'wa'       => $wa,
                'answers'  => [
                    'layanan' => 'Layanan unggulan kami: ' . collect($c['services'])->map(fn ($s) => $s['name'] . ' (mulai Rp ' . number_format($s['price'], 0, ',', '.') . ')')->implode(', ') . '.',
                    'tips'    => $a['tips'],
                    'jadwal'  => 'Jam praktik: ' . collect($c['schedule']['hours'])->map(fn ($h) => $h['day'] . ' ' . $h['time'])->implode('; ') . '. Ketersediaan tiap dokter bisa dilihat di halaman Jadwal.',
                    'lokasi'  => 'Kami berada di ' . $c['contact']['address'] . '. Telepon ' . $c['contact']['phone'] . '.',
                    'booking' => 'Anda bisa booking lewat halaman Booking Appointment atau WhatsApp. Tim kami akan mengonfirmasi jadwal.',
                    'klinik'  => $c['brand']['name'] . ' — ' . $c['contact']['address'] . '. Telepon ' . $c['contact']['phone'] . ', email ' . $c['contact']['email'] . '.',
                    'produk'  => $a['produk'],
                    'edukasi' => $a['edukasi'],
                ],
                'links' => [
                    'layanan' => ['label' => 'Lihat semua layanan', 'url' => route($rp . 'services')],
                    'jadwal'  => ['label' => 'Lihat jadwal', 'url' => route($rp . 'schedule')],
                    'booking' => ['label' => 'Booking sekarang', 'url' => route($rp . 'appointment')],
                    'lokasi'  => ['label' => 'Buka peta', 'url' => $c['contact']['maps_url']],
                ],
            ], JSON_UNESCAPED_UNICODE | JSON_HEX_TAG | JSON_HEX_AMP) !!}
        </script>
    </section>
</div>
