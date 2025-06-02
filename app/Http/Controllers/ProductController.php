<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('category')->get();
        return response()->json($products);
    }

    public function show($id)
    {
        $product = Product::with('category')->findOrFail($id);
        return response()->json($product);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'ingredients' => 'nullable|string',
            'usage_tips' => 'nullable|string',
            'image' => 'nullable|string',
            'category_id' => 'required|exists:categories,id'
        ]);

        $product = Product::create($request->all());
        return response()->json($product, 201);
    }

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'ingredients' => 'nullable|string',
            'usage_tips' => 'nullable|string',
            'image' => 'nullable|string',
            'category_id' => 'required|exists:categories,id'
        ]);

        $product->update($request->all());
        return response()->json($product);
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return response()->json(null, 204);
    }

    // Web routes
    public function webIndex()
    {
        $products = Product::with('category')->get();
        return view('products', compact('products'));
    }

    public function webShow($id)
    {
        $product = Product::with('category')->findOrFail($id);
        return view('products.show', compact('product'));
    }
}