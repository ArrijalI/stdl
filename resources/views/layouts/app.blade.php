<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="{{ asset('images/logo-stdl-dark.png') }}" type="image/png">
    <title>STDL</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="dark:bg-gray-800 dark:border-gray-700">
    @include('components.navbar')
    @include('components.sidebar')
    <div class="p-4 sm:ml-64 dark:bg-gray-800 dark:border-gray-700">
        <!-- content -->
        @yield('content')
    </div>
</body>

</html>
