<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::with('products')->get();
        return response()->json($categories);
    }

    public function show($id)
    {
        $category = Category::with('products')->findOrFail($id);
        return response()->json($category);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:categories'
        ]);

        $category = Category::create($request->all());
        return response()->json($category, 201);
    }

    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);
        
        $request->validate([
            'name' => 'required|string|max:255|unique:categories,name,' . $category->id
        ]);

        $category->update($request->all());
        return response()->json($category);
    }

    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        return response()->json(null, 204);
    }
}