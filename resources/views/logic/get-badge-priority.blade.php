@if ($task->priority === '1')
    <div class="inline-block w-4 h-4 mr-2 bg-red-700 rounded-full"></div>
@elseif ($task->priority === '2')
    <div class="inline-block w-4 h-4 mr-2 bg-blue-700 rounded-full"></div>
@elseif ($task->priority === '3')
    <div class="inline-block w-4 h-4 mr-2 bg-green-700 rounded-full"></div>
@endif