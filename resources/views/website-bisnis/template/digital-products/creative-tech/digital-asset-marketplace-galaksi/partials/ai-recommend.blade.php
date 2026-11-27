{{-- Rekomendasi AI (simulasi). Logika di JS: [data-ai-rec] --}}
<div class="ai-rec" data-ai-rec>
    <div class="flex items-start gap-4 flex-wrap">
        <span class="rec-ico">{{ $ic('sparkle', 'ico-lg') }}</span>
        <div class="flex-1" style="min-width:240px">
            <h3 class="text-2xl">Rekomendasi AI untukmu</h3>
            <p class="muted mt-1">Pilih tujuan dan budget — AI Astraly menyusun aset yang paling cocok.</p>
        </div>
    </div>
    <div class="grid gap-4 md:grid-cols-[1fr_220px_auto] mt-6 items-end">
        <div class="field"><span class="label">Aku sedang membuat…</span>
            <div class="chip-row" data-ai-goals>
                @foreach (['Game' => 'game', 'Aplikasi / SaaS' => 'ui', 'Website' => 'web', 'Konten Video' => 'video', 'Branding' => 'brand', 'Belajar' => 'belajar'] as $l => $k)
                    <button type="button" class="chip" data-goal="{{ $k }}">{{ $l }}</button>
                @endforeach
            </div>
        </div>
        <label class="field"><span class="label">Budget maksimal</span>
            <select class="select" data-ai-budget><option value="0">Bebas</option><option value="150000">Rp 150.000</option><option value="300000">Rp 300.000</option><option value="1">Hanya gratis</option></select>
        </label>
        <button type="button" class="btn btn-primary" data-ai-run>{{ $ic('sparkle', 'ico-sm') }} Rekomendasikan</button>
    </div>
    <div data-ai-result class="mt-6"></div>
</div>
