@if ($paginator->hasPages())
    <nav class="admin-pagination" aria-label="Halaman pesanan">
        @if ($paginator->onFirstPage())
            <span class="admin-pagination-cell" aria-disabled="true" aria-label="Halaman sebelumnya">&laquo;</span>
        @else
            <a class="admin-pagination-cell" href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="Halaman sebelumnya">&laquo;</a>
        @endif

        <span class="admin-pagination-cell" aria-current="page">{{ __('Halaman :page dari :last', ['page' => $paginator->currentPage(), 'last' => $paginator->lastPage()]) }}</span>

        @if ($paginator->hasMorePages())
            <a class="admin-pagination-cell" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="Halaman berikutnya">&raquo;</a>
        @else
            <span class="admin-pagination-cell" aria-disabled="true" aria-label="Halaman berikutnya">&raquo;</span>
        @endif
    </nav>
@endif
