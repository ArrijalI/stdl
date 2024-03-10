@php
    $priorities = [
        '1' => ['color' => 'bg-red-700', 'label' => 'Tinggi'],
        '2' => ['color' => 'bg-blue-700', 'label' => 'Sedang'],
        '3' => ['color' => 'bg-green-700', 'label' => 'Rendah'],
    ];
@endphp

@if (array_key_exists($task->priority, $priorities))
    <div class="inline-block w-3 h-3 mr-1 {{ $priorities[$task->priority]['color'] }} rounded-full"></div>
    {{ $priorities[$task->priority]['label'] }}
@endif