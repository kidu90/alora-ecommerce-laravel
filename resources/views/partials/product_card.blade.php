<main class="container mx-auto px-6 py-8">
    <h1 class="text-4xl font-bold text-center mb-8">Products</h1>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach ($products as $product)
        <div class="bg-white rounded-lg shadow-md overflow-hidden">
            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="w-full h-48 object-cover">
            <div class="p-4">
                <h3 class="font-bold mb-2">{{ $product->name }}</h3>
                <div class="flex items-center mb-2">
                    <img src="{{ asset('assets/images/star.svg') }}" alt="Star Icon" class="h-5 w-5">
                    <img src="{{ asset('assets/images/star.svg') }}" alt="Star Icon" class="h-5 w-5">
                    <img src="{{ asset('assets/images/star.svg') }}" alt="Star Icon" class="h-5 w-5">
                    <img src="{{ asset('assets/images/star.svg') }}" alt="Star Icon" class="h-5 w-5">
                </div>
                <p class="text-gray-600 mb-4">${{ number_format($product->price, 2) }}</p>
                <a href="#"
                    class="bg-gray-200 text-black px-6 py-2 rounded-lg hover:bg-gray-100 mt-4 inline-block">
                    View Details
                </a>
            </div>
        </div>
        @endforeach
    </div>
</main>