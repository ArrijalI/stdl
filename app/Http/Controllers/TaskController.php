<?php

namespace App\Http\Controllers;

use App\Services\TaskService;
use App\Models\Category;
use App\Models\Task;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Carbon\Carbon;

class TaskController extends Controller
{
    protected $taskService;

    public function __construct(TaskService $taskService)
    {
        $this->taskService = $taskService;
    }

    public function dashboard()
    {
        $categories = $this->taskService->getAllCategories();
        $tasks = $this->taskService->getTaskToday();
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
        $categories = $this->taskService->getAllCategories();
        $tasks = $this->taskService->getAllTasks();
        foreach ($tasks as $task) {
            $task->formattedDueTime = $this->taskService->formatDueTime($task->due_time);
            $task->formattedDueDate = $this->taskService->formatDueDate($task->due_date);
        }
        return view('task-all', [
            'tasks' => $tasks,
            'categories' => $categories,
        ]);
    }

    public function getToday()
    {
        $categories = $this->taskService->getAllCategories();
        $tasks = $this->taskService->getTaskToday();
        foreach ($tasks as $task) {
            $task->formattedDueTime = $this->taskService->formatDueTime($task->due_time);
            $task->formattedDueDate = $this->taskService->formatDueDate($task->due_date);
        }
        return view('task', [
            'tasks' => $tasks,
            'categories' => $categories,
        ]);
    }
    public function getWeek()
    {
        $categories = $this->taskService->getAllCategories();
        $tasks = $this->taskService->getTaskThisWeek();
        foreach ($tasks as $task) {
            $task->formattedDueTime = $this->taskService->formatDueTime($task->due_time);
            $task->formattedDueDate = $this->taskService->formatDueDate($task->due_date);
        }
        return view('task-week', [
            'tasks' => $tasks,
            'categories' => $categories,
        ]);
    }
    public function getMonth()
    {
        $categories = $this->taskService->getAllCategories();
        $tasks = $this->taskService->getTaskThisMonth();
        foreach ($tasks as $task) {
            $task->formattedDueTime = $this->taskService->formatDueTime($task->due_time);
            $task->formattedDueDate = $this->taskService->formatDueDate($task->due_date);
        }
        return view('task-month', [
            'tasks' => $tasks,
            'categories' => $categories,
        ]);
    }
    public function storeTask(Request $request)
    {
        $name = $request->input('name');
        $due_date = Carbon::createFromFormat('d/m/Y', $request->input('due_date'))->format('Y-m-d');
        $due_time = $request->input('due_time');
        $priority = $request->input('priority');
        $category_id = $request->input('category_id');
        $description = $request->input('description');
        $status = 1;
        $this->taskService->createTask($name, $due_date, $due_time, $priority, $category_id, $description, $status);
        // Redirect to the dashboard with a success message
        return redirect()->back();
    }
}
