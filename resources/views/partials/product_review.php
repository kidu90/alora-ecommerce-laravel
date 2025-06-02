<div class="mt-8">
    <h2 class="text-xl font-semibold mb-4">Customer Reviews</h2>

    @auth
    <form wire:submit.prevent="submitReview" class="space-y-4 mb-6">
        @if (session()->has('success'))
        <div class="text-green-600">{{ session('success') }}</div>
        @endif

        <div>
            <label class="block">Rating</label>
            <select wire:model="rating" class="border rounded px-3 py-1">
                <option value="">Select</option>
                @for ($i = 1; $i <= 5; $i++)
                    <option value="{{ $i }}">{{ $i }} Star</option>
                    @endfor
            </select>
            @error('rating') <span class="text-red-600">{{ $message }}</span> @enderror
        </div>

        <div>
            <label class="block">Comment</label>
            <textarea wire:model="comment" class="w-full border rounded px-3 py-1"></textarea>
            @error('comment') <span class="text-red-600">{{ $message }}</span> @enderror
        </div>

        <button type="submit" class="bg-black text-white px-4 py-2 rounded">Submit Review</button>
    </form>
    @else
    <p class="text-gray-600">Please <a href="{{ route('login') }}" class="text-blue-500">login</a> to write a review.</p>
    @endauth

    <div class="space-y-4">
        @foreach ($reviews as $review)
        <div class="border rounded p-4 shadow-sm">
            <div class="flex justify-between">
                <strong>{{ $review->user->name }}</strong>
                <span>{{ $review->rating }} ★</span>
            </div>
            <p class="text-sm mt-1 text-gray-700">{{ $review->comment }}</p>
            <p class="text-xs text-gray-500">{{ $review->created_at->diffForHumans() }}</p>
        </div>
        @endforeach
    </div>
</div>