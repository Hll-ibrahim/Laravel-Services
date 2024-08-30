<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Services\CategoryService;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    protected CategoryService  $categoryService;
    public function __construct(CategoryService $category_service)
    {
        $this->categoryService = $category_service;
    }

    public function index(){
        return $this->categoryService->getCategories();
    }

    public function show($id){
        return $this->categoryService->getCategoryById($id);
    }

    public function store(CategoryRequest $request){
        $data = $request->validated();
        return $this->categoryService->createCategory($data);
    }

    public function update(CategoryRequest $request){
        $data = $request->validated();
        return $this->categoryService->updateCategory($data);
    }

    public function destroy(Request $request){
        return $this->categoryService->destroy($request['id']);
    }

    public function tasks(int $category_id){

        return $this->categoryService->getTasks($category_id);
    }
}
