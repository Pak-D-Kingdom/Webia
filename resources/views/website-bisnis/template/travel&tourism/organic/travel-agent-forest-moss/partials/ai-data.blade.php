{{-- Basis pengetahuan asisten AI (FAQ destinasi & paket) — dibangun dari config, dibaca oleh travel-agent.js --}}
@php
    $rp = fn ($n) => 'Rp ' . number_format($n, 0, ',', '.');
    $kb = [
        'brand'    => $cfg['brand']['name'],
        'wa'       => $cfg['contact']['whatsapp'],
        'greeting' => $cfg['ai']['greeting'],
        'links'    => [
            'destinasi' => $r('destinasi'),
            'paket'     => $r('paket-tour'),
            'itinerary' => $r('itinerary'),
            'harga'     => $r('harga'),
            'jadwal'    => $r('jadwal-keberangkatan'),
            'galeri'    => $r('galeri'),
            'booking'   => $r('booking-inquiry'),
            'testimoni' => $r('testimoni'),
        ],
        'destinations' => collect($cfg['destinations'])->map(fn ($d) => [
            'slug' => $d['slug'], 'name' => $d['name'], 'country' => $d['country'],
            'desc' => $d['description'], 'highlights' => $d['highlights'], 'best' => $d['best_time'],
            'from' => $d['from_price'] ? $rp($d['from_price']) : null,
            'package' => $d['package'], 'url' => $r('destinasi') . '#' . $d['slug'],
        ])->values()->all(),
        'packages' => collect($cfg['packages'])->map(fn ($p) => [
            'slug' => $p['slug'], 'name' => $p['name'], 'dest' => $p['destination_name'],
            'duration' => $p['duration'], 'price' => $rp($p['price']), 'summary' => $p['summary'],
            'includes' => $p['includes'], 'url' => $r('itinerary') . '#' . $p['slug'],
            'days' => collect($p['days'])->map(fn ($d, $i) => 'Hari ' . ($i + 1) . ': ' . $d['title'] . ' — ' . $d['note'])->all(),
        ])->values()->all(),
        'tiers' => collect($cfg['prices']['tiers'])->map(fn ($t) => $t['label'] . ' (' . $t['duration'] . ') mulai ' . $rp($t['price']))->all(),
        'included' => $cfg['prices']['included'],
        'excluded' => $cfg['prices']['excluded'],
        'promo'    => $cfg['prices']['promo'],
        'schedules' => collect($cfg['schedules'])->map(fn ($s) => $s['label'] . ' — ' . $s['destination'] . ' (' . $s['status'] . ')')->all(),
        'faqs' => $cfg['ai']['faqs'],
    ];
@endphp
<script type="application/json" id="ta-kb">@json($kb)</script>
