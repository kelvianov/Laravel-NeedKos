@props(['class' => ''])

<div {{ $attributes->merge(['class' => 'bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-700 rounded-lg shadow-sm p-6']) }}>
    {{ $slot }}
</div>
