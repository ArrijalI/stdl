<div
    class="text-sm font-medium text-center text-gray-500 border-b border-gray-200 dark:text-gray-400 dark:border-gray-700">
    <ul class="flex flex-wrap -mb-px">
        <li class="me-2">
            <a href="/tasks"
                class="inline-block p-4 select-none border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300">Hari
                Ini</a>
        </li>
        <li class="me-2">
            <a href="/tasks-week"
                class="inline-block p-4 select-none text-blue-600 border-b-2 border-blue-600 rounded-t-lg active dark:text-blue-500 dark:border-blue-500"
                aria-current="page">Minggu Ini</a>
        </li>
        <li class="me-2">
            <a href="/tasks-month"
                class="inline-block p-4 select-none border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300">Bulan
                Ini</a>
        </li>
        <li class="me-2">
            <a href="/tasks-all"
                class="inline-block p-4 select-none border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300">Semua</a>
        </li>
    </ul>
</div>
@include('components.input-search-week')
<div class="rounded-lg mt-4 bg-gray-50 dark:bg-gray-800">
    @if($tasks->isEmpty())
        <p class="text-center select-none text-gray-500 dark:text-gray-400 py-4">Tidak Ada Tugas Minggu Ini</p>
    @else
        @include('components.table-task-full')
    @endif
</div>
