<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('category')->paginate(10);
        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.products.create', compact('categories'));
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
            'image_url' => 'nullable|url',
            'category_id' => 'required|exists:categories,id'
        ]);

        $data = $request->except('image_url');

        if ($request->filled('image_url')) {
            try {
                $imageContent = file_get_contents($request->image_url);
                $extension = pathinfo(parse_url($request->image_url, PHP_URL_PATH), PATHINFO_EXTENSION) ?: 'jpg';
                $imageName = 'products/' . Str::random(10) . '.' . $extension;
                Storage::disk('public')->put($imageName, $imageContent);
                $data['image'] = $imageName;
            } catch (\Exception $e) {
                return back()->withErrors(['image_url' => 'Invalid image URL or failed to fetch image.']);
            }
        }

        Product::create($data);

        return redirect()->route('admin.products.index')
            ->with('success', 'Product created successfully.');
    }

    public function show(Product $product)
    {
        return view('admin.products.show', compact('product'));
    }

    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('admin.products.update', compact('product', 'categories'));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'ingredients' => 'nullable|string',
            'usage_tips' => 'nullable|string',
            'image_url' => 'nullable|url',
            'category_id' => 'required|exists:categories,id'
        ]);

        $data = $request->except('image_url');

        if ($request->filled('image_url')) {
            try {
                if ($product->image) {
                    Storage::disk('public')->delete($product->image);
                }

                $imageContent = file_get_contents($request->image_url);
                $extension = pathinfo(parse_url($request->image_url, PHP_URL_PATH), PATHINFO_EXTENSION) ?: 'jpg';
                $imageName = 'products/' . Str::random(10) . '.' . $extension;
                Storage::disk('public')->put($imageName, $imageContent);
                $data['image'] = $imageName;
            } catch (\Exception $e) {
                return back()->withErrors(['image_url' => 'Invalid image URL or failed to fetch image.']);
            }
        }

        $product->update($data);

        return redirect()->route('admin.products.index')
            ->with('success', 'Product updated successfully.');
    }

    public function destroy(Product $product)
    {
        if ($product->image) {
            Storage::disk('public')->delete($product->image);
        }

        $product->delete();

        return redirect()->route('admin.products.index')
            ->with('success', 'Product deleted successfully.');
    }
}
