@foreach ($tasks as $task)
    <tr class="border-b dark:border-gray-600 hover:bg-gray-100 dark:hover:bg-gray-700">
        <td class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
            {{ $task->name }}
        </td>
        <td class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ $task->formattedDueDate }}</td>
        <td class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ $task->formattedDueTime }}</td>
        <td class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
            <div class="flex items-center">
                @include('logic.get-priority-text')
            </div>
        </td>
        <td class="px-4 py-2">
            @include('logic.get-badge-color-category')
        </td>
        <td class="w-4 px-4 py-3">
            <div class="flex items-center">
                @include('components.status-task')
            </div>
        </td>
    </tr>
@endforeach