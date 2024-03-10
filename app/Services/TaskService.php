<?php

namespace App\Services;

use Carbon\Carbon;
use App\Models\Category;
use App\Models\Task;

class TaskService
{
    public function getAllTasks()
    {
        return Task::all();
    }
    public function getAllCategories()
    {
        return Category::all();
    }
    public function formatDueTime($dueTime)
    {
        return Carbon::parse($dueTime)->format('H:i');
    }

    public function formatDueDate($dueDate)
    {
        return Carbon::parse($dueDate)->format('d-m-Y');
    }
}