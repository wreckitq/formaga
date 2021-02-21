@props(['icon', 'name', 'url'])

<li class="relative px-6 py-3">
    @if (request()->is(
        str_replace(config('app.url') . '/', '', $url)
    ) ?? '' ?? '')
        <span
            class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg"
            aria-hidden="true"
        ></span>
    @endif

    <!-- Add this classes to an active anchor (a tag) -->
    <a
        class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 {{ request()->is(
            str_replace(config('app.url') . '/', '', $url)
        ) ?? '' ?? '' ? 'text-gray-800 dark:text-gray-100' : '' }}"
        href="{{ $url ?? '#' }}"
    >
        {!! $icon !!}

        <span class="ml-4">{{ $name }}</span>
    </a>
</li>
