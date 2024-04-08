@if ($paginator->hasPages())
    <nav class="pagination">
        <ul class="pagination__container">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="pagination__button pagination__button--disabled pagination__button--prev" aria-disabled="true" aria-label="@lang('pagination.previous')">
                    <span aria-hidden="true"></span>
                </li>
            @else
                <li class="pagination__button pagination__button--prev">
                    <a href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')"></a>
                </li>
            @endif

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li class="pagination__button pagination__button--next">
                    <a href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')"></a>
                </li>
            @else
                <li  class="pagination__button pagination__button--disabled pagination__button--next" aria-disabled="true" aria-label="@lang('pagination.next')">
                    <span aria-hidden="true"></span>
                </li>
            @endif

            {{-- Pagination Elements --}}
            <div class="pagination__count">
                <p class="pagination__text">
                    {!! __('Showing') !!}
                    @if ($paginator->firstItem())
                        <span class="pagination__text--important">{{ $paginator->firstItem() }}</span>
                        {!! __('to') !!}
                        <span class="pagination__text--important">{{ $paginator->lastItem() }}</span>
                    @else
                        {{ $paginator->count() }}
                    @endif
                    {!! __('of') !!}
                    <span class="pagination__text--important">{{ $paginator->total() }}</span>
                    {!! __('results') !!}
                </p>
            </div>
        </ul>
    </nav>
@endif
