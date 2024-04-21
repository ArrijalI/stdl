<div class="flex items-center justify-between mb-4">
    <h5 class=" text-2xl font-bold tracking-tight select-none text-gray-900 dark:text-white">
        Hari Ini
    </h5>
    <a href="/tasks" class="text-sm font-bold select-none text-blue-600 hover:underline dark:text-blue-500">
        Lihat Semua
    </a>
</div>
@if ($tasks->isEmpty())
    <p class="text-center select-none text-gray-500 dark:text-gray-400 py-4">Tidak Ada Tugas Hari Ini</p>
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
                            <div class="inline-flex items-center mr-2 font-bold text-gray-900 dark:text-white">
                                @if ($task->status == 2)
                                    <svg class="w-6 h-6 text-green-500 dark:text-green-300" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                        viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="M5 11.917 9.724 16.5 19 7.5" />
                                    </svg>
                                @elseif ($task->status == 1 && $task->formattedDueTime < $now)
                                <svg class="w-6 h-6 text-red-500 dark:text-red-300" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                        viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="M6 18 17.94 6M18 18 6.06 6" />
                                    </svg>
                                @elseif ($task->status == 1)
                                    <svg class="w-6 h-6 text-yellow-500 dark:text-yellow-300" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                        viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                    </svg>
                                @endif
                            </div>
                        </div>
                    </li>
                </a>
            </ul>
        @endforeach
    </div>
@endif
