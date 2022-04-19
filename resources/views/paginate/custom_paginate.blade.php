@if ($paginator->hasPages())
    <nav class="nav-pag">
        <ul class="pagination">
            @if ($paginator->onFirstPage())
                <li class="disabled pag-css" aria-disabled="true">
                    <span aria-hidden="true"><i class="fa-solid fa-arrow-left"></i></span>
                </li>
            @else
                <li class="pag-css">
                    <a href="{{ $paginator->previousPageUrl() }}"><i class="fa-solid fa-arrow-left"></i></a>
                </li>
            @endif

            @foreach ($elements as $element)
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="active pag-css" aria-current="page"><span>{{ $page }}</span></li>
                        @else
                            <li class="pag-css"><a href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            @if ($paginator->hasMorePages())
                <li class="pag-css">
                    <a href="{{ $paginator->nextPageUrl() }}"><i class="fa-solid fa-arrow-right"></i></a>
                </li>
            @else
                <li class="disabled pag-css" aria-disabled="true">
                    <span aria-hidden="true"><i class="fa-solid fa-arrow-right"></i></span>
                </li>
            @endif
        </ul>
    </nav>
@endif
