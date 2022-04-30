@if ($paginator->hasPages())
    <nav class="blog-pagination">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <div class="btn btn-outline-primary disabled" aria-disabled="true"><span>Older</span></div>
        @else
            <a class="btn btn-outline-primary" href="{{ $paginator->previousPageUrl() }}" rel="prev">Older</a>
        @endif

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <a class="btn btn-outline-secondary" href="{{ $paginator->nextPageUrl() }}" rel="next">Newer</a>
        @else
            <div class="btn btn-outline-secondary disabled" aria-disabled="true"><span>Newer</span></div>
        @endif
    </nav>
@endif
