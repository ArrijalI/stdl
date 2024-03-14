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

    public function getTodayDate()
    {
        return Carbon::today()->locale('id')->translatedFormat('d F Y');
    }

    public function getTodayDayName()
    {
        return Carbon::now()->locale('id')->isoFormat('dddd');
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

    public function splitDueTime($dueTime)
    {
        $parts = explode(':', $dueTime);
        if (count($parts) === 2) {
            return ['hour' => $parts[0], 'minute' => $parts[1]];
        } else {
            // Handle invalid input format
            return ['hour' => null, 'minute' => null];
        }
    }
}
