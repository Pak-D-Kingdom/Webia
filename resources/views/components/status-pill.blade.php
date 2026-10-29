@props(['status', 'tone' => null, 'label' => null])

@php
    // Indonesian label mapping for consumer UI
    $labelMap = [
        'awaiting_payment' => 'Menunggu Pembayaran',
        'payment_uploaded' => 'Bukti Dikirim',
        'paid' => 'Lunas',
        'rejected' => 'Ditolak',
        'not_started' => 'Belum Mulai',
        'in_progress' => 'Sedang Dikerjakan',
        'delivered' => 'Selesai',
    ];
    $resolvedLabel = $label ?? $labelMap[$status] ?? str_replace('_', ' ', ucfirst($status));
    $resolvedTone = match ($status) {
        'paid', 'delivered' => 'success',
        'awaiting_payment', 'not_started' => 'warning',
        'payment_uploaded', 'in_progress' => 'info',
        'rejected' => 'danger',
        default => 'muted',
    };
    // Safely determine CSS class without operator precedence issues
    $pillClass = $tone ?? ($resolvedTone === 'muted' ? 'status-pill-muted' : 'status-pill--' . $resolvedTone);
@endphp
<span class="status-pill {{ $pillClass }}">{{ $resolvedLabel }}</span>
