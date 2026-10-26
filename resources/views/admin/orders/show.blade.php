@extends('auth.layout')

@section('title', $order->order_number)

@section('content')
@php
    $paymentLabels = ['awaiting_payment' => 'Belum Bayar', 'payment_uploaded' => 'Menunggu Verifikasi', 'paid' => 'Lunas', 'rejected' => 'Ditolak'];
    $paymentPills = [
        'awaiting_payment' => ['bg-blue-50', 'text-blue-800', 'bg-blue-600', false],
        'payment_uploaded' => ['bg-amber-50', 'text-amber-900', 'bg-error', true],
        'paid' => ['bg-secondary-fixed', 'text-on-secondary-fixed', 'bg-secondary', false],
        'rejected' => ['bg-error-container', 'text-on-error-container', 'bg-error', false],
    ];
    $statusLabels = [...$paymentLabels, 'not_started' => 'Belum Mulai', 'in_progress' => 'Dikerjakan', 'delivered' => 'Selesai'];
    $business = $order->business_data ?? [];
    $packageName = $order->package_snapshot['name'] ?? $order->package->name;
    $packagePrice = data_get($order->package_snapshot, 'price') ?? $order->package?->price;
    $addons = $order->addon_snapshot ?? [];
    $subtotal = ($packagePrice ?? 0) + collect($addons)->sum(fn ($a) => $a['price'] ?? 0);
    $logs = $order->logs->sortBy('created_at')->values();
    $waDigits = preg_replace('/\D/', '', $business['whatsapp'] ?? '');
    if (str_starts_with($waDigits, '0')) {
        $waDigits = '62' . substr($waDigits, 1);
    }
