<?php

namespace App\Http\Controllers;

use App\Services\TaskService;
use App\Models\Category;
use Illuminate\Http\RedirectResponse;
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
            'categories' => $categories,
        ]);
    }

    public function storeCategory(Request $request): RedirectResponse
    {
        $this->taskService->validateCategoryData($request);

        $name = $request->input('name');
        $color = $request->input('color');
        $this->taskService->createCategory($name, $color);

        return redirect('/categories');
    }

    public function updateCategory(Request $request, $id): RedirectResponse
    {
        $category = Category::findOrFail($id);
        if ($category) {
            $this->taskService->validateCategoryData($request);
            $this->taskService->updateCategoryData($category, $request->input('name'), $request->input('color'));
        } else {
            abort(404);
        }
        return redirect('/categories');
    }

    public function deleteCategory($id)
    {
        $this->taskService->deleteCategoryData($id);
        return redirect('/categories');
    }
}
