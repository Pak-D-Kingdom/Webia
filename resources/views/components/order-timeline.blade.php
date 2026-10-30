@props(['order', 'payment' => null])

@php
    $steps = [
        ['label' => 'Pesanan dibuat', 'icon' => 'receipt_long'],
        ['label' => 'Pembayaran', 'icon' => 'payments'],
        ['label' => 'Data bisnis', 'icon' => 'edit_note'],
        ['label' => 'Pengerjaan', 'icon' => 'engineering'],
        ['label' => 'Website selesai', 'icon' => 'check_circle'],
    ];
    $progress = $order?->progress_index ?? -1;
    $activeStateLabel = match ($order?->status) {
        'awaiting_payment' => 'Menunggu pembayaran',
        'payment_uploaded' => 'Menunggu verifikasi',
        'paid' => 'Aktif',
        default => 'Aktif',
    };
@endphp
<ol class="customer-steps" aria-label="Tahap pengerjaan pesanan">
    @foreach ($steps as $index => $step)
        @php
            $done = $index < $progress;
            $active = $index === $progress;
            $date = match ($index) {
                0 => $order?->created_at?->translatedFormat('d M Y'),
                1 => $payment?->created_at ?? $order?->logs->where('to_status', 'payment_uploaded')->last()?->created_at?->translatedFormat('d M Y'),
                default => null,
            };
        @endphp
        <li class="customer-step @if ($done) is-done @elseif (! $active) is-idle @endif" @if ($active) aria-current="step" @endif>
            <span class="customer-step-dot" aria-hidden="true">
                <span class="material-symbols-outlined">{{ $done ? 'check' : $step['icon'] }}</span>
            </span>
            <span class="customer-step-label">{{ $step['label'] }}</span>
            <span class="customer-step-state">{{ $done ? 'Selesai' : ($active ? $activeStateLabel : 'Belum dimulai') }}</span>
            @if ($date)
                <span class="customer-step-date">{{ $date }}</span>
            @endif
        </li>
    @endforeach
</ol>
