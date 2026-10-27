@extends('auth.layout')

@section('title', 'Paket')

@section('content')
@php
    $totalPackages = $packages->count();
    $activePackages = $packages->where('is_active')->count();
    $avgPrice = $totalPackages ? (int) round($packages->avg('price')) : 0;
    $topFeaturePackage = $packages->sortByDesc(fn ($p) => count($p->features ?? []))->first();
    $packageIcons = ['bolt', 'local_fire_department', 'code', 'verified_user', 'sell', 'diamond'];
@endphp
<div class="flex w-full flex-col gap-space-md">
    <!-- Header -->
    <div class="mb-space-lg mt-space-lg flex flex-col justify-between gap-space-md lg:flex-row xl:items-end">
        <div class="flex flex-col">
            <div class="flex flex-wrap items-center gap-space-sm">
                <h1 class="font-headline-lg font-extrabold text-headline-lg text-primary tracking-tight">Manajemen Paket &amp; Lisensi</h1>
                <span class="inline-flex items-center gap-1.5 rounded-full bg-secondary-container px-2.5 py-1 font-label-sm font-bold text-label-sm text-on-secondary-container shadow-sm">
                    <span aria-hidden="true" class="h-1.5 w-1.5 animate-pulse rounded-full bg-secondary"></span>
                    {{ $activePackages }} Paket Aktif
                </span>
            </div>
            <p class="mt-0.5 max-w-2xl font-body-md text-body-md text-on-surface-variant">Kelola tier paket template website: kuota AI chatbot, fitur lisensi, harga katalog, ketersediaan CMS, dan status publikasi.</p>
        </div>
        <button class="inline-flex h-9 shrink-0 items-center gap-1.5 self-start rounded-lg bg-primary px-3.5 font-label-md font-bold text-label-md text-on-primary shadow-sm transition-all hover:bg-primary-container active:scale-[0.98] md:self-auto" data-package-drawer-create id="btnOpenCreatePackage" type="button">
            <span aria-hidden="true" class="material-symbols-outlined text-lg">add</span>
            Tambah Paket Baru
        </button>
    </div>

    @if (session('status'))
        <div class="flex items-start gap-3 rounded-xl bg-secondary-fixed/20 px-space-md py-space-sm" role="status">
            <span aria-hidden="true" class="material-symbols-outlined text-lg text-secondary">check_circle</span>
            <span class="font-label-md font-semibold text-label-md text-on-surface">{{ session('status') }}</span>
        </div>
    @endif
    @if ($errors->any())
        <div class="flex items-start gap-3 rounded-xl bg-error-container px-space-md py-space-sm text-on-error-container" role="alert">
            <span aria-hidden="true" class="material-symbols-outlined text-lg">error</span>
            <ul class="flex flex-col font-body-sm text-body-sm">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- KPI cards -->
    <div class="grid grid-cols-1 gap-space-md sm:grid-cols-2 xl:grid-cols-4">
        <div class="group relative overflow-hidden rounded-xl bg-surface-container-lowest p-space-md shadow-sm transition-all hover:shadow-md">
            <div aria-hidden="true" class="absolute left-0 top-0 h-full w-1.5 bg-primary"></div>
            <div class="flex items-start justify-between">
                <span class="font-label-md text-label-md tracking-wide text-on-surface-variant">Total Tier Paket</span>
                <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-primary-fixed text-primary">
                    <span aria-hidden="true" class="material-symbols-outlined text-lg">category</span>
                </div>
            </div>
            <div class="mt-space-sm flex items-baseline gap-space-sm">
                <span class="font-display font-extrabold text-display text-primary tracking-tight">{{ $totalPackages }}</span>
                <span class="font-label-md text-label-md text-on-surface-variant">Paket</span>
            </div>
            <div class="mt-space-xs">
                <span class="block truncate font-caption text-caption text-on-surface-variant">{{ $totalPackages ? $packages->pluck('name')->implode(', ') : 'Belum ada paket' }}</span>
            </div>
        </div>
        <div class="group relative overflow-hidden rounded-xl bg-surface-container-lowest p-space-md shadow-sm transition-all hover:shadow-md">
            <div aria-hidden="true" class="absolute left-0 top-0 h-full w-1.5 bg-amber-500"></div>
            <div class="flex items-start justify-between">
                <span class="font-label-md text-label-md tracking-wide text-on-surface-variant">Paket Aktif</span>
                <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-amber-50 text-amber-700">
                    <span aria-hidden="true" class="material-symbols-outlined text-lg">publish</span>
                </div>
            </div>
            <div class="mt-space-sm flex items-baseline gap-space-sm">
                <span class="font-display font-extrabold text-display text-on-surface tracking-tight">{{ $activePackages }}</span>
                <span class="font-label-md text-label-md text-on-surface-variant">Terkatalog</span>
            </div>
            <div class="mt-space-xs">
                <span class="rounded bg-surface-container-low px-2 py-0.5 font-caption text-caption text-on-surface-variant">{{ $totalPackages - $activePackages }} nonaktif</span>
            </div>
        </div>
        <div class="group relative overflow-hidden rounded-xl bg-surface-container-lowest p-space-md shadow-sm transition-all hover:shadow-md">
            <div aria-hidden="true" class="absolute left-0 top-0 h-full w-1.5 bg-secondary"></div>
            <div class="flex items-start justify-between">
                <span class="font-label-md text-label-md tracking-wide text-on-surface-variant">Rata-rata Harga</span>
                <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-secondary-fixed/40 text-secondary">
                    <span aria-hidden="true" class="material-symbols-outlined text-lg">payments</span>
                </div>
            </div>
            <div class="mt-space-sm flex items-baseline gap-space-sm">
                <span class="font-display font-extrabold text-display text-primary tracking-tight">Rp {{ number_format($avgPrice, 0, ',', '.') }}</span>
            </div>
            <div class="mt-space-xs flex items-center justify-between">
                <span class="rounded bg-surface-container-low px-2 py-0.5 font-caption text-caption text-on-surface-variant">seluruh tier</span>
                <span class="tabular-nums font-caption text-caption text-on-surface-variant">{{ $totalPackages }} paket</span>
            </div>
        </div>
        <div class="group relative overflow-hidden rounded-xl bg-surface-container-lowest p-space-md shadow-sm transition-all hover:shadow-md">
            <div aria-hidden="true" class="absolute left-0 top-0 h-full w-1.5 bg-green-600"></div>
            <div class="flex items-start justify-between">
                <span class="font-label-md text-label-md tracking-wide text-on-surface-variant">Fitur Lisensi Terbanyak</span>
                <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-green-50 text-green-700">
                    <span aria-hidden="true" class="material-symbols-outlined text-lg">verified</span>
                </div>
            </div>
            <div class="mt-space-sm flex items-baseline gap-space-sm">
                <span class="font-display font-extrabold text-display text-on-surface tracking-tight">{{ $topFeaturePackage ? count($topFeaturePackage->features ?? []) : 0 }}</span>
                <span class="font-label-md text-label-md text-on-surface-variant">Fitur</span>
            </div>
            <div class="mt-space-xs">
                <span class="block truncate font-caption text-caption text-on-surface-variant">{{ $topFeaturePackage ? 'Tier '.$topFeaturePackage->name : 'Belum ada fitur' }}</span>
            </div>
        </div>
    </div>

    <!-- Data table -->
    <div class="flex flex-col overflow-hidden rounded-xl bg-surface-container-lowest shadow-sm">
        <!-- Toolbar: search, status, urutan -->
        <div class="flex flex-col items-stretch justify-between gap-space-sm bg-surface-container-low p-space-md lg:flex-row lg:items-center">
            <div class="relative flex w-full items-center lg:w-96">
                <span aria-hidden="true" class="material-symbols-outlined pointer-events-none absolute left-space-sm text-lg text-outline">search</span>
                <input aria-label="Cari paket" class="h-9 w-full rounded-lg bg-surface-container-lowest pl-9 pr-3 font-body-sm text-body-sm text-on-surface transition-all placeholder:text-outline focus:outline-none focus:ring-2 focus:ring-primary/20" id="packageSearch" placeholder="Cari nama paket, slug, atau fitur..." type="text">
            </div>
            <div class="flex flex-wrap items-center gap-space-xs">
                <label class="flex h-9 items-center gap-1.5 rounded-lg bg-surface-container-lowest px-2.5 shadow-sm" for="packageFilterStatus">
                    <span class="font-caption text-caption text-on-surface-variant">Status:</span>
                    <select class="cursor-pointer bg-transparent font-label-md font-semibold text-label-md text-on-surface focus:outline-none" id="packageFilterStatus">
                        <option value="all">Semua Status</option>
                        <option value="1">Aktif saja</option>
                        <option value="0">Nonaktif saja</option>
                    </select>
                </label>
                <label class="flex h-9 items-center gap-1.5 rounded-lg bg-surface-container-lowest px-2.5 shadow-sm" for="packageSortBy">
                    <span class="font-caption text-caption text-on-surface-variant">Urutkan:</span>
                    <select class="cursor-pointer bg-transparent font-label-md font-semibold text-label-md text-on-surface focus:outline-none" id="packageSortBy">
                        <option value="order">Urutan Katalog</option>
                        <option value="price_asc">Harga Terendah</option>
                        <option value="price_desc">Harga Tertinggi</option>
                        <option value="orders">Terbanyak Dipesan</option>
                    </select>
                </label>
            </div>
        </div>
        <div class="w-full overflow-x-auto">
            <table class="select-text w-full text-left" id="packagesTable">
                <thead>
                    <tr class="border-b border-surface-container uppercase tracking-wider text-on-surface-variant">
                        <th class="px-3 py-space-sm font-label-sm font-bold text-label-sm md:px-4">Paket &amp; Target Lisensi</th>
                        <th class="px-3 py-space-sm font-label-sm font-bold text-label-sm md:px-4">Slug URL</th>
                        <th class="px-3 py-space-sm text-center font-label-sm font-bold text-label-sm md:px-4">Fitur</th>
                        <th class="px-3 py-space-sm text-right font-label-sm font-bold text-label-sm md:px-4">Harga (IDR)</th>
                        <th class="px-3 py-space-sm text-center font-label-sm font-bold text-label-sm md:px-4">Status</th>
                        <th class="px-3 py-space-sm text-center font-label-sm font-bold text-label-sm md:px-4">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-surface-container font-body-sm text-body-sm text-on-surface">
                    @forelse ($packages as $package)
                        @php
                            $icon = $packageIcons[$loop->index % count($packageIcons)];
                        @endphp
                        <tr class="transition-colors hover:bg-surface-container-low/60"
                            data-active="{{ $package->is_active ? '1' : '0' }}"
                            data-cms="{{ $package->cms_enabled ? '1' : '0' }}"
                            data-delete-url="{{ route('admin.packages.destroy', $package) }}"
                            data-description="{{ $package->description }}"
                            data-features="{{ collect($package->features)->implode("\n") }}"
                            data-id="{{ $package->id }}"
                            data-name="{{ $package->name }}"
                            data-old-price="{{ $package->old_price }}"
                            data-orders="{{ $package->orders_count }}"
                            data-package-id="{{ $package->id }}"
                            data-price="{{ $package->price }}"
                            data-quota="{{ $package->chatbot_monthly_quota }}"
                            data-slug="{{ $package->slug }}"
                            data-sort-order="{{ $package->sort_order }}"
                            data-update-url="{{ route('admin.packages.update', $package) }}">
                            <td class="px-3 py-3.5 md:px-4">
                                <div class="flex items-center gap-3">
                                    <div class="flex h-9 w-9 shrink-0 items-center justify-center rounded-lg {{ $package->is_active ? 'bg-primary-fixed text-primary' : 'bg-surface-container text-outline' }}">
                                        <span aria-hidden="true" class="material-symbols-outlined text-xl">{{ $icon }}</span>
                                    </div>
                                    <div class="flex min-w-0 flex-col">
                                        <span class="truncate font-label-lg font-bold text-label-lg {{ $package->is_active ? 'text-on-surface' : 'text-on-surface-variant' }}">{{ $package->name }}</span>
                                        <span class="truncate font-caption text-caption {{ $package->is_active ? 'text-on-surface-variant' : 'text-outline' }}">{{ $package->description }}</span>
                                    </div>
                                </div>
                            </td>
                            <td class="px-3 py-3.5 md:px-4">
                                <div class="flex flex-col items-start gap-1">
                                    <code class="rounded bg-surface-container px-2 py-0.5 font-mono text-xs {{ $package->is_active ? 'text-on-surface-variant' : 'text-outline' }}">/paket-{{ $package->slug }}</code>
                                    <span class="font-caption text-caption text-on-surface-variant">digunakan di {{ $package->orders_count }} pesanan</span>
                                </div>
                            </td>
                            <td class="px-3 py-3.5 text-center md:px-4">
                                <span class="inline-flex items-center rounded-full bg-surface-container px-2.5 py-0.5 font-label-sm font-semibold text-label-sm text-on-surface">{{ count($package->features ?? []) }} Fitur</span>
                                @if ($package->cms_enabled)
                                    <span class="mt-1 inline-flex items-center gap-1 rounded-full bg-secondary-container px-2 py-0.5 font-caption font-bold text-caption text-on-secondary-container"><span aria-hidden="true" class="material-symbols-outlined text-xs">check_circle</span>CMS</span>
                                @endif
                            </td>
                            <td class="px-3 py-3.5 text-right md:px-4">
                                <div class="whitespace-nowrap font-mono font-bold text-on-surface">Rp {{ number_format($package->price, 0, ',', '.') }}</div>
                                @if ($package->old_price)
                                    <div class="whitespace-nowrap font-mono text-xs text-outline line-through">Rp {{ number_format($package->old_price, 0, ',', '.') }}</div>
                                @endif
                            </td>
                            <td class="px-3 py-3.5 text-center md:px-4">
                                <form action="{{ route('admin.packages.toggle', $package) }}" method="POST">
                                    @csrf
                                    <button class="inline-flex items-center gap-2 select-none" title="{{ $package->is_active ? 'Nonaktifkan paket' : 'Aktifkan paket' }}" type="submit">
                                        <span aria-hidden="true" class="relative h-5 w-9 rounded-full transition-colors {{ $package->is_active ? 'bg-secondary' : 'bg-surface-container-highest' }}">
                                            <span class="absolute left-[2px] top-[2px] h-4 w-4 rounded-full bg-white shadow transition-transform {{ $package->is_active ? 'translate-x-4' : '' }}"></span>
                                        </span>
                                        <span class="font-label-sm font-bold text-label-sm {{ $package->is_active ? 'text-secondary' : 'text-on-surface-variant' }}">{{ $package->is_active ? 'Aktif' : 'Nonaktif' }}</span>
                                    </button>
                                </form>
                            </td>
                            <td class="px-3 py-3.5 text-center md:px-4">
                                <div class="flex items-center justify-center gap-1">
                                    <button class="inline-flex items-center gap-1 rounded px-2 py-1 font-label-sm font-bold text-label-sm text-primary transition-colors hover:bg-surface-container" data-package-edit type="button">
                                        <span aria-hidden="true" class="material-symbols-outlined text-base">edit</span>Edit
                                    </button>
                                    <button aria-label="Hapus paket {{ $package->name }}" class="rounded p-1 text-on-surface-variant transition-colors hover:bg-error-container hover:text-error" data-package-delete title="Hapus paket" type="button">
                                        <span aria-hidden="true" class="material-symbols-outlined text-base">delete</span>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6">
                                <div class="flex flex-col items-center justify-center px-4 py-12 text-center" role="status">
                                    <div class="mb-space-sm flex h-16 w-16 items-center justify-center rounded-full bg-surface-container-low text-outline">
                                        <span aria-hidden="true" class="material-symbols-outlined text-3xl">inventory_2</span>
                                    </div>
                                    <h2 class="font-headline-sm font-bold text-headline-sm text-primary">Belum ada paket</h2>
                                    <p class="mt-1 max-w-sm font-body-sm text-body-sm text-on-surface-variant">Tambahkan paket pertama agar dapat dipilih saat pemesanan.</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                    <tr class="hidden" id="packagesEmptyState">
                        <td colspan="6">
                            <div class="flex flex-col items-center justify-center px-4 py-12 text-center" role="status">
                                <div class="mb-space-sm flex h-16 w-16 items-center justify-center rounded-full bg-surface-container-low text-outline">
                                    <span aria-hidden="true" class="material-symbols-outlined text-3xl">inventory_2</span>
                                </div>
                                <h2 class="font-headline-sm font-bold text-headline-sm text-primary">Tidak ada paket yang cocok</h2>
                                <p class="mt-1 max-w-sm font-body-sm text-body-sm text-on-surface-variant">Sesuaikan kata kunci atau filter status.</p>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        @if ($totalPackages > 0)
            <div class="flex flex-col items-center justify-between gap-space-sm border-t border-surface-container p-space-md font-body-sm text-body-sm text-on-surface-variant sm:flex-row">
                <span>Menampilkan <strong class="font-semibold text-on-surface" id="packagesVisibleCount">{{ $totalPackages }}</strong> dari total <strong class="font-semibold text-on-surface" id="packagesTotalCount">{{ $totalPackages }}</strong> paket lisensi</span>
                <span class="font-caption text-caption text-on-surface-variant">Urutan katalog menentukan tampil di kolom pilih paket saat pemesanan</span>
            </div>
        @endif
    </div>
