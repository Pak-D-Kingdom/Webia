@extends('auth.layout')

@section('title', 'Daftar Pesanan')

@section('content')
<div class="mb-space-md flex flex-col gap-space-md">
    <!-- Header -->
    <div class="mb-space-xl mt-space-lg flex flex-col justify-between gap-space-md lg:flex-row xl:items-end">
        <div class="flex flex-col">
            <h1 class="font-headline-lg font-extrabold text-headline-lg text-primary tracking-tight" id="admin-orders-title">Daftar Pesanan</h1>
            <p class="mt-0.5 font-body-md text-body-md text-on-surface-variant">Pantau transaksi lisensi template, status pembayaran &amp; transfer manual, serta progres pengerjaan custom.</p>
        </div>
        @if ($orders->count() > 0)
            <button class="flex h-9 items-center gap-1.5 self-start rounded-lg border-2 border-outline-variant bg-surface-container-lowest px-3 font-label-md text-label-md text-primary transition-all hover:border-primary hover:bg-primary hover:text-on-primary md:self-auto" id="btnExportCsv" type="button">
                <span class="material-symbols-outlined text-lg">file_download</span>
                Export CSV
            </button>
        @endif
    </div>

    <!-- Stat cards -->
    <div class="grid grid-cols-1 gap-space-md sm:grid-cols-2 xl:grid-cols-4">
        <div class="group relative overflow-hidden rounded-xl bg-surface-container-lowest p-space-md shadow-sm transition-all hover:shadow-md">
            <div class="absolute left-0 top-0 h-full w-1.5 bg-primary"></div>
            <div class="flex items-start justify-between">
                <span class="font-label-md text-label-md tracking-wide text-on-surface-variant">Total Pesanan</span>
                <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-primary-fixed text-primary">
                    <span class="material-symbols-outlined text-lg">shopping_bag</span>
                </div>
            </div>
            <div class="mt-space-sm flex items-baseline gap-space-sm">
                <span class="font-display font-extrabold text-primary text-display tracking-tight">{{ $stats['total'] }}</span>
                <span class="font-label-md text-label-md text-on-surface-variant">Pesanan</span>
            </div>
            <div class="mt-space-xs flex items-center justify-between">
                <span class="tabular-nums font-caption text-caption text-on-surface-variant">Rp {{ number_format($stats['totalValue'], 0, ',', '.') }}</span>
                <span class="rounded bg-surface-container-low px-2 py-0.5 font-caption text-caption text-on-surface-variant">segala status</span>
            </div>
        </div>
        <div class="group relative overflow-hidden rounded-xl bg-surface-container-lowest p-space-md shadow-sm transition-all hover:shadow-md">
            <div class="absolute left-0 top-0 h-full w-1.5 bg-amber-500"></div>
            <div class="flex items-start justify-between">
                <span class="font-label-md text-label-md tracking-wide text-on-surface-variant">Menunggu Verifikasi</span>
                <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-amber-50 text-amber-700">
                    <span class="material-symbols-outlined text-lg">hourglass_top</span>
                </div>
            </div>
            <div class="mt-space-sm flex items-baseline gap-space-sm">
                <span class="font-display font-extrabold text-on-surface text-display tracking-tight">{{ $stats['verifyingCount'] }}</span>
                <span class="font-label-md text-label-md text-on-surface-variant">Pesanan</span>
            </div>
            <div class="mt-space-xs flex items-center justify-between">
                <span class="inline-flex items-center gap-1.5 rounded bg-amber-100 px-2 py-0.5 font-label-sm font-bold text-label-sm text-amber-900">
                    <span class="h-1.5 w-1.5 animate-pulse rounded-full bg-amber-600"></span>Bukti manual
                </span>
                <span class="tabular-nums font-caption text-caption text-on-surface-variant">Rp {{ number_format($stats['verifyingValue'], 0, ',', '.') }}</span>
            </div>
        </div>
        <div class="group relative overflow-hidden rounded-xl bg-surface-container-lowest p-space-md shadow-sm transition-all hover:shadow-md">
            <div class="absolute left-0 top-0 h-full w-1.5 bg-secondary"></div>
            <div class="flex items-start justify-between">
                <span class="font-label-md text-label-md tracking-wide text-on-surface-variant">Sedang Dikerjakan</span>
                <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-secondary-fixed/40 text-secondary">
                    <span class="material-symbols-outlined text-lg">design_services</span>
                </div>
            </div>
            <div class="mt-space-sm flex items-baseline gap-space-sm">
                <span class="font-display font-extrabold text-primary text-display tracking-tight">{{ $stats['workingCount'] }}</span>
                <span class="font-label-md text-label-md text-on-surface-variant">Proyek</span>
            </div>
            <div class="mt-space-xs flex items-center justify-between">
                <span class="rounded bg-surface-container-low px-2 py-0.5 font-caption text-caption text-on-surface-variant">status pengerjaan</span>
            </div>
        </div>
        <div class="group relative overflow-hidden rounded-xl bg-surface-container-lowest p-space-md shadow-sm transition-all hover:shadow-md">
            <div class="absolute left-0 top-0 h-full w-1.5 bg-green-600"></div>
            <div class="flex items-start justify-between">
                <span class="font-label-md text-label-md tracking-wide text-on-surface-variant">Selesai Bulan Ini</span>
                <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-green-50 text-green-700">
                    <span class="material-symbols-outlined text-lg">verified</span>
                </div>
            </div>
            <div class="mt-space-sm flex items-baseline gap-space-sm">
                <span class="font-display font-extrabold text-on-surface text-display tracking-tight">{{ $stats['deliveredMonth'] }}</span>
                <span class="font-label-md text-label-md text-on-surface-variant">Pesanan</span>
            </div>
            <div class="mt-space-xs flex items-center justify-between">
                <span class="rounded bg-surface-container-low px-2 py-0.5 font-caption text-caption text-on-surface-variant">{{ now()->locale('id')->translatedFormat('F Y') }}</span>
            </div>
        </div>
    </div>

    <!-- Filter tabs: status pembayaran (server-side) -->
    <nav aria-label="Filter status pembayaran" class="flex select-none items-center justify-between gap-space-xs overflow-x-auto rounded-xl bg-surface-container-lowest px-space-md shadow-sm">
        <div class="flex flex-nowrap items-center gap-space-xs py-space-xs">
            @php
                $statusLabels = ['awaiting_payment' => 'Belum Bayar', 'payment_uploaded' => 'Menunggu Verifikasi', 'paid' => 'Lunas', 'rejected' => 'Ditolak'];
                $deliveryLabels = ['not_started' => 'Belum Mulai', 'in_progress' => 'Dikerjakan', 'delivered' => 'Selesai'];
            @endphp
            <a class="rounded-lg px-space-md py-2 font-label-md text-label-md transition-all {{ $activeStatus === '' ? 'bg-primary-container font-bold text-on-primary shadow-sm' : 'text-on-surface-variant hover:bg-surface-container-low hover:text-on-surface' }}" data-filter-type="status" data-filter-value="" href="{{ route('admin.orders.index', array_filter(['delivery' => $activeDelivery], fn ($v) => $v !== '')) }}" @if ($activeStatus === '') aria-current="page" @endif>Semua</a>
            @foreach ($statuses as $statusName)
                <a class="flex items-center gap-1.5 whitespace-nowrap rounded-lg px-space-md py-2 font-label-md text-label-md transition-all {{ $activeStatus === $statusName ? 'bg-primary-container font-bold text-on-primary shadow-sm' : 'text-on-surface-variant hover:bg-surface-container-low hover:text-on-surface' }}" data-filter-type="status" data-filter-value="{{ $statusName }}" href="{{ route('admin.orders.index', array_filter(['status' => $statusName, 'delivery' => $activeDelivery], fn ($v) => $v !== '')) }}" @if ($activeStatus === $statusName) aria-current="page" @endif>{{ $statusLabels[$statusName] }}
                    @if (($statusCounts[$statusName] ?? 0) > 0)
                        <span class="rounded-full bg-surface-container-high px-1.5 py-0.2 font-caption text-caption text-on-surface-variant">{{ $statusCounts[$statusName] }}</span>
                    @endif
                </a>
            @endforeach
        </div>
    </nav>

    <!-- Search & status pengerjaan -->
    <div class="flex flex-col items-center justify-between gap-space-md rounded-xl bg-surface-container-lowest p-space-md shadow-sm lg:flex-row">
        <div class="relative flex w-full items-center lg:w-96">
            <span class="material-symbols-outlined pointer-events-none absolute left-space-sm text-lg text-outline">search</span>
            <input aria-label="Cari pesanan" class="h-9 w-full rounded-lg bg-surface-container-low pl-9 pr-3 font-body-sm text-body-sm text-on-surface placeholder:text-outline transition-all focus:bg-surface-container-lowest focus:outline-none focus:ring-2 focus:ring-primary/20" id="tableSearch" placeholder="Cari nama konsumen, email, ID pesanan..." type="text">
        </div>
        <nav aria-label="Filter status pengerjaan" class="flex flex-wrap items-center gap-space-xs">
            <span class="font-caption text-caption uppercase tracking-wider text-outline">Pengerjaan:</span>
            <a class="rounded-lg px-2.5 py-1.5 font-label-sm text-label-sm transition-all {{ $activeDelivery === '' ? 'bg-primary-container font-bold text-on-primary shadow-sm' : 'bg-surface-container-low text-on-surface-variant hover:bg-surface-container-high hover:text-on-surface' }}" data-filter-type="delivery" data-filter-value="" href="{{ route('admin.orders.index', array_filter(['status' => $activeStatus], fn ($v) => $v !== '')) }}" @if ($activeDelivery === '') aria-current="page" @endif>Semua</a>
            @foreach ($deliveries as $deliveryName)
                <a class="flex items-center gap-1.5 rounded-lg px-2.5 py-1.5 font-label-sm text-label-sm transition-all {{ $activeDelivery === $deliveryName ? 'bg-primary-container font-bold text-on-primary shadow-sm' : 'bg-surface-container-low text-on-surface-variant hover:bg-surface-container-high hover:text-on-surface' }}" data-filter-type="delivery" data-filter-value="{{ $deliveryName }}" href="{{ route('admin.orders.index', array_filter(['status' => $activeStatus, 'delivery' => $deliveryName], fn ($v) => $v !== '')) }}" @if ($activeDelivery === $deliveryName) aria-current="page" @endif>{{ $deliveryLabels[$deliveryName] }}
                    @if (($deliveryCounts[$deliveryName] ?? 0) > 0)
                        <span class="rounded-full px-1.5 py-0.2 font-caption text-caption {{ $activeDelivery === $deliveryName ? 'bg-white/25 text-on-primary' : 'bg-surface-container-high text-on-surface-variant' }}">{{ $deliveryCounts[$deliveryName] }}</span>
                    @endif
                </a>
            @endforeach
            <a aria-label="Reset Filter" class="flex h-9 w-9 items-center justify-center rounded-lg bg-surface-container-low text-on-surface-variant transition-all hover:bg-error-container hover:text-on-error-container" data-filter-reset href="{{ route('admin.orders.index') }}" title="Reset Filter"><span class="material-symbols-outlined text-lg">filter_alt_off</span></a>
        </nav>
    </div>
