@extends('auth.layout')

@section('title', 'Layanan Hosting')

@section('content')
    <div class="flex flex-col gap-space-md py-space-md">
        <div class="flex flex-wrap items-center justify-between gap-space-sm">
            <div>
                <h1 class="font-headline-lg text-headline-lg font-bold text-on-surface">Layanan Hosting</h1>
                <p class="mt-1 text-on-surface-variant">Kelola siklus tagihan setiap website pelanggan.</p>
            </div>
            <a class="inline-flex min-h-11 items-center rounded-lg bg-primary px-4 font-label-md font-semibold text-on-primary focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary" href="{{ route('admin.hosting-services.create') }}">Tambah layanan</a>
        </div>

        @if ($services->isEmpty())
            <div class="rounded-xl border border-outline-variant bg-surface-container-lowest p-margin-md">
                <h2 class="font-headline-sm font-bold text-on-surface">Belum ada layanan hosting</h2>
                <p class="mt-1 text-on-surface-variant">Tambahkan website pelanggan untuk memulai bulan gratis.</p>
            </div>
        @else
            <div class="overflow-x-auto rounded-xl border border-outline-variant bg-surface-container-lowest">
                <table class="min-w-full text-left text-sm">
                    <thead class="bg-surface-container text-on-surface-variant">
                        <tr><th class="p-3">Website</th><th class="p-3">Pelanggan</th><th class="p-3">Biaya</th><th class="p-3">Status</th><th class="p-3">Aksi</th></tr>
                    </thead>
                    <tbody class="divide-y divide-outline-variant">
                        @foreach ($services as $service)
                            <tr>
                                <td class="p-3"><strong class="block text-on-surface">{{ $service->website_name }}</strong><span class="text-on-surface-variant">{{ $service->domain }}</span></td>
                                <td class="p-3">{{ $service->user->name }}</td>
                                <td class="p-3">Rp{{ number_format($service->monthly_price, 0, ',', '.') }}</td>
                                <td class="p-3"><x-status-pill :status="$service->billing_status" /></td>
                                <td class="p-3"><a class="font-semibold text-primary underline-offset-4 hover:underline" href="{{ route('admin.hosting-services.show', $service) }}">Detail</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            {{ $services->links() }}
        @endif
    </div>
@endsection
