@if ($paginator->hasPages())
    <div class="shop__pagination">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <a href="#" class="disabled"><span class="arrow_carrot-left"></span></a>
        @else
            <a href="{{ $paginator->previousPageUrl() }}" rel="prev"><span class="arrow_carrot-left"></span></a>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <a href="#" class="disabled">{{ $element }}</a>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <a href="#" class="active">{{ $page }}</a>
                    @else
                        <a href="{{ $url }}">{{ $page }}</a>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" rel="next"><span class="arrow_carrot-right"></span></a>
        @else
            <a href="#" class="disabled"><span class="arrow_carrot-right"></span></a>
        @endif
    </div>
@endif
