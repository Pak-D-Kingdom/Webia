<section class="section" id="faq">
    <div class="wrap">
        <div class="grid gap-12 lg:grid-cols-[1fr_1.4fr] items-start">
            <div class="reveal reveal-l">
                <span class="eyebrow">FAQ</span>
                <h2 class="h2">Pertanyaan yang <span class="gt">Sering Diajukan</span></h2>
                <p class="lead">Tidak menemukan jawabannya? Tanyakan langsung ke Nova atau hubungi tim kami.</p>
                <div class="flex gap-3 mt-6 flex-wrap"><button type="button" class="btn btn-primary" data-chat-open>{{ $ic('chat', 'ico-sm') }} Tanya Nova</button><a href="{{ $u('help-center') }}" class="btn btn-ghost">Pusat Bantuan</a></div>
            </div>
            <div class="acc reveal reveal-r">
                @foreach ($dam['faqs'] as $f)
                    <details @if ($loop->first) open @endif><summary>{{ $f[0] }} {{ $ic('plus') }}</summary><p class="ans">{{ $f[1] }}</p></details>
                @endforeach
            </div>
        </div>
    </div>
</section>
