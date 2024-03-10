@php
$colorStyles = [
    'red' => 'bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 text-white font-medium text-sm px-2 py-0.5 rounded dark:text-white',
    'green' => 'bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 text-white font-medium text-sm px-2 py-0.5 rounded dark:text-white',
    'blue' => 'bg-gradient-to-r from-blue-400 via-blue-500 to-blue-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 text-white font-medium text-sm px-2 py-0.5 rounded dark:text-white',
    'purple' => 'bg-gradient-to-r from-purple-400 via-purple-500 to-purple-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-purple-300 dark:focus:ring-purple-800 text-white font-medium text-sm px-2 py-0.5 rounded dark:text-white',
    'indigo' => 'bg-gradient-to-r from-indigo-400 via-indigo-500 to-indigo-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-indigo-300 dark:focus:ring-indigo-800 text-white font-medium text-sm px-2 py-0.5 rounded dark:text-white',
    'teal' => 'bg-gradient-to-r from-teal-400 via-teal-500 to-teal-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-teal-300 dark:focus:ring-teal-800 text-white font-medium text-sm px-2 py-0.5 rounded dark:text-white',
    'orange' => 'bg-gradient-to-r from-orange-400 via-orange-500 to-orange-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-orange-300 dark:focus:ring-orange-800 text-white font-medium text-sm px-2 py-0.5 rounded dark:text-white',
    'pink' => 'bg-gradient-to-r from-pink-400 via-pink-500 to-pink-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-pink-300 dark:focus:ring-pink-800 text-white font-medium text-sm px-2 py-0.5 rounded dark:text-white',
    'cyan' => 'bg-gradient-to-r from-cyan-400 via-cyan-500 to-cyan-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-cyan-300 dark:focus:ring-cyan-800 text-white font-medium text-sm px-2 py-0.5 rounded dark:text-white',
    'lime' => 'bg-gradient-to-r from-lime-400 via-lime-500 to-lime-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-lime-300 dark:focus:ring-lime-800 text-white font-medium text-sm px-2 py-0.5 rounded dark:text-white',
];
@endphp
<span class="{{ $colorStyles[$task->category->color] }}">{{ $task->category->name }}</span>