</div>

<!-- Drawer: tambah / edit paket -->
<div aria-hidden="true" class="fixed inset-0 z-50 hidden" id="packageDrawerRoot">
    <div class="absolute inset-0 bg-inverse-surface/40 backdrop-blur-xs" data-package-drawer-close></div>
    <aside aria-labelledby="packageDrawerTitle" class="absolute inset-y-0 right-0 flex w-full max-w-xl translate-x-full flex-col bg-surface-container-lowest shadow-2xl transition-transform duration-300 ease-out" id="packageDrawer" role="dialog">
        <div class="flex shrink-0 items-center justify-between border-b border-surface-container bg-surface-container-low p-space-md">
            <div class="flex items-center gap-2">
                <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-primary text-on-primary">
                    <span aria-hidden="true" class="material-symbols-outlined text-lg">tune</span>
                </div>
                <div class="flex flex-col">
                    <h2 class="font-headline-sm font-bold text-headline-sm text-on-surface" id="packageDrawerTitle">Tambah Paket Baru</h2>
                    <span class="font-caption text-caption text-on-surface-variant" id="packageDrawerSubtitle">Paket baru tersedia saat pemesanan</span>
                </div>
            </div>
            <button aria-label="Tutup formulir paket" class="flex h-8 w-8 items-center justify-center rounded-lg bg-surface-container text-on-surface-variant transition-colors hover:bg-error-container hover:text-on-error-container" data-package-drawer-close id="btnClosePackageDrawer" type="button">
                <span aria-hidden="true" class="material-symbols-outlined text-base">close</span>
            </button>
        </div>
        <div class="flex-1 overflow-y-auto p-space-lg">
            <form action="{{ route('admin.packages.store') }}" class="flex flex-col gap-space-lg" data-store-url="{{ route('admin.packages.store') }}" id="packageForm" method="POST">
                @csrf
                <input id="packageFormMethod" name="_method" type="hidden" value="POST">
                <div class="hidden rounded-xl bg-error-container px-space-md py-space-sm font-body-sm text-body-sm text-on-error-container" id="packageFormErrors" role="alert"></div>
                <input id="packageFeaturesValue" name="features" type="hidden" value="">

                <div class="flex flex-col gap-space-sm">
                    <label class="font-label-md font-bold text-label-md text-on-surface" for="packageName">Nama Tier Paket <span class="text-error">*</span></label>
                    <input class="h-10 rounded-lg bg-surface-container-low px-3 font-body-sm text-body-sm text-on-surface shadow-sm transition-all focus:outline-none focus:ring-2 focus:ring-primary/20" id="packageName" name="name" required type="text">
                </div>
                <div class="flex flex-col gap-space-sm">
                    <label class="font-label-md font-bold text-label-md text-on-surface" for="packageSlug">Slug URL Publik <span class="text-error">*</span></label>
                    <div class="flex h-10 items-center overflow-hidden rounded-lg bg-surface-container-low shadow-sm">
                        <span class="select-none border-r border-surface-container bg-surface-container px-3 font-mono text-xs text-on-surface-variant">webia.id/paket/</span>
                        <input class="h-full min-w-0 flex-1 bg-transparent px-3 font-mono text-body-sm text-on-surface focus:outline-none" id="packageSlug" name="slug" required type="text">
                    </div>
                </div>
                <div class="flex flex-col gap-space-sm">
                    <label class="font-label-md font-bold text-label-md text-on-surface" for="packageDescription">Deskripsi Lisensi <span class="text-error">*</span></label>
                    <textarea class="rounded-lg bg-surface-container-low p-3 font-body-sm text-body-sm text-on-surface shadow-sm transition-all focus:outline-none focus:ring-2 focus:ring-primary/20" id="packageDescription" name="description" required rows="3"></textarea>
                    <span class="font-caption text-caption text-on-surface-variant">Tampil di halaman pilih paket saat pemesanan.</span>
                </div>
                <div class="grid grid-cols-1 gap-space-md sm:grid-cols-2">
                    <div class="flex flex-col gap-space-sm">
                        <label class="font-label-md font-bold text-label-md text-on-surface" for="packagePrice">Harga Lisensi (IDR) <span class="text-error">*</span></label>
                        <div class="relative">
                            <span class="absolute left-3 top-2.5 font-label-md text-label-md text-on-surface-variant">Rp</span>
                            <input class="h-10 w-full rounded-lg bg-surface-container-low pl-10 pr-3 font-mono font-bold text-body-sm text-on-surface shadow-sm transition-all focus:outline-none focus:ring-2 focus:ring-primary/20" id="packagePrice" min="0" name="price" required type="number">
                        </div>
                    </div>
                    <div class="flex flex-col gap-space-sm">
                        <label class="font-label-md font-bold text-label-md text-on-surface" for="packageOldPrice">Harga Sebelum Diskon <span class="font-caption text-caption text-outline">(opsional)</span></label>
                        <div class="relative">
                            <span class="absolute left-3 top-2.5 font-label-md text-label-md text-on-surface-variant">Rp</span>
                            <input class="h-10 w-full rounded-lg bg-surface-container-low pl-10 pr-3 font-mono text-body-sm text-on-surface shadow-sm transition-all focus:outline-none focus:ring-2 focus:ring-primary/20" id="packageOldPrice" min="0" name="old_price" type="number">
                        </div>
                    </div>
                    <div class="flex flex-col gap-space-sm">
                        <label class="font-label-md font-bold text-label-md text-on-surface" for="packageQuota">Kuota Chatbot / Bulan <span class="text-error">*</span></label>
                        <input class="h-10 rounded-lg bg-surface-container-low px-3 font-mono text-body-sm text-on-surface shadow-sm transition-all focus:outline-none focus:ring-2 focus:ring-primary/20" id="packageQuota" min="0" name="chatbot_monthly_quota" required type="number">
                    </div>
                    <div class="flex flex-col gap-space-sm">
                        <label class="font-label-md font-bold text-label-md text-on-surface" for="packageSort">Urutan Katalog <span class="text-error">*</span></label>
                        <input class="h-10 rounded-lg bg-surface-container-low px-3 font-mono text-body-sm text-on-surface shadow-sm transition-all focus:outline-none focus:ring-2 focus:ring-primary/20" id="packageSort" min="0" name="sort_order" required type="number">
                    </div>
                </div>
                <label class="flex cursor-pointer items-center gap-3 rounded-xl bg-surface-container-low p-3">
                    <input class="h-4 w-4 accent-secondary" id="packageCmsEnabled" name="cms_enabled" value="1" type="checkbox">
                    <span class="flex flex-col">
                        <span class="font-label-md font-bold text-label-md text-on-surface">Sertakan CMS</span>
                        <span class="font-caption text-caption text-on-surface-variant">Klien dapat mengelola konten &amp; artikel mandiri.</span>
                    </span>
                </label>
                <div class="flex flex-col gap-space-sm">
                    <div class="flex items-center justify-between">
                        <span class="font-label-md font-bold text-label-md text-on-surface">Daftar Fitur yang Diperoleh <span class="text-error">*</span></span>
                        <span class="font-caption text-caption text-on-surface-variant" id="packageFeatureCount">0 fitur terdaftar</span>
                    </div>
                    <div class="flex flex-col gap-2" id="packageFeatureList"></div>
                    <button class="flex items-center justify-center gap-1.5 rounded-lg bg-surface-container px-3 py-2 font-label-md font-bold text-label-md text-primary transition-colors hover:bg-primary-fixed" id="btnAddPackageFeature" type="button">
                        <span aria-hidden="true" class="material-symbols-outlined text-base">add_circle</span>
                        Tambah Fitur Baru
                    </button>
                </div>
                <div class="flex flex-col gap-2 pb-space-lg">
                    <span class="font-label-md font-bold text-label-md text-on-surface">Status Publikasi</span>
                    <label class="flex cursor-pointer items-start gap-3 rounded-xl bg-surface-container-low p-3 transition-colors hover:bg-surface-container">
                        <input checked class="mt-1 h-4 w-4 accent-primary" id="packagePublishActive" name="is_active" value="1" type="radio">
                        <span class="flex flex-col">
                            <span class="font-label-lg font-bold text-label-lg text-on-surface">Aktif Publik</span>
                            <span class="font-caption text-caption text-on-surface-variant">Tampil di halaman pilih paket dan langsung dapat dipesan klien.</span>
                        </span>
                    </label>
                    <label class="flex cursor-pointer items-start gap-3 rounded-xl bg-surface-container-low p-3 transition-colors hover:bg-surface-container">
                        <input class="mt-1 h-4 w-4 accent-primary" id="packagePublishDraft" name="is_active" value="0" type="radio">
                        <span class="flex flex-col">
                            <span class="font-label-lg font-bold text-label-lg text-on-surface">Draft / Nonaktif</span>
                            <span class="font-caption text-caption text-on-surface-variant">Sembunyikan dari katalog pemesanan; tetap tersimpan untuk tim internal.</span>
                        </span>
                    </label>
                </div>
            </form>
        </div>
        <div class="flex shrink-0 items-center justify-between gap-space-sm border-t border-surface-container p-space-md">
            <button class="rounded-lg bg-surface-container px-4 py-2 font-label-md font-semibold text-label-md text-on-surface transition-colors hover:bg-surface-container-high" data-package-drawer-close id="btnCancelPackageDrawer" type="button">Batal</button>
            <button class="inline-flex items-center gap-1.5 rounded-lg bg-primary px-5 py-2 font-label-md font-bold text-label-md text-on-primary shadow-sm transition-all hover:bg-primary-container disabled:opacity-60" id="btnSavePackage" type="submit" form="packageForm">
                <span aria-hidden="true" class="material-symbols-outlined text-base">save</span>
                Simpan Paket
            </button>
        </div>
    </aside>
