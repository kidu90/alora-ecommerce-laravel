<div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300">
    <div class="relative">
        <img src="{{ $product->image }}"
            alt="{{ $product->name }}"
            class="w-full h-48 object-cover">

        @if($product->stock <= 0)
            <div class="absolute top-2 right-2 bg-red-500 text-white px-2 py-1 rounded-full text-xs font-semibold">
            Out of Stock
    </div>
    @endif
</div>

<div class="p-4">
    <h3 class="font-bold mb-2 text-gray-800 line-clamp-2">{{ $product->name }}</h3>

    <!-- Rating Stars  -->
    <div class="flex items-center mb-2">
        <img src="" alt="Star Icon" class="h-5 w-5">
        <img src="" alt="Star Icon" class="h-5 w-5">
        <img src="" alt="Star Icon" class="h-5 w-5">
        <img src="" alt="Star Icon" class="h-5 w-5">
    </div>

    <!-- Price -->
    <p class="text-gray-600 mb-2">
        <span class="text-lg font-semibold text-green-600">${{ number_format($product->price, 2) }}</span>
    </p>



    <!-- Stock Status -->
    <div class="mb-4">
        @if($product->stock > 0)
        <span class="text-sm text-green-600">
            <i class="fas fa-check-circle mr-1"></i>{{ $product->stock }} in stock
        </span>
        @else
        <span class="text-sm text-red-600">
            <i class="fas fa-times-circle mr-1"></i>Out of stock
        </span>
        @endif
    </div>

    <!-- View Details Button -->
    <a href=""
        class="w-full bg-gray-200 text-black px-6 py-2 rounded-lg hover:bg-gray-300 transition-colors duration-200 inline-block text-center">
        View Details
    </a>
</div>
</div>