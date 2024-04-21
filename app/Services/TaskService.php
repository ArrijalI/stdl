<?php

namespace App\Services;

use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Task;

class TaskService
{
    public function getAllTasks($keyword)
    {
        return Task::where('name', 'like', '%' . $keyword . '%')
            ->orderBy('due_date')
            ->orderBy('due_time')
            ->get();
    }

    public function getAllCategories()
    {
        return Category::all();
    }

    public function getNowHour()
    {
        return Carbon::now()->format('H:i');
    }

    public function getTodayDate()
    {
        return Carbon::today()->translatedFormat('d F Y');
    }

    public function getTodayDayName()
    {
        return Carbon::now()->isoFormat('dddd');
    }

    public function getTaskToday($keyword)
    { 
        return Task::whereDate('due_date', Carbon::today())
            ->where('name', 'like', '%' . $keyword . '%')
            ->orderBy('status')
            ->get();
    }

    public function getTaskTodayWithoutKeyword()
    { 
        return Task::whereDate('due_date', Carbon::today())
            ->orderBy('status')
            ->get();
    }

    public function getTaskTodayCount()
    {
        return Task::whereDate('due_date', Carbon::today())->count();
    }

    public function getUnfinishedTaskTodayCount()
    {
        return Task::whereDate('due_date', Carbon::today())->where('status', 1)->count();
    }

    public function getTaskThisWeek($keyword)
    {
        return Task::whereBetween('due_date', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
            ->where('name', 'like', '%' . $keyword . '%')
            ->orderBy('status')
            ->get();
    }

    public function getTaskThisMonth($keyword)
    {
        return Task::whereYear('due_date', Carbon::now()->year)
            ->whereMonth('due_date', Carbon::now()->month)
            ->where('name', 'like', '%' . $keyword . '%')
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

    public function validateCategoryData(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|not_regex:/^\s*$/',
            'color' => 'required|string|not_regex:/^\s*$/|in:blue,green,red,purple,indigo,teal,orange,pink,lime',
        ], [
            'name.required' => 'Nama tidak boleh kosong.',
            'name.not_regex' => 'Nama tidak boleh kosong.',
            'color.required' => 'Warna tidak boleh kosong.',
            'color.not_regex' => 'Warna tidak boleh kosong.',
            'color.in' => 'Warna tidak valid.',
        ]);
        return $validatedData;
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
        return $category;
    }
    public function deleteCategoryData($id)
    {
        $category = Category::findOrFail($id);
        if ($category) {
            $category->delete();
        } else {
            abort(404);
        }
        return $category;
    }
    public function validateTaskData(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|regex:/^\S.*$/|max:20',
            'due_date' => 'required|date_format:d/m/Y',
            'due_time' => 'required|date_format:H:i',
            'priority' => 'required|in:1,2,3',
            'category_id' => 'required|exists:categories,id',
            'description' => 'nullable|max:50',
        ], [
            'name.required' => 'Nama tidak boleh kosong.',
            'name.max' => 'Nama tidak boleh lebih dari 20 karakter.',
            'name.regex' => 'Nama tidak boleh kosong.',
            'due_date.required' => 'Tanggal tidak boleh kosong.',
            'due_date.date_format' => 'Format tanggal salah. Format tanggal yang benar adalah tanggal/bulan/tahun (dd/mm/yyyy).',
            'due_time.required' => 'Waktu tidak boleh kosong.',
            'due_time.date_format' => 'Format waktu salah. Format waktu yang benar adalah jam:menit (hh:mm).',
            'priority.required' => 'Prioritas tidak boleh kosong.', 
            'priority.in' => 'Prioritas tidak valid.',
            'category_id.required' => 'Kategori tidak boleh kosong.',
            'category_id.exists' => 'Kategori tidak valid.',
            'description.max' => 'Deskripsi tidak boleh lebih dari 50 karakter.',
        ]);
        if ($validatedData) {
            return $validatedData;
        } else {
            abort(404);
        }
    }
    public function createTask($data)
    {
        $task = new Task;
        $task->name = $data['name'];
        $task->due_date = $data['due_date'];
        $task->due_time = $data['due_time'];
        $task->priority = $data['priority'];
        $task->category_id = $data['category_id'];
        $task->description = $data['description'];
        $task->status = $data['status'];
        $task->save();
        return $task;
    }
    public function updateTaskData($task, $data)
    {
        $task->name = $data['name'];
        $task->due_date = $data['due_date'];
        $task->due_time = $data['due_time'];
        $task->priority = $data['priority'];
        $task->category_id = $data['category_id'];
        $task->description = $data['description'];
        $task->status = $data['status'];
        $task->save();
    }
    public function updateTaskStatus($task, $status)
    {
        $task->status = $status;
        $task->save();
    }
    public function deleteTaskData($id)
    {
        $task = Task::findOrFail($id);
        if ($task) {
            $task->delete();
        } else {
            abort(404);
        }
    }
}
