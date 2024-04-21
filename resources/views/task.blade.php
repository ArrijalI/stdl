@extends('layouts.app')
@section('content')
    <div class="bg-white dark:bg-gray-900">
        <div class="p-4 border-2 border-gray-200 rounded-lg dark:border-gray-700 mt-14">
            @include('components.alert-error')
            @include('components.alert-success')
            @include('components.tab-tasklist-today')
        </div>
    </div>
    @include('components.speeddial-add-task')
    @include('components.modal-read-task')
    @include('components.modal-new-task')
    @include('components.modal-edit-task')
@endsection