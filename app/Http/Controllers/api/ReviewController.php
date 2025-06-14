<?php

namespace App\Http\Controllers\api;

use App\Models\Review;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ReviewController extends Controller
{
    public function index($productId)
    {
        $reviews = Review::where('product_id', $productId)
            ->latest()
            ->get();

        return response()->json([
            'success' => true,
            'reviews' => $reviews,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'rating'     => 'required|integer|min:1|max:5',
            'comment'    => 'required|string|max:1000',
            'photo'      => 'nullable|image|max:2048',
        ]);

        $imagePath = null;
        if ($request->hasFile('photo')) {
            $imagePath = $request->file('photo')->store('reviews', 'public');
        }

        $review = Review::create([
            'user_id'    => Auth::id(),
            'product_id' => $request->product_id,
            'rating'     => $request->rating,
            'comment'    => $request->comment,
            'image'      => $imagePath,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Review submitted successfully.',
            'review'  => $review,
        ]);
    }

    public function getImage($filename)
    {
        $path = storage_path('app/public/reviews/' . $filename);

        if (!file_exists($path)) {
            return response()->json(['error' => 'Image not found.'], 404);
        }

        return response()->file($path);
    }
}
