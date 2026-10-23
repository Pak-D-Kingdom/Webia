{{-- Pencarian global: dialog + indeks JSON (program, teacher, kategori, halaman) --}}
@php
    $r   = $e['route'];
    $idx = [];

    foreach ($e['programs'] as $p) {
        $cat = $e['categories'][$p['cat']]['label'] ?? '';
        $idx[] = ['type' => 'Program', 'icon' => $e['categories'][$p['cat']]['icon'] ?? 'book', 'title' => $p['title'],
                  'sub' => $p['level'].' · '.$p['modules'].' Modul · Rp '.number_format($p['price'], 0, ',', '.'),
                  'url' => route($r.'programs', ['q' => $p['title']]),
                  'k'   => strtolower($p['title'].' '.$p['level'].' '.$cat)];
    }
    foreach ($e['teachers'] as $key => $t) {
        $idx[] = ['type' => 'Teacher', 'icon' => 'user', 'title' => $t['name'], 'sub' => $t['role'].' · ★ '.$t['rating'],
                  'url' => route($r.'teachers').'#teacher-'.$key,
                  'k'   => strtolower($t['name'].' '.$t['role'].' '.implode(' ', $t['skills'] ?? []))];
    }
    foreach ($e['categories'] as $key => $c) {
        $idx[] = ['type' => 'Kategori', 'icon' => $c['icon'], 'title' => $c['label'], 'sub' => 'Lihat program di kategori ini',
                  'url' => route($r.'programs', ['cat' => $key]), 'k' => strtolower($c['label'])];
    }
    $pages = [
        ['home', 'Home', 'Beranda NovaLearn', 'beranda utama'],
        ['programs', 'Programs', 'Semua program unggulan', 'kursus program belajar'],
        ['schedules', 'Schedules', 'Jadwal kelas online', 'jadwal kelas'],
        ['teachers', 'Teachers', 'Pengajar profesional', 'pengajar guru mentor'],
        ['pricing', 'Pricing', 'Harga paket belajar', 'harga paket biaya bayar'],
        ['registration', 'Registration', 'Daftar dan mulai belajar', 'daftar registrasi gabung'],
        ['course-content', 'Course Content', 'Materi dan progres kursus', 'materi modul kursus'],
        ['member-area', 'Member Area', 'Masuk ke area member', 'member login masuk sertifikat'],
    ];
    foreach ($pages as $pg) {
        $idx[] = ['type' => 'Halaman', 'icon' => 'arrow', 'title' => $pg[1], 'sub' => $pg[2], 'url' => route($r.$pg[0]), 'k' => strtolower($pg[1].' '.$pg[2].' '.$pg[3])];
    }
    $idx[] = ['type' => 'Halaman', 'icon' => 'sparkle', 'title' => 'AI FAQ', 'sub' => 'Tanya Nova, asisten AI', 'url' => '#', 'act' => 'ai', 'k' => 'ai faq asisten tanya bantuan chat nova'];
@endphp

<script type="application/json" id="nl-search-index">@json($idx, JSON_HEX_TAG | JSON_HEX_AMP)</script>

<div class="nl-sx" data-sx hidden>
    <div class="nl-sx__backdrop" data-sx-close></div>
    <div class="nl-sx__dialog" role="dialog" aria-modal="true" aria-label="Pencarian">
        <form class="nl-sx__bar" role="search" action="{{ route($r.'programs') }}" method="get">
            <svg class="ic"><use href="#i-search"/></svg>
            <label class="nl-sr" for="nl-sx-input">Cari</label>
            <input id="nl-sx-input" type="search" name="q" placeholder="Cari program, teacher, atau halaman..." autocomplete="off"
                   role="combobox" aria-expanded="true" aria-controls="nl-sx-list" aria-autocomplete="list" data-sx-input>
            <button type="button" class="nl-sx__x" data-sx-close aria-label="Tutup pencarian"><svg class="ic"><use href="#i-close"/></svg></button>
        </form>

        <div class="nl-sx__body">
            <div data-sx-popular>
                <p class="nl-sx__label">Pencarian populer</p>
                <div class="nl-chips">
                    @foreach($e['hero']['popular'] as $term)<button type="button" data-term="{{ $term }}">{{ $term }}</button>@endforeach
                </div>
            </div>
            <ul class="nl-sx__list" id="nl-sx-list" role="listbox" aria-label="Hasil pencarian" data-sx-list></ul>
            <p class="nl-sx__empty" data-sx-empty hidden>Tidak ada hasil untuk “<span data-sx-term></span>”. Coba kata kunci lain, misalnya nama program atau teacher.</p>
        </div>

        <footer class="nl-sx__foot">
            <span><kbd>↑</kbd><kbd>↓</kbd> pilih</span><span><kbd>Enter</kbd> buka</span><span><kbd>Esc</kbd> tutup</span>
        </footer>
    </div>
</div>
