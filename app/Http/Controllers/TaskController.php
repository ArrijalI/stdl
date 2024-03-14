<?php

namespace App\Http\Controllers;

use App\Services\TaskService;
use App\Models\Categories;
use App\Models\Tasks;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    protected $taskService;

    public function __construct(TaskService $taskService)
    {
        $this->taskService = $taskService;
    }

    public function dashboard()
    {
        $tasks = $this->taskService->getAllTasks();
        $categories = $this->taskService->getAllCategories();
        foreach ($tasks as $task) {
            $task->formattedDueTime = $this->taskService->formatDueTime($task->due_time);
            $task->formattedDueDate = $this->taskService->formatDueDate($task->due_date);
        }
        $countTodayTasks = $this->taskService->getTaskTodayCount();
        $countUnfinishedTodayTasks = $this->taskService->getUnfinishedTaskTodayCount();
        $todayDate = $this->taskService->getTodayDate();
        $todayDayName = $this->taskService->getTodayDayName();
        return view('dashboard', [
            'tasks' => $tasks,
            'categories' => $categories,
            'countTodayTasks' => $countTodayTasks,
            'countUnfinishedTodayTasks' => $countUnfinishedTodayTasks,
            'todayDate' => $todayDate,
            'todayDayName' => $todayDayName,
        ]);
    }

    public function getAll()
    {
        $tasks = $this->taskService->getAllTasks();
        foreach ($tasks as $task) {
            $task->formattedDueTime = $this->taskService->formatDueTime($task->due_time);
            $task->formattedDueDate = $this->taskService->formatDueDate($task->due_date);
        }
        return view('task-all', [
            'tasks' => $tasks,
        ]);
    }

    public function getToday()
    {
        $tasks = $this->taskService->getTaskToday();
        foreach ($tasks as $task) {
            $task->formattedDueTime = $this->taskService->formatDueTime($task->due_time);
            $task->formattedDueDate = $this->taskService->formatDueDate($task->due_date);
        }
        return view('task', [
            'tasks' => $tasks,
        ]);
    }
    public function getWeek()
    {
        $tasks = $this->taskService->getTaskThisWeek();
        foreach ($tasks as $task) {
            $task->formattedDueTime = $this->taskService->formatDueTime($task->due_time);
            $task->formattedDueDate = $this->taskService->formatDueDate($task->due_date);
        }
        return view('task-week', [
            'tasks' => $tasks,
        ]);
    }
    public function getMonth()
    {
        $tasks = $this->taskService->getTaskThisMonth();
        foreach ($tasks as $task) {
            $task->formattedDueTime = $this->taskService->formatDueTime($task->due_time);
            $task->formattedDueDate = $this->taskService->formatDueDate($task->due_date);
        }
        return view('task-month', [
            'tasks' => $tasks,
        ]);
    }
}
