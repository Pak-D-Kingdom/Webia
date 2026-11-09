@extends('auth.layout')

@section('title', 'Tugas Hosting')

@section('content')
    <div class="flex flex-col gap-space-md py-space-md">
        <div><h1 class="font-headline-lg text-headline-lg font-bold text-on-surface">Tugas Hosting</h1><p class="mt-1 text-on-surface-variant">Konfirmasi setelah tindakan pada hosting selesai dilakukan.</p></div>
        @if (session('status')) <p class="rounded-lg bg-primary-fixed p-3 text-primary" role="status">{{ session('status') }}</p> @endif
        @if ($tasks->isEmpty())
            <div class="rounded-xl border border-outline-variant bg-surface-container-lowest p-margin-md"><h2 class="font-headline-sm font-bold text-on-surface">Tidak ada tugas tertunda</h2><p class="mt-1 text-on-surface-variant">Tugas suspend atau aktivasi akan tampil saat diperlukan.</p></div>
        @else
            <div class="flex flex-col gap-3">
                @foreach ($tasks as $task)
                    <article class="flex flex-wrap items-center justify-between gap-4 rounded-xl border border-outline-variant bg-surface-container-lowest p-4">
                        <div><p class="text-sm text-on-surface-variant">{{ $task->service->user->name }}</p><h2 class="font-semibold text-on-surface">{{ $task->type === 'suspend_hosting' ? 'Suspend hosting' : 'Aktifkan hosting' }}: {{ $task->service->website_name }}</h2><p class="text-sm text-on-surface-variant">{{ $task->service->domain }}</p></div>
                        <form method="POST" action="{{ route('admin.hosting-tasks.complete', $task) }}">@csrf<button class="min-h-11 rounded-lg bg-primary px-4 font-semibold text-on-primary" type="submit">Tandai selesai</button></form>
                    </article>
                @endforeach
            </div>
            {{ $tasks->links() }}
        @endif
    </div>
@endsection