@endphp
<div id="orderDetailContent" class="flex w-full flex-col gap-gutter-lg pb-12">
    <!-- Breadcrumb -->
    <nav aria-label="Breadcrumb" class="flex items-center gap-space-xs font-label-md text-label-md text-on-surface-variant">
        <span>Admin</span><span class="text-outline-variant">/</span>
        <a class="transition-colors hover:text-primary" href="{{ route('admin.orders.index') }}">Pesanan</a>
        <span class="text-outline-variant">/</span>
        <span class="font-bold text-on-surface" id="admin-order-number">{{ $order->order_number }}</span>
    </nav>

    @if (session('status'))
        <div class="flex items-center gap-space-sm rounded-xl bg-secondary-fixed px-space-md py-space-sm shadow-sm" role="status">
            <span class="material-symbols-outlined text-lg text-secondary">check_circle</span>
            <span class="font-label-md text-label-md font-semibold text-on-secondary-fixed">{{ session('status') }}</span>
        </div>
    @endif

    <!-- Hero -->
    <div class="flex flex-col justify-between gap-gutter rounded-xl bg-surface-container-lowest p-margin-md shadow-sm xl:flex-row xl:items-center">
        <div class="flex min-w-0 flex-col gap-space-xs sm:flex-row sm:items-center sm:gap-gutter">
            <div class="flex h-16 w-16 flex-shrink-0 items-center justify-center rounded-xl bg-surface-container text-primary shadow-inner">
                <span class="material-symbols-outlined text-3xl">receipt_long</span>
            </div>
            <div class="flex min-w-0 flex-col gap-1">
                <div class="flex flex-wrap items-center gap-space-sm">
                    <h1 class="font-display text-headline-lg font-extrabold tracking-tight text-on-surface">{{ $order->order_number }}</h1>
                    <button class="rounded p-1 text-outline transition-colors hover:bg-surface-container-low hover:text-primary" data-copy-text="{{ $order->order_number }}" data-copy-message="ID pesanan disalin" title="Salin ID Pesanan" type="button">
                        <span class="material-symbols-outlined text-base">content_copy</span>
                    </button>
                    @php [$pillBg, $pillText, $dotColor, $pulse] = $paymentPills[$order->status] ?? $paymentPills['rejected'] @endphp
                    <span class="inline-flex items-center gap-1.5 rounded-full px-3 py-1 font-label-md text-label-md {{ $pillBg.' '.$pillText }}">
                        <span class="h-2 w-2 rounded-full {{ $dotColor }} {{ $pulse ? 'animate-pulse' : '' }}"></span>{{ $paymentLabels[$order->status] ?? $order->status }}
                    </span>
                </div>
                <div class="flex flex-wrap items-center gap-x-3 gap-y-1 font-body-sm text-body-sm text-on-surface-variant">
                    <span class="font-bold text-on-surface">{{ $order->user?->name ?? 'Akun dihapus' }}</span>
                    <span class="text-outline">•</span>
                    <span class="rounded bg-surface-container px-2 py-0.5 font-label-sm text-label-sm text-primary">{{ $packageName }}</span>
                    @if ($order->template_snapshot['name'] ?? $order->template?->name)
                        <span class="text-outline">•</span>
                        <span>{{ $order->template_snapshot['name'] ?? $order->template?->name }}</span>
                    @endif
                    <span class="text-outline">•</span>
                    <span class="font-mono">{{ $order->created_at->format('d M Y, H:i') }} WIB</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Workspace grid -->
    <div class="grid grid-cols-1 items-start gap-gutter-lg lg:grid-cols-12">
        <div class="flex flex-col gap-gutter-lg lg:col-span-7">
            <!-- Verifikasi pembayaran -->
            <div class="flex flex-col gap-gutter rounded-xl bg-surface-container-lowest p-margin-md shadow-sm">
                <div class="flex items-center justify-between">
                    <div class="flex items-center gap-space-sm">
                        <span class="material-symbols-outlined text-2xl text-amber-600">verified_user</span>
                        <div>
                            <h2 class="font-headline-sm font-bold text-on-surface text-headline-sm">Pembayaran &amp; Verifikasi</h2>
                            <p class="font-body-sm text-body-sm text-on-surface-variant">Cek catatan &amp; bukti transfer sebelum memproses pesanan</p>
                        </div>
                    </div>
                            <span class="rounded px-2.5 py-1 font-label-sm font-bold text-label-sm tracking-wide uppercase {{ $order->status === 'paid' ? 'bg-secondary-fixed text-on-secondary-fixed' : ($order->status === 'rejected' ? 'bg-error-container text-on-error-container' : 'bg-amber-100 text-amber-900') }}">{{ $paymentLabels[$order->status] }}</span>
                </div>

                <div class="flex flex-col gap-space-md">
                    @if ($order->payment_note)
                        <div class="rounded-xl bg-surface-container-low p-space-md">
                            <span class="font-caption text-caption font-bold uppercase tracking-wider text-on-surface-variant">Catatan konsumen</span>
                            <p class="mt-1 font-body-md text-body-md text-on-surface">{{ $order->payment_note }}</p>
                        </div>
                    @endif

                    <div class="grid grid-cols-1 gap-space-md sm:grid-cols-2">
                        <div class="rounded-xl bg-surface-container-low p-3 flex flex-col">
                            <span class="font-caption text-caption uppercase text-on-surface-variant">Dibuat</span>
                            <span class="font-label-lg font-bold text-on-surface text-label-lg">{{ $order->created_at->format('d M, H:i') }} WIB</span>
                            <span class="font-caption text-caption text-outline">{{ $order->created_at->translatedFormat('l, d F Y') }}</span>
                        </div>
                        <div class="rounded-xl bg-surface-container-low p-3 flex flex-col">
                            <span class="font-caption text-caption uppercase text-on-surface-variant">Lunas pada</span>
                            <span class="font-label-lg font-bold text-on-surface text-label-lg">{{ $order->paid_at?->format('d M, H:i') ?? '—' }}</span>
                            <span class="font-caption text-caption text-outline">{{ $order->paid_at?->translatedFormat('l, d F Y') ?? 'Belum terverifikasi' }}</span>
                        </div>
                    </div>

                    @if ($order->payment_receipt_path)
                        <div class="flex items-center justify-between gap-space-sm rounded-xl bg-surface-container-low p-space-sm">
                            <div class="flex min-w-0 items-center gap-space-sm">
                                <div class="flex h-10 w-10 flex-shrink-0 items-center justify-center rounded-lg bg-surface-container-high text-outline">
                                    <span class="material-symbols-outlined text-xl">attach_file</span>
                                </div>
                                <div class="flex min-w-0 flex-col">
                                    <span class="truncate font-label-md font-bold text-on-surface text-label-md">{{ basename($order->payment_receipt_path) }}</span>
                                    <span class="font-caption text-caption text-on-surface-variant">Bukti transfer • unduh untuk memeriksa</span>
                                </div>
                            </div>
                            <a class="flex flex-shrink-0 items-center gap-1 rounded-lg bg-primary px-3 py-2 font-label-md text-label-md text-on-primary shadow-sm transition-all hover:bg-primary-container" href="{{ route('admin.orders.receipt', $order) }}">
                                <span class="material-symbols-outlined text-base">download</span>Unduh
                            </a>
                        </div>
                    @elseif ($order->status === 'payment_uploaded')
                        <p class="flex items-center gap-2 rounded-xl bg-surface-container-low p-space-sm font-body-sm text-body-sm text-on-surface-variant">
                            <span class="material-symbols-outlined text-base text-outline">info</span>Belum ada lampiran slip transfer.
                        </p>
                    @endif
                </div>

                @if ($order->payments->isNotEmpty())
                    <div class="flex flex-col gap-space-sm">
                        <span class="font-caption text-caption font-bold uppercase tracking-wider text-on-surface-variant">Riwayat Midtrans</span>
                        @foreach ($order->payments as $payment)
                            <div class="flex items-center justify-between gap-space-sm rounded-lg bg-surface-container-low px-space-sm py-2 @if ($payment->status === 'duplicate') ring-1 ring-error/40 @endif">
                                <span class="truncate font-mono font-bold text-on-surface text-body-md">{{ $payment->midtrans_order_id }}</span>
                                <span class="font-label-md font-semibold text-on-surface-variant text-label-md">{{ str_replace('_', ' ', $payment->status) }}</span>
                            </div>
                            @if ($payment->status === 'duplicate')
                                <p class="font-body-sm text-body-sm text-error">Pembayaran ganda — perlu refund manual.</p>
                            @endif
                        @endforeach
                    </div>
                @endif

                @if ($order->status === 'payment_uploaded')
                    <form class="account-form admin-form order-verify-form flex flex-col gap-space-sm" method="POST" action="{{ route('admin.orders.verify', $order) }}">
                        @csrf
                        <div class="form-field">
                            <label for="note">Catatan verifikasi</label>
                            <textarea id="note" name="note" rows="3" placeholder="Wajib diisi jika menolak pembayaran">{{ old('note') }}</textarea>
                            @error('note') <p class="form-error">{{ $message }}</p> @enderror
                        </div>
                        <div class="flex flex-wrap items-center justify-end gap-space-sm">
                            <button class="flex h-10 items-center gap-2 rounded-lg bg-error-container px-4 font-label-md text-label-md text-on-error-container transition-colors hover:bg-error-container/80" name="action" type="submit" value="reject">
                                <span class="material-symbols-outlined text-lg">cancel</span>Tolak pembayaran
                            </button>
                            <button class="flex h-10 items-center gap-2 rounded-lg bg-secondary px-5 font-label-lg text-label-lg text-on-secondary shadow-sm transition-all hover:bg-secondary/90" name="action" type="submit" value="approve">
                                <span class="material-symbols-outlined text-lg">check_circle</span>Terima pembayaran
                            </button>
                        </div>
                    </form>
                @elseif ($order->status === 'awaiting_payment')
                    <p class="flex items-center gap-2 rounded-xl bg-blue-50 p-space-md font-body-sm text-body-sm text-blue-800" role="status">
                        <span class="material-symbols-outlined text-base">hourglass_top</span>Verifikasi tersedia setelah customer mengirim bukti pembayaran.
                    </p>
                @endif
            </div>

            <!-- Riwayat status -->
            <div class="flex flex-col gap-gutter rounded-xl bg-surface-container-lowest p-margin-md shadow-sm">
                <div class="flex flex-wrap items-center justify-between gap-space-sm">
                    <h2 class="font-headline-sm font-bold text-on-surface text-headline-sm">Riwayat Pesanan</h2>
                    <span class="rounded-full bg-primary-fixed px-2 py-0.5 font-label-sm font-bold text-on-primary-fixed text-label-sm">
                        Status pengerjaan: {{ $statusLabels[$order->delivery_status] ?? $order->delivery_status }}
                    </span>
                </div>

                @if ($logs->count())
                    <div class="relative flex flex-col gap-space-lg pl-6">
                        <div class="absolute bottom-2 left-2.5 top-2 w-0.5 bg-surface-container-highest"></div>
                        @foreach ($logs as $log)
                            @php
                                [$logBg, $logText, $logDot, $logPulse] = $paymentPills[$log->to_status] ?? ['bg-tertiary-fixed', 'text-on-tertiary-fixed', 'bg-tertiary', false];
                            @endphp
                            <div class="relative">
                                <div class="absolute -left-6 top-0.5 mt-0.5 grid h-5 w-5 place-items-center rounded-full text-xs shadow-sm {{ $logBg }}">
                                    @if ($log->to_status === 'paid' || $log->to_status === 'delivered')
                                        <span class="material-symbols-outlined text-xs font-bold {{ $logText }}">check</span>
                                    @else
                                        <span class="h-2 w-2 rounded-full {{ $logDot }} {{ $logPulse ? 'animate-pulse' : '' }}"></span>
                                    @endif
                                </div>
                                <div class="flex flex-col gap-0.5">
                                    <span class="font-label-lg font-bold text-on-surface text-label-lg">{{ $statusLabels[$log->to_status] ?? $log->to_status }}</span>
                                    <span class="font-caption text-caption text-on-surface-variant font-mono">{{ $log->created_at->format('d M Y, H:i') }} WIB @if ($log->actor) • {{ $log->actor->name }} @endif</span>
                                    @if ($log->note)
                                        <p class="mt-0.5 rounded-lg bg-amber-500/10 p-2 font-body-sm text-body-sm text-amber-900">{{ $log->note }}</p>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <p class="font-body-sm text-body-sm text-on-surface-variant" role="status">Belum ada riwayat perubahan status pada pesanan ini.</p>
                @endif

                @if ($order->status === 'paid' && $business && $order->delivery_status === 'not_started')
                    <form method="POST" action="{{ route('admin.orders.progress', $order) }}">
                        @csrf
                        <button class="flex h-10 w-full items-center justify-center gap-2 rounded-lg bg-primary font-label-md text-label-md text-on-primary shadow-sm transition-all hover:bg-primary-container" name="action" type="submit" value="start">
                            <span class="material-symbols-outlined text-lg">play_arrow</span>Mulai kerjakan
                        </button>
                    </form>
                @elseif ($order->status === 'paid' && $business && $order->delivery_status === 'in_progress')
                    <form method="POST" action="{{ route('admin.orders.progress', $order) }}">
                        @csrf
                        <button class="flex h-10 w-full items-center justify-center gap-2 rounded-lg bg-secondary font-label-md text-label-md text-on-secondary shadow-sm transition-all hover:bg-secondary/90" name="action" type="submit" value="finish">
                            <span class="material-symbols-outlined text-lg">cloud_done</span>Tandai selesai
                        </button>
                    </form>
                @elseif ($order->status === 'paid' && ! $business)
                    <p class="font-body-sm text-body-sm text-on-surface-variant">Pengerjaan belum bisa dimulai — customer belum mengisi data bisnis.</p>
                @endif
            </div>
        </div>

        <div class="flex flex-col gap-gutter-lg lg:col-span-5">
            <!-- Konsumen -->
            <div class="flex flex-col gap-gutter rounded-xl bg-surface-container-lowest p-margin-md shadow-sm">
                <div class="flex items-center justify-between">
                    <h3 class="font-headline-sm font-bold text-on-surface text-headline-sm">Konsumen &amp; Brand</h3>
                    <span class="material-symbols-outlined text-outline">business_center</span>
                </div>
                <div class="flex items-center gap-space-md rounded-xl bg-surface-container-low p-space-sm">
                    <div class="flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-full bg-primary-container font-headline-sm font-bold text-on-primary-container">
                        {{ mb_strtoupper(mb_substr($order->user?->name ?? '??', 0, 2)) }}
                    </div>
                    <div class="flex min-w-0 flex-col">
                        <span class="truncate font-label-lg font-bold text-on-surface text-label-lg">{{ $order->user?->name ?? 'Akun dihapus' }}</span>
                        <div class="mt-0.5 flex items-center gap-1.5">
                            <span class="truncate font-mono text-caption text-primary">{{ $order->user?->email ?? '—' }}</span>
                            @if ($order->user?->email)
                                <button class="text-outline hover:text-primary" data-copy-text="{{ $order->user->email }}" data-copy-message="Email disalin" title="Salin Email" type="button">
                                    <span class="material-symbols-outlined text-xs">content_copy</span>
                                </button>
                            @endif
                        </div>
                    </div>
                </div>
                @if ($waDigits)
                    <a class="flex h-10 items-center justify-center gap-2 rounded-lg bg-emerald-600 font-label-md text-label-md text-white shadow-sm transition-all hover:bg-emerald-700" href="https://wa.me/{{ $waDigits }}?text={{ rawurlencode('Halo, kami dari tim Webia mengenai pesanan template '.$order->order_number) }}" rel="noopener" target="_blank">
                        <span class="material-symbols-outlined text-lg">chat</span>Chat WhatsApp ({{ $business['whatsapp'] }})
                    </a>
                @endif
                @if ($business)
                    <div class="flex flex-col gap-space-sm pt-space-xs">
                        <span class="font-caption text-caption font-bold uppercase tracking-wider text-on-surface-variant">Data bisnis konsumen</span>
                        <div>
                            <span class="font-caption text-caption text-outline">Nama usaha</span>
                            <p class="font-body-md font-semibold text-on-surface text-body-md">{{ $business['business_name'] }}</p>
                        </div>
                        @if ($business['tagline'] ?? null)
                            <div><span class="font-caption text-caption text-outline">Tagline</span><p class="font-body-md text-body-md text-on-surface">{{ $business['tagline'] }}</p></div>
                        @endif
                        @if ($business['description'] ?? null)
                            <div>
                                <span class="font-caption text-caption text-outline">Deskripsi</span>
                                <p class="font-body-sm leading-relaxed text-body-sm text-on-surface-variant">{{ $business['description'] }}</p>
                            </div>
                        @endif
                        @if ($business['instagram'] ?? null)
                            <div><span class="font-caption text-caption text-outline">Instagram</span><p class="font-body-md text-body-md text-on-surface">{{ $business['instagram'] }}</p></div>
                        @endif
                        @if ($business['address_url'] ?? null)
                            <div>
                                <span class="font-caption text-caption text-outline">Alamat</span>
                                <p class="break-all font-body-sm text-body-sm"><a class="text-primary underline underline-offset-4" href="{{ $business['address_url'] }}" rel="noopener">{{ $business['address_url'] }}</a></p>
                            </div>
                        @endif
                    </div>
                @else
                    <p class="flex items-center gap-2 rounded-lg bg-surface-container-low p-space-sm font-body-sm text-body-sm text-on-surface-variant" role="status">
                        <span class="material-symbols-outlined text-base text-outline">hourglass_empty</span>Customer belum mengisi data bisnis.
                    </p>
                @endif
            </div>

            <!-- Billing -->
            <div class="flex flex-col gap-gutter rounded-xl bg-surface-container-lowest p-margin-md shadow-sm">
                <div class="flex items-center justify-between">
                    <h3 class="font-headline-sm font-bold text-on-surface text-headline-sm">Rincian Tagihan</h3>
                    <span class="material-symbols-outlined text-secondary">payments</span>
                </div>
                <div class="flex flex-col gap-space-sm">
                    <div class="flex items-start justify-between gap-space-sm">
                        <div class="flex min-w-0 flex-col">
                            <span class="truncate font-semibold text-on-surface">{{ $packageName }}</span>
                            <span class="font-caption text-caption text-on-surface-variant">Lisensi template • kategori: {{ $order->category_slug ?: 'Tidak dipilih' }}</span>
                        </div>
                        <span class="font-mono font-bold text-on-surface">{{ $packagePrice === null ? 'Rp —' : 'Rp '.number_format($packagePrice, 0, ',', '.') }}</span>
                    </div>
                    @foreach ($addons as $addon)
                        <div class="flex items-start justify-between gap-space-sm">
                            <div class="flex min-w-0 flex-col">
                                <span class="truncate font-semibold text-on-surface">{{ $addon['name'] }}</span>
                                <span class="font-caption text-caption text-on-surface-variant">Add-on</span>
                            </div>
                            <span class="font-mono font-bold text-on-surface">{{ $addon['price'] === null ? 'Konsultasi' : 'Rp '.number_format($addon['price'], 0, ',', '.') }}</span>
                        </div>
                    @endforeach
                    <div class="mt-space-xs flex flex-col gap-1 rounded-xl bg-surface-container p-space-md">
                        <div class="flex items-center justify-between">
                            <span class="font-label-md text-label-md font-bold uppercase text-on-surface-variant">Total pembayaran</span>
                            <span class="rounded-full px-2 py-0.5 font-label-sm text-label-sm font-bold {{ $order->status === 'paid' ? 'bg-secondary-fixed text-on-secondary-fixed' : ($order->status === 'rejected' ? 'bg-error-container text-on-error-container' : 'bg-amber-100 text-amber-900') }}">
                                {{ $paymentLabels[$order->status] ?? '—' }}
                            </span>
                        </div>
                        <div class="flex items-baseline justify-between">
                            <span class="font-mono tracking-tight font-extrabold text-headline-lg text-on-surface">Rp {{ number_format($order->total_price, 0, ',', '.') }}</span>
                        </div>
                        @if ($packagePrice !== null)
                            <span class="font-caption text-caption text-outline">Subtotal item: Rp {{ number_format($subtotal, 0, ',', '.') }}</span>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
