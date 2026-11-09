@extends('auth.layout')

@section('title', 'Tambah Layanan Hosting')

@section('content')
    <div class="mx-auto flex w-full max-w-2xl flex-col gap-space-md py-space-md">
        <div>
            <a class="text-sm font-semibold text-primary hover:underline" href="{{ route('admin.hosting-services.index') }}">Kembali ke layanan hosting</a>
            <h1 class="mt-3 font-headline-lg text-headline-lg font-bold text-on-surface">Tambah layanan hosting</h1>
            <p class="mt-1 text-on-surface-variant">Bulan pertama otomatis dicatat gratis mulai tanggal aktivasi.</p>
        </div>

        <form class="flex flex-col gap-5 rounded-xl border border-outline-variant bg-surface-container-lowest p-margin-md" method="POST" action="{{ route('admin.hosting-services.store') }}">
            @csrf
            <label class="flex flex-col gap-1.5 font-semibold text-on-surface">Pelanggan
                <select class="min-h-11 rounded-lg border border-outline-variant bg-surface px-3 font-normal" name="user_id" required>
                    <option value="">Pilih pelanggan</option>
                    @foreach ($customers as $customer)
                        <option value="{{ $customer->id }}" @selected(old('user_id') == $customer->id)>{{ $customer->name }} ({{ $customer->email }})</option>
                    @endforeach
                </select>
                @error('user_id') <span class="text-sm text-error">{{ $message }}</span> @enderror
            </label>
            <label class="flex flex-col gap-1.5 font-semibold text-on-surface">Nama website
                <input class="min-h-11 rounded-lg border border-outline-variant bg-surface px-3 font-normal" name="website_name" value="{{ old('website_name') }}" maxlength="255" required>
                @error('website_name') <span class="text-sm text-error">{{ $message }}</span> @enderror
            </label>
            <label class="flex flex-col gap-1.5 font-semibold text-on-surface">Domain
                <input class="min-h-11 rounded-lg border border-outline-variant bg-surface px-3 font-normal" name="domain" value="{{ old('domain') }}" placeholder="contoh.id" maxlength="255" required>
                @error('domain') <span class="text-sm text-error">{{ $message }}</span> @enderror
            </label>
            <label class="flex flex-col gap-1.5 font-semibold text-on-surface">Biaya bulanan
                <input class="min-h-11 rounded-lg border border-outline-variant bg-surface px-3 font-normal" name="monthly_price" value="{{ old('monthly_price') }}" type="number" min="1" required>
                @error('monthly_price') <span class="text-sm text-error">{{ $message }}</span> @enderror
            </label>
            <label class="flex flex-col gap-1.5 font-semibold text-on-surface">Tanggal aktivasi
                <input class="min-h-11 rounded-lg border border-outline-variant bg-surface px-3 font-normal" name="activation_date" value="{{ old('activation_date', now()->toDateString()) }}" type="date" min="{{ now()->toDateString() }}" required>
                @error('activation_date') <span class="text-sm text-error">{{ $message }}</span> @enderror
            </label>
            <button class="min-h-11 rounded-lg bg-primary px-4 font-semibold text-on-primary focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary" type="submit">Jadwalkan layanan</button>
        </form>
    </div>
@endsection
