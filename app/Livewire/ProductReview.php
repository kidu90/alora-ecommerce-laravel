<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Review;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class ProductReview extends Component
{
    use WithFileUploads;

    public $productId, $rating, $comment, $photo;
    public $reviews;

    protected $rules = [
        'rating' => 'required|integer|min:1|max:5',
        'comment' => 'required|string|max:1000',
        'photo' => 'nullable|image|max:2048',
    ];

    public function mount($productId)
    {
        $this->productId = $productId;
        $this->loadReviews();
    }

    public function loadReviews()
    {
        $this->reviews = Review::where('product_id', $this->productId)->latest()->get();
    }

    public function submitReview()
    {
        $this->validate();

        $imagePath = $this->photo ? $this->photo->store('reviews', 'public') : null;

        Review::create([
            'user_id' => Auth::id(),
            'product_id' => $this->productId,
            'rating' => $this->rating,
            'comment' => $this->comment,
            'image' => $imagePath,
        ]);

        $this->reset(['rating', 'comment', 'photo']);
        $this->loadReviews();
        session()->flash('success', 'Review submitted successfully.');
    }

    public function render()
    {
        return view('livewire.product-review');
    }
}
