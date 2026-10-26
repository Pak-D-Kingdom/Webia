<ol class="order-steps" aria-label="Progres pesanan">
    @foreach (['Menunggu pembayaran', 'Diperiksa admin', 'Dibayar', 'Dikerjakan', 'Selesai'] as $index => $step)
        <li @if ($index === $order->progress_index) aria-current="step" @endif>
            <span class="order-step-state" aria-hidden="true">{{ $index < $order->progress_index ? '✓' : $index + 1 }}</span>
            {{ $step }}
        </li>
    @endforeach
</ol>
