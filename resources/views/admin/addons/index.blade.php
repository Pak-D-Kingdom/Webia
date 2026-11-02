@extends('auth.layout')

@section('title', 'Add-on')

@section('content')
@php
    $totalAddons = $addons->count();
    $activeAddons = $addons->where('is_active')->count();
    $pricedAddons = $addons->filter(fn ($a) => $a->price !== null);
    $avgPrice = $pricedAddons->isNotEmpty() ? (int) round($pricedAddons->avg('price')) : 0;
    $topAddon = $addons->sortByDesc('usage_count')->first();
@endphp
<div class="flex w-full flex-col gap-space-md">
    <!-- Header -->
    <div class="mb-space-lg mt-space-lg flex flex-col justify-between gap-space-md lg:flex-row xl:items-end">
        <div class="flex flex-col">
            <div class="flex flex-wrap items-center gap-space-sm">
                <h1 class="font-headline-lg font-extrabold text-headline-lg text-primary tracking-tight" id="admin-addons-title">Manajemen Add-on Layanan</h1>
                <span class="inline-flex items-center gap-1.5 rounded-full bg-secondary-container px-2.5 py-1 font-label-sm font-bold text-label-sm text-on-secondary-container shadow-sm">
                    <span aria-hidden="true" class="h-1.5 w-1.5 animate-pulse rounded-full bg-secondary"></span>
                    <span id="addonsActiveBadge">{{ $activeAddons }} Add-on Aktif</span>
                </span>
            </div>
            <p class="mt-0.5 max-w-2xl font-body-md text-body-md text-on-surface-variant">Kelola layanan tambahan yang dapat dipilih klien saat pemesanan: harga, deskripsi, dan ketersediaan di kolom pilih add-on.</p>
        </div>
        <button class="inline-flex h-9 shrink-0 items-center gap-1.5 self-start rounded-lg bg-primary px-3.5 font-label-md font-bold text-label-md text-on-primary shadow-sm transition-all hover:bg-primary-container active:scale-[0.98] md:self-auto" data-addon-drawer-create id="btnOpenCreateAddon" type="button">
            <span aria-hidden="true" class="material-symbols-outlined text-lg">add</span>
            Tambah Add-on Baru
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
                <span class="font-label-md text-label-md tracking-wide text-on-surface-variant">Total Add-on</span>
                <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-primary-fixed text-primary">
                    <span aria-hidden="true" class="material-symbols-outlined text-lg">extension</span>
                </div>
            </div>
            <div class="mt-space-sm flex items-baseline gap-space-sm">
                <span class="font-display font-extrabold text-display text-primary tracking-tight">{{ $totalAddons }}</span>
                <span class="font-label-md text-label-md text-on-surface-variant">Layanan</span>
            </div>
            <div class="mt-space-xs">
                <span class="block truncate font-caption text-caption text-on-surface-variant">{{ $totalAddons ? $addons->pluck('name')->implode(', ') : 'Belum ada add-on' }}</span>
            </div>
        </div>
        <div class="group relative overflow-hidden rounded-xl bg-surface-container-lowest p-space-md shadow-sm transition-all hover:shadow-md">
            <div aria-hidden="true" class="absolute left-0 top-0 h-full w-1.5 bg-amber-500"></div>
            <div class="flex items-start justify-between">
                <span class="font-label-md text-label-md tracking-wide text-on-surface-variant">Add-on Aktif</span>
                <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-amber-50 text-amber-700">
                    <span aria-hidden="true" class="material-symbols-outlined text-lg">publish</span>
                </div>
            </div>
            <div class="mt-space-sm flex items-baseline gap-space-sm">
                <span class="font-display font-extrabold text-display text-on-surface tracking-tight"><span id="addonsActiveCount">{{ $activeAddons }}</span></span>
                <span class="font-label-md text-label-md text-on-surface-variant">Terkatalog</span>
            </div>
            <div class="mt-space-xs">
                <span class="rounded bg-surface-container-low px-2 py-0.5 font-caption text-caption text-on-surface-variant"><span id="addonsInactiveCount">{{ $totalAddons - $activeAddons }}</span> nonaktif</span>
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
                <span class="font-display font-extrabold text-display text-primary tracking-tight">{{ $avgPrice ? 'Rp '.number_format($avgPrice, 0, ',', '.') : '—' }}</span>
            </div>
            <div class="mt-space-xs flex items-center justify-between">
                <span class="rounded bg-surface-container-low px-2 py-0.5 font-caption text-caption text-on-surface-variant">add-on berharga</span>
                <span class="tabular-nums font-caption text-caption text-on-surface-variant">{{ $pricedAddons->count().' dari '.$totalAddons }}</span>
            </div>
        </div>
        <div class="group relative overflow-hidden rounded-xl bg-surface-container-lowest p-space-md shadow-sm transition-all hover:shadow-md">
            <div aria-hidden="true" class="absolute left-0 top-0 h-full w-1.5 bg-green-600"></div>
            <div class="flex items-start justify-between">
                <span class="font-label-md text-label-md tracking-wide text-on-surface-variant">Add-on Terlaris</span>
                <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-green-50 text-green-700">
                    <span aria-hidden="true" class="material-symbols-outlined text-lg">local_fire_department</span>
                </div>
            </div>
            <div class="mt-space-sm">
                <h3 class="truncate font-headline-sm font-bold text-headline-sm text-on-surface">{{ $topAddon && $topAddon->usage_count > 0 ? $topAddon->name : '—' }}</h3>
                <p class="mt-1 font-caption text-caption text-on-surface-variant">{{ $topAddon && $topAddon->usage_count > 0 ? 'Dipesan di '.$topAddon->usage_count.' pesanan' : 'Belum ada add-on yang dipesan' }}</p>
            </div>
        </div>
    </div>

    <!-- Data table -->
    <div class="flex flex-col overflow-hidden rounded-xl bg-surface-container-lowest shadow-sm">
        <!-- Toolbar: search, status, urutan -->
        <div class="flex flex-col items-stretch justify-between gap-space-sm bg-surface-container-low p-space-md lg:flex-row lg:items-center">
            <div class="relative flex w-full items-center lg:w-96">
                <span aria-hidden="true" class="material-symbols-outlined pointer-events-none absolute left-space-sm text-lg text-outline">search</span>
                <input aria-label="Cari add-on" class="h-9 w-full rounded-lg bg-surface-container-lowest pl-9 pr-3 font-body-sm text-body-sm text-on-surface transition-all placeholder:text-outline focus:outline-none focus:ring-2 focus:ring-primary/20" id="addonSearch" placeholder="Cari nama atau deskripsi add-on..." type="text">
            </div>
            <div class="flex flex-wrap items-center gap-space-xs">
                <label class="flex h-9 items-center gap-1.5 rounded-lg bg-surface-container-lowest px-2.5 shadow-sm" for="addonFilterStatus">
                    <span class="font-caption text-caption text-on-surface-variant">Status:</span>
                    <select class="cursor-pointer bg-transparent font-label-md font-semibold text-label-md text-on-surface focus:outline-none" id="addonFilterStatus">
                        <option value="all">Semua Status</option>
                        <option value="1">Aktif saja</option>
                        <option value="0">Nonaktif saja</option>
                    </select>
                </label>
                <label class="flex h-9 items-center gap-1.5 rounded-lg bg-surface-container-lowest px-2.5 shadow-sm" for="addonSortBy">
                    <span class="font-caption text-caption text-on-surface-variant">Urutkan:</span>
                    <select class="cursor-pointer bg-transparent font-label-md font-semibold text-label-md text-on-surface focus:outline-none" id="addonSortBy">
                        <option value="popular">Terpopuler</option>
                        <option value="price_asc">Harga Terendah</option>
                        <option value="price_desc">Harga Tertinggi</option>
                        <option value="name">Nama A–Z</option>
                    </select>
                </label>
            </div>
        </div>
        <div class="w-full overflow-x-auto">
            <table class="select-text w-full text-left" id="addonsTable">
                <thead>
                    <tr class="border-b border-surface-container uppercase tracking-wider text-on-surface-variant">
                        <th class="px-3 py-space-sm font-label-sm font-bold text-label-sm md:px-4">Nama Add-on &amp; Deskripsi</th>
                        <th class="px-3 py-space-sm text-right font-label-sm font-bold text-label-sm md:px-4">Harga (IDR)</th>
                        <th class="px-3 py-space-sm text-center font-label-sm font-bold text-label-sm md:px-4">Pesanan</th>
                        <th class="px-3 py-space-sm text-center font-label-sm font-bold text-label-sm md:px-4">Status</th>
                        <th class="px-3 py-space-sm text-center font-label-sm font-bold text-label-sm md:px-4">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-surface-container font-body-sm text-body-sm text-on-surface">
                    @forelse ($addons as $addon)
                        <tr class="transition-colors hover:bg-surface-container-low/60"
                            data-active="{{ $addon->is_active ? '1' : '0' }}"
                            data-addon-id="{{ $addon->id }}"
                            data-delete-url="{{ route('admin.addons.destroy', $addon) }}"
                            data-description="{{ $addon->description }}"
                            data-name="{{ $addon->name }}"
                            data-orders="{{ $addon->usage_count }}"
                            data-price="{{ $addon->price }}"
                            data-update-url="{{ route('admin.addons.update', $addon) }}">
                            <td class="px-3 py-3.5 md:px-4">
                                <div class="flex min-w-0 flex-col">
                                    <span class="truncate font-label-lg font-bold text-label-lg {{ $addon->is_active ? 'text-on-surface' : 'text-on-surface-variant' }}">{{ $addon->name }}</span>
                                    <span class="line-clamp-1 font-body-sm text-body-sm {{ $addon->is_active ? 'text-on-surface-variant' : 'text-outline' }}">{{ $addon->description }}</span>
                                </div>
                            </td>
                            <td class="whitespace-nowrap px-3 py-3.5 text-right font-mono font-bold md:px-4 {{ $addon->is_active ? 'text-on-surface' : 'text-on-surface-variant' }}">{{ $addon->price !== null ? 'Rp '.number_format($addon->price, 0, ',', '.') : '—' }}</td>
                            <td class="whitespace-nowrap px-3 py-3.5 text-center md:px-4">
                                <span class="inline-flex items-center rounded-full bg-surface-container px-2.5 py-0.5 font-label-sm font-semibold text-label-sm text-on-surface">{{ $addon->usage_count }} pesanan</span>
                            </td>
                            <td class="px-3 py-3.5 text-center md:px-4">
                                <form action="{{ route('admin.addons.toggle', $addon) }}" data-addon-toggle method="POST">
                                    @csrf
                                    <button class="inline-flex items-center gap-2 select-none" title="{{ $addon->is_active ? 'Nonaktifkan add-on' : 'Aktifkan add-on' }}" type="submit">
                                        <span aria-hidden="true" class="relative h-5 w-9 rounded-full transition-colors {{ $addon->is_active ? 'bg-secondary' : 'bg-surface-container-highest' }}">
                                            <span class="absolute left-[2px] top-[2px] h-4 w-4 rounded-full bg-white shadow transition-transform {{ $addon->is_active ? 'translate-x-4' : '' }}"></span>
                                        </span>
                                        <span class="font-label-sm font-bold text-label-sm {{ $addon->is_active ? 'text-secondary' : 'text-on-surface-variant' }}">{{ $addon->is_active ? 'Aktif' : 'Nonaktif' }}</span>
                                    </button>
                                </form>
                            </td>
                            <td class="px-3 py-3.5 text-center md:px-4">
                                <div class="flex items-center justify-center gap-1">
                                    <button class="inline-flex items-center gap-1 rounded px-2 py-1 font-label-sm font-bold text-label-sm text-primary transition-colors hover:bg-surface-container" data-addon-edit type="button">
                                        <span aria-hidden="true" class="material-symbols-outlined text-base">edit</span>Edit
                                    </button>
                                    <button aria-label="Hapus add-on {{ $addon->name }}" class="rounded p-1 text-on-surface-variant transition-colors hover:bg-error-container hover:text-error" data-addon-delete title="Hapus add-on" type="button">
                                        <span aria-hidden="true" class="material-symbols-outlined text-base">delete</span>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5">
                                <div class="flex flex-col items-center justify-center px-4 py-12 text-center" role="status">
                                    <div class="mb-space-sm flex h-16 w-16 items-center justify-center rounded-full bg-surface-container-low text-outline">
                                        <span aria-hidden="true" class="material-symbols-outlined text-3xl">extension</span>
                                    </div>
                                    <h2 class="font-headline-sm font-bold text-headline-sm text-primary">Belum ada add-on</h2>
                                    <p class="mt-1 max-w-sm font-body-sm text-body-sm text-on-surface-variant">Tambahkan layanan tambahan agar dapat dipilih klien saat pemesanan.</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                    <tr class="hidden" id="addonsEmptyState">
                        <td colspan="5">
                            <div class="flex flex-col items-center justify-center px-4 py-12 text-center" role="status">
                                <div class="mb-space-sm flex h-16 w-16 items-center justify-center rounded-full bg-surface-container-low text-outline">
                                    <span aria-hidden="true" class="material-symbols-outlined text-3xl">extension</span>
                                </div>
                                <h2 class="font-headline-sm font-bold text-headline-sm text-primary">Tidak ada add-on yang cocok</h2>
                                <p class="mt-1 max-w-sm font-body-sm text-body-sm text-on-surface-variant">Sesuaikan kata kunci atau filter status.</p>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        @if ($totalAddons > 0)
            <div class="flex flex-col items-center justify-between gap-space-sm border-t border-surface-container p-space-md font-body-sm text-body-sm text-on-surface-variant sm:flex-row">
                <span>Menampilkan <strong class="font-semibold text-on-surface" id="addonsVisibleCount">{{ $totalAddons }}</strong> dari total <strong class="font-semibold text-on-surface">{{ $totalAddons }}</strong> add-on layanan</span>
                <span class="font-caption text-caption text-on-surface-variant">Riwayat pesanan lama tetap aman karena snapshot tersimpan saat checkout</span>
            </div>
        @endif
    </div>
