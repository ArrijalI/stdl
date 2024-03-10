<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>STDL</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @include('components.script-darkcheck')
</head>

<body class="dark:bg-gray-800 dark:border-gray-700">
    @include('components.navbar')
    @include('components.sidebar')
    <div class="p-4 sm:ml-64 dark:bg-gray-800 dark:border-gray-700">
        <!-- content -->
        @yield('content')
    </div>
</body>
@include('components.modal-new-task')
@include('components.modal-new-category')

</html>
@include('components.script-darkmode')
