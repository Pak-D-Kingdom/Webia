@props([
    'id',
    'title',
    'subtitle' => null,
    'icon' => 'info',
    'tone' => 'default',
    'variant' => 'sheet',
    'open' => false,
])

@php
    $toneClass = $tone !== 'default' ? ' customer-modal--' . $tone : '';
    $variantClass = $variant === 'fullscreen' ? ' customer-modal--fullscreen' : '';
@endphp

<div id="{{ $id }}"
    class="customer-modal{{ $toneClass }}{{ $variantClass }}"
    data-customer-modal
    @if ($open) data-modal-autoopen @endif
    {{ $attributes->except(['role']) }}>
    <div class="customer-modal-scrim" data-modal-close></div>
    <div role="dialog" aria-modal="true" aria-labelledby="{{ $id }}-title" @if ($subtitle) aria-describedby="{{ $id }}-sub" @endif
        class="customer-modal-card">
        <div class="customer-modal-head">
            <span class="customer-modal-icon" aria-hidden="true">
                <span class="material-symbols-outlined">{{ $icon }}</span>
            </span>
            <div>
                <h2 class="customer-modal-title" id="{{ $id }}-title">{{ $title }}</h2>
                @if ($subtitle)
                    <p class="customer-modal-sub" id="{{ $id }}-sub">{{ $subtitle }}</p>
                @endif
            </div>
        </div>
        <div class="customer-modal-body">
            {{ $slot }}
        </div>
        @if (isset($actions))
            <div class="customer-modal-actions">
                {{ $actions }}
            </div>
        @endif
    </div>
</div>
