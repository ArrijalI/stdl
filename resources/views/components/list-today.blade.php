<div class="flex items-center justify-between mb-4">
    <h5 class=" text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
        Hari Ini
    </h5>
    <a href="/tasks" class="text-sm font-bold text-blue-600 hover:underline dark:text-blue-500">
        Lihat Semua
    </a>
</div>
@if ($tasks->isEmpty())
    <p class="text-center text-gray-500 dark:text-gray-400 py-4">Tidak Ada Tugas Hari Ini</p>
@else
    <div class="flow-root">
        @foreach ($tasks as $task)
            <ul role="list" class="divide-y divide-gray-200 dark:divide-gray-700">
                <a data-modal-target="read-task-{{ $task->id }}" data-modal-toggle="read-task-{{ $task->id }}">
                    <li class="hover:bg-gray-100 dark:hover:bg-slate-600 py-3 sm:py-4">
                        <div class="flex items-center">
                            <div class="flex-1 min-w-0 ms-4">
                                <div class="text-xl font-semibold text-gray-900 truncate dark:text-white">
                                    @include('logic.get-badge-priority')
                                    {{ $task->name }}
                                </div>
                            </div>
                            <div class="inline-flex items-center mr-2 font-bold text-gray-900 dark:text-white">
                                {{ $task->formattedDueTime }}
                            </div>
                        </div>
                    </li>
                </a>
            </ul>
        @endforeach
    </div>
@endif
