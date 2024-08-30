<?php

namespace App\Services;

use App\Models\Category;

class CategoryService
{
    public function getCategories(){
        return Category::all();
    }

    public function getCategoryById($id){
        return Category::findOrFail($id);
    }
    public function createCategory($data){
        return Category::create($data);
    }

    public function updateCategory($data){
        $category = $this->getCategoryById($data['id']);
        $category->update($data);
        return $category;
    }

    public function destroy($id){
        $category = $this->getCategoryById($id);
        $category->delete();
        return $category;
    }
}
