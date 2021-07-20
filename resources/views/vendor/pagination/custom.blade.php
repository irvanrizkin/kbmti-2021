@if ($paginator->hasPages())
    <div class="paginator">
        @if ($paginator->onFirstPage())
            <a class="paginator__first disabled"><span>First</span></a>
            <a class="paginator__previous disabled"><span><</span></a>
        @else
            <a href="{{ $paginator->url(1) }}" rel="first">First</a>
            <a href="{{ $paginator->previousPageUrl() }}" rel="prev"><</a>
        @endif

        @foreach ($elements as $element)
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <a class="paginator__element active"><span>{{ $page }}</span></a>
                    @else
                        <a href="{{ $url }}">{{ $page }}</a>
                    @endif
                @endforeach
            @endif
        @endforeach

        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" rel="next">></a>
            <a href="{{ $paginator->url($paginator->lastPage()) }}" rel="last">Last</a>
        @else
            <a class="paginator__next disabled"><span>></span></a>
            <a class="paginator__last disabled"><span>Last</span></a>
        @endif
    </div>
@endif