</div>

<!-- Modal konfirmasi hapus -->
<div aria-hidden="true" class="fixed inset-0 z-50 hidden items-center justify-center p-4" id="packageDeleteModal">
    <div class="absolute inset-0 bg-inverse-surface/60 backdrop-blur-sm" data-package-delete-close></div>
    <div aria-labelledby="packageDeleteTitle" aria-modal="true" class="relative flex w-full max-w-md flex-col gap-space-md overflow-hidden rounded-xl bg-surface-container-lowest p-space-lg shadow-2xl" role="dialog">
        <div class="flex items-start gap-3">
            <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full bg-error-container text-error">
                <span aria-hidden="true" class="material-symbols-outlined text-2xl">warning</span>
            </div>
            <div class="flex flex-col">
                <h2 class="font-headline-sm font-bold text-headline-sm text-on-surface" id="packageDeleteTitle">Konfirmasi Hapus Paket</h2>
                <span class="mt-0.5 font-caption text-caption text-on-surface-variant">Tindakan ini tidak dapat dibatalkan</span>
            </div>
        </div>
        <div class="flex flex-col gap-space-sm font-body-sm text-body-sm text-on-surface-variant">
            <p>Yakin ingin menghapus <strong class="font-semibold text-on-surface" id="packageDeleteName">&quot;Paket&quot;</strong> dari katalog?</p>
            <p class="text-xs">Pembeli baru tidak akan melihat paket ini lagi. Paket yang sudah dipakai transaksi tidak dapat dihapus — nonaktifkan sebagai gantinya.</p>
            <div class="flex items-center gap-2 rounded-lg bg-error-container/40 p-2.5 font-label-sm font-semibold text-label-sm text-on-error-container">
                <span aria-hidden="true" class="material-symbols-outlined text-base">info</span>
                <span id="packageDeleteImpact">Belum ada pesanan yang memakai paket ini.</span>
            </div>
        </div>
        <form id="packageDeleteForm" method="POST">
            @csrf
            <input name="_method" type="hidden" value="DELETE">
        </form>
        <div class="flex items-center justify-end gap-space-sm pt-2">
            <button class="rounded-lg bg-surface-container px-4 py-2 font-label-md font-semibold text-label-md text-on-surface transition-colors hover:bg-surface-container-high" data-package-delete-close id="btnCancelPackageDelete" type="button">Batal</button>
            <button class="inline-flex items-center gap-1.5 rounded-lg bg-error px-4 py-2 font-label-md font-bold text-label-md text-on-error shadow-sm transition-all hover:bg-on-error-container disabled:opacity-60" id="btnConfirmPackageDelete" type="submit" form="packageDeleteForm">
                <span aria-hidden="true" class="material-symbols-outlined text-base">delete</span>
                Ya, Hapus Paket
            </button>
        </div>
    </div>
</div>
@endsection
