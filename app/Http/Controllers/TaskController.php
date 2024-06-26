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
        $tasks = $this->taskService->getTaskTodayWithoutKeyword();
        $now = $this->taskService->getNowHour();
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
            'now' => $now,
            'countTodayTasks' => $countTodayTasks,
            'countUnfinishedTodayTasks' => $countUnfinishedTodayTasks,
            'todayDate' => $todayDate,
            'todayDayName' => $todayDayName,
        ]);
    }

    public function getAll(Request $request)
    {
        $keyword = $request->input('keyword');
        $categories = $this->taskService->getAllCategories();
        $tasks = $this->taskService->getAllTasks($keyword);
        foreach ($tasks as $task) {
            $task->formattedDueTime = $this->taskService->formatDueTime($task->due_time);
            $task->formattedDueDate = $this->taskService->formatDueDate($task->due_date);
        }
        return view('task-all', [
            'tasks' => $tasks,
            'categories' => $categories,
            'keyword' => $keyword,
        ]);
    }

    public function getToday(Request $request)
    {
        $keyword = $request->input('keyword');
        $categories = $this->taskService->getAllCategories();
        $tasks = $this->taskService->getTaskToday($keyword);
        foreach ($tasks as $task) {
            $task->formattedDueTime = $this->taskService->formatDueTime($task->due_time);
            $task->formattedDueDate = $this->taskService->formatDueDate($task->due_date);
        }
        return view('task', [
            'tasks' => $tasks,
            'categories' => $categories,
            'keyword' => $keyword,
        ]);
    }
    public function getWeek(Request $request)
    {
        $keyword = $request->input('keyword');
        $categories = $this->taskService->getAllCategories();
        $tasks = $this->taskService->getTaskThisWeek($keyword);
        foreach ($tasks as $task) {
            $task->formattedDueTime = $this->taskService->formatDueTime($task->due_time);
            $task->formattedDueDate = $this->taskService->formatDueDate($task->due_date);
        }
        return view('task-week', [
            'tasks' => $tasks,
            'categories' => $categories,
            'keyword' => $keyword,
        ]);
    }
    public function getMonth(Request $request)
    {
        $keyword = $request->input('keyword');
        $categories = $this->taskService->getAllCategories();
        $tasks = $this->taskService->getTaskThisMonth($keyword);
        foreach ($tasks as $task) {
            $task->formattedDueTime = $this->taskService->formatDueTime($task->due_time);
            $task->formattedDueDate = $this->taskService->formatDueDate($task->due_date);
        }
        return view('task-month', [
            'tasks' => $tasks,
            'categories' => $categories,
            'keyword' => $keyword,
        ]);
    }
    public function storeTask(Request $request)
    {
        $this->taskService->honeypot($request);
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

        $createTask = $this->taskService->createTask($data);
        if (!$createTask) {
            return redirect()->back()->with('success', 'Tugas baru ditambah!');
        } else {
            return redirect()->back();
        }
    }

    public function updateTask(Request $request, $id): RedirectResponse
    {
        $this->taskService->honeypot($request);
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

        if ($validatedData) {
            $this->taskService->updateTaskData($task, $data);
            return redirect()->back()->with('success', 'Tugas berhasil diubah!');
        } else {
            return redirect()->back();
        }
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
        $deleteTask = $this->taskService->deleteTaskData($id);
        if ($deleteTask) {
            return redirect()->back()->with('success', 'Tugas berhasil dihapus!');
        } else {
            return redirect()->back();
        }
    }
    public function clearSoftDeletes()
    {
        $this->taskService->clearSoftDeletes();
        return redirect()->back()->with('success', 'Data sampah berhasil dibersihkan!');
    }
}