</div>

<!-- Drawer: tambah / edit add-on -->
<div aria-hidden="true" class="fixed inset-0 z-50 hidden" id="addonDrawerRoot">
    <div class="absolute inset-0 bg-inverse-surface/40 backdrop-blur-xs" data-addon-drawer-close></div>
    <aside aria-labelledby="addonDrawerTitle" class="absolute inset-y-0 right-0 flex w-full max-w-xl translate-x-full flex-col bg-surface-container-lowest shadow-2xl transition-transform duration-300 ease-out" id="addonDrawer" role="dialog">
        <div class="flex shrink-0 items-center justify-between border-b border-surface-container bg-surface-container-low p-space-md">
            <div class="flex items-center gap-2">
                <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-primary text-on-primary">
                    <span aria-hidden="true" class="material-symbols-outlined text-lg">tune</span>
                </div>
                <div class="flex flex-col">
                    <h2 class="font-headline-sm font-bold text-headline-sm text-on-surface" id="addonDrawerTitle">Tambah Add-on Baru</h2>
                    <span class="font-caption text-caption text-on-surface-variant" id="addonDrawerSubtitle">Add-on baru langsung tersedia saat pemesanan</span>
                </div>
            </div>
            <button aria-label="Tutup formulir add-on" class="flex h-8 w-8 items-center justify-center rounded-lg bg-surface-container text-on-surface-variant transition-colors hover:bg-error-container hover:text-on-error-container" data-addon-drawer-close id="btnCloseAddonDrawer" type="button">
                <span aria-hidden="true" class="material-symbols-outlined text-base">close</span>
            </button>
        </div>
        <div class="flex-1 overflow-y-auto p-space-lg">
            <form action="{{ route('admin.addons.store') }}" class="flex flex-col gap-space-lg" data-store-url="{{ route('admin.addons.store') }}" id="addonForm" method="POST">
                @csrf
                <input id="addonFormMethod" name="_method" type="hidden" value="POST">
                <div class="hidden rounded-xl bg-error-container px-space-md py-space-sm font-body-sm text-body-sm text-on-error-container" id="addonFormErrors" role="alert"></div>

                <div class="flex flex-col gap-space-sm">
                    <label class="font-label-md font-bold text-label-md text-on-surface" for="addonName">Nama Add-on Layanan <span class="text-error">*</span></label>
                    <input class="h-10 rounded-lg bg-surface-container-low px-3 font-body-sm text-body-sm text-on-surface shadow-sm transition-all focus:outline-none focus:ring-2 focus:ring-primary/20" id="addonName" name="name" required type="text">
                </div>
                <div class="flex flex-col gap-space-sm">
                    <label class="font-label-md font-bold text-label-md text-on-surface" for="addonDescription">Deskripsi Layanan <span class="text-error">*</span></label>
                    <textarea class="rounded-lg bg-surface-container-low p-3 font-body-sm text-body-sm text-on-surface shadow-sm transition-all focus:outline-none focus:ring-2 focus:ring-primary/20" id="addonDescription" name="description" required rows="4"></textarea>
                    <span class="font-caption text-caption text-on-surface-variant">Maksimal 500 karakter; tampil di halaman pilih add-on saat pemesanan.</span>
                </div>
                <div class="flex flex-col gap-space-sm">
                    <label class="font-label-md font-bold text-label-md text-on-surface" for="addonPrice">Harga Add-on (IDR) <span class="font-caption text-caption text-outline">(kosongkan bila gratis)</span></label>
                    <div class="relative">
                        <span class="absolute left-3 top-2.5 font-label-md text-label-md text-on-surface-variant">Rp</span>
                        <input class="h-10 w-full rounded-lg bg-surface-container-low pl-10 pr-3 font-mono font-bold text-body-sm text-on-surface shadow-sm transition-all focus:outline-none focus:ring-2 focus:ring-primary/20" id="addonPrice" min="0" name="price" type="number">
                    </div>
                </div>
                <div class="flex flex-col gap-2 pb-space-lg">
                    <span class="font-label-md font-bold text-label-md text-on-surface">Status Ketersediaan</span>
                    <label class="flex cursor-pointer items-start gap-3 rounded-xl bg-surface-container-low p-3 transition-colors hover:bg-surface-container">
                        <input checked class="mt-1 h-4 w-4 accent-primary" id="addonPublishActive" name="is_active" value="1" type="radio">
                        <span class="flex flex-col">
                            <span class="font-label-lg font-bold text-label-lg text-on-surface">Aktif di Checkout</span>
                            <span class="font-caption text-caption text-on-surface-variant">Tampil sebagai opsi pilihan pelanggan saat membeli template.</span>
                        </span>
                    </label>
                    <label class="flex cursor-pointer items-start gap-3 rounded-xl bg-surface-container-low p-3 transition-colors hover:bg-surface-container">
                        <input class="mt-1 h-4 w-4 accent-primary" id="addonPublishDraft" name="is_active" value="0" type="radio">
                        <span class="flex flex-col">
                            <span class="font-label-lg font-bold text-label-lg text-on-surface">Draft / Nonaktif</span>
                            <span class="font-caption text-caption text-on-surface-variant">Hanya tampil di panel admin; tersembunyi dari kolom pilih add-on.</span>
                        </span>
                    </label>
                </div>
            </form>
        </div>
        <div class="flex shrink-0 items-center justify-between gap-space-sm border-t border-surface-container p-space-md">
            <button class="rounded-lg bg-surface-container px-4 py-2 font-label-md font-semibold text-label-md text-on-surface transition-colors hover:bg-surface-container-high" data-addon-drawer-close id="btnCancelAddonDrawer" type="button">Batal</button>
            <button class="inline-flex items-center gap-1.5 rounded-lg bg-primary px-5 py-2 font-label-md font-bold text-label-md text-on-primary shadow-sm transition-all hover:bg-primary-container disabled:opacity-60" id="btnSaveAddon" type="submit" form="addonForm">
                <span aria-hidden="true" class="material-symbols-outlined text-base">save</span>
                Simpan Add-on
            </button>
        </div>
    </aside>
