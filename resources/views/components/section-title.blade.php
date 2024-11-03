<div class="md:col-span-1 flex justify-between">
    <div class="px-4 sm:px-0">
        <h3 class="text-sm font-medium text-gray-900 dark:text-gray-100">{{ $title }}</h3>

        <p class="mt-1 text-xs text-gray-600 dark:text-gray-400">
            {{ $description }}
        </p>
    </div>

    <div class="px-4 sm:px-0">
        {{ $aside ?? '' }}
    </div>
</div>