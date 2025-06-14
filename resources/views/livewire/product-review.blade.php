<div class="mt-16 bg-white rounded-2xl shadow-md p-8">
    <h2 class="text-3xl font-semibold mb-8 border-b pb-3">Customer Reviews</h2>

    @auth
    <form wire:submit.prevent="submitReview" class="space-y-8 mb-10" enctype="multipart/form-data">
        @if (session()->has('success'))
        <div class="bg-green-100 text-green-700 px-4 py-3 rounded mb-6">
            {{ session('success') }}
        </div>
        @endif

        <div>
            <label class="block mb-3 font-medium text-gray-700 text-base">Rating</label>
            <select wire:model="rating" class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-black focus:border-transparent">
                <option value="">Select rating</option>
                @for ($i = 1; $i <= 5; $i++)
                    <option value="{{ $i }}">{{ $i }} Star{{ $i > 1 ? 's' : '' }}</option>
                @endfor
            </select>
            @error('rating') 
                <p class="text-red-600 text-sm mt-2">{{ $message }}</p> 
            @enderror
        </div>

        <div>
            <label class="block mb-3 font-medium text-gray-700 text-base">Comment</label>
            <textarea wire:model="comment" rows="4" class="w-full border border-gray-300 rounded-lg px-4 py-3 resize-none focus:outline-none focus:ring-2 focus:ring-black focus:border-transparent"></textarea>
            @error('comment') 
                <p class="text-red-600 text-sm mt-2">{{ $message }}</p> 
            @enderror
        </div>

        <div>
            <label class="block mb-3 font-medium text-gray-700 text-base">Photo (optional)</label>
            <input type="file" wire:model="photo" accept="image/*" capture="environment"
                class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-black focus:border-transparent" />
            @error('photo') 
                <p class="text-red-600 text-sm mt-2">{{ $message }}</p> 
            @enderror
        </div>

        <button type="submit" class="bg-black text-white px-8 py-3 rounded-md font-semibold hover:bg-gray-800 transition duration-300">
            Submit Review
        </button>
    </form>
    @else
    <p class="text-gray-600 text-base">
        Please <a href="{{ route('login') }}" class="text-black font-semibold underline hover:text-gray-700 transition duration-300">login</a> to write a review.
    </p>
    @endauth

    <div class="space-y-8 mt-10">
        @forelse ($reviews as $review)
        <div class="border border-gray-200 rounded-lg p-5 shadow-sm hover:shadow-md transition duration-200">
            <div class="flex justify-between items-center mb-3">
                <strong class="text-gray-900 text-base">{{ $review->user->name }}</strong>
                <span class="text-yellow-400 font-semibold text-base">{{ $review->rating }} &#9733;</span>
            </div>
            <p class="text-gray-700 text-sm leading-relaxed">{{ $review->comment }}</p>

            @if ($review->image)
                <img src="{{ asset('storage/' . $review->image) }}" alt="Review Photo" class="mt-3 rounded-lg shadow-md max-w-xs">
            @endif

            <p class="text-gray-400 text-xs mt-3">{{ $review->created_at->diffForHumans() }}</p>
        </div>
        @empty
        <p class="text-gray-500 italic">No reviews yet. Be the first to review this product!</p>
        @endforelse
    </div>
</div>
