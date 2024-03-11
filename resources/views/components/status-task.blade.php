<form>
    <select class="bg-white border-white rounded text-sm font-medium text-black dark:text-white focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-800 dark:border-gray-800">
        <option value="1" {{ $task->status == 1 ? 'selected' : '' }}>Belum Selesai</option>
        <option value="2" {{ $task->status == 2 ? 'selected' : '' }}>Selesai</option>
    </select>
</form>
