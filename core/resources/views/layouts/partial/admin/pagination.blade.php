<div class=" d-flex justify-content-between mx-0 row">
    <div class="col-sm-12 col-md-6">
        <div class="dataTables_info" id="DataTables_Table_0_info"
             role="status"
             aria-live="polite">
            {!! __('Showing') !!}
            <span class="fw-semibold">{{ $paginator->firstItem() }}</span>
            {!! __('to') !!}
            <span class="fw-semibold">{{ $paginator->lastItem() }}</span>
            {!! __('of') !!}
            <span class="fw-semibold">{{ $paginator->total() }}</span>
            {!! __('results') !!}
        </div>
    </div>
    @if ($paginator->hasPages())
        <nav aria-label="Page navigation">
            <ul class="pagination mt-2 justify-content-center">
                {{-- Previous Page Link --}}
                @if ($paginator->onFirstPage())
                    <li class="page-item prev-item disabled"><a class="page-link" href="#"></a></li>
                @else
                    <li class="page-item prev-item"><a class="page-link" href="{{ $paginator->previousPageUrl() }}"></a>
                    </li>
                @endif
                {{-- Pagination Elements --}}
                @foreach ($elements as $element)
                    {{-- "Three Dots" Separator --}}
                    @if (is_string($element))
                        <li class="disabled" aria-disabled="true"><span>{{ $element }}</span></li>
                    @endif
                    {{-- Array Of Links --}}
                    @if (is_array($element))
                        @foreach ($element as $page => $url)
                            @if ($page == $paginator->currentPage())
                                <li class="page-item active" aria-current="page">
                                    <a class="page-link">{{ $page }}</a>
                                </li>
                            @else
                                <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                            @endif
                        @endforeach
                    @endif
                @endforeach
                {{-- Next Page Link --}}
                @if ($paginator->hasMorePages())
                    <li class="page-item next-item"><a class="page-link" href="{{ $paginator->nextPageUrl() }}"></a>
                    </li>
                @else
                    <li class="page-item next-item disabled"><a class="page-link" href="#"></a></li>
                @endif
            </ul>
        </nav>
    @endif
</div>
