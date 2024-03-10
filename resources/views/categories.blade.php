@extends('layouts.app')
@section('content')
    <div class="bg-white dark:bg-gray-900">
        <div class="p-4 border-2 border-gray-200 rounded-lg dark:border-gray-700 mt-14">
            @include('logic.get-color-categories')
        </div>
    </div>
    @include('components.speeddial-add-category')
    @include('components.modal-new-category')
@endsection
