<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index(Request $request, Category $category)
    {
        $categories = $category->get();
        return $categories;
    }

    public function show(Category $category, $id)
    {
        $categories = $category->find($id);
        return $categories;
    }

    public function store(Request $request, Category $category)
    {
        $category->create([
            'name' => $request->name,
        ]);
        return $category;
    }

    public function update(Request $request, Category $category, $id)
    {
        $categories = $category->find($id);
        if(!isset($categories))
            return response()->json(['error' => 'Não encontrado o id']);
        $categories->update([
            'name' => $request->name,
        ]);
        return $categories;
    }

    public function delete(Category $category, $id)
    {
        $categories = $category->find($id);
        $categories->delete();
    }
}
