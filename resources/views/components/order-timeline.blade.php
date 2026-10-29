@php
    $steps = [
        ['label' => 'Pesanan dibuat', 'icon' => 'receipt_long'],
        ['label' => 'Pembayaran', 'icon' => 'payments'],
        ['label' => 'Data bisnis', 'icon' => 'edit_note'],
        ['label' => 'Pengerjaan', 'icon' => 'engineering'],
        ['label' => 'Selesai', 'icon' => 'done_all'],
    ];
@endphp
<ol class="customer-steps" aria-label="Tahap pengerjaan pesanan">
    @foreach ($steps as $index => $step)
        @php
            $done = $index < $order->progress_index;
            $active = $index === $order->progress_index;
        @endphp
        <li class="customer-step @if ($done) is-done @elseif (! $active) is-idle @endif" @if ($active) aria-current="step" @endif>
            <span class="customer-step-dot" aria-hidden="true">
                <span class="material-symbols-outlined">{{ $done ? 'check' : $step['icon'] }}</span>
            </span>
            <span class="customer-step-label">{{ $step['label'] }}</span>
            <span class="customer-step-state">{{ $done ? 'Selesai' : ($active ? 'Aktif' : 'Belum') }}</span>
        </li>
    @endforeach
</ol>
