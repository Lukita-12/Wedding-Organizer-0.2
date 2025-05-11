@if ($paginator->hasPages())
    <nav role="navigation" aria-label="Pagination Navigation" class="flex justify-between">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <span
                class="relative inline-flex items-center text-slate-200 leading-5 cursor-default
                    bg-teal-600 w-1/8 px-3 py-2 justify-center poppins-medium border border-slate-300
                    dark:text-gray-600 dark:bg-gray-800 dark:border-gray-600">
                {!! __('pagination.previous') !!}
            </span>
        @else
            <a href="{{ $paginator->previousPageUrl() }}" rel="prev"
                class="relative inline-flex items-center text-slate-100 leading-5
                    bg-teal-500 w-1/8 px-3 py-2 justify-center poppins-medium border border-slate-300
                    transition delay-50 duration-200
                    hover:bg-teal-600 hover:text-slate-100 focus:outline-none focus:ring ring-gray-300 focus:border-blue-300
                    active:bg-gray-100 active:text-slate-100 transition ease-in-out duration-150
                    dark:bg-gray-800 dark:border-gray-600 dark:text-gray-300 dark:focus:border-blue-700 dark:active:bg-gray-700 dark:active:text-gray-300">
                {!! __('pagination.previous') !!}
            </a>
        @endif

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" rel="next"
                class="relative inline-flex items-center text-slate-100 leading-5
                    bg-teal-500 w-1/8 px-3 py-2 justify-center poppins-medium border border-slate-300
                    transition delay-50 duration-200
                    hover:bg-teal-600 hover:text-slate-100 focus:outline-none focus:ring ring-gray-300 focus:border-blue-300
                    active:bg-gray-100 active:text-slate-100 transition ease-in-out duration-150
                    dark:bg-gray-800 dark:border-gray-600 dark:text-gray-300 dark:focus:border-blue-700 dark:active:bg-gray-700 dark:active:text-gray-300">
                {!! __('pagination.next') !!}
            </a>
        @else
            <span
                class="relative inline-flex items-center text-slate-200 leading-5 cursor-default
                    bg-teal-600 w-1/8 px-3 py-2 justify-center poppins-medium border border-slate-300
                    dark:text-gray-600 dark:bg-gray-800 dark:border-gray-600">
                {!! __('pagination.next') !!}
            </span>
        @endif
    </nav>
@endif
