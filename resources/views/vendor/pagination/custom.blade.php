@if ($paginator->hasPages())
    <div class="pagination-wrapper">
        <ul class="pagination">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="disabled"><span>&laquo;</span></li>
            @else
                <li><a href="{{ $paginator->previousPageUrl() }}" rel="prev">&laquo;</a></li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="disabled"><span>{{ $element }}</span></li>
                @endif

                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="active"><span>{{ $page }}</span></li>
                        @else
                            <li><a href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li><a href="{{ $paginator->nextPageUrl() }}" rel="next">&raquo;</a></li>
            @else
                <li class="disabled"><span>&raquo;</span></li>
            @endif
        </ul>
    </div>
@endif

<style>

    *{
        -webkit-user-select: none; /* Safari */
        -ms-user-select: none; /* Internet Explorer/Edge */
        user-select: none;
    }

    .pagination {
        display: flex;
        justify-content: center; /* Center pagination horizontally */
        margin: 0; /* Remove default margins */
        padding: 0; /* Remove default padding */
    }

    .pagination li {
        list-style: none;
        margin: 0 5px; /* Space between pagination items */
    }

    .pagination a, .pagination span {
        display: block;
        padding: 10px 15px;
        text-decoration: none;
        color: #007bff;
        border: 1px solid #ddd;
        border-radius: 5px;
        transition: background-color 0.2s ease;
    }

    .pagination a:hover {
        background-color: #f8f9fa;
    }

    .pagination .active span {
        background-color: #007bff;
        color: white;
        border: 1px solid #007bff;
    }

    .pagination .disabled span {
        color: #6c757d;
    }

    .pagination-wrapper {
        position: fixed;
        bottom: 20px; /* Adjust distance from the bottom as needed */
        left: 50%;
        transform: translateX(-50%);
        background-color: transparent; /* Optional: background color to ensure visibility */
        padding: 10px;
        border-radius: 5px; /* Optional: rounded corners */
        box-shadow: 0 0 10px rgba(0,0,0,0.1); /* Optional: shadow for better visibility */
    }

    @media (max-width: 768px) {
        .pagination a, .pagination span {
            padding: 8px 12px;
        }
    }

</style>
