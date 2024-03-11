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
    
    public function getTaskToday()
    {
        return Task::whereDate('due_date', Carbon::today())->get();
    }
    
    public function getTaskThisWeek()
    {
        return Task::whereBetween('due_date', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->get();
    }
    
    public function getTaskThisMonth()
    {
        return Task::whereYear('due_date', Carbon::now()->year)
                    ->whereMonth('due_date', Carbon::now()->month)
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
}
