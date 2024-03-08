@extends('layouts.app')
@section('content')
    <div class="bg-white dark:bg-gray-900">
        <div class="p-4 border-2 border-gray-200 rounded-lg dark:border-gray-700 mt-14">
            @include('components.day')
            <hr class="h-px mt-4 mb-3 bg-gray-200 border-0 dark:bg-gray-700">
            @include('components.list-today')
            @include('components.add-speeddial')
        </div>
    </div>
@endsection