</div>

<!-- Modal konfirmasi hapus -->
<div aria-hidden="true" class="fixed inset-0 z-50 hidden items-center justify-center p-4" id="addonDeleteModal">
    <div class="absolute inset-0 bg-inverse-surface/60 backdrop-blur-sm" data-addon-delete-close></div>
    <div aria-labelledby="addonDeleteTitle" aria-modal="true" class="relative flex w-full max-w-md flex-col gap-space-md overflow-hidden rounded-xl bg-surface-container-lowest p-space-lg shadow-2xl" role="dialog">
        <div class="flex items-start gap-3">
            <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full bg-error-container text-error">
                <span aria-hidden="true" class="material-symbols-outlined text-2xl">warning</span>
            </div>
            <div class="flex flex-col">
                <h2 class="font-headline-sm font-bold text-headline-sm text-on-surface" id="addonDeleteTitle">Konfirmasi Hapus Add-on</h2>
                <span class="mt-0.5 font-caption text-caption text-on-surface-variant">Tindakan ini tidak dapat dibatalkan</span>
            </div>
        </div>
        <div class="flex flex-col gap-space-sm font-body-sm text-body-sm text-on-surface-variant">
            <p>Yakin ingin menghapus <strong class="font-semibold text-on-surface" id="addonDeleteName">&quot;Add-on&quot;</strong> dari katalog?</p>
            <p class="text-xs">Pembeli baru tidak akan melihat add-on ini lagi. Pesanan lama yang memakainya tetap aman karena datanya tersimpan sebagai snapshot saat checkout.</p>
            <div class="flex items-center gap-2 rounded-lg bg-error-container/40 p-2.5 font-label-sm font-semibold text-label-sm text-on-error-container">
                <span aria-hidden="true" class="material-symbols-outlined text-base">info</span>
                <span id="addonDeleteImpact">Belum ada pesanan yang memakai add-on ini.</span>
            </div>
        </div>
        <form id="addonDeleteForm" method="POST">
            @csrf
        </form>
        <div class="flex items-center justify-end gap-space-sm pt-2">
            <button class="rounded-lg bg-surface-container px-4 py-2 font-label-md font-semibold text-label-md text-on-surface transition-colors hover:bg-surface-container-high" data-addon-delete-close id="btnCancelAddonDelete" type="button">Batal</button>
            <button class="inline-flex items-center gap-1.5 rounded-lg bg-error px-4 py-2 font-label-md font-bold text-label-md text-on-error shadow-sm transition-all hover:bg-on-error-container disabled:opacity-60" id="btnConfirmAddonDelete" type="submit" form="addonDeleteForm">
                <span aria-hidden="true" class="material-symbols-outlined text-base">delete</span>
                Ya, Hapus Add-on
            </button>
        </div>
    </div>
</div>
@endsection
