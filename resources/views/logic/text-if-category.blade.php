@if ($task->category->color === 'red')
    <span
        class="bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 text-white font-medium text-sm px-2 py-0.5 rounded dark:text-white">{{ $task->category->name }}</span>
@endif