</div>

<!-- Data table -->
<div class="flex flex-col overflow-hidden rounded-xl bg-surface-container-lowest shadow-sm">
    <div class="w-full overflow-x-auto">
        <table class="select-text w-full text-left" id="ordersTable">
            <thead>
                <tr class="border-b border-surface-container uppercase tracking-wider text-on-surface-variant">
                    <th class="px-3 py-space-sm font-label-sm text-label-sm font-bold md:px-4">Pesanan</th>
                    <th class="px-3 py-space-sm font-label-sm text-label-sm font-bold md:px-4">Konsumen</th>
                    <th class="px-3 py-space-sm font-label-sm text-label-sm font-bold md:px-4">Template</th>
                    <th class="px-3 py-space-sm font-label-sm text-label-sm font-bold md:px-4">Paket</th>
                    <th class="px-3 py-space-sm text-right font-label-sm text-label-sm font-bold md:px-4">Total</th>
                    <th class="px-3 py-space-sm text-center font-label-sm text-label-sm font-bold md:px-4">Pembayaran</th>
                    <th class="px-3 py-space-sm text-center font-label-sm text-label-sm font-bold md:px-4">Pengerjaan</th>
                    <th class="px-3 py-space-sm text-center font-label-sm text-label-sm font-bold md:px-4">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-surface-container font-body-sm text-body-sm text-on-surface">
                @forelse ($orders as $order)
                    <tr class="transition-colors hover:bg-surface-container-low/60" data-status="{{ $order->status }}" data-delivery="{{ $order->delivery_status }}">
                        <td class="px-3 py-3.5 md:px-4">
                            <span class="whitespace-nowrap font-label-md text-label-md font-bold text-primary">{{ $order->order_number }}</span>
                        </td>
                        <td class="px-3 py-3.5 md:px-4">
                            <div class="flex flex-col">
                                <span class="font-label-md text-label-md font-semibold text-on-surface">{{ $order->user?->name ?? $order->guest_name ?? 'Menunggu lunas' }}</span>
                                <span class="font-caption text-caption text-on-surface-variant">{{ $order->user?->email ?? $order->guest_email ?? '-' }}</span>
                            </div>
                        </td>
                        <td class="px-3 py-3.5 md:px-4">
                            @php
                                $templateName = data_get($order->template_snapshot, 'name') ?? $order->template?->name ?? (data_get($order->package_snapshot, 'name') ?? $order->package->name);
                                $templateTier = data_get($order->template_snapshot, 'version') ?? data_get($order->package_snapshot, 'tier');
                            @endphp
                            <div class="flex items-center gap-space-xs">
                                <div class="flex h-8 w-8 flex-shrink-0 items-center justify-center rounded-lg bg-primary-fixed/40 text-primary">
                                    <span class="material-symbols-outlined text-base">web</span>
                                </div>
                                <div class="flex min-w-0 flex-col">
                                    <span class="truncate font-label-md text-label-md font-semibold text-on-surface">{{ $templateName }}</span>
                                    @if ($templateTier)
                                        <span class="font-caption text-caption text-outline">{{ $templateTier }}</span>
                                    @endif
                                </div>
                            </div>
                        </td>
                        <td class="px-3 py-3.5 whitespace-nowrap text-on-surface-variant md:px-4">{{ $order->package_snapshot['name'] ?? $order->package->name }}</td>
                        <td class="px-3 py-3.5 text-right font-label-md text-label-md font-bold tabular-nums text-on-surface md:px-4">Rp {{ number_format($order->total_price, 0, ',', '.') }}</td>
                        <td class="px-3 py-3.5 text-center md:px-4">
                            @switch ($order->status)
                                @case ('awaiting_payment')
                                    <span class="inline-flex items-center gap-1.5 rounded-full bg-blue-50 px-2.5 py-0.5 font-label-sm text-label-sm font-bold text-blue-800"><span class="h-1.5 w-1.5 rounded-full bg-blue-600"></span>Belum Bayar</span>
                                @break
                                @case ('payment_uploaded')
                                    <span class="inline-flex items-center gap-1.5 rounded-full bg-amber-50 px-2.5 py-0.5 font-label-sm text-label-sm font-bold text-amber-900"><span class="h-1.5 w-1.5 animate-ping rounded-full bg-error"></span>Menunggu Verifikasi</span>
                                @break
                                @case ('paid')
                                    <span class="inline-flex items-center gap-1.5 rounded-full bg-secondary-fixed px-2.5 py-0.5 font-label-sm text-label-sm font-bold text-on-secondary-fixed"><span class="h-1.5 w-1.5 rounded-full bg-secondary"></span>Lunas</span>
                                @break
                                @default
                                    <span class="inline-flex items-center gap-1.5 rounded-full bg-error-container px-2.5 py-0.5 font-label-sm text-label-sm font-bold text-on-error-container"><span class="h-1.5 w-1.5 rounded-full bg-error"></span>Ditolak</span>
                            @endswitch
                        </td>
                        <td class="px-3 py-3.5 text-center md:px-4">
                            @switch ($order->delivery_status)
                                @case ('in_progress')
                                    <span class="inline-flex items-center gap-1.5 rounded-full bg-tertiary-fixed px-2.5 py-0.5 font-label-sm text-label-sm font-bold text-on-tertiary-fixed"><span class="h-1.5 w-1.5 rounded-full bg-tertiary"></span>Dikerjakan</span>
                                @break
                                @case ('delivered')
                                    <span class="inline-flex items-center gap-1.5 rounded-full bg-secondary-fixed px-2.5 py-0.5 font-label-sm text-label-sm font-bold text-on-secondary-fixed"><span class="material-symbols-outlined text-sm">cloud_done</span>Selesai</span>
                                @break
                                @default
                                    <span class="inline-flex items-center gap-1.5 rounded-full bg-surface-container-high px-2.5 py-0.5 font-label-sm text-label-sm font-bold text-on-surface-variant"><span class="h-1.5 w-1.5 rounded-full bg-outline"></span>Belum Mulai</span>
                            @endswitch
                        </td>
                        <td class="px-3 py-3.5 text-center md:px-4">
                            <a class="relative inline-flex items-center gap-1.5 rounded-lg border-2 border-outline-variant bg-surface-container-lowest px-2.5 py-1.5 font-label-sm text-label-sm font-semibold text-primary transition-all hover:border-primary hover:bg-primary hover:text-on-primary active:scale-[0.98]" data-order-detail href="{{ route('admin.orders.show', $order) }}" @if ($order->status === 'payment_uploaded') title="Butuh review bukti transfer" @endif>
                                @if ($order->status === 'payment_uploaded')
                                    <span aria-hidden="true" class="absolute -right-1 -top-1 h-2.5 w-2.5 animate-pulse rounded-full border-2 border-surface-container-lowest bg-error"></span>
                                    <span class="sr-only">Butuh review bukti transfer.</span>
                                @endif
                                <span aria-hidden="true" class="material-symbols-outlined text-base">visibility</span>
                                Detail
                            </a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8">
                            <div class="flex flex-col items-center justify-center px-4 py-12 text-center" role="status">
                                <div class="mb-space-sm flex h-16 w-16 items-center justify-center rounded-full bg-surface-container-low text-outline">
                                    <span class="material-symbols-outlined text-3xl">receipt_long_off</span>
                                </div>
                                <h2 class="font-headline-sm text-headline-sm font-bold text-primary">Belum ada pesanan</h2>
                                <p class="mt-1 max-w-sm font-body-sm text-body-sm text-on-surface-variant">Pesanan customer akan muncul di sini, sesuaikan juga kombinasi filter status.</p>
                            </div>
                        </td>
                    </tr>
                @endforelse
                <tr class="hidden" id="tableEmptyState">
                    <td colspan="8">
                        <div class="flex flex-col items-center justify-center px-4 py-12 text-center" role="status">
                            <div class="mb-space-sm flex h-16 w-16 items-center justify-center rounded-full bg-surface-container-low text-outline">
                                <span class="material-symbols-outlined text-3xl">receipt_long_off</span>
                            </div>
                            <h2 class="font-headline-sm text-headline-sm font-bold text-primary">Belum ada pesanan</h2>
                            <p class="mt-1 max-w-sm font-body-sm text-body-sm text-on-surface-variant">Pesanan customer akan muncul di sini, sesuaikan juga kombinasi filter status.</p>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    @if ($orders->count() > 0)
        <div class="flex flex-col items-center justify-between gap-space-md border-t border-surface-container bg-surface-container-lowest p-space-md sm:flex-row">
            <span class="font-body-sm text-body-sm text-on-surface-variant">Menampilkan <strong class="font-semibold text-on-surface">{{ $orders->firstItem() }}–{{ $orders->lastItem() }}</strong> dari <strong class="font-semibold text-on-surface">{{ $orders->total() }}</strong> pesanan</span>
            @if ($orders->hasPages())
                @php
                    $pageStart = max(1, $orders->currentPage() - 2);
                    $pageEnd = min($orders->lastPage(), $pageStart + 4);
                    $pageStart = max(1, $pageEnd - 4);
                @endphp
                <div class="flex select-none items-center gap-1">
                    <a class="flex h-8 items-center justify-center gap-0.5 rounded-lg px-2.5 font-label-sm text-label-sm text-on-surface transition-all {{ $orders->onFirstPage() ? 'cursor-not-allowed bg-surface-container-low text-outline' : 'bg-surface-container-low hover:bg-surface-container' }}" @if (!$orders->onFirstPage()) href="{{ $orders->previousPageUrl() }}" @else aria-disabled="true" @endif>
                        <span class="material-symbols-outlined text-base">chevron_left</span>
                        <span class="ml-0.5 max-sm:hidden">Sebelumnya</span>
                    </a>
                    @for ($page = $pageStart; $page <= $pageEnd; $page++)
                        <a class="flex h-8 w-8 items-center justify-center rounded-lg font-label-sm text-label-sm {{ $page === $orders->currentPage() ? 'bg-primary-container font-bold text-on-primary shadow-sm' : 'bg-surface-container-low text-on-surface-variant transition-all hover:bg-surface-container hover:text-on-surface' }}" @if ($page !== $orders->currentPage()) href="{{ $orders->url($page) }}" @else aria-current="page" @endif>{{ $page }}</a>
                    @endfor
                    <a class="flex h-8 items-center justify-center gap-0.5 rounded-lg px-2.5 font-label-sm text-label-sm text-on-surface transition-all {{ $orders->hasMorePages() ? 'bg-surface-container-low hover:bg-surface-container' : 'cursor-not-allowed bg-surface-container-low text-outline' }}" @if ($orders->hasMorePages()) href="{{ $orders->nextPageUrl() }}" @else aria-disabled="true" @endif>
                        <span class="mr-0.5 max-sm:hidden">Berikutnya</span>
                        <span class="material-symbols-outlined text-base">chevron_right</span>
                    </a>
                </div>
            @endif
        </div>
    @endif
</div>

<!-- Info banner -->
<div class="mt-space-md flex flex-col items-center justify-between gap-space-sm rounded-xl border-l-4 border-secondary bg-surface-container-low p-space-md md:flex-row">
    <div class="flex items-center gap-space-sm">
        <span class="material-symbols-outlined text-2xl text-secondary">info</span>
        <div class="flex flex-col">
            <span class="font-label-md text-label-md font-bold text-on-surface">Instruksi Verifikasi Pembayaran Manual</span>
            <span class="font-body-sm text-body-sm text-on-surface-variant">Pastikan nominal transfer manual sesuai dengan 3 digit kode unik pelanggan sebelum menyetujui pesanan.</span>
        </div>
    </div>
</div>
@endsection
