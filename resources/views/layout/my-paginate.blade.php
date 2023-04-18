@if ($paginator->hasPages())
    <div class="row">
        <div class="col-md-12">
            <nav aria-label="Page navigation">
                <ul class="pagination justify-content-center">
                    {{-- Previous Page Link --}}
                    @if ($paginator->onFirstPage())
                        <li class="disabled page-item" aria-disabled="true">
                            <span aria-hidden="true" class="page-link">Prev</span>
                        </li>
                    @else
                        <li class="page-item">
                            <a class="page-link" href="{{ $paginator->previousPageUrl() }}" >Prev</a>
                        </li>
                    @endif

                    {{-- Pagination Elements --}}
                    @foreach ($elements as $element)
                        {{-- "Three Dots" Separator --}}
                        @if (is_string($element))
                            <li class="page-item disabled" aria-disabled="true"><span>{{ $element }}</span></li>
                        @endif

                        {{-- Array Of Links --}}
                        @if (is_array($element))
                            @foreach($element as $page => $url)
                                @if ($page == $paginator->currentPage())
                                    <li class="active page-item" aria-current="page"><span class="page-link">{{ $page }}</span></li>
                                @else
                                    <li><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                                @endif
                            @endforeach
                        @endif
                    @endforeach

                    {{-- Next Page Link --}}
                    @if ($paginator->hasMorePages())
                        <li>
                            <a class="page-link" href="{{ $paginator->nextPageUrl() }}"> Next </a>
                        </li>
                    @else
                        <li class="disabled page-link" aria-disabled="true" aria-label="@lang('pagination.next')">
                            <span aria-hidden="true">Next</span>
                        </li>
                    @endif
                </ul>
            </nav>
        </div><!-- end col -->
    </div>
@endif
            