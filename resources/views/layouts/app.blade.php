<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="{{ asset('images/logo-stdl-dark.png') }}" type="image/png">
    <title>STDL</title>
    <link rel="stylesheet" href="{{ asset('build/assets/app-BZfNq5Ls.css') }}">
    <script src="{{ asset('build/assets/app-C5w12ZIH.js') }}"></script>
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
