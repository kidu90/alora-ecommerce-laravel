<div class="mt-12 bg-white rounded-lg shadow-md p-6">
    <h2 class="text-2xl font-semibold mb-6 border-b pb-2">Customer Reviews</h2>

    @auth
    <form wire:submit.prevent="submitReview" class="space-y-6 mb-8">
        @if (session()->has('success'))
        <div class="bg-green-100 text-green-700 px-4 py-2 rounded mb-4">
            {{ session('success') }}
        </div>
        @endif

        <div>
            <label class="block mb-2 font-medium text-gray-700">Rating</label>
            <select wire:model="rating" class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-black focus:border-transparent">
                <option value="">Select rating</option>
                @for ($i = 1; $i <= 5; $i++)
                    <option value="{{ $i }}">{{ $i }} Star{{ $i > 1 ? 's' : '' }}</option>
                @endfor
            </select>
            @error('rating') 
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p> 
            @enderror
        </div>

        <div>
            <label class="block mb-2 font-medium text-gray-700">Comment</label>
            <textarea wire:model="comment" rows="4" class="w-full border border-gray-300 rounded-md px-3 py-2 resize-none focus:outline-none focus:ring-2 focus:ring-black focus:border-transparent"></textarea>
            @error('comment') 
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p> 
            @enderror
        </div>

        <button type="submit" class="bg-black text-white px-6 py-3 rounded-md font-semibold hover:bg-gray-800 transition duration-300">
            Submit Review
        </button>
    </form>
    @else
    <p class="text-gray-600">
        Please <a href="{{ route('login') }}" class="text-black font-semibold underline hover:text-gray-700 transition duration-300">login</a> to write a review.
    </p>
    @endauth

    <div class="space-y-6">
        @forelse ($reviews as $review)
        <div class="border border-gray-200 rounded-md p-4 shadow-sm hover:shadow-md transition duration-200">
            <div class="flex justify-between items-center mb-2">
                <strong class="text-gray-900">{{ $review->user->name }}</strong>
                <span class="text-yellow-400 font-semibold">{{ $review->rating }} &#9733;</span>
            </div>
            <p class="text-gray-700 text-sm leading-relaxed">{{ $review->comment }}</p>
            <p class="text-gray-400 text-xs mt-3">{{ $review->created_at->diffForHumans() }}</p>
        </div>
        @empty
        <p class="text-gray-500 italic">No reviews yet. Be the first to review this product!</p>
        @endforelse
    </div>
</div>
