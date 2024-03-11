@php
    $colorClasses = [
        'blue' => 'from-blue-400 via-blue-500 to-blue-600 focus:ring-blue-300 dark:focus:ring-blue-800',
        'green' => 'from-green-400 via-green-500 to-green-600 focus:ring-green-300 dark:focus:ring-green-800',
        'red' => 'from-red-400 via-red-500 to-red-600 focus:ring-red-300 dark:focus:ring-red-800',
        'purple' => 'from-purple-400 via-purple-500 to-purple-700 focus:ring-purple-300 dark:focus:ring-purple-800',
        'indigo' => 'from-indigo-400 via-indigo-500 to-indigo-600 focus:ring-indigo-300 dark:focus:ring-indigo-800',
        'teal' => 'from-teal-400 via-teal-500 to-teal-600 focus:ring-teal-300 dark:focus:ring-teal-800',
        'orange' => 'from-orange-400 via-orange-500 to-orange-600 focus:ring-orange-300 dark:focus:ring-orange-800',
        'pink' => 'from-pink-400 via-pink-500 to-pink-600 focus:ring-pink-300 dark:focus:ring-pink-800',
        'cyan' => 'from-cyan-400 via-cyan-500 to-cyan-600 focus:ring-cyan-300 dark:focus:ring-cyan-800',
        'lime' => 'from-lime-400 via-lime-500 to-lime-600 focus:ring-lime-300 dark:focus:ring-lime-800',
    ];
@endphp

<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-2 mb-4">
    @foreach ($categories as $category)
        @if (array_key_exists($category->color, $colorClasses))
            <button type="button" data-modal-target="edit-category-{{ $category->id }}" data-modal-toggle="edit-category-{{ $category->id }}"
                class="text-white bg-gradient-to-r {{ $colorClasses[$category->color] }} hover:bg-gradient-to-br focus:ring-4 focus:outline-none font-medium rounded-lg text-lg px-5 py-2.5 text-center me-2 mb-2">{{ $category->name }}</button>
        @endif
    @endforeach
</div>
