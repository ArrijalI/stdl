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
        $data = [
            'name' => $request->input('name'),
            'due_date' => Carbon::createFromFormat('d/m/Y', $request->input('due_date'))->format('Y-m-d'),
            'due_time' => $request->input('due_time'),
            'priority' => $request->input('priority'),
            'category_id' => $request->input('category_id'),
            'description' => $request->input('description') ?: 'tidak ada deskripsi',
            'status' => 1,
        ];

        $validatedData = $this->taskService->validateTaskData($request);

        $this->taskService->createTask($data);
        return redirect()->back();
    }

    public function updateTask(Request $request, $id): RedirectResponse
    {
        $task = Task::findOrFail($id);
        $data = [
            'name' => $request->input('name'),
            'due_date' => Carbon::createFromFormat('d/m/Y', $request->input('due_date'))->format('Y-m-d'),
            'due_time' => $request->input('due_time'),
            'priority' => $request->input('priority'),
            'category_id' => $request->input('category_id'),
            'description' => $request->input('description') ?: 'tidak ada deskripsi',
            'status' => 1,
        ];

        $validatedData = $this->taskService->validateTaskData($request);
        
        if ($task) {
            $this->taskService->updateTaskData($task, $data);
        } else {
            abort(404);
        }
        return redirect()->back();
    }
    public function updateTaskDone($id)
    {
        $task = Task::findOrFail($id);
        if ($task) {
            $status = 2;
            $this->taskService->updateTaskStatus($task, $status);
        } else {
            abort(404);
        }
        return redirect()->back();
    }
    public function updateTaskUndone($id)
    {
        $task = Task::findOrFail($id);
        if ($task) {
            $status = 1;
            $this->taskService->updateTaskStatus($task, $status);
        } else {
            abort(404);
        }
        return redirect()->back();
    }
    public function deleteTask($id)
    {
        $this->taskService->deleteTaskData($id);
        return redirect()->back();
    }
}
