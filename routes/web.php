<?php

use Illuminate\Support\Facades\Route;
use App\Models\Task;
use App\Models\Category;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\CategoryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [TaskController::class, 'dashboard']);
Route::get('/task', function () {
    return view('task');
});
Route::get('/category', function () {
    return view('category');
});