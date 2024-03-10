<?php

namespace App\Http\Controllers;

use App\Services\TaskService;
use App\Models\Categories;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    protected $taskService;

    public function __construct(TaskService $taskService)
    {
        $this->taskService = $taskService;
    }

    public function getAll()
    {
        $categories = $this->taskService->getAllCategories();
        return view('categories', [
            'categories' => $categories
        ]);
    }
}
