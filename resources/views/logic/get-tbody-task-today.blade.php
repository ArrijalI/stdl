@foreach ($tasks as $task)
    <tr data-modal-target="read-task-{{ $task->id }}" data-modal-toggle="read-task-{{ $task->id }}"
        class="border-b dark:border-gray-600 hover:bg-gray-100 dark:hover:bg-gray-700">
        <td class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
            {{ $task->name }}
        </td>
        <td class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ $task->formattedDueTime }}
        </td>
        <td class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
            <div class="flex items-center">
                @include('logic.get-priority-text')
            </div>
        </td>
        <td class="px-4 py-2">
            @include('logic.get-badge-color-category')
        </td>
        <td class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
            @if ($task->status === 1)
                Belum Selesai
            @elseif ($task->status === 1)
                Selesai
            @endif
        </td>
    </tr>
@endforeach
