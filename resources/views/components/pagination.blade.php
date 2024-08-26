@if ($paginator->hasPages())
    <div class="pagination">
        @php
            $currentPage = $paginator->currentPage();
            $lastPage = $paginator->lastPage();
            $showLeftSeparator = $currentPage > 3;
            $showRightSeparator = $currentPage < $lastPage - 2;
            $showFirstPage = $currentPage > 2;
            $showLastPage = $currentPage < $lastPage - 1 || $currentPage == $lastPage - 2;
        @endphp

        {{-- Перша сторінка --}}
        @if ($currentPage == 1)
            @for ($page = 1; $page <= min(3, $lastPage); $page++)
                <a href="{{ $paginator->url($page) }}" class="pagination__item">{{ $page }}</a>
            @endfor
            @if ($lastPage > 3)
                <p>...</p>
                <a href="{{ $paginator->url($lastPage) }}" class="pagination__item">{{ $lastPage }}</a>
            @endif
        @else
            {{-- Перша сторінка для останньої та передостанньої сторінок --}}
            @if ($showFirstPage && $currentPage >= $lastPage - 1)
                <a href="{{ $paginator->url(1) }}" class="pagination__item">1</a>
                @if ($showLeftSeparator)
                    <p>...</p>
                @endif
            @endif

            {{-- Попередні сторінки --}}
            @for ($page = max(1, $currentPage - 2); $page < $currentPage; $page++)
                <a href="{{ $paginator->url($page) }}" class="pagination__item">{{ $page }}</a>
            @endfor

            {{-- Поточна сторінка --}}
            <span class="pagination__item current">{{ $currentPage }}</span>

            {{-- Наступні сторінки --}}
            @for ($page = $currentPage + 1; $page <= min($lastPage, $currentPage + 1); $page++)
                <a href="{{ $paginator->url($page) }}" class="pagination__item">{{ $page }}</a>
            @endfor

            {{-- Остання сторінка для перед передостанньої сторінки та інших --}}
            @if ($showRightSeparator || $currentPage == $lastPage - 2)
                <p>...</p>
                @if ($showLastPage)
                    <a href="{{ $paginator->url($lastPage) }}" class="pagination__item">{{ $lastPage }}</a>
                @endif
            @endif
        @endif
    </div>
@endif

