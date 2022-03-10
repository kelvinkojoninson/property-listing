@if ($paginator->hasPages())
    <div class="post-nav-container">
        @if ($paginator->onFirstPage())
            <div class="post-prev-link">
                <a class="disabled" aria-disabled="true" rel="prev"><i class="fa fa-arrow-circle-left"> </i>
                    <span> (Prev Entry)</span>
                </a>
            </div>
        @else
            <div class="post-prev-link">
                <a href="{{ $paginator->previousPageUrl() }}" rel="prev"><i class="fa fa-arrow-circle-left"> </i>
                    <span> (Prev Entry)</span>
                </a>
            </div>
        @endif

        @if ($paginator->hasMorePages())
            <div class="post-next-link">
                <a href="{{ $paginator->nextPageUrl() }}" rel="next">
                    <span> Next Entry</span>
                    <i class="fa fa-arrow-circle-right"> </i>
                </a>
            </div>
        @else
            <div class="post-next-link">
                <a disabled rel="next" aria-disabled="true">
                    <span> Next Entry</span>
                    <i class="fa fa-arrow-circle-right"> </i>
                </a>
            </div>
        @endif
    </div>


@endif
