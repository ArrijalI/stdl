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

Route::get('/', [TaskController::class, 'dashboard'])->name('dashboard.index');

Route::get('/tasks', [TaskController::class, 'getToday'])->name('tasks.getToday');
Route::get('/tasks-week', [TaskController::class, 'getWeek'])->name('tasks.getWeek');
Route::get('/tasks-month', [TaskController::class, 'getMonth'])->name('tasks.getMonth');
Route::get('/tasks-all', [TaskController::class, 'getAll'])->name('tasks.getAll');
Route::post('/task-create', [TaskController::class, 'storeTask'])->name('tasks.storeTask');
Route::post('/task-edit/{id}', [TaskController::class, 'updateTask'])->name('tasks.updateTask');
Route::get('/task-done/{id}', [TaskController::class, 'updateTaskDone'])->name('tasks.updateTaskDone');
Route::get('/task-undone/{id}', [TaskController::class, 'updateTaskUndone'])->name('tasks.updateTaskUndone');
Route::get('/task-delete/{id}', [TaskController::class, 'deleteTask'])->name('tasks.deleteTask');

Route::get('/categories', [CategoryController::class, 'getAll'])->name('categories.getAll');
Route::post('/category-create', [CategoryController::class, 'storeCategory'])->name('categories.storeCategory');
Route::post('/category-edit/{id}', [CategoryController::class, 'updateCategory'])->name('categories.editCategory');
Route::get('/category-delete/{id}', [CategoryController::class, 'deleteCategory'])->name('categories.deleteCategory');

Route::get('/clear-sofdeletes', [TaskController::class, 'clearSoftDeletes'])->name('tasks.clearSoftDeletes');
Route::get('/clear-cache', function() {
    Artisan::call('cache:clear');
    return "Cache is cleared";
});