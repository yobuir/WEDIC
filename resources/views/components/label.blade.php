@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-medium text-xs capitalize text-gray-700 dark:text-gray-300']) }}>
    {{ $value ?? $slot }}
</label>
