@props(['status', 'tone' => null, 'label' => null])
@php
    $resolvedLabel = $label ?? str_replace('_', ' ', ucfirst($status));
    $resolvedTone = match ($status) {
        'paid', 'delivered' => 'success',
        'awaiting_payment', 'not_started' => 'warning',
        'payment_uploaded', 'in_progress' => 'info',
        'rejected' => 'danger',
        default => 'muted',
    };
@endphp
<span class="status-pill status-pill--{{ $tone ?? $resolvedTone }}">{{ $resolvedLabel }}</span>
