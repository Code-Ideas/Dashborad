
{{-- 
    Laravel's default pagination html tags modifed to make Bulma CSS compatible paginator.
    1. First run "php artisan vendor:publish --tag=laravel-pagination"
    2. This command will place the views in the resources/views/vendor/pagination directory.
    3. Replace text on "bootstrap-4.blade.php" with this code.
    4. Remove other blade files if not needed (optional).
--}}


@if ($paginator->hasPages())
    <nav class="pagination is-centered" role="navigation" aria-label="pagination">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <a class="pagination-previous" disabled>السابق</a>
        @else
            <a class="pagination-previous" href="{{ $paginator->previousPageUrl() }}">السابق</a>
        @endif

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <a class="pagination-next" href="{{ $paginator->nextPageUrl() }}">التالي</a>
        @else
            <a class="pagination-next" disabled>التالي</a>
        @endif
        

        {{-- Pagination Elements --}}
        <ul class="pagination-list">
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li><span class="pagination-ellipsis">&hellip;</span></li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                        @foreach ($element as $page => $url)
                            @if ($page == $paginator->currentPage())
                                <li><a class="pagination-link is-current" aria-label="Goto page {{ $page }}">{{ $page }}</a></li>
                            @else
                                <li><a href="{{ $url }}" class="pagination-link" aria-label="Goto page {{ $page }}">{{ $page }}</a></li>
                            @endif
                        @endforeach
                @endif
            @endforeach
        </ul>

    </nav>
@endif