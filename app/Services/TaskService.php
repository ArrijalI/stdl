<?php

namespace App\Services;

use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use App\Models\Category;
use App\Models\Task;

class TaskService
{
    public function getAllTasks()
    {
        return Task::orderBy('due_date')->orderBy('due_time')->get();
    }

    public function getAllCategories()
    {
        return Category::all();
    }

    public function getTodayDate()
    {
        return Carbon::today()->translatedFormat('d F Y');
    }

    public function getTodayDayName()
    {
        return Carbon::now()->isoFormat('dddd');
    }

    public function getTaskToday()
    {
        return Task::whereDate('due_date', Carbon::today())->orderBy('status')->get();
    }

    public function getTaskTodayCount()
    {
        return Task::whereDate('due_date', Carbon::today())->count();
    }

    public function getUnfinishedTaskTodayCount()
    {
        return Task::whereDate('due_date', Carbon::today())->where('status', 1)->count();
    }

    public function getTaskThisWeek()
    {
        return Task::whereBetween('due_date', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
            ->orderBy('status')
            ->get();
    }

    public function getTaskThisMonth()
    {
        return Task::whereYear('due_date', Carbon::now()->year)
            ->whereMonth('due_date', Carbon::now()->month)
            ->orderBy('status')
            ->get();
    }

    public function formatDueTime($dueTime)
    {
        return Carbon::parse($dueTime)->format('H:i');
    }

    public function formatDueDate($dueDate)
    {
        return Carbon::parse($dueDate)->format('d-m-Y');
    }

    public function createCategory($name, $color)
    {
        $category = new Category;
        $category->name = $name;
        $category->color = $color;
        $category->save();
        return $category;
    }
    public function updateCategoryData(Category $category, $name, $color)
    {
        $category->name = $name;
        $category->color = $color;
        $category->save();
    }
    public function deleteCategoryData($id)
    {
        $category = Category::findOrFail($id);
        if ($category) {
            $category->delete();
        } else {
            abort(404);
        }
    }
    public function createTask($name, $due_date, $due_time, $priority, $category_id, $description, $status)
    {
        $task = new Task;
        $task->name = $name;
        $task->due_date = $due_date;
        $task->due_time = $due_time;
        $task->priority = $priority;
        $task->category_id = $category_id;
        $task->description = $description;
        $task->status = $status;
        $task->save();
        return $task;
    }
}
